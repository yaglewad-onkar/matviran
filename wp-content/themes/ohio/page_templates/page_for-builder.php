<?php /* Template Name: For page builder */ ?>

<?php
	get_header();

	$page_wrapped = OhioOptions::get( 'page_add_wrapper', true );
	$add_content_padding = OhioOptions::get( 'page_add_top_padding', true );

	$page_container_class = '';
	if ( !$page_wrapped ) {
		$page_container_class .= ' full';
	}
	if ( $add_content_padding ) {
		$page_container_class .= ' bottom-offset';
	}
?>

<div class="page-container<?php echo esc_attr( $page_container_class ); ?>">
	<div class="page-content">
		<div id="primary" class="content-area">
			<main id="main" class="site-main">
				<?php
					while ( have_posts() ) {
						the_post();
						get_template_part( 'parts/content', 'page' );
					}
				?>
			</main>
		</div>
	</div>
</div>

<?php

	get_footer();
