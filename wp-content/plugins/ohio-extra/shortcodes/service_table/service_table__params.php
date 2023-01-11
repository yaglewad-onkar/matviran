<?php

/**
* WPBakery Page Builder Ohio Service Table shortcode params
*/

vc_lean_map( 'ohio_service_table', 'ohio_service_table_sc_map' );

function ohio_service_table_sc_map() {
	return array(
		'name' => __( 'Service Table', 'ohio-extra' ),
		'description' => __( 'Simple pricing table block', 'ohio-extra' ),
		'base' => 'ohio_service_table',
		'category' => __( 'Ohio', 'ohio-extra' ),
		'icon' => OHIO_EXTRA_DIR_URL . 'assets/images/shortcodes/service_table_icon.svg',
		'js_view' => 'VcOhioServiceTableView',
		'custom_markup' => '{{title}}<div class="vc_ohio_service_table-container">
				<div class="title">%%title%%</div>
				<div class="subtitle"></div>
				<div class="divider"></div>
				<div class="price"><span></span>%%price%%</div>
				<div class="divider"></div>
				<div class="item"></div>
				<div class="divider"></div>
				<div class="item"></div>
				<div class="divider"></div>
				<div class="item"></div>
				<div class="divider"></div>
				<div class="item"></div>
				<div class="divider"></div>
				<div class="read_more"></div>
			</div>',
		'params' => array(
			// General
			array(
				'type' => 'textfield',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Headline', 'ohio-extra' ),
				'param_name' => 'title',
				'value' => '',
				'description' => __( 'You can specify the name of the tariff plan like <b>Basic</b> and <b>Business</b> or your product name.', 'ohio-extra' ),
			),
			array(
				'type' => 'textarea',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Description', 'ohio-extra' ),
				'param_name' => 'description',
				'value' => '',
				'description' => __( 'Short description.', 'ohio-extra' ),
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Service table alignment', 'ohio-extra' ),
				'param_name' => 'table_alignment',
				'value' => array(
					'Left' => 'left',
					'Center' => 'center',
					'Right' => 'right'
				)
			),

			// Icon
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

			// Features
			array(
				'type' => 'param_group',
				'group' => __( 'Features', 'ohio-extra' ),
				'heading' => __( 'Features', 'ohio-extra' ),
				'param_name' => 'features_value',
				'value' => array(
					false
				),
				'params' => array(
					array(
						'type' => 'dropdown',
						'group' => __( 'Icon', 'ohio-extra' ),
						'heading' => __( 'Icon', 'ohio-extra' ),
						'param_name' => 'feature_icon',
						'value' => array(
							__( 'Without icon', 'ohio-extra' ) => 'without_icon',
							__( 'Enable icon', 'ohio-extra' ) => 'icon_plus',
							__( 'Disable icon', 'ohio-extra' ) => 'icon_minus'
						),
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Headline', 'ohio-extra' ),
						'param_name' => 'feature_title',
					),
				),					
			),

			// Typography
			array(
				'type' => 'ohio_divider',
				'group' => __( 'Typography', 'ohio-extra' ),
				'param_name' => 'typo_tab_divider_title',
				'value' => __( 'Headline', 'ohio-extra' ),
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
			array(
				'type' => 'ohio_divider',
				'group' => __( 'Typography', 'ohio-extra' ),
				'param_name' => 'typo_tab_divider_features_typography',
				'value' => __( 'Features typo', 'ohio-extra' )
			),
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Typography', 'ohio-extra' ),
				'param_name' => 'features_title_typo'
			),
			array(
				'type' => 'ohio_divider',
				'group' => __( 'Typography', 'ohio-extra' ),
				'param_name' => 'typo_tab_divider_features_disabled_typography',
				'value' => __( 'Disabled features typo', 'ohio-extra' )
			),
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Typography', 'ohio-extra' ),
				'param_name' => 'features_title_disabled_typo'
			),

			// Style
			array(
				'type' => 'ohio_divider',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'param_name' => 'style_tab_divider_main_icon',
				'value' => __( 'Content', 'ohio-extra' ),
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'heading' => __( 'Main icon color', 'ohio-extra' ),
				'param_name' => 'main_icon_color',
				'dependency' => array(
					'element' => 'icon_type',
					'value' => array(
						'font_icon'
					)
				)
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles & Colors', 'ohio-extra'),
				'heading' => __( 'Background color', 'ohio-extra' ),
				'param_name' => 'table_bg_color'
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'heading' => __( 'Hover background color', 'ohio-extra' ),
				'param_name' => 'table_bg_color_hover'
			),
			array(
				'type' => 'ohio_divider',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'param_name' => 'style_tab_divider_features',
				'value' => __( 'Features', 'ohio-extra' ),
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'heading' => __( 'Icons color', 'ohio-extra' ),
				'param_name' => 'features_icons_color',
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'heading' => __( 'Disabled icons color', 'ohio-extra' ),
				'param_name' => 'features_disabled_icons_color',
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