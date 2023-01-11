<?php

class UT_Admin_Loader {

    /**
     * This method loads other methods of the class.
     *
     * @return    void
     *
     * @access    public
     * @since     2.0
     */
    public function __construct() {



    }

    /**
     * Extra Classes for Dashboard
     *
     * @param     array
     * @return    string
     *
     * @access    private
     * @since     4.1
     */

    function dashboard_body_classes( $classes ){

        $classes = explode(' ', $classes);

        if( isset( $_GET['page'] ) && ( $_GET['page'] == 'ut_theme_options' || $_GET['page'] == 'unite-header-manager' || $_GET['page'] == 'ut-demo-importer' || $_GET['page'] == 'ut-demo-importer-reloaded' || $_GET['page'] == 'unite-theme-info' || $_GET['page'] == 'unite-welcome-page' || $_GET['page'] == 'unite-video-tutorials' || $_GET['page'] == 'unite-manage-license' || $_GET['page'] == 'unite-import-export' ) ) {

            $classes[] = 'ut-theme-backend';

            if( ot_get_option( 'ut_site_layout', 'onepage' ) == 'onepage' ) {

                $classes[] = 'ut-theme-backend-onepage';

            }

        }

        if( isset( $_GET['page'] ) && $_GET['page'] == 'unite-theme-info' ) {

            $classes[] = 'ut-theme-info-page';

        }

        if( isset( $_GET['page'] ) && $_GET['page'] == 'ut-demo-importer-reloaded' ) {

            $classes[] = 'ut-demo-importer-page';

        }

        if( isset( $_GET['page'] ) && $_GET['page'] == 'unite-welcome-page' ) {

            $classes[] = 'ut-welcome-page';

        }

        if( isset( $_GET['page'] ) && $_GET['page'] == 'unite-video-tutorials' ) {

            $classes[] = 'ut-video-tutorials-page';

        }

        if( isset( $_GET['page'] ) && $_GET['page'] == 'ut_theme_options' ) {

            $classes[] = 'ut-theme-options-page';

        }

        if( isset( $_GET['page'] ) && $_GET['page'] == 'unite-header-manager' ) {

            $classes[] = 'ut-theme-header-manager';

        }

        return implode(' ', $classes);

    }


    /**
     * Brooklyn Menu Order
     *
     * @param     array
     * @return    mixed
     *
     * @access    private
     * @since     4.2
     */

    function dashboard_menu_custom_order( $menu_ord )  {

        global $submenu;

        $arr = array();

        // Brooklyn Menu Order
        $order = array(
            'unite-welcome-page',
            'unite-manage-license',
            'ut_theme_options',
            'unite-theme-info',
            'ut-demo-importer-reloaded',
            'unite-video-tutorials',
            'ut_sidebar_settings',
            'edit-tags.php?taxonomy=unite_custom_fonts',
            'unite-import-export',
        );

        $new_order = array();

        foreach( $order as $order_key => $brookly_admin_page ) {

            if( isset( $submenu['unite-welcome-page'] ) ) {

                foreach ( $submenu['unite-welcome-page'] as $current_key => $brookly_admin_page_config ) {

                    if ( $brookly_admin_page == $brookly_admin_page_config[2] ) {

                        $new_order[] = $brookly_admin_page_config;

                    }

                }

            }

        }

        $submenu['unite-welcome-page'] = $new_order;

        return $menu_ord;

    }


    /**
     * Fake the gallery shortcode
     *
     * The JS takes over and creates the actual shortcode with
     * the real attachment IDs on the fly. Here we just need to
     * pass in the post ID to get the ball rolling.
     *
     * @param     array     The current settings
     * @param     object    The post object
     *
     * @return    array
     *
     * @access    public
     * @since     4.6.5
     */

    public function shortcode( $settings, $post ) {

        global $pagenow;

        if ( in_array( $pagenow, array( 'upload.php', 'customize.php' ) ) ) {
            return $settings;
        }

        // Set the OptionTree post ID
        if ( ! is_object( $post ) ) {

            $post_id = isset( $_GET['post'] ) ? $_GET['post'] : ( isset( $_GET['post_ID'] ) ? $_GET['post_ID'] : 0 );

            if ( $post_id == 0 && function_exists( 'ot_get_media_post_ID' ) ) {

                $post_id = ot_get_media_post_ID();

            }

            $settings['post']['id'] = $post_id;

        }

        // No ID return settings
        if ( $settings['post']['id'] == 0 ) {
            return $settings;
        }

        // Set the fake shortcode
        $settings['ut_gallery'] = array( 'shortcode' => "[gallery id='{$settings['post']['id']}']" );

        // Return settings
        return $settings;

    }

    /**
     * Returns the AJAX images
     *
     * @return    void
     *
     * @access    public
     * @since     4.6.5
     */

    public function ajax_gallery_update() {

        if ( ! empty( $_POST['ids'] ) ) {

            $return = '';

            foreach ( $_POST['ids'] as $id ) {

                $thumbnail = wp_get_attachment_image_src( $id, 'thumbnail' );

                $return .= '<li><img  src="' . $thumbnail[0] . '" width="150" height="150" /></li>';

            }

            echo $return;
            exit();

        }

    }


    /**
     * AJAX utility function for adding a new choice.
     */

    public function add_choice() {
        echo ot_choices_view( $_REQUEST['name'], $_REQUEST['count'] );
        die();
    }

    /**
     * AJAX utility function for adding a new list item.
     */

    public function add_list_item() {

        ot_list_item_view( $_REQUEST['name'], $_REQUEST['count'], array(), $_REQUEST['post_id'], $_REQUEST['get_option'], ot_decode( $_REQUEST['settings'] ), $_REQUEST['type'], $_REQUEST['list_title'] );
        die();

    }

    /**
     * AJAX utility function for adding a new list item.
     */

    public function add_list_compact_item() {
        ot_list_compact_view( $_REQUEST['name'], $_REQUEST['count'], array(), $_REQUEST['post_id'], $_REQUEST['get_option'], ot_decode( $_REQUEST['sections'] ), ot_decode( $_REQUEST['settings'] ), $_REQUEST['type'], $_REQUEST['list_title'] );
        die();
    }

    /**
     * Filters the media uploader button.
     *
     * @return    string
     *
     * @access    public
     * @since     2.1
     */

    public function change_image_button( $translation, $text, $domain ) {

        global $pagenow;

        if ( $pagenow == 'admin.php' && 'default' == $domain && 'Insert into post' == $text ) {

            remove_filter( 'gettext', array( $this, 'ot_change_image_button' ) );

            return esc_html__( 'Send to Theme Options', 'unitedthemes' );

        }

        return $translation;

    }

}