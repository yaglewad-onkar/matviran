<?php
global $post, $wp_embed;

# Project settings
$project = OhioObjectParser::parse_to_project_object($post);

if (is_array($project['images_full']) && count($project['images_full']) > 0) {
    $project['images'] = $project['images_full'];
}

$is_featured_image = OhioOptions::get( 'project_add_featured_on_page', true );

if ( !$is_featured_image ) {
	if ( $project['featured_image'] ) {
		array_shift($project['images']);
	}
}

$video_btn_style = OhioOptions::get( 'project_video_button_style', 'default' );

# Header previous button
$previous_btn = OhioOptions::get_global( 'page_header_previous_button', true );

# Slider options
$navBtn = OhioOptions::get( 'project_nav_visibility' );
$loop = OhioOptions::get( 'project_loop_mode' );
$autoplay = OhioOptions::get( 'project_autoplay_mode' );
$autoplayTimeout = OhioOptions::get( 'project_autoplay_interval', '', NULL, true );
$pagination = OhioOptions::get( 'project_bullets_visibility', true );

$slider_pagination_data = '';
if ($pagination) {
    $slider_pagination_type = OhioOptions::get( 'project_bullets_type');
    if ($slider_pagination_type == 'bullets') {
        $slider_pagination_data = 'data-slider-dots="true"';
    } else if ($slider_pagination_type == 'pagination') {
        $slider_pagination_data = 'data-slider-pagination="true"';
    }
}

# Page container settings
$show_breadcrumbs = OhioOptions::get( 'page_breadcrumbs_visibility', true );
$page_wrapped = OhioOptions::get( 'page_add_wrapper', true );
$add_content_padding = OhioOptions::get( 'page_add_top_padding', true );
$image_scroll_effect = OhioOptions::get( 'project_gallery_scrolling_effect', true );

$page_container_class = '';
$custom_page_container_class = '';
$paralax_bg_attr = '';
if (!$show_breadcrumbs && $add_content_padding) {
    $page_container_class .= ' top-offset';
}
if (!$page_wrapped) {
    $page_container_class .= ' full';
    $custom_page_container_class .= ' full';
}
if ($add_content_padding) {
    $page_container_class .= ' bottom-offset';
}

if ($show_breadcrumbs) {
    get_template_part('parts/elements/breadcrumbs');
}

if ( $image_scroll_effect == 'scale' ) {
    $page_container_class .= ' scroll-scale-image';
    $paralax_bg_attr = 'class=scale-bg';
} else if ( $image_scroll_effect == 'parallax' ) {
    $paralax_bg_attr = 'class=parallax data-parallax-bg=vertical data-parallax-speed=.5';
}

wp_reset_query();
?>
<?php if ($project['custom_content_position'] == 'top') : ?>
    <div class="page-container <?php echo esc_attr($custom_page_container_class); ?>">
        <div class="project-page-custom-content">
            <?php 
                the_content();
                // echo do_shortcode( get_post_field( 'post_content', $post->ID ) ); // Old way
            ?>
        </div>
    </div>
<?php endif; ?>

<div class="project-page project layout-type8<?php echo esc_attr($page_container_class); ?>">
    <div class="project-page-media-holder">
        <div class="project-fullscreen-slider" <?php echo count($project['images']) > 1 ? 'data-portfolio-grid-slider' : '' ?> data-slider-navigation="<?php echo esc_attr($navBtn);?>" data-slider-loop="<?php echo esc_attr($loop);?>" data-slider-autoplay="<?php echo esc_attr($autoplay);?>" data-slider-autoplay-time="<?php echo esc_attr($autoplayTimeout);?>" <?php echo esc_attr($slider_pagination_data);?>>
            <?php if (is_array($project['images'])) : ?>
                <?php foreach ($project['images'] as $art) : ?>
                    <div <?php echo esc_attr($paralax_bg_attr); ?>>
                        <div class="project-image <?php echo esc_attr($image_scroll_effect == 'parallax' ? 'parallax-bg' : '')  ?>" 
                            style="background-image:url('<?php echo esc_url( $art['url'] ); ?>')" 
                            alt="<?php echo esc_attr( $art['alt'] ) ?>"><div class="project-image-overlay"></div></div> 
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>      
    </div>
    <div class="page-container">
        <div class="project-page-content">
            <div class="vc_row animated-holder">
                <div class="vc_col-md-12">
                    <?php if (isset($project['video']['link']) && !empty($project['video']['link'])) : ?>
                        <div class="ohio-video-module-sc video-module with-animation open-popup" data-video-module="<?php echo esc_url($project['video']['link']); ?>">
                            <div class="btn-play btn-round <?php if ($video_btn_style == 'outline') { echo ' btn-round-outline btn-round-light'; } ?> " tabindex='1'>
                                <i class="ion ion-ios-play"></i>
                            </div>
                        </div><br>
                    <?php endif; ?>
                </div>

                <div class="vc_col-md-12 date-and-category">
                    <?php if ( $project['raw_categories'] ) : ?>
                        <div class="category-holder">
                            <?php foreach ( $project['raw_categories'] as $category ) : ?>
                                <span class="category"><a href="<?php echo esc_url( get_term_link( $category->term_id ) ); ?>"><?php echo esc_html( $category->name ); ?></a></span>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <?php if ( $project['date'] ) : ?>
                        <span class="date"><?php echo esc_html( $project['date'] ); ?></span>
                    <?php endif; ?>
                </div>

                <div class="vc_col-md-12 project-title">
                    <?php the_title( '<h1 class="headline">', '</h1>'); ?>
                </div>

                <div class="vc_col-md-7">
                    <div class="project-description">
                        <?php echo $wp_embed->run_shortcode( do_shortcode( wp_kses_post( $project['description'] ) ) ); ?>
                        <?php 
                            if ( $project['custom_content_position'] == 'after_description' ) {
                                the_content();
                                // echo do_shortcode( get_post_field( 'post_content', $post->ID ) ); // Old way
                            }
                        ?>
                    </div>
                </div>
                <div class="vc_col-md-6">
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

                        <?php if ( $project['tags'] ) { ?>
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
                </div>

                <div class="vc_col-md-12">
                    <?php if ( $project['link'] ) : ?>
                        <a href="<?php echo esc_url( $project['link'] ); ?>" class="btn btn-link" target="_blank">
                            <?php esc_html_e( 'Open Project', 'ohio' ); ?>
                            <i class="ion-right ion"><svg class="arrow-icon" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 8H15M15 8L8.5 1.5M15 8L8.5 14.5" stroke-width="2" stroke-linejoin="round"/></svg></i>
                        </a>
                    <?php endif; ?>
                </div>
            </div>

            <?php if ( $project['show_sharing'] && $project['sharing_links'] && count( $project['sharing_links'] ) > 0 ) : ?>
                <div class="clb-share-bar">
                    <div class="socialbar socialbar-horizontal flat">
                        <?php printf('%s', $project['sharing_links_html']); ?>
                    </div>  
                </div>  
            <?php endif; ?>
        </div>
    </div>
</div>

<?php if ($project['custom_content_position'] == 'bottom') : ?>
    <div class="page-container <?php echo esc_attr($custom_page_container_class); ?>">
        <div class="project-page-custom-content">
            <?php 
                the_content();
                // echo do_shortcode( get_post_field( 'post_content', $post->ID ) ); // Old way
            ?>
        </div>
    </div>
<?php endif; ?>

<?php if ( $previous_btn ): ?>
    <?php get_template_part('parts/elements/back_link');?>
<?php endif; ?>

<?php if ( $project['show_navigation'] ) {
    get_template_part('parts/elements/nav_projects');
}?>