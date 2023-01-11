<?php
class Ohio_Elementor_Button_Widget extends Ohio_Elementor_Widget_Base {

    public function get_name()
    {
        return 'ohio_button';
    }

    public function get_title()
    {
        return __( 'Button', 'ohio-extra' );
    }

    public function get_icon()
    {
        return 'ohio-icon-sc-button';
    }

    public function get_categories()
    {
        return [ 100 ];
    }

    protected function _register_controls()
    {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'block_type_layout',
            [
                'label' => __( 'Button layout', 'ohio-extra' ),
                'type' => 'ohio-image-choose',
                'options' => [
                    'fill' => [
                        'title' => __( 'Fill', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/button/images/wpb_params_023.svg',
                    ],
                    'outline' => [
                        'title' => __( 'Outline', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/button/images/wpb_params_024.svg',
                    ],
                    'flat' => [
                        'title' => __( 'Flat', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/button/images/wpb_params_025.svg',
                    ],
                    'link' => [
                        'title' => __( 'Link', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/button/images/wpb_params_026.svg',
                    ],
                ],
                'default' => 'fill',
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Click Me', 'ohio-extra' ),
                'placeholder' => __( 'Title text', 'ohio-extra' ),
                'label_block' => true
            ]
        );
        
        $this->add_control(
            'link',
            [
                'label' => __( 'Link URL', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'ohio-extra' ),
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => false,
                ],
            ]
        );

        $this->add_control(
            'button_size',
            [
                'label' => __( 'Button size', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'small' => __( 'Small', 'ohio-extra' ),
                    'default' => __( 'Default', 'ohio-extra' ),
                    'large' => __( 'Large', 'ohio-extra' ),
                    'huge' => __( 'Huge', 'ohio-extra' ),
                ],
                'default' => 'default',
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'button_position',
            [
                'label' => __( 'Button position', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'ohio-extra' ),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'ohio-extra' ),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'ohio-extra' ),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'default' => 'center',
                'toggle' => false,
            ]
        );

        $this->add_control(
            'full_width',
            [
                'label' => __( 'Set full width (100%)', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'icon_section',
            [
                'label' => __( 'Icon', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'use_icon',
            [
                'label' => __( 'Show icon', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $this->add_control(
            'icon_position',
            [
                'label' => __( 'Icon position', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'left' => __( 'Left', 'ohio-extra' ),
                    'right' => __( 'Right', 'ohio-extra' ),
                ],
                'default' => 'left',
                'condition' => [
                    'use_icon' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'swap_text_to_icon',
            [
                'label' => __( 'Swap icon to text on hover', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
                'description' => __( 'This add "rolling" effect on hover.', 'ohio-extra' ),
                'condition' => [
                    'use_icon' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'icon_type',
            [
                'label' => __( 'Icon type', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'icon' => __( 'Icon', 'ohio-extra' ),
                    'image' => __( 'Custom image', 'ohio-extra' ),
                ],
                'default' => 'icon',
                'condition' => [
                    'use_icon' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'icon_image',
            [
                'label' => __( 'Custom icon image', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'use_icon' => 'yes',
                    'icon_type' => 'image',
                ],
            ]
        );

        $this->add_control(
            'icon_icon',
            [
                'label' => __( 'Icon', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ],
                'condition' => [
                    'use_icon' => 'yes',
                    'icon_type' => 'icon',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'text_section',
            [
                'label' => __( 'Text and Layout', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs( 'tab_colors_style' );

        $this->start_controls_tab(
            'tab_colors_normal',
            [
                'label' => __( 'Normal', 'ohio-extra' ),
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __( 'Title color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn.btn-outline, {{WRAPPER}} .btn.btn-link, {{WRAPPER}} .btn.btn-flat, {{WRAPPER}} .btn.btn-default' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .btn:not(.btn-outline):not(.btn-flat):not(.btn-link) .text' => 'color: {{VALUE}}',
                ],
                'separator' => 'after'
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_colors_hover',
            [
                'label' => __( 'Hover', 'ohio-extra' ),
            ]
        );

        $this->add_control(
            'title_hover_color',
            [
                'label' => __( 'Title color on hover', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn.btn-outline:hover, {{WRAPPER}} .btn.btn-link:hover, {{WRAPPER}} .btn.btn-flat:hover, {{WRAPPER}} .btn.btn-default:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .btn:not(.btn-outline):not(.btn-flat):not(.btn-link):hover .text' => 'color: {{VALUE}}'
                ],
                'separator' => 'after'
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __( 'Title typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}}',
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'button_color',
            [
                'label' => __( 'Button color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-outline'       => 'border-color: {{VALUE}}; color: {{VALUE}}',
                    '{{WRAPPER}} .btn-outline:hover' => 'border-color: {{VALUE}}; color: #fff; background-color: {{VALUE}}',

                    '{{WRAPPER}} .btn-link'          => 'color: {{VALUE}}',

                    '{{WRAPPER}} .btn-flat'          => 'color: #fff; background-color: {{VALUE}}; border-color: {{VALUE}}',
                    '{{WRAPPER}} .btn-flat:hover'    => 'color: {{VALUE}}; background-color: transparent;',

                    '{{WRAPPER}} .btn-default'       => 'border-color: {{VALUE}}; background-color: {{VALUE}}'
                ]
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        // Wrapper classes
        switch ( $settings['button_position'] ) {
            case 'left':
                $this->addWrapperClass( 'text-left' );
                break;
            case 'right':
                $this->addWrapperClass( 'text-right' );
                break;
            default:
                $this->addWrapperClass( 'text-center' );
                break;
        }

        // Button classes
        $button_classes = [];
        switch ( $settings['block_type_layout'] ) {
            case 'outline':
                $button_classes[] = 'btn-outline';
                break;
            case 'flat':
                $button_classes[] = 'btn-flat';
                break;
            case 'link':
                $button_classes[] = 'btn-link';
                break;
            default:
                $button_classes[] = 'btn-default';
        }

        switch ( $settings['button_size'] ) {
            case 'small':
                $button_classes[] = 'btn-small';
                break;
            case 'large':
                $button_classes[] = 'btn-large';
                break;
            case 'huge':
                $button_classes[] = 'btn-huge';
                break;
        }

        if ( $settings['full_width'] ) {
            $button_classes[] = 'full-width';
        }

        if ( $settings['use_icon'] && $settings['swap_text_to_icon'] ) {
            $button_classes[] = 'btn-swap';
        }

        if ( !empty( $settings['button_color'] ) ) {
            $button_classes[] = 'btn-elementor-colored';
        }

        include( plugin_dir_path( __FILE__ ) . 'button-view.php' );
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Ohio_Elementor_Button_Widget() );
