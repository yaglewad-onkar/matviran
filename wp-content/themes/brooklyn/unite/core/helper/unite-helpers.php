<?php if (!defined('ABSPATH')) {
    exit; // exit if accessed directly
}

/**
 * Return Theme Version and License Status
 */
function _ut_get_theme_version() {

	// Licence Status
	$registered = 'u';

	if( $status = get_transient( 'ut-license-information' ) ) {

		$registered = isset( $status->result )  && $status->result ==  'access_success' ? 'r' : $registered;

	}

	return UT_THEME_VERSION . $registered;

}

/**
 * Theme Options Key
 *
 * @return    string
 *
 * @access    public
 * @since     1.0.0
 * @version   1.1.0
 */
     
function ut_options_key() {

    return apply_filters( 'unite_theme_options_id', 'unite_theme_options' );

}

/**
 * Theme Options Key Slug
 *
 * @return    string
 *
 * @access    public
 * @since     1.0.0
 * @version   1.1.0
 */
     
function ut_options_key_slug() {

    return apply_filters( 'unite-theme-options-slug', 'unite-theme-options' );

}

/**
 * Theme Options Layout
 *
 * @return    string
 *
 * @access    public
 * @since     1.1.0
 * @version   1.0.0
 */
     
function ut_options_layout_key() {

    return apply_filters( 'unite_options_layout_key', 'unite_theme_options_layout' );

}

/**
 * Current Theme Layout
 *
 * @return    string
 *
 * @access    public
 * @since     1.1.0
 * @version   1.0.0
 */
     
function ut_current_options_layout( $unite_theme_options_id ) {
    
    $available_layouts  = get_option( ut_options_layout_key() ); 
    $current_layout     = get_option( 'unite_current_options_layout' );
    
    if( $current_layout && is_array( $available_layouts ) && array_key_exists( $current_layout, $available_layouts ) ) {
        
        return $current_layout;   
    
    }
    
    return $unite_theme_options_id;

}

add_filter( 'unite_theme_options_id', 'ut_current_options_layout', 11 );

/**
 * Preview Theme Layout
 *
 * @return    string
 *
 * @access    public
 * @since     1.1.0
 * @version   1.0.0
 */
     
function ut_preview_options_layout( $unite_theme_options_id ) {
    
    $available_layouts = get_option( ut_options_layout_key() ); 
    
    /* manually added layouts */   
    if( isset( $_GET['unite_preview_layout'] ) && is_array( $available_layouts ) && array_key_exists( $_GET['unite_preview_layout'], $available_layouts ) ) {
                
        return $_GET['unite_preview_layout'];
    
    }    
    
    /* the core layout id */
    if( isset( $_GET['unite_preview_layout'] ) && $_GET['unite_preview_layout'] == 'default' ) {
    
        return 'unite_theme_options';
                
    }
    
    return $unite_theme_options_id;

}

add_filter( 'unite_theme_options_id', 'ut_preview_options_layout', 12 );


/**
 * Theme Customizer Key
 *
 * @return    string
 *
 * @access    public
 * @since     1.1.0
 * @version   1.0.0
 */
     
function ut_customizer_key() {

    return apply_filters( 'unite_customizer_options_id', 'unite_customizer_options' );

}

/**
 * Helper function to print arrays
 *
 * @param     array     Array to print 
 *
 * @access    public
 * @since     1.0.0
 * @version   1.0.0
 */
 
if( !function_exists( 'ut_print' ) ) :
     
    function ut_print( $array, $debug = false ) {
        
        if( $debug && isset( $_GET['debug'] ) ) {
                
            echo '<pre class="ut-print">';
                print_r( $array );
            echo '</pre>';
            
            return;
        
        } elseif( !$debug ) {
        
            echo '<pre class="ut-print">';
                print_r( $array );
            echo '</pre>';
        
        }
       
    }

endif;


/**
 * Helper Function: to detect already installed plugin
 *
 * @since 1.0
 */

if ( !function_exists( 'ut_check_plugin_status' ) ) {

    function ut_check_plugin_status( $plugin ) {

        if( is_multisite() && array_key_exists( $plugin , get_site_option('active_sitewide_plugins', array() ) ) ) {

            return array_key_exists( $plugin , get_site_option('active_sitewide_plugins', array() ) );

        } elseif( is_multisite() && in_array( $plugin, (array) get_option( 'active_plugins', array() ) ) ) {

            return in_array( $plugin, (array) get_option( 'active_plugins', array() ) );

        } else {

            return in_array( $plugin, (array) get_option( 'active_plugins', array() ) );

        }

    }

}

/**
 * Helper function to clean string from special characters
 *
 * @param     string 
 *
 * @access    public
 * @since     1.0.0
 * @version   1.0.0
 */

if ( ! function_exists( 'ut_remove_trash' ) ) :
	
    function ut_remove_trash( $string ){
        
        return preg_replace( '@[\.,\+\\\\/*-;:<>\?!\[\] ()&%$]@', '', $string );
        
    }

endif;


/**
 *
 * Create Transient String
 * 
 * @param     string - the transient name
 * @param     string - type like css / html etc
 *
 * @since 1.1.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'ut_transient_name' ) ) :

    function ut_transient_name( $name, $type = NULL ) {
        
        $ssl_suffix       = is_ssl() ? '_ssl' : '_no_ssl'; 
        $languages_suffix = defined('ICL_LANGUAGE_CODE') ? '_' . ICL_LANGUAGE_CODE : '';
        $type_suffix      = $type ? '_' . $type : '';
        
        return $name . $ssl_suffix . $languages_suffix . $type_suffix;

    }

endif;

/**
 *
 * Check if WPML is activated
 *
 * @since 1.1.0
 * @version 1.1.0
 *
 */
 
if ( ! function_exists( 'ut_wpml_activated' ) ) :
    
    function ut_wpml_activated() {
        
        if ( defined( 'ICL_SITEPRESS_VERSION' ) || defined('POLYLANG_VERSION') ) {
        
            return true; 
        
        } else { 
        
            return false; 
            
        }        
        
    }
    
endif;

/**
 *
 * Get language defaults
 *
 * @since 1.1.0
 * @version 1.0.0
 *
 */
 
if ( ! function_exists( 'ut_language_defaults' ) ) :
  
    function ut_language_defaults() {
        
        $multilang = array();
        
        if( ut_wpml_activated() ) {

            global $sitepress;
            
            $multilang['default']   = $sitepress->get_default_language();
            $multilang['current']   = $sitepress->get_current_language();
            $multilang['languages'] = $sitepress->get_active_languages();
    
        }
        
        return ( ! empty( $multilang ) ) ? $multilang : false;                
            
    }

endif;

/**
 * Get WPML Unite Theme Options
 *
 * Helper function to return the option value.
 * If value is not available, it returns $default
 *
 * @param     string    The option ID
 * @return    mixed 
 *
 * @access    public
 * @since     1.1.0
 * @version   1.0.0
 */

if ( ! function_exists( 'ut_wpml_filter' ) ) :

    function ut_wpml_filter( $unite_options, $option_id ) {
        
        if( ut_wpml_activated() ) {
            
            if( !is_array( $unite_options[$option_id] ) ) {
                
                $wpml_string = icl_translate( 'Theme Options', $option_id, $unite_options[$option_id] );
                
                if( !empty( $wpml_string ) ) {
                    
                    return $wpml_string;
                    
                }
                
            }
            
            if( is_array( $unite_options[$option_id] ) ) {
                
                foreach( $unite_options[$option_id] as $key => $field ) {
                                        
                    $wpml_string = icl_translate( 'Theme Options', $option_id . '_' .  $key, $field );
                    
                    if( !empty( $wpml_string ) ) {
                        
                        $unite_options[$option_id][$key] = $wpml_string;
                        
                    }                        
                    
                }
            
            }            
            
        }
        
        return $unite_options[$option_id];
        
    }

endif;

