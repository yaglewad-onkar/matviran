<?php

add_action( 'rest_api_init', function () {
    register_rest_route( 'wp/v2', 'ohio_get_rev_sliders', [
        'methods' => 'GET',
        'callback' => function() {
            global $wpdb;

            if ( !defined( 'RS_PLUGIN_PATH' ) ) return 'No active Slider Revolution found';

            require_once( RS_PLUGIN_PATH . 'admin/includes/export.class.php' );

            $data = $wpdb->get_results( 'SELECT id FROM wp_revslider_sliders LIMIT 1;' );
            if ( empty($data) ) return 'No Sliders to export';

            $slider = new RevSliderSliderExport();
            return $slider->export_slider($data[0]->id);
        },
        'permission_callback' => function() {
            return true;
        }
    ]);
});
