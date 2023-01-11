<?php

/**
* WPBakery Page Builder Ohio Accordion shortcode custom style
*/

$_style_block = '';

if ( $content_css ) {
	$_style_block .= '#' . $horizontal_accordion_uniqid . ' .horizontal_accordionItem_content p{';
	$_style_block .= $content_css;
	$_style_block .= '}';
}
if ( $active_settings ) {
	$_style_block .= '#' . $horizontal_accordion_uniqid . ' .horizontal_accordionItem.active .horizontal_accordionItem_title .horizontal_accordionItem_control,'; 
	$_style_block .= '#' . $horizontal_accordion_uniqid . ' .horizontal_accordionItem_title:hover .horizontal_accordionItem_control{ ';
	$_style_block .= $active_settings;
	$_style_block .= ' } '; 
}

if ( $tab_bg_settings ) {
	$_style_block .= '#' . $horizontal_accordion_uniqid . ' .horizontal_accordionItem_content {';
	$_style_block .= $tab_bg_settings;
	$_style_block .= '}';
}

if ( $tab_border_settings ) {
	$_style_block .= '#' . $horizontal_accordion_uniqid . ' .horizontal_accordionItem_content:hover {';
	$_style_block .= $tab_border_settings;
	$_style_block .= '}';
}


OhioLayout::append_to_shortcodes_css_buffer( $_style_block );