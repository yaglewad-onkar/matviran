<?php if (!defined('UT_VERSION')) {
    
    exit; // exit if accessed directly
    
}

function ut_is_vc_build() {
    return function_exists( 'vc_is_inline' ) && vc_is_inline() ? true : false;
}

/**
 * A color utility Class that helps manipulate HEX colors
 */

if( !class_exists( 'UT_Color_Class' ) ) {	

	class UT_Color_Class {

		private $_hex;
		private $_hsl;
		private $_rgb;

		/**
		 * Auto darkens/lightens by 10% for sexily-subtle gradients.
		 * Set this to FALSE to adjust automatic shade to be between given color
		 * and black (for darken) or white (for lighten)
		 */
		const DEFAULT_ADJUST = 10;

		/**
		 * Instantiates the class with a HEX value
		 * @param string $hex
		 * @throws Exception "Bad color format"
		 */
		function __construct( $hex ) {

			if( !self::is_hex( $hex ) ) {
				$hex = self::rgbStringToHex( $hex );
			}

			// Strip # sign is present
			$color = str_replace("#", "", $hex);

			// Make sure it's 6 digits
			if( strlen($color) === 3 ) {
				$color = $color[0].$color[0].$color[1].$color[1].$color[2].$color[2];
			} else if( strlen($color) != 6 ) {
				throw new Exception("HEX color needs to be 6 or 3 digits long");
			}

			$this->_hsl = self::hexToHsl( $color );
			$this->_hex = $color;
			$this->_rgb = self::hexToRgb( $color );

		}


		function is_hex( $input ) {

			return preg_match( '/^#[a-f0-9]{6}$/i', $input );

		}

		/**
		 * Given a RGB string returns a HEX string equivalent.
		 * @param string $color
		 * @return string HEX
		 */

		function rgbStringToHex( $rgb ) {

			$rgb = str_replace('rgba(', '', $rgb);
			$rgb = str_replace('rgb(', '', $rgb);
			$rgb = str_replace(')', '', $rgb);
			$rgb = explode(",", $rgb);

			$hex = "#";
			$hex .= str_pad(dechex($rgb[0]), 2, "0", STR_PAD_LEFT);
			$hex .= str_pad(dechex($rgb[1]), 2, "0", STR_PAD_LEFT);
			$hex .= str_pad(dechex($rgb[2]), 2, "0", STR_PAD_LEFT);

			return $hex; // returns the hex value including the number sign (#)        

		}

		// ====================
		// = Public Interface =
		// ====================

		/**
		 * Given a HEX string returns a HSL array equivalent.
		 * @param string $color
		 * @return array HSL associative array
		 */
		public static function hexToHsl( $color ){

			// Sanity check
			$color = self::_checkHex($color);

			// Convert HEX to DEC
			$R = hexdec($color[0].$color[1]);
			$G = hexdec($color[2].$color[3]);
			$B = hexdec($color[4].$color[5]);

			$HSL = array();

			$var_R = ($R / 255);
			$var_G = ($G / 255);
			$var_B = ($B / 255);

			$var_Min = min($var_R, $var_G, $var_B);
			$var_Max = max($var_R, $var_G, $var_B);
			$del_Max = $var_Max - $var_Min;

			$L = ($var_Max + $var_Min)/2;

			if ($del_Max == 0) {
				
				$H = 0;
				$S = 0;
				
			} else {
				
				if ( $L < 0.5 ) $S = $del_Max / ( $var_Max + $var_Min );
				else            $S = $del_Max / ( 2 - $var_Max - $var_Min );

				$del_R = ( ( ( $var_Max - $var_R ) / 6 ) + ( $del_Max / 2 ) ) / $del_Max;
				$del_G = ( ( ( $var_Max - $var_G ) / 6 ) + ( $del_Max / 2 ) ) / $del_Max;
				$del_B = ( ( ( $var_Max - $var_B ) / 6 ) + ( $del_Max / 2 ) ) / $del_Max;

				if      ($var_R == $var_Max) $H = $del_B - $del_G;
				else if ($var_G == $var_Max) $H = ( 1 / 3 ) + $del_R - $del_B;
				else if ($var_B == $var_Max) $H = ( 2 / 3 ) + $del_G - $del_R;

				if ($H<0) $H++;
				if ($H>1) $H--;
				
			}

			$HSL['H'] = ($H*360);
			$HSL['S'] = $S;
			$HSL['L'] = $L;

			return $HSL;
		}

		
		/**
		 *  Given a HSL associative array returns the equivalent HEX string
		 * @param array $hsl
		 * @return string HEX string
		 * @throws Exception "Bad HSL Array"
		 */
		
		public static function hslToHex( $hsl = array() ){
			
			// Make sure it's HSL
			if(empty($hsl) || !isset($hsl["H"]) || !isset($hsl["S"]) || !isset($hsl["L"]) ) {
				throw new Exception("Param was not an HSL array");
			}

			list($H,$S,$L) = array( $hsl['H']/360,$hsl['S'],$hsl['L'] );

			if( $S == 0 ) {
				$r = $L * 255;
				$g = $L * 255;
				$b = $L * 255;
			} else {

				if($L<0.5) {
					$var_2 = $L*(1+$S);
				} else {
					$var_2 = ($L+$S) - ($S*$L);
				}

				$var_1 = 2 * $L - $var_2;

				$r = round(255 * self::_huetorgb( $var_1, $var_2, $H + (1/3) ));
				$g = round(255 * self::_huetorgb( $var_1, $var_2, $H ));
				$b = round(255 * self::_huetorgb( $var_1, $var_2, $H - (1/3) ));

			}

			// Convert to hex
			$r = dechex($r);
			$g = dechex($g);
			$b = dechex($b);

			// Make sure we get 2 digits for decimals
			$r = (strlen("".$r)===1) ? "0".$r:$r;
			$g = (strlen("".$g)===1) ? "0".$g:$g;
			$b = (strlen("".$b)===1) ? "0".$b:$b;

			return $r.$g.$b;
			
		}


		/**
		 * Given a HEX string returns a RGB array equivalent.
		 * @param string $color
		 * @return array RGB associative array
		 */
		public static function hexToRgb( $color ){

			// Sanity check
			$color = self::_checkHex($color);

			// Convert HEX to DEC
			$R = hexdec($color[0].$color[1]);
			$G = hexdec($color[2].$color[3]);
			$B = hexdec($color[4].$color[5]);

			$RGB['R'] = $R;
			$RGB['G'] = $G;
			$RGB['B'] = $B;

			return $RGB;
			
		}


		/**
		 *  Given an RGB associative array returns the equivalent HEX string
		 * @param array $rgb
		 * @return string RGB string
		 * @throws Exception "Bad RGB Array"
		 */
		public static function rgbToHex( $rgb = array() ){
			
			// Make sure it's RGB
			if(empty($rgb) || !isset($rgb["R"]) || !isset($rgb["G"]) || !isset($rgb["B"]) ) {
				throw new Exception("Param was not an RGB array");
			}

			// https://github.com/mexitek/phpColors/issues/25#issuecomment-88354815
			// Convert RGB to HEX
			$hex[0] = str_pad(dechex($rgb['R']), 2, '0', STR_PAD_LEFT);
			$hex[1] = str_pad(dechex($rgb['G']), 2, '0', STR_PAD_LEFT);
			$hex[2] = str_pad(dechex($rgb['B']), 2, '0', STR_PAD_LEFT);

			return implode( '', $hex );

	  	}


		/**
		 * Given a HEX value, returns a darker color. If no desired amount provided, then the color halfway between
		 * given HEX and black will be returned.
		 * @param int $amount
		 * @return string Darker HEX value
		 */
		public function darken( $amount = self::DEFAULT_ADJUST ){
			
			// Darken
			$darkerHSL = $this->_darken($this->_hsl, $amount);
			// Return as HEX
			return self::hslToHex($darkerHSL);
			
		}

		/**
		 * Given a HEX value, returns a lighter color. If no desired amount provided, then the color halfway between
		 * given HEX and white will be returned.
		 * @param int $amount
		 * @return string Lighter HEX value
		 */
		public function lighten( $amount = self::DEFAULT_ADJUST ){
			
			// Lighten
			$lighterHSL = $this->_lighten($this->_hsl, $amount);
			// Return as HEX
			return self::hslToHex($lighterHSL);
			
		}

		/**
		 * Given a HEX value, returns a mixed color. If no desired amount provided, then the color mixed by this ratio
		 * @param string $hex2 Secondary HEX value to mix with
		 * @param int $amount = -100..0..+100
		 * @return string mixed HEX value
		 */
		public function mix($hex2, $amount = 0){
			
			$rgb2 = self::hexToRgb($hex2);
			$mixed = $this->_mix($this->_rgb, $rgb2, $amount);
			// Return as HEX
			return self::rgbToHex($mixed);
			
		}

		/**
		 * Creates an array with two shades that can be used to make a gradient
		 * @param int $amount Optional percentage amount you want your contrast color
		 * @return array An array with a 'light' and 'dark' index
		 */
		public function makeGradient( $amount = self::DEFAULT_ADJUST ) {
			
			// Decide which color needs to be made
			if( $this->isLight() ) {
				$lightColor = $this->_hex;
				$darkColor = $this->darken($amount);
			} else {
				$lightColor = $this->lighten($amount);
				$darkColor = $this->_hex;
			}

			// Return our gradient array
			return array( "light" => $lightColor, "dark" => $darkColor );
			
		}


		/**
		 * Returns whether or not given color is considered "light"
		 * @param string|Boolean $color
		 * @param int $lighterThan
		 * @return boolean
		 */
		public function isLight( $color = FALSE, $lighterThan = 130 ){
			
			// Get our color
			$color = ($color) ? $color : $this->_hex;

			// Calculate straight from rbg
			$r = hexdec($color[0].$color[1]);
			$g = hexdec($color[2].$color[3]);
			$b = hexdec($color[4].$color[5]);

			return (( $r*299 + $g*587 + $b*114 )/1000 > $lighterThan);
			
		}

		/**
		 * Returns whether or not a given color is considered "dark"
		 * @param string|Boolean $color
		 * @param int $darkerThan
		 * @return boolean
		 */
		public function isDark( $color = FALSE, $darkerThan = 130 ){
			
			// Get our color
			$color = ($color) ? $color:$this->_hex;

			// Calculate straight from rbg
			$r = hexdec($color[0].$color[1]);
			$g = hexdec($color[2].$color[3]);
			$b = hexdec($color[4].$color[5]);

			return (( $r*299 + $g*587 + $b*114 )/1000 <= $darkerThan);
			
		}

		/**
		 * Returns the complimentary color
		 * @return string Complementary hex color
		 *
		 */
		public function complementary() {
			
			// Get our HSL
			$hsl = $this->_hsl;

			// Adjust Hue 180 degrees
			$hsl['H'] += ($hsl['H']>180) ? -180:180;

			// Return the new value in HEX
			return self::hslToHex($hsl);
			
		}

		/**
		 * Returns your color's HSL array
		 */
		public function getHsl() {
			
			return $this->_hsl;
			
		}
		/**
		 * Returns your original color
		 */
		public function getHex() {
			
			return '#' . $this->_hex;
		}
		
		/**
		 * Returns your color's RGB array
		 */
		public function getRgb() {
			
			return $this->_rgb;
			
		}

		/**
		 * Returns the cross browser CSS3 gradient
		 * @param int $amount Optional: percentage amount to light/darken the gradient
		 * @param boolean $vintageBrowsers Optional: include vendor prefixes for browsers that almost died out already
		 * @param string $prefix Optional: prefix for every lines
		 * @param string $suffix Optional: suffix for every lines
		 * @link  http://caniuse.com/css-gradients Resource for the browser support
		 * @return string CSS3 gradient for chrome, safari, firefox, opera and IE10
		 */
		public function getCssGradient( $amount = self::DEFAULT_ADJUST, $vintageBrowsers = FALSE, $suffix = "" , $prefix = "" ) {

			// Get the recommended gradient
			$g = $this->makeGradient($amount);

			$css = "";
			/* fallback/image non-cover color */
			$css .= "{$prefix}background-color: #".$this->_hex.";{$suffix}";

			/* IE Browsers */
			$css .= "{$prefix}filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#".$g['light']."', endColorstr='#".$g['dark']."');{$suffix}";

			/* Safari 4+, Chrome 1-9 */
			if ( $vintageBrowsers ) {
				$css .= "{$prefix}background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#".$g['light']."), to(#".$g['dark']."));{$suffix}";
			}

			/* Safari 5.1+, Mobile Safari, Chrome 10+ */
			$css .= "{$prefix}background-image: -webkit-linear-gradient(top, #".$g['light'].", #".$g['dark'].");{$suffix}";

			/* Firefox 3.6+ */
			if ( $vintageBrowsers ) {
				$css .= "{$prefix}background-image: -moz-linear-gradient(top, #".$g['light'].", #".$g['dark'].");{$suffix}";
			}

			/* Opera 11.10+ */
			if ( $vintageBrowsers ) {
				$css .= "{$prefix}background-image: -o-linear-gradient(top, #".$g['light'].", #".$g['dark'].");{$suffix}";
			}

			/* Unprefixed version (standards): FF 16+, IE10+, Chrome 26+, Safari 7+, Opera 12.1+ */
			$css .= "{$prefix}background-image: linear-gradient(to bottom, #".$g['light'].", #".$g['dark'].");{$suffix}";

			// Return our CSS
			return $css;
		}

		// ===========================
		// = Private Functions Below =
		// ===========================


		/**
		 * Darkens a given HSL array
		 * @param array $hsl
		 * @param int $amount
		 * @return array $hsl
		 */
		private function _darken( $hsl, $amount = self::DEFAULT_ADJUST){
			// Check if we were provided a number
			if( $amount ) {
				$hsl['L'] = ($hsl['L'] * 100) - $amount;
				$hsl['L'] = ($hsl['L'] < 0) ? 0:$hsl['L']/100;
			} else {
				// We need to find out how much to darken
				$hsl['L'] = $hsl['L']/2 ;
			}

			return $hsl;
		}

		/**
		 * Lightens a given HSL array
		 * @param array $hsl
		 * @param int $amount
		 * @return array $hsl
		 */
		private function _lighten( $hsl, $amount = self::DEFAULT_ADJUST){
			// Check if we were provided a number
			if( $amount ) {
				$hsl['L'] = ($hsl['L'] * 100) + $amount;
				$hsl['L'] = ($hsl['L'] > 100) ? 1:$hsl['L']/100;
			} else {
				// We need to find out how much to lighten
				$hsl['L'] += (1-$hsl['L'])/2;
			}

			return $hsl;
		}

		/**
		 * Mix 2 rgb colors and return an rgb color
		 * @param array $rgb1
		 * @param array $rgb2
		 * @param int $amount ranged -100..0..+100
		 * @return array $rgb
		 *
		 * 	ported from http://phpxref.pagelines.com/nav.html?includes/class.colors.php.source.html
		 */
		
		private function _mix($rgb1, $rgb2, $amount = 0) {

			 $r1 = ($amount + 100) / 100;
			 $r2 = 2 - $r1;

			 $rmix = (($rgb1['R'] * $r1) + ($rgb2['R'] * $r2)) / 2;
			 $gmix = (($rgb1['G'] * $r1) + ($rgb2['G'] * $r2)) / 2;
			 $bmix = (($rgb1['B'] * $r1) + ($rgb2['B'] * $r2)) / 2;

			 return array('R' => $rmix, 'G' => $gmix, 'B' => $bmix);
		 }

		/**
		 * Given a Hue, returns corresponding RGB value
		 * @param int $v1
		 * @param int $v2
		 * @param int $vH
		 * @return int
		 */
		
		private static function _huetorgb( $v1,$v2,$vH ) {

			if( $vH < 0 ) {
				$vH += 1;
			}

			if( $vH > 1 ) {
				$vH -= 1;
			}

			if( (6*$vH) < 1 ) {
				   return ($v1 + ($v2 - $v1) * 6 * $vH);
			}

			if( (2*$vH) < 1 ) {
				return $v2;
			}

			if( (3*$vH) < 2 ) {
				return ($v1 + ($v2-$v1) * ( (2/3)-$vH ) * 6);
			}

			return $v1;

		}

		/**
		 * You need to check if you were given a good hex string
		 * @param string $hex
		 * @return string Color
		 * @throws Exception "Bad color format"
		 */
		private static function _checkHex( $hex ) {
			
			// Strip # sign is present
			$color = str_replace("#", "", $hex);

			// Make sure it's 6 digits
			if( strlen($color) == 3 ) {
				
				$color = $color[0].$color[0].$color[1].$color[1].$color[2].$color[2];
				
			} else if( strlen($color) != 6 ) {
				
				throw new Exception("HEX color needs to be 6 or 3 digits long");
				
			}

			return $color;
			
		}

	}

}


