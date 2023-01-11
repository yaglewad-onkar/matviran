<?php

if ( ! defined( 'ABSPATH' ) ) exit;


/**
 * Site Frame CSS
 *
 * @access    public
 * @support   transient
 */

class UT_Site_Frame_CSS extends UT_Custom_CSS {
        
	public function custom_css() {
        
        // no siteframe for maintenance mode
        if( apply_filters( 'ut_maintenance_mode_active', false ) ) {
            return;
        } 
        
        global $post;
        
        ob_start(); ?>
    
            <style id="ut-site-frame-css" type="text/css">            

            <?php 

            /*
             * Border Settings ( Site Frame )
             */
            
            $vc_gap = array(
                '0px' => '0',
                '1px' => '1',
                '2px' => '2',
                '3px' => '3',
                '4px' => '4',
                '5px' => '5',
                '10px' => '10',
                '15px' => '15',
                '20px' => '20',
                '25px' => '25',
                '30px' => '30',
                '35px' => '35',
                '40px' => '40'
            ); 
            
            if( apply_filters( 'ut_show_siteframe', 'hide' ) == 'show' ) : 
                
                // frame settings
                $ut_site_frame_settings = apply_filters( 'ut_site_frame_settings', array() );
        
                $ut_site_border_status = $ut_site_frame_settings['border_status'];
                $ut_site_border_size   = $ut_site_frame_settings['border_size']; ?>

                @media (min-width: 1025px) {    

                <?php 

                $status = $ut_site_border_status; 
                $margin = array();

                // header and top header spacing flags
                $left  = false;
                $right = false;
                $top   = false;

                if( !empty( $status ) && is_array( $status ) ) {

                    foreach( $status as $key => $state ) {

                        if( $key == 'margin-top' ) {
                            
                            $top = $state == "on";                            
                            continue; // not necessary anymore
                            
                        }

                        if( $state == "on" && $key == 'margin-left' ) {
                            $left = true;
                        }

                        if( $state == "on" && $key == 'margin-right' ) {
                            $right = true;
                        }                            

                        // add margin to html
                        if( $state == "on" && $key != 'margin-bottom' ) {
                            $margin[] = $key . ':' . $ut_site_border_size . 'px;';
                        }

                    }

                    if( !empty( $margin ) ) {                        
                        echo 'html { ' . implode( ' ', $margin ) . ' }';
                    }

                } else {

                    echo 'html { background: ' . ut_page_option( 'ut_site_border_color', '#FFF' ) . '; margin-left:80px; margin-right: 80px; };';

                }         
        
                /* 
                 * frame left and right with top header flush
                 */
        
                if( $left && $right ) : ?>
                    
                    <?php if( ut_return_header_config('ut_navigation_scroll_position' , 'floating') == 'floating' ) : ?>
                    
                        #ut-sitebody #header-section.ut-header-floating {
                            left: <?php echo $ut_site_border_size; ?>px;
                            width: calc(100% - <?php echo $ut_site_border_size * 2; ?>px);
                        }
                    
                    <?php endif; ?>
                    
                    <?php if( ut_return_header_config( 'ut_site_top_header_flush', 'no' ) == 'yes' ) : ?>
                    
                        #ut-sitebody #ut-top-header:not(.ut-top-header-centered) .ut-header-inner {
                            padding-left: 0;
                            padding-right: 0;    
                        }

                        #header-section #ut-top-header-right.ut-company-social ul li.ut-top-header-border-separator:first-child {
                            padding-right: 20px;
                        }

                    <?php endif; ?>
                    
                <?php endif;
        
                /* 
                 * frame right only with top header flush
                 */
        
                if( !$left && $right ) : ?>
                    
                    <?php if( ut_return_header_config('ut_navigation_scroll_position' , 'floating') == 'floating' ) : ?>
                    
                        #ut-sitebody #header-section.ut-header-floating {
                            width: calc(100% - <?php echo $ut_site_border_size; ?>px);
                        }
                    
                    <?php endif; ?>
                    
                    <?php if( ut_return_header_config( 'ut_site_top_header_flush', 'no' ) == 'yes' ) : ?>
                    
                        #ut-sitebody #ut-top-header:not(.ut-top-header-centered) .ut-header-inner {
                            padding-right: 0;    
                        }

                        #header-section #ut-top-header-right.ut-company-social ul li.ut-top-header-border-separator:first-child {
                            padding-right: 20px;
                        }
                    
                    <?php endif; ?>
                    
                <?php endif;

                /* 
                 * frame left only with top header flush
                 */
        
                if( $left && !$right ) : ?>
                    
                    <?php if( ut_return_header_config('ut_navigation_scroll_position' , 'floating') == 'floating' ) : ?>
                    
                        #ut-sitebody #header-section.ut-header-floating {
                            left: <?php echo $ut_site_border_size; ?>px;
                            width: calc(100% - <?php echo $ut_site_border_size; ?>px);
                        }
                    
                    <?php endif; ?>
                    
                    <?php if( ut_return_header_config( 'ut_site_top_header_flush', 'no' ) == 'yes' ) : ?>
                    
                        #ut-sitebody.ut-site-border #ut-top-header:not(.ut-top-header-centered) .ut-header-inner {
                            padding-left:0;    
                        }
                    
                    <?php endif; ?>
                    
                <?php endif; ?>

                    
                <?php 

                // page has no content - so we need to divide the border height from top ( only when set )
                if( $post && empty( $post->post_content ) && ut_page_option( 'ut_footerarea', 'on' ) == 'off' && ut_return_csection_config('ut_activate_csection', 'on') == 'off' && isset( $status['margin-top'] ) && $status['margin-top'] == 'on' ) {

                    echo 'html { height: calc(100% - ' , $ut_site_border_size , 'px); min-height: calc(100% - ' , $ut_site_border_size , 'px); }';

                } ?>
                
                    
                <?php     
                
                // Coloring
                if( isset( $this->ID ) && get_post_meta( $this->ID, 'ut_page_site_border', true ) == 'global' ) {
        
                    $ut_site_border_color = ot_get_option( 'ut_site_border_color', '#FFF' );    
                    
                } else {
                    
                    $ut_site_border_color = ut_page_option( 'ut_site_border_color', '#FFF' );
                    
                } ?>

                /* html border */
                html { background: <?php echo $ut_site_border_color; ?>; }

                .ut-site-border-top-part { 
                    position: relative;
                    z-index: 10001;
                    background: <?php echo $ut_site_border_color;?>; 
                    height: <?php echo $ut_site_border_size; ?>px;
                    min-height: <?php echo $ut_site_border_size; ?>px;
                }

                .ut-site-border-bottom-part { 
                    background: <?php echo $ut_site_border_color;?>; 
                    display: block; 
                    height: <?php echo $ut_site_border_size; ?>px; 
                }

                #ut-sitebody.ut-header-display-on-hero.ut-site-border-top #header-section.ut-header-fixed.ha-transparent {
                    position:absolute;
                    top:<?php echo $ut_site_border_size; ?>px;
                }

                <?php if( ut_return_header_config( 'ut_header_layout', 'default' ) == 'side' ) : ?>

                    body { background: <?php echo $ut_site_border_color; ?>; }

                <?php endif; ?>                

                .ut-site-border .vc_section[data-vc-stretch-content="true"] {
                    padding-left: <?php if( $left ) : ?><?php echo $ut_site_border_size; ?>px<?php else: ?>0<?php endif; ?>;
                    padding-right: <?php if( $right ) : ?><?php echo $ut_site_border_size; ?>px<?php else: ?>0<?php endif; ?>;
                }

                .ut-site-border .vc_row:not(.vc_inner),
                .ut-site-border .vc_section[data-vc-stretch-content="true"] .vc_row {
                    padding-left: <?php if( $left ) : ?><?php echo $ut_site_border_size; ?>px<?php else: ?>0<?php endif; ?>;
                    padding-right: <?php if( $right ) : ?><?php echo $ut_site_border_size; ?>px<?php else: ?>0<?php endif; ?>;
                }

                .ut-site-border .vc_row[data-vc-stretch-content="true"] {
                    padding-left: <?php if( $left ) : ?><?php echo $ut_site_border_size + 20; ?>px<?php else: ?>0<?php endif; ?>;
                    padding-right: <?php if( $right ) : ?><?php echo $ut_site_border_size + 20; ?>px<?php else: ?>0<?php endif; ?>;
                }

                .ut-site-border .vc_row[data-vc-stretch-content="true"].ut-row-has-filled-cols {
                    padding-left: <?php if( $left ) : ?><?php echo $ut_site_border_size + 40; ?>px<?php else: ?>0<?php endif; ?>;
                    padding-right: <?php if( $right ) : ?><?php echo $ut_site_border_size + 40; ?>px<?php else: ?>0<?php endif; ?>;
                }    

                .ut-site-border .vc_row.vc_row-no-padding[data-vc-stretch-content="true"] {
                    padding-left: <?php if( $left ) : ?><?php echo $ut_site_border_size; ?>px<?php else: ?>0<?php endif; ?>;
                    padding-right: <?php if( $right ) : ?><?php echo $ut_site_border_size; ?>px<?php else: ?>0<?php endif; ?>;
                }
                    
                <?php
        
                foreach( $vc_gap as $key => $gap ) {

                    if( $gap == 0 ) {
                        continue;
                    }

                    echo '
                    .ut-site-border .vc_row[data-vc-stretch-content="true"].ut-row-has-filled-cols.vc_column-gap-' , $gap , ' {
                        padding-left: ' , ( $left ? $ut_site_border_size + 40 - ( $gap / 2 ) : 40 - ( $gap / 2 ) ) , 'px;
                        padding-right: ' , ( $right ? $ut_site_border_size + 40 - ( $gap / 2 ) : 40 - ( $gap / 2 ) ) , 'px;
                    }' , "\n";

                }

                foreach( $vc_gap as $key => $gap ) {

                    if( $gap == 0 ) {
                        continue;
                    }

                    echo '
                    .ut-site-border .vc_row[data-vc-stretch-content="true"]:not(.ut-row-has-filled-cols).vc_column-gap-' , $gap , ' {
                        padding-left: ' , ( $left ? $ut_site_border_size + 40 - ( $gap / 2 ) : 40 - ( $gap / 2 ) ) , 'px;
                        padding-right: ' , ( $right ? $ut_site_border_size + 40 - ( $gap / 2 ) : 40 - ( $gap / 2 ) ) , 'px;
                    }' , "\n";

                } ?>
                    
            }

            @media (max-width: 1024px) {

                #header-section {
                    top: 0 !important;
                }    

            }

            <?php endif; ?>

            <?php if( ot_get_option('ut_site_border_body_color' ) ) { ?>

                <?php if( ut_return_header_config( 'ut_header_layout', 'default' ) == 'side' ) : ?>

                    #main-content { background: <?php echo ot_get_option('ut_site_border_body_color' ); ?>; }

                <?php else : ?>

                    body, #main-content { background: <?php echo ot_get_option('ut_site_border_body_color' ); ?>; }

                <?php endif; ?>


            <?php } ?>                


            <?php 

            // Border Settings Header if there is a top frame
            if( apply_filters( 'ut_show_siteframe', 'hide' ) == 'show' ) : ?>

                <?php 
                
                // Default Skins
                if( ut_return_header_config( 'ut_navigation_skin' , 'ut-header-light' ) != 'ut-header-custom' && ut_return_header_config('ut_navigation_state' , 'off') != 'off' && ( ut_return_header_config('ut_navigation_scroll_position' , 'floating') == 'floating' || ut_return_header_config('ut_navigation_scroll_position' , 'floating') == 'fixed' && ut_return_header_config( 'ut_navigation_on_hero', 'off' ) == 'on' ) ) : ?>

                    @media (min-width: 1025px) {

                        #ut-sitebody.ut-site-border-top #header-section.ut-header-floating,
                        #ut-sitebody.ut-site-border-top.has-hero #header-section.ut-header-fixed {
                            border-top: <?php echo $ut_site_border_size; ?>px solid <?php echo $ut_site_border_color; ?>; 
                        }

                    }

                <?php endif; ?>

                <?php 
        
                // Custom Skin
                if( ut_return_header_config( 'ut_navigation_skin' , 'ut-header-light' ) == 'ut-header-custom' && ut_return_header_config('ut_navigation_customskin_state', 'off') != 'off' && ( ut_return_header_config('ut_navigation_scroll_position' , 'floating') == 'floating' || ut_return_header_config('ut_navigation_scroll_position' , 'floating') == 'fixed' && ut_return_header_config( 'ut_navigation_on_hero', 'off' ) == 'on' ) ) : ?>

                    @media (min-width: 1025px) {

                        #ut-sitebody.ut-site-border-top #header-section.ut-header-floating,
                        #ut-sitebody.ut-site-border-top.has-hero #header-section.ut-header-fixed {
                            border-top: <?php echo $ut_site_border_size; ?>px solid <?php echo $ut_site_border_color; ?>;
                        }

                    }

                <?php endif; ?>

            <?php endif; ?>
                
            </style>

        <?php
			
        echo $this->minify_css( ob_get_clean() );
        
    }

}

/**
 * Top Header Custom CSS
 *
 * @access    public
 * @support   transient
 */

