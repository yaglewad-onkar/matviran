<?php 

/**
* WPBakery Page Builder Ohio Accordion Inner shortcode
*/

add_shortcode( 'ohio_accordion_inner', 'ohio_accordion_inner_func' );

function ohio_accordion_inner_func( $atts, $content_html = '' ) {
	if ( isset( $atts ) && is_array( $atts ) ) extract( $atts );

	// Default values, parsing and filtering
	$heading = isset( $heading ) ? NorExtraFilter::string( $heading, 'string', '' ) : '';
	$with_icon = isset( $with_icon ) ? NorExtraFilter::boolean( $with_icon ) : false;
	$icon_as_icon = isset( $icon_as_icon ) ? NorExtraFilter::string( $icon_as_icon, 'attr' ) : false;
	$is_active = isset( $is_active ) ? NorExtraFilter::boolean( $is_active ) : false;

	$heading_typo = isset( $heading_typo ) ? NorExtraFilter::string( $heading_typo ) : false;
	$content_typo = isset( $content_typo ) ? NorExtraFilter::string( $content_typo ) : false;

	$heading_text_color = isset( $heading_text_color ) ? NorExtraFilter::string( $heading_text_color ) : false;
	$content_color = isset( $content_color ) ? NorExtraFilter::string( $content_color ) : false;
	$icon_color = isset( $icon_color ) ? NorExtraFilter::string( $icon_color ) : false;
	$heading_fill_color = isset( $heading_fill_color ) ? NorExtraFilter::string( $heading_fill_color ) : false;

	$css_class = isset( $css_class ) ? ' ' . NorExtraFilter::string( $css_class, 'attr', '' )  : '';
	$accordion_content_class = '';
	if ($is_active) {
		$css_class .= " active";
		$accordion_content_class = "visible";
	}

	// Handling
	$content_html = wpautop( $content_html );

	// Styling
	$accordion_inner_uniqid = isset( $tab_id ) ? $tab_id : uniqid( 'ohio-custom-' );

	if ( $with_icon && $icon_as_icon ) {
		$GLOBALS['ohio_icon_fonts'][] = $icon_as_icon;
	}

	$heading_css = NorExtraParser::VC_typo_to_CSS( $heading_typo ) . NorExtraParser::VC_color_to_CSS( $heading_text_color, 'color:{{color}};' );
	$content_css = NorExtraParser::VC_typo_to_CSS( $content_typo ) . NorExtraParser::VC_color_to_CSS( $content_color, 'color:{{color}};' );
	$icon_css = NorExtraParser::VC_color_to_CSS( $icon_color, 'color:{{color}};' );
	$head_fill_css = NorExtraParser::VC_color_to_CSS( $heading_fill_color, 'background-color:{{color}};' );

	NorExtraParser::VC_typo_custom_font( $heading_typo );
	NorExtraParser::VC_typo_custom_font( $content_typo );

	// Assembling
	include( plugin_dir_path( __FILE__ ) . 'accordion_inner__style.php' );
	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'accordion_inner__view.php' );
	return ob_get_clean();
}