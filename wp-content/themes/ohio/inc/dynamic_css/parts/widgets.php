<?php

$widgets_heading_typo = OhioOptions::get_global( 'widgets_heading_typo' );
$widgets_content_typo = OhioOptions::get_global( 'widgets_content_typo' );

$widgets_heading_css = OhioHelper::parse_acf_typo_to_css( $widgets_heading_typo );
$widgets_content_css = OhioHelper::parse_acf_typo_to_css( $widgets_content_typo );

if ( $widgets_heading_css ) {
	$_selector = 'h3.widget-title';
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $widgets_heading_css );
}

if ( $widgets_content_css ) {
	$_selector = [
		'.widget',
		'.widget a',
		'.widget input',
		'.widget select',
		'.widget_recent_entries ul a',
		'.widget_recent_comments ul span',
		'.widget_recent_comments ul a'
	];
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $widgets_content_css );
}