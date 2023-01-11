<?php if (!defined('ABSPATH')) {
    exit; // exit if accessed directly
}

/**
 * Hero State
 */

if ( ! function_exists( 'ut_hero_state' ) ) :

    function ut_hero_state() {
        
        // one page front page and blog always do have a hero
        if( is_front_page() && ot_get_option( 'ut_site_layout', 'multisite' ) == 'onepage' || is_home() && ot_get_option( 'ut_site_layout', 'multisite' ) == 'onepage' ) {
            return true;            
        }
        
		// check if current page has an active hero
        if( ut_is_shop() && get_post_meta( get_option( 'woocommerce_shop_page_id' ), 'ut_activate_page_hero' , true ) == 'on' ) {
            return true;			
        }
		
        // system pages with hero support
        if( ( is_search() || is_404() || is_archive() ) && !ut_is_shop() ) {
            return true;
        }
        
        // hero support for single posts
        if( is_singular( 'post' ) ) {
            
            if( ut_collect_option( 'ut_post_hero', 'off', 'ut_' ) == 'on' && ( has_post_thumbnail( get_the_ID() ) || 'video' == get_post_format() ) ) {
                
                return true;
                
            } else {
                
                return false;
                
            }
            
        }
        
        // check if current page has an active hero
        $current = get_queried_object();
		
        if( isset( $current->ID ) && get_post_meta( $current->ID , 'ut_activate_page_hero' , true ) == 'on' ) {
            
            return true;
			
        }
		
        return false;
    
    }
    
    add_filter( 'ut_show_hero', 'ut_hero_state' );
    
endif;



/**
 * Change Blog Layout by URL
 */

if ( ! function_exists( 'change_blog_layout_by_url' ) ) :

    function change_blog_layout_by_url( $layout ) {
        
        global $ajax_blog_layout;
        
        $layouts = array(
            'classic',
            'mixed-grid',
            'grid',
            'list-grid',
            'list-grid-first-full'
        );        
        
        if( isset( $_GET['home_layout'] ) && in_array( $_GET['home_layout'], $layouts ) ) {            
            
            $layout = $_GET['home_layout'];
            
        }
        
        if( isset( $ajax_blog_layout ) && in_array( $ajax_blog_layout, $layouts ) ) {
            
            $layout = $ajax_blog_layout;
            
        }

        return $layout;
    
    }
    
    add_filter( 'unite_blog_layout', 'change_blog_layout_by_url', 90 );
    
endif;



/**
 * Change Blog Layout for Mobile
 */

if ( ! function_exists( 'change_blog_layout_by_device' ) ) :

    function change_blog_layout_by_device( $layout ) {
        
        if( unite_mobile_detection()->isMobile() ) {
            return 'grid';    
        }

        return $layout;
    
    }
    
    add_filter( 'unite_blog_layout', 'change_blog_layout_by_device', 91 );
    
endif;




/**
 * Activate Hero by URL
 */

if ( ! function_exists( 'change_hero_by_url' ) ) :

    function change_hero_by_url( $status ) {
        
        if( isset( $_GET['hero'] ) && $_GET['hero'] == 'on' ) {
            return true;
        }
        
        if( isset( $_GET['hero'] ) && $_GET['hero'] == 'off' ) {
            return false;
        }

        return $status;
    
    }
    
    add_filter( 'ut_show_hero', 'change_hero_by_url', 90 );
    
endif;



/**
 * Activate / Deactive Sidebar by URL
 */

if ( ! function_exists( 'change_sidebar_by_url' ) ) :

    function change_sidebar_by_url( $status ) {
        
        if( isset( $_GET['sidebar'] ) && $_GET['sidebar'] == 'off' ) {
            return false;
        }

        return $status;
    
    }
    
    add_filter( 'ut_show_sidebar', 'change_sidebar_by_url', 90 );
    
endif;


/**
 * Activate / Deactive Sidebar by URL
 */

if ( ! function_exists( 'change_sidebar_by_url' ) ) :

    function change_sidebar_by_url( $status ) {
        
        if( isset( $_GET['sidebar'] ) && $_GET['sidebar'] == 'off' ) {
            return false;
        }

        return $status;
    
    }
    
    add_filter( 'ut_show_sidebar', 'change_sidebar_by_url', 90 );
    
endif;



/**
 * Excerpt Length List Grid without Sidebar
 */

if ( ! function_exists( 'change_excerpt_list_grid_by_url' ) ) :

    function change_excerpt_list_grid_by_url( $length ) {
        
        if( isset( $_GET['sidebar'] ) && $_GET['sidebar'] == 'off' && isset( $_GET['home_layout'] ) && $_GET['home_layout'] == 'list-grid' ) {
            return 70;
        }

        return $length;
    
    }
    
    add_filter( 'ut_blog_list_excerpt_length', 'change_excerpt_list_grid_by_url', 90 );
    
endif;


/**
 * Page Title Separator
 *
 * @access    public 
 * @since     4.2.0
 * @version   1.0.0
 */ 

if( !function_exists('ut_page_title_separator') ) :

    function ut_page_title_separator( $sep ) {
    
        $sep = "|";
    
        return $sep;
    
    }
    
    add_filter( 'document_title_separator', 'ut_page_title_separator' );

endif;


/**
 * Extra Classs For Body
 *
 * @access    public 
 * @since     1.0.0
 * @version   1.0.0
 */ 
 
