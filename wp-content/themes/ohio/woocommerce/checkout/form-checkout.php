<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}?>
<div class="vc_row">
	<div class="vc_col-md-12">
		<?php do_action( 'woocommerce_before_checkout_form', $checkout );?>
	</div>
</div>

<div class="vc_row">
	<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

	<div class="vc_row" id="checkout-content-scroll">
		
		<?php if ( $checkout->get_checkout_fields() ) : ?>

			<div class="vc_col-lg-7 vc_col-md-8 vc_col-sm-12">
				<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>
				<div class="col2-set" id="customer_details">
					<div class="col-1">
						<?php do_action( 'woocommerce_checkout_billing' ); ?>
					</div>
					<div class="col-2">
						<?php do_action( 'woocommerce_checkout_shipping' ); ?>
					</div>
				</div>
				<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>
			</div>

		<?php endif; ?>
		

			<div class="vc_col-lg-5 vc_col-md-4 vc_col-sm-12">
				<div class="content-scroll-container" data-ohio-content-scroll="#checkout-content-scroll">
					<div class="clb-woo-sidebar">
						<?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>
						<h4 class="heading-md" id="order_review_heading"><?php esc_html_e( 'Your order', 'ohio' ); ?></h4>
						<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>
						<div id="order_review" class="woocommerce-checkout-review-order">
							<?php do_action( 'woocommerce_checkout_order_review' ); ?>
						</div>
						<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
					</div>
				</div>
			</div>
	</div>
	</form>

	<div class="vc_col-lg-7 vc_col-md-8 vc_col-sm-12">
		<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>	
	</div>
	
</div>