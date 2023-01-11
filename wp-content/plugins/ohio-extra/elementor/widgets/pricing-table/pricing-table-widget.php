<?php
class Ohio_Elementor_Pricing_Table_Widget extends Ohio_Elementor_Widget_Base {

    public function get_name()
    {
        return 'ohio_pricing_table';
    }

    public function get_title()
    {
        return __( 'Pricing Table', 'ohio-extra' );
    }

    public function get_icon()
    {
        return 'ohio-icon-sc-pricing-table';
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

        // General
        $this->add_control(
            'headline',
            [
                'label' => __( 'Headline', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Basic Plan', 'ohio-extra' ),
                'label_block' => true,
                'description' => __( 'You can specify the name of the tariff plan like Basic and Business or your product name.', 'ohio-extra' ),
            ]
        );

        $this->add_control(
            'subtitle',
            [
                'label' => __( 'Subtitle', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Good for start', 'ohio-extra' ),
                'label_block' => true
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => __( 'Description', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 2,
                'description' => __( 'Short description.', 'ohio-extra' ),
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'price_section',
            [
                'label' => __( 'Price', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Price

        $this->add_control(
            'price',
            [
                'label' => __( 'Price', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '10',
                'label_block' => true,
                'description' => __( 'Number or specific phrases like Free, Personal price and Beta testers only', 'ohio-extra' ),
            ]
        );

        $this->add_control(
            'currency',
            [
                'label' => __( 'Currency', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '$',
                'description' => __( '$, €, £, ¥, USD, EUR, anything', 'ohio-extra' )
            ]
        );

        $this->add_control(
            'caption',
            [
                'label' => __( 'Caption', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 2,
                'description' => __( 'You can write that this amount per year or month. For ex. per month or per year', 'ohio-extra' )
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'features_section',
            [
                'label' => __( 'Features', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'features_list',
            [
                'label' => __( 'Features list', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $this->getFeaturesControls(),
                'default' => [],
                'title_field' => '{{list_title}}',
                'prevent_empty' => false,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'button_section',
            [
                'label' => __( 'Button', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'use_link',
            [
                'label' => __( 'Add button', 'ohio-extra' ),
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
                'label' => __( 'Button title', 'ohio-extra' ),
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
                'label' => __( 'Button URL', 'ohio-extra' ),
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
            'border_color',
            [
                'label' => __( 'Borders color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing_price' => 'border-color: {{VALUE}}',
                ],
                'separator' => 'after'
            ]
        );

        $this->add_control(
            'headline_color',
            [
                'label' => __( 'Headline color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing_title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'headline_typography',
                'label' => __( 'Headline typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .pricing_title',
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label' => __( 'Subtitle color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing_subtitle' => 'color: {{VALUE}}',
                ],
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typography',
                'label' => __( 'Subtitle typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .pricing_subtitle',
            ]
        );

        
        $this->add_control(
            'description_color',
            [
                'label' => __( 'Description color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing_price .pricing_price_subtitle' => 'color: {{VALUE}}',
                ],
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'label' => __( 'Description typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .pricing_price .pricing_price_subtitle',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'price_styles_section',
            [
                'label' => __( 'Price', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'price_color',
            [
                'label' => __( 'Price color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing_price .pricing_price_title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'price_typography',
                'label' => __( 'Price typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .pricing_price .pricing_price_title',
            ]
        );

        $this->add_control(
            'price_cap_color',
            [
                'label' => __( 'Price caption color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing_price .pricing_price_time' => 'color: {{VALUE}}',
                ],
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'price_cap_typography',
                'label' => __( 'Price caption typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .pricing_price .pricing_price_time',
            ]
        );

        $this->add_control(
            'price_bg_cap_color',
            [
                'label' => __( 'Price caption background', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing_price .pricing_price_time' => 'background-color: {{VALUE}}',
                ],
                'separator' => 'before'
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'features_styles_section',
            [
                'label' => __( 'Features', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'feature_color',
            [
                'label' => __( 'Feature color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing_list .pricing_list_item:not(.disabled) .title' => 'color: {{VALUE}}',
                ],
            ]
        );
        
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'feature_typography',
                'label' => __( 'Feature typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .pricing_list .pricing_list_item:not(.disabled) .title',
            ]
        );


        $this->add_control(
            'feature_dis_color',
            [
                'label' => __( 'Disabled features color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing_list .pricing_list_item.disabled .title' => 'color: {{VALUE}}',
                ],
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'feature_dis_typography',
                'label' => __( 'Disabled features typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .pricing_list .pricing_list_item.disabled .title',
            ]
        );

        $this->add_control(
            'feature_enabled_icon_color',
            [
                'label' => __( '"Enabled" icon color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing_list .pricing_list_item:not(.disabled) .ion' => 'color: {{VALUE}}',
                ],
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'feature_disabled_icon_color',
            [
                'label' => __( '"Disabled" icon color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing_list .pricing_list_item.disabled .ion' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

        $this->addButtonStyleSection();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        include( plugin_dir_path( __FILE__ ) . 'pricing-table-view.php' );
    }

    protected function getFeaturesControls()
    {
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'list_type',
            [
                'label' => __( 'Icon', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'without'  => __( 'Without icon', 'ohio-extra' ),
                    'enabled'  => __( '"Enabled" icon', 'ohio-extra' ),
                    'disabled' => __( '"Disabled" icon', 'ohio-extra' ),
                ],
                'default' => 'without',
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'list_title', [
                'label' => __( 'Headline', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Some cool feature', 'ohio-extra' ),
                'label_block' => true,
            ]
        );
        
        return $repeater->get_controls();
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Ohio_Elementor_Pricing_Table_Widget() );
