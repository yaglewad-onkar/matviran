<?php

/**
* WPBakery Page Builder Ohio Compare shortcode view
*/

?>
<div class="ohio-compare-sc compare-shortcode <?php echo esc_attr( $css_class ); ?>" 
	id="<?php echo esc_attr( $compare_uniqid ); ?>" 
	<?php if ( $hide_overlay ) { echo ' data-compare-without-overlay="true"'; } ?> 
	<?php if ( $label_before ) { echo ' data-compare-before-label="' . $label_before . '"'; } ?> 
	<?php if ( $label_after ) { echo ' data-compare-after-label="' . $label_after . '"'; } ?> 
	<?php if ( $position ) { echo ' data-compare-position="' . $position . '"'; } ?> 
	<?php if ( $orientation ) { echo ' data-compare-orientation="' . $orientation . '"'; } ?>
	<?php if ( $appearance_effect != 'none' ) { echo ' data-aos="' . esc_attr( $appearance_effect ) . '"'; } ?> 
	<?php if ( $appearance_duration ) { echo ' data-aos-duration="' . esc_attr( $appearance_duration ) . '"'; } ?>
		<?php if ( $appearance_delay ) echo ' data-aos-delay="' . $appearance_delay . '"'; ?>
	<?php if ( !$appearance_once ) echo ' data-aos-once="true"'; ?>>

	<img <?php echo $first_image_atts; ?> />
	<img <?php echo $second_image_atts; ?> />

</div>