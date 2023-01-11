<?php

/**
* WPBakery Page Builder Ohio Pricing Table shortcode custom style
*/

$_style_block = '';

if ( $borders_settings ) {
	$_style_block .= '#' . $pricing_table_uniqid . ' .pricing_price,';
	$_style_block .= '#' . $pricing_table_uniqid . ' .pricing_list li,';
	$_style_block .= '#' . $pricing_table_uniqid . ' .pricing_list li:first-child{';
	$_style_block .= $borders_settings;
	$_style_block .= '}';
}
if ( $title_settings ) {
	$_style_block .= '#' . $pricing_table_uniqid . ' .pricing_title{';
	$_style_block .= $title_settings;
	$_style_block .= '}';
}
if ( $subtitle_settings ) {
	$_style_block .= '#' . $pricing_table_uniqid . ' .pricing_subtitle{';
	$_style_block .= $subtitle_settings;
	$_style_block .= '}';
}
if ( $description_settings ) {
	$_style_block .= '#' . $pricing_table_uniqid . ' .pricing_price .pricing_price_subtitle{';
	$_style_block .= $description_settings;
	$_style_block .= '}';
}
if( $price_settings ) {
	$_style_block .= '#' . $pricing_table_uniqid . ' .pricing_price .pricing_price_title{';
	$_style_block .= $price_settings;
	$_style_block .= '}';
}
if( $price_caption_settings ) {
	$_style_block .= '#' . $pricing_table_uniqid . ' .pricing_price .pricing_price_time{';
	$_style_block .= $price_caption_settings;
	$_style_block .= '}';
}

if ( $button_css['css'] ) {
	$_style_block .= '#' . $pricing_table_uniqid . ' .btn{';
	$_style_block .= $button_css['css'];
	$_style_block .= '}';
}
if ( $button_css['hover-css'] ) {
	$_style_block .= '#' . $pricing_table_uniqid . ' .btn:hover{';
	$_style_block .= $button_css['hover-css'];
	$_style_block .= '}';
}

if( $features_titles_settings ) {
	$_style_block .= '#' . $pricing_table_uniqid . ' .pricing_list .pricing_list_item.enabled .title{';
	$_style_block .= $features_titles_settings;
	$_style_block .= '}';
}
if( $features_icons_settings ) {
	$_style_block .= '#' . $pricing_table_uniqid . ' .pricing_list .pricing_list_item.enabled .ion{';
	$_style_block .= $features_icons_settings;
	$_style_block .= '}';
}
if( $features_disabled_titles_settings ) {
	$_style_block .= '#' . $pricing_table_uniqid . ' .pricing_list .pricing_list_item.disabled .title{';
	$_style_block .= $features_disabled_titles_settings;
	$_style_block .= '}';
}
if( $features_disabled_icons_settings ) {
	$_style_block .= '#' . $pricing_table_uniqid . ' .pricing_list .pricing_list_item.disabled .ion{';
	$_style_block .= $features_disabled_icons_settings;
	$_style_block .= '}';
}

OhioLayout::append_to_shortcodes_css_buffer( $_style_block );