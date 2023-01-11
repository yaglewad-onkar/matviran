<?php
/**
 * The template for displaying product widget entries
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-widget-product.php.
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

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product; 

$allowed_html = array(
    'img' => array(
        'class' => true,
        'src' => true,
        'alt'=> true
    ),
    'span' =>array(
    	'class' => true
    ),
    'del' => true,
    'old' => true,
    'ins' => true
); 
?>

<li>
	<a href="<?php echo esc_url( $product->get_permalink() ); ?>" title="<?php echo esc_attr( $product->get_name() ); ?>" class="image">
		<?php echo wp_kses( $product->get_image(), $allowed_html); ?>
	</a>
	<div class="content">
		<div class="title">	
			<a class="font-titles" href="<?php echo esc_url( $product->get_permalink() ); ?>" title="<?php echo esc_attr( $product->get_name() ); ?>">
				<?php echo esc_html( $product->get_name()); ?>
			</a>
		</div>
		<?php if ( ! empty( $show_rating ) ) : ?>
			<?php echo wc_get_rating_html( $product->get_id() ); ?>
		<?php else: ?>
			<div class="category brand-border-color brand-color">
				<?php echo wc_get_product_category_list( $product->get_id() ); ?>
			</div><br>
		<?php endif; ?>
		<span class="price">
			<?php echo  wp_kses($product->get_price_html(), $allowed_html ); ?>
		</span>
	</div>
</li>