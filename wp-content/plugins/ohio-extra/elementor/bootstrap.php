<?php
final class Ohio_Elementor_Support {

    /**
     * Minimum Elementor Version
     *
     * @var string Minimum Elementor version required to run the plugin.
     */
    const MINIMUM_ELEMENTOR_VERSION = '2.9.0';

    /**
     * Minimum PHP Version
     *
     * @var string Minimum PHP version required to run the plugin.
     */
    const MINIMUM_PHP_VERSION = '7.0';

    /**
     * Instance
     *
     * @access private
     * @static
     *
     * @var Ohio_Elementor_Support The single instance of the class.
     */
    private static $_instance = null;

    /**
     * Instance
     *
     * Ensures only one instance of the class is loaded or can be loaded.
     *
     * @access public
     * @static
     *
     * @return Ohio_Elementor_Support An instance of the class.
     */
    public static function instance()
    {
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * Constructor
     *
     * @access public
     */
    public function __construct()
    {
        add_action( 'plugins_loaded', [ $this, 'init' ] );
    }

    /**
     * Initialize the plugin
     *
     * Checks Elementor and PHP requirements for Ohio widgets and init if all ok
     *
     * @access public
     */
    public function init()
    {
        // Check if Elementor installed and activated
        if ( ! did_action( 'elementor/loaded' ) ) {
            return;
        }

        // Check for required Elementor version
        if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
            add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
            return;
        }

        // Check for required PHP version
        if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
            add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
            return;
        }

        // Filters
        add_filter( 'elementor/icons_manager/additional_tabs', [ $this, 'icons_tabs_filter' ] );

