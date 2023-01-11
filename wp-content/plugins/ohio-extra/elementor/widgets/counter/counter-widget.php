<?php
class Ohio_Elementor_Counter_Widget extends Ohio_Elementor_Widget_Base {

    public function __construct( $data = [], $args = null ) {
        parent::__construct( $data, $args );

        wp_register_script( 'ohio-elementor-counter-widget', plugin_dir_url( __FILE__ ) . 'handler.js', [ 'jquery', 'elementor-frontend' ], '1.0.0', true );
    }

    public function get_name()
    {
        return 'ohio_counter';
    }

    public function get_title()
    {
        return __( 'Counter', 'ohio-extra' );
    }

    public function get_icon()
    {
        return 'ohio-icon-sc-counter';
    }

    public function get_categories()
    {
        return [ 100 ];
    }

    public function get_script_depends() {
        return [ 'ohio-elementor-counter-widget' ];
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
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/counter/images/wpb_params_034.svg',
                    ],
                    'with_icon' => [
                        'title' => __( 'With Icon', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/counter/images/wpb_params_033.svg',
                    ],
                ],
                'default' => 'default',
            ]
        );

        $this->add_control(
            'counter_position',
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
                'default' => 'center',
                'toggle' => false,
            ]
        );

        $this->add_control(
            'count_number',
            [
                'label' => __( 'Number', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '100',
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 2,
                'default' =>__( 'Some Items', 'ohio-extra' ),
                'placeholder' => __( 'Enter block title.', 'ohio-extra' ),
            ]
        );

        $this->add_control(
            'plus_symbol',
            [
                'label' => __( 'Add "+" symbol after numbers', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'icon_section',
            [
                'label' => __( 'Icon', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'block_type_layout' => 'with_icon',
                ],
            ]
        );

        $this->add_control(
            'icon_position',
            [
                'label' => __( 'Icon position', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'left' => __( 'Left', 'ohio-extra' ),
                    'top' => __( 'Top', 'ohio-extra' ),
                    'right' => __( 'Right', 'ohio-extra' ),
                ],
                'default' => 'top',
                'condition' => [
                    'block_type_layout' => 'with_icon',
                ],
            ]
        );

        $this->add_control(
            'icon_type',
            [
                'label' => __( 'Icon type', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'icon' => __( 'Icon', 'ohio-extra' ),
                    'image' => __( 'Custom image', 'ohio-extra' ),
                ],
                'default' => 'icon',
                'condition' => [
                    'block_type_layout' => 'with_icon',
                ],
            ]
        );

        $this->add_control(
            'icon_image',
            [
                'label' => __( 'Custom icon image', 'ohio-extra' ),
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
            'counter_section',
            [
                'label' => __( 'Counter', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => __( 'Icon color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'icon_type' => 'icon',
                    'block_type_layout' => 'with_icon',
                ],
                'separator' => 'after'
            ]
        );

        $this->add_control(
            'number_color',
            [
                'label' => __( 'Number color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'number_typography',
                'label' => __( 'Number typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .count',
            ]
        );

        $this->add_control(
            'plus_color',
            [
                'label' => __( 'Plus symbol color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'plus_typography',
                'label' => __( 'Plus symbol typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .plus-symbol',
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __( 'Title color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __( 'Title typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .counter-box-headline',
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        // Wrapper classes
        switch ( $settings['counter_position'] ) {
            case 'left':
                $this->addWrapperClass( 'text-left' );
                break;
            case 'right':
                $this->addWrapperClass( 'text-right' );
                break;
            default:
                $this->addWrapperClass( 'text-center' );
        }

        // Collect styles
        $this->addInlineStyle( 'heading', 'title_color', 'color: {{VALUE}}' );
        $this->addInlineStyle( 'icon', 'icon_color', 'color: {{VALUE}}' );
        $this->addInlineStyle( 'number', 'number_color', 'color: {{VALUE}}' );
        $this->addInlineStyle( 'plus', 'plus_color', 'color: {{VALUE}}' );

        $icon_prefix = ($settings['icon_type'] == 'icon') ? 'counter-box-icon ' : '';

        include( plugin_dir_path( __FILE__ ) . 'counter-view.php' );
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Ohio_Elementor_Counter_Widget() );