/**
 * Get Unite Theme Option
 *
 * Helper function to return the option value.
 * If value is not available, it returns $default
 *
 * @param     string    The option ID
 * @return    mixed 
 *
 * @access    public
 * @since     1.0.0
 * @version   1.1.0
 */
 
if ( ! function_exists( 'ut_get_option' ) ) :

    function ut_get_option( $option_id, $default = false ) {
    
        /* get the saved options */ 
        $unite_options = get_option( ut_options_key() );
        
        /* look for the saved value */
        if ( isset( $unite_options[$option_id] ) ) {
            
            return apply_filters( 'ut_get_option', ut_wpml_filter( $unite_options, $option_id ) );
                
        }
            
        return apply_filters( 'ut_get_option', $default );
    
    }
  
endif;


/**
 * Get Unite Customizer Option
 *
 * Helper function to return the option value.
 * If value is not available, it returns $default
 *
 * @param     string    The option ID
 * @return    mixed 
 *
 * @access    public
 * @since     1.0.0
 * @version   1.1.0
 */
if ( ! function_exists( 'ut_get_customize_option' ) ) :
    
    function ut_get_customize_option( $option_name = '', $default = '' ) {

        $options = apply_filters( 'ut_get_customize_option', get_option( ut_customizer_key() ), $option_name, $default );

        if( ! empty( $option_name ) && ! empty( $options[$option_name] ) ) {
            
            return $options[$option_name];
        
        } else {
            
            return ( ! empty( $default ) ) ? $default : null;

        }

    }
  
endif;

/**
 * Echo Unite Theme Option
 *
 * Helper function to echo the option value.
 * If value is not available, it echos $default
 *
 * @param     string    The option ID
 * @return    mixed 
 *
 * @access    public
 * @since     1.0.0
 * @version   1.0.0
 */

if ( ! function_exists( 'ut_echo_option' ) ) :
  
    function ut_echo_option( $option_id, $default = false ) {
    
        echo ut_get_option( $option_id, $default );
    
    }

endif;



/**
 * Returns true if the current page is a system page
 *
 * Helper function to return the option value.
 * If value is not available, it returns $default
 *
 * @return    bolean
 *
 * @access    public
 * @since     1.0.0
 * @version   1.0.0
 */
 
if ( !function_exists( 'ut_is_page_related' ) ) {
	
    function ut_is_page_related() {
	
		return ( is_404() || is_attachment() || is_search() ) ? true : false;
		
	}
    
}


/**
 * Returns true if the current page is a main blog related page
 *
 * Helper function to return the option value.
 * If value is not available, it returns $default
 *
 * @return    bolean
 *
 * @access    public
 * @since     1.0.0
 * @version   1.0.0
 */
if ( !function_exists( 'ut_is_blog_related' ) ) :
    
    function ut_is_blog_related() {
    
        return ( is_tag() || is_search() || ( is_archive() && !ut_is_shop() ) || is_category() || is_home() || is_404() ) ? true : false;
        
    }
    
endif;


/**
 * Returns true if the current page is a search page with results
 *
 * Helper function to return the option value.
 * If value is not available, it returns $default
 *
 * @return    bolean
 *
 * @access    public
 * @since     4.2.3
 * @version   1.0.0
 */
if ( !function_exists( 'ut_is_search' ) ) :
    
    function ut_is_search() {
    
        return ( is_search() && have_posts() ) ? true : false;
        
    }
    
endif;



/**
 * Get Unite Meta Value
 *
 * Helper function to return the option value.
 * If value is not available, it returns $default
 *
 * @param     string    The option ID
 * @param     int       The Post ID ( optional )
 * @return    mixed 
 *
 * @access    public
 * @since     1.0.0
 * @version   1.0.0
 */
if( !function_exists( 'ut_get_meta' ) ) :

    function ut_get_meta( $key = '', $post_id = NULL ) {
        
        if( empty( $key ) ) {
            return;
        }          
        
        if( empty( $post_id ) && ut_is_blog_related() ) {
            
            $post_id = get_option('page_for_posts');
            
        }
        
        if( empty( $post_id ) && is_front_page() ) {
            
            $post_id = get_option('page_on_front');
            
        }
        
        
        if( empty( $post_id )  && ut_is_blog_related() ) {
            
            return false;
        
        } elseif( !empty( $post_id ) ) {
            
            return get_post_meta( $post_id, $key, true );
            
        } else {
        
            global $post;
            
            return isset( $post->ID ) ? get_post_meta( $post->ID, $key, true ) : false;

        }               
        
    }
        
endif;

/**
 * Returns an array with the current sidebar settings
 *
 * @return    array
 *
 * @access    public
 * @since     1.0.0
 * @version   1.1.0
 */
if( !function_exists( 'ut_get_sidebar_settings' ) && apply_filters( 'ut_activate_sidebars', true ) ) {

	function ut_get_sidebar_settings() {
        
        global $post;
        
        /* define settings array */
        $sidebar_settings = array();
                
        /* try to fetch sidebar alignment */
        $ut_sidebar_align = !ut_is_blog_related() ? ut_get_meta( 'ut_sidebar_align' ) : NULL;
                                               
        /* default setting from sidebar admin */
        if( $ut_sidebar_align == 'default' || empty( $ut_sidebar_align ) ) {            
            
            /* blog default align */
            if( ut_is_blog_related() || is_404() ) {
            
                /* default align from admin */
                $sidebar_settings['align'] = get_option( 'unite_blog_sidebar_align' );
            
            }
            
            if( is_single() ) {
                
                /* default align from admin */
                $sidebar_settings['align'] = get_option( 'unite_blog_single_sidebar_align' );
                
            }
                        
            /* page default align */
            if( is_page() ) {
                
                /* default align from admin */
                $sidebar_settings['align'] = get_option( 'unite_page_sidebar_align' );
                
            }
                        
            /* woocommerce default sidebar align */
            if( function_exists('is_shop') ) {
			
			    if( is_shop() ) {
                    
                    /* default align from admin */
                    $sidebar_settings['align'] = get_option('unite_woo_sidebar_align');
                    
                }
            
            }
        
        } else {
            
            /* set align */
            $sidebar_settings['align'] = $ut_sidebar_align;
        
        }
        
        /* primary sidebar */
        $primary_sidebar = !ut_is_blog_related() ? ut_get_meta( 'ut_primary_sidebar' ) : NULL;
                
        if( empty( $primary_sidebar ) && $ut_sidebar_align != 'none' ) {
            
            /* blog default sidebar */
            if( ut_is_blog_related() || is_404() ) {
            
                /* default sidebar from admin */
                $primary_sidebar = get_option( 'unite_blog_primary_sidebar' );
            
            }
            
            if( is_single() ) {
                
                /* default sidebar from admin */
                $primary_sidebar = get_option( 'unite_blog_single_primary_sidebar' );
                
            }
                        
            /* page default sidebar */
            if( is_page() ) {
                
                /* default sidebar from admin */
                $primary_sidebar = get_option( 'unite_page_primary_sidebar' );
                
            }
                        
            /* woocommerce default sidebar */
            if( function_exists('is_shop') ) {
			
			    if( is_shop() ) {
                    
                    /* default sidebar from admin */
                    $primary_sidebar = get_option('unite_woo_primary_sidebar');
                    
                }
            
            }
            
        }       
        
        if( apply_filters( 'ut_activate_secondary_sidebar', false ) ) {
        
            /* secondary sidebar */
            $secondary_sidebar = !ut_is_blog_related() ? ut_get_meta( 'ut_secondary_sidebar' ) : NULL;
            
            if( empty( $secondary_sidebar ) && $ut_sidebar_align != 'none' ) {
                
                /* blog default secondary sidebar */
                if( ut_is_blog_related() || is_404() ) {
                
                    /* default sidebar from admin */
                    $secondary_sidebar = get_option( 'unite_blog_secondary_sidebar' );
                
                }
                
                if( is_single() ) {
                    
                    /* default sidebar from admin */
                    $secondary_sidebar = get_option( 'unite_blog_single_secondary_sidebar' );
                    
                }
                            
                /* page default align */
                if( is_page() ) {
                    
                    /* default sidebar from admin */
                    $secondary_sidebar = get_option( 'unite_page_secondary_sidebar' );
                    
                }
                            
                /* woocommerce default sidebar */
                if( function_exists('is_shop') ) {
                
                    if( is_shop() ) {
                        
                        /* default sidebar from admin */
                        $secondary_sidebar = get_option('unite_woo_secondary_sidebar');
                        
                    }
                
                }
                
            } 
        
        } else {
            
            $secondary_sidebar = $primary_sidebar;
            
        }
        
        /* set a flag if sidebars have widgets or not */
        $sidebar_settings['primary_active']   = is_active_sidebar( apply_filters( 'unite_primary_sidebar', $primary_sidebar ) );
        $sidebar_settings['secondary_active'] = is_active_sidebar( apply_filters( 'unite_secondary_sidebar', $secondary_sidebar ) );
        
        /* push the selected sidebars into array */
        $sidebar_settings['primary_sidebar']   = apply_filters( 'unite_primary_sidebar', $primary_sidebar );
        $sidebar_settings['secondary_sidebar'] = apply_filters( 'unite_secondary_sidebar', $secondary_sidebar ); 
        
        /* push the sidebar align into array */
        $sidebar_settings['align'] = apply_filters( 'unite_sidebar_align', isset( $sidebar_settings['align'] ) ? $sidebar_settings['align'] : '' ); 
        
        /* now return the complete sidebar settings */
        return $sidebar_settings;        
            
    }

}


