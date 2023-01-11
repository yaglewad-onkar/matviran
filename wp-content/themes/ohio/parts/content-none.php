<?php /* get_template_part( 'parts/elements/page_headline' ); */?>

<div class="clb-blank">
	<div class="clb-blank-image">
		<i class="ion ion-md-close-circle-outline"></i>
	</div>
	<h4 class="clb-blank-headline">
		<?php esc_html_e( 'No result', 'ohio' ); ?>
	</h4>
	<p class="clb-blank-details">
		<?php esc_html_e( 'We did not find any article that matches this search. Try using other search criteria', 'ohio' ); ?>:
	</p>
	<div class="clb-blank-search">
		<?php get_search_form( true ); ?>	
	</div>
</div>