<?php

if( !function_exists('vc_set_as_theme') ) {
    return;
}

include( THEME_DOCUMENT_ROOT . '/vc/vc-params.php' );
include( THEME_DOCUMENT_ROOT . '/vc/vc-filters.php' );

/* use as part of theme */
vc_set_as_theme(); 

/* disable frontend */
// vc_disable_frontend(); 

/**
 * Disabled VC Elements
 *
 * @since     4.0.2
 * @version   1.0.1
 *
 */

if ( ! function_exists( '_ut_vc_elements_disable' ) ) :
    
    function _ut_vc_elements_disable() {
        
        return apply_filters( 'ut_vc_elements_disable', array(
            'vc_wp_calendar',
            'vc_wp_search',
            'vc_wp_meta',
            'vc_wp_recentcomments',
            'vc_wp_pages',
            'vc_wp_tagcloud',
            'vc_wp_custommenu',
            'vc_wp_text',
            'vc_wp_posts',
            'vc_wp_categories',
            'vc_wp_archives',
            'vc_wp_rss',
            'vc_widget_sidebar',
            'vc_button',
            'vc_button2',
            'vc_accordion',
            'vc_accordion_tab',
            'vc_tabs',
            'vc_tab',
            'vc_tour',
            'vc_cta',
            'vc_cta_button',
            'vc_cta_button2',
            'vc_pie',
            'vc_line_chart',
            'vc_progress_bar',
            'vc_round_chart',
            'vc_masonry_grid',
            'vc_masonry_media_grid',
            //'vc_media_grid',
            'vc_basic_grid',
            'vc_tta_pageable',
            'vc_tta_section',
            'vc_tta_accordion',
            'vc_tta_tabs',
            'vc_tta_tour',
            'vc_toggle',
            'rev_slider_vc',
            'vc_facebook',
            'vc_googleplus'
            //'contact-form-7', // replaced by own module            
        ) );
            
    }

endif;

/* disable elements */
foreach( _ut_vc_elements_disable() as $element ) {
    
    /* remove elements */
    vc_remove_element( $element );
    
}


/**
 * Remove most of VC Elements
 *
 * @return    array
 *
 * @access    private
 * @since     4.0.0
 */
 
$deprecated = array (
    'deprecated' => true
);

vc_map_update( 'vc_posts_slider', $deprecated );
vc_map_update( 'vc_media_grid', $deprecated );
vc_map_update( 'vc_images_carousel', $deprecated );
vc_map_update( 'vc_gallery', $deprecated );
vc_map_update( 'vc_video', $deprecated );
vc_map_update( 'vc_btn', $deprecated );
vc_map_update( 'vc_text_separator', $deprecated );
vc_map_update( 'vc_single_image', $deprecated );
vc_map_update( 'vc_tweetmeme', $deprecated );
vc_map_update( 'vc_pinterest', $deprecated );
vc_map_update( 'vc_flickr', $deprecated );
vc_map_update( 'vc_custom_heading', $deprecated );
vc_map_update( 'vc_posts_slider', $deprecated );
vc_map_update( 'vc_images_carousel', $deprecated );
vc_map_update( 'vc_gallery', $deprecated );
vc_map_update( 'vc_gutenberg', $deprecated );

// vc_map_update( 'vc_hoverbox', $deprecated );
// vc_map_update( 'contact-form-7', $deprecated );
// vc_map_update( 'vc_googleplus', $deprecated );
// vc_map_update( 'vc_facebook', $deprecated );
// vc_map_update( 'vc_separator', $deprecated );
// vc_map_update( 'vc_icon', $deprecated ); @todo own modul

/**
 * Support Post Types
 *
 * @since     4.0.2
 * @version   1.0.0
 *
 */

if ( ! function_exists( '_ut_vc_post_types_support' ) ) :
    
    function _ut_vc_post_types_support() {
        
        return apply_filters( 'ut_vc_post_types_support', array(
            'post',
            'page',
            'portfolio',
			'product',
            'ut-content-block'
        ) );
        
    }
    
    vc_set_default_editor_post_types( _ut_vc_post_types_support() );
    
endif; 


/**
 * Array Search Helper
 *
 * @since     4.2
 * @version   1.0.0
 *
 */

function ut_search_array_key($keyword, $arrayToSearch){
    
    foreach( $arrayToSearch as $key => $arrayItem ){
    
        if( stristr( $arrayItem, $keyword ) ){
            return $key;
        }
        
    }
    
}