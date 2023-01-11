<?php
	$header_button = OhioOptions::get_global( 'custom_button_for_header', false );
	$button_link = OhioOptions::get_global( 'custom_button_for_header_link' );
?>
<?php if ( $header_button && $button_link ): ?>
	<a href="<?php echo esc_url( $button_link['url'] ); ?>" class="btn btn-small btn-optional" target="<?php echo esc_html( $button_link['target'] ); ?>">
		<?php echo esc_html( $button_link['title'] ); ?>
	</a>
<?php endif; ?>