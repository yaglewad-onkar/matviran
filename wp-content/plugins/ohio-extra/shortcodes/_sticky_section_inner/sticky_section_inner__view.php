<?php

/**
* WPBakery Page Builder Ohio Sticky Section Page shortcode view
*/

?>
<div class="sticky-section-item <?php echo esc_attr($css_class) ?>" id="<?php echo $split_page_uniqid; ?>"
	<?php if( $social_networks_color ) { echo ' data-social-networks-color="' . esc_attr( $social_networks_color ) . '"'; } ?>
	<?php if( $search_color ) { echo ' data-search-color="' . esc_attr( $search_color ) . '"'; } ?>
	<?php if( $scroll_to_top_color ) { echo ' data-scroll-to-top-color="' . esc_attr( $scroll_to_top_color ) . '"'; } ?>
	<?php if( $header_logo_type != 'none' ) { echo ' data-header-logo-type="' . esc_attr( $header_logo_type ) . '"'; } ?>>
		<div class="sticky-section-item-image-wrapper">
			<div class="sticky-section-item-first-image"></div>
			<div class="sticky-section-item-second-image"></div>
		</div>

		<div class="sticky-section-item-content">
		<?php echo do_shortcode( $content ); ?>
		</div>
		

</div>