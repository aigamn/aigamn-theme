<?php

add_action( 'init', 'create_post_type' );
function create_post_type() {
	register_post_type( 'community',
		array(
				'labels' => array(
				'name' => __( 'Communities' ),
				'singular_name' => __( 'Community' )
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

?>