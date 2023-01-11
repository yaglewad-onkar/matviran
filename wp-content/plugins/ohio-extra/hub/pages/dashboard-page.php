<div class="wp-header-end"></div><!-- WP notices here -->

<div class="clb-hub clb-page">
	<div class="clb-hub-intro">
		<div class="clb-hub-container clb-page-container">
			<div class="details">
				<i class="details-icon"></i>
				<h1><?php _e( 'Dashboard', 'ohio-extra' ); ?></h1>
			</div>
			<div class="mode-switcher">
				<a href="admin.php?page=ohio_hub" class="btn"><?php _e( 'Dashboard', 'ohio-extra' ); ?></a>
				<a href="admin.php?page=ohio_hub_settings" class="btn btn-outline"><?php _e( 'Theme Settings', 'ohio-extra' ); ?></a>
			</div>
		</div>
	</div>
	<div class="clb-hub-container clb-page-container">
		<div id="tabs" class="clb-nav">
			<a class="docs" target="_blank" href="https://docs.clbthemes.com/ohio/"><i class="dashicons dashicons-info-outline"></i> <?php _e( 'Docs', 'ohio-extra' ); ?></a>
			<ul class="clb-block-layout clb-nav-inner">
				<li><a href="#tabs-1" class="selected"><?php _e( 'Registration', 'ohio-extra' ); ?></a></li>
				<li><a href="#tabs-2"><?php _e( 'System Status', 'ohio-extra' ); ?></a></li>
				<li><a href="#tabs-3"><?php _e( 'What’s New', 'ohio-extra' ); ?></a></li>
				<li><a href="#tabs-4"><?php _e( 'Help', 'ohio-extra' ); ?></a></li>
				<li><a href="#tabs-5"><?php _e( 'FAQs', 'ohio-extra' ); ?></a></li>
			</ul>

			<!-- Registration container -->
			<div class="tab-item" id="tabs-1">
				<?php include 'parts/theme-license-section.php'; ?>
			</div>

			<!-- System status container -->
			<div class="tab-item" id="tabs-2" style="display: none;">
				<?php include 'parts/system-status-section.php'; ?>
			</div>

			<!-- What’s new container -->
			<div class="tab-item" id="tabs-3" style="display: none;">
				<?php include 'parts/whats-new-section.php'; ?>
			</div>

			<!-- Help container -->
			<div class="tab-item" id="tabs-4" style="display: none;">
				<?php include 'parts/help-section.php'; ?>
			</div>

			<!-- Help container -->
			<div class="tab-item" id="tabs-5" style="display: none;">
				<?php include 'parts/faq-section.php'; ?>
			</div>
		</div>
	</div>

	<!-- Footer -->
	<div class="clb-page-footer">
		<div class="clb-page-container">
			<div class="copyright">
				Copyright © <?php echo date("Y"); ?>, Ohio Version <?php
						$ohio_theme = wp_get_theme( get_template() );
						$ohio_version = $ohio_theme->get( 'Version' ) ? $ohio_theme->get( 'Version' ) : '2.0.0';
						echo $ohio_version;
					?> by <a target="_blank" href="https://themeforest.net/user/colabrio">Colabrio</a>.
			</div>
			<div class="social-networks">
				<a target="_blank" href="https://docs.clbthemes.com/ohio/">Documentation</a>&nbsp;|&nbsp;<a target="_blank" href="https://colabrio.ticksy.com/">Help Center</a>&nbsp;|&nbsp;Follow Us -&nbsp;<a target="_blank" href="https://www.facebook.com/"><span class="dashicons dashicons-facebook"></span> Facebook</a>
			</div>	
		</div>
	</div>
</div>