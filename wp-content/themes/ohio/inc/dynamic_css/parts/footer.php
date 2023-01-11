<?php
/*
	Footer custom style
	
	Table of contents: (you can use search)
	# 1. Variables
	# 2. Background type
	# 3. Background color
	# 4. Background image
	# 5. Text color
	# 6. Widget logo site name typography
	# 7. Copyright background color
	# 8. Copyright text color
	# 9. View
*/


# 1. Variables
$text_color = false;
$widget_title_color = false;
$footer_sitename_typo = false;
$copyright_background = false;
$copyright_text_color = false;

$background_color_css = '';
$background_image_css = '';
$background_text_color_css = '';
$border_color_css = '';
$text_color_css = '';
$text_typo_css = '';
$widget_title_css = '';
$footer_sitename_typo_css = '';
$copyright_background_color_css = '';
$copyright_background_image_css = '';
$copyright_text_color_css = '';
$copyright_links_color_css = '';
$copyright_text_color_css = '';


# 2. Background type
$background_type = OhioOptions::get( 'page_footer_background_type' );
$background_select_type = OhioOptions::get_last_select_type();

if ( !$background_type ) $background_type = 'color';


# 3. Background color
$background_color = OhioOptions::get_by_type( 'page_footer_background_color', $background_select_type );

if ( $background_color ) {
	$background_color_css = 'background-color:' . $background_color . ';';
}

# 4. Background image
if ( $background_type == 'image' ) {
	$background_image_css = OhioHelper::get_background_image_css_by_type( 'page_footer', $background_select_type );
}

# 5. Text color
$text_typo = OhioOptions::get( 'page_footer_text_typo' );
if ( $text_typo ) {
	$text_typo_css = OhioHelper::parse_acf_typo_to_css( $text_typo );
}

if ( $text_color ) {
	$text_color_css = 'color:' . $text_color . ';';
	$border_color_css = 'border-color:' . $text_color . ';';
	$background_text_color_css = 'background-color:' . $text_color . ';';
}

$widget_title_typo = OhioOptions::get( 'page_footer_widget_title_typo' );

if ( $widget_title_typo ) {
	$widget_title_css = OhioHelper::parse_acf_typo_to_css( $widget_title_typo );
}


# 6. Widget logo site name typography
$footer_logo_type = OhioOptions::get( 'page_footer_logo_widget_type', 'light_variant' );
$footer_logo_select_type = OhioOptions::get_last_select_type();

if ( $footer_logo_type == 'sitename' ) {
	$footer_sitename_typo = OhioOptions::get_by_type( 'page_footer_sitename_typo', $footer_logo_select_type );
}

$footer_sitename_typo_css = OhioHelper::parse_acf_typo_to_css( $footer_sitename_typo );


# 7. Copyright background
$copyright_background_type = OhioOptions::get( 'page_footer_copyright_section_background_type' );
$copyright_background_select_type = OhioOptions::get_last_select_type();
if ( !$copyright_background_type ) $copyright_background_type = 'color';

$copyright_background_color = OhioOptions::get_by_type( 'page_footer_copyright_section_background_color', $copyright_background_select_type );
if ( $copyright_background_color ) {
	$copyright_background_color_css = 'background-color:' . $copyright_background_color . ';';
}
if ( $copyright_background_type == 'image' ) {
	$copyright_background_image_css = OhioHelper::get_background_image_css_by_type( 'page_footer_copyright_section', $copyright_background_select_type );
}

# 8. Copyright text color
$copyright_text_typo = OhioOptions::get( 'page_footer_copyright_section_text_typo' );

if ( $copyright_text_typo ) {
	$copyright_text_color_css = OhioHelper::parse_acf_typo_to_css( $copyright_text_typo );
}

$copyright_links_color = OhioOptions::get( 'page_footer_copyright_section_links_color' );

if ( $copyright_links_color ) {
	$copyright_links_color_css = 'color:' . $copyright_links_color . ';';
}

# 9. View
if ( $background_color_css || $background_image_css || $text_typo_css ) {
	$_selector = '.site-footer';
	$_css = $background_color_css . $background_image_css . $text_typo_css;
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

if ( $text_typo_css ) {
	$_selector = [
		'.site-footer',
		'.site-footer .widgets a',
		'.site-footer .btn-flat'
	];
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $text_typo_css );
}

if ( $widget_title_css ) {
	$_selector = '.site-footer .widget-title';
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $widget_title_css );
}

if ( $copyright_background_image_css || $copyright_background_color_css || $copyright_text_color_css ) {
	$_selector = '.site-footer .site-info';
	$_css = $copyright_background_color_css . $copyright_background_image_css . $copyright_text_color_css;
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

if ( $copyright_links_color_css ) {
	$_selector = '.site-footer .site-info a';
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $copyright_links_color_css );
}

if ( $footer_sitename_typo_css ) {
	$_selector = 'footer.site-footer .widget_argenta_widget_logo .theme-logo a h3';
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $footer_sitename_typo_css );
}