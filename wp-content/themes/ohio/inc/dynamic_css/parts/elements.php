<?php
/*
	Custom style for other elements
	
	Table of contents: (you can use search)
	# 1. Variables
	# 2. "Go top" arrow background color
	# 3. Preloader shape color
	# 3.1. Preloader background color
	# 4. Portfolio filter text color
	# 4.1. Accent color
	# 5. Fullscreen menu
	# 5.1. Text typo
	# 6. Popup background
	# 8. Custom cursor color
	# 9. View
*/


# 1. Variables

$go_top_border = false;
$preloader_color = false;
$preloader_background = false;
$portfolio_page_text = false;
$portfolio_page_accent = false;
$fullscreen_background_color = false;
$fullscreen_links_color = false;
$fullscreen_links_typo = false;
$custom_cursor_color = false;

$scroll_top_typo_css = '';
$preloader_color_css = '';
$preloader_percentage_color_css = '';
$preloader_background_css = '';
$portfolio_page_text_css = '';
$portfolio_page_accent_css = '';
$fullscreen_background_color_css = '';
$fullscreen_links_typo_css = '';
$fullscreen_links_icon_color_css = '';


# 2. "Go top" arrow border color

$go_top_typo = OhioOptions::get( 'page_arrow_typo' );

if ( $go_top_typo ) {
	$scroll_top_typo_css = OhioHelper::parse_acf_typo_to_css( $go_top_typo );
}


# 3. Preloader shape color

$preloader_color = OhioOptions::get_global( 'page_preloader_shapes_color' );

if ( $preloader_color ) {
	$preloader_color_css = 'stroke:' . $preloader_color . ';' . 'background-color:' . $preloader_color . ';';
}

if ( $preloader_color ) {
	$preloader_percentage_color_css = 'color:' . $preloader_color . ';';
}


# 3.1. Preloader background color

$preloader_background = OhioOptions::get_global( 'page_preloader_background' );

if ( $preloader_background ) {
	$preloader_background_css = 'background-color:' . $preloader_background . ';';
}


# 4. Portfolio filter text color

$portfolio_page_typo = OhioOptions::get( 'project_filter_text_typo' );

if ( $portfolio_page_typo ) {
	$portfolio_page_text_css = OhioHelper::parse_acf_typo_to_css( $portfolio_page_typo );
}


# 4.1. Accent color

$portfolio_page_accent = OhioOptions::get( 'project_filter_accent_typo' );

if ( $portfolio_page_accent ) {
	$portfolio_page_accent_css = OhioHelper::parse_acf_typo_to_css( $portfolio_page_accent );
}


# 5.1. Text typo

$fullscreen_links_typo = OhioOptions::get_global( 'page_fullscreen_menu_text_typo' );

if ( $fullscreen_links_typo ) {
	$fullscreen_links_typo = json_decode( $fullscreen_links_typo );
	$fullscreen_links_typo_css = OhioHelper::parse_acf_typo_to_css( $fullscreen_links_typo );
	$fullscreen_links_color = OhioHelper::parse_acf_typo_to_css( $fullscreen_links_typo, array( 'rule' => 'only_color' ) );
	if ( $fullscreen_links_color ) {
		$fullscreen_links_icon_color_css = OhioHelper::parse_acf_typo_to_css( $fullscreen_links_typo, array( 'rule' => 'include', 'fields' => array( 'color' ) ) );
	}
}

# 6. Popup background
$popup_background_color_css = '';
$popup_background_image_css = '';
$popup_background_type = OhioOptions::get_global( 'subscribe_popup_background_type', 'color' );

$popup_background_color = OhioOptions::get_global( 'subscribe_popup_background_color' );
if ( $popup_background_color ) {
	$popup_background_color_css = 'background-color:' . $popup_background_color . ';';
}

if ( $popup_background_type == 'image' ) {
	$popup_background_image_css = OhioHelper::get_background_image_css_by_type( 'subscribe_popup', 'global', false, 'medium_large' );
}

# 7. Notification background color
$notification_background_color = OhioOptions::get_global( 'notification_background_color' );

# 8. Custom cursor color
if (OhioOptions::get_global('page_custom_cursor')) {
	$custom_cursor_color = OhioOptions::get_global( 'page_custom_cursor_color', false );
}

# 9. View

if ( $preloader_color_css ) {
	$_selector = [
		'.spinner .path',
		'.sk-preloader .sk-circle:before',
		'.sk-folding-cube .sk-cube:before',
		'.sk-preloader .sk-child:before',
		'.sk-double-bounce .sk-child'
	];
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $preloader_color_css );
}

if ( $preloader_percentage_color_css ) {
	$_selector = [
		'.sk-percentage .sk-percentage-percent',
	];
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $preloader_percentage_color_css );
}

if ( $preloader_background_css ) {
	$_selector = '.page-preloader:not(.percentage-preloader),';
	$_selector .= '.page-preloader.percentage-preloader .sk-percentage';
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $preloader_background_css );
}

if ( $scroll_top_typo_css ) {
	$_selector = [
		'.clb-scroll-top:not(.light-typo):not(.dark-typo)',
		'.clb-scroll-top:hover',
		'.clb-scroll-top:not(.light-typo):not(.dark-typo) .font-titles',
	];
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $scroll_top_typo_css );
}

if ( $portfolio_page_text_css ) {
	$_selector = [
		'.portfolio-sorting li',
		'.portfolio-sorting li a'
	];
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $portfolio_page_text_css );
}

if ( $portfolio_page_accent_css ) {
	$_selector = '.portfolio-sorting ul li a.active';
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $portfolio_page_accent_css );
}

if ( $fullscreen_background_color_css ) {
	$_selector = [
		'.hamburger-nav',
		'.hamburger-nav.split div.sub-sub-nav:before',
		'.hamburger-nav.split div.sub-nav:before',
	];
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $fullscreen_background_color_css );
}

if ( $fullscreen_links_typo_css ) {
	$_selector = [
		'.hamburger-nav .menu .nav-item a span',
		'.hamburger-nav .menu li.current-menu-item > a > span',
		'.hamburger-nav .copyright a',
		'.hamburger-nav .copyright'
	];
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $fullscreen_links_typo_css );
}


if ( $popup_background_color_css ) {
	$_selector = '.clb-subscribe';
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $popup_background_color_css );
}

if ( $popup_background_image_css ) {
	$_selector = '.clb-subscribe-img';
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $popup_background_image_css );
}

if ( $notification_background_color ) {
	$_selector = '.notification-bar';
	$_css = 'background-color:' . $notification_background_color . ';';
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

if ($custom_cursor_color) {
	$_selector = [
		'body.custom-cursor .circle-cursor--inner',
		'body.custom-cursor .circle-cursor--inner.cursor-link-hover'
	];
	$_css = 'background-color:' . $custom_cursor_color . ';';
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );

	$_selector = [
		'body.custom-cursor .circle-cursor--outer',
		'body.custom-cursor .circle-cursor--outer.cursor-link-hover'
	];
	$_css = 'border-color:' . $custom_cursor_color . ';';
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}