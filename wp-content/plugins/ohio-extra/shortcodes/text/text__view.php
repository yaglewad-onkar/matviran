<?php

/**
* WPBakery Page Builder Ohio Text shortcode view
*/

?>
<div class="ohio-text-sc <?php if ( $css_class ) echo $css_class; ?>" 
	id="<?php echo esc_attr( $text_uniqid ); ?>" 
	<?php if ( $appearance_effect != 'none' ) { echo ' data-aos="' . esc_attr( $appearance_effect ) . '"'; } ?> 
	<?php if ( $appearance_duration ) { echo ' data-aos-duration="' . esc_attr( $appearance_duration ) . '"'; } ?>
		<?php if ( $appearance_delay ) echo ' data-aos-delay="' . $appearance_delay . '"'; ?>
	<?php if ( !$appearance_once ) echo ' data-aos-once="true"'; ?>>

	<?php echo do_shortcode( $content_html ); ?>
	
</div>