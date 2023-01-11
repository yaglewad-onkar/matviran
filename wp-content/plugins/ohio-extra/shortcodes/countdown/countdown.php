<?php 

/**
* WPBakery Page Builder Ohio Countdown shortcode
*/

add_shortcode( 'ohio_countdown', 'ohio_countdown_func' );

function ohio_countdown_func( $atts ) {
	if ( isset( $atts ) && is_array( $atts ) ) extract( $atts );

	// Default values, parsing and filtering
	$layout = isset( $layout ) ? NorExtraFilter::string( $layout, 'string', 'default') : 'default';
	
	$countdown_position = isset( $countdown_position ) ? NorExtraFilter::string( $countdown_position, 'string', 'center' ) : 'center';
	$countdown_classic = isset( $countdown_classic ) ? NorExtraFilter::boolean( $countdown_classic ) : false;
	// $rounded_shape = isset( $rounded_shape ) ? NorExtraFilter::boolean( $rounded_shape ) : false;
	$countdown_date = isset( $countdown_date ) ? NorExtraFilter::string( $countdown_date, 'string', '2019/1/1 0:0:0') : '2019/1/1 0:0:0';

	$numbers_typo = isset( $numbers_typo ) ? NorExtraFilter::string( $numbers_typo ) : false;
	$titles_typo = isset( $titles_typo ) ? NorExtraFilter::string( $titles_typo ) : false;

	$numbers_color = isset( $numbers_color ) ? NorExtraFilter::string( $numbers_color, 'string', false ) : false;
	$titles_color = isset( $titles_color ) ? NorExtraFilter::string( $titles_color, 'string', false ) : false;
	$box_color = isset( $box_color ) ? NorExtraFilter::string( $box_color, 'string', false ) : false;
	$box_border_color = isset( $box_border_color ) ? NorExtraFilter::string( $box_border_color, 'string', false ) : false;
	$divider_dots_color = isset( $divider_dots_color ) ? NorExtraFilter::string( $divider_dots_color, 'string', false ) : false;

	$appearance_effect = isset( $appearance_effect ) ? NorExtraFilter::string( $appearance_effect, 'attr', 'none' )  : 'none';
	$appearance_duration = isset( $appearance_duration ) ? NorExtraFilter::string( $appearance_duration, 'attr', false )  : false;
	$appearance_delay = isset( $appearance_delay ) ? NorExtraFilter::string( $appearance_delay, 'attr', false ) : false;
	$appearance_delay = intval( str_replace( 'ms', '', $appearance_delay ) );
	if ( $appearance_duration ) $appearance_duration = intval( str_replace( 'ms', '', $appearance_duration ) );
	$appearance_once = isset( $appearance_once ) ? NorExtraFilter::boolean( $appearance_once ) : true;

	$css_class = isset( $css_class ) ? NorExtraFilter::string( $css_class, 'attr', '' ) : '';

	// Styling
	$countdown_box_uniqid = uniqid( 'ohio-custom-' );
	$wrap_classes = [];

	// OhioHelper::add_required_script( 'underscore' );
	OhioHelper::add_required_script( 'countdown-box' );

	if ( $layout == 'boxed' ) {
		$wrap_classes[] = 'countdown-boxed';
	}
	if ( $countdown_classic ) {
		$wrap_classes[] = 'countdown-classic';
	}
	
	switch ( $countdown_position ) {
		case 'center':
			$wrap_classes[] = 'text-center';
			break;
		case 'left':
			$wrap_classes[] = 'text-left';
			break;
		case 'right':
			$wrap_classes[] = 'text-right';
			break;
	}

	$box_bg_settings = NorExtraParser::VC_color_to_CSS( $box_color, 'background-color:{{color}};' );
	$dividers_settings = NorExtraParser::VC_color_to_CSS( $divider_dots_color, 'background-color:{{color}};' );

	NorExtraParser::VC_typo_custom_font( $numbers_typo );
	NorExtraParser::VC_typo_custom_font( $titles_typo );

	$numbers_settings = NorExtraParser::VC_typo_to_CSS( $numbers_typo );
	$titles_settings = NorExtraParser::VC_typo_to_CSS( $titles_typo );

	$wrap_classes[] = $css_class;

	if ( $appearance_effect != 'none' ) {
		OhioHelper::add_required_script( 'aos' );
	}

	// Assembling
	include( plugin_dir_path( __FILE__ ) . 'countdown__style.php' );
	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'countdown__view.php' );
	return ob_get_clean();
}