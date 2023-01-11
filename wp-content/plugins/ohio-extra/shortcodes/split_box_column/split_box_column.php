<?php 

/**
* WPBakery Page Builder Ohio Split Box Column shortcode
*/

add_shortcode( 'ohio_split_box_column', 'ohio_split_box_column_func' );

function ohio_split_box_column_func( $atts, $content = '' ) {
	// Assembling
	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'split_box_column__view.php' );
	return ob_get_clean();
}