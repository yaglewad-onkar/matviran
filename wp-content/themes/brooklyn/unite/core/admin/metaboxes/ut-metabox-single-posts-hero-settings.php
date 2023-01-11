<?php


if ( !function_exists( 'ut_bklyn_single_posts_metabox_settings' ) ):

    function ut_bklyn_single_posts_metabox_settings() {

        $metabox_settings = array(

            'id' => 'ut_single_post_hero_settings',
            'title' => 'Hero and Post Settings',
            'pages' => array( 'post' ),
            'type' => 'simple',
            'context' => 'normal',
            'priority' => 'low',
            'fields' => array(

                array(
                    'id' => 'ut_post_hero',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Activate Hero',
                    'desc' => 'Activate Hero for this post?',
                    'type' => 'radio_group_button',
                    'global' => 'on',
                    'prefix' => 'ut_',
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
                ),
                array(
                    'id' => 'ut_post_hero_height',
                    'label' => 'Hero Height',
                    'desc' => 'Use the slider bar to set your desired height in %.',
                    'metapanel' => 'ut-hero-type',
                    'type' => 'numeric_slider',
                    'std' => '50',
                    'min_max_step' => '50,100,1',
                    'global' => 'on',
                    'prefix' => 'ut_',
                ),
	            array(
		            'id' => 'ut_post_hero_height_tablet',
		            'label' => 'Tablet Hero Height',
		            'desc' => 'Use the slider bar to set your desired height in %.',
		            'metapanel' => 'ut-hero-type',
		            'type' => 'numeric_slider',
		            'std' => '100',
		            'min_max_step' => '50,100,1',
		            'global' => 'on',
		            'prefix' => 'ut_',
	            ),
	            array(
		            'id' => 'ut_post_hero_height_mobile',
		            'label' => 'Mobile Hero Height',
		            'desc' => 'Use the slider bar to set your desired height in %.',
		            'metapanel' => 'ut-hero-type',
		            'type' => 'numeric_slider',
		            'std' => '100',
		            'min_max_step' => '50,100,1',
		            'global' => 'on',
		            'prefix' => 'ut_',
	            ),
                array(
                    'id' => 'ut_post_hero_overlay_color',
                    'label' => 'Hero Overlay Color',
                    'desc' => 'Overwrite the global Hero Overlay Color',
                    'metapanel' => 'ut-hero-type',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'global' => 'on',
                    'prefix' => 'ut_',
                ),
				array(
					'id' => 'ut_post_hero_width',
					'label' => 'Hero Content Width',
					'desc' => 'Decide if the hero content gets stretched to fullwidth or displays centered.',
					'metapanel' => 'ut-hero-type',
					'type' => 'select',
					'std' => 'center',
					'prefix' => 'ut_',
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
					) 
				),
				array(
					'id' => 'ut_post_hero_align',
					'label' => 'Hero Caption Alignment',
					'desc' => 'Specifies the default alignment for the caption inside the hero.',
					'metapanel' => 'ut-hero-type',
					'type' => 'select',
					'std' => 'center',
					'prefix' => 'ut_',
					'global' => 'on',
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
					) /* end choices */
				),

				array(
					'id' => 'ut_post_hero_v_align',
					'label' => 'Hero Caption Vertical Alignment',
					'desc' => 'Specifies the default vertical alignment for the caption inside the hero.',
					'metapanel' => 'ut-hero-type',
					'type' => 'select',
					'std' => 'middle',
					'global' => 'on',
					'prefix' => 'ut_',
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

				),

				array(
					'id' => 'ut_post_hero_v_align_margin_bottom',
					'label' => 'Enter Hero Content Spacing Bottom',
					'desc' => 'Specifies the default bottom space for captions with vertical alignment bottom. Value in pixel e.g. 50px.',
					'metapanel' => 'ut-hero-type',
					'type' => 'text',
					'global' => 'on',
					'prefix' => 'ut_',
					'required' => array(
						'ut_post_hero_v_align' => 'bottom'    
					)
				),
				
                array(
                    'id' => 'ut_post_hero_title',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Show Title and or Post Meta in Hero?',
                    'desc' => 'Shows your page title or a custom title as well as the post publish date inside your hero area.',
                    'type' => 'select',
                    'std' => 'on',
                    'global' => 'on',
                    'prefix' => 'ut_',
                    'choices' => array(
                        array(
                            'label' => 'yes, show title and post meta!',
                            'value' => 'on'
                        ),
                        array(
                            'label' => 'yes, but only show post title!',
                            'value' => 'only_title'
                        ),
                        array(
                            'label' => 'yes, but only show post meta!',
                            'value' => 'only_meta'
                        ),
                        array(
                            'label' => 'no, thanks!',
                            'value' => 'off'
                        )

                    ),

                ),
            
                array(
                    'id' => 'ut_post_hero_custom_title',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Hero Custom Title',
                    'desc' => 'This option will replace the original posts title with a custom title.',
                    'type' => 'textarea_simple',
                    //'global' => 'on',
                    //'prefix' => 'ut_',
                    'rows' => '3',
                ),

                array(
                    'id' => 'ut_post_hero_down_arrow',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Show Scroll Down Arrow',
                    'desc' => 'The arrow down arrows allows your website visitor to auto scroll to the article on click.',
                    'type' => 'select',
                    'std' => 'on',
                    'global' => 'on',
                    'prefix' => 'ut_',
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

                ),
                
                array(
                    'id' => 'ut_post_hero_mute_button',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Show Mute Button',
                    'desc' => 'Only available for video post format.',
                    'type' => 'select',
                    'std' => 'on',
                    'global' => 'on',
                    'prefix' => 'ut_',
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

                ),
            
                array(
                    'id' => 'ut_post_hero_video_sound',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Activate Video Sound',
                    'desc' => 'Only available for video post format.',
                    'type' => 'select',
                    'std' => 'on',
                    'global' => 'on',
                    'prefix' => 'ut_',
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

                ),

                array(
                    'id' => 'ut_post_hero_video_volume',
                    'label' => 'Video Volume',
                    'desc' => 'Drag the handle to set the video volume. Default: 50.',
                    'std' => '50',
                    'global' => 'on',
                    'prefix' => 'ut_',
                    'type' => 'numeric-slider',
                    'min_max_step' => '0,100,1'
                ),

                array(
                    'id' => 'ut_post_title',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Show Post Title?',
                    'desc' => 'If you are already displaying the post title inside the hero, you can optionally hide the posts title inside the main content.',
                    'type' => 'select',
                    'std' => 'on',
                    'global' => 'on',
                    'prefix' => 'ut_',
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

                ),

                array(
                    'id' => 'ut_post_title_align',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Title Alignment',
                    'desc' => 'This option allows you change the post title alignment in your main content.',
                    'type' => 'select',
                    'std' => 'left',
                    'global' => 'on',
                    'prefix' => 'ut_',
                    'choices' => array(
                        array(
                            'label'     => 'left',
                            'value'     => 'left'
                        ),
                        array(
                            'label'     => 'center',
                            'value'     => 'center'
                        )
                    ),

                ),

                array(
                    'id' => 'ut_post_custom_title',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Post Custom Title',
                    'desc' => 'This option will replace the original posts title with a custom title. Requires an active post title.',
                    'type' => 'text',
                    'rows' => '3',
                ),
            
                array(
                    'id' => 'ut_post_thumbnail',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Show Featured Image?',
                    'desc' => 'This option allows you to hide the featured image in your main content.',
                    'type' => 'select',
                    'std' => 'on',
                    'global' => 'on',
                    'prefix' => 'ut_',
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

                ),
            
                array(
                    'id' => 'ut_post_video',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Show Featured Video?',
                    'desc' => 'This option allows you to hide the featured video in your main content. Only for post format video.',
                    'type' => 'select',
                    'std' => 'on',
                    'global' => 'on',
                    'prefix' => 'ut_',
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

                ),

                array(
                    'id' => 'ut_post_meta_box',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Show Post Meta Box?',
                    'desc' => 'This option allows you to hide the post meta box located on the left.',
                    'type' => 'select',
                    'std' => 'on',
                    'global' => 'on',
                    'prefix' => 'ut_',
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

                ),

            ) /* close fields */

        ); /* close settings array */

        ot_register_meta_box( $metabox_settings );

    }

add_action( 'admin_init', 'ut_bklyn_single_posts_metabox_settings' );

endif;