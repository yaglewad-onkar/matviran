<?php
	$project_layout_type = OhioOptions::get( 'project_layout_type' );

	get_header();
?>

<?php 
	if ( ! in_array( $project_layout_type, array( 'type_5', 'type_6', 'type_8', NULL ) ) ) {
		get_template_part( 'parts/elements/page_headline' );
	}
?>

<?php if ( ! post_password_required() ) : ?>

	<?php
	switch ( $project_layout_type ) {
		case 'type_1':
			get_template_part( 'parts/portfolio/layout_type1' );
			break;
		case 'type_2':
			get_template_part( 'parts/portfolio/layout_type2' );
			break;
		case 'type_3':
			get_template_part( 'parts/portfolio/layout_type3' );
			break;
		case 'type_4':
			get_template_part( 'parts/portfolio/layout_type4' );
			break;
		case 'type_5':
			get_template_part( 'parts/portfolio/layout_type5' );
			break;
		case 'type_6':
			get_template_part( 'parts/portfolio/layout_type6' );
			break;
		case 'type_7':
			get_template_part( 'parts/portfolio/layout_type7' );
			break;
		case 'type_8':
			get_template_part( 'parts/portfolio/layout_type8' );
			break;
		case 'type_9':
			get_template_part( 'parts/portfolio/layout_type9' );
			break;
		default:
			get_template_part( 'parts/portfolio/layout_type1' );
	}?>

	<?php if (comments_open() || get_comments_number()) : ?>
	    <div class="portfolio-comments clb__light_section">
	        <?php comments_template(); ?>
	    </div>
	<?php endif; ?>

	<?php else : ?>
		<div class="page-container bottom-offset">
			<div class="content">
				<?php echo get_the_password_form(); ?>
			</div>
		</div>
	<?php endif; ?>

<?php

	get_footer();