if ( ! function_exists( 'ut_body_classes' ) ) :

    function ut_body_classes( $classes ) {
        
        global $post;
        
		// visual composer check for spacing system
        if( !ut_is_blog_related() && !ut_is_shop() && isset( $post->post_content ) && ( preg_match( '/vc_section/', $post->post_content ) || preg_match( '/vc_row/', $post->post_content ) || preg_match( '/ut_content_block/', $post->post_content ) ) ) {
            
			$classes[] = 'ut-vc-enabled';            
            
        } else {
            
            $classes[] = 'ut-vc-disabled';
            
        }        
        
		// used spacing system
		$classes[] = 'ut-spacing-' . ot_get_option( 'ut_section_spacing_system', '120' );
		
		// check if page system has content
        if( $post && empty( $post->post_content ) ) {
            $classes[] = 'ut-page-has-no-content';            
        }

        if( unite_mobile_detection()->isMobile() ) {

            $classes[] = 'ut-is-mobile-device';

        } else {

            $classes[] = 'no-touchevents';

        }

        if( ut_is_blog_related() ) {
            $classes = array_diff( $classes, array('ut-page-has-no-content') );             
        }
        
        if( !ut_search_result_status() ) {
            $classes[] = 'ut-page-has-no-content';
        }
        
        if( is_category() ) {
            
            $category = get_category( get_query_var( 'cat' ) );
            
            if( !isset( $category->count ) || isset( $category->count ) && $category->count == 0 ) {
                
                $classes[] = 'ut-page-has-no-content';
                
            }
            
        }

        if( in_array( 'ut-page-has-no-content', $classes ) && is_singular('product') || in_array( 'ut-page-has-no-content', $classes ) && ut_is_shop() ) {

            $classes = array_diff( $classes, array('ut-page-has-no-content') );

        }
        
        if( in_array( 'ut-page-has-no-content', $classes ) && ut_return_csection_config('ut_activate_csection', 'on') == 'on' ) {
            
            $classes[] = 'ut-page-has-no-content-with-contact-section';
            $classes = array_diff( $classes, array('ut-page-has-no-content') );
            
        }
                
        // hero height classes for single pages
        if( is_single() && !is_singular( 'portfolio' ) && !is_singular( 'product' ) && apply_filters( 'ut_show_hero', false ) && ut_collect_option('ut_post_hero_height', '50', 'ut_') <= 49 ) {
        
            $classes[] = 'ut-hero-height-50';
            
        } elseif( is_single() && !is_singular( 'portfolio' ) && !is_singular( 'product' ) && apply_filters( 'ut_show_hero', false ) && ut_collect_option('ut_post_hero_height', '50', 'ut_') >= 50 ) {
            
            $classes[] = 'ut-hero-height-100';
            
        }
        
        // hero height classes for archive pages
        if( is_archive() && !ut_is_shop() && ot_get_option('ut_archive_hero_height') <= 49 ) {
        
            $classes[] = 'ut-hero-height-50';
            
        } elseif( is_archive() && !ut_is_shop() && ot_get_option('ut_archive_hero_height') >= 50 ) {
            
            $classes[] = 'ut-hero-height-100';
            
        }
       
        // hero for all other pages
        if( apply_filters( 'ut_show_hero', false ) && ut_return_hero_config('ut_hero_type', 'image') == 'image' && ut_return_hero_config( 'ut_hero_dynamic_content_height', '50' ) <= 49 ) {
            
            $classes[] = 'ut-hero-height-50';
            
        } elseif( apply_filters( 'ut_show_hero', false ) && ut_return_hero_config('ut_hero_type', 'image') == 'image' && ut_return_hero_config( 'ut_hero_dynamic_content_height', '50' ) >= 50 ) {
            
            $classes[] = 'ut-hero-height-100';
            
        }
        
        // extra class if header is not visible on hero
        if( ut_return_header_config( 'ut_navigation_skin' , 'ut-header-light' ) != 'ut-header-custom' && ut_return_header_config( 'ut_navigation_state' , 'off' ) == 'off' || ut_return_header_config( 'ut_navigation_skin' , 'ut-header-light' ) == 'ut-header-custom' && ut_return_header_config( 'ut_navigation_customskin_state', 'off' ) == 'off' ) {
            
            if( apply_filters( 'ut_show_hero', false ) ) {
                $classes[] = 'ut-hero-header-off';            
            }
            
        }
        
        // site border
        if( apply_filters( 'ut_show_siteframe', 'hide' ) == 'show' ) {
            $classes[] = 'ut-site-border';
        }
                
        if( ut_page_option('ut_top_header', 'hide') == 'show' ) {
            $classes[] = 'ut-has-top-header';
        }
        
        if( !ut_is_blog_related() && ut_page_option( 'ut_display_section_header', 'show', 'ut_' ) == 'show' ) {
            
            $classes[] = 'ut-has-page-title';
            
            // remove no content 
            $classes = array_diff( $classes, array('ut-page-has-no-content') );
            $classes = array_diff( $classes, array('ut-page-has-no-content-with-contact-section') );
            
        }
                
        if( is_singular('post') && ut_collect_option('ut_post_title', 'on', 'ut_') == 'on' ) {
            
            $classes[] = 'ut-has-page-title';
            
            $classes = array_diff( $classes, array('ut-page-has-no-content') );
            $classes = array_diff( $classes, array('ut-page-has-no-content-with-contact-section') );
            
        }
                
        // scroll top
        if( ut_return_csection_config('ut_show_scroll_up_button', 'on') == 'on' && ut_return_csection_config('ut_activate_csection' , 'on') == 'on' ) {
            $classes[] = 'ut-has-scroll-top';
        }        
                
        if( is_home() && ot_get_option( 'ut_animate_blog_articles', 'off' ) == 'on' ) {
            $classes[] = 'ut-blog-has-animation';
        }
        
        if( apply_filters( 'ut_show_hero', false ) ) {
            $classes[] = 'has-hero';
        } else {
            $classes[] = 'has-no-hero';
        }
        
		if( apply_filters( 'ut_show_hero', false ) && ut_return_hero_config( 'ut_hero_fancy_border' ) == 'on' ) {
			$classes[] = 'ut-hero-has-fancy-border';
		}
				
        if( ut_return_header_config( 'ut_header_layout', 'default' ) == 'side' ) {
            $classes[] = 'ut-has-bklyn-sidenav';
        }
        
        if( apply_filters( 'ut_maintenance_mode_active', false ) ) {
            $classes[] = 'ut-bklyn-maintenance';
        } 
        
        if( ot_get_option( 'ut_site_layout', 'multisite' ) == 'onepage' ) {
            $classes[] = 'ut-bklyn-onepage';        
        } else {
            $classes[] = 'ut-bklyn-multisite';    
        }
        
		if( apply_filters( 'ut_show_hero', false ) && ut_return_header_config('ut_navigation_scroll_position' , 'floating') == 'fixed' && ut_return_header_config( 'ut_navigation_on_hero', 'off' ) == 'on' ) {
			$classes[] = 'ut-header-display-on-hero';
		}
        
        if( apply_filters( 'ut_show_hero', false ) && ut_return_header_config('ut_navigation_scroll_position' , 'floating') == 'floating' && ut_return_header_config( 'ut_navigation_on_hero', 'off' ) == 'on' ) {
			$classes[] = 'ut-header-display-on-hero';
		}
		
		// header is hidden by default ( default skins )
		if( apply_filters( 'ut_show_hero', false ) && ut_return_header_config('ut_navigation_scroll_position' , 'floating') == 'floating' && ut_return_header_config( 'ut_navigation_skin' , 'ut-header-light' ) != 'ut-header-custom' && ut_return_header_config('ut_navigation_state' , 'off') == 'off' ) {
			$classes[] = 'ut-header-hide-on-hero';	
		}
		
		// header is hidden by default ( custom skins )
		if( apply_filters( 'ut_show_hero', false ) && ut_return_header_config('ut_navigation_scroll_position' , 'floating') == 'floating' && ut_return_header_config( 'ut_navigation_skin' , 'ut-header-light' ) == 'ut-header-custom' && ut_return_header_config('ut_navigation_customskin_state' , 'off') == 'off' ) {
			$classes[] = 'ut-header-hide-on-hero';	
		}
		
		// header is transparent by default ( floating ) ( default skins )
		if( apply_filters( 'ut_show_hero', false ) && ut_return_header_config('ut_navigation_scroll_position' , 'floating') == 'floating' && ut_return_header_config( 'ut_navigation_skin' , 'ut-header-light' ) != 'ut-header-custom' && ut_return_header_config('ut_navigation_state' , 'off') == 'on_transparent' ) {
			$classes[] = 'ut-header-transparent-on-hero';
		}
		
        // header is transparent by default ( fixed ) ( default skins )
		if( apply_filters( 'ut_show_hero', false ) && ut_return_header_config('ut_navigation_scroll_position' , 'floating') == 'fixed' && ut_return_header_config( 'ut_navigation_skin' , 'ut-header-light' ) != 'ut-header-custom' && ut_return_header_config('ut_navigation_state' , 'off') == 'on_transparent' ) {
			$classes[] = 'ut-header-display-on-hero';
		}
        
		// header is transparent by default ( custom skins )
		if( apply_filters( 'ut_show_hero', false ) && ut_return_header_config('ut_navigation_scroll_position' , 'floating') == 'floating' && ut_return_header_config( 'ut_navigation_skin' , 'ut-header-light' ) == 'ut-header-custom' && ut_return_header_config('ut_navigation_customskin_state' , 'off') == 'off' ) {
			$classes[] = 'ut-header-hide-on-hero';	
		}

		if( ot_get_option( 'ut_custom_cursor', 'off' ) == 'on' && ot_get_option( 'ut_deactivate_browser_cursor', 'off' ) == 'on' && !apply_filters( 'ut_maintenance_mode_active', false ) ) {
			$classes[] = 'ut-deactivate-browser-cursor';
        }

		if( isset( $_GET['vc_editable'] ) ) {
			$classes = array_diff( $classes, array( 'ut-deactivate-browser-cursor' ) );
        }

		// preloader active
	    if( ot_get_option('ut_use_image_loader') == 'on' && ut_dynamic_conditional('ut_use_image_loader_on') ) {
		    $classes[] = 'ut-bklyn-site-with-preloader';
        }

        // no brooklyn class on body due to rs library conflict
        $classes = array_diff( $classes, array( sanitize_title( wp_get_theme() ) ) );
	    $classes = array_diff( $classes, array( 'brooklyn' ) );

        return $classes;        
        
    }
    
    add_filter( 'body_class', 'ut_body_classes', 80 );
    
endif;



/**
 *  Site Frame
 *
 * @access    public 
 * @since     4.4.4
 * @version   1.0.0
 */


if ( ! function_exists( 'ut_site_frame_state' ) ) :

    function ut_site_frame_state() {
        
        // pages and portfolios can have individual settings
        if( isset( get_queried_object()->ID ) && ( is_page() || is_singular("portfolio") || is_home() ) )  {
            
            // check if we are using a global option
            $ut_site_border_global = get_post_meta( get_queried_object()->ID, 'ut_page_site_border', true );
            
            if( $ut_site_border_global == 'global' || !$ut_site_border_global ) {

                $ut_site_border = ot_get_option( 'ut_site_border', 'hide' );

            } else {

                $ut_site_border = get_post_meta( get_queried_object()->ID, 'ut_page_site_border', true );

            }
            
        } else {
            
            $ut_site_border = ot_get_option( 'ut_site_border', 'hide' );            
            
        }        
        
        return $ut_site_border;
        
    }

    add_filter( 'ut_show_siteframe', 'ut_site_frame_state' );

endif;


/**
 *  Site Frame Settings
 *
 * @access    public 
 * @since     4.9
 * @version   1.0.0
 */


if ( ! function_exists( 'ut_site_frame_settings' ) ) :

    function ut_site_frame_settings() {
        
        $ut_site_frame_settings = array(
            'border_size'   =>  '',
            'border_status' =>  ''
        );
        
        // add additonal offset if top site frame is active
        if( isset( get_queried_object()->ID ) && ( is_page() || is_singular("portfolio") || is_home() ) ) {

            // check if we are using a global option
            $ut_site_border_global = get_post_meta( get_queried_object()->ID, 'ut_page_site_border', true );

            if( $ut_site_border_global == 'global' || !$ut_site_border_global ) {

                $ut_site_frame_settings['border_size'] = ot_get_option( 'ut_site_border_size', 40 );
                $ut_site_frame_settings['border_status'] = ot_get_option( 'ut_site_border_status' );

            } else {

                $ut_site_frame_settings['border_size'] = get_post_meta( get_queried_object()->ID, 'ut_page_site_border_size', true );
                $ut_site_frame_settings['border_status'] = get_post_meta( get_queried_object()->ID, 'ut_page_site_border_status', true );
                
                // fallback
                if( empty( $ut_site_frame_settings['border_size'] ) ) {
                    $ut_site_frame_settings['border_size'] = 40;
                }
                

            }

        // all other pages are based on global settings    
        } else {

            $ut_site_frame_settings['border_size'] = ot_get_option( 'ut_site_border_size', 40 );
            $ut_site_frame_settings['border_status'] = ot_get_option( 'ut_site_border_status' );

        }  
        
        return $ut_site_frame_settings;
        
    }

    add_filter( 'ut_site_frame_settings', 'ut_site_frame_settings' );

endif;




/**
 * Extra Classs For Body
 *
 * @access    public 
 * @since     1.0.0
 * @version   1.0.0
 */ 
 
