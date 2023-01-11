<?php

/**
* WPBakery Page Builder Ohio Carousel shortcode view
*/

?>
<div class="ohio-slider-sc slider-wrap">
	<div class="slider ohio-slider <?php echo $slider_class . $css_class; ?>" id="<?php echo esc_attr( $slider_uniqid ); ?>" data-ohio-slider='<?php echo $slider_json; ?>'
	<?php if ( $appearance_effect != 'none' ) { echo ' data-aos="' . esc_attr( $appearance_effect ) . '"'; } ?>
	<?php if ( $appearance_duration ) { echo ' data-aos-duration="' . esc_attr( $appearance_duration ) . '"'; } ?>
		<?php if ( $appearance_delay ) echo ' data-aos-delay="' . $appearance_delay . '"'; ?>
	<?php if ( !$appearance_once ) echo ' data-aos-once="true"'; ?>>
		<?php echo do_shortcode( $content ); ?>
	</div>

	<?php if ($preloader) :?>
		<svg class="spinner sk-preloader" viewBox="0 0 50 50"><circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="4"></circle></svg>
	<?php endif; ?>
</div>