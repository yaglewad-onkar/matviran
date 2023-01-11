<?php

/**
 * Enhanced Gallery Settings
 *
 * @since     4.2
 * @version   1.0.0
 */

function ut_create_gallery_options() {

    ob_start(); ?>

    <script type="text/html" id="tmpl-ut-gallery-setting">

        <div class="clear"></div>
        <h3><?php esc_html_e('Lightbox Option' , 'unitedthemes'); ?></h3>

        <label class="setting">

            <span><?php esc_html_e('Lightbox' , 'unitedthemes'); ?></span>

            <select data-setting="ut_gallery_lightbox">
                <option value="on"><?php esc_html_e('On' , 'unitedthemes'); ?></option>
                <option value="off"><?php esc_html_e('Off' , 'unitedthemes'); ?></option>
            </select>

            <p><?php esc_html_e('Please make sure you are linking to the "Media File" when turning this option "on". See "Link to" Option above!' , 'unitedthemes'); ?></p>

        </label>

        <div class="clear"></div>
        <h3><?php esc_html_e('Image Border' , 'unitedthemes'); ?></h3>

        <label class="setting">
        <span><?php esc_html_e('Image Border' , 'unitedthemes'); ?></span>

            <select data-setting="ut_image_border">
                <option value="off"><?php esc_html_e('Off' , 'unitedthemes'); ?></option>
                <option value="on"><?php esc_html_e('On' , 'unitedthemes'); ?></option>
            </select>

        </label>

        <label class="setting">

            <span><?php esc_html_e('Radius' , 'unitedthemes'); ?></span>
            <input type="text" data-setting="ut_image_border_radius">
            <div class="clear"></div>
            <p><?php esc_html_e('Please insert a value in pixel: e.g. "3px".' , 'unitedthemes'); ?></p>

        </label>

        <p> <?php esc_html_e('These settings do not work with the WordPress Gallery Widget. We are working on a solution.' , 'unitedthemes'); ?></p>


    </script>

    <script type="text/javascript">

        jQuery(document).ready(function(){

          _.extend(wp.media.gallery.defaults, {
                link: 'file',
                ut_gallery_lightbox: 'on',
                ut_image_border: 'off',
                ut_image_border_radius: '0'
          });

          wp.media.view.Settings.Gallery = wp.media.view.Settings.Gallery.extend({
            template: function(view){
                return wp.media.template('gallery-settings')(view)
                    + wp.media.template('ut-gallery-setting')(view);
                }
          });

        });

    </script>

    <?php

    echo ob_get_clean();

}

add_action('print_media_templates','ut_create_gallery_options');


/**
 * Update Page Settings Tabs ( One Page Setting )
 */

function ut_update_page_type( $menu_data ) {

    $menu_object = wp_get_nav_menu_items( $menu_data );

    /* no menu, leave here  */
    if( ! $menu_object ) {
        return false;
    }

    foreach ( (array) $menu_object as $key => $menu_item ) {

        update_post_meta( $menu_item->object_id, 'ut_page_type', $menu_item->menutype );

    }

}

if( ot_get_option( 'ut_site_layout', 'multisite' ) == 'onepage' ) {

    add_action( 'wp_update_nav_menu', 'ut_update_page_type', 90, 1 );

}


/** 
 * Add Column View CSS
 *
 * @access    private
 * @since     4.0
 * @version   1.1.0
 */

function _ut_page_column_type_scripts() {

    $min = NULL;

    if( !WP_DEBUG ){
        $min = '.min';
    }

    wp_enqueue_style(
        'ut-column-views',
        THEME_WEB_ROOT . '/unite/core/admin/assets/css/unite-column-views' . $min . '.css'
    );

    wp_enqueue_script(
        'ut-column-views-js',
        THEME_WEB_ROOT . '/unite/core/admin/assets/js/unite-column-views' . $min . '.js',
        array('jquery')
    );

}

if( ot_get_option( 'ut_site_layout', 'onepage' ) == 'onepage' ) {

    add_action( 'admin_print_styles-edit.php', '_ut_page_column_type_scripts' );

}


/** 
 * Add new column to WordPress Posts Dashboard
 *
 * @param     array
 * @return    array
 *
 * @access    private
 * @since     4.0
 * @version   1.0.0
 */

function _ut_page_column_type( $defaults ){

    $defaults['page_type'] = esc_html__( 'Type', 'unitedthemes' );
    return $defaults;

}

if( ot_get_option( 'ut_site_layout', 'multisite' ) == 'onepage' ) {

    add_filter( 'manage_pages_columns', '_ut_page_column_type' );

}


/** 
 * Add Page Type to columns inside WordPress Posts Dashbaord
 *
 * @param  string $column_name
 * @param  int $id
 *
 * @access    private
 * @since     4.0
 * @version   1.0.0
 */

function _ut_page_custom_column_type( $column_name, $id ){

    if( $column_name === 'page_type' ) {

        $type = get_post_meta( get_the_ID(), 'ut_page_type', true );

        if( $type == 'section' && get_the_ID() != get_option('page_for_posts') && get_the_ID() != get_option('page_on_front') ) {

            echo '<span class="ut-page-type section">' . esc_html__( 'section', 'unitedthemes' ) . '</span>';

        } else {

            echo '<span class="ut-page-type page">' . esc_html__( 'page', 'unitedthemes' ) . '</span>';

        }

    }

}

if( ot_get_option( 'ut_site_layout', 'multisite' ) == 'onepage' ) {

    add_action( 'manage_pages_custom_column', '_ut_page_custom_column_type', 5, 2 );

}
    


/** 
 * Adjust Typography Field
 *
 * @return    array
 *
 * @access    private
 * @since     4.0
 * @version   1.0.0
 */

