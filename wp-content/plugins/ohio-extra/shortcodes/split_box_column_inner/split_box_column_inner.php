<?php 

	/**
	* WPBakery Page Builder Ohio Split Box Column Inner shortcode
	*/

	add_shortcode( 'ohio_split_box_column_inner', 'ohio_split_box_column_inner_func' );

	function ohio_split_box_column_inner_func( $atts, $content = '' ) {
		// Assembling
		ob_start();
		include( plugin_dir_path( __FILE__ ) . 'split_box_column_inner__view.php' );
		return ob_get_clean();
	}