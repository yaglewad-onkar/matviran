<?php
	if ( !OhioOptions::get_global( 'notification_bar', false ) ) return; // exif if not visible

	$notification_button = OhioOptions::get_global( 'notification_button' );
	$notification_link = OhioOptions::get_global( 'notification_link' );

	if ( $notification_button ) {
		$notification_button_link = OhioOptions::get_global( 'notification_button_link' );
	}
	if ( $notification_link ) {
		$notification_link = OhioOptions::get_global( 'notification_link' );
	}
?>
<?php if ( !isset($_COOKIE['notification']) ) : ?>
	<div class="page-container">
		<div class="notification-bar active">
			<div class="notification">
				<div class="notification-text" >
					<?php echo wp_kses( OhioOptions::get_global( 'notification_text' ), 'post' ) ?>

					<?php if ( $notification_link ) : ?>
						<div class="notification-link">
							<a href="<?php echo esc_url( $notification_link['url'] ); ?>">
								<?php echo esc_html( $notification_link['title'] ); ?>
							</a>
						</div>
					<?php endif; ?>
				</div>

				<?php if ( $notification_button ) : ?>
					<div class="notification-btn">
						<a href="<?php echo esc_url( $notification_button_link['url'] ); ?>" class="btn btn-small">
							<?php echo esc_html( $notification_button_link['title'] ) ?>
						</a>
					</div>
				<?php endif; ?>
			</div>
			
			<div class="btn-round btn-round-small btn-round-light clb-close clb-notification-close dark-mode-reset" tabindex="0">
				<i class="ion ion-md-close"></i>
			</div>
		</div>
	</div>
<?php endif; ?>