<?php
class Ohio_Elementor_Compare_Widget extends Ohio_Elementor_Widget_Base {

    public function __construct( $data = [], $args = null ) {
        parent::__construct( $data, $args );

        wp_register_script( 'ohio-elementor-compare-widget', plugin_dir_url( __FILE__ ) . 'handler.js', [ 'jquery', 'elementor-frontend' ], '1.0.0', true );

        wp_enqueue_script( 'jquery-event-move', get_template_directory_uri() . '/assets/js/libs/jquery.event.move.min.js', [ 'jquery' ], '1.0.0', true);
        wp_enqueue_script( 'jquery-twentytwenty', get_template_directory_uri() . '/assets/js/libs/jquery.twentytwenty.min.js',[ 'jquery', 'jquery-event-move' ], '1.0.0', true);
    }

    public function get_name()
    {
        return 'ohio_compare';
    }

    public function get_title()
    {
        return __( 'Compare', 'ohio-extra' );
    }

    public function get_icon()
    {
        return 'ohio-icon-sc-compare';
    }

    public function get_categories()
    {
        return [ 100 ];
    }

    public function get_script_depends() {
        return [ 'ohio-elementor-compare-widget' ];
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
            'first_image',
            [
                'label' => __( 'First image', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'description' => __( 'Choose first image.', 'ohio-extra' ),
            ]
        );

        $this->add_control(
            'second_image',
            [
                'label' => __( 'Second image', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'description' => __( 'Choose second image for comparing.', 'ohio-extra' ),
            ]
        );

        $this->add_control(
            'orientation',
            [
                'label' => __( 'Orientation', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'horizontal' => __( 'Horizontal', 'ohio-extra' ),
                    'vertical' => __( 'Vertical', 'ohio-extra' ),
                ],
                'default' => 'horizontal',
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'use_label',
            [
                'label' => __( 'Show labeled overlay?', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'before_label',
            [
                'label' => __( '"Before" label', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'description' => __( 'First image label', 'ohio-extra' ),
                'condition' => [
                    'use_label' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'after_label',
            [
                'label' => __( '"After" label', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'description' => __( 'Second image label', 'ohio-extra' ),
                'condition' => [
                    'use_label' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'divider_position',
            [
                'label' => __( 'Divider line position in percents %', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ '%' ],
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 50,
                ],
                'label_block' => true,
                'description' => __( 'Handler line position percent', 'ohio-extra' ),
            ]
        );

        $this->end_controls_section();


        //Styles
        $this->start_controls_section(
            'text_section',
            [
                'label' => __( 'Divider', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'handler_color',
            [
                'label' => __( 'Handler line color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .twentytwenty-handle:after, {{WRAPPER}} .twentytwenty-handle:before' => 'background-color: {{VALUE}}; box-shadow:0 2px 0 {{VALUE}}, 0px 0px 12px rgba(51, 51, 51, 0.5);'
                ]
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        $position = isset( $settings['divider_position'] ) ? round( intval( $settings['divider_position']['size'] ) / 100, 2 ) : '0.5';

        include( plugin_dir_path( __FILE__ ) . 'compare-view.php' );
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Ohio_Elementor_Compare_Widget() );