if( !class_exists( 'UT_Top_Header_CSS' ) ) {	
    
    class UT_Top_Header_CSS extends UT_Custom_CSS {
        
        public function custom_css() {
            
            ob_start(); ?>

            <style id="ut-top-header-css" type="text/css">
                    
                <?php if( ut_page_option('ut_top_header', 'hide') == 'show' ) : ?>
                    
                    <?php 

                    /*
                     * Header and Navigation Light Skins
                     */    

                    if( ut_return_header_config( 'ut_navigation_skin' , 'ut-header-light' ) == 'ut-header-light' ) : ?>
                        
                        
                
                    <?php endif; ?>
                
                    <?php 
                    
                    /* top header background */
                    $ut_top_header_background_color = ut_return_header_config( 'ut_top_header_background_color' );

                    if( $ut_top_header_background_color ) :

                        if( $ut_top_header_background_color && $this->is_gradient( $ut_top_header_background_color ) ) :

                            echo $this->create_gradient_css( $ut_top_header_background_color, '#header-section #ut-top-header', false, 'background' );

                        else : ?>

                        #ut-top-header,
                        #header-section #ut-top-header {
                            background: <?php echo $ut_top_header_background_color; ?> !important;
                        }

                        <?php endif; ?>
                
                    <?php endif; ?>


                    <?php

                   /* top header alternate background */
                    $ut_top_header_secondary_background_color = ut_return_header_config( 'ut_top_header_secondary_background_color' );

                        if( $ut_top_header_secondary_background_color ) :

                            if( $ut_top_header_secondary_background_color && $this->is_gradient( $ut_top_header_secondary_background_color ) ) :

                                echo $this->create_gradient_css( $ut_top_header_secondary_background_color, '#header-section.ut-secondary-custom-skin #ut-top-header', false, 'background' );

                            else : ?>

                            #header-section.ut-secondary-custom-skin #ut-top-header {
                                background: <?php echo $ut_top_header_secondary_background_color; ?> !important;
                            }

                        <?php endif; ?>

                    <?php endif; ?>
                
                    <?php 
                    
                    /* top header text color */
                    if( ut_return_header_config( 'ut_top_header_text_color' ) ) : ?>
                            
                        #header-section #ut-top-header { 
                            color: <?php echo ut_return_header_config( 'ut_top_header_text_color' ); ?> !important; 
                        }
                
                    <?php endif; ?>
                
                    <?php 
            
                    /* top header secondary text color */    
                    if( ut_return_header_config( 'ut_top_header_secondary_text_color' ) ) : ?>
                            
                        #header-section.ut-secondary-custom-skin #ut-top-header { 
                            color: <?php echo ut_return_header_config( 'ut_top_header_secondary_text_color' ); ?> !important; 
                        }
                
                    <?php endif; ?>
                    
                    <?php if( ut_return_header_config( 'ut_top_header_border_bottom', 'off' ) == 'on' ) : ?>
            
                        <?php

                        // top header border bottom
                        $ut_top_header_border_bottom_style = ut_return_header_config( 'ut_top_header_border_bottom_style' );

                        if( !empty( $ut_top_header_border_bottom_style['border-bottom-style'] ) && $ut_top_header_border_bottom_style['border-bottom-style'] != 'none' ) : 
                            
                            $css = implode(';', array_map( function ($v, $k) { 

                                $v = $k == 'border-bottom-width' ? $v . 'px' : $v;

                                return $k . ':' . $v; 

                                }, $ut_top_header_border_bottom_style, array_keys($ut_top_header_border_bottom_style) ) ); ?>

                            #header-section #ut-top-header {
                                <?php echo $css; ?>					
                            }	 
                
                        <?php endif; ?>
                        
                        <?php if( ut_return_header_config( 'ut_top_header_secondary_border_color' ) ) : ?>
                            
                            #header-section.ut-secondary-custom-skin #ut-top-header {
                                border-color: <?php echo ut_return_header_config( 'ut_top_header_secondary_border_color' ); ?> !important;     				
                            }
                
                        <?php endif; ?>                
                
                    <?php endif; ?>
                
                    <?php if( ut_return_header_config( 'ut_top_header_icon_color' ) ) : ?>	
                        
                        /* Top Header Icon Color */
                        #ut-top-header i,
                        #ut-top-header a i {
                            color: <?php echo ut_return_header_config( 'ut_top_header_icon_color' ); ?> !important; 
                        }
                
                    <?php endif; ?>
                
                    <?php if( ut_return_header_config( 'ut_top_header_secondary_icon_color' ) ) : ?>	
                        
                        /* Top Header Secondary Icon Color */
                        #header-section.ut-secondary-custom-skin #ut-top-header i,
                        #header-section.ut-secondary-custom-skin #ut-top-header a i {
                            color: <?php echo ut_return_header_config( 'ut_top_header_secondary_icon_color' ); ?> !important; 
                        }
                
                    <?php endif; ?>
                
                    <?php if( ut_return_header_config( 'ut_top_header_link_color' ) ) : ?>
                        
                        /* Top Header Link Colors */
                        #ut-top-header a {
                            color: <?php echo ut_return_header_config( 'ut_top_header_link_color' ); ?> !important;
                        }
                    
                    <?php endif; ?>
                
                    <?php if( ut_return_header_config( 'ut_top_header_secondary_link_color' ) ) : ?>
                        
                        /* Top Header Link Colors */
                        #header-section.ut-secondary-custom-skin #ut-top-header a {
                            color: <?php echo ut_return_header_config( 'ut_top_header_secondary_link_color' ); ?> !important;
                        }
                    
                    <?php endif; ?>
                
                    <?php if( ut_return_header_config( 'ut_top_header_link_color_hover' ) ) : ?>    
                        
                        #ut-top-header a:hover,
                        #ut-top-header a:active {
                            color: <?php echo ut_return_header_config( 'ut_top_header_link_color_hover' ); ?> !important;
                        }
                
                        #ut-top-header .ut-top-header-has-submenu:hover .ut-top-header-main-link {
                            color: <?php echo ut_return_header_config( 'ut_top_header_link_color_hover' ); ?> !important;
                        }
                
                        #ut-top-header .ut-top-header-has-submenu:hover .ut-header-cart i {
                            color: <?php echo ut_return_header_config( 'ut_top_header_link_color_hover' ); ?> !important;
                        }
                
                
                    <?php endif; ?>
                
                    <?php if( ut_return_header_config( 'ut_top_header_secondary_link_color_hover' ) ) : ?>    
                        
                        #header-section.ut-secondary-custom-skin #ut-top-header a:hover,
                        #header-section.ut-secondary-custom-skin #ut-top-header a:active {
                            color: <?php echo ut_return_header_config( 'ut_top_header_secondary_link_color_hover' ); ?> !important;
                        }
                
                        #header-section.ut-secondary-custom-skin #ut-top-header .ut-top-header-has-submenu:hover .ut-top-header-main-link {
                            color: <?php echo ut_return_header_config( 'ut_top_header_secondary_link_color_hover' ); ?> !important;
                        }
                
                        #header-section.ut-secondary-custom-skin #ut-top-header .ut-top-header-has-submenu:hover .ut-header-cart i {
                            color: <?php echo ut_return_header_config( 'ut_top_header_secondary_link_color_hover' ); ?> !important;
                        }
                
                    <?php endif; ?>
                
                    <?php if( ut_return_header_config( 'ut_top_header_social_icon_color' ) ) : ?> 
                        
                        #ut-top-header .ut-company-social a,
                        #ut-top-header .ut-company-social a i {
                            color: <?php echo ut_return_header_config( 'ut_top_header_social_icon_color' ); ?> !important;
                        }
                
                    <?php endif; ?>
                    
                    <?php if( ut_return_header_config( 'ut_top_header_secondary_social_icon_color' ) ) : ?> 
                        
                        #header-section.ut-secondary-custom-skin #ut-top-header .ut-company-social a,
                        #header-section.ut-secondary-custom-skin #ut-top-header .ut-company-social a i {
                            color: <?php echo ut_return_header_config( 'ut_top_header_secondary_social_icon_color' ); ?> !important;
                        }
                
                    <?php endif; ?>
                
                    <?php if( ut_return_header_config( 'ut_top_header_social_icon_color_hover' ) ) : ?>
                        
                        #ut-top-header .ut-company-social a:hover, 
                        #ut-top-header .ut-company-social a:active,
                        #ut-top-header .ut-company-social a:hover i, 
                        #ut-top-header .ut-company-social a:active i {
                            color: <?php echo ut_return_header_config( 'ut_top_header_social_icon_color_hover' ); ?> !important;
                        }
                
                    <?php endif; ?>
                
                    <?php if( ut_return_header_config( 'ut_top_header_secondary_social_icon_color_hover' ) ) : ?>
                        
                        #header-section.ut-secondary-custom-skin #ut-top-header .ut-company-social a:hover, 
                        #header-section.ut-secondary-custom-skin #ut-top-header .ut-company-social a:active,
                        #header-section.ut-secondary-custom-skin #ut-top-header .ut-company-social a:hover i, 
                        #header-section.ut-secondary-custom-skin #ut-top-header .ut-company-social a:active i {
                            color: <?php echo ut_return_header_config( 'ut_top_header_secondary_social_icon_color_hover' ); ?> !important;
                        }
                
                    <?php endif; ?>
                    
                    <?php if( ut_return_header_config( 'ut_top_header_search_icon_color' ) ) : ?> 
                        
                        #ut-top-header .ut-top-header-search-trigger i {
                            color: <?php echo ut_return_header_config( 'ut_top_header_search_icon_color' ); ?> !important;
                        }
                    
                    <?php endif; ?>
                
                    <?php if( ut_return_header_config( 'ut_top_header_secondary_search_icon_color' ) ) : ?> 
                        
                        #header-section.ut-secondary-custom-skin #ut-top-header .ut-top-header-search-trigger i {
                            color: <?php echo ut_return_header_config( 'ut_top_header_secondary_search_icon_color' ); ?> !important;
                        }
                    
                    <?php endif; ?>
                
                    <?php if( ut_return_header_config( 'ut_top_header_search_icon_color_hover' ) ) : ?>
                    
                        #ut-top-header .ut-top-header-search-trigger:hover i,
                        #ut-top-header .ut-top-header-search-trigger:active i {
                            color: <?php echo ut_return_header_config( 'ut_top_header_search_icon_color_hover' ); ?> !important;
                        }
                    
                    <?php endif; ?>
                
                    <?php if( ut_return_header_config( 'ut_top_header_secondary_search_icon_color_hover' ) ) : ?>
                    
                        #header-section.ut-secondary-custom-skin #ut-top-header .ut-top-header-search-trigger:hover i,
                        #header-section.ut-secondary-custom-skin #ut-top-header .ut-top-header-search-trigger:active i {
                            color: <?php echo ut_return_header_config( 'ut_top_header_secondary_search_icon_color_hover' ); ?> !important;
                        }
                    
                    <?php endif; ?>
                    
                    /* top header submenu border top */
                    <?php if( ut_return_header_config( 'ut_top_header_submenu_border', 'off' ) == 'on' ) : ?>
                
                        #header-section #ut-top-header .ut-top-header-sub-menu ul {                            
                            border-top-width: <?php echo ut_return_header_config( 'ut_top_header_submenu_border_top_width', 2 ); ?>px !important;
                            border-top-style: solid;
                            <?php if( ut_return_header_config( 'ut_top_header_submenu_border_top_color' ) ) : ?>
                            border-top-color: <?php echo ut_return_header_config( 'ut_top_header_submenu_border_top_color' ); ?> !important;
                            <?php endif; ?>                            
                        }
                
                    <?php endif; ?>
                
                    /* top header submenu background */ 
                    <?php if( ut_return_header_config( 'ut_top_header_submenu_background' ) ) : ?>
                
                        #header-section #ut-top-header .ut-top-header-sub-menu ul { 
                            background: <?php echo ut_return_header_config( 'ut_top_header_submenu_background', ut_return_header_config( 'ut_top_header_background_color' ) ); ?> !important; 
                        }
                
                        #header-section #ut-top-header .ut-top-header-sub-menu ul:after,
                        #header-section #ut-top-header .ut-top-header-sub-menu ul:before {
                            display: none;
                        }
                
                    <?php endif; ?>
                                    
                    <?php if( ut_return_header_config( 'ut_top_header_submenu_link_color' ) ) : ?>
                        
                        #header-section #ut-top-header .ut-top-header-sub-menu {
                            color: <?php echo ut_return_header_config( 'ut_top_header_submenu_link_color' ); ?>;
                        }
                
                        #header-section #ut-top-header .ut-top-header-sub-menu .ut-top-header-submenu-link,
                        #header-section #ut-top-header .ut-top-header-sub-menu .ut-header-mini-cart-link {
                            color: <?php echo ut_return_header_config( 'ut_top_header_submenu_link_color' ); ?> !important;
                        }
                
                    <?php endif; ?>                
                
                    <?php if( ut_return_header_config( 'ut_top_header_submenu_link_color_hover' ) ) : ?>
                        
                        #header-section #ut-top-header .ut-top-header-sub-menu .ut-top-header-submenu-link:hover,
                        #header-section #ut-top-header .ut-top-header-sub-menu .ut-top-header-submenu-link:active,
                        #header-section #ut-top-header .ut-top-header-sub-menu .ut-header-mini-cart-link:hover,
                        #header-section #ut-top-header .ut-top-header-sub-menu .ut-header-mini-cart-link:active {
                            color: <?php echo ut_return_header_config( 'ut_top_header_submenu_link_color_hover' ); ?> !important;
                        }
                
                    <?php endif; ?>
                
                    <?php if( ut_return_header_config( 'ut_top_header_submenu_link_color_active' ) ) : ?>
                        
                        #header-section #ut-top-header .ut-top-header-sub-menu ul li.current_page_item > a, 
                        #header-section #ut-top-header .ut-top-header-sub-menu ul li.current-menu-item > a, 
                        #header-section #ut-top-header .ut-top-header-sub-menu ul li.current_page_ancestor > a, 
                        #header-section #ut-top-header .ut-top-header-sub-menu ul li.current-menu-ancestor > a {
                            color:<?php echo $this->rgba_to_rgb(  ut_return_header_config( 'ut_top_header_submenu_link_color_active' ) ); ?> !important;
                            color:<?php echo ut_return_header_config( 'ut_top_header_submenu_link_color_active' ); ?> !important;
                        }                
                
                    <?php endif; ?>
                
                    /* top header shopping cart */
                    #header-section #ut-top-header .ut-header-cart-count {
                        color: <?php echo ut_return_header_config( 'ut_top_header_shopping_cart_count_color', '#FFFFFF' ); ?>;
                        background: <?php echo ut_return_header_config( 'ut_top_header_shopping_cart_count_background', $this->accent ); ?>;
                    }
                
                    #header-section #ut-top-header .ut-header-mini-cart-content .simplebar-scrollbar:before {
                        background: <?php echo ut_return_header_config( 'ut_top_header_shopping_cart_scrollbar', $this->accent ); ?>;
                    }
                    
                    <?php if( ut_return_header_config( 'ut_top_header_shopping_cart_item_delete_color' ) ) : ?>
                
                        #header-section #ut-top-header .ut-header-mini-cart-content .ut-remove-header-cart-item,
                        #header-section #ut-top-header .ut-header-mini-cart-content .ut-remove-header-cart-item .fa {
                            color: <?php echo ut_return_header_config( 'ut_top_header_shopping_cart_item_delete_color' ); ?> !important;
                        }
                
                    <?php endif; ?>
                    
                    <?php if( ut_return_header_config( 'ut_top_header_shopping_cart_item_delete_hover_color' ) ) : ?>
                
                        #header-section #ut-top-header .ut-header-mini-cart-content .ut-remove-header-cart-item:hover,
                        #header-section #ut-top-header .ut-header-mini-cart-content .ut-remove-header-cart-item:active,
                        #header-section #ut-top-header .ut-header-mini-cart-content .ut-remove-header-cart-item:hover .fa,
                        #header-section #ut-top-header .ut-header-mini-cart-content .ut-remove-header-cart-item:active .fa {
                            color: <?php echo ut_return_header_config( 'ut_top_header_shopping_cart_item_delete_hover_color' ); ?> !important;
                        }
                    
                    <?php endif; ?>
                
                    <?php if( ut_return_header_config( 'ut_top_header_shopping_cart_summary_background', '') ) : ?>
                
                        #header-section #ut-top-header .ut-header-mini-cart .ut-header-mini-cart-action {
                            background: <?php echo ut_return_header_config( 'ut_top_header_shopping_cart_summary_background', ''); ?>;
                            margin-top: 20px !important;
                        }
                
                    <?php endif; ?>
                    
                    <?php 
            
                    // Mini Shopping Cart Item Separator
                    $ut_top_header_shopping_cart_item_separator = ut_return_header_config( 'ut_top_header_shopping_cart_item_separator' ); 
            
                    if( isset( $ut_top_header_shopping_cart_item_separator['border-bottom-style'] ) && $ut_top_header_shopping_cart_item_separator['border-bottom-style'] != 'none' ) : 
            
                        $ut_top_header_shopping_cart_item_separator['border-bottom-style'] = empty( $ut_top_header_shopping_cart_item_separator['border-bottom-style'] ) ? 'solid' : $ut_top_header_shopping_cart_item_separator['border-bottom-style']; 
            
                        $css = implode(';', array_map( function ($v, $k) { 

                            $v = $k == 'border-bottom-width' ? $v . 'px' : $v;

                            return $k . ':' . $v . ' !important'; 

                            }, $ut_top_header_shopping_cart_item_separator, array_keys( $ut_top_header_shopping_cart_item_separator ) ) ); ?>
                        
                        #header-section #ut-top-header .ut-header-mini-cart .ut-header-mini-cart-item {
                            <?php echo $css; ?>;
                            padding-bottom: 20px;
                        }
                        
                        #header-section #ut-top-header .ut-header-mini-cart .ut-header-mini-cart-content + .ut-header-mini-cart-action {
                            margin-top: 0 !important;
                        }
                        
                        #header-section #ut-top-header .ut-header-mini-cart .ut-header-mini-cart-overflow-container {
                            margin-bottom: 17px !important;
                        }
                
                
                    <?php endif; ?>                
                
                    <?php if( ut_return_header_config( 'ut_top_header_shopping_cart_item_total_count') ) : ?>
                
                        #header-section #ut-top-header .ut-header-mini-cart .ut-header-mini-cart-total-count {
                            color: <?php echo ut_return_header_config( 'ut_top_header_shopping_cart_item_total_count' ); ?>;
                        }
                
                    <?php endif; ?>
                
                    <?php if( ut_return_header_config( 'ut_top_header_shopping_cart_item_total_price') ) : ?>
                
                        #header-section #ut-top-header .ut-header-mini-cart .ut-header-mini-cart-total-price {
                            color: <?php echo ut_return_header_config( 'ut_top_header_shopping_cart_item_total_price' ); ?>;
                        }    
                    
                    <?php endif; ?>
                
                
                    <?php if( ut_return_header_config( 'ut_top_header_border_separator', 'off' ) == 'on' ) : 
            
                       $ut_top_header_border_separator_style = ut_return_header_config( 'ut_top_header_border_separator_style' );
            
					   if( isset( $ut_top_header_border_separator_style['border-right-style'] ) && $ut_top_header_border_separator_style['border-right-style'] != 'none' ) : 
                            
                            $ut_top_header_border_separator_style['border-right-style'] = empty( $ut_top_header_border_separator_style['border-right-style'] ) ? 'solid' : $ut_top_header_border_separator_style['border-right-style']; ?>

                           <?php $css = implode(';', array_map( function ($v, $k) { 

                                $v = $k == 'border-right-width' ? $v . 'px' : $v;

                                return $k . ':' . $v . '!important'; 

                                }, $ut_top_header_border_separator_style, array_keys( $ut_top_header_border_separator_style ) ) ); ?>
     
                            #ut-top-header #ut-top-header-right .ut-top-header-border-separator,    
                            #ut-top-header #ut-top-header-left .ut-top-header-border-separator {
                                <?php echo $css; ?>	
                            }
                    
                            <?php if( ut_return_header_config( 'ut_top_header_secondary_border_color' ) ) : ?>
                            
                                #header-section.ut-secondary-custom-skin #ut-top-header #ut-top-header-right .ut-top-header-border-separator,    
                                #header-section.ut-secondary-custom-skin #ut-top-header #ut-top-header-left .ut-top-header-border-separator {
                                    border-color: <?php echo ut_return_header_config( 'ut_top_header_secondary_border_color' ); ?> !important;     				
                                }

                            <?php endif; ?>        
                
                        <?php endif; ?> 
                
                    <?php endif; ?>                
                
                <?php endif; ?>
                
                
                <?php 
                
                /*
                 * Header and Navigation Default Skins
                 */    
                
                if( ut_return_header_config( 'ut_navigation_skin' , 'ut-header-light' ) != 'ut-header-custom' ) : ?>    
            
                    .ut-header-mini-cart-content .simplebar-scrollbar:before {
                        background: <?php echo $this->accent; ?>;
                    }

                    .ut-header-cart-count {
                        color: #FFFFFF;
                        background: <?php echo $this->accent; ?>;
                    }
                
                <?php endif; ?>
                
                
                <?php 
            
                /*
                 * Header and Navigation Custom Skins
                 */
            
                ?>            
                
                    /* 
                     * Header Primary Skin Cart
                     */
                
                    #ut-sitebody #header-section .ut-header-extra-module .ut-header-cart-count {
                        color: <?php echo ut_return_header_config( 'ut_navigation_ps_shopping_cart_count_color', '#FFFFFF' ); ?>;
                        background: <?php echo ut_return_header_config( 'ut_navigation_ps_shopping_cart_count_background', $this->accent ); ?>;
                    }

                    <?php if( ut_return_header_config( 'ut_navigation_ps_shopping_cart_summary_background' ) ) : ?>

                        #ut-sitebody #header-section .ut-header-extra-module .ut-header-mini-cart .ut-header-mini-cart-action {
                            background: <?php echo ut_return_header_config( 'ut_navigation_ps_shopping_cart_summary_background' ); ?>;
                            margin-top: 20px !important;
                        }

                    <?php endif; ?>

                    <?php 

                    /*
                     * Mini Shopping Cart Item Separator
                     */
            
                    $ut_navigation_ps_shopping_cart_item_separator = ut_return_header_config( 'ut_navigation_ps_shopping_cart_item_separator' ); 

                    if( isset( $ut_navigation_ps_shopping_cart_item_separator['border-bottom-style'] ) && $ut_navigation_ps_shopping_cart_item_separator['border-bottom-style'] != 'none' ) : 

                        $ut_navigation_ps_shopping_cart_item_separator['border-bottom-style'] = empty( $ut_navigation_ps_shopping_cart_item_separator['border-bottom-style'] ) ? 'solid' : $ut_navigation_ps_shopping_cart_item_separator['border-bottom-style']; 
            
                        $css = implode(';', array_map( function ($v, $k) { 

                            $v = $k == 'border-bottom-width' ? $v . 'px' : $v;

                            return $k . ':' . $v; 

                            }, $ut_navigation_ps_shopping_cart_item_separator, array_keys( $ut_navigation_ps_shopping_cart_item_separator ) ) ); ?>

                        #ut-sitebody #header-section .ut-header-extra-module .ut-header-mini-cart .ut-header-mini-cart-item:not(.ut-header-mini-cart-item-empty) {
                            <?php echo $css; ?>;                            
                        }
                    
                        #ut-sitebody .ut-horizontal-navigation ul.sub-menu li.ut-header-mini-cart-item {
                            padding-bottom: 20px;
                        }                
                
                        #ut-sitebody #header-section .ut-header-extra-module .ut-header-mini-cart .ut-header-mini-cart-content + .ut-header-mini-cart-action {
                            margin-top: 0 !important;
                        }
                        
                        <?php if( ut_return_header_config( 'ut_navigation_skin' , 'ut-header-light' ) != 'ut-header-custom' ) : ?>
                
                            #ut-sitebody #header-section .ut-header-extra-module .ut-header-mini-cart-overflow-container {
                                margin-bottom: 17px !important;
                            }
                
                        <?php else : ?>
                            
                            #ut-sitebody #header-section.ut-primary-custom-skin .ut-header-extra-module .ut-header-mini-cart-overflow-container {
                                margin-bottom: 17px !important;
                            } 
                
                        <?php endif; ?>
                
                    <?php endif; ?>                
                
                    <?php if( ut_return_header_config( 'ut_navigation_ps_shopping_cart_item_delete_color' ) ) : ?>
                
                        #ut-sitebody #header-section .ut-header-extra-module .ut-header-mini-cart .ut-remove-header-cart-item {
                            color: <?php echo ut_return_header_config( 'ut_navigation_ps_shopping_cart_item_delete_color' ); ?> !important;
                        }
                
                    <?php endif; ?>
                
                    <?php if( ut_return_header_config( 'ut_navigation_ps_shopping_cart_item_delete_hover_color' ) ) : ?>
                
                        #ut-sitebody #header-section .ut-header-extra-module .ut-header-mini-cart .ut-remove-header-cart-item:hover,
                        #ut-sitebody #header-section .ut-header-extra-module .ut-header-mini-cart .ut-remove-header-cart-item:active {
                            color: <?php echo ut_return_header_config( 'ut_navigation_ps_shopping_cart_item_delete_hover_color' ); ?> !important;
                        }
                
                    <?php endif; ?>
                
                    <?php if( ut_return_header_config( 'ut_navigation_ps_shopping_cart_item_total_count' ) ) : ?>    
                
                        #ut-sitebody #header-section .ut-header-extra-module .ut-header-mini-cart .ut-header-mini-cart-total-count {
                            color: <?php echo ut_return_header_config( 'ut_navigation_ps_shopping_cart_item_total_count' ); ?>;
                        }
                
                    <?php endif; ?>
                
                    <?php if( ut_return_header_config( 'ut_navigation_ps_shopping_cart_item_total_price' ) ) : ?>
                
                        #ut-sitebody #header-section .ut-header-extra-module .ut-header-mini-cart .ut-header-mini-cart-total-price {
                            color: <?php echo ut_return_header_config( 'ut_navigation_ps_shopping_cart_item_total_price' ); ?>;
                        }
                
                    <?php endif; ?>
                
                    #ut-sitebody #header-section .ut-header-extra-module .ut-header-mini-cart-content .simplebar-scrollbar:before {
                        background: <?php echo ut_return_header_config( 'ut_navigation_ps_shopping_cart_scrollbar', $this->accent ); ?>;
                    }
                
                    <?php if( ut_return_header_config( 'ut_navigation_skin' , 'ut-header-light' ) == 'ut-header-custom' && ut_return_header_config('ut_navigation_customskin_state' , 'off') == 'on_switch' ) : ?>
                
                    /* 
                     * Header Secondary Skin Cart
                     */
                
                    #ut-sitebody #header-section.ut-secondary-custom-skin .ut-header-extra-module .ut-header-cart-count {
                        color: <?php echo ut_return_header_config( 'ut_navigation_ss_shopping_cart_count_color', '#FFFFFF' ); ?>;
                        background: <?php echo ut_return_header_config( 'ut_navigation_ss_shopping_cart_count_background', $this->accent ); ?>;
                    }

                    <?php if( ut_return_header_config( 'ut_navigation_ss_shopping_cart_summary_background') ) : ?>

                        #ut-sitebody #header-section.ut-secondary-custom-skin .ut-header-extra-module .ut-header-mini-cart .ut-header-mini-cart-action {
                            background: <?php echo ut_return_header_config( 'ut_navigation_ss_shopping_cart_summary_background' ); ?>;
                            margin-top: 20px !important;
                        }

                    <?php endif; ?>

                    <?php 

                    /*
                     * Mini Shopping Cart Item Separator
                     */
            
                    $ut_navigation_ss_shopping_cart_item_separator = ut_return_header_config( 'ut_navigation_ss_shopping_cart_item_separator' ); 

                    if( isset( $ut_navigation_ss_shopping_cart_item_separator['border-bottom-style'] ) && $ut_navigation_ss_shopping_cart_item_separator['border-bottom-style'] != 'none' ) : 

                        $ut_navigation_ss_shopping_cart_item_separator['border-bottom-style'] = empty( $ut_navigation_ss_shopping_cart_item_separator['border-bottom-style'] ) ? 'solid' : $ut_navigation_ss_shopping_cart_item_separator['border-bottom-style'];
            
                        $css = implode(';', array_map( function ($v, $k) { 

                            $v = $k == 'border-bottom-width' ? $v . 'px' : $v;

                            return $k . ':' . $v; 

                            }, $ut_navigation_ss_shopping_cart_item_separator, array_keys( $ut_navigation_ss_shopping_cart_item_separator ) ) ); ?>

                        #ut-sitebody #header-section.ut-secondary-custom-skin .ut-header-extra-module .ut-header-mini-cart .ut-header-mini-cart-item:not(.ut-header-mini-cart-item-empty) {
                            <?php echo $css; ?>;
                        }
                
                        #ut-sitebody .ut-horizontal-navigation ul.sub-menu li.ut-header-mini-cart-item {
                            padding-bottom: 20px;
                        } 
                
                        #ut-sitebody #header-section.ut-secondary-custom-skin .ut-header-extra-module .ut-header-mini-cart .ut-header-mini-cart-content + .ut-header-mini-cart-action {
                            margin-top: 0 !important;
                        }
                        
                        #ut-sitebody #header-section.ut-secondary-custom-skin .ut-header-extra-module .ut-header-mini-cart-overflow-container {
                            margin-bottom: 17px !important;
                        } 
                
                    <?php endif; ?>                
                
                    <?php if( ut_return_header_config( 'ut_navigation_ss_shopping_cart_item_delete_color' ) ) : ?>
                
                        #ut-sitebody #header-section.ut-secondary-custom-skin .ut-header-extra-module .ut-header-mini-cart .ut-remove-header-cart-item {
                            color: <?php echo ut_return_header_config( 'ut_navigation_ss_shopping_cart_item_delete_color', ut_return_header_config( 'ut_navigation_ps_sl_color' ) ); ?>;
                        }
                
                    <?php endif; ?>
                
                    #ut-sitebody #header-section.ut-secondary-custom-skin .ut-header-extra-module .ut-header-mini-cart .ut-remove-header-cart-item:hover,
                    #ut-sitebody #header-section.ut-secondary-custom-skin .ut-header-extra-module .ut-header-mini-cart .ut-remove-header-cart-item:active {
                        color: <?php echo ut_return_header_config( 'ut_navigation_ss_shopping_cart_item_delete_hover_color', $this->accent ); ?> !important;
                    }
                    
                    <?php if( ut_return_header_config( 'ut_navigation_ss_shopping_cart_item_total_count' ) ) : ?>
                
                        #ut-sitebody #header-section.ut-secondary-custom-skin .ut-header-extra-module .ut-header-mini-cart .ut-header-mini-cart-total-count {
                            color: <?php echo ut_return_header_config( 'ut_navigation_ss_shopping_cart_item_total_count', ut_return_header_config( 'ut_navigation_ss_sl_color' ) ); ?>;
                        }
                
                    <?php endif; ?>
                
                    <?php if( ut_return_header_config( 'ut_navigation_ss_shopping_cart_item_total_price' ) ) : ?>
                
                        #ut-sitebody #header-section.ut-secondary-custom-skin .ut-header-extra-module .ut-header-mini-cart .ut-header-mini-cart-total-price {
                            color: <?php echo ut_return_header_config( 'ut_navigation_ss_shopping_cart_item_total_price', ut_return_header_config( 'ut_navigation_ss_sl_color' ) ); ?>;
                        }
                
                    <?php endif; ?>
                
                    #ut-sitebody #header-section.ut-secondary-custom-skin .ut-header-extra-module .ut-header-mini-cart-content .simplebar-scrollbar:before {
                        background: <?php echo ut_return_header_config( 'ut_navigation_ss_shopping_cart_scrollbar', $this->accent ); ?>;
                    }
                
               <?php endif; ?>
                
                #ut-sitebody #header-section .ut-header-mini-cart-no-content li.ut-header-mini-cart-item.ut-header-mini-cart-item-empty {
                    text-align: center;
                    border: none;
                }
                
                #ut-sitebody #header-section .ut-horizontal-navigation .ut-header-mini-cart-no-content li.ut-header-mini-cart-item.ut-header-mini-cart-item-empty:last-child {
                    padding-bottom: 40px;
                }
                
                #ut-sitebody #header-section .ut-header-mini-cart-no-content .ut-header-mini-cart-action {
                    display: none;
                }
                
            </style>

            <?php
			
            echo $this->minify_css( ob_get_clean() );
        
        }        
        
    }

}



