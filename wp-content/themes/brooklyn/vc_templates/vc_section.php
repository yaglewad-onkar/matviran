<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

global $section_is_contact_section;

/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $full_width
 * @var $full_height
 * @var $columns_placement
 * @var $content_placement
 * @var $parallax
 * @var $parallax_image
 * @var $css
 * @var $el_id
 * @var $video_bg
 * @var $video_bg_url
 * @var $video_bg_parallax
 * @var $parallax_speed_video
 * @var $content - shortcode content
 * @var $css_animation
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Row
 */

$el_class = $full_height = $hide_on_desktop = $hide_on_tablet = $hide_on_mobile = $full_width = $flex_row = $columns_placement = $content_placement = $css = $el_id = $video_bg = $video_bg_url = $css_animation = '';
$disable_element = $output = $after_output = $video_background = '';
$gradient_background = $gradient_overlay_background = $needs_side_nav_spacing = false;
$animate_background_position = $background_position = $background_position_x = $background_position_y = $background_position_x_medium = $background_position_y_medium = $background_position_x_tablet = $background_position_y_tablet = $background_position_x_mobile = $background_position_y_mobile = '';

$section_separator_top = $section_separator_bottom = false;
$section_separator_svg_top = $section_separator_svg_bottom = 'design_wave';
$automatic_spacing_suppress_fill = 'off';

$distortion = $background_distortion_1 = $background_distortion_2 = $distortion_ease = $distortion_speed_in = $distortion_speed_out = $distortion_intensity = '';
$distortion_effect = 1;
$glitch_effect = '';

$overflow_visible = $overflow_visible_tablet = $overflow_visible_mobile = '';

// parallax vars
$parallax_speed_video = ''; //@todo
$video_bg_parallax = ''; //@todo

$parallax = '';
$parallax_image = !empty( $atts['parallax_image'] ) ? $atts['parallax_image'] : ''; // fallback value
$parallax_speed = 1;
$parallax_zoom_factor = 1.3;
$parallax_threshold = !empty( $atts['parallax_threshold'] ) ? $atts['parallax_threshold'] : '0'; // fallback value

$cursor_skin = '';

// extract shortcode attributes
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

// disabled section
if ( 'yes' === $disable_element ) {
	
    if ( vc_is_page_editable() ) {
        
		$css_classes[] = 'vc_hidden-lg vc_hidden-xs vc_hidden-sm vc_hidden-md';
        
	} else {
		
        return ''; // do not return anything
        
	}
    
}


// real responsive 
if( unite_mobile_detection()->isTablet() && $hide_on_tablet ) {
    return ''; // do not return anything
} 

if( unite_mobile_detection()->isMobile() && !unite_mobile_detection()->isTablet() && $hide_on_mobile ) {
    return ''; // do not return anything
}

// setup classes array
$el_class = $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );

$css_classes = array( 'vc_section', $el_class );    

if( !is_singular("post") && !is_singular("product") || $section_is_contact_section ) {
    
    if( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
    
        $css_classes[] = 'ut-vc-80';
        
    } else {
        
        $css_classes[] = 'ut-vc-' . ot_get_option( 'ut_section_spacing_system' , '120' );
        
    }
    
}

// force 80 system for single posts
if( is_singular("post") && !$section_is_contact_section || is_singular("product") ) {
	$css_classes[] = 'ut-vc-80';
}

if( $automatic_spacing_suppress_fill == 'off' && ( vc_shortcode_custom_css_has_property( $css, array( 'border', 'background', 'background-image', 'background-color' ), true ) || $video_bg || $parallax || $bklyn_overlay || $section_separator_top || $section_separator_bottom || $distortion ) ) {
    
    $css_classes[] = 'vc_section-has-fill';    
    
} else {
    
    $css_classes[] = 'vc_section-has-no-fill';    
    
}

if( $distortion ) {
	
	$css_classes[] = 'ut-background-with-distortion-effect';
	
}


// unique ID for this section
$has_custom_ID = false;

if ( empty( $el_id ) ) {
    
    $el_id = uniqid("ut-section-");
    
} else {
    
    $has_custom_ID = true;
    
}

// setup wrapper attributes array 
$wrapper_attributes   = array();
$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';

