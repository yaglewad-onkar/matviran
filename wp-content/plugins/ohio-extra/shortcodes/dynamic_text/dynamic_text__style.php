<?php

/**
* WPBakery Page Builder Ohio Dynamic Text shortcode custom style
*/

$_style_block = '';

if ( $alignment_css || $static_typo_css ) {
	$_style_block .= '#' . $dynamic_text_uniqid . '{';
	$_style_block .= $alignment_css;
	$_style_block .= $static_typo_css;
	$_style_block .= '}';
}

if ( $dynamic_typo_css ) {
	$_style_block .= '#' . $dynamic_text_uniqid . ' .dynamic,#' . $dynamic_text_uniqid . ' .typed-cursor{';
	$_style_block .= $dynamic_typo_css;
	$_style_block .= '}';
}

OhioLayout::append_to_shortcodes_css_buffer( $_style_block );