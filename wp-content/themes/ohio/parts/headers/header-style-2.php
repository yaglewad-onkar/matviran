<?php
    // Settings
    $is_fixed = OhioOptions::get( 'page_header_menu_fixed', true );
    $header_style= OhioOptions::get( 'page_header_menu_style', 'style1' );
    $mobile_is_fixed = OhioOptions::get_global( 'page_header_mobile_menu_fixed' );
    $fixed_initial_offset = OhioOptions::get_global( 'page_header_fixed_initial_offset' );
    $use_wrapper = OhioOptions::get( 'page_header_menu_use_wrapper', true );
    $show_subheader = OhioSettings::subheader_is_displayed();
    $cart_visible = OhioOptions::get_global( 'woocommerce_cart_icon', true );
    $have_woocomerce = function_exists( 'WC' );
    $have_woocomerce_wl = function_exists( 'YITH_WCWL' );
    $mobile_search_visibility = OhioOptions::get( 'page_mobile_search_visibility', true );
    $search_position = OhioOptions::get( 'page_header_search_position', 'standard' );
    $hamburger_position = OhioOptions::get_global( 'page_header_menu_position', 'left' );
    $mobile_hamburger_position = OhioOptions::get_global( 'page_header_mobile_menu_position', 'left' );
    $menu_type = OhioOptions::get( 'page_header_menu_type', 'full' );
    $header_dynamic_typo = OhioOptions::get( 'page_header_dynamic_typography_color', false );

    $header_classes = '';

    if ( $show_subheader ) { 
        $header_classes .= ' subheader_included'; 
    }
    if ( !$mobile_search_visibility ) {
        $header_classes .= ' without-mobile-search';
    }
    if ( $header_dynamic_typo ) {
        $header_classes .= ' header-dynamic-typo';
    }

    if ($mobile_hamburger_position != $hamburger_position) {
        $header_classes .= ' hamburger-position-' . $hamburger_position  . ' mobile-hamburger-position-' . $mobile_hamburger_position; 
    }

    $is_hamburger = $menu_type == 'full' ? false : true;

    if ( $menu_type == "both" ) {
        $header_classes .= ' both-types';
    } else if ($menu_type == "full") {
        $header_classes .= ' extended-menu';
    }
?>

<header id="masthead" class="header dark-text header-2<?php echo esc_attr( $header_classes ); ?>"
    <?php if ( $is_fixed ) { echo ' data-header-fixed="true"'; } ?>
    <?php if ( $mobile_is_fixed ) { echo ' data-mobile-header-fixed="true"'; } ?>
    <?php if ( $fixed_initial_offset ) { echo ' data-fixed-initial-offset="' . $fixed_initial_offset . '"'; } ?>>
        
    <div class="header-wrap">
        <div class="top-part<?php if ( $use_wrapper ) { echo ' page-container'; } ?>">
            <ul class="menu-optional menu-optional-left">
                <li>
                    <?php if ( $hamburger_position == 'left' && $is_hamburger): ?>
                        <div class="desktop-hamburger">
                            <?php get_template_part( 'parts/elements/menu_hamburger' );?>
                        </div>
                    <?php endif; ?>
                    <?php if ( $mobile_hamburger_position == 'left' ): ?>
                        <div class="mobile-hamburger -left">
                            <?php get_template_part( 'parts/elements/menu_hamburger' );?>
                        </div>
                    <?php endif; ?>
                </li>
                <li class="lang-dropdown-holder">
                    <?php get_template_part( 'parts/elements/lang_dropdown' ); ?>
                </li>
            </ul>

            <?php get_template_part( 'parts/elements/menu_logo' ); ?>
            <ul class="menu-optional menu-optional-right">
                <li class="btn-optional-holder">
                    <?php get_template_part( 'parts/elements/menu_button' ); ?>
                </li>
                <?php if ( $search_position == "standard" ) : ?>
                    <li>
                        <?php get_template_part( 'parts/elements/search' );?>
                    </li>
                <?php endif; ?>

                <?php if ( $have_woocomerce ) : ?>
                    <?php if ( $cart_visible !== false ) : ?>
                        <?php if ($have_woocomerce_wl) : ?>
                            <li>
                                <a class="btn-round btn-round-light favorites-global" href="<?php echo esc_url(YITH_WCWL()->get_wishlist_url('user' . '/' . get_current_user_id())); ?>">
                                    <i class="icon ion ion-md-heart-empty brand-color-hover-i"></i>
                                </a>
                            </li>
                        <?php endif; ?>
                    <li>
                        <?php get_template_part( 'parts/elements/menu_cart' ); ?>
                    </li>
                    <?php endif; ?>
                <?php endif; ?>
				<?php if ( $hamburger_position == 'right' && $is_hamburger): ?>
					<div class="desktop-hamburger -right">
						<?php get_template_part( 'parts/elements/menu_hamburger' );?>
					</div>
				<?php endif; ?>
				<?php if ( $mobile_hamburger_position == 'right' ): ?>
					<div class="mobile-hamburger -right">
						<?php get_template_part( 'parts/elements/menu_hamburger' );?>
					</div>
				<?php endif; ?>
            </ul>
        </div>
        <div class="middle-part"></div>
        <div class="bottom-part<?php if ( $use_wrapper ) { echo ' page-container'; } ?>">
            <?php get_template_part( 'parts/elements/menu_nav' ); ?>
        </div>
    </div>
</header>
<?php get_template_part( 'parts/elements/menu_hamburger_fullscreen' ); ?>