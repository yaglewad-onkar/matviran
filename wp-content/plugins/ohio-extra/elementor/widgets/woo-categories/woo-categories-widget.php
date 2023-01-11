<?php
class Ohio_Elementor_Woo_Categories_Widget extends Ohio_Elementor_Widget_Base {

    public function get_name()
    {
        return 'ohio_woo_categories';
    }

    public function get_title()
    {
        return __( 'Woo Categories', 'ohio-extra' );
    }

    public function get_icon()
    {
        return 'ohio-icon-sc-woo-categories';
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
            'category_layout',
            [
                'label' => __( 'Layout', 'ohio-extra' ),
                'type' => 'ohio-image-choose',
                'options' => [
                    'default' => [
                        'title' => __( 'Offset', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/woo_categories/images/wpb_params_086.svg',
                    ],
                    'boxed' => [
                        'title' => __( 'Boxed', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/woo_categories/images/wpb_params_088.svg',
                    ]
                ],
                'default' => 'default',
            ]
        );

        $this->add_control(
            'alignment',
            [
                'label' => __( 'Alignment', 'ohio-extra' ),
                'type' => 'ohio-image-choose',
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/woo_categories/images/wpb_params_035.svg',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/woo_categories/images/wpb_params_036.svg',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/woo_categories/images/wpb_params_037.svg',
                    ],

                ],
                'default' => 'left',
            ]
        );

        $this->add_control(
            'subtitle_position',
            [
                'label' => __( 'Description', 'ohio-extra' ),
                'type' => 'ohio-image-choose',
                'options' => [
                    'top' => [
                        'title' => __( 'Top', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/woo_categories/images/wpb_params_035.svg',
                    ],
                    'bottom' => [
                        'title' => __( 'Bottom', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/woo_categories/images/wpb_params_038.svg',
                    ],
                ],
                'default' => 'top',
            ]
        );

        $this->add_control(
            'layout_columns',
            [
                'label' => __( 'Columns number', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '6',
                'options' => [
                    '12' => '1 column',
                    '6' => '2 columns',
                    '4' => '3 columns',
                    '3' => '4 columns',
                ],
            ]
        );

        $param_options = [];
        $woo_categories = get_terms( [ 'taxonomy' => 'product_cat', 'hide_empty' => false ] );

        foreach ($woo_categories as $key => $category) {
            if ( isset( $category->slug ) && isset( $category->name ) ) {
                $param_options[$category->slug] = $category->name;
            }
        }

        $this->add_control(
            'woo_categories',
            [
                'label' => __( 'Categories', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => $param_options,
                'default' => [],
                'description' => 'Leave empty for "All categories"',
                'label_block' => true,
                'separator' => 'before'
            ]
        );

        $this->end_controls_section();

        //Styles
        $this->start_controls_section(
            'text_section',
            [
                'label' => __( 'General', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __( 'Title color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-category__info-wrapper h3 a' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __( 'Title typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .product-category__info-wrapper h3 a',
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => __( 'Description color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-category__description' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'label' => __( 'Description typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .product-category__description',
            ]
        );

        $this->add_control(
            'bg_color',
            [
                'label' => __( 'Background color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-category--boxed' => 'background-color: {{VALUE}}'
                ],
                'condition' => [
                    'category_layout' => 'boxed'
                ]
            ]
        );

        $this->end_controls_section();

        $this->addButtonStyleSection( false );
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        // Wrapper classes
        if ( $settings['category_layout'] == 'boxed' ) {
            $layout_class = 'style-2 product-category--boxed';
        } else {
            $layout_class = 'style-1 product-category--default';
        }

        $alignment_class = 'text-' . $settings['alignment'];

        // Data
        $categories_data = $this->getCategoriesData( $settings['woo_categories'] );

        include( plugin_dir_path( __FILE__ ) . 'woo-categories-view.php' );
    }

    protected function getCategoriesData($categories)
    {
        $results = [];

        $terms = [];
        if ( !empty( $categories ) ) {
            foreach ( $categories as $category_slug ) {
                $terms[] = get_term_by( 'slug', $category_slug, 'product_cat' );
            }
        } else {
            $terms = get_terms( [
                'taxonomy' => 'product_cat',
                'hide_empty' => false,
            ] );
        }

        foreach ( $terms as $term ) {
            $cat = (object)[
                'title' => '',
                'description' => '',
                'url' => '',
                'image' => ''
            ];

            if ( $term ) {
                $cat->title = isset( $term->name ) ? $term->name : '';
                $cat->description = isset( $term->description ) ? $term->description : '';
                $cat->url = get_term_link( $term->term_id, 'product_cat' );

                $thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true );
                if ( $thumbnail_id ) {
                    $cat->image = wp_get_attachment_image_src( $thumbnail_id, 'large' );
                    if ( is_array( $cat->image ) ) {
                        $cat->image = $cat->image[0];
                    }
                } else {
                    $cat->image = wc_placeholder_img_src();
                }

                if ( $cat->image ) {
                    $cat->image = str_replace( ' ', '%20', $cat->image );
                }
            }

            $results[] = $cat;
        }

        return $results;
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Ohio_Elementor_Woo_Categories_Widget() );
