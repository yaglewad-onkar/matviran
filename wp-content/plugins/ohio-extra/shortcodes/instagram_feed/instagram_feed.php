<?php 

/**
* WPBakery Page Builder Ohio Instagram Feed shortcode
*/

add_shortcode( 'ohio_instagram_feed', 'ohio_instagram_feed_func' );

function ohio_instagram_feed_func( $atts ) {
	if ( isset( $atts ) && is_array( $atts ) ) extract( $atts );

	// Default values, parsing and filtering
	$username = isset( $username ) ? NorExtraFilter::string( $username, 'string', 'instagram') : 'instagram';
	$photo_count = isset( $photo_count ) ? NorExtraFilter::string( $photo_count, 'string', '6') : '6';
	$columns = isset( $columns ) ? NorExtraFilter::string( $columns, 'string', '6') : '6';
	$columns_gap = isset( $columns_gap ) ? 0 : 20;
    $remove_header = isset( $header ) ? NorExtraFilter::boolean( $header ) : false;
	$css_class = isset( $css_class ) ? ' ' . NorExtraFilter::string( $css_class, 'attr', '' ) : '';
	if ( $columns_gap == 0) {
		$css_class .= 'no-margins'; 
	}

    ob_start();
	echo do_shortcode('[instagram-feed showheader="'.$remove_header.'" cols='.$columns.' showfollow=false num='.$photo_count.' imagepadding='.$columns_gap.' class='.$css_class.' ]');
	return ob_get_clean();
}