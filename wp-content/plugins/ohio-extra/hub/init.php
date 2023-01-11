<?php

add_action( 'admin_menu', 'register_ohio_hub_page' );
function register_ohio_hub_page() {
    add_menu_page(
        'Ohio Theme',
        'Ohio Theme', // side menu title
        'edit_others_posts',
        'ohio_hub',
        false,
        get_template_directory_uri() . '/inc/tgmpa/theme_settings.png', // icon
        2 // order
    );
}

add_filter( 'option_page_capability_ohio_hub', 'ohio_hub_capability' );
function ohio_hub_capability( $capability ) {
    return 'edit_others_posts';
}

/**
 * Subpages
 */

// Dashboard
add_action( 'admin_menu', 'register_ohio_hub_subpage_dashboard' );
function register_ohio_hub_subpage_dashboard() {
    add_submenu_page( 'ohio_hub', 'Help page', 'Dashboard', 'edit_others_posts', 'ohio_hub', 'ohio_hub_dashboard_page' ); 
}
function ohio_hub_dashboard_page() {
    include 'pages/dashboard-page.php';
}

// Settings
add_action( 'admin_menu', 'register_ohio_hub_subpage_settings' );
function register_ohio_hub_subpage_settings() {
    add_submenu_page( 'ohio_hub', 'Help page', 'Theme Settings', 'edit_others_posts', 'ohio_hub_settings', 'ohio_hub_settings_page' ); 
}
function ohio_hub_settings_page() {
    include 'pages/settings-page.php';
}

// AJAX license registration and removing
add_action( 'wp_ajax_ohio_save_license_code', 'ohio_save_license_code' );
function ohio_save_license_code() {
    $data = str_replace('\"', '"', $_POST['license'] );
    $data = json_decode($data);

    if (!$data) return false;

    if ( !empty( $data->code ) && !empty( $data->sold_at ) && !empty( $data->supported_until ) ) {
        add_option( 'ohio_license_code', $data->code );
        add_option( 'ohio_license_sold_at', $data->sold_at );

        $timestamp = (new \DateTime( $data->supported_until ))->getTimestamp();
        add_option( 'ohio_license_support_until', $timestamp );

        if ( !empty( $data->type ) ) {
            add_option( 'ohio_license_type', $data->type );
        }
    }

    wp_die();
}

add_action( 'wp_ajax_ohio_remove_license_code', 'ohio_remove_license_code' );
function ohio_remove_license_code() {
    $response = wp_remote_post( 'https://demo.clbthemes.com/remove_license', [
        'timeout' => 15,
        'redirection' => 15,
        'httpversion' => '1.0',
        'blocking' => true,
        'headers' => [
            'X-Ohio-Referer' => 'https://' . $_SERVER['HTTP_HOST']
        ],
        'cookies' => [],
        'body' => [
            'code' => get_option( 'ohio_license_code', '' )
        ],
    ] );

    if ( !is_wp_error( $response ) && $response['body'] == 'OK' ) {
        delete_option( 'ohio_license_code' );
        delete_option( 'ohio_license_sold_at' );
        delete_option( 'ohio_license_support_until' );
        delete_option( 'ohio_license_type' );
    } else {
        // error_log(json_encode($response['body']));
    }

    wp_die();
}

add_action( 'wp_ajax_ohio_check_last_version', 'ohio_check_last_version' );
function ohio_check_last_version() {
    $ohio_theme = wp_get_theme( get_template() );
    $current = $ohio_theme->get( 'Version' ) ? $ohio_theme->get( 'Version' ) : '2.0.0';

    $response = wp_remote_get( 'https://demo.clbthemes.com/actual_version' );
    $actual = wp_remote_retrieve_body( $response );

    echo json_encode([
        'current' => $current,
        'actual' => $actual
    ]);

    update_option( 'ohio_last_available_version', $actual );

    wp_die();
}

/* Sync other languages */
add_action( 'wp_ajax_ohio_sync_settings_with_main_lang', 'ohio_sync_settings_with_main_lang' );
function ohio_sync_settings_with_main_lang() {
    $current_lang = $_POST['current_lang'];
    if ( ! $current_lang) wp_die();

    function ohio_mock_acf_post_id($post_id) {
        return 'options';
    }

    add_filter('acf/validate_post_id', 'ohio_mock_acf_post_id');
    $options = get_field_objects('options');

    $values = [];
    foreach ( $options as $field ) {
        $values[$field['name']] = get_field( $field['name'], 'options', false );
    }

    remove_filter('acf/validate_post_id', 'ohio_mock_acf_post_id');
    foreach ($values as $key => $value) {
        update_field( $key, $value, 'options_' . $current_lang );
    }

    wp_die('OK');
}

// License message
add_action( 'admin_notices', 'ohio_hub_license_notice' );
function ohio_hub_license_notice() {
    if ( !get_option( 'ohio_license_code', '' ) ): ?>
    <div class="notice notice-error is-dismissible">
        <p>
            <?php _e( 'To install the demo content and use all the Ohio features license activation is required. Please visit the dashboard to activate your Ohio license.', 'ohio-extra' ); ?> <a href="admin.php?page=ohio_hub">Activate</a>
        </p>
    </div>
    <?php endif;
}

include 'ohio-options-pages-class.php';
