<?php
class Ohio_Elementor_Accordion_Widget extends Ohio_Elementor_Widget_Base {

    public function __construct( $data = [], $args = null ) {
        parent::__construct( $data, $args );

        wp_register_script( 'ohio-elementor-accordion-widget', plugin_dir_url( __FILE__ ) . 'handler.js', [ 'jquery', 'elementor-frontend' ], '1.0.0', true );
    }

    public function get_name()
    {
        return 'ohio_accordion';
    }

    public function get_title()
    {
        return __( 'Accordion', 'ohio-extra' );
    }

    public function get_icon()
    {
        return 'ohio-icon-sc-accordion';
    }

    public function get_categories()
    {
        return [ 100 ];
    }

    public function get_script_depends() {
        return [ 'ohio-elementor-accordion-widget' ];
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
                    'filled' => [
                        'title' => __( 'Filled', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/accordion/images/wpb_params_021.svg',
                    ],
                    'outline' => [
                        'title' => __( 'Outline', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/accordion/images/wpb_params_022.svg',
                    ]
                ],
                'default' => 'filled',
            ]
        );

        $this->add_control( 
            'tabs',
            [
                'label' => __( 'Tabs', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $this->getTabsControls(),
                'default' => [],
                'title_field' => '{{list_title}}',
                'prevent_empty' => false,
            ]
        );

        $this->end_controls_section();

        //Styles
        $this->start_controls_section(
            'tabs_section',
            [
                'label' => __( 'Accordion styles', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'tabs_background_color',
            [
                'label' => __( 'Tabs background color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'block_layout' => 'filled',
                ],
                'selectors' => [
                    '{{WRAPPER}} .accordion:not(.outline) .accordionItem_title' => 'background-color: {{VALUE}};',
                ]
            ]
        );

        $this->add_control(
            'tabs_border_color',
            [
                'label' => __( 'Tabs border color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'block_layout' => 'outline',
                ],
                'selectors' => [
                    '{{WRAPPER}} .accordion .accordionItem_title' => 'border-top: 1px solid {{VALUE}};border-bottom: 1px solid {{VALUE}};',
                ]
            ]
        );

        $this->add_control(
            'tabs_active_color',
            [
                'label' => __( 'Tab color on active', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion.outline       .accordionItem.active .accordionItem_title' => 'border-color: {{VALUE}};',
                    '{{WRAPPER}} .accordion:not(.outline) .accordionItem.active .accordionItem_title' => 'background-color: {{VALUE}};'
                ]
            ]
        );

        $this->add_control(
            'tabs_text_color',
            [
                'label' => __( 'Tabs title color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordionItem_title h6' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .accordionItem_control i.ion' => 'color: {{VALUE}};',
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'tabs_typography',
                'label' => __( 'Tabs title typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .accordionItem_title h6',
            ]
        );

        $this->add_control(
            'editor_content_color',
            [
                'label' => __( 'Content color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .accordionItem_content .wrap' => 'color: {{VALUE}};'
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'editor_content_typography',
                'label' => __( 'Content typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .accordionItem_content .wrap',
            ]
        );

        $this->end_controls_section();
    }

    protected function getTabsControls()
    {
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'is_active',
            [
                'label' => __( 'Is active?', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $repeater->start_controls_tabs( 'tab_colors_style' );

        $repeater->start_controls_tab(
            'tab_tabs_content',
            [
                'label' => __( 'Content', 'ohio-extra' ),
            ]
        );

        $repeater->add_control(
            'list_title',
            [
                'label' => __( 'Title', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Tab', 'ohio-extra' ),
                'placeholder' => __( 'Title text', 'ohio-extra' ),
                'label_block' => true,
                'separator' => 'before'
            ]
        );

        $repeater->add_control(
            'list_content_type',
            [
                'label' => __( 'Content type', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'editor' => __( 'Editor text', 'ohio-extra' ),
                    'template' => __( 'Template', 'ohio-extra' ),
                ],
                'label_block' => 'true',
                'default' => 'editor',
            ]
        );

        $repeater->add_control(
            'list_content_editor',
            [
                'label' => __( 'Editor', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( 'Content text', 'ohio-extra' ),
                'condition' => [
                    'list_content_type' => 'editor',
                ],
            ]
        );

        // Available templates
        $templates = \Elementor\Plugin::$instance->templates_manager->get_source( 'local' )->get_items();
        $options = [ '0' => '— ' . esc_html__( 'Select', 'ohio-extra' ) . ' —' ];
        $types = [];

        foreach ( $templates as $template ) {
            $options[ $template['template_id'] ] = $template['title'] . ' (' . $template['type'] . ')';
            $types[ $template['template_id'] ] = $template['type'];
        }
        
        $repeater->add_control(
            'list_content_template',
            array(
                'label'       => esc_html__( 'Choose Template', 'ohio-extra' ),
                'type'        => \Elementor\Controls_Manager::SELECT,
                'default'     => '0',
                'options'     => $options,
                'types'       => $types,
                'label_block' => 'true',
                'condition'   => [
                    'list_content_type' => 'template',
                ]
            )
        );
        
        $repeater->add_control(
            'use_icon',
            [
                'label' => __( 'Add icon?', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
                'separator' => 'before'
            ]
        );

        $repeater->add_control(
            'icon_icon',
            [
                'label' => __( 'Icon', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ],
                'condition' => [
                    'use_icon' => 'yes'
                ],
            ]
        );
        
        $repeater->end_controls_tab();

        $repeater->start_controls_tab(
            'tab_tabs_styles',
            [
                'label' => __( 'Styles', 'ohio-extra' ),
            ]
        );

        $repeater->add_control(
            'text_color',
            [
                'label' => __( 'Tab title color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .accordionItem_title h6' => 'color: {{VALUE}};',
                    '{{WRAPPER}} {{CURRENT_ITEM}} .accordionItem_control i.ion' => 'color: {{VALUE}};',
                ],
                'separator' => 'before'
            ]
        );

        $repeater->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'typography',
                'label' => __( 'Tab title typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .accordionItem_title h6'
            ]
        );

        $repeater->add_control(
            'tab_color',
            [
                'label' => __( 'Tab background/border color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion.outline       {{CURRENT_ITEM}}.accordionItem .accordionItem_title' => 'border-color: {{VALUE}};',
                    '{{WRAPPER}} .accordion:not(.outline) {{CURRENT_ITEM}}.accordionItem .accordionItem_title' => 'background-color: {{VALUE}};'
                ],
            ]
        );

        $repeater->add_control(
            'content_color',
            [
                'label' => __( 'Content color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .accordionItem_content .wrap' => 'color: {{VALUE}};'
                ],
                'separator' => 'before',
            ]
        );

        $repeater->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography',
                'label' => __( 'Content typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .accordionItem_content .wrap'
            ]
        );

        $repeater->add_control(
            'icon_color',
            [
                'label' => __( 'Icon color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .accordionItem_title > i.icon' => 'color: {{VALUE}};',
                ],
                'separator' => 'before'
            ]
        );

        $repeater->add_control(
            'custom_class',
            [
                'label' => __( 'Custom CSS class', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::TEXT,
                'separator' => 'before'
            ]
        );

        $repeater->end_controls_tab();

        $repeater->end_controls_tabs();
        
        return $repeater->get_controls();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        // Wrapper classes
        if ( $settings['block_layout'] == 'outline' ) {
            $this->addWrapperClass( 'outline' );
        }

        include( plugin_dir_path( __FILE__ ) . 'accordion-view.php' );
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Ohio_Elementor_Accordion_Widget() );