if ( ! function_exists( 'ut_body_site_frame_classes' ) ) :

    function ut_body_site_frame_classes( $classes ) {
                
        // pages and portfolios can have individual settings
        if( isset( get_queried_object()->ID ) && ( is_page() || is_singular("portfolio") | is_singular("product") || is_home() ) )  {
                        
            // check if we are using a global option
            $ut_site_border_global = get_post_meta( get_queried_object()->ID, 'ut_page_site_border', true );

            if( $ut_site_border_global == 'global' || !$ut_site_border_global ) {

                $ut_site_border_status = ot_get_option( 'ut_site_border_status' );

            } else {

                $ut_site_border_status = get_post_meta( get_queried_object()->ID, 'ut_page_site_border_status', true );

            }                        

        // all other pages are based on global settings    
        } else {

            $ut_site_border_status = ot_get_option( 'ut_site_border_status' );

        }
        
        if( apply_filters( 'ut_show_siteframe', 'hide' ) == 'show' && isset( $ut_site_border_status ) ) {
            
            foreach( $ut_site_border_status as $margin => $status ) {
                
                if( $status == 'on' ) {
                
                    $classes[] = 'ut-site-border-' . str_replace( 'margin-', '', $margin );
                    
                }
                
            }
            
        } 
        
        return $classes;
        
    }
    
    add_filter( 'body_class', 'ut_body_site_frame_classes' );

endif;


/**
 * Loader Overlay Markup
 *
 * @access    public 
 * @since     4.1.0
 * @version   1.0.1
 */ 
 
if ( ! function_exists( 'ut_loader_overlay' ) ) :

    function ut_loader_overlay( $classes ) {

        $overlay_classes = array();
        $q_overlay_classes = array();

        // Overlay with Morph
        $overlay_classes[] = ot_get_option('ut_morph_image_loader', 'off') == 'on' ? 'ut-loader-overlay-with-morph' : '';

        if( ot_get_option( 'ut_use_image_loader' ) == 'on' ) {
					
            if( ut_dynamic_conditional( 'ut_use_image_loader_on' ) ) { ?>
        
                <div class="ut-loader-overlay <?php echo implode( " ", $overlay_classes ); ?>">
					
					<?php if( ot_get_option('ut_morph_image_loader', 'off') == 'on' ) : ?>
					
						<div class="ut-shape-wrap-push">
						
					
						</div>
					
						<?php if( ot_get_option( 'ut_morph_image_loader_effect', 'ut-fluid-js' ) == 'ut-fluid-js' ) : ?>	

							<div class="ut-shape-wrap">

								<svg class="ut-shape" width="100%" height="100vh" preserveAspectRatio="none" viewBox="0 0 1440 800" xmlns:pathdata="http://unitedthemes.com/">

									<path d="M -44,-50 C -52.71,28.52 15.86,8.186 184,14.69 383.3,22.39 462.5,12.58 638,14 835.5,15.6 987,6.4 1194,13.86 1661,30.68 1652,-36.74 1582,-140.1 1512,-243.5 15.88,-589.5 -44,-50 Z" pathdata:id="M -44,-50 C -137.1,117.4 67.86,445.5 236,452 435.3,459.7 500.5,242.6 676,244 873.5,245.6 957,522.4 1154,594 1593,753.7 1793,226.3 1582,-126 1371,-478.3 219.8,-524.2 -44,-50 Z"></path>

								</svg>

							</div>

						<?php endif; ?>


						<?php if( ot_get_option( 'ut_morph_image_loader_effect', 'ut-fluid-js' ) == 'ut-ballon-js' ) : ?>

							<div class="ut-shape-wrap">

								<svg class="ut-shape" width="100%" height="100vh" preserveAspectRatio="none" viewBox="0 0 1440 800" xmlns:pathdata="http://unitedthemes.com/">

									<path d="M 73.3,178.6 C 101.7,363.8 76.38,735 118.7,813.8 161,892.7 327.3,946.7 381.1,853.3 434.9,759.9 427.2,488.9 436.8,341.5 443.3,241.3 447.3,33.05 516.1,36.19 574.9,38.88 611.6,214.9 622.3,429.7 633,644.6 614.7,796.1 688.1,849 761.6,901.8 860.7,873.7 897.6,850 982.3,795.5 951.2,639.3 961.1,506.1 970.9,372.9 958.5,43.53 1023,43.47 1063,43.43 1085,173.6 1095,370.7 1105,567.8 1082,804.3 1165,842.6 1197,857.5 1304,901 1342,833 1380,765 1354,413.7 1379,156.2 1407,-137.5 1719,-12.96 1719,-12.96 L -53.5,-44.66 C -53.5,-44.66 44.91,-6.65 73.3,178.6 Z" pathdata:id="M 105.3,190.6 C 159.7,353.8 143.2,774.2 149.1,779.5 155,784.8 159.4,782 164.8,778.2 170.2,774.4 168.9,242.8 240.3,125 311.7,7.205 430.7,2.307 564.2,13.56 707.9,25.67 806,166.3 800.5,376 804.7,587.3 801.2,773.9 807.1,782.7 813,791.4 816.8,792.7 821.4,786 826.4,778.8 819.4,566.3 820.3,498.1 821.2,429.9 781.4,95.51 992.5,74.58 1108,63.14 1235,166.4 1250,359.4 1265,552.4 1248,763.7 1271,781.4 1277,786 1281,786.2 1286,779.7 1292,773.2 1260,251.3 1355,103.9 1441,-30.35 1610,-117.6 1610,-117.6 L -110.1,-132.3 C -110.1,-132.3 50.91,27.35 105.3,190.6 Z"></path>

								</svg>

							</div>						

						<?php endif; ?>


						<?php if( ot_get_option( 'ut_morph_image_loader_effect', 'ut-fluid-js' ) == 'ut-digital-js' ) : ?>

							<div class="ut-shape-wrap">

								<svg class="ut-shape" width="100%" height="100vh" preserveAspectRatio="none" viewBox="0 0 1440 800" xmlns:pathdata="http://unitedthemes.com/">

									<path d="M -30.45,-43.86 -30.45,0 53.8,0 53.8,0 179.5,0 179.5,0 193.3,0 193.3,0 253.1,0 253.1,0 276.1,0 276.1,0 320.6,0 320.6,0 406.5,0 406.5,0 435.6,0 435.6,0 477,0 477,0 527.6,0 527.6,0 553.7,0 553.7,0 592,0 592,0 742.3,0 742.3,0 762.2,0 762.2,0 776,0 776,0 791.3,0 791.3,0 852.7,0 852.7,0 871.1,0 871.1,0 878.7,0 878.7,0 891,0 891,0 923.2,0 923.2,0 940.1,0 940.1,0 976.9,0 976.9,0 1031,0 1031,0 1041,0 1041,0 1176,0 1176,0 1192,0 1192,0 1210,0 1210,0 1225,0 1225,0 1236,0 1236,0 1248,0 1248,0 1273,0 1273,0 1291,0 1291,0 1316,0 1316,0 1337,0 1337,0 1356,0 1356,0 1414,0 1414,0 1432,0 1432,0 1486,0 1486,-43.86 Z" pathdata:id="M -30.45,-57.86 -30.45,442.6 53.8,443.8 53.8,396.3 179.5,396.3 179.5,654.7 193.3,654.7 193.3,589.1 253.1,589.1 253.1,561.6 276.1,561.6 276.1,531.2 320.6,531.2 320.6,238.6 406.5,238.6 406.5,213.9 435.6,213.9 435.6,246.2 477,246.2 477,289.9 527.6,289.9 527.6,263.3 553.7,263.3 553.7,280.4 592,280.4 592,189.2 742.3,189.2 742.3,259.5 762.2,259.5 762.2,103.7 776,103.7 776,77.11 791.3,77.11 791.3,18.21 852.7,18.21 852.7,86.61 871.1,86.61 871.1,231 878.7,240.5 878.7,320.3 891,320.3 891,434.3 923.2,434.3 923.2,145.5 940.1,145.5 940.1,117 976.9,117 976.9,139.8 1031,139.8 1031,284.2 1041,284.2 1041,242.4 1176,242.4 1176,282.3 1192,282.3 1192,641.4 1210,641.4 1210,692.7 1225,692.7 1225,599.6 1236,599.6 1236,527.4 1248,527.4 1248,500.8 1273,500.8 1273,523.6 1291,523.6 1291,652.8 1316,652.8 1316,533.1 1337,533.1 1337,502.7 1356,502.7 1356,523.6 1414,523.6 1414,491.3 1432,491.3 1432,523.6 1486,523.6 1486,-57.86 Z"></path>

								</svg>

							</div>

						<?php endif; ?>


						<?php if( ot_get_option( 'ut_morph_image_loader_effect', 'ut-fluid-js' ) == 'ut-water-js' ) : ?>

							<div class="ut-shape-wrap">

								<svg class="ut-shape" width="100%" height="100vh" preserveAspectRatio="none" viewBox="0 0 1440 800" xmlns:pathdata="http://unitedthemes.com/">

									<path d="M -65.11,-1.008 C -38.79,8.492 -48.8,43.89 -24.09,59.91 -17.38,64.25 -7.411,68.1 2.397,67.74 19.94,67.09 30.89,61.16 46.62,50.39 64.99,37.82 92.16,36.57 112.8,41.49 141.9,48.44 153.5,80.16 178.5,78.34 194.6,77.17 205.3,67.96 216.8,48.87 224.6,35.89 230.6,20.21 251.4,19.41 278.8,18.35 288.2,28.98 298.5,67.48 303.6,86.48 308.2,97.24 316.3,102.6 329.4,111.3 340.7,106 350.5,100.2 377.5,84.13 369.6,23.41 401.2,20.7 415.9,19.43 431.7,33.86 449.9,57.07 462.7,73.41 475.5,91.96 494.9,96.72 503.8,98.9 513,97.38 521.6,90.13 532.1,81.21 532.2,62.36 551.7,62.17 565.7,62.03 569.6,72.01 575.9,89 580.5,101.3 598.1,139.1 628.6,117.5 649.1,103 641.6,81.95 658,80.67 674.4,79.39 692.2,136.3 720.8,141.4 738.9,144.6 763.5,132 771.2,119.3 782.1,101.2 783.6,81.7 799.1,81.97 829.3,82.49 818.2,122.8 838.2,143.8 858.1,164.8 875.7,158.9 886.4,155.8 910.4,149 913.1,122.8 939.2,119.6 953.9,117.9 964.8,130.2 979.7,131.6 997.3,133.3 1016,132.6 1027,121 1038,109.3 1038,80.15 1054,79.92 1071,79.67 1073,89.94 1079,106.8 1084,119.5 1089,133.9 1101,141.1 1111,147.3 1124,146.3 1136,145 1150,143.4 1160,132.7 1177,130.8 1194,128.8 1219,128.2 1236,138.8 1257,151.6 1271,147.7 1280,137.3 1291,124.1 1294,92.34 1316,90.47 1344,88.04 1348,163.9 1380,183.1 1401,195.1 1428,196.6 1451,190.6 1478,183.7 1503,161.8 1518,143 1544,109.1 1550,43.89 1551,32.49 1568,-303.4 -510,-224.1 -65.11,-1.008 Z" pathdata:id="M -35.73,45.41 C -9.412,61.01 -30.93,379.4 -17.31,545.8 -12.26,607.5 -54.94,740.4 6.142,730.1 63.67,720.4 26.97,284.9 27.01,202.3 27.06,104.3 51.66,29.07 106,54.36 160.3,79.65 103.7,491.7 187.7,465.7 231.9,452 156.6,99.89 249.4,94.08 285.7,91.81 299.9,127.5 305,190.9 316,327.7 328.6,462.6 321.1,598.3 315.8,695.4 294.5,776.7 353.9,773.6 415.6,770.4 379.8,650.7 368.7,588.8 337.4,415 369.6,190.1 391.1,111 412.5,31.92 457,96.83 463.3,127.2 480.9,212.1 493.9,307.8 489,396.1 487.4,425.7 482.1,460.1 517.1,455.2 548.5,450.7 476.2,166 550.9,168.9 594.8,170.6 591.6,626.8 586.3,663.5 578.4,717.8 609.1,742.4 633.9,700.6 651.9,670.2 578.3,209.7 650.8,194.1 723.2,178.5 700.8,277.9 687.6,401.1 680.2,470 766.1,486.3 756,414.3 750.3,373.5 703.1,145.6 793.4,146.1 939.9,146.8 846.2,556.8 844,601.8 841.9,646.8 878.6,682.8 903.3,630.6 928,578.4 863.2,264.8 891.7,178.8 920.2,92.81 997.3,215.6 972,292.8 946.6,370 1030,353.1 999,295.7 985.9,271.6 977.1,119.1 1048,117.8 1119,116.5 1127,634.6 1123,682.6 1119,730.6 1110,749.8 1118,771.3 1134,815.5 1173,803.5 1164,734 1155,664.5 1139,665.8 1143,418.4 1148,170.9 1225,122 1240,215 1249,273 1202,413 1282,391.7 1324,380.7 1280,165.5 1316,159.6 1362,152 1296,358.2 1379,361.2 1462,364.2 1312,753 1444,751.2 1592,749.2 1484,458.5 1505,312.2 1518,221.3 1544,58.44 1545,39.57 1562,-514.4 -480.6,-322.6 -35.73,45.41 Z"></path>

								</svg>

							</div>								

						<?php endif; ?>						

						<a href="#" class="ut-close-query-loader hide-on-desktop hide-on-tablet hide-on-mobile"></a>

					<?php endif; ?>

				</div>
                
				<div id="qLoverlay" class="ut-qLoverlay <?php echo implode( " ", $q_overlay_classes ); ?>">
					
					<div class="ut-inner-overlay">

						<?php if( ot_get_option('ut_image_loader_style', 'style_one') == 'text_draw' ) : ?>

                            <?php

                            $font_settings = ut_get_preloader_font_settings();

                            $svg = new UT_Text_SVG('ut-overlay-svg');
                            $svg->setFontID( "qLoverlay-SVG-2" ) ;

                            if( !empty( $font_settings['font-family'] ) ) {
                                $svg->setFontFamily( $font_settings['font-family'] );
                            }

                            if( !empty( $font_settings['font-size'] ) ) {
                                $svg->setFontSize( $font_settings['font-size'] );
                            }

                            if( !empty( $font_settings['font-weight'] ) ) {
                                $svg->setFontWeight( $font_settings['font-weight'] );
                            }

                            if( !empty( $font_settings['text-transform'] ) ) {
                                $svg->setTextTransform( $font_settings['text-transform'] );
                            }

                            if( !empty( $font_settings['letter-spacing'] ) ) {
                                $svg->setLetterSpacing( $font_settings['letter-spacing'] );
                            }

                            // Stroke
                            $svg->setStroke(true);
                            $svg->setStrokeWidth(2);
                            $svg->setStrokeColor( ot_get_option( 'ut_image_loader_text_draw_line_color', get_option( 'ut_accentcolor' , '#F1C40F') ) );

                            $svg->addText( strip_tags( ot_get_option( 'ut_image_loader_text_draw', get_bloginfo('name') ) ) );

                            echo $svg->asXML(); ?>

						<?php endif; ?>

                        <?php if( ot_get_option('ut_image_loader_style', 'style_one') == 'text_background_animation' ) : ?>

                            <div id="ut-overlay-animated-text-wrap">

                                <div id="ut-overlay-animated-text">
                                    <div>
                                        <?php echo ot_get_option( 'ut_image_loader_text_draw', get_bloginfo('name') ); ?>
                                    </div>
                                </div>

                                <div id="ut-overlay-animated-background-text" style="background: url( <?php echo esc_url( ot_get_option('ut_image_loader_text_background_image') ); ?> )">
                                    <?php echo ot_get_option( 'ut_image_loader_text_draw', get_bloginfo('name') ); ?>
                                </div>

                            </div>

                        <?php endif; ?>
						
					</div>
					
				</div>
            
            <?php }
        
        }
        
    }
    
    add_action( 'ut_before_header_hook', 'ut_loader_overlay' );
    
