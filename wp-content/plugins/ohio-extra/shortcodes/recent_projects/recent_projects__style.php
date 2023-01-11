<?php

/**
* WPBakery Page Builder Ohio Recent Projects shortcode custom style
*/

$_style_block = '';

if ( $grid_items_gap_css ) {
	$_style_block .= '#' . $recent_projects_uniqid . ' .portfolio-grid .portfolio-item-wrap{';
	$_style_block .= $grid_items_gap_css;
	$_style_block .= '}';
}

if ( $is_slider ) {
	if ( $date_css ) {
		$_style_block .= '#' . $recent_projects_uniqid . ' .portfolio-item .portfolio-details-date{';
		$_style_block .= $date_css;
		$_style_block .= '}';
	}
	if ( $short_description_css ) {
		$_style_block .= '#' . $recent_projects_uniqid . ' .portfolio-item .portfolio-details-description .short-description{';
		$_style_block .= $short_description_css;
		$_style_block .= '}';
	}
	if ( $link_css ) {
		$_style_block .= '#' . $recent_projects_uniqid . ' .portfolio-item a.btn-link{';
		$_style_block .= $link_css;
		$_style_block .= '}';
	}
}

if ( $background_css ) {
	$_style_block .= '#' . $recent_projects_uniqid . ' .portfolio-item-grid.boxed .portfolio-item-details{';
	$_style_block .= $background_css;
	$_style_block .= '}';
}

if ( $overlay_css ) {
	$_style_block .= '#' . $recent_projects_uniqid . ' .hover-color-overlay.portfolio-grid-type-1 .portfolio-item-image a:after,';
	$_style_block .= '#' . $recent_projects_uniqid . ' .hover-color-overlay.portfolio-grid-type-2 .portfolio-item-image:after,';
	$_style_block .= '#' . $recent_projects_uniqid . ' .portfolio-item-fullscreen .portfolio-item-overlay {';
	$_style_block .= $overlay_css;
	$_style_block .= '}';
}

if ( $video_btn_color_css ) {
	$_style_block .= '#' . $recent_projects_uniqid . ' .portfolio-grid .video-module .btn-round .ion, ';
	$_style_block .= '#' . $recent_projects_uniqid . ' .portfolio-onepage-slider .video-module .btn-round .ion {';
	$_style_block .= $video_btn_color_css;
	$_style_block .= '}';
}

if ( $title_css ) {
	$_style_block .= '#' . $recent_projects_uniqid . ' h3.portfolio-details-headline,';
	$_style_block .= '#' . $recent_projects_uniqid . ' h3.portfolio-item-headline,';
	$_style_block .= '#' . $recent_projects_uniqid . ' h2.portfolio-item-headline,';
	$_style_block .= '#' . $recent_projects_uniqid . ' .portfolio-item-headline h3,';
	$_style_block .= '#' . $recent_projects_uniqid . ' .portfolio-details-title h2,';
	$_style_block .= '#' . $recent_projects_uniqid . ' .portfolio-item-headline h2 a{';
	$_style_block .= $title_css;
	$_style_block .= '}';
}

if ( $category_css ) {
	$_style_block .= '#' . $recent_projects_uniqid . ' .portfolio-item .category-holder .category{';
	$_style_block .= $category_css;
	$_style_block .= '}';
}

if ( $description_overlay_color_css ) {
	$_style_block .= '#' . $recent_projects_uniqid . ' .portfolio-grid .portfolio-item-grid.portfolio-grid-type-11 .portfolio-item-details .title,';
	$_style_block .= '#' . $recent_projects_uniqid . ' .portfolio-grid .portfolio-item-grid.portfolio-grid-type-11 .portfolio-item-details .category-holder {';
	$_style_block .= $description_overlay_color_css;
	$_style_block .= '}';
}

if ( $more_css ) {
	$_style_block .= '#' . $recent_projects_uniqid . ' .portfolio-item .btn-link{';
	$_style_block .= $more_css;
	$_style_block .= '}';
}

if ( $nav_btn_color_css ) {
	$_style_block .= '#' . $recent_projects_uniqid . ' .clb-slider-nav-btn .btn-round .ion {';
	$_style_block .= $nav_btn_color_css;
	$_style_block .= '}';
}

OhioLayout::append_to_shortcodes_css_buffer( $_style_block );