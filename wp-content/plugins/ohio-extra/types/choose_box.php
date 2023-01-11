<?php

	/**
	* WPBakery Page Builder Ohio Choose box custom type
	*/
	if ( function_exists ( 'vc_add_shortcode_param' ) ) {
		vc_add_shortcode_param( 'ohio_choose_box', 'ohio_extra_choose_box_settings_field', plugins_url( 'choose_box.js' , __FILE__ ) );
	}

	function ohio_extra_choose_box_settings_field( $settings, $value ) {

		if ( empty( $value ) ) {
			$value = $settings['value'][0]['key'];
		} elseif( is_array( $value ) ) {
			$value = $value['key'];
		}

		ob_start();

?>
		<div class="ohio_extra_choose_box_block">
			<input type="hidden" name="<?php echo esc_attr( $settings['param_name'] ); ?>"
				class="wpb_vc_param_value <?php echo esc_attr( $settings['param_name'] ) . esc_attr( $settings['type'] ) . '_field'; ?>"
				value="<?php echo esc_attr( $value ); ?>">
			<ul>
				<?php foreach ($settings['value'] as $option) { ?>
					<li>
						<input <?php if ($option['key'] == $value) echo 'checked="checked"'; ?> type="radio" class="wpb_vc_param_value" data-value="<?php echo $option['key']; ?>">
						<label>
							<img src="<?php echo $option['icon']; ?>" alt="">
							<p class="ohio_extra_choose_box_title"><?php echo $option['title']; ?></p>
						</label>
					</li>
				<?php } ?>
			</ul>
		</div>
<?php

		$content = ob_get_contents();
		ob_end_clean();
		return $content;
	}