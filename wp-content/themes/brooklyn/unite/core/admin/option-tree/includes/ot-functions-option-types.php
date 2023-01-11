<?php if ( ! defined( 'UT_THEME_VERSION' ) ) exit( 'No direct script access allowed' );

/**
 * Builds the HTML for each of the available option types by calling those
 * function with call_user_func and passing the arguments to the second param.
 *
 * All fields are required!
 *
 * @param     array       $args The array of arguments are as follows:
 * @param     string      $type Type of option.
 * @param     string      $field_id The field ID.
 * @param     string      $field_name The field Name.
 * @param     mixed       $field_value The field value is a string or an array of values.
 * @param     string      $field_desc The field description.
 * @param     string      $field_std The standard value.
 * @param     string      $field_class Extra CSS classes.
 * @param     array       $field_choices The array of option choices.
 * @param     array       $field_settings The array of settings for a list item.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_display_by_type' ) ) {

    function ot_display_by_type( $args = array() ) {
    
        /* allow filters to be executed on the array */
        $args = apply_filters( 'ot_display_by_type', $args );
    
        /* build the function name */
        $function_name_by_type = str_replace( '-', '_', 'ot_type_' . $args['type'] );
    
        /* call the function & pass in arguments array */
        if ( function_exists( $function_name_by_type ) ) {
        
            call_user_func( $function_name_by_type, $args );
            
        } else {
            
            echo '<p>' . __( 'Sorry, this function does not exist', 'unitedthemes' ) . '</p>';
            
        }
    
    }
  
}


/**
 * Gallery option type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     The options arguments
 * @return    string    The gallery metabox markup.
 *
 * @access    public
 * @since     4.6.5
 */

if ( !function_exists( 'ot_type_gallery' ) ) {

	function ot_type_gallery( $args = array() ) {

		// Turns arguments array into variables
		extract( $args );

		// Verify a description
		$has_desc = (bool)$field_desc;

		// Format setting inner wrapper
		echo '<div class="format-setting-inner">';

		// Setup the post type
		$post_type = isset( $field_post_type ) ? explode( ',', $field_post_type ) : array( 'post' );

		$field_value = trim( $field_value );

		// Saved values
		echo '<input type="hidden" name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '" data-max-images="' . esc_attr( $field_max ) . '" value="' . esc_attr( $field_value ) . '" class="ut-gallery-value ' . esc_attr( $field_class ) . '" />';

		// Search the string for the IDs
		preg_match( '/ids=\'(.*?)\'/', $field_value, $matches );

		// Turn the field value into an array of IDs
		if ( isset( $matches[ 1 ] ) ) {

			// Found the IDs in the shortcode
			$ids = explode( ',', $matches[ 1 ] );

		} else {

			// The string is only IDs
			$ids = !empty( $field_value ) && $field_value != '' ? explode( ',', $field_value ) : array();

		}

		// Has attachment IDs
		if ( !empty( $ids ) ) {

			echo '<ul class="ut-gallery-list">';

			foreach ( $ids as $id ) {

				if ( $id == '' )
					continue;

				$thumbnail = wp_get_attachment_image_src( $id, 'thumbnail' );

				echo '<li><img  src="' . $thumbnail[ 0 ] . '" width="150" height="150" /></li>';

			}

			echo '</ul>';

			echo '<div class="ut-gallery-buttons">
                <a href="#" class="ut-ui-button ut-gallery-edit">' . __( 'Edit Images', 'unitedthemes' ) . '</a>
                <a href="#" class="ut-ui-button ut-ui-button-health ut-gallery-delete">' . __( 'Delete Images', 'unitedthemes' ) . '</a>            
            </div>';

		} else {

			echo '<div class="ut-gallery-buttons">
                <a href="#" class="ut-ui-button ut-gallery-edit">' . __( 'Add Images', 'unitedthemes' ) . '</a>
            </div>';

		}

		echo '</div>';


	}

}

/**
 * Repeating Background Position for Gallery Option Type
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     4.9.4
 */

function ot_type_repeating_background_position( $args = array() ) {

    /* turns arguments array into variables */
    extract( $args );

    $count = 3;

    for( $i=1; $i<=$count; $i++ ) {

        $background_position = isset( $field_value[$i]['background-position'] ) ? esc_attr( $field_value[$i]['background-position'] ) : '';

        echo '<div class="ut-ui-select-field" style="width: calc(' . (100/$count) . '% - 10px); margin-right:10px; display: inline-block;">';

            echo '<label>' . sprintf( esc_html__( 'Image %s', 'unitedthemes' ), $i ) . '</label>';

            echo '<select name="' . esc_attr( $field_name ) . '['.$i.'][background-position]" id="' . esc_attr( $field_id ) . '-position" class="ut-ui-form-select ut-ui-select ' . esc_attr( $field_class ) . '">';

                echo '<option value="">' . __( 'background-position', 'unitedthemes' ) . '</option>';

                foreach ( ot_recognized_background_position( $field_id ) as $key => $value ) {
                    echo '<option value="' . esc_attr( $key ) . '" ' . selected( $background_position, $key, false ) . '>' . esc_attr( $value ) . '</option>';
                }

            echo '</select>';

        echo '</div>';

    }

}


/**
 * Background Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_background' ) ) {
  
    function ot_type_background( $args = array() ) {
    
        /* turns arguments array into variables */
        extract( $args );
            
        /* fallback if field was an upload field before */
        if( !is_array( $field_value ) && !empty( $field_value )  ) {
            
            /* store image url first */
            $background = $field_value;
            
            $field_value = array(
                'background-image'      => $background,
                'background-repeat'     => 'no-repeat',
                'background-attachment' => '',
                'background-position'   => '',
                'background-size'       => 'cover'
            );
                    
        }
    	
		/* media */
        echo '<div class="grid-50 tablet-grid-100 mobile-grid-100">';
                
            echo '<div id="' . esc_attr( $field_id ) . '_media" class="ut-ui-media-wrap">';

                if ( isset( $field_value['background-image'] ) && preg_match( '/\.(?:jpe?g|png|gif|svg|ico)$/i', $field_value['background-image'] ) ) {
                    
                    echo '<div class="ut-ui-image-wrap"><img src="' . esc_url( $field_value['background-image'] ) . '" alt="" /></div><div class="clear"></div>';
                    echo '<button class="ut-ui-remove-media ut-ui-button" title="' . __( 'X', 'unitedthemes' ) . '">' . __( 'X', 'unitedthemes' ) . '</button>';
                        
                } else {
                    
					$folder = ot_get_option( 'ut_theme_options_skin', 'unite-admin-dark' ) == 'unite-admin-light' ? 'dark/' : '';
					
                    echo '<div class="ut-ui-image-wrap"><img src="' . esc_url( THEME_WEB_ROOT . '/images/placeholder/' . $folder . 'bg-image-placeholder.jpg') . '" alt="" /></div><div class="clear"></div>';
                    
                }
            
            echo '</div>';
        
        echo '</div>';
		
		echo '<div class="grid-50 tablet-grid-100 mobile-grid-100">';
		
			echo '<div class="ut-ui-select-group clearfix">';

				/* build background repeat */
				$background_repeat = isset( $field_value['background-repeat'] ) ? esc_attr( $field_value['background-repeat'] ) : '';

				echo '<div class="ut-ui-select-field">';

					echo '<select name="' . esc_attr( $field_name ) . '[background-repeat]" id="' . esc_attr( $field_id ) . '-repeat" class="ut-ui-form-select ut-ui-select ' . esc_attr( $field_class ) . '">';

						echo '<option value="">' . __( 'background-repeat', 'unitedthemes' ) . '</option>';

						foreach ( ot_recognized_background_repeat( $field_id ) as $key => $value ) {
							echo '<option value="' . esc_attr( $key ) . '" ' . selected( $background_repeat, $key, false ) . '>' . esc_attr( $value ) . '</option>';
						}

					echo '</select>';

				echo '</div>';


				/* build background attachment */
				$background_attachment = isset( $field_value['background-attachment'] ) ? esc_attr( $field_value['background-attachment'] ) : '';

				echo '<div class="ut-ui-select-field">';

					echo '<select name="' . esc_attr( $field_name ) . '[background-attachment]" id="' . esc_attr( $field_id ) . '-attachment" class="ut-ui-form-select ut-ui-select ' . $field_class . '">';

						echo '<option value="">' . __( 'background-attachment', 'unitedthemes' ) . '</option>';

						foreach ( ot_recognized_background_attachment( $field_id ) as $key => $value ) {
						  echo '<option value="' . esc_attr( $key ) . '" ' . selected( $background_attachment, $key, false ) . '>' . esc_attr( $value ) . '</option>';
						}

					echo '</select>';

				echo '</div>';


				/* build background position */
				$background_position = isset( $field_value['background-position'] ) ? esc_attr( $field_value['background-position'] ) : '';

				echo '<div class="ut-ui-select-field">';

					echo '<select name="' . esc_attr( $field_name ) . '[background-position]" id="' . esc_attr( $field_id ) . '-position" class="ut-ui-form-select ut-ui-select ' . esc_attr( $field_class ) . '">';

						echo '<option value="">' . __( 'background-position', 'unitedthemes' ) . '</option>';

						foreach ( ot_recognized_background_position( $field_id ) as $key => $value ) {
							echo '<option value="' . esc_attr( $key ) . '" ' . selected( $background_position, $key, false ) . '>' . esc_attr( $value ) . '</option>';
						}

					echo '</select>';

				echo '</div>';            


				/* build background size */
				$background_size = isset( $field_value['background-size'] ) ? esc_attr( $field_value['background-size'] ) : '';

				echo '<div class="ut-ui-select-field">';

					echo '<select name="' . esc_attr( $field_name ) . '[background-size]" id="' . esc_attr( $field_id ) . '-size" class="ut-ui-form-select ut-ui-select ' . esc_attr( $field_class ) . '">';

						echo '<option value="">' . __( 'background-size', 'unitedthemes' ) . '</option>';

						foreach ( ot_recognized_background_size( $field_id ) as $key => $value ) {
							echo '<option value="' . esc_attr( $key ) . '" ' . selected( $background_size, $key, false ) . '>' . esc_attr( $value ) . '</option>';
						}

					echo '</select>';

				echo '</div>';


			echo '</div>'; 

			echo '<div class="ut-ui-upload-parent">';

				// input 
				echo '<input autocomplete="off" type="text" name="' . esc_attr( $field_name ) . '[background-image]" id="' . esc_attr( $field_id ) . '" value="' . ( isset( $field_value['background-image'] ) ? esc_attr( $field_value['background-image'] ) : '' ) . '" class="ut-ui-form-input ut-ui-upload-input ' . esc_attr( $field_class ) . '" />';

				// add media button 
				echo '<button class="ut-media-upload ut-ui-button" rel="' . $post_id . '" title="' . __( 'Add Media', 'unitedthemes' ) . '">' . __( 'Add Media', 'unitedthemes' ) . '</button>';

			echo '</div>';
        
		echo '</div>';
       
    
    }
  
}


/**
 * Category Checkbox Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_category_checkbox' ) ) {
  
    function ot_type_category_checkbox( $args = array() ) {
    
        /* turns arguments array into variables */
        extract( $args );
      
        /* get category array */
        $categories = get_categories( array( 'hide_empty' => false ) );
        
        /* build categories */
        if ( ! empty( $categories ) ) {
            
            foreach ( $categories as $category ) {

                echo '<label for="' . esc_attr( $field_id ) . '-' . esc_attr( $category->term_id ) . '">' . esc_attr( $category->name ) . '</label>';
                echo '<input type="checkbox" name="' . esc_attr( $field_name ) . '[' . esc_attr( $category->term_id ) . ']" id="' . esc_attr( $field_id ) . '-' . esc_attr( $category->term_id ) . '" value="' . esc_attr( $category->term_id ) . '" ' . ( isset( $field_value[$category->term_id] ) ? checked( $field_value[$category->term_id], $category->term_id, false ) : '' ) . ' class="ut-ui-form-checkbox ut-ui-checkbox ' . esc_attr( $field_class ) . '" />';
            
            } 
            
        } else {
          
          echo '<p>' . __( 'No Categories Found', 'unitedthemes' ) . '</p>';
          
        }
    
    }
  
}


/**
 * Category Select Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_category_select' ) ) {
  
    function ot_type_category_select( $args = array() ) {
    
        extract( $args );
        
        echo '<div class="ut-ui-select-field">';
            
            echo '<select name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '" class="ut-ui-form-select ut-ui-select ' . $field_class . '">';
            
            /* get category array */
            $categories = get_categories( array( 'hide_empty' => false ) );
            
            /* has cats */
            if ( ! empty( $categories ) ) {
                
                echo '<option value="">-- ' . esc_html__( 'Choose One', 'unitedthemes' ) . ' --</option>';
                
                foreach ( $categories as $category ) {
                    
                    echo '<option value="' . esc_attr( $category->term_id ) . '"' . selected( $field_value, $category->term_id, false ) . '>' . esc_attr( $category->name ) . '</option>';
                
                }            
            
            } else {
            
              echo '<option value="">' . __( 'No Categories Found', 'unitedthemes' ) . '</option>';
            
            }
            
            echo '</select>';
        
        echo '</div>';
    
    }
  
}

/**
 * Checkbox Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_checkbox' ) ) {
  
    function ot_type_checkbox( $args = array() ) {
    
        /* turns arguments array into variables */
        extract( $args );    

        /* build checkbox */
        foreach ( (array) $field_choices as $key => $choice ) {
            
            if ( isset( $choice['value'] ) && isset( $choice['label'] ) ) {
                
                echo '<div class="ut-ui-form-checkbox-wrap clearfix">';    
                    echo '<label for="' . esc_attr( $field_id ) . '-' . esc_attr( $key ) . '">' . esc_attr( $choice['label'] ) . '</label>';
                    echo '<input type="checkbox" name="' . esc_attr( $field_name ) . '[' . esc_attr( $key ) . ']" id="' . esc_attr( $field_id ) . '-' . esc_attr( $key ) . '" value="' . esc_attr( $choice['value'] ) . '" ' . ( isset( $field_value[$key] ) ? checked( $field_value[$key], $choice['value'], false ) : '' ) . ' class="ut-ui-form-checkbox ut-ui-checkbox ' . esc_attr( $field_class ) . '" />';                
                echo '</div>';
                
            }
            
        }
    
    }
  
}


/**
 * Checkbox Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_switch' ) ) {
  
    function ot_type_switch( $args = array() ) {
    
        /* turns arguments array into variables */
        extract( $args );    
        
        echo '<div class="ut-switch" data-on="on" data-off="off">';
        
            echo '<input id="' . esc_attr( $field_id ) . '" name="' . esc_attr( $field_name ) . '" value="on" ' . ( isset( $field_value ) ? checked( $field_value, 'on', false ) : '' ) . ' type="checkbox">';
        
            echo '<label for="' . esc_attr( $field_id ) . '"></label>';        
        
        echo '</div>';
                
    
    }
  
}



/**
 * Colorpicker Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_colorpicker' ) ) {
  
    function ot_type_colorpicker( $args = array() ) {
    
        /* turns arguments array into variables */
        extract( $args );
        
        /* input */          
        echo '<div class="ut-minicolors-wrap">';
            
            echo '<input data-position="' . esc_attr( $field_position ) . '" data-mode="' . esc_attr( $field_mode ) . '" type="text" name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '" value="' . esc_attr( $field_value ) . '" class="ut-ui-form-input ut-minicolors ut-color-mode-' . esc_attr( $field_mode ) . ' ' . esc_attr( $field_class ) . '" autocomplete="off" />';
            echo '<span class="ut-minicolors-swatch" style="background-color:' . esc_attr( $field_value ) . ';"></span>';            
            
        echo '</div>';

    
    }
  
}


/**
 * Colorpicker Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_gradient_colorpicker' ) ) {
  
    function ot_type_gradient_colorpicker( $args = array() ) {
    
        /* turns arguments array into variables */
        extract( $args );
        
        /* input */          
        echo '<div class="ut-minicolors-wrap">';
        
            echo '<input data-mode="gradient" type="text" name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '" value="' . esc_attr( $field_value ) . '" class="ut-ui-form-input ut-gradient-picker ' . esc_attr( $field_class ) . '" autocomplete="off" />';                  
            echo '<span class="ut-minicolors-swatch" style="background-color:' . esc_attr( $field_value ) . ';"></span>';

        echo '</div>';
    
    }
  
}




/**
 * Colorpicker Option Type. Connect to WordPress Customizer
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_colorpicker_customizer' ) ) {
  
    function ot_type_colorpicker_customizer( $args = array() ) {
    
        /* turns arguments array into variables */
        extract( $args );
    
        /* get value from WordPress Customizer */
        $field_value = get_option($field_id , '#F1C40F');    
        
        /* input */
        echo '<div class="ut-minicolors-wrap">';
        
            echo '<input data-mode="' . esc_attr( $field_mode ) . '" type="text" name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '" value="' . esc_attr( $field_value ) . '" class="ut-ui-form-input ut-minicolors minicolors-input ut-color-mode-' . esc_attr( $field_mode ) . ' ' . esc_attr( $field_class ) . '" autocomplete="off" />';                  
            echo '<span class="ut-minicolors-swatch" style="background-color:' . esc_attr( $field_value ) . ';"></span>';            
            
        echo '</div>';
        
    }
  
}




/**
 * Iconpicker Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     4.1
 */
if ( ! function_exists( 'ot_type_iconpicker' ) ) {
  
    function ot_type_iconpicker( $args = array() ) {
        
        /* turns arguments array into variables */
        extract( $args );
                
        if( function_exists('ut_recognized_icons') ) {
                                    
            echo '<select class="ut-ui-form-select ut-icon-select" id="' , esc_attr( $field_id ) , '" name="' , esc_attr( $field_name ) , '">';
                
                echo '<option value="">' . esc_html__('Select Icon','unitedthemes') . '</option>';
                
                foreach( ut_recognized_icons() as $key => $icon ) {
    
                     echo '<option value="fa ' , $icon , '" ' , selected( $field_value, 'fa ' . $icon, false ) , '>' , 'fa ' , $icon , '</option>';
                
                }
            
            echo '</select>';
        
        }
        
    }

}




