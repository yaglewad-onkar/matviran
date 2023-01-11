<?php
	$footer_is_visible = OhioOptions::get( 'page_footer_visibility', true );
	$copyright_is_visible = OhioOptions::get( 'page_footer_copyright_visibility', true );

	if ( !$footer_is_visible && !$copyright_is_visible ) return; // exit if not visible

	$copyright_alignment = OhioOptions::get_global( 'footer_copyright_alignment', 'left_and_right' );
	$copyright_text_left = OhioOptions::get_global( 'footer_copyright_left' );
	$copyright_text_right = OhioOptions::get_global( 'footer_copyright_right' );
	$copyright_text_center = OhioOptions::get_global( 'footer_copyright_center' );

	if ( !$copyright_text_right && !$copyright_text_left ) {
		$copyright_text_left = '&copy; 2020, Ohio Theme. Made with passion by <a target="_blank" href="https://clbthemes.com/">Colabrio</a>';
		$copyright_text_right = '<a target="_blank" href="#">Privacy & Cookie Policy</a> | <a target="_blank" href="#">Terms of Service</a>';
	}

	$project_layout_type = OhioOptions::get( 'project_layout_type' );

	$footer_widgets_count = 0;
	if ( is_active_sidebar( 'ohio-sidebar-footer-1' ) ) { $footer_widgets_count++; }
	if ( is_active_sidebar( 'ohio-sidebar-footer-2' ) ) { $footer_widgets_count++; }
	if ( is_active_sidebar( 'ohio-sidebar-footer-3' ) ) { $footer_widgets_count++; }
	if ( is_active_sidebar( 'ohio-sidebar-footer-4' ) ) { $footer_widgets_count++; }

	$footer_classes = [ 'site-footer' ];
	if ( OhioOptions::get( 'page_footer_is_sticky', false ) ) {
		$footer_classes[] = 'sticky';
	}

	if ( OhioOptions::get( 'page_footer_fixed_typography_color', true ) ) {
		$footer_classes[] = 'clb__dark_section';
	}
	else 
	{
	  	$footer_classes[] = 'clb__light_section';
	}

	$page_container_classes = [ 'page-container' ];
	if ( !OhioOptions::get( 'page_footer_is_wrapped', true ) ) {
		$page_container_classes[] = 'full';
	}

?>
<footer id="colophon" class="<?php echo esc_attr( implode( ' ', $footer_classes ) ); ?>">
	<?php if ( $footer_is_visible && $footer_widgets_count > 0 ) : ?>
	<div class="<?php echo esc_attr( implode( ' ', $page_container_classes ) ); ?>">
		<div class="widgets vc_row">
			<?php if ( is_active_sidebar('ohio-sidebar-footer-1') ) : ?>
				<div class="vc_col-lg-<?php echo esc_attr( intval( 12 / $footer_widgets_count ) ); ?> vc_col-md-<?php echo esc_attr( intval( 12 / $footer_widgets_count ) ); ?> vc_col-sm-6 widgets-column">
					<ul><?php dynamic_sidebar( 'ohio-sidebar-footer-1' ); ?></ul>
				</div>
			<?php endif; ?>

			<?php if ( is_active_sidebar( 'ohio-sidebar-footer-2' ) ) : ?>
				<div class="vc_col-lg-<?php echo esc_attr( intval( 12 / $footer_widgets_count ) ); ?> vc_col-md-<?php echo esc_attr( intval( 12 / $footer_widgets_count ) ); ?> vc_col-sm-6 widgets-column">
					<ul><?php dynamic_sidebar( 'ohio-sidebar-footer-2' ); ?></ul>
				</div>
			<?php endif; ?>

			<?php if ( is_active_sidebar('ohio-sidebar-footer-3') ) : ?>
				<div class="vc_col-lg-<?php echo esc_attr( intval( 12 / $footer_widgets_count ) ); ?> vc_col-md-<?php echo esc_attr( intval( 12 / $footer_widgets_count ) ); ?> vc_col-sm-6 widgets-column">
					<ul><?php dynamic_sidebar( 'ohio-sidebar-footer-3' ); ?></ul>
				</div>
			<?php endif; ?>

			<?php if ( is_active_sidebar('ohio-sidebar-footer-4') ) : ?>
				<div class="vc_col-lg-<?php echo esc_attr( intval( 12 / $footer_widgets_count ) ); ?> vc_col-md-<?php echo esc_attr( intval( 12 / $footer_widgets_count ) ); ?> vc_col-sm-6 widgets-column">
					<ul><?php dynamic_sidebar( 'ohio-sidebar-footer-4' ); ?></ul>
				</div>
			<?php endif; ?>
		</div>
	</div>
	<?php endif; ?>
	<?php if ( $copyright_is_visible ) : ?>
		<div class="site-info ">
			<div class="<?php echo esc_attr( implode( ' ', $page_container_classes ) ); ?>">
				<div class="vc_row">
					<div class="vc_col-md-12">
						<div class="site-info-holder <?php if ( $copyright_alignment == 'center' ) { echo 'text-center';} ?>">
							<?php if ( $copyright_alignment == 'center' ) : ?>
								<div>
									<?php echo wp_kses( $copyright_text_center, 'post' ); ?>
								</div>
							<?php else : ?>
								<div class="left">
									<?php echo wp_kses( $copyright_text_left, 'post' ); ?>
								</div>
								<div class="right">
									<?php echo wp_kses( $copyright_text_right, 'post' ); ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>
</footer>