function _ut_typography_settings( $font_settings, $field_id ){

    if( $field_id == 'ut_global_headline_font_style_settings' || $field_id == 'ut_csection_header_font_style_settings' || $field_id == 'ut_csection_lead_font_style_settings' ) {

        $font_settings = array_diff( $font_settings, array('font-family', 'font-weight') );

    }

    if( $field_id == 'ut_global_page_headline_font_style_settings' ) {

        $font_settings = array_diff( $font_settings, array('font-family', 'font-weight') );

    }

    if( $field_id == 'ut_image_loader_font' || $field_id == 'ut_image_loader_percentage_font' ) {

        $font_settings = array_diff( $font_settings, array( 'line-height' ) );

    }

    if( $field_id == 'ut_image_loader_percentage_font' ) {

        $font_settings = array_diff( $font_settings, array( 'text-transform','font-variant' ) );

    }

    if( $field_id == 'ut_global_navigation_submenu_font_style' || $field_id == 'ut_global_navigation_modules_font_style' || $field_id == 'ut_global_navigation_buttons_font_style' ) {

        $font_settings = array_diff( $font_settings, array( 'font-family', 'font-variant', 'line-height' ) );

    }

    if( $field_id == 'ut_lightbox_font_style' ) {

        $font_settings = array_diff( $font_settings, array( 'font-family' ) );

    }

    if( $field_id == 'ut_global_mobile_navigation_font_style' || $field_id == 'ut_global_mobile_navigation_sub_font_style' ) {

        $font_settings = array_diff( $font_settings, array( 'font-family', 'font-style', 'font-variant', 'line-height', 'text-decoration' ) );

    }

    if( $field_id == 'ut_global_navigation_websafe_font_style' || $field_id == 'ut_global_navigation_google_font_style' ) {

        $font_settings = array_diff(  $font_settings, array( 'line-height', 'font-variant' ) );

    }

    if( $field_id == 'ut_global_blog_single_titles_font_style' || $field_id == 'ut_global_blog_single_sub_titles_font_style' ) {

        $font_settings = array_diff(  $font_settings, array( 'font-family', 'font-style', 'font-variant', 'text-decoration' ) );

    }

    if( $field_id == 'ut_global_blog_titles_font_style' ) {

        $font_settings = array_diff(  $font_settings, array( 'font-family', 'font-style', 'font-variant', 'text-decoration' ) );

    }

    if( $field_id == 'ut_morphbox_font_style' ) {

        $font_settings = array_diff(  $font_settings, array( 'font-family', 'font-style', 'font-variant', 'text-decoration', 'line-height', 'font-size', 'text-transform' ) );

    }

    if( $field_id == 'ut_blog_read_more_font_style' ) {

        $font_settings = array_diff(  $font_settings, array( 'font-family', 'font-style', 'font-variant', 'text-decoration', 'line-height', 'font-size' ) );

    }

    if( $field_id == 'ut_comment_form_label_font_style' ) {

        $font_settings = array_diff(  $font_settings, array( 'font-family', 'font-style', 'font-variant', 'text-decoration', 'line-height', 'font-size' ) );

    }

    if( $field_id == 'ut_blog_button_font_style' ) {

        $font_settings = array_diff(  $font_settings, array( 'font-family', 'font-style', 'font-variant', 'text-decoration', 'font-weight' ) );

    }

    if( $field_id == 'ut_blog_overview_meta_link_font_style' ) {

        $font_settings = array_diff(  $font_settings, array( 'font-family', 'font-style', 'font-variant', 'text-decoration', 'line-height', 'font-size', 'text-transform' ) );

    }

    if( $field_id == 'ut_global_grid_blog_titles_font_style' || $field_id == 'ut_global_list_blog_titles_font_style'  ) {

        $font_settings = array_diff(  $font_settings, array( 'font-family', 'font-style', 'font-variant', 'text-decoration' ) );

    }

    if( $field_id == 'ut_global_header_text_logo_websafe_font_style' || $field_id == 'ut_global_header_text_google_font_style' || $field_id == 'ut_global_header_text_logo_custom_font_style' ) {

        $font_settings = array_diff(  $font_settings, array( 'line-height' ) );

    }

    if( $field_id == 'ut_global_content_widgets_websafe_font_style' || $field_id == 'ut_subfooter_font_style' ) {

        $font_settings = array_diff(  $font_settings, array( 'font-family', 'font-style', 'font-variant', 'line-height', 'text-decoration', 'text-transform', 'font-weight' ) );

    }

    if( $field_id == 'ut_single_blockquote_websafe_font_style' ) {

        $font_settings = array_diff(  $font_settings, array( 'font-family', 'font-style', 'font-variant', 'text-decoration', 'text-transform', 'font-weight' ) );

    }

    if( $field_id == 'ut_blog_overview_date_font_style' || $field_id == 'ut_blog_overview_date_bottom_font_style' ) {

        $font_settings = array_diff(  $font_settings, array( 'font-family', 'font-style', 'font-variant', 'text-decoration', 'text-transform', 'font-size', 'line-height' ) );

    }

    // global settings hero description top
    if( $field_id == 'ut_google_front_catchphrase_top_font_style' || $field_id == 'ut_front_catchphrase_top_websafe_font_style' ) {

        $font_settings = array_diff(  $font_settings, array( 'line-height' ) );

    }

    // global settings hero description bottom
    if( $field_id == 'ut_front_catchphrase_websafe_font_style' || $field_id == 'ut_google_front_catchphrase_font_style' ) {

        //$font_settings = array_diff(  $font_settings, array( 'line-height' ) );

    }

    // blog settings hero description top
    if( $field_id == 'ut_google_blog_catchphrase_top_font_style' || $field_id == 'ut_blog_catchphrase_top_websafe_font_style' ) {

        $font_settings = array_diff(  $font_settings, array( 'line-height' ) );

    }

    // blog settings hero description bottom
    if( $field_id == 'ut_blog_catchphrase_websafe_font_style' || $field_id == 'ut_google_blog_catchphrase_font_style' ) {

        //$font_settings = array_diff(  $font_settings, array( 'line-height' ) );

    }

    // page settings
    if( $field_id == 'ut_page_caption_description_websafe_font_style' || $field_id == 'ut_page_caption_description_top_websafe_font_style' ) {

        $font_settings = array_diff(  $font_settings, array( 'font-family' ) );

    }

    // portfolio navigation
    if( $field_id == 'ut_single_portfolio_navigation_font_style' ) {

        $font_settings = array_diff(  $font_settings, array( 'font-family', 'line-height', 'font-variant', 'text-decoration', 'font-style' ) );

    }

    // overlay navigation submenu
    if( $field_id == 'ut_global_overlay_navigation_submenu_websafe_font_style' ) {

        $font_settings = array_diff(  $font_settings, array( 'font-family', 'font-variant', 'text-decoration', 'font-style' ) );

    }

    // overlay copyright
    if( $field_id == 'ut_overlay_copyright_font_style' ) {

        $font_settings = array_diff(  $font_settings, array( 'font-family', 'font-variant', 'text-decoration', 'font-style', 'line-height', 'font-size' ) );

    }

    if( $field_id == 'ut_hero_post_meta_description_websafe_font_style' ) {

        $font_settings = array_diff(  $font_settings, array( 'font-family', 'font-variant', 'text-decoration', 'font-style', 'line-height', 'text-transform' ) );

    }

    if( $field_id == 'ut_strong_websafe_font_style' ) {

        $font_settings = array_diff(  $font_settings, array( 'font-family', 'font-size', 'font-variant', 'text-decoration', 'font-style', 'line-height', 'text-transform', 'letter-spacing' ) );

    }

    // react slider fonts
    if( $field_id == 'ut_google_react_portfolio_background_title_font_style' || $field_id == 'ut_websafe_react_portfolio_background_title_font_style' || $field_id == 'ut_custom_react_portfolio_background_title_font_style' || $field_id == 'ut_global_react_portfolio_background_title_font_style' ) {

        $font_settings = array_diff(  $font_settings, array( 'font-size', 'line-height' ) );

    }

    if( $field_id == 'ut_google_react_portfolio_title_font_style' || $field_id == 'ut_websafe_react_portfolio_title_font_style' || $field_id == 'ut_custom_react_portfolio_title_font_style' || $field_id == 'ut_global_react_portfolio_title_font_style' ) {

        $font_settings = array_diff(  $font_settings, array( 'line-height' ) );

    }

    if( $field_id == 'ut_global_react_portfolio_background_title_font_style' || $field_id == 'ut_global_react_portfolio_title_font_style' ) {

        $font_settings = array_diff(  $font_settings, array( 'font-family' ) );

    }

    if( $field_id == 'ut_image_loader_text_font_style' ) {

        $font_settings = array_diff(  $font_settings, array( 'font-family' ) );

    }

	// page hero title
	if( $field_id == 'ut_google_page_hero_font_style' || $field_id == 'ut_page_hero_websafe_font_style' || $field_id == 'ut_page_hero_custom_font_style' ) {

		$font_settings = array_diff(  $font_settings, array( 'font-size', 'font-weight', 'line-height', 'text-transform', 'letter-spacing', 'font-style', 'font-variant', 'text-decoration' ) );

	}

	// responsive font size support
    foreach( ut_responsive_font_settings_support() as $key => $option  ) {

        // theme options
        foreach( $option['sources'] as $source ) {

	        if( $field_id == $source ) {

	            foreach( ut_font_responsive_attributes() as $attribute ) {

	                $font_settings[] = $attribute . '-responsive';

                }

	        }

        }

        // metaboxes
        if( isset( $option['metabox'] ) ) {

            foreach( $option['metabox']['sources'] as $source ) {

                if( $field_id == $source ) {

                    foreach( ut_font_responsive_attributes() as $attribute ) {

                        $font_settings[] = $attribute . '-responsive';

                    }

                }

            }

        }

    }

    return $font_settings;

}

add_filter( 'ot_recognized_typography_fields', '_ut_typography_settings', 10, 2 );
    




/** 
 * Adjust Toolbar Field
 *
 * @return    array
 *
 * @access    private
 * @since     4.7.4
 * @version   1.0.0
 */

function _ut_toolbar_settings( $toolbar_settings, $field_id ){

    if( $field_id == 'ut_top_header_right_toolbar' || $field_id == 'ut_top_header_left_toolbar' ) {

        unset( $toolbar_settings['bars'] );

    }

    if( $field_id == 'ut_header_primary_toolbar' || $field_id == 'ut_header_secondary_toolbar' || $field_id == 'ut_header_tertiary_toolbar' ) {

        unset( $toolbar_settings['bars'] );

    }

    return $toolbar_settings;

}

add_filter( 'ot_recognized_toolbars', '_ut_toolbar_settings', 10, 2 );


/** 
 * Adjust Font Size Field ( Max Font Size )
 *
 * @param int $font_size
 * @param string $field_id
 *
 * @return    int
 *
 * @access    private
 * @since     4.0
 * @version   1.0.0
 */

