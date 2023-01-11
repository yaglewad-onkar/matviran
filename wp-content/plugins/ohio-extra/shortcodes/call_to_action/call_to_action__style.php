<?php

/**
* WPBakery Page Builder Ohio Call To Action shortcode custom style
*/

$_style_block = '';

if ( $call_to_action_settings ) {
	$_style_block .= '#' . $call_to_action_uniqid . '{';
	$_style_block .= $call_to_action_settings;
	$_style_block .= '}';
}
if ( $title_css ) {
	$_style_block .= '#' . $call_to_action_uniqid . ' h3{';
	$_style_block .= $title_css;
	$_style_block .= '}';
}
if ( $subtitle_css ) {
	$_style_block .= '#' . $call_to_action_uniqid . ' p.subtitle{';
	$_style_block .= $subtitle_css;
	$_style_block .= '}';
}
if ( $button_css['css'] ) {
	$_style_block .= '#' . $call_to_action_uniqid . ' .btn,';
	$_style_block .= '#' . $call_to_action_uniqid . ' .btn i,';
	$_style_block .= '#' . $call_to_action_uniqid . ' .btn span {';
	$_style_block .= $button_css['css'];
	$_style_block .= '}';
}
if ( $button_css['hover-css'] ) {
	$_style_block .= '#' . $call_to_action_uniqid . ' .btn:hover span,';
	$_style_block .= '#' . $call_to_action_uniqid . ' .btn:hover i,';
	$_style_block .= '#' . $call_to_action_uniqid . ' .btn:hover{';
	$_style_block .= $button_css['hover-css'];
	$_style_block .= '}';
}

OhioLayout::append_to_shortcodes_css_buffer( $_style_block );