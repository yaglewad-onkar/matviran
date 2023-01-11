<?php if (!defined('ABSPATH')) {
    exit; // exit if accessed directly
}

$GLOBALS['ut_theme_license'] = '';
$GLOBALS['FastImageSize'] = '';

/**
 * Constants
 *
 * @since     1.0.0
 * @version   1.0.0
 *
 */

/* framework version */
const UT_VERSION = '1.3';

/* theme web url & theme document root */
define( 'THEME_WEB_ROOT' , get_template_directory_uri() );
define( 'THEME_DOCUMENT_ROOT' , get_template_directory() );

/* theme style web url & theme style document root */
define( 'STYLE_WEB_ROOT' , get_stylesheet_directory_uri() );
define( 'STYLE_DOCUMENT_ROOT' , get_stylesheet_directory() );

/* framework web url & framework document root */
const FW_WEB_ROOT = THEME_WEB_ROOT . '/' . 'unite';
const FW_DOCUMENT_ROOT = THEME_DOCUMENT_ROOT . '/' . 'unite';


/**
 * Check if WooCommerce is activated
 *
 * @return    boolean
 *
 * @access    public
 * @since     4.7.4
 */

if ( ! function_exists( 'is_woocommerce_activated' ) ) {
	
	function is_woocommerce_activated() {
	
		return class_exists( 'WooCommerce' );
		
	}
	
}

/**
 * Helper Function: return true if woocommerce shop is displaying
 *
 * @return    boolean
 *
 * @access    public
 * @since     2.0
 */

if ( !function_exists( 'ut_is_shop' ) ) {
	
    function ut_is_shop() {
	
		if( function_exists('is_shop') ) {
            
            return is_shop();
        
        } else {
            
            return false;    
            
        }
		
	}
    
}


/**
 * Initialize the WP filesystem and no more using file_put_contents function
 *
 * @param   $local_file
 * @see     wp_filesystem()
 *
 * @return  string $content
 */

function ut_file_get_content( $local_file ) {

    global $wp_filesystem;

    require_once ( ABSPATH . '/wp-admin/includes/file.php' );
    WP_Filesystem();

    $content = '';

    if( !is_wp_error( $wp_filesystem->errors ) ) {

        if( $wp_filesystem->exists( $local_file ) ) {

            $content = $wp_filesystem->get_contents( $local_file );

        }

    } else {

        $func = 'file_' . 'get_contents';
        $content = $func( $local_file );

    }

    return $content;


}


/** 
 * Load files from parent and if applicable from child
 *
 * @param    string $file filename
 * @param    boolean
 *
 * @return    void
 *
 * @access    private
 * @since     1.0.0
 * @version   1.1.0
 */
    
function _unite_load_file( $file, $child = false ) {

	/* files inside parent theme */
	if( !$child ) {

		$file = THEME_DOCUMENT_ROOT . '/' . $file;
		include( $file );

	}

	/* file can be in child theme but it's not mandatory */
	if( $child ) {

		/* check for file in child theme */
		if( file_exists( STYLE_DOCUMENT_ROOT . '/' . $file ) ) { 

			$file = STYLE_DOCUMENT_ROOT . '/' . $file;
			include( $file );

		} else {                    

			$file = THEME_DOCUMENT_ROOT . '/' . $file;
			include( $file );

		}                

	}        

}


/** 
 * Load all php files from specific folder
 *
 * @param     string $folder folder name
 *
 * @return    void
 *
 * @access    private
 * @since     1.0.0
 * @version   1.0.0
 */
    
function _unite_load_file_folder( $folder, $child = false ) {

	/* get list of files from parent theme first */
	$files = scandir( THEME_DOCUMENT_ROOT . '/' . $folder );

	if( !empty( $files ) && is_array( $files ) ) {

		foreach( $files as $file ){

			if( $file != '.' && $file != '..' ) {

				_unite_load_file( $folder . $file, $child );    

			}

		}       

	}        

}



/**
 * Load some base files first
 *
 * @since     1.0.0
 * @version   1.1.0
 *
 */

// config theme 
_unite_load_file( 'unite-custom/ut-theme-config.php' );

// mobile detection
_unite_load_file( 'unite/theme/unite-mobile-detect.php' );

// remote file download
_unite_load_file( "unite/core/admin/unite-remote-file.php" );

// theme options
_unite_load_file( 'unite/core/admin/options/ut-theme-options.php' );

// theme custom inc 
_unite_load_file_folder( 'unite-custom/includes/' );

// theme filters and actions 
_unite_load_file( 'unite-custom/ut-theme-filters-and-actions.php', true );

// theme helper functions file 
_unite_load_file( 'unite/core/helper/unite-helpers.php' ); 

// extra theme options for one pages
if( ot_get_option( 'ut_site_layout', 'multisite' ) == 'onepage' ) {

    _unite_load_file( '/unite/core/admin/options/ut-theme-options-onepage.php' );
    
}

/**
 * The class responsible for image size dimensions
 */

_unite_load_file( '/unite/theme/fastimage/FastImageSize.php');

_unite_load_file( '/unite/theme/fastimage/Type/TypeInterface.php');
_unite_load_file( '/unite/theme/fastimage/Type/TypeBase.php');

