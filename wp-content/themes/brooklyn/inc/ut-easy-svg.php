<?php

/**
 * UT Easy SVG Text - Generate SVG from PHP
 * developed by United Themes
 */

class UT_Text_SVG {

    protected $svg;
    protected $font;
    protected $css;
    protected $js;

    public function __construct( $id = '', $class = '' ) {

        $this->font = new stdClass;
        $this->font->id = uniqid("ut_svg_");
        $this->font->familiy = '';
        $this->font->size = false;
        $this->font->align = false;
        $this->font->weight = false;
        $this->font->decoration = false;
        $this->font->textAlign = 'center';
        $this->font->transform = false; // not supported yet wait for specification - applied via CSS
        $this->font->letterSpacing = false; // not supported yet wait for specification - applied via CSS
        $this->font->variant = false;
        $this->font->lineHeight = false;
        $this->font->stroke = false;
        $this->font->strokeColor = null;
        $this->font->strokeWidth = 1;
        $this->font->fill = false;
        $this->font->clipPath = false;
        $this->font->clipPathSize = false;

        $this->css = new stdClass;
        $this->clearSVG( $id, $class );

    }


    public function clearSVG( $id, $class ) {

        $classes = array( 'ut-text-svg' );
        $classes[] = $class;

        $this->dynamicCSS();

        $this->svg = new SimpleXMLElement('<svg></svg>');
        $this->svg->addAttribute('id', $id);
        $this->svg->addAttribute('version', '1.1');
        $this->svg->addAttribute('xmlns', 'http://www.w3.org/2000/svg');
        $this->svg->addAttribute('class', implode( " ", $classes ) );

    }

    /**
     * Set font family for display
     * @param string $id
     * @return void
     */

    public function setFontID( $id ) {
        $this->font->id = $id;
    }

    /**
     * Set font family for display
     * @param string $family
     * @return void
     */

    public function setFontFamily( $family ) {
        $this->font->familiy = $family;
    }

    /**
     * Set font size for display
     * @param string $size
     * @return void
     */

    public function setFontSize( $size ) {
        $this->font->size = $size;
    }

    /**
     * Set font weight for display
     * @param string $weight
     * @return void
     */

    public function setFontWeight( $weight ) {
        $this->font->weight = $weight;
    }

    /**
     * Set font variant for display
     * @param string $variant
     * @return void
     */

    public function setFontVariant( $variant ) {
        $this->font->variant = $variant;
    }

    /**
     * Set text align for display
     * @param string $align
     * @return void
     */

    public function setTextAlign( $align ) {
        $this->font->align = $align;
    }

    /**
     * Set text transform for display
     * @param string $transform
     * @return void
     */

    public function setTextTransform( $transform ) {
        $this->font->transform = $transform;
    }


    /**
     * Set letter spacing for display
     * @param string $letter_spacing
     * @return void
     */

    public function setLetterSpacing( $letter_spacing ) {
        $this->font->letterSpacing = $letter_spacing;
    }

    /**
     * Set line height for display
     * @param string $line_height
     * @return void
     */

    public function setLineHeight( $line_height ) {
        $this->font->LineHeight = $line_height;
    }

    /**
     * Set font text decoration for display
     * @param boolean $decoration
     * @return void
     */

    public function setDecoration( $decoration ) {
        $this->font->decoration = $decoration;
    }

    /**
     * Activate Stroke
     * @param  boolean
     * @return void
     */

    public function setStroke( $value ) {
        $this->font->stroke = $value;
    }

    /**
     * Set font color
     * @param string $color
     * @return void
     */

    public function setStrokeColor( $color ) {
        $this->font->strokeColor = $color;
    }

    /**
     * Set the stroke width from default (1) to custom value
     * @param  boolean
     * @return void
     */

    public function setStrokeWidth( $value ) {
        $this->font->strokeWidth = $value;
    }

    /**
     * Activate Fill
     * @param  boolean
     * @return void
     */

    public function setFill( $fill ) {
        $this->font->fill = $fill;
    }

    /**
     * Create a clipPath
     * @param  boolean
     * @return void
     */

    public function setClipPath( $value ) {
        $this->font->clipPath = $value;
    }

    /**
     * set clipPathSize
     * @param  string
     * @return void
     */

    public function setClipPathSize( $value ) {
        $this->font->clipPathSize = $value;
    }


    /**
     * Custom CSS Output
     * @return string
     */