/**
 * Button Builder Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_button_builder' ) ) {
  
    function ot_type_button_builder( $args = array() ) {
    
        /* turns arguments array into variables */
        extract( $args );
        
        $ot_recognized_button_builder_fields = apply_filters( 'ot_recognized_button_builder_fields', array( 
            'color-settings',
            'border-settings',
            'icon-settings',
            'font-settings',
            'spacing-settings',
            'effect-settings',
            'hover-effect'
        ), $field_id );
        
        echo '<div class="ut-button-builder">';
        
            echo '<ul class="ut-button-builder-tabs clearfix" data-tabgroup="' . esc_attr( $field_id ) . '_group">';
        
                if ( in_array( 'color-settings', $ot_recognized_button_builder_fields ) ) 
                echo '<li><a href="#' . esc_attr( $field_id ) . '_tab_color" class="active">' . __('Button Colors' , 'unitedthemes') . '</a></li>';
                
                if ( in_array( 'border-settings', $ot_recognized_button_builder_fields ) )
                echo '<li><a href="#' . esc_attr( $field_id ) . '_tab_border">' . __('Button Border' , 'unitedthemes') . '</a></li>';
                
                if ( in_array( 'icon-settings', $ot_recognized_button_builder_fields ) )    
                echo '<li><a href="#' . esc_attr( $field_id ) . '_tab_icon">' . __('Button Icon' , 'unitedthemes') . '</a></li>';
                
                if ( in_array( 'font-settings', $ot_recognized_button_builder_fields ) )
                echo '<li><a href="#' . esc_attr( $field_id ) . '_tab_font">' . __('Button Font' , 'unitedthemes') . '</a></li>';
                
                if ( in_array( 'spacing-settings', $ot_recognized_button_builder_fields ) )
                echo '<li><a href="#' . esc_attr( $field_id ) . '_tab_spacing">' . __('Button Spacing' , 'unitedthemes') . '</a></li>';
				
                if ( in_array( 'effect-settings', $ot_recognized_button_builder_fields ) )
                echo '<li><a href="#' . esc_attr( $field_id ) . '_tab_effect">' . __('Button Effect' , 'unitedthemes') . '</a></li>';
        
            echo '</ul>';
        
            echo '<section id="' . esc_attr( $field_id ) . '_group" class="ut-button-builder-tabgroup">';
                
                if ( in_array( 'color-settings', $ot_recognized_button_builder_fields ) ) {
        
                    // tab colors settings
                    echo '<div id="' . esc_attr( $field_id ) . '_tab_color">';

                        // build colorpicker for button color
                        echo '<div class="ut-minicolors-wrap">';

                            echo '<label for="' . esc_attr( $field_id ) . '_color">' . __('Button Background Color' , 'unitedthemes') . '</label><br />';          
                            echo '<input data-mode="gradient" type="text" name="' . esc_attr( $field_name ) . '[color]" id="' . esc_attr( $field_id ) . '_color" value="' . ( isset( $field_value['color'] ) ? esc_attr( $field_value['color'] ) : '' ) . '" class="ut-ui-form-input ut-gradient-picker ' . esc_attr( $field_class ) . '" autocomplete="off" />';

                        echo '</div>';

                        // build colorpicker for button hover color
                        echo '<div class="ut-minicolors-wrap">';

                            echo '<label for="' . esc_attr( $field_id ) . '_hover_color">' . __('Button Background Hover Color' , 'unitedthemes') . '</label><br />';
                            echo '<input data-mode="gradient" type="text" name="' . esc_attr( $field_name ) . '[hover_color]" id="' . esc_attr( $field_id ) . '_hover_color" value="' . ( isset( $field_value['hover_color'] ) ? esc_attr( $field_value['hover_color'] ) : '' ) . '" class="ut-ui-form-input ut-gradient-picker ' . esc_attr( $field_class ) . '" autocomplete="off" />';

                        echo '</div>';

                        echo '<hr>';

                        // build colorpicker for button text color
                        echo '<div class="ut-minicolors-wrap">';

                            echo '<label for="' . esc_attr( $field_id ) . '_text_color">' . __('Button Text Color' , 'unitedthemes') . '</label><br />';
                            echo '<input data-mode="rgb" type="text" name="' . esc_attr( $field_name ) . '[text_color]" id="' . esc_attr( $field_id ) . '_text_color" value="' . ( isset( $field_value['text_color'] ) ? esc_attr( $field_value['text_color'] ) : '' ) . '" class="ut-ui-form-input ut-minicolors ' . esc_attr( $field_class ) . '" autocomplete="off" />';

                        echo '</div>';

                        // build colorpicker for button text hover color
                        echo '<div class="ut-minicolors-wrap">';

                            echo '<label for="' . esc_attr( $field_id ) . '_text_hover_color">' . __('Button Text Hover Color' , 'unitedthemes') . '</label><br />';
                            echo '<input data-mode="rgb" type="text" name="' . esc_attr( $field_name ) . '[text_hover_color]" id="' . esc_attr( $field_id ) . '_text_hover_color" value="' . ( isset( $field_value['text_hover_color'] ) ? esc_attr( $field_value['text_hover_color'] ) : '' ) . '" class="ut-ui-form-input ut-minicolors ' . esc_attr( $field_class ) . '" autocomplete="off" />';

                        echo '</div>';

                        echo '<hr>';        
                    
                        if ( in_array( 'hover-effect', $ot_recognized_button_builder_fields ) ) {
                    
                            // Button Effect
                            echo '<div class="ut-single-options-wrap">';

                                echo '<label for="' . esc_attr( $field_id ) . '_button_effect">' . __('Button Hover Effect' , 'unitedthemes') . '</label><br />';

                                echo '<select class="ut-ui-form-select" id="' , esc_attr( $field_id ) , '_button_effect" name="' , esc_attr( $field_name ) , '[button_effect]">';

                                    echo '<option value="">' . esc_html__('Select Button Effect','unitedthemes') . '</option>';

                                    $effect_value = !empty( $field_value['button_effect'] ) ? $field_value['button_effect'] : '';

                                    foreach( ot_recognized_button_effects() as $key => $effect ) {

                                        echo '<option value="' , $key , '" ' , selected( $effect_value, $key, false ) , '>' , $effect , '</option>';

                                    }

                                echo '</select>';                        

                            echo '</div>';
                        
                        }
                            
                        // build colorpicker for button hover color
                        echo '<div data-depends-on="' , esc_attr( $field_name ) , '[button_effect]:aylen" class="ut-minicolors-wrap">';

                            echo '<label for="' . esc_attr( $field_id ) . '_hover_color_2">' . __('Button Background Hover 2 Color' , 'unitedthemes') . '</label><br />';
                            echo '<input data-mode="gradient" type="text" name="' . esc_attr( $field_name ) . '[hover_color_2]" id="' . esc_attr( $field_id ) . '_hover_color_2" value="' . ( isset( $field_value['hover_color_2'] ) ? esc_attr( $field_value['hover_color_2'] ) : '' ) . '" class="ut-ui-form-input ut-gradient-picker ' . esc_attr( $field_class ) . '" autocomplete="off" />';

                        echo '</div>';

                        echo '<div class="clear"></div>';

                    echo '</div>';
                
                }
        
                if ( in_array( 'border-settings', $ot_recognized_button_builder_fields ) ) {
        
                    // tab border settings
                    echo '<div id="' . esc_attr( $field_id ) . '_tab_border">';

                        echo '<div class="ut-numeric-slider-outer-wrap ut-numeric-slider-outer-wrap-half">';

                            echo '<label for="' . esc_attr( $field_id ) . '_border_radius">' . __('Button Border Radius' , 'unitedthemes') . '</label><br>';

                            echo '<div class="ut-numeric-slider-wrap">';

                                echo '<input autocomplete="off" type="hidden" name="' . esc_attr( $field_name ) . '[border_radius]" id="' . esc_attr( $field_id ) . '_border_radius" class="ut-numeric-slider-hidden-input" value="' . ( !empty( $field_value['border_radius'] ) ? esc_attr( $field_value['border_radius'] ) : 0 ) . '" data-min="0" data-max="50" data-step="1">';

                                echo '<input data-min="0" data-max="50" type="input" class="ut-ui-form-input ut-numeric-slider-helper-input" data-tooltip="' . esc_html__( 'Max Value:', 'unitedthemes' ) . ' 50" value="' . ( !empty( $field_value['border_radius'] ) ? esc_attr( $field_value['border_radius'] ) : 0 ) . '" autocomplete="off">';
                                echo '<div id="ut_numeric_slider_' . esc_attr( $field_id ) . '_border_radius" class="ut-numeric-slider ui-slider ui-slider-horizontal"></div>';

                            echo '</div>';

                        echo '</div>';

                        /* border width*/
                        echo '<div class="ut-numeric-slider-outer-wrap ut-numeric-slider-outer-wrap-half">';

                            echo '<label for="' . esc_attr( $field_id ) . '_border_width">' . __('Button Border Width' , 'unitedthemes') . '</label><br>';

                            echo '<div class="ut-numeric-slider-wrap">';

                                echo '<input autocomplete="off" type="hidden" name="' . esc_attr( $field_name ) . '[border_width]" id="' . esc_attr( $field_id ) . '_border_width" class="ut-numeric-slider-hidden-input" value="' . ( !empty( $field_value['border_width'] ) ? esc_attr( $field_value['border_width'] ) : 0 ) . '" data-min="0" data-max="50" data-step="1">';

                                echo '<input data-min="0" data-max="50" type="input" class="ut-ui-form-input ut-numeric-slider-helper-input" data-tooltip="' . esc_html__( 'Max Value:', 'unitedthemes' ) . ' 50" value="' . ( !empty( $field_value['border_width'] ) ? esc_attr( $field_value['border_width'] ) : 0 ) . '" autocomplete="off">';
                                echo '<div id="ut_numeric_slider_' . esc_attr( $field_id ) . '_border_width" class="ut-numeric-slider ui-slider ui-slider-horizontal"></div>';

                            echo '</div>';

                        echo '</div>';

                        echo '<hr>';

                        /* build colorpicker for button border color */  
                        echo '<div class="ut-minicolors-wrap">';

                          /* input */
                          echo '<label for="' . esc_attr( $field_id ) . '_border_color">' . __('Button Border Color' , 'unitedthemes') . '</label><br />';
                          echo '<input data-mode="rgb" type="text" name="' . esc_attr( $field_name ) . '[border_color]" id="' . esc_attr( $field_id ) . '_border_color" value="' . ( isset( $field_value['border_color'] ) ? esc_attr( $field_value['border_color'] ) : '' ) . '" class="ut-ui-form-input ut-minicolors ' . esc_attr( $field_class ) . '" autocomplete="off" />';

                        echo '</div>';


                        /* build colorpicker for button text hover color */  
                        echo '<div class="ut-minicolors-wrap">';

                          /* input */
                          echo '<label for="' . esc_attr( $field_id ) . '_border_hover_color">' . __('Button Border Hover Color' , 'unitedthemes') . '</label><br />';
                          echo '<input data-mode="rgb" type="text" name="' . esc_attr( $field_name ) . '[border_hover_color]" id="' . esc_attr( $field_id ) . '_border_hover_color" value="' . ( isset( $field_value['border_hover_color'] ) ? esc_attr( $field_value['border_hover_color'] ) : '' ) . '" class="ut-ui-form-input ut-minicolors ' . esc_attr( $field_class ) . '" autocomplete="off" />';

                        echo '</div>';        

                        echo '<div class="clear"></div>';

                    echo '</div>';
                
                }
        
                if ( in_array( 'icon-settings', $ot_recognized_button_builder_fields ) ) {
                
                    // tab icon settings
                    echo '<div id="' . esc_attr( $field_id ) . '_tab_icon">';

                        if( function_exists('ut_recognized_icons') ) {

                            echo '<div class="ut-iconpicker-wrap ut-iconpicker-wrap-half">';

                                echo '<label for="' . esc_attr( $field_id ) . '_icon">' . __('Button Icon' , 'unitedthemes') . '</label><br />';

                                echo '<select class="ut-ui-form-select ut-icon-select" id="' , esc_attr( $field_id ) , '_icon" name="' , esc_attr( $field_name ) , '[icon]">';

                                    echo '<option value="">' . esc_html__('Select Icon','unitedthemes') . '</option>';

                                    $icon_value = !empty( $field_value['icon'] ) ? $field_value['icon'] : '';

                                    foreach( ut_recognized_icons() as $key => $icon ) {

                                        echo '<option value="fa ' , $icon , '" ' , selected( $icon_value, 'fa ' . $icon, false ) , '>' , 'fa ' , $icon , '</option>';

                                    }

                                echo '</select>';

                            echo '</div>';

                        }

                        echo '<div class="ut-single-options-wrap ut-single-options-wrap-half">';

                            $icon_position = isset( $field_value['icon_position'] ) ? esc_attr( $field_value['icon_position'] ) : '';

                            echo '<label for="' . esc_attr( $field_id ) . '_icon_position">' . __('Button Icon Position' , 'unitedthemes') . '</label><br />';

                            echo '<select class="ut-ui-form-select" id="' , esc_attr( $field_id ) , '_icon_position" name="' , esc_attr( $field_name ) , '[icon_position]">';

                                echo '<option value="before" ' . selected( $icon_position, 'before', false ) . '>' . __('before' , 'unitedthemes') . '</option>';
                                echo '<option value="after" ' . selected( $icon_position, 'after', false ) . '>' . __('after' , 'unitedthemes') . '</option>';

                            echo '</select>';    

                        echo '</div>';

                        echo '<hr>';

                        echo '<div class="ut-numeric-slider-outer-wrap">';

                            echo '<label for="' . esc_attr( $field_id ) . '_icon_size">' . __('Icon Size' , 'unitedthemes') . '</label>';

                            echo '<div class="ut-numeric-slider-wrap">';

                                echo '<input autocomplete="off" type="hidden" name="' . esc_attr( $field_name ) . '[icon_size]" id="' . esc_attr( $field_id ) . '_icon_size" class="ut-numeric-slider-hidden-input" value="' . ( isset( $field_value['icon_size'] ) ? esc_attr( $field_value['icon_size'] ) : '14' ) . '" data-min="10" data-max="30" data-step="1">';

                                echo '<input data-min="10" data-max="30" type="input" class="ut-ui-form-input ut-numeric-slider-helper-input" data-tooltip="' . esc_html__( 'Max Value:', 'unitedthemes' ) . ' 30" value="' . ( isset( $field_value['icon_size'] ) ? esc_attr( $field_value['icon_size'] ) : '14' ) . '" autocomplete="off">';
                                echo '<div id="ut_numeric_slider_' . esc_attr( $field_id ) . '_icon_size" class="ut-numeric-slider ui-slider ui-slider-horizontal"></div>';

                            echo '</div>';

                        echo '</div>';		

                        echo '<div class="clear"></div>';

                    echo '</div>';                
                
                }
        
                if ( in_array( 'font-settings', $ot_recognized_button_builder_fields ) ) {
        
                    // tab font settings
                    echo '<div id="' . esc_attr( $field_id ) . '_tab_font">';

                        echo '<div class="ut-single-options-wrap ut-single-options-wrap-fifth">';

                            $font_size = isset( $field_value['font-size'] ) ? esc_attr( $field_value['font-size'] ) : '';

                            echo '<label for="' . esc_attr( $field_id ) . '-font-size">' . __('Button Font Size' , 'unitedthemes') . '</label><br />';

                            echo '<div class="ut-ui-select-field">';

                                echo '<select name="' . esc_attr( $field_name ) . '[font-size]" id="' . esc_attr( $field_id ) . '-font-size" class="ut-ui-form-select ut-ui-select ' . esc_attr( $field_class ) . '">';

                                    echo '<option value="">font-size</option>';

                                    foreach( ot_recognized_font_sizes( $field_id ) as $option ) { 

                                        echo '<option value="' . esc_attr( $option ) . '" ' . selected( $font_size, $option, false ) . '>' . esc_attr( $option ) . '</option>';

                                    }

                                echo '</select>';

                            echo '</div>';

                        echo '</div>';

                        echo '<div class="ut-single-options-wrap ut-single-options-wrap-fifth">';

                            $letter_spacing = isset( $field_value['letter-spacing'] ) ? esc_attr( $field_value['letter-spacing'] ) : '';

                            echo '<label for="' . esc_attr( $field_id ) . '-letter-spacing">' . __('Button Letter Spacing' , 'unitedthemes') . '</label><br />';

                            echo '<div class="ut-ui-select-field">';

                                echo '<select name="' . esc_attr( $field_name ) . '[letter-spacing]" id="' . esc_attr( $field_id ) . '-letter-spacing" class="ut-ui-form-select ut-ui-select ' . esc_attr( $field_class ) . '">';

                                    echo '<option value="">letter-spacing</option>';

                                    foreach( ot_recognized_letter_spacing( $field_id ) as $option ) { 

                                        echo '<option value="' . esc_attr( $option ) . '" ' . selected( $letter_spacing, $option, false ) . '>' . esc_attr( $option ) . '</option>';

                                    }

                                echo '</select>';

                            echo '</div>';

                        echo '</div>';

                        echo '<div class="ut-single-options-wrap ut-single-options-wrap-fifth">';

                            $line_height = isset( $field_value['line-height'] ) ? esc_attr( $field_value['line-height'] ) : '';

                            echo '<label for="' . esc_attr( $field_id ) . '-line-height">' . __('Button Line height' , 'unitedthemes') . '</label><br />';

                            echo '<div class="ut-ui-select-field">';

                                echo '<select name="' . esc_attr( $field_name ) . '[line-height]" id="' . esc_attr( $field_id ) . '-line-height" class="ut-ui-form-select ut-ui-select ' . esc_attr( $field_class ) . '">';

                                    echo '<option value="">line-height</option>';

                                    foreach( ot_recognized_line_heights( $field_id ) as $option ) { 

                                        echo '<option value="' . esc_attr( $option ) . '" ' . selected( $line_height, $option, false ) . '>' . esc_attr( $option ) . '</option>';

                                    }

                                echo '</select>';

                            echo '</div>';

                        echo '</div>';

                        echo '<div class="ut-single-options-wrap ut-single-options-wrap-fifth">';

                            $font_weight = isset( $field_value['font-weight'] ) ? esc_attr( $field_value['font-weight'] ) : '';

                            echo '<label for="' . esc_attr( $field_id ) . '-font-weight">' . __('Button Font Weight' , 'unitedthemes') . '</label><br />';

                            echo '<div class="ut-ui-select-field">';

                                echo '<select name="' . esc_attr( $field_name ) . '[font-weight]" id="' . esc_attr( $field_id ) . '-font-weight" class="ut-ui-form-select ut-ui-select ' . esc_attr( $field_class ) . '">';

                                    echo '<option value="">font-weight</option>';

                                    foreach( ot_recognized_font_weights( $field_id ) as $option ) { 

                                        echo '<option value="' . esc_attr( $option ) . '" ' . selected( $font_weight, $option, false ) . '>' . esc_attr( $option ) . '</option>';

                                    }

                                echo '</select>';

                            echo '</div>';

                        echo '</div>';

                        echo '<div class="ut-single-options-wrap ut-single-options-wrap-fifth">';

                            $text_transform = isset( $field_value['text-transform'] ) ? esc_attr( $field_value['text-transform'] ) : '';

                            echo '<label for="' . esc_attr( $field_id ) . '-text-transform">' . __('Button Text Transform' , 'unitedthemes') . '</label><br />';

                            echo '<div class="ut-ui-select-field">';

                                echo '<select name="' . esc_attr( $field_name ) . '[text-transform]" id="' . esc_attr( $field_id ) . '-text-transform" class="ut-ui-form-select ut-ui-select ' . esc_attr( $field_class ) . '">';

                                   echo '<option value="">text-transform</option>';

                                   foreach ( ot_recognized_text_transformations( $field_id ) as $key => $value ) {

                                     echo '<option value="' . esc_attr( $key ) . '" ' . selected( $text_transform, $key, false ) . '>' . esc_attr( $value ) . '</option>';
                                   }


                                echo '</select>';

                            echo '</div>';

                        echo '</div>';

                        echo '<div class="clear"></div>';

                    echo '</div>';
            
                }
        
                if ( in_array( 'spacing-settings', $ot_recognized_button_builder_fields ) ) {
        
                    // tab spacing settings
                    echo '<div id="' . esc_attr( $field_id ) . '_tab_spacing">';

                        // button padding spacing
                        $directions = array(
                            'top'       => esc_html__( 'Top', 'unitedthemes'),
                            'right'     => esc_html__( 'Right', 'unitedthemes'),
                            'bottom'    => esc_html__( 'Bottom', 'unitedthemes'),
                            'left'      => esc_html__( 'Left', 'unitedthemes'),
                        );    

                        echo '<div>';

                        foreach( $directions as $key => $direction ) {

                            $padding_value = !empty( $field_value['padding-' . $key] ) ? $field_value['padding-' . $key] : 0;
                            $padding_value = filter_var($padding_value, FILTER_SANITIZE_NUMBER_INT);

                            echo '<div class="grid-25">';

                                echo '<div class="ut-numeric-slider-outer-wrap">';

                                    echo '<label for="' . esc_attr( $field_id ) . '-padding-' . $key . '">' . sprintf( esc_html__( 'Button Padding %s', 'unitedthemes' ), $direction ) . '</label>';
                                    echo '<div class="ut-panel-description">' . __('0 = default' , 'unitedthemes') . '</div>';        

                                    echo '<div class="ut-numeric-slider-wrap">';

                                        echo '<input autocomplete="off" type="hidden" name="' . esc_attr( $field_name ) . '[padding-' . $key . ']" id="' . esc_attr( $field_id ) . '-padding-' . $key . '" class="ut-numeric-slider-hidden-input" value="' . esc_attr( $padding_value ) . '" data-min="0" data-max="80" data-step="1">';

                                        echo '<input min="0" max="80" type="input" class="ut-ui-form-input ut-numeric-slider-helper-input" data-tooltip="' . esc_html__( 'Max Value:', 'unitedthemes' ) . ' 80" value="' . esc_attr( $padding_value ) . '" autocomplete="off">';
                                        echo '<div id="ut_numeric_slider_' . esc_attr( $field_id ) . '_border_radius" class="ut-numeric-slider ui-slider ui-slider-horizontal"></div>';

                                    echo '</div>';

                                echo '</div>';

                            echo '</div>';

                        }

                        echo '</div>';

                        echo '<div class="clear"></div>';

                    echo '</div>';
		          
                }
                
        
                if ( in_array( 'effect-settings', $ot_recognized_button_builder_fields ) ) {
        
                    // tab effect settings
                    echo '<div id="' . esc_attr( $field_id ) . '_tab_effect">';

                        // Button Effect
                        echo '<div class="ut-single-options-wrap">';

                            echo '<label for="' . esc_attr( $field_id ) . '_particle_effect">' . __('Button Particle Effect' , 'unitedthemes') . '</label><br />';

                            echo '<select class="ut-ui-form-select" id="' , esc_attr( $field_id ) , '_particle_effect" name="' , esc_attr( $field_name ) , '[particle_effect]">';

                                echo '<option value="">' . esc_html__('Select Button Particle Effect','unitedthemes') . '</option>';

                                $effect_value = !empty( $field_value['particle_effect'] ) ? $field_value['particle_effect'] : '';

                                foreach( ot_recognized_button_particle_effects() as $key => $effect ) {

                                    echo '<option value="' , $key , '" ' , selected( $effect_value, $key, false ) , '>' , $effect , '</option>';

                                }

                            echo '</select>';                        

                        echo '</div>';

                        // Button Effect Direction
                        echo '<div class="ut-single-options-wrap ut-single-options-wrap-half">';

                            $button_particle_effect_direction = isset( $field_value['particle_effect_direction'] ) ? esc_attr( $field_value['particle_effect_direction'] ) : '';

                            echo '<label for="' . esc_attr( $field_id ) . '_particle_effect_direction">' . __('Button Particle Effect Direction' , 'unitedthemes') . '</label><br />';

                            echo '<select class="ut-ui-form-select" id="' , esc_attr( $field_id ) , '_particle_effect_direction" name="' , esc_attr( $field_name ) , '[particle_effect_direction]">';

                                echo '<option value="left" ' . selected( $button_particle_effect_direction, 'left', false ) . '>' . __('left' , 'unitedthemes') . '</option>';
                                echo '<option value="right" ' . selected( $button_particle_effect_direction, 'right', false ) . '>' . __('right' , 'unitedthemes') . '</option>';
                                echo '<option value="top" ' . selected( $button_particle_effect_direction, 'top', false ) . '>' . __('top' , 'unitedthemes') . '</option>';
                                echo '<option value="bottom" ' . selected( $button_particle_effect_direction, 'bottom', false ) . '>' . __('bottom' , 'unitedthemes') . '</option>';

                            echo '</select>';    

                        echo '</div>';

                        echo '<hr>';

                        // Button Effect Color
                        echo '<div class="ut-minicolors-wrap">';

                            echo '<label for="' . esc_attr( $field_id ) . '_particle_effect_color">' . __('Button Particle Effect Color Color' , 'unitedthemes') . '</label><br />';
                            echo '<input data-mode="rgb" type="text" name="' . esc_attr( $field_name ) . '[particle_effect_color]" id="' . esc_attr( $field_id ) . '_particle_effect_color" value="' . ( isset( $field_value['particle_effect_color'] ) ? esc_attr( $field_value['particle_effect_color'] ) : '' ) . '" class="ut-ui-form-input ut-minicolors ' . esc_attr( $field_class ) . '" autocomplete="off" />';

                        echo '</div>';


                        // Button Effect Re Appear
                        echo '<div class="ut-single-options-wrap ut-single-options-wrap-half">';

                            $button_particle_effect_restore = isset( $field_value['particle_effect_restore'] ) ? esc_attr( $field_value['particle_effect'] ) : '';

                            echo '<label for="' . esc_attr( $field_id ) . '_particle_effect_restore">' . __('Should Button re-appear after its disintegration?' , 'unitedthemes') . '</label><br />';

                            echo '<select class="ut-ui-form-select" id="' , esc_attr( $field_id ) , '_particle_effect_restore" name="' , esc_attr( $field_name ) , '[particle_effect_restore]">';

                                echo '<option value="yes" ' . selected( $button_particle_effect_restore, 'yes', false ) . '>' . __('yes, please!' , 'unitedthemes') . '</option>';
                                echo '<option value="no" ' . selected( $button_particle_effect_restore, 'no', false ) . '>' . __('no, thanks!' , 'unitedthemes') . '</option>';

                            echo '</select>';    

                        echo '</div>';	

                        echo '<div class="clear"></div>';

                    echo '</div>';
             
                }
                    
            echo '</section>'; // end tabs
            
        echo '</div>';
    
    }
  
}