endif;



/**
 * Delete Category Transient
 *
 * @access    public 
 * @since     1.0
 * @version   1.0
 */ 

if ( ! function_exists( 'unitedthemes_category_transient_flusher' ) ) : 
 
    function unitedthemes_category_transient_flusher() {
        // Like, beat it. Dig?
        delete_transient( 'all_the_cool_cats' );
    }
    
    add_action( 'edit_category', 'unitedthemes_category_transient_flusher' );
    add_action( 'save_post',     'unitedthemes_category_transient_flusher' );

endif;


/**
 * fix wordpress w3c rel
 *
 * @access    public 
 * @since     1.0
 * @version   1.0
 */ 

if( !function_exists('ut_replace_cat_tag') ) {
    
    function ut_replace_cat_tag ( $text ) {
        
        $text = preg_replace('/rel="category tag"/', 'data-rel="category tag"', $text); return $text;
        
    }
    
    add_filter( 'the_category', 'ut_replace_cat_tag' );
    
}


/**
 * Side Navigation Content Wrap Open
 *
 * @access    public 
 * @version   4.2.0
 */ 
 
if( !function_exists('ut_side_navigation_content_wrap_open') ) :

    function ut_side_navigation_content_wrap_open() { 
        
        if( ut_return_header_config( 'ut_header_layout', 'default' ) != 'side' ) {
            return;
        }        
        
        echo '<div id="bklyn-sidenav-content-wrap">';        
        
    }

    add_action('ut_before_top_header_hook', 'ut_side_navigation_content_wrap_open' );
    
endif;

/**
 * Side Navigation Content Wrap Close
 *
 * @access    public 
 * @version   4.2.0
 */ 
 
if( !function_exists('ut_side_navigation_content_wrap_close') ) :

    function ut_side_navigation_content_wrap_close() { 

        if( ut_return_header_config( 'ut_header_layout', 'default' ) != 'side' ) {
            return;
        }
        
        echo '</div>';
        
    }

    add_action('ut_after_footer_hook', 'ut_side_navigation_content_wrap_close' );
    
endif;



/*
 * Change Category Blog Layout
 *
 * @access    public 
 * @since     4.2.0
 * @version   1.0.0
 */
           
if ( ! function_exists( 'search_blog_layout' ) ) :

    function search_blog_layout( $layout ) {
        
        if( is_search() || is_archive() || is_author() ) {
            
            $layout = 'grid';
            
        }
        
        return $layout;
    
    }
    
    add_filter( 'unite_blog_layout', 'search_blog_layout', 90 );
    
endif;


/**
 * Floating Scroll Up Arrow
 *
 * @access    public 
 * @since     4.6.0
 * @version   1.0.0
 */ 
 
if( !function_exists('ut_floating_scroll_arrow') ) :

    function ut_floating_scroll_arrow() { 
        
        //if() {
            
            echo '<div id="ut-floating-toTop"></div>';
            
        //}       
        
        
    }

    add_action('ut_before_top_header_hook', 'ut_floating_scroll_arrow' );
    
endif;


/**
 * Contact Section is Content Block
 *
 * @access    public 
 * @since     4.6.2
 * @version   1.0.0
 */ 

function ut_contact_section_is_cblock() {

    return ut_return_csection_config('ut_csection_content_block', 'off') == 'on';

}

add_filter( 'ut_contact_section_is_cblock', 'ut_contact_section_is_cblock' );


/**
 * Has Post Thumbnail with filter
 *
 * @return    filtered has_post_thumbnail()
 *
 * @access    public
 * @since     1.1.0
 * @version   1.0.0
 */

