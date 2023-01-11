<?php

if ( ! function_exists( 'ohio_return_posted_on' ) ) {
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function ohio_posted_time() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() )
		);

		return $time_string;
	}

	function ohio_return_posted_on() {
		$time_string = ohio_posted_time();

		$posted_on = sprintf( '%s', $time_string );

		echo '<span class="author">' . esc_html( get_the_author() ) . '</span>';
		echo '<b></b>';
		echo ' <span class="date">' . $posted_on . '</span>';

	}
}

if ( ! function_exists( 'ohio_return_entry_footer' ) ) {
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function ohio_return_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			global $post;

			$hide_tags = OhioOptions::get( 'post_tags_visibility', true );
			$share = OhioOptions::get( 'post_social_visibility', true );

			if ( $hide_tags ) {
				echo '<div class="entry-footer-tags">';

				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', ', ' );

					if ( !empty($tags_list) ) {
				        echo '<div class="tags-holder"><span class="tags-caption">' . esc_html__( 'Tagged with', 'ohio' ) . ': </span>';
			      	}
			      	
						if ( $tags_list ) {
							$tags = explode( ', ', $tags_list );
							foreach( $tags as $tag ) {
								printf( '<span class="tag">%1$s</span>', $tag ); // WPCS: XSS OK.
							}
						}

					if ( !empty($tags_list) ) {
				        echo '</div>';
			      	}

				echo '</div>';
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			/* translators: %s: post title */
			comments_popup_link( sprintf( esc_html__( 'Leave a Comment %1$s on %2$s', 'ohio' ), '<span class="screen-reader-text">', get_the_title() . '</span>' ) );
			echo '</span>';
		}

		edit_post_link(
			get_the_title( '<span class="screen-reader-text">"', '"</span>', false )
		);
	}

}

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function ohio_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'ohio_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'ohio_categories', $all_the_cool_cats );
	}

	return true;
}

/**
 * Flush out the transients used in ohio_categorized_blog.
 */
function ohio_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'ohio_categories' );
}