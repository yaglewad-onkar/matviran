<?php
class Ohio_Elementor_Team_Member_Widget extends Ohio_Elementor_Widget_Base {

    public function get_name()
    {
        return 'ohio_team_member';
    }

    public function get_title()
    {
        return __( 'Team Member', 'ohio-extra' );
    }

    public function get_icon()
    {
        return 'ohio-icon-sc-team-member';
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
            'block_layout',
            [
                'label' => __( 'Block layout', 'ohio-extra' ),
                'type' => 'ohio-image-choose',
                'options' => [
                    'card_details' => [
                        'title' => __( 'Card Details', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/team_member/images/wpb_params_062.svg',
                    ],
                    'inner_details' => [
                        'title' => __( 'Inner Details', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/team_member/images/wpb_params_063.svg',
                    ]
                ],
                'default' => 'card_details',
            ]
        );

        $this->add_control(
            'team_member_image',
            [
                'label' => __( 'Member photo', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'member_name',
            [
                'label' => __( 'Name', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'John Doe', 'ohio-extra' ),
            ]
        );

        $this->add_control(
            'member_position',
            [
                'label' => __( 'Position', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Product manager', 'ohio-extra' )
            ]
        );

        $this->add_control(
            'member_description',
            [
                'label' => __( 'Description', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 2,
                'description' => __( 'Tell what this remarkable team member in your team.', 'ohio-extra' ),
            ]
        );

        $this->add_control(
            'team_member_link',
            [
                'label' => __( 'Custom link', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'description' => __( 'Enter link to team member profile', 'ohio-extra' ),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'social_section',
            [
                'label' => __( 'Social links', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'social_networks',
            [
                'label' => __( 'Social networks', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $this->getSocialNetworksControls(),
                'default' => [],
                'title_field' => '{{list_link}}',
                'prevent_empty' => false,
            ]
        );

        $this->end_controls_section();

        //Styles
        $this->start_controls_section(
            'text_section',
            [
                'label' => __( 'Text styles', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'member_name_color',
            [
                'label' => __( 'Member name color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'member_name_typography',
                'label' => __( 'Member name typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} h5',
            ]
        );

        $this->add_control(
            'member_position_color',
            [
                'label' => __( 'Member position color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'member_position_typography',
                'label' => __( 'Member position typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .team-member_subtitle',
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
                'selector' => '{{WRAPPER}} .team-member_description',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'other_section',
            [
                'label' => __( 'Socials and overlay', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'overlay_color',
            [
                'label' => __( 'Overlay color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-member_wrap:before' => 'background-image:linear-gradient(to top, {{VALUE}}, transparent)',
                ]
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
            'socials_color',
            [
                'label' => __( 'Social links color', 'ohio-extra' ),
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
            'socials_hover_color',
            [
                'label' => __( 'Social links color on hover', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .socialbar a:hover' => 'background-color: transparent !important; border-color: {{VALUE}} !important; color: {{VALUE}};',
                ]
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    protected function getSocialNetworksControls()
    {
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'list_link', [
                'label' => '',
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => 'https://example.com',
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'list_network',
            [
                'label' => '',
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'facebook',
                'options' => $this->getSocialNetworksOptionsList(),
                'label_block' => true,
            ]
        );
        
        return $repeater->get_controls();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        // Wrapper classes
        if ( $settings['block_layout'] == 'inner_details'){
            $this->addWrapperClass( 'inner' );
        }

        // Collect styles
        $this->addInlineStyle( 'name', 'member_name_color', 'color: {{VALUE}}' );
        $this->addInlineStyle( 'position', 'member_position_color', 'color: {{VALUE}}' );
        $this->addInlineStyle( 'position', 'member_position_color', 'border-color: {{VALUE}}' );
        $this->addInlineStyle( 'description', 'description_color', 'color: {{VALUE}}' );
        $this->addInlineStyle( 'socials', 'socials_color', 'background-color: {{VALUE}}; border-color: {{VALUE}}' );

        include( plugin_dir_path( __FILE__ ) . 'team-member-view.php' );
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Ohio_Elementor_Team_Member_Widget() );
