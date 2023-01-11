<div class="ohio-horizontal_accordion-sс horizontal_accordion" data-ohio-horizontal-accordion="0">

    <?php foreach ($settings['tabs'] as $item) : ?>
        <div class="horizontal_accordionItem elementor-repeater-item-<?php echo $item['_id'];?><?php
                if (!empty($item['custom_class'])) { echo ' ' . $item['custom_class']; }
            ?>">

            <div class="horizontal_accordionItem_content">
                <div class="wrap">
                    <?php
                        if ($item['list_content_type'] == 'editor') {
                            echo do_shortcode( $item['list_content_editor'] );
                        } else {
                            if ( !empty($item['list_content_template']) && $item['list_content_template'] != 0 ) {
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
            </div>

        </div>
    <?php endforeach; ?>

</div>
