<?php
    get_header();

    $published_posts = $GLOBALS['wp_query']->found_posts;

    $pagination_page = OhioHelper::get_current_pagenum();

    $posts_per_page = OhioSettings::posts_per_page();

    $posts_offset = ( $pagination_page - 1 ) * $posts_per_page;
    $paginator_all = ceil( $published_posts / (int) $posts_per_page );

    $pagination_type = OhioOptions::get( 'pagination_type', 'simple' );
    $pagination_position = OhioOptions::get( 'pagination_position', 'left' );

    $posts_show_from = $posts_offset + 1;
    $posts_show_to = $posts_offset + $posts_per_page;
    if ( $posts_show_to > $published_posts ) {
        $posts_show_to = $published_posts;
    }

    // Sidebar
    $sidebar_position = OhioOptions::get( 'page_sidebar_position', 'without' );
    $sidebar_page_class = '';
    if ( is_active_sidebar( 'Ohio-sidebar-blog' ) ) {
        if ( $sidebar_position == 'left' ) {
            $sidebar_page_class = ' with-left-sidebar';
        }
        if ( $sidebar_position == 'right' ) {
            $sidebar_page_class = ' with-right-sidebar';
        }
    }

    $sidebar_layout = OhioOptions::get( 'page_sidebar_layout', 'simple' );
    $sidebar_class = '';
    if ( $sidebar_layout ) {
        $sidebar_class .= ' sidebar-' . $sidebar_layout;
    }

    $page_wrapped = OhioOptions::get( 'page_add_wrapper', true );

    // Grid style
    OhioHelper::add_required_script( 'masonry' );
    $grid_style_class = 'ohio-masonry blog-posts-masonry';

    $projects_layout_item = OhioOptions::get_global( 'portfolio_item_layout_type', 'grid_1' );

    // Columns
    $columns_num = OhioOptions::get_global( 'portfolio_columns_in_row', '2-2-1' );
    $columns_class = OhioHelper::parse_columns_to_css( $columns_num, false );
    $columns_double_class = OhioHelper::parse_columns_to_css( $columns_num, true );

    $grid_offset_class = '';
    $posts_without_paddings = OhioOptions::get_global( 'portfolio_grid_items_without_padding', false );
    if ( $posts_without_paddings ) {
        $grid_offset_class .= ' grid-offset';
    }

    $show_breadcrumbs = OhioOptions::get( 'page_breadcrumbs_visibility', true );

    $page_container_class = '';
    if ( !$show_breadcrumbs ) {
        $page_container_class .= ' top-offset';
    }
    if ( !$page_wrapped ) {
        $page_container_class .= ' full';
    }

    $metro_style = OhioOptions::get( 'portfolio_metro_style' );
    $boxed = OhioOptions::get( 'portfolio_items_boxed_style', true );
    if ( !is_bool( $boxed ) ) {
        if ( $boxed == 'default' ) $boxed = false;
        else $boxed = true;
    }
    $show_view_link_in_popup = OhioOptions::get_global( 'portfolio_lightbox_link', true );
    $open_in_popup = OhioOptions::get_global( 'portfolio_projects_in_popup', true );
    $alignment = OhioOptions::get_global( 'projects_text_alignment', 'left' );
    $hover_effect = OhioOptions::get_global( 'portfolio_grid_hover', 'global' );
    $animation_type = OhioOptions::get( 'page_animation_type', 'sync' );
	$animation_effect = OhioOptions::get( 'page_animation_effect' );
	$animation_once = OhioOptions::get( 'page_animation_once' );
    $meta_visibility = array(
        'author_visibility' => OhioOptions::get( 'posts_author_visibility', true ),
        'category_visibility' =>  OhioOptions::get( 'posts_category_visibility', true ),
        'short_description_visibility' => OhioOptions::get( 'posts_short_description_visibility', true ),
        'read_more_visibility' => OhioOptions::get( 'posts_read_more_visibility', true ),
        'reading_time_visibility' => OhioOptions::get( 'posts_reading_time_visibility', true )
    );

    if ( have_posts() ) :