if( !function_exists('unite_has_post_thumbnail') ) {

    function unite_has_post_thumbnail() {
        
        return apply_filters( 'unite_has_post_thumbnail', has_post_thumbnail() );             
        
    }
    
}



/**
 * Header Layout Filter
 */

function unite_header_layout( $layout ) {

    $current = get_queried_object();

    // get default header layout
    $layout = ut_return_header_config( 'ut_header_top_layout', 'default' );        

    // current page ID
    $current_ID = isset( $current->ID ) ? $current->ID : false;

    // shop page has own config
    if( ut_is_shop() ) {
        $current_ID = get_option( 'woocommerce_shop_page_id' );
    }

    // global overlay is active
    if( apply_filters( 'unite_overlay_navigation', 'off' ) == 'on' ) {

        $layout = 'default';

    }

    // local setting has a custom navigation without overlay navigation active
    if( $current_ID && ( get_post_meta( $current_ID, 'ut_navigation_config', true ) == 'off' && get_post_meta( $current_ID, 'ut_overlay_navigation', true ) != 'on' ) ) {

        return ut_return_header_config( 'ut_header_top_layout', 'default' );

    }

    // local setting has a custom navigation with overlay navigation active
    if( $current_ID && ( get_post_meta( $current_ID, 'ut_navigation_config', true ) == 'off' && get_post_meta( $current_ID, 'ut_overlay_navigation', true ) == 'on' ) ) {

        return 'default';

    }

    return $layout;

}

add_filter( 'unite_header_layout', 'unite_header_layout', 90 );
    


/**
 * Overlay Navigation Filter
 */

function unite_overlay_navigation( $status ) {
    
    $current = get_queried_object();
    
    // current page ID
    $current_ID = isset( $current->ID ) ? $current->ID : false;
    
    // global overlay is active
    if( ot_get_option( 'ut_global_overlay_navigation', 'off' ) == 'on' ) {

        $status = 'on';

    }
    
    if( $current_ID && ( get_post_meta( $current_ID, 'ut_navigation_config', true ) == 'off' && get_post_meta( $current_ID, 'ut_overlay_navigation', true ) != 'on' ) ) {

        $status = 'off';

    }
    
    if( $current_ID && ( get_post_meta( $current_ID, 'ut_navigation_config', true ) == 'off' && get_post_meta( $current_ID, 'ut_overlay_navigation', true ) == 'on' ) ) {

        $status = 'on';

    }
    
    return $status;
    
}

add_filter( 'unite_overlay_navigation', 'unite_overlay_navigation', 90 );


/**
 * Simple Revision Delete (Plugin)
 */

function ut_wpsrd_add_post_types( $postTypes ){
    $postTypes[] = 'portfolio';
    return $postTypes;
}

add_filter( 'wpsrd_post_types_list', 'ut_wpsrd_add_post_types' );

/**
 * Custom Cursor
 */

function ut_custom_cursor() {

    if( unite_mobile_detection()->isMobile() || ot_get_option( 'ut_custom_cursor', 'off' ) == 'off' || isset( $_GET['vc_editable'] ) ) {
        return;
    }

    // Cursor Classes
    $cursor_classes = array(
        'ut-hover-cursor',
        'ut-hover-cursor-' . ot_get_option( 'ut_custom_cursor_base_size', 'large' ),
        'ut-hover-cursor-grow-' . ot_get_option( 'ut_custom_cursor_hover_size', 'on' ),
        'ut-hover-cursor-style-' . ot_get_option( 'ut_custom_cursor_style' , 'default'),
        'ut-hover-cursor-dot-size-' . ot_get_option( 'ut_custom_cursor_dot_size' , 'small' ),
        'ut-hover-cursor-hover-dot-size-' . ot_get_option( 'ut_custom_cursor_hover_dot_size' , 'small' ),
    );

    if( ot_get_option( 'ut_custom_cursor_contrast', 'off' ) == 'on' ) {

        $cursor_classes[] = 'ut-hover-cursor-contrast';

    }

    // Skin Settings
    $skin = ot_get_option( 'ut_custom_cursor_default_skin', 'light' );

    // Dot Size
    $dot_sizes = array(
        'small'     => 3,
        'medium'    => 6,
        'large'     => 9,
        'xlarge'    => 12,
        'xxlarge'   => 15,
        'full'      => 24,
    );

    ob_start(); ?>

    <div id="ut-hover-cursor-follow" class="<?php echo implode( " ", $cursor_classes ); ?>" data-magnify="<?php echo esc_attr( ot_get_option( 'ut_custom_cursor_magnify', 'off' ) ); ?>" data-cursor="default" data-skin="<?php echo esc_attr( $skin ); ?>" data-default-skin="<?php echo esc_attr( $skin ); ?>">

        <div class="ut-hover-cursor-inner">

            <div class="circle">
                <svg width="100" height="100" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">

                    <ellipse class="circle" cx="50" cy="50" rx="48" ry="48"></ellipse>
                    <ellipse class="circle-animation" cx="50" cy="50" rx="48" ry="48"></ellipse>

                    <!-- <text dominant-baseline="middle" text-anchor="middle" x="50%" y="50%">Read More</text> -->

                </svg>
            </div>

        </div>

    </div>

    <div id="ut-hover-cursor" class="<?php echo implode( " ", $cursor_classes ); ?>" data-cursor="default" data-skin="<?php echo esc_attr( $skin ); ?>" data-default-skin="<?php echo esc_attr( $skin ); ?>" data-dot-size="<?php echo $dot_sizes[ot_get_option( 'ut_custom_cursor_dot_size' , 'small' )]; ?>" data-hover-dot-size="<?php echo $dot_sizes[ot_get_option( 'ut_custom_cursor_hover_dot_size' , 'small' )]; ?>">

        <div class="ut-hover-cursor-inner">

            <div class="circle">
                <svg width="100" height="100" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">

                    <ellipse class="circle-inner" cx="50" cy="50" rx="<?php echo $dot_sizes[ot_get_option( 'ut_custom_cursor_dot_size' , 'small' )]; ?>" ry="<?php echo $dot_sizes[ot_get_option( 'ut_custom_cursor_dot_size' , 'small' )]; ?>"></ellipse>

                    <path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z" class="arrow arrow-left"></path>
                    <path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z" class="arrow arrow-right" transform="translate(100, 100) rotate(180)"></path>

                    <path d="M 45,50 L 45,75 L 55,75 L 55,50  L 55,25 L 45,25 Z" class="plus"></path>
                    <path d="M 45,50 L 45,75 L 55,75 L 55,50  L 55,25 L 45,25 Z" class="plus rotate"></path>

                    <path d="M 45,50 L 45,75 L 55,75 L 55,50  L 55,25 L 45,25 Z" class="cross-left"></path>
                    <path d="M 45,50 L 45,75 L 55,75 L 55,50  L 55,25 L 45,25 Z" class="cross-right"></path>

                    <polygon points="35, 22.5 35, 72.5 72.5, 50" fill="#000" class="play"/>

                </svg>
            </div>

        </div>

    </div>



    <div id="ut-hover-cursor-pulse"></div>

    <?php echo ob_get_clean();


}

add_action( 'ut_after_footer_hook', 'ut_custom_cursor' );


/**
 * Custom Cursor
 */

function ut_morphbox() {

    if( ot_get_option( 'ut_lightgallery_type', 'lightgallery' ) == 'lightgallery' ) {
        return;
    }

    ob_start(); ?>

    <div id="ut-morph-box-app" data-custom-cursor="close" data-cursor-skin="global"></div>

    <div id="ut-morph-box-full" data-cursor-skin="global"></div>

    <svg id="ut-morph-box-close">

        <symbol id="ut-morph-box-close-icon" aria-hidden="true" width="24" height="22px" viewBox="0 0 24 22">
            <path d="M11 9.586L20.192.393l1.415 1.415L12.414 11l9.193 9.192-1.415 1.415L11 12.414l-9.192 9.193-1.415-1.415L9.586 11 .393 1.808 1.808.393 11 9.586z"></path>
        </symbol>

    </svg>

    <?php echo ob_get_clean();

}

add_action( 'ut_after_footer_hook', 'ut_morphbox' );



/*
 * Recognized Landscape Image Sizes
 *
 * @return    array
 *
 * @since     4.9.5
 */

function ut_recognized_landscape_image_sizes( $crop = false ) {

    if( $crop ) {

        // aspect ratio 3:2
        return apply_filters( 'ut_recognized_landscape_image_sizes_cropped', array(

            300  => 200,
            500  => 333,
            750  => 500,
            1000 => 667,
            1500 => 1000,
            2500 => 1666

        ) );


    } else {

        // dynamic height
        return apply_filters( 'ut_recognized_landscape_image_sizes', array(

            300  => 9999,
            500  => 9999,
            750  => 9999,
            1000 => 9999,
            1500 => 9999,
            2500 => 9999

        ) );

    }

}

/*
 * Recognized Portrait Image Sizes
 *
 * @return    array
 *
 * @since     4.9.5
 */

function ut_recognized_portrait_image_sizes( $crop = false ) {

    if( $crop ) {

        // aspect ratio 2:3
        return apply_filters( 'ut_recognized_portrait_image_sizes', array(

            300  => 450,
            500  => 750,
            750  => 1125,
            1000 => 1500,
            1500 => 2250,
            2500 => 3750

        ) );

    } else {

        // dynamic height
        return apply_filters( 'ut_recognized_portrait_image_sizes', array(

            300  => 9999,
            500  => 9999,
            750  => 9999,
            1000 => 9999,
            1500 => 9999,
            2500 => 9999

        ) );

    }

}


/*
 * Dynamic Image Sizes
 *
 * @return    array
 *
 * @since     4.9.5
 */