if ( ! empty( $full_width ) ) {
	
    $wrapper_attributes[] = 'data-vc-full-width="true"';
	$wrapper_attributes[] = 'data-vc-full-width-init="false"';
	
    if ( 'stretch_row_content' === $full_width ) {
        
		$wrapper_attributes[] = 'data-vc-stretch-content="true"';
        $needs_side_nav_spacing = true;
        
	}
    
	$after_output .= '<div class="vc_row-full-width vc_clearfix"></div>';
    
}

if ( ! empty( $full_height ) && $full_height == 'yes' ) {

	$css_classes[] = 'vc_row-o-full-height';

} elseif( ! empty( $full_height ) && $full_height != 'yes' ) {

	$css_classes[] = 'vc_section-height-' . $full_height;

}


if ( ! empty( $content_placement ) ) {
    $flex_row = true;
	$css_classes[] = 'vc_section-o-content-' . $content_placement;
}

if ( $flex_row ) {
	$css_classes[] = 'vc_section-flex';    
}


/**
 * Custom CSS
 */

$custom_css_style = '';
$section_custom_class = uniqid("ut-section-");

// push class into section class array
$css_classes[] = $section_custom_class;

// create settings array
if( !empty( $atts['css'] ) && ut_vc_css_to_array( $atts['css'] ) ) {
    
    $vc_css = ut_vc_css_to_array( $atts['css'] );

    // extra css
    $vc_css_medium = array();
    $vc_css_tablet = array();
    $vc_css_mobile = array();

	if( !$parallax ) { 
	
		if( isset( $vc_css["background-color"] ) ) {

			if( function_exists("ut_create_gradient_css") && ut_create_gradient_css( $vc_css["background-color"] ) ) {

				// add background image
				$custom_css_style .= ut_create_gradient_css( $vc_css["background-color"], '.' . $section_custom_class ); 

				// remove vc background color
				$vc_css = ut_clean_up_vc_css_array( $vc_css, 'background-color' );

			}         

		}

		// background with gradient and background image
		if( isset( $vc_css["background"] ) ) {

			if( function_exists("ut_create_gradient_css") && ut_create_gradient_css( $vc_css["background"] ) ) {

				// add background image
				$custom_css_style .= ut_create_gradient_css( $vc_css["background"], '.' . $section_custom_class, false, 'background' ); 

				// remove vc background
				unset( $vc_css['background'] );

			}         

		}    

		// remove image on mobile devices
		if( unite_mobile_detection()->isMobile() && $hide_bg_mobile ) {
			unset( $vc_css['background-image'] );
		}

		// remove image on tablet devices
		if( unite_mobile_detection()->isTablet() && $hide_bg_tablet ) {
			unset( $vc_css['background-image'] );
		}

        // custom background position
        if( $background_position ) {

            if( $background_position != 'custom' ) {

                $vc_css['background-position'] = $background_position . ' !important;';

            } else {

                $vc_css['background-position'] = $background_position_x . ' ' . $background_position_y . ' !important;';

            }

        }

        // custom background position medium desktop
        if( $background_position == 'custom' && $background_position_x_medium && $background_position_y_medium ) {

            $vc_css_medium['background-position'] = $background_position_x_medium . ' ' . $background_position_y_medium . ' !important;';

        }

        // custom background position tablet
        if( $background_position == 'custom' && $background_position_x_tablet && $background_position_y_tablet ) {

            $vc_css_tablet['background-position'] = $background_position_x_tablet . ' ' . $background_position_y_tablet . ' !important;';

        }

        // custom background position mobile
        if( $background_position == 'custom' && $background_position_x_mobile && $background_position_y_mobile ) {

            $vc_css_mobile['background-position'] = $background_position_x_mobile . ' ' . $background_position_y_mobile . ' !important;';

        }

		// custom background attachment
		if( $background_attachment && !$parallax ) {
			$vc_css['background-attachment'] = $background_attachment . '!important;';
		}

        // remove background position if
        if( $animate_background_position == 'on' ) {

            unset( $vc_css['background-position'] );        // will be animated
            unset( $vc_css_medium['background-position'] ); // will be animated
            unset( $vc_css_tablet['background-position'] ); // will be animated
            unset( $vc_css_mobile['background-position'] ); // will be animated

            if( isset( $vc_css['background-size'] ) && strpos( $vc_css['background-size'], 'cover' ) !== false ) {

                unset( $vc_css['background-size'] );

            }

        }

		if( !empty( $vc_css['background-image'] ) ) {

		    $css_classes[]        = 'ut-background-lozad';
			// $wrapper_attributes[] = UT_Adaptive_Image::create_background( ut_extract_custom_css_property( $css, 'background-image', true ) );
            $wrapper_attributes[] = 'data-background-image="' . ut_extract_custom_css_property( $css, 'background-image', true ) . '"';

            unset( $vc_css['background-image'] );

        }

		// re-assemble custom css
		$custom_css_style .= '#' . $el_id . '{' . implode_with_key( $vc_css ) . '}';

        if( !empty( $vc_css_medium ) ) {

            $custom_css_style .= '@media (min-width: 1025px) and (max-width: 1600px) { #' . $el_id . '{' . implode_with_key( $vc_css_medium ) . '} }';

        }

        if( !empty( $vc_css_tablet ) ) {

            $custom_css_style .= '@media (min-width: 768px) and (max-width: 1024px) { #' . $el_id . '{' . implode_with_key( $vc_css_tablet ) . '} }';

        }

        if( !empty( $vc_css_mobile ) ) {

            $custom_css_style .= '@media (max-width: 767px) { #' . $el_id . '{' . implode_with_key( $vc_css_mobile ) . '} }';

        }
    
	} else {
		
		// remove some attributes which are covered by the parallax container
		$current_vc_css = $vc_css;
		
		unset( $current_vc_css['background'] );
		unset( $current_vc_css['background-image'] );
		unset( $current_vc_css['background-position'] );
		unset( $current_vc_css['background-repeat'] );
		unset( $current_vc_css['background-size'] );
		
		$custom_css_style .= '#' . $el_id . '{' . implode_with_key( $current_vc_css ) . '}';
		
	}
		
}


