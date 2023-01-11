<?php
/**
 * Page for the actual import step.
 */

$args = array(
	'action' => 'wxr-import',
	'id'     => $this->id,
);

$url = add_query_arg( urlencode_deep( $args ), admin_url( 'admin-ajax.php' ) );
$xml = $_REQUEST['import_xml_start'];

// demo config data
$demo_config = ut_demo_importer_info();
// Script Data
$script_data = array(
	'count' => array(
		'posts'     	=> $data->post_count,
		'media'     	=> $data->media_count,
		'comments'  	=> $data->comment_count,
		'terms'     	=> $data->term_count,
		'options'		=> 1,
		'reading'		=> 1,
		'navigation'	=> 1,
		'portfolio'		=> 1,
		'updateurls'	=> 1,
	),
	'url' => $url,
	'demo_file' => $xml,
	'nonce' => wp_create_nonce('ajax-ut-importer-nonce'),
	'strings' => array(
		'complete' => __( 'Import complete!', 'wordpress-importer' ),
	),
);

// Enhance Script Data if Slider is available for this Demo
if( class_exists('RevSlider') && !empty( $demo_config[$xml]['sliderev'] ) ) {
	$script_data['count']['sliderev'] = count( $demo_config[$xml]['sliderev'] );
}

wp_enqueue_script( 
	'wxr-importer-import', 
	THEME_WEB_ROOT . '/unite/core/admin/option-tree/includes/plugins/importer-reloaded/assets/import.js',
	array( 'jquery' ), 
	'20160909', 
	true
);

wp_localize_script( 
	'wxr-importer-import',
	'wxrImportData',
	$script_data 
);

$this->render_header(); ?>

