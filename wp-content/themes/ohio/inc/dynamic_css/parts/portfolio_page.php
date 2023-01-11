<?php
/*
	Page custom style
	
	Table of contents: (you can use search)
	# 1. Variables
	# 2. Colors
	# 3. View
*/

if ( ! OhioSettings::page_is( 'projects_page' ) ) {
	return false;
}

# 1. Variables

$overlay_color     = false;
$slider_nav_color     = false;
$slider_bullets_color     = false;
$background_color  = false;
$lightbox_trigger_color  = false;
$video_btn_color = false;

$overlay_color_css     = '';
$slider_nav_color_css     = '';
$slider_bullets_color_css     = '';
$background_color_css  = '';
$lightbox_trigger_color_css  = '';
$video_btn_color_css = '';

// Get layout
$projects_layout_item = OhioOptions::get( 'portfolio_item_layout_type', 'type_1' );


# 2. Colors

$overlay_color = OhioOptions::get( 'portfolio_grid_overlay_color' );
$overlay_gradient_color_css = '';
if ( $overlay_color ) {
	$overlay_color_css = 'background-color:' . $overlay_color . ';';

	if ($projects_layout_item == 'grid_7') {
		$overlay_gradient_color_css = 'background-image: linear-gradient(to right, rgba(255, 255, 255, 0), '. $overlay_color .');';
	} else if ($projects_layout_item == 'grid_10') {
		$overlay_gradient_color_css = 'background-image: linear-gradient(to left, rgba(255, 255, 255, 0), '. $overlay_color .');';
	} else if ($projects_layout_item == 'grid_9') {
		$overlay_gradient_color_css = 'background-image: linear-gradient(to left, rgba(255, 255, 255, 0), '. $overlay_color .');';
	} else {
		$overlay_gradient_color_css = '';
	}
}

$video_btn_color = OhioOptions::get( 'portfolio_grid_video_btn_bg' );
if ( $video_btn_color ) {
	$video_btn_color_css = 'background-color:' . $video_btn_color . ';';
	$video_btn_color_css .= 'border-color:' . $video_btn_color . ';';

	$_selector = [
		'.portfolio-grid .video-module .btn-round .ion',
		'.portfolio-onepage-slider .video-module .btn-round .ion'
	];
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $video_btn_color_css );
}

$slider_nav_color_css = OhioOptions::get( 'portfolio_nav_color' );
if ( $slider_nav_color_css ) {
	$slider_nav_color_css = 'color:' . $slider_nav_color_css . ';';
	$_selector = [
		'.clb-slider-nav-btn .btn-round-light .ion'
	];
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $slider_nav_color_css );
}

$slider_bullets_color_css = OhioOptions::get( 'portfolio_bullets_color' );
if ( $slider_bullets_color_css && $slider_bullets_color_css != 1) {
	$slider_bullets_color_css = 'color:' . $slider_bullets_color_css . ';';
	$_selector = [
		'.clb-slider-pagination .clb-slider-page'
	];
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $slider_bullets_color_css );
}

$background_color = OhioOptions::get( 'portfolio_grid_background_color' );
if ( $background_color ) {
	$background_color_css = 'background-color:' . $background_color . ';';
}

$lightbox_trigger_color = OhioOptions::get( 'lightbox_trigger_color' );
if ( $lightbox_trigger_color ) {
	$lightbox_trigger_color_css = 'color:' . $lightbox_trigger_color . ';';
}

$description_overlay_color = OhioOptions::get( 'portfolio_grid_description_overlay_color' );
$description_overlay_color_css = '';
if ( $description_overlay_color ) {
	$description_overlay_color_css = 'background-color:' . $description_overlay_color . ';';
}

# 6. View

if ( $overlay_color_css ) {
	$_selector = [
		'.portfolio-grid .hover-color-overlay.portfolio-grid-type-1 .portfolio-item-image a:after',
		'.portfolio-grid .hover-color-overlay.portfolio-grid-type-2 .portfolio-item-image:after',
		'.portfolio-grid .hover-color-overlay.portfolio-grid-type-11 .portfolio-item-image:after',
		'.portfolio-grid .hover-color-overlay .slider a:after',
		'.portfolio-item-fullscreen.portfolio-grid-type-7',
		'.portfolio-item-fullscreen.portfolio-item .portfolio-item-overlay',
		'.portfolio-item-fullscreen.portfolio-grid-type-10 .portfolio-bg-overlay:before',
		'[data-interactive-links-grid] .portfolio-grid-images.portfolio-grid8-images .interactive-links-grid-image:after'
	];
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $overlay_color_css );
}

if ($overlay_gradient_color_css) {
	$_selector = [
		'.portfolio-item-fullscreen.portfolio-grid-type-7 .portfolio-item-image:before',
		'.portfolio-item-fullscreen.portfolio-grid-type-9 .portfolio-item-image:before', 
		'.portfolio-item-fullscreen.portfolio-grid-type-10 .portfolio-item-image:before',
	];
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $overlay_gradient_color_css );
}

if ( $background_color_css ) {
	$_selector = [
		'.portfolio-grid .portfolio-grid-type-1.boxed .portfolio-item-details',
	];
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $background_color_css );
}

