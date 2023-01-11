<?php

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * The Template for displaying a content block inside the Hero
 *
 * @author      United Themes
 * @package     Brooklyn
 * @version     1.1
 */

$cblock = get_post( ut_return_hero_config('ut_hero_content_block') ); ?>

<!-- hero section -->
<div id="ut-custom-hero" class="ut-custom-hero ut-content-block-hero ha-waypoint" data-animate-up="ha-header-hide" data-animate-down="ha-header-hide">
    
    <div id="ut-hero-early-waypoint" class="ut-early-waypoint" data-animate-up="ha-header-hide" data-animate-down="ha-header-small"></div>    
    
    <div class="grid-container">
        
        <div class="grid-100 mobile-grid-100 tablet-grid-100">
        
            <?php echo apply_filters( 'the_content', $cblock->post_content ); ?>    
        
        </div>    
            
    </div>    
        
    <div data-section="top" class="ut-scroll-up-waypoint"></div>
    
</div>
<!-- end hero section -->