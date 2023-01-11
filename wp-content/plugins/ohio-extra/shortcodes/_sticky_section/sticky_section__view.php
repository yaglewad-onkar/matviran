<?php

/**
* WPBakery Page Builder Ohio Vertical Fullscreen Slider shortcode view
*/

?>
<div class="ohio-sticky-section-sc sticky-section <?php echo implode( ' ', $wrap_classes ); ?>" 
	id="<?php echo esc_attr( $sticky_section_unicid ); ?>"
	data-options='<?php echo $sticky_section_json; ?>'>
	<?php echo do_shortcode( $content ); ?>
</div>