?>

        <?php get_template_part( 'parts/elements/page_headline' ); ?>

        <?php get_template_part( 'parts/elements/breadcrumbs' ); ?>

        <div class="page-container bottom-offset<?php echo esc_attr( $page_container_class ); ?>">
            <?php if ( is_active_sidebar( 'Ohio-sidebar-blog' ) && $sidebar_position == 'left' ) : ?>
                <div class="page-sidebar sidebar-left<?php echo esc_attr( $sidebar_class ); ?>">
                    <aside id="secondary" class="widget-area">
                        <?php dynamic_sidebar( 'Ohio-sidebar-blog' ); ?>
                    </aside>
                </div>
            <?php endif; ?>

            <div id="primary" class="page-content content-area<?php echo esc_attr( $sidebar_page_class ); ?>">
                <main id="main" class="site-main">
                    <div class="vc_row portfolio-grid <?php echo esc_attr( $grid_style_class . $grid_offset_class ); ?>" data-lazy-container="posts">
                        <?php
                        $_post_i = 0;
                        while ( have_posts() ) : the_post();

                            $parsed_post = OhioObjectParser::parse_to_project_object( $post, NULL, $_post_i + 1 );

                            $parsed_post['in_popup'] = $open_in_popup;
                            $parsed_post['boxed'] = ($boxed) ? 'boxed' : '';
                            $parsed_post['hover_effect'] = $hover_effect;
                            $parsed_post['metro_style'] = $metro_style;
                            OhioHelper::set_storage_item_data( $parsed_post );

                            $col_class = $columns_class;
                            $grid_class = ' grid-item';

                            // if ( $parsed_post['grid_style'] == '2col' ) {
                            //     $col_class = $columns_double_class;
                            // }

                            // Animation calculating
                            $_anim_attrs = OhioHelper::get_AOS_animation_attrs( $animation_type, $animation_effect, (int) substr( $columns_num, 0, 1), $_post_i );

                            echo '<div class="portfolio-item-wrap masonry-block ohio-project-item grid-item section' . esc_attr( $col_class . $grid_class . $grid_offset_class ) . '" ' . implode( ' ', $_anim_attrs ) . ' data-lazy-item="" data-lazy-scope="posts">';
                            switch ( $projects_layout_item ) {
                                case 'grid_1':
                                    get_template_part( 'parts/portfolio_grid/portfolio_layout_type_1' );
                                    break;
                                case 'grid_2':
                                    get_template_part( 'parts/portfolio_grid/portfolio_layout_type_2' );
                                    break;
                                default:
                                    get_template_part(  'parts/portfolio_grid/portfolio_layout_type_1' );
                                    break;
                            }

                            if ( $open_in_popup ) {
                                $parsed_post['show_view_link_in_popup'] = $show_view_link_in_popup;

                                OhioHelper::set_storage_item_data( $parsed_post );
                                ob_start();
                                get_template_part( 'parts/portfolio_grid/lightbox' );
                                OhioLayout::append_to_footer_buffer_content( ob_get_clean() );
                            }

                            echo '</div>';

                            $_post_i++;
                        endwhile;
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
                </main>
            </div>

            <?php if ( is_active_sidebar( 'Ohio-sidebar-blog' ) && $sidebar_position == 'right' ) : ?>
                <div class="page-sidebar sidebar-right<?php echo esc_attr( $sidebar_class ); ?>">
                    <aside id="secondary" class="widget-area">
                        <?php dynamic_sidebar( 'Ohio-sidebar-blog' ); ?>
                    </aside>
                </div>
            <?php endif; ?>
            
        </div>

<?php else : ?>

        <?php get_template_part( 'parts/content', 'none' ); ?>

<?php endif;

    get_footer();