/**
 * Return an array with google fonts 
 *
 * @return    array    array with google fonts
 *
 * @access    public
 * @since     1.0.0
 * @version   1.3.0
 */
if ( ! function_exists( 'ut_recognized_google_fonts' ) ) {
  
  	function ut_recognized_google_fonts( $field_id = '' ) {
        
        static $google_font_cache = NULL;
        
        if ( is_null( $google_font_cache ) ) {

            $google_font_cache = json_decode( include( THEME_DOCUMENT_ROOT . '/unite/core/admin/assets/google/google_fonts.php' ) , true);
 
        }        
        
        return $google_font_cache;        
        
	}

}


/**
 * Return an array with available icons
 *
 * @return    array    array with icons
 *
 * @access    public
 * @since     1.0.0
 * @version   1.1.0
 */
if ( !function_exists( 'ut_recognized_icons' ) ) {

    function ut_recognized_icons() {
                
        // font awesome 4.7.0
        $icons = array (
			0 => 'fa-500px',
			1 => 'fa-address-book',
			2 => 'fa-address-book-o',
			3 => 'fa-address-card',
			4 => 'fa-address-card-o',
			5 => 'fa-adjust',
			6 => 'fa-adn',
			7 => 'fa-align-center',
			8 => 'fa-align-justify',
			9 => 'fa-align-left',
			10 => 'fa-align-right',
			11 => 'fa-amazon',
			12 => 'fa-ambulance',
			13 => 'fa-american-sign-language-interpreting',
			14 => 'fa-anchor',
			15 => 'fa-android',
			16 => 'fa-angellist',
			17 => 'fa-angle-double-down',
			18 => 'fa-angle-double-left',
			19 => 'fa-angle-double-right',
			20 => 'fa-angle-double-up',
			21 => 'fa-angle-down',
			22 => 'fa-angle-left',
			23 => 'fa-angle-right',
			24 => 'fa-angle-up',
			25 => 'fa-apple',
			26 => 'fa-archive',
			27 => 'fa-area-chart',
			28 => 'fa-arrow-circle-down',
			29 => 'fa-arrow-circle-left',
			30 => 'fa-arrow-circle-o-down',
			31 => 'fa-arrow-circle-o-left',
			32 => 'fa-arrow-circle-o-right',
			33 => 'fa-arrow-circle-o-up',
			34 => 'fa-arrow-circle-right',
			35 => 'fa-arrow-circle-up',
			36 => 'fa-arrow-down',
			37 => 'fa-arrow-left',
			38 => 'fa-arrow-right',
			39 => 'fa-arrow-up',
			40 => 'fa-arrows',
			41 => 'fa-arrows-alt',
			42 => 'fa-arrows-h',
			43 => 'fa-arrows-v',
			44 => 'fa-asl-interpreting',
			45 => 'fa-assistive-listening-systems',
			46 => 'fa-asterisk',
			47 => 'fa-at',
			48 => 'fa-audio-description',
			49 => 'fa-automobile',
			50 => 'fa-backward',
			51 => 'fa-balance-scale',
			52 => 'fa-ban',
			53 => 'fa-bandcamp',
			54 => 'fa-bank',
			55 => 'fa-bar-chart',
			56 => 'fa-bar-chart-o',
			57 => 'fa-barcode',
			58 => 'fa-bars',
			59 => 'fa-bath',
			60 => 'fa-bathtub',
			61 => 'fa-battery',
			62 => 'fa-battery-0',
			63 => 'fa-battery-1',
			64 => 'fa-battery-2',
			65 => 'fa-battery-3',
			66 => 'fa-battery-4',
			67 => 'fa-battery-empty',
			68 => 'fa-battery-full',
			69 => 'fa-battery-half',
			70 => 'fa-battery-quarter',
			71 => 'fa-battery-three-quarters',
			72 => 'fa-bed',
			73 => 'fa-beer',
			74 => 'fa-behance',
			75 => 'fa-behance-square',
			76 => 'fa-bell',
			77 => 'fa-bell-o',
			78 => 'fa-bell-slash',
			79 => 'fa-bell-slash-o',
			80 => 'fa-bicycle',
			81 => 'fa-binoculars',
			82 => 'fa-birthday-cake',
			83 => 'fa-bitbucket',
			84 => 'fa-bitbucket-square',
			85 => 'fa-bitcoin',
			86 => 'fa-black-tie',
			87 => 'fa-blind',
			88 => 'fa-bluetooth',
			89 => 'fa-bluetooth-b',
			90 => 'fa-bold',
			91 => 'fa-bolt',
			92 => 'fa-bomb',
			93 => 'fa-book',
			94 => 'fa-bookmark',
			95 => 'fa-bookmark-o',
			96 => 'fa-braille',
			97 => 'fa-briefcase',
			98 => 'fa-btc',
			99 => 'fa-bug',
			100 => 'fa-building',
			101 => 'fa-building-o',
			102 => 'fa-bullhorn',
			103 => 'fa-bullseye',
			104 => 'fa-bus',
			105 => 'fa-buysellads',
			106 => 'fa-cab',
			107 => 'fa-calculator',
			108 => 'fa-calendar',
			109 => 'fa-calendar-check-o',
			110 => 'fa-calendar-minus-o',
			111 => 'fa-calendar-o',
			112 => 'fa-calendar-plus-o',
			113 => 'fa-calendar-times-o',
			114 => 'fa-camera',
			115 => 'fa-camera-retro',
			116 => 'fa-car',
			117 => 'fa-caret-down',
			118 => 'fa-caret-left',
			119 => 'fa-caret-right',
			120 => 'fa-caret-square-o-down',
			121 => 'fa-caret-square-o-left',
			122 => 'fa-caret-square-o-right',
			123 => 'fa-caret-square-o-up',
			124 => 'fa-caret-up',
			125 => 'fa-cart-arrow-down',
			126 => 'fa-cart-plus',
			127 => 'fa-cc',
			128 => 'fa-cc-amex',
			129 => 'fa-cc-diners-club',
			130 => 'fa-cc-discover',
			131 => 'fa-cc-jcb',
			132 => 'fa-cc-mastercard',
			133 => 'fa-cc-paypal',
			134 => 'fa-cc-stripe',
			135 => 'fa-cc-visa',
			136 => 'fa-certificate',
			137 => 'fa-chain',
			138 => 'fa-chain-broken',
			139 => 'fa-check',
			140 => 'fa-check-circle',
			141 => 'fa-check-circle-o',
			142 => 'fa-check-square',
			143 => 'fa-check-square-o',
			144 => 'fa-chevron-circle-down',
			145 => 'fa-chevron-circle-left',
			146 => 'fa-chevron-circle-right',
			147 => 'fa-chevron-circle-up',
			148 => 'fa-chevron-down',
			149 => 'fa-chevron-left',
			150 => 'fa-chevron-right',
			151 => 'fa-chevron-up',
			152 => 'fa-child',
			153 => 'fa-chrome',
			154 => 'fa-circle',
			155 => 'fa-circle-o',
			156 => 'fa-circle-o-notch',
			157 => 'fa-circle-thin',
			158 => 'fa-clipboard',
			159 => 'fa-clock-o',
			160 => 'fa-clone',
			161 => 'fa-close',
			162 => 'fa-cloud',
			163 => 'fa-cloud-download',
			164 => 'fa-cloud-upload',
			165 => 'fa-cny',
			166 => 'fa-code',
			167 => 'fa-code-fork',
			168 => 'fa-codepen',
			169 => 'fa-codiepie',
			170 => 'fa-coffee',
			171 => 'fa-cog',
			172 => 'fa-cogs',
			173 => 'fa-columns',
			174 => 'fa-comment',
			175 => 'fa-comment-o',
			176 => 'fa-commenting',
			177 => 'fa-commenting-o',
			178 => 'fa-comments',
			179 => 'fa-comments-o',
			180 => 'fa-compass',
			181 => 'fa-compress',
			182 => 'fa-connectdevelop',
			183 => 'fa-contao',
			184 => 'fa-copy',
			185 => 'fa-copyright',
			186 => 'fa-creative-commons',
			187 => 'fa-credit-card',
			188 => 'fa-credit-card-alt',
			189 => 'fa-crop',
			190 => 'fa-crosshairs',
			191 => 'fa-css3',
			192 => 'fa-cube',
			193 => 'fa-cubes',
			194 => 'fa-cut',
			195 => 'fa-cutlery',
			196 => 'fa-dashboard',
			197 => 'fa-dashcube',
			198 => 'fa-database',
			199 => 'fa-deaf',
			200 => 'fa-deafness',
			201 => 'fa-dedent',
			202 => 'fa-delicious',
			203 => 'fa-desktop',
			204 => 'fa-deviantart',
			205 => 'fa-diamond',
			206 => 'fa-digg',
			207 => 'fa-dollar',
			208 => 'fa-dot-circle-o',
			209 => 'fa-download',
			210 => 'fa-dribbble',
			211 => 'fa-drivers-license',
			212 => 'fa-drivers-license-o',
			213 => 'fa-dropbox',
			214 => 'fa-drupal',
			215 => 'fa-edge',
			216 => 'fa-edit',
			217 => 'fa-eercast',
			218 => 'fa-eject',
			219 => 'fa-ellipsis-h',
			220 => 'fa-ellipsis-v',
			221 => 'fa-empire',
			222 => 'fa-envelope',
			223 => 'fa-envelope-o',
			224 => 'fa-envelope-open',
			225 => 'fa-envelope-open-o',
			226 => 'fa-envelope-square',
			227 => 'fa-envira',
			228 => 'fa-eraser',
			229 => 'fa-etsy',
			230 => 'fa-eur',
			231 => 'fa-euro',
			232 => 'fa-exchange',
			233 => 'fa-exclamation',
			234 => 'fa-exclamation-circle',
			235 => 'fa-exclamation-triangle',
			236 => 'fa-expand',
			237 => 'fa-expeditedssl',
			238 => 'fa-external-link',
			239 => 'fa-external-link-square',
			240 => 'fa-eye',
			241 => 'fa-eye-slash',
			242 => 'fa-eyedropper',
			243 => 'fa-fa',
			244 => 'fa-facebook',
			245 => 'fa-facebook-f',
			246 => 'fa-facebook-official',
			247 => 'fa-facebook-square',
			248 => 'fa-fast-backward',
			249 => 'fa-fast-forward',
			250 => 'fa-fax',
			251 => 'fa-feed',
			252 => 'fa-female',
			253 => 'fa-fighter-jet',
			254 => 'fa-file',
			255 => 'fa-file-archive-o',
			256 => 'fa-file-audio-o',
			257 => 'fa-file-code-o',
			258 => 'fa-file-excel-o',
			259 => 'fa-file-image-o',
			260 => 'fa-file-movie-o',
			261 => 'fa-file-o',
			262 => 'fa-file-pdf-o',
			263 => 'fa-file-photo-o',
			264 => 'fa-file-picture-o',
			265 => 'fa-file-powerpoint-o',
			266 => 'fa-file-sound-o',
			267 => 'fa-file-text',
			268 => 'fa-file-text-o',
			269 => 'fa-file-video-o',
			270 => 'fa-file-word-o',
			271 => 'fa-file-zip-o',
			272 => 'fa-files-o',
			273 => 'fa-film',
			274 => 'fa-filter',
			275 => 'fa-fire',
			276 => 'fa-fire-extinguisher',
			277 => 'fa-firefox',
			278 => 'fa-first-order',
			279 => 'fa-flag',
			280 => 'fa-flag-checkered',
			281 => 'fa-flag-o',
			282 => 'fa-flash',
			283 => 'fa-flask',
			284 => 'fa-flickr',
			285 => 'fa-floppy-o',
			286 => 'fa-folder',
			287 => 'fa-folder-o',
			288 => 'fa-folder-open',
			289 => 'fa-folder-open-o',
			290 => 'fa-font',
			291 => 'fa-font-awesome',
			292 => 'fa-fonticons',
			293 => 'fa-fort-awesome',
			294 => 'fa-forumbee',
			295 => 'fa-forward',
			296 => 'fa-foursquare',
			297 => 'fa-free-code-camp',
			298 => 'fa-frown-o',
			299 => 'fa-futbol-o',
			300 => 'fa-gamepad',
			301 => 'fa-gavel',
			302 => 'fa-gbp',
			303 => 'fa-ge',
			304 => 'fa-gear',
			305 => 'fa-gears',
			306 => 'fa-genderless',
			307 => 'fa-get-pocket',
			308 => 'fa-gg',
			309 => 'fa-gg-circle',
			310 => 'fa-gift',
			311 => 'fa-git',
			312 => 'fa-git-square',
			313 => 'fa-github',
			314 => 'fa-github-alt',
			315 => 'fa-github-square',
			316 => 'fa-gitlab',
			317 => 'fa-gittip',
			318 => 'fa-glass',
			319 => 'fa-glide',
			320 => 'fa-glide-g',
			321 => 'fa-globe',
			322 => 'fa-google',
			323 => 'fa-google-plus',
			324 => 'fa-google-plus-circle',
			325 => 'fa-google-plus-official',
			326 => 'fa-google-plus-square',
			327 => 'fa-google-wallet',
			328 => 'fa-graduation-cap',
			329 => 'fa-gratipay',
			330 => 'fa-grav',
			331 => 'fa-group',
			332 => 'fa-h-square',
			333 => 'fa-hacker-news',
			334 => 'fa-hand-grab-o',
			335 => 'fa-hand-lizard-o',
			336 => 'fa-hand-o-down',
			337 => 'fa-hand-o-left',
			338 => 'fa-hand-o-right',
			339 => 'fa-hand-o-up',
			340 => 'fa-hand-paper-o',
			341 => 'fa-hand-peace-o',
			342 => 'fa-hand-pointer-o',
			343 => 'fa-hand-rock-o',
			344 => 'fa-hand-scissors-o',
			345 => 'fa-hand-spock-o',
			346 => 'fa-hand-stop-o',
			347 => 'fa-handshake-o',
			348 => 'fa-hard-of-hearing',
			349 => 'fa-hashtag',
			350 => 'fa-hdd-o',
			351 => 'fa-header',
			352 => 'fa-headphones',
			353 => 'fa-heart',
			354 => 'fa-heart-o',
			355 => 'fa-heartbeat',
			356 => 'fa-history',
			357 => 'fa-home',
			358 => 'fa-hospital-o',
			359 => 'fa-hotel',
			360 => 'fa-hourglass',
			361 => 'fa-hourglass-1',
			362 => 'fa-hourglass-2',
			363 => 'fa-hourglass-3',
			364 => 'fa-hourglass-end',
			365 => 'fa-hourglass-half',
			366 => 'fa-hourglass-o',
			367 => 'fa-hourglass-start',
			368 => 'fa-houzz',
			369 => 'fa-html5',
			370 => 'fa-i-cursor',
			371 => 'fa-id-badge',
			372 => 'fa-id-card',
			373 => 'fa-id-card-o',
			374 => 'fa-ils',
			375 => 'fa-image',
			376 => 'fa-imdb',
			377 => 'fa-inbox',
			378 => 'fa-indent',
			379 => 'fa-industry',
			380 => 'fa-info',
			381 => 'fa-info-circle',
			382 => 'fa-inr',
			383 => 'fa-instagram',
			384 => 'fa-institution',
			385 => 'fa-internet-explorer',
			386 => 'fa-intersex',
			387 => 'fa-ioxhost',
			388 => 'fa-italic',
			389 => 'fa-joomla',
			390 => 'fa-jpy',
			391 => 'fa-jsfiddle',
			392 => 'fa-key',
			393 => 'fa-keyboard-o',
			394 => 'fa-krw',
			395 => 'fa-language',
			396 => 'fa-laptop',
			397 => 'fa-lastfm',
			398 => 'fa-lastfm-square',
			399 => 'fa-leaf',
			400 => 'fa-leanpub',
			401 => 'fa-legal',
			402 => 'fa-lemon-o',
			403 => 'fa-level-down',
			404 => 'fa-level-up',
			405 => 'fa-life-bouy',
			406 => 'fa-life-buoy',
			407 => 'fa-life-ring',
			408 => 'fa-life-saver',
			409 => 'fa-lightbulb-o',
			410 => 'fa-line-chart',
			411 => 'fa-link',
			412 => 'fa-linkedin',
			413 => 'fa-linkedin-square',
			414 => 'fa-linode',
			415 => 'fa-linux',
			416 => 'fa-list',
			417 => 'fa-list-alt',
			418 => 'fa-list-ol',
			419 => 'fa-list-ul',
			420 => 'fa-location-arrow',
			421 => 'fa-lock',
			422 => 'fa-long-arrow-down',
			423 => 'fa-long-arrow-left',
			424 => 'fa-long-arrow-right',
			425 => 'fa-long-arrow-up',
			426 => 'fa-low-vision',
			427 => 'fa-magic',
			428 => 'fa-magnet',
			429 => 'fa-mail-forward',
			430 => 'fa-mail-reply',
			431 => 'fa-mail-reply-all',
			432 => 'fa-male',
			433 => 'fa-map',
			434 => 'fa-map-marker',
			435 => 'fa-map-o',
			436 => 'fa-map-pin',
			437 => 'fa-map-signs',
			438 => 'fa-mars',
			439 => 'fa-mars-double',
			440 => 'fa-mars-stroke',
			441 => 'fa-mars-stroke-h',
			442 => 'fa-mars-stroke-v',
			443 => 'fa-maxcdn',
			444 => 'fa-meanpath',
			445 => 'fa-medium',
			446 => 'fa-medkit',
			447 => 'fa-meetup',
			448 => 'fa-meh-o',
			449 => 'fa-mercury',
			450 => 'fa-microchip',
			451 => 'fa-microphone',
			452 => 'fa-microphone-slash',
			453 => 'fa-minus',
			454 => 'fa-minus-circle',
			455 => 'fa-minus-square',
			456 => 'fa-minus-square-o',
			457 => 'fa-mixcloud',
			458 => 'fa-mobile',
			459 => 'fa-mobile-phone',
			460 => 'fa-modx',
			461 => 'fa-money',
			462 => 'fa-moon-o',
			463 => 'fa-mortar-board',
			464 => 'fa-motorcycle',
			465 => 'fa-mouse-pointer',
			466 => 'fa-music',
			467 => 'fa-navicon',
			468 => 'fa-neuter',
			469 => 'fa-newspaper-o',
			470 => 'fa-object-group',
			471 => 'fa-object-ungroup',
			472 => 'fa-odnoklassniki',
			473 => 'fa-odnoklassniki-square',
			474 => 'fa-opencart',
			475 => 'fa-openid',
			476 => 'fa-opera',
			477 => 'fa-optin-monster',
			478 => 'fa-outdent',
			479 => 'fa-pagelines',
			480 => 'fa-paint-brush',
			481 => 'fa-paper-plane',
			482 => 'fa-paper-plane-o',
			483 => 'fa-paperclip',
			484 => 'fa-paragraph',
			485 => 'fa-paste',
			486 => 'fa-pause',
			487 => 'fa-pause-circle',
			488 => 'fa-pause-circle-o',
			489 => 'fa-paw',
			490 => 'fa-paypal',
			491 => 'fa-pencil',
			492 => 'fa-pencil-square',
			493 => 'fa-pencil-square-o',
			494 => 'fa-percent',
			495 => 'fa-phone',
			496 => 'fa-phone-square',
			497 => 'fa-photo',
			498 => 'fa-picture-o',
			499 => 'fa-pie-chart',
			500 => 'fa-pied-piper',
			501 => 'fa-pied-piper-alt',
			502 => 'fa-pied-piper-pp',
			503 => 'fa-pinterest',
			504 => 'fa-pinterest-p',
			505 => 'fa-pinterest-square',
			506 => 'fa-plane',
			507 => 'fa-play',
			508 => 'fa-play-circle',
			509 => 'fa-play-circle-o',
			510 => 'fa-plug',
			511 => 'fa-plus',
			512 => 'fa-plus-circle',
			513 => 'fa-plus-square',
			514 => 'fa-plus-square-o',
			515 => 'fa-podcast',
			516 => 'fa-power-off',
			517 => 'fa-print',
			518 => 'fa-product-hunt',
			519 => 'fa-puzzle-piece',
			520 => 'fa-qq',
			521 => 'fa-qrcode',
			522 => 'fa-question',
			523 => 'fa-question-circle',
			524 => 'fa-question-circle-o',
			525 => 'fa-quora',
			526 => 'fa-quote-left',
			527 => 'fa-quote-right',
			528 => 'fa-ra',
			529 => 'fa-random',
			530 => 'fa-ravelry',
			531 => 'fa-rebel',
			532 => 'fa-recycle',
			533 => 'fa-reddit',
			534 => 'fa-reddit-alien',
			535 => 'fa-reddit-square',
			536 => 'fa-refresh',
			537 => 'fa-registered',
			538 => 'fa-remove',
			539 => 'fa-renren',
			540 => 'fa-reorder',
			541 => 'fa-repeat',
			542 => 'fa-reply',
			543 => 'fa-reply-all',
			544 => 'fa-resistance',
			545 => 'fa-retweet',
			546 => 'fa-rmb',
			547 => 'fa-road',
			548 => 'fa-rocket',
			549 => 'fa-rotate-left',
			550 => 'fa-rotate-right',
			551 => 'fa-rouble',
			552 => 'fa-rss',
			553 => 'fa-rss-square',
			554 => 'fa-rub',
			555 => 'fa-ruble',
			556 => 'fa-rupee',
			557 => 'fa-s15',
			558 => 'fa-safari',
			559 => 'fa-save',
			560 => 'fa-scissors',
			561 => 'fa-scribd',
			562 => 'fa-search',
			563 => 'fa-search-minus',
			564 => 'fa-search-plus',
			565 => 'fa-sellsy',
			566 => 'fa-send',
			567 => 'fa-send-o',
			568 => 'fa-server',
			569 => 'fa-share',
			570 => 'fa-share-alt',
			571 => 'fa-share-alt-square',
			572 => 'fa-share-square',
			573 => 'fa-share-square-o',
			574 => 'fa-shekel',
			575 => 'fa-sheqel',
			576 => 'fa-shield',
			577 => 'fa-ship',
			578 => 'fa-shirtsinbulk',
			579 => 'fa-shopping-bag',
			580 => 'fa-shopping-basket',
			581 => 'fa-shopping-cart',
			582 => 'fa-shower',
			583 => 'fa-sign-in',
			584 => 'fa-sign-language',
			585 => 'fa-sign-out',
			586 => 'fa-signal',
			587 => 'fa-signing',
			588 => 'fa-simplybuilt',
			589 => 'fa-sitemap',
			590 => 'fa-skyatlas',
			591 => 'fa-skype',
			592 => 'fa-slack',
			593 => 'fa-sliders',
			594 => 'fa-slideshare',
			595 => 'fa-smile-o',
			596 => 'fa-snapchat',
			597 => 'fa-snapchat-ghost',
			598 => 'fa-snapchat-square',
			599 => 'fa-snowflake-o',
			600 => 'fa-soccer-ball-o',
			601 => 'fa-sort',
			602 => 'fa-sort-alpha-asc',
			603 => 'fa-sort-alpha-desc',
			604 => 'fa-sort-amount-asc',
			605 => 'fa-sort-amount-desc',
			606 => 'fa-sort-asc',
			607 => 'fa-sort-desc',
			608 => 'fa-sort-down',
			609 => 'fa-sort-numeric-asc',
			610 => 'fa-sort-numeric-desc',
			611 => 'fa-sort-up',
			612 => 'fa-soundcloud',
			613 => 'fa-space-shuttle',
			614 => 'fa-spinner',
			615 => 'fa-spoon',
			616 => 'fa-spotify',
			617 => 'fa-square',
			618 => 'fa-square-o',
			619 => 'fa-stack-exchange',
			620 => 'fa-stack-overflow',
			621 => 'fa-star',
			622 => 'fa-star-half',
			623 => 'fa-star-half-empty',
			624 => 'fa-star-half-full',
			625 => 'fa-star-half-o',
			626 => 'fa-star-o',
			627 => 'fa-steam',
			628 => 'fa-steam-square',
			629 => 'fa-step-backward',
			630 => 'fa-step-forward',
			631 => 'fa-stethoscope',
			632 => 'fa-sticky-note',
			633 => 'fa-sticky-note-o',
			634 => 'fa-stop',
			635 => 'fa-stop-circle',
			636 => 'fa-stop-circle-o',
			637 => 'fa-street-view',
			638 => 'fa-strikethrough',
			639 => 'fa-stumbleupon',
			640 => 'fa-stumbleupon-circle',
			641 => 'fa-subscript',
			642 => 'fa-subway',
			643 => 'fa-suitcase',
			644 => 'fa-sun-o',
			645 => 'fa-superpowers',
			646 => 'fa-superscript',
			647 => 'fa-support',
			648 => 'fa-table',
			649 => 'fa-tablet',
			650 => 'fa-tachometer',
			651 => 'fa-tag',
			652 => 'fa-tags',
			653 => 'fa-tasks',
			654 => 'fa-taxi',
			655 => 'fa-telegram',
			656 => 'fa-television',
			657 => 'fa-tencent-weibo',
			658 => 'fa-terminal',
			659 => 'fa-text-height',
			660 => 'fa-text-width',
			661 => 'fa-th',
			662 => 'fa-th-large',
			663 => 'fa-th-list',
			664 => 'fa-themeisle',
			665 => 'fa-thermometer',
			666 => 'fa-thermometer-0',
			667 => 'fa-thermometer-1',
			668 => 'fa-thermometer-2',
			669 => 'fa-thermometer-3',
			670 => 'fa-thermometer-4',
			671 => 'fa-thermometer-empty',
			672 => 'fa-thermometer-full',
			673 => 'fa-thermometer-half',
			674 => 'fa-thermometer-quarter',
			675 => 'fa-thermometer-three-quarters',
			676 => 'fa-thumb-tack',
			677 => 'fa-thumbs-down',
			678 => 'fa-thumbs-o-down',
			679 => 'fa-thumbs-o-up',
			680 => 'fa-thumbs-up',
			681 => 'fa-ticket',
			682 => 'fa-times',
			683 => 'fa-times-circle',
			684 => 'fa-times-circle-o',
			685 => 'fa-times-rectangle',
			686 => 'fa-times-rectangle-o',
			687 => 'fa-tint',
			688 => 'fa-toggle-down',
			689 => 'fa-toggle-left',
			690 => 'fa-toggle-off',
			691 => 'fa-toggle-on',
			692 => 'fa-toggle-right',
			693 => 'fa-toggle-up',
			694 => 'fa-trademark',
			695 => 'fa-train',
			696 => 'fa-transgender',
			697 => 'fa-transgender-alt',
			698 => 'fa-trash',
			699 => 'fa-trash-o',
			700 => 'fa-tree',
			701 => 'fa-trello',
			702 => 'fa-tripadvisor',
			703 => 'fa-trophy',
			704 => 'fa-truck',
			705 => 'fa-try',
			706 => 'fa-tty',
			707 => 'fa-tumblr',
			708 => 'fa-tumblr-square',
			709 => 'fa-turkish-lira',
			710 => 'fa-tv',
			711 => 'fa-twitch',
			712 => 'fa-twitter',
			713 => 'fa-twitter-square',
			714 => 'fa-umbrella',
			715 => 'fa-underline',
			716 => 'fa-undo',
			717 => 'fa-universal-access',
			718 => 'fa-university',
			719 => 'fa-unlink',
			720 => 'fa-unlock',
			721 => 'fa-unlock-alt',
			722 => 'fa-unsorted',
			723 => 'fa-upload',
			724 => 'fa-usb',
			725 => 'fa-usd',
			726 => 'fa-user',
			727 => 'fa-user-circle',
			728 => 'fa-user-circle-o',
			729 => 'fa-user-md',
			730 => 'fa-user-o',
			731 => 'fa-user-plus',
			732 => 'fa-user-secret',
			733 => 'fa-user-times',
			734 => 'fa-users',
			735 => 'fa-vcard',
			736 => 'fa-vcard-o',
			737 => 'fa-venus',
			738 => 'fa-venus-double',
			739 => 'fa-venus-mars',
			740 => 'fa-viacoin',
			741 => 'fa-viadeo',
			742 => 'fa-viadeo-square',
			743 => 'fa-video-camera',
			744 => 'fa-vimeo',
			745 => 'fa-vimeo-square',
			746 => 'fa-vine',
			747 => 'fa-vk',
			748 => 'fa-volume-control-phone',
			749 => 'fa-volume-down',
			750 => 'fa-volume-off',
			751 => 'fa-volume-up',
			752 => 'fa-warning',
			753 => 'fa-wechat',
			754 => 'fa-weibo',
			755 => 'fa-weixin',
			756 => 'fa-whatsapp',
			757 => 'fa-wheelchair',
			758 => 'fa-wheelchair-alt',
			759 => 'fa-wifi',
			760 => 'fa-wikipedia-w',
			761 => 'fa-window-close',
			762 => 'fa-window-close-o',
			763 => 'fa-window-maximize',
			764 => 'fa-window-minimize',
			765 => 'fa-window-restore',
			766 => 'fa-windows',
			767 => 'fa-won',
			768 => 'fa-wordpress',
			769 => 'fa-wpbeginner',
			770 => 'fa-wpexplorer',
			771 => 'fa-wpforms',
			772 => 'fa-wrench',
			773 => 'fa-xing',
			774 => 'fa-xing-square',
			775 => 'fa-y-combinator',
			776 => 'fa-y-combinator-square',
			777 => 'fa-yahoo',
			778 => 'fa-yc',
			779 => 'fa-yc-square',
			780 => 'fa-yelp',
			781 => 'fa-yen',
			782 => 'fa-yoast',
			783 => 'fa-youtube',
			784 => 'fa-youtube-play',
			785 => 'fa-youtube-square',
        );
        
        return apply_filters( 'ut_recognized_icons', $icons );
        
    } 

}


