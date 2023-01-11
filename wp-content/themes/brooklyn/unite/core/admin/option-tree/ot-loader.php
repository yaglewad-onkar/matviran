<?php

/**
 * This is the OptionTree loader class.
 *
 * @package   OptionTree
 * @author    Derek Herman <derek@valendesigns.com>
 * @copyright Copyright (c) 2013, Derek Herman
 */
if ( !class_exists( 'OT_Loader' ) ) {

    class OT_Loader {

        /**
         * PHP5 constructor method.
         *
         * This method loads other methods of the class.
         *
         * @return    void
         *
         * @access    public
         * @since     2.0
         */
        public function __construct() {

            /* load OptionTree */
            add_action( 'after_setup_theme', array( $this, 'load_option_tree' ), 1 );

        }


        /** 
         * Load OptionTree on the 'after_setup_theme' action. Then filters will 
         * be availble to the theme, and not only when in Theme Mode.
         *
         * @return    void
         *
         * @access    public
         * @since     2.1.2
         */
        public function load_option_tree() {

            /* setup the constants */
            $this->constants();

            /* include the required admin files */
            $this->admin_includes();

            /* hook into WordPress */
            $this->hooks();

        }

        /**
         * Constants
         *
         * Defines the constants for use within OptionTree. Constants 
         * are prefixed with 'OT_' to avoid any naming collisions.
         *
         * @return    void
         *
         * @access    private
         * @since     2.0
         */
        private function constants() {

            /**
             * Current Version number.
             */
            define( 'UT_THEME_VERSION', '2.1.4' );

            /**
             * For developers: Allow Unfiltered HTML in all the textareas.
             *
             * Run a filter and set to true if you want all the
             * users to be able to post anything in the textareas.
             * WARNING: This opens a security hole for low level users
             * to be able to post malicious scripts, you've been warned.
             *
             * @since     2.0
             */
            define( 'OT_ALLOW_UNFILTERED_HTML', apply_filters( 'ot_allow_unfiltered_html', false ) );

            /**
             * For developers: Theme mode.
             *
             * Run a filter and set to true to enable OptionTree theme mode.
             * You must have this files parent directory inside of 
             * your themes root directory. As well, you must include 
             * a reference to this file in your themes functions.php.
             *
             * @since     2.0
             */
            define( 'OT_THEME_MODE', apply_filters( 'ot_theme_mode', false ) );

            /**
             * For developers: Child Theme mode. TODO document
             *
             * Run a filter and set to true to enable OptionTree child theme mode.
             * You must have this files parent directory inside of 
             * your themes root directory. As well, you must include 
             * a reference to this file in your themes functions.php.
             *
             * @since     2.0.15
             */
            define( 'OT_CHILD_THEME_MODE', apply_filters( 'ot_child_theme_mode', false ) );

            /**
             * For developers: Custom Theme Option page
             *
             * Run a filter and set to false if you want to hide the OptionTree 
             * Theme Option page and build your own.
             *
             * @since     2.1
             */
            define( 'OT_USE_THEME_OPTIONS', apply_filters( 'ot_use_theme_options', true ) );

            /**
             * For developers: Meta Boxes.
             *
             * Run a filter and set to false to keep OptionTree from
             * loading the meta box resources.
             *
             * @since     2.0
             */
            define( 'OT_META_BOXES', apply_filters( 'ot_meta_boxes', true ) );

            /**
             * Check if in theme mode.
             *
             * If OT_THEME_MODE and OT_CHILD_THEME_MODE is false, set the 
             * directory path & URL like any other plugin. Otherwise, use 
             * the parent or child themes root directory. 
             *
             * @since     2.0
             */
            if ( false == OT_THEME_MODE && false == OT_CHILD_THEME_MODE ) {
                define( 'OT_DIR', plugin_dir_path( __FILE__ ) );
                define( 'OT_URL', plugin_dir_url( __FILE__ ) );
            } else {
                if ( true == OT_CHILD_THEME_MODE ) {
                    define( 'OT_DIR', trailingslashit( get_stylesheet_directory() ) . trailingslashit( basename( dirname( __FILE__ ) ) ) );
                    define( 'OT_URL', trailingslashit( get_stylesheet_directory_uri() ) . trailingslashit( basename( dirname( __FILE__ ) ) ) );
                } else {
                    define( 'OT_DIR', trailingslashit( get_template_directory() ) . trailingslashit( basename( dirname( __FILE__ ) ) ) );
                    define( 'OT_URL', trailingslashit( get_template_directory_uri() ) . trailingslashit( basename( dirname( __FILE__ ) ) ) );
                }
            }

            /**
             * Template directory URI for the current theme.
             *
             * @since     2.1
             */
            if ( true == OT_CHILD_THEME_MODE ) {
                define( 'OT_THEME_URL', get_stylesheet_directory_uri() );
            } else {
                define( 'OT_THEME_URL', get_template_directory_uri() );
            }

        }

        /**
         * Include admin files
         *
         * These functions are included on admin pages only.
         *
         * @return    void
         *
         * @access    private
         * @since     2.0
         */
        private function admin_includes() {

            /* exit early if we're not on an admin page */
            if ( !is_admin() )
                return false;

            /* global include files */
            $files = array(
                'ot-functions-admin',
                'ot-functions-option-types',
                'ot-settings-api'
            );

            /* include the meta box api */
            if ( OT_META_BOXES == true ) {
                $files[] = 'ot-meta-box-api';
                $files[] = 'ot-meta-box-api-enhanced';
            }

            /* require the files */
            foreach ( $files as $file ) {
                $this->load_file( OT_DIR . "includes/{$file}.php" );
            }

            /* Registers the Theme Option page */
            add_action( 'init', 'ot_register_theme_options_page' );

        }


        /**
         * Execute the WordPress Hooks
         *
         * @return    void
         *
         * @access    public
         * @since     2.0
         */
        private function hooks() {

            /* prepares the after save do_action */
            add_action( 'admin_init', 'ot_after_theme_options_save', 1 );

            /* create media post */
            add_action( 'admin_init', 'ot_create_media_post', 8 );

            /* global CSS */
            add_action( 'admin_head', array( $this, 'global_admin_css' ) );

            /* AJAX call to create a new choice */
            add_action( 'wp_ajax_add_choice', array( $this, 'add_choice' ) );

            /* AJAX call to create a new list item */
            add_action( 'wp_ajax_add_list_item', array( $this, 'add_list_item' ) );

            /* Modify the media uploader button */
            add_filter( 'gettext', array( $this, 'change_image_button' ), 10, 3 );
			
			// Adds the temporary hacktastic shortcode
		  	add_filter( 'media_view_settings', array( $this, 'shortcode' ), 10, 2 );

		  	// AJAX update
		  	add_action( 'wp_ajax_gallery_update', array( $this, 'ajax_gallery_update' ) );

        }

        /**
         * Load a file
         *
         * @return    void
         *
         * @access    private
         * @since     2.0.15
         */
        private function load_file( $file ) {

            //include_once( $file );
            include( $file );

        }
		
		/**
		 * Fake the gallery shortcode
		 *
		 * The JS takes over and creates the actual shortcode with 
		 * the real attachment IDs on the fly. Here we just need to 
		 * pass in the post ID to get the ball rolling.
		 *
		 * @param     array     The current settings
		 * @param     object    The post object
		 * @return    array
		 *
		 * @access    public
		 * @since     4.6.5
		 */
		public function shortcode( $settings, $post ) {
		  global $pagenow;

		  if ( in_array( $pagenow, array( 'upload.php', 'customize.php' ) ) ) {
			return $settings;
		  }

		  // Set the OptionTree post ID
		  if ( ! is_object( $post ) ) {
			$post_id = isset( $_GET['post'] ) ? $_GET['post'] : ( isset( $_GET['post_ID'] ) ? $_GET['post_ID'] : 0 );
			if ( $post_id == 0 && function_exists( 'ot_get_media_post_ID' ) ) {
			  $post_id = ot_get_media_post_ID();
			}
			$settings['post']['id'] = $post_id;
		  }

		  // No ID return settings
		  if ( $settings['post']['id'] == 0 )
			return $settings;

		  // Set the fake shortcode
		  $settings['ut_gallery'] = array( 'shortcode' => "[gallery id='{$settings['post']['id']}']" );

		  // Return settings
		  return $settings;

		}

		/**
		 * Returns the AJAX images
		 *
		 * @return    string
		 *
		 * @access    public
		 * @since     4.6.5
		 */
		public function ajax_gallery_update() {

		  if ( ! empty( $_POST['ids'] ) )  {

			$return = '';

			foreach( $_POST['ids'] as $id ) {

			  $thumbnail = wp_get_attachment_image_src( $id, 'thumbnail' );

			  $return .= '<li><img  src="' . $thumbnail[0] . '" width="150" height="150" /></li>';

			}

			echo $return;
			exit();

		  }

		}
		
		
        /**
         * Adds the global CSS to fix the menu icon.
         */
        public function global_admin_css() {
            echo '<style>#adminmenu #toplevel_page_ot-settings .wp-menu-image img { padding: 5px 0px 1px 6px !important; } </style>';
        }


        /**
         * AJAX utility function for adding a new choice.
         */
        public function add_choice() {
            echo ot_choices_view( $_REQUEST[ 'name' ], $_REQUEST[ 'count' ] );
            die();
        }

        /**
         * AJAX utility function for adding a new list item.
         */
        public function add_list_item() {
            ot_list_item_view( $_REQUEST[ 'name' ], $_REQUEST[ 'count' ], array(), $_REQUEST[ 'post_id' ], $_REQUEST[ 'get_option' ], ot_decode( $_REQUEST[ 'settings' ] ), $_REQUEST[ 'type' ], $_REQUEST[ 'list_title' ] );
            die();
        }

        /**
         * Filters the media uploader button.
         *
         * @return    string
         *
         * @access    public
         * @since     2.1
         */
        public function change_image_button( $translation, $text, $domain ) {
            global $pagenow;

            if ( $pagenow == 'admin.php' && 'default' == $domain && 'Insert into post' == $text ) {

                // Once is enough.
                remove_filter( 'gettext', array( $this, 'ot_change_image_button' ) );
                return 'Send to Theme Options';

            }

            return $translation;

        }

    }

    /**
     * Instantiate the OptionTree loader class.
     *
     * @since     2.0
     */
    new OT_Loader();

}