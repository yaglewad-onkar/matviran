<?php

/**
* WPBakery Page Builder Ohio Accordion shortcode custom style
*/

$_style_block = '';

if ( $tab_css ) {
	$_style_block .= '#' . $accordion_uniqid . ' .accordionItem_title h6{';
	$_style_block .= $tab_css;
	$_style_block .= '}';
}
if ( $content_css ) {
	$_style_block .= '#' . $accordion_uniqid . ' .accordionItem_content p{';
	$_style_block .= $content_css;
	$_style_block .= '}';
}
if ( $active_settings ) {
	$_style_block .= '#' . $accordion_uniqid . ' .accordionItem.active .accordionItem_title .accordionItem_control,'; 
	$_style_block .= '#' . $accordion_uniqid . ' .accordionItem_title:hover .accordionItem_control{ ';
	$_style_block .= $active_settings;
	$_style_block .= ' } '; 
}

OhioLayout::append_to_shortcodes_css_buffer( $_style_block );