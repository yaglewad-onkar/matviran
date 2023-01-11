<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( ! is_single() ) : ?>
	<header class="entry-header">
		<?php the_title( '<h2 class="title left"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
	</header>
	<?php endif; ?>
	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages', 'ohio' ) . ':',
				'after'  => '</div>',
			) );
		?>
	</div>
	<div class="entry-footer">
		<?php ohio_return_entry_footer(); ?>
	</div>
</article>