function ut_dynamic_image_sizes( $width = '', $height = '', $crop = false, $orientation = 'landscape' ) {

    $base_width = array(
        300, 500, 750, 1000, 1500, 2500
    );

    $new_width = array();

    if( $orientation == 'auto' ) {

        $orientation = $width > $height ? 'landscape' : 'portrait';

    }

    foreach( $base_width as $custom_width ) {

        if( $crop ) {

            // landscape images
            if( $orientation == 'landscape' ) {

                $aspect_ratio = $width / $height;
                $new_width[$custom_width] = round( $custom_width / $aspect_ratio );

                // portrait images
            } else {

                $aspect_ratio = $height / $width;
                $new_width[$custom_width] = round( $custom_width * $aspect_ratio );

            }

        } else {

            $new_width[$custom_width] = 9999;

        }

    }

    return $new_width;

}

/*
 * Polylang Content Block Translation
 *
 * @return    array
 *
 * @since     4.9.5
 */

function ut_add_cpt_to_pll( $post_types, $is_settings ) {

	if ( $is_settings ) {


	} else {

		$post_types['ut-content-block'] = 'ut-content-block';


	}
	return $post_types;

}

add_filter( 'pll_get_post_types', 'ut_add_cpt_to_pll', 10, 2 );




/**
 * Recognized Breakpoints
 */
if ( !function_exists( 'ot_recognized_breakpoints' ) ) {

    function ot_recognized_breakpoints( $field_id = '' ) {

        return apply_filters( 'ot_recognized_breakpoints', array(
            'desktop_large'     => 'Large Desktop',
            'desktop_small'     => 'Small Desktop',
            'tablet'            => 'Tablet',
            'mobile'            => 'Mobile'
        ), $field_id );

    }

}

/**
 * Recognized Breakpoints Values
 */
if ( !function_exists( 'ot_recognized_breakpoints_values' ) ) {

    function ot_recognized_breakpoints_values( $breakpoint = '', $val = 'query', $single = true ) {

        /* 'desktop_small' => array(
            'query' => '(min-width: 1025px) and (max-width: 1600px)',
            'val'   => array(
                'min' => 1024,
                'max' => 1600
            )
        ),*/

        $breakpoints = array(
            'desktop_large' => array(
                'query' => '(min-width: 1680px)',
                'val'   => array(
                    'min' => 1680,
                    'max' => 'auto'
                )
            ),
            'desktop_small' => array(
                'query' => '(min-width: 1025px) and (max-width: 1679px)',
                'val'   => array(
                    'min' => 1024,
                    'max' => 1679
                )
            ),
            'tablet'  => array(
                'query' => '(min-width: 768px) and (max-width: 1024px)',
                'val'   => array(
                    'min' => 768,
                    'max' => 1024
                )
            ),
            'mobile' => array(
                'query' => '(max-width: 767px)',
                'val'   => array(
                    'min' => 'auto',
                    'max' => 767
                )
            )
        );

        if( $single ) {

            return $breakpoints[$breakpoint][$val] ?? false;

        } else {

            return $breakpoints;

        }

    }

}

if ( !function_exists( 'ot_get_breakpoint_icon' ) ) {

    /**
     * @param string $breakpoint
     * @return string
     */

    function ot_get_breakpoint_icon( string $breakpoint = '' ) {

        $icons = array(
            'desktop_large' => '<span class="dashicons dashicons-desktop"></span>',
            'desktop_small' => '<span class="dashicons dashicons-laptop"></span>',
            'tablet'        => '<span class="dashicons dashicons-tablet"></span>',
            'mobile'        => '<span class="dashicons dashicons-smartphone"></span>'
        );

        return $icons[$breakpoint] ?? '';

    }

}

/**
 * Supported Responsive Font Attributes
 *
 * @return    array
 *
 * @since     4.9.6.7
 */

function ut_font_responsive_attributes() {

    return apply_filters( 'ut_font_responsive_attributes', array(
        'font-size',
        'line-height',
        'letter-spacing'
    ) );

}

/**
 * Supported Responsive Font Attributes
 *
 * @param     $attribute
 * @return    string
 *
 * @since     4.9.6.7
 */

function ut_font_responsive_attribute_values( $attribute ) {

    $default_values = apply_filters( 'ut_font_responsive_attribute_values', array(
        'font-size'      => 'px',
        'line-height'    => 'px',
        'letter-spacing' => 'em'
    ) );

    return $default_values[$attribute] ?? 'px';

}


/**
 * Responsive Font Settings
 *
 * @return    array
 *
 * @since     4.9.6.7
 */

function ut_responsive_font_settings() {



}

add_filter( 'ut_responsive_font_settings', 'ut_responsive_font_settings', 10, 2 );


/**
 * Recognized Dynamic Min Max Font Sizes bases on Units
 *
 * Returns an array of all recognized line heights.
 *
 * @uses      apply_filters()
 *
 * @param     string  $field_id ID that's passed to the filters.
 * @return    array
 *
 * @access    public
 * @since     4.9.6.7
 */
if ( !function_exists( 'ot_recognized_line_height_dynamic' ) ) {

    function ot_recognized_line_height_dynamic( $field_id, $unit ) {

        $default_values = array(
            'px' => array(
                'min'       => '0',
                'max'       => '150',
                'step'      => '1',
            ),
            '%' => array(
                'min'       => '0',
                'max'       => '200',
                'step'      => '1',
            ),
            'em' => array(
                'min'       => '0',
                'max'       => '14',
                'step'      => '0.1',
            ),
            'rem' => array(
                'min'       => '0',
                'max'       => '14',
                'step'      => '0.1',
            ),
            'vw' => array(
                'min'       => '0',
                'max'       => '10',
                'step'      => '0.1',
            ),
            'vh' => array(
                'min'       => '0',
                'max'       => '16',
                'step'      => '0.1',
            )
        );

        return array(
            apply_filters('ot_line_height_' . $unit . '_low_range', $default_values[$unit]['min'], $field_id),
            apply_filters('ot_line_height_' . $unit . '_high_range', $default_values[$unit]['max'], $field_id),
            apply_filters('ot_line_height_' . $unit . '_range_interval', $default_values[$unit]['step'], $field_id)
        );

    }

}

/**
 * Recognized Line Height Units
 *
 * Returns an array of all recognized line heights.
 *
 * @uses      apply_filters()
 *
 * @param     string  $field_id ID that's passed to the filters.
 * @return    array
 *
 * @access    public
 * @since     4.9.6.7
 */
if ( !function_exists( 'ot_recognized_line_height_units' ) ) {

    function ot_recognized_line_height_units( $field_id ) {

        return apply_filters( 'ot_recognized_line_height_units', array(
            'px'   => 'px',
            '%'    => '%',
            'rem'  => 'rem',
            'em'   => 'em',
            'vw'   => 'vw',
            'vh'   => 'vh',
        ), $field_id );

    }

}

/**
 * Recognized Dynamic Min Max Font Sizes bases on Units
 *
 * Returns an array of all recognized line heights.
 *
 * @uses      apply_filters()
 *
 * @param     string  $field_id ID that's passed to the filters.
 * @return    array
 *
 * @access    public
 * @since     4.9.6.7
 */
if ( !function_exists( 'ot_recognized_font_size_dynamic' ) ) {

    function ot_recognized_font_size_dynamic( $field_id, $unit ) {

        $default_values = array(
            '' => array(
                'min'       => '8',
                'max'       => '150',
                'step'      => '1',
            ),
            'px' => array(
                'min'       => '8',
                'max'       => '150',
                'step'      => '1',
            ),
            'em' => array(
                'min'       => '1',
                'max'       => '10',
                'step'      => '0.1',
            ),
            'rem' => array(
                'min'       => '0.5',
                'max'       => '10',
                'step'      => '0.1',
            ),
            'vw' => array(
                'min'       => '0',
                'max'       => '5',
                'step'      => '0.1',
            ),
            'vh' => array(
                'min'       => '0',
                'max'       => '8',
                'step'      => '0.1',
            )
        );

        if( array_key_exists( $unit, $default_values ) ) {

            return array(
                apply_filters('ot_font_size_' . $unit . '_low_range', $default_values[$unit]['min'], $field_id),
                apply_filters('ot_font_size_' . $unit . '_high_range', $default_values[$unit]['max'], $field_id),
                apply_filters('ot_font_size_' . $unit . '_range_interval', $default_values[$unit]['step'], $field_id)
            );

        } else {

            return array(
                apply_filters('ot_font_size_custom_low_range', $default_values['px']['min'], $field_id),
                apply_filters('ot_font_size_custom_high_range', $default_values['px']['max'], $field_id),
                apply_filters('ot_font_size_custom_range_interval', $default_values['px']['step'], $field_id)
            );

        }

    }

}

/**
 * Recognized Font Size Units
 *
 * Returns an array of all recognized line heights.
 *
 * @uses      apply_filters()
 *
 * @param     string  $field_id ID that's passed to the filters.
 * @return    array
 *
 * @access    public
 * @since     4.9.6.7
 */
if ( !function_exists( 'ot_recognized_font_size_units' ) ) {

    function ot_recognized_font_size_units( $field_id ) {

        return apply_filters( 'ot_recognized_font_size_units', array(
            'px'   => 'px',
            'rem'  => 'rem',
            'em'   => 'em',
            'vw'   => 'vw',
            'vh'   => 'vh',
            //'%'    => '%',
        ), $field_id );

    }

}

/**
 * Responsive Font Settings Support
 *
 * @param   array
 * @return  array
 *
 * @since     4.9.6.7
 */