/**
 * Overlay Settings
 */

$overlay_style_id = uniqid("ut-section-overlay-");
$overlay_effect_id = uniqid("ut-section-overlay-effect-");
    
if( $bklyn_overlay && $bklyn_overlay_color ) {
    
    if( function_exists("ut_create_gradient_css") && ut_create_gradient_css( $bklyn_overlay_color ) ) {
        
        $custom_css_style .= ut_create_gradient_css( $bklyn_overlay_color, '#' . $overlay_style_id, ( $bklyn_overlay_pattern ? $bklyn_overlay_pattern_style : false ) );   
        $gradient_overlay_background = true;
        
    } else {
        
        $custom_css_style .= '#' . $overlay_style_id . '{ background-color: ' . $bklyn_overlay_color . ';}';
        
    }
    
}

if( $bklyn_overlay_pattern && !$gradient_overlay_background && 'bklyn-custom-pattern' == $bklyn_overlay_pattern_style && !empty( $bklyn_overlay_custom_pattern ) ) {
    
    $bklyn_overlay_custom_pattern = wp_get_attachment_url( $bklyn_overlay_custom_pattern );        
    $custom_css_style .= '#' . $overlay_style_id . '{ background-image: url( ' . esc_url( $bklyn_overlay_custom_pattern ) . '); }'; 
    
} 

if( $bklyn_overlay ) {
    
    /* add parent css class */
    $css_classes[] = 'bklyn-section-with-overlay';
    
}

if( $bklyn_overlay_effect ) {

    /* add parent css class */
    $css_classes[] = 'bklyn-section-with-overlay-effect';
	
	// $effect config
	$overlay_effect_config = ut_create_overlay_effect_settings( $atts );	
	
}


if( $section_separator_top || $section_separator_bottom ) {
    
    /* add parent css class */
    $css_classes[] = 'bklyn-section-with-separator';
	
	if( isset( $section_separator_top_hide_on_tablet ) && $section_separator_top_hide_on_tablet == 'true' || isset( $section_separator_bottom_hide_on_tablet ) && $section_separator_bottom_hide_on_tablet == 'true' ) {
		$css_classes[] = 'bklyn-section-separator-tablet-off';	
	}
	
	if( isset( $section_separator_top_hide_on_mobile ) && $section_separator_top_hide_on_mobile == 'true' || isset( $section_separator_bottom_hide_on_mobile ) && $section_separator_bottom_hide_on_mobile == 'true' ) {
		$css_classes[] = 'bklyn-section-separator-mobile-off';		
	}
    
}

/**
 * Parallax Background
 */

$parallax_css_style = '';

$parallax_speed_values = array(
    1  => 10,
    2  => 9,
    3  => 8,
    4  => 7,
    5  => 6,
    6  => 5,
    7  => 4,
    8  => 3,
    9  => 2,
    10 => 1
);

