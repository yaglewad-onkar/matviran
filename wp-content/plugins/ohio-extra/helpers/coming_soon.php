<?php

add_filter( 'template_include', 'ohio_coming_soon_page_template', 99 );

function ohio_coming_soon_page_template( $template ) {
    if ( method_exists( 'OhioSettings', 'is_coming_soon_page' ) && OhioSettings::is_coming_soon_page() ) {
        wp_register_script( 'jquery-countdown', get_template_directory_uri() . '/assets/js/libs/jquery.countdown.min.js', [ 'jquery' ], '1.0.0', true );
        wp_enqueue_script( 'jquery-countdown' );
        $template = get_template_directory() . '/coming-soon.php';
    }

    return $template;
}

/*
Old way

add_action( 'init', function() {
    if ( method_exists( 'OhioSettings', 'is_coming_soon_page' ) && OhioSettings::is_coming_soon_page() ) {
        $charset = get_bloginfo('charset') ? get_bloginfo('charset') : 'UTF-8';

        ob_start();
        header("Content-type: text/html; charset=$charset");
        header("HTTP/1.0 503 Service Unavailable", true, 503);

        wp_register_script( 'jquery-countdown', get_template_directory_uri() . '/assets/js/libs/jquery.countdown.min.js', [ 'jquery' ], '1.0.0', true );
        wp_enqueue_script( 'jquery-countdown' );
        include_once( get_template_directory() . '/coming-soon.php' );

        ob_flush();

        exit;
    }
} );
*/
