<?php

if (!defined('ABSPATH')) {
    exit; // exit if accessed directly
}

if ( ! function_exists( 'ut_search_sub_array' ) ) :

    function ut_search_sub_array( $array, $value ) {

        foreach( $array as $key => $subarray ){

            if( $value == $key ) {

                return $subarray;

            }

        }

        return false;

    }

endif;


/**
 * Simplify Google Font Array for faster loading
 *
 * @param  array $fonts
 * @return array
 *
 */

function ut_simplify_google_fonts( $fonts ) {

    if( empty( $fonts ) ) {

        return array();

    }

    // set missing subsets
    foreach( $fonts as $key => $font ) {

        if( empty( $font['font-subset'] ) ) {

            $fonts[$key]['font-subset'] = 'latin'; // default subset

        }

        if( empty( $font['font-style'] ) || $font['font-style'] == 'regular' || $font['font-style'] == 'normal' ) {

            $fonts[$key]['font-style'] = ''; // default style

        }

        if( empty( $font['font-weight'] ) ) {

            // if no font weight has been selected, load the first available
            $fonts[$key]['font-weight'] = isset( ut_recognized_google_fonts()[$font['font-family']]['variants'][0] ) ? ut_recognized_google_fonts()[$font['font-family']]['variants'][0] : 400;

        }

    }

    // option relations
    $google_options_relations = array(
        // main navigation relations
        'ut_global_navigation_font_type' => array(
            'ut_global_navigation_submenu_font_style',
            'ut_global_navigation_modules_font_style',
            'ut_global_navigation_modules_font_style',
            'ut_global_mobile_navigation_font_style',
            'ut_global_mobile_navigation_sub_font_style'
        ),
        // overlay navigation relations
        'ut_overlay_navigation_font_type' => array(
            'ut_global_overlay_navigation_submenu_websafe_font_style'
        )

    );

    // create new font array
    $font_array = array();
    $font_array['subsets'] = array();

    foreach( $fonts as $key => $font ) {

        if( empty( $font['font-family'] ) ) {
            continue;
        }

        // create new array for this font
        if( !array_key_exists( $font['font-family'], $font_array )  ) {

            $font_array[$font['font-family']] = array();

        }

        // font weight
        if( !empty( $font['font-weight'] ) ) {

            if ( isset( $font_array[ $font['font-family'] ]['font-setting'] ) ) {

                if ( ! in_array( $font['font-weight'] . $font['font-style'], $font_array[ $font['font-family'] ]['font-setting'] ) ) {

                    $font_array[ $font['font-family'] ]['font-setting'][] = $font['font-weight'] . $font['font-style'];

                }

            } else {

                $font_array[ $font['font-family'] ]['font-setting'] = array( $font['font-weight'] . ':' . $font['font-style'] );

            }

        }

        // related font settings
        if( isset( $google_options_relations[$key] ) ) {

            foreach( $google_options_relations[$key] as $related_option ) {

                $related_option_value = ot_get_option( $related_option );

                if( $related_option_value ) {

                    // font style fallback
                    $related_option_value['font-style'] = ! empty( $related_option_value['font-style'] ) ? $related_option_value['font-style'] : 'normal';

                    if ( ! empty( $related_option_value['font-weight'] ) ) {

                        if ( isset( $font_array[ $font['font-family'] ]['font-setting'] ) ) {

                            if ( ! in_array( $related_option_value['font-weight'] . $related_option_value['font-style'], $font_array[ $font['font-family'] ]['font-setting'] ) ) {

                                $font_array[ $font['font-family'] ]['font-setting'][] = $related_option_value['font-weight'] . $related_option_value['font-style'];

                            }

                        } else {

                            $font_array[ $font['font-family'] ]['font-setting'] = array( $related_option_value['font-weight'] . ':' . $related_option_value['font-style'] );

                        }

                    }

                }

            }

        }

        // font subset
        if( !in_array( $font['font-subset'], $font_array['subsets'] ) ) {

            $font_array['subsets'][] = $font['font-subset'];

        }

    }

    return $font_array;

}

