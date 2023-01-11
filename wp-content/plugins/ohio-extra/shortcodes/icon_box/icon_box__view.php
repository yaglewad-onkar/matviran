<?php

/**
* WPBakery Page Builder Ohio Icon Box shortcode view
*/

?>
<div class="ohio-icon-box-sc <?php echo $icon_box_class_main . $css_class; ?> <?php if ( $content_full == 'full' ) { echo 'with-full-icon'; } ?><?php echo $icon_box_class_icon; ?>" 
	id="<?php echo esc_attr( $icon_box_uniqid ); ?>" 
	<?php if ( $appearance_effect != 'none' ) { echo ' data-aos="' . esc_attr( $appearance_effect ) . '"'; } ?> 
	<?php if ( $appearance_duration ) { echo ' data-aos-duration="' . esc_attr( $appearance_duration ) . '"'; } ?>
		<?php if ( $appearance_delay ) echo ' data-aos-delay="' . $appearance_delay . '"'; ?>
	<?php if ( !$appearance_once ) echo ' data-aos-once="true"'; ?>>

	<div class="icon-box-headline">
		<div class="icon-box-icon">
			<?php if ( $icon_type == 'font_icon' && $icon_as_icon ) : ?>
				<i class="<?php echo $icon_as_icon; ?>"></i>
			<?php elseif ( $icon_as_image ) : ?>
				<img <?php echo $icon_image_atts; ?>>
			<?php endif; ?>
		</div>
		<h5 class="icon-box-title heading-sm"><?php echo $title; ?></h5>
	</div>

	<p class="icon-box-details">
		<?php echo $description; ?>
	</p>

	<?php if ( $use_link ) : ?>
		<a class="btn<?php echo $button_css['classes']; ?>" href="<?php echo esc_url( $link_url['url'] ); ?>"
		<?php if ( $link_url['blank'] ) { echo ' target="_blank"'; } ?>>
			<?php echo $link_url['caption']; ?>
			<?php if( $button_settings['type'] == 'arrow_link' ) : ?>
				<i class="ion-right ion"><svg class="arrow-icon" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 8H15M15 8L8.5 1.5M15 8L8.5 14.5" stroke-width="2" stroke-linejoin="round"/></svg></i>
			<?php endif; ?>
		</a>
	<?php endif; ?>

</div>