/**
 * Button Builder Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_button_builder_vc' ) ) {
  
    function ot_type_button_builder_vc( $args = array() ) {
    
        /* turns arguments array into variables */
        extract( $args );
        
        $ot_recognized_button_builder_fields = apply_filters( 'ot_recognized_button_builder_fields', array( 
            'link-settings',
            'color-settings',
            'border-settings',
            'icon-settings',
            'font-settings',
            'spacing-settings',
        ), $field_id );        
        
        echo '<div class="ut-button-builder">';
        
            echo '<ul class="ut-button-builder-tabs ut-button-builder-tabs-simple clearfix" data-tabgroup="' . esc_attr( $field_id ) . '_group">';
        
                if ( in_array( 'link-settings', $ot_recognized_button_builder_fields ) ) 
				echo '<li><a href="#' . esc_attr( $field_id ) . '_tab_general" class="active">' . __('General' , 'unitedthemes') . '</a></li>';
        
                if ( in_array( 'color-settings', $ot_recognized_button_builder_fields ) ) 
                echo '<li><a href="#' . esc_attr( $field_id ) . '_tab_color">' . __('Button Colors' , 'unitedthemes') . '</a></li>';
        
                if ( in_array( 'border-settings', $ot_recognized_button_builder_fields ) ) 
                echo '<li><a href="#' . esc_attr( $field_id ) . '_tab_border">' . __('Button Border' , 'unitedthemes') . '</a></li>';
        
                if ( in_array( 'icon-settings', $ot_recognized_button_builder_fields ) ) 
                echo '<li><a href="#' . esc_attr( $field_id ) . '_tab_icon">' . __('Button Icon' , 'unitedthemes') . '</a></li>';
        
                if ( in_array( 'font-settings', $ot_recognized_button_builder_fields ) ) 
                echo '<li><a href="#' . esc_attr( $field_id ) . '_tab_font">' . __('Button Font' , 'unitedthemes') . '</a></li>';
        
                if ( in_array( 'spacing-settings', $ot_recognized_button_builder_fields ) ) 
                echo '<li><a href="#' . esc_attr( $field_id ) . '_tab_spacing">' . __('Button Spacing' , 'unitedthemes') . '</a></li>';
        
            echo '</ul>';
        
            echo '<section id="' . esc_attr( $field_id ) . '_group" class="ut-button-builder-tabgroup">';
                        
                if ( in_array( 'link-settings', $ot_recognized_button_builder_fields ) ) {
        
                    // tab general settings
                    echo '<div id="' . esc_attr( $field_id ) . '_tab_general">';

                        // button link

                        if( function_exists('vc_parse_multi_attribute') ) {

                            echo '<div class="ut-single-options-wrap ut-single-options-wrap-full">';

                                $link_value = isset( $field_value['button_link'] ) ? esc_attr( $field_value['button_link'] ) : '';
                                $link 		= vc_parse_multi_attribute( $link_value, array( 'url' => '', 'title' => '', 'target' => '', 'rel' => '' ) );

                                echo '<label for="' . esc_attr( $field_id ) . '_button_link">' . __('Button Link' , 'unitedthemes') . '</label><br />';

                                echo '<div class="ut-link">';

                                    echo '<input type="text" name="' . esc_attr( $field_name ) . '[button_link]" id="' . esc_attr( $field_id ) . '_button_link" value="' . htmlentities( $link_value, ENT_QUOTES, 'utf-8' ) . '" class="ut-ui-form-input ut-hide ut-link-input ' . esc_attr( $field_class ) . '" data-json="' . htmlentities( json_encode( $link ), ENT_QUOTES, 'utf-8' ) . '"  />';

                                    echo '<ul class="ut-link-list">';
                                        echo '<li class="ut-link-label">' . __( 'Title', 'unitedthemes' ) . ':</li>';
                                        echo '<li class="ut-link-label-title">' . $link['title'] . '</li>';
                                    echo '</ul>';

                                    echo '<ul class="ut-link-list">';
                                        echo '<li class="ut-link-label">' . __( 'URL', 'unitedthemes' ) . ':</li>';
                                        echo '<li class="ut-link-label-url">' . $link['url'] . '</li>';
                                    echo '</ul>';

                                    echo '<ul class="ut-link-list">';
                                        echo '<li class="ut-link-label">' . __( 'Target', 'unitedthemes' ) . ':</li>';
                                        echo '<li class="ut-link-label-target">' . $link['target'] . '</li>';
                                    echo '</ul>';

                                    echo '<button data-id="' . esc_attr( $field_id ) . '_button_link" class="ut-ui-button ut-link-button">' . esc_html__( 'Select URL', 'unitedthemes' ) . '</button>';

                                echo '</div>';

                            echo '</div>';

                        } else {

                            esc_html_e('Visual Composer Plugin is missing!','unitedthemes');

                        }	

                        echo '<div class="clear"></div>';

                    echo '</div>';
		      
                }
                
                if ( in_array( 'color-settings', $ot_recognized_button_builder_fields ) ) {
        
                    // tab colors settings
                    echo '<div id="' . esc_attr( $field_id ) . '_tab_color">';

                        // build colorpicker for button color
                        echo '<div class="ut-minicolors-wrap">';

                            echo '<label for="' . esc_attr( $field_id ) . '_button_background">' . __('Button Background Color' , 'unitedthemes') . '</label><br />';          
                            echo '<input data-mode="gradient" type="text" name="' . esc_attr( $field_name ) . '[button_background]" id="' . esc_attr( $field_id ) . '_button_background" value="' . ( isset( $field_value['button_background'] ) ? esc_attr( $field_value['button_background'] ) : '' ) . '" class="ut-ui-form-input ut-gradient-picker ' . esc_attr( $field_class ) . '" autocomplete="off" />';

                        echo '</div>';

                        // build colorpicker for button hover color
                        echo '<div class="ut-minicolors-wrap">';

                            echo '<label for="' . esc_attr( $field_id ) . '_button_background_hover">' . __('Button Background Hover Color' , 'unitedthemes') . '</label><br />';
                            echo '<input data-mode="gradient" type="text" name="' . esc_attr( $field_name ) . '[button_background_hover]" id="' . esc_attr( $field_id ) . '_button_background_hover" value="' . ( isset( $field_value['button_background_hover'] ) ? esc_attr( $field_value['button_background_hover'] ) : '' ) . '" class="ut-ui-form-input ut-gradient-picker ' . esc_attr( $field_class ) . '" autocomplete="off" />';

                        echo '</div>';

                        echo '<hr>';

                        // build colorpicker for button text color
                        echo '<div class="ut-minicolors-wrap">';

                            echo '<label for="' . esc_attr( $field_id ) . '_button_text_color">' . __('Button Text Color' , 'unitedthemes') . '</label><br />';
                            echo '<input data-mode="rgb" type="text" name="' . esc_attr( $field_name ) . '[button_text_color]" id="' . esc_attr( $field_id ) . '_button_text_color" value="' . ( isset( $field_value['button_text_color'] ) ? esc_attr( $field_value['button_text_color'] ) : '' ) . '" class="ut-ui-form-input ut-minicolors ' . esc_attr( $field_class ) . '" autocomplete="off" />';

                        echo '</div>';

                        // build colorpicker for button text hover color
                        echo '<div class="ut-minicolors-wrap">';

                            echo '<label for="' . esc_attr( $field_id ) . '_button_text_color_hover">' . __('Button Text Hover Color' , 'unitedthemes') . '</label><br />';
                            echo '<input data-mode="rgb" type="text" name="' . esc_attr( $field_name ) . '[button_text_color_hover]" id="' . esc_attr( $field_id ) . '_button_text_color_hover" value="' . ( isset( $field_value['button_text_color_hover'] ) ? esc_attr( $field_value['button_text_color_hover'] ) : '' ) . '" class="ut-ui-form-input ut-minicolors ' . esc_attr( $field_class ) . '" autocomplete="off" />';

                        echo '</div>';

                        echo '<div class="clear"></div>';        

                    echo '</div>';
                
                }
                
                if ( in_array( 'border-settings', $ot_recognized_button_builder_fields ) ) {
    
                    // tab border settings
                    echo '<div id="' . esc_attr( $field_id ) . '_tab_border">';

                        echo '<div class="ut-numeric-slider-outer-wrap">';

                            echo '<label for="' . esc_attr( $field_id ) . '_button_border_radius">' . __('Button Border Radius' , 'unitedthemes') . '</label><br>';

                            echo '<div class="ut-numeric-slider-wrap">';

                                echo '<input autocomplete="off" type="hidden" name="' . esc_attr( $field_name ) . '[button_border_radius]" id="' . esc_attr( $field_id ) . '_button_border_radius" class="ut-numeric-slider-hidden-input" value="' . ( isset( $field_value['button_border_radius'] ) ? esc_attr( $field_value['button_border_radius'] ) : 0 ) . '" data-min="0" data-max="50" data-step="1">';

                                echo '<input data-min="0" data-max="50" type="input" class="ut-ui-form-input ut-numeric-slider-helper-input" data-tooltip="' . esc_html__( 'Max Value:', 'unitedthemes' ) . ' 50" value="' . ( isset( $field_value['button_border_radius'] ) ? esc_attr( $field_value['button_border_radius'] ) : 0 ) . '" autocomplete="off">';
                                echo '<div id="ut_numeric_slider_' . esc_attr( $field_id ) . '_button_border_radius" class="ut-numeric-slider ui-slider ui-slider-horizontal"></div>';

                            echo '</div>';

                        echo '</div>';

                        echo '<hr>';	

                        echo '<div class="ut-single-options-wrap ut-single-options-wrap-half">';

                            $border_style = isset( $field_value['button_border_style'] ) ? esc_attr( $field_value['button_border_style'] ) : '';

                            echo '<label for="' . esc_attr( $field_id ) . '-button-border-style">' . __('Button Border Style' , 'unitedthemes') . '</label><br />';

                            echo '<div class="ut-ui-select-field">';

                                echo '<select name="' . esc_attr( $field_name ) . '[button_border_style]" id="' . esc_attr( $field_id ) . '-button-border-style" class="ut-ui-form-select ut-ui-select ' . esc_attr( $field_class ) . '">';

                                   foreach ( ot_recognized_border_styles( $field_id ) as $key => $value ) {

                                        echo '<option value="' . esc_attr( $key ) . '" ' . selected( $border_style, $key, false ) . '>' . esc_attr( $value ) . '</option>';

                                   }

                                echo '</select>';

                            echo '</div>';

                        echo '</div>';

                        /* border width*/
                        echo '<div class="ut-numeric-slider-outer-wrap ut-numeric-slider-outer-wrap-half">';

                            echo '<label for="' . esc_attr( $field_id ) . '_button_border_width">' . __('Button Border Width' , 'unitedthemes') . '</label><br>';

                            echo '<div class="ut-numeric-slider-wrap">';

                                echo '<input autocomplete="off" type="hidden" name="' . esc_attr( $field_name ) . '[button_border_width]" id="' . esc_attr( $field_id ) . '_button_border_width" class="ut-numeric-slider-hidden-input" value="' . ( !empty( $field_value['button_border_width'] ) ? esc_attr( $field_value['button_border_width'] ) : 0 ) . '" data-min="0" data-max="50" data-step="1">';

                                echo '<input data-min="0" data-max="50" type="input" class="ut-ui-form-input ut-numeric-slider-helper-input" data-tooltip="' . esc_html__( 'Max Value:', 'unitedthemes' ) . ' 50" value="' . ( !empty( $field_value['button_border_width'] ) ? esc_attr( $field_value['button_border_width'] ) : 0 ) . '" autocomplete="off">';
                                echo '<div id="ut_numeric_slider_' . esc_attr( $field_id ) . '_button_border_width" class="ut-numeric-slider ui-slider ui-slider-horizontal"></div>';

                            echo '</div>';

                        echo '</div>';

                        echo '<hr>';

                        /* build colorpicker for button border color */  
                        echo '<div class="ut-minicolors-wrap">';

                          /* input */
                          echo '<label for="' . esc_attr( $field_id ) . '_button_border_color">' . __('Button Border Color' , 'unitedthemes') . '</label><br />';
                          echo '<input data-mode="rgb" type="text" name="' . esc_attr( $field_name ) . '[button_border_color]" id="' . esc_attr( $field_id ) . '_button_border_color" value="' . ( isset( $field_value['button_border_color'] ) ? esc_attr( $field_value['button_border_color'] ) : '' ) . '" class="ut-ui-form-input ut-minicolors ' . esc_attr( $field_class ) . '" autocomplete="off" />';

                        echo '</div>';

                        /* build colorpicker for button text hover color */  
                        echo '<div class="ut-minicolors-wrap">';

                          /* input */
                          echo '<label for="' . esc_attr( $field_id ) . '_button_border_color_hover">' . __('Button Border Hover Color' , 'unitedthemes') . '</label><br />';
                          echo '<input data-mode="rgb" type="text" name="' . esc_attr( $field_name ) . '[button_border_color_hover]" id="' . esc_attr( $field_id ) . '_button_border_color_hover" value="' . ( isset( $field_value['button_border_color_hover'] ) ? esc_attr( $field_value['button_border_color_hover'] ) : '' ) . '" class="ut-ui-form-input ut-minicolors ' . esc_attr( $field_class ) . '" autocomplete="off" />';

                        echo '</div>';        

                        echo '<div class="clear"></div>';

                    echo '</div>';
                
                }
    
                if ( in_array( 'icon-settings', $ot_recognized_button_builder_fields ) ) {    
    
                    // tab icon settings
                    echo '<div id="' . esc_attr( $field_id ) . '_tab_icon">';

                        if( function_exists('ut_recognized_icons') ) {

                            echo '<div class="ut-iconpicker-wrap ut-iconpicker-wrap-half">';

                                echo '<label for="' . esc_attr( $field_id ) . '_button_icon">' . __('Button Icon' , 'unitedthemes') . '</label><br />';

                                echo '<select class="ut-ui-form-select ut-icon-select" id="' , esc_attr( $field_id ) , '_button_icon" name="' , esc_attr( $field_name ) , '[button_icon]">';

                                    echo '<option value="">' . esc_html__('Select Icon','unitedthemes') . '</option>';

                                    $icon_value = !empty( $field_value['button_icon'] ) ? $field_value['button_icon'] : '';

                                    foreach( ut_recognized_icons() as $key => $icon ) {

                                        echo '<option value="fa ' , $icon , '" ' , selected( $icon_value, 'fa ' . $icon, false ) , '>' , 'fa ' , $icon , '</option>';

                                    }

                                echo '</select>';

                            echo '</div>';

                        }

                        echo '<div class="ut-single-options-wrap ut-single-options-wrap-half">';

                            $button_icon_align = isset( $field_value['button_icon_align'] ) ? esc_attr( $field_value['button_icon_align'] ) : '';

                            echo '<label for="' . esc_attr( $field_id ) . '_button_icon_align">' . __('Button Icon Position' , 'unitedthemes') . '</label><br />';

                            echo '<select class="ut-ui-form-select" id="' , esc_attr( $field_id ) , '_button_icon_align" name="' , esc_attr( $field_name ) , '[button_icon_align]">';

                                echo '<option value="left" ' . selected( $button_icon_align, 'left', false ) . '>' . esc_html__('before' , 'unitedthemes') . '</option>';
                                echo '<option value="right" ' . selected( $button_icon_align, 'right', false ) . '>' . esc_html__('after' , 'unitedthemes') . '</option>';

                            echo '</select>';    

                        echo '</div>';

                        echo '<hr>';

                        /* icon size */
                        echo '<div class="ut-numeric-slider-outer-wrap">';

                            echo '<label for="' . esc_attr( $field_id ) . '_button_icon_size">' . __('Icon Size' , 'unitedthemes') . '</label>';

                            echo '<div class="ut-numeric-slider-wrap">';

                                echo '<input autocomplete="off" type="hidden" name="' . esc_attr( $field_name ) . '[button_icon_size]" id="' . esc_attr( $field_id ) . '_button_icon_size" class="ut-numeric-slider-hidden-input" value="' . ( isset( $field_value['button_icon_size'] ) ? esc_attr( $field_value['button_icon_size'] ) : '14' ) . '" data-min="10" data-max="30" data-step="1">';

                                echo '<input data-min="10" data-max="30" type="input" class="ut-ui-form-input ut-numeric-slider-helper-input" data-tooltip="' . esc_html__( 'Max Value:', 'unitedthemes' ) . ' 30" value="' . ( isset( $field_value['button_icon_size'] ) ? esc_attr( $field_value['button_icon_size'] ) : '14' ) . '" autocomplete="off">';
                                echo '<div id="ut_numeric_slider_' . esc_attr( $field_id ) . '_button_icon_size" class="ut-numeric-slider ui-slider ui-slider-horizontal"></div>';

                            echo '</div>';

                        echo '</div>';

	                    echo '<hr>';

		                /* align correction size */
		                echo '<div class="ut-numeric-slider-outer-wrap ut-single-options-wrap ut-single-options-wrap-half">';

		                    echo '<label for="' . esc_attr( $field_id ) . '_fontawesome_v_correction_t">' . __('Font Awesome Vertical Alignment Correction (top)' , 'unitedthemes') . '</label>';

		                    echo '<div class="ut-numeric-slider-wrap">';

			                    echo '<input autocomplete="off" type="hidden" name="' . esc_attr( $field_name ) . '[fontawesome_v_correction_t]" id="' . esc_attr( $field_id ) . '_fontawesome_v_correction_t" class="ut-numeric-slider-hidden-input" value="' . ( isset( $field_value['fontawesome_v_correction_t'] ) ? esc_attr( $field_value['fontawesome_v_correction_t'] ) : '0' ) . '" data-min="0" data-max="10" data-step="1">';

			                    echo '<input data-min="0" data-max="10" type="input" class="ut-ui-form-input ut-numeric-slider-helper-input" data-tooltip="' . esc_html__( 'Max Value:', 'unitedthemes' ) . ' 10" value="' . ( isset( $field_value['fontawesome_v_correction_t'] ) ? esc_attr( $field_value['fontawesome_v_correction_t'] ) : '0' ) . '" autocomplete="off">';
			                    echo '<div id="ut_numeric_slider_' . esc_attr( $field_id ) . '_fontawesome_v_correction_t" class="ut-numeric-slider ui-slider ui-slider-horizontal"></div>';

		                    echo '</div>';

		                echo '</div>';

		                /* align correction size */
		                echo '<div class="ut-numeric-slider-outer-wrap ut-single-options-wrap ut-single-options-wrap-half">';

		                    echo '<label for="' . esc_attr( $field_id ) . '_fontawesome_v_correction_b">' . __('Font Awesome Vertical Alignment Correction (bottom)' , 'unitedthemes') . '</label>';

		                    echo '<div class="ut-numeric-slider-wrap">';

			                    echo '<input autocomplete="off" type="hidden" name="' . esc_attr( $field_name ) . '[fontawesome_v_correction_b]" id="' . esc_attr( $field_id ) . '_fontawesome_v_correction_b" class="ut-numeric-slider-hidden-input" value="' . ( isset( $field_value['fontawesome_v_correction_b'] ) ? esc_attr( $field_value['fontawesome_v_correction_b'] ) : '0' ) . '" data-min="0" data-max="10" data-step="1">';

			                    echo '<input data-min="0" data-max="10" type="input" class="ut-ui-form-input ut-numeric-slider-helper-input" data-tooltip="' . esc_html__( 'Max Value:', 'unitedthemes' ) . ' 10" value="' . ( isset( $field_value['fontawesome_v_correction_b'] ) ? esc_attr( $field_value['fontawesome_v_correction_b'] ) : '0' ) . '" autocomplete="off">';
			                    echo '<div id="ut_numeric_slider_' . esc_attr( $field_id ) . '_fontawesome_v_correction_b" class="ut-numeric-slider ui-slider ui-slider-horizontal"></div>';

		                    echo '</div>';

		                echo '</div>';


                        echo '<div class="clear"></div>';

                    echo '</div>';                
        
                }
                
                if ( in_array( 'font-settings', $ot_recognized_button_builder_fields ) ) {

                    // tab font settings
                    echo '<div id="' . esc_attr( $field_id ) . '_tab_font">';

                        echo '<div class="ut-single-options-wrap ut-single-options-wrap-fourth">';

                            $font_size = isset( $field_value['font_size'] ) ? esc_attr( $field_value['font_size'] ) : '';

                            echo '<label for="' . esc_attr( $field_id ) . '-font-size">' . __('Button Font Size' , 'unitedthemes') . '</label><br />';

                            echo '<div class="ut-ui-select-field">';

                                echo '<select name="' . esc_attr( $field_name ) . '[font_size]" id="' . esc_attr( $field_id ) . '-font-size" class="ut-ui-form-select ut-ui-select ' . esc_attr( $field_class ) . '">';

                                    echo '<option value="">font-size</option>';

                                    foreach( ot_recognized_font_sizes( $field_id ) as $option ) { 

                                        echo '<option value="' . esc_attr( $option ) . '" ' . selected( $font_size, $option, false ) . '>' . esc_attr( $option ) . '</option>';

                                    }

                                echo '</select>';

                            echo '</div>';

                        echo '</div>';

                        echo '<div class="ut-single-options-wrap ut-single-options-wrap-fourth">';

                            $letter_spacing = isset( $field_value['letter_spacing'] ) ? esc_attr( $field_value['letter_spacing'] ) : '';

                            echo '<label for="' . esc_attr( $field_id ) . '-letter-spacing">' . __('Button Letter Spacing' , 'unitedthemes') . '</label><br />';

                            echo '<div class="ut-ui-select-field">';

                                echo '<select name="' . esc_attr( $field_name ) . '[letter_spacing]" id="' . esc_attr( $field_id ) . '-letter-spacing" class="ut-ui-form-select ut-ui-select ' . esc_attr( $field_class ) . '">';

                                    echo '<option value="">letter-spacing</option>';

                                    foreach( ot_recognized_letter_spacing( $field_id ) as $option ) { 

                                        echo '<option value="' . esc_attr( $option ) . '" ' . selected( $letter_spacing, $option, false ) . '>' . esc_attr( $option ) . '</option>';

                                    }

                                echo '</select>';

                            echo '</div>';

                        echo '</div>';

                        echo '<div class="ut-single-options-wrap ut-single-options-wrap-fourth">';

                            $font_weight = isset( $field_value['font_weight'] ) ? esc_attr( $field_value['font_weight'] ) : '';

                            echo '<label for="' . esc_attr( $field_id ) . '-font-weight">' . __('Button Font Weight' , 'unitedthemes') . '</label><br />';

                            echo '<div class="ut-ui-select-field">';

                                echo '<select name="' . esc_attr( $field_name ) . '[font_weight]" id="' . esc_attr( $field_id ) . '-font-weight" class="ut-ui-form-select ut-ui-select ' . esc_attr( $field_class ) . '">';

                                    echo '<option value="">font-weight</option>';

                                    foreach( ot_recognized_font_weights( $field_id ) as $option ) { 

                                        echo '<option value="' . esc_attr( $option ) . '" ' . selected( $font_weight, $option, false ) . '>' . esc_attr( $option ) . '</option>';

                                    }

                                echo '</select>';

                            echo '</div>';

                        echo '</div>';

                        echo '<div class="ut-single-options-wrap ut-single-options-wrap-fourth">';

                            $text_transform = isset( $field_value['text_transform'] ) ? esc_attr( $field_value['text_transform'] ) : '';

                            echo '<label for="' . esc_attr( $field_id ) . '-text-transform">' . __('Button Text Transform' , 'unitedthemes') . '</label><br />';

                            echo '<div class="ut-ui-select-field">';

                                echo '<select name="' . esc_attr( $field_name ) . '[text_transform]" id="' . esc_attr( $field_id ) . '-text-transform" class="ut-ui-form-select ut-ui-select ' . esc_attr( $field_class ) . '">';

                                   echo '<option value="">text-transform</option>';

                                   foreach ( ot_recognized_text_transformations( $field_id ) as $key => $value ) {

                                     echo '<option value="' . esc_attr( $key ) . '" ' . selected( $text_transform, $key, false ) . '>' . esc_attr( $value ) . '</option>';
                                   }


                                echo '</select>';

                            echo '</div>';

                        echo '</div>';

                        echo '<div class="clear"></div>';

                    echo '</div>';
                
                }
        
                if ( in_array( 'spacing-settings', $ot_recognized_button_builder_fields ) ) {
    
                    // tab spacing settings
                    echo '<div id="' . esc_attr( $field_id ) . '_tab_spacing">';

                        // button padding spacing
                        $directions = array(
                            'top'       => esc_html__( 'Top', 'unitedthemes'),
                            'right'     => esc_html__( 'Right', 'unitedthemes'),
                            'bottom'    => esc_html__( 'Bottom', 'unitedthemes'),
                            'left'      => esc_html__( 'Left', 'unitedthemes'),
                        );    

                        echo '<div>';

                        foreach( $directions as $key => $direction ) {

                            $padding_value = !empty( $field_value['padding-' . $key] ) ? $field_value['padding-' . $key] : 0;
                            $padding_value = filter_var($padding_value, FILTER_SANITIZE_NUMBER_INT);

                            echo '<div class="grid-25">';

                                echo '<div class="ut-numeric-slider-outer-wrap">';

                                    echo '<label for="' . esc_attr( $field_id ) . '-padding-' . $key . '">' . sprintf( esc_html__( 'Button Padding %s', 'unitedthemes' ), $direction ) . '</label>';
                                    echo '<div class="ut-panel-description">' . __('0 = default' , 'unitedthemes') . '</div>';        

                                    echo '<div class="ut-numeric-slider-wrap">';

                                        echo '<input autocomplete="off" type="hidden" name="' . esc_attr( $field_name ) . '[padding-' . $key . ']" id="' . esc_attr( $field_id ) . '-padding-' . $key . '" class="ut-numeric-slider-hidden-input" value="' . esc_attr( $padding_value ) . '" data-min="0" data-max="80" data-step="1">';

                                        echo '<input min="0" max="80" type="input" class="ut-ui-form-input ut-numeric-slider-helper-input" data-tooltip="' . esc_html__( 'Max Value:', 'unitedthemes' ) . ' 80" value="' . esc_attr( $padding_value ) . '" autocomplete="off">';
                                        echo '<div id="ut_numeric_slider_' . esc_attr( $field_id ) . '_border_radius" class="ut-numeric-slider ui-slider ui-slider-horizontal"></div>';

                                    echo '</div>';

                                echo '</div>';

                            echo '</div>';

                        }

                        echo '</div>';

                        echo '<div class="clear"></div>';

                    echo '</div>';
                
                }
                    
            echo '</section>'; // end tabs
            
        echo '</div>';
    
    }
  
}


