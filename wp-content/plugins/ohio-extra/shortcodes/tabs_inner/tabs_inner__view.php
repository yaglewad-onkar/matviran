<?php

/**
* WPBakery Page Builder Ohio Tabs Inner shortcode view
*/

?>
<div class="tabItems_item<?php echo $css_class; ?>" data-title="<?php echo esc_attr( $title ); ?>" id="<?php echo esc_attr( $tab_id ); ?>">

	<?php echo do_shortcode( $content_html ); ?>
	
</div>