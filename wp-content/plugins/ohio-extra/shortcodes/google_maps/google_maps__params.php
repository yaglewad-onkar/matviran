<?php

/**
* WPBakery Page Builder Ohio Google Maps shortcode params
*/

vc_lean_map( 'ohio_google_maps', 'ohio_google_maps_sc_map' );

function ohio_google_maps_sc_map() {
	return array(
		'name' => __( 'Google Maps', 'ohio-extra' ),
		'description' => __( 'Google Maps block', 'ohio-extra' ),
		'base' => 'ohio_google_maps',
		'category' => __( 'Ohio', 'ohio-extra' ),
		'icon' => OHIO_EXTRA_DIR_URL . 'assets/images/shortcodes/google_maps_icon.svg',
		'params' => array(

			// General

			array(
				'type' => 'ohio_choose_box',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Map layout', 'ohio-extra' ),
				'param_name' => 'map_style',
				'value' => array(
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_inherit.svg',
						'key' => 'default',
						'title' => __( 'Default', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/maps/light_dream.png',
						'key' => 'light_dream',
						'title' => __( 'Light Dream', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/maps/shades_of_grey.png',
						'key' => 'shades_of_grey',
						'title' => __( 'Dark', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/maps/paper.png',
						'key' => 'paper',
						'title' => __( 'Paper', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/maps/light_monochrome.png',
						'key' => 'light_monochrome',
						'title' => __( 'Monochrome', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/maps/lunar_landscape.png',
						'key' => 'lunar_landscape',
						'title' => __( 'Lunar', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/maps/routexl.png',
						'key' => 'routexl',
						'title' => __( 'Routexl', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/maps/flat_pale.png',
						'key' => 'flat_pale',
						'title' => __( 'Flat Pale', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/maps/flat_design.png',
						'key' => 'flat_design',
						'title' => __( 'Flat Design', 'ohio-extra' ),
					)
				)
			),
			array(
				'type' => 'textarea',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Location coordinates', 'ohio-extra' ),
				'param_name' => 'marker_locations',
				'description' => __( 'Use several locations by placing coordinates in separate rows. (e.g. 55.6925218, 12.5199567)', 'ohio-extra' ),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Map height', 'ohio-extra' ),
				'param_name' => 'map_height',
				'description' => __( 'Enter map height (in pixels or leave empty for responsive map).', 'ohio-extra' ),
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Show Zoom control', 'ohio-extra' ),
				'param_name' => 'map_zoom_enable',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '0'
				),
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Show Street View control', 'ohio-extra' ),
				'param_name' => 'map_street_enable',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '0'
				),
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Show Map Type control', 'ohio-extra' ),
				'param_name' => 'map_type_enable',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '0'
				),
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Show Fullscreen control', 'ohio-extra' ),
				'param_name' => 'map_fullscreen_enable',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '0'
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Map zoom', 'ohio-extra' ),
				'param_name' => 'map_zoom',
				'description' => __( 'Map zoom level (min - 1, max - 20, default - 14)', 'ohio-extra' ),
			),

			// Styles

			array(
				'type' => 'attach_image',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'heading' => __( 'Custom marker', 'ohio-extra' ),
				'param_name' => 'map_marker',
				'description' => __( 'Choose marker image.', 'ohio-extra' ),
			),
		)
	);
}