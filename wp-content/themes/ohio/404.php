<?php get_header();?>

<div class="clb-blank">
	<div class="clb-blank-image">
		<i class="ion ion-md-copy"></i>
	</div>
	<h4 class="clb-blank-headline">
		<?php esc_html_e( '404. The page you are looking for does not exist.', 'ohio' ); ?>
	</h4>
	<p class="clb-blank-details">
		<?php esc_html_e( 'Tell us what you are looking for', 'ohio' ); ?>:
	</p>
	<div class="clb-blank-search">
		<?php get_search_form( true ); ?>	
	</div>
</div>

<?php get_footer();