<?php
/*
	Subheader custom style
	
	Table of contents: (you can use search)
	# 1. Variables
	# 2. Background color
	# 3. Typography
	# 4. Height
	# 5. View
*/


# 1. Variables

$background_color_css = '';
$background_image_css = '';
$subheader_height_css = '';
$height_css = '';


OhioOptions::get( 'page_subheader_style' ); // trigger select chain
$style_select_type = OhioOptions::get_last_select_type();

# 2. Background color

$background_type = OhioOptions::get_by_type( 'page_subheader_background_type', $style_select_type );
if ( !$background_type ) $background_type = 'color';

$background_color = OhioOptions::get_by_type( 'page_subheader_background_color', $style_select_type );

if ( $background_color ) {
	$background_color_css = 'background-color:' . $background_color . ';';
}
if ( $background_type == 'image' ) {
	$background_image_css = OhioHelper::get_background_image_css_by_type( 'page_subheader', $style_select_type );
}

# 3. Typography

$subheader_typo = OhioOptions::get_by_type( 'page_subheader_text_typo', $style_select_type );
$subheader_typo_css = OhioHelper::parse_acf_typo_to_css( $subheader_typo );


# 4. Height

$subheader_height = OhioOptions::get_by_type( 'page_subheader_height', $style_select_type );

if ( $subheader_height ) {
	$subheader_height_css  = 'height:${height}px;';
	$subheader_height_css .= 'max-height:${height}px;';
	$subheader_height_css .= 'line-height:${height}px;';

	$header_css = 'margin-top:${height}px;';

	$subheader_height_css = OhioHelper::parse_responsive_height_to_css( $subheader_height, $subheader_height_css );
	$header_css = OhioHelper::parse_responsive_height_to_css( $subheader_height, $header_css );
}


# 5. View

if ( $background_color_css || $background_image_css ) {
	$_selector = '.subheader';
	$_css = $background_color_css . $background_image_css;
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

if ( $subheader_typo_css ) {
	$_selector = [
		'.subheader .left',
		'.subheader .right'
	];
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $subheader_typo_css );
}

if ( $subheader_height_css ) {
	$_selector = [
		'.subheader',
		'.subheader .content',
		'.subheader .social-bar li a',
	];
	if ( $subheader_height_css['desktop'] ) {
		OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $subheader_height_css['desktop'], 'desktop' );
	}
	if ( $subheader_height_css['tablet'] ) {
		OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $subheader_height_css['tablet'], 'tablet' );
	}
	if ( $subheader_height_css['mobile'] ) {
		OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $subheader_height_css['mobile'], 'mobile' );
	}
}
