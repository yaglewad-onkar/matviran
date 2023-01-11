<?php
    // Settings
    $menu_type = OhioOptions::get( 'page_header_menu_type', 'full' );
    $have_woocomerce = function_exists( 'WC' );
    $have_woocomerce_wl = function_exists( 'YITH_WCWL' );
    $have_wpml = function_exists( 'icl_get_languages' );
    $wpml_show_in_header = OhioOptions::get_global( 'wpml_show_in_header', true );
    $header_have_social = have_rows( 'global_header_menu_social_links', 'option' );
    $mobile_social_position = OhioOptions::get_global( 'page_mobile_header_social_position', 'default' );
    $mobile_menu_position = OhioOptions::get_global( 'page_mobile_header_menu_position', 'left' );
    $dropdown_carets_visibility = OhioOptions::get_global( 'page_header_counters_visibility', true );
    $social_icons_mobile = OhioOptions::get_global( 'page_mobile_social_networks_visibility', true );
    $mobile_menu = OhioOptions::get_global( 'page_extended_mobile_menu' );
    $mobile_second_click_link = OhioOptions::get_global( 'page_mobile_second_click_link', false );

    $site_navigation_class = '';
    if ( $menu_type == 'hamburger' ) {
        $site_navigation_class .= ' hidden';
    }

    if ( $mobile_menu_position == 'right' ) {
        $site_navigation_class .= ' slide-right';
    }

    if ( $dropdown_carets_visibility ) {
        $site_navigation_class .= ' with-counters';
    }

    if ( $mobile_menu ) {
        $site_navigation_class .= ' with-mobile-menu';
    }
?>

<nav id="site-navigation" class="nav<?php echo esc_attr( $site_navigation_class ); ?>" data-mobile-menu-second-click-link="<?php echo esc_attr( $mobile_second_click_link ); ?>">

    <!-- Mobile overlay -->
    <div class="mbl-overlay menu-mbl-overlay">
        <div class="mbl-overlay-bg"></div>

        <!-- Close bar -->
        <div class="close-bar text-left">
            <div class="btn-round btn-round-light clb-close" tabindex="0">
                <i class="ion ion-md-close"></i>
            </div>

            <!-- Search -->
            <?php get_template_part( 'parts/elements/search' ); ?>
        </div>
        <div class="mbl-overlay-container">

            <!-- Navigation -->
            <div id="mega-menu-wrap" class="nav-container">

                <?php
                    $menu = OhioOptions::get_global( 'page_extended_menu' );

                    if ( $menu ) {
                        $menu_exists = false;
                        $available_menus = wp_get_nav_menus();

                        foreach ($available_menus as $available_menu) {

                            if ($menu == $available_menu->term_id) {
                                $menu_exists = true;
                                break;
                            }
                        }

                        if ( !$menu_exists ) {
                            $menu = false;
                        }
                    }

                    if ( $menu ) {
                        wp_nav_menu( [ 'menu' => $menu, 'menu_id' => 'primary-menu' ] );
                    } else {
                        if ( has_nav_menu( 'primary' ) ) {
                            wp_nav_menu( [ 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ] );
                        } else {
                            echo '<span class="menu-blank" id="primary-menu">' . sprintf( esc_html__( 'Please, %1$s assign a menu %2$s', 'ohio' ), '<a class="highlighted" target="_blank" href="' . esc_url( home_url( '/' ) ) . 'wp-admin/nav-menus.php">', '</a>' ) . '</span>';
                        }
                    }

                    if ( $mobile_menu ) {
                        wp_nav_menu( [ 'menu' => $mobile_menu, 'menu_id' => 'mobile-menu', 'menu_class' => 'mobile-menu menu' ] );
                    }
                ?>
            </div>

            <!-- Copyright -->
            <div class="copyright">
                <?php echo wp_kses( OhioOptions::get_global( 'footer_copyright_left' ), 'post' ); ?>
                <br>
                <?php echo wp_kses( OhioOptions::get_global( 'footer_copyright_right' ), 'post' ); ?>
            </div>

            <?php get_template_part('parts/elements/lang_dropdown'); ?>

            <!-- Social links -->
            <?php if ( $header_have_social && $mobile_social_position == 'inside' ) : ?>
                <div class="socialbar small">
                    <?php
                        while ( have_rows( 'global_header_menu_social_links', 'option' ) ) :
                            the_row();

                            $_network_field = get_sub_field( 'social_network' );
                            printf( '<a href="%s" target="%s" class="%s">', esc_url( get_sub_field( 'url' ) ), $links_target, esc_attr( $_network_field ) );

                            switch ( $_network_field ) {
                                case 'behance':     echo '<i class="fab fa-behance"></i>';      break;
                                case 'digg':        echo '<i class="fab fa-digg"></i>';         break;
                                case 'discord':        echo '<i class="fab fa-discord"></i>';         break;
                                case 'dribbble':    echo '<i class="fab fa-dribbble"></i>';     break;
                                case 'facebook':    echo '<i class="fab fa-facebook-f"></i>';   break;
                                case 'flickr':      echo '<i class="fab fa-flickr"></i>';       break;
                                case 'github':      echo '<i class="fab fa-github-alt"></i>';   break;
                                case 'instagram':   echo '<i class="fab fa-instagram"></i>';    break;
                                case 'kaggle':   echo '<i class="fab fa-kaggle"></i>';    break;
                                case 'linkedin':    echo '<i class="fab fa-linkedin"></i>';     break;
                                case 'medium':    echo '<i class="fab fa-medium-m"></i>';     break;
                                case 'mixer':   echo '<i class="fab fa-mixer"></i>';   break;
                                case 'pinterest':   echo '<i class="fab fa-pinterest"></i>';    break;
                                case 'quora':       echo '<i class="fab fa-quora"></i>';        break;
                                case 'reddit':      echo '<i class="fab fa-reddit-alien"></i>'; break;
                                case 'snapchat':    echo '<i class="fab fa-snapchat"></i>';     break;
                                case 'soundcloud':    echo '<i class="fab fa-soundcloud"></i>';     break;
                                case 'spotify':    echo '<i class="fab fa-spotify"></i>';     break;
                                case 'teamspeak':    echo '<i class="fab fa-teamspeak"></i>';     break;
                                case 'telegram':    echo '<i class="fab fa-telegram-plane"></i>';     break;
                                case 'tiktok':   echo '<i class="fab fa-tiktok"></i>';   break;
                                case 'tumblr':     echo '<i class="fab fa-tumblr"></i>';      break;
                                case 'twitch':   echo '<i class="fab fa-twitch"></i>';   break;
                                case 'twitter':     echo '<i class="fab fa-twitter"></i>';      break;
                                case 'vimeo':       echo '<i class="fab fa-vimeo"></i>';        break;
                                case 'vine':        echo '<i class="fab fa-vine"></i>';         break;
                                case 'vk':          echo '<i class="fab fa-vk"></i>';           break;
                                case 'whatsapp':    echo '<i class="fab fa-whatsapp"></i>';     break;
                                case 'xing':    echo '<i class="fab fa-xing"></i>';     break;
                                case 'youtube':     echo '<i class="fab fa-youtube"></i>';      break;
                                case '500px':     echo '<i class="fab fa-500px"></i>';      break;
                            }

                            echo '</a>';
                        endwhile;
                    ?>
                </div>
            <?php endif; ?>
        </div>

        <!-- Mobile social icons -->
        <?php if ($social_icons_mobile) {
            get_template_part( 'parts/elements/social_networks' );
        } ?>
    </div>
</nav>