/**
 * CSS Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     4.1
 */
if ( ! function_exists( 'ot_type_css' ) ) {
  
    function ot_type_css( $args = array() ) {
    
        /* turns arguments array into variables */
        extract( $args );
        
        /* build textarea for CSS */
        echo '<div data-mode="css" data-id="' , esc_attr( $field_id ) , '" id="' , esc_attr( $field_id ) , '_ace" class="ut-ace-css-editor">' , esc_attr( $field_value ) , '</div>';
        echo '<textarea class="ut-full-width ut-hide ut-ace-textarea ' . esc_attr( $field_class ) . '" rows="40" name="' . esc_attr( $field_name ) .'" id="' . esc_attr( $field_id ) . '">' . esc_textarea( $field_value ) . '</textarea>';
    
    }
  
}

/**
 * Custom Editor Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     4.1
 */
if ( ! function_exists( 'ot_type_custom_editor' ) ) {
  
    function ot_type_custom_editor( $args = array() ) {
    
        /* turns arguments array into variables */
        extract( $args );
    
        /* build textarea for Editor */
        echo '<div class="ut-custom-editor">';
            
            echo '<div class="wp-editor-tabs">
                <button type="button" id="content-tmce" class="wp-switch-editor switch-tmce" data-wp-editor-id="content">Visual</button>
                <button type="button" id="content-html" class="wp-switch-editor switch-html" data-wp-editor-id="content">Text</button>
            </div><div class="clear"></div>';
            
            
                 
            echo '<textarea class="' . esc_attr( $field_class ) . '" rows="40" name="' . esc_attr( $field_name ) .'" id="' . esc_attr( $field_id ) . '">' . esc_textarea( $field_value ) . '</textarea>';
            
        echo '</div>';
    
    }
  
}


/**
 * Custom Post Type Checkbox Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_custom_post_type_checkbox' ) ) {
    
    function ot_type_custom_post_type_checkbox( $args = array() ) {
    
        /* turns arguments array into variables */
        extract( $args );
        
        /* setup the post types */
        $post_type = isset( $field_post_type ) ? explode( ',', $field_post_type ) : array( 'post' );

        /* query posts array */
        $my_posts = get_posts( apply_filters( 'ot_type_custom_post_type_checkbox_query', array( 'post_type' => $post_type, 'posts_per_page' => -1, 'orderby' => 'title', 'order' => 'ASC', 'post_status' => 'any' ), $field_id ) );

        /* has posts */
        if ( is_array( $my_posts ) && ! empty( $my_posts ) ) {

            foreach( $my_posts as $my_post ){

                echo '<p>';
                    echo '<input type="checkbox" name="' . esc_attr( $field_name ) . '[' . esc_attr( $my_post->ID ) . ']" id="' . esc_attr( $field_id ) . '-' . esc_attr( $my_post->ID ) . '" value="' . esc_attr( $my_post->ID ) . '" ' . ( isset( $field_value[$my_post->ID] ) ? checked( $field_value[$my_post->ID], $my_post->ID, false ) : '' ) . ' class="ut-ui-form-checkbox ut-ui-checkbox ' . esc_attr( $field_class ) . '" />';
                    echo '<label for="' . esc_attr( $field_id ) . '-' . esc_attr( $my_post->ID ) . '">' . $my_post->post_title . '</label>';
                echo '</p>';
            
            }
            
        } else {
          
          echo '<p>' . __( 'No Posts Found', 'unitedthemes' ) . '</p>';
          
        }
    
    }
  
}

/**
 * Custom Post Type Select Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_custom_post_type_select' ) ) {
  
    function ot_type_custom_post_type_select( $args = array() ) {

        /* turns arguments array into variables */
        extract( $args );
        
        echo '<div class="ut-ui-select-field">';
        
            /* build category */
            echo '<select name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '" class="ut-ui-form-select ut-ui-select ' . $field_class . '">';
            
                /* setup the post types */
                $post_type = isset( $field_post_type ) ? explode( ',', $field_post_type ) : array( 'post' );
        
                /* query posts array */
                $my_posts = get_posts( apply_filters( 'ot_type_custom_post_type_select_query', array( 'post_type' => $post_type, 'posts_per_page' => -1, 'orderby' => 'title', 'order' => 'ASC', 'post_status' => 'any' ), $field_id ) );
            
                /* has posts */
                if ( is_array( $my_posts ) && ! empty( $my_posts ) ) {
                    
                    echo '<option value="">-- ' . __( 'Choose One', 'unitedthemes' ) . ' --</option>';
                    
                    foreach( $my_posts as $my_post ){
                        echo '<option value="' . esc_attr( $my_post->ID ) . '"' . selected( $field_value, $my_post->ID, false ) . '>' . esc_attr( $my_post->post_title ) . '</option>';
                    }
            
                } else {
                
                    echo '<option value="">' . __( 'No Posts Found', 'unitedthemes' ) . '</option>';
              
                }
            
            echo '</select>';
        
        echo '</div>';
    
    }
  
}



/**
 * List Item Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_list_item' ) ) {
  
    function ot_type_list_item( $args = array() ) {
    
        /* turns arguments array into variables */
        extract( $args );
        
        /* pass the settings array arround */
        echo '<input type="hidden" name="' . esc_attr( $field_id ) . '_settings_array" id="' . esc_attr( $field_id ) . '_settings_array" value="' . ot_encode( $field_settings ) . '" />';
        
        /** 
         * settings pages have array wrappers like 'option_tree'.
         * So we need that value to create a proper array to save to.
         * This is only for NON metaboxes settings.
         */
        if ( ! isset( $get_option ) ) {
            $get_option = '';
        }
          
        /* build list items */
        echo '<ul class="ut-sortable" data-max="' . $field_list_max . '" data-list-title="' . $field_list_title . '" data-name="' . esc_attr( $field_id ) . '" data-id="' . esc_attr( $post_id ) . '" data-get-option="' . esc_attr( $get_option ) . '" data-type="' . esc_attr( $type ) . '">';
        
            if ( is_array( $field_value ) && ! empty( $field_value ) ) {
            
                foreach( $field_value as $key => $list_item ) {
                    
                    if( array_filter($list_item) ) {
                        
                        echo '<li class="ui-state-default list-list-item">';
                        
                            ot_list_item_view( $field_id, $key, $list_item, $post_id, $get_option, $field_settings, $type, $field_list_title );
                            
                        echo '</li>';
                        
                    }
                    
                }
              
            }
        
        echo '</ul>';
        
        /* button */
        echo '<button class="ut-list-item-add ut-ui-button" title="' . __( 'Add New', 'unitedthemes' ) . '">' . __( 'Add New', 'unitedthemes' ) . '</button>';

    
    }
  
}

/**
 * Compact List Item Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     5.0
 */
if ( ! function_exists( 'ot_type_compact_list' ) ) {

    function ot_type_compact_list( $args = array() ) {

        /* turns arguments array into variables */
        extract( $args );

        /* pass the settings array around */
        echo '<input type="hidden" name="' . esc_attr( $field_id ) . '_settings_array" id="' . esc_attr( $field_id ) . '_settings_array" value="' . ot_encode( $field_settings ) . '" />';
        echo '<input type="hidden" name="' . esc_attr( $field_id ) . '_sections_array" id="' . esc_attr( $field_id ) . '_sections_array" value="' . ot_encode( $field_sections ) . '" />';

        /**
         * settings pages have array wrappers like 'option_tree'.
         * So we need that value to create a proper array to save to.
         * This is only for NON metaboxes settings.
         */

        if ( ! isset( $get_option ) ) {
            $get_option = '';
        }

        /* build list items */
        echo '<ul class="ut-sortable ut-sortable-compact" data-max="' . $field_list_max . '" data-list-title="' . $field_list_title . '" data-name="' . esc_attr( $field_id ) . '" data-id="' . esc_attr( $post_id ) . '" data-get-option="' . esc_attr( $get_option ) . '" data-type="' . esc_attr( $type ) . '">';

        if ( is_array( $field_value ) && ! empty( $field_value ) ) {

            foreach( $field_value as $key => $list_item ) {

                if( array_filter($list_item) ) {

                    echo '<li class="ui-state-default compact-list-item">';

                        ot_list_compact_view( $field_id, $key, $list_item, $post_id, $get_option, $field_sections, $field_settings, $type, $field_list_title );

                    echo '</li>';

                }

            }

        }

        echo '</ul>';

        /* button */
        echo '<button class="ut-compact-list-item-add ut-ui-button" title="' . __( 'Add New', 'unitedthemes' ) . '">' . __( 'Add New', 'unitedthemes' ) . '</button>';

    }

}


/**
 * Numeric Slider Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.1
 */
if( ! function_exists( 'ot_type_numeric_slider' ) ) {

    function ot_type_numeric_slider( $args = array() ) {
    
        /** 
         * @var $field_min_max_step
         * @var $field_breakpoint
         * @var $field_value
         * @var $field_class
         * @var $field_name
         * @var $field_id
         * @var $field_name_key
         */
        extract( $args );

        $field_value = $field_value && !is_numeric( $field_value ) ? (int) filter_var($field_value, FILTER_SANITIZE_NUMBER_INT ) : $field_value;

        $_options = explode( ',', $field_min_max_step );
        $min     = $_options[0] ?? 0;
        $max     = $_options[1] ?? 100;
        $step    = $_options[2] ?? 1;
        $inherit = '';

        if( $field_breakpoint ) {

            $min = $inherit = $min - $step;

        } else {

            // field value cannot be smaller than min
            $field_value = $field_value < $min ? $min : $field_value;

        }

        if( $field_name_key == 'letter-spacing' ) {
            $inherit = '0';
        }

        echo '<div class="ut-numeric-slider-wrap ' . $field_class . '">';

            echo '<input autocomplete="off" type="hidden" name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '" class="ut-numeric-slider-hidden-input" value="' . esc_attr( $field_value ) . '" data-min="' . esc_attr( $min ) . '" data-max="' . esc_attr( $max ) . '" data-step="' . esc_attr( $step ) . '" ' . ( $inherit != '' ? 'data-inherit="' . $inherit . '"' : '' ) . '>';

            echo '<input data-min="' . esc_attr( $min ) . '" data-max="' . esc_attr( $max ) . '" type="input" class="ut-ui-form-input ut-numeric-slider-helper-input" data-tooltip="' . esc_html__( 'Max Value:', 'unitedthemes' ) . ' ' . esc_attr( $max ) . '" value="' . esc_attr( $field_value ) . '" autocomplete="off" ' . ( !empty( $field_breakpoint ) ? 'data-breakpoint="' . $field_breakpoint . '"' : '' ) . '>';
            echo '<div id="ut_numeric_slider_' . esc_attr( $field_id ) . '" class="ut-numeric-slider ui-slider ui-slider-horizontal"></div>';

        echo '</div>';
      

  }

}



function ut_maybe_convert_to_numeric_px( $value, $font_size = '' ) {

    if( !defined('UT_SHORTCODES_VERSION' ) ) {

        return (int) filter_var($value, FILTER_SANITIZE_NUMBER_INT);

    }

    // px value
    if ( strpos( $value, 'px' ) !== false ) {

        return ut_remove_px_value( $value );

    }

    // em value
    if ( strpos( $value, 'em' ) !== false ) {

        $em = (int) filter_var($value, FILTER_SANITIZE_NUMBER_INT);

        $base_font_size = ut_get_theme_options_font_setting( 'body_font', 'font-size', 14 );

        return ut_remove_px_value( $base_font_size ) * $em;

    }

    // rem value
    if ( strpos( $value, 'rem' ) !== false ) {

        $rem = str_replace( 'rem', '', $value );

        return 16 * $rem;

    }

    // % value (line-height)
    if ( $font_size && strpos( $value, '%' ) !== false ) {

        $percent = (int) filter_var($value, FILTER_SANITIZE_NUMBER_INT);

        return $font_size / 100 * $percent;

    }


    return (int) filter_var($value, FILTER_SANITIZE_NUMBER_INT);

}


/**
 * Numeric Breakpoint Slider Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     4.9.6.7
 */
if( ! function_exists( 'ot_type_global_numeric_breakpoint_slider' ) ) {

    function ot_type_global_numeric_breakpoint_slider( $args = array() ) {

            /**
             * turns arguments array into variables
             *
             * @var $field_relation
             * @var $field_min_max_step
             * @var $field_value
             * @var $field_class
             * @var $field_id
             * @var $field_name
             * @var $field_label
             * @var $field_unit_support
             * @var $field_unit_support_default
             * @var $field_name_key
             *
             */
            extract( $args );

            // extract prior value
            if( !is_array( $field_value ) ) {

                // extract
                $_field_value = (int) filter_var($field_value, FILTER_SANITIZE_NUMBER_INT );
                $_field_value_unit = str_replace( $_field_value, '', $field_value );

                // create array
                $field_value = array(
                    $field_name_key => $_field_value,
                    $field_name_key . '-unit' => $_field_value_unit
                );

            }

            ut_call_option_by_type($args, array(
                'type'                       => 'numeric-breakpoint-slider',
                'field_id'                   => $field_id,
                'field_relation'             => $field_id,
                'field_name'                 => $field_name,
                'field_name_key'             => $field_name_key,
                'field_unit_support'         => $field_unit_support,
                'field_unit_support_default' => $field_unit_support_default,
                'field_label'                => $field_label,
                'field_value'                => $field_value
            ));



    }

}




/**
 * Numeric Breakpoint Slider Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     4.9.6.7
 */
if( ! function_exists( 'ot_type_numeric_breakpoint_slider' ) ) {

    function ot_type_numeric_breakpoint_slider( $args = array() ) {

        /**
         * turns arguments array into variables
         *
         * @var $field_relation
         * @var $field_min_max_step
         * @var $field_value
         * @var $field_class
         * @var $field_id
         * @var $field_name
         * @var $field_label
         * @var $field_unit_support
         * @var $field_unit_support_default
         * @var $field_name_key
         * @var $field_option_label
         *
         */
        extract( $args );

        echo '<div class="ut-ui-responsive-settings-group ' . $field_class . '">';

            echo '<div class="ut-ui-responsive-settings">';

                if( $field_option_label ) {

                    echo '<label>', $field_label, '</label>';

                }

                if( $field_unit_support ) {

                    $_field_value = $field_value[$field_name_key . '-unit'] ?? '';

                    $_function = 'ot_recognized_'. $field_unit_support . '_units';

                    ut_call_option_by_type($args, array(
                        'type'               => 'data-select',
                        'field_id'           => $field_id . '_unit',
                        'field_relation'     => $field_id,
                        'field_name_key'     => $field_name_key,
                        'field_unit_support' => $field_unit_support,
                        'field_label'        => $field_label,
                        'field_value'        => $_field_value,
                        'field_name'         => $field_name . '['. $field_name_key . '-unit]',
                        'field_choices'      => ut_array_to_choices($_function($field_id), $field_unit_support_default )
                    ));

                } else {

                    echo '<div class="ut-option-unit">' , 'em' , '</div>';

                }

                echo '<ul class="ut-responsive-settings-tabs clearfix" data-tabgroup="' . esc_attr( $field_id ) . '">';

                foreach ( ot_recognized_breakpoints( $field_id ) as $key => $value ) {

                    echo '<li><a data-tooltip="' . $value . ':' . ot_recognized_breakpoints_values( $key ) .'" data-responsive-tab="' . $key . '" href="#' . esc_attr( $field_id ) . '_' . $key . '" class="' . ( $key == 'desktop_large' ? 'active' : '' ) . '">' . ot_get_breakpoint_icon( $key ) . '</a></li>';

                }

                echo '</ul>';

                echo '<section id="' . esc_attr( $field_id ) . '" class="ut-responsive-settings-tabgroup">';

                    foreach ( ot_recognized_breakpoints( $field_id ) as $key => $value ) {

                        echo '<div id="' . esc_attr( $field_id ) . '_' . $key . '" style="display: none;" class="ut-responsive-settings-tab clearfix">';

                            if( $key == 'desktop_large' ) {

                                $_field_value = $field_value[$field_name_key] ?? '';

                                ut_call_option_by_type($args, array(
                                    'type' => 'numeric-slider',
                                    'field_id' => $field_id . '_' . $key,
                                    'field_label' => $field_label,
                                    'field_value' => ut_remove_px_value($_field_value ),
                                    'field_name' => $field_name . '['. $field_name_key . ']',
                                    'field_min_max_step' => $field_min_max_step,
                                    'field_breakpoint' => $key,
                                    'field_name_key' => $field_name_key,
                                ));

                            } else {

                                $_field_value = $field_value[$field_name_key. '-responsive'][$key] ?? '';

                                ut_call_option_by_type($args, array(
                                    'type' => 'numeric-slider',
                                    'field_id' => $field_id . '_' . $key,
                                    'field_label' => $field_label,
                                    'field_value' => $_field_value,
                                    'field_name' => $field_name . '['. $field_name_key . '-responsive][' . $key . ']',
                                    'field_min_max_step' => $field_min_max_step,
                                    'field_breakpoint' => $key,
                                    'field_name_key' => $field_name_key,
                                ));

                            }

                        echo '</div>';

                    }

                echo '</section>';

            echo '</div>';

        echo '</div>';

    }

}


/**
 * Page Checkbox Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_page_checkbox' ) ) {
  
    function ot_type_page_checkbox( $args = array() ) {
    
        /* turns arguments array into variables */
        extract( $args );

        /* query pages array */
        $my_posts = get_posts( apply_filters( 'ot_type_page_checkbox_query', array( 'post_type' => array( 'page' ), 'posts_per_page' => -1, 'orderby' => 'title', 'order' => 'ASC', 'post_status' => 'any' ), $field_id ) );

        /* has pages */
        if ( is_array( $my_posts ) && ! empty( $my_posts ) ) {
        
            foreach( $my_posts as $my_post ){
                
                echo '<p>';
                    echo '<input type="checkbox" name="' . esc_attr( $field_name ) . '[' . esc_attr( $my_post->ID ) . ']" id="' . esc_attr( $field_id ) . '-' . esc_attr( $my_post->ID ) . '" value="' . esc_attr( $my_post->ID ) . '" ' . ( isset( $field_value[$my_post->ID] ) ? checked( $field_value[$my_post->ID], $my_post->ID, false ) : '' ) . ' class="ut-ui-form-checkbox ut-ui-checkbox ' . esc_attr( $field_class ) . '" />';
                    echo '<label for="' . esc_attr( $field_id ) . '-' . esc_attr( $my_post->ID ) . '">' . $my_post->post_title . '</label>';
                echo '</p>';
                
            }
        
        } else {
            
            echo '<p>' . __( 'No Pages Found', 'unitedthemes' ) . '</p>';
            
        }      

    }
  
}

/**
 * Page Select Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_page_select' ) ) {
  
    function ot_type_page_select( $args = array() ) {

        /* turns arguments array into variables */
        extract( $args );
        
        echo '<div class="ut-ui-select-field">';
        
            /* build page select */
            echo '<select name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '" class="ut-ui-form-select ut-ui-select ' . $field_class . '">';
            
            /* query pages array */
            $my_posts = get_posts( apply_filters( 'ot_type_page_select_query', array( 'post_type' => array( 'page' ), 'posts_per_page' => -1, 'orderby' => 'title', 'order' => 'ASC', 'post_status' => 'any' ), $field_id ) );
            
            /* has pages */
            if ( is_array( $my_posts ) && ! empty( $my_posts ) ) {
                
                echo '<option value="">-- ' . __( 'Choose One', 'unitedthemes' ) . ' --</option>';
                
                foreach( $my_posts as $my_post ) {
                
                    echo '<option value="' . esc_attr( $my_post->ID ) . '"' . selected( $field_value, $my_post->ID, false ) . '>' . esc_attr( $my_post->post_title ) . '</option>';
                    
                }

                echo '<option value="custom" ' . selected( $field_value, 'custom', false ) . '>' . __( 'Custom Link', 'unitedthemes' ) . '</option>';
                
            } else {
              
              echo '<option value="">' . __( 'No Pages Found', 'unitedthemes' ) . '</option>';
              
            }
            
            echo '</select>';
        
        echo '</div>';
    
    }
  
}


/**
 * Section Select Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_section_select' ) ) {
  
    function ot_type_section_select( $args = array() ) {

        /* turns arguments array into variables */
        extract( $args );
          
        /* only query pages which are sections */
        if ( has_nav_menu( 'primary' ) ) {
            
            $args = ut_prepare_front_query();
            
            echo '<div class="ut-ui-select-field">';
                  
                /* build page select */
                echo '<select name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '" class="ut-ui-form-select ut-ui-select ' . $field_class . '">';
                
                    echo '<option value="">-- ' . __( 'Choose One', 'unitedthemes' ) . ' --</option>';
                    
                    /* query pages array */
                    $my_posts = get_posts( apply_filters( 'ot_type_page_select_query', $args , $field_id ) );
                    
                    /* has pages */
                    if ( is_array( $my_posts ) && ! empty( $my_posts ) ) {
                        
                        foreach( $my_posts as $my_post ) {
                        
                            echo '<option value="' . esc_attr( $my_post->ID ) . '"' . selected( $field_value, $my_post->ID, false ) . '>' . esc_attr( $my_post->post_title ) . '</option>';
                            
                        }
                    
                    } else {
                      
                      echo '<option value="">' . __( 'No Pages Found', 'unitedthemes' ) . '</option>';
                      
                    }
                
                echo '</select>';
            
            echo '</div>';
            
        } else {
        
            echo _e( 'Information: There are no Pages are assigned to the menu yet or the assigned pages are not set to menutype "Section"! Please read the delivered documentation carefully. We recommend to start with the "Start from Scratch Setup" documentation part.' , 'unitedthemes' );
        
        }
    
    }
  
}


/**
 * List Item Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_slider' ) ) {
  
    function ot_type_slider( $args = array() ) {
    
        /* turns arguments array into variables */
        extract( $args );
        
        /* pass the settings array arround */
        echo '<input type="hidden" name="' . esc_attr( $field_id ) . '_settings_array" id="' . esc_attr( $field_id ) . '_settings_array" value="' . ot_encode( $field_settings ) . '" />';
        
        /** 
         * settings pages have array wrappers like 'option_tree'.
         * So we need that value to create a proper array to save to.
         * This is only for NON metaboxes settings.
         */
        if ( ! isset( $get_option ) ) {
            $get_option = '';
        }
          
        /* build list items */
        echo '<ul class="ut-sortable" data-name="' . esc_attr( $field_id ) . '" data-id="' . esc_attr( $post_id ) . '" data-get-option="' . esc_attr( $get_option ) . '" data-type="' . esc_attr( $type ) . '">';
        
            if ( is_array( $field_value ) && ! empty( $field_value ) ) {
            
                foreach( $field_value as $key => $list_item ) {
                
                    echo '<li class="ui-state-default list-list-item">';
                      
                      ot_list_item_view( $field_id, $key, $list_item, $post_id, $get_option, $field_settings, $type );
                      
                    echo '</li>';
                
                }
              
            }
        
        echo '</ul>';
        
        /* button */
        echo '<button class="ut-list-item-add ut-ui-button" title="' . __( 'Add New', 'unitedthemes' ) . '">' . __( 'Add New', 'unitedthemes' ) . '</button>';
        
        /* description */
        echo '<div class="list-item-description">' . __( 'You can re-order with drag & drop, the order will update after saving.', 'unitedthemes' ) . '</div>';
    
    }
  
}

