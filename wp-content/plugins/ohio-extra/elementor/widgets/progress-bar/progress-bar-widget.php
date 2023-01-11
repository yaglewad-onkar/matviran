<?php
class Ohio_Elementor_Progress_Bar_Widget extends Ohio_Elementor_Widget_Base {

    public function __construct( $data = [], $args = null ) {
        parent::__construct( $data, $args );

        wp_register_script( 'ohio-elementor-progress-bar-widget', plugin_dir_url( __FILE__ ) . 'handler.js', [ 'jquery', 'elementor-frontend' ], '1.0.0', true );
    }

    public function get_name()
    {
        return 'ohio_progress_bar';
    }

    public function get_title()
    {
        return __( 'Progress Bar', 'ohio-extra' );
    }

    public function get_icon()
    {
        return 'ohio-icon-sc-progress-bar';
    }

    public function get_categories()
    {
        return [ 100 ];
    }

    public function get_script_depends() {
        return [ 'ohio-elementor-progress-bar-widget' ];
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
                    'default' => [
                        'title' => __( 'Default', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/progress_bar/images/wpb_params_048.svg',
                    ],
                    'inner' => [
                        'title' => __( 'Inner', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/progress_bar/images/wpb_params_049.svg',
                    ],
                    'pattern' => [
                        'title' => __( 'Pattern', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/progress_bar/images/wpb_params_051.svg',
                    ],
                ],
                'default' => 'default',
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
            'show_percents_tooltip',
            [
                'label' => __( 'Show percentage in tooltip', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
                'separator' => 'before'
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
                'selector' => '{{WRAPPER}} h6',
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
                'selector' => '{{WRAPPER}} h6 > span',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'bar_style_section',
            [
                'label' => __( 'Bar', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'bar_background_color',
            [
                'label' => __( 'Bar background color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
            ]
        );

        $this->add_control(
            'bar_line_color',
            [
                'label' => __( 'Bar line color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'tooltip_style_section',
            [
                'label' => __( 'Tooltip', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'show_percents' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'tooltip_color',
            [
                'label' => __( 'Tooltip color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .line-percent' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .line-percent:after' => 'border-top-color: {{VALUE}}',
                ],
                'condition' => [
                    'show_percents' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        // Wrapper classes
        switch ( $settings['block_type_layout'] ) {
            case 'inner':
                $this->addWrapperClass( 'inner' );
                break;
            case 'pattern':
                $this->addWrapperClass( 'pattern' );
                break;
        }

        // Collect styles
        $this->addInlineStyle( 'label', 'label_color', 'color: {{VALUE}}' );
        $this->addInlineStyle( 'percent', 'percentage_color', 'color: {{VALUE}}' );
        $this->addInlineStyle( 'bar-back', 'bar_background_color', 'background-color: {{VALUE}}' );
        $this->addInlineStyle( 'bar-line', 'bar_line_color', 'background-color: {{VALUE}}' );
        $this->addInlineStyle( 'tooltip', 'tooltip_color', 'background-color: {{VALUE}}' );

        include( plugin_dir_path( __FILE__ ) . 'progress-bar-view.php' );
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Ohio_Elementor_Progress_Bar_Widget() );
