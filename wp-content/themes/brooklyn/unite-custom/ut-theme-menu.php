<?php if (!defined('ABSPATH')) {
    exit; // exit if accessed directly
}

/* check for menu support */
if( !apply_filters( 'ut_megamenu', true ) || ot_get_option( 'ut_site_layout', 'multisite' ) == 'onepage' ) {
    return false;
}

/**
 * Widget JavaScript Translation Strings
 *
 * @since     1.0.0
 * @version   1.0.0
 */

if ( ! function_exists( '_ut_megamenu_widgets_js_translation' ) ) :
    
    function _ut_megamenu_widgets_js_translation( $strings ) {
        
        $strings['widget_message'] = esc_html__( 'Navigation Sidebar does not support this widget!', 'unitedthemes' );
        
        return $strings;
        
    }

    add_filter( 'ut_recognized_js_translation_strings', '_ut_megamenu_widgets_js_translation' );

endif;


/**
 * Add Button Translation Strings
 *
 * @since     4.4.8
 * @version   1.0.0
 */

if ( ! function_exists( '_ut_navigation_button_js_translation' ) ) :
    
    function _ut_navigation_button_js_translation( $strings ) {
        
        $strings['button_added'] = esc_html__( 'Button successfully added!', 'unitedthemes' );
        
        return $strings;
        
    }

    add_filter( 'ut_recognized_js_translation_strings', '_ut_navigation_button_js_translation' );

endif;


/**
 * Megamenu JavaScript Translation Strings
 *
 * @since     1.0.0
 * @version   1.0.0
 */
if ( ! function_exists( '_ut_megamenu_js_translation' ) ) :
    
    function _ut_megamenu_js_translation( $strings ) {

        $strings['megamenu_level_message']          = sprintf( esc_html__( '%1$s needs to be root level item!', 'unitedthemes' ), '<span class="ut-is-megamenu">' . esc_html__( 'Megamenu', 'unitedthemes' ) . '</span>');
        $strings['megamenu_column_level_message']   = sprintf( esc_html__( '%1$s needs to be level 1 item!', 'unitedthemes' ), '<span class="ut-is-megamenu-column">' . esc_html__( 'Column', 'unitedthemes' ) . '</span>');
        $strings['megamenu_column_parent_message']  = sprintf( esc_html__( '%1$s needs to child of %2$s', 'unitedthemes' ), '<span class="ut-is-megamenu-column">' . esc_html__( 'Column', 'unitedthemes' ) . '</span>', '<span class="ut-is-megamenu">' . esc_html__( 'Megamenu', 'unitedthemes' ) . '</span>');
        $strings['megamenu_column_added_message']   = sprintf( esc_html__( 'Do not forget to make %1$s a child of %2$s', 'unitedthemes' ), '<span class="ut-is-megamenu-column">' . esc_html__( 'Column', 'unitedthemes' ) . '</span>', '<span class="ut-is-megamenu">' . esc_html__( 'Megamenu', 'unitedthemes' ) . '</span>');
		$strings['megamenu_image_added_message']    = sprintf( esc_html__( 'Do not forget to make %1$s a child of %2$s', 'unitedthemes' ), '<span class="ut-is-megamenu-image">' . esc_html__( 'Image', 'unitedthemes' ) . '</span>', '<span class="ut-is-megamenu-column">' . esc_html__( 'Column', 'unitedthemes' ) . '</span>');
        $strings['megamenu_widget_level_message']   = sprintf( esc_html__( '%1$s needs to child of %2$s', 'unitedthemes' ), '<span class="ut-is-megamenu-widget">' . esc_html__( 'Widget', 'unitedthemes' ) . '</span>', '<span class="ut-is-megamenu-column">' . esc_html__( 'Column', 'unitedthemes' ) . '</span>');
        $strings['megamenu_widget_amount_message']  = sprintf( esc_html__( 'Please use only %1$s %2$s inside a %3$s Using more widgets may result in layout issues.', 'unitedthemes' ), '<strong>' . esc_html__( 'one', 'unitedthemes' ) . '</strong>', '<span class="ut-is-megamenu-widget">' . esc_html__( 'Widget', 'unitedthemes' ) . '</span>', '<span class="ut-is-megamenu-column">' . esc_html__( 'Column', 'unitedthemes' ) . '</span>');

        return $strings;
                
    }

    add_filter( 'ut_recognized_js_translation_strings', '_ut_megamenu_js_translation' );

endif;


/**
 * Mega Menu Admin Scripts
 *
 * @since     1.0.0
 * @version   1.0.0
 */
if ( ! function_exists( '_ut_megamenu_scripts' ) ) :
    
    function _ut_megamenu_scripts() {
        
        $min = NULL;
            
        if( !WP_DEBUG ){
            $min = '.min';
        }
         
        wp_enqueue_media();
         
        /* register widget script */
         wp_register_script(
            'unite-megamenu-admin', 
            THEME_WEB_ROOT . '/unite-custom/admin/assets/js/unite-megamenu' . $min . '.js', 
            array('jquery', 'jquery-ui-tabs', 'jquery-ui-accordion'), 
            UT_VERSION
        );
         
        /* enqueue widget script */
        wp_enqueue_script( 'unite-megamenu-admin' );
        
        
        wp_enqueue_style(
            'unite-megamenu-admin', 
            THEME_WEB_ROOT . '/unite-custom/admin/assets/css/unite-megamenu' . $min . '.css', 
            false, 
            UT_VERSION
        );        
             
    }
    
    add_action('admin_print_scripts-nav-menus.php', '_ut_megamenu_scripts');

endif;


/**
 * Mega Menu Admin Widgets Scripts
 *
 * @since     1.0.0
 * @version   1.0.0
 */
if ( ! function_exists( '_ut_megamenu_widget_scripts' ) ) :
    
    function _ut_megamenu_widget_scripts() {
        
        $min = NULL;
            
        if( !WP_DEBUG ){
            $min = '.min';
        }
        
        /* register widget script */
         wp_register_script(
            'unite-megamenu-widgets-admin', 
            THEME_WEB_ROOT . '/unite-custom/admin/assets/js/unite-megamenu-widgets' . $min . '.js', 
            array('jquery'), 
            UT_VERSION
        );    
        
        /* enqueue widget script */
        wp_enqueue_script( 'unite-megamenu-widgets-admin' );
        
        /* add localization for widget */
        wp_localize_script( 'unite-megamenu-widgets-admin', 'unite_menu_widgets' , array( 
            'widgets' => apply_filters( 'ut_recognized_menu_widgets', array(
                'ut-video-widget',
                'ut-social-profiles',
                'ut-facebook-widget',
                'text'                
             ) ),
        ) );                
    
    }
    
    add_action('admin_print_scripts-widgets.php', '_ut_megamenu_widget_scripts');

endif;


