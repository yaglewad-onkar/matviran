<?php if (!defined('ABSPATH')) {
    exit; // exit if accessed directly
}

class UT_Import_Export {
    
    /**
     * Import Export option key, and sidebar admin page slug
     * @var string
     */
    private $key = 'unite-import-export';

    /**
     * Import Export Title
     * @var string
     */
    protected $title = '';
    
    
    /**
     * Constructor
     * @since     1.0.0
     * @version   1.0.0
     */
    public function __construct() {
        
        $this->title = esc_html__( 'Import / Export', 'unitedthemes' );
        
        /* run hooks */
        $this->hooks();
            
    }
    
    /**
     * Initiate our hooks
     * @since     1.0.0
     * @version   1.0.0
     */
    public function hooks() {
        
        /* necessary scripts */ 
        if ( isset( $_GET['page'] ) && $this->key == $_GET['page'] ) {
            
            /* load js */
            add_action( 'admin_enqueue_scripts', array( $this , 'enqueue_import_js' ) );
        
        }
        
        /* add menu item */
        add_action( 'admin_menu' , array( $this , 'add_menu_item' ) );

        /* ajax request to load default theme options */
	    add_action( 'wp_ajax_ut_get_default_theme_options', array( $this, 'get_theme_default_options' ) );

        if ( isset( $_GET['page'] ) && $this->key == $_GET['page'] ) {

	        /* import */
	        add_action( 'admin_init', array( $this, 'import_settings' ) );

            /* add notices after import */
            add_action( 'admin_notices', array( $this, 'show_notices' ) );

	        /* load js */
	        add_action( 'admin_enqueue_scripts', array( $this, 'register_js' ) );
        
        }
        
    }

	/**
	 * Theme Health JS
	 * @since  1.2
	 */
	public function register_js() {

		$min = NULL;

		if( !WP_DEBUG ){
			$min = '.min';
		}

		wp_enqueue_script(
			'unite-clipboard',
			FW_WEB_ROOT . '/core/admin/assets/vendor/clipboard/clipboard.min.js',
			array('jquery'),
			UT_VERSION
		);

		wp_enqueue_script(
			'unite-theme-export',
			FW_WEB_ROOT . '/core/admin/assets/js/unite-import-export' . $min . '.js',
			array( 'jquery', 'unite-clipboard' ),
			UT_VERSION
		);

	}


    /**
     * Add to menu
     * @since     1.0.0
     * @version   1.0.0
     */
    public function add_menu_item() {

	    $func = 'add_' . 'submenu_page';
	    $func('unite-welcome-page', $this->title, $this->title, 'manage_options', $this->key, array( $this , 'admin_page_display' ) );
        
    }

	/**
	 * Export Data
	 * @since    1.0
	 * @version  1.0.0
	 */

    public function export_data() {

        /* format setting outer wrapper */
        echo '<div class="format-setting type-textarea simple has-desc">';

            /* get theme options data */
            $data = get_option( 'option_tree' );
            $data = ! empty( $data ) ? ot_encode( $data ) : '';

            echo '<div class="format-setting-inner">';
                echo '<textarea readonly rows="10" cols="40" style="width:100%;" name="unite_export_options" id="unite_export_options" class="ut-ui-form-textarea ut-ui-form-code-textarea">' . $data . '</textarea>';
            echo '</div>';

        echo '</div>';

    }


