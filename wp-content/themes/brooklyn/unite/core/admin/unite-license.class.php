<?php if (!defined('ABSPATH')) {
    exit; // exit if accessed directly
}

/**
 * Brooklyn Licensing
 *
 * @since 5.0
 */

class UT_Licensing {

    
    /**
     * Code to Verify
     */
    public $purchase_code;
    
    
    /**
     * Slug
     * @var string
     */
    protected $key = 'unite-manage-license';


	/**
	 * Item ID
	 * @var string
	 */
	public $item_id = '6221179';


    /**
     * Update Server
     * @var string
     */
    public $server = 'https://licensing.wp-brooklyn.com/';


    /**
     * Theme URL
     * @var string
     */
    private $theme_url = 'https://themeforest.net/item/brooklyn-responsive-multipurpose-wordpress-theme/6221179/';
    
    
    /**
     * Plugins
     * @var array
     */
    protected $plugins = '';
    
    
    /**
     * Home Title
     * @var string
     */
    protected $title = '';


	/**
	 * Demo Server Status
	 * @var array
	 */
	protected $server_status = array();


	/**
	 * CSS Class for Text Coloring
	 * @var string
	 */
	protected $status_class = '';


	/**
	 * Status Text
	 * @var string
	 */
	protected $status_text = '';


	/**
	 * Demo Server Statistics
	 * @var string
	 */
	protected $stats = array();


	/**
	 * Benefits
	 * @var array
	 */
	public $license_benefits = array();


	/**
	 * Website Installer
	 * @var array
	 */
	public $website_installer = array();
    
    
    /**
     * Instantiates the class
     */

    function __construct() {
        
        /* title */
        $this->title = esc_html__( 'Licensing', 'unitedthemes' );
        
        /* purchase code */
        $this->purchase_code = get_option('envato_purchase_code_' .  $this->item_id );

        /* run hooks */
        $this->hooks();
        
    }
    
    
    /**
     * Initiate our hooks
     *
     * @since     1.0.0
     * @version   1.0.0
     */
     
    public function hooks() {

	    // assign status class
	    $this->set_status_class();

        // add to menu
        add_action( 'admin_menu', array( $this, 'add_menu_item' ) );
	    add_action( 'admin_head', array( $this, 'menu_icon_color' ) );

        // necessary scripts
        if ( isset( $_GET['page'] ) && $this->key == $_GET['page'] ) {

            // overlay when connecting to server
	        add_action( 'admin_footer', array( $this, 'server_connect_overlay' ) );

            // load js
            add_action( 'admin_enqueue_scripts', array( $this , 'enqueue_import_js' ) );

        }

        // License Manager CSS loaded globally
	    add_action( 'admin_enqueue_scripts', array( $this , 'enqueue_import_css' ) );

	    $this->set_server_status();
	    $this->set_license_benefits();
	    $this->set_global_stats();

        // Plugin Check
	    add_action( 'admin_init', array( $this, 'add_update_check' ) );

    }
    
    
    /**
     * Add to menu
     *
     * @since     4.9.2
     * @version   1.0.0
     */
    
    public function add_menu_item() {

	    $func = 'add_' . 'submenu_page';

	    $func(
            'unite-welcome-page', 
            $this->title, 
            $this->add_menu_icon(), 
            'manage_options', 
            $this->key, 
            array( $this , 'admin_page_display' ) 
        );
        
    }


	/**
	 * Set License Class
	 *
	 * @since     5.0.0
	 * @version   1.0.0
	 */

	public function set_status_class() {

		$license_status = $this->get_license_info();

		// installation registered
		if( $license_status == 'registered' ) {

		    $this->status_class = 'ut-brooklyn-partly-licensed';

		}

		// installation is registered and has active support
		if( $license_status == 'registered_supported' ) {

			$this->status_class = 'ut-brooklyn-fully-licensed';

		}

		// installation is unregistered
		if( $license_status == 'unregistered' ) {

			$this->status_class = 'ut-brooklyn-not-licensed';

		}

        $server_status = get_transient( 'ut-server-status' );

		// cannot connect to server
		if( $license_status == 'connection_issue' || !empty( $server_status ) && $server_status->server_status == 'connection_issue' ) {

			$this->status_class = 'ut-brooklyn-connection-issue';

		}

    }


