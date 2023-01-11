<?php 

/**
* WPBakery Page Builder Ohio Video shortcode
*/

add_shortcode( 'ohio_video', 'ohio_video_func' );

function ohio_video_func( $atts ) {
	if ( isset( $atts ) && is_array( $atts ) ) extract( $atts );

	// Default values, parsing and filtering
	$layout = isset( $layout ) ? NorExtraFilter::string( $layout, 'string', 'boxed_shape') : 'boxed_shape';
	$button_layout = isset( $button_layout ) ? NorExtraFilter::string( $button_layout, 'string', 'filled') : 'filled';
	$preview_image = isset( $preview_image ) ? NorExtraFilter::string( $preview_image ) : false;
	$preview_image_atts = NorExtraParser::generateImageAttsById( NorExtraFilter::string( $preview_image ) );
	$link = isset( $link ) ? NorExtraFilter::string( $link, 'string', '' ) : '';
	$title = isset( $title ) ? rawurldecode( base64_decode( $title ) ) : '';
	$title = NorExtraFilter::string( $title, 'string', '' );
	$alignment = isset( $alignment ) ? NorExtraFilter::string( $alignment, 'string', 'center' ) : 'center';
	$autoplay_option = isset( $autoplay_option ) ? NorExtraFilter::boolean( $autoplay_option ) : false;

	$title_typo = isset( $title_typo ) ? NorExtraFilter::string( $title_typo ) : false;

	$border_color = isset( $border_color ) ? NorExtraFilter::string( $border_color, 'string', false ) : false;
	$button_anim = isset( $button_anim ) ? NorExtraFilter::boolean( $button_anim ) : false;
	$button_color = isset( $button_color ) ? NorExtraFilter::string( $button_color, 'string', false ) : false;
	$button_hover_color = isset( $button_hover_color ) ? NorExtraFilter::string( $button_hover_color, 'string', false ) : false;
	$icon_color = isset( $icon_color ) ? NorExtraFilter::string( $icon_color, 'string', false ) : false;
	$icon_hover_color = isset( $icon_hover_color ) ? NorExtraFilter::string( $icon_hover_color, 'string', false ) : false;

	$appearance_effect = isset( $appearance_effect ) ? NorExtraFilter::string( $appearance_effect, 'attr', 'none' ) : 'none';
	$appearance_duration = isset( $appearance_duration ) ? NorExtraFilter::string( $appearance_duration, 'attr', false ) : false;
	$appearance_delay = isset( $appearance_delay ) ? NorExtraFilter::string( $appearance_delay, 'attr', false ) : false;
	$appearance_delay = intval( str_replace( 'ms', '', $appearance_delay ) );
	if ( $appearance_duration ) $appearance_duration = intval( str_replace( 'ms', '', $appearance_duration ) );
	$appearance_once = isset( $appearance_once ) ? NorExtraFilter::boolean( $appearance_once ) : true;

	$css_class = isset( $css_class ) ? ' ' . NorExtraFilter::string( $css_class, 'attr', '' ) : '';

	$url = parse_url( $link );

	// YouTube
	if ( isset( $url['host'] ) ) {
		if ( $url['host'] == 'www.youtube.com' || $url['host'] == 'youtube.com' || $url['host'] == 'youtu.be' ) {
			if ( isset( $url['query'] ) ) {
				parse_str( $url['query'], $query );
			}

			if ( isset( $query['v'] ) && $query['v'] ) {
				$link = 'https://www.youtube.com/embed/' . $query['v'];
			}
		}

		// Vimeo
		if ( isset( $url['host'] ) && ( $url['host'] == 'www.vimeo.com' || $url['host'] == 'vimeo.com' ) ) {
			if ( isset( $url['path'] ) && $url['path'] ) {
				//if link isn`t playlist
				if ( !strpos($link, 'vimeo.com/showcase') ) {
					$link = 'https://player.vimeo.com/video' . $url['path'];
				}
			}
		}
	}
	
	// Styling
	$video_module_uniqid = uniqid( 'ohio-custom-' );
	
	$video_module_class = '';

	if ( $layout == 'boxed_shape' || $layout == 'outline' ) {
		$video_module_class .= ' boxed';
	}
	if ( $button_anim ){
		$video_module_class .= ' with-animation';
	}

	$video_module_settings = '';
	if ( $layout != 'with_preview' ) {
		$border_settings = NorExtraParser::VC_color_to_CSS( $border_color, 'border-color:{{color}};' );
		$video_module_settings .= $border_settings;
	}
	
	$button_settings = '';
	$button_hover_settings = '';
	$button_outline_settings = '';

	if ( $button_layout == 'outline' ) {
		$button_settings = NorExtraParser::VC_color_to_CSS( $button_color, 'border-color:{{color}};' );
		$button_outline_settings = NorExtraParser::VC_color_to_CSS( $button_color, 'background:{{color}};' );
		$button_hover_settings = NorExtraParser::VC_color_to_CSS( $button_hover_color, 'background:{{color}} !important; border-color:{{color}} !important;' );
	} else {
		$button_settings = NorExtraParser::VC_color_to_CSS( $button_color, 'background-color:{{color}};border-color:{{color}};' );
		$button_hover_settings = NorExtraParser::VC_color_to_CSS( $button_hover_color, 'background:{{color}} !important; border-color:{{color}} !important;' );
	}

	$button_after_before_css = '';
	if ( $button_color && $button_color != 'brand' ) {
		$button_after_before_css .= 'border-color:' . $button_color . ';';
	}

	$button_settings_class = '';
	if ( $button_layout == 'outline' ) {
		$button_settings_class .= ' btn-round-outline';
	}

	$icon_settings = NorExtraParser::VC_color_to_CSS( $icon_color, 'color:{{color}};' );
	$icon_hover_settings = NorExtraParser::VC_color_to_CSS( $icon_hover_color, 'color:{{color}} !important;' );

	NorExtraParser::VC_typo_custom_font( $title_typo );

	$title_settings = NorExtraParser::VC_typo_to_CSS( $title_typo );

	if ( $appearance_effect != 'none' ) {
		OhioHelper::add_required_script( 'aos' );
	}

	// Assembling
	include( plugin_dir_path( __FILE__ ) . 'video__style.php' );
	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'video__view.php' );
	return ob_get_clean();
}