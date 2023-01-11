<?php

/**
* WPBakery Page Builder Ohio Accordion Inner shortcode view
*/

?>
<div id="<?php echo $horizontal_accordion_inner_uniqid; ?>" class="horizontal_accordionItem <?php echo $css_class; ?>">
	<div class="horizontal_accordionItem_content">
		<div class="wrap">
			<?php echo do_shortcode( $content_html ); ?>
		</div>
	</div>
</div>