<div class="ohio-recent-posts-sc vc_row blog-posts-masonry <?php echo $this->getWrapperClasses(); ?>" data-lazy-container="posts">

	<?php 
		// Calculate pagination
		$_post_start = 0;
		$_post_end = count( $posts_data );

		if ( !empty( $settings['use_pagination'] ) ) {
			// TODO: Looks weird, need rework
			$items_per_page = ( !empty( $settings['items_per_page'] ) ) ? $settings['items_per_page']['size'] : 6;
			$_post_start = $pagination_page * $items_per_page - $items_per_page;

			if ( $_post_end > $_post_start + $items_per_page ) {
				$_post_end = $_post_start + $items_per_page;
			}
		}

		for ( $_post_i = $_post_start; $_post_i < $_post_end; $_post_i++ ) {
			$_post_object = $posts_data[ $_post_i ];

			$_post_object->image_size = $settings['blog_images_size'];
			setup_postdata($_post_object);

			$ohio_post = OhioObjectParser::parse_to_post_object( $_post_object, 'recent_posts', $_post_i + 1 );
			$ohio_post['boxed'] = (bool)$settings['use_boxed_layout'];
			$ohio_post['metro_style'] = (bool)$settings['use_metro_style'];
			$ohio_post['meta_visibility'] = [
				'author_visibility' => true,
				'category_visibility' =>  true,
				'short_description_visibility' => (bool)$settings['show_short_description'],
				'read_more_visibility' => true,
				'reading_time_visibility' => true
			];

			OhioHelper::set_storage_item_data( $ohio_post );

			if ( $settings['block_type_layout'] == 'blog_grid_6' ) {
				$col_class = 'vc_col-lg-12 vc_col-md-12 vc_col-xs-12 no-paddings';
			} else {
				$col_class = $column_class;
			}
			
			if ( $ohio_post['grid_style'] == '2col' ) {
				$col_class = $column_double_class;
			}
			
			echo '<div class="' . $col_class . ' blog-post-masonry masonry-block post-offset ohio-card-wrapper';
				echo (( $ohio_post['grid_style'] != '2col' ) ? ' grid-item' : '') . '" data-lazy-item="" data-lazy-scope="posts">';

				// Animation calculating
				if ( empty( $settings['items_per_row_desktop'] ) ) {
					$settings['items_per_row_desktop'] = 1;
				}
				$anim_attrs = OhioHelper::get_AOS_animation_attrs( $settings['animation_type'], $settings['animation_effect'], $settings['items_per_row_desktop'] , $_post_i );

				if ( $anim_attrs ) echo '<div ' . implode( ' ', $anim_attrs ) . '>';

				switch ( $settings['block_type_layout'] ) {
					case 'blog_grid_1': get_template_part( 'parts/blog_grid/layout_type1' ); break;
					case 'blog_grid_2': get_template_part( 'parts/blog_grid/layout_type2' ); break;
					case 'blog_grid_3': get_template_part( 'parts/blog_grid/layout_type3' ); break;
					case 'blog_grid_4': get_template_part( 'parts/blog_grid/layout_type4' ); break;
					case 'blog_grid_5': get_template_part( 'parts/blog_grid/layout_type5' ); break;
					case 'blog_grid_6': get_template_part( 'parts/blog_grid/layout_type6' ); break;
					default:            get_template_part( 'parts/blog_grid/layout_type1' ); break;
				}

				if ( $anim_attrs ) echo '</div>';

			echo '</div>';
		}

		wp_reset_postdata();
	?>

</div>

<?php 
	if ( !empty( $settings['use_pagination'] ) ) {

		$pages_count = ceil( count( $posts_data ) / $items_per_page );
		$large_number = 10000000;
		$paginator_pattern = str_replace( $large_number, '{{page}}', get_pagenum_link( $large_number ) );

		echo '<div class="vc_col-lg-12">';

			if ( $settings['pagination_type'] == 'simple' ) {
				OhioLayout::the_paginator_layout( $pagination_page, $pages_count, $settings['pagination_position'] );
			}

			if ( $settings['pagination_type'] == 'standard' ) {
				echo '<div class="pagination-standard">';
				OhioLayout::the_paginator_layout( $pagination_page, $pages_count, $settings['pagination_position'] );
				echo '</div>';
			}

			if ( $settings['pagination_type'] == 'lazy_scroll' ) {
				$position = 'text-' . $settings['pagination_position'];

				echo '<div class="lazy-load loading font-titles ' . $position . ' " data-lazy-load="scroll" ';
				echo 'data-lazy-pages-count="' . esc_attr( $pages_count ) . '" ';
				echo 'data-lazy-load-url-pattern="' . esc_attr( $paginator_pattern ) . '" ';
				echo 'data-lazy-load-scope="posts">';
				echo '<span class="btn-round btn-round-light" tabindex="0"><i class="ion ion-md-sync"></i></span>';
				echo '<span class="loading-text">' . esc_html__( 'Loading', 'ohio-extra' ) . '</span>';
				echo '</div>';
			}

			if ( $settings['pagination_type'] == 'load_more' ) {
				$position = 'text-' . $settings['pagination_position'];

				echo '<div class="lazy-load load-more font-titles ' . $position . ' " data-lazy-load="click" ';
				echo 'data-lazy-pages-count="' . esc_attr( $pages_count ) . '" ';
				echo 'data-lazy-load-url-pattern="' . esc_attr( $paginator_pattern ) . '" ';
				echo 'data-lazy-load-scope="posts">';
				echo '<span class="btn-round btn-round-light" tabindex="0"><i class="ion ion-md-sync"></i></span>';
				echo '<span class="loadmore-text">' . esc_html__( 'Load More', 'ohio-extra' ) . '</span>';
				echo '<span class="loading-text">' . esc_html__( 'Loading', 'ohio-extra' ) . '</span>';
				echo '</div>';
			}

		echo '</div>';

	}
?>
