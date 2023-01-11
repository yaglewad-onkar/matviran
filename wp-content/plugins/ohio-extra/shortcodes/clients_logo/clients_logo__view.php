<?php

/**
* WPBakery Page Builder Ohio Clients logo shortcode view
*/

?>
<div class="ohio-client-logo-sc client-logo text-center<?php echo $css_class; ?>"
	id="<?php echo esc_attr( $clients_logo_uniqid ); ?>"
	<?php if ( $appearance_effect != 'none' ) { echo ' data-aos="' . $appearance_effect . '"'; } ?>
	<?php if ( $appearance_duration ) { echo ' data-aos-duration="' . $appearance_duration . '"'; } ?>
		<?php if ( $appearance_delay ) echo ' data-aos-delay="' . $appearance_delay . '"'; ?>
	<?php if ( !$appearance_once ) echo ' data-aos-once="true"'; ?>>

	<?php if ($link): ?>
		<a href="<?php echo $link ?>"<?php echo $in_new_tab ? ' target="_blank"' : '' ?>>
	<?php endif; ?>

		<?php if ( ! $layout_type || $layout_type == 'default' ) : ?>
			<div class="client-logo-inner client-logo-default">
				<div class="client-logo-img">
					<img <?php echo $image_logo_atts; ?>>
				</div>
			</div>

		<?php endif; ?>

		<?php if ( $layout_type == 'overlay' ) : ?>
			<div class="client-logo-inner client-logo-overlay logo-overlay-color">
				<div class="client-logo-img">
					<img <?php echo $image_logo_atts; ?>>
				</div>
				<div class="client-logo-details logo-overlay-color"><p><?php echo $description; ?></p></div>
			</div>
		<?php endif; ?>
		
	<?php if ($link): ?>
		</a>
	<?php endif; ?>
</div>