/**
 * Post Checkbox Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_post_checkbox' ) ) {
  
    function ot_type_post_checkbox( $args = array() ) {
    
        /* turns arguments array into variables */
        extract( $args );
        
        /* query posts array */
        $my_posts = get_posts( apply_filters( 'ot_type_post_checkbox_query', array( 'post_type' => array( 'post' ), 'posts_per_page' => -1, 'orderby' => 'title', 'order' => 'ASC', 'post_status' => 'any' ), $field_id ) );
        
        /* has posts */
        if ( is_array( $my_posts ) && ! empty( $my_posts ) ) {
            
            foreach( $my_posts as $my_post ){
                
                echo '<p>';
                    echo '<input type="checkbox" name="' . esc_attr( $field_name ) . '[' . esc_attr( $my_post->ID ) . ']" id="' . esc_attr( $field_id ) . '-' . esc_attr( $my_post->ID ) . '" value="' . esc_attr( $my_post->ID ) . '" ' . ( isset( $field_value[$my_post->ID] ) ? checked( $field_value[$my_post->ID], $my_post->ID, false ) : '' ) . ' class="ut-ui-form-checkbox ut-ui-checkbox ' . esc_attr( $field_class ) . '" />';
                    echo '<label for="' . esc_attr( $field_id ) . '-' . esc_attr( $my_post->ID ) . '">' . esc_attr( $my_post->post_title ) . '</label>';
                echo '</p>';
                
            } 
        
        } else {
            
            echo '<p>' . __( 'No Posts Found', 'unitedthemes' ) . '</p>';
            
        }
    
    }
  
}

/**
 * Post Select Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_post_select' ) ) {
  
    function ot_type_post_select( $args = array() ) {

        /* turns arguments array into variables */
        extract( $args );
        
        echo '<div class="ut-ui-select-field">';
      
            /* build page select */
            echo '<select name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '" class="ut-ui-form-select ut-ui-select ' . $field_class . '">';
            
                /* query posts array */
                $my_posts = get_posts( apply_filters( 'ot_type_post_select_query', array( 'post_type' => array( 'post' ), 'posts_per_page' => -1, 'orderby' => 'title', 'order' => 'ASC', 'post_status' => 'any' ), $field_id ) );
            
                /* has posts */
                if ( is_array( $my_posts ) && ! empty( $my_posts ) ) {
                
                    echo '<option value="">-- ' . __( 'Choose One', 'unitedthemes' ) . ' --</option>';
                  
                    foreach( $my_posts as $my_post ){
                        
                        echo '<option value="' . esc_attr( $my_post->ID ) . '"' . selected( $field_value, $my_post->ID, false ) . '>' . esc_attr( $my_post->post_title ) . '</option>';
                        
                    }
                  
                } else {
                  
                    echo '<option value="">' . __( 'No Posts Found', 'unitedthemes' ) . '</option>';
                  
                }
            
            echo '</select>';
        
        echo '</div>';
    
    }
  
}

/**
 * Radio Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_radio' ) ) {
  
    function ot_type_radio( $args = array() ) {
    
        /* turns arguments array into variables */
        extract( $args );
      
        /* build radio */
        foreach ( (array) $field_choices as $key => $choice ) {
            
            echo '<p><input type="radio" name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '-' . esc_attr( $key ) . '" value="' . esc_attr( $choice['value'] ) . '"' . checked( $field_value, $choice['value'], false ) . ' class="ut-ui-form-radio ut-ui-radio ' . esc_attr( $field_class ) . '" /><label for="' . esc_attr( $field_id ) . '-' . esc_attr( $key ) . '">' . esc_attr( $choice['label'] ) . '</label></p>';
            
        }
    
    }
  
}

/**
 * Radio Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_radio_group' ) ) {
  
    function ot_type_radio_group( $args = array() ) {
    
        /* turns arguments array into variables */
        extract( $args );
        
        /* format setting inner wrapper */
        echo '<div class="ut-ui-radio-group" data-group="' . esc_attr( $field_name ) . '">';
      
        /* build radio */
        foreach ( (array) $field_choices as $key => $choice ) {
            
            echo '<p><input data-for="' . esc_attr( implode(',' , $choice['for'] ) ) . '" type="radio" name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '-' . esc_attr( $key ) . '" value="' . esc_attr( $choice['value'] ) . '"' . checked( $field_value, $choice['value'], false ) . ' class="ut-ui-form-radio ut-ui-radio ' . esc_attr( $field_class ) . ' ' . ( isset($field_toplevel) && $field_toplevel ? 'ut-toplevel-radio-option' : '' ) . '" /><label for="' . esc_attr( $field_id ) . '-' . esc_attr( $key ) . '">' . esc_attr( $choice['label'] ) . '</label></p>';
            
        }
      
        echo '</div>';
    
    }
  
}

if ( ! function_exists( 'ot_type_radio_group_button' ) ) {
  
    function ot_type_radio_group_button( $args = array() ) {
    
        /* turns arguments array into variables */
        extract( $args );
                
        /* format setting inner wrapper */
        echo '<div class="ut-ui-radio-group" data-group="' . esc_attr( $field_name ) . '">';
        
            /* build buttons */
            echo '<div class="ut-radio-button-group">';
                
                foreach ( (array) $field_choices as $key => $choice ) {
                    
                    $custom_class = !empty( $choice['class'] ) ? $choice['class'] : '';
                    $selected = ( $field_value == $choice['value'] ) ? 'selected' : '';
                    
                    echo '<a href="#" data-for="' . esc_attr( $field_id ) . '-' . esc_attr( $key ) . '" title="' . esc_attr( $choice['label'] ) . '" class="ut-radio-button '.$selected.' '.$custom_class.'">' . esc_attr( $choice['label'] ) . '</a>';  
                  
                }
                  
            echo '</div>';
        
            /* build radio */
            foreach ( (array) $field_choices as $key => $choice ) {
                
                echo '<p class="ut-hide"><input data-for="' . esc_attr( implode(',' , $choice['for'] ) ) . '" type="radio" name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '-' . esc_attr( $key ) . '" value="' . esc_attr( $choice['value'] ) . '"' . checked( $field_value, $choice['value'], false ) . ' class="ut-ui-form-radio ut-ui-radio ' . esc_attr( $field_class ) . '" /><label for="' . esc_attr( $field_id ) . '-' . esc_attr( $key ) . '">' . esc_attr( $choice['label'] ) . '</label></p>';
                
            }
        
        echo '</div>';
    
    }
  
}

/**
 * Radio Images Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_radio_image' ) ) {
  
    function ot_type_radio_image( $args = array() ) {
    
        /* turns arguments array into variables */
        extract( $args );
        
		echo '<div class="ut-ui-radio-images-wrap">';
		
        /* build radio image */
        foreach ( (array) $field_choices as $key => $choice ) {
          
            $src = FW_WEB_ROOT . '/core/admin/assets/img/options/' . $choice['src'];
          
            echo '<div class="ut-ui-radio-images">';
                
                echo '<input id="' . esc_attr( $field_id ) . '-' . esc_attr( $choice['value'] ) . '" autocomplete="off" type="radio" name="' . esc_attr( $field_name ) . '" value="' . esc_attr( $choice['value'] ) . '"' . checked( $field_value, $choice['value'], false ) . ' class="ut-ui-form-radio ut-ui-radio" />';  
                echo '<label for="' . esc_attr( $field_id ) . '-' . esc_attr( $choice['value'] ) . '"><img src="' . esc_url( $src ) . '" class="option-tree-ui-radio-image ' . esc_attr( $field_class ) . '" /></label>';
                echo '<p>' . $choice['label'] . '</p>';
                
            echo '</div>';
        
        }
		
		echo '</div>';
    
    }
  
}

/**
 * Select Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_select' ) ) {
  
    function ot_type_select( $args = array() ) {
    
        /* turns arguments array into variables */
        extract( $args );
        
        /* fallback for older version */
        if( is_array( $field_value ) ) {
            $field_value = implode("", $field_value);
        }        
        
        echo '<div class="ut-ui-select-field">';
        
            /* build select */
            echo '<select autocomplete="off" name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '" class="ut-ui-form-select ut-ui-select ' . esc_attr( $field_class ) . '">';
                
                foreach ( (array) $field_choices as $choice ) {
                    if ( isset( $choice['value'] ) && isset( $choice['label'] ) ) {
                        echo '<option class="select-option-' . esc_attr( $choice['value'] ) . '" data-orglabel="' . esc_attr( $choice['label'] ) . '" data-altlabel="' . ( isset($choice['alt_label']) ? esc_attr( $choice['alt_label'] ) : '' ) . '" value="' . esc_attr( $choice['value'] ) . '"' . selected( $field_value, $choice['value'], false ) . '>' . esc_attr( $choice['label'] ) . '</option>';
                    }
                }
            
            echo '</select>';
        
        echo '</div>';
    
    }
  
}

/**
 * Select Option Type with data attributes.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     4.9.6.7
 */
if ( ! function_exists( 'ot_type_data_select' ) ) {

    function ot_type_data_select( $args = array() ) {

        /**
         * @var $field_name
         * @var $field_id
         * @var $field_class
         * @var $field_choices
         * @var $field_value
         * @var $field_name_key
         * @var $field_unit_support
         * @var $field_relation
         *
         */
        extract( $args );

        echo '<div class="ut-ui-select-field">';

            /* build select */
            echo '<select data-relation-field="' . $field_relation . '" autocomplete="off" name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '" class="ut-ui-form-select ut-ui-select ut-ui-select-dynamic ' . esc_attr( $field_class ) . '">';

                foreach ( (array) $field_choices as $choice ) {

                    $min_max_step_func = "ot_recognized_{$field_unit_support}_dynamic";
                    $min_max_step = $min_max_step_func( $field_id, $choice['value'] );

                    echo '<option data-relation-value="' . implode(",", $min_max_step ) . '" class="select-option-' . esc_attr( $choice['value'] ) . '" value="' . esc_attr( $choice['value'] ) . '"' . selected( $field_value, $choice['value'], false ) . '>' . esc_attr( $choice['label'] ) . '</option>';

                }

            echo '</select>';

        echo '</div>';

    }

}

/**
 * Select Option Type for groups.
 */
if ( ! function_exists( 'ot_type_select_group' ) ) {
  
    function ot_type_select_group( $args = array() ) {
    
        /* turns arguments array into variables */
        extract( $args ); 
                    
        /* fallback for older version */
        if( is_array( $field_value ) ) {
            $field_value = implode("", $field_value);
        }
        
        echo '<div class="ut-ui-select-field">';
        
            /* build select */
            echo '<select autocomplete="off" name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '" class="ut-ui-form-select ut-ui-select ut-ui-group-select ' . esc_attr( $field_class ) . ' ' . ( isset($field_toplevel) && $field_toplevel ? 'ut-toplevel-select-option' : '' ) . '">';
                
                foreach ( (array) $field_choices as $choice ) {
                
                    if ( isset( $choice['value'] ) && isset( $choice['label'] ) ) {
                        echo '<option class="select-group-option-' . esc_attr( $choice['value'] ) . '" data-orglabel="' . esc_attr( $choice['label'] ) . '" data-altlabel="' . ( isset($choice['alt_label']) ? esc_attr( $choice['alt_label'] ) : '' ) . '" data-for="' . ( isset($choice['for']) && is_array($choice['for']) ? esc_attr( implode(',' , $choice['for'] ) ) : '' ) . '" value="' . esc_attr( $choice['value'] ) . '"' . selected( $field_value, $choice['value'], false ) . '>' . esc_attr( $choice['label'] ) . '</option>';
                    }
                
                }
            
            echo '</select>';
        
        echo '</div>';
          
    }
  
}

/**
 * Sidebar Select Option Type.
 *
 * This option type makes it possible for users to select a WordPress registered sidebar 
 * to use on a specific area. By using the two provided filters, 'ot_recognized_sidebars', 
 * and 'ot_recognized_sidebars_{$field_id}' we can be selective about which sidebars are 
 * available on a specific content area.
 *
 * For example, if we create a WordPress theme that provides the ability to change the 
 * Blog Sidebar and we don't want to have the footer sidebars available on this area, 
 * we can unset those sidebars either manually or by using a regular expression if we 
 * have a common name like footer-sidebar-$i.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.1
 */
if ( ! function_exists( 'ot_type_sidebar_select' ) ) {
  
  function ot_type_sidebar_select( $args = array() ) {
  
    /* turns arguments array into variables */
    extract( $args );
        
        echo '<div class="ut-ui-select-field">';
      
            /* build page select */
            echo '<select autocomplete="off" name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '" class="ut-ui-form-select ut-ui-select ' . $field_class . '">';
    
            /* get the registered sidebars */
            global $wp_registered_sidebars;
    
            $sidebars = array();
            foreach( $wp_registered_sidebars as $id=>$sidebar ) {
              $sidebars[ $id ] = $sidebar[ 'name' ];
            }
    
            /* filters to restrict which sidebars are allowed to be selected, for example we can restrict footer sidebars to be selectable on a blog page */
            $sidebars = apply_filters( 'ot_recognized_sidebars', $sidebars );
            $sidebars = apply_filters( 'ot_recognized_sidebars_' . $field_id, $sidebars );
    
            /* has sidebars */
            if ( count( $sidebars ) ) {
              echo '<option value="">-- ' . __( 'Choose Sidebar', 'unitedthemes' ) . ' --</option>';
              foreach ( $sidebars as $id => $sidebar ) {
                echo '<option value="' . esc_attr( $id ) . '"' . selected( $field_value, $id, false ) . '>' . esc_attr( $sidebar ) . '</option>';
              }
            } else {
              echo '<option value="">' . __( 'No Sidebars', 'unitedthemes' ) . '</option>';
            }
            
            echo '</select>';
        
        echo '</div>';        
    
    }
  
}

/**
 * Tag Checkbox Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_tag_checkbox' ) ) {
  
  function ot_type_tag_checkbox( $args = array() ) {
    
    /* turns arguments array into variables */
    extract( $args );
        

      
        /* get tags */
        $tags = get_tags( array( 'hide_empty' => false ) );
        
        /* has tags */
        if ( $tags ) {
          foreach( $tags as $tag ) {
            echo '<p>';
              echo '<input type="checkbox" name="' . esc_attr( $field_name ) . '[' . esc_attr( $tag->term_id ) . ']" id="' . esc_attr( $field_id ) . '-' . esc_attr( $tag->term_id ) . '" value="' . esc_attr( $tag->term_id ) . '" ' . ( isset( $field_value[$tag->term_id] ) ? checked( $field_value[$tag->term_id], $tag->term_id, false ) : '' ) . ' class="ut-ui-form-checkbox ut-ui-checkbox ' . esc_attr( $field_class ) . '" />';
              echo '<label for="' . esc_attr( $field_id ) . '-' . esc_attr( $tag->term_id ) . '">' . esc_attr( $tag->name ) . '</label>';
            echo '</p>';
          } 
        } else {
          echo '<p>' . __( 'No Tags Found', 'unitedthemes' ) . '</p>';
        }

    
  }
  
}

/**
 * Tag Select Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_tag_select' ) ) {
  
  function ot_type_tag_select( $args = array() ) {

    /* turns arguments array into variables */
    extract( $args );
        
        /* build tag select */
        echo '<select name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '" class="ut-ui-form-select ut-ui-select ' . $field_class . '">';
        
        /* get tags */
        $tags = get_tags( array( 'hide_empty' => false ) );
        
        /* has tags */
        if ( $tags ) {
          echo '<option value="">-- ' . __( 'Choose One', 'unitedthemes' ) . ' --</option>';
          foreach( $tags as $tag ) {
            echo '<option value="' . esc_attr( $tag->term_id ) . '"' . selected( $field_value, $tag->term_id, false ) . '>' . esc_attr( $tag->name ) . '</option>';
          }
        } else {
          echo '<option value="">' . __( 'No Tags Found', 'unitedthemes' ) . '</option>';
        }
        
        echo '</select>';
      

    
  }
  
}

/**
 * Taxonomy Checkbox Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_taxonomy_checkbox' ) ) {
  
  function ot_type_taxonomy_checkbox( $args = array() ) {
    
    /* turns arguments array into variables */
    extract( $args );
        
        /* setup the taxonomy */
        $taxonomy = isset( $field_taxonomy ) ? explode( ',', $field_taxonomy ) : array( 'category' );
        
        /* get taxonomies */
        $taxonomies = get_categories( array( 'hide_empty' => false, 'taxonomy' => $taxonomy ) );
        
        /* has tags */
        if ( $taxonomies ) {
            
            foreach( $taxonomies as $taxonomy ) {
                echo '<p>';
                    echo '<input type="checkbox" name="' . esc_attr( $field_name ) . '[' . esc_attr( $taxonomy->term_id ) . ']" id="' . esc_attr( $field_id ) . '-' . esc_attr( $taxonomy->term_id ) . '" value="' . esc_attr( $taxonomy->term_id ) . '" ' . ( isset( $field_value[$taxonomy->term_id] ) ? checked( $field_value[$taxonomy->term_id], $taxonomy->term_id, false ) : '' ) . ' class="ut-ui-form-checkbox ut-ui-checkbox ' . esc_attr( $field_class ) . '" />';
                echo '<label for="' . esc_attr( $field_id ) . '-' . esc_attr( $taxonomy->term_id ) . '">' . esc_attr( $taxonomy->name ) . '</label>';
                echo '</p>';
            } 
            
        } else {
            
            echo '<p>' . __( 'No Taxonomies Found', 'unitedthemes' ) . '</p>';
            
        }
        

    
  }
  
}

/**
 * Taxonomy Select Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_taxonomy_select' ) ) {
  
  function ot_type_taxonomy_select( $args = array() ) {

    /* turns arguments array into variables */
    extract( $args );
        
        echo '<div class="ut-ui-select-field">';
      
            /* build tag select */
            echo '<select name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '" class="ut-ui-form-select ut-ui-select ' . $field_class . '">';
            
            /* setup the taxonomy */
            $taxonomy = isset( $field_taxonomy ) ? explode( ',', $field_taxonomy ) : array( 'category' );
            
            /* get taxonomies */
            $taxonomies = get_categories( array( 'hide_empty' => false, 'taxonomy' => $taxonomy ) );
            
            /* has tags */
            if ( $taxonomies ) {
                
                echo '<option value="">-- ' . __( 'Choose One', 'unitedthemes' ) . ' --</option>';
                
                foreach( $taxonomies as $taxonomy ) {
                    echo '<option value="' . esc_attr( $taxonomy->term_id ) . '"' . selected( $field_value, $taxonomy->term_id, false ) . '>' . esc_attr( $taxonomy->name ) . '</option>';
                }
                
            } else {
              
              echo '<option value="">' . __( 'No Taxonomies Found', 'unitedthemes' ) . '</option>';
              
            }
            
            echo '</select>';
      
        echo '</div>';
    
    }
  
}


/**
 * Text Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_text' ) ) {
  
  function ot_type_text( $args = array() ) {
    
    /* turns arguments array into variables */
    extract( $args );
      
        /* build text input */
        echo '<input type="text" name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '" value="' . esc_attr( $field_value ) . '" class="ut-ui-form-input ' . esc_attr( $field_class ) . '" />';
    
    }
  
}


/**
 * Twitter Options Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     4.9
 */

if ( ! function_exists( 'ot_type_twitter_options' ) ) {
  
  function ot_type_twitter_options( $args = array() ) {
    
		/* turns arguments array into variables */
		extract( $args );
      	
	  	if( empty( $field_value ) ) {
			
			$field_value = get_option('ut_twitter_options');
			
		}
	  
	  	// build text input 
       	echo '<p>';
	  		echo '<label for="' . esc_attr( $field_id ) . '_consumer_key">' . __('Consumer Key' , 'unitedthemes') . '</label><br />';
	  		echo '<input type="text" name="' . esc_attr( $field_name ) . '[consumer_key]" id="' . esc_attr( $field_id ) . '_consumer_key" value="' . ( isset( $field_value['consumer_key'] ) ? esc_attr( $field_value['consumer_key'] ) : '' ) . '" class="ut-ui-form-input ' . esc_attr( $field_class ) . '" />';
	  	echo '</p>';
	  
	  	// build text input
        echo '<p>';
	  		echo '<label for="' . esc_attr( $field_id ) . '_consumer_secret">' . __('Consumer Secret' , 'unitedthemes') . '</label><br />';
	  		echo '<input type="text" name="' . esc_attr( $field_name ) . '[consumer_secret]" id="' . esc_attr( $field_id ) . '_consumer_secret" value="' . ( isset( $field_value['consumer_secret'] ) ? esc_attr( $field_value['consumer_secret'] ) : '' ) . '" class="ut-ui-form-input ' . esc_attr( $field_class ) . '" />';
	  	echo '</p>';	
	  
	  	// build text input
	  	echo '<p>';
	  		echo '<label for="' . esc_attr( $field_id ) . '_oauth_access_token">' . __('Access Token' , 'unitedthemes') . '</label><br />';
        	echo '<input type="text" name="' . esc_attr( $field_name ) . '[oauth_access_token]" id="' . esc_attr( $field_id ) . '_oauth_access_token" value="' . ( isset( $field_value['oauth_access_token'] ) ? esc_attr( $field_value['oauth_access_token'] ) : '' ) . '" class="ut-ui-form-input ' . esc_attr( $field_class ) . '" />';
	  	echo '</p>';
	  
        // build text input
	  	echo '<p>';
	  		echo '<label for="' . esc_attr( $field_id ) . '_oauth_access_token_secret">' . __('Access Token Secret' , 'unitedthemes') . '</label><br />';
        	echo '<input type="text" name="' . esc_attr( $field_name ) . '[oauth_access_token_secret]" id="' . esc_attr( $field_id ) . '_oauth_access_token_secret" value="' . ( isset( $field_value['oauth_access_token_secret'] ) ? esc_attr( $field_value['oauth_access_token_secret'] ) : '' ) . '" class="ut-ui-form-input ' . esc_attr( $field_class ) . '" />';
	  	echo '</p>';
	  
    
    }
  
}


/**
 * Unique ID Hidden Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_unique_id' ) ) {
  
  function ot_type_unique_id( $args = array() ) {
      
        /* turns arguments array into variables */
        extract( $args );
      
        if( empty( $field_value ) ) {
        
            $field_value = uniqid("ut_id_");

        } 
      
        /* build text input */
        echo '<input type="hidden" name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '" value="' . esc_attr( $field_value ) . '" class="ut-ui-form-input ' . esc_attr( $field_class ) . '" />';
    
    }
  
}


/**
 * Textarea Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_textarea' ) ) {
  
  function ot_type_textarea( $args = array() ) {
    
    /* turns arguments array into variables */
    extract( $args );
        
        echo '<div class="ut-ui-tinymce">';
            
            /* create a min height due to a minor bug since WP4.0*/
            echo '<style type="text/css">#'.$field_id.'_ifr {min-height:350px;}</style>';
            
            /* build textarea */
            wp_editor( 
                $field_value, 
                esc_attr( $field_id ), 
                array(
                    'editor_class'  => esc_attr( $field_class ),
                    'wpautop'       => true,
                    'media_buttons' => apply_filters( 'ot_media_buttons', true, $field_id ),
                    'textarea_name' => esc_attr( $field_name ),
                    'textarea_rows' => esc_attr( $field_rows ),
                    'tinymce'       => apply_filters( 'ot_tinymce', true, $field_id ),              
                    'quicktags'     => apply_filters( 'ot_quicktags', array( 'buttons' => 'strong,em,link,block,del,ins,img,ul,ol,li,code,spell,close' ), $field_id )
                ) 
            ); 
        
        echo '</div>';        
    
    }
  
}

/**
 * Textarea Simple Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_textarea_simple' ) ) {
  
  function ot_type_textarea_simple( $args = array() ) {
    
    /* turns arguments array into variables */
    extract( $args );

        /* filter to allow wpautop */
        $wpautop = apply_filters( 'ot_wpautop', false, $field_id );
        
        /* wpautop $field_value */
        if ( $wpautop == true ) 
          $field_value = wpautop( $field_value );
        
        /* build textarea simple */
        echo '<textarea class="ut-ui-form-textarea ' . esc_attr( $field_class ) . '" rows="' . esc_attr( $field_rows )  . '" cols="40" name="' . esc_attr( $field_name ) .'" id="' . esc_attr( $field_id ) . '">' . esc_textarea( $field_value ) . '</textarea>';
        
        if(!empty($field_htmldesc)) {
            echo '<pre>' . $field_htmldesc . '</pre>';
        }

    } 
  
}

