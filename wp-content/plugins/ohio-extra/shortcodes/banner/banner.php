<?php 

/**
* WPBakery Page Builder Ohio Banner shortcode
*/

add_shortcode( 'ohio_banner', 'ohio_banner_func' );

function ohio_banner_func( $atts ) {
	if ( isset( $atts ) && is_array( $atts ) ) extract( $atts );

	// Default values, parsing and filtering
	$block_type_layout = isset( $block_type_layout ) ? NorExtraFilter::string( $block_type_layout, 'string', 'full' ) : 'full';
	$block_type_full_align = isset( $block_type_full_align ) ? NorExtraFilter::string( $block_type_full_align, 'string', 'left' ) : 'left';
	$block_type_inner_align = isset( $block_type_inner_align ) ? NorExtraFilter::string( $block_type_inner_align, 'string', 'top_left' ) : 'top_left';
	$block_type_subtitle = isset( $block_type_subtitle ) ? NorExtraFilter::string( $block_type_subtitle, 'string', 'after' ) : 'after';
	$title = isset( $title ) ? NorExtraFilter::string( $title ) : false;
	$subtitle = isset( $subtitle ) ? NorExtraFilter::string( $subtitle ) : false;
	$description = isset( $description ) ? rawurldecode( base64_decode( $description ) ) : '';
	$description = NorExtraFilter::string( $description, 'textarea', '' );
	$background_image = isset( $background_image ) ? NorExtraFilter::string( $background_image ) : false;
	$background_image_atts = NorExtraParser::generateImageAttsById( NorExtraFilter::string( $background_image ), $title );
	$use_link = isset( $use_link ) ? NorExtraFilter::boolean( $use_link ) : true;

	// $readmore_button = isset( $readmore_button ) ? NorExtraFilter::string( $readmore_button ) : 'type=outline&size=small';

	$title_typo = isset( $title_typo ) ? NorExtraFilter::string( $title_typo ) : false;
	$description_typo = isset( $description_typo ) ? NorExtraFilter::string( $description_typo ) : false;
	$subtitle_typo = isset( $subtitle_typo ) ? NorExtraFilter::string( $subtitle_typo ) : false;
	// $button_typo = isset( $button_typo ) ? NorExtraFilter::string( $button_typo ) : false;
	$overlay_color = isset( $overlay_color ) ? NorExtraFilter::string( $overlay_color ) : false;

	$appearance_effect = isset( $appearance_effect ) ? NorExtraFilter::string( $appearance_effect, 'attr', 'none' )  : 'none';
	$appearance_duration = isset( $appearance_duration ) ? NorExtraFilter::string( $appearance_duration, 'attr', false )  : false;
	$appearance_delay = isset( $appearance_delay ) ? NorExtraFilter::string( $appearance_delay, 'attr', false ) : false;
	$appearance_delay = intval( str_replace( 'ms', '', $appearance_delay ) );
	if ( $appearance_duration ) $appearance_duration = intval( str_replace( 'ms', '', $appearance_duration ) );
	$appearance_once = isset( $appearance_once ) ? NorExtraFilter::boolean( $appearance_once ) : true;
	
	$css_class = isset( $css_class ) ? ' ' . NorExtraFilter::string( $css_class, 'attr', '' )  : '';

	$link_url = NorExtraParser::VC_link_params( ( isset( $link_url ) ? $link_url : '' ), array( 'caption' => esc_html__( 'Read More', 'ohio-extra' ) ) );

	// Styling
	$banner_box_uniqid = uniqid( 'ohio-custom-' );

	$banner_box_class = 'banner';
	switch ( $block_type_layout ) {
		case 'inner':
			$banner_box_class .= ' inner';
			break;
		case 'inner_hover':
			$banner_box_class .= ' inner hover';
			break;
		case 'overlay_title':
			$banner_box_class .= ' overlay-title';
			break;
	}
	switch ( $block_type_full_align ) {
		case 'center':
			$banner_box_class .= ' text-center';
			break;
		case 'right':
			$banner_box_class .= ' text-right';
			break;
	}

	$title_css = NorExtraParser::VC_typo_to_CSS( $title_typo );
	$description_css = NorExtraParser::VC_typo_to_CSS( $description_typo );
	$subtitle_css = NorExtraParser::VC_typo_to_CSS( $subtitle_typo );
	// $button_css = NorExtraParser::VC_button_to_css( $button_settings );

	$overlay_css = ( $overlay_color ) ? 'background-color: ' . $overlay_color : '';

	// $readmore_button = preg_replace( '/\&amp\;/', '&', $readmore_button );
	// parse_str( $readmore_button, $button_settings );

	NorExtraParser::VC_typo_custom_font( $title_typo );
	NorExtraParser::VC_typo_custom_font( $description_typo );
	NorExtraParser::VC_typo_custom_font( $subtitle_typo );
	// NorExtraParser::VC_typo_custom_font( $button_typo );

	if ( $appearance_effect != 'none' ) {
		OhioHelper::add_required_script( 'aos' );
	}

	// Assembling
	include( plugin_dir_path( __FILE__ ) . 'banner__style.php' );
	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'banner__view.php' );
	return ob_get_clean();
}