<div id="ut-demo-import-status-interface">

	<div class="grid-100 medium-grid-100 tablet-grid-100 mobile-grid-100">

		<div class="ut-dashboard-widget">

			<div class="ut-widget-hero">

				<h3><?php esc_html_e( 'Total Progress','unitedthemes' ); ?></h3>

			</div>	
			
			<div id="progress-total" class="bkly-progress-circle" data-circle-percent="0%">
			
				<svg id="progresscircle-total" class="bkly-progress-svg bkly-progress-svg-large">
					<circle class="circle" r="160" cx="180" cy="180" fill="transparent" stroke-dasharray="1004.8" stroke-dashoffset="0"></circle>
					<circle class="stroke" r="160" cx="180" cy="180" fill="transparent" stroke-dasharray="1004.8" stroke-dashoffset="0"></circle>
				</svg>		

			</div>
			
			<div class="ut-checklist-container ut-checklist-container">
				
				<div class="ut-checklist-items">
					
					<input id="cb-theme-options" type="checkbox" />
					<label for="cb-theme-options"><?php esc_html_e( 'Import Theme Options','unitedthemes' ); ?></label>
					
					<input id="cb-navigation-locations" type="checkbox" />
					<label for="cb-navigation-locations"><?php esc_html_e( 'Set Navigation Locations','unitedthemes' ); ?></label>
					
					<input id="cb-reading-settings" type="checkbox" />
					<label for="cb-reading-settings"><?php esc_html_e( 'Adjust Reading Settings','unitedthemes' ); ?></label>
					
					<input id="cb-portfolio-categories" type="checkbox" />
					<label for="cb-portfolio-categories"><?php esc_html_e( 'Polish Portfolio Showcases','unitedthemes' ); ?></label>
					
					<?php if( class_exists('RevSlider') && !empty( $demo_config[$xml]['sliderev'] ) ) : ?>
						
					<input id="cb-revslider" type="checkbox" />
					<label for="cb-revslider"><?php esc_html_e( 'Import Slider Revolution','unitedthemes' ); ?></label>
					
					<?php endif; ?>
					
					<input id="cb-update-urls" type="checkbox" />
					<label for="cb-update-urls"><?php esc_html_e( 'Update Site URLs','unitedthemes' ); ?></label>
					
					<h2 class="ut-checklist-done" aria-hidden="true"><?php esc_html_e( 'Done','unitedthemes' ); ?></h2>
					<h2 class="ut-checklist-undone" aria-hidden="true"><?php esc_html_e( 'Not Done','unitedthemes' ); ?></h2>
					
				</div>
				
			</div>

		</div>

	</div>

	<div class="grid-parent grid-100 medium-grid-100 tablet-grid-100 mobile-grid-100">

		<div class="grid-25 medium-grid-50 tablet-grid-100 mobile-grid-100">

			<div class="ut-dashboard-widget">

				<div class="ut-widget-hero">
					<h3><?php esc_html_e( 'Posts Pages and Menus','unitedthemes' ); ?></h3>
					<span id="completed-posts" class="completed ut-widget-counter down animated infinite">0/0</span>
				</div>
				
				<div id="progress-posts" class="bkly-progress-circle" data-circle-percent="0%">
				
					<svg id="progresscircle-posts" class="bkly-progress-svg">
						<circle class="circle" r="80" cx="90" cy="90" fill="transparent" stroke-dasharray="502.4" stroke-dashoffset="0"></circle>
						<circle class="stroke" r="80" cx="90" cy="90" fill="transparent" stroke-dasharray="502.4" stroke-dashoffset="0"></circle>
					</svg>

				</div>

			</div>	

		</div>

		<div class="grid-25 medium-grid-50 tablet-grid-100 mobile-grid-100">

			<div class="ut-dashboard-widget">

				<div class="ut-widget-hero">
					<h3><?php esc_html_e( 'Media Items','unitedthemes' ); ?></h3>
					<span id="completed-media" class="completed ut-widget-counter down animated infinite">0/0</span>
				</div>	

				<div id="progress-media" class="bkly-progress-circle" data-circle-percent="0%">
				
					<svg id="progresscircle-media" class="bkly-progress-svg">
						<circle class="circle" r="80" cx="90" cy="90" fill="transparent" stroke-dasharray="502.4" stroke-dashoffset="0"></circle>
						<circle class="stroke" r="80" cx="90" cy="90" fill="transparent" stroke-dasharray="502.4" stroke-dashoffset="0"></circle>
					</svg>

				</div>

			</div>	

		</div>
		
		<div class="clear hide-on-desktop"></div>
		
		<div class="grid-25 medium-grid-50 tablet-grid-100 mobile-grid-100">

			<div class="ut-dashboard-widget">

				<div class="ut-widget-hero">
					<h3><?php esc_html_e( 'Comments','unitedthemes' ); ?></h3>
					<span id="completed-comments" class="completed ut-widget-counter down animated infinite">0/0</span>
				</div>	
				
				<div id="progress-comments" class="bkly-progress-circle" data-circle-percent="0%">
				
					<svg id="progresscircle-comments" class="bkly-progress-svg">
						<circle class="circle" r="80" cx="90" cy="90" fill="transparent" stroke-dasharray="502.4" stroke-dashoffset="0"></circle>
						<circle class="stroke" r="80" cx="90" cy="90" fill="transparent" stroke-dasharray="502.4" stroke-dashoffset="0"></circle>
					</svg>

				</div>

			</div>	

		</div>

		<div class="grid-25 medium-grid-50 tablet-grid-100 mobile-grid-100">

			<div class="ut-dashboard-widget">

				<div class="ut-widget-hero">
					<h3><?php esc_html_e( 'Terms','unitedthemes' ); ?></h3>
					<span id="completed-terms" class="completed ut-widget-counter down animated infinite">0/0</span>
				</div>	
				
				<div id="progress-terms" class="bkly-progress-circle" data-circle-percent="0%">
				
					<svg id="progresscircle-terms" class="bkly-progress-svg">
						<circle class="circle" r="80" cx="90" cy="90" fill="transparent" stroke-dasharray="502.4" stroke-dashoffset="0"></circle>
						<circle class="stroke" r="80" cx="90" cy="90" fill="transparent" stroke-dasharray="502.4" stroke-dashoffset="0"></circle>
					</svg>

				</div>

			</div>	

		</div>	

	</div>

</div>

<?php if( defined("IMPORT_DEBUG") && IMPORT_DEBUG ) : ?>

	<div class="grid-100">

		<table id="import-log" class="widefat">

			<thead>
				<tr>
					<th><?php esc_html_e( 'Type', 'wordpress-importer' ) ?></th>
					<th><?php esc_html_e( 'Message', 'wordpress-importer' ) ?></th>
				</tr>
			</thead>

			<tbody>

			</tbody>
		</table>

	</div>	
		
<?php endif; ?>

<?php

$this->render_footer();
