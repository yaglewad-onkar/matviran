<?php

/**
* WPBakery Page Builder Ohio Sticky Section Page shortcode params
*/

vc_lean_map( 'ohio_sticky_section_inner', 'ohio_sticky_section_inner_sc_map' );

function ohio_sticky_section_inner_sc_map() {
	return array(
		'name' => __( 'Sticky Section Page', 'ohio-extra' ),
		'description' => __( 'Split page', 'ohio-extra' ),
		'base' => 'ohio_sticky_section_inner',
		'category' => __( 'Ohio', 'ohio-extra' ),
		'js_view' => 'VcColumnView',
		'show_settings_on_create' => false,
		'is_container' => true,
		'as_child' => array(
			'only' => 'ohio_sticky_section'
		),
		'params' => array(
			array(
				'type' => 'attach_image',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Background image', 'ohio-extra' ),
				'param_name' => 'bg_image',
			),
			array(
				'type' => 'attach_image',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Second background image', 'ohio-extra' ),
				'param_name' => 'second_bg_image',
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Background image size', 'ohio-extra' ),
				'param_name' => 'bg_size',
				'value' => array(
					__( 'Cover', 'ohio-extra' )   => 'cover',
					__( 'Contain', 'ohio-extra' ) => 'contain',
					__( 'No repeat', 'ohio-extra' )  => 'no-repeat',
					__( 'Repeat', 'ohio-extra' )  => 'repeat',
				),
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Header logo type', 'ohio-extra' ),
				'param_name' => 'header_logo_type',
				'value' => array(
					__( 'None', 'ohio-extra' ) => 'none',
					__( 'Dark variant', 'ohio-extra' ) => 'dark',
					__( 'Light variant', 'ohio-extra' ) => 'light'
				),
				'std' => 'none'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Side paddings size', 'ohio-extra' ),
				'param_name' => 'side_paddings',
				'description' => __( 'You can change side paddings for each column. Use CSS-units value. Default is 15%.', 'ohio-extra' ),
			),

			// Styles
			array(
				'type' => 'colorpicker',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'heading' => __( 'Header menu color', 'ohio-extra' ),
				'param_name' => 'header_nav_color',
			),
			array(
				'type' => 'colorpicker',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'heading' => __( 'Social networks color', 'ohio-extra' ),
				'param_name' => 'social_networks_color'
			),
			array(
				'type' => 'colorpicker',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'heading' => __( 'Search color', 'ohio-extra' ),
				'param_name' => 'search_color'
			),
			array(
				'type' => 'colorpicker',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'heading' => __( 'Scroll to top color', 'ohio-extra' ),
				'param_name' => 'scroll_to_top_color'
			),
			array(
				'type' => 'colorpicker',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'heading' => __( 'Slider background color', 'ohio-extra' ),
				'param_name' => 'bg_color',
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
	class WPBakeryShortCode_Ohio_Sticky_Section_Inner extends WPBakeryShortCodesContainer {
		
		public function getColumnControls( $controls = 'full', $extended_css = '' ) {
			$controls_start = '<div class="vc_controls vc_controls-visible controls_column' . ( ! empty( $extended_css ) ? " {$extended_css}" : '' ) . '">';
			$controls_end = '</div>';

			if ( 'bottom-controls' === $extended_css ) {
				$control_title = sprintf( __( 'Append to this %s', 'ohio-extra' ), strtolower( $this->settings( 'name' ) ) );
			} else {
				$control_title = sprintf( __( 'Prepend to this %s', 'ohio-extra' ), strtolower( $this->settings( 'name' ) ) );
			}

			$controls_move = '';
			$controls_add = '<a class="vc_control column_add" data-vc-control="add" href="#" title="' . $control_title . '"><i class="vc-composer-icon vc-c-icon-add"></i></a>';
			$controls_edit = '<a class="vc_control column_edit" data-vc-control="edit" href="#" title="' . sprintf( __( 'Edit this %s', 'ohio-extra' ), strtolower( $this->settings( 'name' ) ) ) . '"><i class="vc-composer-icon vc-c-icon-mode_edit"></i></a>';
			$controls_clone = '<a class="vc_control column_clone" data-vc-control="clone" href="#" title="' . sprintf( __( 'Clone this %s', 'ohio-extra' ), strtolower( $this->settings( 'name' ) ) ) . '"><i class="vc-composer-icon vc-c-icon-content_copy"></i></a>';
			$controls_delete = '<a class="vc_control column_delete" data-vc-control="delete" href="#" title="' . sprintf( __( 'Delete this %s', 'ohio-extra' ), strtolower( $this->settings( 'name' ) ) ) . '"><i class="vc-composer-icon vc-c-icon-delete_empty"></i></a>';
			$controls_full = $controls_move . $controls_add . $controls_edit . $controls_clone . $controls_delete;

			$editAccess = vc_user_access_check_shortcode_edit( $this->shortcode );
			$allAccess = vc_user_access_check_shortcode_all( $this->shortcode );

			if ( ! empty( $controls ) ) {
				if ( is_string( $controls ) ) {
					$controls = array( $controls );
				}
				$controls_string = $controls_start;
				foreach ( $controls as $control ) {
					$control_var = 'controls_' . $control;
					if ( ( $editAccess && 'edit' == $control ) || $allAccess ) {
						if ( isset( ${$control_var} ) ) {
							$controls_string .= ${$control_var};
						}
					}
				}

				return $controls_string . $controls_end;
			}

			if ( $allAccess ) {
				return $controls_start . $controls_full . $controls_end;
			} elseif ( $editAccess ) {
				return $controls_start . $controls_edit . $controls_end;
			}

			return $controls_start . $controls_end;
		}

		protected function outputTitle( $title ) {
			$icon = $this->settings( 'icon' );
			if ( filter_var( $icon, FILTER_VALIDATE_URL ) ) {
				$icon = '';
			}
			$params = array(
				'icon' => $icon,
				'is_container' => $this->settings( 'is_container' ),
				'title' => $title,
			);

			return '';//<h4 class="wpb_element_title"> ' . $this->getIcon( $params ) . '</h4>';
		}

		public function mainHtmlBlockParams( $width, $i ) {
			$sortable = ( vc_user_access_check_shortcode_all( $this->shortcode ) ? 'wpb_sortable' : $this->nonDraggableClass );

			return 'data-element_type="' . $this->settings['base'] . '" class="wpb_' . $this->settings['base'] . ' ' /*. $sortable*/ . ' wpb_content_holder vc_shortcodes_container"' . $this->customAdminBlockParams();
		}

	}
}