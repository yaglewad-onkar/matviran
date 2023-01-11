<?php

/**
* WPBakery Page Builder Ohio Team Members Group Inner shortcode view
*/

?>
<div id="<?php echo esc_attr( $team_member_uniqid ); ?>" 
	class="cover-content<?php echo $css_class; ?>" 
	data-item="true">

	<div class="center-aligned">
		<div class="team-member_wrap">
			<h5 class="team-member_title"><?php echo $name; ?></h5>
			<p class="team-member_subtitle"><?php echo $position; ?></p>
			<p class="team-member_description"><?php echo $description; ?></p>

			<?php if ( $social_bar ) : ?>
			<div class="socialbar small outline inverse">
				<?php if ( $behance_link ) : ?>
					<a href="<?php echo $behance_link; ?>" target="_blank" class="behance">
						<i class="fab fa-behance"></i>
					</a>
				<?php endif; ?>
				<?php if ( $digg_link ) : ?>
					<a href="<?php echo $digg_link; ?>" target="_blank" class="digg">
						<i class="fab fa-digg"></i>
					</a>
				<?php endif; ?>
				<?php if ( $discord_link ) : ?>
					<a href="<?php echo $discord_link; ?>" target="_blank" class="discord">
						<i class="fab fa-discord"></i>
					</a>
				<?php endif; ?>
				<?php if ( $dribbble_link ) : ?>
					<a href="<?php echo $dribbble_link; ?>" target="_blank" class="dribbble">
						<i class="fab fa-dribbble"></i>
					</a>
				<?php endif; ?>
				<?php if ( $facebook_link ) : ?>
					<a href="<?php echo $facebook_link; ?>" target="_blank" class="facebook">
						<i class="fab fa-facebook-f"></i>
					</a>
				<?php endif; ?>
				<?php if ( $flickr_link ) : ?>
					<a href="<?php echo $flickr_link; ?>" target="_blank" class="flickr">
						<i class="fab fa-flickr"></i>
					</a>
				<?php endif; ?>
				<?php if ( $github_link ) : ?>
					<a href="<?php echo $github_link; ?>" target="_blank" class="github">
						<i class="fab fa-github"></i>
					</a>
				<?php endif; ?>
				<?php if ( $instagram_link ) : ?>
					<a href="<?php echo $instagram_link; ?>" target="_blank" class="instagram">
						<i class="fab fa-instagram"></i>
					</a>
				<?php endif; ?>
				<?php if ( $kaggle_link ) : ?>
					<a href="<?php echo $kaggle_link; ?>" target="_blank" class="kaggle">
						<i class="fab fa-kaggle"></i>
					</a>
				<?php endif; ?>
				<?php if ( $linkedin_link ) : ?>
					<a href="<?php echo $linkedin_link; ?>" target="_blank" class="linkedin">
						<i class="fab fa-linkedin"></i>
					</a>
				<?php endif; ?>
				<?php if ( $medium_link ) : ?>
					<a href="<?php echo $medium_link; ?>" target="_blank" class="medium">
						<i class="fab fa-medium-m"></i>
					</a>
				<?php endif; ?>
				<?php if ( $mixer_link ) : ?>
					<a href="<?php echo $mixer_link; ?>" target="_blank" class="mixer">
						<i class="fab fa-mixer"></i>
					</a>
				<?php endif; ?>
				<?php if ( $pinterest_link ) : ?>
					<a href="<?php echo $pinterest_link; ?>" target="_blank" class="pinterest">
						<i class="fab fa-pinterest"></i>
					</a>
				<?php endif; ?>
				<?php if ( $quora_link ) : ?>
					<a href="<?php echo $quora_link; ?>" target="_blank" class="quora">
						<i class="fab fa-quora"></i>
					</a>
				<?php endif; ?>
				<?php if ( $reddit_link ) : ?>
					<a href="<?php echo $reddit_link; ?>" target="_blank" class="reddit">
						<i class="fab fa-reddit"></i>
					</a>
				<?php endif; ?>
				<?php if ( $snapchat_link ) : ?>
					<a href="<?php echo $snapchat_link; ?>" target="_blank" class="snapchat">
						<i class="fab fa-snapchat"></i>
					</a>
				<?php endif; ?>
				<?php if ( $soundcloud_link ) : ?>
					<a href="<?php echo $soundcloud_link; ?>" target="_blank" class="soundcloud">
						<i class="fab fa-soundcloud"></i>
					</a>
				<?php endif; ?>
				<?php if ( $spotify_link ) : ?>
					<a href="<?php echo $spotify_link; ?>" target="_blank" class="spotify">
						<i class="fab fa-spotify"></i>
					</a>
				<?php endif; ?>
				<?php if ( $teamspeak_link ) : ?>
					<a href="<?php echo $teamspeak_link; ?>" target="_blank" class="teamspeak">
						<i class="fab fa-teamspeak"></i>
					</a>
				<?php endif; ?>
				<?php if ( $telegram_link ) : ?>
					<a href="<?php echo $telegram_link; ?>" target="_blank" class="telegram">
						<i class="fab fa-telegram-plane"></i>
					</a>
				<?php endif; ?>
				<?php if ( $tiktok_link ) : ?>
					<a href="<?php echo $tiktok_link; ?>" target="_blank" class="tiktok">
						<i class="fab fa-tiktok"></i>
					</a>
				<?php endif; ?>
				<?php if ( $tripadvisor_link ) : ?>
					<a href="<?php echo $tripadvisor_link; ?>" target="_blank" class="tripadvisor">
						<i class="fab fa-tripadvisor"></i>
					</a>
				<?php endif; ?>
				<?php if ( $tumblr_link ) : ?>
					<a href="<?php echo $tumblr_link; ?>" target="_blank" class="tumblr">
						<i class="fab fa-tumblr"></i>
					</a>
				<?php endif; ?>
				<?php if ( $twitch_link ) : ?>
					<a href="<?php echo $twitch_link; ?>" target="_blank" class="twitch">
						<i class="fab fa-twitch"></i>
					</a>
				<?php endif; ?>
				<?php if ( $twitter_link ) : ?>
					<a href="<?php echo $twitter_link; ?>" target="_blank" class="twitter">
						<i class="fab fa-twitter"></i>
					</a>
				<?php endif; ?>
				<?php if ( $vimeo_link ) : ?>
					<a href="<?php echo $vimeo_link; ?>" target="_blank" class="vimeo">
						<i class="fab fa-vimeo"></i>
					</a>
				<?php endif; ?>
				<?php if ( $vine_link ) : ?>
					<a href="<?php echo $vine_link; ?>" target="_blank" class="vine">
						<i class="fab fa-vine"></i>
					</a>
				<?php endif; ?>
				<?php if ( $vk_link ) : ?>
					<a href="<?php echo $vk_link; ?>" target="_blank" class="vk">
						<i class="fab fa-vk"></i>
					</a>
				<?php endif; ?>
				<?php if ( $whatsapp_link ) : ?>
					<a href="<?php echo $whatsapp_link; ?>" target="_blank" class="whatsapp">
						<i class="fab fa-whatsapp"></i>
					</a>
				<?php endif; ?>
				<?php if ( $xing_link ) : ?>
					<a href="<?php echo $xing_link; ?>" target="_blank" class="xing">
						<i class="fab fa-xing"></i>
					</a>
				<?php endif; ?>
				<?php if ( $youtube_link ) : ?>
					<a href="<?php echo $youtube_link; ?>" target="_blank" class="youtube">
						<i class="fab fa-youtube"></i>
					</a>
				<?php endif; ?>
				<?php if ( $fivehundred_link ) : ?>
					<a href="<?php echo $fivehundred_link; ?>" target="_blank" class="500px">
						<i class="fab fa-500px"></i>
					</a>
				<?php endif; ?>
			</div>
			<?php endif; ?>
		</div>
	</div>

</div>

<div class="team-member_image" data-trigger="true">
	<?php if ( $photo ) : ?>
		<img <?php echo $photo_image_atts; ?>>
	<?php endif; ?>
</div>