<?php

/**
* WPBakery Page Builder Ohio Google Maps shortcode view
*/

?>
<div class="ohio-google-maps-sc google-maps" id="<?php echo esc_attr( $google_maps_uniqid ); ?>" 
data-google-map="true" data-google-map-zoom="<?php echo esc_attr( $map_zoom ); ?>"
<?php if($map_zoom_enable) { ?> data-google-map-zoom-enable="true" <?php } ?>
<?php if($map_street_enable) { ?> data-google-map-steet-enable="true" <?php } ?>
<?php if($map_type_enable) { ?> data-google-map-type-enable="true" <?php } ?>
<?php if($map_fullscreen_enable) { ?> data-google-map-fullscreen-enable="true" <?php } ?>
data-google-map-marker="<?php echo esc_attr( $map_marker ); ?>"
data-google-map-style="<?php echo esc_attr( $map_style ); ?>">	
	<?php if ($ohio_api_key == '') : ?>
		<div class="clb-blank-note">
			<i class="ion ion-md-information-circle-outline"></i>
				<div class="clb-blank-note-inner">
				<?php echo esc_html('Please', 'ohio-extra' ); ?> <a class="active" target="_blank" href="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=theme-general-other"><?php echo esc_html('enter'); ?></a> <?php echo esc_html('your API key to enable Google Maps.', 'ohio-extra' ); ?></a><br>
				<a target="_blank" href="https://docs.clbthemes.com/ohio/tips-tricks/#googlemaps"><b><?php echo esc_html('Read Docs', 'ohio-extra' ); ?></b></a>
			</div>
		</div>
	<?php endif; ?>
	<div class="google-maps-wrap"></div>
	<div class="hidden" data-google-map-markers="true"><?php echo esc_attr( $marker_locations ); ?></div>
</div>