	/**
	 * Set License Text
	 *
	 * @since     5.0.0
	 * @version   1.0.0
	 */

	public function set_status_text() {

		$license_status = $this->get_license_info();

		// installation registered
		if( $license_status == 'registered' ) {

			$this->status_text = esc_html__( 'Registered', 'unitedthemes' );

		}

		// installation is registered and has active support
		if( $license_status == 'registered_supported' ) {

			$this->status_text = esc_html__( 'Registered and Supported', 'unitedthemes' );

		}

		// installation is unregistered
		if( $license_status == 'unregistered' ) {

			$this->status_text = esc_html__( 'Unregistered', 'unitedthemes' );

		}

		// cannot connect to server
		if( $license_status == 'connection_issue' ) {

			$this->status_text = esc_html__( 'Connection Issue', 'unitedthemes' );

		}

	}


    /**
     * Menu Icon Title
     *
     * @since     4.9.2
     * @version   1.0.0
     */
    
    public function add_menu_icon() {

	    $license_status = $this->get_license_info();

	    $dashicon = '';

	    if( $license_status == 'registered_supported' ) {

		    $dashicon = 'dashicons-yes';

	    }

        if( $license_status == 'registered' ) {

            $dashicon = 'dashicons-yes';

        }

	    if( $license_status == 'unregistered' ) {

		    $dashicon = 'dashicons-no';

	    }

	    if( $license_status == 'connection_issue' ) {

		    $dashicon = 'dashicons-warning';

	    }


        return '<span class="' . $this->status_class . ' dashicons ' . $dashicon . '"></span> ' . $this->title;

        
    }


	/**
	 * Menu Icon Colors
	 *
	 * @since     4.9.2
	 * @version   1.0.0
	 */

	public function menu_icon_color() {

	    ?>

        <style>

            .ut-brooklyn-fully-licensed {
                color: #7ED321 !important;
            }

            .ut-brooklyn-partly-licensed {
                color: #0077ff !important;
            }

            .ut-brooklyn-not-licensed {
                color: #FF2366 !important;
            }

            .ut-brooklyn-connection-issue {
                color: #FACE15 !important;
            }


        </style>


        <?php

    }

    
    /**
     * Admin page markup
     * @since    1.0
     * @version  1.0.0
     */
    
