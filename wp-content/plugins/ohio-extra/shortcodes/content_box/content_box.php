<?php 

/**
* WPBakery Page Builder Ohio Accordion shortcode
*/

add_shortcode( 'ohio_content_box', 'ohio_content_box_func' );

function ohio_content_box_func( $atts, $content = null ) {
	if ( isset( $atts ) && is_array( $atts ) ) extract( $atts );

	$content_styles = isset( $content_styles ) ? NorExtraFilter::string( $content_styles ) : false;
	$content_styles_str = strpos($content_styles, "{");
	
	$border_hover_size = '';
	if ( strpos($content_styles, "border-left-width:") ) {
		$border_hover_str = strpos($content_styles, "border-left-width:") + strlen('border-left-width:');
		$border_hover_str = substr($content_styles, $border_hover_str);
		strpos($border_hover_str, '!');
		$border_hover_size = substr($border_hover_str, 0, strpos($border_hover_str, '!'));
	}
	
	$content_styles_css = substr($content_styles, $content_styles_str);
	$border_hover_color = isset( $border_hover_color ) ? NorExtraFilter::string( $border_hover_color ) : false;
	
	$border_hover_pseudo_color_css = NorExtraParser::VC_color_to_CSS( $border_hover_color, 'background-color:{{color}} !important;' );
	$border_hover_size_css = NorExtraParser::VC_color_to_CSS( $border_hover_size, 'width:{{color}} !important;' );
	$border_hover_color_css = NorExtraParser::VC_color_to_CSS( $border_hover_color, 'border-top-color:{{color}} !important; border-bottom-color:{{color}} !important;border-right-color:{{color}} !important;' );
	$appearance_effect = isset( $appearance_effect ) ? NorExtraFilter::string( $appearance_effect, 'attr', 'none' )  : 'none';
	$appearance_duration = isset( $appearance_duration ) ? NorExtraFilter::string( $appearance_duration, 'attr', false )  : false;
	$appearance_delay = isset( $appearance_delay ) ? NorExtraFilter::string( $appearance_delay, 'attr', false ) : false;
	$appearance_delay = intval( str_replace( 'ms', '', $appearance_delay ) );
	if ( $appearance_duration ) $appearance_duration = intval( str_replace( 'ms', '', $appearance_duration ) );
	$appearance_once = isset( $appearance_once ) ? NorExtraFilter::boolean( $appearance_once ) : true;

	$css_class = isset( $css_class ) ? ' ' . NorExtraFilter::string( $css_class, 'attr', '' )  : '';

	if ( $appearance_effect != 'none' ) {
		OhioHelper::add_required_script( 'aos' );
	}

	// Styling
	$content_box_uniqid = uniqid( 'ohio-custom-' );

	// Assembling
	include( plugin_dir_path( __FILE__ ) . 'content_box__style.php' );
	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'content_box__view.php' );
	return ob_get_clean();
}