    public function dynamicCSS() {

        $css_attributes = array();

        if( $this->font->transform ) {
            $css_attributes['text-transform'] = $this->font->transform;
        }

        if( $this->font->letterSpacing ) {
            $css_attributes['letter-spacing'] = $this->font->letterSpacing . 'em' ;
        }

        $css_attributes = implode(' ', array_map(
            function ($v, $k) { return sprintf("%s:%s;", $k, $v); },
            $css_attributes,
            array_keys( $css_attributes )
        ) );

        ob_start(); ?>

            <style type="text/css">

                #<?php echo $this->font->id; ?> .ut-overlay-svg-text {
                    <?php echo $css_attributes; ?>
                }

            </style>

        <?php

        return ob_get_clean();


    }

    /**
     * Add a text to the SVG
     * @param string $text
     */

    public function addText( $text ) {

        // Font Attributes
        $attributes = array(
            // 'text-anchor' => 'middle',
            // 'dominant-baseline' => 'middle',
            'text-rendering' => 'geometricPrecision',
            'stroke-linecap' => 'round',
            'stroke-linejoin' => 'round',
            'vector-effect' => 'non-scaling-stroke'
        );

        if( $this->font->familiy ) {
            $attributes['font-family'] = $this->font->familiy;
        }

        if( $this->font->size ) {
            $attributes['font-size'] = $this->font->size;
        }

        if( $this->font->weight ) {
            $attributes['font-weight'] = $this->font->weight;
        }

        if( $this->font->variant ) {
            $attributes['font-variant'] = $this->font->variant;
        }

        if( $this->font->decoration ) {
            $attributes['text-decoration'] = 'underline';
        }

        if( $this->font->textAlign ) {
            $attributes['text-align'] = $this->font->textAlign;
        }

        if( $this->font->lineHeight ) {
            $attributes['line-height'] = $this->font->lineHeight . 'px' ;
        }

        // Create ClipPath ( for masking )
        if( $this->font->clipPath ) {

            $def = $this->svg->addChild('def');

            $clipPath = $def->addChild('clipPath');
            $clipPath->addAttribute('id', $this->font->id . '-clip');

            // add text
            $text = $clipPath->addChild('text', $text);

            // extra class
            $attributes['class'] = 'ut-overlay-clipPath-svg-text';

            // add attributes
            foreach ($attributes as $key => $value) {

                $text->addAttribute($key, $value);

            }

        }

        // Create Symbol ( for animation )
        $symbol = $this->svg->addChild('symbol');
        $symbol->addAttribute('id', $this->font->id);

        // add text
        $text = str_replace('—', '-', $text);
        $text = str_replace('–', '-', $text);
        $text = str_replace('-', '-', $text);

        $result_array = preg_split( "/[|:]/", $text );

        $text = $symbol->addChild('text' );

        $attributes['x'] = '0';
        $attributes['y'] = '0';


        foreach( $result_array as $key => $single_text ) {

            $tspan = $text->addChild('tspan', trim( $single_text ) );
            $tspan->addAttribute('class', "ut-tspan-" . ( $key + 1 ) );

            $tspan->addAttribute('x', "0");
            $tspan->addAttribute('dy', ( 1 + $key * 0.1). 'em');



        }

        // extra class  @todo option
        if( $this->font->id == 'qLoverlay-SVG-2' ) {
            $attributes['class'] = 'ut-overlay-svg-text';
        }

        // add attributes
        foreach( $attributes as $key=>$value ){
            $text->addAttribute($key, $value);
        }




        $g = $this->svg->addChild('g');

        $g->addAttribute('id', 'ut-stroke-offset-group');
        $g->addAttribute('class', 'ut-stroke-offset-group');

        for( $i = 0 ; $i < 1; $i++ ) {

            $use = $g->addChild('use');

            $attributes = array(
                'xlink:href' => '#' . $this->font->id,
                'class' => 'ut-stroke-offset-line'
            );

            if( $this->font->stroke ) {

                $attributes['fill'] = 'transparent';
                $attributes['stroke'] = $this->font->strokeColor;
                $attributes['vector-effect'] =  'non-scaling-stroke';

                if( $this->font->strokeWidth ) {

                    $attributes['stroke-width'] = $this->font->strokeWidth;

                }

            }

            if( $this->font->fill ) {

                $attributes['fill'] = $this->font->fill;

            }



            foreach ($attributes as $key => $value) {

                $use->addAttribute($key, $value);

            }

        }

    }

    /**
     * Return full SVG XML
     * @return string
     */

    public function asXML(){

        return $this->svg->asXML();

    }

    /**
     * Return full CSS String
     * @return string
     */

    public function svgCSS(){

        return $this->css;

    }

    /**
     * Return full JS String
     * @return string
     */

    public function svgJS(){

        return $this->js;

    }




}









