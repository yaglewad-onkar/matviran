<?php

/**
 * WPBakery Page Builder Ohio Dynamic Text shortcode view
 */

?>
<div class="ohio-dynamic-text-sc<?php echo $css_class ?>" 
	data-dynamic-text="true"
	data-dynamic-text-options='<?php echo $options_json; ?>'
	id="<?php echo esc_attr( $dynamic_text_uniqid ); ?>"
	<?php if ( $appearance_effect != 'none' ) { echo ' data-aos="' . esc_attr( $appearance_effect ) . '"'; } ?>
	<?php if ( $appearance_duration ) { echo ' data-aos-duration="' . esc_attr( $appearance_duration ) . '"'; } ?>
	<?php if ( $appearance_delay ) echo ' data-aos-delay="' . $appearance_delay . '"'; ?>
	<?php if ( !$appearance_once ) echo ' data-aos-once="true"'; ?>>

	<?php echo $pre_title; ?> <span class="dynamic"></span><?php echo $post_title; ?>

</div>
