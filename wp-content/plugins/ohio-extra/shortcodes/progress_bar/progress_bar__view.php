<?php

/**
* WPBakery Page Builder Ohio Progress Bar shortcode view
*/

?>
<div class="ohio-progress-bar-sc progress-bar <?php echo $progress_bar_class; ?><?php echo $css_class; ?>"
	id="<?php echo esc_attr( $progress_bar_uniqid ); ?>"
	data-ohio-progress-bar="<?php echo esc_attr( $percent ); ?>"
	<?php if ( $appearance_effect != 'none' ) { echo ' data-aos="' . $appearance_effect . '"'; } ?> 
	<?php if ( $appearance_duration ) { echo ' data-aos-duration="' . intval( $appearance_duration ) . '"'; } ?>
	<?php if ( $appearance_delay ) echo ' data-aos-delay="' . $appearance_delay . '"'; ?>
	<?php if ( !$appearance_once ) echo ' data-aos-once="true"'; ?>>
	<h6 class="progress-bar-headline heading-sm">
		<?php echo $name; ?>
		<?php if ( !$percent_in_tooltip ) : ?>
			<span><span class="percent">0</span>%</span>
		<?php endif; ?>
	</h6>
	<div class="progress-bar-track"<?php if ( $percent_in_tooltip ) { echo ' data-tooltip="true"'; } ?>>
		<div class="progress-bar-track-inner line brand-bg-color">
			<?php if ( $percent_in_tooltip ) : ?>
				<div class="line-percent">
					<span class="percent">0</span>%
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>