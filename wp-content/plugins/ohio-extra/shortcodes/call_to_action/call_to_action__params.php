<?php

/**
* WPBakery Page Builder Ohio Call To Action shortcode params
*/

vc_lean_map( 'ohio_call_to_action', 'ohio_call_to_action_sc_map' );

function ohio_call_to_action_sc_map() {
	return array(
		'name' => __( 'Call To Action', 'ohio-extra' ),
		'description' => __( 'Call to action block', 'ohio-extra' ),
		'base' => 'ohio_call_to_action',
		'category' => __( 'Ohio', 'ohio-extra' ),
		'icon' => OHIO_EXTRA_DIR_URL . 'assets/images/shortcodes/call_to_action_icon.svg',
		'params' => array(
			// General
			array(
				'type' => 'textarea_raw_html',
				'holder' => 'div class="ohio_heading_VC_gap"',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Title', 'ohio-extra' ),
				'param_name' => 'title',
				'description' => __( 'HTML allowed.', 'ohio-extra' ),
			),
			array(
				'type' => 'textarea_raw_html',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Subtitle', 'ohio-extra' ),
				'param_name' => 'subtitle',
				'description' => __( 'HTML allowed.', 'ohio-extra' ),
			),

			// Link
			array(
				'type' => 'vc_link',
				'group' => __( 'Link', 'ohio-extra' ),
				'heading' => __( 'Link', 'ohio-extra' ),
				'param_name' => 'link',
				'description' => __( 'Fill title field to change the \'Get started\' label.', 'ohio-extra' ),
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'Link', 'ohio-extra' ),
				'heading' => __( 'Add icon?', 'ohio-extra' ),
				'param_name' => 'icon_use',
				'value' => array(
					__( 'Yes, sure', 'ohio-extra' ) => '0'
				),
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'Link', 'ohio-extra' ),
				'heading' => __( 'Icon position', 'ohio-extra' ),
				'param_name' => 'icon_position',
				'std' => 'left',
				'value' => array(
					__( 'Left', 'ohio-extra' ) => 'left',
					__( 'Right', 'ohio-extra' ) => 'right',
				),
				'dependency' => array(
					'element' => 'icon_use',
					'value' => '1'
				)
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'Link', 'ohio-extra' ),
				'heading' => __( 'Icon type', 'ohio-extra' ),
				'param_name' => 'icon_type',
				'value' => array(
					__( 'Font icon', 'ohio-extra' ) => 'font_icon',
					__( 'Custom image', 'ohio-extra' ) => 'user_image'
				),
				'dependency' => array(
					'element' => 'icon_use',
					'value' => '1'
				)
			),
			array(
				'type' => 'ohio_icon_picker',
				'group' => __( 'Link', 'ohio-extra' ),
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
				'group' => __( 'Link', 'ohio-extra' ),
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
				'param_name' => 'typo_tab_divider_title',
				'value' => __( 'Title', 'ohio-extra' ),
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
				'value' => __( 'Subtitle', 'ohio-extra' )
			),
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Typography', 'ohio-extra' ),
				'param_name' => 'subtitle_typo'
			),

			// Style
			array(
				'type' => 'ohio_check',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'heading' => __( 'Show without side paddings', 'ohio-extra' ),
				'param_name' => 'without_side_paddings',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '0'
				),
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'heading' => __( 'Background color', 'ohio-extra' ),
				'param_name' => 'bg_color',
			),
			array(
				'type' => 'ohio_divider',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'param_name' => 'style_tab_divider_readmore',
				'value' => __( 'Button', 'ohio-extra' ),
			),
			array(
				'type' => 'ohio_button',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'param_name' => 'readmore_button',
				'button_full_disabled' => 'true'
			),
			array(
				'type' => 'ohio_divider',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'param_name' => 'style_tab_divider_other',
				'value' => __( 'Other', 'ohio-extra' ),
			),
			
			// Custom CSS Class
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