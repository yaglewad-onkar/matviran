<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     3.9.0
 */

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	global $product, $woocommerce_loop, $page_wrapped;

	if ( empty( $product ) || ! $product->exists() ) {
		return;
	}

	if ( ! $related = wc_get_related_products( $product->get_id(), 12 ) ) {
		return;
	}

	$products_in_row = OhioOptions::get_global( 'woocommerce_products_in_row' );
	if ( is_string( $products_in_row ) ) {
	    $products_in_row = json_decode( $products_in_row );
	}

	if( $products_in_row == NULL ){
	    $products_in_row = (object) array(
	        "large" => "3",
	        "medium" => "2",
	        "small" => "2"
	    );
	}

	$product_now = 0;

	$row_class = '';
	if ( is_object( $products_in_row ) ) {
	    $row_class = ' columns-' . $products_in_row->large;
	    $row_class .= ' columns-md-' . $products_in_row->medium;
	    $row_class .= ' columns-sm-' . $products_in_row->small;
	}
?>

<?php
	$args = apply_filters( 'woocommerce_related_products_args', array(
		'post_type'            => 'product',
		'ignore_sticky_posts'  => 1,
		'no_found_rows'        => 1,
		'posts_per_page'       => $posts_per_page,
		'orderby'              => $orderby,
		'orderby'              => $orderby,
		'post__in'             => $related,
		'post__not_in'         => array( $product->get_id() )
	) );

	$products                    = new WP_Query( $args );
	$woocommerce_loop['name']    = 'related';
	$woocommerce_loop['columns'] = apply_filters( 'woocommerce_related_products_columns', $columns );

?>
	<?php if ( $products->have_posts() ) : ?>

	<section class="woo-c_related page-container shop-product-type_1">
		<h3 class="heading-md"><?php esc_html_e( 'Related products', 'ohio' ); ?></h3>
		<div class="<?php echo esc_attr( $row_class ); ?>">
		<?php woocommerce_product_loop_start();
			while ( $products->have_posts() ) {
				$products->the_post();
				wc_get_template_part( 'content', 'product' );
			}
			woocommerce_product_loop_end(); ?>
		</div>
	</section>

	<?php endif; ?>

<?php wp_reset_postdata();?>
