<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'UT_Page_CSS' ) ) {	
    
    class UT_Page_CSS extends UT_Custom_CSS {

        function headline_style( $div = '',  $style = 'pt-style-1' , $color = '' , $height = '' , $width = '', $spacing = '' ) {

            switch ( $style ) {

                case 'pt-style-1':

                    return;

                    break;

                case 'pt-style-2':

                    $css = array();

                    if( !empty( $color ) ) {
                        $css['background-color'] = $color;
                    }

                    if( !empty( $height ) ) {
                        $css['height'] = $height;
                    }

                    if( !empty( $width ) ) {
                        $css['width'] = $this->add_px_value( $width );
                    }

                    // output
                    if( !empty( $css ) ) {

                        ob_start(); ?>

                        <?php echo $div; ?> span::after,
                        <?php echo $div; ?> span::after,
                        <?php echo $div; ?> span::after {
                            <?php echo $this->create_css_string( $css ); ?>
                        }

                        <?php return ob_get_clean();

                    }

                    break;

                case 'pt-style-3':

                    $css = array();

                    if( !empty( $color ) ) {
                        $css['background'] = $color;
                        $css['-webkit-box-shadow'] = '0 0 0 3px ' . $color;
                        $css['-moz-box-shadow'] = '0 0 0 3px ' . $color;
                        $css['box-shadow'] = '0 0 0 3px ' . $color;
                    }

                    // output
                    if( !empty( $css ) ) {

                        ob_start(); ?>

                        <?php echo $div; ?> span,
                        <?php echo $div; ?> span,
                        <?php echo $div; ?> span {
                        <?php echo $this->create_css_string( $css ); ?>
                        }

                        <?php return ob_get_clean();

                    }

                    break;

                case 'pt-style-4':

                    $css = array();

                    if( !empty( $color ) ) {
                        $css['border-color'] = $color;
                    }

                    if( !empty( $width ) ) {
                        $css['border-width'] = $this->add_px_value( $width );
                    }

                    // output
                    if( !empty( $css ) ) {

                        ob_start(); ?>

                        <?php echo $div; ?> span,
                        <?php echo $div; ?> span,
                        <?php echo $div; ?> span {
                        <?php echo $this->create_css_string( $css ); ?>
                        }

                        <?php return ob_get_clean();

                    }

                    break;

                case 'pt-style-5':

                    $css = array();

                    if( !empty( $color ) ) {
                        $css['background'] = $color;
                        $css['-webkit-box-shadow'] = '0 0 0 3px ' . $color;
                        $css['-moz-box-shadow'] = '0 0 0 3px ' . $color;
                        $css['box-shadow'] = '0 0 0 3px ' . $color;
                    }

                    // output
                    if( !empty( $css ) ) {

                        ob_start(); ?>

                        <?php echo $div; ?> span,
                        <?php echo $div; ?> span,
                        <?php echo $div; ?> span {
                        <?php echo $this->create_css_string( $css ); ?>
                        }

                        <?php return ob_get_clean();

                    }

                    break;

                case 'pt-style-6':

                    $css = array();

                    if( !empty( $color ) ) {
                        $css['border-bottom'] = '1px dotted ' . $color;
                    }

                    // output
                    if( !empty( $css ) ) {

                        ob_start(); ?>

                        <?php echo $div; ?> span::after,
                        <?php echo $div; ?> span::after,
                        <?php echo $div; ?> span::after {
                        <?php echo $this->create_css_string( $css ); ?>
                        }

                        <?php return ob_get_clean();

                    }

                    break;

            }

        }
        
        public function custom_css() {
            
            global $post;
            
            if( is_front_page() && ot_get_option( 'ut_site_layout', 'multisite' ) == 'onepage' || is_home() && ot_get_option( 'ut_site_layout', 'multisite' ) == 'onepage' || is_search() ) {
                return;
            }
            
            /* assign post ID */
            $post_ID = isset( $post->ID ) ? $post->ID : '';
            $post_ID = is_front_page() || is_home() ? get_queried_object_id() : $post_ID;
            
            /* no ID - leave here */
            if( empty( $post_ID ) ) {
                return;
            }
                        
            /**
             * Page Background
             */
             
            $ut_page_background_color = get_post_meta( $post_ID , 'ut_section_background_color' , true);
            
            /* add to CSS */
            if( !empty( $ut_page_background_color ) ) {

                $this->css .= '.main-content-background { background-color: ' . $ut_page_background_color . '; }';
                $this->css .= '.ut-box-shadow-container { background-color: ' . $ut_page_background_color . '; }';

            } 
            
            
            /**
             * Page Title Settings
             */

            /* add to CSS */
            $ut_page_headline_margin_bottom = get_post_meta( $post_ID , 'ut_section_slogan_padding' , true) ? get_post_meta( $post_ID , 'ut_section_slogan_padding' , true) : ot_get_option('ut_global_page_headline_margin_bottom');

            if( $ut_page_headline_margin_bottom ) {

                $this->css .= '#primary .page-primary-header:not(.page-title-module) { padding-bottom: ' . ut_add_px_value( $ut_page_headline_margin_bottom ) . '; }';

            }

            if( $ut_page_headline_margin_bottom = ot_get_option('ut_global_page_headline_margin_bottom') ) {

                $this->css .= '#primary .page-header:not(.page-primary-header) > *:first-child { margin-bottom: ' . ut_add_px_value( $ut_page_headline_margin_bottom ) . '; }';

            }

            /* headlines */
            $ut_section_header_font_style = get_post_meta( $post_ID , 'ut_section_header_font_style' , true );
            $this->css .= $this->global_headline_font_style(
                                '#primary .page-title',
                                $ut_section_header_font_style,
                                'ut_global_page_headline_font_type',
                                'ut_global_page_google_headline_font_style',
                                'ut_global_page_headline_font_style',
                                'ut_global_page_headline_font_style_settings',
                                'ut_global_page_headline_websafe_font_style_settings',
								'ut_global_page_headline_custom_font_style_settings',
                                'ut_global_page_headline_font_color' );
            
            /* set title style */
            $ut_page_header_style = get_post_meta( $post_ID , 'ut_section_header_style', true );
            $ut_page_header_style = ( !empty( $ut_page_header_style ) && $ut_page_header_style != 'global' ) ? $ut_page_header_style : ot_get_option( 'ut_global_page_headline_style' );
            
            $ut_page_title_color = get_post_meta( $post_ID , 'ut_section_title_color' , true);
            $ut_page_title_color = empty( $ut_page_title_color ) ? ot_get_option( 'ut_global_page_headline_font_color' ) : $ut_page_title_color;
            
            if( !empty( $ut_page_title_color ) ) {
                
                $this->css .= '#primary h1.page-title { color: ' . $ut_page_title_color . '; }';
                
                // page title styles
                $this->css .= '.page-header.pt-style-4 .page-title span, .page-header.pt-style-4 .parallax-title span, .pt-style-4 .section-title span { border-color: ' . $ut_page_title_color . '; }';            
                $this->css .= '.page-header.pt-style-5 .page-title span, .page-header.pt-style-5 .section-title span { background:' . $ut_page_title_color . ';	-webkit-box-shadow:0 0 0 3px ' . $ut_page_title_color . '; -moz-box-shadow:0 0 0 3px ' . $ut_page_title_color . '; box-shadow:0 0 0 3px ' . $ut_page_title_color . '; }';
                $this->css .= '.page-header.pt-style-5 .parallax-title span { color:' . $ut_page_title_color . '; border-color:' . $ut_page_title_color . '; }';
                $this->css .= '.page-header.pt-style-6 .page-title:after, .page-header.pt-style-6 .parallax-title:after, .page-header.pt-style-6 .section-title:after { border-color:' . $ut_page_title_color . '; }';  
                
            }
            
            /* pt style 2 */
            $ut_page_headline_style_2_color  = get_post_meta( $post_ID , 'ut_section_headline_style_2_color' , true);
            $ut_page_headline_style_2_color  = !empty( $ut_page_headline_style_2_color ) ? $ut_page_headline_style_2_color : ot_get_option('ut_global_page_headline_style_2_color', $ut_page_title_color );
            
            $ut_page_headline_style_2_height = get_post_meta( $post_ID , 'ut_section_headline_style_2_height' , true);
            $ut_page_headline_style_2_height  = !empty( $ut_page_headline_style_2_height ) ? $ut_page_headline_style_2_height : ot_get_option('ut_global_page_headline_style_2_height', '1px');
            
            $ut_page_headline_style_2_width  = get_post_meta( $post_ID , 'ut_section_headline_style_2_width' , true);
            $ut_page_headline_style_2_width  = !empty( $ut_page_headline_style_2_width ) ? $ut_page_headline_style_2_width : ot_get_option('ut_global_page_headline_style_2_width', '30px');
            
            $this->css .= $this->headline_style( '#primary .pt-style-2 h1.page-title' , 'pt-style-2', $ut_page_headline_style_2_color, $ut_page_headline_style_2_height, $ut_page_headline_style_2_width );

            if( $ut_page_headline_style_spacing_top = ot_get_option('ut_global_page_headline_style_2_spacing_top') ) {

                $this->css .= '                
                #primary .pt-style-2 h1.page-title span:after {
                    margin-top: ' . $this->add_px_value( $ut_page_headline_style_spacing_top ) . ';
                }';

            }

            /* pt style 3 */
            $ut_page_title_color = !empty( $ut_page_title_color ) ? $ut_page_title_color : $this->accent;
            $this->css .= $this->headline_style( '#primary header.page-header.pt-style-3', 'pt-style-3', $ut_page_title_color );
            
            /* pt style 4 */
            $ut_page_headline_style_4_width  = get_post_meta( $post_ID , 'ut_section_headline_style_4_width' , true);
            $ut_page_headline_style_4_width  = !empty( $ut_page_headline_style_4_width ) ? $ut_page_headline_style_4_width : ot_get_option('ut_global_page_headline_style_4_width', '6');
            
            $this->css .= $this->headline_style( '#primary header.page-header.pt-style-4', 'pt-style-4', '', '', $ut_page_headline_style_4_width );
                        
            $ut_page_header_margin_left = get_post_meta( $post_ID , 'ut_section_header_margin_left' , true);
            /* add to CSS */
            if( !empty($ut_page_header_margin_left) ) {
                $this->css .= '#primary .page-header:not(.wpb_wrapper .page-header) { margin-left:'.$ut_page_header_margin_left.'; }';
            }
            
            $ut_page_header_margin_right = get_post_meta( $post_ID , 'ut_section_header_margin_right' , true); 
            /* add to CSS */ 
            if( !empty($ut_page_header_margin_right) ) {
                $this->css .= '#primary .page-header:not(.wpb_wrapper .page-header) { margin-right:'.$ut_page_header_margin_right.'; }';
            }

            /**
             * Page Title Lead
             */
            $this->css .= $this->font_style_css( array(
                'selector'           => '#primary .page-header .lead',
                'font-type'          => ot_get_option('ut_global_page_headline_lead_font_type', 'ut-font' ),
                'font-style'         => ot_get_option('ut_global_page_headline_lead_font_style', 'semibold' ),
                'google-font-style'  => ot_get_option('ut_google_global_page_headline_lead_font_style'),
                'websafe-font-style' => ot_get_option('ut_global_page_headline_lead_websafe_font_style'),
                'custom-font-style'  => ot_get_option('ut_global_page_headline_lead_custom_font_style')
            ) );

            if( ot_get_option('ut_global_page_headline_lead_color') ) {
                $this->css .= '#primary .page-header .lead p { color: ' . ot_get_option('ut_global_page_headline_lead_color') . ' ;}';
            }


            /**
             * Page Title Glow
             */

            if( ut_collect_option( 'ut_page_title_glow', 'off' ) == 'on' ) {

                $ut_page_title_glow_color = ut_collect_option( 'ut_page_title_glow_color', $this->accent );

                if( !empty( $ut_page_title_glow_color ) ) {

                    $this->css .= '#primary .page-title.ut-glow { 
                        text-shadow: 0 0 40px ' . $ut_page_title_glow_color . ', 2px 2px 3px ' . ut_collect_option( 'ut_page_title_glow_shadow_color', 'black' ) . '; 
                    }'. "\n";

                }

            }

            /**
             * Page Title Stroke
             */

            if( ut_collect_option( 'ut_page_title_stroke_effect', 'off' ) == 'on' ) {

                $this->css .= '#primary .page-title.ut-text-stroke {
                    -moz-text-stroke-color: ' . ut_collect_option( 'ut_page_title_stroke_color', $this->accent ) .';
                    -webkit-text-stroke-color: ' . ut_collect_option( 'ut_page_title_stroke_color', $this->accent ) .';
                    -moz-text-stroke-width: ' . ut_collect_option( 'ut_page_title_stroke_width', '1' ) .'px;  
                    -webkit-text-stroke-width: ' . ut_collect_option( 'ut_page_title_stroke_width', '1' ) .'px;	            
                }'. "\n";

            }

            /**
             * Page Lead Settings
             */
            
            $ut_page_slogan_color = get_post_meta( $post_ID , 'ut_section_slogan_color' , true);
            
            /* add to CSS */
            if( !empty( $ut_page_slogan_color ) ) {
                $this->css .= '#primary .lead p { color: ' . $ut_page_slogan_color . '; }'; 
            }
            
            $ut_section_slogan_padding_left  = get_post_meta( $post_ID , 'ut_section_slogan_padding_left' , true);
            
            /* add to CSS */
            if( !empty($ut_section_slogan_padding_left) ) {
                $this->css .= '#primary .lead p { padding-left: ' . $ut_section_slogan_padding_left . '; }'; 
            }
            
            $ut_section_slogan_padding_right = get_post_meta( $post_ID , 'ut_section_slogan_padding_right' , true);
            
            /* add to CSS */
            if( !empty($ut_section_slogan_padding_right) ) {
                $this->css .= '#primary .lead p { padding-right: ' . $ut_section_slogan_padding_right . '; }'; 
            }  
           
            /**
             * Content Section Title Header Settings
             */
			
            $this->css .= $this->global_headline_font_style('#primary .parallax-title, #ut-custom-hero .parallax-title, #ut-custom-contact-section .parallax-title' , 'global' );
            $this->css .= $this->global_headline_font_style('#primary .section-title, #ut-custom-hero .section-title, #ut-custom-contact-section .section-title' , 'global' );
             
            /* pt style 2 */
            $this->css .= $this->headline_style( '.pt-style-2:not(.page-header):not(.csection-title) .parallax-title', 'pt-style-2' , ot_get_option('ut_global_headline_style_2_color', ot_get_option('ut_global_headline_font_color')), ot_get_option('ut_global_headline_style_2_height', '1px'), ot_get_option('ut_global_headline_style_2_width', '30px') );
            $this->css .= $this->headline_style( '.pt-style-2:not(.page-header):not(.csection-title) .section-title' , 'pt-style-2' , ot_get_option('ut_global_headline_style_2_color', ot_get_option('ut_global_headline_font_color')), ot_get_option('ut_global_headline_style_2_height', '1px'), ot_get_option('ut_global_headline_style_2_width', '30px') );           

            if( $ut_global_headline_style_2_spacing_top = ot_get_option('ut_global_headline_style_2_spacing_top') ) {
                
                $this->css .= '                
                .pt-style-2 .page-title:not(.ut-glitch) span:after, 
                .pt-style-2 .parallax-title:not(.ut-glitch) span:after, 
                .pt-style-2 .section-title:not(.ut-glitch) span:after {
                    margin-top: ' . $this->add_px_value( $ut_global_headline_style_2_spacing_top ) . ';
                }
                
                .pt-style-2 .page-title.ut-glitch span:after, 
                .pt-style-2 .parallax-title.ut-glitch span:after, 
                .pt-style-2 .section-title.ut-glitch span:after {
                    margin-top: ' . $this->add_px_value( $ut_global_headline_style_2_spacing_top ) . ';
                }
                
                
                ';
                
            }
            
            /* pt style 3 */
            $this->css .= $this->headline_style( '.pt-style-3:not(.page-header) .section-title' , 'pt-style-3' , $this->accent );
            
            /* pt style 4 */
            $this->css .= $this->headline_style( '.pt-style-4:not(.page-header):not(.csection-title) .page-title, .pt-style-4:not(.page-header):not(.csection-title) .parallax-title, .pt-style-4:not(.page-header):not(.csection-title) .section-title' , 'pt-style-4', '', '', ot_get_option("ut_global_headline_style_4_width","6") );
            
            // default colors
            if( ot_get_option('ut_global_headline_font_color') ) {            
                $this->css .= '.pt-style-4:not(.page-header):not(.csection-title) .page-title span, .pt-style-4:not(.page-header):not(.csection-title) .parallax-title span, .pt-style-4:not(.page-header):not(.csection-title) .section-title span { border-color: ' . ot_get_option('ut_global_headline_font_color') . '; }';            
                $this->css .= '.pt-style-5:not(.page-header):not(.csection-title) .page-title span, .pt-style-5:not(.page-header):not(.csection-title) .section-title span { background:' . ot_get_option('ut_global_headline_font_color') . ';	-webkit-box-shadow: 0 0 0 3px ' . ot_get_option('ut_global_headline_font_color') . '; -moz-box-shadow:0 0 0 3px ' . ot_get_option('ut_global_headline_font_color') . '; box-shadow:0 0 0 3px ' . ot_get_option('ut_global_headline_font_color') . '; }';
                $this->css .= '.pt-style-5:not(.page-header):not(.csection-title) .parallax-title span { color:' . ot_get_option('ut_global_headline_font_color') . '; border-color:' . ot_get_option('ut_global_headline_font_color') . '; }';
                $this->css .= '.pt-style-6:not(.page-header):not(.csection-title) .page-title:after, .pt-style-6:not(.page-header):not(.csection-title) .parallax-title:after, .pt-style-6:not(.page-header):not(.csection-title) .section-title:after { border-color:' . ot_get_option('ut_global_headline_font_color') . '; }';    
            }
            
            /**
             * Content Section Title Spacing
             */
            $this->css .= '.wpb_wrapper .section-header > *:first-child { margin-bottom:' . ot_get_option('ut_global_headline_margin_bottom') . 'px; }';
            $this->css .= '.wpb_wrapper .page-header.page-title-module > *:first-child { margin-bottom:' . ot_get_option('ut_global_page_headline_margin_bottom') . 'px; }';
            
            /**
             * Page Spacing
             */             
            
            if( get_post_meta( $post_ID , 'ut_page_padding_top' , true ) ) {
                $this->css .= '.main-content-background { padding-top:' . $this->add_px_value( get_post_meta( $post_ID , 'ut_page_padding_top' , true ) ) . ' !important; }';
            }
            
            if( get_post_meta( $post_ID , 'ut_page_padding_bottom' , true ) ) {
                $this->css .= '.main-content-background { padding-bottom:' .  $this->add_px_value( get_post_meta( $post_ID , 'ut_page_padding_bottom' , true ) ) . ' !important; }';
            }
                       
           
            /**
             * Content Headlines
             */
            $ut_page_heading_color = get_post_meta( $post_ID , 'ut_section_heading_color' , true);
                
            /* add to CSS */
            if( !empty( $ut_page_heading_color ) ) {
                
                $this->css .= '#primary .entry-content h1 { color: ' . $ut_page_heading_color . ' !important; }'. "\n";
                $this->css .= '#primary .entry-content h2 { color: ' . $ut_page_heading_color . ' !important; }'. "\n"; 
                $this->css .= '#primary .entry-content h3 { color: ' . $ut_page_heading_color . ' !important; }'. "\n"; 
                $this->css .= '#primary .entry-content h4 { color: ' . $ut_page_heading_color . ' !important; }'. "\n"; 
                $this->css .= '#primary .entry-content h5 { color: ' . $ut_page_heading_color . ' !important; }'. "\n"; 
                $this->css .= '#primary .entry-content h6 { color: ' . $ut_page_heading_color . ' !important; }'. "\n";
                  
            }
            
            /**
             * Content Text Color
             */
            $ut_page_text_color = get_post_meta( $post_ID , 'ut_section_text_color' , true);
            
            /* add to CSS */
            if( !empty($ut_page_text_color) ) {
                $this->css.= '#primary .entry-content { color: ' . $ut_page_text_color . '; }'. "\n"; 
            }
            
            /* output css */
            echo $this->minify_css( '<style id="ut-page-custom-css"  type="text/css">' . $this->css . '</style>' );
            
        
        }  
            
    }

}