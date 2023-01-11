<?php 

/**
* WPBakery Page Builder Ohio Vertical Fullscreen Slider shortcode
*/

add_shortcode( 'ohio_vertical_slider', 'ohio_vertical_slider_func' );

function ohio_vertical_slider_func( $atts, $content = '' ) {
	$css_class = $animation_duration = $navigation_show = $elements_color = $pagination_type = $pagination_show = NULL;
	if ( isset( $atts ) && is_array( $atts ) ) extract( $atts );

	// Default values, parsing and filtering
	$mousewheel_scrolling = isset( $mousewheel_scrolling ) ? NorExtraFilter::boolean( $mousewheel_scrolling, true ) : true;
	$drag_scrolling = isset( $drag_scrolling ) ? NorExtraFilter::boolean( $drag_scrolling, true ) : true;
	$loop = isset( $loop ) ? NorExtraFilter::boolean( $loop, true ) : true;
	$navigation_show = isset( $navigation_show ) ? NorExtraFilter::boolean( $navigation_show, true ) : true;
	$elements_color = isset( $elements_color ) ? NorExtraFilter::string( $elements_color, 'string', false ) : false;
	$pagination_type = isset( $pagination_type ) ? NorExtraFilter::string( $pagination_type, 'string', 'bullets' ) : 'bullets';
	$pagination_show = isset( $pagination_show ) ? NorExtraFilter::boolean( $pagination_show, true ) : true;
	$fullscreen_mode = isset( $fullscreen_mode ) ? NorExtraFilter::boolean( $fullscreen_mode, true ) : true;
	$autoplay_mode = isset( $autoplay_mode ) ? NorExtraFilter::boolean( $autoplay_mode, true ) : true;
	$autoplay_timeout = isset( $autoplay_timeout ) ? NorExtraFilter::string( $autoplay_timeout, 'string', '5000' ) : '';
	$scroll_type = isset( $scroll_type ) ? NorExtraFilter::boolean( $scroll_type, false ) : false;
	$animation_duration = isset( $animation_duration ) ? NorExtraFilter::string( $animation_duration, 'string', 'default' ) : 'default';
	$appearance_once = isset( $appearance_once ) ? NorExtraFilter::boolean( $appearance_once ) : true;

	$css_class = ( $css_class ) ? NorExtraFilter::string( $css_class, 'attr', '' ) : '';

	// Styles
	$split_pages_uniqid = uniqid( 'ohio-custom-' );
	$onepage_object = (object) array();
	$onepage_object->loop = (bool) $loop;
	$onepage_object->navBtn = (bool) $navigation_show;
	$onepage_object->mousewheel = $mousewheel_scrolling;
	$onepage_object->drag = $drag_scrolling;
	$onepage_object->scrollToSlider = $mousewheel_scrolling;
	$onepage_object->autoplay = (bool) $autoplay_mode;
	$onepage_object->autoplayTimeout = $autoplay_timeout;
	$onepage_object->verticalScroll = $scroll_type;
	if ($pagination_show) {
		if ($pagination_type == 'bullets') {
			$onepage_object->dots = true;
		} else if ($pagination_type == 'numbers') {
			$onepage_object->pagination = true;
		}
	}
	$onepage_json = json_encode( $onepage_object );

	$navigation_css = '';
	$navigation_active_css = '';
	if ( $elements_color ) {
		$navigation_css = 'color:' . $elements_color . ';';
		$navigation_active_css = 'background:transparent;';
		$navigation_active_css .= 'border-color:' . $elements_color . ';';
	}

	$wrap_classes = [];
	$wrap_classes[] = $css_class;
	if ( $fullscreen_mode ) {
		$wrap_classes[] = 'full-vh';
	}

	// Assembling
	include( plugin_dir_path( __FILE__ ) . 'vertical_slider__style.php' );
	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'vertical_slider__view.php' );
	return ob_get_clean();
}