<?php

/**
* WPBakery Page Builder Ohio Process shortcode custom style
*/

$_style_block = '';

if ( $process_settings ) {
	$_style_block .= '#' . $process_uniqid . '{';
	$_style_block .= $process_settings;
	$_style_block .= '}';
}
if ( $number_settings ) {
	$_style_block .= '#' . $process_uniqid . ' .number{';
	$_style_block .= $number_settings;
	$_style_block .= '}';
}
if ( $title_settings ) {
	$_style_block .= '#' . $process_uniqid . ' h3{';
	$_style_block .= $title_settings;
	$_style_block .= '}';
}
if ( $description_settings ) {
	$_style_block .= '#' . $process_uniqid . ' .description{';
	$_style_block .= $description_settings;
	$_style_block .= '}';
}

OhioLayout::append_to_shortcodes_css_buffer( $_style_block );