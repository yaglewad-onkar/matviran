<?php

/**
* WPBakery Page Builder Ohio Icon Box shortcode params
*/

vc_lean_map( 'ohio_icon_box', 'ohio_icon_box_sc_map' );

function ohio_icon_box_sc_map() {
	return array(
		'name' => __( 'Icon Box', 'ohio-extra' ),
		'description' => __( 'Ohio eye catching icons', 'ohio-extra' ),
		'base' => 'ohio_icon_box',
		'category' => __( 'Ohio', 'ohio-extra' ),
		'icon' => OHIO_EXTRA_DIR_URL . 'assets/images/shortcodes/icon_box_icon.svg',
		'js_view' => 'VcOhioIconBoxView',
		'custom_markup' => '{{title}}<div class="vc_ohio_icon_box-container">
				<div class="icon">%%icon%%</div>
				<div class="title">%%title%%</div>
				<div class="subtitle"></div>
				<div class="divider"></div>
				<div class="lines"><div class="line"></div><div class="line"></div><div class="line"></div></div>
				<div class="read_more"></div>
			</div>',
		'params' => array(
			// General
			array(
				'type' => 'ohio_choose_box',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Icon box layout', 'ohio-extra' ),
				'param_name' => 'box_type_layout',
				'value' => array(
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_012.svg',
						'key' => 'top_icon',
						'title' => __( 'Top Icon', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_015.svg',
						'key' => 'left_icon',
						'title' => __( 'Left Icon', 'ohio-extra' ),
					),
				)
			),
			array(
				'type' => 'ohio_choose_box',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Icon box alignment', 'ohio-extra' ),
				'param_name' => 'box_alignment',
				'dependency' => array(
					'element' => 'box_type_layout',
					'value' => array(
						'top_icon'
					)
				),
				'value' => array(
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_012.svg',
						'key' => 'center',
						'title' => __( 'Center', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_013.svg',
						'key' => 'left',
						'title' => __( 'Left', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_014.svg',
						'key' => 'right',
						'title' => __( 'Right', 'ohio-extra' ),
					)
				)
			),
			array(
				'type' => 'ohio_choose_box',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Box layout', 'ohio-extra' ),
				'param_name' => 'content_full',
				'value' => array(
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_015.svg',
						'key' => 'none',
						'title' => __( 'Float content', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_016.svg',
						'key' => 'full',
						'title' => __( 'Fullsize content', 'ohio-extra' ),
					)
				),
				'dependency' => array(
					'element' => 'box_type_layout',
					'value' => array(
						'left_icon',
						'right_icon'
					)
				)
			),
			array(
				'type' => 'textfield',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Title', 'ohio-extra' ),
				'param_name' => 'title',
				'description' => __( 'Main title for block.', 'ohio-extra' ),
			),
			array(
				'type' => 'textarea',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Description', 'ohio-extra' ),
				'param_name' => 'description',
				'description' => __( 'Description content.', 'ohio-extra' ),
			),

			// Icon
			array(
				'type' => 'ohio_choose_box',
				'group' => __( 'Icon', 'ohio-extra' ),
				'heading' => __( 'Icon layout', 'ohio-extra' ),
				'param_name' => 'icon_type_layout',
				'value' => array(
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_017.svg',
						'key' => 'default',
						'title' => __( 'Default', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_018.svg',
						'key' => 'border',
						'title' => __( 'Border', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_019.svg',
						'key' => 'fill_and_border',
						'title' => __( 'Fill and Border', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_020.svg',
						'key' => 'only_fill',
						'title' => __( 'Only Fill', 'ohio-extra' ),
					),
				)
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'Icon', 'ohio-extra' ),
				'heading' => __( 'Icon type', 'ohio-extra' ),
				'param_name' => 'icon_type',
				'value' => array(
					__( 'Font icon', 'ohio-extra' ) => 'font_icon',
					__( 'Custom image', 'ohio-extra' ) => 'user_image'
				),
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

			// Link
			array(
				'type' => 'ohio_check',
				'group' => __( 'Link', 'ohio-extra' ),
				'heading' => __( 'Use link?', 'ohio-extra' ),
				'param_name' => 'use_link',
				'description' => __( 'Select if you want to block links to some page.', 'ohio-extra' ),
				'value' => array(
					__( 'Yes, sure', 'ohio-extra' ) => '0'
				)
			),
			array(
				'type' => 'vc_link',
				'group' => __( 'Link', 'ohio-extra' ),
				'heading' => __( 'Link URL', 'ohio-extra' ),
				'param_name' => 'link_url',
				'dependency' => array(
					'element' => 'use_link',
					'value' => array(
						'1'
					)
				),
				'description' => __( 'Fill title field to change the <strong>Read More</strong> label.', 'ohio-extra' ),
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
				'param_name' => 'typo_tab_divider_description',
				'value' => __( 'Description', 'ohio-extra' ),
			),
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Typography', 'ohio-extra' ),
				'param_name' => 'description_typo',
			),

			// Style
			array(
				'type' => 'ohio_divider',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'param_name' => 'style_tab_divider_content',
				'value' => __( 'Content', 'ohio-extra' ),
			),
			array(
				'type' => 'ohio_divider',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'param_name' => 'style_tab_divider_icon',
				'value' => __( 'Icon', 'ohio-extra' ),
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'heading' => __( 'Fill color', 'ohio-extra' ),
				'param_name' => 'fill_color',
				'dependency' => array(
					'element' => 'icon_type_layout',
					'value' => array(
						'fill_and_border',
						'only_fill'
					)
				)
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'heading' => __( 'Border color', 'ohio-extra' ),
				'param_name' => 'border_color',
				'value' => 'brand',
				'dependency' => array(
					'element' => 'icon_type_layout',
					'value' => array(
						'fill_and_border',
						'border',
						'double'
					)
				)
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'heading' => __( 'Icon color', 'ohio-extra' ),
				'param_name' => 'icon_color',
				'value' => 'brand',
				'dependency' => array(
					'element' => 'icon_type',
					'value' => array(
						'font_icon'
					)
				)
			),
			array(
				'type' => 'ohio_divider',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'param_name' => 'style_tab_divider_readmore',
				'value' => __( 'Button', 'ohio-extra' ),
				'dependency' => array(
					'element' => 'use_link',
					'value' => array(
						'1'
					)
				),
			),
			array(
				'type' => 'ohio_button',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'param_name' => 'readmore_button',
				'color_brand' => true,
				'dependency' => array(
					'element' => 'use_link',
					'value' => array(
						'1'
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