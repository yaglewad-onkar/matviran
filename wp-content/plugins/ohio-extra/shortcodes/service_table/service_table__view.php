<?php

/**
* WPBakery Page Builder Ohio Service Table shortcode view
*/

?>
<div class="service <?php echo implode( ' ', $wrap_classes ); ?>"
	id="<?php echo esc_attr( $service_table_uniqid ); ?>" 
	<?php if ( $appearance_effect != 'none' ) { echo ' data-aos="' . esc_attr( $appearance_effect ) . '"'; } ?> 
	<?php if ( $appearance_duration ) { echo ' data-aos-duration="' . esc_attr( $appearance_duration ) . '"'; } ?>
		<?php if ( $appearance_delay ) echo ' data-aos-delay="' . $appearance_delay . '"'; ?>
	<?php if ( !$appearance_once ) echo ' data-aos-once="true"'; ?>>

	<div class="service_icon">
		<?php if ( $icon_type == 'font_icon' && $icon_as_icon ) : ?>
			<span class="<?php echo $icon_as_icon; ?>"></span>
		<?php elseif ( $icon_as_image ) : ?>
			<img src="<?php echo esc_url( $icon_as_image ); ?>" alt="<?php echo esc_attr( $title ); ?>">
		<?php endif; ?>
	</div>

	<?php if ( $title ) : ?>
		<h4 class="service_title"><?php echo $title; ?></h4>
	<?php endif; ?>
	
	<p class="service_subtitle"><?php echo $description; ?></p>

	<?php if ( $features_value ) : ?>
		<ul class="service_list">
		
			<?php foreach ( $features_value as $feature_object ) : ?>
				<li class="service_list_item<?php echo ( ( $feature_object->feature_icon == 'icon_minus' ) ? ' disabled' : ' enabled' ); ?>">
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
</div>