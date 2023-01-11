<?php 

/**
* WPBakery Page Builder Ohio Google Maps shortcode
*/

add_shortcode( 'ohio_google_maps', 'ohio_google_maps_func' );

function ohio_google_maps_func( $atts ) {
	if ( isset( $atts ) && is_array( $atts ) ) extract( $atts );

	$default_map_marker = plugin_dir_url( __FILE__ ) . 'images/google-maps-marker.png';

	// Default values, parsing and filtering
	$marker_locations = isset( $marker_locations ) ? NorExtraFilter::string( $marker_locations, 'string', '') : '';
	$map_height = isset( $map_height ) ? NorExtraFilter::string( $map_height, 'string', '') : '';
	$map_zoom_enable = isset( $map_zoom_enable ) ? NorExtraFilter::boolean( $map_zoom_enable ) : false;
	$map_street_enable = isset( $map_street_enable ) ? NorExtraFilter::boolean( $map_street_enable ) : false;
	$map_type_enable = isset( $map_type_enable ) ? NorExtraFilter::boolean( $map_type_enable ) : false;
	$map_fullscreen_enable = isset( $map_fullscreen_enable ) ? NorExtraFilter::boolean( $map_fullscreen_enable ) : false;
	$map_zoom = isset( $map_zoom ) ? NorExtraFilter::string( $map_zoom, 'string', '14') : '14';
	$map_style = isset( $map_style ) ? NorExtraFilter::string( $map_style, 'string', 'default') : 'default';

	if ( isset( $map_marker ) ) {
		$map_marker = NorExtraFilter::string( $map_marker, 'string', $default_map_marker );
		$map_marker = wp_get_attachment_image_src( $map_marker );
		$map_marker = $map_marker[0];
	} else {
		$map_marker = $default_map_marker;
	}

	$ohio_api_key = OhioOptions::get_global( 'google_maps_api_key', '' );

	// Styling
	$google_maps_uniqid = uniqid( 'ohio-custom-' );

	OhioHelper::add_required_script( 'google-maps' );

	$GLOBALS['ohio_use_map'] = true;

	$map_uniqid = uniqid();

	// Assembling
	include( plugin_dir_path( __FILE__ ) . 'google_maps__style.php' );
	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'google_maps__view.php' );
	return ob_get_clean();
}