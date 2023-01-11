<?php

if ( ! class_exists( 'Ohio_Mega_Menu' ) ) {
	class Ohio_Mega_Menu {
		var $_options;

		public $_parsed_post_custom_options = [];
		public $_custom_options_is_parsed = false;

		public function __construct() {
			$this->_options = self::options();
			$this->_add_filters();
		}
		
		public static function options() {
			return array(
				/*'ohio_mega_menu_subtitle' => array(
					'type' 		=> 'text',
					'label' 	=> esc_html__( 'Subtitle', 'ohio' ),
					'default' => '',
					'size' 		=> 'wide',
					'class' 	=> 'ohio-hide-only-depth-0',
				),
				'ohio_mega_menu_image' => array(
					'type' 		=> 'upload',
					'label' 	=> esc_html__( 'Image', 'ohio' ),
					'default' => '',
					'size' 		=> 'wide',
					'class' 	=> 'ohio-show-only-depth-0',
				),
				
				'ohio_mega_menu_bg_position' => array(
					'type' 		=> 'select',
					'label' 	=> esc_html__( 'Background position', 'ohio' ),
					'default' => 0,
					'options' => array(
						'left top' => esc_html__( 'Left top', 'ohio' ),
						'left center' => esc_html__( 'Left center', 'ohio' ),
						'left bottom' => esc_html__( 'Left bottom', 'ohio' ),
						'right top' => esc_html__( 'Right top', 'ohio' ),
						'right center' => esc_html__( 'Right center', 'ohio' ),
						'right bottom' => esc_html__( 'Right bottom', 'ohio' ),
						'center top' => esc_html__( 'Center top', 'ohio' ),
						'center center' => esc_html__( 'Center center', 'ohio' ),
						'center bottom' => esc_html__( 'Center bottom', 'ohio' )
					),
					'size' => 'thin',
					'class' => 'ohio-show-only-depth-0',
				),
				'ohio_mega_menu_bg_repeat' => array(
					'type' => 'select',
					'label' => esc_html__( 'Background repeat', 'ohio' ),
					'default' => 'no-repeat',
					'options' => array(
						'no-repeat' => esc_html__( 'No-repeat', 'ohio' ),
						'repeat' => esc_html__( 'Repeat', 'ohio' ),
						'repeat-x' => esc_html__( 'Repeat-x', 'ohio' ),
						'repeat-y' => esc_html__( 'Repeat-y', 'ohio' ),
					),
					'size' 	=> 'thin',
					'class' => 'ohio-show-only-depth-0',
				),*/
				'ohio_wide_menu_enabled' => array(
					'type' 		=> 'select',
					'label' 	=> esc_html__( 'Enable wide menu', 'ohio' ),
					'default' => 0,
					'options' => array( 
						1 => esc_html__( 'Yes', 'ohio' ),
						0 => esc_html__( 'No', 'ohio' ) 
					),
					'size' => 'thin',
					'class' => 'ohio-show-only-depth-0',
				),
				/*'ohio_full_width_menu_enabled' => array(
					'type' => 'select',
					'label' => esc_html__( 'Enable full-width menu', 'ohio' ),
					'default' => 0,
					'options' => array( 
						1 => esc_html__( 'Yes', 'ohio' ),
						0 => esc_html__( 'No', 'ohio' ) 
					),
					'size' => 'thin',
					'class' => 'ohio-show-only-depth-0',
				),*/
			);
		}

		private function _add_filters() {
			# Add custom options to menu
			add_filter( 'wp_setup_nav_menu_item', array( $this, 'add_custom_options' ) );

			# Update custom menu options
			add_action( 'wp_update_nav_menu_item', array( $this, 'update_custom_options' ), 10, 3 );

			# Set edit menu walker
			//add_filter( 'wp_edit_nav_menu_walker', array( $this, 'apply_edit_walker_class' ), 10, 2 );
			add_filter( 'wp_nav_menu_item_custom_fields', function( $item_id, $item, $depth, $args, $id = null ) {
				$value = 0;
				if ( ! empty( $item->ohio_wide_menu_enabled ) ) {
					$value = 1;
				}
				?>
					<p class="field-ohio_wide_menu_enabled description description-wide ohio-show-only-depth-0">
						<label for="edit-menu-item-ohio_wide_menu_enabled-<?php echo esc_attr( $item_id ); ?>">
							<?php esc_html_e( 'Enable wide menu', 'ohio' ); ?><br>

							<select id="edit-menu-item-ohio_wide_menu_enabled-<?php echo esc_attr( $item_id ); ?>" 
								class="widefat code edit-menu-item-ohio_wide_menu_enabled" 
								name="menu-item-ohio_wide_menu_enabled[<?php echo esc_attr( $item_id ); ?>]"
								style="width:100%;">
								<option value="1" <?php if ( $value == 1) { echo 'selected'; } ?>><?php esc_html_e( 'Yes', 'ohio' ); ?></option>
								<option value="0" <?php if ( $value == 0) { echo 'selected'; } ?>><?php esc_html_e( 'No', 'ohio' ); ?></option>
							</select>
						</label>
					</p>
				<?php
			}, 20, 5 );

			# Addition style
			add_action('admin_enqueue_scripts', array( $this, 'add_menu_css' ) );

			# Mega menu javascript
			add_action( 'admin_enqueue_scripts', array( $this, 'ohio_mega_menu_admin_scripts' ), 80 );
		}
 
		function ohio_mega_menu_admin_scripts() {
			wp_enqueue_media();
			wp_register_script( 'ohio-mega-menu-loader', get_template_directory_uri() . '/inc/menu/js/image-upload.js', array( 'jquery' ) );
			wp_enqueue_script( 'ohio-mega-menu-loader' );
		}

		/**
		 * Register custom options and load options values
		 * 
		 * @param obj $item Menu Item
		 * @return obj Menu Item
		 */
		public function add_custom_options( $item ) {

			foreach( $this->_options as $option => $params ) {

				// For qTranslate
				$id = isset( $item->ID ) ? $item->ID : 0;

				$item->$option = get_post_meta( $id, $option, true );
				if ( $item->$option === false ) {
					$item->$option = $params['default'];
				}
			}

			return $item;
		}

		public function manual_custom_options_parsing() {
			if (!$this->_custom_options_is_parsed && isset($_REQUEST['nav-menu-data'])) {
				$data_object = json_decode(str_replace('\"', '"', $_REQUEST['nav-menu-data']));
				if ($data_object) {
					foreach ($data_object as $key => $value) {
						if (strpos($value->name, 'menu-item-ohio_wide_menu_enabled') === 0) {
							$this->_parsed_post_custom_options[$value->name] = $value->value;
						}
					}
				}
				$this->_custom_options_is_parsed = true;
			}
		}

		public function update_custom_options( $menu_id, $menu_item_id, $args ) {
			$this->manual_custom_options_parsing();
			foreach( $this->_options as $option => $params ) {
				$key = 'menu-item-'. $option;
				$alt_key = $key . '[' . $menu_item_id . ']'; // for custom parsed data

				$option_value = '';

				if (isset( $this->_parsed_post_custom_options[$alt_key] )) {
					$option_value = wp_unslash($this->_parsed_post_custom_options[$alt_key]);
				} else {
					if ( isset( $_REQUEST[$key], $_REQUEST[$key][$menu_item_id] ) ) {
						$option_value = wp_unslash( $_REQUEST[$key][$menu_item_id] );
					}
				}

				update_post_meta( $menu_item_id, $option, $option_value );
			}

		}

		public function add_menu_css() {
			$css = ".menu-item-settings { overflow: hidden; }";
			wp_add_inline_style('wp-admin', $css);
		}

		public function apply_edit_walker_class( $walker, $menu_id ) {
			return STOCKIE_EDIT_MENU_WALKER_CLASS;
		}
	}
}
