<?php 

/**
* WPBakery Page Builder Ohio Social Networks shortcode
*/

add_shortcode( 'ohio_social_networks', 'ohio_social_networks_func' );

function ohio_social_networks_func( $atts ) {
	if ( isset( $atts ) && is_array( $atts ) ) extract( $atts );

	// Default values, parsing and filtering
	$icon_layout = isset( $icon_layout ) ? NorExtraFilter::string( $icon_layout, 'string', 'fill') : 'fill';
	$alignment = isset( $alignment ) ? ' ' . NorExtraFilter::string( $alignment, 'string', 'center' ) : 'center';
	$small_shapes = isset( $small_shapes ) ? NorExtraFilter::boolean( $small_shapes ) : false;

	$shape_squared = isset( $shape_squared ) ? NorExtraFilter::boolean( $shape_squared ) : false;
	$shape_shadow = isset( $shape_shadow ) ? NorExtraFilter::boolean( $shape_shadow ) : true;
	$type_links = isset( $type_links ) ? NorExtraFilter::string( $type_links, 'string', 'share' ) : 'share';

	$facebook = isset( $facebook ) ? NorExtraFilter::boolean( $facebook ) : true;
	$twitter = isset( $twitter ) ? NorExtraFilter::boolean( $twitter ) : true;
	$pinterest = isset( $pinterest ) ? NorExtraFilter::boolean( $pinterest ) : true;
	$linkedin = isset( $linkedin ) ? NorExtraFilter::boolean( $linkedin ) : true;
	$vk = isset( $vk ) ? NorExtraFilter::boolean( $vk ) : true;

	$facebook_link_custom = isset( $facebook_link_custom ) ? ' ' . NorExtraFilter::string( $facebook_link_custom, 'attr', '' ) : '';
	$twitter_link_custom = isset( $twitter_link_custom ) ? ' ' . NorExtraFilter::string( $twitter_link_custom, 'attr', '' ) : '';
	$instagram_link_custom = isset( $instagram_link_custom ) ? ' ' . NorExtraFilter::string( $instagram_link_custom, 'attr', '' ) : '';
	$dribbble_link_custom = isset( $dribbble_link_custom ) ? ' ' . NorExtraFilter::string( $dribbble_link_custom, 'attr', '' ) : '';
	$pinterest_link_custom = isset( $pinterest_link_custom ) ? ' ' . NorExtraFilter::string( $pinterest_link_custom, 'attr', '' ) : '';
	$linkedin_link_custom = isset( $linkedin_link_custom ) ? ' ' . NorExtraFilter::string( $linkedin_link_custom, 'attr', '' ) : '';
	$github_link_custom = isset( $github_link_custom ) ? ' ' . NorExtraFilter::string( $github_link_custom, 'attr', '' ) : '';
	$vk_link_custom = isset( $vk_link_custom ) ? ' ' . NorExtraFilter::string( $vk_link_custom, 'attr', '' ) : '';
	$youtube_link_custom = isset( $youtube_link_custom ) ? ' ' . NorExtraFilter::string( $youtube_link_custom, 'attr', '' ) : '';
	$vimeo_link_custom = isset( $vimeo_link_custom ) ? ' ' . NorExtraFilter::string( $vimeo_link_custom, 'attr', '' ) : '';
	$behance_link_custom = isset( $behance_link_custom ) ? ' ' . NorExtraFilter::string( $behance_link_custom, 'attr', '' ) : '';
	$tumblr_link_custom = isset( $tumblr_link_custom ) ? ' ' . NorExtraFilter::string( $tumblr_link_custom, 'attr', '' ) : '';
	$flickr_link_custom = isset( $flickr_link_custom ) ? ' ' . NorExtraFilter::string( $flickr_link_custom, 'attr', '' ) : '';
	$reddit_link_custom = isset( $reddit_link_custom ) ? ' ' . NorExtraFilter::string( $reddit_link_custom, 'attr', '' ) : '';
	$snapchat_link_custom = isset( $snapchat_link_custom ) ? ' ' . NorExtraFilter::string( $snapchat_link_custom, 'attr', '' ) : '';
	$whatsapp_link_custom = isset( $whatsapp_link_custom ) ? ' ' . NorExtraFilter::string( $whatsapp_link_custom, 'attr', '' ) : '';
	$quora_link_custom = isset( $quora_link_custom ) ? ' ' . NorExtraFilter::string( $quora_link_custom, 'attr', '' ) : '';
	$vine_link_custom = isset( $vine_link_custom ) ? ' ' . NorExtraFilter::string( $vine_link_custom, 'attr', '' ) : '';
	$digg_link_custom = isset( $digg_link_custom ) ? ' ' . NorExtraFilter::string( $digg_link_custom, 'attr', '' ) : '';
	$tiktok_link_custom = isset( $tiktok_link_custom ) ? ' ' . NorExtraFilter::string( $tiktok_link_custom, 'attr', '' ) : '';
	$tripadvisor_link_custom = isset( $tripadvisor_link_custom ) ? ' ' . NorExtraFilter::string( $tripadvisor_link_custom, 'attr', '' ) : '';
	$twitch_link_custom = isset( $twitch_link_custom ) ? ' ' . NorExtraFilter::string( $twitch_link_custom, 'attr', '' ) : '';
	$mixer_link_custom = isset( $mixer_link_custom ) ? ' ' . NorExtraFilter::string( $mixer_link_custom, 'attr', '' ) : '';
	$telegram_link_custom = isset( $telegram_link_custom ) ? ' ' . NorExtraFilter::string( $telegram_link_custom, 'attr', '' ) : '';
	$soundcloud_link_custom = isset( $soundcloud_link_custom ) ? ' ' . NorExtraFilter::string( $soundcloud_link_custom, 'attr', '' ) : '';
	$spotify_link_custom = isset( $spotify_link_custom ) ? ' ' . NorExtraFilter::string( $spotify_link_custom, 'attr', '' ) : '';
	$discord_link_custom = isset( $discord_link_custom ) ? ' ' . NorExtraFilter::string( $discord_link_custom, 'attr', '' ) : '';
	$teamspeak_link_custom = isset( $teamspeak_link_custom ) ? ' ' . NorExtraFilter::string( $teamspeak_link_custom, 'attr', '' ) : '';
	$kaggle_link_custom = isset( $kaggle_link_custom ) ? ' ' . NorExtraFilter::string( $kaggle_link_custom, 'attr', '' ) : '';
	$medium_link_custom = isset( $medium_link_custom ) ? ' ' . NorExtraFilter::string( $medium_link_custom, 'attr', '' ) : '';
	$xing_link_custom = isset( $xing_link_custom ) ? ' ' . NorExtraFilter::string( $xing_link_custom, 'attr', '' ) : '';
	$fivehundredpx_link_custom = isset( $fivehundredpx_link_custom ) ? ' ' . NorExtraFilter::string( $fivehundredpx_link_custom, 'attr', '' ) : '';

	$outline_hover = isset( $outline_hover ) ? NorExtraFilter::boolean( $outline_hover ) : false;
	$default_colors = isset( $default_colors ) ? NorExtraFilter::boolean( $default_colors ) : true;
	$hover_default_colors = isset( $hover_default_colors ) ? NorExtraFilter::boolean( $hover_default_colors ) : false;
	$color = isset( $color ) ? NorExtraFilter::string( $color, 'string', false ) : false;
	$icon_color = isset( $icon_color ) ? NorExtraFilter::string( $icon_color, 'string', false ) : false;
	$icon_hover_color = isset( $icon_hover_color ) ? NorExtraFilter::string( $icon_hover_color, 'string', false ) : false;
	
	$appearance_effect = ( isset( $appearance_effect ) ) ? NorExtraFilter::string( $appearance_effect, 'attr', 'none' ) : 'none';
	$appearance_duration = ( isset( $appearance_duration ) ) ? NorExtraFilter::string( $appearance_duration, 'attr', false ) : false;
	$appearance_delay = isset( $appearance_delay ) ? NorExtraFilter::string( $appearance_delay, 'attr', false ) : false;
	$appearance_delay = intval( str_replace( 'ms', '', $appearance_delay ) );
	if ( $appearance_duration ) $appearance_duration = intval( str_replace( 'ms', '', $appearance_duration ) );
	$appearance_once = isset( $appearance_once ) ? NorExtraFilter::boolean( $appearance_once ) : true;

	$css_class = isset( $css_class ) ? ' ' . NorExtraFilter::string( $css_class, 'attr', '' ) : '';
	
	$facebook_link = $twitter_link = $dribbble_link = $pinterest_link = $linkedin_link = $discord_link = $teamspeak_link = $github_link = $instagram_link = $vk_link = $youtube_link = $vimeo_link = $behance_link = $tumblr_link = $flickr_link = $reddit_link = $snapchat_link = $soundcloud_link = $spotify_link = $whatsapp_link = $quora_link = $vine_link = $digg_link = $telegram_link = $tiktok_link = $twitch_link = $mixer_link = $kaggle_link = $medium_link = $xing = false;

	if ( $type_links == 'custom' ) {
		$facebook_link = $facebook_link_custom;
		$twitter_link = $twitter_link_custom;
		$dribbble_link = $dribbble_link_custom;
		$pinterest_link = $pinterest_link_custom;
		$linkedin_link = $linkedin_link_custom;
		$github_link = $github_link_custom;
		$instagram_link = $instagram_link_custom;
		$vk_link = $vk_link_custom;
		$youtube_link = $youtube_link_custom;
		$vimeo_link = $vimeo_link_custom;
		$behance_link = $behance_link_custom;
		$tumblr_link = $tumblr_link_custom;
		$flickr_link = $flickr_link_custom;
		$reddit_link = $reddit_link_custom;
		$snapchat_link = $snapchat_link_custom;
		$whatsapp_link = $whatsapp_link_custom;
		$quora_link = $quora_link_custom;
		$vine_link = $vine_link_custom;
		$digg_link = $digg_link_custom;
		$tiktok_link = $tiktok_link_custom;
		$tripadvisor_link = $tripadvisor_link_custom;
		$twitch_link = $twitch_link_custom;
		$mixer_link = $mixer_link_custom;
		$telegram_link = $telegram_link_custom;
		$soundcloud_link = $soundcloud_link_custom;
		$spotify_link = $spotify_link_custom;
		$discord_link = $discord_link_custom;
		$teamspeak_link = $teamspeak_link_custom;
		$kaggle_link = $kaggle_link_custom;
		$medium_link = $medium_link_custom;
		$xing_link = $xing_link_custom;
		$fivehundredpx_link = $fivehundredpx_link_custom;
	} else {
		$facebook_link = ( $facebook ) ? 'https://www.facebook.com/sharer/sharer.php?u=' . get_permalink() : '';
		$twitter_link = ( $twitter ) ? 'https://twitter.com/intent/tweet?text=' . get_permalink() : '';
		$pinterest_link = ( $pinterest ) ? 'http://pinterest.com/pin/create/button/?url=' . urlencode( get_permalink() ) . '&description=' . urlencode( 'title' ) : '';
		$linkedin_link = ( $linkedin ) ? 'https://www.linkedin.com/shareArticle?mini=true&url=' . urlencode( get_permalink() ) . '&title=' . urlencode( 'title' ) . '&source=' . urlencode( get_bloginfo( 'name' ) ) : '';
		$vk_link = ( $vk ) ? 'http://vk.com/share.php?url=' . rawurlencode( get_permalink() ) : '';
	}

	// Styling
	$social_bar_uniqid = uniqid( 'ohio-custom-' );

	$link_class = '';
	$socialbar_class = ' text-' . trim( $alignment );

	if ( $shape_squared ) {
		$socialbar_class .= ' squared';
	}

	if ( $type_links == 'custom' ) {
		$socialbar_class .= ' new-tab-links';
	}

	switch ( $icon_layout ) {
		case 'outline':
			$socialbar_class .= ' outline';
			break;
		case 'flat':
			$socialbar_class .= ' flat';
			break;
		case 'inline':
		case 'text':
			$socialbar_class .= ' inline';
			break;
		case 'boxed':
			$socialbar_class .= ' boxed';
			break;
	}

	$links_count = 0;
	if ( $facebook_link ) { 
		$links_count++;
	}
	if ( $twitter_link ) { 
		$links_count++;
	}
	if ( $dribbble_link ) { 
		$links_count++;
	}
	if ( $pinterest_link ) { 
		$links_count++;
	}
	if ( $linkedin_link ) { 
		$links_count++;
	}
	if ( $github_link ) { 
		$links_count++;
	}
	if ( $instagram_link ) { 
		$links_count++;
	}
	if ( $vk_link ) {
		$links_count++;
	}
	if ( $youtube_link ) {
		$links_count++;
	}
	if ( $vimeo_link ) {
		$links_count++;
	}
	if ( $behance_link ) {
		$links_count++;
	}
	if ( $tumblr_link ) {
		$links_count++;
	}
	if ( $flickr_link ) {
		$links_count++;
	}
	if ( $reddit_link ) {
		$links_count++;
	}
	if ( $snapchat_link ) {
		$links_count++;
	}
	if ( $soundcloud_link ) {
		$links_count++;
	}
	if ( $spotify_link ) {
		$links_count++;
	}
	if ( $whatsapp_link ) {
		$links_count++;
	}
	if ( $quora_link ) {
		$links_count++;
	}
	if ( $vine_link ) {
		$links_count++;
	}
	if ( $digg_link ) {
		$links_count++;
	}
	if ( $tiktok_link ) {
		$links_count++;
	}
	if ( $tripadvisor_link ) {
		$links_count++;
	}
	if ( $twitch_link ) {
		$links_count++;
	}
	if ( $mixer_link ) {
		$links_count++;
	}
	if ( $telegram_link ) {
		$links_count++;
	}
	if ( $kaggle_link ) {
		$links_count++;
	}
	if ( $medium_link ) {
		$links_count++;
	}
	if ( $xing_link ) {
		$links_count++;
	}
	if ( $fivehundredpx_link ) {
		$links_count++;
	}

	$socialbar_class .= ' social-column-' . $links_count;

	if ( $shape_shadow && $icon_layout != 'boxed' ) {
		$socialbar_class .= ' shadow';
	}
	if ( $default_colors ) {
		$socialbar_class .= ' default';
	}
	if ( $hover_default_colors ) {
		$socialbar_class .= ' hover-default';
	}
	if ( $small_shapes ) {
		$socialbar_class .= ' small';
	}
	if ( $outline_hover && $icon_layout == 'flat' ) {
		$socialbar_class .= ' outline-hover';
	}

	$color_css = $color_css_before = $color_css_hover = '';
	if ( $color ) {
		if ( $color != 'brand' ){
			switch ( $icon_layout ) {
				case 'outline':
					$color_css = 'color:{{color}};border-color:{{color}};';
					$color_css_hover = 'background-color:{{color}};color:#fff;';
					break;
				case 'fill':
					$color_css = 'background-color:{{color}};color:#fff;border-color:{{color}};';
					$color_css_hover = 'background-color:transparent;color:{{color}};';
					break;
				case 'flat':
					$color_css = 'color:{{color}};';
					$color_css_hover = 'background-color:{{color}};color:#fff;';
					break;
				case 'boxed':
					$color_css = 'background-color:{{color}}; color:#fff;';
					$color_css_hover = 'color:{{color}};background-color:transparent;';
					break;
				case 'inline':
				case 'text':
					$color_css = 'color:#fff;';
					$color_css_hover = 'color:{{color}};';
					$color_css_before = 'background-color:{{color}};';
					break;
			}
		} else {
			$socialbar_class .= ' brand';
		}
	}

	$color_css = NorExtraParser::VC_color_to_CSS( $color, $color_css );
	$color_css_hover = NorExtraParser::VC_color_to_CSS( $color, $color_css_hover );
	$icon_color_css = NorExtraParser::VC_color_to_CSS( $icon_color, 'color:{{color}};' );
	$icon_hover_color_css = NorExtraParser::VC_color_to_CSS( $icon_hover_color, 'color:{{color}};' );

	if ( /*$hide_border &&*/ $icon_layout == 'fill' ) {
		$color_css .= 'border-width:0px;';
	}

	$show_text = false;
	if ( $icon_layout == 'boxed' || $icon_layout == 'inline' || $icon_layout == 'text' ) {
		$show_text = true;
	}

	$show_icon = true;
	if ( $icon_layout == 'text' ) {
		$show_icon = false;
	}

	if ( $appearance_effect != 'none' ) {
		OhioHelper::add_required_script( 'aos' );
	}

	// Assembling
	include( plugin_dir_path( __FILE__ ) . 'social_networks__style.php' );
	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'social_networks__view.php' );
	return ob_get_clean();
}