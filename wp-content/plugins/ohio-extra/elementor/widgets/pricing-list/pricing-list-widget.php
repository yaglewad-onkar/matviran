<?php
class Ohio_Elementor_Pricing_List_Widget extends Ohio_Elementor_Widget_Base {

    public function get_name()
    {
        return 'ohio_pricing_list';
    }

    public function get_title()
    {
        return __( 'Pricing List', 'ohio-extra' );
    }

    public function get_icon()
    {
        return 'ohio-icon-sc-pricing-list';
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
            'name',
            [
                'label' => __( 'Headline', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Item position', 'ohio-extra' ),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'ingredients',
            [
                'label' => __( 'Details', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true
            ]
        );

        $this->add_control(
            'regular_price',
            [
                'label' => __( 'Regular Price', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '25$',
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'sale_price',
            [
                'label' => __( 'Sale Price', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'mark',
            [
                'label' => __( '"New" mark', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
                'separator' => 'before'
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
            'headline_color',
            [
                'label' => __( 'Headline color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .menu-list h6' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'headline_typography',
                'label' => __( 'Headline typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .menu-list h6',
            ]
        );

        $this->add_control(
            'indgredients_color',
            [
                'label' => __( 'Details color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .menu-list .menu-list-details p' => 'color: {{VALUE}}',
                ],
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ingredients_typography',
                'label' => __( 'Details typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .menu-list .menu-list-details p',
            ]
        );

        $this->end_controls_section();

        // Styles
        $this->start_controls_section(
            'price_styles_section',
            [
                'label' => __( 'Price and "New" mark', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'regular_price_color',
            [
                'label' => __( 'Regular price color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-list-both .discount-price' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .pricing-list-regular-only .regular-price' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'regular_price_typography',
                'label' => __( 'Price typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .pricing-list-both .discount-price, {{WRAPPER}} .pricing-list-regular-only .regular-price'
            ]
        );

        $this->add_control(
            'sale_price_color',
            [
                'label' => __( 'Sale price color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-list-both .regular-price' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .pricing-list-sale-only .regular-price' => 'color: {{VALUE}}',
                ],
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'sale_price_typography',
                'label' => __( 'Price typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .pricing-list-both .regular-price, {{WRAPPER}} .pricing-list-sale-only .regular-price',
            ]
        );

        $this->add_control(
            'mark_color',
            [
                'label' => __( '"New!" mark text color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .menu-list .menu-list-details .tag' => 'color: {{VALUE}}',
                ],
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'mark_typography',
                'label' => __( 'Mark typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .menu-list .menu-list-details .tag',
            ]
        );

        $this->add_control(
            'mark_background',
            [
                'label' => __( 'Mark backgroud', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .menu-list .menu-list-details .tag' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        if ( !empty( $settings['regular_price'] ) && !empty( $settings['sale_price'] ) ) {
            $this->addWrapperClass( 'pricing-list-both' );
        } elseif ( !empty( $settings['regular_price'] ) && empty( $settings['sale_price'] ) ) {
            $this->addWrapperClass( 'pricing-list-regular-only' );
        } elseif ( empty( $settings['regular_price'] ) && !empty( $settings['sale_price'] ) ) {
            $this->addWrapperClass( 'pricing-list-sale-only' );
        }

        include( plugin_dir_path( __FILE__ ) . 'pricing-list-view.php' );
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Ohio_Elementor_Pricing_List_Widget() );
