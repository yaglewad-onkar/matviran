<?php
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'Ohio_Acf_Field_Inherited_Checkbox' ) ):

class Ohio_Acf_Field_Inherited_Checkbox extends acf_field {

	function initialize() {
		$this->name = 'inherited_checkbox';
		$this->label = __('Ohio True/False With Inherited', 'ohio-extra');
		$this->category = 'basic';
		$this->defaults = [];
	}

	function format_value( $value ) {
		if ($value == 'inherit') {
			return 'inherit';
		} else if ($value === null) {
			return null;
		} else {
			return (bool) $value;
		}
	}

	function render_field( $field ) {
		$custom_labels = isset( $field['custom_labels'] ) ? $field['custom_labels'] : [];

		$yes_button_label = isset( $custom_labels['true'] ) ? $custom_labels['true'] : esc_html__( 'Yes', 'ohio-extra' );
		$no_button_label = isset( $custom_labels['false'] ) ? $custom_labels['false'] : esc_html__( 'No', 'ohio-extra' );
		$inherit_button_label = isset( $custom_labels['inherit'] ) ? $custom_labels['inherit'] : esc_html__( 'Settings inherited', 'ohio-extra' );
?>
		<div class="ohio-acf-inherited-checkbox-type">
			<span class="inherited_option">
				<input type="radio" name="<?php echo esc_attr( $field['name'] . '-field' ) ?>"
					id="<?php echo $field['id'] . '-inherit'; ?>"
					value="inherit" <?php echo (!in_array($field['value'], ['1', '0'])) ? 'checked': ''; ?>>
				<label for="<?php echo $field['id'] . '-inherit'; ?>">
					<?php echo $inherit_button_label; ?>
				</label>
			</span>

			<ul class="acf-radio-list acf-hl">
				<li class="custom_option">
					<input type="radio" name="<?php echo esc_attr( $field['name'] . '-field' ) ?>" 
						id="<?php echo $field['id'] . '-yes'; ?>"
						value="1" <?php echo ($field['value'] === '1') ? 'checked': ''; ?>>
					<label for="<?php echo $field['id'] . '-yes'; ?>"><?php echo $yes_button_label; ?></label>
				</li>

				<li class="custom_option">
					<input type="radio" name="<?php echo esc_attr( $field['name'] . '-field' ) ?>"
						id="<?php echo $field['id'] . '-no'; ?>"
						value="0" <?php echo ($field['value'] === '0') ? 'checked': ''; ?>>
					<label for="<?php echo $field['id'] . '-no'; ?>"><?php echo $no_button_label; ?></label>
				</li>
			</ul>

			<input type="hidden" id="<?php echo esc_attr( $field['id'] ) ?>" 
				name="<?php echo esc_attr( $field['name'] ) ?>" 
				value="<?php echo esc_attr( $field['value'] ) ?>" />
		</div>
<?php
	}

	function input_admin_enqueue_scripts() {
		$url = plugin_dir_url( __FILE__ ) . '..';
		wp_register_script('ohio-checkbox-with-inherited-option', "{$url}/assets/js/checkbox_with_inherited.js", ['acf-input'] );
		wp_enqueue_script('ohio-checkbox-with-inherited-option');
	}
}

acf_register_field_type( 'Ohio_Acf_Field_Inherited_Checkbox' );

endif;
