<?php

/**
* WPBakery Page Builder Ohio Accordion Inner shortcode custom style
*/

$_style_block = '';

if ( $heading_css ) {
	$_style_block .= '#' . $accordion_inner_uniqid . ' h6{';
	$_style_block .= $heading_css;
	$_style_block .= '}';
}
if ( $head_fill_css ) {
	$_style_block .= '#' . $accordion_inner_uniqid . ' .accordionItem_title{';
	$_style_block .= $head_fill_css;
	$_style_block .= '}';
}
if ( $icon_css ) {
	$_style_block .= '#' . $accordion_inner_uniqid . ' .icon{';
	$_style_block .= $icon_css;
	$_style_block .= '}';
}
if ( $heading_text_color ) {
	$_style_block .= '#' . $accordion_inner_uniqid . ' .accordionItem_control{';
	$_style_block .= 'color: ' . $heading_text_color;
	$_style_block .= '}';
}
if ( $content_css ) {
	$_style_block .= '#' . $accordion_inner_uniqid . ' .accordionItem_content .wrap{';
	$_style_block .= $content_css;
	$_style_block .= '}';
}

OhioLayout::append_to_shortcodes_css_buffer( $_style_block );