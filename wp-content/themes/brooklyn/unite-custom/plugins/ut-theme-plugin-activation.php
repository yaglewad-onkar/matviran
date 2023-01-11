<?php if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Plugin Dashboard Notification
 *
 * @return    void
 *
 * @access    private
 * @since     1.0.0
 * @version   1.0.0
 */

function _ut_hide_dashboard_notification() {

    update_option( 'hide_unite_tgmpa_dashboard_notification', UT_THEME_VERSION );

}

add_action( 'wp_ajax_hide_tgmpa_notification', '_ut_hide_dashboard_notification' );


/**
 * Array of required plugins
 *
 * @return    array
 *
 * @access    private
 * @since     4.9.2
 * @version   1.0.0
 */

if ( ! function_exists( '_ut_recognized_plugins' ) ) :

    function _ut_recognized_plugins() {

        $bucket = 'https://s3.eu-central-1.amazonaws.com/unitedthemes-plugins/';

        return array(
			
            array(
				'name'     				=> 'Twitter by United Themes',
				'slug'     				=> 'ut-twitter',
				'source'   				=> $bucket . 'ut-twitter-3.2.zip',
				'required' 				=> true, 
				'version' 				=> '3.2',
                'united'                => 'ut-twitter/ut-twitter.php'
			),
			array(
				'name'     				=> 'Shortcodes by United Themes',
				'slug'     				=> 'ut-shortcodes',
				'source'   				=> $bucket . 'ut-shortcodes-5.0.1.zip',
				'required' 				=> true, 
				'version' 				=> '5.0.1',
                'united'                => 'ut-shortcodes/ut-shortcodes.php'
			),
			array(
				'name'     				=> 'Portfolio Management by United Themes',
				'slug'     				=> 'ut-portfolio',
				'source'   				=> $bucket . 'ut-portfolio-4.9.3.zip',
				'required' 				=> true, 
				'version' 				=> '4.9.3',
                'united'                => 'ut-portfolio/ut-portfolio.php'
			),
			array(
				'name'     				=> 'Pricing Tables by United Themes',
				'slug'     				=> 'ut-pricing',
				'source'   				=> $bucket . 'ut-pricing-3.3.4.zip',
				'required' 				=> true, 
				'version' 				=> '3.3.4',
                'united'                => 'ut-pricing/ut-pricing.php'
			),
            array(
				'name'     				=> 'Brooklyn Page Builder (Visual Composer)',
				'slug'     				=> 'js_composer',
				'source'   				=> $bucket . 'js_composer-6.5.3.zip',
				'required' 				=> true, 
				'version' 				=> '6.5.3',
                'united'                => 'js_composer/js_composer.php',
			),
			array(
				'name'     				=> 'Revolution Slider',
				'slug'     				=> 'revslider',
				'source'   				=> $bucket . 'revslider-6.5.14.zip',
				'version' 				=> '6.5.14',
                'united'                => 'revslider/revslider.php'
			),
            array(
                'name'      			=> 'Contact Form 7',
                'slug'      			=> 'contact-form-7',
                'required'  			=> false,
				'version' 				=> '5.3.2',
            ),
			array(
                'name'      			=> 'MailChimp for WordPress',
                'slug'      			=> 'mailchimp-for-wp',
                'required'  			=> false,
				'version' 				=> '4.7.5',
            ),
            array(
                'name'      			=> 'Cryptocurrency Widgets',
                'slug'      			=> 'cryptocurrency-price-ticker-widget',
                'required'  			=> false,
				'version' 				=> '2.3',
            ),
            
        );


    }

endif;



/**
 * Plugin Requirements for this theme
 *
 * @return    void
 *
 * @access    private
 * @since     4.9.2
 * @version   1.0.0
 */

if ( ! function_exists( '_ut_register_required_plugins' ) ) :

    function _ut_register_required_plugins() {


        $config = array(

            'default_path' 		=> '',                         	/* Default absolute path to pre-packaged plugins */
            'menu'         		=> 'install-required-plugins', 	/* Menu slug */
            'is_automatic'    	=> true,						/* Automatically activate plugins after installation or not */
            'dismissable'  	    => true,						/* If false, a user cannot dismiss the nag message. */
        );

        // show notices by default
        $config['has_notices'] = true; /* Show admin notices or not */

        if( version_compare( UT_THEME_VERSION, get_option( 'hide_unite_tgmpa_dashboard_notification' ), '==' ) )  {

            $config['has_notices'] = false; /* Show admin notices or not */

        }

        tgmpa( _ut_recognized_plugins(), $config );

    }

    add_action( 'tgmpa_register', '_ut_register_required_plugins' );

endif;