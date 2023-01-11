<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// required vars
$el_class = $width = $css = $offset = $hide_on_desktop = $hide_on_tablet = $hide_on_mobile = $output = ''; // make vars available
$gradient_background = $gradient_overlay_background = false;
$animate_background_position = $background_position = $background_position_x = $background_position_y = $background_position_x_medium = $background_position_y_medium = $background_position_x_tablet = $background_position_y_tablet = $background_position_x_mobile = $background_position_y_mobile = '';
$force_padding = $force_padding_desktop = $force_padding_tablet = $force_padding_mobile = '';
$force_padding_tablet_inherit = $force_padding_mobile_inherit = '';

$animate_once = 'yes';
// get shortcode attributes
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

// wrapper attributes array for later use
$wrapper_attributes = array();

// unique element ID
if ( empty( $el_id ) ) {
    $el_id = uniqid("ut-column-inner-");
}

// inner column classes
$width = wpb_translateColumnWidthToSpan( $width );
$width = vc_column_offset_class_merge( $offset, $width );

// build class array
$css_classes = array(
	$this->getExtraClass( $el_class ),
	'wpb_column',
	'vc_column_container',
	$width,
);

// extra classes
if( vc_shortcode_custom_css_has_property( $css, array( 'border', 'background', 'background-image', 'background-color' ), true ) || $bklyn_overlay ) {
	$css_classes[]='vc_col-has-fill';
}

/**
 * Animation Settings
 */

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
    
    $animation_duration = !empty( $animation_duration ) ? $animation_duration : '1s';
    $animation_attributes['data-animation-duration'] = esc_attr( $animation_duration );    
    
}

// animation attributes string
$wrapper_attributes[] = implode(' ', array_map(
    function ($v, $k) { return sprintf("%s=\"%s\"", $k, $v); },
    $animation_attributes,
    array_keys( $animation_attributes )
) );


/**
 * Custom CSS
 */

$custom_css_style = '';

// create settings array
if( !empty( $atts['css'] ) && ut_vc_css_to_array( $atts['css'] ) ) {
    
    $vc_css = ut_vc_css_to_array( $atts['css'] );

    // extra css
    $vc_css_medium = array();
    $vc_css_tablet = array();
    $vc_css_mobile = array();

    if( isset( $vc_css["background-color"] ) ) {
        
        if( function_exists("ut_create_gradient_css") && ut_create_gradient_css( $vc_css["background-color"] ) ) {
            
            // add background image
            $custom_css_style .= ut_create_gradient_css( $vc_css["background-color"], '#' . $el_id ); 
            
            // remove vc background color
            $vc_css = ut_clean_up_vc_css_array( $vc_css, 'background-color' );
            
        }         
        
    }
    
    // background with gradient and background image
    if( isset( $vc_css["background"] ) ) {
        
        if( function_exists("ut_create_gradient_css") && ut_create_gradient_css( $vc_css["background"] ) ) {
            
            // add background image
            $custom_css_style .= ut_create_gradient_css( $vc_css["background"], '#' . $el_id, false, 'background' ); 
            
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

            $vc_css['background-position'] = $background_position . ' !important';

        } else {

            $vc_css['background-position'] = $background_position_x . ' ' . $background_position_y . ' !important';

        }

    }

    // custom background position medium desktop
    if( $background_position == 'custom' && $background_position_x_medium && $background_position_y_medium ) {

        $vc_css_medium['background-position'] = $background_position_x_medium . ' ' . $background_position_y_medium . ' !important';

    }

    // custom background position tablet
    if( $background_position == 'custom' && $background_position_x_tablet && $background_position_y_tablet ) {

        $vc_css_tablet['background-position'] = $background_position_x_tablet . ' ' . $background_position_y_tablet . ' !important';

    }

    // custom background position mobile
    if( $background_position == 'custom' && $background_position_x_mobile && $background_position_y_mobile ) {

        $vc_css_mobile['background-position'] = $background_position_x_mobile . ' ' . $background_position_y_mobile . ' !important';

    }
    
    // custom background attachment
    if( $background_attachment && !$parallax ) {
        $vc_css['background-attachment'] = $background_attachment . '!important';
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
    
}


/**
 * Overlay Settings
 */

$overlay_style_id = uniqid("ut_column_overlay_");
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
    $css_classes[] = 'bklyn-column-with-overlay';

}

if( $bklyn_overlay && $bklyn_overlay_effect ) {

    /* add parent css class */
    $css_classes[] = 'bklyn-section-with-overlay-effect';
	
	// $effect config
	$overlay_effect_config = ut_create_overlay_effect_settings( $atts );	
	
}


/**
 * Responsive Settings
 */

if( $hide_bg_medium ) {
    $css_classes[] = 'hide-bg-on-medium';
}

if( $hide_bg_tablet ) {
    $css_classes[] = 'hide-bg-on-tablet';
}

if( $hide_bg_mobile ) {
    $css_classes[] = 'hide-bg-on-mobile';
}

if( $hide_on_desktop ) {
    $css_classes[] = 'hide-on-desktop';
}

if( $hide_on_tablet ) {
    $css_classes[] = 'hide-on-tablet';
}

if( $hide_on_mobile ) {
    $css_classes[] = 'hide-on-mobile';
}

$inner_css_classes = array();

// force padding
if( $force_padding == 'on' ) {

	$force_padding_tablet = $force_padding_tablet_inherit != 'yes' ? $force_padding_desktop : $force_padding_tablet;
	$force_padding_mobile = $force_padding_mobile_inherit != 'yes' ? $force_padding_tablet : $force_padding_mobile;

	$inner_css_classes[] = 'ut-forced-padding';
	$inner_css_classes[] = 'ut-force-padding-desktop-' . $force_padding_desktop;
	$inner_css_classes[] = 'ut-force-padding-tablet-' . $force_padding_tablet;
	$inner_css_classes[] = 'ut-force-padding-mobile-' . $force_padding_mobile;

}

if( $cursor_skin !== 'inherit' ) {
	$wrapper_attributes[] = 'data-cursor-skin="' . esc_attr( $cursor_skin ) . '"';
}


/**
 * Start Output
 */

$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $css_classes ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';

$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '>';
    
    $output .= '<div id="' . esc_attr( $el_id ) . '" class="vc_column-inner vc_column-inner-nested ' . implode(' ', $inner_css_classes ) . '">';

        $output .= '<div class="wpb_wrapper">';

            $output .= wpb_js_remove_wpautop( $content );

        $output .= '</div>';
		
		// column overlay
		if( $bklyn_overlay ) {

			$output .= '<div id="' . $overlay_style_id . '" class="bklyn-overlay ' . ( $bklyn_overlay_pattern ? $bklyn_overlay_pattern_style : '' ) . '">';

				if( $bklyn_overlay_effect ) {

					$output .= '<div id="' . $overlay_effect_id . '" class="bklyn-overlay-effect" data-effect-config=\'' . json_encode( $overlay_effect_config ) . '\'></div>';	

				}

			$output .= '</div>';

		}
    $output .= '</div>';
    
    // custom css
    if( !empty( $custom_css_style ) ) {
        $output .= '<style type="text/css">' . $custom_css_style . '</style>';
    }

$output .= '</div>';

echo $output;
