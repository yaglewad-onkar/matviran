<?php

/**
* WPBakery Page Builder Ohio Icon Box shortcode custom style
*/

$_style_block = '';

if ( $title_css ) {
	$_style_block .= '#' . $icon_box_uniqid . ' .icon-box-title{';
	$_style_block .= $title_css;
	$_style_block .= '}';
}
if ( $description_css ) {
	$_style_block .= '#' . $icon_box_uniqid . ' .icon-box-details{';
	$_style_block .= $description_css;
	$_style_block .= '}';
}
if ( $icon_css ) {
	$_style_block .= '#' . $icon_box_uniqid . ' .icon-box-icon{';
	$_style_block .= $icon_css;
	$_style_block .= '}';
}
if ( isset( $button_css['css'] ) && $button_css['css'] ) {
	$_style_block .= '#' . $icon_box_uniqid . ' .icon-box-link,';
	$_style_block .= '#' . $icon_box_uniqid . ' .icon-box-link .icon-arrow,';
	$_style_block .= '#' . $icon_box_uniqid . ' .btn{';
	$_style_block .= $button_css['css'];
	$_style_block .= '}';
}
if ( isset( $button_css['hover-css'] ) && $button_css['hover-css'] ) {
	$_style_block .= '#' . $icon_box_uniqid . ' .btn:hover{';
	$_style_block .= $button_css['hover-css'];
	$_style_block .= '}';
}

OhioLayout::append_to_shortcodes_css_buffer( $_style_block );