/**
 * Woocommerce Custom CSS
 *
 * @access    public
 * @support   transient
 */

if( !class_exists( 'UT_WooCommerce_CSS' ) ) {	
    
    class UT_WooCommerce_CSS extends UT_Custom_CSS {
        
        public function custom_css() {
            
            ob_start(); ?>

            <style id="ut-woocommerce-css" type="text/css">
			    
                #place_order,
                .checkout-button,
                .single_add_to_cart_button,
                .woocommerce a.button.alt, 
                .woocommerce button.button.alt, 
                .woocommerce input.button.alt,
                .woocommerce #respond input#submit.alt {
                    background: <?php echo $this->accent; ?>;
                }
                
                #place_order:hover,
                #place_order:active,
                #place_order:focus,
                .checkout-button:hover,
                .checkout-button:active,
                .checkout-button:focus,
                .single_add_to_cart_button:hover,
                .single_add_to_cart_button:active,
                .single_add_to_cart_button:focus,
                .woocommerce a.button.alt:hover,
                .woocommerce a.button.alt:active,
                .woocommerce a.button.alt:focus,
                .woocommerce button.button.alt:hover,
                .woocommerce button.button.alt:active,
                .woocommerce button.button.alt:focus,
                .woocommerce input.button.alt:hover,
                .woocommerce input.button.alt:active,
                .woocommerce input.button.alt:focus,
                .woocommerce #respond input#submit.alt:hover,
                .woocommerce #respond input#submit.alt:active,
                .woocommerce #respond input#submit.alt:focus {
                    background: <?php echo $this->accent; ?>;
                    color: #FFF;
                }                
                
                .woocommerce-info {
                    border-color: <?php echo $this->accent; ?>;
                }
                
                .woocommerce-info::before {
                    color: <?php echo $this->accent; ?>;
                }
                
                .woocommerce span.onsale {
                    background: <?php echo $this->accent; ?>;
                }

                .woocommerce .widget_price_filter .ui-slider .ui-slider-range,
                .woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
                .woocommerce .widget_price_filter .ui-slider .ui-slider-handle {
                    background: <?php echo $this->accent; ?>;
                }
                
                .woocommerce #respond input#submit.alt.disabled, 
                .woocommerce #respond input#submit.alt.disabled:hover, 
                .woocommerce #respond input#submit.alt:disabled, 
                .woocommerce #respond input#submit.alt:disabled:hover, 
                .woocommerce #respond input#submit.alt:disabled[disabled], 
                .woocommerce #respond input#submit.alt:disabled[disabled]:hover, 
                .woocommerce a.button.alt.disabled, 
                .woocommerce a.button.alt.disabled:hover, 
                .woocommerce a.button.alt:disabled, 
                .woocommerce a.button.alt:disabled:hover, 
                .woocommerce a.button.alt:disabled[disabled],
                .woocommerce a.button.alt:disabled[disabled]:hover,
                .woocommerce button.button.alt.disabled,
                .woocommerce button.button.alt.disabled:hover,
                .woocommerce button.button.alt:disabled,
                .woocommerce button.button.alt:disabled:hover,
                .woocommerce button.button.alt:disabled[disabled],
                .woocommerce button.button.alt:disabled[disabled]:hover,
                .woocommerce input.button.alt.disabled,
                .woocommerce input.button.alt.disabled:hover,
                .woocommerce input.button.alt:disabled,
                .woocommerce input.button.alt:disabled:hover,
                .woocommerce input.button.alt:disabled[disabled],
                .woocommerce input.button.alt:disabled[disabled]:hover {
                    background: <?php echo $this->accent; ?>;
                }

                .woocommerce-message {
                    border-top-color: <?php echo $this->accent; ?>;
                }

                .woocommerce-message::before {
                    color: <?php echo $this->accent; ?>;
                }


            </style>
            
            <?php
			
            echo $this->minify_css( ob_get_clean() );
        
        }

    }

}


