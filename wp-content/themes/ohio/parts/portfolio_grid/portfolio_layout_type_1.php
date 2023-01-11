<?php
$project = OhioHelper::get_storage_item_data();

$wrap_classes = [];
if ($project['metro_style']) {
    $wrap_classes[] = 'metro-style';
}

if ( isset( $brand_classes ) ) extract( $brand_classes );

$hover_effect = $project['hover_effect'];
$wrap_classes[] = $project['boxed'];
$parallax_class = $parallax_img_class = "";

switch ($hover_effect) {
    case 'type2':
        $wrap_classes[] = 'hover-color-overlay';
        break;
    case 'type3':
        $wrap_classes[] = 'hover-greyscale';
        break;
    case 'type4':
        $wrap_classes[] = 'hover-parallax-img';
        $parallax_class = 'parallax-holder';
        $parallax_img_class = 'parallax';
        break;
    default:
        $wrap_classes[] = 'hover-scale-img hover-color-overlay';
        break;
}

if ( isset( $background_class ) && $background_class != '' ) $wrap_classes[] = $background_class;

// $wrap_classes[] = $css_class;
$alignment = OhioOptions::get_global( 'projects_text_alignment', 'left' );

?>

<div class="portfolio-item portfolio-item-grid portfolio-grid-type-1 <?php echo esc_attr( implode( ' ', $wrap_classes ) ); ?>"<?php if ($project['in_popup']) {
    echo ' data-portfolio-popup="' . esc_attr($project['popup_id']) . '"';
} ?>>
    <div data-cursor-class="cursor-link" class="portfolio-item-image <?php echo esc_attr( $parallax_class ); ?>">

        <!-- Project image -->
        <?php if ($project['featured_image'] && !$project['metro_style']) : ?>
            <a href="<?php echo esc_url($project['url']); ?>"<?php if ($project['external']) { echo ' target="_blank"'; } ?>>
                <img class="<?php echo esc_attr($parallax_img_class); ?>" src="<?php echo esc_url($project['featured_image']); ?>" alt="<?php echo esc_attr($project['title']); ?>">
            </a>
            <?php if (isset($project['video']['link']) && !empty($project['video']['link'])) : ?>

                <div class="ohio-video-module-sc video-module with-animation open-popup" data-video-module="<?php echo esc_url($project['video']['link']); ?>">
                    <div class="btn-play btn-round <?php if ($project['video_button_style'] == 'outline') { echo ' btn-round-outline'; } ?>" >
                        <i class="ion ion-ios-play"></i>
                    </div>
                </div>
            <?php endif; ?>

        <?php else: ?>
            <a href="<?php echo esc_url($project['url']); ?>"<?php if ($project['external']) { echo ' target="_blank"'; } ?>>
                <div class="portfolio-metro-image parallax" <?php if ($project['metro_style']) {
                    echo ' data-ohio-bg-image="' . esc_url($project['featured_image']) . '"';
                } ?>>
                </div>
            </a>
            <?php if (isset($project['video']['link']) && !empty($project['video']['link'])) : ?>

                <div class="ohio-video-module-sc video-module with-animation open-popup" data-video-module="<?php echo esc_url($project['video']['link']); ?>">
                    <div class="btn-play btn-round <?php if ($project['video_button_style'] == 'outline') { echo ' btn-round-outline'; } ?>" >
                        <i class="ion ion-ios-play"></i>
                    </div>
                </div>
            <?php endif; ?>

        <?php endif; ?>

        <?php if( $project['in_popup'] ): ?>
            <div class="btn-lightbox btn-round btn-round-outline btn-round-small btn-round-light" tabindex="1">
                <i class="ion ion-md-expand"></i>
            </div>
        <?php endif; ?>
    </div>
    <div class="portfolio-item-details text-<?php echo esc_attr($alignment) ?>">
        <h3 class="portfolio-item-headline title <?php if ( isset ( $title_class ) ) echo esc_attr( $title_class ); ?>"><?php echo esc_html($project['title']); ?></h3>
        <?php if ($project['category_visible'] !== false) : ?>
            <?php if ( $project['raw_categories'] ) : ?>
                <div class="category-holder">
                    <?php foreach ( $project['raw_categories'] as $category ) : ?>
                        <span class="category <?php if ( isset( $category_class ) ) echo esc_attr( $category_class ); ?>"><a href="<?php echo esc_url( get_term_link( $category->term_id ) ); ?>"><?php echo esc_html( $category->name ); ?></a></span>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <div class="show-project">
                <div class="show-project-link">
                    <a href="<?php echo esc_url($project['url']); ?>"<?php if ($project['external']) {
                        echo ' target="_blank"';
                    } ?>>
                        <?php esc_html_e('Show project', 'ohio') ?>
                    </a> 
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>