<?php 

/**
* WPBakery Page Builder Ohio Compare shortcode
*/

add_shortcode( 'ohio_compare', 'ohio_compare_func' );

function ohio_compare_func( $atts ) {
	if ( isset( $atts ) && is_array( $atts ) ) extract( $atts );

	// Default values, parsing and filtering
	$first_image = isset( $first_image ) ? NorExtraFilter::string( $first_image ) : false;
	$second_image = isset( $second_image ) ? NorExtraFilter::string( $second_image ) : false;

	$first_image_atts = NorExtraParser::generateImageAttsById( NorExtraFilter::string( $first_image ), __( 'Before', 'ohio-extra' ) );
	$second_image_atts = NorExtraParser::generateImageAttsById( NorExtraFilter::string( $second_image ), __( 'After', 'ohio-extra' ) );

	$hide_overlay = isset( $hide_overlay ) ? NorExtraFilter::boolean( $hide_overlay ) : false;
	$label_before = isset( $before_label_text ) ? NorExtraFilter::string( $before_label_text, 'string', 'Before' ) : 'Before';
	$label_after = isset( $after_label_text ) ? NorExtraFilter::string( $after_label_text, 'string', 'After' ) : 'After';
	$handler_color = isset( $handler_color ) ? NorExtraFilter::string( $handler_color, 'string', false ) : false;
	$position = isset( $position ) ? round(intval($position) / 100, 2) : '0.5';
	$orientation = isset( $orientation_type ) ? NorExtraFilter::string( $orientation_type, 'string', 'horizontal' ) : 'horizontal';

	$appearance_effect = isset( $appearance_effect ) ? NorExtraFilter::string( $appearance_effect, 'attr', 'none' ) : 'none';
	$appearance_duration = isset( $appearance_duration ) ? NorExtraFilter::string( $appearance_duration, 'attr', false ) : false;
	$appearance_delay = isset( $appearance_delay ) ? NorExtraFilter::string( $appearance_delay, 'attr', false ) : false;
	$appearance_delay = intval( str_replace( 'ms', '', $appearance_delay ) );
	if ( $appearance_duration ) $appearance_duration = intval( str_replace( 'ms', '', $appearance_duration ) );
	$appearance_once = isset( $appearance_once ) ? NorExtraFilter::boolean( $appearance_once ) : true;

	$css_class = ( isset( $css_class ) ) ? NorExtraFilter::string( $css_class, 'attr', '' )  : '';

	// Styling
	$compare_uniqid = uniqid( 'ohio-custom-' );

	OhioHelper::add_required_script( 'compare' );
	if ( $appearance_effect != 'none' ) {
		OhioHelper::add_required_script( 'aos' );
	}

	// Assembling
	include( plugin_dir_path( __FILE__ ) . 'compare__style.php' );
	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'compare__view.php' );
	return ob_get_clean();
}

