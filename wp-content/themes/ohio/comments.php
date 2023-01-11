<?php
	if ( post_password_required() ) return;

	if ( !function_exists( 'wpb_move_comment_field_to_bottom' ) ) {
		add_filter( 'comment_form_fields', 'wpb_move_comment_field_to_bottom' );

		function wpb_move_comment_field_to_bottom( $fields ) {
			$comment_field = $fields['comment'];
			unset( $fields['comment'] );
			$fields['comment'] = $comment_field;
			return $fields;
		}
	}

	$comments_class = '';
	if ( !have_comments() ) { 
		$comments_class .= ' no-comments'; 
	}

	$page_wrapped = OhioOptions::get( 'page_add_wrapper', true );
?>

<div class="comments-container">
	<div class="page-container<?php if ( ! $page_wrapped ) { echo ' full'; } ?>">
		<div class="vc_row">
			<div class="vc_col-lg-12">
				<div id="comments" class="comments-area <?php echo esc_attr( $comments_class ); ?>">

				<?php if ( have_comments() ) : ?>
					<h4 class="heading-md">
						<?php 
							/* translators: %1: count comments */
							printf( esc_html( _nx( '%1$s comment', '%1$s comments', get_comments_number(), 'comments title', 'ohio' ) ),
								esc_html( number_format_i18n( get_comments_number() ) ) );
						?>
					</h4>

					<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
						<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
							<h2 class="title screen-reader-text"><?php esc_html_e( 'Comment navigation', 'ohio' ); ?></h2>
							<div class="nav-links">

								<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'ohio' ) ); ?></div>
								<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'ohio' ) ); ?></div>

							</div><!-- .nav-links -->
						</nav><!-- #comment-nav-above -->
					<?php endif; ?>

					<ol class="comment-list">
						<?php
							wp_list_comments( 'callback=ohio_comment' );
						?>
					</ol><!-- .comment-list -->

					<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
						<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
							<h2 class="title screen-reader-text"><?php esc_html_e( 'Comment navigation', 'ohio' ); ?></h2>
							<div class="nav-links">

								<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'ohio' ) ); ?></div>
								<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'ohio' ) ); ?></div>

							</div><!-- .nav-links -->
						</nav><!-- #comment-nav-below -->
					<?php
					endif; // Check for comment navigation.

				endif; // Check for have_comments().

				if ( comments_open() ) {

					$commenter = wp_get_current_commenter();
					$req = get_option( 'require_name_email' );
					$req_mark = ( $req ? '*' : '' );
					$aria_req = ( $req ? " aria-required='true'" : '' );

					$args = array(
						'title_reply' => '<span class="heading-md title text-left">' . esc_html__( 'Post a comment', 'ohio' ) . '</span>',
						/* translators: %s: nickname */
						'title_reply_to' => esc_html__( 'Post a Reply to %s', 'ohio' ),
						'cancel_reply_link' => esc_html__( 'Click here to cancel reply', 'ohio' ),
						'label_submit' => esc_html__( 'Post Comment', 'ohio' ),
						'comment_field' => '<label for="comment" class="field-label">'.esc_attr__( 'Leave a Reply', 'ohio' ).'</label><textarea id="comment"  name="comment" cols="45" rows="8" aria-required="true"></textarea>',
						'fields' => apply_filters( 'comment_form_default_fields', array(
							'author' => '<div class="input-group"><div class="input-wrap"><div class="col-4 input-block"><label for="author" class="field-label">'.esc_attr__( 'Your Name', 'ohio' ).'</label><input id="author" name="author"  type="text" value="' . esc_attr( $commenter['comment_author'] ) . '"' . $aria_req . ' /></div>',
							'email' => '<div  class="col-4 input-block"><label for="email" class="field-label">'.esc_attr__( 'Your Email', 'ohio' ).'</label><input id="email" name="email"  type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '"' . $aria_req . ' /></div>',
							'url' => '<div  class="col-4 input-block"><label for="url" class="field-label">'.esc_attr__( 'Your Website', 'ohio' ).'</label><input id="url" name="url" type="text"  value="' . esc_attr( $commenter['comment_author_url'] ) . '" /></div></div></div>'
							) 
						),
						'submit_button' => '<button name="%1$s" type="submit" id="%2$s" class="btn submit-comment btn-loading-disabled %3$s" value="%4$s" >%4$s</button>',
					);
					comment_form( $args );
				}
			?>
				</div>
			</div>
		</div>
	</div>
</div>