if ( !class_exists( 'UT_Menu_Extensions' ) ) {

    class UT_Menu_Extensions {
        
        public $version = "1.0";
        
        /**
         * Widget Key
         * @var string
         */
        private $mm_widget_key = 'navigation-widget-area';
                
        /**
         * Megamenu Key
         * @var string
         */
        private $mm_parent_key = 'megamenu-parent';
                
        /**
         * Megamenu Column Key
         * @var string
         */
        private $mm_column_key = 'megamenu-column';
        
		
		/**
         * Megamenu Image Key
         * @var string
         */
        private $mm_image_key = 'megamenu-image';
              
        /**
         * Constructor
         * @since     1.0.0
         * @version   1.0.0
         */
        public function __construct() {
            
            /* run hooks */
            $this->hooks();
                
        }
        
        /**
         * Initiate our hooks
         * @since     1.0.0
         * @version   1.0.0
         */
        public function hooks() {
            
            /* add meta box to menu */
            add_action( 'admin_init', array( $this, 'menu_setup' ) );
            
            /* filter the menu item */
            add_filter( 'wp_setup_nav_menu_item', array( $this, 'label' ), 10, 1 );
                    
        }
        
        /**
         * Add Metabox to Menu Management
         * @since     1.0.0
         * @version   1.0.0
         */
        public function menu_setup() {
            
            // Current menu
            $nav_menu_selected_id = isset( $_REQUEST['menu'] ) ? (int) $_REQUEST['menu'] : 0;
            
            // Get recently edited nav menu.
            $recently_edited = absint( get_user_option( 'nav_menu_recently_edited' ) );
            if ( empty( $recently_edited ) && is_nav_menu( $nav_menu_selected_id ) ) {
                $recently_edited = $nav_menu_selected_id;
            }
                
            // Use $recently_edited if none are selected.
            if ( empty( $nav_menu_selected_id ) && ! isset( $_GET['menu'] ) && is_nav_menu( $recently_edited ) ) {
                $nav_menu_selected_id = $recently_edited;
            }
                        
            $locations = get_registered_nav_menus();
            $menu_locations = get_nav_menu_locations();
            
            foreach ( $locations as $location => $description ) {
                
                if( ot_get_option( 'ut_header_layout', 'default' ) == 'default' && ( 'primary' == $location || 'secondary' == $location ) && isset( $menu_locations[ $location ] ) && $menu_locations[ $location ] == $nav_menu_selected_id ) {
                    
                    add_meta_box( 
                        'add-megamenu-section', 
                        esc_html__( 'Megamenu Settings', 'unitedthemes' ),
                        array( $this, 'megamenu_meta_box' ), 
                        'nav-menus', 
                        'side', 
                        'low'
                    );
                    
                }
                
            }
            
        }               
        
        
        /**
         * Widget Metabox for Menu Management
         * @since     1.0.0
         * @version   1.0.0
         */        
        public function megamenu_meta_box() {
            
            global $_nav_menu_placeholder, $nav_menu_selected_id, $wp_registered_widgets, $wp_registered_sidebars;
                        
            /* start output for megamenu parent  */
            echo '<div id="ut-mm-parent-for-menu" class="ut-mega-menu-setting">';
                
                echo '<h4>' , esc_html( 'Mega Menu', 'unitedthemes' ) , '</h4>';
                                        
                    echo '<div class="ut-megamenu-panel-setting">';
                        
						echo '<label for="mm-menu-parent-title' , $_nav_menu_placeholder , '">';

							echo '<span>', esc_html__( 'Title', 'unitedthemes' ) , '</span>';
							echo '<input autocomplete="off" value="' , esc_attr__( 'Enter Mega Menu Title', 'unitedthemes' ), '" id="mm-menu-parent-title' , $_nav_menu_placeholder , '" name="menu-item[' , $_nav_menu_placeholder , '][menu-item-title]" type="text" class="regular-text menu-item-textbox input-with-default-title" title="' , esc_attr__( 'Mega Menu Title', 'unitedthemes' ), '" />';

							/* field settings */
							echo '<input type="hidden" class="menu-item-object" name="menu-item[' , $_nav_menu_placeholder , '][menu-item-object]" value="' , $this->mm_parent_key , '" />';
							echo '<input type="hidden" class="menu-item-object-id" name="menu-item[' , $_nav_menu_placeholder , '][menu-item-object-id]" value="' , $_nav_menu_placeholder , '" />';
							echo '<input type="hidden" class="menu-item-parent-id" name="menu-item[' , $_nav_menu_placeholder , '][menu-item-parent-id]" value="0" />';
							echo '<input type="hidden" class="menu-item-type" name="menu-item[' , $_nav_menu_placeholder , '][menu-item-type]" value="" />';

							/* additional fields */
							echo '<input type="hidden" class="menu-item-url" name="menu-item[' , $_nav_menu_placeholder , '][menu-item-url]" value="#" />';
							echo '<input type="hidden" class="menu-item-target" name="menu-item[' , $_nav_menu_placeholder , '][menu-item-target]" value="" />';
							echo '<input type="hidden" class="menu-item-attr_title" name="menu-item[' , $_nav_menu_placeholder , '][menu-item-attr_title]" value="" />';
							echo '<input type="hidden" class="menu-item-classes" name="menu-item[' , $_nav_menu_placeholder , '][menu-item-classes]" value="" />';
							echo '<input type="hidden" class="menu-item-xfn" name="menu-item[' , $_nav_menu_placeholder , '][menu-item-xfn]" value="" />';

						echo '</label>';
                        
                    echo '</div>';
                    
                    echo '<p class="button-controls">';
                        echo '<button data-menu-id="' , $_nav_menu_placeholder , '" type="button" name="add-mm-menu-item" id="add-mm-to-menu" class="ut-ui-button ut-megamenu-button ut-button-full">' , esc_attr_e('Add Mega Menu', 'unitedthemes') , '</button>';
                    echo '</p>';                
            
            echo '</div>';
            
            /* start output for megamenu column  */
            echo '<div id="ut-mm-column-for-menu" class="ut-mega-menu-setting">';
                
                echo '<h4>' , esc_html( 'Mega Menu Column', 'unitedthemes' ) , '</h4>';
                
                echo '<div class="ut-megamenu-panel-setting">';
                                        
					echo '<label for="mm-menu-column-title' , $_nav_menu_placeholder , '">';

						echo '<span>', esc_html__( 'Title', 'unitedthemes' ) , '</span>';
						echo '<input autocomplete="off" value="' , esc_attr__( 'Enter Column Title', 'unitedthemes' ), '" id="mm-menu-column-title' , $_nav_menu_placeholder , '" name="menu-item[' , $_nav_menu_placeholder , '][menu-item-title]" type="text" class="regular-text menu-item-textbox input-with-default-title" title="' , esc_attr__( 'Column Title', 'unitedthemes' ), '" />';

						/* field settings */
						echo '<input type="hidden" class="menu-item-object" name="menu-item[' , $_nav_menu_placeholder , '][menu-item-object]" value="' , $this->mm_column_key , '" />';
						echo '<input type="hidden" class="menu-item-object-id" name="menu-item[' , $_nav_menu_placeholder , '][menu-item-object-id]" value="' , $_nav_menu_placeholder , '" />';
						echo '<input type="hidden" class="menu-item-parent-id" name="menu-item[' , $_nav_menu_placeholder , '][menu-item-parent-id]" value="0" />';
						echo '<input type="hidden" class="menu-item-type" name="menu-item[' , $_nav_menu_placeholder , '][menu-item-type]" value="" />';

						/* additional fields */
						echo '<input type="hidden" class="menu-item-url" name="menu-item[' , $_nav_menu_placeholder , '][menu-item-url]" value="#" />';
						echo '<input type="hidden" class="menu-item-target" name="menu-item[' , $_nav_menu_placeholder , '][menu-item-target]" value="" />';
						echo '<input type="hidden" class="menu-item-attr_title" name="menu-item[' , $_nav_menu_placeholder , '][menu-item-attr_title]" value="" />';
						echo '<input type="hidden" class="menu-item-classes" name="menu-item[' , $_nav_menu_placeholder , '][menu-item-classes]" value="" />';
						echo '<input type="hidden" class="menu-item-xfn" name="menu-item[' , $_nav_menu_placeholder , '][menu-item-xfn]" value="" />';

					echo '</label>';
                
                echo '</div>';
                
                echo '<p class="button-controls">';
                    echo '<button data-menu-id="' , $_nav_menu_placeholder , '" type="button" name="add-mm-menu-item" id="add-mm-column-to-menu" class="ut-ui-button ut-megamenu-column-button ut-button-full">' , esc_attr_e('Add Column', 'unitedthemes') , '</button>';
                echo '</p>';                     
            
            echo '</div>';
			
			
			/* start output for megamenu image  */
            echo '<div id="ut-mm-image-for-menu" class="ut-mega-menu-setting">';
                
                echo '<h4>' , esc_html( 'Mega Menu Image', 'unitedthemes' ) , '</h4>';
                
                echo '<div class="ut-megamenu-panel-setting">';
                    
                    
                        echo '<label for="mm-menu-image-title' , $_nav_menu_placeholder , '">';
                                
                            echo '<span>', esc_html__( 'Upload Image', 'unitedthemes' ) , '</span>';
                            
							echo ot_type_upload( array(
                
								'field_name'            => 'menu-item[' . $_nav_menu_placeholder . '][menu-item-description]',
								'field_id'              => 'mm-menu-image-url' . $_nav_menu_placeholder . '',
								'field_value'           => '',
								'field_class'           => '',
								'post_id'               => ''

							) );
                            
							/*hidden text with default label */
							echo '<input type="hidden" value="' , esc_attr__( 'Image', 'unitedthemes' ), '" id="mm-menu-column-title' , $_nav_menu_placeholder , '" name="menu-item[' , $_nav_menu_placeholder , '][menu-item-title]" />';
			
                            /* field settings */
                            echo '<input type="hidden" class="menu-item-object" name="menu-item[' , $_nav_menu_placeholder , '][menu-item-object]" value="' , $this->mm_image_key , '" />';
                            echo '<input type="hidden" class="menu-item-object-id" name="menu-item[' , $_nav_menu_placeholder , '][menu-item-object-id]" value="' , $_nav_menu_placeholder , '" />';
                            echo '<input type="hidden" class="menu-item-parent-id" name="menu-item[' , $_nav_menu_placeholder , '][menu-item-parent-id]" value="0" />';
                            echo '<input type="hidden" class="menu-item-type" name="menu-item[' , $_nav_menu_placeholder , '][menu-item-type]" value="" />';
                            
                            /* additional fields */
                            echo '<input type="hidden" class="menu-item-url" name="menu-item[' , $_nav_menu_placeholder , '][menu-item-url]" value="#" />';
                            echo '<input type="hidden" class="menu-item-target" name="menu-item[' , $_nav_menu_placeholder , '][menu-item-target]" value="" />';
                            echo '<input type="hidden" class="menu-item-attr_title" name="menu-item[' , $_nav_menu_placeholder , '][menu-item-attr_title]" value="" />';
                            echo '<input type="hidden" class="menu-item-classes" name="menu-item[' , $_nav_menu_placeholder , '][menu-item-classes]" value="" />';
                            echo '<input type="hidden" class="menu-item-xfn" name="menu-item[' , $_nav_menu_placeholder , '][menu-item-xfn]" value="" />';
                                                        
                        echo '</label>';
                    
                
                echo '</div>';
                
                echo '<p class="button-controls">';
                    echo '<button data-menu-id="' , $_nav_menu_placeholder , '" type="button" name="add-mm-menu-item" id="add-mm-image-to-menu" class="ut-ui-button ut-megamenu-image-button ut-button-full">' , esc_attr_e('Add Image', 'unitedthemes') , '</button>';
                echo '</p>';                     
            
            echo '</div>';
			
			
            
            /* start output for widgets  
            echo '<div id="ut-widget-for-menu" class="ut-mega-menu-setting">';
                
                echo '<h4>' , esc_html( 'Mega Menu Widgets', 'unitedthemes' ) , '</h4>';
                    
                // get all the sidebar widgets 
                $sidebar_widgets = wp_get_sidebars_widgets();
                
                echo '<div class="ut-megamenu-panel-setting">';
                
                // check if widgets are available
                if ( empty( $wp_registered_sidebars[$this->mm_widget_key] ) || empty( $sidebar_widgets[$this->mm_widget_key] ) || !is_array( $sidebar_widgets[$this->mm_widget_key]) ) {

                    echo esc_html__( 'No Widgets found for sidebar "Navigation Widgets"', 'unitedthemes' ) . ' <br /><a href="' . admin_url( 'widgets.php' ) . '">' . esc_html__( 'Please add a widget first.', 'unitedthemes' ) . '</a>';

                } else {

                    echo '<ul>';

                    foreach ( (array) $sidebar_widgets[$this->mm_widget_key] as $sidebar_id ) {

                        // skip if not set 
                        if ( !isset( $wp_registered_widgets[$sidebar_id] ) ) {
                            continue;
                        }

                        $_nav_menu_placeholder = 0 > $_nav_menu_placeholder ? $_nav_menu_placeholder - 1 : -1;

                        // widget data
                        $widget         = $wp_registered_widgets[$sidebar_id];
                        $widget_number  = $widget['params'][0]['number'];
                        $widget_slug    = rtrim( preg_replace( '|[0-9]+|i', '', $sidebar_id ), '-' );
                        $widget_config  = get_option( 'widget_' . $widget_slug, array() );
                        $widget_title   = !empty( $widget_config[$widget_number]['title'] ) ? $widget_config[$widget_number]['title'] : '';
                        $widget_name    = !empty( $widget['name'] ) ? $widget['name'] : '';
                        
                        $title = !empty( $widget_title ) ? $widget_title : $widget_name;
                        
                        // create list element
                        echo '<li>';

                            echo '<label for="' . $sidebar_id . '">';

                                echo '<input name="menu-item['. $_nav_menu_placeholder . '][menu-item-object-id]" type="checkbox" value="' . $widget_number . '" id="' . $sidebar_id . '" class="menu-item-checkbox ' . $sidebar_id . '">';
                                echo $title;
                                
                                // field settings
                                echo '<input type="hidden" class="menu-item-object" name="menu-item[' , $_nav_menu_placeholder , '][menu-item-object]" value="' , $this->mm_widget_key , '" />';
                                echo '<input type="hidden" class="menu-item-parent-id" name="menu-item[' , $_nav_menu_placeholder , '][menu-item-parent-id]" value="0" />';
                                echo '<input type="hidden" class="menu-item-type" name="menu-item[' , $_nav_menu_placeholder , '][menu-item-type]" value="" />';
                                echo '<input type="hidden" class="menu-item-title" name="menu-item[' , $_nav_menu_placeholder , '][menu-item-title]" value="' , $title , '" />';                                
                                
                                // additional fields
                                echo '<input type="hidden" class="menu-item-url" name="menu-item[' , $_nav_menu_placeholder , '][menu-item-url]" value="" />';
                                echo '<input type="hidden" class="menu-item-target" name="menu-item[' , $_nav_menu_placeholder , '][menu-item-target]" value="" />';
                                echo '<input type="hidden" class="menu-item-attr_title" name="menu-item[' , $_nav_menu_placeholder , '][menu-item-attr_title]" value="" />';
                                echo '<input type="hidden" class="menu-item-classes" name="menu-item[' , $_nav_menu_placeholder , '][menu-item-classes]" value="" />';
                                echo '<input type="hidden" class="menu-item-xfn" name="menu-item[' , $_nav_menu_placeholder , '][menu-item-xfn]" value="' , $sidebar_id , '" />';
                                
                            echo '</label>';

                        echo '</li>';                    

                    }                

                    echo '</ul>';
                                        
                }
                
                echo '</div>';
                
                echo '<p class="button-controls">';
                    echo '<button type="button" name="add-mm-menu-item" id="add-widget-to-menu" class="ut-backend-button ut-megamenu-widget-button ut-button-full">' , esc_attr_e('Add Widget', 'unitedthemes') , '</button>';
                echo '</p>';
                
            echo '</div>'; */
            
            
        }      
        
        
        /**
         * Create Label for Menu Edit Page
         * @since     1.0.0
         * @version   1.0.0
         */         
        public function label( $item ) {
            
            if ( is_object( $item ) && isset( $item->object ) ) {
            
                switch( $item->object ) {
                    
                    /*case $this->mm_widget_key;
                    $item->type_label = esc_html__( 'Widget', 'unitedthemes' );
                    break;*/
                    
                    case $this->mm_parent_key;
                    $item->type_label = esc_html__( 'Megamenu', 'unitedthemes' );
                    break;
                    
                    case $this->mm_column_key;
                    $item->type_label = esc_html__( 'Column', 'unitedthemes' );
                    break;
						
					case $this->mm_image_key;
                    $item->type_label = esc_html__( 'Image', 'unitedthemes' );
                    break;	
                    
                }
            
            }
            
            if( isset( $item->classes ) && is_array( $item->classes ) && in_array( 'ut-mm-highlight-link', $item->classes ) ) {
                
                $item->type_label = esc_html__( 'Highlight Link', 'unitedthemes' );
            
            }
            
            return $item;
            
        }        
        
        
    }
    
    new UT_Menu_Extensions();    
    
}