/**
 * Initializes Meta Boxes
 *
 * @return    void
 *
 * @access    public
 * @since     1.0.0
 * @version   1.0.0
 */
 
if ( !function_exists( 'ut_initialize_metabox' ) ) {

    function ut_initialize_metabox( $metabox_settings ) {
        
        if( empty( $metabox_settings ) || !is_admin() ) {
            return;
        }
        
        $unite_meta_box = new UT_Metabox( $metabox_settings );        
        
    }

}


/**
 * Helper Function: to detect already installed plugin
 *
 * @since 1.0
 */

if ( !function_exists( 'ut_is_plugin_active' ) ) {
    
    function ut_is_plugin_active( $plugin ) {
        
        if( is_multisite() && array_key_exists( $plugin , get_site_option('active_sitewide_plugins', array() ) ) ) {
                        
            return array_key_exists( $plugin , get_site_option('active_sitewide_plugins', array() ) );
            
        } elseif( is_multisite() && in_array( $plugin, (array) get_option( 'active_plugins', array() ) ) ) {
                        
            return in_array( $plugin, (array) get_option( 'active_plugins', array() ) );
            
        } else {
            
            return in_array( $plugin, (array) get_option( 'active_plugins', array() ) );
            
        }        
        
    }
    
}

/**
 * Get Option.
 *
 * Helper function to return the option value.
 * If no value has been saved, it returns $default.
 *
 * @param     string    The option ID.
 * @param     string    The default option value.
 * @return    mixed
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_get_option' ) ) {

  function ot_get_option( $option_id, $default = '' ) {

    $option_id = apply_filters( 'ot_get_option_filter', $option_id );

    /* get the saved options */ 
    $options = get_option( 'option_tree' );
    
    /* look for the saved value */
    if ( isset( $options[$option_id] ) && '' != $options[$option_id] ) {
        
		return ot_wpml_filter( $options, $option_id );
            
    }
    
    return $default;
    
  }
  
}