if ( $lightbox_trigger_color_css ) {
	$_selector = [
		'.portfolio-grid .btn-round-outline .ion',
	];
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $lightbox_trigger_color_css );
}

if ( $description_overlay_color_css ) {
	$_selector = [
		'.portfolio-grid .portfolio-item-grid.portfolio-grid-type-11 .portfolio-item-details .title',
		'.portfolio-grid .portfolio-item-grid.portfolio-grid-type-11 .portfolio-item-details .category-holder'
	];
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $description_overlay_color_css );
}

// title typo
$title_typo = OhioOptions::get_global( 'portfolio_title_typo' );
$title_typo_css = OhioHelper::parse_acf_typo_to_css( $title_typo );
if ( $title_typo_css ) {
	$_selector = [
		'.portfolio-item .portfolio-item-headline',
		'.portfolio-item-fullscreen.portfolio-item .portfolio-details-title h1.portfolio-details-headline',
		'.portfolio-item-fullscreen.portfolio-item .portfolio-details-title h2.portfolio-details-headline',
		'.portfolio-item-fullscreen.portfolio-item .portfolio-details-title h3.portfolio-details-headline',
		'.portfolio-item-grid.portfolio-grid-type-8 .portfolio-item-details a .portfolio-item-headline'

	];
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $title_typo_css );
}

// category typo
$category_typo = OhioOptions::get_global( 'portfolio_category_typo' );
$category_typo_css = OhioHelper::parse_acf_typo_to_css( $category_typo );
if ( $category_typo_css ) {
	$_selector = [
		'.portfolio-item .category',
		'.portfolio-item .show-project-link'
	];
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $category_typo_css );
}

// Short Description typo
if( $projects_layout_item != 'grid_1' && $projects_layout_item != 'grid_2' ) {
	$project_short_desc_typo = OhioOptions::get_global( 'portfolio_descr_typo' );
	$project_short_desc_typo_css = OhioHelper::parse_acf_typo_to_css( $project_short_desc_typo );
	$_selector = '.portfolio-item-fullscreen .portfolio-details-description .short-description';
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $project_short_desc_typo_css );

	$portfolio_date_typo = OhioOptions::get_global( 'portfolio_date_typo' );
	$portfolio_date_typo_css = OhioHelper::parse_acf_typo_to_css( $portfolio_date_typo );
	$_selector = '.portfolio-item-fullscreen .portfolio-details-date';
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $portfolio_date_typo_css );
}

// "View Project" link typo
$project_link_typo = OhioOptions::get_global( 'portfolio_show_more_button_typo' );
$project_link_typo_css = OhioHelper::parse_acf_typo_to_css( $project_link_typo );
$_selector = [
		'.portfolio-details-link .btn',
		'.portfolio-details-link .btn .ion',
		'.portfolio-item-fullscreen .portfolio-details-link .btn'
	];
OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $project_link_typo_css );

// lightbox categories typo
$lightbox_title_typo = OhioOptions::get_global( 'lightbox_category_typo' );
$lightbox_title_typo_css = OhioHelper::parse_acf_typo_to_css( $lightbox_title_typo );
if ( $lightbox_title_typo_css ) {
	$_selector = '.clb-portfolio-lightbox .category';
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $lightbox_title_typo_css );
}

// lightbox title typo
$lightbox_title_typo = OhioOptions::get_global( 'lightbox_title_typo' );
$lightbox_title_typo_css = OhioHelper::parse_acf_typo_to_css( $lightbox_title_typo );
if ( $lightbox_title_typo_css ) {
	$_selector = '.clb-portfolio-lightbox .project-page .project-page-headline';
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $lightbox_title_typo_css );
}

// lightbox description typo
$lightbox_title_typo = OhioOptions::get_global( 'lightbox_description_typo' );
$lightbox_title_typo_css = OhioHelper::parse_acf_typo_to_css( $lightbox_title_typo );
if ( $lightbox_title_typo_css ) {
	$_selector = '.clb-portfolio-lightbox .project-description';
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $lightbox_title_typo_css );
}

// lightbox details typo
$lightbox_details_typo = OhioOptions::get_global( 'lightbox_details_typo' );
$lightbox_details_typo_css = OhioHelper::parse_acf_typo_to_css( $lightbox_details_typo );
if ( $lightbox_details_typo_css ) {
	$_selector = [
		'.clb-portfolio-lightbox .project-page .project-meta',
		'.clb-portfolio-lightbox .project-page .project-meta p',
		'.clb-portfolio-lightbox .project-page .project-meta .project-meta-title'
	];
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $lightbox_details_typo_css );
}

// lightbox link typo
$lightbox_link_typo = OhioOptions::get_global( 'lightbox_link_typo' );
$lightbox_link_typo_css = OhioHelper::parse_acf_typo_to_css( $lightbox_link_typo );
$_selector = '.clb-portfolio-lightbox .btn';
OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $lightbox_link_typo_css );

// lightbox date typo
$lightbox_date_typo = OhioOptions::get_global( 'lightbox_date_typo' );
$lightbox_date_typo_css = OhioHelper::parse_acf_typo_to_css( $lightbox_date_typo );
$_selector = '.clb-portfolio-lightbox .date';
OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $lightbox_date_typo_css );