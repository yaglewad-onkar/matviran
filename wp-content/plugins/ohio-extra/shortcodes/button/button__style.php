<?php

/**
* WPBakery Page Builder Ohio Banner shortcode custom style
*/
		
$_style_block = '';

if ( $button_settings ) {
	$_style_block .= '#' . $button_uniqid . ' .btn{';
	$_style_block .= $button_settings;
	$_style_block .= '}';
}
if ( $button_hover_settings ) {
	$_style_block .= '#' . $button_uniqid . ' .btn:hover{';
	$_style_block .= $button_hover_settings;
	$_style_block .= '}';
}
if ( $title_css ) {
	$_style_block .= '#' . $button_uniqid . ' .btn{';
	$_style_block .= $title_css;
	$_style_block .= '}';
}
if ( $title_hover_css ) {
	$_style_block .= '#' . $button_uniqid . ' .btn:hover{';
	$_style_block .= $title_hover_css;
	$_style_block .= '}';
}

OhioLayout::append_to_shortcodes_css_buffer( $_style_block );