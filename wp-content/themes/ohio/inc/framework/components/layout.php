<?php

class OhioLayout {

	/* Footer buffer content data */
	static private $footer_buffer_content = array();

	/* Custom CSS buffer content data */
	static private $dynamic_css_buffer_code = array();
	static private $dynamic_desktop_css_buffer_code = array();
	static private $dynamic_tablet_css_buffer_code = array();
	static private $dynamic_mobile_css_buffer_code = array();
	static private $dynamic_extrasmall_css_buffer_code = array();

	static private $dynamic_retina_css_buffer_code = array();
	static private $dynamic_shortcodes_css_buffer_code = array();


	/* Append content to footer buffer data */
	static function append_to_footer_buffer_content( $append_string = '' ) {
		$append_string = trim( $append_string );
		if ( strlen( $append_string ) == 0 ) { return false; }
		self::$footer_buffer_content[] = $append_string;
		return true;
	}

	/* Show or return footer buffer content data */
	static function get_footer_buffer_content( $print = false ) {
		if ( $print ) {
			echo implode( "\n\n", self::$footer_buffer_content );
			return true;
		} else {
			return implode( "\n\n", self::$footer_buffer_content );
		}
	}

	/* Append dynamic CSS to buffer code */
	static function append_to_dynamic_css_buffer( $append_string = '', $type = false ) {
		$append_string = trim( @strval( $append_string ) );
		if ( strlen( $append_string ) == 0 ) { return false; }
		$append_array = preg_split( "/((\r?\n)|(\r\n?))/", $append_string );
		$new_append_string = '';
		foreach( $append_array as $index => $append_line ){
			$append_line = trim( $append_line );
			if ( strlen( $append_line ) == 0 ) { continue; }
			$new_append_string .= $append_line;
		}
		switch ( $type ) {
			case 'desktop':
				self::$dynamic_desktop_css_buffer_code[] = $new_append_string;
				break;
			case 'tablet':
				self::$dynamic_tablet_css_buffer_code[] = $new_append_string;
				break;
			case 'mobile':
				self::$dynamic_mobile_css_buffer_code[] = $new_append_string;
				break;
			case 'extrasmall':
				self::$dynamic_extrasmall_css_buffer_code[] = $new_append_string;
				break;
			default:
				self::$dynamic_css_buffer_code[] = $new_append_string;
		}
		return true;
	}

	/* Append dynamic CSS for retina to buffer code */
	static function append_to_dynamic_retina_css_buffer( $append_string = '' ) {
		$append_string = trim( $append_string );
		if ( strlen( $append_string ) == 0 ) { return false; }
		$append_array = preg_split( "/((\r?\n)|(\r\n?))/", $append_string );
		$new_append_string = '';
		foreach( $append_array as $index => $append_line ){
			$append_line = trim( $append_line );
			if ( strlen( $append_line ) == 0 ) { continue; }
			$new_append_string .= $append_line;
		}
		self::$dynamic_retina_css_buffer_code[] = preg_replace( '/\s+/', '', $new_append_string );
		return true;
	}

	/* Shortcodes dynamic CSS to buffer code */
	static function append_to_shortcodes_css_buffer( $append_string = '' ) {
		$append_string = trim( $append_string );
		if ( strlen( $append_string ) == 0 ) { return false; }
		$append_array = preg_split( "/((\r?\n)|(\r\n?))/", $append_string );
		$new_append_string = '';
		foreach( $append_array as $index => $append_line ){
			$append_line = trim( $append_line );
			if ( strlen( $append_line ) == 0 ) { continue; }
			$new_append_string .= $append_line;
		}
		self::$dynamic_shortcodes_css_buffer_code[] = $new_append_string;
		return true;
	}

	/* Show or return dynamic CSS code */
	static function get_dynamic_css_buffer( $print = false ) {
		$dynamic_css_buffer = implode( '', self::$dynamic_css_buffer_code );

		if ( self::$dynamic_desktop_css_buffer_code ) {
			$dynamic_css_buffer .= '@media screen and (min-width: 1025px){' . (implode( '', self::$dynamic_desktop_css_buffer_code )) . '}';
		}
		if ( self::$dynamic_tablet_css_buffer_code ) {
			$dynamic_css_buffer .= '@media screen and (min-width: 769px) and (max-width: 1024px){' . implode( '', self::$dynamic_tablet_css_buffer_code ) . '}';
		}
		if ( self::$dynamic_mobile_css_buffer_code ) {
			$dynamic_css_buffer .= '@media screen and (max-width: 768px){' . implode( '', self::$dynamic_mobile_css_buffer_code ) . '}';
		}

		if ( $print ) {
			echo esc_html($dynamic_css_buffer);
			return true;
		} else {
			return $dynamic_css_buffer;
		}
	}

