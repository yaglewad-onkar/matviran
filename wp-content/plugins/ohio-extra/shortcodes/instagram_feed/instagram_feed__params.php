<?php

/**
* WPBakery Page Builder Ohio Instagram Feed shortcode params
*/

vc_lean_map( 'ohio_instagram_feed', 'ohio_instagram_feed_sc_map' );

function ohio_instagram_feed_sc_map() {
	return array(
		'name' => __( 'Instagram Feed', 'ohio-extra' ),
		'description' => __( 'Instagram feed module', 'ohio-extra' ),
		'base' => 'ohio_instagram_feed',
		'category' => __( 'Ohio', 'ohio-extra' ),
		'icon' => OHIO_EXTRA_DIR_URL . 'assets/images/shortcodes/instagram_icon.svg',
		'params' => array(

			// General
			array(
				'type' => 'text',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Usage note:', 'ohio-extra' ),
				'param_name' => 'photo_count',
				'description' => __( 'To use the shortcode please firstly install <a target="_blank" href="/wp-admin/plugins.php">Instagram Feed</a> from the recommended plugins. Then connect your Instagram account in the plugin\'s <a target="_blank" href="/wp-admin/admin.php?page=sb-instagram-feed">settings</a>.', 'ohio-extra' ),
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Show username?', 'ohio-extra' ),
				'param_name' => 'header',
				'value' => array(
					'Yes' => true
				),
				'default' => '0',
			),
			array(
				'type' => 'textfield',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Number of photos', 'ohio-extra' ),
				'param_name' => 'photo_count',
				'description' => __( 'Default 6. We recommend using a number that is suitable for the number of columns.', 'ohio-extra' ),
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Columns', 'ohio-extra' ),
				'param_name' => 'columns',
				'value' => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
					'6' => '6',
					'12' => '12',
				),
				'default' => '6',
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Remove columns gap?', 'ohio-extra' ),
				'param_name' => 'columns_gap',
				'value' => array(
					'Yes' => '0'
				),
				'default' => '6',
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