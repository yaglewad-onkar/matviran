<?php
	$logo = OhioSettings::get_logo();
	$logo_for_fixed = OhioSettings::get_logo( false, true );
	$logo_as_image = is_array( $logo );
	$logo_for_fixed_as_image = is_array( $logo_for_fixed );
	$logo_for_onepage = OhioSettings::get_logo_for_onepage();
	$header_style = OhioOptions::get( 'page_header_menu_style', 'style1' );
	$logo_text = OhioOptions::get( 'page_header_logo_text', get_bloginfo( 'name' ), false, true );
	$switcher = OhioOptions::get( 'page_dark_mode_switcher', false );
	$dark_scheme = OhioOptions::get( 'page_dark_mode', false );
	$is_dark_scheme = $switcher || $dark_scheme;

	if ($is_dark_scheme) {
		$logo_type = OhioOptions::get( 'page_header_logo_style', 'sitename' );
		$_logo = OhioOptions::get_global( 'page_header_logo_image' );

		$_logo_light = array(
			'default' => false,
			'retina' => false,
			'mobile' => false,
			'have_vector' => false,
			'type' => false
		);

		if ($logo_type == "custom") {
			$_logo_light['default'] = OhioOptions::get( 'page_header_custom_logo' );
		} else {
			if ( is_array( $_logo ) ) {
				if ( $_logo['global_logo_image_light'] ) {
					$_logo_light['light'] = $_logo['global_logo_image_light'];
					if ( ( substr( $_logo['global_logo_image_light'], -4, 4) == '.svg' ) ) {
						$_logo_light['have_vector'] = true;
					}
				}
				if ( $_logo['global_logo_image_light_retina'] ) {
					$_logo_light['light_retina'] = $_logo['global_logo_image_light_retina'];
					if ( ( substr( $_logo['global_logo_image_light_retina'], -4, 4) == '.svg' ) ) {
						$_logo_light['have_vector'] = true;
					}
				}
			}
	
			if ( is_array( $_logo ) ) {
				if ( $_logo['global_logo_image_light'] ) {
					$_logo_light['default'] = $_logo['global_logo_image_light'];
				}
				if ( $_logo['global_logo_image_light_retina'] ) {
					$_logo_light['retina'] = $_logo['global_logo_image_light_retina'];
					
				}
				if ( $_logo['global_logo_image_light_mobile'] ) {
					$_logo_light['mobile'] = $_logo['global_logo_image_light_mobile'];
				}
			}
		}
	}

?>