	/* Show or return dynamic retina CSS code */
	static function get_dynamic_retina_css_buffer( $print = false ) {
		if ( $print ) {
			echo implode( '', self::$dynamic_retina_css_buffer_code );
			return true;
		} else {
			return implode( '', self::$dynamic_retina_css_buffer_code );
		}
	}

	/* Show or return dynamic CSS code */
	static function get_shortcodes_css_buffer( $print = false ) {
		if ( $print ) {
			echo implode( '', self::$dynamic_shortcodes_css_buffer_code );
			return true;
		} else {
			return implode( '', self::$dynamic_shortcodes_css_buffer_code );
		}
	}

	static function show_shortcodes_inline_css() {
		echo '<style type="text/css">';
		echo OhioLayout::get_shortcodes_css_buffer(false);
		echo '</style>';
	}

	static function the_paginator_layout( $current_page, $all_pages, $align = 'left' ) {
		$current_page = (int) $current_page;
		$all_pages = (int) $all_pages;
		if ( $current_page < 1 ) {
			$current_page = 1;
		}
		if ( $current_page > $all_pages ) {
			$current_page = $all_pages;
		}

		$_range = array();
		if ( $all_pages > 5 ) {
			// first item
			$_range[] = 1;
			// border ranges
			if ( $current_page <= 4 ) {
				$_range[] = 2;
				$_range[] = 3;
			}
			if ( $current_page >= $all_pages - 3 ) {
				$_range[] = $all_pages - 2;
				$_range[] = $all_pages - 1;
			}
			// inner ranges
			$_range[] = $current_page;
			if ( $current_page > 1 ) {
				$_range[] = $current_page - 1;
			}
			if ( $current_page < $all_pages ) {
				$_range[] = $current_page + 1;
			}
			// first item
			$_range[] = $all_pages;

			sort( $_range );
			$new_range = array_values( array_unique( $_range ) );
			$ranges = array();
			foreach ($new_range as $_range_key => $_range_value) {
				$ranges[] = $_range_value;
				if ( $_range_key < count( $new_range ) - 1 && $_range_value + 1 != $new_range[ $_range_key + 1 ] ) {
					$ranges[] = '...';
				}
			}

		} else { // fast variant
			for ($i=1; $i <= $all_pages; $i++) {
				$ranges[] = $i;
			}
		}

		$layout = '<nav class="pagination text-' . $align . '"><ul>';
		// prev button
		if ( $current_page > 1 ) {
			$layout .= '<li><a href="' . esc_url( get_pagenum_link( $current_page - 1 ) ) . '" class="btn btn-link">';
			$layout .= '<i class="ion-left ion ion-md-arrow-back"></i> ' . esc_html__( 'Prev', 'ohio' );
			$layout .= '</a></li>';
		}
		// other button layout
		if ( isset( $ranges ) ) {
			foreach ($ranges as $value) {
				if ( $value == '...' ) {
					$layout .= '<li><span class="page-numbers">...</span></li>';
				} else {
					$layout .= '<li><a href="' . esc_url( get_pagenum_link( $value ) ) . '" class="btn btn-link' . ( ( $current_page == $value ) ? ' active' : '' ) . '">' . esc_html( $value ) . '</a></li>';
				}
			}
		}
		// next button
		if ( $current_page < $all_pages ) {
			$layout .= '<li><a href="' . esc_url( get_pagenum_link( $current_page + 1 ) ) . '" class="btn btn-link">';
			$layout .= esc_html__( 'Next', 'ohio' ) . ' <i class="ion-right ion ion-md-arrow-forward"></i>';
			$layout .= '</a></li>';
		}

		$layout .= '</ul></nav>';
		echo wp_kses( $layout, 'post' );
	}
}