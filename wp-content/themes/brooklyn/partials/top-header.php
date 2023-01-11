<?php

/**
 * Top Header for Side Navigation
 *
 * @version   4.9.0
 */

if( ut_return_header_config( 'ut_header_layout', 'default' ) == 'side' ) {
    
    // initialize header class
    $header = new UT_Header_Class();
    
    // execute top header
    $header->create_top_header();
    
}