/**
 * Panel Headlines
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     4.1
 */
if ( ! function_exists( 'ot_type_panel_headline' ) ) {
  
    function ot_type_panel_headline( $args = array() ) {

        /**
         * @var $field_id
         * @var $field_label
         * @var $field_breakpoint_support
         */

        extract( $args );

        echo '<div class="ut-panel-headline-content">';

            echo '<h1 class="ut-panel-title">' . wp_specialchars_decode( $field_label ) . '</h1>';

            if( $field_breakpoint_support ) {

                echo '<ul class="ut-responsive-settings-tabs ut-responsive-settings-tabs-global clearfix" data-tabgroup="' . esc_attr( $field_id ) . '_group">';

                foreach ( ot_recognized_breakpoints( $field_id ) as $key => $value ) {

                    echo '<li><a data-tooltip="' . $value . ':' . ot_recognized_breakpoints_values( $key ) .'" data-responsive-tab="' . $key . '" href="#" class="' . ( $key == 'desktop_large' ? 'active' : '' ) . ' ut-global-breakpoint">' . ot_get_breakpoint_icon( $key ) . '</a></li>';

                }

                echo '</ul>';

            }

        echo '</div>';


    }
  
}

/**
 * Section Headlines
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     4.1
 */
if ( ! function_exists( 'ot_type_section_headline' ) ) {
  
    function ot_type_section_headline( $args = array() ) {

        /**
         * @var $field_id
         * @var $field_label
         * @var $field_breakpoint_support
         */
        extract( $args );

        if( !empty( $field_label ) ) {

            echo '<div class="ut-section-headline-content">';

            echo '<h2 class="ut-section-title">' . wp_specialchars_decode($field_label) . '</h2>';

            if ($field_breakpoint_support) {

                echo '<ul class="ut-responsive-settings-tabs ut-responsive-settings-tabs-global clearfix" data-tabgroup="' . esc_attr($field_id) . '_group">';

                foreach (ot_recognized_breakpoints($field_id) as $key => $value) {

                    echo '<li><a data-tooltip="' . $value . ':' . ot_recognized_breakpoints_values($key) . '" data-responsive-tab="' . $key . '" href="#" class="' . ($key == 'desktop_large' ? 'active' : '') . ' ut-global-breakpoint">' . ot_get_breakpoint_icon($key) . '</a></li>';

                }

                echo '</ul>';

            }

            echo '</div>';

        }
    
    }
  
}

/**
 * Subsectionheadline Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     4.1
 */
if ( ! function_exists( 'ot_type_sub_section_headline' ) ) {
  
  function ot_type_sub_section_headline( $args = array() ) {
    
    /* turns arguments array into variables */
    extract( $args );
    
    /* description */
    echo '<div class="ut-section-sub-headline-content"><h3 class="ut-section-sub-title">' . wp_specialchars_decode( $field_label ) . '</h3></div>';
    
  }
  
}

/**
 * Subsectionheadline Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     4.1
 */
if ( ! function_exists( 'ot_type_sub_section_inline_headline' ) ) {
  
  function ot_type_sub_section_inline_headline( $args = array() ) {
    
    /* turns arguments array into variables */
    extract( $args );
    
    /* description */
    echo '<div class="ut-section-sub-headline-content"><h3 class="ut-section-sub-title">' . wp_specialchars_decode( $field_label ) . '</h3></div>';
    
  }
  
}



/**
 * Section Headline Info Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     4.0
 */
if ( ! function_exists( 'ot_type_section_headline_info' ) ) {
  
    function ot_type_section_headline_info( $args = array() ) {
    
        /* turns arguments array into variables */
        extract( $args );
    
        /* description */
        echo '<div class="description">' . wp_specialchars_decode( $field_desc ) . '</div>';
      
    
    }
  
}

/**
 * Easing Effect for different purposes
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_easing' ) ) {
  
    function ot_type_easing( $args = array() ) {
        
        /* turns arguments array into variables */
        extract( $args );
        
        /* allow fields to be filtered */
        $ot_recognized_easing_fields = apply_filters( 'ot_recognized_easing_fields', array( 
            'easing',
        ), $field_id );
        
        /* build font easing dropdown */
        if ( in_array( 'easing', $ot_recognized_easing_fields ) ) {
        
            $easing = isset( $field_value['easing'] ) ? esc_attr( $field_value['easing'] ) : '';
            
            echo '<div class="ut-ui-select-field">';
            
                echo '<select name="' . esc_attr( $field_name ) . '[easing]" data-group="' . esc_attr( $field_id ) . '" id="' . esc_attr( $field_id ) . '-easing" class="ut-ui-form-select ut-ui-select ' . esc_attr( $field_class ) . '">';
                    echo '<option value="">' . __('Default' , 'unitedthemes') . '</option>';
                    
                    foreach ( ot_recognized_easing_effects( $field_id ) as $key => $value ) {
                          echo '<option value="' . esc_attr( $key ) . '" ' . selected( $easing, $key, false ) . '>' . esc_attr( $value ) . '</option>';
                    }
                    
                echo '</select>';
            
            echo '<div>';
                                
        }
                
    }

}


/**
 * CSS Easing Effect for different purposes
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_css_easing' ) ) {
  
    function ot_type_css_easing( $args = array() ) {
        
        /* turns arguments array into variables */
        extract( $args );
        
        /* allow fields to be filtered */
        $ot_recognized_css_easing_effects = ot_recognized_css_easing_effects( $field_id );
        
        /* build font easing dropdown */
        $easing = isset( $field_value ) ? esc_attr( $field_value ) : '';

        echo '<div class="ut-ui-select-field">';

            echo '<select name="' . esc_attr( $field_name ) . '" data-group="' . esc_attr( $field_id ) . '" id="' . esc_attr( $field_id ) . '-easing" class="ut-ui-form-select ut-ui-select ' . esc_attr( $field_class ) . '">';
                echo '<option value="">' . __('Default' , 'unitedthemes') . '</option>';

                foreach ( $ot_recognized_css_easing_effects as $key => $value ) {
                      echo '<option value="' . esc_attr( $key ) . '" ' . selected( $easing, $key, false ) . '>' . esc_attr( $value ) . '</option>';
                }

            echo '</select>';

        echo '<div>';
                                
                
    }

}


/**
 * Animation In Effect for different purposes
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     4.5.4
 */
if ( ! function_exists( 'ot_type_animation_in' ) ) {
  
    function ot_type_animation_in( $args = array() ) {
        
        /* turns arguments array into variables */
        extract( $args );

        echo '<div class="ut-ui-select-field">';

            echo '<select name="' . esc_attr( $field_name ) . '" data-group="' . esc_attr( $field_id ) . '" id="' . esc_attr( $field_id ) . '" class="ut-ui-form-select ut-ui-select ' . esc_attr( $field_class ) . '">';
                
                echo '<option value="">' . __('Default' , 'unitedthemes') . '</option>';

                foreach ( ot_recognized_animation_in_effects( $field_id ) as $key => $value ) {
                    echo '<option value="' . esc_attr( $key ) . '" ' . selected( $field_value, $key, false ) . '>' . esc_attr( $value ) . '</option>';
                }

            echo '</select>';

        echo '<div>';
                                
                
    }

}




/**
 * Google font typography Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_googlefont' ) ) {
  
    function ot_type_googlefont( $args = array() ) {
        
        /* turns arguments array into variables */
        extract( $args );

        /* allow fields to be filtered */
        $ot_recognized_typography_fields = apply_filters( 'ot_recognized_typography_fields', array( 
            'font-color',
            'font-family',
            'font-id', 
            'font-size', 
            'font-style', 
            'font-variant', 
            'font-weight', 
            'font-subset',
            'letter-spacing', 
            'line-height', 
            'text-decoration', 
            'text-transform'
        ), $field_id );
        
        echo '<div class="ut-ui-select-group clearfix">';
            
            /* build font family */
            if ( in_array( 'font-family', $ot_recognized_typography_fields ) ) {

                $font_family = $field_value['font-family'] ?? '';

                echo '<div class="ut-ui-select-field-wrap">';

                    echo '<div class="ut-ui-select-field">';

                        echo '<label class="ut-ui-select-group-label">' , esc_html__( 'Font Family:','unitedthemes' ) , '</label>';

                        echo '<a href="#" class="ut-clear-select-js-data-ajax"><i class="fa fa-times" aria-hidden="true"></i></a>';

                        echo '<select name="' . esc_attr( $field_name ) . '[font-family]" data-group="' . esc_attr( $field_id ) . '" id="' . esc_attr( $field_id ) . '-font-family" class="ut-ui-form-select ut-ui-select ut-select-js-data-ajax ' . esc_attr( $field_class ) . '">';

                            echo '<option value="">font-family</option>';

                            foreach( ut_recognized_google_fonts( $field_id ) as $id => $font ) {

                                $key    = preg_replace( '/\s+/', '', strtolower( $font['family'] ) );
                                // $family = preg_replace("/\s+/" , '+' , $font['family'] );

                                if( $key == $font_family ) {

                                    $variants = implode(",", $font['variants']);
                                    $subsets = implode(",", $font['subsets']);

                                    echo '<option data-fontid="' . esc_attr( $id ) . '" data-subsets="' .  esc_attr( $subsets ) . '" data-variants="' . esc_attr( $variants ) . '" data-font="' . esc_attr( $font['family'] ) . '" data-family="' . esc_attr( $font['family'] ) . '" value="' . esc_attr( $key ) . '" ' . selected( $font_family , $key , false ) . '>' . esc_attr( $font['family'] ) . '</option>';

                                }

                            }

                        echo '</select>';

                    echo '</div>';

                    echo '<a class="ut-ui-button" target="_blank" href="https://fonts.google.com/">' . esc_html__( 'View available fonts', 'unitedthemes' ) . '</a>';

                echo '</div>';
                  
            }
                
            /* build font subsets */
            if ( in_array( 'font-subset', $ot_recognized_typography_fields ) ) {
    
                $font_subset = isset( $field_value['font-subset'] ) ? esc_attr( $field_value['font-subset'] ) : '';
                
                echo '<div class="ut-ui-select-field">';

                    echo '<label class="ut-ui-select-group-label">' , esc_html__( 'Font Subset:','unitedthemes' ) , '</label>';

                    echo '<select name="' . esc_attr( $field_name ) . '[font-subset]" data-group="' . esc_attr( $field_id ) . '" id="' . esc_attr( $field_id ) . '-font-subset" class="ut-ui-form-select ut-ui-select ut-google-font-subset ' . esc_attr( $field_class ) . '">';
                        
                        echo '<option value="">font-subset</option>';
                        
                        foreach ( ot_recognized_google_subsets( $field_id ) as $key => $value ) {
                            
                            echo '<option value="' . esc_attr( $key ) . '" ' . selected( $font_subset, $key, false ) . '>' . esc_attr( $value ) . '</option>';
                            
                        }
                        
                    echo '</select>';
                
                echo '</div>';
                
                
            }
            
            /* build font size */
            if ( in_array( 'font-size', $ot_recognized_typography_fields ) ) {

            	if( in_array('font-size-responsive', $ot_recognized_typography_fields ) ) {

		            ut_call_option_by_type($args, array(
                        'type' => 'numeric-breakpoint-slider',
                        'field_id' => $field_id . '-font-size',
                        'field_label' => esc_html__( 'Font Size', 'unitedthemes' ),
                        'field_value' => $field_value,
                        'field_name' => $field_name,
                        'field_name_key' => 'font-size',
                        'field_min_max_step' => ot_recognized_font_sizes( $field_id, true ),
                        'field_unit_support' => 'font_size'
                    ) );

	            } else {

		            $font_size = isset( $field_value['font-size'] ) ? esc_attr( $field_value['font-size'] ) : '';

		            echo '<div class="ut-ui-select-field">';

			            echo '<select name="' . esc_attr( $field_name ) . '[font-size]" data-group="' . esc_attr( $field_id ) . '" id="' . esc_attr( $field_id ) . '-font-size" class="ut-ui-form-select ut-ui-select ut-google-font-size ' . esc_attr( $field_class ) . '">';

				            echo '<option value="">font-size</option>';

				            foreach( ot_recognized_font_sizes( $field_id ) as $option ) {

					            echo '<option value="' . esc_attr( $option ) . '" ' . selected( $font_size, $option, false ) . '>' . esc_attr( $option ) . '</option>';

				            }

			            echo '</select>';

		            echo '</div>';

	            }
                
            }

            /* build line height */
            if ( in_array( 'line-height', $ot_recognized_typography_fields ) ) {

                if( in_array('line-height-responsive', $ot_recognized_typography_fields ) ) {

                    ut_call_option_by_type($args, array(
                        'type'               => 'numeric-breakpoint-slider',
                        'field_id'           => $field_id . '-line-height',
                        'field_label'        => esc_html__( 'Line Height', 'unitedthemes' ),
                        'field_value'        => $field_value,
                        'field_name'         => $field_name,
                        'field_name_key'     => 'line-height',
                        'field_min_max_step' => ot_recognized_line_heights( $field_id, true ),
                        'field_unit_support' => 'line_height'
                    ));

                } else {

                    $line_height = isset( $field_value['line-height'] ) ? esc_attr( $field_value['line-height'] ) : '';

                    echo '<div class="ut-ui-select-field">';

                        echo '<select name="' . esc_attr( $field_name ) . '[line-height]" id="' . esc_attr( $field_id ) . '-line-height" class="ut-ui-form-select ut-ui-select ' . esc_attr( $field_class ) . '">';

                            echo '<option value="">line-height</option>';

                            foreach( ot_recognized_line_heights( $field_id ) as $option ) {

                                echo '<option value="' . esc_attr( $option ) . '" ' . selected( $line_height, $option, false ) . '>' . esc_attr( $option ) . '</option>';

                            }

                        echo '</select>';

                    echo '</div>';

                }

            }

            /* optional letter spacing */
            if( apply_filters("ot_letter_spacing_for_google_font", true, $field_id ) ) {

                if( in_array('letter-spacing-responsive', $ot_recognized_typography_fields ) ) {

                    ut_call_option_by_type($args, array(
                        'type' => 'numeric-breakpoint-slider',
                        'field_id' => $field_id . '-letter-spacing',
                        'field_label' => esc_html__( 'Letter Spacing', 'unitedthemes' ),
                        'field_value' => $field_value,
                        'field_name' => $field_name,
                        'field_name_key' => 'letter-spacing',
                        'field_min_max_step' => '-0.2,0.201,0.01'
                    ) );

                } else {

                    $letter_spacing = isset( $field_value['letter-spacing'] ) ? esc_attr( $field_value['letter-spacing'] ) : '';

                    echo '<div class="ut-numeric-slider-outer-wrap" style="margin-bottom:20px;">';

                        echo '<label for="' . esc_attr( $field_id ) . '-letter-spacing">' . esc_html__( 'Letter Spacing', 'unitedthemes' ) . '</label>';

                        echo '<div class="ut-numeric-slider-wrap">';

                            echo '<input autocomplete="off" type="hidden" name="' . esc_attr( $field_name ) . '[letter-spacing]" id="' . esc_attr( $field_id ) . '-letter-spacing" class="ut-numeric-slider-hidden-input" value="' . $letter_spacing . '" data-min="-0.2" data-max="0.2" data-step="0.01">';

                            echo '<input min="-0.2" max="0.2" type="input" class="ut-ui-form-input ut-numeric-slider-helper-input" data-tooltip="' . esc_html__( 'Max Value:', 'unitedthemes' ) . ' 0.2" value="' . esc_attr( $letter_spacing ) . '" autocomplete="off">';
                            echo '<div id="ut_numeric_slider_' . esc_attr( $field_id ) . '_border_radius" class="ut-numeric-slider ui-slider ui-slider-horizontal"></div>';

                        echo '</div>';

                    echo '</div>';

                }
        
            }

            /* build font weight */
            if ( in_array( 'font-weight', $ot_recognized_typography_fields ) ) {

                $font_weight = isset( $field_value['font-weight'] ) ? esc_attr( $field_value['font-weight'] ) : '';

                echo '<div class="ut-ui-select-field">';

                    echo '<label class="ut-ui-select-group-label">' , esc_html__( 'Font Weight:','unitedthemes' ) , '</label>';

                    echo '<select name="' . esc_attr( $field_name ) . '[font-weight]" data-group="' . esc_attr( $field_id ) . '" id="' . esc_attr( $field_id ) . '-font-weight" class="ut-ui-form-select ut-ui-select ut-google-font-weight ' . esc_attr( $field_class ) . '">';

                        echo '<option value="">font-weight</option>';

                        foreach ( ot_recognized_google_font_weights( $field_id ) as $key => $value ) {

                            echo '<option value="' . esc_attr( $key ) . '" ' . selected( $font_weight, $key, false ) . '>' . esc_attr( $value ) . '</option>';

                        }

                    echo '</select>';

                echo '</div>';


            }

            /* build font style */
            if ( in_array( 'font-style', $ot_recognized_typography_fields ) ) {
                
                $font_style = isset( $field_value['font-style'] ) ? esc_attr( $field_value['font-style'] ) : '';
                
                echo '<div class="ut-ui-select-field">';

                    echo '<label class="ut-ui-select-group-label">' , esc_html__( 'Font Style:','unitedthemes' ) , '</label>';

                    echo '<select name="' . esc_attr( $field_name ) . '[font-style]" data-group="' . esc_attr( $field_id ) . '" id="' . esc_attr( $field_id ) . '-font-style" class="ut-ui-form-select ut-ui-select ut-google-font-style ' . esc_attr( $field_class ) . '">';
                        
                        echo '<option value="">font-style</option>';
                        
                        foreach ( ot_recognized_google_font_styles( $field_id ) as $key => $value ) {
        
                          echo '<option value="' . esc_attr( $key ) . '" ' . selected( $font_style, $key, false ) . '>' . esc_attr( $value ) . '</option>';
                          
                        }
                            
                    echo '</select>';
                
                echo '</div>';
                
                
            }
                
            /* build text transform */
            if ( in_array( 'text-transform', $ot_recognized_typography_fields ) ) {
            
                  $text_transform = isset( $field_value['text-transform'] ) ? esc_attr( $field_value['text-transform'] ) : '';
                  
                  echo '<div class="ut-ui-select-field">';

                      echo '<label class="ut-ui-select-group-label">' , esc_html__( 'Text Transform:','unitedthemes' ) , '</label>';

                      echo '<select name="' . esc_attr( $field_name ) . '[text-transform]" data-group="' . esc_attr( $field_id ) . '" id="' . esc_attr( $field_id ) . '-text-transform" class="ut-ui-form-select ut-ui-select ut-google-text-transform ' . esc_attr( $field_class ) . '">';
                        
                        echo '<option value="">text-transform</option>';
                        
                        foreach ( ot_recognized_text_transformations( $field_id ) as $key => $value ) {
                            
                            echo '<option value="' . esc_attr( $key ) . '" ' . selected( $text_transform, $key, false ) . '>' . esc_attr( $value ) . '</option>';
                            
                        }
                        
                      echo '</select>';
                  
                  echo '</div>';
                  
                  
            }
        
        echo '</div>';
        
        /* hidden font id */
        if ( in_array( 'font-id', $ot_recognized_typography_fields ) ) {
            $font_id = isset( $field_value['font-id'] ) ? esc_attr( $field_value['font-id'] ) : ''; /* @todo - needs to be changed to font slug!!! */
            echo '<input type="hidden" name="' . esc_attr( $field_name ) . '[font-id]" id="' . esc_attr( $field_id ) . '-fontid" value="' . esc_attr( $font_id ) . '" autocomplete="off" />';
        }
            
        /* build preview window */
        echo '<link id="ut-google-style-link-' . esc_attr( $field_id ) . '" rel="stylesheet" type="text/css" href="">';
        echo '<style id="ut-google-style-' . esc_attr( $field_id ) . '" type="text/css"></style>';
        
        echo '<div id="ut-google-preview-' . esc_attr( $field_id ) . '" class="ut-google-font-preview">';
            
            esc_html_e('The quick brown fox jumps over the lazy dog.' , 'unitedthemes');    
        
        echo '</div>';

    }
    
}


