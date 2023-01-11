<section id="ut-hero" class="hero ha-waypoint parallax-section parallax-background" data-animate-up="ha-header-hide" data-animate-down="ha-header-hide">
    
    <div id="ut-hero-early-waypoint" class="ut-early-waypoint" data-animate-up="ha-header-hide" data-animate-down="ha-header-small"></div>
    
    <div class="parallax-scroll-container hero-parallax-scroll-container parallax-scroll-container-hide <?php echo ot_get_option('ut_search_hero_parallax') == 'off' ? 'parallax-scroll-container-disabled' : ''; ?>" data-parallax-bottom data-parallax-factor="8"></div>
    
    <?php ut_before_hero_content_hook(); ?> 
    
    <div class="grid-container">
        
        <!-- hero holder -->
        <div class="hero-holder grid-100 mobile-grid-100 tablet-grid-100 <?php echo ut_return_hero_config('ut_hero_style' , 'ut-hero-style-1'); ?>">
            
            <div class="hero-inner">             
                
                <?php if ( !have_posts() ) : ?>
                
                    <div class="hth">
                        <h1 class="hero-title element-with-custom-line-height"><?php _e( 'Nothing Found', 'unitedthemes' ); ?></h1>
                    </div>
                    
                    <div class="hdb">
                        <span data-responsive-font="hero_description" class="hero-description-bottom">
                            
                            <?php _e( 'Sorry, but nothing matched your search terms. <br /> Please try again with some different keywords.', 'unitedthemes' ); ?>
                                
                        </span>
                    </div>
                    
                    <form role="search" method="get" class="search-form" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    
                        <label>
                            <input type="search" class="search-field" placeholder="<?php esc_attr_e( 'To search type and hit enter' , 'unitedthemes' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="<?php esc_html_e( 'Search for:' , 'unitedthemes' ); ?>">
                        </label>
                        
                        <a id="ut-hero-search-submit" class="hero-btn" href="#"><?php esc_attr_e( 'Search' , 'unitedthemes' ); ?></a>
                        
                    </form>
                
                <?php else : ?>
                    
                    <div class="hth">
                        <h1 class="hero-title element-with-custom-line-height"><?php esc_html_e( 'Results For:' , 'unitedthemes' ); ?></h1>
                    </div>    
                    
                    <div class="hdb">
                        <span data-responsive-font="hero_description" class="hero-description-bottom">
                            
                            <?php echo get_search_query(); ?>
                                
                        </span>
                    </div>
                    
                <?php endif; ?>
                
            </div>
            
            <?php if ( have_posts() ) : ?>

	            <?php if( ot_get_option( 'ut_global_scroll_down_arrow', 'off' ) == 'on' ) : ?>

                    <div class="hero-down-arrow-wrap">

                        <span class="hero-down-arrow">

                            <a href="#ut-to-first-section"><i class="Bklyn-Core-Down-3"></i></a>

                        </span>

                    </div>

	            <?php endif; ?>
            
            <?php endif; ?>
            
        </div>
        <!-- close hero-holder -->
    
    </div>
    
    <?php ut_after_hero_content_hook(); ?> 
    
</section>
<!-- end hero section -->