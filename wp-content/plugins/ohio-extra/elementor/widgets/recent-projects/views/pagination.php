<?php 
    if ( !empty( $settings['use_pagination'] ) ) {
        $large_number = 10000000;
        $paginator_pattern = str_replace( $large_number, '{{page}}', get_pagenum_link( $large_number ) );

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
            echo 'data-lazy-load-scope="projects">';
            echo '<span class="btn-round btn-round-light" tabindex="0"><i class="ion ion-md-sync"></i></span>';
            echo '<span class="loading-text">' . esc_html__( 'Loading', 'ohio-extra' ) . '</span>';
            echo '</div>';
        }

        if ( $settings['pagination_type'] == 'load_more' ) {
            $position = 'text-' . $settings['pagination_position'];

            echo '<div class="lazy-load load-more font-titles ' . $position . ' " data-lazy-load="click" ';
            echo 'data-lazy-pages-count="' . esc_attr( $pages_count ) . '" ';
            echo 'data-lazy-load-url-pattern="' . esc_attr( $paginator_pattern ) . '" ';
            echo 'data-lazy-load-scope="projects">';
            echo '<span class="btn-round btn-round-light" tabindex="0"><i class="ion ion-md-sync"></i></span>';
            echo '<span class="loadmore-text">' . esc_html__( 'Load More', 'ohio-extra' ) . '</span>';
            echo '<span class="loading-text">' . esc_html__( 'Loading', 'ohio-extra' ) . '</span>';
            echo '</div>';
        }
    }
?>
