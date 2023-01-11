<?php
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $full_width
 * @var $full_height
 * @var $equal_height
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
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Row
 */

$el_class = $full_height = $hide_on_desktop = $hide_on_tablet = $hide_on_mobile = $full_width = $equal_height = $flex_row = $columns_placement = $content_placement = $css = $el_id = $video_bg = $video_bg_url = '';
$disable_element = '';
$output = $after_output = $video_background = '';
$gradient_background = $gradient_overlay_background = false;
$animate_background_position = $background_position = $background_position_x = $background_position_y = $background_position_x_medium = $background_position_y_medium = $background_position_x_tablet = $background_position_y_tablet = $background_position_x_mobile = $background_position_y_mobile = '';


$section_separator_top = $section_separator_bottom = false;
$section_separator_svg_top = $section_separator_svg_bottom = 'design_wave';
$automatic_spacing_suppress_fill = 'off';

$animate_once = 'yes';
$distortion = $background_distortion_1 = $background_distortion_2 = $distortion_ease = $distortion_speed_in = $distortion_speed_out = $distortion_intensity = '';
$distortion_effect = 1;
$glitch_effect= '';

$overflow_visible = $overflow_visible_tablet = $overflow_visible_mobile = '';

$desktop_column_clear = $tablet_column_clear = $mobile_column_clear = '';

// parallax vars
$parallax_speed_video = ''; //@todo
$video_bg_parallax = ''; //@todo

$parallax = '';
$parallax_image = !empty( $atts['parallax_image'] ) ? $atts['parallax_image'] : ''; // fallback value
$parallax_speed = 1;
$parallax_zoom_factor = 1.3;
$parallax_threshold = !empty( $atts['parallax_threshold'] ) ? $atts['parallax_threshold'] : '0'; // fallback value

// custom cursor
$cursor_skin = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$el_class = $this->getExtraClass( $el_class );

$css_classes = array(
    'vc_row',
    'wpb_row', //deprecated
    'vc_row-fluid',
    $el_class,
    // vc_shortcode_custom_css_class( $css ),
);

// row has fill
if ( 'yes' === $disable_element ) {
    if ( vc_is_page_editable() ) {
        $css_classes[] = 'vc_hidden-lg vc_hidden-xs vc_hidden-sm vc_hidden-md';
    } else {
        return '';
    }
}

if( $automatic_spacing_suppress_fill == 'off' && ( vc_shortcode_custom_css_has_property( $css, array( 'border', 'background', 'background-image', 'background-color' ), true ) || $video_bg || $parallax || $bklyn_overlay || $section_separator_top || $section_separator_bottom || $distortion ) ) {

    $css_classes[]='vc_row-has-fill';

}

if( $distortion ) {
	
	$css_classes[] = 'ut-background-with-distortion-effect';
	
}

$gap = !empty( $atts['gap'] ) ? $atts['gap'] : "0";
$css_classes[] = 'vc_column-gap-'.$atts['gap'];

// unique ID for this section
if ( empty( $el_id ) ) {
    $el_id = uniqid("ut-row-");
}

// animation classes
$animation_attributes = array();

/* fill animation classes */
if( !empty( $effect ) && $effect != 'none' ) {

    $css_classes[] = 'ut-animate-element';
    $css_classes[] = 'animated';
    
    if( $animate_tablet == 'false' || !$animate_tablet ) {
        $css_classes[]  = 'ut-no-animation-tablet';
    }

    if( $animate_mobile == 'false' || !$animate_mobile ) {
        $css_classes[]  = 'ut-no-animation-mobile';
    }

    if( $animate_once == 'infinite' ) {
        $css_classes[]  = 'infinite';
    }

    $animation_attributes['data-effect'] = esc_attr( $effect );
    $animation_attributes['data-animateonce'] = esc_attr( $animate_once );

    $delay_timer = isset( $delay_timer ) && $delay_timer != '' ? $delay_timer : 200;
    $animation_attributes['data-delay'] = $delay == 'true' ? esc_attr( $delay_timer ) : 0;
    
    $animation_duration = !empty( $animation_duration ) ? $animation_duration : ot_get_option( 'ut_animate_css_duration', '1' ) . 's';
    $animation_attributes['data-animation-duration'] = esc_attr( $animation_duration );

}

/* attributes string */
$animation_attributes = implode(' ', array_map(
    function ($v, $k) { return sprintf("%s=\"%s\"", $k, $v); },
    $animation_attributes,
    array_keys( $animation_attributes )
) );

$wrapper_attributes = array();
// build attributes for wrapper

if ( ! empty( $el_id ) ) {
    $wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}


$needs_side_nav_spacing = false;

if ( ! empty( $full_width ) ) {

    $wrapper_attributes[] = 'data-vc-full-width="true"';
    $wrapper_attributes[] = 'data-vc-full-width-init="false"';

    if ( 'stretch_row_content' === $full_width ) {

        $wrapper_attributes[] = 'data-vc-stretch-content="true"';

        $needs_side_nav_spacing = true;

    } elseif ( 'stretch_row_content_no_spaces' === $full_width ) {

        $wrapper_attributes[] = 'data-vc-stretch-content="true"';
        $css_classes[] = 'vc_row-no-padding';

        $needs_side_nav_spacing = true;

    }

}

$after_output .= '<div class="vc_row-full-width vc_clearfix"></div>';

if ( ! empty( $full_height ) ) {

	if ( $full_height == 'yes' ) {

		$css_classes[] = 'vc_row-o-full-height';

	} elseif( $full_height != 'yes' ) {

		$css_classes[] = 'vc_row-height-' . $full_height;

	}

    if ( ! empty( $columns_placement ) ) {

        $flex_row = true;
        $css_classes[] = 'vc_row-o-columns-' . $columns_placement;

        if ( 'stretch' === $columns_placement ) {
            $css_classes[] = 'vc_row-o-equal-height';
        }

    }

}