function ut_responsive_font_settings_support( array $font_support = array() ) {

    $font_support['site_logo'] = array(
        'type'     => 'ut_global_header_text_logo_font_type',
        'base-font-size'   => '16',
        'sources'  => array(
            'ut-google'  => 'ut_global_header_text_google_font_style',
            'ut-websafe' => 'ut_global_header_text_logo_websafe_font_style',
            'ut-custom'  => 'ut_global_header_text_logo_custom_font_style'
        )
    );

    $font_support['hero_slogan'] = array(
        'type'     => 'ut_front_catchphrase_top_font_type',
        'base-font-size'    => '14',
        'sources'  => array(
            'ut-google'  => 'ut_google_front_catchphrase_top_font_style',
            'ut-websafe' => 'ut_front_catchphrase_top_websafe_font_style',
            'ut-custom'  => 'ut_front_catchphrase_top_custom_font_style'
        ),
        'metabox'   => array(
            'type'     => 'ut-websafe',
            'sources'  => array(
                'ut-websafe'  => 'ut_page_caption_description_top_websafe_font_style',
            )
        )
    );

    $font_support['blog_hero_slogan'] = array(
        'type'     => 'ut_blog_catchphrase_top_font_type',
        'base-font-size'    => '14',
        'sources'  => array(
            'ut-google'  => 'ut_google_blog_catchphrase_top_font_style',
            'ut-websafe' => 'ut_blog_catchphrase_top_websafe_font_style',
            'ut-custom'  => 'ut_blog_catchphrase_top_custom_font_style'
        )
    );

    $font_support['hero_title'] = array(
        'type'     => 'ut_front_hero_font_type',
        'base-font-size'   => '80',
        'sources'  => array(
            'ut-google'  => 'ut_google_front_page_hero_font_style',
            'ut-websafe' => 'ut_front_page_hero_websafe_font_style',
            'ut-custom'  => 'ut_front_page_hero_custom_font_style'
        ),
        'metabox'   => array(
            'type'     => 'custom',
            'sources'  => array(
                'font-size'    => 'ut_page_hero_font_size',
                'line-height'  => 'ut_page_hero_font_line_height',
            )
        )
    );

    $font_support['blog_hero_title'] = array(
        'type'     => 'ut_blog_hero_font_type',
        'base-font-size'   => '80',
        'sources'  => array(
            'ut-google'  => 'ut_google_blog_hero_font_style',
            'ut-websafe' => 'ut_blog_hero_websafe_font_style',
            'ut-custom'  => 'ut_blog_hero_custom_font_style'
        ),
    );

    $font_support['hero_description'] = array(
        'type'     => 'ut_front_catchphrase_font_type',
        'base-font-size'   => '16',
        'sources'  => array(
            'ut-google'  => 'ut_google_front_catchphrase_font_style',
            'ut-websafe' => 'ut_front_catchphrase_websafe_font_style',
            'ut-custom'  => 'ut_front_catchphrase_custom_font_style'
        ),
        'metabox'   => array(
            'type'     => 'ut-websafe',
            'sources'  => array(
                'ut-websafe'  => 'ut_page_caption_description_websafe_font_style',
            )
        )
    );

    $font_support['blog_hero_description'] = array(
        'type'     => 'ut_blog_catchphrase_font_type',
        'base-font-size'   => '16',
        'sources'  => array(
            'ut-google'  => 'ut_google_blog_catchphrase_font_style',
            'ut-websafe' => 'ut_blog_catchphrase_websafe_font_style',
            'ut-custom'  => 'ut_blog_catchphrase_custom_font_style'
        )
    );

    /*$font_support['overlay_navigation'] = array(
        'type'     => 'ut_overlay_navigation_font_type',
        'base-font-size'   => '16',
        'sources'  => array(
            'ut-google'  => 'ut_google_overlay_navigation_style',
            'ut-websafe' => 'ut_global_overlay_navigation_websafe_font_style',
            'ut-custom'  => 'ut_global_overlay_navigation_custom_font_style'
        )
    );

    $font_support['overlay_navigation_sub'] = array(
        'type'     => 'ut-websafe',
        'base-font-size'   => '16',
        'sources'  => array(
            'ut-websafe' => 'ut_global_overlay_navigation_submenu_websafe_font_style',
        )
    );*/

    $font_support['section_title'] = array(
        'type'     => 'ut_global_headline_font_type',
        'base-font-size'   => '30',
        'sources'  => array(
            'ut-google'   => 'ut_global_google_headline_font_style',
            'ut-websafe'  => 'ut_global_headline_websafe_font_style_settings',
            'ut-custom'   => 'ut_global_headline_custom_font_style_settings',
            'ut-font'     => 'ut_global_headline_font_style_settings'
        )
    );

    $font_support['section_lead'] = array(
        'type'     => 'ut_global_lead_font_type',
        'base-font-size'   => '16',
        'sources'  => array(
            'ut-google'   => 'ut_google_lead_font_style',
            'ut-websafe'  => 'ut_lead_websafe_font_style',
            'ut-custom'   => 'ut_lead_custom_font_style'
        )
    );

    $font_support['page_title'] = array(
        'type'     => 'ut_global_page_headline_font_type',
        'base-font-size'   => '30',
        'sources'  => array(
            'ut-google'   => 'ut_global_page_google_headline_font_style',
            'ut-websafe'  => 'ut_global_page_headline_websafe_font_style_settings',
            'ut-custom'   => 'ut_global_page_headline_custom_font_style_settings',
            'ut-font'     => 'ut_global_page_headline_font_style_settings'
        )
    );

    $font_support['page_lead'] = array(
        'type'     => 'ut_global_page_headline_lead_font_type',
        'base-font-size'   => '16',
        'sources'  => array(
            'ut-google'   => 'ut_google_global_page_headline_lead_font_style',
            'ut-websafe'  => 'ut_global_page_headline_lead_websafe_font_style',
            'ut-custom'   => 'ut_global_page_headline_lead_font_type'
        )
    );

    $font_support['contact_section_title'] = array(
        'type'     => 'ut_csection_header_font_type',
        'base-font-size'   => '30',
        'sources'  => array(
            'ut-google'   => 'ut_csection_header_google_font_style',
            'ut-websafe'  => 'ut_csection_header_websafe_font_style',
            'ut-custom'   => 'ut_csection_header_custom_font_style',
            'ut-font'     => 'ut_csection_header_font_style_settings'
        )
    );

    $font_support['contact_section_lead'] = array(
        'type'     => 'ut_csection_header_font_type',
        'base-font-size'   => '16',
        'sources'  => array(
            'ut-google'   => 'ut_csection_lead_google_font_style',
            'ut-websafe'  => 'ut_csection_lead_websafe_font_style',
            'ut-custom'   => 'ut_csection_lead_custom_font_style',
        )
    );

    $h_base_font_headlines = array(
        'h1' => '30',
        'h2' => '25',
        'h3' => '18',
        'h4' => '16',
        'h5' => '14',
        'h6' => '12'
    );

    foreach( $h_base_font_headlines as $key => $size ) {

        $font_support[$key] = array(
            'type'     => 'ut_global_' . $key . '_font_type',
            'base-font-size'   => $size,
            'sources'  => array(
                'ut-google'  => 'ut_'. $key .'_google_font_style',
                'ut-websafe' => 'ut_'. $key .'_websafe_font_style',
                'ut-custom'  => 'ut_'. $key .'_custom_font_style',
                'ut-font'    => 'ut_'. $key .'_font_style'
            )
        );

    }

    $base_font = array(
        'div' => '14',
        'p'   => '14'
    );

    foreach( $base_font as $key => $size ) {

        $font_support[$key] = array(
            'type'     => 'ut_body_font_type',
            'base-font-size' => $size,
            'sources'  => array(
                'ut-google'  => 'ut_google_body_font_style',
                'ut-websafe' => 'ut_body_websafe_font_style',
                'ut-custom'  => 'ut_body_custom_font_style',
            )
        );

    }

    // .ut-blog-classic-article .entry-title
    $font_support['classic_blog_title'] = array(
        'type'     => 'ut-websafe',
        'base-font-size'   => '22',
        'sources'  => array(
            'ut-websafe'  => 'ut_global_blog_titles_font_style',
        )
    );

    // .ut-blog-grid-article .entry-title
    $font_support['grid_blog_title'] = array(
        'type'     => 'ut-websafe',
        'base-font-size'   => '22',
        'sources'  => array(
            'ut-websafe'  => 'ut_global_grid_blog_titles_font_style',
        )
    );

    // .ut-blog-list-article .entry-title
    $font_support['list_blog_title'] = array(
        'type'     => 'ut-websafe',
        'base-font-size'   => '22',
        'sources'  => array(
            'ut-websafe'  => 'ut_global_list_blog_titles_font_style',
        )
    );

    // .single-post h1.entry-title
    $font_support['single_post_title'] = array(
        'type'     => 'ut-websafe',
        'base-font-size'   => '22',
        'sources'  => array(
            'ut-websafe'  => 'ut_global_blog_single_titles_font_style',
        )
    );

    // .single-post .single-post-entry-sub-title
    $font_support['single_post_sub_title'] = array(
        'type'     => 'ut-websafe',
        'base-font-size'   => '25',
        'sources'  => array(
            'ut-websafe'  => 'ut_global_blog_single_sub_titles_font_style',
        )
    );

    return apply_filters( 'ut_responsive_font_settings_support', $font_support );

}


/**
 * Responsive Font Settings Overwrite
 *
 * @param   array
 * @return  array
 *
 * @since     4.9.6.7
 */

function ut_responsive_font_settings_overwrite( $font_support ) {

    // overwrite section title with page title settings
    if( ot_get_option('ut_global_headline_font_inherit', 'off' ) == 'on' ) {

        $font_support['section_title'] = $font_support['page_title'];

    }

    // overwrite contact section title with section title settings
    if( ot_get_option('ut_csection_header_font_inherit', 'off' ) == 'on' ) {

        $font_support['contact_section_title'] = $font_support['section_title'];

    }

    return $font_support;

}

