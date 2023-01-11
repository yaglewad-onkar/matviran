<?php
/**
* WPBakery Page Builder Ohio WooCommerce categories shortcode view
*/
?>

<div class="woocommerce ohio-woocommerce-sc <?php echo $css_class; ?>" id="<?php echo esc_attr( $woo_categories_uniqid ); ?>"
	<?php if ( $appearance_effect != 'none' ) { echo ' data-aos="' . esc_attr( $appearance_effect ) . '"'; } ?> 
	<?php if ( $appearance_duration ) { echo ' data-aos-duration="' . esc_attr( $appearance_duration ) . '"'; } ?>
		<?php if ( $appearance_delay ) echo ' data-aos-delay="' . $appearance_delay . '"'; ?>
	<?php if ( !$appearance_once ) echo ' data-aos-once="true"'; ?>>
	<ul class="woo_c-category">
	<?php
    foreach ( $woo_categories as $category ) : ?>
		<li class="product-category vc_col-md-<?php echo $layout_columns_class; ?>">
            <div class="<?php echo $layout_class; ?>">
                <div class="product-category__background-image" style="background-image: url(<?php echo esc_url( $category->image ); ?>)"></div>
				<div class="product-category__info-wrapper<?php echo $alignment_class; ?>">
					<div class="product-category__top-line">
						<?php if ( $subtitle_position == 'top' ) : ?>
						<div class="description product-category__description">
							<?php echo $category->description; ?>
						</div>
						<?php endif; ?>

						<h3 class="second-title product-category__title">
							<a href="<?php echo esc_url( $category->url ); ?>"><?php echo $category->title; ?></a>
						</h3>

						<?php if ( $subtitle_position == 'bottom' ) : ?>
						<div class="description product-category__description">
							<?php echo $category->description; ?>
						</div>
						<?php endif; ?>
						<a href="<?php echo esc_url( $category->url ); ?>" class="shop-now btn<?php echo $button_class; ?>">
							<?php esc_html_e( 'Start Shopping', 'ohio-extra' ); ?>
							<i class="ion-right ion ion-ios-arrow-forward"></i>
						</a>
					</div>
				</div>
            </div>
		</li>
	<?php endforeach; ?>
	</ul>
</div>