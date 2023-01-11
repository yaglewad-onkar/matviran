<?php

/**
* Visual Composer Ohio Circle Progress Bar shortcode params
*/

vc_map( array(
	'name' => __( 'Circle Progress Bar', 'ohio-extra' ),
	'description' => __( 'Chart box module', 'ohio-extra' ),
	'base' => 'ohio_pie_chart',
	'category' => __( 'Ohio', 'ohio-extra' ),
	'icon' => OHIO_EXTRA_DIR_URL . 'assets/images/shortcodes/circle_progress_bar_icon.svg',
	'params' => array(

		// General
		array(
			'type' => 'ohio_choose_box',
			'group' => __( 'General', 'ohio-extra' ),
			'heading' => __( 'Pie chart layout', 'ohio-extra' ),
			'param_name' => 'layout',
			'value' => array(
				array(
					'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_046.svg',
					'key' => 'percent',
					'title' => __( 'Percent', 'ohio-extra' ),
				),
				array(
					'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_047.svg',
					'key' => 'icon',
					'title' => __( 'Icon', 'ohio-extra' ),
				)
			)
		),
		array(
			'type' => 'dropdown',
			'group' => __( 'General', 'ohio-extra' ),
			'heading' => __( 'Description position', 'ohio-extra' ),
			'param_name' => 'description_position',
			'value' => array(
				__( 'Bottom', 'ohio-extra' ) => 'bottom',
				__( 'Right', 'ohio-extra' ) => 'right',
				__( 'Left', 'ohio-extra' ) => 'left'
			)
		),
		array(
			'type' => 'textfield',
			'group' => __( 'General', 'ohio-extra' ),
			'heading' => __( 'Percent', 'ohio-extra' ),
			'param_name' => 'percent',
			'value' => '100',
			'description' => __( 'Percent of pie chart', 'ohio-extra' ),
		),
		array(
			'type' => 'textfield',
			'group' => __( 'General', 'ohio-extra' ),
			'heading' => __( 'Title', 'ohio-extra' ),
			'param_name' => 'title',
			'value' => '',
			'description' => ''
		),
		// Icon
		array(
			'type' => 'dropdown',
			'group' => __( 'Icon', 'ohio-extra' ),
			'heading' => __( 'Icon type', 'ohio-extra' ),
			'param_name' => 'icon_type',
			'value' => array(
				__( 'Font icon', 'ohio-extra' ) => 'font_icon',
				__( 'Custom image', 'ohio-extra' ) => 'user_image'
			),
			'dependency' => array(
				'element' => 'layout',
				'value' => array(
					'icon'
				)
			)
		),
		array(
			'type' => 'ohio_icon_picker',
			'group' => __( 'Icon', 'ohio-extra' ),
			'heading' => __( 'Icon', 'ohio-extra' ),
			'param_name' => 'icon_as_icon',
			'description' => __( 'Choose icon.', 'ohio-extra' ),
			'settings' => array(),
			'dependency' => array(
				'element' => 'icon_type',
				'value' => array(
					'font_icon'
				)
			)
		),
		array(
			'type' => 'attach_image',
			'group' => __( 'Icon', 'ohio-extra' ),
			'heading' => __( 'Icon image', 'ohio-extra' ),
			'param_name' => 'icon_as_image',
			'description' => __( 'Choose icon image.', 'ohio-extra' ),
			'dependency' => array(
				'element' => 'icon_type',
				'value' => array(
					'user_image'
				)
			)
		),

		// Typography
		array(
			'type' => 'ohio_divider',
			'group' => __( 'Typography', 'ohio-extra' ),
			'param_name' => 'typo_tab_divider_percent',
			'value' => __( 'Percent', 'ohio-extra' ),
		),
		array(
			'type' => 'ohio_typography',
			'group' => __( 'Typography', 'ohio-extra' ),
			'param_name' => 'percent_typo',
		),
		array(
			'type' => 'ohio_divider',
			'group' => __( 'Typography', 'ohio-extra' ),
			'param_name' => 'typo_tab_divider_title',
			'value' => __( 'Title', 'ohio-extra' ),
		),
		array(
			'type' => 'ohio_typography',
			'group' => __( 'Typography', 'ohio-extra' ),
			'param_name' => 'title_typo',
		),
		
		// Style
		array(
			'type' => 'ohio_colorpicker',
			'group' => __( 'Styles and Colors', 'ohio-extra' ),
			'heading' => __( 'Chart color', 'ohio-extra' ),
			'param_name' => 'chart_color',
		),
		
		// Custom Class
		array(
			'type' => 'textfield',
			'group' => __( 'Styles and Colors', 'ohio-extra' ),
			'heading' => __( 'Custom CSS class', 'ohio-extra' ),
			'param_name' => 'css_class',
			'description' => __( 'If you want to add styles to a specific unit, use this field to add CSS class.', 'ohio-extra' ),
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
				__( 'Fade down', 'ohio-extra' ) => 'fade-down',
				__( 'Fade right', 'ohio-extra' ) => 'fade-right',
				__( 'Fade left', 'ohio-extra' ) => 'fade-left',
				__( 'Flip up', 'ohio-extra' ) => 'flip-up',
				__( 'Flip down', 'ohio-extra' ) => 'flip-down',
				__( 'Zoom in', 'ohio-extra' ) => 'zoom-in',
				__( 'Zoom out', 'ohio-extra' ) => 'zoom-out'
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
) );