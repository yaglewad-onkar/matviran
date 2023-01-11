<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.4.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_cart' ); ?>

<div class="vc_row" id="sticky-woo-sidebar">
	<div class="vc_col-lg-7 vc_col-md-8 vc_col-sm-12">
		<form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post" >
			<?php do_action( 'woocommerce_before_cart_table' ); ?>

			<div class="woo-c_cart_messages" role="alert">
				<?php wc_print_notices(); ?>
			</div>

			<div class="shop_table shop_table_responsive cart woocommerce-cart-form__contents woo-cart" cellspacing="0">
				<?php do_action( 'woocommerce_before_cart_contents' ); ?>

					<?php
					foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
						$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
						$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

						if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
							$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
							?>
							<div class="woocommerce-cart-form__cart-item woo-cart_item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
								<div class="product-thumbnail woo-cart_item_thumbnail">
									<?php
										$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

										if ( ! $product_permalink ) {
											echo wp_kses($thumbnail, 'basic_html'); // PHPCS: XSS ok.
										} else {
											printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
										}
									?>
									<div class="product-remove woo-cart_item_remove">
										<?php
											echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
												'woocommerce_cart_item_remove_link',
												sprintf(
													'<a href="%s" class="remove remove-link btn-round btn-round-small" aria-label="%s" data-product_id="%s" data-product_sku="%s"><i class="ion ion-md-close"></i></a>',
													esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
													esc_html__( 'Remove this item', 'ohio' ),
													esc_attr( $product_id ),
													esc_attr( $_product->get_sku() )
												),
												$cart_item_key
											);
										?>
									</div>
								</div>
								<div class="woo-cart_details">
									<div class="product-name woo-cart_item_name" data-title="<?php esc_attr_e( 'Product', 'ohio' ); ?>">
										<div class="woo-c_product woo-c_product_name">
											<?php
											if ( ! $product_permalink ) {
												echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
											} else {
												echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
											}

											do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

											// Meta data.
											echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.

											// Backorder notification.
											if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
												echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'ohio' ) . '</p>', $product_id ) );
											}
											?>	
										</div>
										<div class="woo-cart_item_values">
											<?php
												$attributes = $cart_item['variation'];

												$i = 0;
												if ( is_array($attributes) || is_object($attributes) ) {
													foreach ($attributes as $key => $value) {
														$key = str_replace('attribute_', '', $key);
														$sep = '';
														if ($i != 0) {
															$sep = ', ';
														}
														?>
														<p class="<?php echo esc_attr(urldecode(strtolower(wc_attribute_label($key)))); ?>"><?php echo esc_html($sep); ?><?php echo esc_html(urldecode(wc_attribute_label($key))); ?>: <span><?php echo esc_html($value); ?></span></p>
													<?php
													$i++;
													}
												} ?>
										</div>
									</div>
									<div class="product-price woo-cart_item_price" data-title="<?php esc_attr_e( 'Price', 'ohio' ); ?>">
										<?php
											echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
										?>
									</div>
									<div class="product-quantity woo-cart_item_quantity" data-title="<?php esc_attr_e( 'Quantity', 'ohio' ); ?>">
										<?php
										if ( $_product->is_sold_individually() ) {
											$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
										} else {
											$product_quantity = woocommerce_quantity_input(
												array(
													'input_name'   => "cart[{$cart_item_key}][qty]",
													'input_value'  => $cart_item['quantity'],
													'max_value'    => $_product->get_max_purchase_quantity(),
													'min_value'    => '0',
													'product_name' => $_product->get_name(),
												),
												$_product,
												false
											);
										}

										echo '<span class="quantity-label">' . esc_html_e( 'QTY:', 'ohio' ) . '</span>';
										echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
										?>
									</div>
									<div class="product-subtotal woo-cart_item_subtotal" data-title="<?php esc_attr_e( 'Subtotal', 'ohio' ); ?>">
										<?php
											echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
										?>
									</div>
								</div>
							</div>
							<?php
						}
					}
					?>

					<?php do_action( 'woocommerce_cart_contents' ); ?>

					<?php do_action( 'woocommerce_after_cart_contents' ); ?>
				</div>
				<div class="woo-c_actions actions">
					<?php if ( wc_coupons_enabled() ) { ?>
						<fieldset class="woo-c_actions_coupon coupon">
							<label for="coupon_code" class="field-label"><?php esc_html_e( 'Coupon code', 'ohio' ); ?></label>
							<input type="text" name="coupon_code" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Paste coupon code here', 'ohio' ); ?>" />
							<button type="submit" class="btn btn-flat" name="apply_coupon"><?php esc_attr_e( 'Apply Coupon', 'ohio' ); ?></button>
							<?php do_action( 'woocommerce_cart_coupon' ); ?>
						</fieldset>
					<?php } ?>

					<button type="submit" class="button" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'ohio' ); ?>"><?php esc_html_e( 'Update cart', 'ohio' ); ?></button>

					<?php do_action( 'woocommerce_cart_actions' ); ?>

					<?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
				</div>

				<div class="woo-c_cart-cross-sale">
					<?php woocommerce_cross_sell_display(); ?>
				</div>

			<?php do_action( 'woocommerce_after_cart_table' ); ?>
		</form>
	</div>
	<div class="vc_col-lg-5 vc_col-md-4 vc_col-sm-12">
		<div data-ohio-content-scroll="#sticky-woo-sidebar">
			<div class="clb-woo-sidebar cart-collaterals" >
				<?php
					/**
					 * Cart collaterals hook.
					 *
					 * @hooked woocommerce_cross_sell_display
					 * @hooked woocommerce_cart_totals - 10
					 */
					do_action( 'woocommerce_cart_collaterals' );
				?>
			</div>
		</div>
	</div>
</div>

<?php do_action( 'woocommerce_after_cart' ); ?>
