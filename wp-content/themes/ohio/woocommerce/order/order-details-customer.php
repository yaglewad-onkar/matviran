<?php
/**
 * Order Customer Details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details-customer.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$show_shipping = ! wc_ship_to_billing_address_only() && $order->needs_shipping_address();
?>

<section class="woocommerce-customer-details">

	<?php if ( $show_shipping ) : ?>
	<div class="vc_row vc_row-reset">
		<section class="woocommerce-columns woocommerce-columns--2 woocommerce-columns--addresses col2-set addresses">
			<div class="woocommerce-column woocommerce-column--1 woocommerce-column--billing-address col-1">

		<?php endif; ?>
		<div class="vc_col-lg-6 vc_col-sm-12">
			<h4 class="heading-md"><?php esc_html_e( 'Billing address', 'ohio' ); ?></h4>
			<address>
				<?php echo wp_kses( $order->get_formatted_billing_address( esc_html__( 'N/A', 'ohio' ) ), 'basic_html' ); ?>

				<?php if ( $order->get_billing_phone() ) : ?>
					<p class="woocommerce-customer-details--phone"><?php echo esc_html( $order->get_billing_phone() ); ?></p>
				<?php endif; ?>

				<?php if ( $order->get_billing_email() ) : ?>
					<p class="woocommerce-customer-details--email"><?php echo esc_html( $order->get_billing_email() ); ?></p>
				<?php endif; ?>
			</address>
		</div>

		<?php if ( $show_shipping ) : ?>

			</div><!-- /.col-1 -->
			
			<div class="woocommerce-column woocommerce-column--2 woocommerce-column--shipping-address col-2">
				<div class="vc_col-lg-6 vc_col-sm-12">
					<h4 class="heading-md"><?php esc_html_e( 'Shipping address', 'ohio' ); ?></h4>
					<address>
						<?php echo wp_kses( $order->get_formatted_shipping_address( esc_html__( 'N/A', 'ohio' ) ), 'basic_html' ); ?>
					</address>
				</div>
			</div><!-- /.col-2 -->

		</section><!-- /.col2-set -->
	<div class="vc_row vc_row-reset">
	<?php endif; ?>

	<?php do_action( 'woocommerce_order_details_after_customer_details', $order ); ?>

</section>