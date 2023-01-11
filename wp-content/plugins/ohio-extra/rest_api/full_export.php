<?php

add_action( 'rest_api_init', function () {
	register_rest_route( 'wp/v2', 'ohio_full_export', [
		'methods' => 'GET',
		'callback' => function() {
			require_once( ABSPATH . 'wp-admin/includes/export.php' );
			export_wp();
			die();
		},
		'permission_callback' => function() {
			return true;
		}
	]);
});
