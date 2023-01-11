<?php

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * The Template for displaying Tab Hero
 *
 * @author      United Themes
 * @package     Brooklyn
 * @version     4.0
 */

$hero_classes = array();
$hero_title_classes = array();
$hero_title_span_classes = array();

/* 
 * template config: hero intro animation
 */

$hero_classes[]  = ut_collect_option( 'ut_hero_image_animation_effect', 'heroFadeIn' );

/* 
 * template config: content 
 */

$ut_custom_logo         = ut_collect_option( 'ut_custom_hero_logo' );
$ut_custom_slogan       = ut_return_hero_config( 'ut_hero_custom_html' );
$ut_expertise_slogan    = ut_return_hero_config( 'ut_hero_caption_slogan' );
$ut_data_company_slogan = $ut_company_slogan   = ut_return_hero_config( 'ut_hero_caption_title' );
$ut_catchphrase         = ut_return_hero_config( 'ut_hero_catchphrase' );

/* 
 * template config: canvas color 
 */

$ut_effect_color = ut_return_hero_config( 'ut_hero_overlay_effect_color' );
$ut_effect_color = !empty( $ut_effect_color ) ? $ut_effect_color : get_option( 'ut_accentcolor', '#F1C40F' );


/* 
 * template config: tabs
 */

$ut_tabs          = ut_return_hero_config( 'ut_tabs' );
$ut_tabs_headline = ut_return_hero_config( 'ut_tabs_headline' );


/* 
 * template config: hero intro animation
 */

$hero_classes[]  = ut_collect_option( 'ut_hero_image_animation_effect', 'heroFadeIn' );

/* 
 * template config: hero caption intro animation
 */

$ut_hero_animation_element_group        = '';
$ut_hero_animation_element_single       = ''; 
$ut_hero_animation_element_group_split  = ''; // only for brooklyn effects

if( ut_collect_option( 'ut_hero_caption_animation_type', 'group' ) == 'group' ) {
    
    $ut_hero_animation_element_group  = 'ut-hero-animation-element';
    
} elseif( ut_collect_option( 'ut_hero_caption_animation_type', 'group' ) == 'group_split' ) {
    
    $ut_hero_animation_element_group_split = 'ut-hero-animation-element';

} else {
    
    $ut_hero_animation_element_single = 'ut-hero-animation-element';
    
}

/*
 * template config: hero title glitch effect
 */

if( ut_collect_option( 'ut_caption_title_glitch', 'off' ) == 'on' ) {

    $hero_title_span_classes[] = 'ut-glitch';
    $hero_title_span_classes[] = ut_collect_option( 'ut_caption_title_glitch_style', 'ut-glitch-1' );

}

/*
 * template config: hero title distortion effect
 */

if( ut_collect_option( 'ut_caption_title_distortion', 'off' ) == 'on' ) {

    if( strpos( $ut_company_slogan, "ut_rotate_words") !== FALSE ) {

        $ut_company_slogan = str_replace('[ut_rotate_words', '[ut_rotate_words glitch="' . ut_collect_option( 'ut_caption_title_distortion_style', 'style-1' ) . '"', $ut_company_slogan);

    } elseif( strpos( $ut_company_slogan, "ut-typewriter") !== FALSE ) {

        $ut_company_slogan = str_replace('<ut-typewriter-1', '<ut-typewriter-1 data-ut-glitch-class="ut-simple-glitch-text-' . ut_collect_option( 'ut_caption_title_distortion_style', 'style-1' ) . '" class="ut-glitch-on-appear" data-glitch=""', $ut_company_slogan);
        $ut_company_slogan = str_replace('<ut-typewriter-2', '<ut-typewriter-2 data-ut-glitch-class="ut-simple-glitch-text-' . ut_collect_option( 'ut_caption_title_distortion_style', 'style-1' ) . '" class="ut-glitch-on-appear" data-glitch=""', $ut_company_slogan);

        if( strpos( $ut_company_slogan, "ut-typewriter-1") !== FALSE ) {

            $ut_data_company_slogan = explode( "," , strip_tags( $ut_company_slogan ) )[0] . '|';

        } else {

            $ut_data_company_slogan = explode( "," , strip_tags( $ut_company_slogan ) )[0] . '_';

        }

    } else {

        $hero_title_classes[] = 'ut-simple-glitch-text-permanent';
        $hero_title_classes[] = 'ut-simple-glitch-text-' . ut_collect_option( 'ut_caption_title_distortion_style', 'style-1' ) . '-permanent';

    }

}

