<?php
class Ohio_Elementor_Instagram_Widget extends Ohio_Elementor_Widget_Base {

    public function get_name()
    {
        return 'ohio_instagram';
    }

    public function get_title()
    {
        return __( 'Instagram Feed', 'ohio-extra' );
    }

    public function get_icon()
    {
        return 'ohio-icon-sc-instagram';
    }

    public function get_categories()
    {
        return [ 100 ];
    }

    protected function _register_controls()
    {
        $this->start_controls_section(
            'general_section',
            [
                'label' => __( 'General', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'important_note',
            [
                'label' => __( 'Usage note', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::RAW_HTML,
                'raw' => '<span style="color: #8b9da7; line-height: 1.15; margin-top: 6px; display: inline-block;">' . 
                    __( 'To use the shortcode please firstly install <a target="_blank" href="/wp-admin/plugins.php">Instagram Feed</a> 
                    from the recommended plugins. Then connect your Instagram account in the plugin\'s 
                    <a target="_blank" href="/wp-admin/admin.php?page=sb-instagram-feed">settings</a>.', 'ohio-extra' ) . '</span>',
            ]
        );

        $this->add_control(
            'show_username',
            [
                'label' => __( 'Show username?', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'items_in_block',
            [
                'label' => __( 'Number of photos', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'items' ],
                'range' => [
                    'items' => [
                        'min' => 1,
                        'max' => 60,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'items',
                    'size' => 6,
                ],
            ]
        );

        $this->add_control(
            'columns_number',
            [
                'label' => __( 'Columns', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '6' => '6',
                    '12' => '12',
                ],
                'default' => '4',
                'label_block' => true
            ]
        );

        $this->add_control(
            'remove_gap',
            [
                'label' => __( 'Remove column gap?', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        $columns_gap = ( !empty( $settings['remove_gap'] ) ) ? 0 : 20;
        $photo_count = ( !empty( $settings['items_in_block'] ) ) ? $settings['items_in_block']['size'] : 6;
        $css_class = ( !empty( $settings['remove_gap'] ) ) ? 'no-margins' : '';

        if ( ! \Elementor\Plugin::$instance->editor->is_edit_mode() ) {
            echo do_shortcode('[instagram-feed showheader="'.(bool)$settings['show_username'].'" cols="'.$settings['columns_number'].'" num="'.$photo_count.'" imagepadding="'.$columns_gap.'" class="'.$css_class.'" showfollow="false"]');
        } else {
            echo '<div class="clb-blank-note"><i class="ion ion-md-information-circle-outline"></i><div class="clb-blank-note-inner">Sorry, an Instagram feed preview isn\'t available in editing mode. Save the changes and preview the front-end of the current page.</div></div>';
        }
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Ohio_Elementor_Instagram_Widget() );
