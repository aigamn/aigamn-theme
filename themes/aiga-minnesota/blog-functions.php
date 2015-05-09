<?php
add_action( 'init', 'create_book_tax' );

function create_book_tax() {
	register_taxonomy(
		'post_community',
		'post',
		array(
			'label' => __( 'Community' ),
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
?>