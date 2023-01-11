<?php

/**
* WPBakery Page Builder Ohio Banner shortcode view
*/

?>
<div class="ohio-banner-sc <?php echo $banner_box_class . $css_class; ?>" 
	id="<?php echo esc_attr( $banner_box_uniqid ); ?>"
	<?php if ( $appearance_effect != 'none' ) { echo ' data-aos="' . $appearance_effect . '"'; } ?> 
	<?php if ( $appearance_duration ) { echo ' data-aos-duration="' . intval( $appearance_duration ) . '"'; } ?>
		<?php if ( $appearance_delay ) echo ' data-aos-delay="' . $appearance_delay . '"'; ?>
	<?php if ( !$appearance_once ) echo ' data-aos-once="true"'; ?>
	data-tilt-effect='true'>
	<?php if ( $block_type_layout == 'inner' || $block_type_layout == 'inner_hover' ) : ?>
		<div class="banner-holder banner-holder-inner parallax-holder">
			<img class="parallax" <?php echo $background_image_atts; ?>>

			<?php if ( $use_link ) : ?>
				<a data-cursor-class="cursor-link" href="<?php echo $link_url['url']; ?>"<?php if ( $link_url['blank'] ) { echo ' target="_blank"'; } ?>>
			<?php endif; ?>

				<div class="banner-overlay">
					<div class="content">
						<div class="content-top">
							<p class="banner-subtitle"><?php echo $subtitle; ?></p>
							<h3 class="banner-title"><?php echo $title; ?></h3>
						</div>
						<div class="content-bottom">
							<p class="description"><?php echo $description; ?></p>	
						</div>
					</div>
				</div>

			<?php if ( $use_link ) : ?>
				</a>
			<?php endif; ?>

		</div>
	<?php else : ?>
		
		<div class="banner-holder parallax-holder">

			<?php if ( $use_link ) : ?>
				<a data-cursor-class="cursor-link" href="<?php echo $link_url['url']; ?>"<?php if ( $link_url['blank'] ) { echo ' target="_blank"'; } ?>>
			<?php endif; ?>

				<img class="parallax" <?php echo $background_image_atts; ?>>

			<?php if ( $use_link ) : ?>
				</a>
			<?php endif; ?>

			<div class="banner-overlay">
				<p class="description"><?php echo $description; ?></p>
			</div>
		</div>
		<div class="content">
			<p class="banner-subtitle"><?php echo $subtitle; ?></p>
			<?php if ( $use_link ) : ?>
				<a href="<?php echo $link_url['url']; ?>"<?php if ( $link_url['blank'] ) { echo ' target="_blank"'; } ?>>
					<h3 class="banner-title"><?php echo $title; ?></h3>
				</a>
			<?php else : ?>
				<h3 class="banner-title"><?php echo $title; ?></h3>
			<?php endif; ?>
		</div>
	<?php endif; ?>
</div>