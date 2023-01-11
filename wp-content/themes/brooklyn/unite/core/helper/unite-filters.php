<?php if (!defined('ABSPATH')) {
    exit; // exit if accessed directly
}

/**
 * Recognized Social Profiles
 *
 * @return    array
 *
 * @access    public
 * @since     1.0.0
 * @version   1.1.0
 */
 
if ( !function_exists( '_ut_recognized_social_user_profiles' ) ) {

    function _ut_recognized_social_user_profiles() {
        
        return apply_filters( 'ut_recognized_user_contact_fields', array(            
            'twitter'      => esc_html__( 'Twitter', 'unitedthemes' ),
            'twitch'       => esc_html__( 'Twitch', 'unitedthemes' ),
            'facebook'     => esc_html__( 'Facebook', 'unitedthemes' ),
            'google-plus'  => esc_html__( 'Google Plus', 'unitedthemes' ),
            'instagram'    => esc_html__( 'instagram', 'unitedthemes' ),
            'twitch'       => esc_html__( 'Twitch', 'unitedthemes' ),
            'linkedin'     => esc_html__( 'LinkedIn', 'unitedthemes' ),
            'tumblr'       => esc_html__( 'Tumblr', 'unitedthemes' ),
            'pinterest'    => esc_html__( 'Pinterest', 'unitedthemes' ),
            'github-alt'   => esc_html__( 'Github', 'unitedthemes' ),
            'dribbble'     => esc_html__( 'Dribbble', 'unitedthemes' ),
            'flickr'       => esc_html__( 'Flickr', 'unitedthemes' ),
            'skype'        => esc_html__( 'Skype', 'unitedthemes' ),
            'youtube'      => esc_html__( 'Youtube', 'unitedthemes' ),
            'vimeo-square' => esc_html__( 'Vimeo', 'unitedthemes' ),
            'rss'          => esc_html__( 'RSS', 'unitedthemes' )
        ));
        
    }

}

/**
 * Recognized Dynamic Sidebars
 *
 * @return    array
 *
 * @access    public
 * @since     1.0.0
 * @version   1.0.0
 */
 
if ( !function_exists( '_ut_recognized_dynamic_sidebars' ) ) {

    function _ut_recognized_dynamic_sidebars() {
        
        $dynamic_sidebars = get_option('unite_theme_sidebars');
        $sidebar_array = array();
        
        if( !empty( $dynamic_sidebars ) && is_array( $dynamic_sidebars ) ) :
                          
            foreach( $dynamic_sidebars as $single_sidebar ) {
                                             
                 $sidebar_array[$single_sidebar['sidebar_id']] = $single_sidebar['sidebarname'];
                            
            }
        
        endif;
        
        return apply_filters( 'ut_recognized_dynamic_sidebars', $sidebar_array );
        
    }

}

/**
 * Recognized Sidebar Alignments
 *
 * @return    array
 *
 * @access    public
 * @since     1.0.0
 * @version   1.0.0
 */
 
if ( !function_exists( '_ut_recognized_sidebar_align' ) ) {

    function _ut_recognized_sidebar_align() {
        
        return apply_filters( 'ut_recognized_sidebar_align', array(
            'default'   => esc_html__( 'Default Align', 'unitedthemes' ),
            'none'      => esc_html__( 'No Sidebar', 'unitedthemes' ),
            'left'      => esc_html__( 'Sidebar Left', 'unitedthemes' ),
            'right'     => esc_html__( 'Sidebar Right', 'unitedthemes' ),
            //'both'      => esc_html__( 'Sidebar Left and Right', 'unitedthemes' )
        ));
        
    }

}


/**
 * Recognized Background Repeat Values
 *
 * @return    array
 *
 * @access    public
 * @since     1.0.0
 * @version   1.0.0
 */
 
if ( !function_exists( '_ut_recognized_background_repeats' ) ) {

    function _ut_recognized_background_repeats() {
        
        return apply_filters('ut_recognized_background_repeats' ,$background_repeat = array(
            'no-repeat' => esc_html__( 'No repeat', 'unitedthemes' ),
            'repeat'    => esc_html__( 'Repeat all', 'unitedthemes' ),
            'repeat-x'  => esc_html__( 'Repeat only horizontally', 'unitedthemes' ),
            'repeat-y'  => esc_html__( 'Repeat only vertically', 'unitedthemes' ),
            'inherit'   => esc_html__( 'Inherit', 'unitedthemes' )
        ));        
           
    }

}


