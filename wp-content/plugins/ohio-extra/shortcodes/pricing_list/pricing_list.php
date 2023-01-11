<?php 

/**
* WPBakery Page Builder Ohio Pricing List shortcode
*/

add_shortcode( 'ohio_pricing_list', 'ohio_pricing_list_func' );

function ohio_pricing_list_func( $atts ) {
	if ( isset( $atts ) && is_array( $atts ) ) extract( $atts );

	// Default values, parsing and filtering
	$name = isset( $name ) ? NorExtraFilter::string( $name, 'string', '') : '';
	$indigriends = isset( $indigriends ) ? NorExtraFilter::string( $indigriends, 'string', '') : '';
	$sale_price = isset( $sale_price ) ? NorExtraFilter::string( $sale_price, 'string', '') : '';
	$regular_price = isset( $regular_price ) ? NorExtraFilter::string( $regular_price, 'string', '') : '';
	$mark = isset( $new ) ? NorExtraFilter::boolean( $new ) : false;

	$title_typo = isset( $title_typo ) ? NorExtraFilter::string( $title_typo ) : false;
	$details_typo = isset( $details_typo ) ? NorExtraFilter::string( $details_typo ) : false;
	$sale_price_typo = isset( $sale_price_typo ) ? NorExtraFilter::string( $sale_price_typo ) : false;
	$regular_price_typo = isset( $regular_price_typo ) ? NorExtraFilter::string( $regular_price_typo ) : false;
	$mark_typo = isset( $mark_typo ) ? NorExtraFilter::string( $mark_typo ) : false;

	$border_color = isset( $border_color ) ? NorExtraFilter::string( $border_color, 'string', false ) : false;
	$mark_background_color = isset( $mark_background_color ) ? NorExtraFilter::string( $mark_background_color, 'string', false ) : false;

	$appearance_effect = isset( $appearance_effect ) ? NorExtraFilter::string( $appearance_effect, 'attr', 'none' ) : 'none';
	$appearance_duration = isset( $appearance_duration ) ? NorExtraFilter::string( $appearance_duration, 'attr', false ) : false;
	$appearance_delay = isset( $appearance_delay ) ? NorExtraFilter::string( $appearance_delay, 'attr', false ) : false;
	$appearance_delay = intval( str_replace( 'ms', '', $appearance_delay ) );
	if ( $appearance_duration ) $appearance_duration = intval( str_replace( 'ms', '', $appearance_duration ) );
	$appearance_once = isset( $appearance_once ) ? NorExtraFilter::boolean( $appearance_once ) : true;

	$css_class = isset( $css_class ) ? ' ' . NorExtraFilter::string( $css_class, 'attr', '' ) : '';

	// Styling
	$menu_list_uniqid = uniqid( 'ohio-custom-' );

	$border_css = ( $border_color ) ? 'border-color: ' . $border_color . ';' : '';

	NorExtraParser::VC_typo_custom_font( $title_typo );
	NorExtraParser::VC_typo_custom_font( $details_typo );
	NorExtraParser::VC_typo_custom_font( $sale_price_typo );
	NorExtraParser::VC_typo_custom_font( $regular_price_typo );
	NorExtraParser::VC_typo_custom_font( $mark_typo );

	$title_css = NorExtraParser::VC_typo_to_CSS( $title_typo );
	$details_css = NorExtraParser::VC_typo_to_CSS( $details_typo );
	$sale_price_css = NorExtraParser::VC_typo_to_CSS( $sale_price_typo );
	$regular_price_css = NorExtraParser::VC_typo_to_CSS( $regular_price_typo );
	$mark_css = NorExtraParser::VC_typo_to_CSS( $mark_typo );
	$mark_css .= ( $mark_background_color ) ? 'background-color: ' . $mark_background_color . ';' : '';

	if ( $appearance_effect != 'none' ) {
		OhioHelper::add_required_script( 'aos' );
	}

	// Assembling
	include( plugin_dir_path( __FILE__ ) . 'pricing_list__style.php' );
	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'pricing_list__view.php' );
	return ob_get_clean();
}