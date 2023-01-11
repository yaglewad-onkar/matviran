<?php

/**
* WPBakery Page Builder Ohio Recent Posts shortcode custom style
*/

$_style_block = '';

if ( $items_css ) {
	$_style_block .= '#' . $recent_posts_uniqid . ' .ohio-card-wrapper{';
	$_style_block .= $items_css;
	$_style_block .= '}';

	$_style_block .= '#' . $recent_posts_uniqid . ' .blog-grid.boxed:not(.blog-grid-type-2) .blog-grid-content{';
	// $_style_block .= $card_text_css;
	if ( ! in_array( $card_layout, array( 'simple' ) ) ) {
		$_style_block .= $card_background_css;
	}
	$_style_block .= '}';
	
	if ( in_array( $card_layout, array( 'simple' ) ) ) {
		$_style_block .= '#' . $recent_posts_uniqid . ' .ohio-card-wrapper .blog-grid:hover{';
		$_style_block .= $card_background_css;
		$_style_block .= '}';
	}

	if ( $card_layout == "blog_grid_4") {
		$_style_block .= '#' . $recent_posts_uniqid . ' .blog-grid{';
		$_style_block .= $card_background_css;
		$_style_block .= '}';
	}
}

if ( $heading_css ) {
	$_style_block .= '#' . $recent_posts_uniqid . ' .blog-grid h3 a{';
	$_style_block .= $heading_css;
	$_style_block .= '}';
}
if ( $author_css ) {
	$_style_block .= '#' . $recent_posts_uniqid . ' .blog-grid .author{';
	$_style_block .= $author_css;
	$_style_block .= '}';
}
if ( $date_css ) {
	$_style_block .= '#' . $recent_posts_uniqid . ' .blog-grid .date{';
	$_style_block .= $date_css;
	$_style_block .= '}';
}
if ( $category_css ) {
	$_style_block .= '#' . $recent_posts_uniqid . ' .blog-grid .category-holder a.category{';
	$_style_block .= $category_css;
	$_style_block .= '}';
}
if ( $excerpt_css ) {
	$_style_block .= '#' . $recent_posts_uniqid . ' .blog-grid-content p{';
	$_style_block .= $excerpt_css;
	$_style_block .= '}';
}
if ( $read_more_css ) {
	$_style_block .= '#' . $recent_posts_uniqid . ' .blog-grid-content .btn-link{';
	$_style_block .= $read_more_css;
	$_style_block .= '}';
}
if ( $reading_time_css ) {
	$_style_block .= '#' . $recent_posts_uniqid . ' .blog-grid-content .post-meta-estimate{';
	$_style_block .= $reading_time_css;
	$_style_block .= '}';
}

if ( $use_pagination ) {
	if ( $pagination_css ) {
		switch ( $pagination_type ) {
			case 'simple':
				$_style_block .= '#' . $recent_posts_uniqid . ' .pagination a {';
				$_style_block .= $pagination_css;
				$_style_block .= '}';
				break;
			case 'lazy_scroll':
			case 'lazy_button':
				$_style_block .= '#' . $recent_posts_uniqid . ' .lazy-load {';
				$_style_block .= $pagination_css;
				$_style_block .= '}';
				break;
		}
	}
	if ( $pagination_hover_css ) {
		switch ( $pagination_type ) {
			case 'simple':
				$_style_block .= '#' . $recent_posts_uniqid . ' .pagination a:hover,';
				$_style_block .= '#' . $recent_posts_uniqid . ' .pagination a.active {';
				$_style_block .= $pagination_hover_css;
				$_style_block .= '}';
				break;
			case 'lazy_scroll':
			case 'lazy_button':
				$_style_block .= '#' . $recent_posts_uniqid . ' .lazy-load:hover {';
				$_style_block .= $pagination_hover_css;
				$_style_block .= '}';
				break;
		}
	}
}

OhioLayout::append_to_shortcodes_css_buffer( $_style_block );