    public function admin_page_display() { 

        $accepted_terms = '';

        $current_user   = wp_get_current_user();
	    $license_status = $this->get_license_info();


	    // lock purchase key input
	    $read_only = $license_status == 'registered' || $license_status == 'registered_supported' ? 'readonly' : ''; ?>
        
            <div id="ut-admin-wrap" class="clearfix" style="min-height: calc(100vh - 32px);">

                <div id="ut-ui-admin-header">
                    
                    <div class="grid-10 medium-grid-15 tablet-grid-20 hide-on-mobile grid-parent">

                        <div class="ut-admin-branding">
                            <a href="https://www.unitedthemes.com" target="_blank"><img src="<?php echo THEME_WEB_ROOT; ?>/unite-custom/admin/assets/img/icons/bklyn-logo-white.svg" alt="UnitedThemes"><span class="version-number">Version <?php echo UT_THEME_VERSION; ?></span></a>
                        </div>

                    </div>                                                

                    <div class="grid-90 medium-grid-85 tablet-grid-80 mobile-grid-100 grid-parent">

                        <div class="ut-admin-header-title">

                            <h1><?php esc_html_e( 'Brooklyn License', 'unitedthemes' ); ?></h1>

                        </div>

                    </div>

                </div>

                <div id="ut-dashboard-content">

                    <div class="grid-70 prefix-15 medium-grid-100 tablet-grid-100 mobile-grid-100">

                        <div class="ut-dashboard-hero">

                            <h1>Hi <?php echo $current_user->display_name; ?>! Welcome to Brooklyn!</h1>

                            <div class="hide-on-mobile"><?php esc_html_e( 'After buying and installing Brooklyn from ThemeForest, registering is an important step to ensure you will receive valuable theme updates that include new features and keep your website secure.', 'unitedthemes' ); ?></div>

                        </div>

                    </div>

                    <div class="clear"></div>

                    <div class="ut-dashboard-widgets clearfix">

                        <div class="ut-dashboard-widget clearfix" style="text-align: center">

                            <?php if( $this->get_license_info() == 'unregistered' ) : ?>

                            <span class="ut-dashboard-widget-badge ut-dashboard-widget-badge-unregistered">Register to Unlock</span>

                            <?php endif; ?>

                            <h3 class="ut-dashboard-title">Unlock Demo Websites</h3>

                            <div class="ut-dashboard-hover">

                                <div class="ut-rotate-label-hover">Full access to all Brooklyn demo websites.</div>

                            </div>

                            <span class="ut-dash-fa-options hide-on-mobile"><i class="fa fa-cubes" aria-hidden="true"></i></span>

                        </div>

                        <div class="ut-dashboard-widget clearfix" style="text-align: center">

                            <?php if( $this->get_license_info() == 'unregistered' ) : ?>

                            <span class="ut-dashboard-widget-badge ut-dashboard-widget-badge-unregistered">Register to Unlock</span>

                            <?php endif; ?>

                            <h3 class="ut-dashboard-title">Early Access</h3>

                            <div class="ut-dashboard-hover">

                                <div class="ut-rotate-label-hover">Get access to new features and demo websites earlier than at themeforest.</div>

                            </div>

                            <span class="ut-dash-fa-options hide-on-mobile"><i class="fa fa-history" aria-hidden="true"></i></span>

                        </div>

                        <div class="ut-dashboard-widget clearfix" style="text-align: center">

                            <?php if( $this->get_license_info() == 'unregistered' ) : ?>

                            <span class="ut-dashboard-widget-badge ut-dashboard-widget-badge-unregistered">Register to Unlock</span>

                            <?php endif; ?>

                            <h3 class="ut-dashboard-title">Auto Updates</h3>

                            <div class="ut-dashboard-hover">

                                <div class="ut-rotate-label-hover">Fresh updates straight from our server.</div>

                            </div>

                            <span class="ut-dash-fa-options hide-on-mobile"><i class="fa fa-cloud-download" aria-hidden="true"></i></span>

                        </div>

                        <div class="ut-dashboard-widget clearfix" style="text-align: center">

                            <?php if( $this->get_license_info() == 'unregistered' ) : ?>

                            <span class="ut-dashboard-widget-badge ut-dashboard-widget-badge-unregistered">Register to Unlock</span>

                            <?php endif; ?>

                            <h3 class="ut-dashboard-title">Premium Support</h3>

                            <div class="ut-dashboard-hover">

                                <div class="ut-rotate-label-hover">Exclusive support by a dedicated support team.</div>

                            </div>

                            <span class="ut-dash-fa-demo hide-on-mobile"><i class="fa fa-diamond" aria-hidden="true"></i></span>

                        </div>

                    </div>

                    <div class="ut-dashboard-widgets clearfix">

                        <div id="ut-dashboard-widget-code-info" class="ut-dashboard-widget clearfix" style="text-align: center">

                            <h3 class="ut-dashboard-title">1 Purchase Code per Website</h3>

                            <div class="ut-dashboard-hover">

                                <div class="ut-rotate-label-hover">If you want to use Brooklyn on another website, please purchase another license.</div>

                            </div>

                            <a style="max-width: 200px; margin: 20px auto 0;" class="ut-ui-button" href="https://1.envato.market/5kyR1" target="_blank">Purchase License</a>

                        </div>

                        <div id="ut-dashboard-widget-license-info" class="ut-dashboard-widget ut-dashboard-widget-large clearfix">

                            <h3 class="ut-dashboard-title" style="margin-bottom: 10px;"><?php _e('Register Purchase Code', 'unitedthemes') ?></h3>

                            <form method="post" action="options.php">

		                        <?php wp_nonce_field('update-options'); ?>
		                        <?php settings_fields('ut-license-data-group'); ?>

                                <input type="hidden" name="action" value="update" />
                                <input type="hidden" name="page_options" value="ut-license-data" />

                                <p>
                                    <label>
                                        <input autocomplete="off" id="envato_purchase_code" class="ut-ui-form-input code" type="text" name="unite-code" value="<?php echo $this->purchase_code; ?>" <?php echo $read_only; ?>>
                                    </label>
                                </p>

	                            <?php if( $this->get_license_info() == 'unregistered' ) : ?>

                                    <p>
                                        <label>
                                            <input autocomplete="off" id="ut-data-confirmation" type="checkbox" <?php echo $accepted_terms; ?>>
				                            <?php printf( esc_html__( 'Yes, I acknowledge that I have read and agree to the %s.', 'unitedthemes' ), '<a style="color: #FFF;" href="https://unitedthemes.com/privacy-policy/" target="_blank">Privacy Policy</a>' ); ?>
                                        </label>
                                    </p>

	                            <?php endif; ?>

                                <p>

	                                <?php if( $this->get_license_info() == 'unregistered' ) : ?>

                                        <input id="ut-register-license" type="submit" class="ut-ui-button" value="<?php _e('Register Brooklyn', 'unitedthemes') ?>" disabled="" />
                                        <a style="padding: 8px 24px" class="ut-ui-button" href="https://helpdesk.unitedthemes.com/index.php/Thread/320-Purchase-Key/" target="_blank">Find my Code</a>

	                                <?php endif; ?>

                                    <?php if( $this->get_license_info() != 'unregistered' ) : ?>

                                        <input id="ut-deregister-license" type="submit" class="ut-ui-button ut-ui-button-health" value="<?php _e('Deregister Domain', 'unitedthemes') ?>" />

                                    <?php endif; ?>

                                </p>

                            </form>

                        </div>

                        <div id="ut-dashboard-widget-connect-info" class="ut-dashboard-widget clearfix">

                            <h3 class="ut-dashboard-title">Connect with UNITED THEMES™</h3>

                            <ul class="ut-connect">
                                <li>
                                    <a href="https://twitter.com/UnitedThemes" target="_blank">
                                        <span class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></span>
                                        <div class="ut-connect-content">
                                            <div class="ut-connect-name">Twitter</div>
                                            <div class="ut-connect-url">twitter.com/UnitedThemes</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.facebook.com/unitedthemes/" target="_blank">
                                        <span class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></span>
                                        <div class="ut-connect-content">
                                            <div class="ut-connect-name">Facebook</div>
                                            <div class="ut-connect-url">facebook.com/unitedthemes/</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.youtube.com/user/UnitedThemes" target="_blank">
                                        <span class="youtube"><i class="fa fa-youtube-play" aria-hidden="true"></i></span>
                                        <div class="ut-connect-content">
                                            <div class="ut-connect-name">Youtube</div>
                                            <div class="ut-connect-url">youtube.com/user/UnitedThemes</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/unitedthemes/" target="_blank">
                                        <span class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></span>
                                        <div class="ut-connect-content">
                                            <div class="ut-connect-name">Instagram</div>
                                            <div class="ut-connect-url">instagram.com/unitedthemes/</div>
                                        </div>
                                    </a>
                                </li>

                            </ul>

                        </div>

                    </div>

                </div>
                
            </div>    

        <?php     
    
    
    }
    
    
    /**
     * Get Site URL
     * @since    1.0
     * @version  1.0.0
     */
    
