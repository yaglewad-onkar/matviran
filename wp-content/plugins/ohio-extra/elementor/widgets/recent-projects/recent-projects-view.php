
<?php if ( $settings['card_layout'] == 'grid_8' || $settings['card_layout'] == 'grid_12' ): ?>
	<div class="ohio-recent-projects-sc <?php echo esc_attr( $settings['card_layout'] ); ?> <?php if ( !empty( $settings['fullscreen_mode'] ) ) { echo 'full-vh'; } ?>"
		data-ohio-portfolio-grid="true"
		<?php if ( $settings['card_layout'] == 'grid_8' ){ ?> data-interactive-links-grid="true"<?php } ?>>

	<div class="portfolio-grid-images interactive-links-grid-images" 

		<?php if ($settings['card_layout'] == 'grid_8'): ?>
			data-vc-full-width="true" data-vc-stretch-content="true" 
		<?php endif; ?>>

	</div>
	
<?php else: ?>
	<div class="ohio-recent-projects-sc <?php echo esc_attr( $settings['card_layout'] ); ?>" data-ohio-portfolio-grid="true">
<?php endif; ?>

	<?php
		require 'views/filter.php';

		if ( in_array( $settings['card_layout'], [ 'grid_1', 'grid_2', 'grid_11', 'grid_8', 'grid_12' ] ) ) {
			include 'views/cards-projects.php';
		} else {
			include 'views/slider-projects.php';
		}

		require 'views/pagination.php';
	?>

</div>
