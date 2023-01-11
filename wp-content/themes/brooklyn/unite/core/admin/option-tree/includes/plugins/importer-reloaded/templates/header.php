<?php

/**
 * Importer header. Fun times.
 */

require_once( ABSPATH . 'wp-admin/admin-header.php' ); 

// current user
$user_id      = get_current_user_id();
$current_user = wp_get_current_user();

?>

<div id="ut-admin-wrap" class="clearfix">

	<?php do_action( 'wxr_importer.ui.header' ) ?>
	
	<div id="ut-ui-admin-header" class="row-noBottom-noGutter">
        
		<div class="grid-10 medium-grid-15 tablet-grid-20 hide-on-mobile grid-parent">

			<div class="ut-admin-branding">
				<a href="https://www.unitedthemes.com" target="_blank"><img src="<?php echo THEME_WEB_ROOT; ?>/unite-custom/admin/assets/img/icons/bklyn-logo-white.svg" alt="United Themes"><span class="version-number">Version <?php echo UT_THEME_VERSION; ?></span></a>
			</div>

		</div>

		<div class="grid-90 medium-grid-85 tablet-grid-80 mobile-grid-100 grid-parent">

			<div class="ut-admin-header-title">

				<h1>
					<?php esc_html_e('Website Installer.', 'unite-admin'); ?>					
				</h1>
				
			</div>

		</div>

	</div>
	
	<div id="ut-ui-admin-app">
	
		<div class="ut-dashboard-nav-bg grid-10 medium-grid-15 hide-on-tablet hide-on-mobile grid-parent">

			 <ul class="ut-dashboard-nav">
				<li>
					<div class="ut-dashboard-avatar">
						<?php echo get_avatar( $user_id, 160 ); ?>
					</div>

					<span class="ut-hello-admin">
						<?php echo sprintf( __('Howdy, %1$s' , 'unitedthemes'), $current_user->display_name ); ?>
					</span>                                            
				</li>

				<li>
					<a href="<?php echo get_admin_url(); ?>admin.php?page=unite-welcome-page">
						<div class="ut-dashboard-home">
							<img alt="Dashboard" src="<?php echo THEME_WEB_ROOT; ?>/unite/core/admin/assets/img/dashboard.png">
						</div>
						<span>Dashboard</span></a>
				</li>

				<li>
					<a href="<?php echo get_admin_url(); ?>admin.php?page=unite-theme-info">
						<div class="ut-dashboard-server-health">
							<img alt="Server Health" src="<?php echo THEME_WEB_ROOT; ?>/unite/core/admin/assets/img/server-health.png">
						</div>
						<span>Server Health</span></a>
				</li>

				<li>
					<a href="<?php echo get_admin_url(); ?>admin.php?page=<?php echo apply_filters( 'ut_theme_options_page', 'unite-theme-options' ); ?>">
						<div class="ut-dashboard-theme-option">
							<img alt="Theme Options" src="<?php echo THEME_WEB_ROOT; ?>/unite/core/admin/assets/img/theme-options.png">
						</div>
						<span>Theme Options</span></a>
				</li>

				<li>
					<a href="<?php echo get_admin_url(); ?>admin.php?page=unite-video-tutorials">
						<div class="ut-dashboard-video-tutorials">
							<img alt="Video Tutorials" src="<?php echo THEME_WEB_ROOT; ?>/unite/core/admin/assets/img/video-tutorials.png">
						</div>
						<span>Video Tutorials</span></a>
				</li>

				<li>
					<a target="_blank" href="http://helpdesk.unitedthemes.com/">
						<div class="ut-theme-support">
							<img alt="Theme Support" src="<?php echo THEME_WEB_ROOT; ?>/unite/core/admin/assets/img/theme-support.png">
						</div>
						<span>Theme Support</span></a>
				</li>

		   </ul>

		</div>

		<div class="ut-option-holder grid-90 medium-grid-85 tablet-grid-100 mobile-grid-100">

			<div id="ut-dashboard-content">
		