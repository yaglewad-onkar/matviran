<?php
$project = OhioHelper::get_storage_item_data();
$alignment = OhioOptions::get_global( 'projects_text_alignment', 'left' );
?>

<div class="portfolio-item portfolio-item-grid portfolio-grid-type-8"
    data-featured-image="<?php echo esc_url($project['featured_image']); ?>"
    <?php if ( $project['in_popup'] ) echo 'data-portfolio-popup="' . esc_attr( $project['popup_id'] ) . '"'; ?>>

    <div class="portfolio-item-details text-<?php echo esc_attr($alignment) ?>">
        <a href="<?php echo esc_url($project['url']); ?>"<?php if ($project['external']) { echo ' target="_blank"'; } ?> class="<?php if ( $project['in_popup'] ) echo esc_attr( "btn-lightbox" ); ?>" >
            <h2 class="portfolio-item-headline title <?php if ( isset ( $title_class ) ) echo esc_attr( $title_class ); ?>"><?php echo esc_html($project['title']); ?></h2>
            <?php if ($project['category_visible'] !== false) : ?>
                <?php if ($project['raw_categories']) : ?>
                    <div class="category-holder">/
                        <?php foreach ( $project['raw_categories'] as $category ) : ?>
                            <span class="category <?php if ( isset( $category_class ) ) echo esc_attr( $category_class ); ?>"><a href="<?php echo esc_url( get_term_link( $category->term_id ) ); ?>"><?php echo esc_html( $category->name ); ?></a></span>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </a>
    </div>
</div>