<?php
	get_header();

	// Settings
	$show_breadcrumbs = OhioOptions::get( 'page_breadcrumbs_visibility', true );
	$page_wrapped = OhioOptions::get( 'page_add_wrapper', true );
	$no_ecommerce = !OhioOptions::page_is( 'ecommerce' );
	$add_content_padding = OhioOptions::get( 'page_add_top_padding', true );
	$sidebar_position = OhioOptions::get( 'page_sidebar_position', 'left' );
	$sidebar_layout = OhioOptions::get( 'page_sidebar_layout', 'simple' );
	$page_container_class = '';
	$content_container_class = '';
	$sidebar_class = '';

	if ( $add_content_padding && !$show_breadcrumbs ) {
		$page_container_class .= ' top-offset'; 
	}
	if ( ! $page_wrapped ) {
		$page_container_class .= ' full';
	}
	if ( $add_content_padding ) {
		$page_container_class .= ' bottom-offset';
	}

	if ( is_active_sidebar( 'ohio-sidebar-page' ) ) {
		if ( $no_ecommerce && $sidebar_position == 'left' ) {
			$content_container_class = 'with-left-sidebar';
		}
		if ( $no_ecommerce && $sidebar_position == 'right' ) {
			$content_container_class = 'with-right-sidebar';
		}
		if ( $sidebar_layout ) {
			$sidebar_class .= ' sidebar-' . $sidebar_layout;
		}
	}

?>

<?php get_template_part( 'parts/elements/page_headline' ); ?>

<?php 
	if (OhioSettings::page_is( 'ecommerce' )) {
		if ( !(is_cart() && WC()->cart->get_cart_contents_count() == 0)) {
			get_template_part( 'parts/elements/breadcrumbs' );
		}
	} else {
		get_template_part( 'parts/elements/breadcrumbs' );
	}

	
?>

<div class="page-container<?php echo esc_attr( $page_container_class ); ?>">
	<div id="primary" class="content-area">

		<?php if ( is_active_sidebar( 'ohio-sidebar-page' ) && $no_ecommerce && $sidebar_position == 'left' ) : ?>
		<div class="page-sidebar sidebar-left<?php echo esc_attr( $sidebar_class ); ?>">
			<aside id="secondary" class="widget-area">
				<?php dynamic_sidebar( 'ohio-sidebar-page' ); ?>
			</aside>
		</div>
		<?php endif; ?>

		<div class="page-content <?php echo esc_attr( $content_container_class ); ?>">
			<main id="main" class="site-main">
			<?php
				while ( have_posts() ) : the_post();
					get_template_part( 'parts/content', 'page' );
				endwhile;
			?>
			</main>
		</div>

		<?php if ( is_active_sidebar( 'ohio-sidebar-page' ) && $no_ecommerce && $sidebar_position == 'right' ) : ?>
		<div class="page-sidebar sidebar-right<?php echo esc_attr( $sidebar_class ); ?>">
			<aside id="secondary" class="widget-area">
				<?php dynamic_sidebar( 'ohio-sidebar-page' ); ?>
			</aside>
		</div>
		<?php endif; ?>
	</div>
</div>

<?php
	while ( have_posts() ) : the_post();
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
	endwhile;

	get_footer();
