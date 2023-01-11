<?php

/**
* WPBakery Page Builder Ohio Banner shortcode params
*/

vc_lean_map( 'ohio_banner', 'ohio_banner_sc_map' );

function ohio_banner_sc_map() {
	return array(
		'name' => __( 'Banner', 'ohio-extra' ),
		'description' => __( 'Banner / Announcement box', 'ohio-extra' ),
		'base' => 'ohio_banner',
		'category' => __( 'Ohio', 'ohio-extra' ),
		'icon' => OHIO_EXTRA_DIR_URL . 'assets/images/shortcodes/banner_icon.svg',
		'js_view' => 'VcOhioBannerBoxView',
		'custom_markup' => '{{title}}<div class="vc_ohio_banner_box-container">
				<div class="image" style="background-image: url(\'' . plugin_dir_url( __FILE__ ) . 'images/vc_gap_image.svg\');">
					<div class="title">%%title%%</div>
					<div class="lines">%%subtitle%%</div>
				</div>
			</div>',
		'params' => array(
			// General
			array(
				'type' => 'ohio_choose_box',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Banner layout', 'ohio-extra' ),
				'param_name' => 'block_type_layout',
				'value' => array(
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_001.svg',
						'key' => 'full',
						'title' => __( 'Card', 'ohio-extra' )
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_005.svg',
						'key' => 'inner',
						'title' => __( 'Overlay details', 'ohio-extra' )
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_006.svg',
						'key' => 'inner_hover',
						'title' => __( 'Hover details', 'ohio-extra' )
					)
					// array(
					// 	'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_007.svg',
					// 	'key' => 'overlay_title',
					// 	'title' => __( 'Overlay title', 'ohio-extra' )
					// )
				)
			),
			array(
				'type' => 'ohio_choose_box',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Content alignment', 'ohio-extra' ),
				'param_name' => 'block_type_full_align',
				'value' => array(
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_035.svg',
						'key' => 'left',
						'title' => __( 'Left', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_036.svg',
						'key' => 'center',
						'title' => __( 'Center', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_037.svg',
						'key' => 'right',
						'title' => __( 'Right', 'ohio-extra' ),
					)
				),
			),
			array(
				'type' => 'textfield',
				'holder' => 'em',
				'group' => __( 'Content', 'ohio-extra' ),
				'heading' => __( 'Headline', 'ohio-extra' ),
				'param_name' => 'title'
			),
			array(
				'type' => 'textfield',
				'holder' => 'em',
				'group' => __( 'Content', 'ohio-extra' ),
				'heading' => __( 'Subtitle', 'ohio-extra' ),
				'param_name' => 'subtitle'
			),
			array(
				'type' => 'textarea_raw_html',
				'group' => __( 'Content', 'ohio-extra' ),
				'heading' => __( 'Description', 'ohio-extra' ),
				'param_name' => 'description',
				'description' => __( 'Banner can be used as announcement block. Therefore, you can write text of the announcement for page / post / category / external link (HTML allowed).', 'ohio-extra' )
			),
			array(
				'type' => 'attach_image',
				'group' => __( 'Content', 'ohio-extra' ),
				'heading' => __( 'Background image', 'ohio-extra' ),
				'param_name' => 'background_image',
				'description' => __( 'Choose block background image.', 'ohio-extra' ),
			),

			// Link
			array(
				'type' => 'ohio_check',
				'group' => __( 'Link', 'ohio-extra' ),
				'heading' => __( 'Use link?', 'ohio-extra' ),
				'param_name' => 'use_link',
				'value' => array(
					__( 'Yes, sure', 'ohio-extra' ) => '1'
				),
				'description' => __( 'You can use banner as link to another page.', 'ohio-extra' ),
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
				'description' => __( 'Fill Link Text field to change the <strong>Read More</strong> label.', 'ohio-extra' ),
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
				'param_name' => 'typo_tab_divider_subtitle',
				'value' => __( 'Subtitle', 'ohio-extra' ),
			),
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Typography', 'ohio-extra' ),
				'param_name' => 'subtitle_typo'
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
			// array(
			// 	'type' => 'ohio_divider',
			// 	'group' => __( 'Typography', 'ohio-extra' ),
			// 	'param_name' => 'typo_tab_divider_heading',
			// 	'value' => __( 'Button text', 'ohio-extra' ),
			// 	'dependency' => array(
			// 		'element' => 'use_link',
			// 		'value' => array(
			// 			'1'
			// 		)
			// 	),
			// ),
			// array(
			// 	'type' => 'ohio_typography',
			// 	'group' => __( 'Typography', 'ohio-extra' ),
			// 	'param_name' => 'button_typo',
			// 	'dependency' => array(
			// 		'element' => 'use_link',
			// 		'value' => array(
			// 			'1'
			// 		)
			// 	),
			// ),

			// Style
			array(
				'type' => 'ohio_divider',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'param_name' => 'style_tab_divider_content',
				'value' => __( 'Content', 'ohio-extra' ),
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'heading' => __( 'Headline color', 'ohio-extra' ),
				'param_name' => 'title_color',
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'heading' => __( 'Description color', 'ohio-extra' ),
				'param_name' => 'description_color',
			),
			array(
				'type' => 'ohio_divider',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'param_name' => 'style_tab_divider_other',
				'value' => __( 'Other', 'ohio-extra' ),
			),
			array(
				'type' => 'colorpicker',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'heading' => __( 'Background overlay color', 'ohio-extra' ),
				'param_name' => 'overlay_color',
				'value' => 'rgba(52, 52, 54, 0.9)',
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