/**
 * Filter the return values through WPML
 *
 * @param     array     $options The current options    
 * @param     string    $option_id The option ID
 * @return    mixed
 *
 * @access    public
 * @since     2.1
 */
if ( !function_exists( 'ot_wpml_filter' ) ) {

	function ot_wpml_filter( $options, $option_id ) {

		// nothing to do here
		if( !ut_wpml_activated() || !function_exists('icl_t') ) {
			return $options[$option_id];
		}

		static $_ut_theme_options;

		if( empty( $_ut_theme_options ) ) {

		    $_ut_theme_options = _ut_theme_options();

        }

		if ( isset( $_ut_theme_options[ 'settings' ] ) ) {

			foreach ( $_ut_theme_options[ 'settings' ] as $setting ) {

				// List Item & Slider
				if ( $option_id == $setting[ 'id' ] && in_array( $setting[ 'type' ], array( 'list-item', 'slider' ) ) ) {

					foreach ( $options[ $option_id ] as $key => $value ) {

						foreach ( $value as $ckey => $cvalue ) {

							$id = $option_id . '_' . $ckey . '_' . $key;
							$_string = icl_t( 'Theme Options', $id, $cvalue );
							
							if ( !empty( $_string ) ) {

								$options[ $option_id ][ $key ][ $ckey ] = $_string;

							}

						}

					}

				// All other acceptable option types
				} else if ( $option_id == $setting[ 'id' ] && in_array( $setting[ 'type' ], apply_filters( 'ot_wpml_option_types', array( 'text', 'textarea', 'textarea-simple', 'upload' ) ) ) ) {

					$_string = icl_t( 'Theme Options', $option_id, $options[$option_id] );
					
					if ( !empty( $_string ) ) {

						$options[ $option_id ] = $_string;

					}

				}

			}

		}

		return $options[ $option_id ];

	}

}

