<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'UT_Mobile_Navigation_CSS' ) ) {	
    
    class UT_Mobile_Navigation_CSS extends UT_Custom_CSS {
        
        public function custom_css() {
            
            ob_start(); ?>
            
            <style id="ut-mobile-navigation-custom-css" type="text/css">
                
                <?php 
                
                /* Mobile Navigation
                ================================================== */
                echo $this->typography_css( '#ut-sitebody #ut-mobile-menu a', ot_get_option('ut_global_mobile_navigation_font_style') );
                echo $this->typography_css( '#ut-sitebody #ut-mobile-menu .sub-menu a', ot_get_option('ut_global_mobile_navigation_sub_font_style') );
                
                ?>                

                @media (max-width: 1024px) {
                    
                    .ut-mobile-menu a:hover { 
                        background:<?php echo $this->accent; ?>; 
                    }
                    
                    .ut-mobile-menu a:after,
					.ut-mobile-menu a:before,
                    .ut-mm-button:hover:before, 
                    .ut-mm-trigger.active .ut-mm-button:before { 
                        color: <?php echo $this->accent; ?>;
                    }                    
                    
                    .ut-header-light .ut-mm-button:before {
                        color: <?php echo $this->accent; ?>;
                    }
                    
                    <?php if( ut_return_header_config( 'ut_mobile_navigation_trigger_icon' ) ) : ?>
                        
                        <?php $unicode = ut_get_fontawesome_unicode( ut_return_header_config( 'ut_mobile_navigation_trigger_icon' ) ); ?>
                        
                        <?php if( $unicode ) { ?>
                        
                            #ut-sitebody .ut-mm-trigger .ut-mm-button::before{ content: "\<?php echo $unicode; ?>";}
                        
                        <?php } ?>    
                        
                    <?php endif; ?>
                    
                    <?php 
			
					$ut_mobile_navigation_background_color = ut_return_header_config( 'ut_mobile_navigation_background_color' );
					
					if( $ut_mobile_navigation_background_color && $this->is_gradient( $ut_mobile_navigation_background_color ) ) : 
                    
                        echo $this->create_gradient_css( $ut_mobile_navigation_background_color, '#ut-sitebody.ut-mobile-menu-open #header-section.ha-header, #ut-sitebody.ut-mobile-menu-open #header-section.ha-header:before', false, 'background', true ); ?>
            
						#ut-sitebody.ut-mobile-menu-open .ut-header-dark #ut-mobile-nav,
                        #ut-sitebody.ut-mobile-menu-open .ut-header-light #ut-mobile-nav {
                            background:transparent;
                        }
			
                    <?php elseif( $ut_mobile_navigation_background_color ) : ?>

                        #ut-sitebody.ut-mobile-menu-open #header-section.ha-header,
                        #ut-sitebody.ut-mobile-menu-open #header-section.ha-header:before {
                            background: <?php echo ut_return_header_config( 'ut_mobile_navigation_background_color' ); ?> !important;
                        }
                        
                        #ut-sitebody.ut-mobile-menu-open .ut-header-dark #ut-mobile-nav,
                        #ut-sitebody.ut-mobile-menu-open .ut-header-light #ut-mobile-nav {
                            background:transparent;
                        }
				
					<?php endif; ?>
					
					<?php if( ut_return_header_config( 'ut_mobile_navigation_text_logo_color' ) ) : ?>
						
						#ut-sitebody.ut-mobile-menu-open #header-section.ha-header .site-logo h1.logo a,
						#ut-sitebody.ut-mobile-menu-open #header-section.ha-header .site-logo h1.logo a:hover {
                            color: <?php echo ut_return_header_config( 'ut_mobile_navigation_text_logo_color' ); ?> !important; 
                        }
				
					<?php endif; ?>
					
                    <?php if( ut_return_header_config( 'ut_mobile_navigation_link_color' ) ) : ?>
                        
                        #ut-sitebody.ut-mobile-menu-open #ut-mobile-menu a:not(.bklyn-btn) {
                            color: <?php echo ut_return_header_config( 'ut_mobile_navigation_link_color' ); ?> !important; 
                        }
    
                    <?php endif; ?>
                    
					
                    <?php if( ut_return_header_config( 'ut_mobile_navigation_link_color_hover' ) ) : ?>
                        
                        #ut-sitebody.ut-mobile-menu-open #ut-mobile-menu a:not(.bklyn-btn):hover,
                        #ut-sitebody.ut-mobile-menu-open #ut-mobile-menu a:not(.bklyn-btn):active {
                            color: <?php echo ut_return_header_config( 'ut_mobile_navigation_link_color_hover' ); ?> !important; 
                        }
    
                    <?php endif; ?>
                    
                    <?php if( ut_return_header_config( 'ut_mobile_navigation_link_background_color_hover' ) ) : ?>
                        
                        #ut-sitebody.ut-mobile-menu-open #ut-mobile-menu a:not(.bklyn-btn):hover,
                        #ut-sitebody.ut-mobile-menu-open #ut-mobile-menu a:not(.bklyn-btn):active {
                            background: <?php echo ut_return_header_config( 'ut_mobile_navigation_link_background_color_hover' ); ?> !important; 
                        }
    
                    <?php endif; ?>
                    
                    
                    <?php if( ut_return_header_config( 'ut_mobile_navigation_dot_color' ) ) : ?>
                        
                        #ut-sitebody.ut-mobile-menu-open #ut-mobile-menu a:not(.bklyn-btn)::before {
                            color: <?php echo ut_return_header_config( 'ut_mobile_navigation_dot_color' ); ?>; 
                        }
    
                    <?php endif; ?>
                    
                    <?php if( ut_return_header_config( 'ut_mobile_navigation_submenu_dot_color' ) ) : ?>
                        
                        #ut-sitebody.ut-mobile-menu-open #ut-mobile-menu .sub-menu a::before {
                            color: <?php echo ut_return_header_config( 'ut_mobile_navigation_submenu_dot_color' ); ?>; 
                        }
    
                    <?php endif; ?>
                    
                    
                    <?php if( ut_return_header_config( 'ut_mobile_navigation_dot_color_hover' ) ) : ?>
                        
                        #ut-sitebody.ut-mobile-menu-open #ut-mobile-menu a:not(.bklyn-btn):hover::before {
                            color: <?php echo ut_return_header_config( 'ut_mobile_navigation_dot_color_hover' ); ?>; 
                        }
    
                    <?php endif; ?>
                    
                    <?php if( ut_return_header_config( 'ut_mobile_navigation_submenu_dot_color_hover' ) ) : ?>
                        
                        #ut-sitebody.ut-mobile-menu-open #ut-mobile-menu .sub-menu a:hover::before {
                            color: <?php echo ut_return_header_config( 'ut_mobile_navigation_dot_color_hover' ); ?>; 
                        }
    
                    <?php endif; ?>
                    
                    
                    <?php if( ut_return_header_config( 'ut_mobile_navigation_border_color' ) ) : ?>
                        
                        .ut-mobile-menu a:not(.bklyn-btn) {
                            border-bottom: 1px solid <?php echo ut_return_header_config( 'ut_mobile_navigation_border_color' ); ?> !important;
                        }
                        
                    <?php endif; ?>
                    
                    
                    <?php if( ut_return_header_config( 'ut_mobile_navigation_trigger_color' ) ) : ?>
                        
                        #ut-sitebody .ut-mm-trigger .ut-mm-button::before {
                            color: <?php echo ut_return_header_config( 'ut_mobile_navigation_trigger_color' ); ?>; 
                        }
                    	
						#ut-sitebody .ut-mm-trigger #ut-open-mobile-menu.ut-hamburger span::before,
						#ut-sitebody .ut-mm-trigger #ut-open-mobile-menu.ut-hamburger:not(.is-active) span,
						#ut-sitebody .ut-mm-trigger #ut-open-mobile-menu.ut-hamburger span::after {
							background-color: <?php echo ut_return_header_config( 'ut_mobile_navigation_trigger_color' ); ?>; 
						}
					
					
                    <?php else : ?>
                        
                        /* fallback colors */
                        #ut-sitebody .ut-secondary-custom-skin .ut-mm-trigger .ut-mm-button::before {
                            color: <?php echo $this->accent; ?>; 
                        } 
						
						#ut-sitebody .ut-mm-trigger #ut-open-mobile-menu.ut-hamburger span::before,
						#ut-sitebody .ut-mm-trigger #ut-open-mobile-menu.ut-hamburger:not(.is-active) span,
						#ut-sitebody .ut-mm-trigger #ut-open-mobile-menu.ut-hamburger span::after {
							background-color: <?php echo $this->accent; ?>; 
						}
					
                    <?php endif; ?>
                    
                    <?php if( ut_return_header_config( 'ut_mobile_navigation_trigger_color_hover' ) ) : ?>
                        
                        #ut-sitebody .ut-mm-trigger .ut-mm-button:hover::before,
                        #ut-sitebody.ut-mobile-menu-open .ut-mm-trigger.active .ut-mm-button::before {
                            color: <?php echo ut_return_header_config( 'ut_mobile_navigation_trigger_color_hover' ); ?>; 
                        }
    				
						#ut-sitebody .ut-mm-trigger #ut-open-mobile-menu.ut-hamburger.is-active span::before,
						#ut-sitebody .ut-mm-trigger #ut-open-mobile-menu.ut-hamburger.is-active span::after {
							background-color: <?php echo ut_return_header_config( 'ut_mobile_navigation_trigger_color_hover' ); ?>; 
						}
					
                    <?php endif; ?>
                    
                    
                    <?php if( ot_get_option( 'ut_global_overlay_navigation_hamburger_line_width' ) ) : ?>

                        #ut-sitebody .ut-mm-trigger .ut-hamburger span, 
                        #ut-sitebody .ut-mm-trigger .ut-hamburger span::before,
                        #ut-sitebody .ut-mm-trigger .ut-hamburger span::after {
                            height: <?php echo $this->add_px_value( ot_get_option( 'ut_global_overlay_navigation_hamburger_line_width', 2 ) ); ?>;
                        } 

                    <?php endif; ?>

                    <?php if( ot_get_option( 'ut_global_overlay_navigation_hamburger_line_span_width', 'default' ) == 'medium' ) : ?>

                        #ut-sitebody .ut-mm-trigger .ut-hamburger {
                            width: 60px;
                        } 

                    <?php endif; ?>
                    
                    <?php if( ot_get_option( 'ut_global_overlay_navigation_hamburger_line_span_pseudo_width' ) ) : ?>

                        #ut-sitebody .ut-mm-trigger .ut-hamburger span::before,
                        #ut-sitebody .ut-mm-trigger .ut-hamburger span::after {
                            width: <?php echo ot_get_option( 'ut_global_overlay_navigation_hamburger_line_span_pseudo_width' ); ?>%;
                        } 

                    <?php endif; ?> 
                    
                    <?php 
            
                    // Secondary Skin
                    if( ut_return_header_config( 'ut_mobile_navigation_trigger_alternate_color', ut_return_header_config( 'ut_mobile_navigation_trigger_color' ) ) ) : ?>
                        
                        #ut-sitebody .ut-secondary-custom-skin .ut-mm-trigger .ut-mm-button::before {
                            color: <?php echo ut_return_header_config( 'ut_mobile_navigation_trigger_alternate_color', ut_return_header_config( 'ut_mobile_navigation_trigger_color' ) ); ?>; 
                        }
                    	
						#ut-sitebody .ut-secondary-custom-skin .ut-mm-trigger #ut-open-mobile-menu.ut-hamburger:not(.is-active) span::before,
						#ut-sitebody .ut-secondary-custom-skin .ut-mm-trigger #ut-open-mobile-menu.ut-hamburger:not(.is-active) span,
						#ut-sitebody .ut-secondary-custom-skin .ut-mm-trigger #ut-open-mobile-menu.ut-hamburger:not(.is-active) span::after {
							background-color: <?php echo ut_return_header_config( 'ut_mobile_navigation_trigger_alternate_color', ut_return_header_config( 'ut_mobile_navigation_trigger_color' ) ); ?>; 
						}
					
                    <?php endif; ?>
                    
                    <?php 
                    
                    /*
                     * Woocommerce Shopping Cart
                     */
            
                    if( is_woocommerce_activated() ) : ?>
                    
                        <?php if( ut_return_header_config( 'ut_mobile_navigation_cart_color' ) ) : ?>
                    
                            #ut-sitebody #header-section .ut-header-cart-mobile .ut-header-cart {
                                color: <?php echo ut_return_header_config( 'ut_mobile_navigation_cart_color' ); ?>;
                            }
                    
                        <?php endif; ?>
                    
                        <?php if( ut_return_header_config( 'ut_mobile_navigation_cart_color_hover' ) ) : ?>
                    
                            #ut-sitebody #header-section .ut-header-cart-mobile .ut-header-cart:hover,
                            #ut-sitebody.ut-mobile-menu-open #header-section .ut-header-cart-mobile .ut-header-cart {
                                color: <?php echo ut_return_header_config( 'ut_mobile_navigation_cart_color_hover' ); ?> !important;
                            }
                                                
                            #ut-sitebody #header-section.ut-secondary-custom-skin .ut-header-cart-mobile .ut-header-cart:hover,
                            #ut-sitebody #header-section.ut-secondary-custom-skin .ut-header-cart-mobile .ut-header-cart {
                                color: <?php echo ut_return_header_config( 'ut_mobile_navigation_cart_alternate_color', ut_return_header_config( 'ut_mobile_navigation_cart_color' ) ); ?>;
                            }
                    
                    
                        <?php endif; ?>
                            
                        #ut-sitebody #header-section .ut-header-cart-mobile .ut-header-cart-count {
                            color: <?php echo ut_return_header_config( 'ut_mobile_navigation_cart_count_color', '#FFF' ); ?>;
                            background: <?php echo ut_return_header_config( 'ut_mobile_navigation_cart_count_background', $this->accent ); ?>;
                        }
                        
                        #ut-sitebody #header-section .ut-header-cart-mobile .ut-header-cart:hover .ut-header-cart-count,
                        #ut-sitebody.ut-mobile-menu-open #header-section .ut-header-cart-mobile .ut-header-cart-count {
                            color: <?php echo ut_return_header_config( 'ut_mobile_navigation_cart_count_color_hover', '#FFF' ); ?>;
                            background: <?php echo ut_return_header_config( 'ut_mobile_navigation_cart_count_background_hover', $this->accent ); ?>;
                        }
                        
                        <?php 
            
                        // Secondary Skin
                        if( ut_return_header_config( 'ut_mobile_navigation_cart_alternate_color', ut_return_header_config( 'ut_mobile_navigation_cart_color' ) ) ) : ?>

                            #ut-sitebody #header-section.ut-secondary-custom-skin .ut-header-cart-mobile .ut-header-cart {
                                color: <?php echo ut_return_header_config( 'ut_mobile_navigation_cart_alternate_color', ut_return_header_config( 'ut_mobile_navigation_cart_color' ) ); ?>;
                            }

                        <?php endif; ?>
                    
                    
                    
                    
                    <?php endif; ?>

                }
                
				<?php if( ut_return_header_config('ut_mobile_navigation_trigger_icon_type', 'hamburger') == 'hamburger' ) : ?>
				
                    @media (min-width: 768px) and (max-width: 1024px) {

                        #ut-sitebody .ut-mm-trigger .ut-hamburger {
                            height: auto;
                        }

                        #ut-sitebody .ut-mm-trigger #ut-open-mobile-menu.ut-hamburger span {
                            top: 39px;
                        }

                    }

                    @media (max-width: 767px) {

                        #ut-sitebody .ut-mm-trigger .ut-hamburger {
                            height: auto;
                        }

                        #ut-sitebody .ut-mm-trigger #ut-open-mobile-menu.ut-hamburger span {
                            top: 29px;
                        }

                    }
				
				<?php endif; ?>
				
                
                <?php 
            
                /*
                 * Side Navigation Styles
                 */ 
            
                if( ut_return_header_config( 'ut_header_layout', 'default' ) == 'side' ) : ?>
                        
                    #ut-sitebody #header-section.ha-header {
                        box-shadow:none;
                    }

                <?php endif; ?>

                <?php if( ut_return_header_config( 'ut_mobile_navigation_background_color_closed' ) && ut_return_header_config( 'ut_header_layout', 'default' ) == 'side' ) : ?>

                    #ut-sitebody #header-section.ha-header {
                         background: <?php echo ut_return_header_config( 'ut_mobile_navigation_background_color_closed' ); ?>; 
                    }

                <?php endif; ?>
            
            </style>            
            
            <?php
            
            /* output css */
            echo $this->minify_css( ob_get_clean() );
            
        }        
        
    }

}