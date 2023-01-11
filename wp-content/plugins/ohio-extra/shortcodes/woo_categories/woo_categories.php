<?php 

/**
* WPBakery Page Builder Ohio WooCoomerce categories module shortcode
*/

add_shortcode( 'ohio_woo_categories', 'ohio_woo_categories_func' );

function ohio_woo_categories_func( $atts ) {
	$layout = $alignment = $subtitle_position = $appearance_effect = $appearance_duration = $css_class = $woo_categories 
	= $layout_columns = $title_typo = $description_typo = $button_typo = $title_color = $description_color = $background_color = $button = NULL;
	if ( isset( $atts ) && is_array( $atts ) ) extract( $atts );

	// Default values, parsing and filtering

	$layout = NorExtraFilter::string( $layout, 'string', 'default');
	$alignment = NorExtraFilter::string( $alignment, 'string', 'left');
	$subtitle_position = NorExtraFilter::string( $subtitle_position, 'string', 'bottom');
	$woo_categories = NorExtraFilter::string( $woo_categories, 'string', '');
	$layout_columns = NorExtraFilter::string( $layout_columns, 'string', '1');

	$title_typo = NorExtraFilter::string( $title_typo, 'string', '');
	$description_typo = NorExtraFilter::string( $description_typo, 'string', '');
	$button_typo = NorExtraFilter::string( $button_typo, 'string', '');
	$background_color = NorExtraFilter::string( $background_color, 'string', '');
	$button = NorExtraFilter::string( $button, 'string', '');
	$row_reverse = isset( $row_reverse ) ? NorExtraFilter::boolean( $row_reverse ) : false;

	$appearance_effect = isset( $appearance_effect ) ? NorExtraFilter::string( $appearance_effect, 'attr', 'none' ) : 'none';
	$appearance_duration = isset( $appearance_duration ) ? NorExtraFilter::string( $appearance_duration, 'attr', false ) : false;
	$appearance_delay = isset( $appearance_delay ) ? NorExtraFilter::string( $appearance_delay, 'attr', false ) : false;
	$appearance_delay = intval( str_replace( 'ms', '', $appearance_delay ) );
	if ( $appearance_duration ) $appearance_duration = intval( str_replace( 'ms', '', $appearance_duration ) );
	$appearance_once = isset( $appearance_once ) ? NorExtraFilter::boolean( $appearance_once ) : true;

	$css_class = isset( $css_class ) ? ' ' . NorExtraFilter::string( $css_class, 'attr', '' ) : '';

	$_woo_categories = [];
	if ( !empty( $woo_categories ) ) {
		foreach ( explode(',', $woo_categories) as $category_id ) {
			if ( is_numeric( $category_id ) ) {
				$term = get_term_by( 'id', $category_id, 'product_cat' );
			} else {
				$term = get_term_by( 'slug', $category_id, 'product_cat' );
			}

			$cat = (object) [
				'title' => '',
				'description' => '',
				'url' => '',
				'image' => ''
			];
			if ( $term ) {
				$cat->title = isset($term->name) ? $term->name : '';
				$cat->description = isset($term->description) ? $term->description : '';
				$cat->url = get_term_link( $term->term_id, 'product_cat' );
				$thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true );
				if ( $thumbnail_id ) {
					$cat->image = wp_get_attachment_image_src( $thumbnail_id, 'large' );
					if ( is_array( $cat->image ) ) {
						$cat->image = $cat->image[0];
					}
				} else {
					$cat->image = wc_placeholder_img_src();
				}
				if ( $cat->image ) {
					$cat->image = str_replace( ' ', '%20', $cat->image );
				}
			}
			$_woo_categories[] = $cat;
		}
	} else {
		$terms = get_terms( [
			'taxonomy' => 'product_cat',
			'hide_empty' => false,
		] );

		if ( $terms ) {
			foreach ($terms as $term) {

				$cat = (object) array( 'title' => '', 'description' => '', 'url' => '', 'image' => '');
				$cat->title = isset($term->name) ? $term->name : '';
				$cat->description = isset($term->description) ? $term->description : '';
				$cat->url = get_term_link( $term->term_id, 'product_cat' );
				$thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true );
				if ( $thumbnail_id ) {
					$cat->image = wp_get_attachment_image_src( $thumbnail_id, 'large' );
					if ( is_array( $cat->image ) ) {
						$cat->image = $cat->image[0];
					}
				} else {
					$cat->image = wc_placeholder_img_src();
				}
				if ( $cat->image ) { $cat->image = str_replace( ' ', '%20', $cat->image ); }
				$_woo_categories[] = $cat;
			}
		}
	}
	$woo_categories = $_woo_categories;



	$layout_columns_class = '12';
	switch ($layout_columns) {
		case '1': $layout_columns_class = '12'; break;
		case '2': $layout_columns_class = '6'; break;
		case '3': $layout_columns_class = '4'; break;
		case '4': $layout_columns_class = '3'; break;
	}

	// Styling
	$woo_categories_uniqid = uniqid( 'ohio-custom-' );
	
	$layout_class = $alignment_class = '';
	if ( $layout == 'boxed' ) {
		$layout_class .= ' style-2 product-category--boxed';
	} else {
		$layout_class .= ' style-1 product-category--default';
	}

	switch ($alignment) {
		case 'left': $alignment_class .= ' text-left'; break;
		case 'center': $alignment_class .= ' text-center'; break;
		case 'right': $alignment_class .= ' text-right'; break;
		default: $alignment_class .= ' text-left'; break;
	}

	$title_css = NorExtraParser::VC_typo_to_CSS( $title_typo );
	$description_css = NorExtraParser::VC_typo_to_CSS( $description_typo );
	$background_css = ( $background_color ) ? NorExtraParser::VC_color_to_CSS( $background_color, 'background-color:{{color}}' ) : '';
	$button = preg_replace( '/\&amp\;/', '&', $button );
	parse_str( $button, $button );
	$button_settings = NorExtraParser::VC_button_to_css( $button );
	$button_css = NorExtraParser::VC_typo_to_CSS( $button_typo );
	$button_css .= $button_settings['css'];
	$button_css_hover = $button_settings['hover-css'];
	$button_class = isset( $button_settings['classes'] ) ? ' ' . $button_settings['classes'] : '';

	if ( $row_reverse ) {
		$row_reverse_css = "flex-direction: row-reverse";
	}

	if ( $appearance_effect != 'none' ) {
		OhioHelper::add_required_script( 'aos' );
	}

	// Assembling
	include( plugin_dir_path( __FILE__ ) . 'woo_categories__style.php' );
	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'woo_categories__view.php' );
	return ob_get_clean();
}