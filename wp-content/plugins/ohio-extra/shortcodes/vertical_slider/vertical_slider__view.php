<?php

/**
* WPBakery Page Builder Ohio Vertical Fullscreen Slider shortcode view
*/

?>
<div class="ohio-fullscreen-slider-sc fullscreen-slider clb-slider-scroll-bar <?php echo implode( ' ', $wrap_classes ); ?>" 
	id="<?php echo esc_attr( $split_pages_uniqid ); ?>"
	data-options='<?php echo $onepage_json; ?>' 
	data-fullscreen-slider="true">
	<?php echo do_shortcode( $content ); ?>
</div>
<div class="clb-scroll-top clb-slider-scroll-top vc_hidden-md vc_hidden-sm vc_hidden-xs">
    <div class="clb-scroll-top-bar">
        <div class="scroll-track" style="width: 25%;"></div>
    </div>
    <div class="clb-scroll-top-holder font-titles">
        <?php esc_html_e( 'Scroll', 'ohio-extra' ); ?>
    </div>
</div>