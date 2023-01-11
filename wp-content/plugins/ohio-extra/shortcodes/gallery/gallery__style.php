<?php

/**
* WPBakery Page Builder Ohio Gallery shortcode custom style
*/

$_style_block = '';

if ( $images_css ) {
	$_style_block .= '#' . $images_uniqid . ' .gallery-image{';
	$_style_block .= $images_css;
	$_style_block .= '}';
}
if ( $overlay_settings ) {
	$_style_block .= '#' . $images_uniqid . ' .grid-item-overlay{';
	$_style_block .= $overlay_settings;
	$_style_block .= '}';
}
if ( $title_css ) {
	$_style_block .= '#' . $images_uniqid . ' h5.title {';
	$_style_block .= $title_css;
	$_style_block .= '}';
}
if ( $caption_css ) {
	$_style_block .= '#' . $images_uniqid . ' .caption{';
	$_style_block .= $caption_css;
	$_style_block .= '}';
}
if ( $icon_settings ) {
	$_style_block .= '#' . $images_uniqid . ' .btn-round .ion {';
	$_style_block .= $icon_settings;
	$_style_block .= '}';
}
if ( $gallery_bg_settings ) {
	$_style_block .= '#' . $gallery_uniqid . '{';
	$_style_block .= $gallery_bg_settings;
	$_style_block .= '}';
}
if ( $gallery_buttons_settings ) {
	$_style_block .= '#' . $gallery_uniqid . ' .expand .ion,';
	$_style_block .= '#' . $gallery_uniqid . ' .clb-close .ion{';
	$_style_block .= $gallery_buttons_settings;
	$_style_block .= '}';
}
if ( $gallery_title_css ) {
	$_style_block .= '#' . $gallery_uniqid . ' h5{';
	$_style_block .= $gallery_title_css;
	$_style_block .= '}';
}
if ( $gallery_caption_css ) {
	$_style_block .= '#' . $gallery_uniqid . ' .caption{';
	$_style_block .= $gallery_caption_css;
	$_style_block .= '}';
}
if ( $slider_nav_bg_settings ) {
	$_style_block .= '#' . $gallery_uniqid . ' .clb-slider-nav-btn .ion {';
	$_style_block .= $slider_nav_bg_settings;
	$_style_block .= '}';
}
if ( $slider_nav_settings ) {
	$_style_block .= '#' . $gallery_uniqid . ' .clb-slider-nav-btn .ion {';
	$_style_block .= $slider_nav_settings;
	$_style_block .= '}';
}

if ( $use_pagination ) {
	if ( $pagination_css ) {
		switch ( $pagination_type ) {
			case 'simple':
				$_style_block .= '#' . $gallery_uniqid . ' .pagination a {';
				$_style_block .= $pagination_css;
				$_style_block .= '}';
				break;
			case 'lazy_scroll':
			case 'lazy_button':
				$_style_block .= '#' . $gallery_uniqid . ' .lazy-load {';
				$_style_block .= $pagination_css;
				$_style_block .= '}';
				break;
		}
	}
	if ( $pagination_hover_css ) {
		switch ( $pagination_type ) {
			case 'simple':
				$_style_block .= '#' . $gallery_uniqid . ' .pagination a:hover,';
				$_style_block .= '#' . $gallery_uniqid . ' .pagination a.active {';
				$_style_block .= $pagination_hover_css;
				$_style_block .= '}';
				break;
			case 'lazy_scroll':
			case 'lazy_button':
				$_style_block .= '#' . $gallery_uniqid . ' .lazy-load:hover {';
				$_style_block .= $pagination_hover_css;
				$_style_block .= '}';
				break;
		}
	}
}

OhioLayout::append_to_shortcodes_css_buffer( $_style_block );