<?php if ( $settings['show_projects_filter'] ) : ?>
    <?php
        $filter_align_class = '';
        if ( $settings['filter_align'] == 'left' ) {
            $filter_align_class = ' text-left';
        }
        if ( $settings['filter_align'] == 'right' ) {
            $filter_align_class = ' text-right';
        }

        $selected_categories = [];
        if ( !empty( $settings['portfolio_category'] ) ) {
            $selected_categories = $settings['portfolio_category'];
        }

        $cat_ids = get_terms( array( 'taxonomy' => 'ohio_portfolio_category' ) );

        if ( !empty( $cat_ids ) && is_array( $cat_ids ) ) :
    ?>
    <div
        class="portfolio-sorting <?php echo esc_attr( $filter_align_class ); ?>" 
        data-filter="portfolio"
        <?php if ( $filter_is_paged ) { echo 'data-filter-paged="true"'; } ?>>

        <ul class="unstyled">
            <li><?php esc_html_e( 'Filter by', 'ohio-extra' ) ?></li>
            <li>
                <a class="active" href="#all" data-isotope-filter="*" data-category-count="<?php echo str_pad( (string)count( $projects_data ), 2, '0', STR_PAD_LEFT ); ?>">
                    <span class="name"><?php esc_html_e( 'All', 'ohio-extra' ); ?></span>
                    <span class="num"><?php echo str_pad( (string)count( $projects_data ), 2, '0', STR_PAD_LEFT ); ?></span>
                </a>
            </li>
            <?php foreach ( $cat_ids as $cat_obj ) : ?>
                <?php if ( !empty( $selected_categories ) ): ?>
                    <?php if ( !in_array( $cat_obj->slug, $selected_categories ) ) { continue; } ?>
                <?php endif; ?>
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