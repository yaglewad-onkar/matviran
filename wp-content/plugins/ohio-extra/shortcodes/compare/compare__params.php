<?php

vc_lean_map( 'ohio_compare', 'ohio_compare_sc_map' );

function ohio_compare_sc_map() {
	return array(
		'name' => __( 'Compare', 'ohio-extra' ),
		'description' => __( 'Compare module', 'ohio-extra' ),
		'base' => 'ohio_compare',
		'category' => __( 'Ohio', 'ohio-extra' ),
		'icon' => OHIO_EXTRA_DIR_URL . 'assets/images/shortcodes/compare_icon.svg',
		'params' => array(
			// General
			array(
				'type' => 'attach_image',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'First image', 'ohio-extra' ),
				'param_name' => 'first_image',
				'description' => __( 'Choose first image.', 'ohio-extra' ),
			),
			array(
				'type' => 'attach_image',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Second image', 'ohio-extra' ),
				'param_name' => 'second_image',
				'description' => __( 'Choose second image for comparing.', 'ohio-extra' ),
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Orientation', 'ohio-extra' ),
				'param_name' => 'orientation_type',
				'value' => array(
					__( 'Horizontal', 'ohio-extra' ) => 'horizontal',
					__( 'Vertical', 'ohio-extra' ) => 'vertical',
				),
				'std' => 'horizontal',
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Hide labeled overlay?', 'ohio-extra' ),
				'description' => __( '', 'ohio-extra' ),
				'param_name' => 'hide_overlay',
				'value' => array(
					__( 'Hide', 'ohio-extra' ) => '0'
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( '"Before" label', 'ohio-extra' ),
				'param_name' => 'before_label_text',
				'description' => __( 'First image label', 'ohio-extra' ),
				'value' => "Before",
				'dependency' => array(
					'element' => 'hide_overlay',
					'value' => '0'
				)
			),
			array(
				'type' => 'textfield',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( '"After" label', 'ohio-extra' ),
				'param_name' => 'after_label_text',
				'description' => __( 'Second image label', 'ohio-extra' ),
				'value' => "After",
				'dependency' => array(
					'element' => 'hide_overlay',
					'value' => '0'
				)
			),
			array(
				'type' => 'textfield',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Divider line position in percents %', 'ohio-extra' ),
				'param_name' => 'position',
				'description' => __( 'Handler line position percent', 'ohio-extra' ),
				'value' => "50%"
			),

			// Color settings
			array(
				'type' => 'ohio_divider',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'param_name' => 'color_settings_title',
				'value' => __( 'Color settings', 'ohio-extra' ),
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'heading' => __( 'Handler line color', 'ohio-extra' ),
				'param_name' => 'handler_color',
			),

			// Custom CSS Class
			array(
				'type' => 'ohio_divider',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'param_name' => 'other_settings_title',
				'value' => __( 'Other', 'ohio-extra' ),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'heading' => __( 'Custom CSS class', 'ohio-extra' ),
				'param_name' => 'css_class',
				'description' => __( 'If you want to add own styles to a specific unit, use this field to add custom CSS class.', 'ohio-extra' )
			),

			// Appear Effect
			array(
				'type' => 'dropdown',
				'group' => __( 'Appear Effect', 'ohio-extra' ),
				'heading' => __( 'Appear effect', 'ohio-extra' ),
				'param_name' => 'appearance_effect',
				'value' => array(
					__( 'None', 'ohio-extra' ) => 'none',
					__( 'Fade up', 'ohio-extra' ) => 'fade-up',
					__( 'Fade left', 'ohio-extra' ) => 'fade-left',
					__( 'Fade right', 'ohio-extra' ) => 'fade-right',
					__( 'Slide up', 'ohio-extra' ) => 'slide-up',
					__( 'Flip up', 'ohio-extra' ) => 'flip-up',
					__( 'Zoom in', 'ohio-extra' ) => 'zoom-in'
				)
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Appear Effect', 'ohio-extra' ),
				'heading' => __( 'Animation duration', 'ohio-extra' ),
				'param_name' => 'appearance_duration',
				'description' => __( 'Duration accept values from 50 to 3000 (ms), with step 50.', 'ohio-extra' ),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Appear Effect', 'ohio-extra' ),
				'heading' => __( 'Animation delay', 'ohio-extra' ),
				'param_name' => 'appearance_delay',
				'description' => __( 'A delay before animation, accepted values are in range from 50 to 3000 (ms), with a step of 50.', 'ohio-extra' ),
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'Appear Effect', 'ohio-extra' ),
				'heading' => __( 'Animation repeat', 'ohio-extra' ),
				'description' => 'Repeat animation while scrolling page up and down',
				'param_name' => 'appearance_once',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				)
			),
		)
	);
}