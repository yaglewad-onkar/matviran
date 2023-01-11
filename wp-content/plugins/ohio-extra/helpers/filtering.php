<?php

	class NorExtraFilter {

		/**
		* String filtering
		*/
		static public function string( $string, $filter_type = 'string', $default = false ) {
			$filter_result = $default;
			$string = wp_check_invalid_utf8( trim( $string ) );
			switch ( $filter_type ) {
				case 'attr':
					$string = esc_attr( $string );
					break;
				case 'url':
					$string = esc_url( urldecode( $string ) );
					break;
			}
			if ( ! empty( $string ) ) {
				$filter_result = $string;
			}
			return $filter_result;
		}


		/**
		* Boolean filtering
		*/
		static public function boolean( $value, $default = NULL ) {
			if ( $default !== NULL && $value === NULL ) {
				$value = $default;
			}
			return (bool) $value;
		}

	}