/**
 * EasySVG - Generate SVG from PHP
 * @author Simon Tarchichi <kartsims@gmail.com>
 * @version 0.1b
 *
 * @see https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/transform
 * @see http://stackoverflow.com/questions/14684846/flattening-svg-matrix-transforms-in-inkscape
 * @see http://stackoverflow.com/questions/7742148/how-to-convert-text-to-svg-paths
 */

class UT_Easy_SVG {

    protected $font;
    protected $svg;

    public function __construct() {
        
		// default font data
        $this->font = new stdClass;
        $this->font->id = '';
        $this->font->horizAdvX = 0;
        $this->font->unitsPerEm = 0;
        $this->font->ascent = 0;
        $this->font->descent = 0;
        $this->font->glyphs = array();
        $this->font->size = 20;
        $this->font->color = null;
		$this->font->lineHeight = 1;
        $this->font->letterSpacing = 0;
		$this->font->stroke = false;
		$this->font->clipPath = false;
		$this->font->clipPathID = '';
		$this->font->strokeColor = null;
		$this->font->strokeWidth = 1;
		
        $this->clearSVG();
		
    }

    public function clearSVG() {
        
		$this->svg = new SimpleXMLElement('<svg></svg>');
        $this->svg->addAttribute('version', '1.1');
        $this->svg->addAttribute('xmlns', 'http://www.w3.org/2000/svg');
		
    }

    /**
     * Function takes UTF-8 encoded string and returns unicode number for every character.
     * @param  string $str
     * @return string
     */
    private function _utf8ToUnicode( $str ) {
        
		$unicode = array();
        $values = array();
        $lookingFor = 1;

        for ($i = 0; $i < strlen( $str ); $i++ ) {
            $thisValue = ord( $str[ $i ] );
            if ( $thisValue < 128 ) $unicode[] = $thisValue;
            else {
                if ( count( $values ) == 0 ) $lookingFor = ( $thisValue < 224 ) ? 2 : 3;
                $values[] = $thisValue;
                if ( count( $values ) == $lookingFor ) {
                    $number = ( $lookingFor == 3 ) ?
                        ( ( $values[0] % 16 ) * 4096 ) + ( ( $values[1] % 64 ) * 64 ) + ( $values[2] % 64 ):
                        ( ( $values[0] % 32 ) * 64 ) + ( $values[1] % 64 );

                    $unicode[] = $number;
                    $values = array();
                    $lookingFor = 1;
                }
            }
        }

        return $unicode;
		
    }

    /**
     * Set font params (short-hand method)
     * @param string $filepath
     * @param integer $size
     * @param string $color
     */
    public function setFont( $filepath, $size, $color = null ) {
        
		$this->setFontSVG($filepath);
        $this->setFontSize($size);
        if ($color) {
            $this->setFontColor($color);
        }
		
    }

    /**
     * Set font size for display
     * @param int $size
     * @return void
     */
    public function setFontSize( $size ) {
        $this->font->size = $size;
    }

    /**
     * Set font color
     * @param string $color
     * @return void
     */
    public function setFontColor( $color ) {
        $this->font->color = $color;
    }

    /**
     * Set the line height from default (1) to custom value
     * @param  float $value
     * @return void
     */
    public function setLineHeight( $value ) {
        $this->font->lineHeight = $value;
    }

    /**
     * Set the letter spacing from default (0) to custom value
     * @param  float $value
     * @return void
     */
    public function setLetterSpacing( $value ) {
        $this->font->letterSpacing = $value;
    }

    /**
     * Activate ClipPath
     * @param  bolean
     * @return void
     */
    public function setClipPath( $value ) {
        $this->font->clipPath = $value;
    }

    /**
     * Set ClipPathID
     * @param  string
     * @return void
     */
    public function setClipPathID( $value ) {
        $this->font->clipPathID = $value;
    }

	/**
     * Activate Stroke
     * @param  bolean
     * @return void
     */
    public function setStroke( $value ) {
        $this->font->stroke = $value;
    }
	
	/**
     * Set font color
     * @param string $color
     * @return void
     */
    public function setStrokeColor( $color ) {
        $this->font->strokeColor = $color;
    }
	
