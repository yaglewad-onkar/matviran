<?php 

/**
* WPBakery Page Builder Ohio Pricing table shortcode
*/

add_shortcode( 'ohio_pricing_table', 'ohio_pricing_table_func' );

function ohio_pricing_table_func( $atts ) {
	if ( isset( $atts ) && is_array( $atts ) ) extract( $atts );

	// Default values, parsing and filtering
	$title = isset( $title ) ? NorExtraFilter::string( $title ) : false;
	$subtitle = isset( $subtitle ) ? NorExtraFilter::string( $subtitle ) : false;
	$description = isset( $description ) ? NorExtraFilter::string( $description, 'textarea', '' ) : '';

	$price = isset( $price ) ? NorExtraFilter::string( $price, 'string', '0' ) : '';

	$price_currency = isset( $price_currency ) ? NorExtraFilter::string( $price_currency ) : false;
	$price_caption = isset( $price_caption ) ? NorExtraFilter::string( $price_caption ) : false;
	$features_type = isset( $features_type ) ? NorExtraFilter::string( $features_type, 'string', 'default' ) : 'default';
	$features_value = isset( $features_value ) ? json_decode( urldecode( NorExtraFilter::string( $features_value ) ) ) : false;
	$add_button = isset( $add_button ) ? NorExtraFilter::boolean( $add_button ) : false;

	$title_typo = isset( $title_typo ) ? NorExtraFilter::string( $title_typo ) : false;
	$subtitle_typo = isset( $subtitle_typo ) ? NorExtraFilter::string( $subtitle_typo ) : false;
	$description_typo = isset( $description_typo ) ? NorExtraFilter::string( $description_typo ) : false;
	$price_typo = isset( $price_typo ) ? NorExtraFilter::string( $price_typo ) : false;
	$features_title_typo = isset( $features_title_typo ) ? NorExtraFilter::string( $features_title_typo ) : false;
	$features_title_disabled_typo = isset( $features_title_disabled_typo ) ? NorExtraFilter::string( $features_title_disabled_typo ) : false;
	$price_caption_typo = isset( $price_caption_typo ) ? NorExtraFilter::string( $price_caption_typo ) : false;

	$borders_color = isset( $borders_color ) ? NorExtraFilter::string( $borders_color ) : false;
	$price_caption_color = isset( $price_caption_color ) ? NorExtraFilter::string( $price_caption_color ) : false;
	$price_caption_bg_color = isset( $price_caption_bg_color ) ? NorExtraFilter::string( $price_caption_bg_color ) : false;
	$features_titles_color = isset( $features_titles_color ) ? NorExtraFilter::string( $features_titles_color ) : false;
	$features_icons_color = isset( $features_icons_color ) ? NorExtraFilter::string( $features_icons_color ) : false;
	$features_disabled_titles_color = isset( $features_disabled_titles_color ) ? NorExtraFilter::string( $features_disabled_titles_color ) : false;
	$features_disabled_icons_color = isset( $features_disabled_icons_color ) ? NorExtraFilter::string( $features_disabled_icons_color ) : false;
	$readmore_button = isset( $readmore_button ) ? NorExtraFilter::string( $readmore_button ) : 'type=outline';
	
	$appearance_effect = isset( $appearance_effect ) ? NorExtraFilter::string( $appearance_effect, 'attr', 'none' )  : 'none';
	$appearance_duration = isset( $appearance_duration ) ? NorExtraFilter::string( $appearance_duration, 'attr', false )  : false;
	$appearance_delay = isset( $appearance_delay ) ? NorExtraFilter::string( $appearance_delay, 'attr', false ) : false;
	$appearance_delay = intval( str_replace( 'ms', '', $appearance_delay ) );
	if ( $appearance_duration ) $appearance_duration = intval( str_replace( 'ms', '', $appearance_duration ) );
	$appearance_once = isset( $appearance_once ) ? NorExtraFilter::boolean( $appearance_once ) : true;

	$css_class = isset( $css_class ) ? ' ' . NorExtraFilter::string( $css_class, 'attr', '' )  : '';

	if ( isset( $button_link ) ) {
		$button_link = NorExtraParser::VC_link_params( $button_link, array( 'caption' => __( 'Read More', 'ohio-extra' ) ) );
	} else {
		$button_link = NorExtraParser::VC_link_params( '', array( 'caption' => __( 'Read More', 'ohio-extra' ) ) );
	}

	if ( $features_value ) {
		foreach ($features_value as $feature_key => $feature_value) {
			if ( isset( $feature_value->feature_title ) ) {
				$features_value[$feature_key]->feature_title = NorExtraFilter::string( $feature_value->feature_title );
			} else {
				$features_value[$feature_key]->feature_title = false;
			}
			if ( isset( $feature_value->feature_icon ) ) {
				$features_value[$feature_key]->feature_icon = NorExtraFilter::string( $feature_value->feature_icon, 'attr' );
			} else {
				$features_value[$feature_key]->feature_icon = false;
			}
		}
	}

	if ( isset( $features_value_type3 ) && $features_value_type3 ) {
		foreach ($features_value_type3 as $feature_key => $feature_value) {
			if ( isset( $feature_value->feature_icon ) ) {
				$features_value_type3[$feature_key]->feature_icon = NorExtraFilter::string( $feature_value->feature_icon, 'string', 'yes' );
			} else {
				$features_value_type3[$feature_key]->feature_icon = 'yes';
			}
			$GLOBALS['ohio_icon_fonts'][] = 'my-icon-ui-cross';
		}
	}

	// Styling
	$pricing_table_uniqid = uniqid( 'ohio-custom-' );

	$borders_settings = NorExtraParser::VC_color_to_CSS( $borders_color, 'border-color:{{color}};' );
	$price_caption_bg_settings = NorExtraParser::VC_color_to_CSS( $price_caption_bg_color, 'background-color:{{color}};' );
	$features_titles_settings = NorExtraParser::VC_color_to_CSS( $features_titles_color, 'color:{{color}};' );
	$features_icons_settings = NorExtraParser::VC_color_to_CSS( $features_icons_color, 'color:{{color}};' );
	$features_disabled_icons_settings = NorExtraParser::VC_color_to_CSS( $features_disabled_icons_color, 'color:{{color}};' );
	
	// Read more button
	$readmore_button = preg_replace( '/\&amp\;/', '&', $readmore_button );
	parse_str( $readmore_button, $button_settings );
	$button_css = NorExtraParser::VC_button_to_css( $button_settings, (bool)( $readmore_button ) );
	
	$price_caption_settings = NorExtraParser::VC_typo_to_CSS( $price_caption_typo );
	$title_settings = NorExtraParser::VC_typo_to_CSS( $title_typo );
	$subtitle_settings = NorExtraParser::VC_typo_to_CSS( $subtitle_typo );
	$description_settings = NorExtraParser::VC_typo_to_CSS( $description_typo );
	$price_settings = NorExtraParser::VC_typo_to_CSS( $price_typo );
	$features_titles_settings .= NorExtraParser::VC_typo_to_CSS( $features_title_typo );
	$features_disabled_titles_settings = NorExtraParser::VC_typo_to_CSS( $features_title_disabled_typo );
	$price_caption_settings .= $price_caption_bg_settings;

	NorExtraParser::VC_typo_custom_font( $title_typo );
	NorExtraParser::VC_typo_custom_font( $subtitle_typo );
	NorExtraParser::VC_typo_custom_font( $description_typo );
	NorExtraParser::VC_typo_custom_font( $price_typo );
	NorExtraParser::VC_typo_custom_font( $features_title_typo );
	NorExtraParser::VC_typo_custom_font( $price_caption_typo );
	NorExtraParser::VC_typo_custom_font( $features_title_disabled_typo );

	$icons_collection = array();

	if ( $appearance_effect != 'none' ) {
		OhioHelper::add_required_script( 'aos' );
	}

	// Assembling
	include( plugin_dir_path( __FILE__ ) . 'pricing_table__style.php' );
	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'pricing_table__view.php' );
	return ob_get_clean();
}