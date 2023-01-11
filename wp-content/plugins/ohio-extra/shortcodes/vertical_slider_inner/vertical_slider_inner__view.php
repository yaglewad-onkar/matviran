<?php

/**
* WPBakery Page Builder Ohio Vertical Slider Page shortcode view
*/

?>
<div class="<?php echo esc_attr($css_class) ?>" id="<?php echo $split_page_uniqid; ?>"
	<?php if( $pagination_color ) { echo ' data-pagination-color="' . esc_attr( $pagination_color ) . '"'; } ?>
	<?php if( $header_nav_color ) { echo ' data-header-nav-color="' . esc_attr( $header_nav_color ) . '"'; } ?>
	<?php if( $social_networks_color ) { echo ' data-social-networks-color="' . esc_attr( $social_networks_color ) . '"'; } ?>
	<?php if( $search_color ) { echo ' data-search-color="' . esc_attr( $search_color ) . '"'; } ?>
	<?php if( $scroll_to_top_color ) { echo ' data-scroll-to-top-color="' . esc_attr( $scroll_to_top_color ) . '"'; } ?>
	<?php if( $header_logo_type != 'none' ) { echo ' data-header-logo-type="' . esc_attr( $header_logo_type ) . '"'; } ?>>
	<div class="clb-slider-item-inner">
		<?php echo do_shortcode( $content ); ?>
	</div>
</div>