/**
 * Hero Animation
 *
 * @access    public
 * @support   transient
 */

if( !class_exists( 'UT_Hero_Animation_CSS' ) ) {	
    
    class UT_Hero_Animation_CSS extends UT_Custom_CSS {
        
        public function custom_css() {
			 
			// hero type
            $ut_hero_type      = ut_return_hero_config( 'ut_hero_type', 'image' );
            $ut_hero_type      = $ut_hero_type == 'dynamic' ? 'image' : $ut_hero_type;
            
            // brooklyn opposite effects
            $opposite_effects = array(
                'BrooklynFadeInLeft'         => 'BrooklynFadeInRight',
                'BrooklynFadeInRight'        => 'BrooklynFadeInLeft',
                'BrooklynFadeInUp'           => 'BrooklynFadeInDown',
                'BrooklynFadeInDown'         => 'BrooklynFadeInUp',
                'BrooklynFadeInDownShortCut' => 'BrooklynFadeInUpShortCut',
                'BrooklynFadeInUpShortCut'   => 'BrooklynFadeInDownShortCut',
                'BrooklynFadeInLeftShort'    => 'BrooklynFadeInRightShort',
                'BrooklynFadeInRightShort'   => 'BrooklynFadeInLeftShort'
            );
            
            ob_start(); ?>
            
            <style id="ut-hero-animation-css" type="text/css">
                
				<?php

				$start_opacity   = ot_get_option('ut_use_image_loader') == 'on' && ut_dynamic_conditional('ut_use_image_loader_on') ? '0.05' : '0';
                $animation_timer = ot_get_option('ut_use_image_loader') == 'on' && ut_dynamic_conditional('ut_use_image_loader_on') ? '0.01' : '0.2';

				if( apply_filters( 'ut_show_hero', false ) && ( $ut_hero_type == 'image' || $ut_hero_type == 'animatedimage' || $ut_hero_type == 'splithero' || $ut_hero_type == 'tabs' || $ut_hero_type == 'video' || $ut_hero_type == 'imagefader' || $ut_hero_type == 'slider' ) ) : ?>

                    <?php

                    if( ot_get_option('ut_use_image_loader') == 'on' && ut_dynamic_conditional('ut_use_image_loader_on') && ut_collect_option( 'ut_hero_image_animation_effect_timer', '1' ) == 1 ) {

                        $start_opacity   = 1;
                        $animation_timer = 0.01;

                    } ?>
                
					/* 1) # Animate Hero Overlay
					================================================== */
					#ut-sitebody:not(.ut-bklyn-site-with-preloader) #ut-hero .parallax-overlay {
						opacity: 0;
					}
					#ut-sitebody:not(.ut-bklyn-site-with-preloader) #ut-hero .parallax-overlay {
						-webkit-transition: opacity 0.20s linear;
						   -moz-transition: opacity 0.20s linear;
								transition: opacity 0.20s linear;
					}
                    
                    /* 2) # Animate Hero Parallax Overlay
					================================================== */
					#ut-sitebody.ut-hero-image-preloaded #ut-hero .parallax-overlay {
						opacity: 1;
					}
                                    
                    /* 3) # Animate Hero Image Containers
                    ================================================== */
                    #ut-sitebody:not(.ut-bklyn-site-with-preloader) #ut-hero .parallax-scroll-container {
                        visibility: hidden;
                    }

                    #ut-sitebody:not(.ut-bklyn-site-with-preloader).ut-hero-image-preloaded #ut-hero .parallax-scroll-container {
                        visibility: visible;
                    }

                    #ut-sitebody.ut-hero-image-preloaded #ut-hero .parallax-scroll-container {
                        -webkit-animation-fill-mode: both;
                                animation-fill-mode: both;
                        -webkit-animation: heroFadeIn <?php echo $animation_timer; ?>s linear;
                           -moz-animation: heroFadeIn <?php echo $animation_timer; ?>s linear;
                                animation: heroFadeIn <?php echo $animation_timer; ?>s linear;
                    }

                    @media(min-width: 768px) {               
                        
                        #ut-sitebody:not(.ut-bklyn-site-with-preloader) #ut-hero .parallax-image-container {
                            visibility: hidden;    
                        }

                        /* Extra CSS for Hero (increased size)*/
                        #ut-sitebody.ut-hero-image-preloaded #ut-hero.heroFadeInLeft .parallax-image-container,
                        #ut-sitebody.ut-hero-image-preloaded #ut-hero.heroFadeInRight .parallax-image-container,
                        #ut-sitebody.ut-bklyn-site-with-preloader #ut-hero.heroFadeInLeft .parallax-image-container,
                        #ut-sitebody.ut-bklyn-site-with-preloader #ut-hero.heroFadeInRight .parallax-image-container {
                            width: calc(100% + 400px);
                            position: relative;
                            left: -200px;
                        }

                        #ut-sitebody.ut-hero-image-preloaded #ut-hero.heroFadeInUp .parallax-image-container,
                        #ut-sitebody.ut-hero-image-preloaded #ut-hero.heroFadeInDown .parallax-image-container,
                        #ut-sitebody.ut-bklyn-site-with-preloader #ut-hero.heroFadeInUp .parallax-image-container,
                        #ut-sitebody.ut-bklyn-site-with-preloader #ut-hero.heroFadeInDown .parallax-image-container {
                            height: calc(100% + 400px);
                            position: relative;
                            top: -200px;
                        }

                        #ut-sitebody.ut-hero-image-preloaded #ut-hero.heroSlideInLeft .parallax-image-container,
                        #ut-sitebody.ut-hero-image-preloaded #ut-hero.heroSlideInRight .parallax-image-container,
                        #ut-sitebody.ut-bklyn-site-with-preloader #ut-hero.heroSlideInLeft .parallax-image-container,
                        #ut-sitebody.ut-bklyn-site-with-preloader #ut-hero.heroSlideInRight .parallax-image-container {
                            width: calc(100% + 400px);
                            position: relative;
                            left: -200px;
                        }

                        #ut-sitebody.ut-hero-image-preloaded #ut-hero.heroSlideInUp .parallax-image-container,
                        #ut-sitebody.ut-hero-image-preloaded #ut-hero.heroSlideInDown .parallax-image-container,
                        #ut-sitebody.ut-bklyn-site-with-preloader #ut-hero.heroSlideInUp .parallax-image-container,
                        #ut-sitebody.ut-bklyn-site-with-preloader #ut-hero.heroSlideInDown .parallax-image-container {
                            height: calc(100% + 400px);
                            position: relative;
                            top: -200px;
                        }

                    }

                    /* Slider */
                    #ut-sitebody:not(.ut-bklyn-site-with-preloader) #ut-hero-slider,
                    #ut-sitebody:not(.ut-bklyn-site-with-preloader) #ut-hero-captions,
                    #ut-sitebody:not(.ut-bklyn-site-with-preloader) #ut-hero .ut-flex-control {
                        visibility: hidden;
                    }

                    #ut-sitebody:not(.ut-bklyn-site-with-preloader).ut-hero-image-preloaded #ut-hero-slider,
                    #ut-sitebody:not(.ut-bklyn-site-with-preloader).ut-hero-image-preloaded #ut-hero-captions,
                    #ut-sitebody:not(.ut-bklyn-site-with-preloader).ut-hero-image-animated #ut-hero .ut-flex-control {
                        visibility: visible;
                        -webkit-animation-fill-mode: both;
                        animation-fill-mode: both;
                        -webkit-animation: heroFadeIn 1s linear;
                        -moz-animation: heroFadeIn 1s linear;
                        animation: heroFadeIn 1s linear;
                    }

                    #ut-sitebody.ut-bklyn-site-with-preloader.ut-hero-image-preloaded #ut-hero-slider,
                    #ut-sitebody.ut-bklyn-site-with-preloader.ut-hero-image-preloaded #ut-hero-captions,
                    #ut-sitebody.ut-bklyn-site-with-preloader.ut-hero-image-animated #ut-hero .ut-flex-control {
                        -webkit-animation-fill-mode: both;
                        animation-fill-mode: both;
                        -webkit-animation: heroFadeIn 0s linear;
                        -moz-animation: heroFadeIn 0s linear;
                        animation: heroFadeIn 0s linear;
                    }

                    /* 3 Image Fader */
                    #ut-sitebody #ut-hero .ut-image-fader {
                        visibility: hidden;
                    }

                    #ut-sitebody.ut-hero-image-preloaded #ut-hero .ut-image-fader {
                        visibility: visible;
                        -webkit-animation-fill-mode: both;
                        animation-fill-mode: both;
                        -webkit-animation: heroFadeIn 1s linear;
                        -moz-animation: heroFadeIn 1s linear;
                        animation: heroFadeIn 1s linear;
                    }

                    /* rain effect canvas */
                    #ut-sitebody #ut-hero > canvas {
                        visibility: hidden;
                    }

                    #ut-sitebody.ut-hero-image-preloaded #ut-hero > canvas {
                        visibility: visible;
                        -webkit-animation-fill-mode: both;
                        animation-fill-mode: both;
                        -webkit-animation: heroFadeIn 1s linear;
                        -moz-animation: heroFadeIn 1s linear;
                        animation: heroFadeIn 1s linear;
                    }
                        
                    /* # Other Hero Related Animation
					================================================== */
					#ut-sitebody #ut-hero .hero-holder .ut-hero-animation-element {
                        visibility: hidden;
                        transform: translate3d(0,0,0); /* fix for jumping issue */
                    }
                
                    /* hero tablet */
                    #ut-sitebody #ut-hero .ut-tablet-holder {
                        visibility: hidden;
                    }
                    
                    /* split hero elements */
                    #ut-sitebody #ut-hero .ut-hero-highlighted-item .ut-split-image,
                    #ut-sitebody #ut-hero .ut-hero-highlighted-item .ut-hero-video,
                    #ut-sitebody #ut-hero .ut-hero-highlighted-item .ut-hero-form {
                        visibility: hidden;
                    }
                
                    /* hero down arrow */
					#ut-sitebody .hero-down-arrow-wrap .hero-down-arrow {
						visibility: hidden;
					}
                    
                    /* hero style 5 underline (@todo other styles)*/
                    #ut-sitebody #ut-hero .ut-hero-style-5 .hero-title::after {
						width: 0;
                        -webkit-transition: width <?php echo ut_collect_option( 'ut_hero_caption_animation_effect_timer', '1000' ); ?>ms <?php echo $this->get_css_easing( ut_collect_option( 'ut_hero_caption_animation_effect_easing', 'ease' ) ); ?>;
                                transition: width <?php echo ut_collect_option( 'ut_hero_caption_animation_effect_timer', '1000' ); ?>ms <?php echo $this->get_css_easing( ut_collect_option( 'ut_hero_caption_animation_effect_easing', 'ease' ) ); ?>;
					}                
                
                    @media(min-width: 768px) {
                
                        <?php 
            
                        // hero image animation effect    
                        $ut_hero_image_animation_effect = ut_collect_option( 'ut_hero_image_animation_effect', 'heroFadeIn' ); 
                        
                        if( is_singular('post') || is_home() || $ut_hero_type == 'slider' ) {
                            
                            $ut_hero_image_animation_effect = 'heroFadeIn';
                            
                        } ?>
                        
                        /* 4) # Background Image Effects
                        ================================================== */
                        <?php

                        $opacity_effects = array(
                            'heroFadeIn', 'heroFadeInLeft', 'heroFadeInRight', 'heroFadeInUp', 'heroFadeInDown', 'heroKenBurns'
                        );

                        // start opacity if preloader is active
                        if( in_array( $ut_hero_image_animation_effect, $opacity_effects ) ) :  ?>

                            #ut-sitebody.ut-bklyn-site-with-preloader #ut-hero.<?php echo $ut_hero_image_animation_effect; ?> .parallax-image-container {
                                opacity: <?php echo $start_opacity; ?>;
                            }

                        <?php endif; ?>

                        <?php

                        $slide_effects = array(
                            'heroSlideInLeft'   => '-200px,0,0',
                            'heroSlideInRight'  => '200px,0,0',
                            'heroSlideInUp'     => '0,200px,0',
                            'heroSlideInDown'   => '0,-200px,0',
                            'heroFadeInLeft'    => '-200px,0,0',
                            'heroFadeInRight'   => '200px,0,0',
                            'heroFadeInUp'      => '0,200px,0',
                            'heroFadeInDown'    => '0,-200px,0'
                        );

                        // start position if preloader is active
                        if( array_key_exists( $ut_hero_image_animation_effect, $slide_effects ) ) :  ?>

                            #ut-sitebody.ut-bklyn-site-with-preloader #ut-hero.<?php echo $ut_hero_image_animation_effect; ?> .parallax-image-container {
                                -webkit-transform: translate3d(<?php echo $slide_effects[$ut_hero_image_animation_effect]; ?>);
                                transform: translate3d(<?php echo $slide_effects[$ut_hero_image_animation_effect]; ?>);
                            }

                        <?php endif; ?>

                        #ut-sitebody.ut-hero-image-animated #ut-hero.<?php echo $ut_hero_image_animation_effect; ?> .parallax-image-container {
                            visibility: visible !important;
                            -webkit-animation-fill-mode: both;
                                    animation-fill-mode: both;
                            -webkit-animation: <?php echo $ut_hero_image_animation_effect; ?> <?php echo ut_collect_option( 'ut_hero_image_animation_effect_timer', '1' ); ?>s <?php echo $this->get_css_easing( ut_collect_option( 'ut_hero_image_animation_effect_easing', 'ease' ) ); ?>;
                               -moz-animation: <?php echo $ut_hero_image_animation_effect; ?> <?php echo ut_collect_option( 'ut_hero_image_animation_effect_timer', '1' ); ?>s <?php echo $this->get_css_easing( ut_collect_option( 'ut_hero_image_animation_effect_easing', 'ease' ) ); ?>;
                                    animation: <?php echo $ut_hero_image_animation_effect; ?> <?php echo ut_collect_option( 'ut_hero_image_animation_effect_timer', '1' ); ?>s <?php echo $this->get_css_easing( ut_collect_option( 'ut_hero_image_animation_effect_easing', 'ease' ) ); ?>;
                        }

                        #ut-sitebody.ut-hero-image-animated #ut-hero.<?php echo $ut_hero_image_animation_effect; ?> .parallax-image-container.parallax-image-finished {
                            -webkit-transform: translate3d(0,0,0);
                            transform: translate3d(0,0,0);
                            opacity: 1;
                        }

                        /* 
                         * heroKenBurnsIn
                         */
                        #ut-sitebody.ut-hero-image-animated #ut-hero.heroKenBurns .parallax-image-container {
                            visibility: visible !important;
                            -webkit-animation-fill-mode: both;
                                    animation-fill-mode: both;
                            -webkit-animation: heroKenBurns <?php echo ut_collect_option( 'ut_hero_image_animation_effect_kenburns_timer', '150' ) / 2; ?>s <?php echo $this->get_css_easing( ut_collect_option( 'ut_hero_image_animation_effect_easing', 'ease' ) ); ?>;
                               -moz-animation: heroKenBurns <?php echo ut_collect_option( 'ut_hero_image_animation_effect_kenburns_timer', '150' ) / 2; ?>s <?php echo $this->get_css_easing( ut_collect_option( 'ut_hero_image_animation_effect_easing', 'ease' ) ); ?>;
                                    animation: heroKenBurns <?php echo ut_collect_option( 'ut_hero_image_animation_effect_kenburns_timer', '150' ) / 2; ?>s <?php echo $this->get_css_easing( ut_collect_option( 'ut_hero_image_animation_effect_easing', 'ease' ) ); ?>;
                            -webkit-animation-fill-mode: forwards;
                                    animation-fill-mode: forwards;
                            -webkit-animation-direction: alternate;
                                    animation-direction: alternate;
                            -webkit-animation-iteration-count: infinite;
                                    animation-iteration-count: infinite;
                            will-change: transform;
                        }
                        
                        /* 
                         * heroKenBurnsOut 
                         */
                        #ut-sitebody.ut-hero-image-animated #ut-hero.heroKenBurnsOut .parallax-image-container {
                            visibility: visible !important;
                            -webkit-animation-fill-mode: both;
                                    animation-fill-mode: both;
                            -webkit-animation: heroKenBurnsOut <?php echo ut_collect_option( 'ut_hero_image_animation_effect_kenburns_timer', '150' ) / 2; ?>s <?php echo $this->get_css_easing( ut_collect_option( 'ut_hero_image_animation_effect_easing', 'ease' ) ); ?>;
                               -moz-animation: heroKenBurnsOut <?php echo ut_collect_option( 'ut_hero_image_animation_effect_kenburns_timer', '150' ) / 2; ?>s <?php echo $this->get_css_easing( ut_collect_option( 'ut_hero_image_animation_effect_easing', 'ease' ) ); ?>;
                                    animation: heroKenBurnsOut <?php echo ut_collect_option( 'ut_hero_image_animation_effect_kenburns_timer', '150' ) / 2; ?>s <?php echo $this->get_css_easing( ut_collect_option( 'ut_hero_image_animation_effect_easing', 'ease' ) ); ?>;
                            -webkit-animation-fill-mode: forwards;
                                    animation-fill-mode: forwards;
                            -webkit-animation-direction: alternate;
                                    animation-direction: alternate;
                            -webkit-animation-iteration-count: infinite;
                                    animation-iteration-count: infinite;
                            will-change: transform;
                        }
                        

                    }
                        
                    /* 5) # Background Image Effects 
					================================================== */
                    <?php 
            
                    $ut_hero_caption_animation_effect       = ut_collect_option( 'ut_hero_caption_animation_effect', 'fadeIn' );
                    $ut_hero_caption_animation_effect_split = ut_collect_option( 'ut_hero_caption_animation_effect_split', 'BrooklynFadeInDown' );
                    
                    if( is_singular('post') || is_home() || is_archive() ) {
                        
                        $ut_hero_caption_animation_effect = 'fadeIn';
                        $ut_hero_caption_animation_effect_split = 'fadeIn';
                        
                    }
                    
                    if( $ut_hero_caption_animation_effect == 'BrooklynFadeInUpShortCut' ||
                        $ut_hero_caption_animation_effect == 'BrooklynFadeInDownShortCut' ) : ?>
                        
                        #ut-sitebody.ut-hero-image-animated #ut-hero .hdh,
                        #ut-sitebody.ut-hero-image-animated #ut-hero .hth:not(.hth-animated),
                        #ut-sitebody.ut-hero-image-animated #ut-hero .hdb,
                        #ut-sitebody.ut-hero-image-animated #ut-hero .ut-hero-custom-logo-holder,
                        #ut-sitebody.ut-hero-image-animated #ut-hero .hero-btn-holder {
                            overflow: hidden;
                        }
                
                        #ut-sitebody.ut-hero-image-animated #ut-hero .hero-inner {
                            overflow: hidden;
                        }

                        #ut-sitebody.ut-hero-image-animated #ut-hero .hth.ut-hth-ready:not(.hth-animated) {
                            overflow: visible;
                        }

                        #ut-sitebody.ut-hero-image-animated #ut-hero .hth:not(.hth-animated) .hero-title.ut-glow {
                            transition: text-shadow ease 0.2s;
                        }

                        #ut-sitebody.ut-hero-image-animated #ut-hero .hth:not(.ut-hth-ready):not(.hth-animated) .hero-title.ut-glow {
                            text-shadow: none;
                        }

                    <?php endif;
                    
                    if( ut_collect_option( 'ut_hero_caption_animation_type', 'group' ) == 'group_split' && !is_singular('post') ) : ?>
                
                        #ut-sitebody.ut-hero-image-animated #ut-hero .ut-hero-animation-element-upper.ut-hero-animation-element-start {
                            visibility: visible;
                            -webkit-animation-fill-mode: both;
                                    animation-fill-mode: both;
                            -webkit-animation: <?php echo $ut_hero_caption_animation_effect_split; ?> <?php echo ut_collect_option( 'ut_hero_caption_animation_effect_timer', '1000' ); ?>ms <?php echo $this->get_css_easing( ut_collect_option( 'ut_hero_caption_animation_effect_easing', 'ease' ) ); ?>;
                               -moz-animation: <?php echo $ut_hero_caption_animation_effect_split; ?> <?php echo ut_collect_option( 'ut_hero_caption_animation_effect_timer', '1000' ); ?>ms <?php echo $this->get_css_easing( ut_collect_option( 'ut_hero_caption_animation_effect_easing', 'ease' ) ); ?>;
                                    animation: <?php echo $ut_hero_caption_animation_effect_split; ?> <?php echo ut_collect_option( 'ut_hero_caption_animation_effect_timer', '1000' ); ?>ms <?php echo $this->get_css_easing( ut_collect_option( 'ut_hero_caption_animation_effect_easing', 'ease' ) ); ?>;
                        }
                
                        <?php $opposite_effect = isset( $opposite_effects[$ut_hero_caption_animation_effect_split] ) ? $opposite_effects[$ut_hero_caption_animation_effect_split] : 'BrooklynFadeInDown'; ?>
                
                        #ut-sitebody.ut-hero-image-animated #ut-hero .ut-hero-animation-element-lower.ut-hero-animation-element-start {
                            visibility: visible;
                            -webkit-animation-fill-mode: both;
                                    animation-fill-mode: both;
                            -webkit-animation: <?php echo $opposite_effect; ?> <?php echo ut_collect_option( 'ut_hero_caption_animation_effect_timer', '1000' ); ?>ms <?php echo $this->get_css_easing( ut_collect_option( 'ut_hero_caption_animation_effect_easing', 'ease' ) ); ?>;
                               -moz-animation: <?php echo $opposite_effect; ?> <?php echo ut_collect_option( 'ut_hero_caption_animation_effect_timer', '1000' ); ?>ms <?php echo $this->get_css_easing( ut_collect_option( 'ut_hero_caption_animation_effect_easing', 'ease' ) ); ?>;
                                    animation: <?php echo $opposite_effect; ?> <?php echo ut_collect_option( 'ut_hero_caption_animation_effect_timer', '1000' ); ?>ms <?php echo $this->get_css_easing( ut_collect_option( 'ut_hero_caption_animation_effect_easing', 'ease' ) ); ?>;
                        }
                
                    <?php else : ?>
                        
                        #ut-sitebody.ut-hero-image-animated #ut-hero .ut-hero-animation-element.ut-hero-animation-element-start {
                            visibility: visible;
                            -webkit-animation-fill-mode: both;
                                    animation-fill-mode: both;
                            -webkit-animation: <?php echo $ut_hero_caption_animation_effect; ?> <?php echo ut_collect_option( 'ut_hero_caption_animation_effect_timer', '1000' ); ?>ms <?php echo $this->get_css_easing( ut_collect_option( 'ut_hero_caption_animation_effect_easing', 'ease' ) ); ?>;
                               -moz-animation: <?php echo $ut_hero_caption_animation_effect; ?> <?php echo ut_collect_option( 'ut_hero_caption_animation_effect_timer', '1000' ); ?>ms <?php echo $this->get_css_easing( ut_collect_option( 'ut_hero_caption_animation_effect_easing', 'ease' ) ); ?>;
                                    animation: <?php echo $ut_hero_caption_animation_effect; ?> <?php echo ut_collect_option( 'ut_hero_caption_animation_effect_timer', '1000' ); ?>ms <?php echo $this->get_css_easing( ut_collect_option( 'ut_hero_caption_animation_effect_easing', 'ease' ) ); ?>;
                        }
                
                    <?php endif; ?>
                    
                    <?php if( in_array( $ut_hero_caption_animation_effect_split, array( 'BrooklynFadeInUp', 'BrooklynFadeInDown', 'BrooklynFadeInUpShortCut', 'BrooklynFadeInDownShortCut' ) ) ) : ?>
                
                        #ut-sitebody.ut-hero-image-animated #ut-hero .ut-hero-style-5 .hero-title.hero-title-animated::after {
                            width: <?php echo $this->add_px_value( ut_return_hero_config('ut_hero_style_5_border_width', '30' ) ); ?>;
                        }
                
                    <?php else : ?>
                
                        #ut-sitebody.ut-hero-image-animated #ut-hero .ut-hero-style-5 .hero-title::after {
                            width: <?php echo $this->add_px_value( ut_return_hero_config('ut_hero_style_5_border_width', '30' ) ); ?>;
                        }                    
                
                    <?php endif; ?>
                
                    #ut-sitebody.ut-hero-image-animated #ut-hero .ut-tablet-holder {
                        visibility: visible;
                        -webkit-animation-fill-mode: both;
                                animation-fill-mode: both;
                        -webkit-animation: heroFadeIn 1s linear;
						   -moz-animation: heroFadeIn 1s linear;
								animation: heroFadeIn 1s linear;
                    }
                    
                    #ut-sitebody.ut-hero-image-animated #ut-hero .ut-hero-highlighted-item .ut-split-image,
                    #ut-sitebody.ut-hero-image-animated #ut-hero .ut-hero-highlighted-item .ut-hero-video,
                    #ut-sitebody.ut-hero-image-animated #ut-hero .ut-hero-highlighted-item .ut-hero-form {
                        visibility: visible;
                        -webkit-animation-fill-mode: both;
                                animation-fill-mode: both;
                        -webkit-animation: heroFadeIn 1s linear;
						   -moz-animation: heroFadeIn 1s linear;
								animation: heroFadeIn 1s linear;
                    }
                    
                    #ut-sitebody.ut-hero-image-animated .hero-down-arrow-wrap .hero-down-arrow {
						visibility: visible;
                        -webkit-animation-fill-mode: both;
                                animation-fill-mode: both;
                        -webkit-animation: heroFadeIn 1s linear;
						   -moz-animation: heroFadeIn 1s linear;
								animation: heroFadeIn 1s linear;
					}
                
                
					<?php 
            
                    // extra header animation
                    if( ut_return_header_config( 'ut_navigation_hero_and_header_animation', 'on' ) == 'on' && (
                              ut_return_header_config( 'ut_header_layout', 'default' ) == 'default' && ut_return_header_config( 'ut_navigation_skin' , 'ut-header-light' ) != 'ut-header-custom' && ut_return_header_config( 'ut_navigation_state') == 'on_transparent' 
                           || ut_return_header_config( 'ut_header_layout', 'default' ) == 'default' && ut_return_header_config( 'ut_navigation_on_hero', 'on' ) == 'on' ) ) : ?>
						
						#ut-sitebody #header-section:not(.ut-hero-passed) {
							visibility: hidden;
						}
						
						#ut-sitebody.ut-hero-image-animated #header-section:not(.ut-hero-passed) {
							visibility: visible;
                            -webkit-animation-fill-mode: forwards;
                                    animation-fill-mode: forwards;
							-webkit-animation: heroRelFadeIn 1s linear;
							   -moz-animation: heroRelFadeIn 1s linear;
									animation: heroRelFadeIn 1s linear;
						}
						
					<?php endif; ?>
				
				<?php endif; ?>
				
				/* # Hero Related Animation Keyframes
				================================================== */
				@-webkit-keyframes heroFadeIn {
					0% {
						opacity: <?php echo $start_opacity; ?>;
					}
					50% {
						opacity: 1;
					}
					100% {
						opacity: 1;
					}
				}
				
				@keyframes heroFadeIn {
					0% {
						opacity: <?php echo $start_opacity; ?>;
					}
					50% {
						opacity: 1;
					}
					100% {
						opacity: 1;
					}
				}

				@-webkit-keyframes heroRelFadeIn {
					0% {
						opacity: 0;
					}
					50% {
						opacity: 1;
					}
					100% {
						opacity: 1;
					}
				}

				@keyframes heroRelFadeIn {
					0% {
						opacity: 0;
					}
					50% {
						opacity: 1;
					}
					100% {
						opacity: 1;
					}
				}
                
                @-webkit-keyframes heroFadeInLeft {
                    from {
                        opacity: <?php echo $start_opacity; ?>;
                        -webkit-transform: translate3d( -200px, 0,0 );
                        transform: translate3d( -200px, 0,0 );
                    }
                    to {
                        opacity: 1; 
                        -webkit-transform: none;
                        transform: none;
                    }
                }

                @keyframes heroFadeInLeft {
                    from {
                        opacity: <?php echo $start_opacity; ?>;
                        -webkit-transform: translate3d( -200px, 0, 0 );
                        transform: translate3d( -200px, 0, 0 );
                    }

                    to {
                        opacity: 1; 
                        -webkit-transform: none;
                        transform: none;
                    }
                }
                
                @-webkit-keyframes heroFadeInRight {
                    from {
                        opacity: <?php echo $start_opacity; ?>;
                        -webkit-transform: translate3d( 200px, 0,0 );
                        transform: translate3d( 200px, 0,0 );
                    }

                    to {
                        opacity: 1; 
                        -webkit-transform: none;
                        transform: none;
                    }
                }

                @keyframes heroFadeInRight {
                    from {
                        opacity: <?php echo $start_opacity; ?>;
                        -webkit-transform: translate3d( 200px, 0, 0 );
                        transform: translate3d( 200px, 0, 0 );
                    }
                    to {
                        opacity: 1; 
                        -webkit-transform: none;
                        transform: none;
                    }
                }
                
                @-webkit-keyframes heroFadeInUp {
                    from {
                        opacity: <?php echo $start_opacity; ?>;
                        -webkit-transform: translate3d(0, 200px, 0);
                        transform: translate3d(0, 200px, 0);
                    }
                    to {
                        opacity: 1;
                        -webkit-transform: none;
                        transform: none;
                    }
                }

                @keyframes heroFadeInUp {
                    from {
                        opacity: <?php echo $start_opacity; ?>;
                        -webkit-transform: translate3d(0, 200px, 0);
                        transform: translate3d(0, 200px, 0);
                    }
                    to {
                        opacity: 1;
                        -webkit-transform: none;
                        transform: none;
                    }
                }
                
                @-webkit-keyframes heroFadeInDown {
                    from {
                        opacity: <?php echo $start_opacity; ?>;
                        -webkit-transform: translate3d(0, -200px, 0);
                        transform: translate3d(0, -200px, 0);
                    }
                    to {
                        opacity: 1;
                        -webkit-transform: none;
                        transform: none;
                    }
                }

                @keyframes heroFadeInDown {
                    from {
                        opacity: <?php echo $start_opacity; ?>;
                        -webkit-transform: translate3d(0, -200px, 0);
                        transform: translate3d(0, -200px, 0);
                    }
                    to {
                        opacity: 1;
                        -webkit-transform: none;
                        transform: none;
                    }
                }
                
                @-webkit-keyframes heroKenBurns {
                    0% {
                        opacity: <?php echo $start_opacity; ?>;
                        transform-origin: bottom center;
                    }
                    5% {
                        opacity: 1;
                    }
                    100% {
                        -webkit-transform: scale3d(1.3, 1.3, 1.3);
                        transform: scale3d(1.3, 1.3, 1.3);
                        -webkit-animation-timing-function: ease-in;
                        animation-timing-function: ease-in;
                        opacity: 1;
                    }                    
                }
                
                @keyframes heroKenBurns {
                    0% {
                        opacity: <?php echo $start_opacity; ?>;
                        transform-origin: bottom center;
                    }
                    5% {
                        opacity: 1;
                    }
                    100% {
                        -webkit-transform: scale3d(1.3, 1.3, 1.3);
                        transform: scale3d(1.3, 1.3, 1.3);
                        -webkit-animation-timing-function: ease-in;
                        animation-timing-function: ease-in;
                        opacity: 1;
                    }                    
                }                
                
                @-webkit-keyframes heroKenBurnsOut {
                    0% {
                         opacity: <?php echo $start_opacity; ?>;
                         transform-origin: bottom center;
                         -webkit-transform: scale3d(1.3, 1.3, 1.3);
                                 transform: scale3d(1.3, 1.3, 1.3);
                    }
                    5% {
                        opacity: 1;
                    }
                    100% {
                        -webkit-transform: scale3d(1, 1, 1);
                                transform: scale3d(1, 1, 1);
                        -webkit-animation-timing-function: ease-in;
                                animation-timing-function: ease-in;
                        opacity: 1;
                    }                     
                }
                
                @keyframes heroKenBurnsOut {
                    0% {
                         opacity: <?php echo $start_opacity; ?>;
                        transform-origin: bottom center;
                         -webkit-transform: scale3d(1.3, 1.3, 1.3);
                                 transform: scale3d(1.3, 1.3, 1.3);
                    }
                    5% {
                        opacity: 1;
                    }
                    100% {
                        -webkit-transform: scale3d(1, 1, 1);
                                transform: scale3d(1, 1, 1);
                        -webkit-animation-timing-function: ease-in;
                                animation-timing-function: ease-in;
                        opacity: 1;
                    }                    
                }
                
                
                @-webkit-keyframes heroSlideInLeft {
                    from {
                        -webkit-transform: translate3d( -200px, 0,0 );
                        transform: translate3d( -200px, 0,0 );
                    }
                    to {
                        -webkit-transform: none;
                        transform: none;
                    }
                }

                @keyframes heroSlideInLeft {
                    from {
                        -webkit-transform: translate3d( -200px, 0, 0 );
                        transform: translate3d( -200px, 0, 0 );
                    }

                    to {
                        -webkit-transform: none;
                        transform: none;
                    }
                }
                
                @-webkit-keyframes heroSlideInRight {
                    from {
                        -webkit-transform: translate3d( 200px, 0,0 );
                        transform: translate3d( 200px, 0,0 );
                    }

                    to {
                        -webkit-transform: none;
                        transform: none;
                    }
                }

                @keyframes heroSlideInRight {
                    from {
                        -webkit-transform: translate3d( 200px, 0, 0 );
                        transform: translate3d( 200px, 0, 0 );
                    }
                    to {
                        -webkit-transform: none;
                        transform: none;
                    }
                }
                
                @-webkit-keyframes heroSlideInUp {
                    from {
                        -webkit-transform: translate3d(0, 200px, 0);
                        transform: translate3d(0, 200px, 0);
                    }
                    to {
                        -webkit-transform: none;
                        transform: none;
                    }
                }

                @keyframes heroSlideInUp {
                    from {
                        -webkit-transform: translate3d(0, 200px, 0);
                        transform: translate3d(0, 200px, 0);
                    }
                    to {
                        -webkit-transform: none;
                        transform: none;
                    }
                }
                
                @-webkit-keyframes heroSlideInDown {
                    from {
                        -webkit-transform: translate3d(0, -200px, 0);
                        transform: translate3d(0, -200px, 0);
                    }
                    to {
                        -webkit-transform: none;
                        transform: none;
                    }
                }

                @keyframes heroSlideInDown {
                    from {
                        -webkit-transform: translate3d(0, -200px, 0);
                        transform: translate3d(0, -200px, 0);
                    }
                    to {
                        -webkit-transform: none;
                        transform: none;
                    }
                }
                
            </style>
            
            <?php 
 
            echo $this->minify_css( ob_get_clean() );
        
        }  
            
    }

}


