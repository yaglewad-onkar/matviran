<?php

	if ( OhioHelper::is_optimized_flow( 'breadcrumbs' ) ) return;
	if ( !OhioOptions::get( 'page_breadcrumbs_visibility', true ) ) return;

	// Settings
	$page_wrapped = OhioOptions::get( 'page_add_wrapper', true );
	$show_home_slug = OhioOptions::get_global( 'page_show_home_breadcrumb', true );
	$show_portfolio_slug = OhioOptions::get( 'page_breadcrumbs_visibility', true );
	$show_cats_filter = OhioOptions::get_global( 'breadcrumbs_show_cats', true );
	$show_tags_filter = OhioOptions::get_global( 'breadcrumbs_show_tags', true );
	$show_authors_filter = OhioOptions::get_global( 'breadcrumbs_show_author', true );

	$have_left_side = true;
	$have_right_side = false;

	$current_category = false;
	if ( OhioOptions::page_is('category') ) {
		$current_category = get_queried_object();
	}

	$current_tag = false;
	if ( OhioOptions::page_is('tag') ) {
		$current_tag = get_queried_object();
	}

	if ( OhioOptions::page_is( 'blog' ) ) {
		$categories = OhioOptions::get_local( 'blog_categories' );
		if ( !empty( $categories[0] ) && is_object( $categories[0] ) ) {
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

		$filter_published_posts = (new WP_Query( [
			'post_type' => 'post',
			'post_status' => 'publish',
			'tax_query' => $_tax_query
		] ))->found_posts;
	} else {
		$filter_published_posts = $GLOBALS['wp_query']->found_posts;
	}

	$filter_pagination_page = OhioHelper::get_current_pagenum();
	$filter_posts_per_page = OhioSettings::posts_per_page();
	$filter_posts_offset = ( $filter_pagination_page - 1 ) * $filter_posts_per_page;
	$filter_posts_show_from = $filter_posts_offset + 1;
	$filter_posts_show_to = $filter_posts_offset + $filter_posts_per_page;
	if ( $filter_posts_show_to > $filter_published_posts ) {
		$filter_posts_show_to = $filter_published_posts;
	}
	$filter_cat_ids = get_terms( array( 'taxonomy' => 'category' ) );
	$filter_tag_ids = get_terms( array( 'taxonomy' => 'post_tag' ) );
	$filter_authors = get_users( array( 'who'      => 'authors'  ) );

	// Delimiter and slugs
	$delimiter_symbol = OhioOptions::get_global( 'breadcrumbs_separator' );
	if ( ! $delimiter_symbol ) {
		$delimiter_symbol = '<i class="ion ion-ios-arrow-forward"></i>';
	}
	$home_slug = OhioOptions::get( 'page_home_breadcrumb_slug', esc_html__( 'Home', 'ohio' ), false, true );
	$portfolio_slug = OhioOptions::get( 'project_breadcrumb_slug', esc_html__( 'Portfolio', 'ohio' ), false, true );
	$search_slug = esc_html__( 'Search results', 'ohio' );
	$cats_slug = esc_html__( 'Tag:', 'ohio' );
	$tag_slug = esc_html__( 'Tag:', 'ohio' );
	$author_slug = esc_html__( 'Author:', 'ohio' );
	$not_found_slug = esc_html__( 'Page not found', 'ohio' );
	$breadcrumbs_classes = '';

	// Ancestors
	$breadcrumbs_ancestors = array();
	if ( $show_home_slug ) {
		$breadcrumbs_ancestors[] = array( $home_slug, home_url( '/' ) );
	}

	if ( OhioSettings::page_is( 'home' ) ) {
		$have_right_side = true;
	} else {
		if ( OhioSettings::page_is( 'portfolio_category' ) ) {
			if ( $show_portfolio_slug ) {
				$link_to_portfolio = OhioOptions::get_global( 'portfolio_page', home_url( '/' ), false, true );
				$breadcrumbs_ancestors[] = array( $portfolio_slug , $link_to_portfolio);
			}
			$breadcrumbs_ancestors[] = __( 'Category: ' ) . get_queried_object()->name;
		} elseif ( OhioSettings::page_is( 'portfolio_tag' ) ) {
			if ( $show_portfolio_slug ) {
				$link_to_portfolio = OhioOptions::get_global( 'portfolio_page', home_url( '/' ), false, true );
				$breadcrumbs_ancestors[] = array( $portfolio_slug , $link_to_portfolio);
			}
			$breadcrumbs_ancestors[] = __( 'Tag: ' ) . get_queried_object()->name;
		} elseif ( OhioSettings::page_is( 'category' ) ) {
			$cat = get_category( get_query_var( 'cat' ), false );
			if ( is_object( $cat ) ) {
				$have_right_side = true;
				if ( $cat->parent != 0 ) {
					$cats = get_category_parents( $cat->parent, true, '<br>' );
					$cats = explode( '<br>', $cats );
					foreach ( $cats as $key => $cat_link ) {
						if ( ! $cat_link ) continue;
						$_matches = false;
						if ( preg_match( '/<a href="([^"]+)">([^<]+)<\/a>/', $cat_link, $_matches ) ) {
							$breadcrumbs_ancestors[] = array( trim( $_matches[2] ), $_matches[1] );
						}
					}
				}
				$breadcrumbs_ancestors[] = $cat->name;
			}
		} elseif ( OhioSettings::page_is( 'tag' ) ) {
			$have_right_side = true;
			$breadcrumbs_ancestors[] = $tag_slug . ' ' . single_tag_title( '', false );
		} elseif ( OhioSettings::page_is( 'search' ) ) {
			$breadcrumbs_ancestors[] = $search_slug;
		} elseif ( is_day() ) {
			$have_right_side = true;
			$breadcrumbs_ancestors[] = array( get_the_time( 'Y' ), get_year_link( get_the_time( 'Y' ) ) );
			$breadcrumbs_ancestors[] = array( get_the_time( 'F' ), get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) );
			$breadcrumbs_ancestors[] = get_the_time( 'd' );
		} elseif ( is_month() ) {
			$have_right_side = true;
			$breadcrumbs_ancestors[] = array( get_the_time( 'Y' ), get_year_link( get_the_time( 'Y' ) ) );
			$breadcrumbs_ancestors[] = get_the_time( 'F' );
		} elseif ( is_year() ) {
			$have_right_side = true;
			$breadcrumbs_ancestors[] = get_the_time( 'Y' );
		} elseif ( OhioSettings::page_is( 'blog' ) ) {
			$have_right_side = true;
			$parent_id = $post->post_parent;
			if ( $parent_id != get_option( 'page_on_front' ) ) {
				$_breadcrumbs = array();
				while ( $parent_id ) {
					$page = get_page( $parent_id );
					if ( $parent_id != get_option( 'page_on_front' ) ) {
						$_breadcrumbs[] = array( get_the_title( $page->ID ), get_permalink( $page->ID ) );
					}
					$parent_id = $page->post_parent;
				}
				$breadcrumbs_ancestors = array_merge( $breadcrumbs_ancestors, array_reverse( $_breadcrumbs ) );
			}
			if ( get_the_title() ) {
				$breadcrumbs_ancestors[] = get_the_title();
			}
		} elseif ( OhioSettings::page_is( 'single' ) ) {

            // if ( OhioOptions::get( 'page_sidebar_position', 'left' ) == 'without' ) {
            //     $breadcrumbs_classes = ' vc_col-md-12';
            // }

			$cat = get_the_category();
			if ( is_array( $cat ) && count( $cat ) > 0 ) {
				$cat = $cat[0];
			}
			if ( is_object( $cat ) ) {
				if ( $cat->parent != 0 ) {
					$cats = get_category_parents( $cat->parent, true, '<br>' );
					$cats = explode( '<br>', $cats );
					foreach ( $cats as $key => $cat_link ) {
						if ( ! $cat_link ) continue;
						$_matches = false;
						if ( preg_match( '/<a href="([^"]+)">([^<]+)<\/a>/', $cat_link, $_matches ) ) {
							$breadcrumbs_ancestors[] = array( trim( $_matches[2] ), $_matches[1] );
						}
					}
				}
				$breadcrumbs_ancestors[] = array( $cat->name, get_category_link( $cat->term_id ) );
			}
			if ( get_the_title() ) {
				$breadcrumbs_ancestors[] = get_the_title();
			} else {
				$breadcrumbs_ancestors[] = '[' . get_the_date( get_option( 'date_format' ), $post->ID ) . ']';
			}
		} elseif ( OhioSettings::page_is( 'project' ) ) {
			if ( $show_portfolio_slug ) {
				$link_to_portfolio = OhioOptions::get_global( 'portfolio_page', home_url( '/' ), false, true );
				$breadcrumbs_ancestors[] = array( $portfolio_slug , $link_to_portfolio);
			}
			if ( get_the_title() ) {
				$breadcrumbs_ancestors[] = get_the_title();
			} else {
				$breadcrumbs_ancestors[] = '[' . get_the_date( get_option( 'date_format' ), $post->ID ) . ']';
			}
		} elseif( OhioSettings::page_is( 'projects_page' ) ) {
		    if($portfolio_slug) {
                $breadcrumbs_ancestors[] = $portfolio_slug;
            } else {
                if ( get_the_title() ) {
                    $breadcrumbs_ancestors[] = get_the_title();
                } else {
                    $breadcrumbs_ancestors[] = '[' . get_the_date( get_option( 'date_format' ), $post->ID ) . ']';
                }
            }
        } elseif ( OhioSettings::page_is( 'wishlist' ) ) {
			$breadcrumbs_ancestors[] = array(
				OhioSettings::breadcrumbs_woocommerce_slug(),
				get_permalink( wc_get_page_id( 'shop' ) )
			);
			$breadcrumbs_ancestors[] = get_the_title();
			// $breadcrumbs_classes = ' vc_col-md-8 vc_col-lg-push-2';
		} elseif ( OhioSettings::page_is( 'shop' ) ) {
			//$have_right_side = true;
			$breadcrumbs_ancestors[] = OhioSettings::breadcrumbs_woocommerce_slug();
			// $breadcrumbs_classes = ' vc_col-md-8 vc_col-lg-push-2';
		} elseif ( OhioSettings::page_is( 'product_category' ) ) {
			global $wp_query;
        	$cat = $wp_query->get_queried_object();
			$breadcrumbs_ancestors[] = array(
				OhioSettings::breadcrumbs_woocommerce_slug(),
				get_permalink( wc_get_page_id( 'shop' ) )
			);
			$breadcrumbs_ancestors[] = esc_html__( 'Category', 'ohio' ) . ': ' . $cat->name;
		} elseif ( OhioSettings::page_is( 'product_tag' ) ) {
			global $wp_query;
			$cat = $wp_query->get_queried_object();
			$breadcrumbs_ancestors[] = array(
				OhioSettings::breadcrumbs_woocommerce_slug(),
				get_permalink( wc_get_page_id( 'shop' ) )
			);
			$breadcrumbs_ancestors[] = esc_html__( 'Tag', 'ohio' ) . ': ' . $cat->name;
		} elseif ( OhioSettings::page_is( 'product' ) ) {
			global $args;
			$terms = wp_get_post_terms( $post->ID, 'product_cat', array( 'taxonomy' => 'product_cat' ) );
			$breadcrumbs_ancestors[] = array(
				OhioSettings::breadcrumbs_woocommerce_slug(),
				get_permalink( wc_get_page_id( 'shop' ) )
			);
			if ( is_array( $terms ) && is_object( $terms[0] ) ) {
				$breadcrumbs_ancestors[] = array( $terms[0]->name, get_term_link( $terms[0] ) );
			}
			$breadcrumbs_ancestors[] = get_the_title();
		} elseif ( OhioSettings::page_is( 'attachment' ) ) {
			$parent_id = ($post) ? $post->post_parent : '';
			$parent = get_post( $parent_id );
			$cat = get_the_category( $parent->ID );
			if ( is_array( $cat ) && count( $cat ) > 0 ) {
				$cat = $cat[0];
			}
			if ( is_object( $cat ) ) {
				if ( $cat->parent != 0 ) {
					$cats = get_category_parents( $cat->parent, true, '<br>' );
					$cats = explode( '<br>', $cats );
					foreach ( $cats as $key => $cat_link ) {
						if ( ! $cat_link ) continue;
						$_matches = false;
						if ( preg_match( '/<a href="([^"]+)">([^<]+)<\/a>/', $cat_link, $_matches ) ) {
							$breadcrumbs_ancestors[] = array( trim( $_matches[2] ), $_matches[1] );
						}
					}
				}
				$breadcrumbs_ancestors[] = array( $cat->name, get_category_link( $cat->term_id ) );
			}
			$breadcrumbs_ancestors[] = array( $parent->post_title,  get_permalink( $parent ) );
			$breadcrumbs_ancestors[] = get_the_title();
		} elseif ( OhioSettings::page_is( 'page' ) && ( $post ) && ! $post->post_parent ) {
			if ( get_the_title() ) {
				$breadcrumbs_ancestors[] = get_the_title();
			} else {
				$breadcrumbs_ancestors[] = '[' . get_the_date( get_option( 'date_format' ), $post->ID ) . ']';
			}
		} elseif ( OhioSettings::page_is( 'page' ) && ( $post ) && $post->post_parent ) {
			$parent_id = $post->post_parent;
			if ( $parent_id != get_option( 'page_on_front' ) ) {
				$_breadcrumbs = array();
				while ( $parent_id ) {
					$page = get_page( $parent_id );
					if ( $parent_id != get_option( 'page_on_front' ) ) {
						$_breadcrumbs[] = array( get_the_title( $page->ID ), get_permalink( $page->ID ) );
					}
					$parent_id = $page->post_parent;
				}
				$breadcrumbs_ancestors = array_merge( $breadcrumbs_ancestors, array_reverse( $_breadcrumbs ) );
			}
			if ( get_the_title() ) {
				$breadcrumbs_ancestors[] = get_the_title();
			} else {
				$breadcrumbs_ancestors[] = '[' . get_the_date( get_option( 'date_format' ), $page->ID ) . ']';
			}
		} elseif ( OhioSettings::page_is( 'author' ) ) {
			$author = get_the_author();
			$breadcrumbs_ancestors[] = $author_slug . ' ' . ( ( $author) ? $author : esc_html__( 'Undefined', 'ohio' ) );
		} elseif ( OhioSettings::page_is( '404' ) ) {
			$breadcrumbs_ancestors[] = $not_found_slug;
		} elseif ( has_post_format() && ! is_singular() ) {
			$format = has_post_format();
			if ( is_array( $format ) && count( $format ) > 0 ) {
				$format = $format[0];
			}
			$breadcrumbs_ancestors[] = get_post_format_string( $format );
		}
	}

	$page_container_class = '';
	if ( !$page_wrapped ) {
		$page_container_class .= ' full';
	}
