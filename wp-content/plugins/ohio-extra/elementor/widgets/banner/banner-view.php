<div class="ohio-banner-sc banner <?php echo $this->getWrapperClasses(); ?>" data-tilt-effect='true'>

    <?php // Inner card layout ?>
    <?php if ( in_array( $settings['block_type_layout'], [ 'inner', 'inner_hover' ] ) ) : ?>

        <div class="banner-holder parallax-holder banner-holder-inner">
            <?php if ( !empty($settings['background_image']['url']) ) : ?>
                <img class="parallax" 
                    src="<?php echo $settings['background_image']['url']; ?>"
                    srcset="<?php echo wp_get_attachment_image_srcset( $settings['background_image']['id'], 'large' ) ?>"
                    sizes="<?php echo wp_get_attachment_image_sizes( $settings['background_image']['id'], 'large' ) ?>"
                    alt="<?php echo esc_attr( get_post_meta( $settings['background_image']['id'], '_wp_attachment_image_alt', true ) ); ?>">
            <?php endif; ?>

            <?php if ( !empty( $settings['use_link'] ) && !empty( $settings['link']['url'] ) ) : ?>
                <a data-cursor-class="cursor-link" <?php echo $this->getLinkAttributesString( $settings['link'] ); ?>>
            <?php endif; ?>

            <div class="banner-overlay" <?php echo $this->getInlineStyleAttr( 'overlay' ); ?>>
                <div class="content">
                    <div class="content-top">
                        <?php if ( !empty( $settings['subtitle'] ) ) : ?>
                            <p class="banner-subtitle" <?php echo $this->getInlineStyleAttr( 'subtitle' ); ?>><?php echo $settings['subtitle']; ?></p>
                        <?php endif; ?>
                        <h3 class="banner-title" <?php echo $this->getInlineStyleAttr( 'heading' ); ?>><?php echo $settings['title']; ?></h3>
                    </div>

                    <div class="content-bottom">
                        <?php if ( !empty( $settings['description'] ) ) : ?>
                            <p class="description" <?php echo $this->getInlineStyleAttr( 'description' ); ?>>
                                <?php echo $settings['description']; ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <?php if ( !empty( $settings['use_link'] ) && !empty( $settings['link']['url'] ) ) : ?>
                </a>
            <?php endif; ?>
        </div>

    <?php // Default card layout ?>
    <?php else: ?>

        <div class="banner-holder parallax-holder">
            <?php if ( !empty($settings['background_image']['url']) ) : ?>
                <?php if ( !empty( $settings['use_link'] ) && !empty( $settings['link']['url'] ) ) : ?>
                    <a data-cursor-class="cursor-link" <?php echo $this->getLinkAttributesString( $settings['link'] ); ?>>
                        <img class="parallax"
                            src="<?php echo $settings['background_image']['url']; ?>"
                            srcset="<?php echo wp_get_attachment_image_srcset( $settings['background_image']['id'], 'large' ) ?>"
                            sizes="<?php echo wp_get_attachment_image_sizes( $settings['background_image']['id'], 'large' ) ?>"
                            alt="<?php echo esc_attr( get_post_meta( $settings['background_image']['id'], '_wp_attachment_image_alt', true ) ); ?>">
                    </a>
                <?php else : ?>
                    <img class="parallax" 
                        src="<?php echo $settings['background_image']['url']; ?>"
                        srcset="<?php echo wp_get_attachment_image_srcset( $settings['background_image']['id'], 'large' ) ?>"
                        sizes="<?php echo wp_get_attachment_image_sizes( $settings['background_image']['id'], 'large' ) ?>"
                        alt="<?php echo esc_attr( get_post_meta( $settings['background_image']['id'], '_wp_attachment_image_alt', true ) ); ?>">
                <?php endif; ?>
            <?php endif; ?>

            <div class="banner-overlay" <?php echo $this->getInlineStyleAttr( 'overlay' ); ?>>
                <?php if ( !empty( $settings['description'] ) ) : ?>
                    <p class="description" <?php echo $this->getInlineStyleAttr( 'description' ); ?>>
                        <?php echo $settings['description']; ?>
                    </p>
                <?php endif; ?>
            </div>
        </div>

        <div class="content">
            <?php if ( !empty( $settings['subtitle'] ) ) : ?>
                <p class="banner-subtitle" <?php echo $this->getInlineStyleAttr( 'subtitle' ); ?>><?php echo $settings['subtitle']; ?></p>
            <?php endif; ?>

            <?php if ( !empty( $settings['use_link'] ) && !empty( $settings['link']['url'] ) ) : ?>
                <a data-cursor-class="cursor-link" <?php echo $this->getLinkAttributesString( $settings['link'] ); ?>>
                    <h3 class="banner-title" <?php echo $this->getInlineStyleAttr( 'heading' ); ?>><?php echo $settings['title']; ?></h3>
                </a>
            <?php else : ?>
                <h3 class="banner-title" <?php echo $this->getInlineStyleAttr( 'heading' ); ?>><?php echo $settings['title']; ?></h3>
            <?php endif; ?>
        </div>

    <?php endif; ?>

</div>