<?php

/**
* WPBakery Page Builder Ohio Process shortcode view
*/

?>
<div class="ohio-process-sc process <?php echo $css_class; ?>"
	id="<?php echo esc_attr( $process_uniqid ); ?>"
	<?php if ( $appearance_effect != 'none' ) { echo ' data-aos="' . $appearance_effect . '"'; } ?> 
	<?php if ( $appearance_duration ) { echo ' data-aos-duration="' . intval( $appearance_duration ) . '"'; } ?>
		<?php if ( $appearance_delay ) echo ' data-aos-delay="' . $appearance_delay . '"'; ?>
	<?php if ( !$appearance_once ) echo ' data-aos-once="true"'; ?>>
	<h6 class="process-number heading-sm"><?php echo $number; ?></h6>
	<h3 class="process-headline"><?php echo $title; ?></h3>
	<p class="process-description"><?php echo $description; ?></p>
</div>