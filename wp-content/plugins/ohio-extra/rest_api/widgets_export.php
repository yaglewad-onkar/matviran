<?php

add_action( 'rest_api_init', function () {
    register_rest_route( 'wp/v2', 'ohio_get_widgets', [
        'methods' => 'GET',
        'callback' => function() {
            if ( !defined( 'WIE_PATH' ) ) return 'Please enable the Widget Importer & Exporter plugin';

            require_once( WIE_PATH . '/includes/export.php' );
            require_once( WIE_PATH . '/includes/widgets.php' );

            return wie_generate_export_data();
        },
        'permission_callback' => function() {
            return true;
        }
    ]);
});