function _ut_typography_max_font_sizes( $font_size, $field_id ){

    if( $field_id == 'ut_image_loader_font' || $field_id == 'ut_image_loader_percentage_font' ) {

        $font_size = 30;

    }

    if( $field_id == 'ut_global_navigation_google_font_style' ) {

        $font_size = 20;

    }

    if( $field_id == 'ut_global_navigation_submenu_font_style' || $field_id == 'ut_global_navigation_submenu_google_font_style' || $field_id == 'ut_global_navigation_submenu_websafe_font_style' || $field_id == 'ut_global_navigation_submenu_custom_font_style' ) {

        $font_size = 20;

    }

    if( $field_id == 'ut_global_navigation_modules_font_style' || $field_id == 'ut_global_navigation_modules_google_font_style' || $field_id == 'ut_global_navigation_modules_websafe_font_style' || $field_id == 'ut_global_navigation_modules_custom_font_style' ) {

        $font_size = 20;

    }

    if( $field_id == 'ut_global_navigation_buttons_font_style' || $field_id == 'ut_global_navigation_buttons_google_font_style' || $field_id == 'ut_global_navigation_buttons_websafe_font_style' || $field_id == 'ut_global_navigation_buttons_custom_font_style' ) {

        $font_size = 20;

    }

    if( $field_id == 'ut_front_catchphrase_websafe_font_style' || $field_id == 'ut_google_front_catchphrase_font_style' || $field_id == 'ut_front_catchphrase_custom_font_style' ) {

        $font_size = 30;

    }

    if( $field_id == 'ut_front_catchphrase_top_websafe_font_style' || $field_id == 'ut_google_front_catchphrase_top_font_style' || $field_id == 'ut_front_catchphrase_top_custom_font_style' ) {

        $font_size = 50;

    }

    if( $field_id == 'ut_blog_catchphrase_websafe_font_style' || $field_id == 'ut_google_blog_catchphrase_font_style' || $field_id == 'ut_blog_catchphrase_custom_font_style' ) {

        $font_size = 30;

    }

    if( $field_id == 'ut_blog_catchphrase_top_websafe_font_style' || $field_id == 'ut_google_blog_catchphrase_top_font_style' || $field_id == 'ut_blog_catchphrase_top_custom_font_style' ) {

        $font_size = 50;

    }

    if( $field_id == 'ut_page_caption_description_websafe_font_style' || $field_id == 'ut_page_caption_description_top_websafe_font_style' ) {

        $font_size = 30;

    }

    if( $field_id == 'ut_page_main_hrbtn' || $field_id == 'ut_page_second_hrbtn' ) {

        $font_size = 20;

    }

    if( $field_id == 'ut_single_portfolio_navigation_font_style' ) {

        $font_size = 20;

    }


    if( $field_id == 'ut_image_loader_text_font_style' || $field_id == 'ut_image_loader_text_google_font_style' || $field_id == 'ut_image_loader_text_websafe_font_style' || $field_id == 'ut_image_loader_text_custom_font_style' ) {

        $font_size = 300;

    }

    if( $field_id == 'ut_google_front_page_hero_font_style' || $field_id == 'ut_front_page_hero_custom_font_style' || $field_id == 'ut_front_page_hero_websafe_font_style' ) {

        $font_size = 300;

    }

    if( $field_id == 'ut_global_header_text_google_font_style' || $field_id == 'ut_global_header_text_logo_websafe_font_style' || $field_id == 'ut_global_header_text_logo_custom_font_style' ) {

        $font_size = 40;

    }

    return $font_size;

}

add_filter( 'ot_font_size_high_range', '_ut_typography_max_font_sizes', 10, 2 );







/**
 * Adjust Font Unit Support
 *
 * @param array $units
 * @param string $field_id
 *
 * @return    array
 *
 * @access    private
 * @since     4.9.6.7
 * @version   1.0.0
 */

function _ut_typography_recognized_font_size_units( $units, $field_id ){

    // site logo
    if( $field_id == 'ut_global_header_text_google_font_style-font-size' ||
        $field_id == 'ut_global_header_text_logo_websafe_font_style-font-size' ||
        $field_id == 'ut_global_header_text_logo_custom_font_style-font-size' ) {

        $units = array_diff(  $units, array( 'vw', 'vh' ) );

    }


    return $units;

}

add_filter( 'ot_recognized_font_size_units', '_ut_typography_recognized_font_size_units', 10, 2 );




/**
 * Adjust Font Size Field ( Max Font Size ) for Breakpoint Slider (px)
 *
 * @param int $font_size
 * @param string $field_id
 *
 * @return    int
 *
 * @access    private
 * @since     4.9.6.7
 * @version   1.0.0
 */

function _ut_typography_dynamic_max_font_sizes_in_px( $font_size, $field_id ){

    // site logo
    if( $field_id == 'ut_global_header_text_google_font_style-font-size_unit' ||
        $field_id == 'ut_global_header_text_logo_websafe_font_style-font-size_unit' ||
        $field_id == 'ut_global_header_text_logo_custom_font_style-font-size_unit' ) {

        $font_size = 40;

    }

    // hero slogan
    if( $field_id == 'ut_google_front_catchphrase_top_font_style-font-size_unit' ||
        $field_id == 'ut_front_catchphrase_top_websafe_font_style-font-size_unit' ||
        $field_id == 'ut_front_catchphrase_top_custom_font_style-font-size_unit' ||
        $field_id == 'ut_page_caption_description_top_websafe_font_style-font-size_unit' ) {

        $font_size = 50;

    }

    // hero title
    if( $field_id == 'ut_google_front_page_hero_font_style-font-size_unit' ||
        $field_id == 'ut_front_page_hero_websafe_font_style-font-size_unit' ||
        $field_id == 'ut_front_page_hero_custom_font_style-font-size_unit' ||
        $field_id == 'ut_page_hero_font_size_unit' ) {

        $font_size = 300;

    }

    //hero description
    if( $field_id == 'ut_google_front_catchphrase_font_style-font-size_unit' ||
        $field_id == 'ut_front_catchphrase_websafe_font_style-font-size_unit' ||
        $field_id == 'ut_front_catchphrase_custom_font_style-font-size_unit' ||
        $field_id == 'ut_page_caption_description_websafe_font_style-font-size_unit' ) {

        $font_size = 30;

    }

    // blog hero slogan
    if( $field_id == 'ut_google_blog_catchphrase_top_font_style-font-size_unit' ||
        $field_id == 'ut_blog_catchphrase_top_websafe_font_style-font-size_unit' ||
        $field_id == 'ut_blog_catchphrase_top_custom_font_style-font-size_unit' ) {

        $font_size = 50;

    }

    // blog hero description
    if( $field_id == 'ut_google_blog_catchphrase_font_style-font-size_unit' ||
        $field_id == 'ut_blog_catchphrase_websafe_font_style-font-size_unit' ||
        $field_id == 'ut_blog_catchphrase_custom_font_style-font-size_unit' ) {

        $font_size = 30;

    }

    return $font_size;

}

add_filter( 'ot_font_size_px_high_range', '_ut_typography_dynamic_max_font_sizes_in_px', 10, 2 );



/**
 * Adjust Font Size Field ( Max Font Size ) for Breakpoint Slider (px)
 *
 * @param int $font_size
 * @param string $field_id
 *
 * @return    int
 *
 * @access    private
 * @since     4.9.6.7
 * @version   1.0.0
 */

function _ut_typography_dynamic_low_font_sizes_in_px( $font_size, $field_id ){

    if( $field_id == 'section_title_font_size' ) {

        $font_size = 8;

    }

    return $font_size;

}

add_filter( 'ot_font_size_px_low_range', '_ut_typography_dynamic_low_font_sizes_in_px', 10, 2 );


/**
 * Adjust Font Size Field ( Max Font Size ) for Breakpoint Slider (rem)
 *
 * @param int $font_size
 * @param string $field_id
 *
 * @return    int
 *
 * @access    private
 * @since     4.9.6.7
 * @version   1.0.0
 */