if ( ! function_exists( 'ut_create_google_font_link' ) ) :

    function ut_create_google_font_link() {

        $transient = 'ut-google-fonts-enqueue';

        // custom page overwrite
	    $page_overwrite = false;

	    $page_meta_google_options = array(
	        'ut_page_hero_font_global_overwrite' => array(
                'type'      => 'ut_page_hero_font_type',
                'google'    => 'ut_google_page_hero_font_style'
            )
        );

	    foreach( $page_meta_google_options as $key => $meta_google_option ) {

	        if( get_post_meta( get_the_ID(), $key, true ) == 'on' ) {

		        $page_overwrite = true;
		        break;

            }

        }

        if( false === ( get_transient( $transient ) ) || $page_overwrite ) {

            /* needed vars */
            $google_url = '//fonts.googleapis.com/css?family=';

            /* catch for all google typography settings */
            $option_keys = array();

            /* custom array of all affected option tree options */
            $google_options = array(
                'ut_body_font_type' 				   		    => 'ut_google_body_font_style',
                'ut_global_header_text_logo_font_type' 		    => 'ut_global_header_text_google_font_style',
                'ut_global_navigation_font_type' 			    => 'ut_global_navigation_google_font_style',
                'ut_global_navigation_submenu_font_type' 	    => 'ut_global_navigation_submenu_google_font_style',
                'ut_global_navigation_modules_font_type' 	    => 'ut_global_navigation_modules_google_font_style',
                'ut_global_navigation_buttons_font_type' 	    => 'ut_global_navigation_buttons_google_font_style',
                'ut_global_megamenu_column_title_font_type'	    => 'ut_global_megamenu_column_title_google_font_style',
                'ut_breadcrumb_font_type'                       => 'ut_google_breadcrumb_style',
                'ut_overlay_navigation_font_type' 		        => 'ut_google_overlay_navigation_style',
                'ut_front_hero_font_type' 					    => 'ut_google_front_page_hero_font_style',
                'ut_front_catchphrase_top_font_type' 		    => 'ut_google_front_catchphrase_top_font_style',
                'ut_front_catchphrase_font_type' 			    => 'ut_google_front_catchphrase_font_style',
                'ut_split_hero_font_type'					    => 'ut_google_split_hero_font_style',
                'ut_blog_hero_font_type' 					    => 'ut_google_blog_hero_font_style',
                'ut_blog_catchphrase_top_font_type' 		    => 'ut_google_blog_catchphrase_top_font_style',
                'ut_blog_catchphrase_font_type' 			    => 'ut_google_blog_catchphrase_font_style',
                'ut_global_h1_font_type' 					    => 'ut_h1_google_font_style',
                'ut_global_h2_font_type' 					    => 'ut_h2_google_font_style',
                'ut_global_h3_font_type' 					    => 'ut_h3_google_font_style',
                'ut_global_h4_font_type' 					    => 'ut_h4_google_font_style',
                'ut_global_h5_font_type' 					    => 'ut_h5_google_font_style',
                'ut_global_h6_font_type' 					    => 'ut_h6_google_font_style',
                'ut_global_headline_font_type' 				    => 'ut_global_google_headline_font_style',
                'ut_global_page_headline_font_type' 		    => 'ut_global_page_google_headline_font_style',
                'ut_global_lead_font_type' 					    => 'ut_google_lead_font_style',
                'ut_global_page_headline_lead_font_type' 		=> 'ut_google_global_page_headline_lead_font_style',
                'ut_csection_header_font_type' 				    => 'ut_csection_header_google_font_style',
                'ut_csection_lead_font_type'				    => 'ut_csection_lead_google_font_style',
                'ut_global_portfolio_title_font_type' 		    => 'ut_google_portfolio_title_font_style',
                'ut_global_portfolio_title_below_font_type'     => 'ut_google_portfolio_title_below_font_style',
                'ut_global_portfolio_category_font_type' 	    => 'ut_google_portfolio_category_font_style',
                'ut_blockquote_font_type' 					    => 'ut_google_blockquote_font_style',
                'ut_global_blog_widgets_headline_font_type'     => 'ut_global_blog_widgets_headline_google_font_style',
                'ut_footer_widgets_headline_font_type' 		    => 'ut_footer_widgets_headline_google_font_style',
                'ut_lightbox_font_type'                         => 'ut_lightbox_google_font_style',
                'ut_react_portfolio_title_font_type'            => 'ut_google_react_portfolio_title_font_style',
                'ut_react_portfolio_background_title_font_type' => 'ut_google_react_portfolio_background_title_font_style',
                'ut_image_loader_text_font_type'                => 'ut_image_loader_text_google_font_style'
            );

            // fill option keys
            foreach( $google_options as $key => $google_option) {

                if( ot_get_option( $key, 'ut-font' ) == 'ut-google' ) {

                    $option_keys[$key] = ot_get_option( $google_option );

                }

            }


            if( $page_overwrite ) {

	            foreach( $page_meta_google_options as $key => $meta_google_option ) {

		            if( get_post_meta( get_the_ID(),$meta_google_option['type'], true ) == 'ut-google' ) {

			            $option_keys[$key] = get_post_meta( get_the_ID(),$meta_google_option['google'], true );

		            }

                }

            }


            // simplify
            $_option_keys = ut_simplify_google_fonts( $option_keys );

            // no fonts to proceed
            if( empty( $_option_keys ) ) {
                return;
            }

            // setup query strings
            $fonts      = array();
            $query_args = array();

            foreach( $_option_keys as $key => $option ) {

                if( $key == 'subsets' ) {
                    continue;
                }

                $google_fonts = ut_search_sub_array( ut_recognized_google_fonts(), $key );

                if( $google_fonts ) {

                    // replace whitespace with +
                    $family = preg_replace("/\s+/" , '+' , $google_fonts['family'] );

                    if( isset( $option['font-setting'] ) ) {

                        $fonts[] = $family . ':' . implode( ',', $option['font-setting'] );

                    } else {

                        $fonts[] = $family;

                    }

                }

            }

            // fonts
            $query_args['family'] = implode( '|', $fonts );

            // needed subsets
            $query_args['subsets'] = implode( ',', $_option_keys['subsets'] );

            // font swap support
            $query_args['display'] = 'swap';

            // final string
            $query_string = add_query_arg( $query_args, $google_url );

            if( !empty( $query_string ) ) {

                set_transient( $transient, $query_string );

            }

        } else {

            $query_string = get_transient( $transient );

        }

        if( !empty( $query_string ) && is_string( $query_string ) ) { ?>

            <link rel="dns-prefetch" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin="anonymous">
            <link rel="preload" href="<?php echo esc_url( $query_string ); ?>" as="fetch" crossorigin="anonymous">

            <?php wp_enqueue_style( 'ut-google-fonts', esc_url( $query_string ) ); ?>

        <?php

        // old configuration - delete it and start again
        } elseif( !empty( $query_string ) && is_array( $query_string ) ) {

            delete_transient( $transient );
            ut_create_google_font_link();

        }

    }

