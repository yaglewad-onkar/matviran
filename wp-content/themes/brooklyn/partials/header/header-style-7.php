<?php 

// initialize header class
$header = new UT_Header_Class();

// create placeholder if necessary
$header->create_header_placeholder(); ?>

<header id="header-section" data-style="<?php echo esc_attr( $header->style ); ?>" data-primary-skin="<?php echo $header->header_primary_skin_data(); ?>" data-secondary-skin="<?php echo $header->header_secondary_skin_data(); ?>" class="<?php echo $header->header_class(); ?>" data-line-height="<?php echo esc_attr( $header->header_data_lineheight() ); ?>" data-total-height="<?php echo esc_attr( $header->header_data_totalheight() ); ?>" data-separator="<?php echo esc_attr( $header->data_header_area_separator() ); ?>">
     
	 <?php $header->create_top_header(); ?>
		
     <div id="header-section-upper-area" class="hide-on-tablet hide-on-mobile">
	
		<div class="grid-container">
			
			<div class="ha-header-perspective clearfix">
			    
				<div class="ha-header-front ha-header-front-upper clearfix">
				    
                    <div class="ut-header-extra-module ut-header-primary-extra-module <?php echo $header->extra_modul_class('primary'); ?> ut-header-extra-module-small <?php echo $header->extra_modul_flush_class(); ?> grid-40 hide-on-tablet hide-on-mobile">

						<?php $header->create_primary_header_extra(); ?>

					</div>                    
                    
                    <div class="site-logo-wrap grid-20">

                        <?php echo $header->create_site_logo(); ?>

                    </div>    				
                    
                    <div class="ut-header-secondary-extra-module ut-header-extra-module <?php echo $header->extra_modul_class('secondary'); ?> ut-header-extra-module-right ut-header-extra-module-small <?php echo $header->extra_modul_flush_class(); ?> grid-40 hide-on-tablet hide-on-mobile">

						<?php $header->create_secondary_header_extra(); ?>

					</div>
                    
                </div>

            </div>
    
        </div> 
    
    </div>
         
    <div id="header-section-lower-area" class="hide-on-tablet hide-on-mobile">
	
		<div class="grid-container">
		
			<div class="ha-header-perspective clearfix">
			
                <div class="ha-header-front ha-header-front-lower clearfix">     
                    
                    <?php $header->primary_navigation(); ?>
                    
                </div>

            </div>
    
        </div> 
    
    </div>
    
    <div class="grid-container hide-on-desktop">
               
        <div class="ha-header-perspective clearfix">

            <div class="ha-header-front clearfix">
                
                <div class="site-logo-wrap tablet-grid-80 <?php echo $header->site_logo_mobile_grid(); ?>">
                
                    <?php echo $header->create_site_logo(); ?>
                
                </div>    
                    
                <?php get_template_part( 'partials/navigation/nav', 'mobile' ); ?>
                
            </div>
    
        </div>    
    
    </div> 
    
</header>