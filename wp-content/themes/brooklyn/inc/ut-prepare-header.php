<?php

if( !function_exists('ut_return_header_config') ) {

    function ut_return_header_config( $option = '' , $fallback = '' , $single = true ) {
        
        /* no option has been set - leave here */
        if( empty( $option ) ) {
            return;
        }
        
        $option = trim( $option );
        
        // Old One Page Mode
        if( is_front_page() && ot_get_option( 'ut_site_layout', 'multisite' ) == 'onepage' ) {
            
            if( ot_get_option('ut_front_navigation_config', 'on' ) != 'off' ) {
                
                return ot_get_option( $option, $fallback );    
                
            }
            
            $glob_key = $option;
            $option = str_replace('ut_', 'ut_front_', $option );
            
            return ot_get_option( $option, ot_get_option( $glob_key ) );
        
        // Old One Page Mode
        } elseif( is_home() && ot_get_option( 'ut_site_layout', 'multisite' ) == 'onepage' ) {
            
            
            if( ot_get_option('ut_blog_navigation_config', 'on' ) != 'off' ) {
                
                return ot_get_option( $option, $fallback );    
                
            }
            
            $glob_key = $option;
            $option = str_replace('ut_', 'ut_blog_', $option );
            
            return ot_get_option( $option, ot_get_option( $glob_key ) );            
            
            
        // single post use theme options    
        } elseif( is_singular('post') ) {
            
            return ot_get_option( $option, $fallback );    
        
        } elseif( is_page() || is_singular('portfolio') || ot_get_option( 'ut_site_layout', 'multisite' ) == 'multisite' ) {
            
            $current = get_queried_object();          
            $post_ID = isset( $current->ID ) ? $current->ID : false;
            
            // woocommerce page ID
            if( ut_is_shop() && get_option( 'woocommerce_shop_page_id' ) ) {
                $post_ID = get_option( 'woocommerce_shop_page_id' );			
            }
            
            if( $post_ID ) {
                
                // check if we use globals or not
                if( get_post_meta( $post_ID, 'ut_navigation_config', true ) == 'on' || !get_post_meta( $post_ID, 'ut_navigation_config', true ) ) {
                           
                    return ot_get_option( $option, $fallback );
                
                }
                	
                // global overwrite is active return post meta
                if( get_post_meta( $post_ID, $option . '_global_overwrite', true ) ) {

                    return get_post_meta( $post_ID, $option, true  ); 

                // global overwrite deactivated but custom value is still available    
                } else if( !get_post_meta( $post_ID, $option . '_global_overwrite', true ) && get_post_meta( $post_ID, $option, true  ) ) {

                    return get_post_meta( $post_ID, $option, true  ); 

                // return fallback   
                } else {

                    return ot_get_option( $option, $fallback );

                }					
				            
            }
            
            return ot_get_option( $option, $fallback );
            
        } else {
            
            return ot_get_option( $option, $fallback );
        
        }
        
    }
    
}
