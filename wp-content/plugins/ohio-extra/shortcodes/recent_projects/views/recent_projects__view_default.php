<?php OhioHelper::add_required_script( 'isotope' ); ?>

<?php 
	$filter_is_paged = ($query->max_num_pages > 1) && in_array($pagination_type, ['simple', 'standard']);

	$grid_attr = '';				
	if ( $card_layout == 'grid_8' ) {
		$grid_attr .= "data-interactive-links-grid=true";
	}

	if ( $is_slider ) {
		$slider_columns = '';
		if ( $card_layout === 'grid_6' ) {
			$slider_columns = $columns_in_row;
		}

		$scroll_bar_push = '';
		if ( $card_layout === 'grid_9' ) {
			$scroll_bar_push = 'vc_col-md-5 vc_col-md-push-7';
		}
	}
?>

<?php if( $is_slider ) : ?>
	<div class="scroll-bar-container <?php echo esc_attr($card_layout) ?>">
		<div class="page-container">
			<div class=" <?php echo esc_attr($scroll_bar_push) ?>">
				<div class="clb-scroll-top clb-slider-scroll-top vc_hidden-md vc_hidden-sm vc_hidden-xs">
					<div class="clb-scroll-top-bar">
						<div class="scroll-track"></div>
					</div>
					<div class="clb-scroll-top-holder font-titles">
						<?php esc_html_e( 'Scroll', 'ohio-extra' ); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>

