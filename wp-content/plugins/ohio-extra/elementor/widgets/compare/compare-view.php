<div class="ohio-compare-sc compare-shortcode" 
	<?php if ( empty( $settings['use_label'] ) ) { echo 'data-compare-without-overlay="true"'; } ?> 
	<?php if ( !empty( $settings['before_label'] ) ) { echo 'data-compare-before-label="' . $settings['before_label'] . '"'; } ?> 
	<?php if ( !empty( $settings['after_label'] ) ) { echo 'data-compare-after-label="' . $settings['after_label'] . '"'; } ?> 
	<?php if ( !empty( $settings['orientation'] ) ) { echo ' data-compare-orientation="' . $settings['orientation'] . '"'; } ?>
	data-compare-position="<?php echo $position; ?>">

	<?php if ( !empty( $settings['first_image'] ) ): ?>
		<img
			src="<?php echo esc_url( $settings['first_image']['url'] ); ?>"
			srcset="<?php echo wp_get_attachment_image_srcset( $settings['first_image']['id'], 'large' ) ?>"
			sizes="<?php echo wp_get_attachment_image_sizes( $settings['first_image']['id'], 'large' ) ?>"
			alt="<?php esc_html_e( 'Before', 'ohio-extra' ); ?>">
	<?php endif; ?>

	<?php if ( !empty( $settings['second_image'] ) ): ?>
		<img
			src="<?php echo esc_url( $settings['second_image']['url'] ); ?>"
			srcset="<?php echo wp_get_attachment_image_srcset( $settings['second_image']['id'], 'large' ) ?>"
			sizes="<?php echo wp_get_attachment_image_sizes( $settings['second_image']['id'], 'large' ) ?>"
			alt="<?php esc_html_e( 'After', 'ohio-extra' ); ?>">
	<?php endif; ?>

</div>