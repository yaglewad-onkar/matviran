<?php

	/**
	* Visual Composer Ohio WooCommerce category type
	*/
	if ( function_exists ( 'vc_add_shortcode_param' ) ) {
		vc_add_shortcode_param( 'ohio_woo_categories_types', 'ohio_woo_categories_types', plugins_url( 'woo_cats_types.js' , __FILE__ ) );
	}
	
	function ohio_woo_categories_types( $settings, $value ) {
		$exploded_value = explode(',', $value);
		$categories = get_terms( array(
			'taxonomy' => 'product_cat',
			'hide_empty' => false,
		) );

		ob_start();

?>
		<div class="ohio_extra_woo_categories_types_block">
			<input type="hidden" name="<?php echo esc_attr( $settings['param_name'] ); ?>" class="wpb_vc_param_value" value="<?php echo esc_attr( $value ); ?>">
			<select multiple="multiple">
				<?php
					foreach ($categories as $key => $category) {
						echo '<option value="' . $category->slug . '"';
						if ( in_array( $category->term_id, $exploded_value ) || in_array( $category->slug, $exploded_value ) ) {
							echo ' selected="selected"';
						}
						echo '>' . $category->name . '</option>';
					}
				?>
			</select>
		</div>
<?php

		$content = ob_get_contents();
		ob_end_clean();
		return $content;
	}