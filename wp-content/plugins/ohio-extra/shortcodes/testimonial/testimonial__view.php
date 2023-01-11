<?php

/**
* WPBakery Page Builder Ohio Testimonial shortcode view
*/

?>
<div class="ohio-testimonial-sc testimonial <?php echo implode( ' ', $wrap_classes ); ?>" 
	id="<?php echo esc_attr( $testimonial_uniqid ); ?>"
	<?php if ( $appearance_effect != 'none' ) { echo ' data-aos="' . esc_attr( $appearance_effect ) . '"'; } ?> 
	<?php if ( $appearance_duration ) { echo ' data-aos-duration="' . esc_attr( $appearance_duration ) . '"'; } ?>
		<?php if ( $appearance_delay ) echo ' data-aos-delay="' . $appearance_delay . '"'; ?>
	<?php if ( !$appearance_once ) echo ' data-aos-once="true"'; ?>>
	<?php if ( $block_type_layout == 'photo_top') : ?>
		<div class="author-avatar" style="background-image: url(<?php echo esc_url( $photo ); ?>);"></div>
	<?php endif; ?>
	<blockquote>
		<?php if ($headline ) : ?>
			<h6 class="testimonial-headline heading-sm"><?php echo $headline; ?></h6>
		<?php endif;?>
		<?php echo $quote; ?>
	</blockquote>
	<?php if ( ( $block_type_layout == 'photo_middle' )  ) : ?>
		<div class="author-avatar" style="background-image: url(<?php echo esc_url( $photo ); ?>);"></div>
	<?php endif; ?>
	<div class="author">
		<h6 class="author-name"><?php echo $author; ?></h6>
		<p class="author-details">
			<?php echo $position; ?>
		</p>
	</div>
</div>