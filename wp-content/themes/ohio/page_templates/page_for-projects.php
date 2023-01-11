<?php /* Template Name: Portfolio page */ ?>

<?php
	global $post;

	$GLOBALS['ohio_icon_fonts'][] = 'my-icon-arr-out';
	OhioHelper::add_required_script( 'masonry' );
	OhioHelper::add_required_script( 'isotope' );

	get_header();

	$pagination_page = OhioHelper::get_current_pagenum();
	$projects_per_page = (int)OhioOptions::get( 'portfolio_projects_per_page', 12, false, true );
	$projects_offset = ( $pagination_page - 1 ) * $projects_per_page;

	$args = [
		'posts_per_page' => $projects_per_page,
		'offset' => $projects_offset,
		'post_type' => 'ohio_portfolio',
		'post_status' => 'publish',
		'tax_query' => []
	];

	$allowed_categories_ids = [];
	$allowed_categories = OhioOptions::get( 'portfolio_categories', [] );
	if ( !empty( $allowed_categories[0] ) && is_object( $allowed_categories[0] ) ) {
		$allowed_categories_ids = array_map( function($v) { return $v->term_id; }, $allowed_categories );
		$allowed_categories = array_map( function($v) { return $v->slug; }, $allowed_categories );
	}

	if ( is_array( $allowed_categories ) && count( $allowed_categories ) > 0 ) {
		$args['tax_query'] = [[
			'taxonomy' => 'ohio_portfolio_category',
			'field' => ( is_numeric( $allowed_categories[0] ) ) ? 'term_id' : 'slug',
			'terms' => $allowed_categories
		]];
	}

	$projects_array = get_posts( $args );

	// Projects count
	$published_projects = (new WP_Query( [
		'post_type' => 'ohio_portfolio',
		'post_status' => 'publish',
		'tax_query' => $args['tax_query']
	] ))->found_posts;

	if ( ! $projects_per_page || $projects_per_page < 1 ) {
		$projects_per_page = 1;
	}
	$paginator_all = ceil( $published_projects / $projects_per_page );
	$pagination_type = OhioOptions::get( 'pagination_type', 'simple' );
	$pagination_position = OhioOptions::get( 'pagination_position', 'left' );

	$show_breadcrumbs = OhioOptions::get( 'page_breadcrumbs_visibility', true );
	$page_wrapped = OhioOptions::get( 'page_add_wrapper', true );
	$add_content_padding = OhioOptions::get( 'page_add_top_padding', true );

	// Filter
	$show_filter = OhioOptions::get( 'project_page_filter_visibility', true );
	$filter_align = OhioOptions::get( 'project_filter_align', 'center' );

	$filter_align_class = '';
	switch ( $filter_align ) {
		case 'left':
			$filter_align_class = ' text-left';
			break;
		case 'right':
			$filter_align_class = ' text-right';
			break;
	}

	$filter_is_paged = ($paginator_all > 1) && in_array($pagination_type, ['simple', 'standard']);

	// Popup
	$open_in_popup = OhioOptions::get_global( 'portfolio_projects_in_popup' );
	$show_view_link_in_popup = OhioOptions::get( 'portfolio_lightbox_link', true );
	$metro_style = OhioOptions::get( 'portfolio_metro_style', false );


	// Pagintaion results
	$projects_show_from = ( $projects_offset + 1 <= $published_projects ) ? $projects_offset + 1 : $published_projects ;
	$projects_show_to = $projects_offset + $projects_per_page;
	if ( $projects_show_to > $published_projects ) {
		$projects_show_to = $published_projects;
	}

	// Animation type & effect
	$animation_type = OhioOptions::get( 'page_animation_type' );
	$animation_effect = OhioOptions::get( 'page_animation_effect' );
	$animation_once = OhioOptions::get( 'page_animation_once' );

	// Sidebar
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

	// Portfolio grid paddings
	$grid_item_style_class = '';
	$hover_effect = OhioOptions::get( 'portfolio_grid_hover' );

	$boxed_classes = '';
	$boxed = OhioOptions::get( 'portfolio_items_boxed_style', true );
	if ( $boxed ) {
		$boxed_classes = 'boxed';
	}

	$grid_offset_class = '';
	$posts_without_paddings = OhioOptions::get( 'grid_items_without_padding', false );
	if ( $posts_without_paddings ) {
		$grid_offset_class .= ' grid-offset';
	}

	// Page container class
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

	// Columns classes
	$columns_num = OhioOptions::get_local( 'portfolio_columns_in_row' );
	
	if ( $columns_num == 'i-i-i') {
		$columns_num = OhioOptions::get_global( 'portfolio_columns_in_row' );
	}

	$columns_num_global = OhioOptions::get_global( 'portfolio_columns_in_row' );
	if ( ! $columns_num_global ) {
		$columns_num_global = '2-2-1';
	}

	$columns_class = OhioHelper::parse_columns_to_css( $columns_num, false, $columns_num_global );
	$columns_double_class = OhioHelper::parse_columns_to_css( $columns_num, true, $columns_num_global );

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

	// Portfolio layout type
	$projects_layout_item = OhioOptions::get( 'portfolio_item_layout_type', 'grid_1' );
	$content_location = OhioOptions::get_global( 'portfolio_content_position', 'top' );

	// Slider layouts
	$is_slider = false;

	switch ( $projects_layout_item ) {
		case 'grid_3':
		case 'grid_4':
		case 'grid_5':
		case 'grid_6':
		case 'grid_7':
		case 'grid_9':
		case 'grid_10':
			$is_slider = true;
			break;
	}

	if ( $projects_layout_item == 'grid_8' || $projects_layout_item == 'grid_12' ) {
		$grid_item_style_class .= '  ';
	}

	if ( $is_slider ) {
		$navBtn = OhioOptions::get( 'portfolio_nav_visibility' );
		$loop = OhioOptions::get( 'portfolio_loop_mode' );
		$autoplay = OhioOptions::get( 'portfolio_autoplay_mode' );
		$autoplayTimeout = OhioOptions::get( 'portfolio_autoplay_interval', '', NULL, true );
		$mousewheel = OhioOptions::get( 'portfolio_mousewheel_mode' );
		$dragscroll = OhioOptions::get( 'portfolio_dragscroll_mode', true );
		$pagination = OhioOptions::get( 'portfolio_bullets_visibility', true );
		$tilt_effect = OhioOptions::get( 'portfolio_tilt_effect', true );

		$slider_pagination_data = '';
		if ($pagination) {
			$slider_pagination_type = OhioOptions::get( 'portfolio_bullets_type' );

			if ($slider_pagination_type == 'bullets') {
				$slider_pagination_data = 'data-slider-dots="true"';
			} else {
				$slider_pagination_data = 'data-slider-pagination="true"';
			}
		}
		if ( $projects_layout_item === 'grid_6' ) {
			$slider_columns = OhioOptions::get( 'portfolio_columns_in_row' );
			$slider_columns_global = OhioOptions::get_global( 'portfolio_columns_in_row' );
			for ( $i = 0; $i < strlen( $slider_columns ); $i++ ) {
				if ( $slider_columns[$i] === 'i' ) $slider_columns[$i] = $slider_columns_global[$i];
			}
		}
	}

	$video_button_style = OhioOptions::get( 'portfolio_video_button_style', 'default' );
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

				<!-- Custom Content -->
				<?php
				if ($content_location == 'top'):
					if(have_posts()) :
						echo '<div class="page_content portfolio_page_content">';
						while(have_posts()) : the_post();
							the_content();
						endwhile;
						echo '</div>';
					endif;
				endif;
				?>
				
				<!-- Grid Layout -->
				<?php if ( ! $is_slider ) : ?>
					<?php 
						$grid_attr = '';					
						if ($projects_layout_item == 'grid_8') {
							$grid_attr .= "data-interactive-links-grid=true";
						}
					?>

					<div class="<?php echo esc_attr($projects_layout_item); ?>" data-ohio-portfolio-grid="true" <?php echo esc_attr($grid_attr) ?>>
						
							<?php if ($projects_layout_item == 'grid_8' || $projects_layout_item == 'grid_12'): ?>

								<div class="portfolio-grid-images interactive-links-grid-images"<?php if ($projects_layout_item == 'grid_8'): ?>data-vc-full-width="true" data-vc-stretch-content="true"<?php endif; ?>>
								</div>

							<?php endif; ?>

							<?php if ( $show_filter) : ?>
								<?php
									$cat_ids = get_terms( [
										'taxonomy' => 'ohio_portfolio_category',
										'include' => $allowed_categories_ids
									] );
								?>
								<?php if ( is_array( $cat_ids ) && $cat_ids ) : ?>
									<div class="portfolio-sorting<?php echo esc_attr( $filter_align_class ); ?>" 
										data-filter="portfolio" 
										<?php if ($filter_is_paged) { echo 'data-filter-paged="true"'; } ?>>

										<ul class="unstyled">
											<li><?php esc_html_e( 'Filter by', 'ohio' ) ?></li>
											<li>
											
												<a class="active" href="#all" data-isotope-filter="*" data-category-count="<?php echo str_pad( (string)$published_projects, 2, '0', STR_PAD_LEFT ); ?>">
													<span class="name"><?php esc_html_e( 'All', 'ohio' ); ?></span>
													<span class="num"><?php echo str_pad( (string)$published_projects, 2, '0', STR_PAD_LEFT ); ?></span>
												</a>
											</li>
											<?php foreach ( $cat_ids as $cat_obj ) : ?>
												<li> /
													<a href="#<?php echo esc_attr( $cat_obj->slug ); ?>" data-isotope-filter=".ohio-filter-project-<?php echo hash( 'md4', $cat_obj->slug, false ); ?>" data-category-count="<?php echo esc_attr($cat_obj->count);?>">
														<span class="name"><?php echo esc_html( $cat_obj->name ); ?></span>
														<span class="num"><?php echo str_pad( (string)esc_html( $cat_obj->count ), 2, '0', STR_PAD_LEFT ); ?></span>
													</a>
												</li>
											<?php endforeach; ?>
										</ul>

									</div>
								<?php endif; ?>
							<?php endif; ?>

							<?php if ( $projects_layout_item == 'grid_12'): ?>

							<div class="portfolio-grid-holder">

							<?php endif; ?>

							<div class="portfolio-grid vc_row<?php echo esc_attr( $grid_item_style_class . $grid_offset_class ); ?>" data-lazy-container="projects" data-isotope-grid="true" data-projects-per-page="<?php echo esc_attr($projects_per_page) ?>" <?php echo esc_attr($asymmetric_atts); ?> data-tilt-effect="true">
							<?php

							$_post_i = 0;
							foreach ( $projects_array as $_project_index => $_project_object ) {

								$ohio_project = OhioObjectParser::parse_to_project_object( $_project_object );
								$ohio_project['in_popup'] = $open_in_popup;
								if( $projects_layout_item == 'grid_1' || $projects_layout_item == 'grid_2' || $projects_layout_item == 'grid_11' || $projects_layout_item == 'grid_12'){
									$ohio_project['boxed'] = $boxed_classes;
									$ohio_project['hover_effect'] = $hover_effect;
									$ohio_project['metro_style'] = $metro_style;
									$ohio_project['video_button_style'] = $video_button_style;
								}
								OhioHelper::set_storage_item_data( $ohio_project );

								$col_class = '';

								if ($projects_layout_item != 'grid_8' && $projects_layout_item != 'grid_12') {
									$col_class = $columns_class;
									
									if ( $ohio_project['grid_style'] == '2col') {
										$col_class = $columns_double_class;
										$col_class .= ' double-width';
									}	
								}

								

								// Animation calculating
								$_anim_attrs = OhioHelper::get_AOS_animation_attrs( $animation_type, $animation_effect, (int) substr( $columns_in_row, 0, 1), $_post_i );

								echo '<div class="portfolio-item-wrap masonry-block' . esc_attr( $col_class ) . ' ohio-project-item ' . 'grid-item section ' . esc_attr( $ohio_project['categories_group'] ) . '" data-lazy-item="" data-lazy-scope="projects" >';

								if ( $_anim_attrs ) echo '<div' . implode( ' ', $_anim_attrs ) . '>';

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
									case 'grid_9':
										get_template_part( 'parts/portfolio_grid/portfolio_layout_type_9' );
										break;
									case 'grid_10':
										get_template_part( 'parts/portfolio_grid/portfolio_layout_type_10' );
										break;
									case 'grid_11':
										get_template_part( 'parts/portfolio_grid/portfolio_layout_type_11' );
										break;
									case 'grid_12':
										get_template_part( 'parts/portfolio_grid/portfolio_layout_type_12' );
										break;
									default:
										get_template_part(  'parts/portfolio_grid/portfolio_layout_type_1' );
										break;
								}
								echo '</div>';

								if ( $open_in_popup ) {
									$ohio_project['show_view_link_in_popup'] = $show_view_link_in_popup;
									
									ob_start();
									OhioHelper::set_storage_item_data( $ohio_project );
									get_template_part( 'parts/portfolio_grid/lightbox' );
									OhioLayout::append_to_footer_buffer_content( ob_get_clean() );
								}

								$_post_i++;

								if ( $_anim_attrs ) echo '</div>';
							}

							?>
							</div>
							
							<?php if ( $projects_layout_item == 'grid_12'): ?>
								<div class="portfolio-grid-holder-underline"></div>
							</div>

							<?php endif; ?>
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
											echo '<div class="lazy-load loading font-titles text-' . $pagination_position . '" data-lazy-load="scroll" data-lazy-pages-count="' . esc_attr( $paginator_all ) . '" data-lazy-load-url-pattern="' . esc_attr( $paginator_pattern ) . '" data-lazy-load-scope="projects">';
											echo '<span class="btn-round btn-round-light" tabindex="0"><i class="ion ion-md-sync"></i></span>';
											echo '<span class="loading-text">' . esc_html__( 'Loading', 'ohio' ) . '</span>';
											echo '</div>';
											break;
										case 'lazy_button':
											echo '<div class="lazy-load load-more font-titles text-' . $pagination_position . '" data-lazy-load="click" data-lazy-pages-count="' . esc_attr( $paginator_all ) . '" data-lazy-load-url-pattern="' . esc_attr( $paginator_pattern ) . '" data-lazy-load-scope="projects">';
											echo '<span class="btn-round btn-round-light" tabindex="0"><i class="ion ion-md-sync"></i></span>';
											echo '<span class="loadmore-text">' . esc_html__( 'Load More', 'ohio' ) . '</span>';
											echo '<span class="loading-text">' . esc_html__( 'Loading', 'ohio' ) . '</span>';
											echo '</div>';
											break;
									}
								}
							?>
	
					</div>
				<?php endif; ?>

				<!-- Slider Layout -->

				<?php if ( $is_slider ) : ?>
					<?php 
						switch ( $projects_layout_item ) {
							case 'grid_9':
								$scroll_bar_push = 'vc_col-md-5 vc_col-md-push-7';
								break;
							default:
								$scroll_bar_push = '';
								break;
						}
					?>

					<div class="vc_row wpb_row vc_row-fluid vc_row-no-padding portfolio-onepage-slider clb-slider-scroll-bar <?php echo esc_attr($projects_layout_item); ?>" 
						data-portfolio-grid-slider="true" 
						data-vc-full-width="true" 
						data-vc-stretch-content="true" 
						data-slider-navigation="<?php echo esc_attr($navBtn);?>" 
						data-slider-loop="<?php echo esc_attr($loop);?>" 
						data-slider-mousescroll="<?php echo esc_attr($mousewheel);?>" 
						data-slider-dragcroll="<?php echo esc_attr($dragscroll);?>"
						data-slider-autoplay="<?php echo esc_attr($autoplay);?>" 
						data-slider-autoplay-time="<?php echo esc_attr($autoplayTimeout);?>" 
						data-slider-autoplay-pause="<?php echo esc_attr($slider_pagination_data);?>" 
						data-slider-columns="<?php if ( $projects_layout_item === 'grid_6') echo esc_attr($slider_columns);?>"
						<?php echo esc_attr($slider_pagination_data);?>
						data-tilt-effect="<?php echo esc_attr($tilt_effect);?>">

						<?php 
							$_post_i = 0;
							$_prev_item_featured_image = '';
							foreach ( $projects_array as $_project_index => $_project_object ) {
								$ohio_project = OhioObjectParser::parse_to_project_object( $_project_object );
								$ohio_project['in_popup'] = $open_in_popup;
								$ohio_project['video_button_style'] = $video_button_style;
								if ($_project_index == 0) {
									$_last_project = OhioObjectParser::parse_to_project_object( $projects_array[count($projects_array) - 1] );
									$ohio_project['prev_item_featured_image'] = $_last_project['featured_image'];
								} else {
									$ohio_project['prev_item_featured_image'] = $_prev_item_featured_image;
								}
								$_prev_item_featured_image = $ohio_project['featured_image'];
								OhioHelper::set_storage_item_data( $ohio_project );

								switch ( $projects_layout_item ) {
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
									case 'grid_9':
										get_template_part( 'parts/portfolio_grid/portfolio_layout_type_9' );
										break;
									case 'grid_10':
										get_template_part( 'parts/portfolio_grid/portfolio_layout_type_10' );
										break;
								}

								if ( $open_in_popup ) {
									$ohio_project['show_view_link_in_popup'] = $show_view_link_in_popup; 
									ob_start();
									OhioHelper::set_storage_item_data( $ohio_project );
									get_template_part( 'parts/portfolio_grid/lightbox' );
									OhioLayout::append_to_footer_buffer_content( ob_get_clean() );
								}
							}
						?>
					</div>
					<!-- Scroll label -->
					<div class="scroll-bar-container">
						<div class="page-container">
							<div class=" <?php echo esc_attr($scroll_bar_push) ?>">
								<div class="clb-scroll-top clb-slider-scroll-top vc_hidden-md vc_hidden-sm vc_hidden-xs">
									<div class="clb-scroll-top-bar">
										<div class="scroll-track"></div>
									</div>
									<div class="clb-scroll-top-holder font-titles">
										<?php esc_html_e( 'Scroll', 'ohio' ); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php endif; ?>

				<!-- Custom content -->
				<?php if ($content_location == 'bottom'):
					if(have_posts()) :
						echo '<div class="page_content portfolio_page_content">';
						while(have_posts()) : the_post();
							the_content();
						endwhile;
						echo '</div>';
					endif;
				endif; ?>

			</main>
		</div>

		<?php if ( $sidebar_position == 'right' ) : ?>
		<div class="page-sidebar sidebar-right<?php echo esc_attr( $sidebar_class ); ?>">
			<aside id="secondary" class="widget-area">
				<?php dynamic_sidebar( 'ohio-sidebar-blog' ); ?>
			</aside>
		</div>
		<?php endif; ?>

	</div><!-- #primary -->
</div><!--.page-container-->

<?php

	get_footer();