$parallax_id = uniqid("ut-parallax-");
$parallax_image_src = '';

if( $parallax ) {

    $parallax_image_src = ut_extract_custom_css_property( $css, 'background-image', true );

    if( empty( $parallax_image_src ) ) {

        $parallax_image_src = ut_extract_custom_css_property( $css, 'background', true );

        if( !empty( $parallax_image_src ) ) {

            $_parallax_image_src = wp_extract_urls( $parallax_image_src );

            if( !empty( $_parallax_image_src[0] ) ) {

                $parallax_image_src = $_parallax_image_src[0];

            }

        }


    }

	// check for background size
	if( $background_size = ut_extract_custom_css_property( $css, 'background-size', true ) ) {

		$parallax_css_style .= '#' . $parallax_id . '{' . $background_size . '}';

		if( preg_match('/\\d/', $background_size) ) {

			$parallax_css_style .= '#' . $parallax_id . '{ background-repeat: no-repeat !important; }';

		}

	}

    // check for background positions
    if( $background_position ) {

        if( $background_position != 'custom' ) {

            $parallax_css_style .= '#' . $parallax_id . ' { background-position: ' . $background_position . '; }';

        } else {

            $parallax_css_style .= '#' . $parallax_id . ' { background-position: ' . $background_position_x . ' ' . $background_position_y . ' !important; }';

        }

    }

    // custom background position medium desktop
    if( $background_position == 'custom' && $background_position_x_medium && $background_position_y_medium ) {

        $background_css_style = '#' . $parallax_id . ' { background-position: ' . $background_position_x_medium . ' ' . $background_position_y_medium . ' !important; }';
        $parallax_css_style .= '@media (min-width: 1025px) and (max-width: 1600px) { ' . $background_css_style . ' }';

    }

    // custom background position tablet
    if( $background_position == 'custom' && $background_position_x_tablet && $background_position_y_tablet ) {

        $background_css_style = '#' . $parallax_id . ' { background-position: ' . $background_position_x_tablet . ' ' . $background_position_y_tablet . ' !important; }';
        $parallax_css_style .= '@media (min-width: 768px) and (max-width: 1024px) { ' . $background_css_style . ' }';

    }

    // custom background position mobile
    if( $background_position == 'custom' && $background_position_x_mobile && $background_position_y_mobile ) {

        $background_css_style = '#' . $parallax_id . ' { background-position: ' . $background_position_x_mobile . ' ' . $background_position_y_mobile . ' !important; }';
        $parallax_css_style .= '@media (max-width: 767px) { ' . $background_css_style . ' }';

    }

    // one time fallback to avoid empty output
    if( $parallax_image && empty( $parallax_image_src ) ) {

        $parallax_image_src = wp_get_attachment_image_url( $parallax_image, 'full' );

    }
    
    // no background image - check for gradient
    if( empty( $parallax_image_src ) && !empty( $atts['css'] ) && ut_vc_css_to_array( $atts['css'] ) ) {
    
        $vc_css = ut_vc_css_to_array( $atts['css'] );

        if( isset( $vc_css["background-color"] ) ) {

            if( function_exists("ut_create_gradient_css") && ut_create_gradient_css( $vc_css["background-color"] ) ) {

                // add background image
                $parallax_css_style .= ut_create_gradient_css( $vc_css["background-color"], '#' . $parallax_id ); 

            }         

        }
    
    }
    
    $css_classes[] = 'ut-parallax-section';
        
} 


/**
 * Section Background Video
*/

$has_video_bg = ( ! empty( $video_bg ) && ! empty( $video_bg_url ) );

if ( $has_video_bg ) {
    
    if( class_exists('UT_Section_Video_player') ) {
        
        if( ut_video_is_vimeo( $video_bg_url ) ) {
            
            $video = new UT_Section_Video_player();
            
            $containment = $parallax ? '#' . $parallax_id : '#' . $el_id;
            
            $video_background = $video::handle_shortcode( array(
                'id'            => uniqid("ut-section-video"),
                'section'       => $containment,   
                'source'        => 'vimeo',
                'video_vimeo'   => esc_url( $video_bg_url ),
	            'volume'        => 0
            ) );
            
            $css_classes[]    = 'ut-video-section';
            
        }
        
        if( ut_video_is_youtube( $video_bg_url ) ) {
            
            $video = new UT_Section_Video_player();
            
            $containment = $parallax ? '#' . $el_id . ' .parallax-scroll-container' : '#' . $el_id;
            
            $video_background = $video::handle_shortcode( array(
                'id'            => uniqid("ut-section-video"),
                'section'       => $containment,   
                'source'        => 'youtube',
                'video'         => esc_url( $video_bg_url ),
            ) );
            
            $css_classes[]    = 'ut-video-section';
            
        }        
    
    }
    
}


