<?php
class Ohio_Elementor_Icon_Box_Widget extends Ohio_Elementor_Widget_Base {

    public function get_name()
    {
        return 'ohio_icon_box';
    }

    public function get_title()
    {
        return __( 'Icon Box', 'ohio-extra' );
    }

    public function get_icon()
    {
        return 'ohio-icon-sc-icon-box';
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
            'icon_box_layout',
            [
                'label' => __( 'Block layout', 'ohio-extra' ),
                'type' => 'ohio-image-choose',
                'options' => [
                    'top_icon' => [
                        'title' => __( 'Top Icon', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/icon_box/images/wpb_params_012.svg',
                    ],
                    'left_icon' => [
                        'title' => __( 'Left Icon', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/icon_box/images/wpb_params_015.svg',
                    ]
                ],
                'default' => 'top_icon',
            ]
        );

        $this->add_control(
            'icon_box_full_layout',
            [
                'label' => __( 'Layout variant', 'ohio-extra' ),
                'type' => 'ohio-image-choose',
                'options' => [
                    'none' => [
                        'title' => __( 'Float Content', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/icon_box/images/wpb_params_015.svg',
                    ],
                    'full' => [
                        'title' => __( 'Fullsize Content', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/icon_box/images/wpb_params_016.svg',
                    ]
                ],
                'default' => 'top_icon',
                'condition' => [
                    'icon_box_layout' => 'left_icon',
                ],
            ]
        );

        $this->add_control(
            'icon_box_alignment',
            [
                'label' => __( 'Alignment', 'ohio-extra' ),
                'type' => 'ohio-image-choose',
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/icon_box/images/wpb_params_013.svg',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/icon_box/images/wpb_params_012.svg',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/icon_box/images/wpb_params_014.svg',
                    ]
                ],
                'default' => 'center',
                'condition' => [
                    'icon_box_layout' => 'top_icon',
                ],
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Hello there!',
                'label_block' => true
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => __( 'Description', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 2,
                'label_block' => true,
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
            'icon_layout',
            [
                'label' => __( 'Icon alignment', 'ohio-extra' ),
                'type' => 'ohio-image-choose',
                'options' => [
                    'default' => [
                        'title' => __( 'Default', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/icon_box/images/wpb_params_017.svg',
                    ],
                    'border' => [
                        'title' => __( 'Border', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/icon_box/images/wpb_params_018.svg',
                    ],
                    'fill_border' => [
                        'title' => __( 'Fill and Border', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/icon_box/images/wpb_params_019.svg',
                    ],
                    'fill' => [
                        'title' => __( 'Only Fill', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/icon_box/images/wpb_params_020.svg',
                    ]
                ],
                'default' => 'default',
            ]
        );

        $this->add_control(
            'icon_type',
            [
                'label' => __( 'Icon type', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'icon',
                'options' => [
                    'icon' => 'Font icon',
                    'image' => 'Custom image',
                ],
            ]
        );

        $this->add_control(
            'icon_image',
            [
                'label' => __( 'Preview image', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
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
                    'icon_type' => 'icon',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'link_section',
            [
                'label' => __( 'Link', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'use_link',
            [
                'label' => __( 'Use link?', 'ohio-extra' ),
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
                'default' => __( 'Read more', 'ohio-extra' ),
                'label_block' => true,
                'condition' => [
                    'use_link' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'button_link',
            [
                'label' => __( 'Button URL', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'ohio-extra' ),
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => false,
                    'nofollow' => false,
                ],
                'condition' => [
                    'use_link' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();

        //Styles
        $this->start_controls_section(
            'text_section',
            [
                'label' => __( 'General', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __( 'Title color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __( 'Title typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} h5.icon-box-title',
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => __( 'Description color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'label' => __( 'Description typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} p.icon-box-details',
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => __( 'Icon color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'separator' => 'before',
                'condition' => [
                    'icon_type' => 'icon',
                ],
            ]
        );

        $this->add_control(
            'icon_back_color',
            [
                'label' => __( 'Icon background color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon-box-icon' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'icon_layout' => ['fill', 'fill_border']
                ],
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'icon_border_color',
            [
                'label' => __( 'Icon border color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon-box-icon' => 'border-color: {{VALUE}};',
                ],
                'condition' => [
                    'icon_layout' => ['border', 'fill_border']
                ],
            ]
        );

        $this->end_controls_section();
  
        $this->addButtonStyleSection();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        // Wrapper classes
        if ( $settings['icon_box_layout'] == 'left_icon' ) {
            $this->addWrapperClass( 'with-left-icon' );
        } else if ( $settings['icon_box_layout'] == 'top_icon' ) {
            $this->addWrapperClass( 'text-' . $settings['icon_box_alignment'] );
        }

        if ( $settings['icon_box_full_layout'] == 'full' ) { 
            $this->addWrapperClass( 'with-full-icon' );
        } 

        switch ( $settings['icon_layout'] ) {
            case 'border':
                $this->addWrapperClass( 'shape-border' );
                break;
            case 'fill_border':
                $this->addWrapperClass( 'shape-border shape-fill' );
                break;
            case 'fill':
                $this->addWrapperClass( 'shape-fill' );
                break;
        }

        // Collect styles
        $this->addInlineStyle( 'title', 'title_color', 'color: {{VALUE}}' );
        $this->addInlineStyle( 'description', 'description_color', 'color: {{VALUE}}' );
        $this->addInlineStyle( 'icon', 'icon_color', 'color: {{VALUE}}' );

        include( plugin_dir_path( __FILE__ ) . 'icon-box-view.php' );
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Ohio_Elementor_Icon_Box_Widget() );