	/**
     * Set the stroke width from default (1) to custom value
     * @param  bolean
     * @return void
     */
    public function setStrokeWidth( $value ) {
        $this->font->strokeWidth = $value;
    }
	
    /**
     * Function takes path to SVG font (local path) and processes its xml
     * to get path representation of every character and additional
     * font parameters
     * @param  string $filepath
     * @return void
     */
    public function setFontSVG( $filepath ) {
        $this->font->glyphs = array();
        $z = new XMLReader;
        $z->open($filepath);

        // move to the first <product /> node
        while ($z->read()) {
            $name = $z->name;

            if ($z->nodeType == XMLReader::ELEMENT) {
                if ($name == 'font') {
                    $this->font->id = $z->getAttribute('id');
                    $this->font->horizAdvX = $z->getAttribute('horiz-adv-x');
                }

                if ($name == 'font-face') {
                    $this->font->unitsPerEm = $z->getAttribute('units-per-em');
                    $this->font->ascent = $z->getAttribute('ascent');
                    $this->font->descent = $z->getAttribute('descent');
                }

                if ($name == 'glyph') {
                    $unicode = $z->getAttribute('unicode');
                    $unicode = $this->_utf8ToUnicode($unicode);

                    if (isset($unicode[0])) {
                        $unicode = $unicode[0];

                        $this->font->glyphs[$unicode] = new stdClass();
                        $this->font->glyphs[$unicode]->horizAdvX = $z->getAttribute('horiz-adv-x');
                        if (empty($this->font->glyphs[$unicode]->horizAdvX)) {
                            $this->font->glyphs[$unicode]->horizAdvX = $this->font->horizAdvX;
                        }
                        $this->font->glyphs[$unicode]->d = $z->getAttribute('d');

                        // save em value for letter spacing (109 is unicode for the letter 'm')
                        if ($unicode == '109') {
                            $this->font->em = $this->font->glyphs[$unicode]->horizAdvX;
                        }
                    }
                }
            }
        }
    }

    /**
     * Add a clipPath to the SVG
     * @param string $def
     * @param array $attributes
     * @return SimpleXMLElement
     */
    public function addPath( $def, $attributes = array() ) {

        if( $this->font->clipPath ) {

            $defs = $this->svg->addChild('defs');

            $clipPath = $defs->addChild('clipPath');
            $clipPath->addAttribute( 'id', $this->font->clipPathID );

            // add path
            $path = $clipPath->addChild('path');

            foreach($attributes as $key=>$value){
                $path->addAttribute($key, $value);
            }

            $path->addAttribute('d', $def);
            return $path;

        }

		if( $this->font->stroke ) {

			$stroke = $this->svg->addChild('g');
			$stroke->addAttribute( 'stroke', $this->font->strokeColor );
			$stroke->addAttribute( 'stroke-width', $this->font->strokeWidth );


			// add path
			$path = $stroke->addChild('path');

		} else {

			$path = $this->svg->addChild('path');

		}
				
        foreach($attributes as $key=>$value){
            $path->addAttribute($key, $value);
        }
		
        $path->addAttribute('d', $def);
        return $path;
		
    }

    /**
     * Add a text to the SVG
     * @param string $def
     * @param float/string $x
     * @param float/string $y
     * @param array $attributes
     * @return SimpleXMLElement
     */
    public function addText($text, $x=0, $y=0, $attributes=array()) {
        $def = $this->textDef($text);

        if ($x === 'center' || $y === 'center') {
          list($textWidth, $textHeight) = $this->textDimensions($text);
        }

        // center horizontally
        if ($x === 'center') {
            if ($this->svg['width'] === NULL) {
                throw new Error('SVG width has to be set to center the text horizontally');
            }
            $x = (intval($this->svg['width']) - $textWidth) / 2;
        }

        // center vertically
        if ($y === 'center') {
            if ($this->svg['height'] === NULL) {
                throw new Error('SVG height has to be set to center the text vertically');
            }
            $y = (intval($this->svg['height']) - $textHeight) / 2;
        }

        if($x!=0 || $y!=0){
            $def = $this->defTranslate($def, $x, $y);
        }

        if($this->font->color) {
            $attributes['fill'] = $this->font->color;
        }

        return $this->addPath($def, $attributes);
    }


