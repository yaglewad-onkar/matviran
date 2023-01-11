<?php

/**
* WPBakery Page Builder Ohio Heading shortcode custom style
*/

$_style_block = '';

if ( $title_css ) {
	$_style_block .= '#' . $headings_uniqid . ' ' . $heading_type . '{';
	$_style_block .= $title_css;
	$_style_block .= '}';
}
if ( $subtitle_css ) {
	$_style_block .= '#' . $headings_uniqid . ' p.subtitle{';
	$_style_block .= $subtitle_css;
	$_style_block .= '}';
}
if ( $divider_settings ) {
	$_style_block .= '#' . $headings_uniqid . ' .divider{';
	$_style_block .= $divider_settings;
	$_style_block .= '}';
}
if ( $subtitle_settings ) {
	$_style_block .= '#' . $headings_uniqid . ' .subtitle{';
	$_style_block .= $subtitle_settings;
	$_style_block .= '}';
}


OhioLayout::append_to_shortcodes_css_buffer( $_style_block );