/**
 * Typography Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_typography' ) ) {
  
    function ot_type_typography( $args = array() ) {
    
        /* turns arguments array into variables */
        extract( $args );
        
        /* allow fields to be filtered */
        $ot_recognized_typography_fields = apply_filters( 'ot_recognized_typography_fields', array( 
            //'font-color',
            'font-family', 
            'font-size', 
            'font-style', 
            'font-variant', 
            'font-weight', 
            'letter-spacing', 
            'line-height', 
            'text-decoration', 
            'text-transform' 
        ), $field_id );
        
        /* build background colorpicker */
        if ( in_array( 'font-color', $ot_recognized_typography_fields ) ) {
        
          echo '<div class="option-tree-ui-colorpicker-input-wrap">';
                        
            /* set background color */
            $background_color = isset( $field_value['font-color'] ) ? esc_attr( $field_value['font-color'] ) : '';
            
            /* set border color */
            $border_color = in_array( $background_color, array( '#FFFFFF', '#FFF', '#ffffff', '#fff' ) ) ? '#ccc' : $background_color;
            
            /* input */
            echo '<input maxlength="7" type="text" name="' . esc_attr( $field_name ) . '[font-color]" id="' . esc_attr( $field_id ) . '-picker" value="' . esc_attr( $background_color ) . '" class="ut-ui-form-input ut-minicolors ' . esc_attr( $field_class ) . '" autocomplete="off" placeholder="font-color" />';
            
          echo '</div>';
        
        }
        
        echo '<div class="ut-ui-select-group clearfix">';
        
            /* build font family */
            if ( in_array( 'font-family', $ot_recognized_typography_fields ) ) {
                
                $font_family = isset( $field_value['font-family'] ) ? $field_value['font-family'] : '';
                
                echo '<div class="ut-ui-select-field">';          
                    
                    echo '<select name="' . esc_attr( $field_name ) . '[font-family]" id="' . esc_attr( $field_id ) . '-font-family" class="ut-ui-form-select ut-ui-select ' . esc_attr( $field_class ) . '">';
                        
                        echo '<option value="">font-family</option>';
                        
                        foreach ( ut_recognized_font_families( $field_id ) as $key => $value ) {
                            
                            echo '<option value="' . esc_attr( $key ) . '" ' . selected( $font_family, $key, false ) . '>' . esc_attr( $value ) . '</option>';
                            
                        }
                        
                    echo '</select>';
                    
                echo '</div>';
                
                    
            }

		    /* build font size */
		    if ( in_array( 'font-size', $ot_recognized_typography_fields ) ) {

			    if( in_array('font-size-responsive', $ot_recognized_typography_fields ) ) {

				    ut_call_option_by_type($args, array(
                        'type' => 'numeric-breakpoint-slider',
                        'field_id' => $field_id . '-font-size',
                        'field_label' => esc_html__( 'Font Size', 'unitedthemes' ),
                        'field_value' => $field_value,
                        'field_name' => $field_name,
                        'field_name_key' => 'font-size',
                        'field_min_max_step' => ot_recognized_font_sizes( $field_id, true ),
                        'field_unit_support' => 'font_size'
                    ) );

			    } else {

				    $font_size = isset( $field_value['font-size'] ) ? esc_attr( $field_value['font-size'] ) : '';

				    echo '<div class="ut-ui-select-field">';

				        echo '<select name="' . esc_attr( $field_name ) . '[font-size]" id="' . esc_attr( $field_id ) . '-font-size" class="ut-ui-form-select ut-ui-select ' . esc_attr( $field_class ) . '">';

					    echo '<option value="">font-size</option>';

					    foreach( ot_recognized_font_sizes( $field_id ) as $option ) {

						    echo '<option value="' . esc_attr( $option ) . '" ' . selected( $font_size, $option, false ) . '>' . esc_attr( $option ) . '</option>';

					    }

				     echo '</select>';

				    echo '</div>';

			    }

		    }

		    /* build line height */
		    if ( in_array( 'line-height', $ot_recognized_typography_fields ) ) {

			    if( in_array('line-height-responsive', $ot_recognized_typography_fields ) ) {

				    ut_call_option_by_type($args, array(
                        'type'               => 'numeric-breakpoint-slider',
                        'field_id'           => $field_id . '-line-height',
                        'field_label'        => esc_html__( 'Line Height', 'unitedthemes' ),
                        'field_value'        => $field_value,
                        'field_name'         => $field_name,
                        'field_name_key'     => 'line-height',
                        'field_min_max_step' => ot_recognized_line_heights( $field_id, true ),
                        'field_unit_support' => 'line_height'
                    ));

			    } else {

				    $line_height = isset( $field_value['line-height'] ) ? esc_attr( $field_value['line-height'] ) : '';

				    echo '<div class="ut-ui-select-field">';

					    echo '<select name="' . esc_attr( $field_name ) . '[line-height]" id="' . esc_attr( $field_id ) . '-line-height" class="ut-ui-form-select ut-ui-select ' . esc_attr( $field_class ) . '">';

						    echo '<option value="">line-height</option>';

						    foreach( ot_recognized_line_heights( $field_id ) as $option ) {
							    echo '<option value="' . esc_attr( $option ) . '" ' . selected( $line_height, $option, false ) . '>' . esc_attr( $option ) . '</option>';
						    }

					    echo '</select>';

				    echo '</div>';

			    }

		    }

            /* build letter spacing */
            if ( in_array( 'letter-spacing', $ot_recognized_typography_fields ) ) {

                if( in_array('letter-spacing-responsive', $ot_recognized_typography_fields ) ) {

                    ut_call_option_by_type($args, array(
                        'type' => 'numeric-breakpoint-slider',
                        'field_id' => $field_id . '-letter-spacing',
                        'field_label' => esc_html__( 'Letter Spacing', 'unitedthemes' ),
                        'field_value' => $field_value,
                        'field_name' => $field_name,
                        'field_name_key' => 'letter-spacing',
                        'field_min_max_step' => '-0.2,0.2,0.01'
                    ) );

                } else {

                    $letter_spacing = !empty( $field_value['letter-spacing'] ) ? esc_attr( $field_value['letter-spacing'] ) : 0;

                    echo '<div class="ut-numeric-slider-outer-wrap" style="margin-bottom:20px;">';

                        echo '<label for="' . esc_attr( $field_id ) . '-letter-spacing">' . esc_html__( 'Letter Spacing', 'unitedthemes' ) . '</label>';

                        echo '<div class="ut-numeric-slider-wrap">';

                            echo '<input autocomplete="off" type="hidden" name="' . esc_attr( $field_name ) . '[letter-spacing]" id="' . esc_attr( $field_id ) . '-letter-spacing" class="ut-numeric-slider-hidden-input" value="' . $letter_spacing . '" data-min="-0.2" data-max="0.2" data-step="0.01">';

                            echo '<input min="-0.2" max="0.2" type="input" class="ut-ui-form-input ut-numeric-slider-helper-input" data-tooltip="' . esc_html__( 'Max Value:', 'unitedthemes' ) . ' 0.2" value="' . esc_attr( $letter_spacing ) . '" autocomplete="off">';
                            echo '<div id="ut_numeric_slider_' . esc_attr( $field_id ) . '_border_radius" class="ut-numeric-slider ui-slider ui-slider-horizontal"></div>';

                        echo '</div>';

                    echo '</div>';

                }

            }

            /* build font style */
            if ( in_array( 'font-style', $ot_recognized_typography_fields ) ) {
                
                $font_style = isset( $field_value['font-style'] ) ? esc_attr( $field_value['font-style'] ) : '';
                
                echo '<div class="ut-ui-select-field">';
                
                    echo '<select name="' . esc_attr( $field_name ) . '[font-style]" id="' . esc_attr( $field_id ) . '-font-style" class="ut-ui-form-select ut-ui-select ' . esc_attr( $field_class ) . '">';
                    
                        echo '<option value="">font-style</option>';
                        
                        foreach ( ot_recognized_font_styles( $field_id ) as $key => $value ) {
                        
                            echo '<option value="' . esc_attr( $key ) . '" ' . selected( $font_style, $key, false ) . '>' . esc_attr( $value ) . '</option>';
                            
                        }
                        
                    echo '</select>';
            
                echo '</div>';
                
                    
            }
            
            /* build font variant */
            if ( in_array( 'font-variant', $ot_recognized_typography_fields ) ) {
                
                $font_variant = isset( $field_value['font-variant'] ) ? esc_attr( $field_value['font-variant'] ) : '';
                
                echo '<div class="ut-ui-select-field">';
                
                    echo '<select name="' . esc_attr( $field_name ) . '[font-variant]" id="' . esc_attr( $field_id ) . '-font-variant" class="ut-ui-form-select ut-ui-select ' . esc_attr( $field_class ) . '">';
                    
                        echo '<option value="">font-variant</option>';
                        
                        foreach ( ot_recognized_font_variants( $field_id ) as $key => $value ) {
                            
                            echo '<option value="' . esc_attr( $key ) . '" ' . selected( $font_variant, $key, false ) . '>' . esc_attr( $value ) . '</option>';
                            
                        }
                        
                    echo '</select>';
                
                echo '</div>';
                
                
            }

		    /* build font weight */
            if ( in_array( 'font-weight', $ot_recognized_typography_fields ) ) {

                $font_weight = isset( $field_value['font-weight'] ) ? esc_attr( $field_value['font-weight'] ) : '';

                echo '<div class="ut-ui-select-field">';

                    echo '<select name="' . esc_attr( $field_name ) . '[font-weight]" id="' . esc_attr( $field_id ) . '-font-weight" class="ut-ui-form-select ut-ui-select ' . esc_attr( $field_class ) . '">';

                        echo '<option value="">font-weight</option>';

                        foreach ( ot_recognized_font_weights( $field_id ) as $key => $value ) {

                            echo '<option value="' . esc_attr( $key ) . '" ' . selected( $font_weight, $key, false ) . '>' . esc_attr( $value ) . '</option>';

                        }

                    echo '</select>';

                echo '</div>';


            }

            /* build text decoration */
            if ( in_array( 'text-decoration', $ot_recognized_typography_fields ) ) {
                
                $text_decoration = isset( $field_value['text-decoration'] ) ? esc_attr( $field_value['text-decoration'] ) : '';
                    
                echo '<div class="ut-ui-select-field">';
                
                    echo '<select name="' . esc_attr( $field_name ) . '[text-decoration]" id="' . esc_attr( $field_id ) . '-text-decoration" class="ut-ui-form-select ut-ui-select ' . esc_attr( $field_class ) . '">';
                        
                        echo '<option value="">text-decoration</option>';
                        
                        foreach ( ot_recognized_text_decorations( $field_id ) as $key => $value ) {
                            
                            echo '<option value="' . esc_attr( $key ) . '" ' . selected( $text_decoration, $key, false ) . '>' . esc_attr( $value ) . '</option>';
                            
                        }
                        
                    echo '</select>';
                
                echo '</div>';
                
                
            }
            
            /* build text transform */
            if ( in_array( 'text-transform', $ot_recognized_typography_fields ) ) {
                
                $text_transform = isset( $field_value['text-transform'] ) ? esc_attr( $field_value['text-transform'] ) : '';
                
                echo '<div class="ut-ui-select-field">';
                
                    echo '<select name="' . esc_attr( $field_name ) . '[text-transform]" id="' . esc_attr( $field_id ) . '-text-transform" class="ut-ui-form-select ut-ui-select ' . esc_attr( $field_class ) . '">';
                    
                        echo '<option value="">text-transform</option>';
                        
                        foreach ( ot_recognized_text_transformations( $field_id ) as $key => $value ) {
                            
                            echo '<option value="' . esc_attr( $key ) . '" ' . selected( $text_transform, $key, false ) . '>' . esc_attr( $value ) . '</option>';
                            
                        }
                        
                    echo '</select>';
                    
                echo '</div>';
                
              
            }
        
        echo '</div>';
        
    }
  
}


/**
 * Custom Typography Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     4.6.3
 */
if ( ! function_exists( 'ot_type_custom_typography' ) ) {
  
    function ot_type_custom_typography( $args = array() ) {
    
        /* turns arguments array into variables */
        extract( $args );
        
        /* allow fields to be filtered */
        $ot_recognized_typography_fields = apply_filters( 'ot_recognized_typography_fields', array( 
            //'font-color',
            'font-family', 
            'font-size', 
            'font-style', 
            'font-variant', 
            'font-weight', 
            'letter-spacing', 
            'line-height', 
            'text-decoration', 
            'text-transform' 
        ), $field_id );
        
        /* build background colorpicker */
        if ( in_array( 'font-color', $ot_recognized_typography_fields ) ) {
        
          echo '<div class="option-tree-ui-colorpicker-input-wrap">';
                        
            /* set background color */
            $background_color = isset( $field_value['font-color'] ) ? esc_attr( $field_value['font-color'] ) : '';
            
            /* set border color */
            $border_color = in_array( $background_color, array( '#FFFFFF', '#FFF', '#ffffff', '#fff' ) ) ? '#ccc' : $background_color;
            
            /* input */
            echo '<input maxlength="7" type="text" name="' . esc_attr( $field_name ) . '[font-color]" id="' . esc_attr( $field_id ) . '-picker" value="' . esc_attr( $background_color ) . '" class="ut-ui-form-input ut-minicolors ' . esc_attr( $field_class ) . '" autocomplete="off" placeholder="font-color" />';
            
          echo '</div>';
        
        }
        
        echo '<div class="ut-ui-select-group clearfix">';
        
            /* build font family */
            if ( in_array( 'font-family', $ot_recognized_typography_fields ) ) {
				
				$font_family = isset( $field_value['font-family'] ) ? $field_value['font-family'] : '';
                
                echo '<div class="ut-ui-select-field">';          
                    
                    echo '<select name="' . esc_attr( $field_name ) . '[font-family]" id="' . esc_attr( $field_id ) . '-font-family" class="ut-ui-form-select ut-ui-select ' . esc_attr( $field_class ) . '">';
                        
                        echo '<option value="">font-family</option>';
                		
						$taxonomies = get_categories( array( 'hide_empty' => false, 'taxonomy' => 'unite_custom_fonts' ) );
				
						if ( $taxonomies ) {
				
							foreach( $taxonomies as $taxonomy ) {

								echo '<option value="' . esc_attr( $taxonomy->term_id ) . '"' . selected( $font_family, $taxonomy->term_id, false ) . '>' . esc_attr( $taxonomy->name ) . '</option>';

							}
							
						} else {
							
							echo '<option value="">' . __( 'No Custom Fonts Found', 'unitedthemes' ) . '</option>';
							
						}
                        
                    echo '</select>';
                    
                echo '</div>';
				
            }

		    /* build font size */
		    if ( in_array( 'font-size', $ot_recognized_typography_fields ) ) {

			    if( in_array('font-size-responsive', $ot_recognized_typography_fields ) ) {

				    ut_call_option_by_type($args, array(
                        'type' => 'numeric-breakpoint-slider',
                        'field_id' => $field_id . '-font-size',
                        'field_label' => esc_html__( 'Font Size', 'unitedthemes' ),
                        'field_value' => $field_value,
                        'field_name' => $field_name,
                        'field_name_key' => 'font-size',
                        'field_min_max_step' => ot_recognized_font_sizes( $field_id, true ),
                        'field_unit_support' => 'font_size'
                    ) );

			    } else {

				    $font_size = isset( $field_value['font-size'] ) ? esc_attr( $field_value['font-size'] ) : '';

					    echo '<div class="ut-ui-select-field">';

					    echo '<select name="' . esc_attr( $field_name ) . '[font-size]" id="' . esc_attr( $field_id ) . '-font-size" class="ut-ui-form-select ut-ui-select ' . esc_attr( $field_class ) . '">';

						    echo '<option value="">font-size</option>';

						    foreach( ot_recognized_font_sizes( $field_id ) as $option ) {

							    echo '<option value="' . esc_attr( $option ) . '" ' . selected( $font_size, $option, false ) . '>' . esc_attr( $option ) . '</option>';

						    }

					    echo '</select>';

				    echo '</div>';

			    }

		    }

		    /* build line height */
		    if ( in_array( 'line-height', $ot_recognized_typography_fields ) ) {

			    if( in_array('line-height-responsive', $ot_recognized_typography_fields ) ) {

				    ut_call_option_by_type($args, array(
                        'type'               => 'numeric-breakpoint-slider',
                        'field_id'           => $field_id . '-line-height',
                        'field_label'        => esc_html__( 'Line Height', 'unitedthemes' ),
                        'field_value'        => $field_value,
                        'field_name'         => $field_name,
                        'field_name_key'     => 'line-height',
                        'field_min_max_step' => ot_recognized_line_heights( $field_id, true ),
                        'field_unit_support' => 'line_height'
                    ));

			    } else {

				    $line_height = isset( $field_value['line-height'] ) ? esc_attr( $field_value['line-height'] ) : '';

				    echo '<div class="ut-ui-select-field">';

					    echo '<select name="' . esc_attr( $field_name ) . '[line-height]" id="' . esc_attr( $field_id ) . '-line-height" class="ut-ui-form-select ut-ui-select ' . esc_attr( $field_class ) . '">';

						    echo '<option value="">line-height</option>';

						    foreach( ot_recognized_line_heights( $field_id ) as $option ) {
							    echo '<option value="' . esc_attr( $option ) . '" ' . selected( $line_height, $option, false ) . '>' . esc_attr( $option ) . '</option>';
						    }

					    echo '</select>';

				    echo '</div>';

			    }

		    }

		    /* build letter spacing */
            if ( in_array( 'letter-spacing', $ot_recognized_typography_fields ) ) {

                if( in_array('letter-spacing-responsive', $ot_recognized_typography_fields ) ) {

                    ut_call_option_by_type($args, array(
                        'type' => 'numeric-breakpoint-slider',
                        'field_id' => $field_id . '-letter-spacing',
                        'field_label' => esc_html__( 'Letter Spacing', 'unitedthemes' ),
                        'field_value' => $field_value,
                        'field_name' => $field_name,
                        'field_name_key' => 'letter-spacing',
                        'field_min_max_step' => '-0.2,0.2,0.01'
                    ) );

                } else {

                    $letter_spacing = !empty( $field_value['letter-spacing'] ) ? esc_attr( $field_value['letter-spacing'] ) : 0;

                    echo '<div class="ut-numeric-slider-outer-wrap" style="margin-bottom:20px;">';

                        echo '<label for="' . esc_attr( $field_id ) . '-letter-spacing">' . esc_html__( 'Letter Spacing', 'unitedthemes' ) . ' in EM</label>';

                        echo '<div class="ut-numeric-slider-wrap">';

                            echo '<input autocomplete="off" type="hidden" name="' . esc_attr( $field_name ) . '[letter-spacing]" id="' . esc_attr( $field_id ) . '-letter-spacing" class="ut-numeric-slider-hidden-input" value="' . $letter_spacing . '" data-min="-0.2" data-max="0.2" data-step="0.01">';

                            echo '<input min="-0.2" max="0.2" type="input" class="ut-ui-form-input ut-numeric-slider-helper-input" data-tooltip="' . esc_html__( 'Max Value:', 'unitedthemes' ) . ' 2" value="' . esc_attr( $letter_spacing ) . '" autocomplete="off">';
                            echo '<div id="ut_numeric_slider_' . esc_attr( $field_id ) . '_border_radius" class="ut-numeric-slider ui-slider ui-slider-horizontal"></div>';

                        echo '</div>';

                    echo '</div>';

                }

            }

            /* build font style */
            if ( in_array( 'font-style', $ot_recognized_typography_fields ) ) {
                
                $font_style = isset( $field_value['font-style'] ) ? esc_attr( $field_value['font-style'] ) : '';
                
                echo '<div class="ut-ui-select-field">';
                
                    echo '<select name="' . esc_attr( $field_name ) . '[font-style]" id="' . esc_attr( $field_id ) . '-font-style" class="ut-ui-form-select ut-ui-select ' . esc_attr( $field_class ) . '">';
                    
                        echo '<option value="">font-style</option>';
                        
                        foreach ( ot_recognized_font_styles( $field_id ) as $key => $value ) {
                        
                            echo '<option value="' . esc_attr( $key ) . '" ' . selected( $font_style, $key, false ) . '>' . esc_attr( $value ) . '</option>';
                            
                        }
                        
                    echo '</select>';
            
                echo '</div>';
                
                    
            }
            
            /* build font variant */
            if ( in_array( 'font-variant', $ot_recognized_typography_fields ) ) {
                
                $font_variant = isset( $field_value['font-variant'] ) ? esc_attr( $field_value['font-variant'] ) : '';
                
                echo '<div class="ut-ui-select-field">';
                
                    echo '<select name="' . esc_attr( $field_name ) . '[font-variant]" id="' . esc_attr( $field_id ) . '-font-variant" class="ut-ui-form-select ut-ui-select ' . esc_attr( $field_class ) . '">';
                    
                        echo '<option value="">font-variant</option>';
                        
                        foreach ( ot_recognized_font_variants( $field_id ) as $key => $value ) {
                            
                            echo '<option value="' . esc_attr( $key ) . '" ' . selected( $font_variant, $key, false ) . '>' . esc_attr( $value ) . '</option>';
                            
                        }
                        
                    echo '</select>';
                
                echo '</div>';
                
                
            }
            
            /* build font weight */
            if ( in_array( 'font-weight', $ot_recognized_typography_fields ) && false ) {
                
                $font_weight = isset( $field_value['font-weight'] ) ? esc_attr( $field_value['font-weight'] ) : '';
                
                echo '<div class="ut-ui-select-field">';
                
                    echo '<select name="' . esc_attr( $field_name ) . '[font-weight]" id="' . esc_attr( $field_id ) . '-font-weight" class="ut-ui-form-select ut-ui-select ' . esc_attr( $field_class ) . '">';
                        
                        echo '<option value="">font-weight</option>';
                        
                        foreach ( ot_recognized_font_weights( $field_id ) as $key => $value ) {
                            
                            echo '<option value="' . esc_attr( $key ) . '" ' . selected( $font_weight, $key, false ) . '>' . esc_attr( $value ) . '</option>';
                        
                        }
                        
                    echo '</select>';
                
                echo '</div>';
                
                
            }

            /* build text decoration */
            if ( in_array( 'text-decoration', $ot_recognized_typography_fields ) ) {
                
                $text_decoration = isset( $field_value['text-decoration'] ) ? esc_attr( $field_value['text-decoration'] ) : '';
                    
                echo '<div class="ut-ui-select-field">';
                
                    echo '<select name="' . esc_attr( $field_name ) . '[text-decoration]" id="' . esc_attr( $field_id ) . '-text-decoration" class="ut-ui-form-select ut-ui-select ' . esc_attr( $field_class ) . '">';
                        
                        echo '<option value="">text-decoration</option>';
                        
                        foreach ( ot_recognized_text_decorations( $field_id ) as $key => $value ) {
                            
                            echo '<option value="' . esc_attr( $key ) . '" ' . selected( $text_decoration, $key, false ) . '>' . esc_attr( $value ) . '</option>';
                            
                        }
                        
                    echo '</select>';
                
                echo '</div>';
                
                
            }
            
            /* build text transform */
            if ( in_array( 'text-transform', $ot_recognized_typography_fields ) ) {
                
                $text_transform = isset( $field_value['text-transform'] ) ? esc_attr( $field_value['text-transform'] ) : '';
                
                echo '<div class="ut-ui-select-field">';
                
                    echo '<select name="' . esc_attr( $field_name ) . '[text-transform]" id="' . esc_attr( $field_id ) . '-text-transform" class="ut-ui-form-select ut-ui-select ' . esc_attr( $field_class ) . '">';
                    
                        echo '<option value="">text-transform</option>';
                        
                        foreach ( ot_recognized_text_transformations( $field_id ) as $key => $value ) {
                            
                            echo '<option value="' . esc_attr( $key ) . '" ' . selected( $text_transform, $key, false ) . '>' . esc_attr( $value ) . '</option>';
                            
                        }
                        
                    echo '</select>';
                    
                echo '</div>';
                
              
            }
        
        echo '</div>';
        
    }
  
}



/**
 * Upload Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_upload' ) ) {
  
    function ot_type_upload( $args = array() ) {
    
        /* turns arguments array into variables */
        extract( $args );
      	
		$post_id = !empty( $post_id ) ? $post_id : '';
		
        /* build upload */
        echo '<div class="ut-ui-upload-parent ' . esc_attr( $field_class ) . '">';
          
            /* input */
            echo '<input type="text" name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '" value="' . esc_attr( $field_value ) . '" class="ut-ui-form-input ut-ui-upload-input" autocomplete="off" />';
          
            /* add media button */
            echo '<button class="ut-media-upload ut-ui-button ut-single-media-upload" rel="' . $post_id . '" title="' . __( 'Add Media', 'unitedthemes' ) . '">' . __( 'Add Media', 'unitedthemes' ) . '</button>';
        
        echo '</div>';
        
        /* media */
        if ( $field_value ) {
        
            echo '<div id="' . esc_attr( $field_id ) . '_media" class="ut-ui-media-wrap ut-single-media-upload">';
          
                if ( preg_match( '/\.(?:jpe?g|png|svg|gif|ico)$/i', $field_value ) ) {
                    
					echo '<div class="ut-ui-image-wrap"><img src="' . esc_url( $field_value ) . '" alt="" /></div>';
					
                }
                
                echo '<button class="ut-ui-remove-media ut-ui-button" title="' . __( 'X', 'unitedthemes' ) . '">' . __( 'X', 'unitedthemes' ) . '</button>';
            
            echo '</div>';
          
        }
    
    }
  
}

/**
 * Upload Option Type. Connect to WordPress Customizer
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_upload_customizer' ) ) {
  
    function ot_type_upload_customizer( $args = array() ) {
    
        /* turns arguments array into variables */
        extract( $args );
    
        /* get option from theme mod */
        $field_value = get_theme_mod($field_id);
        
        /* build upload */
        echo '<div class="ut-ui-upload-parent">';
          
            /* input */
            echo '<input type="text" name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '" value="' . esc_attr( $field_value ) . '" class="ut-ui-form-input ut-ui-upload-input ' . esc_attr( $field_class ) . '" />';
          
            /* add media button */
            echo '<button class="ut-media-upload ut-ui-button ut-single-media-upload" rel="' . $post_id . '" title="' . __( 'Add Media', 'unitedthemes' ) . '">' . __( 'Add Media', 'unitedthemes' ) . '</button>';
        
        echo '</div>';
        
        /* media */
        if ( $field_value ) {
        
          echo '<div id="' . esc_attr( $field_id ) . '_media" class="ut-ui-media-wrap ut-single-media-upload">';
          
            if ( preg_match( '/\.(?:jpe?g|png|svg|gif|ico)$/i', $field_value ) ) {
                echo '<div class="ut-ui-image-wrap"><img src="' . esc_url( $field_value ) . '" alt="" /></div><div class="clear"></div>';
            }
            
            echo '<button class="ut-ui-remove-media ut-ui-button" title="' . __( 'X', 'unitedthemes' ) . '">' . __( 'X', 'unitedthemes' ) . '</button>';
            
          echo '</div>';
          
        }
    
    }
  
}

/**
 * Border Settings
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     5.0.0
 * @version   1.0.0
 */
