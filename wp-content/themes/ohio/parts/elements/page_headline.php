<?php
	global $post;

	if ( OhioHelper::is_optimized_flow( 'headline' ) ) return;
	if ( !OhioOptions::get( 'page_header_title_visibility', true ) ) return;
	
	if ( function_exists( 'is_cart' ) && is_cart() ) {
		if ( function_exists( 'WC' ) && WC()->cart->get_cart_contents_count() == 0 ) {
			return;
		}
	}
	
	// Settings
	$header_subtitle_type = OhioOptions::get( 'page_header_title_subtitle_type' );
	$show_header_subtitle = (bool) ( $header_subtitle_type != 'without' );
	$show_header_cap = OhioOptions::get( 'page_header_add_cap', true );
	$sub_header = OhioOptions::get( 'page_subheader_visibility', true );
	$header_subtitle_custom_text = OhioSettings::header_subtitle_custom_text();
	$bg_parallax = OhioOptions::get( 'page_header_title_use_parallax', false ); 

	$full_height = OhioOptions::get( 'page_header_title_fullscreen', false );
	$full_height_class = ( $full_height ) ? ' full-vh' : '';

	$title_align = OhioOptions::get( 'page_header_title_align', 'left' );
	$title_align_class = '';
	if ( $title_align == 'left' ) {
		$title_align_class = ' text-left';
	} elseif ( $title_align == 'right' ) {
		$title_align_class = ' text-right';
	} else {
		$title_align_class = ' text-center';
	}

	$page_wrapped = OhioOptions::get( 'page_add_wrapper', true );

	// Title and subtitle
	$title_text = get_the_title();
	$subtitle_text = $header_subtitle_custom_text; // legacy

	if ( OhioSettings::page_is( 'home' ) ) {
		$title_text = esc_html__( 'Blog', 'ohio' );
		$subtitle_text = esc_html__( 'Our recent posts', 'ohio' );
	} else if ( OhioSettings::page_is( 'category' ) ) {
		$title_text = single_cat_title( '', false ); 
		$subtitle_text = esc_html__( 'Category', 'ohio' );
	} elseif ( is_tax( 'ohio_portfolio_category' ) ) {
		$title_text = single_term_title( '', false );
	} elseif ( is_tax( 'ohio_portfolio_tags' ) ) {
		$title_text = single_term_title( '', false );
	} elseif ( OhioSettings::page_is( 'tag' ) ) {
		$title_text = single_tag_title( '', false ); 
		$subtitle_text = esc_html__( 'Tag', 'ohio' );
	} elseif ( OhioSettings::page_is( 'search' ) ) {
		$title_text =  esc_html__( 'Search Results for: ', 'ohio' ) . '<span>' . get_search_query() . '</span>';
		$subtitle_text = false;
	} elseif ( is_day() ) {
		$title_text = get_the_time( 'F' ) . ' ' . get_the_time( 'd' ) . ', ' . get_the_time( 'Y' );
		$subtitle_text = 'Posts by date';
	} elseif ( is_month() ) {
		$title_text = get_the_time( 'F' ) . ' ' . get_the_time( 'Y' );
		$subtitle_text = false;
	} elseif ( is_year() ) {
		$title_text = get_the_time( 'Y' );
		$subtitle_text = false;
	} elseif ( OhioSettings::page_is( 'single' ) ) {
		if ( ! $title_text ) {
			$title_text = '[' . get_the_date( get_option( 'date_format' ), $post->ID ) . ']';
		}
		if ( is_null($header_subtitle_type) || $header_subtitle_type == 'generated' ) {
			ob_start();

			$time_string = ohio_posted_time();
			
			$show_comments = OhioOptions::get( 'post_comments_visibility', true );

            $posted_on = sprintf( '%s', $time_string ); ?>

            <ul class="clb-post-holder">

                <li class="clb-post-meta-item">
                    <?php echo get_avatar( get_the_author_meta('email'), '50', true, get_the_author(), array('class' => 'author-avatar') ); ?>
                </li>

                <li class="clb-post-meta-item">
                    <div class="prefix"><?php esc_html_e('Author', 'ohio') ?></div>
                    <span class="author"><?php echo esc_html( get_the_author() ) ?></span>
                </li>

                <li class="clb-post-meta-item">
                    <div class="prefix"><?php esc_html_e('Published', 'ohio') ?></div>
                    <time class="date"><?php echo wp_kses( $posted_on, 'default') ?></time>
                </li>
				<?php if ( $show_comments && comments_open() ) : ?>
					<li class="clb-post-meta-item">
						<div class="prefix">
							<?php printf( esc_html( _nx( '%1$s comment', '%1$s comments', get_comments_number(), 'comments title', 'ohio' ) ),
								esc_html( number_format_i18n( get_comments_number() ) ) ); ?>
						</div>
						<a href="#comments">
							<span class="date"><?php esc_html_e('Join the Conversation', 'ohio') ?></span>
						</a>
					</li>
				<?php endif; ?>

            </ul>

            <?php
            $subtitle_text = ob_get_clean();
		}
	} elseif ( OhioSettings::page_is( 'project' ) ) {
		if ( ! $title_text ) {
			$title_text = '[' . get_the_date( get_option( 'date_format' ), $post->ID ) . ']';
		}
	} elseif ( OhioSettings::page_is( 'author' ) ) {
		$author = get_the_author();
		$title_text = ( $author ) ? $author : esc_html__( 'Undefined', 'ohio' );
		//$subtitle_text = esc_html__( 'Author', 'ohio' );
	} elseif ( OhioSettings::page_is( 'shop' ) ) {
		$title_text = get_the_title( isset($post->ID) ? $post->ID : false );
		if ( empty( $title_text ) ) {
			$title_text = __( 'Shop', 'ohio' );
		}
	} elseif ( OhioSettings::page_is( 'product_category' ) ) {
		global $wp_query;
		$cat = $wp_query->get_queried_object();
		$title_text = $cat->name;
		//$subtitle_text = esc_html__( 'Product category', 'ohio' );
	} elseif ( OhioSettings::page_is( 'product_tag' ) ) {
		global $wp_query;
		$cat = $wp_query->get_queried_object();
		$title_text = $cat->name;
		//$subtitle_text = esc_html__( 'Product tag', 'ohio' );
	} elseif ( is_404() ) {
		$title_text = esc_html__( 'Page not found!', 'ohio' );
	}

	$project = [];
	if ( OhioSettings::page_is( 'project' ) ) {
		$project = OhioObjectParser::parse_to_project_object( $post );
	}

	// Header previous button

	$previous_btn = OhioOptions::get_global( 'page_header_previous_button', true );

	$allowed_html = array(
		'a' => array(
			'href' => array(),
			'title' => array()
		),
		'br' => array(),
		'em' => array(),
		'b' => array(),
	);
