<?php 

/**
* WPBakery Page Builder Ohio Counter shortcode
*/

add_shortcode( 'ohio_counter', 'ohio_counter_func' );

function ohio_counter_func( $atts ) {
	if ( isset( $atts ) && is_array( $atts ) ) extract( $atts );

	// Default values, parsing and filtering
	$layout = isset( $layout ) ? NorExtraFilter::string( $layout, 'string', 'percent') : 'percent';

	$counter_position = isset( $counter_position ) ? NorExtraFilter::string( $counter_position, 'string', 'center' ) : 'center';
	$count_number = isset( $count_number ) ? NorExtraFilter::string( str_replace( ' ', '', $count_number ), 'string', '0') : '0';
	$title = isset( $title ) ? NorExtraFilter::string( $title, 'string', false) : false;
	$plus_symbol = isset( $plus_symbol ) ? NorExtraFilter::boolean( $plus_symbol ) : false;

	$icon_position = isset( $icon_position ) ? NorExtraFilter::string( $icon_position, 'string', 'left') : 'left';
	$icon_type = isset( $icon_type ) ? NorExtraFilter::string( $icon_type, 'string', 'font_icon' ) : 'font_icon';
	$icon_as_icon = isset( $icon_as_icon ) ? NorExtraFilter::string( $icon_as_icon, 'string', '' ) : '';
	$icon_as_image = isset( $icon_as_image ) ? NorExtraFilter::string( $icon_as_image ) : false;
	$icon_image_atts = NorExtraParser::generateImageAttsById( NorExtraFilter::string( $icon_as_image ), $title );

	$title_typo = isset( $title_typo ) ? NorExtraFilter::string( $title_typo ) : false;
	$count_typo = isset( $count_typo ) ? NorExtraFilter::string( $count_typo ) : false;
	$plus_typo = isset( $plus_typo ) ? NorExtraFilter::string( $plus_typo ) : false;

	$icon_color = isset( $icon_color ) ? NorExtraFilter::string( $icon_color, 'string', false ) : false;

	$appearance_effect = isset( $appearance_effect ) ? NorExtraFilter::string( $appearance_effect, 'attr', 'none' )  : 'none';
	$appearance_duration = isset( $appearance_duration ) ? NorExtraFilter::string( $appearance_duration, 'attr', false )  : false;
	$appearance_delay = isset( $appearance_delay ) ? NorExtraFilter::string( $appearance_delay, 'attr', false ) : false;
	$appearance_delay = intval( str_replace( 'ms', '', $appearance_delay ) );
	$appearance_duration = intval( str_replace( 'ms', '', $appearance_duration ) );
	$appearance_once = isset( $appearance_once ) ? NorExtraFilter::boolean( $appearance_once ) : true;

	$css_class = isset( $css_class ) ? NorExtraFilter::string( $css_class, 'attr', '' ) : '';

	// Styling
	$counter_box_uniqid = uniqid( 'ohio-custom-' );
	$wrap_classes = [];

	switch ( $counter_position ) {
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
	
	if ( $icon_type == 'font_icon' && $icon_as_icon ) {
		$GLOBALS['ohio_icon_fonts'][] = $icon_as_icon;
	}

	$icon_css = NorExtraParser::VC_color_to_CSS( $icon_color, 'color:{{color}};' );

	NorExtraParser::VC_typo_custom_font( $title_typo );
	NorExtraParser::VC_typo_custom_font( $count_typo );
	NorExtraParser::VC_typo_custom_font( $plus_typo );


	$title_css = NorExtraParser::VC_typo_to_CSS( $title_typo );
	$count_css = NorExtraParser::VC_typo_to_CSS( $count_typo );
	$plus_css = NorExtraParser::VC_typo_to_CSS( $plus_typo );

	$title_css = $title_css ? $title_css : false;

	$wrap_classes[] = $css_class;

	if ( $appearance_effect != 'none' ) {
		OhioHelper::add_required_script( 'aos' );
	}

	// Assembling
	include( plugin_dir_path( __FILE__ ) . 'counter__style.php' );
	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'counter__view.php' );
	return ob_get_clean();
}