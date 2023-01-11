<?php

/**
* WPBakery Page Builder Ohio Tabs shortcode custom style
*/

$_style_block = '';

if ( $tabs_settings ) {
	$_style_block .= '#' . $tabs_uniqid . '{';
	$_style_block .= $tabs_settings;
	$_style_block .= '}';
}
if ( $content_settings ) {
	$_style_block .= '#' . $tabs_uniqid . ' .tabItems_item p,';
	$_style_block .= '#' . $tabs_uniqid . ' .tabItems_item{';
	$_style_block .= $content_settings;
	$_style_block .= '}';
}
if ( $tab_settings ) {
	$_style_block .= '#' . $tabs_uniqid . ' .tabNav_link{';
	$_style_block .= $tab_settings;
	$_style_block .= '}';
}
if ( $tab_active_settings ) {
	$_style_block .= '#' . $tabs_uniqid . ' .tabNav_link:hover,';
	$_style_block .= '#' . $tabs_uniqid . ' .tabNav_link.active{';
	$_style_block .= $tab_active_settings;
	$_style_block .= '}';
}
if ( $tabs_line_settings ) {
	$_style_block .= '#' . $tabs_uniqid . ' .tabNav .tabNav_line{';
	$_style_block .= $tabs_line_settings;
	$_style_block .= '}';
}
if ( $tabs_border_settings ) {
	$_style_block .= '#' . $tabs_uniqid . ' .tabNav_wrapper{';
	$_style_block .= $tabs_border_settings;
	$_style_block .= '}';
}

OhioLayout::append_to_shortcodes_css_buffer( $_style_block );