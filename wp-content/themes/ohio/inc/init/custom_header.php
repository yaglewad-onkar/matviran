<?php

function ohio_init_custom_header() {
	add_theme_support( 'custom-header', apply_filters( 'ohio_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '000000',
		'width'                  => 1000,
		'height'                 => 250,
		'flex-height'            => true,
		'wp-head-callback'       => 'ohio_init_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'ohio_init_custom_header' );

if ( ! function_exists( 'ohio_init_header_style' ) ) {
	function ohio_init_header_style() {
		// Thats all
	}
}