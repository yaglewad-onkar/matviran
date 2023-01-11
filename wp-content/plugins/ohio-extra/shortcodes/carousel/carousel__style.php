<?php

/**
* WPBakery Page Builder Ohio Carousel shortcode custom style
*/

$_style_block = '';

// if ( $items_css ) {
// 	$_style_block .= '#' . $slider_uniqid . ' > .owl-stage-outer > .owl-stage > .owl-item{';
// 	$_style_block .= $items_css;
// 	$_style_block .= '}';
// }
if ( $dots_settings ) {
	$_style_block .= '#' . $slider_uniqid . ' > .clb-slider-nav-dots > .clb-slider-dot.active,';
	$_style_block .= '#' . $slider_uniqid . ' > .clb-slider-nav-dots > .clb-slider-dot:hover{';
	$_style_block .= $dots_settings;
	$_style_block .= '}';
	$_style_block .= '#' . $slider_uniqid . ' .clb-slider-dot:before{';
	$_style_block .= $dots_after_settings;
	$_style_block .= '}';
}
if ( $pagination_settings ) {
	$_style_block .= '#' . $slider_uniqid . ' > .clb-slider-count {';
	$_style_block .= $pagination_settings;
	$_style_block .= '}';
}
if ( $nav_settings ) {
	$_style_block .= '#' . $slider_uniqid . ' > .clb-slider-nav-btn .ion{';
	$_style_block .= $nav_settings;
	$_style_block .= '}';
}
if ( $nav_bg_settings ) {
	$_style_block .= '#' . $slider_uniqid . ' > .clb-slider-nav-btn .ion{';
	$_style_block .= $nav_bg_settings;
	$_style_block .= '}';
}

if ($offset_items) {
	$_style_block .= '#' . $slider_uniqid . ' > .clb-slider-outer-stage {';
	$_style_block .= $slider_margin_css;
	$_style_block .= '}';

	$_style_block .= '#' . $slider_uniqid . ' > .clb-slider-outer-stage > .clb-slider-stage {';
	$_style_block .= $slider_left_css;
	$_style_block .= '}';
}

OhioLayout::append_to_shortcodes_css_buffer( $_style_block );