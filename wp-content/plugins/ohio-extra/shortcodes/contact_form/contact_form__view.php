<?php

/**
* WPBakery Page Builder Ohio Contact Form shortcode view
*/

?>
<div class="ohio-contact-from-sc contact-form <?php echo $contact_form_class; ?><?php echo $css_class; ?>"
	id="<?php echo esc_attr( $contact_form_uniqid ); ?>" 
	<?php if ( $appearance_effect != 'none' ) { echo ' data-aos="' . $appearance_effect . '"'; } ?> 
	<?php if ( $appearance_duration ) { echo ' data-aos-duration="' . $appearance_duration . '"'; } ?> 
	<?php if ( $appearance_delay ) echo ' data-aos-delay="' . $appearance_delay . '"'; ?> 
	<?php if ( !$appearance_once ) echo ' data-aos-once="true"'; ?>>

	<?php if ( !empty( $form_id ) ): ?>
		<?php echo do_shortcode( '[contact-form-7 id="' . esc_attr( $form_id ) . '" title=""]' ); ?>
	<?php else: ?>
		<!-- Blank SC note -->
		<div class="clb-blank-note">
			<i class="ion ion-md-information-circle-outline"></i>
				<div class="clb-blank-note-inner">
				<?php echo esc_html('Check the', 'ohio-extra' ); ?>
				<b><?php echo esc_html('Contact Form 7 shortcode', 'ohio-extra' ); ?></b>
				<?php echo esc_html('on the current page and choose a valid form to be displayed here.', 'ohio-extra' ); ?>
			</div>
		</div>
	<?php endif; ?>

	<div class="hidden" data-contact-btn="true">
		<button class="btn <?php echo $button_css['classes']; ?>">
			<span class="btn-load"></span>
			<span class="text"></span>
		</button>
	</div>
</div>