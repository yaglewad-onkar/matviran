<?php

	/**
	* WPBakery Page Builder Ohio columns custom type
	*/

	if ( function_exists ( 'vc_add_shortcode_param' ) ) {
		vc_add_shortcode_param( 'ohio_columns', 'ohio_extra_columns_settings_field', plugins_url( 'columns.js' , __FILE__ ) );
	}

	function ohio_extra_columns_settings_field( $settings, $value ) {

		$value_array = array();

		if ( $value ) {
			$value_array = explode( '-', $value );
		}
		elseif ( $settings['value'] ) {
			$value_array = explode( '-', $settings['value'] );
		}

		$large = ( $value_array[0] ) ? NorExtraFilter::string( $value_array[0], 'attr', '' ) : '';
		$small = ( $value_array[1] ) ? NorExtraFilter::string( $value_array[1], 'attr', '' ) : '';
		$extra_small = ( $value_array[2] ) ? NorExtraFilter::string( $value_array[2], 'attr', '' ) : '';

		ob_start();
?>
		<div class="ohio_extra_columns_block">
			<input type="hidden" name="<?php echo NorExtraFilter::string( $settings['param_name'], 'attr', '' ); ?>" class="wpb_vc_param_value" value="<?php echo NorExtraFilter::string( $value, 'attr', '' ); ?>">
			<div class="col-4 col-large">
				<div class="wpb_element_label"><?php esc_html_e( 'Desktop devices', 'ohio-extra' ); ?></div>
				<select class="nor-col-large">
					<option value="1"<?php if ( $large == '1' ) { echo ' selected="true"'; } ?>>1 column</option>
					<option value="2"<?php if ( $large == '2' ) { echo ' selected="true"'; } ?>>2 columns</option>
					<option value="3"<?php if ( $large == '3' ) { echo ' selected="true"'; } ?>>3 columns</option>
					<option value="4"<?php if ( $large == '4' ) { echo ' selected="true"'; } ?>>4 columns</option>
					<option value="5"<?php if ( $large == '5' ) { echo ' selected="true"'; } ?>>5 columns</option>
					<option value="6"<?php if ( $large == '6' ) { echo ' selected="true"'; } ?>>6 columns</option>
					<option value="12"<?php if ( $large == '12' ) { echo ' selected="true"'; } ?>>12 columns</option>
				</select>
			</div>
			<div class="col-4 col-small">
				<div class="wpb_element_label"><?php esc_html_e( 'Tablet devices', 'ohio-extra' ); ?></div>
				<select class="nor-col-small">
					<option value="1"<?php if ( $small == '1' ) { echo ' selected="true"'; } ?>>1 column</option>
					<option value="2"<?php if ( $small == '2' ) { echo ' selected="true"'; } ?>>2 columns</option>
					<option value="3"<?php if ( $small == '3' ) { echo ' selected="true"'; } ?>>3 columns</option>
					<option value="4"<?php if ( $small == '4' ) { echo ' selected="true"'; } ?>>4 columns</option>
					<option value="5"<?php if ( $small == '5' ) { echo ' selected="true"'; } ?>>5 columns</option>
					<option value="6"<?php if ( $small == '6' ) { echo ' selected="true"'; } ?>>6 columns</option>
					<option value="12"<?php if ( $small == '12' ) { echo ' selected="true"'; } ?>>12 columns</option>
				</select>
			</div>
			<div class="col-4 col-extra_small">
				<div class="wpb_element_label"><?php esc_html_e( 'Mobile devices', 'ohio-extra' ); ?></div>
				<select class="nor-col-extra-small">
					<option value="1"<?php if ( $extra_small == '1' ) { echo ' selected="true"'; } ?>>1 column</option>
					<option value="2"<?php if ( $extra_small == '2' ) { echo ' selected="true"'; } ?>>2 columns</option>
					<option value="3"<?php if ( $extra_small == '3' ) { echo ' selected="true"'; } ?>>3 columns</option>
					<option value="4"<?php if ( $extra_small == '4' ) { echo ' selected="true"'; } ?>>4 columns</option>
					<option value="5"<?php if ( $extra_small == '5' ) { echo ' selected="true"'; } ?>>5 columns</option>
					<option value="6"<?php if ( $extra_small == '6' ) { echo ' selected="true"'; } ?>>6 columns</option>
					<option value="12"<?php if ( $extra_small == '12' ) { echo ' selected="true"'; } ?>>12 columns</option>
				</select>
			</div>
		</div>
<?php

		$content = ob_get_contents();
		ob_end_clean();
		return $content;
	}