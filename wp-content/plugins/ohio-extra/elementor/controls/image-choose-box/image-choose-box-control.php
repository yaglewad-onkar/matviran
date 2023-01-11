<?php
class Ohio_Elementor_Image_Choose_Box_Control extends \Elementor\Control_Choose {

    /**
     * Retrieve choose control type.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Control type.
     */
    public function get_type() {
        return 'ohio-image-choose';
    }

    /**
     * Control style enqueue.
     * 
     * @since 1.0.0
     * @access public
     */
    public function enqueue() {
        wp_register_style( 'ohio-elementor-image-choose-style',  plugin_dir_url( __FILE__ ) . '/image-choose-box.css');
        wp_enqueue_style( 'ohio-elementor-image-choose-style' );

        wp_register_script( 'ohio-elementor-image-choose-control',  plugin_dir_url( __FILE__ ) . '/image-choose-box.js', [ 'jquery' ], '1.0.0');
        wp_enqueue_script( 'ohio-elementor-image-choose-control' );
    }

    /**
     * Render choose control output in the editor.
     *
     * Used to generate the control HTML in the editor using Underscore JS
     * template. The variables for the class are available using `data` JS
     * object.
     *
     * @since 1.0.0
     * @access public
     */
    public function content_template() {
        $control_uid = $this->get_control_uid( '{{value}}' );
        ?>

        <div class="elementor-control-field ohio-image-choose-box-wrapper">
            <label class="elementor-control-title">{{{ data.label }}}</label>
            <div class="elementor-control-input-wrapper <# if ( data.additional_class ) { #>{{{ data.additional_class }}}<# } #>">
                <div class="elementor-choices">
                    <# _.each( data.options, function( options, value ) { #>
                    <input id="<?php echo $control_uid; ?>" type="radio" data-setting="{{ data.name }}" name="elementor-choose-{{ data.name }}-{{ data._cid }}" value="{{ value }}">
                    <label class="elementor-choices-label elementor-control-unit-1 tooltip-target" for="<?php echo $control_uid; ?>" data-tooltip="{{ options.title }}" title="{{ options.title }}">
                        <img src="{{ options.icon }}" alt="">
                        <span>{{{ options.title }}}</span>
                    </label>
                    <# } ); #>
                </div>
            </div>
        </div>

        <# if ( data.description ) { #>
        <div class="elementor-control-field-description">{{{ data.description }}}</div>
        <# } #>

        <?php
    }

    /**
     * Retrieve choose control default settings.
     *
     * Get the default settings of the choose control. Used to return the
     * default settings while initializing the choose control.
     *
     * @since 1.0.0
     * @access protected
     *
     * @return array Control default settings.
     */
    protected function get_default_settings() {
        return [
            'options' => [],
        ];
    }
}

\Elementor\Plugin::$instance->controls_manager->register_control( 'ohio-image-choose', new \Ohio_Elementor_Image_Choose_Box_Control() );
