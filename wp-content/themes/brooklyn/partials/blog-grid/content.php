<?php

$hide_meta_categories = $args['hide_meta_categories'] ?? false;
$hide_meta_footer = $args['hide_meta_footer'] ?? false;
$excerpt = $args['excerpt'] ?? ot_get_option( 'ut_blog_grid_excerpt_length', 20 );

// Thumbnail 
$has_post_thumbnail = has_post_thumbnail();

if( $has_post_thumbnail ) {
    
    // featured image
    $fullsize = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) ); 
    $fullsizeID = ut_get_attachment_id_from_url( $fullsize );
    
}

if( ( get_post_type( get_the_ID() ) == 'page' || get_post_type( get_the_ID() ) == 'portfolio' ) && !$has_post_thumbnail ) {
    
    $ut_hero_type = get_post_meta( get_the_ID(), 'ut_page_hero_type', true );
    
    if( $ut_hero_type == 'image' || $ut_hero_type == 'splithero' || $ut_hero_type == 'tabs' ) {
        
        // check for hero image
        $fullsize = get_post_meta( get_the_ID(), 'ut_page_hero_image', true );
        $fullsize = !empty( $fullsize[ 'background-image' ] ) && is_array( $fullsize ) ? $fullsize[ 'background-image' ] : $fullsize;
        
        if( !empty( $fullsize ) && !is_array( $fullsize ) ) {

            $has_post_thumbnail = true;
            $fullsizeID = ut_get_attachment_id_from_url( $fullsize );

        }
        
    }
        
    if( $ut_hero_type == 'animatedimage' )  {

        $fullsize = get_post_meta( get_the_ID(), 'ut_page_hero_animated_image', true );
        
        if( !empty( $fullsize ) ) {
            
            $has_post_thumbnail = true;
            $fullsizeID = ut_get_attachment_id_from_url( $fullsize );
            
        }
        
    }
    
    if( $ut_hero_type == 'video' )  {
        
        $fullsize = get_post_meta( get_the_ID(), 'ut_page_video_poster', true );
        
        if( !empty( $fullsize ) ) {
            
            $has_post_thumbnail = true;
            $fullsizeID = ut_get_attachment_id_from_url( $fullsize );
            
        }

    }
        
    if( $ut_hero_type == 'imagefader' )  {
				
        $gallery = get_post_meta( get_the_ID(), 'ut_page_hero_image_fader', true );
        
        if( !empty( $gallery ) ) {

            $gallery = explode( ',', $gallery );

            foreach( $gallery as $key => $image ) {
                
                $has_post_thumbnail = true;
                
                $fullsize = wp_get_attachment_url( $image ); 
                $fullsizeID = $image;
                
                break;

            }

        }

    }
    
} ?>

<article id="post-<?php the_ID(); ?>" <?php post_class( ut_get_article_size('ut-blog-grid-article clearfix') ); ?>>
    
    <div class="ut-blog-grid-article-inner">
    	
		<?php if( !$hide_meta_categories ) : ?>
		
			<div class="entry-meta entry-meta-top <?php echo !$has_post_thumbnail ? 'entry-meta-top-has-border' : ''; ?> clearfix">

				<?php
					/* translators: used between list items, there is a space after the comma */
					$categories_list = get_the_category_list( esc_html__( ', ', 'unitedthemes' ) );
					if ( $categories_list && unitedthemes_categorized_blog() ) :
				?>
				<span class="ut-sticky"><?php echo unite_get_blog_icon( 'sticky' ); ?></span>
				<span class="cat-links"><?php echo unite_get_blog_icon( 'category' ); ?><?php printf( esc_html__( '%1$s', 'unitedthemes' ), $categories_list ); ?></span>

				<?php endif; ?>

			</div>
			<!-- close entry-meta -->    

		<?php endif; ?>
		
        <?php if ( $has_post_thumbnail && ! post_password_required() ) : ?>                

        <!-- ut-post-thumbnail -->
        <div class="ut-post-thumbnail">     

            <div class="entry-thumbnail">

                <?php
                
                $caption   = get_post( $fullsizeID )->post_excerpt; ?>

                <a title="<?php printf(esc_html__('Permanent Link to %s', 'unitedthemes'), get_the_title()); ?>" href="<?php the_permalink(); ?>">                
                    
                    <figure class="ut-post-thumbnail-caption-wrap">

                        <?php echo UT_Adaptive_Image::create( $fullsizeID, array( '720', '600' ), true, 'landscape' ); ?>

                        <?php if ( $caption ) : ?>

                            <figcaption class="ut-post-thumbnail-caption"><?php echo $caption; ?></figcaption>

                        <?php endif; ?>

                    </figure>
                    
                </a>  
                
                <a href="<?php echo get_month_link( get_the_time('Y'), get_the_time('m') ); ?>">
                
                    <div class="date-format">
                        <span class="day"><?php the_time('d'); ?></span>
                        <span class="month"><?php the_time('M'); ?> <?php the_time('Y'); ?></span>
                    </div>
                
                </a>

            </div>                                                                                                                         

        </div><!-- close ut-post-thumbnail -->

        <?php endif; ?>
        
        <?php if( !$has_post_thumbnail ) : ?>

            <div class="ut-post-thumbnail">

                <div class="entry-thumbnail">

                    <a title="<?php printf(esc_html__('Permanent Link to %s', 'unitedthemes'), get_the_title()); ?>" href="<?php the_permalink(); ?>">

                        <figure class="ut-post-thumbnail-caption-wrap">

                            <?php echo UT_Adaptive_Image::create_placeholder( 'blog' ); ?>

                        </figure>

                    </a>

                    <a href="<?php echo get_month_link( get_the_time('Y'), get_the_time('m') ); ?>">

                        <div class="date-format">
                            <span class="day"><?php the_time('d'); ?></span>
                            <span class="month"><?php the_time('M'); ?> <?php the_time('Y'); ?></span>
                        </div>

                    </a>

                </div>

            </div>
            
        <?php endif; ?>
        
        <a class="ut-blog-link" title="<?php echo esc_attr( wp_strip_all_tags( get_the_title() ) ); ?>" href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">     
              
            <div class="ut-blog-grid-content-wrap"> 

                <?php if( get_the_title() ) :?>

                    <header class="entry-header">

                        <h2 data-responsive-font="grid_blog_title" class="entry-title"><?php the_title(); ?></h2>

                    </header>
                    <!-- close entry-header -->

                <?php endif; ?> 

                <!-- entry-content -->
                <div class="entry-content clearfix">

                    <?php echo unite_get_excerpt_by_id( $post, $excerpt ); ?>

                </div>
                <!-- entry-content -->

            </div>
        
        </a>
        
		<?php
        
        if( !$hide_meta_footer ) : ?>
		
			<div class="entry-meta clearfix">

                <span class="author-links"><?php echo unite_get_blog_icon( 'author', $post->post_author ); ?><?php the_author_posts_link(); ?></span>

				<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>

					<span class="comments-link"><?php echo unite_get_blog_icon( 'comments' ); ?><?php comments_popup_link(esc_html__('No Comments', 'unitedthemes'), esc_html__('1 Comment', 'unitedthemes'), esc_html__('% Comments', 'unitedthemes')); ?></span>

				<?php endif; ?>       

			</div>
		
		<?php endif; ?>
                        
    </div>
    
</article>
<!-- #post-<?php the_ID(); ?> -->