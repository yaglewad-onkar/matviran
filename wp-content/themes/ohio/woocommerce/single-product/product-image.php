<?php
/**
 * 
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.5.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $post, $product;

?>

<div class="vc_col-md-6 woo_c-product-image">
	<div class="images">
		<?php
			if ( has_post_thumbnail() ) {
				$attachment_count = count( $product->get_gallery_image_ids() );
				$gallery          = $attachment_count > 0 ? '[product-gallery]' : '';
				$props            = wc_get_product_attachment_props( get_post_thumbnail_id(), $post );
				$image            = get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), array(
					'title'	 => $props['title'],
					'alt'    => $props['alt'],
				) );
			?>
			<div class="slider" data-wc-slider="true">
			<?php
				$attachment_ids = $product->get_gallery_image_ids();
				$image_class = '';

				echo apply_filters(
						'woocommerce_single_product_image_thumbnail_html',
						sprintf(
							'<div class="image-wrap"><img class="gimg" src="%s" alt="'.esc_attr($post->post_title).'"></div>',
							wp_get_attachment_image_url( $product->get_image_id(), 'original' )
						),
						$attachment_ids,
						$post->ID,
						esc_attr( $image_class )
					);

				$loop = 1;

				foreach ( $attachment_ids as $attachment_id ) {

					$classes = array( 'zoom' );

					$image_class = implode( ' ', $classes );
					$props       = wc_get_product_attachment_props( $attachment_id, $post );

					if ( ! $props['url'] ) {
						continue;
					}

					echo apply_filters(
						'woocommerce_single_product_image_thumbnail_html',
						sprintf(
							'<div class="image-wrap"><img class="gimg" src="%s" alt="'.esc_attr($post->post_title).'"></div>', 
							esc_url( wp_get_attachment_image_url( $attachment_id, 'original' ))
						),
						$attachment_id,
						$post->ID,
						esc_attr( $image_class )
					);

					$loop++;
				}
			?>
			</div>
			<?php
			} else {
				echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="%s" />', wc_placeholder_img_src(), esc_html__( 'Placeholder', 'ohio' ) ), $post->ID );
			}

			do_action( 'woocommerce_product_thumbnails' );
		?>
	</div>
</div>
