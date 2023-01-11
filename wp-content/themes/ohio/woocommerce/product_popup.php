<?php while (have_posts()) : the_post();
    global $product;
    global $post;
    $columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
    $post_thumbnail_id = $product->get_image_id();
    $wrapper_classes   = apply_filters( 'woocommerce_single_product_image_gallery_classes', array(
        'woocommerce-product-gallery',
        'woocommerce-product-gallery--' . ( $product->get_image_id() ? 'with-images' : 'without-images' ),
        'woocommerce-product-gallery--columns-' . absint( $columns ),
        'images',
    ) );



//
    ?>

    <div class="woo_c-product single-product">
        <div id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="vc_row">
                <div class="vc_col-md-6 vc_col-sm-12 woo_c-product-image">
                    <div class="woo_c-product-image-slider ohio-gallery-sc gallery-wrap" data-gallery="ohio-custom-<?php echo esc_attr($post->ID); ?>">
                        <?php if (has_post_thumbnail()) { ?>
                            <div class="product_images <?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>" data-columns="<?php echo esc_attr($columns); ?>">
                                <?php

                                $html = '<div class="image-wrap woocommerce-product-gallery__image" style="position:relative">';
                                $html .= '<img class="wp-post-image" src="' . wp_get_attachment_image_url($product->get_image_id(), 'shop_single') . '" alt="' . esc_attr($post->post_title) . '">';
                                $html .= '</div>';

                                $attachment_ids = $product->get_gallery_image_ids();
                                $image_class = '';
                                $loop = 1;
                                foreach ($attachment_ids as $attachment_id) {
                                    $classes = array('zoom');
                                    $image_class = implode(' ', $classes);
                                    $props = wc_get_product_attachment_props($attachment_id, $post);
                                    if (!$props['url']) {
                                        continue;
                                    }
                                    $html .= '<div class="image-wrap woocommerce-product-gallery__image" style="position:relative"><img src="' . wp_get_attachment_image_url($attachment_id, $size) . '" alt="' . esc_attr($post->post_title) . '"></div>';
                                    $loop++;
                                }

                                printf('%s', $html);


                                ?>

                            </div>
                            <?php
                        } else {
                            echo apply_filters('woocommerce_single_product_image_html', sprintf('<img src="%s" alt="%s" />', wc_placeholder_img_src(), esc_html__('Placeholder', 'ohio')), $post->ID);
                        } ?>
                        <div class="numbers_slides"></div>
                    </div>
                </div>
                <div class="vc_col-md-6 vc_col-sm-12 woo_c-product-details">
                    <div class="summary entry-summary woo_c-product-details-inner">

                        <div class="woo-summary-content">
                            <div class="wrap">
                                <div class="site-container">
                                    <?php do_action('woocommerce_single_product_summary'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endwhile;
