
<?php if ($settings['card_layout'] == 'grid_12'):?>
<div class="portfolio-grid-holder">
<?php endif; ?>
<div class="vc_row portfolio-grid <?php echo $this->getWrapperClasses(); ?>" 
	data-projects-per-page="<?php echo $per_page?>"
    data-isotope-grid="true" 
    data-lazy-container="projects"
    data-tilt-effect="true">

    <?php
        $_post_start = 0;
        $_post_end = count( $projects_data );
        $_prev_item_featured_image = '';

        if ( !empty( $settings['use_pagination'] ) ) {
            $items_per_page = ( !empty( $settings['items_per_page'] ) ) ? $settings['items_per_page']['size'] : 6;
            $_post_start = $pagination_page * $items_per_page - $items_per_page;

            if ( $_post_end > $_post_start + $items_per_page ) {
                $_post_end = $_post_start + $items_per_page;
            }
        }
        
        for ( $_post_i = $_post_start; $_post_i < $_post_end; $_post_i++ ) :
            $_project_object = $projects_data[$_post_i];
            $_project_object->image_size = $settings['portfolio_images_size'];

            $ohio_project = OhioObjectParser::parse_to_project_object( $_project_object );
            $ohio_project['metro_style'] = (bool)$settings['use_metro_style'];
            $ohio_project['hover_effect'] = $settings['card_hover_effect'];
            $ohio_project['in_popup'] = (bool)$settings['lightbox_visibility'];
            $ohio_project['video_button_style'] = $settings['video_button_style'];
            $ohio_project['boxed'] = ($settings['card_boxed_layout']) ? 'boxed' : false; // TODO: Yes, classname instead bool. Idk why

            if ( $_post_i == 0 ) {
                $_last_project = OhioObjectParser::parse_to_project_object( $projects_data[$_post_end - 1] );
                $ohio_project['prev_item_featured_image'] = $_last_project['featured_image'];
            } else {
                $ohio_project['prev_item_featured_image'] = $_prev_item_featured_image;
            }
            $_prev_item_featured_image = $ohio_project['featured_image'];

            OhioHelper::set_storage_item_data( $ohio_project );

            // Calculate item classes and attributes
            $item_class = [
                isset( $ohio_project['categories_group'] ) ? $ohio_project['categories_group'] : '',
            ];

            if ( $ohio_project['grid_style'] == '2col') {
                $item_class[] = $column_double_class;
                $item_class[] = 'double-width';
            } else {
                $item_class[] = $column_class;
            }

            // if ( $projects_solid ) {
            //     $item_class[] = 'post-offset';
            // }

            if ( !empty( $settings['items_per_row_desktop'] ) ) {
                $_per_row = $settings['items_per_row_desktop'];
            } elseif ( $settings['card_layout'] == 'grid_8' && !empty( $settings['projects_in_block']['size'] ) ) {
                $_per_row = $settings['projects_in_block']['size'];
            } else {
                $_per_row = 3;
            }
            $animation_attrs = OhioHelper::get_AOS_animation_attrs( $settings['animation_type'], $settings['animation_effect'], $_per_row, $_post_i );
        ?>
        <div class="portfolio-item-wrap masonry-block grid-item ohio-project-item <?php echo implode( ' ', $item_class ); ?>" 
            data-lazy-item=""
            data-lazy-scope="projects">
        <?php
            if ( $animation_attrs ) {
                echo '<div ' . implode( ' ', $animation_attrs ) . '>';
            }

            switch ( $settings['card_layout'] ) {
                case 'grid_1':  include( locate_template( 'parts/portfolio_grid/portfolio_layout_type_1.php' ) );  break;
                case 'grid_2':  include( locate_template( 'parts/portfolio_grid/portfolio_layout_type_2.php' ) );  break;
                case 'grid_8':  include( locate_template( 'parts/portfolio_grid/portfolio_layout_type_8.php' ) ); break;
                case 'grid_11': include( locate_template( 'parts/portfolio_grid/portfolio_layout_type_11.php' ) ); break;
                case 'grid_12': include( locate_template( 'parts/portfolio_grid/portfolio_layout_type_12.php' ) ); break;

                default: include( locate_template( 'parts/portfolio_grid/portfolio_layout_type_1.php' ) ); break;
            }

            if ( $animation_attrs ) {
                echo '</div>';
            }

            if ( $settings['lightbox_visibility'] ) {
                // TODO: Update it?
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
<?php if ($settings['card_layout'] == 'grid_12'):?>
<div class="portfolio-grid-holder-underline"></div>
</div>
<?php endif; ?>