// File Types
_unite_load_file( '/unite/theme/fastimage/Type/TypeBmp.php');
_unite_load_file( '/unite/theme/fastimage/Type/TypeGif.php');
_unite_load_file( '/unite/theme/fastimage/Type/TypeIco.php');
_unite_load_file( '/unite/theme/fastimage/Type/TypeIff.php');
_unite_load_file( '/unite/theme/fastimage/Type/TypeJp2.php');
_unite_load_file( '/unite/theme/fastimage/Type/TypeJpeg.php');
_unite_load_file( '/unite/theme/fastimage/Type/TypePng.php');
_unite_load_file( '/unite/theme/fastimage/Type/TypePsd.php');
_unite_load_file( '/unite/theme/fastimage/Type/TypeTif.php');
_unite_load_file( '/unite/theme/fastimage/Type/TypeWbmp.php');
_unite_load_file( '/unite/theme/fastimage/Type/TypeWebp.php');

$FastImageSize  = new \FastImageSize\FastImageSize();

_unite_load_file( '/unite/theme/minify/JSMinify.php');

/* theme base hooks */
_unite_load_file( 'unite/theme/unite-theme-hooks.php' );

if( is_admin() ) {
    
    /* theme activation hook */
    _unite_load_file( 'unite-custom/ut-theme-activation.php' );
    
    /* plugin activation class */ 
    _unite_load_file( 'unite/theme/unite-plugin-activation.php' );
    
    /* plugin activation function*/ 
    _unite_load_file( 'unite-custom/plugins/ut-theme-plugin-activation.php' );

}

/* widgets */
_unite_load_file_folder( 'unite-custom/widgets/' );



/**
 * The class responsible for orchestrating the actions and filters of the core.
 */

_unite_load_file( 'unite/unite-framework-loader.php' );

/**
 * Init Class
 *
 * @since     1.0.0
 * @version   1.0.0
 *
 */

class UT_Loader {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the theme.
	 *
	 * @since    1.1.0
	 * @access   protected
	 * @var      UT_Loader  $loader  Maintains and registers all hooks for the framework.
	 */
	protected $loader;

	/**
	 * The current version of the framework.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the framework.
	 */
	protected $version;                


   /**
	 * The domain specified for this theme.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $domain
	 */
	private $domain;


	/**
	 * Define the core functionality.
	 *
	 * Load the dependencies, and set the hooks for the admin area and the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

		/* framework version */
		$this->version = UT_VERSION;

        /* initialize loader */
        $this->loader = new Unite_Theme_Loader();

        /* language domain */
		$this->domain = apply_filters( 'unite_domain_languages', array( 'unite', 'unitedthemes' ) );

		/* file dependencies */
		$this->load_dependencies();

		/* language domain */
		$this->set_locale();

		/* theme hooks */
		$this->define_theme_hooks();  

