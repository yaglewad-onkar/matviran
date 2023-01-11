<?php
class Ohio_Elementor_Message_Widget extends Ohio_Elementor_Widget_Base {

    public function get_name()
    {
        return 'ohio_message';
    }

    public function get_title()
    {
        return __( 'Message', 'ohio-extra' );
    }

    public function get_icon()
    {
        return 'ohio-icon-sc-message';
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
            'message_type',
            [
                'label' => __( 'Message type', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'default' => __( 'Default', 'ohio-extra' ),
                    'warning' => __( 'Warning', 'ohio-extra' ),
                    'primary' => __( 'Primary', 'ohio-extra' ),
                    'success' => __( 'Success', 'ohio-extra' ),
                    'danger' => __( 'Danger', 'ohio-extra' )
                ],
                'default' => 'default',
                'label_block' => true,
            ]
        );

        $this->add_control(
            'text',
            [
                'label' => __( 'Message', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 2,
                'default' => __( 'Something important here.', 'ohio-extra' ),
            ]
        );

        $this->add_control(
            'without_close_button',
            [
                'label' => __( 'Hide close button?', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'full_width',
            [
                'label' => __( 'Full width', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'button_section',
            [
                'label' => __( 'Link button', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'use_link',
            [
                'label' => __( 'Add link', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $this->add_control(
            'button_title',
            [
                'label' => __( 'Link title', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Read more',
                'label_block' => true,
                'condition' => [
                    'use_link' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'button_link',
            [
                'label' => __( 'Link URL', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'ohio-extra' ),
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'condition' => [
                    'use_link' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();

        // Styles
        $this->start_controls_section(
            'basic_styles_section',
            [
                'label' => __( 'General', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'background_color',
            [
                'label' => __( 'Background color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .message-box' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'text_color',
            [
                'label' => __( 'Text color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .message-box' => 'color: {{VALUE}}',
                ],
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'text_typography',
                'label' => __( 'Text typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .message-box',
            ]
        );

        $this->add_control(
            'button_color',
            [
                'label' => __( 'Link color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .message-box > a' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'use_link' => 'yes'
                ],
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'label' => __( 'Link typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .message-box > a',
                'condition' => [
                    'use_link' => 'yes'
                ]
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        switch ( $settings['message_type'] ) {
            case 'warning':
                $this->addWrapperClass( 'warning' );
                break;
            case 'success':
                $this->addWrapperClass( 'success' );
                break;
            case 'primary':
                $this->addWrapperClass( 'primary' );
                break;
            case 'danger':
                $this->addWrapperClass( 'error' );
                break;
        }

        if ( empty( $settings['full_width'] ) ) {
            $this->addWrapperClass( 'wauto' );
        }

        if ( !empty( $settings['without_close_button'] ) ) {
            $this->addWrapperClass( 'without-close' );
        }

        include( plugin_dir_path( __FILE__ ) . 'message-view.php' );
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Ohio_Elementor_Message_Widget() );
