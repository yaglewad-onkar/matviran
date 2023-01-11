<?php

if ( !function_exists( 'ut_bklyn_metabox_settings' ) ):

    function ut_bklyn_metabox_settings() {

        $post_type_support_1 = array( 'page', 'portfolio', 'product', 'post' );
        $post_type_support_2 = array( 'page', 'portfolio', 'product' );
        $post_type_support_3 = array( 'portfolio' );
        $post_type_support_4 = array( 'page' );
        $post_type_support_5 = array( 'page', 'product' );

        $settings = apply_filters( 'ut_bklyn_metabox_settings', array(

            'id' => 'ut-metapanel',
            'title' => 'Brooklyn - Metapanel',
            'pages' => array( 'page', 'portfolio', 'product', /*'post'*/ ),
            'context' => 'normal',
            'type' => 'tabs',
            'priority' => 'low',
            'sections' => array(

                array(
                    'id' => 'ut-portfolio-details',
                    'title' => 'Portfolio Details',
                ),
                array(
                    'id' => 'ut-hero-type',
                    'title' => 'Hero',
                    'data' => array(
                        'portfolio' => esc_html__( 'One Page Portfolio Type', 'unitedthemes' ),
                        'page' => esc_html__( 'Hero Type', 'unitedthemes' )
                    ),
                    'subsection' => array(
                        array(
                            'title' => 'General',
                            'id' => 'ut-hero-type-general',
                            'subsection' => array(
                                array(
                                    'title' => 'Type',
                                    'id' => 'ut-hero-type-general'
                                ),
                                array(
                                    'title' => 'Manage Video',
                                    'id' => 'ut-hero-video',
                                    'required' => array(
                                        'ut_activate_page_hero' => 'on',
                                        'ut_page_hero_type' => 'video'
                                    ),

                                ),
                                array(
                                    'title' => 'Manage Split Hero',
                                    'id' => 'ut-split-hero',
                                    'required' => array(
                                        'ut_activate_page_hero' => 'on',
                                        'ut_page_hero_type' => 'splithero'
                                    ),

                                ),
                                array(
                                    'title' => 'Manage Animated Image',
                                    'id' => 'ut-animated-image-hero',
                                    'required' => array(
                                        'ut_activate_page_hero' => 'on',
                                        'ut_page_hero_type' => 'animatedimage'
                                    ),

                                ),
                                array(
                                    'title' => 'Manage Slider',
                                    'id' => 'ut-slider-hero',
                                    'required' => array(
                                        'ut_activate_page_hero' => 'on',
                                        'ut_page_hero_type' => 'slider'
                                    ),

                                ),
                                array(
                                    'title' => 'Slider Navigation',
                                    'id' => 'ut-slider-hero-navigation',
                                    'required' => array(
                                        'ut_activate_page_hero' => 'on',
                                        'ut_page_hero_type' => 'slider'
                                    ),

                                ),
                                array(
                                    'title' => 'Manage Slider',
                                    'id' => 'ut-fancy-slider-hero',
                                    'required' => array(
                                        'ut_activate_page_hero' => 'on',
                                        'ut_page_hero_type' => 'transition'
                                    ),

                                ),
                                array(
                                    'title' => 'Manage Tabs',
                                    'id' => 'ut-tabs-hero',
                                    'required' => array(
                                        'ut_activate_page_hero' => 'on',
                                        'ut_page_hero_type' => 'tabs'
                                    ),

                                ),
                                array(
                                    'title' => 'Video Poster',
                                    'id' => 'ut-hero-video-poster',
                                    'required' => array(
                                        'ut_activate_page_hero' => 'on',
                                        'ut_page_hero_type' => 'video'
                                    ),

                                ),
                                array(
                                    'title' => 'Manage Audio',
                                    'id' => 'ut-hero-audio',
                                    'required' => array(
                                        'ut_activate_page_hero' => 'on',
                                        'ut_page_hero_type' => 'audio'
                                    ),

                                ),
                                array(
                                    'title' => 'Background Images',
                                    'id' => 'ut-hero-images',
                                    'required' => array(
                                        'ut_activate_page_hero' => 'on',
                                        'ut_page_hero_type' => 'image|splithero|tabs'
                                    ),

                                ),
                                array(
                                    'title' => 'Background Image Effects',
                                    'id' => 'ut-hero-type-background',
                                    'required' => array(
                                        'ut_activate_page_hero' => 'on',
                                        'ut_page_hero_type' => 'image|audio|splithero|tabs|imagefader|animatedimage|slider'
                                    ),

                                ),
                                array(
                                    'title' => 'Animation Settings',
                                    'id' => 'ut-hero-type-animation',
                                    'required' => array(
                                        'ut_activate_page_hero' => 'on',
                                        'ut_page_hero_type' => 'image|audio|video|animatedimage'
                                    ),
                                ),

                            )

                        ),

                        /* Hero Content */
                        array(
                            'id' => 'ut-hero-content-settings',
                            'title' => 'Caption',
                            'subsection' => array(

                                array(
                                    'title' => 'Position',
                                    'id' => 'ut-hero-caption-position-settings',
                                    'required' => array(
                                        'ut_activate_page_hero' => 'on',
                                        'ut_page_hero_type' => 'image|animatedimage|imagefader|video|audio|tabs|splithero',
                                    ),
                                ),
                                array(
                                    'title' => 'Animation',
                                    'id' => 'ut-hero-caption-animation-settings',
                                    'required' => array(
                                        'ut_activate_page_hero' => 'on',
                                        'ut_page_hero_type' => 'image|animatedimage|imagefader|video|audio|tabs|splithero',
                                    ),
                                ),
                                array(
                                    'title' => 'Style',
                                    'id' => 'ut-hero-caption-style-settings',
                                    'required' => array(
                                        'ut_activate_page_hero' => 'on',
                                        'ut_page_hero_type' => 'image|animatedimage|imagefader|video|audio|tabs|splithero',
                                    ),
                                ),
                                array(
                                    'title' => 'Custom Logo',
                                    'id' => 'ut-hero-content-custom-logo-settings',
                                    'required' => array(
                                        'ut_page_hero_type' => 'image|animatedimage|imagefader|video|audio|tabs|splithero',
                                    )
                                ),
                                array(
                                    'title' => 'Slogan',
                                    'id' => 'ut-hero-content-caption-slogan-settings',
                                    'required' => array(
                                        'ut_page_hero_type' => 'image|animatedimage|imagefader|video|tabs|splithero|transition|slider',
                                    )
                                ),
                                array(
                                    'title' => 'Title',
                                    'id' => 'ut-hero-content-caption-title-settings',
                                    'required' => array(
                                        'ut_page_hero_type' => 'image|animatedimage|imagefader|video|tabs|splithero|transition|slider',
                                    )
                                ),
                                array(
                                    'title' => 'Description',
                                    'id' => 'ut-hero-content-caption-description-settings',
                                    'required' => array(
                                        'ut_page_hero_type' => 'image|animatedimage|imagefader|video|tabs|splithero|transition|slider',
                                    )
                                ),
                                array(
                                    'title' => 'Buttons',
                                    'id' => 'ut-hero-content-button-settings',
                                    'required' => array(
                                        'ut_page_hero_type' => 'image|animatedimage|imagefader|video|tabs|splithero',
                                    )
                                ),
                                array(
                                    'title' => 'Custom HTML',
                                    'id' => 'ut-hero-content-custom-html-settings',
                                    'required' => array(
                                        'ut_page_hero_type' => 'image|animatedimage|imagefader|video|tabs|splithero',
                                    )
                                ),

                            ),
                            'required' => array(
	                            'ut_activate_page_hero' => 'on',
                            	'ut_page_hero_type' => 'image|video|animatedimage|imagefader|splithero|tabs|slider|transition',
                            )
                        ),

                        /* Hero Styling */
                        array(
                            'id' => 'ut-hero-styling',
                            'title' => 'Styling',
                            'subsection' => array(

                                array(
                                    'title' => 'Background',
                                    'id' => 'ut-hero-styling-background-settings'
                                ),
                                array(
                                    'title' => 'Overlay',
                                    'id' => 'ut-hero-styling-overlay-settings',
                                    'required' => array(
                                        'ut_page_hero_type' => 'image|video|animatedimage|imagefader|splithero|tabs|transition|slider',
                                    )
                                ),
                                array(
                                    'title' => 'Separator Top',
                                    'id' => 'ut-hero-styling-separator-top-settings',
                                    'required' => array(
                                        'ut_page_hero_type' => 'image|animatedimage|imagefader|splithero|video|custom',
                                    )
                                ),
                                array(
                                    'title' => 'Separator Bottom',
                                    'id' => 'ut-hero-styling-separator-bottom-settings',
                                    'required' => array(
                                        'ut_page_hero_type' => 'image|animatedimage|imagefader|splithero|video|custom',
                                    )
                                ),
                                array(
                                    'title' => 'Border',
                                    'id' => 'ut-hero-styling-border-settings',
                                    'required' => array(
	                                    'ut_page_hero_type' => 'image|animatedimage|imagefader|splithero|tabs|video|custom',
                                    ),
                                ),

                            ),
                            'required' => array(
	                            'ut_activate_page_hero' => 'on',
                            	'ut_page_hero_type' => 'image|video|animatedimage|imagefader|splithero|tabs|transition|slider|custom|cblock',
                            )
                        ),
                        /* array(
                            'title' => 'Video Settings',
                            'id' => 'ut-hero-type-video',
                            'required' => array(
                                'ut_activate_page_hero' => 'on',
                                'ut_page_hero_type' => 'video',
                            )
                        ),
                        array(
                            'title' => 'Audio Settings',
                            'id' => 'ut-hero-type-audio',
                            'required' => array(
                                'ut_activate_page_hero' => 'on',
                                'ut_page_hero_type' => 'audio',
                            )
                        ),*/
                    )
                ),

	            array(
		            'id' => 'ut-onpage-portfolio-settings',
		            'title' => 'Slide Up Portfolio Settings',
		            'data' => array(
			            'slideup'  => esc_html__( 'Slide Up Portfolio Settings', 'unitedthemes' ),
			            'lightbox' => esc_html__( 'Lightbox Portfolio Settings', 'unitedthemes' )
		            )
	            ),
	            array(
		            'id' => 'ut-portfolio-showcase-settings',
		            'title' => 'Portfolio Showcase Settings',
		            'subsection' => array(
			            array(
				            'title' => 'Portfolio Hover',
				            'id' => 'ut-portfolio-hover-settings',
			            ),
			            array(
				            'title' => 'Preview Video',
				            'id' => 'ut-portfolio-preview-video-settings',
			            ),
			            array(
				            'title' => 'React Carousel',
				            'id' => 'ut-portfolio-react-carousel-settings',
			            ),
		            )
	            ),

                /* Header and Navigation */
                array(
                    'id' => 'ut-header-settings',
                    'title' => 'Header & Navigation',
                    'ajax' => true,
                    'subsection_required' => array(
                        'ut_navigation_config' => 'off',
                        'test' => 'off'
                    ),
                    'subsection' => array(

                        array(
                            'title' => 'Settings',
                            'id' => 'ut-header-settings',
                            'required' => array(
                                'ut_navigation_config' => 'off'
                            ),
                        ),

                        array(
                            'title' => 'Extra Modules',
                            'id' => 'ut-header-extra-modules-settings',
                            'required' => array(
                                'ut_navigation_config' => 'off',
                                'ut_header_layout' => 'default',
                                'ut_header_top_layout' => 'style-2|style-5|style-6|style-7|style-8|style-9',
                            ),
                        ),

                        array(
                            'title' => 'Colors',
                            'id' => 'ut-header-color-settings',
                            'required' => array(
                                'ut_navigation_config' => 'off'
                            ),
                        ),

                        array(
                            'title' => 'Top Header',
                            'id' => 'ut-top-header-settings',
                            'required' => array(
                                'ut_navigation_config' => 'off'
                            ),
                        ),

                        array(
                            'title' => 'Top Header Colors',
                            'id' => 'ut-top-header-color-settings',
                            'required' => array(
                                'ut_navigation_config' => 'off',
                                'ut_page_top_header'   => 'show|global'
                            ),
                        ),

                        array(
                            'title' => 'Logo',
                            'id' => 'ut-header-custom-logo-settings',
                            'required' => array(
                                'ut_navigation_config' => 'off'
                            ),
                        ),

                        array(
                            'title' => 'Overlay Navigation',
                            'id' => 'ut-header-overlay-settings',
                            'required' => array(
                                'ut_navigation_config' => 'off'
                            ),
                        ),

                        array(
                            'title' => 'Mobile Navigation',
                            'id' => 'ut-header-mobile-settings',
                            'required' => array(
                                'ut_navigation_config' => 'off'
                            ),
                        ),

                    ),

                ),

                array(
                    'id' => 'ut-page-settings',
                    'title' => 'Page Settings',
                    'ajax' => true,
                    'subsection' => array(

                        array(
                            'id' => 'ut-page-header-settings',
                            'title' => 'Page Title'
                        ),
                        array(
                            'title' => 'Site Frame',
                            'id' => 'ut-site-frame-section'
                        ),
                        array(
                            'title' => 'Accent Color',
                            'id' => 'ut-page-color-settings'
                        ),


                    )
                ),

                array(
                    'id' => 'ut-footer-and-contact-section',
                    'title' => 'Footer & Contact Section',
                    'ajax' => true,
                    'subsection' => array(

                        array(
                            'title' => 'Contact Section',
                            'id' => 'ut-contact-section'
                        ),
                        array(
                            'title' => 'Footer',
                            'id' => 'ut-footer-section'
                        ),
                        array(
                            'title' => 'Sub Footer',
                            'id' => 'ut-sub-footer-section'
                        ),

                    )

                ),

                // deprecated ( One Page Mode )
                array(
                    'id' => 'ut-color-settings',
                    'title' => 'Color Settings',
                    'ajax' => true,
                ),

                // deprecated ( One Page Mode )
                array(
                    'id' => 'ut-section-settings',
                    'title' => 'Section Settings',
                    'ajax' => true,
                ),
                array(
                    'id' => 'ut-section-parallax-settings',
                    'title' => 'Section Parallax Settings',
                    'ajax' => true,
                ),
                array(
                    'id' => 'ut-section-video-settings',
                    'title' => 'Section Video Settings',
                    'ajax' => true,
                ),
                array(
                    'id' => 'ut-section-overlay-settings',
                    'title' => 'Section Overlay Settings',
                    'ajax' => true,
                ),
                array(
                    'id' => 'ut-manage-team',
                    'title' => 'Manage Team',
                    'ajax' => true,
                ),

                /*array(
                    'id' => 'ut-product-settings',
                    'title' => 'Product Settings',
                    'ajax' => true,
                    'subsection' => array(

                        array(
                            'title' => 'Settings',
                            'id' => 'ut-product-promotion-settings'
                        ),

                    )
                ),*/

            ),

            'fields' => array(

                /** 
                 * Hero Settings 
                 */

                array(
                    'id' => 'ut-hero-settings',
                    'metapanel' => 'ut-hero-type-general',
                    'label' => 'Hero Type',
                    'type' => 'panel_headline',
                    'pages' => $post_type_support_2,
                ),

				array(
                    'id' => 'ut_page_hero_info',
                    'metapanel' => 'ut-hero-type-general',
                    'label' => 'Hero Info',
                    'desc' => 'If you like to design your Hero with Visual Composer, please create a content block. Once created you can select the content block by choosing "Content Block" as the Hero Type.',
                    'type' => 'section_headline_info',
                    'pages' => $post_type_support_2,
                ),
				
                array(
                    'id' => 'ut_activate_page_hero',
                    'metapanel' => 'ut-hero-type-general',
                    'label' => 'Activate Hero',
                    'desc' => 'Activate Hero for this page?',
                    'type' => 'radio_group_button',
                    'std' => 'off',
                    'choices' => array(
                        array(
                            'label' => 'On',
                            'value' => 'on',
                            'for' => array(),
                            'class' => 'ut-on'
                        ),
                        array(
                            'label' => 'Off',
                            'value' => 'off',
                            'for' => array(),
                            'class' => 'ut-off'
                        )
                    ),
                    'pages' => $post_type_support_2,
                ),
				
				array(
                    'id' => 'ut_page_hero_type',
                    'metapanel' => 'ut-hero-type-general',
                    'label' => 'Select Hero Type',
                    'type' => 'select',
                    'std' => ot_get_option( 'ut_global_hero_header_type' ),
                    'desc' => 'Choose between 10 different types.',
                    'choices' => array(

                        array(
                            'value' => 'image',
                            'label' => 'Hero Image',
                            'alt_label' => 'Single Image'
                        ),

                        array(
                            'value' => 'splithero',
                            'label' => 'Hero Highlighted (formerly Split Hero)'
                        ),

                        array(
                            'value' => 'video',
                            'label' => 'Hero Video',
                            'alt_label' => 'Video'
                        ),
                    
                        array(
                            'value' => 'cblock',
                            'label' => 'Content Block'                            
                        ),
                        
                        array(
                            'value' => 'transition',
                            'label' => 'Hero Fancy Slider'
                        ),
						
						array(
                            'value' => 'imagefader',
                            'label' => 'Hero 3 Image Fader'
                        ),

                        array(
                            'value' 	=> 'slider',
                            'label' 	=> 'Hero Slider (will be updated)',
                            'alt_label' => 'Gallery'
                        ),

                        array(
                            'value' => 'tabs',
                            'label' => 'Hero Tablet Slider (will be updated)'
                        ),

                        array(
                            'value' => 'custom',
                            'label' => 'Hero Custom Shortcode (e.g. Slider Revolution etc.)'
                        ),

                        array(
                            'value' => 'animatedimage',
                            'label' => 'Hero Panorama Image (will be updated)'
                        ),

                    ), /* end choices */
                    'required' => array(
                        'ut_activate_page_hero' => 'on'
                    ),
                    'pages' => $post_type_support_2,

                ),




















































































































































				                
                array(
                    'id' => 'ut_page_hero_height', 
                    'label' => 'Hero Height',
                    'desc' => 'Use the slider bar to set your desired height in %.',
                    'metapanel' => 'ut-hero-type-general',
                    'type' => 'numeric_slider',
					'global' => 'on',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'image|video|animatedimage|imagefader|splithero'
                    ),
                    'pages' => $post_type_support_2,
                ),
				

                
                
				/**
                 * 3 Image Fader Section
                 */
                
                array(
                    'id' => 'ut_page_hero_imagefader_headline',
                    'metapanel' => 'ut-hero-type-background',
                    'label' => 'Hero 3 Image Fader Settings',
                    'type' => 'section_headline',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'imagefader'
                    ),
                ),
				array(
                    'id' => 'ut_page_hero_image_fader',
                    'metapanel' => 'ut-hero-type-background',
                    'label' => 'Default Hero 3 Images with Fading Effect',
					'desc' => 'Optimized for 3 Images. If you like to use more than 3 images, please use our "Slider Hero" instead. This limitation is connected to performance related aspects',
                    'type' => 'gallery',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'imagefader'
                    ),
                ),
                array(
                    'id' => 'ut_page_hero_image_fader_position',
                    'metapanel' => 'ut-hero-type-background',
                    'label' => '3 Images Background Position',
                    'desc' => '(optional)',
                    'type' => 'repeating_background_position',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'imagefader'
                    ),
                ),
				array(
                    'id' => 'ut_page_hero_image_fader_tablet',
                    'metapanel' => 'ut-hero-type-background',
                    'label' => 'Tablet Hero 3 Images with Fading Effect',
					'desc' => 'Optimized for 3 Images. If you like to use more than 3 images, please use our "Slider Hero" instead. This limitation is connected to performance related aspects',
                    'type' => 'gallery',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'imagefader'
                    ),
                ),
                array(
                    'id' => 'ut_page_hero_image_fader_tablet_position',
                    'metapanel' => 'ut-hero-type-background',
                    'label' => 'Tablet Background Position',
                    'desc' => '(optional)',
                    'type' => 'repeating_background_position',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'imagefader'
                    ),
                ),
				array(
                    'id' => 'ut_page_hero_image_fader_mobile',
                    'metapanel' => 'ut-hero-type-background',
                    'label' => 'Mobile Hero 3 Images with Fading Effect',
					'desc' => 'Optimized for 3 Images. If you like to use more than 3 images, please use our "Slider Hero" instead. This limitation is connected to performance related aspects',
                    'type' => 'gallery',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'imagefader'
                    ),
                ),
                array(
                    'id' => 'ut_page_hero_image_fader_mobile_position',
                    'metapanel' => 'ut-hero-type-background',
                    'label' => 'Mobile Background Positions',
                    'desc' => '(optional)',
                    'type' => 'repeating_background_position',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'imagefader'
                    ),
                ),
				
                /**
                 * Split Hero Section
                 */
                
                array(
                    'id' => 'ut_page_hero_split_content_headline',
                    'metapanel' => 'ut-split-hero',
                    'label' => 'Highlighted Hero Content',
                    'type' => 'panel_headline',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'splithero'
                    ),
                ),
            
                array(
                    'id' => 'ut_page_hero_split_content_type',
                    'metapanel' => 'ut-split-hero',
                    'label' => 'Highlighted Hero Content Type',
                    'desc' => 'Wether you like to display an image, video or a contact form.',
                    'type' => 'select',
                    'choices' => array(
                        array(
                            'value' => 'image',
                            'for' => array( 'ut_page_hero_split_image', 'ut_page_hero_split_image_max_width', 'ut_page_hero_split_image_effect' ),
                            'label' => 'Image'
                        ),
                        array(
                            'value' => 'video',
                            'label' => 'Video'
                        ),
                        array(
                            'value' => 'form',
                            'label' => 'Contact Form 7'
                        )
                    ),
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'splithero'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_hero_split_video',
                    'metapanel' => 'ut-split-hero',
                    'label' => 'Highlighted Hero Video',
                    'desc' => 'This video will display on the right side of the hero caption. It will not display on mobile devices! Please use the only embed codes from youtube or vimeo.',
                    'type' => 'textarea_simple',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'splithero',
                        'ut_page_hero_split_content_type' => 'video'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_hero_split_form',
                    'metapanel' => 'ut-split-hero',
                    'label' => 'Highlighted Hero Contact Form 7',
                    'desc' => 'This form will display on the right side of the hero caption.',
                    'type' => 'textarea_simple',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'splithero',
                        'ut_page_hero_split_content_type' => 'form'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_hero_split_video_box',
                    'metapanel' => 'ut-split-hero',
                    'label' => 'Activate Highlighted Hero Video Box',
                    'desc' => 'Display a shadowed box around the video.',
                    'type' => 'select',
                    'choices' => array(
                        array(
                            'value' => 'on',
                            'label' => 'yes, please!'
                        ),
                        array(
                            'value' => 'off',
                            'label' => 'no, thanks!'
                        )
                    ),
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'splithero',
                        'ut_page_hero_split_content_type' => 'video'
                    ),
                    'pages' => $post_type_support_2
                ),

                array(
                    'id' => 'ut_page_hero_split_video_box_style',
                    'metapanel' => 'ut-split-hero',
                    'label' => 'Highlighted Hero Video Box Style',
                    'desc' => 'Select between 3 nice box styles. The box style will additionally adjust its style depending on the chosen Hero Style.',
                    'type' => 'select',
                    'choices' => array(
                        array(
                            'value' => 'themecolor',
                            'label' => 'Themecolor'
                        ),
                        array(
                            'value' => 'light',
                            'label' => 'Light'
                        ),
                        array(
                            'value' => 'dark',
                            'label' => 'Dark'
                        )
                    ),
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'splithero',
                        'ut_page_hero_split_content_type' => 'video',
                        'ut_page_hero_split_video_box' => 'on'
                    ),
                    'pages' => $post_type_support_2
                ),

                array(
                    'id' => 'ut_page_hero_split_video_box_padding',
                    'metapanel' => 'ut-split-hero',
                    'label' => 'Highlighted Hero Video Box Padding',
                    'desc' => 'Set padding of the box in pixel e.g. 20px. default: 20px',
                    'type' => 'text',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'splithero',
                        'ut_page_hero_split_content_type' => 'video',
                        'ut_page_hero_split_video_box' => 'on'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_hero_split_image',
                    'metapanel' => 'ut-split-hero',
                    'label' => 'Highlighted Hero Image',
                    'desc' => 'This image will display on the right side of the Hero Caption. It will not display on mobile devices!',
                    'type' => 'upload',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'splithero',
                        'ut_page_hero_split_content_type' => 'image',
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_hero_split_image_effect',
                    'metapanel' => 'ut-split-hero',
                    'label' => 'Highlighted Hero Image Animation Effect',
                    'desc' => 'Choose animation effect for Highlighted Hero Image.',
                    'type' => 'select',
                    'std' => 'none',
                    'choices' => array(
                        array(
                            'value' => 'none',
                            'label' => 'No effect'
                        ),
                        array(
                            'value' => 'fadeIn',
                            'label' => 'Fade In'
                        ),
                        array(
                            'value' => 'slideInRight',
                            'label' => 'Slide in Right'
                        ),
                        array(
                            'value' => 'slideInLeft',
                            'label' => 'Slide in Left'
                        ),
                    ),
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'splithero',
                        'ut_page_hero_split_content_type' => 'image',
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_hero_split_image_max_width',
                    'metapanel' => 'ut-split-hero',
                    'label' => 'Highlighted Hero Image Max Width',
                    'desc' => 'Adjust this value until the Highlighted Hero Image fits inside the Hero. Default "60".',
                    'type' => 'numeric-slider',
                    'std' => '60',
                    'min_max_step' => '0,100,1',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'splithero',
                        'ut_page_hero_split_content_type' => 'image',
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                
                
                /*
                | Background Settings
                */
                
                array(
                    'id' => 'ut_page_hero_background_settings_headline',
                    'metapanel' => 'ut-hero-type-background',
                    'label' => 'Image Effects',
                    'type' => 'panel_headline',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'image|splithero|tabs|animatedimage|slider'
                    ),
                ),

                array(
                    'id' => 'ut_page_hero_parallax',
                    'metapanel' => 'ut-hero-type-background',
                    'label' => 'Activate Parallax',
                    'desc' => 'Parallax involves the background moving at a slower rate to the foreground, creating a 3D effect as you scroll down the page.',
                    'type' => 'select',
                    'choices' => array(
                        array(
                            'value' => 'on',
                            'label' => 'On'
                        ),
                        array(
                            'value' => 'off',
                            'label' => 'Off'
                        )
                    ),
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'image|splithero|tabs|animatedimage',
                        'ut_page_hero_rain_effect' => 'off'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_hero_image_scroll_zoom',
                    'metapanel' => 'ut-hero-type-background',
                    'label' => 'Zoom Hero on Scroll',
                    'desc' => 'When user scrolls down the Hero zooms in.',
                    'type' => 'select',
                    'global' => 'on',
                    'pages' => $post_type_support_2,
                    'choices' => array(
                        array(
                            'value' => 'off',
                            'label' => 'no, thanks!'
                        ),
                        array(
                            'value' => 'on',
                            'label' => 'yes, please!'
                        ),
                    ),
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'image|splithero|tabs|animatedimage|slider',
                        'ut_page_hero_rain_effect' => 'off'
                    ),
                ),

                array(
                    'id' => 'ut_page_hero_glitch',
                    'metapanel' => 'ut-hero-type-background',
                    'label' => 'Activate Glitch Effect',
                    'type' => 'select',
                    'global' => 'on',
                    'desc' => 'Note that this effect is using clip path technique. The clip-path property is not supported in IE or Edge. All other Modern Browsers do support this feature. Not compatible with rain effect.',
                    'choices' => array(
                        array(
                            'value' => 'off',
                            'label' => 'Off'
                        ),
                        array(
                            'value' => 'on',
                            'label' => 'On'
                        ),

                    ),
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'image|audio|tabs',
                        'ut_page_hero_rain_effect' => 'off'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_hero_glitch_effect',
                    'metapanel' => 'ut-hero-type-background',
                    'label' => 'Glitch Effect',
                    'type' => 'select',
                    'global' => 'on',
                    'desc' => 'Choose your desired effect out of a bunch of cool glitch effects.',
                    'choices' => array(

                        array(
                            'value' => 'ethereal',
                            'label' => 'Ethereal'
                        ),
                        array(
                            'value' => 'haunted',
                            'label' => 'Haunted',
                        ),
                        array(
                            'value' => 'prone',
                            'label' => 'Prone'
                        ),
                        array(
                            'value' => 'equal',
                            'label' => 'Equal'
                        ),
                        array(
                            'value' => 'gifted',
                            'label' => 'Gifted'
                        ),
                        array(
                            'value' => 'past',
                            'label' => 'Past'
                        ),
                        array(
                            'value' => 'ground',
                            'label' => 'Ground'
                        ),
                        array(
                            'value' => 'wide',
                            'label' => 'Wide'
                        )

                    ),
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'image|audio|tabs',
                        'ut_page_hero_glitch' => 'on',
                        'ut_page_hero_rain_effect' => 'off'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_hero_glitch_effect_accent_1',
                    'metapanel' => 'ut-hero-type-background',
                    'label' => 'Glitch Effect Accent Color (1)',
                    'desc' => 'Some glitch effects do support one or more colored layers. Leave empty to apply the default color.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'image|audio|tabs',
                        'ut_page_hero_glitch' => 'on',
                        'ut_page_hero_glitch_effect' => 'ethereal|haunted|equal|gifted|past|ground|wide',
                        'ut_page_hero_rain_effect' => 'off'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_hero_glitch_effect_accent_2',
                    'metapanel' => 'ut-hero-type-background',
                    'label' => 'Glitch Effect Accent Color (2)',
                    'desc' => 'Some glitch effects do support one or more colored layers. Leave empty to apply the default color.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'image|audio|tabs',
                        'ut_page_hero_glitch' => 'on',
                        'ut_page_hero_glitch_effect' => 'ethereal|equal|past|ground',
                        'ut_page_hero_rain_effect' => 'off'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_hero_glitch_effect_accent_3',
                    'metapanel' => 'ut-hero-type-background',
                    'label' => 'Glitch Effect Accent Color (3)',
                    'desc' => 'Some glitch effects do support one or more colored layers. Leave empty to apply the default color.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'image|audio|tabs',
                        'ut_page_hero_glitch' => 'on',
                        'ut_page_hero_glitch_effect' => 'past',
                        'ut_page_hero_rain_effect' => 'off'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_hero_rain_effect',
                    'metapanel' => 'ut-hero-type-background',
                    'label' => 'Activate Rain Effect',
                    'type' => 'select',
                    'std' => 'off',
                    'desc' => 'Keep in mind, activating this option can reduce your website performance.',
                    'choices' => array(
                        array(
                            'value' => 'on',
                            'label' => 'On'
                        ),
                        array(
                            'value' => 'off',
                            'label' => 'Off'
                        )
                    ),
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'image|splithero'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_hero_rain_sound',
                    'metapanel' => 'ut-hero-type-background',
                    'label' => 'Activate Rain Sound',
                    'desc' => 'The sound of rain is one of the most relaxing sounds in existence and becomes available to your visitors with activating this option.',
                    'type' => 'select',
                    'std' => 'off',
                    'choices' => array(
                        array(
                            'value' => 'on',
                            'label' => 'On'
                        ),
                        array(
                            'value' => 'off',
                            'label' => 'Off'
                        )
                    ),
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'image|splithero',
                        'ut_page_hero_rain_effect' => 'on'
                    ),
                    'pages' => $post_type_support_2,
                ),

                /*
                | Animation Settings
                */
                
                array(
                    'id' => 'ut_page_hero_image_animation_effect_headline',
                    'metapanel' => 'ut-hero-type-animation',
                    'label' => 'Hero Animation Settings',
                    'type' => 'panel_headline',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'image|video|splithero|tabs|video|imagefader',
                    ),
                ),
                
                array(
                    'id' => 'ut_page_hero_image_animation_effect',
                    'metapanel' => 'ut-hero-type-animation',
                    'label' => 'Background Animation Effect',
                    'desc' => 'A bunch of cool hero image animations effects!',
                    'type' => 'select',
                    'global' => 'on',
                    'choices' => array(
                        array(
                            'value' => 'heroFadeIn',
                            'label' => 'Fade In (Default)'
                        ),
                        array(
                            'value' => 'heroFadeInLeft',
                            'label' => 'Fade In Left'
                        ),
                        array(
                            'value' => 'heroFadeInRight',
                            'label' => 'Fade In Right'
                        ),
                        array(
                            'value' => 'heroFadeInUp',
                            'label' => 'Fade In Up'
                        ),
                        array(
                            'value' => 'heroFadeInDown',
                            'label' => 'Fade In Down'
                        ),
                        array(
                            'value' => 'heroSlideInLeft',
                            'label' => 'Slide In Left'
                        ),
                        array(
                            'value' => 'heroSlideInRight',
                            'label' => 'Slide In Right'
                        ),
                        array(
                            'value' => 'heroSlideInUp',
                            'label' => 'Slide In Up'
                        ),
                        array(
                            'value' => 'heroSlideInDown',
                            'label' => 'Slide In Down'
                        ),
                        array(
                            'value' => 'heroKenBurns',
                            'label' => 'Brooklyn Ken Burns'
                        ),
                    ),
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'image|video|splithero|tabs|video',
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id' => 'ut_page_hero_image_animation_effect_timer',
                    'metapanel' => 'ut-hero-type-animation',
                    'label' => 'Background Animation Duration',
                    'desc' => 'Set your desired animation duration in seconds.',
                    'type' => 'numeric_slider',
                    'min_max_step' => '1,20,1',
                    'pages' => $post_type_support_2,
					'global' => 'on',
                    'required' => array(
                        'ut_page_hero_type' => 'image|video|splithero|tabs|video',
                        'ut_page_hero_image_animation_effect' => 'heroFadeInDown|heroFadeInUp|heroFadeInRight|heroFadeInLeft|heroFadeIn|heroSlideInDown|heroSlideInUp|heroSlideInRight|heroSlideInLeft',
                    ),
                ),
                
                array(
                    'id' => 'ut_page_hero_image_animation_effect_kenburns_timer',
                    'metapanel' => 'ut-hero-type-animation',
                    'label' => 'Background Animation Duration',
                    'desc' => 'Set your desired animation duration in seconds.',
                    'type' => 'numeric_slider',
                    'min_max_step' => '1,300,1',
                    'pages' => $post_type_support_2,
					'global' => 'on',
                    'required' => array(
                        'ut_page_hero_type' => 'image|splithero|tabs',
                        'ut_page_hero_image_animation_effect' => 'heroKenBurns',
                    ),
                ),
                
                array(
                    'id' => 'ut_page_hero_image_animation_effect_easing',
                    'metapanel' => 'ut-hero-type-animation',
                    'label' => 'Background Animation Easing',
                    'desc' => sprintf( 'Set your desired animation easing. You can find easing examples on the following website: %s', '<a target="_blank" href="https://matthewlein.com/tools/ceaser">Easing Effects</a>'),
                    'type' => 'css_easing',
                    'pages' => $post_type_support_2,
					'global' => 'on',
                    'required' => array(
                        'ut_page_hero_type' => 'image|splithero|tabs',
                    ),
                ),


                // Hero Caption Animation Settings
                array(
                    'id' => 'ut_page_hero_caption_animation_settings',
                    'metapanel' => 'ut-hero-caption-animation-settings',
                    'label' => 'Caption Animation Settings',
                    'type' => 'panel_headline',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'image|animatedimage|video|splithero|tabs|imagefader',
                    ),
                ),

                array(
                    'id' => 'ut_page_hero_caption_animation_type',
                    'metapanel' => 'ut-hero-caption-animation-settings',
                    'label' => 'Caption Animation Type',
                    'desc' => 'Animate Caption elements one by one or as a group? A splitted Group separates the caption into 2 parts and animates them against each other. Only Brooklyn Effects do support splitted groups.',
                    'type' => 'select',
                    'global' => 'on',
                    'choices' => array(
                        array(
                            'value' => 'group',
                            'label' => 'Animate Caption as a group'
                        ),
                        array(
                            'value' => 'group_split',
                            'label' => 'Animate Caption as a group (splitted)'
                        ),
                        array(
                            'value' => 'single',
                            'label' => 'Animate Caption Elements one by one'
                        ),                        
                    ),
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'image|animatedimage|video|splithero|tabs|imagefader',
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id' => 'ut_page_hero_caption_animation_effect',
                    'metapanel' => 'ut-hero-caption-animation-settings',
                    'label' => 'Caption Animation Effect',
                    'desc' => 'Intro Effect for Caption Slogan and Title',
                    'type' => 'animation_in',
                    'global' => 'on',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'image|video|splithero|tabs|video|imagefader',
                        'ut_page_hero_caption_animation_type' => 'single|group',
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id' => 'ut_page_hero_caption_animation_effect_split',
                    'metapanel' => 'ut-hero-caption-animation-settings',
                    'label' => 'Caption Animation Effect',
                    'desc' => 'Intro Effect for Caption Slogan and Title',
                    'type' => 'animation_in',
                    'global' => 'on',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'image|video|splithero|tabs|video|imagefader',
                        'ut_page_hero_caption_animation_type' => 'group_split',
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id' => 'ut_page_hero_caption_animation_effect_timer',
                    'metapanel' => 'ut-hero-caption-animation-settings',
                    'label' => 'Caption Animation Duration',
                    'desc' => 'Set your desired animation duration milliseconds.',
                    'type' => 'numeric_slider',
                    'min_max_step' => '100,20000,100',
                    'pages' => $post_type_support_2,
					'global' => 'on',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'image|video|splithero|tabs|video|imagefader',
                    ),
                ),
                
                array(
                    'id' => 'ut_page_hero_caption_animation_effect_easing',
                    'metapanel' => 'ut-hero-caption-animation-settings',
                    'label' => 'Caption Animation Easing',
                    'desc' => sprintf( 'Set your desired animation easing. You can find easing examples on the following website: %s', '<a target="_blank" href="https://matthewlein.com/tools/ceaser">Easing Effects</a>'),
                    'type' => 'css_easing',
                    'pages' => $post_type_support_2,
					'global' => 'on',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'image|video|splithero|tabs|video|imagefader',
                    ),
                ),



                
                /**
                 * Content Block Section
                 */
                
                array(
                    'id' => 'ut_page_hero_content_block_settings_headline',
                    'metapanel' => 'ut-hero-type-general',
                    'label' => 'Content Block Settings',
                    'type' => 'section_headline',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'cblock'
                    ),
                ),
                
                array(
                    'id' => 'ut_page_hero_content_block',
                    'metapanel' => 'ut-hero-type-general',
                    'label' => 'Select Content Block',
                    'desc' => 'Content Blocks can be used for different purposes. These blocks are managed centralized and can be deployed to different pages or parts of your website such as the Hero Area. We will use these content blocks as a core feature from now. You can manage your content blocks in your Dashboard > Content Blocks.',
                    'type' => 'custom_post_type_select',
                    'pages' => $post_type_support_2,
                    'post_type' => 'ut-content-block',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'cblock'
                    ),
                ),
                
                /**
                 * Image Tab Slider
                 */
                
                array(
                    'id' => 'ut_page_tabs_settings_headline',
                    'metapanel' => 'ut-tabs-hero',
                    'label' => 'Tablet Slider Settings',
                    'type' => 'panel_headline',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'tabs'
                    ),
                ),
                
                array(
                    'id' => 'ut_page_hero_tabs_headline',
                    'metapanel' => 'ut-tabs-hero',
                    'label' => 'Tablet Headline',
                    'desc' => 'This headline will be displayed above the tablet navigation.',
                    'type' => 'text',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'tabs'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_hero_tabs_headline_style',
                    'metapanel' => 'ut-tabs-hero',
                    'label' => 'Tablet Headline Font Style',
                    'desc' => 'Choose a font style for Tablet Headline. Choose "Default" if you like to use the global styling from the Theme Options Panel.',
                    'type' => 'select',
                    'std' => 'global',
                    'choices' => array(
                        array(
                            'value' => 'global',
                            'label' => 'Default'
                        ),
                        array(
                            'value' => 'extralight',
                            'label' => 'Extra Light'
                        ),
                        array(
                            'value' => 'light',
                            'label' => 'Light'
                        ),
                        array(
                            'value' => 'regular',
                            'label' => 'Regular'
                        ),
                        array(
                            'value' => 'medium',
                            'label' => 'Medium'
                        ),
                        array(
                            'value' => 'semibold',
                            'label' => 'Semi Bold'
                        ),
                        array(
                            'value' => 'bold',
                            'label' => 'Bold'
                        )
                    ),
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'tabs'
                    ),
                    'pages' => $post_type_support_2,

                ),


                array(
                    'id' => 'ut_page_hero_tabs_tablet_color',
                    'metapanel' => 'ut-tabs-hero',
                    'label' => 'Tablet Color',
                    'desc' => 'Select your desired tablet color.',
                    'type' => 'select',
                    'std' => 'black',
                    'choices' => array(
                        array(
                            'value' => 'black',
                            'label' => 'Black'
                        ),
                        array(
                            'value' => 'white',
                            'label' => 'White'
                        ),
                    ),
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'tabs'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_hero_tabs_tablet_shadow',
                    'metapanel' => 'ut-tabs-hero',
                    'label' => 'Tablet Shadow',
                    'desc' => 'Activate a decent shadow?',
                    'type' => 'select',
                    'std' => 'off',
                    'choices' => array(
                        array(
                            'value' => 'on',
                            'label' => 'On'
                        ),
                        array(
                            'value' => 'off',
                            'label' => 'Off'
                        ),
                    ),
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'tabs'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_hero_tabs',
                    'metapanel' => 'ut-tabs-hero',
                    'label' => 'Manage Tablet Images',
                    'desc' => '<strong>You can re-order with drag & drop, the order will update after saving.</strong>',
                    'markup' => '1_1',
                    'type' => 'compact-list',
                    'sections' => array(
                        'link'          => 'Button'
                    ),
                    'settings' => array(
                        array(
                            'id' => 'image',
                            'label' => 'Image',
                            'type' => 'upload',
                        ),
                        array(
                            'id' => 'description',
                            'label' => 'Image Description',
                            'type' => 'textarea-simple',
                            'rows' => '3'
                        ),
                        array(
                            'id' => 'link_one_url',
                            'label' => 'Left Button URL',
                            'type' => 'text',
                            'section' => 'link'
                        ),
                        array(
                            'id' => 'link_one_text',
                            'label' => 'Left Button Text',
                            'type' => 'text',
                            'section' => 'link'
                        ),
                        array(
                            'id' => 'link_two_url',
                            'label' => 'Right Button URL',
                            'type' => 'text',
                            'section' => 'link'
                        ),
                        array(
                            'id' => 'link_two_text',
                            'label' => 'Right Button Text',
                            'type' => 'text',
                            'section' => 'link'
                        )

                    ),
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'tabs'
                    ),
                    'pages' => $post_type_support_2,

                ),

                /*
                | Background Images
                */

                array(
                    'id' => 'ut_hero_image_settings_headline',
                    'metapanel' => 'ut-hero-images',
                    'label' => 'Background Image Settings',
                    'type' => 'panel_headline',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'image|splithero|tabs'
                    ),
                ),

                array(
                    'id' => 'ut_page_hero_image',
                    'metapanel' => 'ut-hero-images',
                    'label' => 'Background Image',
					'desc' => 'For best image results, we recommend to upload an image with minimum size of 1600x900 pixel or maximum size of 1920x1080 (optimal size) pixel. Also try to avoid uploading images with more than 200-300Kb size. Keep in mind, that you are not able to set a background position or attachment if the parallax option has been set to "on".',
                    'type' => 'background',
					'global' => 'on',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'image|splithero|tabs'
                    ),
                    'pages' => $post_type_support_2,
                ),
            
                array(
                    'id' => 'ut_page_hero_image_tablet',
                    'metapanel' => 'ut-hero-images',
                    'label' => 'Background Image (Tablet)',
					'desc' => 'Recommended size 1280x1280. We recommend using <a href="https://goo.gl/Sj149K" target="_blank">Kraken.io</a> services for image optimization.',
                    'type' => 'background',
					'global' => 'on',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'image|splithero|tabs'
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id' => 'ut_page_hero_image_mobile',
                    'metapanel' => 'ut-hero-images',
                    'label' => 'Background Image (Mobile)',
                    'desc' => 'Recommended size 720x1280. We recommend using <a href="https://goo.gl/Sj149K" target="_blank">Kraken.io</a> services for image optimization.',
                    'type' => 'background',
					'global' => 'on',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'image|splithero|tabs'
                    ),
                    'pages' => $post_type_support_2,
                ),
            
                

                /*
                | Animated Image Type
                */
                
                array(
                    'id' => 'ut_page_hero_animated_image_headline',
                    'metapanel' => 'ut-animated-image-hero',
                    'label' => 'Animated Image Settings',
                    'type' => 'panel_headline',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'animatedimage'
                    ),
                    'pages' => $post_type_support_1,
                ),
                                
                array(
                    'id' => 'ut_page_hero_animated_image_speed',
                    'metapanel' => 'ut-animated-image-hero',
                    'label' => 'Animated Background Animation Speed',
                    'desc' => 'Set speed of animations, in seconds. e.g. 60',
                    'type' => 'text',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'animatedimage'
                    ),
                    'pages' => $post_type_support_2,
                ),
            
                array(
                    'id' => 'ut_page_hero_animated_image_direction',
                    'metapanel' => 'ut-animated-image-hero',
                    'label' => 'Animated Background Animation Direction',
                    'desc' => 'Set animation direction',
                    'type' => 'select',
                    'std' => 'left',
                    'choices' => array(
                        array(
                            'value' => 'right',
                            'label' => 'Right'
                        ),
                        array(
                            'value' => 'left',
                            'label' => 'Left'
                        ),                        
                    ),
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'animatedimage'
                    ),
                    'pages' => $post_type_support_2,
                ),
            
                array(
                    'id' => 'ut_page_hero_animated_image_direction_alternate',
                    'metapanel' => 'ut-animated-image-hero',
                    'label' => 'Alternate Animation?',
                    'desc' => 'Alternate Image Direction Animation after each animation cycle?',
                    'std' => 'on',   
                    'type' => 'select',
                    'choices' => array(
                        array(
                            'value' => 'off',
                            'label' => 'no, thanks!'
                        ),
                        array(
                            'value' => 'on',
                            'label' => 'yes, please!'
                        ),                        
                    ),
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'animatedimage'
                    ),
                    'pages' => $post_type_support_2,
                ),
                
				array(
                    'id' => 'ut_page_hero_animated_image_size',
                    'metapanel' => 'ut-animated-image-hero',
                    'label' => 'Image Background Size',
                    'desc' => 'Specifyy the size of the background image.',
                    'std' => 'cover',   
                    'type' => 'select',
                    'choices' => array(
                        array(
                            'value' => 'cover',
                            'label' => 'cover'
                        ),
                        array(
                            'value' => 'contain',
                            'label' => 'contain'
                        ),
						array(
                            'value' => 'auto',
                            'label' => 'auto'
                        ),						
                    ),
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'animatedimage'
                    ),
                    'pages' => $post_type_support_2,
                ),
				
				array(
                    'id' => 'ut_page_hero_animated_image_repeat',
                    'metapanel' => 'ut-animated-image-hero',
                    'label' => 'Image Repeat',
                    'desc' => 'Set how a background image will be repeated.',
                    'std' => 'repeat-x',   
                    'type' => 'select',
                    'choices' => array(
                        array(
                            'value' => 'repeat-x',
                            'label' => 'repeat-x'
                        ),
                        array(
                            'value' => 'repeat-y',
                            'label' => 'repeat-y'
                        ),
						array(
                            'value' => 'repeat',
                            'label' => 'repeat'
                        ),
						array(
                            'value' => 'no-repeat',
                            'label' => 'no-repeat'
                        ),
                    ),
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'animatedimage'
                    ),
                    'pages' => $post_type_support_2,
                ),
				
                array(
                    'id' => 'ut_page_hero_animated_image',
                    'metapanel' => 'ut-animated-image-hero',
                    'label' => 'Animated Background Image',
                    'desc' => 'For best image results, we recommend to upload an image with minimum size of 1600x900 pixel or maximum size of 1920x1080(optimal) pixel. Also try to avoid uploading images with more than 200-300Kb size.',
                    'type' => 'upload',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'animatedimage'
                    ),
                    'pages' => $post_type_support_2,
                ),
            
                array(
                    'id' => 'ut_page_hero_animated_image_mobile',
                    'metapanel' => 'ut-animated-image-hero',
                    'label' => 'Animated Background Image Mobile Fallback',
                    'desc' => 'The Image Background Animation is turned off for mobiles. Therefore we recommend to upload a poster image which will display instead.',
                    'type' => 'upload',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'animatedimage'
                    ),
                    'pages' => $post_type_support_2,
                ),            

                /*
                | Slider Type
                */
                
                array(
                    'id' => 'ut_page_hero_slider_settings_headline',
                    'metapanel' => 'ut-slider-hero',
                    'label' => 'Manage Slider',
                    'type' => 'panel_headline',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'slider'
                    ),
                ),
                array(
                    'id' => 'ut_page_hero_slider_animation_speed',
                    'metapanel' => 'ut-slider-hero',
                    'label' => 'Animation Speed',
                    'desc' => 'Set speed of animations, in milliseconds.',
                    'type' => 'text',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'slider'
                    ),
                    'pages' => $post_type_support_2,
                ),
                array(
                    'id' => 'ut_page_hero_slider_slideshow_speed',
                    'metapanel' => 'ut-slider-hero',
                    'label' => 'Slideshow Speed',
                    'desc' => 'Set speed of the slideshow cycling, in milliseconds.',
                    'type' => 'text',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'slider'
                    ),
                    'pages' => $post_type_support_2,
                ),
                array(
                    'id' => 'ut_page_hero_slider',
                    'metapanel' => 'ut-slider-hero',
                    'label' => 'Slider Items',
                    'desc' => '<strong>You can re-order with drag & drop, the order will update after saving.</strong>',
                    'markup' => '1_1',
                    'type' => 'compact-list',
                    'sections' => array(
                        'caption_style' => 'Caption Style',
                        'caption'       => 'Caption Content',
                        'link'          => 'Button'
                    ),
                    'settings' => array(
                        array(
                            'id' => 'image',
                            'label' => 'Image',
                            'desc' => 'For best image results, we recommend to upload an image with minimum size of 1600x900 pixel or maximum size of 1920x1080(optimal) pixel. Also try to avoid uploading images with more than 200-300Kb size.',
                            'type' => 'upload',
                        ),
                        array(
                            'id' => 'background_position',
                            'label' => 'Image Position',
                            'type' => 'select',
                            'choices' => array(
                                array(
                                    'value' => 'center center',
                                    'label' => 'Center Center (default)'
                                ),
                                array(
                                    'value' => 'left top',
                                    'label' => 'Left Top'
                                ),
                                array(
                                    'value' => 'left center',
                                    'label' => 'Left Center'
                                ),
                                array(
                                    'value' => 'left bottom',
                                    'label' => 'Left Bottom'
                                ),
                                array(
                                    'value' => 'center top',
                                    'label' => 'Center Top'
                                ),
                                array(
                                    'value' => 'center bottom',
                                    'label' => 'Center Bottom'
                                ),
                                array(
                                    'value' => 'right top',
                                    'label' => 'Right Top'
                                ),
                                array(
                                    'value' => 'right center',
                                    'label' => 'Right Center'
                                ),
                                array(
                                    'value' => 'right bottom',
                                    'label' => 'Right Bottom'
                                )

                            )

                        ),
                        array(
                            'id' => 'font_style',
                            'label' => 'Hero Caption Font Style',
                            'desc' => 'Setting this option to default will load the hero font style.',
                            'type' => 'select',
                            'std' => 'global',
                            'choices' => array(
                                array(
                                    'value' => 'global',
                                    'label' => 'Default'
                                ),
                                array(
                                    'value' => 'extralight',
                                    'label' => 'Extra Light'
                                ),
                                array(
                                    'value' => 'light',
                                    'label' => 'Light'
                                ),
                                array(
                                    'value' => 'regular',
                                    'label' => 'Regular'
                                ),
                                array(
                                    'value' => 'medium',
                                    'label' => 'Medium'
                                ),
                                array(
                                    'value' => 'semibold',
                                    'label' => 'Semi Bold'
                                ),
                                array(
                                    'value' => 'bold',
                                    'label' => 'Bold'
                                )
                            )
                        ),
                        array(
                            'id' => 'style',
                            'section' => 'caption_style',
                            'label' => 'Hero Caption Style',
                            'type' => 'select',
                            'choices' => array(
                                array(
                                    'value' => 'ut-hero-style-1',
                                    'label' => 'Style One'
                                ),
                                array(
                                    'value' => 'ut-hero-style-2',
                                    'label' => 'Style Two'
                                ),
                                array(
                                    'value' => 'ut-hero-style-3',
                                    'label' => 'Style Three'
                                ),
                                array(
                                    'value' => 'ut-hero-style-4',
                                    'label' => 'Style Four'
                                ),
                                array(
                                    'value' => 'ut-hero-style-5',
                                    'label' => 'Style Five'
                                ),
                                array(
                                    'value' => 'ut-hero-style-6',
                                    'label' => 'Style Six'
                                ),
                                array(
                                    'value' => 'ut-hero-style-7',
                                    'label' => 'Style Seven'
                                ),
                                array(
                                    'value' => 'ut-hero-style-8',
                                    'label' => 'Style Eight'
                                ),
                                array(
                                    'value' => 'ut-hero-style-9',
                                    'label' => 'Style Nine'
                                ),
                                array(
                                    'value' => 'ut-hero-style-10',
                                    'label' => 'Style Ten'
                                ),

                            )
                        ),
                        array(
                            'id' => 'align',
                            'section' => 'caption_style',
                            'label' => 'Choose Caption Alignment',
                            'type' => 'select',
                            'desc' => '',
                            'std' => 'center',
                            'choices' => array(
                                array(
                                    'value' => 'center',
                                    'label' => 'Center'
                                ),
                                array(
                                    'value' => 'left',
                                    'label' => 'Left'
                                ),
                                array(
                                    'value' => 'right',
                                    'label' => 'Right'
                                )
                            ),
                        ),

                        array(
                            'id' => 'direction',
                            'section' => 'caption_style',
                            'label' => 'Caption Animation Direction',
                            'std' => 'top',
                            'type' => 'select',
                            'choices' => array(
                                array(
                                    'value' => 'top',
                                    'label' => 'Top'
                                ),
                                array(
                                    'value' => 'left',
                                    'label' => 'Left'
                                ),
                                array(
                                    'value' => 'right',
                                    'label' => 'Right'
                                ),
                                array(
                                    'value' => 'bottom',
                                    'label' => 'Bottom'
                                )
                            )
                        ),

                        array(
                            'id' => 'expertise',
                            'section' => 'caption',
                            'label' => 'Hero Caption Slogan',
                            'type' => 'textarea-simple',
                            'rows' => '3'
                        ),

                        array(
                            'id' => 'description',
                            'section' => 'caption',
                            'label' => 'Hero Caption',
                            'type' => 'textarea-simple',
                            'rows' => '3'
                        ),
                        array(
                            'id' => 'catchphrase',
                            'section' => 'caption',
                            'label' => 'Hero Caption Description',
                            'type' => 'textarea-simple',
                            'rows' => '3'
                        ),
                        array(
                            'id' => 'link',
                            'section' => 'link',
                            'label' => 'Button URL',
                            'type' => 'text',
                            'rows' => '3'
                        ),
                        array(
                            'id' => 'link_description',
                            'section' => 'link',
                            'label' => 'Button Text',
                            'type' => 'text'
                        )
                    ),
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'slider'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_hero_slider_navigation_settings_headline',
                    'metapanel' => 'ut-slider-hero-navigation',
                    'label' => 'Slider Navigation',
                    'type' => 'panel_headline',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'slider'
                    ),
                ),
                array(
                    'id' => 'ut_page_hero_slider_arrow_background_color',
                    'metapanel' => 'ut-slider-hero-navigation',
                    'label' => 'Arrow Background Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'slider'
                    ),
                    'pages' => $post_type_support_2,
                ),
                array(
                    'id' => 'ut_page_hero_slider_arrow_background_color_hover',
                    'metapanel' => 'ut-slider-hero-navigation',
                    'label' => 'Arrow Background Color Hover',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'slider'
                    ),
                    'pages' => $post_type_support_2,
                ),
                array(
                    'id' => 'ut_page_hero_slider_arrow_color',
                    'metapanel' => 'ut-slider-hero-navigation',
                    'label' => 'Arrow Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'slider'
                    ),
                    'pages' => $post_type_support_2,
                ),
                array(
                    'id' => 'ut_page_hero_slider_arrow_color_hover',
                    'metapanel' => 'ut-slider-hero-navigation',
                    'label' => 'Arrow Color Hover',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'slider'
                    ),
                    'pages' => $post_type_support_2,
                ),

                /**
                 * Fancy Slider
                 */
                
                array(
                    'id' => 'ut_page_fancy_slider_settings_headline',
                    'metapanel' => 'ut-fancy-slider-hero',
                    'label' => 'Fancy Slider Settings',
                    'type' => 'section_headline',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'transition'
                    ),
                ),
                
                array(
                    'id' => 'ut_page_hero_fancy_slider_height',
                    'metapanel' => 'ut-fancy-slider-hero',
                    'label' => 'Slider Height',
                    'desc' => 'Select your desired slider height.',
                    'type' => 'select',
                    'std' => '75',
                    'choices' => array(
                        array(
                            'value' => '60',
                            'label' => '60% Height'
                        ),
                        array(
                            'value' => '75',
                            'label' => '75% Height'
                        ),
	                    array(
		                    'value' => '90',
		                    'label' => '90% Height'
	                    ),
                        array(
                            'value' => '100',
                            'label' => '100% Height'
                        )
                    ),
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'transition',
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_hero_fancy_slider_effect',
                    'metapanel' => 'ut-fancy-slider-hero',
                    'label' => 'Slide Effect',
                    'desc' => 'Choose an effect for your slider, this effect will affect all slides.',
                    'type' => 'select',
                    'std' => 'fxSoftScale',
                    'choices' => array(
                        array(
                            'value' => 'fxSoftScale',
                            'label' => 'Soft scale'
                        ),
                        array(
                            'value' => 'fxPressAway',
                            'label' => 'Press away'
                        ),
                        array(
                            'value' => 'fxSideSwing',
                            'label' => 'Side Swing'
                        ),
                        array(
                            'value' => 'fxFortuneWheel',
                            'label' => 'Fortune wheel'
                        ),
                        array(
                            'value' => 'fxSwipe',
                            'label' => 'Swipe'
                        ),
                        array(
                            'value' => 'fxPushReveal',
                            'label' => 'Push reveal'
                        ),
                        array(
                            'value' => 'fxSnapIn',
                            'label' => 'Snap in'
                        ),
                        array(
                            'value' => 'fxLetMeIn',
                            'label' => 'Let me in'
                        ),
                        array(
                            'value' => 'fxStickIt',
                            'label' => 'Stick it'
                        ),
                        array(
                            'value' => 'fxArchiveMe',
                            'label' => 'Archive me'
                        ),
                        array(
                            'value' => 'fxVGrowth',
                            'label' => 'Vertical growth'
                        ),
                        array(
                            'value' => 'fxSlideBehind',
                            'label' => 'Slide Behind'
                        ),
                        array(
                            'value' => 'fxSoftPulse',
                            'label' => 'Soft Pulse'
                        ),
                        array(
                            'value' => 'fxEarthquake',
                            'label' => 'Earthquake'
                        ),
                        array(
                            'value' => 'fxCliffDiving',
                            'label' => 'Cliff diving'
                        )

                    ),
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'transition',
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_hero_fancy_slider_autoplay',
                    'metapanel' => 'ut-fancy-slider-hero',
                    'label' => 'Slider Autoplay',
                    'desc' => 'Automatically advances to the next slide.',
                    'type' => 'select',
                    'std' => 'off',
                    'choices' => array(
                        array(
                            'value' => 'off',
                            'label' => 'no, thanks!'
                        ),
                        array(
                            'value' => 'on',
                            'label' => 'yes, please!'
                        ),
                    ),
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'transition',
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_hero_fancy_slider_timer',
                    'metapanel' => 'ut-fancy-slider-hero',
                    'label' => 'Autoplay Timer',
                    'desc' => 'Set speed of delay between slides - value in ms , default: 3000ms',
                    'type' => 'text',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'transition',
                        'ut_page_hero_fancy_slider_autoplay' => 'on'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_hero_fancy_slider',
                    'metapanel' => 'ut-fancy-slider-hero',
                    'label' => 'Fancy Slider Items',
                    'desc' => '<strong>You can re-order with drag & drop, the order will update after saving.</strong>',
                    'markup' => '1_1',
                    'type' => 'compact-list',
                    'sections' => array(
                        'caption_style' => 'Caption Style',
                        'caption'       => 'Caption Content',
                        'link'          => 'Button'
                    ),
                    'settings' => array(
                        array(
                            'id' => 'image',
                            'label' => 'Image',
                            'desc' => 'For best image results, we recommend to upload an image with minimum size of 1600 x (set height) pixel or maximum size of 1920x (set height) (optimal) pixel. Also try to avoid uploading images with more than 200-300Kb size.',
                            'type' => 'upload',
                        ),
                        array(
                            'id' => 'style',
                            'section' => 'caption_style',
                            'label' => 'Hero Caption Style',
                            'type' => 'select',
                            'choices' => array(
                                array(
                                    'value' => 'ut-hero-style-1',
                                    'label' => 'Style One'
                                ),
                                array(
                                    'value' => 'ut-hero-style-2',
                                    'label' => 'Style Two'
                                ),
                                array(
                                    'value' => 'ut-hero-style-3',
                                    'label' => 'Style Three'
                                ),
                                array(
                                    'value' => 'ut-hero-style-4',
                                    'label' => 'Style Four'
                                ),
                                array(
                                    'value' => 'ut-hero-style-5',
                                    'label' => 'Style Five'
                                ),
                                array(
                                    'value' => 'ut-hero-style-6',
                                    'label' => 'Style Six'
                                ),
                                array(
                                    'value' => 'ut-hero-style-7',
                                    'label' => 'Style Seven'
                                ),
                                array(
                                    'value' => 'ut-hero-style-8',
                                    'label' => 'Style Eight'
                                ),
                                array(
                                    'value' => 'ut-hero-style-9',
                                    'label' => 'Style Nine'
                                ),
                                array(
                                    'value' => 'ut-hero-style-10',
                                    'label' => 'Style Ten'
                                ),

                            ),

                        ),
                        array(
                            'id' => 'align',
                            'section' => 'caption_style',
                            'label' => 'Choose Caption Alignment',
                            'type' => 'select',
                            'std' => 'center',
                            'choices' => array(
                                array(
                                    'value' => 'center',
                                    'label' => 'Center'
                                ),
                                array(
                                    'value' => 'left',
                                    'label' => 'Left'
                                ),
                                array(
                                    'value' => 'right',
                                    'label' => 'Right'
                                )
                            )
                        ),
                        array(
                            'id' => 'expertise',
                            'section' => 'caption',
                            'label' => 'Hero Caption Slogan',
                            'type' => 'textarea-simple',
                            'rows' => '3'
                        ),
                        array(
                            'id' => 'description',
                            'section' => 'caption',
                            'label' => 'Hero Caption',
                            'type' => 'textarea-simple',
                            'rows' => '3'
                        ),
                        array(
                            'id' => 'catchphrase',
                            'section' => 'caption',
                            'label' => 'Hero Caption Description',
                            'type' => 'textarea-simple',
                            'rows' => '3'
                        ),
                        array(
                            'id' => 'link',
                            'label' => 'Button URL',
                            'section' => 'link',
                            'type' => 'text',
                        ),
                        array(
                            'id' => 'link_description',
                            'section' => 'link',
                            'label' => 'Button Text',
                            'type' => 'text'
                        )
                    ),
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'transition',
                    ),
                    'pages' => $post_type_support_2,
                ),


                /**
                 * Video Type
                 */
                
                array(
                    'id' => 'ut_page_video_settings_headline',
                    'metapanel' => 'ut-hero-video',
                    'label' => 'Manage Video',
                    'type' => 'panel_headline',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'video'
                    ),
                ),
                
                array(
                    'id' => 'ut_page_video_source',
                    'metapanel' => 'ut-hero-video',
                    'label' => 'Video Source',
                    'desc' => 'Select your desired source for videos.',
                    'type' => 'select',
                    'std' => 'youtube',
                    'choices' => array(
                        array(
                            'value' => 'youtube',
                            'label' => 'Youtube'
                        ),
                        array(
                            'value' => 'vimeo',
                            'label' => 'Vimeo'
                        ),
                        array(
                            'value' => 'selfhosted',
                            'label' => 'Selfthosted'
                        ),
                        array(
                            'value' => 'custom',
                            'label' => 'Custom'
                        )
                    ),
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'video'
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                /* youtube video */
                array(
                    'id' => 'ut_page_video',
                    'metapanel' => 'ut-hero-video',
                    'label' => 'Video URL',
                    'desc' => 'Please insert the url only e.g. http://youtu.be/gvt_YFuZ8LA . Please do not insert the complete embedded code!',
                    'type' => 'text',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'video',
                        'ut_page_video_source' => 'youtube'
                    ),
                    'pages' => $post_type_support_2,
                ),
                array(
                    'id' => 'ut_page_video_mobile',
                    'metapanel' => 'ut-hero-video',
                    'label' => 'Play Video on Mobiles?',
                    'desc' => '<strong>(optional)</strong>. This might not work on all devices!',
                    'type' => 'select',
                    'std' => 'off',
                    'choices' => array(
                        array(
                            'label' => 'yes, please!',
                            'value' => 'on'
                        ),
                        array(
                            'label' => 'no, thanks!',
                            'value' => 'off'
                        )

                    ),
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'video',
                        'ut_page_video_source' => 'youtube'
                    ),
                    'pages' => $post_type_support_2,
                ),
                array(
                    'id' => 'ut_page_video_alternate_mobile',
                    'metapanel' => 'ut-hero-video',
                    'label' => 'Alternate Video URL for mobiles',
                    'desc' => 'Please insert the url only e.g. http://youtu.be/gvt_YFuZ8LA . Please do not insert the complete embedded code! Leave empty to play desktop version.',
                    'type' => 'text',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'video',
                        'ut_page_video_source' => 'youtube',
                        'ut_page_video_mobile' => 'on'
                    ),
                    'pages' => $post_type_support_2,
                ),

                
                array(
                    'id' => 'ut_page_video_start_at',
                    'metapanel' => 'ut-hero-video',
                    'label' => 'Video Start At',
                    'desc' => '<strong>(optional)</strong>. Set the seconds the video should start at. e.g. 5',
                    'type' => 'text',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'video',
                        'ut_page_video_source' => 'youtube'
                    ),
                    'pages' => $post_type_support_2,
                ),
            
                array(
                    'id' => 'ut_page_video_stop_at',
                    'metapanel' => 'ut-hero-video',
                    'label' => 'Video End At',
                    'desc' => '<strong>(optional)</strong>. Set the seconds the video should stop at e.g. 5',
                    'type' => 'text',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'video',
                        'ut_page_video_source' => 'youtube'
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                /* vimeo video */
                array(
                    'id' => 'ut_page_video_vimeo',
                    'metapanel' => 'ut-hero-video',
                    'label' => 'Video URL',
                    'desc' => 'Please insert the url only e.g.  . Please do not insert the complete embedded code!',
                    'type' => 'text',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'video',
                        'ut_page_video_source' => 'vimeo'
                    ),
                    'pages' => $post_type_support_2,
                ),                
                array(
                    'id' => 'ut_page_video_custom',
                    'metapanel' => 'ut-hero-video',
                    'label' => 'Video Embedded Code',
                    'desc' => 'Please insert the complete embedded code of your favorite video hoster!',
                    'type' => 'textarea-simple',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'video',
                        'ut_page_video_source' => 'custom'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_video_mp4',
                    'metapanel' => 'ut-hero-video',
                    'label' => 'MP4',
                    'desc' => 'In HTML5, there are 3 supported video formats: MP4, WebM, and Ogg. Please make sure you provide all 3 file types to grant best browser support.',
                    'type' => 'upload',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'video',
                        'ut_page_video_source' => 'selfhosted'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_video_ogg',
                    'metapanel' => 'ut-hero-video',
                    'label' => 'OGG',
                    'desc' => 'In HTML5, there are 3 supported video formats: MP4, WebM, and Ogg. Please make sure you provide all 3 file types to grant best browser support.',
                    'type' => 'upload',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'video',
                        'ut_page_video_source' => 'selfhosted'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_video_webm',
                    'metapanel' => 'ut-hero-video',
                    'label' => 'WEBM',
                    'desc' => 'In HTML5, there are 3 supported video formats: MP4, WebM, and Ogg. Please make sure you provide all 3 file types to grant best browser support.',
                    'type' => 'upload',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'video',
                        'ut_page_video_source' => 'selfhosted'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_video_tablet_version',
                    'metapanel' => 'ut-hero-video',
                    'label' => 'Add tablet version of Video?',
                    'desc' => 'Select your desired source for videos on tablet devices. <strong>Note, that this is a real device query, you have to check the output with a real device.</strong>',
                    'type' => 'select',
                    'std' => 'off',
                    'choices' => array(
                        array(
                            'value' => 'off',
                            'label' => 'no, thanks!'
                        ),
                        array(
                            'value' => 'on',
                            'label' => 'yes, please!'
                        )
                    ),
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'video',
                        'ut_page_video_source' => 'selfhosted'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_video_tablet_mp4',
                    'metapanel' => 'ut-hero-video',
                    'label' => 'MP4',
                    'desc' => 'In HTML5, there are 3 supported video formats: MP4, WebM, and Ogg. Please make sure you provide all 3 file types to grant best browser support.',
                    'type' => 'upload',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'video',
                        'ut_page_video_source' => 'selfhosted',
                        'ut_page_video_tablet_version' => 'on'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_video_tablet_ogg',
                    'metapanel' => 'ut-hero-video',
                    'label' => 'OGG',
                    'desc' => 'In HTML5, there are 3 supported video formats: MP4, WebM, and Ogg. Please make sure you provide all 3 file types to grant best browser support.',
                    'type' => 'upload',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'video',
                        'ut_page_video_source' => 'selfhosted',
                        'ut_page_video_tablet_version' => 'on'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_video_tablet_webm',
                    'metapanel' => 'ut-hero-video',
                    'label' => 'WEBM',
                    'desc' => 'In HTML5, there are 3 supported video formats: MP4, WebM, and Ogg. Please make sure you provide all 3 file types to grant best browser support.',
                    'type' => 'upload',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'video',
                        'ut_page_video_source' => 'selfhosted',
                        'ut_page_video_tablet_version' => 'on'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_video_mobile_version',
                    'metapanel' => 'ut-hero-video',
                    'label' => 'Add mobile version of Video?',
                    'desc' => 'Select your desired source for videos on mobiles devices. <strong>Note, that this is a real device query, you have to check the output with a real device.</strong>',
                    'type' => 'select',
                    'std' => 'off',
                    'choices' => array(
                        array(
                            'value' => 'off',
                            'label' => 'no, thanks!'
                        ),
                        array(
                            'value' => 'on',
                            'label' => 'yes, please!'
                        )
                    ),
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'video',
                        'ut_page_video_source' => 'selfhosted'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_video_mobile_mp4',
                    'metapanel' => 'ut-hero-video',
                    'label' => 'MP4',
                    'desc' => 'In HTML5, there are 3 supported video formats: MP4, WebM, and Ogg. Please make sure you provide all 3 file types to grant best browser support.',
                    'type' => 'upload',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'video',
                        'ut_page_video_source' => 'selfhosted',
                        'ut_page_video_mobile_version' => 'on'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_video_mobile_ogg',
                    'metapanel' => 'ut-hero-video',
                    'label' => 'OGG',
                    'desc' => 'In HTML5, there are 3 supported video formats: MP4, WebM, and Ogg. Please make sure you provide all 3 file types to grant best browser support.',
                    'type' => 'upload',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'video',
                        'ut_page_video_source' => 'selfhosted',
                        'ut_page_video_mobile_version' => 'on'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_video_mobile_webm',
                    'metapanel' => 'ut-hero-video',
                    'label' => 'WEBM',
                    'desc' => 'In HTML5, there are 3 supported video formats: MP4, WebM, and Ogg. Please make sure you provide all 3 file types to grant best browser support.',
                    'type' => 'upload',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'video',
                        'ut_page_video_source' => 'selfhosted',
                        'ut_page_video_mobile_version' => 'on'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_video_loop',
                    'metapanel' => 'ut-hero-video',
                    'label' => 'Loop Video',
                    'desc' => 'Whether the video should start over again when finished.',
                    'type' => 'select',
                    'std' => 'on',
                    'choices' => array(
                        array(
                            'label' => 'yes, please!',
                            'value' => 'on'
                        ),
                        array(
                            'label' => 'no, thanks!',
                            'value' => 'off'
                        )

                    ),
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'video',
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_video_preload',
                    'metapanel' => 'ut-hero-video',
                    'label' => 'Preload Video',
                    'desc' => 'Whether the video should be loaded when the page loads.',
                    'type' => 'select',
                    'std' => 'on',
                    'choices' => array(
                        array(
                            'label' => 'yes, please!',
                            'value' => 'on'
                        ),
                        array(
                            'label' => 'no, thanks!',
                            'value' => 'off'
                        )
                    ),
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'video',
                        'ut_page_video_source' => 'selfhosted'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_video_sound',
                    'metapanel' => 'ut-hero-video',
                    'label' => 'Activate video sound after page is loaded?',
                    'desc' => '<strong>(optional)</strong>. Play sound directly when page is loaded.',
                    'std' => 'off',
                    'type' => 'select',
                    'choices' => array(
                        array(
                            'value' => 'on',
                            'label' => 'yes, please!'
                        ),
                        array(
                            'value' => 'off',
                            'label' => 'no, thanks!'
                        )
                    ),
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'video'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_video_volume',
                    'metapanel' => 'ut-hero-video',
                    'label' => 'Video Volume',
                    'desc' => '1-100 - default 5',
                    'std' => '5',
                    'type' => 'numeric-slider',
                    'min_max_step' => '0,100,1',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'video',
                        'ut_page_video_source' => 'youtube|selfhosted|vimeo'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_video_mute_button',
                    'metapanel' => 'ut-hero-video',
                    'label' => 'Show Mute Button?',
                    'desc' => 'Whether the video mute button is displayed or not.',
                    'type' => 'select',
                    'std' => 'hide',
                    'choices' => array(
                        array(
                            'label' => 'yes, please!',
                            'value' => 'show'
                        ),
                        array(
                            'label' => 'no, thanks!',
                            'value' => 'hide'
                        )

                    ),
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'video',
                        'ut_page_video_source' => 'youtube|selfhosted|vimeo'
                    ),
                    'pages' => $post_type_support_2,
                ),

	            array(
		            'id' => 'ut_page_video_vimeo_tracking',
		            'metapanel' => 'ut-hero-video',
		            'label' => 'Deactivate Vimeo Tracking?',
		            'desc' => 'Will block the player from tracking any session data, including all cookies and stats.',
		            'type' => 'select',
		            'std' => false,
		            'choices' => array(
			            array(
				            'label' => 'no, thanks!',
				            'value' => false
			            ),
			            array(
				            'label' => 'yes, please!',
				            'value' => true
			            )
		            ),
		            'required' => array(
			            'ut_activate_page_hero' => 'on',
			            'ut_page_hero_type' => 'video',
			            'ut_page_video_source' => 'vimeo'
		            ),
		            'pages' => $post_type_support_2,
	            ),

                /*
                 * Video Poster
                 */

                array(
                    'id' => 'ut_page_video_poster_headline',
                    'metapanel' => 'ut-hero-video-poster',
                    'label' => 'Video Poster',
                    'type' => 'panel_headline',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'video'
                    ),
                ),                
                
                array(
                    'id' => 'ut_page_video_poster',
                    'metapanel' => 'ut-hero-video-poster',
                    'label' => 'Poster Image',
                    'desc' => 'This image will be displayed before the video starts.',
                    'type' => 'upload',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'video',
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_video_poster_background_position',
                    'metapanel' => 'ut-hero-video-poster',
                    'label' => 'Poster Image Background Position',
                    'desc' => 'The background position of the video poster on desktop devices.',
                    'type' => 'select',
                    'choices' => array(
                        array(
                            'label' => 'background-position',
                            'value' => ''
                        ),
                        array(
                            'label' => 'Left Top',
                            'value' => 'left top'
                        ),
                        array(
                            'label' => 'Left Center',
                            'value' => 'left center'
                        ),
                        array(
                            'label' => 'Left Bottom',
                            'value' => 'left bottom'
                        ),
                        array(
                            'label' => 'Center Top',
                            'value' => 'center top'
                        ),
                        array(
                            'label' => 'Center Center',
                            'value' => 'center center'
                        ),
                        array(
                            'label' => 'Center Bottom',
                            'value' => 'center bottom'
                        ),
                        array(
                            'label' => 'Right Top',
                            'value' => 'right top'
                        ),
                        array(
                            'label' => 'Right Center',
                            'value' => 'right center'
                        ),
                        array(
                            'label' => 'Right Bottom',
                            'value' => 'right bottom'
                        ),
                    ),
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'video',
                    ),
                ),

                array(
                    'id' => 'ut_page_video_poster_tablet',
                    'metapanel' => 'ut-hero-video-poster',
                    'label' => 'Poster Image Tablet',
                    'desc' => 'Recommended size 1280x1280. We recommend using <a href="https://goo.gl/Sj149K" target="_blank">Kraken.io</a> services for image optimization.',
                    'type' => 'upload',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'video',
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_video_poster_tablet_background_position',
                    'metapanel' => 'ut-hero-video-poster',
                    'label' => 'Poster Image Background Position',
                    'desc' => 'The background position of the video poster on tablet devices.',
                    'type' => 'select',
                    'choices' => array(
                        array(
                            'label' => 'background-position',
                            'value' => ''
                        ),
                        array(
                            'label' => 'Left Top',
                            'value' => 'left top'
                        ),
                        array(
                            'label' => 'Left Center',
                            'value' => 'left center'
                        ),
                        array(
                            'label' => 'Left Bottom',
                            'value' => 'left bottom'
                        ),
                        array(
                            'label' => 'Center Top',
                            'value' => 'center top'
                        ),
                        array(
                            'label' => 'Center Center',
                            'value' => 'center center'
                        ),
                        array(
                            'label' => 'Center Bottom',
                            'value' => 'center bottom'
                        ),
                        array(
                            'label' => 'Right Top',
                            'value' => 'right top'
                        ),
                        array(
                            'label' => 'Right Center',
                            'value' => 'right center'
                        ),
                        array(
                            'label' => 'Right Bottom',
                            'value' => 'right bottom'
                        ),
                    ),
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'video',
                    ),
                ),

                array(
                    'id' => 'ut_page_video_poster_mobile',
                    'metapanel' => 'ut-hero-video-poster',
                    'label' => 'Poster Image Mobile',
                    'desc' => 'Recommended size 720x1280. We recommend using <a href="https://goo.gl/Sj149K" target="_blank">Kraken.io</a> services for image optimization.',
                    'type' => 'upload',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'video',
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_video_poster_mobile_background_position',
                    'metapanel' => 'ut-hero-video-poster',
                    'label' => 'Poster Image Background Position',
                    'desc' => 'The background position of the video poster on mobile devices.',
                    'type' => 'select',
                    'choices' => array(
                        array(
                            'label' => 'background-position',
                            'value' => ''
                        ),
                        array(
                            'label' => 'Left Top',
                            'value' => 'left top'
                        ),
                        array(
                            'label' => 'Left Center',
                            'value' => 'left center'
                        ),
                        array(
                            'label' => 'Left Bottom',
                            'value' => 'left bottom'
                        ),
                        array(
                            'label' => 'Center Top',
                            'value' => 'center top'
                        ),
                        array(
                            'label' => 'Center Center',
                            'value' => 'center center'
                        ),
                        array(
                            'label' => 'Center Bottom',
                            'value' => 'center bottom'
                        ),
                        array(
                            'label' => 'Right Top',
                            'value' => 'right top'
                        ),
                        array(
                            'label' => 'Right Center',
                            'value' => 'right center'
                        ),
                        array(
                            'label' => 'Right Bottom',
                            'value' => 'right bottom'
                        ),
                    ),
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'video',
                    ),
                ),

                /**
                 * Custom Shortcode
                 */

                array(
                    'id' => 'ut_page_hero_custom_shortcode_headline',
                    'metapanel' => 'ut-hero-type-general',
                    'label' => 'Custom Shortcode',
                    'type' => 'section_headline',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'custom'
                    ),
                ),
                array(
                    'id' => 'ut_page_hero_custom_shortcode',
                    'metapanel' => 'ut-hero-type-general',
                    'label' => 'Enter Custom Shortcode',
                    'desc' => 'Perfect for plugin shortcodes such as Revolution Slider or Layer Slider.',
                    'type' => 'text',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'custom'
                    ),
                    'pages' => $post_type_support_2,
                ),

                /**
                 * Hero Styling
                 */
				
                // Hero Caption
                array(
                    'id' => 'ut_hero_styling',
                    'metapanel' => 'ut-hero-caption-style-settings',
                    'label' => 'Caption Style',
                    'type' => 'panel_headline',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_type' => 'image|animatedimage|imagefader|splithero|tabs|video',
                    ),
                ),

                array(
                    'id' => 'ut_page_hero_style_global_overwrite',
                    'metapanel' => 'ut-hero-caption-style-settings',
                    'label' => 'Use Global Hero Caption Style Settings?',
                    'desc' => '<strong>(optional)</strong>',
                    'type' => 'select',
                    'choices' => array(
                        array(
                            'value' => 'on',
                            'label' => 'yes, please!'
                        ),
                        array(
                            'value' => 'off',
                            'label' => 'no, thanks!'
                        )

                    ), /* end choices */
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_type' => 'image|animatedimage|imagefader|splithero|tabs|video',
                    ),
                ),

                array(
                    'id' => 'ut_page_hero_style',
                    'metapanel' => 'ut-hero-caption-style-settings',
                    'label' => 'Hero Caption Style',
                    'desc' => 'Choose between 10 different Hero Caption styles. If you are using a slider as your desired header type, you can define an individual style for each slide.',
                    'type' => 'select',
                    'std' => ot_get_option( 'ut_global_hero_style' ),
                    'choices' => array(
                        array(
                            'value' => 'ut-hero-style-1',
                            'label' => 'Style One',
                            'src' => ''
                        ),
                        array(
                            'value' => 'ut-hero-style-2',
                            'label' => 'Style Two'
                        ),
                        array(
                            'value' => 'ut-hero-style-3',
                            'label' => 'Style Three'
                        ),
                        array(
                            'value' => 'ut-hero-style-4',
                            'label' => 'Style Four'
                        ),
                        array(
                            'value' => 'ut-hero-style-5',
                            'label' => 'Style Five'
                        ),
                        array(
                            'value' => 'ut-hero-style-6',
                            'label' => 'Style Six'
                        ),
                        array(
                            'value' => 'ut-hero-style-7',
                            'label' => 'Style Seven'
                        ),
                        array(
                            'value' => 'ut-hero-style-8',
                            'label' => 'Style Eight'
                        ),
                        array(
                            'value' => 'ut-hero-style-9',
                            'label' => 'Style Nine'
                        ),
                        array(
                            'value' => 'ut-hero-style-10',
                            'label' => 'Style Ten'
                        ),

                    ),
                    'required' => array(
                        'ut_page_hero_type' => 'splithero|image|animatedimage|imagefader|tabs|video',
                        'ut_page_hero_style_global_overwrite' => 'off'
                    ),
                    'pages' => $post_type_support_2,

                ),

                array(
                    'id' => 'ut_page_hero_style_7_border_color',
                    'metapanel' => 'ut-hero-caption-style-settings',
                    'label' => 'Caption Style Seven Border Color',
                    'desc' => '<strong>(optional)</strong> - default: same as Title Color',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'required' => array(
                        'ut_page_hero_type' => 'splithero|image|animatedimage|imagefader|tabs|video',
                        'ut_page_hero_style_global_overwrite' => 'off',
                        'ut_page_hero_style' => 'ut-hero-style-7'
                    ),
                    'pages' => $post_type_support_5,
                ),
                array(
                    'id' => 'ut_page_hero_style_5_border_bottom',
                    'metapanel' => 'ut-hero-caption-style-settings',
                    'label' => 'Activate Border Bottom?',
                    'desc' => 'An additional Border Bottom',
                    'type' => 'select',
                    'std' => 'center',
                    'choices' => array(
                        array(
                            'value' => 'off',
                            'label' => 'no, thanks!'
                        ),
                        array(
                            'value' => 'on',
                            'label' => 'yes, please!'
                        )                    
                    ),
                    'required' => array(
                        'ut_page_hero_type' => 'splithero|image|animatedimage|imagefader|tabs|video',
                        'ut_page_hero_style_global_overwrite' => 'off',
                        'ut_page_hero_style' => 'ut-hero-style-5',
                    ),
                    'pages' => $post_type_support_5,
                    
                ),            
                array(
                    'id' => 'ut_page_hero_style_5_border_color',
                    'metapanel' => 'ut-hero-caption-style-settings',
                    'label' => 'Caption Style Five Decoration Line Color',
                    'desc' => '<strong>(optional)</strong>',
                    'type' => 'colorpicker',
                    'required' => array(
                        'ut_page_hero_type' => 'splithero|image|animatedimage|imagefader|tabs|video',
                        'ut_page_hero_style_global_overwrite' => 'off',
                        'ut_page_hero_style' => 'ut-hero-style-5',
                        'ut_page_hero_style_5_border_bottom' => 'on'
                    ),
                    'pages' => $post_type_support_5,
                ),
                array(
                    'id' => 'ut_page_hero_style_5_border_height',
                    'metapanel' => 'ut-hero-caption-style-settings',
                    'label' => 'Caption Style Five Decoration Line Thickness',
                    'desc' => '<strong>(optional)</strong> - value in px , default: 1px',
                    'type' => 'text',
                    'required' => array(
                        'ut_page_hero_type' => 'splithero|image|animatedimage|imagefader|tabs|video',
                        'ut_page_hero_style_global_overwrite' => 'off',
                        'ut_page_hero_style' => 'ut-hero-style-5',
                        'ut_page_hero_style_5_border_bottom' => 'on'
                    ),
                    'pages' => $post_type_support_5,
                ),
                array(
                    'id' => 'ut_page_hero_style_5_border_width',
                    'metapanel' => 'ut-hero-caption-style-settings',
                    'label' => 'Caption Style Five Decoration Line Width',
                    'desc' => '<strong>(optional)</strong> - value in % or px , default: 30px',
                    'type' => 'text',
                    'required' => array(
                        'ut_page_hero_type' => 'splithero|image|animatedimage|imagefader|tabs|video',
                        'ut_page_hero_style_global_overwrite' => 'off',
                        'ut_page_hero_style' => 'ut-hero-style-5',
                        'ut_page_hero_style_5_border_bottom' => 'on'
                    ),
                    'pages' => $post_type_support_5,
                ),
                array(
                    'id' => 'ut_page_hero_style_5_spacing_top',
                    'metapanel' => 'ut-hero-caption-style-settings',
                    'label' => 'Caption Style Five Decoration Line Spacing Top',
                    'desc' => '<strong>(optional)</strong> - value in % or px , default: 15px',
                    'type' => 'text',
                    'required' => array(
                        'ut_page_hero_type' => 'splithero|image|animatedimage|imagefader|tabs|video',
                        'ut_page_hero_style_global_overwrite' => 'off',
                        'ut_page_hero_style' => 'ut-hero-style-5',
                        'ut_page_hero_style_5_border_bottom' => 'on'
                    ),
                    'pages' => $post_type_support_5,
                ), 
                
                array(
                    'id' => 'ut_page_hero_style_5_border_bottom',
                    'metapanel' => 'ut-hero-caption-style-settings',
                    'label' => 'Activate Border Bottom?',
                    'desc' => 'An additional Border Bottom',
                    'type' => 'select',
                    'std' => 'center',
                    'choices' => array(
                        array(
                            'value' => 'off',
                            'label' => 'no, thanks!'
                        ),
                        array(
                            'value' => 'on',
                            'label' => 'yes, please!'
                        )                    
                    ),
                    'required' => array(
                        'ut_page_hero_type' => 'splithero|image|animatedimage|imagefader|tabs|video',
                        'ut_page_hero_style_global_overwrite' => 'off',
                        'ut_portfolio_hero_style' => 'ut-hero-style-5',
                    ),
                    'pages' => $post_type_support_3,
                    
                ),            
                array(
                    'id' => 'ut_page_hero_style_5_border_color',
                    'metapanel' => 'ut-hero-caption-style-settings',
                    'label' => 'Caption Style Five Decoration Line Color',
                    'desc' => '<strong>(optional)</strong>',
                    'type' => 'colorpicker',
                    'required' => array(
                        'ut_page_hero_type' => 'splithero|image|animatedimage|imagefader|tabs|video',
                        'ut_page_hero_style_global_overwrite' => 'off',
                        'ut_portfolio_hero_style' => 'ut-hero-style-5',
                        'ut_page_hero_style_5_border_bottom' => 'on'
                    ),
                    'pages' => $post_type_support_3,
                ),
                array(
                    'id' => 'ut_page_hero_style_5_border_height',
                    'metapanel' => 'ut-hero-caption-style-settings',
                    'label' => 'Caption Style Five Decoration Line Thickness',
                    'desc' => '<strong>(optional)</strong> - value in px , default: 1px',
                    'type' => 'text',
                    'required' => array(
                        'ut_page_hero_type' => 'splithero|image|animatedimage|imagefader|tabs|video',
                        'ut_page_hero_style_global_overwrite' => 'off',
                        'ut_portfolio_hero_style' => 'ut-hero-style-5',
                        'ut_page_hero_style_5_border_bottom' => 'on'
                    ),
                    'pages' => $post_type_support_3,
                ),
                array(
                    'id' => 'ut_page_hero_style_5_border_width',
                    'metapanel' => 'ut-hero-caption-style-settings',
                    'label' => 'Caption Style Five Decoration Line Width',
                    'desc' => '<strong>(optional)</strong> - value in % or px , default: 30px',
                    'type' => 'text',
                    'required' => array(
                        'ut_page_hero_type' => 'splithero|image|animatedimage|imagefader|tabs|video',
                        'ut_page_hero_style_global_overwrite' => 'off',
                        'ut_portfolio_hero_style' => 'ut-hero-style-5',
                        'ut_page_hero_style_5_border_bottom' => 'on'
                    ),
                    'pages' => $post_type_support_3,
                ),
                array(
                    'id' => 'ut_page_hero_style_5_spacing_top',
                    'metapanel' => 'ut-hero-caption-style-settings',
                    'label' => 'Caption Style Five Decoration Line Spacing Top',
                    'desc' => '<strong>(optional)</strong> - value in % or px , default: 15px',
                    'type' => 'text',
                    'required' => array(
                        'ut_page_hero_type' => 'splithero|image|animatedimage|imagefader|tabs|video',
                        'ut_page_hero_style_global_overwrite' => 'off',
                        'ut_portfolio_hero_style' => 'ut-hero-style-5',
                        'ut_page_hero_style_5_border_bottom' => 'on'
                    ),
                    'pages' => $post_type_support_3,
                ), 
                
                array(
                    'id' => 'ut_page_hero_font_style_global_overwrite',
                    'metapanel' => 'ut-hero-caption-style-settings',
                    'label' => 'Use Global Hero Caption Font Style Setting?',
                    'desc' => '<strong>(optional)</strong>',
                    'type' => 'select',
                    'choices' => array(
                        array(
                            'value' => 'on',
                            'label' => 'yes, please!'
                        ),
                        array(
                            'value' => 'off',
                            'label' => 'no, thanks!'
                        )

                    ), /* end choices */
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_type' => 'image|animatedimage|imagefader|splithero|tabs|video',
                    ),
                ),

                array(
                    'id' => 'ut_page_hero_font_style',
                    'metapanel' => 'ut-hero-caption-style-settings',
                    'label' => 'Hero Caption Font Style',
                    'desc' => 'Please keep in mind, that your selected font needs to support the selected font weight.',
                    'type' => 'select',
                    'choices' => array(

                        array(
                            'value' => 'extralight',
                            'label' => 'Extralight'
                        ),
                        array(
                            'value' => 'light',
                            'label' => 'Light'
                        ),
                        array(
                            'value' => 'regular',
                            'label' => 'Regular'
                        ),
                        array(
                            'value' => 'medium',
                            'label' => 'Medium'
                        ),
                        array(
                            'value' => 'semibold',
                            'label' => 'Semi Bold'
                        ),
                        array(
                            'value' => 'bold',
                            'label' => 'Bold'
                        )

                    ),
                    'required' => array(
                        'ut_page_hero_type' => 'image|animatedimage|imagefader|splithero|tabs|video',
                        'ut_page_hero_font_style_global_overwrite' => 'off'
                    ),
                    'pages' => $post_type_support_2,
                ),

                // Hero Background Settings
                array(
                    'id' => 'ut_page_hero_background_headline',
                    'metapanel' => 'ut-hero-styling-background-settings',
                    'label' => 'Background',
                    'type' => 'panel_headline',
                    'pages' => $post_type_support_2
                ),
                array(
                    'id' => 'ut_page_hero_background_color',
                    'metapanel' => 'ut-hero-styling-background-settings',
                    'label' => 'Hero Background Color',
                    'desc' => '<strong>(required)</strong> This color cannot be empty and is required to assist the hero fadeIn animation.',
                    'type' => 'gradient_colorpicker',
                    'global' => 'on',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_activate_page_hero' => 'on'
                    ),
                ),

                // Hero Overlay Settings
                array(
                    'id' => 'ut_page_hero_overlay_headline',
                    'metapanel' => 'ut-hero-styling-overlay-settings',
                    'label' => 'Hero Overlay Settings',
                    'type' => 'panel_headline',
                    'pages' => $post_type_support_2,
                    'required' => array(
	                    'ut_page_hero_type' => 'image|animatedimage|imagefader|splithero|tabs|video|transition|slider',
                    ),
                ),

                array(
                    'id' => 'ut_page_hero_overlay_global_overwrite',
                    'metapanel' => 'ut-hero-styling-overlay-settings',
                    'label' => 'Use Global Hero Overlay Setting?',
                    'desc' => '<strong>(optional)</strong>',
                    'type' => 'select',
                    'choices' => array(
                        array(
                            'value' => 'on',
                            'label' => 'yes, please!'
                        ),
                        array(
                            'value' => 'off',
                            'label' => 'no, thanks!'
                        )

                    ), /* end choices */
                    'pages' => $post_type_support_2,
                    'required' => array(
	                    'ut_page_hero_type' => 'image|animatedimage|imagefader|splithero|tabs|video|transition|slider',
                    ),
                ),

                array(
                    'id' => 'ut_page_hero_overlay',
                    'metapanel' => 'ut-hero-styling-overlay-settings',
                    'label' => 'Activate Hero Overlay?',
                    'desc' => '<strong>(optional)</strong> A smooth overlay with optional design patterns.',
                    'std' => ot_get_option( 'ut_global_hero_overlay' ),
                    'type' => 'select',
                    'choices' => array(
                        array(
                            'value' => 'on',
                            'label' => 'On'
                        ),
                        array(
                            'value' => 'off',
                            'label' => 'Off'
                        )
                    ),
                    'required' => array(
                        'ut_page_hero_type' => 'image|animatedimage|imagefader|splithero|slider|tabs|video|transition|slider',
                        'ut_page_hero_overlay_global_overwrite' => 'off'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_hero_overlay_color',
                    'metapanel' => 'ut-hero-styling-overlay-settings',
                    'label' => 'Hero Overlay Color',
                    'desc' => '<strong>(optional)</strong>',
                    'std' => ot_get_option( 'ut_global_hero_overlay_color' ),
                    'type' => 'gradient_colorpicker',
                    'required' => array(
                        'ut_page_hero_type' => 'image|animatedimage|imagefader|splithero|slider|tabs|video|transition|slider',
                        'ut_page_hero_overlay' => 'on',
                        'ut_page_hero_overlay_global_overwrite' => 'off'
                    ),
                    'pages' => $post_type_support_2,

                ),

                array(
                    'id' => 'ut_page_hero_overlay_color_opacity',
                    'metapanel' => 'ut-hero-styling-overlay-settings',
                    'label' => 'Hero Overlay Color Opacity',
                    'desc' => '<strong>(deprecated)</strong> Only works if Hero Overlay Color is a HEX Color.',
                    'type' => 'numeric-slider',
                    'std' => ot_get_option( 'ut_global_hero_overlay_color_opacity' ),
                    'min_max_step' => '0,1,0.05',
                    'required' => array(
                        'ut_page_hero_type' => 'image|animatedimage|imagefader|splithero|slider|tabs|video|transition|slider',
                        'ut_page_hero_overlay' => 'on',
                        'ut_page_hero_overlay_global_overwrite' => 'off'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_hero_overlay_pattern',
                    'metapanel' => 'ut-hero-styling-overlay-settings',
                    'label' => 'Activate Hero Overlay Pattern',
                    'desc' => '<strong>(optional)</strong>',
                    'std' => ot_get_option( 'ut_global_hero_overlay_pattern' ),
                    'type' => 'select',
                    'choices' => array(
                        array(
                            'value' => 'on',
                            'label' => 'On'
                        ),
                        array(
                            'value' => 'off',
                            'label' => 'Off'
                        )
                    ),
                    'required' => array(
                        'ut_page_hero_type' => 'image|animatedimage|imagefader|splithero|slider|tabs|video',
                        'ut_page_hero_overlay' => 'on',
                        'ut_page_hero_overlay_global_overwrite' => 'off'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_hero_overlay_pattern_style',
                    'metapanel' => 'ut-hero-styling-overlay-settings',
                    'label' => 'Hero Overlay Pattern Style',
                    'desc' => '<strong>(optional)</strong>',
                    'std' => ot_get_option( 'ut_global_hero_overlay_pattern_style' ),
                    'type' => 'select',
                    'choices' => array(
                        array(
                            'value' => 'style_one',
                            'label' => 'Style One'
                        ),
                        array(
                            'value' => 'style_two',
                            'label' => 'Style Two'
                        ),
                        array(
                            'value' => 'style_three',
                            'label' => 'Style Three'
                        ),
                        array(
                            'value' => 'style_four',
                            'label' => 'Style Four (Circuit Board)'
                        )
                    ),
                    'required' => array(
                        'ut_page_hero_type' => 'image|animatedimage|imagefader|splithero|slider|tabs|video|audio',
                        'ut_page_hero_overlay' => 'on',
                        'ut_page_hero_overlay_pattern' => 'on',
                        'ut_page_hero_overlay_global_overwrite' => 'off'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_hero_overlay_effect_headline',
                    'metapanel' => 'ut-hero-styling-overlay-settings',
                    'label' => 'Hero Overlay Effect Settings',
                    'type' => 'section_headline',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_type' => 'image|animatedimage|imagefader|splithero|tabs|video|audio|slider',
                    ),
                ),


                array(
                    'id' => 'ut_page_hero_overlay_effect_global_overwrite',
                    'metapanel' => 'ut-hero-styling-overlay-settings',
                    'label' => 'Use Global Hero Overlay Effect Setting?',
                    'desc' => '<strong>(optional)</strong>',
                    'type' => 'select',
                    'choices' => array(
                        array(
                            'value' => 'on',
                            'label' => 'yes, please!'
                        ),
                        array(
                            'value' => 'off',
                            'label' => 'no, thanks!'
                        )

                    ), /* end choices */
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_type' => 'image|animatedimage|imagefader|splithero|tabs|video|slider',
                    ),
                ),

                array(
                    'id' => 'ut_page_hero_overlay_effect',
                    'metapanel' => 'ut-hero-styling-overlay-settings',
                    'label' => 'Activate Overlay Animation Effect?',
                    'desc' => '<strong>(optional)</strong>',
                    'std' => ot_get_option( 'ut_global_hero_overlay_effect' ),
                    'type' => 'select',
                    'choices' => array(
                        array(
                            'value' => 'on',
                            'label' => 'On'
                        ),
                        array(
                            'value' => 'off',
                            'label' => 'Off'
                        )
                    ),
                    'required' => array(
                        'ut_page_hero_type' => 'image|animatedimage|imagefader|splithero|tabs|video|slider',
                        'ut_page_hero_overlay_effect_global_overwrite' => 'off'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_hero_overlay_effect_style',
                    'metapanel' => 'ut-hero-styling-overlay-settings',
                    'label' => 'Choose Overlay Animation Effect',
                    'desc' => '<strong>(optional)</strong>',
                    'std' => ot_get_option( 'ut_global_hero_overlay_effect_style' ),
                    'type' => 'select',
                    'choices' => array(
                        array(
                            'value' => 'dots',
                            'label' => 'Connecting Dots'
                        ),
                        array(
                            'value' => 'bubbles',
                            'label' => 'Rising Bubbles'
                        )
                    ),
                    'required' => array(
                        'ut_page_hero_overlay_effect' => 'on',
                        'ut_page_hero_overlay_effect_global_overwrite' => 'off',
                        'ut_page_hero_type' => 'image|animatedimage|imagefader|splithero|tabs|video|slider',
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_hero_overlay_effect_color',
                    'metapanel' => 'ut-hero-styling-overlay-settings',
                    'label' => 'Overlay Effect Color',
                    'desc' => '<strong>(optional)</strong>. Leave this field empty if you like to keep the theme accentcolor as effect color.',
                    'type' => 'colorpicker',
                    'std' => ot_get_option( 'ut_global_hero_overlay_effect_color' ),
                    'required' => array(
                        'ut_page_hero_overlay_effect' => 'on',
                        'ut_page_hero_overlay_effect_global_overwrite' => 'off',
                        'ut_page_hero_type' => 'image|animatedimage|imagefader|splithero|tabs|video|slider',
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                // Hero Border Settings
                array(
                    'id' => 'ut_page_hero_border_headline',
                    'metapanel' => 'ut-hero-styling-border-settings',
                    'label' => 'Hero Border Settings',
                    'type' => 'panel_headline',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_type' => 'image|animatedimage|imagefader|splithero|tabs|video|custom',
                    ),
                ),

                array(
                    'id' => 'ut_page_hero_border_bottom_global_overwrite',
                    'metapanel' => 'ut-hero-styling-border-settings',
                    'label' => 'Use Global Hero Border Setting?',
                    'desc' => '<strong>(optional)</strong>',
                    'type' => 'select',
                    'choices' => array(
                        array(
                            'value' => 'on',
                            'label' => 'yes, please!'
                        ),
                        array(
                            'value' => 'off',
                            'label' => 'no, thanks!'
                        )

                    ), /* end choices */
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_type' => 'image|animatedimage|imagefader|splithero|tabs|video|custom',
                    ),
                ),

                array(
                    'id' => 'ut_page_hero_border_bottom',
                    'metapanel' => 'ut-hero-styling-border-settings',
                    'label' => 'Activate Border?',
                    'desc' => 'A customized CSS border at the bottom of the hero area.',
                    'type' => 'select',
                    'std' => ot_get_option( 'ut_global_hero_border_bottom' ),
                    'toplevel' => false,
                    'choices' => array(
                        array(
                            'label' => 'yes, please!',
                            'value' => 'on'
                        ),
                        array(
                            'label' => 'no, thanks!',
                            'value' => 'off'
                        )
                    ),
                    'std' => 'off',
                    'required' => array(
                        'ut_page_hero_border_bottom_global_overwrite' => 'off'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_hero_border_bottom_color',
                    'metapanel' => 'ut-hero-styling-border-settings',
                    'label' => 'Border Bottom Color',
                    'type' => 'colorpicker',
                    'std' => 'ut_global_hero_border_bottom_color',
                    'desc' => '<strong>(optional)</strong>',
                    'required' => array(
                        'ut_page_hero_border_bottom' => 'on',
                        'ut_page_hero_border_bottom_global_overwrite' => 'off'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_hero_border_bottom_width',
                    'metapanel' => 'ut-hero-styling-border-settings',
                    'label' => 'Border Bottom Width',
                    'desc' => '<strong>(optional)</strong>',
                    'type' => 'numeric-slider',
                    'std' => ot_get_option( 'ut_global_hero_border_bottom_width' ),
                    'min_max_step' => '1,100',
                    'required' => array(
                        'ut_page_hero_border_bottom' => 'on',
                        'ut_page_hero_border_bottom_global_overwrite' => 'off'

                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_hero_border_bottom_style',
                    'metapanel' => 'ut-hero-styling-border-settings',
                    'label' => 'Border Bottom Style',
                    'type' => 'select',
                    'std' => 'ut_global_hero_border_bottom_style',
                    'desc' => 'Creates a border at the bottom of the hero.',
                    'choices' => array(
                        array(
                            'label' => 'dashed',
                            'value' => 'dashed'
                        ),
                        array(
                            'label' => 'dotted',

                            'value' => 'dotted'
                        ),
                        array(
                            'label' => 'solid',
                            'value' => 'solid'
                        ),
                        array(
                            'label' => 'double',
                            'value' => 'double'
                        )
                    ),
                    'std' => 'solid',
                    'required' => array(
                        'ut_page_hero_border_bottom' => 'on',
                        'ut_page_hero_border_bottom_global_overwrite' => 'off'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_hero_fancy_border_global_overwrite',
                    'metapanel' => 'ut-hero-styling-border-settings',
                    'label' => 'Use Global Hero Fancy Border Setting?',
                    'desc' => '<strong>(optional)</strong>',
                    'type' => 'select',
                    'choices' => array(
                        array(
                            'value' => 'on',
                            'label' => 'yes, please!'
                        ),
                        array(
                            'value' => 'off',
                            'label' => 'no, thanks!'
                        )

                    ), /* end choices */
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_type' => 'image|animatedimage|imagefader|splithero|tabs|video|transition',
                    ),
                ),

                array(
                    'id' => 'ut_page_hero_fancy_border',
                    'metapanel' => 'ut-hero-styling-border-settings',
                    'label' => 'Activate Fancy Border?',
                    'desc' => 'Allows you to create a nice fancy border at the bottom of your hero area.',
                    'type' => 'select',
                    'std' => ot_get_option( 'ut_global_hero_fancy_border' ),
                    'toplevel' => false,
                    'choices' => array(
                        array(
                            'label' => 'yes, please!',
                            'value' => 'on'
                        ),
                        array(
                            'label' => 'no, thanks!',
                            'value' => 'off'
                        )
                    ),
                    'std' => 'off',
                    'required' => array(
                        'ut_page_hero_fancy_border_global_overwrite' => 'off'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_fancy_border_color',
                    'metapanel' => 'ut-hero-styling-border-settings',
                    'label' => 'Color',
                    'type' => 'colorpicker',
                    'std' => ot_get_option( 'ut_global_hero_fancy_border_color' ),
                    'desc' => '<strong>(optional)</strong>',
                    'required' => array(
                        'ut_page_hero_fancy_border' => 'on',
                        'ut_page_hero_fancy_border_global_overwrite' => 'off'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_fancy_border_background_color',
                    'metapanel' => 'ut-hero-styling-border-settings',
                    'label' => 'Background Color',
                    'type' => 'colorpicker',
                    'std' => ot_get_option( 'ut_global_hero_fancy_border_background_color' ),
                    'desc' => '<strong>(optional)</strong>',
                    'required' => array(
                        'ut_page_hero_fancy_border' => 'on',
                        'ut_page_hero_fancy_border_global_overwrite' => 'off'
                    ),
                    'pages' => $post_type_support_2,
                ),
                array(
                    'id' => 'ut_page_fancy_border_size',
                    'metapanel' => 'ut-hero-styling-border-settings',
                    'label' => 'Size',
                    'desc' => '<strong>(optional)</strong> -  include "px" in your string. e.g. 30px (default: 10px)',
                    'type' => 'text',
                    'std' => ot_get_option( 'ut_global_hero_fancy_border_size' ),
                    'required' => array(
                        'ut_page_hero_fancy_border' => 'on',
                        'ut_page_hero_fancy_border_global_overwrite' => 'off'
                    ),
                    'pages' => $post_type_support_2,
                ),

                /**
                 * Hero Settings
                 */

                array(
                    'id' => 'ut_page_hero_caption_position_settings',
                    'metapanel' => 'ut-hero-caption-position-settings',
                    'label' => 'Caption Position Settings',
                    'type' => 'panel_headline',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'image|animatedimage|imagefader|splithero|tabs|video',
                    ),
                ),

                array(
                    'id' => 'ut_page_hero_width',
                    'label' => 'Hero Content Width',
                    'desc' => 'Decide if the hero content gets stretched to fullwidth or displays centered.',
                    'metapanel' => 'ut-hero-caption-position-settings',
                    'type' => 'select',
                    'global' => 'on',
                    'choices' => array(
                        array(
                            'value' => 'centered',
                            'label' => 'Grid Based'
                        ),
                        array(
                            'value' => 'fullwidth',
                            'label' => 'Fullwidth'
                        ),
                    ),
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'image|animatedimage|imagefader|splithero|video',
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_hero_inner_width',
                    'label' => 'Hero Inner Width',
                    'desc' => 'Use the slider bar to set your desired hero inner width in %.',
                    'metapanel' => 'ut-hero-caption-position-settings',
                    'type' => 'numeric_slider',
                    'std' => '100',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'image|video|animatedimage|imagefader|splithero'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_hero_inner_width_tablet',
                    'label' => 'Hero Inner Width Tablet',
                    'desc' => 'Use the slider bar to set your desired hero inner width in %.',
                    'metapanel' => 'ut-hero-caption-position-settings',
                    'type' => 'numeric_slider',
                    'std' => '100',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'image|video|animatedimage|imagefader|splithero'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_hero_align_global_overwrite',
                    'metapanel' => 'ut-hero-caption-position-settings',
                    'label' => 'Use Global Hero Caption Horizontal Alignment Setting?',
                    'desc' => '<strong>(optional)</strong>',
                    'type' => 'select',
                    'choices' => array(
                        array(
                            'value' => 'on',
                            'label' => 'yes, please!'
                        ),
                        array(
                            'value' => 'off',
                            'label' => 'no, thanks!'
                        )

                    ), /* end choices */
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_type' => 'image|animatedimage|imagefader|splithero|tabs|video',
                    ),
                ),

                array(
                    'id' => 'ut_page_hero_align',
                    'metapanel' => 'ut-hero-caption-position-settings',
                    'label' => 'Choose Hero Caption Alignment',
                    'desc' => 'Specifies the default alignment for the caption inside the hero.',
                    'type' => 'select',
                    'std' => ot_get_option( 'ut_global_hero_align' ),
                    'choices' => array(
                        array(
                            'value' => 'center',
                            'label' => 'Center'
                        ),
                        array(
                            'value' => 'left',
                            'label' => 'Left'
                        ),
                        array(
                            'value' => 'right',
                            'label' => 'Right'
                        )
                    ),
                    'required' => array(
                        'ut_page_hero_type' => 'image|animatedimage|imagefader|splithero|tabs|video',
                        'ut_page_hero_align_global_overwrite' => 'off'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_hero_v_align_global_overwrite',
                    'metapanel' => 'ut-hero-caption-position-settings',
                    'label' => 'Use Global Hero Caption Vertical Alignment Setting?',
                    'desc' => '<strong>(optional)</strong>',
                    'type' => 'select',
                    'choices' => array(
                        array(
                            'value' => 'on',
                            'label' => 'yes, please!'
                        ),
                        array(
                            'value' => 'off',
                            'label' => 'no, thanks!'
                        )

                    ), /* end choices */
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_type' => 'image|video|animatedimage|imagefader',
                    ),
                ),

                array(
                    'id' => 'ut_page_hero_v_align',
                    'metapanel' => 'ut-hero-caption-position-settings',
                    'label' => 'Choose Hero Caption Vertical Alignment',
                    'desc' => 'Specifies the default vertical alignment for the caption inside the hero.',
                    'type' => 'select',
                    'std' => ot_get_option( 'ut_global_hero_v_align' ),
                    'choices' => array(
                        array(
                            'value' => 'top',
                            'label' => 'top'
                        ),
                        array(
                            'value' => 'middle',
                            'label' => 'middle'
                        ),
                        array(
                            'value' => 'bottom',
                            'label' => 'bottom'
                        ),
                    ),
                    'required' => array(
                        'ut_page_hero_type' => 'image|video|animatedimage|imagefader',
                        'ut_page_hero_v_align_global_overwrite' => 'off'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_hero_v_align_margin_bottom',
                    'label' => 'Hero Content Margin Bottom',
                    'desc' => 'Leave this field empty if you like to use the global value. Specifies the default bottom space for captions with vertical alignment bottom. Value in pixel e.g. 50px.',
                    'metapanel' => 'ut-hero-caption-position-settings',
                    'type' => 'text',
                    'required' => array(
                        'ut_page_hero_type' => 'image|video|animatedimage|imagefader',
                        'ut_page_hero_v_align' => 'bottom',
                        'ut_page_hero_v_align_global_overwrite' => 'off'
                    ),
                    'pages' => $post_type_support_2,
                ),






















                /* custom html */
                array(
                    'id' => 'ut_hero_settings',
                    'metapanel' => 'ut-hero-content-custom-html-settings',
                    'label' => 'Hero Custom HTML',
                    'type' => 'panel_headline',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_type' => 'image|animatedimage|imagefader|video|tabs|splithero',
                    ),
                ),

                array(
                    'id' => 'ut_page_custom_hero_html',
                    'metapanel' => 'ut-hero-content-custom-html-settings',
                    'label' => 'Custom Hero HTML',
                    'desc' => 'This element appears above the Hero Caption Slogan.',
                    'type' => 'textarea',
                    'markup' => '1_1',
                    'rows' => '10',
                    'pages' => $post_type_support_2,					
                    'required' => array(
                        'ut_page_hero_type' => 'image|animatedimage|imagefader|video|tabs|splithero',
                    ),
                ),
                
                
                /* custom logo */
                array(
                    'id' => 'ut_hero_logo_settings',
                    'metapanel' => 'ut-hero-content-custom-logo-settings',
                    'label' => 'Custom Logo',
                    'type' => 'panel_headline',
                    'pages' => $post_type_support_2,
					'global' => 'on',
                    'required' => array(
                        'ut_page_hero_type' => 'image|animatedimage|imagefader|video|tabs|splithero',
                    ),
                ),
                
                array(
                    'id' => 'ut_page_custom_hero_logo',
                    'metapanel' => 'ut-hero-content-custom-logo-settings',
                    'label' => 'Upload Logo',
                    'desc' => 'This element appears above the Hero Caption Slogan.',
                    'type' => 'upload',
                    'pages' => $post_type_support_2,
					'global' => 'on',
                    'required' => array(
                        'ut_page_hero_type' => 'image|animatedimage|imagefader|video|tabs|splithero',
                    ),
                ),
                
                array(
                    'id' => 'ut_page_hero_custom_logo_max_width',
                    'metapanel' => 'ut-hero-content-custom-logo-settings',
                    'label' => 'Logo Max Width',
                    'desc' => 'Use an alternate max width. Value in percent.',
                    'type' => 'numeric_slider',
                    'min_max_step' => '0,100,1',
                    'pages' => $post_type_support_2,
					'global' => 'on',
                    'required' => array(
                        'ut_page_hero_type' => 'image|animatedimage|imagefader|video|tabs|splithero',
                    ),
                ),

                array(
                    'id' => 'ut_page_hero_custom_logo_max_width_tablet',
                    'metapanel' => 'ut-hero-content-custom-logo-settings',
                    'label' => 'Tablet Logo Max Width',
                    'desc' => 'Use an alternate max width. Value in percent.',
                    'type' => 'numeric_slider',
                    'min_max_step' => '0,100,1',
                    'pages' => $post_type_support_2,
					'global' => 'on',
                    'required' => array(
                        'ut_page_hero_type' => 'image|animatedimage|imagefader|video|tabs|splithero',
                    ),
                ),

                array(
                    'id' => 'ut_page_hero_custom_logo_max_width_mobile',
                    'metapanel' => 'ut-hero-content-custom-logo-settings',
                    'label' => 'Mobile Logo Max Width',
                    'desc' => 'Use an alternate max width. Value in percent.',
                    'type' => 'numeric_slider',
                    'min_max_step' => '0,100,1',
                    'pages' => $post_type_support_2,
					'global' => 'on',
                    'required' => array(
                        'ut_page_hero_type' => 'image|animatedimage|imagefader|video|tabs|splithero',
                    ),
                ),

                array(
                    'id' => 'ut_page_hero_custom_logo_margin_bottom',
                    'metapanel' => 'ut-hero-content-custom-logo-settings',
                    'label' => 'Spacing Bottom',
                    'desc' => 'Set your desired spacing between custom logo and the element below.',
                    'type' => 'numeric_slider',
                    'min_max_step' => '0,100,1',
                    'pages' => $post_type_support_2,
					'global' => 'on',
                    'required' => array(
                        'ut_page_hero_type' => 'image|animatedimage|imagefader|video|tabs|splithero',
                    ),
                ),

                /* caption slogan */
                array(
                    'id' => 'ut_hero_caption_slogan_headline',
                    'metapanel' => 'ut-hero-content-caption-slogan-settings',
                    'label' => 'Hero Caption Slogan Settings',
                    'type' => 'panel_headline',
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_caption_slogan',
                    'metapanel' => 'ut-hero-content-caption-slogan-settings',
                    'label' => 'Text',
                    'desc' => 'This element appears above the Hero Caption Title.',
                    'type' => 'textarea-simple',
                    'rows' => '5',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_type' => 'image|animatedimage|imagefader|video|tabs|splithero',
                    ),
                ),
                
				array(
                    'id' => 'ut_page_caption_slogan_color',
                    'metapanel' => 'ut-hero-content-caption-slogan-settings',
                    'label' => 'Color',
                    'desc' => '<strong>(optional)</strong> - choose an alternate color for <strong>Hero Caption Slogan</strong>.',
                    'type' => 'gradient_colorpicker',
					'global' => 'on',
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_caption_slogan_glow',
                    'metapanel' => 'ut-hero-content-caption-slogan-settings',
                    'label' => 'Gloweffect',
                    'desc' => 'Activate Glow Effect for <strong>Hero Caption Slogan</strong>? Does not work if title color is a gradient color.',
                    'type' => 'select',
                    'global' => 'on',
                    'choices' => array(
                        array(
                            'value' => 'off',
                            'label' => 'no thanks!'
                        ),
                        array(
                            'value' => 'on',
                            'label' => 'yes please!'
                        ),

                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_caption_slogan_glow_color',
                    'metapanel' => 'ut-hero-content-caption-slogan-settings',
                    'label' => 'Glow Color',
                    'desc' => 'Select desired glow color.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_page_caption_slogan_glow' => 'on'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_caption_slogan_glow_shadow_color',
                    'metapanel' => 'ut-hero-content-caption-slogan-settings',
                    'label' => 'Glow Text Shadow Color',
                    'desc' => 'Select desired glow color.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_page_caption_slogan_glow' => 'on'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_caption_slogan_background_color',
                    'metapanel' => 'ut-hero-content-caption-slogan-settings',
                    'label' => 'Background Color',
                    'desc' => '<strong>(optional)</strong> - choose an alternate background color for <strong>Hero Caption Slogan</strong>.',
                    'type' => 'colorpicker',
					'global' => 'on',
                    'pages' => $post_type_support_2,
                ),				
				
				array(
                    'id' => 'ut_page_caption_slogan_border_color',
                    'metapanel' => 'ut-hero-content-caption-slogan-settings',
                    'label' => 'Border Color',
                    'desc' => '<strong>(optional)</strong> - choose an alternate border color for <strong>Hero Caption Slogan</strong>. Only Style 5.',
					'type' => 'colorpicker',
					'global' => 'on',
                    'pages' => $post_type_support_2					
                ),				
				
				array(
                    'id' => 'ut_page_caption_slogan_margin',
                    'metapanel' => 'ut-hero-content-caption-slogan-settings',
                    'label' => 'Spacing Bottom',
                    'desc' => '<strong>(optional)</strong> -  include "px" in your string. e.g. 30px (default: 0px)',
                    'type' => 'text',
                    'global' => 'on',
                    'pages' => $post_type_support_2,
                ),

                /* caption slogan font */
                array(
                    'id' => 'ut_hero_caption_slogan_font_headline',
                    'metapanel' => 'ut-hero-content-caption-slogan-settings',
                    'label' => 'Font Settings',
                    'type' => 'section_headline',
                    'pages' => $post_type_support_2,
                    'breakpoint_support' => true,
                ),

                array(
                    'id' => 'ut_page_caption_description_top_websafe_font_style',
                    'metapanel' => 'ut-hero-content-caption-slogan-settings',
                    'label' => 'Font Setting',
                    'desc' => 'Please keep in mind, that your global font needs to support the available font weight options.',
                    'type' => 'typography',
                    'global' => 'on',
                    'global_font_type' => 'ut_front_catchphrase_top_font_type',
                    'breakpoint_support' => true,
                    'pages' => $post_type_support_2,
                ),
                
                /* caption title */
                array(
                    'id' => 'ut_hero_caption_title_headline',
                    'metapanel' => 'ut-hero-content-caption-title-settings',
                    'label' => 'Hero Caption Title Settings',
                    'type' => 'panel_headline',
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_caption_title',
                    'metapanel' => 'ut-hero-content-caption-title-settings',
                    'label' => 'Text',
                    'desc' => sprintf( 'This field also accepts HTML tags and shortcodes. Will be used as "SEO" open graph title as well. In order to add a Word Rotator use the following code. %s You can optionally add a typewriter effect by using the ut-typewriter tag. 1 will display a pipe, 2 will display an underscore. %s', '<pre class="ut-print-inline">[ut_rotate_words timer="2000"] Photography, Travel , Web Design Agency [/ut_rotate_words]</pre>', sprintf('<pre class="ut-print-inline">%s</pre>', htmlentities('&lt;ut-typewriter-1&gt;Vision, Product, People&lt;/ut-typewriter-1&gt;'))),
                    'htmldesc' => '&lt;span&gt; word &lt;/span&gt; = highlight word in themecolor',
                    'type' => 'textarea-simple',
                    'rows' => '5',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_type' => 'image|animatedimage|imagefader|video|tabs|splithero',
                    ),
                ),
                
				array(
                    'id' => 'ut_page_caption_title_linebreak_tablet',
					'metapanel' => 'ut-hero-content-caption-title-settings',
					'label' => 'Hide Linebreaks on Tablets',
					'desc' => '<strong>(optional)</strong>',
                    'type' => 'radio_group_button',
                    'std' => 'show',
                    'choices' => array(
                        array(
                            'label' => 'Hide',
                            'value' => 'hide',
                            'for' => array(),
                            'class' => 'ut-off'
                        ),
                        array(
                            'label' => 'Show',
                            'value' => 'show',
                            'for' => array(),
                            'class' => 'ut-on'
                        )
                    ),
                    'pages' => $post_type_support_2,
					'required' => array(
                        'ut_page_hero_type' => 'image|animatedimage|imagefader|video|tabs|splithero',
                    ),
                ),
				
				array(
                    'id' => 'ut_page_caption_title_linebreak_mobile',
					'metapanel' => 'ut-hero-content-caption-title-settings',
					'label' => 'Hide Linebreaks on Mobiles',
					'desc' => '<strong>(optional)</strong>',
                    'type' => 'radio_group_button',
					'std' => 'hide',
                    'choices' => array(
                        array(
                            'label' => 'Hide',
                            'value' => 'hide',
                            'for' => array(),
                            'class' => 'ut-off'
                        ),
                        array(
                            'label' => 'Show',
                            'value' => 'show',
                            'for' => array(),
                            'class' => 'ut-on'
                        )
                    ),
                    
					'pages' => $post_type_support_2,
					'required' => array(
                        'ut_page_hero_type' => 'image|animatedimage|imagefader|video|tabs|splithero',
                    ),
                ),
								
				array(
                    'id' => 'ut_page_caption_title_color',
                    'metapanel' => 'ut-hero-content-caption-title-settings',
                    'label' => 'Title Color',
                    'desc' => '<strong>(optional)</strong> - choose an alternate for <strong>Hero Caption Title</strong>.',
                    'type' => 'gradient_colorpicker',
					'global' => 'on',
                    'pages' => $post_type_support_2,
                ),
                array(
                    'id' => 'ut_page_caption_title_stroke_effect',
                    'metapanel' => 'ut-hero-content-caption-title-settings',
                    'label' => 'Add Stroke Effect',
                    'desc' => '<strong>(optional)</strong>',
                    'type' => 'select',
                    'global' => 'on',
                    'choices' => array(
                        array(
                            'value' => 'on',
                            'label' => 'yes please!'
                        ),
                        array(
                            'value' => 'off',
                            'label' => 'no thanks!'
                        ),
                    ),
                    'pages' => $post_type_support_2,
                ),
                array(
                    'id' => 'ut_page_caption_title_stroke_color',
                    'metapanel' => 'ut-hero-content-caption-title-settings',
                    'label' => 'Stroke Color',
                    'desc' => '<strong>(optional)</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_page_caption_title_stroke_effect' => 'on'
                    ),
                    'pages' => $post_type_support_2,
                ),
                array(
                    'id' => 'ut_page_caption_title_stroke_width',
                    'metapanel' => 'ut-hero-content-caption-title-settings',
                    'label' => 'Stroke Width',
                    'desc' => 'Drag the handle to set the stroke width. Default: 1.',
                    'type' => 'numeric-slider',
                    'min_max_step' => '1,3,1',
                    'global' => 'on',
                    'required' => array(
                        'ut_page_caption_title_stroke_effect' => 'on'
                    ),
                    'pages' => $post_type_support_2,
                ),
                array(
                    'id' => 'ut_page_caption_title_glow',
                    'metapanel' => 'ut-hero-content-caption-title-settings',
                    'label' => 'Gloweffect',
                    'desc' => 'Activate Glow Effect for <strong>Hero Caption Title</strong>? Does not work if title color is a gradient color.',
                    'type' => 'select',
                    'global' => 'on',
                    'choices' => array(
                        array(
                            'value' => 'off',
                            'label' => 'no thanks!'
                        ),
                        array(
                            'value' => 'on',
                            'label' => 'yes please!'
                        ),

                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_caption_title_glow_color',
                    'metapanel' => 'ut-hero-content-caption-title-settings',
                    'label' => 'Glow Color',
                    'desc' => 'Select desired glow color.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_page_caption_title_glow' => 'on'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_caption_title_glow_shadow_color',
                    'metapanel' => 'ut-hero-content-caption-title-settings',
                    'label' => 'Glow Text Shadow Color',
                    'desc' => 'Select desired glow color.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_page_caption_title_glow' => 'on'
                    ),
                    'pages' => $post_type_support_2,
                ),
                array(
                    'id' => 'ut_page_caption_title_distortion',
                    'metapanel' => 'ut-hero-content-caption-title-settings',
                    'label' => 'Add Text Distortion?',
                    'desc' => 'Activates Glitch Text Distortion Effect for Section Headlines.',
                    'type' => 'select',
                    'global' => 'on',
                    'choices' => array(
                        array(
                            'value' => 'off',
                            'label' => 'no thanks!'
                        ),
                        array(
                            'value' => 'on',
                            'label' => 'yes, please!'
                        ),

                    ),
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_type' => 'image|animatedimage|imagefader|video|tabs|splithero',
                    ),
                ),
                array(
                    'id' => 'ut_page_caption_title_distortion_style',
                    'metapanel' => 'ut-hero-content-caption-title-settings',
                    'label' => 'Text Distortion Style?',
                    'desc' => 'Select desired text distortion style.',
                    'type' => 'select',
                    'global' => 'on',
                    'choices' => array(
                        array(
                            'value' => 'style-1',
                            'label' => 'Style 1'
                        ),
                        array(
                            'value' => 'style-2',
                            'label' => 'Style 2'
                        ),
                        array(
                            'value' => 'style-3',
                            'label' => 'Style 3'
                        ),
                    ),
                    'required' => array(
                        'ut_page_caption_title_distortion' => 'on',
                        'ut_page_hero_type' => 'image|animatedimage|imagefader|video|tabs|splithero',
                    ),
                    'pages' => $post_type_support_2,
                ),
                array(
                    'id' => 'ut_page_caption_title_glitch',
                    'metapanel' => 'ut-hero-content-caption-title-settings',
                    'label' => 'Add Glitch Effect',
                    'desc' => 'Activate Glitch Effect for <strong>Hero Caption Title</strong>?',
                    'type' => 'select',
                    'global' => 'on',
                    'choices' => array(
                        array(
                            'value' => 'on',
                            'label' => 'yes please!'
                        ),
                        array(
                            'value' => 'off',
                            'label' => 'no thanks!'
                        ),
                    ),
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_type' => 'image|animatedimage|imagefader|video|tabs|splithero',
                    ),
                ),
                array(
                    'id' => 'ut_page_caption_title_glitch_style',
                    'metapanel' => 'ut-hero-content-caption-title-settings',
                    'label' => 'Select Glitch Style',
                    'desc' => '<strong>(optional)</strong>',
                    'type' => 'select',
                    'global' => 'on',
                    'choices' => array(
                        array(
                            'value' => 'ut-glitch-2',
                            'label' => 'Light Glitch with 2 optional accent colors.'
                        ),
                        array(
                            'value' => 'ut-glitch-1',
                            'label' => 'Heavy Glitch with 2 optional accent colors.'
                        ),
                    ),
                    'required' => array(
                        'ut_page_caption_title_glitch' => 'on',
                        'ut_page_hero_type' => 'image|animatedimage|imagefader|video|tabs|splithero',
                    ),
                    'pages' => $post_type_support_2,
                ),
                array(
                    'id' => 'ut_page_caption_title_glitch_accent_1',
                    'metapanel' => 'ut-hero-content-caption-title-settings',
                    'label' => 'Glitch Color Part 1',
                    'desc' => '<strong>(optional)</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_page_caption_title_glitch' => 'on',
                        'ut_page_hero_type' => 'image|animatedimage|imagefader|video|tabs|splithero',
                    ),
                    'pages' => $post_type_support_2,
                ),
                array(
                    'id' => 'ut_page_caption_title_glitch_accent_2',
                    'metapanel' => 'ut-hero-content-caption-title-settings',
                    'label' => 'Glitch Color Part 2',
                    'desc' => '<strong>(optional)</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_page_caption_title_glitch' => 'on',
                        'ut_page_hero_type' => 'image|animatedimage|imagefader|video|tabs|splithero',
                    ),
                    'pages' => $post_type_support_2,
                ),

	            /*
				|--------------------------------------------------------------------------
				| Hero Front Font Style
				|--------------------------------------------------------------------------
				*/
                array(
		            'id' => 'ut_page_hero_font_style_headline',
		            'label' => 'Font Settings',
		            'type' => 'section_headline',
		            'metapanel' => 'ut-hero-content-caption-title-settings',
		            'pages' => $post_type_support_2,
                    'breakpoint_support' => true,
	            ),
                array(
		            'id' => 'ut_page_hero_font_global_overwrite',
		            'metapanel' => 'ut-hero-content-caption-title-settings',
		            'label' => 'Overwrite Global Hero Title Font Face Settings?',
		            'desc' => '<strong>(optional)</strong>',
		            'type' => 'select',
		            'std' => 'off',
		            'choices' => array(
			            array(
				            'value' => 'off',
				            'label' => 'no, thanks!'
			            ),
		            	array(
				            'value' => 'on',
				            'label' => 'yes, please!'
			            )
		            ), /* end choices */
		            'pages' => $post_type_support_2
	            ),
	            array(
		            'id' => 'ut_page_hero_font_type',
		            'label' => 'Choose Font Source',
		            'metapanel' => 'ut-hero-content-caption-title-settings',
		            'desc' => sprintf( 'Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
		            'type' => 'select',
		            'std' => 'ut-font',
		            'required' => array(
			            'ut_page_hero_font_global_overwrite' => 'on',
		            ),
		            'choices' => array(
			            array(
				            'value' => 'ut-font',
				            'label' => 'Theme Font'
			            ),
			            array(
				            'value' => 'ut-websafe',
				            'label' => 'Web Safe Fonts'
			            ),
			            array(
				            'value' => 'ut-google',
				            'label' => 'Google Font'
			            ),
			            array(
				            'value' => 'ut-custom',
				            'label' => 'Custom Font'
			            )
		            ),
		            'pages' => $post_type_support_2,
	            ),
	            array(
		            'id' => 'ut_google_page_hero_font_style',
		            'label' => 'Hero Font Style',
		            'metapanel' => 'ut-hero-content-caption-title-settings',
		            'type' => 'googlefont',
		            'markup' => '1_1',
		            'required' => array(
			            'ut_page_hero_font_global_overwrite' => 'on',
		            	'ut_page_hero_font_type' => 'ut-google'
		            ),
		            'pages' => $post_type_support_2,
	            ),
	            array(
		            'id' => 'ut_page_hero_font_style',
		            'label' => 'Hero Font Style',
		            'desc' => '<a href="#" class="ut-font-preview">Preview Font Styles</a>',
		            'metapanel' => 'ut-hero-content-caption-title-settings',
		            'type' => 'select',
		            'choices' => array(
			            array(
				            'value' => 'extralight',
				            'label' => 'Extra Light'
			            ),
			            array(
				            'value' => 'light',
				            'label' => 'Light'
			            ),
			            array(
				            'value' => 'regular',
				            'label' => 'Regular'
			            ),
			            array(
				            'value' => 'medium',
				            'label' => 'Medium'
			            ),
			            array(
				            'value' => 'semibold',
				            'label' => 'Semi Bold'
			            ),
			            array(
				            'value' => 'bold',
				            'label' => 'Bold'
			            )
		            ),
		            'required' => array(
			            'ut_page_hero_font_global_overwrite' => 'on',
		            	'ut_page_hero_font_type' => 'ut-font'
		            ),
		            'pages' => $post_type_support_2,
	            ),
	            array(
		            'id' => 'ut_page_hero_websafe_font_style',
		            'label' => 'Hero Font Style',
		            'metapanel' => 'ut-hero-content-caption-title-settings',
		            'type' => 'typography',
		            'markup' => '1_1',
		            'required' => array(
			            'ut_page_hero_font_global_overwrite' => 'on',
		            	'ut_page_hero_font_type' => 'ut-websafe'
		            ),
		            'pages' => $post_type_support_2,
	            ),
	            array(
		            'id' => 'ut_page_hero_custom_font_style',
		            'label' => 'Hero Font Style',
		            'metapanel' => 'ut-hero-content-caption-title-settings',
		            'type' => 'custom_typography',
		            'markup' => '1_1',
		            'required' => array(
			            'ut_page_hero_font_global_overwrite' => 'on',
		            	'ut_page_hero_font_type' => 'ut-custom'
		            ),
		            'pages' => $post_type_support_2,
	            ),
                array(
		            'id' => 'ut_page_hero_font_size',
		            'metapanel'=> 'ut-hero-content-caption-title-settings',
		            'label' => 'Font Size',
		            'desc' => 'This allows you to overwrite the default font size of the theme options.',
		            'type' => 'global-numeric-breakpoint-slider',
		            'name_key' => 'font-size',
		            'unit_support' => 'font_size',
		            'min_max_step' => '0,200,1',
		            'global' => 'on',
		            'relation' => 'hero_title',
		            'pages' => $post_type_support_2,
                    'breakpoint_support' => true,
	            ),

	            array(
		            'id' => 'ut_page_hero_font_line_height',
		            'metapanel'=> 'ut-hero-content-caption-title-settings',
		            'label' => 'Line Height',
		            'desc' => 'This allows you to overwrite the default font line height of the theme options.',
		            'type' => 'global-numeric-breakpoint-slider',
		            'name_key' => 'line-height',
		            'unit_support' => 'line_height',
		            'global' => 'on',
		            'relation' => 'hero_title',
		            'pages' => $post_type_support_2,
                    'breakpoint_support' => true,
	            ),

	            array(
		            'id' => 'ut_page_hero_font_weight',
		            'metapanel'=> 'ut-hero-content-caption-title-settings',
		            'label' => 'Font Weight',
		            'desc' => 'This allows you to overwrite the default font weight of the theme options.',
		            'type' => 'select',
		            'choices' => array(
			            array(
				            'value' => '',
				            'label' => 'Default (Theme Options)'
			            ),
			            array(
				            'value' => 'normal',
				            'label' => 'normal'
			            ),
			            array(
				            'value' => '100',
				            'label' => '100'
			            ),
			            array(
				            'value' => '200',
				            'label' => '200'
			            ),
			            array(
				            'value' => '300',
				            'label' => '300'
			            ),
			            array(
				            'value' => '400',
				            'label' => '400'
			            ),
			            array(
				            'value' => '500',
				            'label' => '500'
			            ),
			            array(
				            'value' => '600',
				            'label' => '600'
			            ),
			            array(
				            'value' => '700',
				            'label' => '700'
			            ),
			            array(
				            'value' => '800',
				            'label' => '800'
			            ),
			            array(
				            'value' => '900',
				            'label' => '900'
			            )
		            ),
		            'pages' => $post_type_support_2,
	            ),
	            array(
		            'id' => 'ut_page_caption_slogan_uppercase',
		            'metapanel' => 'ut-hero-content-caption-title-settings',
		            'label' => 'Text Transform',
		            'desc' => 'Display the Hero Caption Title in uppercase letters?',
		            'type' => 'select',
		            'std' => 'global',
		            'choices' => array(
			            array(
				            'value' => 'on',
				            'label' => 'yes please!'
			            ),
			            array(
				            'value' => 'off',
				            'label' => 'no thanks!'
			            ),
			            array(
				            'value' => 'global',
				            'label' => 'Default (Theme Options)'
			            ),
		            ),
		            'pages' => $post_type_support_2,
	            ),

                /* caption description */
                array(
                    'id' => 'ut_page_caption_description_headline',
                    'metapanel' => 'ut-hero-content-caption-description-settings',
                    'label' => 'Hero Caption Description Settings',
                    'type' => 'panel_headline',
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_caption_description',
                    'metapanel' => 'ut-hero-content-caption-description-settings',
                    'label' => 'Text',
                    'desc' => 'This field appears beneath the Hero Caption. Will be used as "SEO" open graph description as well.',
                    'type' => 'textarea-simple',
                    'rows' => '5',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_type' => 'image|animatedimage|imagefader|video|tabs|splithero',
                    ),
                ),
				
				array(
                    'id' => 'ut_page_caption_description_linebreak_tablet',
					'metapanel' => 'ut-hero-content-caption-description-settings',
					'label' => 'Hide Linebreaks on Tablets',
					'desc' => '<strong>(optional)</strong>',
                    'type' => 'radio_group_button',
                    'std' => 'show',
                    'choices' => array(
                        array(
                            'label' => 'Hide',
                            'value' => 'hide',
                            'for' => array(),
                            'class' => 'ut-off'
                        ),
                        array(
                            'label' => 'Show',
                            'value' => 'show',
                            'for' => array(),
                            'class' => 'ut-on'
                        )
                    ),                    
					'pages' => $post_type_support_2,
					'required' => array(
                        'ut_page_hero_type' => 'image|animatedimage|imagefader|video|tabs|splithero',
                    ),
                ),
				
				array(
                    'id' => 'ut_page_caption_description_linebreak_mobile',
					'metapanel' => 'ut-hero-content-caption-description-settings',
					'label' => 'Hide Linebreaks on Mobiles',
					'desc' => '<strong>(optional)</strong>',
                    'type' => 'radio_group_button',
					'std' => 'hide',
                    'choices' => array(
                        array(
                            'label' => 'Hide',
                            'value' => 'hide',
                            'for' => array(),
                            'class' => 'ut-off'
                        ),
                        array(
                            'label' => 'Show',
                            'value' => 'show',
                            'for' => array(),
                            'class' => 'ut-on'
                        )
                    ),
					'pages' => $post_type_support_2,
					'required' => array(
                        'ut_page_hero_type' => 'image|animatedimage|imagefader|video|tabs|splithero',
                    ),
                ),				
				
				array(
                    'id' => 'ut_page_caption_description_color',
                    'metapanel' => 'ut-hero-content-caption-description-settings',
                    'label' => 'Color',
                    'desc' => '<strong>(optional)</strong> - choose an alternate for <strong>Hero Caption Description</strong>.',
                    'type' => 'gradient_colorpicker',
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_caption_description_glow',
                    'metapanel' => 'ut-hero-content-caption-description-settings',
                    'label' => 'Gloweffect',
                    'desc' => 'Activate Glow Effect for <strong>Hero Caption Slogan</strong>? Does not work if title color is a gradient color.',
                    'type' => 'select',
                    'global' => 'on',
                    'choices' => array(
                        array(
                            'value' => 'off',
                            'label' => 'no thanks!'
                        ),
                        array(
                            'value' => 'on',
                            'label' => 'yes please!'
                        ),
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_caption_description_glow_color',
                    'metapanel' => 'ut-hero-content-caption-description-settings',
                    'label' => 'Glow Color',
                    'desc' => 'Select desired glow color.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_page_caption_description_glow' => 'on'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_caption_description_glow_shadow_color',
                    'metapanel' => 'ut-hero-content-caption-description-settings',
                    'label' => 'Glow Text Shadow Color',
                    'desc' => 'Select desired glow color.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_page_caption_description_glow' => 'on'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_caption_description_line_color',
                    'metapanel' => 'ut-hero-content-caption-description-settings',
                    'label' => 'Line Color',
                    'desc' => '<strong>(optional)</strong> - choose an alternate for <strong>Hero Caption Description Line</strong>.',
                    'type' => 'colorpicker',
                    'required' => array(
                        'ut_page_hero_style' => 'ut-hero-style-3',
                    ),
                    'pages' => $post_type_support_2,
                ),
                array(
                    'id' => 'ut_page_caption_description_margin',
                    'metapanel' => 'ut-hero-content-caption-description-settings',
                    'label' => 'Spacing Top',
                    'desc' => '<strong>(optional)</strong> -  include "px" in your string. e.g. 10px (default: 10px)',
                    'type' => 'text',
					'global' => 'on',
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_hero_caption_description_font_headline',
                    'metapanel' => 'ut-hero-content-caption-description-settings',
                    'label' => 'Font Settings',
                    'type' => 'section_headline',
                    'pages' => $post_type_support_2,
                    'breakpoint_support' => true,
                ),

                array(
                    'id' => 'ut_page_caption_description_websafe_font_style',
                    'metapanel' => 'ut-hero-content-caption-description-settings',
                    'label' => 'Font Setting',
                    'desc' => 'Please keep in mind, that your global font needs to support the available font weight options.',
                    'type' => 'typography',
                    'global' => 'on',
                    'breakpoint_support' => true,
                    'global_font_type' => 'ut_front_catchphrase_font_type',
                    'pages' => $post_type_support_2,
                ),

                /* buttons */
                array(
                    'id' => 'ut-hero-button-settings',
                    'metapanel' => 'ut-hero-content-button-settings',
                    'label' => 'Hero Buttons Settings',
                    'type' => 'panel_headline',
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_main_hero_button',
                    'metapanel' => 'ut-hero-content-button-settings',
                    'label' => 'Activate primary button?',
                    'desc' => 'A clickable button to link to a desired target such as a page or section.',
                    'type' => 'select',
                    'toplevel' => true,
                    'std' => 'off',
                    'choices' => array(
                        array(
                            'value' => 'off',
                            'label' => 'no thanks!'
                        ),
                        array(
                            'value' => 'on',
                            'label' => 'yes please!'
                        ),
                    ),
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_type' => 'image|animatedimage|imagefader|splithero|tabs|video',
                    )
                ),

                array(
                    'id' => 'ut_page_main_hero_button_text',
                    'metapanel' => 'ut-hero-content-button-settings',
                    'label' => 'Primary Button Text',
                    'desc' => 'Enter your desired text for this button.',
                    'type' => 'text',
                    'required' => array(
                        'ut_page_main_hero_button' => 'on',
                        'ut_page_hero_type' => 'image|animatedimage|imagefader|splithero|tabs|video',
                    ),
                    'pages' => $post_type_support_2,
                    
                ),

                array(
                    'id' => 'ut_page_main_hero_button_url_type',
                    'metapanel' => 'ut-hero-content-button-settings',
                    'label' => 'Primary Button Link Type',	
                    'desc' => 'Do you like to link to the content or an external URL?',
                    'type' => 'select',
                    'std' => 'content',
                    'choices' => array(
                        array(
                            'value' => 'content',
                            'label' => 'link to the main content of this page!'
                        ),
                        array(
                            'value' => 'external',
                            'label' => 'link to an external url!'
                        ),
                    ),
                    'required' => array(
                        'ut_page_main_hero_button' => 'on',
                        'ut_page_hero_type' => 'image|animatedimage|imagefader|splithero|tabs|video',
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_main_hero_button_url',
                    'metapanel' => 'ut-hero-content-button-settings',
                    'label' => 'Primary Button URL',
                    'desc' => 'Enter your desired URL. Do not forget to place "http://" in front of your link.',
                    'type' => 'text',
                    'required' => array(
                        'ut_page_main_hero_button' => 'on',
                        'ut_page_main_hero_button_url_type' => 'external',
                        'ut_page_hero_type' => 'image|animatedimage|imagefader|splithero|tabs|video',
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_main_hero_button_target',
                    'metapanel' => 'ut-hero-content-button-settings',
                    'label' => 'Primary Button Target',
                    'desc' => 'Specifies where to open the linked document. <strong>_blank</strong> opens the linked document in a new window or tab. <strong>_self</strong> opens the linked document in the same frame as it was clicked.',
                    'type' => 'select',
                    'std' => '_blank',
                    'choices' => array(
                        array(
                            'value' => '_blank',
                            'label' => 'blank'
                        ),
                        array(
                            'value' => '_self',
                            'label' => 'self'
                        ),
                    ),
                    'required' => array(
                        'ut_page_main_hero_button' => 'on',
                        'ut_page_main_hero_button_url_type' => 'external',
                        'ut_page_hero_type' => 'image|animatedimage|imagefader|splithero|tabs|video',
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_main_hero_button_style',
                    'metapanel' => 'ut-hero-content-button-settings',
                    'label' => 'Primary Button Styling',
                    'desc' => 'Use our theme default button or design your own one.',
                    'type' => 'select',
					'global' => 'on',
                    'choices' => array(
                        array(
                            'value' => 'default',
                            'label' => 'Default'
                        ),
                        array(
                            'value' => 'custom',
                            'label' => 'Custom'
                        ),
                    ),
                    'required' => array(
                        'ut_page_main_hero_button' => 'on',
                        'ut_page_hero_type' => 'image|animatedimage|imagefader|splithero|tabs|video'
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id' => 'ut_page_main_hero_button_hover_shadow',
                    'metapanel' => 'ut-hero-content-button-settings',
                    'label' => 'Add Shadow on Button Hover?',
                    'desc' => 'A decent shadow to add more depth to the button.',
                    'type' => 'select',
					'global' => 'on',
                    'choices' => array(
                        array(
                            'value' => 'off',
                            'label' => 'no, thanks!'
                        ),
                        array(
                            'value' => 'on',
                            'label' => 'yes, please!'
                        ),
                    ),
                    'required' => array(
                        'ut_page_main_hero_button' => 'on',
                        'ut_page_hero_type' => 'image|animatedimage|imagefader|splithero|tabs|video'
                    ),
                    'pages' => $post_type_support_2,
                ),
            
                array(
                    'id' => 'ut_page_main_hrbtn',
                    'metapanel' => 'ut-hero-content-button-settings',
                    'label' => 'Custom Button Styling',
                    'desc' => 'Makes it easy to style buttons.',
                    'markup' => '1_1',
                    'type' => 'button_builder',
					'global' => 'on',
                    'required' => array(
                        'ut_page_hero_type' => 'image|animatedimage|imagefader|splithero|tabs|video',
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id' => 'ut_page_second_button_headline',
                    'metapanel' => 'ut-hero-content-button-settings',
                    'label' => 'Secondary Button Settings',
                    'type' => 'section_headline',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_main_hero_button' => 'on',
                        'ut_page_hero_type' => 'image|animatedimage|imagefader|splithero|tabs|video'
                    ),
                ),            
            
                array(
                    'id' => 'ut_page_second_button',
                    'metapanel' => 'ut-hero-content-button-settings',
                    'label' => 'Activate secondary button?',
                    'desc' => 'A clickable button to link to a desired target such as a page or section.',
                    'type' => 'select',
                    'std' => 'off',
                    'choices' => array(
                        array(
                            'value' => 'off',
                            'label' => 'no thanks!'
                        ),
                        array(
                            'value' => 'on',
                            'label' => 'yes please!'
                        ),
                    ),
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_type' => 'image|animatedimage|imagefader|splithero|tabs|video'
                    ),
                ),

                array(
                    'id' => 'ut_page_second_button_text',
                    'metapanel' => 'ut-hero-content-button-settings',
                    'label' => 'Secondary Button Text',
                    'desc' => 'Enter your desired button text',
                    'type' => 'text',
                    'required' => array(
                        'ut_page_second_button' => 'on',
                        'ut_page_hero_type' => 'image|animatedimage|imagefader|splithero|tabs|video'
                    ),
                    'pages' => $post_type_support_2,            
                ),

                array(
                    'id' => 'ut_page_second_button_url_type',
                    'metapanel' => 'ut-hero-content-button-settings',
                    'label' => 'Secondary Button Link Type',
                    'desc' => 'Do you like to link to a section or external URL?',
                    'type' => 'select',
                    'std' => 'content',
                    'choices' => array(
                        array(
                            'value' => 'content',
                            'label' => 'link to the main content of this page!'
                        ),
                        array(
                            'value' => 'external',
                            'label' => 'link to an external url!'
                        ),
                    ),
                    'required' => array(
                        'ut_page_second_button' => 'on',
                        'ut_page_hero_type' => 'image|animatedimage|imagefader|splithero|tabs|video'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_second_button_url',
                    'metapanel' => 'ut-hero-content-button-settings',
                    'label' => 'Secondary Button URL',
                    'desc' => 'Enter your desired URL. Do not forget to place "http://" in front of your link.',
                    'type' => 'text',
                    'required' => array(
                        'ut_page_second_button' => 'on',
                        'ut_page_second_button_url_type' => 'external',
                        'ut_page_hero_type' => 'image|animatedimage|imagefader|splithero|tabs|video'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_second_button_target',
                    'metapanel' => 'ut-hero-content-button-settings',
                    'label' => 'Secondary Button Target',
                    'desc' => 'Specifies where to open the linked document. <strong>_blank</strong> opens the linked document in a new window or tab. <strong>_self</strong> opens the linked document in the same frame as it was clicked.',
                    'type' => 'select',
                    'std' => '_blank',
                    'choices' => array(
                        array(
                            'value' => '_blank',
                            'label' => 'blank'
                        ),
                        array(
                            'value' => '_self',
                            'label' => 'self'
                        ),
                    ),
                    'required' => array(
                        'ut_page_second_button' => 'on',
                        'ut_page_second_button_url_type' => 'external',
                        'ut_page_hero_type' => 'image|animatedimage|imagefader|splithero|tabs|video'
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id' => 'ut_page_second_button_hover_shadow',
                    'metapanel' => 'ut-hero-content-button-settings',
                    'label' => 'Add Shadow on Button Hover?',
                    'desc' => 'A decent shadow to add more depth to the button.',
                    'type' => 'select',
					'global' => 'on',
                    'choices' => array(
                        array(
                            'value' => 'off',
                            'label' => 'no, thanks!'
                        ),
                        array(
                            'value' => 'on',
                            'label' => 'yes, please!'
                        ),
                    ),
                    'required' => array(
                        'ut_page_second_button' => 'on',
                        'ut_page_hero_type' => 'image|animatedimage|imagefader|splithero|tabs|video'
                    ),
                    'pages' => $post_type_support_2,
                ),            
            
                array(
                    'id' => 'ut_page_second_button_style',
                    'metapanel' => 'ut-hero-content-button-settings',
                    'label' => 'Secondary Button Style',
                    'desc' => 'Use our theme default button or design your own one.',
                    'type' => 'select',
                    'std' => 'default',
                    'choices' => array(
                        array(
                            'value' => 'default',
                            'label' => 'Default'
                        ),
                        array(
                            'value' => 'custom',
                            'label' => 'Custom'
                        ),
                    ),
                    'required' => array(
                        'ut_page_second_button' => 'on',
                        'ut_page_hero_type' => 'image|animatedimage|imagefader|splithero|tabs|video'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_second_hrbtn',
                    'metapanel' => 'ut-hero-content-button-settings',
                    'label' => 'Secondary Button Styling',
					'markup' => '1_1',
                    'desc' => 'Makes it easy to style buttons.',
                    'type' => 'button_builder',
					'global' => 'on',
                    'required' => array(
                        'ut_page_hero_type' => 'image|animatedimage|imagefader|splithero|tabs|video'
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id' => 'ut_page_hero_buttons_margin_headline',
                    'metapanel' => 'ut-hero-content-button-settings',
                    'label' => 'Buttons Spacing',
                    'type' => 'section_headline',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_type' => 'image|animatedimage|imagefader|splithero|tabs|video'
                    ),
                ),              
            
                array(
                    'id' => 'ut_page_hero_buttons_margin',
                    'metapanel' => 'ut-hero-content-button-settings',
                    'label' => 'Buttons Spacing Top',
                    'desc' => 'Increase the space between Hero Caption Title and Hero Buttons. (optional) - default 0px',
                    'type' => 'text',
					'global' => 'on',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_type' => 'image|animatedimage|imagefader|splithero|slider|tabs|video'
                    ),
                ),
                
                array(
                    'id' => 'ut_page_scroll_down_arrow_headline',
                    'metapanel' => 'ut-hero-content-button-settings',
                    'label' => 'Scroll Down Arrow Settings',
                    'type' => 'section_headline',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_type' => 'image|animatedimage|imagefader|splithero|slider|tabs|video'
                    ),
                ),              
            
                array(
                    'id' => 'ut_page_scroll_down_arrow',
                    'label' => 'Activate Scroll Down Arrow?',
                    'desc' => 'A large double lined down arrow. Clicking the arrow automatically scrolls to the main content.',
                    'metapanel' => 'ut-hero-content-button-settings',
                    'type' => 'select',
					'global' => 'on',
                    'choices' => array(
                        array(
                            'value' => 'off',
                            'label' => 'no thanks!'
                        ),
                        array(
                            'value' => 'on',
                            'label' => 'yes please!'
                        ),
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_scroll_down_arrow_color',
                    'metapanel' => 'ut-hero-content-button-settings',
                    'label' => 'Scroll Down Arrow Color',
                    'desc' => '<strong>(optional)</strong> - set an alternate Color for <strong>Scroll Down Arrow</strong>.',
                    'type' => 'colorpicker',
					'global' => 'on',
                    'required' => array(
                        'ut_page_scroll_down_arrow' => 'on'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_scroll_down_arrow_position',
                    'metapanel' => 'ut-hero-content-button-settings',
                    'label' => 'Scroll Down Arrow Horizontal Position',
                    'desc' => 'Drag the handle to set your desired horizontal position.',
                    'type' => 'numeric_slider',
					'global' => 'on',
                    'required' => array(
                        'ut_page_scroll_down_arrow' => 'on'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_scroll_down_arrow_position_vertical',
                    'metapanel' => 'ut-hero-content-button-settings',
                    'label' => 'Scroll Down Arrow Vertical Position',
                    'desc' => 'Drag the handle to set your desired vertical position.',
                    'type' => 'numeric_slider',
					'global' => 'on',
                    'required' => array(
                        'ut_page_scroll_down_arrow' => 'on'
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                
                /* separator top */
                array(
                    'id' => 'ut-hero-separator-settings-headline',
                    'metapanel' => 'ut-hero-styling-separator-top-settings',
                    'label' => 'Hero Top Separator Settings',
                    'type' => 'panel_headline',
                    'pages' => $post_type_support_2,                    
                ),
                
                array(
                    'id' => 'ut_page_hero_separator_top_global_overwrite',
                    'metapanel' => 'ut-hero-styling-separator-top-settings',
                    'label' => 'Use Global Hero Top Separator Setting?',
                    'desc' => '<strong>(optional)</strong>',
                    'type' => 'select',
                    'choices' => array(
                        array(
                            'value' => 'on',
                            'label' => 'yes, please!'
                        ),
                        array(
                            'value' => 'off',
                            'label' => 'no, thanks!'
                        )

                    ), /* end choices */
                    'pages' => $post_type_support_2                    
                ),
                
                array(
                    'id' => 'ut-hero-separator-top-settings',
                    'metapanel' => 'ut-hero-styling-separator-top-settings',
                    'label' => 'Hero Top Separator Settings',
                    'type' => 'panel_headline',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_separator_top_global_overwrite' => 'off'
                    )
                ),
                
                // separator top
                array(
                    'id'    => 'ut_page_hero_separator_top',
                    'metapanel' => 'ut-hero-styling-separator-top-settings',
                    'label' => 'Add Hero Separator at Top?',
                    'desc'  => 'A new refreshing design feature for Hero and Content Sections.',
                    'type' => 'select',
                    'std' => 'off',
                    'choices' => array(
                        array(
                            'value' => 'off',
                            'label' => 'no thanks!'
                        ),
                        array(
                            'value' => 'on',
                            'label' => 'yes please!'
                        ),
                    ),
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_separator_top_global_overwrite' => 'off'
                    )
                ),
                
                array(
                    'id'    => 'ut_page_hero_separator_svg_top',
                    'metapanel' => 'ut-hero-styling-separator-top-settings',
                    'label' => 'Separator Top Style',
                    'desc'  => 'Select your favourite separator style.',
                    'type' => 'select',
                    'std' => 'desing_wave',
                    'choices' => ot_recognized_separator_styles(),
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_separator_top_global_overwrite' => 'off',
                        'ut_page_hero_separator_top' => 'on'
                    ),
                ),
                
                array(
                    'id'    => 'ut_page_hero_separator_top_flip',
                    'metapanel' => 'ut-hero-styling-separator-top-settings',
                    'label' => 'Flip Top Separator?',
                    'desc'  => 'Flip Separator horizontally.',
                    'type' => 'select',
                    'std' => 'off',
                    'choices' => array(
                        array(
                            'value' => 'false',
                            'label' => 'no thanks!'
                        ),
                        array(
                            'value' => 'true',
                            'label' => 'yes please!'
                        ),
                    ),
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_separator_top_global_overwrite' => 'off',
                        'ut_page_hero_separator_top' => 'on'
                    ),
                ),
                
                
                // Color Settings
                array(
                    'id' => 'ut_page_hero_separator_top_colors',
                    'metapanel' => 'ut-hero-styling-separator-top-settings',
                    'label' => 'Separator Top Color Settings',
                    'type' => 'section_headline',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_separator_top_global_overwrite' => 'off',
                        'ut_page_hero_separator_top' => 'on',
                    ),
                ),
                
                // top color 1
                array(
                    'id'    => 'ut_page_hero_separator_top_color_1',
                    'metapanel' => 'ut-hero-styling-separator-top-settings',
                    'label' => 'SVG Color Part 1',
                    'desc'  => 'Some Separator Styles can display multiple colors. This is color part 1.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_separator_top_global_overwrite' => 'off',
                        'ut_page_hero_separator_top' => 'on'
                    ),
                ),
                
                array(
                    'id'    => 'ut_page_hero_separator_top_color_1_gradient',
                    'metapanel' => 'ut-hero-styling-separator-top-settings',
                    'label' => 'Add Gradient for SVG Color Part 1?',
                    'desc'  => 'Gradients can make your separator more fancy and also do support rgba colors with opacity.',
                    'type' => 'select',
                    'std' => 'false',
                    'choices' => array(
                        array(
                            'value' => 'false',
                            'label' => 'no thanks!'
                        ),
                        array(
                            'value' => 'true',
                            'label' => 'yes please!'
                        ),
                    ),
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_separator_top_global_overwrite' => 'off',
                        'ut_page_hero_separator_top' => 'on'
                    ),
                ),
                
                array(
                    'id'    => 'ut_page_hero_separator_top_color_1_gradient_color',
                    'metapanel' => 'ut-hero-styling-separator-top-settings',
                    'label' => 'SVG Color Part 1 Gradient Color',
                    'desc'  => 'This color usually represents the end color of the gradient while "SVG Color Part 1" represents the start color.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_separator_top_global_overwrite' => 'off',
                        'ut_page_hero_separator_top' => 'on',
                        'ut_page_hero_separator_top_color_1_gradient' => 'true'
                    ),
                ),
                
                array(
                    'id'    => 'ut_page_hero_separator_top_color_1_gradient_direction',
                    'metapanel' => 'ut-hero-styling-separator-top-settings',
                    'label' => 'Select Gradient Direction?',
                    'desc'  => 'Select your favourite gradient direction.',
                    'type' => 'select',
                    'std' => 'default',
                    'choices' => array(
                        array(
                            'value' => 'default',
                            'label' => 'Default (left to right)'
                        ),
                        array(
                            'value' => 'diagonal_1',
                            'label' => 'Diagonal (top left to bottom right)'
                        ),
                        array(
                            'value' => 'diagonal_2',
                            'label' => 'Diagonal (top right to bottom left)'
                        ),
                        array(
                            'value' => 'top_down',
                            'label' => 'Top to Down'
                        ),
                    ),
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_separator_top_global_overwrite' => 'off',
                        'ut_page_hero_separator_top' => 'on',
                        'ut_page_hero_separator_top_color_1_gradient' => 'true'
                    ),
                ),
                
                // top color 2
                array(
                    'id'    => 'ut_page_hero_separator_top_color_2',
                    'metapanel' => 'ut-hero-styling-separator-top-settings',
                    'label' => 'SVG Color Part 2',
                    'desc'  => 'Some Separator Styles can display multiple colors. This is color part 2.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_separator_top_global_overwrite' => 'off',    
                        'ut_page_hero_separator_top' => 'on',
                        'ut_page_hero_separator_svg_top' => 'design_wave|triangle_shadow|snow|slit|abstract_waves|triple_wave_1|triple_wave_2'
                    ),
                ),
                
                array(
                    'id'    => 'ut_page_hero_separator_top_color_2_gradient',
                    'metapanel' => 'ut-hero-styling-separator-top-settings',
                    'label' => 'Add Gradient for SVG Color Part 2?',
                    'desc'  => 'Gradients can make your separator more fancy and also do support rgba colors with opacity.',
                    'type' => 'select',
                    'std' => 'false',
                    'choices' => array(
                        array(
                            'value' => 'false',
                            'label' => 'no thanks!'
                        ),
                        array(
                            'value' => 'true',
                            'label' => 'yes please!'
                        ),
                    ),
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_separator_top_global_overwrite' => 'off',
                        'ut_page_hero_separator_top' => 'on',
                        'ut_page_hero_separator_svg_top' => 'design_wave|triangle_shadow|snow|slit|abstract_waves|triple_wave_1|triple_wave_2'
                    ),
                ),
                
                array(
                    'id'    => 'ut_page_hero_separator_top_color_2_gradient_color',
                    'metapanel' => 'ut-hero-styling-separator-top-settings',
                    'label' => 'SVG Color Part 1 Gradient Color',
                    'desc'  => 'This color usually represents the end color of the gradient while "SVG Color Part 2" represents the start color.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_separator_top_global_overwrite' => 'off',
                        'ut_page_hero_separator_top' => 'on',
                        'ut_page_hero_separator_top_color_2_gradient' => 'true',
                        'ut_page_hero_separator_svg_top' => 'design_wave|triangle_shadow|snow|slit|abstract_waves|triple_wave_1|triple_wave_2'
                    ),
                ),
                
                array(
                    'id'    => 'ut_page_hero_separator_top_color_2_gradient_direction',
                    'metapanel' => 'ut-hero-styling-separator-top-settings',
                    'label' => 'Select Gradient Direction?',
                    'desc'  => 'Select your favourite gradient direction.',
                    'type' => 'select',
                    'std' => 'default',
                    'choices' => array(
                        array(
                            'value' => 'default',
                            'label' => 'Default (left to right)'
                        ),
                        array(
                            'value' => 'diagonal_1',
                            'label' => 'Diagonal (top left to bottom right)'
                        ),
                        array(
                            'value' => 'diagonal_2',
                            'label' => 'Diagonal (top right to bottom left)'
                        ),
                        array(
                            'value' => 'top_down',
                            'label' => 'Top to Down'
                        ),
                    ),
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_separator_top_global_overwrite' => 'off',
                        'ut_page_hero_separator_top' => 'on',
                        'ut_page_hero_separator_top_color_2_gradient' => 'true',
                        'ut_page_hero_separator_svg_top' => 'design_wave|triangle_shadow|snow|slit|abstract_waves|triple_wave_1|triple_wave_2'
                    ),
                ),
                
                
                // top color 3
                array(
                    'id'    => 'ut_page_hero_separator_top_color_3',
                    'metapanel' => 'ut-hero-styling-separator-top-settings',
                    'label' => 'SVG Color Part 3',
                    'desc'  => 'Some Separator Styles can display multiple colors. This is color part 3.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_separator_top_global_overwrite' => 'off',
                        'ut_page_hero_separator_top' => 'on',
                        'ut_page_hero_separator_svg_top' => 'snow|triple_wave_1|triple_wave_2'
                    ),
                ),
                
                array(
                    'id'    => 'ut_page_hero_separator_top_color_3_gradient',
                    'metapanel' => 'ut-hero-styling-separator-top-settings',
                    'label' => 'Add Gradient for SVG Color Part 3?',
                    'desc'  => 'Gradients can make your separator more fancy and also do support rgba colors with opacity.',
                    'type' => 'select',
                    'std' => 'false',
                    'choices' => array(
                        array(
                            'value' => 'false',
                            'label' => 'no thanks!'
                        ),
                        array(
                            'value' => 'true',
                            'label' => 'yes please!'
                        ),
                    ),
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_separator_top_global_overwrite' => 'off',
                        'ut_page_hero_separator_top' => 'on',
                        'ut_page_hero_separator_svg_top' => 'snow|triple_wave_1|triple_wave_2'
                    ),
                ),
                
                array(
                    'id'    => 'ut_page_hero_separator_top_color_3_gradient_color',
                    'metapanel' => 'ut-hero-styling-separator-top-settings',
                    'label' => 'SVG Color Part 1 Gradient Color',
                    'desc'  => 'This color usually represents the end color of the gradient while "SVG Color Part 3" represents the start color.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_separator_top_global_overwrite' => 'off',
                        'ut_page_hero_separator_top' => 'on',
                        'ut_page_hero_separator_top_color_3_gradient' => 'true',
                        'ut_page_hero_separator_svg_top' => 'snow|triple_wave_1|triple_wave_2'
                    ),
                ),
                
                array(
                    'id'    => 'ut_page_hero_separator_top_color_3_gradient_direction',
                    'metapanel' => 'ut-hero-styling-separator-top-settings',
                    'label' => 'Select Gradient Direction?',
                    'desc'  => 'Select your favourite gradient direction.',
                    'type' => 'select',
                    'std' => 'default',
                    'choices' => array(
                        array(
                            'value' => 'default',
                            'label' => 'Default (left to right)'
                        ),
                        array(
                            'value' => 'diagonal_1',
                            'label' => 'Diagonal (top left to bottom right)'
                        ),
                        array(
                            'value' => 'diagonal_2',
                            'label' => 'Diagonal (top right to bottom left)'
                        ),
                        array(
                            'value' => 'top_down',
                            'label' => 'Top to Down'
                        ),
                    ),
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_separator_top_global_overwrite' => 'off',
                        'ut_page_hero_separator_top' => 'on',
                        'ut_page_hero_separator_top_color_3_gradient' => 'true',
                        'ut_page_hero_separator_svg_top' => 'snow|triple_wave_1|triple_wave_2'
                    ),
                ),
                
                // Dimension Settings
                array(
                    'id' => 'ut_page_hero_separator_top_dimension',
                    'metapanel' => 'ut-hero-styling-separator-top-settings',
                    'label' => 'Separator Top Dimension Settings',
                    'type' => 'section_headline',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_separator_top_global_overwrite' => 'off',
                        'ut_page_hero_separator_top' => 'on',
                    ),
                ),
                
                array(
                    'id' => 'ut_page_hero_separator_top_width', 
                    'label' => 'Top Separator Width',
                    'desc' => 'Use the slider bar to set your desired width in %.',
                    'metapanel' => 'ut-hero-styling-separator-top-settings',
                    'type' => 'numeric_slider',
                    'std' => '100',
                    'min_max_step' => '100,300,1',
                    'required' => array(
                        'ut_page_hero_separator_top_global_overwrite' => 'off',
                        'ut_page_hero_separator_top' => 'on',
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id' => 'ut_page_hero_separator_top_height', 
                    'label' => 'Top Separator Height',
                    'desc' => 'Use the slider bar to set your desired height. 0 = default height of separator.',
                    'metapanel' => 'ut-hero-styling-separator-top-settings',
                    'type' => 'numeric_slider',
                    'std' => '0',
                    'min_max_step' => '0,100,1',
                    'required' => array(
                        'ut_page_hero_separator_top_global_overwrite' => 'off',
                        'ut_page_hero_separator_top' => 'on',
                        'ut_page_hero_separator_top_height_unit' => 'percent'
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id' => 'ut_page_hero_separator_top_height_px', 
                    'label' => 'Top Separator Height',
                    'desc' => 'Use the slider bar to set your desired height. 0 = default height of separator.',
                    'metapanel' => 'ut-hero-styling-separator-top-settings',
                    'type' => 'numeric_slider',
                    'std' => '0',
                    'min_max_step' => '0,1440,10',
                    'required' => array(
                        'ut_page_hero_separator_top_global_overwrite' => 'off',
                        'ut_page_hero_separator_top' => 'on',
                        'ut_page_hero_separator_top_height_unit' => 'px'
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id'    => 'ut_page_hero_separator_top_height_unit',
                    'metapanel' => 'ut-hero-styling-separator-top-settings',
                    'label' => 'Height Unit',
                    'desc'  => 'Percentage or Pixel?',
                    'type' => 'select',
                    'std' => 'percent',
                    'choices' => array(
                        array(
                            'value' => 'percent',
                            'label' => 'percent'
                        ),
                        array(
                            'value' => 'px',
                            'label' => 'px'
                        ),
                    ),
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_separator_top_global_overwrite' => 'off',
                        'ut_page_hero_separator_top' => 'on',
                    ),
                ),
                
                // Responsive Settings
                array(
                    'id' => 'ut_page_hero_separator_top_responsive',
                    'metapanel' => 'ut-hero-styling-separator-top-settings',
                    'label' => 'Separator Top Responsive Settings',
                    'type' => 'section_headline',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_separator_top_global_overwrite' => 'off',
                        'ut_page_hero_separator_top' => 'on',
                    ),
                ),
                
                // tablet dimensions
                array(
                    'id'    => 'ut_page_hero_separator_top_hide_on_tablet',
                    'metapanel' => 'ut-hero-styling-separator-top-settings',
                    'label' => 'Hide Top Separator on Tablet?',
                    'desc'  => 'Hide this separator on tablet devices.',
                    'type' => 'select',
                    'std' => 'true',
                    'choices' => array(
                        array(
                            'value' => 'false',
                            'label' => 'no thanks!'
                        ),
                        array(
                            'value' => 'true',
                            'label' => 'yes please!'
                        ),
                    ),
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_separator_top_global_overwrite' => 'off',
                        'ut_page_hero_separator_top' => 'on',
                    ),
                ),
                
                array(
                    'id' => 'ut_page_hero_separator_top_width_tablet', 
                    'label' => 'Top Separator Width on Tablets',
                    'desc' => 'Use the slider bar to set your desired width in %.',
                    'metapanel' => 'ut-hero-styling-separator-top-settings',
                    'type' => 'numeric_slider',
                    'std' => '100',
                    'min_max_step' => '100,300,1',
                    'required' => array(
                        'ut_page_hero_separator_top_global_overwrite' => 'off',
                        'ut_page_hero_separator_top' => 'on',
                        'ut_page_hero_separator_top_hide_on_tablet' => 'false',
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id' => 'ut_page_hero_separator_top_height_tablet', 
                    'label' => 'Top Separator Height on Tablets',
                    'desc' => 'Use the slider bar to set your desired height. 0 = default height of separator.',
                    'metapanel' => 'ut-hero-styling-separator-top-settings',
                    'type' => 'numeric_slider',
                    'std' => '0',
                    'min_max_step' => '0,100,1',
                    'required' => array(
                        'ut_page_hero_separator_top_global_overwrite' => 'off',
                        'ut_page_hero_separator_top' => 'on',
                        'ut_page_hero_separator_top_hide_on_tablet' => 'false',
                        'ut_page_hero_separator_top_height_tablet_unit' => 'percent'
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id' => 'ut_page_hero_separator_top_height_tablet_px', 
                    'label' => 'Top Separator Height on Tablets',
                    'desc' => 'Use the slider bar to set your desired height. 0 = default height of separator.',
                    'metapanel' => 'ut-hero-styling-separator-top-settings',
                    'type' => 'numeric_slider',
                    'std' => '0',
                    'min_max_step' => '0,1280,10',
                    'required' => array(
                        'ut_page_hero_separator_top_global_overwrite' => 'off',
                        'ut_page_hero_separator_top' => 'on',
                        'ut_page_hero_separator_top_hide_on_tablet' => 'false',
                        'ut_page_hero_separator_top_height_tablet_unit' => 'px'
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id'    => 'ut_page_hero_separator_top_height_tablet_unit',
                    'metapanel' => 'ut-hero-styling-separator-top-settings',
                    'label' => 'Height Unit',
                    'desc'  => 'Percentage or Pixel?',
                    'type' => 'select',
                    'std' => 'percent',
                    'choices' => array(
                        array(
                            'value' => 'percent',
                            'label' => 'percent'
                        ),
                        array(
                            'value' => 'px',
                            'label' => 'px'
                        ),
                    ),
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_separator_top_global_overwrite' => 'off',
                        'ut_page_hero_separator_top' => 'on',
                        'ut_page_hero_separator_top_hide_on_tablet' => 'false',
                    ),
                ),
                
                // mobile dimensions
                array(
                    'id'    => 'ut_page_hero_separator_top_hide_on_mobile',
                    'metapanel' => 'ut-hero-styling-separator-top-settings',
                    'label' => 'Hide Top Separator on Mobile?',
                    'desc'  => 'Hide this separator on mobile devices.',
                    'type' => 'select',
                    'std' => 'true',
                    'choices' => array(
                        array(
                            'value' => 'false',
                            'label' => 'no thanks!'
                        ),
                        array(
                            'value' => 'true',
                            'label' => 'yes please!'
                        ),
                    ),
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_separator_top_global_overwrite' => 'off',
                        'ut_page_hero_separator_top' => 'on',
                    ),
                ),
                
                array(
                    'id' => 'ut_page_hero_separator_top_width_mobile', 
                    'label' => 'Top Separator Width on Mobiles',
                    'desc' => 'Use the slider bar to set your desired width in %.',
                    'metapanel' => 'ut-hero-styling-separator-top-settings',
                    'type' => 'numeric_slider',
                    'std' => '100',
                    'min_max_step' => '100,300,1',
                    'required' => array(
                        'ut_page_hero_separator_top_global_overwrite' => 'off',
                        'ut_page_hero_separator_top' => 'on',
                        'ut_page_hero_separator_top_hide_on_mobile' => 'false',
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id' => 'ut_page_hero_separator_top_height_mobile', 
                    'label' => 'Top Separator Height on Mobiles',
                    'desc' => 'Use the slider bar to set your desired height. 0 = default height of separator.',
                    'metapanel' => 'ut-hero-styling-separator-top-settings',
                    'type' => 'numeric_slider',
                    'std' => '0',
                    'min_max_step' => '0,100,1',
                    'required' => array(
                        'ut_page_hero_separator_top_global_overwrite' => 'off',
                        'ut_page_hero_separator_top' => 'on',
                        'ut_page_hero_separator_top_hide_on_mobile' => 'false',
                        'ut_page_hero_separator_top_height_mobile_unit' => 'percent'
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id' => 'ut_page_hero_separator_top_height_mobile_px', 
                    'label' => 'Top Separator Height on Mobiles',
                    'desc' => 'Use the slider bar to set your desired height. 0 = default height of separator.',
                    'metapanel' => 'ut-hero-styling-separator-top-settings',
                    'type' => 'numeric_slider',
                    'std' => '0',
                    'min_max_step' => '0,1280,10',
                    'required' => array(
                        'ut_page_hero_separator_top_global_overwrite' => 'off',
                        'ut_page_hero_separator_top' => 'on',
                        'ut_page_hero_separator_top_hide_on_mobile' => 'false',
                        'ut_page_hero_separator_top_height_mobile_unit' => 'px'
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id'    => 'ut_page_hero_separator_top_height_mobile_unit',
                    'metapanel' => 'ut-hero-styling-separator-top-settings',
                    'label' => 'Height Unit',
                    'desc'  => 'Percentage or Pixel?',
                    'type' => 'select',
                    'std' => 'percent',
                    'choices' => array(
                        array(
                            'value' => 'percent',
                            'label' => 'percent'
                        ),
                        array(
                            'value' => 'px',
                            'label' => 'px'
                        ),
                    ),
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_separator_top_global_overwrite' => 'off',
                        'ut_page_hero_separator_top' => 'on',
                        'ut_page_hero_separator_top_hide_on_mobile' => 'false',
                    ),
                ),
                
                // separator bottom
                array(
                    'id' => 'ut-hero-separator-bottom-settings',
                    'metapanel' => 'ut-hero-styling-separator-bottom-settings',
                    'label' => 'Hero Bottom Separator Settings',
                    'type' => 'panel_headline',
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id' => 'ut_page_hero_separator_bottom_global_overwrite',
                    'metapanel' => 'ut-hero-styling-separator-bottom-settings',
                    'label' => 'Use Global Hero Bottom Separator Setting?',
                    'desc' => '<strong>(optional)</strong>',
                    'type' => 'select',
                    'std' => 'on',
                    'choices' => array(
                        array(
                            'value' => 'on',
                            'label' => 'yes, please!'
                        ),
                        array(
                            'value' => 'off',
                            'label' => 'no, thanks!'
                        )

                    ), /* end choices */
                    'pages' => $post_type_support_2                    
                ),
                
                // separator bottom
                array(
                    'id'    => 'ut_page_hero_separator_bottom',
                    'metapanel' => 'ut-hero-styling-separator-bottom-settings',
                    'label' => 'Add Hero Separator at Bottom?',
                    'desc'  => 'A new refreshing design feature for Hero and Content Sections.',
                    'type' => 'select',
                    'std' => 'off',
                    'choices' => array(
                        array(
                            'value' => 'off',
                            'label' => 'no thanks!'
                        ),
                        array(
                            'value' => 'on',
                            'label' => 'yes please!'
                        ),
                    ),
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_separator_bottom_global_overwrite' => 'off',
                    ),
                ),
                
                array(
                    'id'    => 'ut_page_hero_separator_svg_bottom',
                    'metapanel' => 'ut-hero-styling-separator-bottom-settings',
                    'label' => 'Separator Bottom Style',
                    'desc'  => 'Select your favourite separator style.',
                    'type' => 'select',
                    'std' => 'desing_wave',
                    'choices' => ot_recognized_separator_styles(),
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_separator_bottom_global_overwrite' => 'off',
                        'ut_page_hero_separator_bottom' => 'on'
                    ),
                ),
                
                array(
                    'id'    => 'ut_page_hero_separator_bottom_flip',
                    'metapanel' => 'ut-hero-styling-separator-bottom-settings',
                    'label' => 'Flip Bottom Separator?',
                    'desc'  => 'Flip Separator horizontally.',
                    'type' => 'select',
                    'std' => 'off',
                    'choices' => array(
                        array(
                            'value' => 'false',
                            'label' => 'no thanks!'
                        ),
                        array(
                            'value' => 'true',
                            'label' => 'yes please!'
                        ),
                    ),
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_separator_bottom_global_overwrite' => 'off',
                        'ut_page_hero_separator_bottom' => 'on'
                    ),
                ),
                
                
                // Color Settings
                array(
                    'id' => 'ut_page_hero_separator_bottom_colors',
                    'metapanel' => 'ut-hero-styling-separator-bottom-settings',
                    'label' => 'Separator Bottom Color Settings',
                    'type' => 'section_headline',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_separator_bottom_global_overwrite' => 'off',
                        'ut_page_hero_separator_bottom' => 'on',
                    ),
                ),
                
                // top color 1
                array(
                    'id'    => 'ut_page_hero_separator_bottom_color_1',
                    'metapanel' => 'ut-hero-styling-separator-bottom-settings',
                    'label' => 'SVG Color Part 1',
                    'desc'  => 'Some Separator Styles can display multiple colors. This is color part 1.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_separator_bottom_global_overwrite' => 'off',
                        'ut_page_hero_separator_bottom' => 'on'
                    ),
                ),
                
                array(
                    'id'    => 'ut_page_hero_separator_bottom_color_1_gradient',
                    'metapanel' => 'ut-hero-styling-separator-bottom-settings',
                    'label' => 'Add Gradient for SVG Color Part 1?',
                    'desc'  => 'Gradients can make your separator more fancy and also do support rgba colors with opacity.',
                    'type' => 'select',
                    'std' => 'false',
                    'choices' => array(
                        array(
                            'value' => 'false',
                            'label' => 'no thanks!'
                        ),
                        array(
                            'value' => 'true',
                            'label' => 'yes please!'
                        ),
                    ),
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_separator_bottom_global_overwrite' => 'off',
                        'ut_page_hero_separator_bottom' => 'on'
                    ),
                ),
                
                array(
                    'id'    => 'ut_page_hero_separator_bottom_color_1_gradient_color',
                    'metapanel' => 'ut-hero-styling-separator-bottom-settings',
                    'label' => 'SVG Color Part 1 Gradient Color',
                    'desc'  => 'This color usually represents the end color of the gradient while "SVG Color Part 1" represents the start color.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_separator_bottom_global_overwrite' => 'off',
                        'ut_page_hero_separator_bottom' => 'on',
                        'ut_page_hero_separator_bottom_color_1_gradient' => 'true'
                    ),
                ),
                
                array(
                    'id'    => 'ut_page_hero_separator_bottom_color_1_gradient_direction',
                    'metapanel' => 'ut-hero-styling-separator-bottom-settings',
                    'label' => 'Select Gradient Direction?',
                    'desc'  => 'Select your favourite gradient direction.',
                    'type' => 'select',
                    'std' => 'default',
                    'choices' => array(
                        array(
                            'value' => 'default',
                            'label' => 'Default (left to right)'
                        ),
                        array(
                            'value' => 'diagonal_1',
                            'label' => 'Diagonal (top left to bottom right)'
                        ),
                        array(
                            'value' => 'diagonal_2',
                            'label' => 'Diagonal (top right to bottom left)'
                        ),
                        array(
                            'value' => 'top_down',
                            'label' => 'Top to Down'
                        ),
                    ),
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_separator_bottom_global_overwrite' => 'off',
                        'ut_page_hero_separator_bottom' => 'on',
                        'ut_page_hero_separator_bottom_color_1_gradient' => 'true'
                    ),
                ),
                
                // top color 2
                array(
                    'id'    => 'ut_page_hero_separator_bottom_color_2',
                    'metapanel' => 'ut-hero-styling-separator-bottom-settings',
                    'label' => 'SVG Color Part 2',
                    'desc'  => 'Some Separator Styles can display multiple colors. This is color part 2.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_separator_bottom_global_overwrite' => 'off',
                        'ut_page_hero_separator_bottom' => 'on',
                        'ut_page_hero_separator_svg_bottom' => 'design_wave|triangle_shadow|snow|slit|abstract_waves|triple_wave_1|triple_wave_2'
                    ),
                ),
                
                array(
                    'id'    => 'ut_page_hero_separator_bottom_color_2_gradient',
                    'metapanel' => 'ut-hero-styling-separator-bottom-settings',
                    'label' => 'Add Gradient for SVG Color Part 2?',
                    'desc'  => 'Gradients can make your separator more fancy and also do support rgba colors with opacity.',
                    'type' => 'select',
                    'std' => 'false',
                    'choices' => array(
                        array(
                            'value' => 'false',
                            'label' => 'no thanks!'
                        ),
                        array(
                            'value' => 'true',
                            'label' => 'yes please!'
                        ),
                    ),
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_separator_bottom_global_overwrite' => 'off',
                        'ut_page_hero_separator_bottom' => 'on',
                        'ut_page_hero_separator_svg_bottom' => 'design_wave|triangle_shadow|snow|slit|abstract_waves|triple_wave_1|triple_wave_2'
                    ),
                ),
                
                array(
                    'id'    => 'ut_page_hero_separator_bottom_color_2_gradient_color',
                    'metapanel' => 'ut-hero-styling-separator-bottom-settings',
                    'label' => 'SVG Color Part 1 Gradient Color',
                    'desc'  => 'This color usually represents the end color of the gradient while "SVG Color Part 2" represents the start color.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_separator_bottom_global_overwrite' => 'off',
                        'ut_page_hero_separator_bottom' => 'on',
                        'ut_page_hero_separator_bottom_color_2_gradient' => 'true',
                        'ut_page_hero_separator_svg_bottom' => 'design_wave|triangle_shadow|snow|slit|abstract_waves|triple_wave_1|triple_wave_2'
                    ),
                ),
                
                array(
                    'id'    => 'ut_page_hero_separator_bottom_color_2_gradient_direction',
                    'metapanel' => 'ut-hero-styling-separator-bottom-settings',
                    'label' => 'Select Gradient Direction?',
                    'desc'  => 'Select your favourite gradient direction.',
                    'type' => 'select',
                    'std' => 'default',
                    'choices' => array(
                        array(
                            'value' => 'default',
                            'label' => 'Default (left to right)'
                        ),
                        array(
                            'value' => 'diagonal_1',
                            'label' => 'Diagonal (top left to bottom right)'
                        ),
                        array(
                            'value' => 'diagonal_2',
                            'label' => 'Diagonal (top right to bottom left)'
                        ),
                        array(
                            'value' => 'top_down',
                            'label' => 'Top to Down'
                        ),
                    ),
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_separator_bottom_global_overwrite' => 'off',
                        'ut_page_hero_separator_bottom' => 'on',
                        'ut_page_hero_separator_bottom_color_2_gradient' => 'true',
                        'ut_page_hero_separator_svg_bottom' => 'design_wave|triangle_shadow|snow|slit|abstract_waves|triple_wave_1|triple_wave_2'
                    ),
                ),
                
                
                // top color 3
                array(
                    'id'    => 'ut_page_hero_separator_bottom_color_3',
                    'metapanel' => 'ut-hero-styling-separator-bottom-settings',
                    'label' => 'SVG Color Part 3',
                    'desc'  => 'Some Separator Styles can display multiple colors. This is color part 3.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_separator_bottom_global_overwrite' => 'off',
                        'ut_page_hero_separator_bottom' => 'on',
                        'ut_page_hero_separator_svg_bottom' => 'snow|triple_wave_1|triple_wave_2'
                    ),
                ),
                
                array(
                    'id'    => 'ut_page_hero_separator_bottom_color_3_gradient',
                    'metapanel' => 'ut-hero-styling-separator-bottom-settings',
                    'label' => 'Add Gradient for SVG Color Part 3?',
                    'desc'  => 'Gradients can make your separator more fancy and also do support rgba colors with opacity.',
                    'type' => 'select',
                    'std' => 'false',
                    'choices' => array(
                        array(
                            'value' => 'false',
                            'label' => 'no thanks!'
                        ),
                        array(
                            'value' => 'true',
                            'label' => 'yes please!'
                        ),
                    ),
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_separator_bottom_global_overwrite' => 'off',
                        'ut_page_hero_separator_bottom' => 'on',
                        'ut_page_hero_separator_svg_bottom' => 'snow|triple_wave_1|triple_wave_2|triple_wave_2'
                    ),
                ),
                
                array(
                    'id'    => 'ut_page_hero_separator_bottom_color_3_gradient_color',
                    'metapanel' => 'ut-hero-styling-separator-bottom-settings',
                    'label' => 'SVG Color Part 1 Gradient Color',
                    'desc'  => 'This color usually represents the end color of the gradient while "SVG Color Part 3" represents the start color.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_separator_bottom_global_overwrite' => 'off',
                        'ut_page_hero_separator_bottom' => 'on',
                        'ut_page_hero_separator_bottom_color_3_gradient' => 'true',
                        'ut_page_hero_separator_svg_bottom' => 'snow|triple_wave_1|triple_wave_2|triple_wave_2'
                    ),
                ),
                
                array(
                    'id'    => 'ut_page_hero_separator_bottom_color_3_gradient_direction',
                    'metapanel' => 'ut-hero-styling-separator-bottom-settings',
                    'label' => 'Select Gradient Direction?',
                    'desc'  => 'Select your favourite gradient direction.',
                    'type' => 'select',
                    'std' => 'default',
                    'choices' => array(
                        array(
                            'value' => 'default',
                            'label' => 'Default (left to right)'
                        ),
                        array(
                            'value' => 'diagonal_1',
                            'label' => 'Diagonal (top left to bottom right)'
                        ),
                        array(
                            'value' => 'diagonal_2',
                            'label' => 'Diagonal (top right to bottom left)'
                        ),
                        array(
                            'value' => 'top_down',
                            'label' => 'Top to Down'
                        ),
                    ),
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_separator_bottom_global_overwrite' => 'off',
                        'ut_page_hero_separator_bottom' => 'on',
                        'ut_page_hero_separator_bottom_color_3_gradient' => 'true',
                        'ut_page_hero_separator_svg_bottom' => 'snow|triple_wave_1'
                    ),
                ),
                
                // Dimension Settings
                array(
                    'id' => 'ut_page_hero_separator_bottom_dimension',
                    'metapanel' => 'ut-hero-styling-separator-bottom-settings',
                    'label' => 'Separator Bottom Dimension Settings',
                    'type' => 'section_headline',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_separator_bottom_global_overwrite' => 'off',
                        'ut_page_hero_separator_bottom' => 'on',
                    ),
                ),
                
                array(
                    'id' => 'ut_page_hero_separator_bottom_width', 
                    'label' => 'Bottom Separator Width',
                    'desc' => 'Use the slider bar to set your desired width in %.',
                    'metapanel' => 'ut-hero-styling-separator-bottom-settings',
                    'type' => 'numeric_slider',
                    'std' => '100',
                    'min_max_step' => '100,300,1',
                    'required' => array(
                        'ut_page_hero_separator_bottom_global_overwrite' => 'off',
                        'ut_page_hero_separator_bottom' => 'on',
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id' => 'ut_page_hero_separator_bottom_height', 
                    'label' => 'Bottom Separator Height',
                    'desc' => 'Use the slider bar to set your desired height. 0 = default height of separator.',
                    'metapanel' => 'ut-hero-styling-separator-bottom-settings',
                    'type' => 'numeric_slider',
                    'std' => '0',
                    'min_max_step' => '0,100,1',
                    'required' => array(
                        'ut_page_hero_separator_bottom_global_overwrite' => 'off',
                        'ut_page_hero_separator_bottom' => 'on',
                        'ut_page_hero_separator_bottom_height_unit' => 'percent'
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                 array(
                    'id' => 'ut_page_hero_separator_bottom_height_px', 
                    'label' => 'Bottom Separator Height',
                    'desc' => 'Use the slider bar to set your desired height. 0 = default height of separator.',
                    'metapanel' => 'ut-hero-styling-separator-bottom-settings',
                    'type' => 'numeric_slider',
                    'std' => '0',
                    'min_max_step' => '0,1440,10',
                    'required' => array(
                        'ut_page_hero_separator_bottom_global_overwrite' => 'off',
                        'ut_page_hero_separator_bottom' => 'on',
                        'ut_page_hero_separator_bottom_height_unit' => 'px'
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id'    => 'ut_page_hero_separator_bottom_height_unit',
                    'metapanel' => 'ut-hero-styling-separator-bottom-settings',
                    'label' => 'Height Unit',
                    'desc'  => 'Percentage or Pixel?',
                    'type' => 'select',
                    'std' => 'percent',
                    'choices' => array(
                        array(
                            'value' => 'percent',
                            'label' => 'percent'
                        ),
                        array(
                            'value' => 'px',
                            'label' => 'px'
                        ),
                    ),
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_separator_bottom_global_overwrite' => 'off',
                        'ut_page_hero_separator_bottom' => 'on',
                    ),
                ),
                
                
                // Responsive Settings
                array(
                    'id' => 'ut_page_hero_separator_bottom_responsive',
                    'metapanel' => 'ut-hero-styling-separator-bottom-settings',
                    'label' => 'Separator Bottom Responsive Settings',
                    'type' => 'section_headline',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_separator_bottom_global_overwrite' => 'off',
                        'ut_page_hero_separator_bottom' => 'on',
                    ),
                ),
                
                // tablet dimensions
                array(
                    'id'    => 'ut_page_hero_separator_bottom_hide_on_tablet',
                    'metapanel' => 'ut-hero-styling-separator-bottom-settings',
                    'label' => 'Hide Bottom Separator on Tablet?',
                    'desc'  => 'Hide this separator on tablet devices.',
                    'type' => 'select',
                    'std' => 'true',
                    'choices' => array(
                        array(
                            'value' => 'false',
                            'label' => 'no thanks!'
                        ),
                        array(
                            'value' => 'true',
                            'label' => 'yes please!'
                        ),
                    ),
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_separator_bottom_global_overwrite' => 'off',
                        'ut_page_hero_separator_bottom' => 'on',
                    ),
                ),
                
                array(
                    'id' => 'ut_page_hero_separator_bottom_width_tablet', 
                    'label' => 'Bottom Separator Width on Tablets',
                    'desc' => 'Use the slider bar to set your desired width in %.',
                    'metapanel' => 'ut-hero-styling-separator-bottom-settings',
                    'type' => 'numeric_slider',
                    'std' => '100',
                    'min_max_step' => '100,300,1',
                    'required' => array(
                        'ut_page_hero_separator_bottom_global_overwrite' => 'off',
                        'ut_page_hero_separator_bottom' => 'on',
                        'ut_page_hero_separator_bottom_hide_on_tablet' => 'false',
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id' => 'ut_page_hero_separator_bottom_height_tablet', 
                    'label' => 'Bottom Separator Height on Tablets',
                    'desc' => 'Use the slider bar to set your desired height. 0 = default height of separator.',
                    'metapanel' => 'ut-hero-styling-separator-bottom-settings',
                    'type' => 'numeric_slider',
                    'std' => '0',
                    'min_max_step' => '0,100,1',
                    'required' => array(
                        'ut_page_hero_separator_bottom_global_overwrite' => 'off',
                        'ut_page_hero_separator_bottom' => 'on',
                        'ut_page_hero_separator_bottom_hide_on_tablet' => 'false',
                        'ut_page_hero_separator_bottom_height_tablet_unit' => 'percent'
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id' => 'ut_page_hero_separator_bottom_height_tablet_px', 
                    'label' => 'Bottom Separator Height on Tablets',
                    'desc' => 'Use the slider bar to set your desired height. 0 = default height of separator.',
                    'metapanel' => 'ut-hero-styling-separator-bottom-settings',
                    'type' => 'numeric_slider',
                    'std' => '0',
                    'min_max_step' => '0,1280,10',
                    'required' => array(
                        'ut_page_hero_separator_bottom_global_overwrite' => 'off',
                        'ut_page_hero_separator_bottom' => 'on',
                        'ut_page_hero_separator_bottom_hide_on_tablet' => 'false',
                        'ut_page_hero_separator_bottom_height_tablet_unit' => 'px'
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id'    => 'ut_page_hero_separator_bottom_height_tablet_unit',
                    'metapanel' => 'ut-hero-styling-separator-bottom-settings',
                    'label' => 'Height Unit',
                    'desc'  => 'Percentage or Pixel?',
                    'type' => 'select',
                    'std' => 'percent',
                    'choices' => array(
                        array(
                            'value' => 'percent',
                            'label' => 'percent'
                        ),
                        array(
                            'value' => 'px',
                            'label' => 'px'
                        ),
                    ),
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_separator_bottom_global_overwrite' => 'off',
                        'ut_page_hero_separator_bottom' => 'on',
                        'ut_page_hero_separator_bottom_hide_on_tablet' => 'false',
                    ),
                ),
                
                // mobile dimensions
                array(
                    'id'    => 'ut_page_hero_separator_bottom_hide_on_mobile',
                    'metapanel' => 'ut-hero-styling-separator-bottom-settings',
                    'label' => 'Hide Bottom Separator on Mobile?',
                    'desc'  => 'Hide this separator on mobile devices.',
                    'type' => 'select',
                    'std' => 'true',
                    'choices' => array(
                        array(
                            'value' => 'false',
                            'label' => 'no thanks!'
                        ),
                        array(
                            'value' => 'true',
                            'label' => 'yes please!'
                        ),
                    ),
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_separator_bottom_global_overwrite' => 'off',
                        'ut_page_hero_separator_bottom' => 'on',
                    ),
                ),
                
                array(
                    'id' => 'ut_page_hero_separator_bottom_width_mobile', 
                    'label' => 'Bottom Separator Width on Mobiles',
                    'desc' => 'Use the slider bar to set your desired width in %.',
                    'metapanel' => 'ut-hero-styling-separator-bottom-settings',
                    'type' => 'numeric_slider',
                    'std' => '100',
                    'min_max_step' => '100,300,1',
                    'required' => array(
                        'ut_page_hero_separator_bottom_global_overwrite' => 'off',
                        'ut_page_hero_separator_bottom' => 'on',
                        'ut_page_hero_separator_bottom_hide_on_mobile' => 'false',
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id' => 'ut_page_hero_separator_bottom_height_mobile', 
                    'label' => 'Bottom Separator Height on Mobiles',
                    'desc' => 'Use the slider bar to set your desired height in %. 0 = default height of separator.',
                    'metapanel' => 'ut-hero-styling-separator-bottom-settings',
                    'type' => 'numeric_slider',
                    'std' => '0',
                    'min_max_step' => '0,100,1',
                    'required' => array(
                        'ut_page_hero_separator_bottom_global_overwrite' => 'off',
                        'ut_page_hero_separator_bottom' => 'on',
                        'ut_page_hero_separator_bottom_hide_on_mobile' => 'false',
                        'ut_page_hero_separator_bottom_height_mobile_unit' => 'percent'
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id' => 'ut_page_hero_separator_bottom_height_mobile_px', 
                    'label' => 'Bottom Separator Height on Mobiles',
                    'desc' => 'Use the slider bar to set your desired height in %. 0 = default height of separator.',
                    'metapanel' => 'ut-hero-styling-separator-bottom-settings',
                    'type' => 'numeric_slider',
                    'std' => '0',
                    'min_max_step' => '0,1280,10',
                    'required' => array(
                        'ut_page_hero_separator_bottom_global_overwrite' => 'off',
                        'ut_page_hero_separator_bottom' => 'on',
                        'ut_page_hero_separator_bottom_hide_on_mobile' => 'false',
                        'ut_page_hero_separator_bottom_height_mobile_unit' => 'px'
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id'    => 'ut_page_hero_separator_bottom_height_mobile_unit',
                    'metapanel' => 'ut-hero-styling-separator-bottom-settings',
                    'label' => 'Height Unit',
                    'desc'  => 'Percentage or Pixel?',
                    'type' => 'select',
                    'std' => 'percent',
                    'choices' => array(
                        array(
                            'value' => 'percent',
                            'label' => 'percent'
                        ),
                        array(
                            'value' => 'px',
                            'label' => 'px'
                        ),
                    ),
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_separator_bottom_global_overwrite' => 'off',
                        'ut_page_hero_separator_bottom' => 'on',
                        'ut_page_hero_separator_bottom_hide_on_mobile' => 'false',
                    ),
                ),
                
                /** 
                 * Portfolio
                 */

                array(
                    'id' => 'ut_portfolio_settings',
                    'metapanel' => 'ut-portfolio-details',
                    'label' => 'Portfolio Details',
                    'type' => 'panel_headline',
                    'pages' => $post_type_support_3,
                ),

                array(
                    'id' => 'ut_portfolio_link_type',
                    'metapanel' => 'ut-portfolio-details',
                    'label' => 'Show Portfolio',
                    'type' => 'select',
                    'desc' => 'Choose how the portfolio content should be displayed. If you choose "inside a lightbox or slideup box", the portfolio item gets opened inside a lightbox or slideup box ( depends on your showcase settings ). The option "on a separate portfolio page" will redirect the user to a single portfolio page, where you can add way more content and media. Note: Global only works correctly if the portfolio item has been assigned to a category which is part of the showcase.',
                    'std' => 'global',
                    'choices' => array(
                        array(
                            'value' => 'global',
                            'label' => 'global (from showcase options)'
                        ),
                        array(
                            'value' => 'onepage',
                            'label' => 'inside a slideup box (not available for react slider)'
                        ),
                        array(
                            'value' => 'popup',
                            'label' => 'inside a lightbox (not available for react slider)'
                        ),
                        array(
                            'value' => 'internal',
                            'label' => 'on a separate portfolio page'
                        ),
                        array(
                            'value' => 'external',
                            'label' => 'on an external website (not available for react slider)'
                        )
                    ),
                    'pages' => $post_type_support_3,
                ),

                array(
                    'id' => 'ut_external_link',
                    'metapanel' => 'ut-portfolio-details',
                    'label' => 'Project Link',
                    'type' => 'text',
                    'desc' => 'Redirect the portfolio thumbnail directly to an external site.',
                    'required' => array(
                        'ut_portfolio_link_type' => 'external'
                    ),
                    'pages' => $post_type_support_3,
                ),

	            array(
		            'id' => 'ut_external_link_target',
		            'metapanel' => 'ut-portfolio-details',
		            'label' => 'Project Link Target',
		            'type' => 'select',
		            'desc' => 'Target for external site.',
		            'choices' => array(
			            array(
				            'value' => '_blank',
				            'label' => '_blank. Opens the linked document in a new window or tab. (default)'
			            ),
			            array(
				            'value' => '_self',
				            'label' => '_self. Opens the linked document in the same frame as it was clicked.'
			            ),
		            ),
		            'required' => array(
			            'ut_portfolio_link_type' => 'external'
		            ),
		            'pages' => $post_type_support_3,
	            ),

                array(
                    'id' => 'ut_single_portfolio_navigation',
                    'metapanel' => 'ut-portfolio-details',
                    'label' => 'Activate Portfolio Navigation?',
                    'desc' => 'A navigation with links to the previous and next portfolio post as well as a link to the page which holds the main portfolio overview. Only for Portfolio Single Pages!',
                    'type' => 'select',
                    'std' => 'global',
                    'choices' => array(
                        array(
                            'value' => 'global',
                            'label' => 'Default (Theme Options)',
                        ),
                        array(
                            'value' => 'on',
                            'label' => 'yes, please!'
                        ),
                        array(
                            'value' => 'off',
                            'label' => 'no, thanks!'
                        )
                    ),
					'required' => array(
                        'ut_portfolio_link_type' => 'internal'
                    ),
                    'pages' => $post_type_support_3,
                ),    
            
				array(
                    'id' => 'ut_slide_up_portfolio_hide_media',
                    'metapanel' => 'ut-portfolio-details',
                    'label' => 'Hide Media in Slide Up?',
                    'desc' => 'If you like to completley hide the media inside the Slide Up Box, please us this option.',
                    'type' => 'select',
                    'std' => 'off',
                    'choices' => array(
                        array(
                            'value' => 'on',
                            'label' => 'yes, please!'
                        ),
                        array(
                            'value' => 'off',
                            'label' => 'no, thanks!'
                        )
                    ),
					'required' => array(
                        'ut_portfolio_link_type' => 'onepage'
                    ),
                    'pages' => $post_type_support_3,
                ), 
				
				
                /** 
                 * Page Header Settings 
                 */

                array(
                    'id' => 'ut_page_settings',
                    'metapanel' => 'ut-page-header-settings',
                    'label' => 'Page Title Settings',
                    'type' => 'panel_headline',
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_display_section_header',
                    'metapanel' => 'ut-page-header-settings',
                    'label' => 'Show Page Title?',
                    'desc' => 'A page title typically forms the first element inside a section or page. It\'s located right above the content and contains the page title as well as an optional lead slogan which can be entered a few option beneath this one. With the help of this option you can easily hide this element.',
                    'type' => 'select',
                    'std' => 'global',
                    'class' => 'ut-section-header-state',
                    'choices' => array(
                        array(
                            'label' => 'Default (Theme Options)',
                            'value' => 'global'
                        ),            
                        array(
                            'label' => 'Show',
                            'value' => 'show'
                        ),
                        array(
                            'label' => 'Hide',
                            'value' => 'hide'
                        )
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_section_header_align',
                    'metapanel' => 'ut-page-header-settings',
                    'label' => 'Page Title Alignment',
                    'desc' => 'only available when <strong>Section Width / Style</strong> width has been set to: "Centered" or "Fullwidth Content". This option can be found inside the "Section Settings" tab.',
                    'type' => 'select',
                    'std' => 'center',
                    'class' => 'ut-section-header-state',
                    'choices' => array(
                        array(
                            'label' => 'Center',
                            'value' => 'center'
                        ),
                        array(
                            'label' => 'Left',
                            'value' => 'left'
                        ),
                        array(
                            'label' => 'Right',
                            'value' => 'right'
                        )
                    ),
                    'required' => array(
                        'ut_section_width' => 'centered|fullwidth'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_section_header_width',
                    'metapanel' => 'ut-page-header-settings',
                    'label' => 'Page Title Width',
                    'desc' => 'It handles centering the content within the page title. Centered content has a max width of 1200px and fullwidth content 100%.',
                    'type' => 'select',
                    'std' => 'global',
                    'choices' => array(
                        array(
                            'label' => 'Default (Theme Options)',
                            'value' => 'global'
                        ),
                        array(
                            'label' => '7/10 (default)',
                            'value' => 'seven'
                        ),
                        array(
                            'label' => '10/10 (fullwidth)',
                            'value' => 'ten'
                        )
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_section_header_text_align',
                    'metapanel' => 'ut-page-header-settings',
                    'label' => 'Page Title Text Alignment',
                    'desc' => 'Not available for Section Style "Split Content"',
                    'type' => 'select',
                    'std' => 'global',
                    'choices' => array(
                        array(
                            'label' => 'Default (Theme Options)',
                            'value' => 'global'
                        ),
                        array(
                            'label' => 'Center',
                            'value' => 'center'
                        ),
                        array(
                            'label' => 'Left',
                            'value' => 'left'
                        )
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_section_header_style',
                    'metapanel' => 'ut-page-header-settings',
                    'label' => 'Page Title Style',
                    'desc' => 'Choose between one of these 7 nice page title styles. You can optionally change it\'s color inside the "Color Settings" tab. <a href="#" class="ut-header-preview">Preview Page Title Styles</a>',
                    'type' => 'select',
                    'std' => 'global',
                    'choices' => array(
                        array(
                            'label' => 'Default (Theme Options)',
                            'value' => 'global'
                        ),
                        array(
                            'label' => 'Style One',
                            'value' => 'pt-style-1'
                        ),
                        array(
                            'label' => 'Style Two',
                            'value' => 'pt-style-2'
                        ),
                        array(
                            'label' => 'Style Three',
                            'value' => 'pt-style-3'
                        ),
                        array(
                            'label' => 'Style Four',
                            'value' => 'pt-style-4'
                        ),
                        array(
                            'label' => 'Style Five',
                            'value' => 'pt-style-5'
                        ),
                        array(
                            'label' => 'Style Six',
                            'value' => 'pt-style-6'
                        ),
                        array(
                            'label' => 'Style Seven',
                            'value' => 'pt-style-7'
                        )

                    ),
                    'pages' => $post_type_support_2,
                ),

                /*array(
                    'id' => 'ut_section_headline_style_1_type',
                    'metapanel' => 'ut-page-header-settings',
                    'label' => 'Decoration Line Location',
                    'desc' => 'Select between 2 different locations.',
                    'type' => 'select',
                    'std' => 'global',
                    'choices' => array(
                        array(
                            'label' => 'Default (Theme Options)',
                            'value' => 'global'
                        ), 
                        array(
                            'value' => 'section',
                            'label' => 'Decoration Line as Linetrough'
                        ),
                        array(
                            'value' => 'parallax',
                            'label' => 'Decoration Line above Title'
                        ),
                    ),
                    'required' => array(
                        'ut_section_header_style' => 'pt-style-1'
                    )
                ),*/

                array(
                    'id' => 'ut_section_headline_style_2_color',
                    'metapanel' => 'ut-page-header-settings',
                    'label' => 'Style Two Decoration Line Color',
                    'desc' => '<strong>(optional)</strong>',
                    'type' => 'colorpicker',
                    'required' => array(
                        'ut_section_header_style' => 'pt-style-2'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_section_headline_style_2_height',
                    'metapanel' => 'ut-page-header-settings',
                    'label' => 'Style Two Decoration Line Height',
                    'desc' => '<strong>(optional)</strong> - value in px , default: 1px',
                    'type' => 'text',
                    'required' => array(
                        'ut_section_header_style' => 'pt-style-2'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_section_headline_style_2_width',
                    'metapanel' => 'ut-page-header-settings',
                    'label' => 'Style Two Decoration Line Width',
                    'desc' => '<strong>(optional)</strong> - value in % or px , default: 30px',
                    'type' => 'text',
                    'required' => array(
                        'ut_section_header_style' => 'pt-style-2'
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id' => 'ut_section_headline_style_4_width',
                    'metapanel' => 'ut-page-header-settings',
                    'label' => 'Style Four Decoration Line Width',
                    'desc' => 'Drag the handle to set the line width.',
                    'type' => 'numeric-slider',
                    'min_max_step' => '1,10,1',
                    'std' => '6',
                    'required' => array(
                        'ut_section_header_style' => 'pt-style-4'
                    ),
                    'pages' => $post_type_support_2,
                ),
                array(
                    'id' => 'ut_page_page_title_glitch_appear',
                    'metapanel' => 'ut-page-header-settings',
                    'label' => 'Add Text Distortion?',
                    'desc' => 'Activates Glitch Text Distortion Effect for Section Headlines.',
                    'type' => 'select',
                    'global' => 'on',
                    'choices' => array(
                        array(
                            'value' => 'off',
                            'label' => 'no thanks!'
                        ),
                        array(
                            'value' => 'on_appear',
                            'label' => 'yes, apply on appear!'
                        ),
                        array(
                            'value' => 'permanent',
                            'label' => 'yes, apply permanently!'
                        ),

                    ),
                    'pages' => $post_type_support_2,
                ),
                array(
                    'id' => 'ut_page_page_title_glitch_appear_style',
                    'metapanel' => 'ut-page-header-settings',
                    'label' => 'Text Distortion Style?',
                    'desc' => 'Select desired text distortion style.',
                    'type' => 'select',
                    'global' => 'on',
                    'choices' => array(
                        array(
                            'value' => 'style-1',
                            'label' => 'Style 1'
                        ),
                        array(
                            'value' => 'style-2',
                            'label' => 'Style 2'
                        ),
                        array(
                            'value' => 'style-3',
                            'label' => 'Style 3'
                        ),
                    ),
                    'required' => array(
                        'ut_page_page_title_glitch_appear' => 'on_appear|on_hover|permanent'
                    ),
                    'pages' => $post_type_support_2,
                ),
                array(
                    'id' => 'ut_page_page_title_glitch',
                    'metapanel' => 'ut-page-header-settings',
                    'label' => 'Add Glitch Effect',
                    'desc' => 'Activate Glitch Effect for <strong>General Page Title</strong>? Note: This effect does not work with "Hero Caption Style 1".',
                    'type' => 'select',
                    'global' => 'on',
                    'choices' => array(
                        array(
                            'value' => 'off',
                            'label' => 'no thanks!'
                        ),
                        array(
                            'value' => 'on',
                            'label' => 'yes please!'
                        ),
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_page_title_glitch_style',
                    'metapanel' => 'ut-page-header-settings',
                    'label' => 'Select Glitch Style',
                    'desc' => '<strong>(optional)</strong>',
                    'type' => 'select',
                    'global' => 'on',
                    'choices' => array(
                        array(
                            'value' => 'ut-glitch-2',
                            'label' => 'Light Glitch with 2 optional accent colors.'
                        ),
                        array(
                            'value' => 'ut-glitch-1',
                            'label' => 'Heavy Glitch with 2 optional accent colors.'
                        ),
                    ),
                    'required' => array(
                        'ut_page_page_title_glitch' => 'on'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_page_title_glitch_accent_1',
                    'metapanel' => 'ut-page-header-settings',
                    'label' => 'Glitch Color Part 1',
                    'desc' => '<strong>(optional)</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_page_page_title_glitch' => 'on',
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_page_title_glitch_accent_2',
                    'metapanel' => 'ut-page-header-settings',
                    'label' => 'Glitch Color Part 2',
                    'desc' => '<strong>(optional)</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_page_page_title_glitch' => 'on',
                    ),
                    'pages' => $post_type_support_2,
                ),
                array(
                    'id' => 'ut_page_page_title_stroke_effect',
                    'metapanel' => 'ut-page-header-settings',
                    'label' => 'Add Stroke Effect',
                    'desc' => '<strong>(optional)</strong>',
                    'type' => 'select',
                    'global' => 'on',
                    'choices' => array(
                        array(
                            'value' => 'on',
                            'label' => 'yes please!'
                        ),
                        array(
                            'value' => 'off',
                            'label' => 'no thanks!'
                        ),
                    ),
                    'pages' => $post_type_support_2,
                ),
                array(
                    'id' => 'ut_page_page_title_stroke_color',
                    'metapanel' => 'ut-page-header-settings',
                    'label' => 'Stroke Color',
                    'desc' => '<strong>(optional)</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_page_page_title_stroke_effect' => 'on'
                    ),
                    'pages' => $post_type_support_2,
                ),
                array(
                    'id' => 'ut_page_page_title_stroke_width',
                    'metapanel' => 'ut-page-header-settings',
                    'label' => 'Stroke Width',
                    'desc' => 'Drag the handle to set the stroke width. Default: 1.',
                    'global' => 'on',
                    'type' => 'numeric-slider',
                    'min_max_step' => '1,3,1',
                    'required' => array(
                        'ut_page_title_stroke_effect' => 'on'
                    ),
                    'pages' => $post_type_support_2,
                ),
                array(
                    'id' => 'ut_page_page_title_glow',
                    'metapanel' => 'ut-page-header-settings',
                    'label' => 'Add Glow Effect',
                    'desc' => '<strong>(optional)</strong>',
                    'type' => 'select',
                    'global' => 'on',
                    'choices' => array(
                        array(
                            'value' => 'off',
                            'label' => 'no thanks!'
                        ),
                        array(
                            'value' => 'on',
                            'label' => 'yes please!'
                        ),
                    ),
                    'required' => array(
                        'ut_section_header_style' => 'pt-style-2|pt-style-3|pt-style-4|pt-style-5|pt-style-6|pt-style-7'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_page_title_glow_color',
                    'metapanel' => 'ut-page-header-settings',
                    'label' => 'Glow Color',
                    'desc' => '<strong>(optional)</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_page_page_title_glow' => 'on',
                        'ut_section_header_style' => 'pt-style-2|pt-style-3|pt-style-4|pt-style-5|pt-style-6|pt-style-7'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_page_title_glow_shadow_color',
                    'metapanel' => 'ut-page-header-settings',
                    'label' => 'Glow Text Shadow Color',
                    'desc' => '<strong>(optional)</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_page_page_title_glow' => 'on',
                        'ut_section_header_style' => 'pt-style-2|pt-style-3|pt-style-4|pt-style-5|pt-style-6|pt-style-7'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_section_header_font_style',
                    'metapanel' => 'ut-page-header-settings',
                    'label' => 'Font Style',
                    'type' => 'select',
                    'std' => 'global',
                    'desc' => 'Choose between 6 different font styles. <a href="#" class="ut-font-preview">Preview Theme Font Style</a>',
                    'choices' => array(
                        array(
                            'label' => 'Default (Theme Options)',
                            'value' => 'global'
                        ),
                        array(
                            'label' => 'Extralight',
                            'value' => 'extralight'
                        ),
                        array(
                            'label' => 'Light',
                            'value' => 'light'
                        ),
                        array(
                            'label' => 'Regular',
                            'value' => 'regular'
                        ),
                        array(
                            'label' => 'Medium',
                            'value' => 'medium'
                        ),
                        array(
                            'label' => 'Semi Bold',
                            'value' => 'semibold'
                        ),
                        array(
                            'label' => 'Bold',
                            'value' => 'bold'
                        ),

                    ),
                    'pages' => $post_type_support_2,

                ),

                array(
                    'id' => 'ut_section_slogan_padding',
                    'metapanel' => 'ut-page-header-settings',
                    'label' => 'Page Title Spacing Bottom',
                    'desc' => '<strong>(optional)</strong> -  include "px" in your string. e.g. 150px (default: 30px). This option defines the space between header and content.',
                    'type' => 'text',
                    'section_class' => 'ut-section-header-opt',
                    'class' => '',
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_section_header_margin_left',
                    'metapanel' => 'ut-page-header-settings',
                    'label' => 'Margin Left',
                    'desc' => '<strong>(optional)</strong> -  include "px" in your string. e.g. 30px (default: 0px).',
                    'type' => 'text',
                    'section_class' => 'ut-section-header-opt',
                    'pages' => $post_type_support_2,

                ),

                array(
                    'id' => 'ut_section_header_margin_right',
                    'metapanel' => 'ut-page-header-settings',
                    'label' => 'Margin Right',
                    'desc' => '<strong>(optional)</strong> -  include "px" in your string. e.g. 30px (default: 0px).',
                    'type' => 'text',
                    'section_class' => 'ut-section-header-opt',
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_section_slogan_headline',
                    'metapanel' => 'ut-page-header-settings',
                    'label' => 'Page Title Lead Settings',
                    'type' => 'section_headline',
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_section_slogan',
                    'metapanel' => 'ut-page-header-settings',
                    'label' => 'Page Title Lead', /* slogan */
                    'desc' => 'You can also insert HTML as well as for example button shortcodes. <a class="ut-faq-link" target="_blank" href="http://faq.unitedthemes.com/brooklyn/buttons/"> Learn more about: Button Shortcodes</a>',
                    'type' => 'textarea-simple',
                    'rows' => '5',
                    'pages' => $post_type_support_2,

                ),

                array(
                    'id' => 'ut_section_slogan_padding_left',
                    'metapanel' => 'ut-page-header-settings',
                    'label' => 'Header Lead Padding Left',
                    'desc' => '<strong>(optional)</strong> -  include "px" in your string. e.g. 30px (default: 0px).',
                    'type' => 'text',
                    'section_class' => 'ut-section-header-opt',
                    'pages' => $post_type_support_2,

                ),

                array(
                    'id' => 'ut_section_slogan_padding_right',
                    'metapanel' => 'ut-page-header-settings',
                    'label' => 'Header Lead Padding Right',
                    'desc' => '<strong>(optional)</strong> -  include "px" in your string. e.g. 30px (default: 0px).',
                    'type' => 'text',
                    'section_class' => 'ut-section-header-opt',
                    'pages' => $post_type_support_2,

                ),

                /** 
                 * Page Settings 
                 */

                array(
                    'id' => 'ut_page_settings',
                    'metapanel' => 'ut-page-settings',
                    'label' => 'Page Settings',
                    'type' => 'panel_headline',
                    'pages' => $post_type_support_2,
                ),
                array(
                    'id' => 'ut_page_fullwidth',
                    'metapanel' => 'ut-page-settings',
                    'label' => 'Make Page Full Width?',
                    'desc' => '<strong>This option is deprecated. Please use section or row stretching options in order to create full width pages and set this option to "no, thanks!".</strong>',
                    'type' => 'select',
                    'std' => 'off',
                    'choices' => array(
                        array(
                            'label' => 'yes, please!',
                            'value' => 'on'
                        ),
                        array(
                            'label' => 'no, thanks!',
                            'value' => 'off'
                        )
                    ),
                    'pages' => $post_type_support_2,
                ),
                array(
                    'id' => 'ut_page_padding_top',
                    'metapanel' => 'ut-page-settings',
                    'label' => 'Page Padding Top',
                    'desc' => '<strong>(optional)</strong> -  include "px" in your string. e.g. 80px.',
                    'type' => 'text',
                    'pages' => $post_type_support_2,
                ),
                array(
                    'id' => 'ut_page_padding_bottom',
                    'metapanel' => 'ut-page-settings',
                    'label' => 'Page Padding Bottom',
                    'desc' => '<strong>(optional)</strong> -  include "px" in your string. e.g. 40px.',
                    'type' => 'text',
                    'pages' => $post_type_support_2,
                ),

                /* Site Frame Settings */
                array(
                    'id' => 'ut_page_site_border_headline',
                    'metapanel' => 'ut-site-frame-section',
                    'label' => 'Site Frame',
                    'type' => 'panel_headline',
                    'pages' => $post_type_support_1,
                ),

                array(
                    'id' => 'ut_page_site_border',
                    'metapanel' => 'ut-site-frame-section',
                    'label' => 'Display Site Frame?',
                    'desc' => 'A frame which embeds your entire site.',
                    'type' => 'select',
                    'std' => 'global',
                    'choices' => array(
                        array(
                            'label' => 'Default (Theme Options)',
                            'value' => 'global'
                        ),
                        array(
                            'label' => 'yes, please!',
                            'value' => 'show'
                        ),
                        array(
                            'label' => 'no, thanks!',
                            'value' => 'hide'
                        )
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_site_border_size',
                    'metapanel' => 'ut-site-frame-section',
                    'label' => 'Site Frame Size',
                    'desc' => 'The Site Frame will not display on Tablets or Mobiles.',
                    'type' => 'select',
                    'std' => '40',
                    'choices' => array(
                        array(
                            'value' => '20',
                            'label' => 'Tiny (20px)'
                        ),
                        array(
                            'value' => '40',
                            'label' => 'Extra Small (40px)'
                        ),
                        array(
                            'value' => '60',
                            'label' => 'Small (60px)'
                        ),
                        array(
                            'value' => '80',
                            'label' => 'Medium (80px)'
                        ),
                        array(
                            'value' => '100',
                            'label' => 'Large (100px)'
                        ),
                        array(
                            'value' => '120',
                            'label' => 'Extra Large (120px)'
                        )
                    ),
                    'required' => array(
                        'ut_page_site_border' => 'show'
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id' => 'ut_page_site_border_status',
                    'metapanel' => 'ut-site-frame-section',
                    'label' => 'Frame Settings',
                    'desc' => 'You can optionally deactivate parts of the frame for design purposes.',
                    'type' => 'frame',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_site_border' => 'show'
                    ),
                ),

                array(
                    'id' => 'ut_page_site_border_color',
                    'metapanel' => 'ut-site-frame-section',
                    'label' => 'Site Frame Color',
                    'type' => 'colorpicker',
                    'desc' => '<strong>(optional)</strong>',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_site_border' => 'show'
                    ),
                ),
                
                array(
                    'id' => 'ut_site_top_header_flush',
                    'metapanel' => 'ut-site-frame-section',
                    'label' => 'Activate Top Header Flush?',
                    'desc' => 'Only applies of Site Frame is active and Top Header Width has been set to fullwidth. This option will remove the gap between top header elements and siteframe so that they directly stick together.',
                    'type' => 'select',
                    'std' => 'no',
                    'choices' => array(
                        array(
                            'value' => 'yes',
                            'label' => 'yes, please!'
                        ),
                        array(
                            'value' => 'no',
                            'label' => 'no, thanks!'
                        )
                    ),
                    'required' => array(
                        'ut_page_site_border' => 'show'
                    ),
                    'pages' => $post_type_support_2,

                ),
                
                array(
                    'id' => 'ut_site_navigation_flush',
                    'metapanel' => 'ut-site-frame-section',
                    'label' => 'Activate Header Flush?',
                    'desc' => 'Only applies of Page Border is active and Header Width has been set to fullwidth.',
                    'type' => 'select',
                    'choices' => array(
                        array(
                            'value' => 'no',
                            'label' => 'no, thanks!'
                        ),
                        array(
                            'value' => 'yes',
                            'label' => 'Flush Logo and Navigation'
                        ),
                        array(
                            'value' => 'logo_only',
                            'label' => 'Flush Logo Only'
                        ),                        
                    ),                   
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id' => 'ut_site_logo_responsive_flush',
                    'metapanel' => 'ut-site-frame-section',
                    'label' => 'Activate Logo Flush on Mobiles?',
                    'desc' => 'Activated the Logo will be flushed on Tablets and Mobiles.',
                    'type' => 'select',
                    'std' => 'no',
                    'choices' => array(
                        array(
                            'value' => 'yes',
                            'label' => 'yes, please!'
                        ),
                        array(
                            'value' => 'no',
                            'label' => 'no, thanks!'
                        )
                    ),
                    'required' => array(
                        'ut_site_navigation_flush' => 'yes|logo_only'
                    ),
                    'pages' => $post_type_support_2,
                ),                            
                
                // Footer
                array(
                    'id' => 'ut_page_footer_area_headline',
                    'metapanel' => 'ut-footer-section',
                    'label' => 'Footer Area',
                    'type' => 'panel_headline',
                    'pages' => $post_type_support_1,
                ),

                array(
                    'id' => 'ut_page_footerarea',
                    'metapanel' => 'ut-footer-section',
                    'label' => 'Show Footer Area?',
                    'desc' => 'You can optionally hide the footer widget area on this particular page.',
                    'type' => 'select',
                    'std' => 'global',
                    'choices' => array(
                        array(
                            'value' => 'global',
                            'label' => 'Default (Theme Options)'
                        ),
                        array(
                            'label' => 'yes, please!',
                            'value' => 'on'
                        ),
                        array(
                            'label' => 'no, thanks!',
                            'value' => 'off'
                        )
                    ),
                    'pages' => $post_type_support_2,
                ),
            
                array(
                    'id' => 'ut_page_footerarea_width',
                    'metapanel' => 'ut-footer-section',
                    'label' => 'Make Footer Area Full Width?',
                    'desc' => 'It handles centering the content within the footer. Centered content has a max width of 1200px and fullwidth content 100%.',
                    'type' => 'select',
                    'std' => 'global',
                    'choices' => array(
                        array(
                            'value' => 'global',
                            'label' => 'Default (Theme Options)'
                        ),
                        array(
                            'label' => 'yes, please!',
                            'value' => 'on'
                        ),
                        array(
                            'label' => 'no, thanks!',
                            'value' => 'off'
                        )
                    ),
                    'pages' => $post_type_support_2,
                ),    
            

                array(
                    'id' => 'ut_page_footer_skin',
                    'metapanel' => 'ut-footer-section',
                    'label' => 'Footer Color Skin',
                    'desc' => 'Select your desired footer color skin.',
                    'type' => 'select',
                    'std' => 'global',
                    'choices' => array(
                        array(
                            'value' => 'global',
                            'label' => 'Default (Theme Options)'
                        ),
                        array(
                            'value' => 'ut-footer-dark',
                            'label' => 'Dark'
                        ),
                        array(
                            'value' => 'ut-footer-light',
                            'label' => 'Light'
                        ),
                    ),
                    'pages' => $post_type_support_2,
                ),

                /* Sub Footer */
                array(
                    'id' => 'ut_page_subfooter_area_headline',
                    'metapanel' => 'ut-sub-footer-section',
                    'label' => 'Subfooter Area',
                    'type' => 'panel_headline',
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id' => 'ut_page_subfooterarea',
                    'metapanel' => 'ut-sub-footer-section',
                    'label' => 'Show Subfooter Area?',
                    'desc' => 'You can optionally hide the subfooter area on this particular page.',
                    'type' => 'select',
                    'std' => 'global',
                    'choices' => array(
                        array(
                            'value' => 'global',
                            'label' => 'Default (Theme Options)'
                        ),
                        array(
                            'label' => 'yes, please!',
                            'value' => 'on'
                        ),
                        array(
                            'label' => 'no, thanks!',
                            'value' => 'off'
                        )
                    ),
                    'pages' => $post_type_support_2,
                ),
            
                array(
                    'id' => 'ut_page_subfooter_border_top',
                    'metapanel' => 'ut-sub-footer-section',
                    'label' => 'Hide Subfooter Border Top?',
                    'desc' => 'You can optionally define a border top color inside the Theme Options Panel. If you like to hide this global border, please use this option.',
                    'type' => 'select',
                    'std' => 'off',
                    'choices' => array(
                        array(
                            'label' => 'yes, please!',
                            'value' => 'on'
                        ),
                        array(
                            'label' => 'no, thanks!',
                            'value' => 'off'
                        )
                    ),
                    'pages' => $post_type_support_2,
                ),


                /**
                 * Page Accent Color Settings
                 */

                array(
                    'id' => 'ut_color_accent_color_headline',
                    'metapanel' => 'ut-page-color-settings',
                    'label' => 'Page Accent Color',
                    'type' => 'panel_headline',
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_accent_color',
                    'metapanel' => 'ut-page-color-settings',
                    'label' => 'Page Accent Color',
                    'desc' => 'This option lets you overwrite the default theme accent color and all occurrences of the accentcolor. This is a very expensive option in terms of site speed and should be used with caution.',
                    'type' => 'colorpicker',
                    'pages' => $post_type_support_2,
                ),

                /** 
                 * Color Settings 
                 */

                array(
                    'id' => 'ut_color_skin_headline',
                    'metapanel' => 'ut-color-settings',
                    'label' => 'Color Skin Settings',
                    'type' => 'panel_headline',
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_color_skin_headline_info',
                    'metapanel' => 'ut-color-settings',
                    'label' => 'Global Hero Caption',
                    'desc' => 'These color settings are deprecated since 4.0 and are only kept for reference. We highly recommend using Visual Composer module settings instead.',
                    'type' => 'section_headline_info',
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_show_color_options',
                    'metapanel' => 'ut-color-settings',
                    'label' => 'Color Settings',
                    'type' => 'select',
                    'std' => 'hide',
                    'desc' => 'These color settings are deprecated since 4.0 and are only kept for reference. We highly recommend using Visual Composer module settings instead.',
                    'choices' => array(
                        array(
                            'label' => 'Show Deprecated Options',
                            'value' => 'show'
                        ),
                        array(
                            'label' => 'Hide Deprecated Options',
                            'value' => 'hide'
                        ),
                    ),
                    'pages' => $post_type_support_2,

                ),

                array(
                    'id' => 'ut_section_skin',
                    'metapanel' => 'ut-color-settings',
                    'label' => 'Color Skin',
                    'type' => 'select',
                    'std' => 'global',
                    'desc' => 'If you are planing to use bright background images or bright background colors use the dark skin and the other way around. If these skins do not match your requirements, define your own colors beneath or add your own class inside the class field at the very bottom of this option set.',
                    'choices' => array(
                        array(
                            'label' => 'Dark',
                            'value' => 'dark'
                        ),
                        array(
                            'label' => 'Light',
                            'value' => 'light'
                        ),
                        array(
                            'label' => 'Global Colors',
                            'value' => 'global'
                        )
                    ),
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_show_color_options' => 'show'
                    )

                ),

                array(
                    'id' => 'ut_color_settings_headline',
                    'metapanel' => 'ut-color-settings',
                    'label' => 'Header and Lead Color Settings',
                    'type' => 'section_headline',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_show_color_options' => 'show'
                    )
                ),

                array(
                    'id' => 'ut_section_title_color',
                    'metapanel' => 'ut-color-settings',
                    'label' => 'Header Color',
                    'type' => 'colorpicker',
                    'desc' => '<strong>(optional)</strong>',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_show_color_options' => 'show'
                    )
                ),

                array(
                    'id' => 'ut_section_title_glow',
                    'metapanel' => 'ut-color-settings',
                    'label' => 'Activate Header Title Glow?',
                    'desc' => 'Note: Best result for transparent backgrounds.',
                    'type' => 'select',
                    'choices' => array(
                        array(
                            'label' => 'yes, please!',
                            'value' => 'on'
                        ),
                        array(
                            'label' => 'no, thanks!',
                            'value' => 'off'
                        )
                    ),
                    'std' => 'off',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_show_color_options' => 'show'
                    )
                ),

                array(
                    'id' => 'ut_section_title_glow_color',
                    'metapanel' => 'ut-color-settings',
                    'label' => 'Header Glow Color',
                    'type' => 'colorpicker',
                    'desc' => '<strong>(optional)</strong>',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_show_color_options' => 'show',
                        'ut_section_title_glow' => 'on'
                    )
                ),

                array(
                    'id' => 'ut_section_title_glow_shadow_color',
                    'metapanel' => 'ut-color-settings',
                    'label' => 'Header Glow Text Shadow Color',
                    'type' => 'colorpicker',
                    'desc' => '<strong>(optional)</strong>',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_show_color_options' => 'show',
                        'ut_section_title_glow' => 'on'
                    )
                ),

                array(
                    'id' => 'ut_section_slogan_color',
                    'metapanel' => 'ut-color-settings',
                    'label' => 'Header Lead Color',
                    'type' => 'colorpicker',
                    'desc' => '<strong>(optional)</strong>',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_show_color_options' => 'show'
                    )
                ),

                array(
                    'id' => 'ut_content_colors_headline',
                    'metapanel' => 'ut-color-settings',
                    'label' => 'Color Settings',
                    'type' => 'section_headline',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_show_color_options' => 'show'
                    )
                ),

                array(
                    'id' => 'ut_section_background_color',
                    'metapanel' => 'ut-color-settings',
                    'label' => 'Background Color',
                    'type' => 'colorpicker',
                    'desc' => 'Keep in mind that if you are planing to use a parallax background ( sections only ), this color is not visible anymore.',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_show_color_options' => 'show'
                    )
                ),

                array(
                    'id' => 'ut_section_heading_color',
                    'metapanel' => 'ut-color-settings',
                    'label' => 'Content Headlines Color',
                    'type' => 'colorpicker',
                    'desc' => '<strong>(optional)</strong>. Affects all headlines from H1 to H6.',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_show_color_options' => 'show'
                    )
                ),

                array(
                    'id' => 'ut_section_text_color',
                    'metapanel' => 'ut-color-settings',
                    'label' => 'Content Text Color',
                    'type' => 'colorpicker',
                    'desc' => '<strong>(optional)</strong>',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_show_color_options' => 'show'
                    )
                ),

                array(
                    'id' => 'ut_section_class',
                    'metapanel' => 'ut-color-settings',
                    'label' => 'Optional Class',
                    'desc' => 'Optional CSS Class. Simply enter the class name without a dot in front, this class will be added straight to the DIV named #primary. We recommend to place the class definition itself inside the Theme Options Panel under "Advanced" > "Custom CSS".',
                    'type' => 'text',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_show_color_options' => 'show'
                    )
                ),
                    

                /** 
                 * Contact Settings 
                 */

                array(
                    'id' => 'ut_contact_section',
                    'metapanel' => 'ut-contact-section',
                    'label' => 'Contact Section Settings',
                    'type' => 'panel_headline',
                    'pages' => $post_type_support_1,
                ),

                array(
                    'id' => 'ut_activate_csection',
                    'metapanel' => 'ut-contact-section',
                    'label' => 'Display Contact Section?',
                    'desc' => 'Use this option to overwrite the global setting.',
                    'type' => 'select',
                    'std' => 'global',
                    'choices' => array(
                        array(
                            'label' => 'Default (Theme Options)',
                            'value' => 'global'
                        ),
                        array(
                            'label' => 'yes, please!',
                            'value' => 'on'
                        ),
                        array(
                            'label' => 'no, thanks!',
                            'value' => 'off'
                        )
                    ),
                    'pages' => $post_type_support_1,

                ),
				
				array(
                    'id' => 'ut_csection_content_block',
                    'metapanel' => 'ut-contact-section',
                    'label' => 'Activate Content Block for Contact Section?',
                    'desc' => 'We recently introduced Content Blocks to our theme core. By using this option, you can now use content blocks in contact sections.',
                    'type' => 'select',
                    'std' => 'off',
                    'choices' => array(
                        array(
                            'value' => 'off',
                            'label' => 'no, thanks!'
                        ),
                        array(
                            'value' => 'on',
                            'label' => 'yes, please!'
                        ),
                    ),
                    'required' => array(
                        'ut_activate_csection' => 'on',
                    ),
                    'pages' => $post_type_support_1,
                ),

                array(
                    'id' => 'ut_csection_content_block_id',
                    'metapanel' => 'ut-contact-section',
                    'label' => 'Content Block Settings',
                    'desc' => 'Content Blocks can be used for different purposes. These blocks are managed centralized and can be deployed to different pages or parts of your website such as the Hero Area. We will use these content blocks as a core feature from now. You can manage your content blocks in your Dashboard > Content Blocks.',
                    'type' => 'custom_post_type_select',
                    'post_type' => 'ut-content-block',
                    'required' => array(
                        'ut_activate_csection' => 'on',
                        'ut_csection_content_block' => 'on',
                    ),
                    'pages' => $post_type_support_1,
                ),
				
                array(
                    'id' => 'ut_csection_background_image',
                    'metapanel' => 'ut-contact-section',
                    'label' => 'Background Image',
                    'desc' => 'You can individually change the Background Image per page.',
                    'type' => 'background',
                    'pages' => $post_type_support_1,
                    'required' => array(
                        'ut_activate_csection' => 'on'
                    ),
                ),

                array(
                    'id' => 'ut_csection_overlay',
                    'metapanel' => 'ut-contact-section',
                    'label' => 'Overlay',
                    'desc' => '<strong>(optional)</strong> A smooth overlay with optional design patterns.',
                    'type' => 'select',
                    'choices' => array(
                        array(
                            'value' => 'on',
                            'label' => 'On'
                        ),
                        array(
                            'value' => 'off',
                            'label' => 'Off'
                        )
                    ),
                    'pages' => $post_type_support_1,
                    'required' => array(
                        'ut_activate_csection' => 'on'
                    ),
                ),

                array(
                    'id' => 'ut_csection_overlay_color',
                    'metapanel' => 'ut-contact-section',
                    'label' => 'Overlay Color',
                    'desc' => '<strong>(optional)</strong>',
                    'type' => 'colorpicker',
                    'pages' => $post_type_support_1,
                    'required' => array(
                        'ut_csection_overlay' => 'on',
                        'ut_activate_csection' => 'on'
                    ),

                ),

                array(
                    'id' => 'ut_csection_overlay_opacity',
                    'metapanel' => 'ut-contact-section',
                    'label' => 'Overlay Color Opacity',
                    'desc' => '<strong>(optional)</strong> - default 0.8',
                    'std' => '0.8',
                    'type' => 'numeric-slider',
                    'min_max_step' => '0,1,0.1',
                    'pages' => $post_type_support_1,
                    'required' => array(
                        'ut_csection_overlay' => 'on',
                        'ut_activate_csection' => 'on'
                    ),
                ),

                array(
                    'id' => 'ut_show_scroll_up_button_headline',
                    'metapanel' => 'ut-contact-section',
                    'label' => 'Scroll Top',
                    'type' => 'section_headline',
                    'pages' => $post_type_support_1,
                ),

                array(
                    'id' => 'ut_show_scroll_up_button',
                    'metapanel' => 'ut-contact-section',
                    'label' => 'Scroll To Top Button',
                    'desc' => 'This "Back to top" link allows users to smoothly scroll back to the top of the page. Its a little detail which enhances navigation experience on website with long pages.',
                    'std' => 'global',
                    'type' => 'select',
                    'choices' => array(
                        array(
                            'label' => 'Default (Theme Options)',
                            'value' => 'global'
                        ),
                        array(
                            'value' => 'on',
                            'label' => 'yes, please!'
                        ),
                        array(
                            'value' => 'off',
                            'label' => 'no, thanks!'
                        )

                    ),
                    'pages' => $post_type_support_1,
                ),

                /**
                 * Top Header 
                 */ 
                
                array(
                    'id' => 'ut_page_top_header_headline',
                    'metapanel' => 'ut-top-header-settings',
                    'label' => 'Top Header Settings',
                    'type' => 'panel_headline',
                    'pages' => $post_type_support_2,
                ),
                
				array(
                    'id' => 'ut_page_top_header',
                    'metapanel' => 'ut-top-header-settings',
                    'label' => 'Show Top Header?',
                    'desc' => 'The Top Header will be placed above header and navigation and contains additional elements like phone number, email address and social profile links. You can manage these fields inside the theme options panel.',
                    'type' => 'select',
                    'std' => 'global',
                    'choices' => array(
                        array(
                            'label' => 'Default (Theme Options)',
                            'value' => 'global'
                        ),
                        array(
                            'label' => 'yes, please!',
                            'value' => 'show'
                        ),
                        array(
                            'label' => 'no, thanks!',
                            'value' => 'hide'
                        )
                    ),
                    'pages' => $post_type_support_2,
                ),
				
                array(
                    'id' => 'ut_top_header_width',
                    'metapanel' => 'ut-top-header-settings',
                    'label' => 'Width',
                    'desc' => 'It handles centering the content within the top header. Decide if the content gets stretched to fullwidth or displays centered.',
                    'type' => 'select',
                    'global' => 'on',
                    'choices' => array(
                        array(
                            'value' => 'header',
                            'label' => 'Same as Header'
                        ),
                        array(
                            'value' => 'centered',
                            'label' => 'Grid Based'
                        ),
                        array(
                            'value' => 'fullwidth',
                            'label' => 'Fullwidth'
                        )
                    ),
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_top_header'   => 'show|global'
                    ),

                ),

                array(
                    'id' => 'ut_top_header_font_size',
                    'metapanel' => 'ut-top-header-settings',
                    'label' => 'Font Size',
                    'desc' => 'Select desired font size preset. Does not affect social icons.',
                    'type' => 'select',
                    'global' => 'on',
                    'choices' => array(
                        array(
                            'value' => 'small',
                            'label' => 'small'
                        ),
                        array(
                            'value' => 'big',
                            'label' => 'big'
                        )
                    ),
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_top_header'   => 'show|global'
                    ),
                ),

                array(
                    'id' => 'ut_top_header_reverse',
                    'metapanel' => 'ut-top-header-settings',
                    'label' => 'Reverse Content Areas',
                    'desc' => 'Activating this option will swap the content areas inside your top header.',
                    'type' => 'select',
                    'global' => 'on',
                    'choices' => array(
                        array(
                            'value' => 'off',
                            'label' => 'no, thanks!'
                        ),
                        array(
                            'value' => 'on',
                            'label' => 'yes, please!'
                        )
                    ),
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_top_header'   => 'show|global'
                    ),
                ),

                array(
                    'id' => 'ut_top_header_border_separator',
                    'metapanel' => 'ut-top-header-settings',
                    'label' => 'Activate Border Separator?',
                    'desc' => 'Activating this option allows you to place a border separator between top header items.',
                    'type' => 'select',
                    'global' => 'on',
                    'choices' => array(
                        array(
                            'value' => 'off',
                            'label' => 'no, thanks!'
                        ),
                        array(
                            'value' => 'on',
                            'label' => 'yes, please!'
                        )
                    ),
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_top_header'   => 'show|global'
                    ),
                ),

                array(
                    'id' => 'ut_top_header_border_separator_style',
                    'metapanel' => 'ut-top-header-settings',
                    'label' => 'Border Style',
                    'desc' => 'The border properties allow you to specify the style, width, and color.',
                    'type' => 'border',
                    'markup' => '1_1',
                    'global' => 'on',
                    'required' => array(
                        'ut_top_header_border_separator' => 'on',
                    ),
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_top_header'   => 'show|global'
                    ),
                ),

                array(
                    'id' => 'ut_top_header_border_bottom',
                    'metapanel' => 'ut-top-header-settings',
                    'label' => 'Activate Border Bottom?',
                    'desc' => 'Activating this option allows you to place a decoration at the bottom of the top header.',
                    'type' => 'select',
                    'global' => 'on',
                    'choices' => array(
                        array(
                            'value' => 'off',
                            'label' => 'no, thanks!'
                        ),
                        array(
                            'value' => 'on',
                            'label' => 'yes, please!'
                        )
                    ),
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_top_header'   => 'show|global'
                    ),

                ),

                array(
                    'id' => 'ut_top_header_border_bottom_style',
                    'metapanel' => 'ut-top-header-settings',
                    'label' => 'Border Style',
                    'desc' => 'The border properties allow you to specify the style, width, and color.',
                    'type' => 'border',
                    'markup' => '1_1',
                    'global' => 'on',
                    'required' => array(
                        'ut_top_header_border_bottom' => 'on',
                        'ut_page_top_header'   => 'show|global'
                    ),
                    'pages' => $post_type_support_2,
                ),

                // Left Top Header Area
                array(
                    'id' => 'ut_top_header_left_settings_headline',
                    'metapanel' => 'ut-top-header-settings',
                    'label' => 'Left Top Header Area',
                    'desc' => 'Left Top Header Area',
                    'type' => 'section_headline',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_top_header'   => 'show|global'
                    ),
                ),			

                array(
                    'id' => 'ut_top_header_left_content_type',
                    'metapanel' => 'ut-top-header-settings',
                    'label' => 'Content Module',
                    'desc' => 'Select your desired content module.',
                    'type' => 'select',
                    'global' => 'on',
                    'choices' => array(

                        array(
                            'value' => 'company_social',
                            'label' => 'Company Social'
                        ),

                        array(
                            'value' => 'company_contact',
                            'label' => 'Company Phone and Email'
                        ),

                        array(
                            'value' => 'custom_fields',
                            'label' => 'Custom Fields'
                        ),

                        array(
                            'value' => 'custom_menu',
                            'label' => 'Top Header Menu'
                        ),

                        array(
                            'value' => 'toolbar',
                            'label' => 'Cart / Account / Search / Language Switch'
                        ),

                        array(
                            'value' => 'top_header_no_content',
                            'label' => 'Hide Custom Content'
                        )

                    ),
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_top_header'   => 'show|global'
                    ),

                ),

                array(
                    'id' => 'ut_top_header_left_menu',
                    'metapanel' => 'ut-top-header-settings',
                    'label' => 'Select Menu',
                    'desc' => sprintf( 'In order to manage this menu please visit: Appearance > %s and create a new menu. Menus which are already assigned to a location do not appear on this option. Menus in this area can only display 2 navigation level. Keep in mind, that you can also create similar navigations with the custom fields module. An advantage of the custom field module is, that you can use icons. But custom fields can only display with a single item level and has no dropdowns.', '<a target="_blank" href="' . get_admin_url() . 'nav-menus.php">Menus</a>'),
                    'type' => 'nav_menus',
                    'global' => 'on',
                    'required' => array(
                        'ut_page_top_header' => 'show|global',
                        'ut_top_header_left_content_type' => 'custom_menu',
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_top_header_left_extra_fields',
                    'metapanel' => 'ut-top-header-settings',
                    'label' => 'Custom Fields',
                    'desc' => 'Keep in mind, depending on the selected header layout the horizontal space is limited. You cannot add unlimited fields. Therefore on tablet and mobiles custom fields are reduced.',
                    'type' => 'list-item',
                    'list_title' => false,
                    'markup' => '1_1',
                    'global' => 'on',
                    'settings' => array(

                        array(
                            'id' => 'title',
                            'label' => 'Text',
                            'desc' => 'For example company phone number, email or whatever you need. Leaving this field empty will hide the element.',
                            'class' => 'option-tree-setting-title',
                            'type' => 'text',
                        ),

                        array(
                            'id' => 'icon',
                            'label' => 'Icon',
                            'desc' => 'Select a nice icon, it will be placed right in front of your custom field text.',
                            'type' => 'iconpicker',
                        ),

                        array(
                            'id' => 'link',
                            'label' => 'Link',
                            'desc' => 'You can optionally link your custom field.',
                            'type' => 'link',
                        )

                    ),
                    'required' => array(
                        'ut_page_top_header' => 'show|global',
                        'ut_top_header_left_content_type' => 'custom_fields',
                    ),
                    'pages' => $post_type_support_2,

                ),

                array(
                    'id' => 'ut_top_header_left_toolbar',
                    'metapanel' => 'ut-top-header-settings',
                    'label' => 'Toolbar',
                    'desc' => 'A toolbar with cart, account, language switch, overlay menu and search icon. You can also drag and drop the items to change their order. Woocommerce Plugin is required for account and cart icon feature. WPML is required for the language switch feature.',
                    'type' => 'header_toolbar',
                    'global' => 'on',
                    'required' => array(
                        'ut_page_top_header' => 'show|global',
                        'ut_top_header_left_content_type' => 'toolbar'
                    ),
                    'pages' => $post_type_support_2,
                ),

                // Right Top Header Area
                array(
                    'id' => 'ut_top_header_right_settings_headline',
                    'metapanel' => 'ut-top-header-settings',
                    'label' => 'Right Top Header Area',
                    'desc' => 'Right Top Header Area',
                    'type' => 'section_headline',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_top_header'   => 'show|global'
                    ),
                ),

                array(
                    'id' => 'ut_top_header_right_content_type',
                    'metapanel' => 'ut-top-header-settings',
                    'label' => 'Content Module',
                    'desc' => 'Select your desired content module.',
                    'type' => 'select',
                    'global' => 'on',
                    'choices' => array(

                        array(
                            'value' => 'company_social',
                            'label' => 'Company Social'
                        ),

                        array(
                            'value' => 'company_contact',
                            'label' => 'Company Phone and Email'
                        ),

                        array(
                            'value' => 'custom_fields',
                            'label' => 'Custom Fields'
                        ),

                        array(
                            'value' => 'custom_menu',
                            'label' => 'Top Header Menu'
                        ),

                        array(
                            'value' => 'toolbar',
                            'label' => 'Cart / Account / Search / Language Switch'
                        ),

                        array(
                            'value' => 'top_header_no_content',
                            'label' => 'Hide Custom Content'
                        )

                    ),
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_top_header'   => 'show|global'
                    ),

                ),

                array(
                    'id' => 'ut_top_header_right_menu',
                    'metapanel' => 'ut-top-header-settings',
                    'label' => 'Select Menu',
                    'desc' => sprintf( 'In order to manage this menu please visit: Appearance > %s and create a new menu. Menus which are already assigned to a location do not appear on this option. Menus in this area can only display 2 navigation level. Keep in mind, that you can also create similar navigations with the custom fields module. An advantage of the custom field module is, that you can use icons. But custom fields can only display with a single item level and has no dropdowns.', '<a target="_blank" href="' . get_admin_url() . 'nav-menus.php">Menus</a>'),
                    'type' => 'nav_menus',
                    'global' => 'on',
                    'required' => array(
                        'ut_page_top_header'   => 'show|global',
                        'ut_top_header_right_content_type' => 'custom_menu',
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_top_header_right_extra_fields',
                    'metapanel' => 'ut-top-header-settings',
                    'label' => 'Custom Fields',
                    'desc' => 'Keep in mind, depending on the selected header layout the horizontal space is limited. You cannot add unlimited fields. Therefore on tablet and mobiles custom fields are reduced.',
                    'type' => 'list-item',
                    'list_title' => false,
                    'markup' => '1_1',
                    'global' => 'on',
                    'settings' => array(

                        array(
                            'id' => 'title',
                            'label' => 'Text',
                            'desc' => 'For example company phone number, email or whatever you need. Leaving this field empty will hide the element.',
                            'class' => 'option-tree-setting-title',
                            'type' => 'text',
                        ),

                        array(
                            'id' => 'icon',
                            'label' => 'Icon',
                            'desc' => 'Select a nice icon, it will be placed right in front of your custom field text.',
                            'type' => 'iconpicker',
                        ),

                        array(
                            'id' => 'link',
                            'label' => 'Link',
                            'desc' => 'You can optionally link your custom field.',
                            'type' => 'link',
                        )

                    ),
                    'required' => array(
                        'ut_page_top_header'   => 'show|global',
                        'ut_top_header_right_content_type' => 'custom_fields',
                    ),
                    'pages' => $post_type_support_2,

                ),

                array(
                    'id' => 'ut_top_header_right_toolbar',
                    'metapanel' => 'ut-top-header-settings',
                    'label' => 'Toolbar',
                    'desc' => 'A toolbar with cart, account, language switch, overlay menu and search icon. You can also drag and drop the items to change their order. Woocommerce Plugin is required for account and cart icon feature. WPML is required for the language switch feature.',
                    'type' => 'header_toolbar',
                    'global' => 'on',
                    'required' => array(
                        'ut_page_top_header'   => 'show|global',
                        'ut_top_header_right_content_type' => 'toolbar'
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                /**
                 * Top Header Colors
                 */ 
                
                array(
                    'id' => 'ut_page_top_header_color_headline',
                    'metapanel' => 'ut-top-header-color-settings',
                    'label' => 'Top Header Color Settings',
                    'type' => 'panel_headline',
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id' => 'ut_top_header_background_color',
                    'metapanel' => 'ut-top-header-color-settings',
                    'label' => 'Background Color',
                    'desc' => 'Color for entire top header, left and right area.',
                    'type' => 'gradient_colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'prefix' => 'ut_',
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_top_header_text_color',
                    'metapanel' => 'ut-top-header-color-settings',
                    'label' => 'Text Color',
                    'desc' => 'Color for regular Text.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'prefix' => 'ut_',
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id' => 'ut_top_header_icon_color',
                    'metapanel' => 'ut-top-header-color-settings',
                    'label' => 'Icon Color',
                    'desc' => 'Color for Icons.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'prefix' => 'ut_',
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id' => 'ut_top_header_link_color',
                    'metapanel' => 'ut-top-header-color-settings',
                    'label' => 'Link Color',
                    'desc' => 'Color for Links.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'prefix' => 'ut_',
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_top_header_link_color_hover',
                    'metapanel' => 'ut-top-header-color-settings',
                    'label' => 'Link Color Hover',
                    'desc' => 'Color for Links on hover.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'prefix' => 'ut_',
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_top_header_social_icon_color',
                    'metapanel' => 'ut-top-header-color-settings',
                    'label' => 'Social Icon Color',
                    'desc' => 'Color for Social Icons.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'prefix' => 'ut_',
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_top_header_social_icon_color_hover',
                    'metapanel' => 'ut-top-header-color-settings',
                    'label' => 'Social Icon Color Hover',
                    'desc' => 'Color for Social Icons on hover.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'prefix' => 'ut_',
                    'pages' => $post_type_support_2,
                ),
                
                
                array(
                    'id' => 'ut_top_header_search_icon_color',
                    'metapanel' => 'ut-top-header-color-settings',
                    'label' => 'Search Icon Color',
                    'desc' => 'Color for Search Icon.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'prefix' => 'ut_',
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_top_header_search_icon_color_hover',
                    'metapanel' => 'ut-top-header-color-settings',
                    'label' => 'Search Icon Color Hover',
                    'desc' => 'Color for Search Icons on hover.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'prefix' => 'ut_',
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id' => 'ut_top_header_submenu_headline',
                    'metapanel' => 'ut-top-header-color-settings',
                    'label' => 'Submenus',
                    'desc' => 'Submenus',
                    'type' => 'section_headline',
                    'global' => 'on',
                    'prefix' => 'ut_',
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id' => 'ut_top_header_submenu_border',
                    'metapanel' => 'ut-top-header-color-settings',
                    'label' => 'Activate Border?',
                    'desc' => 'Activating this option allows you to place a decoration at the top of the Submenu.',
                    'type' => 'select',
                    'global' => 'on',
                    'prefix' => 'ut_',
                    'choices' => array(
                        array(
                            'value' => 'off',
                            'label' => 'no, thanks!'
                        ),
                        array(
                            'value' => 'on',
                            'label' => 'yes, please!'
                        )
                    ),
                    'pages' => $post_type_support_2,

                ),    
                
                array(
                    'id' => 'ut_top_header_submenu_border_top_width',
                    'metapanel' => 'ut-top-header-color-settings',
                    'label' => 'Border Top Width',
                    'desc' => 'Drag the handle to set the border width value.',
                    'type' => 'numeric-slider',
                    'global' => 'on',
                    'prefix' => 'ut_',
                    'min_max_step' => '0,10,1',
                    'required' => array(
                        'ut_top_header_submenu_border' => 'on'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_top_header_submenu_border_top_color',
                    'metapanel' => 'ut-top-header-color-settings',
                    'label' => 'Border Top Color',
                    'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'prefix' => 'ut_',
                    'required' => array(
                        'ut_top_header_submenu_border' => 'on'
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id' => 'ut_top_header_submenu_link_color',
                    'metapanel' => 'ut-top-header-color-settings',
                    'label' => 'Submenus Link Color',
                    'desc' => 'Default Color is "Top Header Link Color".',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'prefix' => 'ut_',
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_top_header_submenu_link_color_hover',
                    'metapanel' => 'ut-top-header-color-settings',
                    'label' => 'Submenus Link Color Hover',
                    'desc' => 'Default Color is "Top Header Link Hover Color".',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'prefix' => 'ut_',
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_top_header_submenu_link_color_active',
                    'metapanel' => 'ut-top-header-color-settings',
                    'label' => 'Submenus Link Color Active',
                    'desc' => 'Default Color is "Theme Accent Color".',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'prefix' => 'ut_',
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id' => 'ut_top_header_submenu_background',
                    'metapanel' => 'ut-top-header-color-settings',
                    'label' => 'Submenus Background Color',
                    'desc' => 'Default Color is "Top Header Background Color".',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'prefix' => 'ut_',
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_top_header_shopping_cart_headline',
                    'metapanel' => 'ut-top-header-color-settings',
                    'label' => 'Woocommerce Mini Shopping Cart',
                    'desc' => 'Woocommerce Mini Shopping Cart',
                    'type' => 'section_headline',
                    'global' => 'on',
                    'prefix' => 'ut_',
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_top_header_shopping_cart_count_color',
                    'metapanel' => 'ut-top-header-color-settings',
                    'label' => 'Item Count Color',
                    'desc' => 'Default Color is white. The counter is located right next to the shopping cart icon.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'prefix' => 'ut_',
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_top_header_shopping_cart_count_background',
                    'metapanel' => 'ut-top-header-color-settings',
                    'label' => 'Item Count Background Color',
                    'desc' => 'Default Color is theme accent color. The counter is located right next to the shopping cart icon.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'prefix' => 'ut_',
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id' => 'ut_top_header_shopping_cart_item_delete_color',
                    'metapanel' => 'ut-top-header-color-settings',
                    'label' => 'Item Delete Color',
                    'desc' => 'Creates a separator between cart items.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'prefix' => 'ut_',
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_top_header_shopping_cart_item_delete_hover_color',
                    'metapanel' => 'ut-top-header-color-settings',
                    'label' => 'Item Delete Hover Color',
                    'desc' => 'Creates a separator between cart items.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'prefix' => 'ut_',
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id' => 'ut_top_header_shopping_cart_item_separator',
                    'metapanel' => 'ut-top-header-color-settings',
                    'label' => 'Item Separator',
                    'desc' => 'Creates a separator between cart items.',
                    'type' => 'border',
                    'markup' => '1_1',
                    'global' => 'on',
                    'prefix' => 'ut_',
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_top_header_shopping_cart_scrollbar',
                    'metapanel' => 'ut-top-header-color-settings',
                    'label' => 'Cart Scrollbar Color',
                    'desc' => 'If more than 3 items have been placed inside the cart, a scrollbar will automatically appear.',
                    'type' => 'colorpicker',
                    'global' => 'on',
                    'prefix' => 'ut_',
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_top_header_shopping_cart_summary_background',
                    'metapanel' => 'ut-top-header-color-settings',
                    'label' => 'Shopping Cart Summary Background Color',
                    'desc' => 'The Summary Area of the mini shopping cart contains the total number of items in your cart and the total price of all items. Additionally 2 Buttons are displaying allowing the user to view his cart on a single page or directly browse to the checkout page. Giving this area a background color will visually separate the summary from the cart items.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'prefix' => 'ut_',
                    'pages' => $post_type_support_2,
                ),            

                array(
                    'id' => 'ut_top_header_shopping_cart_item_total_count',
                    'metapanel' => 'ut-top-header-color-settings',
                    'label' => 'Total Item Count Color',
                    'desc' => 'This total count belongs to the summary area and is located right above the cart buttons. Default Color is top header text color.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'prefix' => 'ut_',
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_top_header_shopping_cart_item_total_price',
                    'metapanel' => 'ut-top-header-color-settings',
                    'label' => 'Total Price Color',
                    'desc' => 'This total price belongs to the summary area and is located right above the cart buttons. Default Color is top header text color.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'prefix' => 'ut_',
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_top_header_shopping_cart_view_cart_button',
                    'metapanel' => 'ut-top-header-color-settings',
                    'label' => 'View Cart Button',
                    'desc' => 'Design your cart button.',
                    'markup' => '1_1',
                    'type' => 'button_builder_vc',
                    'global' => 'on',
                    'prefix' => 'ut_',
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_top_header_shopping_cart_checkout_button',
                    'metapanel' => 'ut-top-header-color-settings',
                    'label' => 'Checkout Button',
                    'desc' => 'Design your checkout button.',
                    'markup' => '1_1',
                    'type' => 'button_builder_vc',
                    'global' => 'on',
                    'prefix' => 'ut_',
                    'pages' => $post_type_support_2,
                ),


                /*
                 * Overlay Navigation
                 */
                
                array(
                    'id' => 'ut_overlay_navigation_settings',
                    'metapanel' => 'ut-header-overlay-settings',
                    'label' => 'Overlay Navigation Settings',
                    'type' => 'panel_headline',
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id' => 'ut_overlay_navigation_settings_info',
                    'metapanel' => 'ut-header-overlay-settings',
                    'label' => 'Global Hero Caption',
                    'desc' => 'You can manage the visual appearance in "Theme Options" > "Header" > "Overlay Navigation"',
                    'type' => 'section_headline_info',
                    'pages' => $post_type_support_4,
                ),
                
                array(
                    'id' => 'ut_overlay_navigation',
                    'metapanel' => 'ut-header-overlay-settings',
                    'label' => 'Activate Overlay Navigation (only)?',
                    'desc' => 'A compact navigation covering your website on click. This navigation will replace the default navigation.',
                    'type' => 'select',
                    'std' => 'off',
                    'choices' => array(
                        array(
                            'label' => 'On',
                            'value' => 'on',
                        ),
                        array(
                            'label' => 'Off',
                            'value' => 'off',
                        )
                    ),
                    'required' => array(
                        'ut_header_layout' 	 => 'default',
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                /*
                 * Mobile Navigation
                 */
                
                array(
                    'id' => 'ut_mobile_navigation_settings',
                    'metapanel' => 'ut-header-mobile-settings',
                    'label' => 'Mobile Navigation Settings',
                    'type' => 'panel_headline',
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id' => 'ut_mobile_navigation_trigger_icon_type',
                    'metapanel' => 'ut-header-mobile-settings',
                    'label' => 'Icon Type',
                    'desc' => 'Select your desired mobile menu icon.',
                    'type' => 'select',
                    'global' => 'on',
                    'markup' => '1_1',
                    'choices' => array(
                        array(
                            'value' => 'custom',
                            'label' => 'Custom Icon'
                        ),
                        array(
                            'value' => 'hamburger',
                            'label' => 'Hamburger Icon (same as overlay icon)'
                        ),                    
                    ),
                    'pages' => $post_type_support_1
                ),

                array(
                    'id' => 'ut_mobile_navigation_trigger_icon',
                    'metapanel' => 'ut-header-mobile-settings',
                    'label' => 'Icon',
                    'desc' => 'Select your desired mobile menu icon.',
                    'type' => 'iconpicker',
                    'global' => 'on',
                    'markup' => '1_1',
                    'required' => array(
                        'ut_mobile_navigation_trigger_icon_type' => 'custom',
                    ),
                    'pages' => $post_type_support_1
                ),

                array(
                    'id' => 'ut_mobile_navigation_closed_settings',
                    'metapanel' => 'ut-header-mobile-settings',
                    'label' => 'Closed Mobile Navigation Colors',
                    'type' => 'sub_section_inline_headline',
                    'pages' => $post_type_support_1
                ),

                array(
                    'id' => 'ut_mobile_navigation_trigger_color',
                    'metapanel' => 'ut-header-mobile-settings',
                    'label' => 'Icon Color',
                    'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'pages' => $post_type_support_1
                ),

                array(
                    'id' => 'ut_mobile_navigation_trigger_alternate_color',
                    'metapanel' => 'ut-header-mobile-settings',
                    'label' => 'Icon Color for Secondary Skin',
                    'desc' => 'The alternate color will be used for headers with 2 different skin settings. This color will be part of the secondary skin, which is active when scrolling down or hero is deactivated.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'pages' => $post_type_support_1
                ),

                array(
                    'id' => 'ut_mobile_navigation_background_color_closed',
                    'metapanel' => 'ut-header-mobile-settings',
                    'label' => 'Background Color ( closed mobile nav )',
                    'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_header_layout' => 'side',
                    ),
                    'pages' => $post_type_support_1
                ),

                array(
                    'id' => 'ut_mobile_navigation_opened_settings',
                    'metapanel' => 'ut-header-mobile-settings',
                    'label' => 'Opened Mobile Navigation Colors',
                    'type' => 'sub_section_inline_headline',
                    'pages' => $post_type_support_1
                ),

                array(
                    'id' => 'ut_mobile_navigation_trigger_color_hover',
                    'metapanel' => 'ut-header-mobile-settings',
                    'label' => 'Icon Hover and Active Color',
                    'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'pages' => $post_type_support_1
                ),

                array(
                    'id' => 'ut_mobile_navigation_text_logo_color',
                    'metapanel' => 'ut-header-mobile-settings',
                    'label' => 'Text Logo Color',
                    'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'pages' => $post_type_support_1
                ),

                array(
                    'id' => 'ut_mobile_navigation_background_color',
                    'metapanel' => 'ut-header-mobile-settings',
                    'label' => 'Background Color',
                    'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                    'type' => 'gradient_colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'pages' => $post_type_support_1
                ),

                array(
                    'id' => 'ut_mobile_navigation_link_color',
                    'metapanel' => 'ut-header-mobile-settings',
                    'label' => 'Link Color',
                    'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'pages' => $post_type_support_1
                ),

                array(
                    'id' => 'ut_mobile_navigation_link_color_hover',
                    'metapanel' => 'ut-header-mobile-settings',
                    'label' => 'Link Hover Color',
                    'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'pages' => $post_type_support_1
                ),

                array(
                    'id' => 'ut_mobile_navigation_dot_color',
                    'metapanel' => 'ut-header-mobile-settings',
                    'label' => 'Dot Color',
                    'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'pages' => $post_type_support_1
                ),

                array(
                    'id' => 'ut_mobile_navigation_dot_color_hover',
                    'metapanel' => 'ut-header-mobile-settings',
                    'label' => 'Dot Hover Color',
                    'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'pages' => $post_type_support_1
                ),

                array(
                    'id' => 'ut_mobile_navigation_submenu_dot_color',
                    'metapanel' => 'ut-header-mobile-settings',
                    'label' => 'Submenu Dot Color',
                    'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'pages' => $post_type_support_1
                ),

                array(
                    'id' => 'ut_mobile_navigation_submenu_dot_color_hover',
                    'metapanel' => 'ut-header-mobile-settings',
                    'label' => 'Submenu Dot Hover Color',
                    'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'pages' => $post_type_support_1
                ),

                array(
                    'id' => 'ut_mobile_navigation_link_background_color',
                    'metapanel' => 'ut-header-mobile-settings',
                    'label' => 'Link Background Color',
                    'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'pages' => $post_type_support_1
                ),

                array(
                    'id' => 'ut_mobile_navigation_link_background_color_hover',
                    'metapanel' => 'ut-header-mobile-settings',
                    'label' => 'Link Background Hover Color',
                    'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'pages' => $post_type_support_1
                ),

                array(
                    'id' => 'ut_mobile_navigation_border_color',
                    'metapanel' => 'ut-header-mobile-settings',
                    'label' => 'Border Color',
                    'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'pages' => $post_type_support_1
                ),

                array(
                    'id' => 'ut_mobile_navigation_woocommerce_cart_settings_headline',
                    'metapanel' => 'ut-header-mobile-settings',
                    'label' => 'Mobile Woocommerce Cart Icon',
                    'desc' => 'Mobile Woocommerce Cart Icon',
                    'type' => 'section_headline',
                    'pages' => $post_type_support_1
                ),

                array(
                    'id' => 'ut_mobile_navigation_cart_closed_settings',
                    'metapanel' => 'ut-header-mobile-settings',
                    'label' => 'Closed Mobile Navigation Colors',
                    'type' => 'sub_section_inline_headline',
                    'pages' => $post_type_support_1
                ),

                array(
                    'id' => 'ut_mobile_navigation_cart_color',
                    'metapanel' => 'ut-header-mobile-settings',
                    'label' => 'Icon Color',
                    'desc' => 'Only applies if Woocommerce is installed and active. RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'pages' => $post_type_support_1
                ),

                array(
                    'id' => 'ut_mobile_navigation_cart_alternate_color',
                    'metapanel' => 'ut-header-mobile-settings',
                    'label' => 'Icon Alternate Color',
                    'desc' => 'Only applies if Woocommerce is installed and active. RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'pages' => $post_type_support_1
                ),

                array(
                    'id' => 'ut_mobile_navigation_cart_count_color',
                    'metapanel' => 'ut-header-mobile-settings',
                    'label' => 'Item Count Color',
                    'desc' => 'Default Color is white. The counter is located right next to the shopping cart icon.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'pages' => $post_type_support_1
                ),

                array(
                    'id' => 'ut_mobile_navigation_cart_count_background',
                    'metapanel' => 'ut-header-mobile-settings',
                    'label' => 'Item Count Background Color',
                    'desc' => 'Default Color is theme accent color. The counter is located right next to the shopping cart icon.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'pages' => $post_type_support_1
                ),

                array(
                    'id' => 'ut_mobile_navigation_cart_opened_settings',
                    'metapanel' => 'ut-header-mobile-settings',
                    'label' => 'Opened Mobile Navigation Colors',
                    'type' => 'sub_section_inline_headline',
                    'pages' => $post_type_support_1
                ),

                array(
                    'id' => 'ut_mobile_navigation_cart_color_hover',
                    'metapanel' => 'ut-header-mobile-settings',
                    'label' => 'Icon Hover and Active Color',
                    'desc' => 'Only applies if Woocommerce is installed and active. RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'pages' => $post_type_support_1
                ),

                array(
                    'id' => 'ut_mobile_navigation_cart_count_color_hover',
                    'metapanel' => 'ut-header-mobile-settings',
                    'label' => 'Item Count Hover and Active Color',
                    'desc' => 'Default Color is white. The counter is located right next to the shopping cart icon.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'pages' => $post_type_support_1
                ),

                array(
                    'id' => 'ut_mobile_navigation_cart_count_background_hover',
                    'metapanel' => 'ut-header-mobile-settings',
                    'label' => 'Item Count Background Hover and Active Color',
                    'desc' => 'Default Color is theme accent color. The counter is located right next to the shopping cart icon.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'pages' => $post_type_support_1
                ),
                
                /**
                 *  Custom Logo
                 */                
                
                array(
                    'id' => 'ut_custom_logo_headline',
                    'metapanel' => 'ut-header-custom-logo-settings',
                    'label' => 'Logo',
                    'type' => 'panel_headline',
                    'pages' => $post_type_support_1,
                ),

                array(
                    'id' => 'ut_site_logo_distortion',
                    'metapanel' => 'ut-header-custom-logo-settings',
                    'label' => 'Add Distortion Effect to Logo?',
                    'desc' => 'Note that this effect is using clip path technique. The clip-path property is not supported in IE or Edge. All other Modern Browsers do support this feature.',
                    'type' => 'select',
                    'global' => 'on',
                    'choices' => array(
                        array(
                            'value' => 'off',
                            'label' => 'no, thanks!'
                        ),
                        array(
                            'value' => 'style-1',
                            'label' => 'Style 1'
                        ),
                        array(
                            'value' => 'style-2',
                            'label' => 'Style 2'
                        ),
                        array(
                            'value' => 'style-3',
                            'label' => 'Style 3'
                        )
                    ),
                    'pages' => $post_type_support_2,
                ),
                array(
                    'id' => 'ut_site_logo_background',
                    'metapanel' => 'ut-header-custom-logo-settings',
                    'label' => 'Add Background to Logo?',
                    'desc' => 'A skewed background to highlight the site logo.',
                    'type' => 'select',
                    'std' => 'off',
                    'choices' => array(
                        array(
                            'value' => 'off',
                            'label' => 'no, thanks!'
                        ),
                        array(
                            'value' => 'on',
                            'label' => 'yes, please!'
                        )
                    ),
                    'pages' => $post_type_support_2,
                ),
                array(
                    'id' => 'ut_site_logo_background_skew',
                    'metapanel' => 'ut-header-custom-logo-settings',
                    'label' => 'Skew Background?',
                    'desc' => 'Skew the background shape?',
                    'type' => 'select',
                    'std' => 'on',
                    'choices' => array(
                        array(
                            'value' => 'on',
                            'label' => 'yes, please!'
                        ),
                        array(
                            'value' => 'off',
                            'label' => 'no, thanks!'
                        ),
                    ),
                    'required' => array(
                        'ut_site_logo_background' => 'on'
                    ),
                    'pages' => $post_type_support_2,
                ),
                array(
                    'id' => 'ut_site_logo_background_color',
                    'metapanel' => 'ut-header-custom-logo-settings',
                    'label' => 'Site Logo Background Color',
                    'desc' => 'Set your desired Body Background Color.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'required' => array(
                        'ut_site_logo_background' => 'on',
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_site_logo',
                    'metapanel' => 'ut-header-custom-logo-settings',
                    'label' => 'Main Logo',
                    'desc' => '<strong>(optional)</strong>. The maximum height of the logo should be 60px. And for retina logo, please double the size of your logo by keeping the aspect ratio. By leaving this field empty, the theme will use the logos from theme options panel.',
                    'type' => 'upload',
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_site_logo_alt',
                    'metapanel' => 'ut-header-custom-logo-settings',
                    'label' => 'Alternate Logo',
                    'desc' => '<strong>(optional)</strong>. Upload an alternate Logo. Should be the same size as your Main Logo. This Logo will be used if 2 different navigations skins are available on the site. Example: The navigation switches from primary to secondary skin when reaching the main content.',
                    'type' => 'upload',
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_site_logo_retina',
                    'metapanel' => 'ut-header-custom-logo-settings',
                    'label' => 'Retina Main Logo',
                    'desc' => '<strong>(optional)</strong>. Upload a retina ready Main Logo. Simply double the size of your Main Logo. By leaving this field empty, the theme will use the logos from theme options panel.',
                    'type' => 'upload',
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_site_logo_alt_retina',
                    'metapanel' => 'ut-header-custom-logo-settings',
                    'label' => 'Retina Alternate Logo',
                    'desc' => '<strong>(optional)</strong>. Upload an alternate retina Logo. Should be the same size as your Retina Main Logo. By leaving this field empty, the theme will use the logos from theme options panel.',
                    'type' => 'upload',
                    'pages' => $post_type_support_2,
                ),
                
                
                /**
                 *  Header and Navigation
                 */ 
                
                array(
                    'id' => 'ut_navigation_settings',
                    'metapanel' => 'ut-header-settings',
                    'label' => 'Header & Navigation Settings',
                    'type' => 'panel_headline',
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id' => 'ut_navigation_config',
                    'metapanel' => 'ut-header-settings',
                    'label' => 'Use Global Header and Navigation Settings from Theme Options?',
                    'desc' => 'You can create an individual header and navigation for this particular page but setting this option to "no, thanks!".',
                    'type' => 'select',
                    'choices' => array(
                        array(
                            'label' => 'yes, please!',
                            'value' => 'on'
                        ),
                        array(
                            'label' => 'no, thanks!',
                            'value' => 'off'
                        )
                    ),
                    'std' => 'yes',
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_header_layout',
                    'metapanel' => 'ut-header-settings',
                    'label' => 'Header Position',
                    'desc' => 'Select your desired Header and Navigation Position.',
                    'type' => 'select',
                    'global' => 'on',
                    'choices' => array(

                        array(
                            'value' => 'default',
                            'label' => 'Top'
                        ),
                        array(
                            'value' => 'side',
                            'label' => 'Side'
                        )

                    ),
                    'required' => array(
                        'ut_navigation_config' => 'off'
                    ),
                    'pages' => $post_type_support_2,

                ),            

                /**
                 * Vertical Side Navigation Options 
                 */

                array(
                    'id' => 'ut_side_header_align',
                    'metapanel' => 'ut-header-settings',
                    'label' => 'Header and Navigation Align',
                    'desc' => 'Decide if header and navigation are located on the left or right side.',
                    'type' => 'select',
                    'std' => 'left',
                    'choices' => array(
                        array(
                            'value' => 'left',
                            'label' => 'left'
                        ),
                        array(
                            'value' => 'right',
                            'label' => 'right'
                        )
                    ),
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'side'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_side_header_search_form',
                    'metapanel' => 'ut-header-settings',
                    'label' => 'Display Search Form?',
                    'desc' => 'An optional search form beneath the navigation.',
                    'type' => 'select',
                    'std' => 'on',
                    'choices' => array(
                        array(
                            'value' => 'on',
                            'label' => 'Yes'
                        ),
                        array(
                            'value' => 'off',
                            'label' => 'No'
                        )
                    ),
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'side'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_side_header_copyright_color',
                    'metapanel' => 'ut-header-settings',
                    'label' => 'Copyright Color',
                    'desc' => 'Desired color for copyright information.',
                    'type' => 'colorpicker',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'side'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_side_header_activate_social_icons',
                    'metapanel' => 'ut-header-settings',
                    'label' => 'Display Social Icons?',
                    'desc' => 'An optional set of social icons.',
                    'type' => 'select',
                    'std' => 'on',
                    'choices' => array(
                        array(
                            'value' => 'on',
                            'label' => 'Yes'
                        ),
                        array(
                            'value' => 'off',
                            'label' => 'No'
                        )
                    ),
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'side'
                    ),
                    'pages' => $post_type_support_2,
                ),


                array(
                    'id' => 'ut_side_header_background_image',
                    'metapanel' => 'ut-header-settings',
                    'label' => 'Header Background Image',
                    'desc' => '',
                    'type' => 'background',
                    'markup' => '1_1',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'side',
                        'pages' => $post_type_support_2,
                    )
                ),

                array(
                    'id' => 'ut_side_navigation_shadow',
                    'metapanel' => 'ut-header-settings',
                    'label' => 'Header Shadow',
                    'desc' => 'Activate Header Shadow?',
                    'type' => 'select',
                    'std' => 'off',
                    'choices' => array(
                        array(
                            'value' => 'on',
                            'label' => 'On'
                        ),
                        array(
                            'value' => 'off',
                            'label' => 'Off'
                        )
                    ),
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'side',
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_side_navigation_border',
                    'metapanel' => 'ut-header-settings',
                    'label' => 'Header Border',
                    'desc' => 'Activate Header Border?',
                    'type' => 'select',
                    'std' => 'off',
                    'choices' => array(
                        array(
                            'value' => 'on',
                            'label' => 'On'
                        ),
                        array(
                            'value' => 'off',
                            'label' => 'Off'
                        )
                    ),
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'side',
                    ),
                    'pages' => $post_type_support_2,
                ),                
            
                array(
                    'id' => 'ut_side_navigation_border_color',
                    'metapanel' => 'ut-header-settings',
                    'label' => 'Header Border Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'side',
                        'ut_side_navigation_border' => 'on'    
                    ),
                    'pages' => $post_type_support_2,
                ),
            
                /**
                 * Horizontal Navigation Options 
                 */
                array(
                    'id' => 'ut_navigation_scroll_position',
                    'metapanel' => 'ut-header-settings',
                    'label' => 'Header Scroll Behaviour',
                    'desc' => 'Select a header which is always displaying "fixed" at top of your website or a header which is "floating" all the time.',
                    'type' => 'select',
                    'global' => 'on',
                    'choices' => array(
                        array(
                            'value' => 'fixed',
                            'label' => 'Header Fixed'
                        ),
                        array(
                            'value' => 'floating',
                            'label' => 'Header Fixed and starts Floating on Scroll'
                        ),
                    ),
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default'
                    ),
                    'pages' => $post_type_support_2,
                ), 
                
                array(
					'id' => 'ut_navigation_on_hero',
					'metapanel' => 'ut-header-settings',
					'label' => 'Place Header on Hero?',
					'desc' => 'A fixed header is usually located above the hero. By using this option, the header is forced to display directly on the hero, which can be useful if you have a transparent header.',
					'type' => 'select',
					'global' => 'on',
					'choices' => array(
						array(
							'value' => 'on',
							'label' => 'yes, please!'
						),
						array(
							'value' => 'off',
							'label' => 'no, thanks!'
						)
					),
					'required' => array(
						'ut_navigation_config' => 'off',
                        'ut_activate_page_hero' => 'on',
                        'ut_header_layout' => 'default'
					),
					'pages' => $post_type_support_2,
				),
                
                array(
                    'id' => 'ut_navigation_hero_and_header_animation',
                    'metapanel' => 'ut-header-settings',
                    'label' => 'Animate Header and Hero Section?',
                    'desc' => 'Activated, Header and Hero Content will appear once the background image is loaded.',
                    'type' => 'select',
                    'global' => 'on',
                    'choices' => array(
                        array(
                            'value' => 'off',
                            'label' => 'no, thanks!'
                        ),
                        array(
                            'value' => 'on',
                            'label' => 'yes, please!'
                        ),
                        
                    ),
                    'required' => array(
                        'ut_navigation_config'  => 'off',
                        'ut_activate_page_hero' => 'on',
                        'ut_header_layout'      => 'default',
                        'ut_navigation_on_hero' => 'on'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_width',
                    'metapanel' => 'ut-header-settings',
                    'label' => 'Header Width',
                    'desc' => 'It handles how the content is displaying within the header. Centered content has a max width of 1200px or whatever has been set in "Advanced" > "Content Spacing Settings". Fullwidth content is stretched to 100% width.',
                    'type' => 'select',
                    'global' => 'on',
                    'choices' => array(
                        array(
                            'value' => 'centered',
                            'label' => 'Centered'
                        ),
                        array(
                            'value' => 'fullwidth',
                            'label' => 'Fullwidth'
                        )
                    ),
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default'
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id' => 'ut_navigation_height',
                    'metapanel' => 'ut-header-settings',
                    'label' => 'Header Height',
                    'desc' => 'Drag the handle to set the header height. Default: 80.',
                    'type' => 'numeric-slider',
                    'min_max_step' => '50,120,1',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_header_top_layout' => 'default|style-1|style-2|style-3|style-8'
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id' => 'ut_site_logo_max_height',
                    'metapanel' => 'ut-header-settings',
                    'label' => 'Logo Max Height',
                    'desc' => 'Use an alternate Logo max height. Note: This Option affects all logos. <br /><strong>Maximum value is: 120!</strong>',
                    'type' => 'numeric_slider',
                    'pages' => $post_type_support_2,
                    'min_max_step' => '0,120,1',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_header_top_layout' => 'default|style-1|style-2|style-3|style-8'	
                    )
                ),
                
                array(
                    'id' => 'ut_side_site_logo_max_height',
                    'metapanel' => 'ut-header-settings',
                    'label' => 'Logo Max Height',
                    'desc' => 'Use an alternate Logo max height. Note: This Option affects all logos. <br /><strong>Maximum value is: 120!</strong>. Please note, this is a maximum size limited by the header size itself.',
                    'type' => 'numeric_slider',
                    'global' => 'on',
                    'pages' => $post_type_support_2,
                    'min_max_step' => '0,120,1',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'side',
                    )
                ),
                
                array(
                    'id' => 'ut_site_logo_max_height_static',
                    'metapanel' => 'ut-header-settings',
                    'label' => 'Logo Max Height',
                    'desc' => 'Use an alternate Logo max height. Note: This Option affects all logos. <br /><strong>Maximum value is: 80!</strong>. Please note, this is a maximum size limited by the header size itself.',
                    'type' => 'numeric_slider',
                    'min_max_step' => '0,80,1',
                    'pages' => $post_type_support_2,
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_header_top_layout' => 'style-4|style-5|style-6|style-7'	
                    )

                ),

                array(
                    'id' => 'ut_site_logo_max_height_large',
                    'metapanel' => 'ut-header-settings',
                    'label' => 'Logo Max Height',
                    'desc' => 'Use an alternate Logo max height. Note: This Option affects all logos. <br /><strong>Maximum value is: 160!</strong>. Please note, this is a maximum size limited by the header size itself.',
                    'type' => 'numeric_slider',
                    'min_max_step' => '0,160,1',
                    'pages' => $post_type_support_2,
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_header_top_layout' => 'style-9'	
                    )
                ),
                
                array(
                    'id' => 'ut_overwrite_site_logo_max_height_mobile',
                    'metapanel' => 'ut-header-settings',
                    'label' => 'Overwrite default Logo Max Height on Mobiles?',
                    'desc' => 'The default Logo Max Height on Mobiles is 30.',
                    'global' => 'on',
                    'type' => 'select',
                    'choices' => array(
                        array(
                            'value' => 'off',
                            'label' => 'no, thanks!'
                        ),
                        array(
                            'value' => 'on',
                            'label' => 'yes, please!'
                        ),

                    ),
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                    )
                    
                ), 
                
                array(
                    'id' => 'ut_site_logo_max_height_tablet',
                    'metapanel' => 'ut-header-settings',
                    'label' => 'Logo Max Height Tablet',
                    'desc' => 'Use an alternate Logo max height. Note: This Option affects all logos. <br /><strong>Maximum value is: 80!</strong>',
                    'type' => 'numeric_slider',
                    'global' => 'on',
                    'pages' => $post_type_support_2,
                    'min_max_step' => '0,80,1',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_overwrite_site_logo_max_height_mobile' => 'on'
                    )
                ),
                
                array(
                    'id' => 'ut_site_logo_max_height_mobile',
                    'metapanel' => 'ut-header-settings',
                    'label' => 'Logo Max Height Mobile',
                    'desc' => 'Use an alternate Logo max height. Note: This Option affects all logos. <br /><strong>Maximum value is: 60!</strong>',
                    'type' => 'numeric_slider',
                    'global' => 'on',
                    'pages' => $post_type_support_2,
                    'min_max_step' => '0,60,1',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_overwrite_site_logo_max_height_mobile' => 'on'
                    )
                ),
                
                array(
                    'id' => 'ut_header_separate_upper_lower',
                    'metapanel' => 'ut-header-settings',
                    'label' => 'Separate Upper and Lower Area with a border?',
                    'desc' => '<strong>(optional)</strong>',
                    'type' => 'select',
                    'global' => 'on',
                    'choices' => array(
                        array(
                            'value' => 'on',
                            'label' => 'yes, please!'
                        ),
                        array(
                            'value' => 'off',
                            'label' => 'no, thanks!'
                        )
                    ),
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_header_top_layout' => 'style-4|style-7'
                    ),
                    'pages' => $post_type_support_2,
                ),	
                
                array(
                    'id' => 'ut_navigation_scroll_depth',
                    'metapanel' => 'ut-header-settings',
                    'label' => 'Show Entire Header when scrolling down?',
                    'desc' => 'The selected header has 2 rows of content. When scrolling down, only the lower areas remains visible. If you like to display the upper area as well, activate this option.',
                    'type' => 'select',
                    'global' => 'on',
                    'choices' => array(
                        array(
                            'value' => '1',
                            'label' => 'no, thanks!'
                        ),
                        array(
                            'value' => '2',
                            'label' => 'yes, please!'
                        )
                    ),
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_scroll_position' => 'floating',
                        'ut_header_top_layout' => 'style-4|style-5|style-6|style-7|style-9'
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                // deprecated but kept for fallback
                array(
					'id' => 'ut_site_navigation_no_logo',
					'metapanel' => 'ut-header-settings',
					'label' => 'Hide Logo?',
					'desc' => 'You can optionally hide the logo from the header area. (deprecated and kept for fallback purposes, please use the appropiate header instead.)',
					'type' => 'select',
					'global' => 'on',
					'choices' => array(
						array(
							'value' => 'yes',
							'label' => 'yes, please!'
						),
						array(
							'value' => 'no',
							'label' => 'no, thanks!'
						)
					),
					'required' => array(
						'ut_navigation_config' => 'off',
						'ut_header_layout' 	 => 'default',
                        'ut_header_top_layout' => 'default',
					),
					'pages' => $post_type_support_2,
				),

                // deprecated but kept for fallback
				array(
					'id' => 'ut_site_navigation_center',
					'metapanel' => 'ut-header-settings',
					'label' => 'Center Navigation?',
					'desc' => 'Since the main logo is not displaying anymore, would you like to center the main navigation? (deprecated and kept for fallback purposes, please use the appropiate header instead.)',
					'type' => 'select',
					'global' => 'on',
					'choices' => array(
						array(
							'value' => 'yes',
							'label' => 'yes, please!'
						),
						array(
							'value' => 'no',
							'label' => 'no, thanks!'
						)
					),
					'required' => array(
						'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
						'ut_header_top_layout' => 'default',
                        'ut_site_navigation_no_logo' => 'yes',                        
					),
					'pages' => $post_type_support_2,
				),
                
                // header top layouts
                array(
                    'id' => 'ut_header_top_layout',
                    'metapanel' => 'ut-header-settings',
                    'label' => 'Header Layout',
                    'desc' => 'Select desired Header and Navigation Layout. The "Top header" is completely separated from this option and can be configured individually inside the "Top Header" panel.',
                    'type' => 'radio_image',
                    'global' => 'on',
                    'markup' => '1_1',
                    'choices' => array(

                        array(
                            'value' => 'default',
                            'src' => 'default.png',
                            'label' => 'Logo Left <br /> Navigation Right'
                        ),					

                        array(
                            'value' => 'style-1',
                            'src' => 'header-01.png',
                            'label' => 'Logo Right <br /> Navigation Left'
                        ),

                        array(
                            'value' => 'style-2',
                            'src' => 'header-02.png',
                            'label' => 'Logo Left <br /> Navigation Centered <br /> Extra Module Right'
                        ),

                        array(
                            'value' => 'style-3',
                            'src' => 'header-03.png',
                            'label' => 'Logo Centered <br /> Navigation Left and Right'
                        ),

                        array(
                            'value' => 'style-4',
                            'src' => 'header-04.png',
                            'label' => 'Logo Centered <br /> Navigation Below'
                        ),

                        array(
                            'value' => 'style-5',
                            'src' => 'header-05.png',
                            'label' => 'Logo Left <br /> Extra Module Left and Right <br /> Navigation and Extra Module Below'
                        ),

                        array(
                            'value' => 'style-6',
                            'src' => 'header-06.png',
                            'label' => 'Logo Right <br /> Extra Module Left and Right <br /> Extra Module and Navigation Below'
                        ),

                        array(
                            'value' => 'style-7',
                            'src' => 'header-07.png',
                            'label' => 'Logo Centered <br /> Extra Module Left and Right <br /> Navigation Below'
                        ),

                        array(
                            'value' => 'style-8',
                            'src' => 'header-08.png',
                            'label' => 'Logo Centered <br /> Extra Module Left and Right'
                        ),

                        array(
                            'value' => 'style-9',
                            'src' => 'header-09.png',
                            'label' => 'Large Logo Left <br /> Extra Module Left and Right <br /> Navigation and Extra Module Below'
                        ),
                        
                    ),
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default'
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                
                // Header Primary Module
                array(
                    'id' => 'ut_header_extra_module_subheadline',
                    'metapanel' => 'ut-header-extra-modules-settings',
                    'label' => 'Header Primary Extra Module',
                    'type' => 'sub_section_inline_headline',
                    'required' => array(
                        'ut_header_layout' => 'default',
                        'ut_header_top_layout' => 'style-2|style-5|style-6|style-7|style-8|style-9'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_header_primary_extra_module',
                    'metapanel' => 'ut-header-extra-modules-settings',
                    'label' => 'Select Header Extra Module',
                    'desc' => 'The selected Header Layout supports an extra module.',
                    'type' => 'select',
                    'global' => 'on',
                    'choices' => array(

                        array(
                            'value' => 'company_social',
                            'label' => 'Company Social Media'
                        ),

                        array(
                            'value' => 'custom_menu',
                            'label' => 'Drodpwn Menu'
                        ),

                        array(
                            'value' => 'buttons',
                            'label' => 'Buttons'
                        ),

                        array(
                            'value' => 'toolbar',
                            'label' => 'Cart / Account / Search / Overlay Navigation'
                        ),

                        array(
                            'value' => 'custom_fields',
                            'label' => 'Custom Fields'
                        ),


                    ),
                    'required' => array(
                        'ut_header_layout' => 'default',
                        'ut_header_top_layout' => 'style-2|style-5|style-6|style-7|style-8|style-9'
                    ),
                    'pages' => $post_type_support_2,

                ),

                array(
                    'id' => 'ut_header_primary_company_social_info',
                    'metapanel' => 'ut-header-extra-modules-settings',
                    'label' => 'Company Details',
                    'desc' => 'You can manage your companies social profile in "General" > "Company Details".',
                    'type' => 'section_headline_info',
                    'required' => array(
                        'ut_header_layout' => 'default',
                        'ut_header_top_layout' => 'style-2|style-5|style-6|style-7|style-8|style-9',
                        'ut_header_primary_extra_module' => 'company_social'
                    ),
                    'pages' => $post_type_support_2,
                ),            

                // Header Menu
                array(
                    'id' => 'ut_header_primary_custom_menu',
                    'metapanel' => 'ut-header-extra-modules-settings',
                    'label' => 'Select Menu',
                    'desc' => sprintf( 'In order to manage this menu please visit: Appearance > %s and create a new menu. Menus which are already assigned to a location do not appear on this option.', '<a target="_blank" href="' . get_admin_url() . 'nav-menus.php">Menus</a>'),
                    'type' => 'nav_menus',
                    'global' => 'on',
                    'required' => array(
                        'ut_header_layout' => 'default',
                        'ut_header_top_layout' => 'style-2|style-5|style-6|style-7|style-8|style-9',
                        'ut_header_primary_extra_module' => 'custom_menu'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_header_primary_custom_menu_label',
                    'metapanel' => 'ut-header-extra-modules-settings',
                    'label' => 'Dropdown Menu Label',
                    'desc' => 'Enter your desired label text for this dropdown. Default text is: More',
                    'type' => 'text',
                    'global' => 'on',
                    'required' => array(
                        'ut_header_layout' => 'default',
                        'ut_header_top_layout' => 'style-2|style-5|style-6|style-7|style-8|style-9',
                        'ut_header_primary_extra_module' => 'custom_menu'
                    ),
                    'pages' => $post_type_support_2,
                ),

                // Header Toolbar
                array(
                    'id' => 'ut_header_primary_toolbar',
                    'metapanel' => 'ut-header-extra-modules-settings',
                    'label' => 'Toolbar',
                    'desc' => 'A toolbar with cart, account, language switch, overlay menu and search icon. You can also drag and drop the items to change their order. Woocommerce Plugin is required for account and cart icon feature. WPML is required for the language switch feature.',
                    'type' => 'header_toolbar',
                    'global' => 'on',
                    'required' => array(
                        'ut_header_layout' => 'default',
                        'ut_header_top_layout' => 'style-2|style-5|style-6|style-7|style-8|style-9',
                        'ut_header_primary_extra_module' => 'toolbar'
                    ),
                    'pages' => $post_type_support_2,
                ),

                /*array(
                    'id' => 'ut_header_primary_toolbar_size',
                    'metapanel' => 'ut-header-extra-modules-settings',
                    'label' => 'Toolbar Size',
                    'desc' => 'Selected your desired size. We recommned using small sizes for small headers etc.',
                    'type' => 'select',
                    'global' => 'on',
                    'choices' => array(

                        array(
                            'value' => 'small',
                            'label' => 'Small'
                        ),
                        array(
                            'value' => 'medium',
                            'label' => 'Medium'
                        ),
                        array(
                            'value' => 'large',
                            'label' => 'Large'
                        ),

                    ),
                    'required' => array(
                        'ut_header_layout' => 'default',
                        'ut_header_top_layout' => 'style-2|style-5|style-6|style-7|style-8|style-9',
                        'ut_header_primary_extra_module' => 'toolbar'
                    ),
                    'pages' => $post_type_support_2,

                ), */

                /* array(
                    'id' => 'ut_header_primary_toolbar_style',
                    'label' => 'Toolbar Style',
                    'desc' => 'Choose Toolbar Style.',
                    'type' => 'select',
                    'section' => 'ut_header_settings',
                    'subsection' => 'ut_navigation_settings',
                    'std' => 'plain',
                    'choices' => array(

                        array(
                            'value' => 'plain',
                            'label' => 'Plain'
                        ),

                        array(
                            'value' => 'rounded',
                            'label' => 'Rounded'
                        ),

                        array(
                            'value' => 'square',
                            'label' => 'Square'
                        ),

                    ),
                    'required' => array(
                        'ut_header_layout' => 'default',
                        'ut_header_top_layout' => 'style-2|style-5|style-6|style-7|style-8|style-9',
                        'ut_header_primary_extra_module' => 'toolbar'
                    )

                ), */

                // Header Extra Buttons
                array(
                    'id' => 'ut_header_primary_extra_buttons_max_1',
                    'metapanel' => 'ut-header-extra-modules-settings',
                    'label' => 'Manage Buttons',
                    'desc' => 'Keep in mind, depending on the selected header layout the horizontal space is limited. <strong>You cannot add unlimited buttons.</strong>',
                    'type' => 'list-item',
                    'list_title' => false,
                    'list_max' => '1',
                    'markup' => '1_1',
                    'global' => 'on',
                    'settings' => array(

                        array(
                            'id' => 'title',
                            'label' => 'Enter a Button Title',
                            'class' => 'option-tree-setting-title',
                            'type' => 'text',
                        ),

                        array(
                            'id' 	=> 'config',
                            'label' => 'Manage Button',
                            'type'  => 'button_builder_vc'

                        )

                    ),
                    'required' => array(
                        'ut_header_layout' => 'default',
                        'ut_header_top_layout' => 'style-2',
                        'ut_header_primary_extra_module' => 'buttons',
                    ),
                    'pages' => $post_type_support_2,

                ),

                array(
                    'id' => 'ut_header_primary_extra_buttons_max_2',
                    'metapanel' => 'ut-header-extra-modules-settings',
                    'label' => 'Manage Buttons',
                    'desc' => 'Keep in mind, depending on the selected header layout the horizontal space is limited. <strong>You cannot add unlimited buttons.</strong>',
                    'type' => 'list-item',
                    'list_title' => false,
                    'list_max' => '2',
                    'markup' => '1_1',
                    'global' => 'on',
                    'settings' => array(

                        array(
                            'id' => 'title',
                            'label' => 'Enter a Button Title',
                            'class' => 'option-tree-setting-title',
                            'type' => 'text',
                        ),

                        array(
                            'id' 	=> 'config',
                            'label' => 'Manage Button',
                            'type'  => 'button_builder_vc'

                        )

                    ),
                    'required' => array(
                        'ut_header_layout' => 'default',
                        'ut_header_top_layout' => 'style-5|style-6|style-7|style-8|style-9',
                        'ut_header_primary_extra_module' => 'buttons',
                    ),
                    'pages' => $post_type_support_2,

                ),

                // Header Primary Extra Custom Fields
                array(
                    'id' => 'ut_header_primary_extra_fields_max_1',
                    'metapanel' => 'ut-header-extra-modules-settings',
                    'label' => 'Custom Fields',
                    'desc' => 'Keep in mind, depending on the selected header layout the horizontal space is limited. You cannot add unlimited fields.',
                    'type' => 'list-item',
                    'list_title' => false,
                    'list_max' => '1',
                    'markup' => '1_1',
                    'global' => 'on',
                    'settings' => array(

                        array(
                            'id' => 'title',
                            'label' => 'Text',
                            'desc' => 'For example company phone number, email or whatever you need. Leaving this field empty will hide the element.',
                            'class' => 'option-tree-setting-title',
                            'type' => 'text',
                        ),

                        array(
                            'id' => 'icon',
                            'label' => 'Icon',
                            'desc' => 'Select a nice icon, it will be placed right in front of your custom field text.',
                            'type' => 'iconpicker',
                        ),

                        array(
                            'id' => 'link',
                            'label' => 'Link',
                            'desc' => 'You can optionally link your custom field.',
                            'type' => 'link',
                        )

                    ),
                    'required' => array(
                        'ut_header_layout' => 'default',
                        'ut_header_primary_extra_module' => 'custom_fields',
                        'ut_header_top_layout' => 'style-2',					
                    ),
                    'pages' => $post_type_support_2,

                ),

                array(
                    'id' => 'ut_header_primary_extra_fields_max_2',
                    'metapanel' => 'ut-header-extra-modules-settings',
                    'label' => 'Custom Fields',
                    'desc' => 'Keep in mind, depending on the selected header layout the horizontal space is limited. You cannot add unlimited fields.',
                    'type' => 'list-item',
                    'list_title' => false,
                    'list_max' => '2',
                    'markup' => '1_1',
                    'global' => 'on',
                    'settings' => array(

                        array(
                            'id' => 'title',
                            'label' => 'Text',
                            'desc' => 'For example company phone number, email or whatever you need. Leaving this field empty will hide the element.',
                            'class' => 'option-tree-setting-title',
                            'type' => 'text',
                        ),

                        array(
                            'id' => 'icon',
                            'label' => 'Icon',
                            'desc' => 'Select a nice icon, it will be placed right in front of your custom field text.',
                            'type' => 'iconpicker',
                        ),

                        array(
                            'id' => 'link',
                            'label' => 'Link',
                            'desc' => 'You can optionally link your custom field.',
                            'type' => 'link',
                        )

                    ),
                    'required' => array(
                        'ut_header_layout' => 'default',
                        'ut_header_primary_extra_module' => 'custom_fields',
                        'ut_header_top_layout' => 'style-5|style-6|style-7|style-8|style-9',					
                    ),
                    'pages' => $post_type_support_2,

                ),

                // Header Secondary Module
                array(
                    'id' => 'ut_header_secondary_extra_module_subheadline',
                    'metapanel' => 'ut-header-extra-modules-settings',
                    'label' => 'Header Secondary Extra Module',
                    'type' => 'sub_section_inline_headline',
                    'required' => array(
                        'ut_header_layout' => 'default',
                        'ut_header_top_layout' => 'style-5|style-6|style-7|style-8|style-9'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_header_secondary_extra_module',
                    'metapanel' => 'ut-header-extra-modules-settings',
                    'label' => 'Select Header Extra Module',
                    'desc' => 'The selected Header Layout supports an extra module.',
                    'type' => 'select',
                    'global' => 'on',
                    'choices' => array(

                        array(
                            'value' => 'company_social',
                            'label' => 'Company Social Media'
                        ),

                        array(
                            'value' => 'custom_menu',
                            'label' => 'Dropdown Menu'
                        ),

                        array(
                            'value' => 'buttons',
                            'label' => 'Buttons'
                        ),

                        array(
                            'value' => 'toolbar',
                            'label' => 'Cart / Account / Search / Overlay Navigation'
                        ),

                        array(
                            'value' => 'custom_fields',
                            'label' => 'Custom Fields'
                        ),

                    ),
                    'required' => array(
                        'ut_header_layout' => 'default',
                        'ut_header_top_layout' => 'style-5|style-6|style-7|style-8|style-9'
                    ),
                    'pages' => $post_type_support_2,

                ),

                array(
                    'id' => 'ut_header_secondary_company_social_info',
                    'metapanel' => 'ut-header-extra-modules-settings',
                    'label' => 'Company Details',
                    'desc' => 'You can manage your companies social profile in "General" > "Company Details".',
                    'type' => 'section_headline_info',
                    'required' => array(
                        'ut_header_layout' => 'default',
                        'ut_header_top_layout' => 'style-5|style-6|style-7|style-8|style-9',
                        'ut_header_secondary_extra_module' => 'company_social'
                    ),
                    'pages' => $post_type_support_2,
                ),              

                // Header Menu
                array(
                    'id' => 'ut_header_secondary_custom_menu',
                    'metapanel' => 'ut-header-extra-modules-settings',
                    'label' => 'Select Menu',
                    'desc' => sprintf( 'In order to manage this menu please visit: Appearance > %s and create a new menu. Menus which are already assigned to a location do not appear on this option.', '<a target="_blank" href="' . get_admin_url() . 'nav-menus.php">Menus</a>'),
                    'type' => 'nav_menus',
                    'global' => 'on',
                    'required' => array(
                        'ut_header_layout' => 'default',
                        'ut_header_top_layout' => 'style-5|style-6|style-7|style-8|style-9',
                        'ut_header_secondary_extra_module' => 'custom_menu'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_header_secondary_custom_menu_label',
                    'metapanel' => 'ut-header-extra-modules-settings',
                    'label' => 'Dropdown Menu Label',
                    'desc' => 'Enter your desired label text for this dropdown. Default text is: More',
                    'type' => 'text',
                    'global' => 'on',
                    'required' => array(
                        'ut_header_layout' => 'default',
                        'ut_header_top_layout' => 'style-5|style-6|style-7|style-8|style-9',
                        'ut_header_secondary_extra_module' => 'custom_menu'
                    ),
                    'pages' => $post_type_support_2,
                ),

                // Toolbar
                array(
                    'id' => 'ut_header_secondary_toolbar',
                    'metapanel' => 'ut-header-extra-modules-settings',
                    'label' => 'Toolbar',
                    'desc' => 'A toolbar with cart, account, language switch, overlay menu and search icon. You can also drag and drop the items to change their order. Woocommerce Plugin is required for account and cart icon feature. WPML is required for the language switch feature.',
                    'type' => 'header_toolbar',
                    'global' => 'on',
                    'required' => array(
                        'ut_header_layout' => 'default',
                        'ut_header_top_layout' => 'style-5|style-6|style-7|style-8|style-9',
                        'ut_header_secondary_extra_module' => 'toolbar'
                    ),
                    'pages' => $post_type_support_2,
                ),

                /*array(
                    'id' => 'ut_header_secondary_toolbar_size',
                    'metapanel' => 'ut-header-extra-modules-settings',
                    'label' => 'Toolbar Size',
                    'desc' => 'Selected your desired size. We recommned using small sizes for small headers etc.',
                    'type' => 'select',
                    'global' => 'on',
                    'choices' => array(

                        array(
                            'value' => 'small',
                            'label' => 'Small'
                        ),

                        array(
                            'value' => 'medium',
                            'label' => 'Medium'
                        ),

                        array(
                            'value' => 'large',
                            'label' => 'Large'
                        ),

                    ),
                    'required' => array(
                        'ut_header_layout' => 'default',
                        'ut_header_top_layout' => 'style-5|style-6|style-7|style-8|style-9',
                        'ut_header_secondary_extra_module' => 'toolbar'
                    ),
                    'pages' => $post_type_support_2,

                ),*/

                /*array(
                    'id' => 'ut_header_secondary_toolbar_style',
                    'label' => 'Toolbar Style',
                    'desc' => 'Choose Toolbar Style.',
                    'type' => 'select',
                    'section' => 'ut_header_settings',
                    'subsection' => 'ut_navigation_settings',
                    'std' => 'plain',
                    'choices' => array(

                        array(
                            'value' => 'plain',
                            'label' => 'Plain'
                        ),

                        array(
                            'value' => 'rounded',
                            'label' => 'Rounded'
                        ),

                        array(
                            'value' => 'square',
                            'label' => 'Square'
                        ),

                    ),
                    'required' => array(
                        'ut_header_layout' => 'default',
                        'ut_header_top_layout' => 'style-5|style-6|style-7|style-8|style-9',
                        'ut_header_secondary_extra_module' => 'toolbar'
                    )

                ), */

                // Buttons
                array(
                    'id' => 'ut_header_secondary_extra_buttons',
                    'metapanel' => 'ut-header-extra-modules-settings',
                    'label' => 'Manage Buttons',
                    'desc' => 'Keep in mind, depending on the selected header layout the horizontal space is limited. You cannot add unlimited buttons.',
                    'type' => 'list-item',
                    'list_title' => false,
                    'markup' => '1_1',
                    'global' => 'on',
                    'settings' => array(

                        array(
                            'id' => 'title',
                            'label' => 'Enter a Button Title',
                            'class' => 'option-tree-setting-title',
                            'type' => 'text',
                        ),

                        array(
                            'id' 	=> 'config',
                            'label' => 'Manage Button',
                            'type'  => 'button_builder_vc'

                        )

                    ),
                    'required' => array(
                        'ut_header_layout' => 'default',
                        'ut_header_top_layout' => 'style-5|style-6|style-7|style-8|style-9',
                        'ut_header_secondary_extra_module' => 'buttons'
                    ),
                    'pages' => $post_type_support_2,

                ),


                // Header Secondary Extra Custom Fields
                array(
                    'id' => 'ut_header_secondary_extra_fields',
                    'metapanel' => 'ut-header-extra-modules-settings',
                    'label' => 'Custom Fields',
                    'desc' => 'Keep in mind, depending on the selected header layout the horizontal space is limited. You cannot add unlimited fields.',
                    'type' => 'list-item',
                    'list_title' => false,
                    'list_max' => '2',
                    'markup' => '1_1',
                    'global' => 'on',
                    'settings' => array(

                        array(
                            'id' => 'title',
                            'label' => 'Text',
                            'desc' => 'For example company phone number, email or whatever you need. Leaving this field empty will hide the element.',
                            'type' => 'text',
                            'class' => 'option-tree-setting-title',
                        ),

                        array(
                            'id' => 'icon',
                            'label' => 'Icon',
                            'desc' => 'Select a nice icon, it will be placed right in front of your custom field text.',
                            'type' => 'iconpicker',
                        ),

                        array(
                            'id' => 'link',
                            'label' => 'Link',
                            'desc' => 'You can optionally link your custom field.',
                            'type' => 'link',
                        )

                    ),
                    'required' => array(
                        'ut_header_layout' => 'default',
                        'ut_header_secondary_extra_module' => 'custom_fields',
                        'ut_header_top_layout' => 'style-5|style-6|style-7|style-8|style-9',					
                    ),
                    'pages' => $post_type_support_2,

                ),


                // Header Tertiary Module
                array(
                    'id' => 'ut_header_tertiary_extra_module_subheadline',
                    'metapanel' => 'ut-header-extra-modules-settings',
                    'label' => 'Header Tertiary Extra Module',
                    'type' => 'sub_section_inline_headline',
                    'required' => array(
                        'ut_header_layout' => 'default',
                        'ut_header_top_layout' => 'style-5|style-6|style-9'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_header_tertiary_extra_module',
                    'metapanel' => 'ut-header-extra-modules-settings',
                    'label' => 'Select Header Extra Module',
                    'desc' => 'The selected Header Layout supports an extra module.',
                    'type' => 'select',
                    'global' => 'on',
                    'choices' => array(

                        array(
                            'value' => 'company_social',
                            'label' => 'Company Social Media'
                        ),

                        array(
                            'value' => 'custom_menu',
                            'label' => 'Dropdown Menu'
                        ),

                        array(
                            'value' => 'buttons',
                            'label' => 'Buttons'
                        ),

                        array(
                            'value' => 'toolbar',
                            'label' => 'Cart / Account / Search / Overlay Navigation'
                        ),

                        array(
                            'value' => 'custom_fields',
                            'label' => 'Custom Fields'
                        ),

                    ),
                    'required' => array(
                        'ut_header_layout' => 'default',
                        'ut_header_top_layout' => 'style-5|style-6|style-9'
                    ),
                    'pages' => $post_type_support_2,

                ),

                array(
                    'id' => 'ut_header_tertiary_company_social_info',
                    'metapanel' => 'ut-header-extra-modules-settings',
                    'label' => 'Company Details',
                    'desc' => 'You can manage your companies social profile in "General" > "Company Details".',
                    'type' => 'section_headline_info',
                    'required' => array(
                        'ut_header_layout' => 'default',
                        'ut_header_top_layout' => 'style-5|style-6|style-9',
                        'ut_header_tertiary_extra_module' => 'company_social'
                    ),
                    'pages' => $post_type_support_2,
                ),  

                // Header Menu
                array(
                    'id' => 'ut_header_tertiary_custom_menu',
                    'metapanel' => 'ut-header-extra-modules-settings',
                    'label' => 'Select Menu',
                    'desc' => sprintf( 'In order to manage this menu please visit: Appearance > %s and create a new menu. Menus which are already assigned to a location do not appear on this option.', '<a target="_blank" href="' . get_admin_url() . 'nav-menus.php">Menus</a>'),
                    'type' => 'nav_menus',
                    'global' => 'on',
                    'required' => array(
                        'ut_header_layout' => 'default',
                        'ut_header_top_layout' => 'style-5|style-6|style-9',
                        'ut_header_tertiary_extra_module' => 'custom_menu'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_header_tertiary_custom_menu_label',
                    'metapanel' => 'ut-header-extra-modules-settings',
                    'label' => 'Dropdown Menu Label',
                    'desc' => 'Enter your desired label text for this dropdown. Default text is: More',
                    'type' => 'text',
                    'global' => 'on',
                    'required' => array(
                        'ut_header_layout' => 'default',
                        'ut_header_top_layout' => 'style-5|style-6|style-9',
                        'ut_header_tertiary_extra_module' => 'custom_menu'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_header_tertiary_toolbar',
                    'metapanel' => 'ut-header-extra-modules-settings',
                    'label' => 'Toolbar',
                    'desc' => 'A toolbar with cart, account, language switch, overlay menu and search icon. You can also drag and drop the items to change their order. Woocommerce Plugin is required for account and cart icon feature. WPML is required for the language switch feature.',
                    'type' => 'header_toolbar',
                    'global' => 'on',
                    'required' => array(
                        'ut_header_layout' => 'default',
                        'ut_header_top_layout' => 'style-5|style-6|style-9',
                        'ut_header_tertiary_extra_module' => 'toolbar'
                    ),
                    'pages' => $post_type_support_2,
                ),

                /* array(
                    'id' => 'ut_header_tertiary_toolbar_size',
                    'metapanel' => 'ut-header-extra-modules-settings',
                    'label' => 'Toolbar Size',
                    'desc' => 'Selected your desired size. We recommned using small sizes for small headers etc.',
                    'type' => 'select',
                    'global' => 'on',
                    'choices' => array(

                        array(
                            'value' => 'small',
                            'label' => 'Small'
                        ),

                        array(
                            'value' => 'medium',
                            'label' => 'Medium'
                        ),

                        array(
                            'value' => 'large',
                            'label' => 'Large'
                        ),

                    ),
                    'required' => array(
                        'ut_header_layout' => 'default',
                        'ut_header_top_layout' => 'style-5|style-6|style-9',
                        'ut_header_tertiary_extra_module' => 'toolbar'
                    ),
                    'pages' => $post_type_support_2,

                ), */

                /* array(
                    'id' => 'ut_header_tertiary_toolbar_style',
                    'label' => 'Toolbar Style',
                    'desc' => 'Choose Toolbar Style.',
                    'type' => 'select',
                    'section' => 'ut_header_settings',
                    'subsection' => 'ut_navigation_settings',
                    'std' => 'plain',
                    'choices' => array(

                        array(
                            'value' => 'plain',
                            'label' => 'Plain'
                        ),

                        array(
                            'value' => 'rounded',
                            'label' => 'Rounded'
                        ),

                        array(
                            'value' => 'square',
                            'label' => 'Square'
                        ),

                    ),
                    'required' => array(
                        'ut_header_layout' => 'default',
                        'ut_header_top_layout' => 'style-5|style-6|style-9',
                        'ut_header_tertiary_extra_module' => 'toolbar'
                    )

                ), */

                array(
                    'id' => 'ut_header_tertiary_extra_buttons_max_1',
                    'metapanel' => 'ut-header-extra-modules-settings',
                    'label' => 'Manage Buttons',
                    'desc' => 'Keep in mind, depending on the selected header layout the horizontal space is limited. You cannot add unlimited buttons.',
                    'type' => 'list-item',
                    'list_title' => false,
                    'list_max' => '1',
                    'markup' => '1_1',
                    'global' => 'on',
                    'settings' => array(

                        array(
                            'id' => 'title',
                            'label' => 'Enter a Button Title',
                            'class' => 'option-tree-setting-title',
                            'type' => 'text',
                        ),

                        array(
                            'id' 	=> 'config',
                            'label' => 'Manage Button',
                            'type'  => 'button_builder_vc'

                        )

                    ),
                    'required' => array(
                        'ut_header_layout' => 'default',
                        'ut_header_top_layout' => 'style-5|style-6|style-9',
                        'ut_header_tertiary_extra_module' => 'buttons'
                    ),
                    'pages' => $post_type_support_2,

                ),


                // Header Tertiary Extra Custom Fields
                array(
                    'id' => 'ut_header_tertiary_extra_fields',
                    'metapanel' => 'ut-header-extra-modules-settings',
                    'label' => 'Custom Fields',
                    'desc' => 'Keep in mind, depending on the selected header layout the horizontal space is limited. You cannot add unlimited fields.',
                    'type' => 'list-item',
                    'list_title' => false,
                    'list_max' => '1',
                    'markup' => '1_1',
                    'global' => 'on',
                    'settings' => array(

                        array(
                            'id' => 'title',
                            'label' => 'Text',
                            'desc' => 'For example company phone number, email or whatever you need. Leaving this field empty will hide the element.',
                            'type' => 'text',
                            'class' => 'option-tree-setting-title',
                        ),

                        array(
                            'id' => 'icon',
                            'label' => 'Icon',
                            'desc' => 'Select a nice icon, it will be placed right in front of your custom field text.',
                            'type' => 'iconpicker',
                        ),

                        array(
                            'id' => 'link',
                            'label' => 'Link',
                            'desc' => 'You can optionally link your custom field.',
                            'type' => 'link',
                        )

                    ),
                    'required' => array(
                        'ut_header_layout' => 'default',
                        'ut_header_tertiary_extra_module' => 'custom_fields',
                        'ut_header_top_layout' => 'style-5|style-6|style-9',					
                    ),
                    'pages' => $post_type_support_2,

                ),
                
                /*
                 * Header Navigation Custom Settings
                 */
                
                array(
                    'id' => 'ut_header_navigation_style_settings_subheadline',
                    'metapanel' => 'ut-header-settings',
                    'label' => 'Navigation Style Settings',
                    'type' => 'sub_section_inline_headline',
                     'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                    )
                ),
                
                array(
                    'id' => 'ut_navigation_style',
                    'metapanel' => 'ut-header-settings',
                    'label' => 'Navigation Style',
                    'desc' => 'Select your desired first level navigation style.',
                    'type' => 'select',
                    'global' => 'on',
                    'choices' => array(
                        array(
                            'value' => 'separator',
                            'label' => 'Navigation Items separated with dot or custom character'
                        ),
                        array(
                            'value' => 'animation-line',
                            'label' => 'Navigation Items with an animating border'
                        ),
                        /*array(
                            'value' => 'border-bottom',
                            'label' => 'Navigation Items with border bottom'
                        ),
                        array(
                            'value' => 'button',
                            'label' => 'Navigation Items with button style'
                        )*/
                    ),
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_navigation_config' => 'off',
						'ut_header_layout' => 'default'
                    )
                ),
                                
				array(
					'id' => 'ut_navigation_item_separator_style',
					'metapanel' => 'ut-header-settings',
					'label' => 'Navigation Item Separator Style',
					'desc' => 'Separators are used as a divider between navigation items.',
					'type' => 'select',
					'global' => 'on',
					'choices' => array(
						array(
							'value' => 'default',
							'label' => 'Default (Dot)'
						),
						array(
							'value' => 'custom',
							'label' => 'Custom'
						)
					),
					'required' => array(
						'ut_navigation_config' => 'off',
						'ut_header_layout' => 'default',
                        'ut_navigation_style' => 'separator'
					),
					'pages' => $post_type_support_2,
				),
				
				array(
					'id' => 'ut_navigation_item_separator',
					'metapanel' => 'ut-header-settings',
					'label' => 'Navigation Custom Item Separator',
					'desc' => 'Enter your desired custom separator. You can also leave this field empty if no separator wished.',
					'type' => 'text',
                    'global' => 'on',
					'required' => array(
						'ut_navigation_config' => 'off',	
						'ut_header_layout' => 'default',
                        'ut_navigation_style' => 'separator',
						'ut_navigation_item_separator_style' => 'custom',
					),
					'pages' => $post_type_support_2,
				), 
				
                array(
                    'id' => 'ut_navigation_animation_line_position',
                    'metapanel' => 'ut-header-settings',
                    'label' => 'Animating Border Position',
                    'desc' => 'Select your desired position for animating line.',
                    'type' => 'select',
                    'pages' => $post_type_support_2,
                    'global' => 'on',
                    'choices' => array(
                        array(
                            'value' => 'top',
                            'label' => 'top'
                        ),
                        array(
                            'value' => 'middle',
                            'label' => 'middle'
                        ),
                        array(
                            'value' => 'bottom',
                            'label' => 'bottom'
                        ),

                    ),
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_style' => 'animation-line',
                    )
                ),

                array(
                    'id' => 'ut_navigation_animation_line_height',
                    'metapanel' => 'ut-header-settings',
                    'label' => 'Animating Border Height',
                    'desc' => 'Default: 2.',
                    'type' => 'numeric-slider',
                    'min_max_step' => '1,4,1',
                    'pages' => $post_type_support_2,
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_style' => 'animation-line',
                    )
                ),

                array(
                    'id' => 'ut_header_navigation_submenu_animation_settings_subheadline',
                    'metapanel' => 'ut-header-settings',    
                    'label' => 'Navigation Submenu Animation Settings',
                    'type' => 'sub_section_inline_headline',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id' => 'ut_navigation_submenu_animation',
                    'metapanel' => 'ut-header-settings',
                    'label' => 'Animate Sub Menu to top?',
                    'desc' => 'Once activated, mega menu container and sub menu container are animating up when they appear.',
                    'type' => 'select',
                    'global' => 'on',
                    'choices' => array(
                        array(
                            'value' => 'yes',
                            'label' => 'yes, please!'
                        ),
                        array(
                            'value' => 'no',
                            'label' => 'no, thanks!'
                        )
                    ),
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default'
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                
                
                array(
                    'id' => 'ut_header_navigation_submenu_content_animation_settings_subheadline',
                    'metapanel' => 'ut-header-settings',
                    'label' => 'Navigation Submenu Content Animation Settings',
                    'type' => 'sub_section_inline_headline',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                array(
					'id' => 'ut_navigation_column_animation',
					'metapanel' => 'ut-header-settings',
					'label' => 'Animate Sub Menu and Mega Menu Content?',
                    'desc' => 'Once activated, mega menu columns and sub level menu items are animating slightly up when they appear.',
					'type' => 'select',
					'global' => 'on',
					'choices' => array(
						array(
							'value' => 'yes',
							'label' => 'yes, please!'
						),
						array(
							'value' => 'no',
							'label' => 'no, thanks!'
						)
					),
					'required' => array(
						'ut_navigation_config' => 'off',
						'ut_header_layout' => 'default',
					),
					'pages' => $post_type_support_2,
				),
                
                array(
					'id' => 'ut_navigation_column_link_animation',
					'metapanel' => 'ut-header-settings',
					'label' => 'Add Fancy Animation on Hover?',
                    'desc' => 'Once activated, sub menu links und mega menu links are getting an additional mouse over animation or decoration.',
					'type' => 'select',
                    'global' => 'on',
					'choices' => array(
						array(
							'value' => 'yes',
							'label' => 'yes, please!'
						),
						array(
							'value' => 'no',
							'label' => 'no, thanks!'
						)
					),
					'required' => array(
						'ut_navigation_config' => 'off',
						'ut_header_layout' => 'default',
					),
					'pages' => $post_type_support_2,
				),
                
                array(
					'id' => 'ut_navigation_column_link_animation_type',
					'metapanel' => 'ut-header-settings',
					'label' => 'Animation / Decoration Type.',
					'desc' => 'Choose desired animation or decoration type.',
					'type' => 'select',
                    'global' => 'on',
					'choices' => array(
						array(
							'value' => 'background',
							'label' => 'Background Color Animation'
						),
						array(
							'value' => 'border',
							'label' => 'Border Bottom Animation'
						),
						array(
							'value' => 'background-static',
							'label' => 'Static Background Color'
						),
					),
					'required' => array(
						'ut_navigation_config' => 'off',
						'ut_header_layout' => 'default',
						'ut_navigation_column_link_animation' => 'yes',
					),
					'pages' => $post_type_support_2,
				),
                
                array(
                    'id' => 'ut_header_navigation_transition_settings_subheadline',
                    'metapanel' => 'ut-header-settings',
                    'label' => 'Navigation Transition Settings',
                    'type' => 'sub_section_inline_headline',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id' => 'ut_navigation_no_mouse_transition',
                    'metapanel' => 'ut-header-settings',
                    'label' => 'Deactivate Header Background Transition on "Mouse Over"?',
                    'desc' => 'By default, header background colors are transitioning smoothly.',
                    'type' => 'select',
                    'global' => 'on',
                    'choices' => array(
                        array(
                            'value' => 'yes',
                            'label' => 'yes, please!'
                        ),
                        array(
                            'value' => 'no',
                            'label' => 'no, thanks!'
                        )
                    ),
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                    ),
                    'pages' => $post_type_support_2,
                ),	
                
                // Color Skins
                array(
                    'id' => 'ut_navigation_color_settings',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Color Skin Settings',
                    'type' => 'panel_headline',
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id' => 'ut_navigation_skin',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Header Color Skin',
                    'desc' => 'Brookyln provides 2 default color skins for your header and navigation. If these skins do not match your requirements simply use the custom option and individualize it to your needs.',
                    'type' => 'select',
                    'global' => 'on',
                    'choices' => array(
                        array(
                            'value' => 'ut-header-dark',
                            'label' => 'Dark'
                        ),
                        array(
                            'value' => 'ut-header-light',
                            'label' => 'Light'
                        ),
                        array(
                            'value' => 'ut-header-custom',
                            'label' => 'Custom Skin'
                        )
                    ),
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default|side'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_darkskin_settings_headline',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Dark Skin Settings',
                    'desc' => 'Dark Skin Settings',
                    'type' => 'section_headline',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_navigation_skin' => 'ut-header-dark',
                        'ut_header_layout' => 'default'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_lightskin_settings_headline',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Light Skin Settings',
                    'desc' => 'Light Skin Settings',
                    'type' => 'section_headline',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_navigation_skin' => 'ut-header-light',
                        'ut_header_layout' => 'default'
                    ),
                    'pages' => $post_type_support_2,
                ),

                /* setting for both base skins */
                array(
                    'id' => 'ut_navigation_state',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Always show Header and Navigation?',
                    'desc' => 'This option makes header and navigation visible all the time. If you choose "On (transparent)". The navigation will turn into the chosen skin when reaching the main content."',
                    'type' => 'select',
                    'global' => 'on',
                    'choices' => array(
                        array(
                            'value' => 'on',
                            'label' => 'Show chosen skin on Hero and content.'
                        ),
                        array(
                            'value' => 'on_transparent',
                            'label' => 'Show transparent skin on Hero and switch to chosen skin on content.'
                        ),
                        array(
                            'value' => 'off',
                            'label' => 'Hide Header on Hero and switch to show chosen skin on content.'
                        )
                    ),
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_navigation_skin' => 'ut-header-dark|ut-header-light',
                        'ut_header_layout' => 'default'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_shadow',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Header Shadow',
                    'desc' => 'Activate Header Shadow?',
                    'type' => 'select',
                    'global' => 'on',
                    'choices' => array(
                        array(
                            'value' => 'on',
                            'label' => 'On'
                        ),
                        array(
                            'value' => 'off',
                            'label' => 'Off'
                        )
                    ),
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-light|ut-header-dark',
                        'ut_navigation_state' => 'on|off'
                    ),
                    'pages' => $post_type_support_2,
                ),
            
                array(
                    'id' => 'ut_navigation_border_bottom',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Header Border Bottom',
                    'desc' => 'Activate Header Border Bottom?',
                    'type' => 'select',
                    'global' => 'on',
                    'choices' => array(
                        array(
                            'value' => 'on',
                            'label' => 'On'
                        ),
                        array(
                            'value' => 'off',
                            'label' => 'Off'
                        )
                    ),
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-light',
                        'ut_navigation_state' => 'on|off'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_transparent_border',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Activate Navigation Border Bottom?',
					'desc' => 'A small decoration line.',
                    'type' => 'select',
                    'global' => 'on',
                    'choices' => array(
                        array(
                            'value' => 'on',
                            'label' => 'On'
                        ),
                        array(
                            'value' => 'off',
                            'label' => 'Off'
                        )
                    ),
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_navigation_skin' => 'ut-header-light|ut-header-dark',
                        'ut_navigation_state' => 'on_transparent'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_customskin_settings_headline',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Custom Skin Settings',
                    'desc' => 'Custom Skin Settings',
                    'type' => 'section_headline',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_header_layout' => 'default'
                    ),
                    'pages' => $post_type_support_2,
                ),

	            array(
		            'id' => 'ut_navigation_customskin_state',
		            'metapanel' => 'ut-header-color-settings',
		            'label' => 'Always show Header and Navigation?',
		            'desc' => 'This option makes header and navigation visible all the time. If you choose "Yes, but switch to Content Skin (Secondary) on scroll!". The navigation will turn into the content skin when reaching the main content. There content skin settings will appear once you select this option."',
		            'type' => 'select',
		            'global' => 'on',
		            'choices' => array(
			            array(
				            'value' => 'on',
				            'label' => 'Yes, with Hero Skin (Primary)!'
			            ),
			            array(
				            'value' => 'on_switch',
				            'label' => 'Yes, but switch to the Content Skin (Secondary) on scroll or hover!'
			            ),
			            array(
				            'value' => 'off',
				            'label' => 'No, but switch to Hero Skin (Primary) on scroll!'
			            )
		            ),
		            'required' => array(
			            'ut_navigation_config' => 'off',
			            'ut_navigation_skin' => 'ut-header-custom',
			            'ut_header_layout' => 'default'
		            ),
		            'pages' => $post_type_support_2,
	            ),
                
                /* New Waypoint */
                array(
                    'id' => 'ut_navigation_skin_waypoint',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Select Waypoint when skin swap should happen.',
                    'desc' => 'There are currently 2 waypoints available.',
                    'type' => 'select',
                    'global' => 'on',
                    'choices' => array(
                        array(
                            'value' => 'content',
                            'label' => 'Switch when main content is reached.'
                        ),
                        array(
                            'value' => 'early',
                            'label' => 'Switch when user scrolls down a bit.'
                        ),
                    ),
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default'                                                
                    ),
                    'pages' => $post_type_support_2,
                ),

                /* Primary Skin */
                array(
                    'id' => 'ut_navigation_customskin_primary_settings_headline',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Hero Skin (Primary) Settings',
                    'desc' => 'Hero Skin (Primary) Settings',
                    'type' => 'section_headline',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_header_layout' => 'default'
                    ),
                    'pages' => $post_type_support_2,
                ),
                array(
                    'id' => 'ut_side_navigation_customskin_primary_settings_headline',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Color Skin Settings',
                    'desc' => 'Color Skin Settings',
                    'type' => 'section_headline',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_header_layout' => 'side'
                    ),
                    'pages' => $post_type_support_2,
                ),


                array(
                    'id' => 'ut_header_ps_text_logo_color',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Text Logo Color',
                    'desc' => 'RGBA Color. Only applies if no main logo has been uploaded and set. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_navigation_skin' => 'ut-header-custom',
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_header_ps_text_logo_color_hover',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Text Logo Color Hover',
                    'desc' => 'RGBA Color. Only applies if no main logo has been uploaded and set. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_navigation_skin' => 'ut-header-custom',
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_subheadline_ps_header_colors',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Header Colors',
                    'type' => 'sub_section_headline',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_navigation_skin' => 'ut-header-custom',
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_header_ps_background_color',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Background Color',
                    'desc' => 'If you consider using transparent colors, we recommend turning the option "Place Header on Hero" in "Settings" to on.',
                    'type' => 'gradient_colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_navigation_skin' => 'ut-header-custom',
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id' => 'ut_header_ps_separator_border_color',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Separator Border Color',
                    'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_header_top_layout' => 'style-4|style-5|style-6|style-7|style-9',
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id' => 'ut_header_ps_shadow_color',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Shadow Color',
                    'desc' => 'You can turn off the shadow by settings its opacity to 0. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_navigation_skin' => 'ut-header-custom',
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_header_ps_border_color',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Border Bottom Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_subheadline_ps_fl_colors',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Navigation First Level Colors',
                    'type' => 'sub_section_headline',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_navigation_skin' => 'ut-header-custom',
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_ps_fl_color',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Link Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_navigation_skin' => 'ut-header-custom',
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_ps_fl_color_hover',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Link Hover Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_navigation_skin' => 'ut-header-custom',
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_ps_fl_dot_color',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Dot Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_ps_fl_active_color',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Active Link Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_navigation_skin' => 'ut-header-custom',
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id' => 'ut_navigation_ps_fl_decoration_color',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Animation Decoration Line Color',
                    'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin'  => 'ut-header-custom',
                        'ut_navigation_style' => 'animation-line'           
                    ),
                    'pages' => $post_type_support_2,
                ),

	            array(
		            'id' => 'ut_navigation_ps_fl_description_color',
		            'metapanel' => 'ut-header-color-settings',
		            'label' => 'Description Color',
		            'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
		            'type' => 'colorpicker',
		            'mode' => 'rgb',
		            'global' => 'on',
		            'required' => array(
			            'ut_navigation_config' => 'off',
			            'ut_header_layout' => 'default',
			            'ut_navigation_skin' => 'ut-header-custom',
		            ),
		            'pages' => $post_type_support_2,
	            ),
                
                array(
                    'id' => 'ut_navigation_ps_fl_arrow_color',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Arrow Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'side',
                        'ut_navigation_skin' => 'ut-header-custom',
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_subheadline_ps_sl_colors',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Navigation Sub Menu Colors',
                    'type' => 'sub_section_headline',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_navigation_skin' => 'ut-header-custom',
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_ps_sl_background_color',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Background Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'gradient_colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_ps_sl_color',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Link Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_navigation_skin' => 'ut-header-custom',
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_ps_sl_color_hover',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Link Hover Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_navigation_skin' => 'ut-header-custom',
                    ),
                    'pages' => $post_type_support_2,
                ),
                array(
                    'id' => 'ut_navigation_ps_sl_active_color',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Active Link Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_navigation_skin' => 'ut-header-custom',
                    ),
                    'pages' => $post_type_support_2,
                ),
                array(
                    'id' => 'ut_navigation_ps_sl_arrow_color',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Arrow Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'side',
                        'ut_navigation_skin' => 'ut-header-custom',
                    ),
                    'pages' => $post_type_support_2,
                ),
                array(
					'id' => 'ut_navigation_ps_sl_animation_color',
					'metapanel' => 'ut-header-color-settings',
					'label' => 'Link Animation or Decoration Color.',
					'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
					'type' => 'colorpicker',
					'mode' => 'rgb',
                    'global' => 'on',
					'required' => array(
						'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
						'ut_navigation_skin' => 'ut-header-custom',
						'ut_navigation_column_link_animation' => 'yes',
					),
					'pages' => $post_type_support_2,
				),
				array(
					'id' => 'ut_navigation_ps_megamenu_column_title_color',
					'metapanel' => 'ut-header-color-settings',
					'label' => 'Megamenu Column Title Color',
					'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
					'type' => 'colorpicker',
					'mode' => 'rgb',
                    'global' => 'on',
					'required' => array(
						'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
						'ut_navigation_skin' => 'ut-header-custom',
					),
					'pages' => $post_type_support_2,
				),
				array(
					'id' => 'ut_navigation_ps_megamenu_column_title_color_hover',
					'metapanel' => 'ut-header-color-settings',
					'label' => 'Megamenu Column Title Hover Color',
					'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
					'type' => 'colorpicker',
					'mode' => 'rgb',
                    'global' => 'on',
					'required' => array(
						'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
						'ut_navigation_skin' => 'ut-header-custom',
					),
					'pages' => $post_type_support_2,
				),
                array(
                    'id' => 'ut_navigation_ps_header_social_icons',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Social Icons',
                    'type' => 'sub_section_headline',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
						'ut_navigation_skin' => 'ut-header-custom',
                    ),
                    'pages' => $post_type_support_2,
                ),
                array(
                    'id' => 'ut_navigation_ps_header_social_icons_color',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Social Icons Color',
                    'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
						'ut_navigation_skin' => 'ut-header-custom',
                    ),
                    'pages' => $post_type_support_2,
                ),
                array(
                    'id' => 'ut_navigation_ps_header_social_icons_color_hover',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Social Icons Color',
                    'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
						'ut_navigation_skin' => 'ut-header-custom',
                    ),
                    'pages' => $post_type_support_2,
                ),
                array(
                    'id' => 'ut_navigation_ps_sl_border_settings',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Sub Menu Border and Shadow Settings',
                    'type' => 'sub_section_inline_headline',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
						'ut_navigation_skin' => 'ut-header-custom',
                    ),
                    'pages' => $post_type_support_2,
                ),
                array(
                    'id' => 'ut_navigation_ps_sl_border_width',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Border Top Width',
                    'desc' => 'Drag the handle to set the border width value.',
                    'type' => 'numeric-slider',
                    'min_max_step' => '0,10,1',
                    'global' => 'on',
                    'required' => array(
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on|on_switch|off'
                    ),
                    'pages' => $post_type_support_2,
                ),
                array(
                    'id' => 'ut_navigation_ps_sl_border_color',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Border Top Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                    ),
                    'pages' => $post_type_support_2,
                ),
                array(
                    'id' => 'ut_navigation_ps_sl_borders',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Remaining Borders',
                    'desc' => 'Individually Border Right Left and Bottom Style.',
                    'type' => 'border',
                    'markup' => '1_1',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                    ),
                    'pages' => $post_type_support_2,
                ),                
                array(
                    'id' => 'ut_navigation_ps_sl_mm_border',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Mega Menu Column Border',
                    'desc' => 'The border properties allow you to specify the style, width, and color.',
                    'type' => 'border',
                    'markup' => '1_1',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on|on_switch|off'
                    ),
                    'pages' => $post_type_support_2,
                ),				
				array(
                    'id' => 'ut_navigation_ps_sl_shadow_color',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Shadow Color',
                    'desc' => 'You can turn off the shadow by settings its opacity to 0. Simply use the adjustment bar on the right of the colorpicker.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                // Header Mini Cart
                array(
                    'id' => 'ut_navigation_ps_shopping_cart_headline',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Woocommerce Mini Shopping Cart',
                    'desc' => 'Woocommerce Mini Shopping Cart',
                    'type' => 'section_headline',
                    'collapse' => 'close',
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_ps_shopping_cart_count_color',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Item Count Color',
                    'desc' => 'Default Color is white. The counter is located right next to the shopping cart icon.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_ps_shopping_cart_count_background',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Item Count Background Color',
                    'desc' => 'Default Color is theme accent color. The counter is located right next to the shopping cart icon.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_ps_shopping_cart_item_delete_color',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Item Delete Color',
                    'desc' => 'Creates a separator between cart items.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_ps_shopping_cart_item_delete_hover_color',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Item Delete Hover Color',
                    'desc' => 'Creates a separator between cart items.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_ps_shopping_cart_item_separator',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Item Separator',
                    'desc' => 'Creates a separator between cart items.',
                    'type' => 'border',
                    'markup' => '1_1',
                    'global' => 'on',
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_ps_shopping_cart_scrollbar',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Cart Scrollbar Color',
                    'desc' => 'If more than 3 items have been placed inside the cart, a scrollbar will automatically appear.',
                    'type' => 'colorpicker',
                    'global' => 'on',
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_ps_shopping_cart_summary_background',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Shopping Cart Summary Background Color',
                    'desc' => 'The Summary Area of the mini shopping cart contains the total number of items in your cart and the total price of all items. Additionally 2 Buttons are displaying allowing the user to view his cart on a single page or directly browse to the checkout page. Giving this area a background color will visually separate the summary from the cart items.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'pages' => $post_type_support_2,
                ),            

                array(
                    'id' => 'ut_navigation_ps_shopping_cart_item_total_count',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Total Item Count Color',
                    'desc' => 'This total count belongs to the summary area and is located right above the cart buttons. Default Color is top header text color.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_ps_shopping_cart_item_total_price',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Total Price Color',
                    'desc' => 'This total price belongs to the summary area and is located right above the cart buttons. Default Color is top header text color.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_ps_shopping_cart_view_cart_button',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'View Cart Button',
                    'desc' => 'Design your cart button.',
                    'global' => 'on',
                    'markup' => '1_1',
                    'type' => 'button_builder_vc',
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_ps_shopping_cart_checkout_button',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Checkout Button',
                    'desc' => 'Design your checkout button.',
                    'global' => 'on',
                    'markup' => '1_1',
                    'type' => 'button_builder_vc',
                    'pages' => $post_type_support_2,
                ),
                
                /* optional hover state */
                array(
                    'id' => 'ut_subheadline_ps_hover_colors',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Hover State Colors',
                    'type' => 'sub_section_headline',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_ps_hover_state',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Add Hover State?',
                    'desc' => 'Add a hover state if you mouseover the header.',
                    'type' => 'select',
                    'global' => 'on',
                    'choices' => array(
                        array(
                            'value' => 'on',
                            'label' => 'Yes'
                        ),
                        array(
                            'value' => 'off',
                            'label' => 'No'
                        )
                    ),
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_header_ps_background_color_hover',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Header Background Color',
                    'type' => 'gradient_colorpicker',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch',
                        'ut_navigation_ps_hover_state' => 'on'
                    ),
                    'pages' => $post_type_support_2,
                ),
                array(
                    'id' => 'ut_header_ps_separator_border_color_hover',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Separator Border Color',
                    'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_header_top_layout' => 'style-4|style-5|style-6|style-7|style-9',
                        'ut_navigation_customskin_state' => 'on_switch',
                        'ut_navigation_ps_hover_state' => 'on'
                    ),
                    'pages' => $post_type_support_2,
                ),
                array(
                    'id' => 'ut_header_ps_hover_text_logo_color',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Text Logo Color',
                    'type' => 'colorpicker',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch',
                        'ut_navigation_ps_hover_state' => 'on'
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id' => 'ut_header_ps_hover_text_logo_color_hover',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Text Logo Color Hover',
                    'type' => 'colorpicker',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch',
                        'ut_navigation_ps_hover_state' => 'on'
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id' => 'ut_header_ps_border_color_hover',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Header Border Color',
                    'type' => 'colorpicker',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch',
                        'ut_navigation_ps_hover_state' => 'on'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_header_ps_shadow_color_hover',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Header Shadow Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch',
                        'ut_navigation_ps_hover_state' => 'on'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_ps_hover_fl_color',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'First Level Link Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch',
                        'ut_navigation_ps_hover_state' => 'on'
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id' => 'ut_navigation_ps_hover_fl_color_hover',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'First Level Link Color Hover',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch',
                        'ut_navigation_ps_hover_state' => 'on'
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id' => 'ut_navigation_ps_hover_fl_color_active',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'First Level Link Color Active',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch',
                        'ut_navigation_ps_hover_state' => 'on'
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id' => 'ut_navigation_ps_hover_fl_dot_color',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'First Level Dot Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch',
                        'ut_navigation_ps_hover_state' => 'on'
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id' => 'ut_navigation_ps_hover_fl_decoration_color',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Navigation First Level Animation Decoration Line Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch',
                        'ut_navigation_style' => 'animation-line',
                        'ut_navigation_ps_hover_state' => 'on'
                    ),
                    'pages' => $post_type_support_2,
                ),

	            array(
		            'id' => 'ut_navigation_ps_hover_fl_description_color',
		            'metapanel' => 'ut-header-color-settings',
		            'label' => 'Navigation First Level Description Color',
		            'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
		            'type' => 'colorpicker',
		            'mode' => 'rgb',
		            'global' => 'on',
		            'required' => array(
			            'ut_navigation_config' => 'off',
			            'ut_header_layout' => 'default',
			            'ut_navigation_skin' => 'ut-header-custom',
			            'ut_navigation_customskin_state' => 'on_switch',
			            'ut_navigation_ps_hover_state' => 'on'
		            ),
		            'pages' => $post_type_support_2,
	            ),

                /* Secondary Skin */
                array(
                    'id' => 'ut_navigation_customskin_secondary_settings_headline',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Content Skin (Secondary) Settings',
                    'desc' => 'Content Skin (Secondary) Settings',
                    'type' => 'section_headline',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_header_ss_text_logo_color',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Text Logo Color',
                    'desc' => 'Only applies if no Main Logo has been uploaded and set.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch'
                    ),
                    'pages' => $post_type_support_2,

                ),

                array(
                    'id' => 'ut_header_ss_text_logo_color_hover',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Text Logo Color Hover',
                    'desc' => 'Only applies if no main logo has been uploaded and set. ',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_subheadline_ss_header_colors',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Header Colors',
                    'type' => 'sub_section_headline',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_header_ss_background_color',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Background Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'gradient_colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch'
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                 array(
                    'id' => 'ut_header_ss_separator_border_color',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Separator Border Color',
                    'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_header_top_layout' => 'style-4|style-5|style-6|style-7|style-9',
                        'ut_navigation_customskin_state' => 'on_switch'
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id' => 'ut_header_ss_shadow_color',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Shadow Color',
                    'desc' => 'You can turn off the shadow by settings its opacity to 0. Simply use the adjustment bar on the right of the colorpicker.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_header_layout' => 'default',
                        'ut_navigation_config' => 'off',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch'
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id' => 'ut_header_ss_border_color',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Border Bottom Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_subheadline_ss_fl_colors',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Navigation First Level Colors',
                    'type' => 'sub_section_headline',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_ss_fl_color',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Link Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_ss_fl_color_hover',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Link Hover Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_ss_fl_dot_color',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Dot Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_ss_fl_active_color',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Active Link Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch'
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id' => 'ut_navigation_ss_fl_decoration_color',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Animation Decoration Line Color',
                    'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                    'type' => 'colorpicker',
                    'global' => 'on',
                    'mode' => 'rgb',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin'  => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch',
                        'ut_navigation_style' => 'animation-line'           
                    ),
                    'pages' => $post_type_support_2,
                ),

	            array(
		            'id' => 'ut_navigation_ss_fl_description_color',
		            'metapanel' => 'ut-header-color-settings',
		            'label' => 'Description Color',
		            'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
		            'type' => 'colorpicker',
		            'global' => 'on',
		            'mode' => 'rgb',
		            'required' => array(
			            'ut_navigation_config' => 'off',
			            'ut_header_layout' => 'default',
			            'ut_navigation_skin'  => 'ut-header-custom',
			            'ut_navigation_customskin_state' => 'on_switch',
		            ),
		            'pages' => $post_type_support_2,
	            ),
                
                array(
                    'id' => 'ut_subheadline_ss_sl_colors',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Navigation Sub Menu Colors',
                    'type' => 'sub_section_headline',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_ss_sl_background_color',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Background Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'gradient_colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_ss_sl_color',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Link Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch'
                    ),
                    'pages' => $post_type_support_2,
                ),
                array(
                    'id' => 'ut_navigation_ss_sl_color_hover',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Link Hover Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(

                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch'
                    ),
                    'pages' => $post_type_support_2,
                ),
                array(
                    'id' => 'ut_navigation_ss_sl_active_color',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Active Link Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_navigation_skin' => 'ut-header-custom',
                    ),
                    'pages' => $post_type_support_2,
                ),
                array(
					'id' => 'ut_navigation_ss_sl_animation_color',
					'metapanel' => 'ut-header-color-settings',
					'label' => 'Link Animation and Decoration Color',
					'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
					'type' => 'colorpicker',
					'mode' => 'rgb',
                    'global' => 'on',
					'required' => array(
						'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
						'ut_navigation_skin' => 'ut-header-custom',
						'ut_navigation_column_link_animation' => 'yes',
					),
					'pages' => $post_type_support_2,
				),
				array(
					'id' => 'ut_navigation_ss_megamenu_column_title_color',
					'metapanel' => 'ut-header-color-settings',
					'label' => 'Megamenu Column Title Color',
					'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
					'type' => 'colorpicker',
					'mode' => 'rgb',
                    'global' => 'on',
					'required' => array(
						'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
						'ut_navigation_skin' => 'ut-header-custom',
					),
					'pages' => $post_type_support_2,
				),
				array(
					'id' => 'ut_navigation_ss_megamenu_column_title_color_hover',
					'metapanel' => 'ut-header-color-settings',
					'label' => 'Megamenu Column Title Color Hover',
					'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
					'type' => 'colorpicker',
					'mode' => 'rgb',
                    'global' => 'on',
					'required' => array(
						'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
						'ut_navigation_skin' => 'ut-header-custom',
					),
					'pages' => $post_type_support_2,
				),
                array(
                    'id' => 'ut_navigation_ss_header_social_icons',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Social Icons',
                    'type' => 'sub_section_headline',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch'
                    ),
                    'pages' => $post_type_support_2,
                ),
                array(
                    'id' => 'ut_navigation_ss_header_social_icons_color',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Social Icons Color',
                    'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch'
                    ),
                    'pages' => $post_type_support_2,
                ),
                array(
                    'id' => 'ut_navigation_ss_header_social_icons_color_hover',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Social Icons Color',
                    'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch'
                    ),
                    'pages' => $post_type_support_2,
                ),
                array(
                    'id' => 'ut_navigation_ss_sl_border_settings',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Sub Menu Border and Shadow Settings',
                    'type' => 'sub_section_inline_headline',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch'
                    ),
                    'pages' => $post_type_support_2,
                ),
                array(
                    'id' => 'ut_navigation_ss_sl_border_color',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Border Top Color',
                    'desc' => 'Only applies if primary skin has an active border setting.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch'
                    ),
                    'pages' => $post_type_support_2,
                ),
				array(
                    'id' => 'ut_navigation_ss_sl_borders',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Remaining Borders',
                    'desc' => 'Individually Border Right, Left and Bottom Colors. Only applies if primary skin has active border setting.',
                    'type' => 'border',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch'
                    ),
                    'pages' => $post_type_support_2,
                ),
                array(
                    'id' => 'ut_navigation_ss_sl_mm_border',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Mega Menu Column Border',
                    'type' => 'border',
                    'markup' => '1_1',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch'
                    )
                ),
                array(
                    'id' => 'ut_navigation_ss_sl_shadow_color',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Shadow Color',
                    'desc' => 'You can turn off the shadow by settings its opacity to 0. Simply use the adjustment bar on the right of the colorpicker.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch'
                    ),
                    'pages' => $post_type_support_2,
                ),
                
				
				// Header Mini Cart
                array(
                    'id' => 'ut_navigation_ss_shopping_cart_headline',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Woocommerce Mini Shopping Cart',
                    'desc' => 'Woocommerce Mini Shopping Cart',
                    'type' => 'section_headline',
                    'collapse' => 'close',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_ss_shopping_cart_count_color',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Item Count Color',
                    'desc' => 'Default Color is white. The counter is located right next to the shopping cart icon.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_ss_shopping_cart_count_background',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Item Count Background Color',
                    'desc' => 'Default Color is theme accent color. The counter is located right next to the shopping cart icon.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_ss_shopping_cart_item_delete_color',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Item Delete Color',
                    'desc' => 'Creates a separator between cart items.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_ss_shopping_cart_item_delete_hover_color',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Item Delete Hover Color',
                    'desc' => 'Creates a separator between cart items.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_ss_shopping_cart_item_separator',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Item Separator',
                    'desc' => 'Creates a separator between cart items.',
                    'type' => 'border',
                    'markup' => '1_1',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_ss_shopping_cart_scrollbar',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Cart Scrollbar Color',
                    'desc' => 'If more than 3 items have been placed inside the cart, a scrollbar will automatically appear.',
                    'type' => 'colorpicker',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_ss_shopping_cart_summary_background',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Shopping Cart Summary Background Color',
                    'desc' => 'The Summary Area of the mini shopping cart contains the total number of items in your cart and the total price of all items. Additionally 2 Buttons are displaying allowing the user to view his cart on a single page or directly browse to the checkout page. Giving this area a background color will visually separate the summary from the cart items.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch'
                    ),
                    'pages' => $post_type_support_2,
                ),            

                array(
                    'id' => 'ut_navigation_ss_shopping_cart_item_total_count',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Total Item Count Color',
                    'desc' => 'This total count belongs to the summary area and is located right above the cart buttons. Default Color is top header text color.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_ss_shopping_cart_item_total_price',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Total Price Color',
                    'desc' => 'This total price belongs to the summary area and is located right above the cart buttons. Default Color is top header text color.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch'
                    ),
                    'pages' => $post_type_support_2,
                ),

                /*
                |--------------------------------------------------------------------------
                | Special Side Navigation Options 
                |--------------------------------------------------------------------------
                */
                array(
                    'id' => 'ut_subheadline_sh_form_colors',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Search Form Colors',
                    'type' => 'sub_section_headline',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'side',
                        'ut_navigation_skin' => 'ut-header-custom',
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_side_header_search_form_icon_color',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Search Form Icon Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'side',
                        'ut_navigation_skin' => 'ut-header-custom'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_side_header_search_form_background_color',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Search Form Background Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'side',
                        'ut_navigation_skin' => 'ut-header-custom'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_side_header_search_form_border_color',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Search Form Border Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'side',
                        'ut_navigation_skin' => 'ut-header-custom'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_side_header_search_form_placeholder_color',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Search Form Placeholder Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'side',
                        'ut_navigation_skin' => 'ut-header-custom'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_side_header_search_form_background_focus_color',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Search Form Background Focus Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'side',
                        'ut_navigation_skin' => 'ut-header-custom'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_side_header_search_form_border_focus_color',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Search Form Border Focus Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'side',
                        'ut_navigation_skin' => 'ut-header-custom'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_side_header_search_form_placeholder_focus_color',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Search Form Placeholder Focus Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'side',
                        'ut_navigation_skin' => 'ut-header-custom'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_subheadline_sh_si_colors',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Social Icons Colors',
                    'type' => 'sub_section_headline',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'side',
                        'ut_navigation_skin' => 'ut-header-custom',
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_side_header_social_icon_color',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Icon Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'side',
                        'ut_navigation_skin' => 'ut-header-custom'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_side_header_social_icon_color_hover',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Icon Hover Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'side',
                        'ut_navigation_skin' => 'ut-header-custom'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_side_header_social_icons_border_color',
                    'metapanel' => 'ut-header-color-settings',
                    'label' => 'Border Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'side',
                        'ut_navigation_skin' => 'ut-header-custom'
                    ),
                    'pages' => $post_type_support_2,
                ),






                /**
                 * Page / Section Switch - ( Deprecated )
                 */

                array(
                    'id' => 'ut_page_type',
                    'type' => 'radio_group_button',
                    'label' => 'Page Type',
                    'metapanel' => 'ut-color-settings',
                    'std' => 'page',
                    'choices' => array(
                        array(
                            'label' => 'Use Page as Regular Page',
                            'for' => array(),
                            'value' => 'page'
                        ),
                        array(
                            'label' => 'Use Page as Section',
                            'for' => array(),
                            'value' => 'section'
                        ),
                    ),
                    'pages' => $post_type_support_2,
                ),


                /**
                 * Team Management - ( Deprecated )
                 */

                array(
                    'id' => 'ut_manage_team_headline',
                    'metapanel' => 'ut-manage-team',
                    'label' => 'Team Member Settings',
                    'type' => 'panel_headline',
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_manage_team_info',
                    'metapanel' => 'ut-manage-team',
                    'label' => 'Global Hero Caption',
                    'desc' => 'The template based team Management is deprecated since 4.0 but is still supported in the future. We recommend to use the new Visual Composer Team Member Boxes.',
                    'type' => 'section_headline_info',
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_member_in_row',
                    'metapanel' => 'ut-manage-team',
                    'label' => 'Member per row.',
                    'desc' => 'Display up to 4 Members in a row.',
                    'type' => 'select',
                    'std' => 'three',
                    'section_class' => 'ut-team-section',
                    'choices' => array(
                        array(
                            'label' => '1',
                            'value' => 'one'
                        ),
                        array(
                            'label' => '2',
                            'value' => 'two'
                        ),
                        array(
                            'label' => '3',
                            'value' => 'three'
                        ),
                        array(
                            'label' => '4',
                            'value' => 'four'
                        )

                    ),

                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_member_box_layout',
                    'metapanel' => 'ut-manage-team',
                    'label' => 'Member Style',
                    'desc' => 'Choose between 4 different member box styles.',
                    'section_class' => 'ut-team-section',
                    'type' => 'select',
                    'choices' => array(
                        array(
                            'label' => 'Style One',
                            'value' => 'style_one'
                        ),
                        array(
                            'label' => 'Style Two',
                            'value' => 'style_two'
                        ),
                        array(
                            'label' => 'Style Three',
                            'value' => 'style_three'
                        ),
                        array(
                            'label' => 'Style Four',
                            'value' => 'style_four'
                        )
                    ),
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_team_member',
                    'metapanel' => 'ut-manage-team',
                    'label' => 'Manager your Team Members',
                    'desc' => '<strong>You can re-order with drag & drop, the order will update after saving.</strong>',
                    'type' => 'list-item',
                    'markup' => '1_1',
                    'section_class' => 'ut-team-section',
                    'settings' => array(
                        array(
                            'label' => 'Upload',
                            'id' => 'ut_member_pic',
                            'type' => 'upload',
                            'desc' => 'Member Avatar. Should be at least 560px x 420px.',
                        ),
                        array(
                            'label' => 'Upload',
                            'id' => 'ut_member_pic_alt',
                            'type' => 'upload',
                            'desc' => 'Alternate Member Avatar ( only for style four ). Should be at least 560px x 420px.',
                        ),
                        array(
                            'label' => 'Member Name',
                            'id' => 'ut_member_name',
                            'type' => 'text',
                        ),
                        array(
                            'label' => 'Member Title',
                            'id' => 'ut_member_title',
                            'type' => 'text',
                            'class' => ''
                        ),
                        array(
                            'label' => 'Description',
                            'id' => 'ut_member_description',
                            'type' => 'textarea-simple',
                            'desc' => 'this field also accepts shortcodes, for example skillbar shortcode',
                            'std' => '',
                            'rows' => '5',
                            'post_type' => '',
                            'taxonomy' => '',
                            'class' => ''
                        ),
                        array(
                            'label' => 'Member Email',
                            'id' => 'ut_member_email',
                            'type' => 'text',
                            'class' => ''
                        ),
                        array(
                            'label' => 'Member Website',
                            'id' => 'ut_member_website',
                            'type' => 'text',
                            'class' => ''
                        ),
                        array(
                            'label' => 'Facebook',
                            'id' => 'ut_member_facebook',
                            'type' => 'text',
                            'class' => ''
                        ),
                        array(
                            'label' => 'Twitter',
                            'id' => 'ut_member_twitter',
                            'type' => 'text',
                            'class' => ''
                        ),
                        array(
                            'label' => 'Google',
                            'id' => 'ut_member_google',
                            'type' => 'text',
                            'class' => ''
                        ),
                        array(
                            'label' => 'Github',
                            'id' => 'ut_member_github',
                            'type' => 'text',
                            'class' => ''
                        ),
                        array(
                            'label' => 'Skype',
                            'id' => 'ut_member_skype',
                            'type' => 'text',
                            'class' => ''
                        ),
                        array(
                            'label' => 'Dribbble',
                            'id' => 'ut_member_dribbble',
                            'type' => 'text',
                            'class' => ''
                        ),
                        array(
                            'label' => 'Dropbox',
                            'id' => 'ut_member_dropbox',
                            'type' => 'text',
                            'class' => ''
                        ),
                        array(
                            'label' => 'Flickr',
                            'id' => 'ut_member_flickr',
                            'type' => 'text',
                            'class' => ''
                        ),
                        array(
                            'label' => 'Xing',
                            'id' => 'ut_member_xing',
                            'type' => 'text',
                            'class' => ''
                        ),
                        array(
                            'label' => 'Youtube',
                            'id' => 'ut_member_youtube',
                            'type' => 'text',
                            'class' => ''
                        ),
                        array(
                            'label' => 'Vimeo',
                            'id' => 'ut_member_vimeo',
                            'type' => 'text',
                            'class' => ''
                        ),
                        array(
                            'label' => 'LinkedIn',
                            'id' => 'ut_member_linkedin',
                            'type' => 'text',
                            'class' => ''
                        ),
                        array(
                            'label' => 'Instagram',
                            'id' => 'ut_member_instagram',
                            'type' => 'text',
                            'class' => ''
                        ),
                    ),
                    'class' => 'ut-team-manager',
                    'pages' => $post_type_support_4,
                ),





                /**
                 *  Section Settings ( Deprecated )
                 */

                array(
                    'id' => 'ut_section_settings',
                    'metapanel' => 'ut-section-settings',
                    'label' => 'Section Settings',
                    'type' => 'panel_headline',
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_section_width',
                    'metapanel' => 'ut-section-settings',
                    'label' => 'Section Style',
                    'type' => 'select',
                    'desc' => 'Decide if your content is centered or full width. For regular content we recommend to use the "Centered Content" option and for Portfolios or Google Maps the "Full Width Content". If you use "Split Section" please use the featured image to display a poster image. This poster image is always located next to the content (left or right depending on "Split Content Align").',
                    'choices' => array(
                        array(
                            'label' => 'Centered Content',
                            'value' => 'centered'
                        ),
                        array(
                            'label' => 'Full Width Content',
                            'value' => 'fullwidth'
                        ),
                        array(
                            'label' => 'Split Content',
                            'value' => 'split'
                        )
                    ),
                    'std' => 'centered',
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_split_content_align',
                    'metapanel' => 'ut-section-settings',
                    'label' => 'Split Content Align',
                    'type' => 'select',
                    'choices' => array(
                        array(
                            'label' => 'left',
                            'value' => 'left'
                        ),
                        array(
                            'label' => 'right',
                            'value' => 'right'
                        )
                    ),
                    'std' => 'right',
                    'required' => array(
                        'ut_section_width' => 'split',
                    ),
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_split_section_margin_top',
                    'metapanel' => 'ut-section-settings',
                    'label' => 'Split Section Margin Top',
                    'desc' => '<strong>(optional)</strong> -  include "px" in your string. e.g. 150px (default : 140px)',
                    'type' => 'text',
                    'required' => array(
                        'ut_section_width' => 'split'
                    ),
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_split_section_margin_bottom',
                    'metapanel' => 'ut-section-settings',
                    'label' => 'Split Section Margin Bottom',
                    'desc' => '<strong>(optional)</strong> -  include "px" in your string. e.g. 130px (default : 70px)',
                    'type' => 'text',
                    'required' => array(
                        'ut_section_width' => 'split'
                    ),
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_section_shadow',
                    'metapanel' => 'ut-section-settings',
                    'label' => 'Section Shadow',
                    'type' => 'select',
                    'desc' => 'Creates a smooth shadow for this section.',
                    'choices' => array(
                        array(
                            'label' => 'On',
                            'value' => 'on'
                        ),
                        array(
                            'label' => 'Off',
                            'value' => 'off'
                        )
                    ),
                    'std' => 'off',
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_section_padding_top',
                    'metapanel' => 'ut-section-settings',
                    'label' => 'Section Padding Top',
                    'desc' => '<strong>(optional)</strong> -  include "px" in your string. e.g. 150px (default : 80px)',
                    'type' => 'text',
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_section_padding_bottom',
                    'metapanel' => 'ut-section-settings',
                    'label' => 'Section Padding Bottom',
                    'desc' => '<strong>(optional)</strong> -  include "px" in your string. e.g. 130px (default : 60px)',
                    'type' => 'text',
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_section_border_top',
                    'metapanel' => 'ut-section-settings',
                    'label' => 'Activate Section Border at Top?',
                    'type' => 'select',
                    'choices' => array(
                        array(
                            'label' => 'yes, please!',
                            'value' => 'on'
                        ),
                        array(
                            'label' => 'no, thanks!',
                            'value' => 'off'
                        )
                    ),
                    'std' => 'off',
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_section_border_top_color',
                    'metapanel' => 'ut-section-settings',
                    'label' => 'Section Border Top Color',
                    'type' => 'colorpicker',
                    'desc' => '<strong>(optional)</strong>',
                    'required' => array(
                        'ut_section_border_top' => 'on'
                    ),
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_section_border_top_width',
                    'metapanel' => 'ut-section-settings',
                    'label' => 'Section Border Top Width',
                    'desc' => '<strong>(optional)</strong>',
                    'type' => 'numeric-slider',
                    'min_max_step' => '1,100',
                    'required' => array(
                        'ut_section_border_top' => 'on'
                    ),
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_section_border_top_style',
                    'metapanel' => 'ut-section-settings',
                    'label' => 'Section Border Top Style',
                    'desc' => 'Option for setting the line style.',
                    'type' => 'select',
                    'choices' => array(
                        array(
                            'label' => 'dashed',
                            'value' => 'dashed'
                        ),
                        array(
                            'label' => 'dotted',
                            'value' => 'dotted'
                        ),
                        array(
                            'label' => 'solid',
                            'value' => 'solid'
                        ),
                        array(
                            'label' => 'double',
                            'value' => 'double'
                        )
                    ),
                    'std' => 'solid',
                    'required' => array(
                        'ut_section_border_top' => 'on'
                    ),
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_section_border_bottom',
                    'metapanel' => 'ut-section-settings',
                    'label' => 'Activate Section Border at Bottom?',
                    'type' => 'select',
                    'toplevel' => false,
                    'choices' => array(
                        array(
                            'label' => 'yes, please!',
                            'value' => 'on'
                        ),
                        array(
                            'label' => 'no, thanks!',
                            'value' => 'off'
                        )
                    ),
                    'std' => 'off',
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_section_border_bottom_color',
                    'metapanel' => 'ut-section-settings',
                    'label' => 'Section Border Bottom Color',
                    'type' => 'colorpicker',
                    'desc' => '<strong>(optional)</strong>',
                    'required' => array(
                        'ut_section_border_bottom' => 'on'
                    ),
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_section_border_bottom_width',
                    'metapanel' => 'ut-section-settings',
                    'label' => 'Section Border Bottom Width',
                    'desc' => '<strong>(optional)</strong>',
                    'type' => 'numeric-slider',
                    'min_max_step' => '1,100',
                    'required' => array(
                        'ut_section_border_bottom' => 'on'
                    ),
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_section_border_bottom_style',
                    'metapanel' => 'ut-section-settings',
                    'label' => 'Section Border Bottom Style',
                    'desc' => 'Option for setting the line style.',
                    'type' => 'select',
                    'choices' => array(
                        array(
                            'label' => 'dashed',
                            'value' => 'dashed'
                        ),
                        array(
                            'label' => 'dotted',
                            'value' => 'dotted'
                        ),
                        array(
                            'label' => 'solid',
                            'value' => 'solid'
                        ),
                        array(
                            'label' => 'double',
                            'value' => 'double'
                        )
                    ),
                    'std' => 'solid',
                    'required' => array(
                        'ut_section_border_bottom' => 'on'
                    ),
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_section_fancy_border',
                    'metapanel' => 'ut-section-settings',
                    'label' => 'Activate Section Fancy Border',
                    'type' => 'select',
                    'choices' => array(
                        array(
                            'label' => 'yes, please!',
                            'value' => 'on'
                        ),
                        array(
                            'label' => 'no, thanks!',
                            'value' => 'off'
                        )
                    ),
                    'std' => 'off',
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_section_fancy_border_color',
                    'metapanel' => 'ut-section-settings',
                    'label' => 'Color',
                    'type' => 'colorpicker',
                    'desc' => '<strong>(optional)</strong>',
                    'required' => array(
                        'ut_section_fancy_border' => 'on'
                    ),
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_section_fancy_border_background_color',
                    'metapanel' => 'ut-section-settings',
                    'label' => 'Background Color',
                    'type' => 'colorpicker',
                    'desc' => '<strong>(optional)</strong>',
                    'required' => array(
                        'ut_section_fancy_border' => 'on'
                    ),
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_section_fancy_border_size',
                    'metapanel' => 'ut-section-settings',
                    'label' => 'Size',
                    'desc' => '<strong>(optional)</strong> -  include "px" in your string. e.g. 30px (default: 10px)',
                    'type' => 'text',
                    'required' => array(
                        'ut_section_fancy_border' => 'on'
                    ),
                    'pages' => $post_type_support_4,
                ),

                /**
                 * Section Parallax
                 */

                array(
                    'id' => 'ut_parallax_section_head',
                    'metapanel' => 'ut-section-parallax-settings',
                    'label' => 'Parallax Settings',
                    'type' => 'panel_headline',
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_parallax_section',
                    'metapanel' => 'ut-section-parallax-settings',
                    'label' => 'Parallax',
                    'desc' => 'Parallax involves the background moving at a slower rate to the foreground, creating a 3D effect as you scroll down the page.',
                    'type' => 'select',
                    'choices' => array(
                        array(
                            'label' => 'Off',
                            'value' => 'off'
                        ),
                        array(
                            'label' => 'On',
                            'value' => 'on'
                        )
                    ),
                    'std' => 'off',
                    'class' => 'ut-section-parallax-state',
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_parallax_image',
                    'metapanel' => 'ut-section-parallax-settings',
                    'label' => 'Upload Section Background Image',
                    'desc' => 'Keep in mind, that you are not able to set a background position or attachment if the parallax option above has been set to "on".',
                    'markup' => '1_1',
                    'type' => 'background',
                    'section_class' => 'ut-section-parallax-opt',
                    'pages' => $post_type_support_4,
                ),

                /**
                 * Section Video
                 */

                array(
                    'id' => 'ut_section_video_state',
                    'metapanel' => 'ut-section-video-settings',
                    'label' => 'Section Video Settings',
                    'type' => 'panel_headline',
                    'section_class' => 'ut-settings-heading',
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_section_video_state',
                    'metapanel' => 'ut-section-video-settings',
                    'label' => 'Activate Section Background Video?',
                    'desc' => 'Keep in mind, that video backgrounds do not support parallax effects, please deactivate the parallax option before. Activating the background video will also overwrite the section background settings like color and image.',
                    'type' => 'select',
                    'choices' => array(
                        array(
                            'label' => 'yes, please!',
                            'value' => 'on'
                        ),
                        array(
                            'label' => 'no, thanks!',
                            'value' => 'off'
                        )
                    ),
                    'std' => 'off',
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_section_video_source',
                    'metapanel' => 'ut-section-video-settings',
                    'label' => 'Video Source',
                    'desc' => 'Select your desired source for videos.',
                    'type' => 'select',
                    'std' => 'youtube',
                    'choices' => array(
                        array(
                            'value' => 'youtube',
                            'label' => 'Youtube'
                        ),
                        array(
                            'value' => 'selfhosted',
                            'label' => 'Selfthosted'
                        )
                    ),
                    'required' => array(
                        'ut_section_video_state' => 'on'
                    ),
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_section_video',
                    'metapanel' => 'ut-section-video-settings',
                    'label' => 'Video URL',
                    'desc' => 'Please insert the url only e.g. http://youtu.be/gvt_YFuZ8LA . Please do not insert the complete embedded code!',
                    'type' => 'text',
                    'required' => array(
                        'ut_section_video_state' => 'on',
                        'ut_section_video_source' => 'youtube'
                    ),
                    'pages' => $post_type_support_4,
                ),
            
                array(
                    'id' => 'ut_section_video_mp4',
                    'metapanel' => 'ut-section-video-settings',
                    'label' => 'MP4',
                    'desc' => 'In HTML5, there are 3 supported video formats: MP4, WebM, and Ogg. Please make sure you provide all 3 file types to grant best browser support.',
                    'type' => 'upload',
                    'required' => array(
                        'ut_section_video_state' => 'on',
                        'ut_section_video_source' => 'selfhosted'
                    ),
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_section_video_ogg',
                    'metapanel' => 'ut-section-video-settings',
                    'label' => 'OGG',
                    'desc' => 'In HTML5, there are 3 supported video formats: MP4, WebM, and Ogg. Please make sure you provide all 3 file types to grant best browser support.',
                    'type' => 'upload',
                    'required' => array(
                        'ut_section_video_state' => 'on',
                        'ut_section_video_source' => 'selfhosted'
                    ),
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_section_video_webm',
                    'metapanel' => 'ut-section-video-settings',
                    'label' => 'WEBM',
                    'desc' => 'In HTML5, there are 3 supported video formats: MP4, WebM, and Ogg. Please make sure you provide all 3 file types to grant best browser support.',
                    'type' => 'upload',
                    'required' => array(
                        'ut_section_video_state' => 'on',
                        'ut_section_video_source' => 'selfhosted'
                    ),
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_section_video_loop',
                    'metapanel' => 'ut-section-video-settings',
                    'label' => 'Loop Video',
                    'desc' => 'Whether the video should start over again when finished.',
                    'type' => 'select',
                    'choices' => array(
                        array(
                            'label' => 'yes, please!',
                            'value' => 'on'
                        ),
                        array(
                            'label' => 'no, thanks!',
                            'value' => 'off'
                        )
                    ),
                    'std' => 'on',
                    'required' => array(
                        'ut_section_video_state' => 'on'
                    ),
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_section_video_preload',
                    'metapanel' => 'ut-section-video-settings',
                    'label' => 'Preload Video',
                    'desc' => 'Whether the video should be loaded when the page loads.',
                    'type' => 'select',
                    'choices' => array(
                        array(
                            'label' => 'yes, please!',
                            'value' => 'on'
                        ),
                        array(
                            'label' => 'no, thanks!',
                            'value' => 'off'
                        )
                    ),
                    'std' => 'on',
                    'required' => array(
                        'ut_section_video_state' => 'on',
                        'ut_section_video_source' => 'selfhosted'
                    ),
                    'pages' => $post_type_support_4,
                ),
                
                array(
                    'id' => 'ut_section_video_sound',
                    'metapanel' => 'ut-section-video-settings',
                    'label' => 'Activate video sound after page is loaded?',
                    'desc' => '<strong>(optional)</strong>. Play sound directly when page is loaded.',
                    'std' => 'off',
                    'type' => 'select',
                    'choices' => array(
                        array(
                            'value' => 'on',
                            'label' => 'yes, please!'
                        ),
                        array(
                            'value' => 'off',
                            'label' => 'no, thanks!'
                        )
                    ),
                    'required' => array(
                        'ut_section_video_state' => 'on'
                    ),
                    'pages' => $post_type_support_4,
                ),
                
                array(
                    'id' => 'ut_section_video_volume',
                    'metapanel' => 'ut-section-video-settings',
                    'label' => 'Video Volume',
                    'desc' => '1-100 - default 5',
                    'std' => '5',
                    'type' => 'numeric-slider',
                    'min_max_step' => '0,100,1',
                    'required' => array(
                        'ut_section_video_state' => 'on'
                    ),
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_section_video_mute_button',
                    'metapanel' => 'ut-section-video-settings',
                    'label' => 'Show Mute Button?',
                    'desc' => 'Whether the video mute button is displayed or not.',
                    'type' => 'select',
                    'choices' => array(
                        array(
                            'label' => 'yes, please!',
                            'value' => 'on'
                        ),
                        array(
                            'label' => 'no, thanks!',
                            'value' => 'off'
                        )
                    ),
                    'std' => 'off',
                    'required' => array(
                        'ut_section_video_state' => 'on'
                    ),
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_section_video_poster',
                    'metapanel' => 'ut-section-video-settings',
                    'label' => 'Poster Image',
                    'desc' => 'This image will be displayed instead of the video on mobile devices.',
                    'type' => 'upload',
                    'required' => array(
                        'ut_section_video_state' => 'on'
                    ),
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_section_video_bgcolor',

                    'metapanel' => 'ut-section-video-settings',
                    'label' => 'Background Color',
                    'type' => 'colorpicker',
                    'desc' => '<strong>(optional)</strong>. If you do not wish to use a poster image on mobile devices, you can use a background color as well.',
                    'required' => array(
                        'ut_section_video_state' => 'on'
                    ),
                    'pages' => $post_type_support_4,
                ),

                /**
                 * Section Overlay
                 */

                array(
                    'id' => 'ut_overlay_setting',
                    'metapanel' => 'ut-section-overlay-settings',
                    'label' => 'Overlay Settings',
                    'type' => 'panel_headline',
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_overlay_section',
                    'metapanel' => 'ut-section-overlay-settings',
                    'label' => 'Overlay',
                    'desc' => '<strong>(optional)</strong> A smooth overlay with optional design patterns.',
                    'type' => 'select',
                    'choices' => array(
                        array(
                            'label' => 'On',
                            'value' => 'on'
                        ),
                        array(
                            'label' => 'Off',
                            'value' => 'off'
                        )
                    ),
                    'std' => 'off',
                    'class' => 'ut-section-overlay-state',
                    'section_class' => 'ut-section-parallax-opt',
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_overlay_pattern',
                    'metapanel' => 'ut-section-overlay-settings',
                    'label' => 'Overlay Pattern',
                    'desc' => 'Add overlay design pattern.',
                    'section_class' => 'ut-section-overlay-opt',
                    'type' => 'select',
                    'choices' => array(
                        array(
                            'label' => 'On',
                            'value' => 'on'
                        ),
                        array(
                            'label' => 'Off',
                            'value' => 'off'
                        )
                    ),
                    'std' => 'off',
                    'section_class' => 'ut-section-parallax-opt ut-section-overlay-opt',
                    'required' => array(
                        'ut_overlay_section' => 'on'
                    ),
                    'pages' => $post_type_support_4,
                ),
                array(
                    'id' => 'ut_overlay_pattern_style',
                    'metapanel' => 'ut-section-overlay-settings',
                    'label' => 'Overlay Pattern Style',
                    'desc' => '<strong>(optional)</strong>',
                    'section_class' => 'ut-section-overlay-opt',
                    'type' => 'select',
                    'choices' => array(
                        array(
                            'label' => 'Style One',
                            'value' => 'style_one'
                        ),
                        array(
                            'label' => 'Style Two',
                            'value' => 'style_two'
                        ),
                        array(
                            'label' => 'Style Three',
                            'value' => 'style_three'
                        ),
	                    array(
		                    'value' => 'style_four',
		                    'label' => 'Style Four (Circuit Board)'
	                    )
                    ),
                    'std' => 'style_one',
                    'rows' => '',
                    'class' => '',
                    'section_class' => 'ut-section-parallax-opt ut-section-overlay-opt',
                    'required' => array(
                        'ut_overlay_section' => 'on',
                        'ut_overlay_pattern' => 'on'
                    ),
                    'pages' => $post_type_support_4,
                ),
                array(
                    'id' => 'ut_overlay_color',
                    'metapanel' => 'ut-section-overlay-settings',
                    'label' => 'Section Overlay Color',
                    'type' => 'colorpicker',
                    'section_class' => 'ut-section-overlay-opt',
                    'desc' => '<strong>(optional)</strong>',
                    'section_class' => 'ut-section-parallax-opt ut-section-overlay-opt',
                    'required' => array(
                        'ut_overlay_section' => 'on'
                    ),
                    'pages' => $post_type_support_4,
                ),
                array(
                    'id' => 'ut_overlay_color_opacity',
                    'metapanel' => 'ut-section-overlay-settings',
                    'label' => 'Overlay Color Opacity',
                    'section_class' => 'ut-section-overlay-opt',
                    'type' => 'numeric-slider',
                    'min_max_step' => '0,1,0.1',
                    'section_class' => 'ut-section-parallax-opt ut-section-overlay-opt',
                    'required' => array(
                        'ut_overlay_section' => 'on'
                    ),
                    'pages' => $post_type_support_4,
                ),

                /**
                 * Portfolio Onpage Settings
                 */
				
				array(
                    'id' => 'ut_onpage_portfolio_setting',
                    'metapanel' => 'ut-onpage-portfolio-settings',
                    'label' => 'Portfolio Settings',
                    'type' => 'panel_headline',
                    'pages' => $post_type_support_3,
                ),				
				array(
                    'id' => 'ut_onpage_portfolio_media_type',
                    'metapanel' => 'ut-onpage-portfolio-settings',
					'desc' => 'Choose your desired portfolio type.',
                    'label' => 'Choose Portfolio Media Type',
                    'type' => 'select',
					'choices' => array(
                        array(
                            'value' => '',
                            'label' => 'Select Portfolio Media Type',
                        ),
						array(
                            'value' => 'image',
                            'label' => 'Image',
                        ),
                        array(
                            'value' => 'gallery',
                            'label' => 'Gallery'
                        ),
                        array(
                            'value' => 'video',
                            'label' => 'Video'
                        )
                    ),
                    'pages' => $post_type_support_3,
                ),				
				array(
                    'id' => 'ut_onpage_portfolio_image',
                    'metapanel' => 'ut-onpage-portfolio-settings',
                    'desc' => 'Upload your portfolio image. If left empty, the featured image will be used as fallback.',
					'label' => 'Portfolio Item Image',
                    'type' => 'upload',
					'required' => array(
                        'ut_onpage_portfolio_media_type' => 'image'
                    ),
                    'pages' => $post_type_support_3,
                ),								
				array(
                    'id' => 'ut_onpage_portfolio_gallery',
                    'metapanel' => 'ut-onpage-portfolio-settings',
					'desc' => 'Upload your portfolio images.',
                    'label' => 'Portfolio Item Gallery',
                    'type' => 'gallery',
					'max' => '999',
					'required' => array(
                        'ut_onpage_portfolio_media_type' => 'gallery'
                    ),
                    'pages' => $post_type_support_3,
                ),
				array(
                    'id' => 'ut_onpage_portfolio_video_source',
                    'metapanel' => 'ut-onpage-portfolio-settings',
                    'label' => 'Video Source',
                    'desc' => 'Select your desired source for videos.',
                    'type' => 'select',
                    'std' => 'youtube',
                    'choices' => array(
                        array(
                            'value' => 'youtube',
                            'label' => 'Youtube'
                        ),
                        array(
                            'value' => 'vimeo',
                            'label' => 'Vimeo'
                        ),
                        array(
                            'value' => 'selfhosted',
                            'label' => 'Selfthosted'
                        ),
                        array(
                            'value' => 'custom',
                            'label' => 'Custom'
                        )
                    ),
                    'required' => array(
                        'ut_onpage_portfolio_media_type' => 'video'
                    ),
                    'pages' => $post_type_support_3,
                ),
				array(
                    'id' => 'ut_onpage_portfolio_video_youtube',
                    'metapanel' => 'ut-onpage-portfolio-settings',
                    'label' => 'Video URL',
                    'desc' => 'Please insert the url only e.g. http://youtu.be/gvt_YFuZ8LA . Please do not insert the complete embedded code!',
                    'type' => 'text',
                    'required' => array(
                        'ut_onpage_portfolio_media_type'   => 'video',
						'ut_onpage_portfolio_video_source' => 'youtube'
                    ),
                    'pages' => $post_type_support_3,
                ),
				array(
                    'id' => 'ut_onpage_portfolio_video_vimeo',
                    'metapanel' => 'ut-onpage-portfolio-settings',
                    'label' => 'Video URL',
                    'desc' => 'Please insert the url only e.g.  . Please do not insert the complete embedded code!',
                    'type' => 'text',
                    'required' => array(
                        'ut_onpage_portfolio_media_type'   => 'video',
						'ut_onpage_portfolio_video_source' => 'vimeo'
                    ),
                    'pages' => $post_type_support_3,
                ),                
                array(
                    'id' => 'ut_onpage_portfolio_video_custom',
                    'metapanel' => 'ut-onpage-portfolio-settings',
                    'label' => 'Video Embedded Code',
                    'desc' => 'Please insert the complete embedded code of your favorite video hoster!',
                    'type' => 'textarea-simple',
                    'required' => array(
                        'ut_onpage_portfolio_media_type'   => 'video',
						'ut_onpage_portfolio_video_source' => 'custom'
                    ),
                    'pages' => $post_type_support_3,
                ),
                array(
                    'id' => 'ut_onpage_portfolio_video_mp4',
                    'metapanel' => 'ut-onpage-portfolio-settings',
                    'label' => 'MP4',
                    'desc' => 'In HTML5, there are 3 supported video formats: MP4, WebM, and Ogg. Please make sure you provide all 3 file types to grant best browser support.',
                    'type' => 'upload',
                    'required' => array(
                        'ut_onpage_portfolio_media_type' => 'video',
						'ut_onpage_portfolio_video_source' => 'selfhosted'
                    ),
                    'pages' => $post_type_support_3,
                ),
                array(
                    'id' => 'ut_onpage_portfolio_video_ogg',
                    'metapanel' => 'ut-onpage-portfolio-settings',
                    'label' => 'OGG',
                    'desc' => 'In HTML5, there are 3 supported video formats: MP4, WebM, and Ogg. Please make sure you provide all 3 file types to grant best browser support.',
                    'type' => 'upload',
                    'required' => array(
                        'ut_onpage_portfolio_media_type' => 'video',
						'ut_onpage_portfolio_video_source' => 'selfhosted'
                    ),
                    'pages' => $post_type_support_3,
                ),
                array(
                    'id' => 'ut_onpage_portfolio_video_webm',
                    'metapanel' => 'ut-onpage-portfolio-settings',
                    'label' => 'WEBM',
                    'desc' => 'In HTML5, there are 3 supported video formats: MP4, WebM, and Ogg. Please make sure you provide all 3 file types to grant best browser support.',
                    'type' => 'upload',
                    'required' => array(
                        'ut_onpage_portfolio_media_type' => 'video',
						'ut_onpage_portfolio_video_source' => 'selfhosted'
                    ),
                    'pages' => $post_type_support_3,
                ),

                /**
                 * Portfolio Showcase Settings
                 */

                array(
                    'id' => 'ut_portfolio_showcase_setting',
                    'metapanel' => 'ut-portfolio-hover-settings',
                    'label' => 'Portfolio Hover Settings',
                    'type' => 'panel_headline',
                    'pages' => $post_type_support_3,
                ),

                array(
                    'id' => 'ut_portfolio_showcase_setting_info',
                    'metapanel' => 'ut-portfolio-hover-settings',
                    'label' => 'Portfolio Hover Settings',
                    'desc' => 'Within this settings tab, you can manually overwrite your showcase color settings and add some features which indiviudally apply only to this portfolio item inside the showcase.',
                    'type' => 'section_headline_info',
                    'pages' => $post_type_support_3,
                ),

                array(
                    'id' => 'ut_portfolio_showcase_hover_color',
                    'metapanel' => 'ut-portfolio-hover-settings',
                    'label' => 'Hover Background Color',
                    'desc' => '<strong>(optional)</strong>. This will overwrite the global hover color set in your showcase.',
                    'type' => 'gradient_colorpicker',
                    'pages' => $post_type_support_3
                ),

                array(
                    'id' => 'ut_portfolio_showcase_title_color',
                    'metapanel' => 'ut-portfolio-hover-settings',
                    'label' => 'Hover Title Color',
                    'desc' => '<strong>(optional)</strong>. This will overwrite the global title color set in your showcase.',
                    'type' => 'gradient_colorpicker',
                    'pages' => $post_type_support_3
                ),

                array(
                    'id' => 'ut_portfolio_showcase_category_color',
                    'metapanel' => 'ut-portfolio-hover-settings',
                    'label' => 'Hover Category Color',
                    'desc' => '<strong>(optional)</strong>. This will overwrite the global category color set in your showcase.',
                    'type' => 'gradient_colorpicker',
                    'pages' => $post_type_support_3
                ),


	            array(
		            'id' => 'ut_portfolio_showcase_custom_cursor_skin',
		            'metapanel' => 'ut-portfolio-hover-settings',
		            'label' => 'Custom Cursor Skin',
		            'desc' => 'Apply a custom cursor to this portfolio item.',
		            'type' => 'select',
		            'choices' => apply_filters( 'ot_recognized_custom_cursors', array(
			            array(
				            'value' => '',
				            'label' => 'inherit'
			            ),
			            array(
				            'value' => 'global',
				            'label' => 'Global'
			            ),
		            	array(
				            'value' => 'light',
				            'label' => 'Light'
			            ),
			            array(
				            'value' => 'dark',
				            'label' => 'Dark'
			            )
		            ), 'ut_custom_cursor_default_skin' ),
		            'pages' => $post_type_support_3
	            ),


                array(
                    'id' => 'ut_portfolio_showcase_caption_position',
                    'metapanel' => 'ut-portfolio-hover-settings',
                    'label' => 'Caption Position',
                    'desc' => '<strong>(optional)</strong>. This will overwrite the global caption position set in your showcase.',
                    'type' => 'select',
                    'choices' => array(
                        array(
                            'value' => 'showcase',
                            'label' => 'Global (Showcase)'
                        ),
                        array(
                            'value' => 'top-center',
                            'label' => 'Top Center'
                        ),
                        array(
                            'value' => 'top-left',
                            'label' => 'Top Left'
                        ),
                        array(
                            'value' => 'top-right',
                            'label' => 'Top Right'
                        ),
                        array(
                            'value' => 'middle-left',
                            'label' => 'Center Left'
                        ),
                        array(
                            'value' => 'middle-center',
                            'label' => 'Center Center'
                        ),
                        array(
                            'value' => 'middle-right',
                            'label' => 'Center Right'
                        ),
                        array(
                            'value' => 'bottom-left',
                            'label' => 'Bottom Left'
                        ),
                        array(
                            'value' => 'bottom-center',
                            'label' => 'Bottom Center'
                        ),
                        array(
                            'value' => 'bottom-right',
                            'label' => 'Bottom Right'
                        ),
                    ),
                    'pages' => $post_type_support_3,
                ),

                array(
                    'id' => 'ut_portfolio_showcase_video_headline',
                    'metapanel' => 'ut-portfolio-preview-video-settings',
                    'label' => 'Preview Video Settings',
                    'type' => 'panel_headline',
                    'pages' => $post_type_support_3
                ),
                array(
                    'id' => 'ut_portfolio_showcase_video_preview',
                    'metapanel' => 'ut-portfolio-preview-video-settings',
                    'label' => 'Add Preview Video?',
                    'desc' => 'A Preview Video will be added to the showcase itself. It can start playing on hover or directly when the portfolio loads.',
                    'type' => 'select',
                    'choices' => array(
                        array(
                            'value' => 'off',
                            'label' => 'no, thanks!'
                        ),
                        array(
                            'value' => 'on',
                            'label' => 'yes, please!'
                        ),
                    ),
                    'pages' => $post_type_support_3
                ),
                array(
                    'id' => 'ut_portfolio_showcase_video_play_event',
                    'metapanel' => 'ut-portfolio-preview-video-settings',
                    'label' => 'Video Play Event',
                    'desc' => 'Choose when the video should start playing. There are 3 different events available. When located in react slider, the video automatically starts when located in center.',
                    'type' => 'select',
                    'choices' => array(
                        array(
                            'value' => 'on_hover',
                            'label' => 'Autoplay Video on Mouse Hover'
                        ),
                        array(
                            'value' => 'on_appear',
                            'label' => 'Autoplay Video on Scroll (Appear)'
                        ),
                        array(
                            'value' => 'on_load',
                            'label' => 'Autoplay Video on Load'
                        ),
                    ),
                    'required' => array(
                        'ut_portfolio_showcase_video_preview' => 'on',
                    ),
                    'pages' => $post_type_support_3
                ),
                array(
                    'id' => 'ut_portfolio_showcase_video_mp4',
                    'metapanel' => 'ut-portfolio-preview-video-settings',
                    'label' => 'Preview Video MP4',
                    'desc' => 'In HTML5, there are 3 supported video formats: MP4, WebM, and Ogg. Please make sure you provide all 3 file types to grant best browser support.',
                    'type' => 'upload',
                    'required' => array(
                        'ut_portfolio_showcase_video_preview' => 'on',
                    ),
                    'pages' => $post_type_support_3,
                ),
                array(
                    'id' => 'ut_portfolio_showcase_video_ogg',
                    'metapanel' => 'ut-portfolio-preview-video-settings',
                    'label' => 'Preview Video OGG',
                    'desc' => 'In HTML5, there are 3 supported video formats: MP4, WebM, and Ogg. Please make sure you provide all 3 file types to grant best browser support.',
                    'type' => 'upload',
                    'required' => array(
                        'ut_portfolio_showcase_video_preview' => 'on',
                    ),
                    'pages' => $post_type_support_3,
                ),
                array(
                    'id' => 'ut_portfolio_showcase_video_webm',
                    'metapanel' => 'ut-portfolio-preview-video-settings',
                    'label' => 'Preview Video WEBM',
                    'desc' => 'In HTML5, there are 3 supported video formats: MP4, WebM, and Ogg. Please make sure you provide all 3 file types to grant best browser support.',
                    'type' => 'upload',
                    'required' => array(
                        'ut_portfolio_showcase_video_preview' => 'on',
                    ),
                    'pages' => $post_type_support_3,
                ),
	            array(
		            'id' => 'ut_portfolio_showcase_video_exclude',
		            'metapanel' => 'ut-portfolio-preview-video-settings',
		            'label' => 'Exclude from Showcase',
		            'desc' => 'If you like to hide this video from a certain showcase, you can select it here.',
		            'type' => 'custom_post_type_checkbox',
		            'post_type' => 'portfolio-manager',
		            'required' => array(
			            'ut_portfolio_showcase_video_preview' => 'on',
		            ),
		            'pages' => $post_type_support_3,
	            ),
                array(
                    'id' => 'ut_portfolio_showcase_react_headline',
                    'metapanel' => 'ut-portfolio-react-carousel-settings',
                    'label' => 'React Carousel',
                    'type' => 'panel_headline',
                    'pages' => $post_type_support_3
                ),
                array(
                    'id' => 'ut_portfolio_showcase_react_info',
                    'metapanel' => 'ut-portfolio-react-carousel-settings',
                    'label' => 'React Carousel Info',
                    'desc' => 'Only applies if this portfolio is part of a react carousel showcase.',
                    'type' => 'section_headline_info',
                    'pages' => $post_type_support_3,
                ),
                array(
                    'id' => 'ut_portfolio_showcase_react_title_color',
                    'metapanel' => 'ut-portfolio-react-carousel-settings',
                    'label' => 'Title Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'pages' => $post_type_support_3,
                ),
                array(
                    'id' => 'ut_portfolio_showcase_react_title_draw_color',
                    'metapanel' => 'ut-portfolio-react-carousel-settings',
                    'label' => 'Title Draw Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'pages' => $post_type_support_3,
                ),
                array(
                    'id' => 'ut_portfolio_showcase_react_title_active_color',
                    'metapanel' => 'ut-portfolio-react-carousel-settings',
                    'label' => 'Title Active Color',
                    'desc' => 'Only applies when item is in center. Leave empty to apply title color. RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'pages' => $post_type_support_3,
                ),
                array(
                    'id' => 'ut_portfolio_showcase_react_number_color',
                    'metapanel' => 'ut-portfolio-react-carousel-settings',
                    'label' => 'Number Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'pages' => $post_type_support_3,
                ),
                array(
                    'id' => 'ut_portfolio_showcase_react_number_stroke_color',
                    'metapanel' => 'ut-portfolio-react-carousel-settings',
                    'label' => 'Number Stroke Color',
                    'desc' => 'Only applies if strokes are activated inside the showcase settings. RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'pages' => $post_type_support_3,
                ),
                array(
                    'id' => 'ut_portfolio_showcase_react_category_color',
                    'metapanel' => 'ut-portfolio-react-carousel-settings',
                    'label' => 'Category Color',
                    'desc' => 'Only applies if categories are activated inside the showcase settings. RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'pages' => $post_type_support_3,
                ),
                array(
                    'id' => 'ut_portfolio_showcase_react_title_background_color',
                    'metapanel' => 'ut-portfolio-react-carousel-settings',
                    'label' => 'Background Title Color',
                    'desc' => 'Only applies if background titles are activated inside the showcase settings. RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'pages' => $post_type_support_3,
                ),
                array(
                    'id' => 'ut_portfolio_showcase_react_title_background_draw_color',
                    'metapanel' => 'ut-portfolio-react-carousel-settings',
                    'label' => 'Background Title Draw Color',
                    'desc' => 'Only applies if background titles are activated inside the showcase settings. RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'pages' => $post_type_support_3,
                ),

            ),

        ) );
        
        ot_register_meta_box( $settings );

    }

    add_action( 'admin_init', 'ut_bklyn_metabox_settings' );

endif;



function _ut_search_meta_panel_for_id( $id, $array ) {

    foreach ( $array as $key => $val ) {

        if ( $val[ 'id' ] === $id ) {
            return $key;
        }

    }

    return false;

}


/*
 * Remove Deprecated Options
 */

function _ut_remove_settings_from_panel( $metapanel ) {

    if ( ot_get_option( 'ut_front_hero_font_type' ) != 'ut-font' ) {

        $key = _ut_search_meta_panel_for_id( 'ut_page_hero_font_style', $metapanel['fields'] );

        if ( $key ) {
            unset( $metapanel[ 'fields' ][ $key ] );
        }

        $key = _ut_search_meta_panel_for_id( 'ut_page_hero_font_style_global_overwrite', $metapanel['fields'] );

        if ( $key ) {
            unset( $metapanel[ 'fields' ][ $key ] );
        }

    }

    if( ot_get_option( 'ut_site_layout', 'multisite' ) == 'multisite' ) {

        /* remove page section switch */
        $key = _ut_search_meta_panel_for_id( 'ut_page_type', $metapanel['sections'] );

        if ( $key ) {
            unset( $metapanel['sections'][ $key ] );
        }

        /* remove team section */
        $options = array(
            'ut_manage_team_headline',
            'ut_manage_team_info',
            'ut_member_in_row',
            'ut_member_box_layout',
            'ut_team_member'
        );

        foreach( $options as $option ) {

            $key = _ut_search_meta_panel_for_id( $option, $metapanel['fields'] );

            if ( $key ) {
                unset( $metapanel['fields'][ $key ] );
            }

        }

        $key = _ut_search_meta_panel_for_id( 'ut-manage-team', $metapanel['sections'] );

        if ( $key ) {
            unset( $metapanel['sections'][ $key ] );
        }

        /* remove colors */
        $options = array(
            'ut_color_skin_headline',
            'ut_color_skin_headline_info',
            'ut_show_color_options',
            'ut_section_skin',
            'ut_color_settings_headline',
            'ut_section_title_color',
            'ut_section_title_glow',
            'ut_section_slogan_color',
            'ut_content_colors_headline',
            'ut_section_background_color',
            'ut_section_heading_color',
            'ut_section_text_color',
            'ut_section_class'
        );

        foreach( $options as $option ) {

            $key = _ut_search_meta_panel_for_id( $option, $metapanel['fields'] );

            if ( $key ) {
                unset( $metapanel['fields'][ $key ] );
            }

        }

        $key = _ut_search_meta_panel_for_id( 'ut-color-settings', $metapanel['sections'] );

        if ( $key ) {
            unset( $metapanel['sections'][ $key ] );
        }

        /* section settings */
        $options = array(
            'ut_section_settings',
            'ut_section_width',
            'ut_split_content_align',
            'ut_split_section_margin_top',
            'ut_split_section_margin_bottom',
            'ut_section_shadow',
            'ut_section_padding_top',
            'ut_section_padding_bottom',
            'ut_section_border_top',
            'ut_section_border_top_color',
            'ut_section_border_top_width',
            'ut_section_border_top_style',
            'ut_section_border_bottom',
            'ut_section_fancy_border',
            'ut_section_fancy_border_color',
            'ut_section_fancy_border_background_color',
            'ut_section_fancy_border_size'
        );

        foreach( $options as $option ) {

            $key = _ut_search_meta_panel_for_id( $option, $metapanel['fields'] );

            if ( $key ) {
                unset( $metapanel['fields'][ $key ] );
            }

        }

        $key = _ut_search_meta_panel_for_id( 'ut-section-settings', $metapanel['sections'] );

        if ( $key ) {
            unset( $metapanel['sections'][ $key ] );
        }


        /* remove page settings */
        $options = array(
            'ut_page_fullwidth',
            'ut_page_padding_top',
            'ut_page_padding_bottom'
        );

        foreach( $options as $option ) {

            $key = _ut_search_meta_panel_for_id( $option, $metapanel['fields'] );

            if ( $key ) {
                unset( $metapanel['fields'][ $key ] );
            }

        }

    }

    return $metapanel;

}

add_filter( 'ut_bklyn_metabox_settings', '_ut_remove_settings_from_panel', 90, 1 );




function find_key_value($array, $key, $val)
{
    foreach ($array as $item)
    {
        if (is_array($item) && find_key_value($item, $key, $val)) return true;

        if (isset($item[$key]) && $item[$key] == $val) return true;
    }

    return false;
}

function find_unassigned_options( $metapanel ) {

    foreach( $metapanel['fields'] as $option ) {

        if( !find_key_value( $metapanel['sections'], 'id',  $option['metapanel'] ) ) {

            ut_print( $option['id'] );

        }

    }

    return $metapanel;

}

add_filter( 'ut_bklyn_metabox_settings', 'find_unassigned_options', 89, 1 );

function one_page_remove_ajax( $metapanel ) {

	if( ot_get_option( 'ut_site_layout', 'multisite' ) == 'multisite' ) {

		return $metapanel;

	}

	foreach( $metapanel['sections'] as $key => $section ) {

		if( isset( $section['ajax'] ) ) {

			unset( $metapanel['sections'][$key]['ajax'] );

		}

	}

	return $metapanel;

}

add_filter( 'ut_bklyn_metabox_settings', 'one_page_remove_ajax', 90, 1 );