if ( ! function_exists( 'ot_type_border' ) ) {
    
    function ot_type_border( $args = array() ) {
        
        extract( $args );
        
        // allow fields to be filtered
        $ut_recognized_border_fields = apply_filters( 'ut_recognized_border_fields', array( 
            'top', 
            'right',
            'bottom', 
            'left',
            'padding',
            'border-style',
            'border-color',
            'border-width'
        ), $field_id );
        
        $border_min_width = apply_filters( 'ut_recognized_border_min_width', 1, $field_id );
		$border_max_width = apply_filters( 'ut_recognized_border_max_width', 20, $field_id );		
		
        $directions = array(
            'top'       => esc_html__( 'Top', 'unitedthemes'),
            'right'     => esc_html__( 'Right', 'unitedthemes'),
            'bottom'    => esc_html__( 'Bottom', 'unitedthemes'),
            'left'      => esc_html__( 'Left', 'unitedthemes'),
        );
        
        // default grid for all 4 fields
        $fields_grid = 'grid-25';
        $fields_count = in_array( 'padding', $ut_recognized_border_fields ) + in_array( 'border-style', $ut_recognized_border_fields ) + in_array( 'border-color', $ut_recognized_border_fields ) + in_array( 'border-width', $ut_recognized_border_fields ); 
        
        if( $fields_count == 3 ) {            
            $fields_grid = 'grid-33';            
        }
        
        if( $fields_count == 2 ) {            
            $fields_grid = 'grid-50';            
        }
        
        if( $fields_count == 1 ) {            
            $fields_grid = 'grid-100';            
        }
        
        foreach( $directions as $key => $direction ) {
            
            if( !in_array( $key, $ut_recognized_border_fields ) )  {
                continue;
            }
            
            $value = !empty( $field_value['border-' . $key . '-color'] ) ? $field_value['border-' . $key . '-color'] : '';
            
            echo '<div class="' . $fields_grid . '">';
                
                echo '<label>' . sprintf( esc_html__( 'Border %s Color', 'unitedthemes' ), $direction ) . '</label>';
                 
                echo '<div class="ut-minicolors-wrap">';
                
                    echo '<input data-mode="rgb" type="text" name="' . esc_attr( $field_name ) . '[border-' . $key . '-color]" id="' . esc_attr( $field_id ) . '-border-' . $key . '-color" value="' . esc_attr( $value ) . '" class="ut-ui-form-input ut-minicolors minicolors-input ut-color-mode-' . esc_attr( $field_mode ) . ' ' . esc_attr( $field_class ) . '" autocomplete="off" />';                  
                    echo '<span class="ut-minicolors-swatch" style="background-color:' . esc_attr( $value ) . ';"></span>';            
                    
                echo '</div>';
            
            echo '</div>';
            
            if( in_array( 'border-style', $ut_recognized_border_fields ) )  {
            
                $value = !empty( $field_value['border-' . $key . '-style'] ) ? $field_value['border-' . $key . '-style'] : '';

                echo '<div class="' . $fields_grid . '">';

                    echo '<div class="ut-ui-select-field">';

                        echo '<label>' . sprintf( esc_html__( 'Border %s Style', 'unitedthemes' ), $direction ) . '</label>';

                        echo '<select autocomplete="off" name="' . esc_attr( $field_name ) . '[border-' . $key . '-style]" id="' . esc_attr( $field_id ) . '-border-' . $key . '-style" class="ut-ui-form-select ut-ui-select ' . esc_attr( $field_class ) . '">';

                            echo '<option value="">border-style</option>';

                            foreach ( ot_recognized_border_styles( $field_id ) as $skey => $svalue ) {

                                echo '<option value="' . esc_attr( $skey ) . '" ' . selected( $value, $skey, false ) . '>' . esc_attr( $svalue ) . '</option>';

                            }

                        echo '</select>';

                    echo '</div>';

                echo '</div>';
                
            }
            
            if( in_array( 'border-width', $ut_recognized_border_fields ) )  {
            
                $value = !empty( $field_value['border-' . $key . '-width'] ) ? $field_value['border-' . $key . '-width'] : 0;

                echo '<div class="' . $fields_grid . '">';

                    echo '<div class="ut-numeric-slider-outer-wrap">';

                        echo '<label for="' . esc_attr( $field_id ) . '-border-' . $key . '-width">' . sprintf( esc_html__( 'Border %s Width', 'unitedthemes' ), $direction ) . '</label>';

                        echo '<div class="ut-numeric-slider-wrap">';

                            echo '<input autocomplete="off" type="hidden" name="' . esc_attr( $field_name ) . '[border-' . $key . '-width]" id="' . esc_attr( $field_id ) . '-border-' . $key . '-width" class="ut-numeric-slider-hidden-input" value="' . ( isset( $field_value['border-' . $key . '-width'] ) ? esc_attr( $field_value['border-' . $key . '-width'] ) : '' ) . '" data-min="' . esc_attr( $border_min_width ) . '" data-max="' . esc_attr( $border_max_width ) . '" data-step="1">';

                            echo '<input min="1" max="' . esc_attr( $border_max_width ) . '" type="input" class="ut-ui-form-input ut-numeric-slider-helper-input" data-tooltip="' . esc_html__( 'Max Value:', 'unitedthemes' ) . ' ' . esc_attr( $border_max_width ) . '" value="' . esc_attr( $value ) . '" autocomplete="off">';
                            echo '<div id="ut_numeric_slider_' . esc_attr( $field_id ) . '_border_radius" class="ut-numeric-slider ui-slider ui-slider-horizontal"></div>';

                        echo '</div>';

                    echo '</div>';

                echo '</div>';
            
            }
                
            if( in_array( 'padding', $ut_recognized_border_fields ) )  {
            
                $value = !empty( $field_value['padding-' . $key] ) ? $field_value['padding-' . $key] : 0;

                echo '<div class="' . $fields_grid . '">';

                    echo '<div class="ut-numeric-slider-outer-wrap">';

                        echo '<label for="' . esc_attr( $field_id ) . '-padding-' . $key . '">' . sprintf( esc_html__( 'Padding %s', 'unitedthemes' ), $direction ) . '</label>';

                        echo '<div class="ut-numeric-slider-wrap">';

                            echo '<input autocomplete="off" type="hidden" name="' . esc_attr( $field_name ) . '[padding-' . $key . ']" id="' . esc_attr( $field_id ) . '-padding-' . $key . '" class="ut-numeric-slider-hidden-input" value="' . esc_attr( $value ) . '" data-min="0" data-max="40" data-step="1">';

                            echo '<input min="0" max="40" type="input" class="ut-ui-form-input ut-numeric-slider-helper-input" data-tooltip="' . esc_html__( 'Max Value:', 'unitedthemes' ) . ' 40" value="' . esc_attr( $value ) . '" autocomplete="off">';
                            echo '<div id="ut_numeric_slider_' . esc_attr( $field_id ) . '_border_radius" class="ut-numeric-slider ui-slider ui-slider-horizontal"></div>';

                        echo '</div>';

                    echo '</div>';

                echo '</div>';                
            
            }
                
            echo '<div class="clear"></div>';

        }        
        
    }

}

/**
 * Frame Settings
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     5.0.0
 * @version   1.0.0
 */
if ( ! function_exists( 'ot_type_frame' ) ) {
    
    function ot_type_frame( $args = array() ) {
        
        extract( $args );
        
        $directions = array(
            'top'       => esc_html__( 'Top', 'unitedthemes'),
            'right'     => esc_html__( 'Right', 'unitedthemes'),
            'bottom'    => esc_html__( 'Bottom', 'unitedthemes'),
            'left'      => esc_html__( 'Left', 'unitedthemes'),
        );
        
        echo '<div class="ut-ui-select-group clearfix">';
        
        foreach( $directions as $key => $direction ) {
            
            $value = !empty( $field_value['margin-' . $key] ) ? $field_value['margin-' . $key] : 'on';
            
            echo '<div class="ut-ui-select-field">';

                echo '<label>' . sprintf( esc_html__( 'Show %s Frame', 'unitedthemes' ), $direction ) . '</label>';

                echo '<select autocomplete="off" name="' . esc_attr( $field_name ) . '[margin-' . $key . ']" id="margin-' . esc_attr( $field_id ) . '-' . $key . '" class="ut-ui-form-select ut-ui-select ' . esc_attr( $field_class ) . '">';

                    echo '<option value="on" ' . selected( $value, 'on', false ) . '>' . esc_html__( 'yes, please!', 'unitedthemes' ) . '</option>';
                    echo '<option value="off" ' . selected( $value, 'off', false ) . '>' . esc_html__( 'no, thanks!', 'unitedthemes' ) . '</option>';

                echo '</select>';

            echo '</div>';

        }
        
        echo '</div>';
        
    }

}


/**
 * Spacing Settings
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     5.0.0
 * @version   1.0.0
 */
if ( ! function_exists( 'ot_type_spacing' ) ) {
    
    function ot_type_spacing( $args = array() ) {
        
        extract( $args );
        
        $_options = explode( ',', $field_min_max_step );
        $min  = $_options[0] ?? 0;
        $max  = $_options[1] ?? 100;
        $step = $_options[2] ?? 1;
        
        $directions = array(
            'top'       => esc_html__( 'Top', 'unitedthemes'),
            'right'     => esc_html__( 'Right', 'unitedthemes'),
            'bottom'    => esc_html__( 'Bottom', 'unitedthemes'),
            'left'      => esc_html__( 'Left', 'unitedthemes'),
        );
        
        echo '<div class="ut-ui-select-group clearfix">';
        
        foreach( $directions as $key => $direction ) {
            
            $value = !empty( $field_value['padding-' . $key] ) ? $field_value['padding-' . $key] : '0';
            
            echo '<div class="grid-50">';
            
                echo '<div class="ut-numeric-slider-outer-wrap">';

                    echo '<label for="' . esc_attr( $field_id ) . '-padding-' . $key . '">' . sprintf( esc_html__( 'Padding %s', 'unitedthemes' ), $direction ) . '</label>';

                    echo '<div class="ut-numeric-slider-wrap">';

                        echo '<input autocomplete="off" type="hidden" name="' . esc_attr( $field_name ) . '[padding-' . $key . ']" id="' . esc_attr( $field_id ) . '-padding-' . $key . '" class="ut-numeric-slider-hidden-input" value="' . esc_attr( $value ) . '" data-min="' . esc_attr( $min ) . '" data-max="' . esc_attr( $max ) . '" data-step="' . esc_attr( $step ) . '">';

                        echo '<input min="' . esc_attr( $min ) . '" max="' . esc_attr( $max ) . '" type="input" class="ut-ui-form-input ut-numeric-slider-helper-input" data-tooltip="' . esc_html__( 'Max Value:', 'unitedthemes' ) . ' 2" value="' . esc_attr( $value ) . '" autocomplete="off">';
                        echo '<div id="ut_numeric_slider_' . esc_attr( $field_id ) . '_padding" class="ut-numeric-slider ui-slider ui-slider-horizontal"></div>';

                    echo '</div>';

                echo '</div>';
            
            echo '</div>';

        }
        
        echo '</div>';
        
    }

}


/**
 * Link Option Type.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     4.7.4
 * @version   1.0 
 */

if ( ! function_exists( 'ot_type_link' ) ) {
  
    function ot_type_link( $args = array() ) {
        
        extract( $args );
        
        if( function_exists('vc_parse_multi_attribute') ) {
            
            $link = vc_parse_multi_attribute( $field_value, array( 'url' => '', 'title' => '', 'target' => '', 'rel' => '' ) );
            
            echo '<div class="ut-link">';

                echo '<input type="text" name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '" value="' . htmlentities( $field_value, ENT_QUOTES, 'utf-8' ) . '" class="ut-ui-form-input ut-hide ut-link-input ' . esc_attr( $field_class ) . '" data-json="' . htmlentities( json_encode( $link ), ENT_QUOTES, 'utf-8' ) . '"  />';

                echo '<ul class="ut-link-list">';
                    echo '<li class="ut-link-label">' . __( 'Title', 'unitedthemes' ) . ':</li>';
                    echo '<li class="ut-link-label-title">' . $link['title'] . '</li>';
                echo '</ul>';
            
                echo '<ul class="ut-link-list">';
                    echo '<li class="ut-link-label">' . __( 'URL', 'unitedthemes' ) . ':</li>';
                    echo '<li class="ut-link-label-url">' . $link['url'] . '</li>';
                echo '</ul>';
            
                echo '<ul class="ut-link-list">';
                    echo '<li class="ut-link-label">' . __( 'Target', 'unitedthemes' ) . ':</li>';
                    echo '<li class="ut-link-label-target">' . $link['target'] . '</li>';
                echo '</ul>';
            
                echo '<button data-id="' . esc_attr( $field_id ) . '" class="ut-ui-button ut-link-button">' . esc_html__( 'Select URL', 'unitedthemes' ) . '</button>';
            
            echo '</div>';
        
        } else {
            
            esc_html_e( 'Visual Composer Plugin is missing!' , 'unitedthemes' );
            
        } 
            
    }

}


/**
 * Toolbar Type.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     4.7.4
 * @version   1.0 
 */

if ( ! function_exists( 'ot_type_header_toolbar' ) ) {
	
	 function ot_type_header_toolbar( $args = array() ) {
			
		extract( $args );
		 
		$filtered_toolbar = $ot_recognized_toolbar = apply_filters( 'ot_recognized_toolbars', array( 
 			'search' 		=> '', 
			'shopping-cart' => '', 
			'user' 			=> '',
			'bars' 			=> '',
            'language'      => ''
        ), $field_id );	 
		 
		if( !empty( $field_value ) && is_array( $field_value ) ) { 
		 
			$ot_recognized_toolbar = array_merge( $field_value, $ot_recognized_toolbar ); 
		
		}
		 
		echo '<ul class="ut-sortable-header-toolbar">';
		 	
		 	foreach( $ot_recognized_toolbar as $tkey => $tool ) {
				
				if( !array_key_exists( $tkey, $filtered_toolbar ) ) {
					continue;
				}
				
				$checked = '';
				
				if( !empty( $field_value ) && is_array( $field_value ) ) {
				
					foreach( $field_value as $key => $value ) {
						
						if( $key == $tkey && $value == 'on' ) {
							
							$checked = 'checked';
							break;
							
						}	


					}				

				}
				
				$extra_badge = '';
				
				if( $tkey == 'shopping-cart' || $tkey == 'user' ) {
					$extra_badge = '<img class="ut-toolbar-woo-badge" src="' .  THEME_WEB_ROOT . '/admin/assets/images/woocommerce.png" title="woocommerce" alt="wocommerce" />';	
				}
				
                if( $tkey == 'language' ) {
					$extra_badge = '<img class="ut-toolbar-woo-badge" src="' .  THEME_WEB_ROOT . '/admin/assets/images/wpml.png" title="WPML" alt="WPML" />';	
				}
                
				echo '<li>';
					echo '<div class="ut-toolbar">' . $extra_badge . '<input ' . $checked . ' name="' . esc_attr( $field_name ) . '[' . $tkey . ']" type="checkbox" autocomplete="off" /><div class="ut-toolbar-type"><i class="fa fa-' . $tkey . '" aria-hidden="true"></i></div></div>';								
				echo '</li>';
				
			}

		echo '</ul>';
            
		 
	 }
	
}


/**
 * Group of sortable checkboxes Settings
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     5.1.4
 * @version   1.0.0
 */
if ( ! function_exists( 'ot_type_sortable_taxonomy_checkbox_group' ) ) {
    
    function ot_type_sortable_taxonomy_checkbox_group( $args = array() ) {
        
        extract( $args );
        
        $taxonomies = get_terms( $field_taxonomy , array( 'hide_empty' => false ) );
		$taxonomies = json_decode(json_encode($taxonomies), true);
        								
        /* loop through taxonomy */
        if( is_array( $taxonomies ) && !empty( $taxonomies ) ) {

            $data = maybe_unserialize( $field_value );
            $taxonomies = ot_order_tax_categories( $taxonomies , $data );
            
            echo '<ul class="ut-sortable-tax">';
            
            foreach( $taxonomies as $key => $item ){

                echo '<li>';
                    echo '<span class="ut-handle"><i class="fa fa-arrows-v"></i></span>';
                    echo '<div class="ut-checkbox-single"><input name="' . esc_attr( $field_name ) . '[' . $taxonomies[$key]['term_id'] . ']" type="checkbox" id="' . esc_attr( $field_name ) . '_' . $key . '" ' . ot_checked_array( $taxonomies[$key]['term_id'] , $data ) . ' /> <label for="' . esc_attr( $field_name ) . '_' . $key . '"><span>' . $taxonomies[$key]['name'] . '</span></label></div>';								
                    echo '<div class="clear"></div>';
                echo '</li>';							

            }
            
            echo '</ul>';
            
        } else { 

            echo '<div class="alert">' . __( 'No Portfolio Categories created yet!', 'unitedthemes' ) . '</div>'; 

        }
        
    }
    
}


/**
 * Select Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     4.9
 */

if ( ! function_exists( 'ot_type_nav_menus' ) ) {
  
    function ot_type_nav_menus( $args = array() ) {
    
        /* turns arguments array into variables */
        extract( $args );
		
		$nav_menus = get_terms('nav_menu');
		$nav_menu_locations = get_nav_menu_locations();
        
        // remove some menus already assigned to locations
        foreach( $nav_menu_locations as $menu_ID ) {
            
            foreach( $nav_menus as $key => $menu ) {
                
                // menu is already in use
                if( $menu->term_id == $menu_ID ) {
                    
                    unset( $nav_menus[$key] );
                    
                }                
                
            }            
            
        }
                
        echo '<div class="ut-ui-select-field">';
        
			if( !empty( $nav_menus ) && is_array( $nav_menus) ) {
		
				/* build select */
				echo '<select autocomplete="off" name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '" class="ut-ui-form-select ut-ui-select ' . esc_attr( $field_class ) . '">';
                    
                    echo '<option value="">' . __( 'Select Menu', 'unitedthemes' ) . '</option>';
                
					foreach ( $nav_menus as $nav_menu ) {

						echo '<option class="select-option-' . esc_attr( $nav_menu->term_id ) . '" value="' . esc_attr( $nav_menu->term_id ) . '"' . selected( $field_value, $nav_menu->term_id, false ) . '>' . esc_attr( $nav_menu->name ) . '</option>';

					}

				echo '</select>';        	
				
			} else {
			
				echo '<div class="alert">'.__( 'No Menu found, please create a menu first.', 'unitedthemes' ).'</div>'; 
				
			}
		
        echo '</div>';
    
    }
  
}


/**
 * Flush Transients Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     4.9
 */

if ( ! function_exists( 'ot_type_flush_transients' ) ) {
  
    function ot_type_flush_transients( $args = array() ) {
		
		/* turns arguments array into variables */
        extract( $args );
		
		echo '<button data-url="' . admin_url() . '/admin.php?page=ut_theme_options&purge_brooklyn_cache=1" type="button" id="' . esc_attr( $field_id ) . '" class="ut-ui-delete-transients ut-ui-button" rel="4" title="' . esc_html__( 'Clear Transients' , 'unitedthemes' ) .'">' . esc_html__( 'Clear Transients' , 'unitedthemes' ) .'</button>';
		
	}

}


/**
 * Select SVG Font
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     4.9.3
 */

if ( ! function_exists( 'ot_type_svg_font' ) ) {

    function ot_type_svg_font( $args = array() ) {

        /**
         * turns arguments array into variables
         *
         * @var $field_value
         */
        extract( $args );

        echo '<div class="ut-ui-select-field">';

            echo '<select name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '" class="ut-ui-form-select ut-ui-select ' . esc_attr( $field_class ) . '">';

                echo '<option value="">font-family</option>';

                $taxonomies = get_categories( array( 'hide_empty' => false, 'taxonomy' => 'unite_custom_fonts' ) );

                echo '<option value="raleway-bold-webfont" ' . selected( $field_value, 'raleway-bold-webfont', false ) . '>' . esc_html__( 'Raleway Bold', 'unitedthemes' ) . '</option>';
                echo '<option value="raleway-extralight-webfont" ' . selected( $field_value, 'raleway-extralight-webfont', false ) . '>' . esc_html__( 'Raleway Extralight', 'unitedthemes' ) . '</option>';
                echo '<option value="raleway-light-webfont" ' . selected( $field_value, 'raleway-light-webfont', false ) . '>' . esc_html__( 'Raleway Light', 'unitedthemes' ) . '</option>';
                echo '<option value="raleway-medium-webfont" ' . selected( $field_value, 'raleway-medium-webfont', false ) . '>' . esc_html__( 'Raleway Medium', 'unitedthemes' ) . '</option>';
                echo '<option value="raleway-regular-webfont" ' . selected( $field_value, 'raleway-regular-webfont', false ) . '>' . esc_html__( 'Raleway Regular', 'unitedthemes' ) . '</option>';
                echo '<option value="raleway-semibold-webfont" ' . selected( $field_value, 'raleway-semibold-webfont', false ) . '>' . esc_html__( 'Raleway Semibold', 'unitedthemes' ) . '</option>';

                if ( $taxonomies ) {

                    foreach( $taxonomies as $taxonomy ) {

                        echo '<option value="' . esc_attr( $taxonomy->term_id ) . '"' . selected( $field_value, $taxonomy->term_id, false ) . '>' . esc_attr( $taxonomy->name ) . '</option>';

                    }

                }

            echo '</select>';

        echo '</div>';



    }

}


/**
 * Upload Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     4.9.5
 */

if ( ! function_exists( 'ot_type_upload_id' ) ) {

    function ot_type_upload_id( $args = array() ) {

        /* turns arguments array into variables */
        extract( $args );

        $post_id = !empty( $post_id ) ? $post_id : '';

        /* build upload */
        echo '<div class="ut-ui-upload-parent ' . esc_attr( $field_class ) . '">';

            /* input */
            echo '<input type="hidden" name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '" value="' . esc_attr( $field_value ) . '" class="ut-ui-form-input ut-ui-upload-input" autocomplete="off" />';

            echo '<div id="' . esc_attr( $field_id ) . '_media" class="ut-ui-media-wrap ut-single-media-upload-id">';

            /* media */
            if ( !empty( $field_value ) ) {

                echo '<div class="ut-ui-image-wrap"><img src="' . wp_get_attachment_url( $field_value, 'large' ) . '"></div>';
                echo '<button class="ut-ui-remove-media ut-ui-remove-media-id ut-ui-button" title="' . __( 'X', 'unitedthemes' ) . '">' . __( 'X', 'unitedthemes' ) . '</button>';

            }

            echo '</div>';

            /* add media button */
            echo '<button class="ut-media-upload ut-media-upload-id ut-ui-button ut-single-media-upload" rel="' . $post_id . '" title="' . __( 'Add Media', 'unitedthemes' ) . '">' . __( 'Add Media', 'unitedthemes' ) . '</button>';

        echo '</div>';


    }

}



/**
 * Custom Post Type Checkbox Option Type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_custom_post_types_checkbox' ) ) {

	function ot_type_custom_post_types_checkbox( $args = array() ) {

		/* turns arguments array into variables */
		extract( $args );

		/* query posts array */
		$post_types = apply_filters( 'ot_type_custom_post_types_checkbox_query', get_post_types(), $field_id );

		/* has posts */
		if ( is_array( $post_types ) && ! empty( $post_types ) ) {

			foreach( $post_types as $post_type ){

				echo '<p>';
				echo '<input type="checkbox" name="' . esc_attr( $field_name ) . '[' . esc_attr( $post_type ) . ']" id="' . esc_attr( $field_id ) . '-' . esc_attr( $post_type ) . '" value="' . esc_attr( $post_type ) . '" ' . ( isset( $field_value[$post_type] ) ? checked( $field_value[$post_type], $post_type, false ) : '' ) . ' class="ut-ui-form-checkbox ut-ui-checkbox ' . esc_attr( $field_class ) . '" />';
				echo '<label for="' . esc_attr( $field_id ) . '-' . esc_attr( $post_type ) . '">' . $post_type . '</label>';
				echo '</p>';

			}

		} else {

			echo '<p>' . __( 'No Custom Post Types Found', 'unitedthemes' ) . '</p>';

		}

	}

}