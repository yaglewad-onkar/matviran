<?php

/**
* WPBakery Page Builder Ohio Recent Projects shortcode params
*/

vc_lean_map( 'ohio_recent_projects', 'ohio_recent_projects_sc_map' );

function ohio_recent_projects_sc_map() {
	return array(
		'name' => __( 'Portfolio Projects', 'ohio-extra' ),
		'description' => __( 'Block with portfolio projects', 'ohio-extra' ),
		'base' => 'ohio_recent_projects',
		'category' => __( 'Ohio', 'ohio-extra' ),
		'icon' => OHIO_EXTRA_DIR_URL . 'assets/images/shortcodes/recent_projects_icon.svg',
		'params' => array(

			// General
			array(
				'type' => 'ohio_choose_box',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Portfolio layout', 'ohio-extra' ),
				'param_name' => 'card_layout',
				'value' => array(
					array(
						'icon' => plugin_dir_url( __FILE__ ) . '/images/acf__image_portfolio_01.svg',
						'key' => 'grid_1',
						'title' => __( 'Classic grid', 'ohio-extra' )
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/acf__image_portfolio_02.svg',
						'key' => 'grid_2',
						'title' => __( 'Minimal grid', 'ohio-extra' )
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/acf__image_portfolio_43.svg',
						'key' => 'grid_11',
						'title' => __( 'Caption cursor grid', 'ohio-extra' )
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/acf__image_portfolio_03.svg',
						'key' => 'grid_3',
						'title' => __( 'Slider with horizontal scroll', 'ohio-extra' )
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/acf__image_portfolio_04.svg',
						'key' => 'grid_4',
						'title' => __( 'Slider with vertical scroll', 'ohio-extra' )
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/acf__image_portfolio_05.svg',
						'key' => 'grid_5',
						'title' => __( 'Split screen with smooth scroll', 'ohio-extra' )
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/acf__image_portfolio_06.svg',
						'key' => 'grid_6',
						'title' => __( 'Carousel with horizontal scroll', 'ohio-extra' )
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/acf__image_portfolio_07.svg',
						'key' => 'grid_7',
						'title' => __( 'Onepage with smooth scroll', 'ohio-extra' )
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/acf__image_portfolio_42.svg',
						'key' => 'grid_8',
						'title' => __( 'Interactive links', 'ohio-extra' )
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/acf__image_portfolio_37.svg',
						'key' => 'grid_9',
						'title' => __( 'Scattered with smooth scroll', 'ohio-extra' )
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/acf__image_portfolio_38.svg',
						'key' => 'grid_10',
						'title' => __( 'Centered with smooth scroll', 'ohio-extra' )
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/acf__image_portfolio_45.svg',
						'key' => 'grid_12',
						'title' => __( 'Vertical interactive links', 'ohio-extra' )
					)
				)
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Project card hover effect', 'ohio-extra' ),
				'param_name' => 'hover_effect',
				'value' => array(
					__( 'Inherit from Theme Settings', 'ohio-extra' ) => 'inherit',
					__( 'Image Scaling', 'ohio-extra' ) => 'type1',
					__( 'Color Overlay', 'ohio-extra' ) => 'type2',
					__( 'Greyscale', 'ohio-extra' ) => 'type3',
					__( 'Image Parallax', 'ohio-extra' ) => 'type4',
				),
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'grid_1',
						'grid_11',
						'grid_2'
					)
				)
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Tilt hover effect', 'ohio-extra' ),
				'param_name' => 'tilt_effect',
				'description' => '',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				),
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'grid_3',
						'grid_4',
						'grid_5',
						'grid_6',
						'grid_7',
						'grid_9',
						'grid_10'
					)
				)
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Portfolio thumbnail size', 'ohio-extra' ),
				'param_name' => 'portfolio_images_size',
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
				'type' => 'ohio_portfolio_types',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Portfolio categories', 'ohio-extra' ),
				'param_name' => 'projects_category',
				'value' => ''
			),

			array(
				'type' => 'ohio_divider',
				'group' => __( 'General', 'ohio-extra' ),
				'param_name' => 'card_title',
				'value' => __( 'Project Cards / Slides', 'ohio-extra' ),
			),

			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Fullscreen mode', 'ohio-extra' ),
				'param_name' => 'fullscreen_mode',
				'description' => __( 'If checked, the slider is fullscreen', 'ohio-extra' ),
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				),
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'grid_3',
						'grid_4',
						'grid_5',
						'grid_6',
						'grid_7',
						'grid_8',
						'grid_9',
						'grid_10',
						'grid_12',
					)
				)
			),

			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Navigation visibility', 'ohio-extra' ),
				'param_name' => 'navigation_visibility',
				'description' => '',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '0'
				),
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'grid_3',
						'grid_4',
						'grid_5',
						'grid_6',
						'grid_7',
						'grid_9',
						'grid_10'
					)
				)
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Loop mode', 'ohio-extra' ),
				'param_name' => 'loop_mode',
				'description' => '',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '0'
				),
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'grid_3',
						'grid_4',
						'grid_5',
						'grid_6',
						'grid_7',
						'grid_9',
						'grid_10'
					)
				)
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Autoplay mode', 'ohio-extra' ),
				'param_name' => 'autoplay_mode',
				'description' => '',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '0'
				),
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'grid_3',
						'grid_4',
						'grid_5',
						'grid_6',
						'grid_7',
						'grid_9',
						'grid_10'
					)
				)
			),

			array(
				'type' => 'textfield',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Autoplay interval timeout', 'ohio-extra' ),
				'param_name' => 'autoplay_interval',
				'description' => __( 'Autoplay interval timeout. By default 3000', 'ohio-extra' ),
				'value' => '3000',
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'grid_3',
						'grid_4',
						'grid_5',
						'grid_6',
						'grid_7',
						'grid_9',
						'grid_10'
					),
					'element' => 'autoplay_mode',
					'value' => array(
						'1'
					)
				)
			),

			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Mousewheel scroll', 'ohio-extra' ),
				'param_name' => 'mousewheel_scroll',
				'description' => '',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '0'
				),
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'grid_3',
						'grid_4',
						'grid_5',
						'grid_6',
						'grid_7',
						'grid_9',
						'grid_10'
					)
				)
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Bullets visibility', 'ohio-extra' ),
				'param_name' => 'bullets_visibility',
				'description' => '',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '0'
				),
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'grid_3',
						'grid_4',
						'grid_5',
						'grid_6',
						'grid_7',
						'grid_9',
						'grid_10'
					)
				)
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Metro style', 'ohio-extra' ),
				'param_name' => 'metro_style',
				'description' => '',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '0'
				),
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'grid_1',
						'grid_11',
						'grid_2'
					)
				)
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Boxed layout', 'ohio-extra' ),
				'param_name' => 'card_boxed_layout',
				'description' => '',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '0'
				),
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'grid_1',
						'grid_11',
						'grid_2'
					)
				)
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Portfolio grid spacing', 'ohio-extra' ),
				'param_name' => 'item_spacing',
				'description' => 'If checked, you can set the amount of space between tiles',
				'value' => array(
					__( 'Enabled', 'ohio-extra' ) => '1'
				),
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'grid_1',
						'grid_2',
						'grid_8',
						'grid_11'
					)
				)
			),
			array(
				'type' => 'textfield',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Portfolio grid spacing value', 'ohio-extra' ),
				'param_name' => 'grid_items_gap',
				'description' => __( 'CSS value.', 'ohio-extra' ),
				'value' => '20px',
				'dependency' => array(
					'element' => 'item_spacing',
					'value' => array(
						'1'
					)
				)
			),
			
			array(
				'type' => 'dropdown',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Portfolio video button style', 'ohio-extra' ),
				'param_name' => 'portfolio_video_button_style',
				'value' => array(
					__( 'Default', 'ohio-extra' ) => 'default',
					__( 'Outline', 'ohio-extra' ) => 'outline',

				)
			),

			// Grid
			array(
				'type' => 'ohio_divider',
				'group' => __( 'Grid', 'ohio-extra' ),
				'param_name' => 'number_title',
				'value' => __( 'Number of Projects', 'ohio-extra' ),
			),

			array(
				'type' => 'textfield',
				'group' => __( 'Grid', 'ohio-extra' ),
				'heading' => __( 'Portfolio items per page', 'ohio-extra' ),
				'description' => __( 'Chose the number of projects in the block.', 'ohio-extra' ),
				'param_name' => 'projects_in_block_pagination',
				'value' => '4',
			),
			array(
				'type' => 'ohio_divider',
				'group' => __( 'Grid', 'ohio-extra' ),
				'param_name' => 'row_items_title',
				'value' => __( 'Portfolio items per row', 'ohio-extra' ),
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'grid_1',
						'grid_2',
						'grid_6',
						'grid_11',
					)
				),
			),
			array(
				'type' => 'ohio_columns',
				'group' => __( 'Grid', 'ohio-extra' ),
				'param_name' => 'columns_in_row',
				'std' => '2-2-1',
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'grid_1',
						'grid_2',
						'grid_6',
						'grid_11',
					)
				),
			),
			array(
				'type' => 'ohio_divider',
				'group' => __( 'Grid', 'ohio-extra' ),
				'param_name' => 'appear_effect_title',
				'value' => __( 'Grid Appear Effect', 'ohio-extra' ),
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'grid_1',
						'grid_2',
						'grid_8',
						'grid_11',
						'grid_12',
					)
				),
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
				),
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'grid_1',
						'grid_2',
						'grid_8',
						'grid_11',
						'grid_12',
					)
				),
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
				),
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'grid_1',
						'grid_2',
						'grid_8',
						'grid_11',
						'grid_12',
					)
				),
			),
			array(
				'type' => 'ohio_divider',
				'group' => __( 'Grid', 'ohio-extra' ),
				'param_name' => 'filter_bar_title',
				'value' => __( 'Portfolio Filter Bar', 'ohio-extra' ),
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'grid_1',
						'grid_2',
						'grid_8',
						'grid_11',
						'grid_12',
					)
				),
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'Grid', 'ohio-extra' ),
				'heading' => __( 'Category filter visibility', 'ohio-extra' ),
				'param_name' => 'show_projects_filter',
				'description' => '',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				),
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'grid_1',
						'grid_2',
						'grid_8',
						'grid_11',
						'grid_12',
					)
				),
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'Grid', 'ohio-extra' ),
				'heading' => __( 'Category filter position', 'ohio-extra' ),
				'param_name' => 'filter_align',
				'value' => array(
					__( 'Left', 'ohio-extra' ) => 'left',
					__( 'Center', 'ohio-extra' ) => 'center',
					__( 'Right', 'ohio-extra' ) => 'right',
				),
				'std' => 'center',
				'dependency' => array(
					'element' => 'show_projects_filter',
					'value' => array(
						'1'
					)
				)
			),
			array(
				'type' => 'ohio_divider',
				'group' => __( 'Grid', 'ohio-extra' ),
				'param_name' => 'portfolio_pagination_title',
				'value' => __( 'Pagination', 'ohio-extra' ),
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'grid_1',
						'grid_2',
						'grid_8',
						'grid_11',
						'grid_12',
					)
				),
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'Grid', 'ohio-extra' ),
				'heading' => __( 'Enable pagination', 'ohio-extra' ),
				'param_name' => 'use_pagination',
				'description' => '',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '0'
				),
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'grid_1',
						'grid_2',
						'grid_8',
						'grid_11',
						'grid_12',
					)
				),
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
				'std' => 'left',
				'dependency' => array(
					'element' => 'use_pagination',
					'value' => array(
						'1'
					)
				)
			),

			// Lightbox Settings
			array(
				'type' => 'ohio_check',
				'group' => __( 'Lightbox', 'ohio-extra' ),
				'heading' => __( 'Lightbox visibility', 'ohio-extra' ),
				'description' => 'To find more portfolio lightbox options navigate to global <a target="_blank" href="./admin.php?page=ohio_hub_settings&options_page=theme-general-portfolio">Theme Settings</a>',
				'param_name' => 'lightbox_visibility',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				)
			),

			// Typography
			array(
				'type' => 'ohio_divider',
				'group' => __( 'Typography', 'ohio-extra' ),
				'param_name' => 'title_typo_divider',
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
				'param_name' => 'category_typo_divider',
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
				'param_name' => 'date_typo_divider',
				'value' => __( 'Date typography', 'ohio-extra' ),
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'grid_3',
						'grid_4',
						'grid_5',
						'grid_6',
						'grid_7',
						'grid_8',
						'grid_12',
					)
				),
			),
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Typography', 'ohio-extra' ),
				'param_name' => 'date_typo',
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'grid_3',
						'grid_4',
						'grid_5',
						'grid_6',
						'grid_7',
						'grid_8',
						'grid_12',
					)
				),
			),
			array(
				'type' => 'ohio_divider',
				'group' => __( 'Typography', 'ohio-extra' ),
				'param_name' => 'short_description_divider',
				'value' => __( 'Short Description typography', 'ohio-extra' ),
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'grid_3',
						'grid_4',
						'grid_5',
						'grid_6',
						'grid_7',
						'grid_8',
						'grid_12',
					)
				),
			),
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Typography', 'ohio-extra' ),
				'param_name' => 'short_description_typo',
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'grid_3',
						'grid_4',
						'grid_5',
						'grid_6',
						'grid_7',
						'grid_8',
						'grid_12',
					)
				),
			),
			array(
				'type' => 'ohio_divider',
				'group' => __( 'Typography', 'ohio-extra' ),
				'param_name' => 'link_divider',
				'value' => __( 'Project link typography', 'ohio-extra' ),
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'grid_3',
						'grid_4',
						'grid_5',
						'grid_6',
						'grid_7',
						'grid_8',
						'grid_12',
					)
				),
			),
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Typography', 'ohio-extra' ),
				'param_name' => 'link_typo',
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'grid_3',
						'grid_4',
						'grid_5',
						'grid_6',
						'grid_7',
						'grid_8',
						'grid_12',
					)
				),
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
				'heading' => __( 'Background color', 'ohio-extra' ),
				'param_name' => 'background_color',
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'grid_1',
						'grid_3',
						'grid_4',
						'grid_5',
						'grid_6',
						'grid_7',
						'grid_9',
						'grid_10'
					)
				)
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'heading' => __( 'Overlay color', 'ohio-extra' ),
				'param_name' => 'overlay_color'
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'heading' => __( 'Video button color', 'ohio-extra' ),
				'param_name' => 'video_btn_color',
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'grid_1',
						'grid_2',
						'grid_3',
						'grid_4',
						'grid_5',
						'grid_6',
						'grid_7',
						'grid_9',
						'grid_10',
						'grid_11',
					)
				)
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'heading' => __( 'Text background color', 'ohio-extra' ),
				'param_name' => 'description_overlay_color',
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'grid_11'
					)
				)
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'heading' => __( 'Navigation buttons color', 'ohio-extra' ),
				'param_name' => 'nav_btn_color',
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'grid_3',
						'grid_4',
						'grid_5',
						'grid_6',
						'grid_7',
						'grid_9',
						'grid_10'
					)
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