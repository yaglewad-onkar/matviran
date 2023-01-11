<?php

/**
* WPBakery Page Builder Ohio Instagram Feed shortcode custom style
*/

$_style_block = '';

if ( $column_css ) {
	$_style_block .= '#' . $instagram_feed_uniqid . ' .column{';
	$_style_block .= $column_css;
	$_style_block .= '}';
}
if ( $image_css ) {
	$_style_block .= '#' . $instagram_feed_uniqid . ' .column a{';
	$_style_block .= $image_css;
	$_style_block .= '}';
}

if ( $columns_gap ) {
	$_style_block .= '#' . $instagram_feed_uniqid . ' .instagram-feed-column {';
	$_style_block .= 'padding: 0';
	$_style_block .= '}';

	$_style_block .= '#' . $instagram_feed_uniqid . '.instagram-feed {';
	$_style_block .= 'margin: 0';
	$_style_block .= '}';
}

OhioLayout::append_to_shortcodes_css_buffer( $_style_block );