endif;

add_action( 'wp_head', 'ut_create_google_font_link', 1 );



/*
 * CDN DNS Prefetch
 */
function ut_prefetch_cdn_dns() {

    if( !empty( ot_get_option('ut_cdn_theme_path') ) ) {

        $cdn = parse_url( ot_get_option('ut_cdn_theme_path'), PHP_URL_HOST);
        echo '<link rel="dns-prefetch" href="' . esc_url( $cdn ) . '">';

    }

}

add_action( 'wp_head', 'ut_prefetch_cdn_dns', 1 );


/*
 * Theme Scripts
 */

function unite_scripts() {

	$min = NULL;

	if( apply_filters( 'ut_minify_assets', true ) ){
		$min = '.min';
	}

	/*
	 * CSS
	 */

    /* Core Fonts and Icons  */
    wp_register_style(
        'ut-core-font-and-icons',
        THEME_WEB_ROOT . '/css/ut.core.fonts' . $min . '.css'
    );

    /* Core Plugins and Library  */
    wp_enqueue_style(
        'ut-core-plugins',
        THEME_WEB_ROOT . '/css/ut.core.plugins' . $min . '.css',
        array( 'ut-core-font-and-icons' )
    );

    /* Default Shortcodes */
    wp_register_style(
        'ut-shortcodes',
        THEME_WEB_ROOT . '/css/ut.shortcode' . $min . '.css'
    );

    /* Visual Composer Modules */
    wp_enqueue_style(
        'ut-vc-shortcodes',
        THEME_WEB_ROOT . '/css/ut.vc.shortcodes' . $min . '.css',
        array( 'js_composer_front', 'ut-shortcodes' )
    );

	/* Fancy Slider */
	if( ut_return_hero_config( 'ut_hero_type' ) == 'transition' ) {

		wp_enqueue_style(
			'ut-fancy-slider',
			THEME_WEB_ROOT . '/css/ut-fancyslider' . $min . '.css'
		);

	}        

	/* Brookyln Shop CSS */
	if( is_woocommerce_activated() ) {

		wp_enqueue_style(
			'ut-theme-shop',
			THEME_WEB_ROOT . '/css/ut.brooklyn-shop' . $min . '.css'
		);

	}

	/* Brookyln CSS */
	wp_enqueue_style(
		'ut-main-style',
		get_stylesheet_uri(),
		array(), 
		UT_THEME_VERSION
	);	

	/* Brookyln Theme CSS */
	wp_enqueue_style(
		'ut-theme-style',
		THEME_WEB_ROOT . '/css/ut.theme' . $min . '.css',
		array('ut-main-style'), 
		UT_THEME_VERSION
	); 

	if( isset( $_GET['vc_editable'] ) && $_GET['vc_editable'] == 'true' ) {

        wp_enqueue_style(
            'ut-frontend-editor',
            THEME_WEB_ROOT . '/css/ut-frontend-editor' . $min . '.css',
            'ut-main-style',
            UT_THEME_VERSION
        );

    }
    
	/*
	 * Register JS
	 */

	/* Particle Effects */
	wp_register_script(
		'ut-anime-js', 
		THEME_WEB_ROOT . '/js/anime/anime.min.js',
		array('jquery'), 
		UT_THEME_VERSION,
		true
	);

    /* Reveal FX */
    wp_register_script(
		'ut-revealfx-js', 
		THEME_WEB_ROOT . '/js/anime/revealfx.min.js',
		array('ut-anime-js'), 
		UT_THEME_VERSION,
		true
	);

    /* pixi */
    wp_register_script(
		'ut-pixi-js', 
		THEME_WEB_ROOT . '/js/pixi/pixi.min.js',
		array(), 
		UT_THEME_VERSION
	);
    
    wp_register_script(
		'ut-pixi-sound-js', 
		THEME_WEB_ROOT . '/js/pixi/pixi-sound.min.js',
		array( 'ut-pixi-js' ), 
		UT_THEME_VERSION
	);

    /* SVG Library */
    wp_register_script(
        'ut-svg-js',
        THEME_WEB_ROOT . '/js/anime/svg.js',
        array( 'jquery' ),
        UT_THEME_VERSION,
        true
    );

	/* Page Morphing */
	wp_register_script(
		'ut-ballon-js', 
		THEME_WEB_ROOT . '/js/morphing/balloon' . $min . '.js',
		array( 'jquery' ), 
		UT_THEME_VERSION,
		true
	);

	wp_register_script(
		'ut-digital-js', 
		THEME_WEB_ROOT . '/js/morphing/digital' . $min . '.js',
		array( 'jquery' ), 
		UT_THEME_VERSION,
		true
	);

	wp_register_script(
		'ut-fluid-js', 
		THEME_WEB_ROOT . '/js/morphing/fluid' . $min . '.js',
		array( 'jquery' ), 
		UT_THEME_VERSION,
		true
	);

	wp_register_script(
		'ut-water-js', 
		THEME_WEB_ROOT . '/js/morphing/water' . $min . '.js',
		array( 'jquery' ), 
		UT_THEME_VERSION,
		true
	);

	wp_register_script(
		'ut-smooth-scroll', 
		THEME_WEB_ROOT . '/js/SmoothScroll' . $min . '.js',
		array(), 
		UT_THEME_VERSION
	);


    /* video */
    wp_register_script(
        'ut-video-lib',
        THEME_WEB_ROOT . '/js/ut-videoplayer-lib' . $min . '.js',
        array('jquery'),
        '1.0',
        true
    );

    /* Greensock */
    wp_register_script(
        'ut-greensock-tweenlite',
        THEME_WEB_ROOT . '/js/greensock/TweenLite.min.js',
        array(),
        '2.1.3',
        true
    );

    wp_register_script(
        'ut-greensock-easepack',
        THEME_WEB_ROOT . '/js/greensock/EasePack.min.js',
        array( 'ut-greensock-tweenlite' ),
        '1.16.0',
        true
    );

    wp_register_script(
        'ut-greensock-css',
        THEME_WEB_ROOT . '/js/greensock/CSSPlugin.min.js',
        array( 'ut-greensock-tweenlite' ),
        '2.1.3',
        true
    );

    /* Mobile Events */
    if( unite_mobile_detection()->isMobile() ) {

        wp_enqueue_script(
            'ut-mobileevents-js',
            THEME_WEB_ROOT . '/js/mobileevents/jquery.mobile-events' . $min . '.js',
            array(),
            '2.0.0',
            true
        );

    }

	/*
	 * Enqueue JS
	 */

	/* jquery */
	wp_enqueue_script( 'jquery' );

	if( !wp_script_is( 'jquery-migrate', 'enqueued' ) ) {

		wp_enqueue_script(
			'ut-jquery-migrate',
			THEME_WEB_ROOT . '/js/migrate/jquery-migrate' . $min . '.js',
			array( 'jquery' )
		);

	}

	/* preloader */
	if( ot_get_option('ut_use_image_loader') == 'on' && !isset( $_GET['vc_editable'] ) ) {

		$loader_for = ot_get_option('ut_use_image_loader_on');
		$loader_match = false;

		if( !empty( $loader_for ) && is_array( $loader_for ) ) :    

			foreach( $loader_for as $key => $conditional ) {

				if( $conditional() && $conditional != 'is_singular' ) {

					$loader_match = true;

					/* front page gets handeled as a page too */
					if( $conditional == 'is_page' && is_front_page() ) {

						$loader_match = false;

					} elseif( $conditional == 'is_single' && is_singular('portfolio') ) {

						$loader_match = false;

					} else {

						/* we have a match , so we can stop the loop */
						break;

					}

				}

				if( $conditional( 'portfolio' ) && $conditional == 'is_singular' ) {

					$loader_match = true;
					break;

				}

			}

		endif;

		if( $loader_match ) :

			wp_enqueue_script(
				'ut-loader',
				THEME_WEB_ROOT . '/js/jquery.queryloader2' . $min . '.js',
				array('jquery'),
				'2.9.0',
				false
			);

			if( ot_get_option('ut_morph_image_loader', 'off') == 'on' ) {

				wp_enqueue_script('ut-anime-js');
				wp_enqueue_script( ot_get_option( 'ut_morph_image_loader_effect', 'ut-fluid-js' ) );

			}

			if( ot_get_option('ut_image_loader_style', 'style_one') == 'text_draw' || ot_get_option('ut_image_loader_style', 'style_one') == 'text_background_animation'  ) {

                wp_enqueue_script('ut-anime-js');

			}

			// pre loader settings
			$loader_settings = array( 
				'loader_active'     => true, 
				'loader_logo'       => ot_get_option( 'ut_image_loader_logo' ), 
				'style'             => ot_get_option( 'ut_image_loader_style', 'style_one' ), 
				'loader_percentage' => ot_get_option( 'ut_show_loader_percentage', 'on' ), 
				'loader_text'       => ot_get_option( 'ut_image_loader_text', 'loading' ),
				'text_logo'         => '<div class="site-logo"><h1 class="logo">' . get_bloginfo( "name" ) . '</h1></div>',                    
				'line_color'        => ot_get_option( 'ut_image_loader_text_draw_line_color' , get_option('ut_accentcolor' , '#F1C40F') ),
				'text_start_color'  => ot_get_option( 'ut_image_loader_text_draw_start_color' , get_option('ut_accentcolor' , '#F1C40F') ),
				'text_end_color'    => ot_get_option( 'ut_image_loader_text_draw_end_color' , get_option('ut_accentcolor' , '#F1C40F') ),
			);

			wp_localize_script( 'ut-loader' , 'preloader_settings' , $loader_settings );

		endif;

	}

	/* overlay animation effect */
	if( ut_return_hero_config( 'ut_hero_overlay_effect', 'off' ) == 'on' ) {

		wp_enqueue_script('ut-greensock-tweenlite');
		wp_enqueue_script('ut-greensock-easepack');

		wp_enqueue_script(
			'ut-animation-frame', 
			THEME_WEB_ROOT . '/js/greensock/AnimationFrame.js', 
			array('ut-greensock-easepack'),
			'1.0',
			true
		);

		/* connecting dots overlay */
		if( apply_filters( 'ut_show_hero', false ) && ut_return_hero_config('ut_hero_overlay_effect') == 'on' && ut_return_hero_config( 'ut_hero_overlay_effect_style' ) == 'dots' ) {

			wp_enqueue_script(
				'ut-connecting-dots',
				THEME_WEB_ROOT . '/js/canvas.connectingdots' . $min . '.js', 
				array('ut-animation-frame'),
				'1.0', 
				true
			);            

		}

		/* rising bubbles overlay */
		if( apply_filters( 'ut_show_hero', false ) && ut_return_hero_config('ut_hero_overlay_effect') == 'on' && ut_return_hero_config( 'ut_hero_overlay_effect_style' ) == 'bubbles' ) {

			wp_enqueue_script(
				'ut-rising-bubbles',
				THEME_WEB_ROOT . '/js/canvas.risingbubbles' . $min . '.js', 
				array('ut-animation-frame'),
				'1.0',
				true
			);

		}

	}

	/* rain effect */
	if( apply_filters( 'ut_show_hero', false ) && ut_return_hero_config( 'ut_hero_rain_effect' , 'off' ) == 'on' ) {

		wp_enqueue_script(
			'ut-rain',
			THEME_WEB_ROOT . '/js/rainyday' . $min . '.js', 
			array('jquery'),
			'1.0',
			true
		);
        
        if( ut_return_hero_config('ut_hero_rain_sound' , 'off') == 'on' ) {
            
            wp_enqueue_script( 'ut-pixi-sound-js' );
            
        } 

	}

	/* fancy slider */
	if( ut_return_hero_config( 'ut_hero_type' ) == 'transition' ) {

		wp_enqueue_script(
			'ut-fancy-slider',
			THEME_WEB_ROOT . '/js/ut-fancyslider' . $min . '.js',
			array('jquery'),
			'1.0',
			true
		);

	}

	/* smooth scroll (for google chrome )*/
	if( ot_get_option( 'ut_google_smooth_scroll', 'off' ) == 'on' ) {

		wp_enqueue_script( 'ut-smooth-scroll' );

	}

	/* polyfil for older browsers (optional) */
    if( ot_get_option('ut_use_polyfill', 'on') == 'off' ) { // @todo

        wp_enqueue_script(
            'polyfill-io',
            'https://polyfill.io/v3/polyfill.min.js',
            array(),
            UT_THEME_VERSION
        );

    }

	/* Main Libraries */
    wp_enqueue_script(
		'ut-scriptlibrary',
		THEME_WEB_ROOT . '/js/ut-scriptlibrary' . $min . '.js', 
		array('jquery' ),
		UT_THEME_VERSION
	);

    /* Vimeo Froogaloop */
	if( ot_get_option('ut_enqueue_froogaloop', 'off' ) == 'on' ) {

        wp_enqueue_script(
            'froogaloop',
            'https://f.vimeocdn.com/js/froogaloop2.min.js',
            array(),
            '2',
            true
        );

    }

	/* Comment Reply*/
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { 

		wp_enqueue_script( 'comment-reply' ); 

	} 

	/* Custom JavaScripts */
	wp_enqueue_script(
		'unitedthemes-init', 
		THEME_WEB_ROOT . '/js/ut-init' . $min . '.js',
		array( 'jquery', 'ut-scriptlibrary' ),
		UT_THEME_VERSION, 
		true
	);

	/* retina logos with fallback */
	$ut_activate_page_hero = get_post_meta( get_the_ID() , 'ut_activate_page_hero' , true );  

	$sitelogo_retina = !is_front_page() && !is_home() && ( !apply_filters( 'ut_show_hero', false ) ) ? ( ut_return_logo_config( 'ut_site_logo_alt_retina' ) ? ut_return_logo_config( 'ut_site_logo_alt_retina' ) : ut_return_logo_config( 'ut_site_logo_retina' ) ) : ut_return_logo_config( 'ut_site_logo_retina' );                        
	$alternate_logo_retina = ut_return_logo_config( 'ut_site_logo_alt_retina' ) ? ut_return_logo_config( 'ut_site_logo_alt_retina' ) : ut_return_logo_config( 'ut_site_logo_retina' );

	$retina_logos = array(
		'sitelogo_retina'       => $sitelogo_retina, 
		'alternate_logo_retina' => $alternate_logo_retina,
		'overlay_sitelogo_retina' => ot_get_option("ut_overlay_logo_retina"), 
	);

	wp_localize_script('unitedthemes-init' , 'retina_logos' , $retina_logos );
    
    // frame settings
    $ut_site_frame_settings = apply_filters( 'ut_site_frame_settings', array() );
    
	$site_settings = apply_filters( 'ut_global_site_settings', array(
		'type'                    => ot_get_option( 'ut_site_layout', 'multisite' ),
        'siteframe_size'          => $ut_site_frame_settings['border_size'],
        'siteframe_top'           => isset( $ut_site_frame_settings['border_status']['margin-top'] ) && $ut_site_frame_settings['border_status']['margin-top'] == 'on' ? $ut_site_frame_settings['border_size'] : 0,
        'siteframe_right'         => isset( $ut_site_frame_settings['border_status']['margin-right'] ) && $ut_site_frame_settings['border_status']['margin-right'] == 'on' ? $ut_site_frame_settings['border_size'] : 0,
        'siteframe_bottom'        => isset( $ut_site_frame_settings['border_status']['margin-bottom'] ) && $ut_site_frame_settings['border_status']['margin-bottom'] == 'on' ? $ut_site_frame_settings['border_size'] : 0,
        'siteframe_left'          => isset( $ut_site_frame_settings['border_status']['margin-left'] ) && $ut_site_frame_settings['border_status']['margin-left'] == 'on' ? $ut_site_frame_settings['border_size'] : 0,
		'navigation'              => ut_return_header_config( 'ut_header_layout', 'default' ),
        'header_scroll_position'  => ut_return_header_config( 'ut_navigation_scroll_position', 'default' ),
		'lg_type'                 => ot_get_option( 'ut_lightgallery_type', 'lightgallery' ),
		'lg_transition'           => ot_get_option( 'ut_morphbox_transition', 1200 ),
        'lg_download'             => !ot_get_option('ut_lightgallery_download', 'false'),
		'lg_mode'                 => ot_get_option( 'ut_lightgallery_effect', 'lg-slide' ),
        'lg_effect'               => ot_get_option( 'ut_morphbox_effect', 'wobble' ),
		'mobile_nav_open'         => false,
		'mobile_nav_is_animating' => false,
        'mobile_hero_passed'      => false,
        'scrollDisabled'          => false, 
        'button_particle_effects' => recognized_button_particle_effects(),
        'menu_locations'          => array(
            'navigation'                       => 'primary', 
            'navigation-secondary'             => 'secondary',
            'ut-header-primary-extra-module'   => 'header_primary',
            'ut-header-secondary-extra-module' => 'header_secondary',
            'ut-header-tertiary-extra-module'  => 'header_tertiary',
        ),
        'brooklyn_header_scroll_offset' => 0,
	) );

	wp_localize_script('unitedthemes-init' , 'site_settings' , $site_settings );
    
	/* set volume for rain effect */        
	if( ut_return_hero_config('ut_hero_rain_sound' , 'off') == 'on' ) {

		wp_localize_script( 'wp-mediaelement', '_wpmejsSettings', array(
			'pluginPath' => includes_url( 'js/mediaelement/', 'relative' ),
			'startVolume' => 0.1
		) );

	}

	/* remove fontawesome */
	if( function_exists('vc_set_as_theme') ) {
		wp_deregister_style( 'font-awesome' ); /* theme has own library call */
	}

}    

