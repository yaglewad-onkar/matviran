<?php
/**
 * The plugin page view - the "settings" page of the plugin.
 *
 * @package ocdi
 */

namespace OCDI;

?>

<div class="clb-hub clb-importer clb-page">
	<div class="clb-hub-intro">
		<div class="clb-hub-container clb-page-container">
			<div class="details">
				<i class="details-icon"></i>
				<h1><?php _e( 'Demo Importer', 'ohio-importer' ); ?></h1>
			</div>
			<div class="mode-switcher">
				<a href="admin.php?page=ohio_hub" class="btn btn-outline"><?php _e( 'Dashboard', 'ohio-importer' ); ?></a>
				<a href="admin.php?page=ohio_hub_settings" class="btn btn-outline"><?php _e( 'Theme Settings', 'ohio-importer' ); ?></a>
			</div>
		</div>
	</div>

	<div class="clb-hub-container clb-page-container">
		<div id="tabs" class="clb-nav">
			<ul class="clb-block-layout clb-nav-inner">
				<li><a href="#tabs-1" class="selected"><?php _e( 'Demo Import', 'ohio-importer' ); ?></a></li>
				<li><a href="#tabs-2"><?php _e( 'System Status', 'ohio-importer' ); ?></a></li>
			</ul>

			<!-- Demo intro container -->
			<div class="tab-item" id="tabs-1">

				<h2 class="clb-headline"><?php _e( 'Getting Started', 'ohio-importer' ); ?></h2>

				<div class="clb-group-sidebar-layout">
					<div class="col">
						<!-- Group 3cl -->
						<div class="clb-group clb-group">
							<div class="clb-group-headline">
								<h3><?php _e( 'About', 'ohio-importer' ); ?></h3>
								<a href="https://docs.clbthemes.com/ohio/getting-started/#setting_up" target="_blank" class="btn btn-outline"><?php _e( 'View Docs', 'ohio-importer' ); ?></a>
							</div>
							<div class="clb-group-details">
								<?php _e( 'When you import the demo data, the following things will happen:', 'ohio-importer' ); ?>
							</div>
							<div class="clb-group-content">
								<?php esc_html_e( 'Demo content with posts, custom post types, pages, categories, tags, media files, local page settings and', 'ohio-importer' ); ?>&nbsp;<a target="_blank" href="./admin.php?page=ohio_hub_settings"><?php esc_html_e( 'Theme Settings', 'ohio-importer' ); ?></a>&nbsp;<?php esc_html_e( 'will get imported.', 'ohio-importer' ); ?> (<b><?php esc_html_e( 'No existing data (e.g. posts, pages, categories, tags, media files etc.) will be replaced or modified.', 'ohio-importer' ); ?></b>)
							</div>
						</div>
					</div>
					<div class="col">
						<!-- Group 3cl -->
						<div class="clb-group clb-group-warning">
							<div class="clb-group-headline">
								<h3><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 5.177l8.631 15.823h-17.262l8.631-15.823zm0-4.177l-12 22h24l-12-22zm-1 9h2v6h-2v-6zm1 9.75c-.689 0-1.25-.56-1.25-1.25s.561-1.25 1.25-1.25 1.25.56 1.25 1.25-.561 1.25-1.25 1.25z"/></svg> <?php _e( 'Heads up!', 'ohio-importer' ); ?></h3>
							</div>
							<div class="clb-group-details">
								<a target="_blank" href="./admin.php?page=ohio_hub_settings"><?php esc_html_e( 'Theme Settings', 'ohio-importer' ); ?></a> <?php esc_html_e( 'are overrides with each import.', 'ohio-importer' ); ?>
							</div>
							<div class="clb-group-content">
								<?php esc_html_e( 'Uncheck the', 'ohio-importer' ); ?>&nbsp;<b><?php esc_html_e( 'Install global settings', 'ohio-importer' ); ?></b>&nbsp;<?php esc_html_e( 'checkbox in the popup dialog to import a new demo without', 'ohio-importer' ); ?>&nbsp;<a target="_blank" href="./admin.php?page=ohio_hub_settings"><?php esc_html_e( 'Theme Settings', 'ohio-importer' ); ?></a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- System status container -->
			<div class="tab-item" id="tabs-2" style="display: none;">
				<h2 class="clb-headline"><?php _e( 'System Status', 'ohio-importer' ); ?></h2>

				<!-- Group 3cl -->
				<div class="clb-group">
					<div class="clb-group-headline">
						<h3><?php _e( 'Server Environment', 'ohio-importer' ); ?></h3>
						<a href="https://docs.clbthemes.com/ohio/#requirements" target="_blank" class="btn btn-outline"><?php _e( 'Requirements', 'ohio-importer' ); ?></a>
					</div>
					<table class="clb-group-details clb-group-table table-col-3">
						<tbody>
							<tr>
								<td><?php _e( 'Directive', 'ohio-importer' ); ?></td>
								<td><?php _e( 'Required value', 'ohio-importer' ); ?></td>
								<td><?php _e( 'Current value', 'ohio-importer' ); ?></td>
							</tr>
						</tbody>
					</table>
					<table class="clb-group-content clb-group-table table-col-3">
						<tbody>
							<tr>
								<td><?php _e( 'PHP version', 'ohio-importer' ); ?>:</td>
								<td>7.0.0</td>
								<td>
									<?php
										if ( explode( ',', phpversion() )[0] >= 7 ) {
											echo '<mark class="yes">' . phpversion() . '</mark>';
										} else {
											echo '<mark class="no">' . phpversion() . '</mark>';
										}
									?>
								</td>
							</tr>
							<tr>
								<td><?php _e( 'PHP time limit', 'ohio-importer' ); ?> <span>(max_execution_time)</span>:</td>
								<td>120</td>
								<td>
									<?php
										if ( ini_get( 'max_execution_time' ) >= 120 ) {
											echo '<mark class="yes">' . ini_get( 'max_execution_time' ) . '</mark>';
										} else {
											echo '<mark class="no">' . ini_get( 'max_execution_time' ) . '</mark>';
										}
									?>
								</td>
							</tr>
							<tr>
								<td><?php _e( 'PHP memory limit', 'ohio-importer' ); ?> <span>(memory_limit)</span>:</td>
								<td>256M</td>
								<td>
									<?php
										if ( intval( ini_get( 'memory_limit' ) ) >= 256 ) {
											echo '<mark class="yes">' . ini_get( 'memory_limit' ) . '</mark>';
										} else {
											echo '<mark class="no">' . ini_get( 'memory_limit' ) . '</mark>';
										}
									?>
								</td>
							</tr>
							<tr>
								<td><?php _e( 'Max upload size', 'ohio-importer' ); ?> <span>(upload_max_filesize)</span>:</td>
								<td>16M</td>
								<td>
									<?php
										if ( intval( ini_get( 'upload_max_filesize' ) ) >= 16 ) {
											echo '<mark class="yes">' . ini_get( 'upload_max_filesize' ) . '</mark>';
										} else {
											echo '<mark class="no">' . ini_get( 'upload_max_filesize' ) . '</mark>';
										}
									?>
								</td>
							</tr>
							<tr>
								<td><?php _e( 'File upload permission', 'ohio-importer' ); ?> <span><?php _e( '(file_uploads)', 'ohio-importer' ); ?></span>:</td>
								<td><?php _e( 'Available', 'ohio-importer' ); ?></td>
								<td>
									<?php
										$file_uploads = is_numeric(ini_get('file_uploads')) ? (ini_get('file_uploads') ? 'On' : 'Off') : ini_get('file_uploads');
										if ( $file_uploads == 'On' ) {
											echo '<mark class="yes">Available</mark>';
										} else {
											echo '<mark class="no">Off</mark>';
										}
									?>
								</td>
							</tr>
						</tbody>
					</table>
					<div class="clb-group-footer">
						<?php _e( 'Contact your hosting provider and ask them to increase the limits to a minimum of the following.', 'ohio-importer' ); ?>
					</div>
				</div>
			</div>
		</div>

		<div class="clb-demo-holder">

			<?php
			// Display warrning if PHP safe mode is enabled, since we wont be able to change the max_execution_time.
			if ( ini_get( 'safe_mode' ) ) {
				printf(
					esc_html__( '%sWarning: your server is using %sPHP safe mode%s. This means that you might experience server timeout errors.%s', 'ohio-importer' ),
					'<div class="notice  notice-warning  is-dismissible"><p>',
					'<strong>',
					'</strong>',
					'</p></div>'
				);
			}

			// Start output buffer for displaying the plugin intro text.
			ob_start();
			?>

			<?php
			$plugin_intro_text = ob_get_clean();

			// Display the plugin intro text (can be replaced with custom text through the filter below).
			echo wp_kses_post( apply_filters( 'pt-ocdi/plugin_intro_text', $plugin_intro_text ) );
			?>


			<?php if ( empty( $this->import_files ) ) : ?>

				<div class="notice  notice-info  is-dismissible">
					<p><?php esc_html_e( 'There are no predefined import files available in this theme. Please upload the import files manually!', 'ohio-importer' ); ?></p>
				</div>

				<div class="ocdi__file-upload-container">
					<h2><?php esc_html_e( 'Manual demo files upload', 'ohio-importer' ); ?></h2>

					<div class="ocdi__file-upload">
						<h3><label for="content-file-upload"><?php esc_html_e( 'Choose a XML file for content import:', 'ohio-importer' ); ?></label></h3>
						<input id="ocdi__content-file-upload" type="file" name="content-file-upload">
					</div>

					<div class="ocdi__file-upload">
						<h3><label for="widget-file-upload"><?php esc_html_e( 'Choose a WIE or JSON file for widget import:', 'ohio-importer' ); ?></label> <span><?php esc_html_e( '(*optional)', 'ohio-importer' ); ?></span></h3>
						<input id="ocdi__widget-file-upload" type="file" name="widget-file-upload">
					</div>

					<div class="ocdi__file-upload">
						<h3><label for="customizer-file-upload"><?php esc_html_e( 'Choose a DAT file for customizer import:', 'ohio-importer' ); ?></label> <span><?php esc_html_e( '(*optional)', 'ohio-importer' ); ?></span></h3>
						<input id="ocdi__customizer-file-upload" type="file" name="customizer-file-upload">
					</div>

					<?php if ( class_exists( 'ReduxFramework' ) ) : ?>
					<div class="ocdi__file-upload">
						<h3><label for="redux-file-upload"><?php esc_html_e( 'Choose a JSON file for Redux import:', 'ohio-importer' ); ?></label> <span><?php esc_html_e( '(*optional)', 'ohio-importer' ); ?></span></h3>
						<input id="ocdi__redux-file-upload" type="file" name="redux-file-upload">
						<div>
							<label for="redux-option-name" class="ocdi__redux-option-name-label"><?php esc_html_e( 'Enter the Redux option name:', 'ohio-importer' ); ?></label>
							<input id="ocdi__redux-option-name" type="text" name="redux-option-name">
						</div>
					</div>
					<?php endif; ?>
				</div>

				<p class="ocdi__button-container">
					<button class="ocdi__button  button  button-hero  button-primary js-ocdi-import-data"><?php esc_html_e( 'Import Demo Data', 'ohio-importer' ); ?></button>
				</p>

			<?php elseif ( 1 === count( $this->import_files ) ) : ?>

				<div class="ocdi__demo-import-notice js-ocdi-demo-import-notice"><?php
					if ( is_array( $this->import_files ) && ! empty( $this->import_files[0]['import_notice'] ) ) {
						echo wp_kses_post( $this->import_files[0]['import_notice'] );
					}
				?></div>

				<p class="ocdi__button-container">
					<button class="ocdi__button  button  button-hero  button-primary js-ocdi-import-data"><?php esc_html_e( 'Import Demo Data', 'ohio-importer' ); ?></button>
				</p>

			<?php else : ?>

				<h2 class="clb-headline js-headline-templates"><?php _e( 'Templates', 'ohio-importer' ); ?></h2>

				<div class="ocdi__gl js-ocdi-gl">
				<?php
					// Prepare navigation data.
					$categories = Helpers::get_all_demo_import_categories( $this->import_files );
				?>
					<?php if ( ! empty( $categories ) ) : ?>

						<div class="clb-nav ocdi__gl-header js-ocdi-gl-header">
							<ul class="clb-block-layout clb-nav-inner ocdi__gl-navigation">
								<li class="selected active"><a href="#all" class="ocdi__gl-navigation-link js-ocdi-nav-link"><?php esc_html_e( 'All', 'ohio-importer' ); ?></a></li>
								<?php foreach ( $categories as $key => $name ) : ?>
									<li><a href="#<?php echo esc_attr( $key ); ?>" class="ocdi__gl-navigation-link js-ocdi-nav-link"><?php echo esc_html( $name ); ?></a></li>
								<?php endforeach; ?>
							</ul>
							<div clas="clb-nav-search">
								<input type="search" class="ocdi__gl-search-input js-ocdi-gl-search" name="ocdi-gl-search" value="" placeholder="<?php esc_html_e( 'Search demos...', 'ohio-importer' ); ?>">
							</div>
						</div>

					<?php endif; ?>

					<div class="clb-group-demo ocdi__gl-item-container wp-clearfix js-ocdi-gl-item-container">

						<?php foreach ( $this->import_files as $index => $import_file ) : ?>
							<?php
								// Prepare import item display data.
								$img_src = isset( $import_file['import_preview_image_url'] ) ? $import_file['import_preview_image_url'] : '';
								// Default to the theme screenshot, if a custom preview image is not defined.
								if ( empty( $img_src ) ) {
									$theme = wp_get_theme();
									$img_src = $theme->get_screenshot();
								}
							?>
							<div class="clb-group-demo-item ocdi__gl-item js-ocdi-gl-item ocdi-card" data-categories="<?php echo esc_attr( Helpers::get_demo_import_item_categories( $import_file ) ); ?>" data-name="<?php echo esc_attr( strtolower( $import_file['import_file_name'] ) ); ?>">
								<div class="ocdi__gl-item-image-container">
									<?php if ( ! empty( $img_src ) ) : ?>
										<img class="ocdi__gl-item-image" src="<?php echo esc_url( $img_src ) ?>">
									<?php else : ?>
										<div class="ocdi__gl-item-image  ocdi__gl-item-image--no-image"><?php esc_html_e( 'No preview image.', 'ohio-importer' ); ?></div>
									<?php endif; ?>
								</div>
								<div class="clb-group-demo-item-footer ocdi__gl-item-footer">
									<h4 class="ocdi__gl-item-title"><?php echo $import_file['import_file_name']; ?></h4>

									<?php
										switch ( $import_file['import_file_name'] ) {
											case __( 'Portfolio Projects', 'ohio-importer' ):
												$local_preview = 'edit.php?post_type=ohio_portfolio';
												break;
											case __( 'All Pages', 'ohio-importer' ):
												$local_preview = 'edit.php?post_type=page';
												break;
											case __( 'Products', 'ohio-importer' ):
												$local_preview = 'edit.php?post_type=product';
												break;
											case __( 'Forms - Contact Form 7', 'ohio-importer' ):
												$local_preview = 'admin.php?page=wpcf7';
												break;
											default:
												$local_preview = 'edit.php?post_type=page';
												break;
										}
									?>
									<a
										href="<?php echo esc_url( $local_preview ); ?>"
										class="ocdi__gl-item-button btn btn-outline ocdi__local_link"
										target="_blank" style="margin-left:auto; margin-right:8px; display:none;">Preview</a>

									<?php if ( !empty( $import_file['preview_url'] ) ) : ?>
										<a
											href="<?php echo esc_url( $import_file['preview_url'] ); ?>"
											class="ocdi__gl-item-button btn btn-outline"
											target="_blank" style="margin-left:auto; margin-right:8px;">Preview</a>
									<?php endif; ?>

									<?php
										if ( !empty( $import_file['import_elementor_file_url'] ) ) {
											$_import_type = 'both';
										} else {
											$_import_type = 'wpbakery';
										}
									?>
									<button
										class="ocdi__gl-item-button btn js-ocdi-gl-import-data" 
										value="<?php echo esc_attr( $index ); ?>"
										data-import-type="<?php echo $_import_type; ?>">
										<?php esc_html_e( 'Import', 'ohio-importer' ); ?>
									</button>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>

				<div id="js-ocdi-modal-content"></div>

			<?php endif; ?>

			<div class="ocdi__ajax-loader js-ocdi-ajax-loader">
				<div class="progress-line"></div>
				<h3><?php esc_html_e( 'Downloading the demo content', 'ohio-importer' ); ?></h3>
				<?php esc_html_e( 'This process may take a while on some hosts, so please be patient.', 'ohio-importer' ); ?>
			</div>

			<div class="ocdi__response js-ocdi-ajax-response"></div>

		</div>
	</div>

	<!-- Footer -->
	<div class="clb-page-footer">
		<div class="clb-page-container">
			<div class="copyright">
				Copyright © <?php echo date("Y"); ?>, Ohio Version <?php
						$ohio_theme = wp_get_theme();
						echo $ohio_theme->get( 'Version' ) ? $ohio_theme->get( 'Version' ) : '2.0.0';
					?> by <a target="_blank" href="https://themeforest.net/user/colabrio">Colabrio</a>.
			</div>
			<div class="social-networks">
				<a target="_blank" href="https://docs.clbthemes.com/ohio/">Documentation</a>&nbsp;|&nbsp;<a target="_blank" href="https://colabrio.ticksy.com/">Help Center</a>&nbsp;|&nbsp;Follow Us -&nbsp;<a target="_blank" href="https://www.facebook.com/"><span class="dashicons dashicons-facebook"></span> Facebook</a>
			</div>
		</div>
	</div>
</div>

<?php if ( is_admin() ): ?>
<script>
	window.has_license_code = '<?php echo !empty( get_option( 'ohio_license_code', '' ) ) ? 'yep' : ''; ?>';
</script>
<?php endif; ?>