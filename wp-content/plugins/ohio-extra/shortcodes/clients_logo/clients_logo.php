<?php

/**
* WPBakery Page Builder Ohio Cliens logo box shortcode
*/

add_shortcode( 'ohio_clients_logo', 'ohio_clients_logo_func' );

function ohio_clients_logo_func( $atts ) {
	if ( isset( $atts ) && is_array( $atts ) ) extract( $atts );

	// Default values, parsing and filtering
	$layout_type = ( isset( $layout_type ) ) ? NorExtraFilter::string( $layout_type, 'string', 'default' ) : 'default';
	$link = ( isset( $link ) ) ? NorExtraFilter::string( $link ) : false;
	$in_new_tab = ( isset( $in_new_tab ) ) ? NorExtraFilter::string( $in_new_tab ) : false;

	$title = ( isset( $title ) ) ? NorExtraFilter::string( $title ) : false;
	$description = isset( $description ) ? rawurldecode( base64_decode( $description ) ) : '';
	$description = NorExtraFilter::string( $description, 'textarea', '' );

	$image_logo = ( isset( $image_logo ) ) ? NorExtraFilter::string( $image_logo ) : false;
	$image_logo_atts = NorExtraParser::generateImageAttsById( NorExtraFilter::string( $image_logo ), $title );
	$image_logo = ( !empty( $image_logo ) ) ? NorExtraFilter::string( wp_get_attachment_url( $image_logo ), 'attr' ) : false;

	$description_typo = ( isset( $description_typo ) ) ? NorExtraFilter::string( $description_typo ) : false;

	$overlay_color = ( isset( $overlay_color ) ) ? NorExtraFilter::string( $overlay_color ) : false;

	$appearance_effect = isset( $appearance_effect ) ? NorExtraFilter::string( $appearance_effect, 'attr', 'none' )  : 'none';
	$appearance_duration = isset( $appearance_duration ) ? NorExtraFilter::string( $appearance_duration, 'attr', false )  : false;
	$appearance_delay = isset( $appearance_delay ) ? NorExtraFilter::string( $appearance_delay, 'attr', false ) : false;
	$appearance_delay = intval( str_replace( 'ms', '', $appearance_delay ) );
	if ( $appearance_duration ) $appearance_duration = intval( str_replace( 'ms', '', $appearance_duration ) );
	$appearance_once = isset( $appearance_once ) ? NorExtraFilter::boolean( $appearance_once ) : true;

	$css_class = ( isset( $css_class ) ) ? ' ' . NorExtraFilter::string( $css_class, 'attr', '' )  : '';

	if ( isset( $link_url ) ) {
		$link_url = NorExtraParser::VC_link_params( $link_url, array( 'caption' => 'Read More' ) );
	} else {
		$link_url = NorExtraParser::VC_link_params( '', array( 'caption' => 'Read More' ) );
	}

	// Styling
	$clients_logo_uniqid = uniqid('ohio-custom-');
	$clients_logo_class = '';

	if ( $layout_type == 'default' ) {
		$clients_logo_class .= ' default';
	}

	$overlay_settings = NorExtraParser::VC_color_to_CSS( $overlay_color, 'background-color:{{color}};' );
	$alignment_settings = ( isset( $alignment ) ) ? NorExtraFilter::string( $alignment ) : 'left';
	$alignment_settings = 'text-align: ' . $alignment_settings . ';';

	$css_class = $clients_logo_class . $css_class;
	$description_css = NorExtraParser::VC_typo_to_CSS( $description_typo );

	NorExtraParser::VC_typo_custom_font( $description_typo );

	if ( $appearance_effect != 'none' ) {
		OhioHelper::add_required_script( 'aos' );
	}

	// Assembling
	include( plugin_dir_path( __FILE__ ) . 'clients_logo__style.php' );
	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'clients_logo__view.php' );
	return ob_get_clean();
}
