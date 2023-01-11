<?php
class Ohio_Elementor_Video_Widget extends Ohio_Elementor_Widget_Base {

    public function get_name()
    {
        return 'ohio_video';
    }

    public function get_title()
    {
        return __( 'Video', 'ohio-extra' );
    }

    public function get_icon()
    {
        return 'ohio-icon-sc-video';
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
                'label' => __( 'General', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // General
        $this->add_control(
            'module_layout',
            [
                'label' => __( 'Video layout', 'ohio-extra' ),
                'type' => 'ohio-image-choose',
                'options' => [
                    'default' => [
                        'title' => __( 'Default', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/video/images/wpb_params_076.svg',
                    ],
                    'with_preview' => [
                        'title' => __( 'With Preview', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/video/images/wpb_params_075.svg',
                    ]
                ],
                'default' => 'default',
            ]
        );

        $this->add_control(
            'button_layout',
            [
                'label' => __( 'Video button layout', 'ohio-extra' ),
                'type' => 'ohio-image-choose',
                'options' => [
                    'filled' => [
                        'title' => __( 'Filled', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/video/images/wpb_params_073.svg',
                    ],
                    'outline' => [
                        'title' => __( 'Outline', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/video/images/wpb_params_074.svg',
                    ]
                ],
                'default' => 'filled',
            ]
        );

        $this->add_control(
            'preview_image',
            [
                'label' => __( 'Preview image', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'module_layout' => 'with_preview',
                ],
            ]
        );

        $this->add_control(
            'block_alignment',
            [
                'label' => __( 'Alignment', 'ohio-extra' ),
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
            'title',
            [
                'label' => __( 'Video title (<small><strong>HTML allowed</strong></small>)', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 2,
                'default' =>__( 'Play Video', 'ohio-extra' ),
                'placeholder' => __( 'Enter video title.', 'ohio-extra' ),
            ]
        );

        $this->add_control(
            'link',
            [
                'label' => __( 'Video URL', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __( 'https://www.youtube.com/embed/t67_zAg5vvI', 'ohio-extra' ),
                'placeholder' => __( 'https://www.youtube.com/embed/t67_zAg5vvI', 'ohio-extra' ),
                'separator' => 'before'
            ]
        );

        $this->end_controls_section();


        //Styles
        $this->start_controls_section(
            'text_section',
            [
                'label' => __( 'Button', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'use_call_to_action',
            [
                'label' => __( 'Use "Call to action" animation?', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __( 'Title color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __( 'Title typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} h6',
            ]
        );

        $this->start_controls_tabs( 'tab_colors_style', ['separator' => 'before'] );

        $this->start_controls_tab(
            'tab_colors_normal',
            [
                'label' => __( 'Normal', 'ohio-extra' ),
            ]
        );

        $this->add_control(
            'button_color',
            [
                'label' => __( 'Button color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-play:before' => 'border-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => __( 'Icon color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
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
            'button_color_hover',
            [
                'label' => __( 'Button color on hover', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-play:hover .ion' => 'background-color: {{VALUE}} !important; border-color: {{VALUE}} !important',
                ]
            ]
        );

        $this->add_control(
            'icon_color_hover',
            [
                'label' => __( 'Icon color on hover', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-play:hover .ion' => 'color: {{VALUE}} !important',
                ],
            ]
        );
        
        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        // Wrapper classes
        if ( $settings['use_call_to_action'] ){
            $this->addWrapperClass( 'with-animation' );
        }

        // Collect styles
        $this->addInlineStyle( 'title', 'title_color', 'color: {{VALUE}}' );
        $this->addInlineStyle( 'button', 'icon_color', 'color: {{VALUE}}' );
        $this->addInlineStyle( 'button', 'button_color', 'border-color: {{VALUE}}' );
        if ( $settings['button_layout'] != 'outline' ) {
            $this->addInlineStyle( 'button', 'button_color', 'background-color: {{VALUE}}' );
        }

        include( plugin_dir_path( __FILE__ ) . 'video-view.php' );
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Ohio_Elementor_Video_Widget() );
