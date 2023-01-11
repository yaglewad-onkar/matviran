<div class="ohio-slider-sc slider-wrap">
    <div
        class="slider ohio-slider <?php echo $this->getWrapperClasses(); ?>"
        data-ohio-slider='<?php echo $slider_json; ?>'>

        <?php foreach ( $settings['tabs'] as $item ) : ?>
            <div class="slider-wrap <?php if ( !empty( $item['custom_class'] ) ) { echo $item['custom_class']; } ?>">

                <?php
                    if ( $item['list_content_type'] == 'editor' ) {
                        echo do_shortcode( $item['list_content_editor'] );
                    } else {
                        if (!empty( $item['list_content_template'] ) && $item['list_content_template'] != 0 ) {
                            // Template
                            echo \Elementor\Plugin::$instance->frontend->get_builder_content_for_display( $item['list_content_template'] );
                        } else {
                            // No template message
                            $link = add_query_arg(
                                array(
                                    'post_type'     => 'elementor_library',
                                    'action'        => 'elementor_new_post',
                                    '_wpnonce'      => wp_create_nonce( 'elementor_action_new_post' ),
                                    'template_type' => 'section',
                                ),
                                esc_url( admin_url( '/edit.php' ) )
                            );

                            echo '<div style="text-align:center">';
                            echo __( 'Template is not defined. Select an existing template or create a', 'ohio-extra' );
                            echo ' <a class="new-template-link elementor-clickable brand-color" target="_blank" href="' . $link . '">' . esc_html__( 'new one', 'ohio-extra' ) . '</a>.';
                            echo '</div>';
                        }
                    }
                ?>

            </div>
        <?php endforeach; ?>

    </div>

    <?php if ( !empty( $settings['preloader'] ) ) : ?>
        <svg class="spinner sk-preloader" viewBox="0 0 50 50">
            <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="4"></circle>
        </svg>
    <?php endif; ?>
</div>
