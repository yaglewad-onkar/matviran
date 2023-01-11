<?php
/**
 *
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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
 * @version     3.6.0
 */
	if ( ! defined( 'ABSPATH' ) ) {
		exit; // Exit if accessed directly
	}

	$shop_page_id = wc_get_page_id( 'shop' );

	$show_breadcrumbs = OhioOptions::get( 'page_breadcrumbs_visibility' );

	$product_view = OhioOptions::get( 'woocommerce_view_mode', 'left' );

	if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	}

	global $post;
	global $product;
	do_action( 'woocommerce_before_single_product' );
?>

<div id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php

		if ($product_view == 'left') {
			wc_get_template_part('single-product/views/type_1');
		} else {
			wc_get_template_part('single-product/views/type_1_reverse');
		}
	
	?>