function _ut_typography_dynamic_max_font_sizes_in_rem( $font_size, $field_id ){

    // site logo
    if( $field_id == 'ut_global_header_text_google_font_style-font-size_unit' ||
        $field_id == 'ut_global_header_text_logo_websafe_font_style-font-size_unit' ||
        $field_id == 'ut_global_header_text_logo_custom_font_style-font-size_unit' ) {

        $font_size = 3;

    }

    // hero slogan
    if( $field_id == 'ut_google_front_catchphrase_top_font_style-font-size_unit' ||
        $field_id == 'ut_front_catchphrase_top_websafe_font_style-font-size_unit' ||
        $field_id == 'ut_front_catchphrase_top_custom_font_style-font-size_unit' ||
        $field_id == 'ut_page_caption_description_top_websafe_font_style-font-size_unit' ) {

        $font_size = 4;

    }

    // hero title
    if( $field_id == 'ut_google_front_page_hero_font_style-font-size_unit' ||
        $field_id == 'ut_front_page_hero_websafe_font_style-font-size_unit' ||
        $field_id == 'ut_front_page_hero_custom_font_style-font-size_unit' ||
        $field_id == 'ut_page_hero_font_size_unit' ) {

        $font_size = 20;

    }

    //hero description
    if( $field_id == 'ut_google_front_catchphrase_font_style-font-size_unit' ||
        $field_id == 'ut_front_catchphrase_websafe_font_style-font-size_unit' ||
        $field_id == 'ut_front_catchphrase_custom_font_style-font-size_unit' ||
        $field_id == 'ut_page_caption_description_websafe_font_style-font-size_unit' ) {

        $font_size = 3;

    }

    // blog hero slogan
    if( $field_id == 'ut_google_blog_catchphrase_top_font_style-font-size_unit' ||
        $field_id == 'ut_blog_catchphrase_top_websafe_font_style-font-size_unit' ||
        $field_id == 'ut_blog_catchphrase_top_custom_font_style-font-size_unit' ) {

        $font_size = 4;

    }

    // blog hero title
    if( $field_id == 'ut_google_blog_hero_font_style-font-size_unit' ||
        $field_id == 'ut_blog_hero_websafe_font_style-font-size_unit' ||
        $field_id == 'ut_blog_hero_custom_font_style-font-size_unit' ) {

        $font_size = 10;

    }

    // blog hero description
    if( $field_id == 'ut_google_blog_catchphrase_font_style-font-size_unit' ||
        $field_id == 'ut_blog_catchphrase_websafe_font_style-font-size_unit' ||
        $field_id == 'ut_blog_catchphrase_custom_font_style-font-size_unit' ) {

        $font_size = 3;

    }

    // Blog Posts Title - Classic + Grid + List
    if( $field_id == 'ut_global_blog_titles_font_style-font-size_unit' ||
        $field_id == 'ut_global_grid_blog_titles_font_style-font-size_unit' ||
        $field_id == 'ut_global_list_blog_titles_font_style-font-size_unit' ) {

        $font_size = 10;

    }

    return $font_size;

}

add_filter( 'ot_font_size_rem_high_range', '_ut_typography_dynamic_max_font_sizes_in_rem', 10, 2 );


/**
 * Adjust Font Size Field ( Max Font Size ) for Breakpoint Slider (em)
 *
 * @param int $font_size
 * @param string $field_id
 *
 * @return    int
 *
 * @access    private
 * @since     4.9.6.7
 * @version   1.0.0
 */

function _ut_typography_dynamic_max_font_sizes_in_em( $font_size, $field_id ){

    // site logo
    if( $field_id == 'ut_global_header_text_google_font_style-font-size_unit' ||
        $field_id == 'ut_global_header_text_logo_websafe_font_style-font-size_unit' ||
        $field_id == 'ut_global_header_text_logo_custom_font_style-font-size_unit' ) {

        $font_size = 3;

    }

    // hero slogan
    if( $field_id == 'ut_google_front_catchphrase_top_font_style-font-size_unit' ||
        $field_id == 'ut_front_catchphrase_top_websafe_font_style-font-size_unit' ||
        $field_id == 'ut_front_catchphrase_top_custom_font_style-font-size_unit' ||
        $field_id == 'ut_page_caption_description_top_websafe_font_style-font-size_unit' ) {

        $font_size = 4;

    }

    // hero title
    if( $field_id == 'ut_google_front_page_hero_font_style-font-size_unit' ||
        $field_id == 'ut_front_page_hero_websafe_font_style-font-size_unit' ||
        $field_id == 'ut_front_page_hero_custom_font_style-font-size_unit' ||
        $field_id == 'ut_page_hero_font_size_unit' ) {

        $font_size = 20;

    }

    //hero description
    if( $field_id == 'ut_google_front_catchphrase_font_style-font-size_unit' ||
        $field_id == 'ut_front_catchphrase_websafe_font_style-font-size_unit' ||
        $field_id == 'ut_front_catchphrase_custom_font_style-font-size_unit' ||
        $field_id == 'ut_page_caption_description_websafe_font_style-font-size_unit' ) {

        $font_size = 3;

    }

    // blog hero slogan
    if( $field_id == 'ut_google_blog_catchphrase_top_font_style-font-size_unit' ||
        $field_id == 'ut_blog_catchphrase_top_websafe_font_style-font-size_unit' ||
        $field_id == 'ut_blog_catchphrase_top_custom_font_style-font-size_unit' ) {

        $font_size = 4;

    }

    // blog hero title
    if( $field_id == 'ut_google_blog_hero_font_style-font-size_unit' ||
        $field_id == 'ut_blog_hero_websafe_font_style-font-size_unit' ||
        $field_id == 'ut_blog_hero_custom_font_style-font-size_unit' ) {

        $font_size = 10;

    }

    // blog hero description
    if( $field_id == 'ut_google_blog_catchphrase_font_style-font-size_unit' ||
        $field_id == 'ut_blog_catchphrase_websafe_font_style-font-size_unit' ||
        $field_id == 'ut_blog_catchphrase_custom_font_style-font-size_unit' ) {

        $font_size = 3;

    }

    // Blog Posts Title - Classic + Grid + List
    if( $field_id == 'ut_global_blog_titles_font_style-font-size_unit' ||
        $field_id == 'ut_global_grid_blog_titles_font_style-font-size_unit' ||
        $field_id == 'ut_global_list_blog_titles_font_style-font-size_unit' ) {

        $font_size = 10;

    }


    return $font_size;

}

add_filter( 'ot_font_size_em_high_range', '_ut_typography_dynamic_max_font_sizes_in_em', 10, 2 );


/**
 * Adjust Font Size Field ( Max Font Size ) for Breakpoint Slider (vw)
 *
 * @param int $font_size
 * @param string $field_id
 *
 * @return    int
 *
 * @access    private
 * @since     4.9.6.7
 * @version   1.0.0
 */

function _ut_typography_dynamic_max_font_sizes_in_vw( $font_size, $field_id ){

    // hero slogan
    if( $field_id == 'ut_google_front_catchphrase_top_font_style-font-size_unit' ||
        $field_id == 'ut_front_catchphrase_top_websafe_font_style-font-size_unit' ||
        $field_id == 'ut_front_catchphrase_top_custom_font_style-font-size_unit' ||
        $field_id == 'ut_page_caption_description_top_websafe_font_style-font-size_unit' ) {

        $font_size = 2;

    }

    // hero title
    if( $field_id == 'ut_google_front_page_hero_font_style-font-size_unit' ||
        $field_id == 'ut_front_page_hero_websafe_font_style-font-size_unit' ||
        $field_id == 'ut_front_page_hero_custom_font_style-font-size_unit' ||
        $field_id == 'ut_page_hero_font_size_unit' ) {

        $font_size = 8;

    }

    //hero description
    if( $field_id == 'ut_google_front_catchphrase_font_style-font-size_unit' ||
        $field_id == 'ut_front_catchphrase_websafe_font_style-font-size_unit' ||
        $field_id == 'ut_front_catchphrase_custom_font_style-font-size_unit' ||
        $field_id == 'ut_page_caption_description_websafe_font_style-font-size_unit' ) {

        $font_size = 1;

    }

    // blog hero slogan
    if( $field_id == 'ut_google_blog_catchphrase_top_font_style-font-size_unit' ||
        $field_id == 'ut_blog_catchphrase_top_websafe_font_style-font-size_unit' ||
        $field_id == 'ut_blog_catchphrase_top_custom_font_style-font-size_unit' ) {

        $font_size = 2;

    }

    // blog hero title
    if( $field_id == 'ut_google_blog_hero_font_style-font-size_unit' ||
        $field_id == 'ut_blog_hero_websafe_font_style-font-size_unit' ||
        $field_id == 'ut_blog_hero_custom_font_style-font-size_unit' ) {

        $font_size = 5;

    }

    // blog hero description
    if( $field_id == 'ut_google_blog_catchphrase_font_style-font-size_unit' ||
        $field_id == 'ut_blog_catchphrase_websafe_font_style-font-size_unit' ||
        $field_id == 'ut_blog_catchphrase_custom_font_style-font-size_unit' ) {

        $font_size = 1;

    }

    // Blog Posts Title - Classic + Grid + List
    if( $field_id == 'ut_global_blog_titles_font_style-font-size_unit' ||
        $field_id == 'ut_global_grid_blog_titles_font_style-font-size_unit' ||
        $field_id == 'ut_global_list_blog_titles_font_style-font-size_unit' ) {

        $font_size = 5;

    }

    return $font_size;

}

