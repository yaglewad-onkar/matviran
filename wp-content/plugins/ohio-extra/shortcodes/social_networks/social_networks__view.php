<?php

/**
* WPBakery Page Builder Ohio Social Networks shortcode view
*/

?>
<div class="ohio-socialbar-sc socialbar <?php echo $socialbar_class . $css_class; ?>" 
	id="<?php echo esc_attr( $social_bar_uniqid ); ?>" 
	<?php if ( $appearance_effect != 'none' ) { echo ' data-aos="' . $appearance_effect . '"'; } ?> 
	<?php if ( $appearance_duration ) { echo ' data-aos-duration="' . $appearance_duration . '"'; } ?>
		<?php if ( $appearance_delay ) echo ' data-aos-delay="' . $appearance_delay . '"'; ?>
	<?php if ( !$appearance_once ) echo ' data-aos-once="true"'; ?>>
	<?php if ( $behance_link ) : ?>
		<a href="<?php echo $behance_link; ?>" target="_blank" class="behance<?php echo $link_class; ?>">
			<?php if ( $show_icon ) : ?>
			<i class="fab fa-behance"></i>
			<?php endif; ?>
			<?php if ( $show_text ) : ?>
			<span class="social-text font-titles"><?php esc_html_e( 'Behance', 'ohio-extra' ); ?></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>
	<?php if ( $digg_link ) : ?>
		<a href="<?php echo $digg_link; ?>" target="_blank" class="digg<?php echo $link_class; ?>">
			<?php if ( $show_icon ) : ?>
			<i class="fab fa-digg"></i>
			<?php endif; ?>
			<?php if ( $show_text ) : ?>
			<span class="social-text font-titles"><?php esc_html_e( 'Digg', 'ohio-extra' ); ?></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>
	<?php if ( $discord_link ) : ?>
		<a href="<?php echo $discord_link; ?>" target="_blank" class="discord<?php echo $link_class; ?>">
			<?php if ( $show_icon ) : ?>
			<i class="fab fa-discord"></i>
			<?php endif; ?>
			<?php if ( $show_text ) : ?>
			<span class="social-text font-titles"><?php esc_html_e( 'Discord', 'ohio-extra' ); ?></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>
	<?php if ( $dribbble_link ) : ?>
		<a href="<?php echo $dribbble_link; ?>" target="_blank" class="dribbble<?php echo $link_class; ?>">
			<?php if ( $show_icon ) : ?>
			<i class="fab fa-dribbble"></i>
			<?php endif; ?>
			<?php if ( $show_text ) : ?>
			<span class="social-text font-titles"><?php esc_html_e( 'Dribbble', 'ohio-extra' ); ?></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>
	<?php if ( $facebook_link ) : ?>
		<a href="<?php echo $facebook_link; ?>" target="_blank" class="facebook<?php echo $link_class; ?>">
			<?php if ( $show_icon ) : ?>
			<i class="fab fa-facebook-f"></i>
			<?php endif; ?>
			<?php if ( $show_text ) : ?>
			<span class="social-text font-titles"><?php esc_html_e( 'Facebook', 'ohio-extra' ); ?></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>
	<?php if ( $flickr_link ) : ?>
		<a href="<?php echo $flickr_link; ?>" target="_blank" class="flickr<?php echo $link_class; ?>">
			<?php if ( $show_icon ) : ?>
			<i class="fab fa-flickr"></i>
			<?php endif; ?>
			<?php if ( $show_text ) : ?>
			<span class="social-text font-titles"><?php esc_html_e( 'Flickr', 'ohio-extra' ); ?></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>
	<?php if ( $github_link ) : ?>
		<a href="<?php echo $github_link; ?>" target="_blank" class="github<?php echo $link_class; ?>">
			<?php if ( $show_icon ) : ?>
			<i class="fab fa-github"></i>
			<?php endif; ?>
			<?php if ( $show_text ) : ?>
			<span class="social-text font-titles"><?php esc_html_e( 'GitHub', 'ohio-extra' ); ?></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>
	<?php if ( $instagram_link ) : ?>
		<a href="<?php echo $instagram_link; ?>" target="_blank" class="instagram<?php echo $link_class; ?>">
			<?php if ( $show_icon ) : ?>
			<i class="fab fa-instagram"></i>
			<?php endif; ?>
			<?php if ( $show_text ) : ?>
			<span class="social-text font-titles"><?php esc_html_e( 'Instagram', 'ohio-extra' ); ?></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>
	<?php if ( $kaggle_link ) : ?>
		<a href="<?php echo $kaggle_link; ?>" target="_blank" class="kaggle<?php echo $link_class; ?>">
			<?php if ( $show_icon ) : ?>
			<i class="fab fa-kaggle"></i>
			<?php endif; ?>
			<?php if ( $show_text ) : ?>
			<span class="social-text font-titles"><?php esc_html_e( 'Kaggle', 'ohio-extra' ); ?></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>
	<?php if ( $linkedin_link ) : ?>
		<a href="<?php echo $linkedin_link; ?>" target="_blank" class="linkedin<?php echo $link_class; ?>">
			<?php if ( $show_icon ) : ?>
			<i class="fab fa-linkedin"></i>
			<?php endif; ?>
			<?php if ( $show_text ) : ?>
			<span class="social-text font-titles"><?php esc_html_e( 'LinkedIn', 'ohio-extra' ); ?></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>
	<?php if ( $medium_link ) : ?>
		<a href="<?php echo $medium_link; ?>" target="_blank" class="linkedin<?php echo $link_class; ?>">
			<?php if ( $show_icon ) : ?>
			<i class="fab fa-medium-m"></i>
			<?php endif; ?>
			<?php if ( $show_text ) : ?>
			<span class="social-text font-titles"><?php esc_html_e( 'Medium', 'ohio-extra' ); ?></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>
	<?php if ( $mixer_link ) : ?>
		<a href="<?php echo $mixer_link; ?>" target="_blank" class="mixer<?php echo $link_class; ?>">
			<?php if ( $show_icon ) : ?>
			<i class="fab fa-mixer"></i>
			<?php endif; ?>
			<?php if ( $show_text ) : ?>
			<span class="social-text font-titles"><?php esc_html_e( 'Mixer', 'ohio-extra' ); ?></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>
	<?php if ( $pinterest_link ) : ?>
		<a href="<?php echo $pinterest_link; ?>" target="_blank" class="pinterest<?php echo $link_class; ?>">
			<?php if ( $show_icon ) : ?>
			<i class="fab fa-pinterest"></i>
			<?php endif; ?>
			<?php if ( $show_text ) : ?>
			<span class="social-text font-titles"><?php esc_html_e( 'Pinterest', 'ohio-extra' ); ?></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>
	<?php if ( $quora_link ) : ?>
		<a href="<?php echo $quora_link; ?>" target="_blank" class="quora<?php echo $link_class; ?>">
			<?php if ( $show_icon ) : ?>
			<i class="fab fa-quora"></i>
			<?php endif; ?>
			<?php if ( $show_text ) : ?>
			<span class="social-text font-titles"><?php esc_html_e( 'Quora', 'ohio-extra' ); ?></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>
	<?php if ( $reddit_link ) : ?>
		<a href="<?php echo $reddit_link; ?>" target="_blank" class="reddit<?php echo $link_class; ?>">
			<?php if ( $show_icon ) : ?>
			<i class="fab fa-reddit"></i>
			<?php endif; ?>
			<?php if ( $show_text ) : ?>
			<span class="social-text font-titles"><?php esc_html_e( 'Reddit', 'ohio-extra' ); ?></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>
	<?php if ( $snapchat_link ) : ?>
		<a href="<?php echo $snapchat_link; ?>" target="_blank" class="snapchat<?php echo $link_class; ?>">
			<?php if ( $show_icon ) : ?>
			<i class="fab fa-snapchat"></i>
			<?php endif; ?>
			<?php if ( $show_text ) : ?>
			<span class="social-text font-titles"><?php esc_html_e( 'Snapchat', 'ohio-extra' ); ?></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>

	<?php if ( $soundcloud_link ) : ?>
		<a href="<?php echo $soundcloud_link; ?>" target="_blank" class="soundcloud<?php echo $link_class; ?>">
			<?php if ( $show_icon ) : ?>
			<i class="fab fa-soundcloud"></i>
			<?php endif; ?>
			<?php if ( $show_text ) : ?>
			<span class="social-text font-titles"><?php esc_html_e( 'SoundCloud', 'ohio-extra' ); ?></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>
	<?php if ( $spotify_link ) : ?>
		<a href="<?php echo $spotify_link; ?>" target="_blank" class="spotify<?php echo $link_class; ?>">
			<?php if ( $show_icon ) : ?>
			<i class="fab fa-spotify"></i>
			<?php endif; ?>
			<?php if ( $show_text ) : ?>
			<span class="social-text font-titles"><?php esc_html_e( 'Spotify', 'ohio-extra' ); ?></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>
	<?php if ( $teamspeak_link ) : ?>
		<a href="<?php echo $teamspeak_link; ?>" target="_blank" class="teamspeak<?php echo $link_class; ?>">
			<?php if ( $show_icon ) : ?>
			<i class="fab fa-teamspeak"></i>
			<?php endif; ?>
			<?php if ( $show_text ) : ?>
			<span class="social-text font-titles"><?php esc_html_e( 'Spotify', 'ohio-extra' ); ?></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>
	<?php if ( $telegram_link ) : ?>
		<a href="<?php echo $telegram_link; ?>" target="_blank" class="telegram<?php echo $link_class; ?>">
			<?php if ( $show_icon ) : ?>
			<i class="fab fa-telegram-plane"></i>
			<?php endif; ?>
			<?php if ( $show_text ) : ?>
			<span class="social-text font-titles"><?php esc_html_e( 'Telegram', 'ohio-extra' ); ?></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>
	<?php if ( $tiktok_link ) : ?>
		<a href="<?php echo $tiktok_link; ?>" target="_blank" class="tiktok<?php echo $link_class; ?>">
			<?php if ( $show_icon ) : ?>
			<i class="fab fa-tiktok"></i>
			<?php endif; ?>
			<?php if ( $show_text ) : ?>
			<span class="social-text font-titles"><?php esc_html_e( 'TikTok', 'ohio-extra' ); ?></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>
	<?php if ( $tripadvisor_link ) : ?>
		<a href="<?php echo $tripadvisor_link; ?>" target="_blank" class="tripadvisor<?php echo $link_class; ?>">
			<?php if ( $show_icon ) : ?>
			<i class="fab fa-tripadvisor"></i>
			<?php endif; ?>
			<?php if ( $show_text ) : ?>
			<span class="social-text font-titles"><?php esc_html_e( 'Tripadvisor', 'ohio-extra' ); ?></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>
	<?php if ( $tumblr_link ) : ?>
		<a href="<?php echo $tumblr_link; ?>" target="_blank" class="tumblr<?php echo $link_class; ?>">
			<?php if ( $show_icon ) : ?>
			<i class="fab fa-tumblr"></i>
			<?php endif; ?>
			<?php if ( $show_text ) : ?>
			<span class="social-text font-titles"><?php esc_html_e( 'Tumblr', 'ohio-extra' ); ?></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>
	<?php if ( $twitch_link ) : ?>
		<a href="<?php echo $twitch_link; ?>" target="_blank" class="twitch<?php echo $link_class; ?>">
			<?php if ( $show_icon ) : ?>
			<i class="fab fa-twitch"></i>
			<?php endif; ?>
			<?php if ( $show_text ) : ?>
			<span class="social-text font-titles"><?php esc_html_e( 'Twitch', 'ohio-extra' ); ?></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>
	<?php if ( $twitter_link ) : ?>
		<a href="<?php echo $twitter_link; ?>" target="_blank" class="twitter<?php echo $link_class; ?>">
			<?php if ( $show_icon ) : ?>
			<i class="fab fa-twitter"></i>
			<?php endif; ?>
			<?php if ( $show_text ) : ?>
			<span class="social-text font-titles"><?php esc_html_e( 'Twitter', 'ohio-extra' ); ?></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>
	<?php if ( $vimeo_link ) : ?>
		<a href="<?php echo $vimeo_link; ?>" target="_blank" class="vimeo<?php echo $link_class; ?>">
			<?php if ( $show_icon ) : ?>
			<i class="fab fa-vimeo"></i>
			<?php endif; ?>
			<?php if ( $show_text ) : ?>
			<span class="social-text font-titles"><?php esc_html_e( 'Vimeo', 'ohio-extra' ); ?></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>
	<?php if ( $vine_link ) : ?>
		<a href="<?php echo $vine_link; ?>" target="_blank" class="vine<?php echo $link_class; ?>">
			<?php if ( $show_icon ) : ?>
			<i class="fab fa-vine"></i>
			<?php endif; ?>
			<?php if ( $show_text ) : ?>
			<span class="social-text font-titles"><?php esc_html_e( 'Vine', 'ohio-extra' ); ?></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>
	<?php if ( $vk_link ) : ?>
		<a href="<?php echo $vk_link; ?>" target="_blank" class="vk<?php echo $link_class; ?>">
			<?php if ( $show_icon ) : ?>
			<i class="fab fa-vk"></i>
			<?php endif; ?>
			<?php if ( $show_text ) : ?>
			<span class="social-text font-titles"><?php esc_html_e( 'Vkontakte', 'ohio-extra' ); ?></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>
	<?php if ( $whatsapp_link ) : ?>
		<a href="<?php echo $whatsapp_link; ?>" target="_blank" class="whatsapp<?php echo $link_class; ?>">
			<?php if ( $show_icon ) : ?>
			<i class="fab fa-whatsapp"></i>
			<?php endif; ?>
			<?php if ( $show_text ) : ?>
			<span class="social-text font-titles"><?php esc_html_e( 'WhatsApp', 'ohio-extra' ); ?></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>
	<?php if ( $xing_link ) : ?>
		<a href="<?php echo $xing_link; ?>" target="_blank" class="xing<?php echo $link_class; ?>">
			<?php if ( $show_icon ) : ?>
			<i class="fab fa-xing"></i>
			<?php endif; ?>
			<?php if ( $show_text ) : ?>
			<span class="social-text font-titles"><?php esc_html_e( 'Xing', 'ohio-extra' ); ?></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>
	<?php if ( $youtube_link ) : ?>
		<a href="<?php echo $youtube_link; ?>" target="_blank" class="youtube<?php echo $link_class; ?>">
			<?php if ( $show_icon ) : ?>
			<i class="fab fa-youtube"></i>
			<?php endif; ?>
			<?php if ( $show_text ) : ?>
			<span class="social-text font-titles"><?php esc_html_e( 'Youtube', 'ohio-extra' ); ?></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>
	<?php if ( $fivehundredpx_link ) : ?>
		<a href="<?php echo $fivehundredpx_link; ?>" target="_blank" class="500px<?php echo $link_class; ?>">
			<?php if ( $show_icon ) : ?>
			<i class="fab fa-500px"></i>
			<?php endif; ?>
			<?php if ( $show_text ) : ?>
			<span class="social-text font-titles"><?php esc_html_e( '500px', 'ohio-extra' ); ?></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>
</div>


