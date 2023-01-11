<?php 

/**
* WPBakery Page Builder Ohio Button shortcode
*/

add_shortcode( 'ohio_button', 'ohio_button_func' );

function ohio_button_func( $atts ) {
	if ( is_array( $atts ) && is_array( $atts ) ) extract( $atts );

	// Default values, parsing and filtering
	$layout = isset( $layout ) ? NorExtraFilter::string( $layout, 'string', 'fill') : 'fill';
	$text_on_hover = isset( $text_on_hover ) ? NorExtraFilter::boolean( $text_on_hover ) : false;
	$shape_size = isset( $shape_size ) ? NorExtraFilter::string( $shape_size, 'string', '' ) : '';
	$shape_position = isset( $shape_position ) ? NorExtraFilter::string( $shape_position, 'string', 'center' ) : 'center';
	$title = isset( $title ) ? NorExtraFilter::string( $title, 'string', '' ) : '';
	$full_width = isset( $full_width ) ? NorExtraFilter::boolean( $full_width ) : false;
	$title_typo = isset( $title_typo ) ? NorExtraFilter::string( $title_typo ) : false;
	$title_typo_hover = isset( $title_typo_hover ) ? NorExtraFilter::string( $title_typo_hover ) : false;
	$icon_use = isset( $icon_use ) ? NorExtraFilter::boolean( $icon_use ) : false;
	$icon_position = isset( $icon_position ) ? NorExtraFilter::string( $icon_position, 'string', 'left' ) : 'left';
	$icon_type = isset( $icon_type ) ? NorExtraFilter::string( $icon_type, 'string', 'font_icon' ) : 'font_icon';
	$icon_as_icon = isset( $icon_as_icon ) ? NorExtraFilter::string( $icon_as_icon, 'string', '' ) : '';
	$icon_as_image = isset( $icon_as_image ) ? NorExtraFilter::string( $icon_as_image, 'string', '' ) : '';
	$icon_image_atts = NorExtraParser::generateImageAttsById( NorExtraFilter::string( $icon_as_image ), __( 'Icon', 'ohio-extra' ) );

	$color = isset( $color ) ? NorExtraFilter::string( $color, 'string', false ) : false;
	$hover_color = isset( $hover_color ) ? NorExtraFilter::string( $hover_color, 'string', false ) : false;
	$text_color = isset( $text_color ) ? NorExtraFilter::string( $text_color, 'string', false ) : false;

	$appearance_effect = isset( $appearance_effect ) ? NorExtraFilter::string( $appearance_effect, 'attr', 'none' ) : 'none';
	$appearance_duration = isset( $appearance_duration ) ? NorExtraFilter::string( $appearance_duration, 'attr', false ) : false;
	$appearance_delay = isset( $appearance_delay ) ? NorExtraFilter::string( $appearance_delay, 'attr', false ) : false;
	$appearance_delay = intval( str_replace( 'ms', '', $appearance_delay ) );
	if ( $appearance_duration ) $appearance_duration = intval( str_replace( 'ms', '', $appearance_duration ) );
	$appearance_once = isset( $appearance_once ) ? NorExtraFilter::boolean( $appearance_once ) : true;

	$css_class = isset( $css_class ) ? ' ' . NorExtraFilter::string( $css_class, 'attr', '' ) : '';

	$link = NorExtraParser::VC_link_params( ( isset( $link ) ) ? $link : '', array( 'caption' => __( '', 'ohio-extra' ) ) );

	// Styling
	$button_uniqid = uniqid( 'ohio-custom-' );

	if ( $icon_type == 'font_icon' && $icon_as_icon ) {
		$GLOBALS['ohio_icon_fonts'][] = $icon_as_icon;
	} else if ( $icon_as_image ) {
		$icon_src = wp_get_attachment_image_url( $icon_as_image, 'full' );
	}

	$button_class = '';

	if ( $icon_use && $text_on_hover ) {
		$button_class .= ' btn-swap';
	}

	switch ( $layout ) {
		case 'outline':
			$button_class .= ' btn-outline';
			break;
		case 'flat':
			$button_class .= ' btn-flat';
			break;
		case 'link':
			$button_class .= ' btn-link';
			break;
	}

	switch ( $shape_size ) {
		case 'small':
			$button_class .= ' btn-small';
			break;
		case 'large':
			$button_class .= ' btn-large';
			break;
		case 'huge':
			$button_class .= ' btn-huge';
			break;
	}

	$wrap_class = '';

	switch ( $shape_position ) {
		case 'left':
			$wrap_class .= ' text-left';
			break;
		case 'center':
			$wrap_class .= ' text-center';
			break;
		case 'right':
			$wrap_class .= ' text-right';
			break;
	}

	if ( $full_width ) {
		$button_class .= ' full-width';
	}


	$button_settings_css = $button_settings_css_hover = '';

	switch ( $layout ) {
		case 'outline':
			$button_settings_css .= 'border-color:{{color}};color:{{color}};';
			$button_settings_css_hover .= 'color:#fff;background-color:{{color}};border-color:{{color}};';
			break;
		case 'flat':
			$button_settings_css .= 'color:{{color}};';
			$button_settings_css_hover .= 'color:#fff;background-color:{{color}};border-color:{{color}};';
			break;
		case 'link':
			$button_settings_css .= 'color:{{color}};';
			$button_settings_css_hover .= 'color:{{color}};';
			break;
		default:
			$button_settings_css .= ' background-color:{{color}};border-color:{{color}};';
			$button_settings_css_hover .= 'border-color:{{color}};';
	}

	$button_settings = NorExtraParser::VC_color_to_CSS( $color, $button_settings_css );
	$button_hover_settings = NorExtraParser::VC_color_to_CSS(
		( $hover_color ) ? $hover_color : $color, 
		$button_settings_css_hover
	);

	$text_settings = NorExtraParser::VC_color_to_CSS( $text_color, 'color:{{color}};' );

	$button_settings .= $text_settings;

	$title_css = NorExtraParser::VC_typo_to_CSS( $title_typo );
	$title_hover_css = NorExtraParser::VC_typo_to_CSS( $title_typo_hover );

	NorExtraParser::VC_typo_custom_font( $title_typo );
	NorExtraParser::VC_typo_custom_font( $title_typo_hover );

	if ( $appearance_effect != 'none' ) {
		OhioHelper::add_required_script( 'aos' );
	}

	// Assembling
	include( plugin_dir_path( __FILE__ ) . 'button__style.php' );
	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'button__view.php' );
	return ob_get_clean();
}