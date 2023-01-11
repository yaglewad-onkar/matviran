<?php


function ut_child_theme_enqueue_styles() {

    $parent_style = 'ut-main-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'ut-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style )
    );
    
}

add_action( 'wp_enqueue_scripts', 'ut_child_theme_enqueue_styles' );