<?php 

// initialize header class
$header = new UT_Header_Class();

// create placeholder if necessary
$header->create_header_placeholder(); ?>

<header id="header-section" data-style="<?php echo esc_attr( $header->style ); ?>" data-primary-skin="<?php echo $header->header_primary_skin_data(); ?>" data-secondary-skin="<?php echo $header->header_secondary_skin_data(); ?>" class="<?php echo $header->header_class(); ?>" data-line-height="<?php echo esc_attr( $header->header_data_lineheight() ); ?>" data-total-height="<?php echo esc_attr( $header->header_data_totalheight() ); ?>">
     
	 <?php $header->create_top_header(); ?>
		
     <div class="grid-container">
               
        <div class="ha-header-perspective clearfix">

            <div class="ha-header-front clearfix">
				
				<div class="site-logo-wrap grid-15 tablet-grid-80 <?php echo $header->site_logo_mobile_grid(); ?> <?php echo $header->site_logo_flush_class(); ?>">

					<?php echo $header->create_site_logo(); ?>

				</div>    
				
				<?php $header->primary_navigation(); ?>

                <?php get_template_part( 'partials/navigation/nav', 'mobile' ); ?>
				
				<div class="ut-header-primary-extra-module ut-header-extra-module <?php echo $header->extra_modul_class('primary'); ?> ut-header-extra-module-right ut-header-extra-module-small <?php echo $header->extra_modul_flush_class(); ?> grid-15 hide-on-tablet hide-on-mobile">

                    <?php $header->create_primary_header_extra(); ?>
				
				</div>

            </div>

        </div>
    
    </div> 
    
</header>