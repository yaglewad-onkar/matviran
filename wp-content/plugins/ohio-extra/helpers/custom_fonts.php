<?php

class OhioExtraOwnFonts {

    /**
     * Gets and prepare custom fonts object
     */
    static public function get_custom_fonts_array()
    {
        $custom_fonts = OhioOptions::get_global( 'manual_custom_fonts' );
        $fonts_array = [];

        if (!empty($custom_fonts)) {
            foreach ($custom_fonts as $font) {
                if ( !empty( $font['font_name'] ) ) {
                    $key = $font['font_name'];

                    // Create if doesn't exists
                    if ( !isset( $fonts_array[$key] ) ) {
                        $fonts_array[$key] = [
                            'font_family' => $font['font_name'],
                            'font_styles' => []
                        ];
                    }

                    // Add styles, if unique
                    $_weight = isset($font['font_weight']) ? $font['font_weight'] : 400;
                    $_style = isset($font['font_style']) ? $font['font_style'] : '';
                    $style = $_weight . $_style;
                    if ( !in_array( $style, $fonts_array[$key]['font_styles'] ) ) {
                        $fonts_array[$key]['font_styles'][] = $style;
                    }
                }
            }
        }

        // Map styles array to separated string
        $fonts_array = array_map(function($v) {
            $v['font_styles'] = implode(',', $v['font_styles']);
            return $v;
        }, $fonts_array);

        // Double JSON convertation as fast array-to-object trick
        return json_decode(json_encode($fonts_array));
    }

}