    public function get_site_url_plain() {
        
        // remove url parts
        $find_h = '#^http(s)?://#';
        $find_w = '/^www\./';
        
        // replace https
        $site_url = preg_replace( $find_h, '', get_site_url() );
        $site_url = preg_replace( $find_w, '', $site_url );

        return $site_url;
        
    }
    

    /**
     * Get Server IP
     * @since 1.0
     * @version 1.0.0
     */

    public function get_server_ip() {

	    $info = parse_url( get_site_url() );
	    $host = isset( $info['host'] ) ? $info['host'] : '';

	    return gethostbyname( $host );

    }

    /**
     * Check where request comes from
     * @since 1.0
     * @version 1.0.0
     */

    function request_is_frontend_ajax() {

        $script_filename = isset($_SERVER['SCRIPT_FILENAME']) ? $_SERVER['SCRIPT_FILENAME'] : '';

        if (defined('DOING_AJAX') && DOING_AJAX) {

            $ref = '';

            if (!empty($_REQUEST['_wp_http_referer'])) {

                $ref = wp_unslash($_REQUEST['_wp_http_referer']);

            } elseif (!empty($_SERVER['HTTP_REFERER'])) {

                $ref = wp_unslash($_SERVER['HTTP_REFERER']);

            }

            if (((strpos($ref, admin_url()) === false) && (basename($script_filename) === 'admin-ajax.php'))) {

                return true;

            }

        }

        return false;

    }


