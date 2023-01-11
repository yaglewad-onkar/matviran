<?php
/**
 * The Template for displaying Single Post Heros
 *
 * @author      United Themes
 * @package     Brooklyn
 * @version     2.0
 */

$hero_classes = array();

/*
 * template config: effects 
 */
$ut_company_slogan_glow = ut_return_hero_config( 'ut_hero_caption_title_glow', 'off' ) == 'on' ? 'ut-glow' : '';

/* 
 * template config: canvas color 
 */
$ut_effect_color = ut_return_hero_config( 'ut_hero_overlay_effect_color' );
$ut_effect_color = !empty( $ut_effect_color ) ? $ut_effect_color : get_option( 'ut_accentcolor', '#F1C40F' );

/* 
 * template config: content width and align
 */

$hero_classes[]  = ut_collect_option( 'ut_post_hero_width', 'centered', 'ut_' ) == 'fullwidth' ? 'ut-hero-custom' : '';
$ut_hero_v_align = ut_collect_option( 'ut_post_hero_v_align', 'middle', 'ut_' ) == 'bottom' ? 'ut-hero-bottom' : '';

/* 
 * template config: hero intro animation
 */

$hero_classes[]  = 'heroFadeIn';

/* 
 * template config: pattern 
 */
$ut_hero_overlay_pattern = ut_return_hero_config( 'ut_hero_overlay_pattern', 'on' ) == 'on' ? 'parallax-overlay-pattern' : ''; ?>