if ( ! empty( $equal_height ) ) {
    $flex_row = true;
    $css_classes[] = 'vc_row-o-equal-height';
}

if ( ! empty( $content_placement ) ) {
    $flex_row = true;
    $css_classes[] = 'vc_row-o-content-' . $content_placement;
}

if ( $flex_row ) {
    $css_classes[] = 'vc_row-flex';
}

/**
 * Custom CSS
 */

$custom_css_style = '';
$row_custom_class = uniqid("ut-row-");

// push class into section class array
$css_classes[] = $row_custom_class;

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
				$custom_css_style .= ut_create_gradient_css( $vc_css["background-color"], '.' . $row_custom_class ); 

				// remove vc background color
				$vc_css = ut_clean_up_vc_css_array( $vc_css, 'background-color' );

			}         

		}

		// background with gradient and background image
		if( isset( $vc_css["background"] ) ) {

			if( function_exists("ut_create_gradient_css") && ut_create_gradient_css( $vc_css["background"] ) ) {

				// add background image
				$custom_css_style .= ut_create_gradient_css( $vc_css["background"], '.' . $row_custom_class, false, 'background' ); 

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

        if( !empty( $vc_css['background-image'] ) ) {

            $css_classes[]        = 'ut-background-lozad';
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
		unset( $current_vc_css['background-repeat'] );
		unset( $current_vc_css['background-size'] );

		$custom_css_style .= '#' . $el_id . ' {' . implode_with_key( $current_vc_css ) . '}';

		
	}
		
}


/**
 * Overlay Settings
 */

$overlay_style_id = uniqid("ut_row_overlay_");
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
    $css_classes[] = 'bklyn-row-with-overlay';

}

if( $bklyn_overlay_effect ) {

    /* add parent css class */
    $css_classes[] = 'bklyn-section-with-overlay-effect';
	
	// $effect config
	$overlay_effect_config = ut_create_overlay_effect_settings( $atts );	
	
}


if( $section_separator_top || $section_separator_bottom ) {
    
    /* add parent css class */
    $css_classes[] = 'bklyn-row-with-separator';
	
	if( isset( $section_separator_top_hide_on_tablet ) && $section_separator_top_hide_on_tablet == 'true' || isset( $section_separator_bottom_hide_on_tablet ) && $section_separator_bottom_hide_on_tablet == 'true' ) {
		$css_classes[] = 'bklyn-row-separator-tablet-off';	
	}
	
	if( isset( $section_separator_top_hide_on_mobile ) && $section_separator_top_hide_on_mobile == 'true' || isset( $section_separator_bottom_hide_on_mobile ) && $section_separator_bottom_hide_on_mobile == 'true' ) {
		$css_classes[] = 'bklyn-row-separator-mobile-off';		
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

    // one time fallback to avoid empty output
    if( $parallax_image && !$parallax_image_src ) {
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
 * Row Background Video
*/

$has_video_bg = ( ! empty( $video_bg ) && ! empty( $video_bg_url ) );

if ( $has_video_bg ) {
    
    if( class_exists('UT_Section_Video_player') ) {
        
        $containment = $parallax ? '#' . $parallax_id  : '#' . $el_id;
        
        if( ut_video_is_vimeo( $video_bg_url ) ) {
            
            $video = new UT_Section_Video_player();
            
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

/**
 * Glitch Effect
 */

if( $glitch_effect && $glitch_effect != 'none' || $glitch_transparent && $glitch_transparent == 'on' ) {

    $glitch_settings = array(
        'glitch_effect'             => $glitch_effect,
        'image_desktop'             => ut_extract_custom_css_property( $css, 'background-image', true ),
         'image_desktop_position'   => $background_position,
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
if( $cursor_skin !== 'inherit' ) {
	$wrapper_attributes[] = 'data-cursor-skin="' . esc_attr( $cursor_skin ) . '"';
}

$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';
$wrapper_attributes[] = $animation_attributes;

/**
 * Row Output
 */

$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '>';

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

// background distortion
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

// row overlay
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
if( function_exists('ut_return_header_config') && ut_return_header_config( 'ut_header_layout', 'default' ) == 'side' && $needs_side_nav_spacing && 'stretch' != $columns_placement ) {
    $output .= '<div class="vc-sidenav-column-container-wrap">';
}

// row content
$output .= wpb_js_remove_wpautop( $content );

// close extra container if navigation and header are located to the left
if( function_exists('ut_return_header_config') && ut_return_header_config( 'ut_header_layout', 'default' ) == 'side' && $needs_side_nav_spacing && 'stretch' != $columns_placement ) {
    $output .= '</div>';
}

// hidden anchor for menu links (usually for upscroll)
if( !empty( $bklyn_section_anchor_id ) ) {
    
    if( empty( $bklyn_section_anchor_id ) && $has_custom_ID ) {
        
        $output .= '<a data-id="' . $el_id .'" class="ut-vc-offset-anchor-bottom" name="section-' . $el_id .'">' . $el_id .'</a>';
        
    } else {
    
        $output .= '<a data-id="section-' . ut_create_slug( $bklyn_section_anchor_id ) .'" class="ut-vc-offset-anchor-bottom" name="section-' . ut_create_slug( $bklyn_section_anchor_id ) .'">' . $bklyn_section_anchor_id .'</a>';
        
    }
    
} 

// custom css
if( !empty( $custom_css_style ) || !empty( $parallax_css_style ) ) {
    $output .= '<style type="text/css">' . $custom_css_style . ' ' . $parallax_css_style . '</style>';
}


$output .= '</div>';
$output .= $after_output;

echo $output;
