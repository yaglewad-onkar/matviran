<?php if (!defined('ABSPATH')) {
    exit; // exit if accessed directly
}

/**
 * Change Theme Options Menu Name
 * do not change these values! 
 *
 * @return    string
 *
 * @access    private
 * @since     1.0
 */

/* activate theme panels */
add_filter( 'ut_show_theme_options' , '__return_false' ); /* new theme options - upcoming version */
add_filter( 'ut_show_theme_info'    , '__return_true' );
add_filter( 'ut_show_header_manager', '__return_false' ); /* new header manager - upcoming version */

/* activate sidebar support */
add_filter( 'ut_activate_sidebars'          , '__return_false' );
add_filter( 'ut_activate_secondary_sidebar' , '__return_false'); /* not available with this theme*/

/* don't change this if in doubt.*/
add_filter( 'ut_mobile_detect' , '__return_true' );
add_filter( 'ut_megamenu' , '__return_true' );

/* brooklyn overwrite until unite framework takes over control in a future version */
add_filter( 'ut_theme_options_page' , function() { return 'ut_theme_options'; } );
add_filter( 'ut_demo_importer_page' , function() { return 'ut-demo-importer-reloaded'; } );
add_filter( 'ut_sidebars_page'      , function() { return 'ut_sidebar_settings'; } );