<div data-ohio-portfolio-grid="true" id="<?php echo $recent_projects_uniqid; ?>" class="ohio-recent-projects-sc <?php echo esc_attr($card_layout); ?> <?php if ( $card_layout == 'grid_8' || $card_layout == 'grid_12' ) { echo esc_attr($fullscreen_classes); } ?>"
	<?php if ( $appearance_effect != 'none' ) { echo ' data-aos="' . $appearance_effect . '"'; } ?>
	<?php if ( $appearance_duration ) { echo ' data-aos-duration="' . intval( $appearance_duration ) . '"'; } ?>
	<?php if ( $appearance_delay ) echo ' data-aos-delay="' . $appearance_delay . '"'; ?>
	<?php if ( !$appearance_once ) echo ' data-aos-once="true"'; ?>
	<?php echo esc_attr($grid_attr); ?>>

	<?php if ( $card_layout == 'grid_8' || $card_layout == 'grid_12' ): ?>
		<div class="portfolio-grid-images interactive-links-grid-images" 
		<?php if ($card_layout == 'grid_8'): ?>
			data-vc-full-width="true" data-vc-stretch-content="true" 
		<?php endif; ?>>
		</div>
	<?php endif; ?>

	<!-- Filters -->
	<?php if ( $show_projects_filter && !$is_slider) : ?>
		<?php
			if ( is_array( $projects_category ) ) {
				if ( is_string( $projects_category[0] ) ) {
					$cat_ids = get_terms( array( 'taxonomy' => 'ohio_portfolio_category', 'slug' => $projects_category ) );
				} else {
					$cat_ids = get_terms( array( 'taxonomy' => 'ohio_portfolio_category', 'include' => $projects_category ) );
				}
			} else {
				$cat_ids = get_terms( array( 'taxonomy' => 'ohio_portfolio_category' ) );
			}
			if ( is_array( $cat_ids ) && $cat_ids ) :
		?>
		<div class="portfolio-sorting<?php echo esc_attr( $filter_align_class ); ?>" 
			data-filter="portfolio"
			<?php if ($filter_is_paged) { echo 'data-filter-paged="true"'; } ?>>

			<ul class="unstyled">
				<li><?php esc_html_e( 'Filter by', 'ohio-extra' ) ?></li>
				<li>
                    <a class="active" href="#all" data-isotope-filter="*" data-category-count="<?php echo str_pad( (string)$all_projects_count, 2, '0', STR_PAD_LEFT ); ?>">
                        <span class="name"><?php esc_html_e( 'All', 'ohio-extra' ); ?></span>
                        <span class="num"><?php echo str_pad( (string)$all_projects_count, 2, '0', STR_PAD_LEFT ); ?></span>
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

	<?php
		$items_per_page = intval( $pagination_items_per_page );

		$asymmetric_atts = "";
		$_columns_in_row = (int) substr( $columns_in_row, 0, 1 );
	?>
	<?php if( !$is_slider ) : ?>

	<?php if ( $card_layout == 'grid_12' ): ?>
	<div class="portfolio-grid-holder">
	<?php endif; ?>

		<div class="vc_row <?php echo implode( ' ', $wrap_classes ) ?> portfolio-grid" data-isotope-grid="true" data-lazy-container="projects" data-tilt-effect="true" <?php echo esc_attr($asymmetric_atts); ?> data-projects-per-page="<?php echo esc_attr($projects_in_block); ?>">

			<?php
				$_post_start = 0;
				$_post_end = count( $projects_data );
				$_prev_item_featured_image = '';
			?>

			<?php for ( $_post_i = $_post_start; $_post_i < $_post_end; $_post_i++ ) : ?>
			<?php
				$_project_object = $projects_data[$_post_i];
				$_project_object->image_size = $portfolio_images_size;
				$ohio_project = OhioObjectParser::parse_to_project_object( $_project_object );
				$ohio_project['metro_style'] = $metro_style;
				$ohio_project['in_popup'] = $lightbox_visibility;
				$ohio_project['video_button_style'] = $video_button_style;
				if ($_post_i == 0) {
					$_last_project = OhioObjectParser::parse_to_project_object( $projects_data[$_post_end - 1] );
					$ohio_project['prev_item_featured_image'] = $_last_project['featured_image'];
				} else {
					$ohio_project['prev_item_featured_image'] = $_prev_item_featured_image;
				}
				$_prev_item_featured_image = $ohio_project['featured_image'];
				if ( $card_layout == 'grid_1' || $card_layout == 'grid_2' || $card_layout == 'grid_11'){
					$ohio_project['boxed'] = $boxed_classes;
					$ohio_project['hover_effect'] = $hover_effect;
				}
				OhioHelper::set_storage_item_data( $ohio_project );
				$col_class = '';
				if ($card_layout != 'grid_8' && $card_layout != 'grid_12') {
					$col_class = $column_class;
					if ( $ohio_project['grid_style'] == '2col') {
						$col_class = $column_double_class;
						$col_class .= ' double-width';
					}
				}

				// Animation calculating
				echo '<div class="portfolio-item-wrap masonry-block' . ' grid-item' . $col_class . ( ( $projects_solid ) ? ' post-offset' : '' ) . ' ohio-project-item ' . $ohio_project['categories_group'] . '" data-lazy-item="" data-lazy-scope="projects">';

				$_anim_attrs = OhioHelper::get_AOS_animation_attrs( $animation_type, $animation_effect, (int) substr( $columns_in_row, 0, 1), $_post_i );
				if ( $_anim_attrs ) echo '<div ' .implode( ' ', $_anim_attrs ) . '>';

				switch ( $card_layout ) {
					case 'grid_1':
						include( locate_template( 'parts/portfolio_grid/portfolio_layout_type_1.php' ) );
						break;
					case 'grid_2':
						include( locate_template( 'parts/portfolio_grid/portfolio_layout_type_2.php' ) );
						break;
					case 'grid_3':
						include( locate_template( 'parts/portfolio_grid/portfolio_layout_type_3.php' ) );
						break;
					case 'grid_4':
						include( locate_template( 'parts/portfolio_grid/portfolio_layout_type_4.php' ) );
						break;
					case 'grid_5':
						include( locate_template( 'parts/portfolio_grid/portfolio_layout_type_5.php' ) );
						break;
					case 'grid_6':
						include( locate_template( 'parts/portfolio_grid/portfolio_layout_type_6.php' ) );
						break;
					case 'grid_7':
						include( locate_template( 'parts/portfolio_grid/portfolio_layout_type_7.php' ) );
						break;
					case 'grid_8':
						include( locate_template( 'parts/portfolio_grid/portfolio_layout_type_8.php' ) );
						break;
					case 'grid_9':
						include( locate_template( 'parts/portfolio_grid/portfolio_layout_type_9.php' ) );
						break;
					case 'grid_10':
						include( locate_template( 'parts/portfolio_grid/portfolio_layout_type_10.php' ) );
						break;
					case 'grid_11':
						include( locate_template( 'parts/portfolio_grid/portfolio_layout_type_11.php' ) );
						break;
					case 'grid_12':
						include( locate_template( 'parts/portfolio_grid/portfolio_layout_type_12.php' ) );
						break;
					default:
						include( locate_template( 'parts/portfolio_grid/portfolio_layout_type_1.php' ) );
						break;
				}

				if ( $_anim_attrs ) echo '</div>';

				if ( $lightbox_visibility ) {
					//temporary
					$ohio_project['show_view_link_in_popup'] = true;
					ob_start();
					OhioHelper::set_storage_item_data( $ohio_project );
					include( locate_template( 'parts/portfolio_grid/lightbox.php' ) );
					OhioLayout::append_to_footer_buffer_content( ob_get_clean() );
				}
			?>
			</div>
		<?php endfor; ?>
		</div>

	<?php if ( $card_layout == 'grid_12' ): ?>
		<div class="portfolio-grid-holder-underline"></div>
	</div>
	<?php endif; ?>

	<?php else : ?>
		<div class="vc_row wpb_row vc_row-fluid vc_row-no-padding portfolio-onepage-slider clb-slider-scroll-bar <?php echo esc_attr($card_layout); ?> <?php echo esc_attr($fullscreen_classes); ?>" data-portfolio-grid-slider data-vc-full-width="true" data-vc-stretch-content="true" data-slider-navigation="<?php echo $navBtn; ?>" data-slider-pagination="<?php echo $pagination; ?>" data-slider-loop="<?php echo $loop; ?>" data-slider-mousescroll="<?php echo $mousewheel; ?>" data-slider-autoplay="<?php echo $autoplay_mode; ?>" data-slider-autoplay-time="<?php echo $autoplay_interval; ?>" data-slider-columns="<?php if ( $card_layout === 'grid_6') echo esc_attr($slider_columns);?>" data-tilt-effect="<?php echo esc_attr($tilt_effect);?>">
			<?php
				$_prev_item_featured_image = "";
				foreach ( $projects_data as $_project_index => $_project_object ) {
					$ohio_project = OhioObjectParser::parse_to_project_object( $_project_object );
					$ohio_project['in_popup'] = $lightbox_visibility;
					$ohio_project['video_button_style'] = $video_button_style;
					
					if ( $card_layout == 'grid_9' ) {
						if ($_project_index == 0) {
							$_last_project = OhioObjectParser::parse_to_project_object( $projects_data[count($projects_data) - 1] );
							$ohio_project['prev_item_featured_image'] = $_last_project['featured_image'];
						} else {
							$ohio_project['prev_item_featured_image'] = $_prev_item_featured_image;
						}

						$_prev_item_featured_image = $ohio_project['featured_image'];
					}

					OhioHelper::set_storage_item_data( $ohio_project );
				
					switch ( $card_layout ) {
						case 'grid_3':
							include( locate_template( 'parts/portfolio_grid/portfolio_layout_type_3.php' ) );
							break;
						case 'grid_4':
							include( locate_template( 'parts/portfolio_grid/portfolio_layout_type_4.php' ) );
							break;
						case 'grid_5':
							include( locate_template( 'parts/portfolio_grid/portfolio_layout_type_5.php' ) );
							break;
						case 'grid_6':
							include( locate_template( 'parts/portfolio_grid/portfolio_layout_type_6.php' ) );
							break;
						case 'grid_7':
							include( locate_template( 'parts/portfolio_grid/portfolio_layout_type_7.php' ) );
							break;
						case 'grid_8':
							include( locate_template( 'parts/portfolio_grid/portfolio_layout_type_8.php' ) );
							break;
						case 'grid_9':
							include( locate_template( 'parts/portfolio_grid/portfolio_layout_type_9.php' ) );
							break;
						case 'grid_10':
							include( locate_template( 'parts/portfolio_grid/portfolio_layout_type_10.php' ) );
							break;
						default:
							include( locate_template( 'parts/portfolio_grid/portfolio_layout_type_3.php' ) );
							break;
					}

					if ( $lightbox_visibility ) {
						//temporary
						$ohio_project['show_view_link_in_popup'] = true;
						ob_start();
						OhioHelper::set_storage_item_data( $ohio_project );
						include( locate_template( 'parts/portfolio_grid/lightbox.php' ) );
						OhioLayout::append_to_footer_buffer_content( ob_get_clean() );
					}
				}
			?>
		</div>
	<?php endif; ?>

	<!-- Pagination -->
	<?php 
		if ( $use_pagination ) {

			$paged = OhioHelper::get_current_pagenum();

			if ( $pagination_type == 'simple' ) {

				OhioLayout::the_paginator_layout( $paged, $query->max_num_pages, $pagination_position );

			} else if ( $pagination_type == 'standard' ) {

				echo '<div class="pagination-standard">';
				OhioLayout::the_paginator_layout( $paged, $query->max_num_pages, $pagination_position );
				echo '</div>';

			} else if ( $pagination_type == 'lazy_scroll' ) {

				echo '<div class="lazy-load loading font-titles text-' . $pagination_position . '" data-lazy-load="scroll" ';
					echo 'data-lazy-pages-count="' . esc_attr( $query->max_num_pages ) . '" ';
					echo 'data-lazy-load-shortcode="' . esc_attr( $sc64 ) . '" ';
					echo 'data-lazy-load-rest="' . esc_url( get_rest_url( null, 'wp/v2/ohio_lazy_load_shortcodes' ) ) . '" ';
					echo 'data-lazy-load-scope="projects">';
				echo '<span class="btn-round btn-round-light" tabindex="0"><i class="ion ion-md-sync"></i></span>';
				echo '<span class="loading-text">' . esc_html__( 'Loading', 'ohio-extra' ) . '</span>';
				echo '</div>';

			}  else if ( $pagination_type == 'lazy_button' ) {

				echo '<div class="lazy-load load-more font-titles text-' . $pagination_position . '" data-lazy-load="click" ';
					echo 'data-lazy-pages-count="' . esc_attr( $query->max_num_pages ) . '" ';
					echo 'data-lazy-load-shortcode="' . esc_attr( $sc64 ) . '" ';
					echo 'data-lazy-load-rest="' . esc_url( get_rest_url( null, 'wp/v2/ohio_lazy_load_shortcodes' ) ) . '" ';
					echo 'data-lazy-load-scope="projects">';
				echo '<span class="btn-round btn-round-light" tabindex="0"><i class="ion ion-md-sync"></i></span>';
				echo '<span class="loadmore-text">' . esc_html__( 'Load More', 'ohio-extra' ) . '</span>';
				echo '<span class="loading-text">' . esc_html__( 'Loading', 'ohio-extra' ) . '</span>';
				echo '</div>';

			}
		}
	?>
</div>