/**
 * Overflow Visible
 */

if( $overflow_visible )  {
    $css_classes[] = 'ut-overflow-visible';
}

if( $overflow_visible_tablet )  {
    $css_classes[] = 'ut-overflow-visible-tablet';
}

if( $overflow_visible_mobile )  {
    $css_classes[] = 'ut-overflow-visible-mobile';
}

/**
 * Responsive Settings
 */

if( $hide_on_desktop ) {
    $css_classes[] = 'hide-on-desktop';
}

if( $hide_on_tablet ) {
    $css_classes[] = 'hide-on-tablet';
}

if( $hide_on_mobile ) {
    $css_classes[] = 'hide-on-mobile';
}

if( $hide_bg_medium ) {
    $css_classes[] = 'hide-bg-on-medium';
}

if( $hide_bg_tablet ) {
    $css_classes[] = 'hide-bg-on-tablet';
}

if( $hide_bg_mobile ) {
    $css_classes[] = 'hide-bg-on-mobile';
}

if( !empty( $bklyn_section_anchor_id ) && !$has_custom_ID ) { 
    
    $css_classes[] = 'ut-section-with-linking';
    
}

/**
 * Glitch Effect
 */

if( $glitch_effect && $glitch_effect != 'none' || $glitch_transparent && $glitch_transparent == 'on' ) {

    $glitch_settings = array(
        'glitch_effect'             => $glitch_effect,
        'image_desktop'             => ut_extract_custom_css_property( $css, 'background-image', true ),
        'image_desktop_position'    => $background_position,
        'image_tablet_position'     => $background_position,
        'image_mobile_position'     => $background_position,
        'permanent_glitch'          => $permanent_glitch,
        'accent_1'                  => $accent_1,
        'accent_2'                  => $accent_2,
        'accent_3'                  => $accent_3,
        'glitch_transparent'        => $glitch_transparent,
        'glitch_effect_transparent' => $glitch_effect_transparent,
        'skip_first_layer'          => !empty( $distortion )
    );

    if( $background_position == 'custom' ) {

        $glitch_settings['image_desktop_position'] .= $background_position_x . ' ' . $background_position_y;

    }

    if( $background_position == 'custom' && $background_position_x_tablet && $background_position_y_tablet ) {

        $glitch_settings['image_tablet_position'] = $background_position_x_tablet . ' ' . $background_position_y_tablet;

    }

    if( $background_position == 'custom' && $background_position_x_mobile && $background_position_y_mobile ) {

        $glitch_settings['image_mobile_position'] = $background_position_x_mobile . ' ' . $background_position_y_mobile;

    }

    $glitch = new UT_Glitch_Effect( $glitch_settings );

    $css_classes[] = 'ut-has-element-glitch';

} else {

    $glitch_effect = false;

}



/**
 * Design and Custom CSS
 */
$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( array_unique( $css_classes ) ) ), $this->settings['base'], $atts ) );

// attributes
$wrapper_attributes[] = 'data-cursor-skin="' . esc_attr( $cursor_skin ) . '"';
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';

/**
 * Section Output
 */

$output .= '<section ' . implode( ' ', $wrapper_attributes ) . '>';

// hidden anchor for menu links
if( !empty( $bklyn_section_anchor_id ) ) { 
    
    $output .= '<a id="section-' . ut_create_slug( $bklyn_section_anchor_id ) .'" data-id="section-' . ut_create_slug( $bklyn_section_anchor_id ) .'" class="ut-vc-offset-anchor-top" name="section-' . ut_create_slug( $bklyn_section_anchor_id ) .'">' . $bklyn_section_anchor_id .'</a>';
    
}

// attach video backrgound markup and script
$output .= $video_background;

