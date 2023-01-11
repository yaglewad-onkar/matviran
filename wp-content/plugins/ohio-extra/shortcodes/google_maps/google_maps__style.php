<?php

/**
* WPBakery Page Builder Ohio Google Maps shortcode custom style
*/

$_style_block = '';

if ( $map_height ) {
	$_style_block .= '#' . $google_maps_uniqid . '{';
	$_style_block .= 'height:' . $map_height . ';position:relative;';
	$_style_block .= '}';
}

OhioLayout::append_to_shortcodes_css_buffer( $_style_block );