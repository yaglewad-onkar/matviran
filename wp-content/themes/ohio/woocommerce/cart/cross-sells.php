<?php
/**
 * Cross-sells
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cross-sells.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 4.4.0
 */

defined( 'ABSPATH' ) || exit;

$products_in_row = OhioSettings::get( 'woocommerce_products_in_row', 'global' );

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

if ( $cross_sells ) : ?>

	<div class="cross-sells woo-c_cross_sells">
		<h4 class="heading-md">
			<?php
			$heading = apply_filters( 'woocommerce_product_cross_sells_products_heading', __( 'You may be interested in', 'ohio' ) );

			if ( $heading ) :
				?>
				<?php echo esc_html( $heading ); ?>
			<?php endif; ?>
		</h4>
		<div class="<?php echo esc_attr( $row_class ); ?>">
			<?php woocommerce_product_loop_start(); ?>

				<?php foreach ( $cross_sells as $cross_sell ) : ?>

					<?php
						$post_object = get_post( $cross_sell->get_id() );

						setup_postdata( $GLOBALS['post'] =& $post_object ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found

						wc_get_template_part( 'content', 'product' );
					?>

				<?php endforeach; ?>

			<?php woocommerce_product_loop_end(); ?>
		</div>
	</div>
	<?php
endif;
wp_reset_postdata();