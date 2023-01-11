<?php

add_action( 'wp_ajax_ohio_get_font', 'ohio_gf_get_font' );

function ohio_gf_get_font() {
	$fonts_type = OhioOptions::get_global( 'page_font_type', 'google_fonts' );
	switch ( $fonts_type ) {
		case 'adobe_fonts':
			include_once( plugin_dir_path( __FILE__ ) . 'af_list.php' );
			break;
		case 'manual_custom_fonts':
			include_once( plugin_dir_path( __FILE__ ) . 'cf_list.php' );
			break;
		case 'google_fonts':
		default:
			include_once( plugin_dir_path( __FILE__ ) . 'gf_list.php' );
			break;
	}

	foreach ( $ohio_gf_object->items as $font_object ) {
		if ( $font_object->family == $_POST['font_family'] ) {
			echo json_encode( $font_object );
		}
	}
	wp_die();
}