<?php 

/**
* WPBakery Page Builder Ohio Message box shortcode
*/

add_shortcode( 'ohio_message_module', 'ohio_message_module_func' );

function ohio_message_module_func( $atts ) {
	if ( isset( $atts ) && is_array( $atts ) ) extract( $atts );

	// Default values, parsing and filtering
	$layout = isset( $layout ) ? NorExtraFilter::string( $layout, 'string', 'default' ) : 'default';
	$text = isset( $text ) ? rawurldecode( base64_decode( $text ) ) : '';
	$text = NorExtraFilter::string( $text, 'string', '' );
	$full_width = isset( $full_width ) ? NorExtraFilter::boolean( $full_width, true ) : true;
	$without_close_button = isset( $without_close_button ) ? NorExtraFilter::boolean( $without_close_button, false ) : false;
	$text_typo = isset( $text_typo ) ? NorExtraFilter::string( $text_typo ) : false;
	$link_typo = isset( $link_typo ) ? NorExtraFilter::string( $link_typo ) : false;
	$bg_color = isset( $bg_color ) ? NorExtraFilter::string( $bg_color, 'string', false ) : false;

	$appearance_effect = isset( $appearance_effect ) ? NorExtraFilter::string( $appearance_effect, 'attr', 'none' ) : 'none';
	$appearance_duration = isset( $appearance_duration ) ? NorExtraFilter::string( $appearance_duration, 'attr', false ) : false;
	$appearance_delay = isset( $appearance_delay ) ? NorExtraFilter::string( $appearance_delay, 'attr', false ) : false;
	$appearance_delay = intval( str_replace( 'ms', '', $appearance_delay ) );
	if ( $appearance_duration ) $appearance_duration = intval( str_replace( 'ms', '', $appearance_duration ) );
	$appearance_once = isset( $appearance_once ) ? NorExtraFilter::boolean( $appearance_once ) : true;

	$css_class = isset( $css_class ) ? ' ' . NorExtraFilter::string( $css_class, 'attr', '' ) : '';

	// Styling
	$message_box_uniqid = uniqid( 'ohio-custom-' );

	$message_box_class = '';
	switch ( $layout ) {
		case 'warning':
			$message_box_class .= ' warning';
			break;
		case 'success':
			$message_box_class .= ' success';
			break;
		case 'primary':
			$message_box_class .= ' primary';
			break;
		case 'danger':
			$message_box_class .= ' error';
			break;
	}

	if ( ! $full_width ) {
		$message_box_class .= ' wauto';
	}

	if ( $without_close_button ) {
		$message_box_class .= ' without-close';
	}

	$link = isset( $link ) ? NorExtraParser::VC_link_params( $link, array( 'caption' => __( 'Click me', 'ohio-extra' ) ) ) : false;

	NorExtraParser::VC_typo_custom_font( $text_typo );
	NorExtraParser::VC_typo_custom_font( $link_typo );

	$message_css = NorExtraParser::VC_typo_to_CSS( $text_typo );
	$link_css = NorExtraParser::VC_typo_to_CSS( $link_typo );

	if ( $appearance_effect != 'none' ) {
		OhioHelper::add_required_script( 'aos' );
	}

	// Assembling
	include( plugin_dir_path( __FILE__ ) . 'message_module__style.php' );
	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'message_module__view.php' );
	return ob_get_clean();
}