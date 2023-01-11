<?php

// exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit;

// check if class already exists
if( ! class_exists( 'acf_field_ohio_columns' ) ) :


class acf_field_ohio_columns extends acf_field {

	function __construct( $settings ) {

		$this->name = 'ohio_columns';
		/*
		*  label (string) Multiple words, can include spaces, visible when selecting a field type
		*/
		$this->label = esc_html__( 'Ohio columns', 'ohio-extra' );
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
		$uniqid = uniqid( 'ohio-columns' );

		$value_array = array();

		if ( $field['value'] ) {
			$value_array = explode( '-', $field['value'] );
		}
		elseif ( $field['default_value'] ) {
			$value_array = explode( '-', $field['default_value'] );
		}

		$large = ( isset( $value_array[0] ) ) ? NorExtraFilter::string( $value_array[0], 'attr', '' ) : '4';
		$small = ( isset( $value_array[1] ) ) ? NorExtraFilter::string( $value_array[1], 'attr', '' ) : '2';
		$extra_small = ( isset( $value_array[2] ) ) ? NorExtraFilter::string( $value_array[2], 'attr', '' ) : '1';
?>

		<div class="ohio-acf-columns-field-content" data-uniqid="<?php echo $uniqid; ?>">

			<!-- Hidden field -->
			<?php acf_hidden_input( $hidden ); ?>

			<div class="col-4 col-large">
				<label for="large"><?php esc_html_e( 'Desktop devices', 'ohio-extra' ); ?></label>
				<select class="nor-col-large" name="large">
					<?php if ( isset( $field['use_inherit'] ) && $field['use_inherit'] ) : ?>
					<option value="i"<?php if ( $large == 'i' ) { echo ' selected="true"'; } ?>><?php _e( 'Theme settings inherited', 'ohio-extra' ); ?></option>
					<?php endif; ?>
					<option value="1"<?php if ( $large == '1' ) { echo ' selected="true"'; } ?>><?php _e( '1 column', 'ohio-extra' ); ?></option>
					<option value="2"<?php if ( $large == '2' ) { echo ' selected="true"'; } ?>><?php _e( '2 columns', 'ohio-extra' ); ?></option>
					<option value="3"<?php if ( $large == '3' ) { echo ' selected="true"'; } ?>><?php _e( '3 columns', 'ohio-extra' ); ?></option>
					<option value="4"<?php if ( $large == '4' ) { echo ' selected="true"'; } ?>><?php _e( '4 columns', 'ohio-extra' ); ?></option>
					<option value="5"<?php if ( $large == '5' ) { echo ' selected="true"'; } ?>><?php _e( '5 columns', 'ohio-extra' ); ?></option>
					<option value="6"<?php if ( $large == '6' ) { echo ' selected="true"'; } ?>><?php _e( '6 columns', 'ohio-extra' ); ?></option>
					<option value="12"<?php if ( $large == '12' ) { echo ' selected="true"'; } ?>><?php _e( '12 columns', 'ohio-extra' ); ?></option>
				</select>
			</div>
			<div class="col-4 col-medium">
				<label for=""><?php esc_html_e( 'Tablet devices', 'ohio-extra' ); ?></label>
				<select class="nor-col-medium" name="medium">
					<?php if ( isset( $field['use_inherit'] ) && $field['use_inherit'] ) : ?>
					<option value="i"<?php if ( $small == 'i' ) { echo ' selected="true"'; } ?>><?php _e( 'Theme settings inherited', 'ohio-extra' ); ?></option>
					<?php endif; ?>
					<option value="1"<?php if ( $small == '1' ) { echo ' selected="true"'; } ?>><?php _e( '1 column', 'ohio-extra' ); ?></option>
					<option value="2"<?php if ( $small == '2' ) { echo ' selected="true"'; } ?>><?php _e( '2 columns', 'ohio-extra' ); ?></option>
					<option value="3"<?php if ( $small == '3' ) { echo ' selected="true"'; } ?>><?php _e( '3 columns', 'ohio-extra' ); ?></option>
					<option value="4"<?php if ( $small == '4' ) { echo ' selected="true"'; } ?>><?php _e( '4 columns', 'ohio-extra' ); ?></option>
					<option value="5"<?php if ( $small == '5' ) { echo ' selected="true"'; } ?>><?php _e( '5 columns', 'ohio-extra' ); ?></option>
					<option value="6"<?php if ( $small == '6' ) { echo ' selected="true"'; } ?>><?php _e( '6 columns', 'ohio-extra' ); ?></option>
					<option value="12"<?php if ( $small == '12' ) { echo ' selected="true"'; } ?>><?php _e( '12 columns', 'ohio-extra' ); ?></option>
				</select>
			</div>
			<div class="col-4 col-small">
				<label for=""><?php esc_html_e( 'Mobile devices', 'ohio-extra' ); ?></label>
				<select class="nor-col-small" name="small">
					<?php if ( isset( $field['use_inherit'] ) && $field['use_inherit'] ) : ?>
					<option value="i"<?php if ( $extra_small == 'i' ) { echo ' selected="true"'; } ?>><?php _e( 'Theme settings inherited', 'ohio-extra' ); ?></option>
					<?php endif; ?>
					<option value="1"<?php if ( $extra_small == '1' ) { echo ' selected="true"'; } ?>><?php _e( '1 column', 'ohio-extra' ); ?></option>
					<option value="2"<?php if ( $extra_small == '2' ) { echo ' selected="true"'; } ?>><?php _e( '2 columns', 'ohio-extra' ); ?></option>
					<option value="3"<?php if ( $extra_small == '3' ) { echo ' selected="true"'; } ?>><?php _e( '3 columns', 'ohio-extra' ); ?></option>
					<option value="4"<?php if ( $extra_small == '4' ) { echo ' selected="true"'; } ?>><?php _e( '4 columns', 'ohio-extra' ); ?></option>
					<option value="5"<?php if ( $extra_small == '5' ) { echo ' selected="true"'; } ?>><?php _e( '5 columns', 'ohio-extra' ); ?></option>
					<option value="6"<?php if ( $extra_small == '6' ) { echo ' selected="true"'; } ?>><?php _e( '6 columns', 'ohio-extra' ); ?></option>
					<option value="12"<?php if ( $extra_small == '12' ) { echo ' selected="true"'; } ?>><?php _e( '12 columns', 'ohio-extra' ); ?></option>
				</select>
			</div>

		</div>

<?php
	}
	

	
	function input_admin_enqueue_scripts() {
		global $wp_scripts, $wp_styles;

		$url = $this->settings['url'];
		$version = $this->settings['version'];

		// wp_register_style( 'acf-input-ohio', "{$url}assets/css/input.css", array( 'acf-input' ), $version );
		wp_enqueue_style( 'acf-input-ohio' );
		
		wp_register_script( 'acf-input-ohio-columns', "{$url}assets/js/input.js", array( 'acf-input' ), $version );
		wp_enqueue_script('acf-input-ohio-columns');

		wp_enqueue_style( 'wp-columns-picker' );
	}
	
	
	
	function load_value( $value, $post_id, $field ) {
		return $value;
	}
}

// initialize
new acf_field_ohio_columns( $this->settings );

// class_exists check
endif;

?>