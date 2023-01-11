<?php

if ( !function_exists( 'ut_bklyn_portfolio_manager_settings' ) ):

    function ut_bklyn_portfolio_manager_settings() {
        
        $settings = apply_filters( 'ut_bklyn_portfolio_manager_settings', array(
            
            'id'        => 'ut-metapanel',
            'title'     => 'United Themes - Showcase Settings',
            'pages'     => array( 'portfolio-manager' ),
            'context'   => 'normal',
            'type'      => 'tabs',
            'priority'  => 'low',
            
            // panel sections
            'sections'  => array(
                array(
                    'id'    => 'ut-showcase-settings',
                    'title' => 'Showcase Settings'
                ),
	            array(
		            'id'    => 'ut-general-settings',
		            'title' => 'General Settings'
	            ),
                array(
                    'id'    => 'ut-react-carousel-settings',
                    'title' => 'React Carousel Showcase Settings',
                    'subsection' => array(
	                    array(
		                    'title' => 'Carousel Options',
		                    'id' => 'ut-react-carousel-options'
	                    ),
	                    array(
		                    'title' => 'Cell Content and Design',
		                    'id' => 'ut-react-cell-content'
	                    ),
	                    array(
		                    'title' => 'Title Settings',
		                    'id' => 'ut-react-title-settings'
	                    ),
                    	array(
		                    'title' => 'Colors',
		                    'id' => 'ut-react-carousel-colors'
	                    ),
                    ),
                    'required' => array(
	                    'ut_portfolio_type' => 'ut_react_carousel'
                    )
                ),

            ),
            
            // option fields
            'fields' => array(
                
                array(
                    'id'        => 'ut_showcase_settings',
                    'metapanel' => 'ut-showcase-settings',
                    'label'     => 'Showcase Settings',
                    'type'      => 'panel_headline',
                ),
            
                array(
                    'id'        => 'ut_portfolio_type',
                    'metapanel' => 'ut-showcase-settings',
                    'label'     => 'Showcase Type',
                    'desc'      => 'Select your desired portfolio type.',
                    'type'      => 'select',
                    'choices' => array(
                        
                        array(
                            'label' => 'Grid Gallery',
                            'value' => 'ut_masonry'
                        ),
	                    array(
                            'label' => 'Carousel Portfolio',
                            'value' => 'ut_carousel'
                        ),
	                    array(
		                    'label' => 'React Carousel',
		                    'value' => 'ut_react_carousel'
	                    ),
                        array(
                            'label' => 'Filterable Portfolio Gallery',
                            'value' => 'ut_gallery'
                        ),
	                    array(
		                    'label' => 'Filterable Portfolio Gallery (Packery)',
		                    'value' => 'ut_packery'
	                    ),
                        
                    ),                    
                ),
                
                 
                
                
                
                
                
                array(
                    'id'        => 'ut_portfolio_categories',
                    'metapanel' => 'ut-showcase-settings',
                    'label'     => 'Showcase Categories',
                    'desc'      => 'Select categories you like to connect to this showcase. Use the vertical double arrows to re-arrange their order. This order will also reflect on the portfolio filter.',
                    'type'      => 'sortable_taxonomy_checkbox_group',
                    'taxonomy'  => 'portfolio-category'
                ),
                
                array(
                    'id'        => 'posts_per_page',
                    'multikey'  => 'ut_portfolio_settings',
                    'metapanel' => 'ut-showcase-settings',
                    'label'     => 'Portfolio Items per Page',
                    'desc'      => 'Portfolio Items per page (default -1 for unlimted posts). This also defines the amount of items loaded when using the load more feature.',
                    'type'      => 'text',
                ),
            
                array(
                    'id'        => 'optional_class',
                    'multikey'  => 'ut_portfolio_settings',
                    'metapanel' => 'ut-showcase-settings',
                    'label'     => 'Optional Class',
                    'desc'      => 'Style this particular showcase element differently by adding your custom class name.',
                    'type'      => 'text',
                ),
            
                /* General Settings */
	            array(
		            'id'        => 'ut_general_setting_headline',
		            'label'     => 'Portfolio General Settings',
		            'type'      => 'panel_headline',
		            'metapanel' => 'ut-general-settings'
	            ),
	            array(
		            'id'        => 'background_color',
		            'multikey'  => 'ut_portfolio_settings',
		            'label'     => 'Portfolio Background Color',
		            'desc'      => 'Desired Background Color for Portfolio Showcase.',
		            'metapanel' => 'ut-general-settings',
		            'type'      => 'colorpicker',
		            'mode'      => 'rgb'

	            ),

	            /* React Carousel General Settings */
	            array(
		            'id'        => 'ut_react_carousel_setting_headline',
		            'label'     => 'React Carousel Options',
		            'type'      => 'panel_headline',
		            'metapanel' => 'ut-react-carousel-options'
	            ),
	            array(
		            'id'        => 'ut_react_carousel_info',
		            'metapanel' => 'ut-react-carousel-options',
		            'label'     => 'React Carousel Image Info',
		            'desc'      => 'This showcase requires portrait images with a resolution of at least 750x1125 px or higher with same aspect ratio.',
		            'type'      => 'section_headline_info',
	            ),
	            array(
		            'id'        => 'rotate',
		            'multikey'  => 'ut_react_carousel_options',
		            'metapanel' => 'ut-react-carousel-options',
		            'label'     => 'Rotate Carousel?',
		            'desc'      => 'Rotate Carousel. Note that this effect can cause overflow issues. Please check outer row / section overflow settings.',
		            'type'      => 'select',
		            'choices'   => array(
			            array(
				            'value' => 'off',
				            'label' => 'no, thanks!'
			            ),
			            array(
				            'value' => 'on',
				            'label' => 'yes, please!'
			            ),
		            ),
	            ),
	            array(
		            'id'        => 'navigation',
		            'multikey'  => 'ut_react_carousel_options',
		            'metapanel' => 'ut-react-carousel-options',
		            'label'     => 'Activate Carousel Navigation?',
		            'desc'      => 'An arrow navigation below the carousel. If rotate carousel is turned on, the alignment of this navigation is right.',
		            'type'      => 'select',
		            'choices'   => array(
			            array(
				            'value' => 'on',
				            'label' => 'yes, please!'
			            ),
			            array(
				            'value' => 'off',
				            'label' => 'no, thanks!'
			            ),

		            ),
	            ),
	            array(
		            'id'        => 'autoplay',
		            'multikey'  => 'ut_react_carousel_options',
		            'metapanel' => 'ut-react-carousel-options',
		            'label'     => 'Activate Autoplay?',
		            'desc'      => 'Automatically advances to the next cell. Auto-playing will pause when mouse is hovered over, and resume when mouse is hovered off. ',
		            'type'      => 'select',
		            'choices'   => array(
			            array(
				            'value' => 'on',
				            'label' => 'yes, please!'
			            ),
			            array(
				            'value' => 'off',
				            'label' => 'no, thanks!'
			            ),

		            ),
	            ),
	            array(
		            'id'        => 'autoplay_timer',
		            'multikey'  => 'ut_react_carousel_options',
		            'metapanel' => 'ut-react-carousel-options',
		            'label'     => 'Autoplay Timer',
		            'desc'      => 'Advance cells every {Number} milliseconds. Default: 3000',
		            'type'      => 'text',
		            'required' => array(
			            'ut_react_carousel_options[autoplay]' => 'on'
		            ),
	            ),
	            array(
		            'id'        => 'preloader',
		            'multikey'  => 'ut_react_carousel_options',
		            'metapanel' => 'ut-react-carousel-options',
		            'label'     => 'Activate Preloader?',
		            'desc'      => 'Display a percentage count up until react slider is loaded.',
		            'type'      => 'select',
		            'choices'   => array(
			            array(
				            'value' => 'off',
				            'label' => 'no, thanks!'
			            ),
		            	array(
				            'value' => 'on',
				            'label' => 'yes, please!'
			            ),
		            ),
	            ),
	            array(
		            'id'        => 'preloader_color',
		            'multikey'  => 'ut_react_carousel_options',
		            'metapanel' => 'ut-react-carousel-options',
		            'label'     => 'Preloader Color',
		            'desc'      => 'The text color of the preloader.',
		            'type'      => 'colorpicker',
		            'mode'      => 'rgb',
		            'required' => array(
			            'ut_react_carousel_options[preloader]' => 'on'
		            ),

	            ),

	            /* React Carousel Cell Settings */
	            array(
		            'id'        => 'ut_react_carousel_cell_setting_headline',
		            'label'     => 'React Carousel Options',
		            'type'      => 'panel_headline',
		            'metapanel' => 'ut-react-carousel-options'
	            ),
            
        
            )
        
        ) );
        
        // ot_register_enhanced_meta_box( $settings );
        
    }

    // add_action( 'admin_init', 'ut_bklyn_portfolio_manager_settings' );

endif;