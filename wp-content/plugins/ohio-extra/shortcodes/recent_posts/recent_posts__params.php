<?php

/**
* WPBakery Page Builder Ohio Recent Posts shortcode params
*/

vc_lean_map( 'ohio_recent_posts', 'ohio_recent_posts_sc_map' );

function ohio_recent_posts_sc_map() {
	return array(
		'name' => __( 'Blog Posts', 'ohio-extra' ),
		'description' => __( 'Block with blog posts', 'ohio-extra' ),
		'base' => 'ohio_recent_posts',
		'category' => __( 'Ohio', 'ohio-extra' ),
		'icon' => OHIO_EXTRA_DIR_URL . 'assets/images/shortcodes/recent_posts_icon.svg',
		'params' => array(

			// General
			array(
				'type' => 'ohio_choose_box',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Blog layout', 'ohio-extra' ),
				'param_name' => 'card_layout',
				'value' => array(
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/acf__image_portfolio_01.svg',
						'key' => 'blog_grid_1',
						'title' => __( 'Classic grid', 'ohio-extra' )
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/acf__image_portfolio_02.svg',
						'key' => 'blog_grid_2',
						'title' => __( 'Minimal grid', 'ohio-extra' )
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/acf__image_portfolio_39.svg',
						'key' => 'blog_grid_3',
						'title' => __( 'Split grid', 'ohio-extra' )
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/acf__image_portfolio_40.svg',
						'key' => 'blog_grid_4',
						'title' => __( 'Inner grid', 'ohio-extra' )
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/acf__image_portfolio_41.svg',
						'key' => 'blog_grid_5',
						'title' => __( 'Compact grid', 'ohio-extra' )
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/acf__image_portfolio_44.svg',
						'key' => 'blog_grid_6',
						'title' => __( 'Simple grid', 'ohio-extra' )
					)
				)
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Blog hover effect', 'ohio-extra' ),
				'param_name' => 'hover_effect',
				'value' => array(
					__( 'Inherit from Theme Settings', 'ohio-extra' ) => 'inherit',
					__( 'Image Scaling', 'ohio-extra' ) => 'type1',
					__( 'Color Overlay', 'ohio-extra' ) => 'type2',
					__( 'Greyscale', 'ohio-extra' ) => 'type3',
					__( 'Type4', 'ohio-extra' ) => 'type4',
				),
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Metro style', 'ohio-extra' ),
				'param_name' => 'metro_style',
				'description' => __( 'Use metro layout for blog post items.', 'ohio-extra' ),
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				),
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'blog_grid_1',
						'blog_grid_2',
						'blog_grid_3',
						'blog_grid_4',
						'blog_grid_5'
					)
				)
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Blog thumbnail size', 'ohio-extra' ),
				'param_name' => 'blog_images_size',
				'value' => array(
					__( 'Inherit from Theme Settings', 'ohio-extra' ) => 'inherit',
					__( 'Thumbnail', 'ohio-extra' ) => 'thumbnail',
					__( 'Small', 'ohio-extra' ) => 'medium',
					__( 'Medium', 'ohio-extra' ) => 'medium_large',
					__( 'Large', 'ohio-extra' ) => 'large',
					__( 'Original', 'ohio-extra' ) => 'ohio_full',
				)
			),
			array(
				'type' => 'ohio_post_types',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Blog categories', 'ohio-extra' ),
				'param_name' => 'post_category',
				'value' => ''
			),
			array(
				'type' => 'ohio_divider',
				'group' => __( 'General', 'ohio-extra' ),
				'param_name' => 'card_title',
				'value' => __( 'Post Card', 'ohio-extra' ),
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Boxed layout', 'ohio-extra' ),
				'param_name' => 'card_boxed',
				'description' => __( 'Use boxed layout for blog post items.', 'ohio-extra' ),
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				)
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Short description', 'ohio-extra' ),
				'param_name' => 'short_description',
				'description' => __( 'Show short description for blog post items.', 'ohio-extra' ),
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				)
			),
			array(
				'type' => 'textfield',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Blog grid spacing value', 'ohio-extra' ),
				'param_name' => 'card_gap',
				'description' => __( 'Use CSS value.', 'ohio-extra' ),
				'value' => '',
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'blog_grid_1',
						'blog_grid_2',
						'blog_grid_3',
						'blog_grid_4',
						'blog_grid_5'
					)
				)
			),

			// Grid
			array(
				'type' => 'ohio_check',
				'group' => __( 'Grid', 'ohio-extra' ),
				'heading' => __( 'Masonry grid', 'ohio-extra' ),
				'param_name' => 'masonry_grid',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '0'
				)
			),
			// array(
			// 	'type' => 'ohio_check',
			// 	'group' => __( 'Grid', 'ohio-extra' ),
			// 	'heading' => __( 'Post asymmetric parallax grid', 'ohio-extra' ),
			// 	'param_name' => 'asymmetric_parallax',
			// 	'description' => '',
			// 	'value' => array(
			// 		__( 'Enabled', 'ohio-extra' ) => '1'
			// 	)
			// ),
			// array(
			// 	'type' => 'textfield',
			// 	'group' => __( 'Grid', 'ohio-extra' ),
			// 	'heading' => __( 'Post asymmetric parallax grid speed', 'ohio-extra' ),
			// 	'param_name' => 'asymmetric_parallax_speed',
			// 	'description' => __( 'Non-fractional number.', 'ohio-extra' ),
			// 	'value' => '20',
			// 	'dependency' => array(
			// 		'element' => 'asymmetric_parallax',
			// 		'value' => array(
			// 			'1'
			// 		)
			// 	)
			// ),
			array(
				'type' => 'ohio_divider',
				'group' => __( 'Grid', 'ohio-extra' ),
				'param_name' => 'pagination_title',
				'value' => __( 'Number of Posts', 'ohio-extra' ),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Grid', 'ohio-extra' ),
				'heading' => __( 'Blog items per page', 'ohio-extra' ),
				'description' => __( 'Chose the number of posts per page (When pagination is enabled).', 'ohio-extra' ),
				'param_name' => 'pagination_items_per_page',
				'value' => '6',
				'dependency' => array(
					'element' => 'use_pagination',
					'value' => array(
						'1'
					)
				)
			),

			array(
				'type' => 'textfield',
				'group' => __( 'Grid', 'ohio-extra' ),
				'heading' => __( 'Blog items in the block', 'ohio-extra' ),
				'param_name' => 'posts_in_block',
				'description' => __( 'Chose the number of posts in the shortcode block.', 'ohio-extra' ),
				'value' => 12
			),
			array(
				'type' => 'ohio_divider',
				'group' => __( 'Grid', 'ohio-extra' ),
				'param_name' => 'row_items_title',
				'value' => __( 'Blog items per row', 'ohio-extra' ),
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'blog_grid_1',
						'blog_grid_2',
						'blog_grid_3',
						'blog_grid_4',
						'blog_grid_5'
					)
				)
			),
			array(
				'type' => 'ohio_columns',
				'group' => __( 'Grid', 'ohio-extra' ),
				'param_name' => 'columns_in_row',
				'std' => '2-2-1',
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'blog_grid_1',
						'blog_grid_2',
						'blog_grid_3',
						'blog_grid_4',
						'blog_grid_5'
					)
				)
			),
			array(
				'type' => 'ohio_divider',
				'group' => __( 'Grid', 'ohio-extra' ),
				'param_name' => 'appear_effect_title',
				'value' => __( 'Grid Appear Effect', 'ohio-extra' ),
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'Grid', 'ohio-extra' ),
				'heading' => __( 'Grid animation', 'ohio-extra' ),
				'param_name' => 'animation_type',
				'value' => array(
					__( 'Disable animation', 'ohio-extra' ) => 'default',
					__( 'Sync animation', 'ohio-extra' ) => 'sync',
					__( 'Async animation', 'ohio-extra' ) => 'async'
				)
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'Grid', 'ohio-extra' ),
				'heading' => __( 'Grid animation effect', 'ohio-extra' ),
				'dependency' => array(
					'element' => 'animation_type',
					'value' => array(
						'sync',
						'async'
					)
				),
				'param_name' => 'animation_effect',
				'value' => array(
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
				'type' => 'ohio_divider',
				'group' => __( 'Grid', 'ohio-extra' ),
				'param_name' => 'blog_pagination_title',
				'value' => __( 'Pagination', 'ohio-extra' ),
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'Grid', 'ohio-extra' ),
				'heading' => __( 'Use pagination', 'ohio-extra' ),
				'param_name' => 'use_pagination',
				'description' => '',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '0'
				)
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'Grid', 'ohio-extra' ),
				'heading' => __( 'Pagination position', 'ohio-extra' ),
				'param_name' => 'pagination_position',
				'value' => array(
					__( 'Left', 'ohio-extra' ) => 'left',
					__( 'Center', 'ohio-extra' ) => 'center',
					__( 'Right', 'ohio-extra' ) => 'right',
				),
				'std' => 'simple',
				'dependency' => array(
					'element' => 'use_pagination',
					'value' => array(
						'1'
					)
				)
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'Grid', 'ohio-extra' ),
				'heading' => __( 'Pagination type', 'ohio-extra' ),
				'param_name' => 'pagination_type',
				'value' => array(
					__( 'Simple', 'ohio-extra' ) => 'simple',
					__( 'Standard', 'ohio-extra' ) => 'standard',
					__( 'Lazy load', 'ohio-extra' ) => 'lazy_scroll',
					__( 'Load more', 'ohio-extra' ) => 'lazy_button',
				),
				'std' => 'simple',
				'dependency' => array(
					'element' => 'use_pagination',
					'value' => array(
						'1'
					)
				)
			),

			// Typography
			array(
				'type' => 'ohio_divider',
				'group' => __( 'Typography', 'ohio-extra' ),
				'param_name' => 'typo_tab_divider_card_headline_typo',
				'value' => __( 'Heading typography', 'ohio-extra' ),
			),
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Typography', 'ohio-extra' ),
				'param_name' => 'heading_typo',
			),
			array(
				'type' => 'ohio_divider',
				'group' => __( 'Typography', 'ohio-extra' ),
				'param_name' => 'typo_tab_divider_card_heading_typo',
				'value' => __( 'Author typography', 'ohio-extra' ),
			),
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Typography', 'ohio-extra' ),
				'param_name' => 'author_typo',
			),
			array(
				'type' => 'ohio_divider',
				'group' => __( 'Typography', 'ohio-extra' ),
				'param_name' => 'typo_tab_divider_card_content_typo',
				'value' => __( 'Date typography', 'ohio-extra' ),
			),
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Typography', 'ohio-extra' ),
				'param_name' => 'date_typo',
			),
			array(
				'type' => 'ohio_divider',
				'group' => __( 'Typography', 'ohio-extra' ),
				'param_name' => 'typo_tab_divider_card_info_typo',
				'value' => __( 'Category typography', 'ohio-extra' ),
			),
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Typography', 'ohio-extra' ),
				'param_name' => 'category_typo',
			),
			array(
				'type' => 'ohio_divider',
				'group' => __( 'Typography', 'ohio-extra' ),
				'param_name' => 'typo_tab_divider_card_excerpt_typo',
				'value' => __( 'Short description typography', 'ohio-extra' ),
			),
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Typography', 'ohio-extra' ),
				'param_name' => 'excerpt_typo',
			),
			array(
				'type' => 'ohio_divider',
				'group' => __( 'Typography', 'ohio-extra' ),
				'param_name' => 'typo_tab_divider_card_read_more_typo',
				'value' => __( 'Read More typography', 'ohio-extra' ),
			),
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Typography', 'ohio-extra' ),
				'param_name' => 'read_more_typo',
			),
			array(
				'type' => 'ohio_divider',
				'group' => __( 'Typography', 'ohio-extra' ),
				'param_name' => 'typo_tab_divider_card_reading_time_typo',
				'value' => __( 'Reading time typography', 'ohio-extra' ),
			),
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Typography', 'ohio-extra' ),
				'param_name' => 'reading_time_typo',
			),

			// Color settings
			array(
				'type' => 'ohio_divider',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'param_name' => 'color_settings_title',
				'value' => __( 'Color settings', 'ohio-extra' ),
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'heading' => __( 'Card background color', 'ohio-extra' ),
				'param_name' => 'card_background_color',
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'heading' => __( 'Pagination color', 'ohio-extra' ),
				'param_name' => 'pagination_color',
				'dependency' => array(
					'element' => 'use_pagination',
					'value' => '1',
				)
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'heading' => __( 'Pagination hover and active color', 'ohio-extra' ),
				'param_name' => 'pagination_active_color',
				'dependency' => array(
					'element' => 'use_pagination',
					'value' => '1',
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