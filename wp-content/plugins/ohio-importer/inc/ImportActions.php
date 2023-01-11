<?php
/**
 * Class for the import actions used in the One Click Demo Import plugin.
 * Register default WP actions for OCDI plugin.
 *
 * @package ocdi
 */

namespace OCDI;

class ImportActions {
	/**
	 * Register all action hooks for this class.
	 */
	public function register_hooks() {
		// Before content import.
		add_action( 'pt-ocdi/before_content_import_execution', array( $this, 'before_content_import_action' ), 10, 3 );

		// After content import.
		add_action( 'pt-ocdi/after_content_import_execution', array( $this, 'before_widget_import_action' ), 10, 3 );
		add_action( 'pt-ocdi/after_content_import_execution', array( $this, 'widgets_import' ), 20, 3 );
		// add_action( 'pt-ocdi/after_content_import_execution', array( $this, 'redux_import' ), 40, 3 );
		add_action( 'pt-ocdi/after_content_import_execution', array( $this, 'sliders_import' ), 50, 3 );
		add_action( 'pt-ocdi/after_content_import_execution', array( $this, 'acf_options_import' ), 30, 3 );

		// Customizer import.
		add_action( 'pt-ocdi/customizer_import_execution', array( $this, 'customizer_import' ), 10, 1 );

		// After full import action.
		add_action( 'pt-ocdi/after_all_import_execution', array( $this, 'after_import_action' ), 10, 3 );
	}


	/**
	 * Execute the widgets import.
	 *
	 * @param array $selected_import_files Actual selected import files (content, widgets, customizer, redux).
	 * @param array $import_files          The filtered import files defined in `pt-ocdi/import_files` filter.
	 * @param int   $selected_index        Selected index of import.
	 */
	public function widgets_import( $selected_import_files, $import_files, $selected_index ) {
		$import_options = ( $_POST['options'] ) ? json_decode( str_replace( '\\"', '"', $_POST['options'] ), true ) : [];
		if ( ! empty( $import_options['widgets'] ) && ! empty( $selected_import_files['widgets'] ) ) {
			WidgetImporter::import( $selected_import_files['widgets'] );
		}
	}


	/**
	 * Execute the options import.
	 *
	 * @param array $selected_import_files Actual selected import files (content, widgets, customizer, redux).
	 * @param array $import_files          The filtered import files defined in `pt-ocdi/import_files` filter.
	 * @param int   $selected_index        Selected index of import.
	 */
	public function acf_options_import( $selected_import_files, $import_files, $selected_index ) {
		global $wpdb;

		$import_options = ( $_POST['options'] ) ? json_decode( str_replace( '\\"', '"', $_POST['options'] ), true ) : [];
		if ( ! empty( $import_options['global_settings'] ) ) {

			$this->update_elementor_options();

			if ( !empty( $selected_import_files['options'] ) ) {
				$options_raw = json_decode(file_get_contents($selected_import_files['options']));
				if (is_array($options_raw) || $options_raw instanceof Countable) return;

				$options_table = $wpdb->prefix . 'options';
				foreach ($options_raw as $field => $value) {
					$exists = $wpdb->get_var( $wpdb->prepare('SELECT COUNT(*) FROM ' . $options_table . ' WHERE option_name = %s', $field ) );
					if ( $exists ) {
						$wpdb->update( $options_table, ['option_value' => $value], ['option_name' => $field], ['%s'] );
					} else {
						$wpdb->insert( $options_table, ['option_value' => $value, 'option_name' => $field, 'autoload' => 'no'], ['%s', '%s', '%s'] );
					}
				}
			}

		}
	}

	public function update_elementor_options() {
		// Default colors and fonts
		update_option( 'elementor_disable_color_schemes', 'yes' );
		update_option( 'elementor_disable_typography_schemes', 'yes' );

		// Update supported types
		update_option( 'elementor_cpt_support', [ 'post', 'page', 'product', 'ohio_portfolio' ] );

		// Update some settings
		$active_kit = get_option( 'elementor_active_kit' );
		if ( empty( $active_kit ) && class_exists( '\Elementor\Plugin' ) ) {
			$active_kit = \Elementor\Plugin::$instance->kits_manager->get_active_id();
		}

		if ( !empty( $active_kit ) ) {
			$settings = get_post_meta( $active_kit, '_elementor_page_settings' );
			if ( empty( $settings ) ) {
				$settings = [];
			}

			$settings['container_width'] = [ 'unti' => 'px', 'size' => '1300' ];
			$settings['space_between_widgets'] = [ 'unti' => 'px', 'size' => '0' ];

			update_post_meta( $active_kit, '_elementor_page_settings', $settings );
		}
	}

