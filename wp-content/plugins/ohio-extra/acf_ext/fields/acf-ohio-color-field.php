<?php

// exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit;

// check if class already exists
if( ! class_exists( 'acf_field_ohio_color' ) ) :


class acf_field_ohio_color extends acf_field {

	function __construct( $settings ) {

		$this->name = 'ohio_color';
		/*
		*  label (string) Multiple words, can include spaces, visible when selecting a field type
		*/
		$this->label = esc_html__( 'Ohio Color', 'ohio-extra' );
		/*
		*  category (string) basic | content | choice | relational | jquery | layout | CUSTOM GROUP NAME
		*/
		$this->category = 'basic';
		/*
		*  defaults (array) Array of default settings which are merged into the field object. These are used later in settings
		*/
		$this->defaults = array(
			'add_theme_inherited' => true
		);
		/*
		*  l10n (array) Array of strings that are used in JavaScript. This allows JS strings to be translated in PHP and loaded via:
		*  var message = acf._e('FIELD_NAME', 'error');
		*/
		
		$this->l10n = array(
			'error'	=> esc_html__( 'Error! Please enter a higher value', 'ohio-extra' ),
		);
		/*
		*  settings (array) Store plugin settings (url, path, version) as a reference for later use with assets
		*/
		$this->settings = $settings;

		// ----------------------------------------------------------------------------------------------------

		// do not delete!
    	parent::__construct();
	}

	function render_field( $field ) {

		/*
		echo '<pre>';
		print_r( $field );
		echo '</pre>';
		*/

		$text = acf_get_sub_array( $field, array('id', 'class', 'name', 'value') );
		$hidden = acf_get_sub_array( $field, array('name', 'value') );
		$uniqid = uniqid( 'ohio-color' );
?>

		<div class="ohio-acf-color-field-content" data-uniqid="<?php echo $uniqid; ?>">

			<!-- Hidden field -->
			<?php acf_hidden_input( $hidden ); ?>

			<input type="text" name="color" class="cs-wp-color-picker"<?php if ( $field['value'] ) { echo ' value="' . $field['value'] . '"'; } ?>>

		</div>

<?php
	}
	

	
	function input_admin_enqueue_scripts() {
		global $wp_scripts, $wp_styles;

		$url = $this->settings['url'];
		$version = $this->settings['version'];

		// wp_register_style( 'acf-input-ohio', "{$url}assets/css/input.css", array( 'acf-input' ), $version );
		wp_enqueue_style( 'acf-input-ohio' );
		
		wp_register_script( 'acf-input-ohio-color', "{$url}assets/js/input.js", array( 'acf-input' ), $version );
		wp_enqueue_script('acf-input-ohio-color');

		if ( ! isset( $wp_scripts->registered['iris'] ) ) {
			wp_register_style('wp-color-picker', admin_url( 'css/color-picker.css' ), array(), '', true);
			wp_register_script('iris', admin_url( 'js/iris.min.js' ), array( 'jquery-ui-draggable', 'jquery-ui-slider', 'jquery-touch-punch' ), '1.0.7', true);
			wp_register_script('wp-color-picker', admin_url( 'js/color-picker.min.js' ), array('iris'), '', true);
		    wp_localize_script('wp-color-picker', 'wpColorPickerL10n', array(
		        'clear'			=> __( 'Clear', 'ohio-extra' ),
		        'defaultString'	=> __( 'Default', 'ohio-extra' ),
		        'pick'			=> __( 'Select Color', 'ohio-extra' ),
		        'current'		=> __( 'Current Color', 'ohio-extra' )
		    ));
		}

		wp_enqueue_style( 'wp-color-picker' );
	    wp_enqueue_style( 'acf-input-ohio-picker', "{$url}assets/css/cs-wp-color-picker.min.css", array( 'wp-color-picker' ), '1.0.0', 'all' );
	    wp_enqueue_script( 'wp-color-picker' );
		wp_enqueue_script( 'acf-input-ohio-picker', "{$url}assets/js/cs-wp-color-picker.min.js", array( 'wp-color-picker' ), '1.0.0', true );
	}
	
	
	
	function load_value( $value, $post_id, $field ) {
		return $value;
	}
}

// initialize
new acf_field_ohio_color( $this->settings );

// class_exists check
endif;

?>