<?php

/**
* WPBakery Page Builder Ohio Heading shortcode view
*/

?>
<div class="ohio-heading-sc heading<?php echo $css_class; ?>"
	id="<?php echo esc_attr( $headings_uniqid ); ?>" 
	<?php if ( $appearance_effect != 'none' ) { echo ' data-aos="' . esc_attr( $appearance_effect ) . '"'; } ?> 
	<?php if ( $appearance_duration ) { echo ' data-aos-duration="' . intval( $appearance_duration ) . '"'; } ?>
		<?php if ( $appearance_delay ) echo ' data-aos-delay="' . $appearance_delay . '"'; ?>
	<?php if ( !$appearance_once ) echo ' data-aos-once="true"'; ?>>
	
	<?php if ( $subtitle_type_layout == 'top_subtitle' ) : ?>
		<p class="subtitle">
			<?php echo $subtitle; ?>
		</p>
	<?php endif; ?>

	<?php if ( $divider_visible && $divider_alignment == 'before_title' ) : ?>
		<div class="divider"></div>
	<?php endif; ?>

	<<?php echo $heading_type; ?> class="title<?php echo $title_settings_class; ?>">
		<?php echo $title; ?>
	</<?php echo $heading_type; ?>>

	<?php if ( $divider_visible && $divider_alignment == 'after_title' ) : ?>
		<div class="divider"></div>
	<?php endif; ?>

	<?php if ( $subtitle_type_layout == 'bottom_subtitle' ) : ?>
		<p class="subtitle">
			<?php echo $subtitle; ?>
		</p>
	<?php endif; ?>
	
</div>