/**
 * Theme Colors Exchange
 *
 * @access    public
 * @since     4.9
 */

if( !class_exists( 'UT_Theme_Color_Exchange' ) ) {	
    
    class UT_Theme_Color_Exchange {
		
		/**
         * The loader that's responsible for maintaining and registering all hooks that power
         * the theme.
         *
         * @since    1.1.0
         * @access   protected
         * @var      UT_Loader  $loader  Maintains and registers all hooks for the framework.
         */
        private $loader;
		
		
		/**
		 * The Primary Color to Exchange
		 *
		 * @since    1.0.0
		 * @access   private
		 * @var      string
		 */
		public $color;
		
		
		/**
		 * The Primary Color to apply
		 *
		 * @since    1.0.0
		 * @access   private
		 * @var      string 
		 */

		public $new_color;
		
		
		/**
		 * The Theme Options Array
		 *
		 * @since    1.0.0
		 * @access   private
		 * @var      array 
		 */

		public $theme_options;
		
		
		/**
		 * Initiate the class
		 */
		
        public function __construct() {
			
			if( is_admin() ) {
				return;				
			}
			
			// Start New Loader to Hook everything up
			$this->loader = new Unite_Theme_Loader();
			
			// early action which makes the post ID available
			$this->loader->add_action( 'template_redirect', $this, 'load_color_exchange', 10 );
			
            // add filter for color exchange
            $this->loader->add_filter( 'pre_option_ut_accentcolor', $this, 'prefilter_accentcolor', 90 );
			$this->loader->add_filter( 'pre_option_option_tree', $this, 'prefilter_option_tree', 90 );
			$this->loader->add_filter( 'get_post_metadata', $this, 'change_postmeta', 100, 4 );
			$this->loader->add_filter( 'ut_custom_css', $this, 'change_the_content', 90 );
			$this->loader->add_filter( 'the_content', $this, 'change_the_content', 90 );
			
		}
			
		public function load_color_exchange() {
			
			// check if a custom accentcolor has been set
			if( isset( get_queried_object()->ID ) && get_post_meta( get_queried_object()->ID, 'ut_page_accent_color', true ) ) {
				
				// global accent color
				$this->color = new UT_Color_Class( get_option('ut_accentcolor') );
				
				// current accent color 
				$this->new_color = new UT_Color_Class( get_post_meta( get_queried_object()->ID, 'ut_page_accent_color', true ) );
				
				// theme options
				$this->theme_options = get_option( 'option_tree' );
			
			}
		
		}
		
		
		/**
		 * Prefilter Accentcolor
		 *
		 * @since    1.0.0
		 */  

		public function prefilter_accentcolor( $color ) {
			
			if( is_object( $this->new_color ) ) {
				
				return $this->new_color->getHex();

			}

			return $color;		

		}
		
		
		/**
		 * Exchange Color Option Tree Array
		 *
		 * @since    1.0.0
		 */ 
		
		public function replace_in_array( $option = array() ) {
			
			$new_option = array();
			
			foreach( $option as $key => $value) {
				
				if (is_array( $value) ) {
				   
					unset( $option[$key] );
				   	$new_option[$key] = $this->replace_in_array( $value );
					
				} else {
					
					$new_option[$key] = $this->exchange_colors( $value );
					unset( $option[$key] );
					
				}
				
			}

			return $new_option;
			
		}
		
		
		/**
		 * Prefilter Option Tree
		 *
		 * @since    1.0.0
		 */  

		public function prefilter_option_tree( $options = array() ) {
			
			if( !$this->new_color || !$this->theme_options ) {
				
				return $options;
				
			}
			
			$new_options = array();

			foreach( $this->theme_options as $key => $option ) {

				if( is_array( $option ) ) {
					
					$new_options[$key] = $this->replace_in_array( $option );
					
				} else {
					
					$new_options[$key] = $this->exchange_colors( $option );
					
				}					

			}
			
			return $new_options;

		}
		
		
		/**
		 * The Content Color Exchange for Inline CSS
		 *
		 * @since    1.0.0
		 */

		public function change_the_content( $content ) {
			
			if( !$this->new_color ) {
				
				return $content;
				
			}

			if( $this->color->getHex() && $this->new_color->getHex() ) {

				$content = $this->exchange_colors( $content );

			}

			return $content;

		}
		
		
		/**
		 * Meta Data Color Exchange for Visual Composer
		 *
		 * @since    1.0.0
		 */
		
		public function change_postmeta( $null, $object_id, $meta_key, $single ) {

			if( !$this->new_color ) {
				
				return $null;
				
			}

			if( $this->color->getHex() && $this->new_color->getHex() && ( '_wpb_shortcodes_custom_css' == $meta_key || '_menu_item_megamenu_button_background_color' == $meta_key ) )  {

				// remove filer to avoid recursive loop
				remove_filter( 'get_post_metadata', array( $this, 'change_postmeta' ), 100 );

				// fetch post meta for modification            
				$current_meta = get_post_meta( $object_id, $meta_key, TRUE );

				// re add filter for later use
				add_filter('get_post_metadata', array( $this, 'change_postmeta' ), 100, 4);

				// return new field value
				return $this->exchange_colors( $current_meta );

			}

			return $null;

		}
		
		
		/**
		 * Simple Color String Replace
		 *
		 * @since    1.0.0
		 */    
		public function exchange_colors( $content ) {

			if( !$this->new_color ) {
				
				return $content;
				
			}

			/* color variations */
			$color_variations = array();
			$rgb_color_variations = array();

			// setup color variations
			$hex = $this->color->getHex();		

			$color_variations[] = $hex;
			$color_variations[] = strtolower( $hex );
			$color_variations[] = strtoupper( $hex );

			$color_variations = array_unique( $color_variations );

			// replace hex 
			$content = str_replace( $color_variations, $this->new_color->getHex(), $content );

			// setup rgb color variations
			$rgb_color_variations = array();
			$rgb_color_variations[] = implode( ",", $this->color->getRgb() );
			$rgb_color_variations[] = $this->color->getRgb()["R"] . ', ' . $this->color->getRgb()["G"] . ', ' . $this->color->getRgb()["B"];

			// replace rgb
			$content = str_replace( $rgb_color_variations, implode( ",", $this->new_color->getRgb() ), $content );

			// search for double hashes
			$content = str_replace( '##', '#', $content );

			return $content; 

		}
		
		
		/**
         * Run the loader to execute all of the hooks with WordPress.
         *
         * @since    1.0.0
         */
        public function run() {
            
            $this->loader->run();
            
        }
		
	}

}