add_filter( 'ot_font_size_vw_high_range', '_ut_typography_dynamic_max_font_sizes_in_vw', 10, 2 );


/**
 * Adjust Font Size Field ( Max Font Size ) for Breakpoint Slider (vh)
 *
 * @param int $font_size
 * @param string $field_id
 *
 * @return    int
 *
 * @access    private
 * @since     4.9.6.7
 * @version   1.0.0
 */

function _ut_typography_dynamic_max_font_sizes_in_vh( $font_size, $field_id ){

    // hero slogan
    if( $field_id == 'ut_google_front_catchphrase_top_font_style-font-size_unit' ||
        $field_id == 'ut_front_catchphrase_top_websafe_font_style-font-size_unit' ||
        $field_id == 'ut_front_catchphrase_top_custom_font_style-font-size_unit' ||
        $field_id == 'ut_page_caption_description_top_websafe_font_style-font-size_unit' ) {

        $font_size = 4;

    }

    // hero title
    if( $field_id == 'ut_google_front_page_hero_font_style-font-size_unit' ||
        $field_id == 'ut_front_page_hero_websafe_font_style-font-size_unit' ||
        $field_id == 'ut_front_page_hero_custom_font_style-font-size_unit' ||
        $field_id == 'ut_page_hero_font_size_unit' ) {

        $font_size = 15;

    }

    //hero description
    if( $field_id == 'ut_google_front_catchphrase_font_style-font-size_unit' ||
        $field_id == 'ut_front_catchphrase_websafe_font_style-font-size_unit' ||
        $field_id == 'ut_front_catchphrase_custom_font_style-font-size_unit' ||
        $field_id == 'ut_page_caption_description_websafe_font_style-font-size_unit' ) {

        $font_size = 3;

    }

    // blog hero slogan
    if( $field_id == 'ut_google_blog_catchphrase_top_font_style-font-size_unit' ||
        $field_id == 'ut_blog_catchphrase_top_websafe_font_style-font-size_unit' ||
        $field_id == 'ut_blog_catchphrase_top_custom_font_style-font-size_unit' ) {

        $font_size = 4;

    }

    // blog hero title
    if( $field_id == 'ut_google_blog_hero_font_style-font-size_unit' ||
        $field_id == 'ut_blog_hero_websafe_font_style-font-size_unit' ||
        $field_id == 'ut_blog_hero_custom_font_style-font-size_unit' ) {

        $font_size = 8;

    }

    // blog hero description
    if( $field_id == 'ut_google_blog_catchphrase_font_style-font-size_unit' ||
        $field_id == 'ut_blog_catchphrase_websafe_font_style-font-size_unit' ||
        $field_id == 'ut_blog_catchphrase_custom_font_style-font-size_unit' ) {

        $font_size = 3;

    }

    // Blog Posts Title - Classic + Grid + List
    if( $field_id == 'ut_global_blog_titles_font_style-font-size_unit' ||
        $field_id == 'ut_global_grid_blog_titles_font_style-font-size_unit' ||
        $field_id == 'ut_global_list_blog_titles_font_style-font-size_unit' ) {

        $font_size = 8;

    }

    return $font_size;

}

add_filter( 'ot_font_size_vh_high_range', '_ut_typography_dynamic_max_font_sizes_in_vh', 10, 2 );


/**
 * Adjust Font Size Field ( Max Font Size )
 *
 * @param int $font_size
 * @param string $field_id
 *
 * @return    int
 *
 * @access    private
 * @since     4.0
 * @version   1.0.0
 */

function _ut_typography_min_font_sizes( $font_size, $field_id ){

    if( $field_id == 'ut_global_header_text_google_font_style' || $field_id == 'ut_global_header_text_logo_websafe_font_style' || $field_id == 'ut_global_header_text_logo_custom_font_style' ) {

        $font_size = 12;

    }

    return $font_size;

}

add_filter( 'ot_font_size_low_range', '_ut_typography_min_font_sizes', 10, 2 );


/** 
 * Use default letter spacing option
 *
 * @param     array $field
 * @param     string $field_id
 *
 * @return    array
 *
 * @access    private
 * @since     4.5.1.2
 * @version   1.0.0
 */

function _ut_default_letter_spacing( $field, $field_id ){

    return $field;

}

add_filter( 'ot_letter_spacing_option_type', '_ut_default_letter_spacing', 10, 2 );


/** 
 * Remove letter spacing to google font
 *
 * @param     array $field
 * @param     string $field_id
 *
 * @return    mixed
 *
 * @access    private
 * @since     4.5.1.2
 * @version   1.0.0
 */

function _ut_remove_letter_spacing_from_google_font( $field, $field_id ){

	if( $field_id == 'ut_google_page_hero_font_style' ) {

	    return false;

	}

    return $field;

}

add_filter( 'ot_letter_spacing_for_google_font', '_ut_remove_letter_spacing_from_google_font', 10, 2 );


/** 
 * Adjust EM Min Val
 *
 * @param     int $field
 * @param     string $field_id
 *
 * @return    int
 *
 * @access    private
 * @since     4.1
 * @version   1.0.0
 */

function _ut_typography_em_min_sizes( $field, $field_id ){

    if( $field_id == 'ut_global_hero_catchphrase_websafe_font_style' || $field_id == 'ut_front_catchphrase_websafe_font_style' || $field_id == 'ut_blog_catchphrase_websafe_font_style' || $field_id == 'ut_page_caption_description_websafe_font_style' ) {

        $field = 0.1;

    }

    if( $field_id == 'ut_page_main_hrbtn' || $field_id == 'ut_page_second_hrbtn' || strpos( $field_id, 'ut_header_extra_buttons' ) !== false ) {

        $field = 0.2;

    }

    return $field;

}

add_filter( 'ot_letter_spacing_high_range', '_ut_typography_em_min_sizes', 10, 2 );



/** 
 * Adjust EM High Val
 *
 * @param     int $field
 * @param     string $field_id
 *
 * @return    int
 *
 * @access    private
 * @since     4.1
 * @version   1.0.0
 */

function _ut_typography_em_high_sizes( $field, $field_id ){

    if( $field_id == 'ut_global_hero_catchphrase_websafe_font_style' || $field_id == 'ut_front_catchphrase_websafe_font_style' || $field_id == 'ut_blog_catchphrase_websafe_font_style' || $field_id == 'ut_page_caption_description_websafe_font_style' ) {

        $field = 1;

    }

    if( $field_id == 'ut_page_main_hrbtn' || $field_id == 'ut_page_second_hrbtn' || strpos( $field_id, 'ut_header_extra_buttons' ) !== false ) {

        $field = -0.2;

    }

    return $field;

}

add_filter( 'ot_letter_spacing_low_range', '_ut_typography_em_high_sizes', 10, 2 );



/** 
 * Adjust EM Interval
 *
 * @param     int $field
 * @param     string $field_id
 *
 * @return    int
 *
 * @access    private
 * @since     4.1
 * @version   1.0.0
 */

function _ut_typography_em_interval( $field, $field_id ){

    if( $field_id == 'ut_global_hero_catchphrase_websafe_font_style' || $field_id == 'ut_front_catchphrase_websafe_font_style' || $field_id == 'ut_blog_catchphrase_websafe_font_style' || $field_id == 'ut_page_caption_description_websafe_font_style' ) {

        $field = 0.1;

    }

    if( $field_id == 'ut_page_main_hrbtn' || $field_id == 'ut_page_second_hrbtn' || strpos( $field_id, 'ut_header_extra_buttons' ) !== false ) {

        $field = 0.01;

    }

    return $field;

}

add_filter( 'ot_letter_spacing_range_interval', '_ut_typography_em_interval', 10, 2 );