/**
 * Overlay Navigation Spacing Custom CSS
 *
 * @access    public
 * @support   transient
 */

if( !class_exists( 'UT_Overlay_Navigation_Spacing_CSS' ) ) {	
    
    class UT_Overlay_Navigation_Spacing_CSS extends UT_Custom_CSS {
        
        public function custom_css() {
            
            // Overlay Spacing
            $ut_nav_top_spacing = 0;
            
            // frame settings
            if( apply_filters( 'ut_show_siteframe', 'hide' ) == 'show' ) {
            
                $ut_site_frame_settings = apply_filters( 'ut_site_frame_settings', array() );

                $ut_site_border_status = $ut_site_frame_settings['border_status'];
                $ut_site_border_size   = $ut_site_frame_settings['border_size'];

                // Overlay Settings
                if( isset( $ut_site_border_status['margin-top'] ) && $ut_site_border_status['margin-top'] == 'on' ) {

                    $ut_nav_top_spacing += $ut_site_border_size;

                }
            
            }
            
            // Header Settings
            $ut_nav_top_spacing += ut_return_header_config( 'ut_navigation_height', 80 );
            
            ob_start(); ?>

            <style id="ut-overlay-navigation-spacing-css" type="text/css">
                
                <?php if( apply_filters( 'ut_show_siteframe', 'hide' ) == 'show' ) : ?>
                
                #ut-overlay-menu {
                    
                    <?php if( isset( $ut_site_border_status['margin-left'] ) && $ut_site_border_status['margin-left'] == 'on' ) : ?> padding-left: <?php echo $this->add_px_value( $ut_site_border_size ); ?>; <?php endif; ?>
                    <?php if( isset( $ut_site_border_status['margin-right'] ) && $ut_site_border_status['margin-right'] == 'on' ) : ?> padding-right: <?php echo $this->add_px_value( $ut_site_border_size ); ?>; <?php endif; ?>
                    
                }
                
                <?php endif; ?>
                
                #ut-overlay-nav.ut-overlay-nav-top {
                    padding-top: <?php echo $ut_nav_top_spacing + 30; ?>px;
                }        
                		
				
            </style>
            
            <?php
			
            echo $this->minify_css( ob_get_clean() );
        
        }

    }

}


