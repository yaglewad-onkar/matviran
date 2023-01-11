<div 
    class="ohio-fullscreen-slider-sc fullscreen-slider clb-slider-scroll-bar <?php echo $this->getWrapperClasses(); ?>" 
    data-options='<?php echo $onepage_json; ?>' 
    data-fullscreen-slider="true">

    <?php foreach ( $settings['tabs'] as $item ) : ?>
        <div 
            <?php foreach ( $this->getTabItemAttrs( $item ) as $key => $attr ) : ?>
                <?php echo $key . '="' . $attr . '" '; ?>
            <?php endforeach; ?>>

            <div class="clb-slider-item-inner">
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

        </div>
    <?php endforeach; ?>

</div>

<div class="clb-scroll-top clb-slider-scroll-top vc_hidden-md vc_hidden-sm vc_hidden-xs">
    <div class="clb-scroll-top-bar">
        <div class="scroll-track" style="width: 25%;"></div>
    </div>
    <div class="clb-scroll-top-holder font-titles">
        <?php esc_html_e( 'Scroll', 'ohio-extra' ); ?>
    </div>
</div>