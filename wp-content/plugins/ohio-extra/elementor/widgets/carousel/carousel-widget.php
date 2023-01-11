<?php
class Ohio_Elementor_Carousel_Widget extends Ohio_Elementor_Widget_Base {

    public function __construct( $data = [], $args = null ) {
        parent::__construct( $data, $args );

        wp_register_script( 'ohio-slider', get_template_directory_uri() . '/assets/js/libs/jquery.clb-slider.js', [ 'jquery' ], false, true );
        wp_register_script( 'ohio-elementor-carousel-widget', plugin_dir_url( __FILE__ ) . 'handler.js', [ 'jquery', 'elementor-frontend' ], '1.0.0', true );
    }

    public function get_script_depends() {
        return [ 'ohio-slider', 'ohio-elementor-carousel-widget' ];
    }

    public function get_name()
    {
        return 'ohio_carousel';
    }

    public function get_title()
    {
        return __( 'Carousel', 'ohio-extra' );
    }

    public function get_icon()
    {
        return 'ohio-icon-sc-carousel';
    }

    public function get_categories()
    {
        return [ 100 ];
    }

    protected function _register_controls()
    {
        $this->start_controls_section(
            'general_section',
            [
                'label' => __( 'Tabs', 'ohio-extra' ),
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
                'prevent_empty' => false,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'options_section',
            [
                'label' => __( 'Carousel Options', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'drag_scroll',
            [
                'label' => __( 'Mouse drag scroll', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $this->add_control(
            'offset_items',
            [
                'label' => __( 'Offset items', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $this->add_control(
            'offset_size',
            [
                'label' => __( 'Offset size', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'description' => 'Use "px" or "%".',
                'condition' => [
                    'offset_items' => 'yes',
                ],
                'selectors' => [
                    '{{WRAPPER}} .clb-slider-outer-stage' => 'margin:0 -{{VALUE}}; overflow:visible',
                    '{{WRAPPER}} .clb-slider-outer-stage > .clb-slider-stage' => 'left:{{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'gap_items',
            [
                'label' => __( 'Gap items', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $this->add_control(
            'gap_size',
            [
                'label' => __( 'Gap size', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( '40', 'ohio-extra' ),
                'label_block' => true,
                'description' => 'Gap size in px',
                'condition' => [
                    'gap_items' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'loop',
            [
                'label' => __( 'Loop mode', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        
        $this->add_control(
            'autoheight',
            [
                'label' => __( 'Autoheight mode', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'preloader',
            [
                'label' => __( 'Preloader', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $this->add_control(
            'autoplay',
            [
                'label' => __( 'Autoplay mode', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'autoplay_time',
            [
                'label' => __( 'Autoplay interval timeout in seconds', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( '5', 'ohio-extra' ),
                'label_block' => true,
                'description' => 'Autoplay interval timeout in seconds.',
                'condition' => [
                    'autoplay' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'stop_on_hover',
            [
                'label' => __( 'Stop on hover', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
                'description' => 'Stop autoplay on mouse hover.',
                'condition' => [
                    'autoplay' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'items_visible_options',
            [
                'label' => __( 'Visible items', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        
        $this->add_control(
            'items_visible_desktop',
            [
                'label' => __( 'Desktop devices', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '5',
                'options' => [
                    '1'  => __( '1 item', 'ohio-extra' ),
                    '2'  => __( '2 items', 'ohio-extra' ),
                    '3'  => __( '3 items', 'ohio-extra' ),
                    '4'  => __( '4 items', 'ohio-extra' ),
                    '5'  => __( '5 items', 'ohio-extra' ),
                    '6'  => __( '6 items', 'ohio-extra' ),
                ],
            ]
        );

        $this->add_control(
            'items_visible_tablet',
            [
                'label' => __( 'Tablet devices', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '3',
                'options' => [
                    '1'  => __( '1 item', 'ohio-extra' ),
                    '2'  => __( '2 items', 'ohio-extra' ),
                    '3'  => __( '3 items', 'ohio-extra' ),
                    '4'  => __( '4 items', 'ohio-extra' ),
                    '5'  => __( '5 items', 'ohio-extra' ),
                    '6'  => __( '6 items', 'ohio-extra' ),
                ],
            ]
        );

        $this->add_control(
            'items_visible_mobile',
            [
                'label' => __( 'Mobile devices', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1'  => __( '1 item', 'ohio-extra' ),
                    '2'  => __( '2 items', 'ohio-extra' ),
                    '3'  => __( '3 items', 'ohio-extra' ),
                    '4'  => __( '4 items', 'ohio-extra' ),
                    '5'  => __( '5 items', 'ohio-extra' ),
                    '6'  => __( '6 items', 'ohio-extra' ),
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'pagintaion_section',
            [
                'label' => __( 'Pagination', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'pagination_show',
            [
                'label' => __( 'Bullets', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'description' => 'Show bullets navigation.'
            ]
        );

        $this->add_control(
            'pagination_alignment',
            [
                'label' => __( 'Bullets position', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'dots',
                'options' => [
                    'dots' => 'Dots',
                    'pagination' => 'Pagination',
                    'both' => 'Both',
                ],
                'condition' => [
                    'pagination_show' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'navigation_buttons',
            [
                'label' => __( 'Buttons', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'description' => 'Show navigation buttons.',
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'position_nav_buttons',
            [
                'label' => __( 'Buttons position', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'default',
                'options' => [
                    'default' => 'Default',
                    'offset' => 'Offset',
                    'inset' => 'Inset',
                ],
                'condition' => [
                    'navigation_buttons' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();

        //Styles
        $this->start_controls_section(
            'styles_section',
            [
                'label' => __( 'Style & Colors', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'nav_bg_color',
            [
                'label' => __( 'Navigation buttons background color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .clb-slider-nav-btn .ion' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'navigation_buttons' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'nav_color',
            [
                'label' => __( 'Navigation buttons color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .clb-slider-nav-btn .ion' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'navigation_buttons' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'dots_color',
            [
                'label' => __( 'Dots color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .clb-slider-nav-dots > .clb-slider-dot.active svg circle' => 'stroke: {{VALUE}} !important',
                    '{{WRAPPER}} .clb-slider-dot:before' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'pagination_show' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'pagination_color',
            [
                'label' => __( 'Pagination color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .clb-slider-count' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .clb-slider-pagination .clb-slider-page' => 'color: {{VALUE}}'
                ],
                'condition' => [
                    'pagination_show' => 'yes',
                ],
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

        $repeater->end_controls_tab();

        $repeater->end_controls_tabs();

        return $repeater->get_controls();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        if ( !empty( $settings['offset_items'] ) ) {
            $this->addWrapperClass( 'slider-offset' );
        }

        if ( empty( $settings['navigation_buttons'] ) ) {
            $this->addWrapperClass( 'without-nav' );
        } else {
            $this->addWrapperClass( 'full' );

            if ( $settings['position_nav_buttons'] == 'offset' ) {
                $this->addWrapperClass( 'nav-offset' );
            }
            if ( $settings['position_nav_buttons'] == 'inset' ) {
                $this->addWrapperClass( 'nav-inset' );
            }
        }

        if ( !empty( $settings['preloader'] ) ) {
            $this->addWrapperClass( 'with-preloader' );
        }

        // Get data
        $slider_json = $this->getSliderJson();

        include( plugin_dir_path( __FILE__ ) . 'carousel-view.php' );
    }

    public function getSliderJson()
    {
        $settings = $this->get_settings_for_display();

        $obj = [
            'loop' => (bool) $settings['loop'],
            'navBtn' => (bool) $settings['navigation_buttons'],
            'autoplay' => (bool) $settings['autoplay'],
            'autoplayHoverPause' => (bool) $settings['stop_on_hover'],
            'autoHeight' => (bool) $settings['autoheight'],
            'itemsDesktop' => $settings['items_visible_desktop'],
            'itemsTablet' => $settings['items_visible_tablet'],
            'itemsMobile' => $settings['items_visible_mobile'],
        ];

        if ( !empty( $settings['drag_scroll'] ) ) {
            $obj['drag'] = true;
        }
        if ( !empty( $settings['gap_items'] ) ) {
            $obj['gap'] = $settings['gap_size'];
        }
        if ( !empty( $settings['navigation_buttons'] ) ) {
            $obj['navContainerClass'] = 'slider-nav';
        }
        if ( !empty( $settings['autoplay'] ) ) {
            $obj['autoplayTimeout'] = $settings['autoplay_time'];
        }
        if ( !empty( $settings['pagination_show'] ) ) {
            if ( $settings['pagination_alignment'] == 'dots' ) {
                $obj['dots'] = true;
            } elseif ($settings['pagination_alignment'] == 'pagination') {
                $obj['slidesCount'] = true;
                $this->addWrapperClass('with-pagination');
            } else { // both
                $obj['pagination'] = true;
                $obj['dots'] = true;
            }
        }

        return json_encode( (object)$obj );
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Ohio_Elementor_Carousel_Widget() );
