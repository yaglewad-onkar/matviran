<?php if (!defined('UT_VERSION')) {
    exit; // exit if accessed directly
}

/**
 * Enqueue Widget Admin JS
 *
 * @since     1.0.0
 * @version   1.1.0
 */
if ( ! function_exists( '_ut_widget_scripts' ) ) :
    
    function _ut_widget_scripts() {
        
        $min = NULL;
            
        if( !WP_DEBUG ){
            $min = '.min';
        }
        
        /* admin css */
        wp_enqueue_style(
            'unite-widget-admin', 
            FW_WEB_ROOT . '/core/admin/assets/css/unite-widget-admin' . $min . '.css', 
            false, 
            UT_VERSION
        );

        /* register widget script */
        wp_enqueue_script(
            'unite-widget-admin', 
            FW_WEB_ROOT . '/core/admin/assets/js/unite-widget-admin' . $min . '.js', 
            array('jquery', 'jquery-ui-tabs'), 
            UT_VERSION
        );
             
    }
    
    add_action('admin_print_scripts-widgets.php', '_ut_widget_scripts');

endif;

/**
 * Helper function to return customizer link
 *
 * @return    string
 *
 * @access    public
 * @since     1.0
 */

function ut_get_customizer_link_attr( $key = '', $id = '' ) {
    
    if( empty( $key ) || empty( $id ) ) {
        return;    
    }    
    
    return 'data-customize-setting-link="' . esc_attr( $key.'['.$id .']' ) . '"';   
  
}

/**
 * Prepare Field Settings
 *
 * @param     array    Array of Settings
 * @param     string   source id of this field
 * @return    array    New Array with all necessary settings
 *
 * @access    public
 * @since     1.0.0
 * @version   1.1.0
 */
    
function ut_prepare_settings_field( $args, $source, $key ) {
    
    /* extract field settings */
    extract( $args );        
    
    if( empty( $id ) || empty( $type )  ) {
        return;
    }
    
    $options = '';
    
    switch( $source ) {
        
        case 'theme_options' :
        $options = get_option( $key, false );
        break;
        
        case 'meta_box' :
        break;
        
        default :
        break;            
        
    }
    
    /* set field value */
    $option_value = isset( $options[$id] ) && !empty( $options[$id] ) ? $options[$id] : '';    
            
    /* it it's an group item , there might be already a value */
    $option_value = isset( $value ) && !empty( $value ) ? $value : $option_value;
        
    /* set default value */
    if ( isset( $default ) && $option_value == '' ) {
        
        $option_value = $default;
            
    }
        
    /* check if at least we have all necessary defaults */
    $option_args = array(
        'type'       => $type,
        'id'         => $id,
        'name'       => $key . '[' . ( !empty($name) ? $name : $id ) . ']',
        'value'      => $option_value,
        'taxonomy'   => !empty( $taxonomy ) ? $taxonomy : '',
        'default'    => !empty( $default )  ? $default  : '',
        'title'      => !empty( $title )    ? $title    : '',
        'desc'       => !empty( $desc )     ? $desc     : '',
        'info'       => !empty( $info )     ? $info     : '',
        'grid'       => !empty( $grid )     ? $grid     : '',
        'rows'       => !empty( $rows )     ? $rows     : '10',
        'config'     => !empty( $config )   ? $config   : array(),
        'choices'    => !empty( $choices )  ? $choices  : array(),
        'labels'     => !empty( $labels )   ? $labels   : array( 'on'    => esc_html__( 'on', 'unite-admin' ) , 'off'   => esc_html__( 'off', 'unite-admin' ) ),
        'fields'     => !empty( $fields )   ? $fields   : array(),
        'required'   => !empty( $required ) ? $required : array(),
        'disable'    => !empty( $disable )  ? $disable  : array('none'),
        'mime'       => !empty( $mime )     ? $mime     : array(),
        'mode'       => !empty( $mode )     ? $mode     : 'hex',
        'addon'      => !empty( $addon )    ? $addon    : '',
        'source'     => !empty( $source )   ? $source   : '',
        'source_key' => !empty( $key)       ? $key      : '',
        'post_ID'    => !empty( $post_ID )  ? $post_ID  : '',
        'width'      => !empty( $width )    ? $width    : 'full',
        'class'      => !empty( $class )    ? $class    : ''
    );
    
    return $option_args;        

}


