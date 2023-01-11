<?php

/**
* WPBakery Page Builder Ohio Sticky Section Page shortcode custom style
*/

$_style_block = '';

if ( $bg_css || $side_paddings_css) {
	$_style_block .= '#' . $split_page_uniqid . ' .sticky-section-item-first-image {';
	if ( $bg_css ) {
		$_style_block .= $bg_css;
	}
	if ( $side_paddings_css ) {
		$_style_block .= $side_paddings_css;
	}
	$_style_block .= '}';
}

if ( $second_bg_css || $side_paddings_css) {
	$_style_block .= '#' . $split_page_uniqid . ' .sticky-section-item-second-image {';
	if ( $second_bg_css ) {
		$_style_block .= $second_bg_css;
	}
	if ( $side_paddings_css ) {
		$_style_block .= $side_paddings_css;
	}
	$_style_block .= '}';
}

OhioLayout::append_to_shortcodes_css_buffer( $_style_block );