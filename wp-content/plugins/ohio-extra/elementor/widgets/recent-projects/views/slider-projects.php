<div class="vc_row wpb_row vc_row-fluid vc_row-no-padding portfolio-onepage-slider clb-slider-scroll-bar  <?php echo esc_attr( $settings['card_layout'] ); if ( !empty( $settings['fullscreen_mode'] ) ) { echo ' full-vh'; } ?>" 
    data-lazy-container="projects"
    data-portfolio-grid-slider="true"
    data-vc-full-width="true" 
    data-vc-stretch-content="true" 
    data-slider-navigation="<?php if ( $settings['navigation_visibility'] ) { echo 'true'; } ?>"
    data-slider-pagination="<?php if ( $settings['bullets_visibility'] ) { echo 'true'; } ?>"
    data-slider-loop="<?php if ( $settings['loop_mode'] ) { echo 'true'; } ?>"
    data-slider-mousescroll="<?php if ( $settings['mousewheel_scroll'] ) { echo 'true'; } ?>" 
    data-slider-autoplay="<?php if ( $settings['autoplay_mode'] ) { echo 'true'; } ?>"
    data-slider-autoplay-time="<?php if ( $settings['autoplay_mode'] ) { echo $settings['autoplay_timeout']; } ?>"
    <?php if ( $settings['card_layout'] == 'grid_6' ) echo 'data-slider-columns="' . $columns_in_row . '"'; ?>
    <?php if ( $settings['card_layout'] == 'grid_8' ) echo 'data-interactive-links-grid="true"'; ?>
    data-tilt-effect="<?php if ( $settings['tilt_effect'] ) { echo 'true'; } ?>">

    <?php
        foreach ( $projects_data as $_project_index => $_project_object ) {
            $ohio_project = OhioObjectParser::parse_to_project_object( $_project_object );
            $ohio_project['in_popup'] = $settings['lightbox_visibility'];
            $ohio_project['video_button_style'] = $settings['video_button_style'];

            if ( $_project_index == 0 ) {
                $_last_project = OhioObjectParser::parse_to_project_object( $projects_data[count( $projects_data ) - 1] );
                $ohio_project['prev_item_featured_image'] = $_last_project['featured_image'];
            } else {
                $ohio_project['prev_item_featured_image'] = $_prev_item_featured_image;
            }
            $_prev_item_featured_image = $ohio_project['featured_image'];

            OhioHelper::set_storage_item_data( $ohio_project );

            switch ( $settings['card_layout'] ) {
                case 'grid_3': include( locate_template( 'parts/portfolio_grid/portfolio_layout_type_3.php' ) ); break;
                case 'grid_4': include( locate_template( 'parts/portfolio_grid/portfolio_layout_type_4.php' ) ); break;
                case 'grid_5': include( locate_template( 'parts/portfolio_grid/portfolio_layout_type_5.php' ) ); break;
                case 'grid_6': include( locate_template( 'parts/portfolio_grid/portfolio_layout_type_6.php' ) ); break;
                case 'grid_7': include( locate_template( 'parts/portfolio_grid/portfolio_layout_type_7.php' ) ); break;
                case 'grid_8': include( locate_template( 'parts/portfolio_grid/portfolio_layout_type_8.php' ) ); break;
                case 'grid_9': include( locate_template( 'parts/portfolio_grid/portfolio_layout_type_9.php' ) ); break;
                case 'grid_10': include( locate_template( 'parts/portfolio_grid/portfolio_layout_type_10.php' ) ); break;

                default: include( locate_template( 'parts/portfolio_grid/portfolio_layout_type_3.php' ) ); break;
            }

            if ( $settings['lightbox_visibility'] ) {
                // TODO: Update it?
                $ohio_project['show_view_link_in_popup'] = true;
                ob_start();
                OhioHelper::set_storage_item_data( $ohio_project );
                include( locate_template( 'parts/portfolio_grid/lightbox.php' ) );
                OhioLayout::append_to_footer_buffer_content( ob_get_clean() );
            }
        }
    ?>

</div>
<?php
    $scroll_bar_push = '';
    if ( $settings['card_layout'] === 'grid_9' ) {
        $scroll_bar_push = 'vc_col-md-5 vc_col-md-push-7';
    }
?>
<div class="scroll-bar-container  <?php echo esc_attr( $settings['card_layout'] )?>">
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
