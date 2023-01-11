<?php

class OhioBuffer {

	static private $content_buffer = [];
	static private $footer_buffer = [];

	static private $dynamic_css_buffer = [];
	static private $dynamic_desktop_css_buffer = [];
	static private $dynamic_tablet_css_buffer = [];
	static private $dynamic_mobile_css_buffer = [];
	static private $dynamic_extrasmall_css_buffer = [];
	static private $dynamic_retina_css_buffer = [];
	static private $dynamic_shortcodes_css_buffer = [];

	/**
	 * Append prepared inline content to footer buffer
	 *
	 * @param string $content
	 * @return void
	 */
	static public function append_to_footer_buffer( $content = '' ) {
		self::$footer_buffer[] = trim( $content );
	}

	/**
	 * Append prepared inline dynamic CSS to buffer
	 *
	 * @param string $content
	 * @param string|bool $type
	 * @return void
	 */
	static public function append_to_dynamic_css_buffer( $content = '', $type = null ) {
		$prepared_content = self::prepare_as_inline_css( $content );

		switch ( $type ) {
			case 'desktop':
				self::$dynamic_desktop_css_buffer[] = $prepared_content;
				break;
			case 'tablet':
				self::$dynamic_tablet_css_buffer[] = $prepared_content;
				break;
			case 'mobile':
				self::$dynamic_mobile_css_buffer[] = $prepared_content;
				break;
			case 'extrasmall':
				self::$dynamic_extrasmall_css_buffer[] = $prepared_content;
				break;
			default:
				self::$dynamic_css_buffer[] = $prepared_content;
		}
	}

	/**
	 * Append prepared inline dynamic CSS for retina to buffer
	 *
	 * @param string $content
	 * @return void
	 */
	static public function append_to_dynamic_retina_css_buffer( $content = '' ) {
		self::$dynamic_retina_css_buffer[] = self::prepare_as_inline_css( $content );
	}

	/**
	 * Append prepared inline dynamic shortcodes CSS to buffer
	 *
	 * @param string $content
	 * @return void
	 */
	static public function append_to_shortcodes_css_buffer( $content = '' ) {
		self::$dynamic_shortcodes_css_buffer[] = self::prepare_as_inline_css( $content );
	}


	static public function pack_dynamic_css_to_buffer( $selectors, $css, $type = null ) {
		if ( is_array( $selectors ) ) {
			$selectors = implode(',', $selectors);
		}

		self::append_to_dynamic_css_buffer( $selectors . '{' . $css . '} ', $type );
	}


	/**
	 * Return and print footer buffer content data
	 *
	 * @param bool $print
	 * @return string
	 */
	static public function get_footer_buffer_content( $print = false ) {
		$buffer = implode( "\n\n", self::$footer_buffer );

		if ( $print ) { echo wp_kses($buffer, 'post'); }
		return $buffer;
	}

	/**
	 * Return and print dynamic CSS buffer
	 *
	 * @param bool $print
	 * @return string
	 */
	static public function get_dynamic_css_buffer( $print = false ) {
		$buffer = implode( '', self::$dynamic_css_buffer );

		if ( count( self::$dynamic_desktop_css_buffer ) > 0 ) {
			$buffer .= ' @media screen and (min-width:1025px){' . implode( '', self::$dynamic_desktop_css_buffer ) . '}';
		}
		if ( count( self::$dynamic_tablet_css_buffer ) > 0 ) {
			$buffer .= ' @media screen and (min-width:769px) and (max-width:1024px){' . implode( '', self::$dynamic_tablet_css_buffer ) . '}';
		}
		if ( count( self::$dynamic_mobile_css_buffer ) > 0 ) {
			$buffer .= ' @media screen and (max-width:768px){' . implode( '', self::$dynamic_mobile_css_buffer ) . '}';
		}
		if ( count( self::$dynamic_extrasmall_css_buffer ) > 0 ) {
			$buffer .= ' @media screen and (max-width:566px){' . implode( '', self::$dynamic_extrasmall_css_buffer ) . '}';
		}

		if ( $print ) { echo wp_kses($buffer, 'post'); }
		return $buffer;
	}

	/**
	 * Return and print dynamic retina CSS buffer
	 *
	 * @param bool $print
	 * @return string
	 */
	static public function get_dynamic_retina_css_buffer( $print = false ) {
		$buffer = implode( '', self::$dynamic_retina_css_buffer );
		if ( $buffer ) {
			$buffer = '@media(-webkit-min-device-pixel-ratio:2),(min-resolution:192dpi){' . $buffer . '}';
		}

		if ( $print ) { echo wp_kses($buffer, 'post'); }
		return $buffer;
	}

	/**
	 * Return and print shortcodes CSS buffer
	 *
	 * @param bool $print
	 * @return string
	 */
	static public function get_shortcodes_css_buffer( $print = false ) {
		$buffer = implode( ' ', self::$dynamic_shortcodes_css_buffer );

		if ( $print ) { echo wp_kses($buffer, 'post'); }
		return $buffer;
	}

	/**
	 * Clean up and prepare CSS code as inline code
	 *
	 * @param string $content
	 * @return string
	 */
	static protected function prepare_as_inline_css( $content = '' ) {
		$content = trim( @strval( $content ) );
		if ( strlen( $content ) == 0 ) { return ''; }

		$append_array = preg_split( "/((\r?\n)|(\r\n?))/", $content );
		$prepared_content = '';
		foreach( $append_array as $index => $append_line ){
			$append_line = trim( $append_line );
			if ( strlen( $append_line ) == 0 ) { continue; }

			$prepared_content .= $append_line;
		}

		return $prepared_content;
	}

	static public function start_content_bufferization() {
		ob_start();
	}
	static public function stop_content_bufferization() {
		self::$content_buffer[] = ob_get_clean();
	}

	static public function get_content_buffer() {
		echo implode( "\n\n", self::$content_buffer );
	}
}
