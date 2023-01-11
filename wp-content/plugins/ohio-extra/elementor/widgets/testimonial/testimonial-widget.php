<?php
class Ohio_Elementor_Testimonial_Widget extends Ohio_Elementor_Widget_Base {

    public function get_name()
    {
        return 'ohio_testimonial';
    }

    public function get_title()
    {
        return __( 'Testimonial', 'ohio-extra' );
    }

    public function get_icon()
    {
        return 'ohio-icon-sc-testimonial';
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
            'block_layout',
            [
                'label' => __( 'Block layout', 'ohio-extra' ),
                'type' => 'ohio-image-choose',
                'options' => [
                    'default' => [
                        'title' => __( 'Card Details', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/testimonial/images/wpb_params_071.svg',
                    ],
                    'image_top' => [
                        'title' => __( 'Image Top', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/testimonial/images/wpb_params_065.svg',
                    ],
                    'image_middle' => [
                        'title' => __( 'Image Middle', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/testimonial/images/wpb_params_068.svg',
                    ]
                ],
                'default' => 'default',
            ]
        );

        $this->add_control(
            'block_alignment',
            [
                'label' => __( 'Block alignment', 'ohio-extra' ),
                'type' => 'ohio-image-choose',
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/testimonial/images/wpb_params_070.svg',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/testimonial/images/wpb_params_071.svg',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/testimonial/images/wpb_params_071.svg',
                    ]
                ],
                'default' => 'center',
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __( 'Headline', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true
            ]
        );

        $this->add_control(
            'testimonial_text',
            [
                'label' => __( 'Testimonial text (<small><strong>HTML allowed</strong></small>)', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 2,
                'placeholder' => __( 'Enter block title.', 'ohio-extra' ),
                'default' => 'It\'s awesome!',
            ]
        );

        $this->add_control(
			'author_options',
			[
				'label' => __( 'Author', 'ohio-extra' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

        $this->add_control(
            'author_name',
            [
                'label' => __( 'Name', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'John Doe',
            ]
        );

        $this->add_control(
            'author_position',
            [
                'label' => __( 'Position', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __( 'E.g. Product manager', 'ohio-extra' ),
            ]
        );

        $this->add_control(
            'author_photo',
            [
                'label' => __( 'Author photo', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'description' => __( 'Choose author photo.', 'ohio-extra' ),
                'condition' => [
                    'block_layout' => ['image_top', 'image_middle'],
                ],
            ]
        );

        $this->end_controls_section();

        //Styles
        $this->start_controls_section(
            'styles_section',
            [
                'label' => __( 'Styles', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'headline_color',
            [
                'label' => __( 'Headline color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'headline_typography',
                'label' => __( 'Headline typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .testimonial-headline',
            ]
        );

        $this->add_control(
            'testimonial_color',
            [
                'label' => __( 'Testimonial color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'testimonial_typography',
                'label' => __( 'Testimonial typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} blockquote',
            ]
        );

        $this->add_control(
            'author_name_color',
            [
                'label' => __( 'Author name color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'name_typography',
                'label' => __( 'Name typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} h6.author-name',
            ]
        );

        $this->add_control(
            'author_position_color',
            [
                'label' => __( 'Author position color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'author_position_typography',
                'label' => __( 'Position typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .author-details',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        // Wrapper classes
        switch ( $settings['block_layout'] ) {
            case 'image_top':
                $this->addWrapperClass( 'with-top-avatar' );
                break;
            case 'image_middle':
                $this->addWrapperClass( 'with-middle-avatar' );
                break;
        }

        switch ( $settings['block_alignment'] ) {
            case 'left':
                $this->addWrapperClass( 'text-left' );
                break;
            case 'right':
                 $this->addWrapperClass( 'text-right' );
                break;
            case 'center':
                $this->addWrapperClass( 'text-center' );
                break;
        }

        // Collect styles
        $this->addInlineStyle( 'headline', 'headline_color', 'color: {{VALUE}}' );
        $this->addInlineStyle( 'testimonial', 'testimonial_color', 'color: {{VALUE}}' );
        $this->addInlineStyle( 'author_name', 'author_name_color', 'color: {{VALUE}}' );
        $this->addInlineStyle( 'author_position', 'author_position_color', 'color: {{VALUE}}' );

        include( plugin_dir_path( __FILE__ ) . 'testimonial-view.php' );
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Ohio_Elementor_Testimonial_Widget() );
