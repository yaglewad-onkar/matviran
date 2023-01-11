<?php

/**
* WPBakery Page Builder Ohio Video shortcode view
*/

if ( $layout == 'with_preview' ) : ?>

	<div class="ohio-video-module-sc video-module video-module-preview open-popup<?php echo $css_class . ' ' . $video_module_class; ?>"
		id="<?php echo esc_attr( $video_module_uniqid ); ?>"
		data-video-module="<?php if( $link ) { echo esc_attr( $link ); } ?>"
		<?php if ( $appearance_effect != 'none' ) { echo ' data-aos="' . esc_attr( $appearance_effect ) . '"'; } ?> 
		<?php if ( $appearance_duration ) { echo ' data-aos-duration="' . esc_attr( $appearance_duration ) . '"'; } ?>
			<?php if ( $appearance_delay ) echo ' data-aos-delay="' . $appearance_delay . '"'; ?>
	<?php if ( !$appearance_once ) echo ' data-aos-once="true"'; ?>>

		<?php if ( $preview_image ): ?>
			<img class="preview-image" <?php echo $preview_image_atts; ?>>
		<?php endif; ?>

		<div class="video-module-holder">
			<div class="btn-play btn-round<?php echo $button_settings_class; ?>" tabindex='1'>
				<i class="ion ion-ios-play" ></i>
			</div>
			<?php if ( $title ): ?>
				<h6 class="video-headline"><?php echo $title; ?></h6>
			<?php endif; ?>
		</div>
	</div>

<?php else: ?>

	<div class="text-<?php echo $alignment; ?>">
		<div class="ohio-video-module-sc video-module open-popup<?php echo $css_class . ' ' . $video_module_class; ?>"
		id="<?php echo $video_module_uniqid; ?>"
		data-video-module="<?php if ( $link ) { echo esc_url( $link ); } ?>"
		data-video-module-autoplay="<?php if ( $autoplay_option ) { echo esc_attr( 'true' ); } ?>"
		<?php if ( $appearance_effect != 'none' ) { echo ' data-aos="' . $appearance_effect . '"'; } ?> 
		<?php if ( $appearance_duration ) { echo ' data-aos-duration="' . intval( $appearance_duration ) . '"'; } ?>
		<?php if ( $appearance_delay ) echo ' data-aos-delay="' . $appearance_delay . '"'; ?>
		<?php if ( !$appearance_once ) echo ' data-aos-once="true"'; ?>>

			<div class="video-module-holder">
				<div class="btn-play btn-round<?php echo $button_settings_class; ?>" tabindex='1'>
					<i class="ion ion-ios-play"></i>
				</div>
				<?php if ( $title ) : ?>
				<h6 class="video-headline"><?php echo $title; ?></h6>
				<?php endif; ?>	
			</div>
		</div>
	</div>

<?php endif; ?>