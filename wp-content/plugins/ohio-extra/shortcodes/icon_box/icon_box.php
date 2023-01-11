<?php 

/**
* WPBakery Page Builder Ohio Icon box shortcode
*/

add_shortcode( 'ohio_icon_box', 'ohio_icon_box_func' );

function ohio_icon_box_func( $atts ) {
	if ( isset( $atts ) && is_array( $atts ) ) extract( $atts );

	// Default values, parsing and filtering
	$box_type_layout = ( isset( $box_type_layout ) ) ? NorExtraFilter::string( $box_type_layout, 'string', 'top_icon' ) : 'top_icon';
	$box_alignment = ( isset( $box_alignment ) ) ? NorExtraFilter::string( $box_alignment, 'string', 'center' ) : 'center';
	$title = ( isset( $title ) ) ? NorExtraFilter::string( $title, 'string', '' ) : '';
	$description = isset( $description ) ? NorExtraFilter::string( $description, 'textarea', '' ) : '';
	$content_full = isset( $content_full ) ? NorExtraFilter::string( $content_full, 'string', 'full') : 'full';

	$image = ( isset( $image ) ) ? NorExtraFilter::string( wp_get_attachment_url( NorExtraFilter::string( $image ) ), 'attr' ) : false;
	$icon_type_layout = ( isset( $icon_type_layout ) ) ? NorExtraFilter::string( $icon_type_layout, 'string', 'default' ) : 'default';
	$icon_type = ( isset( $icon_type ) ) ? NorExtraFilter::string( $icon_type, 'string', 'font_icon' ) : 'font_icon';
	$icon_as_icon = ( isset( $icon_as_icon ) ) ? NorExtraFilter::string( $icon_as_icon, 'attr', '' ) : '';
	$icon_as_image = ( isset( $icon_as_image ) ) ? NorExtraFilter::string( $icon_as_image ) : false;
	$icon_image_atts = NorExtraParser::generateImageAttsById( NorExtraFilter::string( $icon_as_image ), $title );

	$use_link = ( isset( $use_link ) ) ? NorExtraFilter::boolean( $use_link ) : false;

	$title_typo = ( isset( $title_typo ) ) ? NorExtraFilter::string( $title_typo ) : false;
	$description_typo = ( isset( $description_typo ) ) ? NorExtraFilter::string( $description_typo ) : false;

	$title_color = ( isset( $title_color ) ) ? NorExtraFilter::string( $title_color ) : false;
	$description_color = ( isset( $description_color ) ) ? NorExtraFilter::string( $description_color ) : false;
	$fill_color = ( isset( $fill_color ) ) ? NorExtraFilter::string( $fill_color, 'brand' ) : 'brand';
	$border_color = ( isset( $border_color ) ) ? NorExtraFilter::string( $border_color, 'brand' ) : 'brand';
	$icon_color = ( isset( $icon_color ) ) ? NorExtraFilter::string( $icon_color, 'brand' ) : 'brand';
	$readmore_button = ( isset( $readmore_button ) ) ? NorExtraFilter::string( $readmore_button ) : false;

	$link_url = NorExtraParser::VC_link_params( isset( $link_url ) ? $link_url : '', array( 'caption' => __( 'Read More', 'ohio-extra' ) ) );

	$appearance_effect = isset( $appearance_effect ) ? NorExtraFilter::string( $appearance_effect, 'attr', 'none' )  : 'none';
	$appearance_duration = isset( $appearance_duration ) ? NorExtraFilter::string( $appearance_duration, 'attr', false )  : false;
	$appearance_delay = isset( $appearance_delay ) ? NorExtraFilter::string( $appearance_delay, 'attr', false ) : false;
	$appearance_delay = intval( str_replace( 'ms', '', $appearance_delay ) );
	$appearance_duration = intval( str_replace( 'ms', '', $appearance_duration ) );
	$appearance_once = isset( $appearance_once ) ? NorExtraFilter::boolean( $appearance_once ) : true;

	$css_class = ( isset( $css_class ) ) ? ' ' . NorExtraFilter::string( $css_class, 'attr', '' )  : '';


	// Styling
	$icon_box_uniqid = uniqid('ohio-custom-');

	if ( $icon_type == 'font_icon' && $icon_as_icon ) {
		$GLOBALS['ohio_icon_fonts'][] = $icon_as_icon;
	}

	$icon_box_class_main = 'icon-box';
	if ( $box_type_layout == 'left_icon' ) {
		$icon_box_class_main .= ' with-left-icon';
	}
	if ( $box_type_layout == 'right_icon' ) {
		$icon_box_class_main .= ' with-right-icon';
	}
	if( $box_type_layout == 'top_icon' ){
		$icon_box_class_main .= ' text-' . $box_alignment;
	}

	$icon_box_class_icon = '';
	switch ( $icon_type_layout ) {
		case 'border':
			$icon_box_class_icon = ' shape-border';
			break;
		case 'fill_and_border':
			$icon_box_class_icon = ' shape-border shape-fill';
			break;
		case 'only_fill':
			$icon_box_class_icon = ' shape-fill';
			break;
	}

	$icon_css = '';
	$icon_css .= NorExtraParser::VC_color_to_CSS( $icon_color, 'color:{{color}};' );

	if ( $icon_type_layout == 'fill_and_border' || $icon_type_layout == 'only_fill' ) {
		$icon_css .= NorExtraParser::VC_color_to_CSS( $fill_color, 'background-color:{{color}};' );
	}
	if ( $icon_type_layout == 'fill_and_border' || $icon_type_layout == 'border' || $icon_type_layout == 'double' ) {
		$icon_css .= NorExtraParser::VC_color_to_CSS( $border_color, 'border-color:{{color}};' );
	}

	
	$title_css = NorExtraParser::VC_typo_to_CSS( $title_typo );
	$description_css = NorExtraParser::VC_typo_to_CSS( $description_typo );
	
	$description_settings_class = '';
	if ( $content_full == 'full' ) {
		$description_settings_class .= ' content-fullwidth';
	}

	// Read More button
	$readmore_button = preg_replace( '/\&amp\;/', '&', $readmore_button );
	parse_str( $readmore_button, $button_settings );
	$button_css = NorExtraParser::VC_button_to_css( $button_settings );

	NorExtraParser::VC_typo_custom_font( $title_typo );
	NorExtraParser::VC_typo_custom_font( $description_typo );

	if ( $appearance_effect != 'none' ) {
		OhioHelper::add_required_script( 'aos' );
	}

	// Assembling
	include( plugin_dir_path( __FILE__ ) . 'icon_box__style.php' );
	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'icon_box__view.php' );
	return ob_get_clean();
}