add_action( 'wp_enqueue_scripts', 'unite_scripts' );


/**
 * Defer JavaScript loading
 */

function unite_require() {

    ob_start(); ?>

    <script type="text/javascript">

    (function($) {

        "use strict";

        function is_ms_ie() {

            const ua = window.navigator.userAgent;
            const msie = ua.indexOf("MSIE ");

            window.isMsIE = msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./);

        }

        is_ms_ie();

        var loaded_resources = [],
            loaded_files = [],
            loading_files = [],
            callback_queue = [];

        function delete_from_array( array, source ) {

            var index = array.indexOf(source);

            if (index > -1) {

                array.splice(index, 1);

            }

        }

        function check_loaded( needle, haystack ){

            for( var i = 0; i < needle.length; i++ ) {

                if( haystack.indexOf(needle[i]) === -1 ) {
                    return false;
                }

            }

            return true;

        }

        function check_callback_queue() {

            var i;

            var _callback_queue = callback_queue.slice();

            for( i = 0; i < _callback_queue.length; i++ ) {

                if( check_loaded( pluginsLoadedParams[_callback_queue[i][0]].scriptUrl, loaded_files ) ) {

                    // delete from queue
                    callback_queue.splice(i, 1);

                    // run callback
                    if( typeof _callback_queue[i][2] === 'function' ) {

                        _callback_queue[i][2]( _callback_queue[i][1] );

                    }

                }

            }

        }

        $.getMultiScripts = function( arr, settings ) {

            var _arr = $.map( arr, function( scr ) {

                loading_files.push( scr );
                return $.getScript( scr );

            });

            _arr.push( $.Deferred( function( deferred ){
                $( deferred.resolve );
            }));

            return $.when.apply( $, _arr );

        };

        var check_plugin = function( dom_element, settings ) {

            // no element or plugin of this kind found
            if( !dom_element.length || pluginsLoadedParams[settings.source] === undefined ) {
                return;
            }

            // block javascript for old Internet Explorer
            if( settings.ieblock !== 'undefined' && settings.ieblock && window.isMsIE ) {
                return;
            }

            // plugin already initialized
            if( typeof $.fn[settings.plugin] !== 'undefined' || typeof window[settings.plugin] !== 'undefined' ) {

                if( typeof settings.callback === 'function' ) {

                    settings.callback( dom_element );

                }

            } else {

                $.ajaxSetup({
                    cache: true
                });

                if( pluginsLoadedParams[settings.source].styleUrl !== undefined ) {

                    $.each( pluginsLoadedParams[settings.source].styleUrl, function( index ) {

                        // load before dependency
                        if( pluginsLoadedParams[settings.source].styleUrl[index]['dependency'] !== undefined && $(pluginsLoadedParams[settings.source].styleUrl[index]['dependency']).length ) {

                            $('<link/>', {
                                rel: 'stylesheet',
                                href: pluginsLoadedParams[settings.source].styleUrl[index]['url']
                            }).insertBefore( pluginsLoadedParams[settings.source].styleUrl[index]['dependency'] );

                        } else {

                            // Load possible CSS files
                            $('<link/>', {
                                rel: 'stylesheet',
                                href: pluginsLoadedParams[settings.source].styleUrl[index]['url']
                            }).appendTo('head');

                        }

                        // remove from loading array
                        pluginsLoadedParams[settings.source].styleUrl.splice(index, 1);

                    });

                }

                // plugin already loaded, run callback
                if( loaded_resources.indexOf( settings.source ) !== -1 ) {

                    if( typeof settings.callback === 'function' ) {

                        settings.callback( dom_element );
                        return true;

                    }

                }

                // particular file already loaded
                var files_to_load = pluginsLoadedParams[settings.source].scriptUrl.slice();

                $.each( files_to_load, function( index, element ) {

                    if( element !== undefined && loaded_files.indexOf( element ) > -1 ) {

                        delete_from_array( files_to_load, element );

                    }

                });

                var _files_to_load = files_to_load.slice();

                // files currently loading
                $.each( _files_to_load, function( index, element ) {

                    if( element !== undefined && loading_files.indexOf( element ) > -1 ) {

                        // remove from files to load
                        delete_from_array( files_to_load, element );

                        var _settings = Object.assign({}, settings);

                        // add to callback queue
                        callback_queue.push([ _settings.source, dom_element, _settings.callback ]);

                        // remove initial callback
                        settings.callback = '';

                    }

                });

                // start loading scripts
                if( files_to_load.length ) {

                    $.getMultiScripts( files_to_load, settings ).done(function () {

                        loaded_resources.push( settings.source );

                        $.each( files_to_load, function( index, element ) {

                            loaded_files.push( element );
                            // delete_from_array( loading_files, element );

                        });

                        check_callback_queue();

                        if (typeof settings.callback === 'function') {

                            settings.callback(dom_element);

                        }

                    });

                }

            }

        };

        jQuery.fn.ut_require_js = function( settings ){

            check_plugin( this, settings );

        };

        // load IE11 Poly CSS
        if( window.isMsIE ) {

            $(document).ut_require_js({
                plugin: 'ie_css_poly',
                source: 'ie_css_poly'
            });

        }

        $(document).on('click', '.ut-wait-for-plugin', function ( event ) {

            event.stopImmediatePropagation();
            event.preventDefault();

            return '';

        });

    })( jQuery );

    </script>

    <?php

    return UT_JS_Minifier::minify( str_replace( array('<script type="text/javascript">' , '</script>'), '', ob_get_clean() ) );

}

