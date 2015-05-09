<?php

add_action( 'init', 'create_community_post_type' );
function create_community_post_type() {
	register_post_type( 'community',
		array(
				'labels' => array(
				'name' => __( 'Communities' ),
				'singular_name' => __( 'Community' )
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
}

?>