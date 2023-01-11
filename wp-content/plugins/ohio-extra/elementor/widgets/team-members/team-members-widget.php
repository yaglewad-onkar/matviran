<?php
class Ohio_Elementor_Team_Members_Widget extends Ohio_Elementor_Widget_Base {

    public function __construct( $data = [], $args = null ) {
        parent::__construct( $data, $args );

        wp_register_script( 'ohio-elementor-team-members-widget', plugin_dir_url( __FILE__ ) . 'handler.js', [ 'jquery', 'elementor-frontend' ], '1.0.0', true );
    }

    public function get_name()
    {
        return 'ohio_team_members';
    }

    public function get_title()
    {
        return __( 'Team Members Group', 'ohio-extra' );
    }

    public function get_icon()
    {
        return 'ohio-icon-sc-team-members';
    }

    public function get_categories()
    {
        return [ 100 ];
    }

    public function get_script_depends() {
        return [ 'ohio-elementor-team-members-widget' ];
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
            'members',
            [
                'label' => __( 'Members', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $this->getMembersControls(),
                'default' => [],
                'title_field' => '{{member_name}}',
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
            'wrapper_color',
            [
                'label' => __( 'Block background', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-member.cover .center-aligned' => 'background-color: {{VALUE}}',
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

    protected function getMembersControls()
    {
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'team_member_image',
            [
                'label' => __( 'Member photo', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'member_name',
            [
                'label' => __( 'Name', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'John Doe', 'ohio-extra' ),
            ]
        );

        $repeater->add_control(
            'member_position',
            [
                'label' => __( 'Position', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Product manager', 'ohio-extra' )
            ]
        );

        $repeater->add_control(
            'member_description',
            [
                'label' => __( 'Description', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 2,
                'description' => __( 'Tell what this remarkable team member in your team.', 'ohio-extra' ),
            ]
        );

        $repeater->add_control(
            'social_facebook',
            [
                'label' => __( 'Facebook link', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => false,
                'separator' => 'before'
            ]
        );

        $repeater->add_control(
            'social_linkedin',
            [
                'label' => __( 'LinkedIn link', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => false,
            ]
        );

        $repeater->add_control(
            'social_twitter',
            [
                'label' => __( 'Twitter link', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => false,
            ]
        );

        $repeater->add_control(
            'social_instagram',
            [
                'label' => __( 'Instagram link', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => false,
            ]
        );

        $repeater->add_control(
            'social_whatsapp',
            [
                'label' => __( 'WhatsApp link', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => false,
            ]
        );

        $repeater->add_control(
            'social_fivehundred',
            [
                'label' => __( '500px link', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => false,
            ]
        );

        return $repeater->get_controls();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        // Collect styles
        $this->addInlineStyle( 'name', 'member_name_color', 'color: {{VALUE}}' );
        $this->addInlineStyle( 'position', 'member_position_color', 'color: {{VALUE}}' );
        $this->addInlineStyle( 'position', 'member_position_color', 'border-color: {{VALUE}}' );
        $this->addInlineStyle( 'description', 'description_color', 'color: {{VALUE}}' );
        $this->addInlineStyle( 'socials', 'socials_color', 'background-color: {{VALUE}}; border-color: {{VALUE}}' );

        include( plugin_dir_path( __FILE__ ) . 'team-members-view.php' );
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Ohio_Elementor_Team_Members_Widget() );
