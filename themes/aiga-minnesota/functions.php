<?php

    add_theme_support( 'post-thumbnails');

    include 'functions-event.php';
    include 'functions-community.php';
    include 'functions-post-footer.php';
    include 'functions-sponsor.php';

    // [get_name login="username"]
    function get_name_func( $atts ) {
        $a = shortcode_atts( array(
            'login' => ''
        ), $atts );

        $username = $a['login'];
        //die($username);
        $user = get_user_by( 'login', $username );

        return $user->display_name;
    }
    add_shortcode( 'get_name', 'get_name_func' );

    // [bootstrap_button copy='Button Text' type='primary' link='http://google.com']
    function bootstrap_button_func( $atts ) {
        $a = shortcode_atts( array(
            'copy' => '',
            'type' => 'primary',
            'link' => ''
        ), $atts );

        // check to see if link is external, and set target appropriately

        $copy = $a['copy'];
        $type = $a['type'];
        $link = $a['link'];

        return '<a class="btn btn-' . $type . '" href="' . $link . '">' . $copy . '</a>';
    }
    add_shortcode( 'bootstrap_button', 'bootstrap_button_func' );

    function lead_paragraphs($content) {
        if( is_page() ){
            $content = preg_replace('/<p([^>]+)?>/m', '<p$1 class="lead">', $content);
        }
        
        return $content;
    }

    add_filter( 'the_content', 'lead_paragraphs' );
?>
