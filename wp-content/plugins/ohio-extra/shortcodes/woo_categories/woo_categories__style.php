<?php

/**
* WPBakery Page Builder Ohio WooCommerce categories shortcode custom style
*/

$_style_block = '';

if ( $title_css ) {
	$_style_block .= '#' . $woo_categories_uniqid . ' .product-category__title a {';
	$_style_block .= $title_css;
	$_style_block .= '}';
}

if ( $description_css ) {
	$_style_block .= '#' . $woo_categories_uniqid . ' .product-category__description {';
	$_style_block .= $description_css;
	$_style_block .= '}';
}

// TODO: Check compatibility with Ohio 2.0
/*
if ( $decoration_css ) {
	$_style_block .= '#' . $woo_categories_uniqid . ' .product-category__top-line:after {';
	$_style_block .= $decoration_css;
	$_style_block .= '}';
}
*/

if ( $button_css ) {
	$_style_block .= '#' . $woo_categories_uniqid . ' .product-category__info-wrapper a.shop-now{';
	$_style_block .= $button_css;
	$_style_block .= '}';
}

if ( $button_css_hover ) {
	$_style_block .= '#' . $woo_categories_uniqid . ' .product-category__info-wrapper a.shop-now:hover{';
	$_style_block .= $button_css_hover;
	$_style_block .= '}';
}

// TODO: Check compatibility with Ohio 2.0
/*
if ( $overlay_css ) {
	$_style_block .= '#' . $woo_categories_uniqid . ' .product-category--block .product-category__info-wrapper {';
	$_style_block .= $overlay_css;
	$_style_block .= '}';
}
*/

if ( $background_css ) {
	$_style_block .= '#' . $woo_categories_uniqid . ' .product-category--boxed {';
	$_style_block .= $background_css;
	$_style_block .= '}';
}


if ($row_reverse) {
	$_style_block .= '#' . $woo_categories_uniqid . ' .product-category--boxed {';
	$_style_block .= $row_reverse_css;
	$_style_block .= '}';
}

OhioLayout::append_to_shortcodes_css_buffer( $_style_block );