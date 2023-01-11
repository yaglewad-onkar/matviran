
<div class="ohio-client-logo-sc client-logo <?php echo $this->getWrapperClasses(); ?>">

	<?php if ( !empty( $settings['link']['url'] ) ): ?>
		<a <?php echo $this->getLinkAttributesString( $settings['link'] ); ?>>
	<?php endif; ?>

		<?php if ( $settings['clients_logo_layout'] == 'default' ) : ?>
			<div class="client-logo-inner client-logo-default">
				<div class="client-logo-img">
					<img
						src="<?php echo $settings['clients_logo_image']['url']; ?>"
						srcset="<?php echo wp_get_attachment_image_srcset( $settings['clients_logo_image']['id'], 'large' ) ?>"
						sizes="<?php echo wp_get_attachment_image_sizes( $settings['clients_logo_image']['id'], 'large' ) ?>"
						alt="<?php echo esc_attr( $settings['alt_attr'] ); ?>">
				</div>
			</div>
		<?php endif; ?>

		<?php if ( $settings['clients_logo_layout'] == 'overlay' ) : ?>
			<div class="client-logo-inner client-logo-overlay logo-overlay-color">
				<div class="client-logo-img">
					<img
						src="<?php echo $settings['clients_logo_image']['url']; ?>"
						srcset="<?php echo wp_get_attachment_image_srcset( $settings['clients_logo_image']['id'], 'large' ) ?>"
						sizes="<?php echo wp_get_attachment_image_sizes( $settings['clients_logo_image']['id'], 'large' ) ?>"
						alt="<?php echo esc_attr( $settings['alt_attr'] ); ?>">
				</div>
				<div class="client-logo-details logo-overlay-color">
					<p><?php echo $settings['description']; ?></p>
				</div>
			</div>
		<?php endif; ?>
		
	<?php if ( !empty( $settings['link']['url'] ) ): ?>
		</a>
	<?php endif; ?>
</div>
