<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'UT_Global_CSS' ) ) {	
    
    class UT_Global_CSS extends UT_Custom_CSS {
        
        public function custom_css() {
            
            global $post;
            
            // Header Layout
            $ut_header_top_layout = apply_filters( 'unite_header_layout', 'default' );
            
            ob_start(); ?>

            <style id="ut-global-custom-css" type="text/css">
                	
                <?php 

                /*
                 * Load Custom Fonts
                 */
                
                $this->get_font_face(); ?>

                .ut-print {
                    border: 1px solid #2e86de;
                    background: #222f3e;
                    color: #feca57;
                    text-align: left;
                }

                /* Global Accent Colors
                ================================================== */
                ::-moz-selection { 
                    background: <?php echo $this->accent; ?>; 
                }
                
                ::selection { 
                    background: <?php echo $this->accent; ?>; 
                }
                
                a { 
                    /* color: <?php echo $this->accent; ?>; */
                    color: <?php echo ot_get_option('ut_linkcolor', $this->accent ); ?>;
                }

                .lead a,
				.logged-in-as a,
                .wpb_text_column a,
                .section-title a,
                .ut-twitter-rotator h2 a,
                .ut-vc-disabled .entry-content a:not(.checkout-button):not(.woocommerce-Button),
                .comment-content a:not(.more-link),
				.ut-accordion-module-inner.entry-content a,
                .type-post .entry-content :not(.tags-links) a:not(.more-link):not([class*="mashicon-"]):not(.ut-slider-maximize):not(.ut-prev-gallery-slide):not(.ut-next-gallery-slide):not(.ut-owl-video-play-icon):not(.owl-item-link):not(.flex-prev):not(.flex-next) {
                    color: <?php echo ot_get_option('ut_linkcolor', $this->accent ); ?>;
                    text-decoration: <?php echo ot_get_option('ut_link_decoration', 'none'); ?>;
                    font-weight: <?php echo ot_get_option('ut_link_weight', 'normal'); ?>;
                }

                a:hover,
                a:active,
                .lead a:hover,
                .lead a:active,
				.logged-in-as a:hover,
				.logged-in-as a:active,
                .ut-twitter-rotator h2 a:hover,
                .ut-twitter-rotator h2 a:active,
                .wpb_text_column a:hover,
                .wpb_text_column a:active,
                .section-title a:hover,
                .section-title a:active,
				.ut-accordion-module-inner.entry-content a:hover,
				.ut-accordion-module-inner.entry-content a:active,
                .ut-vc-disabled .entry-content a:not(.checkout-button):not(.woocommerce-Button):hover,
                .ut-vc-disabled .entry-content a:not(.checkout-button):not(.woocommerce-Button):active,
                .comment-content a:not(.more-link):hover,
                .comment-content a:not(.more-link):active,
                .type-post .entry-content :not(.tags-links) a:not(.more-link):not([class*="mashicon-"]):not(.ut-prev-gallery-slide):not(.ut-next-gallery-slide):not(.ut-slider-maximize):not(.ut-owl-video-play-icon):not(.owl-item-link):not(.flex-prev):not(.flex-next):hover,
                .type-post .entry-content :not(.tags-links) a:not(.more-link):not([class*="mashicon-"]):not(.ut-prev-gallery-slide):not(.ut-next-gallery-slide):not(.ut-slider-maximize):not(.ut-owl-video-play-icon):not(.owl-item-link):not(.flex-prev):not(.flex-next):active {
                    color: <?php echo ot_get_option('ut_linkcolor_hover', $this->accent ); ?>;     
                }

                .type-post .entry-content .type-post a:not(.ut-prev-gallery-slide):not(.ut-next-gallery-slide):not(.ut-slider-maximize):not(.ut-owl-video-play-icon):not(.owl-item-link):not(.flex-prev):not(.flex-next) {
                    text-decoration: none !important;
                    color: inherit !important;
                }

                .type-post .entry-content .type-post a:not(.ut-prev-gallery-slide):not(.ut-next-gallery-slide):not(.ut-slider-maximize):not(.ut-owl-video-play-icon):not(.owl-item-link):not(.flex-prev):not(.flex-next):hover,
                .type-post .entry-content .type-post a:not(.ut-prev-gallery-slide):not(.ut-next-gallery-slide):not(.ut-slider-maximize):not(.ut-owl-video-play-icon):not(.owl-item-link):not(.flex-prev):not(.flex-next):active {
                    color: <?php echo ot_get_option( 'ut_body_font_color', '#151515' ); ?> !important;
                }

                button:hover,
                button:focus,
                button:active,
                input[type="button"]:not(.hero-btn):hover,
                input[type="button"]:not(.hero-btn):focus,
                input[type="button"]:not(.hero-btn):active,
                input[type="submit"]:not(.hero-btn):hover,
                input[type="submit"]:not(.hero-btn):focus,
                input[type="submit"]:not(.hero-btn):active {
                    background: <?php echo $this->accent; ?>;
                }

                .ut-blog-link {
                    text-decoration: none !important;
                    color: inherit !important;
                }

                ins, mark { 
                    background:<?php echo $this->accent; ?>; 
                }
                
                .bklyn-btn {
                    background:<?php echo $this->accent; ?>;
                }
                
                .page-title ins,
                .section-title ins {
                    background: transparent;
                    padding: 0;
                    color: <?php echo $this->accent; ?>;
                }
                
                .lead ins {
                    color:<?php echo $this->accent; ?>; 
                }
                
                .themecolor  { 
                    color: <?php echo $this->accent; ?>; 
                }
                
                .lead span {
                    color: <?php echo $this->accent; ?>; 
                }
                
                .comment-reply-link:hover i,
                .comment-reply-link:active i {
                    color: <?php echo $this->accent; ?>; 
                }
                
                .themecolor-bg {
                    background:<?php echo $this->accent; ?>; 
                }                
                
                .img-hover { 
                    background:rgb(<?php echo $this->hex_to_rgb( $this->accent ); ?>);    
                    background:rgba(<?php echo $this->hex_to_rgb( $this->accent ); ?>, 0.85); 
                }                
                
                .author-avatar img,
                .bypostauthor .comment-avatar img,
                .ut-hero-meta-author .ut-entry-avatar-image img,
                .ut-archive-hero-avatar img {
                    border-color: <?php echo $this->accent; ?>; 
                }

                /* glow effect */
                .ut-glow {
                    color: <?php echo $this->accent; ?>;
                    text-shadow:0 0 40px <?php echo $this->accent; ?>, 2px 2px 3px black; 
                }

                .ut-counter[data-type="slot"] .ut-count.ut-glow {
                    color: <?php echo $this->accent; ?>;
                    fill: <?php echo $this->accent; ?>;
                    text-shadow:0 0 8px <?php echo $this->accent; ?>, 2px 2px 4px black;
                }

                .ut-language-selector a:hover { 
                    color: <?php echo $this->accent; ?>; 
                }
                
                .ut-video-post-icon {
                    background:<?php echo $this->accent; ?>;     
                }
                
                /* 404 hero button */
                .error404 .hero-btn-holder .ut-btn:hover,
                .error404 .hero-btn-holder .ut-btn:active {
                    background:<?php echo $this->accent; ?>;    
                }
                
                
                /* logo mobile */
                <?php if( ut_return_header_config( 'ut_overwrite_site_logo_max_height_mobile', 'off' ) == 'on' ) : ?>
                
                    @media (max-width: 767px) {

                        .site-logo img,
                        .ut-site-logo img { 
                            max-height: <?php echo ut_return_header_config('ut_site_logo_max_height_mobile' , '30'); ?>px; 
                        }

                    }
                
                <?php endif; ?>
                
                /* logo tablet */
                <?php if( ut_return_header_config( 'ut_overwrite_site_logo_max_height_mobile', 'off' ) == 'on' ) : ?>
                
                    @media (min-width: 768px) and (max-width: 1024px) {

                        .site-logo img,
                        .ut-site-logo img { 
                            max-height: <?php echo ut_return_header_config('ut_site_logo_max_height_tablet' , '40'); ?>px; 
                        }

                    }
                
                <?php endif; ?>                
                
                /* logo desktop */
                @media (min-width: 1025px) {
                    
                    <?php 
            
                    // Headers with available custom height
                    if( $ut_header_top_layout == 'default' || $ut_header_top_layout == 'style-1' || $ut_header_top_layout == 'style-2' || $ut_header_top_layout == 'style-3' || $ut_header_top_layout == 'style-8' ) :
                        
                        // Custom Logo Height
                        $logo_max_height = ut_return_header_config('ut_site_logo_max_height' , '60');
                        
                        // Custom Header Height
                        $ut_navigation_height = ut_return_header_config( 'ut_navigation_height', 80 );
                        
                        // check if logo height is larger than header height
                        if( $logo_max_height > $ut_navigation_height ) {

                            $logo_max_height = $ut_navigation_height;

                        } ?>
                        
                        .site-logo img {
                            max-height: <?php echo $logo_max_height; ?>px; 
                        }                        
                        
                    <?php endif; ?>
                    
                    <?php 
            
                    // Headers with static height
                    if( $ut_header_top_layout == 'style-4' || $ut_header_top_layout == 'style-5' || $ut_header_top_layout == 'style-6' || $ut_header_top_layout == 'style-7' ) :
                        
                        // Custom Logo Height
                        $logo_max_height = ut_return_header_config('ut_site_logo_max_height_static' , '60'); ?>
                        
                        .site-logo img {
                            max-height: <?php echo $logo_max_height; ?>px; 
                        }                        
                        
                    <?php endif; ?>
                    
                    <?php 
            
                    // Headers with large height
                    if( $ut_header_top_layout == 'style-9' ) :
                        
                        // Custom Logo Height
                        $logo_max_height = ut_return_header_config('ut_site_logo_max_height_large' , '120'); ?>
                        
                        .site-logo img {
                            max-height: <?php echo $logo_max_height; ?>px; 
                        }                        
                        
                    <?php endif; ?>
                    
                    .ut-site-logo img { 
                        max-height: <?php echo ut_return_header_config('ut_side_site_logo_max_height', ut_return_header_config('ut_site_logo_max_height' , '60') ); ?>px; 
                    }
                    
                }
                
                @media (min-width: 1601px) {
                
                    .side-site-logo img {
                        max-width: <?php echo ot_get_option( 'ut_site_logo_max_width', '100' ); ?>%;
                    }                
                
                }
                
				.site-logo img,
				.ut-site-logo img { 
					opacity: <?php echo ut_return_header_config('ut_site_logo_opacity', '100')  / 100; ?>;
				}
				
                
                /* blockquotes */
                blockquote { 
                    border-color:<?php echo $this->accent; ?>; 
                }
                
                blockquote span:not(.quote-right):not(.quote-left) { 
                    color:<?php echo $this->accent; ?>;  
                }
                
                
                .ut-format-link:hover,
                .ut-format-link:active {
                    background:<?php echo $this->accent; ?>;
                }

				/* headlines */
                h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, h6 a:hover {
                    color:<?php echo $this->accent; ?>;
                }
                			
				#commentform input[type="submit"],
                #secondary #searchform .search-submit,
				section:not(#contact-section) input[type="submit"].wpcf7-submit {
					color: <?php echo ot_get_option('ut_blog_button_text_color', '#FFF'); ?>;
					font-weight: <?php echo ot_get_option('ut_blog_button_font_weight', 'bold'); ?>;
					<?php if( ot_get_option('ut_blog_button_activate_border', 'off') == 'on' ) : ?>
						<?php if( ot_get_option('ut_blog_button_border_color') ) : ?>border-color: <?php echo ot_get_option('ut_blog_button_border_color'); ?> !important;<?php endif; ?>
						<?php if( ot_get_option('ut_blog_button_border_style') ) : ?>border-style: <?php echo ot_get_option('ut_blog_button_border_style'); ?> !important ;<?php endif; ?>
						<?php if( ot_get_option('ut_blog_button_border_width') ) : ?>border-width: <?php echo ot_get_option('ut_blog_button_border_width'); ?>px !important;<?php endif; ?>
					<?php endif; ?>
				}
				
				<?php if( ot_get_option('ut_blog_button_font_style') ) : ?>
                 
					<?php echo $this->typography_css('#commentform input[type="submit"], #secondary #searchform .search-submit, section:not(#contact-section) input[type="submit"].wpcf7-submit', ot_get_option('ut_blog_button_font_style') ); ?>                

				<?php endif; ?>
				
				<?php
				
				$ut_blog_button_background_color = ot_get_option('ut_blog_button_background_color', '#151515');
				
				if( $this->is_gradient( $ut_blog_button_background_color ) ) :
			
					echo $this->create_gradient_css( $ut_blog_button_background_color, '#commentform input[type="submit"], #secondary #searchform .search-submit, section:not(#contact-section) input[type="submit"].wpcf7-submit', false, 'background' ); ?>
			
				<?php else : ?>
				
					/* forms */
					#commentform input[type="submit"],
                    #secondary #searchform .search-submit,
                    section:not(#contact-section) input[type="submit"].wpcf7-submit {
						background: <?php echo ot_get_option('ut_blog_button_background_color', '#151515'); ?>;
					}
				
				<?php endif; ?>
				
                
                <?php if( ot_get_option( 'ut_blog_button_body_font', 'off' ) == 'on' ) : ?>
                
                    #commentform input[type="submit"],
                    #secondary #searchform .search-submit,
					section:not(#contact-section) input[type="submit"].wpcf7-submit {
						font-family: inherit;
					}
                
                <?php endif; ?>
                
				
				<?php 
			
				$ut_blog_button_spacing = ot_get_option('ut_blog_button_spacing');
			
				if( !empty( $ut_blog_button_spacing ) && is_array( $ut_blog_button_spacing ) ) :
					
					echo '#commentform input[type="submit"], #secondary #searchform .search-submit, section:not(#contact-section) input[type="submit"].wpcf7-submit {';
			
						foreach( $ut_blog_button_spacing as $key => $spacing ) {

							if( $spacing != 0 ) {

								echo $key . ':' . $spacing . 'px !important;';

							}

						}
			
					echo '}';
			
				endif; ?>
				
                #commentform input[type="submit"]:hover,
				#commentform input[type="submit"]:focus,
				#commentform input[type="submit"]:active,
                #secondary #searchform .search-submit:hover,
                #secondary #searchform .search-submit:focus,
                #secondary #searchform .search-submit:active,                
                section:not(#contact-section) input[type="submit"].wpcf7-submit:hover,
				section:not(#contact-section) input[type="submit"].wpcf7-submit:focus,
				section:not(#contact-section) input[type="submit"].wpcf7-submit:active {
					color: <?php echo ot_get_option('ut_blog_button_text_color_hover', '#FFF'); ?>;
					<?php if( ot_get_option('ut_blog_button_activate_border', 'off') == 'on' ) : ?>
						<?php if( ot_get_option('ut_blog_button_hover_border_color') ) : ?>border-color: <?php echo ot_get_option('ut_blog_button_hover_border_color'); ?> !important;<?php endif; ?>
					<?php endif; ?>
				}
				
				<?php
				
				$ut_blog_button_background_color_hover = ot_get_option('ut_blog_button_background_color_hover', $this->accent );
				
				if( $this->is_gradient( $ut_blog_button_background_color_hover ) ) :
			
					echo $this->create_gradient_css( $ut_blog_button_background_color_hover, '
					#commentform input[type="submit"]:hover,
					#commentform input[type="submit"]:focus,
					#commentform input[type="submit"]:active,
                    section:not(#contact-section) input[type="submit"].wpcf7-submit:hover,
					section:not(#contact-section) input[type="submit"].wpcf7-submit:focus,
					section:not(#contact-section) input[type="submit"].wpcf7-submit:active', false, 'background' ); ?>
			
				<?php else : ?>
				
					/* forms */
                    #commentform input[type="submit"]:hover,
					#commentform input[type="submit"]:focus,
					#commentform input[type="submit"]:active,
                    #secondary #searchform .search-submit:hover,
                    #secondary #searchform .search-submit:focus,
                    #secondary #searchform .search-submit:active,
					section:not(#contact-section) input[type="submit"].wpcf7-submit:hover,
					section:not(#contact-section) input[type="submit"].wpcf7-submit:focus,
					section:not(#contact-section) input[type="submit"].wpcf7-submit:active {
						background:<?php echo ot_get_option('ut_blog_button_background_color_hover', $this->accent ); ?>;                    
					}
				
				<?php endif; ?>
				
                
                <?php if( ot_get_option( 'ut_blog_button_border', 'off' ) == 'on' ) : ?>
                    
                    #commentform input[type="submit"],
                    #secondary #searchform .search-submit,
                    section:not(#contact-section) input[type="submit"].wpcf7-submit {
                        -webkit-border-radius: <?php echo ot_get_option('ut_blog_button_border_radius', '3'); ?>px; 
                        -moz-border-radius: <?php echo ot_get_option('ut_blog_button_border_radius', '3'); ?>px; 
                        border-radius: <?php echo ot_get_option('ut_blog_button_border_radius', '3'); ?>px;
                    }               
                
                <?php endif; ?>
                
                .ut-footer-light button:hover,
                .ut-footer-light button:focus,
                .ut-footer-light button:active,
                .ut-footer-light input[type="button"]:hover,
                .ut-footer-light input[type="button"]:focus,
                .ut-footer-light input[type="button"]:active,
                .ut-footer-light input[type="submit"]:hover,
                .ut-footer-light input[type="submit"]:focus,
                .ut-footer-light input[type="submit"]:active {
                    background:<?php echo $this->accent; ?>;
                }
                
                .ut-footer-dark button, 
                .ut-footer-dark input[type="submit"], 
                .ut-footer-dark input[type="button"] {
                    background:<?php echo $this->accent; ?>;
                }
                
				.ut-footer-custom button, 
				.ut-footer-custom input[type="submit"], 
				.ut-footer-custom input[type="button"] {
					color: <?php echo ot_get_option('ut_footer_button_text_color', '#FFFFFF'); ?>;
				}
								
				<?php
				
				$ut_footer_button_color = ot_get_option('ut_footer_button_color', '#FFFFFF');
				
				if( $this->is_gradient( $ut_footer_button_color ) ) :
			
					echo $this->create_gradient_css( $ut_footer_button_color, '
					.ut-footer-custom button,
					.ut-footer-custom input[type="submit"],
					.ut-footer-custom input[type="button"]', false, 'background' ); ?>
			
				<?php else : ?>
				
					.ut-footer-custom button, 
					.ut-footer-custom input[type="submit"], 
					.ut-footer-custom input[type="button"] {
						background:<?php echo ot_get_option('ut_footer_button_color', $this->accent ); ?>;
					}
				
				<?php endif; ?>
				
				.ut-footer-custom button:hover,
                .ut-footer-custom button:focus,
                .ut-footer-custom button:active,
                .ut-footer-custom input[type="button"]:hover,
                .ut-footer-custom input[type="button"]:focus,
                .ut-footer-custom input[type="button"]:active,
                .ut-footer-custom input[type="submit"]:hover,
                .ut-footer-custom input[type="submit"]:focus,
                .ut-footer-custom input[type="submit"]:active{
                    color: <?php echo ot_get_option('ut_footer_button_text_color_hover', '#FFFFFF' ); ?>;
                }
				
				<?php
				
				$ut_footer_button_color_hover = ot_get_option('ut_footer_button_color_hover', '#151515' );
				
				if( $this->is_gradient( $ut_footer_button_color_hover ) ) :
			
					echo $this->create_gradient_css( $ut_footer_button_color_hover, '
					.ut-footer-custom button:hover,
					.ut-footer-custom button:focus,
					.ut-footer-custom button:active,
					.ut-footer-custom input[type="button"]:hover,
					.ut-footer-custom input[type="button"]:focus,
					.ut-footer-custom input[type="button"]:active,
					.ut-footer-custom input[type="submit"]:hover,
					.ut-footer-custom input[type="submit"]:focus,
					.ut-footer-custom input[type="submit"]:active', false, 'background' ); ?>
			
				<?php else : ?>
				
					.ut-footer-custom button:hover,
					.ut-footer-custom button:focus,
					.ut-footer-custom button:active,
					.ut-footer-custom input[type="button"]:hover,
					.ut-footer-custom input[type="button"]:focus,
					.ut-footer-custom input[type="button"]:active,
					.ut-footer-custom input[type="submit"]:hover,
					.ut-footer-custom input[type="submit"]:focus,
					.ut-footer-custom input[type="submit"]:active{
						background:<?php echo ot_get_option('ut_footer_button_color_hover', '#151515' ); ?>;
					}
				
				<?php endif; ?>
				
				
                <?php if( ot_get_option('ut_footer_button_border', 'off') == 'off' ) : ?>
                    
                    .ut-footer-light button, 
                    .ut-footer-light input[type="submit"], 
                    .ut-footer-light input[type="button"],
                    .ut-footer-dark button, 
                    .ut-footer-dark input[type="submit"], 
                    .ut-footer-dark input[type="button"],
                    .ut-footer-custom button, 
                    .ut-footer-custom input[type="submit"], 
                    .ut-footer-custom input[type="button"] {
                     -webkit-border-radius:0;
                        -moz-border-radius:0;
                             border-radius:0;
                    }
                
                <?php endif; ?>
                
				<?php 
			
				$ut_footer_button_spacing = ot_get_option('ut_footer_button_spacing');
			
				if( !empty( $ut_footer_button_spacing ) && is_array( $ut_footer_button_spacing ) ) :
					
					echo '.footer button, .footer input[type="button"], .footer input[type="submit"] {';
			
						foreach( $ut_footer_button_spacing as $key => $spacing ) {

							if( $spacing != 0 ) {

								echo $key . ':' . $spacing . 'px !important;';

							}

						}
			
					echo '}';
			
				endif; ?>
				
                #contact-section.light button, 
                #contact-section.light input[type="submit"], 
                #contact-section.light input[type="button"],
                .ut-hero-form.light button, 
                .ut-hero-form.light input[type="submit"], 
                .ut-hero-form.light input[type="button"] {
                    background:<?php echo $this->accent; ?>;                    
                }
                
                #contact-section.dark button:hover,
                #contact-section.dark button:focus,
                #contact-section.dark button:active,
                #contact-section.dark input[type="button"]:hover,
                #contact-section.dark input[type="button"]:focus,
                #contact-section.dark input[type="button"]:active,
                #contact-section.dark input[type="submit"]:hover,
                #contact-section.dark input[type="submit"]:focus,
                #contact-section.dark input[type="submit"]:active {
                    background:<?php echo $this->accent; ?>;
                }
				
				#contact-section.light button, 
                #contact-section.light input[type="submit"], 
                #contact-section.light input[type="button"],
                #contact-section.dark button, 
                #contact-section.dark input[type="submit"], 
                #contact-section.dark input[type="button"] {
                    color: <?php echo ot_get_option('ut_csection_submit_button_text_color', '#FFFFFF' ); ?>;
                    font-weight: <?php echo ot_get_option('ut_csection_submit_button_font_weight', 'bold'); ?>;
                }
				
				<?php
				
				$ut_csection_submit_button_color = ot_get_option('ut_csection_submit_button_color', '#151515' );
				
				if( $this->is_gradient( $ut_csection_submit_button_color ) ) :
			
					echo $this->create_gradient_css( $ut_csection_submit_button_color, '
					#contact-section.light button, 
                	#contact-section.light input[type="submit"], 
                	#contact-section.light input[type="button"],
                	#contact-section.dark button, 
                	#contact-section.dark input[type="submit"], 
                	#contact-section.dark input[type="button"]', false, 'background' ); ?>
			
				<?php else : ?>
				
					#contact-section.light button, 
					#contact-section.light input[type="submit"], 
					#contact-section.light input[type="button"],
					#contact-section.dark button, 
					#contact-section.dark input[type="submit"], 
					#contact-section.dark input[type="button"] {
						background:<?php echo ot_get_option('ut_csection_submit_button_color', '#151515' ); ?>;    
					}
				
				<?php endif; ?>
				
				#contact-section.light button:hover,
                #contact-section.light button:focus,
                #contact-section.light button:active,
                #contact-section.light input[type="button"]:hover,
                #contact-section.light input[type="button"]:focus,
                #contact-section.light input[type="button"]:active,
                #contact-section.light input[type="submit"]:hover,
                #contact-section.light input[type="submit"]:focus,
                #contact-section.light input[type="submit"]:active,
                #contact-section.dark button:hover,
                #contact-section.dark button:focus,
                #contact-section.dark button:active,
                #contact-section.dark input[type="button"]:hover,
                #contact-section.dark input[type="button"]:focus,
                #contact-section.dark input[type="button"]:active,
                #contact-section.dark input[type="submit"]:hover,
                #contact-section.dark input[type="submit"]:focus,
                #contact-section.dark input[type="submit"]:active {
                    color: <?php echo ot_get_option('ut_csection_submit_button_text_color_hover', '#FFFFFF'); ?>;                    
                }
				
				<?php
				
				$ut_csection_submit_button_color_hover = ot_get_option('ut_csection_submit_button_color_hover', $this->accent );
				
				if( $this->is_gradient( $ut_csection_submit_button_color_hover ) ) :
			
					echo $this->create_gradient_css( $ut_csection_submit_button_color_hover, '
					#contact-section.light button:hover,
					#contact-section.light button:focus,
					#contact-section.light button:active,
					#contact-section.light input[type="button"]:hover,
					#contact-section.light input[type="button"]:focus,
					#contact-section.light input[type="button"]:active,
					#contact-section.light input[type="submit"]:hover,
					#contact-section.light input[type="submit"]:focus,
					#contact-section.light input[type="submit"]:active,
					#contact-section.dark button:hover,
					#contact-section.dark button:focus,
					#contact-section.dark button:active,
					#contact-section.dark input[type="button"]:hover,
					#contact-section.dark input[type="button"]:focus,
					#contact-section.dark input[type="button"]:active,
					#contact-section.dark input[type="submit"]:hover,
					#contact-section.dark input[type="submit"]:focus,
					#contact-section.dark input[type="submit"]:active', false, 'background' ); ?>
			
				<?php else : ?>
				
					#contact-section.light button:hover,
					#contact-section.light button:focus,
					#contact-section.light button:active,
					#contact-section.light input[type="button"]:hover,
					#contact-section.light input[type="button"]:focus,
					#contact-section.light input[type="button"]:active,
					#contact-section.light input[type="submit"]:hover,
					#contact-section.light input[type="submit"]:focus,
					#contact-section.light input[type="submit"]:active,
					#contact-section.dark button:hover,
					#contact-section.dark button:focus,
					#contact-section.dark button:active,
					#contact-section.dark input[type="button"]:hover,
					#contact-section.dark input[type="button"]:focus,
					#contact-section.dark input[type="button"]:active,
					#contact-section.dark input[type="submit"]:hover,
					#contact-section.dark input[type="submit"]:focus,
					#contact-section.dark input[type="submit"]:active {
						background:<?php echo ot_get_option('ut_csection_submit_button_color_hover', $this->accent ); ?>;
					}
				
				<?php endif; ?>
				
                <?php if( ot_get_option('ut_csection_submit_button_border', 'off') == 'off' ) : ?>
                    
                    #contact-section.light button, 
                    #contact-section.light input[type="submit"], 
                    #contact-section.light input[type="button"],
                    #contact-section.dark button, 
                    #contact-section.dark input[type="submit"], 
                    #contact-section.dark input[type="button"] {
                     -webkit-border-radius:0;
                        -moz-border-radius:0;
                             border-radius:0;
                    }
                
                <?php endif; ?>
                
				
				<?php 
			
				$ut_csection_submit_button_spacing = ot_get_option('ut_csection_submit_button_spacing');
			
				if( !empty( $ut_csection_submit_button_spacing ) && is_array( $ut_csection_submit_button_spacing ) ) :
					
					echo '#contact-section button, #contact-section input[type="button"], #contact-section input[type="submit"] {';
			
						foreach( $ut_csection_submit_button_spacing as $key => $spacing ) {

							if( $spacing != 0 ) {

								echo $key . ':' . $spacing . 'px !important;';

							}

						}
			
					echo '}';
			
				endif; ?>
								
                /* wordpress media element */
                .mejs-controls .mejs-time-rail .mejs-time-current, 
                .mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current { 
                    background:<?php echo $this->accent; ?> !important; 
                }
                
                /* more link */
                .more-link:hover i,
                .more-link:active i { 
                    color:<?php echo $this->accent; ?>; 
                }
                
                /* post format */
                .format-link .entry-header a { 
                    background:<?php echo $this->accent; ?> !important; 
                }
                
                /* misc */
                .ut-avatar-overlay { 
                    background:rgb(<?php echo $this->hex_to_rgb( $this->accent ); ?>); 
                    background:rgba(<?php echo $this->hex_to_rgb( $this->accent ); ?>, 0.85);  
                }
                
                /* contact form 7 */
                div.wpcf7-validation-errors { 
                    border-color:<?php echo $this->accent; ?>;  
                }
                
                /* deprecated */
                .count { 
                    color:<?php echo $this->accent; ?>; 
                }
                
                .team-member-details { 
                    background:rgb(<?php echo $this->hex_to_rgb( $this->accent ); ?>);
                    background:rgba(<?php echo $this->hex_to_rgb( $this->accent ); ?>, 0.85 ); 
                }
                
                .about-icon { 
                    background:<?php echo $this->accent; ?>; 
                }
                
                .cta-section { 
                    background:<?php echo $this->accent; ?> !important; 
                }
                
                .icons-ul i { 
                    color:<?php echo $this->accent; ?>; 
                }
                
                #secondary a:hover, 
                .page-template-templatestemplate-archive-php a:hover { color:<?php echo $this->accent; ?>; }

                
                
                /* Preloader
                ================================================== */ 
                <?php echo $this->typography_css( '#qLpercentage', ot_get_option('ut_image_loader_percentage_font') ); ?>
                
                #ut-sitebody #qLoverlay .site-logo .logo {
                    color: <?php echo ot_get_option('ut_image_loader_bar_color'); ?>; 
                }
                
                #ut-loader-logo { 
                    max-width: <?php echo ot_get_option( 'ut_image_loader_logo_max_width', 100 ); ?>px;
                }
                
                <?php 
                $overlay_color = ot_get_option('ut_image_loader_background' , '#FFF');
            
                if( $this->is_gradient( $overlay_color ) ) : ?>
            
                    <?php echo $this->create_gradient_css( $overlay_color, '#qLoverlay', false, 'background' ); ?>
                    
                <?php else : ?>
                    
                    #qLoverlay { 
                        background: <?php echo ot_get_option('ut_image_loader_background' , '#FFF'); ?>; 
                    }
                
                <?php endif; ?>
                
                .ut-loading-bar-style2 .ut-loading-bar-style2-ball-effect { 
                    background-color: <?php echo ot_get_option('ut_image_loader_bar_color' , '#FFF'); ?>; 
                }
                
                .ut-loading-bar-style3-outer { 
                    border-color: <?php echo ot_get_option('ut_image_loader_bar_color' , '#FFF'); ?>; 
                }
                
                .ut-loading-bar-style-3-inner { 
                    background-color: <?php echo ot_get_option('ut_image_loader_bar_color' , '#FFF'); ?>;
                }
                
                .ut-loader__bar4, .ut-loader__ball4 { 
                    background: <?php echo ot_get_option('ut_image_loader_bar_color' , '#FFF'); ?>; 
                }
                
                .ut-loading-bar-style5-inner { 
                    color: <?php echo ot_get_option('ut_image_loader_bar_color' , '#FFF'); ?>; 
                }
                
                #qLoverlay .ut-double-bounce1, 
                #qLoverlay .ut-double-bounce2 {
                    background: <?php echo ot_get_option('ut_image_loader_bar_color' , '#FFF'); ?>;
                }

                .sk-cube-grid .sk-cube { 
                    background-color: <?php echo ot_get_option('ut_image_loader_bar_color' , '#FFF'); ?>; 
                }
                
                .ut-inner-overlay .ut-loading-text p { 
                    color: <?php echo ot_get_option('ut_image_loader_text_color' ); ?> !important; 
                }
                
                <?php echo $this->typography_css( '.ut-inner-overlay .ut-loading-text p', ot_get_option('ut_image_loader_font') ); ?>
                
                .ut-inner-overlay .ut-loading-text { 
                    margin-top: <?php echo ot_get_option( 'ut_image_loader_text_margin_top', 20 ); ?>px !important; 
                }
                
                .ut-loader-overlay,
				.ut-loader-overlay.ut-loader-overlay-with-morph .ut-shape-wrap-push { 
                    background: <?php echo ot_get_option('ut_image_loader_background' , '#FFF'); ?>;
                }
                
				.ut-loader-overlay .ut-shape {
					fill: <?php echo ot_get_option('ut_image_loader_background' , '#FFF'); ?>;
				}

                #ut-overlay-animated-text {
                    color: <?php echo ot_get_option('ut_image_loader_bar_color' , '#111'); ?>;
                }

                <?php

                /**
                 * Preloader
                 */

                echo $this->font_style_css( array(
                    'selector'           => '#ut-overlay-animated-text, #ut-overlay-animated-background-text',
                    'font-type'          => ot_get_option('ut_image_loader_text_font_type', 'ut-font' ),
                    'inherit-font-style' => ot_get_option('ut_image_loader_text_font_style' ),
                    'font-style'         => ot_get_option('ut_image_loader_text_theme_font_style', 'regular' ),
                    'google-font-style'  => ot_get_option('ut_image_loader_text_google_font_style'),
                    'websafe-font-style' => ot_get_option('ut_image_loader_text_websafe_font_style'),
                    'custom-font-style'  => ot_get_option('ut_image_loader_text_custom_font_style')
                ) );
               
                /**
                 * Body Font
                 */
                echo $this->font_style_css( array(
                    'selector'           => 'body',
                    'font-type'          => ot_get_option('ut_body_font_type', 'ut-font' ),   
                    'font-style'         => ot_get_option('ut_body_font_style', 'regular' ),
                    'google-font-style'  => ot_get_option('ut_google_body_font_style'),
                    'websafe-font-style' => ot_get_option('ut_body_websafe_font_style'),
					'custom-font-style'  => ot_get_option('ut_body_custom_font_style')
                ) ); 
                
                if( ot_get_option('ut_body_font_color') ) {
                    echo 'body { color: ' . ot_get_option('ut_body_font_color') . ' ;}';    
                }

                if( $this->typography_css( 'b, strong, dfn, kbd', ot_get_option( 'ut_strong_websafe_font_style' ) ) ) {

                    echo $this->typography_css( 'b, strong, dfn, kbd', ot_get_option( 'ut_strong_websafe_font_style' ) );

                }


                /**
                 * Headline Fonts
                 */
                foreach( array('h1','h2','h3','h4','h5','h6') as $headline ) {
                    
                    $selector = $headline == 'h2' ? $headline . ', .ut-quote-post-block' : $headline;
                    $selector = $headline == 'h1' ? $headline . ', h1.product_title' : $headline;

                    echo $this->font_style_css( array(
                        'selector'           => $selector,
                        'font-type'          => ot_get_option('ut_global_' . $headline . '_font_type', 'ut-font' ),   
                        'font-style'         => ot_get_option('ut_'. $headline .'_font_style', 'regular' ),
                        'google-font-style'  => ot_get_option('ut_'. $headline .'_google_font_style'),
                        'websafe-font-style' => ot_get_option('ut_'. $headline .'_websafe_font_style'),
						'custom-font-style'  => ot_get_option('ut_'. $headline .'_custom_font_style')
                    ) ); 
                
                    if( ot_get_option('ut_global_'.$headline.'_font_color') ) {
                        echo $headline . ' {  color: ' . ot_get_option('ut_global_'.$headline.'_font_color') . '; }'. "\n";
                    }
                
                }
                
                echo $this->font_style_css( array(
                    'selector'           => '.author-title, #reply-title, .comments-title',
                    'font-type'          => ot_get_option('ut_global_h3_font_type', 'ut-font' ),   
                    'font-style'         => ot_get_option('ut_h3_font_style', 'regular' ),
                    'google-font-style'  => ot_get_option('ut_h3_google_font_style'),
                    'websafe-font-style' => ot_get_option('ut_h3_websafe_font_style'),
                    'custom-font-style'  => ot_get_option('ut_h3_custom_font_style')
                ) );            
            
                /**
                 * Content Widgets
                 */
                echo $this->font_style_css( array(
                    'selector'           => '#ut-sitebody #primary .entry-content .widget-title',
                    'font-type'          => ot_get_option('ut_content_widgets_type', 'ut-websafe' ),   
                    'font-style'         => ot_get_option('ut_content_widgets_font_style', 'semibold' ),
                    'google-font-style'  => ot_get_option('ut_google_content_widgets_style'),
                    'websafe-font-style' => ot_get_option('ut_global_content_widgets_websafe_font_style') 
                ) );
                
                /**
                 * Blockquote Fonts
                 */
                echo $this->font_style_css( array(
                    'selector'           => 'blockquote:not(.ut-parallax-quote-title):not(.ut-quote-post-block)',
                    'font-type'          => ot_get_option('ut_blockquote_font_type', 'ut-font' ),   
                    'font-style'         => ot_get_option('ut_blockquote_font_style', 'semibold' ),
                    'google-font-style'  => ot_get_option('ut_google_blockquote_font_style'),
                    'websafe-font-style' => ot_get_option('ut_blockquote_websafe_font_style'),
					'custom-font-style'  => ot_get_option('ut_blockquote_custom_font_style') 
                ) );                
                
                if( ot_get_option('ut_global_blockquote_headline_color') ) {
                    echo 'blockquote { color: ' . ot_get_option('ut_global_blockquote_headline_color') . ' ;}';
                }
                
                /**
                 * Single Blockquote Fonts
                 */
                echo $this->font_style_css( array(
                    'selector'           => '.single blockquote:not(.ut-parallax-quote-title), .page blockquote:not(.ut-parallax-quote-title)',
                    'font-type'          => ot_get_option('ut_single_blockquote_font_type', 'ut-websafe' ),   
                    'font-style'         => ot_get_option('ut_single_blockquote_font_style', 'semibold' ),
                    'google-font-style'  => ot_get_option('ut_google_single_blockquote_font_style'),
                    'websafe-font-style' => ot_get_option('ut_single_blockquote_websafe_font_style') 
                ) );
                
                
                /**
                 * Global Lead
                 */
                echo $this->font_style_css( array(
                    'selector'           => '.lead, .dark .lead, .taxonomy-description',
                    'font-type'          => ot_get_option('ut_global_lead_font_type', 'ut-font' ),   
                    'font-style'         => ot_get_option('ut_lead_font_style', 'semibold' ),
                    'google-font-style'  => ot_get_option('ut_google_lead_font_style'),
                    'websafe-font-style' => ot_get_option('ut_lead_websafe_font_style'),
					'custom-font-style'  => ot_get_option('ut_lead_custom_font_style')
                ) ); 
                
                if( ot_get_option('ut_global_lead_color') ) {
                    echo '.lead p { color: ' . ot_get_option('ut_global_lead_color') . ' ;}';
                }
                

                /**
                 * Contact Section Header
                 */
                echo $this->font_style_css( array(
                    'selector'           => '#contact-section .parallax-title, #contact-section .section-title',
                    'font-type'          => ot_get_option('ut_csection_header_font_type', 'ut-font' ),   
                    'font-style'         => ot_get_option('ut_csection_header_font_style', 'regular' ),
                    'google-font-style'  => ot_get_option('ut_csection_header_google_font_style'),
                    'websafe-font-style' => ot_get_option('ut_csection_header_websafe_font_style'),
					'custom-font-style'  => ot_get_option('ut_csection_header_custom_font_style')
                ) );
                
                if( ot_get_option('ut_csection_header_font_type', 'ut-font' ) == 'ut-font' ) {
                
                    echo $this->typography_css( '#contact-section .parallax-title, #contact-section .section-title', ot_get_option('ut_csection_header_font_style_settings') );
                
                }
                
                /**
                 * Contact Section Lead
                 */
                echo $this->font_style_css( array(
                    'selector'           => '#contact-section .lead p',
                    'font-type'          => ot_get_option('ut_csection_lead_font_type', 'ut-font' ),   
                    'font-style'         => ot_get_option('ut_csection_lead_font_style', 'regular' ),
                    'google-font-style'  => ot_get_option('ut_csection_lead_google_font_style'),
                    'websafe-font-style' => ot_get_option('ut_csection_lead_websafe_font_style'),
					'custom-font-style'  => ot_get_option('ut_csection_lead_custom_font_style')
                ) ); 
                
                if( ot_get_option( 'ut_csection_lead_color' ) ) {
                    echo '#contact-section .lead p { color: ' . ot_get_option('ut_csection_lead_color') . ' ;}';
                }
               
                if( ot_get_option('ut_csection_lead_font_type', 'ut-font' ) == 'ut-font' ) {
                
                    echo $this->typography_css( '#contact-section .lead', ot_get_option('ut_csection_lead_font_style_settings') );
                
                }

                /**
                 * React Slider Preloader
                 */

                echo $this->font_style_css( array(
                    'selector'           => '.ut-react-carousel-preloader',
                    'font-type'          => ot_get_option('ut_react_portfolio_title_font_type', 'ut-font' ),
                    'font-style'         => ot_get_option('ut_global_react_portfolio_title_font_style', 'regular' ),
                    'google-font-style'  => ot_get_option('ut_google_react_portfolio_title_font_style'),
                    'websafe-font-style' => ot_get_option('ut_websafe_react_portfolio_title_font_style'),
                    'custom-font-style'  => ot_get_option('ut_custom_react_portfolio_title_font_style')
                ) );

                ?>
                
                /* LightGallery
                ================================================== */ 
                .lg-progress-bar .lg-progress { 
                    background-color: <?php echo $this->accent; ?>; 
                }
                
                .lg-outer .lg-thumb-item.active, 
                .lg-outer .lg-thumb-item:hover { 
                    border-color: <?php echo $this->accent; ?>; 
                }
                
                <?php if( ot_get_option('ut_lightbox_caption_color') ) : ?>
                
                    .lg-sub-html { color: <?php echo ot_get_option('ut_lightbox_caption_color'); ?> }

                <?php endif; ?>

                /* Morphbox
                ================================================== */
                <?php if( ot_get_option('ut_morphbox_caption_color') ) : ?>

                    .ut-morph-box-item-wrap h3,
                    .ut-morph-box-item-wrap p {
                        color: <?php echo ot_get_option('ut_morphbox_caption_color'); ?>
                    }

                    .ut-morph-box-close {
                        fill: <?php echo ot_get_option('ut_morphbox_caption_color'); ?>
                    }

                <?php endif; ?>

                <?php if( ot_get_option('ut_morphbox_caption_background') ) : ?>

                    .ut-morph-box-item-wrap {
                        background: <?php echo ot_get_option('ut_morphbox_caption_background'); ?>
                    }

                    .ut-morph-box-close {
                        background: <?php echo ot_get_option('ut_morphbox_caption_background'); ?>
                    }

                <?php endif; ?>

                /* Custom Cursor Select
                ================================================== */
                #ut-hover-cursor.ut-hover-cursor-mousedown svg ellipse.circle-inner {
                    transition-delay: 100ms;
                    fill: <?php echo $this->accent; ?>;
                }

                #ut-hover-cursor.ut-hover-cursor-mousedown svg ellipse.circle {
                    transition-delay: 100ms;
                    fill: <?php echo $this->rgb_to_rgba( $this->accent, '0.1' ); ?>;
                    stroke: <?php echo $this->rgb_to_rgba( $this->accent, '0.3' ); ?>;
                }

                /* Lightgallery Caption
                ================================================== */     
                <?php    

                    $selectors = array(
                        '.lg-sub-html',
                    );            

                    echo $this->font_style_css( array(
                        'selector'           => implode( "," , $selectors ),
                        'font-type'          => ot_get_option('ut_lightbox_font_type', 'inherit' ),   
                        'inherit-font-style' => ot_get_option('ut_lightbox_font_style' ),
                        'font-style'         => ot_get_option('ut_lightbox_theme_font_style' ),
                        'google-font-style'  => ot_get_option('ut_lightbox_google_font_style'),
                        'websafe-font-style' => ot_get_option('ut_lightbox_websafe_font_style'),
                        'custom-font-style'  => ot_get_option('ut_lightbox_custom_font_style')                    
                    ), array(), true );

                ?>

                <?php echo $this->typography_css('.ut-morph-box-item-wrap h3', ot_get_option('ut_morphbox_font_style') ); ?>

                /* Parallax Overlay 
                ================================================== */
                .parallax-overlay-pattern.style_one { background-image: url(" <?php echo THEME_WEB_ROOT; ?>/images/overlay-pattern.png") !important; }
                .parallax-overlay-pattern.style_two { background-image: url(" <?php echo THEME_WEB_ROOT; ?>/images/overlay-pattern2.png") !important; }
                .parallax-overlay-pattern.style_three { background-image: url(" <?php echo THEME_WEB_ROOT; ?>/images/overlay-pattern3.png") !important; }                
                .parallax-overlay-pattern.style_four { background-image: url(" <?php echo THEME_WEB_ROOT; ?>/images/circuit-board-pattern.svg") !important; }

                <?php if( !unite_mobile_detection()->isMobile() && ot_get_option('ut_animate_sections' , 'on') == 'on' && ot_get_option( 'ut_site_layout', 'multisite' ) == 'onepage' ) : ?>
                    
                    /* Section Animation
                    ================================================== */
                    .js #main-content section .section-content,
                    .js #main-content section .section-header-holder {
                        opacity:0;
                    }
                        
                <?php endif; ?>
                
                /* Site Main Content Spacing
                ================================================== */
				.grid-container,
				.ut-top-header-centered .ut-header-inner,
                #ut-overlay-menu.ut-overlay-menu-centered .ut-overlay-menu-row {
                    max-width: <?php echo $this->add_px_value( ot_get_option( 'ut_site_custom_width', '1200' ) ); ?>;
                }
				
				@media (min-width: 1025px) {
                    
                    <?php if( ot_get_option('ut_blog_spacing_top') ) : ?>
                    
                        #ut-sitebody.blog .main-content-background,
                        #ut-sitebody.single-post .main-content-background,
                        #ut-sitebody.search .main-content-background,
                        #ut-sitebody.search-results .main-content-background,
                        #ut-sitebody.archive .main-content-background {
                            padding-top:<?php echo $this->add_px_value( ot_get_option('ut_blog_spacing_top') ); ?> !important;
                        }
                    
                    <?php endif; ?>
                    
                    <?php if( ot_get_option('ut_blog_spacing_bottom') ) : ?>
                    
                        #ut-sitebody.blog .main-content-background,
                        #ut-sitebody.single-post .main-content-background,
                        #ut-sitebody.search .main-content-background,
                        #ut-sitebody.search-results .main-content-background,
                        #ut-sitebody.archive .main-content-background {
                            padding-bottom:<?php echo $this->add_px_value( ot_get_option('ut_blog_spacing_bottom') ); ?> !important;
                        }
                    
                    <?php endif; ?>
                    
                    <?php if( ot_get_option('ut_blog_no_hero_spacing_top') ) : ?>
                    
                        #ut-sitebody.blog.has-no-hero .main-content-background,
                        #ut-sitebody.single-post.has-no-hero .main-content-background {
                            padding-top:<?php echo $this->add_px_value( ot_get_option('ut_blog_no_hero_spacing_top') ); ?> !important;
                        }
                    
                    <?php endif; ?>
                    
                    <?php if( ot_get_option('ut_blog_no_hero_spacing_bottom') ) : ?>
                    
                        #ut-sitebody.blog.has-no-hero .main-content-background,
                        #ut-sitebody.single-post.has-no-hero .main-content-background {
                            padding-bottom:<?php echo $this->add_px_value( ot_get_option('ut_blog_no_hero_spacing_bottom') ); ?> !important;
                        }
                    
                    <?php endif; ?>
                    
                    <?php if( ot_get_option('ut_page_spacing_top') ) : ?>
                    
                        #ut-sitebody:not(.ut-page-has-no-content).page .main-content-background,
                        #ut-sitebody:not(.ut-page-has-no-content).single:not(.single-post) .main-content-background {
                            padding-top:<?php echo $this->add_px_value( ot_get_option('ut_page_spacing_top') ); ?> !important;
                        }
                    
                    <?php endif; ?>
                    
                    <?php if( ot_get_option('ut_page_spacing_bottom') ) : ?>
                    
                        #ut-sitebody:not(.ut-page-has-no-content).page .main-content-background,
                        #ut-sitebody:not(.ut-page-has-no-content).single:not(.single-post) .main-content-background {
                            padding-bottom:<?php echo $this->add_px_value( ot_get_option('ut_page_spacing_bottom') ); ?> !important;   
                        }
                    
                    <?php endif; ?>
                    
                    <?php if( ot_get_option('ut_page_no_hero_spacing_top') ) : ?>
                    
                        #ut-sitebody.page.has-no-hero .main-content-background,
                        #ut-sitebody.single:not(.single-post).has-no-hero .main-content-background {
                            padding-top:<?php echo $this->add_px_value( ot_get_option('ut_page_no_hero_spacing_top') ); ?> !important;
                        }
                    
                    <?php endif; ?>
                    
                    <?php if( ot_get_option('ut_page_no_hero_spacing_bottom') ) : ?>
                    
                        #ut-sitebody.page.has-no-hero .main-content-background,
                        #ut-sitebody.single:not(.single-post).has-no-hero .main-content-background {
                            padding-bottom:<?php echo $this->add_px_value( ot_get_option('ut_page_no_hero_spacing_bottom') ); ?> !important;   
                        }
                    
                    <?php endif; ?>
                
                }
                
                /* Site Offset Anchor Settings 
                ================================================== */
                .ut-vc-offset-anchor-top,
                .ut-vc-offset-anchor-bottom {
                    position:absolute;
                    width: 0px;
                    height: 0px;
                    display: block;
                    overflow: hidden;
                    visibility: hidden;
                }
                
                .ut-vc-offset-anchor-top {
                    top:0;
                    left:0;
                }
                
                .ut-vc-offset-anchor-bottom {
                    left:0;
                    bottom:0px;
                }
                
                .ut-scroll-up-waypoint-wrap {
                    position:relative;
                }
                
				/* Overwrite Animation CSS Duration
                ================================================== */
				blockquote,
				img.size-auto,
				img.alignnone,
				img.size-full,
				img.size-large,
				img.size-medium,
				img.size-thumbnail,
				.ut-animate-image,
				.animated {
					-webkit-animation-duration: <?php echo ot_get_option( 'ut_animate_css_duration', '1' ); ?>s;
				  			animation-duration: <?php echo ot_get_option( 'ut_animate_css_duration', '1' ); ?>s;
				}

                <?php if( ot_get_option( 'ut_custom_cursor', 'off' ) == 'on' ) : ?>

                /* Custom Cursor - Skin 1
                ================================================== */
                #ut-hover-cursor[data-skin="custom-1"] svg ellipse.circle {
                    stroke: rgba(21,21,21,0.3);
                }

                #ut-hover-cursor[data-skin="custom-1"] svg ellipse.circle-inner {
                    fill: #151515;
                }

                #ut-hover-cursor[data-skin="custom-1"] svg .plus {
                    fill: #151515;
                }

                #ut-hover-cursor[data-skin="custom-1"] svg .arrow {
                    fill: #151515;
                }

                <?php endif; ?>


            </style>
            
            <?php
            
            /* output css */
            echo $this->minify_css( ob_get_clean() );
        
        }

    }

}