<?php

/**
* WPBakery Page Builder Ohio Vertical Fullscreen Slider shortcode custom style
*/

$_style_block = '';

if ( $navigation_css ) {
	$_style_block .= '#' . $split_pages_uniqid  . ' .clb-slider-nav-dots,';
	$_style_block .= '#' . $split_pages_uniqid  . ' .clb-slider-pagination,';
	$_style_block .= '#' . $split_pages_uniqid  . ' .clb-slider-nav-btn {';
	$_style_block .= $navigation_css;
	$_style_block .= '}';
}

OhioLayout::append_to_shortcodes_css_buffer( $_style_block );