    /**
     * Get remote license info
     *
     * @param string $purchase_code
     * @param boolean $return
     * @param string $action
     *
     * @return mixed
     *
     * @since    1.0
     * @version  1.0.0
     */
    
    public function remote_license_info( $purchase_code = '', $return = false, $action = '' ) {

        if( !$this->request_is_frontend_ajax() ) {

            // ajax request
            $ajax_request = false;

            if (!empty($purchase_code)) {

                $this->purchase_code = $purchase_code;
                $ajax_request = true;

            }

            if (empty($this->purchase_code)) {

                if ($action == 'ut_check_license' && defined('DOING_AJAX') && DOING_AJAX) {

                    $this->message('{"result" : "access_denied", "reason" : "code_empty"}');

                } else {

                    return 'unregistered';

                }

            }

            // request to server
            if ($ajax_request || false === ($request = get_transient('ut-license-information')) || empty(get_transient('ut-license-information'))) {

                // request URL
                $action = 'verify-purchase/';

                // start request
                $request = wp_remote_get(add_query_arg(array(

                    'purchase_code' => $this->purchase_code,
                    'domain' => $this->get_site_url_plain(),
                    'admin_email' => get_bloginfo('admin_email'),
                    'revoke_domain' => '0'

                ), $this->server . $action));

                // failed to connect
                if (is_wp_error($request)) {

                    $request = '{"result" : "connection_issue", "reason" : "Connection Failed! Please try again in 60 Minutes."}';

                    // set a 60 Minutes Transient to prevent API Hammering
                    set_transient( 'ut-license-information', (object) array( 'result' => 'connection_issue', 'user' => '', 'supported' => '' ), HOUR_IN_SECONDS  );

                }

                // request ok
                if (wp_remote_retrieve_response_code($request) == 200) {

                    $request = wp_remote_retrieve_body($request);

                    $license_information = json_decode($request);

                    if (isset($license_information->result) && $license_information->result == 'access_success') {

                        $this->set_purchase_code($this->purchase_code);

                    }

                    // save license information for 24 HOURS
                    set_transient( 'ut-license-information', $license_information, 24 * HOUR_IN_SECONDS );

                }

            }

            if ($return) {

                return $this->message($request);

            } else {

                $this->message($request);

            }

            wp_die();

        }

    }

	/**
	 * Get stored license info
     *
     * @param string $type
     * @param boolean $reload
     *
     * @return mixed
	 *
	 * @since    1.0
	 * @version  1.0.0
	 */

	public function get_license_info( $type = 'status', $reload = false ) {
        return 'registered';

		$license_information = get_transient( 'ut-license-information' );

		if( $license_information && !empty( $license_information ) ) {

			if ( $type == 'status' ) {

				if ( $license_information->result == 'access_success' ) {

					$current_date = new DateTime( date("Y-m-d H:i:s"), new DateTimeZone( 'Australia/Sydney' ) );
					$support_date = new DateTime( $license_information->supported );

					if ( $current_date->format( 'Y-m-d H:i:s' ) < $support_date->format( 'Y-m-d H:i:s' ) ) {

						return 'registered_supported';

					} else {

						return 'registered';

					}

				} elseif ( $license_information->result == 'connection_issue' ) {

					return 'connection_issue';

				} else {

					return 'unregistered';

				}

			}

			if ( $type == 'support' ) {

			    $support_date = new DateTime( $license_information->supported );
				return $support_date->format( 'Y-m-d H:i:s' );

			}

		} else {

		    // load license information
		    if( !$reload ) {

			    return $this->remote_license_info( '', true );

            } else {

			    return 'connection_issue';

            }

        }

	}


	/*
	 * Message for Ajax Request
	 */

    public function message( $request ) {

        if( !empty( $request ) && defined('DOING_AJAX') && DOING_AJAX ) {

	        header( 'Content-Type: application/json' );
	        echo $request;
	        wp_die();

        } else {

            return $this->get_license_info( 'status', true );

        }

    }


	/*
	 * Set $license
	 */

