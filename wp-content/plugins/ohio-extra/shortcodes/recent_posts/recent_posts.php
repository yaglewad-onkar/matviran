<?php 

/**
* WPBakery Page Builder Ohio Recent Posts shortcode
*/

add_shortcode( 'ohio_recent_posts', 'ohio_recent_posts_func' );

function ohio_recent_posts_func( $atts ) {
	if ( isset( $atts ) && is_array( $atts ) ) extract( $atts );

	// Shortcode for faster pagination
	$sc64 = NorExtraParser::shortcodeInBase64( 'ohio_recent_posts' , $atts );

	// Default values, parsing and filtering
	$post_category = isset( $post_category ) ? NorExtraFilter::string( $post_category, 'string', 'all' ) : 'all';
	$card_layout = isset( $card_layout ) ? NorExtraFilter::string( $card_layout, 'string', 'classic' ) : 'classic';
	$hover_effect = isset( $hover_effect ) ? NorExtraFilter::string( $hover_effect, 'string', 'type1' ) : 'type1';
	$metro_style = isset( $metro_style ) ? NorExtraFilter::boolean( $metro_style ) : true;
	$blog_images_size = isset( $blog_images_size ) ? NorExtraFilter::string( $blog_images_size, 'string', 'medium' ) : 'medium';

	if ( !$blog_images_size || $blog_images_size == 'inherit' ) {
		$blog_images_size = OhioOptions::get_global( 'blog_images_size' );
	}
	$masonry_grid = isset( $masonry_grid ) ? NorExtraFilter::boolean( $masonry_grid ) : false;
	$asymmetric_parallax = isset( $asymmetric_parallax ) ? NorExtraFilter::boolean( $asymmetric_parallax ) : true;
	$asymmetric_parallax_speed = isset( $asymmetric_parallax_speed ) ? NorExtraFilter::string( $asymmetric_parallax_speed, 'int', 20 ) :20;
	$columns_in_row = isset( $columns_in_row ) ? NorExtraFilter::string( $columns_in_row, 'string', '2-2-1' ) : '2-2-1';
	$posts_in_block = isset( $posts_in_block ) ? NorExtraFilter::string( $posts_in_block, 'string', 12 ) : 12;
	$card_boxed = isset( $card_boxed ) ? NorExtraFilter::boolean( $card_boxed ) : true;
	$short_description = isset( $short_description ) ? NorExtraFilter::boolean( $short_description ) : true;
	$card_gap = isset( $card_gap ) ? NorExtraFilter::string( $card_gap, 'string', '20px' ) : '20px';
	$card_striped = isset( $card_striped ) ? NorExtraFilter::boolean( $card_striped ) : false;
	$card_indented = isset( $card_indented ) ? NorExtraFilter::boolean( $card_indented ) : false;
	if ( $card_layout != 'striped' ) {
		$card_striped = false;
		$card_indented = false;
	}
	
	$heading_typo = isset( $heading_typo ) ? NorExtraFilter::string( $heading_typo, 'string', '' ) : '';
	$author_typo = isset( $author_typo ) ? NorExtraFilter::string( $author_typo, 'string', '' ) : '';
	$date_typo = isset( $date_typo ) ? NorExtraFilter::string( $date_typo, 'string', '' ) : '';
	$category_typo = isset( $category_typo ) ? NorExtraFilter::string( $category_typo, 'string', '' ) : '';
	$excerpt_typo = isset( $excerpt_typo ) ? NorExtraFilter::string( $excerpt_typo, 'string', '' ) : '';
	$read_more_typo = isset( $read_more_typo ) ? NorExtraFilter::string( $read_more_typo, 'string', '' ) : '';
	$reading_time_typo = isset( $reading_time_typo ) ? NorExtraFilter::string( $reading_time_typo, 'string', '' ) : '';

	$use_pagination = isset( $use_pagination ) ? NorExtraFilter::boolean( $use_pagination ) : false;
	$pagination_type = isset( $pagination_type ) ? NorExtraFilter::string( $pagination_type, 'attr', 'simple' ) : 'simple';
	$pagination_items_per_page = isset( $pagination_items_per_page ) ? NorExtraFilter::string( $pagination_items_per_page, 'string', '6' ) : '6';
	$pagination_position = isset( $pagination_position ) ? NorExtraFilter::string( $pagination_position, 'string', 'left' ) : 'left';

	$card_background_color = isset( $card_background_color ) ? NorExtraFilter::string( $card_background_color, 'string', false ) : false;


	$pagination_color = isset( $pagination_color ) ? NorExtraFilter::string( $pagination_color ) : false;
	$pagination_active_color = isset( $pagination_active_color ) ? NorExtraFilter::string( $pagination_active_color ) : false;

	$animation_type = isset( $animation_type ) ? NorExtraFilter::string( $animation_type, 'string', 'default' ) : 'default';
	$animation_effect = isset( $animation_effect ) ? NorExtraFilter::string( $animation_effect, 'string', 'fade-up' ) : 'fade-up';

	$appearance_effect = isset( $appearance_effect ) ? NorExtraFilter::string( $appearance_effect, 'attr', 'none' )  : 'none';
	$appearance_duration = isset( $appearance_duration ) ? NorExtraFilter::string( $appearance_duration, 'attr', false )  : false;
	$appearance_delay = isset( $appearance_delay ) ? NorExtraFilter::string( $appearance_delay, 'attr', false ) : false;
	$appearance_delay = intval( str_replace( 'ms', '', $appearance_delay ) );
	if ( $appearance_duration ) $appearance_duration = intval( str_replace( 'ms', '', $appearance_duration ) );
	$appearance_once = isset( $appearance_once ) ? NorExtraFilter::boolean( $appearance_once ) : true;

	$css_class = isset( $css_class ) ? ' ' . NorExtraFilter::string( $css_class, 'attr', '' )  : '';

	if ( $post_category != 'all' ) {
		$_post_category = $post_category;
		$post_category = array();
		foreach ( explode( ',', $_post_category) as $category) {
			$category = trim( $category );
			if ( is_numeric( $category ) ) {
				$category = intval( $category );
			}
			$post_category[] = $category;
		}

		if ( empty( $post_category ) ) $post_category = 'all';
	}

	$_tax_query = array();
	if ( $post_category != 'all' ) {
		$_tax_query = [[
			'taxonomy' => 'category',
			'field' => ( is_string( $post_category[0] ) ) ? 'slug' : 'term_id',
			'terms' => $post_category
		]];
	}

	$posts_data = get_posts( [
		'posts_per_page' => intval( $posts_in_block ),
		'offset' => 0,
		'post_type' => 'post',
		'tax_query' => $_tax_query,
		'post_status' => 'publish',
		'suppress_filters' => false
	] );

	$column_class = NorExtraParser::VC_columns_to_CSS( $columns_in_row );
	$column_double_class = NorExtraParser::VC_columns_to_CSS( $columns_in_row, true );

	$column_asymmetric_grid = $columns_in_row;

	$columns_in_row = explode( '-', $columns_in_row );
	if ( is_array( $columns_in_row ) ) {
		$columns_in_row = intval( $columns_in_row[0] );
	}


	$items_css = '';
	if ( $card_gap ) {
		$items_css = 'padding: ' . $card_gap . '; ';
	}

	// Styling
	$recent_posts_uniqid = uniqid( 'ohio-custom-' );

	$card_background_css = NorExtraParser::VC_color_to_CSS( $card_background_color, 'background-color:{{color}};' );

	$heading_css = NorExtraParser::VC_typo_to_CSS( $heading_typo );
	$author_css = NorExtraParser::VC_typo_to_CSS( $author_typo );
	$date_css = NorExtraParser::VC_typo_to_CSS( $date_typo );
	$category_css = NorExtraParser::VC_typo_to_CSS( $category_typo );
	$excerpt_css = NorExtraParser::VC_typo_to_CSS( $excerpt_typo );
	$read_more_css = NorExtraParser::VC_typo_to_CSS( $read_more_typo );
	$reading_time_css = NorExtraParser::VC_typo_to_CSS( $reading_time_typo );

	$pagination_class = $pagination_css = $pagination_hover_css = '';
	if ( $use_pagination ) {
		$pagination_css = NorExtraParser::VC_color_to_CSS( $pagination_color, 'color:{{color}};' );
		$pagination_hover_css = NorExtraParser::VC_color_to_CSS( $pagination_active_color, 'color:{{color}};' );
	}

	OhioHelper::add_required_script( 'masonry' );
	if ( $appearance_effect != 'none' ) {
		OhioHelper::add_required_script( 'aos' );
	}

	// Assembling
	include( plugin_dir_path( __FILE__ ) . 'recent_posts__style.php' );
	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'recent_posts__view.php' );
	return ob_get_clean();
}