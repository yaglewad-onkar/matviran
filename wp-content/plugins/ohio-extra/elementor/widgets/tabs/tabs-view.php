<div class="ohio-tabs-sc tab <?php echo $this->getWrapperClasses(); ?>" data-ohio-tab-box="true" data-options="[]">
    
    <div class="tabNav_wrapper">
        <ul class="tabNav font-titles" role="tablist">
            <?php /* Generated tabs here */ ?>
            <li class="tabNav_line brand-bg-color"></li>
        </ul>
    </div>

    <div class="tabItems" role="tabpanel">
        <?php foreach ($settings['tabs'] as $item) : ?>
        <div class="tabItems_item <?php echo $item['custom_class']; ?>" data-title="<?php echo esc_attr( $item['list_title'] ); ?>" id="<?php echo esc_attr( $item['_id'] ); ?>">
            <?php
                if ($item['list_content_type'] == 'editor') {
                    echo do_shortcode( $item['list_content_editor'] );
                } else {
                    if (!empty($item['list_content_template']) && $item['list_content_template'] != 0) {
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

                        echo '<div style="text-align:center;">';
                        echo __( 'Template is not defined. Select an existing template or create a', 'ohio-extra' );
                        echo ' <a class="new-template-link elementor-clickable brand-color" target="_blank" href="' . $link . '">' . esc_html__( 'new one', 'ohio-extra' ) . '</a>.';
                        echo '</div>';
                    }
                }
            ?>
        </div>
        <?php endforeach; ?>
    </div>

</div>