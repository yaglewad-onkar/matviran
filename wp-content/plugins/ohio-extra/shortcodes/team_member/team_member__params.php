<?php

/**
* WPBakery Page Builder Ohio Team Member shortcode params
*/

vc_lean_map( 'ohio_team_member', 'ohio_team_member_sc_map' );

function ohio_team_member_sc_map() {
	return array(
			'name' => __( 'Team Member', 'ohio-extra' ),
			'description' => __( 'Team member block', 'ohio-extra' ),
			'base' => 'ohio_team_member',
			'category' => __( 'Ohio', 'ohio-extra' ),
			'icon' => OHIO_EXTRA_DIR_URL . 'assets/images/shortcodes/team_member_icon.svg',
			'js_view' => 'VcOhioTeamMemberView',
			'custom_markup' => '{{title}}<div class="vc_ohio_team_member-container">
					<div class="_contain">
						<div class="photo" style="background-image: url(\'' . plugin_dir_url( __FILE__ ) . 'images/sc_gap_user.svg\');"></div>
						<div class="name">%%name%%</div>
						<div class="position"></div>
					</div>
					<div class="lines"><div class="line"></div><div class="line"></div></div>
				</div>',
			'params' => array(
				// General
				array(
					'type' => 'ohio_choose_box',
					'group' => __( 'General', 'ohio-extra' ),
					'heading' => __( 'Team member layout', 'ohio-extra' ),
					'param_name' => 'block_type_layout',
					'value' => array(
						array(
							'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_062.svg',
							'key' => 'full',
							'title' => __( 'Card details', 'ohio-extra' ),
						),
						array(
							'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_063.svg',
							'key' => 'inner',
							'title' => __( 'Inner details', 'ohio-extra' ),
						)
					)
				),
				array(
					'type' => 'attach_image',
					'group' => __( 'General', 'ohio-extra' ),
					'heading' => __( 'Team member photo', 'ohio-extra' ),
					'param_name' => 'photo',
					'description' => __( 'Choose member photo.', 'ohio-extra' ),
				),
				array(
					'type' => 'textfield',
					'holder' => 'em',
					'group' => __( 'General', 'ohio-extra' ),
					'heading' => __( 'Name', 'ohio-extra' ),
					'param_name' => 'name',
					'description' => __( 'Team member name.', 'ohio-extra' ),
				),
				array(
					'type' => 'textfield',
					'group' => __( 'General', 'ohio-extra' ),
					'heading' => __( 'Position', 'ohio-extra' ),
					'param_name' => 'position',
					'description' => __( 'E.g. <em>Product manager</em>.', 'ohio-extra' ),
				),
				array(
					'type' => 'textarea',
					'group' => __( 'General', 'ohio-extra' ),
					'heading' => __( 'Description', 'ohio-extra' ),
					'param_name' => 'description',
					'description' => __( 'Tell what this remarkable team member in your team.', 'ohio-extra' ),
				),
				array(
					'type' => 'textfield',
					'group' => __( 'General', 'ohio-extra' ),
					'heading' => __( 'Custom link', 'ohio-extra' ),
					'param_name' => 'member_link',
					'description' => __( 'Enter link to team member profile', 'ohio-extra' ),
				),

				// Social links

				array(
					'type' => 'textfield',
					'group' => __( 'Social Links', 'ohio-extra' ),
					'heading' => '<i class="fab fa-behance"></i> ' . __( 'Behance', 'ohio-extra' ),
					'param_name' => 'behance_link'
				),
	            array(
					'type' => 'textfield',
					'group' => __( 'Social Links', 'ohio-extra' ),
					'heading' => '<i class="fab fa-digg"></i> ' . __( 'Digg', 'ohio-extra' ),
					'param_name' => 'digg_link'
				),
	            array(
					'type' => 'textfield',
					'group' => __( 'Social Links', 'ohio-extra' ),
					'heading' => '<i class="fab fa-discord"></i> ' . __( 'Discord', 'ohio-extra' ),
					'param_name' => 'discord_link'
				),
				array(
					'type' => 'textfield',
					'group' => __( 'Social Links', 'ohio-extra' ),
					'heading' => '<i class="fab fa-dribbble"></i> ' . __( 'Dribbble', 'ohio-extra' ),
					'param_name' => 'dribbble_link'
				),
				array(
					'type' => 'textfield',
					'group' => __( 'Social Links', 'ohio-extra' ),
					'heading' => '<i class="fab fa-facebook-f"></i> ' . __( 'Facebook', 'ohio-extra' ),
					'param_name' => 'facebook_link'
				),
				array(
					'type' => 'textfield',
					'group' => __( 'Social Links', 'ohio-extra' ),
					'heading' => '<i class="fab fa-flickr"></i> ' . __( 'Flickr', 'ohio-extra' ),
					'param_name' => 'flickr_link'
				),
				array(
					'type' => 'textfield',
					'group' => __( 'Social Links', 'ohio-extra' ),
					'heading' => '<i class="fab fa-github"></i> ' . __( 'GitHub', 'ohio-extra' ),
					'param_name' => 'github_link'
				),
				array(
					'type' => 'textfield',
					'group' => __( 'Social Links', 'ohio-extra' ),
					'heading' => '<i class="fab fa-instagram"></i> ' . __( 'Instagram', 'ohio-extra' ),
					'param_name' => 'instagram_link'
				),
				array(
					'type' => 'textfield',
					'group' => __( 'Social Links', 'ohio-extra' ),
					'heading' => '<i class="fab fa-kaggle"></i> ' . __( 'Kaggle', 'ohio-extra' ),
					'param_name' => 'kaggle_link'
				),
				array(
					'type' => 'textfield',
					'group' => __( 'Social Links', 'ohio-extra' ),
					'heading' => '<i class="fab fa-linkedin"></i> ' . __( 'LinkedIn', 'ohio-extra' ),
					'param_name' => 'linkedin_link'
				),
				array(
					'type' => 'textfield',
					'group' => __( 'Social Links', 'ohio-extra' ),
					'heading' => '<i class="fab fa-medium-m"></i> ' . __( 'Medium', 'ohio-extra' ),
					'param_name' => 'medium_link'
				),
				array(
					'type' => 'textfield',
					'group' => __( 'Social Links', 'ohio-extra' ),
					'heading' => '<i class="fab fa-mixer"></i> ' . __( 'Mixer', 'ohio-extra' ),
					'param_name' => 'mixer_link'
				),
				array(
					'type' => 'textfield',
					'group' => __( 'Social Links', 'ohio-extra' ),
					'heading' => '<i class="fab fa-pinterest"></i> ' . __( 'Pinterest', 'ohio-extra' ),
					'param_name' => 'pinterest_link'
				),
				array(
					'type' => 'textfield',
					'group' => __( 'Social Links', 'ohio-extra' ),
					'heading' => '<i class="fab fa-quora"></i> ' . __( 'Quora', 'ohio-extra' ),
					'param_name' => 'quora_link'
				),
				array(
					'type' => 'textfield',
					'group' => __( 'Social Links', 'ohio-extra' ),
					'heading' => '<i class="fab fa-reddit"></i> ' . __( 'Reddit', 'ohio-extra' ),
					'param_name' => 'reddit_link'
				),
				array(
					'type' => 'textfield',
					'group' => __( 'Social Links', 'ohio-extra' ),
					'heading' => '<i class="fab fa-snapchat"></i> ' . __( 'Snapchat', 'ohio-extra' ),
					'param_name' => 'snapchat_link'
				),
				array(
					'type' => 'textfield',
					'group' => __( 'Social Links', 'ohio-extra' ),
					'heading' => '<i class="fab fa-soundcloud"></i> ' . __( 'SoundCloud', 'ohio-extra' ),
					'param_name' => 'soundcloud_link'
				),
				array(
					'type' => 'textfield',
					'group' => __( 'Social Links', 'ohio-extra' ),
					'heading' => '<i class="fab fa-spotify"></i> ' . __( 'Spotify', 'ohio-extra' ),
					'param_name' => 'spotify_link'
				),
				array(
					'type' => 'textfield',
					'group' => __( 'Social Links', 'ohio-extra' ),
					'heading' => '<i class="fab fa-teamspeak"></i> ' . __( 'TeamSpeak', 'ohio-extra' ),
					'param_name' => 'teamspeak_link'
				),
				array(
					'type' => 'textfield',
					'group' => __( 'Social Links', 'ohio-extra' ),
					'heading' => '<i class="fab fa-telegram-plane"></i> ' . __( 'Telegram', 'ohio-extra' ),
					'param_name' => 'telegram_link'
				),
				array(
					'type' => 'textfield',
					'group' => __( 'Social Links', 'ohio-extra' ),
					'heading' => '<i class="fab fa-tiktok"></i> ' . __( 'TikTok', 'ohio-extra' ),
					'param_name' => 'tiktok_link'
				),
				array(
					'type' => 'textfield',
					'group' => __( 'Social Links', 'ohio-extra' ),
					'heading' => '<i class="fab fa-tripadvisor"></i> ' . __( 'Tripadvisor', 'ohio-extra' ),
					'param_name' => 'tripadvisor_link'
				),
				array(
					'type' => 'textfield',
					'group' => __( 'Social Links', 'ohio-extra' ),
					'heading' => '<i class="fab fa-tumblr"></i> ' . __( 'Tumblr', 'ohio-extra' ),
					'param_name' => 'tumblr_link'
				),
				array(
					'type' => 'textfield',
					'group' => __( 'Social Links', 'ohio-extra' ),
					'heading' => '<i class="fab fa-twitch"></i> ' . __( 'Twitch', 'ohio-extra' ),
					'param_name' => 'twitch_link'
				),
				array(
					'type' => 'textfield',
					'group' => __( 'Social Links', 'ohio-extra' ),
					'heading' => '<i class="fab fa-twitter"></i> ' . __( 'Twitter', 'ohio-extra' ),
					'param_name' => 'twitter_link'
				),
				array(
					'type' => 'textfield',
					'group' => __( 'Social Links', 'ohio-extra' ),
					'heading' => '<i class="fab fa-vimeo"></i> ' . __( 'Vimeo', 'ohio-extra' ),
					'param_name' => 'vimeo_link'
				),
				array(
					'type' => 'textfield',
					'group' => __( 'Social Links', 'ohio-extra' ),
					'heading' => '<i class="fab fa-vine"></i> ' . __( 'Vine', 'ohio-extra' ),
					'param_name' => 'vine_link'
				),
				array(
					'type' => 'textfield',
					'group' => __( 'Social Links', 'ohio-extra' ),
					'heading' => '<i class="fab fa-vk"></i> ' . __( 'Vkontakte', 'ohio-extra' ),
					'param_name' => 'vk_link'
				),
				array(
					'type' => 'textfield',
					'group' => __( 'Social Links', 'ohio-extra' ),
					'heading' => '<i class="fab fa-whatsapp"></i> ' . __( 'Whatsapp', 'ohio-extra' ),
					'param_name' => 'whatsapp_link'
				),
				array(
					'type' => 'textfield',
					'group' => __( 'Social Links', 'ohio-extra' ),
					'heading' => '<i class="fab fa-xing"></i> ' . __( 'Xing', 'ohio-extra' ),
					'param_name' => 'xing_link'
				),
				array(
					'type' => 'textfield',
					'group' => __( 'Social Links', 'ohio-extra' ),
					'heading' => '<i class="fab fa-youtube"></i> ' . __( 'Youtube', 'ohio-extra' ),
					'param_name' => 'youtube_link'
				),
				array(
					'type' => 'textfield',
					'group' => __( 'Social Links', 'ohio-extra' ),
					'heading' => '<i class="fab fa-500px"></i> ' . __( '500px', 'ohio-extra' ),
					'param_name' => 'fivehundred_link'
				),

				// Typography
				array(
					'type' => 'ohio_divider',
					'group' => __( 'Typography', 'ohio-extra' ),
					'param_name' => 'typo_tab_divider_name',
					'value' => __( 'Name', 'ohio-extra' ),
				),
				array(
					'type' => 'ohio_typography',
					'group' => __( 'Typography', 'ohio-extra' ),
					'param_name' => 'name_typo',
				),
				array(
					'type' => 'ohio_divider',
					'group' => __( 'Typography', 'ohio-extra' ),
					'param_name' => 'typo_tab_divider_position',
					'value' => __( 'Position', 'ohio-extra' ),
				),
				array(
					'type' => 'ohio_typography',
					'group' => __( 'Typography', 'ohio-extra' ),
					'param_name' => 'position_typo',
				),
				array(
					'type' => 'ohio_divider',
					'group' => __( 'Typography', 'ohio-extra' ),
					'param_name' => 'typo_tab_divider_description',
					'value' => __( 'Description', 'ohio-extra' ),
				),
				array(
					'type' => 'ohio_typography',
					'group' => __( 'Typography', 'ohio-extra' ),
					'param_name' => 'desription_typo',
				),

				// Color settings
				array(
					'type' => 'ohio_divider',
					'group' => __( 'Styles & Colors', 'ohio-extra' ),
					'param_name' => 'color_settings_title',
					'value' => __( 'Color settings', 'ohio-extra' ),
				),
				array(
					'type' => 'ohio_colorpicker',
					'group' => __( 'Styles & Colors', 'ohio-extra' ),
					'heading' => __( 'Overlay color', 'ohio-extra' ),
					'param_name' => 'overlay_color',
				),
				array(
					'type' => 'ohio_colorpicker',
					'group' => __( 'Styles & Colors', 'ohio-extra' ),
					'heading' => __( 'Social buttons color', 'ohio-extra' ),
					'param_name' => 'social_color',
				),
				array(
					'type' => 'ohio_colorpicker',
					'group' => __( 'Styles & Colors', 'ohio-extra' ),
					'heading' => __( 'Social buttons hover color', 'ohio-extra' ),
					'param_name' => 'social_hover_color',
				),
				array(
					'type' => 'ohio_divider',
					'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'param_name' => 'style_tab_divider_other',
				'value' => __( 'Other', 'ohio-extra' ),
			),
				
			// Custom CSS Class
			array(
				'type' => 'textfield',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'heading' => __( 'Custom CSS class', 'ohio-extra' ),
				'param_name' => 'css_class',
				'description' => __( 'If you want to add own styles to a specific unit, use this field to add custom CSS class.', 'ohio-extra' )
			),

			// Appear Effect
			array(
				'type' => 'dropdown',
				'group' => __( 'Appear Effect', 'ohio-extra' ),
				'heading' => __( 'Appear effect', 'ohio-extra' ),
				'param_name' => 'appearance_effect',
				'value' => array(
					__( 'None', 'ohio-extra' ) => 'none',
					__( 'Fade up', 'ohio-extra' ) => 'fade-up',
					__( 'Fade left', 'ohio-extra' ) => 'fade-left',
					__( 'Fade right', 'ohio-extra' ) => 'fade-right',
					__( 'Slide up', 'ohio-extra' ) => 'slide-up',
					__( 'Flip up', 'ohio-extra' ) => 'flip-up',
					__( 'Zoom in', 'ohio-extra' ) => 'zoom-in'
				)
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Appear Effect', 'ohio-extra' ),
				'heading' => __( 'Animation duration', 'ohio-extra' ),
				'param_name' => 'appearance_duration',
				'description' => __( 'Duration accept values from 50 to 3000 (ms), with step 50.', 'ohio-extra' ),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Appear Effect', 'ohio-extra' ),
				'heading' => __( 'Animation delay', 'ohio-extra' ),
				'param_name' => 'appearance_delay',
				'description' => __( 'A delay before animation, accepted values are in range from 50 to 3000 (ms), with a step of 50.', 'ohio-extra' ),
			),

			array(
				'type' => 'ohio_check',
				'group' => __( 'Appear Effect', 'ohio-extra' ),
				'heading' => __( 'Animation repeat', 'ohio-extra' ),
				'description' => 'Repeat animation while scrolling page up and down',
				'param_name' => 'appearance_once',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				)
			),
		)
	);
}