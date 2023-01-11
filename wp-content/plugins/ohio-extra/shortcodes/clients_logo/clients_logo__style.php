<?php

/**
* WPBakery Page Builder Ohio Clients logo shortcode custom style
*/

$_style_block = '';

if ( $overlay_settings ) {
	$_style_block .= '#' . $clients_logo_uniqid . ' .client-logo-details, ';
	$_style_block .= '#' . $clients_logo_uniqid . ' .logo-overlay-color:hover{';
		if ( $overlay_settings ) {
			$_style_block .= $overlay_settings;
		}
	$_style_block .= '}';
}

if ( $alignment_settings ) {
	$_style_block .= '#' . $clients_logo_uniqid . ' .client-logo-inner{';
		if ( $alignment_settings ) {
			$_style_block .= $alignment_settings;
		}
	$_style_block .= '}';
}

if ( $description_css ) {
	$_style_block .= '#' . $clients_logo_uniqid . ' .client-logo-details{';
	$_style_block .= $description_css;
	$_style_block .= '}';
}

OhioLayout::append_to_shortcodes_css_buffer( $_style_block );