/**
 * Recognized Custom Nav Fields
 *
 * @return    array
 *
 * @access    public
 * @since     1.0.0
 * @version   1.0.0
 */
 
if ( !function_exists( '_ut_recognized_custom_nav_fields' ) ) {

    function _ut_recognized_custom_nav_fields() {
        
        return apply_filters( '_ut_recognized_custom_nav_fields', array(
            'description_color',
            'megamenu',
            'megamenu_skin',
			'megamenu_image',
            'megamenu_image_link',
            'megamenu_image_link_target',
            'megamenu_image_align',
            'megamenu_bottom_link',
            'megamenu_bottom_link_title',    
            'megamenu_column_bottom_link',
            'megamenu_column_bottom_link_title',
            'megamenu_hide_column_title',
            'megamenu_content_width'
        ) );
        
    }

}


/**
 * Add Navigation Custom Field
 *
 * @since     1.0.0 
 * @version   1.0.0
 */
if ( !function_exists( '_ut_add_custom_nav_fields' ) ) {

    function _ut_add_custom_nav_fields( $menu_item ) {
        
        if( !isset( $menu_item->ID ) ) {
            return;
        }
                
        foreach( _ut_recognized_custom_nav_fields() as $field ) {
                            
            if( get_post_meta( $menu_item->ID, '_menu_item_' . $field , true ) ) {
                
                $menu_item->$field = get_post_meta( $menu_item->ID, '_menu_item_' . $field, true );
                
            }
        
        }
        
        return $menu_item;
        
    }
    
    /* add custom menu fields to menu */
    add_filter( 'wp_setup_nav_menu_item', '_ut_add_custom_nav_fields' );

}


/**
 * Update Navigation Custom Field
 *
 * @since     1.0.0
 * @version   1.0.0
 */
 
if ( !function_exists( '_ut_update_custom_nav_fields' ) ) {
    
    function _ut_update_custom_nav_fields( $menu_id, $menu_item_db_id, $args ) {
                
        foreach( _ut_recognized_custom_nav_fields() as $field ) {
            
            $request_field = str_replace('_' , '-', $field );
            
            if ( isset($_REQUEST['menu-item-' . $request_field][$menu_item_db_id]) ) {
            
                update_post_meta( $menu_item_db_id, '_menu_item_' . $field, $_REQUEST['menu-item-' . $request_field][$menu_item_db_id] );
                
            } else {
                
                delete_post_meta( $menu_item_db_id, '_menu_item_' . $field );
                
            }        
        
        }
        
    }
    
    /* save menu custom fields */
    add_action( 'wp_update_nav_menu_item', '_ut_update_custom_nav_fields' , 10 , 3 ); 

}


/**
 * Edit Menutype Custom Field
 *
 * @since     1.0.0
 * @version   1.0.0
 */
 
 if ( !function_exists( '_ut_edit_walker' ) ) {

    function _ut_edit_walker( $walker , $menu_id ) {
        
        return 'WP_UT_Nav_Menu_Edit';
        
    }
    
    /* edit menu walker */
     add_filter( 'wp_edit_nav_menu_walker', '_ut_edit_walker' , 11 , 2 ); // @todo

}

/**
 * Enhance "Appearance" => "Menus"
 *
 * @since     1.0.0
 * @version   1.0.0
 */
