<?php 

/**
* WPBakery Page Builder Ohio Vertical Fullscreen Slider shortcode
*/

add_shortcode( 'ohio_sticky_section', 'ohio_sticky_section_func' );

function ohio_sticky_section_func( $atts, $content = '' ) {
	$css_class = $animation_duration = $navigation_show = $elements_color = $pagination_type = $pagination_show = NULL;
	if ( isset( $atts ) && is_array( $atts ) ) extract( $atts );

	// Default values, parsing and filtering
	
	$elements_color = isset( $elements_color ) ? NorExtraFilter::string( $elements_color, 'string', false ) : false;
	$fullscreen_mode = isset( $fullscreen_mode ) ? NorExtraFilter::boolean( $fullscreen_mode, true ) : true;
	$animation_duration = isset( $animation_duration ) ? NorExtraFilter::string( $animation_duration, 'string', 'default' ) : 'default';

	$css_class = ( $css_class ) ? NorExtraFilter::string( $css_class, 'attr', '' ) : '';

	// Styles
	$sticky_section_unicid = uniqid( 'ohio-custom-' );
	$sticky_section_object = (object) array();

	$sticky_section_json = json_encode( $sticky_section_object );

	$wrap_classes = [];
	$wrap_classes[] = $css_class;
	if ( $fullscreen_mode ) {
		$wrap_classes[] = 'full-vh';
	}

	// Assembling
	include( plugin_dir_path( __FILE__ ) . 'sticky_section__style.php' );
	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'sticky_section__view.php' );
	return ob_get_clean();
}