<?php

/**
* WPBakery Page Builder Ohio Contact Form shortcode params
*/

vc_lean_map( 'ohio_contact_form', 'ohio_contact_form_sc_map' );

function ohio_contact_form_sc_map() {
	$ohio_extra_cf7 = get_posts( 'post_type="wpcf7_contact_form"&numberposts=-1' );

	$ohio_extra_contact_forms = array();
	if ( $ohio_extra_cf7 ) {
		foreach ( $ohio_extra_cf7 as $cform ) {
			$ohio_extra_contact_forms[ $cform->post_title ] = $cform->ID;
		}
	} else {
		$ohio_extra_contact_forms[ __( 'No contact forms found', 'ohio-extra' ) ] = 0;
	}

	return array(
		'name' => __( 'Contact Form 7', 'ohio-extra' ),
		'description' => __( 'Contact and subscribe forms', 'ohio-extra' ),
		'base' => 'ohio_contact_form',
		'category' => __( 'Ohio', 'ohio-extra' ),
		'icon' => OHIO_EXTRA_DIR_URL . 'assets/images/shortcodes/contact_form_icon.svg',
		'params' => array(

			// General
			array(
				'type' => 'text',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Usage note:', 'ohio-extra' ),
				'param_name' => 'photo_count',
				'description' => __( 'To use the shortcode please firstly install <a target="_blank" href="/wp-admin/plugins.php">Contact Form 7</a> from the recommended plugins.', 'ohio-extra' ),
			),
			array(
				'type' => 'ohio_choose_box',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Form layout', 'ohio-extra' ),
				'param_name' => 'form_style',
				'value' => array(
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_031.svg',
						'key' => 'flat',
						'title' => __( 'Flat', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_030.svg',
						'key' => 'outline',
						'title' => __( 'Outline', 'ohio-extra' ),
					),
				)
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Form', 'ohio-extra' ),
				'param_name' => 'form_id',
				'value' => $ohio_extra_contact_forms,
			),
			array(
				'type' => 'textfield',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Fields offset', 'ohio-extra' ),
				'param_name' => 'fields_offset',
				'description' => __( 'CSS value.', 'ohio-extra' ),
				'value' => '10px'
			),
			array(
				'type' => 'ohio_divider',
				'group' => __( 'Typography', 'ohio-extra' ),
				'param_name' => 'typo_text_color_divider',
				'value' => 'Input text Typography'
			),
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Typography', 'ohio-extra' ),
				'param_name' => 'input_text_typo'
			),

			array(
				'type' => 'ohio_divider',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'param_name' => 'style_tab_divider_fields',
				'value' => __( 'Fields', 'ohio-extra' ),
			),
			array(
				'type' => 'colorpicker',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'heading' => __( 'Fields background color', 'ohio-extra' ),
				'param_name' => 'fields_color',
				'dependency' => array(
					'element' => 'form_style',
					'value' => array(
						'flat',
					)
				)
			),
			array(
				'type' => 'colorpicker',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'heading' => __( 'Fields border color', 'ohio-extra' ),
				'param_name' => 'fields_border_color',
				'dependency' => array(
					'element' => 'form_style',
					'value' => array(
						'border'
					)
				)
			),
			array(
				'type' => 'colorpicker',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'heading' => __( 'Fields focus border color', 'ohio-extra' ),
				'param_name' => 'fields_focus_border_color',
			),
			array(
				'type' => 'ohio_divider',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'param_name' => 'style_tab_divider_button',
				'value' => __( 'Button', 'ohio-extra' ),
			),
			array(
				'type' => 'ohio_button',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'param_name' => 'button',
				'value' => 'color=brand',
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'heading' => __( 'Button position', 'ohio-extra' ),
				'param_name' => 'button_position',
				'value' => array(
					__( 'Left', 'ohio-extra' ) => 'left',
					__( 'Center', 'ohio-extra' ) => 'center',
					__( 'Right', 'ohio-extra' ) => 'right'
				),
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
		)
	);
}