if( !class_exists('WP_UT_Nav_Menu_Edit') ) :

    class WP_UT_Nav_Menu_Edit extends Walker_Nav_Menu  {
        
        /**
         * Starts the list before the elements are added.
         *
         * @see Walker_Nav_Menu::start_lvl()
         *
         * @since 3.0.0
         *
         * @param string $output Passed by reference.
         * @param int    $depth  Depth of menu item. Used for padding.
         * @param array  $args   Not used.
         */
        public function start_lvl( &$output, $depth = 0, $args = array() ) {
        
        }        
        
        
        /**
         * Ends the list of after the elements are added.
         *
         * @see Walker_Nav_Menu::end_lvl()
         *
         * @since 3.0.0
         *
         * @param string $output Passed by reference.
         * @param int    $depth  Depth of menu item. Used for padding.
         * @param array  $args   Not used.
         */
        public function end_lvl( &$output, $depth = 0, $args = array() ) {
            
            
        }
                
        function display_element ($element, &$children_elements, $max_depth, $depth = 0, $args, &$output ) {
            
            // check, whether there are children for the given ID and append it to the element with a (new) ID
            $element->hasChildren = isset($children_elements[$element->ID]) && !empty($children_elements[$element->ID]);
    
            return parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
            
        }
        
              
        
        /**
         * Start the element output.
         *
         * @see Walker_Nav_Menu::start_el()
         * @since 3.0.0
         *
         * @param string $output Passed by reference. Used to append additional content.
         * @param object $item   Menu item data object.
         * @param int    $depth  Depth of menu item. Used for padding.
         * @param array  $args   Not used.
         * @param int    $id     Not used.
         */
        public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
            
            global $_wp_nav_menu_max_depth;
            
            $_wp_nav_menu_max_depth = $depth > $_wp_nav_menu_max_depth ? $depth : $_wp_nav_menu_max_depth;
    
            ob_start();
            $item_id = esc_attr( $item->ID );
            $removed_args = array(
                'action',
                'customlink-tab',
                'edit-menu-item',
                'menu-item',
                'page-tab',
                '_wpnonce',
            );
    
            $original_title = '';
            if ( 'taxonomy' == $item->type ) {
                $original_title = get_term_field( 'name', $item->object_id, $item->object, 'raw' );
                if ( is_wp_error( $original_title ) )
                    $original_title = false;
            } elseif ( 'post_type' == $item->type ) {
                $original_object = get_post( $item->object_id );
                $original_title = get_the_title( $original_object->ID );
            }
    
            $classes = array(
                'menu-item menu-item-depth-' . $depth,
                'menu-item-' . esc_attr( $item->object ),
                'menu-item-edit-' . ( ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? 'active' : 'inactive'),
            );
    
            $title = $item->title;
    
            if ( ! empty( $item->_invalid ) ) {
                $classes[] = 'menu-item-invalid';
                /* translators: %s: title of menu item which is invalid */
                $title = sprintf( esc_html__( '%s (Invalid)' , 'unitedthemes' ), $item->title );
            } elseif ( isset( $item->post_status ) && 'draft' == $item->post_status ) {
                $classes[] = 'pending';
                /* translators: %s: title of menu item in draft status */
                $title = sprintf( esc_html__('%s (Pending)', 'unitedthemes'), $item->title );
            }
    
            $title = ( ! isset( $item->label ) || '' == $item->label ) ? $title : $item->label;
    
            $submenu_text = '';
            if ( 0 == $depth )
                $submenu_text = 'style="display: none;"';
            
            ?>
            <li id="menu-item-<?php echo $item_id; ?>" class="<?php echo implode(' ', $classes ); ?>" data-menuid="<?php echo $item_id; ?>" <?php echo ( 'megamenu-parent' == $item->object ) ? 'data-megamenu="1"' : ''; ?> <?php echo ( 'megamenu-column' == $item->object ) ? 'data-megamenu-column="1"' : ''; ?> <?php echo ( 'navigation-widget-area' == $item->object ) ? 'data-megamenu-widget="1"' : ''; ?>>
                <dl class="menu-item-bar">
                    <dt class="menu-item-handle">
                        
                        <span class="item-title">
                            
                            <span class="menu-item-title"><?php echo esc_html( wp_strip_all_tags( $title ) ); ?></span>
                            
                            <?php if( 'megamenu-button' == $item->object ) : ?>
                            
                                <span id="mega-menu-button-<?php echo $item_id; ?>" class="ut-is-button"><?php esc_html_e( 'Button', 'unitedthemes' ); ?></span>
                            
                            <?php elseif( 'navigation-widget-area' == $item->object ) : ?>
                                
                                <span id="mega-menu-widget-<?php echo $item_id; ?>" class="ut-is-megamenu-widget"><?php esc_html_e( 'Widget', 'unitedthemes' ); ?></span>
                            
							<?php elseif( 'megamenu-image' == $item->object ) : ?>
                                
                                <span id="megamenu-image-<?php echo $item_id; ?>" class="ut-is-megamenu-image"><?php esc_html_e( 'Image', 'unitedthemes' ); ?></span>
							
                            <?php elseif( 'megamenu-parent' == $item->object ) : ?>
                                
                                <span id="mega-menu-badge-<?php echo $item_id; ?>" class="ut-is-megamenu"><?php esc_html_e( 'Megamenu', 'unitedthemes' ); ?></span>
                            
                            <?php elseif( 'megamenu-column' == $item->object ) : ?>
                                
                                <span id="mega-menu-column-<?php echo $item_id; ?>" class="ut-is-megamenu-column"><?php esc_html_e( 'Column', 'unitedthemes' ); ?></span>
                                
                            <?php elseif( isset( $item->classes ) && is_array( $item->classes ) && in_array( 'ut-mm-highlight-link', $item->classes ) ) : ?>
                                                        
                                <span id="mega-menu-link-<?php echo $item_id; ?>" class="ut-is-megamenu-link"><?php esc_html_e( 'Highlight Link', 'unitedthemes' ); ?></span>
                            
                            <?php else : ?>
                                
                                <span class="is-submenu" <?php echo $submenu_text; ?>><?php esc_html_e( 'sub item', 'unitedthemes' ); ?></span>
                                
                            <?php endif; ?>                            
                            
                        </span>
                        
                        <span class="item-controls">
                            
                            <span class="item-type"><?php echo esc_html( $item->type_label ); ?></span>
                            <span class="item-order hide-if-js">
                                <a href="<?php
                                    echo wp_nonce_url(
                                        esc_url( add_query_arg(
                                            array(
                                                'action' => 'move-up-menu-item',
                                                'menu-item' => $item_id,
                                            ),
                                            remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
                                        ) ),
                                        'move-menu_item'
                                    );
                                ?>" class="item-move-up"><abbr title="<?php esc_attr_e('Move up', 'unitedthemes'); ?>">&#8593;</abbr></a>
                                |
                                <a href="<?php
                                    echo wp_nonce_url(
                                         esc_url( add_query_arg(
                                            array(
                                                'action' => 'move-down-menu-item',
                                                'menu-item' => $item_id,
                                            ),
                                            remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
                                        ) ),
                                        'move-menu_item'
                                    );
                                ?>" class="item-move-down"><abbr title="<?php esc_attr_e('Move down', 'unitedthemes'); ?>">&#8595;</abbr></a>
                            </span>
                            <a class="item-edit" id="edit-<?php echo $item_id; ?>" title="<?php esc_attr_e('Edit Menu Item', 'unitedthemes'); ?>" href="<?php
                                echo ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? admin_url( 'nav-menus.php' ) :  esc_url( add_query_arg( 'edit-menu-item', $item_id, remove_query_arg( $removed_args, admin_url( 'nav-menus.php#menu-item-settings-' . $item_id ) ) ) );
                            ?>"></a>
                        </span>
                    </dt>
                </dl>
    
                <div class="menu-item-settings wp-clearfix" id="menu-item-settings-<?php echo $item_id; ?>">
                    
					<?php if( 'custom' == $item->type ) : ?>
                        
						<p class="field-url description description-wide">
                            <label for="edit-menu-item-url-<?php echo $item_id; ?>">
                                <?php esc_html_e( 'URL', 'unitedthemes' ); ?><br />
                                <input type="text" id="edit-menu-item-url-<?php echo $item_id; ?>" class="widefat code edit-menu-item-url" name="menu-item-url[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->url ); ?>" />
                            </label>
                        </p>
					
                    <?php endif; ?>
                    
                    <?php $hide_extra_settings = ('navigation-widget-area' == $item->object ) ? 'ut-hide' : ''; ?>
                        
                    <p class="description description-thin <?php echo $hide_extra_settings; ?>">
                        <label for="edit-menu-item-title-<?php echo $item_id; ?>">
                            
                            <?php if( 'megamenu-button' == $item->object ) : ?>
                            
                                <?php _e( 'Button Text', 'unitedthemes' ); ?><br />
                            
                            <?php else : ?>
                            
                                <?php _e( 'Navigation Label', 'unitedthemes' ); ?><br />
                            
                            <?php endif; ?>
                            
                            <input type="text" id="edit-menu-item-title-<?php echo $item_id; ?>" class="widefat edit-menu-item-title" name="menu-item-title[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->title ); ?>" />
                        </label>
                    </p>
                    
                    <?php if( 'megamenu-button' != $item->object ) : ?>
                    
                    <p class="description description-thin <?php echo $hide_extra_settings; ?>">
                        <label for="edit-menu-item-attr-title-<?php echo $item_id; ?>">
                            <?php esc_html_e( 'Title Attribute', 'unitedthemes' ); ?><br />
                            <input type="text" id="edit-menu-item-attr-title-<?php echo $item_id; ?>" class="widefat edit-menu-item-attr-title" name="menu-item-attr-title[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->post_excerpt ); ?>" />
                        </label>
                    </p>
                    
					<?php if( 'megamenu-image' != $item->object ) : ?>
					
						<p class="field-link-target description <?php echo $hide_extra_settings; ?>">
							<label for="edit-menu-item-target-<?php echo $item_id; ?>">
								<input type="checkbox" id="edit-menu-item-target-<?php echo $item_id; ?>" value="_blank" name="menu-item-target[<?php echo $item_id; ?>]"<?php checked( $item->target, '_blank' ); ?> />
								<?php esc_html_e( 'Open link in a new window/tab', 'unitedthemes' ); ?>
							</label>
						</p>

						<p class="field-css-classes description description-thin">
							<label for="edit-menu-item-classes-<?php echo $item_id; ?>">
								<?php esc_html_e( 'CSS Classes (optional)', 'unitedthemes' ); ?><br />
								<input type="text" id="edit-menu-item-classes-<?php echo $item_id; ?>" class="widefat code edit-menu-item-classes" name="menu-item-classes[<?php echo $item_id; ?>]" value="<?php echo esc_attr( implode(' ', $item->classes ) ); ?>" />
							</label>
						</p>

						<p class="field-xfn description description-thin <?php echo $hide_extra_settings; ?>">
							<label for="edit-menu-item-xfn-<?php echo $item_id; ?>">
								<?php esc_html_e( 'Link Relationship (XFN)', 'unitedthemes' ); ?><br />
								<input type="text" id="edit-menu-item-xfn-<?php echo $item_id; ?>" class="widefat code edit-menu-item-xfn" name="menu-item-xfn[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->xfn ); ?>" />
							</label>
						</p>
                    
						<p class="field-description description description-wide <?php echo $hide_extra_settings; ?>">
							<label for="edit-menu-item-description-<?php echo $item_id; ?>">
								<?php esc_html_e( 'Description', 'unitedthemes' ); ?><br />
								<textarea id="edit-menu-item-description-<?php echo $item_id; ?>" class="widefat edit-menu-item-description" rows="3" cols="20" name="menu-item-description[<?php echo $item_id; ?>]"><?php echo esc_html( $item->description ); // textarea_escaped ?></textarea>
								<span class="description"><?php esc_html_e('The description will be displayed in the menu if the current theme supports it.', 'unitedthemes' ); ?></span>
							</label>
						</p>

                        <div class="ut-field-description-color field-description-color description description-wide <?php echo $hide_extra_settings; ?>">
							<label for="edit-menu-item-description-color-<?php echo $item_id; ?>">
								<?php esc_html_e( 'Description Color', 'unitedthemes' ); ?><br />
								<?php

								$field_settings = array(
									'field_id'    => 'edit-menu-item-description-color-' . $item_id,
									'field_name'  => 'menu-item-description-color['.$item_id.']',
									'type'        => 'colorpicker',
									'field_mode'  => 'rgb',
									'field_position' => 'bottom left',
									'field_value' => $item->description_color ?? '',
									'field_class' => ''
								);

								call_user_func( 'ot_type_' . $field_settings['type'], $field_settings );

								?>
                                <span class="description"><?php esc_html_e('This color will overwrite the global color set in Theme Options.', 'unitedthemes' ); ?></span>
							</label>
						</div>
                    
					<?php endif; ?> 
					
                    <?php endif; ?>                                                                                                   
                                                                                                    
                    <?php /* New fields insertion starts here */ ?>
                    
                    <div class="clear"></div>
                    
                    <?php if( 'megamenu-button' == $item->object ) : ?>
                    
                       <div class="ut-megamenu-settings">
                            
							<h4><?php esc_html_e( 'Button Settings', 'unitedthemes' ); ?></h4>

							<div id="ut-megamenu-settings-<?php echo $item_id; ?>" class="ut-megamenu-settings-inner has-tabs">    

								<div class="ut-tabs">

									<ul>
										<li>
											<a href="#"><?php esc_html_e( 'General', 'unitedthemes' ); ?></a>
										</li>
										<li>
											<a href="#"><?php esc_html_e( 'Colors', 'unitedthemes' ); ?></a>
										</li>
										<li>
											<a href="#"><?php esc_html_e( 'Border', 'unitedthemes' ); ?></a>
										</li>
										<li>
											<a href="#"><?php esc_html_e( 'Padding', 'unitedthemes' ); ?></a>
										</li>                                            
									</ul>

									<div>

										<h5><?php esc_html_e( 'Link', 'unitedthemes' ); ?></h5>

										<?php

											$field_settings = array(
												'field_id'    => 'edit-menu-item-megamenu-button-link-' . $item_id,
												'field_name'  => 'menu-item-megamenu-button-link['.$item_id.']',
												'type'        => 'text',
												'field_value' => $item->megamenu_button_link ?? '',
												'field_class' => 'widefat'
											);

											call_user_func( 'ot_type_' . $field_settings['type'], $field_settings );

										?>

										<div class="ut-megamenu-settings-separator"></div>

										<h5><?php esc_html_e( 'Link Target', 'unitedthemes' ); ?></h5>

										<?php

											$field_settings = array(
												'field_id'     => 'edit-menu-item-megamenu-button-link-target-' . $item_id,
												'field_name'   => 'menu-item-megamenu-button-link-target['.$item_id.']',
												'type'         => 'select',
												'field_choices'=> array(

													array(
														'value' => '_blank',
														'label' => 'blank'
													),
													array(
														'value' => '_self',
														'label' => 'self'
													),

												),
												'field_value' => $item->megamenu_button_link_target ?? '',
												'field_class' => ''
											);

											call_user_func( 'ot_type_' . $field_settings['type'], $field_settings );

										?>

									</div>


									<div>

										<h5><?php esc_html_e( 'Text Color', 'unitedthemes' ); ?></h5>

										<?php

											$field_settings = array(
												'field_id'    => 'edit-menu-item-megamenu-button-text-color-' . $item_id,
												'field_name'  => 'menu-item-megamenu-button-text-color['.$item_id.']',
												'type'        => 'colorpicker',
												'field_mode'  => 'rgb',
                                                'field_position' => 'bottom left',
												'field_value' => $item->megamenu_button_text_color ?? '',
												'field_class' => ''
											);

											call_user_func( 'ot_type_' . $field_settings['type'], $field_settings );

										?>

										<div class="ut-megamenu-settings-separator"></div>

										<h5><?php esc_html_e( 'Text Hover Color', 'unitedthemes' ); ?></h5>

										<?php

											$field_settings = array(
												'field_id'    => 'edit-menu-item-megamenu-button-text-color-hover-' . $item_id,
												'field_name'  => 'menu-item-megamenu-button-text-color-hover['.$item_id.']',
												'type'        => 'colorpicker',
												'field_mode'  => 'rgb',
                                                'field_position' => 'bottom left',
												'field_value' => $item->megamenu_button_text_color_hover ?? '',
												'field_class' => ''
											);

											call_user_func( 'ot_type_' . $field_settings['type'], $field_settings );

										?>

										<div class="ut-megamenu-settings-separator"></div>

										<h5><?php esc_html_e( 'Background Color', 'unitedthemes' ); ?></h5>

										<?php

											$field_settings = array(
												'field_id'    => 'edit-menu-item-megamenu-button-background-color-' . $item_id,
												'field_name'  => 'menu-item-megamenu-button-background-color['.$item_id.']',
												'type'        => 'gradient_colorpicker',
												'field_mode'  => 'rgb',
                                                'field_position' => 'bottom left',
												'field_value' => $item->megamenu_button_background_color ?? '',
												'field_class' => ''
											);

											call_user_func( 'ot_type_' . $field_settings['type'], $field_settings );

										?>

										<div class="clear"></div>

										<div class="ut-megamenu-settings-separator"></div>

										<h5><?php esc_html_e( 'Background Hover Color', 'unitedthemes' ); ?></h5>

										<?php

											$field_settings = array(
												'field_id'    => 'edit-menu-item-megamenu-button-background-color-hover-' . $item_id,
												'field_name'  => 'menu-item-megamenu-button-background-color-hover['.$item_id.']',
												'type'        => 'gradient_colorpicker',
												'field_mode'  => 'rgb',
                                                'field_position' => 'bottom left',
												'field_value' => $item->megamenu_button_background_color_hover ?? '',
												'field_class' => ''
											);

											call_user_func( 'ot_type_' . $field_settings['type'], $field_settings );

										?>

										<div class="clear"></div>

									</div>


									<!-- Border -->
									<div>

										<h5><?php esc_html_e( 'Activate Border Radius', 'unitedthemes' ); ?></h5>

										<?php

											$field_settings = array(
												'field_id'     => 'edit-menu-item-megamenu-button-border-radius-' . $item_id,
												'field_name'   => 'menu-item-megamenu-button-border-radius['.$item_id.']',
												'type'         => 'select',
												'field_choices'=> array(
													array(
														'value' => 'off',
														'label' => 'no, thanks!'
													),
													array(
														'value' => 'on',
														'label' => 'yes, please!'
													),

												),
												'field_value' => $item->megamenu_button_border_radius ?? '',
												'field_class' => ''
											);

											call_user_func( 'ot_type_' . $field_settings['type'], $field_settings );

										?>

										<div class="ut-megamenu-settings-separator"></div>

										<h5><?php esc_html_e( 'Border Radius', 'unitedthemes' ); ?></h5>

										<?php

											ut_call_option_by_type( array(
												'field_id'    => 'edit-menu-item-megamenu-button-border-radius-value-' . $item_id,
												'field_name'  => 'menu-item-megamenu-button-border-radius-value['.$item_id.']',
												'type'        => 'numeric_slider',
												'field_min_max_step' => '0,50,1',
												'field_value' => $item->megamenu_button_border_radius_value ?? '',
												'field_class' => ''
											) );

										?>

										<div class="ut-megamenu-settings-separator"></div>

										<h5><?php esc_html_e( 'Activate Border?', 'unitedthemes' ); ?></h5>

										<?php

											$field_settings = array(
												'field_id'     => 'edit-menu-item-megamenu-button-border-' . $item_id,
												'field_name'   => 'menu-item-megamenu-button-border['.$item_id.']',
												'type'         => 'select',
												'field_choices'=> array(
													array(
														'value' => 'no',
														'label' => 'no, thanks!'
													),
													array(
														'value' => 'yes',
														'label' => 'yes, please!'
													),

												),
												'field_value' => $item->megamenu_button_border ?? '',
												'field_class' => ''
											);

											call_user_func( 'ot_type_' . $field_settings['type'], $field_settings );

										?>

										<div class="ut-megamenu-settings-separator"></div>

										<h5><?php esc_html_e( 'Border Color', 'unitedthemes' ); ?></h5>

										<?php

											$field_settings = array(
												'field_id'    => 'edit-menu-item-megamenu-button-border-color-' . $item_id,
												'field_name'  => 'menu-item-megamenu-button-border-color['.$item_id.']',
												'type'        => 'colorpicker',
												'field_mode'  => 'rgb',
                                                'field_position' => 'bottom left',
												'field_value' => $item->megamenu_button_border_color ?? '',
												'field_class' => ''
											);

											call_user_func( 'ot_type_' . $field_settings['type'], $field_settings );

										?>

										<div class="ut-megamenu-settings-separator"></div>

										<h5><?php esc_html_e( 'Border Color Hover', 'unitedthemes' ); ?></h5>

										<?php

											$field_settings = array(
												'field_id'    => 'edit-menu-item-megamenu-button-border-color-hover-' . $item_id,
												'field_name'  => 'menu-item-megamenu-button-border-color-hover['.$item_id.']',
												'type'        => 'colorpicker',
												'field_mode'  => 'rgb',
                                                'field_position' => 'bottom left',
												'field_value' => $item->megamenu_button_border_color_hover ?? '',
												'field_class' => ''
											);

											call_user_func( 'ot_type_' . $field_settings['type'], $field_settings );

										?>

										<div class="ut-megamenu-settings-separator"></div>

										<h5><?php esc_html_e( 'Border Style', 'unitedthemes' ); ?></h5>

										<?php

											$field_settings = array(
												'field_id'     => 'edit-menu-item-megamenu-button-border-style-' . $item_id,
												'field_name'   => 'menu-item-megamenu-button-border-style['.$item_id.']',
												'type'         => 'select',
												'field_choices'=> array(

													array(
														'value' => 'solid',
														'label' => 'solid'
													),
													array(
														'value' => 'dotted',
														'label' => 'dotted'
													),
													array(
														'value' => 'dashed',
														'label' => 'dashed'
													),
													array(
														'value' => 'double',
														'label' => 'double'
													),

												),
												'field_value' => $item->megamenu_button_border_style ?? '',
												'field_class' => ''
											);

											call_user_func( 'ot_type_' . $field_settings['type'], $field_settings );

										?>

										<div class="ut-megamenu-settings-separator"></div>

										<h5><?php esc_html_e( 'Border Width', 'unitedthemes' ); ?></h5>

										<?php

											ut_call_option_by_type( array(
												'field_id'    => 'edit-menu-item-megamenu-button-border-width-' . $item_id,
												'field_name'  => 'menu-item-megamenu-button-border-width['.$item_id.']',
												'type'        => 'numeric_slider',
												'field_min_max_step' => '0,10,1',
												'field_value' => $item->megamenu_button_border_width ?? '',
												'field_class' => ''
											) );

										?>

									</div>

									<!-- Padding -->
									<div>

										<?php

											$field_settings = array(
												'field_id'    => 'edit-menu-item-megamenu-button-padding-' . $item_id,
												'field_name'  => 'menu-item-megamenu-button-padding['.$item_id.']',
												'type'        => 'spacing',
												'field_min_max_step' => '0,80,1',
												'field_value' => $item->megamenu_button_padding ?? '',
												'field_class' => ''
											);

											call_user_func( 'ot_type_' . $field_settings['type'], $field_settings );

										?>

									</div>

								</div>

							</div>                                

						</div>

                    <?php endif; ?>
                    
                    <?php if( 'megamenu-parent' == $item->object ) : ?>
                        
                        <div class="ut-megamenu-settings">
                            
                            <h4><?php esc_html_e( 'Megamenu Settings', 'unitedthemes' ); ?></h4>
                            
                            <div id="ut-megamenu-settings-<?php echo $item_id; ?>" class="ut-megamenu-settings-inner">
                                
                                <h5><?php esc_html_e( 'Megamenu Content Width', 'unitedthemes' ); ?></h5>
                                
                                <?php

									$field_settings = array(
										'field_id'     => 'edit-menu-item-megamenu-content-width-' . $item_id,
										'field_name'   => 'menu-item-megamenu-content-width['.$item_id.']',
										'type'         => 'select',
										'field_choices'=> array(
											array(
												'value' => 'fullwidth-padding',
												'label' => 'Full Width Menu with Padding and Full Width Content'
											),
                                            array(
												'value' => 'fullwidth',
												'label' => 'Full Width Menu with Full Width Content'
											),
                                            array(
												'value' => 'centered',
												'label' => 'Full Width Menu with Centered Content'
											),											
											array(
												'value' => 'centered-fullwidth',
												'label' => 'Centered Menu with Full Width Content'
											),
										),
										'field_value' => isset( $item->megamenu_content_width ) ? $item->megamenu_content_width : '',
										'field_class' => ''
									);

									call_user_func( 'ot_type_' . $field_settings['type'], $field_settings );
			
                                ?>                                
                            
                            </div>
                             
                        </div>
                                                
                    <?php endif; ?>
                    
                    <?php if( 'megamenu-column' == $item->object ) : ?>
                        
                        <div class="ut-megamenu-settings">
                            
                            <h4><?php esc_html_e( 'Megamenu Column Settings', 'unitedthemes' ); ?></h4>
                                                       
                            <div id="ut-megamenu-settings-<?php echo $item_id; ?>" class="ut-megamenu-settings-inner">
                                
                                <h5><?php esc_html_e( 'Hide Column Title', 'unitedthemes' ); ?></h5>
                                
                                <?php

									$field_settings = array(
										'field_id'     => 'edit-menu-item-megamenu-hide-column-title-' . $item_id,
										'field_name'   => 'menu-item-megamenu-hide-column-title['.$item_id.']',
										'type'         => 'select',
										'field_choices'=> array(
											array(
												'value' => 'off',
												'label' => 'no, thanks!'
											),
											array(
												'value' => 'on',
												'label' => 'yes, please!'
											),

										),
										'field_value' => isset( $item->megamenu_hide_column_title ) ? $item->megamenu_hide_column_title : '',
										'field_class' => ''
									);

									call_user_func( 'ot_type_' . $field_settings['type'], $field_settings );
                                ?>
                                                          
                            </div>
                                                 
                        </div>                    
                    
                    <?php endif; ?>
					
					<?php if( 'megamenu-image' == $item->object ) : ?>
                        
                        <div class="ut-megamenu-settings">
                            
                            <h4><?php esc_html_e( 'Megamenu Image Settings', 'unitedthemes' ); ?></h4>
                                                       
                            <div id="ut-megamenu-settings-<?php echo $item_id; ?>" class="ut-megamenu-settings-inner">
                                
                                <h5><?php esc_html_e( 'Mega Menu Image', 'unitedthemes' ); ?></h5>
                                
                                <?php
			
									$field_settings = array(
										'field_id'     => 'edit-menu-item-description-' . $item_id,
										'field_name'   => 'menu-item-description['.$item_id.']',
										'type'         => 'upload',
										'field_value' => isset( $item->description ) ? $item->description : '',
										'field_class' => ''
									);

									call_user_func( 'ot_type_' . $field_settings['type'], $field_settings );
                                ?>

                                <div class="ut-megamenu-settings-separator"></div>

                                <h5><?php esc_html_e( 'Image Align', 'unitedthemes' ); ?></h5>

                                <?php

                                $field_settings = array(
                                    'field_id'     => 'edit-menu-item-megamenu-image-align-' . $item_id,
                                    'field_name'   => 'menu-item-megamenu-image-align['.$item_id.']',
                                    'type'         => 'select',
                                    'field_choices'=> array(

                                        array(
                                            'value' => 'left',
                                            'label' => 'left'
                                        ),
                                        array(
                                            'value' => 'center',
                                            'label' => 'center'
                                        ),
                                        array(
                                            'value' => 'right',
                                            'label' => 'right'
                                        ),

                                    ),
                                    'field_value' => isset( $item->megamenu_image_align ) ? $item->megamenu_image_align : '',
                                    'field_class' => ''
                                );

                                call_user_func( 'ot_type_' . $field_settings['type'], $field_settings );

                                ?>

                                <div class="ut-megamenu-settings-separator"></div>

                                <h5><?php esc_html_e( 'Link', 'unitedthemes' ); ?></h5>

                                <?php

                                $field_settings = array(
                                    'field_id'    => 'edit-menu-item-megamenu-image-link-' . $item_id,
                                    'field_name'  => 'menu-item-megamenu-image-link['.$item_id.']',
                                    'type'        => 'text',
                                    'field_value' => isset( $item->megamenu_image_link ) ? $item->megamenu_image_link : '',
                                    'field_class' => 'widefat'
                                );

                                call_user_func( 'ot_type_' . $field_settings['type'], $field_settings );

                                ?>

                                <div class="ut-megamenu-settings-separator"></div>

                                <h5><?php esc_html_e( 'Link Target', 'unitedthemes' ); ?></h5>

                                <?php

                                $field_settings = array(
                                    'field_id'     => 'edit-menu-item-megamenu-image-link-target-' . $item_id,
                                    'field_name'   => 'menu-item-megamenu-image-link-target['.$item_id.']',
                                    'type'         => 'select',
                                    'field_choices'=> array(

                                        array(
                                            'value' => '_self',
                                            'label' => 'self'
                                        ),
                                        array(
                                            'value' => '_blank',
                                            'label' => 'blank'
                                        ),

                                    ),
                                    'field_value' => isset( $item->megamenu_image_link_target ) ? $item->megamenu_image_link_target : '',
                                    'field_class' => ''
                                );

                                call_user_func( 'ot_type_' . $field_settings['type'], $field_settings );

                                ?>

                            </div>
                                                 
                        </div>                    
                    
                    <?php endif; ?>
                    
                    <?php /* New fields insertion ends here */ ?>                    
                    
                    <p class="field-move hide-if-no-js description description-wide">
                        <label>
                            <span><?php esc_html_e( 'Move', 'unite' ); ?></span>
                            <a href="#" class="menus-move menus-move-up" data-dir="up"><?php _e( 'Up one', 'unite' ); ?></a>
                            <a href="#" class="menus-move menus-move-down" data-dir="down"><?php _e( 'Down one', 'unite' ); ?></a>
                            <a href="#" class="menus-move menus-move-left" data-dir="left"></a>
                            <a href="#" class="menus-move menus-move-right" data-dir="right"></a>
                            <a href="#" class="menus-move menus-move-top" data-dir="top"><?php _e( 'To the top', 'unite' ); ?></a>
                        </label>
                    </p>
    
                    <div class="menu-item-actions description-wide submitbox">
                        <?php if( 'navigation-widget-area' != $item->type && 'custom' != $item->type && $original_title !== false ) : ?>
                            <p class="link-to-original">
                                <?php printf( __('Original: %s', 'unite'), '<a href="' . esc_attr( $item->url ) . '">' . esc_html( $original_title ) . '</a>' ); ?>
                            </p>
                        <?php endif; ?>
                        <a class="item-delete submitdelete deletion" id="delete-<?php echo $item_id; ?>" href="<?php
                        echo wp_nonce_url(
                             esc_url( add_query_arg(
                                array(
                                    'action' => 'delete-menu-item',
                                    'menu-item' => $item_id,
                                ),
                                admin_url( 'nav-menus.php' )
                            ) ),
                            'delete-menu_item_' . $item_id
                        ); ?>"><?php esc_html_e( 'Remove', 'unite' ); ?></a> <span class="meta-sep hide-if-no-js"> | </span> <a class="item-cancel submitcancel hide-if-no-js" id="cancel-<?php echo $item_id; ?>" href="<?php echo esc_url( add_query_arg( array( 'edit-menu-item' => $item_id, 'cancel' => time() ), admin_url( 'nav-menus.php' ) ) );
                            ?>#menu-item-settings-<?php echo $item_id; ?>"><?php esc_html_e('Cancel', 'unite'); ?></a>
                    </div>
                                        
                    <input class="menu-item-data-db-id" type="hidden" name="menu-item-db-id[<?php echo $item_id; ?>]" value="<?php echo $item_id; ?>" />
                    <input class="menu-item-data-object-id" type="hidden" name="menu-item-object-id[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->object_id ); ?>" />
                    <input class="menu-item-data-object" type="hidden" name="menu-item-object[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->object ); ?>" />
                    <input class="menu-item-data-parent-id" type="hidden" name="menu-item-parent-id[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->menu_item_parent ); ?>" />
                    <input class="menu-item-data-position" type="hidden" name="menu-item-position[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->menu_order ); ?>" />
                    <input class="menu-item-data-type" type="hidden" name="menu-item-type[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->type ); ?>" />
                    
                    
                </div><!-- .menu-item-settings-->
                <ul class="menu-item-transport"></ul>
            <?php
            $output .= ob_get_clean();
        }
        
    }

