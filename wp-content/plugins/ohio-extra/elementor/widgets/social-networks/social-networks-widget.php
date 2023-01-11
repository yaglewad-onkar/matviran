<?php
class Ohio_Elementor_Social_Networks_Widget extends Ohio_Elementor_Widget_Base {

    public function get_name()
    {
        return 'ohio_social_networks';
    }

    public function get_title()
    {
        return __( 'Social Networks', 'ohio-extra' );
    }

    public function get_icon()
    {
        return 'ohio-icon-sc-social-networks';
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
                'label' => __( 'Layout', 'ohio-extra' ),
                'type' => 'ohio-image-choose',
                'options' => [
                    'outline' => [
                        'title' => __( 'Outline', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/social_networks/images/wpb_params_052.svg',
                    ],
                    'fill' => [
                        'title' => __( 'Fill', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/social_networks/images/wpb_params_053.svg',
                    ],
                    'flat' => [
                        'title' => __( 'Flat', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/social_networks/images/wpb_params_054.svg',
                    ],
                    'inline' => [
                        'title' => __( 'Inline', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/social_networks/images/wpb_params_055.svg',
                    ],
                    'text' => [
                        'title' => __( 'Text', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/social_networks/images/wpb_params_056.svg',
                    ],
                    'boxed' => [
                        'title' => __( 'Boxed', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/social_networks/images/wpb_params_057.svg',
                    ]
                ],
                'default' => 'outline',
            ]
        );

        $this->add_control(
            'block_alignment',
            [
                'label' => __( 'Block alignment', 'ohio-extra' ),
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
            'use_small_shapes',
            [
                'label' => __( 'Use small shapes', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
            ]
        );
        
        $this->add_control(
            'socials_type',
            [
                'label' => __( 'Alignment', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'separator' => 'before',
                'default' => 'custom',
                'options' => [
                    'custom' => 'Custom',
                    'share' => 'Share',
                ],
            ]
        );

        $this->add_control(
            'facebook_share',
            [
                'label' => __( 'Facebook share', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
                'condition' => [
                    'socials_type' => 'share',
                ],
            ]
        );
        
        $this->add_control(
            'twitter_share',
            [
                'label' => __( 'Twitter share', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
                'condition' => [
                    'socials_type' => 'share',
                ],
            ]
        );

        $this->add_control(
            'linkedin_share',
            [
                'label' => __( 'Linkedin share', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
                'condition' => [
                    'socials_type' => 'share',
                ],
            ]
        );

        $this->add_control(
            'pinterest_share',
            [
                'label' => __( 'Pinteres share', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
                'condition' => [
                    'socials_type' => 'share',
                ],
            ]
        );

        $this->add_control(
            'vk_share',
            [
                'label' => __( 'Vkontakte share', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
                'condition' => [
                    'socials_type' => 'share',
                ],
            ]
        );

        $this->add_control(
            'social_networks',
            [
                'label' => __( 'Social networks', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $this->getSocialNetworksControls(),
                'default' => [],
                'title_field' => '{{ list_network.charAt(0).toUpperCase() + list_network.slice(1) }}',
                'prevent_empty' => false,
                'condition' => [
                    'socials_type' => 'custom',
                ],
            ]
        );

        $this->end_controls_section();


        //Styles
        $this->start_controls_section(
            'text_section',
            [
                'label' => __( 'Color settings', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_control(
            'default_colors',
            [
                'label' => __( 'Default colors', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $this->add_control(
            'hover_default_colors',
            [
                'label' => __( 'Hover default colors', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $this->add_control(
            'shape_color',
            [
                'label' => __( 'Shape color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .socialbar:not(.boxed):not(.flat):not(.outline):not(.inline) a' => 'background-color: {{VALUE}}; border-color: {{VALUE}}; color: #fff;',

                    '{{WRAPPER}} .socialbar.outline a' => 'border-color: {{VALUE}};',
                    '{{WRAPPER}} .socialbar.flat a:hover' => 'background-color: {{VALUE}}; color: #fff;',
                    '{{WRAPPER}} .socialbar.boxed a' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'default_colors' => '',
                ],
            ]
        );

        $this->add_control(
            'outline_hover_color',
            [
                'label' => __( 'Hover outline color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .socialbar.flat a:hover' => 'border-color: {{VALUE}};',
                ],
                'condition' => [
                    'default_colors' => '',
                    'block_layout' => 'flat',
                ],
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => __( 'Icon color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .socialbar a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .socialbar.boxed span' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'default_colors' => '',
                ],
            ]
        );

        $this->add_control(
            'icon_hover_color',
            [
                'label' => __( 'Icon color on hover', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .socialbar a:hover' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'default_colors' => '',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function getSocialNetworksControls()
    {
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'list_link', [
                'label' => '',
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => 'https://example.com',
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'list_network',
            [
                'label' => '',
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'facebook',
                'options' => $this->getSocialNetworksOptionsList(),
                'label_block' => true,
            ]
        );
        
        return $repeater->get_controls();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        $show_text = in_array( $settings['block_layout'], [ 'boxed', 'inline', 'text' ] );
        $show_icon = $settings['block_layout'] != 'text';

        if ( $settings['socials_type'] == 'share' ) {
            $settings['social_networks'] = [];

            if ( $settings['facebook_share'] ) {
                $settings['social_networks'][] = [
                    'list_network' => 'facebook',
                    'list_link' => 'https://www.facebook.com/sharer/sharer.php?u=' . get_permalink()
                ];
            }
            if ( $settings['twitter_share'] ) {
                $settings['social_networks'][] = [
                    'list_network' => 'twitter',
                    'list_link' => 'https://twitter.com/intent/tweet?text=' . get_permalink()
                ];
            }
            if ( $settings['pinterest_share'] ) {
                $settings['social_networks'][] = [
                    'list_network' => 'pinterest',
                    'list_link' => 'http://pinterest.com/pin/create/button/?url=' . urlencode( get_permalink() ) . '&description=' . urlencode( 'title' )
                ];
            }
            if ( $settings['linkedin_share'] ) {
                $settings['social_networks'][] = [
                    'list_network' => 'linkedin',
                    'list_link' => 'https://www.linkedin.com/shareArticle?mini=true&url=' . urlencode( get_permalink() ) . '&title=' . urlencode( 'title' ) . '&source=' . urlencode( get_bloginfo( 'name' ) )
                ];
            }
            if ( $settings['vk_share'] ) {
                $settings['social_networks'][] = [
                    'list_network' => 'vk',
                    'list_link' => 'http://vk.com/share.php?url=' . rawurlencode( get_permalink() )
                ];
            }
        }

        // Wrapper classes
        $this->addWrapperClass( 'social-column-' . count( $settings['social_networks'] ) );
        $this->addWrapperClass( 'text-' . $settings['block_alignment'] );

        if ( !empty( $settings['default_colors'] ) ) {
            $this->addWrapperClass( 'default' );
        }

        if ( !empty( $settings['hover_default_colors'] ) ) {
            $this->addWrapperClass( 'hover-default' );
        }

        if ( $settings['socials_type'] == 'custom' ) {
            $this->addWrapperClass( 'new-tab-links' );
        }
    
        switch ( $settings['block_layout'] ) {
            case 'outline':
                $this->addWrapperClass( 'outline' );
                break;
            case 'flat':
                $this->addWrapperClass( 'flat' );
                break;
            case 'inline':
            case 'text':
                $this->addWrapperClass( 'inline' );
                break;
            case 'boxed':
                $this->addWrapperClass( 'boxed' );
                break;
        }

        if ( !empty( $settings['use_small_shapes'] ) ) {
            $this->addWrapperClass( 'small' );
        }

        if ( $settings['block_layout'] == 'flat' && !empty( $settings['outline_hover_color'] ) ) {
            $this->addWrapperClass( 'outline-hover' );
        }

        include( plugin_dir_path( __FILE__ ) . 'social-networks-view.php' );
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Ohio_Elementor_Social_Networks_Widget() );
