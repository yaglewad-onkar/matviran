<?php 

/**
* Visual Composer Ohio Circle Progress Bar shortcode
*/

add_shortcode( 'ohio_pie_chart', 'ohio_pie_chart_func' );

function ohio_pie_chart_func( $atts ) {
	if ( isset( $atts ) && is_array( $atts ) ) extract( $atts );

	// Default values, parsing and filtering
	$layout = isset( $layout ) ? NorExtraFilter::string( $layout, 'string', 'percent' ) : 'percent';
	$description_position = isset( $description_position ) ? NorExtraFilter::string( $description_position, 'string', 'bottom' ) : 'bottom';
	$percent = isset( $percent ) ? NorExtraFilter::string( $percent, 'string', '100') : '100';
	$title = isset( $title ) ? NorExtraFilter::string( $title, 'string', false) : false;
	$icon_position = isset( $icon_position ) ? NorExtraFilter::string( $icon_position, 'string', 'left' ) : 'left';
	$icon_type = isset( $icon_type ) ? NorExtraFilter::string( $icon_type, 'string', 'font_icon' ) : 'font_icon';
	$icon_as_icon = isset( $icon_as_icon ) ? NorExtraFilter::string( $icon_as_icon, 'string', '' ) : '';
	$icon_as_image = isset( $icon_as_image ) ? NorExtraFilter::string( $icon_as_image, 'string', '' ) : '';
	$icon_image_atts = NorExtraParser::generateImageAttsById( NorExtraFilter::string( $icon_as_image ) , $title );
	$title_typo = isset( $title_typo ) ? NorExtraFilter::string( $title_typo ) : false;
	$percent_typo = isset( $percent_typo ) ? NorExtraFilter::string( $percent_typo ) : false;
	$chart_color = isset( $chart_color ) ? NorExtraFilter::string( $chart_color, 'string', false ) : false;
	$title_color = isset( $title_color ) ? NorExtraFilter::string( $title_color, 'string', false ) : false;
	$chart_content_color = isset( $chart_content_color ) ? NorExtraFilter::string( $chart_content_color, 'attr', false ) : false;
	$appearance_effect = isset( $appearance_effect ) ? NorExtraFilter::string( $appearance_effect, 'attr', 'none' ) : 'none';
	$appearance_duration = isset( $appearance_duration ) ? NorExtraFilter::string( $appearance_duration, 'attr', false ) : false;
	$appearance_delay = isset( $appearance_delay ) ? NorExtraFilter::string( $appearance_delay, 'attr', false ) : false;
	$appearance_delay = intval( str_replace( 'ms', '', $appearance_delay ) );
	if ( $appearance_duration ) $appearance_duration = intval( str_replace( 'ms', '', $appearance_duration ) );
	$appearance_once = isset( $appearance_once ) ? NorExtraFilter::boolean( $appearance_once ) : true;
	
	$css_class = isset( $css_class ) ? ' ' . NorExtraFilter::string( $css_class, 'attr', '' ) : '';

	// Styling
	$chart_box_uniqid = uniqid( 'ohio-custom-' );
	
	OhioHelper::add_required_script( 'chart-box' );
	
	if ( $icon_type == 'font_icon' && $icon_as_icon ) {
		$GLOBALS['ohio_icon_fonts'][] = $icon_as_icon;
	}

	$title_settings = NorExtraParser::VC_color_to_CSS( $title_color, 'color:{{color}};' );
	$chart_content_settings = NorExtraParser::VC_color_to_CSS( $chart_content_color, 'color:{{color}};' );
	$chart_color_css = NorExtraParser::VC_color_to_CSS( $chart_color, 'stroke:{{color}};' );
	
	$chart_content_settings_class = '';
	if ( $layout == "icon" && $icon_as_icon ) {
		$chart_content_settings_class .= ' brand-color';
	}

	// $image_src = '';
	// if ( $icon_as_image ) {
	// 	$image_src = wp_get_attachment_image( $icon_as_image );
	// }

	$title_settings .= NorExtraParser::VC_typo_to_CSS( $title_typo );
	$percent_css = NorExtraParser::VC_typo_to_CSS( $percent_typo );

	$chart_class = '';

	switch ( $description_position ) {
		case 'right':
			$chart_class .= ' circle-progress-bar-right';
			break;
		case 'left':
			$chart_class .= ' circle-progress-bar-left';
			break;
	}

	// Assembling
	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'circle_progress_bar__style.php' );
	include( plugin_dir_path( __FILE__ ) . 'circle_progress_bar__view.php' );
	return ob_get_clean();
}