endif;


if( !class_exists('WP_UT_Menu_Walker') ) :

    class WP_UT_Menu_Walker extends Walker_Nav_Menu {
       
        private $item;
        
        private $section_grid;
        private $sections_count;
        private $sections_global_count;
        
        private $mega_menu_open    = false;
        private $mega_menu_width   = 4;
        private $mega_section_open = false;
        private $mega_section_skin = false;
        private $inner_list_open   = array();        
        
        private $column_bottom_link = NULL;
        
        /** 
		 * Start Mega Menu
		 *
		 * @return    html
		 *
		 * @access    public
		 * @since     1.0.0
		 * @version   1.1.0
		 */
        
        public function start_mega_menu( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
            
            if( isset( $args->container_id ) && $args->container_id == 'navigation' ) {                
                $location = 'primary';                
            }
            
            if( isset( $args->container_id ) && $args->container_id == 'navigation-secondary' ) {                
                $location = 'secondary';                
            }
            
            // get menu items
            $menu_items = ut_recognized_nav_menu_items();
            $menu_items = isset( $menu_items[$location] ) ? $menu_items[$location] : false;
            
            // no menu items or active menu
            if( !$menu_items ) {
                return;
            }
            
            // create counter
            $this->sections_global_count = 0;
            $this->sections_count = 1;
            
            // mega menu width
            if( !empty( $this->item->megamenu_content_width ) && ( $this->item->megamenu_content_width == 'fullwidth' || $this->item->megamenu_content_width == 'fullwidth-padding' ) ) {
                $this->mega_menu_width = 6;
            }            
            
            // count column of this megamenu
            foreach( $menu_items as $menu_item ){

                if( $menu_item->menu_item_parent == $item->ID ){
                    $this->sections_global_count++;           
                }
                
            }
            
            // no columns found
            if( $this->sections_global_count == 0 ) {
                return;
            }
            
            // set flag for megamenu
            $this->mega_menu_open = true;
            
            // mega menu class
            $extra_class = array('ut-megamenu');
            
			// maybe we have less columns
			if( $this->sections_global_count < $this->mega_menu_width ) {
				
				$this->mega_menu_width = $this->sections_global_count;	
				
			}
			
            // bottom link extra class
            if( !empty( $this->item->megamenu_bottom_link ) && !empty( $this->item->megamenu_bottom_link_title ) ) {
                
                $extra_class[] = 'ut-has-bottom-link';    

                
            }
            
            if( !empty( $this->item->megamenu_skin ) && $this->item->megamenu_skin ) {
                
                $skin_name = strtolower( ut_remove_trash( $this->item->megamenu_skin ) );
                $extra_class[] = 'ut-megamenu-skin-' . $skin_name;
                
                /* store skin */
                $this->mega_section_skin = $this->item->megamenu_skin;
                
            }
            
            // mega menu width
            if( !empty( $this->item->megamenu_content_width ) && $this->item->megamenu_content_width == 'fullwidth' ) {
                
                $extra_class[] = 'ut-megamenu-fullwidth';
                
            }

			if( !empty( $this->item->megamenu_content_width ) && $this->item->megamenu_content_width == 'fullwidth-padding' ) {
                
                $extra_class[] = 'ut-megamenu-fullwidth ut-megamenu-with-padding';
                
            }

			if( !empty( $this->item->megamenu_content_width ) && $this->item->megamenu_content_width == 'centered-fullwidth' ) {
                
                $extra_class[] = 'ut-megamenu-centered';
                
            }
			
            /* final output */
            $output  .= '<div id="ut-megamenu-' . $item->ID . '" class="' . implode(' ', $extra_class ) . '">' . "\n";
                
                $output  .= '<div class="grid-container ut-megamenu-grid-container">' . "\n";
                    
                    $output  .= '<div class="ut-megamenu-grid-row-' . $this->mega_menu_width . '">' . "\n";
               
        }
        
        
        /** 
		 * End Mega Menu
		 *
		 * @return    html
		 *
		 * @access    public
		 * @since     1.0.0
		 * @version   1.0.0
		 */
        
        public function end_mega_menu( &$output, $item, $depth = 0, $args = array() ) {
            
            $indent  = ( $depth ) ? str_repeat( "\t", $depth ) : '';
                        
                    /* html markup */
                    $output .= $indent . '</div>' . "\n";
                $output .= $indent . '</div>' . "\n";
                
                /* bottom link */                
                if( !empty( $item->megamenu_bottom_link ) && !empty( $item->megamenu_bottom_link_title ) ) {
                    
                    $output .= $indent . '<div class="clear"></div>' . "\n";    
                    $output .= $indent . '<div id="ut-megamenu-bottom-link-' . $item->ID . '" class="ut-megamenu-bottom-link"><a href="' . esc_url( $item->megamenu_bottom_link ) . '">' . $item->megamenu_bottom_link_title . ' </a></div>'. "\n";
                
                } 
                        
            $output .= $indent . '</div>' . "\n";
            
            $this->mega_menu_open = false;
            $this->mega_section_skin = false;
            $this->mega_menu_width = 6;
            
        }
        
        
        /** 
		 * Start Mega Menu Column ( Section )
		 *
		 * @return    html
		 *
		 * @access    public
		 * @since     1.0.0
		 * @version   1.0.0
		 */
        
        public function start_mega_menu_section( &$output, $depth = 0, $args = array() ) {
            
            $this->mega_section_open = true;
            
            $indent  = ( $depth ) ? str_repeat( "\t", $depth ) : '';  
            
            /* css classes */
            $classes = empty( $this->item->classes ) ? array() : (array) $this->item->classes;
            
            /* add grid size */
            $classes[] = 'ut-navigation-column';            
            
            /* delete unwanted */ 
            $classes = array_diff( $classes, array('menu-item-type-') );
            $classes = array_diff( $classes, array('menu-item-has-children') );
            $classes = array_diff( $classes, array('current-menu-ancestor') );            
            
            /* bottom link extra class */
            if( !empty( $this->item->megamenu_column_bottom_link ) && !empty( $this->item->megamenu_column_bottom_link_title ) ) {
                
                $classes[] = 'ut-column-has-bottom-link';    
                
            }            
                        
            /* merge class names */
            $class_names = join( ' ', array_filter( $classes ) );
            $class_names = $class_names ? esc_attr( $class_names ) : '';
                        
            /* html markup */
            $output .= '<div class="ut-megamenu-grid-col">';
            
                $output .= '<div class="' . $class_names . '">';
                    
                    $output .= '<ul class="ut-navigation-column-list">';
                
            if( isset( $this->item->megamenu_hide_column_title ) && $this->item->megamenu_hide_column_title == 'on' ) {
            
                // nothing to do here    
            
            } else {
                
                /* get column title style */
                $column_title_style = ut_get_option( 'megamenu_column_title_style', 'ut-title-style1' );
                
                /* check for custom style */
                $custom_menu_skins = ut_get_option('megamenu_skins');
                
                if( $this->mega_section_skin && !empty( $custom_menu_skins ) && is_array( $custom_menu_skins ) ) {
                    
                    foreach( $custom_menu_skins as $key => $skin ) {
                                                                        
                        if( isset( $skin['skin_name'] ) && strtolower( ut_remove_trash( $skin['skin_name'] ) ) == $this->mega_section_skin ) {
                        
                            $column_title_style = $skin['column_title_style'];
                        
                        }
                    
                    }       
                
                }
                
                $output .= '<li class="ut-nav-header"><h3 class="' . $column_title_style . '"><span>' . apply_filters( 'the_title', $this->item->title ) . '</span></h3></li>';
            
            }
            
            if( !empty( $this->item->megamenu_column_bottom_link ) && !empty( $this->item->megamenu_column_bottom_link_title ) ) {
                
                /* store bottom link */               
                $this->column_bottom_link = '<li id="ut-megamenu-column-bottom-link-' . $this->item->ID . '" class="ut-megamenu-column-bottom-link"><a href="' . esc_url( $this->item->megamenu_column_bottom_link ) . '">' . $this->item->megamenu_column_bottom_link_title . ' </a></li>';
                
            }
            
        }
        
        
        /** 
		 * Start Mega Menu Column ( Section )
		 *
		 * @return    html
		 *
		 * @access    public
		 * @since     1.0.0
		 * @version   1.0.0
		 */
        
        public function end_mega_menu_section( &$output, $depth = 0, $args = array() ) {
                
            $indent  = ( $depth ) ? str_repeat( "\t", $depth ) : '';  
                
                    /* check if column has bottom link */
                    if( !empty( $this->column_bottom_link ) ) {
                        
                        $output .= $this->column_bottom_link . "\n";
                        $this->column_bottom_link = NULL;
                        
                    }
                 
                    /* html markup */
                    $output .= $indent . '</ul>' . "\n";
                $output .= $indent . '</div>'. "\n";
            $output .= $indent . '</div>'. "\n";
            
            if( $this->sections_count == $this->mega_menu_width ) {
                
                /* reset count for next row */
                $this->sections_count = 0;
                
            }
            
            $this->sections_count++;
            $this->sections_global_count--;
            
            $this->mega_section_open = false;
            
        }
        
        public function start_lvl( &$output, $depth = 0, $args = array() ) {           
            
            /* html formatting */
            $indent  = ( $depth ) ? str_repeat( "\t", $depth ) : '';            
                        
            /* default dropdown */
            if( $depth == 0 && $this->item->classes != '' && in_array( 'menu-item-has-children', $this->item->classes ) && !$this->mega_menu_open ) {
                
                $output .= $indent . '<ul class="sub-menu">' . "\n";                                    
                
            /* inner dropdown */    
            } elseif( $depth == 1 && !$this->mega_menu_open ) {
                                    
                $output .= $indent . '<ul class="sub-menu">' . "\n";
                
            /* inner dropdown nested lists */    
            } elseif( $depth >= 2 ) {
                
                if( !$this->mega_menu_open ) {
                
                    $output .= $indent . '<ul class="sub-menu">' . "\n";
                
                }                 
                
            } 
            
        }                
        
        public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {            
            
            /* assign current item */
            $this->item = $item;
            
            /* needed variables */
            $dropdown  = NULL;
            $home_link = false;
            
            /* front page ID */
            $front_page_id 	= get_option('page_on_front');
                        
            /* html formatting */
            $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
            
            /* css classes */
            $classes = empty( $item->classes ) ? array() : (array) $item->classes;
            $classes[] = 'menu-item-' . $item->ID;
            
            
            if( !$this->mega_menu_open ) {
                $classes[] = 'ut-menu-item-lvl-' . $depth;                
            }
            
            if( is_front_page() && $front_page_id == $item->object_id ) {
                $classes[] = 'ut-home-link menu-item-object-custom';
                $home_link = true;
            }
            
            /* category css class */
            if( 'category' == $item->object ){
                $category  = get_category( $item->object_id );
                $classes[] = 'menu-category-' . $category->slug;
            }
            
            /* extra class for parent elements */
            if ( $this->has_children && !$this->mega_menu_open ) {
                $classes[] = 'ut-parent';
                $classes[] = 'ut-has-children';
            }

            /* extra class if has children */
            if( !empty( $item->description ) && $depth == 0 ) {
	            $classes[] = 'ut-has-description';
            }

            if( $this->mega_menu_open ) {
                $classes = array_diff( $classes, array('menu-item-has-children') );
            }
                        
            /* extra class for megamenu */
            if( $depth == 0 && $item->object == 'megamenu-parent' ) {
                $classes[] = 'ut-is-megamenu';
            }
            
            // fix blog highlight for portfolio pages
            if( is_singular('portfolio') && $item->object_id == get_option('page_for_posts') ) {
                $classes = array_diff( $classes, array( 'current_page_parent' ) );                
            }

            // fix blog highlight for event pages
			if( function_exists('is_tribe_page') && is_tribe_page() && $item->object_id == get_option('page_for_posts') ) {
				$classes = array_diff( $classes, array( 'current_page_parent' ) );
			}

	        // search for custom section links in submenu items
            if( in_array( 'current-menu-parent', $classes ) ) {

	            $nav_menu_items = wp_get_nav_menu_items( $args->menu->term_id );

	            global $wp;

	            foreach( $nav_menu_items as $nav_menu_item ) {

                    if( isset( $nav_menu_item->menu_item_parent ) && $nav_menu_item->menu_item_parent == $item->ID ) {

                        if( !empty( $nav_menu_item->url ) ) {

	                        $item_url    = parse_url ( $nav_menu_item->url );
	                        $current_url = parse_url ( home_url( add_query_arg(array(), $wp->request) ) );

	                        if( ( $item_url['host'] == $current_url['host'] ) && ( rtrim($item_url['path'], '/') . '/' ==  rtrim($current_url['path'], '/') . '/' ) && !empty( $item_url['fragment'] ) ) {

		                        $classes[] = 'has-scroll-children';

                            }

                        }

                    }

                }

            }

	        // custom link current menu item
            if( $item->object == 'custom' ) {

                if( $item->object != get_queried_object_id() ) {

                    $classes = array_diff( $classes, array( 'current-menu-item' ) );
                    $classes = array_diff( $classes, array( 'current-menu-ancestor' ) );

                    $classes = array_diff( $classes, array( 'current_page_item' ) );
                    $classes = array_diff( $classes, array( 'current_page_ancestor' ) );

                }

            }

            /* merge class names */
            $class_names = join( ' ', array_filter( $classes ) );
            $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
            
            /* menu item id */
            $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
            
            /* menu link attributes */
            $atts = array();
            
            $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
            $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
            $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
            $atts['href']   = ! empty( $item->url )        ? $item->url        : '#';

            // check if contact section has only an ID
            if( strpos( $class_names, 'contact-us') !== false ) {
        
                if( ut_return_csection_config('ut_activate_csection', 'on') == 'on' ) {

                    $atts["href"] = esc_attr( $item->url );

                } else {

                    $ut_activate_csection = ot_get_option('ut_activate_csection');

                    if( is_array( $ut_activate_csection ) && in_array( 'is_front_page', $ut_activate_csection ) ) {

                        $atts["href"] = esc_attr( home_url() . '/'   . esc_attr( $item->url ) );

                    }

                }  

            }

            if( $depth == 0 ) {
                $atts['class'] = 'ut-main-navigation-link';                
            }
            
            if( $home_link ) {
                $atts['href'] = '#top';
            }

            /* loop trough menu link attributes */
            $attributes = '';
            foreach ( $atts as $attr => $value ) {
                if ( ! empty( $value ) ) {
                    $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                    $attributes .= ' ' . $attr . '="' . $value . '"';
                }
            }
            
			$link_output = '';
			
            if( $item->object == 'navigation-widget-area' ) {
                
                $link_output = $this->create_menu_widget( $item->xfn );
                
            } else {
                
                $title = apply_filters( 'the_title', $item->title, $item->ID );
                
                if( $item->object == "megamenu-button" ) {
            
                    if( class_exists("UT_BTN") ) {

                        // fallback values
						$megamenu_button_background_color    = !empty( $_GET['color'] ) ? '#' . $_GET['color'] : get_option('ut_accentcolor' , '#F1C40F');
						$megamenu_button_border_radius_value = $item->megamenu_button_border_radius_value ?? 4;

						$button = new UT_BTN();

						// convert spacing
						$spacing = '';

						if( isset( $item->megamenu_button_padding ) && is_array( $item->megamenu_button_padding ) ) {

							$spacing = implode(' ', array_map(
								function ($v, $k) { 

									if( $v != 0 ) {
										return sprintf("%s:%spx;", $k, $v); 
									}

								},
								$item->megamenu_button_padding,
								array_keys( $item->megamenu_button_padding )
							) );

						}
                        
                        // Default Button Colors
                        $megamenu_button_text_color_hover = '#FFF';
                        $megamenu_button_background_color_hover = '#151515';
                        
                        if( ut_return_header_config( 'ut_navigation_skin' , 'ut-header-light' ) == 'ut-header-dark' ) {
                            
                            $megamenu_button_text_color_hover = '#131416';
                            $megamenu_button_background_color_hover = '#FFF';
                            
                        }                        
                        
						$link_output = $button->ut_create_shortcode( array(
							'button_text'               => $title,
							'button_text_color'         => isset( $item->megamenu_button_text_color ) ? $item->megamenu_button_text_color : '#FFF',
							'button_text_color_hover'   => isset( $item->megamenu_button_text_color_hover ) ? $item->megamenu_button_text_color_hover : $megamenu_button_text_color_hover,
							'button_background'         => isset( $item->megamenu_button_background_color ) ? $item->megamenu_button_background_color : $megamenu_button_background_color,
							'button_background_hover'   => isset( $item->megamenu_button_background_color_hover ) ? $item->megamenu_button_background_color_hover : $megamenu_button_background_color_hover,
							'button_border_radius'      => isset( $item->megamenu_button_border_radius ) && $item->megamenu_button_border_radius == 'on' ? $megamenu_button_border_radius_value : '',
							'button_plain_link'         => isset( $item->megamenu_button_link ) ? $item->megamenu_button_link : '',
							'button_plain_target'       => isset( $item->megamenu_button_link_target ) ? $item->megamenu_button_link_target : '_blank',
							'button_custom_border'      => isset( $item->megamenu_button_border ) ? $item->megamenu_button_border : 'no',
							'button_border_color'       => isset( $item->megamenu_button_border_color ) ? $item->megamenu_button_border_color : '',
							'button_border_color_hover' => isset( $item->megamenu_button_border_color_hover ) ? $item->megamenu_button_border_color_hover : '',
							'button_border_width'       => isset( $item->megamenu_button_border_width ) ? $item->megamenu_button_border_width : '',
							'button_border_style'       => isset( $item->megamenu_button_border_style ) ? $item->megamenu_button_border_style : '',
							'spacing'                   => $spacing,
							'class'                     => 'bklyn-btn-menu'
						) );

                    } else {
						
						/* create menu link */
						$link_output = $args->before;
						$link_output .= '<a'. $attributes .'>';
						$link_output .= $args->link_before . apply_filters( 'the_title', do_shortcode($item->title ), $item->ID ) . $args->link_after;
						$link_output .= '</a>';
						$link_output .= $args->after;						
						
					}  

                } elseif( $item->object == "megamenu-image" && !empty( $item->description ) ) {

                    $image_align  = $item->megamenu_image_align ?? 'left';
                    $image_link   = $item->megamenu_image_link ?? '';
                    $image_target = $item->megamenu_image_link_target ?? '_self';

                    $link_output = $args->before;

                    $link_output .= '<div class="ut-megamenu-image-wrap ut-megamenu-image-' . esc_attr( $image_align ) . '">';

                        if( $image_link ) {

                            $link_output .= '<a class="ut-megamenu-image" href="' . esc_url( $image_link ) . '" target="' . esc_attr( $image_target ) . '">';

                        }

                        // get image id
	                    $image_ID  = ut_get_image_id( $item->description );

                        // get image alt
	                    $image_alt = get_post_meta( $image_ID, '_wp_attachment_image_alt', true );

                        // get caption
                        $caption = get_post( $image_ID )->post_excerpt;

                        // whether to use alt or caption
                        $image_alt = empty( $image_alt ) ? $caption : $image_alt;

	                    $alt = '';

                        if( !empty( $image_alt ) ) {

	                        $alt = 'alt="' . esc_attr( $image_alt ) . '"';

                        }

                        $link_output .= '<img ' . $attributes . ' src="' . esc_url( $item->description ) . '" ' . $alt . ' />';

                        if( $image_link ) {

                            $link_output .= '</a>';

                        }

                    $link_output .= '</div>';

                    $link_output .= $args->after;
					
				} else {

                    $_custom_css = !empty( $item->description_color ) ? '<style>#header-section .ut-horizontal-navigation.ut-navigation-with-description-above ul li.menu-item-' . $item->ID. ' a.ut-main-navigation-link [data-description]::before { color: ' . $item->description_color . ' !important; } </style>' : '';


                    $_link_before = !empty( $item->description ) ? $_custom_css . '<span data-description="'. esc_attr( $item->description ) .'">' : $args->link_before;

                    /* create menu link */
                    $link_output = $args->before;
                    $link_output .= '<a'. $attributes .'>';
                    $link_output .= $_link_before . apply_filters( 'the_title', do_shortcode( $item->title ), $item->ID ) . $args->link_after;
                    $link_output .= '</a>';
                    $link_output .= $args->after;
                    
                }
            
            }
           
            if( $item->object == 'megamenu-column' || $item->object != 'megamenu-column' && $depth == '1' && $this->mega_menu_open ) {
                
                $this->start_mega_menu_section( $output, $depth, $args );
                
            } else {            
            	
                /* create list opener */
                $output .= $indent . '<li' . $id . $class_names . $dropdown . ' data-menu-id="' . $item->ID . '">' . "\n";
                $output .= $indent . $link_output . "\n";                                
                
                if( $depth == 0 && $item->object == 'megamenu-parent' ) {

                    $this->start_mega_menu( $output, $item, $depth, $args, $id );

                }
            
            }    
            
            
        }
        
        public function end_el( &$output, $item, $depth = 0, $args = array() ) {
            
            /* html formatting */
            $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';            
            
            if( $depth == 0 && $this->mega_menu_open ) {
                
                $this->end_mega_menu( $output, $item, $depth, $args );
                
            }
            
            if( $item->object == 'megamenu-column' || $item->object != 'megamenu-column' && $depth == '1' && $this->mega_menu_open ) {
                
                $this->end_mega_menu_section( $output, $depth, $args );
                
            }  else {
            
                $output .= $indent . '</li>' . "\n";
                
            }                
            
        }
        
        public function end_lvl( &$output, $depth = 0, $args = array() ) {
            
            $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
            
            if( $depth == 0 && !$this->mega_menu_open ) {
                
                $output .= $indent . '</ul>' . "\n";
           
            } elseif( $depth >= 1 && !$this->mega_menu_open ) {
            
                $output .= $indent . '</ul>' . "\n";
                
            }          
            
           
        }
        
        public function create_menu_widget( $widget_id ) {
            
            global $wp_registered_widgets, $wp_registered_sidebars;
                        
            if ( !isset( $wp_registered_widgets[$widget_id]) ) {
                return;
            }
            
            $item_output = NULL;
            
            /* setup sidebar */
            $sidebar = array_merge(
                    
                    $wp_registered_sidebars['navigation-widget-area'],

                    array(
                        'widget_id'   => $widget_id,
                        'widget_name' => $wp_registered_widgets[$widget_id]['name']
                    )
                    
            );
            
            /* setup widget config */
            $params = array_merge(
                array($sidebar),
                (array) $wp_registered_widgets[$widget_id]['params']
            );
            
            
            /* callback */
            $callback = $wp_registered_widgets[$widget_id]['callback'];
            
            if ( is_callable( $callback ) ) {
                
                ob_start(); 

                call_user_func_array($callback, $params); 
                
                $item_output .= '<div class="widget-area navigation-widget-area">';
                
                    $item_output .= ob_get_contents();
                
                $item_output .= '</div>';

                ob_get_clean();
                    
            }
            
            return $item_output;
            
            
        } 
        
        
    }
    
endif;