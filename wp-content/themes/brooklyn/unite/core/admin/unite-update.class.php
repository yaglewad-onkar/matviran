<?php


class Unite_AutoUpdate {

	/**
	 * The plugin current version
	 * @var string
	 */
	private $current_version;

	/**
	 * The plugin remote update path
	 * @var string
	 */
	private $update_path;

	/**
	 * Plugin Slug (plugin_directory/plugin_file.php)
	 * @var string
	 */
	private $path_slug;


	/**
	 * Plugin name (plugin_file)
	 * @var string
	 */
	private $slug;


	/**
	 * Current Domain
	 * @var string
	 */
	private $domain;


	/**
	 * License Key
	 * @var string
	 */
	private $license_key;

	/**
	 * Initialize a new instance of the WordPress Auto-Update class
	 * @param string $type
	 * @param string $current_version
	 * @param string $update_path
	 * @param string $path_slug
	 * @param string $slug
	 * @param string $license_key
	 * @param string $domain
	 */

	public function __construct( $type = 'plugin', $current_version, $update_path, $path_slug, $slug, $license_key = '', $domain = '' ) {

		// Set the class public variables
		$this->current_version = $current_version;

		// Update Path
		$this->update_path = $update_path;

		// Set the License
		$this->license_key = $license_key;

		// Set the Plugin Slug
		$this->path_slug = $path_slug;

		// Set the Plugin Name Slug
		$this->slug = $slug;

		// Set the domain
		$this->domain = $domain;

		if( $type == 'plugin' ) {

			// define the alternative API for updating checking
			add_filter( 'pre_set_site_transient_update_plugins', array( $this, 'check_update' ) );

			// Define the alternative response for information checking
			add_filter( 'plugins_api', array( $this, 'check_info' ), 10, 3 );

		}

		if( $type == 'theme' ) {

			// define the alternative API for updating checking
			add_filter( 'pre_set_site_transient_update_themes', array( $this, 'check_theme_update' ) );
			add_filter( 'site_transient_update_themes', array( $this, 'check_theme_update' ) );

		}

	}


	/**
	 * Add our self-hosted autoupdate plugin to the filter transient
	 *
	 * @param $transient
	 * @return object $ transient
	 */

	public function check_update( $transient ) {

		if ( empty( $transient->checked ) ) {
			return $transient;
		}

		// Get the remote version
		$remote_version = $this->getRemote( 'version' );

		if( isset( $remote_version->version ) ) {

			/* If a newer version is available, add the update */
			if ( version_compare( $this->current_version, $remote_version->version, '<' ) ) {

				$obj              = new stdClass();
				$obj->slug        = $this->slug;
				$obj->new_version = $remote_version->version;
				$obj->plugin      = $this->path_slug;

				// package download URL
				if ( isset( $remote_version->download_url ) ) {

					$obj->package = $remote_version->download_url;
					// $obj->url = $remote_version->download_url;

				}

				$transient->response[ $this->path_slug ] = $obj;

				return $transient;

			}

		}

		return $transient;

	}


	/**
	 * Add our self-hosted autoupdate plugin to the filter transient
	 *
	 * @param $transient
	 * @return object $ transient
	 */

	public function check_theme_update( $transient ) {

		if ( empty( $transient->checked ) ) {
			return $transient;
		}

		// Get the remote version
		$remote_version = $this->getRemote( 'version' );

		if( isset( $remote_version->version ) ) {

			/* If a newer version is available, add the update */
			if ( version_compare( $this->current_version, $remote_version->version, '<' ) ) {

				$obj                = array();
				$obj['theme']       = $this->slug;
				$obj['new_version'] = $remote_version->version;
				$obj['url']         = 'https://unitedthemes.com/changelog/';

				// package download URL
				if ( isset( $remote_version->download_url ) ) {

					$obj['package'] = $remote_version->download_url;

				}

				$transient->response['brooklyn'] = $obj;

				return $transient;

			}

		}

		return $transient;

	}

	/**
	 * Add our self-hosted description to the filter
	 *
	 * @param boolean $obj
	 * @param array $action
	 * @param object $arg
	 * @return bool|object
	 */

	public function check_info($obj, $action, $arg)	{

		if( ( $action=='query_plugins' || $action=='plugin_information' ) && isset( $arg->slug ) && $arg->slug === $this->slug ) {

			$path = 'update-server/';

			// start request
			$request = wp_remote_get( add_query_arg( array(

				'action'        => 'get_metadata',
				'slug'          => $this->slug

			), $this->update_path . $path ) );

			// Check if response is valid
			if ( !is_wp_error( $request ) || wp_remote_retrieve_response_code( $request ) === 200 ) {

				$plugin_data = json_decode( wp_remote_retrieve_body( $request ) );

				if( isset( $plugin_data->banners ) ) {

					$plugin_data->banners = (array) $plugin_data->banners;

				}

				if( isset( $plugin_data->sections ) ) {

					$plugin_data->sections = (array) $plugin_data->sections;

				}

				return $plugin_data;

			}

			return false;

		}

		return $obj;

	}


	/**
	 * Return the remote version
	 *
	 * @param string $action
	 * @return string $remote_version
	 */

	public function getRemote( $action ) {

		$path = 'update-server/';

		// start request
		$request = wp_remote_get( add_query_arg( array(

			'purchase_code' => $this->license_key,
			'domain'        => $this->domain,
			'action'        => 'get_metadata',
			'slug'          => $this->slug

		), $this->update_path . $path ) );


        if ( is_wp_error( $request ) ) {

            // set a 30 Minutes Transient to prevent API Hammering
            set_transient( 'ut-server-status', (object) array( 'server_status' => 'connection_issue' ), 30 * MINUTE_IN_SECONDS  );

        }

		// Check if response is valid
		if ( !is_wp_error( $request ) || wp_remote_retrieve_response_code( $request ) === 200 ) {

			return json_decode( $request['body'] );

		}

		return false;

	}


}