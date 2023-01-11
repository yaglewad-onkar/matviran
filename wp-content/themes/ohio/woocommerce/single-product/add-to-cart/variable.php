<?php
/**
 * Variable product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/variable.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.5.5
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product, $post;

$attribute_keys = array_keys( $attributes );
do_action( 'woocommerce_before_add_to_cart_form' ); ?>

<form id="variation_form_anchor" class="woo_c-product-details-variations variations_form cart woo_c-cart-form" method="post" enctype='multipart/form-data' data-product_id="<?php echo absint( $product->get_id() ); ?>" data-product_variations="<?php echo htmlspecialchars( json_encode( $available_variations ) ) ?>" data-please-select-message="<?php echo esc_attr__('Please select') ?>">
	<?php do_action( 'woocommerce_before_variations_form' ); ?>

	<?php if ( empty( $available_variations ) && false !== $available_variations ) : ?>
		<button type="submit" class="single_add_to_cart_button btn btn-small alt" disabled="true">
			<?php esc_html_e( 'This product is currently out of stock and unavailable.', 'ohio' ); ?>
		</button>
	<?php else : ?>
		<div class="variations">
			<div class="variation">
				<div class="label">
					<label for="php"><?php esc_html_e( 'Quantity', 'ohio' ); ?>:</label>
				</div>
				<?php woocommerce_quantity_input( array(
					'input_value' => ( isset( $_POST['quantity'] ) ? wc_stock_amount( $_POST['quantity'] ) : 1 )
				) ); ?>
			</div>

			<?php foreach ( $attributes as $attribute_name => $options ) : ?>
				<div id="variation_<?php echo esc_attr($attribute_name) ?>" class="variation">
					<div class="label"><label for="pa_color"><?php echo wc_attribute_label( $attribute_name ) ?>:</label></div>

					<?php 
						$selected = isset( $_REQUEST[ 'attribute_' . sanitize_title( $attribute_name ) ] ) ? wc_clean( urldecode( $_REQUEST[ 'attribute_' . sanitize_title( $attribute_name ) ] ) ) : $product->get_variation_default_attribute( $attribute_name );
						wc_dropdown_variation_attribute_options( array( 'options' => $options, 'attribute' => $attribute_name, 'product' => $product, 'selected' => $selected, 'class'=> 'test', 'show_option_none' => wc_attribute_label( $attribute_name ) ) );
					?>

				</div>
				<?php
					echo end( $attribute_keys ) === $attribute_name ? apply_filters( 'woocommerce_reset_variations_link', '<div class="reset variation"><a class="btn btn-link reset_variations" href="#"><span>' . esc_html__( 'Reset', 'ohio' ) . '</span><i class="ion ion-right ion-md-close-circle-outline"></i></a></div>' ) : '';
				?>
			<?php endforeach;?>

		</div>

		<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

		<div class="single_variation_wrap">
			<?php

				do_action( 'woocommerce_before_single_variation' );
				?>
				<div class="single-variation"><?php do_action( 'woocommerce_single_variation' );?></div>
				
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
				
				<input type="hidden" name="product_id" value="<?php echo esc_attr( $post->ID ); ?>" />
				<input type="hidden" name="variation_id" class="variation_id" value="" />

				<?php do_action( 'woocommerce_after_single_variation' ); ?>
				</div>

		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
	<?php endif; ?>

	<?php do_action( 'woocommerce_after_variations_form' ); ?>
</form>

<?php
do_action( 'woocommerce_after_add_to_cart_form' );