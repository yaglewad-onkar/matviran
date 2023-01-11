<?php

// exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) { exit; }

// check if class already exists
if ( ! class_exists( 'acf_plugin_ohio' ) ) :

class acf_plugin_ohio {

	function __construct() {
		$this->settings = array(
			'version' => '1.0.0',
			'url' => plugin_dir_url( __FILE__ ),
			'path' => plugin_dir_path( __FILE__ )
		);

		add_action( 'acf/include_field_types', 	array( $this, 'include_field_types' ) );
	}

	function include_field_types( $version = false ) {
		include_once( 'fields/acf-ohio-typo-field.php' );
		include_once( 'fields/acf-ohio-sizes-field.php' );
		include_once( 'fields/acf-ohio-color-field.php' );
		include_once( 'fields/acf-ohio-columns-field.php' );
		include_once( 'fields/acf-ohio-ecommerce-columns-field.php' );
		include_once( 'fields/acf-ohio-responsive-height-field.php' );
		include_once( 'fields/acf-ohio-code-field.php' );
		include_once( 'fields/acf-ohio-image-option-field.php' );
		include_once( 'fields/acf-ohio-menu-field.php' );
		include_once( 'fields/acf-ohio-inherited-checkbox-field.php' );
	}

}

// initialize
new acf_plugin_ohio();

endif;
	
?>