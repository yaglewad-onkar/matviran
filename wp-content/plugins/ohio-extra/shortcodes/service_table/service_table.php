<?php 

/**
* WPBakery Page Builder Ohio Service table shortcode
*/

add_shortcode( 'ohio_service_table', 'ohio_service_table_func' );

function ohio_service_table_func( $atts ) {
	if ( isset( $atts ) && is_array( $atts ) ) extract( $atts );

	// Default values, parsing and filtering
	$title = isset( $title ) ? NorExtraFilter::string( $title ) : false;
	$description = isset( $description ) ? NorExtraFilter::string( $description, 'textarea', '' ) : '';
	$table_alignment = isset( $table_alignment ) ? NorExtraFilter::string( $table_alignment, 'string' ) : 'left';

	$icon_type = ( isset( $icon_type ) ) ? NorExtraFilter::string( $icon_type, 'string', 'font_icon' ) : 'font_icon';
	$icon_as_icon = ( isset( $icon_as_icon ) ) ? NorExtraFilter::string( $icon_as_icon, 'attr', '' ) : '';
	$icon_as_image = ( isset( $icon_as_image ) ) ? NorExtraFilter::string( wp_get_attachment_url( NorExtraFilter::string( $icon_as_image ) ), 'attr' ) : false;

	$features_type = isset( $features_type ) ? NorExtraFilter::string( $features_type, 'string', 'default' ) : 'default';
	$features_value = isset( $features_value ) ? json_decode( urldecode( NorExtraFilter::string( $features_value ) ) ) : false;

	$title_typo = isset( $title_typo ) ? NorExtraFilter::string( $title_typo ) : false;
	$description_typo = isset( $description_typo ) ? NorExtraFilter::string( $description_typo ) : false;
	$features_title_typo = isset( $features_title_typo ) ? NorExtraFilter::string( $features_title_typo ) : false;
	$features_title_disabled_typo = isset( $features_title_disabled_typo ) ? NorExtraFilter::string( $features_title_disabled_typo ) : false;

	$features_titles_color = isset( $features_titles_color ) ? NorExtraFilter::string( $features_titles_color ) : false;
	$features_icons_color = isset( $features_icons_color ) ? NorExtraFilter::string( $features_icons_color ) : false;
	$features_disabled_titles_color = isset( $features_disabled_titles_color ) ? NorExtraFilter::string( $features_disabled_titles_color ) : false;
	$features_disabled_icons_color = isset( $features_disabled_icons_color ) ? NorExtraFilter::string( $features_disabled_icons_color ) : false;
	$main_icon_color = isset( $main_icon_color ) ? NorExtraFilter::string( $main_icon_color ) : false;
	$table_bg_color = isset( $table_bg_color ) ? NorExtraFilter::string( $table_bg_color ) : false;
	$table_bg_color_hover = isset( $table_bg_color_hover ) ? NorExtraFilter::string( $table_bg_color_hover ) : false;
	
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
	
	if ( $icon_type == 'font_icon' && $icon_as_icon ) {
		$GLOBALS['ohio_icon_fonts'][] = $icon_as_icon;
	}

	if ( isset( $features_value_type3 ) && $features_value_type3 ) {
		foreach ($features_value_type3 as $feature_key => $feature_value) {
			if ( isset( $feature_value->feature_icon ) ) {
				$features_value_type3[$feature_key]->feature_icon = NorExtraFilter::string( $feature_value->feature_icon, 'string', 'yes' );
			} else {
				$features_value_type3[$feature_key]->feature_icon = 'yes';
			}
		}
	}

	// Styling
	$service_table_uniqid = uniqid( 'ohio-custom-' );
	$wrap_classes = [];

	$features_titles_settings = NorExtraParser::VC_color_to_CSS( $features_titles_color, 'color:{{color}};' );
	$features_icons_settings = NorExtraParser::VC_color_to_CSS( $features_icons_color, 'color:{{color}};' );
	$features_disabled_icons_settings = NorExtraParser::VC_color_to_CSS( $features_disabled_icons_color, 'color:{{color}};' );
	$main_icon_css = NorExtraParser::VC_color_to_CSS( $main_icon_color, 'color:{{color}}' );
	$table_bg_css = NorExtraParser::VC_color_to_CSS( $table_bg_color, 'background-color:{{color}}' );
	$table_bg_hover_css = NorExtraParser::VC_color_to_CSS( $table_bg_color_hover, 'background-color:{{color}}' );
	
	$title_settings = NorExtraParser::VC_typo_to_CSS( $title_typo );
	$description_settings = NorExtraParser::VC_typo_to_CSS( $description_typo );
	$features_titles_settings .= NorExtraParser::VC_typo_to_CSS( $features_title_typo );
	$features_disabled_titles_settings = NorExtraParser::VC_typo_to_CSS( $features_title_disabled_typo );

	NorExtraParser::VC_typo_custom_font( $title_typo );
	NorExtraParser::VC_typo_custom_font( $description_typo );
	NorExtraParser::VC_typo_custom_font( $features_title_typo );
	NorExtraParser::VC_typo_custom_font( $features_title_disabled_typo );

	$icons_collection = array();

	if ( $appearance_effect != 'none' ) {
		OhioHelper::add_required_script( 'aos' );
	}
	$wrap_classes[] = $css_class;
	$wrap_classes[] = 'text-' . $table_alignment;

	// Assembling
	include( plugin_dir_path( __FILE__ ) . 'service_table__style.php' );
	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'service_table__view.php' );
	return ob_get_clean();
}