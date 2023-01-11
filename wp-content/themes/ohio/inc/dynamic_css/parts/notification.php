<?php
/*
	Notification bar custom style
*/

if ( !OhioOptions::get_global( 'notification_bar', false ) ) return; // exif if not visible

$notification_color = OhioOptions::get_global( 'subscribe_popup_color' );
$notification_bg = OhioOptions::get_global( 'subscribe_popup_background' );

$content_color = '';
if ( $notification_color ) {
	$content_color = 'color:' . $notification_color . ';';
}

$content_bg_color = '';
if ( $notification_bg ) {
	$content_bg_color = 'background-color:' . $notification_bg . ';';
}

$content_typo_css = '';
$content_typo = OhioOptions::get_global( 'notification_details_typo' );
if ( $content_typo ) {
	$content_typo_css = OhioHelper::parse_acf_typo_to_css( $content_typo );
}

if ( $content_color || $content_typo_css ) {
	$_selector = '.notification-bar .notification-text, .notification-bar .clb-close';
	$_css = $content_color . $content_typo_css;
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

if ( $content_bg_color ) {
	$_selector = '.notification-bar';
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $content_bg_color );
}