function run_ut_color_exchange() {

	$color_exchange = new UT_Theme_Color_Exchange();
	$color_exchange->run();

}

run_ut_color_exchange();



/**
 * Class for generating Theme Options and Metapanel CSS
 *
 * @access    public
 * @since     4.0
 */

if( !class_exists( 'UT_Custom_CSS' ) ) {	
    
    class UT_Custom_CSS {
        
		/**
         * Final CSS String
         * @var string
         */ 
		
        public $css;
        
        /**
         * Accent Color
         * @var string
         */        
		
        public $accent;
        
        /**
         * Post ID
         * @var string
         */
		
        public $ID;
        
        /**
         * Theme Font Styles
         * @var array
         */
        public $theme_font_styles;
        
        /**
         * Font Styles
         * @var array
         */
		
        public $font_styles;
        
        /**
         * Custom Fonts
         * @var array
         */
		
		protected $custom_fonts = null;
		
        /**
		 * Instantiates the class
		 */
		
        function __construct() {
            
			$this->theme_font_styles = ut_recognized_font_styles();
			$this->font_styles = array( 'regular' => 'normal', 'normal'  => 'normal', 'italic'  => 'italic' );
            
            add_action('wp_head' , array( $this, 'setup_vars' ) );
            add_action('wp_head' , array( $this, 'custom_css' ) ); 
            
        }        
        
		
        /**
         *  Asssign Global Post ID and Accent Color
		 */
        
        public function setup_vars() {
            
            // default theme color
            $this->accent = get_option('ut_accentcolor' , '#F1C40F');
            
            if( isset( get_queried_object()->ID ) ) {
                
                $this->ID = get_queried_object()->ID;
                
            }
            
        }
        
		
        /**
         * Changes HEX to RGBA
         *
         * @param     string HEX Color.
         * @param     int opacity.
         * @return    string
         *
         * @access    public
         * @since     1.0
         */
		
        public function hex_to_rgba( $hex, $opacity = 0.5 ) {
            
            if( empty( $hex ) ) {
                return;
            }
                    
            $hex = preg_replace("/#/", "", $hex);
            $color = array();
         
            if(strlen($hex) == 3) {
                $color['r'] = hexdec(substr($hex, 0, 1) . $r);
                $color['g'] = hexdec(substr($hex, 1, 1) . $g);
                $color['b'] = hexdec(substr($hex, 2, 1) . $b);
            }
            else if(strlen($hex) == 6) {
                $color['r'] = hexdec(substr($hex, 0, 2));
                $color['g'] = hexdec(substr($hex, 2, 2));
                $color['b'] = hexdec(substr($hex, 4, 2));
            }
            
            $color['o'] = $opacity;
            
            return implode(',', $color);
        
        }
        
        
        /**
         * Changes HEX to RGB
         *
         * @param     string HEX Color.
         * @return    string
         *
         * @access    public
         * @since     1.0
         */
		
        public function hex_to_rgb( $hex ) {            
            
            if( empty( $hex ) ) {
                return '';
            }

            $hex = preg_replace("/#/", "", $hex);
            $color = array();
         
            if(strlen($hex) == 3) {
                $color['r'] = hexdec(substr($hex, 0, 1) . $r);
                $color['g'] = hexdec(substr($hex, 1, 1) . $g);
                $color['b'] = hexdec(substr($hex, 2, 1) . $b);
            }
            else if(strlen($hex) == 6) {
                $color['r'] = hexdec(substr($hex, 0, 2));
                $color['g'] = hexdec(substr($hex, 2, 2));
                $color['b'] = hexdec(substr($hex, 4, 2));
            }
            
            return implode(',', $color);
        
        }
        
        
        /**
         * Changes RGBA to RGB for fallback
         *
         * @param     string RGBA Color.
         * @return    string
         *
         * @access    public
         * @since     1.0
         */
        
        public function rgba_to_rgb( $rgba ) {
        
            if( empty( $rgba ) ) {
                return;
            }
            
            /* check if hex */
            if ( preg_match( '/^#[a-f0-9]{6}$/i', $rgba ) ) {
                $rgba = ut_hex_to_rgb( $rgba );
            }
            
            $rgb = preg_replace( '/[^0-9,]/', '', $rgba );
            $rgb = explode( ',', $rgb );
            
            if( count( $rgb ) === 4 ) {
                $stack = array_pop( $rgb );            
            }        
            
            $rgb = implode( ',', $rgb );
            
            return 'rgb(' . $rgb . ')';
        
        }

        /**
         * Changes RGBA to RGB for fallback
         *
         * @param     $rgb string RGBA Color.
         * @param     $opacity string.
         * @return    string
         *
         * @access    public
         * @since     1.0
         */

        public function rgb_to_rgba( $rgb, $opacity ) {

            if( empty( $rgb ) ) {
                return '';
            }

            /* check if already rgba */
            if( strpos( $rgb, 'rgba') !== false ) {

                if( !empty( $opacity ) ) {

                    $rgb = preg_replace('/[^0-9,]/', '', $rgb);
                    $rgb = explode(',', $rgb);

                    if ($opacity != $rgb[3]) {

                        $rgb[3] = $opacity;

                    }
                    $rgb = implode(',', $rgb);

                    return 'rgb(' . $rgb . ')';

                } else {

                    return $rgb;

                }

            }

            /* check if hex */
            if ( preg_match( '/^#[a-f0-9]{6}$/i', $rgb ) ) {
                $rgb = ut_hex_to_rgb( $rgb );
            }

            $rgb = preg_replace( '/[^0-9,]/', '', $rgb );
            $rgb = explode( ',', $rgb );

            $rgb[3] = !empty( $opacity ) ? $opacity : '1';

            $rgb = implode( ',', $rgb );

            return 'rgb(' . $rgb . ')';

        }

        
        /**
         * Parse RGBA
         *
         * @param     string RGBA Color.
         * @return    array
         *
         * @access    public
         * @since     1.0
         */
        
        function parse_rgba( $str ){

            if( preg_match('/rgba\( *([\d\.-]+), *([\d\.-]+), *([\d\.-]+), *([\d\.-]+) *\)/i', $str, $m)) {
                
                $out = array(
                    'r'=>intval($m[1]), //get the red
                    'g'=>intval($m[2]), //get the green
                    'b'=>intval($m[3]), //get the blue
                    'a'=>round(floatval( $m[4] * 255 )), //get the alpha
                );

                return $out;
                
                
            }
            
            if( preg_match('/rgb\( *([\d\.-]+), *([\d\.-]+), *([\d\.-]+) *\)/i', $str, $m)) {
                
                $out = array(
                    'r'=>intval($m[1]), //get the red
                    'g'=>intval($m[2]), //get the green
                    'b'=>intval($m[3]), //get the blue
                );

                return $out;
                
                
            }
            
            
            return false;
            
        }

        /**
         * Check if given string is linear color
         *
         * @param     string
         * @return    boolean
         *
         * @access    public
         * @since     1.0
         */
        
        function is_gradient( $string ) {

            return strpos( $string, 'linear-gradient') === false ? false : true;

        }

        /**
         * Check if given string is hex color
         *
         * @param     string
         * @return    false|int
         *
         * @access    public
         * @since     1.0
         */

        function is_hex( $input ) {

            return preg_match( '/^#[a-f0-9]{6}$/i', $input );

        }

		
		/**
         * Create Gradient CSS with Prefix
         *
         * @param     string
         * @return    string
         *
         * @access    public
         * @since     4.6.3
         */
		
		function create_gradient_css( $css, $tag = '', $pattern = false, $attribute = 'background-image', $important = false ) {
        
			if( !function_exists('ut_is_gradient') || !ut_is_gradient( $css ) ) {
				return false;
			}

			// optional pattern        
			$background_url_before = ''; // pattern
			$background_url_after = ''; // image

			$patterns = array(
				'bklyn-style-one'   => 'overlay-pattern.png',
				'bklyn-style-two'   => 'overlay-pattern2.png',
				'bklyn-style-three' => 'overlay-pattern3.png',
				'bklyn-style-four'   => 'circuit-board-pattern.svg'
			);

			if( $pattern && isset( $patterns[$pattern] ) ) {

				$background_url_before = 'url("' . THEME_WEB_ROOT . '/images/' . $patterns[$pattern] . '"),';

			}

			// check for Visual Composer has background with image
			if( strpos( $css, 'url(') !== false ) {

				// extract image
				$background_url = wp_extract_urls( $css );

				if( !empty( $background_url[0] )  ) {

					$background_url_after = ', url("' . esc_url( $background_url[0] ) . '")';

				} else {

					$background_url_after = '';

				}

				// extract linear gradient
				preg_match_all( '/linear-gradient\([^(]*(\([^)]*\)[^(]*)*[^)]*\)*url\(/', $css, $color );

				if( !empty( $color[0][0] ) ) {

					$css = trim( str_replace('url(' , '', $color[0][0] ) );

				}

			}

			$important = $important ? '!important;' : '';

			$output = $tag . '{';

				$output .= "$attribute: $background_url_before -webkit-$css $background_url_after $important;";
				$output .= "$attribute: $background_url_before -moz-$css $background_url_after $important;";
				$output .= "$attribute: $background_url_before -o-$css $background_url_after $important;";
				$output .= "$attribute: $background_url_before $css $background_url_after $important;";

			$output .= '}';

			return $output;        

		}
		
		
		/**
         * Create Background Clip for Gradient Fonts
         *
         * @param     string
         * @return    string
         *
         * @access    public
         * @since     4.6.3
         */
		
		function create_background_clip( $tag ) {
			
			$output = $tag . '{ -webkit-text-fill-color: transparent; -webkit-background-clip: text !important; background-clip: text !important; }';
			
			return $output;
			
		}


        /**
         * Create Section Headline CSS
         *
         * @param     string     .
         * @return    string
         *
         * @access    public
         * @since     1.0
         */

        public function section_headline_css( $div = '',  $style = 'pt-style-1', $color = '', $height = '', $width = '' ) {

            if( empty( $color ) ) {
                return '';
            }

            $css = array();

            switch ( $style ) {

                case 'pt-style-2':

                    $css['background-color'] = $color;

                    if( !empty( $height ) ) {
                        $css['height'] = $height;
                    }

                    if( !empty( $width ) ) {
                        $css['width'] = $width;
                    }

                    // output
                    if( !empty( $css ) ) {

                        ob_start(); ?>

                        <?php echo $div; ?>.pt-style-2 .page-title span::after,
                        <?php echo $div; ?>.pt-style-2 .parallax-title span::after,
                        <?php echo $div; ?>.pt-style-2 .section-title span::after {
                        <?php echo $this->create_css_string( $css ); ?>
                        }

                        <?php return ob_get_clean();

                    }

                break;

                case 'pt-style-3':

                    return '
                        ' . $div . ' .pt-style-3 .page-title span, 
                        ' . $div . ' .pt-style-3 .parallax-title span, 
                        ' . $div . ' .pt-style-3 .section-title span { 
                            background:' . $color . ';            
                            -webkit-box-shadow:0 0 0 3px ' . $color . '; 
                            -moz-box-shadow:0 0 0 3px ' . $color . '; 
                            box-shadow:0 0 0 3px ' . $color . '; 
                        }
                    ';

                case 'pt-style-4':

                    return '
                        ' . $div . ' .pt-style-4 .page-title span, 
                        ' . $div . ' .pt-style-4 .parallax-title span, 
                        ' . $div . ' .pt-style-4 .section-title span {
                            border-color:' . $color . ';
                        }
                    ';

                case 'pt-style-5':

                    return '
                        ' . $div . ' .pt-style-5 .page-title span, 
                        ' . $div . ' .pt-style-5 .parallax-title span, 
                        ' . $div . ' .pt-style-5 .section-title span {
                            background:' . $color . ';            
                            -webkit-box-shadow:0 0 0 3px ' . $color . '; 
                            -moz-box-shadow:0 0 0 3px ' . $color . '; 
                            box-shadow:0 0 0 3px ' . $color . '; 
                        }
                    ';

                case 'pt-style-6':

                    return '
                        ' . $div . ' .pt-style-6 .page-title:after, 
                        ' . $div . ' .pt-style-6 .parallax-title:after, 
                        ' . $div . ' .pt-style-6 .section-title:after {
                            border-bottom: 1px dotted ' . $color . ';
                        }
                    ';

                default: return '';

            }

        }
        
        /**
         * Create CSS Background
         *
         * @access    public
         * @since     1.0
         */
        
        public function css_background( $object , $background_settings ) { 
                
            if( !is_array( $background_settings ) || empty( $object ) ) {
                return NULL;
            }
                    
            $skipfixed = false;
            
            $css = $object . '{';
            
            $key_exceptions = array( 'background-color' , 'background-image' , 'background-size' );
            
            // exception for mobiles and tablets
            if( unite_mobile_detection()->isMobile() && ( isset( $background_settings['background-size'] ) && $background_settings['background-size'] == 'cover' ) && ( isset( $background_settings['background-attachment'] ) && $background_settings['background-attachment'] == 'fixed' ) ) {
                $skipfixed = true;
            }
            
            foreach( $background_settings as $key => $value) {            
                
                if( in_array( $key , $key_exceptions ) ) {
                    
                    switch( $key ) {
                        
                        case 'background-color' : 
							
							$css .= 'background: '.$value.';';
							
                        break;
                        
                        case 'background-image' : 
							
							$css .= $key . ':' . 'url("'.$value.'");';
							
                        break;
                        
                        case 'background-size' : 
							
							$css .= $key . ':' . $value . ' !important;';
                        
                    }
                    
                } else {
                    
                    if( $skipfixed && $key == 'background-attachment' ) {    
                       
                       continue; 
                    
                    } else {
                    
                        $css .= $key . ':' . $value . ' !important;';
                    
                    }
                    
                }
                
            }
            
            $css .= '}';
            
            return $css;
                        
        }
        
		
        /**
         * Button Creator
         *
         * @return    string
         *
         * @access    public
         * @since     1.0
         */
        
        public function create_button( $selector, $button_settings = array() ) {
            
            if( empty( $selector ) || empty( $button_settings ) ) {
                return;
            }
            
            $button = '';
            
            if( function_exists("ut_create_gradient_css") && $this->is_gradient( $button_settings["color"] ) ) {
            
                // add background image
                $button .= ut_create_gradient_css( $button_settings["color"], $selector ); 

            }
			
            $button .= $selector . '{';
            
                if( !empty( $button_settings['font-size'] ) ) {
                    $button .= 'font-size:' . $button_settings['font-size'] . ' !important;';
                }
			
				if( !empty( $button_settings['letter-spacing'] ) ) {
                    $button .= 'letter-spacing:' . $button_settings['letter-spacing'] . ' !important;';
                }
            
                if( !empty( $button_settings['line-height'] ) ) {
                    $button .= 'line-height:' . $button_settings['line-height'] . ' !important;';
                }
            
                if( !empty( $button_settings['font-weight'] ) ) {
                    $button .= 'font-weight:' . $button_settings['font-weight'] . ' !important;';
                }
                
                if( !empty( $button_settings['text-transform'] ) ) {
                    $button .= 'text-transform:' . $button_settings['text-transform'] . ' !important;';
                }
                            
                if( !empty( $button_settings['color'] ) && !$this->is_gradient( $button_settings["color"] ) ) {
                
                    $button .= 'background:' . $button_settings['color'] . ' !important;';
                    
                }
                
                if( !empty( $button_settings['text_color'] ) ) {
                    $button .= 'color:' . $button_settings['text_color'] . ' !important;';
                }
                
                if( !empty( $button_settings['border_radius'] ) ) {
                    $button .= '
                    -webkit-border-radius:' . $button_settings['border_radius'] . 'px !important;
                       -moz-border-radius:' . $button_settings['border_radius'] . 'px !important;
                            border-radius:' . $button_settings['border_radius'] . 'px !important;';
                }
            	
				if( !empty( $button_settings['border_width'] ) ) {
                    $button .= 'border-width:' . $button_settings['border_width'] . 'px !important;';
                }
			
                if( !empty( $button_settings['border_color'] ) ) {
                
                    $button .= 'border-color:' . $button_settings['border_color'] . ' !important;';
                
                } else {
                
                    $button .= 'border: none !important;';
                
                }
            
                if( !empty( $button_settings['padding-top'] ) ) {
					$button .= 'padding-top:' . $button_settings['padding-top'] . 'px !important;';
                }
            
                if( !empty( $button_settings['padding-right'] ) ) {
					$button .= 'padding-right:' . $button_settings['padding-right'] . 'px !important;';
                }
            
                if( !empty( $button_settings['padding-bottom'] ) ) {
					$button .= 'padding-bottom:' . $button_settings['padding-bottom'] . 'px !important;';
                }
            
                if( !empty( $button_settings['padding-left'] ) ) {
					$button .= 'padding-left:' . $button_settings['padding-left'] . 'px !important;';
                }
			
            $button .= '}';
			
			if( !empty( $button_settings['icon_size'] ) ) {
				
				$button .= $selector . ' i { line-height: inherit; }';				
				$button .= $selector . ' i:before {';				
					$button .= 'font-size:' . $button_settings['icon_size'] . 'px !important; vertical-align: bottom;';				
				$button .= '}';
				
			}
			
			if( !empty( $button_settings['button_effect'] ) && $button_settings['button_effect'] == 'aylen' && !empty( $button_settings['hover_color_2']) ) {

				$button .= $selector . '.bklyn-btn-effect-aylen::before {';

					$button .= 'background-color:' . $button_settings['hover_color_2'] . ';';

				$button .= '}';

			}

			if( !empty( $button_settings['button_effect'] ) && $button_settings['button_effect'] == 'winona' ) {

				$button .= $selector . '.bklyn-btn-effect-winona::after {';
					
					if( !empty( $button_settings['text_hover_color'] ) ) {
						$button .= 'color:' . $button_settings['text_hover_color'] . ';';
					}
						
					if( !empty( $button_settings['padding-top'] ) ) {
						$button .= 'padding-top:' . $button_settings['padding-top'] . 'px !important;';
					}

					if( !empty( $button_settings['padding-right'] ) ) {
						$button .= 'padding-right:' . $button_settings['padding-right'] . 'px !important;';
					}

					if( !empty( $button_settings['padding-bottom'] ) ) {
						$button .= 'padding-bottom:' . $button_settings['padding-bottom'] . 'px !important;';
					}

					if( !empty( $button_settings['padding-left'] ) ) {
						$button .= 'padding-left:' . $button_settings['padding-left'] . 'px !important;';
					}
				
				$button .= '}';
				
			}
			
            if( function_exists("ut_create_gradient_css") && $this->is_gradient( $button_settings["hover_color"] ) ) {
            
                // add background image
                $button .= ut_create_gradient_css( $button_settings["hover_color"], $selector . ':hover' ); 

            }
                        
            $button .= $selector.':hover {';
                
                if( !empty( $button_settings['hover_color'] ) && !$this->is_gradient( $button_settings["hover_color"] ) ) {
                
                    $button .= 'background:' . $button_settings['hover_color'] . ' !important;';
                
                } 
                
                if( !empty( $button_settings['text_hover_color'] ) ) {
                
                    $button .= 'color:' . $button_settings['text_hover_color'] . ' !important;';
                
                }  
                
                if( !empty( $button_settings['border_hover_color'] ) ) {
                
                    $button .= 'border-color:' . $button_settings['border_hover_color'] . ' !important;';
                
                } 
                
            $button.= '}';
            
            return $button;    

        }

        
        /**
         * Add PX to Int
         *
         * @param     string     Hex Color.
         * @return    string
         *
         * @access    public
         * @since     4.2
         */
         
        public function add_px_value( $option ) {

            if ( strpos( $option, 'px' ) !== false ) {
                
                return $option;
            
            } else {
                
                return $option . 'px';
            
            }
            
        }
		
		
		/**
         * Add EM to Int
         *
         * @param     string     Hex Color.
         * @return    string
         *
         * @access    public
         * @since     4.2
         */
         
        public function add_em_value( $option ) {
        
            if ( strpos( $option, 'em' ) !== false ) {
                
                return $option;
            
            } else {
                
                return $option . 'em';
            
            }
            
        }

        /**
         * Array to CSS String
         *
         * @param     string     Hex Color.
         * @return    string
         *
         * @access    public
         * @since     4.9.1.1
         */

        function create_css_string( $css ) {

            $css = implode(';', array_map( function ($v, $k) {

                return $k . ':' . $v;

            }, $css, array_keys( $css ) ) );

            return $css;

        }

        /**
         * Get Image Post ID by given URL
         *
         * @param     url       must be local.
         * @return    int
         *
         * @access    public
         * @since     4.2
         */
        
        public function get_image_id_by_url( $image_url ) {
        
            global $wpdb;
        
            if( empty( $image_url ) ) {
                return;
            }
            
            $prefix = $wpdb->prefix;
            $attachment = $wpdb->get_col( $wpdb->prepare( "SELECT ID FROM " . $prefix . "posts" . " WHERE guid='%s';", esc_url( $image_url ) ) ); 
            
            return $attachment[0] ?? '';
        
        }
        
        /**
         * CSS Minify
         *
         * @param     string     Hex Color.
         * @return    string
         *
         * @access    public
         */
        
        public function minify_css( $css ) {

            if( apply_filters( 'ut_minify_assets', true ) ) {

                $css = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css);
                $css = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $css);

            }
            
            return apply_filters( 'ut_custom_css', $css ); 
			
        }
        
        
        /**
         * Get CSS Easing
         *
         * @param     string RGBA Color.
         * @return    string
         *
         * @access    public
         * @since     4.9.1.1
         */
        
        public function get_css_easing( $easing ) {
            
            $ut_recognized_css_easing = _ut_recognized_css_easing();
            
            return $ut_recognized_css_easing[$easing] ?? $easing;
            
        }
        
        
		/**
         * Get Custom Fonts
         *
         * @access    public
         */
		
		public function get_fonts() {
			
			if ( is_null( $this->custom_fonts ) ) {
				
				$this->custom_fonts = array();

				$terms = get_terms(
					'unite_custom_fonts',
					array(
						'hide_empty' => false,
					)
				);

				if ( ! empty( $terms ) ) {
					
					foreach ( $terms as $term ) {
						
						$this->custom_fonts[$term->term_id] = $term;
						$this->custom_fonts[$term->term_id]->links = $this->get_font_links( $term->term_id );
						
					}					
				}
			}

			return $this->custom_fonts;
			
		}
		
		/**
         * Get Custom Fonts Links
         *
         * @access    public
         */ 
		
		public function get_font_links( $term_id ) {
			
			$links = get_option( "taxonomy_unite_custom_fonts_{$term_id}", array() );
			
			return wp_parse_args(
				$links,
				array(
					'font_woff'  => '',
					'font_woff2' => '',
					'font_ttf'   => '',
					'font_svg'   => '',
					'font_eot'   => '',
				)
			);
			
		}
		
		/**
         * String
         *
         * @param     array     Font Settings.
         * @return    string
         *
         * @access    public
         * @since     4.6.3
         */
        
        public function get_font_face() {
			
			$fonts = $this->get_fonts();
			
			if( !empty( $fonts ) ) {
			
				foreach ( $fonts as $font ) {

					$svg_syntax = ! empty( $font->links['font_svg'] ) ? ", url('" . esc_attr( $font->links['font_svg'] ) . "#{$font->slug}') format('svg')" : ''; ?>

					@font-face {
						font-family: '<?php echo esc_attr( $font->name ); ?>';
						<?php if( !empty( $font->links['font_eot'] ) ) : ?>
						src: url('<?php echo esc_attr( $font->links['font_eot'] ); ?>');
						<?php endif; ?>
						src: <?php if( !empty( $font->links['font_eot'] ) ) : ?>url('<?php echo esc_attr( $font->links['font_eot'] ); ?>?#iefix') format('embedded-opentype'),<?php endif; ?>
							 <?php if( !empty( $font->links['font_woff2'] ) ) : ?>url('<?php echo esc_attr( $font->links['font_woff2'] ); ?>') format('woff2'),<?php endif; ?>
							 <?php if( !empty( $font->links['font_woff'] ) ) : ?>url('<?php echo esc_attr( $font->links['font_woff'] ); ?>') format('woff')<?php echo empty( $font->links['font_ttf'] ) ? ';' : ','; ?><?php endif; ?>
							 <?php if( !empty( $font->links['font_ttf'] ) ) : ?>url('<?php echo esc_attr( $font->links['font_ttf'] ); ?>') format('truetype')<?php echo $svg_syntax; ?>;<?php endif; ?>
						font-style: normal;
						font-weight: normal;
					}

					<?php	

				}
			
			}
				
		}
		
        /**
         * Typography String
         *
         * @param     string    CSS Selector.
         * @param     array     Font Settings.
         * @param     string    Optional Color.
         * @param     boolean   add !important.
         *
         * @return    string
         *
         * @access    public
         * @since     4.0
         */
        
        public function typography_css( $tag = '', $font_settings = array(), $color = '', $important = false ) {

            if( empty( $tag ) || empty( $font_settings ) ) {
                return '';
            }

            $important = $important ? '!important' : '';
            
            $font_settings = $responsive_font_settings = array_filter( $font_settings );

            if( $color ) {
                $font_settings['color'] = $color;            
            }
            
            $font_settings = implode(' ', array_map(
                function ($v, $k) use ( $important, $responsive_font_settings ) {

                    // responsive font settings
                    if( is_array( $v ) || in_array( $k, array( 'font-size-unit', 'line-height-unit' ) ) ) {
                        return '';
                    }

                    if( $k == 'font-family' ) {
                        
                        $font_families = ut_recognized_font_families();
                        return sprintf("%s:%s $important;", $k, $font_families[$v]);
                    
                    } elseif( $k == 'letter-spacing' && is_numeric( $v ) ) {
                        
						if( $v >= 1 || $v <= -1 ) {
							$v = $v / 100;	
						}
						
                        return sprintf("%s:%s $important;", $k, $this->add_em_value($v) );                        

                    } elseif( $k == 'font-size' ) {

                        $unit = $responsive_font_settings['font-size-unit'] ?? 'px';
                        return sprintf("%s:%s%s $important;", $k, ut_remove_px_value($v ), $unit);

                    } elseif( $k == 'line-height' ) {

                        $unit = $responsive_font_settings['line-height-unit'] ?? 'px';
                        return sprintf("%s:%s%s $important;", $k, ut_remove_px_value( $v ), $unit);

                    } else {
                        
                        return sprintf("%s:%s $important;", $k, $v); 
                    
                    }
                
                },
                $font_settings,
                array_keys( $font_settings )
            ) );

            $font_settings =  !empty( $font_settings ) ? $tag . '{' . $font_settings . '}' : '';

            return $font_settings . $this->responsive_font_style( $tag, $responsive_font_settings );
            
        }
        
        
		/**
         * Custom Typography String
         *
         * @param     string    CSS Selector.
         * @param     array     Font Settings.
         * @param     string    Optional Color.
         * @param     boolean   add !important.
         *
         * @return    string
         *
         * @access    public
         * @since     4.6.3
         */
        
        public function custom_typography_css( $tag = '', $font_settings = '', $color = '', $important = false ) { 
        
            if( empty( $tag ) || empty( $font_settings ) ) {
                return '';
            }

            $important = $important ? '!important' : '';

            $font_settings = $responsive_font_settings = array_filter( $font_settings );

            if( $color ) {
                $font_settings['color'] = $color;
            }

            $font_settings = implode(' ', array_map(
                function ($v, $k) use ( $important ) {

                    // responsive font settings
                    if( is_array( $v ) ) {
                        return '';
                    }

                    if( $k == 'font-family' ) {

						$font_family = get_term($v,'unite_custom_fonts');

						if( isset( $font_family->name ) )
                        return sprintf("%s:'%s' $important;", $k, $font_family->name);

                    } elseif( $k == 'letter-spacing' && is_numeric( $v ) ) {

						// fallback letter spacing
						if( $v >= 1 || $v <= -1 ) {
							$v = $v / 100;
						}

                        return sprintf("%s:%s $important;", $k, $this->add_em_value($v) );

                    } elseif( $k == 'font-size' ) {

                        $unit = $font_settings['font-size-unit'] ?? 'px';
                        return sprintf("%s:%s%s $important;", $k, ut_remove_px_value( $v ), $unit);

                    } elseif( $k == 'line-height' ) {

                        $unit = $font_settings['line-height-unit'] ?? 'px';
                        return sprintf("%s:%s%s $important;", $k, ut_remove_px_value($v ), $unit);

                    } else {

                        return sprintf("%s:%s $important;", $k, $v);

                    }

                },
                $font_settings,
                array_keys( $font_settings )
            ) );

            $font_settings =  !empty( $font_settings ) ? $tag . '{' . $font_settings . '}' : '';

            return $font_settings . $this->responsive_font_style( $tag, $responsive_font_settings );

            
        }
		
		
        /**
         * Font Styles
         *
         * @param     array     Font Settings.
         * @param     array     Exceptions.
         * @param     boolean   Important or not.
         *
         * @return    string
         *
         * @access    public
         * @since     4.0
         */

        public function font_style_css( $settings, $exception = array(), $important = false ) {

            if( empty( $settings ) ) {
                return '';
            }

            $important = $important ? '!important' : '';

            if( $settings['font-type'] == 'ut-google' ) {

                $google_font = ut_search_sub_array( ut_recognized_google_fonts(), $settings['google-font-style']['font-family'] );

				$font = $settings['selector'] . ' {';

					if( !empty( $google_font['family'] ) ) {
						$font .= 'font-family:"' . $google_font['family'] . '" ' . $important . ';';
					}

					if( !empty( $settings['google-font-style']['font-weight']) ) {
						$font .= ' font-weight: ' .  $settings['google-font-style']['font-weight'] . ' ' . $important . ';';
					}

					if( !empty( $settings['google-font-style']['font-size']) && !in_array( 'font-size', $exception ) ) {

					    $unit = $settings['google-font-style']['font-size-unit'] ?? 'px';
					    $font .= ' font-size: ' .  ut_remove_px_value( $settings['google-font-style']['font-size'] ) . $unit . ' ' . $important . ';';

					}

					if( !empty( $settings['google-font-style']['font-style']) && isset( $this->font_styles[ $settings['google-font-style']['font-style']] ) ) {
						$font .= ' font-style: ' . $this->font_styles[ $settings['google-font-style']['font-style']] . ' ' . $important . ';';
					}

					if( !empty( $settings['google-font-style']['line-height']) ) {

					    $unit = $settings['google-font-style']['line-height-unit'] ?? 'px';
					    $font .= ' line-height: ' .  ut_remove_px_value( $settings['google-font-style']['line-height'] ) . $unit . ' ' . $important . ';';

					}

					if( !empty( $settings['google-font-style']['letter-spacing'] ) ) {

						// fallback letter spacing
						if( $settings['google-font-style']['letter-spacing'] >= 1 || $settings['google-font-style']['letter-spacing'] <= -1 ) {
							$settings['google-font-style']['letter-spacing'] = $settings['google-font-style']['letter-spacing'] / 100;
						}

						$font .= ' letter-spacing: ' .  $this->add_em_value( $settings['google-font-style']['letter-spacing'] ) . ' ' . $important . ';';

					}

					if( !empty( $settings['google-font-style']['text-transform']) ) {
						$font .= ' text-transform: ' .  $settings['google-font-style']['text-transform'] . ' ' . $important . ';';
					}

				$font .= '}';

                $font .= $this->responsive_font_style( $settings['selector'], $settings['google-font-style'] );

				return $font;


            } elseif( $settings['font-type'] == 'ut-websafe' ) {

                return $this->typography_css( $settings['selector'], $settings['websafe-font-style'], '', $important );

			} elseif( $settings['font-type'] == 'ut-custom' ) {

				return $this->custom_typography_css( $settings['selector'], $settings['custom-font-style'], '', $important );

            } elseif( $settings['font-type'] == 'ut-font' ) {

                if( isset( $this->theme_font_styles[$settings['font-style']]) ) {

                    return $settings['selector'] . ' { font-family: ' .  $this->theme_font_styles[$settings['font-style']] . ' ' . $important . ';}'. "\n";

                }

            } elseif( $settings['font-type'] == 'inherit' && !empty( $settings['inherit-font-style'] ) ) {

                return $this->typography_css( $settings['selector'], $settings['inherit-font-style'], '', $important );

            }

        }

	    /**
	     *
	     * @param $selector string
	     * @param $font_settings array
	     *
	     * @return string
	     */

		public function responsive_font_style( string $selector, array $font_settings ) {

		    // supported breakpoints
            $font_array = array();

            foreach( ut_font_responsive_attributes() as $attribute ) {

                $prev_value = '';

                foreach( ot_recognized_breakpoints() as $key => $breakpoint ) {

			        // store possible desktop / main value
			        if( !empty( $font_settings[$attribute] ) && $key == 'desktop_large' ) {

			            $prev_value = $font_settings[$attribute];

                    }

			        if( !empty( $font_settings[$attribute . '-responsive'][$key] ) && $font_settings[$attribute . '-responsive'][$key] != 'auto' ) {

			            if( in_array( $attribute, array('font-size', 'line-height') ) ) {

			                $unit = $font_settings[$attribute . '-unit'] ?? 'px';
                            $font_array[$key][$attribute] = ut_remove_px_value($font_settings[$attribute . '-responsive'][$key] ) . $unit;

                        } if( in_array( $attribute, array('letter-spacing') ) ) {

			                $unit = $font_settings[$attribute . '-unit'] ?? 'em';
                            $font_array[$key][$attribute] = ut_remove_px_value($font_settings[$attribute . '-responsive'][$key] ) . $unit;

                        } else {

                            $font_array[$key][$attribute] = ut_remove_px_value($font_settings[$attribute . '-responsive'][$key] );

                        }

			            $prev_value = ut_remove_px_value($font_settings[$attribute . '-responsive'][$key] );

                    }

                    if( empty( $font_settings[$attribute . '-responsive'][$key] ) ) {

                        $unit = $font_settings[$attribute . '-unit'] ?? 'px';

                        if( $unit != 'px' && !empty( $prev_value )  ) {

                            if( in_array( $attribute, array('font-size', 'line-height') ) ) {

                                $font_array[$key][$attribute] = ut_remove_px_value($prev_value ) . $unit;

                            } else {

                                $font_array[$key][$attribute] = ut_remove_px_value($prev_value );

                            }

                        }

                    }

                }

            }

            ob_start();

            foreach( ot_recognized_breakpoints() as $key => $breakpoint ) {

                if( !empty( $font_array[$key] ) && ot_recognized_breakpoints_values( $key ) ) : ?>

                    @media <?php echo ot_recognized_breakpoints_values( $key ); ?> {

                        <?php echo $selector; ?> { <?php echo implode_with_key( $font_array[$key], ':', ';', array('line-height', 'font-size') ); ?> }

                    }

                <?php endif;

            }

            return ob_get_clean();

        }

        /**
	     *
	     * @param $selector string
	     * @param $font_settings mixed
	     * @param string $attribute
	     * @param boolean $important
	     *
	     * @return string
	     */

		public function responsive_font_style_single( string $selector, $font_settings, string $attribute, $important = false ) {

		    if( empty( $font_settings ) ) {

		        return '';

            }

		    $important = $important ? ' !important' : '';

		    ob_start();

		    if( is_array( $font_settings ) && !empty( $font_settings ) ) {

		        $unit  = $font_settings[$attribute . '-unit'] ?? 'px';
		        $value = $font_settings[$attribute] ?? '';

		        if( $value )
		        echo $selector , "{ $attribute : $value$unit$important; }";

            } else {

                echo $selector , "{ $attribute : $font_settings; }";

            }

		    return ob_get_clean();

        }


        /**
         * Create Global Section Headline CSS
         *
         * @param string $object
         * @param string $font_style
         * @param string $global_font_type
         * @param string $global_google_font_style
         * @param string $ut_global_headline_font_style
         * @param string $ut_global_headline_font_style_settings
         * @param string $ut_global_headline_websafe_font_style
         * @param string $ut_global_headline_custom_font_style
         * @param string $ut_global_headline_font_color
         *
         * @return string
         *
         * @access    public
         * @since     1.0
         */

        public function global_headline_font_style(

                $object                                 = '',
                $font_style                             = '',
                $global_font_type                       = 'ut_global_headline_font_type',
                $global_google_font_style               = 'ut_global_google_headline_font_style',
                $ut_global_headline_font_style          = 'ut_global_headline_font_style',
                $ut_global_headline_font_style_settings = 'ut_global_headline_font_style_settings',
                $ut_global_headline_websafe_font_style  = 'ut_global_headline_websafe_font_style_settings',
				$ut_global_headline_custom_font_style   = 'ut_global_headline_custom_font_style_settings',
                $ut_global_headline_font_color          = 'ut_global_headline_font_color'

            ) {

            if( empty( $object ) ) {
                return '';
            }

            $font = $font_attr = $font_color = NULL;

            /* font settings */
            if( $ut_global_headline_font_style_settings ) {

                $font_settings = ot_get_option( $ut_global_headline_font_style_settings );
                if( $font_settings && array_filter( $font_settings ) ) {

                    $font_attr = implode(';', array_map(
                        function ($v, $k) {

                            if( $k == 'font-family' ) {

                                $font_families = ut_recognized_font_families();
                                return sprintf("%s:%s;", $k, $font_families[$v]);

                            } elseif( $k == 'letter-spacing' && is_numeric( $v ) ) {

								if( $v >= 1 || $v <= -1 ) {
									$v = $v / 100;
								}

                                return sprintf("%s:%s;", $k, $this->add_em_value($v) );

                            } else {

                                if( !is_array($v ) ) {

                                    return sprintf("%s:%s;", $k, $v);

                                }

                            }

                        },
                        array_filter( $font_settings ),
                        array_keys( array_filter( $font_settings ) )
                    ));

                }

            }

            /* global font color */
            if( ot_get_option($ut_global_headline_font_color) ) {

                $font_color = 'color: ' . ot_get_option($ut_global_headline_font_color) . ';';

            }

            if( !empty( $font_style ) && $font_style != 'global' ) {

                return $object . '{ font-family: ' . $this->theme_font_styles[$font_style] . '; ' . $font_attr . '; ' . $font_color . ' }'. "\n";

            } else {

                if( ot_get_option( $global_font_type , 'ut-font') == 'ut-google' ) {

                    $ut_global_google_headline_font_style = ot_get_option($global_google_font_style);
                    $google_font = ut_search_sub_array( ut_recognized_google_fonts(), $ut_global_google_headline_font_style['font-family'] );

					$font .= $object . ' {';

						if( !empty( $google_font['family'] ) ) {

							$font .= 'font-family:"' . $google_font['family'] . '";';

						} else {

							/* fallback if user has not chosen a google font yet */
							$font_style = ot_get_option( $ut_global_headline_font_style , 'semibold' );
							$font .= 'font-family: ' . $this->theme_font_styles[$font_style] . ';';

						}

						if( !empty($ut_global_google_headline_font_style['font-weight']) ) {
							$font .= ' font-weight: ' . $ut_global_google_headline_font_style['font-weight'] . ';';
						}

						if( !empty($ut_global_google_headline_font_style['font-size']) ) {

						    $unit = $ut_global_google_headline_font_style['font-size-unit'] ?? 'px';
						    $font .= ' font-size: ' . ut_remove_px_value( $ut_global_google_headline_font_style['font-size'] ) . $unit . ';';

						}

						if( !empty($ut_global_google_headline_font_style['font-style']) && isset($this->font_styles[$ut_global_google_headline_font_style['font-style']]) ) {
							$font .= ' font-style: ' . $this->font_styles[$ut_global_google_headline_font_style['font-style']] . ';';
						}

						if( !empty($ut_global_google_headline_font_style['line-height']) ) {

						    $unit = $ut_global_google_headline_font_style['line-height-unit'] ?? 'px';
						    $font .= ' line-height: ' . ut_remove_px_value( $ut_global_google_headline_font_style['line-height'] ) . $unit . ';';

						}

						if( !empty( $ut_global_google_headline_font_style['letter-spacing'] ) ) {

							if( $ut_global_google_headline_font_style['letter-spacing'] >= 1 || $ut_global_google_headline_font_style['letter-spacing'] <= -1 ) {

							    $ut_global_google_headline_font_style['letter-spacing'] = $ut_global_google_headline_font_style['letter-spacing'] / 100;

							}

							$font .= ' letter-spacing: ' . $ut_global_google_headline_font_style['letter-spacing'] . 'em;';

						}

						if( !empty($ut_global_google_headline_font_style['text-transform']) ) {
							$font .= ' text-transform: ' . $ut_global_google_headline_font_style['text-transform'] . ';';
						}

						$font .= $font_color;

					$font .= '}';

                    $font .= $this->responsive_font_style( $object, $ut_global_google_headline_font_style );

					return $font;
                
                } elseif( ot_get_option( $global_font_type , 'ut-font') == 'ut-websafe' ) {
                    
                    return $this->typography_css( $object, ot_get_option( $ut_global_headline_websafe_font_style , 'semibold' ), ot_get_option($ut_global_headline_font_color) ) ;
                
				} elseif( ot_get_option( $global_font_type , 'ut-font') == 'ut-custom' ) {
                    
                    return $this->custom_typography_css( $object, ot_get_option( $ut_global_headline_custom_font_style , 'semibold' ), ot_get_option($ut_global_headline_font_color) ) ;	
					
                } else {
                    
                    /* font face */
                    $font_style = ot_get_option( $ut_global_headline_font_style , 'semibold' );
                    return $object . '{ font-family: ' . $this->theme_font_styles[$font_style] . '; ' . $font_attr . ' ' . $font_color . ' }'. "\n";
                
                }
                
        
            }
        
        
        }
                
        public function custom_css() {
            
            echo $this->minify_css( $this->css );
            
        }  
            
    }

}

