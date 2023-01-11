<?php

/**
* WPBakery Page Builder Ohio Compare shortcode custom style
*/

$_style_block = '';

if ( $handler_color ) {
	$_style_block .= '#' . $compare_uniqid . ' .twentytwenty-handle{';
	$_style_block .= 'background-color:' . $handler_color . ';';
	$_style_block .= '}';

	$_style_block .= '#' . $compare_uniqid . ' .twentytwenty-handle:before,';
	$_style_block .= '#' . $compare_uniqid . ' .twentytwenty-handle:after{';
	$_style_block .= 'background:' . $handler_color . ';';
	$_style_block .= 'box-shadow:0 3px 0 ' . $handler_color . ', 0px 0px 12px rgba(51, 51, 51, 0.5);';
	$_style_block .= '}';
}

OhioLayout::append_to_shortcodes_css_buffer( $_style_block );