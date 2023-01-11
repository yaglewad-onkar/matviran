<?php 
global $post, $wp_embed;

# Project settings
$project = OhioObjectParser::parse_to_project_object( $post );

if ( is_array( $project['images_full'] ) && count( $project['images_full'] ) > 0 ) {
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

# Page container settings
$show_breadcrumbs = OhioOptions::get( 'page_breadcrumbs_visibility', true );
$page_wrapped = OhioOptions::get( 'page_add_wrapper', true );
$add_content_padding = OhioOptions::get( 'page_add_top_padding', true );
$show_header_title = OhioOptions::get( 'page_header_title_visibility', true );
$header_blank_spacer = OhioOptions::get( 'page_header_add_cap', true );

$page_container_class = '';
$custom_page_container_class = '';
if (!$show_breadcrumbs && !$add_content_padding && !$show_header_title && !$header_blank_spacer) {
    $page_container_class .= ' full-top-position'; 
}
if ( !$show_breadcrumbs && $add_content_padding ) {
	$page_container_class .= ' top-offset'; 
}
if ( ! $page_wrapped ) {
	$page_container_class .= ' full';
	$custom_page_container_class .= ' full';
}
if ( $add_content_padding ) {
	$page_container_class .= ' bottom-offset';
}

if ( $show_breadcrumbs ) {
	get_template_part( 'parts/elements/breadcrumbs' );
}

wp_reset_query();
?>

<?php if ( $project['custom_content_position'] == 'top' ) : ?>
	<div class="page-container <?php echo esc_attr( $custom_page_container_class ); ?>">
		<div class="project-page-custom-content">
            <?php 
                the_content();
                // echo do_shortcode( get_post_field( 'post_content', $post->ID ) ); // Old way
            ?>
		</div>
	</div>
<?php endif; ?>

<div class="page-container project-page layout-type3<?php echo esc_attr( $page_container_class ); ?>" id="scroll-portfolio">
	<div class="vc_row">
		<div class="vc_col-md-6 vc_col-sm-12 project-page-media-holder" data-scroll-share-bar="true">
            <?php if ( $project['show_sharing'] && $project['sharing_links'] && count( $project['sharing_links'] ) > 0 ) : ?>
                <div class="clb-share-bar">
                    <div class="socialbar small flat">
                        <?php printf('%s', $project['sharing_links_html']); ?>
                    </div>  
                </div>  
            <?php endif; ?>
            <?php if ( is_array( $project['images'] ) ) : ?>
                <?php foreach ( $project['images'] as $key => $art ) : ?>
                    <?php if ($key == 0 ) : ?>
                        <div class="project-first-image">
                            <img src="<?php echo esc_url( $art['url'] ); ?>" alt="<?php echo esc_attr( $art['alt'] ); ?>">
                            <?php if (isset($project['video']['link']) && !empty($project['video']['link'])) : ?>
                                <div class="ohio-video-module-sc video-module with-animation open-popup" data-video-module="<?php echo esc_url($project['video']['link']); ?>">
                                    <div class="btn-play btn-round <?php if ($video_btn_style == 'outline') { echo ' btn-round-outline'; } ?>" tabindex='1'>
                                        <i class="ion ion-ios-play"></i>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php else:  ?>
                        <img src="<?php echo esc_url( $art['url'] ); ?>" alt="<?php echo esc_attr( $art['alt'] ); ?>">
                    <?php endif ?>
                <?php endforeach; ?>
            <?php endif; ?>

		</div>
		<div class="vc_col-lg-6 vc_col-md-6 vc_col-sm-12 project-page-sticky-container">
			<div class="project-page-sticky" >
				<div class="project-page-content">
                    <?php if ( !$show_header_title ): ?>
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
                        <div class="project-title">
                            <?php the_title( '<h1 class="headline">', '</h1>'); ?>
                        </div>
                    <?php endif; ?>

                    <div class="project-description">
                        <?php echo $wp_embed->run_shortcode( do_shortcode( wp_kses_post( $project['description'] ) ) ); ?>
                        <?php 
                            if ( $project['custom_content_position'] == 'after_description' ) {
                                the_content();
                                // echo do_shortcode( get_post_field( 'post_content', $post->ID ) ); // Old way
                            }
                        ?>
                        <?php if ( $project['task'] ) :?>
                            <div class="project-task">
                                <h6 class="heading-sm"><?php esc_html_e( 'Task', 'ohio' ); ?></h6>
                                <p class="project-task-description"><?php echo wp_kses( $project['task'], 'default' ); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>

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

					<?php if ( $project['link'] ) : ?>
                        <a href="<?php echo esc_url( $project['link'] ); ?>" class="btn btn-link" target="_blank">
                            <?php esc_html_e( 'Open Project', 'ohio' ); ?>
                            <i class="ion-right ion"><svg class="arrow-icon" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 8H15M15 8L8.5 1.5M15 8L8.5 14.5" stroke-width="2" stroke-linejoin="round"/></svg></i>
                        </a>
                    <?php endif; ?>
				</div>
			</div>
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

<?php if ( !$show_header_title ): ?>
    <?php if ( $previous_btn ): ?>
        <?php get_template_part('parts/elements/back_link');?>
    <?php endif; ?>
<?php endif; ?>

<?php if ( $project['show_navigation'] ) {
    get_template_part('parts/elements/nav_projects');
}?>