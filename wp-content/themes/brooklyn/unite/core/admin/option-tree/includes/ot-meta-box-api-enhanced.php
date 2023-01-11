<?php

if ( !defined( 'UT_THEME_VERSION' ) )exit( 'No direct script access allowed' );

if ( !class_exists( 'OT_Meta_Box_Enhanced' ) ) {

    class OT_Meta_Box_Enhanced extends OT_Meta_Box {

        /**
         * Prepare Option Args
         *
         * @return    array
         *
         * @access    public
         * @since     4.5.4
         */
        function prepare_option_args( $field, $field_value, $post_ID ) {

            $option_args = array(
                'type' => $field['type'],
                'field_id' => $field['id'],
                'field_name' => $field['id'],
                'field_name_key' => $field['name_key'] ?? '',
                'field_toplevel' => isset($field['toplevel']) && $field['toplevel'] ? $field['toplevel'] : '',
                'field_list_title' => !(isset($field['list_title']) && !$field['list_title']),
                'field_value' => $field_value,
                'field_global' => $field['global'] ?? '',
                'field_prefix' => $field['prefix'] ?? 'ut_page_',
                'field_desc' => $field['desc'] ?? '',
                'field_label' => $field['label'] ?? '',
                'field_htmldesc' => $field['htmldesc'] ?? '',
                'field_std' => $field['std'] ?? '',
                'field_max' => $field['max'] ?? '3',
                'field_rows' => isset($field['rows']) && !empty($field['rows']) ? $field['rows'] : 10,
                'field_post_type' => isset($field['post_type']) && !empty($field['post_type']) ? $field['post_type'] : 'post',
                'field_min_max_step' => isset($field['min_max_step']) && !empty($field['min_max_step']) ? $field['min_max_step'] : '0,100,1',
                'field_class' => $field['class'] ?? '',
                'field_choices' => $field['choices'] ?? array(),
                'field_settings' => isset($field['settings']) && !empty($field['settings']) ? $field['settings'] : array(),
                'field_mode' => !empty($field['mode']) ? $field['mode'] : 'hex',
                'field_position' => !empty($field['position']) ? $field['position'] : 'bottom left',
                'field_markup' => !empty($field['markup']) ? $field['markup'] : '12_12',
                'field_taxonomy' => !empty($field['taxonomy']) ? $field['taxonomy'] : '',
                'field_relation' => !empty($field['relation']) ? $field['relation'] : '',
                'post_id' => $post_ID,
                'meta' => true
            );
            
            if ( !empty( $field['multikey'] ) ) {
                $option_args['field_name'] = $field['multikey'] . '[' . $field['id'] . ']';
            }
            
            return $option_args;

        }
        
        
        /**
         * Create Metabox Panel Headline
         *
         * @return    string
         *
         * @access    public
         * @since     4.5.4
         */        
        function panel_headline( $_args, $dependency ) {
            
            echo '<div id="setting_' . esc_attr( $_args['field_id'] ) . '" class="ut-panel-headline" ' . ut_create_dependency( $dependency ) . '>';
                    
                ot_display_by_type( $_args );

            echo '</div>';
            
        }
        
        
        /**
         * Create Metabox Section Headline
         *
         * @return    string
         *
         * @access    public
         * @since     4.5.4
         */        
        function section_headline( $_args, $dependency ) {
            
            if ( $this->panel_list_open ) {

                echo '</ul>';
                $this->panel_list_open = false;

            }

            echo '<div id="setting_' . esc_attr( $_args['field_id'] ) . '" class="ut-section-headline" ' . ut_create_dependency( $dependency ) . '>';

                ot_display_by_type( $_args );

            echo '</div>';
            
        }
        
        
        /**
         * Create Metabox Section Headline Infobox
         *
         * @return    string
         *
         * @access    public
         * @since     4.5.4
         */        
        function section_headline_info( $_args, $dependency ) {
            
            echo '<div id="setting_' . esc_attr( $_args[ 'field_id' ] ) . '" class="ut-panel-infoheadline" ' . ut_create_dependency( $dependency ) . '>';

                ot_display_by_type( $_args );

            echo '</div>';
                        
        }
        
        
        /**
         * Create Metabox Sub Section Headline
         *
         * @return    string
         *
         * @access    public
         * @since     4.5.4
         */        
        function sub_section_headline( $_args, $dependency ) {
            
            if( $this->panel_list_open ) {

                echo '</ul>';
                $this->panel_list_open = false;

            }

            echo '<div id="setting_' . esc_attr( $_args[ 'field_id' ] ) . '" class="ut-section-sub-headline" ' . ut_create_dependency( $dependency ) . '>';

                ot_display_by_type( $_args );

            echo '</div>';
            
            
            
        }
        
        
        /**
         * Prepare Metabox Option
         *
         * @return    string
         *
         * @access    public
         * @since     4.5.4
         */        
        function meta_box_option( $post, $field ) {

            // get current post meta data
            if ( !empty( $field['multikey'] ) ) {
                
                $all_meta = get_post_meta( $post->ID, $field['multikey'], true );
                $field_value = !empty( $all_meta[$field['id']] ) ? $all_meta[$field['id']] : '';                                
                
            } else {
                
                $all_meta = get_post_meta( $post->ID );
                $field_value = get_post_meta( $post->ID, $field['id'], true );                
                
            }
            
            // set standard value
            if ( isset( $field['std'] ) ) {                
                $field_value = ot_filter_meta_std_value( $field_value, $field[ 'std' ], $field['id'], $all_meta, $field['type'] );                
            }

            // build the arguments array
            $_args = $this->prepare_option_args( $field, $field_value, $post->ID );
            
            // extra classes
            $classes   = array();
            $classes[] = 'grid-100 grid-parent ut-panel-section';
            $classes[] = !empty( $field[ "section_class" ] ) ? $field[ "section_class" ] : '';

            // field dependency
            $dependency = !empty( $field[ 'required' ] ) ? $field[ 'required' ] : '';
            
            // section field sizes
            $section_classes = 'grid-50 tablet-grid-100 mobile-grid-100';

            if( isset( $field['markup'] ) && $field[ 'markup' ] == '1_1' ) {

                $section_classes = 'grid-100 tablet-grid-100 mobile-grid-100 ut-panel-description-full';

            }
            
            // start section output depending on field type
            if( method_exists( $this, $field['type'] ) ) {
                 
                $this->{$field['type']}( $_args, $dependency );     
                 
            } else {
                
                if ( !$this->panel_list_open ) {

                    echo '<ul class="ut-panel-list">';
                    $this->panel_list_open = true;

                }

                echo '<li class="' . ( $_args['field_breakpoint_support'] ? 'ut-visible-for-breakpoints' : '' ) . '" ' . ut_create_dependency( $dependency ) . '>';

                    echo '<div id="setting_' . $_args[ 'field_id' ] . '" class="' . implode( ' ', $classes ) . '">';
                    
                        echo '<div class="grid-100 tablet-grid-100 mobile-grid-100">';

                            echo '<h3 class="ut-single-option-title">';
                                echo $field[ 'label' ];
                            echo '</h3>';

                        echo '</div>';

                        echo '<div class="' . $section_classes . '">';

                            echo '<div class="ut-panel-description">';

                                if ( isset( $field[ 'desc' ] ) ) {

                                    echo wp_specialchars_decode( $field[ 'desc' ] );

                                }

                            echo '</div>';

                        echo '</div>';

                        echo '<div class="' . $section_classes . '">';

                            echo ot_display_by_type( $_args );

                        echo '</div>';

                    echo '</div>';

                echo '</li>';
                
            }            

        }
        
    }

}

/**
 * This method instantiates the meta box class & builds the UI.
 *
 * @uses     OT_Meta_Box()
 * @uses     OT_Meta_Box_Enhanced()
 *
 * @param    array    Array of arguments to create a meta box
 * @return   void
 *
 * @access   public
 * @since    4.5.4
 */
if ( !function_exists( 'ot_register_enhanced_meta_box' ) ) {

    function ot_register_enhanced_meta_box( $args ) {

        if ( !$args ) {
            return;
        }

        $ot_meta_box_enhanced = new OT_Meta_Box_Enhanced( $args );
        add_action( 'wp_ajax_set_global_flag', array( $ot_meta_box_enhanced, 'set_global_flag' ) );

    }

}