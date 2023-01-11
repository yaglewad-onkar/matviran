<?php

/**
* WPBakery Page Builder Ohio Counter shortcode custom style
*/

$_style_block = '';

if ( $count_css ) {
	$_style_block .= '#' . $counter_box_uniqid . '.counter-box .counter-box-count{';
	$_style_block .= $count_css;
	$_style_block .= '}';
}
if ( $plus_css ) {
	$_style_block .= '#' . $counter_box_uniqid . '.counter-box .counter-box-count .plus-symbol{';
	$_style_block .= $plus_css;
	$_style_block .= '}';
}
if ( $icon_css ) {
	$_style_block .= '#' . $counter_box_uniqid . '.counter-box .counter-box-icon{';
	$_style_block .= $icon_css;
	$_style_block .= '}';
}
if ( $title_css ) {
	$_style_block .= '#' . $counter_box_uniqid . '.counter-box .counter-box-headline{';
	$_style_block .= $title_css;
	$_style_block .= '}';
}

OhioLayout::append_to_shortcodes_css_buffer( $_style_block );