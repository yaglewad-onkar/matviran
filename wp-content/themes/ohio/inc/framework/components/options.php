<?php

class OhioOptions {

	/**
	 * Current page slugs instant cache
	 *
	 * @var null|array
	 */
	static protected $page_is_keys = null;

	/**
	 * Last getted setting type (global, local, blog, etc.)
	 *
	 * @var null|string
	 */
	static protected $last_select_type = null;

	/**
	 * Option select stacktrace array for debuging
	 *
	 * @var null|array
	 */
	static protected $last_select_stacktrace = null;

	/**
	 * Options cache using
	 *
	 * @var null|bool
	 */
	static protected $use_cache = null;

	/**
	 * Returns settings value and cache result after first call
	 *
	 * @param string $key Option key
	 * @param mixed $default_value Default value if option is null
	 * @param bool $ignore_empty_strings Handle empty string value as inheritable
	 * @return mixed Value
	 */
	static public function get( $key, $default_value = null, $force_id = null, $ignore_empty_strings = false ) {
		$_stacktrace = [];

		// Get local option
		$type = 'local';
		$option_value = self::get_local( $key, $force_id );
		$_stacktrace[] = [ $key, $option_value ];

		if ( self::is_inheritable( $option_value, $ignore_empty_strings ) ) {
			// Get global slug option
			$detected_types = self::get_types_by_page();

			foreach ( $detected_types as $type ) {
				$option_value = self::get_global( $type . '_' . $key );
				$_stacktrace[] = [ 'global_' . $type . '_' . $key, $option_value ];

				if ( !self::is_inheritable( $option_value, $ignore_empty_strings ) ) break;
			}

			// Get global option
			if ( self::is_inheritable( $option_value, $ignore_empty_strings ) ) {
				$type = 'global';
				$option_value = self::get_global( $key );
				$_stacktrace[] = [ 'global_' . $key, $option_value ];
			}
		}

		self::$last_select_type = $type;
		self::$last_select_stacktrace = $_stacktrace;

		// Set default option
		if ( is_null( $option_value ) ) {
			$option_value = $default_value;
		}
		if ( $ignore_empty_strings && is_string( $option_value ) && empty( $option_value ) ) {
			$option_value = $default_value;
		}

		return $option_value;
	}

	/**
	 * Option value by forced type
	 *
	 * @param string $key
	 * @param string $type
	 * @return mixed
	 */
	static public function get_by_type( $key, $type = 'global', $default_value = null ) {
		switch ( $type ) {
			case 'local':
				$local_value = self::get_local( $key );

				if ( self::is_inheritable( $local_value ) ) return $default_value;

				return $local_value;

			case 'global':
				return self::get_global( $key, $default_value );

			default:
				return self::get_global( $type . '_' . $key, $default_value );
		}
	}

	/**
	 * Post/page option value
	 *
	 * @param string $key Option key
	 * @param null|int $force_id Forced post id
	 * @return mixed Value
	 */
	static public function get_local( $key, $force_id = null ) {
		global $post;

		if ( $force_id ) {
			$post_id = $force_id;
		} else {
			$post_id = self::service_page_post_id();
			
			if ( !$post_id ) {
				if ( self::current_page_has_not_id() ) {
					return null;
				}

				$post_id = get_queried_object_id();
			
				if ( !$post_id ) {
					$post_id = empty( $post->ID ) ? null : $post->ID;
				}
			}
		}

		if (!$post_id) return null;

		if ( function_exists( 'get_field' ) && !self::page_is( 'preview' ) ) {
			$option_value = get_field( $key, $post_id );
		} else {
			$option_value = get_post_meta( $post_id, $key, true );
			if ($option_value === false || $option_value === '') {
				$option_value = null;
			}
		}

		return $option_value;
	}

	/**
	 * Global option value
	 *
	 * @param string $key Option key
	 * @return mixed Value
	 */
	static public function get_global( $key, $default_value = null ) {
		if ( function_exists('icl_get_languages') ) {
			self::$use_cache = false; // Not compatible with WPML
		}

		if ( is_null(self::$use_cache) ) {
			$use_cache = get_option( 'options_global_options_cache', null );
			self::$use_cache = !is_null($use_cache) ? (bool) $use_cache : true;
		}

		if ( self::$use_cache && OhioOptionsCache::has( 'global_' . $key ) ) {
			$option_value = OhioOptionsCache::get( 'global_' . $key );
		} else {
			if ( function_exists( 'get_field' ) ) {
				$option_value = get_field( 'global_' . $key, 'option' );
			} else {
				$option_value = get_option( 'options_global_' . $key, null );
			}

			if ( self::$use_cache ) {
				OhioOptionsCache::set( 'global_' . $key, $option_value );
			}
		}

		return ( !is_null( $option_value ) ) ? $option_value : $default_value;
	}

	/**
	 * Return id for some service pages (doesn't have an entry in the database)
	 *
	 * @return bool This page hasn't id
	 */
	static function service_page_post_id() {
		if ( self::page_is( 'ecommerce' ) ) {
			$woo_post_id = -1;

			if ( self::page_is( 'shop') )      $woo_post_id = wc_get_page_id( 'shop' );
			if ( self::page_is( 'cart' ) )     $woo_post_id = wc_get_page_id( 'cart' );
			if ( self::page_is( 'checkout' ) ) $woo_post_id = wc_get_page_id( 'checkout' );
			if ( self::page_is( 'account' ) )  $woo_post_id = wc_get_page_id( 'myaccount' );

			if ( $woo_post_id !== -1 ) {
				return $woo_post_id;
			}
		}

		if ( self::page_is( 'home' ) && !self::page_is( 'page' ) ) {
			$frontpage_id = get_option( 'page_on_front' );
			if ( $frontpage_id ) {
				return $frontpage_id;
			}

			$blog_id = get_option( 'page_for_posts' );
			if ( $blog_id ) {
				return $blog_id;
			}
		}

		return null;
	}

