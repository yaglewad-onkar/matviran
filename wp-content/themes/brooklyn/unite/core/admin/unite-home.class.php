<?php if (!defined('ABSPATH')) {
    exit; // exit if accessed directly
}

class UT_Admin_home {
    
    /**
     * Slug
     * @var string
     */
    private $key = 'unite-home';    
    
     /**
     * Theme Data
     * @var array
     */
    private $theme = array(); 
    
    /**
     * Home Title
     * @var string
     */
    protected $title = '';
    
    /**
     * Extra Message
     * @bolean
     */
    private $all_good = true;
        
    /**
     * Constructor
     * @since     1.0.0
     * @version   1.0.0
     */
    public function __construct() {
        
        $this->title = esc_html__( 'Welcome', 'unitedthemes' );
        $this->hooks();        
            
    }
    
     /**
     * Initiate our hooks
     * @since     1.0.0
     * @version   1.0.0
     */
    public function hooks() {
        
        $this->theme = wp_get_theme();
        
        /* add menu item */
        add_action( 'admin_menu', array( $this, 'add_menu_item' ) );
        add_action( 'admin_init', array( $this, 'activate_deactivate_plugins' ) );

        /* add dashboard notification */
        add_action( 'admin_notices', array ($this, 'dashboard_notification') );
        
    }
    
    /**
     * Add to menu
     * @since     1.0.0
     * @version   1.0.0
     */
    public function add_menu_item() {

        $func = 'add_' . 'menu_page';

        $this->options_page = $func(
            esc_html( $this->theme ),
            esc_html( $this->theme ),
            'manage_options',
            'unite-welcome-page',
            array( $this , 'admin_page_display' ),
            THEME_WEB_ROOT .'/unite-custom/admin/assets/img/icons/ut-lg-brand.png',
            2
        );
        
    }
    
    public function activate_deactivate_plugins() {
        
        if( isset( $_GET['unite-deactivate'] ) && 'deactivate-plugin' == $_GET['unite-deactivate'] ) {
            
            check_admin_referer( 'unite-deactivate', 'unite-deactivate-nonce' );

            $plugins = TGM_Plugin_Activation::$instance->plugins;

            foreach ( $plugins as $plugin ) {
                
                if ( $plugin['slug'] == $_GET['plugin'] ) {
                    
                    deactivate_plugins( $plugin['file_path'] );
                    
                }
                
            }
        } 
        
        if( isset( $_GET['unite-activate'] ) && 'activate-plugin' == $_GET['unite-activate'] ) {
            
            check_admin_referer( 'unite-activate', 'unite-activate-nonce' );

            $plugins = TGM_Plugin_Activation::$instance->plugins;

            foreach ( $plugins as $plugin ) {
                
                if ( isset( $_GET['plugin'] ) && $plugin['slug'] == $_GET['plugin'] ) {
                    
                    activate_plugin( $plugin['file_path'] );
                    wp_redirect( admin_url( 'admin.php?page=unite-welcome-page' ) );
                    exit;
                    
                }
                
            }
            
        }
    
    }
    
    /**
     * Fetch Theme Feeds for Cross Marketing
     * @since     1.1.0
     * @version   1.0.0
     */ 
    function fetch_theme_feeds() {
        
        // @ todo
    
    }

