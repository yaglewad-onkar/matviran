<?php

/**
* WPBakery Page Builder Ohio Service Table shortcode custom style
*/

$_style_block = '';

if ( $title_settings ) {
	$_style_block .= '#' . $service_table_uniqid . ' .service_title{';
	$_style_block .= $title_settings;
	$_style_block .= '}';
}
if ( $description_settings ) {
	$_style_block .= '#' . $service_table_uniqid . ' .service_subtitle{';
	$_style_block .= $description_settings;
	$_style_block .= '}';
}
if( $main_icon_css ) {
	$_style_block .= '#' . $service_table_uniqid . ' .service_icon span:before{';
	$_style_block .= $main_icon_css;
	$_style_block .= '}';
}
if ( $table_bg_css ) {
	$_style_block .= '#' . $service_table_uniqid . '{';
	$_style_block .= $table_bg_css;
	$_style_block .= '}';
}
if ( $table_bg_hover_css ) {
	$_style_block .= '#' . $service_table_uniqid . ':hover {';
	$_style_block .= $table_bg_hover_css;
	$_style_block .= '}';
}
if( $features_titles_settings ) {
	$_style_block .= '#' . $service_table_uniqid . ' .service_list .service_list_item.enabled .title{';
	$_style_block .= $features_titles_settings;
	$_style_block .= '}';
}
if( $features_icons_settings ) {
	$_style_block .= '#' . $service_table_uniqid . ' .service_list .service_list_item.enabled .ion{';
	$_style_block .= $features_icons_settings;
	$_style_block .= '}';
}
if( $features_disabled_titles_settings ) {
	$_style_block .= '#' . $service_table_uniqid . ' .service_list .service_list_item.disabled .title{';
	$_style_block .= $features_disabled_titles_settings;
	$_style_block .= '}';
}
if( $features_disabled_icons_settings ) {
	$_style_block .= '#' . $service_table_uniqid . ' .service_list .service_list_item.disabled .ion{';
	$_style_block .= $features_disabled_icons_settings;
	$_style_block .= '}';
}

OhioLayout::append_to_shortcodes_css_buffer( $_style_block );