/**
 * Recognized Background Attachment Values
 *
 * @return    array
 *
 * @access    public
 * @since     1.0.0
 * @version   1.0.0
 */
 
if ( !function_exists( '_ut_recognized_background_attachments' ) ) {

    function _ut_recognized_background_attachments() {
        
        return apply_filters('ut_recognized_background_attachments', $background_attachment = array(
            'scroll'    => esc_html__( 'Scroll', 'unitedthemes' ),
            'fixed'     => esc_html__( 'Fixed', 'unitedthemes' ),
            'inherit'   => esc_html__( 'Inherit', 'unitedthemes' )
        ));
           
    }

}


/**
 * Recognized Background Position Values
 *
 * @return    array
 *
 * @access    public
 * @since     1.0.0
 * @version   1.0.0
 */
 
if ( !function_exists( '_ut_recognized_background_positions' ) ) {

    function _ut_recognized_background_positions() {
        
        return apply_filters('ut_recognized_background_positions', $background_position = array(
            'left top'      => esc_html__( 'left top', 'unitedthemes' ),
            'left center'   => esc_html__( 'left center', 'unitedthemes' ),
            'left bottom'   => esc_html__( 'left bottom', 'unitedthemes' ),
            'center top'    => esc_html__( 'center top', 'unitedthemes' ),
            'center center' => esc_html__( 'center center', 'unitedthemes' ),
            'center bottom' => esc_html__( 'center bottom', 'unitedthemes' ),
            'right top'     => esc_html__( 'right top', 'unitedthemes' ),
            'right center'  => esc_html__( 'right center', 'unitedthemes' ),
            'right bottom'  => esc_html__( 'right bottom', 'unitedthemes' )
        ));
           
    }

}


/**
 * Recognized Background Size Values
 *
 * @return    array
 *
 * @access    public
 * @since     1.0.0
 * @version   1.0.0
 */
 
if ( !function_exists( '_ut_recognized_background_sizes' ) ) {

    function _ut_recognized_background_sizes() {
        
        return apply_filters('ut_recognized_background_sizes', $background_size = array(
            'cover'     => esc_html__( 'Cover', 'unitedthemes' ),
            'contain'   => esc_html__( 'Contain', 'unitedthemes' ),
            'inherit'   => esc_html__( 'Inherit', 'unitedthemes' ),
        ));
           
    }

}


/**
 * Recognized Font Faces
 *
 * @return    array
 *
 * @access    public
 * @since     1.0.0
 * @version   1.0.0
 */
 
if ( !function_exists( '_ut_recognized_font_families' ) ) {

    function _ut_recognized_font_families() {
        
        return apply_filters('ut_recognized_font_families', $font_families = array(
            'arial'     => esc_html__( 'Arial', 'unitedthemes' ),
            'georgia'   => esc_html__( 'Georgia', 'unitedthemes' ),
            'helvetica' => esc_html__( 'Helvetica', 'unitedthemes' ),
            'palatino'  => esc_html__( 'Palatino', 'unitedthemes' ),
            'tahoma'    => esc_html__( 'Tahoma', 'unitedthemes' ),
            'times'     => esc_html__( 'Times New Roman', 'unitedthemes' ),
            'trebuchet' => esc_html__( 'Trebuchet', 'unitedthemes' ),
            'verdana'   => esc_html__( 'Verdana', 'unitedthemes' )
        ));
           
    }

}

/**
 * Recognized Border Styles
 *
 * @return    array
 *
 * @access    public
 * @since     1.1.0
 * @version   1.0.0
 */
 
if ( !function_exists( '_ut_recognized_border_styles' ) ) {

    function _ut_recognized_border_styles() {
        
        return apply_filters('ut_recognized_border_styles', $border_styles = array(
            'none'     => esc_html__( 'none', 'unitedthemes' ),
            'dotted'   => esc_html__( 'dotted', 'unitedthemes' ),
            'dashed'   => esc_html__( 'dashed', 'unitedthemes' ),
            'solid'    => esc_html__( 'solid', 'unitedthemes' ),
            'double'   => esc_html__( 'double', 'unitedthemes' )
        ) );
           
    }

}

/**
 * Recognized Font Subsets
 *
 * @return    array
 *
 * @access    public
 * @since     1.0.0
 * @version   1.1.0
 */
 
