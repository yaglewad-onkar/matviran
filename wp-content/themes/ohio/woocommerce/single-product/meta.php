<?php
/**
 * Single Product Meta
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/meta.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product;


$cats = get_the_terms( $post->ID, 'product_cat' );
$tags = get_the_terms( $post->ID, 'product_tag' );
if ($cats) {
	$cat_count = sizeof( $cats );
}
if ($tags) {
	$tag_count = sizeof( $tags );
}

?>
<div class="product_meta">
	<?php do_action( 'woocommerce_product_meta_start' );

	$is_sku = OhioOptions::get( 'woocommerce_product_sku', true );
	$is_category = OhioOptions::get( 'woocommerce_product_category', true );
	$is_tags =  OhioOptions::get( 'woocommerce_product_tags', true );

	if ( $is_sku ) :

		if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>
			<?php if ( $is_category ) : ?>
				<span class="sku_wrapper">
					<?php _e( 'SKU:', 'ohio' ); ?> <span class="sku" itemprop="sku"><?php echo esc_html( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'ohio' ); ?></span>
				</span>
			<?php else: ?>
				<span class="sku_wrapper">
					<?php _e( 'SKU:', 'ohio' ); ?> <span class="sku" itemprop="sku"><?php echo esc_html( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'ohio' ); ?></span>
				</span>
			<?php endif; ?>
		<?php endif;

	endif; ?>

	<?php 
	if ( $is_category ) :

		if ( $cats ): ?>
			<?php if ( $is_tags ): ?>
				<?php echo wc_get_product_category_list( $product->get_id(), ', ', '<span class="woo-c_product_category">' . _n( 'Category:', 'Categories:', $cat_count, 'ohio' ) . ' ', '<span class="dot-divider"></span></span>' ); ?>
			<?php else: ?>
				<?php echo wc_get_product_category_list( $product->get_id(), ', ', '<span class="woo-c_product_category">' . _n( 'Category:', 'Categories:', $cat_count, 'ohio' ) . ' ', '</span>' ); ?>
			<?php endif; ?>
		<?php endif;

	endif; ?>

	<?php 
	if ( $is_tags ) :

		if ( $tags ): ?>
			<?php echo wc_get_product_tag_list( $product->get_id(), ', ', '<span class="tagged_as">' . _n( 'Tag:', 'Tags:', $tag_count, 'ohio' ) . ' ', '</span>' ); ?>
		<?php endif;

	endif; ?>

	<?php do_action( 'woocommerce_product_meta_end' ); ?>
</div>
