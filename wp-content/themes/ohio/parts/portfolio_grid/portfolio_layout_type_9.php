<?php
$project = OhioHelper::get_storage_item_data();
$_project_uniqid = false;
if ($project['overlay'] && preg_match("/^\#[a-zA-Z0-9]{6}$/i", trim($project['overlay']))) {
    $_project_uniqid = uniqid('ohio_post_style_');
    $_overlay_color = OhioHelper::hex_to_rgba($project['overlay'], 0.5);
}

$wrap_classes = [];
if ( isset( $brand_classes ) ) extract( $brand_classes );
$css_class = '';

$wrap_classes[] = $css_class;
if ( isset( $background_class ) ) $wrap_classes[] = $background_class;

?>

<div class="portfolio-item portfolio-item-fullscreen portfolio-grid-type-9 <?php echo esc_attr( implode( ' ', $wrap_classes ) ); ?>"<?php if ($_project_uniqid) {
    echo ' id="' . esc_attr($_project_uniqid) . '"';
} ?><?php if ($project['in_popup']) {
    echo ' data-portfolio-popup="' . esc_attr($project['popup_id']) . '"';
} ?>>
    <div class="portfolio-item-overlay ">
        <div class="page-container">
            <div class="vc_col-md-6 portfolio-item-image-box parallax-holder">
                <a href="<?php echo esc_url($project['url']); ?>"<?php if ($project['external']) {echo ' target="_blank"';} ?>> 
                    <div class="portfolio-item-image parallax" data-cursor-class="cursor-link" <?php echo ' data-ohio-bg-image="' . esc_url($project['featured_image']) . '"'; ?>></div>
                </a>
                
                <?php if (isset($project['video']['link']) && !empty($project['video']['link'])) { ?>
                    <div class="portfolio-details-video with-animation ohio-video-module-sc video-module open-popup"
                         data-video-module="<?php echo esc_url($project['video']['link']); ?>">
                        <div class="btn-play btn-round <?php if ($project['video_button_style'] == 'outline') { echo ' btn-round-outline'; } ?>" tabindex='1'>
                            <i class="ion ion-ios-play"></i>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="vc_col-md-5 vc_col-md-push-1 portfolio-item-details-box">
                <div class="portfolio-details animated-holder">
                    <?php if ($project['more_visible'] !== false) : ?>
                        <div class="portfolio-details-link vc_hidden-lg vc_hidden-md vc_hidden-sm">
                            <a class="btn btn-link btn-lightbox" href="<?php echo esc_url($project['url']); ?>">
                                <?php esc_html_e('Show Project', 'ohio') ?>
                                <i class="ion-right ion"><svg class="arrow-icon" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 8H15M15 8L8.5 1.5M15 8L8.5 14.5" stroke-width="2" stroke-linejoin="round"/></svg></i>
                            </a>
                        </div>
                    <?php endif; ?>
                    <?php if ( OhioOptions::get_global( 'portfolio_descr_visibility' ) ) : ?>
                        <div class="portfolio-details-description">
                            <div class="short-description <?php if ( isset( $short_description_class ) ) echo esc_attr( $short_description_class ); ?>"><?php echo esc_html($project['short_description']); ?></div>
                        </div>
                    <?php endif; ?>
                    <div class="animated-holder">
                        <?php if ($project['category_visible'] !== false) : ?>
                            <?php if ($project['raw_categories']) : ?>
                                <div class="portfolio-details-categories">
                                    <div class="category-holder">
                                        <?php foreach ( $project['raw_categories'] as $category ) : ?>
                                            <span class="category <?php if ( isset( $category_class ) ) echo esc_attr( $category_class ); ?>"><a href="<?php echo esc_url( get_term_link( $category->term_id ) ); ?>"><?php echo esc_html( $category->name ); ?></a></span>
                                        <?php endforeach; ?>
                                    </div>
                                    <?php if ( OhioOptions::get_global( 'portfolio_date_visibility' ) ) : ?>
                                        <span class="portfolio-details-date <?php if ( isset( $date_class ) ) echo esc_attr( $date_class ); ?>"><?php echo esc_html($project['date']) ?></span>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>

                        <div class="portfolio-details-title">
                            <a href="<?php echo esc_url($project['url']); ?>"<?php if ($project['external']) {
                                echo ' target="_blank"';
                            } ?>>
                                <h2 class="portfolio-details-headline title <?php if ( isset( $title_class ) ) echo esc_attr( $title_class ); ?>"><?php echo esc_html($project['title']); ?></h2>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
            <div class="portfolio-item-bg-title">
                <span class="bg-title"><?php echo esc_html($project['title']); ?></span>
            </div>
        </div> 

        <div class="next-project-img-box cursor-as-pointer" data-cursor-class="cursor-link">
            <div class="next-project-img" <?php echo ' data-ohio-bg-image="' . esc_url($project['prev_item_featured_image']) . '"'; ?>></div>
        </div>
    </div>
</div>