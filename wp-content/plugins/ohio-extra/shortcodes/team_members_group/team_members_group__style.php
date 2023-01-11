<?php

/**
* WPBakery Page Builder Ohio Team Members Group shortcode custom style
*/

$_style_block = '';

if ( $content_bg_css ) {
	$_style_block = '#' . $team_group_uniqid . ' .cover-content{';
	$_style_block .= $content_bg_css;
	$_style_block .= '}';
}

OhioLayout::append_to_shortcodes_css_buffer( $_style_block );