/** 
 * Add Percent Interval
 *
 * @param     string $field
 * @param     string $field_id
 *
 * @return    string
 *
 * @access    private
 * @since     4.5
 * @version   1.0.0
 */

function _ut_typography_percent_for_font_line_height( $field, $field_id ){



    return $field;

}

add_filter( 'ot_line_height_unit_type', '_ut_typography_percent_for_font_line_height', 10, 2 );



/**
 * Ling Height Low Range
 *
 * @param     int $field
 * @param     string $field_id
 *
 * @return    int
 *
 * @access    private
 * @since     4.5
 * @version   1.0.0
 */

function _ut_typography_font_line_height_low_range( $field, $field_id ){


    return $field;

}

add_filter( 'ot_line_height_low_range', '_ut_typography_font_line_height_low_range', 10, 2 );


/**
 * Ling Height High Range
 *
 * @param     int $field
 * @param     string $field_id
 *
 * @return    int
 *
 * @access    private
 * @since     4.5
 * @version   1.0.0
 */

function _ut_typography_font_line_height_high_range( $field, $field_id ){

    if( $field_id == 'ut_google_front_page_hero_font_style' || $field_id == 'ut_front_page_hero_custom_font_style' || $field_id == 'ut_front_page_hero_websafe_font_style' ) {

        $field = '310';

    }


    return $field;

}

add_filter( 'ot_line_height_high_range', '_ut_typography_font_line_height_high_range', 10, 2 );


/**
 * Adjust Line Height Field ( Max Line Height ) for Breakpoint Slider (px)
 *
 * @param int $field
 * @param string $field_id
 *
 * @return    int
 *
 * @access    private
 * @since     4.9.6.7
 * @version   1.0.0f
 */

function _ut_typography_dynamic_max_line_height_in_px( $field, $field_id ){

    if( $field_id == 'ut_google_front_page_hero_font_style-line-height_unit' ||
        $field_id == 'ut_front_page_hero_custom_font_style-line-height_unit' ||
        $field_id == 'ut_front_page_hero_websafe_font_style-line-height_unit' ) {

        $field = 310;

    }

    if( $field_id == 'section_title_line_height' || $field_id == 'page_title_line_height' ) {

        $field = 400;

    }


    return $field;

}

add_filter( 'ot_line_height_px_high_range', '_ut_typography_dynamic_max_line_height_in_px', 10, 2 );


/**
 * Adjust Line Height Field ( Max Line Height ) for Breakpoint Slider (percent)
 *
 * @param int $field
 * @param string $field_id
 *
 * @return    int
 *
 * @access    private
 * @since     4.9.6.7
 * @version   1.0.0f
 */

function _ut_typography_dynamic_max_line_height_in_percent( $field, $field_id ){



    return $field;

}

add_filter( 'ot_line_height_percent_high_range', '_ut_typography_dynamic_max_line_height_in_percent', 10, 2 );



/**
 * Adjust Line Height Field ( Max Line Height ) for Breakpoint Slider (rem)
 *
 * @param int $field
 * @param string $field_id
 *
 * @return    int
 *
 * @access    private
 * @since     4.9.6.7
 * @version   1.0.0
 */

function _ut_typography_dynamic_max_line_height_in_rem( $field, $field_id ){

    // site logo
    if( $field_id == 'ut_global_header_text_google_font_style-line-height_unit' ||
        $field_id == 'ut_global_header_text_logo_websafe_font_style-line-height_unit' ||
        $field_id == 'ut_global_header_text_logo_custom_font_style-line-height_unit' ) {

        $field = 3;

    }

    // hero slogan
    if( $field_id == 'ut_google_front_catchphrase_top_font_style-line-height_unit' ||
        $field_id == 'ut_front_catchphrase_top_websafe_font_style-line-height_unit' ||
        $field_id == 'ut_front_catchphrase_top_custom_font_style-line-height_unit' ||
        $field_id == 'ut_page_caption_description_top_websafe_font_style-line-height_unit' ) {

        $field = 4;

    }

    // hero title
    if( $field_id == 'ut_google_front_page_hero_font_style-line-height_unit' ||
        $field_id == 'ut_front_page_hero_websafe_font_style-line-height_unit' ||
        $field_id == 'ut_front_page_hero_custom_font_style-line-height_unit' ||
        $field_id == 'ut_page_hero_font_size_unit' ) {

        $field = 24;

    }

    //hero description
    if( $field_id == 'ut_google_front_catchphrase_font_style-line-height_unit' ||
        $field_id == 'ut_front_catchphrase_websafe_font_style-line-height_unit' ||
        $field_id == 'ut_front_catchphrase_custom_font_style-line-height_unit' ||
        $field_id == 'ut_page_caption_description_websafe_font_style-line-height_unit' ) {

        $field = 3;

    }

    // blog hero slogan
    if( $field_id == 'ut_google_blog_catchphrase_top_font_style-line-height_unit' ||
        $field_id == 'ut_blog_catchphrase_top_websafe_font_style-line-height_unit' ||
        $field_id == 'ut_blog_catchphrase_top_custom_font_style-line-height_unit' ) {

        $field = 4;

    }

    // blog hero title
    if( $field_id == 'ut_google_blog_hero_font_style-line-height_unit' ||
        $field_id == 'ut_blog_hero_websafe_font_style-line-height_unit' ||
        $field_id == 'ut_blog_hero_custom_font_style-line-height_unit' ) {

        $field = 10;

    }

    // blog hero description
    if( $field_id == 'ut_google_blog_catchphrase_font_style-line-height_unit' ||
        $field_id == 'ut_blog_catchphrase_websafe_font_style-line-height_unit' ||
        $field_id == 'ut_blog_catchphrase_custom_font_style-line-height_unit' ) {

        $field = 3;

    }

    // Blog Posts Title - Classic + Grid + List
    if( $field_id == 'ut_global_blog_titles_font_style-line-height_unit' ||
        $field_id == 'ut_global_grid_blog_titles_font_style-line-height_unit' ||
        $field_id == 'ut_global_list_blog_titles_font_style-line-height_unit' ) {

        $field = 10;

    }

    return $field;

}

add_filter( 'ot_line_height_rem_high_range', '_ut_typography_dynamic_max_line_height_in_rem', 10, 2 );


/**
 * Adjust Line Height Field ( Max Line Height ) for Breakpoint Slider (em)
 *
 * @param int $field
 * @param string $field_id
 *
 * @return    int
 *
 * @access    private
 * @since     4.9.6.7
 * @version   1.0.0
 */

function _ut_typography_dynamic_max_line_height_in_em( $field, $field_id ){

    // site logo
    if( $field_id == 'ut_global_header_text_google_font_style-line-height_unit' ||
        $field_id == 'ut_global_header_text_logo_websafe_font_style-line-height_unit' ||
        $field_id == 'ut_global_header_text_logo_custom_font_style-line-height_unit' ) {

        $field = 3;

    }

    // hero slogan
    if( $field_id == 'ut_google_front_catchphrase_top_font_style-line-height_unit' ||
        $field_id == 'ut_front_catchphrase_top_websafe_font_style-line-height_unit' ||
        $field_id == 'ut_front_catchphrase_top_custom_font_style-line-height_unit' ||
        $field_id == 'ut_page_caption_description_top_websafe_font_style-line-height_unit' ) {

        $field = 4;

    }

    // hero title
    if( $field_id == 'ut_google_front_page_hero_font_style-line-height_unit' ||
        $field_id == 'ut_front_page_hero_websafe_font_style-line-height_unit' ||
        $field_id == 'ut_front_page_hero_custom_font_style-line-height_unit' ||
        $field_id == 'ut_page_hero_font_size_unit' ) {

        $field = 24;

    }

    //hero description
    if( $field_id == 'ut_google_front_catchphrase_font_style-line-height_unit' ||
        $field_id == 'ut_front_catchphrase_websafe_font_style-line-height_unit' ||
        $field_id == 'ut_front_catchphrase_custom_font_style-line-height_unit' ||
        $field_id == 'ut_page_caption_description_websafe_font_style-line-height_unit' ) {

        $field = 3;

    }

    // blog hero slogan
    if( $field_id == 'ut_google_blog_catchphrase_top_font_style-line-height_unit' ||
        $field_id == 'ut_blog_catchphrase_top_websafe_font_style-line-height_unit' ||
        $field_id == 'ut_blog_catchphrase_top_custom_font_style-line-height_unit' ) {

        $field = 4;

    }

    // blog hero title
    if( $field_id == 'ut_google_blog_hero_font_style-line-height_unit' ||
        $field_id == 'ut_blog_hero_websafe_font_style-line-height_unit' ||
        $field_id == 'ut_blog_hero_custom_font_style-line-height_unit' ) {

        $field = 10;

    }

    // blog hero description
    if( $field_id == 'ut_google_blog_catchphrase_font_style-line-height_unit' ||
        $field_id == 'ut_blog_catchphrase_websafe_font_style-line-height_unit' ||
        $field_id == 'ut_blog_catchphrase_custom_font_style-line-height_unit' ) {

        $field = 3;

    }

    // Blog Posts Title - Classic + Grid + List
    if( $field_id == 'ut_global_blog_titles_font_style-line-height_unit' ||
        $field_id == 'ut_global_grid_blog_titles_font_style-line-height_unit' ||
        $field_id == 'ut_global_list_blog_titles_font_style-line-height_unit' ) {

        $field = 10;

    }

    return $field;

}

