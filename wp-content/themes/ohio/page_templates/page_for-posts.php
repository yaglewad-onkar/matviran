<?php /* Template Name: Blog page */ ?>

<?php
	get_header();

	$show_breadcrumbs = OhioOptions::get( 'page_breadcrumbs_visibility', true );
	$page_wrapped = OhioOptions::get( 'page_add_wrapper', true );
	$add_content_padding = OhioOptions::get( 'page_add_top_padding', true );

	$categories_ids = [];
	$categories = OhioOptions::get_local( 'blog_categories' );
	if ( !empty( $categories[0] ) && is_object( $categories[0] ) ) {
		$categories_ids = array_map( function($v) { return $v->term_id; }, $categories );
		$categories = array_map( function($v) { return $v->slug; }, $categories );
	}

	$_tax_query = [];
	if ( !empty( $categories ) ) {
		$_tax_query = [[
			'taxonomy' => 'category',
			'field' => ( is_numeric( $categories[0] ) ) ? 'term_id' : 'slug',
			'terms' => $categories
		]];
	}

	$published_posts = (new WP_Query( [
		'post_type' => 'post',
		'post_status' => 'publish',
		'tax_query' => $_tax_query
	] ))->found_posts;

	$pagination_page = OhioHelper::get_current_pagenum();

	$posts_per_page = OhioSettings::posts_per_page();
	$posts_offset = ( $pagination_page - 1 ) * $posts_per_page;

	$pagination_position = OhioOptions::get( 'pagination_position', 'left' );

	$paginator_current = $pagination_page;
	$paginator_all = ceil( $published_posts / $posts_per_page );

	$posts_show_from = $posts_offset + 1;
	$posts_show_to = $posts_offset + $posts_per_page;
	if ( $posts_show_to > $published_posts ) {
		$posts_show_to = $published_posts;
	}

	$args = [
		'posts_per_page' => $posts_per_page,
		'offset' => $posts_offset,
		'category' => $categories_ids,
		'post_type' => 'post',
		'post_status' => 'publish',
		'suppress_filters' => false
	];
	$posts_array = get_posts( $args );

	$sidebar_position = OhioOptions::get( 'page_sidebar_position', 'left' );
	$sidebar_page_class = '';
	if ( $sidebar_position == 'left' ) {
		$sidebar_page_class = ' with-left-sidebar';
	}
	if ( $sidebar_position == 'right' ) {
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
		'category_visibility' => OhioOptions::get( 'posts_category_visibility', true ),
		'short_description_visibility' => OhioOptions::get( 'posts_short_description_visibility', true ),
		'read_more_visibility' => OhioOptions::get( 'posts_read_more_visibility', true ),
		'reading_time_visibility' => OhioOptions::get( 'posts_reading_time_visibility', true )
	);

	$posts_grid = OhioOptions::get( 'blog_page_layout', 'masonry' );
	if ( $posts_grid == 'masonry' ) {
		OhioHelper::add_required_script( 'masonry' );
	}
	$grid_style_class = ( $posts_grid == 'masonry' ) ? 'blog-posts-masonry ohio-masonry' : 'blog-posts-classic';

	$grid_offset_class = '';
	$posts_without_paddings = OhioOptions::get( 'grid_items_without_padding', false );
	if ( $posts_without_paddings ) {
		$grid_offset_class .= ' grid-offset';
	}

	$columns_num = OhioOptions::get_local( 'blog_columns_in_row' );

	$columns_in_row = explode( '-', $columns_num );
	if ( is_array( $columns_in_row ) ) {
		$columns_in_row = intval( $columns_in_row[0] );
	}

	$asymmetric_parallax = OhioOptions::get( 'grid_asymmetric_parallax', false );
	$asymmetric_atts = "";
	
	if ($asymmetric_parallax) {

		$asymmetric_parallax_speed = (int) OhioOptions::get( 'asymmetric_parallax_speed', 20, false, true );
		$asymmetric_atts = ' data-asymmetric-parallax-grid=true data-grid-number='. $columns_num .' data-asymmetric-parallax-speed='. $asymmetric_parallax_speed. '';
	}

	if ( $columns_num == "i-i-i" ) $columns_num = OhioOptions::get_global( 'blog_columns_in_row', '2-2-1' );
	$columns_num_global = OhioOptions::get_global( 'blog_columns_in_row', '2-2-1' );
	
	$posts_layout_item = OhioOptions::get( 'blog_item_layout_type', 'blog_grid_1' );

	if ( $posts_layout_item == 'blog_grid_6' ) {
		$grid_style_class .= ' no-margins';
	}

	$animation_type = OhioOptions::get( 'page_animation_type', 'default' );
	$animation_effect = OhioOptions::get( 'page_animation_effect', 'fade-up' );
	$animation_once = OhioOptions::get( 'page_animation_once' );

	if ( $posts_grid == 'blog_grid_1' ) { $columns_num = '2-2-1'; }

	$columns_class = OhioHelper::parse_columns_to_css( $columns_num, false, $columns_num_global );
	$columns_double_class = OhioHelper::parse_columns_to_css( $columns_num, true, $columns_num_global );

	$page_container_class = '';
	if ( !$show_breadcrumbs && $add_content_padding ) {
		$page_container_class .= ' top-offset';
	}
	if ( !$page_wrapped ) {
		$page_container_class .= ' full';
	}
	if ( $add_content_padding ) {
		$page_container_class .= ' bottom-offset';
	}

	$content_location = OhioOptions::get_global( 'post_content_position', 'top' );
