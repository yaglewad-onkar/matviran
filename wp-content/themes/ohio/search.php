<?php
	get_header();

	// Settings
	$show_breadcrumbs = OhioOptions::get( 'page_breadcrumbs_visibility', true );
	$sidebar_position = OhioOptions::get( 'page_sidebar_position', 'left' );

	$sidebar_page_class = '';
	if ( $sidebar_position == 'left' ) {
		$sidebar_page_class = ' with-left-sidebar';
	} elseif ( $sidebar_position == 'right' ) {
		$sidebar_page_class = ' with-right-sidebar';
	}

	$sidebar_layout = OhioOptions::get( 'page_sidebar_layout', 'simple' );
	$sidebar_class = '';
	if ( $sidebar_layout ) {
		$sidebar_class .= ' sidebar-' . $sidebar_layout;
	}

	$metro_style = OhioOptions::get( 'blog_metro_style' );
	$boxed = OhioOptions::get( 'blog_items_boxed_style' );
	if ( !is_bool( $boxed ) ) {
		if ( $boxed == 'default' ) $boxed = false;
		else $boxed = true;
	}
	$alignment = OhioOptions::get( 'posts_text_alignment' );
	$hover_effect = OhioOptions::get( 'blog_item_hover_type', 'type1' );
	$meta_visibility = array(
		'author_visibility' => OhioOptions::get( 'posts_author_visibility', true ),
		'category_visibility' =>  OhioOptions::get( 'posts_category_visibility', true ),
		'short_description_visibility' => OhioOptions::get( 'posts_short_description_visibility', true ),
		'read_more_visibility' => OhioOptions::get( 'posts_read_more_visibility', true ),
		'reading_time_visibility' => OhioOptions::get( 'posts_reading_time_visibility', true )
	);

	$posts_grid = OhioOptions::get_global( 'blog_page_layout', 'masonry' );
	if ( $posts_grid == 'masonry' ) {
		OhioHelper::add_required_script( 'masonry' );
	}
	$grid_style_class = ( $posts_grid == 'masonry' ) ? 'ohio-masonry blog-posts-masonry' : 'blog-posts-classic';

	$posts_layout_item = OhioOptions::get_global( 'blog_item_layout_type', 'blog_grid_1' );

	if ( $posts_layout_item == 'blog_grid_6' ) {
		$grid_style_class .= ' no-margins';
	}

	$projects_layout_item = OhioOptions::get_global( 'project_item_layout_type', 'grid_1' );
	if ( $projects_layout_item != 'grid_2') {
		$projects_layout_item = 'grid_1';
	}

	$project_animation_type = OhioOptions::get_global( 'portfolio_page_animation_type' );
	$project_animation_effect = OhioOptions::get_global( 'portfolio_page_animation_effect' );
	$open_in_popup = OhioOptions::get_global( 'portfolio_projects_in_popup' );
	$metro_style = OhioOptions::get_global( 'portfolio_metro_style', false );

	$columns_num = OhioOptions::get_global( 'blog_columns_in_row', '2-2-1' );
	// if ( $posts_grid == 'classic' ) {
	// 	$columns_num = '1-1-1';
	// }
	// if ( $posts_layout_item == 'striped' ) {
	// 	$columns_num = '1-1-1';
	// }

	$columns_class = OhioHelper::parse_columns_to_css( $columns_num, false );
	$columns_double_class = OhioHelper::parse_columns_to_css( $columns_num, true );

   	$grid_offset_class = '';
    $posts_without_paddings = OhioOptions::get( 'grid_items_without_padding', false );
    if ( $posts_without_paddings ) {
        $grid_offset_class .= ' grid-offset';
    }

	$page_wrapped = OhioOptions::get( 'page_add_wrapper', true );

	// Pagination
	$published_posts = $GLOBALS['wp_query']->found_posts;

	$pagination_page = OhioHelper::get_current_pagenum();

	$posts_per_page = OhioSettings::posts_per_page();

	$posts_offset = ( $pagination_page - 1 ) * $posts_per_page;
	$paginator_all = ceil( $published_posts / (int) $posts_per_page );

	$pagination_type = OhioOptions::get( 'pagination_type', 'simple' );
	$pagination_position = OhioOptions::get( 'pagination_position', 'left' );

	if ( $published_posts > 0 ) :