    /**
     * Function takes UTF-8 encoded string and size, returns xml for SVG paths representing this string.
     * @param string $text UTF-8 encoded text
     * @return string xml for text converted into SVG paths
     */
    public function textDef($text) {
        $def = array();

        $horizAdvX = 0;
        $horizAdvY = $this->font->ascent + $this->font->descent;
        $fontSize = floatval($this->font->size) / $this->font->unitsPerEm;
        $text = $this->_utf8ToUnicode($text);

        for($i = 0; $i < count($text); $i++) {

            $letter = $text[$i];

            //ignore this glyph instead of throwing an error if the font does not define it
            if(!array_key_exists($letter, $this->font->glyphs)){
                continue;
            }

            // line break support (10 is unicode for linebreak)
            if($letter==10){
                $horizAdvX = 0;
                $horizAdvY += $this->font->lineHeight * ( $this->font->ascent + $this->font->descent );
                continue;
            }

            // extract character definition
            $d = $this->font->glyphs[$letter]->d;

            // transform typo from original SVG format to straight display
            $d = $this->defScale($d, $fontSize, -$fontSize);
            $d = $this->defTranslate($d, $horizAdvX, $horizAdvY*$fontSize*2);

            $def[] = $d;

            // next letter's position
            $horizAdvX += $this->font->glyphs[$letter]->horizAdvX * $fontSize + $this->font->em * $this->font->letterSpacing * $fontSize;
        }
        return implode(' ', $def);
    }


    /**
     * Function takes UTF-8 encoded string and size, returns width and height of the whole text
     * @param string $text UTF-8 encoded text
     * @return array ($width, $height)
     */
    public function textDimensions($text) {
        $def = array();

        $fontSize = floatval($this->font->size) / $this->font->unitsPerEm;
        $text = $this->_utf8ToUnicode($text);

        $lineWidth = 0;
        $lineHeight = ( $this->font->ascent + $this->font->descent ) * $fontSize * 2;

        $width = 0;
        $height = $lineHeight;

        for($i = 0; $i < count($text); $i++) {

            $letter = $text[$i];

            //ignore this glyph instead of throwing an error if the font does not define it
            if(!array_key_exists($letter, $this->font->glyphs)){
                continue;
            }

            // line break support (10 is unicode for linebreak)
            if($letter==10){
                $width = $lineWidth>$width ? $lineWidth : $width;
                $height += $lineHeight * $this->font->lineHeight;
                $lineWidth = 0;
                continue;
            }

            $lineWidth += $this->font->glyphs[$letter]->horizAdvX * $fontSize + $this->font->em * $this->font->letterSpacing * $fontSize;
        }

        // only keep the widest line's width
        $width = $lineWidth>$width ? $lineWidth : $width;

        return array($width, $height);
    }


    /**
     * Function takes unicode character and returns the UTF-8 equivalent
     * @param  string $str
     * @return string
     */
    public function unicodeDef( $unicode ) {

        $horizAdvY = $this->font->ascent + $this->font->descent;
        $fontSize =  floatval($this->font->size) / $this->font->unitsPerEm;

        // extract character definition
        $d = $this->font->glyphs[hexdec($unicode)]->d;

        // transform typo from original SVG format to straight display
        $d = $this->defScale($d, $fontSize, -$fontSize);
        $d = $this->defTranslate($d, 0, $horizAdvY*$fontSize*2);

        return $d;
    }

    /**
     * Returns the character width, as set in the font file
     * @param  string  $str
     * @param  boolean $is_unicode
     * @return float
     */
    public function characterWidth( $char, $is_unicode = false ) {
        if ($is_unicode){
            $letter = hexdec($char);
        }
        else {
            $letter = $this->_utf8ToUnicode($char);
        }

        if (!isset($this->font->glyphs[$letter]))
            return NULL;

        $fontSize = floatval($this->font->size) / $this->font->unitsPerEm;
        return $this->font->glyphs[$letter]->horizAdvX * $fontSize;
    }


    /**
     * Applies a translate transformation to definition
     * @param  string  $def definition
     * @param  float $x
     * @param  float $y
     * @return string
     */
    public function defTranslate($def, $x=0, $y=0){
        return $this->defApplyMatrix($def, array(1, 0, 0, 1, $x, $y));
    }

    /**
     * Applies a translate transformation to definition
     * @param  string  $def    Definition
     * @param  integer $angle  Rotation angle (degrees)
     * @param  integer $x      X coordinate of rotation center
     * @param  integer $y      Y coordinate of rotation center
     * @return string
     */
    public function defRotate($def, $angle, $x=0, $y=0){
        if($x==0 && $y==0){
            $angle = deg2rad($angle);
            return $this->defApplyMatrix($def, array(cos($angle), sin($angle), -sin($angle), cos($angle), 0, 0));
        }

        // rotate by a given point
        $def = $this->defTranslate($def, $x, $y);
        $def = $this->defRotate($def, $angle);
        $def = $this->defTranslate($def, -$x, -$y);
        return $def;
    }

