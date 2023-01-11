<?php

/**
* WPBakery Page Builder Ohio Message module shortcode custom style
*/

$_style_block = '';

if ( $message_css ) {
	$_style_block .= '#' . $message_box_uniqid . '.message-box{';
	$_style_block .= $message_css;
	$_style_block .= '}';
}
if ( $link_css ) {
	$_style_block .= '#' . $message_box_uniqid . '.message-box a{';
	$_style_block .= $link_css;
	$_style_block .= '}';
}

OhioLayout::append_to_shortcodes_css_buffer( $_style_block );