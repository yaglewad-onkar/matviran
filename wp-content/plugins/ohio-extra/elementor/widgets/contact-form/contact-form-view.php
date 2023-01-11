<div class="ohio-contact-from-sc contact-form <?php echo $this->getWrapperClasses(); ?>">

	<?php if ( !empty( $settings['form'] ) && $settings['form'] != '0' && get_post_type( $settings['form'] ) === 'wpcf7_contact_form' ): ?>
		<?php echo do_shortcode( '[contact-form-7 id="' . esc_attr( $settings['form'] ) . '" title=""]' ); ?>
	<?php else: ?>
		<!-- Blank SC note -->
		<div class="clb-blank-note">
			<i class="ion ion-md-information-circle-outline"></i>
			<div class="clb-blank-note-inner">
				<a target="_blank" class="highlighted" href="<?php echo get_edit_post_link() . '&action=elementor'; ?>"><?php echo esc_html('Choose a Contact 7 form', 'ohio-extra' ); ?></a>
				<?php echo esc_html('in the Elementor editor mode to be displayed here.', 'ohio-extra' ); ?>
			</div>
		</div>
	<?php endif; ?>

	<div class="hidden" data-contact-btn="true">
		<button class="btn <?php echo esc_attr( $this->getButtonClasses() ); ?>">
			<span class="btn-load"></span>
			<span class="text"></span>

			<?php if ( $settings['button_style_type'] == 'link' ): ?>
				<i class="ion-right ion"><svg class="arrow-icon" width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 7H16M16 7L11 1M16 7L11 13" stroke-width="2"/></svg></i>
			<?php endif; ?>
		</button>
	</div>
</div>
