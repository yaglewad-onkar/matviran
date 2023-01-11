<?php 

/**
* WPBakery Page Builder Ohio Paralax shortcode
*/

add_shortcode( 'ohio_parallax', 'ohio_parallax_func' );

function ohio_parallax_func( $atts, $content = '' ) {
	if ( isset( $atts ) && is_array( $atts ) ) extract( $atts );

	// Default values, parsing and filtering
	$image = isset( $image ) ? NorExtraFilter::string( wp_get_attachment_url( NorExtraFilter::string( $image ) ), 'attr' ) : false;
	$size = isset( $size ) ? NorExtraFilter::string( $size, 'string', '' ) : '';
	$parallax = isset( $parallax ) ? NorExtraFilter::string( $parallax, 'string', 'vertical' ) : 'vertical';
	$parallax_speed = isset( $parallax_speed ) ? NorExtraFilter::string( $parallax_speed, 'attr', '1.0' )  : '1.0';
	$use_overlay = isset( $use_overlay ) ? NorExtraFilter::boolean( $use_overlay ) : false;
	$overlay_color = isset( $overlay_color ) ? NorExtraFilter::string( $overlay_color ) : false;
	$css_class = isset( $css_class ) ? ( ' ' . NorExtraFilter::string( $css_class, 'attr', '' ) )  : '';

	// Styling
	$parallax_uniqid = uniqid( 'ohio-custom-' );

	$parallax_css = '';
	$parallax_css .= ( $image ) ? 'background-image:url(\'' . esc_url( $image ) . '\');' : '';
	$parallax_css .= ( $size ) ? 'background-size:' . esc_attr( $size ) . ';' : '';

	$overlay_css = '';
	if ( $use_overlay && $overlay_color ) {
		$overlay_css .= 'background-color:' . $overlay_color . ';';
	}

	// Assembling
	include( plugin_dir_path( __FILE__ ) . 'parallax__style.php' );
	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'parallax__view.php' );
	return ob_get_clean();
}