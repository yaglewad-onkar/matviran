<?php
class Ohio_Elementor_Gallery_Widget extends Ohio_Elementor_Widget_Base {

    public function __construct($data = [], $args = null) {
        parent::__construct($data, $args);

        wp_enqueue_script( 'masonry' );

        wp_register_script( 'ohio-elementor-gallery-widget', plugin_dir_url( __FILE__ ) . 'handler.js', [ 'jquery', 'elementor-frontend' ], '1.0.0', true );
    }

    public function get_script_depends() {
        return [ 'masonry', 'ohio-elementor-gallery-widget' ];
    }

    public function get_name()
    {
        return 'ohio_gallery';
    }

    public function get_title()
    {
        return __( 'Gallery', 'ohio-extra' );
    }

    public function get_icon()
    {
        return 'ohio-icon-sc-gallery';
    }

    public function get_categories()
    {
        return [ 100 ];
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
            'gallery_layout',
            [
                'label' => __( 'Gallery layout', 'ohio-extra' ),
                'type' => 'ohio-image-choose',
                'options' => [
                    'classic' => [
                        'title' => __( 'Classic', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/gallery/images/wpb_params_114.svg',
                    ],
                    'minimal' => [
                        'title' => __( 'Minimal', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/gallery/images/wpb_params_113.svg',
                    ]
                ],
                'default' => 'classic',
            ]
        );

        $this->add_control(
            'images',
            [
                'label' => __( 'Preview image', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::GALLERY,
                'default' => [],
            ]
        );

        $this->add_control(
            'hide_overlay',
            [
                'label' => __( 'Hide overlay?', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $this->add_control(
            'preview_title',
            [
                'label' => __( 'Show title on preview', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'grid_section',
            [
                'label' => __( 'Grid', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Grid
        $this->add_control(
            'masonry_grid',
            [
                'label' => __( 'Masonry grid', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $this->add_control(
            'metro_style',
            [
                'label' => __( 'Metro style', 'ohio-extra' ),
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
                'label' => __( 'Gap between images', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'separator' => 'after',
                'description' => 'CSS value.',
                'default' => '20px',
                'selectors' => [
                    '{{WRAPPER}} .grid-item.masonry-block' => 'padding: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'items_per_row_options',
            [
                'label' => __( 'Images per row', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'desktop_devices',
            [
                'label' => __( 'Desktop devices', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '3',
                'options' => [
                    '1' => __( '1 columns', 'ohio-extra' ),
                    '2' => __( '2 columns', 'ohio-extra' ),
                    '3' => __( '3 columns', 'ohio-extra' ),
                    '4' => __( '4 columns', 'ohio-extra' ),
                    '5' => __( '5 columns', 'ohio-extra' ),
                    '12' => __( '12 columns', 'ohio-extra' )
                ],
            ]
        );

        $this->add_control(
            'tablet_devices',
            [
                'label' => __( 'Tablet devices', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '2',
                'options' => [
                    '1' => __( '1 columns', 'ohio-extra' ),
                    '2' => __( '2 columns', 'ohio-extra' ),
                    '3' => __( '3 columns', 'ohio-extra' ),
                    '4' => __( '4 columns', 'ohio-extra' ),
                    '5' => __( '5 columns', 'ohio-extra' ),
                    '12' => __( '12 columns', 'ohio-extra' )
                ],
            ]
        );

        $this->add_control(
            'mobile_devices',
            [
                'label' => __( 'Mobile devices', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1' => __( '1 columns', 'ohio-extra' ),
                    '2' => __( '2 columns', 'ohio-extra' ),
                    '3' => __( '3 columns', 'ohio-extra' ),
                    '4' => __( '4 columns', 'ohio-extra' ),
                    '5' => __( '5 columns', 'ohio-extra' ),
                    '12' => __( '12 columns', 'ohio-extra' )
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'pagination_section',
            [
                'label' => __( 'Pagination', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Grid
        $this->add_control(
            'use_pagination',
            [
                'label' => __( 'Use pagination', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $this->add_control(
            'pagination_type',
            [
                'label' => __( 'Pagination type', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'simple',
                'options' => [
                    'simple' => 'Simple',
                    'standard' => 'Standard',
                    'lazy_scroll' => 'Lazy load',
                    'lazy_button' => 'Load more',
                ],
                'condition' => [
                    'use_pagination' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'pagination_position',
            [
                'label' => __( 'Pagination position', 'ohio-extra' ),
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
                'default' => 'left',
                'toggle' => false,
                'condition' => [
                    'use_pagination' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'items_per_page',
            [
                'label' => __( 'Number of items per page', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'items' ],
                'range' => [
                    'items' => [
                        'min' => 1,
                        'max' => 25,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'items',
                    'size' => 6,
                ],
                'condition' => [
                    'use_pagination' => 'yes'
                ]
            ]
        );

        $this->end_controls_section();

        //Styles
        $this->start_controls_section(
            'typo_section',
            [
                'label' => __( 'Typography', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __( 'Title color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .clb-gallery-img-details h5.title' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __( 'Title typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .clb-gallery-img-details h5.title',
            ]
        );

        $this->add_control(
            'caption_color',
            [
                'label' => __( 'Caption color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .clb-gallery-lightbox .clb-gallery-img-details .caption' => 'color: {{VALUE}}'
                ],
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'caption_typography',
                'label' => __( 'Caption typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .clb-gallery-lightbox .clb-gallery-img-details .caption',
            ]
        );

        $this->add_control(
            'popup_title_color',
            [
                'label' => __( 'Popup title color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .clb-gallery-lightbox .clb-gallery-img-details .title' => 'color: {{VALUE}}'
                ],
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'popup_title_typography',
                'label' => __( 'Popup title typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .clb-gallery-lightbox .clb-gallery-img-details .title',
            ]
        );

        $this->end_controls_section();

        //Grid
        $this->start_controls_section(
            'grid_styles',
            [
                'label' => __( 'Colors', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'overlay_color',
            [
                'label' => __( 'Cards overlay  color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .grid-item-overlay' => 'background-color: {{VALUE}}'
                ],
                'condition' => [
                    'hide_overlay!' => 'yes'
                ],
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'bg_color',
            [
                'label' => __( 'Popup background', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .clb-popup' => 'background-color: {{VALUE}}'
                ],
            ]
        );

        $this->add_control(
            'btn_color',
            [
                'label' => __( 'Buttons color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .clb-popup .expand .ion' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .clb-close .ion' => 'background-color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => __( 'Icon color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-round .ion' => 'color: {{VALUE}}'
                ],
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'slider_nav_bg_color',
            [
                'label' => __( 'Slider navigation buttons background', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .clb-slider-nav-btn .ion' => 'background-color: {{VALUE}}'
                ],
            ]
        );

        $this->add_control(
            'slider_nav_color',
            [
                'label' => __( 'Slider navigation buttons color', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .clb-slider-nav-btn .ion .arrow-icon' => 'stroke: {{VALUE}}'
                ],
            ]
        );

        $this->add_control(
            'pagination_color',
            [
                'label' => __( 'Pagination  color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pagination a, {{WRAPPER}} .lazy-load' => 'color: {{VALUE}}'
                ],
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'pagination_active_color',
            [
                'label' => __( 'Pagination hover and active', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pagination a:hover, {{WRAPPER}} .pagination a.active' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .lazy-load:hover' => 'color: {{VALUE}}'
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        // Classes
        $overlay_class = [];
        if ( $settings['hide_overlay'] ) {
            $overlay_class[] = 'hidden';
        } else if ( $settings['preview_title'] ) {
            $overlay_class[] = 'with-title';
        }

        $columns_in_row = $settings['desktop_devices'] . '-' . $settings['tablet_devices'] . '-' . $settings['mobile_devices'];
        $column_class = [];

        $column_class[] = NorExtraParser::VC_columns_to_CSS( $columns_in_row );
        if ( $settings['metro_style'] ) {
            $column_class[] = 'metro-style';
        }
        if ( $settings['gallery_layout'] == 'classic' ) {
            $column_class[] = 'clasic-grid';
        } else {
            $column_class[] = 'minimal-grid';
        }

        // Pagination
        $pagination_page = OhioHelper::get_current_pagenum();
        $items_per_page = ( !empty( $settings['items_per_page'] ) ) ? $settings['items_per_page']['size'] : 6;
        $pages_count = ceil( count( $settings['images'] ) / $items_per_page );

        // Data
        $gallery_json = json_encode( (object)[] );
        $gallery_uniqid = uniqid( 'ohio-gallery-' );

        include( plugin_dir_path( __FILE__ ) . 'gallery-view.php' );
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Ohio_Elementor_Gallery_Widget() );
