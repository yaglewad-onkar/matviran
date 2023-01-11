<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     3.7.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
	$show_customer_details = is_user_logged_in() && $order->get_user_id() === get_current_user_id();
?>

<div class="woocommerce-order" id="order-details-scroll-content">
	<div class="vc_row" >
	<?php if ( $order ) : ?>

			<div class="vc_col-lg-7 vc_col-md-8 vc_col-sm-12">
				<?php if ( $order->has_status( 'failed' ) ) : ?>
					<div class="clb-blank order-failed">
						<div class="clb-blank-image">
							<i class="ion ion-ios-close-circle-outline"></i>
						</div>
						<h4 class="heading-md"><?php esc_html_e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again', 'ohio' ); ?></h4>
					</div>
					
					<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
						<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php _e( 'Pay', 'ohio' ) ?></a>
						<?php if ( is_user_logged_in() ) : ?>
							<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay"><?php _e( 'My account', 'ohio' ); ?></a>
						<?php endif; ?>
					</p>

				<?php else : ?>
					<div class="clb-blank">
						<div class="clb-blank-image">
							<i class="ion ion-md-checkmark"></i>
						</div>
						<h4 class="heading-md"><?php esc_html_e( 'Thank you.', 'ohio' ); ?><br><?php esc_html_e( 'Your order has been received.', 'ohio' ); ?></h4>
					</div>


					<ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">

						<li class="woocommerce-order-overview__order order">
							<?php _e( 'Order number', 'ohio' ); ?>:
							<strong><?php echo wp_kses($order->get_order_number(), 'post'); ?></strong>
						</li>

						<li class="woocommerce-order-overview__date date">
							<?php _e( 'Date', 'ohio' ); ?>:
							<strong><?php echo wc_format_datetime( $order->get_date_created() ); ?></strong>
						</li>

						<?php if ( is_user_logged_in() && $order->get_user_id() === get_current_user_id() && $order->get_billing_email() ) : ?>
							<li class="woocommerce-order-overview__email email">
								<?php _e( 'Email', 'ohio' ); ?>:
								<strong><?php echo wp_kses($order->get_billing_email(), 'post'); ?></strong>
							</li>
						<?php endif; ?>

						<li class="woocommerce-order-overview__total total">
							<?php _e( 'Total', 'ohio' ); ?>:
							<strong><?php echo wp_kses($order->get_formatted_order_total(), 'post'); ?></strong>
						</li>

						<?php if ( $order->get_payment_method_title() ) : ?>
							<li class="woocommerce-order-overview__payment-method method">
								<?php _e( 'Payment method', 'ohio' ); ?>:
								<strong><?php echo wp_kses( $order->get_payment_method_title(), 'basic_html' ); ?></strong>
							</li>
						<?php endif; ?>

					</ul>
					<div class="vc_row vc_row-reset">
						<?php
							if ( $show_customer_details ) {
								wc_get_template( 'order/order-details-customer.php', array( 'order' => $order ) );
							}
						?>	
					</div>


				<?php endif; ?>

			</div>

			<div class="vc_col-lg-5 vc_col-md-4 vc_col-sm-12">
				<?php do_action( 'woocommerce_thankyou', $order->get_id() ); ?>
			</div>
	<?php else : ?>

		<div class="vc_col-lg-7 vc_col-md-8 vc_col-sm-12">
			<div class="clb-blank">
				<div class="clb-blank-image">
					<i class="ion ion-md-copy"></i>
				</div>
				<h4 class="heading-md"><?php esc_html_e( 'Thank you.', 'ohio' ); ?><br><?php esc_html_e( 'Your order has been received.', 'ohio' ); ?></h4>
			</div>
		</div>

	<?php endif; ?>
	</div>
</div>