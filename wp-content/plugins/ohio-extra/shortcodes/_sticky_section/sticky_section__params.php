<?php

/**
* WPBakery Page Builder Ohio Vertical Fullscreen Slider shortcode params
*/

vc_lean_map( 'ohio_sticky_section', 'ohio_sticky_section_sc_map' );

function ohio_sticky_section_sc_map() {
	return array(
		'name' => __( 'Sticky Section', 'ohio-extra' ),
		'description' => __( 'Paged split view', 'ohio-extra' ),
		'base' => 'ohio_sticky_section',
		'category' => __( 'Ohio', 'ohio-extra' ),
		'icon' => plugin_dir_url( __FILE__ ) . 'images/icon.svg',
		'holder' => '',
		'js_view' => 'VcOhioVerticalSliderView',
		'show_settings_on_create' => true,
		'content_element' => true,
		'is_container' => true,
		'as_parent' => array(
			'only' => 'ohio_sticky_section_inner'
		),
		'default_content' => '[ohio_sticky_section_inner][/ohio_sticky_section_inner]',
		'params' => array(
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Fullscreen mode', 'ohio-extra' ),
				'param_name' => 'fullscreen_mode',
				'description' => __( 'If checked, the slider is fullscreen', 'ohio-extra' ),
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				)
			),
			
			// Styles

			// Custom CSS Class
			array(
				'type' => 'textfield',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'heading' => __( 'Custom CSS class', 'ohio-extra' ),
				'param_name' => 'css_class',
				'description' => __( 'If you want to add own styles to a specific unit, use this field to add custom CSS class.', 'ohio-extra' )
			),
		)
	);
}

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_Ohio_sticky_section extends WPBakeryShortCodesContainer { }
}