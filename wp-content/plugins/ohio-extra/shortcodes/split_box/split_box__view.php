<?php

/**
* WPBakery Page Builder Ohio Split Box shortcode view
*/

?>
<div class="ohio-split-box-sc split-box<?php echo $css_class; echo $full_vh_class; ?>" id="<?php echo $split_box_uniqid; ?>" 
	<?php if ( $bg_first_parallax ) echo 'data-parallax-left="' . esc_attr( $bg_first_parallax ) . '" '; ?>
	<?php if ( $bg_second_parallax ) echo 'data-parallax-right="' . esc_attr( $bg_second_parallax ) . '" '; ?>
	<?php if ( $bg_first_parallax ) echo 'data-parallax-speed-left="' . esc_attr( $bg_first_parallax_speed ) . '" '; ?>
	<?php if ( $bg_second_parallax ) echo 'data-parallax-speed-right="' . esc_attr( $bg_second_parallax_speed ) . '" '; ?>>
	<?php echo do_shortcode( $content ); ?>
</div>