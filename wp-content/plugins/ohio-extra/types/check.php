<?php

	/**
	* WPBakery Page Builder Ohio Check custom type
	*/

	if ( function_exists ( 'vc_add_shortcode_param' ) ) {
		vc_add_shortcode_param( 'ohio_check', 'ohio_extra_check_settings_field', plugins_url( 'check.js' , __FILE__ ) );
	}
	
	function ohio_extra_check_settings_field( $settings, $value ) {

		$check_value = '';
		$check_checked = false;
		$check_id = uniqid( 'clbr_vc_check_' );
			
		foreach ($settings['value'] as $_key => $_value) {
			$check_value = $_key;
			$check_checked = ( is_bool( $value ) ) ? $_value : ( $value == '1' );
			break;
		}
		
		ob_start();
?>
		<div class="ohio_extra_check_block">
			<input type="hidden" value="<?php echo ( (int) $check_checked ); ?>" name="<?php echo esc_attr( $settings['param_name'] ); ?>" class="wpb_vc_param_value <?php echo esc_attr( $settings['param_name'] ) . esc_attr( $settings['type'] ) . '_field'; ?>">
			<input type="checkbox"<?php if ( $check_checked ) { echo ' checked="checked"'; } ?> id="<?php echo $check_id; ?>">
			<label for="<?php echo $check_id; ?>"><?php echo $check_value; ?></label>
		</div>
<?php

		$content = ob_get_contents();
		ob_end_clean();
		return $content;
	}