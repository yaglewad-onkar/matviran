<?php

/**
* Visual Composer Ohio Circle Progress Bar shortcode view
*/

?>
<div class="ohio-circle-progres-bar-sc circle-progress-bar <?php echo $chart_class . $css_class; ?>"
	id="<?php echo esc_attr( $chart_box_uniqid ); ?>"
	<?php if ( $appearance_effect != 'none' ) { echo ' data-aos="' . esc_attr( $appearance_effect ) . '"'; } ?> 
	<?php if ( $appearance_duration ) { echo ' data-aos-duration="' . intval( $appearance_duration ) . '"'; } ?>
		<?php if ( $appearance_delay ) echo ' data-aos-delay="' . $appearance_delay . '"'; ?>
	<?php if ( !$appearance_once ) echo ' data-aos-once="true"'; ?>
	data-percent-value="<?php echo esc_attr( $percent ); ?>">
	<div class="circle-progress-bar-circle">
		<div class="circle" >
			<svg class="progress" width="110" height="110" viewBox="0 0 110 110">
				<circle class="progress__meter" cx="55" cy="55" r="49" stroke-width="6" />
				<circle class="progress__value" cx="55" cy="55" r="49" stroke-width="6" />
			</svg>

			<?php if ( $layout == "icon" ): ?>
				<?php if ( $icon_as_icon ): ?>
					<div class="percent-wrap">
						<span class="<?php echo esc_attr( $icon_as_icon ); ?>"></span>
					</div>
				<?php elseif ( $icon_as_image ): ?>
					<div class="percent-wrap">
						<img <?php echo $icon_image_atts ?> />
					</div>
				<?php endif;?>
			<?php else: ?>
				<div class="percent-wrap">
					<h4><span class="percent">0</span>%</h4>
				</div>
			<?php endif; ?>
		</div>
	</div>
	<div class="circle-progress-bar-content text-center">
		<?php if ( $layout == "icon" ): ?>
			<div class="percent-wrap">
				<h4><span class="percent">0</span>%</h4>
			</div>
		<?php endif; ?>

		<?php if ( $title ): ?>
			<h6 class="circle-progress-bar-title title heading-sm">
				<?php echo $title; ?>
			</h6>
		<?php endif; ?>
	</div>
	<div class="pie" data-chart-box="true" data-percent="<?php echo esc_attr( $percent ); ?>"<?php if ( $chart_color ) echo ' data-color="' . $chart_color . '"'; ?>>
		<div class="pie-content<?php echo $chart_content_settings_class; ?>">

		</div>
	</div>
</div>