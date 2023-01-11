<?php

/**
* WPBakery Page Builder Ohio Clients logo shortcode params
*/

vc_lean_map( 'ohio_clients_logo', 'ohio_clients_logo_sc_map' );

function ohio_clients_logo_sc_map() {
	return array(
		'name' => __( 'Clients Logo', 'ohio-extra' ),
		'description' => __( 'Clients logo box', 'ohio-extra' ),
		'base' => 'ohio_clients_logo',
		'category' => __( 'Ohio', 'ohio-extra' ),
		'icon' => OHIO_EXTRA_DIR_URL . 'assets/images/shortcodes/clients_logo_icon.svg',
		'js_view' => 'VcOhioClientsLogoView',
		'params' => array(
			// General
			array(
				'type' => 'ohio_choose_box',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Clients logo layout', 'ohio-extra' ),
				'param_name' => 'layout_type',
				'std' => 'default',
				'value' => array(
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_027.svg',
						'key' => 'default',
						'title' => __( 'Default', 'ohio-extra' )
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_028.svg',
						'key' => 'overlay',
						'title' => __( 'Overlay', 'ohio-extra' )
					),
				)
			),
			array(
				'type' => 'attach_image',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Clients logo image', 'ohio-extra' ),
				'param_name' => 'image_logo',
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Alignment', 'ohio-extra' ),
				'param_name' => 'alignment',
				'value' => array(
					__( 'Left', 'ohio-extra' ) => 'left',
					__( 'Center', 'ohio-extra' ) => 'center',
					__( 'Right', 'ohio-extra' ) => 'right',
				)
			),
			array(
				'type' => 'textfield',
				'holder' => 'em',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Link', 'ohio-extra' ),
				'param_name' => 'link',
			),
			array(
				'type' => 'textfield',
				'holder' => 'em',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Alt attribute', 'ohio-extra' ),
				'param_name' => 'title',
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Open in new window?', 'ohio-extra' ),
				'description' => __( '', 'ohio-extra' ),
				'param_name' => 'in_new_tab',
				'value' => array(
					'Yes' => '0'
				),
			),
			array(
				'type' => 'textarea_raw_html',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Description', 'ohio-extra' ),
				'param_name' => 'description',
				'description' => __( 'Enter description text (HTML allowed).', 'ohio-extra' ),
				'dependency' => array(
					'element' => 'layout_type',
					'value' => array(
						'overlay'
					)
				),
			),

			// Typography
			array(
				'type' => 'ohio_divider',
				'group' => __( 'Typography', 'ohio-extra' ),
				'param_name' => 'typo_tab_divider_title',
				'value' => __( 'Title', 'ohio-extra' ),
				'dependency' => array(
					'element' => 'layout_type',
					'value' => array(
						'overlay'
					)
				),
			),
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Typography', 'ohio-extra' ),
				'param_name' => 'title_typo',
				'dependency' => array(
					'element' => 'layout_type',
					'value' => array(
						'overlay'
					)
				),
			),
			array(
				'type' => 'ohio_divider',
				'group' => __( 'Typography', 'ohio-extra' ),
				'param_name' => 'typo_tab_divider_description',
				'value' => __( 'Description', 'ohio-extra' ),
				'dependency' => array(
					'element' => 'layout_type',
					'value' => array(
						'overlay'
					)
				),
			),
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Typography', 'ohio-extra' ),
				'param_name' => 'description_typo',
				'dependency' => array(
					'element' => 'layout_type',
					'value' => array(
						'overlay'
					)
				),
			),


			// Color settings
			array(
				'type' => 'ohio_divider',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'param_name' => 'style_tab_divider_content',
				'value' => __( 'Color settings', 'ohio-extra' ),
				'dependency' => array(
					'element' => 'layout_type',
					'value' => array(
						'overlay'
					)
				),
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'heading' => __( 'Overlay color', 'ohio-extra' ),
				'param_name' => 'overlay_color',
				'dependency' => array(
					'element' => 'layout_type',
					'value' => array(
						'overlay'
					)
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
		)
	);
}
