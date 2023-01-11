<?php

/**
* WPBakery Page Builder Ohio Tabs shortcode view
*/

?>
<div class="ohio-tabs-sc tab <?php echo $tab_box_class . $css_class; ?>"
	id="<?php echo esc_attr( $tabs_uniqid ); ?>" 
	data-ohio-tab-box="true" 
	data-options='<?php echo $tab_box_json; ?>' 
	<?php if ( $appearance_effect != 'none' ) { echo ' data-aos="' . esc_attr( $appearance_effect ) . '"'; } ?> 
	<?php if ( $appearance_duration ) { echo ' data-aos-duration="' . esc_attr( $appearance_duration ) . '"'; } ?>
		<?php if ( $appearance_delay ) echo ' data-aos-delay="' . $appearance_delay . '"'; ?>
	<?php if ( !$appearance_once ) echo ' data-aos-once="true"'; ?>>
	
	<div class="tabNav_wrapper">
		<ul class="tabNav font-titles" role="tablist">
			<?php /* Generated tabs here */ ?>
			<li class="tabNav_line brand-bg-color"></li>
		</ul>
	</div>
	<div class="tabItems" role="tabpanel">
		<?php echo do_shortcode( $content ); ?>
	</div>
</div>