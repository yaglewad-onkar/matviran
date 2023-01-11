<?php

/**
* WPBakery Page Builder Ohio Vertical Slider Page shortcode custom style
*/

$_style_block = '';

if ( $bg_css || $side_paddings_css) {
	$_style_block .= '#' . $split_page_uniqid . '{';
	if ( $bg_css ) {
		$_style_block .= $bg_css;
	}
	if ( $side_paddings_css ) {
		$_style_block .= $side_paddings_css;
	}
	$_style_block .= '}';
}

OhioLayout::append_to_shortcodes_css_buffer( $_style_block );