/* 
 * template config: tablet color and shadow
 */

$ut_tabs_tablet_color  = ut_return_hero_config( 'ut_tabs_tablet_color', 'black' );
$ut_tabs_tablet_shadow = ut_return_hero_config( 'ut_tabs_tablet_shadow', 'off' ) == 'on' ? 'shadow' : ''; ?>

<!-- Hero Section -->
<section id="ut-hero" class="hero ha-waypoint parallax-section parallax-background <?php echo implode( " " , $hero_classes ); ?>" data-animate-up="ha-header-hide" data-animate-down="ha-header-hide">
    
    <div id="ut-hero-early-waypoint" class="ut-early-waypoint" data-animate-up="ha-header-hide" data-animate-down="ha-header-small"></div>
    
    <div class="parallax-scroll-container hero-parallax-scroll-container parallax-scroll-container-hide <?php echo ut_return_hero_config('ut_hero_image_parallax') == 'off' ? 'parallax-scroll-container-disabled' : ''; ?>" data-parallax-bottom data-parallax-factor="8">
        
        <div class="parallax-image-container">

            <?php if( ut_collect_option( 'ut_hero_glitch' , 'off' ) == 'on' && class_exists('UT_Glitch_Effect') ) {

                $hero_image        = ut_collect_option('ut_hero_image');
                $hero_tablet_image = ut_collect_option('ut_hero_image_tablet');
                $hero_mobile_image = ut_collect_option('ut_hero_image_mobile');

                $glitch = new UT_Glitch_Effect( array(
                    'image_id'                  => 'hero',
                    'glitch_effect'             => ut_collect_option('ut_hero_glitch_effect' , 'ethereal'),
                    'glitch_type'               => 'image',
                    'image_desktop'             => isset( $hero_image['background-image'] )        ? $hero_image['background-image'] : '',
                    'image_tablet'              => isset( $hero_tablet_image['background-image'] ) ? $hero_tablet_image['background-image'] : '',
                    'image_mobile'              => isset( $hero_mobile_image['background-image'] ) ? $hero_mobile_image['background-image'] : '',
                    'image_desktop_position'    => isset( $hero_image['background-position'] )        ? $hero_image['background-position'] : '',
                    'image_tablet_position'     => isset( $hero_tablet_image['background-position'] ) ? $hero_tablet_image['background-position'] : '',
                    'image_mobile_position'     => isset( $hero_mobile_image['background-position'] ) ? $hero_mobile_image['background-position'] : '',
                    'accent_1'                  => ut_collect_option('ut_hero_glitch_effect_accent_1'),
                    'accent_2'                  => ut_collect_option('ut_hero_glitch_effect_accent_2'),
                    'accent_3'                  => ut_collect_option('ut_hero_glitch_effect_accent_3'),
                    'inline_css'                => true,
                    'permanent_glitch'          => 'on',
                    'lozad'                     => false
                ));

                echo $glitch->render();

            } ?>

        </div>
        
    </div>
    
    <?php // Hero Overlay Animation Effect
    
    if( ut_return_hero_config('ut_hero_overlay_effect') == 'on') : ?>

        <canvas data-strokecolor="<?php echo ut_hex_to_rgb( $ut_effect_color ); ?>" id="ut-animation-canvas"></canvas>

    <?php endif; ?>

    <?php // overlay effect for hero 
    if( ut_return_hero_config('ut_hero_overlay') == 'on') : ?>

        <div class="parallax-overlay <?php echo ut_return_hero_config( 'ut_hero_overlay_pattern', 'on' ) == 'on' ? 'parallax-overlay-pattern' : ''; ?> <?php echo ut_return_hero_config('ut_hero_overlay_pattern_style' , 'style_one'); ?>">

    <?php endif; ?>

        <div class="grid-container">

            <!-- hero holder -->
            <div class="hero-holder ut-half-height grid-100 mobile-grid-100 tablet-grid-100 <?php echo ut_return_hero_config('ut_hero_style' , 'ut-hero-style-1'); ?>">
                
                <div class="hero-inner" style="text-align:<?php echo ut_return_hero_config('ut_hero_align' , 'center'); ?>;">
                    
                    <!-- caption animation group -->
                    <?php if( $ut_hero_animation_element_group ) : ?> <div class="<?php echo $ut_hero_animation_element_group; ?>"> <?php endif; ?>        
                    
                    <!-- caption animation split group -->
                    <?php if( $ut_hero_animation_element_group_split ) : ?> <div class="ut-hero-animation-element ut-hero-animation-element-upper"> <?php endif; ?>
                    
                        <?php if( !empty( $ut_custom_slogan ) ) : ?>
                    
                            <div class="<?php echo $ut_hero_animation_element_single; ?>">    
                    
                                <?php echo do_shortcode( ut_translate_meta( $ut_custom_slogan ) ); ?>
                                
                            </div>    

                        <?php endif; ?>

                        <?php if( !empty( $ut_custom_logo  ) ) : ?>

                            <div class="ut-hero-custom-logo-holder">
                                <img class="<?php echo $ut_hero_animation_element_single; ?>" src="<?php echo esc_url( $ut_custom_logo  ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
                            </div>

                        <?php endif; ?>

                        <?php if( !empty( $ut_expertise_slogan ) ) : ?>

                            <div class="hdh">
                                <span data-responsive-font="hero_slogan" class="hero-description <?php echo $ut_hero_animation_element_single; ?>">
                                    <?php echo do_shortcode( nl2br( $ut_expertise_slogan ) ); ?>
                                </span>
                            </div>

                        <?php endif; ?>

                        <?php if( !empty( $ut_company_slogan ) ) : ?>

                            <?php

                            $ut_data_company_slogan = str_replace( "\n","&#13;&#10;", strip_tags( strip_shortcodes( $ut_data_company_slogan ) ) );

                            // check if title contains linebreaks
                            if( strpos( $ut_data_company_slogan, "\n") !== FALSE ) {

                                $hero_title_classes[] = 'title-with-linebreak';

                            }

                            // check if title contains word rotator
                            if( strpos( $ut_company_slogan, "ut_rotate_words") !== FALSE ) {

                                $hero_title_span_classes[] = 'title-with-wordrotator';

                            }

                            // check if title contains typewriter
                            if( strpos( $ut_company_slogan, "ut-typewriter") !== FALSE ) {

                                $hero_title_span_classes[] = 'title-with-typewriter';

                            }

                            $hero_title_classes[] = ut_collect_option( 'ut_caption_title_glow', 'off' ) == 'on' ? 'ut-glow' : '';
                            $hero_title_classes[] = ut_collect_option( 'ut_caption_title_stroke_effect', 'off' ) == 'on' ? 'ut-text-stroke' : ''; ?>

                            <div class="hth">
                                <h1 data-title="<?php echo esc_attr( $ut_data_company_slogan ); ?>" data-responsive-font="hero_title" class="hero-title <?php echo $ut_hero_animation_element_single; ?> element-with-custom-line-height <?php echo implode( " ", $hero_title_classes ); ?>">
                                    <span data-title="<?php echo esc_attr( $ut_data_company_slogan ); ?>" class="ut-base-span <?php echo implode( " ", $hero_title_span_classes ); ?>"><?php echo do_shortcode( nl2br( $ut_company_slogan ) ); ?></span>
                                </h1>
                            </div>

                        <?php endif; ?>
                        
                        <?php if( $ut_hero_animation_element_group_split ) : ?> </div> <?php endif; ?>        
                        <!-- caption animation split group end -->

                        <!-- caption animation split group -->
                        <?php if( $ut_hero_animation_element_group_split ) : ?> <div class="ut-hero-animation-element ut-hero-animation-element-lower"> <?php endif; ?>
                    
                        <?php if( !empty( $ut_catchphrase ) ) : ?>

                            <div class="hdb">
                                <span data-responsive-font="hero_description" class="hero-description-bottom <?php echo $ut_hero_animation_element_single; ?>">
                                    <?php echo do_shortcode( nl2br( ut_translate_meta( $ut_catchphrase ) ) ); ?>
                                </span>
                            </div>

                        <?php endif; ?>

                        <?php ut_hero_buttons(); ?>
                    
                    <?php if( $ut_hero_animation_element_group_split ) : ?> </div> <?php endif; ?>
                    <!-- caption animation split group end -->
                    
                    <?php if( $ut_hero_animation_element_group ) : ?> </div> <?php endif; ?>

                </div>
            </div>
            <!-- close hero-holder -->

            <div class="ut-tablet-holder ut-half-height hide-on-mobile">

                <div class="ut-tablet-inner">

                    <div class="grid-40 suffix-5 mobile-grid-100 tablet-grid-40 tablet-suffix-5">

                        <?php if( !empty( $ut_tabs_headline  ) ) : ?>

                        <h2 class="ut-tablet-title">
                            <?php echo ut_translate_meta( $ut_tabs_headline  ); ?>
                        </h2>

                        <?php endif;?>

                        <?php if( !empty($ut_tabs) && is_array($ut_tabs) ) : ?>

                        <ul class="ut-tablet-nav">

                            <?php $counter = 1; foreach($ut_tabs as $tab) : ?>

                            <?php if( !empty( $tab['title'] ) ) : ?>

                            <li class="<?php echo ( $counter == 1 ) ? 'selected' : ''; ?>">
                                <a href="#">
                                    <?php echo ut_translate_meta( $tab['title'] ); ?>
                                </a>
                            </li>

                            <?php endif; ?>

                            <?php $counter++; endforeach; ?>

                        </ul>

                        <?php endif; ?>

                    </div>

                    <div class="grid-55 mobile-grid-100 tablet-grid-55">

                        <?php if( !empty($ut_tabs) && is_array($ut_tabs) ) : ?>

                        <ul class="ut-tablet <?php echo esc_attr( $ut_tabs_tablet_color ); ?> <?php echo esc_attr( $ut_tabs_tablet_shadow ); ?>">

                            <?php $counter = 1; foreach( $ut_tabs as $tab ) : ?>

                            <li class="<?php echo ($counter == 1) ? 'show' : ''; ?>">

                                <?php 
                                
                                $tab_image = ut_resize( ut_translate_meta( $tab['image'] ) , '800' , '800', true , true , true ); 
                                
                                if( !$tab_image && function_exists( 'vc_asset_url' ) ) {
                                
                                    $tab_image = vc_asset_url( 'vc/no_image.png' );    
                                
                                }
                                
                                ?>

                                <img src="<?php echo $tab_image; ?>" alt="<?php echo $tab['title']; ?>">

                                <div class="ut-tablet-overlay">

                                    <div class="ut-tablet-overlay-content-wrap">

                                        <div class="ut-tablet-overlay-content">

                                            <?php if( !empty( $tab['title'] ) ) : ?>

                                            <h2 class="ut-tablet-single-title">
                                                <?php echo ut_translate_meta( $tab['title'] ); ?>
                                            </h2>

                                            <?php endif; ?>

                                            <?php if( !empty( $tab['description'] ) ) : ?>

                                            <p class="ut-tablet-desc">
                                                <?php echo ut_translate_meta( $tab['description'] ); ?>
                                            </p>

                                            <?php endif; ?>

                                            <?php if( !empty( $tab['link_one_text'] ) ) : ?>

                                            <a class="ut-btn ut-left-tablet-button theme-btn small round" href="<?php echo ut_translate_meta( $tab['link_one_url'] ); ?>">
                                                <?php echo ut_translate_meta( $tab['link_one_text'] ); ?>
                                            </a>

                                            <?php endif; ?>

                                            <?php if( !empty( $tab['link_two_text'] ) ) : ?>

                                            <a class="ut-btn ut-right-tablet-button theme-btn small round" href="<?php echo ut_translate_meta( $tab['link_two_url'] ); ?>">
                                                <?php echo ut_translate_meta( $tab['link_two_text'] ); ?>
                                            </a>

                                            <?php endif; ?>

                                        </div>

                                    </div>

                                </div>

                            </li>

                            <?php $counter++; endforeach; ?>

                        </ul>

                        <?php endif; ?>

                    </div>

                </div>

            </div>

        </div>

    <?php // End Hero Overlay Container
        
    if( ut_return_hero_config('ut_hero_overlay') == 'on') : ?>

    </div>

    <?php endif; ?>

    <?php if( ut_collect_option('ut_scroll_down_arrow' , 'off') == 'on' ) : ?>

        <div class="hero-down-arrow-wrap">

            <span class="hero-down-arrow">

                <a href="#ut-to-first-section"><i class="Bklyn-Core-Down-3"></i></a>

            </span>

        </div>

    <?php endif; ?>

    <div data-section="top" class="ut-scroll-up-waypoint"></div>

</section>
<!-- end hero section -->