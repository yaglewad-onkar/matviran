<?php

function ohio_init_customizer( $wp_customize ) {
	//$wp_customize->remove_section( 'title_tagline' );
	$wp_customize->remove_control( 'blogdescription' );
	$wp_customize->remove_control( 'display_header_text' );
	$wp_customize->remove_section( 'colors' );
	$wp_customize->remove_section( 'header_image' );
	$wp_customize->remove_section( 'background_image' );
	$wp_customize->remove_section( 'nav' );
	$wp_customize->remove_section( 'static_front_page' );
}

add_action( 'customize_register', 'ohio_init_customizer' );