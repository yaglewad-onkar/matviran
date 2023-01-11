<?php 

/**
* WPBakery Page Builder Ohio Progress Bar shortcode
*/

add_shortcode( 'ohio_progress_bar', 'ohio_progress_bar_func' );

function ohio_progress_bar_func( $atts ) {
	if ( isset( $atts ) && is_array( $atts ) ) extract( $atts );

	// Default values, parsing and filtering
	$layout = isset( $layout ) ? NorExtraFilter::string( $layout, 'string', 'default') : 'default';
	$percent_in_tooltip = ( isset( $percent_in_tooltip ) ) ? NorExtraFilter::boolean( $percent_in_tooltip ) : false;
	$name = ( isset( $name ) ) ? NorExtraFilter::string( $name, 'string', '' ) : '';
	$percent = ( isset( $percent ) ) ? NorExtraFilter::string( $percent, 'string', '100' ) : '100';

	$name_typo = ( isset( $name_typo ) ) ? NorExtraFilter::string( $name_typo ) : false;
	$percent_typo = ( isset( $percent_typo ) ) ? NorExtraFilter::string( $percent_typo ) : false;

	$bar_bg_color = isset( $bar_bg_color ) ? NorExtraFilter::string( $bar_bg_color, 'string', false ) : false;
	$bar_line_color = isset( $bar_line_color ) ? NorExtraFilter::string( $bar_line_color, 'string', false ) : false;
	$tooltip_color = isset( $tooltip_color ) ? NorExtraFilter::string( $tooltip_color, 'string', false ) : false;

	$appearance_effect = isset( $appearance_effect ) ? NorExtraFilter::string( $appearance_effect, 'attr', 'none' )  : 'none';
	$appearance_duration = isset( $appearance_duration ) ? NorExtraFilter::string( $appearance_duration, 'attr', false )  : false;
	$appearance_delay = isset( $appearance_delay ) ? NorExtraFilter::string( $appearance_delay, 'attr', false ) : false;
	$appearance_delay = intval( str_replace( 'ms', '', $appearance_delay ) );
	if ( $appearance_duration ) $appearance_duration = intval( str_replace( 'ms', '', $appearance_duration ) );
	$appearance_once = isset( $appearance_once ) ? NorExtraFilter::boolean( $appearance_once ) : true;
	
	$css_class = isset( $css_class ) ? ' ' . NorExtraFilter::string( $css_class, 'attr', '' ) : '';

	$percent = intval($percent);
	if ( $percent < 0 || $percent > 100 ) {
		$percent = 100;
	}

	// Styling
	$progress_bar_uniqid = uniqid( 'ohio-custom-' );

	switch ( $layout ) {
		case 'inner':
			$progress_bar_class = ' inner';
			break;
		case 'pattern':
			$progress_bar_class = ' pattern';
			break;
		default:
			$progress_bar_class = false;
	}

	$bar_bg_settings = NorExtraParser::VC_color_to_CSS( $bar_bg_color, 'background-color:{{color}};' );
	$bar_line_settings = NorExtraParser::VC_color_to_CSS( $bar_line_color, 'background-color:{{color}};' );
	$tooltip_settings = NorExtraParser::VC_color_to_CSS( $tooltip_color, 'background-color:{{color}};' );

	$label_settings = NorExtraParser::VC_typo_to_CSS( $name_typo );
	$percent_settings = NorExtraParser::VC_typo_to_CSS( $percent_typo );

	NorExtraParser::VC_typo_custom_font( $percent_typo );
	NorExtraParser::VC_typo_custom_font( $name_typo );

	if ( $appearance_effect != 'none' ) {
		OhioHelper::add_required_script( 'aos' );
	}

	// Assembling
	include( plugin_dir_path( __FILE__ ) . 'progress_bar__style.php' );
	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'progress_bar__view.php' );
	return ob_get_clean();
}