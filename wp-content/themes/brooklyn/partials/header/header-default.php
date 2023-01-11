<?php 

// initialize header class
$header = new UT_Header_Class();

// create placeholder if necessary
$header->create_header_placeholder(); 

// fallback to old settings @todo check local
$overlay_navigation = apply_filters( 'unite_overlay_navigation', 'off' ) == 'on'; ?>

<header id="header-section" data-style="<?php echo esc_attr( $header->style ); ?>" data-primary-skin="<?php echo $header->header_primary_skin_data(); ?>" data-secondary-skin="<?php echo $header->header_secondary_skin_data(); ?>" class="<?php echo $header->header_class(); ?>" data-line-height="<?php echo esc_attr( $header->header_data_lineheight() ); ?>" data-total-height="<?php echo esc_attr( $header->header_data_totalheight() ); ?>">
     
	 <?php $header->create_top_header(); ?>
		
     <div class="grid-container">
               
        <div class="ha-header-perspective clearfix">

            <div class="ha-header-front clearfix">
				
				<?php if( ut_return_header_config( 'ut_site_navigation_no_logo', 'no' ) == 'no' || !ut_return_header_config( 'ut_site_navigation_no_logo', 'no' ) ) : ?>
				
					<div class="site-logo-wrap <?php echo apply_filters( 'unite_overlay_navigation', 'off' ) == 'off' ? 'grid-15' : 'grid-80'; ?> tablet-grid-80 <?php echo $header->site_logo_mobile_grid(); ?> <?php echo $header->site_logo_flush_class(); ?>">

						<?php echo $header->create_site_logo(); ?>

					</div>    
				
				<?php endif; ?> 
				
                <?php if( $overlay_navigation ) : ?>
                
                    <?php 
                    
                    // create overlay navigation    
                    $header->overlay_navigation = true; 
                
                    // class array
                    $overlay_navigation_classes = array();
		
                    if( ut_return_header_config( 'ut_site_navigation_no_logo', 'no' ) == 'yes' ) {

                        $overlay_navigation_classes[] = 'grid-100';

                        if( ut_return_header_config( 'ut_site_navigation_center', 'yes' ) == 'yes' ) {

                            $overlay_navigation_classes[] = 'ut-open-overlay-trigger-centered';

                        }

                    } else {

                        $overlay_navigation_classes[] = 'grid-20';
                        
                        if( ( apply_filters( 'ut_show_siteframe', 'hide' ) == 'show' && ut_return_header_config( 'ut_site_navigation_flush', 'no' ) == 'yes' ) && ut_return_header_config( 'ut_navigation_width', 'centered' ) == 'fullwidth' ) {
    
                            $overlay_navigation_classes[] = 'ut-flush-module'; 

                        }

                    } ?>
                
                    <div class="ut-open-overlay-trigger <?php echo implode(" ", $overlay_navigation_classes ); ?> hide-on-tablet hide-on-mobile">
                
                        <?php $header->transform_button( 'ut-open-overlay-menu', 'ut-hamburger-wrap-overlay', 'ut-open-overlay-menu' ); ?>
                
                    </div>    
                
                <?php else : ?>
                
                    <?php $header->primary_navigation(); ?>
                
                <?php endif; ?>
                
                <?php get_template_part( 'partials/navigation/nav', 'mobile' ); ?>

            </div>

        </div>
    
    </div> 
    
</header>