if ( !function_exists( '_ut_recognized_font_subsets' ) ) {

    function _ut_recognized_font_subsets() {
        
        return apply_filters( 'ut_recognized_font_subsets', array(
            'latin'         => esc_html__( 'Latin', 'unitedthemes' ),
            'latin-ext'     => esc_html__( 'Latin Extended', 'unitedthemes' ),
            'greek'         => esc_html__( 'Greek', 'unitedthemes' ),
            'greek-ext'     => esc_html__( 'Greek Extended', 'unitedthemes' ),
            'cyrillic'      => esc_html__( 'Cyrillic', 'unitedthemes' ),
            'cyrillic-ext'  => esc_html__( 'Cyrillic Extended', 'unitedthemes' ),
            'khmer'         => esc_html__( 'Khmer', 'unitedthemes' ),
            'vietnamese'    => esc_html__( 'Vietnamese', 'unitedthemes' )
        ));
        
    }

}

/**
 * Recognized Font Size Units
 *
 * @return    array
 *
 * @access    public
 * @since     1.0.0
 * @version   1.0.0
 */
 
if ( !function_exists( '_ut_recognized_font_size_units' ) ) {

    function _ut_recognized_font_size_units() {
        
        return apply_filters( 'ut_recognized_font_size_units', array(
            'px'    => esc_html__( 'px', 'unitedthemes' ),
            'em'    => esc_html__( 'em', 'unitedthemes' ),
            '%'     => esc_html__( '%', 'unitedthemes' ),
            'rem'   => esc_html__( 'rem', 'unitedthemes' ),
        ));
        
    }

}

/**
 * Recognized Font Text Align
 *
 * @return    array
 *
 * @access    public
 * @since     1.1.0
 * @version   1.0.0
 */
 
if ( !function_exists( '_ut_recognized_text_align' ) ) {

    function _ut_recognized_text_align() {
        
        return apply_filters( 'ut_recognized_text_align', array(
            'left'      => esc_html__( 'left', 'unitedthemes' ),
            'right'     => esc_html__( 'right', 'unitedthemes' ),
            'center'    => esc_html__( 'center', 'unitedthemes' ),
            'justify'   => esc_html__( 'justify', 'unitedthemes' ),
            'inherit'   => esc_html__( 'inherit', 'unitedthemes' ),
        ));
        
    }

}

/**
 * Recognized Font Styles
 *
 * @return    array
 *
 * @access    public
 * @since     1.0.0
 * @version   1.0.0
 */
 
if ( !function_exists( '_ut_recognized_font_styles' ) ) {

    function _ut_recognized_font_styles() {
        
        return array(
            'normal'  => esc_html__( 'Normal', 'unitedthemes' ),
            'italic'  => esc_html__( 'Italic', 'unitedthemes' ),
            'oblique' => esc_html__( 'Oblique', 'unitedthemes' ),
            'inherit' => esc_html__( 'Inherit', 'unitedthemes' )
        );
        
    }

}


/**
 * Recognized Text Transforms
 *
 * @return    array
 *
 * @access    public
 * @since     1.0.0
 * @version   1.0.0
 */
 
if ( !function_exists( '_ut_recognized_text_transforms' ) ) {

    function _ut_recognized_text_transforms() {
        
        return apply_filters( 'ut_recognized_text_transforms', array(
            'none'        => esc_html__( 'none', 'unitedthemes' ),
            'capitalize'  => esc_html__( 'Capitalize', 'unitedthemes' ),
            'uppercase'   => esc_html__( 'Uppercase', 'unitedthemes' ),
            'lowercase'   => esc_html__( 'Lowercase', 'unitedthemes' )
        ));
        
    }

}

/**
 * Recognized Text Decorations
 *
 * @return    array
 *
 * @access    public
 * @since     1.0.0
 * @version   1.0.0
 */
 
if ( !function_exists( '_ut_recognized_text_decorations' ) ) {

    function _ut_recognized_text_decorations() {
        
        return apply_filters( 'ut_recognized_text_decorations', array(
            'none'        => esc_html__( 'none', 'unitedthemes' ),
            'blink'       => esc_html__( 'Blink', 'unitedthemes' ),
            'inherit'     => esc_html__( 'Inherit', 'unitedthemes' ),
            'line-trough' => esc_html__( 'Line Through', 'unitedthemes' ),
            'overline'    => esc_html__( 'Overline', 'unitedthemes' ),
            'underline'   => esc_html__( 'Underline', 'unitedthemes' ),
        ));
        
    }

}

