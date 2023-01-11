<?php
/*
	Breadcrumbs custom style
*/

$background_color_css = '';
$background_image_css = '';
$text_color_css = '';


$background_type = OhioOptions::get( 'page_breadcrumbs_background_type' );
$background_select_type = OhioOptions::get_last_select_type();

if ( !$background_type ) $background_type = 'color';

$background_color = OhioOptions::get_by_type( 'page_breadcrumbs_background_color', $background_select_type );

if ( $background_color ) {
	$background_color_css = 'background-color:' . $background_color . ';';
}

if ( $background_type == 'image' ) {
	$background_image_css = OhioHelper::get_background_image_css_by_type( 'page_breadcrumbs', $background_select_type );
}

$text_typo = OhioOptions::get( 'page_breadcrumbs_text_typo' );
if ( $text_typo ) {
	$text_color_css = OhioHelper::parse_acf_typo_to_css( $text_typo );
}


if ( $background_color_css || $background_image_css ) {
	$_selector = '.breadcrumbs';
	$_css = $background_color_css . $background_image_css;
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

if ( $text_color_css ) {
	$_selector = [
		'.breadcrumbs .breadcrumbs-slug a',
		'.breadcrumbs .breadcrumbs-slug span',
		'.breadcrumbs .breadcrumbs-slug i'
	];
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $text_color_css );
}
