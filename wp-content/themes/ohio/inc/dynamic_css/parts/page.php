<?php
/*
	Page custom style
	
	Table of contents: (you can use search)
	# 1. Variables
	# 2. Background type
	# 3. Background color
	# 4. Background image
	# 5. Links & border color
	# 6. Full width container margins
	# 7. View
*/


# 1. Variables

$background_color_css = '';
$background_image_css = '';
$full_width_margins_css = '';
$content_wrapper_width_css = '';
$content_header_wrapper_width_css = '';
$full_width_header_margins_css = '';
$content_footer_wrapper_width_css = '';
$full_width_footer_margins_css = '';
$boxed_page_margins_css = '';

# 2. Background type
$background_type = OhioOptions::get( 'page_background_type' );
$background_select_type = OhioOptions::get_last_select_type();

if ( !$background_type ) {
	$background_type = 'color';
}

# 3. Background color
$background_color = OhioOptions::get_by_type( 'page_background_color', $background_select_type );

if ( $background_color ) {
	$background_color_css = 'background-color:' . $background_color . ';';
}

# 4. Background image
if ( $background_type == 'image' ) {
	$background_image_css = OhioHelper::get_background_image_css_by_type( 'page', $background_select_type );
}

# 6. Full width container margins
$content_wrapper_width = OhioOptions::get( 'page_content_wrapper_width', null, false, true );
$content_header_wrapper_width = OhioOptions::get( 'page_header_content_wrapper_width', null, false, true );
$content_footer_wrapper_width = OhioOptions::get( 'page_footer_content_wrapper_width', null, false, true );

if ( $content_wrapper_width ) {
	$content_wrapper_width_css = 'max-width:' . $content_wrapper_width;
}

if ( $content_header_wrapper_width ) {
	$content_header_wrapper_width_css = 'max-width:' . $content_header_wrapper_width;
}

if ( $content_footer_wrapper_width ) {
	$content_footer_wrapper_width_css = 'max-width:' . $content_footer_wrapper_width;
}

$full_width_margins = OhioOptions::get( 'page_full_width_margins_size', null, false, true );
$full_width_header_margins = OhioOptions::get( 'page_header_full_width_margins_size', null, false, true );
$full_width_footer_margins = OhioOptions::get( 'page_footer_full_width_margins_size', null, false, true );

if ( $full_width_margins ) {
	$full_width_margins_css = 'padding-left:' . $full_width_margins . '; padding-right:' . $full_width_margins . ';';
}

if ( $full_width_header_margins ) {
	$full_width_header_margins_css = 'padding-left:' . $full_width_header_margins . '; padding-right:' . $full_width_header_margins . ';';
}

if ( $full_width_footer_margins ) {
	$full_width_footer_margins_css = 'padding-left:' . $full_width_footer_margins . '; padding-right:' . $full_width_footer_margins . ';';
}

$is_page_boxed = OhioOptions::get( 'page_use_boxed_wrapper', false );
$boxed_page_margins = OhioOptions::get( 'page_boxed_wrapper_margins_size', null, false, true );

if ($is_page_boxed) {
	if ( $boxed_page_margins ) {
		$boxed_page_margins_css = 'margin-left:'. $boxed_page_margins . '; margin-right:'. $boxed_page_margins .';';
	}
}

# 7. View

if ( $background_color_css || $background_image_css ) {
	$_selector = [
		'.site-content',
		'.clb-page-headline:before'
	];
	$_css = $background_color_css . $background_image_css;
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

if ( $full_width_margins_css ) {
	$_selector = '.page-container.full';
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $full_width_margins_css );
}

if ( $full_width_header_margins_css ) {
	$_selector = '.header .header-wrap:not(.page-container)';
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $full_width_header_margins_css );
}

if ( $full_width_footer_margins_css ) {
	$_selector = '.site-footer .page-container.full';
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $full_width_footer_margins_css );
}


if ( $boxed_page_margins_css ) {
	$_selector = '.boxed-container';
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector,  $boxed_page_margins_css  );
}

if ( $content_wrapper_width_css ) {
	$_selector = [
		'.page-container',
		'.elementor .elementor-section.elementor-section-boxed > .elementor-container'
	];
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $content_wrapper_width_css );
}

if ( $content_header_wrapper_width_css ) {
	$_selector = '.header-wrap.page-container';
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $content_header_wrapper_width_css );
}

if ( $content_footer_wrapper_width_css ) {
	$_selector = '.site-footer .page-container';
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $content_footer_wrapper_width_css );
}

$posts_card_background = OhioOptions::get( 'posts_card_background_color', null, false, true );
if ( $posts_card_background ) {
	$_selector = [
		'.blog-grid-type-4:not(.without-media)',
		'.blog-grid.boxed:not(.blog-grid-type-2):not(.blog-grid-type-6) .blog-grid-content',
		'.blog-grid-type-6.boxed'
	];
	$_css = 'background-color:' . $posts_card_background . ';';
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

$project_slider_overlay = OhioOptions::get( 'project_color_overlay', null, false, true );

if ( $project_slider_overlay && $project_slider_overlay != 1 ) {
	$_selector = [
		'.project-page.layout-type5 .project-image-overlay',
		'.project-page.layout-type6 .project-image-overlay',
		'.project-page.layout-type8 .project-image-overlay'
	];
	$_css = 'background-color:' . $project_slider_overlay . ';';
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

$project_slider_overlay = OhioOptions::get( 'project_grid_video_btn_bg', null, false, true );

if ( $project_slider_overlay && $project_slider_overlay != 1 ) {
	$_selector = [
		'.project-page .video-module .btn-round .ion',
	];
	$_css = 'background-color:' . $project_slider_overlay . ';';
	$_css .= 'border-color:' . $project_slider_overlay . ';';
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}