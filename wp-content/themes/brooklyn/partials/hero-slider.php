<?php
/**
 * The Template for displaying Background Image Slider
 *
 * @author      United Themes
 * @package     Brooklyn
 * @version     2.0
 */

$hero_title_classes = array();

/*
 * template config: global styles
 */

$hero_title_classes[] = ut_collect_option( 'ut_caption_title_glow', 'off' ) == 'on' ? 'ut-glow' : '';
$hero_title_classes[] = ut_collect_option( 'ut_caption_title_stroke_effect', 'off' ) == 'on' ? 'ut-text-stroke' : '';

/* 
 * template config : slides
 */

$ut_hero_background_slides  = ut_return_hero_config('ut_background_slider_slides');

/* 
 * template config: canvas color 
 */

$ut_effect_color = ut_return_hero_config( 'ut_hero_overlay_effect_color' );
$ut_effect_color = !empty( $ut_effect_color ) ? $ut_effect_color : get_option( 'ut_accentcolor', '#F1C40F' ); ?>

<!-- hero section -->
<section id="ut-hero" class="slider hero ha-waypoint parallax-section parallax-background heroFadeIn" data-animate-up="ha-header-hide" data-animate-down="ha-header-hide">
    
    <div id="ut-hero-early-waypoint" class="ut-early-waypoint" data-animate-up="ha-header-hide" data-animate-down="ha-header-small"></div>
    
    <?php // overlay for hero
    
    if( ut_return_hero_config('ut_hero_overlay')== 'on') : ?>
    
       <div class="parallax-overlay <?php echo ut_return_hero_config( 'ut_hero_overlay_pattern', 'on' ) == 'on' ? 'parallax-overlay-pattern' : ''; ?> <?php echo ut_return_hero_config('ut_hero_overlay_pattern_style' , 'style_one'); ?>" style="position:absolute;"></div> 
    
    <?php endif; ?>                         
    
    <?php // overlay animation effect for hero 
    
    if( ut_return_hero_config('ut_hero_overlay_effect') == 'on') : ?>
    
        <canvas data-strokecolor="<?php echo ut_hex_to_rgb( $ut_effect_color ); ?>" id="ut-animation-canvas" style="z-index:4;"></canvas>        
    
    <?php endif; ?>
    
    <?php if( !empty( $ut_hero_background_slides ) && is_array( $ut_hero_background_slides ) ) : ?>
    
        <!-- main slider -->
        <div id="ut-hero-slider" class="ut-hero-slider flexslider">
          
            <ul class="slides">
    
                <?php foreach( $ut_hero_background_slides as $slide ) : ?>

                    <li>

                        <div class="parallax-image-container" style="background:url(<?php echo $slide['image'] ; ?>); background-position: <?php echo ( !empty( $slide['background_position'] ) ? $slide['background_position'] : 'center center' ); ?> !important"></div>

                    </li>
              
                <?php endforeach; ?>
    
            </ul>
          
        </div>
        <!-- close main slider -->
      
        <!-- slider controls -->
        <a class="ut-flex-control next"></a>
        <a class="ut-flex-control prev"></a>
        <!-- close slider controls -->
      
        <?php if( ut_collect_option('ut_scroll_down_arrow' , 'off') == 'on' ) : ?>
                    
            <div class="hero-down-arrow-wrap ut-hero-ready">                        

                <span class="hero-down-arrow">

                    <a href="#ut-to-first-section"><i class="Bklyn-Core-Down-3"></i></a>

                </span>

            </div>
        
        <?php endif; ?>
      
        <!-- caption slider -->
        <div id="ut-hero-captions" class="ut-hero-captions flexslider">
            
            <ul class="slides">
              
                <?php foreach($ut_hero_background_slides as $slide) :
                    
                    $style     = !empty( $slide['style'] ) && $slide['style'] != 'global' ? $slide['style'] : ut_return_hero_config( 'ut_hero_style' , 'ut-hero-style-1' );
                    $fontstyle = !empty( $slide['font_style'] ) ? $slide['font_style'] : ut_return_hero_config( 'ut_hero_font_style' , 'semibold' );
                    $fontstyle = !empty( $slide['font_style'] ) && $slide['font_style'] == 'global' && ot_get_option('ut_front_hero_font_type' , 'ut-font') == 'ut-google' ? '' : $fontstyle;
                    $align     = !empty( $slide['align'] ) ? $slide['align'] : 'center';
                    
                    $animation_direction = !empty( $slide['direction'] ) ? $slide['direction'] : 'top'; 
                    
                    $slidelink = !empty( $slide['link'] ) ? $slide['link'] : '#ut-to-first-section';
                    $link_description = !empty( $slide['link_description'] ) ? $slide['link_description'] : ''; ?>                
                  
                    <li>
                        
                        <div class="grid-container">
                            
                            <!-- hero holder -->
                            <div class="hero-holder grid-100 mobile-grid-100 tablet-grid-100 <?php echo $style; ?>" data-animation="<?php echo $animation_direction; ?>" style="opacity:0;">
                                
                                <div class="hero-inner" style="text-align:<?php echo $align; ?>;">                
                                   
                                    <?php if( !empty( $slide['expertise'] ) ) : ?>
                                        
                                        <div class="hdh">
                                            <span data-responsive-font="hero_slogan" class="hero-description"><?php echo do_shortcode( nl2br($slide['expertise']) ); ?></span>
                                        </div>
                                        
                                    <?php endif; ?>
                                                  
                                    <?php if( !empty( $slide['description'] ) ) : ?>
                                        
                                        <div class="hth">
                                            <h1 data-responsive-font="hero_title" class="hero-title <?php echo $fontstyle; ?> <?php echo implode( " ", $hero_title_classes ); ?>"><?php echo do_shortcode( nl2br($slide['description']) ); ?></h1>
                                        </div>
                                        
                                    <?php endif; ?>
                                     
                                    <?php if( !empty( $slide['catchphrase'] ) ) : ?>
                                        
                                        <div class="hdb">
                                            <span data-responsive-font="hero_description" class="hero-description-bottom"><?php echo do_shortcode( nl2br( $slide['catchphrase'] ) ); ?></span>
                                        </div>
                                        
                                    <?php endif; ?>
                                      
                                    <?php if( !empty( $link_description ) ) : ?>
                                        
                                        <?php $slide['link_description'] = !empty($slide['link_description']) ? $slide['link_description'] : esc_html__('Read more' , 'unitedthemes'); ?>
                                        
                                        <span class="hero-btn-holder">
                                            <a target="_blank" href="<?php echo $slidelink; ?>" class="hero-btn hero-slider-button">
                                                <?php echo ut_translate_meta($link_description); ?>
                                            </a>
                                        </span>
                                        
                                    <?php endif; ?>    
                                                                     
                                </div>
                                <!-- close hero-inner -->
                                          
                            </div>
                            <!-- close hero-holder -->
                            
                        </div>
                          
                    </li>
                  
                <?php endforeach; ?>
                              
            </ul>
          
    </div>      
    <!-- close caption slider -->
    
    <?php endif; ?> 
    
    <div data-section="top" class="ut-scroll-up-waypoint"></div>
    
</section>
<!-- end hero section -->