/**
 * Footer
 *
 * @access    public
 * @support   transient
 */

class UT_Footer_CSS extends UT_Custom_CSS {
        
	function custom_css() {

		$sidebars = is_active_sidebar( 'first-footer-widget-area' ) + is_active_sidebar( 'second-footer-widget-area' ) + is_active_sidebar( 'third-footer-widget-area' ) + is_active_sidebar( 'fourth-footer-widget-area' );

		ob_start(); ?>

		<style id="ut-footer-custom-css" type="text/css">

		.footer-content a:hover {
			color: <?php echo $this->accent; ?>;
		}

		.footer-content i { 
			color: <?php echo $this->accent; ?>; 
		}

		.ut-footer-dark .ut-footer-area .widget_tag_cloud a:hover { 
			color: <?php echo $this->accent; ?>!important; 
			border-color: <?php echo $this->accent; ?>;
		}

		.ut-footer-so li a:hover { 
			border-color: <?php echo $this->accent; ?>; 
		}

		.ut-footer-so li a:hover i { 
			color: <?php echo $this->accent; ?>!important; 
		}

		.toTop:hover, 
		.copyright a:hover, 
		.ut-footer-dark a.toTop:hover { 
			color: <?php echo $this->accent; ?>; 
		}

		.ut-footer-area ul.sidebar a:hover { 
			color: <?php echo $this->accent; ?>; 
		}

		<?php 

			/* footer widgets */
			echo $this->font_style_css( array(
				'selector'           => '#ut-sitebody .ut-footer-area h3.widget-title',
				'font-type'          => ot_get_option('ut_footer_widgets_headline_font_type', 'ut-font'),   
				'font-style'         => ot_get_option('ut_footer_widgets_headline_font_style', 'semibold'),
				'google-font-style'  => ot_get_option('ut_footer_widgets_headline_google_font_style'),
				'websafe-font-style' => ot_get_option('ut_footer_widgets_headline_websafe_font_style'),
				'custom-font-style'  => ot_get_option('ut_footer_widgets_headline_custom_font_style')
			) ); 

		?>


		<?php if( ut_return_csection_config('ut_show_scroll_up_button' , 'on') == 'on' ) : ?>

			<?php if( ot_get_option('ut_scroll_up_button_icon_color') ) : ?>

				/* Scroll To Top Button */
				#ut-sitebody .toTop {
					color:<?php echo ot_get_option('ut_scroll_up_button_icon_color'); ?>;
				}