/**
 * Helper function to return encoded strings
 *
 * @return    string
 *
 * @access    public
 * @since     1.0
 */

function ut_base_encode( $value = '' ) {
    
    if( !$value ) {
        return;
    }
    
    $func = 'base64' . '_encode';
    return $func( $value );
  
}


/**
 * Helper function to return decoded strings
 *
 * @return    string
 *
 * @access    public
 * @since     1.0
 */
 
function ut_base_decode( $value = '' ) {
    
    if( !$value ) {
        return;
    }
    
    $func = 'base64' . '_decode';
    return $func( $value );
  
}

function ut_load_theme_option( $options ) {
    
    if( !$options && !is_array( $options ) ) {
        return false;
    }
    
    /* get default options first */
    $theme_options = ut_theme_options();
    
    /* sanitized array */
    $sanitized_options = array();
    $sanitized_layout_options = array();
    
    /* layout flag */
    $has_layouts = false;    
    
    /* import theme options first. We cannot trust the new serialized data, so we compare with theme options and sanitize the values again */    
    if( isset( $options['unite_theme_supports_layouts'] ) && $options['unite_theme_supports_layouts'] ) {
        
        if( !empty( $options['unite_theme_layouts'] ) && is_array( $options['unite_theme_layouts'] ) ) {
               
            $has_layouts = true;
                
            foreach( (array) $options['unite_theme_layouts'] as $lkey => $layout ) {
                
                if( isset( $options['unite_theme_layouts_options'][$lkey] ) ) {
                    
                    foreach( (array) $options['unite_theme_layouts_options'][$lkey] as $okey => $value ) {
        
                        foreach( (array) $theme_options as $skey => $settings ) {
                            
                            if( 'settings' == $skey ) {
                                
                                foreach( $settings as $setting ) {
                                    
                                    if( $okey == $setting['id'] ) {
                                        
                                        $sanitized_layout_options[$lkey][$okey] = ut_sanitize_option( $value, $setting['type'], $okey, 'theme_options' );
                                        
                                    }                    
                                
                                }
                            
                            }
                        
                        }
                    
                    }
                
                }
                
            }            
            
        }
        
    }
    
    /* default option set */    
    if( !empty( $options[ut_options_key()] ) ) {
    
        foreach( (array) $options[ut_options_key()] as $okey => $value ) {
        
            foreach( (array) $theme_options as $skey => $settings ) {
                
                if( 'settings' == $skey ) {
                    
                    foreach( $settings as $setting ) {
                        
                        if( $okey == $setting['id'] ) {
                            
                            $sanitized_options[$okey] = ut_sanitize_option( $value, $setting['type'], $okey, 'theme_options' );
                            
                        }                    
                    
                    }
                
                }
            
            }
        
        }
    
    }
    
    /* now import dynamic sidebars and sidebar options */
    $sanitized_sidebars = array();
    
    if( !empty( $options['unite_theme_sidebars'] ) ) {
    
        foreach( (array) $options['unite_theme_sidebars'] as $key => $sidebar ) {
            
            foreach( $sidebar as $sidebar_attr_key => $sidebar_attr ) {
                
                $sanitized_sidebars[$key][esc_html( $sidebar_attr_key )] = esc_html( $sidebar_attr );
                
            }
            
        }
        
        if( array_filter( $sanitized_sidebars ) ) {
        
            update_option( 'unite_theme_sidebars', $sanitized_sidebars );     
                
        }
    
    }
    
    /* now import sidebar settings */
    if( !empty( $options['unite_theme_sidebar_settings'] ) ) {

        foreach( (array) $options['unite_theme_sidebar_settings'] as $key => $sidebar_option ) {
            
            if( !empty( $sidebar_option ) ) {
                
                update_option( esc_html( $key ), esc_html( $sidebar_option ) );
                
            }        
            
        }
        
    }
    
    if( $has_layouts ) {
        
        foreach( $sanitized_layout_options as $key => $layout_options ) {
            
            if( array_filter( $layout_options ) ) {
                
                update_option( $key, $layout_options );    
                
            }            
            
        }
    
    }
    
    if( array_filter( $sanitized_options ) ) {
        
        update_option( ut_options_key(), $sanitized_options );
        return true;
            
    } else {
        
        return false;
    
    }
    
}