    /**
     * Dashboard Notification
     * @since     1.0.0
     * @version   1.0.0
     */
    function dashboard_notification() {

        // only show on Brooklyn Pages
        $allow_panels = array(

            // Brooklyn Admin Pages
            'unite-welcome-page',
            'unite-manage-license',
            'unite-theme-info',
            'unite-video-tutorials',
            'unite-import-export',
            'ut_theme_options',
            'ut-demo-importer-reloaded'
        );

        if( isset( $_GET['page'] ) && in_array( $_GET['page'], $allow_panels ) ) {

            $plugin_updates_available = get_site_transient('update_plugins');

            $plugin_update_notification = array();

            if( !empty( $plugin_updates_available->response ) ) {

                foreach ( $plugin_updates_available->response as $ukey => $update_available  ) {

                    foreach (_ut_recognized_plugins() as $theme_plugin) {

                        if( isset( $theme_plugin['united'] ) && $theme_plugin['united'] == $ukey ) {

                            $plugin_update_notification[] = array(
                                'name'      => $theme_plugin['name'],
                                'version'   => $update_available->new_version
                            );

                        }

                    }

                }

            }

            $theme_updates_available = get_site_transient('update_themes');

            // Show Theme Update first
            if( !empty( $theme_updates_available->response['brooklyn'] ) && version_compare( UT_THEME_VERSION, $theme_updates_available->response['brooklyn']['new_version'], '<' ) ) {

                // Theme Notification
                $message = sprintf( esc_html__( 'New theme update available. %s. %s', 'unitedthemes' ), '<span>Brooklyn ' . $theme_updates_available->response['brooklyn']['new_version'] . '</span>', sprintf( '<a href="%s">' . esc_html__( 'Update Now','unitedthemes' ) . '</a>', admin_url('themes.php') ) );

                printf( '<div class="notice unite-plugins-status"><p>%1$s</p></div>', $message );

            } else if( !empty( $plugin_update_notification ) ) {

                $plugin_updates = array();

                foreach( $plugin_update_notification as $plugin_notification ) {

                    $plugin_updates[$plugin_notification['name']] = $plugin_notification['version'];

                }

                $plugin_updates = implode(', ', array_map(
                    function ($v, $k) { return sprintf("<span>%s</span> <span>%s</span>", $k, $v); },
                    $plugin_updates,
                    array_keys($plugin_updates)
                ));

                // Plugin Notification
                $message = sprintf( esc_html__( 'New updates are available for the following plugins: %s. %s', 'unitedthemes' ), $plugin_updates, sprintf( '<a href="%s">' . esc_html__( 'Update Now','unitedthemes' ) . '</a>', admin_url('plugins.php') ) );

                printf( '<div class="notice unite-plugins-status"><p>%1$s</p></div>', $message );

            }

        }

    }


    /**
     * Plugin Actions
     * @since     1.1.0
     * @version   1.0.0
     */
     
     public function get_plugin_action( $single_plugin ) {
        
        $installed_plugins = get_plugins();

        $single_plugin['sanitized_plugin'] = $single_plugin['name'];

        $plugin_actions = false;
        
        /* plugin needs installation */
        if ( ! isset( $installed_plugins[$single_plugin['file_path']] ) ) {
            
            $this->all_good = false;
            
            $plugin_actions = array( 
                'status' => 'not installed',
                'button' => sprintf(
                '<form method="post" action="%1$s"><button class="ut-ui-button ut-ui-button-blue" title="' . esc_html__( 'Install', 'unitedthemes' ) . ' %2$s">' . esc_html__( 'Install', 'unitedthemes' ) . '</button></form>',
                esc_url( wp_nonce_url(
                    add_query_arg(
                        array(
                            'page'          => urlencode( TGM_Plugin_Activation::$instance->menu ),
                            'plugin'        => urlencode( $single_plugin['slug'] ),
                            'plugin_name'   => urlencode( $single_plugin['sanitized_plugin'] ),
                            'plugin_source' => urlencode( $single_plugin['source'] ),
                            'tgmpa-install' => 'install-plugin',
                            'return_url'    => 'unite-welcome-page',
                        ),
                        TGM_Plugin_Activation::$instance->get_tgmpa_url()
                    ),
                    'tgmpa-install',
                    'tgmpa-nonce'
                ) ),
                $single_plugin['sanitized_plugin']
            ) );
        }
        
        /* plugin needs activation */
        elseif ( is_plugin_inactive( $single_plugin['file_path'] ) ) {
            
            $this->all_good = false;
            
            $plugin_actions = array( 
                'status' => 'not activated',
                'button' => sprintf(
                '<form method="post" action="%1$s"><button class="ut-ui-button ut-ui-button-blue" title="' . esc_html__( 'Activate', 'unitedthemes' ) . ' %2$s">' . esc_html__( 'Activate', 'unitedthemes' ) . '</button></form>',
                esc_url( wp_nonce_url( 
                    add_query_arg(
                        array(
                            'plugin'                 => urlencode( $single_plugin['slug'] ),
                            'plugin_name'            => urlencode( $single_plugin['sanitized_plugin'] ),
                            'plugin_source'          => urlencode( $single_plugin['source'] ),
                            'unite-activate'         => 'activate-plugin',
							'unite-activate-nonce'   => wp_create_nonce( 'unite-activate' ),
                        ),
                        admin_url( 'admin.php?page=unite-welcome-page' )
                    )
                ) ),
                $single_plugin['sanitized_plugin']
            ) );
        }
        
        /* plugin needs update */
        elseif ( version_compare( $installed_plugins[$single_plugin['file_path']]['Version'], $single_plugin['version'], '<' ) ) {
            
            $this->all_good = false;
            
            $plugin_actions = array( 
                'status' => 'update available',
                'button' => sprintf(
                '<form method="post" action="%1$s"><button class="ut-ui-button ut-ui-button-blue" title="' . esc_html__( 'Update', 'unitedthemes' ) . ' %2$s">' . esc_html__( 'Update', 'unitedthemes' ) . '</button></form>',
                wp_nonce_url(
                    add_query_arg(
                        array(
                            'page'          => urlencode( TGM_Plugin_Activation::$instance->menu ),
                            'plugin'        => urlencode( $single_plugin['slug'] ),
                            'plugin_name'   => urlencode( $single_plugin['sanitized_plugin'] ),
                            'plugin_source' => urlencode( $single_plugin['source'] ),
                            'version'       => urlencode( $single_plugin['version'] ),
                            'tgmpa-update'  => 'update-plugin',
                            'return_url'    => 'unite-welcome-page',
                        ),
                        TGM_Plugin_Activation::$instance->get_tgmpa_url()
                    ),
                    'tgmpa-update',
                    'tgmpa-nonce'
                ),
                $single_plugin['sanitized_plugin']
            ) );
        
        /* plugin deactivate */    
        } elseif ( is_plugin_active( $single_plugin['file_path'] ) ) {
            
            $plugin_actions = array( 
                'status' => 'active',
                'button' => sprintf(
                '<form method="post" action="%1$s"><button class="ut-ui-button ut-ui-button-blue" title="' . esc_html__( 'Deactivate', 'unitedthemes' ) . ' %2$s">' . esc_html__( 'Deactivate', 'unitedthemes' ) . '</button></form>',
                wp_nonce_url(
                    add_query_arg(
                        array(
                            'plugin'                 => urlencode( $single_plugin['slug'] ),
                            'plugin_name'            => urlencode( $single_plugin['sanitized_plugin'] ),
                            'plugin_source'          => urlencode( $single_plugin['source'] ),
                            'unite-deactivate'       => 'deactivate-plugin',
							'unite-deactivate-nonce' => wp_create_nonce( 'unite-deactivate' ),
                        ),
                        admin_url( 'admin.php?page=unite-welcome-page' )
                    )
                ),
                $single_plugin['sanitized_plugin']
            ) );
        
        }
        
        return $plugin_actions;
    
    }    
    
