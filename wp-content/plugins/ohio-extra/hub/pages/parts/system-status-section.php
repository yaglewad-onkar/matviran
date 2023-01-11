<h2 class="clb-headline"><?php _e( 'System Status', 'ohio-extra' ); ?></h2>

<!-- Group 2cl -->
<div class="clb-group">
	<div class="clb-group-headline">
		<h3><?php _e( 'Theme Information', 'ohio-extra' ); ?></h3>
	</div>
	<table class="clb-group-content clb-group-table table-col-2">
		<tbody>
			<tr>
				<td><?php _e( 'Theme version', 'ohio-extra' ); ?>:</td>
				<td id="ohio-version-table-value">
					<?php
						$ohio_theme = wp_get_theme( get_template() );
						$ohio_version = $ohio_theme->get( 'Version' ) ? $ohio_theme->get( 'Version' ) : '2.0.0';
						$last_stable = get_option('ohio_last_available_version', '2.0.0');

						if ( version_compare( $ohio_version, $last_stable ) >= 0 ) {
							echo '<mark class="yes">' . $ohio_version . '</mark>';
						} else {
							echo '<mark class="no">' . $ohio_version . '</mark>';
						}
					?>
						<span class="ohio-new-version-available" style="<?php if ( version_compare( $ohio_version, $last_stable ) >= 0 ) { echo 'display:none'; } ?>">
							- <a href="#"><?php _e( 'New version available', 'ohio-extra' ) ?></a>&nbsp;
							<b id="ohio-version-table-placeholder"><?php echo $last_stable; ?></b>
							<a class="tips" target="_blank" href="https://docs.clbthemes.com/ohio/#updating"><i class="dashicons dashicons-info-outline"></i></a>
						</span>
				</td>
			</tr>
			<tr>
				<td><?php _e( 'Theme license', 'ohio-extra' ); ?>:</td>
				<td>
					<?php
						if ( get_option( 'ohio_license_code', false ) ):
							echo '<label class="active"><mark class="yes">Activated</mark></label>';
						else:
							echo '<label class="inactive"><mark class="no">Not activated</mark></label> <a class="tips" target="_blank" href="http://localhost/ohio/wp-admin/admin.php?page=ohio_hub"><i class="dashicons dashicons-info-outline"></i></a>';
						endif;
					?>
				</td>
			</tr>
			<tr>
				<td><?php _e( 'Theme directory', 'ohio-extra' ); ?>:</td>
				<td><?php echo '..' . get_raw_theme_root( get_stylesheet() ) . '/' . get_stylesheet(); ?></td>
			</tr>
			<tr>
				<td><?php _e( 'Child theme', 'ohio-extra' ); ?>:</td>
				<td>
					<mark class="yes"><?php echo ( get_template_directory() === get_stylesheet_directory() ) ? 'Disabled' : 'Enabled'; ?></mark> 
					<a class="tips" target="_blank" href="https://developer.wordpress.org/themes/advanced-topics/child-themes/"><i class="dashicons dashicons-info-outline"></i></a>
				</td>
			</tr>
		</tbody>
	</table>
</div>

<!-- Group 3cl -->
<div class="clb-group">
	<div class="clb-group-headline">
		<h3><?php _e( 'Server Environment', 'ohio-extra' ); ?></h3>
		<a href="https://docs.clbthemes.com/ohio/#requirements" target="_blank" class="btn btn-outline">Requirements</a>
	</div>
	<table class="clb-group-details clb-group-table table-col-3">
		<tbody>
			<tr>
				<td>Directive</td>
				<td>Required value</td>
				<td>Current value</td>
			</tr>
		</tbody>
	</table>
	<table class="clb-group-content clb-group-table table-col-3">
		<tbody>
			<tr>
				<td>PHP version:</td>
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
				<td>PHP time limit <span>(max_execution_time)</span>:</td>
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
				<td>PHP memory limit <span>(memory_limit)</span>:</td>
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
				<td>Max upload size <span>(upload_max_filesize)</span>:</td>
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
				<td>File upload permission <span>(file_uploads)</span>:</td>
				<td>Available</td>
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
		<?php _e( 'Contact your hosting provider and ask them to increase the limits to a minimum of the following.', 'ohio-extra' ); ?>
	</div>
</div>

<!-- Group 2cl -->
<div class="clb-group">
	<div class="clb-group-headline">
		<h3><?php _e( 'Security', 'ohio-extra' ); ?></h3>
	</div>

	<table class="clb-group-content clb-group-table table-col-2">
		<tbody>
			<tr>
				<td>Secure connection <span>(SSL Certificate)</span>:</td>
				<td>
					<?php
						if ( is_ssl() ) {
							echo '<mark class="yes">Secured</mark>';
						} else {
							echo '<mark class="no">Not secured</mark>';
						}
					?>
				</td>
			</tr>
			<tr>
				<td>Hide errors from visitors <span>(WP_DEBUG)</span>:</td>
				<td>
					<?php
						if ( defined('WP_DEBUG') && true === WP_DEBUG ) {
							echo '<mark class="no">Errors are displayed</mark>';
						} else {
							echo '<mark class="yes">Hidden</mark>';
						}
					?>
				</td>
			</tr>
		</tbody>
	</table>
</div>

<!-- Group 2cl -->
<div class="clb-group">
	<div class="clb-group-headline">
		<h3>WordPress Environment</h3>
	</div>

	<table class="clb-group-content clb-group-table table-col-2">
		<tbody>
			<tr>
				<td>WordPress Version:</td>
				<td>
					<?php
						if ( !isset( $wp_verion ) && defined( 'ABSPATH' ) && defined( 'WPINC' ) ) {
							include ABSPATH . WPINC . '/version.php';
						}

						$wp_version_exploded = isset( $wp_version ) ? explode( '.', $wp_version ) : [ '1' ];

						if ( !isset( $wp_version ) ) {
							$wp_version = 'Undefined';
						}

						if ( $wp_version_exploded[0] >= 5 ) {
							echo '<mark class="yes">' . $wp_version . '</mark>';
						} else {
							echo '<mark class="no">' . $wp_version . '</mark>';
						}
					?>
				</td>
			</tr>
			<tr>
				<td>Admin language:</td>
				<td>
					<mark class="yes"><?php echo get_locale(); ?></mark>
				</td>
			</tr>
		</tbody>
	</table>
</div>
