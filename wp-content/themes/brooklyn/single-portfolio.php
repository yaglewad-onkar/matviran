<?php
/**
 * The template for displaying single portfolio pages.
 *
 * @package unitedthemes
 */

global $post;

/* check if page header has been activated */
if( ut_page_option( 'ut_display_section_header', 'show', 'ut_' ) == 'show' ) {

    $page_title_classes         = array();

    $ut_page_slogan             = get_post_meta( get_the_ID() , 'ut_section_slogan' , true );
    
    $ut_page_header_style       = get_post_meta( get_the_ID() , 'ut_section_header_style' , true ); 
    $ut_page_header_style       = ( !empty($ut_page_header_style) && $ut_page_header_style != 'global' ) ? $ut_page_header_style : ot_get_option('ut_global_page_headline_style');

    // Glitch Effect
    if( ut_collect_option( 'ut_page_title_glitch', 'off' ) == 'on' ) {

        $page_title_classes[] = 'ut-glitch';
        $page_title_classes[] = ut_collect_option( 'ut_page_title_glitch_style', 'ut-glitch-1' );

    }

    // Distortion Effect
    $glitch_classes = array();
    $glitch_attributes = array();

    if( ut_collect_option( 'ut_page_title_glitch_appear', 'off' ) != 'off' ) {

        // Glitch on Appear
        if( ut_collect_option( 'ut_page_title_glitch_appear', 'off' ) == 'on_appear' ) {

            $glitch_classes[] = 'ut-glitch-on-appear';
            $glitch_attributes['data-ut-glitch-class'] = 'ut-simple-glitch-text-' . ut_collect_option( 'ut_page_title_glitch_appear_style', 'style-1' );

        }

        // Glitch Permanent
        if( ut_collect_option( 'ut_page_title_glitch_appear', 'off' ) == 'permanent' ) {

            $glitch_classes[] = 'ut-simple-glitch-text-permanent';
            $glitch_classes[] = 'ut-simple-glitch-text-' . ut_collect_option( 'ut_page_title_glitch_appear_style', 'style-1' ) . '-permanent';

        }

    }

    // attributes string
    $glitch_attributes = implode(' ', array_map(
        function ($v, $k) { return sprintf("%s=\"%s\"", $k, $v); },
        $glitch_attributes,
        array_keys( $glitch_attributes )
    ) );

    // Glow Effect
    if( ut_collect_option( 'ut_page_title_glow', 'off' ) == 'on' && $ut_page_header_style != 'pt-style-1' ) {
        $page_title_classes[] = 'ut-glow';
    }

    // Stroke Effect
    if( ut_collect_option( 'ut_page_title_stroke_effect', 'off' ) == 'on' ) {
        $page_title_classes[] = 'ut-text-stroke';
    }

    /* header width */
    $ut_page_header_width       = get_post_meta( get_the_ID() , 'ut_section_header_width' , true );
    if( !$ut_page_header_width || $ut_page_header_width == 'global' ) {
        $ut_page_header_width = ot_get_option( 'ut_global_page_headline_width', 'seven' );    
    }    
    $ut_page_header_width       = ( $ut_page_header_width == 'ten' ) ? 'grid-100' : 'grid-70 prefix-15';
    
    /* header align */
    $ut_page_header_text_align  = get_post_meta( get_the_ID() , 'ut_section_header_text_align' , true);
    if( !$ut_page_header_text_align || $ut_page_header_text_align == 'global' ) {
        $ut_page_header_text_align = ot_get_option( 'ut_global_page_headline_align', 'center' );
    }
    $ut_page_header_text_align = 'header-' . $ut_page_header_text_align; 
        
}

/* post format */
$post_format             = get_post_format();

/* needed variables */
$content = $the_content  = NULL; 
$pageslogan              = get_post_meta( $post->ID , 'ut_page_slogan' , true ); 
$socialshare             = get_option('portfolio_social_setting');
$socialshare_border      = get_option('portfolio_social_border');
$socialshare_border      = empty($socialshare_border) ? 'on' : $socialshare_border; 

