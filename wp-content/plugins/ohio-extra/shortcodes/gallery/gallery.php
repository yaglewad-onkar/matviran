<?php 

/**
* WPBakery Page Builder Ohio Gallery shortcode
*/

add_shortcode( 'ohio_gallery', 'ohio_gallery_func' );

function ohio_gallery_func( $atts ) {
	if ( isset( $atts ) && is_array( $atts ) ) extract( $atts );

	// Shortcode for faster pagination
	$sc64 = NorExtraParser::shortcodeInBase64( 'ohio_gallery' , $atts );

	// Default values, parsing and filtering
	$gallery = isset( $content_images ) ? NorExtraFilter::string( $content_images, 'string', '' ) : '';
	$gallery_grid = isset( $gallery_grid ) ? NorExtraFilter::string( $gallery_grid , 'string', 'clasic' ) : 'clasic';
	$hide_overlay = isset( $hide_overlay ) ? NorExtraFilter::boolean( $hide_overlay ) : false;
	$show_title = isset( $show_title ) ? NorExtraFilter::boolean( $show_title ) : false;

	$masonry_grid = isset( $masonry_grid ) ? NorExtraFilter::boolean( $masonry_grid ) : false;
	$metro_style = isset( $metro_style ) ? NorExtraFilter::boolean( $metro_style ) : false;
	$gap = isset( $gap ) ? ' ' . NorExtraFilter::string( $gap, 'attr', '20px' )  : '20px';
	$columns = isset( $columns ) ? NorExtraFilter::string( $columns, 'attr', '2-2-1' ) : '2-2-1';

	$use_pagination = isset( $use_pagination ) ? NorExtraFilter::boolean( $use_pagination ) : false;
	$pagination_type = isset( $pagination_type ) ? NorExtraFilter::string( $pagination_type, 'attr', 'simple' ) : 'simple';
	$pagination_items_per_page = isset( $pagination_items_per_page ) ? NorExtraFilter::string( $pagination_items_per_page, 'string', '6' ) : '6';

	$title_typo = isset( $title_typo ) ? NorExtraFilter::string( $title_typo ) : false;
	$caption_typo = isset( $caption_typo ) ? NorExtraFilter::string( $caption_typo ) : false;
	$gallery_title_typo = isset( $gallery_title_typo ) ? NorExtraFilter::string( $gallery_title_typo ) : false;
	$gallery_caption_typo = isset( $gallery_caption_typo ) ? NorExtraFilter::string( $gallery_caption_typo ) : false;
	$overlay_color = isset( $overlay_color ) ? NorExtraFilter::string( $overlay_color ) : false;
	$title_color = isset( $title_color ) ? NorExtraFilter::string( $title_color ) : false;
	$icon_color = isset( $icon_color ) ? NorExtraFilter::string( $icon_color ) : false;
	$gallery_bg_color = isset( $gallery_bg_color ) ? NorExtraFilter::string( $gallery_bg_color ) : false;
	$gallery_title_color = isset( $gallery_title_color ) ? NorExtraFilter::string( $gallery_title_color ) : false;
	$gallery_subtitle_color = isset( $gallery_subtitle_color ) ? NorExtraFilter::string( $gallery_subtitle_color ) : false;
	$gallery_buttons_color = isset( $gallery_buttons_color ) ? NorExtraFilter::string( $gallery_buttons_color ) : false;
	$slider_nav_bg_color = isset( $slider_nav_bg_color ) ? NorExtraFilter::string( $slider_nav_bg_color ) : false;
	$slider_nav_color = isset( $slider_nav_color ) ? NorExtraFilter::string( $slider_nav_color ) : false;

	$pagination_color = isset( $pagination_color ) ? NorExtraFilter::string( $pagination_color ) : false;
	$pagination_active_color = isset( $pagination_active_color ) ? NorExtraFilter::string( $pagination_active_color ) : false;
	
	$appearance_effect = isset( $appearance_effect ) ? NorExtraFilter::string( $appearance_effect, 'attr', 'none' )  : 'none';
	$appearance_duration = isset( $appearance_duration ) ? NorExtraFilter::string( $appearance_duration, 'attr', false )  : false;
	$appearance_delay = isset( $appearance_delay ) ? NorExtraFilter::string( $appearance_delay, 'attr', false ) : false;
	$appearance_delay = intval( str_replace( 'ms', '', $appearance_delay ) );
	if ( $appearance_duration ) $appearance_duration = intval( str_replace( 'ms', '', $appearance_duration ) );
	$appearance_once = isset( $appearance_once ) ? NorExtraFilter::boolean( $appearance_once ) : true;

	$css_class = isset( $css_class ) ? ' ' . NorExtraFilter::string( $css_class, 'attr', '' )  : '';

	$gallery = explode( ',', $gallery );
	$_gallery = array();
	foreach ($gallery as $media_id) {
		$_image = wp_prepare_attachment_for_js( $media_id );
		$_gallery[] = array(
			'url' => $_image['url'],
			'full' => $_image['url'],
			'title' => $_image['title'],
			'caption' => $_image['caption'],
			'alt' => get_post_meta( $media_id, '_wp_attachment_image_alt', true)
		);
	}
	$gallery = $_gallery;


	// Styling
	$gallery_uniqid = uniqid( 'ohio-custom-' );
	$images_uniqid = uniqid( 'ohio-custom-' );
	$gallery_int_uniqid = uniqid( 'gallery-' );

	$overlay_settings = NorExtraParser::VC_color_to_CSS( $overlay_color, 'background-color:{{color}};' );
	$icon_settings = NorExtraParser::VC_color_to_CSS( $icon_color, 'color:{{color}};' );
	$gallery_bg_settings = NorExtraParser::VC_color_to_CSS( $gallery_bg_color, 'background-color:{{color}};' );
	$gallery_buttons_settings = NorExtraParser::VC_color_to_CSS( $gallery_buttons_color, 'color:{{color}};' );
	$slider_nav_bg_settings = NorExtraParser::VC_color_to_CSS( $slider_nav_bg_color, 'background-color:{{color}};' );
	$slider_nav_settings = NorExtraParser::VC_color_to_CSS( $slider_nav_color, 'color:{{color}};' );

	$pagination_class = $pagination_css = $pagination_hover_css = '';
	if ( $use_pagination ) {
		$pagination_css = NorExtraParser::VC_color_to_CSS( $pagination_color, 'color:{{color}};' );
		$pagination_hover_css = NorExtraParser::VC_color_to_CSS( $pagination_active_color, 'color:{{color}};' );
	}

	$gallery_class = 'gallery-wrap';

	$overlay_class = '';

	if ( $hide_overlay ) {
		$overlay_class .= ' hidden';
	}
	else if ( $show_title ) {
		$overlay_class .= ' with-title';
	}

	$column_class = NorExtraParser::VC_columns_to_CSS( $columns );
	if ( $metro_style ) {
		$column_class .= ' metro-style';
	}

	if ($gallery_grid == 'clasic') {
		$column_class .= ' clasic-grid';
	} else {
		$column_class .= ' minimal-grid';
	}

	$title_css = NorExtraParser::VC_typo_to_CSS( $title_typo );
	$caption_css = NorExtraParser::VC_typo_to_CSS( $caption_typo );
	$gallery_title_css = NorExtraParser::VC_typo_to_CSS( $gallery_title_typo );
	$gallery_caption_css = NorExtraParser::VC_typo_to_CSS( $gallery_caption_typo );

	$gallery_object = (object) array();
	$gallery_object->navClass = ( $slider_nav_bg_color == 'brand' ) ? 'brand-bg-color-i' : '';
	$gallery_object->navClass .=( $slider_nav_color == 'brand' ) ? ' brand-color-i' : '';
	$gallery_json = json_encode( $gallery_object );
	// $gallery_json .= ' "navClass": "' . (( $slider_nav_bg_color == 'brand' ) ? 'brand-bg-color-i' : '') . ( ( $slider_nav_color == 'brand' ) ? ' brand-color-i' : '' ) . '",';
	// $gallery_json[ strlen( $gallery_json ) - 1 ] = '}';

	$images_css = ( $gap ) ? 'padding:' . $gap . ';' : '';

	if ( $appearance_effect != 'none' ) {
		OhioHelper::add_required_script( 'aos' );
	}
	if ( $masonry_grid ) {
		OhioHelper::add_required_script( 'masonry' );
	}

	// Assembling
	include( plugin_dir_path( __FILE__ ) . 'gallery__style.php' );
	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'gallery__view.php' );
	return ob_get_clean();
}