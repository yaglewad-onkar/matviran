<?php

/**
* WPBakery Page Builder Ohio Accordion shortcode view
*/

?>
<div class="ohio-content_box-sс content_box <?php echo $css_class; ?>" 
	id="<?php echo esc_attr( $content_box_uniqid ); ?>"
	<?php if ( $appearance_effect != 'none' ) { echo ' data-aos="' . $appearance_effect . '"'; } ?> 
	<?php if ( $appearance_duration ) { echo ' data-aos-duration="' . intval( $appearance_duration ) . '"'; } ?>
		<?php if ( $appearance_delay ) echo ' data-aos-delay="' . $appearance_delay . '"'; ?>
	<?php if ( !$appearance_once ) echo ' data-aos-once="true"'; ?>>
	<div class="content_box_container">
		<?php echo do_shortcode( $content ); ?>
	</div>
	

</div>