<?php

/**
* WPBakery Page Builder Ohio Pricing List shortcode custom style
*/

$_style_block = '';

if ( $title_css ) {
	$_style_block .= '#' . $menu_list_uniqid . '.menu-list h6{';
	$_style_block .= $title_css;
	$_style_block .= '}';
}
if ( ! $regular_price && $sale_price ) {
	if ( $regular_price_css ) {
		$_style_block .= '#' . $menu_list_uniqid . '.menu-list .regular-price{';
		$_style_block .= $regular_price_css;
		$_style_block .= '}';
	}
} else {
	if ( $sale_price_css ) {
		$_style_block .= '#' . $menu_list_uniqid . '.menu-list .discount-price{';
		$_style_block .= $sale_price_css;
		$_style_block .= '}';
	}
}
if ( $regular_price_css ) {
	$_style_block .= '#' . $menu_list_uniqid . '.menu-list .regular-price{';
	$_style_block .= $regular_price_css;
	$_style_block .= '}';
}
if ( $mark_css ) {
	$_style_block .= '#' . $menu_list_uniqid . '.menu-list .menu-list-details .tag{';
	$_style_block .= $mark_css;
	$_style_block .= '}';
}
if ( $details_css ) {
	$_style_block .= '#' . $menu_list_uniqid . '.menu-list .menu-list-details p{';
	$_style_block .= $details_css;
	$_style_block .= '}';
}

OhioLayout::append_to_shortcodes_css_buffer( $_style_block );