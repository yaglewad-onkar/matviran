<?php 

/**
* WPBakery Page Builder Ohio Testimonial shortcode
*/

add_shortcode( 'ohio_testimonial', 'ohio_testimonial_func' );

function ohio_testimonial_func( $atts ) {
	if ( isset( $atts ) && is_array( $atts ) ) extract( $atts );

	// Default values, parsing and filtering
	$block_type_layout = ( isset( $block_type_layout ) ) ? NorExtraFilter::string( $block_type_layout, 'string', 'default' ) : 'default';
	$block_type_alignment_default = isset( $block_type_alignment_default ) ? NorExtraFilter::string( $block_type_alignment_default, 'string', 'center' ) : 'center';
	$block_type_alignment_top = isset( $block_type_alignment_top ) ? NorExtraFilter::string( $block_type_alignment_top, 'string', 'center' ) : 'center';
	$block_type_alignment_middle = isset( $block_type_alignment_middle ) ? NorExtraFilter::string( $block_type_alignment_middle, 'string', 'center' ) : 'center';
	$quote = isset( $quote ) ? NorExtraFilter::string( $quote, 'textarea', '' ) : '';
	$headline = isset( $headline ) ? NorExtraFilter::string( $headline, 'textarea', '' ) : '';

	$author = isset( $author ) ? NorExtraFilter::string( $author, 'string', '' ) : '';
	$position = isset( $position ) ? NorExtraFilter::string( $position, 'string', '' ) : '';
	$photo = isset( $photo ) ? NorExtraFilter::string( wp_get_attachment_url( NorExtraFilter::string( $photo ) ), 'attr' ) : false;

	$quote_typo = isset( $quote_typo ) ? NorExtraFilter::string( $quote_typo ) : false;
	$headline_typo = isset( $headline_typo ) ? NorExtraFilter::string( $headline_typo ) : false;
	$author_typo = isset( $author_typo ) ? NorExtraFilter::string( $author_typo ) : false;
	$position_typo = isset( $position_typo ) ? NorExtraFilter::string( $position_typo ) : false;

	$image_border_color = isset( $image_border_color ) ? NorExtraFilter::string( $image_border_color ) : false;

	$appearance_effect = isset( $appearance_effect ) ? NorExtraFilter::string( $appearance_effect, 'attr', 'none' ) : 'none';
	$appearance_duration = isset( $appearance_duration ) ? NorExtraFilter::string( $appearance_duration, 'attr', false ) : false;
	$appearance_delay = isset( $appearance_delay ) ? NorExtraFilter::string( $appearance_delay, 'attr', false ) : false;
	$appearance_delay = intval( str_replace( 'ms', '', $appearance_delay ) );
	if ( $appearance_duration ) $appearance_duration = intval( str_replace( 'ms', '', $appearance_duration ) );
	$appearance_once = isset( $appearance_once ) ? NorExtraFilter::boolean( $appearance_once ) : true;

	$css_class = ( isset( $css_class ) ) ? NorExtraFilter::string( $css_class, 'attr', '' )  : '';
	$wrap_classes = [];
	$alignment = 'center';

	switch ( $block_type_layout ) {
		case 'photo_top':
			$wrap_classes[] = 'with-top-avatar';
			$alignment = $block_type_alignment_top;
			break;
		case 'photo_middle':
			$wrap_classes[] = 'with-middle-avatar';
			$alignment = $block_type_alignment_middle;
			break;
		default:
			$alignment = $block_type_alignment_default;
			break;
	}

	switch ( $alignment ) {
		case 'left':
			$wrap_classes[] = 'text-left';
			break;
		case 'center':
			$wrap_classes[] = 'text-center';
			break;
		case 'right':
			$wrap_classes[] = 'text-right';
			break;
	}

	// Styling
	$testimonial_uniqid = uniqid( 'ohio-custom-' );

	$image_css = NorExtraParser::VC_color_to_CSS( $image_border_color, 'border-color:{{color}};' );

	$quote_css = NorExtraParser::VC_typo_to_CSS( $quote_typo );
	$headline_css = NorExtraParser::VC_typo_to_CSS( $headline_typo );
	$author_css = NorExtraParser::VC_typo_to_CSS( $author_typo );
	$position_css = NorExtraParser::VC_typo_to_CSS( $position_typo );

	NorExtraParser::VC_typo_custom_font( $quote_typo );
	NorExtraParser::VC_typo_custom_font( $headline_typo );
	NorExtraParser::VC_typo_custom_font( $author_typo );
	NorExtraParser::VC_typo_custom_font( $position_typo );

	$wrap_classes[] = $css_class;

	if ( $appearance_effect != 'none' ) {
		OhioHelper::add_required_script( 'aos' );
	}

	// Assembling
	include( plugin_dir_path( __FILE__ ) . 'testimonial__style.php' );
	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'testimonial__view.php' );
	return ob_get_clean();
}

