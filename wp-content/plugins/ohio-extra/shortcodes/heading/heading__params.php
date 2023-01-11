<?php

/**
* WPBakery Page Builder Ohio Heading shortcode params
*/

vc_lean_map( 'ohio_heading', 'ohio_heading_sc_map' );

function ohio_heading_sc_map() {
	return array(
		'name' => __( 'Heading', 'ohio-extra' ),
		'description' => __( 'Headnig block', 'ohio-extra' ),
		'base' => 'ohio_heading',
		'category' => __( 'Ohio', 'ohio-extra' ),
		'icon' => OHIO_EXTRA_DIR_URL . 'assets/images/shortcodes/heading_icon.svg',
		'params' => array(
			// General
			array(
				'type' => 'ohio_choose_box',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Heading layout', 'ohio-extra' ),
				'param_name' => 'subtitle_type_layout',
				'value' => array(
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_035.svg',
						'key' => 'bottom_subtitle',
						'title' => __( 'Bottom Subtitle', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_038.svg',
						'key' => 'top_subtitle',
						'title' => __( 'Top Subtitle', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_039.svg',
						'key' => 'without_subtitle',
						'title' => __( 'Without Subtitle', 'ohio-extra' ),
					)
				)
			),
			array(
				'type' => 'ohio_choose_box',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Content alignment', 'ohio-extra' ),
				'param_name' => 'module_type_layout',
				'value' => array(
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_036.svg',
						'key' => 'on_middle',
						'title' => __( 'Center', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_035.svg',
						'key' => 'on_left',
						'title' => __( 'Left', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_037.svg',
						'key' => 'on_right',
						'title' => __( 'Right', 'ohio-extra' ),
					)
				)
			),
			array(
				'type' => 'textarea_raw_html',
				'holder' => 'div class="ohio_heading_VC_gap"',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Title', 'ohio-extra' ),
				'param_name' => 'title',
				'description' => __( 'Enter block title (<b>HTML allowed</b>).', 'ohio-extra' ),
			),
			array(
				'type' => 'textarea_raw_html',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Subtitle', 'ohio-extra' ),
				'param_name' => 'subtitle',
				'description' => __( 'Enter block subtitle (<b>HTML allowed</b>).', 'ohio-extra' ),
				'dependency' => array(
					'element' => 'subtitle_type_layout',
					'value' => array(
						'bottom_subtitle',
						'top_subtitle'
					)
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Subtitle offset', 'ohio-extra' ),
				'param_name' => 'subtitle_offset',
				'description' => __( 'CSS value.', 'ohio-extra' ),
				'std' => '15px',
				'dependency' => array(
					'element' => 'subtitle_type_layout',
					'value' => array(
						'bottom_subtitle',
						'top_subtitle'
					)
				),
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Heading tag', 'ohio-extra' ),
				'param_name' => 'heading_type',
				'description' => __( 'Select the tag in which the title will be displayed.', 'ohio-extra' ),
				'value' => array(
					__( '<h1>', 'ohio-extra' ) => 'h1',
					__( '<h2>', 'ohio-extra' ) => 'h2',
					__( '<h3>', 'ohio-extra' ) => 'h3',
					__( '<h4>', 'ohio-extra' ) => 'h4',
					__( '<h5>', 'ohio-extra' ) => 'h5',
					__( '<h6>', 'ohio-extra' ) => 'h6'
				),
				'std' => 'h3',
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Show divider?', 'ohio-extra' ),
				'description' => __( 'If checked then divider will be hidden.', 'ohio-extra' ),
				'param_name' => 'divider_visible',
				'value' => array(
					'Yes' => '0'
				),
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Divider position', 'ohio-extra' ),
				'param_name' => 'divider_alignment',
				'value' => array(
					__( 'Before title', 'ohio-extra' ) => 'before_title',
					__( 'After title', 'ohio-extra' ) => 'after_title'
				),
				'std' => 'before_title',
				'dependency' => array(
					'element' => 'divider_visible',
					'value' => array(
						'1'
					)
				),
			),

			// Typography
			array(
				'type' => 'ohio_divider',
				'group' => __( 'Typography', 'ohio-extra' ),
				'param_name' => 'typo_tab_divider_title',
				'value' => __( 'Title typography', 'ohio-extra' ),
			),
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Typography', 'ohio-extra' ),
				'param_name' => 'title_typo',
			),
			array(
				'type' => 'ohio_divider',
				'group' => __( 'Typography', 'ohio-extra' ),
				'param_name' => 'typo_tab_divider_subtitle',
				'value' => __( 'Subtitle typography', 'ohio-extra' ),
				'dependency' => array(
					'element' => 'subtitle_type_layout',
					'value' => array(
						'bottom_subtitle',
						'top_subtitle'
					)
				),
			),
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Typography', 'ohio-extra' ),
				'param_name' => 'subtitle_typo',
				'dependency' => array(
					'element' => 'subtitle_type_layout',
					'value' => array(
						'bottom_subtitle',
						'top_subtitle'
					)
				),
			),

			// Color settings
			array(
				'type' => 'ohio_divider',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'param_name' => 'color_settings_title',
				'value' => __( 'Color settings', 'ohio-extra' ),
				'dependency' => array(
					'element' => 'divider_visible',
					'value' => '1'
				)
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'heading' => __( 'Divider color', 'ohio-extra' ),
				'param_name' => 'divider_color',
				'dependency' => array(
					'element' => 'divider_visible',
					'value' => '1',
				),
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
		),
	);
}