add_filter( 'ut_responsive_font_settings_support', 'ut_responsive_font_settings_overwrite',10 ,1 );


/**
 * Get Responsive Font Settings
 *
 * @return    array
 *
 * @since     4.9.6.7
 */

function ut_font_responsive_settings() {

    $default_font_types = array(
        'ut-google','ut-websafe','ut-custom','ut-font'
    );

    /* responsive settings array */
    $responsive_font_settings = array();

    $id = get_queried_object_id();

    foreach ( ut_responsive_font_settings_support() as $key => $option ) {

        // single font option
        if( in_array( $option['type'], $default_font_types ) ) {

            $font_type = $option['type'];

        // multi font option
        } else {

            $font_type = ot_get_option( $option['type'] );

        }

        if ( isset( $option['sources'][$font_type] ) ) {

            // get current font settings
            $font_settings = ot_get_option( $option['sources'][$font_type] );

            // meta panel values
            if( isset( $option['metabox'] ) && $option['metabox']['type'] != 'custom' && isset( $option['metabox']['sources'][$option['metabox']['type']] ) ) {

                $meta_key = $option['metabox']['sources'][$option['metabox']['type']];
                $meta_key_overwrite = $meta_key . '_global_overwrite';

                if( get_post_meta( $id, $meta_key_overwrite, true ) ) {

                    $_font_settings = get_post_meta( $id, $meta_key, true );

                    $_font_settings = array_filter($_font_settings, function($v){
                        return !is_null($v) && $v !== '';
                    });

                    $font_settings = array_merge( $font_settings, $_font_settings );

                }

            }

            if( isset( $option['metabox'] ) && $option['metabox']['type'] == 'custom' ) {

                foreach( ut_font_responsive_attributes() as $attribute ) {

                    if( isset( $option['metabox']['sources'][$attribute] ) ) {

                        $meta_key = $option['metabox']['sources'][$attribute];
                        $meta_key_overwrite = $meta_key . '_global_overwrite';

                        if( get_post_meta( $id, $meta_key_overwrite, true ) ) {

                            $font_settings = array_merge( $font_settings, get_post_meta( $id, $meta_key, true ) );

                        }

                    }

                }

            }

            foreach( ut_font_responsive_attributes() as $attribute ) {

                if( !empty( $font_settings[$attribute] ) ) {

                    $responsive_font_settings[$key]['base-' . $attribute] = ut_remove_px_value( $font_settings[$attribute] );

                } elseif( !empty( $option['base-'. $attribute] ) ) {

                    $responsive_font_settings[$key]['base-' . $attribute] = ut_remove_px_value( $option['base-'. $attribute] );

                } else {

                    $responsive_font_settings[$key]['base-' . $attribute] = '';

                }

                $_unit = !empty( $font_settings[$attribute . '-unit'] ) ? $font_settings[$attribute . '-unit'] : 'px';
                $min_max_func = 'ot_recognized_' . str_replace("-", "_", $attribute ) . '_dynamic';

                $responsive_font_settings[$key][$attribute . '-unit'] = $_unit;

                if( function_exists( $min_max_func ) ) {

                    $attribute_units_func = 'ot_recognized_' . str_replace("-", "_", $attribute ) . '_units';

                    foreach( $attribute_units_func( $option['sources'][$font_type] ) as $k => $unit ) {

                        $responsive_font_settings[$key][$attribute . '-min-max'][$k] = $min_max_func($option['sources'][$font_type], $k);

                    }

                }

            }



            foreach ( ot_recognized_breakpoints() as $b_key => $breakpoint ) {

                if( $b_key == 'desktop_large' ) {

                    if( !empty( $font_settings['font-size'] ) ) {

                        $responsive_font_settings[$key]['font-size']['desktop_large'] = ut_remove_px_value($font_settings['font-size'] );

                    } else {

                        $responsive_font_settings[$key]['font-size']['desktop_large'] = ut_remove_px_value( $option['base-font-size'] );

                    }

                    if( !empty( $font_settings['letter-spacing'] ) ) {

                        $responsive_font_settings[$key]['letter-spacing']['desktop_large'] = ut_remove_px_value($font_settings['letter-spacing'] );

                    }

                    if( !empty( $font_settings['line-height'] ) ) {

                        $responsive_font_settings[$key]['line-height']['desktop_large'] = ut_remove_px_value($font_settings['line-height'] );

                    }

                } else {

                    foreach( ut_font_responsive_attributes() as $attribute ) {

                        if (!empty($font_settings[$attribute . '-responsive'][$b_key])) {

                            $responsive_font_settings[$key][$attribute][$b_key] = ut_remove_px_value($font_settings[$attribute . '-responsive'][$b_key]);

                        } else {

                            $responsive_font_settings[$key][$attribute][$b_key] = 'inherit';

                        }

                    }

                }

            }

        }

    }

    return $responsive_font_settings;

}


/**
 * Title Option Filter
 */

$GLOBALS['font_relations'] = array();

function _ut_title_font_type_relations() {

    global $font_relations;

    $title_type_relations = array(

        // Titles
        'ut_global_page_headline_font_type'  => array(
            'ut-google'   => 'ut_global_page_google_headline_font_style',
            'ut-websafe'  => 'ut_global_page_headline_websafe_font_style_settings',
            'ut-custom'   => 'ut_global_page_headline_custom_font_style_settings',
            'ut-font'     => 'ut_global_page_headline_font_style_settings'
        ),
        'ut_global_headline_font_type'  => array(
            'ut-google'   => 'ut_global_google_headline_font_style',
            'ut-websafe'  => 'ut_global_headline_websafe_font_style_settings',
            'ut-custom'   => 'ut_global_headline_custom_font_style_settings',
            'ut-font'     => 'ut_global_headline_font_style_settings'
        ),
        'ut_csection_header_font_type'  => array(
            'ut-google'   => 'ut_csection_header_google_font_style',
            'ut-websafe'  => 'ut_csection_header_websafe_font_style',
            'ut-custom'   => 'ut_csection_header_custom_font_style',
            'ut-font'     => 'ut_csection_header_font_style_settings'
        ),
        // Leads
        'ut_global_page_headline_lead_font_type' => array(
            'ut-google'   => 'ut_google_global_page_headline_lead_font_style',
            'ut-websafe'  => 'ut_global_page_headline_lead_websafe_font_style',
            'ut-custom'   => 'ut_global_page_headline_lead_custom_font_style',
            'ut-font'     => 'ut_global_page_headline_lead_font_style'
        ),
        'ut_global_lead_font_type' => array(
            'ut-google'   => 'ut_google_lead_font_style',
            'ut-websafe'  => 'ut_lead_websafe_font_style',
            'ut-custom'   => 'ut_lead_custom_font_style',
            'ut-font'     => 'ut_lead_font_style'
        ),
        'ut_csection_lead_font_type' => array(
            'ut-google'   => 'ut_csection_lead_google_font_style',
            'ut-websafe'  => 'ut_csection_lead_websafe_font_style',
            'ut-custom'   => 'ut_csection_lead_custom_font_style',
            'ut-font'     => 'ut_csection_lead_font_style'
        )

    );

    $section_title_type = 'ut_global_headline_font_type';

    // overwrite section title with page title
    if( ot_get_option('ut_global_headline_font_inherit', 'off' ) == 'on' ) {

        $section_title_type = $font_relations[$section_title_type] = 'ut_global_page_headline_font_type';

        foreach( $title_type_relations['ut_global_headline_font_type'] as $type => $option ) {

            $font_relations[$option] = $title_type_relations['ut_global_page_headline_font_type'][$type];

            // overwrite for next iteration
            $title_type_relations['ut_global_headline_font_type'][$type] = $title_type_relations['ut_global_page_headline_font_type'][$type];

        }

    }

    $section_lead_type = 'ut_global_lead_font_type';

    // overwrite section lead with page lead
    if( ot_get_option('ut_global_lead_font_inherit', 'off' ) == 'on' ) {

        $section_lead_type = $font_relations[$section_lead_type] = 'ut_global_page_headline_lead_font_type';

        foreach( $title_type_relations['ut_global_lead_font_type'] as $type => $option ) {

            $font_relations[$option] = $title_type_relations['ut_global_page_headline_lead_font_type'][$type];

            // overwrite for next iteration
            $title_type_relations['ut_global_lead_font_type'][$type] = $title_type_relations['ut_global_page_headline_lead_font_type'][$type];

        }

    }

    // overwrite contact section title with section title
    if( ot_get_option('ut_csection_header_font_inherit', 'off' ) == 'on' ) {

        $font_relations['ut_csection_header_font_type'] = $section_title_type;

        foreach( $title_type_relations['ut_csection_header_font_type'] as $type => $option ) {

            $font_relations[$option] = $title_type_relations[$section_title_type][$type];

        }

    }

    // overwrite contact section lead with section lead
    if( ot_get_option('ut_csection_lead_font_inherit', 'off' ) == 'on' ) {

        $font_relations['ut_csection_lead_font_type'] = $section_lead_type;

        foreach( $title_type_relations['ut_csection_lead_font_type'] as $type => $option ) {

            $font_relations[$option] = $title_type_relations[$section_lead_type][$type];

        }

    }

}

add_action( 'after_setup_theme', '_ut_title_font_type_relations' );

function _ot_get_option_filter( $option_id ) {

    if( UT_IS_ADMIN ) {

        return $option_id;

    }

    global $font_relations;

	return array_key_exists( $option_id, $font_relations ) ? $font_relations[$option_id] : $option_id;

}

add_filter( 'ot_get_option_filter', '_ot_get_option_filter', 40, 1 );