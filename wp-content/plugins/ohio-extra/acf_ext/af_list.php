<?php

$adobefonts_fonts = OhioOptions::get_global( 'adobekit_fonts' );
$ohio_gf_list = '{"items": [';
    if (!empty($adobefonts_fonts) && is_array($adobefonts_fonts)) { $i = 0;
        foreach ($adobefonts_fonts as $adobefonts_font) { $i++;
            $ohio_gf_list .= '
            {
                "family": "'.$adobefonts_font['font_family'].'",
                "variants": [ ';
                    if (!empty($adobefonts_font['font_styles']) && is_array($adobefonts_font['font_styles'])) {
                        $j = 0;
                        foreach ($adobefonts_font['font_styles'] as $font_style) { $j++;
                            $ohio_gf_list .= '"'.$font_style.'"';
                            if ($j != count($adobefonts_font['font_styles'])) {
                                $ohio_gf_list .= ',';
                            }

                        }
                    }
                $ohio_gf_list .= ' ],
                "subsets": [ "latin" ]
            }';
            if ($i != count($adobefonts_fonts)) {
                $ohio_gf_list .= ',';
            }
        }
    }
$ohio_gf_list .= ']}';


$ohio_gf_object = json_decode( $ohio_gf_list );

