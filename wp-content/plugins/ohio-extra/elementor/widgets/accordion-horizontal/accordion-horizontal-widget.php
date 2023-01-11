<?php
class Ohio_Elementor_Accordion_Horizontal_Widget extends Ohio_Elementor_Widget_Base {

    public function __construct( $data = [], $args = null ) {
        parent::__construct( $data, $args );

        wp_register_script( 'ohio-elementor-accordion-horizontal-widget', plugin_dir_url( __FILE__ ) . 'handler.js', [ 'jquery', 'elementor-frontend' ], '1.0.0', true );
    }

    public function get_name()
    {
        return 'ohio_accordion_horizontal';
    }

    public function get_title()
    {
        return __( 'Horizontal Accordion', 'ohio-extra' );
    }

    public function get_icon()
    {
        return 'ohio-icon-sc-accordion-horizontal';
    }

    public function get_categories()
    {
        return [ 100 ];
    }

    public function get_script_depends() {
        return [ 'ohio-elementor-accordion-horizontal-widget' ];
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
            'tabs',
            [
                'label' => __( 'Tabs', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $this->getTabsControls(),
                'default' => [],
                'title_field' => 'Section',
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
                'selectors' => [
                    '{{WRAPPER}} .horizontal_accordionItem_content' => 'background-color: {{VALUE}};',
                ]
            ]
        );

        $this->add_control(
            'tabs_active_color',
            [
                'label' => __( 'Tab color on hover', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .horizontal_accordionItem_content:hover' => 'background-color: {{VALUE}};',
                ]
            ]
        );

        $this->add_control(
            'editor_content_color',
            [
                'label' => __( 'Content color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .horizontal_accordionItem' => 'color: {{VALUE}};',
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'editor_content_typography',
                'label' => __( 'Content typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .horizontal_accordionItem'
            ]
        );

        $this->end_controls_section();
    }

    protected function getTabsControls()
    {
        $repeater = new \Elementor\Repeater();

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
                'separator' => 'before'
            ]
        );
        
        return $repeater->get_controls();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        include( plugin_dir_path( __FILE__ ) . 'accordion-horizontal-view.php' );
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Ohio_Elementor_Accordion_Horizontal_Widget() );
