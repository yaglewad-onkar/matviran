<?php

if ( ! defined( 'ABSPATH' ) ) exit;

class WP_Widget_Logo extends WP_Widget {

	function __construct() {

	    $widget_ops = array('classname' => 'ut_widget_logo', 'description' => __( 'Insert your embedded code in here!', 'unitedthemes') );
		parent::__construct('ut_logo', __('United Themes - Simple Logo Widget', 'unitedthemes'), $widget_ops);
		$this->alt_option_name = 'ut_logo_widget';

	}
	function form( $instance ) {
	
	    $logo = ( !empty($instance['logo']) ) ? esc_url($instance['logo']) : ''; 
        
        echo '<div class="ut-widget-admin-upload">';
        
            echo '<h4>' . esc_html__( 'Logo', 'unitedthemes') . '</h4>';

            ut_call_option_by_type( array(
                'type'                  => 'upload',
                'field_name'            => $this->get_field_name( 'logo' ),
                'field_id'              => $this->get_field_id( 'logo' ),
                'field_value'           => $logo,

            ) );

        echo '</div>';
        
        $max_height = ( !empty($instance['max_height']) ) ? esc_attr( $instance['max_height'] ) : '60';
        
        echo '<div class="ut-widget-admin-numeric">';
        
            echo '<h4>' . esc_html__( 'Logo Max Height', 'unitedthemes') . '</h4>';
            
            ut_call_option_by_type( array(
                'type'                  => 'numeric_slider',
                'field_name'            => $this->get_field_name( 'max_height' ),
                'field_id'              => $this->get_field_id( 'max_height' ),
                'field_value'           => $max_height,
                'field_class'           => 'ut-widget-slider',
                'field_min_max_step'    => '0,100,1'
            
            ) );        
        
        echo '</div>';
                
    }

    function update($new_instance, $old_instance) {

        return $new_instance;
        
    }

    function widget( $args, $instance ){

	    extract( $args );
	    extract( $instance );

	    echo $before_widget;
            
            if( !empty( $logo ) ) {
                
                echo '<img style="max-height: ' . esc_attr( $max_height ) . 'px;" alt="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '" src="' . esc_url( $logo ) . '" />';
                
            }
        
        echo $after_widget;
        
    }

}