<?php

/**
* WPBakery Page Builder Ohio Banner shortcode custom style
*/

$_style_block = '';

if ( $title_css ) {
	$_style_block .= '#' . $banner_box_uniqid . ' h3{';
	$_style_block .= $title_css;
	$_style_block .= '}';
}
if ( $description_css ) {
	$_style_block .= '#' . $banner_box_uniqid . ' p.description{';
	$_style_block .= $description_css;
	$_style_block .= '}';
}
if( $subtitle_css ) {
	$_style_block .= '#' . $banner_box_uniqid . ' .banner-subtitle{';
	$_style_block .= $subtitle_css;
	$_style_block .= '}';
}
if ( $overlay_css ) {
	$_style_block .= '#' . $banner_box_uniqid . ' .box-title,';
	$_style_block .= '#' . $banner_box_uniqid . ' .banner-overlay{';
	$_style_block .= $overlay_css;
	$_style_block .= '}';
}
// if ( isset( $button_css['css'] ) && $button_css['css'] ) {
// 	$_style_block .= '#' . $banner_box_uniqid . ' .btn-link,';
// 	$_style_block .= '#' . $banner_box_uniqid . ' .btn{';
// 	$_style_block .= $button_css['css'];
// 	$_style_block .= '}';
// }
// if ( isset( $button_css['hover-css'] ) && $button_css['hover-css'] ) {
// 	$_style_block .= '#' . $banner_box_uniqid . ' .btn:hover{';
// 	$_style_block .= $button_css['hover-css'];
// 	$_style_block .= '}';
// }

OhioLayout::append_to_shortcodes_css_buffer( $_style_block );