?>

<?php get_template_part( 'parts/elements/page_headline' ); ?>

<?php get_template_part( 'parts/elements/breadcrumbs' ); ?>

<div class="page-container bottom-offset<?php if ( !$show_breadcrumbs ) { echo ' top-offset'; } if ( !$page_wrapped ) { echo ' full'; } ?>">
	<div id="primary" class="content-area">
		
		<?php if ( $sidebar_position == 'left' ) : ?>
		<div class="page-sidebar sidebar-left<?php echo esc_attr($sidebar_class); ?>">
			<aside id="secondary" class="widget-area">
				<?php dynamic_sidebar( 'ohio-sidebar-blog' ); ?>
			</aside>
		</div>
		<?php endif; ?>

		<div class="page-content<?php echo esc_attr( $sidebar_page_class ); ?>">
			<main id="main" class="site-main">
				<div class="vc_row search-page <?php echo esc_attr( $grid_style_class ); ?>" data-lazy-container="posts">
				<?php
				global $wp_query;
					$_post_i = 0;

					// Portfolio Grid
					
					while ( have_posts() ) : the_post();
						switch ( $post->post_type ) {
							case 'ohio_portfolio': // projects
								$parsed_post = OhioObjectParser::parse_to_project_object( $post, NULL, $_post_i + 1 );
								$parsed_post['in_popup'] = $open_in_popup;

								$parsed_post['metro_style'] = $metro_style;
								OhioHelper::set_storage_item_data( $parsed_post );

								$col_class = $columns_class;
								$grid_class = ' grid-item';

								if ( $parsed_post['grid_style'] == '2col' ) {
									$col_class = $columns_double_class;
								}

								// Animation calculating
								$_anim_attrs = '';

								echo '<div class="' . esc_attr( $col_class . $grid_class . $grid_offset_class ) . ' masonry-block blog-post-masonry" ' . esc_attr( $_anim_attrs ) . ' data-lazy-item="" data-lazy-scope="posts">';
								switch ( $projects_layout_item ) {
									case 'grid_1':
										get_template_part( 'parts/portfolio_grid/portfolio_layout_type_1' );
										break;
									case 'grid_2':
										get_template_part( 'parts/portfolio_grid/portfolio_layout_type_2' );
										break;
									case 'grid_3':
										get_template_part( 'parts/portfolio_grid/portfolio_layout_type_3' );
										break;
									case 'grid_4':
										get_template_part( 'parts/portfolio_grid/portfolio_layout_type_4' );
										break;
									case 'grid_5':
										get_template_part( 'parts/portfolio_grid/portfolio_layout_type_5' );
										break;
									case 'grid_6':
										get_template_part( 'parts/portfolio_grid/portfolio_layout_type_6' );
										break;
									case 'grid_7':
										get_template_part( 'parts/portfolio_grid/portfolio_layout_type_7' );
										break;
									case 'grid_8':
										get_template_part( 'parts/portfolio_grid/portfolio_layout_type_8' );
										break;
									default:
										get_template_part(  'parts/portfolio_grid/portfolio_layout_type_1' );
										break;
								}

								if ( $open_in_popup ) {
									OhioHelper::set_storage_item_data( $parsed_post );
									ob_start();
									get_template_part( 'parts/portfolio_grid/lightbox' );
									OhioLayout::append_to_footer_buffer_content( ob_get_clean() );
								}

								echo '</div>';
								break;
							
							default: // default post or undefined custom
								$post->metro = $metro_style;
								$parsed_post = OhioObjectParser::parse_to_post_object( $post, NULL, $_post_i + 1 );
								$parsed_post['metro_style'] = $metro_style;
								$parsed_post['boxed'] = $boxed;
								$parsed_post['alignment'] = $alignment;
								$parsed_post['hover_effect'] = $hover_effect;
								$parsed_post['meta_visibility'] = $meta_visibility;
								OhioHelper::set_storage_item_data( $parsed_post );
								
								if ( $posts_layout_item == 'blog_grid_6' ) {
									$col_class = 'vc_col-lg-12 vc_col-md-12 vc_col-xs-12';
								} else {
									$col_class = $columns_class;
								}

								$grid_class = ' grid-item';

								if ( $posts_layout_item == 'blog_grid_6' ) {
									$grid_class .= ' no-paddings';
								}

								if ( $parsed_post['grid_style'] == '2col' ) {
									$col_class = $columns_double_class;
								}

								// Animation calculating
								$_anim_attrs = OhioHelper::get_AOS_animation_attrs( $parsed_post['animation_type'], $parsed_post['animation_effect'], (int) substr( $columns_num, 0, 1), $_post_i );

								echo '<div class="' . esc_attr( $col_class . $grid_class . ( ( $posts_grid == 'masonry' ) ? ' masonry-block blog-post-masonry' : '' ) ) . '" ' . implode( ' ', $_anim_attrs ) . ' data-lazy-item="" data-lazy-scope="posts">';

								switch ( $posts_layout_item ) {
									case 'blog_grid_1':
										get_template_part( 'parts/blog_grid/layout_type1' );
										break;
									case 'blog_grid_2':
										get_template_part( 'parts/blog_grid/layout_type2' );
										break;
									case 'blog_grid_3':
										get_template_part( 'parts/blog_grid/layout_type3' );
										break;
									case 'blog_grid_4':
										get_template_part( 'parts/blog_grid/layout_type4' );
										break;
									case 'blog_grid_5':
										get_template_part( 'parts/blog_grid/layout_type5' );
										break;
	                                case 'blog_grid_6':
	                                    get_template_part( 'parts/blog_grid/layout_type6' );
	                                    break;
									default:
										get_template_part( 'parts/blog_grid/layout_type1' );
										break;
								}
								echo '</div>';
								break;
						}
						$_post_i++;

					endwhile;
					wp_reset_query();
				?>
				</div>


				<?php
					if ( $paginator_all > 1 ) {
						$large_number = 10000000;
						$paginator_pattern = str_replace( $large_number, '{{page}}', get_pagenum_link( $large_number ) );
						$paginator_pattern .= ( parse_url( $paginator_pattern, PHP_URL_QUERY ) ? '&' : '?') . 'ohio_of=dynamic_css,header,footer,headline,breadcrumbs';
						switch ( $pagination_type ) {
							case 'simple':
								OhioLayout::the_paginator_layout( $pagination_page, $paginator_all, $pagination_position );
								break;
							case 'standard':
								echo '<div class="pagination-standard">';
								OhioLayout::the_paginator_layout( $pagination_page, $paginator_all, $pagination_position );
								echo '</div>';
								break;
							case 'lazy_scroll':
								echo '<div class="lazy-load loading font-titles text-' . $pagination_position . '" data-lazy-load="scroll" data-lazy-pages-count="' . esc_attr( $paginator_all ) . '" data-lazy-load-url-pattern="' . esc_attr( $paginator_pattern ) . '" data-lazy-load-scope="posts">';
								echo '<span class="btn-round btn-round-light" tabindex="0"><i class="ion ion-md-sync"></i></span>';
								echo '<span class="loading-text">' . esc_html__( 'Loading', 'ohio' ) . '</span>';
								echo '</div>';
								break;
							case 'lazy_button':
								echo '<div class="lazy-load load-more font-titles text-' . $pagination_position . '" data-lazy-load="click" data-lazy-pages-count="' . esc_attr( $paginator_all ) . '" data-lazy-load-url-pattern="' . esc_attr( $paginator_pattern ) . '" data-lazy-load-scope="posts">';
								echo '<span class="btn-round btn-round-light" tabindex="0"><i class="ion ion-md-sync"></i></span>';
								echo '<span class="loadmore-text">' . esc_html__( 'Load More', 'ohio' ) . '</span>';
								echo '<span class="loading-text">' . esc_html__( 'Loading', 'ohio' ) . '</span>';
								echo '</div>';
								break;
							}
						}
				?>
			</main><!-- #main -->
		</div>

		<?php if ( $sidebar_position == 'right' ) : ?>
		<div class="page-sidebar sidebar-right<?php echo esc_attr($sidebar_class); ?>">
			<aside id="secondary" class="widget-area">
				<?php dynamic_sidebar( 'ohio-sidebar-blog' ); ?>
			</aside>
		</div>
		<?php endif; ?>

	</div><!-- #primary -->
</div>

<?php else : ?>
	<?php get_template_part( 'parts/content', 'none' ); ?>
<?php endif; ?>

<?php
	get_footer();