/**
 * Recognized Font Weights
 *
 * @return    array
 *
 * @access    public
 * @since     1.0.0
 * @version   1.0.0
 */
 
if ( !function_exists( '_ut_recognized_font_weights' ) ) {

    function _ut_recognized_font_weights() {
        
        return apply_filters( 'ut_recognized_font_weights', array(
            'normal'    => esc_html__( 'Normal', 'unitedthemes' ),
            'bold'      => esc_html__( 'Bold', 'unitedthemes' ),
            'bolder'    => esc_html__( 'Bolder', 'unitedthemes' ),
            'lighter'   => esc_html__( 'Lighter', 'unitedthemes' ),
            '100'       => '100',
            '200'       => '200',
            '300'       => '300',
            '400'       => '400',
            '500'       => '500',
            '600'       => '600',
            '700'       => '700',
            '800'       => '800',
            '900'       => '900',
            'inherit'   => esc_html__( 'Inherit', 'unitedthemes' ),
        ));
        
    }

}


/**
 * Recognized font families
 *
 * Returns an array of all recognized font families.
 * Keys are intended to be stored in the database
 * while values are ready for display in html.
 * Renamed in version 2.0 to avoid name collisions.
 *
 * @uses      apply_filters()
 *
 * @return    array
 *
 * @access    public
 * @since     1.1.8
 * @updated   2.0
 */
if ( ! function_exists( 'ut_recognized_font_families' ) ) {

  function ut_recognized_font_families( $field_id = '' ) {
  
    return apply_filters( 'ut_recognized_font_families', array(
        'arial'         => 'Arial, Helvetica, sans-serif',
        'courier'       => '"Courier New", Courier, monospace',
        'comic'         => '"Comic Sans MS", cursive, sans-serif',
        'georgia'       => 'Georgia, serif',
        'helvetica'     => 'Helvetica, sans-serif',
        'impact'        => 'Impact, Charcoal, sans-serif',
        'lucida_sans'   => '"Lucida Sans Unicode", "Lucida Grande", sans-serif',
        'lucida_console'=> '"Lucida Console", Monaco, monospace',
        'palatino'      => '"Palatino Linotype", "Book Antiqua", Palatino, serif',
        'tahoma'        => 'Tahoma, Geneva, sans-serif',
        'times'         => '"Times New Roman", Times, serif',
        'trebuchet'     => '"Trebuchet MS", Helvetica, sans-serif',
        'verdana'       => 'Verdana, Geneva, sans-serif'
    ), $field_id );
    
  }

}




/**
 * Recognized Oembed Providers
 *
 * @return    array
 *
 * @access    public
 * @since     1.0.0
 * @version   1.0.0
 */
 
