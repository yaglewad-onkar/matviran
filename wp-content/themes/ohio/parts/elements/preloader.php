<?php
	// Switch off preloader for Elementor editor
	if ( !empty( $_GET['elementor-preview'] ) ) return;

	$preloader_classes = '';

	if ( !OhioOptions::get_global( 'page_preloader_visibility', false ) ) {
		$preloader_classes .= 'hide';
	} else {
		if (OhioOptions::get_global( 'page_preloader_type', 'classic_circle' ) == 'percentage') {
			$preloader_classes .= 'percentage-preloader';
		}
	}
?>

<div class="page-preloader <?php echo esc_attr( $preloader_classes ) ?>" id="page-preloader">
		<?php
			switch ( OhioOptions::get_global( 'page_preloader_type', 'classic_circle' ) ) {
				case 'classic_circle':
					echo '<svg class="spinner" viewBox="0 0 50 50">
  							<circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="4"></circle>
						</svg>';
					break;
				case 'double_bounce':
					echo '<div class="sk-double-bounce sk-preloader">
				        <div class="sk-child sk-double-bounce1"></div>
				        <div class="sk-child sk-double-bounce2"></div>
				      </div>';
					break;
				case 'waves':
					echo '<div class="sk-wave sk-preloader">
					        <div class="sk-rect sk-rect1"></div>
					        <div class="sk-rect sk-rect2"></div>
					        <div class="sk-rect sk-rect3"></div>
					        <div class="sk-rect sk-rect4"></div>
					        <div class="sk-rect sk-rect5"></div>
					      </div>';
					break;
				case 'circle':
					echo '<div class="sk-circle sk-preloader">
				        <div class="sk-circle1 sk-child"></div>
				        <div class="sk-circle2 sk-child"></div>
				        <div class="sk-circle3 sk-child"></div>
				        <div class="sk-circle4 sk-child"></div>
				        <div class="sk-circle5 sk-child"></div>
				        <div class="sk-circle6 sk-child"></div>
				        <div class="sk-circle7 sk-child"></div>
				        <div class="sk-circle8 sk-child"></div>
				        <div class="sk-circle9 sk-child"></div>
				        <div class="sk-circle10 sk-child"></div>
				        <div class="sk-circle11 sk-child"></div>
				        <div class="sk-circle12 sk-child"></div>
				      </div>';
					break;
				case 'folding_cube':
					echo '<div class="sk-folding-cube sk-preloader">
				        <div class="sk-cube1 sk-cube"></div>
				        <div class="sk-cube2 sk-cube"></div>
				        <div class="sk-cube4 sk-cube"></div>
				        <div class="sk-cube3 sk-cube"></div>
				      </div>';
					break;
				case 'percentage':
					echo '<div class="sk-percentage sk-preloader">
							<div class="sk-percentage-percent font-titles"></div>
				      </div>';
					break;
				case 'custom_loader':
					$preloader = OhioOptions::get_global( 'custom_page_preloader' );
					if ( $preloader ) {
						echo '<div class="custom-preloader">';
						echo '<img src="' . esc_url( $preloader ) . '" alt="preloader" />';
						echo '</div>';
					}
					break;
		} ?>
</div>