		/* admin hooks */
		$this->define_admin_hooks();            

	}

	/**
	 * Load the required dependencies for this theme.
	 *
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/* helper functions for both sides */
		$this->helper_includes();

		/* theme related custom files */
		$this->theme_custom_includes();

		/* include required core admin files */
		$this->admin_includes();

        /* include required option tree admin files */
        $this->option_tree_includes();

	}

	/**
	 * Define the locale for this theme for internationalization.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$this->loader->add_action( 'after_setup_theme', $this, 'load_languages' );

	}

	/** 
	 * Load language domain
	 *
	 * @return    void
	 *
	 * @access    public
	 * @since     1.0.0
	 * @version   1.0.0
	 */
	public function load_languages() {

		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 */

		foreach( $this->domain as $domain ) {

			if ( $loaded = load_theme_textdomain( $domain, trailingslashit( WP_LANG_DIR ) . $domain ) ) {

				return $loaded;

			} elseif ( $loaded = load_theme_textdomain( $domain, get_stylesheet_directory() . '/languages' ) ) {

				return $loaded;

			} else {

				load_theme_textdomain( $domain, get_template_directory() . '/languages' );

			}

		}

	}        

	/**
	 * Register all of the hooks related to the theme functionality
	 * of the framework.
	 *
	 * @since    4.9.0
	 * @version  1.1.0
	 * @access   private
	 */

	public function define_theme_hooks() {

		$this->loader->add_action( 'init', $this, 'add_editor_styles' ); // add editor styles
		$this->loader->add_action( 'init', $this, 'disable_emojis' ); // disable emojis for GDPR and Performance
		$this->loader->add_action( 'init', $this, 'flush_theme_transients' ); // flush all transients on user interaction
		$this->loader->add_action( 'widgets_init' , $this, 'init_custom_widgets' ); // init all custom widgets
		$this->loader->add_filter( 'kses_allowed_protocols', $this, 'kses_allowed_protocols' ); // enhance allowed protocols
		$this->loader->add_filter( 'oembed_providers', $this, 'allowed_oembed_providers' ); // enhance allowed oembed providers
		$this->loader->add_filter( 'tiny_mce_before_init', $this, 'change_mce_options', 100 ); // enhance allowed protocols
        $this->loader->add_action( 'wp_print_styles', $this, 'disable_gutenberg_css', 100 ); // disable gutenberg CSS since not supported by theme
		$this->loader->add_filter( 'big_image_size_threshold', $this, 'disable_big_image_threshold' ); // remove 2560px limitation
		
	}


	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the framework.
	 *
	 * @since    1.1.0
	 * @version  1.1.0
	 * @access   private
	 */
	private function define_admin_hooks() {

	    if( is_admin() ) {

            global $ut_theme_license;

            // Theme License Hooks
            $ut_theme_license = new UT_Licensing();

            $this->loader->add_action( 'wp_ajax_ut_check_license', $ut_theme_license, 'ajax_check_license' );
            $this->loader->add_action( 'wp_ajax_ut_deregister_license', $ut_theme_license, 'ajax_deregister_license' );
            // $this->loader->add_action( 'wp_ajax_ut_update_template_library', $ut_theme_license, 'update_template_library' ); upcoming

            // Purchase Info
            $this->loader->add_action( 'plugin_row_meta', $ut_theme_license, 'plugin_row_meta', 10, 2 );
            $this->loader->add_action( 'wp_prepare_themes_for_js', $ut_theme_license, 'theme_info', 10, 1 );

            $this->loader->add_action( 'admin_head', $this, 'inline_admin_css' );
            $this->loader->add_action( 'admin_head', $this, 'favicon' );

            $this->loader->add_action( 'admin_footer', $this, 'list_manager_lightbox' );

            $this->loader->add_action( 'admin_enqueue_scripts', $this, 'enqueue_admin_css' );
            $this->loader->add_action( 'admin_enqueue_scripts', $this, 'enqueue_admin_js' );

            $this->loader->add_action( 'admin_menu' , $this, 'remove_post_custom_fields_metabox' ); // remove custom meta fields for editor performance
            $this->loader->add_action( 'admin_init' , $this, 'crop_settings_api_init', 1 ); // add new settings to "Media" > "Settings
            $this->loader->add_action( 'wp_update_nav_menu', $this, 'delete_js_menu_transients' );

            // $this->loader->add_action( 'admin_init' , $this, 'deactivate_plugins', 1 ); // deactivate old theme plugins

            // Option Tree Hooks
            $option_tree = new UT_Admin_Loader();

            $this->loader->add_action( 'admin_body_class', $option_tree, 'dashboard_body_classes' );
            $this->loader->add_action( 'custom_menu_order', $option_tree, 'dashboard_menu_custom_order' );

            // Ajax Options Hooks
            $this->loader->add_action( 'wp_ajax_add_choice', $option_tree, 'add_choice' );
            $this->loader->add_action( 'wp_ajax_add_list_item', $option_tree, 'add_list_item' );
            $this->loader->add_action( 'wp_ajax_add_list_compact_item', $option_tree, 'add_list_compact_item' );
            $this->loader->add_action( 'wp_ajax_gallery_update', $option_tree, 'ajax_gallery_update' );

            // Modify the Media Uploader Button
            $this->loader->add_action( 'gettext', $option_tree, 'change_image_button', 10, 3 );

            // Adds the temporary hacktastic shortcode
            $this->loader->add_action( 'media_view_settings', $option_tree, 'shortcode', 10, 2 );

        }

        /* prepares the after save do_action */
        add_action( 'admin_init', 'ot_after_theme_options_save', 1 ); //@todo

        /* create media post */
        add_action( 'admin_init', 'ot_create_media_post', 8 ); // @todo

	}      
    
	/**
	 * Include custom files
	 *
	 * @return    void
	 *
	 * @access    private
	 * @since     1.0.0
	 * @version   1.0.0
	 */
	private function theme_custom_includes() {                     

		/* array of files for front and dashboard */
		$files = apply_filters( 'unite_theme_custom_includes_core', array(      
			'ut-theme-ajax',
            'ut-theme-menu-buttons',
			'ut-theme-menu',
			'ut-theme-functions',
			'ut-theme-deprecated',
			'ut-theme-header',
			'ut-theme-setup',
			'ut-theme-sidebars',
			'ut-theme-seo'
		) );

		foreach ( $files as $file ) {
			_unite_load_file( "unite-custom/{$file}.php" );
		}


		/* array of files for front only */
		if ( !is_admin() ) {

			/* array of files only for theme front */
			$files = apply_filters( 'unite_theme_custom_includes', array( 
				'ut-theme-hooks',
				'ut-theme-scripts',
				'ut-theme-extras',
				'ut-theme-template-tags',
				'ut-theme-custom-css',
				'ut-theme-custom-js',
                'ut-theme-shop',
				'ut-maintenance-mode',
                // 'ut-brooklyn-notification'
			) );

			foreach ( $files as $file ) {
				_unite_load_file( "unite-custom/{$file}.php" );
			}            

		}

	}


	/**
	 * Include helper files
	 *
	 * @return    void
	 *
	 * @access    private
	 * @since     1.0.0
	 * @version   1.0.0
	 */
	private function helper_includes() {

		/* array of files */
		$files = apply_filters( 'unite_helper_includes', array(  
			'unite-filters',
			'unite-sanitize',
			'unite-custom-fonts.class'
		) );

		foreach ( $files as $file ) {
			_unite_load_file( "unite/core/helper/{$file}.php" );
		}            

	}


	/**
	 * Include admin files
	 *
	 * @access    private
	 * @since     1.0.0
	 * @version   1.0.0
	 */
	private function admin_includes() {

		/* check if admin page is displaying, otherwise leave here */
		if ( ! is_admin() ) {
			return false;
		}

		/* array of files */
		$files = apply_filters( 'unite_admin_includes', array( 
			'unite-admin-functions',
			'unite-admin-pointers.class',
			'unite-home.class',
			'unite-sidebars.class',
			'unite-header-manager.class',
			'unite-theme-info.class',
            'unite-import-export.class',
            'unite-license.class',
            'unite-update.class',
			'unite-video.class',
		) );

		foreach ( $files as $file ) {
			_unite_load_file( "unite/core/admin/{$file}.php" );
		}            

	}

    /**
     * Include option tree admin files
     *
     * @access    private
     * @since     1.0.0
     * @version   1.0.0
     */

    private function option_tree_includes() {

        /* check if admin page is displaying, otherwise leave here */
        if ( ! is_admin() ) {
            return false;
        }

        _unite_load_file( "unite/core/admin/option-tree/ut-loader.php" );

        /* global include files */
        $files = array(
            'ot-functions-admin',
            'ot-functions-option-types',
            'ot-settings-api',
            'ot-meta-box-api',
            'ot-meta-box-api-enhanced'
        );

        foreach ( $files as $file ) {
            _unite_load_file( "unite/core/admin/option-tree/includes/{$file}.php" );
        }

        $metaboxes = array(
            'ut-metaboxes',
            'ut-secondary-title',
            'ut-portfolio-manager-metaboxes',
            'ut-metabox-portfolio-settings',
            'ut-metabox-portrait-image',
            'ut-metabox-product-settings',
            'ut-metabox-sidebar-settings',
            'ut-metabox-single-posts-hero-settings',
            'ut-metabox-post-format-settings',
            'ut-metabox-post-format-manager'
        );

        foreach ( $metaboxes as $file ) {
            _unite_load_file( "unite/core/admin/metaboxes/{$file}.php" );
        }

        // admin loader with additional filters
        _unite_load_file( "unite/core/admin/helpers/ut-admin-loader.php" );

        // layout loader
        _unite_load_file( "unite/core/admin/helpers/ut-layout-loader.php" );

        // demo importer
	    if( isset($_GET['page']) && $_GET['page'] == 'product_importer' ) {


        } else {

		    _unite_load_file( "unite/core/admin/unite-website-installer.php" );

	    }

        /* Registers the Theme Option page */
        add_action( 'init', 'ot_register_theme_options_page' );

    }

	/**
	 * WordPress Disable Emojis
	 *
	 * @since    4.9.0
	 */ 

	function disable_emojis() {

		if( ot_get_option( 'ut_deactivate_emojis', 'on' ) == 'on' ) {

			// remove actions
			remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
			remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
			remove_action( 'wp_print_styles', 'print_emoji_styles' );
			remove_action( 'admin_print_styles', 'print_emoji_styles' );	

			// remove filters 
			remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
			remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );	
			remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );

			// add new filters
			$this->loader->add_filter( 'tiny_mce_plugins', $this, 'disable_emojis_tinymce' );
			$this->loader->add_filter( 'wp_resource_hints', $this, 'disable_emojis_remove_dns_prefetch', 10, 2 );

		}            

	}

    /**
     * WordPress Disable Gutenberg CSS
     *
     * @since    4.5.0
     */

    function disable_gutenberg_css(){

        if( get_option( 'wpb_js_gutenberg_disable' ) ) {

            wp_dequeue_style( 'wp-block-library' );

        }

    }

	/**
	 * WordPress Disable Big Image Threshold
	 *
	 * @since    4.9.5
	 */

	function disable_big_image_threshold(){

        return false;

	}


	/**
	 * WordPress Editor Styles
	 *
	 * @since    4.9.0 (moved to init)
	 */ 

	function add_editor_styles() {
        
        add_editor_style( 'ut-editor.css' );
        
    }
	
	
	/**
	 * Kses Protocols
	 *
	 * @since    4.9.0 (moved to init)
	 */ 
	
	function kses_allowed_protocols( $protocols ){

		$protocols[] = 'skype'; // add skype to allowed protocols
		$protocols[] = 'steam'; // add steam to allowed protocols
		$protocols[] = 'tel';   // add tel to allowed protocols
		$protocols[] = 'sms';   // add sms to allowed protocols

		return $protocols;

	}

    /**
     * Oembed Providers
     *
     * @since    4.9.4.1
     */

    function allowed_oembed_providers( $providers ){

        $providers['#https?://((clips|www)\.)?twitch\.tv/.+#i'] = array( 'https://api.twitch.tv/v4/oembed', true );
        return $providers;

    }


    /**
     * Change MCE Options (allowed tags)
     *
     * @since    4.9.3
     */

    function change_mce_options( $initArray ){

        $ext = 'ut-typewriter-1[id|name|class|style], ut-typewriter-2[id|name|class|style]';

        if ( isset( $initArray['extended_valid_elements'] ) ) {

            $initArray['extended_valid_elements'] .= ',' . $ext;

        } else {

            $initArray['extended_valid_elements'] = $ext;

        }

        return $initArray;

    }
	
	
	/**
	 * Load Custom Widgets
	 *
	 * @since    4.9.0
	 */ 

	function init_custom_widgets() {
		
		// located in unite-custom/widgets/
		
		register_widget("WP_Widget_Video");
		register_widget("WP_Widget_Social");
		register_widget("WP_Widget_Flickr");
		register_widget("WP_Widget_Contact");
		register_widget("WP_Widget_Logo");	

	}
	
	
	/**
	 * WordPress Disable Emojis TinyMCE
	 *
	 * @since    4.9.0
	 */ 

	function disable_emojis_tinymce( $plugins ) {

		if ( is_array( $plugins ) ) {

			return array_diff( $plugins, array( 'wpemoji' ) );

		} else {

			return array();

		}

	}

	/**
	 * WordPress Disable Emojis DNS Prefetch
	 *
	 * @since    4.9.0
	 */

	function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {

		if ( 'dns-prefetch' == $relation_type ) {

			$emoji_svg_url_bit = 'https://s.w.org/images/core/emoji/';

			foreach ( $urls as $key => $url ) {

				if ( strpos( $url, $emoji_svg_url_bit ) !== false ) {
					unset( $urls[$key] );
				}

			}

		}

		return $urls;

	}


	/**
	 * Image Cropping
	 *
	 * @since    4.9.0 ( moved to init )
	 */ 
	function crop_settings_api_init() {
		
		add_settings_section(
			'crop_settings_section',
			'Crop images',
			array($this, 'crop_settings_callback_function'),
			'media'
		);

		add_settings_field(
			'medium_crop',
			'Medium size crop',
			array($this, 'crop_medium_callback_function'),
			'media',
			'crop_settings_section'
		);

		add_settings_field(
			'large_crop',
			'Large size crop',
			array($this, 'crop_large_callback_function'),
			'media',
			'crop_settings_section'
		);

		register_setting( 'media', 'medium_crop' );
		register_setting( 'media', 'large_crop' );
		
	}
	
	
	/**
	 * Image Cropping Info
	 *
	 * @since    4.9.0 ( moved to init )
	 */
	
	function crop_settings_callback_function() {
		
		echo '<p>';
			esc_html_e( 'Choose whether to crop the medium and large size images', 'unitedthemes' );
		echo '</p>';
		
	}
	
	/**
	 * Medium Image Crop
	 *
	 * @since    4.9.0 ( moved to init )
	 */
	
	function crop_medium_callback_function() {
		
		$mediumcrop = get_option( "medium_crop");
		
		echo '<input name="medium_crop" type="checkbox" id="medium_crop" value="1"';
		if( $mediumcrop == 1 ) {
			echo ' checked';
		} 
		echo '/>';
		echo '<label for="medium_crop">' . esc_html_e( 'Crop medium to exact dimensions', 'unitedthemes' ) . '</label>';
		
	}
	
	
	/**
	 * Large Image Crop
	 *
	 * @since    4.9.0 ( moved to init )
	 */
	
	function crop_large_callback_function() {
		
		$largecrop = get_option( "large_crop");
		
		echo '<input name="large_crop" type="checkbox" id="large_crop" value="1"';
		if( $largecrop == 1 ) {
			echo ' checked';
		} 
		echo '/>';
		echo '<label for="large_crop">' . esc_html_e( 'Crop large to exact dimensions', 'unitedthemes' ) . '</label>';
		
	}
	
    
	/**
	 * Force Plugin Deactivation
	 *
	 * @since    4.9.0 ( introduction core plugin )
	 */ 
	function deactivate_plugins() {

        // merged into core plugin
        deactivate_plugins('ut-shortcodes/ut-shortcodes.php');
        deactivate_plugins('ut-portfolio/ut-portfolio.php');
        deactivate_plugins('ut-pricing/ut-pricing.php');
        deactivate_plugins('ut-twitter/ut-twitter.php');
		
	}
    
    /**
	 * Delete JavaScript Menu Cache
	 *
	 * @since    4.9.0
	 */ 
    function delete_js_menu_transients() {
        
        // for navigation json ( overflow menu )
        delete_transient( 'ut-recognized-nav-menu-items' );
        
    }
    
    
	/**
	 * WordPress Post Editor Performance
	 *
	 * @since    5.0.0
	 */ 

	function remove_post_custom_fields_metabox() {

		if( ot_get_option( 'ut_deactivate_postcustom', 'on' ) == 'on' ) {

			foreach ( get_post_types( '', 'names' ) as $post_type ) {

				remove_meta_box( 'postcustom' , $post_type , 'normal' );

			}

		}            

	}
	
	
	/**
	 * Run Cache Flush
	 *
	 * @since    4.9.0
	 */ 
	
	function flush_theme_transients() {
		
		if( isset( $_GET['purge_brooklyn_cache'] ) && $_GET['purge_brooklyn_cache'] == true ) {
			
			# - ut-post-spacing-custom-css
			# - ut-spacing-custom-css
			# - ut-overlay-navigation-css
			# - ut-overlay-search-css
			# - ut-mc4wp-skin-css
			# - ut-theme-sidebar-css
			# - ut-google-fonts-enqueue
			# - ut-twitter-feeds
			
			$transients = array(
				'ut-post-spacing-custom-css',
				'ut-spacing-custom-css',
				'ut-overlay-navigation-css',
				'ut-overlay-search-css',
				'ut-mc4wp-skin-css',
                'ut-cursor-skin-css',
				'ut-theme-sidebar-css',
				'ut-theme-option-css',
				'ut-google-fonts-enqueue',
				'ut-twitter-feeds'
			);
			
			foreach( $transients as $transient ) {
				
				delete_transient( $transient );
				
			}
			
		}
		
	}

    /**
     * Admin Favicon
     *
     * @access    public
     * @since     5.0
     * @version   1.0.0
     */

    public function favicon () {

	    /* get icon info */
	    $favicon = ot_get_option( 'ut_favicon_admin', get_template_directory_uri() . "/images/default/fav-32.png" );
	    $favicon_info = pathinfo( $favicon );
	    $type = NULL;

	    if( isset($favicon_info['extension']) && $favicon_info['extension'] == 'png' ) {
		    $type = 'type="image/png"';
	    }

	    if( isset($favicon_info['extension']) && $favicon_info['extension'] == 'ico' ) {
		    $type = 'type="image/x-icon"';
	    }

	    if( isset($favicon_info['extension']) && $favicon_info['extension'] == 'gif' ) {
		    $type = 'type="image/gif"';
	    } ?>

        <link rel="shortcut&#x20;icon" href="<?php echo $favicon; ?>" <?php echo $type; ?> />
        <link rel="icon" href="<?php echo $favicon; ?>" <?php echo $type; ?> />

    <?php }


    /**
     * Global List Option Lightbox
     */

    public function list_manager_lightbox() {

        echo '<div id="ut-list-manager-modal-lightbox"><div class="ut-ball-clip-rotate"><div></div></div></div>';

    }


    /**
     * Inline Admin CSS
     *
     * @access    public
     * @since     1.1.0
     * @version   1.0.0
     */

    public function inline_admin_css() {

        global $post_ID; ?>

        <style type="text/css">

            .ut-hide {
                display: none !important;
                opacity: 0;
            }

            .edit_vc a,
            .ut-duplicate a {
                color: #FFF;
                background: #07f;
                padding: .1em .5em;
                display: inline-block;
                text-transform: uppercase;
                border-radius: 3px;
                font-weight: 600;
                font-size: 0.8em;
                -webkit-transition: opacity 300ms cubic-bezier(0.215, 0.610, 0.355, 1.000);
                -o-transition: opacity 300ms cubic-bezier(0.215, 0.610, 0.355, 1.000);
                transition: opacity 300ms cubic-bezier(0.215, 0.610, 0.355, 1.000);
            }

            .ut-duplicate a {
                background: #7ED321;
            }

            .edit_vc a:hover,
            .ut-duplicate a:hover {
                opacity: .7;
            }


            #adminmenu #toplevel_page_ot-settings .wp-menu-image img {
                padding: 5px 0px 1px 6px !important;
            }

            #toplevel_page_unite-welcome-page .wp-menu-image img {
                max-width: 24px;
                padding-top: 5px !important;
            }

            .toplevel_page_unite-welcome-page > .wp-menu-name {
                font-weight: bold !important;
            }

            a:focus {
                -webkit-box-shadow: none;
                box-shadow: none;
            }

            <?php if( ot_get_option( 'ut_lightgallery_type', 'lightgallery' ) == 'lightgallery' ) : ?>

                .compat-field-ut-morph-full-url,
                .compat-field-ut-morph-caption-color,
                .compat-field-ut-morph-caption-background {
                    display: none !important;
                }

            <?php endif; ?>

            .settings .setting[data-setting="description"] {
                display: none;
            }

            <?php if( ot_get_option( 'ut_lightgallery_type', 'lightgallery' ) == 'morphbox' ) : ?>

                [data-vc-shortcode-param-name="lightbox_size"] {
                    display: none;
                }

                [data-vc-shortcode-param-name="lightbox_group"] {
                    display: none;
                }

            <?php endif; ?>

            [data-vc-shortcode-param-name="adjust_row"]:not(.vc_dependent-hidden) + [data-vc-shortcode-param-name="gap"] {
                width: 100%;
            }

            .post-type-portfolio .ut-portfolio-post-thumbnail {
                max-width: 200px;
            }

            .ut-portfolio-post-thumbnail img {
                max-width: 200px;
            }

            .post-php.post-type-portfolio #titlewrap::before {
                content: "\f534";
                font-family: dashicons;
                display: inline-block;
                line-height: 1;
                font-weight: 400;
                font-style: normal;
                position: absolute;
                top: 52px
            }

            .post-php.post-type-portfolio #titlewrap::after {
                content: "When title is located in React Carousel use special characters pipe | or double point : to add linkbreaks on the title. Words after the linebreak are automatically smaller than the ones before.";
                display: block;
                line-height: 1.84615384;
                min-height: 25px;
                margin-top: 5px;
                padding: 0 15px;
                color: #666;
            }

            .vc_edit-form-tab-control.ut-deprecated {
                display: none !important;
            }

            .wpb-layout-element-button[data-element="vc_gutenberg"] {
                display: none !important;
            }

            <?php

            /* hide team template */
            if( ot_get_option( 'ut_site_layout', 'multisite' ) == 'multisite' ) : ?>

                #page_template [value="templates/template-team.php"] {
                    display: none;
                }

            <?php endif; ?>

            <?php

            /* hide page builder from blog page */
            if( !empty( $post_ID ) && $post_ID == get_option('page_for_posts') ) : ?>

                #postimagediv,
                .composer-switch,
                #wpb_visual_composer {
                    display: none !important;
                }

            <?php endif; ?>


        </style>

    <?php }


	/**
	 * Load CSS files
	 *
	 * @return    void
	 *
	 * @access    public
	 * @since     1.1.0
	 * @version   1.0.0
	 */

	public function enqueue_admin_css() {

		if ( !is_admin() ) {
			return false;
		}

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

        $allow_panels = array(

            // Brooklyn Admin Pages
            'unite-welcome-page',
            'unite-manage-license',
            'ut_theme_options',
            'unite-theme-info',
            'ut-demo-importer-reloaded',
            'unite-video-tutorials',
            'unite-import-export'
        );

        if( !isset( $_GET['page'] ) && isset( $screen->id ) && !in_array( $screen->id, $allowed_screens ) || isset( $_GET['page'] ) && !in_array( $_GET['page'], $allow_panels ) ) {
            return;
        }

		/* custombox */
		wp_enqueue_style(
			'unite-custombox', 
			FW_WEB_ROOT . '/core/admin/assets/vendor/custombox/css/custombox' . $min . '.css', 
			false, 
			UT_VERSION
		);

		/* modal */
		wp_enqueue_style(
			'unite-modal', 
			FW_WEB_ROOT . '/core/admin/assets/vendor/modal/css/jquery.modal' . $min . '.css', 
			false, 
			UT_VERSION
		);

		/* modal theme */
		wp_enqueue_style(
			'unite-modal-theme', 
			FW_WEB_ROOT . '/core/admin/assets/vendor/modal/css/jquery.modal.theme-unite' . $min . '.css', 
			false, 
			UT_VERSION
		);  

		/* slicknav */
		wp_enqueue_style(
			'unite-slicknav', 
			FW_WEB_ROOT . '/core/admin/assets/vendor/slicknav/css/slicknav' . $min . '.css', 
			false, 
			UT_VERSION
		); 

		/* minicolors */
		wp_enqueue_style(
			'unite-minicolors', 
			FW_WEB_ROOT . '/core/admin/assets/vendor/minicolors/css/jquery.minicolors' . $min . '.css', 
			false, 
			UT_VERSION
		);


		/* fontawesome css file */
		wp_enqueue_style(
			'font-awesome', 
			THEME_WEB_ROOT . '/css/font-awesome' . $min . '.css'
		);

		/* grid css file */
		wp_enqueue_style(
			'unite-grid', 
			FW_WEB_ROOT . '/core/admin/assets/css/unite-responsive-grid' . $min . '.css',  
			false, 
			UT_VERSION
		); 

		/* helper css */
		wp_enqueue_style(
			'unite-helpers', 
			FW_WEB_ROOT . '/theme/assets/css/unite-helpers' . $min . '.css', 
			false, 
			UT_VERSION
		);

		/* iconpicker main css */
		wp_enqueue_style(
			'unite-iconpicker', 
			FW_WEB_ROOT . '/core/admin/assets/css/unite-fonticonpicker' . $min . '.css', 
			false, 
			UT_VERSION
		);

		/* iconpicker theme css */
		wp_enqueue_style(
			'unite-iconpicker-theme', 
			FW_WEB_ROOT . '/core/admin/assets/css/unite-fonticonpicker-theme' . $min . '.css', 
			false, 
			UT_VERSION
		);

		/* select2 theme css */
		wp_enqueue_style(
			'unite-select2', 
			FW_WEB_ROOT . '/core/admin/assets/vendor/select2/css/select2' . $min . '.css', 
			false, 
			UT_VERSION
		);

		/* tag editor css */
		wp_enqueue_style(
			'unite-tag-editor', 
			FW_WEB_ROOT . '/core/admin/assets/vendor/tagEditor/css/jquery.tag-editor' . $min . '.css', 
			false, 
			UT_VERSION
		);

		/* tooltipster css */
		wp_enqueue_style(
			'unite-tooltipster', 
			FW_WEB_ROOT . '/core/admin/assets/vendor/tooltipster/css/tooltipster' . $min . '.css', 
			false, 
			UT_VERSION
		);

        // admin ui font css
        wp_enqueue_style(
            'unite-admin-font',
            'https://fonts.googleapis.com/css?family=Roboto:300,400,500',
            false,
            UT_VERSION
        );

		// admin ui css file
		wp_enqueue_style(
			'unite-admin', 
			FW_WEB_ROOT . '/core/admin/assets/css/unite-admin' . $min . '.css', 
			false, 
			UT_VERSION
		);

		// admin ui css skin
        $admin_skin = ot_get_option( 'ut_theme_options_skin', 'unite-admin-dark' );

        if( get_post_type() == 'post' ) {

            $admin_skin = 'unite-admin-light';

        }

		wp_enqueue_style(
			'unite-admin-skin', 
			FW_WEB_ROOT . '/core/admin/assets/css/' . $admin_skin . $min . '.css',
			false, 
			UT_VERSION
		);



	}

	/**
	 * Load JS files
	 *
	 * @return    void
	 *
	 * @access    private
	 * @since     1.1.0
	 * @version   1.0.0
	 */

	public function enqueue_admin_js() {

		if ( !is_admin() ) {
			return false;
		}

		$min = NULL;

		if( !WP_DEBUG ){
			$min = '.min';
		}

        /* global js */
        wp_enqueue_script(
            'unite-global-admin-js',
            FW_WEB_ROOT . '/core/admin/assets/js/unite-global-admin' . $min . '.js',
            array(
                'jquery'
            ),
            UT_VERSION,
            true
        );

        $screen = get_current_screen();

        $allowed_screens = array(

            // WordPress Admin Pages
            'page',
            'portfolio',
            'post',
            'product',
            'edit-unite_custom_fonts',
            'portfolio-manager',
            'ut-content-block',
            'ut-menu-manager',
            'ut-table-manager',
            'widgets',
            'nav-menus',
            'upload'

        );

        $allow_panels = array(

            // Brooklyn Admin Pages
            'unite-welcome-page',
            'unite-manage-license',
            'ut_theme_options',
            'unite-theme-info',
            'ut-demo-importer-reloaded',
            'unite-video-tutorials',
            'unite-import-export',
            'portfolio-manager'

        );

        if( !isset( $_GET['page'] ) && isset( $screen->id ) && !in_array( $screen->id, $allowed_screens ) || isset( $_GET['page'] ) && !in_array( $_GET['page'], $allow_panels ) ) {
            return;
        }

		/* wp form */    
		wp_enqueue_script('jquery-form');

		/* wp media */
		wp_enqueue_media();

		/* libraries */
		wp_enqueue_script(
			'unite-script-library', 
			FW_WEB_ROOT . '/core/admin/assets/vendor/library' . $min . '.js', 
			array(), 
			UT_VERSION,
			true
		);

		/* ace editor */
        if( isset( $_GET['page'] ) && $_GET['page'] == 'ut_theme_options' ) {

            wp_enqueue_script(
                'unite-ace-js',
                FW_WEB_ROOT . '/core/admin/assets/vendor/ace/ace.js',
                array(),
                UT_VERSION,
                true
            );

        }

        /* cookie only for theme options */
        if( isset( $_GET['page'] ) && $_GET['page'] == 'ut_theme_options' ) {

            wp_enqueue_script(
                'unite-cookie-js',
                FW_WEB_ROOT . '/core/admin/assets/js/unite-ckie' . $min . '.js',
                array(),
                UT_VERSION,
                true
            );

        }

		/* iconpicker */
		wp_enqueue_script(
			'unite-iconpicker', 
			FW_WEB_ROOT . '/core/admin/assets/js/unite-fonticonpicker' . $min . '.js', 
			array(
				'jquery',
				'jquery-form'
			), 
			UT_VERSION,
			true
		);

		/* select2 */
		wp_enqueue_script(
			'unite-select2', 
			FW_WEB_ROOT . '/core/admin/assets/vendor/select2/js/select2.full' . $min . '.js', 
			UT_VERSION,
			true
		);

		/* admin */
		wp_enqueue_script(
			'unite-admin-js', 
			FW_WEB_ROOT . '/core/admin/assets/js/unite-admin' . $min . '.js', 
			array(
				'jquery',
                'jquery-ui-draggable',
				'jquery-ui-autocomplete',
				'jquery-ui-accordion',
				'jquery-ui-slider',
				'jquery-ui-tabs',
				'media-upload',
				'unite-script-library'
			), 
			UT_VERSION,
			true
		);

		$folder = ot_get_option( 'ut_theme_options_skin', 'unite-admin-dark' ) == 'unite-admin-light' ? 'dark/' : '';

		$localized_array = array(
			'SaveOptionsNonce'      => wp_create_nonce( 'unite-ajax-save-nonce' ),
			'SaveLayoutsNonce'      => wp_create_nonce( 'unite-ajax-layout-change-nonce' ),
			'placeholder'		    => esc_url( THEME_WEB_ROOT . '/images/placeholder/' . $folder . 'bg-image-placeholder.jpg'),
			'ResponsiveFontSettings'=> ut_font_responsive_settings(),
			'pop_url'               => THEME_WEB_ROOT . '/admin/',
		);

		/* localized script admin */
		wp_localize_script( 'unite-admin-js', 'unite', $localized_array );
		wp_localize_script( 'unite-admin-js', 'unite_js_translation', _ut_recognized_js_translation_strings() );

        /* extra effects */
        $allow_panels = array(

            // Brooklyn Admin Pages
            'unite-welcome-page',
            'unite-manage-license',
            'ut_theme_options',
            'unite-theme-info',
            'ut-demo-importer-reloaded',
            'unite-video-tutorials',
            'unite-import-export',
            // 'portfolio-manager'

        );

        if( isset( $_GET['page'] ) && in_array( $_GET['page'], $allow_panels ) ) {

            wp_enqueue_script(
                'ut-greensock-tweenlite',
                THEME_WEB_ROOT . '/js/greensock/TweenLite.min.js',
                array(),
                '1.0',
                true
            );

            wp_enqueue_script(
                'ut-greensock-tweenlite-css',
                THEME_WEB_ROOT . '/js/greensock/CSSPlugin.min.js',
                array(),
                '1.0',
                true
            );

            wp_enqueue_script(
                'ut-greensock-tweenlite-ease',
                THEME_WEB_ROOT . '/js/greensock/EasePack.min.js',
                array(),
                '1.0',
                true
            );

            wp_enqueue_script(
                'unite-admin-effects-js',
                FW_WEB_ROOT . '/core/admin/assets/js/unite-admin-effects' . $min . '.js',
                array(
                    'jquery',
                    'ut-greensock-tweenlite'
                ),
                UT_VERSION,
                true
            );

        }

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {

		$this->loader->run();

	}        

} 

function run_unite_framework() {

	$unite = new UT_Loader();
	$unite->run();

}

run_unite_framework();