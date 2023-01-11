<?php

/**
* WPBakery Page Builder Ohio Testimonial shortcode custom style
*/

$_style_block = '';

if ( $quote_css ) {
	$_style_block .= '#' . $testimonial_uniqid . ' blockquote{';
	$_style_block .= $quote_css;
	$_style_block .= '}';
}
if ( $headline_css ) {
	$_style_block .= '#' . $testimonial_uniqid . ' .testimonial-headline{';
	$_style_block .= $headline_css;
	$_style_block .= '}';
}
if ( $image_css ) {
	$_style_block .= '#' . $testimonial_uniqid . ' .avatar{';
	$_style_block .= $image_css;
	$_style_block .= '}';
}
if ( $author_css ) {
	$_style_block .= '#' . $testimonial_uniqid . ' h6.author-name{';
	$_style_block .= $author_css;
	$_style_block .= '}';
}
if ( $position_css ) {
	$_style_block .= '#' . $testimonial_uniqid . ' .author-details{';
	$_style_block .= $position_css;
	$_style_block .= '}';
}

OhioLayout::append_to_shortcodes_css_buffer( $_style_block );