add_filter( 'ot_line_height_em_high_range', '_ut_typography_dynamic_max_line_height_in_em', 10, 2 );


/**
 * Adjust Line Height Field ( Max Line Height ) for Breakpoint Slider (vh)
 *
 * @param int $field
 * @param string $field_id
 *
 * @return    int
 *
 * @access    private
 * @since     4.9.6.7
 * @version   1.0.0
 */

function _ut_typography_dynamic_max_line_height_in_vh( $field, $field_id ){

    // hero slogan
    if( $field_id == 'ut_google_front_catchphrase_top_font_style-line-height_unit' ||
        $field_id == 'ut_front_catchphrase_top_websafe_font_style-line-height_unit' ||
        $field_id == 'ut_front_catchphrase_top_custom_font_style-line-height_unit' ||
        $field_id == 'ut_page_caption_description_top_websafe_font_style-line-height_unit' ) {

        $field = 5;

    }

    // hero title
    if( $field_id == 'ut_google_front_page_hero_font_style-line-height_unit' ||
        $field_id == 'ut_front_page_hero_websafe_font_style-line-height_unit' ||
        $field_id == 'ut_front_page_hero_custom_font_style-line-height_unit' ||
        $field_id == 'ut_page_hero_font_size_unit' ) {

        $field = 18;

    }

    //hero description
    if( $field_id == 'ut_google_front_catchphrase_font_style-line-height_unit' ||
        $field_id == 'ut_front_catchphrase_websafe_font_style-line-height_unit' ||
        $field_id == 'ut_front_catchphrase_custom_font_style-line-height_unit' ||
        $field_id == 'ut_page_caption_description_websafe_font_style-line-height_unit' ) {

        $field = 4;

    }

    // blog hero slogan
    if( $field_id == 'ut_google_blog_catchphrase_top_font_style-line-height_unit' ||
        $field_id == 'ut_blog_catchphrase_top_websafe_font_style-line-height_unit' ||
        $field_id == 'ut_blog_catchphrase_top_custom_font_style-line-height_unit' ) {

        $field = 5;

    }

    // blog hero title
    if( $field_id == 'ut_google_blog_hero_font_style-line-height_unit' ||
        $field_id == 'ut_blog_hero_websafe_font_style-line-height_unit' ||
        $field_id == 'ut_blog_hero_custom_font_style-line-height_unit' ) {

        $field = 9;

    }

    // blog hero description
    if( $field_id == 'ut_google_blog_catchphrase_font_style-line-height_unit' ||
        $field_id == 'ut_blog_catchphrase_websafe_font_style-line-height_unit' ||
        $field_id == 'ut_blog_catchphrase_custom_font_style-line-height_unit' ) {

        $field = 4;

    }

    // Blog Posts Title - Classic + Grid + List
    if( $field_id == 'ut_global_blog_titles_font_style-line-height_unit' ||
        $field_id == 'ut_global_grid_blog_titles_font_style-line-height_unit' ||
        $field_id == 'ut_global_list_blog_titles_font_style-line-height_unit' ) {

        $field = 9;

    }

    return $field;

}

add_filter( 'ot_line_height_vh_high_range', '_ut_typography_dynamic_max_line_height_in_vh', 10, 2 );


/**
 * Adjust Line Height Field ( Max Line Height ) for Breakpoint Slider (vh)
 *
 * @param int $field
 * @param string $field_id
 *
 * @return    int
 *
 * @access    private
 * @since     4.9.6.7
 * @version   1.0.0
 */

function _ut_typography_dynamic_max_line_height_in_vw( $field, $field_id ){

    // hero slogan
    if( $field_id == 'ut_google_front_catchphrase_top_font_style-line-height_unit' ||
        $field_id == 'ut_front_catchphrase_top_websafe_font_style-line-height_unit' ||
        $field_id == 'ut_front_catchphrase_top_custom_font_style-line-height_unit' ||
        $field_id == 'ut_page_caption_description_top_websafe_font_style-line-height_unit' ) {

        $field = 2;

    }

    // hero title
    if( $field_id == 'ut_google_front_page_hero_font_style-line-height_unit' ||
        $field_id == 'ut_front_page_hero_websafe_font_style-line-height_unit' ||
        $field_id == 'ut_front_page_hero_custom_font_style-line-height_unit' ||
        $field_id == 'ut_page_hero_font_size_unit' ) {

        $field = 10;

    }

    //hero description
    if( $field_id == 'ut_google_front_catchphrase_font_style-line-height_unit' ||
        $field_id == 'ut_front_catchphrase_websafe_font_style-line-height_unit' ||
        $field_id == 'ut_front_catchphrase_custom_font_style-line-height_unit' ||
        $field_id == 'ut_page_caption_description_websafe_font_style-line-height_unit' ) {

        $field = 1;

    }

    // blog hero slogan
    if( $field_id == 'ut_google_blog_catchphrase_top_font_style-line-height_unit' ||
        $field_id == 'ut_blog_catchphrase_top_websafe_font_style-line-height_unit' ||
        $field_id == 'ut_blog_catchphrase_top_custom_font_style-line-height_unit' ) {

        $field = 2;

    }

    // blog hero title
    if( $field_id == 'ut_google_blog_hero_font_style-line-height_unit' ||
        $field_id == 'ut_blog_hero_websafe_font_style-line-height_unit' ||
        $field_id == 'ut_blog_hero_custom_font_style-line-height_unit' ) {

        $field = 5;

    }

    // blog hero description
    if( $field_id == 'ut_google_blog_catchphrase_font_style-line-height_unit' ||
        $field_id == 'ut_blog_catchphrase_websafe_font_style-line-height_unit' ||
        $field_id == 'ut_blog_catchphrase_custom_font_style-line-height_unit' ) {

        $field = 1;

    }

    // Blog Posts Title - Classic + Grid + List
    if( $field_id == 'ut_global_blog_titles_font_style-line-height_unit' ||
        $field_id == 'ut_global_grid_blog_titles_font_style-line-height_unit' ||
        $field_id == 'ut_global_list_blog_titles_font_style-line-height_unit' ) {

        $field = 5;

    }

    return $field;

}

add_filter( 'ot_line_height_vw_high_range', '_ut_typography_dynamic_max_line_height_in_vw', 10, 2 );

/** 
 * Mega Menu Border Settings
 *
 * @param     array $field
 * @param     string $field_id
 *
 * @return    array
 *
 * @access    private
 * @since     4.5.1.2
 * @version   1.0.0
 */

function _ut_default_megamenu_border_settings( $field, $field_id ){

    if( $field_id == 'ut_navigation_ps_sl_mm_border' ) {

        $field = array_diff(  $field, array( 'top', 'right', 'bottom', 'padding' ) );

    }

    if( $field_id == 'ut_navigation_ss_sl_mm_border' ) {

        $field = array_diff(  $field, array( 'top', 'right', 'bottom', 'padding', 'border-style', 'border-width' ) );

    }

    if( $field_id == 'ut_top_header_border_bottom_style' ) {

        $field = array_diff(  $field, array( 'top', 'right', 'left', 'padding' ) );

    }

    if( $field_id == 'ut_top_header_border_separator_style'  ) {

        $field = array_diff(  $field, array( 'top', 'bottom', 'left', 'padding' ) );

    }

    if( $field_id == 'ut_top_header_shopping_cart_item_separator' || $field_id == 'ut_navigation_ps_shopping_cart_item_separator' || $field_id == 'ut_navigation_ss_shopping_cart_item_separator' ) {

        $field = array_diff(  $field, array( 'top', 'right', 'left', 'padding' ) );

    }

    if( $field_id == 'ut_navigation_ps_sl_borders' ) {

        $field = array_diff(  $field, array( 'top', 'padding', 'border-style' ) );

    }

    if( $field_id == 'ut_navigation_ss_sl_borders' ) {

        $field = array_diff(  $field, array( 'top', 'padding', 'border-style', 'border-width' ) );

    }

    return $field;

}

