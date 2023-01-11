<?php

class OhioExtraAdobeFonts {

    static public function get_abobe_fonts_array()
    {
        $adobefonts_fonts = OhioOptions::get_global( 'adobekit_fonts' );
        $fonts_array = [];

        if (!empty($adobefonts_fonts)) {
            foreach ($adobefonts_fonts as $font) {
                if (!empty($font['font_family']) && !empty($font['font_styles'])) {
                    $fonts_array[] = [
                        'font_family' => $font['font_family'],
                        'font_styles' => implode( ',', $font['font_styles'] )
                    ];
                }
            }
        }

        return json_decode(json_encode($fonts_array));
    }

}