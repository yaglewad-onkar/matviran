<?php if (!defined('ABSPATH')) {
    exit; // exit if accessed directly
}

/**
 * Set the content width based on the theme's design and stylesheet.
 */ 
if ( ! isset( $content_width ) ) {
    $content_width = 1170; /* pixels */
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
 if ( ! function_exists( 'unite_theme_setup' ) ) {

    function unite_theme_setup() {

        /*
         * Add default posts and comments RSS feed links to head.
         */
	    add_theme_support( 'automatic-feed-links' );        
                
        /*
         * Let WordPress manage the document title.
         */
        add_theme_support( 'title-tag' );
        
        
        /*
         * This theme uses wp_nav_menu() in one location.
         */
        register_nav_menus( array(
            'primary' 		=> __( 'Primary Menu', 'unitedthemes' ),
			'secondary' 	=> __( 'Secondary Menu', 'unitedthemes' ),
            'side' 		    => __( 'Side Menu', 'unitedthemes' ),
            'mobile' 		=> __( 'Mobile Menu', 'unitedthemes' ),
			'overlay' 		=> __( 'Overlay Menu', 'brooklyn' ),            
        ) );
        
        /**
         * Enable support for Post Formats
         */
           
        add_post_type_support( 'portfolio', 'post-formats' );  
        
        /**
         * Enable support for Woocommerce
         */        
        add_theme_support('woocommerce');        
        
        /*
         * Enable support for Post Formats.
         * See http://codex.wordpress.org/Post_Formats
         */
        add_theme_support( 'post-formats', array( 'video', 'quote', 'audio', 'link', 'gallery' ) );

        // remove post formats from portfolio causing preview issues
        remove_post_type_support( 'portfolio', 'post-formats' );

        // remove block editor for widgets
        remove_theme_support( 'widgets-block-editor' );

       /**
         * Enable support for Post Thumbnails on posts and pages
         *
         * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support( 'post-thumbnails' , array( 'post' , 'page' , 'portfolio' , 'product' , 'ajde_events' ) );

        
        /**
         * Register Custom Size
         *
         * @link https://codex.wordpress.org/Function_Reference/add_image_size
         */
        add_image_size( 'ut-lightbox', '1280', '720', false ); // Added with 4.4 for a better lightbox experience
        add_image_size( 'ut-mini', '200', '200', true ); // Added with 4.9.3 for gallery manager and lightbox preview

	    // Gutenberg Version Compare
	    $version = get_site_option( 'ut_brooklyn_version', '0.0.0' );

	    if ( version_compare( $version, '4.9.1.2', '<' ) ) {

		    update_option('wpb_js_gutenberg_disable', true);
		    update_site_option( 'ut_brooklyn_version', '4.9.1.2' );

	    }

	    // load block styles in case gutenberg has been reactivated
	    if( !get_option( 'wpb_js_gutenberg_disable' ) ) {

            add_theme_support( 'wp-block-styles' );
            add_theme_support( 'align-wide' );

	    }

        
    }
    
    add_action( 'after_setup_theme', 'unite_theme_setup' );
    
}