// Add Filter to make files available via CDN
if( !function_exists('unite_script_path') ) {

	function unite_script_path( $type = 'themes' ) {

		$brooklyn_theme = wp_get_theme();

		$script_path = ! empty( ot_get_option( 'ut_cdn_upload_path' ) ) ? ot_get_option( 'ut_cdn_upload_path' ) : content_url() . DIRECTORY_SEPARATOR . $type . DIRECTORY_SEPARATOR . $brooklyn_theme->get_template();

		return apply_filters( 'unite_script_path', $script_path );

	}

}


function unite_require_js() {

    $min = NULL;

    if( apply_filters( 'ut_minify_assets', true ) ){
        $min = '.min';
    }

    $params = array(

	    // Background Distortion
	    'distortion' => array(
		    'scriptUrl' => array(
			    unite_script_path() . '/js/three/three.min.js',
                unite_script_path() . '/js/ut-distortion' . $min . '.js',
		    ),
	    ),

        // Flickity
        'flickity' => array(
            'scriptUrl' => array(
                unite_script_path() . '/js/flickity/flickity.pkgd.min.js'
            ),
        ),

        // Flex Slider
        'flexslider' => array(
            'styleUrl'  => array(
                array(
                    'url' => unite_script_path() . '/css/flexslider' . $min . '.css',
                    'dependency' => '#ut-main-style-css'
                )
            ),
            'scriptUrl' => array(
                unite_script_path() . '/js/ut-flexslider' . $min . '.js'
            ),
        ),

        // Light Gallery
        'lightGallery' => array(
            'styleUrl'  => array(
                array(
                    'url' => unite_script_path() . '/assets/vendor/lightGallery/css/lightgallery' . $min . '.css',
                    'dependency' => '#ut-main-style-css'
                ),
            ),
            'scriptUrl' => array(
                unite_script_path() . '/assets/vendor/lightGallery/js/lightgallery-all' . $min . '.js'
            ),
        ),

        // Simple Bar ( Header Cart )
        'simplebar' => array(
            'scriptUrl' => array(
                unite_script_path() . '/js/simplebar/simplebar.js' // already minified
            ),
        ),

        // Isotope for Portfolio
        'isotope' => array(
            'scriptUrl' => array(
                unite_script_path() . '/js/isotope/jquery.isotope.min.js' // already minified
            ),
        ),

        // Tweenmax
        'tweenmax' => array(
            'scriptUrl' => array(
                unite_script_path() . '/js/greensock/TweenMax.min.js' // already minified
            ),
        ),

        // Stickit
        'stickit' => array(
            'scriptUrl' => array(
                unite_script_path() . '/js/stickit/stickit' . $min . '.js'
            ),
        ),

        // Fit Vid
        'fitVids' => array(
            'scriptUrl' => array(
                unite_script_path() . '/js/fitvid/fitvid' . $min . '.js'
            ),
        ),

        // Typewriter
        'typewriter' => array(
            'scriptUrl' => array(
                unite_script_path() . '/js/typewriter/typewriter.js' // already minified
            ),
        ),

        // Particle
        'particlesJS' => array(
            'scriptUrl' => array(
                unite_script_path() . '/js/particles' . $min . '.js',
            ),
        ),

        // Custom Cursor
        'customcursor' => array(
            'scriptUrl' => array(
                unite_script_path() . '/js/ut-custom-cursor' . $min . '.js',
            ),
        ),

        // Reveal FX
        'revealfx' => array(
            'scriptUrl' => array(
	            unite_script_path() . '/js/anime/anime.min.js',
                unite_script_path() . '/js/anime/revealfx.min.js'
            ),
        ),

        // Vivus SVG Draw
        'vivus' => array(
            'scriptUrl' => array(
                unite_script_path() . '/js/vivus/vivus' . $min . '.js'
            ),
        ),

        // Morphbox Lightbox
        'morphbox_base' => array(
            'scriptUrl' => array(
                unite_script_path() . '/js/three/three.min.js',
                unite_script_path() . '/js/greensock/TweenLite.min.js',
                unite_script_path() . '/js/greensock/EasePack.min.js',
                unite_script_path() . '/js/greensock/CSSPlugin.min.js'
            ),
        ),

	    'morphbox' => array(
		    'scriptUrl' => array(
			    unite_script_path() . '/js/ut-morph-box' . $min . '.js',
		    ),
	    ),

        // Morphbox Lightbox
        'buttonParticles' => array(
            'scriptUrl' => array(
	            unite_script_path() . '/js/anime/anime.min.js',
                unite_script_path() . '/js/anime/button-particles.min.js'
            ),
        ),

        // IE 11 CSS Poly
        'ie_css_poly' => array(
	        'scriptUrl' => array(
		        unite_script_path() . '/js/ie11-js-poly' . $min . '.js',
	        ),
            'styleUrl'  => array(
                array(
                    'url' => unite_script_path() . '/css/ie11-css-poly' . $min . '.css',
                    'dependency' => '#ut-main-style-css'
                )
            ),
        ),

        // Anime JS
        'anime' => array(
	        'scriptUrl' => array(
		        unite_script_path() . '/js/anime/anime.min.js'
	        ),
        ),

	    // ReactSlider JS
	    'reactslider' => array(
		    'scriptUrl' => array(
			    unite_script_path() . '/js/ut-react-slider' . $min . '.js'
		    ),
	    ),

	    // YTP Player
	    'ytplayer' => array(
		    'scriptUrl' => array(
			    unite_script_path() . '/js/jquery.mb.YTPlayer' . $min . '.js'
		    ),
	    ),

	    // Vimeo Player
	    'vimeo' => array(
		    'scriptUrl' => array(
			    unite_script_path() . '/js/vimeo.player' . $min . '.js',
			    unite_script_path() . '/js/jquery.vimelar' . $min . '.js'
		    ),
	    ),

        // Video Player Library
	    'videolib' => array(
		    'scriptUrl' => array(
			    unite_script_path() . '/js/ut-videoplayer-lib' . $min . '.js',
		    ),
	    ),

    );

	$script = "var pluginsLoadedParams = " . wp_json_encode( apply_filters( 'ut_recognized_required_js', $params ) ) . ';';

	wp_add_inline_script( 'jquery', $script );
	wp_add_inline_script( 'jquery', unite_require() );

}

add_action( 'wp_enqueue_scripts', 'unite_require_js', 1 );