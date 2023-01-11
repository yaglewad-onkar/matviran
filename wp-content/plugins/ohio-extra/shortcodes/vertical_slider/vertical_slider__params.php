<?php

/**
* WPBakery Page Builder Ohio Vertical Fullscreen Slider shortcode params
*/

vc_lean_map( 'ohio_vertical_slider', 'ohio_vertical_slider_sc_map' );

function ohio_vertical_slider_sc_map() {
	return array(
		'name' => __( 'Vertical Slider', 'ohio-extra' ),
		'description' => __( 'Paged split view', 'ohio-extra' ),
		'base' => 'ohio_vertical_slider',
		'category' => __( 'Ohio', 'ohio-extra' ),
		'icon' => OHIO_EXTRA_DIR_URL . 'assets/images/shortcodes/vertical_slider_icon.svg',
		'holder' => '',
		'js_view' => 'VcOhioVerticalSliderView',
		'show_settings_on_create' => true,
		'content_element' => true,
		'is_container' => true,
		'as_parent' => array(
			'only' => 'ohio_vertical_slider_inner'
		),
		'default_content' => '[ohio_vertical_slider_inner][/ohio_vertical_slider_inner]',
		'params' => array(
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Mousewheel scrolling', 'ohio-extra' ),
				'param_name' => 'mousewheel_scrolling',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				),
				'description' => 'If checked, mousewheel scrolling is enabled'
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Mouse drag scroll', 'ohio-extra' ),
				'param_name' => 'drag_scrolling',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				),
				'description' => 'If checked, drag scrolling is enabled'
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Loop mode', 'ohio-extra' ),
				'param_name' => 'loop',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				),
				'description' => __( 'Infinity loop. Duplicate last and first items to get loop illusion.', 'ohio-extra' ),
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Slider autoplay mode', 'ohio-extra' ),
				'param_name' => 'autoplay_mode',
				'description' => __( 'If checked, slides are scrolled automatically', 'ohio-extra' ),
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Autoplay timeout', 'ohio-extra' ),
				'param_name' => 'autoplay_timeout',
				'description' => '',
				'value' => '3000',
				'dependency' => array(
					'element' => 'autoplay_mode',
					'value' => array(
						'1'
					)
				)
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Scroll animation direction', 'ohio-extra' ),
				'param_name' => 'scroll_type',
				'value' => array(
					__( 'Horizontal', 'ohio-extra' ) => '0',
					__( 'Vertical', 'ohio-extra' ) => '1'
				),
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Show navigation buttons?', 'ohio-extra' ),
				'param_name' => 'navigation_show',
				'description' => __( 'Show navigation buttons on page', 'ohio-extra' ),
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				),
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Show bullets?', 'ohio-extra' ),
				'param_name' => 'pagination_show',
				'description' => __( 'Show pagination dots/numbers on page', 'ohio-extra' ),
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				),
			),
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
			array(
				'type' => 'dropdown',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Bullets type', 'ohio-extra' ),
				'param_name' => 'pagination_type',
				'value' => array(
					__( 'Bullets', 'ohio-extra' ) => 'bullets',
					__( 'Numbers', 'ohio-extra' ) => 'numbers'
				),
				'dependency' => array(
					'element' => 'pagination_show',
					'value' => array(
						'1'
					)
				)
			),

			// Styles
			array(
				'type' => 'colorpicker',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'heading' => __( 'Pagination color', 'ohio-extra' ),
				'param_name' => 'elements_color'
			),

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
	class WPBakeryShortCode_Ohio_Vertical_Slider extends WPBakeryShortCodesContainer { }
}