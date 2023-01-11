<?php

if ( !defined( 'UT_THEME_VERSION' ) )exit( 'No direct script access allowed' );

if ( !class_exists( 'OT_Meta_Box' ) ) {

	class OT_Meta_Box {

		/**
		 * meta box settings array
		 */

		public $meta_box;

		/**
		 * site type
		 */

		public $site_type = '';

		/**
		 * panel list
		 */

		public $panel_list_open = false;

		/**
		 * one page supported options
		 */

		public $one_page_supported = array();

		/**
		 * one page unsupported options
		 */

		public $one_page_not_supported = array();
		public $one_page_not_supported_fields = array();

		/**
		 * This method adds other methods of the class to specific hooks within WordPress.
		 *
		 * @uses      add_action()
		 *
		 * @return    void
		 *
		 * @access    public
		 * @since     1.0
		 */

		function __construct( $meta_box ) {

			if ( !is_admin() ) {
				return;
			}

			/* no boxes for front and posts page */
			if ( ( isset( $_GET[ 'post' ] ) && $_GET[ 'post' ] == get_option( 'page_on_front' ) && ot_get_option( 'ut_site_layout', 'multisite' ) == 'onepage' ) || isset( $_GET[ 'post' ] ) && $_GET[ 'post' ] == get_option( 'page_for_posts' ) && ot_get_option( 'ut_site_layout', 'multisite' ) == 'onepage' ) {
				return;
			}

			$this->meta_box = $meta_box;
			$this->site_type = ot_get_option( 'ut_site_layout', 'multisite' );

			add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ), 90 );
			add_action( 'save_post', array( $this, 'save_meta_box' ), 90, 2 );


			/* necessary scripts and styles */
			add_action( 'admin_print_styles-post.php', array( & $this, 'register_settings_styles' ) );
			add_action( 'admin_print_styles-post-new.php', array( & $this, 'register_settings_styles' ) );

			$this->one_page_supported = array(
				'ut-section-settings',
				'ut-section-parallax-settings',
				'ut-section-video-settings',
				'ut-section-overlay-settings'
			);

			$this->one_page_not_supported = array(

				// panels
				'ut-portfolio-details',
				'ut-hero-type',
				'ut-hero-settings',
				'ut-hero-content-color-settings',
				'ut-hero-content-custom-html-settings',
				'ut-hero-content-caption-slogan-settings',
				'ut-hero-content-caption-title-settings',
				'ut-hero-content-caption-description-settings',
				'ut-hero-content-button-settings',
				'ut-hero-styling',
				'ut-site-frame-section',
				'ut-page-color-settings',
				'ut-header-settings',
				'ut-contact-section',
				'ut-footer-and-contact-section',
				'ut-navigation-section'

			);

			$this->one_page_not_supported_fields = array(
				'ut_page_page_title_glitch_appear',
				'ut_page_page_title_glitch_appear_style',
				'ut_page_page_title_glitch',
				'ut_page_page_title_glitch_style',
				'ut_page_page_title_glitch_accent_1',
				'ut_page_page_title_glitch_accent_2',
				'ut_page_page_title_stroke_effect',
				'ut_page_page_title_stroke_color',
				'ut_page_page_title_stroke_width',
				'ut_page_page_title_glow',
				'ut_page_page_title_glow_color',
				'ut_page_page_title_glow_shadow_color'
			);








		}

		public function register_settings_styles() {

			global $post_ID;

			$min = NULL;

			if( !WP_DEBUG ){
				$min = '.min';
			}

			$screen = get_current_screen();

			$allowed_screens = array(

				// WordPress Admin Pages
				'page',
				'portfolio',
				'post',
				'product',
				'edit-unite_custom_fonts',
				'ut-content-block',
				'ut-menu-manager',
				'ut-table-manager',
				'portfolio-manager',
				'widgets',
				'nav-menus',
				'upload'

			);

			if( isset( $screen->id ) && !in_array( $screen->id, $allowed_screens ) ) {
				return;
			}

			/* custom css files */
			wp_enqueue_style(
				'ut-metapanel-styles',
				THEME_WEB_ROOT . '/unite/core/admin/assets/css/unite-metapanel'.$min.'.css'
			);

			/* deprecated js files */
			wp_enqueue_script(
				'ut-deprecated-scripts',
				THEME_WEB_ROOT . '/unite/core/admin/assets/js/unite-deprecated'.$min.'.js'
			);

			/* custom js files */
			wp_enqueue_script(
				'ut-metapanel-scripts',
				THEME_WEB_ROOT . '/unite/core/admin/assets/js/unite-metapanel'.$min.'.js',
				array(),
				false,
				true
			);

			$popup_vars = array(
				'pop_url' => THEME_WEB_ROOT . '/admin/',
				'site_type' => ot_get_option( 'ut_site_layout', 'multisite' ),
				'permalink' => get_permalink( $post_ID ),
				'navmenu' => admin_url( 'nav-menus.php' )
			);

			if( get_post_type( $post_ID ) == 'portfolio' || get_post_type( $post_ID ) == 'post' || get_post_type( $post_ID ) == 'product' ) {
				$popup_vars[ 'post_type' ] = get_post_type( $post_ID );
			}

			wp_localize_script(
				'ut-metapanel-scripts',
				'ut_meta_panel_vars',
				$popup_vars
			);

		}

		/**
		 * Adds meta box to any post type
		 *
		 * @uses      add_meta_box()
		 *
		 * @return    void
		 *
		 * @access    public
		 * @since     1.0
		 */

		function add_meta_boxes() {

			foreach ( ( array )$this->meta_box['pages'] as $page ) {

				add_meta_box(
					$this->meta_box['id'],
					$this->meta_box['title'],
					array( $this, 'build_meta_box' ),
					$page,
					$this->meta_box['context'],
					$this->meta_box['priority'],
					$this->meta_box['fields']
				);

			}

		}


		function get_showcase_setting() {

			global $post_ID;

			if ( get_post_type( $post_ID ) == 'portfolio' ) {

				$ut_detail_style = 'internal';

				/* get current categories */
				$current_categories = wp_get_object_terms( $post_ID, 'portfolio-category' );

				$showcases = get_posts( array(
					'posts_per_page' => -1,
					'post_type' => 'portfolio-manager',
				) );

				if ( !empty( $showcases ) && is_array( $showcases ) && !empty( $current_categories ) ) {

					foreach ( $showcases as $showcase ) {

						$showcase_categories = '';

						/* get used categories */
						$showcase_categories = get_post_meta( $showcase->ID, 'ut_portfolio_categories', true );

						foreach ( $current_categories as $category ) {

							/* we have a match */
							if ( !empty( $showcase_categories ) && is_array( $showcase_categories ) && array_key_exists( $category->term_id, $showcase_categories ) ) {

								$portfolio_settings = get_post_meta( $showcase->ID, 'ut_portfolio_settings', true );

								$ut_detail_style = !empty( $portfolio_settings[ 'detail_style' ] ) ? $portfolio_settings[ 'detail_style' ] : false;

							}

						}

					}

				}

				return 'data-detailstyle="' . esc_attr( $ut_detail_style ) . '"';

			}

		}



		/**
		 * Prepare Option Args
		 *
		 * @return    array
		 *
		 * @access    public
		 * @since     4.0
		 */

		function prepare_option_args( $field, $field_value, $post_ID ) {

			return array(
                'type' => $field['type'],
                'field_id' => $field['id'],
                'field_name' => $field['id'],
                'field_name_key' => $field['name_key'] ?? '',
                'field_sections' => !empty($field['sections']) ? $field['sections'] : array(),
                'field_toplevel' => isset($field['toplevel']) && $field['toplevel'] ? $field['toplevel'] : '',
                'field_list_title' => !(isset($field['list_title']) && !$field['list_title']),
                'field_value' => $field_value,
                'field_global' => $field['global'] ?? '',
                'field_global_font_type' => $field['global_font_type'] ?? '',
                'field_prefix' => $field['prefix'] ?? 'ut_page_',
                'field_desc' => $field['desc'] ?? '',
                'field_label' => $field['label'] ?? '',
                'field_htmldesc' => $field['htmldesc'] ?? '',
                'field_std' => $field['std'] ?? '',
                'field_max' => $field['max'] ?? '3',
                'field_rows' => isset($field['rows']) && !empty($field['rows']) ? $field['rows'] : 10,
                'field_post_type' => isset($field['post_type']) && !empty($field['post_type']) ? $field['post_type'] : 'post',
                'field_min_max_step' => isset($field['min_max_step']) && !empty($field['min_max_step']) ? $field['min_max_step'] : '0,100,1',
                'field_class' => $field['class'] ?? '',
                'field_choices' => $field['choices'] ?? array(),
                'field_settings' => isset($field['settings']) && !empty($field['settings']) ? $field['settings'] : array(),
                'field_mode' => !empty($field['mode']) ? $field['mode'] : 'hex',
                'field_position' => !empty($field['position']) ? $field['position'] : 'bottom left',
                'field_markup' => !empty($field['markup']) ? $field['markup'] : '12_12',
                'field_list_max' => !empty($field['list_max']) ? $field['list_max'] : 999,
                'field_taxonomy' => !empty($field['taxonomy']) ? $field['taxonomy'] : '',
                'field_relation' => !empty($field['relation']) ? $field['relation'] : '',
                'field_breakpoint_support' => $field['breakpoint_support'] ?? '',
                'field_breakpoint' => !empty($field['breakpoint']) ? $field['breakpoint'] : '',
                'field_unit_support' => !empty($field['unit_support']) ? $field['unit_support'] : '',
                'field_unit_support_default' => $field['unit_support_default'] ?? '',
                'field_option_label' => $field['option_label'] ?? true,
                'post_id' => $post_ID,
                'meta' => true
			);

		}

		/**
		 * Simple Metabox
		 *
		 * @return    string
		 *
		 * @access    public
		 * @since     4.2
		 */
		function build_simple_meta_box( $post, $metabox ) {

			$nonce = wp_create_nonce( 'ut-global-flag-nonce' );

			/* loop through meta box fields */
			foreach ( $this->meta_box['fields'] as $field ) {

				$classes = array();
				$section_classes = '';

				/* get current post meta data */
				$field_value = get_post_meta( $post->ID, $field[ 'id' ], true );

				/* set standard value */
				if ( isset( $field[ 'std' ] ) ) {
					$field_value = ot_filter_std_value( $field_value, $field[ 'std' ] );
				}

				/* build the arguments array */
				$_args = $this->prepare_option_args( $field, $field_value, $post->ID );

				// flag for custom value
				$custom_value = false;

				if ( isset( $_args[ 'field_global' ] ) && $_args[ 'field_global' ] == 'on' ) {

					$custom_value = get_post_meta( $post->ID, $_args[ 'field_id' ] . '_global_overwrite', true );
					$classes[] = $custom_value ? 'ut-custom-active' : 'ut-global-active';
					$section_classes = ' ut-has-overlay';

				}

				echo '<div id="setting_', $_args[ 'field_id' ], '" class="ut-panel-section ', implode( ' ', $classes ), '">';

				if ( isset( $_args[ 'field_global' ] ) && $_args[ 'field_global' ] == 'on' ) {

				    $dynamic_global = '';

                    if ( !empty( $_args[ 'field_relation' ] ) ) {

                        $dynamic_global = 'ut-switch-dynamic-globals';

                    }

					echo '<div class="ut-switch ut-switch-for-globals ' . $dynamic_global . '" data-on="', esc_html__( 'custom', 'unitedthemes' ), '" data-off="', esc_html__( 'global', 'unitedthemes' ), '">';

					echo '<input autocomplete="off" data-option="' . $_args[ 'field_id' ] . '" id="' . $_args[ 'field_id' ] . '_global_overwrite" data-nonce="' . esc_attr( $nonce ) . '" data-post="' . esc_attr( $post->ID ) . '" name="' . $_args[ 'field_id' ] . '_global_overwrite" type="checkbox" ', ( isset( $custom_value ) ? checked( true, $custom_value ) : '' ), ' />';
					echo '<label for="', esc_attr( $_args[ 'field_id' ] ), '_global_overwrite"></label>';

					echo '</div>';

				}

				echo '<h3 class="ut-single-option-title">';

				echo $field[ 'label' ];

				echo '</h3>';

				if ( !empty( $field[ 'desc' ] ) ) {

					echo '<p>' . $field[ 'desc' ] . '</p>';

				}

				echo '<div class="' . $section_classes . '">';

				$overlay_state = '';

				if ( isset( $_args[ 'field_global' ] ) && $_args[ 'field_global' ] == 'on' && !$custom_value ) {

					// show overlay
					$overlay_state = 'show';

					// parse theme default into metabox if global is active
					$theme_options_value = str_replace( $_args[ 'field_prefix' ], 'ut_global_', $_args[ 'field_id' ] );

					$_args[ 'field_value' ] = ot_get_option( $theme_options_value );

				}

				echo '<div id="switch_overlay_', $_args[ 'field_id' ], '" class="ut-global-switch-overlay ', $overlay_state, '"></div>';

				/* field output */
				ot_display_by_type( $_args );

				echo '</div>';

				echo '</div>';

			}

		}

		/**
		 * Build Meta Box Tabs Menu
		 *
		 * @access    public
		 * @since     4.2
		 */

		function build_meta_box_menu( $sections, $class = '', $ajax_active = false, $tabs_dependency = array() ) {

			global $post_ID;

			// panel is going to be loaded via ajax
			if( $ajax_active ) {
				return;
			}

			echo '<ul class="ui-tabs-nav ui-widget-header ' . $class . '" ' . ut_create_dependency( $tabs_dependency ) . '>';

			foreach ( $sections as $section ) {

				$attributes = array();

				// set dependencies
				$dependency = !empty( $section[ 'required' ] ) ? $section[ 'required' ] : '';

				/**
				 * Strip or add menu items
				 */

				// old one page mode section management
				if ( ot_get_option( 'ut_site_layout', 'multisite' ) == 'onepage' && get_post_meta( $post_ID, 'ut_page_type', true ) == 'section' ) {

					/* options - which are not supported by sections */
					if ( in_array( $section[ 'id' ], $this->one_page_not_supported ) ) {

						continue;

					}

				} else {

					/* special one page options - gets stripped for all regular metaboxes */
					if ( in_array( $section[ 'id' ], $this->one_page_supported ) ) {

						continue;

					}

				}

				// portfolio related options
				if ( get_post_type( $post_ID ) != 'portfolio' && ( $section[ 'id' ] == 'ut-portfolio-details' || $section[ 'id' ] == 'ut-portfolio-showcase-settings' ) ) {

					continue;

				}

				// data attributes for alternate text output
				if ( isset( $section[ 'data' ] ) ) {

					foreach ( $section[ 'data' ] as $dkey => $data ) {

						$attributes[] = 'data-' . $dkey . '="' . esc_attr( $data ) . '"';

					}

				}

				// load this section with ajax
				$ajax_class = isset( $section['ajax'] ) ? 'ut-ajax-load-panel' : 'ut-loaded-panel';

				echo '<li class="' . esc_attr( $section[ 'id' ] ) . '" ' . ut_create_dependency( $dependency ) . ' ' . implode( ' ', $attributes ) . '>';

				echo '<a data-panel-id="' . esc_attr( $section[ 'id' ] ) . '" class="'. $ajax_class .'" href="#' . esc_attr( $section[ 'id' ] ) . '">' . $section[ 'title' ] . '</a>';

				echo '</li>';

			}

			echo '</ul>';

		}



		function meta_box_option( $post, $field ) {

			/* field is not supporting this post type */
			if ( !isset( $field[ 'pages' ] ) || !in_array( get_post_type( $post->ID ), $field[ 'pages' ] ) ) {
				return;
			}

			// global flag nonce
			$nonce = wp_create_nonce('ut-global-flag-nonce');

			// inject meta panel
			if ( get_post_type( $post->ID ) == 'portfolio' ) {

				// options to skip
				$option_to_skip = array(
					'ut_page_type'
				);

				if ( in_array( $field[ 'id' ], $option_to_skip ) ) {
					return;
				}

				/* options to inject */
				$option_to_inject = array(
					'ut_page_hero_style' => 'ut_portfolio_hero_style',
					'ut_page_hero_align' => 'ut_portfolio_caption_align',
					'ut_section_slogan'  => 'ut_page_slogan'
				);

				if ( array_key_exists( $field[ 'id' ], $option_to_inject ) ) {
					/* overwrite field ID */
					$field[ 'id' ] = $option_to_inject[ $field[ 'id' ] ];
				}

			}

			/* get current post meta data */
			$field_value = get_post_meta( $post->ID, $field[ 'id' ], true );
			$all_meta = get_post_meta( $post->ID );

			/* set standard value */
			if ( isset( $field[ 'std' ] ) ) {

				$field_value = ot_filter_meta_std_value( $field_value, $field[ 'std' ], $field['id'], $all_meta, $field['type'] );

			}

			/* build the arguments array */
			$_args = $this->prepare_option_args( $field, $field_value, $post->ID );

			/* extra classes */
			$classes = array();
			$classes[] = 'grid-100 grid-parent ut-panel-section';
			$classes[] = !empty( $field[ "section_class" ] ) ? $field[ "section_class" ] : '';

			// field dependency
			$dependency = !empty( $field[ 'required' ] ) ? $field[ 'required' ] : '';

			// section field sizes
			$section_classes = array('grid-50 tablet-grid-100 mobile-grid-100');

			if ( isset( $field[ 'markup' ] ) && $field[ 'markup' ] == '1_1' ) {

				$section_classes = array('grid-100 tablet-grid-100 mobile-grid-100 ut-panel-description-full');

			}

			// flag for custom value
			$global_overwrite = false;

			if( isset( $_args['field_global'] ) && $_args['field_global'] == 'on' ) {

				// check if global overwrite has been set
				$global_overwrite = get_post_meta( $post->ID, $_args['field_id'] . '_global_overwrite' , true );

				// extra classes settings div
				$classes[] = $global_overwrite ? 'ut-custom-active' : 'ut-global-active';

				// extra classes settings section
				$section_classes[] = ' ut-has-overlay';

			}


			if ( $field[ 'type' ] == 'panel_headline' ) {

				echo '<div id="setting_' . esc_attr( $_args[ 'field_id' ] ) . '" class="ut-panel-headline" ' . ut_create_dependency( $dependency ) . '>';

				ot_display_by_type( $_args );

				echo '</div>';

			} elseif ( $field[ 'type' ] == 'section_headline' ) {

				if ( $this->panel_list_open ) {

					echo '</ul>';

					$this->panel_list_open = false;

				}

				echo '<div id="setting_' . esc_attr( $_args[ 'field_id' ] ) . '" class="ut-section-headline" ' . ut_create_dependency( $dependency ) . '>';

				ot_display_by_type( $_args );

				echo '</div>';

			} else if ( $field[ 'type' ] == 'sub_section_headline' ) {

				if ( $this->panel_list_open ) {

					echo '</ul>';

					$this->panel_list_open = false;

				}

				echo '<div id="setting_' . esc_attr( $_args[ 'field_id' ] ) . '" class="ut-section-sub-headline" ' . ut_create_dependency( $dependency ) . '>';

				ot_display_by_type( $_args );

				echo '</div>';

			} else if ( $field[ 'type' ] == 'section_headline_info' ) {

				echo '<div id="setting_' . esc_attr( $_args[ 'field_id' ] ) . '" class="ut-panel-infoheadline" ' . ut_create_dependency( $dependency ) . '>';

				ot_display_by_type( $_args );

				echo '</div>';

			} else if( $field['type'] == 'sub_section_inline_headline' ) {

				echo '<div id="setting_' . esc_attr( $field['id'] ) . '" class="ut-section-sub-inline-headline" ' . ut_create_dependency( $dependency ) . '>';

				ot_display_by_type( $_args );

				echo '</div>';


			} else {

				if ( !$this->panel_list_open ) {

					echo '<ul class="ut-panel-list">';

					$this->panel_list_open = true;

				}

				echo '<li class="' . ( $_args['field_breakpoint_support'] ? 'ut-visible-for-breakpoints' : '' ) . '" ' . ut_create_dependency( $dependency ) . '>';

				echo '<div id="setting_' . $_args[ 'field_id' ] . '" class="' . implode( ' ', $classes ) . '" ' . ( $_args[ 'field_id' ] == 'ut_portfolio_link_type' ? $this->get_showcase_setting() : '' ) . '>';

				echo '<div class="grid-100 tablet-grid-100 mobile-grid-100">';

				echo '<h3 class="ut-single-option-title">';

				echo $field['label'];

				echo '</h3>';

				echo '</div>';

				echo '<div class="' . implode( ' ', $section_classes ) . '">';

				echo '<div class="ut-panel-description">';

				if( isset( $_args['field_global'] ) && $_args['field_global'] == 'on' ) {

				    $dynamic_global = '';
				    $dynamic_relation = '';

                    if ( !empty( $_args[ 'field_relation' ] ) ) {

                        $dynamic_global = 'ut-switch-dynamic-globals';
                        $dynamic_relation = 'data-relation="' . esc_attr( $_args[ 'field_relation' ] ) . '" data-relation-key="' . esc_attr( $_args[ 'field_name_key' ] ) . '"';

                    }

                    $data_type = '';

                    if( in_array( $_args['type'], array( 'typography', 'googlefont', 'custom_typography' ) ) && !empty( $_args['field_global_font_type'] ) ) {

                        $type = ot_get_option( $_args['field_global_font_type'] );
                        $type_key = _ut_font_type_relations( $_args['field_global_font_type'], $type );

                        if( $type_key ) {

                            $data_type = 'data-option-key="' . esc_attr( $type_key ) . '"';

                        }

                    }

					echo '<div class="ut-switch ut-switch-for-globals ' . $dynamic_global . '" data-on="' , esc_html__( 'custom', 'unitedthemes' ) ,  '" data-off="' , esc_html__( 'global', 'unitedthemes' ) ,  '">';

					$global_overwrite = isset( $global_overwrite ) && $global_overwrite == 'on'  ? 1 : $global_overwrite;
					$global_overwrite = isset( $global_overwrite ) && $global_overwrite == 'off' ? '' : $global_overwrite;

					// there is a local value
					if( !$global_overwrite && !empty( $_args['field_value'] ) ) {

						if( $_args['type'] == 'background' && !empty( $_args['field_value']['background-image'] ) ) {

							$global_overwrite = 1;

						} elseif( $_args['type'] == 'typography'  ) {

						    $typography = array_filter($_args['field_value'], function($v){
						        return !is_null($v) && $v !== '';
                            });

						    if( $typography ) {

						        $global_overwrite = 1;

                            }

						} elseif( $_args['type'] != 'background' ) {

							$global_overwrite = 1;

						}

					}

					echo '<input ' , $dynamic_relation , ' ' , $data_type , ' data-option="' , $_args['field_id'] , '" id="' , $_args['field_id'] , '_global_overwrite" data-nonce="', esc_attr( $nonce ) ,'" data-post="' , esc_attr( $post->ID ) , '" name="' , $_args['field_id'] , '_global_overwrite" type="checkbox" ' , ( isset( $global_overwrite ) ? checked( true, $global_overwrite ) : '' ) ,' />';
					echo '<label for="' , esc_attr( $_args['field_id'] ) , '_global_overwrite"></label>';

					echo '</div>';

				}

				if ( isset( $field[ 'desc' ] ) ) {

					echo wp_specialchars_decode( $field[ 'desc' ] );

				}

				echo '</div>';

				    echo '</div>';

				        echo '<div class="' . implode( ' ', $section_classes ) . '">';

				            $overlay_state = '';

                            if( isset( $_args['field_global'] ) && $_args['field_global'] == 'on' && !$global_overwrite ) {

                                // show overlay
                                $overlay_state = 'show';

                                $theme_options_value = str_replace( $_args[ 'field_prefix' ], 'ut_global_', $_args[ 'field_id' ] );

                                if( in_array( $_args['type'], array( 'typography', 'googlefont', 'custom_typography' ) ) && !empty( $_args['field_global_font_type'] ) ) {

                                    $theme_options_value = ot_get_option( $_args['field_global_font_type'] );
                                    $theme_options_value = _ut_font_type_relations( $_args['field_global_font_type'], $theme_options_value );

                                }

                                $_args['field_value'] = ot_get_option( $theme_options_value );

                                if( $_args[ 'field_relation' ] && isset( ut_font_responsive_settings()[$_args[ 'field_relation' ]] ) ) {

                                    $font_responsive_settings = ut_font_responsive_settings()[$_args['field_relation']];
                                    $relations_key = $_args['field_name_key'];

                                    $_args['field_value'] = array(
                                        $relations_key                 => $font_responsive_settings['base-' . $relations_key],
                                        $relations_key . '-unit'       => $font_responsive_settings[$relations_key . '-unit'],
                                        $relations_key . '-responsive' => array()
                                    );
                                    foreach( ot_recognized_breakpoints() as $key => $breakpoint ) {

                                        if( $key !== 'desktop_large' ) {

                                            $value = $font_responsive_settings[$relations_key][$key] == 'auto' ? '' : $font_responsive_settings[$relations_key][$key];
                                            $_args['field_value'][$relations_key . '-responsive'][$key] = $value;

                                        }

                                    }

                                }

                            }

                            echo '<div id="switch_overlay_' , $_args['field_id'] , '" class="ut-global-switch-overlay ' , $overlay_state , '"></div>';

				            ot_display_by_type( $_args );

				        echo '</div>';

				    echo '</div>';

				echo '</li>';

			}

		}


		/**
		 * Meta box view
		 *
		 * @access    public
		 * @since     1.0
		 */

		function build_meta_box( $post, $metabox ) {

			global $post_ID;

			// old panel migration
			$this->meta_panel_migration( $post_ID );

			/* Use nonce for verification */
			echo '<input id="' . $this->meta_box[ 'id' ] . '-nonce" type="hidden" name="' . $this->meta_box[ 'id' ] . '_nonce" value="' . wp_create_nonce( $this->meta_box[ 'id' ] ) . '" />';
			echo '<input id="' . $this->meta_box[ 'id' ] . '-post" type="hidden" value="' . $post->ID . '" />';

			/* meta box description */
			echo isset( $this->meta_box[ 'desc' ] ) && !empty( $this->meta_box[ 'desc' ] ) ? '<div class="ut-metabox-description">' . wp_specialchars_decode( $this->meta_box[ 'desc' ] ) . '</div>': '';

			/* simple metabox or metabox with tabs */
			if ( isset( $this->meta_box[ 'type' ] ) && $this->meta_box[ 'type' ] == 'simple' || !isset( $this->meta_box[ 'type' ] ) ) {

				$skin = isset( $this->meta_box[ 'skin' ] ) && !$this->meta_box[ 'skin' ] ? '' : 'ut-admin-wrap';

				echo '<div id="' . $skin . '" class="ut-metabox-wrap ut-metabox-wrap-simple clearfix">';
				echo $this->build_simple_meta_box( $post, $metabox );

			} else {

				/* page section switch for one pages */
				if ( ot_get_option( 'ut_site_layout', 'multisite' ) == 'onepage' && get_post_type( $post_ID ) == 'page' ) {

					echo '<div id="ut-option-switch-wrap">';

					echo '<div id="ut-option-switch"></div>';
					echo '<span class="ut-dash-fa-demo hide-on-mobile"><i class="fa fa-cogs" aria-hidden="true"></i></span>';

					echo '</div>';

				}

				echo '<div id="ut-admin-wrap" class="ut-metabox-wrap clearfix">';

				// hidden unput fields to store loaded pabel IDs
				echo '<input id="ut-store-panels" name="ut_loaded_panels" value="" type="hidden" autocomplete="off">';

				echo '<div id="ut-metabox-tabs" class="ui-tabs ut-hide">';

				// hide metabox until visual composer loaded
				echo '<div id="ut-metabox-tabs-overlay">
                    	
                        <div id="ut-meta-panel-loader" class="sk-cube-grid">
                            <div class="sk-cube sk-cube1"></div>
                            <div class="sk-cube sk-cube2"></div>
                            <div class="sk-cube sk-cube3"></div>
                            <div class="sk-cube sk-cube4"></div>
                            <div class="sk-cube sk-cube5"></div>
                            <div class="sk-cube sk-cube6"></div>
                            <div class="sk-cube sk-cube7"></div>
                            <div class="sk-cube sk-cube8"></div>
                            <div class="sk-cube sk-cube9"></div>                               
                        </div>
                        
                    </div>';

				// build metabox menu
				$this->build_meta_box_menu( $this->meta_box[ 'sections' ], 'ui-tabs-nav-outer' );

				// build metabox container
				foreach ( $this->meta_box[ 'sections' ] as $section ) {

					// load this section with ajax
					$ajax_active = isset( $section['ajax'] ) ? true : false;

					/**
					 * Strip or add menu items
					 */

					if ( ot_get_option( 'ut_site_layout', 'multisite' ) == 'onepage' && get_post_meta( $post_ID, 'ut_page_type', true ) == 'section' ) {

						/* options - which are not supported by sections */
						if ( in_array( $section[ 'id' ], $this->one_page_not_supported ) ) {

							continue;

						}

					} else {

						/* special one page options - gets stripped for all regular metaboxes */
						if ( in_array( $section[ 'id' ], $this->one_page_supported ) ) {

							continue;

						}

					}

					echo '<div id="' . esc_attr( $section[ 'id' ] ) . '" class="ui-tabs-panel ui-tabs-panel-outer ' . ( isset( $section[ 'subsection' ] ) ? 'ui-has-inner-tabs' : '' ) . ' clearfix">';

					if ( isset( $section[ 'subsection' ] ) ) {

						$tabs_dependency = isset( $section['subsection_required'] ) ? $section['subsection_required'] : array();

						$this->build_meta_box_menu( $section['subsection'], 'ui-tabs-nav-inner', $ajax_active );

						foreach ( $section[ 'subsection' ] as $subsection ) {

							// panel is going to be loaded via ajax
							if( $ajax_active ) {
								continue;
							}

							/**
							 * Strip or add menu items
							 */

							if ( ot_get_option( 'ut_site_layout', 'multisite' ) == 'onepage' && get_post_meta( $post_ID, 'ut_page_type', true ) == 'section' ) {

								/* options - which are not supported by sections */
								if ( in_array( $subsection[ 'id' ], $this->one_page_not_supported ) ) {

									continue;

								}

							} else {

								/* special one page options - gets stripped for all regular metaboxes */
								if ( in_array( $subsection[ 'id' ], $this->one_page_supported ) ) {

									continue;

								}

							}

							echo '<div id="' . esc_attr( $subsection[ 'id' ] ) . '" class="ui-tabs-panel ui-tabs-panel-inner ui-tabs-panel-inner-vertical ' . ( isset( $subsection[ 'subsection' ] ) ? 'ui-has-inner-tabs' : '' ) . ' clearfix">';

							if( isset( $subsection['subsection'] )  ) {

								$this->build_meta_box_menu( $subsection['subsection'], 'ui-tabs-nav-vertical-inner', $ajax_active );

								foreach ( $subsection['subsection'] as $sub_subsection ) {

									echo '<div id="' . esc_attr( $sub_subsection[ 'id' ] ) . '" class="ui-tabs-panel ui-tabs-panel-vertical-inner ut-panel-options-wrap clearfix">';

									// loop option fields
									foreach ( $this->meta_box['fields'] as $field ) {

										/* next item */
										if( isset($field['metapanel']) && $field['metapanel'] != $sub_subsection['id'] ) {
											continue;
										}

										if ( ot_get_option( 'ut_site_layout', 'multisite' ) == 'onepage' && get_post_meta( $post_ID, 'ut_page_type', true ) == 'section' ) {

											/* options - which are not supported by sections */
											if ( in_array( $field['id'], $this->one_page_not_supported_fields ) ) {
												continue;
											}

										}

										if ($ajax_active) {
											continue;
										}

										/* create field */
										$this->meta_box_option($post, $field);

									}

									if ($this->panel_list_open) {

										echo '</ul>';

										$this->panel_list_open = false;

									}
									// end loop option fields

									echo '</div>';

								}

							} else {

								// loop option fields
								foreach ($this->meta_box['fields'] as $field) {

									/* next item */
									if( isset($field['metapanel']) && $field['metapanel'] != $subsection['id'] ) {
										continue;
									}

									if ( ot_get_option( 'ut_site_layout', 'multisite' ) == 'onepage' && get_post_meta( $post_ID, 'ut_page_type', true ) == 'section' ) {

										/* options - which are not supported by sections */
										if ( in_array( $field['id'], $this->one_page_not_supported_fields ) ) {
											continue;
										}

									}

									if ($ajax_active) {
										continue;
									}

									/* create field */
									$this->meta_box_option($post, $field);

								}

								if ($this->panel_list_open) {

									echo '</ul>';

									$this->panel_list_open = false;

								}
								// end loop option fields

							}

							echo '</div>';

						}

					} else {

						/* loop through field which are part of this container */
						foreach ( $this->meta_box[ 'fields' ] as $field ) {


							/* next item */
							if ( isset( $field[ 'metapanel' ] ) && $field[ 'metapanel' ] != $section[ 'id' ] ) {
								continue;
							}

							if ( ot_get_option( 'ut_site_layout', 'multisite' ) == 'onepage' && get_post_meta( $post_ID, 'ut_page_type', true ) == 'section' ) {

								/* options - which are not supported by sections */
								if ( in_array( $field['id'], $this->one_page_not_supported_fields ) ) {

									continue;
								}

							}

							if( $ajax_active ) {
								continue;
							}

							/* create field */
							$this->meta_box_option( $post, $field );

						}

						if ( $this->panel_list_open ) {

							echo '</ul>';

							$this->panel_list_open = false;

						}

					}

					echo '</div>';

				}

				echo '</div>';

			}

			echo '</div>';

		}

		public function get_page_menu_id( $object_id = NULL ) {

			$theme_locations = get_nav_menu_locations();

			if ( empty( $theme_locations[ 'primary' ] ) ) {
				return false;
			}

			$menu_objects = get_term( $theme_locations[ 'primary' ], 'nav_menu' );
			$menu_id = $menu_objects->term_id;
			$menu_object = wp_get_nav_menu_items( $menu_id );

			/* no menu, leave here  */
			if ( !$menu_object ) {
				return false;
			}

			foreach ( ( array )$menu_object as $key => $menu_item ) {

				if ( $menu_item->object_id == $object_id ) {

					return $menu_item->ID;
					break;

				}

			}

			return false;

		}



		/**
		 * Meta Panel Option Migration
		 *
		 * @access    public
		 * @since     4.4
		 */

		public function meta_panel_migration( $post_ID ) {

			// migrate hero style
            $value = get_post_meta( $post_ID, 'ut_page_hero_global_style', true );

            if( $value ) {

                // single options
                update_post_meta( $post_ID, 'ut_page_hero_style_global_overwrite', $value );
                update_post_meta( $post_ID, 'ut_page_hero_font_style_global_overwrite', $value );
                update_post_meta( $post_ID, 'ut_page_hero_width_global_overwrite', $value );
                update_post_meta( $post_ID, 'ut_page_hero_align_global_overwrite', $value );

                // option groups
                update_post_meta( $post_ID, 'ut_page_hero_overlay_global_overwrite', $value );
                update_post_meta( $post_ID, 'ut_page_hero_overlay_effect_global_overwrite', $value );
                update_post_meta( $post_ID, 'ut_page_hero_border_bottom_global_overwrite', $value );
                update_post_meta( $post_ID, 'ut_page_hero_fancy_border_global_overwrite', $value );

                delete_post_meta( $post_ID, 'ut_page_hero_global_style');

            }

			// delete old options
			if( ot_get_option( 'ut_site_layout', 'multisite' ) == 'multisite' && get_post_meta( $post_ID, 'ut_show_color_options', true ) == 'hide' ) {

				$options = array(
					'ut_color_skin_headline',
					'ut_color_skin_headline_info',
					'ut_show_color_options',
					'ut_section_skin',
					'ut_color_settings_headline',
					'ut_section_title_color',
					'ut_section_title_glow',
					'ut_section_slogan_color',
					'ut_content_colors_headline',
					'ut_section_background_color',
					'ut_section_heading_color',
					'ut_section_text_color',
					'ut_section_class'
				);

				foreach( $options as $option ) {

					delete_post_meta( $post_ID, $option );

				}

			}

			// migrate hero title settings







		}


		/**
		 * Set Global Flag
		 *
		 * @return    void
		 *
		 * @access    public
		 * @since     4.4
		 */

		public function set_global_flag() {

			/* get nonce */
			$nonce = $_POST[ 'nonce' ];

			/* check if nonce is set and correct */
			if ( !wp_verify_nonce( $nonce, 'ut-global-flag-nonce' ) ) {
				die( 'Busted!' );
			}

			if ( current_user_can( 'manage_options' ) ) {

				$ID = isset( $_POST[ 'post' ] ) ? ( int )$_POST[ 'post' ] : '';
				$option = sanitize_text_field( $_POST[ 'option' ] );
				$value = sanitize_text_field( $_POST[ 'value' ] );
				$value = ( $value === 'on' ) ? true : false;

				if ( $value ) {

					update_post_meta( $ID, $option, $value );

				} else {

					delete_post_meta( $ID, $option );

				}

			}

		}


		/**
		 * Load Global Global Value
		 *
		 * @return    void
		 *
		 * @access    public
		 * @since     4.4
		 */

		public function load_global_value() {

			// get nonce
			$nonce = $_POST[ 'nonce' ];

			// check if nonce is set and correct
			if ( !wp_verify_nonce( $nonce, 'ut-global-flag-nonce' ) ) {
				die( 'Busted!' );
			}

			if ( current_user_can( 'manage_options' ) ) {

				$option = $_POST['option'];
				$option = str_replace( 'ut_page_', 'ut_global_', $option );

				if( !empty( $_POST['option_key'] ) ) {

				    $option = sanitize_text_field($_POST['option_key'] );

                }

				// get the saved options
				$options = get_option('option_tree');

				// check if global id has been used
				if( isset( $options[$option] ) && '' != $options[$option] ) {

					if( is_array( $options[$option] ) ) {

						echo json_encode( $options[$option] );

					} else {

						echo $options[$option];

					}

					exit();

				} else {

					echo ''; // empty value

					exit();

				}

			}

		}

        /**
		 * Load Global Global Dynamic Value
		 *
		 * @return    void
		 *
		 * @access    public
		 * @since     4.9.6.7
		 */

		public function load_global_dynamic_value() {

			// get nonce
			$nonce = $_POST[ 'nonce' ];

			// check if nonce is set and correct
			if ( !wp_verify_nonce( $nonce, 'ut-global-flag-nonce' ) ) {
				die( 'Busted!' );
			}

			if ( current_user_can( 'manage_options' ) ) {

			    // @todo check return - remove px value from older version

                if( isset( ut_font_responsive_settings()[$_POST['relation']] ) )  {

                    $font_responsive_settings = ut_font_responsive_settings()[$_POST['relation']];
                    $relations_key = sanitize_text_field($_POST['relation_key'] );

                    $globals = array(
                        $relations_key                 => $font_responsive_settings['base-' . $relations_key],
                        $relations_key . '-unit'       => $font_responsive_settings[$relations_key . '-unit'],
                        $relations_key . '-responsive' => array()
                    );

                    foreach( ot_recognized_breakpoints() as $key => $breakpoint ) {

                        if( $key !== 'desktop_large' ) {

                            $value = $font_responsive_settings[$relations_key][$key] == 'auto' ? '' : $font_responsive_settings[$relations_key][$key];
                            $globals[$relations_key . '-responsive'][$key] = $value;

                        }

                    }

                    wp_send_json($globals );

                } else {

                    wp_die();

                }

			}

		}

		/**
		 * Set Global Flag
		 *
		 * @return    void
		 *
		 * @access    public
		 * @since     5.0
		 */

		public function load_meta_panel_section() {

			// get nonce
			$nonce = trim( $_POST['nonce'] );

			// check if nonce is set and correct
			if ( !wp_verify_nonce( $nonce, $this->meta_box['id'] ) ) {
				wp_die( 'Busted!' );
			}

			$section_id = isset( $_POST['section'] ) ? $_POST['section'] : '';
			$post_ID = isset( $_POST['post_ID'] ) ? (int)$_POST['post_ID'] : '';

			$post = get_post( $post_ID );

			// build metabox container
			foreach ( $this->meta_box[ 'sections' ] as $section ) {

				if( $section_id !== $section['id'] ) {
					continue;
				}

				/**
				 * Strip or add menu items
				 */

				if ( ot_get_option( 'ut_site_layout', 'multisite' ) == 'onepage' && get_post_meta( $post_ID, 'ut_page_type', true ) == 'section' ) {

					/* options - which are not supported by sections */
					if ( in_array( $section[ 'id' ], $this->one_page_not_supported ) ) {

						continue;

					}

				} else {

					/* special one page options - gets stripped for all regular metaboxes */
					if ( in_array( $section[ 'id' ], $this->one_page_supported ) ) {

						continue;

					}

				}

				if ( isset( $section[ 'subsection' ] ) ) {

					$tabs_dependency = isset( $section['subsection_required'] ) ? $section['subsection_required'] : array();

					$this->build_meta_box_menu( $section[ 'subsection' ], 'ui-tabs-nav-inner', false );

					foreach ( $section[ 'subsection' ] as $subsection ) {

						/**
						 * Strip or add menu items
						 */

						if ( ot_get_option( 'ut_site_layout', 'multisite' ) == 'onepage' && get_post_meta( $post_ID, 'ut_page_type', true ) == 'section' ) {

							/* options - which are not supported by sections */
							if ( in_array( $subsection[ 'id' ], $this->one_page_not_supported ) ) {

								continue;

							}

						} else {

							/* special one page options - gets stripped for all regular metaboxes */
							if ( in_array( $subsection[ 'id' ], $this->one_page_supported ) ) {

								continue;

							}

						}

						echo '<div id="' . esc_attr( $subsection[ 'id' ] ) . '" class="ui-tabs-panel ui-tabs-panel-inner clearfix">';

						foreach ( $this->meta_box[ 'fields' ] as $field ) {

							/* next item */
							if ( isset( $field[ 'metapanel' ] ) && $field[ 'metapanel' ] != $subsection[ 'id' ] ) {
								continue;
							}

							if ( ot_get_option( 'ut_site_layout', 'multisite' ) == 'onepage' && get_post_meta( $post_ID, 'ut_page_type', true ) == 'section' ) {

								/* options - which are not supported by sections */
								if( in_array( $field['id'], $this->one_page_not_supported_fields ) ) {
									continue;
								}

							}

							/* create field */
							$this->meta_box_option( $post, $field );

						}

						if ( $this->panel_list_open ) {

							echo '</ul>';

							$this->panel_list_open = false;

						}

						echo '</div>';

					}

				} else {

					/* loop through field which are part of this container */
					foreach ( $this->meta_box[ 'fields' ] as $field ) {

						/* next item */
						if ( isset( $field[ 'metapanel' ] ) && $field[ 'metapanel' ] != $section[ 'id' ] ) {
							continue;
						}

						if ( ot_get_option( 'ut_site_layout', 'multisite' ) == 'onepage' && get_post_meta( $post_ID, 'ut_page_type', true ) == 'section' ) {

							/* options - which are not supported by sections */
							if ( in_array( $field['id'], $this->one_page_not_supported_fields ) ) {
								continue;
							}

						}

						/* create field */
						$this->meta_box_option( $post, $field );

					}

					if ( $this->panel_list_open ) {

						echo '</ul>';

						$this->panel_list_open = false;

					}

				}

			}


			wp_die();

		}


		/**
		 * Saves the meta box values
		 *
		 * @return    mixed
		 *
		 * @access    public
		 * @since     1.0
		 */
		function save_meta_box( $post_id, $post_object ) {

			global $pagenow;

			/* don't save if $_POST is empty */
			if ( empty( $_POST ) ) {
				return $post_id;
			}

			/* don't save during quick edit */
			if ( $pagenow == 'admin-ajax.php' ) {
				return $post_id;
			}

			/* don't save during autosave */
			if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
				return $post_id;
			}

			/* don't save if viewing a revision */
			if ( $post_object->post_type == 'revision' || $pagenow == 'revision.php' ) {
				return $post_id;
			}

			/* verify nonce */
			if ( isset( $_POST[ $this->meta_box[ 'id' ] . '_nonce' ] ) && !wp_verify_nonce( $_POST[ $this->meta_box[ 'id' ] . '_nonce' ], $this->meta_box[ 'id' ] ) ) {
				return $post_id;
			}

			/* check permissions */
			if ( isset( $_POST[ 'post_type' ] ) && 'page' == $_POST[ 'post_type' ] ) {

				if ( !current_user_can( 'edit_page', $post_id ) ) {
					return $post_id;
				}

			} else {

				if ( !current_user_can( 'edit_post', $post_id ) ) {
					return $post_id;
				}

			}

			$loaded_panels = isset( $_POST['ut_loaded_panels'] ) ? explode(',', $_POST['ut_loaded_panels'] ) : array();

			// old portfolio fields
			if( get_post_type( $post_id ) == 'portfolio' ) {

				$this->meta_box['fields'][] = array(
					'id'        => 'ut_page_slogan',
					'type'      => 'textarea',
					'metapanel' => 'ut-page-header-settings'
				);

			}

			// loop through metabox
			foreach ( $this->meta_box['fields'] as $field ) {

				$old = get_post_meta( $post_id, $field['id'], true );
				$new = '';

				$meta_key = $field['id'];

				/* there is data to validate */
				if ( isset( $_POST[ $field[ 'id' ] ] ) ) {

					/* slider and list item */
					if ( in_array( $field[ 'type' ], array( 'list-item', 'slider' ) ) ) {

						/* required title setting */
						$required_setting = array(
							array(
								'id' => 'title',
								'label' => __( 'Title', 'unitedthemes' ),
								'desc' => '',
								'std' => '',
								'type' => 'text',
								'rows' => '',
								'class' => 'option-tree-setting-title',
								'post_type' => '',
								'choices' => array()
							)
						);

						/* get the settings array */
						$settings = isset( $_POST[ $field[ 'id' ] . '_settings_array' ] ) ? ot_decode( $_POST[ $field[ 'id' ] . '_settings_array' ] ) : array();

						/* settings are empty for some odd ass reason get the defaults */
						if ( empty( $settings ) ) {
							$settings = 'slider' == $field[ 'type' ] ?
								ot_slider_settings( $field[ 'id' ] ) :
								ot_list_item_settings( $field[ 'id' ] );
						}

						/* merge the two settings array */
						$settings = array_merge( $required_setting, $settings );

						foreach ( $_POST[ $field[ 'id' ] ] as $k => $setting_array ) {

							foreach ( $settings as $sub_setting ) {

								/* verify sub setting has a type & value */
								if ( isset( $sub_setting[ 'type' ] ) && isset( $_POST[ $field[ 'id' ] ][ $k ][ $sub_setting[ 'id' ] ] ) ) {

									$_POST[ $field[ 'id' ] ][ $k ][ $sub_setting[ 'id' ] ] = ot_validate_setting( $_POST[ $field[ 'id' ] ][ $k ][ $sub_setting[ 'id' ] ], $sub_setting[ 'type' ], $sub_setting[ 'id' ] );

								}

							}

						}

						/* set up new data with validated data */
						$new = $_POST[ $field[ 'id' ] ];

					} else {

						/* run through validattion */
						$new = ot_validate_setting( $_POST[ $field[ 'id' ] ], $field[ 'type' ], $field[ 'id' ] );

					}

				}

				/* check if current post is in menu */
				if ( $field[ 'id' ] == 'ut_page_type' ) {

					$in_menu = $this->get_page_menu_id( $post_id );

					if ( $in_menu && get_post_type( $post_id ) == 'page' ) {

						update_post_meta( $in_menu, '_menu_item_menutype', $new );

					}

				}

				// there is a multikey field to validate
				if ( isset( $field['multikey'] ) && isset( $_POST[ $field['multikey'] ] ) ) {

					$old = get_post_meta( $post_id, $field['multikey'], true );
					$new = array();

					$meta_key = $field['multikey'];

					foreach( $_POST[$field['multikey']] as $o_k => $option_field_value ) {

						$new[$o_k] = ot_validate_setting( $option_field_value, $field['type'], $field['id'] );

					}

				}

				if ( isset( $new ) && $new !== $old ) {

					// do not save if global option overwrite is not active
					$global_overwrite = isset( $_POST[$meta_key . '_global_overwrite'] );

					if( isset( $field['global'] ) && $global_overwrite ) {

						update_post_meta( $post_id, $meta_key, $new );
						update_post_meta( $post_id, $meta_key . '_global_overwrite', $global_overwrite );

					} elseif( isset( $field['global'] ) && !$global_overwrite ) {

						delete_post_meta( $post_id, $meta_key );
						delete_post_meta( $post_id, $meta_key . '_global_overwrite' );

					} else {

						update_post_meta( $post_id, $meta_key, $new );

					}

				} else if( isset( $new ) && $new === $old ) {

					// do not save if global option overwrite is active
					$global_overwrite = isset( $_POST[$meta_key . '_global_overwrite'] );

					if( isset( $field['global'] ) && !$global_overwrite ) {

						delete_post_meta( $post_id, $meta_key, $old );

					}

				} else if ( '' == $new && $old ) {

					delete_post_meta( $post_id, $meta_key, $old );

				}

				// the panel of this option was not loaded so we keep its original value
				if( !empty( $loaded_panels ) && isset( $field['metapanel'] ) && !in_array( $field['metapanel'], $loaded_panels ) ) {

					update_post_meta( $post_id, $meta_key, $old );

				}

			}

		}

	}

}

/**
 * This method instantiates the meta box class & builds the UI.
 *
 * @uses     OT_Meta_Box()
 *
 * @param    array    Array of arguments to create a meta box
 * @return   void
 *
 * @access   public
 * @since    2.0
 */
if ( !function_exists( 'ot_register_meta_box' ) ) {

	function ot_register_meta_box( $args ) {

		if ( !$args ) {
			return;
		}

		$ot_meta_box = new OT_Meta_Box( $args );

		// global options switch event
		add_action( 'wp_ajax_set_global_flag', array( $ot_meta_box, 'set_global_flag' ) );
		add_action( 'wp_ajax_load_global_value', array( $ot_meta_box, 'load_global_value' ) );
		add_action( 'wp_ajax_load_global_dynamic_value', array( $ot_meta_box, 'load_global_dynamic_value' ) );

		// load panel ajax event
		add_action( 'wp_ajax_load_meta_panel_section', array( $ot_meta_box, 'load_meta_panel_section' ) );

	}

}