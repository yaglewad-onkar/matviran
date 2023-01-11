<?php
	get_header();

	$show_breadcrumbs = OhioOptions::get( 'page_breadcrumbs_visibility', true );
	$show_headline = OhioOptions::get( 'page_header_title_visibility', true );
	$page_wrapped = OhioOptions::get( 'page_add_wrapper', true );
	$sidebar_position = OhioOptions::get( 'page_sidebar_position', 'without' );
	$show_author_widget = OhioOptions::get_global( 'post_author_widget_visibility', true );
	$show_comments = OhioOptions::get( 'post_comments_visibility', true );
	$share = OhioOptions::get( 'post_social_visibility', true );

	$sidebar_row_class = '';
	if ( $sidebar_position == 'right' ) {
		$sidebar_row_class = ' with-right-sidebar';
	} elseif ( $sidebar_position == 'left' ) {
		$sidebar_row_class = ' with-left-sidebar';
	}
	$sidebar_layout = OhioOptions::get( 'page_sidebar_layout', 'simple' );
	$sidebar_class = '';
	if ( $sidebar_layout ) {
		$sidebar_class .= ' sidebar-' . $sidebar_layout;
	}

	$page_container_class = '';

	if ( !$show_breadcrumbs && $show_headline) {
		$page_container_class .= ' top-offset';
	}
	if ( !$page_wrapped ) {
		$page_container_class .= ' full';
	}

	while ( have_posts() ) : the_post();
?>

<?php get_template_part( 'parts/elements/page_headline' ); ?>

<?php get_template_part( 'parts/elements/breadcrumbs' ); ?>

<div class="page-container post-page-container <?php echo esc_attr( $page_container_class ); ?>" id='scroll-content'>
	
	<?php if ( is_active_sidebar( 'ohio-sidebar-blog' ) && $sidebar_position == 'left' ) : ?>
	<div class="page-sidebar sidebar-left<?php echo esc_attr( $sidebar_class ); ?>">
		<aside id="secondary" class="widget-area">
			<?php dynamic_sidebar( 'ohio-sidebar-blog' ); ?>
		</aside>
	</div>
	<?php endif; ?>

	<div class="page-content<?php echo esc_attr( $sidebar_row_class ); ?>">
		<div id="primary" class="content-area">
			<main id="main" class="site-main page-offset-bottom">
				<div class="vc_row">
					<div class="vc_col-lg-12"> <!-- <div class="vc_col-lg-8 vc_col-lg-push-2"> -->
					<?php get_template_part( 'parts/content', get_post_format() ); ?>
					<?php
						$author = get_the_author_meta( 'ID' );
						if ( $show_author_widget && $author ) {
							the_widget( 'ohio_widget_about_author', array( 'words' => '' ) );
						}
					?>	
					</div>
				</div>
			</main>
		</div>
	</div>

	<?php if ( is_active_sidebar( 'ohio-sidebar-blog' ) && $sidebar_position == 'right' ) : ?>
	<div class="page-sidebar sidebar-right<?php echo esc_attr( $sidebar_class ); ?>">
		<aside id="secondary" class="widget-area">
			<?php dynamic_sidebar( 'ohio-sidebar-blog' ); ?>
		</aside>
	</div>
	<?php endif; ?>

	<div class="post-share" data-ohio-content-scroll="#scroll-content">
		<?php 
			if ( $share ) {
				do_shortcode( '[ohio_share_blog]' );
			}
		?>
	</div>
</div>

<?php get_template_part( 'parts/elements/nav_posts' ); ?>

<?php get_template_part( 'parts/elements/related_posts' ); ?>

<?php if ( $show_comments && (comments_open() || get_comments_number()) ) : ?>
	<?php comments_template(); ?>
<?php endif; ?>

<?php
	endwhile;

	get_footer();
