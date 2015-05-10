<?php

	add_action( 'init', 'create_event_post_type' );
	function create_event_post_type() {
		register_post_type( 'event',
			array(
					'labels' => array(
					'name' => __( 'Events' ),
					'singular_name' => __( 'Event' )
				),
				'public' => true,
				'has_archive' => true,
				'menu_position' => 5,
				'supports' => array(
					'title',
					'editor',
					'thumbnail',
					'excerpt',
					'author',
					'comments'
				),
			)
		);
		register_taxonomy(
			'recurring',
			'event',
			array(
				'label' => __( 'Recurring' ),
				'hierarchical' => true,
				'show_ui' => true,
				'capabilities' => array (
		            'manage_terms' => 'edit_posts', // means administrator', 'editor', 'author', 'contributor'
		            'edit_terms' => 'edit_posts',
		            'delete_terms' => 'edit_posts',
		            'assign_terms' => 'edit_posts'
	            )
            )
		);
	}

	// !!IMPORTANT -- FLUSH REWRITE RULES ONLY WHEN CHANGING A TAXONOMY. OTHERWISE, THEY WILL BE CACHED
	//flush_rewrite_rules();

	function isRecurring(){
	  return true;
	}

	function isPastEvent($date){
		if ($date < time()) {
			return true;
		}
	}

	function getFooter(){
	  // this can wait
	}

	function getRecurringEventName($postId) {
		$recurringEvent = get_the_terms($postId, 'recurring');
		foreach($recurringEvent as $event) {
			$name = $event->name;
			return $name;
		}
	}

	function getNextRecurringEventLink($postId, $date) {
		$recurringEvent = get_the_terms($postId, 'recurring');
		foreach($recurringEvent as $event) {
			$slug = $event->slug;
		}
		$args = array(
			'post_type'=>'event',
			'tax_query'=>array(
				array(
					'taxonomy'=>'recurring',
					'field'=>'slug',
					'terms'=>$slug,
				),
			),
		);
		$query = new WP_Query($args);
		$returnedPosts = $query->posts;
		foreach($returnedPosts as $returnedPost) {
			$postStartTime = get_field('start_time', $returnedPost->ID);
			if($postStartTime > time()) {
				$nextRecurringEventLink = get_permalink($returnedPost->ID);
				return $nextRecurringEventLink;
			}
		}
	}

	function getUpcomingEvents() {
		$time = time();
		$args = array(
			'post_type'=>'event',
			'meta_key'     => 'start_time',
			'meta_value'   => $time,
			'meta_compare' => '>',
		);
		$query = new WP_Query($args);
		return $query;
	}

	function getPastEvents() {
		$time = time();
		$args = array(
			'post_type'=>'event',
			'meta_key'     => 'end_time',
			'meta_value'   => $time,
			'meta_compare' => '<',
		);
		$query = new WP_Query($args);
		return $query;
	}

?>