/**
 * Helper function to sort array based on a second array
 *
 * @return    string
 *
 * @access    public
 * @since     1.0
 */
function ut_sort_array_by_array( array $toSort, array $sortByValuesAsKeys ) {
    
    $commonKeysInOrder   = array_intersect_key(array_flip($sortByValuesAsKeys), $toSort);
    $commonKeysWithValue = array_intersect_key($toSort, $commonKeysInOrder);
    $sorted              = array_merge($commonKeysInOrder, $commonKeysWithValue);
    
    return $sorted;
}

/**
 * Helper function to create option dependencies
 * @return    string
 *
 * @access    public
 * @since     1.0
 */
if ( !function_exists( 'ut_create_dependency' ) ) {
	
	function ut_create_dependency( $required, $key = false ) {
        
        if( empty( $required ) ) {
            return;
        }
        
        if( !$key ) {
        
            $required = implode(' + ', array_map(
                function ($v, $k) { 
                    return sprintf("%s:%s", $k, $v); 
                },
                $required,
                array_keys( $required )
            ) );
        
        } else {
            
            $required = implode(' + ', array_map(
                function ($v, $k) use (&$key) { 
                    return sprintf( $key . "[%s]:%s", $k, $v);
                },
                $required,
                array_keys( $required )
            ) );        
        
        }
        
        return 'data-depends-on="' . $required . '"';
        
    }
    
}



/**
 * Search Google Font JavaScript
 *
 * @return    array
 *
 * @access    public
 * @since     4.6.0
 * @version   1.0.0
 */

if ( !function_exists( '_ut_search_js_google_font_array' ) ) {

    function _ut_search_js_google_font_array() {
        
		// no search value
		if( empty( $_POST['search'] ) ) {
			die(1);
		}
		
        // array to store results
        $js_search_result = array();
        
        // keywords to search for
        $keyword = strtolower( $_POST['search'] );
        
        // internal counter
        $count = 0;
        
        foreach ( ut_recognized_google_fonts() as $id => $font ) {
            
            // the current font family
            $current = strtolower( $font['family'] );
            
            if( strpos( $current, $keyword ) !== false ) {
                
                // the main stuff
                $js_search_result[$count]["id"]       = $id;
                $js_search_result[$count]["text"]     = $font['family'];
                
                // all the other required stuff
                $js_search_result[$count]["variants"] = implode(",", $font['variants']);
                $js_search_result[$count]["subsets"]  = implode(",", $font['subsets']);
                $js_search_result[$count]["fontid"]   = $id;
                $js_search_result[$count]["font"]     = $font['family'];
                $js_search_result[$count]["family"]   = $font['family'];            
                
                $count++;
                
            }
            
        }
        
        if( !empty( $js_search_result ) ) {
            echo json_encode( $js_search_result );
        }
            
        die(1);
        
    }
    
    add_action( 'wp_ajax_nopriv_search_google_fonts', '_ut_search_js_google_font_array' );
    add_action( 'wp_ajax_search_google_fonts', '_ut_search_js_google_font_array' );   
    
}


/*
 * Function for post duplication. Dups appear as drafts. User is redirected to the edit screen
 */

