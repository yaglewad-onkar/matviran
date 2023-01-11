<?php

/**
* WPBakery Page Builder Ohio Split Box shortcode params
*/

vc_lean_map( 'ohio_split_box', 'ohio_split_box_sc_map' );

function ohio_split_box_sc_map() {
	return array(
		'name' => __( 'Split Box', 'ohio-extra' ),
		'description' => __( 'Split view box', 'ohio-extra' ),
		'base' => 'ohio_split_box',
		'category' => __( 'Ohio', 'ohio-extra' ),
		'icon' => OHIO_EXTRA_DIR_URL . 'assets/images/shortcodes/split_box_icon.svg',
		'js_view' => 'VcOhioSplitBoxColumnView',
		'show_settings_on_create' => false,
		'as_parent' => array( 
			'only' => 'ohio_split_box_column'
		),
		'as_child' => array( 
			'except' => 'ohio_split_box_column,ohio_split_box_column_inner'
		),
		'default_content' => '[ohio_split_box_column][/ohio_split_box_column][ohio_split_box_column][/ohio_split_box_column]',
		'params' => array(
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Use full-height layout', 'ohio-extra' ),
				'param_name' => 'full_vh',
				'description' => __( 'Use this option, if you want to stretch the slider for the whole screen', 'ohio-extra' ),
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '0'
				),
			),
			array(
				'type' => 'colorpicker',
				'group' => __( 'Left Block', 'ohio-extra' ),
				'heading' => __( 'Background color', 'ohio-extra' ),
				'param_name' => 'bg_first_color',
			),
			array(
				'type' => 'attach_image',
				'group' => __( 'Left Block', 'ohio-extra' ),
				'heading' => __( 'Background image', 'ohio-extra' ),
				'param_name' => 'bg_first_image',
			),
			array(
				'type' => 'colorpicker',
				'group' => __( 'Left Block', 'ohio-extra' ),
				'heading' => __( 'Overlay color', 'ohio-extra' ),
				'param_name' => 'bg_first_overlay_color',
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'Left Block', 'ohio-extra' ),
				'heading' => __( 'Background size', 'ohio-extra' ),
				'param_name' => 'bg_first_size',
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
				'type' => 'dropdown',
				'group' => __( 'Left Block', 'ohio-extra' ),
				'heading' => __( 'Background parallax type', 'ohio-extra' ),
				'param_name' => 'bg_first_parallax',
				'value' => array(
					__( 'None', 'ohio-extra' ) => '',
					__( 'Vertical', 'ohio-extra' ) => 'vertical',
					__( 'Horizontal', 'ohio-extra' ) => 'horizontal'
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Left Block', 'ohio-extra' ),
				'heading' => __( 'Parallax speed', 'ohio-extra' ),
				'param_name' => 'bg_first_parallax_speed',
				'value' => '1.0',
				'description' => __( 'Parallax speed (default 1.0).', 'ohio-extra' ),
				'dependency' => array(
					'element' => 'bg_first_parallax',
					'value' => array(
						'vertical',
						'horizontal'
					)
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Left Block', 'ohio-extra' ),
				'heading' => __( 'Vertical padding', 'ohio-extra' ),
				'param_name' => 'first_vertical_padding',
				'value' => '6%',
				'description' => __( 'CSS value.', 'ohio-extra' ),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Left Block', 'ohio-extra' ),
				'heading' => __( 'Horizontal padding', 'ohio-extra' ),
				'param_name' => 'first_horizontal_padding',
				'value' => '15%',
				'description' => __( 'CSS value.', 'ohio-extra' ),
			),


			array(
				'type' => 'colorpicker',
				'group' => __( 'Right Block', 'ohio-extra' ),
				'heading' => __( 'Background color', 'ohio-extra' ),
				'param_name' => 'bg_second_color',
			),
			array(
				'type' => 'attach_image',
				'group' => __( 'Right Block', 'ohio-extra' ),
				'heading' => __( 'Background image', 'ohio-extra' ),
				'param_name' => 'bg_second_image',
			),
			array(
				'type' => 'colorpicker',
				'group' => __( 'Right Block', 'ohio-extra' ),
				'heading' => __( 'Overlay color', 'ohio-extra' ),
				'param_name' => 'bg_second_overlay_color',
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'Right Block', 'ohio-extra' ),
				'heading' => __( 'Background size', 'ohio-extra' ),
				'param_name' => 'bg_second_size',
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
				'type' => 'dropdown',
				'group' => __( 'Right Block', 'ohio-extra' ),
				'heading' => __( 'Background parallax type', 'ohio-extra' ),
				'param_name' => 'bg_second_parallax',
				'value' => array(
					__( 'None', 'ohio-extra' ) => '',
					__( 'Vertical', 'ohio-extra' ) => 'vertical',
					__( 'Horizontal', 'ohio-extra' )   => 'horizontal'
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Right Block', 'ohio-extra' ),
				'heading' => __( 'Parallax speed', 'ohio-extra' ),
				'param_name' => 'bg_second_parallax_speed',
				'value' => '1.0',
				'description' => __( 'Parallax speed (default 1.0).', 'ohio-extra' ),
				'dependency' => array(
					'element' => 'bg_second_parallax',
					'value' => array(
						'vertical',
						'horizontal'
					)
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Right Block', 'ohio-extra' ),
				'heading' => __( 'Vertical padding', 'ohio-extra' ),
				'param_name' => 'second_vertical_padding',
				'value' => '6%',
				'description' => __( 'CSS value.', 'ohio-extra' ),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Right Block', 'ohio-extra' ),
				'heading' => __( 'Horizontal padding', 'ohio-extra' ),
				'param_name' => 'second_horizontal_padding',
				'value' => '15%',
				'description' => __( 'CSS value.', 'ohio-extra' ),
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

	class WPBakeryShortCode_Ohio_Split_Box extends WPBakeryShortCodesContainer {
		
		public function getColumnControls( $controls = 'full', $extended_css = '' ) {
			$controls_start = '<div class="vc_controls vc_controls-visible controls_column' . ( ! empty( $extended_css ) ? " {$extended_css}" : '' ) . '">';
			$controls_end = '</div>';

			if ( 'bottom-controls' === $extended_css ) {
				$control_title = sprintf( __( 'Append to this %s', 'ohio-extra' ), strtolower( $this->settings( 'name' ) ) );
			} else {
				$control_title = sprintf( __( 'Prepend to this %s', 'ohio-extra' ), strtolower( $this->settings( 'name' ) ) );
			}

			$controls_move = '<a class="vc_control column_move" data-vc-control="move" href="#" title="' . sprintf( __( 'Move this %s', 'ohio-extra' ), strtolower( $this->settings( 'name' ) ) ) . '"><span class="vc_icon"></span></a>';
			$controls_add = ''; //'<a class="vc_control column_add" data-vc-control="add" href="#" title="' . $control_title . '"><span class="vc_icon"></span></a>';
			$controls_edit = '<a class="vc_control column_edit" data-vc-control="edit" href="#" title="' . sprintf( __( 'Edit this %s', 'ohio-extra' ), strtolower( $this->settings( 'name' ) ) ) . '"><span class="vc_icon"></span></a>';
			$controls_clone = '<a class="vc_control column_clone" data-vc-control="clone" href="#" title="' . sprintf( __( 'Clone this %s', 'ohio-extra' ), strtolower( $this->settings( 'name' ) ) ) . '"><span class="vc_icon"></span></a>';
			$controls_delete = '<a class="vc_control column_delete" data-vc-control="delete" href="#" title="' . sprintf( __( 'Delete this %s', 'ohio-extra' ), strtolower( $this->settings( 'name' ) ) ) . '"><span class="vc_icon"></span></a>';
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


	}
}