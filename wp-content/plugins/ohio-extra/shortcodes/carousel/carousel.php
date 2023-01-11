<?php 

/**
* WPBakery Page Builder Ohio Carousel shortcode
*/

add_shortcode( 'ohio_carousel', 'ohio_carousel_func' );

function ohio_carousel_func( $atts, $content = '' ) {
	if ( isset( $atts ) && is_array( $atts ) ) extract( $atts );

	// Default values, parsing and filtering
	$loop = isset( $loop ) ? NorExtraFilter::boolean( $loop ) : true;
	$preloader = isset( $preloader ) ? NorExtraFilter::boolean( $preloader ) : true;

	$autoheight = isset( $autoheight ) ? NorExtraFilter::boolean( $autoheight ) : true;

	$drag_scroll = isset( $drag_scroll ) ? NorExtraFilter::boolean( $drag_scroll ) : false;
	$offset_items = isset( $offset_items ) ? NorExtraFilter::boolean( $offset_items ) : false;
	$offset_size = isset( $offset_size ) ? NorExtraFilter::string( $offset_size, 'string', '0px' ) : '0px';
	$item_desktop = isset( $item_desktop ) ? NorExtraFilter::string( $item_desktop, 'string', '5' ) : '5';
	$item_tablet = isset( $item_tablet ) ? NorExtraFilter::string( $item_tablet, 'string', '3' ) : '3';
	$item_mobile = isset( $item_mobile ) ? NorExtraFilter::string( $item_mobile, 'string', '1' ) : '1';
	$gap_items = isset( $gap_items ) ? NorExtraFilter::string( $gap_items) : false;
	$gap_size = isset( $gap_size ) ? NorExtraFilter::string( $gap_size, 'string', '40' ) : '40';
	$pagination_show = isset( $pagination_show ) ? NorExtraFilter::boolean( $pagination_show ) : true;
	$pagination_type = isset( $pagination_type ) ? NorExtraFilter::string( $pagination_type, 'string', 'dots' ) : 'dots';
	$navigation_buttons = isset( $navigation_buttons ) ? NorExtraFilter::boolean( $navigation_buttons ) : true;
	$position_nav_buttons = isset( $position_nav_buttons ) ? NorExtraFilter::string( $position_nav_buttons, 'attr', 'default' )  : 'default';
	$autoplay = isset( $autoplay ) ? NorExtraFilter::boolean( $autoplay ) : true;
	$autoplay_time = isset( $autoplay_time ) ? NorExtraFilter::string( $autoplay_time, 'string', '5' ) : '5';
	$stop_on_hover = isset( $stop_on_hover ) ? NorExtraFilter::boolean( $stop_on_hover ) : true;
	
	$nav_bg_color = isset( $nav_bg_color ) ? NorExtraFilter::string( $nav_bg_color ) : false;
	$nav_color = isset( $nav_color ) ? NorExtraFilter::string( $nav_color ) : false;
	$dots_color = isset( $dots_color ) ? NorExtraFilter::string( $dots_color ) : false;
	$pagination_color = isset( $pagination_color ) ? NorExtraFilter::string( $pagination_color ) : false;
	
	$appearance_effect = isset( $appearance_effect ) ? NorExtraFilter::string( $appearance_effect, 'attr', 'none' )  : 'none';
	$appearance_duration = isset( $appearance_duration ) ? NorExtraFilter::string( $appearance_duration, 'attr', false )  : false;
	$appearance_delay = isset( $appearance_delay ) ? NorExtraFilter::string( $appearance_delay, 'attr', false ) : false;
	$appearance_delay = intval( str_replace( 'ms', '', $appearance_delay ) );
	if ( $appearance_duration ) $appearance_duration = intval( str_replace( 'ms', '', $appearance_duration ) );
	$appearance_once = isset( $appearance_once ) ? NorExtraFilter::boolean( $appearance_once ) : true;

	$css_class = isset( $css_class ) ? ' ' . NorExtraFilter::string( $css_class, 'attr', '' )  : '';

	// Styling
	$slider_uniqid = uniqid( 'ohio-custom-' );

	$pagination_settings = NorExtraParser::VC_color_to_CSS( $pagination_color, 'color:{{color}};' );
	$dots_settings = NorExtraParser::VC_color_to_CSS( $dots_color, 'border-color:{{color}};' );
	$dots_after_settings = NorExtraParser::VC_color_to_CSS( $dots_color, 'background-color:{{color}};' );
	$nav_bg_settings = NorExtraParser::VC_color_to_CSS( $nav_bg_color, 'background-color:{{color}};' );
	$nav_settings = NorExtraParser::VC_color_to_CSS( $nav_color, 'color:{{color}};' );

	$slider_object = (object) array();
	$slider_object->loop = (bool) $loop;
	$slider_object->navBtn = (bool) $navigation_buttons;
	$slider_object->autoplay = (bool) $autoplay;
	$slider_object->autoplayHoverPause = (bool) $stop_on_hover;
	$slider_object->autoHeight = (bool) $autoheight;

	if ($pagination_show) {
		
		if ($pagination_type === 'dots') {
			$slider_object->dots = true;
			
		} else if ($pagination_type === 'pagination') {
			$slider_object->slidesCount = true;
			$css_class .= ' with-pagination';
		} else {
			$slider_object->pagination = true;
			$slider_object->dots = true;
			$css_class .= ' with-pagination';
		}
	}
	if ($drag_scroll) {
		$slider_object->drag = $drag_scroll;
	}
	if ($gap_items) {
		$slider_object->gap = $gap_size;
	}
	if ( $navigation_buttons ) {
		$slider_object->navContainerClass = 'slider-nav';
	}
	if ( $item_desktop ) {
		$slider_object->itemsDesktop = $item_desktop;
	}
	if ( $item_tablet ) {
		$slider_object->itemsTablet = $item_tablet;
	}
	if ( $item_mobile ) {
		$slider_object->itemsMobile = $item_mobile;
	}

	$slider_margin_css = '';
	$slider_left_css = '';
	$slider_overflow_css = '';
	if ( $offset_items ){
		$slider_margin_css .= 'margin: 0 -' . $offset_size . ';';
		$slider_overflow_css .= 'overflow: visible;';
		$slider_left_css .= 'left: ' . $offset_size  . ';';
	}
	// if ( $navigation_buttons && $slide_speed ) {
	// 	$slider_object->navSpeed = $slide_speed;
	// }
	if ( $autoplay_time ) {
		$slider_object->autoplayTimeout = $autoplay_time;
	}
	$slider_json = json_encode( $slider_object );

	$slider_class = '';
	if ( $offset_items ) {
		$slider_class .= ' slider-offset';
	}
	if ( $navigation_buttons == 'false' ) {
		$slider_class .= ' full';
	}
	if ( !$navigation_buttons ) {
		$slider_class .= ' without-nav';
	}
	if ( $navigation_buttons ) {
		if ( $position_nav_buttons == 'offset' ) {
			$slider_class .= ' nav-offset';
		} else if ( $position_nav_buttons == 'inset' ) {
			$slider_class .= ' nav-inset';
		}
	}
	if ($preloader) {
		$slider_class .= ' with-preloader';
	}

	if ( $appearance_effect != 'none' ) {
		OhioHelper::add_required_script( 'aos' );
	}

	// Assembling
	include( plugin_dir_path( __FILE__ ) . 'carousel__style.php' );
	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'carousel__view.php' );
	return ob_get_clean();
}