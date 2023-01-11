<?php

/**
 * Intro screen and demo select (step 0).
 */

wp_enqueue_media();

$this->render_header(); 

$count = count( ut_demo_importer_info() ); ?>

<div class="grid-70 prefix-15 medium-grid-100 tablet-grid-100 mobile-grid-100">
                
    <div class="ut-dashboard-hero">
                
        <div class="hide-on-mobile"><?php printf( esc_html__('Please keep in mind. As clearly stated on our %s Images are not included with your purchase! Some demos will have free images but most of them will display image placeholders. You can find a great service for free images here: %s', 'unite-admin'), '<a target="_blank" href="https://themeforest.net/item/brooklyn-responsive-multipurpose-wordpress-theme/6221179#item-description__sources-amp-credits">product page</a>', '<a target="_blank" href="https://unsplash.com/">Unsplash</a>' ); ?></div>
                
    </div>

</div>

<div id="ut-importer-form">

	<?php foreach( ut_demo_importer_info() as $key => $demo ) : ?>

	<div class="grid-33 medium-grid-50 tablet-grid-100 mobile-grid-100">

		<div class="ut-dashboard-widget">

			<h3 class="xml-name"><?php echo $demo['name']; ?></h3>

			<input autocomplete="off" type="radio" id="<?php echo $demo['file']; ?>" name="ut_demo_file" value="<?php echo $demo['file']; ?>" class="ut-choose-demo-radio">
			
			<label class="ut-choose-demo" data-xml="<?php echo $demo['file']; ?>" for="<?php echo $demo['file']; ?>">

				<span class="ut-new-badge"><?php echo $demo['id']; ?></span>			
				
				<div id="ut-selected-overlay-<?php echo $key; ?>" class="ut-selected-overlay">
										
					<div class="ut-dashboard-widget-demo-summary">	
					
						<div class="ut-dashboard-widget-demo-summary-header">
			
							<h3><?php echo $demo['name']; ?></h3>
							
						</div>

						<div class="ut-dashboard-widget-demo-summary-footer">
						
							<form autocomplete="off" class="ut-import-demo-form" method="POST" action="<?php echo esc_attr( $this->get_url( 1 ) ) ?>">
								
								<input type="hidden" name="import_xml_start" value="<?php echo $demo['file']; ?>" />
								<input id="ut-demo-importer-xml-post-id-<?php echo $key; ?>" type="hidden" name="import_id" value="" />
								<?php wp_nonce_field( 'import-upload' ); ?>
								
								<button type="submit" class="ut-ui-button ut-ui-button-health ut-run-importer" disabled><?php _e('Preparing XML' , 'unitedthemes'); ?></button>
								
							</form>
							
							<form action="<?php echo $demo['url']; ?>" target="_blank">
								<button class="ut-ui-button ut-ui-button-demo-preview"><?php _e('Preview Demo' , 'unitedthemes'); ?></button>
							</form>
						
						</div>
						
					</div>
				
				</div>
				
				<img class="lozad" src="<?php echo 'data:image/svg+xml;charset=utf-8,%3Csvg xmlns%3D\'http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg\' viewBox%3D\'0 0 1024 768\'%2F%3E'; ?>" data-src="<?php echo UT_Bucket; ?>demo-importer-v2/<?php echo !empty( $demo['poster'] ) ? $demo['poster'] : $demo['preview'] .'.png'; ?>" />

			</label>

		</div>    

	</div>

	<?php endforeach; ?>

</div>	

<?php $this->render_footer();