    /**
     * Applies a scale transformation to definition
     * @param  string  $def definition
     * @param  integer $x
     * @param  integer $y
     * @return string
     */
    public function defScale($def, $x=1, $y=1){
        return $this->defApplyMatrix($def, array($x, 0, 0, $y, 0, 0));
    }

    /**
     * Calculates the new definition with the matrix applied
     * @param  string $def
     * @param  array  $matrix
     * @return string
     */
    public function defApplyMatrix($def, $matrix){

        // if there are several shapes in this definition, do the operation for each
        preg_match_all('/M[^zZ]*[zZ]/', $def, $shapes);
        $shapes = $shapes[0];
        if(count($shapes)>1){
            foreach($shapes as &$shape)
                $shape = $this->defApplyMatrix($shape, $matrix);
            return implode(' ', $shapes);
        }

        preg_match_all('/[a-zA-Z]+[^a-zA-Z]*/', $def, $instructions);
        $instructions = $instructions[0];

        $return = '';
        foreach($instructions as &$instruction){
            $i = preg_replace('/[^a-zA-Z]*/', '', $instruction);
            preg_match_all('/\-?[0-9\.]+/', $instruction, $coords);
            $coords = $coords[0];

            if(empty($coords)){
                continue;
            }

            $new_coords = array();
            while(count($coords)>0){

                // do the matrix calculation stuff
                list($a, $b, $c, $d, $e, $f) = $matrix;

                // exception for relative instruction
                if( preg_match('/[a-z]/', $i) ){
                    $e = 0;
                    $f = 0;
                }

                // convert horizontal lineto (relative)
                if( $i=='h' ){
                    $i = 'l';
                    $x = floatval( array_shift($coords) );
                    $y = 0;

                    // add new point's coordinates
                    $current_point = array(
                        $a*$x + $c*$y + $e,
                        $b*$x + $d*$y + $f,
                    );
                    $new_coords = array_merge($new_coords, $current_point);
                }

                // convert vertical lineto (relative)
                elseif( $i=='v' ){
                    $i = 'l';
                    $x = 0;
                    $y = floatval( array_shift($coords) );

                    // add new point's coordinates
                    $current_point = array(
                        $a*$x + $c*$y + $e,
                        $b*$x + $d*$y + $f,
                    );
                    $new_coords = array_merge($new_coords, $current_point);
                }

                // convert quadratic bezier curve (relative)
                elseif( $i=='q' ){
                    $x = floatval( array_shift($coords) );
                    $y = floatval( array_shift($coords) );

                    // add new point's coordinates
                    $current_point = array(
                        $a*$x + $c*$y + $e,
                        $b*$x + $d*$y + $f,
                    );
                    $new_coords = array_merge($new_coords, $current_point);

                    // same for 2nd point
                    $x = floatval( array_shift($coords) );
                    $y = floatval( array_shift($coords) );

                    // add new point's coordinates
                    $current_point = array(
                        $a*$x + $c*$y + $e,
                        $b*$x + $d*$y + $f,
                    );
                    $new_coords = array_merge($new_coords, $current_point);
                }

                // every other commands
                // @TODO: handle 'a,c,s' (elliptic arc curve) commands
                // cf. http://www.w3.org/TR/SVG/paths.html#PathDataCurveCommands
                else{
                    $x = floatval( array_shift($coords) );
                    $y = floatval( array_shift($coords) );

                    // add new point's coordinates
                    $current_point = array(
                        $a*$x + $c*$y + $e,
                        $b*$x + $d*$y + $f,
                    );
                    $new_coords = array_merge($new_coords, $current_point);
                }


            }

            $instruction = $i . implode(',', $new_coords);

            // remove useless commas
            $instruction = preg_replace('/,\-/','-', $instruction);
        }

        return implode('', $instructions);
    }



    /**
     *
     * Short-hand methods
     *
     */


    /**
     * Return full SVG XML
     * @return string
     */
    public function asXML(){
        return $this->svg->asXML();
    }

    /**
     * Adds an attribute to the SVG
     * @param string $key
     * @param string $value
     *
     * @return
     */
    public function addAttribute($key, $value){
        return $this->svg->addAttribute($key, $value);
    }

}
