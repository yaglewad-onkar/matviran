<?php
class Ohio_Elementor_Vertical_Slider_Widget extends Ohio_Elementor_Widget_Base {

    public function __construct( $data = [], $args = null ) {
        parent::__construct( $data, $args );

        wp_register_script( 'ohio-slider', get_template_directory_uri() . '/assets/js/libs/jquery.clb-slider.js', [ 'jquery' ], false, true );
        wp_register_script( 'ohio-elementor-vertical-slider-widget', plugin_dir_url( __FILE__ ) . 'handler.js', [ 'jquery', 'elementor-frontend' ], '1.0.0', true );
    }

    public function get_script_depends() {
        return [ 'ohio-slider', 'ohio-elementor-vertical-slider-widget' ];
    }

    public function get_name()
    {
        return 'ohio_vertical_slider';
    }

    public function get_title()
    {
        return __( 'Vertical Slider', 'ohio-extra' );
    }

    public function get_icon()
    {
        return 'ohio-icon-sc-vertical-slider';
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
                'label' => __( 'Slider Options', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'scroll_direction',
            [
                'label' => __( 'Scroll animation direction', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'horizontal',
                'options' => [
                    'horizontal' => 'Horizontal',
                    'vertical' => 'Vertical',
                ],
            ]
        );

        $this->add_control(
            'mousewheel_scroll',
            [
                'label' => __( 'Mousewheel scroll', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
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
            'fullscreen',
            [
                'label' => __( 'Fullscreen', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
            ]
        );

        $this->add_control(
            'navigation_buttons',
            [
                'label' => __( 'Navigation buttons', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'pagination_show',
            [
                'label' => __( 'Show pagination', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => 'yes'
            ]
        );

        $this->add_control(
            'pagination_alignment',
            [
                'label' => __( 'Pagination type', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'bullets',
                'options' => [
                    'bullets' => 'Bullets',
                    'numbers' => 'Numbers',
                ],
                'condition' => [
                    'pagination_show' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'colors_section',
            [
                'label' => __( 'Navigation colors', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'nav_bg_color',
            [
                'label' => __( 'Navigation buttons background', 'ohio-extra' ),
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
                    '{{WRAPPER}} .clb-slider-nav-btn .btn-round' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .clb-slider-dot' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'pagination_show' => 'yes',
                    'pagination_alignment' => 'bullets'
                ],
            ]
        );

        $this->add_control(
            'pagination_color_global',
            [
                'label' => __( 'Pagination color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .clb-slider-count' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .clb-slider-pagination .clb-slider-page' => 'color: {{VALUE}}'
                ],
                'condition' => [
                    'pagination_show' => 'yes',
                    'pagination_alignment' => 'numbers'
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function getTabsControls()
    {
        $repeater = new \Elementor\Repeater();

        $repeater->start_controls_tabs( 'tab_items_data', [] );

        $repeater->start_controls_tab(
            'tab_item_content',
            [
                'label' => __( 'Content', 'ohio-extra' ),
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

        $repeater->end_controls_tab();

        $repeater->start_controls_tab(
            'tab_item_style',
            [
                'label' => __( 'Styles', 'ohio-extra' ),
            ]
        );

        $repeater->add_control(
            'background_image',
            [
                'label' => __( 'Background', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'background_size',
            [
                'label' => __( 'Background size', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'cover',
                'options' => [
                    'cover' => 'Cover',
                    'contain' => 'Contain',
                    'no-repeat' => 'No repeat',
                    'repeat' => 'Repeat',
                ],
                'separator' => 'after'
            ]
        );

        $repeater->add_control(
            'header_logo_type',
            [
                'label' => __( 'Header logo', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'none',
                'options' => [
                    'none' => 'None',
                    'dark' => 'Dark variant',
                    'light' => 'Light variant',
                ],
            ]
        );

        $repeater->add_control(
            'side_paddings',
            [
                'label' => __( 'Side paddings size', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::TEXT,
                'description' => __( 'You can change side paddings for each column. Use CSS-units value. Default is 15%.', 'ohio-extra' )
            ]
        );

        $repeater->add_control(
            'header_menu_color',
            [
                'label' => __( 'Header menu color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'separator' => 'before'
            ]
        );

        $repeater->add_control(
            'pagination_color',
            [
                'label' => __( 'Pagination color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR
            ]
        );

        $repeater->add_control(
            'social_networks_color',
            [
                'label' => __( 'Social networks color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR
            ]
        );

        $repeater->add_control(
            'search_color',
            [
                'label' => __( 'Search color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR
            ]
        );

        $repeater->add_control(
            'scrolltotop_color',
            [
                'label' => __( 'Scroll to top color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR
            ]
        );

        $repeater->add_control(
            'slider_color',
            [
                'label' => __( 'Slide background color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR
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

        if ( !empty( $settings['fullscreen'] ) ) {
            $this->addWrapperClass( 'full-vh' );
        }

/*
        $navigation_css = '';
        $navigation_active_css = '';
        if ( $elements_color ) {
            $navigation_css = 'color:' . $elements_color . ';';
            $navigation_active_css = 'background:transparent;';
            $navigation_active_css .= 'border-color:' . $elements_color . ';';
        }
*/

        // Get data
        $onepage_json = $this->getSliderJson();

        include( plugin_dir_path( __FILE__ ) . 'vertical-slider-view.php' );
    }

    public function getSliderJson()
    {
        $settings = $this->get_settings_for_display();

        $obj = [
            'loop' => (bool) $settings['loop'],
            'navBtn' => (bool) $settings['navigation_buttons'],
            'autoplay' => (bool) $settings['autoplay'],
            'mousewheel' => (bool) $settings['mousewheel_scroll'],
            'scrollToSlider' => (bool) $settings['mousewheel_scroll'],
            'verticalScroll' => ( $settings['scroll_direction'] == 'vertical' ),
        ];

        if ( !empty( $settings['autoplay'] ) ) {
            $obj['autoplayTimeout'] = $settings['autoplay_time'];
        }
        if ( !empty( $settings['drag_scroll'] ) ) {
            $obj['drag'] = true;
        }
        if ( !empty( $settings['pagination_show'] ) ) {
            if ( $settings['pagination_alignment'] == 'bullets' ) {
                $obj['dots'] = true;
            } elseif ($settings['pagination_alignment'] == 'numbers') {
                $obj['pagination'] = true;
            }
        }

        return json_encode( (object)$obj );
    }

    public function getTabItemAttrs( $item )
    {
        $attrs = [];

        if ( !empty( $item['custom_class'] ) ) {
            $attrs['class'] = $item['custom_class'];
        }
        if ( !empty( $item['pagination_color'] ) ) {
            $attrs['data-pagination-color'] = esc_attr( $item['pagination_color'] );
        }
        if ( !empty( $item['header_menu_color'] ) ) {
            $attrs['data-header-nav-color'] = esc_attr( $item['header_menu_color'] );
        }
        if ( !empty( $item['social_networks_color'] ) ) {
            $attrs['data-social-networks-color'] = esc_attr( $item['social_networks_color'] );
        }
        if ( !empty( $item['search_color'] ) ) {
            $attrs['data-search-color'] = esc_attr( $item['search_color'] );
        }
        if ( !empty( $item['scrolltotop_color'] ) ) {
           $attrs['data-scroll-to-top-color'] = esc_attr( $item['scrolltotop_color'] );
        }
        if ( !empty( $item['header_logo_type'] ) && $item['header_logo_type'] != 'none' ) {
            $attrs['data-header-logo-type'] = esc_attr( $item['header_logo_type'] );
        }

        // Styles
        $attrs['style'] = '';

        if ( !empty( $item['slider_color'] ) ) {
            $attrs['style'] .= 'background-color:' . $item['slider_color'] . ';';
        }

        if ( !empty( $item['background_image']['url'] ) ) {
            $attrs['style'] .= 'background-image:url(\'' . $item['background_image']['url'] . '\');';

            if ( !empty( $item['background_size'] ) ) {
                switch ( $item['background_size'] ) {
                    case 'contain':
                        $attrs['style'] .= 'background-size:contain;';
                        break;
                    case 'no-repeat':
                        $attrs['style'] .= 'background-repeat:no-repeat;';
                        break;
                    case 'repeat':
                        $attrs['style'] .= 'background-repeat:repeat;';
                        break;
                    case 'cover':
                    default:
                        $attrs['style'] .= 'background-size:cover;';
                        break;
                }
            }
        }

        if ( !empty( $item['side_paddings'] ) ) {
            $attrs['style'] .= 'padding:0 ' . $item['side_paddings'] . ';';
        }

        return $attrs;
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Ohio_Elementor_Vertical_Slider_Widget() );
