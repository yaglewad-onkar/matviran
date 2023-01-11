<?php

/**
* WPBakery Page Builder Ohio Call To Action shortcode view
*/

?>
<div class="ohio-cta-sc cta<?php echo $css_class; ?>"
	id="<?php echo esc_attr( $call_to_action_uniqid ); ?>"
	<?php if ( $appearance_effect != 'none' ) { echo ' data-aos="' . esc_attr( $appearance_effect ) . '"'; } ?> 
	<?php if ( $appearance_duration ) { echo ' data-aos-duration="' . esc_attr( $appearance_duration ) . '"'; } ?>
		<?php if ( $appearance_delay ) echo ' data-aos-delay="' . $appearance_delay . '"'; ?>
	<?php if ( !$appearance_once ) echo ' data-aos-once="true"'; ?>>

	<div class="cta-details">
		<h3 class="title font-titles">
			<?php echo $title; ?>
		</h3>
		<?php if ( $subtitle ) : ?>
			<p class="subtitle">
				<?php echo $subtitle; ?>
			</p>
		<?php endif; ?>
	</div>

	<div class="cta-buttons">
		<a href="<?php echo esc_url( $link['url'] ); ?>"<?php if ( $link['blank'] ) echo ' target="_blank"'; ?> 
		class="btn<?php echo $button_css['classes'] . $css_class; ?>">
			<?php if ( $icon_use && $icon_as_icon && $icon_position == 'left' ): ?>
				<i class="ion ion-left <?php echo $icon_as_icon; ?>"></i>
			<?php endif; ?>
			
			<span class="text"><?php echo $link['caption']; ?></span>
			
			<?php if ( $icon_use && $icon_as_icon && $icon_position == 'right' ): ?>
				<i class="ion ion-right <?php echo $icon_as_icon; ?>"></i>
			<?php endif; ?>
		</a>
	</div>
</div>