<div class="branding<?php if ( $logo == "sitename" ) { echo ' text-logo'; } ?>">
	<a class="branding-title font-titles" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<div class="logo<?php if ( $logo_as_image && $logo['mobile'] ) { echo ' with-mobile'; } ?>">
			<?php if ( $logo_as_image && ( $logo['default'] || $logo['retina'] ) ) : ?>
				<img src="<?php echo esc_url( ( $logo['default'] ) ? $logo['default'] : $logo['retina'] ); ?>" class="<?php if ( $is_dark_scheme ) { echo ' main-logo'; }  ?><?php if ( $logo['have_vector'] ) { echo ' svg-logo'; }  ?>" <?php if ( $logo['retina'] ) { echo ' srcset="' . $logo['retina'] . ' 2x"'; } ?> alt="<?php echo esc_attr( $logo_text ); ?>" >
				
				<?php if ($is_dark_scheme): ?>
					<?php if ($_logo_light['default'] || $_logo_light['retina']): ?>
						<img src="<?php echo esc_url( ( $_logo_light['default'] ) ? $_logo_light['default'] : $_logo_light['retina'] ); ?>" class="<?php if ( $is_dark_scheme ) { echo ' dark-scheme-logo'; }  ?><?php if ( $_logo_light['have_vector'] ) { echo ' svg-logo'; }  ?>" <?php if ( $_logo_light['retina'] ) { echo ' srcset="' . $_logo_light['retina'] . ' 2x"'; } ?> alt="<?php echo esc_attr( $logo_text ); ?>" >
					<?php else : ?>
						<div class='dark-scheme-logo'>
							<?php echo esc_html( $logo_text ); ?>
						</div>	
					<?php endif; ?>
				<?php endif; ?>

			<?php else : ?>
				<?php echo esc_html( $logo_text ); ?>
			<?php endif; ?>
		</div>
		<div class="fixed-logo">
			<?php if ( $logo_for_fixed_as_image && ( $logo_for_fixed['default'] || $logo_for_fixed['retina'] ) ) : ?>
				<img src="<?php echo esc_url( ( $logo_for_fixed['default'] ) ? $logo_for_fixed['default'] : $logo_for_fixed['retina'] ); ?>" <?php if ( $logo_for_fixed['have_vector'] ) { echo ' class="svg-logo"'; } ?><?php if ( $logo_for_fixed['retina'] ) { echo ' srcset="' . $logo_for_fixed['retina'] . ' 2x"'; } ?> alt="<?php echo esc_attr( $logo_text ); ?>">
			<?php else : ?>
				<?php echo esc_html( $logo_text ); ?>
			<?php endif; ?>
		</div>
		<?php if ( $logo_as_image && $logo['mobile'] ) : ?>
		<div class="mobile-logo">
			<img src="<?php echo esc_url( $logo['mobile'] ); ?>" class="<?php if ( $is_dark_scheme ) { echo ' main-logo'; }  ?><?php if ( $logo['have_vector'] ) { echo ' svg-logo'; } ?>" alt="<?php echo esc_attr( $logo_text ); ?>">

			<?php if ($is_dark_scheme): ?>
				<?php if ($_logo_light['mobile']) : ?>
					<img src="<?php echo esc_url( $_logo_light['mobile'] ); ?>" class="<?php if ( $is_dark_scheme ) { echo ' dark-scheme-logo'; }  ?><?php if ( $_logo_light['have_vector'] ) { echo ' svg-logo'; } ?>" alt="<?php echo esc_attr( $logo_text ); ?>">
				<?php else : ?>
					<div class='dark-scheme-logo'>
						<?php echo esc_html( $logo_text ); ?>
					</div>	
				<?php endif; ?>
			<?php endif; ?>

		</div>
		<?php endif; ?>
		<?php if ( $logo_for_fixed_as_image && $logo_for_fixed['mobile'] ) : ?>
		<div class="fixed-mobile-logo">
			<img src="<?php echo esc_url( $logo_for_fixed['mobile'] ); ?>" class="<?php if ( $logo_for_fixed['have_vector'] ) { echo ' svg-logo'; } ?>" alt="<?php echo esc_attr( $logo_text ); ?>">
		</div>
		<?php endif; ?>
		<div class="for-onepage">
			<span class="dark hidden">
				<?php if ( $logo_for_onepage['dark'] || $logo_for_onepage['dark_retina'] ) : ?>
					<img src="<?php echo esc_url( ( $logo_for_onepage['dark'] ) ? $logo_for_onepage['dark'] : $logo_for_onepage['dark_retina'] ); ?>" <?php if ( $logo_for_onepage['have_vector'] ) { echo ' class="svg-logo"'; } ?><?php if ( $logo_for_onepage['dark_retina'] ) { echo ' srcset="' . $logo_for_onepage['dark_retina'] . ' 2x"'; } ?> alt="<?php echo esc_attr( $logo_text ); ?>">
				<?php else : ?>
					<?php echo esc_html( $logo_text ); ?>
				<?php endif; ?>
			</span>
			<span class="light hidden">
				<?php if ( $logo_for_onepage['light'] || $logo_for_onepage['light_retina'] ) : ?>
					<img src="<?php echo esc_url( ( $logo_for_onepage['light'] ) ? $logo_for_onepage['light'] : $logo_for_onepage['light_retina'] ); ?>" <?php if ( $logo_for_onepage['have_vector'] ) { echo ' class="svg-logo"'; } ?><?php if ( $logo_for_onepage['light_retina'] ) { echo ' srcset="' . $logo_for_onepage['light_retina'] . ' 2x"'; } ?> alt="<?php echo esc_attr( $logo_text ); ?>">
				<?php else : ?>
					<?php echo esc_html( $logo_text ); ?>
				<?php endif; ?>
			</span>
		</div>
	</a>
</div>