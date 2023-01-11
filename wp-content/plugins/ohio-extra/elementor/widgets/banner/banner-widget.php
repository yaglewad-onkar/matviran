<?php
class Ohio_Elementor_Banner_Widget extends Ohio_Elementor_Widget_Base {

    public function get_name()
    {
        return 'ohio_banner';
    }

    public function get_title()
    {
        return __( 'Banner', 'ohio-extra' );
    }

    public function get_icon()
    {
        return 'ohio-icon-sc-banner';
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
                'label' => __( 'Banner layout', 'ohio-extra' ),
                'type' => 'ohio-image-choose',
                'options' => [
                    'full' => [
                        'title' => __( 'Card', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/banner/images/wpb_params_001.svg',
                    ],
                    'inner' => [
                        'title' => __( 'Overlay Details', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/banner/images/wpb_params_005.svg',
                    ],
                    'inner_hover' => [
                        'title' => __( 'Hover Details', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/banner/images/wpb_params_006.svg',
                    ],
                ],
                'default' => 'full',
            ]
        );

        $this->add_control(
            'block_type_full_align',
            [
                'label' => __( 'Content alignment', 'ohio-extra' ),
                'type' => 'ohio-image-choose',
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/banner/images/wpb_params_035.svg',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/banner/images/wpb_params_036.svg',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/banner/images/wpb_params_037.svg',
                    ],
                ],
                'default' => 'left',
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __( 'Headline', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Banner headline', 'ohio-extra' ),
                'placeholder' => __( 'Title text', 'ohio-extra' ),
            ]
        );

        $this->add_control(
            'subtitle',
            [
                'label' => __( 'Subtitle', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Subtitle text', 'ohio-extra' ),
                'placeholder' => __( 'Subtitle text', 'ohio-extra' ),
            ]
        );
        
        $this->add_control(
            'description',
            [
                'label' => __( 'Description (<small><strong>HTML allowed</strong></small>)', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 3,
                'description' => __( 'Banner can be used as announcement block.', 'ohio-extra' ),
            ]
        );

        $this->add_control(
            'background_image',
            [
                'label' => __( 'Background', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'use_link',
            [
                'label' => __( 'Use link', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'link',
            [
                'label' => __( 'URL', 'ohio-extra' ),
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

        $this->start_controls_section(
            'text_section',
            [
                'label' => __( 'Text and Overlay', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __( 'Headline color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __( 'Headline typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .banner-title',
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label' => __( 'Subtitle color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typography',
                'label' => __( 'Subtitle typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .banner-subtitle',
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
                'selector' => '{{WRAPPER}} p.description',
            ]
        );

        $this->add_control(
            'overlay_color',
            [
                'label' => __( 'Overlay color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'separator' => 'before'
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        // Wrapper classes
        switch ( $settings['block_type_layout'] ) {
            case 'inner':
                $this->addWrapperClass( 'inner' );
                break;
            case 'inner_hover':
                $this->addWrapperClass( [ 'inner', 'hover' ] );
                break;
        }

        switch ( $settings['block_type_full_align'] ) {
            case 'center':
                $this->addWrapperClass( 'text-center' );
                break;
            case 'right':
                $this->addWrapperClass( 'text-right' );
                break;
            default:
                $this->addWrapperClass( 'text-left' );
        }

        // Collect styles
        $this->addInlineStyle( 'heading', 'title_color', 'color: {{VALUE}}' );
        $this->addInlineStyle( 'subtitle', 'subtitle_color', 'color: {{VALUE}}' );
        $this->addInlineStyle( 'description', 'description_color', 'color: {{VALUE}}' );

        if ( $settings['block_type_layout'] == 'full' ) {
            $this->addInlineStyle( 'overlay', 'overlay_color', 'background: linear-gradient(rgba(0, 0, 0, 0), {{VALUE}})' );
        } else {
            $this->addInlineStyle( 'overlay', 'overlay_color', 'background: {{VALUE}}' );
        }

        include( plugin_dir_path( __FILE__ ) . 'banner-view.php' );
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Ohio_Elementor_Banner_Widget() );
