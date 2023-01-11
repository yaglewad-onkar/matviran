<?php
class Ohio_Elementor_Dynamic_Text_Widget extends Ohio_Elementor_Widget_Base {

    public function __construct( $data = [], $args = null ) {
        parent::__construct( $data, $args );

        wp_enqueue_script( 'typed', get_template_directory_uri() . '/assets/js/libs/typed.min.js', [ 'jquery' ], '1.0.0', true );
        wp_register_script( 'ohio-elementor-dynamic-text-widget', plugin_dir_url( __FILE__ ) . 'handler.js', [ 'jquery', 'elementor-frontend', 'typed' ], '1.0.0', true );
    }

    public function get_name()
    {
        return 'ohio_dynamic_text';
    }

    public function get_title()
    {
        return __( 'Dynamic Text', 'ohio-extra' );
    }

    public function get_icon()
    {
        return 'ohio-icon-sc-dynamic-text';
    }

    public function get_categories()
    {
        return [ 100 ];
    }

    public function get_script_depends() {
        return [ 'ohio-elementor-dynamic-text-widget' ];
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
            'text_alignment',
            [
                'label' => __( 'Text alignment', 'ohio-extra' ),
                'type' => 'ohio-image-choose',
                'options' => [
                    'left' => [
                        'title' => __( 'Default', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/dynamic_text/images/wpb_params_035.svg',
                    ],
                    'center' => [
                        'title' => __( 'With Preview', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/dynamic_text/images/wpb_params_036.svg',
                    ],
                    'right' => [
                        'title' => __( 'With Preview', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/dynamic_text/images/wpb_params_037.svg',
                    ],
                ],
                'default' => 'left',
            ]
        );

        $this->add_control(
            'type_speed',
            [
                'label' => __( 'Type speed', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'normal',
                'options' => [
                    'slow' => 'Slow',
                    'normal' => 'Normal',
                    'fast' => 'Fast',
                    'very_fast' => 'Very fast',
                ],
            ]
        );

        $this->add_control(
            'loop',
            [
                'label' => __( 'Loop', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'before_text',
            [
                'label' => __( 'Text before', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'dynamic_text',
            [
                'label' => __( 'Dynamic text', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $this->getDynamicTextList(),
                'default' => [],
                'title_field' => '{{list_text}}',
                'prevent_empty' => false,
            ]
        );

        $this->add_control(
            'after_text',
            [
                'label' => __( 'Text after', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );    

        $this->end_controls_section();


        //Styles
        $this->start_controls_section(
            'text_section',
            [
                'label' => __( 'Text', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'static_text_color',
            [
                'label' => __( 'Text', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'static_text_typography',
                'label' => __( 'Text typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}}',
            ]
        );

        $this->add_control(
            'dynamic_text_color',
            [
                'label' => __( 'Dynamic text', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dynamic' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .typed-cursor' => 'color: {{VALUE}}'
                ],
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'dynamic_text_typography',
                'label' => __( 'Dynamic text typography', 'ohio-extra' ),
                'selectors' => [
                    '{{WRAPPER}} .dynamic',
                    '{{WRAPPER}} .typed-cursor'
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function getDynamicTextList()
    {
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'list_text', [
                'label' => __( 'Text variant', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '',
                'label_block' => true,
            ]
        );
        
        return $repeater->get_controls();
    }


    protected function render() {
        $settings = $this->get_settings_for_display();

        switch ( $settings['text_alignment'] ) {
            case 'left':
                $this->addWrapperClass( 'text-left' ); break;
            case 'center':
                $this->addWrapperClass( 'text-center' ); break;
            case 'right':
                $this->addWrapperClass( 'text-right' ); break;
        }

        switch ( $settings['type_speed'] ) {
            case 'slow':
                $type_speed = [ 'type' => 140, 'delay' => 5000, 'back' => 35 ]; break;
            case 'normal':
                $type_speed = [ 'type' => 70, 'delay' => 2500, 'back' => 25 ]; break;
            case 'fast':
                $type_speed = [ 'type' => 40, 'delay' => 2400, 'back' => 20 ]; break;
            case 'very_fast':
            default:
                $type_speed = [ 'type' => 20, 'delay' => 1600, 'back' => 15 ]; break;
        }

        $dynamic_title = [];
        foreach ($settings['dynamic_text'] as $value) {
            $dynamic_title[] = $value['list_text'];
        }

        $options = (object) array();
        $options->strings =   $dynamic_title;
        $options->loop =      $settings['loop'];
        $options->typeSpeed = $type_speed['type'];
        $options->backDelay = $type_speed['delay'];
        $options->backSpeed = $type_speed['back'];

        $options_json = json_encode( $options );

        $unique_id = uniqid('sc-dynamic-text-');

        include( plugin_dir_path( __FILE__ ) . 'dynamic-text-view.php' );
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Ohio_Elementor_Dynamic_Text_Widget() );
