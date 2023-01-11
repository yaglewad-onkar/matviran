<?php 

if( !function_exists('ut_metabox_portfolio_image_settings') ) :
    
    add_action( 'admin_init', 'ut_metabox_portfolio_image_settings' );
    
    function ut_metabox_portfolio_image_settings() {
        
        $ut_metabox_portfolio_image_settings = array(
            
            'id'          => 'ut_metabox_portfolio_image_settings',
            'title'       => 'Showcase Settings',
            'desc'        => 'Only affects portfolio items inside <br /><strong>Filterable Portfolio with Packery!</strong>',
            'pages'       => array( 'portfolio' ),
            'type'        => 'simple',
            'context'     => 'side',
            'priority'    => 'low',
            'fields'      => array(
                                
                array(
                    'id'          => 'ut_showcase_image_size',
                    'label'       => 'Showcase Image Size',
                    'type'        => 'select',
                    'std'		  => 'global',
                    'choices'     => array(     
                        array(
                            'value'       => 'standard',
                            'label'       => 'Standard'
                        ),
                        array(
                            'value'       => 'portrait',
                            'label'       => 'Portrait'
                        ),
                        array(
                            'value'       => 'panorama',
                            'label'       => 'Panorama'
                        ),
                        array(
                            'value'       => 'xxl',
                            'label'       => 'Extra Large'
                        ),
                     ),
                ),
                
                array(
                    'id'          => 'ut_showcase_custom_title',
                    'label'       => 'Custom Hover Text',
                    'type'        => 'text',
                ),
                

            )
        
        );
        
        ot_register_meta_box( $ut_metabox_portfolio_image_settings );
        
    }
    
endif;      


if( !function_exists('ut_metabox_portfolio_filter_settings') ) :
    
    //add_action( 'admin_init', 'ut_metabox_portfolio_filter_settings' );
    
    function ut_metabox_portfolio_filter_settings() {
        
        $ut_metabox_portfolio_filter_settings = array(
            
            'id'          => 'ut_metabox_portfolio_filter_settings',
            'title'       => 'Filter Settings',
            'desc'        => '',
            'pages'       => array( 'portfolio' ),
            'type'        => 'simple',
            'context'     => 'side',
            'priority'    => 'low',
            'fields'      => array(
            	
                array(
                    'id' => 'ut_portfolio_new',
                    'type' => 'switch',
                    'label' => 'Mark as "New"',
                ),
				array(
                    'id' => 'ut_portfolio_hot',
                    'type' => 'switch',
                    'label' => 'Mark as "HOT"',
                ),
                array(
                    'id' => 'ut_portfolio_updated',
                    'type' => 'switch',
                    'label' => 'Mark as "UPDATED"',
                ),    
            	array(
                    'id' => 'ut_portfolio_latest',
                    'type' => 'switch',
                    'label' => 'Mark as "LATEST"',
                ),
				array(
                    'id' => 'ut_portfolio_upcoming',
                    'type' => 'switch',
                    'label' => 'Mark as "UPCOMING"',
                ),
				array(
                    'id' => 'ut_portfolio_update_progress',
                    'type' => 'switch',
                    'label' => 'Mark as "UPDATE IN PROGRESS"',
                ),
				

            )
        
        );
        
        ot_register_meta_box( $ut_metabox_portfolio_filter_settings );
        
    }
    
endif; 

?>