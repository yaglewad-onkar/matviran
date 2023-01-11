<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $css
 * @var $el_id
 * @var $equal_height
 * @var $content_placement
 * @var $content - shortcode content
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Row_Inner
 */
$el_class = $equal_height = $hide_on_desktop = $hide_on_tablet = $hide_on_mobile = $content_placement = $css = $el_id = '';
$animate_background_position = $background_position = $background_position_x = $background_position_y = $background_position_x_medium = $background_position_y_medium = $background_position_x_tablet = $background_position_y_tablet = $background_position_x_mobile = $background_position_y_mobile = '';

$desktop_column_clear = $tablet_column_clear = $mobile_column_clear = '';
$disable_element = '';
$output = $after_output = '';
$animate_once = 'yes';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$el_class = $this->getExtraClass( $el_class );
$css_classes = array(
	'vc_row',
	'wpb_row', //deprecated
	'vc_inner',
	'vc_row-fluid',
	$el_class	
);

// unique ID for this section
if ( empty( $el_id ) ) {
    $el_id = uniqid("ut-row-inner-");
}

if ( 'yes' === $disable_element ) {
	if ( vc_is_page_editable() ) {
		$css_classes[] = 'vc_hidden-lg vc_hidden-xs vc_hidden-sm vc_hidden-md';
	} else {
		return '';
	}
}

if (vc_shortcode_custom_css_has_property( $css, array( 'border', 'background', 'background-image', 'background-color' ), true )) {
	$css_classes[]='vc_row-has-fill';
}

if (!empty($atts['gap'])) {
	$css_classes[] = 'vc_column-gap-'.$atts['gap'];
}


$wrapper_attributes = array();

// build attributes for wrapper
$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';



if ( ! empty( $equal_height ) ) {
	$flex_row = true;
	$css_classes[] = 'vc_row-o-equal-height';
}

if ( ! empty( $content_placement ) ) {
	$flex_row = true;
	$css_classes[] = 'vc_row-o-content-' . $content_placement;
}

if ( ! empty( $flex_row ) ) {
	$css_classes[] = 'vc_row-flex';
}

if ( ! empty( $desktop_column_clear ) ) {
    $css_classes[] = 'ut-remove-clear-on-desktop';
}

if ( ! empty( $tablet_column_clear ) ) {
    $css_classes[] = 'ut-remove-clear-on-tablet';
}

if ( ! empty( $mobile_column_clear ) ) {
    $css_classes[] = 'ut-remove-clear-on-mobile';
}


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

/* attributes string */
$animation_attributes = implode(' ', array_map(
    function ($v, $k) { return sprintf("%s=\"%s\"", $k, $v); },
    $animation_attributes,
    array_keys( $animation_attributes )
) );





/**
 * Custom CSS
 */

$custom_css_style = '';
$row_custom_class = uniqid("ut-row-inner-");

// push class into section class array
$css_classes[] = $row_custom_class;

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

if( $cursor_skin !== 'inherit' ) {
	$wrapper_attributes[] = 'data-cursor-skin="' . esc_attr( $cursor_skin ) . '"';
}


$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( array_unique( $css_classes ) ) ), $this->settings['base'], $atts ) );

$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';
$wrapper_attributes[] = $animation_attributes;

$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '>';
$output .= wpb_js_remove_wpautop( $content );


// custom css
if( !empty( $custom_css_style ) ) {
    $output .= '<style type="text/css">' . $custom_css_style . '</style>';
}

$output .= '</div>';
$output .= $after_output;

echo $output;
