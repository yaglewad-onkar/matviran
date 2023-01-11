<?php

/**
* WPBakery Page Builder Ohio Message Module shortcode view
*/

?>
<div class="ohio-message-module-sc message-box <?php echo $message_box_class . $css_class; ?>"
	id="<?php echo esc_attr( $message_box_uniqid ); ?>" 
	<?php if ( $appearance_effect != 'none' ) { echo ' data-aos="' . esc_attr( $appearance_effect ) . '"'; } ?> 
	<?php if ( $appearance_duration ) { echo ' data-aos-duration="' . esc_attr( $appearance_duration ) . '"'; } ?>
		<?php if ( $appearance_delay ) echo ' data-aos-delay="' . $appearance_delay . '"'; ?>
	<?php if ( !$appearance_once ) echo ' data-aos-once="true"'; ?>>
	
	<?php echo $text; ?>

	<?php if ( $link ): ?>
		<a href="<?php echo esc_url( $link['url'] ); ?>"	<?php if ( $link['blank'] ) echo ' target="_blank"'; ?>>
			<?php echo $link['caption']; ?>
		</a>
	<?php endif; ?>

	<?php if ( ! $without_close_button ) : ?>
		<div class="btn-round btn-round-light btn-round-small clb-close">
			<i class="ion ion-md-close"></i>
		</div>
	<?php endif; ?>
</div>