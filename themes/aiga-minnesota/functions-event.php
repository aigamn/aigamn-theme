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

	function getFooter(){
		// this can wait
	}

	function getCommunities($postId) {
		$communities = get_field('community', $postId);
		return $communities;
	}

	function isRecurringEvent($postId){
		$recurringEvent = get_the_terms($postId, 'recurring');
		if($recurringEvent != "") {
			return true;
		}
		return false;
	}

	function isPastEvent($date){
		if ($date < time()) {
			return true;
		}
	}

	function getRecurringEventName($postId) {
		$recurringEvent = get_the_terms($postId, 'recurring');
		if($recurringEvent){
			foreach($recurringEvent as $event) {
				return $event->name;
			}
		}
		return false;
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

	function getUpcomingEvents($number = 0) {
		$time = time();
		$args = array(
			'post_type'			=>'event',
			'meta_key'    	=> 'start_time',
			'meta_value'  	=> $time,
			'meta_compare'	=> '>',
		);
		if($number > 0) {
			$args['posts_per_page'] = $number;
		}
		$query = new WP_Query($args);
		return $query;
	}

	function getUpcomingCommunityEvents($number = 0) {
		$time = time();
		$args = array(
			'post_type'			=>'event',
			'meta_query'		=> array(
				array(
					'key'    	=> 'start_time',
					'value'  	=> $time,
					'compare'	=> '>',
				),
				array(
					'key'    	=> 'community',
					'value'		=> '',
					'compare'	=> '!=',
				),
			),
		);
		if($number > 0) {
			$args['posts_per_page'] = $number;
		}
		$query = new WP_Query($args);
		return $query;
	}

	function getUpcomingEventsByCommunity($communityPostId, $number = 0) {
		$args = array(
			'post_type'			=>'event',
			'meta_query'		=> array(
				array(
					'key'    	=> 'start_time',
					'value'  	=> $time,
					'compare'	=> '>',
				),
				array(
					'key'    	=> 'community',
					'value'		=> $communityPostId,
					'compare'	=> '=',
				),
			),
		);
		if($number > 0) {
			$args['posts_per_page'] = $number;
		}
		$query = new WP_Query($args);
		return $query;
	}

	function getUpcomingNonCommunityEvents($number = 0) {
		$time = time();
		$args = array(
			'post_type'			=>'event',
			'meta_query'		=> array(
				array(
					'key'    	=> 'start_time',
					'value'  	=> $time,
					'compare'	=> '>',
				)/*,
				array(
					'key'    	=> 'community',
					'value'		=> '',
					'compare'	=> '=',
				),*/
			),
		);
		if($number > 0) {
			$args['posts_per_page'] = $number;
		}
		$query = new WP_Query($args);
		return $query;
	}

	function getPastEvents() {
		$time = time();
		$args = array(
			'post_type'			=>'event',
			'meta_key'     	=> 'end_time',
			'meta_value'   	=> $time,
			'meta_compare' 	=> '<',
		);
		$query = new WP_Query($args);
		return $query;
	}

?>