/* color and css */
$ut_page_skin            = get_post_meta( $post->ID , 'ut_section_skin' , true);
$ut_page_class           = get_post_meta( $post->ID , 'ut_section_class' , true); ?>

<?php get_header(); ?>
    
    <?php if ( have_posts() ) : ?>
                
        <?php while ( have_posts() ) : the_post(); 
            
            /* assign content - depending on the post format we might need to modify it */
            $content = get_the_content();                  
            
            /* standard post format or audio format */
            if ( empty( $post_format ) || $post_format == 'audio' ) :        

                $the_content = apply_filters( 'the_content' , $content ); 
                
            /* video post format */    
            elseif( $post_format == 'video' ) :               
                 
                /* try to catch video url */
                $video_url = ut_get_portfolio_format_video_content( $content );
                
                if( !empty($video_url) ) : 
                    
                    /* cut out the video url from content and format it */
                    $the_content = str_replace( $video_url , "" , $content);
                    $the_content = apply_filters( 'the_content' , $the_content );
                    
                endif; 
            
            /* gallery post format */
            elseif( $post_format == 'gallery' ) : 
            
                /* assign content */
                $content = preg_replace( '/(.?)\[(gallery)\b(.*?)(?:(\/))?\](?:(.+?)\[\/\2\])?(.?)/s', '$1$6', $content );
                $the_content = apply_filters( 'the_content' , $content );               
                
            endif; ?>    
            
            <div class="grid-container">
                
                <div id="primary" class="grid-parent grid-100 tablet-grid-100 mobile-grid-100 <?php echo $ut_page_skin; ?> <?php echo $ut_page_class; ?>">
                            
                        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            
                            <?php if( ut_page_option( 'ut_display_section_header', 'show', 'ut_' ) == 'show' ) : ?>
                            
                            <div class="<?php echo $ut_page_header_width; ?> mobile-grid-100 tablet-grid-100">

                                <header class="page-header <?php echo $ut_page_header_style;?> <?php echo $ut_page_header_text_align; ?> page-primary-header">

                                    <?php if( !empty( $glitch_classes ) ) : ?>

                                        <div class="<?php echo implode( " ", $glitch_classes ); ?>" <?php echo $glitch_attributes; ?>>

                                    <?php endif; ?>

                                    <?php

                                    $ut_data_page_title = str_replace( "\n","&#13;&#10;", strip_tags( get_the_title() ) );

                                    // check if title contains linebreaks
                                    if( strpos($ut_data_page_title, "\n") !== FALSE ) {

                                        $page_title_classes[] = 'title-with-linebreak';

                                    } ?>

                                    <?php if( $ut_page_header_style == 'pt-style-1' ) : ?>

                                        <h1 data-title="<?php echo $ut_data_page_title; ?>" data-responsive-font="page_title" class="page-title <?php echo implode( " ", $page_title_classes ); ?> element-with-custom-line-height bklyn-divider-styles bklyn-divider-style-1">

                                            <span><?php the_title(); ?></span>

                                        </h1>

                                    <?php else : ?>

                                        <h1 data-title="<?php echo $ut_data_page_title; ?>" data-responsive-font="page_title" class="page-title element-with-custom-line-height <?php echo implode( " ", $page_title_classes ); ?>">

                                            <span><?php the_title(); ?></span>

                                            <?php if( ( $ut_page_header_style == 'pt-style-3' || $ut_page_header_style == 'pt-style-5' ) && ut_collect_option( 'ut_page_headline_glitch', 'off' ) == 'on' && ut_collect_option( 'ut_page_headline_glitch_style', 'ut-glitch-1' ) == 'ut-glitch-1' ) : ?>

                                                <div><?php the_title(); ?></div>

                                            <?php endif; ?>

                                        </h1>

                                    <?php endif; ?>

                                    <?php if( !empty( $glitch_classes ) ) : ?>

                                        </div>

                                    <?php endif; ?>

                                    <?php if( !empty($pageslogan) ) : ?>

                                        <div class="lead"><?php echo wpautop($pageslogan); ?></div>

                                    <?php endif; ?>

                             </header><!-- .page-header -->
                                
                             </div>
                             
                             <?php endif; ?>
                                
							 <div class="grid-100 mobile-grid-100 tablet-grid-100">

								  <div class="entry-content clearfix">	

									<?php echo $the_content; ?>

									<?php if( $socialshare == 'on' ) : ?>

									<div class="clear"></div>

									<ul class="ut-project-sc clearfix <?php echo $socialshare_border == 'off' ? 'no-border' : '' ?>">
										<li><?php esc_html_e('Share:' , 'unitedthemes'); ?></li>
										<li><a class="ut-share-link sc-twitter" data-social="utsharetwitter"><i class="fa fa-twitter"></i></a></li>
										<li><a class="ut-share-link sc-facebook" data-social="utsharefacebook"><i class="fa fa-facebook"></i></a></li>
										<li><a class="ut-share-link sc-linkedin" data-social="utsharelinkedin"><i class="fa fa-linkedin"></i></a></li>
										<li><a class="ut-share-link sc-pinterest" data-social="utsharepinterest"><i class="fa fa-pinterest"></i></a></li>
										<li><a class="ut-share-link sc-xing" data-social="utsharexing"><i class="fa fa-xing"></i></a></li>
									</ul>                                            

									<?php endif; ?>

								  </div><!-- .entry-content -->
                                 
                                  <?php edit_post_link( __( 'Edit Portfolio', 'unitedthemes' ), '<span class="edit-link">', '</span>' ); ?>

							 </div>                                
                                
                        </div><!-- #post -->
                                                                                
                        <?php if ( comments_open() || '0' != get_comments_number() )  {
                                comments_template();
                        } ?>
                
                </div><!-- close #primary -->
                                
            </div><!-- close grid-container -->
            
            <div class="ut-scroll-up-waypoint-wrap">
                <div class="ut-scroll-up-waypoint" data-section="section-<?php echo ut_clean_section_id($post->post_name); ?>"></div>
            </div>
            
            <?php

            $navigation_state = 'off';

            if( !get_post_meta( get_the_ID(), 'ut_single_portfolio_navigation', true ) || get_post_meta( get_the_ID(), 'ut_single_portfolio_navigation', true ) == 'global' ) {
                
                $navigation_state = ot_get_option( 'ut_single_portfolio_navigation', 'off' );
                
            } elseif( get_post_meta( get_the_ID(), 'ut_single_portfolio_navigation', true ) == 'on' ) {
                
                $navigation_state = 'on';
                
            }

            if( $navigation_state == 'on' ) :

            $value = array();

            // check current status
            if( get_post_meta( get_the_ID(), 'ut_portfolio_link_type', true ) ) {
                
                $value[] = $current_value = get_post_meta( get_the_ID(), 'ut_portfolio_link_type', true );

                /* check for showcase settings */
                $showcase_detail    = false;
                $current_categories = wp_get_object_terms( $post->ID, 'portfolio-category' );

                $showcases = get_posts( array(
                    'posts_per_page' => -1,
                    'post_type' => 'portfolio-manager',
                ) );

                if ( !empty( $showcases ) && is_array( $showcases ) && !empty( $current_categories ) ) {

                    foreach ( $showcases as $showcase ) {

                        $showcase_categories = '';

                        /* get used categories */
                        $showcase_categories = get_post_meta( $showcase->ID, 'ut_portfolio_categories', true );

                        foreach ( $current_categories as $category ) {

                            /* we have a match */
                            if ( !empty( $showcase_categories ) && is_array( $showcase_categories ) && array_key_exists( $category->term_id, $showcase_categories ) ) {

                                $portfolio_settings = get_post_meta( $showcase->ID, 'ut_portfolio_settings', true );

                                $showcase_detail = $showcase->post_title;
                                $showcase_detail = !empty( $portfolio_settings['detail_style'] ) ? $portfolio_settings['detail_style'] : false;

                            }

                        }

                    }

                }

                // if current also matches showcase setting - query all items with global too
                if( $current_value == $showcase_detail ) {

                    $value[] = 'global';

                }

                // if current is global add global value to query
                if( $current_value == 'global' ) {

                    $value[] = $showcase_detail;

                }

            } else {

                $value[] = 'internal'; // not set yet, handle this as a default internal portfolio
                
            }

            // get adjacent posts which are single portfolios as well
            $args = array(
                'post_type'         => 'portfolio',
                'posts_per_page'    => -1,
                'order'             => 'DESC',
                'suppress_filters'  => true,
                'meta_query' => array(
                    array(
                       'key' => 'ut_portfolio_link_type',
                       'value' => $value,
                       'compare' => 'IN',
                   )
               )

            );

            $portfolio_list = get_posts( $args );

            // get ids of portfolios
            $ids = array();
            foreach ( $portfolio_list as $portfolio ) {
                $ids[] = $portfolio->ID;
            }
            
            $prev_link = $next_link = $prev_link_title = $next_link_title = '';
            
            $underline_effect = ot_get_option('ut_single_portfolio_navigation_underline_effect', 'off') == 'on' ? 'ut-underline-effect' : '';

            if( !empty( $ids ) && is_array( $ids ) ) {
            
                $thisindex  = array_search( get_the_ID(), $ids );

                // previous post if exisits otherwise point to the last
                $previd = isset( $ids[$thisindex-1] ) ? $ids[$thisindex-1] : $ids[count($ids) - 1];
                $prev_link = get_the_permalink( $previd );
                $prev_link_title = get_the_title( $previd ); 
                
                // next post if exisits otherwise point to the first
                $nextid = isset( $ids[$thisindex+1] ) ? $ids[$thisindex+1] : $ids[0];
                $next_link = get_the_permalink( $nextid );
                $next_link_title = get_the_title( $nextid );
            
            } ?>

            </div>

                <section id="ut-portfolio-navigation-wrap" class="<?php echo ot_get_option("ut_single_portfolio_navigation_width", "centered"); ?>">
                    
                    <div class="grid-container">
                        
                        <div class="grid-33 tablet-grid-33 mobile-grid-33">
                            
                            <div class="ut-prev-portfolio <?php echo $underline_effect; ?>">
                                
                                <?php if( ot_get_option("ut_single_portfolio_navigation_arrow_style","arrows") == 'arrows' ) : ?>
                                
                                    <?php echo '<a href="' . esc_url( $prev_link ) . '" rel="next"><i class="Bklyn-Core-Left-2"></i></a>'; ?>
                                   
                                <?php endif; ?>
                                  
                                <?php if( ot_get_option("ut_single_portfolio_navigation_arrow_style","arrows") == 'arrows_with_title' ) : ?>
                                
                                    <?php echo '<a href="' . esc_url( $prev_link ) . '" rel="next"><i class="Bklyn-Core-Left-2"></i> <span>' . $prev_link_title . '</span></a>'; ?>
                                   
                                <?php endif; ?>     
                                
                                <?php if( ot_get_option("ut_single_portfolio_navigation_arrow_style","arrows") == 'title_only' ) : ?>
                                
                                    <?php echo '<a href="' . esc_url( $prev_link ) . '" rel="next"><span>' . $prev_link_title . '</span></a>'; ?>
                                   
                                <?php endif; ?>                                   
                                                       
                                <?php if( ot_get_option("ut_single_portfolio_navigation_arrow_style", "arrows" ) == 'arrows_with_text' ) : ?>
                                    
                                    <?php echo '<a href="' . esc_url( $prev_link ) . '" rel="next"><i class="Bklyn-Core-Left-2"></i> <span>' . ot_get_option("ut_single_portfolio_navigation_prev_text", esc_html( 'Previous Portfolio', 'unitedthemes' ) ) . '</span></a>'; ?>
                                    
                                <?php endif; ?>
                        
                                <?php if( ot_get_option("ut_single_portfolio_navigation_arrow_style", "arrows" ) == 'text_only' ) : ?>
                                    
                                    <?php echo '<a href="' . esc_url( $prev_link ) . '" rel="next"><span>' . ot_get_option("ut_single_portfolio_navigation_prev_text", esc_html( 'Previous Portfolio', 'unitedthemes' ) ) . '</span></a>'; ?>
                                
                                <?php endif; ?>                                                                  
                                    
                            </div>                        
                            
                        </div>
                        
                        <div class="grid-33 tablet-grid-33 mobile-grid-33">
                            
                            <div class="ut-main-portfolio-link">
                                
                                <?php 
                                
                                if( ot_get_option( 'ut_single_portfolio_navigation_main_portfolio_page' ) ) {

                                    if( ot_get_option( 'ut_single_portfolio_navigation_main_portfolio_page' ) == 'custom' ) {

                                        $link = ot_get_option( 'ut_single_portfolio_navigation_main_portfolio_page_custom' );

                                    } else {

                                        $link = get_permalink( ot_get_option( 'ut_single_portfolio_navigation_main_portfolio_page' ) );

                                    }
                                    
                                } else {
                                    
                                    $link = esc_url( home_url( '/' ) );
                                
                                }
                                
                                ?>
                                
                                                                                                                                                                                                
                                <a href="<?php echo esc_url( $link ); ?>">
                                    <i class="<?php echo ot_get_option('ut_single_portfolio_navigation_main_portfolio_icon', 'fa fa-bars'); ?>" aria-hidden="true"></i>
                                </a>
                                
                            </div>
                            
                        </div>                    
                        
                        <div class="grid-33 tablet-grid-33 mobile-grid-33">
                            
                            <div class="ut-next-portfolio <?php echo $underline_effect; ?>">
                                
                                <?php if( ot_get_option("ut_single_portfolio_navigation_arrow_style", "arrows" ) == 'arrows' ) : ?>
                                
                                    <?php echo '<a href="' . esc_url( $next_link ) . '" rel="next"><i class="Bklyn-Core-Right-2"></i></a>'; ?>
                                
                                <?php endif; ?>
                                
                                <?php if( ot_get_option("ut_single_portfolio_navigation_arrow_style", "arrows" ) == 'arrows_with_title' ) : ?>
                                
                                    <?php echo '<a href="' . esc_url( $next_link ) . '" rel="next"><span>' . $next_link_title . '</span> <i class="Bklyn-Core-Right-2"></i></a>'; ?>
                                
                                <?php endif; ?>
                                
                                <?php if( ot_get_option("ut_single_portfolio_navigation_arrow_style", "arrows" ) == 'title_only' ) : ?>
                                
                                    <?php echo '<a href="' . esc_url( $next_link ) . '" rel="next"><span>' . $next_link_title . '</span></a>'; ?>
                                
                                <?php endif; ?>
                                
                                <?php if( ot_get_option("ut_single_portfolio_navigation_arrow_style", "arrows" ) == 'arrows_with_text' ) : ?>
                                
                                    <?php echo '<a href="' . esc_url( $next_link ) . '" rel="next"><span>' . ot_get_option("ut_single_portfolio_navigation_next_text", esc_html( 'Next Portfolio', 'unitedthemes' ) ) . '</span> <i class="Bklyn-Core-Right-2"></i></a>'; ?>
                                
                                <?php endif; ?>
                        
                                <?php if( ot_get_option("ut_single_portfolio_navigation_arrow_style", "arrows" ) == 'text_only' ) : ?>
                                
                                    <?php echo '<a href="' . esc_url( $next_link ) . '" rel="next"><span>' . ot_get_option("ut_single_portfolio_navigation_next_text", esc_html( 'Next Portfolio', 'unitedthemes' ) ) . '</span></a>'; ?>
                                
                                <?php endif; ?>   
                                
                            </div>
                            
                        </div>
                        
                    </div>
                
                </section>

            <div class="ut-empty-div">

            <?php endif; ?>
            
        <?php endwhile; // end of the loop. ?>
    			
    <?php endif; ?>
    
<?php get_footer(); ?>