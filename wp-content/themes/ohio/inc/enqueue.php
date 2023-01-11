<?php

function ohio_enqueue_admin_style()
{

    $ohio_fonts_type = OhioOptions::get_global( 'page_font_type', 'google_fonts' );
    if ( $ohio_fonts_type == 'adobe_fonts' ) {
        $ohio_adobekit_url = OhioOptions::get_global( 'adobekit_url' );
        if ( $ohio_adobekit_url ) {
            wp_enqueue_style( 'adobe-font', esc_url( '//use.typekit.net/' . $ohio_adobekit_url . '.css' ) );
        }
    }

    wp_enqueue_style('ionicons-font', get_template_directory_uri() . '/assets/fonts/ionicons/css/ionicons.min.css');
    wp_enqueue_script('ohio-admin-scripts', get_template_directory_uri() . '/assets/js/admin.js');

    // WPBackery front-end Select2
    if ( function_exists( 'vc_is_inline' ) && vc_is_inline() ) {
        wp_deregister_script( 'select2' );
        wp_enqueue_style('select2-style', get_template_directory_uri() . '/assets/css/select2.min.js' );
        wp_enqueue_script('jquery-select2', get_template_directory_uri() . '/assets/js/libs/jquery.select2.min.js', array('jquery') );
    }
}

add_action('admin_head', 'ohio_enqueue_admin_style');

// Styles including
function ohio_enqueue_own_styles() {
    wp_enqueue_style( 'ohio-style', get_stylesheet_uri(), array(), OHIO_VERSION );
    if ( is_rtl() ) {
        wp_enqueue_style( 'ohio-rtl', get_template_directory_uri() . '/rtl.css' );
    }

    get_template_part( '/inc/dynamic_css/index' );

    // User custom JS
    $ohio_custom_js_header = OhioOptions::get_global( 'header_javascript' );
    if ( $ohio_custom_js_header ) {
        echo $ohio_custom_js_header;
    }
}

add_action('wp_enqueue_scripts', 'ohio_enqueue_own_styles');

function ohio_enqueue_own_styles_secondary()
{
    wp_enqueue_style('ionicons', get_template_directory_uri() . '/assets/fonts/ionicons/css/ionicons.min.css', false);
    wp_enqueue_style('fontawesome-font', get_template_directory_uri() . '/assets/fonts/fa/css/fontawesome.min.css', false);

    if ( isset($GLOBALS['ohio_google_fonts']) ) {
        $ohio_google_fonts_string = OhioHelper::parse_google_fonts_to_query_string($GLOBALS['ohio_google_fonts']);
        if ( $ohio_google_fonts_string ) {
            wp_enqueue_style('ohio-global-fonts', $ohio_google_fonts_string, array());
        }
    }

    // User custom JS
    $ohio_custom_js_footer = OhioOptions::get_global( 'footer_javascript' );
    if ( $ohio_custom_js_footer ) {
        echo $ohio_custom_js_footer;
    }
}

add_action('wp_footer', 'ohio_enqueue_own_styles_secondary');

function deregister_my_styles() {
    wp_deregister_style( 'yith-wcan-frontend' );
}
add_action( 'wp_print_styles', 'deregister_my_styles', 100 );

