<?php

class OhioSettings {
	static public $page_is_keys = false; // page is ...
	static public $settings_cache = array();

	/* Return settigns value. Cache after first call */
	static function get( $key, $type = 'clear', $id = NULL ) {
		if ( !$key ) return NULL;

		switch ( $type ) {
			case 'global':
				if ( ! in_array( 'global_' . $key, array_keys( self::$settings_cache ) ) ) {
					if( function_exists('get_field')){
						self::$settings_cache[ 'global_' . $key ] = get_field( 'global_' . $key, 'option' );
					} else{
						self::$settings_cache[ 'global_' . $key ] = get_option( 'options_global_' . $key, NULL );
					}
				}
				return self::$settings_cache[ 'global_' . $key ];
			break;

			case 'id':

				if( function_exists('get_field')){
					return get_field( $key, $id );
				} else{
					global $post;
					return get_post_meta( $id, $key );
				}

				break;

			case 'clear':
			default:

				if ( is_home() ) {
					if( function_exists('get_field')){
					return get_field( $key, get_option( 'page_for_posts' ) );
					} else{
						return get_post_meta( get_option( 'page_for_posts' ), $key );
					}
				}

				if ( function_exists( 'is_shop' ) ) {
					if(is_post_type_archive( 'product' ) || get_queried_object_id() == wc_get_page_id( 'shop' ) ) {
						global $product;
						if (!$product) {
							if( function_exists('get_field')){
								return get_field( $key, wc_get_page_id('shop') );
							} else{
								return get_post_meta( wc_get_page_id('shop'), $key );
							}
						}
					}
				}

				if( function_exists('get_field')){
					return get_field( $key );
				} else{
					global $post;
					return get_post_meta( $post->ID, $key );
				}

			break;
		}
	}

	/* Return all page type slugs. Cache after first call */
	static function page_is( $key = false, $strictly = false ) {
		$cases = array();
		if ( is_array( self::$page_is_keys ) ) {
			$cases = self::$page_is_keys;
		} else {
			global $wp_query;

			if ( is_front_page() ) {
				$cases[] = 'front';
			}
			if ( ( function_exists( 'is_shop' ) && is_shop() ) ) {
				$cases[] = 'shop';
			}
			if ( function_exists( 'is_product_category' ) && is_product_category() ) {
				$cases[] = 'product_category';
			}
			if ( function_exists( 'is_product_tag' ) && is_product_tag() ) {
				$cases[] = 'product_tag';
			}
			if ( function_exists( 'is_product' ) && is_product() ) {
				$cases[] = 'product';
			}
			if ( function_exists( 'is_cart' ) && is_cart() ) {
				$cases[] = 'cart';
			}
			if ( function_exists( 'is_checkout' ) && is_checkout() ) {
				$cases[] = 'checkout';
			}
			if ( function_exists( 'is_account' ) && is_account_page() ) {
				$cases[] = 'account';
			}
			if ( function_exists( 'is_product' ) && is_product() ) {
				$cases[] = 'product';
			}
			if ( is_tax( 'ohio_portfolio_category' ) ) {
				$cases[] = 'portfolio_category';
			}
			if ( is_tax( 'ohio_portfolio_tags' ) ) {
				$cases[] = 'portfolio_tag';
			}
			if ( get_post_type() == 'ohio_portfolio' ) {
				$cases[] = 'project';
			}
			if ( is_single() && ( get_post_type() == 'post' ) ) {
				$cases[] = 'single';
			}
			if ( is_search() ) {
				$cases[] = 'search';
			}
			if ( is_category() ) {
				$cases[] = 'category';
			}
			if ( is_tag() ) {
				$cases[] = 'tag';
			}
			if ( is_author() ) {
				$cases[] = 'author';
			}
			if ( is_archive() ) {
				$cases[] = 'archive';
			}
			if ( is_attachment() ) {
				$cases[] = 'attachment';
			}
			if ( function_exists( 'is_product_category' ) && is_product_category() ) {
				$cases[] = 'product_category';
			}
			if ( get_page_template_slug() == 'page_templates/page_for-builder.php' ) {
				$cases[] = 'for_builder';
			}
			if ( get_page_template_slug() == 'page_templates/page_for-projects.php' ) {
				$cases[] = 'projects_page';
			}
			if ( get_page_template_slug() == 'page_templates/page_for-posts.php' ) {
				$cases[] = 'blog_template';
			}
			if ( is_home() || get_page_template_slug() == 'page_templates/page_for-posts.php' ) {
				$cases[] = 'blog';
			}
			if ( is_home() ) {
				$cases[] = 'home';
			}
			if ( $wp_query->is_page() ) {
				$cases[] = 'page';
			}
			if ( function_exists( 'is_shop' ) && function_exists( 'is_cart' ) && function_exists( 'is_checkout' ) && function_exists( 'is_account_page' ) && function_exists( 'is_product_category' ) && function_exists( 'is_product_tag' ) && function_exists( 'is_product' ) ) {
				if ( is_shop() || is_cart() || is_checkout() || is_account_page() || is_product_category() || is_product_tag() || is_product() ) {
					$cases[] = 'ecommerce';
				}
			}
			if ( function_exists( 'yith_wcwl_is_wishlist_page' ) && yith_wcwl_is_wishlist_page() ) {
				$cases[] = 'ecommerce';
				$cases[] = 'wishlist';
			}

			self::$page_is_keys = $cases;
		}
		if ( ! $key ) {
			return ( $strictly ) ? $cases[0] : $cases;
		} else {
			return ( $strictly ) ? ( $key == $cases[0] ) : in_array( $key, $cases );
		}
	}