    /**
     * Admin page markup
     * @since    1.0
     * @version  1.0.0
     */
    public function admin_page_display() {

	    global $ut_theme_license; ?>
        
        <form id="ut-importer-export-form" method="post" action="?page=<?php echo $this->key; ?>">

        <!-- Start UT-Backend-Wrap -->
        <div id="ut-admin-wrap" class="clearfix" style="min-height: calc(100vh - 32px);">

            <div id="ut-ui-admin-header">

                <div class="grid-10 medium-grid-15 tablet-grid-20 hide-on-mobile grid-parent">

                    <div class="ut-admin-branding">
                        <a href="https://www.unitedthemes.com" target="_blank"><img src="<?php echo THEME_WEB_ROOT; ?>/unite-custom/admin/assets/img/icons/bklyn-logo-white.svg" alt="UnitedThemes"><span class="version-number">Version <?php echo UT_THEME_VERSION; ?></span></a>
                    </div>

                </div>

                <div class="grid-90 medium-grid-85 tablet-grid-80 mobile-grid-100 grid-parent">

                    <div class="ut-admin-header-title">

                        <h1><?php esc_html_e( 'Import / Export Tool.', 'unitedthemes' ); ?></h1>

                    </div>

                </div>

            </div>

            <div class="ut-dashboard-content">

                <!-- Start UT-Admin-Main -->
                <div id="ut-dashboard-content">

                    <div class="grid-70 prefix-15 medium-grid-100 tablet-grid-100 mobile-grid-100">

                        <div class="ut-dashboard-hero">

                            <h1><?php esc_html_e( 'Brooklyn Theme Options Tool', 'unitedthemes' ); ?></h1>

                            <div class="hide-on-mobile">
                                <?php echo sprintf( esc_html__( 'Note that this export / export tool is only designed to migrate Theme Options. %s If you are looking for an entire site migration please use for example %s or %s', 'unitedthemes' ), '<br>', '<a target="_blank" href="https://updraftplus.com/?afref=567">Updraft Plus</a>', '<a target="_blank" href="https://de.wordpress.org/plugins/all-in-one-wp-migration/">All-in-One WP Migration</a>' ); ?>
                            </div>

                        </div>

                    </div>

                    <div class="clear"></div>

                    <div class="ut-dashboard-widgets">

                        <div class="ut-dashboard-widget ut-dashboard-widget-export clearfix">

                            <h3 class="ut-dashboard-title"><?php esc_html_e( 'Export', 'unitedthemes' ); ?></h3>
                            <span class="ut-admin-panel-description"><?php esc_html_e( 'Theme Options to export. Place the content of this field inside the import field of your new installation.', 'unitedthemes' ); ?></span>

                            <?php $this->export_data(); ?>

                            <button class="ut-copy-export ut-ui-button ut-ui-button-health" data-clipboard-target="#unite_export_options"><?php esc_html_e( 'Copy Theme Option','unitedthemes' ); ?></button>

                        </div>

                        <div class="ut-dashboard-widget ut-dashboard-widget-import clearfix <?php if( $ut_theme_license->get_license_info() == 'unregistered' ) : ?>ut-dashboard-widget-export<?php endif;?>">

                            <h3 class="ut-dashboard-title"><?php esc_html_e( 'Import', 'unitedthemes' ); ?></h3>
                            <span class="ut-admin-panel-description"><?php esc_html_e( 'Theme Options to import. Place the content of the old installation export field inside this one and hit "Import".', 'unitedthemes' ); ?></span>

	                        <?php if( $ut_theme_license->get_license_info() != 'unregistered' && $ut_theme_license->get_license_info() != 'connection_issue' ) : ?>

                                <div class="ut-ui-select-field">

                                    <select autocomplete="off" id="ut-load-demo-default-config" class="ut-ui-form-select ut-ui-select">

                                        <option value=""><?php esc_html_e( 'or load a default config', 'unite_admin' ); ?></option>

                                        <?php $default_options = ut_demo_importer_info();

                                            foreach( $default_options as $option ) {

                                            echo '<option value="' . $option['file'] . '">' . $option['name'] . '</option>';

                                        } ?>

                                    </select>

                                </div>

	                        <?php endif;?>

                            <textarea placeholder="<?php esc_html_e( 'Place the "Export" Data of the other Installation here.','unitedthemes' ); ?>" rows="10" cols="40" name="unite_import_options" id="unite_import_options" class="ut-ui-form-textarea ut-ui-form-code-textarea"></textarea>

                            <button class="ut-ui-button ut-import-export"><?php esc_html_e( 'Import Theme Options','unitedthemes' ); ?></button>

                        </div>

                    </div>

                </div>

            </div>
        
        </div>
        <!-- Close UT-Backend-Wrap -->

        <input type="hidden" name="unite_import_export" value="unite_run_import" />
        <input type="hidden" name="unite_import_export_nonce" value="<?php echo wp_create_nonce( 'unite-import-export-nonce' ); ?>" />

        </form>
        
    <?php }

	public function ContentUrlToLocalPath( $url ){

		if( is_multisite() && strpos( $url, '/sites/') !== false  ) {

			preg_match('/.*(\/wp\-content\/uploads\/sites\/\d+\/\d+\/\d+\/.*)/', $url, $mat);
			if (count($mat) > 0) return $mat[1];
			return '';

		} else {

			preg_match('/.*(\/wp\-content\/uploads\/\d+\/\d+\/.*)/', $url, $mat);
			if (count($mat) > 0) return $mat[1];
			return '';

		}

	}

    public function get_theme_default_options() {

        if( empty( $_POST['demo'] ) ){
            return;
        }

        if( !array_key_exists( $_POST['demo'], ut_demo_importer_info() )) {
            return;
        }

        global $ut_theme_license;

	    $txt = get_page_by_title( $_POST['demo'] . '.txt', OBJECT, 'attachment' );

	    if( !isset( $txt->ID ) ) {

		    // Preload Theme Options
		    $url = add_query_arg( array(
			    'purchase_code' => get_option( 'envato_purchase_code_' . $ut_theme_license->item_id ),
			    'domain'        => $ut_theme_license->get_site_url_plain(),
			    'file'          => $_POST['demo'],
			    'action'        => 'request_demo_options'
		    ), $ut_theme_license->server . 'demo-server/' );

		    $txt = new Unite_Download_Remote_File( $url, array( 'post_title' => $_POST['demo'] . '.txt' ), $_POST['demo'] . '.txt' );
		    $demo_file = $txt->download();

		    // set attached file meta
		    update_post_meta( $demo_file, '_wp_attached_file', $this->ContentUrlToLocalPath( get_attached_file( $demo_file ) ) );

	    } else {

	        $demo_file = $txt->ID;

        }

	    $ot_layout_file = ABSPATH . get_post_meta( $demo_file, '_wp_attached_file', true );

	    if ( !is_readable( $ot_layout_file ) ) {
		    return;
	    }

	    /* file rawdata */
	    echo ut_file_get_content( $ot_layout_file );
        exit();


    }

