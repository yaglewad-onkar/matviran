<?php if (!defined('ABSPATH')) {
    exit; // exit if accessed directly
}

/**
 * Change number or products per row
 *
 * since 4.7.4
 */

function ut_loop_shop_columns() {

	return 3; //@todo

}

add_filter('loop_shop_columns', 'ut_loop_shop_columns');


/**
 * Change number of products that are displayed per page (shop page)
 *
 * since 4.7.4
 */

function ut_loop_shop_per_page( $cols ) {
	
	$cols = 9; // @todo
  	return $cols;
	
}

add_filter( 'loop_shop_per_page', 'ut_loop_shop_per_page', 20 );


/**
 * Basic Woocommerce Icons
 *
 * since 4.9.1
 */

function ut_theme_shop_svg_icons() {

    if( !is_woocommerce_activated() ) {
        return;
    }
    
    ob_start(); ?>

    <div class="ut-new-hide">

        <symbol viewBox="0 0 16 16" id="minus-decrease"><path d="M16 7H0v2h16"></symbol>
        <symbol viewBox="0 0 16 16" id="plus-increase"><path d="M16 7H9V0H7v7H0v2h7v7h2V9h7z"></symbol>
    
    </div>    
        
    <?php echo ob_get_clean();
    
}

add_action('ut_after_footer_hook' , 'ut_theme_shop_svg_icons');