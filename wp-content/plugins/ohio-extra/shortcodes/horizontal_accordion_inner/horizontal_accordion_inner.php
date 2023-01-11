<?php 

/**
* WPBakery Page Builder Ohio Accordion Inner shortcode
*/

add_shortcode( 'ohio_horizontal_accordion_inner', 'ohio_horizontal_accordion_inner_func' );

function ohio_horizontal_accordion_inner_func( $atts, $content_html = '' ) {
	if ( isset( $atts ) && is_array( $atts ) ) extract( $atts );

	// Default values, parsing and filtering

	$css_class = isset( $css_class ) ? ' ' . NorExtraFilter::string( $css_class, 'attr', '' )  : '';

	// Handling
	$content_html = wpautop( $content_html );

	// Styling
	$horizontal_accordion_inner_uniqid = isset( $tab_id ) ? $tab_id : uniqid( 'ohio-custom-' );


	// Assembling
	include( plugin_dir_path( __FILE__ ) . 'horizontal_accordion_inner__style.php' );
	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'horizontal_accordion_inner__view.php' );
	return ob_get_clean();
}