// parallax scroll container
if( $parallax ) {

    $attributes = array(
        'data-parallax-factor' => esc_attr( $parallax_speed_values[$parallax_speed] ),
        'data-background-image' => esc_url( $parallax_image_src ),
        'class' => 'parallax-scroll-container parallax-scroll-container-hide ut-background-lozad'
    );

    if( $parallax == 'content-zoom' ) {

        $attributes['data-parallax-scale'] = esc_attr( $parallax_zoom_factor );

    }

    if( $parallax == 'content-zoom-moving' ) {

        $attributes['data-parallax-scale-move'] = esc_attr( $parallax_zoom_factor );

    }

    $attributes = implode(' ', array_map(
        function ($v, $k) { return sprintf("%s=\"%s\"", $k, $v); },
        $attributes,
        array_keys( $attributes )
    ) );

	$output .= '<div id="' . esc_attr( $parallax_id ) . '" ' . $attributes . '>';
		
		// Background Distortion
		if( $distortion && $parallax ) {

			// Start Class
			$distortion = new UT_Distortion_Background( $atts );

			// Set Images
			$distortion->set_default_image( $background_distortion_1 );
			$distortion->set_hover_image( $background_distortion_2 );

			// Set Effect
			$distortion->set_effect( $distortion_effect );

			$output .= $distortion->html();

		}

        // Glitch Effect
        if( $glitch_effect ) {

            $output .= $glitch->render();

        }

	$output .= '</div>';
	
}

// Background Distortion
if( $distortion && !$parallax ) {
	
	// Start Class
	$distortion = new UT_Distortion_Background( $atts );
	
	// Set Images
	$distortion->set_default_image( $background_distortion_1 );
	$distortion->set_hover_image( $background_distortion_2 );
		
	// Set Effect
	$distortion->set_effect( $distortion_effect );
	
	$output .= $distortion->html();
	
}

// Glitch Effect
if( $glitch_effect && !$parallax ) {

    $output .= $glitch->render();

}

// section overlay
if( $bklyn_overlay ) {
    
	$output .= '<div id="' . $overlay_style_id . '" class="bklyn-overlay ' . ( $bklyn_overlay_pattern ? $bklyn_overlay_pattern_style : '' ) . '"></div>';

}

// particle effect
if( $bklyn_overlay_effect ) {

    $output .= '<div id="' . $overlay_effect_id . '" class="bklyn-overlay-effect" data-effect-config=\'' . json_encode( $overlay_effect_config ) . '\'></div>';

}

// section separator top
if( $section_separator_top ) {
    $output .= ut_create_section_separator( 'section', 'top', $section_separator_svg_top, $atts );
}

// section separator bottom
if( $section_separator_bottom ) {
    $output .= ut_create_section_separator( 'section', 'bottom', $section_separator_svg_bottom, $atts );
}

// extra container if navigation and header are located to the left
if( function_exists('ut_return_header_config') && ut_return_header_config( 'ut_header_layout', 'default' ) == 'side' && $needs_side_nav_spacing ) {
    $output .= '<div class="vc-sidenav-column-container-wrap">';
}

// section content
$output .= wpb_js_remove_wpautop( $content );

// extra container if navigation and header are located to the left
if( function_exists('ut_return_header_config') && ut_return_header_config( 'ut_header_layout', 'default' ) == 'side' && $needs_side_nav_spacing ) {
    $output .= '</div>';
}    

// hidden anchor for menu links
if( !empty( $bklyn_section_anchor_id ) || empty( $bklyn_section_anchor_id ) && $has_custom_ID ) {    
    
    if( empty( $bklyn_section_anchor_id ) && $has_custom_ID ) {
        
        $output .= '<a data-id="' . $el_id .'" class="ut-vc-offset-anchor-bottom" name="section-' . $el_id .'">' . $el_id .'</a>';
        
    } else {
    
        $output .= '<a data-id="section-' . ut_create_slug( $bklyn_section_anchor_id ) .'" class="ut-vc-offset-anchor-bottom" name="section-' . ut_create_slug( $bklyn_section_anchor_id ) .'">' . $bklyn_section_anchor_id .'</a>';
        
    }    
    
} else {
    
    $output .= '<a data-id="section-without-id" class="ut-vc-offset-anchor-bottom" name="section-without-id"></a>';
    
}

// custom css
if( !empty( $custom_css_style ) || !empty( $parallax_css_style ) ) {
    $output .= '<style type="text/css">' . $custom_css_style . ' ' . $parallax_css_style . '</style>';
}

$output .= '</section>';
$output .= $after_output;

echo $output;
