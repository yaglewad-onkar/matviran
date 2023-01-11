<?php

/**
* WPBakery Page Builder Ohio Carousel shortcode params
*/

vc_lean_map( 'ohio_carousel', 'ohio_carousel_sc_map' );

function ohio_carousel_sc_map() {
	return array(
		'name' => __( 'Carousel', 'ohio-extra' ),
		'description' => __( 'Carousel module', 'ohio-extra' ),
		'base' => 'ohio_carousel',
		'category' => __( 'Ohio', 'ohio-extra' ),
		'icon' => OHIO_EXTRA_DIR_URL . 'assets/images/shortcodes/carousel_icon.svg',
		'is_container' => true,
		'show_settings_on_create' => true,
		'as_parent' => array(
			'only' => 'ohio_carousel_inner',
		),
		'js_view' => 'VcOhioBackendTtaSliderView',
		'custom_markup' => '
			<div class="vc_tta-container" data-vc-action="collapse">
				<div class="vc_general vc_tta vc_tta-tabs vc_tta-color-backend-tabs-white vc_tta-style-flat vc_tta-shape-rounded vc_tta-spacing-1 vc_tta-tabs-position-top vc_tta-controls-align-left">
					<div class="vc_tta-tabs-container">'
						. '<ul class="vc_tta-tabs-list">'
						. '<li class="vc_tta-tab" data-vc-tab data-vc-target-model-id="{{ model_id }}" data-element_type="vc_tta_section"><a href="javascript:;" data-vc-tabs data-vc-container=".vc_tta" data-vc-target="[data-model-id=\'{{ model_id }}\']" data-vc-target-model-id="{{ model_id }}"><span class="vc_tta-title-text">{{ section_title }}</span></a></li>'
						. '</ul>
					</div>
					<div class="vc_tta-panels vc_clearfix {{container-class}}">
					{{ content }}
					</div>
				</div>
			</div>
		',
		'default_content' => '
			[ohio_carousel_inner title="' . sprintf( '%s %d', __( 'Section', 'ohio-extra' ), 1 ) . '"][/ohio_carousel_inner]
			[ohio_carousel_inner title="' . sprintf( '%s %d', __( 'Section', 'ohio-extra' ), 2 ) . '"][/ohio_carousel_inner]
			[ohio_carousel_inner title="' . sprintf( '%s %d', __( 'Section', 'ohio-extra' ), 3 ) . '"][/ohio_carousel_inner]
		',
		'admin_enqueue_js' => array(
			vc_asset_url( 'lib/vc_tabs/vc-tabs.min.js' ),
		),
		'params' => array(

			// General
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Mouse drag scroll', 'ohio-extra' ),
				'param_name' => 'drag_scroll',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '0'
				),
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Offset items', 'ohio-extra' ),
				'param_name' => 'offset_items',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '0'
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Offset size', 'ohio-extra' ),
				'param_name' => 'offset_size',
				'description' => __( 'Use "px" or "%".', 'ohio-extra' ),
				'value' => '',
				'dependency' => array(
					'element' => 'offset_items',
					'value' => array(
						'1'
					)
				)
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Gap items', 'ohio-extra' ),
				'param_name' => 'gap_items',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '0'
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Gap size', 'ohio-extra' ),
				'description' => __( 'Gap size in px' ),
				'param_name' => 'gap_size',
				'value' => '40',
				'dependency' => array(
					'element' => 'gap_items',
					'value' => array(
						'1'
					)
				),
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Autoplay mode', 'ohio-extra' ),
				'param_name' => 'autoplay',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Autoplay interval timeout', 'ohio-extra' ),
				'param_name' => 'autoplay_time',
				'description' => __( 'Autoplay interval timeout in seconds.', 'ohio-extra' ),
				'value' => '5',
				'dependency' => array(
					'element' => 'autoplay',
					'value' => '1',
				)
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Stop on hover', 'ohio-extra' ),
				'param_name' => 'stop_on_hover',
				'description' => __( 'Stop autoplay on mouse hover.', 'ohio-extra' ),
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				),
				'dependency' => array(
					'element' => 'autoplay',
					'value' => '1',
				)
			),


			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Loop mode', 'ohio-extra' ),
				'param_name' => 'loop',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				),
				'description' => __( 'Infinity loop. Duplicate last and first items to get loop illusion.', 'ohio-extra' ),
			),

			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Autoheight mode', 'ohio-extra' ),
				'param_name' => 'autoheight',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				),
				'description' => '',
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Preloader', 'ohio-extra' ),
				'param_name' => 'preloader',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Number of visible items on desktop', 'ohio-extra' ),
				'param_name' => 'item_desktop',
				'description' => __( 'Default, 5 items.', 'ohio-extra' ),
				'value' => '5'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Number of visible items on tablet', 'ohio-extra' ),
				'param_name' => 'item_tablet',
				'description' => __( 'Default, 3 items.', 'ohio-extra' ),
				'value' => '3'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Number of visible items on mobile', 'ohio-extra' ),
				'param_name' => 'item_mobile',
				'description' => __( 'Default, 1 items.', 'ohio-extra' ),
				'value' => '1'
			),

			// Pagination
			array(
				'type' => 'ohio_check',
				'group' => __( 'Pagination', 'ohio-extra' ),
				'heading' => __( 'Bullets', 'ohio-extra' ),
				'param_name' => 'pagination_show',
				'description' => __( 'Show bullets navigation.', 'ohio-extra' ),
				'std' => 'true',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				),
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'Pagination', 'ohio-extra' ),
				'heading' => __( 'Buttons position', 'ohio-extra' ),
				'param_name' => 'pagination_type',
				'value' => array(
					__( 'Dots', 'ohio-extra' ) => 'dots',
					__( 'Pagination', 'ohio-extra' ) => 'pagination',
					__( 'Both', 'ohio-extra' ) => 'both',
				),
				'dependency' => array(
					'element' => 'pagination_show',
					'value' => array(
						'1'
					)
				)
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'Pagination', 'ohio-extra' ),
				'heading' => __( 'Buttons', 'ohio-extra' ),
				'param_name' => 'navigation_buttons',
				'std' => 'true',
				'description' => __( 'Show navigation buttons.', 'ohio-extra' ),
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				),
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'Pagination', 'ohio-extra' ),
				'heading' => __( 'Buttons position', 'ohio-extra' ),
				'param_name' => 'position_nav_buttons',
				'value' => array(
					__( 'Default', 'ohio-extra' ) => 'default',
					__( 'Offset', 'ohio-extra' ) => 'offset',
					__( 'Inset', 'ohio-extra' ) => 'inset',
				),
				'dependency' => array(
					'element' => 'navigation_buttons',
					'value' => array(
						'1'
					)
				)
			),

			// Styles & Colors

			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'heading' => __( 'Navigation buttons background color', 'ohio-extra' ),
				'param_name' => 'nav_bg_color',
				'dependency' => array(
					'element' => 'navigation_buttons',
					'value' => '1',
				)
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'heading' => __( 'Navigation buttons color', 'ohio-extra' ),
				'param_name' => 'nav_color',
				'dependency' => array(
					'element' => 'navigation_buttons',
					'value' => '1',
				)
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'heading' => __( 'Dots color', 'ohio-extra' ),
				'param_name' => 'dots_color',
				'dependency' => array(
					'element' => 'pagination_show',
					'value' => '1',
				)
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'heading' => __( 'Pagination color', 'ohio-extra' ),
				'param_name' => 'pagination_color',
				'dependency' => array(
					'element' => 'pagination_show',
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

if ( class_exists( 'WPBakeryShortCode' ) ) {
	class WPBakeryShortCode_Ohio_Carousel extends WPBakeryShortCode {
		static $filter_added = false;
		protected $controls_css_settings = 'out-tc vc_controls-content-widget';
		protected $controls_list = array( 'edit', 'clone', 'delete' );

		public function __construct( $settings ) {
			parent::__construct( $settings );
			if ( ! self::$filter_added ) {
				$this->addFilter( 'vc_inline_template_content', 'setCustomTabId' );
				self::$filter_added = true;
			}
		}

		public function getTabTemplate() {
			return '<div class="wpb_template">' . do_shortcode( '[vc_tab title="Tab" tab_id=""][/vc_tab]' ) . '</div>';
		}

		public function setCustomTabId( $content ) {
			return preg_replace( '/tab\_id\=\"([^\"]+)\"/', 'tab_id="$1-' . time() . '"', $content );
		}
	}
}
