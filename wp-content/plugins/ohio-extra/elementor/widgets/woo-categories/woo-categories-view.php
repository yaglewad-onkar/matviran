<div class="woocommerce ohio-woocommerce-sc <?php echo $this->getWrapperClasses(); ?>">
    <ul class="woo_c-category">

        <?php foreach ( $categories_data as $category ) : ?>
            <li class="product-category vc_col-md-<?php echo $settings['layout_columns']; ?>">

                <div class="<?php echo $layout_class; ?>">
                    <?php if ( !empty( $category->image ) ) : ?>
                        <div class="product-category__background-image" style="background-image: url(<?php echo esc_url( $category->image ); ?>)"></div>
                    <?php endif; ?>

                    <div class="product-category__info-wrapper <?php echo $alignment_class; ?>">
                        <div class="product-category__top-line">

                            <?php if ( $settings['subtitle_position'] == 'top' ) : ?>
                                <div class="description product-category__description">
                                    <?php echo $category->description; ?>
                                </div>
                            <?php endif; ?>

                            <h3 class="second-title product-category__title">
                                <a href="<?php echo esc_url( $category->url ); ?>"><?php echo $category->title; ?></a>
                            </h3>

                            <?php if ( $settings['subtitle_position'] == 'bottom' ) : ?>
                                <div class="description product-category__description">
                                    <?php echo $category->description; ?>
                                </div>
                            <?php endif; ?>

                            <a href="<?php echo esc_url( $category->url ); ?>" class="shop-now btn <?php echo $this->getButtonClasses(); ?>">
                                <?php esc_html_e( 'Start Shopping', 'ohio-extra' ); ?>
                                <i class="ion-right ion ion-ios-arrow-forward"></i>
                            </a>

                        </div>
                    </div>
                </div>

            </li>
        <?php endforeach; ?>

    </ul>
</div>