    public function set_purchase_code( $license ) {

        update_option( 'envato_purchase_code_' .  $this->item_id, $license );

    }


    /*
     * Add Plugin Check
     */
    
    public function add_update_check() {

        $server_status = get_transient( 'ut-server-status' );

        // do not perform update requests if server is not available
        if( !empty( $server_status ) && $server_status->server_status == 'connection_issue' ) {
            return;
        }

        // Plugins
        $plugins = _ut_recognized_plugins();

        foreach( $plugins  as $plugin ) {

            if( isset( $plugin['united'] ) && ut_check_plugin_status( $plugin['united'] ) ) {

                $plugin_data = get_plugin_data( WP_PLUGIN_DIR . DIRECTORY_SEPARATOR . $plugin['united'] );

	            new Unite_AutoUpdate(
                    'plugin',
                    $plugin_data['Version'],
                    $this->server,
                    $plugin['united'],
                    $plugin['slug'],
                    $this->purchase_code,
		            $this->get_site_url_plain()
                );

            }

        }

        // Theme
	    new Unite_AutoUpdate(
		    'theme',
		    UT_THEME_VERSION,
		    $this->server,
		    'brooklyn',
		    'brooklyn',
		    $this->purchase_code,
		    $this->get_site_url_plain()
	    );

    }


	/*
	 * Ajax License Check
	 */

    public function ajax_check_license() {
        return;

        if( $_POST['action'] == 'ut_check_license' ) {

	        if ( ! empty( $_POST['envato_purchase'] ) ) {

		        $this->remote_license_info( $_POST['envato_purchase'], false , 'ut_check_license' );

	        } else {

		        header( 'Content-Type: application/json' );
		        echo '{"result" : "access_denied", "reason" : "code_empty"}';

	        }

        }

    }


	/*
	 * Ajax Deregister License
	 */

    public function ajax_deregister_license() {

	    // request URL
	    $action = 'verify-purchase/';

	    // start request
	    $request = wp_remote_get( add_query_arg( array(

		    'purchase_code' => $this->purchase_code,
		    'domain'        => $this->get_site_url_plain(),
		    'revoke_domain' => '1'

	    ), $this->server . $action ) );

	    // failed to connect
	    if( is_wp_error( $request ) ) {

		    $request = '{"result" : "connection_issue", "reason" : "Connection Failed! Please try again in 60 Minutes."}';

            // set a 60 Minutes Transient to prevent API Hammering
            set_transient( 'ut-server-status', (object) array( 'server_status' => 'connection_issue' ), HOUR_IN_SECONDS  );

	    }

	    // request ok
	    if( wp_remote_retrieve_response_code( $request ) == 200 ) {

		    $request = wp_remote_retrieve_body( $request  );
		    $request_result = json_decode( $request );

		    if( isset( $request_result->result ) && $request_result->result == 'revoke_success'  ) {

		        // delete license information
		        delete_transient( 'ut-license-information' );

		        // remove license code from database
		        delete_option( 'envato_purchase_code_' . $this->item_id );

			    // remove templates
		        delete_option( 'unite_templates' );

            }

		    $this->message( $request );
		    wp_die();

	    }

    }


	/*
	 * Get Global Stats
	 */

    public function set_global_stats() {

	    if ( false === ( $request = get_transient( 'ut-template-stats' ) ) ) {

		    // request URL
		    $action = 'demo-server/';

		    // start request
		    $request = wp_remote_get( add_query_arg( array(

			    'request_file_stats' => '',

		    ), $this->server . $action ) );

		    // failed to connect
		    if( is_wp_error( $request ) ) {

			    $this->stats = false;

		    }

		    // success
		    if( wp_remote_retrieve_response_code( $request ) == 200 ) {

			    $request = json_decode( $request['body'] );
			    set_transient( 'ut-template-stats', $request, 24 * HOUR_IN_SECONDS );

		    }


	    }

	    $this->stats = $request;

    }


	/*
	 * Get United Themes Server Status
	 */

