<?php

	/**
	* Visual Composer Ohio HTML Allowed Input custom type
	*/
	if ( function_exists ( 'vc_add_shortcode_param' ) ) {
		vc_add_shortcode_param( 'ohio_input', 'ohio_input_settings_field', plugins_url( 'input.js' , __FILE__ ) );
	}
	
	function ohio_input_settings_field( $settings, $value ) {
		ob_start();
?>
		<div class="ohio_extra_input_block">
			<input type="hidden" name="<?php echo esc_attr( $settings['param_name'] ); ?>" class="wpb_vc_param_value" value="<?php echo esc_attr( $value ); ?>">
			<input type="text" name="input" value="<?php echo esc_attr( $value ); ?>">
		</div>
<?php

		return ob_get_clean();
	}