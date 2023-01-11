<?php
class Ohio_Elementor_Recent_Projects_Widget extends Ohio_Elementor_Widget_Base {

    public function __construct($data = [], $args = null) {
        parent::__construct($data, $args);

        wp_enqueue_script( 'masonry' );
        wp_enqueue_script( 'isotope', get_template_directory_uri() . '/assets/js/libs/isotope.pkgd.min.js', [ 'jquery' ], false, true );
        wp_enqueue_script( 'aos', get_template_directory_uri() . '/assets/js/libs/aos.min.js', [ 'jquery' ], false, true );

        wp_register_script( 'ohio-elementor-recent-projects-widget', plugin_dir_url( __FILE__ ) . 'handler.js', [ 'jquery', 'elementor-frontend' ], '1.0.0', true );
    }

    public function get_script_depends() {
        return [ 'masonry', 'isotope', 'aos', 'ohio-elementor-recent-projects-widget' ];
    }

    public function get_name()
    {
        return 'ohio_recent_projects';
    }

    public function get_title()
    {
        return __( 'Recent Projects', 'ohio-extra' );
    }

    public function get_icon()
    {
        return 'ohio-icon-sc-recent-projects';
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
            'card_layout',
            [
                'label' => __( 'Portfolio layout', 'ohio-extra' ),
                'type' => 'ohio-image-choose',
                'options' => [
                    'grid_1' => [
                        'title' => __( 'Classic Grid', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/recent_projects/images/acf__image_portfolio_01.svg',
                    ],
                    'grid_2' => [
                        'title' => __( 'Minimal Grid', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/recent_projects/images/acf__image_portfolio_02.svg',
                    ],
                    'grid_11' => [
                        'title' => __( 'Caption Cursor Grid', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/recent_projects/images/acf__image_portfolio_43.svg',
                    ],
                    'grid_3' => [
                        'title' => __( 'Slider With Horizontal Scroll', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/recent_projects/images/acf__image_portfolio_03.svg',
                    ],
                    'grid_4' => [
                        'title' => __( 'Slider With Vertical Scroll', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/recent_projects/images/acf__image_portfolio_04.svg',
                    ],
                    'grid_5' => [
                        'title' => __( 'Split Screen With Smooth Scroll', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/recent_projects/images/acf__image_portfolio_05.svg',
                    ],
                    'grid_6' => [
                        'title' => __( 'Carousel With Horizontal Scroll', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/recent_projects/images/acf__image_portfolio_06.svg',
                    ],
                    'grid_7' => [
                        'title' => __( 'Onepage With Smooth Scroll', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/recent_projects/images/acf__image_portfolio_07.svg',
                    ],
                    'grid_8' => [
                        'title' => __( 'Interactive Links', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/recent_projects/images/acf__image_portfolio_42.svg',
                    ],
                    'grid_9' => [
                        'title' => __( 'Scattered With Smooth Scroll', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/recent_projects/images/acf__image_portfolio_37.svg',
                    ],
                    'grid_10' => [
                        'title' => __( 'Centered With Smooth Scroll', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/recent_projects/images/acf__image_portfolio_38.svg',
                    ],
                    'grid_12' => [
                        'title' => __( 'Vertical Interactive Links', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/recent_projects/images/acf__image_portfolio_45.svg',
                    ]
                ],
                'additional_class' => 'ohio-wide-label-block',
                'default' => 'grid_1',
            ]
        );

        // Blog categories
        $param_options = [];
        $portfolio_categories = get_terms( array(
            'taxonomy' => 'ohio_portfolio_category',
            'hide_empty' => false,
        ) );
        foreach ($portfolio_categories as $key => $category) {
            if ( !empty( $category->slug ) && isset( $category->name ) ) {
                $param_options[$category->slug] = $category->name;
            }
        }

        $this->add_control(
            'portfolio_category',
            [
                'label' => __( 'Portfolio categories', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => $param_options,
                'default' => [],
                'placeholder' => 'All categories',
                'description' => 'Leave empty to choose All categories',
                'label_block' => true,
            ]
        );

        $this->end_controls_section();



        $this->start_controls_section(
            'cards_slides_section',
            [
                'label' => __( 'Project Cards / Slides', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Project Cards / Slides

        $this->add_control(
            'card_hover_effect',
            [
                'label' => __( 'Project card hover effect', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'inherit',
                'options' => [
                    'inherit' => 'Inherit from Theme Setting',
                    'type1' => 'Image Scaling',
                    'type2' => 'Color Overlay',
                    'type3' => 'Greyscale',
                    'type4' => 'Image Parallax',
                ],
                'condition' => [
                    'card_layout' => [ 'grid_1', 'grid_2', 'grid_11' ],
                ],
                'label_block' => true
            ]
        );

        $this->add_control(
            'portfolio_images_size',
            [
                'label' => __( 'Thumbnail size', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'inherit',
                'options' => [
                    'inherit' => 'Inherit from Theme Settings',
                    'thumbnail' => 'Thumbnail',
                    'medium' => 'Small',
                    'medium_large' => 'Medium',
                    'large' => 'Large',
                    'ohio_full' => 'Original',
                ],
                'label_block' => true
            ]
        );
        
        $this->add_control(
            'use_metro_style',
            [
                'label' => __( 'Metro style', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
                'condition' => [
                    'card_layout' => [ 'grid_1', 'grid_2', 'grid_11' ],
                ],
            ]
        );

        $this->add_control(
            'card_boxed_layout',
            [
                'label' => __( 'Boxed layout', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
                'condition' => [
                    'card_layout' => [ 'grid_1', 'grid_2', 'grid_11' ],
                ],
            ]
        );

        $this->add_control(
            'use_grid_items_gap',
            [
                'label' => __( 'Use grid spacing?', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
                'condition' => [
                    'card_layout' => [ 'grid_1', 'grid_2', 'grid_11' ]
                ],
            ]
        );

        $this->add_control(
            'grid_items_gap',
            [
                'label' => __( 'Portfolio grid spacing', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '20px',
                'label_block' => true,
                'condition' => [
                    'card_layout' => [ 'grid_1', 'grid_2', 'grid_11' ],
                    'use_grid_items_gap' => 'yes'
                ],
                'selectors' => [
                    '{{WRAPPER}} .grid-item.masonry-block' => 'padding: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'fullscreen_mode',
            [
                'label' => __( 'Fullscreen mode', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
                'condition' => [
                    'card_layout!' => [ 'grid_1', 'grid_2', 'grid_11' ]
                ],
            ]
        );

        $this->add_control(
            'navigation_visibility',
            [
                'label' => __( 'Navigation visibility', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
                'condition' => [
                    'card_layout!' => [ 'grid_1', 'grid_2', 'grid_11', 'grid_8', 'grid_12' ]
                ],
            ]
        );

        $this->add_control(
            'loop_mode',
            [
                'label' => __( 'Loop mode', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
                'condition' => [
                    'card_layout!' => [ 'grid_1', 'grid_2', 'grid_11', 'grid_8', 'grid_12' ]
                ],
            ]
        );

        $this->add_control(
            'autoplay_mode',
            [
                'label' => __( 'Autoplay mode', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
                'condition' => [
                    'card_layout!' => [ 'grid_1', 'grid_2', 'grid_11', 'grid_8', 'grid_12' ]
                ],
            ]
        );

        $this->add_control(
            'autoplay_timeout',
            [
                'label' => __( 'Autoplay timeout (ms)', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '3000',
                'condition' => [
                    'autoplay_mode' => 'yes',
                    'card_layout!' => [ 'grid_1', 'grid_2', 'grid_11', 'grid_8', 'grid_12' ]
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
                'condition' => [
                    'card_layout!' => [ 'grid_1', 'grid_2', 'grid_11', 'grid_8', 'grid_12' ]
                ],
            ]
        );

        $this->add_control(
            'bullets_visibility',
            [
                'label' => __( 'Items paginated navigation', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
                'condition' => [
                    'card_layout!' => [ 'grid_1', 'grid_2', 'grid_11', 'grid_8', 'grid_12' ]
                ],
            ]
        );

        $this->add_control(
            'tilt_effect',
            [
                'label' => __( 'Tilt hover effect', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'card_layout!' => [ 'grid_1', 'grid_2', 'grid_11', 'grid_8', 'grid_12' ]
                ],
            ]
        );

        $this->add_control(
            'lightbox_visibility',
            [
                'label' => __( 'Lightbox visibility', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
                'description' => 'To find more portfolio lightbox options navigate to global <a target="_blank" href="./admin.php?page=ohio_hub_settings&options_page=theme-general-portfolio">Theme Settings</a>',
            ]
        );

        $this->add_control(
            'video_button_style',
            [
                'label' => __( 'Portfolio video button style ', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'default',
                'options' => [
                    'default' => 'Default',
                    'outline' => 'Outline',
                ],
                'label_block' => true
            ]
        );

        $this->end_controls_section();

        // Grid
        $this->start_controls_section(
            'grid_section',
            [
                'label' => __( 'Grid', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'projects_in_block',
            [
                'label' => __( 'Portfolio items in the block', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'items' ],
                'range' => [
                    'items' => [
                        'min' => 1,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'items',
                    'size' => 12,
                ],
            ]
        );

        $this->add_control(
            'animation_type',
            [
                'label' => __( 'Grid animation', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'disable',
                'options' => [
                    'disable'  => __( 'Without animation', 'ohio-extra' ),
                    'sync'  => __( 'Sync animation', 'ohio-extra' ),
                    'async'  => __( 'Async animation', 'ohio-extra' ),
                ],
                'separator' => 'before',
                'condition' => [
                    'card_layout' => [ 'grid_1', 'grid_2', 'grid_8', 'grid_11', 'grid_12' ]
                ],
            ]
        );

        $this->add_control(
            'animation_effect',
            [
                'label' => __( 'Animation effect', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'fade-up',
                'options' => [
                    'fade-up'  => __( 'Fade up', 'ohio-extra' ),
                    'fade-down'  => __( 'Fade down', 'ohio-extra' ),
                    'fade-left'  => __( 'Fade left', 'ohio-extra' ),
                    'fade-right'  => __( 'Fade right', 'ohio-extra' ),
                    'flip-up'  => __( 'Flip up', 'ohio-extra' ),
                    'flip-down'  => __( 'Flip down', 'ohio-extra' ),
                    'zoom-in'  => __( 'Zoom in', 'ohio-extra' ),
                    'zoom-out'  => __( 'Zoom out', 'ohio-extra' ),
                ],
                'condition' => [
                    'animation_type' => [ 'sync', 'async' ],
                    'card_layout' => [ 'grid_1', 'grid_2', 'grid_8', 'grid_11', 'grid_12' ]
                ]
            ]
        );
        
        $this->add_control(
            'items_per_row_options',
            [
                'label' => __( 'Blog items per row', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'card_layout' => [ 'grid_1', 'grid_2', 'grid_6', 'grid_11', 'grid_12' ]
                ],
            ]
        );
        
        $this->add_control(
            'items_per_row_desktop',
            [
                'label' => __( 'Desktop devices', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '2',
                'options' => [
                    '1'  => __( '1 column', 'ohio-extra' ),
                    '2'  => __( '2 columns', 'ohio-extra' ),
                    '3'  => __( '3 columns', 'ohio-extra' ),
                    '4'  => __( '4 columns', 'ohio-extra' ),
                    '5'  => __( '5 columns', 'ohio-extra' ),
                    '6'  => __( '6 columns', 'ohio-extra' ),
                    '12'  => __( '12 columns', 'ohio-extra' ),
                ],
                'condition' => [
                    'card_layout' => [ 'grid_1', 'grid_2', 'grid_6', 'grid_11' ]
                ],
            ]
        );

        $this->add_control(
            'items_per_row_tablet',
            [
                'label' => __( 'Tablet devices', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '2',
                'options' => [
                    '1'  => __( '1 column', 'ohio-extra' ),
                    '2'  => __( '2 columns', 'ohio-extra' ),
                    '3'  => __( '3 columns', 'ohio-extra' ),
                    '4'  => __( '4 columns', 'ohio-extra' ),
                    '5'  => __( '5 columns', 'ohio-extra' ),
                    '6'  => __( '6 columns', 'ohio-extra' ),
                    '12'  => __( '12 columns', 'ohio-extra' ),
                ],
                'condition' => [
                    'card_layout' => [ 'grid_1', 'grid_2', 'grid_6', 'grid_11' ]
                ],
            ]
        );

        $this->add_control(
            'items_per_row_mobile',
            [
                'label' => __( 'Mobile devices', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1'  => __( '1 column', 'ohio-extra' ),
                    '2'  => __( '2 columns', 'ohio-extra' ),
                    '3'  => __( '3 columns', 'ohio-extra' ),
                    '4'  => __( '4 columns', 'ohio-extra' ),
                    '5'  => __( '5 columns', 'ohio-extra' ),
                    '6'  => __( '6 columns', 'ohio-extra' ),
                    '12'  => __( '12 columns', 'ohio-extra' ),
                ],
                'condition' => [
                    'card_layout' => [ 'grid_1', 'grid_2', 'grid_6', 'grid_11' ]
                ],
            ]
        );

        $this->end_controls_section();

        // Grid
        $this->start_controls_section(
            'filter_section',
            [
                'label' => __( 'Category Filter', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'card_layout' => [ 'grid_1', 'grid_2', 'grid_11', 'grid_8', 'grid_12' ]
                ],
            ]
        );

        $this->add_control(
            'show_projects_filter',
            [
                'label' => __( 'Category filter visibility', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $this->add_control(
            'filter_align',
            [
                'label' => __( 'Alignment', 'ohio-extra' ),
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
                'condition' => [
                    'show_projects_filter' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'pagination_section',
            [
                'label' => __( 'Pagination', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'card_layout' => [ 'grid_1', 'grid_2', 'grid_11', 'grid_8', 'grid_12' ]
                ],
            ]
        );

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
            'pagination_position',
            [
                'label' => __( 'Pagination position', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'left',
                'options' => [
                    'left'  => __( 'Left', 'ohio-extra' ),
                    'center'  => __( 'Center', 'ohio-extra' ),
                    'right'  => __( 'Right', 'ohio-extra' ),
                ],
                'label_block' => true,
                'condition' => [
                    'use_pagination' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'pagination_type',
            [
                'label' => __( 'Pagination type', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'simple',
                'options' => [
                    'simple'  => __( 'Simple', 'ohio-extra' ),
                    'standard'  => __( 'Standard', 'ohio-extra' ),
                    'lazy_load'  => __( 'Lazy load', 'ohio-extra' ),
                    'load_more'  => __( 'Load more', 'ohio-extra' ),
                ],
                'label_block' => true,
                'condition' => [
                    'use_pagination' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'items_per_page',
            [
                'label' => __( 'Projects per page', 'ohio-extra' ),
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

        // Styles
        $this->start_controls_section(
            'text_section',
            [
                'label' => __( 'Basic', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __( 'Title color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} h3.portfolio-details-headline'       => 'color: {{VALUE}} !important',
                    '{{WRAPPER}} h3.portfolio-item-headline'          => 'color: {{VALUE}} !important',
                    '{{WRAPPER}} h2.portfolio-item-headline'       => 'color: {{VALUE}} !important',
                    '{{WRAPPER}} .portfolio-item-headline h3'         => 'color: {{VALUE}} !important',
                    '{{WRAPPER}} .portfolio-item-headline h2 a'       => 'color: {{VALUE}} !important',
                    '{{WRAPPER}} h2.portfolio-details-headline.title' => 'color: {{VALUE}} !important',
                    '{{WRAPPER}} a h2.portfolio-item-headline'        => 'color: {{VALUE}} !important',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __( 'Title typography', 'ohio-extra' ),
                'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} h3.portfolio-details-headline, {{WRAPPER}} h3.portfolio-item-headline, {{WRAPPER}} h2.portfolio-item-headline, {{WRAPPER}} .portfolio-item-headline h3, {{WRAPPER}} .portfolio-item-headline h2 a, {{WRAPPER}} h2.portfolio-details-headline.title, {{WRAPPER}} a h2.portfolio-item-headline',
            ]
        );

        $this->add_control(
            'category_color',
            [
                'label' => __( 'Category color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .portfolio-item .category-holder .category' => 'color: {{VALUE}} !important',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'category_typography',
                'label' => __( 'Category typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .portfolio-item .category-holder .category',
            ]
        );

        $this->add_control(
            'date_color',
            [
                'label' => __( 'Date color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .portfolio-item .portfolio-details-date' => 'color: {{VALUE}} !important',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'date_typography',
                'label' => __( 'Date typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .portfolio-item .portfolio-details-date',
            ]
        );

        $this->add_control(
            'short_description_color',
            [
                'label' => __( 'Short description color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .portfolio-item .portfolio-details-description .short-description' => 'color: {{VALUE}} !important',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'short_description_typography',
                'label' => __( 'Short description typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .portfolio-item .portfolio-details-description .short-description',
            ]
        );

        $this->add_control(
            'link_color',
            [
                'label' => __( 'Link color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .portfolio-item a.btn-link, {{WRAPPER}} .show-project-link, {{WRAPPER}} .show-project-link a' => 'color: {{VALUE}} !important',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'link_typography',
                'label' => __( 'Link typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .portfolio-item a.btn-link, {{WRAPPER}} .show-project-link, {{WRAPPER}} .show-project-link a',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'back_section',
            [
                'label' => __( 'Additional', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'bg_color',
            [
                'label' => __( 'Boxed background color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .portfolio-item-grid.boxed.portfolio-grid-type-1 .portfolio-item-details' => 'background-color: {{VALUE}} !important',
                ],
                'condition' => [
                    'card_layout' => 'grid_1'
                ]
            ]
        );

        $this->add_control(
            'overlay_color',
            [
                'label' => __( 'Overlay color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hover-color-overlay.portfolio-grid-type-1 .portfolio-item-image a:after' => 'background-color: {{VALUE}} !important',
                    '{{WRAPPER}} .hover-color-overlay.portfolio-grid-type-2 .portfolio-item-image:after' => 'background-color: {{VALUE}} !important',
                    '{{WRAPPER}} .portfolio-item-fullscreen .portfolio-item-overlay' => 'background-color: {{VALUE}} !important',
                    '{{WRAPPER}} .hover-color-overlay.portfolio-grid-type-11 .portfolio-item-image:after' => 'background-color: {{VALUE}} !important',
                    '{{WRAPPER}} .hover-color-overlay .slider a::after' => 'background-color: {{VALUE}} !important',
                    '{{WRAPPER}} .hover-color-overlay.blog-grid .blog-grid-image::after' => 'background-color: {{VALUE}} !important',
                ],
            ]
        );

        $this->add_control(
            'description_overlay_color',
            [
                'label' => __( 'Description overlay color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .portfolio-grid .portfolio-item-grid.portfolio-grid-type-11 .portfolio-item-details .title' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .portfolio-grid .portfolio-item-grid.portfolio-grid-type-11 .portfolio-item-details .category-holder' => 'background-color: {{VALUE}};'
                ],
                'condition' => [
                    'card_layout' => 'grid_11'
                ]
            ]
        );

        $this->add_control(
            'button_nav_color',
            [
                'label' => __( 'Navigation button color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .clb-slider-nav-btn .next-btn .ion path, {{WRAPPER}} .clb-slider-nav-btn .prev-btn .ion path' => 'stroke: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'video_button_color',
            [
                'label' => __( 'Video button color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .portfolio-grid .video-module .btn-round .ion,  {{WRAPPER}} .portfolio-onepage-slider .video-module .btn-round .ion' => 'background-color: {{VALUE}}; border-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        // Wrapper classes
        if ( $settings['show_projects_filter'] ) {
            $this->addWrapperClass( 'with-sorting' );
        }

        // Row string value compatibility
        $columns_in_row = $settings['items_per_row_desktop'] . '-' . $settings['items_per_row_tablet'] . '-' . $settings['items_per_row_mobile'];
        $column_class = NorExtraParser::VC_columns_to_CSS( $columns_in_row );
        $column_double_class = NorExtraParser::VC_columns_to_CSS( $columns_in_row, true );

        // Data
        $projects_limit = ( !empty( $settings['projects_in_block'] ) ) ? intval( $settings['projects_in_block']['size'] ) : 12;
        $projects_data = $this->getProjectsData( $settings['portfolio_category'], $projects_limit );
        $pagination_page = OhioHelper::get_current_pagenum();

        $per_page = ( !empty( $settings['items_per_page'] ) ) ? $settings['items_per_page']['size'] : 6;
        $pages_count = ceil( count( $projects_data ) / $per_page );
        $filter_is_paged = ($pages_count > 1) && in_array( $settings['pagination_type'], [ 'simple', 'standard' ] );

        include( plugin_dir_path( __FILE__ ) . 'recent-projects-view.php' );
    }

    protected function getProjectsData( $categories = [], $projects_count = 12 )
    {
        $_tax_query = [];

        if ( count( $categories ) > 0 ) {
            $_tax_query = [[
                'taxonomy' => 'ohio_portfolio_category',
                'field' => 'slug',
                'terms' => $categories
            ]];
        }

        return get_posts( apply_filters( 'ohio_projects_args_filter', [
            'posts_per_page' => $projects_count,
            'offset' => 0,
            'post_type' => 'ohio_portfolio',
            'tax_query' => $_tax_query,
            'post_status' => 'publish',
            'suppress_filters' => false
        ]) );
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Ohio_Elementor_Recent_Projects_Widget() );
