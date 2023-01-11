<?php 

/**
* WPBakery Page Builder Ohio Team member inner shortcode
*/

add_shortcode( 'ohio_team_member_inner', 'ohio_team_member_inner_func' );

function ohio_team_member_inner_func( $atts ) {
	if ( isset( $atts ) && is_array( $atts ) ) extract( $atts );

	// Default values, parsing and filtering
	$name = isset( $name ) ? NorExtraFilter::string( $name, 'string', '' ) : '';
	$position = isset( $position ) ? NorExtraFilter::string( $position, 'string', '' ) : '';
	$description = isset( $description ) ? NorExtraFilter::string( $description, 'textarea', '' ) : '';
	$photo = isset( $photo ) ? NorExtraFilter::string( $photo ) : false;
	$photo_image_atts = NorExtraParser::generateImageAttsById( NorExtraFilter::string( $photo ), $name );

	$facebook_link = isset( $facebook_link ) ?  NorExtraFilter::string( $facebook_link, 'url' ) : false;
	$twitter_link = isset( $twitter_link ) ?  NorExtraFilter::string( $twitter_link, 'url' ) : false;
	$instagram_link = isset( $instagram_link ) ?  NorExtraFilter::string( $instagram_link, 'url' ) : false;
	$dribbble_link = isset( $dribbble_link ) ?  NorExtraFilter::string( $dribbble_link, 'url' ) : false;
	$pinterest_link = isset( $pinterest_link ) ?  NorExtraFilter::string( $pinterest_link, 'url' ) : false;
	$linkedin_link = isset( $linkedin_link ) ?  NorExtraFilter::string( $linkedin_link, 'url' ) : false;
	$github_link = isset( $github_link ) ?  NorExtraFilter::string( $github_link, 'url' ) : false;
	$vk_link = isset( $vk_link ) ?  NorExtraFilter::string( $vk_link, 'url' ) : false;
	$youtube_link = isset( $youtube_link ) ?  NorExtraFilter::string( $youtube_link, 'url' ) : false;
	$vimeo_link = isset( $vimeo_link ) ?  NorExtraFilter::string( $vimeo_link, 'url' ) : false;
	$behance_link = isset( $behance_link ) ?  NorExtraFilter::string( $behance_link, 'url' ) : false;
	$tumblr_link = isset( $tumblr_link ) ?  NorExtraFilter::string( $tumblr_link, 'url' ) : false;
	$flickr_link = isset( $flickr_link ) ?  NorExtraFilter::string( $flickr_link, 'url' ) : false;
	$reddit_link = isset( $reddit_link ) ?  NorExtraFilter::string( $reddit_link, 'url' ) : false;
	$snapchat_link = isset( $snapchat_link ) ?  NorExtraFilter::string( $snapchat_link, 'url' ) : false;
	$whatsapp_link = isset( $whatsapp_link ) ?  NorExtraFilter::string( $whatsapp_link, 'url' ) : false;
	$quora_link = isset( $quora_link ) ?  NorExtraFilter::string( $quora_link, 'url' ) : false;
	$vine_link = isset( $vine_link ) ?  NorExtraFilter::string( $vine_link, 'url' ) : false;
	$digg_link = isset( $digg_link ) ?  NorExtraFilter::string( $digg_link, 'url' ) : false;
	$tiktok_link = isset( $tiktok_link ) ?  NorExtraFilter::string( $tiktok_link, 'url' ) : false;
	$tripadvisor_link = isset( $tripadvisor_link ) ?  NorExtraFilter::string( $tripadvisor_link, 'url' ) : false;
	$twitch_link = isset( $twitch_link ) ?  NorExtraFilter::string( $twitch_link, 'url' ) : false;
	$mixer_link = isset( $mixer_link ) ?  NorExtraFilter::string( $mixer_link, 'url' ) : false;
	$telegram_link = isset( $telegram_link ) ?  NorExtraFilter::string( $telegram_link, 'url' ) : false;
	$soundcloud_link = isset( $soundcloud_link ) ?  NorExtraFilter::string( $soundcloud_link, 'url' ) : false;
	$spotify_link = isset( $spotify_link ) ?  NorExtraFilter::string( $spotify_link, 'url' ) : false;
	$discord_link = isset( $discord_link ) ?  NorExtraFilter::string( $discord_link, 'url' ) : false;
	$teamspeak_link = isset( $teamspeak_link ) ?  NorExtraFilter::string( $teamspeak_link, 'url' ) : false;
	$kaggle_link = isset( $kaggle_link ) ?  NorExtraFilter::string( $kaggle_link, 'url' ) : false;
	$medium_link = isset( $medium_link ) ?  NorExtraFilter::string( $medium_link, 'url' ) : false;
	$xing_link = isset( $xing_link ) ?  NorExtraFilter::string( $xing_link, 'url' ) : false;
	$fivehundred_link = isset( $fivehundred_link ) ?  NorExtraFilter::string( $fivehundred_link, 'url' ) : false;
	
	$name_typo = isset( $name_typo ) ? NorExtraFilter::string( $name_typo ) : false;
	$position_typo = isset( $position_typo ) ? NorExtraFilter::string( $position_typo ) : false;
	$desription_typo = isset( $desription_typo ) ? NorExtraFilter::string( $desription_typo ) : false;
	
	$overlay_color = isset( $overlay_color ) ? NorExtraFilter::string( $overlay_color ) : false;
	$name_color = isset( $name_color ) ? NorExtraFilter::string( $name_color ) : false;
	$position_color = isset( $position_color ) ? NorExtraFilter::string( $position_color ) : false;
	$description_color = isset( $description_color ) ? NorExtraFilter::string( $description_color ) : false;
	$social_color = isset( $social_color ) ? NorExtraFilter::string( $social_color ) : false;
	$social_hover_color = isset( $social_hover_color ) ? NorExtraFilter::string( $social_hover_color ) : false;

	$css_class = isset( $css_class ) ? ' ' . NorExtraFilter::string( $css_class, 'attr', '' )  : '';

	// Styling
	$team_member_uniqid = uniqid( 'ohio-custom-' );

	$overlay_settings = NorExtraParser::VC_color_to_CSS( $overlay_color, 'background:{{color}};' );
	$name_settings = NorExtraParser::VC_color_to_CSS( $name_color, 'color:{{color}};' );
	$position_settings = NorExtraParser::VC_color_to_CSS( $position_color, 'color:{{color}};' );
	$description_settings = NorExtraParser::VC_color_to_CSS( $description_color, 'color:{{color}};' );
	$social_settings = NorExtraParser::VC_color_to_CSS( $social_color, 'border-color:{{color}};' );
	$social_icon_settings = NorExtraParser::VC_color_to_CSS( $social_color, 'color:{{color}};' );
	$social_hover_settings = NorExtraParser::VC_color_to_CSS( $social_hover_color, 'color:{{color}};border-color:{{color}};background:transparent;' );

	if( !$social_hover_settings && $name_color ) {
		$social_hover_settings = 'background:transparent;';
	}

	$social_settings_class = '';
	if ( !$social_color ) {
		$social_settings_class .= ' default';
	}

	$name_settings .= NorExtraParser::VC_typo_to_CSS( $name_typo );
	$position_settings .= NorExtraParser::VC_typo_to_CSS( $position_typo );
	$description_settings .= NorExtraParser::VC_typo_to_CSS( $desription_typo );

	NorExtraParser::VC_typo_custom_font( $name_typo );
	NorExtraParser::VC_typo_custom_font( $position_typo );
	NorExtraParser::VC_typo_custom_font( $desription_typo );

	$social_bar = ( $facebook_link || $twitter_link || $dribbble_link || $pinterest_link || $instagram_link || $linkedin_link || $github_link || $vk_link || $youtube_link || $vimeo_link || $behance_link || $tumblr_link || $flickr_link || $reddit_link || $snapchat_link || $whatsapp_link || $quora_link || $vine_link || $digg_link || $tiktok_link || $twitch_link || $mixer_link || $telegram_link || $soundcloud_link || $spotify_link || $discord_link || $teamspeak_link || $kaggle_link || $medium_link || $xing_link || $fivehundred_link);

	// Assembling
	include( plugin_dir_path( __FILE__ ) . 'team_member_inner__style.php' );
	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'team_member_inner__view.php' );
	return ob_get_clean();
}