add_filter( 'ut_recognized_border_fields', '_ut_default_megamenu_border_settings', 10, 2 );



/** 
 * Mega Menu Border max Width
 *
 * @param     int $field
 * @param     string $field_id
 *
 * @return    int
 *
 * @access    private
 * @since     4.5.1.2
 * @version   1.0.0
 */

function _ut_default_megamenu_border_max_width( $field, $field_id ){

    if( $field_id == 'ut_navigation_ps_sl_mm_border' || $field_id == 'ut_navigation_ss_sl_mm_border' ) {

        $field = '4';

    }

    if( $field_id == 'ut_top_header_border_separator_style' || $field_id == 'ut_top_header_border_bottom_style' || $field_id == 'ut_top_header_shopping_cart_item_separator' || $field_id == 'ut_navigation_ps_shopping_cart_item_separator' || $field_id == 'ut_navigation_ss_shopping_cart_item_separator' ) {

        $field = '10';

    }

    if( $field_id == 'ut_navigation_ps_sl_borders' || $field_id == 'ut_navigation_ss_sl_borders' ) {

        $field = '10';

    }

    return $field;

}

add_filter( 'ut_recognized_border_max_width', '_ut_default_megamenu_border_max_width', 10, 2 );



/** 
 * Mega Menu Border min Width
 *
 * @param     int $field
 * @param     string $field_id
 *
 * @return    int
 *
 * @access    private
 * @since     4.5.0
 * @version   1.0.0
 */

function _ut_default_megamenu_border_min_width( $field, $field_id ){

    if( $field_id == 'ut_navigation_ps_sl_borders' || $field_id == 'ut_navigation_ss_sl_borders' ) {

        $field = '0';

    }

    return $field;

}

add_filter( 'ut_recognized_border_min_width', '_ut_default_megamenu_border_min_width', 10, 2 );




/** 
 * Remove Row Actions
 *
 * @return    array
 *
 * @access    private
 * @since     4.1.1
 * @version   1.0.0
 */
function _ut_remove_row_actions_post( $actions ) {
    
    if( get_post_type() === 'portfolio-manager' ) {
        unset( $actions['view'] );
    }    
    
    if( get_post_type() === 'ut-table-manager' ) {
        unset( $actions['view'] );
    } 
    
    return $actions;    

}

add_filter( 'post_row_actions', '_ut_remove_row_actions_post', 10, 1 );


/** 
 * Remove Slider Revolution MetaBoxes
 *
 * @todo move
 *
 * @access    private
 * @since     4.1.1
 * @version   1.0.0
 */

function remove_revolution_slider_meta_boxes() {
    
    $post_types = get_post_types();
    
    foreach ( $post_types as $post_type ) {
        
        if ( 'post' != $post_type ) {
            remove_meta_box( 'mymetabox_revslider_0', $post_type, 'normal' );
        }
        
    }
    
}

add_action( 'do_meta_boxes', 'remove_revolution_slider_meta_boxes' );



/** 
 * Add Custom Mailm Chimps Skins
 *
 * @return    array
 *
 * @access    private
 * @since     4.5
 * @version   1.0.0
 */	

function _ut_register_mc4wp_skins( $css_options ) {

    $mc4wp_color_skins = ot_get_option("ut_mailchimp_color_skins");

    if( !empty( $mc4wp_color_skins ) && is_array( $mc4wp_color_skins ) ) {

        foreach( $mc4wp_color_skins as $skin ) {

            $css_options[__( 'Brooklyn Themes', 'unitedthemes' )][$skin["unique_id"]] = $skin["title"];

        }

    }

    return $css_options;

}

add_filter( 'mc4wp_admin_form_css_options', '_ut_register_mc4wp_skins', 90, 1 );




/** 
 * Adjust Button Builder Fields
 *
 * @param     array $field
 * @param     string $field_id
 *
 * @return    array
 *
 * @access    private
 * @since     4.9
 * @version   1.0.0
 */

function _ut_button_builder_fields( $field, $field_id ){

    if( $field_id == 'ut_top_header_shopping_cart_view_cart_button' || $field_id == 'ut_top_header_shopping_cart_checkout_button' ) {

        $field = array_diff(  $field, array( 'link-settings' ) );

    }

    return $field;

}

add_filter( 'ot_recognized_button_builder_fields', '_ut_button_builder_fields', 10, 2 );


/** 
 * Adjust Border Builder Fields
 *
 * @param     array $field
 * @param     string $field_id
 *
 * @return    array
 *
 * @access    private
 * @since     4.9
 * @version   1.0.0
 */

function _ut_border_builder_fields( $field, $field_id ){

    if( $field_id == 'ut_top_header_border_separator_style' || $field_id == 'ut_top_header_border_bottom_style' ) {

        $field = array_diff( $field, array( 'none' ) );

    }

    return $field;

}

add_filter( 'ot_recognized_border_styles', '_ut_border_builder_fields', 10, 2 );


/** 
 * Restrict CSS Animations
 *
 * @param     array $field
 * @param     string $field_id
 *
 * @return    array
 *
 * @access    private
 * @since     4.9
 * @version   1.0.0
 */

function _ut_css_animation_effects( $field, $field_id ){

    if( $field_id == 'ut_global_hero_caption_animation_effect_split' || $field_id == 'ut_page_hero_caption_animation_effect_split' ) {

        $field = array(

            'BrooklynFadeInDown'          => 'Brooklyn Fade In Down',
            'BrooklynFadeInDownShortCut'  => 'Brooklyn Fade In Down Short Cut',
            'BrooklynFadeInLeft'          => 'Brooklyn Fade In Left',
            'BrooklynFadeInRight'         => 'Brooklyn Fade In Right',
            'BrooklynFadeInLeftShort'     => 'Brooklyn Fade In Left Short',
            'BrooklynFadeInRightShort'    => 'Brooklyn Fade In Right Short'

        );

    }

    return $field;

}

add_filter( 'ot_recognized_animation_in_effects', '_ut_css_animation_effects', 10, 2 );


/**
 * Adjust Custom Cursor Skins
 *
 * @param     array $field
 * @param     string $field_id
 *
 * @return    array
 *
 * @access    private
 * @since     4.9.5
 * @version   1.0.0
 */

function _ut_cursor_skins( $field, $field_id ){

	$cursor_color_skins = ot_get_option("ut_custom_cursor_custom_skins");

	if( !empty( $cursor_color_skins ) && is_array( $cursor_color_skins ) ) {

		foreach( $cursor_color_skins as $skin ) {

			$field[] = array(
				'value' => $skin['unique_id'],
				'label' => $skin['title']
			);

		}

	}

	return $field;

}

add_filter( 'ot_recognized_custom_cursors', '_ut_cursor_skins', 10, 2 );


/**
 * All Typography Options
 *
 * @param     array $field
 * @param     string $field_id
 *
 * @return    array
 *
 * @access    private
 * @since     4.9.6.7
 * @version   1.0.0
 */

if ( !function_exists( 'ot_recognized_typography_settings' ) ) {

    function ot_recognized_typography_settings( $field_id = '' ) {

        return apply_filters( 'ot_recognized_typography_settings', array(
            'ut_global_header_text_logo_font_type'  => 'Text Logo Font',
            'ut_global_navigation_font_type'        => 'Navigation Font',
            'ut_global_navigation_submenu_font_type'=> 'Navigation Submenu Font',
            'ut_body_font_type'                     => 'Body Font Face',
            'ut_global_h1_font_type'                => 'Content Headline: H1',
            'ut_global_h2_font_type'                => 'Content Headline: H2',
            'ut_global_h3_font_type'                => 'Content Headline: H3',
            'ut_global_h4_font_type'                => 'Content Headline: H4',
            'ut_global_h5_font_type'                => 'Content Headline: H5',
            'ut_global_h6_font_type'                => 'Content Headline: H6',
        ), $field_id );

    }

}