?>

<div class="clb-page-headline<?php if ( ! $show_header_cap ) { echo ' without-cap'; } echo esc_attr( $full_height_class ) . esc_attr( $title_align_class ); ?> <?php echo esc_attr( !$sub_header ? 'subheader_excluded' : 'subheader_included' );?>
<?php echo esc_attr( $bg_parallax ? ' headline-with-parallax' : '' );?>">

	<?php if ( $bg_parallax ) : ?>
		<div class="parallax" data-parallax-bg="vertical" data-parallax-speed=".5">
			<div class="parallax-bg bg-image"></div>
			<div class="parallax-content"></div>
		</div>
	<?php else : ?>
		<div class="bg-image"></div>
	<?php endif ?>
	<div class="clb-page-headline-holder">
		<div class="page-container<?php if ( !$page_wrapped ) { echo esc_attr(' full'); } ?>">
			<?php if ( $previous_btn ): ?>
			    <?php get_template_part('parts/elements/back_link');?>
			<?php endif; ?>
			<div class="vc_row">
				<div class="vc_col-lg-12 animated-holder">
					<div class="post-meta">
						<?php
							/* translators: used between list items, there is a space after the comma */
							if (! is_home() && ! is_category() ) {
								$divider_class = '';
								if ( !OhioOptions::page_is( 'single' ) ) {
									$divider_class = 'no-divider';
								}

								$categories_list = get_the_category_list( ' ' );
								if ( $categories_list && ohio_categorized_blog() ) {
									$categories_list = preg_replace( '/(<a)(.+?>)/i', '$1 class="category" $2 ', $categories_list );
									printf( '<div class="category-holder %1$s">%2$s</div>', $divider_class, $categories_list ); // WPCS: XSS OK.
								}
							}
						?>

						<?php if ( OhioOptions::page_is( 'single' ) ): ?>
							<span class="post-meta-estimate">
								<?php echo OhioHelper::get_reading_estimate( $post->post_content ?? '' ) . ' ' . esc_html__( 'min read', 'ohio' ); ?>
							</span>
						<?php endif; ?>
						<?php if (OhioOptions::page_is( 'project' )): ?>
							<?php if ( $project['categories_plain'] ) : ?>
								<div class="category-holder">
									<?php $categories = explode( ', ', $project['categories_plain'] ) ?>
									<?php foreach ( $categories as $category ) : ?>
										<span class="category"><?php echo esc_html( $category ); ?></span>
									<?php endforeach; ?>
								</div>
							<?php endif; ?>

							<?php if ( $project['date'] ) : ?>
								<span class="date"><?php echo esc_html( $project['date'] ); ?></span>
							<?php endif; ?>
						<?php endif; ?>
					</div>
					<h1 class="clb-title"><?php echo wp_kses( $title_text, 'default' ); ?></h1>
					<?php if ( $subtitle_text && $show_header_subtitle ): ?>
						<div class="clb-post-meta"><?php echo wp_kses( $subtitle_text, 'post' ); ?></div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>