<?php
if ( !defined( 'OHIO_VERSION' ) ) {
    define( 'OHIO_VERSION', '2.3.1' );
}

$ohio_inc_directory = get_template_directory() . '/inc/';

// Init
require_once $ohio_inc_directory . 'init/theme.php'; // theme init
require_once $ohio_inc_directory . 'init/customizer.php'; // customizer
require_once $ohio_inc_directory . 'init/custom_header.php'; // custom header feature
require_once $ohio_inc_directory . 'init/extras.php'; // extras

// Ohio helper framework
require_once $ohio_inc_directory . 'framework/bootstrap.php'; // Ohio framework

// Include TGMPA and set up plugins
require_once $ohio_inc_directory . 'tgmpa/class-tgm-plugin-activation.php';
require_once $ohio_inc_directory . 'tgmpa/register_plugins.php';
require_once $ohio_inc_directory . 'tgmpa/vc_setup.php';
require_once $ohio_inc_directory . 'tgmpa/acf_setup.php';
require_once $ohio_inc_directory . 'tgmpa/woocommerce_setup.php';
require_once $ohio_inc_directory . 'tgmpa/ocdi_setup.php';

// Parts
require_once $ohio_inc_directory . 'template_tags.php'; // custom tags template
require_once $ohio_inc_directory . 'sidebars.php'; // sidebars register
require_once $ohio_inc_directory . 'menu.php'; // mega menu
require_once $ohio_inc_directory . 'wp_overrides.php'; // WP features overrides (posts, comments, auth, ...)

// CSS and JS includes
require_once $ohio_inc_directory . 'enqueue.php';