/**
 * Get Theme Option Or Meta Key Option
 *
 * Helper function to return the option value.
 * If value is not available, it returns $default
 *
 * @param     string    The option ID
 * @return    mixed 
 *
 * @access    public
 * @since     1.0.0
 * @version   1.1.0
 */
 
if ( ! function_exists( 'ut_page_option' ) ) :

    function ut_page_option( $option_id, $default = false, $prefix = 'ut_page_' ) {

        if( is_page() || is_singular("portfolio") || is_singular("product") || ut_is_shop() ) {
        
            $current = get_queried_object(); 
            $post_ID = $current->ID ?? false;
            
            // woocommerce page ID
            if( ut_is_shop() && get_option( 'woocommerce_shop_page_id' ) ) {
                
                $post_ID = get_option( 'woocommerce_shop_page_id' );			
                
            }    
                        
            if( $post_ID ) {

                $meta_key = str_replace( 'ut_', $prefix, $option_id );
                
                if( get_post_meta( $post_ID, $meta_key, true  ) && get_post_meta( $post_ID, $meta_key, true  ) != 'global' ) {
                    
                    return get_post_meta( $post_ID, $meta_key, true  );    

                } elseif( get_post_meta( $post_ID, $meta_key, true  ) == 'global' || !get_post_meta( $post_ID, $meta_key, true  ) ) {

                    return ot_get_option( $option_id, $default ); 

                }


            }
            
            return $default;
        
        }        
        
        return ot_get_option( $option_id, $default );         
        
    }
  
