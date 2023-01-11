<?php

/**
* WPBakery Page Builder Ohio Pricing Table shortcode view
*/

?>
<div class="pricing text-left<?php echo esc_attr($css_class) ?>"
	id="<?php echo esc_attr( $pricing_table_uniqid ); ?>" 
	<?php if ( $appearance_effect != 'none' ) { echo ' data-aos="' . esc_attr( $appearance_effect ) . '"'; } ?> 
	<?php if ( $appearance_duration ) { echo ' data-aos-duration="' . esc_attr( $appearance_duration ) . '"'; } ?>
		<?php if ( $appearance_delay ) echo ' data-aos-delay="' . $appearance_delay . '"'; ?>
	<?php if ( !$appearance_once ) echo ' data-aos-once="true"'; ?>>

	<?php if ( $title ) : ?>
		<h3 class="pricing_title"><?php echo $title; ?></h3>
	<?php endif; ?>
	
	<?php if ( $subtitle ) : ?>
		<p class="subtitle pricing_subtitle"><?php echo $subtitle; ?></p>
	<?php endif; ?>

	<div class="pricing_price">
		<h2 class="pricing_price_title">
			<?php if ( $price_currency ) : ?>
				<?php echo $price_currency.$price; ?>
			<?php else: ?>
				<?php echo $price; ?>
			<?php endif; ?>
			
		</h2>
		<?php if ( $price_caption ) : ?>
			<br>
			<div class="pricing_price_time uppercase"><?php echo $price_caption; ?></div>
		<?php endif;	?>

		<p class="pricing_price_subtitle"><?php echo $description; ?></p>
	</div><!--pricing-table-price-->

	<?php if ( $features_value ) : ?>
		<ul class="pricing_list">
		
			<?php foreach ( $features_value as $feature_object ) : ?>
				<li class="pricing_list_item<?php echo ( ( $feature_object->feature_icon == 'icon_minus' ) ? ' disabled' : ' enabled' ); ?>">
					<?php if ( $feature_object->feature_icon ) : ?>
						<?php if ( $feature_object->feature_icon == 'icon_plus' ) : ?>
							<i class="ion ion-ios-checkmark"></i>
						<?php elseif ( $feature_object->feature_icon == 'icon_minus' ) : ?>
							<i class="ion ion-ios-close"></i>
						<?php endif; ?>
					<?php endif; ?>

					<?php if ( $feature_object->feature_title ) : ?>
						<span class="title"><?php echo $feature_object->feature_title; ?></span>
					<?php endif; ?>
				</li>
			<?php endforeach; ?>

		</ul><!--.list-box-->
	<?php endif; ?>

	<?php if ( $add_button ) : ?>
		<a href="<?php echo $button_link['url']; ?>" class="btn<?php echo $button_css['classes']; ?>"<?php if ( $button_link['blank'] ) { echo ' target="_blank"'; } ?>><?php echo $button_link['caption']; ?>
			<?php if ( $button_settings['type'] == 'arrow_link' ): ?>
				<span class="icon-arrow ion-ios-arrow-thin-right"></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>
</div>