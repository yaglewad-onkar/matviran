<?php

/**
* WPBakery Page Builder Ohio Video shortcode params
*/

vc_lean_map( 'ohio_video', 'ohio_video_sc_map' );

function ohio_video_sc_map() {
	return array(
		'name' => __( 'Video', 'ohio-extra' ),
		'description' => __( 'Popup video module', 'ohio-extra' ),
		'base' => 'ohio_video',
		'category' => __( 'Ohio', 'ohio-extra' ),
		'icon' => OHIO_EXTRA_DIR_URL . 'assets/images/shortcodes/video_icon.svg',
		'params' => array(

			// General
			array(
				'type' => 'ohio_choose_box',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Video layout', 'ohio-extra' ),
				'param_name' => 'layout',
				'value' => array(
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_076.svg',
						'key' => 'boxed_shape',
						'title' => __( 'Default', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_075.svg',
						'key' => 'with_preview',
						'title' => __( 'With preview', 'ohio-extra' ),
					)
				)
			),
			array(
				'type' => 'ohio_choose_box',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Video button layout', 'ohio-extra' ),
				'param_name' => 'button_layout',
				'value' => array(
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_073.svg',
						'key' => 'filled',
						'title' => __( 'Filled', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_074.svg',
						'key' => 'outline',
						'title' => __( 'Outline', 'ohio-extra' ),
					),
				),
			),
			array(
				'type' => 'attach_image',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Preview image', 'ohio-extra' ),
				'param_name' => 'preview_image',
				'dependency' => array(
					'element' => 'layout',
					'value' => array(
						'with_preview'
					)
				)
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Alignment', 'ohio-extra' ),
				'param_name' => 'alignment',
				'value' => array(
					__( 'Left', 'ohio-extra' ) => 'left',
					__( 'Center', 'ohio-extra' ) => 'center',
					__( 'Right', 'ohio-extra' ) => 'right'
				),
				'std' => 'center',
				'dependency' => array(
					'element' => 'layout',
					'value' => array(
						'boxed_shape',
						'outline'
					)
				),
			),
			array(
				'type' => 'textarea_raw_html',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Video title', 'ohio-extra' ),
				'param_name' => 'title',
				'value' => '',
				'description' => __( 'HTML allowed.', 'ohio-extra' )
			),
			array(
				'type' => 'textfield',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Video URL', 'ohio-extra' ),
				'param_name' => 'link',
				'value' => '',
				'description' => 'E.g. https://www.youtube.com/watch?v=t67_zAg5vvI'
			),

			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Autoplay', 'ohio-extra' ),
				'param_name' => 'autoplay_option',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '0'
				),
			),

			// Typography
			array(
				'type' => 'ohio_divider',
				'group' => __( 'Typography', 'ohio-extra' ),
				'param_name' => 'typo_tab_divider_title',
				'value' => __( 'Title', 'ohio-extra' ),
				'dependency' => array(
					'element' => 'layout',
					'value' => array(
						'boxed_shape',
						'outline'
					)
				)
			),
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Typography', 'ohio-extra' ),
				'param_name' => 'title_typo',
				'dependency' => array(
					'element' => 'layout',
					'value' => array(
						'boxed_shape',
						'outline'
					)
				)
			),
			
			// Style
			array(
				'type' => 'ohio_divider',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'param_name' => 'style_tab_divider_button',
				'value' => __( 'Button', 'ohio-extra' )
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'heading' => __( 'Use "Call to action" animation?', 'ohio-extra' ),
				'param_name' => 'button_anim',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '0'
				),
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'heading' => __( 'Button color', 'ohio-extra' ),
				'param_name' => 'button_color'
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'heading' => __( 'Button color on hover', 'ohio-extra' ),
				'param_name' => 'button_hover_color'
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'heading' => __( 'Icon color', 'ohio-extra' ),
				'param_name' => 'icon_color'
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'heading' => __( 'Icon color on hover', 'ohio-extra' ),
				'param_name' => 'icon_hover_color'
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'heading' => __( 'Border color', 'ohio-extra' ),
				'param_name' => 'border_color',
				'dependency' => array(
					'element' => 'layout',
					'value' => array(
						'outline'
					)
				)
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