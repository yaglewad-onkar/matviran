<?php
class Ohio_Elementor_Contact_Form_Widget extends Ohio_Elementor_Widget_Base {

    public function __construct( $data = [], $args = null ) {
        parent::__construct( $data, $args );

        wp_register_script( 'ohio-elementor-contact-form-widget', plugin_dir_url( __FILE__ ) . 'handler.js', [ 'jquery', 'elementor-frontend' ], '1.0.0', true );
    }

    public function get_name()
    {
        return 'ohio_contact_form';
    }

    public function get_title()
    {
        return __( 'Contact Form 7', 'ohio-extra' );
    }

    public function get_icon()
    {
        return 'ohio-icon-sc-contact-form';
    }

    public function get_categories()
    {
        return [ 100 ];
    }

    public function get_script_depends() {
        return [ 'ohio-elementor-contact-form-widget' ];
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
            'important_note',
            [
                'label' => '',
                'type' => \Elementor\Controls_Manager::RAW_HTML,
                'raw' => '<div class="note">' . __( 'To use the widget ensure that you installed the Contact Form 7 from the recommended plugins.', 'ohio-extra' ) . '</div>',
                'content_classes' => 'your-class',
            ]
        );

        $this->add_control(
            'block_type_layout',
            [
                'label' => __( 'Form layout', 'ohio-extra' ),
                'type' => 'ohio-image-choose',
                'options' => [
                    'flat' => [
                        'title' => __( 'Flat', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/contact_form/images/wpb_params_031.svg',
                    ],
                    'outline' => [
                        'title' => __( 'Outline', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/contact_form/images/wpb_params_030.svg',
                    ],
                ],
                'default' => 'flat',
            ]
        );

        $this->add_contact_form_7_controll();

        $this->end_controls_section();

        $this->start_controls_section(
            'form_style_section',
            [
                'label' => __( 'Form', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'input_background_color',
            [
                'label' => __( 'Input background color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} input:not([type="submit"])' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} textarea' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} select' => 'background-color: {{VALUE}}'
                ],
            ]
        );

        $this->add_control(
            'input_focus_border_color',
            [
                'label' => __( 'Fields focus border color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} input:focus' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} .focus.active' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} textarea:focus' => 'border-color: {{VALUE}}'
                ],
            ]
        );

        $this->add_control(
            'input_text_color',
            [
                'label' => __( 'Input text color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} input:not([type="submit"])' => 'color: {{VALUE}}',
                    '{{WRAPPER}} textarea' => 'color: {{VALUE}}',
                    '{{WRAPPER}} select' => 'color: {{VALUE}}'
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'input_text_typography',
                'label' => __( 'Input text typography', 'ohio-extra' ),
                'selectors' => [
                    '{{WRAPPER}} input:not([type="submit"])',
                    '{{WRAPPER}} textarea',
                    '{{WRAPPER}} select'
                ],
            ]
        );

        $this->add_control(
            'fields_offset',
            [
                'label' => __( 'Fields offset', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 10,
                ],
                'selectors' => [
                    '{{WRAPPER}} form.wpcf7-form' => 'margin: -{{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} [class*=vc_col-lg]' => 'padding: {{SIZE}}{{UNIT}};'
                ],
                'separator' => 'before'
            ]
        );

        $this->end_controls_section();

        $this->addButtonStyleSection( false );
    }

    protected function add_contact_form_7_controll()
    {
        $forms_select = [];
        $forms_items = get_posts( 'post_type="wpcf7_contact_form"&numberposts=-1' );
        if ( !empty( $forms_items ) ) {
            foreach ( $forms_items as $form ) {
                $forms_select[ $form->ID ] = $form->post_title;
            }
        }

        $this->add_control(
            'form',
            [
                'label' => 'Contact Form 7',
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '0',
                'options' => [ '0' => '- ' . __( 'No contact form selected', 'ohio-extra' ) . ' -' ] + $forms_select,
                'label_block' => true
            ]
        );
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        // Wrapper classes
        if ( $settings['block_type_layout'] == 'outline' ) {
            $this->addWrapperClass( 'outline' );
        }

        include( plugin_dir_path( __FILE__ ) . 'contact-form-view.php' );
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Ohio_Elementor_Contact_Form_Widget() );
