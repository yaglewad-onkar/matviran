<?php
class Ohio_Elementor_Tabs_Widget extends Ohio_Elementor_Widget_Base {

    public function __construct( $data = [], $args = null ) {
        parent::__construct( $data, $args );

        wp_register_script( 'ohio-elementor-tabs-widget', plugin_dir_url( __FILE__ ) . 'handler.js', [ 'jquery', 'elementor-frontend' ], '1.0.0', true );
    }

    public function get_name()
    {
        return 'ohio_tabs';
    }

    public function get_title()
    {
        return __( 'Tabs', 'ohio-extra' );
    }

    public function get_icon()
    {
        return 'ohio-icon-sc-tabs';
    }

    public function get_categories()
    {
        return [ 100 ];
    }

    public function get_script_depends() {
        return [ 'ohio-elementor-tabs-widget' ];
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
            'tabs_layout',
            [
                'label' => __( 'Tabs layout', 'ohio-extra' ),
                'type' => 'ohio-image-choose',
                'options' => [
                    'default' => [
                        'title' => __( 'Default', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/tabs/images/wpb_params_058.svg',
                    ],
                    'filled' => [
                        'title' => __( 'Filled', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/tabs/images/wpb_params_059.svg',
                    ]
                ],
                'default' => 'default',
            ]
        );

        $this->add_control(
            'tabs_direction',
            [
                'label' => __( 'Tabs direction', 'ohio-extra' ),
                'type' => 'ohio-image-choose',
                'options' => [
                    'horizontal' => [
                        'title' => __( 'Horizontal', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/tabs/images/wpb_params_058.svg',
                    ],
                    'vertical' => [
                        'title' => __( 'Vertical', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/tabs/images/wpb_params_061.svg',
                    ]
                ],
                'default' => 'horizontal',
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
                'condition' => [
                    'tabs_layout' => 'default',
                    'tabs_direction' => 'horizontal'
                ],
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
            'tabs_text_color',
            [
                'label' => __( 'Tabs title color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tabNav_link' => 'color: {{VALUE}};',
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'tabs_typography',
                'label' => __( 'Tabs title typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .tabNav_link',
            ]
        );

        $this->add_control(
            'active_tabs_color',
            [
                'label' => __( 'Active tab color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .tabNav_link:hover, {{WRAPPER}} .tabNav_link.active' => 'color: {{VALUE}};'
                ]
            ]
        );

        $this->add_control(
            'tabs_line_color',
            [
                'label' => __( 'Active tab line color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tabNav .tabNav_line' => 'background-color: {{VALUE}};'
                ]
            ]
        );

        $this->add_control(
            'tab_border_color',
            [
                'label' => __( 'Tabs border color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .tabNav_wrapper' => 'border-right: 1px solid {{VALUE}};'
                ]
            ]
        );

        $this->add_control(
            'content_color',
            [
                'label' => __( 'Content color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tabItems_item, {{WRAPPER}} .tabItems_item p' => 'color: {{VALUE}};'
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'tabs_content_typography',
                'label' => __( 'Content typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .tabItems_item, {{WRAPPER}} .tabItems_item p'
            ]
        );

        $this->add_control(
            'tabs_background',
            [
                'label' => __( 'Background color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tab.filled' => 'background-color: {{VALUE}};'
                ],
                'condition' => [
                    'tabs_layout' => 'filled',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function getTabsControls()
    {
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'list_title',
            [
                'label' => __( 'Title', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Tab', 'ohio-extra' ),
                'placeholder' => __( 'Title text', 'ohio-extra' ),
                'label_block' => true,
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
            'custom_class',
            [
                'label' => __( 'Custom CSS class', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::TEXT,
                'separator' => 'before',
                'description' => 'If you want to add own styles to a specific unit, use this field to add custom CSS class.'
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
        if ( $settings['tabs_layout'] == 'filled' ) {
            $this->addWrapperClass('filled');
        }
        if ( $settings['tabs_direction'] == 'vertical' ) {
            $this->addWrapperClass('vertical');
        }

        switch ($settings['block_alignment']) {
            case 'left':   $this->addWrapperClass('tabs-left');   break;
            case 'center': $this->addWrapperClass('tabs-center'); break;
            case 'right':  $this->addWrapperClass('tabs-right');  break;
        }

        include( plugin_dir_path( __FILE__ ) . 'tabs-view.php' );
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Ohio_Elementor_Tabs_Widget() );