?>

<div class="breadcrumbs">
	<div class="page-container<?php echo esc_attr( $page_container_class ); ?>">
		<div class="vc_row">

			<!-- Breadcrumbs -->
			<div class="breadcrumbs-holder<?php echo esc_attr($breadcrumbs_classes) ?>">
				<div class="vc_col-md-12">
					<?php if ( !empty($breadcrumbs_ancestors) ): ?>
						<ol class="breadcrumbs-slug" itemscope itemtype="http://schema.org/BreadcrumbList">
							<?php
								foreach ( $breadcrumbs_ancestors as $position => $ancestor_value ) {
									$is_last = ($position == count( $breadcrumbs_ancestors ) - 1);
									echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';

									if ( is_array( $ancestor_value ) ) {
										printf( '<a itemprop="item" href="%s"><span itemprop="name">%s</span></a>', esc_url( $ancestor_value[1] ), esc_html( $ancestor_value[0] ), $position );
									} else {
										echo '<span itemprop="name"' . ( $is_last ? ' class="active"' : '' ) . '>' . esc_html( $ancestor_value ) . '</span>';
									}

									if ( !$is_last ) {
										echo $delimiter_symbol;
									}

									echo '<meta itemprop="position" content="' . esc_attr( $position + 1 ) .'" />';
									echo '</li>';
								}
							?>
						</ol>
					<?php endif; ?>
				</div>
			</div>

			<?php if ( $have_right_side ) : ?>
			<!-- Filter bar -->
			<div class="filter-holder">
				<div class="vc_col-md-12">
					<div class="mbl-overlay">
						<div class="mbl-overlay-bg"></div>
						<div class="close-bar text-left">
							<div class="btn-round btn-round-light clb-close" tabindex="0">
								<i class="ion ion-md-close"></i>
							</div>
						</div>
						<div class="mbl-overlay-container">
							<div class="filter">
								<?php if ( $have_right_side || OhioOptions::page_is( 'search' ) ) : ?>
									<div class="result">
										<?php echo sprintf( esc_html__( 'Showing %1$d-%2$d of %3$d results', 'ohio' ), $filter_posts_show_from, $filter_posts_show_to, $filter_published_posts ); ?>
									</div>
									<?php if ( $have_right_side ) : ?>
										<?php if ( is_array( $filter_cat_ids ) && $filter_cat_ids && $show_cats_filter ) : ?>
										<div class="select-inline">
											<select autocomplete="off">
												<option value="" data-select-href="<?php echo home_url(); ?>"><?php esc_html_e( 'Categories', 'ohio' ); ?></option>
												<?php
													foreach ($filter_cat_ids as $cat_obj) {
														echo '<option value="' . esc_attr( $cat_obj->slug ) . '" ';
														echo 'data-select-href="' . esc_url( get_term_link( $cat_obj->term_id ) ) . '" ';
														if ( $current_category && $cat_obj->term_id == $current_category->term_id )  {
															echo ' selected';
														}
														echo '>' . esc_html( $cat_obj->name ) . '</option>';
													}
												?>
											</select>
										</div>
										<?php endif; ?>

										<?php if ( is_array( $filter_tag_ids ) && $filter_tag_ids && $show_tags_filter ) : ?>
										<div class="select-inline">
											<select autocomplete="off">
												<option value="" data-select-href="<?php echo home_url(); ?>"><?php esc_html_e( 'Tags', 'ohio' ); ?></option>
												<?php
													foreach ($filter_tag_ids as $tag_obj) {
														echo '<option value="' .  esc_attr( $tag_obj->slug ) . '" ';
														echo 'data-select-href="' . esc_url( get_term_link(  $tag_obj->term_id ) ) . '" ';
														if ( $current_tag && $tag_obj->term_id == $current_tag->term_id )  {
															echo ' selected';
														}
														echo '>' . esc_html( $tag_obj->name ) . '</option>';
													}
												?>
											</select>
										</div>
										<?php endif; ?>

										<?php if ( is_array( $filter_authors ) && count( $filter_authors ) > 1 && $show_authors_filter ) : ?>
										<div class="select-inline">
											<select>
												<option value=""><?php esc_html_e( 'Authors', 'ohio' ); ?></option>
												<?php
													foreach ($filter_authors as $author) {
														echo '<option value="' . esc_attr( $author->data->user_login ) . '" data-select-href="' . esc_url( get_author_posts_url( $author->ID, $author->data->user_nicename ) ) . '">' . esc_html( $author->data->display_name ) . '</option>';
													}
												?>
											</select>
										</div>
										<?php endif; ?>
									<?php endif;?>
								<?php endif;?>
							</div>
						</div>
					</div>
				</div>
				<div class="btn-filter">
					<a href="#" class="btn btn-small">
						<i class="ion ion-left ion-md-funnel"></i>
						<span class="text"><?php esc_html_e('Filter', 'ohio') ?></span>
					</a>
				</div>
			</div>
			<?php endif; ?>

			<?php if (OhioSettings::page_is( 'shop' ) || (function_exists('is_product_category') && is_product_category()) || (function_exists('is_product_tag') && is_product_tag())): ?>
			<div class="filter-holder">
				<div class="vc_col-md-12">
					<div class="mbl-overlay">
						<div class="mbl-overlay-bg"></div>
						<div class="close-bar text-left">
							<div class="btn-round btn-round-light clb-close" tabindex="0">
								<i class="ion ion-md-close"></i>
							</div>
						</div>
						<div class="mbl-overlay-container">
							<div class="filter">
								<div class="result">
									<?php if ( function_exists( 'woocommerce_result_count' ) ) { woocommerce_result_count(); } ?>
								</div>
								<div class="select-inline">
									<?php if ( function_exists( 'woocommerce_catalog_ordering' ) ) { woocommerce_catalog_ordering(); } ?>
								</div>
								<div class="select-inline">
									<form class="woocommerce-ordering select-inline" method="get">
										<?php
											$product_cat_terms = get_terms( [ 'taxonomy' => 'product_cat' ] );
											if ($product_cat_terms) {
												echo '<select>';
												echo '<option data-select-href="' . esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ) . '">'. esc_attr__( 'Filter by category', 'ohio' ) .'</option>';
												foreach ($product_cat_terms as $term) {
													echo '<option value="' . $term->slug . '" data-select-href="' . esc_url( get_term_link( $term->term_id, 'product_cat' ) ) . '"';
													if (isset( $wp_query->query_vars['product_cat'] ) && $wp_query->query_vars['product_cat'] == $term->slug) echo ' selected';
													echo '>' . $term->name . '</option>';
												}
												echo '</select>';
											}
										?>
									</form>
								</div>
								<div class="select-inline">
									<form class="woocommerce-ordering select-inline" method="get">
										<?php
											$product_tag_terms = get_terms( [ 'taxonomy' => 'product_tag' ] );
											if ($product_tag_terms) {
												echo '<select>';
												echo '<option data-select-href="' . esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ) . '">'. esc_attr__( 'Filter by tag', 'ohio' ) .'</option>';
												foreach ($product_tag_terms as $term) {
													echo '<option value="' . $term->slug . '" data-select-href="' . esc_url( get_term_link( $term->term_id, 'product_tag' ) ) . '"';
													if (isset( $wp_query->query_vars['product_tag'] ) && $wp_query->query_vars['product_tag'] == $term->slug) echo ' selected';
													echo '>' . $term->name . '</option>';
												}
												echo '</select>';
											}
										?>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="btn-filter">
					<a href="#" class="btn btn-small">
						<i class="ion ion-left ion-md-funnel"></i>
						<span class="text"><?php esc_html_e('Filter', 'ohio') ?></span>
					</a>
				</div>
			</div>
			<?php endif; ?>
		</div>
	</div>
</div>