if ( !function_exists( '_ut_recognized_oembed_providers' ) ) {

    function _ut_recognized_oembed_providers() {
        
        return $providers = array(
                '#http://(www\.)?youtube\.com/watch.*#i'              => array( 'http://www.youtube.com/oembed',                      true  ),
                '#https://(www\.)?youtube\.com/watch.*#i'             => array( 'http://www.youtube.com/oembed?scheme=https',         true  ),
                '#http://(www\.)?youtube\.com/playlist.*#i'           => array( 'http://www.youtube.com/oembed',                      true  ),
                '#https://(www\.)?youtube\.com/playlist.*#i'          => array( 'http://www.youtube.com/oembed?scheme=https',         true  ),
                '#http://youtu\.be/.*#i'                              => array( 'http://www.youtube.com/oembed',                      true  ),
                '#https://youtu\.be/.*#i'                             => array( 'http://www.youtube.com/oembed?scheme=https',         true  ),
                '#https?://(.+\.)?vimeo\.com/.*#i'                    => array( 'http://vimeo.com/api/oembed.{format}',               true  ),
                '#https?://(www\.)?dailymotion\.com/.*#i'             => array( 'http://www.dailymotion.com/services/oembed',         true  ),
                '#https?://(www\.)?flickr\.com/.*#i'                  => array( 'https://www.flickr.com/services/oembed/',            true  ),
                '#https?://flic\.kr/.*#i'                             => array( 'https://www.flickr.com/services/oembed/',            true  ),
                '#https?://(.+\.)?smugmug\.com/.*#i'                  => array( 'http://api.smugmug.com/services/oembed/',            true  ),
                '#https?://(www\.)?hulu\.com/watch/.*#i'              => array( 'http://www.hulu.com/api/oembed.{format}',            true  ),
                '#https?://(www\.)?scribd\.com/doc/.*#i'              => array( 'http://www.scribd.com/services/oembed',              true  ),
                '#https?://wordpress.tv/.*#i'                         => array( 'http://wordpress.tv/oembed/',                        true  ),
                '#https?://(.+\.)?polldaddy\.com/.*#i'                => array( 'https://polldaddy.com/oembed/',                      true  ),
                '#https?://poll\.fm/.*#i'                             => array( 'https://polldaddy.com/oembed/',                      true  ),
                '#https?://(www\.)?funnyordie\.com/videos/.*#i'       => array( 'http://www.funnyordie.com/oembed',                   true  ),
                '#https?://(www\.)?twitter\.com/.+?/status(es)?/.*#i' => array( 'https://api.twitter.com/1/statuses/oembed.{format}', true  ),
                '#https?://vine.co/v/.*#i'                            => array( 'https://vine.co/oembed.{format}',                    true  ),
                '#https?://(www\.)?soundcloud\.com/.*#i'              => array( 'http://soundcloud.com/oembed',                       true  ),
                '#https?://(.+?\.)?slideshare\.net/.*#i'              => array( 'https://www.slideshare.net/api/oembed/2',            true  ),
                '#http://instagr(\.am|am\.com)/p/.*#i'                => array( 'http://api.instagram.com/oembed',                    true  ),
                '#https?://(www\.)?rdio\.com/.*#i'                    => array( 'http://www.rdio.com/api/oembed/',                    true  ),
                '#https?://rd\.io/x/.*#i'                             => array( 'http://www.rdio.com/api/oembed/',                    true  ),
                '#https?://(open|play)\.spotify\.com/.*#i'            => array( 'https://embed.spotify.com/oembed/',                  true  ),
                '#https?://(.+\.)?imgur\.com/.*#i'                    => array( 'http://api.imgur.com/oembed',                        true  ),
                '#https?://(www\.)?meetu(\.ps|p\.com)/.*#i'           => array( 'http://api.meetup.com/oembed',                       true  ),
                '#https?://(www\.)?issuu\.com/.+/docs/.+#i'           => array( 'http://issuu.com/oembed_wp',                         true  ),
                '#https?://(www\.)?collegehumor\.com/video/.*#i'      => array( 'http://www.collegehumor.com/oembed.{format}',        true  ),
                '#https?://(www\.)?mixcloud\.com/.*#i'                => array( 'http://www.mixcloud.com/oembed',                     true  ),
                '#https?://(www\.|embed\.)?ted\.com/talks/.*#i'       => array( 'http://www.ted.com/talks/oembed.{format}',           true  ),
                '#https?://(www\.)?(animoto|video214)\.com/play/.*#i' => array( 'http://animoto.com/oembeds/create',                  true  ),
                '#https?://((clips|www)\.)?twitch\.tv/.+#i'           => array( 'https://api.twitch.tv/v4/oembed',                    true  ),

        );

    }

}


/**
 * Recognized JavaScript Translation Strings
 *
 * @return    array
 *
 * @access    public
 * @since     1.0.0
 * @version   1.1.0
 */
 