			<?php endif; ?>


			<?php if( ot_get_option('ut_scroll_up_button_background_color') ) : ?>

				/* Scroll To Top Button */
				#ut-sitebody .toTop {
					background:<?php echo ot_get_option('ut_scroll_up_button_background_color'); ?>;
				}

			<?php endif; ?>


			<?php if( ot_get_option('ut_scroll_up_button_icon_color_hover') ) : ?>

				#ut-sitebody .toTop:hover,
				#ut-sitebody .toTop:active {
					color:<?php echo ot_get_option('ut_scroll_up_button_icon_color_hover'); ?>;    
				}            

			<?php endif; ?>


			<?php if( ot_get_option( 'ut_scroll_up_button_shadow', 'on' ) == 'off' ) : ?>

				/* Scroll To Top Button - Shadow */
				#ut-sitebody .toTop {
					 -webkit-box-shadow:none;
						-moz-box-shadow:none;
							 box-shadow:none;   
				}

			<?php endif; ?>


			<?php if( ot_get_option( 'ut_scroll_up_button_border_radius', 'on' ) == 'off' ) : ?>

				/* Scroll To Top Button - Border */ 
				#ut-sitebody .toTop {
					 -webkit-border-radius:0;
						-moz-border-radius:0;
							 border-radius:0;
				}

			<?php endif; ?>

		<?php endif; ?>

		<?php if( ot_get_option('ut_footer_widgets_headline_color') ) : ?>

			/* Footer Widget Title */
			#ut-sitebody .ut-footer-area .widget-title,
			#ut-sitebody .ut-footer-area .widget-title a,
			#ut-sitebody .ut-footer-area .widget-title a:hover,
			#ut-sitebody .ut-footer-area .widget-title a:active,
			#ut-sitebody .ut-footer-area h1,
			#ut-sitebody .ut-footer-area h2,
			#ut-sitebody .ut-footer-area h3,
			#ut-sitebody .ut-footer-area h4,
			#ut-sitebody .ut-footer-area h5,
			#ut-sitebody .ut-footer-area h6 {
				color:<?php echo ot_get_option('ut_footer_widgets_headline_color'); ?> !important;
			}

		<?php endif; ?>                    

		<?php if( ut_page_option('ut_footer_skin') == 'ut-footer-custom' ) { ?>                

			<?php if( ot_get_option('ut_footer_widgets_text_color') ) : ?>

				/* Footer Color */
				#ut-sitebody .ut-footer-area,
				#ut-sitebody .ut-footer-area select,
				#ut-sitebody .ut-footer-area textarea,
				#ut-sitebody .ut-footer-area input[type="text"],
				#ut-sitebody .ut-footer-area input[type="tel"],
				#ut-sitebody .ut-footer-area input[type="email"],
				#ut-sitebody .ut-footer-area input[type="password"],
				#ut-sitebody .ut-footer-area input[type="number"],
				#ut-sitebody .ut-footer-area input[type="search"] {
					color:<?php echo ot_get_option('ut_footer_widgets_text_color'); ?> !important;
				}

			<?php endif; ?>

			<?php if( ot_get_option('ut_footer_widgets_link_color') ) : ?>

				/* Footer Link */
				#ut-sitebody .ut-footer-area a {
					color:<?php echo ot_get_option('ut_footer_widgets_link_color'); ?> !important;   
				}

			<?php endif; ?>


			<?php if( ot_get_option('ut_footer_widgets_link_color_hover') ) : ?>

				/* Footer Link Hover */
				#ut-sitebody .ut-footer-area a:hover,
				#ut-sitebody .ut-footer-area a:active {
					color:<?php echo ot_get_option('ut_footer_widgets_link_color_hover'); ?> !important;   
				}

			<?php endif; ?>


			<?php if( ot_get_option('ut_footer_widgets_border_color') ) : ?>

				/* Footer Border Color */
				#ut-sitebody .ut-footer-area .ut-footer-area li,
				#ut-sitebody .ut-footer-area .ut-archive-tags a,
				#ut-sitebody .ut-footer-area .widget_tag_cloud a,
				#ut-sitebody .ut-footer-area table,
				#ut-sitebody .ut-footer-area tr,
				#ut-sitebody .ut-footer-area td,
				#ut-sitebody .ut-footer-area select,
				#ut-sitebody .ut-footer-area textarea,
				#ut-sitebody .ut-footer-area input[type="text"],
				#ut-sitebody .ut-footer-area input[type="tel"],
				#ut-sitebody .ut-footer-area input[type="email"],
				#ut-sitebody .ut-footer-area input[type="password"],
				#ut-sitebody .ut-footer-area input[type="number"],
				#ut-sitebody .ut-footer-area input[type="search"],
				.widget-container ul.children li:last-child {
					border-color:<?php echo ot_get_option('ut_footer_widgets_border_color'); ?> !important;
				}

			<?php endif; ?>


			<?php if( ot_get_option('ut_footer_widgets_border_color_hover') ) : ?>

				/* Footer Border Color Hover */
				#ut-sitebody .ut-footer-area select:active,
				#ut-sitebody .ut-footer-area textarea:active,
				#ut-sitebody .ut-footer-area input[type="text"]:active,
				#ut-sitebody .ut-footer-area input[type="tel"]:active,
				#ut-sitebody .ut-footer-area input[type="email"]:active,
				#ut-sitebody .ut-footer-area input[type="password"]:active,
				#ut-sitebody .ut-footer-area input[type="number"]:active,
				#ut-sitebody .ut-footer-area input[type="search"]:active,
				#ut-sitebody .ut-footer-area select:focus,
				#ut-sitebody .ut-footer-area textarea:focus,
				#ut-sitebody .ut-footer-area input[type="text"]:focus,
				#ut-sitebody .ut-footer-area input[type="tel"]:focus,
				#ut-sitebody .ut-footer-area input[type="email"]:focus,
				#ut-sitebody .ut-footer-area input[type="password"]:focus,
				#ut-sitebody .ut-footer-area input[type="number"]:focus,
				#ut-sitebody .ut-footer-area input[type="search"]:focus,
				#ut-sitebody .ut-footer-area .ut-archive-tags a:hover,
				#ut-sitebody .ut-footer-area .widget_tag_cloud a:hover,
				#ut-sitebody .ut-footer-area .ut-archive-tags a:active,
				#ut-sitebody .ut-footer-area .widget_tag_cloud a:active,
				#ut-sitebody .ut-footer-area .ut-archive-tags a:focus,
				#ut-sitebody .ut-footer-area .widget_tag_cloud a:focus {
					border-color:<?php echo ot_get_option('ut_footer_widgets_border_color_hover'); ?> !important;
				}

			<?php endif; ?>


			<?php if( ot_get_option('ut_footer_widgets_icon_color') ) : ?>

				/* Footer Icons */
				#ut-sitebody .ut-footer-area .fa,
				#ut-sitebody .ut-footer-area  a .fa,
				#ut-sitebody .ut-footer-area .widget_categories li::before, 
				#ut-sitebody .ut-footer-area .widget_pages li::before, 
				#ut-sitebody .ut-footer-area .widget_nav_menu li::before, 
				#ut-sitebody .ut-footer-area .widget_recent_entries li::before, 
				#ut-sitebody .ut-footer-area .widget_meta li::before, 
				#ut-sitebody .ut-footer-area .widget_archive li::before,
				#ut-sitebody .ut-footer-area .ut_widget_contact .ut-address::before, 
				#ut-sitebody .ut-footer-area .ut_widget_contact .ut-phone::before, 
				#ut-sitebody .ut-footer-area .ut_widget_contact .ut-fax::before, 
				#ut-sitebody .ut-footer-area .ut_widget_contact .ut-email::before, 
				#ut-sitebody .ut-footer-area .ut_widget_contact .ut-internet::before,
				#ut-sitebody .ut-footer-area .tweet_list li::before,
				#ut-sitebody .ut-footer-area .widget_recent_comments li::before,
				#ut-sitebody .ut-footer-area .widget_recent_comments li.recentcomments::before {
					color:<?php echo ot_get_option('ut_footer_widgets_icon_color'); ?> !important;   
				}

			<?php endif; ?>


			<?php if( ot_get_option('ut_footer_widgets_icon_color_hover') ) : ?>

				/* Footer Icons Hover */
				#ut-sitebody .ut-footer-area a:hover .fa,
				#ut-sitebody .ut-footer-area a:active .fa,
				#ut-sitebody .ut-footer-area a:focus .fa {
					color:<?php echo ot_get_option('ut_footer_widgets_icon_color_hover'); ?> !important;   
				}

			<?php endif; ?>

		<?php } /* end custom skin */ ?>

		<?php

        // Widget Title
        $selector = '#ut-sitebody .ut-footer-area,
			#ut-sitebody .ut-footer-area select,
			#ut-sitebody .ut-footer-area textarea,
			#ut-sitebody .ut-footer-area input[type="text"],
			#ut-sitebody .ut-footer-area input[type="tel"],
			#ut-sitebody .ut-footer-area input[type="email"],
			#ut-sitebody .ut-footer-area input[type="password"],
			#ut-sitebody .ut-footer-area input[type="number"],
			#ut-sitebody .ut-footer-area input[type="search"],
			#ut-sitebody .ut-footer-area .ut_widget_social ul.ut-sociallinks span';

		echo $this->responsive_font_style_single( $selector, ot_get_option('ut_footer_widgets_text_font_size'), 'font-size' );
		echo $this->responsive_font_style_single( '#ut-sitebody .ut-footer-area', ot_get_option('ut_footer_widgets_text_line_height'), 'line-height' ); ?>


		<?php if( ot_get_option('ut_footer_widgets_arrow_line_height') ) : ?>

			#ut-sitebody .ut-footer-area .widget_categories li::before,
			#ut-sitebody .ut-footer-area .widget_pages li::before,
			#ut-sitebody .ut-footer-area .widget_nav_menu li::before,
			#ut-sitebody .ut-footer-area .widget_recent_entries li::before,
			#ut-sitebody .ut-footer-area .widget_meta li::before,
			#ut-sitebody .ut-footer-area .widget_archive li::before {
				line-height:<?php echo ot_get_option('ut_footer_widgets_arrow_line_height'); ?>;
			}

		<?php endif; ?>

		<?php if( ot_get_option('ut_subfooter_text_color') ) : ?>

			/* Sub Footer Text Color */
			#ut-sitebody .footer-content,
			#ut-sitebody .footer-content .copyright {
				color:<?php echo ot_get_option('ut_subfooter_text_color'); ?> !important;      
			}

		<?php endif; ?>


		<?php if( ot_get_option('ut_subfooter_link_color') ) : ?>

			/* Sub Footer Link Color */
			#ut-sitebody .footer-content a {
				color:<?php echo ot_get_option('ut_subfooter_link_color'); ?>;   
			}

		<?php endif; ?>


		<?php if( ot_get_option('ut_subfooter_link_color_hover') ) : ?>

			#ut-sitebody .footer-content a:hover,
			#ut-sitebody .footer-content a:focus,
			#ut-sitebody .footer-content a:active {
				color:<?php echo ot_get_option('ut_subfooter_link_color_hover'); ?>;   
			}

		<?php endif; ?>


		<?php if( ot_get_option('ut_subfooter_icon_color') ) : ?>

			/* Sub Footer Icon Color */
			#ut-sitebody .footer-content .fa {
				color:<?php echo ot_get_option('ut_subfooter_icon_color'); ?> !important;   
			}

		<?php endif; ?>

		<?php if( ot_get_option('ut_subfooter_social_icon_color') ) : ?>

			#ut-sitebody .footer-content .ut-footer-so li a i {
				color:<?php echo ot_get_option('ut_subfooter_social_icon_color'); ?> !important;   
			}

		<?php endif; ?>

		<?php if( ot_get_option('ut_subfooter_social_icon_color_hover') ) : ?>

			#ut-sitebody .footer-content .ut-footer-so li a:hover i,
			#ut-sitebody .footer-content .ut-footer-so li a:active i,
			#ut-sitebody .footer-content .ut-footer-so li a:focus i {
				color:<?php echo ot_get_option('ut_subfooter_social_icon_color_hover'); ?> !important;   
			}

		<?php endif; ?>    

		<?php if( ot_get_option('ut_subfooter_headline_color') ) : ?>

			/* Sub Footer Headline Color */
			#ut-sitebody .footer-content h1,
			#ut-sitebody .footer-content h2,
			#ut-sitebody .footer-content h3,
			#ut-sitebody .footer-content h4,
			#ut-sitebody .footer-content h5,
			#ut-sitebody .footer-content h6 {
				color:<?php echo ot_get_option('ut_subfooter_headline_color'); ?> !important;    
			}

		<?php endif; ?>

		.copyright:not(a) { font-weight: <?php echo ot_get_option('ut_subfooter_font_weight' , 'normal'); ?>; }
        .copyright a { font-weight: <?php echo ot_get_option( 'ut_subfooter_link_font_weight', 'bold' ); ?>; }

		<?php if( ot_get_option('ut_subfooter_font_style') ) : ?>

			<?php echo $this->typography_css('.copyright', ot_get_option('ut_subfooter_font_style') ); ?>

		<?php endif; ?>    

		<?php if( ut_page_option('ut_footer_skin' , 'ut-footer-light' ) == 'ut-footer-light' && ot_get_option('ut_footer_skin_light_bgcolor') ) : ?>

			.footer, a.toTop {
				background: <?php echo ot_get_option('ut_footer_skin_light_bgcolor'); ?>;
			}

		<?php endif; ?>

		<?php if( ut_page_option('ut_footer_skin' , 'ut-footer-light' ) == 'ut-footer-dark' && ot_get_option('ut_footer_skin_dark_bgcolor') ) : ?>

		   .footer.ut-footer-dark, 
		   .ut-footer-dark a.toTop {
				background: <?php echo ot_get_option('ut_footer_skin_dark_bgcolor'); ?>;
		   }

		<?php endif; ?>

		<?php if( ut_page_option('ut_footer_skin' , 'ut-footer-light' ) == 'ut-footer-custom' && ot_get_option('ut_footer_skin_bgcolor') ) : 

			$ut_footer_skin_bgcolor = ot_get_option('ut_footer_skin_bgcolor');

			if( $ut_footer_skin_bgcolor && $this->is_gradient( $ut_footer_skin_bgcolor ) ) :

				echo $this->create_gradient_css( $ut_footer_skin_bgcolor, '.footer.ut-footer-custom', false, 'background' );

			elseif( $ut_footer_skin_bgcolor ) : ?>

			   .footer.ut-footer-custom, .ut-footer-custom a.toTop {
					background: <?php echo ot_get_option('ut_footer_skin_bgcolor'); ?>;
			   }

			<?php endif; ?>

		<?php endif; ?>					

		<?php if( ut_page_option('ut_footer_skin' , 'ut-footer-light' ) == 'ut-footer-custom' && ot_get_option('ut_footer_skin_border') ) :
            
            $ut_footer_skin_border = $this->parse_rgba( ot_get_option( 'ut_footer_skin_border' ) );
        
            if( ( $ut_footer_skin_border && isset( $ut_footer_skin_border['a'] ) && $ut_footer_skin_border['a'] == 0 ) ) {

                // no border output

            } else { ?>

                /* footer border */            
			    .footer { border-top: 1px solid <?php echo ot_get_option('ut_footer_skin_border'); ?>; }
			    a.toTop { border: 1px solid <?php echo ot_get_option('ut_footer_skin_border'); ?>; border-bottom: none; }                

            <?php } ?>
            
			<?php if( !$sidebars ) : ?>

			.footer .footer-content {
				padding-top: 40px;
			}

			<?php endif; ?>

		<?php endif; ?>

		<?php $ut_subfooter_bgcolor = ot_get_option('ut_subfooter_bgcolor');

			if( $ut_subfooter_bgcolor && $this->is_gradient( $ut_subfooter_bgcolor ) ) : ?>

				<?php echo $this->create_gradient_css( $ut_subfooter_bgcolor, '.footer .footer-content', false, 'background' ); ?>

				.footer .footer-content {
					padding-top: 20px;
			   }				

			<?php elseif( $ut_subfooter_bgcolor ) : ?>

			   .footer .footer-content {
					background: <?php echo ot_get_option('ut_subfooter_bgcolor'); ?>;
					padding-top: 20px;
			   }

		<?php endif; ?>

		<?php if( ot_get_option('ut_subfooter_border_top_color') ) : ?>

			<?php if( ot_get_option('ut_subfooter_border_top_width', 'centered') == 'fullwidth'  ) : ?>	

				.footer-content {
					border-top: 1px solid <?php echo ot_get_option('ut_subfooter_border_top_color'); ?>;
				}

			<?php else : ?>

				.footer .ut-sub-footer-border-top {
					border-top: 1px solid <?php echo ot_get_option('ut_subfooter_border_top_color'); ?>;
					margin-bottom: <?php echo $this->add_px_value( ot_get_option('ut_subfooter_border_top_padding_bottom', 20 ) ); ?>; 
				}

			<?php endif; ?>


		<?php endif; ?>

		<?php if( ot_get_option( 'ut_subfooter_padding_top' ) ) : ?>

			/* subfooter paddingtop  */       
			.footer .footer-content {
				padding-top: <?php echo $this->add_px_value( ot_get_option( 'ut_subfooter_padding_top' ) ); ?>;
			}

		<?php endif; ?>

		<?php if( ot_get_option( 'ut_subfooter_padding_bottom' ) ) : ?>

			/* subfooter paddingtop  */       
			.footer .footer-content {
				padding-bottom: <?php echo $this->add_px_value( ot_get_option( 'ut_subfooter_padding_bottom' ) ); ?>;
			}

		<?php endif; ?>				

		</style>            

		<?php

		/* output css */
		echo $this->minify_css( ob_get_clean() );

	}  

}