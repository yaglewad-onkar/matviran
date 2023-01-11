<?php

/**
* WPBakery Page Builder Ohio Accordion shortcode view
*/

?>
<div class="ohio-horizontal_accordion-sс horizontal_accordion <?php echo $horizontal_accordion_class; ?><?php echo $css_class; ?>" 
	id="<?php echo esc_attr( $horizontal_accordion_uniqid ); ?>"
	data-ohio-horizontal-accordion="0"
	<?php if ( $appearance_effect != 'none' ) { echo ' data-aos="' . $appearance_effect . '"'; } ?> 
	<?php if ( $appearance_duration ) { echo ' data-aos-duration="' . intval( $appearance_duration ) . '"'; } ?>
		<?php if ( $appearance_delay ) echo ' data-aos-delay="' . $appearance_delay . '"'; ?>
	<?php if ( !$appearance_once ) echo ' data-aos-once="true"'; ?>>

	<?php echo do_shortcode( $content ); ?>

</div>