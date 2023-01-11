<?php 

/**
* WPBakery Page Builder Ohio Sticky Section Page shortcode
*/

add_shortcode( 'ohio_sticky_section_inner', 'ohio_sticky_section_inner_func' );

function ohio_sticky_section_inner_func( $atts, $content = '' ) {
	$scroll_to_top_color = $search_color = $social_networks_color = $pagination_color = $bg_color = $bg_image = $second_bg_image = $bg_size = $side_paddings = $header_nav_color = $header_logo_type = $css_class = NULL;
	if ( isset( $atts ) && is_array( $atts ) ) extract( $atts );

	// Default values, parsing and filtering
	$header_nav_color = NorExtraFilter::string( $header_nav_color, 'string', false );
	$social_networks_color = NorExtraFilter::string( $social_networks_color, 'string', false );
	$search_color = NorExtraFilter::string( $search_color, 'string', false );
	$scroll_to_top_color = NorExtraFilter::string( $scroll_to_top_color, 'string', false );
	$header_logo_type = NorExtraFilter::string( $header_logo_type, 'string', 'none' );
	$bg_color = NorExtraFilter::string( $bg_color, 'string', false );
	$bg_image = NorExtraFilter::string( $bg_image, 'string', false );
	$second_bg_image = NorExtraFilter::string( $second_bg_image, 'string', false );
	$bg_size = NorExtraFilter::string( $bg_size, 'string', 'cover' );
	$side_paddings = NorExtraFilter::string( $side_paddings, 'attr', false );
	$css_class = ' ' . NorExtraFilter::string( $css_class, 'attr', '' );

	// Style
	$split_page_uniqid = uniqid( 'ohio-custom-' );

	$bg_css = '';
	if ( $bg_color ) {
		$bg_css .= 'background-color:' . $bg_color . ';';
	}
	if ( $bg_image ) {
		$bg_image = wp_get_attachment_image_src( $bg_image, 'full' );
		if ( is_array( $bg_image ) ) {
			$bg_image = $bg_image[0];
		}
		$bg_css .= 'background-image:url(\'' . $bg_image . '\');';
		switch ( $bg_size ) {
			case 'contain':
				$bg_css .= 'background-size:contain;';
				break;
			case 'no-repeat':
				$bg_css .= 'background-repeat:no-repeat;';
				break;
			case 'repeat':
				$bg_css .= 'background-repeat:repeat;';
				break;
			case 'cover':
			default:
				$bg_css .= 'background-size:cover;';
				break;
		}
	}
	$second_bg_css = '';
	if ( $second_bg_image ) {
		$second_bg_image = wp_get_attachment_image_src( $second_bg_image, 'full' );
		if ( is_array( $second_bg_image ) ) {
			$second_bg_image = $second_bg_image[0];
		}
		$second_bg_css .= 'background-image:url(\'' . $second_bg_image . '\');';
		switch ( $bg_size ) {
			case 'contain':
				$second_bg_css .= 'background-size:contain;';
				break;
			case 'no-repeat':
				$second_bg_css .= 'background-repeat:no-repeat;';
				break;
			case 'repeat':
				$second_bg_css .= 'background-repeat:repeat;';
				break;
			case 'cover':
			default:
				$second_bg_css .= 'background-size:cover;';
				break;
		}
	}

	$side_paddings_css = '';
	if ( $side_paddings ) {
		$side_paddings_css = 'padding:0 ' . $side_paddings . ';';
	}

	// Assembling
	include( plugin_dir_path( __FILE__ ) . 'sticky_section_inner__style.php' );
	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'sticky_section_inner__view.php' );
	return ob_get_clean();
}