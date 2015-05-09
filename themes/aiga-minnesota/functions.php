<?php

    add_theme_support( 'post-thumbnails');

    include 'functions-event.php';
    include 'functions-community.php';
    include 'functions-post-footer.php';
    include 'functions-sponsor.php';

    // [get_name username="username"]
    function get_name_func( $atts ) {
        $a = shortcode_atts( array(
            'username' => ''
        ), $atts );

        $username = $a['username'];
        //die($username);
        $user = get_user_by( 'login', $username );
        

        return $user->display_name;
    }
    add_shortcode( 'get_name', 'get_name_func' );
    /*add_action( 'init', 'testfunc' );
    function testfunc(){
        $a = shortcode_atts( array(
            'username' => ''
        ), $atts );

        $username = $a['username'];
        $user = get_user_by( 'login', $username );
        die($user);

        return $user;
    }*/
?>
