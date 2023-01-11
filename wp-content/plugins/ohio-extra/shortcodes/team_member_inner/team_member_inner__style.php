<?php

/**
* WPBakery Page Builder Ohio Team Members Group Inner shortcode custom style
*/

$_style_block = '';

if ( $overlay_settings ) {
	$_style_block .= '#' . $team_member_uniqid . '.cover-content{';
	$_style_block .= $overlay_settings;
	$_style_block .= '}';
}
if ( $name_settings ) {
	$_style_block .= '#' . $team_member_uniqid . ' h5{';
	$_style_block .= $name_settings;
	$_style_block .= '}';
}
if ( $position_settings ) {
	$_style_block .= '#' . $team_member_uniqid . ' .team-member_subtitle{';
	$_style_block .= $position_settings;
	$_style_block .= '}';
}
if ( $description_settings ) {
	$_style_block .= '#' . $team_member_uniqid . ' .team-member_description{';
	$_style_block .= $description_settings;
	$_style_block .= '}';
}
if ( $social_settings ) {
	$_style_block .= '#' . $team_member_uniqid . ' .socialbar a{';
	$_style_block .= $social_settings;
	$_style_block .= '}';
}
if ( $social_icon_settings ) {
	$_style_block .= '#' . $team_member_uniqid . ' .socialbar a span{';
	$_style_block .= $social_icon_settings;
	$_style_block .= '}';
}
if ( $social_hover_settings ) {
	$_style_block .= '#' . $team_member_uniqid . ' .socialbar a:hover{';
	$_style_block .= $social_hover_settings;
	$_style_block .= '}';
}
if ( $social_hover_settings ) {
	$_style_block .= '#' . $team_member_uniqid . ' .socialbar a:hover span{';
	$_style_block .= $social_hover_settings;
	$_style_block .= '}';
}

OhioLayout::append_to_shortcodes_css_buffer( $_style_block );