endif;


/**
 * Get Option.
 *
 * Helper function to return the option value. Can be postmeta as well
 * If no value has been saved, it returns $default.
 *
 * @param     string    The option ID.
 * @param     string    The default option value.
 * @return    mixed
 *
 * @access    public
 * @since     5.0
 */
 
if ( ! function_exists( 'ut_collect_option' ) ) {

    function ut_collect_option( $option_id, $default = '', $prefix = 'ut_page_', $global = 'ut_global_' ) {
        
        // old one page mode fallback
        if( ( is_front_page() || is_home() ) && ot_get_option( 'ut_site_layout', 'multisite' ) == 'onepage' && function_exists('ut_return_hero_config') ) {
            return ut_return_hero_config( $option_id, $default );                        
        }
        
		// needed vars
		$has_global = false;
		$global_val = '';
		
		// check if there a queried object
		$current = get_queried_object(); 
        $post_ID = isset( $current->ID ) ? $current->ID : false;
       
        // woocommerce page ID
        if( ut_is_shop() && get_option( 'woocommerce_shop_page_id' ) ) {
            $post_ID = get_option( 'woocommerce_shop_page_id' );			
        }
                
		// global option ID, can e filtered for different global values
		$global_id = str_replace( 'ut_', $global, $option_id );
        $global_id = apply_filters( 'ut_collect_option', $global_id );
		
		// get the saved theme options 
        $options = get_option( 'option_tree' );
		
		// check if global value exists
		if ( isset( $options[$global_id] ) && '' != $options[$global_id] ) {
			
            $global_val = ot_wpml_filter( $options, $global_id );
			$has_global = true;
			
		}
		
        // post is required
        if( $post_ID ) {
        
            // option exception
            $option_exception = array(
                'ut_hero_title'
            );
                    
            // check if global overwrite is needed
            $meta_key = str_replace( 'ut_', $prefix, $option_id );
                        
            if( !in_array( $option_id, $option_exception ) ) {
                
                // posts have an individual meta panel
                if( is_singular('post') ) {
                    
                    if( get_post_meta( $post_ID, $meta_key . '_global_overwrite', true ) && get_post_meta( $post_ID, $meta_key, true  ) ) {
                
                        return get_post_meta( $post_ID, $meta_key, true  );    

                    }
                
                // all other post types    
                } else {
                    
                    // global overwrite is active return post meta
                    if( get_post_meta( $post_ID, $meta_key . '_global_overwrite', true ) ) {

                        return get_post_meta( $post_ID, $meta_key, true  ); 

                    }
                    
                    // no global overwrite but custom value has been found ( fallback )
                    if( !get_post_meta( $post_ID, $meta_key . '_global_overwrite', true ) && get_post_meta( $post_ID, $meta_key, true  ) ) {

                        return get_post_meta( $post_ID, $meta_key, true  ); 

                    }
                    
                    
                    // $has_global && get_post_meta( $post_ID, $meta_key, true )
                    
                    
                    
                }
                
            }
                        
            // option exceptions
            if( $option_id == 'ut_hero_title' ) {
                
                if( get_post_meta( $post_ID, $meta_key . '_global_overwrite', true ) && get_post_meta( $post_ID, $meta_key, true  ) ) {
                    
                    return get_post_meta( $post_ID, $meta_key, true  );  
                
                } else {
                    
                    $source = ot_get_option( 'ut_global_hero_title_source', 'title' );   
                
                }
                
                if( $source == 'none' ) {
                    
                    return false;
                    
                }
                
                if( $source == 'title' ) {
                    
                    return get_the_title();
                
                }
               
            
            }
        
        }
        
        if( $has_global ) {
            
			return $global_val;
                
        }
        
        return $default;
    
    }
  
}