    /**
     * Admin page markup
     * @since    1.0
     * @version  1.0.0
     */
    public function admin_page_display() { 
        
         /* current user */
        $user_id      = get_current_user_id();
        $current_user = wp_get_current_user();
        $avatar       = get_avatar( $user_id, 160 );

        global $ut_theme_license;
    
        ?>
        
        <div id="ut-admin-wrap" class="clearfix">
            
            <div id="ut-ui-admin-header">
                    
                <div class="grid-10 medium-grid-15 tablet-grid-20 hide-on-mobile grid-parent">
                            
                    <div class="ut-admin-branding">
                        <a href="http://unitedthemes.com" target="_blank"><img src="<?php echo THEME_WEB_ROOT; ?>/unite-custom/admin/assets/img/icons/bklyn-logo-white.svg" alt="UnitedThemes"><span class="version-number">Version <?php echo UT_THEME_VERSION; ?></span></a>
                    </div>
                
                </div>                                                
                
                <div class="grid-90 medium-grid-85 tablet-grid-80 mobile-grid-100 grid-parent">
                
                    <div class="ut-admin-header-title">
                        
                        <?php $theme = wp_get_theme(); ?>
                        
                        <h1><?php esc_html_e( 'dashboard.', 'unitedthemes' ); ?></h1>
                    
                    </div>
                
                </div>
                
                </div>
            
                
                <div class="ut-dashboard-nav-bg grid-10 medium-grid-15 hide-on-tablet hide-on-mobile grid-parent">
                    
                <ul class="ut-dashboard-nav">
                
                    <li>
                        <div class="ut-dashboard-avatar">
                            <?php echo $avatar; ?>
                        </div>
                        
                        <span class="ut-hello-admin">
                            <?php echo sprintf( __('Howdy, %1$s', 'unitedthemes'), $current_user->display_name ); ?>
                        </span>                                            
                    </li>
                    
                    <li>
                        <a href="<?php echo get_admin_url(); ?>admin.php?page=<?php echo apply_filters( 'ut_theme_options_page', 'unite-theme-options' ); ?>"><div class="ut-dashboard-theme-option"><img alt="Theme Options" src="<?php echo THEME_WEB_ROOT; ?>/unite/core/admin/assets/img/theme-options.png"></div><span>Theme Options</span></a>
                    </li>

                    <li>
                        <a href="<?php echo get_admin_url(); ?>admin.php?page=unite-theme-info"><div class="ut-dashboard-server-health"><img alt="Server Health" src="<?php echo THEME_WEB_ROOT; ?>/unite/core/admin/assets/img/server-health.png"></div><span>Server Health</span></a>
                    </li>
                    
                    <li>
                        <a href="<?php echo get_admin_url(); ?>admin.php?page=<?php echo apply_filters( 'ut_demo_importer_page', 'ut-demo-importer-reloaded' ); ?>"><div class="ut-dashboard-demo-importer"><img alt="Website Installer" src="<?php echo THEME_WEB_ROOT; ?>/unite/core/admin/assets/img/demo-importer.png"></div><span>Website Installer</span></a>
                    </li>
                    
                    <li>
                        <a href="<?php echo get_admin_url(); ?>admin.php?page=unite-video-tutorials"><div class="ut-dashboard-video-tutorials"><img alt="Video Tutorials" src="<?php echo THEME_WEB_ROOT; ?>/unite/core/admin/assets/img/video-tutorials.png"></div><span>Video Tutorials</span></a>
                    </li>
                    
                    <li>
                        <a target="_blank" href="http://helpdesk.unitedthemes.com/"><div class="ut-theme-support"><img alt="Theme Support" src="<?php echo THEME_WEB_ROOT; ?>/unite/core/admin/assets/img/theme-support.png"></div><span>Theme Support</span></a>
                    </li>
                
                </ul>
                
                </div>
                
                <div class="ut-option-holder grid-90 medium-grid-85 tablet-grid-100 mobile-grid-100">
                
                <div id="ut-dashboard-content">
                    
                        <div class="grid-70 prefix-15 medium-grid-100 tablet-grid-100 mobile-grid-100">
                            
                            <div class="ut-dashboard-hero">
                            
                                <h1>Hi Admin! Welcome to Brooklyn!</h1>
                       
                                <div class="hide-on-mobile"><?php esc_html_e( 'Thank you for purchasing our theme. We\'re as excited as you are about the possibilities before you. Finally, its going to be far less complicated to make your WordPress website pages look and feel the way you want. We’ve assembled some links to get you started with the theme, maintain your site and help you to get an overview of all features available.', 'unitedthemes' ); ?></div>
                            
                            </div>
                        
                        </div>
                        
                        <div class="clear"></div>
                        
                        <div class="ut-dashboard-widgets clearfix">

                            <?php if( $ut_theme_license->get_license_info() == 'registered' || $ut_theme_license->get_license_info() == 'registered_supported') : ?>

                                <div class="ut-dashboard-widget clearfix">

                                    <h3 class="ut-dashboard-title">View Brooklyn License</h3>

                                    <div class="ut-rotate-label">Thanks for registering your Brooklyn Version.</div>

                                    <div class="ut-dashboard-hover">

                                    <div class="ut-rotate-label-hover">Thanks for registering your Brooklyn Version.</div>

                                    </div>

                                    <form method="post" action="<?php echo get_admin_url(); ?>admin.php?page=unite-manage-license">
                                        <button type="submit" formtarget="_self" class="ut-ui-button">Manage License</button>
                                    </form>

                                    <span class="ut-dash-fa-options hide-on-mobile"><i class="fa fa-cubes" aria-hidden="true"></i></span>

                                </div>

                            <?php else : ?>

                                <div class="ut-dashboard-widget clearfix">

                                    <h3 class="ut-dashboard-title">Register Brooklyn</h3>

                                    <div class="ut-rotate-label">Activate your Brooklyn copy today for Premium Benefits (e.g. Live Updates).</div>

                                    <div class="ut-dashboard-hover">

                                        <div class="ut-rotate-label-hover">Activate your Brooklyn copy today for Premium Benefits (e.g. Live Updates).</div>

                                    </div>

                                    <form method="post" action="<?php echo get_admin_url(); ?>admin.php?page=unite-manage-license">
                                        <button type="submit" formtarget="_self" class="ut-ui-button">Unlock all Features</button>
                                    </form>

                                    <span class="ut-dash-fa-options hide-on-mobile"><i class="fa fa-cubes" aria-hidden="true"></i></span>

                                </div>

                            <?php endif; ?>

                            <div class="ut-dashboard-widget clearfix">

                                <h3 class="ut-dashboard-title">Server Health</h3>

                                <div class="ut-rotate-label">The System Health Status report is a vital tool for troubleshooting issues with your site.</div>

                                <div class="ut-dashboard-hover">

                                <div class="ut-rotate-label-hover">The System Health Status report is a vital tool for troubleshooting issues with your site.</div>

                                </div>

                                <form method="post" action="<?php echo get_admin_url(); ?>admin.php?page=unite-theme-info">
                                    <button type="submit" formtarget="_self" class="ut-ui-button ut-ui-button-health">View your Server Status</button>
                                </form>

                                <span class="ut-dash-fa-health infinite pulse animated hide-on-mobile"><i class="fa fa-heart-o" aria-hidden="true"></i></span>

                            </div>

                            <div class="ut-dashboard-widget clearfix">

                                <h3 class="ut-dashboard-title">Theme Websites</h3>

                                <div class="ut-rotate-label">Our unique One Click Website Installer for a quick and easy setup.</div>

                                <div class="ut-dashboard-hover">

                                <div class="ut-rotate-label-hover">Our unique One Click Website Installer for a quick and easy setup.</div>

                                </div>

                                <form method="post" action="<?php echo get_admin_url(); ?>admin.php?page=<?php echo apply_filters( 'ut_demo_importer_page', 'ut-demo-importer-reloaded' ); ?>">
                                    <button type="submit" formtarget="_self" class="ut-ui-button ut-ui-button-demo">Select your dream Website</button>
                                </form>

                                <span class="ut-dash-fa-demo hide-on-mobile"><i class="fa fa-diamond" aria-hidden="true"></i></span>

                            </div>                        
                    
                        </div>    
                           
                    <div class="clear"></div>
                    
                    <div class="ut-dashboard-plugin-message">
                        <div class="grid-100 medium-grid-100 tablet-grid-100 mobile-grid-100">
                            <h3 class="ut-dashboard-title"><?php esc_html_e( 'Required Plugins', 'unitedthemes' ); ?></h3>
                            
                            <?php esc_html_e( 'These are the needed theme core plugins for Brooklyn and required for the use of Brookyln. You can easily install, activate and deactivate these plugins but using the actions button.', 'unitedthemes' ); ?>
                            <?php if( $this->all_good ) : ?>
                        
                                
                            
                            <?php endif; ?>
                                                        
                        </div>
                    </div>
                    
                    <div class="ut-dashboard-plugins clearfix">
                    
                    <?php 
                    
                    foreach( TGM_Plugin_Activation::$instance->plugins as $plugin ) : ?>
                        
                        <?php $action = $this->get_plugin_action( $plugin ); ?>
                            
                        <div class="ut-plugin clearfix">

                            <div class="ut-plugin-banner">

                                <?php if( $plugin['required']) : ?>
                                    <span class="ut-plugin-required"><?php esc_html_e( 'required', 'unitedthemes' ); ?></span>
                                <?php endif; ?>

                                <span class="ut-plugin-status <?php echo str_replace(' ', '-', $action['status'] ); ?>"><?php echo $action['status']; ?></span>

                            </div>

                            <div class="ut-plugin-title">

                                <h4 class="ut-plugin-name"><?php echo $plugin['name']; ?></h4>

                                <span class="ut-plugin-version"><?php esc_html_e( 'Version:', 'unitedthemes' ); ?> <?php echo $plugin['version']; ?></span>

                                 <div class="ut-plugin-btn">
                                    <?php echo $action['button']; ?>
                                </div>

                            </div>

                        </div>
                    
                    <?php endforeach; ?>
                          
                   </div>         
                        
                    <div class="ut-dashboard-img hide-on-tablet hide-on-mobile">
                        <img src="<?php echo FW_WEB_ROOT; ?>/core/admin/assets/img/desktop-backend.png" alt="Theme Demos">
                    </div>
              
                </div>
            
            </div>
            
        </div>

        
    <?php /* end admin page display */
    
    }
    
}

new UT_Admin_home();