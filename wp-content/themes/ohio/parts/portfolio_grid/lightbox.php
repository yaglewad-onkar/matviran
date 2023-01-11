<?php
    $project = OhioHelper::get_storage_item_data();

    if ( is_array( $project['images_full'] ) && count( $project['images_full'] ) > 0 ) {
        $project['images'] = $project['images_full'];
    }

    $is_feature_as_gallery = false;
    if (isset($project['images'][0])) {
        if ($project['featured_image_full'] == $project['images'][0]['url']) {
            $is_feature_as_gallery = true;
        }
    }

    $is_featured_image = OhioOptions::get( 'project_add_featured_to_gallery', true );

    if ( $project['is_featured_image'] ) {
        if ( !$is_featured_image ) {
            array_shift($project['images']);
        }
    }

    $is_slider = false;
    if (count($project['images']) > 1) {
        $is_slider = true;
    } else if (count($project['images']) == 1 && !$is_feature_as_gallery) {
        $is_slider = true;
    }

    $show_description = OhioOptions::get_global( 'portfolio_gallery_description', true );
    $show_details = OhioOptions::get_global( 'portfolio_gallery_details', true );
    $view_text = OhioOptions::get_global( 'portfolio_lightbox_link_text', 'View Project' );
    
    $navigation_visibility = OhioOptions::get_global( 'lightbox_nav_visibility', true );
    $bullets_visibility = OhioOptions::get_global( 'lightbox_bullets_visibility', true );
    $loop_mode = OhioOptions::get_global( 'lightbox_loop_mode', true );
    $autoplay_mode = OhioOptions::get_global( 'lightbox_autoplay_mode', true );
    $autoplay_interval = OhioOptions::get_global( 'lightbox_autoplay_interval', 5000 );
    $mousewheel_scrolling = OhioOptions::get_global( 'lightbox_mousewheel_mode', true );

    if ( $project ) :

?>
<div class="clb-popup clb-portfolio-lightbox" id="<?php echo esc_attr( $project['popup_id'] ); ?>" data-lazy-to-footer="true">
    <div class="clb-portfolio-lightbox-media">
        <div class="slider" <?php $is_slider ? esc_attr_e('data-clb-portfolio-lightbox-slider', 'ohio') : '' ?> data-slider-navigation="<?php echo esc_attr($navigation_visibility);?>" data-slider-pagination="<?php echo esc_attr($bullets_visibility);?>" data-slider-loop="<?php echo esc_attr($loop_mode);?>" data-slider-mousescroll="<?php echo esc_attr($mousewheel_scrolling);?>" data-slider-autoplay="<?php echo esc_attr($autoplay_mode);?>" data-slider-autoplay-time="<?php echo esc_attr($autoplay_interval);?>" data-slider-autoplay-pause="">
            <?php if ( $project['images'] ) :  ?>
                <?php foreach ( $project['images'] as $i => $art ) : ?>
                        <div class="portfolio-lightbox-image" <?php 
                            echo ' data-ohio-lightbox-image="' . esc_url( $art['url'] ) . '"';
                        ?>></div>
                <?php endforeach; ?>
            <?php else : ?>
                <div class="portfolio-lightbox-image" <?php 
                    echo ' data-ohio-lightbox-image="' . $project['featured_image'] . '"';
                ?>></div>
            <?php endif; ?>
        </div>
    </div>
    <div class="clb-portfolio-lightbox-details">
        <div class="close close-bar">
            <div class="clb-close close-bar-btn btn-round" tabindex="0">
                <i class="ion ion-md-close"></i>
            </div>
        </div>
        <div class="project-page">
            <div class="project-page-content animated-holder">
                <div class="category-date">
                    <?php if ( OhioOptions::get_global( 'lightbox_category_visibility' ) ) : ?>
                        <?php if ( $project['raw_categories'] ) : ?>
                            <div class="category-holder">
                                <?php foreach ( $project['raw_categories'] as $category ) : ?>
                                    <span class="category"><a href="<?php echo esc_url( get_term_link( $category->term_id ) ); ?>"><?php echo esc_html( $category->name ); ?></a></span>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if ( OhioOptions::get_global( 'lightbox_date_visibility' ) ) : ?>
                        <span class="date"><?php echo esc_html( $project['date'] ); ?></span>
                    <?php endif; ?>
                </div>

                <h3 class="project-page-headline"><?php echo esc_html( $project['title'] ); ?></h3>
                <?php if ( $show_description ) : ?>
                    <div class="project-description">
                        <?php $project['short_lightbox_description'] = strip_tags($project['short_lightbox_description']); ?>
                        <?php echo wp_kses($project['short_lightbox_description'], 'post'); ?>
                    </div>
                <?php endif; ?>
                <?php if ( $show_details ) : ?>
                    <ul class="project-meta">
                        <?php if ( $project['strategy'] ) : ?>
                            <li>
                                <h6 class="project-meta-title"><?php esc_html_e( 'Strategy', 'ohio' ); ?></h6>
                                <p><?php echo wp_kses( $project['strategy'], 'default' ); ?></p>
                            </li>
                        <?php endif; ?>

                        <?php if ( $project['design'] ) : ?>
                            <li>
                                <h6 class="project-meta-title"><?php esc_html_e( 'Design', 'ohio' ); ?></h6>
                                <p><?php echo wp_kses( $project['design'], 'default' ); ?></p>
                            </li>
                        <?php endif; ?>

                        <?php if ( $project['client'] ) : ?>
                            <li>
                                <h6 class="project-meta-title"><?php esc_html_e( 'Client', 'ohio' ); ?></h6>
                                <p><?php echo wp_kses( $project['client'], 'default' ); ?></p>
                            </li>
                        <?php endif; ?>

                        <?php if ( $project['custom_fields'] ) : ?>
                            <?php foreach ( $project['custom_fields'] as $custom_field ) : ?>
                            <li>
                                <h6 class="project-meta-title"><?php echo esc_html( $custom_field['title'] ); ?></h6>
                                <p><?php echo esc_html( $custom_field['value'] ); ?></p>
                            </li>
                            <?php endforeach; ?>
                        <?php endif; ?>

                        <?php if ( $project['raw_tags'] ) { ?>
                            <li>
                                <h6 class="project-meta-title"><?php esc_html_e( 'Tags', 'ohio' ); ?></h6>
                                <p>
                                    <?php if ( $project['raw_tags'] ) : ?>
                                        <?php foreach ( $project['raw_tags'] as $i => $tag ) : ?>
                                            <a href="<?php echo esc_url( get_term_link( $tag->term_id ) ); ?>"><?php echo esc_html( $tag->name ); ?></a><?php
                                                if ( $i < count($project['raw_tags']) - 1 ) echo ', ';
                                            ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </p>
                            </li>
                        <?php } ?>
                    </ul>
                <?php endif; ?>

                <?php if ( $project['show_view_link_in_popup'] ) : ?>
                    <a href="<?php echo esc_url( $project['url'] ); ?>" class="btn btn-link"<?php echo esc_attr($project['external']) ? ' target="_blank"' : ''?>>
                        <?php echo esc_html( $view_text, 'ohio' ); ?>
                        <i class="ion-right ion"><svg class="arrow-icon" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 8H15M15 8L8.5 1.5M15 8L8.5 14.5" stroke-width="2" stroke-linejoin="round"/></svg></i>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="gallery-close" data-popup-close="true">
        <span class="ion-ios-close-empty"></span>
    </div>
</div>

<?php endif;