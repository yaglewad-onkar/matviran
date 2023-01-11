<?php

/**
* WPBakery Page Builder Ohio Progress Bar shortcode custom style
*/

$_style_block = '';

if ( $label_settings ) {
	$_style_block .=  '#' . $progress_bar_uniqid . '.progress-bar h6{';
	$_style_block .= $label_settings;
	$_style_block .= '}';
}
if ( $percent_settings ) {
	$_style_block .= '#' . $progress_bar_uniqid . '.progress-bar .percent{';
	$_style_block .= $percent_settings;
	$_style_block .= '}';
}
if ( $bar_bg_settings ) {
	$_style_block .= '#' . $progress_bar_uniqid . ' .progress-bar-track {';
	$_style_block .= $bar_bg_settings;
	$_style_block .= '}';
}
if ( $bar_line_settings ) {
	$_style_block .= '#' . $progress_bar_uniqid . '.progress-bar .line{';
	$_style_block .= $bar_line_settings;
	$_style_block .= '}';
}
if ( $tooltip_settings ) {
	$_style_block .= '#' . $progress_bar_uniqid . '.progress-bar .line-percent{';
	$_style_block .= $tooltip_settings;
	$_style_block .= '}';
}

OhioLayout::append_to_shortcodes_css_buffer( $_style_block );