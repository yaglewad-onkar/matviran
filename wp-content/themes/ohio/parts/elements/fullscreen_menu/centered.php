<?php
$have_wpml = function_exists( 'icl_get_languages' );
$wpml_show_in_header = OhioOptions::get_global( 'wpml_show_in_header', true );
$header_have_social = have_rows( 'global_header_menu_social_links', 'option' );
$fullscreen_have_social = OhioOptions::get_global( 'page_hamburger_social_networks_visibility', true );
$fullscreen_have_lang = OhioOptions::get_global( 'page_hamburger_lang_switcher_visibility', true );
$menu_position = OhioOptions::get_global( 'page_header_menu_position', 'left', true );
$in_new_tab = OhioOptions::get_global( 'social_network_target_blank', true );
$links_target = ( $in_new_tab ) ? '_blank' : '_self';
?>

<div class="clb-popup hamburger-nav type2">
    <div class="close-bar text-<?php echo esc_attr( $menu_position ); ?>">
        <div class="btn-round clb-close" tabindex="0">
            <i class="ion ion-md-close"></i>
        </div>
    </div>
    <div class="page-container">
        <div class="hamburger-nav-holder">
            <?php
                $menu = OhioOptions::get_global( 'page_hamburger_menu' );

                if ( is_nav_menu( $menu ) ) {
                    wp_nav_menu( array( 'menu' => $menu, 'menu_id' => 'secondary-menu' ) );
                } else {
                    if ( has_nav_menu( 'primary' ) ) {
                        wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'secondary-menu' ) );
                    } else {
                        echo '<span class="menu-blank">' . sprintf(esc_html__('Please, %1$sassign a menu%2$s', 'ohio'), '<a class="highlighted" target="_blank" href="' . esc_url(home_url('/')) . 'wp-admin/nav-menus.php">', '</a>') . '</span>';
                    }
                }
            ?>
        </div>
        <div class="hamburger-nav-details">
			<?php if ($have_wpml && $wpml_show_in_header && $fullscreen_have_lang) : ?>
				<div class="details-column">
					<?php get_template_part('parts/elements/lang_dropdown'); ?>  
				</div>
			<?php endif; ?>

			<?php while ( have_rows( 'global_page_overlay_menu_footer_items_left', 'option' ) ): the_row(); ?>
				<div class="details-column">
					<?php echo wp_kses(get_sub_field('items'), 'post'); ?>
				</div>
			<?php endwhile; ?>

			<?php if ( $header_have_social && $fullscreen_have_social ) : ?>
				<div class="details-column socialbar small outline inverse">
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
								case 'tripadvisor':   echo '<i class="fab fa-tripadvisor"></i>';   break;
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
    </div>
</div>