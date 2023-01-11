<?php if ( $settings['module_layout'] == 'with_preview' ) : ?>

    <div class="ohio-video-module-sc video-module video-module-preview open-popup <?php echo $this->getWrapperClasses(); ?>"
        data-video-module="<?php if ( !empty($settings['link']) ) { echo esc_attr( $settings['link'] ); } ?>">

        <?php if ( !empty($settings['preview_image']['url']) ): ?>
            <img class="preview-image"
                src="<?php echo esc_attr( $settings['preview_image']['url'] ); ?>"
                srcset="<?php echo wp_get_attachment_image_srcset( $settings['preview_image']['id'], 'large' ) ?>"
                sizes="<?php echo wp_get_attachment_image_sizes( $settings['preview_image']['id'], 'large' ) ?>"
                alt="<?php if ( !empty($settings['title']) ) { echo $settings['title']; } ?>">
        <?php endif; ?>

        <div class="video-module-holder">
            <div class="btn-play btn-round <?php if ( $settings['button_layout'] == 'outline' ) { echo 'btn-round-outline'; } ?>" tabindex='1'>
                <i class="ion ion-ios-play" <?php echo $this->getInlineStyleAttr( 'button' ); ?>></i>
            </div>

            <?php if ( !empty($settings['title']) ): ?>
                <h6 class="video-headline" <?php echo $this->getInlineStyleAttr( 'title' ); ?>>
                    <?php echo $settings['title']; ?>
                </h6>
            <?php endif; ?>
        </div>
    </div>

<?php else: ?>

    <div class="text-<?php echo $settings['block_alignment']; ?>">
        <div class="ohio-video-module-sc video-module open-popup <?php echo $this->getWrapperClasses(); ?>"
            data-video-module="<?php if( !empty($settings['link']) ) { echo esc_attr( $settings['link'] ); } ?>">

            <div class="video-module-holder">
                <div class="btn-play btn-round <?php if ( $settings['button_layout'] == 'outline' ) { echo 'btn-round-outline'; } ?>" tabindex='1'>
                    <i class="ion ion-ios-play" <?php echo $this->getInlineStyleAttr( 'button' ); ?>></i>
                </div>

                <?php if ( !empty($settings['title']) ): ?>
                    <h6 class="video-headline" <?php echo $this->getInlineStyleAttr( 'title' ); ?>>
                        <?php echo $settings['title']; ?>
                    </h6>
                <?php endif; ?>
            </div>
        </div>
    </div>

<?php endif; ?>
