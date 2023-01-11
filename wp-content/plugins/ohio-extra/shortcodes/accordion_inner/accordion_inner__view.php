<?php

/**
* WPBakery Page Builder Ohio Accordion Inner shortcode view
*/

?>
<div id="<?php echo $accordion_inner_uniqid; ?>" class="accordionItem <?php echo $css_class; ?>">
	<div class="accordionItem_title">
		<?php if ( $with_icon && $icon_as_icon) : ?>
			<i class="icon <?php echo $icon_as_icon; ?>"></i>
		<?php endif; ?>
		<h6><?php echo $heading; ?></h6>
		<div class="accordionItem_control btn-round btn-round-small btn-round-light">
			<i class="ion ion-chevron-down"></i>
		</div>
	</div>
	<div class="accordionItem_content <?php echo $accordion_content_class ?>">
		<div class="wrap">
			<?php echo do_shortcode( $content_html ); ?>
		</div>
	</div>
</div>