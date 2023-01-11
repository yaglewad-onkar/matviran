<?php 

/**
* WPBakery Page Builder Ohio Tabs shortcode
*/

add_shortcode( 'ohio_tabs', 'ohio_tabs_func' );

function ohio_tabs_func( $atts, $content = null ) {
	$tabs_type = $tabs_layout = $tabs_layout_2 = $tabs_alignment = $tabs_title_typo = $bg_color = $content_color = 
	$tab_color = $tab_active_color = $tabs_line_color = $tabs_border_color = 
	$appearance_effect = $appearance_duration = $css_class = NULL;
	if ( isset( $atts ) && is_array( $atts ) ) extract( $atts );

	// Default values, parsing and filtering
	$tabs_type = NorExtraFilter::string( $tabs_type, 'string', 'default' );
	if ( $tabs_type == 'default' ) {
		$tabs_layout = NorExtraFilter::string( $tabs_layout_2, 'string', 'ontop' );
	} else {
		$tabs_layout = NorExtraFilter::string( $tabs_layout, 'string', 'ontop' );
	}
	$tabs_alignment = NorExtraFilter::string( $tabs_alignment, 'string', 'left' ); 

	$tabs_title_typo = NorExtraFilter::string( $tabs_title_typo );
	
	$bg_color = NorExtraFilter::string( $bg_color, 'string', '' );
	$content_color = NorExtraFilter::string( $content_color );
	$tab_color = NorExtraFilter::string( $tab_color );
	$tab_active_color = NorExtraFilter::string( $tab_active_color );
	$tabs_line_color = NorExtraFilter::string( $tabs_line_color );
	$tabs_border_color = NorExtraFilter::string( $tabs_border_color );
	
	$appearance_effect = NorExtraFilter::string( $appearance_effect, 'attr', 'none' );
	$appearance_duration = NorExtraFilter::string( $appearance_duration, 'attr', false );
	$appearance_delay = isset( $appearance_delay ) ? NorExtraFilter::string( $appearance_delay, 'attr', false ) : false;
	$appearance_delay = intval( str_replace( 'ms', '', $appearance_delay ) );
	if ( $appearance_duration ) $appearance_duration = intval( str_replace( 'ms', '', $appearance_duration ) );
	$appearance_once = isset( $appearance_once ) ? NorExtraFilter::boolean( $appearance_once ) : true;

	$css_class = ( $css_class ) ? ' ' . NorExtraFilter::string( $css_class, 'attr', '' ) : '';

	// Styling
	$tabs_uniqid = uniqid( 'ohio-custom-' );

	$tab_box_class = '';
	if ( $tabs_type == 'filled' ) {
		$tab_box_class .= ' filled';
	}
	if ( $tabs_layout == 'onleft' ) {
		$tab_box_class .= ' vertical';
	}

	$tab_box_class .= ' tabs-' . $tabs_alignment;

	$tabs_settings = '';
	if( $tabs_type == 'filled' ) {
		$tabs_settings = NorExtraParser::VC_color_to_CSS( $bg_color, 'background-color:{{color}};' );
	}

	$content_settings = NorExtraParser::VC_color_to_CSS( $content_color, 'color:{{color}};' );
	$tab_active_settings = NorExtraParser::VC_color_to_CSS( $tab_active_color, 'color:{{color}};' );
	$tabs_line_settings = NorExtraParser::VC_color_to_CSS( $tabs_line_color, 'background-color:{{color}};' );
	$tabs_border_settings = NorExtraParser::VC_color_to_CSS( $tabs_border_color, 'border-color:{{color}};' );

	$tab_settings = NorExtraParser::VC_typo_to_CSS( $tabs_title_typo );

	NorExtraParser::VC_typo_custom_font( $tabs_title_typo );

	$tab_box_object = (object) array();
	$tab_box_json = json_encode( $tab_box_object );

	if ( $appearance_effect != 'none' ) {
		OhioHelper::add_required_script( 'aos' );
	}

	// Assembling
	include( plugin_dir_path( __FILE__ ) . 'tabs__style.php' );
	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'tabs__view.php' );
	return ob_get_clean();
}