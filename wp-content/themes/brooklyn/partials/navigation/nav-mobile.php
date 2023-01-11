<?php

$menu_align = ot_get_option( 'ut_mobile_navigation_align', 'left' );

$mobile = array(
    'echo'            => false,
    'container'       => 'nav',
    'container_id'    => 'ut-mobile-nav',
    'menu_id'         => 'ut-mobile-menu',
    'menu_class'      => 'ut-mobile-menu ut-mobile-menu-' . $menu_align,
    'fallback_cb'     => 'ut_default_menu',
    'container_class' => 'ut-mobile-menu mobile-grid-100 tablet-grid-100 hide-on-desktop',
    'items_wrap'      => '<div class="ut-scroll-pane-wrap"><div class="ut-scroll-pane"><ul id="%1$s" class="%2$s">%3$s</ul></div></div>',
    'walker'          => new ut_menu_walker()
);

if( has_nav_menu( 'mobile' ) || has_nav_menu( 'primary' ) ) {

    $classes = array();

    if( apply_filters( 'unite_header_layout', 'default' ) == 'default' && ut_return_header_config( 'ut_site_navigation_no_logo', 'no' ) == 'yes' ) {

        $classes[] = 'tablet-grid-100 mobile-grid-100';

        if( ut_return_header_config( 'ut_site_navigation_center', 'yes' ) == 'yes' ) {

            $classes[] = 'ut-mm-trigger-center';

        }			

    } else {
        
        // tablet grid
        $classes[] = 'tablet-grid-20';
        
        if( is_woocommerce_activated() ) {
            
            // mobile grid with optional cart icon
            $classes[] = 'mobile-grid-50';
            
        } else {
        
            // mobile grid
            $classes[] = 'mobile-grid-30';
            
        }

    }

    // mobile navigation trigger
    if( ut_return_header_config('ut_mobile_navigation_trigger_icon_type', 'hamburger') == 'custom' ) {

        echo '<div class="' . implode(" ", $classes ) . ' hide-on-desktop">';
        
            echo '<div class="ut-mm-trigger">';
        
                echo '<button class="ut-mm-button"></button>';
        
            echo '</div>';
        
            if( is_woocommerce_activated() ) { ?>

                <div class="ut-header-cart-mobile">

                    <a class="ut-header-cart" href="<?php echo wc_get_cart_url(); ?>" title="<?php esc_html_e( 'View your shopping cart', 'unitedthemes' ); ?>">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="ut-header-cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                    </a>
                    
                </div>    
                
            <?php }

        echo '</div>';
        
        

    } else {

        echo '<div class="' . implode(" ", $classes ) . ' hide-on-desktop">';
        
            echo '<div class="ut-mm-trigger">';
        
                echo ut_transform_button( 'ut-open-mobile-menu', 'ut-hamburger-wrap-mobile' );
        
            echo '</div>';
        
            if( is_woocommerce_activated() ) { ?>

                <div class="ut-header-cart-mobile">

                    <a class="ut-header-cart" href="<?php echo wc_get_cart_url(); ?>" title="<?php esc_html_e( 'View your shopping cart', 'unitedthemes' ); ?>">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="ut-header-cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                    </a>
                
                </div>    
                    
            <?php }

        echo '</div>';

    }
    
    // mobile menu first and primary as fallback
    if( has_nav_menu( 'mobile' ) ) {
        
        // add location
        $mobile['theme_location'] = 'mobile';        
        
    } else {
        
        // add location
        $mobile['theme_location'] = 'primary';
        
    }
        
    // mobile navigation
    echo wp_nav_menu( $mobile );

}