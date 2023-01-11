<?php

    $API_path = plugin_dir_path( __FILE__ );

    require_once( $API_path . '/lazy_load.php' );

    if ( strpos( home_url(), 'ohio.clbthemes.com' ) ) {
        require_once( $API_path . '/full_export.php' );
        require_once( $API_path . '/get_acf_options.php' );
        require_once( $API_path . '/rev_slider_export.php' );
        require_once( $API_path . '/widgets_export.php' );
    }
