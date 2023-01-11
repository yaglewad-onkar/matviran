<?php
$global_css = OhioOptions::get_global( 'page_custom_css', '' );
OhioBuffer::append_to_dynamic_css_buffer( $global_css );

$global_large_css = OhioOptions::get_global( 'page_custom_large_css', '' );
OhioBuffer::append_to_dynamic_css_buffer( $global_large_css, 'desktop' );

$global_medium_css = OhioOptions::get_global( 'page_custom_medium_css', '' );
OhioBuffer::append_to_dynamic_css_buffer( $global_medium_css, 'tablet' );

$global_small_css = OhioOptions::get_global( 'page_custom_small_css', '' );
OhioBuffer::append_to_dynamic_css_buffer( $global_small_css, 'mobile' );

foreach ( array_reverse( OhioOptions::get_types_by_page() ) as $type ) {
    $_css = OhioOptions::get_by_type( 'page_custom_css', $type, '' );
    OhioBuffer::append_to_dynamic_css_buffer( $_css );
}

$page_css = OhioOptions::get( 'page_custom_css', '' );
OhioBuffer::append_to_dynamic_css_buffer( $page_css );