new UT_Custom_CSS;

// additional custom CSS classes
include( 'css/theme-cacheable-css.php' );
include( 'css/theme-non-cacheable-css.php' );

include( 'css/global.php' );
include( 'css/hero.php' );
include( 'css/deprecated.php' );
include( 'css/navigation.php' );
include( 'css/side-navigation.php' );
include( 'css/mobile-navigation.php' );
include( 'css/page.php' );
include( 'css/blog.php' );
include( 'css/onepage.php' );
include( 'css/portfolio.php' );
include( 'css/post.php' );
include( 'css/shortcodes.php' );
include( 'css/contact.php' );

// run classes
if( !ut_is_vc_build() ) {
    new UT_Spacing_CSS;
}

new UT_Site_Frame_CSS;
new UT_Global_CSS;
new UT_Hero_CSS;
new UT_Hero_Animation_CSS;
new UT_Deprecated_CSS;
new UT_Top_Header_CSS;
new UT_Navigation_CSS;
new UT_Side_Navigation_CSS;
new UT_Mobile_Navigation_CSS;
new UT_Overlay_Navigation_Spacing_CSS;
new UT_Overlay_Navigation_CSS;
new UT_Overlay_Search_CSS;
new UT_Blog_CSS;
new UT_Sidebar_CSS;
new UT_Page_CSS;
new UT_Portfolio_CSS;
new UT_Single_Post_CSS;
new UT_Shortcodes_CSS;
new UT_MC4WP_CSS;
new UT_Cursor_CSS;
new UT_Contact_CSS;
new UT_Footer_CSS;

// only for old one page mode
if( ot_get_option( 'ut_site_layout', 'multisite' ) == 'onepage' ) {
   new UT_OnePage_CSS;
}

// only if woocommerce is installed and activated
if( is_woocommerce_activated() ) {
	new UT_WooCommerce_CSS;
}

// last instance of custom CSS from Theme Options
new UT_TO_CSS;