	/**
	 * Current page is service
	 *
	 * @return bool This page hasn't id
	 */
	static function current_page_has_not_id() {
		// TODO: update this list?
		if (
			self::page_is( '404' ) || 
			self::page_is( 'search' ) || 
			self::page_is( 'portfolio_category' ) || 
			self::page_is( 'portfolio_tag' ) || 
			( self::page_is( 'archive' ) && !self::page_is( 'shop' ) ) 
		) {
			return true;
		}

		if ( self::page_is( 'home' ) && !self::page_is( 'page' ) ) {
			if ( empty( get_option( 'page_on_front' ) ) && empty( get_option( 'page_for_posts' ) ) ) {
				return true;
			}
		}

		return false;
	}

	/**
	 * Return all pages type slugs. Cached after first call
	 *
	 * @param string|null $key Page slug
	 * @param bool $strictly Apply for only first slug
	 * @return bool|string|array Is include or slugs list
	 */
	static function page_is( $key = null, $strictly = false ) {
		global $wp_query;

		$post_id = $wp_query->queried_object_id;
		$cases = [];

		if ( is_array( self::$page_is_keys ) ) {
			$cases = self::$page_is_keys;
		} else {
			if ( is_preview() ) {
				$cases[] = 'preview';
			}
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
			if ( function_exists( 'is_account_page' ) && is_account_page() ) {
				$cases[] = 'account';
			}
			if ( get_post_type( $post_id ) == 'ohio_portfolio' ) {
				$cases[] = 'project';
			}
			if ( is_tax( 'ohio_portfolio_category' ) ) {
				$cases[] = 'portfolio_category';
			}
			if ( is_tax( 'ohio_portfolio_tags' ) ) {
				$cases[] = 'portfolio_tag';
			}
			if ( is_single() && ( get_post_type( $post_id ) == 'post' ) ) {
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
			if ( is_404() ) {
				$cases[] = '404';
			}
			if ( get_page_template_slug( $post_id ) == 'page_templates/page_for-builder.php' ) {
				$cases[] = 'for_builder';
			}
			if ( get_page_template_slug( $post_id ) == 'page_templates/page_for-projects.php' ) {
				$cases[] = 'projects_page';
			}
			if ( get_page_template_slug( $post_id ) == 'page_templates/page_for-posts.php' ) {
				$cases[] = 'blog_template';
			}
			if ( is_home() || get_page_template_slug( $post_id ) == 'page_templates/page_for-posts.php' ) {
				$cases[] = 'blog';
			}
			if ( is_home() ) {
				$cases[] = 'home';
			}
			if ( $wp_query->is_page() ) {
				$cases[] = 'page';
			}
			if ( in_array( 'shop', $cases ) || in_array( 'cart', $cases ) || in_array( 'checkout', $cases )
				|| in_array( 'account', $cases ) || in_array( 'product', $cases )
				|| in_array( 'product_category', $cases ) || in_array( 'product_tag', $cases ) ) {
				$cases[] = 'ecommerce';
			}
			if ( function_exists( 'yith_wcwl_is_wishlist_page' ) && yith_wcwl_is_wishlist_page() ) {
				$cases[] = 'ecommerce';
				$cases[] = 'wishlist';
			}

			self::$page_is_keys = $cases;
		}

		if ( $strictly ) {
			if ( !isset( $cases[0] ) ) {
				return false;
			}

			return ( $key ) ? ( $key == $cases[0] ) : $cases[0];
		} else {
			return ( $key ) ? in_array( $key, $cases ) : $cases;
		}
	}

	static public function get_types_by_page() {
		$types = [];

		if ( self::page_is( 'product' ) ) {
			$types[] = 'product';
		}
		if ( self::page_is( 'ecommerce' ) ) {
			$types[] = 'woocommerce';
		}

		if ( self::page_is( 'project' ) ) {
			$types[] = 'project';
		}
		if ( self::page_is( 'projects_page' ) || self::page_is( 'portfolio_category' ) || self::page_is( 'portfolio_tag' ) ) {
			$types[] = 'portfolio';
		}

		if ( $types ) return $types; // prevent blog types

		if ( self::page_is( 'single' ) ) {
			$types[] = 'post';
		}
		if ( self::page_is( 'blog' ) || self::page_is( 'blog_template' )
			|| self::page_is( 'archive' ) || self::page_is( 'search' )
			|| self::page_is( 'category' ) || self::page_is( 'tag' )
			|| self::page_is( 'author' ) ) {
			$types[] = 'blog';
		}

		return $types;
	}

	/**
	 * Returns last get() function call setting type
	 *
	 * @return string|null Type
	 */
	static public function get_last_select_type() {
		return self::$last_select_type;
	}

	static public function show_last_select_stacktrace( $die = false ) {
		echo '<pre>';
		var_dump( self::$last_select_stacktrace );
		echo '</pre>';

		if ( $die ) die();
	}

	/**
	 * Value equal null or 'inherit'. Empty strings comparsion optional
	 *
	 * @param mixed $value
	 * @param boolean $with_empty_strings
	 * @return boolean Inheritable
	 */
	static public function is_inheritable( $value, $with_empty_strings = false) {
		$inheritable = [ 'inherit', null ];

		if ( $with_empty_strings && is_string( $value ) && empty( $value ) ) {
			return true;
		}

		return in_array( $value, $inheritable, true );
	}
}