function ut_duplicate_post_as_draft(){

    global $wpdb;

    if (!(isset($_GET['post']) || isset($_POST['post']) || (isset($_REQUEST['action']) && 'ut_duplicate_post_as_draft' == $_REQUEST['action']))) {

        wp_die('No post to duplicate has been supplied!');

    }

    /*
     * Nonce verification
     */
    if (!isset($_GET['duplicate_nonce']) || !wp_verify_nonce($_GET['duplicate_nonce'], basename(__FILE__)))
        return;

    /*
     * get the original post id
     */
    $post_id = (isset($_GET['post']) ? absint($_GET['post']) : absint($_POST['post']));
    /*
     * and all the original post data then
     */
    $post = get_post($post_id);

    /*
     * if you don't want current user to be the new post author,
     * then change next couple of lines to this: $new_post_author = $post->post_author;
     */
    $current_user = wp_get_current_user();
    $new_post_author = $current_user->ID;

    /*
     * if post data exists, create the post duplicate
     */
    if (isset($post) && $post != null) {

        /*
         * new post data array
         */
        $args = array(
            'comment_status' => $post->comment_status,
            'ping_status' => $post->ping_status,
            'post_author' => $new_post_author,
            'post_content' => $post->post_content,
            'post_excerpt' => $post->post_excerpt,
            //'post_name' => $post->post_name,
            'post_parent' => $post->post_parent,
            'post_password' => $post->post_password,
            'post_status' => 'draft',
            'post_title' => $post->post_title . ' Copy',
            'post_type' => $post->post_type,
            'to_ping' => $post->to_ping,
            'menu_order' => $post->menu_order
        );

        /*
         * insert the post by wp_insert_post() function
         */
        $new_post_id = wp_insert_post($args);


        /*
         * get all current post terms ad set them to the new post draft
         */
        $taxonomies = get_object_taxonomies($post->post_type); // returns array of taxonomy names for post type, ex array("category", "post_tag");

        foreach ($taxonomies as $taxonomy) {
            $post_terms = wp_get_object_terms($post_id, $taxonomy, array('fields' => 'slugs'));
            wp_set_object_terms($new_post_id, $post_terms, $taxonomy, false);
        }

        /*
         * duplicate all post meta just in two SQL queries
         */

        $post_meta_infos = $wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=$post_id");

        if (count($post_meta_infos) != 0) {

            $sql_query = "INSERT INTO $wpdb->postmeta (post_id, meta_key, meta_value) ";

            foreach ($post_meta_infos as $meta_info) {

            	$meta_key = $meta_info->meta_key;

                if ($meta_key == '_wp_old_slug') continue;

                $meta_value = addslashes($meta_info->meta_value);

                $sql_query_sel[] = "SELECT $new_post_id, '$meta_key', '$meta_value'";

            }

            $sql_query .= implode(" UNION ALL ", $sql_query_sel);
            $wpdb->query($sql_query);

        }

        $post_type = esc_attr( $_REQUEST['post_type'] );
	    $paged = esc_attr( $_REQUEST['paged'] );

        /*
         * finally, redirect to the edit post screen for the new draft
         */
        wp_redirect(admin_url( 'edit.php?post_type=' . $post_type . '&paged=' . $paged ));

        exit;

    } else {

        wp_die('Post creation failed, could not find original post: ' . $post_id);

    }

}

add_action( 'admin_action_ut_duplicate_post_as_draft', 'ut_duplicate_post_as_draft' );


/*
 * Add the duplicate link to action list for post_row_actions
 */

function ut_duplicate_post_link( $actions, $post ) {

    if( current_user_can('edit_posts') ) {

	    $paged = !empty( $_GET['paged'] ) ? esc_attr( $_GET['paged'] ) : '1';
	    $post_type = !empty( $_GET['post_type'] ) ? $_GET['post_type'] : 'post';

        $actions['ut-duplicate'] = '<a href="' . wp_nonce_url('admin.php?action=ut_duplicate_post_as_draft&post_type=' . $post_type . '&paged=' . $paged . '&post=' . $post->ID, basename(__FILE__), 'duplicate_nonce') . '" title="' . esc_html__( 'Duplicate this item', 'unitedthemes' ) . '" rel="permalink">' . esc_html__( 'Duplicate','unitedthemes' ) . '</a>';

    }

    return $actions;
}

add_filter( 'post_row_actions', 'ut_duplicate_post_link', 10, 2 );
add_filter( 'page_row_actions', 'ut_duplicate_post_link', 10, 2 );

/*
 * Slider Revolution
 *
 * @return    array
 *
 * @since     4.9.5
 */

function ut_remove_slider_revolution_templates( $post_templates ) {

	foreach( $post_templates as $key => $template ) {

		if( $key == '../public/views/revslider-page-template.php' ) {

			unset( $post_templates[$key] );

		}

	}

	return $post_templates;


}

add_filter( 'theme_page_templates', 'ut_remove_slider_revolution_templates', 90 );

/**
 * Remove Slider Revolution Metabox
 *
 * @since     4.9.5
 */

function ut_remove_slider_revolution_metabox() {

	remove_meta_box( 'slider_revolution_metabox', array( 'post', 'page', 'portfolio', 'product' ), 'side' );

}

add_action( 'add_meta_boxes' , 'ut_remove_slider_revolution_metabox', 100 );