<?php
class Ohio_Elementor_Heading_Widget extends Ohio_Elementor_Widget_Base {

    public function get_name()
    {
        return 'ohio_heading';
    }

    public function get_title()
    {
        return __( 'Heading', 'ohio-extra' );
    }

    public function get_icon()
    {
        return 'ohio-icon-sc-heading';
    }

    public function get_categories()
    {
        return [ 100 ];
    }

    protected function _register_controls()
    {
        $this->start_controls_section(
            'title_section',
            [
                'label' => __( 'Title', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'module_type_layout',
            [
                'label' => __( 'Heading layout', 'ohio-extra' ),
                'type' => 'ohio-image-choose',
                'options' => [
                    'on_left' => [
                        'title' => __( 'Left', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/heading/images/wpb_params_035.svg',
                    ],
                    'on_middle' => [
                        'title' => __( 'Center', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/heading/images/wpb_params_036.svg',
                    ],
                    'on_right' => [
                        'title' => __( 'Right', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/heading/images/wpb_params_037.svg',
                    ],
                ],
                'default' => 'on_middle',
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __( 'Title (<small><strong>HTML allowed</strong></small>)', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 1,
                'default' =>__( 'Hello World', 'ohio-extra' ),
                'placeholder' => __( 'Enter block title.', 'ohio-extra' ),
            ]
        );

        $this->add_control(
            'heading_tag',
            [
                'label' => __( 'Heading HTML tag', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'h3',
                'options' => [
                    'h1' => 'h1',
                    'h2' => 'h2',
                    'h3' => 'h3',
                    'h4' => 'h4',
                    'h5' => 'h5',
                    'h6' => 'h6',
                ],
                'separator' => 'after'
            ]
        );

        $this->add_control(
            'divider_position',
            [
                'label' => __( 'Divider', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'without' => __( 'Hidden', 'ohio-extra' ),
                    'after_title' => __( 'After Title', 'ohio-extra' ),
                    'before_title' => __( 'Before Title', 'ohio-extra' ),
                ],
                'default' => 'without',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'subtitle_section',
            [
                'label' => __( 'Subtitle', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'subtitle_type_layout',
            [
                'label' => __( 'Subtitle layout', 'ohio-extra' ),
                'type' => 'ohio-image-choose',
                'options' => [
                    'without_subtitle' => [
                        'title' => __( 'Without Subtitle', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/heading/images/wpb_params_039.svg',
                    ],
                    'bottom_subtitle' => [
                        'title' => __( 'Bottom Subtitle', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/heading/images/wpb_params_035.svg',
                    ],
                    'top_subtitle' => [
                        'title' => __( 'Top Subtitle', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/heading/images/wpb_params_038.svg',
                    ],
                ],
                'default' => 'bottom_subtitle',
            ]
        );

        $this->add_control(
            'subtitle',
            [
                'label' => __( 'Subtitle (<small><strong>HTML allowed</strong></small>)', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 1,
                'default' =>__( 'I\'m subtitle', 'ohio-extra' ),
                'placeholder' => __( 'Enter block subtitle.', 'ohio-extra' ),
                'condition' => [
                    'subtitle_type_layout!' => 'without_subtitle',
                ],
            ]
        );

        $this->add_control(
            'width',
            [
                'label' => __( 'Subtitle offset', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 80,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 15,
                ],
                'selectors' => [
                    '{{WRAPPER}} .subtitle-top .subtitle' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .subtitle-bottom .subtitle' => 'margin-top: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'subtitle_type_layout!' => 'without_subtitle',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'content_style_section',
            [
                'label' => __( 'Content', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'heading_color',
            [
                'label' => __( 'Heading color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'header_typography',
                'label' => __( 'Heading typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} h1, {{WRAPPER}} h2, {{WRAPPER}} h3, {{WRAPPER}} h4, {{WRAPPER}} h5, {{WRAPPER}} h6',
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label' => __( 'Subtitle color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'subtitle_type_layout!' => 'without_subtitle',
                ],
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typography',
                'label' => __( 'Subtitle typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .subtitle',
                'condition' => [
                    'subtitle_type_layout!' => 'without_subtitle',
                ],
            ]
        );

        $this->add_control(
            'divider_color',
            [
                'label' => __( 'Divider color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'divider_position!' => 'without',
                ],
                'separator' => 'before'
            ]
        );

        $this->end_controls_section();
        
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        // Wrapper classes
        switch ( $settings['module_type_layout'] ) {
            case 'on_left':
                $this->addWrapperClass( 'text-left' );
                break;
            case 'on_right':
                $this->addWrapperClass( 'text-right' );
                break;
            default:
                $this->addWrapperClass( 'text-center' );
        }

        switch ( $settings['subtitle_type_layout'] ) {
            case 'top_subtitle':
                $this->addWrapperClass( 'subtitle-top' );
                break;
            case 'bottom_subtitle':
                $this->addWrapperClass( 'subtitle-bottom' );
                break;
        }

        // Collect styles
        $this->addInlineStyle( 'heading', 'heading_color', 'color: {{VALUE}}' );
        $this->addInlineStyle( 'subtitle', 'subtitle_color', 'color: {{VALUE}}' );
        $this->addInlineStyle( 'divider', 'divider_color', 'background-color: {{VALUE}}' );

        include( plugin_dir_path( __FILE__ ) . 'heading-view.php' );
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Ohio_Elementor_Heading_Widget() );
