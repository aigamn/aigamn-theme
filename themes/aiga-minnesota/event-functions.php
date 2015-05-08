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
				'supports' => array( 
					'title', 
					'editor',
					'thumbnail', 
					'excerpt',
					'author',
					'revisions'
				),
			)
		);
	}

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