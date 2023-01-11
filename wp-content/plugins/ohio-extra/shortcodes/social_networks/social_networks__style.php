<?php

$_style_block = '';

if ( $color_css ) {
	$_style_block .= '#' . $social_bar_uniqid . '.socialbar a{';
	$_style_block .= $color_css;
	$_style_block .= '}';
}
if ( $icon_color_css ) {
	$_style_block .= '#' . $social_bar_uniqid . '.socialbar a i ,';
	$_style_block .= '#' . $social_bar_uniqid . '.socialbar a .social-text  {';
	$_style_block .= $icon_color_css;
	$_style_block .= '}';
}
if ( $color_css_before ) {
	$_style_block .= '#' . $social_bar_uniqid . '.socialbar a:before{';
	$_style_block .= $color_css_before;
	$_style_block .= '}';
}
if ( $color_css_hover ) {
	$_style_block .= '#' . $social_bar_uniqid . '.socialbar a:hover{';
	$_style_block .= $color_css_hover;
	$_style_block .= '}';
}
if ( $icon_hover_color_css ) {
	$_style_block .= '#' . $social_bar_uniqid . '.socialbar a:hover i{';
	$_style_block .= $icon_hover_color_css;
	$_style_block .= '}';
}

OhioLayout::append_to_shortcodes_css_buffer( $_style_block );