?>

<?php get_template_part( 'parts/elements/page_headline' ); ?>

<?php get_template_part( 'parts/elements/breadcrumbs' ); ?>

<div class="page-container<?php echo esc_attr( $page_container_class ); ?>">
	<div id="primary" class="content-area">

		<?php if ( $sidebar_position == 'left' ) : ?>
		<div class="page-sidebar sidebar-left<?php echo esc_attr( $sidebar_class ); ?>">
			<aside id="secondary" class="widget-area">
				<?php dynamic_sidebar( 'ohio-sidebar-blog' ); ?>
			</aside>
		</div>
		<?php endif; ?>

		<div class="page-content<?php echo esc_attr( $sidebar_page_class ); ?>">
			<main id="main" class="site-main">

				<!-- Custom content -->
				<?php
				if ($content_location == 'top'):
					if(have_posts()) :
						echo '<div class="page_content blog_page_content">';
						while(have_posts()) : the_post();
							the_content();
						endwhile;
						echo '</div>';
					endif;
				endif;
				?>

				<div class="vc_row blog-posts-masonry <?php echo esc_attr( $grid_style_class . $grid_offset_class ); ?>" data-lazy-container="posts" <?php echo esc_attr($asymmetric_atts); ?>>
				<?php
				$_post_i = 0;
				foreach ( $posts_array as $post_index => $post ) {
					$post->metro = $metro_style;
					$_parsed_post = OhioObjectParser::parse_to_post_object( $post, NULL, $_post_i + 1 );
					$_parsed_post['metro_style'] = $metro_style;
					$_parsed_post['alignment'] = $alignment;
					$_parsed_post['hover_effect'] = $hover_effect;
					$_parsed_post['meta_visibility'] = $meta_visibility;
					$_parsed_post['boxed'] = $boxed;
					OhioHelper::set_storage_item_data( $_parsed_post );

					if ( $posts_layout_item == 'blog_grid_6' ) {
						$col_class = 'vc_col-lg-12 vc_col-md-12 vc_col-xs-12';
					} else {
						$col_class = $columns_class;
					}

					$grid_class = ' grid-item';

					if ( $posts_layout_item == 'blog_grid_6' ) {
						$grid_class .= ' no-paddings';
					}

					if ( $_parsed_post['grid_style'] == '2col' && !$posts_layout_item == 'blog_grid_6') {
						$col_class = $columns_double_class;
					}

					// Animation calculating
					$_anim_attrs = OhioHelper::get_AOS_animation_attrs( $animation_type, $animation_effect, (int) substr( $columns_num, 0, 1), $_post_i );

					echo '<div class="' . esc_attr( $col_class . $grid_class . ( ( $posts_grid == 'masonry' ) ? ' ohio-card-wrapper blog-post-masonry masonry-block' : '' ) ) . '" ' . implode( ' ', $_anim_attrs ) . ' data-lazy-item="" data-lazy-scope="posts">';

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

					$_post_i++;
				}
				?>
				</div>

				<?php

				if ( $paginator_all > 1 ) {
					$large_number = 10000000;
					$paginator_pattern = str_replace( $large_number, '{{page}}', get_pagenum_link( $large_number ) );
					$paginator_pattern .= ( parse_url( $paginator_pattern, PHP_URL_QUERY ) ? '&' : '?') . 'ohio_of=dynamic_css,header,footer,headline,breadcrumbs';
					switch ( OhioOptions::get( 'pagination_type', 'simple' ) ) {
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

				<!-- Custom content -->
				<?php
				if ($content_location == 'bottom'):
					if(have_posts()) :
						echo '<div class="page_content blog_page_content">';
						while(have_posts()) : the_post();
							the_content();
						endwhile;
						echo '</div>';
					endif;
				endif;
				?>

			</main>
		</div>

		<?php if ( $sidebar_position == 'right' ) : ?>
			<div class="page-sidebar sidebar-right<?php echo esc_attr( $sidebar_class ); ?>">
				<aside id="secondary" class="widget-area">
					<?php dynamic_sidebar( 'ohio-sidebar-blog' ); ?>
				</aside>
			</div>
		<?php endif; ?>
		
	</div>
</div>
<?php

	get_footer();
