<?php

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * The Template for displaying the Fancy Image Slider
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
 * template config: slides
 */

$ut_fancy_slider_slides = ut_return_hero_config( 'ut_fancy_slider_slides' );
$ut_fancy_slider_effect = ut_return_hero_config( 'ut_fancy_slider_effect', 'fxSoftScale' );

/* 
 * template config: classes
 */

$hero_classes = array('ut-hero-fancy-slider');

if( ut_return_hero_config( 'ut_hero_separator_top', 'off' ) == 'on' || ut_return_hero_config( 'ut_hero_separator_bottom', 'off' ) == 'on' ) {
    
    $hero_classes[] = 'ut-hero-with-separator';
    
} ?>

<!-- hero section -->
<section id="ut-hero" class="hero <?php echo implode( ' ', $hero_classes ); ?> ha-waypoint" data-animate-up="ha-header-hide" data-animate-down="ha-header-hide">
    
    <div id="ut-hero-early-waypoint" class="ut-early-waypoint" data-animate-up="ha-header-hide" data-animate-down="ha-header-small"></div>
    
    <?php if( !empty( $ut_fancy_slider_slides ) && is_array( $ut_fancy_slider_slides ) ) : ?>

    <!-- start fancy slider -->
    <div id="ut-fancy-slider" class="ut-fancy-slider ut-fancy-slider-fullwidth <?php echo $ut_fancy_slider_effect; ?>" data-autoplay="<?php echo ut_return_hero_config( 'ut_fancy_slider_autoplay', 'off' ); ?>" data-autoplay-timer="<?php echo ut_return_hero_config( 'ut_fancy_slider_timer', 3000 ); ?>">
        
        <ul class="ut-fancy-slides">
    
            <?php $slidecount = 1; ?>

            <?php foreach( $ut_fancy_slider_slides as $slide ) : 
                
                $slide_image = ut_resize( $slide['image'], 2160, 1440, true, true, false ); ?>
            
                <li <?php echo $slidecount==1 ? 'class="current"' : ''; ?> style="background-image:url(<?php echo esc_url( $slide_image ); ?>);">

                    <?php 
                    
                    $style = ( !empty($slide['style']) && $slide['style'] != 'global') ? $slide['style'] : ut_return_hero_config('ut_hero_style' , 'ut-hero-style-1');
                    $link_description = !empty($slide['link_description']) ? $slide['link_description'] : '';
                    
                    if( !empty( $slide['scroll_to_target'] ) ) {
                                                        
                        $slidelink = '#section-' . ut_get_the_slug( $slide['scroll_to_target'] );  
                                                      
                    } elseif( !empty($link_description) ) {  
                                                  
                        $slidelink = !empty($slide['link']) && $slide['link'] != '#' ? $slide['link'] : '#ut-to-first-section';  
                                                  
                    }
                    
                    ?>
                
                    <?php if( ut_return_hero_config('ut_hero_overlay') == 'on') : ?>

                        <div class="parallax-overlay">

                    <?php endif; ?>
                
                    <div class="grid-container">
                        
                        <!-- hero holder -->
                        <div class="hero-holder grid-100 mobile-grid-100 tablet-grid-100 <?php echo $style; ?>">
                            
                            <div class="hero-inner" style="text-align:<?php echo $slide['align']; ?>">

                                <?php if( !empty( $slide['expertise'] ) ) : ?>
                                    
                                    <div class="hdh">
                                        <span class="hero-description">
                                            <?php echo do_shortcode( nl2br( $slide['expertise'] ) ); ?>
                                        </span>
                                    </div>
                                
                                <?php endif; ?>

                                <?php if( !empty( $slide['description'] ) ) : ?>
                                    
                                    <div class="hth">
                                        <h1 data-responsive-font="hero_title" class="hero-title <?php echo implode( " ", $hero_title_classes ); ?>">
                                            <?php echo do_shortcode( nl2br( $slide['description'] ) ); ?>
                                        </h1>
                                    </div>
                                
                                <?php endif; ?>

                                <?php if( !empty( $slide['catchphrase'] ) ) : ?>
                                    
                                    <div class="hdb">
                                        <span data-responsive-font="hero_description" class="hero-description-bottom">
                                            <?php echo do_shortcode( nl2br( $slide['catchphrase'] ) ); ?>
                                        </span>
                                    </div>
                                
                                <?php endif; ?>

                                <?php if( !empty( $link_description ) ) : ?>
                                
                                    <span class="hero-btn-holder"><a target="_blank" href="<?php echo $slidelink; ?>" class="hero-btn hero-slider-button"><?php echo ut_translate_meta( $link_description ); ?></a></span>
                                
                                <?php endif; ?>

                            </div>
                        </div>
                        <!-- close hero-holder -->
                        
                    </div>
                
                <?php if( ut_return_hero_config( 'ut_hero_overlay' ) == 'on') : ?>
                
                    </div>
                
                <?php endif; ?>
                
            </li>

            <?php $slidecount++; endforeach; ?>

        </ul>

        <nav>
            <a class="prev" href="#">
                <?php esc_html_e( 'Previous item' , 'unitedthemes' ); ?>
            </a>
            <a class="next" href="#">
                <?php esc_html_e( 'Next item', 'unitedthemes' ); ?>
            </a>
        </nav>

        <?php if( ut_collect_option('ut_scroll_down_arrow' , 'off') == 'on' ) : ?>

            <div class="hero-down-arrow-wrap">

                <span class="hero-down-arrow">

                    <a href="#ut-to-first-section"><i class="Bklyn-Core-Down-3"></i></a>

                </span>

            </div>

        <?php endif; ?>
        
    </div>

    <?php endif; ?>
    
    <?php if( ut_return_hero_config( 'ut_hero_fancy_border' ) == 'on') : ?>

        <div class="ut-fancy-border"></div>

    <?php endif; ?>
    
    <div data-section="top" class="ut-scroll-up-waypoint"></div>
    
</section>
<!-- end hero section -->