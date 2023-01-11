<?php

/**
* WPBakery Page Builder Ohio Countdown shortcode custom style
*/

$_style_block = '';

if ( $numbers_settings ) {
	$_style_block .= '#' . $countdown_box_uniqid . ' .number,';
	$_style_block .= '#' . $countdown_box_uniqid . ' .box-time{';
	$_style_block .= $numbers_settings;
	$_style_block .= '}';
}
if ( $titles_settings ) {
	$_style_block .= '#' . $countdown_box_uniqid . ' .box-label{';
	$_style_block .= $titles_settings;
	$_style_block .= '}';
}
if ( $box_bg_settings ) {
	$_style_block .= '#' . $countdown_box_uniqid . ' .box-count{';
	$_style_block .= $box_bg_settings;
	$_style_block .= '}';
}
if ( $dividers_settings ) {
	$_style_block .= '#' . $countdown_box_uniqid . ' .box-time:after,';
	$_style_block .= '#' . $countdown_box_uniqid . ' .box-time:before{';
	$_style_block .= $dividers_settings;
	$_style_block .= '}';
}

OhioLayout::append_to_shortcodes_css_buffer( $_style_block );