	/* Return logo objects array for current page */
	static function get_logo( $contrast = false, $fixed = false ) {
		$_sitename_result = 'sitename';
		$_logo_result = array(
			'default' => false,
			'retina' => false,
			'mobile' => false,
			'have_vector' => false,
			'type' => false
		);

		$logo_type = OhioOptions::get( 'page_header_logo_style', 'sitename' );
		$logo_type_select_type = OhioOptions::get_last_select_type();

		if ( $logo_type_select_type == 'global' && $logo_type == 'image' ) {
			$logo_type = OhioOptions::get_global( 'page_header_logo_by_default', 'dark_variant' );
		}

		// Contrast logo
		if ( $contrast && $logo_type == 'dark_variant' ) {
			$_logo = OhioOptions::get_global( 'page_header_logo_image' );
			if ( is_array( $_logo ) && ( $_logo['global_logo_image_light'] || $_logo['global_logo_image_light_retina'] ) ) {
				$logo_type = 'light_variant';
			}
		}

		// Logo for fixed
		if ( $fixed ) {
			$fixed_type = OhioOptions::get_global( 'page_header_logo_when_fixed', 'dark_variant' );
			switch ( $fixed_type ) {
				case 'dark_variant':
					$logo_type = 'dark_variant';
					break;

				case 'light_variant':
					$logo_type = 'light_variant';
					break;

				case 'custom':
					$_logo = OhioOptions::get_global( 'page_header_logo_image_fixed_variant' );
					if ( is_array( $_logo ) ) {
						if ( $_logo['global_logo_image_fixed'] ) {
							$_logo_result['default'] = $_logo['global_logo_image_fixed'];
						}
						if ( $_logo['global_logo_image_fixed_retina'] ) {
							$_logo_result['retina'] = $_logo['global_logo_image_fixed_retina'];
						}
						if ( $_logo['global_logo_image_fixed_mobile'] ) {
							$_logo_result['mobile'] = $_logo['global_logo_image_fixed_mobile'];
						}

						if ( in_array( 'svg', [
							pathinfo( $_logo_result['default'], PATHINFO_EXTENSION ),
							pathinfo( $_logo_result['retina'], PATHINFO_EXTENSION ),
							pathinfo( $_logo_result['mobile'], PATHINFO_EXTENSION )
						] ) ) {
							$_logo_result['have_vector'] = true;
						}
					}
					return $_logo_result;
					break;
				case 'sitename':
					return $_sitename_result;
					break;
			}
		}

		$_logo_result['type'] = $logo_type;

		switch ( $logo_type ) {
			case 'dark_variant':
				$_logo = OhioOptions::get_global( 'page_header_logo_image_dark_variant' );
				if ( is_array( $_logo ) ) {
					if ( $_logo['global_logo_image_dark'] ) {
						$_logo_result['default'] = $_logo['global_logo_image_dark'];
					}
					if ( $_logo['global_logo_image_dark_retina'] ) {
						$_logo_result['retina'] = $_logo['global_logo_image_dark_retina'];
					}
					if ( $_logo['global_logo_image_dark_mobile'] ) {
						$_logo_result['mobile'] = $_logo['global_logo_image_dark_mobile'];
					}
				}
				break;
			case 'light_variant':
				$_logo = OhioOptions::get_global( 'page_header_logo_image' );
				if ( is_array( $_logo ) ) {
					if ( $_logo['global_logo_image_light'] ) {
						$_logo_result['default'] = $_logo['global_logo_image_light'];
					}
					if ( $_logo['global_logo_image_light_retina'] ) {
						$_logo_result['retina'] = $_logo['global_logo_image_light_retina'];
					}
					if ( $_logo['global_logo_image_light_mobile'] ) {
						$_logo_result['mobile'] = $_logo['global_logo_image_light_mobile'];
					}
				}
				break;
			case 'custom':
				$_logo = OhioOptions::get( 'page_header_custom_logo' );
				if ( $_logo ) $_logo_result['default'] = $_logo;
				break;
			case 'sitename':
			default:
				return $_sitename_result;
				break;
		}

		if ( in_array( 'svg', [
			pathinfo( $_logo_result['default'], PATHINFO_EXTENSION ),
			pathinfo( $_logo_result['retina'], PATHINFO_EXTENSION ),
			pathinfo( $_logo_result['mobile'], PATHINFO_EXTENSION )
		] ) ) {
			$_logo_result['have_vector'] = true;
		}

		return $_logo_result;
	}

