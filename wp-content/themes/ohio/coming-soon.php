<?php
    get_header();
?>

<section class="clb-coming-soon">
    <div class="holder">
        <h2><?php echo OhioOptions::get_global( 'coming_soon_heading', __( 'We\'re under construction', 'ohio' ) ); ?></h2>
        <p>
            <?php echo OhioOptions::get_global( 'coming_soon_details', __( 'Check back for an update soon.', 'ohio' ) ); ?>
        </p>

        <?php if ( OhioOptions::get_global( 'coming_soon_countdown', true ) ): ?>
            <div 
                class="ohio-countdown-box-sc countdown-box text-center" 
                data-countdown-labels="Months,Days,Hours,Minutes,Seconds" 
                data-countdown-box="template_ohio-custom-cs" 
                data-countdown-time="<?php echo OhioOptions::get_global( 'coming_soon_expiration', '2025/03/14 18:00:00' ); ?>">
            </div>

            <script type="text/template" id="template_ohio-custom-cs">
                <div class="box-time <%= label %>">
                    <div class="title-lead box-count box-next">
                        <span class="number font-titles"><%= next %></span>
                    </div>
                    <h6 class="box-label"><%= label %></h6>
                </div>
            </script>
        <?php endif; ?>
    </div>
    <?php if ( OhioOptions::get_global( 'coming_soon_switch_social', true ) ): ?>
        <div class="socialbar small">
            <?php
                // TODO: Need single place social networks template
                while ( have_rows( 'global_header_menu_social_links', 'option' ) ) :
                    the_row();

                    $_network_field = get_sub_field( 'social_network' );
                    printf( '<a href="%s" target="%s" class="%s">', esc_url( get_sub_field( 'url' ) ), '_blank', esc_attr( $_network_field ) );

                    switch ( $_network_field ) {
                        case 'behance': echo '<i class="fab fa-behance"></i>';  break;
                        case 'digg': echo '<i class="fab fa-digg"></i>'; break;
                        case 'discord': echo '<i class="fab fa-discord"></i>'; break;
                        case 'dribbble': echo '<i class="fab fa-dribbble"></i>'; break;
                        case 'facebook': echo '<i class="fab fa-facebook-f"></i>'; break;
                        case 'flickr': echo '<i class="fab fa-flickr"></i>'; break;
                        case 'github': echo '<i class="fab fa-github-alt"></i>'; break;
                        case 'instagram': echo '<i class="fab fa-instagram"></i>'; break;
                        case 'kaggle': echo '<i class="fab fa-kaggle"></i>'; break;
                        case 'linkedin': echo '<i class="fab fa-linkedin"></i>'; break;
                        case 'medium': echo '<i class="fab fa-medium-m"></i>'; break;
                        case 'mixer': echo '<i class="fab fa-mixer"></i>'; break;
                        case 'pinterest': echo '<i class="fab fa-pinterest"></i>'; break;
                        case 'quora': echo '<i class="fab fa-quora"></i>'; break;
                        case 'reddit': echo '<i class="fab fa-reddit-alien"></i>'; break;
                        case 'snapchat': echo '<i class="fab fa-snapchat"></i>'; break;
                        case 'soundcloud': echo '<i class="fab fa-soundcloud"></i>'; break;
                        case 'spotify': echo '<i class="fab fa-spotify"></i>'; break;
                        case 'teamspeak': echo '<i class="fab fa-teamspeak"></i>'; break;
                        case 'telegram': echo '<i class="fab fa-telegram-plane"></i>'; break;
                        case 'tiktok': echo '<i class="fab fa-tiktok"></i>'; break;
                        case 'tumblr': echo '<i class="fab fa-tumblr"></i>'; break;
                        case 'twitch': echo '<i class="fab fa-twitch"></i>'; break;
                        case 'twitter': echo '<i class="fab fa-twitter"></i>'; break;
                        case 'vimeo': echo '<i class="fab fa-vimeo"></i>'; break;
                        case 'vine': echo '<i class="fab fa-vine"></i>'; break;
                        case 'vk': echo '<i class="fab fa-vk"></i>'; break;
                        case 'whatsapp': echo '<i class="fab fa-whatsapp"></i>'; break;
                        case 'xing': echo '<i class="fab fa-xing"></i>'; break;
                        case 'youtube': echo '<i class="fab fa-youtube"></i>'; break;
                        case '500px': echo '<i class="fab fa-500px"></i>'; break;
                    }

                    echo '</a>';
                endwhile;
            ?>
        </div>
    <?php endif; ?>
</section>

<?php
    get_footer();