if ( !function_exists( '_ut_recognized_js_translation_strings' ) ) {

    function _ut_recognized_js_translation_strings() {
        
        return apply_filters( 'ut_recognized_js_translation_strings', array(            
            
            'confirm'           => esc_html__( 'OK', 'unitedthemes' ),
            'info'              => esc_html__( 'Information', 'unitedthemes' ),
            'upload_text'       => esc_html__( 'Send to Theme Options', 'unite' ),
            'remove_media_text' => esc_html__( 'X', 'unite' ),
            'reset_agree'       => esc_html__( 'Are you sure you want to reset back to the defaults?', 'unite' ),
            'remove_no'         => esc_html__( 'You can\'t remove this! But you can edit the values.', 'unite' ),
            'remove_agree'      => esc_html__( 'Are you sure you want to remove this?', 'unite' ),
			'distortion_effect' => esc_html__( 'Distortion Effect active', 'unite' ),
			'gallery_limit'     => esc_html__( 'Adding more than 3 Images to our Hero Image Fader is not possible. This is connected to performance related aspects.', 'unite' ),
            'header_limit_1'    => esc_html__( 'The selected header layout does not support more than 1 item. The available space in this case is limited.', 'unite' ),
            'header_limit_2'    => esc_html__( 'The selected header layout does not support more than 2 items. The available space in this case is limited.', 'unite' ),
			'load_globals'  	=> esc_html__( 'Load Global Settings?', 'unite' ),
			'load_globals_info' => esc_html__( 'You can optionally load the global settings for further modifications.', 'unite' ),
			'portfolio_panel'   => esc_html__( 'These Settings are outdated.', 'unite' ),
            'edit_images'       => esc_html__( 'Edit Images', 'unite' ),
            'delete_images'     => esc_html__( 'Delete Images', 'unite' ),
            'health_notification' => sprintf( esc_html__( 'The Server Health Page indicates, that some PHP values need your attention! If you do not adjust these values before working with the theme, you might experience issues with performance and data saving processes. We highly recommend not to save any data at the current stage. Please follow the instructions on the Server Health page first. %s', 'unite' ), '<br><a class="unite-health-status-modal" href="' . get_admin_url() . 'admin.php?page=unite-theme-info">' . esc_html__( 'Visit Server Health Status now!', 'unite-admin' ) . '</a>'),
                        
        ) );
        
    }

}


/**
 * Recognized CSS Easin Effects
 *
 * @return    array
 *
 * @access    public
 * @since     4.9.1.1
 * @version   1.1.0
 */
 
if ( !function_exists( '_ut_recognized_css_easing' ) ) {

    function _ut_recognized_css_easing() {
        
        return apply_filters( '_ut_recognized_css_easing', array(            
            'easeInQuad'    => 'cubic-bezier(0.550, 0.085, 0.680, 0.530)',
            'easeInCubic'   => 'cubic-bezier(0.550, 0.055, 0.675, 0.190)',
            'easeInQuart'   => 'cubic-bezier(0.895, 0.030, 0.685, 0.220)',
            'easeInQuint'   => 'cubic-bezier(0.755, 0.050, 0.855, 0.060)',
            'easeInSine'    => 'cubic-bezier(0.470, 0.000, 0.745, 0.715)',
            'easeInExpo'    => 'cubic-bezier(0.950, 0.050, 0.795, 0.035)',
            'easeInCirc'    => 'cubic-bezier(0.600, 0.040, 0.980, 0.335)',
            'easeInBack'    => 'cubic-bezier(0.600, -0.280, 0.735, 0.045)',
            'easeOutQuad'   => 'cubic-bezier(0.250, 0.460, 0.450, 0.940)',
            'easeOutCubic'  => 'cubic-bezier(0.215, 0.610, 0.355, 1.000)',
            'easeOutQuart'  => 'cubic-bezier(0.165, 0.840, 0.440, 1.000)',
            'easeOutQuint'  => 'cubic-bezier(0.230, 1.000, 0.320, 1.000)',
            'easeOutSine'   => 'cubic-bezier(0.390, 0.575, 0.565, 1.000)',
            'easeOutExpo'   => 'cubic-bezier(0.190, 1.000, 0.220, 1.000)',
            'easeOutCirc'   => 'cubic-bezier(0.075, 0.820, 0.165, 1.000)',
            'easeOutBack'   => 'cubic-bezier(0.175, 0.885, 0.320, 1.275)',
            'easeInOutQuad' => 'cubic-bezier(0.455, 0.030, 0.515, 0.955)',
            'easeInOutCubic'=> 'cubic-bezier(0.645, 0.045, 0.355, 1.000)',
            'easeInOutQuart'=> 'cubic-bezier(0.770, 0.000, 0.175, 1.000)',
            'easeInOutQuint'=> 'cubic-bezier(0.860, 0.000, 0.070, 1.000)',
            'easeInOutSine' => 'cubic-bezier(0.445, 0.050, 0.550, 0.950)',
            'easeInOutExpo' => 'cubic-bezier(1.000, 0.000, 0.000, 1.000)',
            'easeInOutCirc' => 'cubic-bezier(0.785, 0.135, 0.150, 0.860)',
            'easeInOutBack' => 'cubic-bezier(0.680, -0.550, 0.265, 1.550)'            
        ));
        
    }

}