	public function sliders_import( $selected_import_files, $import_files, $selected_index ) {
		if ( !empty( $selected_import_files['sliders'] ) ) {
			if ( class_exists( '\RevSliderSlider' ) ) {
				$slider = new \RevSliderSlider();
				$slider->importSliderFromPost( true, true, $selected_import_files['sliders'] );
			}
		}
	}


	/**
	 * Execute the Redux import.
	 *
	 * @param array $selected_import_files Actual selected import files (content, widgets, customizer, redux).
	 * @param array $import_files          The filtered import files defined in `pt-ocdi/import_files` filter.
	 * @param int   $selected_index        Selected index of import.
	 */
	public function redux_import( $selected_import_files, $import_files, $selected_index ) {
		if ( ! empty( $selected_import_files['redux'] ) ) {
			ReduxImporter::import( $selected_import_files['redux'] );
		}
	}


	/**
	 * Execute the customizer import.
	 *
	 * @param array $selected_import_files Actual selected import files (content, widgets, customizer, redux).
	 * @param array $import_files          The filtered import files defined in `pt-ocdi/import_files` filter.
	 * @param int   $selected_index        Selected index of import.
	 */
	public function customizer_import( $selected_import_files ) {
		if ( ! empty( $selected_import_files['customizer'] ) ) {
			CustomizerImporter::import( $selected_import_files['customizer'] );
		}
	}


	/**
	 * Execute the action: 'pt-ocdi/before_content_import'.
	 *
	 * @param array $selected_import_files Actual selected import files (content, widgets, customizer, redux).
	 * @param array $import_files          The filtered import files defined in `pt-ocdi/import_files` filter.
	 * @param int   $selected_index        Selected index of import.
	 */
	public function before_content_import_action( $selected_import_files, $import_files, $selected_index ) {
		$this->do_import_action( 'pt-ocdi/before_content_import', $import_files[ $selected_index ] );
	}


	/**
	 * Execute the action: 'pt-ocdi/before_widgets_import'.
	 *
	 * @param array $selected_import_files Actual selected import files (content, widgets, customizer, redux).
	 * @param array $import_files          The filtered import files defined in `pt-ocdi/import_files` filter.
	 * @param int   $selected_index        Selected index of import.
	 */
	public function before_widget_import_action( $selected_import_files, $import_files, $selected_index ) {
		$this->do_import_action( 'pt-ocdi/before_widgets_import', $import_files[ $selected_index ] );
	}


	/**
	 * Execute the action: 'pt-ocdi/after_import'.
	 *
	 * @param array $selected_import_files Actual selected import files (content, widgets, customizer, redux).
	 * @param array $import_files          The filtered import files defined in `pt-ocdi/import_files` filter.
	 * @param int   $selected_index        Selected index of import.
	 */
	public function after_import_action( $selected_import_files, $import_files, $selected_index ) {
		$this->do_import_action( 'pt-ocdi/after_import', $import_files[ $selected_index ] );
	}


	/**
	 * Register the do_action hook, so users can hook to these during import.
	 *
	 * @param string $action          The action name to be executed.
	 * @param array  $selected_import The data of selected import from `pt-ocdi/import_files` filter.
	 */
	private function do_import_action( $action, $selected_import ) {
		if ( false !== has_action( $action ) ) {
			$ocdi          = OhioImporter::get_instance();
			$log_file_path = $ocdi->get_log_file_path();

			ob_start();
				do_action( $action, $selected_import );
			$message = ob_get_clean();

			// Add this message to log file.
			$log_added = Helpers::append_to_file(
				$message,
				$log_file_path,
				$action
			);
		}
	}
}
