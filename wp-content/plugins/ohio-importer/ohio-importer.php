<?php
/*
	Plugin Name: Ohio Importer
	Plugin URI: https://clbthemes.com
	Description: Import premade demo templates with a single click.
	Version: 1.2.2
	Author: Colabrio
	Author URI: https://clbthemes.com

	Copyright 2020 Colabrio (email: support@clbthemes.com)

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation; either version 2 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301 USA
*/

// Block direct access to the main plugin file.
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

// --- FIX ImageMagic timeout error
add_filter( 'wp_image_editors', 'change_graphic_lib' );

function change_graphic_lib($array) {
    return array( 'WP_Image_Editor_GD', 'WP_Image_Editor_Imagick' );
}
// --- / FIX ImageMagic timeout error



// Pull plugin init order to end
add_action('plugins_loaded', 'colabrio_ocdi_init');

function colabrio_ocdi_init() {

	if ( class_exists( 'OCDI_Plugin' ) ) {
		add_action( 'admin_notices', 'colabrio_extra_ocdi_admin_notice' );

		function colabrio_extra_ocdi_admin_notice() {
		?>
			<div class="notice notice-error">
				<p>
					<strong><?php esc_html_e( '"Ohio Importer" plugin conflicts with "One Click Demo Import" plugin. Activation of both plugins is not possible at the same time.', 'ohio-extra' ); ?></strong>
					<br>
					<?php _e( 'Please deactivate "One Click Demo Import" plugin in order to use "Ohio Importer".', 'ohio-importer' ); ?>
				</p>
			</div>
		<?php
		}
	} else {
		/**
		 * Main plugin class with initialization tasks.
		 */
		class OCDI_Plugin {
			/**
			 * Constructor for this class.
			 */
			public function __construct() {
				/**
				 * Display admin error message if PHP version is older than 5.3.2.
				 * Otherwise execute the main plugin class.
				 */
				if ( version_compare( phpversion(), '5.3.2', '<' ) ) {
					add_action( 'admin_notices', array( $this, 'old_php_admin_error_notice' ) );
				}
				else {
					// Set plugin constants.
					$this->set_plugin_constants();

					// Composer autoloader.
					require_once PT_OCDI_PATH . 'vendor/autoload.php';

					// Instantiate the main plugin class *Singleton*.
					$pt_one_click_demo_import = OCDI\OhioImporter::get_instance();
				}
			}


			/**
			 * Display an admin error notice when PHP is older the version 5.3.2.
			 * Hook it to the 'admin_notices' action.
			 */
			public function old_php_admin_error_notice() {
				$message = sprintf( esc_html__( 'The %2$sOne Click Demo Import%3$s plugin requires %2$sPHP 5.3.2+%3$s to run properly. Please contact your hosting company and ask them to update the PHP version of your site to at least PHP 5.3.2.%4$s Your current version of PHP: %2$s%1$s%3$s', 'ohio-importer' ), phpversion(), '<strong>', '</strong>', '<br>' );

				printf( '<div class="notice notice-error"><p>%1$s</p></div>', wp_kses_post( $message ) );
			}


			/**
			 * Set plugin constants.
			 *
			 * Path/URL to root of this plugin, with trailing slash and plugin version.
			 */
			private function set_plugin_constants() {
				// Path/URL to root of this plugin, with trailing slash.
				if ( ! defined( 'PT_OCDI_PATH' ) ) {
					define( 'PT_OCDI_PATH', plugin_dir_path( __FILE__ ) );
				}
				if ( ! defined( 'PT_OCDI_URL' ) ) {
					define( 'PT_OCDI_URL', plugin_dir_url( __FILE__ ) );
				}

				// Action hook to set the plugin version constant.
				add_action( 'admin_init', array( $this, 'set_plugin_version_constant' ) );
			}


			/**
			 * Set plugin version constant -> PT_OCDI_VERSION.
			 */
			public function set_plugin_version_constant() {
				if ( ! defined( 'PT_OCDI_VERSION' ) ) {
					$plugin_data = get_plugin_data( __FILE__ );
					define( 'PT_OCDI_VERSION', $plugin_data['Version'] );
				}
			}
		}

		// Instantiate the plugin class.
		$ocdi_plugin = new OCDI_Plugin();
	}
}