	/* Return logo objects array for onepage slider */
	static function get_logo_for_onepage() {
		$_logo_result = array(
			'dark' => false,
			'light' => false,
			'dark_retina' => false,
			'light_retina' => false,
			'have_vector' => false
		);

		$_custom_logo = OhioOptions::get( 'page_header_custom_logo' );

		if ($_custom_logo) {
			$_logo_result['light'] = $_custom_logo;
			$_logo_result['dark'] = $_custom_logo;
		} else {
			$_logo = OhioOptions::get_global( 'page_header_logo_image' );
			if ( is_array( $_logo ) ) {
				if ( $_logo['global_logo_image_light'] ) {
					$_logo_result['light'] = $_logo['global_logo_image_light'];
					if ( ( substr( $_logo['global_logo_image_light'], -4, 4) == '.svg' ) ) {
						$_logo_result['have_vector'] = true;
					}
				}
				if ( $_logo['global_logo_image_light_retina'] ) {
					$_logo_result['light_retina'] = $_logo['global_logo_image_light_retina'];
					if ( ( substr( $_logo['global_logo_image_light_retina'], -4, 4) == '.svg' ) ) {
						$_logo_result['have_vector'] = true;
					}
				}
			}
	
			$_logo = OhioOptions::get_global( 'page_header_logo_image_dark_variant' );
			if ( is_array( $_logo ) ) {
				if ( $_logo['global_logo_image_dark'] ) {
					$_logo_result['dark'] = $_logo['global_logo_image_dark'];
					if ( ( substr( $_logo['global_logo_image_dark'], -4, 4) == '.svg' ) ) {
						$_logo_result['have_vector'] = true;
					}
				}
				if ( $_logo['global_logo_image_dark_retina'] ) {
					$_logo_result['dark_retina'] = $_logo['global_logo_image_dark_retina'];
					if ( ( substr( $_logo['global_logo_image_dark_retina'], -4, 4) == '.svg' ) ) {
						$_logo_result['have_vector'] = true;
					}
				}
			}
		}
		

		return $_logo_result;
	}

	static function footer_widget_logo() {
		$_sitename_result = 'sitename';
		$_logo_result = array(
			'default' => false,
			'retina' => false,
			'mobile' => false,
			'have_vector' => false
		);

		$logo_type = OhioOptions::get( 'page_footer_logo_widget_type', 'light_variant' );
		$logo_type_select_type = OhioOptions::get_last_select_type();
		
		switch ( $logo_type ) {
			case 'dark_variant':
				$_logo = OhioOptions::get_global( 'page_header_logo_image_dark_variant' );
				if ( is_array( $_logo ) ) {
					if ( $_logo['global_logo_image_dark'] ) {
						$_logo_result['default'] = $_logo['global_logo_image_dark'];
						if ( ( substr( $_logo['global_logo_image_dark'], -4, 4) == '.svg' ) ) {
							$_logo_result['have_vector'] = true;
						}
					}
					if ( $_logo['global_logo_image_dark_retina'] ) {
						$_logo_result['retina'] = $_logo['global_logo_image_dark_retina'];
						if ( ( substr( $_logo['global_logo_image_dark_retina'], -4, 4) == '.svg' ) ) {
							$_logo_result['have_vector'] = true;
						}
					}
					if ( $_logo['global_logo_image_dark_mobile'] ) {
						$_logo_result['mobile'] = $_logo['global_logo_image_dark_mobile'];
						if ( ( substr( $_logo['global_logo_image_dark_mobile'], -4, 4) == '.svg' ) ) {
							$_logo_result['have_vector'] = true;
						}
					}
				}
				return $_logo_result;
				break;
			case 'light_variant':
				$_logo = OhioOptions::get_global( 'page_header_logo_image' );
				if ( is_array( $_logo ) ) {
					if ( $_logo['global_logo_image_light'] ) {
						$_logo_result['default'] = $_logo['global_logo_image_light'];
						if ( ( substr( $_logo['global_logo_image_light'], -4, 4) == '.svg' ) ) {
							$_logo_result['have_vector'] = true;
						}
					}
					if ( $_logo['global_logo_image_light_retina'] ) {
						$_logo_result['retina'] = $_logo['global_logo_image_light_retina'];
						if ( ( substr( $_logo['global_logo_image_light_retina'], -4, 4) == '.svg' ) ) {
							$_logo_result['have_vector'] = true;
						}
					}
					if ( $_logo['global_logo_image_light_mobile'] ) {
						$_logo_result['mobile'] = $_logo['global_logo_image_light_mobile'];
						if ( ( substr( $_logo['global_logo_image_light_mobile'], -4, 4) == '.svg' ) ) {
							$_logo_result['have_vector'] = true;
						}
					}
				}
				return $_logo_result;
				break;
			case 'custom':
				$_logo = OhioOptions::get_by_type( 'page_footer_custom_logo', $logo_type_select_type );
				if ( $_logo ) {
					$_logo_result['default'] = $_logo;
					$_logo_result['have_vector'] = ( substr( $_logo, -4, 4) == '.svg' );
				}

				return $_logo_result;
				break;
			case 'sitename':
			default:
				return $_sitename_result;
				break;
		}
	}

