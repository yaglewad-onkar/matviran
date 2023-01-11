<?php 

/**
* WPBakery Page Builder Ohio Text shortcode
*/

add_shortcode( 'ohio_text', 'ohio_text_func' );

function ohio_text_func( $atts, $content_html = '' ) {
	if ( isset( $atts ) && is_array( $atts ) ) extract( $atts );

	// Default values, parsing and filtering
	$text_typo = isset( $text_typo ) ? NorExtraFilter::string( $text_typo ) : false;

	$text_color = ( isset( $text_color ) ) ? NorExtraFilter::string( $text_color ) : false;

	$appearance_effect = isset( $appearance_effect ) ? NorExtraFilter::string( $appearance_effect, 'attr', 'none' ) : 'none';
	$appearance_duration = isset( $appearance_duration ) ? NorExtraFilter::string( $appearance_duration, 'attr', false ) : false;
	$appearance_delay = isset( $appearance_delay ) ? NorExtraFilter::string( $appearance_delay, 'attr', false ) : false;
	$appearance_delay = intval( str_replace( 'ms', '', $appearance_delay ) );
	if ( $appearance_duration ) $appearance_duration = intval( str_replace( 'ms', '', $appearance_duration ) );
	$appearance_once = isset( $appearance_once ) ? NorExtraFilter::boolean( $appearance_once ) : true;
	
	$css_class = isset( $css_class ) ? NorExtraFilter::string( $css_class, 'attr', '' )  : '';

	// Handling
	$content_html = wpautop( $content_html );

	// Styling
	$text_uniqid = uniqid( 'ohio-custom-' );

	$text_css = NorExtraParser::VC_typo_to_CSS( $text_typo );
	NorExtraParser::VC_typo_custom_font( $text_typo );


	if ( $appearance_effect != 'none' ) {
		OhioHelper::add_required_script( 'aos' );
	}

	// Assembling
	include( plugin_dir_path( __FILE__ ) . 'text__style.php' );
	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'text__view.php' );
	return ob_get_clean();
}