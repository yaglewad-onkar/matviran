<?php
class Ohio_Elementor_Countdown_Widget extends Ohio_Elementor_Widget_Base {

    public function __construct( $data = [], $args = null ) {
        parent::__construct( $data, $args );

        wp_register_script( 'jquery-countdown', get_template_directory_uri() . '/assets/js/libs/jquery.countdown.min.js', [ 'jquery' ], '1.0.0', true );
        wp_register_script( 'ohio-elementor-countdown-widget', plugin_dir_url( __FILE__ ) . 'handler.js', [ 'jquery', 'elementor-frontend' ], '1.0.0', true );
    }

    public function get_name()
    {
        return 'ohio_countdown';
    }

    public function get_title()
    {
        return __( 'Countdown', 'ohio-extra' );
    }

    public function get_icon()
    {
        return 'ohio-icon-sc-countdown';
    }

    public function get_categories()
    {
        return [ 100 ];
    }

    public function get_script_depends() {
        return [ 'jquery-countdown', 'ohio-elementor-countdown-widget' ];
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
                'label' => __( 'Layout', 'ohio-extra' ),
                'type' => 'ohio-image-choose',
                'options' => [
                    'default' => [
                        'title' => __( 'Default', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/countdown/images/wpb_params_031.svg',
                    ],
                    'boxed' => [
                        'title' => __( 'Boxed', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/countdown/images/wpb_params_032.svg',
                    ]
                ],
                'default' => 'default',
            ]
        );

        $this->add_control(
            'countdown_alignment',
            [
                'label' => __( 'Position', 'ohio-extra' ),
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
                'description' => __( 'You can choose where the countdown is aligned to', 'ohio-extra' ),
                'default' => 'center',
                'toggle' => false,
            ]
        );

        $this->add_control(
            'classic_style',
            [
                'label' => __( 'Use classic style', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
                'condition' => [
                    'block_layout' => 'default',
                ],
            ]
        );

        $this->add_control(
			'countdown_date',
			[
				'label' => __( 'Expiration date', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::DATE_TIME,
                'default' => '2022-01-01 11:00'
			]
		);

        $this->end_controls_section();


        //Styles
        $this->start_controls_section(
            'countdown_section',
            [
                'label' => __( 'Countdown', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

       
        $this->add_control(
            'numbers_color',
            [
                'label' => __( 'Numbers color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .box-count' => 'color: {{VALUE}};'
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'numbers_typography',
                'label' => __( 'Numbers typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .box-count',
            ]
        );

        $this->add_control(
            'labels_color',
            [
                'label' => __( 'Labels color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} h6' => 'color: {{VALUE}};'
                ],
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'labels_typography',
                'label' => __( 'Labels typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} h6',
            ]
        );

        $this->add_control(
            'box_color',
            [
                'label' => __( 'Box color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .box-count' => 'background-color: {{VALUE}};'
                ],
                'condition' => [
                    'block_layout' => 'boxed'
                ],
                'separator' => 'before'
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        // Wrapper classes
        if ( $settings['block_layout'] == 'boxed' ) {
            $this->addWrapperClass( 'countdown-boxed' );
        }

        if ( !empty( $settings['classic_style'] ) ) {
            $this->addWrapperClass( 'countdown-classic' );
        }
        
        switch ( $settings['countdown_alignment'] ) {
            case 'center':
                $this->addWrapperClass( 'text-center' );
                break;
            case 'left':
                $this->addWrapperClass( 'text-left' );
                break;
            case 'right':
                $this->addWrapperClass( 'text-right' );
                break;
        }

        // see: https://github.com/hilios/jQuery.countdown/issues/281
        $countdown_time = date( 'D, d M y H:i:s', strtotime( $settings['countdown_date'] ) );

        $countdown_box_uniqid = uniqid( 'ohio-custom-' );

        include( plugin_dir_path( __FILE__ ) . 'countdown-view.php' );
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Ohio_Elementor_countdown_Widget() );
