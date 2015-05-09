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
					'author'
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

	function getNextRecurringEventLink(){
	  // link or empty
	}

	function getWrapUpLink(){
	  // link or empty
	}

	function getRegistrationLink(){
	  // link or empty
	}

	function isActive(){
	  
	}

	function getFooter(){
	  // this can wait
	}

?>