// Scripts and libs
function ohio_enqueue_own_scripts() {
    wp_enqueue_script('jquery-masonry');
    wp_enqueue_script('ohio-slider', get_template_directory_uri() . '/assets/js/libs/jquery.clb-slider.js', array('jquery'), false, true);
    wp_enqueue_script('jquery-mega-menu', get_template_directory_uri() . '/assets/js/libs/jquery.mega-menu.min.js', array('jquery'), false, true);
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
    if ( OhioHelper::is_script_required( 'underscore' ) ) {
        wp_enqueue_script( 'underscore' );
    }
    if ( OhioHelper::is_script_required( 'aos' ) ) {
        wp_enqueue_script('aos', get_template_directory_uri() . '/assets/js/libs/aos.min.js', array('jquery'), false, true);
    }
    if ( OhioHelper::is_script_required( 'isotope' ) ) {
        wp_enqueue_script( 'isotope', get_template_directory_uri() . '/assets/js/libs/isotope.pkgd.min.js', array('jquery'), false, true );
    }
    if ( OhioHelper::is_script_required('compare') ) {
        wp_enqueue_script('jquery-event-move', get_template_directory_uri() . '/assets/js/libs/jquery.event.move.min.js', array('jquery'), '1.0.0', true);
        wp_enqueue_script('jquery-twentytwenty', get_template_directory_uri() . '/assets/js/libs/jquery.twentytwenty.min.js', array('jquery', 'jquery-event-move'), '1.0.0', true);
    }
    if ( OhioHelper::is_script_required('countdown-box') ) {
        wp_enqueue_script('jquery-countdown', get_template_directory_uri() . '/assets/js/libs/jquery.countdown.min.js', array('jquery'), '1.0.0', true);
    }
    if ( OhioHelper::is_script_required('typed') ) {
        wp_enqueue_script('typed', get_template_directory_uri() . '/assets/js/libs/typed.min.js', array('jquery'), '1.0.0', true);
    }
    if (OhioHelper::is_script_required('google-maps')) {
        wp_enqueue_script('jquery-maps', get_template_directory_uri() . '/assets/js/libs/jquery.google-maps.min.js', array('jquery'), '1.0.0', true);
    }
    if ((isset($GLOBALS['ohio_use_map']) && $GLOBALS['ohio_use_map']) || OhioHelper::is_script_required('google-maps')) { // Google Maps
        $ohio_api_key = OhioOptions::get_global( 'google_maps_api_key', '' );
        wp_enqueue_script('google-maps', '//maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&key=' . urlencode(esc_attr($ohio_api_key)), false, null, true);
    }

    // Quick View variations
    if ( function_exists( 'WC' ) && OhioOptions::get_global( 'woocommerce_quickview_button', true ) ) {
        wp_enqueue_script( 'wp-util' );

        $frontend_script_path = str_replace( array( 'http:', 'https:' ), '', WC()->plugin_url() ) . '/assets/js/frontend/';
        wp_enqueue_script( 'wc-add-to-cart-variation', $frontend_script_path . 'add-to-cart-variation.min.js', [ 'jquery', 'wp-util' ] );
    }

    wp_enqueue_script( 'ohio-main', get_template_directory_uri() . '/assets/js/main.js', [ 'jquery' ], OHIO_VERSION, true );

    $ohio_variables = array(
        'url' => esc_url(admin_url('admin-ajax.php')),
        'view_cart' => esc_html__('View Cart', 'ohio'),
        'add_to_cart_message' => esc_html__('has been added to the cart', 'ohio'),
    );

    if (function_exists('wc_get_cart_url')) {
        $ohio_variables['cart_page'] = esc_url(wc_get_cart_url());
    }

    $ohio_variables['subscribe_popup_enable'] = OhioOptions::get_global( 'subscribe_popup_switch', false );
    if ( $ohio_variables['subscribe_popup_enable'] ) {
        if ( OhioOptions::get_global( 'subscribe_popup_display_trigger' ) ) {
            $ohio_variables['subscribe_popup_type'] = OhioOptions::get_global( 'subscribe_popup_display_trigger' );

            if ( $ohio_variables['subscribe_popup_type'] == 'time' ) {
                $ohio_variables['subscribe_popup_var'] = OhioOptions::get_global( 'delay_subcribe_popup' );
            }
            if ( $ohio_variables['subscribe_popup_type'] == 'scroll' ) {
                $ohio_variables['subscribe_popup_var'] = OhioOptions::get_global( 'subscribe_popup_scroll_percent' );
            }
        }
    }

    $ohio_variables['notification_enable'] = OhioOptions::get_global( 'notification_bar' );
    if ( $ohio_variables['notification_enable'] ) {
        $ohio_variables['notification_expires'] = OhioOptions::get_global( 'notification_expires', 360 );
    }

    if ( OhioOptions::get( 'page_dark_mode_switcher', false ) ) {
        $ohio_variables['save_color_mode_state'] = OhioOptions::get_global( 'page_dark_mode_save_state', true );
    }

    wp_localize_script('ohio-main', 'ohioVariables', $ohio_variables);
}

add_action('wp_footer', 'ohio_enqueue_own_scripts');

// Font icons pack
function ohio_enqueue_icon_fonts()
{
    $ohio_fonts = OhioHelper::parse_iconset_to_url($GLOBALS['ohio_icon_fonts']);
    if ($ohio_fonts) {
        foreach ($ohio_fonts as $key => $value) {
            wp_enqueue_style('icon-pack-' . $key, $value, array(), '2.0.0');
        }
    }
}

add_action('wp_footer', 'ohio_enqueue_icon_fonts');