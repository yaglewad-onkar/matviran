<?php

/**
 * The Template for displaying a Hero on Archive Pages 
 * @author      United Themes
 * @package     Brooklyn
 * @version     2.1
 */

$hero_classes = array();

/* 
 * template config: content width and align
 */

$hero_classes[]  = ut_collect_option( 'ut_hero_width', 'centered' ) == 'fullwidth' ? 'ut-hero-custom' : '';


/*
 * template config: hero caption intro animation
 */

$hero_classes[] = ot_get_option('ut_global_hero_image_animation_effect', 'heroFadeIn') ?>

<section id="ut-hero" class="hero ha-waypoint parallax-section parallax-background <?php echo implode( " " , $hero_classes ); ?>" data-animate-up="ha-header-hide" data-animate-down="ha-header-hide">
    
    <div id="ut-hero-early-waypoint" class="ut-early-waypoint" data-animate-up="ha-header-hide" data-animate-down="ha-header-small"></div>
    
    <div class="parallax-scroll-container hero-parallax-scroll-container parallax-scroll-container-hide <?php echo ot_get_option('ut_archive_hero_parallax') == 'off' ? 'parallax-scroll-container-disabled' : ''; ?>" data-parallax-bottom data-parallax-factor="8">

        <div class="parallax-image-container"></div>

    </div>
    
    <?php ut_before_hero_content_hook(); ?> 
    
    <div class="grid-container">
        
        <!-- hero holder -->
        <div class="hero-holder grid-100 mobile-grid-100 tablet-grid-100 <?php echo ut_return_hero_config('ut_hero_style' , 'ut-hero-style-1'); ?> hero-holder-align-items-middle">
                
            <!-- start hero-inner -->
            <div class="hero-inner ut-hero-custom-<?php echo ut_return_hero_config( 'ut_hero_align' , 'center' ); ?>" style="text-align:center;">
                
                <?php if( is_author() && ot_get_option( 'ut_author_archive_hide_avatar', 'off' ) == 'off' ) : ?>
                
                <div class="ut-archive-hero-avatar">

                    <?php $author = get_user_by( 'slug', get_query_var( 'author_name' ) ); ?>        

                    <?php echo get_avatar( $author->ID, 160 ); ?>        


                </div>
                
                <?php endif; ?>
                
                <div class="hth">
                
                    <h1 class="hero-title element-with-custom-line-height">
                    
                        <?php

                            if ( is_category() ) :
                                
                                single_cat_title();
                            
                            elseif ( ut_is_shop() || function_exists("is_product_category") && is_product_category() ) : 
                                
                                single_cat_title();
                        
                            elseif ( is_tag() ) :
                                
                                single_tag_title();
    
                            elseif ( is_author() ) :
                                
                                if( ot_get_option( "ut_author_hero_highlight", "on" ) == 'off' ) {
                                    
                                    echo get_the_author();
                                    
                                } else {
                        
                                    $author_name = array();
                                    $name = explode( ' ', get_the_author() );        

                                    foreach( $name as $key => $name_part ) {

                                        if( $key == 0 ) {

                                            $author_name[] = $name_part;

                                        } else {

                                            $author_name[] = '<span>' . $name_part . '</span>';                                            

                                        }

                                    }

                                    echo implode(' ', $author_name);
                                    
                                }
    
                            elseif ( is_day() ) :
                                
                                echo get_the_date();
    
                            elseif ( is_month() ) :
                                
                                echo get_the_date( 'F Y' );
    
                            elseif ( is_year() ) :
                                
                                echo get_the_date( 'Y' );
    
                            elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
                                esc_html_e( 'Asides', 'unitedthemes' );
    
                            elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
                                esc_html_e( 'Images', 'unitedthemes');
    
                            elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
                                esc_html_e( 'Videos', 'unitedthemes' );
    
                            elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
                                esc_html_e( 'Quotes', 'unitedthemes' );
    
                            elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
                                esc_html_e( 'Links', 'unitedthemes' );

                            elseif ( is_tax( 'portfolio-category' ) ) :
                                echo get_the_archive_title();
						
							elseif ( is_tax( 'event_location' ) && function_exists("evo_lang_e") ) :
								evo_lang_e( 'Events at this location') ;

                            elseif ( is_post_type_archive( 'mec-events' ) ) :

                                $title = apply_filters('mec_archive_title', get_the_title());
                                echo $title;

                            elseif ( is_post_type_archive( 'tribe_events' ) ) :
                                esc_html_e( 'Upcoming Events', 'unitedthemes' );

                            else :
                                esc_html_e( 'Archives', 'unitedthemes' );
    
                            endif;
                        ?>
                    
                    </h1>
                    
                </div>
                
                
                <?php if ( term_description() ) : ?>
                
                <div class="hdb">
                    <span data-responsive-font="hero_description" class="hero-description-bottom">
                        
                        <?php printf( '<p class="lead">%s</p>', term_description() ); ?>
                            
                    </span>
                </div>
                
                <?php endif; ?>
                
                <?php if( is_author() ) : ?>
                
                <div class="hdb">
                    <span data-responsive-font="hero_description" class="hero-description-bottom">
                        
                        <?php esc_html_e( 'View all authors posts further down below.', 'unitedthemes' ); ?>
                            
                    </span>
                </div>                
                
                <?php endif; ?>
                
                
                <?php if( is_day() || is_month() || is_year() ) : ?>
                
                <div class="hdb">
                    <span data-responsive-font="hero_description" class="hero-description-bottom">
                        
                        <?php esc_html_e( 'View all on this date written articles further down below.', 'unitedthemes' ); ?>
                            
                    </span>
                </div>                
                
                <?php endif; ?>
                                
            </div>

            <?php if( ot_get_option( 'ut_global_scroll_down_arrow', 'off' ) == 'on' ) : ?>

            <div class="hero-down-arrow-wrap">                        
                        
                <span class="hero-down-arrow">

                    <a href="#ut-to-first-section"><i class="Bklyn-Core-Down-3"></i></a>

                </span>

            </div>

            <?php endif; ?>
            
        </div>
        <!-- close hero-holder -->
    
    </div>
    
    <?php ut_after_hero_content_hook(); ?> 
    
</section>
<!-- end hero section -->