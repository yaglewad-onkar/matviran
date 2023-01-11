		</div>

		<?php if ( !OhioHelper::is_optimized_flow( 'footer' ) && !OhioSettings::is_coming_soon_page() ): ?>
			<?php get_template_part( 'parts/elements/footer' ); ?>
		<?php endif; ?>
	</div>

	<?php get_template_part('parts/elements/notification'); ?>

	<?php if ( OhioOptions::get( 'page_header_menu_style', 'style1' ) == 'style6' ) : ?>
	</div>
	<?php endif; ?>

	<?php if ( OhioOptions::get( 'page_use_boxed_wrapper', false ) ) : ?>
	</div>
	<?php endif; ?>

	<?php wp_footer(); ?>
	</body>
</html>