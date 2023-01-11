<?php

/**
* WPBakery Page Builder Ohio Accordion shortcode custom style
*/

$_style_block = '';

if ($content_styles_css) {
	$_style_block .= '#' . $content_box_uniqid .' .content_box_container'. $content_styles_css . '';
}

if ($border_hover_color_css) {
	$_style_block .= '#' . $content_box_uniqid . '.ohio-content_box-sс:hover > .content_box_container{';
	$_style_block .= $border_hover_color_css;
	$_style_block .= '}';
}

if ($border_hover_pseudo_color_css) {
	$_style_block .= '#' . $content_box_uniqid . '.ohio-content_box-sс > .content_box_container:before{';
	$_style_block .= $border_hover_pseudo_color_css;
	$_style_block .= '}';
}

if ($border_hover_size_css) {
	$_style_block .= '#' . $content_box_uniqid . '.ohio-content_box-sс .content_box_container:before{';
	$_style_block .= $border_hover_size_css;
	$_style_block .= '}';
}

OhioLayout::append_to_shortcodes_css_buffer( $_style_block );