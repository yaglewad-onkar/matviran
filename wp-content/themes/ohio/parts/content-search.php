<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="title text-left"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php the_excerpt( ); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<?php ohio_return_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