	public function set_server_status() {

		if ( false === ( $request = get_transient( 'ut-server-status' ) ) ) {

			// request URL
			$action = 'status/?server';

			// start request
			$request = wp_remote_get( $this->server . $action );

			// failed to connect
			if( is_wp_error( $request ) ) {

				set_transient( 'ut-server-status', (object) array( 'server_status', 'connection_issue' ), HOUR_IN_SECONDS );

			}

			// success
			if( wp_remote_retrieve_response_code( $request ) == 200 ) {

				$request = json_decode( $request['body'] );
				set_transient( 'ut-server-status', $request, $request->server_status == 'maintenance' ? HOUR_IN_SECONDS : 24 * HOUR_IN_SECONDS );

			}

		}

		$this->server_status = $request;

    }

	/**
	 * Benefits of a License
	 *
	 * @since     4.9.2
	 * @version   1.0.0
	 */

	public function set_license_benefits() {

		if ( false === ( $request = get_transient( 'ut-license-benefits' ) ) ) {

			// request URL
			$action = 'status/?benefits';

			// start request
			$request = wp_remote_get( $this->server . $action );

			// failed to connect
			if( is_wp_error( $request ) ) {

				set_transient( 'ut-license-benefits', (object) array( 'server_status', 'connection_issue' ), HOUR_IN_SECONDS );

			}

			// success
			if( wp_remote_retrieve_response_code( $request ) == 200 ) {

				$request = json_decode( $request['body'] );
				set_transient( 'ut-license-benefits', $request, isset( $request->server_status ) && $request->server_status == 'maintenance' ? HOUR_IN_SECONDS : WEEK_IN_SECONDS );

			}

		}

		$this->license_benefits = $request;


	}

	/*
	 * Get Template Count for License Overview and Visual Composer
	 */

    public function get_template_count() {

        return $this->stats->templates;

    }


    /*
     * Load Template Library
     */

	public function load_template_library() {

		// request URL
		$action = 'demo-server/';

		// start request
		$request = wp_remote_get( add_query_arg( array(

			'purchase_code' => $this->purchase_code,
			'domain'        => $this->get_site_url_plain(),
			'file'          => 'template',
			'action'        => 'request_demo_templates',
			'type'          => 'template-list'

		), $this->server . $action ) );

		if( is_wp_error( $request ) ) {



		}

		if( wp_remote_retrieve_response_code( $request ) == 200 ) {

			$templates = json_decode( $request['body'],  JSON_OBJECT_AS_ARRAY );

			foreach( $templates as $key => $template ) {

				$templates[$key] = array();

				$template_data = wp_remote_get( add_query_arg( array(

					'purchase_code' => $this->purchase_code,
					'domain'        => $this->get_site_url_plain(),
					'file'          => 'template',
					'action'        => 'request_demo_templates',
					'type'          => $key

				), $this->server . $action ) );

				$templates[$key]['unique_id']  = $key;
				$templates[$key]['type']       = 'brooklyn_premium_templates';
				$templates[$key]['name']       = $template;
				$templates[$key]['content']    = wp_remote_retrieve_body($template_data);


			}

			update_option( 'unite_templates', $templates, false );

			return $templates;

		}

    }


	/*
	 * Premium Template Library
	 */

	public function premium_template_library( $data ) {

		if( !function_exists('vc_add_default_templates') ) {
			return array();
		}

		$data[] = array(
			'category'              => 'brooklyn_premium_templates',
			'category_name'         => 'Brooklyn Premium Templates',
			'category_description'  => 'Test',
			'category_weight'       => 1,
			'templates'             => get_option('unite_templates')
		);

        return $data;

	}


	/*
	 * Update Template Library
	 */

    public function update_template_library() {

        if( !function_exists('vc_add_default_templates') ) {
            return;
        }

        $force_update = false;

        $unite_templates = get_option('unite_templates');

        if( !$unite_templates || $force_update ) {

	        $unite_templates = $this->load_template_library();

        }

        if( !empty( $unite_templates ) ) {

	        foreach ( $unite_templates as $template ) {

	            // $template['category'] = 'brooklyn_premium_templates';
		        // vc_add_default_templates( $template );

	        }

        }

    }


	/*
	 * Overlay when connecting to United Themes Server
	 */

	function server_connect_overlay() {

        ob_start(); ?>

            <div id="ut-server-connect-overlay">

                <div class="text">
                    <?php esc_html_e( 'CONNECTING' , 'unitedthemes' ); ?>
                </div>

                <div class="box">
                    <div class="comp"></div>
                    <div class="loader"></div>
                    <div class="con"></div>
                    <div class="byte"></div>
                    <div class="server"></div>
                </div>

            </div>

		<?php

        echo ob_get_clean();

	}


