<?php 

/**
* WPBakery Page Builder Ohio Process shortcode
*/

add_shortcode( 'ohio_process', 'ohio_process_func' );

function ohio_process_func( $atts ) {
	if ( isset( $atts ) && is_array( $atts ) ) extract( $atts );

	// Default values, parsing and filtering
	$number = isset( $number ) ? NorExtraFilter::string( $number, 'string', 'Step 1' ) : 'Step 1.';
	$title = isset( $title ) ? NorExtraFilter::string( $title, 'string', '' ) : '';
	$description = isset( $description ) ? NorExtraFilter::string( $description, 'textarea', '' ) : '';
	$number_typo = isset( $number_typo ) ? NorExtraFilter::string( $number_typo ) : false;
	$title_typo = isset( $title_typo ) ? NorExtraFilter::string( $title_typo ) : false;
	$description_typo = isset( $description_typo ) ? NorExtraFilter::string( $description_typo ) : false;
	$bg_color = isset( $bg_color ) ? NorExtraFilter::string( $bg_color ) : false;
	
	$appearance_effect = isset( $appearance_effect ) ? NorExtraFilter::string( $appearance_effect, 'attr', 'none' )  : 'none';
	$appearance_duration = isset( $appearance_duration ) ? NorExtraFilter::string( $appearance_duration, 'attr', false )  : false;
	$appearance_delay = isset( $appearance_delay ) ? NorExtraFilter::string( $appearance_delay, 'attr', false ) : false;
	$appearance_delay = intval( str_replace( 'ms', '', $appearance_delay ) );
	if ( $appearance_duration ) $appearance_duration = intval( str_replace( 'ms', '', $appearance_duration ) );
	$appearance_once = isset( $appearance_once ) ? NorExtraFilter::boolean( $appearance_once ) : true;
	
	$css_class = isset( $css_class ) ? ' ' . NorExtraFilter::string( $css_class, 'attr', '' )  : '';

	// Styling
	$process_uniqid = uniqid( 'ohio-custom-' );

	$process_settings = NorExtraParser::VC_color_to_CSS( $bg_color, 'background-color:{{color}};' );

	$number_settings = NorExtraParser::VC_typo_to_CSS( $number_typo );
	$title_settings = NorExtraParser::VC_typo_to_CSS( $title_typo );
	$description_settings = NorExtraParser::VC_typo_to_CSS( $description_typo );

	NorExtraParser::VC_typo_custom_font( $title_typo );
	NorExtraParser::VC_typo_custom_font( $description_typo );

	if ( $appearance_effect != 'none' ) {
		OhioHelper::add_required_script( 'aos' );
	}

	// Assembling
	include( plugin_dir_path( __FILE__ ) . 'process__style.php' );
	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'process__view.php' );
	return ob_get_clean();
}