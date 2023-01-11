<?php

if ( ! defined( 'ABSPATH' ) ) exit;

/* 
 * The Class responsible for Header and Navigation
 */

if( !class_exists( 'UT_Navigation_CSS' ) ) {	
    
    class UT_Navigation_CSS extends UT_Custom_CSS {
        
        public function custom_css() {
            
			if( ut_return_header_config( 'ut_header_top_type', 'classic' ) == 'advanced' ) {
				return;
			}
            
			// header top layout 
			$ut_header_top_layout = apply_filters( 'unite_header_layout', 'default' );
            
            // headers with 2 rows of content
			if( $ut_header_top_layout == 'style-5' || $ut_header_top_layout == 'style-6' || $ut_header_top_layout == 'style-7' || $ut_header_top_layout == 'style-9' ) {
				
                $ut_navigation_height = 161;
                
            } elseif( $ut_header_top_layout == 'style-4' ) {
                
                $ut_navigation_height = _ut_header_style_4_logo_calculation() + 80;
                
                if( ut_return_header_config( 'ut_header_separate_upper_lower', 'on' ) == 'on' ) {                    
                    $ut_navigation_height++;
                }
                
            // headers with 1 row of content
			} else {
                
                $ut_navigation_height = ut_return_header_config('ut_navigation_height', 80);                            
                
            }
            
			// if top header is active increase the header height
			if( ut_page_option( 'ut_top_header', 'hide' ) == 'show' ) {
				
                $ut_navigation_height += 40;
                
                // top header has additional border bottom
                if( ut_return_header_config( 'ut_top_header_border_bottom', 'off' ) == 'on' ) {
                    
                    $ut_top_header_border_bottom_style = ut_return_header_config( 'ut_top_header_border_bottom_style' );
                    
                    if( isset( $ut_top_header_border_bottom_style['border-bottom-width'] ) ) {
                        
                        $ut_navigation_height += $ut_top_header_border_bottom_style['border-bottom-width'];
                        
                    }
                    
                }
                
			}
            
            if( ut_return_header_config( 'ut_navigation_skin' , 'ut-header-light' ) != 'ut-header-custom' && ut_return_header_config('ut_navigation_state') == 'on_transparent' && ut_return_header_config('ut_navigation_transparent_border') == 'on' ) {
                
                $ut_navigation_height++;
                
            }
            
            ob_start(); ?>
            
            <style id="ut-navigation-custom-css" type="text/css">

            /* Logo Background
            ================================================== */
            <?php if( ut_return_header_config( 'ut_site_logo_background', 'off' ) == 'on' && ut_return_header_config( 'ut_site_logo_background_color' ) ) : ?>

            #header-section .ut-site-logo-background::after {
                background: <?php echo ut_return_header_config( 'ut_site_logo_background_color' ); ?>
            }

            <?php endif; ?>

            /* Logo Background Skew
            ================================================== */
            <?php if( ut_return_header_config( 'ut_site_logo_background', 'off' ) == 'on' && ut_return_header_config( 'ut_site_logo_background_skew', 'on' ) == 'off' ) : ?>

            #header-section.centered .ut-site-logo-background::after {
                left: 0;
            }

            #header-section.fullwidth .ut-site-logo-background::after {
                left:0;
            }

            #header-section .ut-site-logo-background::after {
                -webkit-transform: inherit;
                -moz-transform: inherit;
                transform: inherit;
                width:100%;
            }

            #header-section .ut-site-logo-background a {
                padding: 0 1em;
            }

            #header-section[data-style="style-9"].fullwidth .ut-site-logo-background a {
                padding: 0 1em 0 0;
            }

            <?php endif; ?>

            /* Logo Glow
            ================================================== */
            <?php if( ut_return_header_config( 'ut_site_logo_glow', 'off' ) == 'on' ) : ?>

                #header-section .site-logo h1 {
                    text-shadow: 0 0 40px <?php echo ut_return_header_config( 'ut_site_logo_glow_color', $this->accent ); ?>, 2px 2px 3px <?php echo ut_return_header_config( 'ut_site_logo_glow_shadow_color', 'black' ) ?>;
                }

            <?php endif; ?>

            /* Header Placeholder CSS
            ================================================== */ 	
			#ut-header-placeholder {
				height: <?php echo $ut_navigation_height; ?>px;
                max-height: <?php echo $ut_navigation_height; ?>px;
			}	
            
            /* Hero Holder Position Top
            ==================================================
            @media (min-width: 1025px) and (max-width: 1920px) {    
                
                .ut-header-display-on-hero:not(.ut-header-transparent-on-hero) #ut-hero:not(.slider) .hero-holder { 
                    padding-top:<?php echo $ut_navigation_height; ?>px; 
                }

            } */

            /* Header Height
			================================================== */
            <?php

            // @todo check ut-horizontal-navigation .ut-menu-item-lvl-0 .bklyn-btn-menu a::after
            if( $ut_header_top_layout == 'default' || $ut_header_top_layout == 'style-1' || $ut_header_top_layout == 'style-2' || $ut_header_top_layout == 'style-3' || $ut_header_top_layout == 'style-8' ) : ?>
                
                @media (min-width: 1025px) {

                    <?php $ut_navigation_height = ut_return_header_config( 'ut_navigation_height', 80 ); ?>

                    #header-section { 
                        line-height: <?php echo $ut_navigation_height; ?>px;
                    }

                    .ut-horizontal-navigation .ut-menu-item-lvl-0 .bklyn-btn-menu a::after {
                        line-height: <?php echo $ut_navigation_height; ?>px;
                    }

                    .ut-navigation-with-description-above .ut-has-description .ut-main-navigation-link {
                        height: <?php echo $ut_navigation_height; ?>px;
                    }

                    .site-logo {
                        height: <?php echo $ut_navigation_height; ?>px !important;
                        line-height: <?php echo $ut_navigation_height; ?>px !important;
                    }

                    .ut-site-logo-background {
                        line-height: <?php echo $ut_navigation_height; ?>px !important;
                    }

                    .ut-hamburger-wrap,
                    .menu-item-object-megamenu-button {
                        height: <?php echo $ut_navigation_height; ?>px;
                    }

                    .sub-menu .menu-item-object-megamenu-button,
                    .ut-megamenu .menu-item-object-megamenu-button {
                        height: inherit;
                    }
                    
                    .ut-header-extra-module-company-social .fa-ul.ut-navigation-menu li .ut-main-navigation-link {
                        height: <?php echo $ut_navigation_height; ?>px;
                    }

                }	
			
            <?php endif;?>                 
                
            <?php 
            
            /* Easing for Logo Animation
            ================================================== */	
            if( $ut_header_top_layout == 'style-9' && ut_return_header_config( 'ut_navigation_scroll_depth', 1 ) == 1 ) : ?>    
                
                #header-section[data-style="style-9"] .site-logo,
                #header-section[data-style="style-9"] .site-logo img {    
                -webkit-transition-duration: 0.5s;
                     -o-transition-duration: 0.5s;
                        transition-duration: 0.5s;
                -webkit-animation-timing-function: ease-in-out;
                        animation-timing-function: ease-in-out;
                }
                
            <?php endif; ?>    
            
                
                
            <?php 
            
            /* Hidden Header Position after Scroll ( Default Skins )
            ================================================== */
            if( ( ut_return_header_config( 'ut_navigation_skin' , 'ut-header-light' ) == 'ut-header-dark' || ut_return_header_config( 'ut_navigation_skin' , 'ut-header-light' ) == 'ut-header-light' ) && ut_return_header_config('ut_navigation_state') == 'off' ) : ?>    
                
                <?php             
            
                // default translate
                $new_translate = 0; 
                
                if( ut_page_option( 'ut_top_header', 'hide' ) == 'show' ) {
                    
                    $new_translate = -40;
                    
                    // optional border bottom
                    $ut_top_header_border_bottom_style = ut_return_header_config( 'ut_top_header_border_bottom_style' );

                    if( !empty( $ut_top_header_border_bottom_style['border-bottom-style'] ) && $ut_top_header_border_bottom_style['border-bottom-style'] != 'none' ) {
                        
                        $new_translate -= 1;
                            
                    }
                    
                    
                }
                
                // scroll depth
                if( $ut_header_top_layout == 'style-4' || $ut_header_top_layout == 'style-5' || $ut_header_top_layout == 'style-6' || $ut_header_top_layout == 'style-7' || $ut_header_top_layout == 'style-9' ) {
                    
                    if( ut_return_header_config( 'ut_navigation_scroll_depth', 1 ) == 1 ) {
                        
                        $new_translate -= 82; // including border bottom and separator
                        
                        if( ( $ut_header_top_layout == 'style-4' || $ut_header_top_layout == 'style-7' ) && ut_return_header_config( 'ut_header_separate_upper_lower', 'on' ) == 'off' ) {
                            
                            $new_translate++;
                            
                        }
                        
                    }
                    
                } ?>
                
                #header-section .ha-header {
                    -webkit-transform: translate3d(0, 0, 0);
                    transform: translate3d(0, 0, 0);
                }
                
            <?php endif; ?>                   
                
            <?php 
            
            /* Hidden Header Position after Scroll ( Custom Skin )
            ================================================== */
            if( ut_return_header_config( 'ut_navigation_skin' , 'ut-header-light' ) == 'ut-header-custom' && ut_return_header_config('ut_navigation_customskin_state') == 'off' ) : ?>    
                
                <?php             
                
                // default translate
                $new_translate = 0; 
                
                if( ut_page_option( 'ut_top_header', 'hide' ) == 'show' ) {
                    
                    $new_translate = -40;
                    
                    // optional border bottom
                    $ut_top_header_border_bottom_style = ut_return_header_config( 'ut_top_header_border_bottom_style' );

                    if( !empty( $ut_top_header_border_bottom_style['border-bottom-style'] ) && $ut_top_header_border_bottom_style['border-bottom-style'] != 'none' ) {
                        
                        $new_translate -= 1;
                            
                    }
                    
                    
                }
            
                // scroll depth
                if( $ut_header_top_layout == 'style-4' || $ut_header_top_layout == 'style-5' || $ut_header_top_layout == 'style-6' || $ut_header_top_layout == 'style-7' || $ut_header_top_layout == 'style-9' ) {
                    
                    if( ut_return_header_config( 'ut_navigation_scroll_depth', 1 ) == 1 ) {
                        
                        $new_translate -= 82; // including border bottom and separator
                        
                        if( ( $ut_header_top_layout == 'style-4' || $ut_header_top_layout == 'style-7' ) && ut_return_header_config( 'ut_header_separate_upper_lower', 'on' ) == 'off' ) {
                            
                            $new_translate++;
                            
                        }
                        
                    }
                    
                } ?>

                #header-section.ha-header:not(.ha-header-hide) {
                    -webkit-transform: translate3d(0, <?php echo $new_translate; ?>px, 0);
                    transform: translate3d(0, <?php echo $new_translate; ?>px, 0);
                }
                
            <?php endif; ?>     

			/* Header Toolbar
            ================================================== */	
			.ut-header-extra-module .ut-header-cart sup {
				background: <?php echo $this->accent; ?>
			}	
			
            .ut-header-extra-module .ut-header-cart-count {
                background: <?php echo $this->accent; ?>
            }    
                
			/* Header Area Separator
            ================================================== */	
            #header-section-area-separator .ut-header-area-separator,    
            #header-section[data-separator="on"]:not([data-style="style-9"]):not([data-style="style-5"]) #header-section-upper-area {
                border-bottom: 1px solid #DDD;                
            }
            
            #header-section[data-separator="on"][data-style="style-5"] #header-section-lower-area {
                border-top: 1px solid #DDD;        
            }
                
            @media (min-width: 1025px) {    
                
                #header-section[data-separator="off"][data-style="style-4"] .site-logo img,
                #header-section[data-separator="off"][data-style="style-4"] .site-logo .logo {
                    vertical-align: bottom;
                }
                
                #header-section[data-separator="off"][data-style="style-7"] .site-logo img,
                #header-section[data-separator="off"][data-style="style-7"] .site-logo .logo {
                    vertical-align: bottom;
                }
                
            }
            
            /* Text Logo Font Setting
            ================================================== */ 
            <?php 
            
                echo $this->font_style_css( array(
                    'selector'           => '#ut-sitebody h1.logo',
                    'font-type'          => ot_get_option('ut_global_header_text_logo_font_type', 'ut-font' ),   
                    'font-style'         => ot_get_option('ut_global_header_text_logo_font_style', 'semibold' ),
                    'google-font-style'  => ot_get_option('ut_global_header_text_google_font_style'),
                    'websafe-font-style' => ot_get_option('ut_global_header_text_logo_websafe_font_style'),
					'custom-font-style'  => ot_get_option('ut_global_header_text_logo_custom_font_style')
                ) ); 
                
            ?>      
                
                
                
            /* Main Navigation Font
            ================================================== */ 
            <?php 
            
                $font_weight_fallback = ut_return_header_config( 'ut_navigation_font_weight', 'normal' ) == 'bold' ? 'semibold' : 'regular';

                $selectors = array(
                    '#header-section #ut-top-header .ut-top-header-sub-menu ul',                                                // top header dropdown
                    '#header-section #ut-mobile-menu a',                                                                        // mobile navigation
                    '#header-section #navigation.ut-horizontal-navigation a',                                                   // primary navigation
                    '#header-section #navigation-secondary.ut-horizontal-navigation a',                                         // secondary navigation
                    '#header-section .ut-header-extra-module-toolbar .ut-horizontal-navigation',                                // basic toolbar dropdown
                    '#header-section .ut-header-extra-module-toolbar .ut-horizontal-navigation ul.sub-menu li > a',             // basic toolbar dropdown links
                    '#header-section .ut-horizontal-navigation .ut-navigation-dropdown-only a',                                 // dropdown only menu
                    '#header-section .ut-header-extra-module .bklyn-btn-header .bklyn-btn',                                     // extra module buttons
                    '#header-section .ut-header-mini-cart-action .bklyn-btn.bklyn-btn-mini',                                    // mini cart buttons
                    '#header-section .ut-horizontal-navigation div > .bklyn-btn',                                               // menu buttons
                    '#header-section .ut-header-extra-module-custom-fields .ut-horizontal-navigation a.ut-main-navigation-link' // custom fields 
                );
            
                echo $this->font_style_css( array(
                    'selector'           => implode( "," , $selectors ),
                    'font-type'          => ot_get_option('ut_global_navigation_font_type', 'ut-font' ),   
                    'font-style'         => ot_get_option('ut_global_navigation_font_style', $font_weight_fallback ),
                    'google-font-style'  => ot_get_option('ut_global_navigation_google_font_style'),
                    'websafe-font-style' => ot_get_option('ut_global_navigation_websafe_font_style'),
					'custom-font-style'  => ot_get_option('ut_global_navigation_custom_font_style')
                ) );            
                
            ?>

            /* Main Navigation Description Font Size
            ================================================== */
            .ut-navigation-with-description-above .ut-has-description .ut-main-navigation-link span::before {
                font-size: <?php echo ot_get_option( 'ut_global_navigation_description_font_size', '0.9' ); ?>em;
            }

            /* Main Navigation Submenu Font
            ================================================== */     
            <?php    
                
                $selectors = array(
                    '#header-section #ut-top-header .ut-top-header-sub-menu ul',                                        // top header dropdown    
                    '#header-section #navigation.ut-horizontal-navigation ul.sub-menu li > a',                          // primary navigation
                    '#header-section #navigation.ut-horizontal-navigation .ut-navigation-column-list li a',             // primary navigation megamenu
                    '#header-section #navigation-secondary.ut-horizontal-navigation ul.sub-menu li > a',                // secondary navigation
                    '#header-section #navigation-secondary.ut-horizontal-navigation .ut-navigation-column-list li a',   // secondary navigation megamenu
                    '#header-section .ut-header-extra-module-toolbar .ut-horizontal-navigation',                        // basic toolbar dropdown
                    '#header-section .ut-header-extra-module-toolbar .ut-horizontal-navigation ul.sub-menu li > a',     // basic toolbar dropdown links
                    '#header-section .ut-horizontal-navigation .ut-navigation-dropdown-only ul.sub-menu li > a'         // dropdown only menu
                );            
            
                echo $this->font_style_css( array(
                    'selector'           => implode( "," , $selectors ),
                    'font-type'          => ot_get_option('ut_global_navigation_submenu_font_type', 'inherit' ),   
                    'inherit-font-style' => ot_get_option('ut_global_navigation_submenu_font_style' ),
                    'font-style'         => ot_get_option('ut_global_navigation_submenu_theme_font_style' ),
                    'google-font-style'  => ot_get_option('ut_global_navigation_submenu_google_font_style'),
                    'websafe-font-style' => ot_get_option('ut_global_navigation_submenu_websafe_font_style'),
					'custom-font-style'  => ot_get_option('ut_global_navigation_submenu_custom_font_style')                    
                ) );
                
            ?>    
              
			/* Mega Menu Column Titles
            ================================================== */ 
            <?php 
            
                echo $this->font_style_css( array(
                    'selector'           => '#header-section .ut-horizontal-navigation .ut-megamenu .ut-nav-header h3',
                    'font-type'          => ot_get_option('ut_global_megamenu_column_title_font_type', 'ut-font' ),   
                    'font-style'         => ot_get_option('ut_global_megamenu_column_title_font_style', 'semibold' ),
                    'google-font-style'  => ot_get_option('ut_global_megamenu_column_title_google_font_style'),
                    'websafe-font-style' => ot_get_option('ut_global_megamenu_column_title_websafe_font_style'),
					'custom-font-style'  => ot_get_option('ut_global_megamenu_column_title_custom_font_style')
                ) ); 
                
            ?> 	
            
            /* Main Navigation Extra Module Font
            ================================================== */     
            <?php    
                
                $selectors = array(
                    '#header-section .ut-header-extra-module-custom-fields .ut-horizontal-navigation a.ut-main-navigation-link' // custom fields 
                );            
            
                echo $this->font_style_css( array(
                    'selector'           => implode( "," , $selectors ),
                    'font-type'          => ot_get_option('ut_global_navigation_modules_font_type', 'inherit' ),   
                    'inherit-font-style' => ot_get_option('ut_global_navigation_modules_font_style' ),
                    'font-style'         => ot_get_option('ut_global_navigation_modules_theme_font_style' ),
                    'google-font-style'  => ot_get_option('ut_global_navigation_modules_google_font_style'),
                    'websafe-font-style' => ot_get_option('ut_global_navigation_modules_websafe_font_style'),
					'custom-font-style'  => ot_get_option('ut_global_navigation_modules_custom_font_style')                    
                ), array(), true );
                
            ?>     
                
            /* Main Navigation Buttons Font
            ================================================== */     
            <?php    
                
                $selectors = array(
                    '#header-section .ut-header-extra-module .bklyn-btn-header .bklyn-btn',                                     // extra module buttons
                    '#header-section .ut-header-mini-cart-action .bklyn-btn.bklyn-btn-mini',                                    // mini cart buttons
                    '#header-section .ut-horizontal-navigation div > .bklyn-btn',                                               // menu buttons
                );            
            
                echo $this->font_style_css( array(
                    'selector'           => implode( "," , $selectors ),
                    'font-type'          => ot_get_option('ut_global_navigation_buttons_font_type', 'inherit' ),   
                    'inherit-font-style' => ot_get_option('ut_global_navigation_buttons_font_style' ),
                    'font-style'         => ot_get_option('ut_global_navigation_buttons_theme_font_style' ),
                    'google-font-style'  => ot_get_option('ut_global_navigation_buttons_google_font_style'),
                    'websafe-font-style' => ot_get_option('ut_global_navigation_buttons_websafe_font_style'),
					'custom-font-style'  => ot_get_option('ut_global_navigation_buttons_custom_font_style')                    
                ), array(), true );
                
            ?>  
                
            <?php 
            
            /*
             * Light Skin Navigation Settings
             */
            
            if( ut_return_header_config( 'ut_navigation_skin' , 'ut-header-light' ) == 'ut-header-light' ) : ?>
                
                <?php if( ut_return_header_config('ut_navigation_state') != 'on_transparent' && ut_return_header_config('ut_navigation_border_bottom') == 'off' ) : ?>
				
                    #header-section,
                    #ut-header-placeholder {
                        border-bottom-color: transparent!important;
                    }
				
				<?php endif; ?>
                
				<?php if( ut_return_header_config('ut_navigation_state') == 'on_transparent' && ut_return_header_config('ut_navigation_transparent_border') == 'off' ) : ?>
				
                    #header-section {
                        border-bottom-color: transparent!important;
                    }
				
				<?php endif; ?>
                
            <?php endif; ?>
            
            
            <?php 
            
            /*
             * Dark Skin Navigation Settings
             */
                        
            if( ut_return_header_config( 'ut_navigation_skin' , 'ut-header-light' ) == 'ut-header-dark' ) : ?>
                
                #header-section.ut-header-dark .ut-top-header-sub-menu ul {
                    border-top-color: <?php echo $this->accent; ?> !important;
                }
                
                #header-section.ut-header-dark .ut-megamenu,
                #header-section.ut-header-dark .ut-horizontal-navigation .sub-menu {
                    border-color: <?php echo $this->accent; ?>;
                }
                
				<?php if( ut_return_header_config('ut_navigation_state') == 'on_transparent' && ut_return_header_config('ut_navigation_transparent_border') == 'off' ) : ?>
				
                    #header-section {
                        border-bottom-color: transparent!important;
                    }
				
				<?php endif; ?>
                
            <?php endif; ?>
            
                
            <?php 
            
            /*
             * All Skins Navigation Settings
             */            
            
            ?>   
                
            #header-section a:hover,
            #header-section a:active {
                color:<?php echo $this->rgba_to_rgb( $this->accent ); ?>;
                color:<?php echo $this->accent; ?>;
            }    
            
            #header-section .selected,
            #header-section .selected:hover,
            #header-section .selected:active {
                color:<?php echo $this->rgba_to_rgb( $this->accent ); ?>;
                color:<?php echo $this->accent; ?>;
            }    
            
            #header-section .sub-menu li.sfHover > a,    
            #header-section li.sfHover > .ut-main-navigation-link {
                color:<?php echo $this->rgba_to_rgb( $this->accent ); ?>;
                color:<?php echo $this->accent; ?>;
            }
            
            #header-section .ut-top-header-has-submenu:hover .ut-header-cart,
            #header-section .ut-top-header-has-submenu:hover .ut-top-header-main-link {
                color:<?php echo $this->rgba_to_rgb( $this->accent ); ?>;
                color:<?php echo $this->accent; ?>;
            }    
                
            #header-section li.current_page_item:not(.menu-item-object-custom) > a, 
            #header-section li.current-menu-item:not(.menu-item-object-custom) > a, 
            #header-section li.current_page_parent > a,
            #header-section li.current_page_ancestor > a,
            #header-section li.current-menu-ancestor > a {
                color:<?php echo $this->rgba_to_rgb( $this->accent ); ?>;
                color:<?php echo $this->accent; ?>;
            }    
            
            #header-section .sub-menu li.current_page_item > a, 
            #header-section .sub-menu li.current-menu-item > a, 
            #header-section .sub-menu li.current_page_parent > a,
            #header-section .sub-menu li.current_page_ancestor > a,
            #header-section .sub-menu li.current-menu-ancestor > a {
                color:<?php echo $this->rgba_to_rgb( $this->accent ); ?>;
                color:<?php echo $this->accent; ?>;
            }    
                
            #header-section .ut-navigation-column-list li.current_page_item > a, 
            #header-section .ut-navigation-column-list li.current-menu-item > a, 
            #header-section .ut-navigation-column-list li.current_page_parent > a,
            #header-section .ut-navigation-column-list li.current_page_ancestor > a,
            #header-section .ut-navigation-column-list li.current-menu-ancestor > a {
                color:<?php echo $this->rgba_to_rgb( $this->accent ); ?>;
                color:<?php echo $this->accent; ?>;
            }    
            
            #header-section .ut-top-header-sub-menu ul li.current_page_item > a, 
            #header-section .ut-top-header-sub-menu ul li.current-menu-item > a, 
            #header-section .ut-top-header-sub-menu ul li.current_page_parent > a,
            #header-section .ut-top-header-sub-menu ul li.current_page_ancestor > a,
            #header-section .ut-top-header-sub-menu ul li.current-menu-ancestor > a {
                color:<?php echo $this->rgba_to_rgb( $this->accent ); ?>;
                color:<?php echo $this->accent; ?>;
            }    
            
            #header-section .ut-megamenu .current-menu-parent .ut-nav-header h3,
            #header-section .ut-megamenu .ut-navigation-column-list:hover .ut-nav-header h3 {
                color:<?php echo $this->rgba_to_rgb( $this->accent ); ?>;
                color:<?php echo $this->accent; ?>;
            }
                
            #header-section .ut-navigation-with-link-animation.ut-navigation-with-link-animation-type-border ul.sub-menu li a > span::after,
            #header-section .ut-navigation-with-link-animation.ut-navigation-with-link-animation-type-border .ut-navigation-column-list li a > span::after {
                border-bottom: <?php echo ut_return_header_config( 'ut_navigation_column_link_animation_border_height', 2 ); ?>px solid <?php echo $this->rgba_to_rgb( $this->accent ); ?>;   
                border-bottom: <?php echo ut_return_header_config( 'ut_navigation_column_link_animation_border_height', 2 ); ?>px solid <?php echo $this->accent; ?>;   
            }    
            
            #header-section .ut-navigation-with-link-animation.ut-navigation-with-link-animation-type-background .sub-menu li.sfHover > a,    
            #header-section .ut-navigation-with-link-animation.ut-navigation-with-link-animation-type-background ul.sub-menu li a:hover,
            #header-section .ut-navigation-with-link-animation.ut-navigation-with-link-animation-type-background .ut-navigation-column-list li a:hover,
            #header-section .ut-navigation-with-link-animation.ut-navigation-with-link-animation-type-background-static .sub-menu li.sfHover > a,     
            #header-section .ut-navigation-with-link-animation.ut-navigation-with-link-animation-type-background-static ul.sub-menu li a:hover,
            #header-section .ut-navigation-with-link-animation.ut-navigation-with-link-animation-type-background-static .ut-navigation-column-list li a:hover{
                color: #FFFFFF;	
            }
            
            #header-section .ut-navigation-with-link-animation.ut-navigation-with-link-animation-type-background-static ul.sub-menu li.current_page_item > a, 
            #header-section .ut-navigation-with-link-animation.ut-navigation-with-link-animation-type-background-static ul.sub-menu li.current-menu-item > a, 
            #header-section .ut-navigation-with-link-animation.ut-navigation-with-link-animation-type-background-static ul.sub-menu li.current_page_parent > a,
            #header-section .ut-navigation-with-link-animation.ut-navigation-with-link-animation-type-background-static ul.sub-menu li.current_page_ancestor > a,
            #header-section .ut-navigation-with-link-animation.ut-navigation-with-link-animation-type-background-static ul.sub-menu li.current-menu-ancestor > a {
                color: #FFFFFF;
            }

            #header-section .ut-navigation-with-link-animation.ut-navigation-with-link-animation-type-background-static .ut-navigation-column-list li.current_page_item > a, 
            #header-section .ut-navigation-with-link-animation.ut-navigation-with-link-animation-type-background-static .ut-navigation-column-list li.current-menu-item > a, 
            #header-section .ut-navigation-with-link-animation.ut-navigation-with-link-animation-type-background-static .ut-navigation-column-list li.current_page_parent > a,
            #header-section .ut-navigation-with-link-animation.ut-navigation-with-link-animation-type-background-static .ut-navigation-column-list li.current_page_ancestor > a,
            #header-section .ut-navigation-with-link-animation.ut-navigation-with-link-animation-type-background-static .ut-navigation-column-list li.current-menu-ancestor > a {
                color: #FFFFFF;
            }     
            
            #header-section .ut-navigation-with-link-animation.ut-navigation-with-link-animation-type-background ul.sub-menu li.current_page_item > a, 
            #header-section .ut-navigation-with-link-animation.ut-navigation-with-link-animation-type-background ul.sub-menu li.current-menu-item > a, 
            #header-section .ut-navigation-with-link-animation.ut-navigation-with-link-animation-type-background ul.sub-menu li.current_page_parent > a,
            #header-section .ut-navigation-with-link-animation.ut-navigation-with-link-animation-type-background ul.sub-menu li.current_page_ancestor > a,
            #header-section .ut-navigation-with-link-animation.ut-navigation-with-link-animation-type-background ul.sub-menu li.current-menu-ancestor > a {
                color: #FFFFFF;
            }    
            
            #header-section .ut-navigation-with-link-animation.ut-navigation-with-link-animation-type-background .ut-navigation-column-list li.current_page_item > a, 
            #header-section .ut-navigation-with-link-animation.ut-navigation-with-link-animation-type-background .ut-navigation-column-list li.current-menu-item > a, 
            #header-section .ut-navigation-with-link-animation.ut-navigation-with-link-animation-type-background .ut-navigation-column-list li.current_page_parent > a,
            #header-section .ut-navigation-with-link-animation.ut-navigation-with-link-animation-type-background .ut-navigation-column-list li.current_page_ancestor > a,
            #header-section .ut-navigation-with-link-animation.ut-navigation-with-link-animation-type-background .ut-navigation-column-list li.current-menu-ancestor > a {
                color: #FFFFFF;
            }
                
            #header-section .ut-navigation-with-link-animation.ut-navigation-with-link-animation-type-background ul.sub-menu li a::after,
            #header-section .ut-navigation-with-link-animation.ut-navigation-with-link-animation-type-background .ut-navigation-column-list li a::after,
            #header-section .ut-navigation-with-link-animation.ut-navigation-with-link-animation-type-background-static ul.sub-menu li a::after,
            #header-section .ut-navigation-with-link-animation.ut-navigation-with-link-animation-type-background-static .ut-navigation-column-list li a::after {
                background:<?php echo $this->rgba_to_rgb( $this->accent ); ?> !important;   
                background:<?php echo $this->accent; ?> !important;   
            }    
               
                
            /* Main Navigation Styles Custom Separator
            ================================================== */
            <?php if( ut_return_header_config( 'ut_header_layout', 'default' ) == 'default' && 
                      ut_return_header_config( 'ut_navigation_style', 'separator' ) == 'separator' &&
                      ut_return_header_config( 'ut_navigation_item_separator_style' , 'default' ) == 'custom' ) : ?>
            
                .ut-horizontal-navigation.ut-navigation-style-separator ul li a::after { 
                    content: "<?php echo ut_return_header_config('ut_navigation_item_separator'); ?>"; 
                }
            
            <?php endif; ?>                
            
            /* Main Navigation Styles Border Coloring
            ================================================== */    
            .ut-horizontal-navigation.ut-navigation-style-animation-line-top ul li a.ut-main-navigation-link::after,
            .ut-horizontal-navigation.ut-navigation-style-animation-line-bottom ul li a.ut-main-navigation-link::after {
                background:<?php echo $this->accent; ?>;
                height:<?php echo ut_return_header_config( 'ut_navigation_animation_line_height', 2 ); ?>px;
            }
            
            .ut-horizontal-navigation.ut-navigation-style-animation-line-middle ul li a.ut-main-navigation-link span::after {
                background:<?php echo $this->accent; ?>;
                height:<?php echo ut_return_header_config( 'ut_navigation_animation_line_height', 2 ); ?>px;
            }    
                
            /* Custom Skin Navigation Settings
            ================================================== */
            <?php if( ut_return_header_config( 'ut_navigation_skin', 'ut-header-light' ) == 'ut-header-custom' ) : ?>            
                
                /* Primary Skin Logo
                ================================================== */
                <?php if( ut_return_header_config( 'ut_header_ps_text_logo_color' ) ) : ?>
                    
                    #header-section.ut-primary-custom-skin .site-logo .logo,
                    #header-section.ut-primary-custom-skin .site-logo .logo a {
                        color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_header_ps_text_logo_color' ) ); ?> !important;
                        color:<?php echo ut_return_header_config( 'ut_header_ps_text_logo_color' ); ?> !important;
                    }
                    
                    #header-section.ut-primary-custom-skin .ut-open-overlay-menu.ut-hamburger:not(.is-active) span,
					#header-section.ut-primary-custom-skin .ut-open-overlay-menu.ut-hamburger span::before,
					#header-section.ut-primary-custom-skin .ut-open-overlay-menu.ut-hamburger span::after {
						background:<?php echo $this->rgba_to_rgb( ot_get_option( 'ut_header_ps_text_logo_color' ) ); ?>;
						background:<?php echo ot_get_option( 'ut_header_ps_text_logo_color' ); ?>;
					}
                
                <?php endif; ?>
                
                <?php if( ut_return_header_config( 'ut_header_ps_text_logo_color_hover' ) ) : ?>
                    
                    #header-section.ut-primary-custom-skin .site-logo .logo a:hover,
                    #header-section.ut-primary-custom-skin .site-logo .logo a:active {
                        color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_header_ps_text_logo_color_hover' ) ); ?> !important;
                        color:<?php echo ut_return_header_config( 'ut_header_ps_text_logo_color_hover' ); ?> !important;
                    }
                
                <?php endif; ?>
                
                <?php 
            
                /* Primary Skin Background
                ================================================== */
            
                if( ut_return_header_config( 'ut_header_ps_background_color' ) ) : ?>
                    
                    <?php 
                    
                    $ut_header_ps_background_color = ut_return_header_config( 'ut_header_ps_background_color' );
            
                    if( $this->is_gradient( $ut_header_ps_background_color ) ) : ?>
                        
                        #header-section.ut-primary-custom-skin .ut-top-header-sub-menu ul:before,
                        #header-section.ut-primary-custom-skin .ut-top-header-sub-menu ul:after,
                        #header-section.ut-primary-custom-skin .ut-horizontal-navigation .sub-menu:before,
                        #header-section.ut-primary-custom-skin .ut-horizontal-navigation .sub-menu:after,
                        #header-section.ut-primary-custom-skin .ut-megamenu:before,
                        #header-section.ut-primary-custom-skin .ut-megamenu:after,
                        #header-section.ut-primary-custom-skin:before,
                        #header-section.ut-primary-custom-skin:after {
                            position: absolute;
                            content: '';
                            top: 0;
                            left: 0;
                            width: 100%;
                            height: 100%;
                            transition: opacity 0.5s ease-in-out;
                            opacity: 0;
                            pointer-events: none;
                        }
                
                        <?php echo $this->create_gradient_css( $ut_header_ps_background_color, '#header-section.ut-primary-custom-skin .ut-top-header-sub-menu ul:before', false, 'background' ); ?>
                        <?php echo $this->create_gradient_css( $ut_header_ps_background_color, '#header-section.ut-primary-custom-skin .ut-horizontal-navigation .sub-menu:before', false, 'background' ); ?>
                        <?php echo $this->create_gradient_css( $ut_header_ps_background_color, '#header-section.ut-primary-custom-skin .ut-megamenu:before', false, 'background' ); ?>
                        <?php echo $this->create_gradient_css( $ut_header_ps_background_color, '#header-section.ut-primary-custom-skin:before', false, 'background' ); ?>
                        
                        #header-section.ut-primary-custom-skin .ut-top-header-sub-menu ul:before,
                        #header-section.ut-primary-custom-skin .ut-horizontal-navigation .sub-menu:before,
                        #header-section.ut-primary-custom-skin .ut-megamenu:before,
                        #header-section.ut-primary-custom-skin:before {
                            opacity: 1 !important;
                        }
                        
                        #header-section.ut-primary-custom-skin .ut-top-header-sub-menu ul,
                        #header-section.ut-primary-custom-skin .ut-horizontal-navigation .sub-menu,
                        #header-section.ut-primary-custom-skin .ut-megamenu,
                        #header-section.ut-primary-custom-skin {
                            background: transparent !important;
                        } 
            
                    <?php else : ?>                
                        
                        #ut-header-placeholder,
                        #header-section.ut-primary-custom-skin {
                            background:<?php echo $this->rgba_to_rgb( $ut_header_ps_background_color ); ?>;
                            background:<?php echo $ut_header_ps_background_color; ?>;
                        }
                
                        #header-section.ut-primary-custom-skin .ut-horizontal-navigation .sub-menu,
                        #header-section.ut-primary-custom-skin .ut-megamenu,
                        #header-section.ut-primary-custom-skin .ut-top-header-sub-menu ul {
                            background:<?php echo $this->rgba_to_rgb( $ut_header_ps_background_color ); ?>;
                            background:<?php echo $ut_header_ps_background_color; ?>;
                        }
				                
                    <?php endif; ?>
                
                <?php endif; ?>
                
                <?php 
                
                /* Primary Skin Border Bottom
                ================================================== */
                if( ut_return_header_config( 'ut_header_ps_border_color' ) ) : 
            
                    $ut_header_ps_border_color = $this->parse_rgba( ut_return_header_config( 'ut_header_ps_border_color' ) );
            
                    if( ( $ut_header_ps_border_color && isset( $ut_header_ps_border_color['a'] ) && $ut_header_ps_border_color['a'] == 0 ) || $ut_header_ps_border_color == 'transparent' ) { ?>
                        
                        #header-section.ut-primary-custom-skin .ut-horizontal-navigation ul li.ut-is-megamenu:hover > .ut-megamenu,
                        #header-section.ut-primary-custom-skin .ut-horizontal-navigation ul li.ut-menu-item-lvl-0:hover > ul.sub-menu,
                        #header-section.ut-primary-custom-skin .ut-horizontal-navigation.ut-navigation-with-animation ul li.ut-is-megamenu:hover > .ut-megamenu, 
                        #header-section.ut-primary-custom-skin .ut-horizontal-navigation.ut-navigation-with-animation ul li.ut-menu-item-lvl-0:hover > ul.sub-menu {
                            top: calc(100% + 1px);
                        }
                
                    <?php } else { ?>
                        
                        #header-section.ut-primary-custom-skin {
                            border-bottom-color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_header_ps_border_color' ) ); ?> !important;
                            border-bottom-color:<?php echo ut_return_header_config( 'ut_header_ps_border_color' ); ?> !important;
                        }                
                        
                    <?php } ?>
                
                <?php endif; ?>
                
                <?php 
            
                /* Primary Skin Shadow Color
                ================================================== */
                if( ut_return_header_config( 'ut_header_ps_shadow_color' ) ) : ?>
                
                    #header-section.ut-primary-custom-skin {
                        -webkit-box-shadow: 0 0 transparent, 0 0 transparent, 0 5px 5px -4px <?php echo ut_return_header_config( 'ut_header_ps_shadow_color' ); ?>;
                                box-shadow: 0 0 transparent, 0 0 transparent, 0 5px 5px -4px <?php echo ut_return_header_config( 'ut_header_ps_shadow_color' ); ?>;        
                    }
                
                <?php endif; ?>                
                
                <?php 
            
                /* Primary Skin Link Color
                ================================================== */
                if( ut_return_header_config( 'ut_navigation_ps_fl_color' ) ) : ?>
                    
                    #header-section.ut-primary-custom-skin,
                    #header-section.ut-primary-custom-skin a,
                    #header-section.ut-primary-custom-skin .ut-deactivated-link,
                    #header-section.ut-primary-custom-skin .ut-deactivated-link:hover,
                    #header-section.ut-primary-custom-skin .ut-deactivated-link:active {                        
                        color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_navigation_ps_fl_color' ) ); ?>;
                        color:<?php echo ut_return_header_config( 'ut_navigation_ps_fl_color' ); ?>;                       
                    }
                
                <?php endif; ?>
                
                <?php 
            
                /* Primary Skin Link Color Hover
                ================================================== */ ?>
                #header-section.ut-primary-custom-skin a:hover,
                #header-section.ut-primary-custom-skin a:active {
                    color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_navigation_ps_fl_color_hover', $this->accent ) ); ?>;
                    color:<?php echo ut_return_header_config( 'ut_navigation_ps_fl_color_hover', $this->accent ); ?>;
                }
                
                #header-section.ut-primary-custom-skin .ut-horizontal-navigation .sub-menu li.sfHover > a,
                #header-section.ut-primary-custom-skin li.sfHover > .ut-main-navigation-link {
                    color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_navigation_ps_fl_color_hover', $this->accent ) ); ?>;
                    color:<?php echo ut_return_header_config( 'ut_navigation_ps_fl_color_hover', $this->accent ); ?>;
                }
                
                #header-section.ut-primary-custom-skin .ut-top-header-has-submenu:hover .ut-header-cart,
                #header-section.ut-primary-custom-skin .ut-top-header-has-submenu:hover .ut-top-header-main-link {
                    color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_navigation_ps_fl_color_hover', $this->accent ) ); ?>;
                    color:<?php echo ut_return_header_config( 'ut_navigation_ps_fl_color_hover', $this->accent ); ?>;
                } 
                
                <?php 
            
                /* Primary Skin Link Selected
                ================================================== */ ?>
                #header-section.ut-primary-custom-skin .selected,
                #header-section.ut-primary-custom-skin .selected:hover,
                #header-section.ut-primary-custom-skin .selected:active {
                    color:<?php echo $this->rgba_to_rgb(  ut_return_header_config( 'ut_navigation_ps_fl_active_color', $this->accent ) ); ?> !important;;
                    color:<?php echo ut_return_header_config( 'ut_navigation_ps_fl_active_color', $this->accent ); ?> !important;;
                } 
                
                #header-section.ut-primary-custom-skin li.current_page_item:not(.menu-item-object-custom) > a, 
                #header-section.ut-primary-custom-skin li.current-menu-item:not(.menu-item-object-custom) > a,
                #header-section.ut-primary-custom-skin li.current_page_parent > a,
                #header-section.ut-primary-custom-skin li.current_page_ancestor > a,
                #header-section.ut-primary-custom-skin li.current-menu-ancestor > a,
                #header-section.ut-primary-custom-skin li.current-menu-parent:not(.has-scroll-children) > a {
                    color:<?php echo $this->rgba_to_rgb(  ut_return_header_config( 'ut_navigation_ps_fl_active_color', $this->accent ) ); ?> !important;;
                    color:<?php echo ut_return_header_config( 'ut_navigation_ps_fl_active_color', $this->accent ); ?> !important;;
                }
                
                #header-section.ut-primary-custom-skin li.current_page_item:not(.menu-item-object-custom) > a:hover,
                #header-section.ut-primary-custom-skin li.current_page_item:not(.menu-item-object-custom) > a:active,
                #header-section.ut-primary-custom-skin li.current-menu-item:not(.menu-item-object-custom) > a:hover,
                #header-section.ut-primary-custom-skin li.current-menu-item:not(.menu-item-object-custom) > a:active,
                #header-section.ut-primary-custom-skin li.current_page_parent > a:hover,
                #header-section.ut-primary-custom-skin li.current_page_parent > a:active,
                #header-section.ut-primary-custom-skin li.current_page_ancestor > a:hover,
                #header-section.ut-primary-custom-skin li.current_page_ancestor > a:active,
                #header-section.ut-primary-custom-skin li.current-menu-parent:not(.has-scroll-children) > a:hover,
                #header-section.ut-primary-custom-skin li.current-menu-parent:not(.has-scroll-children) > a:active,
                #header-section.ut-primary-custom-skin li.current-menu-ancestor > a:hover,
                #header-section.ut-primary-custom-skin li.current-menu-ancestor > a:active {
                    color:<?php echo $this->rgba_to_rgb(  ut_return_header_config( 'ut_navigation_ps_fl_active_color', $this->accent ) ); ?> !important;
                    color:<?php echo ut_return_header_config( 'ut_navigation_ps_fl_active_color', $this->accent ); ?> !important;
                }
                
                <?php 
            
                /* Primary Skin Separator Color
                ================================================== */
                if( ut_return_header_config( 'ut_navigation_ps_fl_dot_color' ) ) : ?>
                
                    #header-section.ut-primary-custom-skin .ut-navigation-style-separator ul li a::after {
                        color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_navigation_ps_fl_dot_color' ) ); ?> !important;
                        color:<?php echo ut_return_header_config( 'ut_navigation_ps_fl_dot_color' ); ?> !important;
                    }
                
                <?php endif; ?>
                
                <?php 
            
                /* Primary Skin Second Level Background
                ================================================== */
                if( ut_return_header_config( 'ut_navigation_ps_sl_background_color' ) ) : ?>
                    
                    <?php 
                    
                    $ut_navigation_ps_sl_background_color = ut_return_header_config( 'ut_navigation_ps_sl_background_color' );
            
                    if( $this->is_gradient( $ut_navigation_ps_sl_background_color ) ) : ?>
                        
                        #header-section.ut-primary-custom-skin .ut-top-header-sub-menu ul:before,
                        #header-section.ut-primary-custom-skin .ut-top-header-sub-menu ul:after,
                        #header-section.ut-primary-custom-skin .ut-horizontal-navigation .sub-menu:before,
                        #header-section.ut-primary-custom-skin .ut-horizontal-navigation .sub-menu:after,
                        #header-section.ut-primary-custom-skin .ut-megamenu:before,
                        #header-section.ut-primary-custom-skin .ut-megamenu:after {
                            position: absolute;
                            content: '';
                            top: 0;
                            left: 0;
                            width: 100%;
                            height: 100%;
                            transition: opacity 0.5s ease-in-out;
                            opacity: 0;
                            pointer-events: none;
                        }
                
                        <?php echo $this->create_gradient_css( $ut_navigation_ps_sl_background_color, '#header-section.ut-primary-custom-skin .ut-top-header-sub-menu ul:before', false, 'background', true ); ?>
                        <?php echo $this->create_gradient_css( $ut_navigation_ps_sl_background_color, '#header-section.ut-primary-custom-skin .ut-horizontal-navigation .sub-menu:before', false, 'background', true ); ?>
                        <?php echo $this->create_gradient_css( $ut_navigation_ps_sl_background_color, '#header-section.ut-primary-custom-skin .ut-megamenu:before', false, 'background', true ); ?>
                        
                        #header-section.ut-primary-custom-skin .ut-top-header-sub-menu ul:before,
                        #header-section.ut-primary-custom-skin .ut-horizontal-navigation .sub-menu:before,
                        #header-section.ut-primary-custom-skin .ut-megamenu:before {
                            opacity: 1 !important;
                        }
                        
                        #header-section.ut-primary-custom-skin .ut-top-header-sub-menu ul,
                        #header-section.ut-primary-custom-skin .ut-horizontal-navigation .sub-menu,
                        #header-section.ut-primary-custom-skin .ut-megamenu {
                            background: transparent !important;
                        }
            
                    <?php else : ?>

                        #header-section.ut-primary-custom-skin .ut-top-header-sub-menu ul,
                        #header-section.ut-primary-custom-skin .ut-horizontal-navigation .sub-menu,
                        #header-section.ut-primary-custom-skin .ut-horizontal-navigation .sub-menu:before,
                        #header-section.ut-primary-custom-skin .ut-horizontal-navigation .sub-menu:after,
                        #header-section.ut-primary-custom-skin .ut-megamenu,
                        #header-section.ut-primary-custom-skin .ut-megamenu:before,
                        #header-section.ut-primary-custom-skin .ut-megamenu:after {
                            background:<?php echo $this->rgba_to_rgb( $ut_navigation_ps_sl_background_color ); ?> !important;
                            background:<?php echo $ut_navigation_ps_sl_background_color; ?> !important;
                        }
                
                    <?php endif; ?>
                
                <?php endif; ?>
                
                <?php 
            
                /* Primary Skin Social Icons Color
                ================================================== */
                if( ut_return_header_config( 'ut_navigation_ps_header_social_icons_color' ) ) : ?>
                    
                    #header-section.ut-primary-custom-skin .ut-header-extra-module-company-social-list a {
                        color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_navigation_ps_header_social_icons_color' ) ); ?> !important;
                        color:<?php echo ut_return_header_config( 'ut_navigation_ps_header_social_icons_color' ); ?> !important;
                    }
                
                <?php endif; ?>
                
                <?php 
            
                /* Primary Skin Social Icons Color Hover
                ================================================== */
                if( ut_return_header_config( 'ut_navigation_ps_header_social_icons_color_hover' ) ) : ?>
                    
                    #header-section.ut-primary-custom-skin .ut-header-extra-module-company-social-list a:hover,
                    #header-section.ut-primary-custom-skin .ut-header-extra-module-company-social-list a:active {
                        color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_navigation_ps_header_social_icons_color_hover' ) ); ?> !important;
                        color:<?php echo ut_return_header_config( 'ut_navigation_ps_header_social_icons_color_hover' ); ?>!important;
                    }
                
                <?php endif; ?>
                
                <?php 
            
                /* Primary Skin Second Level Link Color
                ================================================== */
                if( ut_return_header_config( 'ut_navigation_ps_sl_color' ) ) : ?>
                    
                    #header-section.ut-primary-custom-skin .ut-top-header-sub-menu ul li > a,
                    #header-section.ut-primary-custom-skin .ut-horizontal-navigation .sub-menu li > a,
                    #header-section.ut-primary-custom-skin .ut-megamenu li > a {
                        color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_navigation_ps_sl_color' ) ); ?>;
                        color:<?php echo ut_return_header_config( 'ut_navigation_ps_sl_color' ); ?>;
                    }
                
                    #header-section.ut-primary-custom-skin .ut-header-mini-cart-total-count,
                    #header-section.ut-primary-custom-skin .ut-header-mini-cart-total-price {
                        color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_navigation_ps_sl_color' ) ); ?>;
                        color:<?php echo ut_return_header_config( 'ut_navigation_ps_sl_color' ); ?>;
                    }
                
                <?php endif; ?>
                
                <?php 
            
                /* Primary Skin Second Level Link Color Hover
                ================================================== */
                if( ut_return_header_config( 'ut_navigation_ps_sl_color_hover' ) ) : ?>
                
                    #header-section.ut-primary-custom-skin .ut-top-header-sub-menu ul li > a:hover,
                    #header-section.ut-primary-custom-skin .ut-horizontal-navigation .sub-menu li > a:hover,
                    #header-section.ut-primary-custom-skin .ut-megamenu li > a:hover,
                    #header-section.ut-primary-custom-skin .ut-top-header-sub-menu ul li > a:active,
                    #header-section.ut-primary-custom-skin .ut-horizontal-navigation .sub-menu li > a:active,
                    #header-section.ut-primary-custom-skin .ut-megamenu li > a:active {
                        color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_navigation_ps_sl_color_hover' ) ); ?> !important;
                        color:<?php echo ut_return_header_config( 'ut_navigation_ps_sl_color_hover' ); ?> !important;
                    }
                
                    #header-section.ut-primary-custom-skin .ut-horizontal-navigation .sub-menu li.sfHover > a {
                        color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_navigation_ps_sl_color_hover' ) ); ?> !important;
                        color:<?php echo ut_return_header_config( 'ut_navigation_ps_sl_color_hover' ); ?> !important;        
                    }
                
                <?php endif; ?>
                
                <?php 
            
                /* Primary Skin Second Level Link Color Active
                ================================================== */
                if( ut_return_header_config( 'ut_navigation_ps_sl_active_color' ) ) : ?>
                    
                    #header-section.ut-primary-custom-skin .ut-horizontal-navigation .sub-menu .selected,
                    #header-section.ut-primary-custom-skin .ut-horizontal-navigation .sub-menu .selected:hover,
                    #header-section.ut-primary-custom-skin .ut-horizontal-navigation .sub-menu .selected:active {
                        color:<?php echo $this->rgba_to_rgb(  ut_return_header_config( 'ut_navigation_ps_sl_active_color' ) ); ?> !important;
                        color:<?php echo ut_return_header_config( 'ut_navigation_ps_sl_active_color' ); ?> !important;
                    } 

                    #header-section.ut-primary-custom-skin .ut-horizontal-navigation .sub-menu li.current_page_item > a, 
                    #header-section.ut-primary-custom-skin .ut-horizontal-navigation .sub-menu li.current-menu-item > a, 
                    #header-section.ut-primary-custom-skin .ut-horizontal-navigation .sub-menu li.current_page_parent > a,
                    #header-section.ut-primary-custom-skin .ut-horizontal-navigation .sub-menu li.current_page_ancestor > a,
                    #header-section.ut-primary-custom-skin .ut-horizontal-navigation .sub-menu li.current-menu-ancestor > a {
                        color:<?php echo $this->rgba_to_rgb(  ut_return_header_config( 'ut_navigation_ps_sl_active_color' ) ); ?> !important;
                        color:<?php echo ut_return_header_config( 'ut_navigation_ps_sl_active_color' ); ?> !important;
                    }

                    #header-section.ut-primary-custom-skin .ut-horizontal-navigation .sub-menu li.current_page_item > a:hover, 
                    #header-section.ut-primary-custom-skin .ut-horizontal-navigation .sub-menu li.current_page_item > a:active, 
                    #header-section.ut-primary-custom-skin .ut-horizontal-navigation .sub-menu li.current-menu-item > a:hover, 
                    #header-section.ut-primary-custom-skin .ut-horizontal-navigation .sub-menu li.current-menu-item > a:active,
                    #header-section.ut-primary-custom-skin .ut-horizontal-navigation .sub-menu li.current_page_parent > a:hover,
                    #header-section.ut-primary-custom-skin .ut-horizontal-navigation .sub-menu li.current_page_parent > a:active,
                    #header-section.ut-primary-custom-skin .ut-horizontal-navigation .sub-menu li.current_page_ancestor > a:hover,
                    #header-section.ut-primary-custom-skin .ut-horizontal-navigation .sub-menu li.current_page_ancestor > a:active, 
                    #header-section.ut-primary-custom-skin .ut-horizontal-navigation .sub-menu li.current-menu-ancestor > a:hover,
                    #header-section.ut-primary-custom-skin .ut-horizontal-navigation .sub-menu li.current-menu-ancestor > a:active {
                        color:<?php echo $this->rgba_to_rgb(  ut_return_header_config( 'ut_navigation_ps_sl_active_color' ) ); ?> !important;
                        color:<?php echo ut_return_header_config( 'ut_navigation_ps_sl_active_color' ); ?> !important;
                    }                
                
                    #header-section.ut-primary-custom-skin .ut-navigation-column-list .selected,
                    #header-section.ut-primary-custom-skin .ut-navigation-column-list .selected:hover,
                    #header-section.ut-primary-custom-skin .ut-navigation-column-list .selected:active {
                        color:<?php echo $this->rgba_to_rgb(  ut_return_header_config( 'ut_navigation_ps_sl_active_color' ) ); ?> !important;
                        color:<?php echo ut_return_header_config( 'ut_navigation_ps_sl_active_color' ); ?> !important;
                    } 

                    #header-section.ut-primary-custom-skin .ut-navigation-column-list li.current_page_item > a, 
                    #header-section.ut-primary-custom-skin .ut-navigation-column-list li.current-menu-item > a, 
                    #header-section.ut-primary-custom-skin .ut-navigation-column-list li.current_page_parent > a,
                    #header-section.ut-primary-custom-skin .ut-navigation-column-list li.current_page_ancestor > a,
                    #header-section.ut-primary-custom-skin .ut-navigation-column-list li.current-menu-ancestor > a {
                        color:<?php echo $this->rgba_to_rgb(  ut_return_header_config( 'ut_navigation_ps_sl_active_color' ) ); ?> !important;
                        color:<?php echo ut_return_header_config( 'ut_navigation_ps_sl_active_color' ); ?> !important;
                    }
                
                    #header-section.ut-primary-custom-skin .ut-navigation-column-list li.current_page_item > a:hover,
                    #header-section.ut-primary-custom-skin .ut-navigation-column-list li.current_page_item > a:active, 
                    #header-section.ut-primary-custom-skin .ut-navigation-column-list li.current-menu-item > a:hover,
                    #header-section.ut-primary-custom-skin .ut-navigation-column-list li.current-menu-item > a:active,
                    #header-section.ut-primary-custom-skin .ut-navigation-column-list li.current_page_parent > a:hover,
                    #header-section.ut-primary-custom-skin .ut-navigation-column-list li.current_page_parent > a:active,
                    #header-section.ut-primary-custom-skin .ut-navigation-column-list li.current_page_ancestor > a:hover,
                    #header-section.ut-primary-custom-skin .ut-navigation-column-list li.current_page_ancestor > a:active,
                    #header-section.ut-primary-custom-skin .ut-navigation-column-list li.current-menu-ancestor > a:hover,
                    #header-section.ut-primary-custom-skin .ut-navigation-column-list li.current-menu-ancestor > a:active {
                        color:<?php echo $this->rgba_to_rgb(  ut_return_header_config( 'ut_navigation_ps_sl_active_color' ) ); ?> !important;
                        color:<?php echo ut_return_header_config( 'ut_navigation_ps_sl_active_color' ); ?> !important;
                    }
                    
                    #header-section.ut-primary-custom-skin .ut-top-header-sub-menu ul li.current_page_item > a, 
                    #header-section.ut-primary-custom-skin .ut-top-header-sub-menu ul li.current-menu-item > a, 
                    #header-section.ut-primary-custom-skin .ut-top-header-sub-menu ul li.current_page_parent > a,
                    #header-section.ut-primary-custom-skin .ut-top-header-sub-menu ul li.current_page_ancestor > a,
                    #header-section.ut-primary-custom-skin .ut-top-header-sub-menu ul li.current-menu-ancestor > a {
                        color:<?php echo $this->rgba_to_rgb(  ut_return_header_config( 'ut_navigation_ps_sl_active_color' ) ); ?> !important;
                        color:<?php echo ut_return_header_config( 'ut_navigation_ps_sl_active_color' ); ?> !important;
                    }
                
                    #header-section.ut-primary-custom-skin .ut-top-header-sub-menu ul li.current_page_item > a:hover,
                    #header-section.ut-primary-custom-skin .ut-top-header-sub-menu ul li.current_page_item > a:active,
                    #header-section.ut-primary-custom-skin .ut-top-header-sub-menu ul li.current-menu-item > a:hover,
                    #header-section.ut-primary-custom-skin .ut-top-header-sub-menu ul li.current-menu-item > a:active,
                    #header-section.ut-primary-custom-skin .ut-top-header-sub-menu ul li.current_page_parent > a:hover,
                    #header-section.ut-primary-custom-skin .ut-top-header-sub-menu ul li.current_page_parent > a:active,
                    #header-section.ut-primary-custom-skin .ut-top-header-sub-menu ul li.current_page_ancestor > a:hover,
                    #header-section.ut-primary-custom-skin .ut-top-header-sub-menu ul li.current_page_ancestor > a:active,
                    #header-section.ut-primary-custom-skin .ut-top-header-sub-menu ul li.current-menu-ancestor > a:hover,
                    #header-section.ut-primary-custom-skin .ut-top-header-sub-menu ul li.current-menu-ancestor > a:active {
                        color:<?php echo $this->rgba_to_rgb(  ut_return_header_config( 'ut_navigation_ps_sl_active_color' ) ); ?> !important;
                        color:<?php echo ut_return_header_config( 'ut_navigation_ps_sl_active_color' ); ?> !important;
                    }
                
                <?php endif; ?>
                
                <?php 
			
                /* Primary Skin Mega Menu Titles
                ================================================== */
                if( ut_return_header_config( 'ut_navigation_ps_megamenu_column_title_color' ) ) : ?>

                    #header-section.ut-primary-custom-skin .ut-megamenu .ut-nav-header h3 {
                        color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_navigation_ps_megamenu_column_title_color' ) ); ?> !important;   
                        color:<?php echo ut_return_header_config( 'ut_navigation_ps_megamenu_column_title_color' ); ?> !important;   
                    }    

                <?php endif; ?>

                <?php 

                /* Primary Skin Mega Menu Titles Hover
                ================================================== */
                if( ut_return_header_config( 'ut_navigation_ps_megamenu_column_title_color_hover' ) ) : ?>

                    #header-section.ut-primary-custom-skin .ut-megamenu .current-menu-parent .ut-nav-header h3,
                    #header-section.ut-primary-custom-skin .ut-megamenu .ut-navigation-column-list:hover .ut-nav-header h3 {
                        color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_navigation_ps_megamenu_column_title_color_hover' ) ); ?> !important;   
                        color:<?php echo ut_return_header_config( 'ut_navigation_ps_megamenu_column_title_color_hover' ); ?> !important;   
                    }    

                <?php endif; ?>	
                
                <?php 
            
                /* Primary Skin Animating Border Style (First Level)
                ================================================== */
                if( ut_return_header_config( 'ut_navigation_ps_fl_decoration_color' ) ) : ?>
                
                    #header-section.ut-primary-custom-skin .ut-horizontal-navigation.ut-navigation-style-animation-line-top ul li a.ut-main-navigation-link::after,
                    #header-section.ut-primary-custom-skin .ut-horizontal-navigation.ut-navigation-style-animation-line-bottom ul li a.ut-main-navigation-link::after,
                    #header-section.ut-primary-custom-skin .ut-horizontal-navigation.ut-navigation-style-animation-line-middle ul li a.ut-main-navigation-link span::after {
                        background:<?php echo ut_return_header_config( 'ut_navigation_ps_fl_decoration_color' ); ?>;
                        height:<?php echo ut_return_header_config( 'ut_navigation_animation_line_height', 2 ); ?>px;
                    }
                
                <?php endif; ?>
                
                <?php 
            
                /* Primary Skin Animating Border Style (First Level)
                ================================================== */
                if( ut_return_header_config( 'ut_navigation_ps_fl_decoration_color' ) ) : ?>
                
                    #header-section.ut-primary-custom-skin .ut-horizontal-navigation.ut-navigation-style-animation-line-top ul li a.ut-main-navigation-link::after,
                    #header-section.ut-primary-custom-skin .ut-horizontal-navigation.ut-navigation-style-animation-line-bottom ul li a.ut-main-navigation-link::after,
                    #header-section.ut-primary-custom-skin .ut-horizontal-navigation.ut-navigation-style-animation-line-middle ul li a.ut-main-navigation-link span::after {
                        background:<?php echo ut_return_header_config( 'ut_navigation_ps_fl_decoration_color' ); ?>;
                        height:<?php echo ut_return_header_config( 'ut_navigation_animation_line_height', 2 ); ?>px;
                    }
                
                <?php endif; ?>

                <?php

                /* Primary Skin Description Color
                ================================================== */
                if( ut_return_header_config( 'ut_navigation_ps_fl_description_color' ) ) : ?>

                     #header-section.ut-primary-custom-skin .ut-horizontal-navigation.ut-navigation-with-description-above ul li a.ut-main-navigation-link span::before {
                         color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_navigation_ps_fl_description_color' ) ); ?> !important;
                         color:<?php echo ut_return_header_config( 'ut_navigation_ps_fl_description_color' ); ?> !important;
                     }

                <?php endif; ?>
                
                <?php
                
                /* Primary Skin Animating Animations Second Level)
                ================================================== */
                if( ut_return_header_config( 'ut_navigation_column_link_animation', 'no' ) == 'yes' ) :            
            
                    /* Primary Skin Animating Border (Second Level)
                    ================================================== */ ?>
                    #header-section.ut-primary-custom-skin .ut-navigation-with-link-animation.ut-navigation-with-link-animation-type-border ul.sub-menu li a > span::after,
                    #header-section.ut-primary-custom-skin .ut-navigation-with-link-animation.ut-navigation-with-link-animation-type-border .ut-navigation-column-list li a > span::after {
                        border-bottom: <?php echo ut_return_header_config( 'ut_navigation_column_link_animation_border_height', 2 ); ?>px solid <?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_navigation_ps_sl_animation_color', $this->accent ) ); ?>;   
                        border-bottom: <?php echo ut_return_header_config( 'ut_navigation_column_link_animation_border_height', 2 ); ?>px solid <?php echo ut_return_header_config( 'ut_navigation_ps_sl_animation_color', $this->accent ); ?>   
                    }

                    <?php

                    /* Primary Skin Animating Background (Second Level)
                    ================================================== */ ?>
                    #header-section.ut-primary-custom-skin .ut-navigation-with-link-animation.ut-navigation-with-link-animation-type-background ul.sub-menu li a::after,
                    #header-section.ut-primary-custom-skin .ut-navigation-with-link-animation.ut-navigation-with-link-animation-type-background .ut-navigation-column-list li a::after,
                    #header-section.ut-primary-custom-skin .ut-navigation-with-link-animation.ut-navigation-with-link-animation-type-background-static ul.sub-menu li a::after,
                    #header-section.ut-primary-custom-skin .ut-navigation-with-link-animation.ut-navigation-with-link-animation-type-background-static .ut-navigation-column-list li a::after {
                        background:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_navigation_ps_sl_animation_color', $this->accent ) ); ?> !important;   
                        background:<?php echo ut_return_header_config( 'ut_navigation_ps_sl_animation_color', $this->accent ); ?> !important;   
                    }

                <?php endif; ?>                
                
                <?php 
            
                /* Primary Skin Second Level Shadow Color
                ================================================== */
                if( ut_return_header_config( 'ut_navigation_ps_sl_shadow_color' ) ) : ?>
                
                    #header-section.ut-primary-custom-skin .ut-horizontal-navigation ul.sub-menu,
					#header-section.ut-primary-custom-skin .ut-horizontal-navigation .ut-megamenu  {
                       -webkit-box-shadow:0 5px 5px 0 <?php echo ut_return_header_config( 'ut_navigation_ps_sl_shadow_color' ); ?>;
                          -moz-box-shadow:0 5px 5px 0 <?php echo ut_return_header_config( 'ut_navigation_ps_sl_shadow_color' ); ?>;
                               box-shadow:0 5px 5px 0 <?php echo ut_return_header_config( 'ut_navigation_ps_sl_shadow_color' ); ?>;
                    }				
                
                <?php endif; ?>
                
                <?php 
                
                /* Primary Skin Second Level Border Top Color
                ================================================== */
                if( ut_return_header_config( 'ut_navigation_ps_sl_border_color' ) ) : ?>
                    
                    #header-section .ut-horizontal-navigation ul.sub-menu,
					#header-section .ut-horizontal-navigation .ut-megamenu {
                        border-top-color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_navigation_ps_sl_border_color' ) ); ?> !important;
                        border-top-color:<?php echo ut_return_header_config( 'ut_navigation_ps_sl_border_color' ); ?> !important;
                    }
                
                <?php endif; ?>
                
				<?php 
                
                /* Primary Skin Second Level Border Top Width
                ================================================== */
                if( ut_return_header_config( 'ut_navigation_ps_sl_border_width' ) != '' ) : ?>
                    
                    #header-section .ut-horizontal-navigation ul.sub-menu,
					#header-section .ut-horizontal-navigation .ut-megamenu {
                        border-top-width:<?php echo ut_return_header_config( 'ut_navigation_ps_sl_border_width' ); ?>px !important;
                    }

                    #header-section .ut-horizontal-navigation ul.sub-menu li > ul.sub-menu {
                        top: -<?php echo ut_return_header_config( 'ut_navigation_ps_sl_border_width' ); ?>px;
                    }

                    #header-section .ut-horizontal-navigation ul.sub-menu li:not(:first-child) > ul.sub-menu {
                        top: -<?php echo ut_return_header_config( 'ut_navigation_ps_sl_border_width' ) + 40; ?>px;
                    }
                
                <?php endif; ?>
				
                <?php 
                
                /* Primary Skin Second Level Remaining Border Settings
                ================================================== */
                $ut_navigation_ps_sl_borders = ut_return_header_config( 'ut_navigation_ps_sl_borders' );            
            
                if( ut_return_header_config( 'ut_navigation_ps_sl_borders' ) ) : ?>
                    
                    <?php 
                    
                    $css = implode(';', array_map( function ($v, $k) { 

                    $v = $k == 'border-bottom-width' || $k == 'border-right-width' || $k == 'border-left-width' ? $v . 'px' : $v;
                    
                        return $k . ':' . $v . ' !important'; 

                    }, $ut_navigation_ps_sl_borders, array_keys( $ut_navigation_ps_sl_borders ) ) ); ?>
                    
                    #header-section .ut-top-header-sub-menu ul,
                    #header-section .ut-horizontal-navigation ul.sub-menu,
					#header-section .ut-horizontal-navigation .ut-megamenu {
                         <?php echo $css; ?>                       
                    }
                
                <?php else : ?>
                
                    #header-section .ut-horizontal-navigation ul.sub-menu,
					#header-section .ut-horizontal-navigation .ut-megamenu {
                        border-left: none;
                        border-right: none;
                        border-bottom: none;
                    }
                
                <?php endif; ?>
                
                <?php 
            
                /* Primary Skin Separator Color
                ================================================== */
                if( ut_return_header_config( 'ut_header_ps_separator_border_color' ) ) : ?>
                    
                    #header-section.ut-primary-custom-skin #header-section-area-separator .ut-header-area-separator,    
                    #header-section.ut-primary-custom-skin[data-separator="on"]:not([data-style="style-9"]):not([data-style="style-5"]) #header-section-upper-area {
                        border-bottom-color: <?php echo ut_return_header_config( 'ut_header_ps_separator_border_color' ); ?>;                
                    }

                    #header-section.ut-primary-custom-skin[data-separator="on"][data-style="style-5"] #header-section-lower-area {
                        border-top-color: <?php echo ut_return_header_config( 'ut_header_ps_separator_border_color' ); ?>;        
                    }
                        
                    #header-section.ut-primary-custom-skin[data-separator="on"][data-style="style-9"] .ut-header-area-separator {
                        border-bottom-color: <?php echo ut_return_header_config( 'ut_header_ps_separator_border_color' ); ?>;
                    }
                
                <?php endif; ?>
                
                <?php 
            
                /* Hover State Skin Logo
                ================================================== */
                if( ut_return_header_config('ut_navigation_customskin_state' , 'off') == 'on_switch' && ut_return_header_config( 'ut_navigation_ps_hover_state', 'off' ) == 'on' && ut_return_header_config( 'ut_header_ps_hover_text_logo_color' ) ) : ?>
                    
                    #header-section.ut-primary-custom-skin:hover .site-logo .logo,
                    #header-section.ut-primary-custom-skin:hover .site-logo .logo a {
                        color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_header_ps_hover_text_logo_color' ) ); ?> !important;
                        color:<?php echo ut_return_header_config( 'ut_header_ps_hover_text_logo_color' ); ?> !important;
                    }
                    
                    #header-section.ut-primary-custom-skin:hover .ut-open-overlay-menu.ut-hamburger:not(.is-active) span,
					#header-section.ut-primary-custom-skin:hover .ut-open-overlay-menu.ut-hamburger span::before,
					#header-section.ut-primary-custom-skin:hover .ut-open-overlay-menu.ut-hamburger span::after {
						background:<?php echo $this->rgba_to_rgb( ot_get_option( 'ut_header_ps_hover_text_logo_color' ) ); ?>;
						background:<?php echo ot_get_option( 'ut_header_ps_hover_text_logo_color' ); ?>;
					}                
                
                <?php endif; ?>
                
                <?php if( ut_return_header_config('ut_navigation_customskin_state' , 'off') == 'on_switch' && ut_return_header_config( 'ut_navigation_ps_hover_state', 'off' ) == 'on' && ut_return_header_config( 'ut_header_ps_hover_text_logo_color_hover' ) ) : ?>
                    
                    #header-section.ut-primary-custom-skin:hover .site-logo .logo a:hover,
                    #header-section.ut-primary-custom-skin:hover .site-logo .logo a:active {
                        color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_header_ps_hover_text_logo_color_hover' ) ); ?> !important;
                        color:<?php echo ut_return_header_config( 'ut_header_ps_hover_text_logo_color_hover' ); ?> !important;
                    }
                
                <?php endif; ?>                
                
                <?php 
                
                /* Hover State Skin Colors
                ================================================== */
                if( ut_return_header_config('ut_navigation_customskin_state' , 'off') == 'on_switch' && ut_return_header_config( 'ut_navigation_ps_hover_state', 'off' ) == 'on' ) :
            
                    /* Hover State Skin Background
                    ================================================== */
                    if( ut_return_header_config( 'ut_header_ps_background_color_hover' ) ) : ?>

                        <?php 

                        $ut_header_ps_background_color_hover = ut_return_header_config( 'ut_header_ps_background_color_hover' );

                        if( $this->is_gradient( $ut_header_ps_background_color_hover ) ) : ?>

                            #header-section.ut-primary-custom-skin:before,
                            #header-section.ut-primary-custom-skin:after {
                                position: absolute;
                                content: '';
                                top: 0;
                                left: 0;
                                width: 100%;
                                height: 100%;
                                transition: opacity 0.5s ease-in-out;
                                opacity: 0;
                                pointer-events: none;
                            }

                            <?php echo $this->create_gradient_css( $ut_header_ps_background_color_hover, '#header-section.ut-primary-custom-skin:after', false, 'background' ); ?>

                            #header-section.ut-primary-custom-skin:hover:after {
                                opacity: 1 !important;
                            }

                            #header-section.ut-primary-custom-skin:hover {
                                background: transparent !important;
                            } 

                        <?php else : ?>                

                            #header-section.ut-primary-custom-skin:hover {
                                background:<?php echo $this->rgba_to_rgb( $ut_header_ps_background_color_hover ); ?> !important;
                                background:<?php echo $ut_header_ps_background_color_hover; ?> !important;
                            }

                        <?php endif; ?>

                    <?php endif; ?>
                            
                    <?php 
            
                    /* Hover State Separator Color
                    ================================================== */
                    if( ut_return_header_config( 'ut_header_ps_separator_border_color_hover' ) ) : ?>

                        #header-section.ut-primary-custom-skin #header-section-area-separator .ut-header-area-separator    
                        #header-section.ut-primary-custom-skin[data-separator="on"]:not([data-style="style-9"]):not([data-style="style-5"]):hover #header-section-upper-area {
                            border-bottom-color: <?php echo ut_return_header_config( 'ut_header_ps_separator_border_color_hover' ); ?>;                
                        }

                        #header-section.ut-primary-custom-skin[data-separator="on"][data-style="style-5"]:hover #header-section-lower-area {
                            border-top-color: <?php echo ut_return_header_config( 'ut_header_ps_separator_border_color_hover' ); ?>;        
                        }

                        #header-section.ut-primary-custom-skin[data-separator="on"][data-style="style-9"]:hover .ut-header-area-separator {
                            border-bottom-color: <?php echo ut_return_header_config( 'ut_header_ps_separator_border_color_hover' ); ?>;
                        }

                    <?php endif; ?>
                
                    <?php 

                    /* Hover State Skin Border Bottom
                    ================================================== */            
                    if( ut_return_header_config( 'ut_header_ps_border_color_hover' ) ) : 

                        $ut_header_ps_border_color_hover = $this->parse_rgba( ut_return_header_config( 'ut_header_ps_border_color_hover' ) );

                        if( ( $ut_header_ps_border_color_hover && isset( $ut_header_ps_border_color_hover['a'] ) && $ut_header_ps_border_color_hover['a'] == 0 ) ) { ?>

                            #header-section.ut-primary-custom-skin:hover .ut-horizontal-navigation ul li.ut-is-megamenu:hover > .ut-megamenu,
                            #header-section.ut-primary-custom-skin:hover .ut-horizontal-navigation ul li.ut-menu-item-lvl-0:hover > ul.sub-menu,
                            #header-section.ut-primary-custom-skin:hover .ut-horizontal-navigation.ut-navigation-with-animation ul li.ut-is-megamenu:hover > .ut-megamenu, 
                            #header-section.ut-primary-custom-skin:hover .ut-horizontal-navigation.ut-navigation-with-animation ul li.ut-menu-item-lvl-0:hover > ul.sub-menu {
                                top: calc(100% + 1px);
                            }

                        <?php } else { ?>

                            #header-section.ut-primary-custom-skin:hover {
                                border-bottom-color: <?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_header_ps_border_color_hover' ) ); ?> !important;
                                border-bottom-color: <?php echo ut_return_header_config( 'ut_header_ps_border_color_hover' ); ?> !important;
                            }                

                        <?php } ?>

                    <?php endif; ?>
                
                    <?php 
            
                    /* Hover State Shadow Color
                    ================================================== */
                    if( ut_return_header_config( 'ut_header_ps_shadow_color_hover' ) ) : ?>

                        #header-section.ut-primary-custom-skin:hover {
                            -webkit-box-shadow: 0 0 transparent, 0 0 transparent, 0 5px 5px -4px <?php echo ut_return_header_config( 'ut_header_ps_shadow_color_hover' ); ?>;
                                    box-shadow: 0 0 transparent, 0 0 transparent, 0 5px 5px -4px <?php echo ut_return_header_config( 'ut_header_ps_shadow_color_hover' ); ?>;        
                        }

                    <?php endif; ?>
                
                    <?php 

                    /* Hover State Skin Link Color
                    ================================================== */   
                    if( ut_return_header_config( 'ut_navigation_ps_hover_fl_color' ) ) : ?>

                        #header-section.ut-primary-custom-skin:hover,
                        #header-section.ut-primary-custom-skin:hover a,
                        #header-section.ut-primary-custom-skin:hover .ut-deactivated-link,
                        #header-section.ut-primary-custom-skin:hover .ut-deactivated-link:hover,
                        #header-section.ut-primary-custom-skin:hover .ut-deactivated-link:active {
                            color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_navigation_ps_hover_fl_color' ) ); ?>;
                            color:<?php echo ut_return_header_config( 'ut_navigation_ps_hover_fl_color' ); ?>;
                        }

                    <?php endif; ?>

                    <?php 

                    /* Hover State Skin Link Color Hover
                    ================================================== */ ?>
                    #header-section.ut-primary-custom-skin:hover a:hover,
                    #header-section.ut-primary-custom-skin:hover a:active {
                        color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_navigation_ps_hover_fl_color_hover', $this->accent ) ); ?>;
                        color:<?php echo ut_return_header_config( 'ut_navigation_ps_hover_fl_color_hover', $this->accent ); ?>;
                    }                
                    
                    #header-section.ut-primary-custom-skin:hover .sub-menu li.sfHover > a,
                    #header-section.ut-primary-custom-skin:hover li.sfHover > .ut-main-navigation-link {
                        color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_navigation_ps_hover_fl_color_hover', $this->accent ) ); ?>;
                        color:<?php echo ut_return_header_config( 'ut_navigation_ps_hover_fl_color_hover', $this->accent ); ?>;
                    }
                
                    #header-section.ut-primary-custom-skin:hover .ut-top-header-has-submenu:hover .ut-header-cart,
                    #header-section.ut-primary-custom-skin:hover .ut-top-header-has-submenu:hover .ut-top-header-main-link {
                        color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_navigation_ps_hover_fl_color_hover', $this->accent ) ); ?>;
                        color:<?php echo ut_return_header_config( 'ut_navigation_ps_hover_fl_color_hover', $this->accent ); ?>;
                    }
                    
                    /* Hover State Skin Link Selected
                    ================================================== */ ?>
                    #header-section.ut-primary-custom-skin:hover .selected,
                    #header-section.ut-primary-custom-skin:hover .selected:hover,
                    #header-section.ut-primary-custom-skin:hover .selected:active {
                        color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_navigation_ps_hover_fl_color_active', $this->accent ) ); ?> !important;
                        color:<?php echo ut_return_header_config( 'ut_navigation_ps_hover_fl_color_active', $this->accent ); ?> !important;
                    } 

                    #header-section.ut-primary-custom-skin:hover li.current_page_item:not(.menu-item-object-custom) > a, 
                    #header-section.ut-primary-custom-skin:hover li.current-menu-item:not(.menu-item-object-custom) > a, 
                    #header-section.ut-primary-custom-skin:hover li.current_page_parent > a,
                    #header-section.ut-primary-custom-skin:hover li.current_page_ancestor > a,
                    #header-section.ut-primary-custom-skin:hover li.current-menu-ancestor > a,
                    #header-section.ut-primary-custom-skin:hover li.current-menu-parent:not(.has-scroll-children) > a {
                        color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_navigation_ps_hover_fl_color_active', $this->accent ) ); ?> !important;
                        color:<?php echo ut_return_header_config( 'ut_navigation_ps_hover_fl_color_active', $this->accent ); ?> !important;
                    }
                
                    #header-section.ut-primary-custom-skin:hover li.current_page_item:not(.menu-item-object-custom) > a:hover,
                    #header-section.ut-primary-custom-skin:hover li.current_page_item:not(.menu-item-object-custom) > a:active,
                    #header-section.ut-primary-custom-skin:hover li.current-menu-item:not(.menu-item-object-custom) > a:hover,
                    #header-section.ut-primary-custom-skin:hover li.current-menu-item:not(.menu-item-object-custom) > a:active,
                    #header-section.ut-primary-custom-skin:hover li.current_page_parent > a:hover,
                    #header-section.ut-primary-custom-skin:hover li.current_page_parent > a:active,
                    #header-section.ut-primary-custom-skin:hover li.current_page_ancestor > a:hover,
                    #header-section.ut-primary-custom-skin:hover li.current_page_ancestor > a:active,
                    #header-section.ut-primary-custom-skin:hover li.current-menu-parent:not(.has-scroll-children) > a:hover,
                    #header-section.ut-primary-custom-skin:hover li.current-menu-parent:not(.has-scroll-children) > a:active,
                    #header-section.ut-primary-custom-skin:hover li.current-menu-ancestor > a:hover,
                    #header-section.ut-primary-custom-skin:hover li.current-menu-ancestor > a:active {
                        color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_navigation_ps_hover_fl_color_active', $this->accent ) ); ?> !important;
                        color:<?php echo ut_return_header_config( 'ut_navigation_ps_hover_fl_color_active', $this->accent ); ?> !important;
                    }
                
                    <?php 
            
                    /* Hover State Skin Separator ( Dot )Color
                    ================================================== */
                    if( ut_return_header_config( 'ut_navigation_ps_hover_fl_dot_color' ) ) : ?>
                        
                        #header-section.ut-primary-custom-skin:hover .ut-navigation-style-separator ul li a::after {
                            color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_navigation_ps_hover_fl_dot_color' ) ); ?>;   
                            color:<?php echo ut_return_header_config( 'ut_navigation_ps_hover_fl_dot_color' ); ?>;
                        }

                    <?php endif; ?>
                
                    <?php 
            
                    /* Hover State Skin Animating Border Style
                    ================================================== */
                    if( ut_return_header_config( 'ut_navigation_ps_hover_fl_decoration_color' ) ) : ?>

                        #header-section.ut-primary-custom-skin:hover .ut-horizontal-navigation.ut-navigation-style-animation-line-top ul li a.ut-main-navigation-link::after,
                        #header-section.ut-primary-custom-skin:hover .ut-horizontal-navigation.ut-navigation-style-animation-line-bottom ul li a.ut-main-navigation-link::after,
                        #header-section.ut-primary-custom-skin:hover .ut-horizontal-navigation.ut-navigation-style-animation-line-middle ul li a.ut-main-navigation-link span::after {
                            background:<?php echo ut_return_header_config( 'ut_navigation_ps_hover_fl_decoration_color' ); ?>;
                            height:<?php echo ut_return_header_config( 'ut_navigation_ps_hover_fl_decoration_color', 2 ); ?>px;
                        }

                    <?php endif; ?>

                    <?php

                    /* Hover State Skin Description Color
                    ================================================== */
                    if( ut_return_header_config( 'ut_navigation_ps_hover_fl_description_color' ) ) : ?>

                        #header-section.ut-primary-custom-skin:hover .ut-horizontal-navigation.ut-navigation-with-description-above ul li a.ut-main-navigation-link span::before {
                            color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_navigation_ps_hover_fl_description_color' ) ); ?> !important;
                            color:<?php echo ut_return_header_config( 'ut_navigation_ps_hover_fl_description_color' ); ?> !important;
                        }

                    <?php endif; ?>
                
              <?php endif; ?>  
              
                
                /* Secondary Skin Logof
                ================================================== */
                <?php if( ut_return_header_config( 'ut_header_ss_text_logo_color' ) ) : ?>
                    
                    #header-section.ut-secondary-custom-skin .site-logo .logo,
                    #header-section.ut-secondary-custom-skin .site-logo .logo a {
                        color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_header_ss_text_logo_color' ) ); ?> !important;
                        color:<?php echo ut_return_header_config( 'ut_header_ss_text_logo_color' ); ?> !important;
                    }
                    
                    #header-section.ut-secondary-custom-skin .ut-open-overlay-menu.ut-hamburger:not(.is-active) span,
					#header-section.ut-secondary-custom-skin .ut-open-overlay-menu.ut-hamburger span::before,
					#header-section.ut-secondary-custom-skin .ut-open-overlay-menu.ut-hamburger span::after {
						background:<?php echo $this->rgba_to_rgb( ot_get_option( 'ut_header_ss_text_logo_color' ) ); ?>;
						background:<?php echo ot_get_option( 'ut_header_ss_text_logo_color' ); ?>;
					}                
                
                <?php endif; ?>
                
                <?php if( ut_return_header_config( 'ut_header_ss_text_logo_color_hover' ) ) : ?>
                
                    #header-section.ut-secondary-custom-skin .site-logo .logo a:hover,
                    #header-section.ut-secondary-custom-skin .site-logo .logo a:active {
                        color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_header_ss_text_logo_color_hover' ) ); ?> !important;
                        color:<?php echo ut_return_header_config( 'ut_header_ss_text_logo_color_hover' ); ?> !important;
                    }
                
                <?php endif; ?>
                
                
                <?php 
            
                /* Secondary Skin Background
                ================================================== */
                if( ut_return_header_config( 'ut_header_ss_background_color' ) ) : ?>
                    
                    <?php 
                    
                    $ut_header_ss_background_color = ut_return_header_config( 'ut_header_ss_background_color' );
                    
                    if( $this->is_gradient( $ut_header_ss_background_color ) ) : ?>
                        
                        #header-section.ut-secondary-custom-skin .ut-top-header-sub-menu ul:before,
                        #header-section.ut-secondary-custom-skin .ut-top-header-sub-menu ul:after,
                        #header-section.ut-secondary-custom-skin .ut-horizontal-navigation .sub-menu:before,
                        #header-section.ut-secondary-custom-skin .ut-horizontal-navigation .sub-menu:after,
                        #header-section.ut-secondary-custom-skin .ut-megamenu:before,
                        #header-section.ut-secondary-custom-skin .ut-megamenu:after,
                        #header-section.ut-secondary-custom-skin:before,
                        #header-section.ut-secondary-custom-skin:after {
                            position: absolute;
                            content: '';
                            top: 0;
                            left: 0;
                            width: 100%;
                            height: 100%;
                            transition: opacity 0.5s ease-in-out;
                            opacity: 0;
                            pointer-events: none;
                        }
                
                        <?php echo $this->create_gradient_css( $ut_header_ss_background_color, '#header-section.ut-secondary-custom-skin .ut-top-header-sub-menu ul:before', false, 'background' ); ?>
                        <?php echo $this->create_gradient_css( $ut_header_ss_background_color, '#header-section.ut-secondary-custom-skin .ut-horizontal-navigation .sub-menu:before', false, 'background' ); ?>
                        <?php echo $this->create_gradient_css( $ut_header_ss_background_color, '#header-section.ut-secondary-custom-skin .ut-megamenu:before', false, 'background' ); ?>
                        <?php echo $this->create_gradient_css( $ut_header_ss_background_color, '#header-section.ut-secondary-custom-skin:before', false, 'background' ); ?>
                        
                        #header-section.ut-secondary-custom-skin .ut-top-header-sub-menu ul:before,
                        #header-section.ut-secondary-custom-skin .ut-horizontal-navigation .sub-menu:before,
                        #header-section.ut-secondary-custom-skin .ut-megamenu:before,
                        #header-section.ut-secondary-custom-skin:before {
                            opacity: 1 !important;
                        }
                        
                        #header-section.ut-secondary-custom-skin .ut-top-header-sub-menu ul,
                        #header-section.ut-secondary-custom-skin .ut-horizontal-navigation .sub-menu,
                        #header-section.ut-secondary-custom-skin .ut-megamenu,
                        #header-section.ut-secondary-custom-skin {
                            background: transparent !important;
                        } 
            
                    <?php else : ?>                
                        
                        #header-section.ut-secondary-custom-skin {
                            background:<?php echo $this->rgba_to_rgb( $ut_header_ss_background_color ); ?> !important;
                            background:<?php echo $ut_header_ss_background_color; ?> !important;
                        }
                
                        #header-section.ut-secondary-custom-skin .ut-horizontal-navigation .sub-menu,
                        #header-section.ut-secondary-custom-skin .ut-megamenu,
                        #header-section.ut-secondary-custom-skin .ut-top-header-sub-menu ul {
                            background:<?php echo $this->rgba_to_rgb( $ut_header_ss_background_color ); ?> !important;
                            background:<?php echo $ut_header_ss_background_color; ?> !important;
                        }
				                
                    <?php endif; ?>
            
                
                <?php endif; ?>
                
                
                <?php 
                
                /* Secondary Skin Border Bottom
                ================================================== */
                if( ut_return_header_config( 'ut_header_ss_border_color' ) ) : 
                    
                    $ut_header_ss_border_color = $this->parse_rgba( ut_return_header_config( 'ut_header_ss_border_color' ) );
            
                    if( ( $ut_header_ss_border_color && isset( $ut_header_ss_border_color['a'] ) && $ut_header_ss_border_color['a'] == 0 ) ) { ?>
                        
                        #header-section.ut-secondary-custom-skin .ut-horizontal-navigation ul li.ut-is-megamenu:hover > .ut-megamenu,
                        #header-section.ut-secondary-custom-skin .ut-horizontal-navigation ul li.ut-menu-item-lvl-0:hover > ul.sub-menu,
                        #header-section.ut-secondary-custom-skin .ut-horizontal-navigation.ut-navigation-with-animation ul li.ut-is-megamenu:hover > .ut-megamenu, 
                        #header-section.ut-secondary-custom-skin .ut-horizontal-navigation.ut-navigation-with-animation ul li.ut-menu-item-lvl-0:hover > ul.sub-menu {
                            top: calc(100% + 1px);
                        }
                        
                    <?php } else { ?>
                        
                        #header-section.ut-secondary-custom-skin {
                           border-bottom-color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_header_ss_border_color' ) ); ?> !important;
                           border-bottom-color:<?php echo ut_return_header_config( 'ut_header_ss_border_color' ); ?> !important;
                        }                
                        
                    <?php } ?>
                
                <?php endif; ?>
                
                <?php 
            
                /* Secondary Skin Shadow Color
                ================================================== */
                if( ut_return_header_config( 'ut_header_ss_shadow_color' ) ) : ?>
                
                    #header-section.ut-secondary-custom-skin {
                        -webkit-box-shadow: 0 0 transparent, 0 0 transparent, 0 5px 5px -4px <?php echo ut_return_header_config( 'ut_header_ss_shadow_color' ); ?>;
                                box-shadow: 0 0 transparent, 0 0 transparent, 0 5px 5px -4px <?php echo ut_return_header_config( 'ut_header_ss_shadow_color' ); ?>;        
                    }
                
                <?php endif; ?>
                
                <?php 
            
                /* Secondary Skin Link Color
                ================================================== */
                if( ut_return_header_config( 'ut_navigation_ss_fl_color' ) ) : ?>
                    
                    #header-section.ut-secondary-custom-skin,
                    #header-section.ut-secondary-custom-skin a,
                    #header-section.ut-secondary-custom-skin .ut-deactivated-link,
                    #header-section.ut-secondary-custom-skin .ut-deactivated-link:hover,
                    #header-section.ut-secondary-custom-skin .ut-deactivated-link:active {
                        color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_navigation_ss_fl_color' ) ); ?>;   
                        color:<?php echo ut_return_header_config( 'ut_navigation_ss_fl_color' ); ?>;        
                    }
                
                <?php endif; ?>
                
                <?php 
            
                /* Secondary Skin Link Color Hover
                ================================================== */ ?>
                #header-section.ut-secondary-custom-skin a:hover,
                #header-section.ut-secondary-custom-skin a:active {
                    color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_navigation_ss_fl_color_hover', $this->accent ) ); ?>;   
                    color:<?php echo ut_return_header_config( 'ut_navigation_ss_fl_color_hover', $this->accent ); ?>;          
                }
                 
                #header-section.ut-secondary-custom-skin .ut-horizontal-navigation .sub-menu li.sfHover > a,
                #header-section.ut-secondary-custom-skin li.sfHover > .ut-main-navigation-link {
                    color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_navigation_ss_fl_color_hover', $this->accent ) ); ?>;   
                    color:<?php echo ut_return_header_config( 'ut_navigation_ss_fl_color_hover', $this->accent ); ?>;
                }
                
                #header-section.ut-secondary-custom-skin .ut-top-header-has-submenu:hover .ut-header-cart,
                #header-section.ut-secondary-custom-skin .ut-top-header-has-submenu:hover .ut-top-header-main-link {
                    color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_navigation_ss_fl_color_hover', $this->accent ) ); ?>;
                    color:<?php echo ut_return_header_config( 'ut_navigation_ss_fl_color_hover', $this->accent ); ?>;
                }
                
                <?php 
            
                /* Secondary Skin Link Color Active
                ================================================== */ ?>
                #header-section.ut-secondary-custom-skin .selected,
                #header-section.ut-secondary-custom-skin .selected:hover,
                #header-section.ut-secondary-custom-skin .selected:active {
                    color:<?php echo $this->rgba_to_rgb(  ut_return_header_config( 'ut_navigation_ss_fl_active_color', $this->accent ) ); ?>;
                    color:<?php echo ut_return_header_config( 'ut_navigation_ss_fl_active_color', $this->accent ); ?>;
                }
                
                #header-section.ut-secondary-custom-skin li.current_page_item:not(.menu-item-object-custom) > a, 
                #header-section.ut-secondary-custom-skin li.current-menu-item:not(.menu-item-object-custom) > a, 
                #header-section.ut-secondary-custom-skin li.current_page_parent > a,
                #header-section.ut-secondary-custom-skin li.current_page_ancestor > a,
                #header-section.ut-secondary-custom-skin li.current-menu-ancestor > a,
                #header-section.ut-secondary-custom-skin li.current-menu-parent:not(.has-scroll-children) > a {
                    color:<?php echo $this->rgba_to_rgb(  ut_return_header_config( 'ut_navigation_ss_fl_active_color', $this->accent ) ); ?> !important;
                    color:<?php echo ut_return_header_config( 'ut_navigation_ss_fl_active_color', $this->accent ); ?> !important;
                }
                
                #header-section.ut-secondary-custom-skin li.current_page_item:not(.menu-item-object-custom) > a:hover,
                #header-section.ut-secondary-custom-skin li.current_page_item:not(.menu-item-object-custom) > a:active,
                #header-section.ut-secondary-custom-skin li.current-menu-item:not(.menu-item-object-custom) > a:hover,
                #header-section.ut-secondary-custom-skin li.current-menu-item:not(.menu-item-object-custom) > a:active,
                #header-section.ut-secondary-custom-skin li.current_page_parent > a:hover,
                #header-section.ut-secondary-custom-skin li.current_page_parent > a:active,
                #header-section.ut-secondary-custom-skin li.current_page_ancestor > a:hover,
                #header-section.ut-secondary-custom-skin li.current_page_ancestor > a:active,
                #header-section.ut-secondary-custom-skin li.current-menu-parent:not(.has-scroll-children) > a:hover,
                #header-section.ut-secondary-custom-skin li.current-menu-parent:not(.has-scroll-children) > a:active,
                #header-section.ut-secondary-custom-skin li.current-menu-ancestor > a:hover,
                #header-section.ut-secondary-custom-skin li.current-menu-ancestor > a:active {
                    color:<?php echo $this->rgba_to_rgb(  ut_return_header_config( 'ut_navigation_ss_fl_active_color', $this->accent ) ); ?> !important;
                    color:<?php echo ut_return_header_config( 'ut_navigation_ss_fl_active_color', $this->accent ); ?> !important;
                }
                
                <?php 
            
                /* Secondary Skin Separator
                ================================================== */
                if( ut_return_header_config( 'ut_navigation_ss_fl_dot_color' ) ) : ?>
                    
                    #header-section.ut-secondary-custom-skin .ut-navigation-style-separator ul li a::after {
                        color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_navigation_ss_fl_dot_color' ) ); ?>;   
                        color:<?php echo ut_return_header_config( 'ut_navigation_ss_fl_dot_color' ); ?>; 
                    }
                
                <?php endif; ?>
                
                <?php 
            
                /* Secondary Skin Second Level Background
                ================================================== */
                if( ut_return_header_config( 'ut_navigation_ss_sl_background_color' ) ) : ?>
                    
                    <?php 
                    
                    $ut_navigation_ss_sl_background_color = ut_return_header_config( 'ut_navigation_ss_sl_background_color' );
            
                    if( $this->is_gradient( $ut_navigation_ss_sl_background_color ) ) : ?>
                        
                        #header-section.ut-secondary-custom-skin .ut-top-header-sub-menu ul:before,
                        #header-section.ut-secondary-custom-skin .ut-top-header-sub-menu ul:after,
                        #header-section.ut-secondary-custom-skin .ut-horizontal-navigation .sub-menu:before,
                        #header-section.ut-secondary-custom-skin .ut-horizontal-navigation f.sub-menu:after,
                        #header-section.ut-secondary-custom-skin .ut-megamenu:before,
                        #header-section.ut-secondary-custom-skin .ut-megamenu:after {
                            position: absolute;
                            content: '';
                            top: 0;
                            left: 0;
                            width: 100%;
                            height: 100%;
                            transition: opacity 0.5s ease-in-out;
                            opacity: 0;
                            pointer-events: none;
                        }
                
                        <?php echo $this->create_gradient_css( $ut_navigation_ss_sl_background_color, '#header-section.ut-secondary-custom-skin .ut-top-header-sub-menu ul:before', false, 'background', true ); ?>
                        <?php echo $this->create_gradient_css( $ut_navigation_ss_sl_background_color, '#header-section.ut-secondary-custom-skin .ut-horizontal-navigation .sub-menu:before', false, 'background', true ); ?>
                        <?php echo $this->create_gradient_css( $ut_navigation_ss_sl_background_color, '#header-section.ut-secondary-custom-skin .ut-megamenu:before', false, 'background', true ); ?>
                        
                        #header-section.ut-secondary-custom-skin .ut-top-header-sub-menu ul:before,
                        #header-section.ut-secondary-custom-skin .ut-horizontal-navigation .sub-menu:before,
                        #header-section.ut-secondary-custom-skin .ut-megamenu:before {
                            opacity: 1 !important;
                        }
                        
                        #header-section.ut-secondary-custom-skin .ut-top-header-sub-menu ul,
                        #header-section.ut-secondary-custom-skin .ut-horizontal-navigation .sub-menu,
                        #header-section.ut-secondary-custom-skin .ut-megamenu {
                            background: transparent !important;
                        }
            
                    <?php else : ?>

                        #header-section.ut-secondary-custom-skin .ut-top-header-sub-menu ul,
                        #header-section.ut-secondary-custom-skin .ut-horizontal-navigation .sub-menu,
                        #header-section.ut-secondary-custom-skin .ut-horizontal-navigation .sub-menu:before,
                        #header-section.ut-secondary-custom-skin .ut-horizontal-navigation .sub-menu:after,
                        #header-section.ut-secondary-custom-skin .ut-megamenu,
                        #header-section.ut-secondary-custom-skin .ut-megamenu:before,
                        #header-section.ut-secondary-custom-skin .ut-megamenu:after {
                            background:<?php echo $this->rgba_to_rgb( $ut_navigation_ss_sl_background_color ); ?> !important;
                            background:<?php echo $ut_navigation_ss_sl_background_color; ?> !important;
                        }
                
                    <?php endif; ?>
                
                <?php endif; ?>
                
                <?php 
            
                /* Secondary Skin Social Icons Color
                ================================================== */
                if( ut_return_header_config( 'ut_navigation_ss_header_social_icons_color' ) ) : ?>
                    
                    #header-section.ut-secondary-custom-skin .ut-header-extra-module-company-social-list a {
                        color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_navigation_ss_header_social_icons_color' ) ); ?> !important;
                        color:<?php echo ut_return_header_config( 'ut_navigation_ss_header_social_icons_color' ); ?> !important;
                    }
                
                <?php endif; ?>
                
                <?php 
            
                /* Secondary Skin Social Icons Color Hover
                ================================================== */
                if( ut_return_header_config( 'ut_navigation_ss_header_social_icons_color_hover' ) ) : ?>
                    
                    #header-section.ut-secondary-custom-skin .ut-header-extra-module-company-social-list a:hover,
                    #header-section.ut-secondary-custom-skin .ut-header-extra-module-company-social-list a:active {
                        color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_navigation_ss_header_social_icons_color_hover' ) ); ?> !important;
                        color:<?php echo ut_return_header_config( 'ut_navigation_ss_header_social_icons_color_hover' ); ?>!important;
                    }
                
                <?php endif; ?>
                
                <?php 
            
                /* Secondary Skin Second Level Link Color
                ================================================== */
                if( ut_return_header_config( 'ut_navigation_ss_sl_color' ) ) : ?>
                    
                    #header-section.ut-secondary-custom-skin .ut-top-header-sub-menu ul li > a,
                    #header-section.ut-secondary-custom-skin .ut-horizontal-navigation .sub-menu li > a,
                    #header-section.ut-secondary-custom-skin .ut-megamenu li > a {
                        color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_navigation_ss_sl_color' ) ); ?>;
                        color:<?php echo ut_return_header_config( 'ut_navigation_ss_sl_color' ); ?>;
                    }
                
                    #header-section.ut-secondary-custom-skin .ut-header-mini-cart-total-count,
                    #header-section.ut-secondary-custom-skin .ut-header-mini-cart-total-price {
                        color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_navigation_ss_sl_color' ) ); ?>;
                        color:<?php echo ut_return_header_config( 'ut_navigation_ss_sl_color' ); ?>;
                    }
                
                <?php endif; ?>
                
                
                <?php 
            
                /* Secondary Skin Second Level Link Color Hover
                ================================================== */
                if( ut_return_header_config( 'ut_navigation_ss_sl_color_hover' ) ) : ?>
                
                    #header-section.ut-secondary-custom-skin .ut-top-header-sub-menu ul li > a:hover,
                    #header-section.ut-secondary-custom-skin .ut-horizontal-navigation .sub-menu li > a:hover,
                    #header-section.ut-secondary-custom-skin .ut-megamenu li > a:hover,
                    #header-section.ut-secondary-custom-skin .ut-top-header-sub-menu ul li > a:active,
                    #header-section.ut-secondary-custom-skin .ut-horizontal-navigation .sub-menu li > a:active,
                    #header-section.ut-secondary-custom-skin .ut-megamenu li > a:active {
                        color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_navigation_ss_sl_color_hover' ) ); ?> !important;
                        color:<?php echo ut_return_header_config( 'ut_navigation_ss_sl_color_hover' ); ?> !important;
                    }
                
                    #header-section.ut-secondary-custom-skin .ut-horizontal-navigation .sub-menu li.sfHover > a {
                        color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_navigation_ss_sl_color_hover' ) ); ?> !important;
                        color:<?php echo ut_return_header_config( 'ut_navigation_ss_sl_color_hover' ); ?> !important;        
                    }
                
                <?php endif; ?>
                
                <?php 
            
                /* Primary Skin Second Level Link Color Active
                ================================================== */
                if( ut_return_header_config( 'ut_navigation_ss_sl_active_color' ) ) : ?>
                    
                    #header-section.ut-secondary-custom-skin .ut-horizontal-navigation .sub-menu .selected,
                    #header-section.ut-secondary-custom-skin .ut-horizontal-navigation .sub-menu .selected:hover,
                    #header-section.ut-secondary-custom-skin .ut-horizontal-navigation .sub-menu .selected:active {
                        color:<?php echo $this->rgba_to_rgb(  ut_return_header_config( 'ut_navigation_ss_sl_active_color' ) ); ?>!important;
                        color:<?php echo ut_return_header_config( 'ut_navigation_ss_sl_active_color' ); ?> !important;
                    } 

                    #header-section.ut-secondary-custom-skin .ut-horizontal-navigation .sub-menu li.current_page_item > a, 
                    #header-section.ut-secondary-custom-skin .ut-horizontal-navigation .sub-menu li.current-menu-item > a, 
                    #header-section.ut-secondary-custom-skin .ut-horizontal-navigation .sub-menu li.current_page_parent > a,
                    #header-section.ut-secondary-custom-skin .ut-horizontal-navigation .sub-menu li.current_page_ancestor > a,
                    #header-section.ut-secondary-custom-skin .ut-horizontal-navigation .sub-menu li.current-menu-ancestor > a {
                        color:<?php echo $this->rgba_to_rgb(  ut_return_header_config( 'ut_navigation_ss_sl_active_color' ) ); ?> !important;
                        color:<?php echo ut_return_header_config( 'ut_navigation_ss_sl_active_color' ); ?> !important;
                    }

                    #header-section.ut-secondary-custom-skin .ut-horizontal-navigation .sub-menu li.current_page_item > a:hover,
                    #header-section.ut-secondary-custom-skin .ut-horizontal-navigation .sub-menu li.current_page_item > a:active,
                    #header-section.ut-secondary-custom-skin .ut-horizontal-navigation .sub-menu li.current-menu-item > a:hover, 
                    #header-section.ut-secondary-custom-skin .ut-horizontal-navigation .sub-menu li.current-menu-item > a:active,
                    #header-section.ut-secondary-custom-skin .ut-horizontal-navigation .sub-menu li.current_page_parent > a:hover,
                    #header-section.ut-secondary-custom-skin .ut-horizontal-navigation .sub-menu li.current_page_parent > a:active,
                    #header-section.ut-secondary-custom-skin .ut-horizontal-navigation .sub-menu li.current_page_ancestor > a:hover,
                    #header-section.ut-secondary-custom-skin .ut-horizontal-navigation .sub-menu li.current_page_ancestor > a:active,
                    #header-section.ut-secondary-custom-skin .ut-horizontal-navigation .sub-menu li.current-menu-ancestor > a:hover,
                    #header-section.ut-secondary-custom-skin .ut-horizontal-navigation .sub-menu li.current-menu-ancestor > a:active {
                        color:<?php echo $this->rgba_to_rgb(  ut_return_header_config( 'ut_navigation_ss_sl_active_color' ) ); ?> !important;
                        color:<?php echo ut_return_header_config( 'ut_navigation_ss_sl_active_color' ); ?> !important;
                    }
                
                    #header-section.ut-secondary-custom-skin .ut-navigation-column-list .selected,
                    #header-section.ut-secondary-custom-skin .ut-navigation-column-list .selected:hover,
                    #header-section.ut-secondary-custom-skin .ut-navigation-column-list .selected:active {
                        color:<?php echo $this->rgba_to_rgb(  ut_return_header_config( 'ut_navigation_ss_sl_active_color' ) ); ?> !important;
                        color:<?php echo ut_return_header_config( 'ut_navigation_ss_sl_active_color' ); ?> !important;
                    } 

                    #header-section.ut-secondary-custom-skin .ut-navigation-column-list li.current_page_item > a, 
                    #header-section.ut-secondary-custom-skin .ut-navigation-column-list li.current-menu-item > a, 
                    #header-section.ut-secondary-custom-skin .ut-navigation-column-list li.current_page_parent > a,
                    #header-section.ut-secondary-custom-skin .ut-navigation-column-list li.current_page_ancestor > a,
                    #header-section.ut-secondary-custom-skin .ut-navigation-column-list li.current-menu-ancestor > a {
                        color:<?php echo $this->rgba_to_rgb(  ut_return_header_config( 'ut_navigation_ss_sl_active_color' ) ); ?> !important;
                        color:<?php echo ut_return_header_config( 'ut_navigation_ss_sl_active_color' ); ?> !important;
                    }
                
                    #header-section.ut-secondary-custom-skin .ut-navigation-column-list li.current_page_item > a:hover,
                    #header-section.ut-secondary-custom-skin .ut-navigation-column-list li.current_page_item > a:active,
                    #header-section.ut-secondary-custom-skin .ut-navigation-column-list li.current-menu-item > a:hover,
                    #header-section.ut-secondary-custom-skin .ut-navigation-column-list li.current-menu-item > a:active,
                    #header-section.ut-secondary-custom-skin .ut-navigation-column-list li.current_page_parent > a:hover,
                    #header-section.ut-secondary-custom-skin .ut-navigation-column-list li.current_page_parent > a:active,
                    #header-section.ut-secondary-custom-skin .ut-navigation-column-list li.current_page_ancestor > a:hover,
                    #header-section.ut-secondary-custom-skin .ut-navigation-column-list li.current_page_ancestor > a:active,
                    #header-section.ut-secondary-custom-skin .ut-navigation-column-list li.current-menu-ancestor > a:hover,
                    #header-section.ut-secondary-custom-skin .ut-navigation-column-list li.current-menu-ancestor > a:active {
                        color:<?php echo $this->rgba_to_rgb(  ut_return_header_config( 'ut_navigation_ss_sl_active_color' ) ); ?> !important;
                        color:<?php echo ut_return_header_config( 'ut_navigation_ss_sl_active_color' ); ?> !important;
                    }    
                    
                    #header-section.ut-secondary-custom-skin .ut-top-header-sub-menu ul li.current_page_item > a, 
                    #header-section.ut-secondary-custom-skin .ut-top-header-sub-menu ul li.current-menu-item > a, 
                    #header-section.ut-secondary-custom-skin .ut-top-header-sub-menu ul li.current_page_parent > a,
                    #header-section.ut-secondary-custom-skin .ut-top-header-sub-menu ul li.current_page_ancestor > a,
                    #header-section.ut-secondary-custom-skin .ut-top-header-sub-menu ul li.current-menu-ancestor > a {
                        color:<?php echo $this->rgba_to_rgb(  ut_return_header_config( 'ut_navigation_ss_sl_active_color' ) ); ?> !important;
                        color:<?php echo ut_return_header_config( 'ut_navigation_ss_sl_active_color' ); ?> !important;
                    }
                
                    #header-section.ut-secondary-custom-skin .ut-top-header-sub-menu ul li.current_page_item > a:hover,
                    #header-section.ut-secondary-custom-skin .ut-top-header-sub-menu ul li.current_page_item > a:active,
                    #header-section.ut-secondary-custom-skin .ut-top-header-sub-menu ul li.current-menu-item > a:hover,
                    #header-section.ut-secondary-custom-skin .ut-top-header-sub-menu ul li.current-menu-item > a:active,
                    #header-section.ut-secondary-custom-skin .ut-top-header-sub-menu ul li.current_page_parent > a:hover,
                    #header-section.ut-secondary-custom-skin .ut-top-header-sub-menu ul li.current_page_parent > a:active,
                    #header-section.ut-secondary-custom-skin .ut-top-header-sub-menu ul li.current_page_ancestor > a:hover,
                    #header-section.ut-secondary-custom-skin .ut-top-header-sub-menu ul li.current_page_ancestor > a:active,
                    #header-section.ut-secondary-custom-skin .ut-top-header-sub-menu ul li.current-menu-ancestor > a:hover,
                    #header-section.ut-secondary-custom-skin .ut-top-header-sub-menu ul li.current-menu-ancestor > a:active {
                        color:<?php echo $this->rgba_to_rgb(  ut_return_header_config( 'ut_navigation_ss_sl_active_color' ) ); ?> !important;
                        color:<?php echo ut_return_header_config( 'ut_navigation_ss_sl_active_color' ); ?> !important;
                    }
                
                <?php endif; ?>
                
                <?php 
			
                /* Secondary Skin Megamenu Title Color
                ================================================== */	
                if( ut_return_header_config( 'ut_navigation_ss_megamenu_column_title_color' ) ) : ?>

                    #ut-sitebody .ut-secondary-custom-skin .ut-megamenu .ut-nav-header h3 {
                        color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_navigation_ss_megamenu_column_title_color' ) ); ?> !important;   
                        color:<?php echo ut_return_header_config( 'ut_navigation_ss_megamenu_column_title_color' ); ?> !important;   
                    }    

                <?php endif; ?>	

                <?php 

                /* Secondary Skin Megamenu Title Color Hover
                ================================================== */	
                if( ut_return_header_config( 'ut_navigation_ss_megamenu_column_title_color_hover' ) ) : ?>

                    #ut-sitebody .ut-secondary-custom-skin .ut-megamenu .current-menu-parent .ut-nav-header h3,
                    #ut-sitebody .ut-secondary-custom-skin .ut-megamenu .ut-navigation-column-list:hover .ut-nav-header h3 {
                        color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_navigation_ss_megamenu_column_title_color_hover' ) ); ?> !important;   
                        color:<?php echo ut_return_header_config( 'ut_navigation_ss_megamenu_column_title_color_hover' ); ?> !important;   
                    }    

                <?php endif; ?>	
                
                <?php 
            
                /* Secondary Skin Animating Border Style
                ================================================== */
                if( ut_return_header_config( 'ut_navigation_ss_fl_decoration_color' ) ) : ?>
                
                    #header-section.ut-secondary-custom-skin .ut-horizontal-navigation.ut-navigation-style-animation-line-top ul li a.ut-main-navigation-link::after,
                    #header-section.ut-secondary-custom-skin .ut-horizontal-navigation.ut-navigation-style-animation-line-bottom ul li a.ut-main-navigation-link::after,
                    #header-section.ut-secondary-custom-skin .ut-horizontal-navigation.ut-navigation-style-animation-line-middle ul li a.ut-main-navigation-link span::after {
                        background:<?php echo ut_return_header_config( 'ut_navigation_ss_fl_decoration_color' ); ?>;
                        height:<?php echo ut_return_header_config( 'ut_navigation_animation_line_height', 2 ); ?>px;
                    }
                
                <?php endif; ?>


                <?php

				/* Secondary Skin Description Color
				================================================== */
				if( ut_return_header_config( 'ut_navigation_ss_fl_description_color' ) ) : ?>

                    #header-section.ut-secondary-custom-skin .ut-horizontal-navigation.ut-navigation-with-description-above ul li a.ut-main-navigation-link span::before {
                        color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_navigation_ss_fl_description_color' ) ); ?> !important;
                        color:<?php echo ut_return_header_config( 'ut_navigation_ss_fl_description_color' ); ?> !important;
                    }

                <?php endif; ?>
                
                <?php 
			
                /* Secondary Skin Animating Animations Second Level)
                ================================================== */
                if( ut_return_header_config( 'ut_navigation_column_link_animation', 'no' ) == 'yes' ) : 
            
                    /* Secondary Skin Animating Border (Second Level)
                    ================================================== */ ?>
                    #header-section.ut-secondary-custom-skin .ut-navigation-with-link-animation.ut-navigation-with-link-animation-type-background ul.sub-menu li a::after,
                    #header-section.ut-secondary-custom-skin .ut-navigation-with-link-animation.ut-navigation-with-link-animation-type-background .ut-navigation-column-list li a::after,
                    #header-section.ut-secondary-custom-skin .ut-navigation-with-link-animation.ut-navigation-with-link-animation-type-background-static ul.sub-menu li a::after,
                    #header-section.ut-secondary-custom-skin .ut-navigation-with-link-animation.ut-navigation-with-link-animation-type-background-static .ut-navigation-column-list li a::after {
                        background:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_navigation_ss_sl_animation_color', $this->accent ) ); ?> !important;   
                        background:<?php echo ut_return_header_config( 'ut_navigation_ss_sl_animation_color', $this->accent ); ?> !important;   
                    }    

                    <?php

                    /* Secondary Skin Animating Background (Second Level)
                    ================================================== */ ?>
                    #header-section.ut-secondary-custom-skin .ut-navigation-with-link-animation.ut-navigation-with-link-animation-type-border ul.sub-menu li a span::after,
                    #header-section.ut-secondary-custom-skin .ut-navigation-with-link-animation.ut-navigation-with-link-animation-type-border .ut-navigation-column-list li a span::after {
                        border-bottom: <?php echo ut_return_header_config( 'ut_navigation_column_link_animation_border_height', 2 ); ?>px solid <?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_navigation_ss_sl_animation_color', $this->accent ) ); ?>;   
                        border-bottom: <?php echo ut_return_header_config( 'ut_navigation_column_link_animation_border_height', 2 ); ?>px solid <?php echo ut_return_header_config( 'ut_navigation_ss_sl_animation_color', $this->accent ); ?>;   
                    }

                <?php endif; ?>	
                
                <?php 
            
                /* Secondary Skin Second Level Shadow
                ================================================== */
                if( ut_return_header_config( 'ut_navigation_ss_sl_shadow_color' ) ) : ?>
                
                    #header-section.ut-secondary-custom-skin .ut-horizontal-navigation ul.sub-menu,
					#header-section.ut-secondary-custom-skin .ut-horizontal-navigation .ut-megamenu {
                       -webkit-box-shadow:0 5px 5px 0 <?php echo ut_return_header_config( 'ut_navigation_ss_sl_shadow_color' ); ?>;
                          -moz-box-shadow:0 5px 5px 0 <?php echo ut_return_header_config( 'ut_navigation_ss_sl_shadow_color' ); ?>;
                               box-shadow:0 5px 5px 0 <?php echo ut_return_header_config( 'ut_navigation_ss_sl_shadow_color' ); ?>;
                    }
                
                <?php endif; ?>
                
                <?php 
            
                /* Secondary Skin Second Level Border Color
                ================================================== */
                if( ut_return_header_config( 'ut_navigation_ss_sl_border_color' ) ) : ?>
                    
                    #header-section.ut-secondary-custom-skin .ut-horizontal-navigation ul.sub-menu,
					#header-section.ut-secondary-custom-skin .ut-horizontal-navigation .ut-megamenu {
                        border-top-color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_navigation_ss_sl_border_color' ) ); ?> !important;
                        border-top-color:<?php echo ut_return_header_config( 'ut_navigation_ss_sl_border_color' ); ?> !important;
                    }
                
                <?php endif; ?>
                
                <?php 
                
                /* Secondary Skin Second Level Remaining Border Settings
                ================================================== */
                $ut_navigation_ss_sl_borders = ut_return_header_config( 'ut_navigation_ss_sl_borders' );            
            
                if( ut_return_header_config( 'ut_navigation_ss_sl_borders' ) ) : ?>
                    
                    <?php 
                    
                    $css = implode(';', array_map( function ($v, $k) { 

                    $v = $k == 'border-bottom-width' || $k == 'border-right-width' || $k == 'border-left-width' ? $v . 'px' : $v;
                    
                        return $k . ':' . $v . ' !important'; 

                    }, $ut_navigation_ss_sl_borders, array_keys( $ut_navigation_ss_sl_borders ) ) ); ?>
                    
                    #header-section.ut-secondary-custom-skin .ut-top-header-sub-menu ul,
                    #header-section.ut-secondary-custom-skin .ut-horizontal-navigation ul.sub-menu,
					#header-section.ut-secondary-custom-skin .ut-horizontal-navigation .ut-megamenu {
                         <?php echo $css; ?>                       
                    }
                
                <?php endif; ?>
                
                <?php 
            
                if( ut_return_header_config( 'ut_header_ss_separator_border_color' ) ) : ?>
                
                    #header-section.ut-secondary-custom-skin #header-section-area-separator .ut-header-area-separator,    
                    #header-section.ut-secondary-custom-skin[data-separator="on"]:not([data-style="style-9"]):not([data-style="style-5"]) #header-section-upper-area {
                        border-bottom-color: <?php echo ut_return_header_config( 'ut_header_ss_separator_border_color' ); ?>;                
                    }

                    #header-section.ut-secondary-custom-skin[data-separator="on"][data-style="style-5"] #header-section-lower-area {
                        border-top-color: <?php echo ut_return_header_config( 'ut_header_ss_separator_border_color' ); ?>;        
                    }
                
                    #header-section.ut-secondary-custom-skin[data-separator="on"][data-style="style-9"] .ut-header-area-separator {
                        border-bottom-color: <?php echo ut_return_header_config( 'ut_header_ss_separator_border_color' ); ?>;
                    }    
                
                <?php endif; ?> 
            
            <?php endif; ?>
                
            <?php if( ut_return_header_config( 'ut_navigation_skin' , 'ut-header-light' ) != 'ut-header-custom' && ut_return_header_config('ut_navigation_shadow' , 'off' ) == 'off' ) : ?>
                    
                /* Header without Shadow
                ================================================== */
                .ha-header { box-shadow: none; }
                    
            <?php endif; ?>
            
            <?php if( ut_return_header_config( 'ut_navigation_skin' , 'ut-header-light' ) == 'ut-header-light' && ut_return_header_config('ut_navigation_border_bottom' , 'on' ) == 'off' ) : ?>
                    
                /* Header without Border
                ================================================== */
                .ha-header.ut-header-light { border-bottom: none; }
                    
            <?php endif; ?>
                
            /* Header Scroll Position
            ================================================== */    
            <?php if( ut_return_header_config('ut_navigation_scroll_position' , 'floating') == 'fixed' && ut_return_header_config( 'ut_header_layout', 'default' ) == 'default' ) : ?>
                				
                #header-section.ut-header-fixed.ha-transparent {
                    position:absolute;
                }
				
                #ut-sitebody:not(.ut-header-display-on-hero) #header-section.ut-header-fixed:not(.ha-header-hide) {
                    position:relative;
                    top:0;
                }
				
				#ut-sitebody.ut-header-display-on-hero #header-section.ut-header-fixed:not(.ha-header-hide) {
                    position:absolute;
                    top:0;
                }

                .ut-mobile-menu-open #header-section.ut-header-fixed:not(.ha-header-hide) {
                    position:absolute;
                }

                .ut-site-border-top #header-section.ut-header-fixed.ha-transparent {
                    top: 40px;
                }
				
            <?php endif; ?>            
            			
			<?php 
			
			$ut_navigation_ps_sl_mm_border = ut_return_header_config( 'ut_navigation_ps_sl_mm_border' );
			
			/* Primary Skin Mega Menu Border */
			if( !empty( $ut_navigation_ps_sl_mm_border['border-left-style'] ) && $ut_navigation_ps_sl_mm_border['border-left-style'] != 'none' ) : ?>
                
				<?php $css = implode(';', array_map( function ($v, $k) { 
				
					$v = $k == 'border-left-width' ? $v . 'px' : $v;
				
					return $k . ':' . $v; 
					
					}, $ut_navigation_ps_sl_mm_border, array_keys($ut_navigation_ps_sl_mm_border) ) ); ?>
				
				#header-section .ut-megamenu .ut-megamenu-grid-col:not(:first-child) {
					<?php echo $css; ?>					
				}	    

			<?php endif; ?>		
			
			<?php 
			
			$ut_navigation_ss_sl_mm_border = ut_return_header_config( 'ut_navigation_ss_sl_mm_border' );
			
			/* Secondary Skin Mega Menu Border */
			if( !empty( $ut_navigation_ss_sl_mm_border['border-left-color'] ) ) : ?>
                
				<?php $css = implode(';', array_map( function ($v, $k) { 
				
					$v = $k == 'border-left-width' ? $v . 'px' : $v;
				
					return $k . ':' . $v; 
					
					}, $ut_navigation_ss_sl_mm_border, array_keys( $ut_navigation_ss_sl_mm_border ) ) ); ?>
				
				#header-section.ut-secondary-custom-skin .ut-megamenu .ut-megamenu-grid-col:not(:first-child) {
					<?php echo $css; ?>					
				}	    

			<?php endif; ?>
                
			/* Mega Menu Size
            ================================================== */ 	
            @media (max-width: <?php echo $this->add_px_value( ot_get_option( 'ut_site_custom_width', '1200' ) - 40 ); ?>) {
                
                .ut-horizontal-navigation .ut-megamenu.ut-megamenu-centered {
                    max-width: <?php echo $this->add_px_value( ot_get_option( 'ut_site_custom_width', '1200' ) - 40 ); ?>;
                    margin-left: auto;
                    left: 50%;
                }
                
                #header-section.centered .ut-horizontal-navigation .ut-megamenu.ut-megamenu-centered ul.ut-navigation-column-list li {
                    padding: 0 20px;
                }                
                
            } 
                
            @media (max-width: <?php echo $this->add_px_value( ot_get_option( 'ut_site_custom_width', '1200' ) ); ?>) {
                
                #header-section.centered .ut-horizontal-navigation .ut-megamenu.ut-megamenu-fullwidth.ut-megamenu-with-padding {
                    width: 100%;
                    left: 0;
                    right: 0;
                }
                
                #header-section.centered .ut-horizontal-navigation .ut-megamenu.ut-megamenu-fullwidth ul.ut-navigation-column-list li {
                    padding: 0 20px;
                }
                
            }   
                
            @media (min-width: <?php echo $this->add_px_value( ( ot_get_option( 'ut_site_custom_width', '1200' ) - 40 ) + 1 ); ?>) {
                
                .ut-horizontal-navigation .ut-megamenu.ut-megamenu-centered {
                    max-width: <?php echo $this->add_px_value( ot_get_option( 'ut_site_custom_width', '1200' ) - 40 ); ?>;
                    margin-left: -<?php echo $this->add_px_value( ( ot_get_option( 'ut_site_custom_width', '1200' ) - 40 ) / 2 ); ?>;
                    left: 50%;
                }

            }
                
			<?php
			
			/* Header Mouse Over Transition
            ================================================== */				
			if( ut_return_header_config( 'ut_navigation_no_mouse_transition', 'no' ) == 'yes' ) : ?>	
				
				#header-section.ha-header {
					-webkit-transition: none;
					        transition: none;
				}
				
			<?php endif; ?>	
				
				
            /* Site Logo Table Width
            ================================================== */ 
            #header-section .site-logo {
                 width: 100%;
            }           
            
                
            /* Extra Scroll Behavior
            ================================================== */     
            <?php if( ut_page_option('ut_top_header', 'hide') == 'show' ) : 
                
                // default top header height
                $top_header_height = 40;
                
                // check if top header has extra border
                $ut_top_header_border_bottom_style = ut_return_header_config( 'ut_top_header_border_bottom_style' );
                
                if( !empty( $ut_top_header_border_bottom_style['border-bottom-width'] ) ) {
                
                    $top_header_height += $ut_top_header_border_bottom_style['border-bottom-width'];
                    
                } ?>                
                
                #ut-sitebody.ut-has-top-header .ha-header-small[data-style="style-9"] {
                    -webkit-transform: translate3d(0, -<?php echo $top_header_height; ?>px, 0);
                            transform: translate3d(0, -<?php echo $top_header_height; ?>px, 0);
                }    
                
            <?php endif; ?>            
                
			</style>            
            
            <?php
            
            /* output css */
            echo $this->minify_css( ob_get_clean() );
        
        }  
            
    }

}