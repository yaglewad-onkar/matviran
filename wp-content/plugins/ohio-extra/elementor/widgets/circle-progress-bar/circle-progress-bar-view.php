<div class="ohio-circle-progres-bar-sc circle-progress-bar <?php echo $this->getWrapperClasses(); ?>"
    data-percent-value="<?php echo esc_attr( $settings['progress_value']['size'] ); ?>">

    <div class="circle-progress-bar-circle">
        <div class="circle" >
            <svg class="progress" width="110" height="110" viewBox="0 0 110 110">
                <circle class="progress__meter" cx="55" cy="55" r="49" stroke-width="6" />
                <circle class="progress__value" cx="55" cy="55" r="49" stroke-width="6" <?php echo $this->getInlineStyleAttr( 'chart' ); ?> />
            </svg>

            <?php if ( $settings['block_type_layout'] == 'icon' ): ?>
                <div class="percent-wrap">

                    <?php if ( $settings['icon_type'] == 'icon' ) : ?>
                        <?php \Elementor\Icons_Manager::render_icon( $settings['icon_icon'], [ 'style' => $this->getInlineStyle( 'icon' ) ] ); ?>
                    <?php elseif ( $settings['icon_type'] == 'image' && !empty( $settings['icon_image']['url'] ) ) : ?>
                        <img
                            class="image-icon"
                            src="<?php echo $settings['icon_image']['url']; ?>"
                            srcset="<?php echo wp_get_attachment_image_srcset( $settings['icon_image']['id'], 'large' ) ?>"
                            sizes="<?php echo wp_get_attachment_image_sizes( $settings['icon_image']['id'], 'large' ) ?>">
                    <?php endif; ?>

                </div>
            <?php else: ?>
                <div class="percent-wrap">
                    <h4><span class="percent">0</span>%</h4>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="circle-progress-bar-content text-center">
        <?php // Percent number ?>
        <?php if ( $settings['block_type_layout'] == 'icon' ): ?>
            <div class="percent-wrap">
                <h4 <?php echo $this->getInlineStyleAttr( 'percent' ); ?>><span class="percent">0</span>%</h4>
            </div>
        <?php endif; ?>

        <?php // Label ?>
        <?php if (!empty($settings['label'])): ?>
            <h6 class="circle-progress-bar-title title heading-sm" <?php echo $this->getInlineStyleAttr( 'label' ); ?>>
                <?php echo $settings['label']; ?>
            </h6>
        <?php endif; ?>
    </div>

    <div class="pie" data-chart-box="true" data-percent="<?php echo esc_attr( $settings['progress_value']['size'] ); ?>"
        <?php if ( $settings['chart_color'] ) { echo ' data-color="' . esc_attr($settings['chart_color']) . '"'; } ?>>
        <div class="pie-content"></div>
    </div>

</div>
