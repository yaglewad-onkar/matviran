<div class="pricing text-left <?php echo $this->getWrapperClasses(); ?>">

	<?php if ( !empty( $settings['headline']) ) : ?>
		<h3 class="pricing_title"><?php echo $settings['headline']; ?></h3>
	<?php endif; ?>
	
	<?php if ( !empty( $settings['subtitle']) ) : ?>
		<p class="subtitle pricing_subtitle"><?php echo $settings['subtitle']; ?></p>
	<?php endif; ?>

	<?php // Price and caption ?>
	<div class="pricing_price">
		<h2 class="pricing_price_title">
			<?php if ( !empty( $settings['currency'] )  ) : ?>
				<?php echo $settings['currency'] . $settings['price']; ?>
			<?php else: ?>
				<?php echo $settings['price']; ?>
			<?php endif; ?>
		</h2>

		<?php if ( !empty( $settings['caption'] ) ) : ?>
			<br>
			<div class="pricing_price_time uppercase"><?php echo $settings['caption']; ?></div>
		<?php endif; ?>

		<?php if ( !empty( $settings['description'] ) ) : ?>
			<p class="pricing_price_subtitle"><?php echo $settings['description']; ?></p>
		<?php endif; ?>
	</div>

	<?php // Features list ?>
	<?php if ( !empty( $settings['features_list'] ) ) : ?>
	<ul class="pricing_list">

		<?php foreach ( $settings['features_list'] as $item ) : ?>
			<li class="pricing_list_item <?php if ( $item['list_type'] == 'disabled' ) { echo ' disabled'; } ?>">
				<?php if ( $item['list_type'] == 'enabled' ) : ?>
					<i class="ion ion-ios-checkmark"></i>
				<?php elseif ( $item['list_type'] == 'disabled' ) : ?>
					<i class="ion ion-ios-close"></i>
				<?php endif; ?>

				<?php if ( !empty( $item['list_title'] ) ) : ?>
					<span class="title"><?php echo $item['list_title']; ?></span>
				<?php endif; ?>
			</li>
		<?php endforeach; ?>

	</ul>
	<?php endif; ?>

	<?php // Button ?>
	<?php if ( !empty( $settings['use_link'] ) && !empty( $settings['button_link']['url'] ) ) : ?>
		<a 
			class="btn <?php echo esc_attr( $this->getButtonClasses() ); ?>" 
			<?php echo $this->getLinkAttributesString( $settings['button_link'] ); ?>>

			<?php echo $settings['button_title']; ?>

			<?php if ( $settings['button_style_type'] == 'link' ): ?>
				<i class="ion-right ion"><svg class="arrow-icon" width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 7H16M16 7L11 1M16 7L11 13" stroke-width="2"/></svg></i>
			<?php endif; ?>

		</a>
	<?php endif; ?>

</div>