    private function do_import( $import ) {

        // class to copy images
	    require_once( FW_DOCUMENT_ROOT . '/core/admin/unite-remote-file.php' );

        // get default theme option
	    $settings = _ut_theme_options();

	    if ( is_array( $import ) ) {

		    foreach( $settings['settings'] as $setting ) {

			    if ( isset( $import[$setting['id']] ) ) {

				    $content = ot_stripslashes( $import[$setting['id']] );

				    if( !empty( $content ) && in_array( $setting['type'], array( 'upload', 'background' ) )  ) {

				        // default upload field
                        if( $setting['type'] == 'upload' ) {

	                        $download_remote_image = new Unite_Download_Remote_File( $content );
	                        $attachment_id         = $download_remote_image->download();

	                        if( $attachment_id ) {

                                $content = wp_get_attachment_url( $attachment_id );

                            }

                        }

                        // background field
					    if( $setting['type'] == 'background' ) {

                            if( isset( $content['background-image'] ) ) {

	                            $download_remote_image = new Unite_Download_Remote_File( $content['background-image'] );
	                            $attachment_id         = $download_remote_image->download();

	                            if( $attachment_id ) {

		                            $content['background-image'] = wp_get_attachment_url( $attachment_id );

	                            }

                            }

					    }

                    }

				    $import[$setting['id']] = ot_validate_setting( $content, $setting['type'], $setting['id'] );

                    if( $setting['id'] == 'ut_accentcolor' ) {

	                    update_option( 'ut_accentcolor', $import[$setting['id']] );

                    }

			    }

		    }

		    /* execute the action hook and pass the theme options to it */
		    do_action( 'ot_before_theme_options_save', $import );

		    /* update the option tree array */
		    update_option('option_tree', $import );

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

		    return true;

        } else {

	        return false;

        }

    }

    public function import_settings() {

        /* check for import */
        if( !empty( $_REQUEST['unite_import_options'] ) && isset( $_REQUEST['unite_import_export'] ) && $_REQUEST['unite_import_export'] == 'unite_run_import' ) {
            
            /* get nonce */
            $nonce = $_REQUEST['unite_import_export_nonce'];
            
            /* check if nonce is set and correct */
            if ( ! wp_verify_nonce( $nonce, 'unite-import-export-nonce' ) ) {
                wp_die( 'Busted!');
            }

	        $import = false;

            if ( current_user_can( 'manage_options' ) ) {
            
                $import = ot_decode( $_REQUEST['unite_import_options'] );

                if( $import ) {

                    /* run import function */
                    $import = $this->do_import( maybe_unserialize( $import ) );
                    
                } else {
                    
                    wp_redirect( admin_url( 'admin.php?page=' . $this->key . '&unite_notification=error' ) );
                
                }
            
            } else {
            
                 wp_redirect( admin_url( 'admin.php?page=' . $this->key . '&unite_notification=permission' ) );
            
            }

            if( $import ) {
                
                wp_redirect( admin_url( 'admin.php?page=' . $this->key . '&unite_notification=success' ) );
                
            } else {
                
                wp_redirect( admin_url( 'admin.php?page=' . $this->key . '&unite_notification=error' ) );
            
            }                
        
        }
    
    }
    
    
    public function show_notices() {
        
        /* wrong permissions */
        if( isset( $_GET['unite_notification'] ) && $_GET['unite_notification'] == 'error' ) {
        
            echo '<div class="error">';
                echo '<p>' , esc_html__( 'An Error occured during your import, please contact your site administrator!', 'unitedthemes' ) , '</p>';
            echo '</div>';
        
        } 
        
        /* wrong permissions */
        if( isset( $_GET['unite_notification'] ) && $_GET['unite_notification'] == 'permission' ) {
        
            echo '<div class="error">';
                echo '<p>' , esc_html__( 'You are not allowed to import theme options!', 'unitedthemes' ) , '</p>';
            echo '</div>';
        
        }            
        
        /* update was successful */
        if( isset( $_GET['unite_notification'] ) && $_GET['unite_notification'] == 'success' ) {
        
            echo '<div class="updated">';
                echo '<p>' , esc_html__( 'Import was successful!', 'unitedthemes' ) , '</p>';
            echo '</div>';
        
        }
        
    
    }
    
    public function enqueue_import_js() {

        wp_register_script(
            'unite-importer-exporter', 
            FW_WEB_ROOT . '/core/admin/assets/js/unite-import-export.js', 
            array('jquery'), 
            UT_VERSION
        );
        
        wp_enqueue_script('unite-importer-exporter');
        
        $localized_array = array(
            'message'  => esc_html__( 'Are you sure? The import will start immediately!', 'unitedthemes' ),
        );

        /* localized script admin */
        wp_localize_script( 'unite-importer-exporter', 'unite_importer', $localized_array ); 
        
        
    }
    
       
}

/* get it started */
new UT_Import_Export();