<?php

/**
* WPBakery Page Builder Ohio Counter shortcode view
*/

?>
<div class="ohio-counter-box-sc counter-box <?php echo implode( ' ', $wrap_classes ); ?>" 
	id="<?php echo esc_attr( $counter_box_uniqid ); ?>"
	<?php if ( $appearance_effect != 'none' ) { echo ' data-aos="' . $appearance_effect . '"'; } ?> 
	<?php if ( $appearance_duration ) { echo ' data-aos-duration="' . $appearance_duration . '"'; } ?>
		<?php if ( $appearance_delay ) echo ' data-aos-delay="' . $appearance_delay . '"'; ?>
	<?php if ( !$appearance_once ) echo ' data-aos-once="true"'; ?>>

	<?php if ( $layout == "number_with_icon" && $icon_position == 'top' ): ?>
		<?php if ( $icon_as_icon ) : ?>
			<i class="counter-box-icon top-icon <?php echo $icon_as_icon; ?>"></i>
		<?php elseif ( $icon_as_image ) : ?>
			<img class="top-icon" <?php echo $icon_image_atts; ?>>
		<?php endif; ?>
	<?php endif; ?>

	<div class="counter-box-count" data-counter="<?php echo $count_number; ?>">
		<?php if ( $layout == "number_with_icon" && $icon_position == 'left' ): ?>
			<?php if ( $icon_as_icon ) : ?>
				<i class="counter-box-icon left-icon <?php echo $icon_as_icon; ?>"></i>
			<?php elseif ( $icon_as_image ) : ?>
				<img class="left-icon" <?php echo $icon_image_atts; ?>>
			<?php endif; ?>
		<?php endif; ?>
		<span class="count">0</span> <span class="plus-symbol"><?php if ( $plus_symbol ) { echo esc_html( "+" ); } ?></span>  
		<?php if ( $layout == "number_with_icon" && $icon_position == 'right' ): ?>
			<?php if ( $icon_as_icon ) : ?>
				<i class="counter-box-icon right-icon <?php echo $icon_as_icon; ?>"></i>
			<?php elseif ( $icon_as_image ) : ?>
				<img class="right-icon" <?php echo $icon_image_atts; ?>>
			<?php endif; ?>
		<?php endif; ?>
	</div>
	<?php if ( $title ): ?>
		<h6 class="counter-box-headline heading-sm"><?php echo $title; ?></h6>
	<?php endif; ?>
</div>