        // Add actions
        add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );
        add_action( 'elementor/controls/controls_registered', [ $this, 'init_controls' ] );
        add_action( 'elementor/elements/categories_registered', [ $this, 'init_categories' ] );

        // Hide not compatible features
        add_filter( 'option_elementor_disable_color_schemes', function( $checkbox ) {
            return 'yes';
        });
        add_filter( 'option_elementor_disable_typography_schemes', function( $checkbox ) {
            return 'yes';
        });
    }

    /**
     * Admin notice
     *
     * Warning when the site doesn't have a minimum required Elementor version.
     *
     * @access public
     */
    public function admin_notice_minimum_elementor_version()
    {
        if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

        $message = sprintf(
        /* translators: 1: Theme name 2: Elementor 3: Required Elementor version */
            esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'ohio-extra' ),
            '<strong>' . esc_html__( 'Ohio theme', 'ohio-extra' ) . '</strong>',
            '<strong>' . esc_html__( 'Elementor', 'ohio-extra' ) . '</strong>',
            self::MINIMUM_ELEMENTOR_VERSION
        );

        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
    }

    /**
     * Admin notice
     *
     * Warning when the site doesn't have a minimum required PHP version.
     *
     * @access public
     */
    public function admin_notice_minimum_php_version()
    {
        if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

        $message = sprintf(
        /* translators: 1: Theme name 2: PHP 3: Required PHP version */
            esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'ohio-extra' ),
            '<strong>' . esc_html__( 'Ohio theme', 'ohio-extra' ) . '</strong>',
            '<strong>' . esc_html__( 'PHP', 'ohio-extra' ) . '</strong>',
            self::MINIMUM_PHP_VERSION
        );

        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
    }

    /**
     * Init Widgets
     *
     * Include widgets files and register them
     *
     * @access public
     */
    public function init_widgets()
    {
        // Include own Base class
        require_once( __DIR__ . '/widget-base-class.php' );

        // and our widgets
        $widgets_path = plugin_dir_path( __FILE__ ) . 'widgets/';
        $dh = opendir( $widgets_path );

        while ( false !== ( $filename = readdir( $dh ) ) ) {
            if ( substr( $filename, 0, 1) != '_' && strrpos( $filename, '.' ) === false ) {
                include_once $widgets_path . $filename . '/' . $filename . '-widget.php';
            }
        }
    }

    /**
     * Init Controls
     *
     * Include controls files and register them
     *
     * @access public
     */
    public function init_controls()
    {
        // Image choose box
        require_once( __DIR__ . '/controls/image-choose-box/image-choose-box-control.php' );
    }

    public function init_categories($manager)
    {
        $manager->add_category( 100, [
            'title' => __( 'Ohio Theme', 'ohio-extra' ),
            'icon' => 'eicon-pojome',
            'active' => true,
        ] );
    }

    public function icons_tabs_filter($tabs)
    {
        $tabs['linea'] = [
            'name' => 'linea',
            'label' => __( 'Linea - Basic', 'ohio-extra' ),
            'url' => get_template_directory_uri() . '/assets/fonts/linea/basic/css/style.css',
            'enqueue' => [
                get_template_directory_uri() . '/assets/fonts/linea/basic_ela/css/style.css',
                get_template_directory_uri() . '/assets/fonts/linea/basic/css/style.css',
                get_template_directory_uri() . '/assets/fonts/linea/software/css/style.css',
                get_template_directory_uri() . '/assets/fonts/linea/ecommerce/css/style.css',
            ],
            'prefix' => 'linea-',
            'displayPrefix' => '',
            'labelIcon' => 'fas fa-icons',
            'ver' => '1.0.0',
            'fetchJson' => plugin_dir_url( __FILE__ ) . 'icon_lists/linea.js',
            'native' => true,
        ];

        $tabs['linea_other'] = [
            'name' => 'linea_other',
            'label' => __( 'Linea - Other', 'ohio-extra' ),
            'url' => get_template_directory_uri() . '/assets/fonts/linea/arrows/css/style.css',
            'enqueue' => [
                get_template_directory_uri() . '/assets/fonts/linea/arrows/css/style.css',
                get_template_directory_uri() . '/assets/fonts/linea/music/css/style.css',
                get_template_directory_uri() . '/assets/fonts/linea/weather/css/style.css',
            ],
            'prefix' => 'linea-',
            'displayPrefix' => '',
            'labelIcon' => 'fas fa-icons',
            'ver' => '1.0.0',
            'fetchJson' => plugin_dir_url( __FILE__ ) . 'icon_lists/linea_other.js',
            'native' => true,
        ];

        $tabs['ionicons'] = [
            'name' => 'ionicons',
            'label' => __( 'Ionicons - Material', 'ohio-extra' ),
            'url' => get_template_directory_uri() . '/assets/fonts/ionicons/css/ionicons.min.css',
            'enqueue' => [ get_template_directory_uri() . '/assets/fonts/ionicons/css/ionicons.min.css' ],
            'prefix' => 'ion-md-',
            'displayPrefix' => 'ion',
            'labelIcon' => 'fas fa-icons',
            'ver' => '1.0.0',
            'fetchJson' => plugin_dir_url( __FILE__ ) . 'icon_lists/ionicons.js',
            'native' => true,
        ];

        $tabs['ionicons_ios'] = [
            'name' => 'ionicons_ios',
            'label' => __( 'Ionicons - iOS', 'ohio-extra' ),
            'url' => get_template_directory_uri() . '/assets/fonts/ionicons/css/ionicons.min.css',
            'enqueue' => [ get_template_directory_uri() . '/assets/fonts/ionicons/css/ionicons.min.css' ],
            'prefix' => 'ion-ios-',
            'displayPrefix' => 'ion',
            'labelIcon' => 'fas fa-icons',
            'ver' => '1.0.0',
            'fetchJson' => plugin_dir_url( __FILE__ ) . 'icon_lists/ionicons_ios.js',
            'native' => true,
        ];

        $tabs['ionicons_logo'] = [
            'name' => 'ionicons_logo',
            'label' => __( 'Ionicons - Brands', 'ohio-extra' ),
            'url' => get_template_directory_uri() . '/assets/fonts/ionicons/css/ionicons.min.css',
            'enqueue' => [ get_template_directory_uri() . '/assets/fonts/ionicons/css/ionicons.min.css' ],
            'prefix' => 'ion-logo-',
            'displayPrefix' => 'ion',
            'labelIcon' => 'fas fa-icons',
            'ver' => '1.0.0',
            'fetchJson' => plugin_dir_url( __FILE__ ) . 'icon_lists/ionicons_logo.js',
            'native' => true,
        ];

        return $tabs;
    }

}

Ohio_Elementor_Support::instance();
