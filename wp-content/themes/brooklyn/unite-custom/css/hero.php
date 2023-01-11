<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'UT_Hero_CSS' ) ) {

    class UT_Hero_CSS extends UT_Custom_CSS {


        /**
         * Hero Caption Horizontal Alignment
         */

        public function hero_horizontal_content_align() {

            // all regular pages
            if( ut_return_hero_config( 'ut_hero_align', 'center' ) ) : ?>

                #ut-hero .hero-inner {
                text-align: <?php echo ut_return_hero_config( 'ut_hero_align' , 'center' ); ?>
                }

            <?php endif;

        }


        /**
         * Maintenance Mode
         */

        public function maintenance_mode() {

            // Maintenance Mode Background Image Settings
            if( ot_get_option('ut_maintenance_hero_background_image') ) {

                echo $this->css_background( '.ut-bklyn-maintenance .hero .parallax-scroll-container' , ot_get_option('ut_maintenance_hero_background_image') );

            }

            // Vertical Align Extra Spacing
            if( ot_get_option( 'ut_maintenance_hero_v_align', 'middle' ) == 'bottom' ) : ?>

                #ut-hero.hero .hero-holder .hero-inner.ut-hero-bottom {
                padding-bottom: 40px;
                }

            <?php endif;

        }


        /**
         * Main Hero CSS
         */

        public function custom_css() {

            $ut_hero_type  = ut_return_hero_config( 'ut_hero_type', 'image' );
            $ut_hero_style = ut_return_hero_config( 'ut_hero_style', 'ut-hero-style-1' );

            // fallback since dynamic heroes are treated as default heroes
            $ut_hero_type = $ut_hero_type == 'dynamic' ? 'image' : $ut_hero_type;

            // header top style 
            $ut_header_top_style = apply_filters( 'unite_header_layout', 'default' );

            ob_start(); ?>

            <style id="ut-hero-custom-css" type="text/css">

                /**
                 * Early Waypoint for Header and Navigation Skin Animation 
                 */

                .ut-early-waypoint {
                    position: absolute;
                    top: 240px;
                    z-index: 0;
                }

                <?php
                
                /* 
                 * Hero Custom Height
                 */
                
                $var_offset = $ut_top_header_border_bottom = 0;
			
                if( $ut_header_top_style == 'style-4' || $ut_header_top_style == 'style-5' || $ut_header_top_style == 'style-6' || $ut_header_top_style == 'style-7' || $ut_header_top_style == 'style-9' ) {
				    
                    $var_offset = 161;
                    
                    if( $ut_header_top_style == 'style-4' && ut_return_header_config( 'ut_header_separate_upper_lower', 'on' ) == 'on' ) {                    
                        $var_offset++;                        
                    }
                    
                    
                } else {
                    
                    $var_offset = ut_return_header_config( 'ut_navigation_height', 80 );
                    
                }
                
                // check for possible borders used
                if( ut_return_header_config('ut_navigation_skin', 'ut-header-light' ) != 'ut-header-custom' &&
                    ut_return_header_config('ut_navigation_state') == 'on_transparent' &&
                    ut_return_header_config('ut_navigation_transparent_border') == 'on' ) {
                    
                    $var_offset++;
                    
                }
                
                // top header
                if( ut_page_option('ut_top_header', 'hide' ) == 'show' ) {
                    
                    $var_offset += 40;
                    
                }
            
                // top header has additional border bottom
                if( ut_return_header_config( 'ut_top_header_border_bottom', 'off' ) == 'on' ) {
                    
                    $ut_top_header_border_bottom = ut_return_header_config( 'ut_top_header_border_bottom_style' );
                    
                    if( isset( $ut_top_header_border_bottom['border-bottom-width'] ) ) {
                        
                        $var_offset += $ut_top_header_border_bottom['border-bottom-width'];
                        
                    }
                    
                }    
            
                // header is forced to display on hero ( custom skins )
				if( apply_filters( 'ut_show_hero', false ) &&  ut_return_header_config('ut_navigation_on_hero', 'on') == 'on' ) {
					
                    $var_offset = 0;
                    
				}
                				
                // header is hidden by default or transparent ( default skins )
				if( apply_filters( 'ut_show_hero', false ) && 
                    ut_return_header_config('ut_navigation_skin', 'ut-header-light') != 'ut-header-custom' && 
                   ( ut_return_header_config('ut_navigation_state', 'off') == 'off' || ut_return_header_config('ut_navigation_state', 'off') == 'on_transparent' ) ) {
                    
					$var_offset = 0;
                    
				}

				// header is hidden by default ( custom skins )
				if( apply_filters( 'ut_show_hero', false ) && 
                    ut_return_header_config('ut_navigation_skin', 'ut-header-light') == 'ut-header-custom' && 
                    ut_return_header_config('ut_navigation_customskin_state' , 'off') == 'off' ) {
					
                    $var_offset = 0;	
                    
				}
            
                // frame settings
                if( apply_filters( 'ut_show_siteframe', 'hide' ) == 'show' ) {            
            
                    // frame settings
                    $ut_site_frame_settings = apply_filters( 'ut_site_frame_settings', array() );

                    $ut_site_border_status = $ut_site_frame_settings['border_status'];
                    $ut_site_border_size   = $ut_site_frame_settings['border_size'];
                    
                    if( isset( $ut_site_border_status['margin-top'] ) && $ut_site_border_status['margin-top'] == 'on' ) {     
                    
                        $var_offset += $ut_site_border_size;

                    }
            
                }


                if( !apply_filters( 'ut_maintenance_mode_active', false ) && ( $ut_hero_type == 'image' || $ut_hero_type == 'video' || $ut_hero_type == 'animatedimage' || $ut_hero_type == 'splithero' || $ut_hero_type == 'imagefader' ) ) : ?>

                    @media (min-width: 1025px) {

                        #ut-sitebody:not(.ut-page-has-no-content) #ut-hero.hero {

                            min-height: calc( <?php echo ut_collect_option('ut_hero_height','100'); ?>% - <?php echo $var_offset; ?>px);
                            height: calc( <?php echo ut_collect_option('ut_hero_height','100'); ?>% - <?php echo $var_offset; ?>px);

                        }

                    }

                    @media (min-width: 768px) and (max-width: 1024px) {

                        #ut-sitebody #ut-hero.hero .hero-inner {

                            width: <?php echo ut_return_hero_config( 'ut_hero_inner_width_tablet', '100' ); ?>%;

                        }

                    }

                    @media (min-width: 1025px) {

                        #ut-sitebody #ut-hero.hero .hero-inner {

                            width: <?php echo ut_return_hero_config( 'ut_hero_inner_width', '100' ); ?>%;

                        }

                    }

                    <?php

                    // rain effect or overlay
                    if( $ut_hero_type == 'image' && ut_return_hero_config('ut_hero_rain_effect' , 'off') == 'on' || $ut_hero_type == 'image' && ut_return_hero_config('ut_hero_overlay_effect' , 'off') == 'on' ) : ?>

                        @media (min-width: 1025px) {

                            #ut-hero canvas:not(#ut-animation-canvas) {
                                top: -<?php echo ( 100 - ut_collect_option( 'ut_hero_height','100') ); ?>% !important;
                            }

                        }

                        <?php if( unite_mobile_detection()->isMobile() ) : ?>

                            #ut-hero {
                                background : transparent !important;
                            }

                        <?php endif; ?>

                    <?php endif; ?>

                    <?php

                    /*
                     * Hero Caption Spacing Bottom
                     */

                    if( is_singular('post') ) : ?>

                        #ut-hero.hero .hero-holder .hero-inner.ut-hero-bottom {
                            padding-bottom: <?php echo $this->add_px_value( ut_collect_option( 'ut_post_hero_v_align_margin_bottom', '40px', 'ut_' ) ); ?>;
                        }

                    <?php else : ?>

                        <?php if( ut_return_hero_config( 'ut_hero_v_align', 'middle' ) == 'bottom' ) :

                            // check page custom value first
                            $ut_hero_v_align_margin_bottom = isset( $this->ID ) ? get_post_meta( $this->ID, 'ut_page_hero_v_align_margin_bottom', true ) : '';

                            if( empty( $ut_hero_v_align_margin_bottom ) ) {

                                $ut_hero_v_align_margin_bottom = ot_get_option( 'ut_global_hero_v_align_margin_bottom', '40px' );

                            } ?>

                            #ut-hero.hero .hero-holder .hero-inner.ut-hero-bottom {
                                padding-bottom: <?php echo $this->add_px_value( $ut_hero_v_align_margin_bottom ); ?>;
                            }

                        <?php endif; ?>

                    <?php endif; ?>

                <?php endif; ?>

                <?php

                /*
                 * Content Block Section Height
                 */

                if( !apply_filters( 'ut_maintenance_mode_active', false ) && ( $ut_hero_type == 'cblock' ) ) : ?>

                @media (min-width: 1025px) {

                    #ut-custom-hero.ut-content-block-hero .vc_section.vc_row-o-full-height {
                        min-height: calc(100vh - <?php echo $var_offset; ?>px);
                        height: calc(100vh - <?php echo $var_offset; ?>px);
                    }

                }

                <?php endif ?>


                <?php
                
                /* 
                 * Single Post Hero Height
                 */
                 
                if( is_single() && is_singular( 'post' ) && apply_filters( 'ut_show_hero', false ) && ut_collect_option('ut_post_hero_height', '50', 'ut_') < 100 ) : ?>

                @media( min-width: 1025px ) {

                    #ut-hero.hero {
                        height: calc(<?php echo ut_collect_option('ut_post_hero_height', '50', 'ut_'); ?>% - <?php echo $var_offset; ?>px) !important;
                        min-height: calc(<?php echo ut_collect_option('ut_post_hero_height', '50', 'ut_'); ?>% - <?php echo $var_offset; ?>px) !important;
                    }

                }

                <?php endif; ?>

                <?php

                /*
                 * Single Post Hero Height Tablet
                 */

                if( is_single() && is_singular( 'post' ) && apply_filters( 'ut_show_hero', false ) && ut_collect_option('ut_post_hero_height_tablet', '100', 'ut_') < 100 ) : ?>

                @media (min-width: 768px) and (max-width: 1024px) {

                    #ut-hero.hero {
                        height: calc(<?php echo ut_collect_option('ut_post_hero_height_tablet', '100', 'ut_'); ?>% - <?php echo $var_offset; ?>px) !important;
                        min-height: calc(<?php echo ut_collect_option('ut_post_hero_height_tablet', '100', 'ut_'); ?>% - <?php echo $var_offset; ?>px) !important;
                    }

                }

                <?php endif; ?>

                <?php

                /*
                 * Single Post Hero Height Mobile
                 */

                if( is_single() && is_singular( 'post' ) && apply_filters( 'ut_show_hero', false ) && ut_collect_option('ut_post_hero_height_mobile', '100', 'ut_') < 100 ) : ?>

                @media (max-width: 767px) {

                    #ut-hero.hero {
                        height: calc(<?php echo ut_collect_option('ut_post_hero_height_mobile', '100', 'ut_'); ?>% - <?php echo $var_offset; ?>px) !important;
                        min-height: calc(<?php echo ut_collect_option('ut_post_hero_height_mobile', '100', 'ut_'); ?>% - <?php echo $var_offset; ?>px) !important;
                    }

                }

                <?php endif; ?>




                <?php
                
                /* 
                 * Archive Hero Height
                 */
                 
                if( ( is_archive() && ot_get_option('ut_archive_hero_height') ) && !ut_is_shop() ) : ?>

                @media( min-width: 1025px ) {

                    #ut-hero.hero {
                        height: calc(<?php echo ot_get_option('ut_archive_hero_height'); ?>% - <?php echo $var_offset; ?>px) !important;
                        min-height: calc(<?php echo ot_get_option('ut_archive_hero_height'); ?>% - <?php echo $var_offset; ?>px) !important;
                    }

                }

                <?php endif; ?>


                <?php
                
                /** 
                 * Hero Custom Logo Max Width and Spacing Bottom
                 */                
            
                ?>

                #ut-hero .ut-hero-custom-logo-holder img {
                    max-width: <?php echo ut_collect_option('ut_hero_custom_logo_max_width', 100 ); ?>%;
                }

                @media (min-width: 768px) and (max-width: 1024px) {

                    #ut-hero .ut-hero-custom-logo-holder img {
                        max-width: <?php echo ut_collect_option('ut_hero_custom_logo_max_width_tablet', 100); ?>%;
                    }

                }

                @media (max-width: 767px) {

                    #ut-hero .ut-hero-custom-logo-holder img {
                        max-width: <?php echo ut_collect_option('ut_hero_custom_logo_max_width_mobile', 100); ?>%;
                    }

                }

                <?php if( ut_collect_option('ut_hero_custom_logo_margin_bottom') ) : ?>

                #ut-hero .ut-hero-custom-logo-holder {
                    margin-bottom: <?php echo ut_collect_option('ut_hero_custom_logo_margin_bottom'); ?>px;
                }

                <?php endif; ?>


                <?php
                
                /** 
                 * Hero Custom Logo Margin Bottom
                 */                
                
                if( ut_collect_option('ut_hero_custom_logo_margin_bottom') ) : ?>

                #ut-hero .ut-hero-custom-logo-holder {
                    margin-bottom: <?php echo $this->add_px_value( ut_collect_option('ut_hero_custom_logo_margin_bottom') ); ?>;
                }

                <?php endif; ?>


                <?php
                
                /* 
                 * Hero Buttons
                 */                
                
                ?>

                .ut-hero-style-4 .hero-second-btn {
                    background: <?php echo $this->accent; ?>;
                }
                .ut-hero-style-10 .hero-second-btn,
                .ut-hero-style-9 .hero-second-btn,
                .ut-hero-style-8 .hero-second-btn,
                .ut-hero-style-7 .hero-second-btn,
                .ut-hero-style-6 .hero-second-btn,
                .ut-hero-style-5 .hero-second-btn,
                .ut-hero-style-3 .hero-second-btn,
                .ut-hero-style-1 .hero-second-btn,
                .ut-hero-style-2 .hero-second-btn {
                    border-color: <?php echo $this->accent; ?>;
                }

                .ut-hero-video-boxed.ut-hero-video-themecolor {
                    border-color: <?php echo $this->accent; ?>;
                }

                <?php
                
                /** 
                 * Hero Background Color
                 */                
            
				$ut_hero_background_color = ut_collect_option( 'ut_hero_background_color', ot_get_option('ut_global_hero_background_color', '#141618') );
			
				if( $ut_hero_background_color && $this->is_gradient( $ut_hero_background_color ) ) :
					
					echo $this->create_gradient_css( $ut_hero_background_color, '#ut-hero', false, 'background' );
					
				elseif( $ut_hero_background_color ) : ?>

                #ut-hero,
                #ut-custom-hero {
                    background: <?php echo $ut_hero_background_color; ?>
                }

                <?php endif; ?>


                <?php
                
                /** 
                 * Hero Caption Slogan Color
                 */
                
                $ut_caption_slogan_color = ut_collect_option( 'ut_caption_slogan_color' );
            	
				if( $ut_caption_slogan_color && $this->is_gradient( $ut_caption_slogan_color ) ) :
				
					echo $this->create_gradient_css( $ut_caption_slogan_color, '.hero-description', false, 'background' );
					echo $this->create_background_clip( '.hero-description' );		
			
                elseif( $ut_caption_slogan_color ) : ?>

                .hero-description {
                    color: <?php echo $ut_caption_slogan_color; ?>;
                }

                <?php

                /**
                 * Hero Caption Slogan Glow Color
                 */

                $ut_hero_caption_slogan_glow_color = $ut_caption_slogan_color;

                if( ut_collect_option('ut_caption_slogan_glow_color') ) {

                    $ut_hero_caption_slogan_glow_color = ut_collect_option('ut_caption_slogan_glow_color');

                } ?>

                <?php if( ut_collect_option( 'ut_caption_slogan_glow', 'off' ) == 'on' ) : ?>

                .hero-description {
                    color: <?php echo $ut_caption_slogan_color; ?>;
                    text-shadow: 0 0 40px <?php echo $ut_hero_caption_slogan_glow_color; ?>, 2px 2px 3px <?php echo ut_collect_option('ut_caption_slogan_glow_shadow_color', 'black') ?>;
                }

                <?php endif; ?>


                <?php endif; ?>


                <?php

                /**
                 * Hero Caption Slogan Background Color
                 */

                $ut_caption_slogan_background_color = ut_collect_option('ut_caption_slogan_background_color' );

                if( $ut_caption_slogan_background_color ) : ?>

                .hero-description {
                    background: <?php echo $ut_caption_slogan_background_color; ?>;
                    padding:2px 6px;
                    margin-bottom: 10px;
                }

                <?php endif; ?>


                <?php

                /**
                 * Hero Caption Slogan Spacing
                 */

                $ut_hero_caption_slogan_margin_bottom = ut_collect_option('ut_caption_slogan_margin');

                if( $ut_hero_caption_slogan_margin_bottom ) : ?>

                #ut-hero .hdh { margin-bottom: <?php echo $this->add_px_value( $ut_hero_caption_slogan_margin_bottom ); ?>; }

                <?php endif; ?>


                <?php

                /**
                 * Hero Caption Title
                 */

                $ut_hero_caption_title_color = ut_collect_option( 'ut_caption_title_color', '#FFF' );

                if( $ut_hero_caption_title_color &&  $this->is_gradient( $ut_hero_caption_title_color ) ) :

					echo $this->create_gradient_css( $ut_hero_caption_title_color, '#ut-hero .hero-title', false, 'background' );
					echo $this->create_background_clip( '#ut-hero .hero-title' ); ?>

                .ut-hero-style-4 .hero-title,
                .ut-hero-style-6 .hero-title,
                .ut-hero-style-7 .hero-title,
                .ut-hero-style-8 .hero-title,
                .ut-hero-style-9 .hero-title,
                .ut-hero-style-10 .hero-title {
                    border-image: <?php echo $ut_hero_caption_title_color; ?> 1;
                }

                .hero-title.ut-glow {
                    color: <?php echo $ut_hero_caption_title_color; ?>;
                    -webkit-text-shadow: 0 0 40px <?php echo $ut_hero_caption_title_color; ?>, 2px 2px 3px black;
                    -moz-text-shadow: 0 0 40px <?php echo $ut_hero_caption_title_color; ?>, 2px 2px 3px black;
                    text-shadow: 0 0 40px <?php echo $ut_hero_caption_title_color; ?>, 2px 2px 3px black;
                }

                <?php elseif( $ut_hero_caption_title_color ): ?>

                #ut-hero .hero-title {
                    color: <?php echo $ut_hero_caption_title_color; ?>;
                }

                <?php

                $ut_hero_caption_title_color_is_rgb = $this->parse_rgba( $ut_hero_caption_title_color );

                if( $ut_hero_caption_title_color == '#FFF' || $ut_hero_caption_title_color == '#FFFFFF' || ( $ut_hero_caption_title_color_is_rgb && $ut_hero_caption_title_color_is_rgb['r'] == 255 && $ut_hero_caption_title_color_is_rgb['g'] == 255 && $ut_hero_caption_title_color_is_rgb['b'] == 255 ) ) : ?>

                #ut-hero .ut-hero-style-4 .hero-title {
                    color: #151515;
                    border-color: #151515;
                }

                <?php else : ?>

                #ut-hero .ut-hero-style-4 .hero-title {
                    color: <?php echo $ut_hero_caption_title_color; ?>;
                    border-color: <?php echo $ut_hero_caption_title_color; ?>;
                }

                <?php endif; ?>

                .ut-hero-style-7 .hero-title {
                    border-color: <?php echo $ut_hero_caption_title_color; ?>;
                }

                .ut-hero-style-8 .hero-title {
                    border-bottom-color: <?php echo $ut_hero_caption_title_color; ?>;
                    border-top-color: <?php echo $ut_hero_caption_title_color; ?>;
                }

                .ut-hero-style-9 .hero-title {
                    border-left-color: <?php echo $ut_hero_caption_title_color; ?>;
                    border-right-color: <?php echo $ut_hero_caption_title_color; ?>;
                }

                .ut-hero-style-10 .hero-title {
                    border-left-color: <?php echo $ut_hero_caption_title_color; ?>;
                    border-right-color: <?php echo $ut_hero_caption_title_color; ?>;
                }

                <?php

                // title glow color
                $ut_hero_caption_title_glow_color = $ut_hero_caption_title_color;

                if( ut_collect_option('ut_caption_title_glow_color') ) {

                    $ut_hero_caption_title_glow_color = ut_collect_option('ut_caption_title_glow_color');

                } ?>

                .hero-title.ut-glow {
                    color: <?php echo $ut_hero_caption_title_color; ?>;
                    text-shadow: 0 0 40px <?php echo $ut_hero_caption_title_glow_color; ?>, 2px 2px 3px <?php echo ut_collect_option('ut_caption_title_glow_shadow_color', 'black'); ?>;
                }

                <?php endif; ?>

                .hero-title.ut-text-stroke  {
                    -moz-text-stroke-color: <?php echo ut_collect_option('ut_caption_title_stroke_color', $this->accent ); ?>;
                    -webkit-text-stroke-color: <?php echo ut_collect_option('ut_caption_title_stroke_color', $this->accent ); ?>;
                    -moz-text-stroke-width: <?php echo ut_collect_option('ut_caption_title_stroke_width', '1'); ?>px;
                    -webkit-text-stroke-width: <?php echo ut_collect_option('ut_caption_title_stroke_width', '1'); ?>px;
                }

                .hero-title span:not(.ut-word-rotator):not(.ut-base-span):not(.ut-typewriter-word):not(.ut-typewriter-cursor) {
                    color:<?php echo $this->accent; ?> !important;
                }

                .hero-title.ut-glow span:not(.ut-word-rotator):not(.ut-base-span):not(.ut-typewriter-word):not(.ut-typewriter-cursor) {
                    color:<?php echo $this->accent; ?>;
                    text-shadow: 0 0 40px <?php echo $this->accent; ?>, 2px 2px 3px black;
                }

                .hero-title.ut-glow span:not(.ut-word-rotator):not(.ut-base-span):not(.ut-typewriter-word):not(.ut-typewriter-cursor) span {
                    color: <?php echo ut_collect_option( 'ut_caption_title_color', '#FFF' ); ?>;
                    text-shadow: 0 0 40px <?php echo ut_collect_option( 'ut_caption_title_color', '#FFF' ); ?>, 2px 2px 3px black;
                }

                <?php

                /**
                 * Hero Caption Slogan Border Color
                 */

                $ut_caption_slogan_border_color = ut_collect_option('ut_caption_slogan_border_color' );

                if( $ut_caption_slogan_border_color && ut_return_hero_config('ut_hero_style' , 'ut-hero-style-1') == 'ut-hero-style-3' ) : ?>

                .ut-hero-style-3 .hero-description {
                    border-color: <?php echo $ut_caption_slogan_border_color; ?> !important;
                }

                <?php endif;

                $ut_caption_slogan_border_color = ut_collect_option('ut_caption_slogan_border_color', $this->accent );

                if( ut_return_hero_config('ut_hero_style' , 'ut-hero-style-1') == 'ut-hero-style-5' ) : ?>

                .ut-hero-style-5 .hero-description {
                    border-color: <?php echo $ut_caption_slogan_border_color; ?> !important;
                }

                <?php endif; ?>


                <?php

                /**
                 * Hero Caption Style Border
                 */

                $ut_hero_style_5_border_bottom = ut_return_hero_config('ut_hero_style_5_border_bottom', 'off');

                if( $ut_hero_style_5_border_bottom == 'on' && ut_return_hero_config('ut_hero_style' , 'ut-hero-style-1') == 'ut-hero-style-5' ) : ?>

                #ut-hero .ut-hero-style-5 .hero-title {
                    margin-bottom: 20px;
                }

                #ut-hero .ut-hero-style-5 .hero-title:after {
                    content: "";
                    display: block;
                    background-color: <?php echo ut_return_hero_config('ut_hero_style_5_border_color', '#FFFFFF' ); ?>;
                    width: <?php echo $this->add_px_value( ut_return_hero_config('ut_hero_style_5_border_width', '30' ) ); ?>;
                    height: <?php echo $this->add_px_value( ut_return_hero_config('ut_hero_style_5_border_height', '1' ) ); ?>;
                    margin: <?php echo $this->add_px_value( ut_return_hero_config('ut_hero_style_5_spacing_top', '15' ) ); ?> auto 0;
                }

                #ut-hero .ut-hero-style-5 .ut-hero-custom-left .hero-title:after {
                    margin: <?php echo $this->add_px_value( ut_return_hero_config('ut_hero_style_5_spacing_top', '15' ) ); ?> 0 0;
                }

                #ut-hero .ut-hero-style-5 .ut-hero-custom-right .hero-title:after {
                    margin: <?php echo $this->add_px_value( ut_return_hero_config('ut_hero_style_5_spacing_top', '15' ) ); ?> 0 0 auto;
                }

                <?php endif; ?>

                <?php

                /**
                 * Hero Caption Style 7 Border
                 */

                if( ut_return_hero_config('ut_hero_style' , 'ut-hero-style-1') == 'ut-hero-style-7' ) : ?>

                #ut-hero .ut-hero-style-7 .hero-title {
                    border-color: <?php echo ut_return_hero_config('ut_hero_style_7_border_color', ut_collect_option( 'ut_caption_title_color', '#FFF' ) ); ?>;
                }

                <?php endif; ?>


                <?php

                /**
                 * Hero Caption Title Text Transform
                 */

                if( ut_return_hero_config('ut_hero_caption_title_uppercase' ) == 'on' ) : ?>

                .hero-title {
                    text-transform: uppercase !important;
                }

                <?php elseif( ut_return_hero_config('ut_hero_caption_title_uppercase' ) == 'off' )  : ?>

                .hero-title {
                    text-transform: none !important;
                }

                <?php endif; ?>

                <?php

                /**
                 * Hero Caption Title Font Face
                 */

                if( isset( $this->ID ) && get_post_meta( $this->ID, 'ut_page_hero_font_global_overwrite', true ) == 'on' ) :

                    echo $this->font_style_css( array(
                        'selector' => '#ut-hero .hero-title',
                        'font-type' => get_post_meta( $this->ID, 'ut_page_hero_font_type', true ),
                        'font-style' => get_post_meta( $this->ID, 'ut_page_hero_font_style', true ),
                        'google-font-style' => get_post_meta( $this->ID, 'ut_google_page_hero_font_style', true ),
                        'websafe-font-style' => get_post_meta( $this->ID, 'ut_page_hero_websafe_font_style', true ),
                        'custom-font-style' => get_post_meta( $this->ID, 'ut_page_hero_custom_font_style', true )
                    ) );

                endif; ?>


                <?php

                /**
                 * Hero Caption Title Text
                 */

                if( isset( $this->ID ) && get_post_meta( $this->ID, 'ut_page_hero_font_size', true ) ) :

                    echo $this->responsive_font_style_single( '#ut-hero .hero-title', get_post_meta( $this->ID, 'ut_page_hero_font_size', true ), 'font-size', true );

                endif; ?>


                <?php

                /**
                 * Hero Caption Title Font Weight
                 */

                if( isset( $this->ID ) && get_post_meta( $this->ID, 'ut_page_hero_font_weight', true ) ) : ?>

                #ut-hero .hero-title { font-weight: <?php echo get_post_meta( $this->ID, 'ut_page_hero_font_weight', true ); ?>; }

                <?php endif; ?>


                <?php

                /**
                 * Hero Caption Title Line Height
                 */

                if( isset( $this->ID ) && get_post_meta( $this->ID, 'ut_page_hero_font_line_height', true ) ) :

                    echo $this->responsive_font_style_single( '#ut-hero .hero-title', get_post_meta( $this->ID, 'ut_page_hero_font_line_height', true ), 'line-height' );

                endif; ?>

                <?php

                /**
                 * Hero Caption Title Letter spacing
                 */


                if( $ut_hero_caption_title_letter_spacing = ut_return_hero_config('ut_hero_caption_title_letter_spacing') ) : ?>

                .hero-title {
                    letter-spacing: <?php echo $this->add_px_value( $ut_hero_caption_title_letter_spacing ); ?>;
                }

                <?php endif; ?>

                <?php

                /**
                 * Hero Caption Title Linebreaks Tablet
                 */

                if( ut_return_hero_config('ut_hero_caption_title_linebreak_tablet' ) == 'hide' ) : ?>
                @media (min-width: 768px) and (max-width: 1024px) {
                    .hero-title br {
                        display: none;
                    }
                }
                <?php endif; ?>

                <?php

                /**
                 * Hero Caption Title Linebreaks Mobiles
                 */

                if( ut_return_hero_config('ut_hero_caption_title_linebreak_mobile', 'hide' ) == 'hide' ) : ?>
                @media (max-width: 767px) {
                    .hero-title br {
                        display: none;
                    }
                }
                <?php endif; ?>


                <?php

                /**
                 * Hero Description Top Font Settings
                 */

                if( is_home() || is_singular("post") ) {

                    echo $this->font_style_css( array(
                        'selector' => '#ut-hero .hero-description',
                        'font-type' => ot_get_option('ut_blog_catchphrase_top_font_type', 'ut-websafe' ),
                        'font-style' => ot_get_option('ut_blog_catchphrase_top_font_style', 'semibold' ),
                        'google-font-style' => ot_get_option('ut_google_blog_catchphrase_top_font_style'),
                        'websafe-font-style' => ot_get_option('ut_blog_catchphrase_top_websafe_font_style'),
						'custom-font-style' => ot_get_option('ut_blog_catchphrase_top_custom_font_style')
                    ) );

                } else {

                    echo $this->font_style_css( array(
                        'selector' => '#ut-hero .hero-description',
                        'font-type' => ot_get_option('ut_front_catchphrase_top_font_type', 'ut-websafe' ),
                        'font-style' => ot_get_option('ut_front_catchphrase_top_font_style', 'semibold' ),
                        'google-font-style' => ot_get_option('ut_google_front_catchphrase_top_font_style'),
                        'websafe-font-style' => ot_get_option('ut_front_catchphrase_top_websafe_font_style'),
						'custom-font-style' => ot_get_option('ut_front_catchphrase_top_custom_font_style')
                    ) );

                }

                /**
                 * Hero Title Font Settings
                 */

                if( is_front_page() || is_singular('portfolio') || is_page() || is_404() || is_archive() || is_author() || is_search() || ut_is_shop() || apply_filters( 'ut_maintenance_mode_active', false ) ) {

                    if( $ut_hero_type == 'splithero' && ot_get_option( 'ut_split_hero_custom_font' , 'no' ) == 'yes' ) {

                        echo $this->font_style_css( array(
                            'selector' => '.ut-hero-highlighted-header .hero-title',
                            'font-type' => ot_get_option('ut_split_hero_font_type', 'ut-websafe' ),
                            'font-style' => ot_get_option('ut_split_hero_font_style', 'semibold' ),
                            'google-font-style' => ot_get_option('ut_google_split_hero_font_style'),
                            'websafe-font-style' => ot_get_option('ut_split_hero_websafe_font_style'),
							'custom-font-style' => ot_get_option('ut_split_hero_custom_font_style')
                        ) );

                    } else {

                        echo $this->font_style_css( array(
                            'selector' => '.hero-title',
                            'font-type' => ot_get_option('ut_front_hero_font_type', 'ut-websafe' ),
                            'font-style' => ot_get_option('ut_front_page_hero_font_style', 'semibold' ),
                            'google-font-style' => ot_get_option('ut_google_front_page_hero_font_style'),
                            'websafe-font-style' => ot_get_option('ut_front_page_hero_websafe_font_style'),
							'custom-font-style' => ot_get_option('ut_front_page_hero_custom_font_style')
                        ) );

                    }

                }

                /**
                 * Hero Description Bottom Font Settings
                 */

                if( is_home() || is_singular("post") ) {

                    echo $this->font_style_css( array(
                        'selector' => '#ut-hero .hero-description-bottom',
                        'font-type' => ot_get_option('ut_blog_catchphrase_font_type', 'ut-websafe' ),
                        'font-style' => ot_get_option('ut_blog_catchphrase_font_style', 'semibold' ),
                        'google-font-style' => ot_get_option('ut_google_blog_catchphrase_font_style'),
                        'websafe-font-style' => ot_get_option('ut_blog_catchphrase_websafe_font_style'),
						'custom-font-style' => ot_get_option('ut_blog_catchphrase_custom_font_style')
                    ) );

                } else {

                    echo $this->font_style_css( array(
                        'selector' => '#ut-hero .hero-description-bottom',
                        'font-type' => ot_get_option('ut_front_catchphrase_font_type', 'ut-websafe' ),
                        'font-style' => ot_get_option('ut_front_catchphrase_font_style', 'semibold' ),
                        'google-font-style' => ot_get_option('ut_google_front_catchphrase_font_style'),
                        'websafe-font-style' => ot_get_option('ut_front_catchphrase_websafe_font_style'),
						'custom-font-style' => ot_get_option('ut_front_catchphrase_custom_font_style')
                    ) );

                }


                /**
                 * Hero Meta Description Bottom (Single Posts) Font Settings
                 */
                if( $this->typography_css( '#ut-hero .ut-hero-meta-description-holder', ot_get_option( 'ut_hero_post_meta_description_websafe_font_style' ) ) ) {

                    echo $this->typography_css( '#ut-hero .ut-hero-meta-description-holder', ot_get_option( 'ut_hero_post_meta_description_websafe_font_style' ) );

                }

                /**
                 * Hero Description Bottom Page Custom Font Settings
                 */

                if( $this->typography_css( '#ut-hero .hero-description-bottom', ut_return_hero_config( 'ut_hero_catchphrase_websafe_font_style' ) ) ) {

                    echo $this->typography_css( '#ut-hero .hero-description-bottom', ut_return_hero_config( 'ut_hero_catchphrase_websafe_font_style' ) );

                }

                /**
                 * Hero Description Top Page Custom Font Settings
                 */

                if( $this->typography_css( '#ut-hero .hero-description', ut_return_hero_config( 'ut_hero_catchphrase_websafe_top_font_style' ) ) ) {

                    echo $this->typography_css( '#ut-hero .hero-description', ut_return_hero_config( 'ut_hero_catchphrase_websafe_top_font_style' ) );

                }

                ?>

                <?php

				$ut_hero_catchphrase_color = ut_return_hero_config('ut_hero_catchphrase_color', ot_get_option('ut_global_hero_catchphrase_color') );

				if( $ut_hero_catchphrase_color && $this->is_gradient( $ut_hero_catchphrase_color ) ) :

					echo $this->create_gradient_css( $ut_hero_catchphrase_color, '.hero-description-bottom', false, 'background' );
					echo $this->create_background_clip( '.hero-description-bottom' );

				elseif( $ut_hero_catchphrase_color ) : ?>

                .hero-description-bottom { color: <?php echo $ut_hero_catchphrase_color; ?>; }

                <?php

                /**
                 * Hero Caption Slogan Glow Color
                 */

                $ut_hero_caption_description_glow = $ut_hero_catchphrase_color;

                if( ut_collect_option('ut_caption_description_glow_color') ) {

                    $ut_hero_caption_description_glow = ut_collect_option('ut_caption_description_glow_color');

                } ?>

                <?php if( ut_collect_option( 'ut_caption_description_glow', 'off' ) == 'on' ) : ?>

                .hero-description-bottom {
                    color: <?php echo $ut_hero_catchphrase_color; ?>;
                    text-shadow: 0 0 40px <?php echo $ut_hero_caption_description_glow; ?>, 2px 2px 3px <?php echo ut_collect_option('ut_caption_description_glow_shadow_color', 'black') ?>;
                }

                <?php endif; ?>

                <?php endif; ?>


                <?php 
			
				/** 
                 * Hero Description Bottom Spacing
                 */
			
				if( ut_collect_option( 'ut_caption_description_margin' ) ) : ?>

                .hdb { margin-top: <?php echo $this->add_px_value( ut_collect_option( 'ut_caption_description_margin' ) ); ?>;}
                .archive .hdb { margin-top: <?php echo $this->add_px_value( ut_collect_option( 'ut_caption_description_margin' ) ); ?> !important;}
                .error404 .hdb { margin-top: <?php echo $this->add_px_value( ut_collect_option( 'ut_caption_description_margin' ) ); ?> !important;}

                <?php endif; ?>

                <?php 
			
				/** 
                 * Post Hero Description Bottom Spacing
                 */
			
				if( is_singular('post') && ut_collect_option( 'ut_post_caption_description_margin', false, 'ut_' ) ) : ?>

                .hdb { margin-top: <?php echo $this->add_px_value( ut_collect_option( 'ut_post_caption_description_margin', false, 'ut_' ) ); ?>;}

                <?php endif; ?>


                <?php
                
                /** 
                 * Hero Caption Description Linebreaks Tablet
                 */
                
                if( ut_return_hero_config('ut_hero_catchphrase_linebreak_tablet' ) == 'hide' ) : ?>
                @media (min-width: 768px) and (max-width: 1024px) {
                    .hero-description-bottom br {
                        display: none;
                    }
                }
                <?php endif; ?>

                <?php
                
                /** 
                 * Hero Caption Description Linebreaks Mobiles
                 */
                
                if( ut_return_hero_config('ut_hero_catchphrase_linebreak_mobile', 'hide' ) == 'hide' ) : ?>
                @media (max-width: 767px) {
                    .hero-description-bottom br {
                        display: none;
                    }
                }
                <?php endif; ?>


                <?php
                
                /**
                 * Hero Primary Button Style for all pages  
                 */
                             
                if( ut_collect_option( 'ut_main_hero_button_style', 'default' ) == 'custom') {
                    
                    echo $this->create_button('.hero-btn' , ut_collect_option('ut_main_hrbtn') );
                    
                } 
                
                ?>

                <?php
                
                /**
                 * Hero Secondary Button Style for all pages  
                 */
                             
                if( ut_collect_option( 'ut_second_button_style', 'default' ) == 'custom') {
                    
                    echo $this->create_button('.hero-second-btn' , ut_return_hero_config('ut_second_hero_button_settings') );
                    
                } 
                
                ?>


                <?php
                
                /** 
                 * Hero Border Bottom 
                 */
                
                if( ut_collect_option('ut_hero_buttons_margin') ) {
                    
                    echo '#ut-hero .hero-btn-holder { margin-top: ' , $this->add_px_value( ut_collect_option('ut_hero_buttons_margin', 0 ) ) . '; }';
                    
                }
                
                ?>


                <?php
                
                /** 
                 * Hero Border Bottom 
                 */
                if( ut_return_hero_config('ut_hero_border_bottom' , 'off' ) == 'on') {
                   
                    if( ut_return_hero_config('ut_hero_overlay') == 'on') {
                        
                        echo '#ut-hero .parallax-overlay { border-bottom: ' , $this->add_px_value( ut_return_hero_config('ut_hero_border_bottom_width' , 1 ) ) , ' '.ut_return_hero_config('ut_hero_border_bottom_style' , 'solid' ) , ' ' , ut_return_hero_config('ut_hero_border_bottom_color', $this->accent ) , '; }';                        
                        
                    } else {
                        
                        echo '#ut-hero { border-bottom: ' , $this->add_px_value( ut_return_hero_config('ut_hero_border_bottom_width' , 1 ) ) , ' '.ut_return_hero_config('ut_hero_border_bottom_style' , 'solid' ) , ' ' , ut_return_hero_config('ut_hero_border_bottom_color', $this->accent ) , '; }';
                        
                    }
                   
                    if( ut_return_hero_config( 'ut_hero_separator_bottom', 'off' ) == 'on') {
                        
                        echo '#ut-hero .bklyn-section-separator-bottom { border-bottom: ' , $this->add_px_value( ut_return_hero_config('ut_hero_border_bottom_width' , 1 ) ) , ' '.ut_return_hero_config('ut_hero_border_bottom_style' , 'solid' ) , ' ' , ut_return_hero_config('ut_hero_border_bottom_color', $this->accent ) , '; }';
                        
                    }
                    
                    // custom hero border bottom
                    echo '#ut-custom-hero { border-bottom: ' , $this->add_px_value( ut_return_hero_config('ut_hero_border_bottom_width' , 1 ) ) , ' '.ut_return_hero_config('ut_hero_border_bottom_style' , 'solid' ) , ' ' , ut_return_hero_config('ut_hero_border_bottom_color', $this->accent ) , '; }';
                    
                }
                
                ?>


                <?php 
                
                /** 
                 * Fancy Border
                 */
            
                if( ut_return_hero_config( 'ut_hero_fancy_border', 'off' ) == 'on') : ?>

                #ut-hero .ut-fancy-border {
                    display: block;
                    position: absolute;
                    bottom: 0;
                    left: 0;
                    width: 100%;
                    background:<?php echo ut_return_hero_config( 'ut_hero_fancy_border_background_color' , '#FFF' ); ?>;
                    border-bottom:<?php echo ut_return_hero_config( 'ut_hero_fancy_border_size' , '10px' ); ?>;
                    border-color:<?php echo ut_return_hero_config( 'ut_hero_fancy_border_color' , $this->accent ); ?>;
                    border-style: dashed;
                    z-index:9999;
                }

                <?php endif; ?>


                <?php
                
                /** 
                 * Hero Background Image for Tablet Slider 
                 */
			
                if( $ut_hero_type == 'tabs' ) {
                    
                    echo $this->global_headline_font_style('.ut-tablets-title', ut_return_hero_config('ut_tabs_headline_style', 'semibold') );
                    
                    /* hero type tabs uses a different header image */            
                    echo $this->css_background( '.hero .parallax-image-container', ut_return_hero_config('ut_hero_image', '' , true ) );
                    
                } 
			
                /**
                 * Hero Background Image 
                 */

                if( $ut_hero_type == 'image' || $ut_hero_type == 'splithero' ) :
                    
                    $ut_hero_image = ut_collect_option('ut_hero_image');

                    // featured image as hero background
                    if( isset( $this->ID ) && ( is_singular( 'post' ) || is_array( $ut_hero_image ) && empty( $ut_hero_image['background-image'] ) || empty( $ut_hero_image ) && !is_array( $ut_hero_image ) ) ) {
                        
                        $ut_hero_image = wp_get_attachment_url( get_post_thumbnail_id( $this->ID ) );
                        $ut_hero_image = ut_resize( $ut_hero_image, 1920, 1080, false );

                    }
            
                    if( is_array( $ut_hero_image ) && !empty( $ut_hero_image['background-image'] ) ) {

                        echo $this->css_background( '.hero .parallax-image-container' , $ut_hero_image );

                    } elseif( !empty( $ut_hero_image ) && !is_array( $ut_hero_image ) ) {

                        echo '.hero .parallax-image-container { background-image: url(' , esc_url( $ut_hero_image ) , '); }'. "\n";

                    }
                        
                    // Mobile Versions
                    $ut_hero_image_tablet = ut_collect_option('ut_hero_image_tablet');
                    $ut_hero_image_mobile = ut_collect_option('ut_hero_image_mobile');
                    
                    // only for desktop responsive
                    if( !is_singular( 'post' ) ) {

                        if( !unite_mobile_detection()->isMobile() && !unite_mobile_detection()->isTablet() ) {

                            if( is_array( $ut_hero_image_tablet ) && !empty( $ut_hero_image_tablet['background-image'] ) ) {

                                echo '@media (min-width: 768px) and (max-width: 1024px) {';

                                    echo $this->css_background( '.hero .parallax-image-container' , $ut_hero_image_tablet );

                                echo '}';

                            }

                            if( is_array( $ut_hero_image_mobile ) && !empty( $ut_hero_image_mobile['background-image'] ) ) {

                                echo '@media (max-width: 767px) {';

                                    echo $this->css_background( '.hero .parallax-image-container' , $ut_hero_image_mobile );

                                echo '}';

                            }

                        }

                        // only for tablet
                        if( unite_mobile_detection()->isTablet() && is_array( $ut_hero_image_tablet ) && !empty( $ut_hero_image_tablet['background-image'] ) ) {

                            echo $this->css_background( '.hero .parallax-image-container' , $ut_hero_image_tablet );

                        }

                        // only for mobile
                        if( !unite_mobile_detection()->isTablet() && unite_mobile_detection()->isMobile() && is_array( $ut_hero_image_mobile ) && !empty( $ut_hero_image_mobile['background-image'] ) ) {

                            echo $this->css_background( '.hero .parallax-image-container' , $ut_hero_image_mobile );

                        }

                    }
            
                endif; ?>


                <?php
                
                /**
                 * Video Poster 
                 */
                
                if( $ut_hero_type == 'video' ) :
                    
                    /* video poster image for mobile devices */
                    $ut_video_poster = ut_return_hero_config('ut_video_poster');
                    $ut_video_poster_background = ut_return_hero_config('ut_video_poster_background_position');

                    if( !empty( $ut_video_poster ) || !empty( $ut_video_poster ) && unite_mobile_detection()->isMobile() ) {

                        $background_position = !empty( $ut_video_poster_background ) ? $ut_video_poster_background : 'center center';

                        echo '#ut-hero.hero .parallax-scroll-container { 
                            background-image: url(' . esc_url( $ut_video_poster ) . ');
                            background-size: cover !important;
                            background-position: ' . esc_attr( $background_position ) . ';
                        }'. "\n";                    
                        
                    }
                    
                    // Mobile Versions
                    $ut_video_poster_tablet = ut_return_hero_config('ut_video_poster_tablet');
                    $ut_video_poster_tablet_background = ut_return_hero_config('ut_video_poster_tablet_background_position');

                    $ut_video_poster_mobile = ut_return_hero_config('ut_video_poster_mobile');
                    $ut_video_poster_mobile_background = ut_return_hero_config('ut_video_poster_mobile_background_position');
                    
                    // only for desktop responsive 
                    if( !unite_mobile_detection()->isMobile() && !unite_mobile_detection()->isTablet() ) {
            
                        if( !empty( $ut_video_poster_tablet ) ) {

                            $background_position = !empty( $ut_video_poster_tablet_background ) ? $ut_video_poster_tablet_background : 'center center';

                            echo '@media (min-width: 768px) and (max-width: 1024px) {';
                                    
                                echo '#ut-hero.hero .parallax-scroll-container { 
                                    background-image: url(' . esc_url( $ut_video_poster_tablet ) . ');
                                    background-size: cover !important;
                                    background-position: ' . esc_attr( $background_position ) . ';
                                }'. "\n"; 

                            echo '}';

                        }

                        if( !empty( $ut_video_poster_mobile ) ) {

                            $background_position = !empty( $ut_video_poster_mobile_background ) ? $ut_video_poster_mobile_background : 'center center';

                            echo '@media (max-width: 767px) {';
                                    
                                echo '#ut-hero.hero .parallax-scroll-container { 
                                    background-image: url(' . esc_url( $ut_video_poster_mobile ) . ');
                                    background-size: cover !important;
                                    background-position: ' . esc_attr( $background_position ) . ';
                                }'. "\n";
                            

                            echo '}';

                        }
                    
                    }
            
                    // only for tablet
                    if( unite_mobile_detection()->isTablet() && !empty( $ut_video_poster_tablet ) ) {

                        $background_position = !empty( $ut_video_poster_tablet_background ) ? $ut_video_poster_tablet_background : 'center center';

                        echo '@media (min-width: 768px) and (max-width: 1024px) {';

                            echo '#ut-hero.hero .parallax-scroll-container { 
                                background-image: url(' . esc_url( $ut_video_poster_tablet ) . ');
                                background-size: cover !important;
                                background-position: ' . esc_attr( $background_position ) . ';
                            }'. "\n"; 

                        echo '}';
                        
                        
                    }

                    // only for mobile
                    if( !unite_mobile_detection()->isTablet() && unite_mobile_detection()->isMobile() && !empty( $ut_video_poster_mobile ) ) {

                        $background_position = !empty( $ut_video_poster_mobile_background ) ? $ut_video_poster_mobile_background : 'center center';

                        echo '@media (max-width: 767px) {';
                                    
                            echo '#ut-hero.hero .parallax-scroll-container { 
                                background-image: url(' . esc_url( $ut_video_poster_mobile ) . ');
                                background-size: cover !important;
                                background-position: ' . esc_attr( $background_position ) . ';
                            }'. "\n";


                        echo '}';                        
                        
                    } 
            
                    // hide video controls on mobile
                    if( unite_mobile_detection()->isMobile() ) {
                                        
                        echo '#ut-hero.ut-video-control {
                            display:none !important;
                        }';
                    
                    }
                    
                endif; ?>


                <?php
                
                /** 
                 * Video Position for selfhosted Videos
                 */
                 
                if( ut_return_hero_config('ut_video_source' , 'youtube') == 'selfhosted' && !unite_mobile_detection()->isMobile() && ut_return_hero_config('ut_video_containment' , 'hero') == 'body' && is_front_page() ) {                
                    echo '.ut-simple-video-container { position:fixed; }';
                }
                
                ?>

                <?php
                
                /**
                 * Video Position Fix
                 */
                
                if( !is_home() ) {
                             
                    echo '#wrapper_mbYTP_ut-background-video-hero { min-width: 100% !important; }';
                
                } ?>


                <?php 
                
                /**
                 * Split Hero 
                 */
                
                if( $ut_hero_type == 'splithero' ) {
                    
                    $split_image_max_width = ut_return_hero_config('ut_hero_split_image_width');
                    
                    /* check if value is available */
                    $split_image_max_width = empty( $split_image_max_width ) ? '60' : $split_image_max_width;
                    
                    echo '#ut-hero .ut-split-image { max-width: ' , $split_image_max_width , '% !important; }'. "\n";
                    
                
                }
                
                ?>


                <?php
                
                /** 
                 * Split Hero - Video Padding 
                 */
                 
                if( $ut_hero_type == 'splithero' ) {
                
                    echo '.ut-hero-video-boxed { padding: ' , $this->add_px_value( ut_return_hero_config('ut_hero_split_video_box_padding', '20') ) , '; }';                
                
                }
                
                ?>

                <?php
                
                /**
                 * Animated Image 
                 */
                 
                if( $ut_hero_type == 'animatedimage' ) {
                    
                    $header_image = ut_return_hero_config('ut_hero_animated_image');
                    $mobile_image = ut_return_hero_config('ut_hero_animated_image_mobile');
                    $repeat		  = ut_return_hero_config('ut_hero_animated_image_repeat') ? ut_return_hero_config('ut_hero_animated_image_repeat') : 'repeat-x';
					$size		  = ut_return_hero_config('ut_hero_animated_image_size') ? ut_return_hero_config('ut_hero_animated_image_size') : 'unset';
					
                    if( !empty( $header_image ) ) :
                    
                        echo '@media (min-width: 1025px) {
                        
                            #ut-hero .parallax-scroll-container { 
                                background-position: 0px 0px;
                                background-repeat: ' . $repeat . ' ;
                                background-image: url("' . esc_url( $header_image ) . '"); 
                            }

                            #ut-hero.ut-hero-animated-background .parallax-scroll-container {
                                opacity:0;
                            }

                            #ut-hero.ut-hero-animated-background .parallax-scroll-container.ut-hero-ready {
                                opacity:1;
                            }

                            #ut-hero .parallax-scroll-container.ut-animated-image-background {
                                background-size: ' . $size . ' !important;
                            }
                        
                        }';
                    
                    endif; 
                    
                    if( !empty( $mobile_image ) ) : ?>

                @media (max-width: 1024px) {

                    #ut-hero .parallax-scroll-container {
                        background-position: 0px 0px;
                        background-repeat: repeat-x;
                        background-size: cover;
                        background-image: url("<?php echo esc_url( $mobile_image ); ?>");
                    }

                }

                <?php elseif( !empty( $header_image ) ) : ?>

                @media (max-width: 1024px) {

                    #ut-hero .parallax-scroll-container {
                        background-position: 0px 0px;
                        background-repeat: repeat-x;
                        background-size: cover;
                        background-image: url("<?php echo esc_url( $header_image ); ?>");
                    }

                }

                <?php endif;

            }

            ?>


                <?php
                
                /**
                 * Background Slider Arrow Colors 
                 */
                 
                if( $ut_hero_type == 'slider' ) {
                    
                    if( ut_return_hero_config('ut_background_slider_arrow_background_color') ) {
                        
                        echo '#ut-hero .ut-flex-control { background: ' , ut_return_hero_config('ut_background_slider_arrow_background_color') , '; }';
                        echo '#ut-hero .ut-flex-control:visited { background: ' , ut_return_hero_config('ut_background_slider_arrow_background_color') , '; }';
                        
                    }
                    
                    if( ut_return_hero_config('ut_background_slider_arrow_background_color_hover') ) {
                        
                        echo '#ut-hero .ut-flex-control:hover { background: ' , ut_return_hero_config('ut_background_slider_arrow_background_color_hover') , '; }';
                        echo '#ut-hero .ut-flex-control:active{ background: ' , ut_return_hero_config('ut_background_slider_arrow_background_color_hover') , '; }';
                        
                    }
                    
                    if( ut_return_hero_config('ut_background_slider_arrow_color') ) {
                        
                        echo '#ut-hero .ut-flex-control { color: ' , ut_return_hero_config('ut_background_slider_arrow_color') , '; }';
                        echo '#ut-hero .ut-flex-control:visited { color: ' , ut_return_hero_config('ut_background_slider_arrow_color') , '; }';
                        
                    }
                    
                    if( ut_return_hero_config('ut_background_slider_arrow_color_hover') ) {
                        
                        echo '#ut-hero .ut-flex-control:hover { color: ' , ut_return_hero_config('ut_background_slider_arrow_color_hover') , '; }';
                        echo '#ut-hero .ut-flex-control:active{ color: ' , ut_return_hero_config('ut_background_slider_arrow_color_hover') , '; }';
                        
                    }
                    
                }
                
                ?>

                <?php
                
                /**
                 * Fancy Slider 
                 */
                
                if( $ut_hero_type == 'transition' ) {
                    
                    $slider_height = ut_return_hero_config('ut_fancy_slider_height' , '60' ) > 100 ? 100 : ut_return_hero_config('ut_fancy_slider_height' , '60' );
                    echo '#ut-sitebody:not(.ut-page-has-no-content) #ut-hero { height: ' , $slider_height , '%; min-height: ' , $slider_height , '%; }';    
                
                }
                
                ?>


                <?php
                
                /**
                 * Custom Section
                 */
                
                if( $ut_hero_type == 'cblock' ) {
                    
                    $cblock_custom_css = get_post_meta( ut_return_hero_config('ut_hero_content_block'), '_wpb_shortcodes_custom_css', true );
                    
                    if( $cblock_custom_css ) {
                        echo $cblock_custom_css;    
                    }
                
                }
                
                ?>

                /**
                 * Stupid Simple Slider
                 */

                <?php if( $ut_hero_type == 'imagefader' ) {
                    
                    $gallery           = ut_return_hero_config('ut_hero_image_fader');
                    $gallery_positions = ut_return_hero_config('ut_hero_image_fader_position');

                    if( !empty( $gallery ) ) {
                        
                        $gallery = explode( ',', $gallery );
                        
                        foreach( $gallery as $key => $image ) {
                            
                            $image = wp_get_attachment_url( $image );
                            
                            if( $key == 0 ) {
                                
                                echo 'ul.ut-image-fader li {
                                    background-image: url(' . esc_url( $image ) . ');
                                }' . "\n ";

                                if( !empty( $gallery_positions[$key+1]['background-position'] )  ) {
                                    echo 'ul.ut-image-fader li:first-child {
                                        background-position: ' . $gallery_positions[$key+1]['background-position'] . ';
                                    }' . "\n ";
                                }
                            
                            } else {
                            
                                echo 'ul.ut-image-fader li:nth-child(' . ( $key + 1 ) . '){
                                    background-image: url(' . esc_url( $image ) . ');
                                    -webkit-animation-delay: ' . ( 4 * ( $key ) ) . 's;
                                       -moz-animation-delay: ' . ( 4 * ( $key ) ) . 's;
                                            animation-delay: ' . ( 4 * ( $key ) ) . 's;
                                }' . "\n ";

                                if( !empty( $gallery_positions[$key+1]['background-position'] )  ) {
                                    echo 'ul.ut-image-fader li:nth-child(' . ( $key + 1 ) . '){
                                        background-position: ' . $gallery_positions[$key+1]['background-position'] . ';
                                    }' . "\n ";
                                }
                            
                            }
                            
                            // does not support more than 3 images  
                            if( $key == 2 ) {
                                
                                break;
                                
                            }
                            
                        }                        
                    
                    }
                    
                    $gallery_tablet = ut_return_hero_config('ut_hero_image_fader_tablet');
                    $gallery_positions = ut_return_hero_config('ut_page_hero_image_fader_tablet_position');
                    
                    if( !empty( $gallery_tablet ) ) {
                        
                        $gallery = explode( ',', $gallery_tablet );
                        
                        echo '@media (min-width: 768px) and (max-width: 1024px) {';
                            
                            foreach( $gallery as $key => $image ) {
                                
                                $image = wp_get_attachment_url( $image );
                                
                                if( $key == 0 ) {
                                    
                                    echo 'ul.ut-image-fader li {
                                        background-image: url(' . esc_url( $image ) . ');
                                    }' . "\n ";

                                    if( !empty( $gallery_positions[$key+1]['background-position'] )  ) {
                                        echo 'ul.ut-image-fader li:first-child {
                                            background-position: ' . $gallery_positions[$key+1]['background-position'] . ';
                                        }' . "\n ";
                                    }
                                
                                } else {
                                
                                    echo 'ul.ut-image-fader li:nth-child(' . ( $key + 1 ) . '){
                                        background-image: url(' . esc_url( $image ) . ');
                                        -webkit-animation-delay: ' . ( 4 * ( $key ) ) . 's;
                                           -moz-animation-delay: ' . ( 4 * ( $key ) ) . 's;
                                                animation-delay: ' . ( 4 * ( $key ) ) . 's;
                                    }' . "\n ";

                                    if( !empty( $gallery_positions[$key+1]['background-position'] )  ) {
                                        echo 'ul.ut-image-fader li:nth-child(' . ( $key + 1 ) . '){
                                            background-position: ' . $gallery_positions[$key+1]['background-position'] . ';
                                        }' . "\n ";
                                    }
                                
                                }
                                
                                // does not support more than 3 images  
                                if( $key == 2 ) {
                                    
                                    break;
                                    
                                }
                                
                            }
                        
                        echo '}';                        
                    
                    }
                    
                    $gallery_mobile = ut_return_hero_config('ut_hero_image_fader_mobile');
                    $gallery_positions = ut_return_hero_config('ut_page_hero_image_fader_mobile_position');

                    if( !empty( $gallery_mobile ) ) {
                        
                        $gallery = explode( ',', $gallery_mobile );
                        
                        echo '@media (max-width: 767px) {';
                            
                            foreach( $gallery as $key => $image ) {
                                
                                $image = wp_get_attachment_url( $image );
                                
                                if( $key == 0 ) {
                                    
                                    echo 'ul.ut-image-fader li {
                                        background-image: url(' . esc_url( $image ) . ');
                                    }' . "\n ";

                                    if( !empty( $gallery_positions[$key+1]['background-position'] )  ) {
                                        echo 'ul.ut-image-fader li:first-child {
                                            background-position: ' . $gallery_positions[$key+1]['background-position'] . ';
                                        }' . "\n ";
                                    }
                                
                                } else {
                                
                                    echo 'ul.ut-image-fader li:nth-child(' . ( $key + 1 ) . '){
                                        background-image: url(' . esc_url( $image ) . ');
                                        -webkit-animation-delay: ' . ( 4 * ( $key ) ) . 's;
                                           -moz-animation-delay: ' . ( 4 * ( $key ) ) . 's;
                                                animation-delay: ' . ( 4 * ( $key ) ) . 's;
                                    }' . "\n ";

                                    if( !empty( $gallery_positions[$key+1]['background-position'] )  ) {
                                        echo 'ul.ut-image-fader li:nth-child(' . ( $key + 1 ) . '){
                                            background-position: ' . $gallery_positions[$key+1]['background-position'] . ';
                                        }' . "\n ";
                                    }
                                
                                }
                                
                                // does not support more than 3 images  
                                if( $key == 2 ) {
                                    
                                    break;
                                    
                                }
                                
                            }
                        
                         echo '}';                          
                    
                    }
                                    
                }  ?>


                <?php
                
                /**
                 * Hero Overlay Styling 
                 */

                if( ut_return_hero_config('ut_hero_overlay_color') ) {
                    
                    if( $this->is_gradient( ut_return_hero_config( 'ut_hero_overlay_color' ) ) ) {
                        
                        echo $this->create_gradient_css( ut_return_hero_config( 'ut_hero_overlay_color' ), '.hero .parallax-overlay' );                        
                    
                    } elseif ( preg_match( '/^#[a-f0-9]{6}$/i', ut_return_hero_config( 'ut_hero_overlay_color' ) ) ) {    
                        
                        echo '.hero .parallax-overlay { background-color: rgba(' . $this->hex_to_rgb( ut_return_hero_config( 'ut_hero_overlay_color' ) ) . ' , ' , ut_return_hero_config('ut_hero_overlay_color_opacity' , '0.8') , ' ) !important; }'. "\n";    
                        
                    } else {
                        
                        echo '.hero .parallax-overlay { background-color: ' . ut_return_hero_config( 'ut_hero_overlay_color' ) . ' !important; }'. "\n";    
                        
                    }
                   
                }
                
                // Single Post Hero Overlay Color
                if( is_singular('post') && ut_collect_option('ut_post_hero_overlay_color', '', 'ut_') ) {
                    
                    echo '.hero .parallax-overlay { background-color: ' . ut_collect_option('ut_post_hero_overlay_color', '', 'ut_') . ' !important; }'. "\n";    
                    
                } ?>


                <?php
                
                /** 
                 * Hero Overlay
                 */ 
                
                if( ut_return_hero_config( 'ut_hero_overlay_pattern_style', 'style_one' ) == 'custom' ) {
                    
                    echo $this->css_background( '.parallax-overlay-pattern.custom' , ut_return_hero_config('ut_hero_overlay_custom_pattern') );
                
                }
                
                ?>


                <?php 
                
                 /**
                 * Hero Scroll Down
                 */                
                
                ?>

                .hero-down-arrow a {
                    color: <?php echo ut_collect_option('ut_scroll_down_arrow_color', '#FFF' ); ?>;
                }

                .hero-down-arrow a:hover,
                .hero-down-arrow a:active {
                    color: <?php echo ut_collect_option('ut_scroll_down_arrow_color', '#FFF' ); ?>;
                }

                <?php if( ut_collect_option('ut_scroll_down_arrow_position') != '' ) : ?>

                .hero-down-arrow {

                    left: <?php echo ut_collect_option('ut_scroll_down_arrow_position'); ?>%;

                <?php if( ut_collect_option('ut_scroll_down_arrow_position') == '0' && ut_collect_option( 'ut_hero_width', 'centered' ) == 'centered' ) : ?>

                    margin-left: 10px;

                <?php endif; ?>

                <?php if( ut_collect_option('ut_scroll_down_arrow_position') == '100' && ut_collect_option( 'ut_hero_width', 'centered' ) == 'centered' ) : ?>

                    margin-left: -26px;

                <?php endif; ?>

                }

                @media (min-width: 1025px) {

                <?php if( ut_collect_option('ut_scroll_down_arrow_position') == '0' && ut_collect_option( 'ut_hero_width', 'centered' ) == 'fullwidth' ) : ?>

                    .hero-down-arrow {
                        margin-left: 30px;
                    }

                <?php endif; ?>

                <?php if( ut_collect_option('ut_scroll_down_arrow_position') == '100' && ut_collect_option( 'ut_hero_width', 'centered' ) == 'fullwidth' ) : ?>

                    .hero-down-arrow {
                        margin-left: -46px;
                    }
                <?php endif; ?>

                }

                @media (max-width: 1024px) {

                <?php if( ut_collect_option('ut_scroll_down_arrow_position') == '0' && ut_collect_option( 'ut_hero_width', 'centered' ) == 'fullwidth' ) : ?>

                    .hero-down-arrow {
                        margin-left: 10px;
                    }

                <?php endif; ?>

                <?php if( ut_collect_option('ut_scroll_down_arrow_position') == '100' && ut_collect_option( 'ut_hero_width', 'centered' ) == 'fullwidth' ) : ?>
                    .hero-down-arrow {
                        margin-left: -26px;
                    }
                <?php endif; ?>

                }

                <?php endif; ?>

                <?php if( $ut_hero_type == 'video' && ut_return_hero_config('ut_video_mute_button', 'hide') == 'show' || is_single() && 'video' == get_post_format() && ut_collect_option('ut_post_hero_mute_button', 'on', 'ut_') == 'on'  || $ut_hero_type == 'image' && ut_return_hero_config('ut_hero_rain_effect' , 'off') == 'on' && ut_return_hero_config('ut_hero_rain_sound' , 'off')== 'on' ) : ?>

                .hero-down-arrow {
                    bottom: 50px;
                }

                <?php else : ?>

                <?php if( ut_collect_option('ut_scroll_down_arrow_position_vertical') != '' ) : ?>

                .hero-down-arrow {
                    bottom: <?php echo $this->add_px_value( ut_collect_option('ut_scroll_down_arrow_position_vertical') ); ?>;
                }

                <?php endif; ?>

                <?php endif; ?>



                <?php 
                
                /**
                 * No Result Page Hero
                 */
                 
                if( is_search() && ot_get_option('ut_search_hero_background_image') ) : 
                    
                    echo $this->css_background( '.search-no-results .hero .parallax-scroll-container' , ot_get_option('ut_search_hero_background_image') );
                    echo $this->css_background( '.search-results .hero .parallax-scroll-container' , ot_get_option('ut_search_hero_background_image') );
                
                 endif; ?>

                <?php 
                
                /**
                 * 404 Page Hero
                 */
                 
                if( is_404() && ot_get_option('ut_404_hero_background_image') ) : 
                    
                    echo $this->css_background( '.error404 .hero .parallax-scroll-container' , ot_get_option('ut_404_hero_background_image') );
                
                 endif; ?>

                <?php 
                
                /**
                 * Archive Page Hero
                 */
                 
                if( is_archive() && !ut_is_shop() ) : 
                    
                    $ut_hero_image = '';
            
                    if( have_posts() ) : 
                    
                        while( have_posts() ) : the_post(); 
                            
                            if( wp_get_attachment_url( get_post_thumbnail_id() ) ) {
                                
                                $ut_hero_image = wp_get_attachment_url( get_post_thumbnail_id() );
                                break;
                                
                            }
            
                        endwhile; 
                    
                    endif;
                    
                    rewind_posts();    
            
                    $ut_hero_image = !empty( $ut_hero_image ) ? $ut_hero_image : '';
                    
                    // check if global image is available
                    $ut_global_hero_image = ot_get_option( 'ut_archive_hero_background_image' );
                    
                    if( is_array( $ut_global_hero_image ) && !empty( $ut_global_hero_image['background-image'] ) ) {
                        
                        $ut_hero_image = $ut_global_hero_image;
                        
                    }
                    
                    if( is_array( $ut_hero_image ) && !empty( $ut_hero_image['background-image'] ) ) {
                        
                        echo $this->css_background( '.hero .parallax-scroll-container' , $ut_hero_image );
                        
                    } elseif( !empty( $ut_hero_image ) && !is_array( $ut_hero_image ) ) {
                        
                        echo '.hero .parallax-scroll-container .parallax-image-container { background-image: url(' , esc_url( $ut_hero_image ) , '); }'. "\n";
                    
                    }
            
                 endif; ?>

                <?php 
                
                /**
                 * Maintance Page Hero
                 */
                 
                if( apply_filters( 'ut_maintenance_mode_active', false ) ) : 
                    
					// extra design settings
					$this->maintenance_mode();
			
                endif; ?>

            </style>

            <?php

            echo $this->minify_css( ob_get_clean() );

        }

    }

}