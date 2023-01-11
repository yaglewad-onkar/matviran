<?php

/**
* WPBakery Page Builder Ohio Split Box Inner shortcode custom style
*/

$_style_block = '';

if ( $bg_first_css ) {
	$_style_block .= '#' . $split_box_uniqid . ' .split-box-container:nth-child(1) .parallax-bg{';
	$_style_block .= $bg_first_css;
	$_style_block .= '}';
}
if ( $wrap_first_css ) {
	$_style_block .= '#' . $split_box_uniqid . ' .split-box-container:nth-child(1){';
	$_style_block .= $wrap_first_css;
	$_style_block .= '}';
}
if ( $bg_first_after_css ) {
	$_style_block .= '#' . $split_box_uniqid . ' .split-box-container:nth-child(1):after{';
	$_style_block .= $bg_first_after_css;
	$_style_block .= '}';
}
if ( $bg_second_css ) {
	$_style_block .= '#' . $split_box_uniqid . ' .split-box-container:nth-child(2) .parallax-bg{';
	$_style_block .= $bg_second_css;
	$_style_block .= '}';
}
if ( $wrap_second_css ) {
	$_style_block .= '#' . $split_box_uniqid . ' .split-box-container:nth-child(2){';
	$_style_block .= $wrap_second_css;
	$_style_block .= '}';
}
if ( $bg_second_after_css ) {
	$_style_block .= '#' . $split_box_uniqid . ' .split-box-container:nth-child(2):after{';
	$_style_block .= $bg_second_after_css;
	$_style_block .= '}';
}
if ( $first_side_paddings_css || $first_vertical_paddings_css ) {
	$_style_block .= '#' . $split_box_uniqid . ' .split-box-container:nth-child(1){';
	$_style_block .= $first_side_paddings_css;
	$_style_block .= '}';
}
if ( $second_side_paddings_css || $second_vertical_paddings_css ) {
	$_style_block .= '#' . $split_box_uniqid . ' .split-box-container:nth-child(2){';
	$_style_block .= $second_side_paddings_css;
	$_style_block .= '}';
}

OhioLayout::append_to_shortcodes_css_buffer( $_style_block );