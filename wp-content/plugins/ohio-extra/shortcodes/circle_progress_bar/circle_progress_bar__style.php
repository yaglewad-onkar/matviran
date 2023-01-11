<?php

/**
* Visual Composer Ohio Circle Progress Bar shortcode custom style
*/

$_style_block = '';

if ( $title_settings ) {
	$_style_block .= '#' . $chart_box_uniqid . '  h6.title{';
	$_style_block .= $title_settings;
	$_style_block .= '}';
}
if ( $chart_content_settings ) {
	$_style_block .= '#' . $chart_box_uniqid . ' .pie-content{';
	$_style_block .= $chart_content_settings;
	$_style_block .= '}';
}
if ( $percent_css ) {
	$_style_block .= '#' . $chart_box_uniqid . ' .percent-wrap{';
	$_style_block .= $percent_css;
	$_style_block .= '}';
}

if ( $chart_color_css ) {
	$_style_block .= '#' . $chart_box_uniqid . ' .progress .progress__value{';
	$_style_block .= $chart_color_css;
	$_style_block .= '}';
}

if ( vc_mode() == 'page_editable' ) {
	echo '<style>' . $_style_block . '</style>';
	echo '<script> document.addEventListener(\'DOMContentLoaded\', function(){ 
		if (window.ohioRefreshFrontEnd) {
			window.ohioRefreshFrontEnd();
		}
	} ); </script>';
} else {
	OhioLayout::append_to_shortcodes_css_buffer( $_style_block );
}