	/*
	 * Purchase Links for Themes Overview
	 */

	function theme_info( $prepared_themes ) {

	    if( isset( $prepared_themes['brooklyn'] ) && $this->get_license_info() == 'unregistered' ) {

		    $prepared_themes['brooklyn']['description'] = $prepared_themes['brooklyn']['description'] . '<br /><div class="ut-missing-license">' . sprintf( esc_html__( 'You need a valid license for automatic updates!  %s or register your license here %s', 'unitedthemes' ), '<a href="' . $this->theme_url . '" target="_blank">'. esc_html__('Purchase Brooklyn', 'unitedthemes') . '</a>', '<a href="' . get_admin_url() . 'admin.php?page=unite-manage-license">'. esc_html__('Register Brooklyn', 'unitedthemes') . '</a>' ) . '</div>';

        }

	    return $prepared_themes;

    }


	/*
	 * Purchase Link for Plugins
	 */

	function plugin_row_meta( $links, $file ) {

		if ( strpos( $file, 'ut-shortcodes.php' ) !== false && $this->get_license_info() == 'unregistered' || strpos( $file, 'js_composer.php' ) !== false && $this->get_license_info() == 'unregistered' ) {

		    $new_links = array(
				'Purchase Brooklyn' => '<a class="ut-ui-button" href="" target="_blank">Purchase Brooklyn now!</a>'
			);

			$links = array_merge( $links, $new_links );

		}

		return $links;

	}

	/*
	 * Enqueue Admin CSS
	 */

	public function enqueue_import_css() {

		$min = NULL;

		if( !WP_DEBUG ){
			$min = '.min';
		}

		wp_enqueue_style(
			'unite-license',
			FW_WEB_ROOT . '/core/admin/assets/css/unite-license' . $min . '.css',
			false,
			UT_VERSION
		);

		wp_enqueue_script(
			'unite-license-notification',
			FW_WEB_ROOT . '/core/admin/assets/js/unite-license-notification' . $min . '.js',
			array('jquery'),
			UT_VERSION
		);

		$localized_array = array(
			'missing_license'  => sprintf( esc_html__( 'You need a valid license for automatic updates!  %s or register your license here %s', 'unitedthemes' ), '<a href="' . $this->theme_url . '" target="_blank">'. esc_html__('Purchase Brooklyn', 'unitedthemes') . '</a>', '<a href="' . get_admin_url() . 'admin.php?page=unite-manage-license">'. esc_html__('Register Brooklyn', 'unitedthemes') . '</a>' ),
		);

		/* localized script admin */
		wp_localize_script( 'unite-license-notification', 'unite_license_notification', $localized_array );



    }


	/*
	 * Enqueue Admin Scripts
	 */

	public function enqueue_import_js() {

		$min = NULL;

		if( !WP_DEBUG ){
			$min = '.min';
		}

		wp_enqueue_style(
			'unite-sweeatalert',
			FW_WEB_ROOT . '/core/admin/assets/vendor/sweetalert/css/sweetalert2' . $min . '.css',
			false,
			UT_VERSION
		);

		wp_register_script(
			'unite-sweeatalert',
			FW_WEB_ROOT . '/core/admin/assets/vendor/sweetalert/js/sweetalert2.all' . $min . '.js',
			array('jquery'),
			UT_VERSION
		);

        wp_enqueue_style(
            'unite-website-installer',
            FW_WEB_ROOT . '/core/admin/assets/css/unite-website-installer' . $min . '.css',
            false,
            UT_VERSION
        );

		wp_register_script(
			'unite-license',
			FW_WEB_ROOT . '/core/admin/assets/js/unite-license' . $min . '.js',
			array('jquery', 'unite-sweeatalert'),
			UT_VERSION
		);

		wp_enqueue_script('unite-license');

		$localized_array = array(
			'message'  => esc_html__( 'Are you sure?', 'unitedthemes' ),
		);

		/* localized script admin */
		wp_localize_script( 'unite-license', 'unite_license', $localized_array );

	}

}