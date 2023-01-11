<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package unitedthemes
 */


/* check if page header has been activated */
if( ut_page_option( 'ut_display_section_header', 'show', 'ut_' ) == 'show' ) {

    $page_title_classes = array();

    $ut_page_slogan             = get_post_meta( get_the_ID() , 'ut_section_slogan' , true );
    
    $ut_page_header_style       = get_post_meta( get_the_ID() , 'ut_section_header_style' , true ); 
    $ut_page_header_style       = ( !empty( $ut_page_header_style ) && $ut_page_header_style != 'global' ) ? $ut_page_header_style : ot_get_option('ut_global_page_headline_style','pt-style-1');

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

    $glow   = ut_collect_option( 'ut_page_title_glow', 'off' ) == 'on' ? 'ut-glow' : '';
    $stroke = ut_collect_option( 'ut_page_title_stroke_effect', 'off' ) == 'on' ? 'ut-text-stroke' : '';
        
} ?>

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
            
            <?php if( !empty($ut_page_slogan) ) : ?>
                
                <div class="lead"><?php echo wpautop( $ut_page_slogan ); ?></div>
                
            <?php endif; ?>
            
        </header><!-- .page-header -->
        
    </div>
    
    <?php endif; ?>
    
    <div class="grid-100 mobile-grid-100 tablet-grid-100">
    
        <div class="entry-content clearfix">    
            
            <?php the_content(); ?>
            
            <?php
                wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'unitedthemes' ),
                    'after'  => '</div>',
                ) );
            ?>                                         
			
        </div><!-- .entry-content -->
    	
        <?php edit_post_link( esc_html__( 'Edit Page', 'unitedthemes' ), '<span class="edit-link">', '</span>' ); ?>
        
    </div>
    
</div><!-- #post -->