<?php

/**
* WPBakery Page Builder Ohio Video shortcode custom style
*/

$_style_block = '';

if ( $video_module_settings ) {
	$_style_block .= '#' . $video_module_uniqid . '.video-module .content{';
	$_style_block .= $video_module_settings;
	$_style_block .= '}';
}
if ( $title_settings ) {
	$_style_block .= '#' . $video_module_uniqid . '.video-module .video-headline{';
	$_style_block .= $title_settings;
	$_style_block .= '}';
}
if ( $button_settings ) {
	$_style_block .= '#' . $video_module_uniqid . '.video-module .btn-play:before, ';
	$_style_block .= '#' . $video_module_uniqid . '.video-module .btn-play .ion {';
	$_style_block .= $button_settings;
	$_style_block .= '}';
}
if ( $button_after_before_css ) {
	$_style_block .= '#' . $video_module_uniqid . '.video-module.with-animation .btn-play:before{';
	$_style_block .= $button_after_before_css;
	$_style_block .= '}';
}
if ( $icon_settings ) {
	$_style_block .= '#' . $video_module_uniqid . '.video-module .btn-play .ion{';
	$_style_block .= $icon_settings;
	$_style_block .= '}';
}
if ( $button_hover_settings ) {
	$_style_block .= '#' . $video_module_uniqid . '.video-module .btn-play:hover .ion{';
	$_style_block .= $button_hover_settings;
	$_style_block .= '}';

	$_style_block .= '#' . $video_module_uniqid . '.video-module .btn-play:hover:before {';
	$_style_block .= $button_hover_settings;
	$_style_block .= '}';
}
if ( !$button_hover_settings && !$button_layout == 'outline') {
	$_style_block .= '#' . $video_module_uniqid . '.video-module .btn-play:hover .ion{';
	$_style_block .= 'background: #fff;';
	$_style_block .= 'border-color: #fff;';
	$_style_block .= '}';

	$_style_block .= '#' . $video_module_uniqid . '.video-module .btn-play:hover:before {';
	$_style_block .= 'background: #fff;';
	$_style_block .= 'border-color: #fff;';
	$_style_block .= '}';
}
if ( $icon_hover_settings ) {
	$_style_block .= '#' . $video_module_uniqid . '.video-module:hover .btn-play .ion{';
	$_style_block .= $icon_hover_settings;
	$_style_block .= '}';
}

OhioLayout::append_to_shortcodes_css_buffer( $_style_block );