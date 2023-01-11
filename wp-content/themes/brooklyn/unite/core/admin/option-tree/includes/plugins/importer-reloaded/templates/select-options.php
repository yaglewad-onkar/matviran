<?php

$ut_demo_importer_info = ut_demo_importer_info();

ob_start();

?>

<div class="grid-100">

	<div class="ut-dashboard-widget ut-dashboard-widget-demo-summary">	
		
		<div class="ut-dashboard-widget-demo-summary-header">
			
			<h3><?php echo $ut_demo_importer_info[$this->xml_id]['name'] ?></h3>
			<span><?php esc_html_e( 'Some Facts about this Demo', 'unitedthemes' ); ?></span>
		
		</div>
		
		<div class="ut-dashboard-widget-demo-summary-content">
			
			<div class="ut-demo-importer-summary-box">
				
				<span class="ut-demo-importer-summary-count"><?php echo $data->post_count; ?></span>
				<?php esc_html_e( 'Posts and Pages', 'unitedthemes' ); ?>
				
			</div>

			<div  class="ut-demo-importer-summary-box">
				
				<span class="ut-demo-importer-summary-count"><?php echo $data->media_count; ?></span>
				<?php esc_html_e( 'Media Files', 'unitedthemes' ); ?>
				
			</div>

			<div class="ut-demo-importer-summary-box">
				
				<span class="ut-demo-importer-summary-count"><?php echo $data->comment_count; ?></span>
				<?php esc_html_e( 'Comments', 'unitedthemes' ); ?>
				
			</div>

			<div class="ut-demo-importer-summary-box">
				
				<span class="ut-demo-importer-summary-count"><?php echo $data->term_count; ?></span>
				<?php esc_html_e( 'Terms', 'unitedthemes' ); ?>
				
			</div>
		
		</div>
		
		<form action="<?php echo esc_url( $this->get_url( 2 ) ) ?>" method="post">

			<input type="hidden" name="import_id" value="<?php echo esc_attr( $this->id ) ?>" />
			<?php wp_nonce_field( sprintf( 'wxr.import:%d', $this->id ) ) ?>
			<button class="ut-ui-button ut-ui-button-health" title="Cancel">Cancel</button>
			<input name="submit" id="submit" class="ut-ui-button ut-ui-button-blue" value="Start Importing" type="submit">
			
		</form>

	</div>	
	
	<div class="ut-dashboard-widget ut-dashboard-widget-demo-summary">
		
		<img src="<?php echo THEME_WEB_ROOT; ?>/admin/assets/images/importer/<?php echo $ut_demo_importer_info[$this->xml_id]['preview']; ?>.jpg" />
	
	</div>
	

</div>	
	
<?php

return ob_get_clean();