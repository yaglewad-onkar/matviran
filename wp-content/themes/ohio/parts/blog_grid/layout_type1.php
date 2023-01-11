<?php

$ohio_post = OhioHelper::get_storage_item_data();
global $post;
$anim_attrs = '';
if (in_array($ohio_post['animation_type'], array('sync', 'async'))) {
    OhioHelper::add_required_script( 'aos' );

    $anim_attrs .= ' data-aos-once="true"';
    $anim_attrs .= ' data-aos="' . esc_attr($ohio_post['animation_effect']) . '"';
    if ($ohio_post['animation_type'] == 'async') {
        $anim_attrs .= '';
    }
}
if( isset( $ohio_post['meta_visibility'] ) && is_array( $ohio_post['meta_visibility'] ) ) extract( $ohio_post['meta_visibility'] );

$blog_grid_class = '';
if (in_array('sticky', get_post_class('', $ohio_post['post_id']))) {
    $blog_grid_class .= ' sticky';
}
if ($ohio_post['boxed']) {
    $blog_grid_class .= ' boxed';
}
if ($ohio_post['media']['blockquote']) {
    $blog_grid_class .= ' type-blockquote';
}
if ($ohio_post['media']['audio']) {
    $blog_grid_class .= ' type-audio';
}
if (!$ohio_post['preview']) {
    $blog_grid_class .= ' no-preview';
}
if ( $ohio_post['metro_style'] ) {
    $blog_grid_class .= ' metro-style';
}
if ( empty( $ohio_post['media']['image'] ) && empty( $ohio_post['media']['gallery'] ) ) {
    $blog_grid_class .= ' without-media';
}

$hover_effect = $ohio_post['hover_effect'];
$parallax_class = "";

switch ($hover_effect) {
    case 'type2':
        $hover_effect_class = 'hover-color-overlay';
        break;
    case 'type3':
        $hover_effect_class = 'hover-greyscale';
        break;
    case 'type4':
        $hover_effect_class = 'hover-parallax-img';
        $parallax_class = 'parallax-holder';
        break;
    default:
        $hover_effect_class = 'hover-scale-img';
        break;
}

?>
<div class="blog-grid blog-grid-type-1<?php echo esc_attr($blog_grid_class); ?> <?php echo esc_attr($hover_effect_class) ?>" <?php echo esc_attr($anim_attrs); ?>>
    <figure class="blog-grid-image">
        <?php if ($ohio_post['media']['video']) : // Video format ?>
            <?php printf('%s', $ohio_post['media']['video']); ?>

        <?php elseif ($ohio_post['media']['audio']) : // Audio format ?>
            <?php printf('%s', $ohio_post['media']['audio']); ?>

        <?php elseif ($ohio_post['media']['gallery']) : // Gallery format ?>
            <?php printf('%s', $ohio_post['media']['gallery']); ?>

        <?php elseif ($ohio_post['media']['blockquote']) : // Blockquote format ?>
            <?php $ohio_post['preview'] = wp_kses($ohio_post['media']['blockquote'], 'post'); ?>

        <?php elseif ($ohio_post['media']['image']) : // Feature image format ?>

            <a data-cursor-class="cursor-link" class="<?php echo esc_attr( $parallax_class ); ?>" href="<?php echo esc_url($ohio_post['url']); ?>">
                <?php if ( $ohio_post['media']['image'] && !$ohio_post['metro_style'] ) : ?>
                    <img class="parallax" <?php echo $ohio_post['media']['image_atts']; ?>>
                <?php else: ?>
                    <div class="blog-metro-image parallax" <?php if ( $ohio_post['metro_style'] ) { echo ' data-ohio-bg-image="' . esc_url( $ohio_post['media']['image'] ) . '"'; } ?>></div>
                <?php endif; ?>
            </a>

        <?php endif; ?>

        <div class="blog-grid-meta">
            <?php if ( $author_visibility ) : ?>
                <div class="meta-holder">
                    <?php echo get_avatar( $ohio_post['author_id'], '50', 'mystery', $ohio_post['author'], [ 'class' => 'author-avatar' ] ); ?>
                    <div class="author-attributes">
                        <div class="author"><?php esc_html_e('Posted by', 'ohio'); ?> <b><?php echo esc_html($ohio_post['author']); ?></b></div>
                        <span class="date"><?php echo esc_html($ohio_post['date']); ?></span>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </figure>

    <div class="blog-grid-content text-<?php echo esc_attr($ohio_post['alignment']); ?>">
        <div class="post-details">
            <?php if ( $category_visibility ) : ?>
                <div class="category-holder">
                    <?php if (in_array('sticky', get_post_class('', $ohio_post['post_id']))) : ?>
                        <span class="category category-sticky"><?php esc_html_e('Featured', 'ohio'); ?></span>
                    <?php endif; ?>

                    <?php foreach ($ohio_post['categories'] as $_category) : ?>
                        <a class="category" href="<?php echo esc_url(get_category_link($_category->cat_ID)); ?>"><?php echo esc_html($_category->name); ?></a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <?php if ( $reading_time_visibility ) : ?>
                <span class="post-meta-estimate">
                    <?php echo esc_html($ohio_post['reading_estimate']) . ' ' . esc_html__( 'min read', 'ohio' ); ?>
                </span>
            <?php endif; ?>
        </div>
        <h3 class="blog-grid-headline">
            <?php if (in_array('sticky', get_post_class('', $ohio_post['post_id']))) : ?>
                <svg class="sticky-icon" width="14" height="20" viewBox="0 0 14 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M11.6667 2.22222V15.6667L8.4 13.4444L7 12.5556L5.6 13.4444L2.33333 15.6667V2.22222H11.6667ZM14 0H0V20L7 15.2222L14 20V0Z" fill="#232226"/></svg>
            <?php endif; ?>
            <a class="underline" href="<?php echo esc_url($ohio_post['url']); ?>">
                <?php echo esc_html($ohio_post['title']); ?>
            </a>
        </h3>

        <?php if ( $short_description_visibility ) : ?>
            <p><?php echo $ohio_post['preview']; ?></p>
        <?php endif; ?>

        <?php if ( $read_more_visibility ) : ?>
            <a href="<?php echo esc_url($ohio_post['url']); ?>" class="btn btn-link brand-color-hover">
                <?php esc_html_e( 'Read More', 'ohio' ); ?>
                <i class="ion-right ion"><svg class="arrow-icon" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 8H15M15 8L8.5 1.5M15 8L8.5 14.5" stroke-width="2" stroke-linejoin="round"/></svg></i>
            </a>
        <?php endif; ?>
    </div>
</div>