	/* Show header subtitle? */
	static function header_subtitle_type() {
		$subtitle_type = OhioOptions::get_local( 'page_header_title_subtitle_type' );
		if ( in_array( OhioOptions::get( 'page_header_title_subtitle_type' ), ['inherit', NULL ] ) ) {
			$subtitle_type = OhioOptions::get_global( 'post_subtitle_type', 'generated' );
		}

		return $subtitle_type;
	}

	/* Show header subtitle? */
	static function header_subtitle_custom_text() {
		$custom_text = '';
		if ( OhioOptions::page_is( 'single' ) ) {
			$subtitle_type = OhioOptions::get( 'page_header_title_subtitle_type' );
			if ( $subtitle_type == 'custom' ) {
				//$custom_text = self::get( 'header_subtitle' );
				$custom_text = OhioOptions::get( 'page_header_title_custom_subtitle_text' );
			} elseif ( in_array( OhioOptions::get( 'page_header_title_subtitle_type' ), [ 'inherit', NULL ] ) ) {
				$subtitle_type = OhioOptions::get_global( 'post_subtitle_type' );
				if ( $subtitle_type == 'custom' ) {
					$custom_text = OhioOptions::get( 'post_custom_subtitle', 'global' );
				}
			}
		} else {
			$custom_text = OhioOptions::get( 'page_header_title_custom_subtitle_text', '', null, true );
		}

		return $custom_text;
	}

	static function subheader_is_displayed() {
		$add_subheader = OhioOptions::get( 'page_subheader_visibility', true );

		if ( $add_subheader ) {
			$have_items_left = have_rows( 'global_page_subheader_items_left', 'option' );
			$have_items_right = have_rows( 'global_page_subheader_items_right', 'option' );

			return $have_items_left || $have_items_right;
		}

		return false;
	}

	/* Return slug for woocommerce shop */
	static function breadcrumbs_woocommerce_slug() {
		$woo_slug = esc_html( self::get( 'woocommerce_breadcrumbs_slug', 'global' ) );
		if ( ! $woo_slug ) {
			$woo_slug = get_the_title( get_option( 'woocommerce_shop_page_id' ) );
		}
		return $woo_slug;
	}


	/* Return number of posts on blog page */
	static function posts_per_page() {
		$posts_count = OhioOptions::get( 'blog_posts_per_page', get_option( 'posts_per_page' ) );
		return ( $posts_count ) ? $posts_count : 15;
	}

	/* Logo is loaded image? */
	static function logo_is_image() {
		return ( self::get( 'logo_type', 'global' ) == 'image' );
	}

	static function grid_is_intented() {
		$intented = false;
		return $intented;
	}

	static public function is_coming_soon_page() {
		$option_switched = OhioOptions::get_global( 'coming_soon_switch', false );
		$logged_in = is_admin() || is_user_logged_in();
		$debug_test = !empty( $_GET['coming-soon-preview'] );
		$login_page = $GLOBALS['pagenow'] == 'wp-login.php';

		return ( $option_switched && !$logged_in && !$login_page ) || $debug_test;
	}

}