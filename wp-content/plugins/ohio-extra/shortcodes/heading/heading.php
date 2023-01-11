<?php 

/**
* WPBakery Page Builder Ohio Heading shortcode
*/

add_shortcode( 'ohio_heading', 'ohio_heading_func' );

function ohio_heading_func( $atts ) {
	if ( isset( $atts ) && is_array( $atts ) ) extract( $atts );

	// Default values, parsing and filtering
	$module_type_layout = isset( $module_type_layout ) ? NorExtraFilter::string( $module_type_layout, 'string', 'on_middle' ) : 'on_middle';
	$subtitle_type_layout = isset( $subtitle_type_layout ) ? NorExtraFilter::string( $subtitle_type_layout, 'string', 'bottom_subtitle' ) : 'bottom_subtitle';
	$divider_visible = isset( $divider_visible ) ? NorExtraFilter::boolean( $divider_visible ) : false;
	$heading_type = isset( $heading_type ) ? NorExtraFilter::string( $heading_type, 'string', 'h3' ) : 'h3';

	$divider_alignment = isset( $divider_alignment ) ? NorExtraFilter::string( $divider_alignment, 'string', 'before_title' ) : 'before_title';

	$title = isset( $title ) ? rawurldecode( base64_decode( $title ) ) : '';
	$title = NorExtraFilter::string( $title, 'string', '' );
	$subtitle = isset( $subtitle ) ? rawurldecode( base64_decode( $subtitle ) ) : '';
	$subtitle = NorExtraFilter::string( $subtitle, 'string', '' );
	$subtitle_offset = isset( $subtitle_offset ) ? NorExtraFilter::string( $subtitle_offset, 'string', '' ) : '';
	$title_typo = isset( $title_typo ) ? NorExtraFilter::string( $title_typo ) : false;
	$subtitle_typo = isset( $subtitle_typo ) ? NorExtraFilter::string( $subtitle_typo ) : false;
	$divider_color = isset( $divider_color ) ? NorExtraFilter::string( $divider_color ) : false;

	$appearance_effect = ( isset( $appearance_effect ) ) ? NorExtraFilter::string( $appearance_effect, 'attr', 'none' )  : 'none';
	$appearance_duration = ( isset( $appearance_duration ) ) ? NorExtraFilter::string( $appearance_duration, 'attr', '' )  : '';
	$appearance_delay = isset( $appearance_delay ) ? NorExtraFilter::string( $appearance_delay, 'attr', false ) : false;
	$appearance_delay = intval( str_replace( 'ms', '', $appearance_delay ) );
	if ( $appearance_duration ) $appearance_duration = intval( str_replace( 'ms', '', $appearance_duration ) );
	$appearance_once = isset( $appearance_once ) ? NorExtraFilter::boolean( $appearance_once ) : true;

	$css_class = ( isset( $css_class ) ) ? ' ' . NorExtraFilter::string( $css_class, 'attr', '' )  : '';

	// Styling
	$headings_uniqid = uniqid( 'ohio-custom-' );
	

	$divider_settings = NorExtraParser::VC_color_to_CSS( $divider_color, 'background-color:{{color}};' );

	$title_settings_class = '';
	if ( $subtitle_type_layout == 'top_subtitle' ) { 
		$title_settings_class .= ' subtitle-top';
	}

	$title_css = NorExtraParser::VC_typo_to_CSS( $title_typo );
	$subtitle_css = NorExtraParser::VC_typo_to_CSS( $subtitle_typo );
	$subtitle_settings = '';
	if ( $subtitle_offset ) {
		$subtitle_settings .= 'margin-top:' . $subtitle_offset . ';margin-bottom:' . $subtitle_offset . ';';
	}

	NorExtraParser::VC_typo_custom_font( $title_typo );
	NorExtraParser::VC_typo_custom_font( $subtitle_typo );

	switch ( $module_type_layout ) {
		case 'on_left':
			$css_class .= ' text-left';
			break;
		case 'on_right':
			$css_class .= ' text-right';
			break;
		case 'on_middle':
		default:
			$css_class .= ' text-center';
			break;
	}

	if ( $appearance_effect != 'none' ) {
		OhioHelper::add_required_script( 'aos' );
	}

	// Assembling
	include( plugin_dir_path( __FILE__ ) . 'heading__style.php' );
	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'heading__view.php' );
	return ob_get_clean();
}