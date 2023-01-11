<?php

/**
* WPBakery Page Builder Ohio Accordion shortcode view
*/

?>
<div class="ohio-accordion-sс accordion <?php echo $accordion_class; ?><?php echo $css_class; ?>" 
	id="<?php echo esc_attr( $accordion_uniqid ); ?>"
	data-ohio-accordion="0"
	<?php if ( $appearance_effect != 'none' ) { echo ' data-aos="' . $appearance_effect . '"'; } ?> 
	<?php if ( $appearance_duration ) { echo ' data-aos-duration="' . intval( $appearance_duration ) . '"'; } ?>
		<?php if ( $appearance_delay ) echo ' data-aos-delay="' . $appearance_delay . '"'; ?>
	<?php if ( !$appearance_once ) echo ' data-aos-once="true"'; ?>>

	<?php echo do_shortcode( $content ); ?>

</div>