<!-- hero section -->
<section id="ut-hero" class="hero ha-waypoint parallax-section parallax-background <?php echo implode( " " , $hero_classes ); ?>" data-animate-up="ha-header-hide" data-animate-down="ha-header-hide">
    
    <div id="ut-hero-early-waypoint" class="ut-early-waypoint" data-animate-up="ha-header-hide" data-animate-down="ha-header-small"></div>
    
    <?php // Video Post Format
    
    if( class_exists('UT_Section_Video_player') && 'video' == get_post_format() ) {
        
        $value = get_post_meta( get_the_ID(), '_format_video_embed', true );
        
        if( ut_video_is_vimeo( $value ) ) {
            
            $video = new UT_Section_Video_player();
            
            echo $video::handle_shortcode( array(
                'id'            => 'hero',
                'section'       => '#ut-hero',   
                'source'        => 'vimeo',
                'volume'        => ut_collect_option('ut_post_hero_video_volume', '5', 'ut_'),
                'sound'         => ut_collect_option('ut_post_hero_video_sound', 'off', 'ut_'),
                'mutebutton'    => ut_collect_option('ut_post_hero_mute_button', 'on', 'ut_'),
                'video_vimeo'   => $value
            ) );
        
        }
        
        if( ut_video_is_youtube( $value ) ) {

            $video = new UT_Section_Video_player();

            echo $video::handle_shortcode( array(
                'id'            => 'hero',
                'section'       => '#ut-hero',   
                'source'        => 'youtube',
                'volume'        => ut_collect_option('ut_post_hero_video_volume', '5', 'ut_'),
                'sound'         => ut_collect_option('ut_post_hero_video_sound', 'off', 'ut_'),
                'mutebutton'    => ut_collect_option('ut_post_hero_mute_button', 'on', 'ut_'),
                'video'         => $value
            ) );
        
        }
            
    } ?>    
    
    <div class="parallax-scroll-container hero-parallax-scroll-container parallax-scroll-container-hide" data-parallax-bottom data-parallax-factor="8">
    
        <div class="parallax-image-container"></div>
        
    </div>

    <?php /* overlay effect for hero */ 
    if( ut_return_hero_config('ut_hero_overlay') == 'on') : ?>

        <div class="parallax-overlay <?php echo $ut_hero_overlay_pattern; ?> <?php echo ut_return_hero_config('ut_hero_overlay_pattern_style' , 'style_one'); ?>">

    <?php endif; ?>

    <?php /* overlay animation effect for hero */ 
    if( ut_return_hero_config('ut_hero_overlay_effect') == 'on') : ?>

        <canvas data-strokecolor="<?php echo ut_hex_to_rgb($ut_effect_color); ?>" id="ut-animation-canvas"></canvas>

    <?php endif; ?>

        <?php /* main output for hero */ ?>

        <div class="grid-container">
            
            <!-- hero holder -->
            
            <div class="hero-holder grid-100 mobile-grid-100 tablet-grid-100 <?php echo ut_return_hero_config('ut_hero_style' , 'ut-hero-style-1'); ?> hero-holder-align-items-<?php echo ut_collect_option( 'ut_post_hero_v_align', 'middle', 'ut_' ); ?>">
                
                <div class="hero-inner ut-hero-custom-<?php echo ut_collect_option( 'ut_post_hero_align' , 'center', 'ut_' ); ?> <?php echo $ut_hero_v_align; ?>" style="text-align:<?php echo ut_collect_option('ut_post_hero_align' , 'center', 'ut_' ); ?>;">
                    
                    <div class="ut-hero-animation-element">
                    
                    <?php if( ut_collect_option('ut_post_hero_title', 'on', 'ut_') == 'on' || ut_collect_option('ut_post_hero_title', 'on', 'ut_') == 'only_title' || ut_collect_option('ut_post_hero_title', 'on', 'ut_') == 'only_meta' ) : ?>
                                        
                        <?php if( get_post_meta( get_the_ID(), 'ut_post_hero_custom_title', true ) ) {

                            $ut_hero_title = get_post_meta( get_the_ID(), 'ut_post_hero_custom_title', true );

                        } else {

                            $ut_hero_title = get_the_title(); 

                        } ?>
                        
                        <?php if( ut_collect_option('ut_post_hero_title', 'on', 'ut_') == 'on' || ut_collect_option('ut_post_hero_title', 'on', 'ut_') == 'only_title' ) : ?>
                        
                            <div class="hth">

                                <h1 class="hero-title element-with-custom-line-height">

                                    <?php echo do_shortcode( nl2br( $ut_hero_title ) ); ?>

                                </h1>

                            </div>
                        
                        <?php endif; ?>
                        
                        <?php if( ut_collect_option('ut_post_hero_title', 'on', 'ut_') == 'on' || ut_collect_option('ut_post_hero_title', 'on', 'ut_') == 'only_meta' ) : ?>
                        
                            <div class="hdb">

                                <div class="hero-description-bottom">

                                    <div class="ut-hero-meta-description-holder">

                                       <div class="ut-hero-meta-description-holder-inner">

                                            <div class="ut-hero-meta-date"><?php the_time( get_option('date_format') ); ?></div>

                                            <div class="ut-hero-meta-category"><?php echo unite_get_caption_category( 3, true ); ?></div>

                                            <?php $author_id = get_queried_object()->post_author; ?>

                                            <div class="ut-hero-meta-author">

                                               <ul>
                                                   <li>
                                                       <a href="<?php echo get_author_posts_url( $author_id ); ?>">
                                                           <figure class="ut-entry-avatar-image">
                                                               <?php echo get_avatar( $author_id, 80 ); ?>
                                                           </figure>
                                                       </a>
                                                  </li>
                                                  <li>
                                                      <?php esc_html_e( 'by', 'unitedthemes' ); ?>
                                                      <a href="<?php echo get_author_posts_url( $author_id ); ?>">
                                                          <?php echo get_the_author_meta('display_name', $author_id); ?>
                                                      </a>
                                                  </li>

                                               </ul>

                                            </div>

                                        </div>

                                    </div>                                                   

                                </div>

                            </div>
                        
                        <?php endif; ?>
                        
                    <?php endif; ?>                                                            
                    
                    </div>    
                        
                </div>
                
                <?php if( ut_collect_option('ut_post_hero_down_arrow', 'on', 'ut_') == 'on' ) : ?>                                                                                                                                                                                   
                                                                                                                                                                                    
                    <div class="hero-down-arrow-wrap">

                        <span class="hero-down-arrow">

                            <a href="#ut-to-first-section"><i class="Bklyn-Core-Down-3"></i></a>

                        </span>

                    </div>

                <?php endif; ?>
                
            </div>
            <!-- close hero-holder -->

        </div>

    <?php /* overlay effect for hero */ ?>

    <?php if( ut_return_hero_config('ut_hero_overlay') == 'on') : ?>

    </div>

    <?php endif; ?>

    <div data-section="top" class="ut-scroll-up-waypoint"></div>

    <?php if( ut_return_hero_config( 'ut_hero_fancy_border' ) == 'on') : ?>

    <div class="ut-fancy-border"></div>

    <?php endif; ?>

</section>
<!-- end hero section -->