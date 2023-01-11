<?php
class Ohio_Elementor_Circle_Progress_Bar_Widget extends Ohio_Elementor_Widget_Base {

    public function __construct( $data = [], $args = null ) {
        parent::__construct( $data, $args );

        wp_register_script( 'ohio-elementor-circle-progress-bar-widget', plugin_dir_url( __FILE__ ) . 'handler.js', [ 'jquery', 'elementor-frontend' ], '1.0.0', true );
    }

    public function get_name()
    {
        return 'ohio_circle_progress_bar';
    }

    public function get_title()
    {
        return __( 'Circle Progress', 'ohio-extra' );
    }

    public function get_icon()
    {
        return 'ohio-icon-sc-circle-progress-bar';
    }

    public function get_categories()
    {
        return [ 100 ];
    }

    public function get_script_depends() {
        return [ 'ohio-elementor-circle-progress-bar-widget' ];
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
                'label' => __( 'Block layout', 'ohio-extra' ),
                'type' => 'ohio-image-choose',
                'options' => [
                    'percent' => [
                        'title' => __( 'Percent', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/circle_progress_bar/images/wpb_params_046.svg',
                    ],
                    'icon' => [
                        'title' => __( 'Icon', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/circle_progress_bar/images/wpb_params_047.svg',
                    ],
                ],
                'default' => 'percent',
            ]
        );

        $this->add_control(
            'progress_value',
            [
                'label' => __( 'Progress value', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ '%' ],
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 75,
                ],
            ]
        );

        $this->add_control(
            'label',
            [
                'label' => __( 'Label (<small><strong>HTML allowed</strong></small>)', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 2,
                'default' =>__( 'Some Feature', 'ohio-extra' ),
                'placeholder' => __( 'Enter block title.', 'ohio-extra' ),
            ]
        );

        $this->add_control(
            'label_position',
            [
                'label' => __( 'Label position', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'bottom',
                'options' => [
                    'left' => 'Left',
                    'bottom' => 'Bottom',
                    'right' => 'Right',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'icon_section',
            [
                'label' => __( 'Icon', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'block_type_layout' => 'icon',
                ],
            ]
        );

        $this->add_control(
            'icon_type',
            [
                'label' => __( 'Icon Type', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'icon' => __( 'Icon', 'ohio-extra' ),
                    'image' => __( 'Custom image', 'ohio-extra' ),
                ],
                'default' => 'icon',
                'condition' => [
                    'block_type_layout' => 'icon',
                ],
            ]
        );

        $this->add_control(
            'icon_image',
            [
                'label' => __( 'Custom Icon Image', 'ohio-extra' ),
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
            'icon_style_section',
            [
                'label' => __( 'Icon', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'block_type_layout' => 'icon',
                ],
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => __( 'Icon color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'block_type_layout' => 'icon',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'chart_style_section',
            [
                'label' => __( 'Chart', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'chart_color',
            [
                'label' => __( 'Chart color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'label_style_section',
            [
                'label' => __( 'Label', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'label_color',
            [
                'label' => __( 'Label color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'label_typography',
                'label' => __( 'Label typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} h6.title',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'percentage_style_section',
            [
                'label' => __( 'Percentage', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'percentage_color',
            [
                'label' => __( 'Percentage color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'percentage_typography',
                'label' => __( 'Percentage typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .percent-wrap h4',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        // Wrapper classes
        switch ( $settings['label_position'] ) {
            case 'left':
                $this->addWrapperClass( 'circle-progress-bar-left' );
                break;
            case 'right':
                $this->addWrapperClass( 'circle-progress-bar-right' );
                break;
        }

        // Collect styles
        $this->addInlineStyle( 'icon', 'icon_color', 'color: {{VALUE}}' );
        $this->addInlineStyle( 'chart', 'chart_color', 'stroke: {{VALUE}}' );
        $this->addInlineStyle( 'label', 'label_color', 'color: {{VALUE}}' );
        $this->addInlineStyle( 'percent', 'percentage_color', 'color: {{VALUE}}' );
        
        include( plugin_dir_path( __FILE__ ) . 'circle-progress-bar-view.php' );
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Ohio_Elementor_Circle_Progress_Bar_Widget() );
