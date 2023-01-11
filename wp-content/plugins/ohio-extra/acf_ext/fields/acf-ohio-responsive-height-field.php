<?php

// exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit;

// check if class already exists
if( ! class_exists( 'acf_field_ohio_responsive_height' ) ) :


class acf_field_ohio_responsive_height extends acf_field {

	function __construct( $settings ) {

		$this->name = 'ohio_responsive_height';
		/*
		*  label (string) Multiple words, can include spaces, visible when selecting a field type
		*/
		$this->label = esc_html__( 'Ohio responsive height', 'ohio-extra' );
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
		elseif ( isset( $field['default_value'] ) && $field['default_value'] ) {
			$value_array = explode( '-', $field['default_value'] );
		}

		$desktop = ( isset( $value_array[0] ) ) ? NorExtraFilter::string( $value_array[0], 'attr', '' ) : '';
		$tablet = ( isset( $value_array[1] ) ) ? NorExtraFilter::string( $value_array[1], 'attr', '' ) : '';
		$mobile = ( isset( $value_array[2] ) ) ? NorExtraFilter::string( $value_array[2], 'attr', '' ) : '';
?>

		<div class="ohio-acf-columns-field-content" data-uniqid="<?php echo $uniqid; ?>">

			<!-- Hidden field -->
			<?php acf_hidden_input( $hidden ); ?>

			<div class="col-4 col-desktop">
				<label for="desktop"><?php esc_html_e( 'Desktop devices', 'ohio-extra' ); ?></label>
				<div class="acf-input">
					<div class="acf-input-append">px</div>
					<div class="acf-input-wrap">
						<input type="number" class="acf-is-appended" name="desktop" value="<?php echo $desktop; ?>" min="1" max="10000" step="any">
					</div>
				</div>
			</div>
			<div class="col-4 col-tablet">
				<label for="tablet"><?php esc_html_e( 'Tablet devices', 'ohio-extra' ); ?></label>
				<div class="acf-input">
					<div class="acf-input-append">px</div>
					<div class="acf-input-wrap">
						<input type="number" class="acf-is-appended" name="tablet" value="<?php echo $tablet; ?>" min="1" max="10000" step="any">
					</div>
				</div>
			</div>
			<div class="col-4 col-mobile">
				<label for=""><?php esc_html_e( 'Mobile devices', 'ohio-extra' ); ?></label>
				<div class="acf-input">
					<div class="acf-input-append">px</div>
					<div class="acf-input-wrap">
						<input type="number" class="acf-is-appended" name="mobile" value="<?php echo $mobile; ?>" min="1" max="10000" step="any">
					</div>
				</div>
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
		
		wp_register_script( 'acf-input-ohio-responsive_height', "{$url}assets/js/input.js", array( 'acf-input' ), $version );
		wp_enqueue_script('acf-input-ohio-responsive_height');
	}
	
	
	
	function load_value( $value, $post_id, $field ) {
		return $value;
	}
}

// initialize
new acf_field_ohio_responsive_height( $this->settings );

// class_exists check
endif;

?>