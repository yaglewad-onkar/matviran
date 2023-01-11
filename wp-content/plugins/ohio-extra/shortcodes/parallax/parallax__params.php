<?php

/**
* WPBakery Page Builder Ohio Parallax shortcode params
*/

vc_lean_map( 'ohio_parallax', 'ohio_parallax_sc_map' );

function ohio_parallax_sc_map() {
	return array(
		'name' => __( 'Parallax', 'ohio-extra' ),
		'description' => __( 'Parallax block', 'ohio-extra' ),
		'base' => 'ohio_parallax',
		'category' => __( 'Ohio', 'ohio-extra' ),
		"content_element" => true,
		"is_container" => true,
		"js_view" => 'VcColumnView',
		'icon' => OHIO_EXTRA_DIR_URL . 'assets/images/shortcodes/parallax_icon.svg',
		'params' => array(

			// General

			array(
				'type' => 'dropdown',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Parallax type', 'ohio-extra' ),
				'param_name' => 'parallax',
				'value' => array(
					__( 'Vertical', 'ohio-extra' ) => 'vertical',
					__( 'Horizontal', 'ohio-extra' ) => 'horizontal'
				),
			),
			array(
				'type' => 'attach_image',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Image', 'ohio-extra' ),
				'param_name' => 'image',
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Background size', 'ohio-extra' ),
				'param_name' => 'size',
				'value' => array(
					__( 'Auto', 'ohio-extra' ) => '',
					__( 'Contain', 'ohio-extra' ) => 'contain',
					__( 'Cover', 'ohio-extra' )   => 'cover',
					__( 'auto 100%', 'ohio-extra' )  => 'auto 100%',
					__( '100% auto', 'ohio-extra' )  => '100% auto',
					__( '100% 100%', 'ohio-extra' )  => '100% 100%',
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Parallax speed', 'ohio-extra' ),
				'param_name' => 'parallax_speed',
				'description' => __( 'Parallax speed (default 1.0).', 'ohio-extra' ),
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Use overlay?', 'ohio-extra' ),
				'param_name' => 'use_overlay',
				'value' => array(
					__( 'Yes, sure', 'ohio-extra' ) => '0'
				)
			),
			array(
				'type' => 'colorpicker',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Overlay color', 'ohio-extra' ),
				'param_name' => 'overlay_color',
				'dependency' => array(
					'element' => 'use_overlay',
					'value' => '1'
				),
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
	class WPBakeryShortCode_Ohio_Parallax extends WPBakeryShortCodesContainer {
		
	}
}