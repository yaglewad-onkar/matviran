<?php

/**
* WPBakery Page Builder Ohio Pricing List shortcode params
*/

vc_lean_map( 'ohio_pricing_list', 'ohio_pricing_list_sc_map' );

function ohio_pricing_list_sc_map() {
	return array(
		'name' => __( 'Pricing List', 'ohio-extra' ),
		'description' => __( 'Pricing list module', 'ohio-extra' ),
		'base' => 'ohio_pricing_list',
		'category' => __( 'Ohio', 'ohio-extra' ),
		'icon' => OHIO_EXTRA_DIR_URL . 'assets/images/shortcodes/pricing_list_icon.svg',
		'params' => array(

			// General
			array(
				'type' => 'textfield',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Headline', 'ohio-extra' ),
				'param_name' => 'name'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Details', 'ohio-extra' ),
				'param_name' => 'indigriends'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Sale price', 'ohio-extra' ),
				'param_name' => 'sale_price'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Regular price', 'ohio-extra' ),
				'param_name' => 'regular_price'
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'New', 'ohio-extra' ),
				'param_name' => 'new',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '0'
				)
			),

			// Typography
			array(
				'type' => 'ohio_divider',
				'group' => __( 'Typography', 'ohio-extra' ),
				'param_name' => 'typo_tab_divider_name',
				'value' => __( 'Headline', 'ohio-extra' )
			),
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Typography', 'ohio-extra' ),
				'param_name' => 'title_typo',
			),
			array(
				'type' => 'ohio_divider',
				'group' => __( 'Typography', 'ohio-extra' ),
				'param_name' => 'typo_tab_divider_indigriends',
				'value' => __( 'Details', 'ohio-extra' ),
			),
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Typography', 'ohio-extra' ),
				'param_name' => 'details_typo',
			),
			array(
				'type' => 'ohio_divider',
				'group' => __( 'Typography', 'ohio-extra' ),
				'param_name' => 'typo_tab_divider_sale_price',
				'value' => __( 'Sale price', 'ohio-extra' ),
			),
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Typography', 'ohio-extra' ),
				'param_name' => 'sale_price_typo',
			),
			array(
				'type' => 'ohio_divider',
				'group' => __( 'Typography', 'ohio-extra' ),
				'param_name' => 'typo_tab_divider_regular_price',
				'value' => __( 'Regular price', 'ohio-extra' ),
			),
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Typography', 'ohio-extra' ),
				'param_name' => 'regular_price_typo',
			),
			array(
				'type' => 'ohio_divider',
				'group' => __( 'Typography', 'ohio-extra' ),
				'param_name' => 'typo_tab_divider_mark',
				'value' => __( 'Mark', 'ohio-extra' ),
				'dependency' => array(
					'element' => 'new',
					'value' => '1'
				)
			),
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Typography', 'ohio-extra' ),
				'param_name' => 'mark_typo',
				'dependency' => array(
					'element' => 'new',
					'value' => '1'
				)
			),

			// Color settings
			array(
				'type' => 'ohio_divider',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'param_name' => 'color_settings_title',
				'value' => __( 'Color settings', 'ohio-extra' ),
			),
			array(
				'type' => 'colorpicker',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'heading' => __( 'Mark background color', 'ohio-extra' ),
				'param_name' => 'mark_background_color',
				'dependency' => array(
					'element' => 'new',
					'value' => '1'
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