/**
 * Get Option Attribute such as font size from font settings.
 *
 * Helper function to return the option value. Can be postmeta as well
 * If no value has been saved, it returns $default.
 *
 * @param     string    The option ID.
 * @param     string    The default option value.
 * @return    mixed
 *
 * @access    public
 * @since     5.0
 */
 
if ( ! function_exists( 'ut_get_option_attribute' ) ) {

    function ut_get_option_attribute( $option_id, $attribute, $fallback = '', $google = false ) {
        
        $array = ot_get_option( $option_id );
        
        if( !empty( $array[$attribute] ) ) {
            
            if( $attribute == 'font-family' && $google ) {
                
                $array = ut_search_sub_array( ut_recognized_google_fonts(), $array['font-family'] );
                
                if( !empty( $array['family'] ) ) {
                    
                    return $array['family'];
                    
                }                
                
            }
            
            return $array[$attribute];
            
        } else {
            
            return $fallback;
            
        }        
        
    }
    
}



/**
 * Get Option Attribute Line Height
 *
 * Helper function to return the option value. Can be postmeta as well
 * If no value has been saved, it returns $default.
 *
 * @param     string    The option ID.
 * @param     string    The default option value.
 * @return    mixed
 *
 * @access    public
 * @since     5.0
 */

if ( ! function_exists( 'ut_check_theme_options_line_height' ) ) {

    function ut_check_theme_options_line_height( $option_id ) {
        
		$custom_line_height = false;
		
		$key_pairs = array(

		    // section title
			'ut_global_headline_font_type' => array(
				'ut-google' 	=> 'ut_global_google_headline_font_style',
				'ut-websafe'	=> 'ut_global_headline_websafe_font_style_settings',
				'ut-custom'		=> 'ut_global_headline_custom_font_style_settings'
			),

            // page title
            'ut_global_page_headline_font_type' => array(
				'ut-google'   => 'ut_global_page_google_headline_font_style',
                'ut-websafe'  => 'ut_global_page_headline_websafe_font_style_settings',
                'ut-custom'   => 'ut_global_page_headline_custom_font_style_settings',
			)
		
		);

        if( ot_get_option('ut_global_headline_font_inherit', 'off' ) == 'on' ) {

            $key_pairs['ut_global_headline_font_type'] = $key_pairs['ut_global_page_headline_font_type'];

        }
		
		$font_style = ot_get_option( $option_id, 'ut-google' );
		
		if( isset( $key_pairs[$option_id][$font_style] ) ) {
			
			$custom_line_height = ut_get_option_attribute( $key_pairs[$option_id][$font_style], 'line-height' );
			$custom_line_height = !empty( $custom_line_height );
			
		}
		
		return $custom_line_height;
        
    }
    
}



/**
 * Available Button Particle Effects
 */

if ( ! function_exists( 'recognized_button_particle_effects' ) ) {

	function recognized_button_particle_effects() {

		return apply_filters( 'recognized_button_particle_effects', array(

			'send' => array(
				'type' => 'circle',
				'style' => 'fill',
				'canvasPadding' => 150,
				'duration' => 1000,
				'easing' => 'easeInOutCubic',
			),
			'upload' => array(
				'type' => 'triangle',
				'easing' => 'easeOutQuart',
				'size' => 6,
				'particlesAmountCoefficient' => 4,
				'oscillationCoefficient '=> 2
			),
			'delete' => array(
				'type'=> 'rectangle',
				'duration'=> 500,
				'easing'=> 'easeOutQuad',
				'direction'=> 'top',
				'size'=> 8
			),
			'submit' => array(
				'direction'=> 'right',
				'size'=> 4,
				'speed'=> 1,
				'particlesAmountCoefficient'=> 1.5,
				'oscillationCoefficient'=> 1
			),
			'refresh' => array(
				'duration'=> 1300,
				'easing'=> 'easeInExpo',
				'size'=> 3,
				'speed'=> 1,
				'particlesAmountCoefficient'=> 10,
				'oscillationCoefficient'=> 1
			),
			'bookmark' => array(
				'direction'=> 'bottom',
				'duration'=> 1000,
				'easing'=> 'easeInExpo',
			),
			'subscribe' => array(
				'type'=> 'rectangle',
				'style'=> 'stroke',
				'size'=> 15,
				'duration'=> 600,
				'easing'=> 'easeOutQuad',
				'oscillationCoefficient'=> 5,
				'particlesAmountCoefficient'=> 2,
				'direction'=> 'right'
			),
			'logout' => array(
				'type'=> 'triangle',
				'style'=> 'stroke',
				'direction'=> 'top',
				'size'=> 5,
				'duration'=> 1400,
				'speed'=> 1.5,
				'oscillationCoefficient'=> 15,
				'direction'=> 'right'
			),
			'addtocart' => array(
				'duration'=> 500,
				'easing'=> 'easeOutQuad',
				'speed'=> .1,
				'particlesAmountCoefficient'=> 10,
				'oscillationCoefficient'=> 80
			),
			'pause' => array(
				'direction'=> 'right',
				'size'=> 4,
				'duration'=> 1200,
				'easing'=> 'easeInCubic',
				'particlesAmountCoefficient'=> 8,
				'speed'=> 0.4,
				'oscillationCoefficient'=> 1
			),
			'register' => array(
				'style'=> 'stroke',
				'direction'=> 'bottom',
				'duration'=> 1200,
				'easing'=> 'easeOutSine',
				'speed'=> .7,
				'oscillationCoefficient'=> 5
			),
			'export' => array(
				'type'=> 'triangle',
				'easing'=> 'easeOutSine',
				'size'=> 3,
				'duration'=> 800,
				'particlesAmountCoefficient'=> 7,
				'speed'=> 3,
				'oscillationCoefficient'=> 1
			)

		) );	

	}
	
}


/**
 * Minify CSS / JS
 *
 * @return    string
 *
 * @access    public
 * @since     4.9.5
 * @version   1.0.0
 */

function ut_minify_assets() {

    return ot_get_option( 'ut_deactivate_minify', 'off' ) == 'off';

}

add_filter( 'ut_minify_assets', 'ut_minify_assets' );