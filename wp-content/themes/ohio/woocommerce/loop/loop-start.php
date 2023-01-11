<?php
/**
 * Product Loop Start
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/loop-start.php.
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
 * @version     3.3.0
 */
?>
<?php

$products_in_row = OhioOptions::get_global( 'woocommerce_products_in_row' );
$asymmetric_parallax = OhioOptions::get( 'grid_asymmetric_parallax', false );
$asymmetric_parallax_speed = (int) OhioOptions::get( 'asymmetric_parallax_speed', 20, false, true );
$asymmetric_atts = '';


if ($asymmetric_parallax) {
	if (is_string($products_in_row)) {
	    $products_in_row = json_decode($products_in_row);
	}
	if ($products_in_row == NULL) {
	    $products_in_row = (object)array(
	        "large" => "3",
	        "medium" => "2",
	        "small" => "2"
	    );
	}

	$columns_num = "$products_in_row->large-$products_in_row->medium-$products_in_row->small";

	$asymmetric_atts = ' data-asymmetric-parallax-grid=true data-grid-number='. $columns_num .' data-asymmetric-parallax-speed='. $asymmetric_parallax_speed. '';
}



$grid_classes = '';
$masonry_atts = '';

$grid_classes .= ' woo-products-slider';
$masonry_layout = OhioOptions::get_global( 'woocommerce_masonry_layout', true );

if ( $masonry_layout ) {
	OhioHelper::add_required_script( 'masonry' );
	$masonry_atts = ' data-shop-masonry=true';
}

?>

<div>
	<ul class="products woo_c-products vc_row<?php echo esc_attr($grid_classes) ?>" <?php echo esc_html( $masonry_atts ); ?> data-lazy-container="products" <?php echo esc_attr($asymmetric_atts) ?>>
