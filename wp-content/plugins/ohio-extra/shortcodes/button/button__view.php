<?php

/**
* WPBakery Page Builder Ohio Button shortcode view
*/

?>
<div class="ohio-button-sc btn-wrap<?php echo $wrap_class; ?>" 
	id="<?php echo esc_attr( $button_uniqid ); ?>"
	<?php if ( $appearance_effect != 'none' ) { echo ' data-aos="' . $appearance_effect . '"'; } ?> 
	<?php if ( $appearance_duration ) { echo ' data-aos-duration="' . intval( $appearance_duration ) . '"'; } ?>
		<?php if ( $appearance_delay ) echo ' data-aos-delay="' . $appearance_delay . '"'; ?>
	<?php if ( !$appearance_once ) echo ' data-aos-once="true"'; ?>>
	<a href="<?php echo esc_url($link['url']); ?>"<?php if ( $link['blank'] ) echo ' target="_blank"'; ?> 
		class="btn <?php echo $button_class . $css_class; ?>">
		<?php if ( $icon_use && $icon_as_icon && $icon_position == 'left' ): ?>
			<i class="ion-left <?php echo $icon_as_icon; ?>"></i>
		<?php endif; ?>
		<?php if ( $icon_use && $icon_as_image && $icon_position === 'left' ): ?>
			<img class="ion" <?php echo $icon_image_atts; ?> />
		<?php endif; ?>
		<span class="text">
			<?php echo $link['caption']; ?>
		</span>
		<?php if ( $icon_use && $icon_as_icon && $icon_position == 'right' ): ?>
			<i class="ion-right <?php echo $icon_as_icon; ?>"></i>
		<?php endif; ?>
		<?php if ( $icon_use && $icon_as_image && $icon_position === 'right' ): ?>
			<img class="ion" <?php echo $icon_image_atts; ?> />
		<?php endif; ?>
	</a>
</div>