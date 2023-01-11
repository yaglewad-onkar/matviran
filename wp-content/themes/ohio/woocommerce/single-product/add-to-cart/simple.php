<?php
/**
 *
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

if ( ! $product->is_purchasable() ) {
	return;
}

?>

<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>
<form class="woo_c-product-details-variations cart woocommerce-add-to-cart" method="post" enctype='multipart/form-data'>
	<?php if ( $product->is_in_stock() ) : ?>

		<div class="simple-qty">
			<div class="label">
				<label for="quantity"><?php esc_html_e( 'Quantity', 'ohio' ); ?>:</label>
			</div>
			<?php if ( ! $product->is_sold_individually() ) {
				woocommerce_quantity_input( array( 'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( $_POST['quantity'] ) : 1 ) );
			} ?>
		</div>
	 	<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>
		<input type="hidden" name="product_id" value="<?php echo absint( $product->get_id() ); ?>" />
		<input type="hidden" name="variation_id" class="variation_id" value="0" />
		<div class="variations_button">
		 	<a class="single_add_to_cart_button btn alt btn-loading-disabled">
				<?php echo esc_html( $product->single_add_to_cart_text() ); ?>
		 	</a>

            <?php
            if ( function_exists( 'YITH_WCWL' ) ) {
                echo do_shortcode('[yith_wcwl_add_to_wishlist]');
            }
            ?>

			<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
		</div>

	<?php else: ?>
		<div class="single_add_to_cart_button out_of_stock">
			<div class="ohio-message-module-sc message-box error"><?php esc_html_e( 'This product is currently out of stock and unavailable.', 'ohio' ); ?></div>
		</div>
	<?php endif; ?>
</form>
<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>
