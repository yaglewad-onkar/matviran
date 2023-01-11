<?php

/**
 * Recognized SVG Separator
 *
 * Returns an array of all recognized transitions.
 *
 * @uses      apply_filters()
 *
 * @return    array
 *
 * @access    public
 */
if ( !function_exists( 'ot_recognized_separator_styles' ) ) {

    function ot_recognized_separator_styles( $field_id = '' ) {

        return apply_filters( 'ot_recognized_separator_styles', array(

            array(
                'value' => 'design_wave',
                'label' => __( 'Design Waves', 'unitedthemes' ),
            ),
            array(
                'value' => 'double_wave_1',
                'label' => __( 'Double Wave (1)', 'unitedthemes' ),
            ),
            array(
                'value' => 'triple_wave_1',
                'label' => __( 'Triple Wave (1)', 'unitedthemes' ),
            ),
            array(
                'value' => 'triple_wave_2',
                'label' => __( 'Triple Wave (2)', 'unitedthemes' ),
            ),
            array(
                'value' => 'abstract_waves',
                'label' => __( 'Abstract Waves', 'unitedthemes' ),
            ),
            array(
                'value' => 'simple_clouds',
                'label' => __( 'Simple Clouds', 'unitedthemes' ),
            ),
            array(
                'value' => 'triangle_shadow',
                'label' => __( 'Triangle with Shadow', 'unitedthemes' ),
            ),
            array(
                'value' => 'triangle_asymmetrical',
                'label' => __( 'Triangle Asymmetrical', 'unitedthemes' ),
            ),
            array(
                'value' => 'diagonal',
                'label' => __( 'Diagonal', 'unitedthemes' ),
            ),
            array(
                'value' => 'half_circle',
                'label' => __( 'Half Circle', 'unitedthemes' ),
            ),
            array(
                'value' => 'curve',
                'label' => __( 'Curve', 'unitedthemes' ),
            ),
            array(
                'value' => 'curve_asymmetrical',
                'label' => __( 'Curve Asymmetrical', 'unitedthemes' ),
            ),
            array(
                'value' => 'slit',
                'label' => __( 'Slit', 'unitedthemes' ),
            ),
            array(
                'value' => 'snow',
                'label' => __( 'Snow', 'unitedthemes' ),
            ),

        ), $field_id );

    }

}


/**
 * Recognized Social Profiles
 *
 * Returns an array of all recognized transitions.
 *
 * @uses      apply_filters()
 *
 * @return    array
 *
 * @access    public
 */
if ( !function_exists( 'ot_recognized_social_links' ) ) {

    function ot_recognized_social_links( $field_id = '' ) {

        return apply_filters( 'ot_recognized_social_links', array(

            array(
                'value' => 'fa-adn',
                'label' => 'Alpha'
            ),
            array(
                'value' => 'fa-android',
                'label' => 'Android'
            ),
            array(
                'value' => 'fa-apple',
                'label' => 'Apple'
            ),
            array(
                'value' => 'fa-behance',
                'label' => 'Behance'
            ),
            array(
                'value' => 'fa-bitbucket',
                'label' => 'Bitbucket'
            ),
            array(
                'value' => 'fa-btc',
                'label' => 'Bitcoin'
            ),
            array(
                'value' => 'fa-codepen',
                'label' => 'Codepen'
            ),
            array(
                'value' => 'fa-delicious',
                'label' => 'Delicious'
            ),
            array(
                'value' => 'fa-deviantart',
                'label' => 'Deviantart'
            ),
            array(
                'value' => 'fa-digg',
                'label' => 'Digg'
            ),
            array(
                'value' => 'fa-dribbble',
                'label' => 'Dribbble'
            ),
            array(
                'value' => 'fa-dropbox',
                'label' => 'Dropbox'
            ),
            array(
                'value' => 'fa-facebook',
                'label' => 'Facebook'
            ),
            array(
                'value' => 'fa-flickr',
                'label' => 'Flickr'
            ),
            array(
                'value' => 'fa-foursquare',
                'label' => 'Foursquare'
            ),
            array(
                'value' => 'fa-github',
                'label' => 'Github'
            ),
            array(
                'value' => 'fa-gittip',
                'label' => 'Gittip'
            ),
            /*array(
                'value' => 'fa-google-plus',
                'label' => 'Google Plus'
            ),*/
            array(
                'value' => 'fa-instagram',
                'label' => 'Instagram'
            ),
            array(
                'value' => 'fa-imdb',
                'label' => 'IMDB'
            ),
            array(
                'value' => 'fa-jsfiddle',
                'label' => 'JSFiddle'
            ),
            array(
                'value' => 'fa-linkedin',
                'label' => 'LinkedIn'
            ),
            array(
                'value' => 'fa-medium',
                'label' => 'Medium'
            ),
            array(
                'value' => 'fa-meetup',
                'label' => 'Meetup'
            ),
            array(
                'value' => 'fa-modx',
                'label' => 'ModX'
            ),
            array(
                'value' => 'fa-reddit',
                'label' => 'Reddit'
            ),
            array(
                'value' => 'fa-paypal',
                'label' => 'Paypal'
            ),
            array(
                'value' => 'fa-pinterest',
                'label' => 'Pinterest'
            ),
            array(
                'value' => 'fa-skype',
                'label' => 'Skype'
            ),
            array(
                'value' => 'fa-steam',
                'label' => 'Steam'
            ),
            array(
                'value' => 'fa-soundcloud',
                'label' => 'Soundcloud'
            ),
            array(
                'value' => 'fa-snapchat',
                'label' => 'Snapchat'
            ),
            array(
                'value' => 'fa-headphones',
                'label' => 'Teamspeak'
            ),
            array(
                'value' => 'fa-telegram',
                'label' => 'Telegram'
            ),
            array(
                'value' => 'fa-tripadvisor',
                'label' => 'Tripadvisor'
            ),
            array(
                'value' => 'fa-tumblr',
                'label' => 'Tumblr'
            ),
            array(
                'value' => 'fa-twitter',
                'label' => 'Twitter'
            ),
            array(
                'value' => 'fa-twitch',
                'label' => 'Twitch'
            ),
            array(
                'value' => 'fa-vimeo-square',
                'label' => 'Vimeo'
            ),
            array(
                'value' => 'fa-vk',
                'label' => 'VK'
            ),
            array(
                'value' => 'fa-xing',
                'label' => 'Xing'
            ),
            array(
                'value' => 'fa-youtube',
                'label' => 'Youtube'
            ),
            array(
                'value' => 'fa-spotify',
                'label' => 'Spotify'
            ),
            array(
                'value' => 'fa-yelp',
                'label' => 'Yelp'
            ),

        ), $field_id );

    }

}


function _ut_theme_options() {

    $ut_settings = array(

        'sections' => array(

            array(
                'id' => 'ut_general_settings',
                'title' => 'General',
                'icon' => 'general-icon.png',
                'def_section' => 'ut_customize_settings',
                'subsections' => array(

                    array(
                        'label' => 'Logo & Accent Color',
                        'id' => 'ut_customize_settings'
                    ),

                    array(
                        'label' => 'Apple Touch Icons',
                        'id' => 'ut_touch_settings'
                    ),

                    array(
                        'label' => 'Company Details',
                        'id' => 'ut_company_settings'
                    ),

                    array(
                        'label' => 'Site Frame',
                        'id' => 'ut_border_settings'
                    ),

                    array(
                        'label' => 'Sidebar Colors',
                        'id' => 'ut_global_sidebar_settings'
                    ),

                    array(
                        'label' => 'Footer',
                        'id' => 'ut_footer_settings',
                        'def_section' => 'ut_footer_colors',
                        'subsections' => array(

                            array(
                                'label' => 'Settings',
                                'id' => 'ut_footer_area_settings'
                            ),

                            array(
                                'label' => 'Colors',
                                'id' => 'ut_footer_colors'
                            ),

                            array(
                                'label' => 'Scroll Top Button',
                                'id' => 'ut_scroll_top'
                            ),
                            array(
                                'label' => 'Subfooter',
                                'id' => 'ut_subfooter_settings'
                            ),

                        )

                    ),


                )
            ),

            array(
                'id' => 'ut_typography_settings',
                'title' => 'Typography',
                'icon' => 'typography-icon.png',
                'def_section' => 'ut_global_body_settings',
                'sub_loading' => true,
                'subsections' => array(

	                array(
		                'label' => 'Header and Navigation',
		                'id' => 'ut_global_header_navigation_menu_settings',
		                'def_section' => 'ut_global_navigation_logo_settings',
		                'subsections' => array(

		                	array(
				                'label' => 'Logo',
				                'id' => 'ut_global_navigation_logo_settings'
			                ),
			                array(
				                'label' => 'Navigation',
				                'id' => 'ut_global_navigation_menu_settings'
			                ),
			                array(
				                'label' => 'Megamenu',
				                'id' => 'ut_global_navigation_megamenu_typography_settings'
			                ),
			                array(
				                'label' => 'Buttons',
				                'id' => 'ut_global_navigation_buttons_typography_settings'
			                ),
			                array(
				                'label' => 'Custom Fields',
				                'id' => 'ut_global_navigation_custom_fields_typography_settings'
			                ),
			                array(
				                'label' => 'Mobile Navigation',
				                'id' => 'ut_global_mobile_menu_settings'
			                ),

			                array(
				                'label' => 'Overlay Navigation',
				                'id' => 'ut_global_overlay_navigation_settings'
			                ),

		                )
	                ),

                    array(
                        'label' => 'General',
                        'id' => 'ut_general_typography_settings',
                        'def_section' => 'ut_global_body_settings',
                        'subsections' => array(

                            array(
                                'label' => 'Body',
                                'id' => 'ut_global_body_settings'
                            ),
                            array(
                                'label' => 'Content Titles',
                                'id' => 'ut_global_htags_settings'
                            ),
                            array(
                                'label' => 'Content Widgets',
                                'id' => 'ut_global_content_widgets_settings'
                            ),
                            array(
                                'label' => 'Sidebar',
                                'id' => 'ut_global_blog_widgets_settings'
                            ),
                            array(
                                'label' => 'Footer',
                                'id' => 'ut_global_footer_typo_settings'
                            ),


                        )
                    ),

	                array(
		                'label' => 'Blog',
		                'id' => 'ut_global_blog_menu_settings',
		                // 'def_section' => 'ut_global_body_settings',
		                'subsections' => array(

			                array(
				                'label' => 'Single Posts',
				                'id' => 'ut_global_single_post_settings'
			                ),
			                array(
				                'label' => 'Blockquotes',
				                'id' => 'ut_global_blockquote_settings'
			                ),

		                )
	                ),

                    array(
                        'label' => 'Heroes',
                        'id' => 'ut_heroes_typography_settings',
                        'def_section' => 'ut_front_hero_font_style_settings',
                        'subsections' => array(

                            array(
                                'label' => 'Heroes',
                                'id' => 'ut_front_hero_font_style_settings'
                            ),
                            array(
                                'label' => 'Highlighted Heroes',
                                'id' => 'ut_split_hero_font_style_settings'
                            ),
                            array(
                                'label' => 'Blog Hero',
                                'id' => 'ut_blog_font_style_settings'
                            ),
                            array(
                                'label' => 'Single Post Hero',
                                'id'    => 'ut_single_post_font_style_settings'
                            )


                        )
                    ),

                    array(
                        'label' => 'Pages',
                        'id' => 'ut_pages_typography_settings',
                        'def_section' => 'ut_global_page_title_settings',
                        'subsections' => array(

                            array(
                                'label' => 'Page Titles',
                                'id' => 'ut_global_page_title_settings'
                            ),
                            array(
                                'label' => 'Page Titles Font',
                                'id' => 'ut_global_page_title_font_settings'
                            ),
                            array(
                                'label' => 'Page Title Leads',
                                'id' => 'ut_global_page_title_lead_settings'
                            ),

                        )
                    ),

                    array(
                        'label' => 'Sections',
                        'id' => 'ut_sections_typography_settings',
                        'def_section' => 'ut_global_header_settings',
                        'subsections' => array(

                            array(
                                'label' => 'Section Titles',
                                'id' => 'ut_global_header_settings'
                            ),
                            array(
                                'label' => 'Section Titles Font',
                                'id' => 'ut_global_header_font_settings'
                            ),
                            array(
                                'label' => 'Section Leads',
                                'id' => 'ut_global_lead_settings'
                            ),

                        )
                    ),

                    array(
                        'label' => 'Contact Section',
                        'id' => 'ut_csection_typography_settings',
                        'def_section' => 'ut_global_csection_header_settings',
                        'subsections' => array(

                            array(
                                'label' => 'Contact Section Title',
                                'id' => 'ut_global_csection_header_settings'
                            ),

                             array(
                                'label' => 'Contact Section Title Font',
                                'id' => 'ut_global_csection_header_font_settings'
                            ),

                            array(
                                'label' => 'Contact Section Lead',
                                'id' => 'ut_global_csection_lead_settings'
                            ),

                        )
                    ),

                    array(
                        'label' => 'Portfolio',
                        'id' => 'ut_portfolio_typography_settings',
                        'def_section' => 'ut_global_portfolio_settings',
                        'subsections' => array(

                            array(
                                'label' => 'Portfolio Showcase',
                                'id' => 'ut_global_portfolio_settings'
                            ),

                            array(
                                'label' => 'Portfolio React Slider',
                                'id' => 'ut_react_portfolio_settings'
                            ),

                        )
                    ),

                )

            ),

            array(
                'id' => 'ut_header_settings',
                'title' => 'Header',
                'icon' => 'header-icon.png',
                'def_section' => 'ut_navigation_settings',
                'subsections' => array(

                    array(
                        'label' => 'Top Header',
                        'id' => 'ut_top_header_settings',
                        'subsections' => array(

                            array(
                                'label' => 'Company Details',
                                'id' => 'ut_top_header_company_settings'
                            ),

                            array(
                                'label' => 'Colors',
                                'id' => 'ut_top_header_color_settings'
                            ),

                            array(
                                'label' => 'Secondary Colors',
                                'id' => 'ut_top_header_secondary_color_settings'
                            ),

                        )

                    ),

                    array(
                        'label' => 'Header and Navigation',
                        'id' => 'ut_navigation_settings',
                        'subsections' => array(

                            array(
                                'label' => 'Colors',
                                'id' => 'ut_header_color_settings'
                            ),

                        )
                    ),

                    array(
                        'label' => 'Mobile Navigation',
                        'id' => 'ut_mobile_navigation_settings',
                    ),

                    array(
                        'label' => 'Overlay Navigation',
                        'id' => 'ut_overlay_navigation_settings',
                    ),

                    array(
                        'label' => 'Overlay Search',
                        'id' => 'ut_overlay_search_settings',
                    ),

                )

            ),

            array(
                'id' => 'ut_global_hero_settings',
                'title' => 'Hero Settings',
                'icon' => 'hero-icon.png',
                'def_section' => 'ut_global_hero_type_settings',
                'subsections' => array(

                    array(
                        'label' => 'Global Hero Settings',
                        'id' => 'ut_global_hero_type_settings',
                        /*'subsections' => array(
                            array(
                                'label' => 'Background Image',
                                'id' => 'ut_global_hero_image_settings'
                            ),
                        )*/
                    ),

                    array(
                        'label' => 'Global Hero Styling',
                        'id' => 'ut_global_hero_styling_settings',
                        'def_section' => 'ut_global_hero_caption_settings',
                        'subsections' => array(

                            array(
                                'label' => 'Logo',
                                'id' => 'ut_global_hero_logo_settings'
                            ),
                            array(
                                'label' => 'Caption',
                                'id' => 'ut_global_hero_caption_settings'
                            ),
                            array(
                                'label' => 'Buttons',
                                'id' => 'ut_global_hero_button_settings'
                            ),
                            array(
                                'label' => 'Overlay',
                                'id' => 'ut_global_hero_overlay_settings'
                            ),
                            array(
                                'label' => 'Separator',
                                'id' => 'ut_global_hero_separator_settings'
                            ),
                            array(
                                'label' => 'Border',
                                'id' => 'ut_global_hero_border_settings'
                            ),


                        )
                    ),

                    array(
                        'label' => 'Blog Single Post Hero',
                        'id' => 'ut_single_post_hero_settings'
                    ),

                    array(
                        'label' => 'Archive Hero',
                        'id' => 'ut_system_page_archive_settings'
                    ),

                    array(
                        'label' => 'Search Hero',
                        'id' => 'ut_system_page_search_settings'
                    ),

                    array(
                        'label' => '404 Hero',
                        'id' => 'ut_system_page_404_settings'
                    ),



                )

            ),

            array(
                'id' => 'ut_blog_settings',
                'title' => 'Blog',
                'icon' => 'blog-icon.png',
                'def_section' => 'ut_blog_layout_setting',
                'subsections' => array(

                    array(
                        'label' => 'Blog Layout',
                        'id' => 'ut_blog_layout_setting',
                        'subsections' => array(

	                        array(
		                        'label' => 'Background Image',
		                        'id' => 'ut_blog_background_image_setting'
	                        ),

                        )

                    ),

                    array(
                        'label' => 'Blog Colors',
                        'id' => 'ut_blog_color_setting',
                        //'def_section' => 'ut_blog_data_caption_color_setting',
                        'subsections' => array(

	                        array(
		                        'label' => 'Date and Caption',
		                        'id' => 'ut_blog_data_caption_color_setting'
	                        ),
	                        array(
		                        'label' => 'Overview Media',
		                        'id' => 'ut_blog_overview_media_color_setting'
	                        ),
	                        array(
		                        'label' => 'Read More and Icons',
		                        'id' => 'ut_blog_read_more_color_setting'
	                        ),
	                        array(
		                        'label' => 'Single Post',
		                        'id' => 'ut_blog_single_post_color_setting'
	                        ),
	                        array(
		                        'label' => 'Author Biography Box',
		                        'id' => 'ut_blog_author_bio_color_setting'
	                        ),
	                        array(
		                        'label' => 'Comment form',
		                        'id' => 'ut_blog_comment_form_color_setting'
	                        ),

                        )
                    ),

                    array(
                        'label' => 'Single Posts',
                        'id' => 'ut_single_posts_setting'
                    ),

	                array(
		                'label' => 'Blog Archive',
		                'id' => 'ut_blog_archive_setting'
	                ),

                    array(
                        'label' => 'Sidebar Setting',
                        'id' => 'ut_blog_sidebar_setting'
                    ),

                    array(
                        'label' => 'Pagination',
                        'id' => 'ut_blog_pagination_setting'
                    ),

                )

            ),

            /*array(
                'id' => 'ut_shop_settings',
                'title' => 'Shop',
                'icon' => 'shop-icon.png',
                'def_section' => 'ut_shop_general_settings',
                'subsections' => array(

                    array(
                        'label' => 'Shop General',
                        'id' => 'ut_shop_general_settings'
                    ),

                )

            ),*/

            array(
                'id' => 'ut_portfolio_settings',
                'title' => 'Portfolio',
                'icon' => 'portfolio-icon.png',
                'def_section' => 'ut_portfolio_single_settings',
                'subsections' => array(

                    array(
                        'label' => 'Single Portfolio',
                        'id' => 'ut_portfolio_single_settings'
                    ),

                    array(
                        'label' => 'Showcase',
                        'id' => 'ut_portfolio_showcase_setting'
                    ),

                )

            ),

            array(
                'id' => 'ut_advanced_settings',
                'title' => 'Advanced',
                'icon' => 'advanced-icon.png',
                'def_section' => 'ut_csection_content_settings',
                'subsections' => array(



                    array(
                        'label' => 'Contact Section Content',
                        'id' => 'ut_csection_content_settings'
                    ),

                    array(
                        'label' => 'Contact Section Styling',
                        'id' => 'ut_csection_styling_setting',
                        'def_section' => 'ut_csection_color_settings',
                        'subsections' => array(

                            array(
                                'label' => 'Colors',
                                'id' => 'ut_csection_color_settings'
                            ),
                            array(
                                'label' => 'Background',
                                'id' => 'ut_csection_background_settings'
                            ),
                            array(
                                'label' => 'Overlay',
                                'id' => 'ut_csection_overlay_settings'
                            ),
                            array(
                                'label' => 'Border',
                                'id' => 'ut_csection_border_settings'
                            ),
                            array(
                                'label' => 'Spacing',
                                'id' => 'ut_csection_spacing_settings'
                            ),

                        ),

                    ),

                    array(
                        'label' => 'Custom Cursor',
                        'id' => 'ut_custom_cursor_settings'
                    ),

                    array(
                        'label' => 'Maintenance Mode',
                        'id' => 'ut_maintenace_mode_settings'
                    ),

                    array(
                        'label' => 'Section Animation',
                        'id' => 'ut_sanimation_settings'
                    ),

                    array(
                        'label' => 'Manage Preloader',
                        'id' => 'ut_loader_settings'
                    ),

                    array(
                        'label' => 'Custom CSS',
                        'id' => 'ut_custom_css_settings'
                    ),

                    array(
                        'label' => 'SEO',
                        'id' => 'ut_seo_settings',
                    ),

                    array(
                        'label' => 'API Keys',
                        'id' => 'ut_api_keys_settings',
                    ),

                    /*array(
                        'label'     => 'Page Cache',
                        'id'        => 'ut_cache_settings'
                    ),*/

                    array(
                        'label' => 'Lightbox Settings',
                        'id' => 'ut_lightbox_settings'
                    ),

                    array(
                        'label' => 'Content Spacing Settings',
                        'id' => 'ut_content_spacing_settings'
                    ),

                    array(
                        'label' => 'Mailchimp Colors',
                        'id' => 'ut_mailchimp_settings'
                    ),

                    array(
                        'label' => 'Performance Settings',
                        'id' => 'ut_performance_settings'
                    ),

	                array(
		                'label' => 'Compatibility Settings',
		                'id'    => 'ut_compatibility_settings'
	                ),

	                /* array(
		                'label' => 'CDN Settings',
		                'id' => 'ut_cdn_settings'
	                ), */

	                array(
		                'label' => 'Theme Option Skin',
		                'id' => 'ut_options_panel_settings'
	                ),

                )

            )

            /* end sections */

        ),

        'settings' => array(

            /*
            |--------------------------------------------------------------------------
            | Sub Section Logo and Themecolor
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_options_panel_headline',
                'label' => 'Theme Options Skin',
                'type' => 'panel_headline',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_options_panel_settings'
            ),

            array(
                'id' => 'ut_theme_options_skin',
                'label' => 'Skin',
                'desc' => 'Brooklyn supports 2 different admin skins.',
                'type' => 'select',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_options_panel_settings',
                'std' => 'unite-admin',
                'choices' => array(
                    array(
                        'value' => 'unite-admin-dark',
                        'label' => 'Dark'
                    ),
                    array(
                        'value' => 'unite-admin-light',
                        'label' => 'Light'
                    ),

                ),

            ),

            /*
            |--------------------------------------------------------------------------
            | Sub Section Logo and Themecolor
            |--------------------------------------------------------------------------
            */
            array(
                'id' => 'ut_customize_panel_headline',
                'label' => 'Logo & Accent and Link Color',
                'type' => 'panel_headline',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_customize_settings'
            ),
            array(
                'id' => 'ut_accentcolor',
                'label' => 'Accent Color',
                'desc' => 'Set your desired primary theme accent color. Keep in mind, that you can easily define own colors for each page or section by using the "Color Settings" tab beneath the WordPress Editor. You can also add a custom CSS class to each page or section by using the class field.',
                'type' => 'colorpicker_customizer',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_customize_settings',
            ),
            array(
                'id' => 'ut_linkcolor',
                'label' => 'Link Color',
                'desc' => 'Set your primary link color for post or page content. All other link colors, be it sidebar, footer or main navigation can be adjusted in their particular theme options panel.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_customize_settings',
            ),
            array(
                'id' => 'ut_linkcolor_hover',
                'label' => 'Link Hover Color',
                'desc' => 'Set your primary link hover color for post or page content. All other link colors, be it sidebar, footer or main navigation can be adjusted in their particular theme options panel. Accent Color is the default color.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_customize_settings',
            ),
            array(
                'id' => 'ut_link_decoration',
                'label' => 'Link Decoration',
                'desc' => 'The text-decoration property specifies the decoration added to text.',
                'type' => 'select',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_customize_settings',
                'std' => 'none',
                'choices' => array(
                    array(
                        'value' => 'none',
                        'label' => 'none'
                    ),
                    array(
                        'value' => 'underline',
                        'label' => 'underline'
                    )

                )

            ),
            array(
                'id' => 'ut_link_weight',
                'label' => 'Link Font Weight',
                'desc' => 'The font-weight property sets how thick or thin characters in text should be displayed.',
                'type' => 'select',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_customize_settings',
                'std' => 'normal',
                'choices' => array(
                    array(
                        'value' => 'normal',
                        'label' => 'normal'
                    ),
                    array(
                        'value' => 'bold',
                        'label' => 'bold'
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

                )

            ),
            array(
                'id' => 'ut_site_logo_opacity',
                'label' => 'Logo Opacity',
                'desc' => 'Use an alternate Logo opacity.',
                'type' => 'numeric_slider',
                'std' => '100',
                'min_max_step' => '0,100,1',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_customize_settings',
            ),
            array(
                'id' => 'ut_site_logo_distortion',
                'label' => 'Add Distortion Effect to Logo?',
                'desc' => 'Note that this effect is using clip path technique. The clip-path property is not supported in IE or Edge. All other Modern Browsers do support this feature. If your logo is a SVG file, please make sure the width and height attributes are set.',
                'type' => 'select',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_customize_settings',
                'std' => 'no',
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
                )
            ),
            array(
                'id' => 'ut_site_logo_background',
                'label' => 'Add Background to Logo?',
                'desc' => 'A background to highlight the site logo. If your logo is a SVG file, please make sure the width and height attributes are set.',
                'type' => 'select',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_customize_settings',
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
                )
            ),
            array(
                'id' => 'ut_site_logo_background_skew',
                'label' => 'Skew Background?',
                'desc' => 'Skew the background shape?',
                'type' => 'select',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_customize_settings',
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
                )
            ),
            array(
                'id' => 'ut_site_logo_background_color',
                'label' => 'Site Logo Background Color',
                'desc' => 'Set your desired Body Background Color.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_customize_settings',
                'required' => array(
                    'ut_site_logo_background' => 'on'
                )
            ),
            array(
                'id' => 'ut_site_logo_glow',
                'label' => 'Add Glow Effect',
                'desc' => 'Activate Glow Effect for <strong>Site Logo</strong>? <span style="color: #FFF;font-weight: bold;">Only works for Text Logo.</span>.',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_customize_settings',
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
            ),
            array(
                'id' => 'ut_site_logo_glow_color',
                'label' => 'Glow Color',
                'desc' => 'Select desired glow color.',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_customize_settings',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'required' => array(
                    'ut_site_logo_glow' => 'on'
                )
            ),
            array(
                'id' => 'ut_site_logo_glow_shadow_color',
                'label' => 'Glow Text Shadow Color',
                'desc' => 'Select desired glow color.',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_customize_settings',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'required' => array(
                    'ut_site_logo_glow' => 'on'
                )
            ),
            array(
                'id' => 'ut_site_logo',
                'label' => 'Main Logo',
                'desc' => 'The maximum height of the logo should be 60px. And for retina logo, please double the size of your logo by keeping the aspect ratio.',
                'type' => 'upload_customizer',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_customize_settings',
            ),

            array(
                'id' => 'ut_site_logo_alt',
                'label' => 'Alternate Logo',
                'desc' => 'Upload an alternate Logo. Should be the same size as your Main Logo. This Logo will be used if 2 different navigations skins are available on the site. Example: The navigation switches from primary to secondary skin when reaching the main content.',
                'type' => 'upload_customizer',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_customize_settings',
            ),

            array(
                'id' => 'ut_site_logo_retina',
                'label' => 'Retina Main Logo',
                'desc' => 'Upload a retina ready Main Logo. Simply double the size of your Main Logo.',
                'type' => 'upload_customizer',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_customize_settings',
            ),

            array(
                'id' => 'ut_site_logo_alt_retina',
                'label' => 'Retina Alternate Logo',
                'desc' => 'Upload an alternate retina Logo. Should be the same size as your Retina Main Logo.',
                'type' => 'upload_customizer',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_customize_settings',
            ),

            /*
            |--------------------------------------------------------------------------
            | Sub Section Touch Icons
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_touch_setting_headline',
                'label' => 'Apple Touch Icons',
                'type' => 'panel_headline',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_touch_settings'
            ),

	        array(
		        'id' => 'ut_favicon_admin',
		        'label' => 'Favicon Admin Area',
		        'desc' => 'The dimension for the image must be 16x16 pixels or 32x32 pixels, using either 8-bit or 24-bit colors and the format must be one of PNG (a W3C standard), GIF, or ICO.',
		        'type' => 'upload',
		        'section' => 'ut_general_settings',
		        'subsection' => 'ut_touch_settings'
	        ),

            array(
                'id' => 'ut_favicon',
                'label' => 'Favicon',
                'desc' => 'The dimension for the image must be 16x16 pixels or 32x32 pixels, using either 8-bit or 24-bit colors and the format must be one of PNG (a W3C standard), GIF, or ICO.',
                'type' => 'upload',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_touch_settings'
            ),

            array(
                'id' => 'ut_apple_touch_icon_iphone',
                'label' => 'Apple Touch Icon IPhone',
                'desc' => '57x57 pixel for iPhone and iPod touch. <br /> <strong>Recommended format must be one of PNG, GIF, or JPG</strong>.',
                'type' => 'upload',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_touch_settings'
            ),

            array(
                'id' => 'ut_apple_touch_icon_ipad',
                'label' => 'Apple Touch Icon IPad',
                'desc' => '72 x 72 pixel for IPad. <br /> <strong>Recommended format must be one of PNG, GIF, or JPG</strong>.',
                'type' => 'upload',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_touch_settings'
            ),

            array(
                'id' => 'ut_apple_touch_icon_iphone_retina',
                'label' => 'Apple Touch Icon IPhone (Retina)',
                'desc' => '114 x 114 pixel for high-resolution iPhone and iPod touch. <br /> <strong>Recommended format must be one of PNG, GIF, or JPG</strong>.',
                'type' => 'upload',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_touch_settings'
            ),

            array(
                'id' => 'ut_apple_touch_icon_ipad_retina',
                'label' => 'Apple Touch Icon IPad (Retina)',
                'desc' => '144 x 144 pixel for high-resolution iPad. <br /> <strong>Recommended format must be one of PNG, GIF, or JPG</strong>.',
                'type' => 'upload',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_touch_settings'
            ),



            /*
            |--------------------------------------------------------------------------
            | Company Details
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_company_setting_headline',
                'label' => 'Global Company Details',
                'type' => 'panel_headline',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_company_settings'
            ),

            /*array(
                'id' => 'ut_company_address',
                'label' => 'Address',
                'desc' => 'Please enter your company address.',
                'type' => 'textarea-simple',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_company_settings',
                'rows' => '3'
            ),*/

            array(
                'id' => 'ut_company_email',
                'label' => 'Email',
                'desc' => 'Please enter your company email.',
                'type' => 'text',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_company_settings',
            ),

            array(
                'id' => 'ut_company_phone',
                'label' => 'Phone',
                'desc' => 'Please enter your company phone number.',
                'type' => 'text',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_company_settings',
            ),

            array(
                'id' => 'ut_company_social_icons',
                'label' => 'Social Icons',
                'desc' => 'Add your desired social profile icon and links. <br /><strong>You can re-order with drag & drop, the order will update after saving.</strong>',
                'type' => 'list-item',
                'list_title' => false,
                'markup' => '1_1',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_company_settings',
                'settings' => array(
                    array(
                        'id' => 'icon',
                        'label' => 'Choose Social Icon',
                        'type' => 'select',
                        'class' => 'ut-select-setting-title',
                        'choices' => ot_recognized_social_links(),

                    ),
                    array(
                        'id' => 'link',
                        'label' => 'Enter Social Link',
                        'type' => 'text',
                        'rows' => '3'
                    )
                ),
            ),





            /*
            |--------------------------------------------------------------------------
            | Border Settings
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_border_setting_headline',
                'label' => 'Site Frame',
                'desc' => 'This is your global setting. You can individually change this per page as well.',
                'type' => 'panel_headline',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_border_settings',
            ),

            array(
                'id' => 'ut_site_border',
                'label' => 'Display Site Frame?',
                'desc' => 'A frame which embeds your entire site.',
                'type' => 'select',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_border_settings',
                'std' => 'hide',
                'choices' => array(
                    array(
                        'value' => 'show',
                        'label' => 'Show'
                    ),
                    array(
                        'value' => 'hide',
                        'label' => 'Hide'
                    )

                )

            ),

            array(
                'id' => 'ut_site_border_size',
                'label' => 'Site Frame Size',
                'desc' => 'The Site Frame will not display on Tablets or Mobiles.',
                'type' => 'select',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_border_settings',
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

            ),

            array(
                'id' => 'ut_site_border_status',
                'label' => 'Frame Settings',
                'desc' => 'You can optionally deactivate parts of the frame for design purposes.',
                'type' => 'frame',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_border_settings',
                'std' => '#FFFFFF',

            ),

            array(
                'id' => 'ut_site_border_color',
                'label' => 'Frame Color',
                'desc' => 'Set your desired Site Frame Color.',
                'type' => 'colorpicker',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_border_settings',
                'std' => '#FFFFFF',

            ),

            array(
                'id' => 'ut_site_border_body_color',
                'label' => 'Body Background Color',
                'desc' => 'Set your desired Body Background Color. We recommend to use your main background color.',
                'type' => 'colorpicker',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_border_settings',

            ),

            array(
                'id' => 'ut_site_top_header_flush',
                'label' => 'Activate Top Header Flush?',
                'desc' => 'Only applies of Site Frame is active and Top Header Width has been set to fullwidth. This option will remove the gap between top header elements and siteframe so that they directly stick together.',
                'type' => 'select',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_border_settings',
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

            ),

            array(
                'id' => 'ut_site_navigation_flush',
                'label' => 'Activate Header Flush?',
                'desc' => 'Only applies of Site Frame is active and Header Width has been set to fullwidth. This option will remove the gap next to logo and navigation so that they directly stick to the site frame.',
                'type' => 'select',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_border_settings',
                'std' => 'no',
                'choices' => array(
                    array(
                        'value' => 'yes',
                        'label' => 'Flush Logo and Navigation'
                    ),
                    array(
                        'value' => 'logo_only',
                        'label' => 'Flush Logo Only'
                    ),
                    array(
                        'value' => 'no',
                        'label' => 'no, thanks!'
                    )
                ),

            ),

            array(
                'id' => 'ut_site_logo_responsive_flush',
                'label' => 'Activate Logo Flush on Mobiles?',
                'desc' => 'Activated the Logo will be flushed on Tablets and Mobiles.',
                'type' => 'select',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_border_settings',
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
                )

            ),

            /*
            |--------------------------------------------------------------------------
            | Top Header Configuration
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_top_header_setting_headline',
                'label' => 'Top Header',
                'type' => 'panel_headline',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_top_header_settings',
            ),

            array(
                'id' => 'ut_top_header',
                'label' => 'Display Top Header?',
                'desc' => 'The Top Header will be placed above header and navigation and contains additional elements like phone number, email address and social profile links. You can individually turn it on and off per page.',
                'type' => 'select',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_top_header_settings',
                'std' => 'hide',
                'choices' => array(
                    array(
                        'value' => 'show',
                        'label' => 'Show'
                    ),
                    array(
                        'value' => 'hide',
                        'label' => 'Hide'
                    )
                ),
            ),

            array(
                'id' => 'ut_top_header_width',
                'label' => 'Width',
                'desc' => 'It handles centering the content within the top header. Decide if the content gets stretched to fullwidth or displays centered.',
                'type' => 'select',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_top_header_settings',
                'std' => 'header',
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

            ),

            array(
                'id' => 'ut_top_header_font_size',
                'label' => 'Font Size',
                'desc' => 'Select desired font size preset. Does not affect social icons.',
                'type' => 'select',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_top_header_settings',
                'std' => 'hide',
                'choices' => array(
                    array(
                        'value' => 'small',
                        'label' => 'small'
                    ),
                    array(
                        'value' => 'large',
                        'label' => 'large'
                    ),
                    array(
                        'value' => 'extra-large',
                        'label' => 'extra large'
                    ),

                ),
            ),

            array(
                'id' => 'ut_top_header_reverse',
                'label' => 'Reverse Content Areas',
                'desc' => 'Activating this option will swap the content areas inside your top header.',
                'type' => 'select',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_top_header_settings',
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

            ),

            array(
                'id' => 'ut_top_header_border_separator',
                'label' => 'Activate Border Separator?',
                'desc' => 'Activating this option allows you to place a border separator between top header items.',
                'type' => 'select',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_top_header_settings',
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

            ),

            array(
                'id' => 'ut_top_header_border_separator_style',
                'label' => 'Border Style',
                'desc' => 'The border properties allow you to specify the style, width, and color.',
                'type' => 'border',
                'markup' => '1_1',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_top_header_settings',
                'required' => array(
                    'ut_top_header_border_separator' => 'on',
                )
            ),

            array(
                'id' => 'ut_top_header_border_bottom',
                'label' => 'Activate Border Bottom?',
                'desc' => 'Activating this option allows you to place a decoration at the bottom of the top header.',
                'type' => 'select',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_top_header_settings',
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

            ),

            array(
                'id' => 'ut_top_header_border_bottom_style',
                'label' => 'Border Style',
                'desc' => 'The border properties allow you to specify the style, width, and color.',
                'type' => 'border',
                'markup' => '1_1',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_top_header_settings',
                'required' => array(
                    'ut_top_header_border_bottom' => 'on',
                )
            ),

            // Left Top Header Area
            array(
                'id' => 'ut_top_header_left_settings_headline',
                'label' => 'Left Top Header Area',
                'desc' => 'Left Top Header Area',
                'type' => 'section_headline',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_top_header_settings',
            ),

            array(
                'id' => 'ut_top_header_left_content_type',
                'label' => 'Content Module',
                'desc' => 'Select your desired content module.',
                'type' => 'select',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_top_header_settings',
                'std' => 'company_social',
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

            ),

            array(
                'id' => 'ut_top_header_left_menu',
                'label' => 'Select Menu',
                'desc' => sprintf( 'In order to manage this menu please visit: Appearance > %s and create a new menu. Menus which are already assigned to a location do not appear on this option. Menus in this area can only display 2 navigation level. Keep in mind, that you can also create similar navigations with the custom fields module. An advantage of the custom field module is, that you can use icons. But custom fields can only display with a single item level and has no dropdowns.', '<a target="_blank" href="' . get_admin_url() . 'nav-menus.php">Menus</a>'),
                'type' => 'nav_menus',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_top_header_settings',
                'required' => array(
                    'ut_top_header_left_content_type' => 'custom_menu',
                )
            ),

            array(
                'id' => 'ut_top_header_left_extra_fields',
                'label' => 'Custom Fields',
                'desc' => 'Keep in mind, depending on the selected header layout the horizontal space is limited. You cannot add unlimited fields. Therefore on tablet and mobiles custom fields are reduced.',
                'type' => 'list-item',
                'list_title' => false,
                'markup' => '1_1',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_top_header_settings',
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
                    'ut_top_header_left_content_type' => 'custom_fields',
                )

            ),

            array(
                'id' => 'ut_top_header_left_toolbar',
                'label' => 'Toolbar',
                'desc' => 'A toolbar with cart, account, language switch, overlay menu and search icon. You can also drag and drop the items to change their order. Woocommerce Plugin is required for account and cart icon feature. WPML is required for the language switch feature.',
                'type' => 'header_toolbar',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_top_header_settings',
                'required' => array(
                    'ut_top_header_left_content_type' => 'toolbar'
                )
            ),

            // Right Top Header Area
            array(
                'id' => 'ut_top_header_right_settings_headline',
                'label' => 'Right Top Header Area',
                'desc' => 'Right Top Header Area',
                'type' => 'section_headline',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_top_header_settings',
            ),

            array(
                'id' => 'ut_top_header_right_content_type',
                'label' => 'Content Module',
                'desc' => 'Select your desired content module.',
                'type' => 'select',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_top_header_settings',
                'std' => 'company_contact',
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

            ),

            array(
                'id' => 'ut_top_header_right_menu',
                'label' => 'Select Menu',
                'desc' => sprintf( 'In order to manage this menu please visit: Appearance > %s and create a new menu. Menus which are already assigned to a location do not appear on this option. Menus in this area can only display 2 navigation level. Keep in mind, that you can also create similar navigations with the custom fields module. An advantage of the custom field module is, that you can use icons. But custom fields can only display with a single item level and has no dropdowns.', '<a target="_blank" href="' . get_admin_url() . 'nav-menus.php">Menus</a>'),
                'type' => 'nav_menus',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_top_header_settings',
                'required' => array(
                    'ut_top_header_right_content_type' => 'custom_menu',
                )
            ),

            array(
                'id' => 'ut_top_header_right_extra_fields',
                'label' => 'Custom Fields',
                'desc' => 'Keep in mind, depending on the selected header layout the horizontal space is limited. You cannot add unlimited fields. Therefore on tablet and mobiles custom fields are reduced.',
                'type' => 'list-item',
                'list_title' => false,
                'markup' => '1_1',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_top_header_settings',
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
                    'ut_top_header_right_content_type' => 'custom_fields',
                )

            ),

            array(
                'id' => 'ut_top_header_right_toolbar',
                'label' => 'Toolbar',
                'desc' => 'A toolbar with cart, account, language switch, overlay menu and search icon. You can also drag and drop the items to change their order. Woocommerce Plugin is required for account and cart icon feature. WPML is required for the language switch feature.',
                'type' => 'header_toolbar',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_top_header_settings',
                'required' => array(
                    'ut_top_header_right_content_type' => 'toolbar'
                )
            ),

            /*
            |--------------------------------------------------------------------------
            | Top Header Colors
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_top_header_color_setting_headline',
                'label' => 'Top Header Color Settings',
                'desc' => 'Color Settings',
                'type' => 'panel_headline',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_top_header_color_settings',
            ),

            array(
                'id' => 'ut_top_header_background_color',
                'label' => 'Background Color',
                'desc' => 'Color for entire top header, left and right area.',
                'type' => 'gradient_colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_top_header_color_settings',
            ),

            array(
                'id' => 'ut_top_header_text_color',
                'label' => 'Text Color',
                'desc' => 'Color for regular Text.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_top_header_color_settings',
            ),

            array(
                'id' => 'ut_top_header_icon_color',
                'label' => 'Icon Color',
                'desc' => 'Color for Icons.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_top_header_color_settings',
            ),

            array(
                'id' => 'ut_top_header_link_color',
                'label' => 'Link Color',
                'desc' => 'Color for Links.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_top_header_color_settings',
            ),

            array(
                'id' => 'ut_top_header_link_color_hover',
                'label' => 'Link Color Hover',
                'desc' => 'Color for Links on hover.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_top_header_color_settings',
            ),

            array(
                'id' => 'ut_top_header_social_icon_color',
                'label' => 'Social Icon Color',
                'desc' => 'Color for Social Icons.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_top_header_color_settings',
            ),

            array(
                'id' => 'ut_top_header_social_icon_color_hover',
                'label' => 'Social Icon Color Hover',
                'desc' => 'Color for Social Icons on hover.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_top_header_color_settings',
            ),

            array(
                'id' => 'ut_top_header_search_icon_color',
                'label' => 'Search Icon Color',
                'desc' => 'Color for Search Icon.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_top_header_color_settings',
            ),

            array(
                'id' => 'ut_top_header_search_icon_color_hover',
                'label' => 'Search Icon Color Hover',
                'desc' => 'Color for Search Icons on hover.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_top_header_color_settings',
            ),

            array(
                'id' => 'ut_top_header_submenu_headline',
                'label' => 'Submenus',
                'desc' => 'Submenus',
                'type' => 'section_headline',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_top_header_color_settings',
            ),

            array(
                'id' => 'ut_top_header_submenu_border',
                'label' => 'Activate Border?',
                'desc' => 'Activating this option allows you to place a decoration at the top of the Submenu.',
                'type' => 'select',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_top_header_color_settings',
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

            ),

            array(
                'id' => 'ut_top_header_submenu_border_top_width',
                'label' => 'Border Top Width',
                'desc' => 'Drag the handle to set the border width value.',
                'type' => 'numeric-slider',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_top_header_color_settings',
                'std' => 2,
                'min_max_step' => '0,10,1',
                'required' => array(
                    'ut_top_header_submenu_border' => 'on'
                )
            ),

            array(
                'id' => 'ut_top_header_submenu_border_top_color',
                'label' => 'Border Top Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_top_header_color_settings',
                'required' => array(
                    'ut_top_header_submenu_border' => 'on'
                )
            ),

            array(
                'id' => 'ut_top_header_submenu_link_color',
                'label' => 'Submenus Link Color',
                'desc' => 'Default Color is "Top Header Link Color".',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_top_header_color_settings',
            ),

            array(
                'id' => 'ut_top_header_submenu_link_color_hover',
                'label' => 'Submenus Link Color Hover',
                'desc' => 'Default Color is "Top Header Link Hover Color".',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_top_header_color_settings',
            ),

            array(
                'id' => 'ut_top_header_submenu_link_color_active',
                'label' => 'Submenus Link Color Active',
                'desc' => 'Default Color is "Theme Accent Color".',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_top_header_color_settings',
            ),

            array(
                'id' => 'ut_top_header_submenu_background',
                'label' => 'Submenus Background Color',
                'desc' => 'Default Color is "Top Header Background Color".',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_top_header_color_settings',
            ),

            array(
                'id' => 'ut_top_header_shopping_cart_headline',
                'label' => 'Woocommerce Mini Shopping Cart',
                'desc' => 'Woocommerce Mini Shopping Cart',
                'type' => 'section_headline',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_top_header_color_settings',
                //'collapse' => 'closed'
            ),

            array(
                'id' => 'ut_top_header_shopping_cart_count_color',
                'label' => 'Item Count Color',
                'desc' => 'Default Color is white. The counter is located right next to the shopping cart icon.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_top_header_color_settings',
            ),

            array(
                'id' => 'ut_top_header_shopping_cart_count_background',
                'label' => 'Item Count Background Color',
                'desc' => 'Default Color is theme accent color. The counter is located right next to the shopping cart icon.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_top_header_color_settings',
            ),

            array(
                'id' => 'ut_top_header_shopping_cart_item_delete_color',
                'label' => 'Item Delete Color',
                'desc' => 'Creates a separator between cart items.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_top_header_color_settings',
            ),

            array(
                'id' => 'ut_top_header_shopping_cart_item_delete_hover_color',
                'label' => 'Item Delete Hover Color',
                'desc' => 'Creates a separator between cart items.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_top_header_color_settings',
            ),

            array(
                'id' => 'ut_top_header_shopping_cart_item_separator',
                'label' => 'Item Separator',
                'desc' => 'Creates a separator between cart items.',
                'type' => 'border',
                'markup' => '1_1',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_top_header_color_settings',
            ),

            array(
                'id' => 'ut_top_header_shopping_cart_scrollbar',
                'label' => 'Cart Scrollbar Color',
                'desc' => 'If more than 3 items have been placed inside the cart, a scrollbar will automatically appear.',
                'type' => 'colorpicker',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_top_header_color_settings',
            ),

            array(
                'id' => 'ut_top_header_shopping_cart_summary_background',
                'label' => 'Shopping Cart Summary Background Color',
                'desc' => 'The Summary Area of the mini shopping cart contains the total number of items in your cart and the total price of all items. Additionally 2 Buttons are displaying allowing the user to view his cart on a single page or directly browse to the checkout page. Giving this area a background color will visually separate the summary from the cart items.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_top_header_color_settings',
            ),

            array(
                'id' => 'ut_top_header_shopping_cart_item_total_count',
                'label' => 'Total Item Count Color',
                'desc' => 'This total count belongs to the summary area and is located right above the cart buttons. Default Color is top header text color.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_top_header_color_settings',
            ),

            array(
                'id' => 'ut_top_header_shopping_cart_item_total_price',
                'label' => 'Total Price Color',
                'desc' => 'This total price belongs to the summary area and is located right above the cart buttons. Default Color is top header text color.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_top_header_color_settings',
            ),

            array(
                'id' => 'ut_top_header_shopping_cart_view_cart_button',
                'label' => 'View Cart Button',
                'desc' => 'Design your cart button.',
                'markup' => '1_1',
                'type' => 'button_builder_vc',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_top_header_color_settings',
            ),

            array(
                'id' => 'ut_top_header_shopping_cart_checkout_button',
                'label' => 'Checkout Button',
                'desc' => 'Design your checkout button.',
                'markup' => '1_1',
                'type' => 'button_builder_vc',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_top_header_color_settings',
            ),

            /*
            |--------------------------------------------------------------------------
            | Top Alternative Header Colors
            |--------------------------------------------------------------------------
			*/

            array(
                'id' => 'ut_top_header_secondary_color_setting_headline',
                'label' => 'Top Secondary Header Color Settings',
                'desc' => 'Color Settings',
                'type' => 'panel_headline',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_top_header_secondary_color_settings',
            ),

            array(
                'id' => 'ut_top_header_secondary_color_setting_Info',
                'label' => 'Top Header Color Settings',
                'desc' => 'These colors settings apply for pages where you use a secondary header custom skin and your hero is not active.',
                'type' => 'section_headline_info',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_top_header_secondary_color_settings',
            ),

            array(
                'id' => 'ut_top_header_secondary_background_color',
                'label' => 'Background Color',
                'desc' => 'Color for entire top header, left and right area.',
                'type' => 'gradient_colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_top_header_secondary_color_settings',
            ),

            array(
                'id' => 'ut_top_header_secondary_border_color',
                'label' => 'Border Color',
                'desc' => 'Color for entire top header, left and right area.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_top_header_secondary_color_settings',
            ),

            array(
                'id' => 'ut_top_header_secondary_text_color',
                'label' => 'Text Color',
                'desc' => 'Color for regular Text.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_top_header_secondary_color_settings',
            ),

            array(
                'id' => 'ut_top_header_secondary_icon_color',
                'label' => 'Icon Color',
                'desc' => 'Color for Icons.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_top_header_secondary_color_settings',
            ),

            array(
                'id' => 'ut_top_header_secondary_link_color',
                'label' => 'Link Color',
                'desc' => 'Color for Links.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_top_header_secondary_color_settings',
            ),

            array(
                'id' => 'ut_top_header_secondary_link_color_hover',
                'label' => 'Link Color Hover',
                'desc' => 'Color for Links on hover.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_top_header_secondary_color_settings',
            ),

            array(
                'id' => 'ut_top_header_secondary_social_icon_color',
                'label' => 'Social Icon Color',
                'desc' => 'Color for Social Icons.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_top_header_secondary_color_settings',
            ),

            array(
                'id' => 'ut_top_header_secondary_social_icon_color_hover',
                'label' => 'Social Icon Color Hover',
                'desc' => 'Color for Social Icons on hover.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_top_header_secondary_color_settings',
            ),

            array(
                'id' => 'ut_top_header_secondary_search_icon_color',
                'label' => 'Search Icon Color',
                'desc' => 'Color for Search Icon.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_top_header_secondary_color_settings',
            ),

            array(
                'id' => 'ut_top_header_secondary_search_icon_color_hover',
                'label' => 'Search Icon Color Hover',
                'desc' => 'Color for Search Icons on hover.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_top_header_secondary_color_settings',
            ),

            /*
            |--------------------------------------------------------------------------
            | Top Header Company Contact
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_top_header_company_settings_headline',
                'label' => 'Top Header Company Details',
                'type' => 'panel_headline',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_top_header_company_settings',
            ),

            array(
                'id' => 'ut_top_header_company_settings_Info',
                'label' => 'Top Header Company Details',
                'desc' => 'These options will overwrite your global company details.',
                'type' => 'section_headline_info',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_top_header_company_settings',
            ),

            array(
                'id' => 'ut_top_header_email',
                'label' => 'Email',
                'desc' => 'Please enter your company email.',
                'type' => 'text',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_top_header_company_settings',
            ),

            array(
                'id' => 'ut_top_header_phone',
                'label' => 'Phone',
                'desc' => 'Please enter your company phone number.',
                'type' => 'text',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_top_header_company_settings',
            ),

            array(
                'id' => 'ut_top_header_social_icons',
                'label' => 'Social Icons',
                'desc' => 'Add your desired social profile icon and links. <br /><strong>You can re-order with drag & drop, the order will update after saving.</strong>',
                'type' => 'list-item',
                'list_title' => false,
                'markup' => '1_1',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_top_header_company_settings',
                'settings' => array(
                    array(
                        'id' => 'icon',
                        'label' => 'Choose Social Icon',
                        'type' => 'select',
                        'class' => 'ut-select-setting-title',
                        'choices' => ot_recognized_social_links(),

                    ),
                    array(
                        'id' => 'link',
                        'label' => 'Enter Social Link',
                        'type' => 'text',
                        'rows' => '3'
                    )
                ),
            ),

            /*
            |--------------------------------------------------------------------------
            | Header and Navigation Configuration
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_navigation_setting_headline',
                'label' => 'Header and Navigation',
                'type' => 'panel_headline',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
            ),

            array(
                'id' => 'ut_navigation_setting_Info',
                'label' => 'Navigation',
                'desc' => 'These are your global Header and Navigation settings for the entire site. <br /><strong>Attention:</strong> Keep in mind, that you can overwrite these settings per page. Some demo websites (such as #23) have an active custom page navigation and header.',
                'type' => 'section_headline_info',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
            ),

            array(
                'id' => 'ut_header_layout',
                'label' => 'Header Position',
                'desc' => 'Select your desired Header and Navigation Position.',
                'type' => 'select',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
                'std' => 'default',
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

            ),

            /**
             * Vertical Side Navigation Options
             */

            array(
                'id' => 'ut_side_header_align',
                'label' => 'Header and Navigation Align',
                'desc' => 'Decide if header and navigation are located on the left or right side.',
                'type' => 'select',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
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
                    'ut_header_layout' => 'side'
                )
            ),

            array(
                'id' => 'ut_side_header_width_type',
                'label' => 'Header and Navigation Width',
                'desc' => 'Decide if you like to use a fixed side navigation width or a dynamic.',
                'type' => 'select',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
                'std' => 'dynamic',
                'choices' => array(
                    array(
                        'value' => 'fixed',
                        'label' => 'Fixed Width (275px)'
                    ),
                    array(
                        'value' => 'dynamic',
                        'label' => 'Dynamic Width'
                    )
                ),
                'required' => array(
                    'ut_header_layout' => 'side'
                )
            ),

            array(
                'id' => 'ut_side_header_width',
                'label' => 'Header and Navigation Dynamic Width',
                'desc' => 'Drag the handle to set the width. <br /><strong>Maximum value is: 50</strong>',
                'type' => 'numeric_slider',
                'std' => '25',
                'min_max_step' => '20,50,1',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'side',
                    'ut_side_header_width_type' => 'dynamic'
                )
            ),

            array(
                'id' => 'ut_site_logo_max_width',
                'label' => 'Logo Max Width',
                'desc' => 'Use an alternate Logo max width. Note: This Option affects all logos. <br /><strong>Maximum value is: 100!</strong>',
                'type' => 'numeric_slider',
                'std' => '100',
                'min_max_step' => '0,100,1',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'side'
                )
            ),

            array(
                'id' => 'ut_side_header_search_form',
                'label' => 'Display Search Form?',
                'desc' => 'An optional search form beneath the navigation.',
                'type' => 'select',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
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
                    'ut_header_layout' => 'side'
                )
            ),

            array(
                'id' => 'ut_side_header_copyright',
                'label' => 'Copyright',
                'desc' => 'An optional copyright information.',
                'type' => 'text',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'side'
                )
            ),

            array(
                'id' => 'ut_side_header_copyright_color',
                'label' => 'Copyright Color',
                'desc' => 'Desired color for copyright information.',
                'type' => 'colorpicker',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'side'
                )
            ),

            array(
                'id' => 'ut_side_header_activate_social_icons',
                'label' => 'Display Social Icons?',
                'desc' => 'An optional set of social icons.',
                'type' => 'select',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
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
                    'ut_header_layout' => 'side'
                )
            ),


            array(
                'id' => 'ut_side_header_social_icons',
                'label' => 'Social Icons',
                'desc' => 'Add your desired social profile icon and links. <br /><strong>You can re-order with drag & drop, the order will update after saving.</strong>',
                'type' => 'list-item',
                'list_title' => false,
                'markup' => '1_1',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
                'settings' => array(
                    array(
                        'id' => 'icon',
                        'label' => 'Choose Social Icon',
                        'type' => 'select',
                        'class' => 'ut-select-setting-title',
                        'choices' => ot_recognized_social_links()

                    ),
                    array(
                        'id' => 'link',
                        'label' => 'Enter Social Link',
                        'type' => 'text',
                        'rows' => '3'
                    )
                ),
                'required' => array(
                    'ut_header_layout' => 'side',
                    'ut_side_header_activate_social_icons' => 'on'
                )
            ),

            array(
                'id' => 'ut_side_header_background_image',
                'label' => 'Header Background Image',
                'desc' => '',
                'type' => 'background',
                'markup' => '1_1',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'side'
                )
            ),

            array(
                'id' => 'ut_side_navigation_shadow',
                'label' => 'Header Shadow',
                'desc' => 'Activate Header Shadow?',
                'type' => 'select',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
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
                    'ut_header_layout' => 'side',
                )
            ),

            array(
                'id' => 'ut_side_navigation_border',
                'label' => 'Header Border',
                'desc' => 'Activate Header Border?',
                'type' => 'select',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
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
                    'ut_header_layout' => 'side',
                )
            ),

            array(
                'id' => 'ut_side_navigation_border_color',
                'label' => 'Header Border Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'side',
                    'ut_side_navigation_border' => 'on',
                )
            ),


            /**
             * Horizontal Navigation Options
             */

            array(
                'id' => 'ut_navigation_scroll_position',
                'label' => 'Header Scroll Behaviour',
                'desc' => 'Select if header is always displaying "fixed" at top of your website or is "floating" on scroll all the time.',
                'type' => 'select',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
                'std' => 'floating',
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
                    'ut_header_layout' => 'default'
                )
            ),


            /**
             * Header on Hero
             */

            array(
                'id' => 'ut_navigation_on_hero',
                'label' => 'Place Header on Hero?',
                'desc' => 'A fixed header is usually located above the hero. By using this option, the header is forced to display directly on the hero, which can be useful if you have a custom skin with transparent colors. Predefined color skins with a transparent option are doing this by default.',
                'type' => 'select',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
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
                ),
                'required' => array(
                    'ut_header_layout' => 'default',
                )
            ),

            array(
                'id' => 'ut_navigation_hero_and_header_animation',
                'label' => 'Animate Header and Hero Section?',
                'desc' => 'Activated, Header and Hero Content will appear once the background image is loaded.',
                'type' => 'select',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
                'std' => 'on',
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
                    'ut_header_layout'      => 'default',
                    'ut_navigation_on_hero' => 'on'
                )
            ),


            /*
			 * Header Dimension Settings
			 */

            array(
                'id' => 'ut_navigation_width',
                'label' => 'Header Width',
                'desc' => 'It handles how the content is displaying within the header. Centered content has a max width of 1200px or what has been set in "Advanced" > "Content Spacing Settings". Fullwidth content is stretched to 100% width.',
                'type' => 'select',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
                'std' => 'centered',
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
                    'ut_header_layout' => 'default'
                )
            ),

            array(
                'id' => 'ut_navigation_height',
                'label' => 'Header Height',
                'desc' => 'Drag the handle to set the header height. Default: 80.',
                'std' => '80',
                'type' => 'numeric-slider',
                'min_max_step' => '50,120,1',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_header_top_layout' => 'default|style-1|style-2|style-3|style-8'
                )
            ),

            array(
                'id' => 'ut_site_logo_max_height',
                'label' => 'Logo Max Height',
                'desc' => 'Use an alternate Logo max height. Note: This Option affects all logos. <br /><strong>Maximum value is: 120!</strong>. Please note, this is a maximum size limited by the header size itself.',
                'type' => 'numeric_slider',
                'std' => '60',
                'min_max_step' => '0,120,1',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_header_top_layout' => 'default|style-1|style-2|style-3|style-8'
                )
            ),

            array(
                'id' => 'ut_side_site_logo_max_height',
                'label' => 'Logo Max Height',
                'desc' => 'Use an alternate Logo max height. Note: This Option affects all logos. <br /><strong>Maximum value is: 120!</strong>. Please note, this is a maximum size limited by the header size itself.',
                'type' => 'numeric_slider',
                'std' => '60',
                'min_max_step' => '0,120,1',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'side',
                )
            ),

            array(
                'id' => 'ut_site_logo_max_height_static',
                'label' => 'Logo Max Height',
                'desc' => 'Use an alternate Logo max height. Note: This Option affects all logos. <br /><strong>Maximum value is: 80!</strong>. Please note, this is a maximum size limited by the header size itself.',
                'type' => 'numeric_slider',
                'std' => '60',
                'min_max_step' => '0,80,1',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_header_top_layout' => 'style-4|style-5|style-6|style-7'
                )

            ),

            array(
                'id' => 'ut_site_logo_max_height_large',
                'label' => 'Logo Max Height',
                'desc' => 'Use an alternate Logo max height. Note: This Option affects all logos. <br /><strong>Maximum value is: 160!</strong>. Please note, this is a maximum size limited by the header size itself.',
                'type' => 'numeric_slider',
                'std' => '120',
                'min_max_step' => '0,160,1',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_header_top_layout' => 'style-9'
                )
            ),

            array(
                'id' => 'ut_overwrite_site_logo_max_height_mobile',
                'label' => 'Overwrite default Logo Max Height on Mobiles?',
                'desc' => 'The default Logo Max Height on Mobiles is 30.',
                'type' => 'select',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
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
            ),

            array(
                'id' => 'ut_site_logo_max_height_tablet',
                'label' => 'Logo Max Height Tablet',
                'desc' => 'Use an alternate Logo max height. Note: This Option affects all logos. <br /><strong>Maximum value is: 80!</strong>',
                'type' => 'numeric_slider',
                'std' => '40',
                'min_max_step' => '0,80,1',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_overwrite_site_logo_max_height_mobile' => 'on'
                )
            ),

            array(
                'id' => 'ut_site_logo_max_height_mobile',
                'label' => 'Logo Max Height Mobile',
                'desc' => 'Use an alternate Logo max height. Note: This Option affects all logos. <br /><strong>Maximum value is: 60!</strong>',
                'type' => 'numeric_slider',
                'std' => '30',
                'min_max_step' => '0,60,1',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_overwrite_site_logo_max_height_mobile' => 'on'
                )
            ),

            array(
                'id' => 'ut_header_separate_upper_lower',
                'label' => 'Separate Upper and Lower Area with a border?',
                'desc' => 'You can visually separate upper and lower area with border.',
                'type' => 'select',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
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
                ),
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_header_top_layout' => 'style-4|style-7'
                )
            ),

            array(
                'id' => 'ut_navigation_scroll_depth',
                'label' => 'Show Entire Header when scrolling down?',
                'desc' => 'The selected header has 2 rows of content. When scrolling down, only the lower areas remains visible. If you like to display the upper area as well, activate this option.',
                'type' => 'select',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
                'std' => '1',
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
                    'ut_header_layout' => 'default',
                    'ut_navigation_scroll_position' => 'floating',
                    'ut_header_top_layout' => 'style-4|style-5|style-6|style-7|style-9'
                )
            ),

            // deprecated but kept for fallback
            array(
                'id' => 'ut_site_navigation_no_logo',
                'label' => 'Hide Logo?',
                'desc' => 'You can optionally hide the logo from the header area.',
                'type' => 'select',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
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
                    'ut_header_layout' 	 => 'default',
                    'ut_header_top_layout' => 'default'
                )
            ),

            // deprecated but kept for fallback
            array(
                'id' => 'ut_site_navigation_center',
                'label' => 'Center Navigation?',
                'desc' => 'Since the main logo is not displaying anymore, would you like to center the main navigation?',
                'type' => 'select',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
                'std' => 'yes',
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
                    'ut_header_layout' => 'default',
                    'ut_header_top_layout' => 'default',
                    'ut_site_navigation_no_logo' => 'yes'
                )
            ),

            array(
                'id' => 'ut_header_top_layout',
                'label' => 'Header Layout',
                'desc' => 'Select desired Header and Navigation Layout. The "Top header" is completely separated from this option and can be configured individually inside the "Top Header" panel.',
                'type' => 'radio_image',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
                'std' => 'default',
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
                    'ut_header_layout' => 'default'
                )

            ),

            // Header Primary Module
            array(
                'id' => 'ut_header_extra_module_subheadline',
                'label' => 'Header Primary Extra Module',
                'type' => 'sub_section_inline_headline',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_header_top_layout' => 'style-2|style-5|style-6|style-7|style-8|style-9'
                )
            ),

            array(
                'id' => 'ut_header_primary_extra_module',
                'label' => 'Select Header Extra Module',
                'desc' => 'The selected Header Layout supports an extra module.',
                'type' => 'select',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
                'std' => 'company_social',
                'choices' => array(

                    array(
                        'value' => 'none',
                        'label' => 'Hide Modul'
                    ),

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
                )

            ),

            array(
                'id' => 'ut_header_primary_company_social_info',
                'label' => 'Company Details',
                'desc' => 'You can manage your companies social profile in "General" > "Company Details".',
                'type' => 'section_headline_info',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_header_top_layout' => 'style-2|style-5|style-6|style-7|style-8|style-9',
                    'ut_header_primary_extra_module' => 'company_social'
                )
            ),

            // Header Menu
            array(
                'id' => 'ut_header_primary_custom_menu',
                'label' => 'Select Menu',
                'desc' => sprintf( 'In order to manage this menu please visit: Appearance > %s and create a new menu. Menus which are already assigned to a location do not appear on this option.', '<a target="_blank" href="' . get_admin_url() . 'nav-menus.php">Menus</a>'),
                'type' => 'nav_menus',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_header_top_layout' => 'style-2|style-5|style-6|style-7|style-8|style-9',
                    'ut_header_primary_extra_module' => 'custom_menu'
                )
            ),

            array(
                'id' => 'ut_header_primary_custom_menu_label',
                'label' => 'Dropdown Menu Label',
                'desc' => 'Enter your desired label text for this dropdown. Default text is: More',
                'type' => 'text',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_header_top_layout' => 'style-2|style-5|style-6|style-7|style-8|style-9',
                    'ut_header_primary_extra_module' => 'custom_menu'
                )
            ),

            // Header Toolbar
            array(
                'id' => 'ut_header_primary_toolbar',
                'label' => 'Toolbar',
                'desc' => 'A toolbar with cart, account, language switch, overlay menu and search icon. You can also drag and drop the items to change their order. Woocommerce Plugin is required for account and cart icon feature. WPML is required for the language switch feature.',
                'type' => 'header_toolbar',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_header_top_layout' => 'style-2|style-5|style-6|style-7|style-8|style-9',
                    'ut_header_primary_extra_module' => 'toolbar'
                )
            ),

            /*array(
                'id' => 'ut_header_primary_toolbar_size',
                'label' => 'Toolbar Size',
                'desc' => 'Selected your desired size. We recommned using small sizes for small headers etc.',
                'type' => 'select',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
                'std' => 'small',
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
                )

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
                'label' => 'Manage Buttons',
                'desc' => 'Keep in mind, depending on the selected header layout the horizontal space is limited. <strong>You cannot add unlimited buttons.</strong>',
                'type' => 'list-item',
                'list_title' => false,
                'list_max' => '1',
                'markup' => '1_1',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
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
                )

            ),

            array(
                'id' => 'ut_header_primary_extra_buttons_max_2',
                'label' => 'Manage Buttons',
                'desc' => 'Keep in mind, depending on the selected header layout the horizontal space is limited. <strong>You cannot add unlimited buttons.</strong>',
                'type' => 'list-item',
                'list_title' => false,
                'list_max' => '2',
                'markup' => '1_1',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
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
                )

            ),

            // Header Primary Extra Custom Fields
            array(
                'id' => 'ut_header_primary_extra_fields_max_1',
                'label' => 'Custom Fields',
                'desc' => 'Keep in mind, depending on the selected header layout the horizontal space is limited. You cannot add unlimited fields.',
                'type' => 'list-item',
                'list_title' => false,
                'list_max' => '1',
                'markup' => '1_1',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
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
                )

            ),

            array(
                'id' => 'ut_header_primary_extra_fields_max_2',
                'label' => 'Custom Fields',
                'desc' => 'Keep in mind, depending on the selected header layout the horizontal space is limited. You cannot add unlimited fields.',
                'type' => 'list-item',
                'list_title' => false,
                'list_max' => '2',
                'markup' => '1_1',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
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
                )

            ),

            // Header Secondary Module
            array(
                'id' => 'ut_header_secondary_extra_module_subheadline',
                'label' => 'Header Secondary Extra Module',
                'type' => 'sub_section_inline_headline',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_header_top_layout' => 'style-5|style-6|style-7|style-8|style-9'
                )
            ),

            array(
                'id' => 'ut_header_secondary_extra_module',
                'label' => 'Select Header Extra Module',
                'desc' => 'The selected Header Layout supports an extra module.',
                'type' => 'select',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
                'std' => 'company_social',
                'choices' => array(

                    array(
                        'value' => 'none',
                        'label' => 'Hide Modul'
                    ),

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
                )

            ),

            array(
                'id' => 'ut_header_secondary_company_social_info',
                'label' => 'Company Details',
                'desc' => 'You can manage your companies social profile in "General" > "Company Details".',
                'type' => 'section_headline_info',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_header_top_layout' => 'style-5|style-6|style-7|style-8|style-9',
                    'ut_header_secondary_extra_module' => 'company_social'
                )
            ),

            // Header Menu
            array(
                'id' => 'ut_header_secondary_custom_menu',
                'label' => 'Select Menu',
                'desc' => sprintf( 'In order to manage this menu please visit: Appearance > %s and create a new menu. Menus which are already assigned to a location do not appear on this option.', '<a target="_blank" href="' . get_admin_url() . 'nav-menus.php">Menus</a>'),
                'type' => 'nav_menus',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_header_top_layout' => 'style-5|style-6|style-7|style-8|style-9',
                    'ut_header_secondary_extra_module' => 'custom_menu'
                )
            ),

            array(
                'id' => 'ut_header_secondary_custom_menu_label',
                'label' => 'Dropdown Menu Label',
                'desc' => 'Enter your desired label text for this dropdown. Default text is: More',
                'type' => 'text',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_header_top_layout' => 'style-5|style-6|style-7|style-8|style-9',
                    'ut_header_secondary_extra_module' => 'custom_menu'
                )
            ),

            // Toolbar
            array(
                'id' => 'ut_header_secondary_toolbar',
                'label' => 'Toolbar',
                'desc' => 'A toolbar with cart, account, language switch, overlay menu and search icon. You can also drag and drop the items to change their order. Woocommerce Plugin is required for account and cart icon feature. WPML is required for the language switch feature.',
                'type' => 'header_toolbar',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_header_top_layout' => 'style-5|style-6|style-7|style-8|style-9',
                    'ut_header_secondary_extra_module' => 'toolbar'
                )
            ),

            /*array(
                'id' => 'ut_header_secondary_toolbar_size',
                'label' => 'Toolbar Size',
                'desc' => 'Selected your desired size. We recommned using small sizes for small headers etc.',
                'type' => 'select',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
                'std' => 'small',
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
                )

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
                'label' => 'Manage Buttons',
                'desc' => 'Keep in mind, depending on the selected header layout the horizontal space is limited. You cannot add unlimited buttons.',
                'type' => 'list-item',
                'list_title' => false,
                'markup' => '1_1',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
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
                )

            ),


            // Header Secondary Extra Custom Fields
            array(
                'id' => 'ut_header_secondary_extra_fields',
                'label' => 'Custom Fields',
                'desc' => 'Keep in mind, depending on the selected header layout the horizontal space is limited. You cannot add unlimited fields.',
                'type' => 'list-item',
                'list_title' => false,
                'list_max' => '2',
                'markup' => '1_1',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
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
                )

            ),


            // Header Tertiary Module
            array(
                'id' => 'ut_header_tertiary_extra_module_subheadline',
                'label' => 'Header Tertiary Extra Module',
                'type' => 'sub_section_inline_headline',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_header_top_layout' => 'style-5|style-6|style-9'
                )
            ),

            array(
                'id' => 'ut_header_tertiary_extra_module',
                'label' => 'Select Header Extra Module',
                'desc' => 'The selected Header Layout supports an extra module.',
                'type' => 'select',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
                'std' => 'company_social',
                'choices' => array(

                    array(
                        'value' => 'none',
                        'label' => 'Hide Modul'
                    ),

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
                )

            ),

            array(
                'id' => 'ut_header_tertiary_company_social_info',
                'label' => 'Company Details',
                'desc' => 'You can manage your companies social profile in "General" > "Company Details".',
                'type' => 'section_headline_info',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_header_top_layout' => 'style-5|style-6|style-9',
                    'ut_header_tertiary_extra_module' => 'company_social'
                )
            ),

            // Header Menu
            array(
                'id' => 'ut_header_tertiary_custom_menu',
                'label' => 'Select Menu',
                'desc' => sprintf( 'In order to manage this menu please visit: Appearance > %s and create a new menu. Menus which are already assigned to a location do not appear on this option.', '<a target="_blank" href="' . get_admin_url() . 'nav-menus.php">Menus</a>'),
                'type' => 'nav_menus',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_header_top_layout' => 'style-5|style-6|style-9',
                    'ut_header_tertiary_extra_module' => 'custom_menu'
                )
            ),

            array(
                'id' => 'ut_header_tertiary_custom_menu_label',
                'label' => 'Dropdown Menu Label',
                'desc' => 'Enter your desired label text for this dropdown. Default text is: More',
                'type' => 'text',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_header_top_layout' => 'style-5|style-6|style-9',
                    'ut_header_tertiary_extra_module' => 'custom_menu'
                )
            ),

            array(
                'id' => 'ut_header_tertiary_toolbar',
                'label' => 'Toolbar',
                'desc' => 'A toolbar with cart, account, language switch, overlay menu and search icon. You can also drag and drop the items to change their order. Woocommerce Plugin is required for account and cart icon feature. WPML is required for the language switch feature.',
                'type' => 'header_toolbar',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_header_top_layout' => 'style-5|style-6|style-9',
                    'ut_header_tertiary_extra_module' => 'toolbar'
                )
            ),

            /*array(
                'id' => 'ut_header_tertiary_toolbar_size',
                'label' => 'Toolbar Size',
                'desc' => 'Selected your desired size. We recommned using small sizes for small headers etc.',
                'type' => 'select',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
                'std' => 'small',
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
                )

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
                'label' => 'Manage Buttons',
                'desc' => 'Keep in mind, depending on the selected header layout the horizontal space is limited. You cannot add unlimited buttons.',
                'type' => 'list-item',
                'list_title' => false,
                'list_max' => '1',
                'markup' => '1_1',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
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
                )

            ),


            // Header Tertiary Extra Custom Fields
            array(
                'id' => 'ut_header_tertiary_extra_fields_max_2',
                'label' => 'Custom Fields',
                'desc' => 'Keep in mind, depending on the selected header layout the horizontal space is limited. You cannot add unlimited fields.',
                'type' => 'list-item',
                'list_title' => false,
                'list_max' => '2',
                'markup' => '1_1',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
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
                )

            ),

            /*
			 * Header Navigation Custom Settings
			 */
            array(
                'id' => 'ut_header_navigation_style_settings_subheadline',
                'label' => 'Navigation Style Settings',
                'type' => 'sub_section_inline_headline',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                )
            ),

            array(
                'id' => 'ut_navigation_style',
                'label' => 'Navigation Style',
                'desc' => 'Select your desired navigation first level style.',
                'type' => 'select',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
                'std' => 'separator',
                'choices' => array(
                    array(
                        'value' => 'separator',
                        'label' => 'Navigation Items separated with a dot or custom character'
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
                'required' => array(
                    'ut_header_layout' => 'default'
                )
            ),

            array(
                'id' => 'ut_navigation_item_separator_style',
                'label' => 'Navigation Item Separator Style',
                'desc' => 'Separators are used as a divider between navigation items.',
                'type' => 'select',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
                'std' => 'default',
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
                    'ut_header_layout'      => 'default',
                    'ut_navigation_style'   => 'separator'
                )
            ),

            array(
                'id' => 'ut_navigation_item_separator',
                'label' => 'Navigation Custom Item Separator',
                'desc' => 'Enter your desired custom separator. You can also leave this field empty if no separator is wished.',
                'type' => 'text',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_style' => 'separator',
                    'ut_navigation_item_separator_style' => 'custom',
                )
            ),

            array(
                'id' => 'ut_navigation_animation_line_position',
                'label' => 'Animating Border Position',
                'desc' => 'Select your desired position for animating line.',
                'type' => 'select',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
                'std' => 'bottom',
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
                    'ut_header_layout' => 'default',
                    'ut_navigation_style' => 'animation-line',
                )
            ),

            array(
                'id' => 'ut_navigation_animation_line_height',
                'label' => 'Animating Border Height',
                'desc' => 'Default: 2.',
                'std' => '2',
                'type' => 'numeric-slider',
                'min_max_step' => '1,4,1',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_style' => 'animation-line',
                )
            ),

            array(
                'id' => 'ut_header_navigation_submenu_animation_settings_subheadline',
                'label' => 'Navigation Submenu Animation Settings',
                'type' => 'sub_section_inline_headline',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                )
            ),

            array(
                'id' => 'ut_navigation_submenu_animation',
                'label' => 'Animate Sub Menu to top?',
                'desc' => 'Once activated, mega menu container and sub menu container are animating up when they appear.',
                'type' => 'select',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
                'std' => 'yes',
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
                    'ut_header_layout' => 'default',
                )
            ),

            array(
                'id' => 'ut_header_navigation_submenu_content_animation_settings_subheadline',
                'label' => 'Navigation Submenu Content Animation Settings',
                'type' => 'sub_section_inline_headline',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                )
            ),

            array(
                'id' => 'ut_navigation_column_animation',
                'label' => 'Animate Sub Menu and Mega Menu Content?',
                'desc' => 'Once activated, mega menu columns and sub level menu items are animating slightly up when they appear.',
                'type' => 'select',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
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
                    'ut_header_layout' => 'default',
                    'ut_navigation_submenu_animation' => 'no'
                )
            ),

            array(
                'id' => 'ut_navigation_column_link_animation',
                'label' => 'Add Fancy Animation on Hover?',
                'desc' => 'Once activated, sub menu links und mega menu links are getting an additional mouse over animation or decoration.',
                'type' => 'select',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
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
                    'ut_header_layout' => 'default',
                )
            ),

            array(
                'id' => 'ut_navigation_column_link_animation_type',
                'label' => 'Animation / Decoration Type.',
                'desc' => 'Choose desired animation or decoration type.',
                'type' => 'select',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
                'std' => 'background',
                'choices' => array(
                    array(
                        'value' => 'background',
                        'label' => 'Background Color Animation'
                    ),
                    array(
                        'value' => 'border',
                        'label' => 'Animating Border'
                    ),
                    array(
                        'value' => 'background-static',
                        'label' => 'Static Background Color'
                    ),
                ),
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_column_link_animation' => 'yes',
                )
            ),

            array(
                'id' => 'ut_navigation_column_link_animation_border_height',
                'label' => 'Animating Border Height',
                'desc' => 'Default: 2.',
                'std' => '2',
                'type' => 'numeric-slider',
                'min_max_step' => '1,4,1',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_column_link_animation_type' => 'border',
                )
            ),

            array(
                'id' => 'ut_header_navigation_transition_settings_subheadline',
                'label' => 'Navigation Transition Settings',
                'type' => 'sub_section_inline_headline',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                )
            ),

            array(
                'id' => 'ut_navigation_no_mouse_transition',
                'label' => 'Deactivate Header Background Transition on "Mouse Over"?',
                'desc' => 'By default, header background colors are transitioning smoothly.',
                'type' => 'select',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_navigation_settings',
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
                    'ut_header_layout' => 'default',
                )
            ),

            /*
             * Header and Navigation Colors
             */
            array(
                'id' => 'ut_navigation_skin_settings_headline',
                'label' => 'Color Skin Settings',
                'desc' => 'Color Skin Settings',
                'type' => 'panel_headline',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
            ),

            array(
                'id' => 'ut_navigation_skin',
                'label' => 'Header Color Skin',
                'desc' => 'Brookyln provides 2 default color skins for your header and navigation. If these skins do not match your requirements simply use the custom option and individualize it to your needs.',
                'type' => 'select',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'std' => 'ut-header-light',
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
                    'ut_header_layout' => 'default|side'
                )
            ),

            array(
                'id' => 'ut_navigation_darkskin_settings_headline',
                'label' => 'Dark Skin Settings',
                'desc' => 'Dark Skin Settings',
                'type' => 'section_headline',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_navigation_skin' => 'ut-header-dark',
                    'ut_header_layout' => 'default'
                )
            ),

            array(
                'id' => 'ut_navigation_lightskin_settings_headline',
                'label' => 'Light Skin Settings',
                'desc' => 'Light Skin Settings',
                'type' => 'section_headline',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_navigation_skin' => 'ut-header-light',
                    'ut_header_layout' => 'default'
                )
            ),

            /* setting for both base skins */
            array(
                'id' => 'ut_navigation_state',
                'label' => 'Always show Header and Navigation?',
                'desc' => 'This option makes header and navigation visible all the time. If you choose "On (transparent)". The navigation will turn into the chosen skin when reaching the main content."',
                'type' => 'select',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'std' => 'off',
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
                    'ut_navigation_skin' => 'ut-header-dark|ut-header-light',
                    'ut_header_layout' => 'default'
                )
            ),

            array(
                'id' => 'ut_navigation_shadow',
                'label' => 'Header Shadow',
                'desc' => 'Activate Header Shadow?',
                'type' => 'select',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'std' => 'on',
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
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-light|ut-header-dark',
                    'ut_navigation_state' => 'on|off'
                )
            ),

            array(
                'id' => 'ut_navigation_border_bottom',
                'label' => 'Header Border Bottom',
                'desc' => 'Activate Header Border Bottom?',
                'type' => 'select',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'std' => 'on',
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
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-light',
                    'ut_navigation_state' => 'on|off'
                )
            ),

            array(
                'id' => 'ut_navigation_transparent_border',
                'label' => 'Activate Navigation Border Bottom?',
                'desc' => 'A small decoration line.',
                'type' => 'select',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
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
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-light|ut-header-dark',
                    'ut_navigation_state' => 'on_transparent'
                )
            ),

            array(
                'id' => 'ut_navigation_customskin_settings_headline',
                'label' => 'Custom Skin Settings',
                'desc' => 'Custom Skin Settings',
                'type' => 'section_headline',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_header_layout' => 'default'
                )
            ),

	        array(
		        'id' => 'ut_navigation_customskin_state',
		        'label' => 'Always show Header and Navigation?',
		        'desc' => 'This option makes header and navigation visible all the time. If you choose "Yes, but switch to Content Skin (Secondary) on scroll!". The navigation will turn into the content skin when reaching the main content. There content skin settings will appear once you select this option."',
		        'type' => 'select',
		        'section' => 'ut_header_settings',
		        'subsection' => 'ut_header_color_settings',
		        'std' => 'on',
		        'markup' => '1_1',
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
			        'ut_navigation_skin' => 'ut-header-custom',
			        'ut_header_layout' => 'default'
		        )
	        ),

            /* New Waypoint */
            array(
                'id' => 'ut_navigation_skin_waypoint',
                'label' => 'Select Waypoint when skin swap should happen.',
                'desc' => 'There are currently 2 waypoints available.',
                'type' => 'select',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'std' => 'content',
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
                    'ut_header_layout' => 'default'
                )
            ),

            /* Primary Skin */
            array(
                'id' => 'ut_navigation_customskin_primary_settings_headline',
                'label' => 'Hero Skin (Primary) Settings',
                'desc' => 'Hero Skin (Primary) Settings',
                'type' => 'section_headline',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on|on_switch|off',
                    'ut_header_layout' => 'default'
                )
            ),
            array(
                'id' => 'ut_side_navigation_customskin_primary_settings_headline',
                'label' => 'Color Skin Settings',
                'desc' => 'Color Skin Settings',
                'type' => 'section_headline',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on|on_switch|off',
                    'ut_header_layout' => 'side'
                )
            ),


            array(
                'id' => 'ut_header_ps_text_logo_color',
                'label' => 'Text Logo Color',
                'desc' => 'RGBA Color. Only applies if no main logo has been uploaded and set. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on|on_switch|off'
                )
            ),

            array(
                'id' => 'ut_header_ps_text_logo_color_hover',
                'label' => 'Text Logo Color Hover',
                'desc' => 'RGBA Color. Only applies if no main logo has been uploaded and set. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on|on_switch|off'
                )
            ),

            array(
                'id' => 'ut_subheadline_ps_header_colors',
                'label' => 'Header Colors',
                'type' => 'sub_section_headline',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on|on_switch|off'
                )
            ),

            array(
                'id' => 'ut_header_ps_background_color',
                'label' => 'Background Color',
                'desc' => 'If you consider using transparent colors, we recommend turning the option "Place Header on Hero" in "Navigation Settings" to on.',
                'type' => 'gradient_colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on|on_switch|off'
                )
            ),

            array(
                'id' => 'ut_header_ps_separator_border_color',
                'label' => 'Separator Border Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_header_top_layout' => 'style-4|style-5|style-6|style-7|style-9',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on|on_switch|off'
                )
            ),

            array(
                'id' => 'ut_header_ps_shadow_color',
                'label' => 'Shadow Color',
                'desc' => 'You can turn off the shadow by settings its opacity to 0. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on|on_switch|off'
                )
            ),

            array(
                'id' => 'ut_header_ps_border_color',
                'label' => 'Border Bottom Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on|on_switch|off'
                )
            ),

            array(
                'id' => 'ut_subheadline_ps_fl_colors',
                'label' => 'Navigation First Level Colors',
                'type' => 'sub_section_headline',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on|on_switch|off'
                )
            ),

            array(
                'id' => 'ut_navigation_ps_fl_color',
                'label' => 'Link Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on|on_switch|off'
                )
            ),

            array(
                'id' => 'ut_navigation_ps_fl_color_hover',
                'label' => 'Link Hover Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on|on_switch|off'
                )
            ),

            array(
                'id' => 'ut_navigation_ps_fl_dot_color',
                'label' => 'Dot Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on|on_switch|off'
                )
            ),

            array(
                'id' => 'ut_navigation_ps_fl_active_color',
                'label' => 'Active Link Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on|on_switch|off'
                )
            ),

            array(
                'id' => 'ut_navigation_ps_fl_decoration_color',
                'label' => 'Animation Decoration Line Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_navigation_skin'  => 'ut-header-custom',
                    'ut_navigation_style' => 'animation-line'
                )
            ),

	        array(
		        'id' => 'ut_navigation_ps_fl_description_color',
		        'label' => 'Description Color',
		        'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
		        'type' => 'colorpicker',
		        'mode' => 'rgb',
		        'section' => 'ut_header_settings',
		        'subsection' => 'ut_header_color_settings',
		        'required' => array(
			        'ut_navigation_skin' => 'ut-header-custom',
		        )
	        ),

            array(
                'id' => 'ut_navigation_ps_fl_arrow_color',
                'label' => 'Arrow Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'side',
                    'ut_navigation_skin' => 'ut-header-custom',
                )
            ),
            array(
                'id' => 'ut_subheadline_ps_sl_colors',
                'label' => 'Navigation Sub Menu And Mega Menu Colors',
                'type' => 'sub_section_headline',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on|on_switch|off'
                )
            ),
            array(
                'id' => 'ut_navigation_ps_sl_background_color',
                'label' => 'Background Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'gradient_colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on|on_switch|off'
                )
            ),
            array(
                'id' => 'ut_navigation_ps_sl_color',
                'label' => 'Link Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on|on_switch|off'
                )
            ),
            array(
                'id' => 'ut_navigation_ps_sl_color_hover',
                'label' => 'Link Hover Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on|on_switch|off'
                )
            ),
            array(
                'id' => 'ut_navigation_ps_sl_active_color',
                'label' => 'Active Link Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on|on_switch|off'
                )
            ),
            array(
                'id' => 'ut_navigation_ps_sl_arrow_color',
                'label' => 'Arrow Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'side',
                    'ut_navigation_skin' => 'ut-header-custom',
                )
            ),
            array(
                'id' => 'ut_navigation_ps_sl_animation_color',
                'label' => 'Link Animation Border / Background Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on|on_switch|off',
                    'ut_navigation_column_link_animation' => 'yes',
                )
            ),
            array(
                'id' => 'ut_navigation_ps_megamenu_column_title_color',
                'label' => 'Megamenu Column Title Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on|on_switch|off'
                )
            ),
            array(
                'id' => 'ut_navigation_ps_megamenu_column_title_color_hover',
                'label' => 'Megamenu Column Title Hover Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on|on_switch|off'
                )
            ),
            array(
                'id' => 'ut_navigation_ps_header_social_icons',
                'label' => 'Social Icons',
                'type' => 'sub_section_headline',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on|on_switch|off'
                )
            ),
            array(
                'id' => 'ut_navigation_ps_header_social_icons_color',
                'label' => 'Social Icons Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on|on_switch|off'
                )
            ),
            array(
                'id' => 'ut_navigation_ps_header_social_icons_color_hover',
                'label' => 'Social Icons Color Hover',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on|on_switch|off'
                )
            ),
            array(
                'id' => 'ut_navigation_ps_sl_border_settings',
                'label' => 'Sub Menu Border and Shadow Settings',
                'type' => 'sub_section_inline_headline',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on|on_switch|off'
                )
            ),
            array(
                'id' => 'ut_navigation_ps_sl_border_width',
                'label' => 'Border Top Width',
                'desc' => 'Drag the handle to set the border width value.',
                'type' => 'numeric-slider',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'std' => 1,
                'min_max_step' => '0,10,1',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on|on_switch|off'
                )
            ),
            array(
                'id' => 'ut_navigation_ps_sl_border_color',
                'label' => 'Border Top Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on|on_switch|off'
                )
            ),
            array(
                'id' => 'ut_navigation_ps_sl_borders',
                'label' => 'Remaining Borders',
                'desc' => 'Individually Border Right Left and Bottom Style.',
                'type' => 'border',
                'markup' => '1_1',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on|on_switch|off'
                )
            ),
            array(
                'id' => 'ut_navigation_ps_sl_mm_border',
                'label' => 'Mega Menu Column Border',
                'type' => 'border',
                'markup' => '1_1',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on|on_switch|off'
                )
            ),
            array(
                'id' => 'ut_navigation_ps_sl_shadow_color',
                'label' => 'Shadow Color',
                'desc' => 'You can turn off the shadow by settings its opacity to 0. Simply use the adjustment bar on the right of the colorpicker.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on|on_switch|off'
                )
            ),

            // Header Mini Cart
            array(
                'id' => 'ut_navigation_ps_shopping_cart_headline',
                'label' => 'Woocommerce Mini Shopping Cart',
                'desc' => 'Woocommerce Mini Shopping Cart',
                'type' => 'section_headline',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                //'collapse' => 'closed'
            ),

            array(
                'id' => 'ut_navigation_ps_shopping_cart_count_color',
                'label' => 'Item Count Color',
                'desc' => 'Default Color is white. The counter is located right next to the shopping cart icon.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
            ),

            array(
                'id' => 'ut_navigation_ps_shopping_cart_count_background',
                'label' => 'Item Count Background Color',
                'desc' => 'Default Color is theme accent color. The counter is located right next to the shopping cart icon.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
            ),

            array(
                'id' => 'ut_navigation_ps_shopping_cart_item_delete_color',
                'label' => 'Item Delete Color',
                'desc' => 'Creates a separator between cart items.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
            ),

            array(
                'id' => 'ut_navigation_ps_shopping_cart_item_delete_hover_color',
                'label' => 'Item Delete Hover Color',
                'desc' => 'Creates a separator between cart items.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
            ),

            array(
                'id' => 'ut_navigation_ps_shopping_cart_item_separator',
                'label' => 'Item Separator',
                'desc' => 'Creates a separator between cart items.',
                'type' => 'border',
                'markup' => '1_1',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
            ),

            array(
                'id' => 'ut_navigation_ps_shopping_cart_scrollbar',
                'label' => 'Cart Scrollbar Color',
                'desc' => 'If more than 3 items have been placed inside the cart, a scrollbar will automatically appear.',
                'type' => 'colorpicker',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
            ),

            array(
                'id' => 'ut_navigation_ps_shopping_cart_summary_background',
                'label' => 'Shopping Cart Summary Background Color',
                'desc' => 'The Summary Area of the mini shopping cart contains the total number of items in your cart and the total price of all items. Additionally 2 Buttons are displaying allowing the user to view his cart on a single page or directly browse to the checkout page. Giving this area a background color will visually separate the summary from the cart items.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
            ),

            array(
                'id' => 'ut_navigation_ps_shopping_cart_item_total_count',
                'label' => 'Total Item Count Color',
                'desc' => 'This total count belongs to the summary area and is located right above the cart buttons. Default Color is top header text color.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
            ),

            array(
                'id' => 'ut_navigation_ps_shopping_cart_item_total_price',
                'label' => 'Total Price Color',
                'desc' => 'This total price belongs to the summary area and is located right above the cart buttons. Default Color is top header text color.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
            ),

            array(
                'id' => 'ut_navigation_ps_shopping_cart_view_cart_button',
                'label' => 'View Cart Button',
                'desc' => 'Design your cart button.',
                'markup' => '1_1',
                'type' => 'button_builder_vc',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
            ),

            array(
                'id' => 'ut_navigation_ps_shopping_cart_checkout_button',
                'label' => 'Checkout Button',
                'desc' => 'Design your checkout button.',
                'markup' => '1_1',
                'type' => 'button_builder_vc',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
            ),

            /* optional hover state */
            array(
                'id' => 'ut_subheadline_ps_hover_colors',
                'label' => 'Hover State Colors',
                'type' => 'section_headline',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                // 'collapse' => 'closed',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch'
                )
            ),

            array(
                'id' => 'ut_navigation_ps_hover_state',
                'label' => 'Add Hover State?',
                'desc' => 'Add a hover state if you mouseover the header.',
                'type' => 'select',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'std' => 'off',
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
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch'
                )
            ),

            array(
                'id' => 'ut_header_ps_background_color_hover',
                'label' => 'Header Background Color',
                'type' => 'gradient_colorpicker',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch',
                    'ut_navigation_ps_hover_state' => 'on'
                )
            ),

            array(
                'id' => 'ut_header_ps_separator_border_color_hover',
                'label' => 'Separator Border Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_header_top_layout' => 'style-4|style-5|style-6|style-7|style-9',
                    'ut_navigation_customskin_state' => 'on_switch',
                    'ut_navigation_ps_hover_state' => 'on'
                )
            ),

            array(
                'id' => 'ut_header_ps_hover_text_logo_color',
                'label' => 'Text Logo Color',
                'type' => 'colorpicker',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch',
                    'ut_navigation_ps_hover_state' => 'on'
                )
            ),

            array(
                'id' => 'ut_header_ps_hover_text_logo_color_hover',
                'label' => 'Text Logo Color Hover',
                'type' => 'colorpicker',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch',
                    'ut_navigation_ps_hover_state' => 'on'
                )
            ),

            array(
                'id' => 'ut_header_ps_border_color_hover',
                'label' => 'Header Border Color',
                'type' => 'colorpicker',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch',
                    'ut_navigation_ps_hover_state' => 'on'
                )
            ),

            array(
                'id' => 'ut_header_ps_shadow_color_hover',
                'label' => 'Header Shadow Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch',
                    'ut_navigation_ps_hover_state' => 'on'
                )
            ),

            array(
                'id' => 'ut_navigation_ps_hover_fl_color',
                'label' => 'Navigation First Level Link Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch',
                    'ut_navigation_ps_hover_state' => 'on'
                )
            ),

            array(
                'id' => 'ut_navigation_ps_hover_fl_color_hover',
                'label' => 'Navigation First Level Link Color Hover',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch',
                    'ut_navigation_ps_hover_state' => 'on'
                )
            ),

            array(
                'id' => 'ut_navigation_ps_hover_fl_color_active',
                'label' => 'Navigation First Level Link Active Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch',
                    'ut_navigation_ps_hover_state' => 'on'
                )
            ),

            array(
                'id' => 'ut_navigation_ps_hover_fl_dot_color',
                'label' => 'Navigation First Level Dot Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch',
                    'ut_navigation_ps_hover_state' => 'on'
                )
            ),

            array(
                'id' => 'ut_navigation_ps_hover_fl_decoration_color',
                'label' => 'Navigation First Level Animation Decoration Line Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch',
                    'ut_navigation_style' => 'animation-line',
                    'ut_navigation_ps_hover_state' => 'on'
                )
            ),

	        array(
		        'id' => 'ut_navigation_ps_hover_fl_description_color',
		        'label' => 'Description Color',
		        'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
		        'type' => 'colorpicker',
		        'mode' => 'rgb',
		        'section' => 'ut_header_settings',
		        'subsection' => 'ut_header_color_settings',
		        'required' => array(
			        'ut_header_layout' => 'default',
			        'ut_navigation_skin' => 'ut-header-custom',
			        'ut_navigation_customskin_state' => 'on_switch',
			        'ut_navigation_ps_hover_state' => 'on',
		        )
	        ),


            /* Secondary Skin */
            array(
                'id' => 'ut_navigation_customskin_secondary_settings_headline',
                'label' => 'Content Skin (Secondary) Settings',
                'desc' => 'Content Skin (Secondary) Settings',
                'type' => 'section_headline',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch'
                )
            ),

            array(
                'id' => 'ut_header_ss_text_logo_color',
                'label' => 'Text Logo Color',
                'desc' => 'Only applies if no Main Logo has been uploaded and set.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch'
                )

            ),

            array(
                'id' => 'ut_header_ss_text_logo_color_hover',
                'label' => 'Text Logo Color Hover',
                'desc' => 'Only applies if no main logo has been uploaded and set. ',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch'
                )
            ),

            array(
                'id' => 'ut_subheadline_ss_header_colors',
                'label' => 'Header Colors',
                'type' => 'sub_section_headline',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch'
                )
            ),

            array(
                'id' => 'ut_header_ss_background_color',
                'label' => 'Background Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'gradient_colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch'
                )
            ),

            array(
                'id' => 'ut_header_ss_separator_border_color',
                'label' => 'Separator Border Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_header_top_layout' => 'style-4|style-5|style-6|style-7|style-9',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch'
                )
            ),

            array(
                'id' => 'ut_header_ss_shadow_color',
                'label' => 'Shadow Color',
                'desc' => 'You can turn off the shadow by settings its opacity to 0. Simply use the adjustment bar on the right of the colorpicker.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch'
                )
            ),
            array(
                'id' => 'ut_header_ss_border_color',
                'label' => 'Border Bottom Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch'
                )
            ),
            array(
                'id' => 'ut_subheadline_ss_fl_colors',
                'label' => 'Navigation First Level Colors',
                'type' => 'sub_section_headline',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch'
                )
            ),
            array(
                'id' => 'ut_navigation_ss_fl_color',
                'label' => 'Link Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch'
                )
            ),
            array(
                'id' => 'ut_navigation_ss_fl_color_hover',
                'label' => 'Link Hover Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch'
                )
            ),
            array(
                'id' => 'ut_navigation_ss_fl_dot_color',
                'label' => 'Dot Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch'
                )
            ),
            array(
                'id' => 'ut_navigation_ss_fl_active_color',
                'label' => 'Active Link Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch'
                )
            ),
            array(
                'id' => 'ut_navigation_ss_fl_decoration_color',
                'label' => 'Animation Decoration Line Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch',
                    'ut_navigation_style' => 'animation-line'
                )
            ),
	        array(
                'id' => 'ut_navigation_ss_fl_description_color',
                'label' => 'Description Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch',
                )
            ),
            array(
                'id' => 'ut_subheadline_ss_sl_colors',
                'label' => 'Navigation Sub Menu and Mega Menu Colors',
                'type' => 'sub_section_headline',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch'
                )
            ),
            array(
                'id' => 'ut_navigation_ss_sl_background_color',
                'label' => 'Background Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'gradient_colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch'
                )
            ),
            array(
                'id' => 'ut_navigation_ss_sl_color',
                'label' => 'Link Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch'
                )
            ),
            array(
                'id' => 'ut_navigation_ss_sl_color_hover',
                'label' => 'Link Hover Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch'
                )
            ),
            array(
                'id' => 'ut_navigation_ss_sl_active_color',
                'label' => 'Active Link Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch'
                )
            ),
            array(
                'id' => 'ut_navigation_ss_sl_animation_color',
                'label' => 'Link Animation Border / Background Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch',
                    'ut_navigation_column_link_animation' => 'yes',
                )
            ),
            array(
                'id' => 'ut_navigation_ss_megamenu_column_title_color',
                'label' => 'Megamenu Column Title Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch'
                )
            ),
            array(
                'id' => 'ut_navigation_ss_megamenu_column_title_color_hover',
                'label' => 'Megamenu Column Title Color Hover',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch'
                )
            ),
            array(
                'id' => 'ut_navigation_ss_header_social_icons',
                'label' => 'Social Icons',
                'type' => 'sub_section_headline',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch'
                )
            ),
            array(
                'id' => 'ut_navigation_ss_header_social_icons_color',
                'label' => 'Social Icons Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch'
                )
            ),
            array(
                'id' => 'ut_navigation_ss_header_social_icons_color_hover',
                'label' => 'Social Icons Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch'
                )
            ),
            array(
                'id' => 'ut_navigation_ss_sl_border_settings',
                'label' => 'Sub Menu Border and Shadow Settings',
                'type' => 'sub_section_inline_headline',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch'
                )
            ),

            array(
                'id' => 'ut_navigation_ss_sl_border_color',
                'label' => 'Border Top Color',
                'desc' => 'Only applies if primary skin has an active border setting.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch'
                )
            ),
            array(
                'id' => 'ut_navigation_ss_sl_borders',
                'label' => 'Remaining Borders',
                'desc' => 'Individually Border Right, Left and Bottom Colors. Only applies if primary skin has an active border setting.',
                'type' => 'border',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch'
                )
            ),
            array(
                'id' => 'ut_navigation_ss_sl_mm_border',
                'label' => 'Mega Menu Column Border',
                'desc' => 'Only applies if primary skin has a mega menu column border set.',
                'type' => 'border',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch'
                )
            ),
            array(
                'id' => 'ut_navigation_ss_sl_shadow_color',
                'label' => 'Shadow Color',
                'desc' => 'You can turn off the shadow by settings its opacity to 0. Simply use the adjustment bar on the right of the colorpicker.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch'
                )
            ),

            // Header Mini Cart
            array(
                'id' => 'ut_navigation_ss_shopping_cart_headline',
                'label' => 'Woocommerce Mini Shopping Cart',
                'desc' => 'Woocommerce Mini Shopping Cart',
                'type' => 'section_headline',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                // 'collapse' => 'closed',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch'
                )
            ),

            array(
                'id' => 'ut_navigation_ss_shopping_cart_count_color',
                'label' => 'Item Count Color',
                'desc' => 'Default Color is white. The counter is located right next to the shopping cart icon.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch'
                )
            ),

            array(
                'id' => 'ut_navigation_ss_shopping_cart_count_background',
                'label' => 'Item Count Background Color',
                'desc' => 'Default Color is theme accent color. The counter is located right next to the shopping cart icon.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch'
                )
            ),

            array(
                'id' => 'ut_navigation_ss_shopping_cart_item_delete_color',
                'label' => 'Item Delete Color',
                'desc' => 'Creates a separator between cart items.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch'
                )
            ),

            array(
                'id' => 'ut_navigation_ss_shopping_cart_item_delete_hover_color',
                'label' => 'Item Delete Hover Color',
                'desc' => 'Creates a separator between cart items.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch'
                )
            ),

            array(
                'id' => 'ut_navigation_ss_shopping_cart_item_separator',
                'label' => 'Item Separator',
                'desc' => 'Creates a separator between cart items.',
                'type' => 'border',
                'markup' => '1_1',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch'
                )
            ),

            array(
                'id' => 'ut_navigation_ss_shopping_cart_scrollbar',
                'label' => 'Cart Scrollbar Color',
                'desc' => 'If more than 3 items have been placed inside the cart, a scrollbar will automatically appear.',
                'type' => 'colorpicker',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch'
                )
            ),

            array(
                'id' => 'ut_navigation_ss_shopping_cart_summary_background',
                'label' => 'Shopping Cart Summary Background Color',
                'desc' => 'The Summary Area of the mini shopping cart contains the total number of items in your cart and the total price of all items. Additionally 2 Buttons are displaying allowing the user to view his cart on a single page or directly browse to the checkout page. Giving this area a background color will visually separate the summary from the cart items.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch'
                )
            ),

            array(
                'id' => 'ut_navigation_ss_shopping_cart_item_total_count',
                'label' => 'Total Item Count Color',
                'desc' => 'This total count belongs to the summary area and is located right above the cart buttons. Default Color is top header text color.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch'
                )
            ),

            array(
                'id' => 'ut_navigation_ss_shopping_cart_item_total_price',
                'label' => 'Total Price Color',
                'desc' => 'This total price belongs to the summary area and is located right above the cart buttons. Default Color is top header text color.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch'
                )
            ),


            /*
            |--------------------------------------------------------------------------
            | Special Side Navigation Options
            |--------------------------------------------------------------------------
            */
            array(
                'id' => 'ut_subheadline_sh_form_colors',
                'label' => 'Search Form Colors',
                'type' => 'sub_section_headline',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'side',
                    'ut_navigation_skin' => 'ut-header-custom',
                )
            ),

            array(
                'id' => 'ut_side_header_search_form_icon_color',
                'label' => 'Search Form Icon Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'side',
                    'ut_navigation_skin' => 'ut-header-custom'
                )
            ),

            array(
                'id' => 'ut_side_header_search_form_border_color',
                'label' => 'Search Form Border Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'side',
                    'ut_navigation_skin' => 'ut-header-custom'
                )
            ),

            array(
                'id' => 'ut_side_header_search_form_placeholder_color',
                'label' => 'Search Form Placeholder Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'side',
                    'ut_navigation_skin' => 'ut-header-custom'
                )
            ),

            array(
                'id' => 'ut_side_header_search_form_border_focus_color',
                'label' => 'Search Form Border Focus Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'side',
                    'ut_navigation_skin' => 'ut-header-custom'
                )
            ),

            array(
                'id' => 'ut_side_header_search_form_placeholder_focus_color',
                'label' => 'Search Form Placeholder Focus Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'side',
                    'ut_navigation_skin' => 'ut-header-custom'
                )
            ),

            array(
                'id' => 'ut_subheadline_sh_si_colors',
                'label' => 'Social Icons Colors',
                'type' => 'sub_section_headline',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'side',
                    'ut_navigation_skin' => 'ut-header-custom',
                )
            ),

            array(
                'id' => 'ut_side_header_social_icon_color',
                'label' => 'Icon Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'side',
                    'ut_navigation_skin' => 'ut-header-custom'
                )
            ),

            array(
                'id' => 'ut_side_header_social_icon_color_hover',
                'label' => 'Icon Hover Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'side',
                    'ut_navigation_skin' => 'ut-header-custom'
                )
            ),

            array(
                'id' => 'ut_side_header_social_icons_border_color',
                'label' => 'Border Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_header_color_settings',
                'required' => array(
                    'ut_header_layout' => 'side',
                    'ut_navigation_skin' => 'ut-header-custom'
                )
            ),

            /*
            |--------------------------------------------------------------------------
            | Mobile Navigation Configuration
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_mobile_navigation_setting_headline',
                'label' => 'Mobile Navigation',
                'type' => 'panel_headline',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_mobile_navigation_settings',
            ),

            array(
                'id' => 'ut_mobile_navigation_trigger_icon_type',
                'label' => 'Icon Type',
                'desc' => 'Select your desired mobile menu icon.',
                'type' => 'select',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_mobile_navigation_settings',
                'std' => 'hamburger',
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
            ),
            array(
                'id' => 'ut_mobile_navigation_trigger_icon',
                'label' => 'Icon',
                'desc' => 'Select your desired mobile menu icon.',
                'type' => 'iconpicker',
                'markup' => '1_1',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_mobile_navigation_settings',
                'required' => array(
                    'ut_mobile_navigation_trigger_icon_type' => 'custom',
                )
            ),
            array(
                'id' => 'ut_mobile_navigation_closed_settings',
                'label' => 'Closed Mobile Navigation Colors',
                'type' => 'sub_section_inline_headline',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_mobile_navigation_settings'
            ),
            array(
                'id' => 'ut_mobile_navigation_trigger_color',
                'label' => 'Icon Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_mobile_navigation_settings',
            ),

            array(
                'id' => 'ut_mobile_navigation_trigger_alternate_color',
                'label' => 'Icon Color for Secondary Skin',
                'desc' => 'The secondary color will be used for headers with 2 different skin color settings. This color will be part of the secondary skin, which is active when scrolling down or when hero is deactivated.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_mobile_navigation_settings',
            ),

            array(
                'id' => 'ut_mobile_navigation_background_color_closed',
                'label' => 'Background Color ( closed mobile nav )',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_mobile_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'side',
                )
            ),

            array(
                'id' => 'ut_mobile_navigation_opened_settings',
                'label' => 'Opened Mobile Navigation Colors',
                'type' => 'sub_section_inline_headline',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_mobile_navigation_settings'
            ),

            array(
                'id' => 'ut_mobile_navigation_trigger_color_hover',
                'label' => 'Icon Hover and Active Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_mobile_navigation_settings',
            ),

            array(
                'id' => 'ut_mobile_navigation_text_logo_color',
                'label' => 'Text Logo Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_mobile_navigation_settings',
            ),

            array(
                'id' => 'ut_mobile_navigation_background_color',
                'label' => 'Background Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'gradient_colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_mobile_navigation_settings',
            ),

            array(
                'id' => 'ut_mobile_navigation_link_color',
                'label' => 'Link Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_mobile_navigation_settings',
            ),

            array(
                'id' => 'ut_mobile_navigation_link_color_hover',
                'label' => 'Link Hover Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_mobile_navigation_settings',
            ),

            array(
                'id' => 'ut_mobile_navigation_dot_color',
                'label' => 'Dot Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_mobile_navigation_settings',
            ),

            array(
                'id' => 'ut_mobile_navigation_dot_color_hover',
                'label' => 'Dot Hover Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_mobile_navigation_settings',
            ),

            array(
                'id' => 'ut_mobile_navigation_submenu_dot_color',
                'label' => 'Submenu Dot Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_mobile_navigation_settings',
            ),

            array(
                'id' => 'ut_mobile_navigation_submenu_dot_color_hover',
                'label' => 'Submenu Dot Hover Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_mobile_navigation_settings',
            ),

            array(
                'id' => 'ut_mobile_navigation_link_background_color',
                'label' => 'Link Background Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_mobile_navigation_settings',
            ),

            array(
                'id' => 'ut_mobile_navigation_link_background_color_hover',
                'label' => 'Link Background Hover Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_mobile_navigation_settings',
            ),

            array(
                'id' => 'ut_mobile_navigation_border_color',
                'label' => 'Border Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_mobile_navigation_settings',
            ),

            array(
                'id' => 'ut_mobile_navigation_woocommerce_cart_settings_headline',
                'label' => 'Mobile Woocommerce Cart Icon',
                'desc' => 'Mobile Woocommerce Cart Icon',
                'type' => 'section_headline',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_mobile_navigation_settings',

            ),

            array(
                'id' => 'ut_mobile_navigation_cart_closed_settings',
                'label' => 'Closed Mobile Navigation Colors',
                'type' => 'sub_section_inline_headline',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_mobile_navigation_settings'
            ),

            array(
                'id' => 'ut_mobile_navigation_cart_color',
                'label' => 'Icon Color',
                'desc' => 'Only applies if Woocommerce is installed and active. RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_mobile_navigation_settings',
            ),

            array(
                'id' => 'ut_mobile_navigation_cart_alternate_color',
                'label' => 'Icon Alternate Color',
                'desc' => 'Only applies if Woocommerce is installed and active. RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_mobile_navigation_settings',
            ),

            array(
                'id' => 'ut_mobile_navigation_cart_count_color',
                'label' => 'Item Count Color',
                'desc' => 'Default Color is white. The counter is located right next to the shopping cart icon.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_mobile_navigation_settings',
            ),

            array(
                'id' => 'ut_mobile_navigation_cart_count_background',
                'label' => 'Item Count Background Color',
                'desc' => 'Default Color is theme accent color. The counter is located right next to the shopping cart icon.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_mobile_navigation_settings',
            ),

            array(
                'id' => 'ut_mobile_navigation_cart_opened_settings',
                'label' => 'Opened Mobile Navigation Colors',
                'type' => 'sub_section_inline_headline',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_mobile_navigation_settings'
            ),

            array(
                'id' => 'ut_mobile_navigation_cart_color_hover',
                'label' => 'Icon Hover and Active Color',
                'desc' => 'Only applies if Woocommerce is installed and active. RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_mobile_navigation_settings',
            ),

            array(
                'id' => 'ut_mobile_navigation_cart_count_color_hover',
                'label' => 'Item Count Hover and Active Color',
                'desc' => 'Default Color is white. The counter is located right next to the shopping cart icon.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_mobile_navigation_settings',
            ),

            array(
                'id' => 'ut_mobile_navigation_cart_count_background_hover',
                'label' => 'Item Count Background Hover and Active Color',
                'desc' => 'Default Color is theme accent color. The counter is located right next to the shopping cart icon.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_mobile_navigation_settings',
            ),

            /*
            |--------------------------------------------------------------------------
            | Overlay Navigation Configuration
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_global_overlay_navigation_setting_headline',
                'label' => 'Overlay Navigation',
                'type' => 'panel_headline',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_overlay_navigation_settings',
            ),

            array(
                'id' => 'ut_global_overlay_navigation_setting_Info',
                'label' => 'Navigation',
                'desc' => 'Please note, Brooklyn\'s Overlay Navigation is designed for small menus and cannot handle menu with a large number menu entries. Currently only the default header supports this navigation. Support for other header types will coming with a future update.',
                'type' => 'section_headline_info',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_overlay_navigation_settings',
            ),

            array(
                'id' => 'ut_global_overlay_navigation',
                'label' => 'Activate Overlay Navigation (only)?',
                'desc' => 'A compact navigation covering your website on click. This navigation will replace the default navigation.',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_overlay_navigation_settings',
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
                )
            ),

            array(
                'id' => 'ut_global_overlay_content_width',
                'label' => 'Overlay Content Width?',
                'desc' => 'Centered content has a max width of 1200px or what has been set in "Advanced" > "Content Spacing Settings" and fullwidth 100%.',
                'type' => 'select',
                'std' => 'fullwidth',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_overlay_navigation_settings',
                'choices' => array(
                    array(
                        'value' => 'centered',
                        'label' => 'centered'
                    ),
                    array(
                        'value' => 'fullwidth',
                        'label' => 'fullwidth'
                    )
                ),

            ),

            array(
                'id' => 'ut_global_overlay_content_align',
                'label' => 'Overlay Content Horizontal Alignment',
                'desc' => 'Set your desired overlay content align.',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_overlay_navigation_settings',
                'type' => 'select',
                'std' => 'center',
                'choices' => array(
                    array(
                        'label' => 'Left',
                        'value' => 'left'
                    ),
                    array(
                        'label' => 'center',
                        'value' => 'center'
                    ),
                    array(
                        'label' => 'right',
                        'value' => 'right'
                    ),

                ),

            ),

            array(
                'id' => 'ut_global_overlay_content_vertical_align',
                'label' => 'Overlay Content Vertical Alignment',
                'desc' => 'Set your desired overlay content align.',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_overlay_navigation_settings',
                'type' => 'select',
                'std' => 'middle',
                'choices' => array(
                    array(
                        'label' => 'top',
                        'value' => 'top'
                    ),
                    array(
                        'label' => 'middle',
                        'value' => 'middle'
                    ),
                    array(
                        'label' => 'bottom',
                        'value' => 'bottom'
                    ),

                ),

            ),

            array(
                'id' => 'ut_global_overlay_logo',
                'label' => 'Show Logo in Overlay?',
                'desc' => 'Decide if you like to display a logo, your site title or none of them.',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_overlay_navigation_settings',
                'type' => 'select',
                'std' => 'off',
                'choices' => array(
                    array(
                        'label' => 'no, thanks!',
                        'value' => 'off'
                    ),
                    array(
                        'label' => 'Custom Logo',
                        'value' => 'custom'
                    ),
                    array(
                        'label' => 'Site Title',
                        'value' => 'text'
                    ),
                ),

            ),

            array(
                'id' => 'ut_overlay_logo',
                'label' => 'Overlay Logo',
                'desc' => 'The maximum height of the logo should be 60px. And for retina logo, please double the size of your logo by keeping the aspect ratio.',
                'type' => 'upload',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_overlay_navigation_settings',
                'required' => array(
                    'ut_global_overlay_logo' => 'custom'
                )
            ),

            array(
                'id' => 'ut_overlay_logo_retina',
                'label' => 'Retina Overlay Logo',
                'desc' => 'Upload a retina ready Overlay Logo. Simply double the size of your Overlay Logo.',
                'type' => 'upload',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_overlay_navigation_settings',
                'required' => array(
                    'ut_global_overlay_logo' => 'custom'
                )
            ),

            array(
                'id' => 'ut_global_overlay_link_animation',
                'label' => 'Activate Underline Animation Effect on Hover?',
                'desc' => 'A nice hover animation effect for navigation links.',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_overlay_navigation_settings',
                'type' => 'select',
                'std' => 'off',
                'choices' => array(
                    array(
                        'label' => 'no, thanks!',
                        'value' => 'off'
                    ),
                    array(
                        'label' => 'yes, please!',
                        'value' => 'on'
                    ),

                ),

            ),

            array(
                'id' => 'ut_global_overlay_footer_reverse',
                'label' => 'Reverse Overlay Footer Boxes',
                'desc' => 'Using this option will swap the copyright area with your social icons area inside your footer.',
                'type' => 'select',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_overlay_navigation_settings',
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

            ),

            array(
                'id' => 'ut_global_overlay_navigation_hamburger_headline',
                'label' => 'Hamburger Icon Settings',
                'type' => 'section_headline',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_overlay_navigation_settings',

            ),

            array(
                'id' => 'ut_global_overlay_navigation_hamburger_color',
                'label' => 'Hamburger Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_overlay_navigation_settings',

            ),

            array(
                'id' => 'ut_global_overlay_navigation_hamburger_color_alternate',
                'label' => 'Hamburger Color for Secondary Skin',
                'desc' => 'The secondary color will be used for headers with 2 different skin color settings. This color will be part of the secondary skin, which is active when scrolling down or when hero is deactivated.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_overlay_navigation_settings',

            ),

            array(
                'id' => 'ut_global_overlay_navigation_hamburger_hover_opacity',
                'label' => 'Hamburger Hover Opacity',
                'desc' => 'Drag the handle to set the opacity value.',
                'type' => 'numeric-slider',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_overlay_navigation_settings',
                'std' => 30,
                'min_max_step' => '1,100,1',

            ),

            array(
                'id' => 'ut_global_overlay_navigation_hamburger_active_color',
                'label' => 'Hamburger Active Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_overlay_navigation_settings',

            ),

            array(
                'id' => 'ut_global_overlay_navigation_hamburger_line_width',
                'label' => 'Hamburger Line Thickness',
                'desc' => 'Drag the handle to set the line Thickness.',
                'type' => 'numeric-slider',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_overlay_navigation_settings',
                'std' => 2,
                'min_max_step' => '1,4,1',

            ),

            array(
                'id' => 'ut_global_overlay_navigation_hamburger_line_span_width',
                'label' => 'Hamburger Line Width',
                'desc' => 'Drag the handle to set the line width.',
                'type' => 'select',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_overlay_navigation_settings',
                'choices' => array(
                    array(
                        'value' => 'default',
                        'label' => 'small'
                    ),
                    array(
                        'value' => 'medium',
                        'label' => 'Medium'
                    )
                ),
            ),

            array(
                'id' => 'ut_global_overlay_navigation_hamburger_line_span_pseudo_width',
                'label' => 'Hamburger Upper and Lower Line Width',
                'desc' => 'Drag the handle to set the line Width.',
                'type' => 'numeric-slider',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_overlay_navigation_settings',
                'std' => 100,
                'min_max_step' => '50,100,5',

            ),

            array(
                'id' => 'ut_global_overlay_navigation_colors_headline',
                'label' => 'Color Settings',
                'type' => 'section_headline',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_overlay_navigation_settings',

            ),

            array(
                'id' => 'ut_global_overlay_navigation_background_color',
                'label' => 'Overlay Navigation Background Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'gradient_colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_overlay_navigation_settings',

            ),

            array(
                'id' => 'ut_global_overlay_navigation_logo_color',
                'label' => 'Overlay Site Title Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_overlay_navigation_settings',

            ),

            array(
                'id' => 'ut_global_overlay_navigation_logo_color_hover',
                'label' => 'Overlay Site Title Color Hover',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_overlay_navigation_settings',
                'required' => array(
                    'ut_global_overlay_logo' => 'text'
                )
            ),

            array(
                'id' => 'ut_global_overlay_navigation_menu_color',
                'label' => 'Overlay Navigation Link Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_overlay_navigation_settings',
            ),

            array(
                'id' => 'ut_global_overlay_navigation_menu_color_hover',
                'label' => 'Overlay Navigation Link Color Hover',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_overlay_navigation_settings',
            ),

            array(
                'id' => 'ut_global_overlay_navigation_underline_color',
                'label' => 'Overlay Navigation Underline Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_overlay_navigation_settings',
                'required' => array(
                    'ut_global_overlay_link_animation' => 'on'
                )
            ),

            array(
                'id' => 'ut_global_overlay_navigation_submenu_color',
                'label' => 'Overlay Navigation Submenu Link Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_overlay_navigation_settings',
            ),

            array(
                'id' => 'ut_global_overlay_navigation_submenu_color_hover',
                'label' => 'Overlay Navigation Submenu Link Color Hover',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_overlay_navigation_settings',
            ),

            array(
                'id' => 'ut_global_overlay_navigation_submenu_underline_color',
                'label' => 'Overlay Navigation Submenu Underline Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_overlay_navigation_settings',
                'required' => array(
                    'ut_global_overlay_link_animation' => 'on'
                )
            ),

            array(
                'id' => 'ut_global_overlay_navigation_social_headline',
                'label' => 'Overlay Footer Social Icons',
                'type' => 'section_headline',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_overlay_navigation_settings',
            ),

            array(
                'id' => 'ut_overlay_social_icons',
                'label' => 'Social Icons',
                'desc' => 'Add your desired social profile icon and links. <br /><strong>You can re-order with drag & drop, the order will update after saving.</strong>',
                'type' => 'list-item',
                'list_title' => false,
                'markup' => '1_1',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_overlay_navigation_settings',
                'settings' => array(
                    array(
                        'id' => 'icon',
                        'label' => 'Choose Social Icon',
                        'type' => 'select',
                        'class' => 'ut-select-setting-title',
                        'choices' => ot_recognized_social_links()

                    ),
                    array(
                        'id' => 'link',
                        'label' => 'Enter Social Link',
                        'type' => 'text',
                        'rows' => '3'
                    )
                ),
            ),

            array(
                'id' => 'ut_overlay_social_icons_color',
                'label' => 'Social Icon Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_overlay_navigation_settings',
            ),

            array(
                'id' => 'ut_overlay_social_icons_color_hover',
                'label' => 'Social Icon Color Hover',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_overlay_navigation_settings',
            ),

            array(
                'id' => 'ut_global_overlay_navigation_copyright_headline',
                'label' => 'Overlay Footer Copyright',
                'type' => 'section_headline',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_overlay_navigation_settings',
            ),

            array(
                'id' => 'ut_overlay_copyright',
                'label' => 'Copyright',
                'desc' => 'Add an additional copyright to the footer of this overlay.',
                'type' => 'text',
                'markup' => '1_1',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_overlay_navigation_settings',
                'rows' => '3',
            ),

            array(
                'id' => 'ut_overlay_copyright_color',
                'label' => 'Copyright Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_overlay_navigation_settings',
            ),

            array(
                'id' => 'ut_overlay_copyright_font_style',
                'label' => 'Overlay Copyright Font Style',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_overlay_navigation_settings',
            ),

            /*
            |--------------------------------------------------------------------------
            | Overlay Search Configuration
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_global_overlay_search_setting_headline',
                'label' => 'Overlay Search',
                'type' => 'panel_headline',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_overlay_search_settings'
            ),

            array(
                'id' => 'ut_global_overlay_search_background_color',
                'label' => 'Background Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'gradient_colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_overlay_search_settings'
            ),

            array(
                'id' => 'ut_overlay_search_close_icon_color',
                'label' => 'Close Icon Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_overlay_search_settings',
            ),

            array(
                'id' => 'ut_overlay_search_input_text_color',
                'label' => 'Input Text Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_overlay_search_settings',
            ),

            array(
                'id' => 'ut_overlay_search_input_border_color',
                'label' => 'Input Border Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_overlay_search_settings',
            ),

            array(
                'id' => 'ut_overlay_search_info_text',
                'label' => 'Info Text',
                'desc' => 'default: "Hit enter to search or ESC to close".',
                'type' => 'text',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_overlay_search_settings',
            ),

            array(
                'id' => 'ut_overlay_search_info_text_color',
                'label' => 'Info Text Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_overlay_search_settings',
            ),

            array(
                'id' => 'ut_overlay_search_related_boxes',
                'label' => 'Add Search related suggestion boxes?',
                'desc' => 'You can add 2 boxes for additional content right below the search field.',
                'type' => 'select',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_overlay_search_settings',
                'std' => 'on',
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

            ),

            array(
                'id' => 'ut_overlay_search_left_suggestion_box',
                'label' => 'Left Suggestion Box',
                'desc' => 'Left Suggestion Box',
                'type' => 'section_headline',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_overlay_search_settings',
                'required' => array(
                    'ut_overlay_search_related_boxes' => 'on'
                )
            ),

            array(
                'id' => 'ut_overlay_search_left_suggestion_box_icon',
                'label' => 'Icon',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'iconpicker',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_overlay_search_settings',
                'required' => array(
                    'ut_overlay_search_related_boxes' => 'on',
                )
            ),

            array(
                'id' => 'ut_overlay_search_left_suggestion_box_icon_color',
                'label' => 'Icon Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_overlay_search_settings',
                'required' => array(
                    'ut_overlay_search_related_boxes' => 'on'
                )
            ),

            array(
                'id' => 'ut_overlay_search_left_suggestion_box_headline',
                'label' => 'Headline',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'text',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_overlay_search_settings',
                'required' => array(
                    'ut_overlay_search_related_boxes' => 'on'
                )
            ),

            array(
                'id' => 'ut_overlay_search_left_suggestion_box_headline_color',
                'label' => 'Headline Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_overlay_search_settings',
                'required' => array(
                    'ut_overlay_search_related_boxes' => 'on'
                )
            ),

            array(
                'id' => 'ut_overlay_search_left_suggestion_box_content',
                'label' => 'Content',
                'desc' => '',
                'type' => 'textarea',
                'markup' => '1_1',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_overlay_search_settings',
                'rows' => '10',
                'required' => array(
                    'ut_overlay_search_related_boxes' => 'on'
                )
            ),

            array(
                'id' => 'ut_overlay_search_left_suggestion_box_text_color',
                'label' => 'Content Default Text Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_overlay_search_settings',
                'required' => array(
                    'ut_overlay_search_related_boxes' => 'on'
                )
            ),

            array(
                'id' => 'ut_overlay_search_right_suggestion_box',
                'label' => 'Right Suggestion Box',
                'desc' => 'Right Suggestion Box',
                'type' => 'section_headline',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_overlay_search_settings',
                'required' => array(
                    'ut_overlay_search_related_boxes' => 'on'
                )
            ),

            array(
                'id' => 'ut_overlay_search_right_suggestion_box_icon',
                'label' => 'Icon',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'iconpicker',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_overlay_search_settings',
                'required' => array(
                    'ut_overlay_search_related_boxes' => 'on',
                )
            ),

            array(
                'id' => 'ut_overlay_search_right_suggestion_box_icon_color',
                'label' => 'Icon Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_overlay_search_settings',
                'required' => array(
                    'ut_overlay_search_related_boxes' => 'on'
                )
            ),

            array(
                'id' => 'ut_overlay_search_right_suggestion_box_headline',
                'label' => 'Headline',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'text',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_overlay_search_settings',
                'required' => array(
                    'ut_overlay_search_related_boxes' => 'on'
                )
            ),

            array(
                'id' => 'ut_overlay_search_right_suggestion_box_headline_color',
                'label' => 'Headline Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_overlay_search_settings',
                'required' => array(
                    'ut_overlay_search_related_boxes' => 'on'
                )
            ),

            array(
                'id' => 'ut_overlay_search_right_suggestion_box_content',
                'label' => 'Content',
                'desc' => '',
                'type' => 'textarea',
                'markup' => '1_1',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_overlay_search_settings',
                'rows' => '10',
                'required' => array(
                    'ut_overlay_search_related_boxes' => 'on'
                )
            ),

            array(
                'id' => 'ut_overlay_search_right_suggestion_box_text_color',
                'label' => 'Content Default Text Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_header_settings',
                'subsection' => 'ut_overlay_search_settings',
                'required' => array(
                    'ut_overlay_search_related_boxes' => 'on'
                )
            ),

            /*
            |--------------------------------------------------------------------------
            | Sidebar
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_global_sidebar_colors_headline',
                'label' => 'Sidebar Colors',
                'type' => 'panel_headline',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_global_sidebar_settings',
            ),

            array(
                'id' => 'ut_global_sidebar_widgets_text_color',
                'label' => 'Sidebar Text Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_global_sidebar_settings',
            ),

            array(
                'id' => 'ut_global_sidebar_widgets_link_color',
                'label' => 'Sidebar Link Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_global_sidebar_settings',
            ),

            array(
                'id' => 'ut_global_sidebar_widgets_link_color_hover',
                'label' => 'Sidebar Link Hover Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_global_sidebar_settings',
            ),

            array(
                'id' => 'ut_global_sidebar_widgets_icon_color',
                'label' => 'Sidebar Icons Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_global_sidebar_settings',
            ),

            array(
                'id' => 'ut_global_sidebar_widgets_icon_color_hover',
                'label' => 'Sidebar Icons Hover Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_global_sidebar_settings',
            ),

            array(
                'id' => 'ut_global_sidebar_widgets_border_color',
                'label' => 'Sidebar Border Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_global_sidebar_settings',
            ),

            array(
                'id' => 'ut_global_sidebar_widgets_border_color_hover',
                'label' => 'Sidebar Border Hover Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_global_sidebar_settings',
            ),

            /*
            |--------------------------------------------------------------------------
            | Footer
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_footer_setting_headline',
                'label' => 'Footer Settings',
                'type' => 'panel_headline',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_footer_area_settings',
            ),

            array(
                'id' => 'ut_footerarea',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_footer_area_settings',
                'label' => 'Show Footer Area?',
                'desc' => 'Can also be individualized for each page.',
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
            ),

            array(
                'id' => 'ut_footerarea_width',
                'label' => 'Make Footer Area Full Width?',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_footer_area_settings',
                'desc' => 'It handles centering the content within the footer. Centered content has a max width of 1200px and fullwidth content 100%. Can also be individualized for each page.',
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

            ),

            array(
				'id'         => 'ut_footerarea_spacing',
				'label'      => 'Footer Area Spacing',
				'desc'       => '<strong>(optional) only for desktop devices</strong>',
				'section'    => 'ut_general_settings',
				'subsection' => 'ut_footer_area_settings',
				'type'       => 'select',
				'std'        => 'content',
				'choices'    => array(
					array(
						'label' => 'Based on Content Spacing',
						'value' => 'content'
					),
					array(
						'label' => 'XL (160px)',
						'value' => '160'
					),
					array(
						'label' => 'L (120px)',
						'value' => '120'
					),
					array(
						'label' => 'M (80px)',
						'value' => '80'
					),
					array(
						'label' => 'S (40px)',
						'value' => '40'
					),
					array(
						'label' => 'XS (0)',
						'value' => '0'
					)
				),

			),

            array(
                'id' => 'ut_footerarea_hide_on_mobile',
                'label' => 'Hide Footer on Mobiles?',
                'desc' => '<strong>(optional)</strong>',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_footer_area_settings',
                'type' => 'select',
                'std' => 'on',
                'choices' => array(
                    array(
                        'label' => 'yes, please!',
                        'value' => 'off'
                    ),
                    array(
                        'label' => 'no, thanks!',
                        'value' => 'on'
                    )
                ),

            ),

            array(
                'id' => 'ut_footer_colors_setting_headline',
                'label' => 'Footer Colors',
                'type' => 'panel_headline',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_footer_colors',
            ),

            array(
                'id' => 'ut_footer_skin',
                'label' => 'Footer Colors',
                'desc' => 'This option is deprecated and is only maintained due to compatibility reasons for older Brooklyn Versions. Please use the color options below.',
                'type' => 'select',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_footer_colors',
                'std' => 'ut-footer-light',
                'choices' => array(
                    array(
                        'value' => 'ut-footer-dark',
                        'label' => 'Dark'
                    ),
                    array(
                        'value' => 'ut-footer-light',
                        'label' => 'Light'
                    ),
                    array(
                        'value' => 'ut-footer-custom',
                        'label' => 'Custom Skin'
                    )
                )
            ),

            /*array(
                'id' => 'ut_footer_skin_background_image',
                'label' => 'Footer Background Image',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'background',
                'markup' => '1_1',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_footer_colors'
            ),

            array(
                'id' => 'ut_footer_skin_overlay',
                'label' => 'Activate Footer Overlay?',
                'desc' => 'Covers your footer with an optional color.',
                'std' => 'off',
                'type' => 'select',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_footer_colors',
                'choices' => array(
                    array(
                        'value' => 'on',
                        'label' => 'yes, please!',
                    ),
                    array(
                        'value' => 'off',
                        'label' => 'no, thanks!'
                    )
                )
            ),

            array(
                'id' => 'ut_footer_skin_overlay_color',
                'label' => 'Footer Overlay Color',
                'desc' => 'Set your desired overlay color. You can use the handle below to change the color opacity.',
                'type' => 'colorpicker',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_footer_colors',
                'required' => array(
                    'ut_footer_skin_overlay' => 'on'
                )
            ),

            array(
                'id' => 'ut_footer_skin_color_opacity',
                'label' => 'Footer Overlay Color Opacity',
                'desc' => 'Drag the handle to set the opacity for footer overlay color.',
                'type' => 'numeric-slider',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_footer_colors',
                'min_max_step' => '0,1,0.1',
                'required' => array(
                    'ut_footer_skin_overlay' => 'on'
                )
            ), */

            array(
                'id' => 'ut_footer_skin_dark_bgcolor',
                'label' => 'Footer Skin Background Color',
                'desc' => '<strong>(optional)</strong> - set an alternative background color for your footer, since the base skin is dark, we recommend to use a dark color as well.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_footer_colors',
                'required' => array(
                    'ut_footer_skin' => 'ut-footer-dark'
                )
            ),

            array(
                'id' => 'ut_footer_skin_light_bgcolor',
                'label' => 'Footer Skin Background Color',
                'desc' => '<strong>(optional)</strong> - set an alternative background color for your footer, since the base skin is light, we recommend to use a bright color as well.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_footer_colors',
                'required' => array(
                    'ut_footer_skin' => 'ut-footer-light'
                )
            ),

            array(
                'id' => 'ut_footer_color_cs_settings_headline',
                'label' => 'Individual Footer Colors',
                'desc' => 'Custom Skin Footer Colors',
                'type' => 'section_headline',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_footer_colors',
                'required' => array(
                    'ut_footer_skin' => 'ut-footer-custom'
                )
            ),

            array(
                'id' => 'ut_footer_skin_border',
                'label' => 'Footer Top Border Color',
                'desc' => 'Once set, a thin border gets applied to the top of your footer.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_footer_colors',
                'required' => array(
                    'ut_footer_skin' => 'ut-footer-custom'
                )
            ),

            array(
                'id' => 'ut_footer_skin_bgcolor',
                'label' => 'Footer Background Color',
                'desc' => 'HEX Color.',
                'type' => 'gradient_colorpicker',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_footer_colors',
                'required' => array(
                    'ut_footer_skin' => 'ut-footer-custom'
                )
            ),

            array(
                'id' => 'ut_footer_widgets_text_color',
                'label' => 'Footer Text Color',
                'desc' => 'RGBA Color.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_footer_colors',
                'required' => array(
                    'ut_footer_skin' => 'ut-footer-custom'
                )
            ),

            array(
                'id' => 'ut_footer_widgets_link_color',
                'label' => 'Footer Link Color',
                'desc' => 'RGBA Color.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_footer_colors',
                'required' => array(
                    'ut_footer_skin' => 'ut-footer-custom'
                )
            ),

            array(
                'id' => 'ut_footer_widgets_link_color_hover',
                'label' => 'Footer Link Hover Color',
                'desc' => 'RGBA Color.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_footer_colors',
                'required' => array(
                    'ut_footer_skin' => 'ut-footer-custom'
                )
            ),

            array(
                'id' => 'ut_footer_widgets_icon_color',
                'label' => 'Footer Icons Color',
                'desc' => 'RGBA Color.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_footer_colors',
                'required' => array(
                    'ut_footer_skin' => 'ut-footer-custom'
                )
            ),

            array(
                'id' => 'ut_footer_widgets_icon_color_hover',
                'label' => 'Footer Icons Hover Color',
                'desc' => 'RGBA Color.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_footer_colors',
                'required' => array(
                    'ut_footer_skin' => 'ut-footer-custom'
                )
            ),

            array(
                'id' => 'ut_footer_widgets_border_color',
                'label' => 'Footer Border Color',
                'desc' => 'RGBA Color.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_footer_colors',
                'required' => array(
                    'ut_footer_skin' => 'ut-footer-custom'
                )
            ),

            array(
                'id' => 'ut_footer_widgets_border_color_hover',
                'label' => 'Footer Border Hover Color',
                'desc' => 'RGBA Color.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_footer_colors',
                'required' => array(
                    'ut_footer_skin' => 'ut-footer-custom'
                )
            ),

	        array(
		        'id' => 'ut_footer_cursor_skin_headline',
		        'label' => 'Cursor Skin Settings',
		        'type' => 'section_headline',
		        'section' => 'ut_general_settings',
		        'subsection' => 'ut_footer_colors',
	        ),

	        array(
		        'id' => 'ut_footer_cursor_skin',
		        'label' => 'Footer Cursor Skin',
		        'desc' => 'If you are using a custom cursor, you can change the skin with this option.',
		        'type' => 'select',
		        'section' => 'ut_general_settings',
		        'subsection' => 'ut_footer_colors',
		        'std' => 'global',
		        'choices' => apply_filters( 'ot_recognized_custom_cursors', array(
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
	        ),


            array(
                'id' => 'ut_footer_button_headline',
                'label' => 'Button Settings',
                'type' => 'section_headline',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_footer_colors',
            ),

            array(
                'id' => 'ut_footer_button_border',
                'label' => 'Button Border Radius',
                'desc' => 'By default buttons have a 3px border radius. With the help of this option, you can remove this border radius.',
                'type' => 'select',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_footer_colors',
                'std' => 'off',
                'choices' => array(
                    array(
                        'value' => 'on',
                        'label' => 'on'
                    ),
                    array(
                        'value' => 'off',
                        'label' => 'off'
                    ),

                ),

            ),

            array(
                'id' => 'ut_footer_button_text_color',
                'label' => 'Button Text Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_footer_colors',
                'required' => array(
                    'ut_footer_skin' => 'ut-footer-custom'
                )
            ),

            array(
                'id' => 'ut_footer_button_color',
                'label' => 'Button Background Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'gradient_colorpicker',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_footer_colors',
                'required' => array(
                    'ut_footer_skin' => 'ut-footer-custom'
                )
            ),

            array(
                'id' => 'ut_footer_button_text_color_hover',
                'label' => 'Button Text Hover Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_footer_colors',
                'required' => array(
                    'ut_footer_skin' => 'ut-footer-custom'
                )
            ),

            array(
                'id' => 'ut_footer_button_color_hover',
                'label' => 'Button Background Hover Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'gradient_colorpicker',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_footer_colors',
                'required' => array(
                    'ut_footer_skin' => 'ut-footer-custom'
                )
            ),

            array(
                'id' => 'ut_footer_button_spacing',
                'label' => 'Button Spacing',
                'type' => 'spacing',
                'desc' => '<strong>(optional)</strong> value in px. 0 = default',
                'field_min_max_step' => '0,80,1',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_footer_colors',
            ),

            /*
             * Scroll To Top Button
             */

            array(
                'id' => 'ut_footer_scroll_up_settings_headline',
                'label' => 'Scroll Top Button',
                'desc' => 'Scroll Top Button',
                'type' => 'panel_headline',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_scroll_top',
            ),

            array(
                'id' => 'ut_show_scroll_up_button',
                'label' => 'Scroll To Top Button',
                'desc' => 'Display "Scroll To Top" button? You can change the state of this button individually on each page. This "Back to top" link allows users to smoothly scroll back to the top of the page. Its a little detail which enhances navigation experience on website with long pages.',
                'type' => 'select',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_scroll_top',
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
                )
            ),

            array(
                'id' => 'ut_show_scroll_up_button_conditional',
                'label' => 'Hide Scroll Top Button Global',
                'desc' => 'You can overwrite this option individually per page.',
                'type' => 'checkbox',
                'markup' => '1_1',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_scroll_top',
                'choices' => array(
                    /*array(
                        'value' => 'is_front_page',
                        'label' => 'Home'
                    ),
                    array(
                        'value' => 'is_home',
                        'label' => 'Blog'
                    ),
                    array(
                        'value' => 'is_page',
                        'label' => 'Single Pages'
                    ),
                    /*array(
                        'value' => 'is_single',
                        'label' => 'Single Posts'
                    ),*/
                    array(
                        'value' => 'is_singular',
                        'label' => 'Single Portfolio Pages'
                    ),
                    /*array(
                        'value' => 'is_archive',
                        'label' => 'Archive'
                    ),
                    array(
                        'value' => 'ut_is_search',
                        'label' => 'Search'
                    ),
                    array(
                        'value' => 'is_404',
                        'label' => '404'
                    )*/
                ),

            ),


            array(
                'id' => 'ut_scroll_up_button_icon_color',
                'label' => 'Scroll To Top Icon Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_scroll_top',
                'required' => array(
                    'ut_show_scroll_up_button' => 'on'
                )
            ),

            array(
                'id' => 'ut_scroll_up_button_icon_color_hover',
                'label' => 'Scroll To Top Icon Hover Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_scroll_top',
                'required' => array(
                    'ut_show_scroll_up_button' => 'on'
                )
            ),

            array(
                'id' => 'ut_scroll_up_button_background_color',
                'label' => 'Scroll To Top Background Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_scroll_top',
                'required' => array(
                    'ut_show_scroll_up_button' => 'on'
                )
            ),

            array(
                'id' => 'ut_scroll_up_button_shadow',
                'label' => 'Display Scroll To Top Button Shadow?',
                'desc' => 'Add an additional shadow.',
                'type' => 'select',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_scroll_top',
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
                ),
                'required' => array(
                    'ut_show_scroll_up_button' => 'on'
                )
            ),

            array(
                'id' => 'ut_scroll_up_button_border_radius',
                'label' => 'Display Scroll To Top Button Border Radius?',
                'desc' => 'Add an additional radius.',
                'type' => 'select',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_scroll_top',
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
                ),
                'required' => array(
                    'ut_show_scroll_up_button' => 'on'
                )
            ),

            /*
            |--------------------------------------------------------------------------
            | Sub Footer
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_subfooter_setting_headline',
                'label' => 'Subfooter',
                'type' => 'panel_headline',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_subfooter_settings',
            ),

            array(
                'id' => 'ut_subfooterarea',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_subfooter_settings',
                'label' => 'Show Subfooter Area?',
                'desc' => 'Can also be individualized for each page.',
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
            ),

            array(
                'id' => 'ut_subfooter_style',
                'label' => 'Subfooter Style',
                'desc' => 'Select between 2 different subfooter styles.',
                'type' => 'select',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_subfooter_settings',
                'std' => 'style-1',
                'choices' => array(
                    array(
                        'value' => 'style-1',
                        'label' => 'Style One'
                    ),
                    array(
                        'value' => 'style-2',
                        'label' => 'Style Two'
                    )
                ),
            ),

            array(
                'id' => 'ut_subfooter_style_reverse',
                'label' => 'Reverse Subfooter Boxes',
                'desc' => 'Using this option will swap the slogan area with your social icons area inside your subfooter.',
                'type' => 'select',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_subfooter_settings',
                'std' => 'no',
                'choices' => array(
                    array(
                        'value' => 'no',
                        'label' => 'no, thanks!'
                    ),
                    array(
                        'value' => 'yes',
                        'label' => 'yes, please!'
                    )
                ),
                'required' => array(
                    'ut_subfooter_style' => 'style-2'
                )
            ),

            array(
                'id' => 'ut_subfooter_padding_top',
                'label' => 'Subfooter Spacing Top',
                'desc' => '<strong>(optional)</strong> - value in pixel e.g. 10px. Default: 0px. If <strong>Subfooter Background Color</strong> has been set, default is: 20px.',
                'type' => 'text',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_subfooter_settings',
            ),

            array(
                'id' => 'ut_subfooter_border_top_width',
                'label' => 'Subfooter Border Top Width',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'select',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_subfooter_settings',
                'std' => 'centered',
                'choices' => array(
                    array(
                        'value' => 'centered',
                        'label' => 'centered'
                    ),
                    array(
                        'value' => 'fullwidth',
                        'label' => 'fullwidth'
                    )
                ),
            ),

            array(
                'id' => 'ut_subfooter_border_top_padding_bottom',
                'label' => 'Subfooter Border Spacing Bottom',
                'desc' => '<strong>(optional)</strong> - value in pixel e.g. 10px. Default: 20px.',
                'type' => 'text',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_subfooter_settings',
                'required' => array(
                    'ut_subfooter_border_top_width' => 'centered'
                )
            ),

            array(
                'id' => 'ut_subfooter_padding_bottom',
                'label' => 'Subfooter Spacing Bottom',
                'desc' => '<strong>(optional)</strong> - value in pixel e.g. 10px. Default: 0px.',
                'type' => 'text',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_subfooter_settings',

            ),

            array(
                'id' => 'ut_site_copyright',
                'label' => 'Slogan',
                'desc' => 'Add an additional slogan to the footer of this theme.',
                'type' => 'textarea-simple',
                'markup' => '1_1',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_subfooter_settings',
                'rows' => '3'
            ),

            array(
                'id' => 'ut_subfooter_font_weight',
                'label' => 'Copyright Font Weight',
                'desc' => 'Font weight for copyright.',
                'type' => 'select',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_subfooter_settings',
                'std' => 'normal',
                'choices' => array(
                    array(
                        'value' => 'normal',
                        'label' => 'Normal'
                    ),
                    array(
                        'value' => 'bold',
                        'label' => 'Bold'
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
            ),

            array(
                'id' => 'ut_subfooter_link_font_weight',
                'label' => 'Copyright Link Font Weight',
                'desc' => 'Font weight for links in copyright.',
                'type' => 'select',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_subfooter_settings',
                'std' => 'bold',
                'choices' => array(
                    array(
                        'value' => 'normal',
                        'label' => 'Normal'
                    ),
                    array(
                        'value' => 'bold',
                        'label' => 'Bold'
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
            ),

            array(
                'id' => 'ut_subfooter_font_style',
                'label' => 'Copyright Font Size',
                'desc' => 'Font size for copyright.',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_subfooter_settings',
                'type' => 'typography',
                //'markup'      => '1_1',
            ),

            array(
                'id' => 'ut_footer_social_icons',
                'label' => 'Social Icons',
                'desc' => 'Add your desired social profile icon and links. <br /><strong>You can re-order with drag & drop, the order will update after saving.</strong>',
                'type' => 'list-item',
                'list_title' => false,
                'markup' => '1_1',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_subfooter_settings',
                'settings' => array(
                    array(
                        'id' => 'icon',
                        'label' => 'Icon',
                        'class' => 'ut-select-setting-title',
                        'type' => 'select',
                        'choices' => ot_recognized_social_links(),

                    ),
                    array(
                        'id' => 'link',
                        'label' => 'Link',
                        'type' => 'text',
                        'rows' => '3'
                    )
                )

            ),

            array(
                'id' => 'ut_subfooter_color_setting_headline',
                'label' => 'Subfooter Colors',
                'desc' => 'Subfooter Colors',
                'type' => 'section_headline',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_subfooter_settings',
            ),

            array(
                'id' => 'ut_subfooter_border_top_color',
                'label' => 'Subfooter Border Top Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_subfooter_settings',
            ),

            array(
                'id' => 'ut_subfooter_bgcolor',
                'label' => 'Subfooter Background Color',
                'desc' => '<strong>(optional)</strong> - set an alternative background color for your subfooter.',
                'type' => 'gradient_colorpicker',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_subfooter_settings',
            ),

            array(
                'id' => 'ut_subfooter_text_color',
                'label' => 'Subfooter Text Color',
                'desc' => 'HEX Color.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_subfooter_settings',
            ),

            array(
                'id' => 'ut_subfooter_link_color',
                'label' => 'Subfooter Link Color',
                'desc' => 'HEX Color.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_subfooter_settings',
            ),

            array(
                'id' => 'ut_subfooter_link_color_hover',
                'label' => 'Subfooter Link Hover Color',
                'desc' => 'HEX Color.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_subfooter_settings',
            ),

            array(
                'id' => 'ut_subfooter_icon_color',
                'label' => 'Subfooter Icon Color',
                'desc' => 'HEX Color.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_subfooter_settings',
            ),

            array(
                'id' => 'ut_subfooter_headline_color',
                'label' => 'Subfooter Headline Color',
                'desc' => 'HEX Color.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_subfooter_settings',
            ),

            array(
                'id' => 'ut_subfooter_social_icon_color',
                'label' => 'Subfooter Social Icons Color',
                'desc' => 'HEX Color.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_subfooter_settings',
            ),

            array(
                'id' => 'ut_subfooter_social_icon_color_hover',
                'label' => 'Subfooter Social Icons Hover Color',
                'desc' => 'HEX Color.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_subfooter_settings',
            ),

	        array(
		        'id' => 'ut_sub_footer_cursor_skin_headline',
		        'label' => 'Cursor Skin Settings',
		        'type' => 'section_headline',
		        'section' => 'ut_general_settings',
		        'subsection' => 'ut_subfooter_settings',
	        ),

	        array(
		        'id' => 'ut_sub_footer_cursor_skin',
		        'label' => 'Sub Footer Cursor Skin',
		        'desc' => 'If you are using a custom cursor, you can change the skin with this option.',
		        'type' => 'select',
		        'section' => 'ut_general_settings',
		        'subsection' => 'ut_subfooter_settings',
		        'std' => 'footer',
		        'choices' => apply_filters( 'ot_recognized_custom_cursors', array(
			        array(
				        'value' => 'footer',
				        'label' => 'Same as Footer'
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
	        ),


            array(
                'id' => 'ut_subfooter_copyright_setting_headline',
                'label' => 'Subfooter Copyright',
                'desc' => 'Subfooter Copyright',
                'type' => 'section_headline',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_subfooter_settings',
            ),

            array(
                'id' => 'ut_subfooter_copyright',
                'label' => 'Overwrite Copyright?',
                'desc' => 'Keeping our copyright is highly appreciated, however if you like, you can change it to your needs. You can do this by using this option. Changing any source copyyrights is not permitted.',
                'type' => 'select',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_subfooter_settings',
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
            ),

            array(
                'id' => 'ut_subfooter_copyright_text',
                'label' => 'Copyright',
                'desc' => 'Enter your custom copyright.',
                'type' => 'text',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_subfooter_settings',
                'required' => array(
                    'ut_subfooter_copyright' => 'on'
                )
            ),

            /*
            |--------------------------------------------------------------------------
            | Typography - Body
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_global_body_headline',
                'label' => 'Body Font Face',
                'type' => 'panel_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_body_settings',
            ),

            array(
                'id' => 'ut_body_font_type',
                'label' => 'Choose Font Source',
                'desc' => sprintf( 'Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_body_settings',
                'std' => 'ut-font',
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
            ),

            array(
                'id' => 'ut_body_font_color',
                'label' => 'Body Font Color',
                'desc' => 'Main body font color.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_body_settings'
            ),

            array(
                'id' => 'ut_strong_websafe_font_style',
                'label' => 'Body Bold Font Weight',
                'desc' => '<strong>(optional)</strong> - default bold.',
                'type' => 'typography',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_body_settings'
            ),

            array(
                'id' => 'ut_google_body_font_style',
                'label' => 'Body Font Style',
                'type' => 'googlefont',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_body_settings',
                'required' => array(
                    'ut_body_font_type' => 'ut-google'
                )
            ),

            array(
                'id' => 'ut_body_font_style',
                'label' => 'Body Font Style',
                'desc' => '<strong>(optional)</strong> - default regular. <a href="#" class="ut-font-preview">Preview Theme Font Style</a>',
                'std' => 'regular',
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_body_settings',
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
                    'ut_body_font_type' => 'ut-font'
                )
            ),

            array(
                'id' => 'ut_body_websafe_font_style',
                'label' => 'Body Font Style',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_body_settings',
                'required' => array(
                    'ut_body_font_type' => 'ut-websafe'
                )
            ),

            array(
                'id' => 'ut_body_custom_font_style',
                'label' => 'Body Font Style',
                'type' => 'custom_typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_body_settings',
                'required' => array(
                    'ut_body_font_type' => 'ut-custom'
                )
            ),

            /*
            |--------------------------------------------------------------------------
            | Typography - Navigation
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_global_header_headline',
                'label' => 'Text Logo Font',
                'type' => 'panel_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_navigation_logo_settings',
                'breakpoint_support' => true,
            ),


            array(
                'id' => 'ut_global_header_text_logo_font_type',
                'label' => 'Choose Font Source',
                'desc' => sprintf( 'Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_navigation_logo_settings',
                'std' => 'ut-font',
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
            ),

            array(
                'id' => 'ut_global_header_text_google_font_style',
                'label' => 'Text Logo Font Style',
                'type' => 'googlefont',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_navigation_logo_settings',
                'breakpoint_support' => true,
                'required' => array(
                    'ut_global_header_text_logo_font_type' => 'ut-google'
                )
            ),

            array(
                'id' => 'ut_global_header_text_logo_websafe_font_style',
                'label' => 'Text Logo Font Style',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_navigation_logo_settings',
                'breakpoint_support' => true,
                'required' => array(
                    'ut_global_header_text_logo_font_type' => 'ut-websafe'
                )
            ),

            array(
                'id' => 'ut_global_header_text_logo_custom_font_style',
                'label' => 'Text Logo Font Style',
                'type' => 'custom_typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_navigation_logo_settings',
                'breakpoint_support' => true,
                'required' => array(
                    'ut_global_header_text_logo_font_type' => 'ut-custom'
                )
            ),

            array(
                'id' => 'ut_global_header_text_logo_font_style',
                'label' => 'Text Logo Font Style',
                'desc' => 'Font Settings will be applied to mobile menu as well. <a href="#" class="ut-font-preview">Font Styles</a>',
                'type' => 'select',
                'std' => 'semibold',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_navigation_logo_settings',
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
                    'ut_global_header_text_logo_font_type' => 'ut-font'
                )
            ),

	        array(
		        'id' => 'ut_global_navigation_description_headline',
		        'label' => 'Navigation Description Font',
		        'desc' => 'Navigation Font',
		        'type' => 'panel_headline',
		        'section' => 'ut_typography_settings',
		        'subsection' => 'ut_global_navigation_menu_settings',
	        ),

	        array(
		        'id' => 'ut_global_navigation_description_font_size',
		        'label' => 'Navigation Description Font Size.',
		        'desc' => 'Drag the handle to set the font size.',
		        'type' => 'numeric-slider',
		        'section' => 'ut_typography_settings',
		        'subsection' => 'ut_global_navigation_menu_settings',
		        'min_max_step' => '0.5,0.9,0.01',
		        'std' => '0.9'
	        ),


            array(
                'id' => 'ut_global_navigation_headline',
                'label' => 'Navigation Font',
                'desc' => 'Navigation Font',
                'type' => 'section_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_navigation_menu_settings',
            ),

            array(
                'id' => 'ut_global_navigation_font_type',
                'label' => 'Choose Font Source',
                'desc' => sprintf( 'Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_navigation_menu_settings',
                'std' => 'ut-font',
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
            ),

            array(
                'id' => 'ut_global_navigation_google_font_style',
                'label' => 'Navigation Font Style',
                'desc' => 'Font Settings will be applied to mobile menu as well.',
                'type' => 'googlefont',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_navigation_menu_settings',
                'required' => array(
                    'ut_global_navigation_font_type' => 'ut-google'
                )
            ),

            array(
                'id' => 'ut_global_navigation_websafe_font_style',
                'label' => 'Navigation Font Style',
                'desc' => 'Font Settings will be applied to mobile menu as well.',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_navigation_menu_settings',
                'required' => array(
                    'ut_global_navigation_font_type' => 'ut-websafe'
                )
            ),

            array(
                'id' => 'ut_global_side_navigation_arrow_line_height',
                'label' => 'Side Navigation Arrow Line Height',
                'desc' => 'Only affects vertical navigation.',
                'type' => 'text',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_navigation_menu_settings',
            ),

            array(
                'id' => 'ut_global_navigation_custom_font_style',
                'label' => 'Navigation Font Style',
                'desc' => 'Font Settings will be applied to mobile menu as well.',
                'type' => 'custom_typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_navigation_menu_settings',
                'required' => array(
                    'ut_global_navigation_font_type' => 'ut-custom'
                )
            ),

            array(
                'id' => 'ut_global_navigation_font_style',
                'label' => 'Navigation Font Style',
                'desc' => 'Font Settings will be applied to mobile menu as well. <a href="#" class="ut-font-preview">Font Styles</a>',
                'type' => 'select',
                'std' => 'semibold',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_navigation_menu_settings',
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
                    'ut_global_navigation_font_type' => 'ut-font'
                )
            ),

            array(
                'id' => 'ut_global_navigation_submenu_headline',
                'label' => 'Navigation Submenu Font',
                'desc' => 'Navigation Submenu Font',
                'type' => 'section_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_navigation_menu_settings',
            ),

            array(
                'id' => 'ut_global_navigation_submenu_font_type',
                'label' => 'Choose Font Source',
                'desc' => sprintf( 'Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_navigation_menu_settings',
                'std' => 'inherit',
                'choices' => array(
                    array(
                        'value' => 'inherit',
                        'label' => 'Navigation Font'
                    ),
                    array(
                        'value' => 'ut-google',
                        'label' => 'Google Font'
                    ),
                    array(
                        'value' => 'ut-websafe',
                        'label' => 'Web Safe Fonts'
                    ),
                    array(
                        'value' => 'ut-font',
                        'label' => 'Brooklyn Theme Font (Raleway)'
                    ),
                    array(
                        'value' => 'ut-custom',
                        'label' => 'Custom Font'
                    )
                ),
            ),
            array(
                'id' => 'ut_global_navigation_submenu_font_style',
                'label' => 'Navigation Submenu Font Setting',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_navigation_menu_settings',
                'required' => array(
                    'ut_global_navigation_submenu_font_type' => 'inherit'
                )
            ),
            array(
                'id' => 'ut_global_navigation_submenu_google_font_style',
                'label' => 'Navigation Font Style',
                'type' => 'googlefont',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_navigation_menu_settings',
                'required' => array(
                    'ut_global_navigation_submenu_font_type' => 'ut-google'
                )
            ),
            array(
                'id' => 'ut_global_navigation_submenu_websafe_font_style',
                'label' => 'Navigation Font Style',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_navigation_menu_settings',
                'required' => array(
                    'ut_global_navigation_submenu_font_type' => 'ut-websafe'
                )
            ),
            array(
                'id' => 'ut_global_navigation_submenu_theme_font_style',
                'label' => 'Navigation Font Style',
                'type' => 'select',
                'std' => 'semibold',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_navigation_menu_settings',
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
                    'ut_global_navigation_submenu_font_type' => 'ut-font'
                )
            ),
            array(
                'id' => 'ut_global_navigation_submenu_custom_font_style',
                'label' => 'Navigation Font Style',
                'type' => 'custom_typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_navigation_menu_settings',
                'required' => array(
                    'ut_global_navigation_submenu_font_type' => 'ut-custom'
                )
            ),

            // Mega Menu Titles
            array(
                'id' => 'ut_global_navigation_megamenu_headline',
                'label' => 'Megamenu Column Title Font',
                'desc' => 'Megamenu Column Title Font',
                'type' => 'panel_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_navigation_megamenu_typography_settings',
            ),

            array(
                'id' => 'ut_global_megamenu_column_title_font_type',
                'label' => 'Choose Font Source',
                'desc' => sprintf( 'Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_navigation_megamenu_typography_settings',
                'std' => 'inherit',
                'choices' => array(
                    array(
                        'value' => 'inherit',
                        'label' => 'Navigation Font'
                    ),
                    array(
                        'value' => 'ut-font',
                        'label' => 'Brooklyn Theme Font (Raleway)'
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
            ),

            array(
                'id' => 'ut_global_megamenu_column_title_google_font_style',
                'label' => 'Navigation Font Style',
                'type' => 'googlefont',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_navigation_megamenu_typography_settings',
                'required' => array(
                    'ut_global_megamenu_column_title_font_type' => 'ut-google'
                )
            ),

            array(
                'id' => 'ut_global_megamenu_column_title_websafe_font_style',
                'label' => 'Navigation Font Style',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_navigation_megamenu_typography_settings',
                'required' => array(
                    'ut_global_megamenu_column_title_font_type' => 'ut-websafe'
                )
            ),

            array(
                'id' => 'ut_global_megamenu_column_title_custom_font_style',
                'label' => 'Navigation Font Style',
                'type' => 'custom_typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_navigation_megamenu_typography_settings',
                'required' => array(
                    'ut_global_megamenu_column_title_font_type' => 'ut-custom'
                )
            ),

            array(
                'id' => 'ut_global_megamenu_column_title_font_style',
                'label' => 'Navigation Font Style',
                'desc' => 'Select desired megmenu title font style.',
                'type' => 'select',
                'std' => 'semibold',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_navigation_megamenu_typography_settings',
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
                    'ut_global_megamenu_column_title_font_type' => 'ut-font'
                )
            ),

            // Modules Custom Fields Font
            array(
                'id' => 'ut_global_navigation_modules_headline',
                'label' => 'Custom Fields Font',
                'desc' => 'Custom Fields Font',
                'type' => 'panel_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_navigation_custom_fields_typography_settings',
            ),
            array(
                'id' => 'ut_global_navigation_modules_font_type',
                'label' => 'Choose Font Source',
                'desc' => sprintf( 'Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_navigation_custom_fields_typography_settings',
                'std' => 'inherit',
                'choices' => array(
                    array(
                        'value' => 'inherit',
                        'label' => 'Navigation Font'
                    ),
                    array(
                        'value' => 'ut-google',
                        'label' => 'Google Font'
                    ),
                    array(
                        'value' => 'ut-websafe',
                        'label' => 'Web Safe Fonts'
                    ),
                    array(
                        'value' => 'ut-font',
                        'label' => 'Brooklyn Theme Font (Raleway)'
                    ),
                    array(
                        'value' => 'ut-custom',
                        'label' => 'Custom Font'
                    )
                ),
            ),
            array(
                'id' => 'ut_global_navigation_modules_font_style',
                'label' => 'Custom Fields Font Setting',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_navigation_custom_fields_typography_settings',
                'required' => array(
                    'ut_global_navigation_modules_font_type' => 'inherit'
                )
            ),
            array(
                'id' => 'ut_global_navigation_modules_google_font_style',
                'label' => 'Custom Fields Font Style',
                'type' => 'googlefont',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_navigation_custom_fields_typography_settings',
                'required' => array(
                    'ut_global_navigation_modules_font_type' => 'ut-google'
                )
            ),
            array(
                'id' => 'ut_global_navigation_modules_websafe_font_style',
                'label' => 'Custom Fields Font Style',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_navigation_custom_fields_typography_settings',
                'required' => array(
                    'ut_global_navigation_modules_font_type' => 'ut-websafe'
                )
            ),
            array(
                'id' => 'ut_global_navigation_modules_theme_font_style',
                'label' => 'Custom Fields Font Style',
                'type' => 'select',
                'std' => 'semibold',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_navigation_custom_fields_typography_settings',
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
                    'ut_global_navigation_modules_font_type' => 'ut-font'
                )
            ),
            array(
                'id' => 'ut_global_navigation_modules_custom_font_style',
                'label' => 'Custom Fields Font Style',
                'type' => 'custom_typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_navigation_custom_fields_typography_settings',
                'required' => array(
                    'ut_global_navigation_modules_font_type' => 'ut-custom'
                )
            ),

            // Modules Custom Fields Font
            array(
                'id' => 'ut_global_navigation_buttons_headline',
                'label' => 'Buttons Font',
                'desc' => 'Buttons Font',
                'type' => 'panel_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_navigation_buttons_typography_settings',
            ),
            array(
                'id' => 'ut_global_navigation_buttons_font_type',
                'label' => 'Choose Font Source',
                'desc' => sprintf( 'Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_navigation_buttons_typography_settings',
                'std' => 'inherit',
                'choices' => array(
                    array(
                        'value' => 'inherit',
                        'label' => 'Navigation Font'
                    ),
                    array(
                        'value' => 'ut-google',
                        'label' => 'Google Font'
                    ),
                    array(
                        'value' => 'ut-websafe',
                        'label' => 'Web Safe Fonts'
                    ),
                    array(
                        'value' => 'ut-font',
                        'label' => 'Brooklyn Theme Font (Raleway)'
                    ),
                    array(
                        'value' => 'ut-custom',
                        'label' => 'Custom Font'
                    )
                ),
            ),
            array(
                'id' => 'ut_global_navigation_buttons_font_style',
                'label' => 'Buttons Font Setting',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_navigation_buttons_typography_settings',
                'required' => array(
                    'ut_global_navigation_buttons_font_type' => 'inherit'
                )
            ),
            array(
                'id' => 'ut_global_navigation_buttons_google_font_style',
                'label' => 'Buttons Font Style',
                'type' => 'googlefont',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_navigation_buttons_typography_settings',
                'required' => array(
                    'ut_global_navigation_buttons_font_type' => 'ut-google'
                )
            ),
            array(
                'id' => 'ut_global_navigation_buttons_websafe_font_style',
                'label' => 'Buttons Font Style',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_navigation_buttons_typography_settings',
                'required' => array(
                    'ut_global_navigation_buttons_font_type' => 'ut-websafe'
                )
            ),
            array(
                'id' => 'ut_global_navigation_buttons_theme_font_style',
                'label' => 'Buttons Font Style',
                'type' => 'select',
                'std' => 'semibold',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_navigation_buttons_typography_settings',
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
                    'ut_global_navigation_buttons_font_type' => 'ut-font'
                )
            ),
            array(
                'id' => 'ut_global_navigation_buttons_custom_font_style',
                'label' => 'Buttons Font Style',
                'type' => 'custom_typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_navigation_buttons_typography_settings',
                'required' => array(
                    'ut_global_navigation_buttons_font_type' => 'ut-custom'
                )
            ),


            // Mobile Navigation
            array(
                'id' => 'ut_global_mobile_navigation_headline',
                'label' => 'Mobile Navigation Font',
                'desc' => 'Mobile Navigation Font',
                'type' => 'panel_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_mobile_menu_settings',
            ),

            array(
                'id' => 'ut_global_mobile_navigation_font_style',
                'label' => 'Mobile Navigation Font Setting',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_mobile_menu_settings',
            ),

            array(
                'id' => 'ut_global_mobile_navigation_sub_font_style',
                'label' => 'Mobile Navigation Submenu Font Setting',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_mobile_menu_settings',
            ),

            /*
            |--------------------------------------------------------------------------
            | Typography - Overlay Navigation
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_global_overlay_navigation_headline',
                'label' => 'Overlay Navigation Font',
                'type' => 'panel_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_overlay_navigation_settings',
                //'breakpoint_support' => true,
            ),

            array(
                'id' => 'ut_overlay_navigation_font_type',
                'label' => 'Choose Font Source',
                'desc' => sprintf( 'Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_overlay_navigation_settings',
                'std' => 'ut-font',
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
            ),

            array(
                'id' => 'ut_google_overlay_navigation_style',
                'label' => 'Overlay Navigation Font Style',
                'type' => 'googlefont',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_overlay_navigation_settings',
                'required' => array(
                    'ut_overlay_navigation_font_type' => 'ut-google'
                )
            ),

            array(
                'id' => 'ut_global_overlay_navigation_websafe_font_style',
                'label' => 'Overlay Navigation Font Style',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_overlay_navigation_settings',
                'required' => array(
                    'ut_overlay_navigation_font_type' => 'ut-websafe'
                )
            ),

            array(
                'id' => 'ut_global_overlay_navigation_custom_font_style',
                'label' => 'Overlay Navigation Font Style',
                'type' => 'custom_typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_overlay_navigation_settings',
                'required' => array(
                    'ut_overlay_navigation_font_type' => 'ut-custom'
                )
            ),

            array(
                'id' => 'ut_overlay_navigation_font_style',
                'label' => 'Overlay Navigation Font Style',
                'desc' => 'Font Settings will be applied to mobile menu as well. <a href="#" class="ut-font-preview">Font Styles</a>',
                'type' => 'select',
                'std' => 'semibold',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_overlay_navigation_settings',
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
                    'ut_overlay_navigation_font_type' => 'ut-font'
                )
            ),

            array(
                'id' => 'ut_global_overlay_navigation_submenu_websafe_font_style',
                'label' => 'Overlay Navigation Submenu Font Style',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_overlay_navigation_settings'
            ),

            /*
            |--------------------------------------------------------------------------
            | Hero Front Font Style
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_front_hero_font_style_headline',
                'label' => 'Heroes Font Face',
                'type' => 'panel_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_front_hero_font_style_settings',
                'breakpoint_support' => true,
            ),
            array(
                'id' => 'ut_front_hero_font_type',
                'label' => 'Choose Font Source',
                'desc' => sprintf( 'Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_front_hero_font_style_settings',
                'std' => 'ut-font',
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
            ),
            array(
                'id' => 'ut_google_front_page_hero_font_style',
                'label' => 'Hero Caption Title Font Style',
                'type' => 'googlefont',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_front_hero_font_style_settings',
                'breakpoint_support' => true,
                'required' => array(
                    'ut_front_hero_font_type' => 'ut-google'
                )
            ),
            array(
                'id' => 'ut_front_page_hero_font_style',
                'label' => 'Hero Caption Title Font Style',
                'desc' => '<a href="#" class="ut-font-preview">Preview Font Styles</a>',
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_front_hero_font_style_settings',
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
                    'ut_front_hero_font_type' => 'ut-font'
                )
            ),
            array(
                'id' => 'ut_front_page_hero_websafe_font_style',
                'label' => 'Hero Caption Title Font Style',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_front_hero_font_style_settings',
                'breakpoint_support' => true,
                'required' => array(
                    'ut_front_hero_font_type' => 'ut-websafe'
                )
            ),
            array(
                'id' => 'ut_front_page_hero_custom_font_style',
                'label' => 'Hero Caption Title Font Style',
                'type' => 'custom_typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_front_hero_font_style_settings',
                'breakpoint_support' => true,
                'required' => array(
                    'ut_front_hero_font_type' => 'ut-custom'
                )
            ),

            /*
            |--------------------------------------------------------------------------
            | Hero Caption Description Top
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_front_catchphrase_top_font_style_headline',
                'label' => 'Hero Caption Slogan Font Face',
                'type' => 'section_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_front_hero_font_style_settings',
                'breakpoint_support' => true,
            ),

            array(
                'id' => 'ut_front_catchphrase_top_font_type',
                'label' => 'Choose Font Source',
                'desc' => sprintf( 'Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_front_hero_font_style_settings',
                'std' => 'ut-websafe',
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
            ),

            array(
                'id' => 'ut_google_front_catchphrase_top_font_style',
                'label' => 'Hero Caption Slogan Font Style',
                'type' => 'googlefont',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_front_hero_font_style_settings',
                'breakpoint_support' => true,
                'required' => array(
                    'ut_front_catchphrase_top_font_type' => 'ut-google'
                )
            ),

            array(
                'id' => 'ut_front_catchphrase_top_font_style',
                'label' => 'Hero Caption Slogan Font Style',
                'desc' => '<a href="#" class="ut-font-preview">Preview Font Styles</a>',
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_front_hero_font_style_settings',
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
                    'ut_front_catchphrase_top_font_type' => 'ut-font'
                )
            ),

            array(
                'id' => 'ut_front_catchphrase_top_websafe_font_style',
                'label' => 'Hero Caption Slogan Font Style',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_front_hero_font_style_settings',
                'breakpoint_support' => true,
                'required' => array(
                    'ut_front_catchphrase_top_font_type' => 'ut-websafe'
                )
            ),

            array(
                'id' => 'ut_front_catchphrase_top_custom_font_style',
                'label' => 'Hero Caption Slogan Font Style',
                'type' => 'custom_typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_front_hero_font_style_settings',
                'breakpoint_support' => true,
                'required' => array(
                    'ut_front_catchphrase_top_font_type' => 'ut-custom'
                )
            ),

            /*
            |--------------------------------------------------------------------------
            | Hero Caption Description
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_front_catchphrase_font_style_headline',
                'label' => 'Hero Caption Description Font Face',
                'type' => 'section_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_front_hero_font_style_settings',
                'breakpoint_support' => true,
            ),

            array(
                'id' => 'ut_front_catchphrase_font_type',
                'label' => 'Choose Font Source',
                'desc' => sprintf( 'Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_front_hero_font_style_settings',
                'std' => 'ut-websafe',
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
            ),

            array(
                'id' => 'ut_google_front_catchphrase_font_style',
                'label' => 'Hero Font Style',
                'type' => 'googlefont',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_front_hero_font_style_settings',
                'breakpoint_support' => true,
                'required' => array(
                    'ut_front_catchphrase_font_type' => 'ut-google'
                )
            ),

            array(
                'id' => 'ut_front_catchphrase_font_style',
                'label' => 'Hero Font Style',
                'desc' => '<a href="#" class="ut-font-preview">Preview Font Styles</a>',
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_front_hero_font_style_settings',
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
                    'ut_front_catchphrase_font_type' => 'ut-font'
                )
            ),

            array(
                'id' => 'ut_front_catchphrase_websafe_font_style',
                'label' => 'Hero Caption Description Font Setting',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_front_hero_font_style_settings',
                'breakpoint_support' => true,
                'required' => array(
                    'ut_front_catchphrase_font_type' => 'ut-websafe'
                )
            ),

            array(
                'id' => 'ut_front_catchphrase_custom_font_style',
                'label' => 'Hero Caption Description Font Setting',
                'type' => 'custom_typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_front_hero_font_style_settings',
                'breakpoint_support' => true,
                'required' => array(
                    'ut_front_catchphrase_font_type' => 'ut-custom'
                )
            ),

            /*
            |--------------------------------------------------------------------------
            | Split Hero Font Style
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_split_hero_font_style_headline',
                'label' => 'Highlighted Heroes Font Face',
                'type' => 'panel_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_split_hero_font_style_settings',
            ),
            array(
                'id' => 'ut_split_hero_custom_font',
                'label' => 'Highlighted Hero Title Custom Font',
                'desc' => 'Do you want to use a custom font settings for your Highlighted Hero Title? If set to "no, thanks!" the theme will use the default Hero Font Face settings.',
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_split_hero_font_style_settings',
                'std' => 'no',
                'choices' => array(
                    array(
                        'value' => 'no',
                        'label' => 'no, thanks!'
                    ),
                    array(
                        'value' => 'yes',
                        'label' => 'yes, please!'
                    ),
                ),
            ),
            array(
                'id' => 'ut_split_hero_font_type',
                'label' => 'Choose Font Source',
                'desc' => sprintf( 'Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_split_hero_font_style_settings',
                'std' => 'ut-font',
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
                'required' => array(
                    'ut_split_hero_custom_font' => 'yes'
                )
            ),
            array(
                'id' => 'ut_google_split_hero_font_style',
                'label' => 'Hero Font Style',
                'type' => 'googlefont',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_split_hero_font_style_settings',
                'required' => array(
                    'ut_split_hero_custom_font' => 'yes',
                    'ut_split_hero_font_type' => 'ut-google'
                )
            ),
            array(
                'id' => 'ut_split_hero_font_style',
                'label' => 'Hero Font Style',
                'desc' => '<a href="#" class="ut-font-preview">Preview Font Styles</a>',
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_split_hero_font_style_settings',
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
                    'ut_split_hero_custom_font' => 'yes',
                    'ut_split_hero_font_type' => 'ut-font'
                )
            ),
            array(
                'id' => 'ut_split_hero_websafe_font_style',
                'label' => 'Hero Font Style',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_split_hero_font_style_settings',
                'required' => array(
                    'ut_split_hero_custom_font' => 'yes',
                    'ut_split_hero_font_type' => 'ut-websafe'
                )
            ),
            array(
                'id' => 'ut_split_hero_custom_font_style',
                'label' => 'Hero Font Style',
                'type' => 'custom_typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_split_hero_font_style_settings',
                'required' => array(
                    'ut_split_hero_custom_font' => 'yes',
                    'ut_split_hero_font_type' => 'ut-custom'
                )
            ),

            /*
            |--------------------------------------------------------------------------
            | Hero Blog Font Style
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_blog_font_style_headline',
                'label' => 'Blog Hero Font Face',
                'type' => 'panel_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_blog_font_style_settings',
                'breakpoint_support' => true,
            ),

            array(
                'id' => 'ut_blog_hero_font_type',
                'label' => 'Choose Font Source',
                'desc' => sprintf( 'Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_blog_font_style_settings',
                'std' => 'ut-font',
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
            ),

            array(
                'id' => 'ut_google_blog_hero_font_style',
                'label' => 'Hero Font Style',
                'type' => 'googlefont',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_blog_font_style_settings',
                'breakpoint_support' => true,
                'required' => array(
                    'ut_blog_hero_font_type' => 'ut-google'
                )
            ),

            array(
                'id' => 'ut_blog_hero_font_style',
                'label' => 'Hero Font Style',
                'desc' => '<a href="#" class="ut-font-preview">Preview Font Styles</a>',
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_blog_font_style_settings',
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
                    'ut_blog_hero_font_type' => 'ut-font'
                )
            ),

            array(
                'id' => 'ut_blog_hero_websafe_font_style',
                'label' => 'Hero Font Style',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_blog_font_style_settings',
                'breakpoint_support' => true,
                'required' => array(
                    'ut_blog_hero_font_type' => 'ut-websafe'
                )
            ),

            array(
                'id' => 'ut_blog_hero_custom_font_style',
                'label' => 'Hero Font Style',
                'type' => 'custom_typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_blog_font_style_settings',
                'breakpoint_support' => true,
                'required' => array(
                    'ut_blog_hero_font_type' => 'ut-custom'
                )
            ),


            /*
            |--------------------------------------------------------------------------
            | Hero Caption Description Top
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_blog_catchphrase_top_font_style_headline',
                'label' => 'Blog Hero Caption Slogan Font Face',
                'type' => 'section_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_blog_font_style_settings',
                'breakpoint_support' => true,
            ),

            array(
                'id' => 'ut_blog_catchphrase_top_font_type',
                'label' => 'Choose Font Source',
                'desc' => sprintf( 'Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_blog_font_style_settings',
                'std' => 'ut-websafe',
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
            ),

            array(
                'id' => 'ut_google_blog_catchphrase_top_font_style',
                'label' => 'Hero Caption Slogan Font Style',
                'type' => 'googlefont',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_blog_font_style_settings',
                'breakpoint_support' => true,
                'required' => array(
                    'ut_blog_catchphrase_top_font_type' => 'ut-google'
                )
            ),

            array(
                'id' => 'ut_blog_catchphrase_top_font_style',
                'label' => 'Hero Caption Slogan Font Style',
                'desc' => '<a href="#" class="ut-font-preview">Preview Font Styles</a>',
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_blog_font_style_settings',
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
                    'ut_blog_catchphrase_top_font_type' => 'ut-font'
                )
            ),

            array(
                'id' => 'ut_blog_catchphrase_top_websafe_font_style',
                'label' => 'Hero Caption Slogan Font Style',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_blog_font_style_settings',
                'breakpoint_support' => true,
                'required' => array(
                    'ut_blog_catchphrase_top_font_type' => 'ut-websafe'
                )
            ),

            array(
                'id' => 'ut_blog_catchphrase_top_custom_font_style',
                'label' => 'Hero Caption Slogan Font Style',
                'type' => 'custom_typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_blog_font_style_settings',
                'breakpoint_support' => true,
                'required' => array(
                    'ut_blog_catchphrase_top_font_type' => 'ut-custom'
                )
            ),

            /*
            |--------------------------------------------------------------------------
            | Blog Hero Caption Description
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_blog_catchphrase_font_style_headline',
                'label' => 'Blog Hero Caption Description Font Face',
                'type' => 'section_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_blog_font_style_settings',
                'breakpoint_support' => true,
            ),

            array(
                'id' => 'ut_blog_catchphrase_font_type',
                'label' => 'Choose Font Source',
                'desc' => sprintf( 'Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_blog_font_style_settings',
                'std' => 'ut-websafe',
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
            ),

            array(
                'id' => 'ut_google_blog_catchphrase_font_style',
                'label' => 'Hero Font Style',
                'type' => 'googlefont',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_blog_font_style_settings',
                'breakpoint_support' => true,
                'required' => array(
                    'ut_blog_catchphrase_font_type' => 'ut-google'
                )
            ),

            array(
                'id' => 'ut_blog_catchphrase_font_style',
                'label' => 'Hero Font Style',
                'desc' => '<a href="#" class="ut-font-preview">Preview Font Styles</a>',
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_blog_font_style_settings',
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
                    'ut_blog_catchphrase_font_type' => 'ut-font'
                )
            ),

            array(
                'id' => 'ut_blog_catchphrase_websafe_font_style',
                'label' => 'Hero Caption Description Font Setting',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_blog_font_style_settings',
                'breakpoint_support' => true,
                'required' => array(
                    'ut_blog_catchphrase_font_type' => 'ut-websafe'
                )
            ),

            array(
                'id' => 'ut_blog_catchphrase_custom_font_style',
                'label' => 'Hero Caption Description Font Setting',
                'type' => 'custom_typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_blog_font_style_settings',
                'breakpoint_support' => true,
                'required' => array(
                    'ut_blog_catchphrase_font_type' => 'ut-custom'
                )
            ),

            /*
            |--------------------------------------------------------------------------
            | Singe Post Hero
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_single_post_font_style_headline',
                'label' => 'Blog Single Post Hero',
                'type' => 'panel_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_single_post_font_style_settings',
            ),

            array(
                'id' => 'ut_hero_post_meta_description_websafe_font_style',
                'label' => 'Single Post Hero Meta Description Font Setting',
                'desc' => 'Post Hero Meta contains Post Date, Categories and Author.',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_single_post_font_style_settings',
            ),


            /*
            |--------------------------------------------------------------------------
            | Global Content Widgets Font Styles
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_global_content_widgets_headline',
                'label' => 'Content Widgets',
                'type' => 'panel_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_content_widgets_settings',
            ),

            array(
                'id' => 'ut_global_content_widgets_websafe_font_style',
                'label' => 'Content Widgets Titles Font Size',
                'desc' => 'Font size for content widgets titles such as portfolio detail titles.',
                'type' => 'typography',
                //'markup'      => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_content_widgets_settings'
            ),

            /*
            |--------------------------------------------------------------------------
            | Global Headline Font Styles
            |--------------------------------------------------------------------------
            */

            #H1
            array(
                'id' => 'ut_global_htags_headline_h1',
                'label' => 'H1',
                'type' => 'panel_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
                'breakpoint_support' => true,
            ),

            array(
                'id' => 'ut_global_h1_font_type',
                'label' => 'Choose font source for H1 tags',
                'desc' => sprintf( 'Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
                'std' => 'ut-font',
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
            ),

            array(
                'id' => 'ut_global_h1_font_color',
                'label' => 'Content H1 Font Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
            ),

            array(
                'id' => 'ut_h1_google_font_style',
                'label' => 'Content H1 Font Style',
                'type' => 'googlefont',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
                'breakpoint_support' => true,
                'required' => array(
                    'ut_global_h1_font_type' => 'ut-google'
                )
            ),

            array(
                'id' => 'ut_h1_websafe_font_style',
                'label' => 'Content H1 Font Style',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
                'breakpoint_support' => true,
                'required' => array(
                    'ut_global_h1_font_type' => 'ut-websafe'
                )
            ),

            array(
                'id' => 'ut_h1_custom_font_style',
                'label' => 'Content H1 Font Style',
                'type' => 'custom_typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
                'breakpoint_support' => true,
                'required' => array(
                    'ut_global_h1_font_type' => 'ut-custom'
                )
            ),

            array(
                'id' => 'ut_h1_font_style',
                'label' => 'Content H1 Font Style',
                'desc' => '<strong>(optional)</strong> - default semibold. <br /> This option will affect content headlines. <a href="#" class="ut-font-preview">Preview Font Style</a>',
                'std' => 'semibold',
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
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
                    'ut_global_h1_font_type' => 'ut-font'
                )
            ),

            #H2
            array(
                'id' => 'ut_global_htags_headline_h2',
                'label' => 'H2',
                'desc' => 'H2',
                'type' => 'section_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
                'breakpoint_support' => true,
            ),

            array(
                'id' => 'ut_global_h2_font_type',
                'label' => 'Choose font source for H2 tags',
                'desc' => sprintf( 'Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
                'std' => 'ut-font',
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
            ),

            array(
                'id' => 'ut_global_h2_font_color',
                'label' => 'Content H2 Font Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
            ),

            array(
                'id' => 'ut_h2_google_font_style',
                'label' => 'Content H2 Font Style',
                'type' => 'googlefont',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
                'breakpoint_support' => true,
                'required' => array(
                    'ut_global_h2_font_type' => 'ut-google'
                )
            ),

            array(
                'id' => 'ut_h2_websafe_font_style',
                'label' => 'Content H2 Font Style',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
                'breakpoint_support' => true,
                'required' => array(
                    'ut_global_h2_font_type' => 'ut-websafe'
                )
            ),

            array(
                'id' => 'ut_h2_custom_font_style',
                'label' => 'Content H2 Font Style',
                'type' => 'custom_typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
                'breakpoint_support' => true,
                'required' => array(
                    'ut_global_h2_font_type' => 'ut-custom'
                )
            ),

            array(
                'id' => 'ut_h2_font_style',
                'label' => 'Content H2 Font Style',
                'desc' => '<strong>(optional)</strong> - default semibold. <br /> This option will affect content headlines. <a href="#" class="ut-font-preview">Preview Font Style</a>',
                'std' => 'semibold',
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
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
                    'ut_global_h2_font_type' => 'ut-font'
                )
            ),

            #H3
            array(
                'id' => 'ut_global_htags_headline_h3',
                'label' => 'H3',
                'desc' => 'H3',
                'type' => 'section_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
                'breakpoint_support' => true,
            ),

            array(
                'id' => 'ut_global_h3_font_type',
                'label' => 'Choose font source for H3 tags',
                'desc' => sprintf( 'Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
                'std' => 'ut-font',
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
            ),

            array(
                'id' => 'ut_global_h3_font_color',
                'label' => 'Content H3 Font Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
            ),

            array(
                'id' => 'ut_h3_google_font_style',
                'label' => 'Content H3 Font Style',
                'type' => 'googlefont',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
                'breakpoint_support' => true,
                'required' => array(
                    'ut_global_h3_font_type' => 'ut-google'
                )
            ),

            array(
                'id' => 'ut_h3_websafe_font_style',
                'label' => 'Content H3 Font Style',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
                'breakpoint_support' => true,
                'required' => array(
                    'ut_global_h3_font_type' => 'ut-websafe'
                )
            ),

            array(
                'id' => 'ut_h3_custom_font_style',
                'label' => 'Content H3 Font Style',
                'type' => 'custom_typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
                'breakpoint_support' => true,
                'required' => array(
                    'ut_global_h3_font_type' => 'ut-custom'
                )
            ),

            array(
                'id' => 'ut_h3_font_style',
                'label' => 'Content H3 Font Style',
                'desc' => '<strong>(optional)</strong> - default semibold. <br /> This option will affect content headlines. <a href="#" class="ut-font-preview">Preview Font Style</a>',
                'std' => 'semibold',
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
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
                    'ut_global_h3_font_type' => 'ut-font'
                )
            ),


            #H4
            array(
                'id' => 'ut_global_htags_headline_h4',
                'label' => 'H4',
                'desc' => 'H4',
                'type' => 'section_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
                'breakpoint_support' => true,
            ),

            array(
                'id' => 'ut_global_h4_font_type',
                'label' => 'Choose font source for H4 tags',
                'desc' => sprintf( 'Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
                'std' => 'ut-font',
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
            ),

            array(
                'id' => 'ut_global_h4_font_color',
                'label' => 'Content H4 Font Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
            ),

            array(
                'id' => 'ut_h4_google_font_style',
                'label' => 'Content H4 Font Style',
                'type' => 'googlefont',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
                'breakpoint_support' => true,
                'required' => array(
                    'ut_global_h4_font_type' => 'ut-google'
                )
            ),

            array(
                'id' => 'ut_h4_websafe_font_style',
                'label' => 'Content H4 Font Style',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
                'breakpoint_support' => true,
                'required' => array(
                    'ut_global_h4_font_type' => 'ut-websafe'
                )
            ),

            array(
                'id' => 'ut_h4_custom_font_style',
                'label' => 'Content H4 Font Style',
                'type' => 'custom_typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
                'breakpoint_support' => true,
                'required' => array(
                    'ut_global_h4_font_type' => 'ut-custom'
                )
            ),

            array(
                'id' => 'ut_h4_font_style',
                'label' => 'Content H4 Font Style',
                'desc' => '<strong>(optional)</strong> - default semibold. <br /> This option will affect content headlines. <a href="#" class="ut-font-preview">Preview Font Style</a>',
                'std' => 'semibold',
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
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
                    'ut_global_h4_font_type' => 'ut-font'
                )
            ),

            #H5
            array(
                'id' => 'ut_global_htags_headline_h5',
                'label' => 'H5',
                'desc' => 'H5',
                'type' => 'section_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
                'breakpoint_support' => true,
            ),

            array(
                'id' => 'ut_global_h5_font_type',
                'label' => 'Choose font source for H5 tags',
                'desc' => sprintf( 'Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
                'std' => 'ut-font',
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
            ),

            array(
                'id' => 'ut_global_h5_font_color',
                'label' => 'Content H5 Font Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
            ),

            array(
                'id' => 'ut_h5_google_font_style',
                'label' => 'Content H5 Font Style',
                'type' => 'googlefont',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
                'breakpoint_support' => true,
                'required' => array(
                    'ut_global_h5_font_type' => 'ut-google'
                )
            ),

            array(
                'id' => 'ut_h5_websafe_font_style',
                'label' => 'Content H5 Font Style',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
                'breakpoint_support' => true,
                'required' => array(
                    'ut_global_h5_font_type' => 'ut-websafe'
                )
            ),

            array(
                'id' => 'ut_h5_custom_font_style',
                'label' => 'Content H5 Font Style',
                'type' => 'custom_typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
                'breakpoint_support' => true,
                'required' => array(
                    'ut_global_h5_font_type' => 'ut-custom'
                )
            ),

            array(
                'id' => 'ut_h5_font_style',
                'label' => 'Content H5 Font Style',
                'desc' => '<strong>(optional)</strong> - default semibold. <br /> This option will affect content headlines. <a href="#" class="ut-font-preview">Preview Font Style</a>',
                'std' => 'semibold',
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
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
                    'ut_global_h5_font_type' => 'ut-font'
                )
            ),

            #H6
            array(
                'id' => 'ut_global_htags_headline_h6',
                'label' => 'H6',
                'desc' => 'H6',
                'type' => 'section_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
                'breakpoint_support' => true,
            ),

            array(
                'id' => 'ut_global_h6_font_type',
                'label' => 'Choose font source for H6 tags',
                'desc' => sprintf( 'Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
                'std' => 'ut-font',
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
            ),

            array(
                'id' => 'ut_global_h6_font_color',
                'label' => 'Content H6 Font Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
            ),

            array(
                'id' => 'ut_h6_google_font_style',
                'label' => 'Content H6 Font Style',
                'type' => 'googlefont',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
                'breakpoint_support' => true,
                'required' => array(
                    'ut_global_h6_font_type' => 'ut-google'
                )
            ),

            array(
                'id' => 'ut_h6_websafe_font_style',
                'label' => 'Content H6 Font Style',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
                'breakpoint_support' => true,
                'required' => array(
                    'ut_global_h6_font_type' => 'ut-websafe'
                )
            ),

            array(
                'id' => 'ut_h6_custom_font_style',
                'label' => 'Content H6 Font Style',
                'type' => 'custom_typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
                'breakpoint_support' => true,
                'required' => array(
                    'ut_global_h6_font_type' => 'ut-custom'
                )
            ),

            array(
                'id' => 'ut_h6_font_style',
                'label' => 'Content H6 Font Style',
                'desc' => '<strong>(optional)</strong> - default semibold. <br /> This option will affect content headlines. <a href="#" class="ut-font-preview">Preview Font Style</a>',
                'std' => 'semibold',
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
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
                    'ut_global_h6_font_type' => 'ut-font'
                )
            ),

            /*
            |--------------------------------------------------------------------------
            | Global Header Typography and Styles
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_global_header_styles_headline',
                'label' => 'Section Titles',
                'type' => 'panel_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_header_settings',
            ),

            array(
                'id' => 'ut_global_headline_style',
                'label' => 'Section Titles Style',
                'desc' => '<strong>(optional)</strong> - default "Style One". This option will affect section and single page headers. <br /> <strong>Keep in mind: You can change the header style individually for each page!</strong> <a href="#" class="ut-header-preview">Preview Header Styles</a>',
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_header_settings',
                'choices' => array(

                    array(
                        'value' => 'pt-style-1',
                        'label' => 'Style One'
                    ),

                    array(
                        'value' => 'pt-style-2',
                        'label' => 'Style Two'
                    ),

                    array(
                        'value' => 'pt-style-3',
                        'label' => 'Style Three'
                    ),

                    array(
                        'value' => 'pt-style-4',
                        'label' => 'Style Four'
                    ),

                    array(
                        'value' => 'pt-style-5',
                        'label' => 'Style Five'
                    ),

                    array(
                        'value' => 'pt-style-6',
                        'label' => 'Style Six'
                    ),

                    array(
                        'value' => 'pt-style-7',
                        'label' => 'Style Seven'
                    )

                ),
            ),

            /*array(
                'id' => 'ut_global_headline_style_1_type',
                'label' => 'Decoration Line Location',
                'desc' => 'Select between 2 different locations.',
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_header_settings',
                'std' => 'section',
                'choices' => array(
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
                    'ut_global_headline_style' => 'pt-style-1'
                )
            ),*/


            array(
                'id' => 'ut_global_headline_style_2_color',
                'label' => 'Style Two Decoration Line Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_header_settings',
                'required' => array(
                    'ut_global_headline_style' => 'pt-style-2'
                )
            ),

            array(
                'id' => 'ut_global_headline_style_2_height',
                'label' => 'Style Two Decoration Line Height',
                'desc' => '<strong>(optional)</strong> - value in px , default: 1px',
                'type' => 'text',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_header_settings',
                'required' => array(
                    'ut_global_headline_style' => 'pt-style-2'
                )
            ),

            array(
                'id' => 'ut_global_headline_style_2_width',
                'label' => 'Style Two Decoration Line Width',
                'desc' => '<strong>(optional)</strong> - value in % or px , default: 30px',
                'type' => 'text',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_header_settings',
                'required' => array(
                    'ut_global_headline_style' => 'pt-style-2'
                )
            ),
            array(
                'id' => 'ut_global_headline_style_2_spacing_top',
                'label' => 'Style Two Decoration Line Spacing Top',
                'desc' => '<strong>(optional)</strong> - value in % or px , default: 15px',
                'type' => 'text',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_header_settings',
                'required' => array(
                    'ut_global_headline_style' => 'pt-style-2'
                )
            ),
            array(
                'id' => 'ut_global_headline_style_4_width',
                'label' => 'Style Four Decoration Line Width',
                'desc' => 'Drag the handle to set the line width.',
                'type' => 'numeric-slider',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_header_settings',
                'min_max_step' => '1,10,1',
                'std' => '6',
                'required' => array(
                    'ut_global_headline_style' => 'pt-style-4'
                )
            ),

            array(
                'id' => 'ut_global_headline_margin_bottom',
                'label' => 'Section Titles Spacing Bottom',
                'desc' => 'Drag the handle to set the section title spacing bottom. Default: 20.',
                'std' => '20',
                'type' => 'numeric-slider',
                'min_max_step' => '0,200,1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_header_settings',

            ),

            array(
                'id' => 'ut_global_headline_align',
                'label' => 'Section Titles Text Alignment',
                'desc' => 'Set your desired section headline text align.',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_header_settings',
                'type' => 'select',
                'choices' => array(
                    array(
                        'label' => 'Center',
                        'value' => 'center'
                    ),
                    array(
                        'label' => 'Left',
                        'value' => 'left'
                    ),
                ),
                'std' => 'center'
            ),

            array(
                'id' => 'ut_global_header_stroke_effect',
                'label' => 'Add Stroke Effect',
                'desc' => '<strong>(optional)</strong>',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_header_settings',
                'type' => 'select',
                'std' => 'off',
                'choices' => array(
                    array(
                        'value' => 'on',
                        'label' => 'yes please!'
                    ),
                    array(
                        'value' => 'off',
                        'label' => 'no thanks!'
                    ),
                )
            ),
            array(
                'id' => 'ut_global_header_stroke_color',
                'label' => 'Stroke Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_header_settings',
                'required' => array(
                    'ut_global_header_stroke_effect' => 'on'
                )
            ),
            array(
                'id' => 'ut_global_header_stroke_width',
                'label' => 'Stroke Width',
                'desc' => 'Drag the handle to set the stroke width. Default: 1.',
                'std' => '1',
                'type' => 'numeric-slider',
                'min_max_step' => '1,3,1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_header_settings',
                'required' => array(
                    'ut_global_header_stroke_effect' => 'on'
                )

            ),
            array(
                'id' => 'ut_global_header_glitch_appear',
                'label' => 'Add Text Distortion?',
                'desc' => 'Activates Glitch Text Distortion Effect for Section Headlines.',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_header_settings',
                'type' => 'select',
                'std' => 'off',
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
            ),
            array(
                'id' => 'ut_global_header_glitch_appear_style',
                'label' => 'Text Distortion Style?',
                'desc' => 'Select desired text distortion style.',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_header_settings',
                'type' => 'select',
                'std' => 'style-1',
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
                    'ut_global_header_glitch_appear' => 'on_appear|on_hover|permanent'
                )
            ),
            array(
                'id' => 'ut_global_header_glitch',
                'label' => 'Add Glitch Effect',
                'desc' => 'Activate Glitch Effect for Section Titles?',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_header_settings',
                'type' => 'select',
                'std' => 'off',
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
            ),
            array(
                'id' => 'ut_global_header_glitch_style',
                'label' => 'Select Glitch Style',
                'desc' => '<strong>(optional)</strong>',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_header_settings',
                'type' => 'select',
                'std' => 'ut-glitch-2',
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
                    'ut_global_header_glitch' => 'on'
                )
            ),
            array(
                'id' => 'ut_global_header_glitch_accent_1',
                'label' => 'Glitch Color Part 1',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_header_settings',
                'required' => array(
                    'ut_global_header_glitch' => 'on',
                )
            ),
            array(
                'id' => 'ut_global_header_glitch_accent_2',
                'label' => 'Glitch Color Part 2',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_header_settings',
                'required' => array(
                    'ut_global_header_glitch' => 'on',
                )
            ),
            array(
                'id' => 'ut_global_header_glow',
                'label' => 'Add Glow Effect',
                'desc' => '<strong>(optional)</strong>',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_header_settings',
                'type' => 'select',
                'std' => 'off',
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
                'required' => array(
                    'ut_global_headline_style' => 'pt-style-2|pt-style-3|pt-style-4|pt-style-5|pt-style-6|pt-style-7'
                )
            ),
            array(
                'id' => 'ut_global_header_glow_color',
                'label' => 'Glow Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_header_settings',
                'required' => array(
                    'ut_global_header_glow' => 'on',
                    'ut_global_headline_style' => 'pt-style-2|pt-style-3|pt-style-4|pt-style-5|pt-style-6|pt-style-7'
                )
            ),
            array(
                'id' => 'ut_global_header_glow_shadow_color',
                'label' => 'Glow Text Shadow Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_header_settings',
                'required' => array(
                    'ut_global_header_glow' => 'on',
                    'ut_global_headline_style' => 'pt-style-2|pt-style-3|pt-style-4|pt-style-5|pt-style-6|pt-style-7'
                )
            ),
            array(
                'id' => 'ut_global_header_font_headline',
                'label' => 'Section Titles Font Face',
                'desc' => 'Section Titles Font Face',
                'type' => 'panel_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_header_font_settings',
                'breakpoint_support' => true,
            ),
            array(
                'id' => 'ut_global_headline_font_color',
                'label' => 'Section Titles Font Color',
                'desc' => 'Set your desired headline font color.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_header_font_settings',
            ),
            array(
                'id' => 'ut_global_headline_font_inherit',
                'label' => 'Inherit from Page Title?',
                'desc' => 'You can inherit the font settings from the page title.',
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_header_font_settings',
                'std' => 'ut-font',
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
            ),
            array(
                'id' => 'ut_global_headline_font_type',
                'label' => 'Choose Font Source',
                'desc' => sprintf( 'Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_header_font_settings',
                'std' => 'ut-font',
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
                'required' => array(
                    'ut_global_headline_font_inherit' => 'off'
                )
            ),

            array(
                'id' => 'ut_global_google_headline_font_style',
                'label' => 'Section Titles Font Style',
                'type' => 'googlefont',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_header_font_settings',
                'breakpoint_support' => true,
                'required' => array(
                    'ut_global_headline_font_type' => 'ut-google',
                     'ut_global_headline_font_inherit' => 'off'
                )
            ),

            array(
                'id' => 'ut_global_headline_font_style',
                'label' => 'Section Titles Font Style',
                'desc' => '<strong>(optional)</strong> - default semibold. This option will affect section and single page headers. <br /> <strong>Keep in mind: You can change the header font style individually for each page!</strong> <a href="#" class="ut-font-preview">Preview Font Style</a>',
                'std' => 'semibold',
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_header_font_settings',
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
                    'ut_global_headline_font_type' => 'ut-font',
                    'ut_global_headline_font_inherit' => 'off'
                )
            ),

            array(
                'id' => 'ut_global_headline_font_style_settings',
                'label' => 'General Section Title Font Settings',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_header_font_settings',
                'breakpoint_support' => true,
                'required' => array(
                    'ut_global_headline_font_type' => 'ut-font',
                    'ut_global_headline_font_inherit' => 'off'
                )
            ),

            array(
                'id' => 'ut_global_headline_websafe_font_style_settings',
                'label' => 'General Section Title Font Settings',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_header_font_settings',
                'breakpoint_support' => true,
                'required' => array(
                    'ut_global_headline_font_type' => 'ut-websafe',
                    'ut_global_headline_font_inherit' => 'off'
                )
            ),

            array(
                'id' => 'ut_global_headline_custom_font_style_settings',
                'label' => 'General Section Title Font Settings',
                'type' => 'custom_typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_header_font_settings',
                'breakpoint_support' => true,
                'required' => array(
                    'ut_global_headline_font_type' => 'ut-custom',
                    'ut_global_headline_font_inherit' => 'off'
                )
            ),


            /*
            |--------------------------------------------------------------------------
            | Global Page Titles Typography and Styles
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_global_page_header_styles_headline',
                'label' => 'General Page Title',
                'type' => 'panel_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_page_title_settings',
            ),

            array(
                'id' => 'ut_display_section_header',
                'label' => 'Show Page Title?',
                'desc' => 'A page title typically forms the first element inside a section or page. It\'s located right above the content and contains the page title as well as an optional lead slogan. This is your global option, means you can turn it on and off per page individually.',
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_page_title_settings',
                'std' => 'show',
                'choices' => array(
                    array(
                        'label' => 'Show',
                        'value' => 'show'
                    ),
                    array(
                        'label' => 'Hide',
                        'value' => 'hide'
                    )
                ),
            ),

            array(
                'id' => 'ut_global_page_headline_style',
                'label' => 'Page Title Style',
                'desc' => '<strong>(optional)</strong> - default "Style One". This option will affect single page titles. <br /> <strong>Keep in mind: You can change the header style individually for each page!</strong> <a href="#" class="ut-header-preview">Preview Header Styles</a>',
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_page_title_settings',
                'choices' => array(
                    array(
                        'value' => 'pt-style-1',
                        'label' => 'Style One'
                    ),
                    array(
                        'value' => 'pt-style-2',
                        'label' => 'Style Two'
                    ),
                    array(
                        'value' => 'pt-style-3',
                        'label' => 'Style Three'
                    ),
                    array(
                        'value' => 'pt-style-4',
                        'label' => 'Style Four'
                    ),
                    array(
                        'value' => 'pt-style-5',
                        'label' => 'Style Five'
                    ),
                    array(
                        'value' => 'pt-style-6',
                        'label' => 'Style Six'
                    ),
                    array(
                        'value' => 'pt-style-7',
                        'label' => 'Style Seven'
                    )

                ),
            ),

            /*array(
                'id' => 'ut_global_page_headline_style_1_type',
                'label' => 'Decoration Line Location',
                'desc' => 'Select between 2 different locations.',
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_page_title_settings',
                'std' => 'section',
                'choices' => array(
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
                    'ut_global_page_headline_style' => 'pt-style-1'
                )
            ),*/


            array(
                'id' => 'ut_global_page_headline_style_2_color',
                'label' => 'Style Two Decoration Line Color',
                'desc' => 'Set your desired headline decoration line color.',
                'type' => 'colorpicker',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_page_title_settings',
                'required' => array(
                    'ut_global_page_headline_style' => 'pt-style-2'
                )
            ),
            array(
                'id' => 'ut_global_page_headline_style_2_height',
                'label' => 'Style Two Decoration Line Height',
                'desc' => '<strong>(optional)</strong> - value in px , default: 1px',
                'type' => 'text',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_page_title_settings',
                'required' => array(
                    'ut_global_page_headline_style' => 'pt-style-2'
                )
            ),
            array(
                'id' => 'ut_global_page_headline_style_2_width',
                'label' => 'Style Two Decoration Line Width',
                'desc' => '<strong>(optional)</strong> - value in % or px , default: 30px',
                'type' => 'text',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_page_title_settings',
                'required' => array(
                    'ut_global_page_headline_style' => 'pt-style-2'
                )
            ),
            array(
                'id' => 'ut_global_page_headline_style_2_spacing_top',
                'label' => 'Style Two Decoration Line Spacing Top',
                'desc' => '<strong>(optional)</strong> - value in % or px , default: 15px',
                'type' => 'text',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_page_title_settings',
                'required' => array(
                    'ut_global_page_headline_style' => 'pt-style-2'
                )
            ),
            array(
                'id' => 'ut_global_page_headline_style_4_width',
                'label' => 'Style Four Decoration Line Width',
                'desc' => 'Drag the handle to set the line width.',
                'type' => 'numeric-slider',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_page_title_settings',
                'min_max_step' => '1,10,1',
                'std' => '6',
                'required' => array(
                    'ut_global_page_headline_style' => 'pt-style-4'
                )
            ),
            array(
                'id' => 'ut_global_page_headline_margin_bottom',
                'label' => 'Page Title Spacing Bottom',
                'desc' => 'Drag the handle to set the section title spacing bottom. Default: 20.',
                'std' => '20',
                'type' => 'numeric-slider',
                'min_max_step' => '0,200,1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_page_title_settings',

            ),
            array(
                'id' => 'ut_global_page_headline_align',
                'label' => 'Page Title Alignment',
                'desc' => 'Set your desired section headline text align.',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_page_title_settings',
                'type' => 'select',
                'choices' => array(
                    array(
                        'label' => 'Center',
                        'value' => 'center'
                    ),
                    array(
                        'label' => 'Left',
                        'value' => 'left'
                    ),
                ),
                'std' => 'center'
            ),
            array(
                'id' => 'ut_global_page_headline_width',
                'label' => 'Page Title Width',
                'desc' => 'Set your desired page headline width.',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_page_title_settings',
                'type' => 'select',
                'choices' => array(
                    array(
                        'label' => '7/10 (center)',
                        'value' => 'seven'
                    ),
                    array(
                        'label' => '10/10 (fullwidth)',
                        'value' => 'ten'
                    )
                ),
                'std' => 'seven'
            ),
            array(
                'id' => 'ut_global_page_title_glitch_appear',
                'label' => 'Add Text Distortion?',
                'desc' => 'Activates Glitch Text Distortion Effect for Section Headlines.',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_page_title_settings',
                'type' => 'select',
                'std' => 'off',
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
            ),
            array(
                'id' => 'ut_global_page_title_glitch_appear_style',
                'label' => 'Text Distortion Style?',
                'desc' => 'Select desired text distortion style.',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_page_title_settings',
                'type' => 'select',
                'std' => 'style-1',
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
                    'ut_global_page_title_glitch_appear' => 'on_appear|on_hover|permanent'
                )
            ),
            array(
                'id' => 'ut_global_page_title_glitch',
                'label' => 'Add Glitch Effect',
                'desc' => 'Activate Glitch Effect for <strong>General Page Title</strong>?',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_page_title_settings',
                'type' => 'select',
                'std' => 'off',
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
            ),
            array(
                'id' => 'ut_global_page_title_glitch_style',
                'label' => 'Select Glitch Style',
                'desc' => '<strong>(optional)</strong>',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_page_title_settings',
                'type' => 'select',
                'std' => 'ut-glitch-2',
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
                    'ut_global_page_title_glitch' => 'on'
                )
            ),

            array(
                'id' => 'ut_global_page_title_glitch_accent_1',
                'label' => 'Glitch Color Part 1',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_page_title_settings',
                'required' => array(
                    'ut_global_page_title_glitch' => 'on',
                )
            ),

            array(
                'id' => 'ut_global_page_title_glitch_accent_2',
                'label' => 'Glitch Color Part 2',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_page_title_settings',
                'required' => array(
                    'ut_global_page_title_glitch' => 'on',
                )
            ),
            array(
                'id' => 'ut_global_page_title_stroke_effect',
                'label' => 'Add Stroke Effect',
                'desc' => '<strong>(optional)</strong>',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_page_title_settings',
                'type' => 'select',
                'std' => 'off',
                'choices' => array(
                    array(
                        'value' => 'on',
                        'label' => 'yes please!'
                    ),
                    array(
                        'value' => 'off',
                        'label' => 'no thanks!'
                    ),
                )
            ),
            array(
                'id' => 'ut_global_page_title_stroke_color',
                'label' => 'Stroke Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_page_title_settings',
                'required' => array(
                    'ut_global_page_title_stroke_effect' => 'on'
                )
            ),
            array(
                'id' => 'ut_global_page_title_stroke_width',
                'label' => 'Stroke Width',
                'desc' => 'Drag the handle to set the stroke width. Default: 1.',
                'std' => '1',
                'type' => 'numeric-slider',
                'min_max_step' => '1,3,1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_page_title_settings',
                'required' => array(
                    'ut_global_page_title_stroke_effect' => 'on'
                )

            ),
            array(
                'id' => 'ut_global_page_title_glow',
                'label' => 'Add Glow Effect',
                'desc' => '<strong>(optional)</strong>',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_page_title_settings',
                'type' => 'select',
                'std' => 'off',
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
                'required' => array(
                    'ut_global_page_headline_style' => 'pt-style-2|pt-style-3|pt-style-4|pt-style-5|pt-style-6|pt-style-7'
                )
            ),
            array(
                'id' => 'ut_global_page_title_glow_color',
                'label' => 'Glow Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_page_title_settings',
                'required' => array(
                    'ut_global_page_title_glow' => 'on',
                    'ut_global_page_headline_style' => 'pt-style-2|pt-style-3|pt-style-4|pt-style-5|pt-style-6|pt-style-7'
                )
            ),
            array(
                'id' => 'ut_global_page_title_glow_shadow_color',
                'label' => 'Glow Text Shadow Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_page_title_settings',
                'required' => array(
                    'ut_global_page_title_glow' => 'on',
                    'ut_global_page_headline_style' => 'pt-style-2|pt-style-3|pt-style-4|pt-style-5|pt-style-6|pt-style-7'
                )
            ),

            array(
                'id' => 'ut_global_page_header_font_headline',
                'label' => 'Page Title Font Face',
                'desc' => 'Section Titles Font Face',
                'type' => 'panel_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_page_title_font_settings',
                'breakpoint_support' => true,
            ),

            array(
                'id' => 'ut_global_page_headline_font_color',
                'label' => 'General Page Title Font Color',
                'desc' => 'Set your desired page title font color.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_page_title_font_settings',
            ),

            array(
                'id' => 'ut_global_page_headline_font_type',
                'label' => 'Choose Font Source',
                'desc' => sprintf( 'Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_page_title_font_settings',
                'std' => 'ut-font',
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
            ),

            array(
                'id' => 'ut_global_page_google_headline_font_style',
                'label' => 'General Page Title Font Style',
                'type' => 'googlefont',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_page_title_font_settings',
                'breakpoint_support' => true,
                'required' => array(
                    'ut_global_page_headline_font_type' => 'ut-google'
                )
            ),

            array(
                'id' => 'ut_global_page_headline_font_style',
                'label' => 'General Page Title Font Style',
                'desc' => '<strong>(optional)</strong> - default semibold. This option will affect single page titles. <br /> <strong>Keep in mind: You can change the header font style individually for each page!</strong> <a href="#" class="ut-font-preview">Preview Font Style</a>',
                'std' => 'semibold',
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_page_title_font_settings',
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
                    'ut_global_page_headline_font_type' => 'ut-font'
                )
            ),

            array(
                'id' => 'ut_global_page_headline_websafe_font_style_settings',
                'label' => 'General Page Title Font Settings',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_page_title_font_settings',
                'breakpoint_support' => true,
                'required' => array(
                    'ut_global_page_headline_font_type' => 'ut-websafe'
                )
            ),

            array(
                'id' => 'ut_global_page_headline_custom_font_style_settings',
                'label' => 'General Page Title Font Settings',
                'type' => 'custom_typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_page_title_font_settings',
                'breakpoint_support' => true,
                'required' => array(
                    'ut_global_page_headline_font_type' => 'ut-custom'
                )
            ),

            array(
                'id' => 'ut_global_page_headline_font_style_settings',
                'label' => 'General Page Title Font Settings',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_page_title_font_settings',
                'breakpoint_support' => true,
                'required' => array(
                    'ut_global_page_headline_font_type' => 'ut-font'
                )
            ),

            /*
            |--------------------------------------------------------------------------
            | Global Header Lead  Typography and Styles
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_global_page_headline_lead_headline',
                'label' => 'Page Title Leads',
                'type' => 'panel_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_page_title_lead_settings',
                'breakpoint_support' => true,
            ),

            array(
                'id' => 'ut_global_page_headline_lead_color',
                'label' => 'Global Page Title Lead Color',
                'desc' => 'Can be overwritten by page / section settings as well as inside visual composer.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_page_title_lead_settings'
            ),

            array(
                'id' => 'ut_global_page_headline_lead_font_type',
                'label' => 'Choose Font Source',
                'desc' => sprintf( 'Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_page_title_lead_settings',
                'std' => 'ut-font',
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
            ),

            array(
                'id' => 'ut_google_global_page_headline_lead_font_style',
                'label' => 'General Page Title Lead Font Style',
                'type' => 'googlefont',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_page_title_lead_settings',
                'breakpoint_support' => true,
                'required' => array(
                    'ut_global_page_headline_lead_font_type' => 'ut-google'
                )
            ),

            array(
                'id' => 'ut_global_page_headline_lead_websafe_font_style',
                'label' => 'General Page Title Leads Font Style',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_page_title_lead_settings',
                'breakpoint_support' => true,
                'required' => array(
                    'ut_global_page_headline_lead_font_type' => 'ut-websafe'
                )
            ),

            array(
                'id' => 'ut_global_page_headline_lead_custom_font_style',
                'label' => 'General Page Title Leads Font Style',
                'type' => 'custom_typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_page_title_lead_settings',
                'breakpoint_support' => true,
                'required' => array(
                    'ut_global_page_headline_lead_font_type' => 'ut-custom'
                )
            ),

            array(
                'id' => 'ut_global_page_headline_lead_font_style',
                'label' => 'General Page Title Leads Font Style',
                'desc' => '<a href="#" class="ut-font-preview">General Section Leads Font Style</a>',
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_page_title_lead_settings',
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
                    'ut_global_page_headline_lead_font_type' => 'ut-font'
                )
            ),

            /*
            |--------------------------------------------------------------------------
            | Global Header Lead  Typography and Styles
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_global_lead_headline',
                'label' => 'Section Leads',
                'type' => 'panel_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_lead_settings',
                'breakpoint_support' => true,
            ),

             array(
                'id' => 'ut_global_lead_color',
                'label' => 'Global Section Lead Color',
                'desc' => 'Can be overwritten by page / section settings as well as inside visual composer.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_lead_settings'
            ),

            array(
                'id' => 'ut_global_lead_font_inherit',
                'label' => 'Inherit from Page Lead?',
                'desc' => 'You can inherit the font settings from the page lead.',
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_lead_settings',
                'std' => 'ut-font',
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
            ),

            array(
                'id' => 'ut_global_lead_font_type',
                'label' => 'Choose Font Source',
                'desc' => sprintf( 'Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_lead_settings',
                'std' => 'ut-font',
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
                'required' => array(
                    'ut_global_lead_font_inherit' => 'off'
                )
            ),

            array(
                'id' => 'ut_google_lead_font_style',
                'label' => 'General Section Leads Font Style',
                'type' => 'googlefont',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_lead_settings',
                'breakpoint_support' => true,
                'required' => array(
                    'ut_global_lead_font_type' => 'ut-google',
                    'ut_global_lead_font_inherit' => 'off'
                )
            ),

            array(
                'id' => 'ut_lead_websafe_font_style',
                'label' => 'General Section Leads Font Style',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_lead_settings',
                'breakpoint_support' => true,
                'required' => array(
                    'ut_global_lead_font_type' => 'ut-websafe',
                    'ut_global_lead_font_inherit' => 'off'
                )
            ),

            array(
                'id' => 'ut_lead_custom_font_style',
                'label' => 'General Section Leads Font Style',
                'type' => 'custom_typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_lead_settings',
                'breakpoint_support' => true,
                'required' => array(
                    'ut_global_lead_font_type' => 'ut-custom',
                    'ut_global_lead_font_inherit' => 'off'
                )
            ),

            array(
                'id' => 'ut_lead_font_style',
                'label' => 'General Section Leads Font Style',
                'desc' => '<a href="#" class="ut-font-preview">General Section Leads Font Style</a>',
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_lead_settings',
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
                    'ut_global_lead_font_type' => 'ut-font',
                    'ut_global_lead_font_inherit' => 'off'
                )
            ),

            /*
            |--------------------------------------------------------------------------
            | Global Contact Section Header Settings
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_contact_header_setting_headline',
                'label' => 'Contact Section Header Style',
                'type' => 'panel_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_csection_header_settings',
            ),

            array(
                'id' => 'ut_csection_header_style',
                'label' => 'Header Style',
                'desc' => '<strong>(optional)</strong> - default : Typography -> Global Header Styles. <a href="#" class="ut-header-preview">Preview Header Styles</a>',
                'type' => 'select',
                'std' => 'global',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_csection_header_settings',
                'choices' => array(
                    array(
                        'label' => 'Global',
                        'value' => 'global'
                    ),
                    array(
                        'value' => 'pt-style-1',
                        'label' => 'Style One'
                    ),
                    array(
                        'value' => 'pt-style-2',
                        'label' => 'Style Two'
                    ),
                    array(
                        'value' => 'pt-style-3',
                        'label' => 'Style Three'
                    ),
                    array(
                        'value' => 'pt-style-4',
                        'label' => 'Style Four'
                    ),
                    array(
                        'value' => 'pt-style-5',
                        'label' => 'Style Five'
                    ),
                    array(
                        'value' => 'pt-style-6',
                        'label' => 'Style Six'
                    ),
                    array(
                        'value' => 'pt-style-7',
                        'label' => 'Style Seven'
                    )

                ),
            ),

            array(
                'id' => 'ut_csection_title_style_1_type',
                'label' => 'Decoration Line Location',
                'desc' => 'Select between 2 different locations.',
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_csection_header_settings',
                'std' => 'global',
                'choices' => array(
                    /*array(
                        'value' => 'global',
                        'label' => 'Global'
                    ),*/
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
                    'ut_csection_header_style' => 'pt-style-1'
                )
            ),


            array(
                'id' => 'ut_csection_headline_style_2_color',
                'label' => 'Style Two Decoration Line Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_csection_header_settings',
                'required' => array(
                    'ut_csection_header_style' => 'pt-style-2'
                )
            ),

            array(
                'id' => 'ut_csection_headline_style_2_height',
                'label' => 'Style Two Decoration Line Height',
                'desc' => '<strong>(optional)</strong> - value in px , default: 1px',
                'type' => 'text',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_csection_header_settings',
                'required' => array(
                    'ut_csection_header_style' => 'pt-style-2'
                )
            ),

            array(
                'id' => 'ut_csection_headline_style_2_width',
                'label' => 'Style Two Decoration Line Width',
                'desc' => '<strong>(optional)</strong> - value in % or px , default: 30px',
                'type' => 'text',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_csection_header_settings',
                'required' => array(
                    'ut_csection_header_style' => 'pt-style-2'
                )
            ),
            array(
                'id' => 'ut_csection_headline_style_2_spacing_top',
                'label' => 'Style Two Decoration Line Spacing Top',
                'desc' => '<strong>(optional)</strong> - value in % or px , default: 15px',
                'type' => 'text',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_csection_header_settings',
                'required' => array(
                    'ut_csection_header_style' => 'pt-style-2'
                )
            ),
            array(
                'id' => 'ut_csection_headline_style_4_width',
                'label' => 'Style Four Decoration Line Width',
                'desc' => 'Drag the handle to set the line width.',
                'type' => 'numeric-slider',
                'min_max_step' => '1,10,1',
                'std' => '6',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_csection_header_settings',
                'required' => array(
                    'ut_csection_header_style' => 'pt-style-4'
                )
            ),
            array(
                'id' => 'ut_csection_header_padding_bottom',
                'label' => 'Section Title Spacing Bottom',
                'desc' => 'Drag the handle to set the section title spacing bottom. Default: 20.',
                'std' => '20',
                'type' => 'numeric-slider',
                'min_max_step' => '0,200,1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_csection_header_settings',

            ),
            array(
                'id' => 'ut_csection_header_align',
                'label' => 'Section Titles Text Alignment',
                'desc' => 'Set your desired section headline text align.',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_csection_header_settings',
                'type' => 'select',
                'choices' => array(
                    array(
                        'label' => 'Center',
                        'value' => 'center'
                    ),
                    array(
                        'label' => 'Left',
                        'value' => 'left'
                    ),
                ),
                'std' => 'center'
            ),
            array(
                'id' => 'ut_csection_header_glitch_appear',
                'label' => 'Add Text Distortion?',
                'desc' => 'Activates Glitch Text Distortion Effect for Section Headlines.',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_csection_header_settings',
                'type' => 'select',
                'std' => 'off',
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
            ),
            array(
                'id' => 'ut_csection_header_glitch_appear_style',
                'label' => 'Text Distortion Style?',
                'desc' => 'Select desired text distortion style.',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_csection_header_settings',
                'type' => 'select',
                'std' => 'style-1',
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
                    'ut_csection_header_glitch_appear' => 'on_appear|on_hover|permanent'
                )
            ),
            array(
                'id' => 'ut_csection_header_glitch',
                'label' => 'Add Glitch Effect',
                'desc' => 'Activate Glitch Effect for <strong>Contact Section Title</strong>?',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_csection_header_settings',
                'type' => 'select',
                'std' => 'off',
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
            ),
            array(
                'id' => 'ut_csection_header_glitch_style',
                'label' => 'Select Glitch Style',
                'desc' => '<strong>(optional)</strong>',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_csection_header_settings',
                'type' => 'select',
                'std' => 'ut-glitch-2',
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
                    'ut_csection_header_glitch' => 'on'
                )
            ),

            array(
                'id' => 'ut_csection_header_glitch_accent_1',
                'label' => 'Glitch Color Part 1',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_csection_header_settings',
                'required' => array(
                    'ut_csection_header_glitch' => 'on',
                )
            ),

            array(
                'id' => 'ut_csection_header_glitch_accent_2',
                'label' => 'Glitch Color Part 2',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_csection_header_settings',
                'required' => array(
                    'ut_csection_header_glitch' => 'on',
                )
            ),
            array(
                'id' => 'ut_csection_header_stroke_effect',
                'label' => 'Add Stroke Effect',
                'desc' => '<strong>(optional)</strong>',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_csection_header_settings',
                'type' => 'select',
                'std' => 'off',
                'choices' => array(
                    array(
                        'value' => 'on',
                        'label' => 'yes please!'
                    ),
                    array(
                        'value' => 'off',
                        'label' => 'no thanks!'
                    ),
                )
            ),
            array(
                'id' => 'ut_csection_header_stroke_color',
                'label' => 'Stroke Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_csection_header_settings',
                'required' => array(
                    'ut_csection_header_stroke_effect' => 'on'
                )
            ),
            array(
                'id' => 'ut_csection_header_stroke_width',
                'label' => 'Stroke Width',
                'desc' => 'Drag the handle to set the stroke width. Default: 1.',
                'std' => '1',
                'type' => 'numeric-slider',
                'min_max_step' => '1,3,1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_csection_header_settings',
                'required' => array(
                    'ut_csection_header_stroke_effect' => 'on'
                )

            ),
            array(
                'id' => 'ut_csection_header_glow',
                'label' => 'Add Glow Effect',
                'desc' => '<strong>(optional)</strong>',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_csection_header_settings',
                'type' => 'select',
                'std' => 'off',
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
                'required' => array(
                    'ut_csection_header_style' => 'global|pt-style-2|pt-style-3|pt-style-4|pt-style-5|pt-style-6|pt-style-7'
                )
            ),
            array(
                'id' => 'ut_csection_header_glow_color',
                'label' => 'Glow Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_csection_header_settings',
                'required' => array(
                    'ut_csection_header_glow' => 'on',
                    'ut_csection_header_style' => 'global|pt-style-2|pt-style-3|pt-style-4|pt-style-5|pt-style-6|pt-style-7'
                )
            ),
            array(
                'id' => 'ut_csection_header_glow_shadow_color',
                'label' => 'Glow Text Shadow Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_csection_header_settings',
                'required' => array(
                    'ut_csection_header_glow' => 'on',
                    'ut_csection_header_style' => 'global|pt-style-2|pt-style-3|pt-style-4|pt-style-5|pt-style-6|pt-style-7'
                )
            ),
            array(
                'id' => 'ut_csection_header_font_headline',
                'label' => 'Contact Section Header',
                'type' => 'panel_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_csection_header_font_settings',
                'breakpoint_support' => true,
            ),

            array(
                'id' => 'ut_csection_header_slogan_color',
                'label' => 'Section Title Font Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_csection_header_font_settings',
            ),

            array(
                'id' => 'ut_csection_header_font_inherit',
                'label' => 'Inherit from Section Title?',
                'desc' => 'You can inherit the font settings from the section title.',
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_csection_header_font_settings',
                'std' => 'ut-font',
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
            ),

            array(
                'id' => 'ut_csection_header_font_type',
                'label' => 'Choose font source for Header',
                'desc' => sprintf( 'Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_csection_header_font_settings',
                'std' => 'ut-font',
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
                'required' => array(
                    'ut_csection_header_font_inherit' => 'off'
                )
            ),

            array(
                'id' => 'ut_csection_header_google_font_style',
                'label' => 'Header Font Style',
                'type' => 'googlefont',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_csection_header_font_settings',
                'breakpoint_support' => true,
                'required' => array(
                    'ut_csection_header_font_type' => 'ut-google',
                    'ut_csection_header_font_inherit' => 'off'
                )
            ),

            array(
                'id' => 'ut_csection_header_websafe_font_style',
                'label' => 'Header Font Style',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_csection_header_font_settings',
                'breakpoint_support' => true,
                'required' => array(
                    'ut_csection_header_font_type' => 'ut-websafe',
                    'ut_csection_header_font_inherit' => 'off'
                )
            ),

            array(
                'id' => 'ut_csection_header_custom_font_style',
                'label' => 'Header Font Style',
                'type' => 'custom_typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_csection_header_font_settings',
                'breakpoint_support' => true,
                'required' => array(
                    'ut_csection_header_font_type' => 'ut-custom',
                    'ut_csection_header_font_inherit' => 'off'
                )
            ),

            array(
                'id' => 'ut_csection_header_font_style',
                'label' => 'Header Font Style',
                'desc' => '<strong>(optional)</strong> - default : Typography -> General Headlines. <a href="#" class="ut-font-preview">Preview Font Styles</a>',
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_csection_header_font_settings',
                'choices' => array(
                    array(
                        'label' => 'Default',
                        'value' => 'global'
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
                    'ut_csection_header_font_type' => 'ut-font'
                )
            ),

            array(
                'id' => 'ut_csection_header_font_style_settings',
                'label' => 'Header Font Style Settings',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_csection_header_font_settings',
                'required' => array(
                    'ut_csection_header_font_type' => 'ut-font'
                )
            ),

            /*
            |--------------------------------------------------------------------------
            | Global Contact Section Lead Settings
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_csection_lead_headline',
                'label' => 'Contact Section Lead',
                'type' => 'panel_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_csection_lead_settings',
                'breakpoint_support' => true,
            ),

            array(
                'id' => 'ut_csection_lead_color',
                'label' => 'Global Section Lead Color',
                'desc' => 'Can be overwritten by Page and Section Settings.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_csection_lead_settings',
            ),

            array(
                'id' => 'ut_csection_lead_font_inherit',
                'label' => 'Inherit from Section Lead?',
                'desc' => 'You can inherit the font settings from the section lead.',
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_csection_lead_settings',
                'std' => 'ut-font',
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
            ),

            array(
                'id' => 'ut_csection_lead_font_type',
                'label' => 'Choose Font Source',
                'desc' => sprintf( 'Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_csection_lead_settings',
                'std' => 'ut-font',
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
                'required' => array(
                    'ut_csection_lead_font_inherit' => 'off'
                )
            ),

            array(
                'id' => 'ut_csection_lead_google_font_style',
                'label' => 'General Section Leads Font Style',
                'type' => 'googlefont',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_csection_lead_settings',
                'breakpoint_support' => true,
                'required' => array(
                    'ut_csection_lead_font_type' => 'ut-google',
                    'ut_csection_lead_font_inherit' => 'off'
                )
            ),

            array(
                'id' => 'ut_csection_lead_websafe_font_style',
                'label' => 'General Section Leads Font Style',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_csection_lead_settings',
                'breakpoint_support' => true,
                'required' => array(
                    'ut_csection_lead_font_type' => 'ut-websafe',
                    'ut_csection_lead_font_inherit' => 'off'
                )
            ),

            array(
                'id' => 'ut_csection_lead_custom_font_style',
                'label' => 'General Section Leads Font Style',
                'type' => 'custom_typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_csection_lead_settings',
                'breakpoint_support' => true,
                'required' => array(
                    'ut_csection_lead_font_type' => 'ut-custom',
                    'ut_csection_lead_font_inherit' => 'off'
                )
            ),

            array(
                'id' => 'ut_csection_lead_font_style',
                'label' => 'General Section Leads Font Style',
                'desc' => '<a href="#" class="ut-font-preview">General Section Leads Font Style</a>',
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_csection_lead_settings',
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
                    'ut_csection_lead_font_type' => 'ut-font',
                    'ut_csection_lead_font_inherit' => 'off'
                )
            ),

            array(
                'id' => 'ut_csection_lead_font_style_settings',
                'label' => 'Header Font Style Settings',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_csection_lead_settings',
                'required' => array(
                    'ut_csection_lead_font_type' => 'ut-font'
                )
            ),



            /*
            |--------------------------------------------------------------------------
            | Portolio Hover
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_global_portfolio_title_headline',
                'label' => 'Portfolio Hover Title',
                'type' => 'panel_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_portfolio_settings',
            ),

            array(
                'id' => 'ut_global_portfolio_title_color',
                'label' => 'Portfolio Title on Hover Color',
                'desc' => 'Can be overwritten by Showcase Settings.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_portfolio_settings'
            ),

            array(
                'id' => 'ut_global_portfolio_title_font_type',
                'label' => 'Choose Font Source',
                'desc' => sprintf( 'Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_portfolio_settings',
                'std' => 'ut-font',
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
            ),

            array(
                'id' => 'ut_portfolio_title_font_style',
                'label' => 'Portfolio Title Font Style',
                'desc' => '<strong>(optional)</strong> - default : Typography -> General Headlines. <a href="#" class="ut-font-preview">Preview Font Styles</a>',
                'type' => 'select',
                'std' => 'regular',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_portfolio_settings',
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
                    'ut_global_portfolio_title_font_type' => 'ut-font'
                )
            ),

            array(
                'id' => 'ut_google_portfolio_title_font_style',
                'label' => 'Portfolio Title Font Style',
                'type' => 'googlefont',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_portfolio_settings',
                'required' => array(
                    'ut_global_portfolio_title_font_type' => 'ut-google'
                )
            ),

            array(
                'id' => 'ut_websafe_portfolio_title_font_style',
                'label' => 'Portfolio Title Font Style',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_portfolio_settings',
                'required' => array(
                    'ut_global_portfolio_title_font_type' => 'ut-websafe'
                )
            ),

            array(
                'id' => 'ut_custom_portfolio_title_font_style',
                'label' => 'Portfolio Title Font Style',
                'type' => 'custom_typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_portfolio_settings',
                'required' => array(
                    'ut_global_portfolio_title_font_type' => 'ut-custom'
                )
            ),

            array(
                'id' => 'ut_global_portfolio_title_below_headline',
                'label' => 'Portfolio Title Below',
                'desc' => 'Portfolio Title Below',
                'type' => 'section_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_portfolio_settings',
            ),

            array(
                'id' => 'ut_global_portfolio_title_below_color',
                'label' => 'Portfolio Title Below Color',
                'desc' => 'Can be overwritten by Showcase Settings.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_portfolio_settings'
            ),

            array(
                'id' => 'ut_global_portfolio_title_below_font_type',
                'label' => 'Choose Font Source',
                'desc' => sprintf( 'Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_portfolio_settings',
                'std' => 'ut-font',
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
            ),

            array(
                'id' => 'ut_portfolio_title_below_font_style',
                'label' => 'Portfolio Title Below Font Style',
                'desc' => '<strong>(optional)</strong> - default : Typography -> General Headlines. <a href="#" class="ut-font-preview">Preview Font Styles</a>',
                'type' => 'select',
                'std' => 'regular',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_portfolio_settings',
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
                    'ut_global_portfolio_title_below_font_type' => 'ut-font'
                )
            ),

            array(
                'id' => 'ut_google_portfolio_title_below_font_style',
                'label' => 'Portfolio Title Below Font Style',
                'type' => 'googlefont',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_portfolio_settings',
                'required' => array(
                    'ut_global_portfolio_title_below_font_type' => 'ut-google'
                )
            ),

            array(
                'id' => 'ut_websafe_portfolio_title_below_font_style',
                'label' => 'Portfolio Title Below Font Style',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_portfolio_settings',
                'required' => array(
                    'ut_global_portfolio_title_below_font_type' => 'ut-websafe'
                )
            ),

            array(
                'id' => 'ut_custom_portfolio_title_below_font_style',
                'label' => 'Portfolio Title Below Font Style',
                'type' => 'custom_typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_portfolio_settings',
                'required' => array(
                    'ut_global_portfolio_title_below_font_type' => 'ut-custom'
                )
            ),

            array(
                'id' => 'ut_global_portfolio_category_headline',
                'label' => 'Portfolio Hover Category and Custom Text',
                'desc' => 'Portfolio Hover Category',
                'type' => 'section_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_portfolio_settings',
            ),

            array(
                'id' => 'ut_global_portfolio_category_color',
                'label' => 'Portfolio Hover Category Color',
                'desc' => 'Can be overwritten by Showcase Settings.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_portfolio_settings'
            ),

            array(
                'id' => 'ut_global_portfolio_category_font_type',
                'label' => 'Choose Font Source',
                'desc' => sprintf( 'Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_portfolio_settings',
                'std' => 'ut-font',
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
            ),

            array(
                'id' => 'ut_portfolio_category_font_style',
                'label' => 'Header Font Style',
                'desc' => '<strong>(optional)</strong> - default : Typography -> General Headlines. <a href="#" class="ut-font-preview">Preview Font Styles</a>',
                'type' => 'select',
                'std' => 'regular',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_portfolio_settings',
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
                    'ut_global_portfolio_category_font_type' => 'ut-font'
                )
            ),

            array(
                'id' => 'ut_google_portfolio_category_font_style',
                'label' => 'Category Font Style',
                'type' => 'googlefont',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_portfolio_settings',
                'required' => array(
                    'ut_global_portfolio_category_font_type' => 'ut-google'
                )
            ),

            array(
                'id' => 'ut_websafe_portfolio_category_font_style',
                'label' => 'Category Font Style',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_portfolio_settings',
                'required' => array(
                    'ut_global_portfolio_category_font_type' => 'ut-websafe'
                )
            ),

            array(
                'id' => 'ut_custom_portfolio_category_font_style',
                'label' => 'Category Font Style',
                'type' => 'custom_typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_portfolio_settings',
                'required' => array(
                    'ut_global_portfolio_category_font_type' => 'ut-custom'
                )
            ),

            /*
            |--------------------------------------------------------------------------
            | Portfolio React Slider
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_global_portfolio_react_title_headline',
                'label' => 'React Carousel Title',
                'type' => 'panel_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_react_portfolio_settings',
            ),

            array(
                'id' => 'ut_react_portfolio_title_font_type',
                'label' => 'Choose Font Source',
                'desc' => sprintf( 'Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_react_portfolio_settings',
                'std' => 'inherit',
                'choices' => array(
                    array(
                        'value' => 'inherit',
                        'label' => 'Inherit (Body)'
                    ),
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
            ),

            array(
                'id' => 'ut_react_portfolio_title_font_style',
                'label' => 'Title Font Style',
                'desc' => '<strong>Note:</strong> The font size set is only a maximum font size. Due limited space the font might display smaller.',
                'type' => 'select',
                'std' => 'regular',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_react_portfolio_settings',
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
                    'ut_react_portfolio_title_font_type' => 'ut-font'
                )
            ),

            array(
                'id' => 'ut_global_react_portfolio_title_font_style',
                'label' => 'Title Font Style',
                'desc' => '<strong>Note:</strong> The font size set is only a maximum font size. Due limited space the font might display smaller.',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_react_portfolio_settings',
                'required' => array(
                    'ut_react_portfolio_title_font_type' => 'inherit|ut-font'
                )
            ),

            array(
                'id' => 'ut_google_react_portfolio_title_font_style',
                'label' => 'Title Font Style',
                'desc' => '<strong>Note:</strong> The font size set is only a maximum font size. Due limited space the font might display smaller.',
                'type' => 'googlefont',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_react_portfolio_settings',
                'required' => array(
                    'ut_react_portfolio_title_font_type' => 'ut-google'
                )
            ),

            array(
                'id' => 'ut_websafe_react_portfolio_title_font_style',
                'label' => 'Title Font Style',
                'desc' => '<strong>Note:</strong> The font size set is only a maximum font size. Due limited space the font might display smaller.',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_react_portfolio_settings',
                'required' => array(
                    'ut_react_portfolio_title_font_type' => 'ut-websafe'
                )
            ),

            array(
                'id' => 'ut_custom_react_portfolio_title_font_style',
                'label' => 'Title Font Style',
                'desc' => '<strong>Note:</strong> The font size set is only a maximum font size. Due limited space the font might display smaller.',
                'type' => 'custom_typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_react_portfolio_settings',
                'required' => array(
                    'ut_react_portfolio_title_font_type' => 'ut-custom'
                )
            ),

            array(
                'id' => 'ut_react_portfolio_background_title_font_headline',
                'label' => 'React Carousel Background Titles',
                'type' => 'section_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_react_portfolio_settings',
            ),

            array(
                'id' => 'ut_react_portfolio_background_title_font_type',
                'label' => 'Choose Font Source',
                'desc' => sprintf( 'Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_react_portfolio_settings',
                'std' => 'inherit',
                'choices' => array(
                    array(
                        'value' => 'inherit',
                        'label' => 'Inherit (Body)'
                    ),
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
            ),

            array(
                'id' => 'ut_react_portfolio_background_title_font_style',
                'label' => 'Background Title Font Style',
                'type' => 'select',
                'std' => 'regular',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_react_portfolio_settings',
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
                    'ut_react_portfolio_background_title_font_type' => 'ut-font'
                )
            ),

            array(
                'id' => 'ut_global_react_portfolio_background_title_font_style',
                'label' => 'Background Title Font Style',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_react_portfolio_settings',
                'required' => array(
                    'ut_react_portfolio_background_title_font_type' => 'inherit|ut-font'
                )
            ),

            array(
                'id' => 'ut_google_react_portfolio_background_title_font_style',
                'label' => 'Background Title Font Style',
                'type' => 'googlefont',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_react_portfolio_settings',
                'required' => array(
                    'ut_react_portfolio_background_title_font_type' => 'ut-google'
                )
            ),

            array(
                'id' => 'ut_websafe_react_portfolio_background_title_font_style',
                'label' => 'Background Title Font Style',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_react_portfolio_settings',
                'required' => array(
                    'ut_react_portfolio_background_title_font_type' => 'ut-websafe'
                )
            ),

            array(
                'id' => 'ut_custom_react_portfolio_background_title_font_style',
                'label' => 'Background Title Font Style',
                'type' => 'custom_typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_react_portfolio_settings',
                'required' => array(
                    'ut_react_portfolio_background_title_font_type' => 'ut-custom'
                )
            ),



            /*
            |--------------------------------------------------------------------------
            | Typography - Blockquote
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_global_blockquote_headline',
                'label' => 'Blockquotes Font Face',
                'type' => 'panel_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_blockquote_settings',
            ),

            array(
                'id' => 'ut_blockquote_font_type',
                'label' => 'Choose Font Source',
                'desc' => sprintf( 'Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_blockquote_settings',
                'std' => 'ut-font',
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
            ),

            array(
                'id' => 'ut_global_blockquote_headline_color',
                'label' => 'Global Blockquote Font Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_blockquote_settings',
            ),

            array(
                'id' => 'ut_google_blockquote_font_style',
                'label' => 'Blockquote Font Style',
                'type' => 'googlefont',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_blockquote_settings',
                'required' => array(
                    'ut_blockquote_font_type' => 'ut-google'
                )
            ),

            array(
                'id' => 'ut_blockquote_websafe_font_style',
                'label' => 'Blockquote Font Style',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_blockquote_settings',
                'required' => array(
                    'ut_blockquote_font_type' => 'ut-websafe'
                )
            ),

            array(
                'id' => 'ut_blockquote_custom_font_style',
                'label' => 'Blockquote Font Style',
                'type' => 'custom_typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_blockquote_settings',
                'required' => array(
                    'ut_blockquote_font_type' => 'ut-custom'
                )
            ),

            array(
                'id' => 'ut_blockquote_font_style',
                'label' => 'Blockquote Font Style',
                'desc' => '<a href="#" class="ut-font-preview">Blockquote Font Styles</a>',
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_blockquote_settings',
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
                    'ut_blockquote_font_type' => 'ut-font'
                )
            ),

            array(
                'id' => 'ut_single_blockquote_websafe_font_style',
                'label' => 'Single Posts Blockquote Font Styling',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_blockquote_settings'
            ),




            /*
            |--------------------------------------------------------------------------
            | Typography - Blog
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_global_blog_settings_headline',
                'label' => 'Blog',
                'type' => 'panel_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_blog_menu_settings',
                'breakpoint_support' => true,
            ),

            array(
                'id' => 'ut_global_blog_titles_font_style',
                'label' => 'Classic Blog Posts Title Font Setting',
                'desc' => 'Especially for Classic Blog and Mixed Grid Blog Layouts.',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_blog_menu_settings',
                'breakpoint_support' => true,
            ),

            array(
                'id' => 'ut_global_grid_blog_titles_font_style',
                'label' => 'Grid Blog Posts Title Font Setting',
                'desc' => 'Especially for Grid Blog and Mixed Grid Blog Layouts.',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_blog_menu_settings',
                'breakpoint_support' => true,
            ),

            array(
                'id' => 'ut_global_list_blog_titles_font_style',
                'label' => 'List Blog Posts Title Font Setting',
                'desc' => 'Only for List Blog Layouts.',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_blog_menu_settings',
                'breakpoint_support' => true,
            ),

            array(
                'id' => 'ut_global_blog_single_settings_headline',
                'label' => 'Single Posts',
                'desc' => 'Single Posts',
                'type' => 'panel_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_single_post_settings',
                'breakpoint_support' => true,
            ),

            array(
                'id' => 'ut_global_blog_single_titles_font_style',
                'label' => 'Single Post Title Font Setting',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_single_post_settings',
                'breakpoint_support' => true,
            ),

            array(
                'id' => 'ut_global_blog_single_sub_titles_font_style',
                'label' => 'Single Post Sub Title Font Setting',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_single_post_settings',
                'breakpoint_support' => true,
            ),

            /*
            |--------------------------------------------------------------------------
            | Typography - Blog Sidebar
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_global_blog_widgets_headline',
                'label' => 'Sidebar Widgets',
                'type' => 'panel_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_blog_widgets_settings',
            ),

            array(
                'id' => 'ut_global_sidebar_widgets_headline_color',
                'label' => 'Sidebar Widgets Headlines Color',
                'desc' => 'HEX Color.',
                'type' => 'colorpicker',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_blog_widgets_settings',
            ),

            array(
                'id' => 'ut_global_blog_widgets_headline_font_type',
                'label' => 'Choose Font Source',
                'desc' => sprintf( 'Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_blog_widgets_settings',
                'std' => 'ut-font',
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
            ),

            array(
                'id' => 'ut_global_blog_widgets_headline_google_font_style',
                'label' => 'Sidebar Widgets Headlines Font Style',
                'type' => 'googlefont',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_blog_widgets_settings',
                'required' => array(
                    'ut_global_blog_widgets_headline_font_type' => 'ut-google'
                )
            ),

            array(
                'id' => 'ut_global_blog_widgets_headline_websafe_font_style',
                'label' => 'Sidebar Widgets Headlines Font Style',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_blog_widgets_settings',
                'required' => array(
                    'ut_global_blog_widgets_headline_font_type' => 'ut-websafe'
                )
            ),

            array(
                'id' => 'ut_global_blog_widgets_headline_custom_font_style',
                'label' => 'Sidebar Widgets Headlines Font Style',
                'type' => 'custom_typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_blog_widgets_settings',
                'required' => array(
                    'ut_global_blog_widgets_headline_font_type' => 'ut-custom'
                )
            ),

            array(
                'id' => 'ut_global_blog_widgets_headline_font_style',
                'label' => 'Sidebar Widgets Headlines Font Style',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_blog_widgets_settings',
                'choices' => array(
	                array(
		                'label' => 'Default',
		                'value' => 'global'
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
                    'ut_global_blog_widgets_headline_font_type' => 'ut-font'
                )
            ),

            array(
                'id' => 'ut_global_blog_widgets_text_headline',
                'label' => 'Sidebar Widgets Text',
                'type' => 'section_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_blog_widgets_settings',
            ),

            array(
                'id' => 'ut_global_sidebar_widgets_text_font_size',
                'label' => 'Sidebar Text Font Size',
                'desc' => 'Value in px: e.g. 14px.',
                'type' => 'text',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_blog_widgets_settings',
            ),

            array(
                'id' => 'ut_global_sidebar_widgets_text_line_height',
                'label' => 'Sidebar Text Line Height',
                'desc' => 'Value in px: e.g. 14px.',
                'type' => 'text',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_blog_widgets_settings',
            ),

            array(
                'id' => 'ut_global_sidebar_widgets_arrow_line_height',
                'label' => 'Sidebar Widgets Arrows Line Height',
                'type' => 'text',
                'desc' => 'Defines the amount of space above and below e.g. 1.6',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_blog_widgets_settings',
            ),




            /*
            |--------------------------------------------------------------------------
            | Typography - Footer
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_global_footer_widgets_headline',
                'label' => 'Footer Widgets',
                'type' => 'panel_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_footer_typo_settings',
            ),

            array(
                'id' => 'ut_footer_widgets_headline_color',
                'label' => 'Footer Widgets Headlines Color',
                'desc' => 'HEX Color.',
                'type' => 'colorpicker',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_footer_typo_settings',
            ),

            array(
                'id' => 'ut_footer_widgets_headline_font_type',
                'label' => 'Choose Font Source',
                'desc' => sprintf( 'Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_footer_typo_settings',
                'std' => 'ut-font',
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
            ),

            array(
                'id' => 'ut_footer_widgets_headline_google_font_style',
                'label' => 'Footer Widgets Headlines Font Style',
                'type' => 'googlefont',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_footer_typo_settings',
                'required' => array(
                    'ut_footer_widgets_headline_font_type' => 'ut-google'
                )
            ),

            array(
                'id' => 'ut_footer_widgets_headline_websafe_font_style',
                'label' => 'Footer Widgets Headlines Font Style',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_footer_typo_settings',
                'required' => array(
                    'ut_footer_widgets_headline_font_type' => 'ut-websafe'
                )
            ),

            array(
                'id' => 'ut_footer_widgets_headline_custom_font_style',
                'label' => 'Footer Widgets Headlines Font Style',
                'type' => 'custom_typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_footer_typo_settings',
                'required' => array(
                    'ut_footer_widgets_headline_font_type' => 'ut-custom'
                )
            ),

            array(
                'id' => 'ut_footer_widgets_headline_font_style',
                'label' => 'Footer Widgets Headlines Font Style',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_footer_typo_settings',
                'choices' => array(
                    array(
                        'label' => 'Default',
                        'value' => 'global'
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
                    'ut_footer_widgets_headline_font_type' => 'ut-font'
                )
            ),

            array(
                'id' => 'ut_footer_widgets_text_headline',
                'label' => 'Footer Widgets Text',
                'type' => 'section_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_footer_typo_settings',
            ),
            array(
                'id' => 'ut_footer_widgets_text_font_size',
                'label' => 'Footer Text Font Size',
                'desc' => 'Drag the handle to set the desired font size.',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_footer_typo_settings',
                'type' => 'global-numeric-breakpoint-slider',
                'name_key' => 'font-size',
                'unit_support' => 'font_size',
                'min_max_step' => '0,200,1',
                'breakpoint_support' => true,
                'option_label' => false,
            ),
            array(
                'id' => 'ut_footer_widgets_text_line_height',
                'label' => 'Footer Text Line Height',
                'desc' => 'Drag the handle to set the desired line height.',
                'type' => 'global-numeric-breakpoint-slider',
                'name_key' => 'line-height',
                'unit_support' => 'line_height',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_footer_typo_settings',
                'option_label' => false,
            ),
            array(
                'id' => 'ut_footer_widgets_arrow_line_height',
                'label' => 'Footers Widgets Arrows Line Height',
                'type' => 'text',
                'desc' => 'Defines the amount of space above and below e.g. 1.6',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_footer_typo_settings',
            ),

            /*
            |--------------------------------------------------------------------------
            | Global Hero Settings
            |--------------------------------------------------------------------------
            */

            // Hero Buttons ut_global_hero_button_settings

            array(
                'id' => 'ut_global_hero_button_headline',
                'label' => 'Global Hero Button Styling',
                'type' => 'panel_headline',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_button_settings',
            ),

            array(
                'id' => 'ut_global_hero_buttons_margin',
                'label' => 'Buttons Spacing Top',
                'desc' => 'Adjust the space between Hero Caption Title and Hero Buttons. <br /> Include "px" in your string. e.g. 30px (default: 0px)',
                'type' => 'text',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_button_settings'
            ),

            array(
                'id' => 'ut_global_main_hrbtn_subheadline',
                'label' => 'Hero Primary Button Settings',
                'type' => 'section_headline',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_button_settings',
            ),

            array(
                'id' => 'ut_global_main_hero_button_hover_shadow',
                'label' => 'Add Shadow on Button Hover?',
                'desc' => 'A decent shadow to add more depth to the button.',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_button_settings',
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
            ),

            array(
                'id' => 'ut_global_main_hero_button_style',
                'label' => 'Primary Button Styling',
                'desc' => 'Use our theme default button or design your own one.',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_button_settings',
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
            ),

            array(
                'id' => 'ut_global_main_hrbtn',
                'label' => 'Primary Button Custom Styling',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_button_settings',
                'markup' => '1_1',
                'type' => 'button_builder',
                'required' => array(
                    'ut_global_main_hero_button_style' => 'custom'
                )
            ),

            array(
                'id' => 'ut_global_second_hrbtn_subheadline',
                'label' => 'Hero Secondary Custom Button',
                'type' => 'section_headline',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_button_settings',
            ),

            array(
                'id' => 'ut_global_second_button_hover_shadow',
                'label' => 'Add Shadow on Button Hover?',
                'desc' => 'A decent shadow to add more depth to the button.',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_button_settings',
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
            ),

            array(
                'id' => 'ut_global_second_button_style',
                'label' => 'Secondary Button Styling',
                'desc' => 'Use our theme default button or design your own one.',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_button_settings',
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
            ),

            array(
                'id' => 'ut_global_second_hrbtn',
                'label' => 'Secondary Button Custom Styling',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_button_settings',
                'markup' => '1_1',
                'type' => 'button_builder',
                'required' => array(
                    'ut_global_second_button_style' => 'custom'
                )
            ),




            /* Hero Scroll Down Arrow */
            array(
                'id' => 'ut_global_scroll_down_arrow_settings_headline',
                'label' => 'Global Hero Scroll Down Arrow',
                'type' => 'section_headline',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_button_settings',
            ),

            array(
                'id' => 'ut_global_scroll_down_arrow',
                'label' => 'Activate Scroll Down Arrow?',
                'desc' => 'A large double lined down arrow. Clicking the arrow automatically scrolls to the main content.',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_button_settings',
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
            ),

            array(
                'id' => 'ut_global_scroll_down_arrow_color',
                'label' => 'Scroll Down Arrow Color',
                'desc' => '<strong>(optional)</strong> - set an alternate Color for <strong>Scroll Down Arrow</strong>.',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_button_settings',
                'type' => 'colorpicker',
            ),

            array(
                'id' => 'ut_global_scroll_down_arrow_position',
                'label' => 'Scroll Down Arrow Horizontal Position',
                'desc' => 'Drag the handle to set your desired horizontal position.',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_button_settings',
                'type' => 'numeric_slider',
                'std' => '50',
            ),

            array(
                'id' => 'ut_global_scroll_down_arrow_position_vertical',
                'label' => 'Scroll Down Arrow Vertical Position',
                'desc' => 'Drag the handle to set your desired vertical position.',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_button_settings',
                'type' => 'numeric_slider',
                'std' => '10',
            ),

            /* Hero Logo */
            array(
                'id' => 'ut_global_hero_logo_settings',
                'label' => 'Hero Custom Logo',
                'type' => 'panel_headline',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_logo_settings',
            ),

            array(
                'id' => 'ut_global_hero_logo_settings_Info',
                'label' => 'Global Hero Logo',
                'desc' => 'Keep in mind that not all Hero Types do support a custom logo.',
                'type' => 'section_headline_info',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_logo_settings',
            ),

            array(
                'id' => 'ut_global_custom_hero_logo',
                'label' => 'Upload Logo',
                'desc' => 'This element appears above the Hero Caption Slogan.',
                'type' => 'upload',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_logo_settings',
            ),

            array(
                'id' => 'ut_global_hero_custom_logo_max_width',
                'label' => 'Logo Max Width',
                'desc' => 'Use an alternate max width. Value in percent.',
                'type' => 'numeric_slider',
                'std' => '100',
                'min_max_step' => '0,100,1',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_logo_settings',
            ),

            array(
                'id' => 'ut_global_hero_custom_logo_max_width_tablet',
                'label' => 'Tablet Logo Max Width',
                'desc' => 'Use an alternate max width. Value in percent.',
                'type' => 'numeric_slider',
                'std' => '100',
                'min_max_step' => '0,100,1',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_logo_settings',
            ),

            array(
                'id' => 'ut_global_hero_custom_logo_max_width_mobile',
                'label' => 'Mobile Logo Max Width',
                'desc' => 'Use an alternate max width. Value in percent.',
                'type' => 'numeric_slider',
                'std' => '100',
                'min_max_step' => '0,100,1',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_logo_settings',
            ),

            array(
                'id' => 'ut_global_hero_custom_logo_margin_bottom',
                'label' => 'Spacing Bottom',
                'desc' => 'Set your desired spacing between custom logo and the element below.',
                'type' => 'numeric_slider',
                'std' => '0',
                'min_max_step' => '0,100,1',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_logo_settings',
            ),

            /* Hero Caption Styling */
            array(
                'id' => 'ut_global_hero_styling_headline',
                'label' => 'Global Hero Caption Styling',
                'type' => 'panel_headline',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_caption_settings',
            ),

            array(
                'id' => 'ut_global_hero_setting_Info',
                'label' => 'Global Hero Caption',
                'desc' => 'These are your global Hero Styling settings for the entire site. However, in order to give you more freedom while individualizing your Brooklyn powered website. You can overwrite these settings by using the "Hero Styling" tab inside the Front Page or Blog Section as well as on single pages or portfolios. Means you can differentiate the visual appearance on different parts of your website. <br /><br /><strong>Attention:</strong> These settings do not affect Content Blocks which have been placed inside the Hero.',
                'type' => 'section_headline_info',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_caption_settings',
            ),

            array(
                'id' => 'ut_global_hero_style',
                'label' => 'Hero Caption Style',
                'desc' => 'Choose between 10 different hero caption styles. If you are using a slider as your desired hero type, you can define an individual style for each slide.',
                'type' => 'select',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_caption_settings',
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
                    )

                ) /* end choices */
            ),

            array(
                'id' => 'ut_global_hero_style_7_border_color',
                'label' => 'Caption Style Seven Border Color',
                'desc' => '<strong>(optional)</strong> - default: same as Title Color',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_caption_settings',
                'required' => array(
                    'ut_global_hero_style' => 'ut-hero-style-7'
                )
            ),
            array(
                'id' => 'ut_global_hero_style_5_border_bottom',
                'label' => 'Activate Border Bottom?',
                'desc' => 'An additional Border Bottom',
                'type' => 'select',
                'std' => 'center',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_caption_settings',
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
                'required' => array(
                    'ut_global_hero_style' => 'ut-hero-style-5',
                )


            ),
            array(
                'id' => 'ut_global_hero_style_5_border_color',
                'label' => 'Caption Style Five Decoration Line Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_caption_settings',
                'required' => array(
                    'ut_global_hero_style' => 'ut-hero-style-5',
                    'ut_global_hero_style_5_border_bottom' => 'on'
                )
            ),
            array(
                'id' => 'ut_global_hero_style_5_border_height',
                'label' => 'Caption Style Five Decoration Line Thickness',
                'desc' => '<strong>(optional)</strong> - value in px , default: 1px',
                'type' => 'text',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_caption_settings',
                'required' => array(
                    'ut_global_hero_style' => 'ut-hero-style-5',
                    'ut_global_hero_style_5_border_bottom' => 'on'
                )
            ),
            array(
                'id' => 'ut_global_hero_style_5_border_width',
                'label' => 'Caption Style Five Decoration Line Width',
                'desc' => '<strong>(optional)</strong> - value in % or px , default: 30px',
                'type' => 'text',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_caption_settings',
                'required' => array(
                    'ut_global_hero_style' => 'ut-hero-style-5',
                    'ut_global_hero_style_5_border_bottom' => 'on'
                )
            ),
            array(
                'id' => 'ut_global_hero_style_5_spacing_top',
                'label' => 'Caption Style Five Decoration Line Spacing Top',
                'desc' => '<strong>(optional)</strong> - value in % or px , default: 15px',
                'type' => 'text',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_caption_settings',
                'required' => array(
                    'ut_global_hero_style' => 'ut-hero-style-5',
                    'ut_global_hero_style_5_border_bottom' => 'on'
                )
            ),
            array(
                'id' => 'ut_global_hero_align',
                'label' => 'Hero Caption Alignment',
                'desc' => 'Specifies the default alignment for the caption inside the hero.',
                'type' => 'select',
                'std' => 'center',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_caption_settings',
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
                'id' => 'ut_global_hero_v_align',
                'label' => 'Hero Caption Vertical Alignment',
                'desc' => 'Specifies the default vertical alignment for the caption inside the hero.',
                'type' => 'select',
                'std' => 'middle',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_caption_settings',
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
                'id' => 'ut_global_hero_v_align_margin_bottom',
                'label' => 'Enter Hero Content Spacing Bottom',
                'desc' => 'Specifies the default bottom space for captions with vertical alignment bottom. Value in pixel e.g. 50px.',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_caption_settings',
                'type' => 'text',
                'required' => array(
                    'ut_global_hero_v_align' => 'bottom'
                )
            ),

            array(
                'id' => 'ut_global_hero_overlay_settings_headline',
                'label' => 'Global Hero Overlay Settings',
                'type' => 'panel_headline',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_overlay_settings',
            ),

            array(
                'id' => 'ut_global_hero_overlay',
                'label' => 'Activate Overlay?',
                'desc' => 'Covers your hero with an optional color and 3 different patterns.',
                'std' => 'on',
                'type' => 'select',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_overlay_settings',
                'choices' => array(
                    array(
                        'value' => 'on',
                        'label' => 'yes, please!',
                    ),
                    array(
                        'value' => 'off',
                        'label' => 'no, thanks!'
                    )
                ) /* end choices */
            ),

            array(
                'id' => 'ut_global_hero_overlay_color',
                'label' => 'Hero Overlay Color',
                'desc' => 'Set your desired overlay color. You can use the handle below to change the color opacity.',
                'type' => 'gradient_colorpicker',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_overlay_settings',
                'required' => array(
                    'ut_global_hero_overlay' => 'on'
                )
            ),

            array(
                'id' => 'ut_global_hero_overlay_color_opacity',
                'label' => 'Hero Overlay Color Opacity',
                'desc' => '<strong>(deprecated)</strong> Only works if Hero Overlay Color is a HEX Color.',
                'type' => 'numeric-slider',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_overlay_settings',
                'min_max_step' => '0,1,0.01',
                'required' => array(
                    'ut_global_hero_overlay' => 'on'
                )
            ),

            array(
                'id' => 'ut_global_hero_overlay_pattern',
                'label' => 'Activate Hero Overlay Pattern?',
                'desc' => 'A repeated decorative overlay pattern.',
                'std' => 'off',
                'type' => 'select',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_overlay_settings',
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
                    'ut_global_hero_overlay' => 'on'
                )
            ),

            array(
                'id' => 'ut_global_hero_overlay_pattern_style',
                'label' => 'Hero Overlay Pattern Style',
                'desc' => '<strong>(optional)</strong>',
                'std' => 'style_one',
                'type' => 'select',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_overlay_settings',
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
                    ),
                    array(
                        'value' => 'custom',
                        'label' => 'Custom Pattern'
                    )
                ),
                'required' => array(
                    'ut_global_hero_overlay' => 'on',
                    'ut_global_hero_overlay_pattern' => 'on'
                )
            ),

            array(
                'id' => 'ut_global_hero_custom_pattern',
                'label' => 'Custom Pattern',
                'desc' => '',
                'type' => 'background',
                'markup' => '1_1',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_overlay_settings',
                'required' => array(
                    'ut_global_hero_overlay' => 'on',
                    'ut_global_hero_overlay_pattern' => 'on',
                    'ut_global_hero_overlay_pattern_style' => 'custom'
                )
            ),

            array(
                'id' => 'ut_global_hero_overlay_effect_settings_headline',
                'label' => 'Global Hero Overlay Effect Settings',
                'desc' => 'Global Hero Overlay Effect Settings',
                'type' => 'section_headline',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_overlay_settings',
            ),

            array(
                'id' => 'ut_global_hero_overlay_effect',
                'label' => 'Activate Overlay Animation Effect?',
                'desc' => '<strong>(optional)</strong> Keep in mind, that this effect uses canvas objects for animation. Old Browsers do not support this feature!',
                'std' => 'off',
                'type' => 'select',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_overlay_settings',
                'choices' => array(
                    array(
                        'value' => 'on',
                        'label' => 'yes, please!'
                    ),
                    array(
                        'value' => 'off',
                        'label' => 'no, thanks!'
                    )
                ) /* end choices */
            ),

            array(
                'id' => 'ut_global_hero_overlay_effect_style',
                'label' => 'Overlay Animation Effect',
                'desc' => 'choose between 2 awesome animation effects!',
                'std' => 'dots',
                'type' => 'select',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_overlay_settings',
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
                    'ut_global_hero_overlay_effect' => 'on'
                )
            ),

            array(
                'id' => 'ut_global_hero_overlay_effect_color',
                'label' => 'Overlay Effect Color',
                'desc' => '<strong>(optional)</strong>. Leave this field empty if you like to keep the theme accentcolor as effect color.',
                'type' => 'colorpicker',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_overlay_settings',
                'required' => array(
                    'ut_global_hero_overlay_effect' => 'on'
                )
            ),

            array(
                'id' => 'ut_global_hero_border_setting_headline',
                'label' => 'Global Hero Border Settings',
                'type' => 'panel_headline',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_border_settings',
            ),

            array(
                'id' => 'ut_global_hero_border_bottom',
                'label' => 'Activate Hero Border Bottom?',
                'desc' => 'Display a custom border at the bottom of hero.',
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
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_border_settings',
            ),

            array(
                'id' => 'ut_global_hero_border_bottom_color',
                'label' => 'Border Bottom Color',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'desc' => '<strong>(optional)</strong>',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_border_settings',
                'required' => array(
                    'ut_global_hero_border_bottom' => 'on'
                )
            ),

            array(
                'id' => 'ut_global_hero_border_bottom_width',
                'label' => 'Border Bottom Width',
                'desc' => 'Drag the handle to set the bottom border width.',
                'type' => 'numeric-slider',
                'min_max_step' => '1,100',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_border_settings',
                'required' => array(
                    'ut_global_hero_border_bottom' => 'on'
                )
            ),

            array(
                'id' => 'ut_global_hero_border_bottom_style',
                'label' => 'Border Bottom Style',
                'desc' => 'Choose from 4 different border styles.',
                'type' => 'select',
                'std' => 'solid',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_border_settings',
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
                'required' => array(
                    'ut_global_hero_border_bottom' => 'on'
                )
            ),

            array(
                'id' => 'ut_global_hero_fancy_border_setting_headline',
                'label' => 'Global Hero Fancy Border Settings',
                'desc' => 'Global Hero Fancy Border',
                'type' => 'section_headline',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_border_settings',
            ),

            array(
                'id' => 'ut_global_hero_fancy_border',
                'label' => 'Activate Fancy Border?',
                'desc' => 'Allows you to create a nice fancy border at the bottom of your hero area.',
                'type' => 'select',
                'std' => 'off',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_border_settings',
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
                'id' => 'ut_global_hero_fancy_border_color',
                'label' => 'Color',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'desc' => '<strong>(optional)</strong>',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_border_settings',
                'required' => array(
                    'ut_global_hero_fancy_border' => 'on'
                )
            ),

            array(
                'id' => 'ut_global_hero_fancy_border_background_color',
                'label' => 'Background Color',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'desc' => '<strong>(optional)</strong>',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_border_settings',
                'required' => array(
                    'ut_global_hero_fancy_border' => 'on'
                )
            ),

            array(
                'id' => 'ut_global_hero_fancy_border_size',
                'label' => 'Size',
                'desc' => '<strong>(optional)</strong> -  include "px" in your string. e.g. 30px (default: 10px)',
                'type' => 'text',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_border_settings',
                'required' => array(
                    'ut_global_hero_fancy_border' => 'on'
                )
            ),


            /*
            |--------------------------------------------------------------------------
            | Global Hero Separator Settings
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_global_hero_separator_settings_headline',
                'label' => 'Hero Separator Settings',
                'type' => 'panel_headline',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_separator_settings',
            ),

            array(
                'id' => 'ut_global_hero_top_separator_settings_headline',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_separator_settings',
                'label' => 'Top Separator Settings',
                'type' => 'section_headline'
            ),

            array(
                'id' => 'ut_global_hero_separator_top',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_separator_settings',
                'label' => 'Add Separator at Top?',
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

            ),

            array(
                'id'    => 'ut_global_hero_separator_svg_top',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_separator_settings',
                'label' => 'Separator Top Style',
                'desc'  => 'Select your favourite separator style.',
                'type' => 'select',
                'std' => 'desing_wave',
                'choices' => ot_recognized_separator_styles(),
                'required' => array(
                    'ut_global_hero_separator_top' => 'on'
                ),
            ),

            array(
                'id'    => 'ut_global_hero_separator_top_flip',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_separator_settings',
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
                'required' => array(
                    'ut_global_hero_separator_top' => 'on'
                ),
            ),


            // Color Settings
            array(
                'id' => 'ut_global_hero_separator_top_colors',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_separator_settings',
                'label' => 'Separator Top Color Settings',
                'type' => 'section_headline',
                'required' => array(
                    'ut_global_hero_separator_top' => 'on',
                ),
            ),

            // top color 1
            array(
                'id'    => 'ut_global_hero_separator_top_color_1',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_separator_settings',
                'label' => 'SVG Color Part 1',
                'desc'  => 'Some Separator Styles can display multiple colors. This is color part 1.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'required' => array(
                    'ut_global_hero_separator_top' => 'on'
                ),
            ),

            array(
                'id'    => 'ut_global_hero_separator_top_color_1_gradient',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_separator_settings',
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
                'required' => array(
                    'ut_global_hero_separator_top' => 'on'
                ),
            ),

            array(
                'id'    => 'ut_global_hero_separator_top_color_1_gradient_color',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_separator_settings',
                'label' => 'SVG Color Part 1 Gradient Color',
                'desc'  => 'This color usually represents the end color of the gradient while "SVG Color Part 1" represents the start color.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'required' => array(
                    'ut_global_hero_separator_top' => 'on',
                    'ut_global_hero_separator_top_color_1_gradient' => 'true'
                ),
            ),

            array(
                'id'    => 'ut_global_hero_separator_top_color_1_gradient_direction',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_separator_settings',
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
                'required' => array(
                    'ut_global_hero_separator_top' => 'on',
                    'ut_global_hero_separator_top_color_1_gradient' => 'true'
                ),
            ),

            // top color 2
            array(
                'id'    => 'ut_global_hero_separator_top_color_2',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_separator_settings',
                'label' => 'SVG Color Part 2',
                'desc'  => 'Some Separator Styles can display multiple colors. This is color part 2.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'required' => array(
                    'ut_global_hero_separator_top' => 'on',
                    'ut_global_hero_separator_svg_top' => 'design_wave|triangle_shadow|snow|slit|abstract_waves|triple_wave_1|triple_wave_2'
                ),
            ),

            array(
                'id'    => 'ut_global_hero_separator_top_color_2_gradient',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_separator_settings',
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
                'required' => array(
                    'ut_global_hero_separator_top' => 'on',
                    'ut_global_hero_separator_svg_top' => 'design_wave|triangle_shadow|snow|slit|abstract_waves|triple_wave_1|triple_wave_2'
                ),
            ),

            array(
                'id'    => 'ut_global_hero_separator_top_color_2_gradient_color',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_separator_settings',
                'label' => 'SVG Color Part 1 Gradient Color',
                'desc'  => 'This color usually represents the end color of the gradient while "SVG Color Part 2" represents the start color.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'required' => array(
                    'ut_global_hero_separator_top' => 'on',
                    'ut_global_hero_separator_top_color_2_gradient' => 'true',
                    'ut_global_hero_separator_svg_top' => 'design_wave|triangle_shadow|snow|slit|abstract_waves|triple_wave_1|triple_wave_2'
                ),
            ),

            array(
                'id'    => 'ut_global_hero_separator_top_color_2_gradient_direction',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_separator_settings',
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
                'required' => array(
                    'ut_global_hero_separator_top' => 'on',
                    'ut_global_hero_separator_top_color_2_gradient' => 'true',
                    'ut_global_hero_separator_svg_top' => 'design_wave|triangle_shadow|snow|slit|abstract_waves|triple_wave_1|triple_wave_2'
                ),
            ),


            // top color 3
            array(
                'id'    => 'ut_global_hero_separator_top_color_3',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_separator_settings',
                'label' => 'SVG Color Part 3',
                'desc'  => 'Some Separator Styles can display multiple colors. This is color part 3.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'required' => array(
                    'ut_global_hero_separator_top' => 'on',
                    'ut_global_hero_separator_svg_top' => 'snow|triple_wave_1|triple_wave_2'
                ),
            ),

            array(
                'id'    => 'ut_global_hero_separator_top_color_3_gradient',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_separator_settings',
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
                'required' => array(
                    'ut_global_hero_separator_top' => 'on',
                    'ut_global_hero_separator_svg_top' => 'snow|triple_wave_1|triple_wave_2'
                ),
            ),

            array(
                'id'    => 'ut_global_hero_separator_top_color_3_gradient_color',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_separator_settings',
                'label' => 'SVG Color Part 1 Gradient Color',
                'desc'  => 'This color usually represents the end color of the gradient while "SVG Color Part 3" represents the start color.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'required' => array(
                    'ut_global_hero_separator_top' => 'on',
                    'ut_global_hero_separator_top_color_3_gradient' => 'true',
                    'ut_global_hero_separator_svg_top' => 'snow|triple_wave_1|triple_wave_2'
                ),
            ),

            array(
                'id'    => 'ut_global_hero_separator_top_color_3_gradient_direction',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_separator_settings',
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
                'required' => array(
                    'ut_global_hero_separator_top' => 'on',
                    'ut_global_hero_separator_top_color_3_gradient' => 'true',
                    'ut_global_hero_separator_svg_top' => 'snow|triple_wave_1|triple_wave_2'
                ),
            ),

            // Dimension Settings
            array(
                'id' => 'ut_global_hero_separator_top_dimension',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_separator_settings',
                'label' => 'Separator Top Dimension Settings',
                'type' => 'section_headline',
                'required' => array(
                    'ut_global_hero_separator_top' => 'on',
                ),
            ),

            array(
                'id' => 'ut_global_hero_separator_top_width',
                'label' => 'Top Separator Width',
                'desc' => 'Use the slider bar to set your desired width in %.',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_separator_settings',
                'type' => 'numeric_slider',
                'std' => '100',
                'min_max_step' => '100,300,1',
                'required' => array(
                    'ut_global_hero_separator_top' => 'on',
                ),
            ),

            array(
                'id' => 'ut_global_hero_separator_top_height',
                'label' => 'Top Separator Height',
                'desc' => 'Use the slider bar to set your desired height. 0 = default height of separator.',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_separator_settings',
                'type' => 'numeric_slider',
                'std' => '0',
                'min_max_step' => '0,100,1',
                'required' => array(
                    'ut_global_hero_separator_top' => 'on',
                    'ut_global_hero_separator_top_height_unit' => 'percent'
                ),
            ),

            array(
                'id' => 'ut_global_hero_separator_top_height_px',
                'label' => 'Top Separator Height',
                'desc' => 'Use the slider bar to set your desired height. 0 = default height of separator.',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_separator_settings',
                'type' => 'numeric_slider',
                'std' => '0',
                'min_max_step' => '0,1440,10',
                'required' => array(
                    'ut_global_hero_separator_top' => 'on',
                    'ut_global_hero_separator_top_height_unit' => 'px'
                ),
            ),

            array(
                'id'    => 'ut_global_hero_separator_top_height_unit',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_separator_settings',
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
                'required' => array(
                    'ut_global_hero_separator_top' => 'on',
                ),
            ),

            // Responsive Settings
            array(
                'id' => 'ut_global_hero_separator_top_responsive',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_separator_settings',
                'label' => 'Separator Top Responsive Settings',
                'type' => 'section_headline',
                'required' => array(
                    'ut_global_hero_separator_top' => 'on',
                ),
            ),

            // tablet dimensions
            array(
                'id'    => 'ut_global_hero_separator_top_hide_on_tablet',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_separator_settings',
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
                'required' => array(
                    'ut_global_hero_separator_top' => 'on',
                ),
            ),

            array(
                'id' => 'ut_global_hero_separator_top_width_tablet',
                'label' => 'Top Separator Width on Tablets',
                'desc' => 'Use the slider bar to set your desired width in %.',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_separator_settings',
                'type' => 'numeric_slider',
                'std' => '100',
                'min_max_step' => '100,300,1',
                'required' => array(
                    'ut_global_hero_separator_top' => 'on',
                    'ut_global_hero_separator_top_hide_on_tablet' => 'false',
                ),
            ),

            array(
                'id' => 'ut_global_hero_separator_top_height_tablet',
                'label' => 'Top Separator Height on Tablets',
                'desc' => 'Use the slider bar to set your desired height. 0 = default height of separator.',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_separator_settings',
                'type' => 'numeric_slider',
                'std' => '0',
                'min_max_step' => '0,100,1',
                'required' => array(
                    'ut_global_hero_separator_top' => 'on',
                    'ut_global_hero_separator_top_hide_on_tablet' => 'false',
                    'ut_global_hero_separator_top_height_tablet_unit' => 'percent'
                ),
            ),

            array(
                'id' => 'ut_global_hero_separator_top_height_tablet_px',
                'label' => 'Top Separator Height on Tablets',
                'desc' => 'Use the slider bar to set your desired height. 0 = default height of separator.',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_separator_settings',
                'type' => 'numeric_slider',
                'std' => '0',
                'min_max_step' => '0,1280,10',
                'required' => array(
                    'ut_global_hero_separator_top' => 'on',
                    'ut_global_hero_separator_top_hide_on_tablet' => 'false',
                    'ut_global_hero_separator_top_height_tablet_unit' => 'px'
                ),
            ),

            array(
                'id'    => 'ut_global_hero_separator_top_height_tablet_unit',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_separator_settings',
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
                'required' => array(
                    'ut_global_hero_separator_top' => 'on',
                    'ut_global_hero_separator_top_hide_on_tablet' => 'false',
                ),
            ),

            // mobile dimensions
            array(
                'id'    => 'ut_global_hero_separator_top_hide_on_mobile',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_separator_settings',
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
                'required' => array(
                    'ut_global_hero_separator_top' => 'on',
                ),
            ),

            array(
                'id' => 'ut_global_hero_separator_top_width_mobile',
                'label' => 'Top Separator Width on Mobiles',
                'desc' => 'Use the slider bar to set your desired width in %.',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_separator_settings',
                'type' => 'numeric_slider',
                'std' => '100',
                'min_max_step' => '100,300,1',
                'required' => array(
                    'ut_global_hero_separator_top' => 'on',
                    'ut_global_hero_separator_top_hide_on_mobile' => 'false',
                ),
            ),

            array(
                'id' => 'ut_global_hero_separator_top_height_mobile',
                'label' => 'Top Separator Height on Mobiles',
                'desc' => 'Use the slider bar to set your desired height. 0 = default height of separator.',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_separator_settings',
                'type' => 'numeric_slider',
                'std' => '0',
                'min_max_step' => '0,100,1',
                'required' => array(
                    'ut_global_hero_separator_top' => 'on',
                    'ut_global_hero_separator_top_hide_on_mobile' => 'false',
                    'ut_global_hero_separator_top_height_mobile_unit' => 'percent'
                ),
            ),

            array(
                'id' => 'ut_global_hero_separator_top_height_mobile_px',
                'label' => 'Top Separator Height on Mobiles',
                'desc' => 'Use the slider bar to set your desired height. 0 = default height of separator.',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_separator_settings',
                'type' => 'numeric_slider',
                'std' => '0',
                'min_max_step' => '0,1280,10',
                'required' => array(
                    'ut_global_hero_separator_top' => 'on',
                    'ut_global_hero_separator_top_hide_on_mobile' => 'false',
                    'ut_global_hero_separator_top_height_mobile_unit' => 'px'
                ),
            ),

            array(
                'id'    => 'ut_global_hero_separator_top_height_mobile_unit',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_separator_settings',
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
                'required' => array(
                    'ut_global_hero_separator_top' => 'on',
                    'ut_global_hero_separator_top_hide_on_mobile' => 'false',
                ),
            ),

            // Bottom Separator
            array(
                'id' => 'ut_global_hero_separator_bottom_settings_headline',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_separator_settings',
                'label' => 'Bottom Separator Settings',
                'type' => 'section_headline'
            ),

            array(
                'id' => 'ut_global_hero_separator_bottom',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_separator_settings',
                'label' => 'Add Separator at Bottom?',
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

            ),

            array(
                'id'    => 'ut_global_hero_separator_svg_bottom',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_separator_settings',
                'label' => 'Separator Bottom Style',
                'desc'  => 'Select your favourite separator style.',
                'type' => 'select',
                'std' => 'desing_wave',
                'choices' => ot_recognized_separator_styles(),
                'required' => array(
                    'ut_global_hero_separator_bottom' => 'on'
                ),
            ),

            array(
                'id'    => 'ut_global_hero_separator_bottom_flip',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_separator_settings',
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
                'required' => array(
                    'ut_global_hero_separator_bottom' => 'on'
                ),
            ),


            // Color Settings
            array(
                'id' => 'ut_global_hero_separator_bottom_colors',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_separator_settings',
                'label' => 'Separator Bottom Color Settings',
                'type' => 'section_headline',
                'required' => array(
                    'ut_global_hero_separator_bottom' => 'on',
                ),
            ),

            // top color 1
            array(
                'id'    => 'ut_global_hero_separator_bottom_color_1',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_separator_settings',
                'label' => 'SVG Color Part 1',
                'desc'  => 'Some Separator Styles can display multiple colors. This is color part 1.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'required' => array(
                    'ut_global_hero_separator_bottom' => 'on'
                ),
            ),

            array(
                'id'    => 'ut_global_hero_separator_bottom_color_1_gradient',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_separator_settings',
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
                'required' => array(
                    'ut_global_hero_separator_bottom' => 'on'
                ),
            ),

            array(
                'id'    => 'ut_global_hero_separator_bottom_color_1_gradient_color',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_separator_settings',
                'label' => 'SVG Color Part 1 Gradient Color',
                'desc'  => 'This color usually represents the end color of the gradient while "SVG Color Part 1" represents the start color.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'required' => array(
                    'ut_global_hero_separator_bottom' => 'on',
                    'ut_global_hero_separator_bottom_color_1_gradient' => 'true'
                ),
            ),

            array(
                'id'    => 'ut_global_hero_separator_bottom_color_1_gradient_direction',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_separator_settings',
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
                'required' => array(
                    'ut_global_hero_separator_bottom' => 'on',
                    'ut_global_hero_separator_bottom_color_1_gradient' => 'true'
                ),
            ),

            // top color 2
            array(
                'id'    => 'ut_global_hero_separator_bottom_color_2',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_separator_settings',
                'label' => 'SVG Color Part 2',
                'desc'  => 'Some Separator Styles can display multiple colors. This is color part 2.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'required' => array(
                    'ut_global_hero_separator_bottom' => 'on',
                    'ut_global_hero_separator_svg_bottom' => 'design_wave|triangle_shadow|snow|slit|abstract_waves|triple_wave_1|triple_wave_2'
                ),
            ),

            array(
                'id'    => 'ut_global_hero_separator_bottom_color_2_gradient',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_separator_settings',
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
                'required' => array(
                    'ut_global_hero_separator_bottom' => 'on',
                    'ut_global_hero_separator_svg_bottom' => 'design_wave|triangle_shadow|snow|slit|abstract_waves|triple_wave_1|triple_wave_2'
                ),
            ),

            array(
                'id'    => 'ut_global_hero_separator_bottom_color_2_gradient_color',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_separator_settings',
                'label' => 'SVG Color Part 1 Gradient Color',
                'desc'  => 'This color usually represents the end color of the gradient while "SVG Color Part 2" represents the start color.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'required' => array(
                    'ut_global_hero_separator_bottom' => 'on',
                    'ut_global_hero_separator_bottom_color_2_gradient' => 'true',
                    'ut_global_hero_separator_svg_bottom' => 'design_wave|triangle_shadow|snow|slit|abstract_waves|triple_wave_1|triple_wave_2'
                ),
            ),

            array(
                'id'    => 'ut_global_hero_separator_bottom_color_2_gradient_direction',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_separator_settings',
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
                'required' => array(
                    'ut_global_hero_separator_bottom' => 'on',
                    'ut_global_hero_separator_bottom_color_2_gradient' => 'true',
                    'ut_global_hero_separator_svg_bottom' => 'design_wave|triangle_shadow|snow|slit|abstract_waves|triple_wave_1|triple_wave_2'
                ),
            ),


            // top color 3
            array(
                'id'    => 'ut_global_hero_separator_bottom_color_3',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_separator_settings',
                'label' => 'SVG Color Part 3',
                'desc'  => 'Some Separator Styles can display multiple colors. This is color part 3.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'required' => array(
                    'ut_global_hero_separator_bottom' => 'on',
                    'ut_global_hero_separator_svg_bottom' => 'snow|triple_wave_1|triple_wave_2'
                ),
            ),

            array(
                'id'    => 'ut_global_hero_separator_bottom_color_3_gradient',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_separator_settings',
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
                'required' => array(
                    'ut_global_hero_separator_bottom' => 'on',
                    'ut_global_hero_separator_svg_bottom' => 'snow|triple_wave_1|triple_wave_2'
                ),
            ),

            array(
                'id'    => 'ut_global_hero_separator_bottom_color_3_gradient_color',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_separator_settings',
                'label' => 'SVG Color Part 1 Gradient Color',
                'desc'  => 'This color usually represents the end color of the gradient while "SVG Color Part 3" represents the start color.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'required' => array(
                    'ut_global_hero_separator_bottom' => 'on',
                    'ut_global_hero_separator_bottom_color_3_gradient' => 'true',
                    'ut_global_hero_separator_svg_bottom' => 'snow|triple_wave_1|triple_wave_2'
                ),
            ),

            array(
                'id'    => 'ut_global_hero_separator_bottom_color_3_gradient_direction',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_separator_settings',
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
                'required' => array(
                    'ut_global_hero_separator_bottom' => 'on',
                    'ut_global_hero_separator_bottom_color_3_gradient' => 'true',
                    'ut_global_hero_separator_svg_bottom' => 'snow|triple_wave_1|triple_wave_2'
                ),
            ),

            // Dimension Settings
            array(
                'id' => 'ut_global_hero_separator_bottom_dimension',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_separator_settings',
                'label' => 'Separator Bottom Dimension Settings',
                'type' => 'section_headline',
                'required' => array(
                    'ut_global_hero_separator_bottom' => 'on',
                ),
            ),

            array(
                'id' => 'ut_global_hero_separator_bottom_width',
                'label' => 'Bottom Separator Width',
                'desc' => 'Use the slider bar to set your desired width in %.',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_separator_settings',
                'type' => 'numeric_slider',
                'std' => '100',
                'min_max_step' => '100,300,1',
                'required' => array(
                    'ut_global_hero_separator_bottom' => 'on',
                ),
            ),

            array(
                'id' => 'ut_global_hero_separator_bottom_height',
                'label' => 'Bottom Separator Height',
                'desc' => 'Use the slider bar to set your desired height. 0 = default height of separator.',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_separator_settings',
                'type' => 'numeric_slider',
                'std' => '0',
                'min_max_step' => '0,100,1',
                'required' => array(
                    'ut_global_hero_separator_bottom' => 'on',
                    'ut_global_hero_separator_bottom_height_unit' => 'percent'
                ),
            ),

            array(
                'id' => 'ut_global_hero_separator_bottom_height_px',
                'label' => 'Bottom Separator Height',
                'desc' => 'Use the slider bar to set your desired height. 0 = default height of separator.',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_separator_settings',
                'type' => 'numeric_slider',
                'std' => '0',
                'min_max_step' => '0,1440,10',
                'required' => array(
                    'ut_global_hero_separator_bottom' => 'on',
                    'ut_global_hero_separator_bottom_height_unit' => 'px'
                ),
            ),

            array(
                'id'    => 'ut_global_hero_separator_bottom_height_unit',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_separator_settings',
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
                'required' => array(
                    'ut_global_hero_separator_bottom' => 'on',
                ),
            ),

            // Responsive Settings
            array(
                'id' => 'ut_global_hero_separator_bottom_responsive',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_separator_settings',
                'label' => 'Separator Bottom Responsive Settings',
                'type' => 'section_headline',
                'required' => array(
                    'ut_global_hero_separator_bottom' => 'on',
                ),
            ),

            // tablet dimensions
            array(
                'id'    => 'ut_global_hero_separator_bottom_hide_on_tablet',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_separator_settings',
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
                'required' => array(
                    'ut_global_hero_separator_bottom' => 'on',
                ),
            ),

            array(
                'id' => 'ut_global_hero_separator_bottom_width_tablet',
                'label' => 'Bottom Separator Width on Tablets',
                'desc' => 'Use the slider bar to set your desired width in %.',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_separator_settings',
                'type' => 'numeric_slider',
                'std' => '100',
                'min_max_step' => '100,300,1',
                'required' => array(
                    'ut_global_hero_separator_bottom' => 'on',
                    'ut_global_hero_separator_bottom_hide_on_tablet' => 'false',
                ),
            ),

            array(
                'id' => 'ut_global_hero_separator_bottom_height_tablet',
                'label' => 'Bottom Separator Height on Tablets',
                'desc' => 'Use the slider bar to set your desired height. 0 = default height of separator.',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_separator_settings',
                'type' => 'numeric_slider',
                'std' => '0',
                'min_max_step' => '0,100,1',
                'required' => array(
                    'ut_global_hero_separator_bottom' => 'on',
                    'ut_global_hero_separator_bottom_hide_on_tablet' => 'false',
                    'ut_global_hero_separator_bottom_height_tablet_unit' => 'percent'
                ),
            ),

            array(
                'id' => 'ut_global_hero_separator_bottom_height_tablet_px',
                'label' => 'Bottom Separator Height on Tablets',
                'desc' => 'Use the slider bar to set your desired height. 0 = default height of separator.',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_separator_settings',
                'type' => 'numeric_slider',
                'std' => '0',
                'min_max_step' => '0,1280,10',
                'required' => array(
                    'ut_global_hero_separator_bottom' => 'on',
                    'ut_global_hero_separator_bottom_hide_on_tablet' => 'false',
                    'ut_global_hero_separator_bottom_height_tablet_unit' => 'px'
                ),
            ),

            array(
                'id'    => 'ut_global_hero_separator_bottom_height_tablet_unit',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_separator_settings',
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
                'required' => array(
                    'ut_global_hero_separator_bottom' => 'on',
                    'ut_global_hero_separator_bottom_hide_on_tablet' => 'false',
                ),
            ),

            // mobile dimensions
            array(
                'id'    => 'ut_global_hero_separator_bottom_hide_on_mobile',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_separator_settings',
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
                'required' => array(
                    'ut_global_hero_separator_bottom' => 'on',
                ),
            ),

            array(
                'id' => 'ut_global_hero_separator_bottom_width_mobile',
                'label' => 'Bottom Separator Width on Mobiles',
                'desc' => 'Use the slider bar to set your desired width in %.',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_separator_settings',
                'type' => 'numeric_slider',
                'std' => '100',
                'min_max_step' => '100,300,1',
                'required' => array(
                    'ut_global_hero_separator_bottom' => 'on',
                    'ut_global_hero_separator_bottom_hide_on_mobile' => 'false',
                ),
            ),

            array(
                'id' => 'ut_global_hero_separator_bottom_height_mobile',
                'label' => 'Bottom Separator Height on Mobiles',
                'desc' => 'Use the slider bar to set your desired height. 0 = default height of separator.',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_separator_settings',
                'type' => 'numeric_slider',
                'std' => '0',
                'min_max_step' => '0,100,1',
                'required' => array(
                    'ut_global_hero_separator_bottom' => 'on',
                    'ut_global_hero_separator_bottom_hide_on_mobile' => 'false',
                    'ut_global_hero_separator_bottom_height_mobile_unit' => 'percent'
                ),
            ),

            array(
                'id' => 'ut_global_hero_separator_bottom_height_mobile_px',
                'label' => 'Bottom Separator Height on Mobiles',
                'desc' => 'Use the slider bar to set your desired height. 0 = default height of separator.',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_separator_settings',
                'type' => 'numeric_slider',
                'std' => '0',
                'min_max_step' => '0,1280,10',
                'required' => array(
                    'ut_global_hero_separator_bottom' => 'on',
                    'ut_global_hero_separator_bottom_hide_on_mobile' => 'false',
                    'ut_global_hero_separator_bottom_height_mobile_unit' => 'px'
                ),
            ),

            array(
                'id'    => 'ut_global_hero_separator_bottom_height_mobile_unit',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_separator_settings',
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
                'required' => array(
                    'ut_global_hero_separator_bottom' => 'on',
                    'ut_global_hero_separator_bottom_hide_on_mobile' => 'false',
                ),
            ),

            /*
            |--------------------------------------------------------------------------
            | Global Hero Content Settings
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_global_hero_expertise_slogan_settings_headline',
                'label' => 'Caption Slogan',
                'type' => 'section_headline',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_caption_settings',
            ),

            array(
                'id' => 'ut_global_caption_slogan_color',
                'label' => 'Color',
                'desc' => '<strong>(optional)</strong> - set an alternate color for <strong>Hero Caption Slogan</strong>.',
                'type' => 'gradient_colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_caption_settings',
            ),
            array(
                'id' => 'ut_global_caption_slogan_glow',
                'label' => 'Add Glow Effect',
                'desc' => 'Activate Glow Effect for <strong>Hero Caption Slogan</strong>? Does not work if title color is a gradient color.',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_caption_settings',
                'type' => 'select',
                'std' => 'off',
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
            ),
            array(
                'id' => 'ut_global_caption_slogan_glow_color',
                'label' => 'Glow Color',
                'desc' => 'Select desired glow color.',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_caption_settings',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'required' => array(
                    'ut_global_caption_slogan_glow' => 'on'
                )
            ),
            array(
                'id' => 'ut_global_caption_slogan_glow_shadow_color',
                'label' => 'Glow Text Shadow Color',
                'desc' => 'Select desired glow color.',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_caption_settings',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'required' => array(
                    'ut_global_caption_slogan_glow' => 'on'
                )
            ),
            array(
                'id' => 'ut_global_caption_slogan_background_color',
                'label' => 'Background Color',
                'desc' => '<strong>(optional)</strong> - set an alternate background color for <strong>Hero Caption Slogan</strong>. Not available for Hero Title Style 3.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_caption_settings',
            ),

            array(
                'id' => 'ut_global_caption_slogan_border_color',
                'label' => 'Border Color',
                'desc' => '<strong>(optional)</strong> - set an alternate border color for <strong>Hero Caption Slogan</strong>. Only available for Hero Title Style 5.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_caption_settings',
            ),

            array(
                'id' => 'ut_global_caption_slogan_margin',
                'label' => 'Spacing Bottom',
                'desc' => '<strong>(optional)</strong> -  include "px" in your string. e.g. 30px (default: 0px)',
                'type' => 'text',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_caption_settings',
            ),

            array(
                'id' => 'ut_global_caption_title_settings_headline',
                'label' => 'Caption Title',
                'type' => 'section_headline',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_caption_settings',
            ),

            array(
                'id' => 'ut_global_caption_title_color',
                'label' => 'Title Color',
                'desc' => '<strong>(optional)</strong> - set an alternate color for <strong>Hero Caption Title</strong>.',
                'type' => 'gradient_colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_caption_settings',
            ),
            array(
                'id' => 'ut_global_caption_title_distortion',
                'label' => 'Add Text Distortion?',
                'desc' => 'Activates Glitch Text Distortion Effect for Section Headlines.',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_caption_settings',
                'type' => 'select',
                'std' => 'off',
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
            ),
            array(
                'id' => 'ut_global_caption_title_distortion_style',
                'label' => 'Text Distortion Style?',
                'desc' => 'Select desired text distortion style.',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_caption_settings',
                'type' => 'select',
                'std' => 'style-1',
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
                    'ut_global_caption_title_distortion' => 'on'
                )
            ),
            array(
                'id' => 'ut_global_caption_title_glitch',
                'label' => 'Add Glitch Effect',
                'desc' => 'Activate Glitch Effect for <strong>Hero Caption Title</strong>?',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_caption_settings',
                'type' => 'select',
                'std' => 'off',
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
            ),
            array(
                'id' => 'ut_global_caption_title_glitch_style',
                'label' => 'Select Glitch Style',
                'desc' => '<strong>(optional)</strong>',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_caption_settings',
                'type' => 'select',
                'std' => 'ut-glitch-2',
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
                    'ut_global_caption_title_glitch' => 'on'
                )
            ),
            array(
                'id' => 'ut_global_caption_title_glitch_accent_1',
                'label' => 'Glitch Color Part 1',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_caption_settings',
                'required' => array(
                    'ut_global_caption_title_glitch' => 'on',
                )
            ),
            array(
                'id' => 'ut_global_caption_title_glitch_accent_2',
                'label' => 'Glitch Color Part 2',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_caption_settings',
                'required' => array(
                    'ut_global_caption_title_glitch' => 'on',
                )
            ),
            array(
                'id' => 'ut_global_caption_title_stroke_effect',
                'label' => 'Add Stroke Effect',
                'desc' => '<strong>(optional)</strong>',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_caption_settings',
                'type' => 'select',
                'std' => 'off',
                'choices' => array(
                    array(
                        'value' => 'on',
                        'label' => 'yes please!'
                    ),
                    array(
                        'value' => 'off',
                        'label' => 'no thanks!'
                    ),
                )
            ),
            array(
                'id' => 'ut_global_caption_title_stroke_color',
                'label' => 'Stroke Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_caption_settings',
                'required' => array(
                    'ut_global_caption_title_stroke_effect' => 'on'
                )
            ),
            array(
                'id' => 'ut_global_caption_title_stroke_width',
                'label' => 'Stroke Width',
                'desc' => 'Drag the handle to set the stroke width. Default: 1.',
                'std' => '1',
                'type' => 'numeric-slider',
                'min_max_step' => '1,3,1',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_caption_settings',
                'required' => array(
                    'ut_global_caption_title_stroke_effect' => 'on'
                )
            ),
            array(
                'id' => 'ut_global_caption_title_glow',
                'label' => 'Add Glow Effect',
                'desc' => 'Activate Glow Effect for <strong>Hero Caption Title</strong>? Does not work if title color is a gradient color.',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_caption_settings',
                'type' => 'select',
                'std' => 'off',
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
            ),
            array(
                'id' => 'ut_global_caption_title_glow_color',
                'label' => 'Glow Color',
                'desc' => 'Select desired glow color.',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_caption_settings',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'required' => array(
                    'ut_global_caption_title_glow' => 'on'
                )
            ),
            array(
                'id' => 'ut_global_caption_title_glow_shadow_color',
                'label' => 'Glow Text Shadow Color',
                'desc' => 'Select desired glow color.',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_caption_settings',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'required' => array(
                    'ut_global_caption_title_glow' => 'on'
                )
            ),
            array(
                'id' => 'ut_global_hero_caption_description_settings_headline',
                'label' => 'Caption Description',
                'type' => 'section_headline',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_caption_settings',
            ),

            array(
                'id' => 'ut_global_hero_catchphrase_color',
                'label' => 'Color',
                'desc' => '<strong>(optional)</strong>- set an alternate color for <strong>Hero Caption Description</strong>.',
                'type' => 'gradient_colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_caption_settings',
            ),

            array(
                'id' => 'ut_global_caption_description_glow',
                'label' => 'Add Glow Effect',
                'desc' => 'Activate Glow Effect for <strong>Hero Caption Description</strong>? Does not work if title color is a gradient color.',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_caption_settings',
                'type' => 'select',
                'std' => 'off',
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
            ),
            array(
                'id' => 'ut_global_caption_description_glow_color',
                'label' => 'Glow Color',
                'desc' => 'Select desired glow color.',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_caption_settings',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'required' => array(
                    'ut_global_caption_description_glow' => 'on'
                )
            ),
            array(
                'id' => 'ut_global_caption_description_glow_shadow_color',
                'label' => 'Glow Text Shadow Color',
                'desc' => 'Select desired glow color.',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_caption_settings',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'required' => array(
                    'ut_global_caption_description_glow' => 'on'
                )
            ),
            array(
                'id' => 'ut_global_caption_description_margin',
                'label' => 'Spacing Top',
                'desc' => '<strong>(optional)</strong> -  include "px" in your string. e.g. 10px (default: 10px)',
                'type' => 'text',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_caption_settings',

            ),

            /*
            |--------------------------------------------------------------------------
            | Global Hero Settings
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_global_hero_type_headline',
                'label' => 'Global Hero Settings',
                'type' => 'panel_headline',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_type_settings',
            ),

            array(
                'id' => 'ut_global_hero_background_color',
                'label' => 'Background Color',
                'desc' => '<strong>(required)</strong> This color cannot be empty and is required to assist the hero fadeIn animation. I can be overwritten per page.',
                'type' => 'colorpicker',
                'std' => '#141618',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_type_settings',
            ),

            array(
                'id' => 'ut_global_hero_height',
                'label' => 'Height',
                'desc' => 'Use the slider bar to set your desired height in %.',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_type_settings',
                'type' => 'numeric-slider',
                'std' => '100',
                'min_max_step' => '0,100,1',
            ),

            array(
                'id' => 'ut_global_hero_width',
                'label' => 'Content Width',
                'desc' => 'Decide if the hero content gets stretched to fullwidth or displays centered.',
                'type' => 'select',
                'std' => 'center',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_type_settings',
                'choices' => array(
                    array(
                        'value' => 'centered',
                        'label' => 'Grid Based'
                    ),
                    array(
                        'value' => 'fullwidth',
                        'label' => 'Fullwidth'
                    ),
                ) /* end choices */
            ),

            /*array(
                'id' => 'ut_global_hero_type',
                'label' => 'Global Hero Type',
                'desc' => 'Set your global hero type.',
                'type' => 'select',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_type_settings',
                'choices' => array(
                    array(
                        'value' => 'image',
                        'label' => 'Hero Image',
                    ),
                    array(
                        'value' => 'splithero',
                        'label' => 'Hero Highlighted (formerly Split Hero)'
                    ),

                    array(
                        'value' => 'video',
                        'label' => 'Hero Video',
                    ),

                    array(
                        'value' => 'transition',
                        'label' => 'Hero Fancy Slider'
                    ),

                    array(
                        'value' => 'slider',
                        'label' => 'Hero Slider (will be updated)',
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
                        'label' => 'Hero Animated Image (will be updated)'
                    ),

                ),

            ), */

            array(
                'id' => 'ut_global_hero_image_animation_headline',
                'label' => 'Global Hero Animation Settings',
                'type' => 'section_headline',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_type_settings',
            ),

            array(
                'id' => 'ut_global_hero_image_animation_effect',
                'metapanel' => 'ut-hero-type',
                'label' => 'Background Animation Effect',
                'desc' => 'A bunch of cool hero image animations effects!',
                'type' => 'select',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_type_settings',
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

            ),

            array(
                'id' => 'ut_global_hero_image_animation_effect_timer',
                'metapanel' => 'ut-hero-type',
                'label' => 'Background Animation Duration',
                'desc' => 'Set your desired animation duration in seconds.',
                'type' => 'numeric_slider',
                'min_max_step' => '1,20,1',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_type_settings',
                'required' => array(
                    'ut_global_hero_image_animation_effect' => 'heroFadeInDown|heroFadeInUp|heroFadeInRight|heroFadeInLeft|heroFadeIn|heroSlideInDown|heroSlideInUp|heroSlideInRight|heroSlideInLeft'
                )
            ),

            array(
                'id' => 'ut_global_hero_image_animation_effect_kenburns_timer',
                'metapanel' => 'ut-hero-type',
                'label' => 'Background Animation Duration',
                'desc' => 'Set your desired animation duration in seconds.',
                'type' => 'numeric_slider',
                'std' => '150',
                'min_max_step' => '1,300,1',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_type_settings',
                'required' => array(
                    'ut_global_hero_image_animation_effect' => 'heroKenBurns'
                )
            ),

            array(
                'id' => 'ut_global_hero_image_animation_effect_easing',
                'metapanel' => 'ut-hero-type',
                'label' => 'Background Animation Easing',
                'desc' => sprintf( 'Set your desired animation easing. You can find easing examples on the following website: %s', '<a target="_blank" href="https://matthewlein.com/tools/ceaser">Easing Effects</a>'),
                'type' => 'css_easing',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_type_settings',
            ),

            array(
                'id' => 'ut_global_hero_caption_animation_type',
                'metapanel' => 'ut-hero-type',
                'label' => 'Caption Animation Type',
                'desc' => 'Animate Caption elements one by one or as a group? A splitted Group separates the caption into 2 parts and animates them against each other. Only Brooklyn Effects do support splitted groups.',
                'type' => 'select',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_type_settings',
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
            ),

            array(
                'id' => 'ut_global_hero_caption_animation_effect',
                'metapanel' => 'ut-hero-type',
                'label' => 'Caption Animation Effect',
                'desc' => 'Intro Effect for Caption Slogan and Title',
                'type' => 'animation_in',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_type_settings',
                'required' => array(
                    'ut_global_hero_caption_animation_type' => 'group|single'
                )
            ),

            array(
                'id' => 'ut_global_hero_caption_animation_effect_split',
                'metapanel' => 'ut-hero-type',
                'label' => 'Caption Animation Effect',
                'desc' => 'Intro Effect for Caption Slogan and Title',
                'type' => 'animation_in',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_type_settings',
                'required' => array(
                    'ut_global_hero_caption_animation_type' => 'group_split'
                )
            ),
            array(
                'id' => 'ut_global_hero_caption_animation_effect_timer',
                'metapanel' => 'ut-hero-type',
                'label' => 'Caption Animation Duration',
                'desc' => 'Set your desired animation duration milliseconds.',
                'type' => 'numeric_slider',
                'std' => '1000',
                'min_max_step' => '100,20000,100',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_type_settings',
            ),
            array(
                'id' => 'ut_global_hero_caption_animation_effect_easing',
                'metapanel' => 'ut-hero-type',
                'label' => 'Caption Animation Easing',
                'desc' => sprintf( 'Set your desired animation easing. You can find easing examples on the following website: %s', '<a target="_blank" href="https://matthewlein.com/tools/ceaser">Easing Effects</a>'),
                'type' => 'css_easing',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_type_settings',
            ),
            array(
                'id' => 'ut_global_hero_image_effects_headline',
                'label' => 'Global Hero Effect Settings',
                'type' => 'section_headline',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_type_settings',
            ),
            array(
                'id' => 'ut_global_hero_image_scroll_zoom',
                'label' => 'Zoom Hero on Scroll',
                'desc' => 'When user scrolls down the Hero zooms in. Only available for Hero with single images.',
                'type' => 'select',
                'std' => 'off',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_type_settings',
                'choices' => array(
                    array(
                        'value' => 'off',
                        'label' => 'no, thanks!'
                    ),
                    array(
                        'value' => 'on',
                        'label' => 'yes, please!'
                    ),
                )
            ),
            array(
                'id' => 'ut_global_hero_glitch',
                'label' => 'Activate Glitch Effect',
                'type' => 'select',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_type_settings',
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
            ),
            array(
                'id' => 'ut_global_hero_glitch_effect',
                'label' => 'Glitch Effect',
                'type' => 'select',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_type_settings',
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
                    'ut_global_hero_glitch' => 'on'
                ),
            ),
            array(
                'id' => 'ut_global_hero_glitch_effect_accent_1',
                'label' => 'Glitch Effect Accent Color (1)',
                'desc' => 'Some glitch effects do support one or more colored layers. Leave empty to apply the default color.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_type_settings',
                'required' => array(
                    'ut_global_hero_glitch' => 'on',
                    'ut_global_hero_glitch_effect' => 'ethereal|haunted|equal|gifted|past|ground|wide',
                ),
            ),
            array(
                'id' => 'ut_global_hero_glitch_effect_accent_2',
                'label' => 'Glitch Effect Accent Color (2)',
                'desc' => 'Some glitch effects do support one or more colored layers. Leave empty to apply the default color.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_type_settings',
                'required' => array(
                    'ut_global_hero_glitch' => 'on',
                    'ut_global_hero_glitch_effect' => 'ethereal|equal|past|ground',
                ),
            ),
            array(
                'id' => 'ut_global_hero_glitch_effect_accent_3',
                'label' => 'Glitch Effect Accent Color (3)',
                'desc' => 'Some glitch effects do support one or more colored layers. Leave empty to apply the default color.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_type_settings',
                'required' => array(
                    'ut_global_hero_glitch' => 'on',
                    'ut_global_hero_glitch_effect' => 'past',
                ),
            ),

            /*
            |--------------------------------------------------------------------------
            | Global Hero Image
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_global_hero_image_headline',
                'label' => 'Global Hero Image Settings',
                'type' => 'section_headline',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_type_settings',
            ),

            array(
                'id' => 'ut_global_hero_image',
                'label' => 'Default Global Hero Image',
                'desc' => 'For best image results, we recommend to upload an image with size of 1920x1080pixel (optimal size). Also try to avoid uploading images with more than 200-300Kb size. We recommend using <a href="https://goo.gl/Sj149K" target="_blank">Kraken.io</a> services for images optimization.',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_type_settings',
                'type' => 'background',
                'markup' => '1_1',

            ),

            array(
                'id' => 'ut_global_hero_image_tablet',
                'label' => 'Default Global Hero Image (Tablet)',
                'desc' => 'Recommended size 1280x1280. We recommend using <a href="https://goo.gl/Sj149K" target="_blank">Kraken.io</a> services for image optimization.',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_type_settings',
                'type' => 'background',
                'markup' => '1_1',

            ),

            array(
                'id' => 'ut_global_hero_image_mobile',
                'label' => 'Default Global Hero Image (Mobile)',
                'desc' => 'Recommended size 720x1280. We recommend using <a href="https://goo.gl/Sj149K" target="_blank">Kraken.io</a> services for image optimization.',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_type_settings',
                'type' => 'background',
                'markup' => '1_1',

            ),

            /*
            |--------------------------------------------------------------------------
            | Global Hero Archive
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_archive_setting_headline',
                'label' => 'Archive Hero Settings',
                'type' => 'panel_headline',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_system_page_archive_settings',
            ),

	        array(
		        'id' => 'ut_author_archive_hide_avatar',
		        'label' => 'Hide Author Avatar',
		        'desc' => 'Hide the author avatar on author archives?',
		        'type' => 'select',
		        'section' => 'ut_global_hero_settings',
		        'subsection' => 'ut_system_page_archive_settings',
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

		        )

	        ),

            array(
                'id' => 'ut_archive_hero_height',
                'label' => 'Height',
                'desc' => 'Drag the handle to set the hero height. Default: 120',
                'std' => '100',
                'type' => 'numeric-slider',
                'min_max_step' => '50,100,1',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_system_page_archive_settings',
            ),

            array(
                'id' => 'ut_archive_hero_background_color',
                'label' => 'Background Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_system_page_archive_settings',
            ),

            array(
                'id' => 'ut_archive_hero_parallax',
                'label' => 'Activate Parallax',
                'desc' => 'Parallax involves the background moving at a slower rate to the foreground, creating a 3D effect as you scroll down the page.',
                'std' => 'off',
                'type' => 'select',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_system_page_archive_settings',
                'choices' => array(
                    array(
                        'value' => 'on',
                        'label' => 'On'
                    ),
                    array(
                        'value' => 'off',
                        'label' => 'Off'
                    )
                )

            ),

            array(
                'id' => 'ut_archive_hero_background_image',
                'label' => 'Background Image',
                'desc' => 'Keep in mind, that you are not able to set a background position or attachment if the parallax option for this section has been set to "on".',
                'type' => 'background',
                'markup' => '1_1',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_system_page_archive_settings'
            ),

            array(
                'id' => 'ut_archive_hero_overlay',
                'label' => 'Activate Overlay?',
                'desc' => 'Covers your hero with an optional color and 3 different patterns.',
                'std' => 'on',
                'type' => 'select',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_system_page_archive_settings',
                'choices' => array(
                    array(
                        'value' => 'on',
                        'label' => 'yes, please!',
                    ),
                    array(
                        'value' => 'off',
                        'label' => 'no, thanks!'
                    )
                ) /* end choices */
            ),

            array(
                'id' => 'ut_archive_hero_overlay_color',
                'label' => 'Overlay Color',
                'desc' => 'Set your desired overlay color. You can use the handle below to change the color opacity.',
                'type' => 'colorpicker',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_system_page_archive_settings',
                'required' => array(
                    'ut_archive_hero_overlay' => 'on'
                )
            ),

            array(
                'id' => 'ut_archive_hero_overlay_color_opacity',
                'label' => 'Overlay Color Opacity',
                'desc' => 'Drag the handle to set the opacity for hero overlay color.',
                'type' => 'numeric-slider',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_system_page_archive_settings',
                'min_max_step' => '0,1,0.05',
                'required' => array(
                    'ut_archive_hero_overlay' => 'on'
                )
            ),

            array(
                'id' => 'ut_archive_hero_overlay_pattern',
                'label' => 'Activate Overlay Pattern?',
                'desc' => 'A repeated decorative overlay pattern.',
                'std' => 'on',
                'type' => 'select',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_system_page_archive_settings',
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
                    'ut_archive_hero_overlay' => 'on'
                )
            ),

            array(
                'id' => 'ut_archive_hero_overlay_pattern_style',
                'label' => 'Overlay Pattern Style',
                'desc' => '<strong>(optional)</strong>',
                'std' => 'style_one',
                'type' => 'select',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_system_page_archive_settings',
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
                    'ut_archive_hero_overlay' => 'on',
                    'ut_archive_hero_overlay_pattern' => 'on'
                )
            ),

            array(
                'id' => 'ut_archive_hero_down_arrow_settings_headline',
                'label' => 'Scroll Down Arrow',
                'type' => 'section_headline',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_system_page_archive_settings',
	            'required' => array(
	            	'ut_global_scroll_down_arrow' => 'on'
	            )
            ),

            array(
                'id' => 'ut_archive_hero_down_arrow_scroll_position',
                'label' => 'Scroll Down Arrow Horizontal Position',
                'desc' => 'Drag the handle to set your desired horizontal position.',
                'type' => 'numeric_slider',
                'std' => '50',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_system_page_archive_settings',
                'required' => array(
	                'ut_global_scroll_down_arrow' => 'on'
                )
            ),

            array(
                'id' => 'ut_archive_hero_down_arrow_scroll_position_vertical',
                'label' => 'Scroll Down Arrow Vertical Position',
                'desc' => 'Drag the handle to set your desired vertical position.',
                'type' => 'numeric_slider',
                'std' => '10',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_system_page_archive_settings',
                'required' => array(
	                'ut_global_scroll_down_arrow' => 'on'
                )
            ),

            array(
                'id' => 'ut_archive_hero_down_arrow_color',
                'label' => 'Scroll Down Arrow Color',
                'desc' => '<strong>(optional)</strong> - choose an alternative for <strong>Scroll Down Arrow</strong>.',
                'type' => 'colorpicker',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_system_page_archive_settings',
                'required' => array(
	                'ut_global_scroll_down_arrow' => 'on'
                )
            ),

            /*
            |--------------------------------------------------------------------------
            | Global Hero Search
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_search_setting_headline',
                'label' => 'Search Results Hero Settings',
                'type' => 'panel_headline',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_system_page_search_settings',
            ),

            array(
                'id' => 'ut_search_hero_background_color',
                'label' => 'Background Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_system_page_search_settings',
            ),

            array(
                'id' => 'ut_search_hero_parallax',
                'label' => 'Activate Parallax',
                'desc' => 'Parallax involves the background moving at a slower rate to the foreground, creating a 3D effect as you scroll down the page.',
                'std' => 'off',
                'type' => 'select',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_system_page_search_settings',
                'choices' => array(
                    array(
                        'value' => 'on',
                        'label' => 'On'
                    ),
                    array(
                        'value' => 'off',
                        'label' => 'Off'
                    )
                )

            ),

            array(
                'id' => 'ut_search_hero_background_image',
                'label' => 'Background Image',
                'desc' => 'Keep in mind, that you are not able to set a background position or attachment if the parallax option for this section has been set to "on".',
                'type' => 'background',
                'markup' => '1_1',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_system_page_search_settings'
            ),

            array(
                'id' => 'ut_search_hero_overlay',
                'label' => 'Activate Overlay?',
                'desc' => 'Covers your hero with an optional color and 3 different patterns.',
                'std' => 'on',
                'type' => 'select',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_system_page_search_settings',
                'choices' => array(
                    array(
                        'value' => 'on',
                        'label' => 'yes, please!',
                    ),
                    array(
                        'value' => 'off',
                        'label' => 'no, thanks!'
                    )
                ) /* end choices */
            ),

            array(
                'id' => 'ut_search_hero_overlay_color',
                'label' => 'Overlay Color',
                'desc' => 'Set your desired overlay color. You can use the handle below to change the color opacity.',
                'type' => 'colorpicker',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_system_page_search_settings',
                'required' => array(
                    'ut_search_hero_overlay' => 'on'
                )
            ),

            array(
                'id' => 'ut_search_hero_overlay_color_opacity',
                'label' => 'Overlay Color Opacity',
                'desc' => 'Drag the handle to set the opacity for hero overlay color.',
                'type' => 'numeric-slider',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_system_page_search_settings',
                'min_max_step' => '0,1,0.05',
                'required' => array(
                    'ut_search_hero_overlay' => 'on'
                )
            ),

            array(
                'id' => 'ut_search_hero_overlay_pattern',
                'label' => 'Activate Overlay Pattern?',
                'desc' => '<strong>(optional)</strong>',
                'std' => 'on',
                'type' => 'select',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_system_page_search_settings',
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
                    'ut_search_hero_overlay' => 'on'
                )
            ),

            array(
                'id' => 'ut_search_hero_overlay_pattern_style',
                'label' => 'Overlay Pattern Style',
                'desc' => '<strong>(optional)</strong>',
                'std' => 'style_one',
                'type' => 'select',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_system_page_search_settings',
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
                    'ut_search_hero_overlay' => 'on',
                    'ut_search_hero_overlay_pattern' => 'on'
                )
            ),

            array(
                'id' => 'ut_search_hero_down_arrow_settings_headline',
                'label' => 'Scroll Down Arrow',
                'type' => 'section_headline',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_system_page_search_settings',
                'required' => array(
	                'ut_global_scroll_down_arrow' => 'on'
                )
            ),

            array(
                'id' => 'ut_search_hero_down_arrow_scroll_position',
                'label' => 'Scroll Down Arrow Horizontal Position',
                'desc' => 'Drag the handle to set your desired horizontal position.',
                'type' => 'numeric_slider',
                'std' => '50',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_system_page_search_settings',
                'required' => array(
	                'ut_global_scroll_down_arrow' => 'on'
                )
            ),

            array(
                'id' => 'ut_search_hero_down_arrow_scroll_position_vertical',
                'label' => 'Scroll Down Arrow Vertical Position',
                'desc' => 'Drag the handle to set your desired vertical position.',
                'type' => 'numeric_slider',
                'std' => '10',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_system_page_search_settings',
                'required' => array(
	                'ut_global_scroll_down_arrow' => 'on'
                )
            ),

            array(
                'id' => 'ut_search_hero_down_arrow_color',
                'label' => 'Scroll Down Arrow Color',
                'desc' => '<strong>(optional)</strong> - choose an alternative for <strong>Scroll Down Arrow</strong>.',
                'type' => 'colorpicker',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_system_page_search_settings',
                'required' => array(
	                'ut_global_scroll_down_arrow' => 'on'
                )
            ),

            /*
            |--------------------------------------------------------------------------
            | 404
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_404_setting_headline',
                'label' => '404 Hero Settings',
                'type' => 'panel_headline',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_system_page_404_settings',
            ),

            array(
                'id' => 'ut_404_hero_background_color',
                'label' => 'Background Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_system_page_404_settings',
            ),

            array(
                'id' => 'ut_404_hero_parallax',
                'label' => 'Activate Parallax',
                'desc' => 'Parallax involves the background moving at a slower rate to the foreground, creating a 3D effect as you scroll down the page.',
                'std' => 'off',
                'type' => 'select',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_system_page_404_settings',
                'choices' => array(
                    array(
                        'value' => 'on',
                        'label' => 'On'
                    ),
                    array(
                        'value' => 'off',
                        'label' => 'Off'
                    )
                )

            ),

            array(
                'id' => 'ut_404_hero_background_image',
                'label' => 'Background Image',
                'desc' => 'Keep in mind, that you are not able to set a background position or attachment if the parallax option for this section has been set to "on".',
                'type' => 'background',
                'markup' => '1_1',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_system_page_404_settings'
            ),

            array(
                'id' => 'ut_404_hero_overlay',
                'label' => 'Activate Overlay?',
                'desc' => 'Covers your hero with an optional color and 3 different patterns.',
                'std' => 'on',
                'type' => 'select',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_system_page_404_settings',
                'choices' => array(
                    array(
                        'value' => 'on',
                        'label' => 'yes, please!',
                    ),
                    array(
                        'value' => 'off',
                        'label' => 'no, thanks!'
                    )
                ) /* end choices */
            ),

            array(
                'id' => 'ut_404_hero_overlay_color',
                'label' => 'Overlay Color',
                'desc' => 'Set your desired overlay color. You can use the handle below to change the color opacity.',
                'type' => 'colorpicker',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_system_page_404_settings',
                'required' => array(
                    'ut_404_hero_overlay' => 'on'
                )
            ),

            array(
                'id' => 'ut_404_hero_overlay_color_opacity',
                'label' => 'Overlay Color Opacity',
                'desc' => 'Drag the handle to set the opacity for hero overlay color.',
                'type' => 'numeric-slider',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_system_page_404_settings',
                'min_max_step' => '0,1,0.05',
                'required' => array(
                    'ut_404_hero_overlay' => 'on'
                )
            ),

            array(
                'id' => 'ut_404_hero_overlay_pattern',
                'label' => 'Activate Overlay Pattern?',
                'desc' => 'A repeated decorative overlay pattern.',
                'std' => 'on',
                'type' => 'select',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_system_page_404_settings',
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
                    'ut_404_hero_overlay' => 'on'
                )
            ),

            array(
                'id' => 'ut_404_hero_overlay_pattern_style',
                'label' => 'Overlay Pattern Style',
                'desc' => '<strong>(optional)</strong>',
                'std' => 'style_one',
                'type' => 'select',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_system_page_404_settings',
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
                    'ut_404_hero_overlay' => 'on',
                    'ut_404_hero_overlay_pattern' => 'on'
                )
            ),

            /*
            |--------------------------------------------------------------------------
            | Single Posts Hero
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_single_posts_hero_settings_headline',
                'label' => 'Single Post Hero Settings',
                'type' => 'panel_headline',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_single_post_hero_settings',
            ),

            array(
                'id' => 'ut_global_post_hero',
                'label' => 'Show Hero by default?',
                'desc' => 'You can individually show or hide the hero for each post. This here is your global default value.',
                'type' => 'select',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_single_post_hero_settings',
                'std' => 'on',
                'choices' => array(
                    array(
                        'value' => 'on',
                        'label' => 'on'
                    ),
                    array(
                        'value' => 'off',
                        'label' => 'off'
                    ),

                ),

            ),
            array(
                'id' => 'ut_global_post_hero_height',
                'label' => 'Height',
                'desc' => 'Drag the handle to set the hero height. Default: 100',
                'std' => '50',
                'type' => 'numeric-slider',
                'min_max_step' => '50,100,1',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_single_post_hero_settings',
            ),
	        array(
		        'id' => 'ut_global_post_hero_height_tablet',
		        'label' => 'Tablet Height',
		        'desc' => 'Drag the handle to set the hero height. Default: 100',
		        'std' => '100',
		        'type' => 'numeric-slider',
		        'min_max_step' => '50,100,1',
		        'section' => 'ut_global_hero_settings',
		        'subsection' => 'ut_single_post_hero_settings'
	        ),
	        array(
		        'id' => 'ut_global_post_hero_height_mobile',
		        'label' => 'Mobile Height',
		        'desc' => 'Drag the handle to set the hero height. Default: 100',
		        'std' => '100',
		        'type' => 'numeric-slider',
		        'min_max_step' => '50,100,1',
		        'section' => 'ut_global_hero_settings',
		        'subsection' => 'ut_single_post_hero_settings'
	        ),
            array(
                'id' => 'ut_global_post_hero_width',
                'label' => 'Content Width',
                'desc' => 'Decide if the hero content gets stretched to fullwidth or displays centered.',
                'type' => 'select',
                'std' => 'center',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_single_post_hero_settings',
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
                'id' => 'ut_global_post_hero_align',
                'label' => 'Caption Alignment',
                'desc' => 'Specifies the default alignment for the caption inside the hero.',
                'type' => 'select',
                'std' => 'center',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_single_post_hero_settings',
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
                'id' => 'ut_global_post_hero_v_align',
                'label' => 'Caption Vertical Alignment',
                'desc' => 'Specifies the default vertical alignment for the caption inside the hero.',
                'type' => 'select',
                'std' => 'middle',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_single_post_hero_settings',
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
                'id' => 'ut_global_post_hero_v_align_margin_bottom',
                'label' => 'Enter Hero Content Spacing Bottom',
                'desc' => 'Specifies the default bottom space for captions with vertical alignment bottom. Value in pixel e.g. 50px.',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_single_post_hero_settings',
                'type' => 'text',
                'required' => array(
                    'ut_global_post_hero_v_align' => 'bottom'
                )
            ),

            array(
                'id' => 'ut_global_post_hero_title',
                'label' => 'Show Title and or Post Meta?',
                'desc' => 'Shows your page title or a custom title as well as the post publish date, author avatar and post categories inside your hero area.',
                'type' => 'select',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_single_post_hero_settings',
                'std' => 'on',
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
                'id' => 'ut_global_post_caption_description_margin',
                'label' => 'Post Meta Spacing Top',
                'desc' => '<strong>(optional)</strong> -  include "px" in your string. e.g. 10px (default: 10px)',
                'type' => 'text',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_single_post_hero_settings',

            ),

            array(
                'id' => 'ut_global_post_hero_down_arrow',
                'label' => 'Show Scroll Down Arrow',
                'desc' => 'The arrow down arrows allows your website visitor to auto scroll to the article on click.',
                'type' => 'select',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_single_post_hero_settings',
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

            ),

            array(
                'id' => 'ut_global_post_hero_mute_button',
                'label' => 'Show Mute Button',
                'desc' => 'Only available for video post format.',
                'type' => 'select',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_single_post_hero_settings',
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

            ),

            array(
                'id' => 'ut_global_post_hero_video_sound',
                'label' => 'Activate Video Sound',
                'desc' => 'Only available for video post format.',
                'type' => 'select',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_single_post_hero_settings',
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

            ),

            array(
                'id' => 'ut_global_post_hero_video_volume',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_single_post_hero_settings',
                'label' => 'Video Volume',
                'desc' => 'Drag the handle to set the video volume. Default: 50.',
                'std' => '50',
                'type' => 'numeric-slider',
                'min_max_step' => '0,100,1'
            ),

            /*
            |--------------------------------------------------------------------------
            | Blog Layout
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_blog_layout_setting_headline',
                'label' => 'Blog Settings',
                'type' => 'panel_headline',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_layout_setting',
            ),

            array(
                'id' => 'ut_blog_layout',
                'label' => 'Blog Layout',
                'desc' => 'Choose from 4 nice blog layouts.',
                'type' => 'select',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_layout_setting',
                'std' => 'standard',
                'choices' => array(
                    array(
                        'value' => 'classic',
                        'label' => 'Classic'
                    ),
                    array(
                        'value' => 'grid',
                        'label' => 'Grid'
                    ),
                    array(
                        'value' => 'mixed-grid',
                        'label' => 'Mixed Grid'
                    ),
                    array(
                        'value' => 'list-grid',
                        'label' => 'List'
                    ),

                ),

            ),
	        array(
		        'id' => 'ut_blog_hide_meta_categories',
		        'label' => 'Hide Categories of Posts',
		        'desc' => 'Hide category links at top of posts?',
		        'type' => 'select',
		        'section' => 'ut_blog_settings',
		        'subsection' => 'ut_blog_layout_setting',
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
			        'ut_blog_layout' => 'grid|mixed-grid|list-grid'
		        )
	        ),
	        array(
		        'id' => 'ut_blog_hide_date',
		        'label' => 'Hide Date of Posts',
		        'desc' => 'Hide date of posts in blog overview?',
		        'type' => 'select',
		        'section' => 'ut_blog_settings',
		        'subsection' => 'ut_blog_layout_setting',
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
			        'ut_blog_layout' => 'grid|mixed-grid|list-grid'
		        )
	        ),
	        array(
		        'id' => 'ut_blog_hide_meta_comments',
		        'label' => 'Hide Author and Comments of Posts',
		        'desc' => 'Hide author and comments at bottom of posts?',
		        'type' => 'select',
		        'section' => 'ut_blog_settings',
		        'subsection' => 'ut_blog_layout_setting',
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
			        'ut_blog_layout' => 'grid|mixed-grid|list-grid'
		        )
	        ),
            array(
                'id' => 'ut_blog_background_color',
                'label' => 'Blog Background Color.',
                'desc' => 'Allows you to emphasize the visual appearance of blog posts boxes.',
                'type' => 'colorpicker',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_layout_setting',
                'required' => array(
	                'ut_blog_layout' => 'grid|mixed-grid|list-grid'
                )
            ),

            array(
                'id' => 'ut_blog_elements_border',
                'label' => 'Blog Element Border Radius',
                'desc' => 'By default image and a bunch of other elements have a 4px border radius. With the help of this option, you can remove this border radius.',
                'type' => 'select',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_layout_setting',
                'std' => 'on',
                'choices' => array(
                    array(
                        'value' => 'on',
                        'label' => 'on'
                    ),
                    array(
                        'value' => 'off',
                        'label' => 'off'
                    ),

                ),

            ),

            array(
                'id' => 'ut_blog_elements_border_radius',
                'label' => 'Blog Element Border Custom Radius',
                'desc' => 'Drag the handle to set the border radius. Default: 4',
                'std' => '4',
                'type' => 'numeric-slider',
                'min_max_step' => '0,100,1',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_layout_setting',
                'required' => array(
                    'ut_blog_elements_border' => 'on'
                )
            ),

            array(
                'id' => 'ut_blog_avatar_border',
                'label' => 'Blog Avatar Shape',
                'desc' => 'By default avatars are round.',
                'type' => 'select',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_layout_setting',
                'std' => 'on',
                'choices' => array(
                    array(
                        'value' => 'on',
                        'label' => 'round'
                    ),
                    array(
                        'value' => 'off',
                        'label' => 'square'
                    ),

                ),

            ),

            array(
                'id' => 'ut_animate_blog_articles',
                'label' => 'Animate Posts on Blog?',
                'desc' => 'Animates your posts inside your blog with a fade in up animation.',
                'type' => 'select',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_layout_setting',
                'std' => 'off',
                'choices' => array(
                    array(
                        'value' => 'on',
                        'label' => 'on'
                    ),
                    array(
                        'value' => 'off',
                        'label' => 'off'
                    ),

                ),

            ),

            array(
                'id' => 'ut_blog_grid_excerpt_length',
                'label' => 'Blog Grid Excerpt Length',
                'desc' => 'Desired Excerpt Length in Words. e.g. 20',
                'type' => 'text',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_layout_setting',
                'required' => array(
                    'ut_blog_layout' => 'grid'
                )
            ),

            array(
                'id' => 'ut_blog_list_excerpt_length',
                'label' => 'Blog List Excerpt Length',
                'desc' => 'Desired Excerpt Length in Words. e.g. 20',
                'type' => 'text',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_layout_setting',
                'required' => array(
                    'ut_blog_layout' => 'list'
                )
            ),
            array(
                'id' => 'ut_blog_mixed_grid_excerpt_length',
                'label' => 'Blog Grid Excerpt Length',
                'desc' => 'Desired Excerpt Length in Words. e.g. 20',
                'type' => 'text',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_layout_setting',
                'required' => array(
                    'ut_blog_layout' => 'mixed-grid'
                )
            ),
            array(
                'id' => 'ut_blog_icon_settings_headline',
                'label' => 'Blog Icon Settings',
                'type' => 'panel_headline',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_layout_setting',
            ),
            array(
		        'id' => 'ut_blog_hide_author_icon',
		        'label' => 'Hide Author Icon?',
		        'desc' => 'Hide author icon at bottom of posts?',
		        'type' => 'select',
		        'section' => 'ut_blog_settings',
		        'subsection' => 'ut_blog_layout_setting',
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
	        ),
            array(
		        'id' => 'ut_blog_author_icon_type',
		        'label' => 'Author Icon Type?',
		        'desc' => 'Choose Icon Source',
		        'type' => 'select',
		        'section' => 'ut_blog_settings',
		        'subsection' => 'ut_blog_layout_setting',
		        'std' => 'off',
		        'choices' => array(
			        array(
				        'value' => 'icon',
				        'label' => 'Icon'
			        ),
			        array(
				        'value' => 'gravatar',
				        'label' => 'Gravatar'
			        ),
		        ),
                'required' => array(
			        'ut_blog_hide_author_icon' => 'off'
		        )
	        ),
            array(
		        'id' => 'ut_blog_author_gravatar_shape',
		        'label' => 'Gravatar Shape?',
		        'desc' => 'Choose desired gravatar shape.',
		        'type' => 'select',
		        'section' => 'ut_blog_settings',
		        'subsection' => 'ut_blog_layout_setting',
		        'std' => 'off',
		        'choices' => array(
			        array(
				        'value' => 'round',
				        'label' => 'round'
			        ),
			        array(
				        'value' => 'square',
				        'label' => 'square'
			        ),
		        ),
                'required' => array(
			        'ut_blog_hide_author_icon' => 'off',
                    'ut_blog_author_icon_type' => 'gravatar'
		        )
	        ),
            array(
		        'id' => 'ut_blog_hide_category_icon',
		        'label' => 'Hide Category Icon?',
		        'desc' => 'Hide category icon at top of posts?',
		        'type' => 'select',
		        'section' => 'ut_blog_settings',
		        'subsection' => 'ut_blog_layout_setting',
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
	        ),
            array(
		        'id' => 'ut_blog_hide_comments_icon',
		        'label' => 'Hide Comments Icon?',
		        'desc' => 'Hide comments icon at top of posts?',
		        'type' => 'select',
		        'section' => 'ut_blog_settings',
		        'subsection' => 'ut_blog_layout_setting',
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
	        ),
            array(
		        'id' => 'ut_blog_hide_permalink_icon',
		        'label' => 'Hide Permalink Icon?',
		        'desc' => 'Hide permalink icon?',
		        'type' => 'select',
		        'section' => 'ut_blog_settings',
		        'subsection' => 'ut_blog_layout_setting',
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
	        ),
            array(
		        'id' => 'ut_blog_hide_sticky_icon',
		        'label' => 'Hide Sticky Icon?',
		        'desc' => 'Hide sticky icon?',
		        'type' => 'select',
		        'section' => 'ut_blog_settings',
		        'subsection' => 'ut_blog_layout_setting',
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
	        ),
            array(
                'id' => 'ut_blog_button_settings_headline',
                'label' => 'Blog Button Settings',
                'type' => 'panel_headline',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_layout_setting',
            ),
            array(
                'id' => 'ut_blog_button_border',
                'label' => 'Overwrite Blog Button Border Radius',
                'desc' => 'By default buttons have a 3px border radius. With the help of this option, you can remove this border radius.',
                'type' => 'select',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_layout_setting',
                'std' => 'off',
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

            ),
            array(
                'id' => 'ut_blog_button_border_radius',
                'label' => 'Button Border Radius',
                'desc' => 'Drag the handle to set the border radius. Default: 3',
                'std' => '3',
                'type' => 'numeric-slider',
                'min_max_step' => '0,100,1',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_layout_setting',
                'required' => array(
                    'ut_blog_button_border' => 'on'
                )
            ),
            array(
                'id' => 'ut_blog_button_text_color',
                'label' => 'Blog Button Text Color',
                'type' => 'colorpicker',
                'desc' => '<strong>(optional)</strong>',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_layout_setting',
            ),
            array(
                'id' => 'ut_blog_button_background_color',
                'label' => 'Blog Button Background Color',
                'type' => 'gradient_colorpicker',
                'desc' => '<strong>(optional)</strong>',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_layout_setting',
            ),
            array(
                'id' => 'ut_blog_button_text_color_hover',
                'label' => 'Blog Button Text Hover Color',
                'type' => 'colorpicker',
                'desc' => '<strong>(optional)</strong>',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_layout_setting',
            ),
            array(
                'id' => 'ut_blog_button_background_color_hover',
                'label' => 'Blog Button Background Hover Color',
                'type' => 'gradient_colorpicker',
                'desc' => '<strong>(optional)</strong>',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_layout_setting',
            ),
            array(
                'id' => 'ut_blog_button_spacing',
                'label' => 'Blog Button Spacing',
                'type' => 'spacing',
                'desc' => '<strong>(optional)</strong> value in px. 0 = default',
                'field_min_max_step' => '0,80,1',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_layout_setting',
            ),
            array(
                'id' => 'ut_blog_button_activate_border',
                'label' => 'Activate Blog Button Border',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'select',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_layout_setting',
                'std' => 'off',
                'choices' => array(
                    array(
                        'value' => 'on',
                        'label' => 'on'
                    ),
                    array(
                        'value' => 'off',
                        'label' => 'off'
                    ),

                ),

            ),
            array(
                'id' => 'ut_blog_button_border_color',
                'label' => 'Blog Button Border Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_layout_setting',
                'required' => array(
                    'ut_blog_button_activate_border' => 'on'
                )
            ),
            array(
                'id' => 'ut_blog_button_hover_border_color',
                'label' => 'Blog Button Hover Border Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_layout_setting',
                'required' => array(
                    'ut_blog_button_activate_border' => 'on'
                )
            ),
            array(
                'id' => 'ut_blog_button_border_style',
                'label' => 'Blog Button Border Style.',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'select',
                'std' => 'solid',
                'choices' => array(
                    array(
                        'value' => 'solid',
                        'label' => 'solid'
                    ),
                    array(
                        'value' => 'dashed',
                        'label' => 'dashed'
                    ),
                    array(
                        'value' => 'dotted',
                        'label' => 'dotted'
                    ),
                    array(
                        'value' => 'double',
                        'label' => 'double'
                    )
                ),
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_layout_setting',
                'required' => array(
                    'ut_blog_button_activate_border' => 'on'
                )
            ),
            array(
                'id' => 'ut_blog_button_border_width',
                'label' => 'Blog Button Border Width',
                'desc' => 'Drag the handle to set the border width.',
                'type' => 'numeric-slider',
                'std' => 0,
                'min_max_step' => '0,50,1',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_layout_setting',
                'required' => array(
                    'ut_blog_button_activate_border' => 'on'
                )
            ),
            array(
                'id' => 'ut_blog_button_body_font',
                'label' => 'Apply Body Font to Button?',
                'desc' => 'By default buttons are displaying with a sans serif font.',
                'type' => 'select',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_layout_setting',
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

                )

            ),
            array(
                'id' => 'ut_blog_button_font_weight',
                'label' => 'Blog Button Font Weight',
                'desc' => 'The font-weight property sets how thick or thin characters in text should be displayed.',
                'type' => 'select',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_layout_setting',
                'std' => 'bold',
                'choices' => array(
                    array(
                        'value' => 'normal',
                        'label' => 'normal'
                    ),
                    array(
                        'value' => 'bold',
                        'label' => 'bold'
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

                )

            ),

            array(
                'id' => 'ut_blog_button_font_style',
                'label' => 'Blog Button Font Setting',
                'desc' => '<strong>optional</strong>',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_layout_setting',
            ),

	        // Blog Background Image
	        array(
		        'id' => 'ut_global_blog_background_image_headline',
		        'label' => 'Blog Background Image',
		        'type' => 'panel_headline',
		        'section' => 'ut_blog_settings',
		        'subsection' => 'ut_blog_background_image_setting',
	        ),

	        array(
		        'id' => 'ut_global_blog_background_image',
		        'label' => 'Blog Background Image',
		        'desc' => 'For best image results, we recommend to upload an image with size of 1920x1080pixel (optimal size). Also try to avoid uploading images with more than 200-300Kb size. We recommend using <a href="https://goo.gl/Sj149K" target="_blank">Kraken.io</a> services for images optimization.',
		        'section' => 'ut_blog_settings',
		        'subsection' => 'ut_blog_background_image_setting',
		        'type' => 'background',
		        'markup' => '1_1',

	        ),

			// Blog Color
            array(
                'id' => 'ut_blog_overview_settings_headline',
                'label' => 'Blog Colors',
                'type' => 'panel_headline',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_color_setting',
            ),
            array(
                'id' => 'ut_blog_overview_article_title_color',
                'label' => 'Blog Article Title Color',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'desc' => '<strong>(optional)</strong>',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_color_setting',
            ),
            array(
                'id' => 'ut_blog_overview_article_title_color_hover',
                'label' => 'Blog Article Title Hover Color',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'desc' => '<strong>(optional)</strong>',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_color_setting',
            ),
            array(
                'id' => 'ut_blog_overview_article_sub_title_color',
                'label' => 'Blog Article Sub Title Color',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'desc' => '<strong>(optional)</strong>',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_color_setting',
            ),
            array(
                'id' => 'ut_blog_overview_meta_icon_color',
                'label' => 'Blog Meta Icon Color',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'desc' => '<strong>optional</strong>',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_color_setting',
            ),
            array(
                'id' => 'ut_blog_overview_meta_link_color',
                'label' => 'Blog Meta Link Color',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'desc' => '<strong>optional</strong>',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_color_setting',
            ),
            array(
                'id' => 'ut_blog_overview_meta_link_color_hover',
                'label' => 'Blog Meta Link Hover Color',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'desc' => '<strong>optional</strong>',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_color_setting',
            ),

            array(
                'id' => 'ut_blog_overview_background_color',
                'label' => 'Blog Article Background Color',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'desc' => '<strong>optional</strong>',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_color_setting',
            ),

            array(
                'id' => 'ut_force_single_post_article_spacing',
                'label' => 'Force Article Spacing on Single Posts?',
                'desc' => 'This can be useful if the article background color is different to the main background color.',
                'type' => 'select',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_color_setting',
                'std' => 'off',
                'choices' => array(
                    array(
                        'label'     => 'no, thanks!',
                        'value'     => 'off'
                    ),
                    array(
                        'label'     => 'yes, please!',
                        'value'     => 'on'
                    ),

                ),

            ),

            array(
                'id' => 'ut_blog_overview_border_color',
                'label' => 'Blog Article Border Color',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'desc' => '<strong>optional</strong>',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_color_setting',
            ),

            array(
                'id' => 'ut_blog_overview_meta_link_font_style',
                'label' => 'Blog Meta Link Font Setting',
                'desc' => '<strong>optional</strong>',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_color_setting',
            ),

            /* Blog Date and Caption */
            array(
                'id' => 'ut_blog_date_settings_headline',
                'label' => 'Blog Date and Caption Colors',
                'type' => 'panel_headline',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_data_caption_color_setting',
            ),

            array(
                'id' => 'ut_blog_date_body_font',
                'label' => 'Apply Body Font to Date?',
                'desc' => 'By default the date is displaying with a sans serif font.',
                'type' => 'select',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_data_caption_color_setting',
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

                )

            ),
            array(
                'id' => 'ut_blog_overview_date_background_color',
                'label' => 'Blog Date Background Color',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'desc' => '<strong>for Blog Grid, Blog Mixed, Blog List Style.</strong>',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_data_caption_color_setting',
            ),
            array(
                'id' => 'ut_blog_overview_date_color',
                'label' => 'Blog Date (Day) Color',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'desc' => '<strong>(optional)</strong>',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_data_caption_color_setting',
            ),
            array(
                'id' => 'ut_blog_overview_date_font_style',
                'label' => 'Blog Date (Day) Font Settings',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_data_caption_color_setting',

            ),
            array(
                'id' => 'ut_blog_overview_date_color_bottom',
                'label' => 'Blog Date (Month Year) Color',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'desc' => '<strong>(optional)</strong>',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_data_caption_color_setting',
            ),
            array(
                'id' => 'ut_blog_overview_date_bottom_font_style',
                'label' => 'Blog Date (Month Year) Font Settings',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_data_caption_color_setting',

            ),
            array(
                'id' => 'ut_date_color_skins',
                'label' => 'Date and Caption Color Skins',
                'desc' => 'Depending on selected Blog Layout. The Date and Caption are placed on the image. This can cause illegible characters, especially if date color and image color are in the same color space. Therefore you can create individual Date Color Skins and assign these Skins to your single post by using the "Date Skins" dropdown on the right side of your post Editor.',
                'type' => 'list-item',
                'list_title' => false,
                'markup' => '1_1',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_data_caption_color_setting',
                'settings' => array(

                    array(
                        'id' => 'title',
                        'label' => 'Enter a Skin Title',
                        'desc' => 'Used for internal use.',
                        'type' => 'text',
                        'class' => 'option-tree-setting-title',
                    ),

                    // automated unique ID for later use
                    array(
                        'id' => 'unique_id',
                        'label' => 'ID',
                        'type' => 'unique_id',
                    ),

                    array(
                        'id' => 'date_color',
                        'label' => 'Blog Date (Day) Color',
                        'type' => 'colorpicker',
                        'mode' => 'rgb',
                    ),

                    array(
                        'id' => 'date_color_bottom',
                        'label' => 'Blog Date (Month Year) Color',
                        'type' => 'colorpicker',
                        'mode' => 'rgb',
                    ),

                    array(
                        'id' => 'caption_color',
                        'label' => 'Caption Color',
                        'type' => 'colorpicker',
                        'mode' => 'rgb',
                    ),

                )


            ),

            // Single Post Colors
	        array(
		        'id' => 'ut_blog_single_post_color_settings_headline',
		        'label' => 'Single Post Colors',
		        'type' => 'panel_headline',
		        'section' => 'ut_blog_settings',
		        'subsection' => 'ut_blog_single_post_color_setting',
	        ),
	        array(
		        'id' => 'ut_global_post_meta_background',
		        'label' => 'Date and Meta Background Color',
		        'type' => 'colorpicker',
		        'mode' => 'rgb',
		        'desc' => '<strong>only for single posts</strong>',
		        'section' => 'ut_blog_settings',
		        'subsection' => 'ut_blog_single_post_color_setting'
	        ),
	        array(
		        'id' => 'ut_global_post_meta_date_color',
		        'label' => 'Date (Day) Color',
		        'type' => 'colorpicker',
		        'mode' => 'rgb',
		        'desc' => '<strong>only for single posts</strong>',
		        'section' => 'ut_blog_settings',
		        'subsection' => 'ut_blog_single_post_color_setting'

	        ),
	        array(
		        'id' => 'ut_global_post_meta_date_color_bottom',
		        'label' => 'Date (Month Year) Color',
		        'type' => 'colorpicker',
		        'mode' => 'rgb',
		        'desc' => '<strong>only for single posts</strong>',
		        'section' => 'ut_blog_settings',
		        'subsection' => 'ut_blog_single_post_color_setting',
	        ),
	        array(
		        'id' => 'ut_global_post_border_color',
		        'label' => 'Border Color',
		        'desc' => '<strong>(optional)</strong>',
		        'type' => 'colorpicker',
		        'mode' => 'rgb',
		        'section' => 'ut_blog_settings',
		        'subsection' => 'ut_blog_single_post_color_setting'
	        ),
	        array(
		        'id' => 'ut_global_post_tags_settings_headline',
		        'label' => 'Tag Colors',
		        'type' => 'section_headline',
		        'section' => 'ut_blog_settings',
		        'subsection' => 'ut_blog_single_post_color_setting',
	        ),
	        array(
		        'id' => 'ut_global_post_tags_hash_color',
		        'label' => 'Tags Hash Color',
		        'desc' => '<strong>(optional)</strong>',
		        'type' => 'colorpicker',
		        'mode' => 'rgb',
		        'section' => 'ut_blog_settings',
		        'subsection' => 'ut_blog_single_post_color_setting',
	        ),
	        array(
		        'id' => 'ut_global_post_tags_color',
		        'label' => 'Tags Color',
		        'desc' => '<strong>(optional)</strong>',
		        'type' => 'colorpicker',
		        'mode' => 'rgb',
		        'section' => 'ut_blog_settings',
		        'subsection' => 'ut_blog_single_post_color_setting',
	        ),
	        array(
		        'id' => 'ut_global_post_tags_color_hover',
		        'label' => 'Tags Hover Color',
		        'desc' => '<strong>(optional)</strong>',
		        'type' => 'colorpicker',
		        'mode' => 'rgb',
		        'section' => 'ut_blog_settings',
		        'subsection' => 'ut_blog_single_post_color_setting',
	        ),

            /* Blog Overview Media */
            array(
                'id' => 'ut_blog_overview_media_settings_headline',
                'label' => 'Blog Overview Media Colors',
                'type' => 'panel_headline',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_overview_media_color_setting',
            ),

            array(
                'id' => 'ut_blog_overview_pformat_icon_color',
                'label' => 'Blog Post Format Icon Color',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'desc' => '<strong>(optional)</strong>',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_overview_media_color_setting',
            ),

            array(
                'id' => 'ut_blog_overview_pformat_icon_background_color',
                'label' => 'Blog Post Format Icon Background Color',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'desc' => '<strong>(optional)</strong>',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_overview_media_color_setting',
            ),

            array(
                'id' => 'ut_blog_overview_gallery_arrow_color',
                'label' => 'Blog Gallery Carousel Arrow Color',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'desc' => '<strong>(optional)</strong>',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_overview_media_color_setting',
            ),

            array(
                'id' => 'ut_blog_overview_gallery_arrow_color_hover',
                'label' => 'Blog Gallery Carousel Arrow Hover Color',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'desc' => '<strong>(optional)</strong>',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_overview_media_color_setting',
            ),

            array(
                'id' => 'ut_blog_overview_gallery_arrow_background_color',
                'label' => 'Blog Gallery Carousel Arrow Background Color',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'desc' => '<strong>(optional)</strong>',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_overview_media_color_setting',
            ),

            array(
                'id' => 'ut_blog_overview_gallery_arrow_background_color_hover',
                'label' => 'Blog Gallery Carousel Arrow Background Hover Color',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'desc' => '<strong>(optional)</strong>',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_overview_media_color_setting',
            ),

            /* Blog Read More */
            array(
                'id' => 'ut_blog_read_more_settings_headline',
                'label' => 'Blog Read More Colors & Icon',
                'type' => 'panel_headline',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_read_more_color_setting',
            ),

            array(
                'id' => 'ut_blog_read_more_font_style',
                'label' => 'Read More Font Setting',
                'desc' => '<strong>optional</strong>',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_read_more_color_setting',
            ),

            array(
                'id' => 'ut_blog_read_more_align',
                'label' => 'Read More Align',
                'desc' => 'Read More Button Align for Blog.',
                'type' => 'select',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_read_more_color_setting',
                'std' => 'right',
                'choices' => array(
                    array(
                        'value' => 'left',
                        'label' => 'Left'
                    ),
                    array(
                        'value' => 'center',
                        'label' => 'Center'
                    ),
                    array(
                        'value' => 'right',
                        'label' => 'Right'
                    )
                ),
            ),

            array(
                'id' => 'ut_blog_read_more_color_hover',
                'label' => 'Blog Read More Hover Color',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'desc' => '<strong>optional</strong>',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_read_more_color_setting',
            ),

	        array(
		        'id' => 'ut_blog_read_more_icon_source',
		        'label' => 'Blog Read More Icon',
		        'desc' => 'Change the read more icon or turn it completely off.',
		        'type' => 'select',
		        'section' => 'ut_blog_settings',
		        'subsection' => 'ut_blog_read_more_color_setting',
		        'std' => 'default',
		        'choices' => array(
			        array(
				        'value' => 'default',
				        'label' => 'Theme Default Icon'
			        ),
			        array(
				        'value' => 'custom',
				        'label' => 'Custom Icon'
			        ),
			        array(
				        'value' => 'off',
				        'label' => 'No Iocn'
			        ),

		        ),

	        ),

	        array(
		        'id' => 'ut_blog_read_more_custom_icon',
		        'label' => 'Select Custom Icon',
		        'desc' => 'Choose your desired read more icon.',
		        'type' => 'iconpicker',
		        'section' => 'ut_blog_settings',
		        'subsection' => 'ut_blog_read_more_color_setting',
		        'required' => array(
			        'ut_blog_read_more_icon_source' => 'custom'
		        )
	        ),

	        array(
		        'id' => 'ut_blog_read_more_color',
		        'label' => 'Blog Read More Color',
		        'type' => 'colorpicker',
		        'mode' => 'rgb',
		        'desc' => '<strong>optional</strong>',
		        'section' => 'ut_blog_settings',
		        'subsection' => 'ut_blog_read_more_color_setting',
	        ),

            array(
                'id' => 'ut_blog_read_more_icon_color',
                'label' => 'Blog Read More Icon Color',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'desc' => '<strong>optional</strong>',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_read_more_color_setting',
            ),

            array(
                'id' => 'ut_blog_read_more_icon_color_hover',
                'label' => 'Blog Read More Icon Hover Color',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'desc' => '<strong>optional</strong>',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_read_more_color_setting',
            ),



            /*
            |--------------------------------------------------------------------------
            | Blog Color Settings
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_author_bio_setting_headline',
                'label' => 'Author Biography Box',
                'type' => 'panel_headline',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_author_bio_color_setting',
            ),

            array(
                'id' => 'ut_author_archive_text_color',
                'label' => 'Author Archive Text Color',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'desc' => '<strong>(optional)</strong>',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_author_bio_color_setting',
            ),

            array(
                'id' => 'ut_author_archive_link_color',
                'label' => 'Author Archive Link Color',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'desc' => '<strong>(optional)</strong>',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_author_bio_color_setting',
            ),

            array(
                'id' => 'ut_author_archive_link_color_hover',
                'label' => 'Author Archive Link Hover Color',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'desc' => '<strong>(optional)</strong>',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_author_bio_color_setting',
            ),

            array(
                'id' => 'ut_author_archive_link_arrow_color',
                'label' => 'Author Archive Link Arrow Color',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'desc' => '<strong>(optional)</strong>',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_author_bio_color_setting',
            ),

            array(
                'id' => 'ut_author_archive_link_arrow_color_hover',
                'label' => 'Author Archive Link Arrow Hover Color',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'desc' => '<strong>(optional)</strong>. Default theme accent color.',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_author_bio_color_setting',
            ),

            array(
                'id' => 'ut_author_bio_social_icon_color',
                'label' => 'Author Bio Social Icon Color',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'desc' => '<strong>(optional)</strong>',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_author_bio_color_setting',
            ),

            array(
                'id' => 'ut_author_bio_social_icon_color_hover',
                'label' => 'Author Bio Social Icon Hover Color',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'desc' => '<strong>(optional)</strong>. Default theme accent color.',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_author_bio_color_setting',
            ),

            /*
            |--------------------------------------------------------------------------
            | Blog Comment Form Color Settings
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_comment_form_setting_headline',
                'label' => 'Comment Form Colors',
                'type' => 'panel_headline',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_comment_form_color_setting',
            ),
            array(
                'id' => 'ut_comment_date_color',
                'label' => 'Comment Date Link Color',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'desc' => '<strong>(optional)</strong>',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_comment_form_color_setting',
            ),
            array(
                'id' => 'ut_comment_date_color_hover',
                'label' => 'Comment Date Link Hover Color',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'desc' => '<strong>(optional)</strong>',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_comment_form_color_setting',
            ),
            array(
                'id' => 'ut_comment_edit_link_color',
                'label' => 'Edit Comment Link Color',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'desc' => '<strong>(optional)</strong>',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_comment_form_color_setting',
            ),
            array(
                'id' => 'ut_comment_edit_link_color_hover',
                'label' => 'Edit Comment Link Hover Color',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'desc' => '<strong>(optional)</strong>',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_comment_form_color_setting',
            ),
            array(
                'id' => 'ut_comment_form_label_color',
                'label' => 'Comment Form Label Color',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'desc' => '<strong>(optional)</strong>',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_comment_form_color_setting',
            ),
            array(
                'id' => 'ut_comment_form_text_color',
                'label' => 'Comment Form Text Color',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'desc' => '<strong>(optional)</strong>',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_comment_form_color_setting',
            ),
            array(
                'id' => 'ut_comment_form_label_font_style',
                'label' => 'Comment Form Label Font Setting',
                'desc' => '<strong>optional</strong>',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_comment_form_color_setting',
            ),

            /*
            |--------------------------------------------------------------------------
            | Single Post Setting
            |--------------------------------------------------------------------------
            */
            array(
                'id' => 'ut_single_posts_setting_headline',
                'label' => 'Single Post Settings',
                'type' => 'panel_headline',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_single_posts_setting',
            ),

            array(
                'id' => 'ut_single_posts_sidebar',
                'label' => 'Activate Sidebar for Single Posts?',
                'desc' => 'Please make sure to place at least 1 Widgets into "Blog Sidebar" under Appearance > Widgets.',
                'type' => 'select',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_single_posts_setting',
                'std' => 'on',
                'choices' => array(
                    array(
                        'value' => 'on',
                        'label' => 'on'
                    ),
                    array(
                        'value' => 'off',
                        'label' => 'off'
                    ),

                ),

            ),

            array(
                'id' => 'ut_single_posts_settings_headline',
                'label' => 'Single Post Content Settings',
                'type' => 'section_headline',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_single_posts_setting',
            ),

            array(
                'id' => 'ut_global_post_title',
                'label' => 'Show Title?',
                'desc' => 'This option allows you to hide the post title in your main content.',
                'type' => 'select',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_single_posts_setting',
                'std' => 'on',
                'choices' => array(
                    array(
                        'label'     => 'yes, please!',
                        'value'     => 'on'
                    ),
                    array(
                        'label'     => 'no, thanks!',
                        'value'     => 'off'
                    )

                ),

            ),

            array(
                'id' => 'ut_global_post_title_align',
                'label' => 'Title Alignment',
                'desc' => 'This option allows you change the post title alignment in your main content.',
                'type' => 'select',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_single_posts_setting',
                'std' => 'left',
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
                'id' => 'ut_global_post_thumbnail',
                'label' => 'Show Featured Image?',
                'desc' => 'This option allows you to hide the featured image in your main content.',
                'type' => 'select',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_single_posts_setting',
                'std' => 'on',
                'choices' => array(
                    array(
                        'label'     => 'yes, please!',
                        'value'     => 'on'
                    ),
                    array(
                        'label'     => 'no, thanks!',
                        'value'     => 'off'
                    )

                ),

            ),

            array(
                'id' => 'ut_global_post_video',
                'label' => 'Show Featured Video?',
                'desc' => 'This option allows you to hide the featured video in your main content. Only for post format video.',
                'type' => 'select',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_single_posts_setting',
                'std' => 'on',
                'choices' => array(
                    array(
                        'label'     => 'yes, please!',
                        'value'     => 'on'
                    ),
                    array(
                        'label'     => 'no, thanks!',
                        'value'     => 'off'
                    )

                ),

            ),
            array(
                'id' => 'ut_global_post_meta_box',
                'label' => 'Show Post Meta Box?',
                'desc' => 'This option allows you to hide the post meta box located on the left.',
                'type' => 'select',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_single_posts_setting',
                'std' => 'on',
                'choices' => array(
                    array(
                        'label'     => 'yes, please!',
                        'value'     => 'on'
                    ),
                    array(
                        'label'     => 'no, thanks!',
                        'value'     => 'off'
                    ),

                ),

            ),
            array(
                'id' => 'ut_author_hero_settings_headline',
                'label' => 'Author Hero Settings',
                'type' => 'section_headline',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_single_posts_setting',
            ),

            array(
                'id' => 'ut_author_hero_highlight',
                'label' => 'Highlight Author Surname in Hero?',
                'desc' => 'This option allows you to highlight the author surname inside the hero area on author pages.',
                'type' => 'select',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_single_posts_setting',
                'std' => 'on',
                'choices' => array(
                    array(
                        'label'     => 'yes, please!',
                        'value'     => 'on'
                    ),
                    array(
                        'label'     => 'no, thanks!',
                        'value'     => 'off'
                    )

                ),

            ),
            
            array(
                'id' => 'ut_author_avatar_border',
                'label' => 'Deactivate Author Avatar Border?',
                'desc' => 'This option allows you to hide the colored border from author avatar.',
                'type' => 'select',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_single_posts_setting',
                'std' => 'off',
                'choices' => array(
                    array(
                        'label'     => 'no, thanks!',
                        'value'     => 'off'
                    ),
                     array(
                        'label'     => 'yes, please!',
                        'value'     => 'on'
                    ),

                ),

            ),

	        /*
			|--------------------------------------------------------------------------
			| Blog Archive
			|--------------------------------------------------------------------------
			*/

	        array(
		        'id' => 'ut_blog_archive_setting_headline',
		        'label' => 'Archive Settings',
		        'type' => 'panel_headline',
		        'section' => 'ut_blog_settings',
		        'subsection' => 'ut_blog_archive_setting',
	        ),
	        array(
		        'id' => 'ut_blog_archive_hide_date',
		        'label' => 'Hide Date of Posts',
		        'desc' => 'Hide date of posts in blog overview?',
		        'type' => 'select',
		        'section' => 'ut_blog_settings',
		        'subsection' => 'ut_blog_archive_setting',
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
	        ),
	        array(
		        'id' => 'ut_blog_archive_hide_meta_categories',
		        'label' => 'Hide Categories of Posts',
		        'desc' => 'Hide category links at top of posts?',
		        'type' => 'select',
		        'section' => 'ut_blog_settings',
		        'subsection' => 'ut_blog_archive_setting',
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

	        ),
	        array(
		        'id' => 'ut_blog_archive_hide_meta_comments',
		        'label' => 'Hide Author and Comments of Posts',
		        'desc' => 'Hide author and comments at bottom of posts?',
		        'type' => 'select',
		        'section' => 'ut_blog_settings',
		        'subsection' => 'ut_blog_archive_setting',
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

	        ),

            /*
            |--------------------------------------------------------------------------
            | Blog Sidebar
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_blog_sidebar_headline',
                'label' => 'Sidebar Align',
                'type' => 'panel_headline',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_sidebar_setting',
            ),

            array(
                'id' => 'ut_sidebar_align',
                'label' => 'Sidebar Align',
                'desc' => 'Sidebar align for blog. Make sure that sidebars have active widgets, otherwise they won\'t display. And make sure to select a sidebar you\'d like to display, when editing the blog page. Right below the "Featured Image" area.',
                'type' => 'select',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_sidebar_setting',
                'choices' => array(
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

            /*
            |--------------------------------------------------------------------------
            | Blog Paginationm
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_blog_pagination_headline',
                'label' => 'Blog Pagination',
                'type' => 'panel_headline',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_pagination_setting',
            ),

            array(
                'id' => 'ut_blog_pagination_height',
                'label' => 'Blog Pagination Height',
                'desc' => 'Drag the handle to set the pagination height. Default: 120',
                'std' => '120',
                'type' => 'numeric-slider',
                'min_max_step' => '0,300,10',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_pagination_setting',
            ),

            array(
                'id' => 'ut_blog_pagination_background_color',
                'label' => 'Blog Pagination Background Color',
                'type' => 'gradient_colorpicker',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_pagination_setting',
            ),

            array(
                'id' => 'ut_blog_pagination_arrow_color',
                'label' => 'Blog Pagination Arrow Color',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_pagination_setting',
            ),

            array(
                'id' => 'ut_blog_pagination_arrow_hover_color',
                'label' => 'Blog Pagination Arrow Hover Color',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_pagination_setting',
            ),


            /*
            |--------------------------------------------------------------------------
            | Shop Settings
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_shop_settings_headline',
                'label' => 'Brooklyn Shop Settings',
                'type' => 'panel_headline',
                'section' => 'ut_shop_settings',
                'subsection' => 'ut_shop_general_settings',
            ),


            array(
                'id' => 'ut_shop_settings_info',
                'label' => 'Shop Settings',
                'desc' => 'Shop Settings. Preparation for upcoming Woocommerce Patch. In future you will find all necessary shop settings in this panel.',
                'type' => 'section_headline_info',
                'section' => 'ut_shop_settings',
                'subsection' => 'ut_shop_general_settings',
            ),





            /*
            |--------------------------------------------------------------------------
            | Portfolio Settings
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_portfolio_content_headline',
                'label' => 'Single Portfolio',
                'type' => 'panel_headline',
                'section' => 'ut_portfolio_settings',
                'subsection' => 'ut_portfolio_single_settings',
            ),

            array(
                'id' => 'ut_single_portfolio_navigation',
                'label' => 'Activate Portfolio Navigation?',
                'desc' => 'A navigation with links to the previous and next portfolio post as well as a link to the page which holds the main portfolio overview. ',
                'type' => 'select',
                'std' => 'off',
                'section' => 'ut_portfolio_settings',
                'subsection' => 'ut_portfolio_single_settings',
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
            ),

            array(
                'id' => 'ut_single_portfolio_navigation_width',
                'label' => 'Portfolio Navigation Width?',
                'desc' => 'It handles centering the arrows and icon within the navigation. Centered arrows and icon have a max width of 1200px and fullwidth 100%.',
                'type' => 'select',
                'std' => 'centered',
                'section' => 'ut_portfolio_settings',
                'subsection' => 'ut_portfolio_single_settings',
                'choices' => array(
                    array(
                        'value' => 'centered',
                        'label' => 'centered'
                    ),
                    array(
                        'value' => 'fullwidth',
                        'label' => 'fullwidth'
                    )
                ),
                'required' => array(
                    'ut_single_portfolio_navigation' => 'on'
                )
            ),

            array(
                'id' => 'ut_single_portfolio_navigation_arrow_style',
                'label' => 'Portfolio Arrow Style',
                'desc' => 'Customize the previous and next arrows.',
                'type' => 'select',
                'std' => 'centered',
                'section' => 'ut_portfolio_settings',
                'subsection' => 'ut_portfolio_single_settings',
                'choices' => array(
                    array(
                        'value' => 'arrows',
                        'label' => 'Single Arrows'
                    ),
                    array(
                        'value' => 'arrows_with_title',
                        'label' => 'Arrows with Title'
                    ),
                    array(
                        'value' => 'title_only',
                        'label' => 'Title Only'
                    ),
                    array(
                        'value' => 'arrows_with_text',
                        'label' => 'Arrows with Custom Text'
                    ),
                    array(
                        'value' => 'text_only',
                        'label' => 'Custom Text Only'
                    ),

                ),
                'required' => array(
                    'ut_single_portfolio_navigation' => 'on'
                )

            ),

            array(
                'id' => 'ut_single_portfolio_navigation_next_text',
                'label' => 'Next Portfolio',
                'desc' => 'Custom Text for Next Portfolio',
                'type' => 'text',
                'section' => 'ut_portfolio_settings',
                'subsection' => 'ut_portfolio_single_settings',
                'required' => array(
                    'ut_single_portfolio_navigation' => 'on',
                    'ut_single_portfolio_navigation_arrow_style' => 'arrows_with_text|text_only'
                )
            ),

            array(
                'id' => 'ut_single_portfolio_navigation_prev_text',
                'label' => 'Previous Portfolio',
                'desc' => 'Custom Text for Previous Portfolio',
                'type' => 'text',
                'section' => 'ut_portfolio_settings',
                'subsection' => 'ut_portfolio_single_settings',
                'required' => array(
                    'ut_single_portfolio_navigation' => 'on',
                    'ut_single_portfolio_navigation_arrow_style' => 'arrows_with_text|text_only'
                )
            ),

            array(
                'id' => 'ut_single_portfolio_navigation_height',
                'label' => 'Portfolio Navigation Height',
                'desc' => 'Drag the handle to set the portfolio navigation height. Default: 120.',
                'std' => '120',
                'type' => 'numeric-slider',
                'min_max_step' => '40,300,10',
                'section' => 'ut_portfolio_settings',
                'subsection' => 'ut_portfolio_single_settings',
                'required' => array(
                    'ut_single_portfolio_navigation' => 'on'
                )
            ),

            array(
                'id' => 'ut_single_portfolio_navigation_main_portfolio_page',
                'label' => 'Main Portfolio Page',
                'desc' => 'Select a page where your main showcase is located.',
                'type' => 'page_select',
                'section' => 'ut_portfolio_settings',
                'subsection' => 'ut_portfolio_single_settings',
                'required' => array(
                    'ut_single_portfolio_navigation' => 'on'
                )
            ),

            array(
                'id' => 'ut_single_portfolio_navigation_main_portfolio_page_custom',
                'label' => 'Main Portfolio Page',
                'desc' => 'Select a page where your main showcase is located.',
                'type' => 'text',
                'section' => 'ut_portfolio_settings',
                'subsection' => 'ut_portfolio_single_settings',
                'required' => array(
                    'ut_single_portfolio_navigation_main_portfolio_page' => 'custom'
                )
            ),

            array(
                'id' => 'ut_single_portfolio_navigation_main_portfolio_icon',
                'label' => 'Select Main Portfolio Icon',
                'desc' => 'Choose your desired icon.',
                'type' => 'iconpicker',
                'section' => 'ut_portfolio_settings',
                'subsection' => 'ut_portfolio_single_settings',
                'required' => array(
                    'ut_single_portfolio_navigation' => 'on'
                )
            ),

            array(
                'id' => 'ut_single_portfolio_navigation_color_settings_headline',
                'label' => 'Navigation Colors',
                'type' => 'section_headline',
                'section' => 'ut_portfolio_settings',
                'subsection' => 'ut_portfolio_single_settings',
                'required' => array(
                    'ut_single_portfolio_navigation' => 'on'
                )
            ),

            array(
                'id' => 'ut_single_portfolio_navigation_background_color',
                'label' => 'Portfolio Navigation Background Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'gradient_colorpicker',
                'section' => 'ut_portfolio_settings',
                'subsection' => 'ut_portfolio_single_settings',
                'required' => array(
                    'ut_single_portfolio_navigation' => 'on'
                )
            ),

            array(
                'id' => 'ut_single_portfolio_navigation_arrow_color_settings_headline',
                'label' => 'Navigation Arrow and Icon Colors',
                'type' => 'sub_section_headline',
                'section' => 'ut_portfolio_settings',
                'subsection' => 'ut_portfolio_single_settings',
                'required' => array(
                    'ut_single_portfolio_navigation' => 'on'
                )
            ),

            array(
                'id' => 'ut_single_portfolio_navigation_arrow_color',
                'label' => 'Portfolio Navigation Arrow Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_portfolio_settings',
                'subsection' => 'ut_portfolio_single_settings',
                'required' => array(
                    'ut_single_portfolio_navigation' => 'on'
                )
            ),

            array(
                'id' => 'ut_single_portfolio_navigation_arrow_hover_color',
                'label' => 'Portfolio Navigation Arrow Hover Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_portfolio_settings',
                'subsection' => 'ut_portfolio_single_settings',
                'required' => array(
                    'ut_single_portfolio_navigation' => 'on'
                )
            ),

            array(
                'id' => 'ut_single_portfolio_back_to_main_color',
                'label' => 'Main Portfolio Link Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_portfolio_settings',
                'subsection' => 'ut_portfolio_single_settings',
                'required' => array(
                    'ut_single_portfolio_navigation' => 'on'
                )
            ),

            array(
                'id' => 'ut_single_portfolio_back_to_main_hover_color',
                'label' => 'Main Portfolio Link Hover Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_portfolio_settings',
                'subsection' => 'ut_portfolio_single_settings',
                'required' => array(
                    'ut_single_portfolio_navigation' => 'on'
                )
            ),


            array(
                'id' => 'ut_single_portfolio_navigation_text_color_settings_headline',
                'label' => 'Navigation Text Colors',
                'type' => 'sub_section_headline',
                'section' => 'ut_portfolio_settings',
                'subsection' => 'ut_portfolio_single_settings',
                'required' => array(
                    'ut_single_portfolio_navigation' => 'on',
                    'ut_single_portfolio_navigation_arrow_style' => 'arrows_with_title|title_only|arrows_with_text|text_only'
                )
            ),

            array(
                'id' => 'ut_single_portfolio_navigation_underline_effect',
                'label' => 'Activate Underline Animation Effect on Hover?',
                'desc' => 'A nice hover animation effect for next and previous portfolio links.',
                'type' => 'select',
                'std' => 'off',
                'section' => 'ut_portfolio_settings',
                'subsection' => 'ut_portfolio_single_settings',
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
                    'ut_single_portfolio_navigation' => 'on',
                    'ut_single_portfolio_navigation_arrow_style' => 'arrows_with_title|title_only|arrows_with_text|text_only'
                )
            ),

            array(
                'id' => 'ut_single_portfolio_navigation_text_color',
                'label' => 'Portfolio Navigation Text Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_portfolio_settings',
                'subsection' => 'ut_portfolio_single_settings',
                'required' => array(
                    'ut_single_portfolio_navigation' => 'on',
                    'ut_single_portfolio_navigation_arrow_style' => 'arrows_with_title|title_only|arrows_with_text|text_only'
                )
            ),

            array(
                'id' => 'ut_single_portfolio_navigation_text_hover_color',
                'label' => 'Portfolio Navigation Text Hover Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_portfolio_settings',
                'subsection' => 'ut_portfolio_single_settings',
                'required' => array(
                    'ut_single_portfolio_navigation' => 'on',
                    'ut_single_portfolio_navigation_arrow_style' => 'arrows_with_title|title_only|arrows_with_text|text_only'
                )
            ),

            array(
                'id' => 'ut_single_portfolio_navigation_underline_color',
                'label' => 'Portfolio Navigation Underline Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_portfolio_settings',
                'subsection' => 'ut_portfolio_single_settings',
                'required' => array(
                    'ut_single_portfolio_navigation' => 'on',
                    'ut_single_portfolio_navigation_underline_effect' => 'on'
                )
            ),

            array(
                'id' => 'ut_single_portfolio_navigation_font_style',
                'label' => 'Portfolio Navigation Font Setting',
                'desc' => '',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_portfolio_settings',
                'subsection' => 'ut_portfolio_single_settings',
                'required' => array(
                    'ut_single_portfolio_navigation' => 'on',
                    'ut_single_portfolio_navigation_arrow_style' => 'arrows_with_title|title_only|arrows_with_text|text_only'
                )
            ),


            /*
            |--------------------------------------------------------------------------
            | Portfolio Settings
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_portfolio_showcase_headline',
                'label' => 'Packery Showcase Caption',
                'type' => 'panel_headline',
                'section' => 'ut_portfolio_settings',
                'subsection' => 'ut_portfolio_showcase_setting',
            ),

            array(
                'id' => 'ut_portfolio_showcase_icon_type',
                'label' => 'Showcase Icon',
                'desc' => 'You can use a font awesome icon or upload your own.',
                'type' => 'select',
                'section' => 'ut_portfolio_settings',
                'subsection' => 'ut_portfolio_showcase_setting',
                'std' => 'custom',
                'choices' => array(
                    array(
                        'value' => 'font',
                        'label' => 'Font Awesome Icon'
                    ),
                    array(
                        'value' => 'custom',
                        'label' => 'Custom Icon'
                    ),
                ),
            ),

            array(
                'id' => 'ut_portfolio_showcase_custom_icon',
                'label' => 'Custom Icon',
                'desc' => 'Upload your custom icon.',
                'type' => 'upload',
                'section' => 'ut_portfolio_settings',
                'subsection' => 'ut_portfolio_showcase_setting',
                'required' => array(
                    'ut_portfolio_showcase_icon_type' => 'custom'
                )
            ),

            array(
                'id' => 'ut_portfolio_showcase_custom_icon_size',
                'section' => 'ut_portfolio_settings',
                'subsection' => 'ut_portfolio_showcase_setting',
                'label' => 'Custom Icon Size',
                'desc' => 'Drag the handle to set the icon width. Default: 40px.',
                'std' => '40',
                'type' => 'numeric-slider',
                'min_max_step' => '40,120,40',
                'required' => array(
                    'ut_portfolio_showcase_icon_type' => 'custom',
                )
            ),







            array(
                'id' => 'ut_portfolio_showcase_font_icon',
                'label' => 'Select Fontawesome Icon',
                'desc' => 'Choose your desired icon.',
                'type' => 'iconpicker',
                'section' => 'ut_portfolio_settings',
                'subsection' => 'ut_portfolio_showcase_setting',
                'required' => array(
                    'ut_portfolio_showcase_icon_type' => 'font'
                )
            ),

            /*
            |--------------------------------------------------------------------------
            | Contact Section Content
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_csection_content_headline',
                'label' => 'Contact Section Content',
                'type' => 'panel_headline',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_content_settings',
            ),

            array(
                'id' => 'ut_csection_content_block',
                'label' => 'Activate Content Block for Contact Section?',
                'desc' => 'We recently introduced Content Blocks to our theme core. By using this option, you can now use content blocks in contact sections.',
                'type' => 'select',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_content_settings',
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
            ),

            array(
                'id' => 'ut_csection_content_block_id',
                'label' => 'Content Block Settings',
                'desc' => 'Content Blocks can be used for different purposes. These blocks are managed centralized and can be deployed to different pages or parts of your website such as the Hero Area. We will use these content blocks as a core feature from now. You can manage your content blocks in your Dashboard > Content Blocks.',
                'type' => 'custom_post_type_select',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_content_settings',
                'post_type' => 'ut-content-block',
                'required' => array(
                    'ut_csection_content_block' => 'on',
                ),
            ),

            array(
                'id' => 'ut_activate_csection',
                'label' => 'Activate Contact Section',
                'desc' => 'You can individually decide if you like to activate or deactivate the contact section per page / portfolio.',
                'type' => 'checkbox',
                'markup' => '1_1',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_content_settings',
                'choices' => array(
                    array(
                        'value' => 'is_front_page',
                        'label' => 'Home'
                    ),
                    array(
                        'value' => 'is_home',
                        'label' => 'Blog'
                    ),
                    array(
                        'value' => 'is_page',
                        'label' => 'Single Pages'
                    ),
                    array(
                        'value' => 'is_single',
                        'label' => 'Single Posts'
                    ),
                    array(
                        'value' => 'is_singular',
                        'label' => 'Single Portfolio Pages'
                    ),
                    array(
                        'value' => 'is_archive',
                        'label' => 'Archive'
                    ),
                    array(
                        'value' => 'ut_is_search',
                        'label' => 'Search'
                    ),
                    array(
                        'value' => 'is_404',
                        'label' => '404'
                    )
                ),
            ),

            array(
                'id' => 'ut_csection_header_slogan',
                'label' => 'Contact Header Slogan',
                'type' => 'textarea-simple',
                'markup' => '1_1',
                'htmldesc' => '&lt;span&gt; word &lt;/span&gt; = highlight word in themecolor',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_content_settings',
                'rows' => '5',
                'required' => array(
                    'ut_csection_content_block' => 'off',
                ),
            ),

            array(
                'id' => 'ut_csection_header_expertise_slogan',
                'label' => 'Contact Header Lead',
                'type' => 'textarea-simple',
                'markup' => '1_1',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_content_settings',
                'rows' => '5',
                'required' => array(
                    'ut_csection_content_block' => 'off',
                ),
            ),

            array(
                'id' => 'ut_csection_header_expertise_slogan_margin_top',
                'label' => 'Contact Header Lead Margin Top',
                'desc' => '<strong>(optional)</strong> - value in px , default: 1px',
                'type' => 'text',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_content_settings',
                'required' => array(
                    'ut_csection_content_block' => 'off',
                ),
            ),

            array(
                'id' => 'ut_left_csection_content_area',
                'label' => 'Left Content Area',
                'desc' => '<p> For example : create a contact form with your desired form generator and insert the shortcode in here. We recommend to make use of Contact Form 7. P.S. This field is also a good place to place a Google map shortcode! Leave empty to hide the complete box. </p>',
                'type' => 'textarea',
                'markup' => '1_1',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_content_settings',
                'rows' => '25',
                'required' => array(
                    'ut_csection_content_block' => 'off',
                ),
            ),

            array(
                'id' => 'ut_right_csection_content_area',
                'label' => 'Right Content Area',
                'desc' => '<p> For example : create a contact form with your desired form generator and insert the shortcode in here. We recommend to make use of Contact Form 7. P.S. This field is also a good place to place a Google map shortcode! Leave empty to hide the complete box. </p>',
                'type' => 'textarea',
                'markup' => '1_1',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_content_settings',
                'rows' => '25',
                'required' => array(
                    'ut_csection_content_block' => 'off',
                ),
            ),

            /*
            |--------------------------------------------------------------------------
            | Contact Section Background
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_contact_background_setting_headline',
                'label' => 'Contact Section Background',
                'type' => 'panel_headline',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_background_settings'
            ),

            array(
                'id' => 'ut_contact_background_setting_headline_info',
                'label' => 'Global Hero Caption',
                'desc' => '<strong>Attention:</strong> These settings do not affect Content Blocks which have been placed inside the contact section.',
                'type' => 'section_headline_info',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_background_settings'
            ),

            array(
                'id' => 'ut_csection_background_type',
                'label' => 'Choose Background Type',
                'desc' => 'Choose between Image, Video or Google Map background.',
                'type' => 'select',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_background_settings',
                'std' => 'image',
                'toplevel' => true,
                'choices' => array(
                    array(
                        'value' => 'image',
                        'label' => 'Image'
                    ),
                    array(
                        'value' => 'map',
                        'label' => 'Google Map'
                    ),
                    array(
                        'value' => 'video',
                        'label' => 'Video'
                    )
                ),
            ),

            array(
                'id' => 'ut_csection_video_source',
                'label' => 'Video Source',
                'desc' => 'Select your desired source for videos.',
                'type' => 'select',
                'std' => 'youtube',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_background_settings',
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
                    'ut_csection_background_type' => 'video'
                )
            ),

            array(
                'id' => 'ut_csection_video',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_background_settings',
                'label' => 'Video URL',
                'desc' => 'Please insert the url only e.g. http://youtu.be/gvt_YFuZ8LA . Please do not insert the complete embedded code!',
                'type' => 'text',
                'required' => array(
                    'ut_csection_background_type' => 'video',
                    'ut_csection_video_source' => 'youtube'
                )
            ),

            array(
                'id' => 'ut_csection_video_mp4',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_background_settings',
                'label' => 'MP4',
                'type' => 'upload',
                'required' => array(
                    'ut_csection_background_type' => 'video',
                    'ut_csection_video_source' => 'selfhosted'
                )
            ),

            array(
                'id' => 'ut_csection_video_ogg',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_background_settings',
                'label' => 'OGG',
                'type' => 'upload',
                'required' => array(
                    'ut_csection_background_type' => 'video',
                    'ut_csection_video_source' => 'selfhosted'
                )
            ),

            array(
                'id' => 'ut_csection_video_webm',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_background_settings',
                'label' => 'WEBM',
                'type' => 'upload',
                'required' => array(
                    'ut_csection_background_type' => 'video',
                    'ut_csection_video_source' => 'selfhosted'
                )
            ),

            array(
                'id' => 'ut_csection_video_loop',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_background_settings',
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
                    'ut_csection_background_type' => 'video'
                )
            ),

            array(
                'id' => 'ut_csection_video_preload',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_background_settings',
                'label' => 'Preload Video',
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
                    'ut_csection_background_type' => 'video',
                    'ut_csection_video_source' => 'selfhosted'
                )
            ),

            array(
                'id' => 'ut_csection_video_sound',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_background_settings',
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
                    'ut_csection_background_type' => 'video'
                )
            ),

            array(
                'id' => 'ut_csection_video_volume',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_background_settings',
                'label' => 'Video Volume',
                'desc' => 'Drag the handle to set the video volume. Default: 5.',
                'std' => '5',
                'type' => 'numeric-slider',
                'min_max_step' => '0,100,1',
                'required' => array(
                    'ut_csection_background_type' => 'video'
                )
            ),

            array(
                'id' => 'ut_csection_video_mute_button',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_background_settings',
                'label' => 'Show Mute Button?',
                'desc' => 'whether the video mute button is displayed or not.',
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
                    'ut_csection_background_type' => 'video'
                )
            ),

            array(
                'id' => 'ut_csection_video_poster',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_background_settings',
                'label' => 'Poster Image',
                'desc' => 'This image will be displayed instead of the video on mobile devices.',
                'type' => 'upload',
                'markup' => '1_1',
                'required' => array(
                    'ut_csection_background_type' => 'video'
                )
            ),

            array(
                'id' => 'ut_csection_background_image',
                'label' => 'Contact Section Background Image',
                'desc' => 'Keep in mind, that you are not able to set a background position or attachment if the parallax option for this section has been set to "on".',
                'type' => 'background',
                'markup' => '1_1',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_background_settings',
                'required' => array(
                    'ut_csection_background_type' => 'image'
                )
            ),

            array(
                'id' => 'ut_csection_parallax',
                'label' => 'Activate Parallax',
                'desc' => 'Parallax involves the background moving at a slower rate to the foreground, creating a 3D effect as you scroll down the page.',
                'std' => 'off',
                'type' => 'select',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_background_settings',
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
                    'ut_csection_background_type' => 'image'
                )
            ),

            array(
                'id' => 'ut_csection_map',
                'label' => 'Google Map Shortcode',
                'desc' => 'We recommend to use the Maps Marker plugin to display maps! Placing a shortcode will overwrite the background image. Also keep in mind, that activating the parallax effect does not work with maps.',
                'type' => 'text',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_background_settings',
                'required' => array(
                    'ut_csection_background_type' => 'map'
                )
            ),


            /*
            |--------------------------------------------------------------------------
            | Contact Section Overlay
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_contact_overlay_setting_headline',
                'label' => 'Contact Section Overlay',
                'type' => 'panel_headline',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_overlay_settings',
                'required' => array(
                    'ut_csection_background_type' => 'image|video'
                )
            ),

            array(
                'id' => 'ut_contact_overlay_setting_headline_info',
                'label' => 'Global Hero Caption',
                'desc' => '<strong>Attention:</strong> These settings do not affect Content Blocks which have been placed inside the contact section.',
                'type' => 'section_headline_info',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_overlay_settings'
            ),

            array(
                'id' => 'ut_csection_overlay',
                'label' => 'Overlay',
                'desc' => '<strong>(optional)</strong> A smooth overlay with optional design patterns.',
                'type' => 'select',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_overlay_settings',
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
                    'ut_csection_background_type' => 'image|video'
                )
            ),

            array(
                'id' => 'ut_csection_overlay_color',
                'label' => 'Overlay Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_overlay_settings',
                'required' => array(
                    'ut_csection_overlay' => 'on',
                    'ut_csection_background_type' => 'image|video'
                )
            ),

            array(
                'id' => 'ut_csection_overlay_opacity',
                'label' => 'Overlay Color Opacity',
                'desc' => 'Drag the handle to set the overlay opacity.',
                'std' => '0.8',
                'type' => 'numeric-slider',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_overlay_settings',
                'min_max_step' => '0,1,0.05',
                'required' => array(
                    'ut_csection_overlay' => 'on',
                    'ut_csection_background_type' => 'image|video'
                )
            ),

            array(
                'id' => 'ut_csection_overlay_pattern',
                'label' => 'Overlay Pattern',
                'desc' => 'Add overlay design pattern.',
                'type' => 'select',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_overlay_settings',
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
                    'ut_csection_overlay' => 'on',
                    'ut_csection_background_type' => 'image|video'
                )
            ),

            array(
                'id' => 'ut_csection_overlay_pattern_style',
                'label' => 'Overlay Pattern Style',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'select',
                'std' => 'style_one',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_overlay_settings',
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
                    'ut_csection_overlay' => 'on',
                    'ut_csection_overlay_pattern' => 'on',
                    'ut_csection_background_type' => 'image|video'
                )
            ),

            /*
            |--------------------------------------------------------------------------
            | Contact Section Border Settings
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_csection_border_setting_headline',
                'label' => 'Contact Section Border Settings',
                'type' => 'panel_headline',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_border_settings'
            ),

            array(
                'id' => 'ut_csection_border_setting_headline_info',
                'label' => 'Global Hero Caption',
                'desc' => '<strong>Attention:</strong> These settings do not affect Content Blocks which have been placed inside the contact section.',
                'type' => 'section_headline_info',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_border_settings'
            ),

            array(
                'id' => 'ut_activate_csection_border',
                'label' => 'Activate Border at Top?',
                'desc' => 'A customized CSS border at the top of the contact section.',
                'type' => 'select',
                'std' => 'off',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_border_settings',
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
                'id' => 'ut_csection_border_color',
                'label' => 'Border Top Color',
                'type' => 'colorpicker',
                'desc' => '<strong>(optional)</strong>',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_border_settings',
                'required' => array(
                    'ut_activate_csection_border' => 'on'
                )
            ),

            array(
                'id' => 'ut_csection_border_width',
                'label' => 'Border Top Width',
                'desc' => 'Drag the handle to set the border width.',
                'type' => 'numeric-slider',
                'min_max_step' => '1,100',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_border_settings',
                'required' => array(
                    'ut_activate_csection_border' => 'on'
                )
            ),

            array(
                'id' => 'ut_csection_border_style',
                'label' => 'Border Top Style',
                'desc' => 'Creates a border at the bottom of the hero.',
                'type' => 'select',
                'std' => 'solid',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_border_settings',
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
                'required' => array(
                    'ut_activate_csection_border' => 'on'
                )
            ),

            array(
                'id' => 'ut_csection_hero_fancy_border_setting_headline',
                'label' => 'Fancy Border Settings',
                'desc' => 'Hero Fancy Border',
                'type' => 'section_headline',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_border_settings'
            ),

            array(
                'id' => 'ut_csection_fancy_border',
                'label' => 'Activate Fancy Border?',
                'desc' => 'Allows you to create a nice fancy border at the bottom of your contact section area.',
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
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_border_settings'
            ),

            array(
                'id' => 'ut_csection_fancy_border_color',
                'label' => 'Primary Color',
                'type' => 'colorpicker',
                'desc' => '<strong>(optional)</strong>',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_border_settings',
                'required' => array(
                    'ut_csection_fancy_border' => 'on'
                )
            ),

            array(
                'id' => 'ut_csection_fancy_border_background_color',
                'label' => 'Secondary Color',
                'type' => 'colorpicker',
                'desc' => '<strong>(optional)</strong>',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_border_settings',
                'required' => array(
                    'ut_csection_fancy_border' => 'on'
                )
            ),

            array(
                'id' => 'ut_csection_fancy_border_size',
                'label' => 'Size',
                'desc' => '<strong>(optional)</strong> -  include "px" in your string. e.g. 30px (default: 10px)',
                'type' => 'text',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_border_settings',
                'required' => array(
                    'ut_csection_fancy_border' => 'on'
                )
            ),


            /*
            |--------------------------------------------------------------------------
            | Contact Section Spacing
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_contact_padding_setting_headline',
                'label' => 'Contact Section Padding',
                'desc' => 'Contact Section Padding',
                'type' => 'panel_headline',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_spacing_settings'
            ),

            array(
                'id' => 'ut_contact_padding_setting_headline_info',
                'label' => 'Global Hero Caption',
                'desc' => '<strong>Attention:</strong> These settings do not affect Content Blocks which have been placed inside the contact section.',
                'type' => 'section_headline_info',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_spacing_settings'
            ),

            array(
                'id' => 'ut_csection_padding_top',
                'label' => 'Contact Section Padding Top',
                'desc' => '<strong>(optional)</strong> - default 80px',
                'type' => 'text',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_spacing_settings'
            ),

            array(
                'id' => 'ut_csection_padding_bottom',
                'label' => 'Contact Section Padding Bottom',
                'desc' => '<strong>(optional)</strong> - default 40px',
                'type' => 'text',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_spacing_settings'
            ),

            /*
            |--------------------------------------------------------------------------
            | Contact Section Color Settings
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_csection_color_setting_headline',
                'label' => 'Contact Section Color Settings',
                'type' => 'panel_headline',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_color_settings'
            ),

            array(
                'id' => 'ut_csection_color_setting_headline_info',
                'label' => 'Global Hero Caption',
                'desc' => '<strong>Attention:</strong> These settings do not affect Content Blocks which have been placed inside the contact section.',
                'type' => 'section_headline_info',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_color_settings'
            ),

            array(
                'id' => 'ut_csection_skin',
                'label' => 'Section Color Skin',
                'desc' => 'If you are planing to use light background images or colors use the dark skin and the other way around. If these skins do not match your requirements, you can define your own colors below. The Dark skin has been made for pure white background in this case.',
                'type' => 'select',
                'std' => 'dark',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_color_settings',
                'choices' => array(
                    array(
                        'label' => 'Light',
                        'value' => 'light'
                    ),
                    array(
                        'label' => 'Dark',
                        'value' => 'dark'
                    )
                ),
            ),

            array(
                'id' => 'ut_csection_background_color',
                'label' => 'Section Background Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_color_settings'
            ),

            array(
                'id' => 'ut_left_csection_content_area_color',
                'label' => 'Left Content Area Background Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_color_settings'
            ),

            array(
                'id' => 'ut_left_csection_content_area_opacity',
                'label' => 'Left Content Area Background Color Opacity',
                'desc' => 'Drag the handle to set the opacity.',
                'std' => '0.8',
                'type' => 'numeric-slider',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_color_settings',
                'min_max_step' => '0,1,0.05'
            ),

            array(
                'id' => 'ut_right_csection_content_area_color',
                'label' => 'Right Content Area Background Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_color_settings',
            ),

            array(
                'id' => 'ut_right_csection_content_area_opacity',
                'label' => 'Right Content Area Background Color Opacity',
                'desc' => 'Drag the handle to set the opacity.',
                'std' => '0.8',
                'type' => 'numeric-slider',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_color_settings',
                'min_max_step' => '0,1,0.05'
            ),



            array(
                'id' => 'ut_csection_submit_button_headline',
                'label' => 'Submit Button Settings',
                'type' => 'section_headline',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_color_settings'
            ),

            array(
                'id' => 'ut_csection_submit_button_border',
                'label' => 'Submit Button Border Radius',
                'desc' => 'By default buttons have a 3px border radius. With the help of this option, you can remove this border radius.',
                'type' => 'select',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_color_settings',
                'std' => 'off',
                'choices' => array(
                    array(
                        'value' => 'on',
                        'label' => 'on'
                    ),
                    array(
                        'value' => 'off',
                        'label' => 'off'
                    ),

                ),

            ),

            array(
                'id' => 'ut_csection_submit_button_text_color',
                'label' => 'Submit Button Text Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_color_settings'
            ),

            array(
                'id' => 'ut_csection_submit_button_color',
                'label' => 'Submit Button Background Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'gradient_colorpicker',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_color_settings'
            ),

            array(
                'id' => 'ut_csection_submit_button_text_color_hover',
                'label' => 'Submit Button Text Hover Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_color_settings'
            ),

            array(
                'id' => 'ut_csection_submit_button_color_hover',
                'label' => 'Submit Button Background Hover Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'gradient_colorpicker',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_color_settings'
            ),

            array(
                'id' => 'ut_csection_submit_button_font_weight',
                'label' => 'Submit Button Font Weight',
                'desc' => 'The font-weight property sets how thick or thin characters in text should be displayed.',
                'type' => 'select',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_color_settings',
                'std' => 'bold',
                'choices' => array(
                    array(
                        'value' => 'normal',
                        'label' => 'normal'
                    ),
                    array(
                        'value' => 'bold',
                        'label' => 'bold'
                    )

                )

            ),

            array(
                'id' => 'ut_csection_submit_button_spacing',
                'label' => 'Submit Button Spacing',
                'type' => 'spacing',
                'desc' => '<strong>(optional)</strong> value in px. 0 = default',
                'field_min_max_step' => '0,80,1',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_color_settings',
            ),


            /*
            |--------------------------------------------------------------------------
            | Advanced Settings
            |--------------------------------------------------------------------------
            */

            /*
            | Section Animation
            */

            array(
                'id' => 'ut_sanimation_setting_headline',
                'label' => 'Section Animation',
                'type' => 'panel_headline',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_sanimation_settings',
            ),

            array(
                'id' => 'ut_google_smooth_scroll',
                'label' => 'Activate Smooth Scroll for Google Chrome?',
                'desc' => 'This option will activate a smooth scroll scripts for chrome browser.',
                'type' => 'select',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_sanimation_settings',
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
            ),

            array(
                'id' => 'ut_scrollto_effect',
                'label' => 'Scroll to Section Effect',
                'desc' => 'This option will activate / deactivate the section scroll animation.',
                'type' => 'easing',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_sanimation_settings',
                'std' => 'easeInOutExpo'
            ),

            array(
                'id' => 'ut_scrollto_speed',
                'label' => 'Scroll to Section Effect Speed',
                'desc' => '<strong>(optional)</strong> - value in ms , default: 650',
                'type' => 'text',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_sanimation_settings',
            ),

            array(
                'id' => 'ut_animate_css_duration',
                'label' => 'CSS Animation Duration',
                'desc' => 'Drag the handle to set the animation duration.',
                'type' => 'numeric-slider',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_sanimation_settings',
                'std' => '1',
                'min_max_step' => '0.1,3,0.1'
            ),

            /*
            | Custom Cursor
            */

            array(
                'id' => 'ut_custom_cursor_settings_headline',
                'label' => 'Custom Cursor',
                'type' => 'panel_headline',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_custom_cursor_settings',
            ),

            array(
                'id' => 'ut_custom_cursor',
                'label' => 'Activate Custom Cursor',
                'desc' => 'This option will activate a custom cursor for the entire website.',
                'type' => 'select',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_custom_cursor_settings',
                'std' => 'off',
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
            ),
	        array(
		        'id' => 'ut_deactivate_browser_cursor',
		        'label' => 'Deactivate Browser Cursor?',
		        'desc' => 'Deactivate the standard browser cursor, so that only the customer remains to navigate on the site.',
		        'type' => 'select',
		        'section' => 'ut_advanced_settings',
		        'subsection' => 'ut_custom_cursor_settings',
		        'std' => 'off',
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
			        'ut_custom_cursor' => 'on'
		        )
	        ),
	        array(
		        'id' => 'ut_custom_cursor_magnify',
		        'label' => 'Activate Magnetic Circle?',
		        'desc' => 'If activated the outer circle will follow the dot. On hover the circle will magnify with the target.',
		        'type' => 'select',
		        'section' => 'ut_advanced_settings',
		        'subsection' => 'ut_custom_cursor_settings',
		        'choices' => array(
			        array(
				        'value' => 'off',
				        'label' => 'no, thank!'
			        ),
			        array(
				        'value' => 'on',
				        'label' => 'yes, please!'
			        )
		        ),
		        'required' => array(
			        'ut_custom_cursor' => 'on'
		        )
	        ),
	        /*array(
		        'id' => 'ut_custom_cursor_magnify_to',
		        'label' => 'Magnify Circle to?',
		        'desc' => 'If activated the outer circle will follow the dot. On hover the circle will magnify with the target.',
		        'type' => 'checkbox',
		        'markup' => '1_1',
		        'section' => 'ut_advanced_settings',
		        'subsection' => 'ut_custom_cursor_settings',
		        'choices' => array(
			        array(
				        'value' => 'navigation',
				        'label' => 'Main Navigation'
			        ),
			        array(
				        'value' => 'links',
				        'label' => 'Links'
			        ),
			        array(
				        'value' => 'buttons',
				        'label' => 'Buttons'
			        ),
			        array(
				        'value' => 'images',
				        'label' => 'Images'
			        ),
			        
		        ),
		        'required' => array(
			        'ut_custom_cursor' => 'on',
			        'ut_custom_cursor_magnify' => 'on'
		        )
	        ), */


            array(
                'id' => 'ut_custom_cursor_contrast',
                'label' => 'Add Contrast (light shadow)?',
                'desc' => 'This can be useful if your site is mostly dark but also has a lot of white parts.',
                'type' => 'select',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_custom_cursor_settings',
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
                    'ut_custom_cursor' => 'on'
                )
            ),
	        array(
		        'id' => 'ut_custom_cursor_base_size',
		        'label' => 'Cursor Outer Circle Size',
		        'desc' => 'Choose between 2 different circle base sizes.',
		        'type' => 'select',
		        'section' => 'ut_advanced_settings',
		        'subsection' => 'ut_custom_cursor_settings',
		        'std' => 'large',
		        'choices' => array(
			        array(
				        'value' => 'large',
				        'label' => 'large'
			        ),
			        array(
				        'value' => 'small',
				        'label' => 'small'
			        ),
		        ),
		        'required' => array(
			        'ut_custom_cursor' => 'on'
		        )
	        ),
	        array(
		        'id' => 'ut_custom_cursor_hover_size',
		        'label' => 'Grow Outer Circle on Hover',
		        'desc' => 'Should outer circle grow on mouse interaction?',
		        'type' => 'select',
		        'section' => 'ut_advanced_settings',
		        'subsection' => 'ut_custom_cursor_settings',
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
			        'ut_custom_cursor' => 'on',
			        'ut_custom_cursor_base_size' => 'small'
		        )
	        ),
	        array(
		        'id' => 'ut_custom_cursor_dot_size',
		        'label' => 'Cursor Dot Size',
		        'desc' => 'Choose between 6 different dot base sizes.',
		        'type' => 'select',
		        'section' => 'ut_advanced_settings',
		        'subsection' => 'ut_custom_cursor_settings',
		        'choices' => array(
			        array(
				        'value' => 'small',
				        'label' => 'small'
			        ),
			        array(
				        'value' => 'medium',
				        'label' => 'medium'
			        ),
			        array(
				        'value' => 'large',
				        'label' => 'large'
			        ),
			        array(
				        'value' => 'xlarge',
				        'label' => 'xlarge'
			        ),
			        array(
				        'value' => 'xxlarge',
				        'label' => 'xxlarge'
			        ),
			        array(
				        'value' => 'full',
				        'label' => 'full (same as small circle size)'
			        )
		        ),
		        'required' => array(
			        'ut_custom_cursor' => 'on'
		        )
	        ),
	        array(
		        'id' => 'ut_custom_cursor_hover_dot_size',
		        'label' => 'Cursor Dot Size on Hover',
		        'desc' => 'Choose between 6 different dot base sizes.',
		        'type' => 'select',
		        'section' => 'ut_advanced_settings',
		        'subsection' => 'ut_custom_cursor_settings',
		        'choices' => array(
			        array(
				        'value' => 'small',
				        'label' => 'small'
			        ),
			        array(
				        'value' => 'medium',
				        'label' => 'medium'
			        ),
			        array(
				        'value' => 'large',
				        'label' => 'large'
			        ),
			        array(
				        'value' => 'xlarge',
				        'label' => 'xlarge'
			        ),
			        array(
				        'value' => 'xxlarge',
				        'label' => 'xxlarge'
			        ),
			        array(
				        'value' => 'full',
				        'label' => 'full (same as small circle size)'
			        )
		        ),
		        'required' => array(
			        'ut_custom_cursor' => 'on'
		        )
	        ),
            array(
                'id' => 'ut_custom_cursor_custom_skin_headline',
                'label' => 'Custom Cursor Skins',
                'type' => 'section_headline',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_custom_cursor_settings',
                'required' => array(
	                'ut_custom_cursor' => 'on'
                )
            ),
	        array(
		        'id' => 'ut_custom_cursor_default_skin',
		        'label' => 'Custom Cursor Default Skin',
		        'desc' => 'This is the global cursor skin. When editing a section or a row, you can set a different skin only applying to that particular section or row. This can be helpful if you work with light and dark sections at the same time.',
		        'type' => 'select',
		        'section' => 'ut_advanced_settings',
		        'subsection' => 'ut_custom_cursor_settings',
		        'std' => 'light',
		        'choices' => apply_filters( 'ot_recognized_custom_cursors', array(
			        array(
				        'value' => 'light',
				        'label' => 'Light'
			        ),
			        array(
				        'value' => 'dark',
				        'label' => 'Dark'
			        )
		        ), 'ut_custom_cursor_default_skin' ),
		        'required' => array(
			        'ut_custom_cursor' => 'on'
		        )
	        ),
            array(
                'id' => 'ut_custom_cursor_custom_skins',
                'label' => 'Custom Cursor Skins',
                'desc' => '',
                'type' => 'list-item',
                'list_title' => false,
                'markup' => '1_1',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_custom_cursor_settings',
                'settings' => array(

	                array(
		                'id' => 'setting_headline',
		                'label' => 'Enter a Skin Title',
		                'type' => 'section_headline',
	                ),

	                array(
		                'id' => 'title',
		                'label' => 'Only for internal use.',
		                'desc' => '',
		                'type' => 'text',
		                'class' => 'option-tree-setting-title',
	                ),

                    array(
                        'id' => 'setting_headline',
                        'label' => 'General',
                        'type' => 'section_headline',
                    ),

                    array(
                        'id' => 'unique_id',
                        'label' => 'ID',
                        'desc' => '',
                        'type' => 'unique_id',
                    ),
	                array(
		                'id' => 'dot_color',
		                'label' => 'Inner Dot Color',
		                'desc' => '',
		                'type' => 'colorpicker',
		                'mode' => 'rgb',
		                'container_class' => 'format-settings-half'
	                ),
	                array(
		                'id' => 'pulse_color',
		                'label' => 'Document Click Pulse Color',
		                'desc' => '',
		                'type' => 'colorpicker',
		                'mode' => 'rgb',
		                'container_class' => 'format-settings-half'
	                ),
	                array(
                        'id' => 'circle_color',
                        'label' => 'Outer Circle Color',
                        'desc' => '',
                        'type' => 'colorpicker',
                        'mode' => 'rgb',
                        'container_class' => 'format-settings-half'
                    ),
	                array(
		                'id' => 'circle_background_color',
		                'label' => 'Outer Background Color',
		                'desc' => '',
		                'type' => 'colorpicker',
		                'mode' => 'rgb',
		                'container_class' => 'format-settings-half'
	                ),
	                array(
		                'id' => 'setting_headline',
		                'label' => 'Link / Image Mouseover Interactions',
		                'type' => 'section_headline',
	                ),
	                array(
		                'id' => 'dot_hover_color',
		                'label' => 'Inner Dot Color',
		                'desc' => '',
		                'type' => 'colorpicker',
		                'mode' => 'rgb',
		                'container_class' => 'format-settings-half'
	                ),
	                array(
		                'id' => 'icon_hover_color',
		                'label' => 'Icon Color',
		                'desc' => '',
		                'type' => 'colorpicker',
		                'mode' => 'rgb',
		                'container_class' => 'format-settings-half'
	                ),
	                array(
		                'id' => 'circle_hover_color',
		                'label' => 'Outer Circle Color',
		                'desc' => '',
		                'type' => 'colorpicker',
		                'mode' => 'rgb',
		                'container_class' => 'format-settings-half'
	                ),
	                array(
		                'id' => 'circle_background_hover_color',
		                'label' => 'Outer Background Color',
		                'desc' => '',
		                'type' => 'colorpicker',
		                'mode' => 'rgb',
		                'container_class' => 'format-settings-half'
	                ),
	                array(
		                'id' => 'setting_headline',
		                'label' => 'Mouse Select Interactions',
		                'type' => 'section_headline',
	                ),
	                array(
		                'id' => 'select_dot_color',
		                'label' => 'Inner Dot Color',
		                'desc' => '',
		                'type' => 'colorpicker',
		                'mode' => 'rgb',
		                'container_class' => 'format-settings-third'
	                ),
	                array(
		                'id' => 'select_circle_color',
		                'label' => 'Outer Circle Color',
		                'desc' => '',
		                'type' => 'colorpicker',
		                'mode' => 'rgb',
		                'container_class' => 'format-settings-third'
	                ),
	                array(
		                'id' => 'select_circle_background_color',
		                'label' => 'Outer Background Color',
		                'desc' => '',
		                'type' => 'colorpicker',
		                'mode' => 'rgb',
		                'container_class' => 'format-settings-third'
	                ),

                ),
                'required' => array(
	                'ut_custom_cursor' => 'on'
                )

            ),


            /*
            | Maintenace Mode
            */

            array(
                'id' => 'ut_maintenace_mode_settings_headline',
                'label' => 'Maintenance Mode',
                'type' => 'panel_headline',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_maintenace_mode_settings',
            ),

            array(
                'id' => 'ut_maintenace_mode',
                'label' => 'Activate Maintenance Mode',
                'desc' => 'This option will activate a maintenace mode for your website.',
                'type' => 'select',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_maintenace_mode_settings',
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
            ),

            array(
                'id' => 'ut_maintenace_mode_text',
                'label' => 'Text',
                'desc' => 'default: "Maintenance Mode"',
                'type' => 'text',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_maintenace_mode_settings'
            ),

            array(
                'id' => 'ut_maintenance_hero_width',
                'label' => 'Content Width',
                'desc' => 'Decide if the hero content gets stretched to fullwidth or displays centered.',
                'type' => 'select',
                'std' => 'center',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_maintenace_mode_settings',
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
                'id' => 'ut_maintenance_hero_align',
                'label' => 'Caption Alignment',
                'desc' => 'Specifies the default alignment for the caption inside the hero.',
                'type' => 'select',
                'std' => 'center',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_maintenace_mode_settings',
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
                'id' => 'ut_maintenance_hero_v_align',
                'label' => 'Caption Vertical Alignment',
                'desc' => 'Specifies the default vertical alignment for the caption inside the hero.',
                'type' => 'select',
                'std' => 'middle',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_maintenace_mode_settings',
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
                'id' => 'ut_maintenance_hero_background_color',
                'label' => 'Background Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_maintenace_mode_settings',
            ),

            array(
                'id' => 'ut_maintenance_hero_background_image',
                'label' => 'Background Image',
                'desc' => 'Keep in mind, that you are not able to set a background position or attachment if the parallax option for this section has been set to "on".',
                'type' => 'background',
                'markup' => '1_1',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_maintenace_mode_settings'
            ),

            array(
                'id' => 'ut_maintenance_hero_overlay',
                'label' => 'Activate Overlay?',
                'desc' => 'Covers your hero with an optional color and 3 different patterns.',
                'std' => 'on',
                'type' => 'select',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_maintenace_mode_settings',
                'choices' => array(
                    array(
                        'value' => 'on',
                        'label' => 'yes, please!',
                    ),
                    array(
                        'value' => 'off',
                        'label' => 'no, thanks!'
                    )
                ) /* end choices */
            ),

            array(
                'id' => 'ut_maintenance_hero_overlay_color',
                'label' => 'Overlay Color',
                'desc' => 'Set your desired overlay color. You can use the handle below to change the color opacity.',
                'type' => 'colorpicker',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_maintenace_mode_settings',
                'required' => array(
                    'ut_maintenance_hero_overlay' => 'on'
                )
            ),

            array(
                'id' => 'ut_maintenance_hero_overlay_color_opacity',
                'label' => 'Overlay Color Opacity',
                'desc' => 'Drag the handle to set the opacity for hero overlay color.',
                'type' => 'numeric-slider',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_maintenace_mode_settings',
                'min_max_step' => '0,1,0.05',
                'required' => array(
                    'ut_maintenance_hero_overlay' => 'on'
                )
            ),

            array(
                'id' => 'ut_maintenance_hero_overlay_pattern',
                'label' => 'Activate Overlay Pattern?',
                'desc' => 'A repeated decorative overlay pattern.',
                'std' => 'on',
                'type' => 'select',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_maintenace_mode_settings',
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
                    'ut_maintenance_hero_overlay' => 'on'
                )
            ),

            array(
                'id' => 'ut_maintenance_hero_overlay_pattern_style',
                'label' => 'Overlay Pattern Style',
                'desc' => '<strong>(optional)</strong>',
                'std' => 'style_one',
                'type' => 'select',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_maintenace_mode_settings',
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
                    'ut_maintenance_hero_overlay' => 'on',
                    'ut_maintenance_hero_overlay_pattern' => 'on'
                )
            ),

            /*
            | Pre Loader
            */

            array(
                'id' => 'ut_loader_setting_headline',
                'label' => 'Manage Preloader',
                'type' => 'panel_headline',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_loader_settings',
            ),

            array(
                'id' => 'ut_use_image_loader',
                'label' => 'Use Image Preloader',
                'desc' => 'This option will activate a JavaScript based preloader.',
                'type' => 'select',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_loader_settings',
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
            ),

            array(
                'id' => 'ut_use_image_loader_on',
                'label' => 'Preloader Exceptions',
                'desc' => 'Activate theme image preloader for the following type of pages.',
                'type' => 'checkbox',
                'markup' => '1_1',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_loader_settings',
                'choices' => array(
                    array(
                        'value' => 'is_front_page',
                        'label' => 'Home'
                    ),
                    array(
                        'value' => 'is_home',
                        'label' => 'Blog'
                    ),
                    array(
                        'value' => 'is_page',
                        'label' => 'Single Pages'
                    ),
                    array(
                        'value' => 'is_single',
                        'label' => 'Single Posts'
                    ),
                    array(
                        'value' => 'is_singular',
                        'label' => 'Single Portfolio Pages'
                    )
                ),
            ),

            array(
                'id' => 'ut_image_loader_style_headline',
                'label' => 'Preloader Settings',
                'type' => 'section_headline',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_loader_settings'
            ),

            array(
                'id' => 'ut_image_loader_style',
                'label' => 'Style',
                'desc' => 'Choose between 10 awesome preloader styles.',
                'type' => 'select',
                'std' => 'style_one',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_loader_settings',
                'choices' => array(
                    array(
                        'value' => 'style_one',
                        'label' => 'Style One (Progress Bar)'
                    ),
                    array(
                        'value' => 'style_two',
                        'label' => 'Style Two (Moving Circle)'
                    ),
                    array(
                        'value' => 'style_three',
                        'label' => 'Style Three (Rotating Square)'
                    ),
                    array(
                        'value' => 'style_four',
                        'label' => 'Style Four (Jumping Dot on Bars)'
                    ),
                    array(
                        'value' => 'style_five',
                        'label' => 'Style Five (Line Up Dots)'
                    ),
                    array(
                        'value' => 'style_six',
                        'label' => 'Style Six (Animating Grid)'
                    ),
                    array(
                        'value' => 'style_seven',
                        'label' => 'Style Seven (Pulsating Dots)'
                    ),
                    array(
                        'value' => 'style_eight',
                        'label' => 'Style Eight (Text Logo only)'
                    ),
                    array(
                        'value' => 'text_draw',
                        'label' => 'Text Draw'
                    ),
                    array(
                        'value' => 'text_background_animation',
                        'label' => 'Text Background Animation'
                    )
                ),

            ),

            array(
                'id' => 'ut_image_loader_background',
                'label' => 'Background Color',
                'desc' => '<strong>(optional)</strong>. Note that Gradient Background Colors do not work a morphed background. See option down below.',
                'type' => 'gradient_colorpicker',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_loader_settings',
            ),

            array(
                'id' => 'ut_image_loader_bar_color',
                'label' => 'Indicator Color',
                'desc' => '<strong>(optional)</strong> - default: accentcolor. Color for the element which visually indicates the loading. If you leave this field empty, the system will use the accentcolor which has been defined inside the theme customizer.',
                'type' => 'colorpicker',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_loader_settings',
                'required' => array(
                    'ut_image_loader_style' => 'style_one|style_two|style_three|style_four|style_five|style_six|style_seven|style_eight|text_background_animation'
                )
            ),

            array(
                'id' => 'ut_image_loader_text_draw_line_color',
                'label' => 'Line Draw Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_loader_settings',
                'required' => array(
                    'ut_image_loader_style' => 'text_draw'
                )
            ),

            array(
                'id' => 'ut_image_loader_text_draw_start_color',
                'label' => 'Text Start Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_loader_settings',
                'required' => array(
                    'ut_image_loader_style' => 'text_draw'
                )
            ),

            array(
                'id' => 'ut_image_loader_text_draw_end_color',
                'label' => 'Text End Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_loader_settings',
                'required' => array(
                    'ut_image_loader_style' => 'text_draw'
                )
            ),

            /* array(
                'id' => 'ut_image_loader_text_draw_slogan',
                'label' => 'Enter Slogan',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'text',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_loader_settings',
                'required' => array(
                    'ut_image_loader_style' => 'text_draw'
                )
            ),*/

            array(
                'id' => 'ut_image_loader_text_draw',
                'label' => 'Enter Title',
                'desc' => '<strong>(required)</strong>',
                'type' => 'text',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_loader_settings',
                'required' => array(
                    'ut_image_loader_style' => 'text_draw|text_background_animation'
                )
            ),
            array(
                'id' => 'ut_image_loader_text_background_image',
                'label' => 'Text Background Animation Image',
                'desc' => '<strong>(required)</strong>. Please upload small images, fitting the text and not over scaled images.',
                'type' => 'upload',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_loader_settings',
                'required' => array(
                    'ut_image_loader_style' => 'text_background_animation'
                )
            ),

            array(
                'id' => 'ut_morph_image_loader',
                'label' => 'Morph Preloader?',
                'desc' => 'Simple morphing page transition for a flowing look. Does not work with Gradient Background Colors.',
                'std' => 'off',
                'type' => 'select',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_loader_settings',
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
            ),

            array(
                'id' => 'ut_morph_image_loader_effect',
                'label' => 'Morph Preloader Effect',
                'desc' => 'Select desired morph effect.',
                'std' => 'ut-fluid-js',
                'type' => 'select',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_loader_settings',
                'choices' => array(
                    array(
                        'value' => 'ut-fluid-js',
                        'label' => 'Fluid'
                    ),
                    array(
                        'value' => 'ut-ballon-js',
                        'label' => 'Balloon'
                    ),
                    array(
                        'value' => 'ut-digital-js',
                        'label' => 'Digital'
                    ),
                    array(
                        'value' => 'ut-water-js',
                        'label' => 'Water'
                    )
                ),
                'required' => array(
                    'ut_morph_image_loader' => 'on'
                )
            ),

            array(
                'id' => 'ut_image_loader_logo_headline',
                'label' => 'Upload Preloader Logo',
                'desc' => 'Upload Preloader Logo',
                'type' => 'section_headline',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_loader_settings',
                'required' => array(
                    'ut_image_loader_style' => 'style_one|style_two|style_three|style_four|style_five|style_six|style_seven'
                )
            ),

            array(
                'id' => 'ut_image_loader_logo',
                'label' => 'Logo',
                'desc' => 'A custom logo for theme preloader.',
                'type' => 'upload',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_loader_settings',
                'required' => array(
                    'ut_image_loader_style' => 'style_one|style_two|style_three|style_four|style_five|style_six|style_seven'
                )
            ),

            array(
                'id' => 'ut_image_loader_logo_max_width',
                'label' => 'Logo Max Width',
                'desc' => 'Drag the handle to set the maximum width.',
                'type' => 'numeric-slider',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_loader_settings',
                'min_max_step' => '50,720,1',
                'required' => array(
                    'ut_image_loader_style' => 'style_one|style_two|style_three|style_four|style_five|style_six|style_seven'
                )
            ),

            array(
                'id' => 'ut_image_loader_font_headline',
                'label' => 'Preloader Loading Text Font Settings',
                'desc' => 'Preloader Loading Text Font Settings',
                'type' => 'section_headline',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_loader_settings',
                'required' => array(
                    'ut_image_loader_style' => 'style_two|style_three|style_four|style_five'
                )
            ),

            array(
                'id' => 'ut_image_loader_text',
                'label' => 'Preloader Loading Text',
                'desc' => '<strong>(optional)</strong> - default: "Loading".',
                'type' => 'text',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_loader_settings',
                'required' => array(
                    'ut_image_loader_style' => 'style_two|style_three|style_four|style_five'
                )
            ),

            array(
                'id' => 'ut_image_loader_text_color',
                'label' => 'Preloader Loading Text Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_loader_settings',
                'required' => array(
                    'ut_image_loader_style' => 'style_two|style_three|style_four|style_five'
                )
            ),

            array(
                'id' => 'ut_image_loader_font',
                'label' => 'Preloader Loading Text Font',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_loader_settings',
                'required' => array(
                    'ut_image_loader_style' => 'style_two|style_three|style_four|style_five'
                )
            ),

            array(
                'id' => 'ut_image_loader_text_margin_top',
                'label' => 'Preloader Loading Text Spacing Top',
                'desc' => 'Drag the handle to set the top spacing value.',
                'type' => 'numeric-slider',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_loader_settings',
                'std' => 20,
                'min_max_step' => '0,100,1',
                'required' => array(
                    'ut_image_loader_style' => 'style_two|style_three|style_four|style_five'
                )
            ),

            array(
                'id' => 'ut_image_loader_percentage_font_headline',
                'label' => 'Preloader Percentage Font Settings',
                'desc' => 'Preloader Percentage Font Settings',
                'type' => 'section_headline',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_loader_settings',
                'required' => array(
                    'ut_image_loader_style' => 'style_one'
                )
            ),

            array(
                'id' => 'ut_image_loader_color',
                'label' => 'Preloader Percentage Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_loader_settings',
                'required' => array(
                    'ut_image_loader_style' => 'style_one'
                )
            ),

            array(
                'id' => 'ut_image_loader_percentage_font',
                'label' => 'Preloader Percentage Text Font',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_loader_settings',
                'required' => array(
                    'ut_image_loader_style' => 'style_one'
                )
            ),

            array(
                'id' => 'ut_show_loader_bar',
                'label' => 'Display Loader Bar',
                'desc' => 'A visual indicator for the loading progress.',
                'std' => 'on',
                'type' => 'select',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_loader_settings',
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
                    'ut_image_loader_style' => 'style_one'
                )
            ),

            array(
                'id' => 'ut_image_loader_barheight',
                'label' => 'Bar Height',
                'desc' => 'Drag the handle to set the desired bar height.',
                'type' => 'numeric-slider',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_loader_settings',
                'min_max_step' => '1,100,1',
                'required' => array(
                    'ut_image_loader_style' => 'style_one',
                    'ut_show_loader_bar' => 'on'
                )
            ),

            array(
                'id' => 'ut_show_loader_percentage',
                'label' => 'Display Loader Percentage',
                'desc' => 'A visual numeric indicator for the loading progress.',
                'std' => 'on',
                'type' => 'select',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_loader_settings',
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
                    'ut_image_loader_style' => 'style_one'
                )
            ),

            array(
                'id' => 'ut_image_loader_font_style_headline',
                'label' => 'Preloader Font Settings',
                'type' => 'section_headline',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_loader_settings',
                'required' => array(
	                'ut_image_loader_style' => 'text_draw|text_background_animation'
                )
            ),

            array(
                'id' => 'ut_image_loader_text_font_type',
                'label' => 'Choose Title Font Source',
                'desc' => sprintf( 'Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
                'type' => 'select',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_loader_settings',
                'std' => 'inherit',
                'choices' => array(
                    array(
                        'value' => 'inherit',
                        'label' => 'Default Font (Body)'
                    ),
                    array(
                        'value' => 'ut-google',
                        'label' => 'Google Font'
                    ),
                    array(
                        'value' => 'ut-websafe',
                        'label' => 'Web Safe Fonts'
                    ),
                    array(
                        'value' => 'ut-font',
                        'label' => 'Brooklyn Theme Font (Raleway)'
                    ),
                    array(
                        'value' => 'ut-custom',
                        'label' => 'Custom Font'
                    )
                ),
                'required' => array(
	                'ut_image_loader_style' => 'text_draw|text_background_animation'
                )
            ),
            array(
                'id' => 'ut_image_loader_text_theme_font_style',
                'label' => 'Title Font Style',
                'type' => 'select',
                'std' => 'semibold',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_loader_settings',
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
	                'ut_image_loader_style' => 'text_draw|text_background_animation',
                	'ut_image_loader_text_font_type' => 'ut-font'
                )
            ),
            array(
                'id' => 'ut_image_loader_text_font_style',
                'label' => 'Title Font Setting',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_loader_settings',
                'required' => array(
	                'ut_image_loader_style' => 'text_draw|text_background_animation',
                	'ut_image_loader_text_font_type' => 'inherit|ut-font'
                )
            ),
            array(
                'id' => 'ut_image_loader_text_google_font_style',
                'label' => 'Title Font Style',
                'type' => 'googlefont',
                'markup' => '1_1',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_loader_settings',
                'required' => array(
	                'ut_image_loader_style' => 'text_draw|text_background_animation',
                	'ut_image_loader_text_font_type' => 'ut-google'
                )
            ),
            array(
                'id' => 'ut_image_loader_text_websafe_font_style',
                'label' => 'Title Font Style',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_loader_settings',
                'required' => array(
	                'ut_image_loader_style' => 'text_draw|text_background_animation',
                	'ut_image_loader_text_font_type' => 'ut-websafe'
                )
            ),

            array(
                'id' => 'ut_image_loader_text_custom_font_style',
                'label' => 'Title Font Style',
                'type' => 'custom_typography',
                'markup' => '1_1',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_loader_settings',
                'required' => array(
	                'ut_image_loader_style' => 'text_draw|text_background_animation',
                	'ut_image_loader_text_font_type' => 'ut-custom'
                )
            ),

            /*
            | System Pages
            */







            /*
            | Custom CSS
            */

            array(
                'id' => 'ut_custom_css_settings_headline',
                'label' => 'Custom CSS',
                'type' => 'panel_headline',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_custom_css_settings',
            ),

            array(
                'id' => 'ut_custom_css',
                'label' => 'Custom CSS',
                'desc' => 'Insert your custom CSS code right in here if you are not planing to use the delivered child theme. This custom CSS will be directly hooked into the wp head right after all other Stylesheets.',
                'type' => 'css',
                'markup' => '1_1',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_custom_css_settings'
            ),

            /*
            | SEO
            */

            array(
                'id' => 'ut_seo_settings_headline',
                'label' => 'SEO',
                'type' => 'panel_headline',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_seo_settings',
            ),

            array(
                'id' => 'ut_deactivate_theme_seo',
                'label' => 'Deactivate Theme SEO?',
                'desc' => 'If you are using a SEO plugin to cover your SEO. You can use this option to deactivate the theme SEO in order to avoid conflicts with the plugin.',
                'std' => 'off',
                'type' => 'select',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_seo_settings',
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
            ),

            array(
                'id' => 'ut_google_analytics',
                'label' => 'Google Analytics ID',
                'desc' => 'Enter your Google Analytics ID here to track your site with Google Analytics. <strong>Please insert ID only!</strong>',
                'type' => 'text',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_seo_settings'
            ),

            array(
                'id' => 'ut_google_analytics_tags',
                'label' => 'Google Tag Manager',
                'desc' => 'Enter your Google Tags Manager ID here to track your site. <strong>Please insert ID only!</strong>',
                'type' => 'text',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_seo_settings'
            ),

            array(
                'id' => 'ut_facebook_pixel_id',
                'label' => 'Facebook-Pixel',
                'desc' => 'Enter your Facebook Pixel ID here to track your site. <strong>Please insert ID only!</strong>',
                'type' => 'text',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_seo_settings'
            ),

            /*
            | API Keys
            */

            array(
                'id' => 'ut_api_keys_transient_headline',
                'label' => 'Clear Transients',
                'type' => 'panel_headline',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_api_keys_settings'
            ),

            array(
                'id' => 'ut_api_keys_transient_flush',
                'label' => 'Clear Transients?',
                'desc' => 'If you are using external APIs the theme caches the results in order to increase the site loading performance. This cache has a lifetime of 1 hour. By using this option, you can flush immediatly. Example: You published a new Tweet on Twitter, it might take up to 1 hour until this tweet will appear on the website since tweets are cached.',
                'type' => 'flush_transients',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_api_keys_settings'
            ),

            array(
                'id' => 'ut_maps_settings_headline',
                'label' => 'Manage API Keys',
                'type' => 'section_headline',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_api_keys_settings',
            ),

            array(
                'id' => 'ut_google_maps_key',
                'label' => 'Google Maps API Key',
                'desc' => sprintf( 'This is your global Google API Key. You can optionally overwrite this key per module. To use the Google Maps JavaScript API, you must register your app project on the Google API Console and get a Google API key which you can add to your app. Get %s now!', '<a target="_blank" href="https://developers.google.com/maps/documentation/javascript/get-api-key#key">Get API Key</a>. Please also make sure to activate the Geocoding API, for this API not extra Key is needed.' ),
                'type' => 'text',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_api_keys_settings'
            ),

            /*array(
                'id' => 'ut_twitter_options',
                'label' => 'Twitter API Keys',
                'desc' => sprintf( 'Please go to %s and create a new APP for your Website. Make sure that Request Type has been set to "GET" inside the "OAuth Tool" tab. Learn more about the new Twitter API here %s and here %s', '<a href="https://dev.twitter.com/apps">Twitter Developer Apps</a>', '<a href="https://dev.twitter.com/docs/auth/oauth/faq">OAuth FAQ</a>', '<a href="https://dev.twitter.com/">Twitter Developer</a>' ),
                'type' => 'twitter_options',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_api_keys_settings'
            ),*/

            /*
            |--------------------------------------------------------------------------
            | Cache Options - needs overwork
            |--------------------------------------------------------------------------

            array(
                'id'          => 'ut_cache_setting_headline',
                'label'       => 'One Page Cache',
                'type'        => 'panel_headline',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_cache_settings',
            ),

            array(
                'id'          => 'ut_use_cache',
                'label'       => 'Use Cache',
                'desc'        => 'This option will cache your one page. We recommend to turn this option off when developing the site or adding new content. This cache stores CSS / JS and the main Query for our frontpage. For more and advanced caching options please use a Cache Plugin.',
                'type'        => 'select',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_cache_settings',
                'std'          => 'off',
                'choices'     => array(
                    array(
                        'value'       => 'off',
                        'label'       => 'off'
                    ),
                    array(
                        'value'       => 'on',
                        'label'       => 'on'
                    )
                ),
            ),

            array(
                'id'          => 'ut_cache_ltime',
                'label'       => 'Cache Lifetime',
                'desc'        => 'In Minutes, for example : 10',
                'type'        => 'text',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_cache_settings',
            ), */


            /*
            |--------------------------------------------------------------------------
            | Lightbox Options
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_lightbox_setting_headline',
                'label' => 'Lightbox Settings',
                'type' => 'panel_headline',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_lightbox_settings',
            ),

            array(
                'id'          => 'ut_lightgallery_type',
                'label'       => 'Lightbox Type',
                'desc'        => 'Lightgallery or Morph Lightbox? Morph Lightbox only support images, when a video is in place, the default LightGallery displays.',
                'type'        => 'select',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_lightbox_settings',
                'std'         => 'lightgallery',
                'choices'     => array(
                    array(
                        'value'       => 'lightgallery',
                        'label'       => 'Lightgallery (default)'
                    ),
                    array(
                        'value'       => 'morphbox',
                        'label'       => 'Morph Lightbox'
                    )
                ),
            ),

            array(
                'id' => 'ut_morphbox_transition',
                'label' => 'Morphbox Transition Duration',
                'desc' => 'Drag the handle to set the transition duration of the morph effect.',
                'type' => 'numeric-slider',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_lightbox_settings',
                'std' => 1200,
                'min_max_step' => '400,2000,100',
                'required' => array(
                    'ut_lightgallery_type' => 'morphbox'
                )
            ),

            array(
                'id' => 'ut_morphbox_effect',
                'label' => 'Morphbox Effect',
                'desc' => 'Choose desired Morphbox Effect. More effects are coming soon.',
                'type' => 'select',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_lightbox_settings',
                'std' => 'wobble',
                'choices' => array(
                    array(
                        'value' => 'wobble',
                        'label' => 'Wobble (default)'
                    ),
                    array(
                        'value' => 'laser',
                        'label' => 'Laser'
                    )
                ),
                'required' => array(
                    'ut_lightgallery_type' => 'morphbox'
                )
            ),
	        array(
		        'id'          => 'ut_lightgallery_effect',
		        'label'       => 'Lightbox Transition',
		        'desc'        => 'Type of transition between images',
		        'type'        => 'select',
		        'section'     => 'ut_advanced_settings',
		        'subsection'  => 'ut_lightbox_settings',
		        'std'         => 'lg-slide',
		        'choices'     => array(

			        array(
				        'value'       => 'lg-slide',
				        'label'       => 'Slide'
			        ),
			        array(
				        'value'       => 'lg-tube',
				        'label'       => 'Tube'
			        ),
			        array(
				        'value'       => 'lg-fade',
				        'label'       => 'Fade'
			        ),
			        array(
				        'value'       => 'lg-zoom-in',
				        'label'       => 'Zoom In'
			        ),
			        array(
				        'value'       => 'lg-zoom-in-big',
				        'label'       => 'Zoom In Big'
			        ),
			        array(
				        'value'       => 'lg-zoom-out',
				        'label'       => 'Zoom Out'
			        ),
			        array(
				        'value'       => 'lg-zoom-out-big',
				        'label'       => 'Zoom Out Big'
			        ),
			        array(
				        'value'       => 'lg-zoom-out-in',
				        'label'       => 'Zoom Out In'
			        ),
			        array(
				        'value'       => 'lg-zoom-in-out',
				        'label'       => 'Zoom Out In Out'
			        ),
			        array(
				        'value'       => 'lg-soft-zoom',
				        'label'       => 'Soft Zoom'
			        ),
			        array(
				        'value'       => 'lg-scale-up',
				        'label'       => 'Scale Up'
			        ),
			        array(
				        'value'       => 'lg-slide-circular',
				        'label'       => 'Slide Circular'
			        ),
			        array(
				        'value'       => 'lg-slide-circular-vertical',
				        'label'       => 'Slide Circular Vertical'
			        ),
			        array(
				        'value'       => 'lg-slide-vertical',
				        'label'       => 'Slide Vertical'
			        ),
			        array(
				        'value'       => 'lg-slide-vertical-growth',
				        'label'       => 'Slide Vertical Growth'
			        ),
			        array(
				        'value'       => 'lg-slide-skew-only',
				        'label'       => 'Slide Skew Only'
			        ),
			        array(
				        'value'       => 'lg-slide-skew-only-rev',
				        'label'       => 'Slide Skew Only Rev'
			        ),
			        array(
				        'value'       => 'lg-slide-skew-only-y',
				        'label'       => 'Slide Skew Only Y'
			        ),
			        array(
				        'value'       => 'lg-slide-skew-only-rev',
				        'label'       => 'Slide Skew Only Rev'
			        ),
			        array(
				        'value'       => 'lg-slide-skew-only-y-rev',
				        'label'       => 'Slide Skew Only Y Rev'
			        ),
			        array(
				        'value'       => 'lg-slide-skew',
				        'label'       => 'Slide Skew'
			        ),
			        array(
				        'value'       => 'lg-slide-skew-rev',
				        'label'       => 'Slide Skew Rev'
			        ),
			        array(
				        'value'       => 'lg-slide-skew-cross',
				        'label'       => 'Slide Skew Cross'
			        ),
			        array(
				        'value'       => 'lg-slide-skew-cross-rev',
				        'label'       => 'Slide Skew Cross Rev'
			        ),
			        array(
				        'value'       => 'lg-slide-skew-ver',
				        'label'       => 'Slide Skew Ver'
			        ),
			        array(
				        'value'       => 'lg-slide-skew-ver-rev',
				        'label'       => 'Slide Skew Ver Rev'
			        ),
			        array(
				        'value'       => 'lg-slide-skew-ver-cross',
				        'label'       => 'Slide Skew Ver Cross'
			        ),
			        array(
				        'value'       => 'lg-slide-skew-ver-cross-rev',
				        'label'       => 'Slide Skew Ver Cross Rev'
			        ),
			        array(
				        'value'       => 'lg-lollipop',
				        'label'       => 'Lollipop'
			        ),
			        array(
				        'value'       => 'lg-lollipop-rev',
				        'label'       => 'Lollipop Rev'
			        ),
			        array(
				        'value'       => 'lg-rotate',
				        'label'       => 'Rotate'
			        ),
			        array(
				        'value'       => 'lg-rotate-rev',
				        'label'       => 'Rotate Rev'
			        ),


		        ),
		        'required' => array(
			        'ut_lightgallery_type' => 'lightgallery'
		        )

	        ),
            array(
                'id'          => 'ut_lightgallery_download',
                'label'       => 'Enable download button in Lightbox?',
                'desc'        => 'You can optionally allow images to be downloaded from your lightbox.',
                'type'        => 'select',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_lightbox_settings',
                'std'         => 'off',
                'choices'     => array(
                    array(
                        'value'       => 'false',
                        'label'       => 'off'
                    ),
                    array(
                        'value'       => 'true',
                        'label'       => 'on'
                    )
                ),
                'required' => array(
                    'ut_lightgallery_type' => 'lightgallery'
                )
            ),
            array(
                'id'          => 'ut_enqueue_froogaloop',
                'label'       => 'Enqueue Froogaloop for Vimeo in Lightbox?',
                'desc'        => 'If you are using Vimeo Videos in your Lightbox, please activate this option.',
                'type'        => 'select',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_lightbox_settings',
                'std'         => 'off',
                'choices'     => array(
                    array(
                        'value'       => 'off',
                        'label'       => 'off'
                    ),
                    array(
                        'value'       => 'on',
                        'label'       => 'on'
                    )
                ),
            ),

            // Modules Custom Fields Font
            array(
                'id' => 'ut_lightbox_headline',
                'label' => 'Lightbox Caption Font',
                'desc' => 'Lightbox Caption Font',
                'type' => 'section_headline',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_lightbox_settings',
            ),
            array(
                'id' => 'ut_lightbox_caption_color',
                'label' => 'Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_lightbox_settings',
                'required' => array(
                    'ut_lightgallery_type' => 'lightgallery'
                )
            ),

            array(
                'id' => 'ut_morphbox_caption_color',
                'label' => 'Color',
                'desc' => 'RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_lightbox_settings',
                'required' => array(
                    'ut_lightgallery_type' => 'morphbox'
                )
            ),

            array(
                'id' => 'ut_morphbox_caption_background',
                'label' => 'Background Color',
                'desc' => 'Can be overwritten per image inside the Media Library. RGBA Color. <br />You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_lightbox_settings',
                'required' => array(
                    'ut_lightgallery_type' => 'morphbox'
                )
            ),
            array(
                'id' => 'ut_morphbox_font_style',
                'label' => 'Morphbox Title Font Setting',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_lightbox_settings',
                'required' => array(
                    'ut_lightbox_font_type' => 'inherit',
                    'ut_lightgallery_type' => 'morphbox'
                )
            ),
            array(
                'id' => 'ut_lightbox_font_type',
                'label' => 'Choose Caption Font Source',
                'desc' => sprintf( 'Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
                'type' => 'select',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_lightbox_settings',
                'std' => 'inherit',
                'choices' => array(
                    array(
                        'value' => 'inherit',
                        'label' => 'Default Font'
                    ),
                    array(
                        'value' => 'ut-google',
                        'label' => 'Google Font'
                    ),
                    array(
                        'value' => 'ut-websafe',
                        'label' => 'Web Safe Fonts'
                    ),
                    array(
                        'value' => 'ut-font',
                        'label' => 'Brooklyn Theme Font (Raleway)'
                    ),
                    array(
                        'value' => 'ut-custom',
                        'label' => 'Custom Font'
                    )
                ),
                'required' => array(
                    'ut_lightgallery_type' => 'lightgallery'
                )
            ),
            array(
                'id' => 'ut_lightbox_font_style',
                'label' => 'Lightbox Caption Font Setting',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_lightbox_settings',
                'required' => array(
                    'ut_lightbox_font_type' => 'inherit',
                    'ut_lightgallery_type' => 'lightgallery'
                )
            ),
            array(
                'id' => 'ut_lightbox_google_font_style',
                'label' => 'Lightbox Caption Font Style',
                'type' => 'googlefont',
                'markup' => '1_1',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_lightbox_settings',
                'required' => array(
                    'ut_lightbox_font_type' => 'ut-google',
                    'ut_lightgallery_type' => 'lightgallery'
                )
            ),
            array(
                'id' => 'ut_lightbox_websafe_font_style',
                'label' => 'Lightbox Caption Font Style',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_lightbox_settings',
                'required' => array(
                    'ut_lightbox_font_type' => 'ut-websafe',
                    'ut_lightgallery_type' => 'lightgallery'
                )
            ),
            array(
                'id' => 'ut_lightbox_theme_font_style',
                'label' => 'Lightbox Caption Font Style',
                'type' => 'select',
                'std' => 'semibold',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_lightbox_settings',
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
                    'ut_lightbox_font_type' => 'ut-font',
                    'ut_lightgallery_type' => 'lightgallery'
                )
            ),
            array(
                'id' => 'ut_lightbox_custom_font_style',
                'label' => 'Lightbox Caption Font Style',
                'type' => 'custom_typography',
                'markup' => '1_1',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_lightbox_settings',
                'required' => array(
                    'ut_lightbox_font_type' => 'ut-custom',
                    'ut_lightgallery_type' => 'lightgallery'
                )
            ),




            /*
            |--------------------------------------------------------------------------
            | Visual Composer Options
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_spacing_settings_headline',
                'label' => 'Content Spacing Settings',
                'type' => 'panel_headline',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_content_spacing_settings'
            ),

            array(
                'id' => 'ut_section_spacing_system',
                'label' => 'Select Default Section Spacing',
                'desc' => 'The theme has an automated way to calculate the default spacings between sections. With the help of this option you can adjust the default spacing. This setting can be individually overwritten by the section settings themselves. Default: 80. Note: This does not affect single posts.',
                'type' => 'select',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_content_spacing_settings',
                'std' => '120',
                'choices' => array(
                    array(
                        'value' => '200',
                        'label' => '200 / 80'
                    ),
                    array(
                        'value' => '160',
                        'label' => '160 / 80'
                    ),
                    array(
                        'value' => '120',
                        'label' => '120 / 80'
                    ),
                    array(
                        'value' => '80',
                        'label' => '80 / 80'
                    )
                ),
            ),

            array(
                'id' => 'ut_site_custom_width',
                'label' => 'Site Custom Content Width',
                'desc' => '<strong>(optional)</strong> - enter an alternate site content width. Value in pixel e.g. 1600px. default: 1200px',
                'type' => 'numeric_slider',
                'std' => '1200',
                'min_max_step' => '960,2200,1',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_content_spacing_settings'
            ),

            array(
                'id' => 'ut_blog_with_hero_settings_headline',
                'label' => 'Blog with Hero',
                'type' => 'section_headline',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_content_spacing_settings'
            ),

            array(
                'id' => 'ut_blog_spacing_top',
                'label' => 'Padding Top',
                'type' => 'text',
                'desc' => 'include "px" in your string. e.g. 150px (default: 80px)',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_content_spacing_settings'
            ),

            array(
                'id' => 'ut_blog_spacing_bottom',
                'label' => 'Padding Bottom',
                'type' => 'text',
                'desc' => 'include "px" in your string. e.g. 150px (default: 60px)',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_content_spacing_settings'
            ),

            array(
                'id' => 'ut_blog_without_hero_settings_headline',
                'label' => 'Blog without Hero',
                'type' => 'section_headline',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_content_spacing_settings'
            ),

            array(
                'id' => 'ut_blog_no_hero_spacing_top',
                'label' => 'Padding Top',
                'type' => 'text',
                'desc' => 'include "px" in your string. e.g. 150px (default: 80px)',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_content_spacing_settings'
            ),

            array(
                'id' => 'ut_blog_no_hero_spacing_bottom',
                'label' => 'Padding Bottom',
                'type' => 'text',
                'desc' => 'include "px" in your string. e.g. 150px (default: 60px)',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_content_spacing_settings'
            ),

            array(
                'id' => 'ut_page_with_hero_settings_headline',
                'label' => 'Page with Hero',
                'type' => 'section_headline',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_content_spacing_settings'
            ),

            array(
                'id' => 'ut_page_spacing_top',
                'label' => 'Padding Top',
                'type' => 'text',
                'desc' => 'include "px" in your string. e.g. 150px (default: 80px). Only works on pages, where Visual Composer is not being used.',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_content_spacing_settings'
            ),

            array(
                'id' => 'ut_page_spacing_bottom',
                'label' => 'Padding Bottom',
                'type' => 'text',
                'desc' => 'include "px" in your string. e.g. 150px (default: 60px). Only works on pages, where Visual Composer is not being used.',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_content_spacing_settings'
            ),

            array(
                'id' => 'ut_page_without_hero_settings_headline',
                'label' => 'Page without Hero',
                'type' => 'section_headline',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_content_spacing_settings'
            ),

            array(
                'id' => 'ut_page_no_hero_spacing_top',
                'label' => 'Padding Top',
                'type' => 'text',
                'desc' => 'include "px" in your string. e.g. 150px (default: 80px). Only works on pages, where Visual Composer is not being used.',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_content_spacing_settings'
            ),

            array(
                'id' => 'ut_page_no_hero_spacing_bottom',
                'label' => 'Padding Bottom',
                'type' => 'text',
                'desc' => 'include "px" in your string. e.g. 150px (default: 60px). Only works on pages, where Visual Composer is not being used.',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_content_spacing_settings'
            ),


            /*
            |--------------------------------------------------------------------------
            | Mailchimp Color Settings
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_mailchimp_settings_headline',
                'label' => 'Mailchimp Settings',
                'type' => 'panel_headline',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_mailchimp_settings'
            ),

            array(
                'id' => 'ut_mailchimp_color_skins',
                'label' => 'Mailchimp Color Skins',
                'desc' => sprintf( 'Create as many Mail Chimp Form Skins as you need. This option set is only for forms created with %s. Once you created a skin, please edit your mailchimp form, switch to the "Appearance" tab and select your skin.', '<a href="https://mc4wp.com/" target="_blank">Mailchimp for WordPress</a>' ),
                'type' => 'list-item',
                'list_title' => false,
                'markup' => '1_1',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_mailchimp_settings',
                'settings' => array(

                    array(
                        'id' => 'setting_headline',
                        'label' => 'General',
                        'type' => 'section_headline',
                    ),

                    array(
                        'id' => 'title',
                        'label' => 'Enter a Skin Title',
                        'desc' => 'Used for internal use.',
                        'type' => 'text',
                        'class' => 'option-tree-setting-title',
                    ),

                    array(
                        'id' => 'unique_id',
                        'label' => 'ID',
                        'desc' => '',
                        'type' => 'unique_id',
                    ),

                    array(
                        'id' => 'label_color',
                        'label' => 'Label Text Color',
                        'desc' => '',
                        'type' => 'colorpicker',
                        'mode' => 'rgb',
                    ),

                    array(
                        'id' => 'setting_headline',
                        'label' => 'Input Size',
                        'type' => 'section_headline',
                    ),

                    array(
                        'id' => 'email_input_size',
                        'label' => 'Email Input Size',
                        'desc' => 'Drag the handle to set the email input width. Value in %',
                        'type' => 'numeric-slider',
                        'section' => 'ut_advanced_settings',
                        'subsection' => 'ut_loader_settings',
                        'std' => 100,
                        'min_max_step' => '10,100,1'
                    ),

                    array(
                        'id' => 'email_input_spacing',
                        'label' => 'Email Input Padding.',
                        'desc' => 'Value in px. 0 = default',
                        'type' => 'spacing',
                        'min_max_step' => '0,40,1'
                    ),

                    array(
                        'id' => 'email_input_border_radius',
                        'label' => 'Email Input Border Radius',
                        'desc' => 'Drag the handle to set the border radius.',
                        'type' => 'numeric-slider',
                        'section' => 'ut_advanced_settings',
                        'subsection' => 'ut_loader_settings',
                        'std' => 20,
                        'min_max_step' => '0,20,1'
                    ),

                    array(
                        'id' => 'setting_headline',
                        'label' => 'Input Colors',
                        'type' => 'section_headline',
                    ),

                    array(
                        'id' => 'input_text_color',
                        'label' => 'Input Text Color',
                        'desc' => '',
                        'type' => 'colorpicker',
                        'mode' => 'rgb',
                    ),

                    array(
                        'id' => 'input_background_color',
                        'label' => 'Input Background Color',
                        'desc' => '',
                        'type' => 'colorpicker',
                        'mode' => 'rgb',
                    ),

                    array(
                        'id' => 'input_border_color',
                        'label' => 'Input Border Color',
                        'desc' => '',
                        'type' => 'colorpicker',
                        'mode' => 'rgb',
                    ),

                    array(
                        'id' => 'setting_headline',
                        'label' => 'Input Focus Colors',
                        'type' => 'section_headline',
                    ),

                    array(
                        'id' => 'input_text_color_focus',
                        'label' => 'Input Focus Text Color',
                        'desc' => '',
                        'type' => 'colorpicker',
                        'mode' => 'rgb',
                    ),

                    array(
                        'id' => 'input_background_color_focus',
                        'label' => 'Input Focus Background Color',
                        'desc' => '',
                        'type' => 'colorpicker',
                        'mode' => 'rgb',
                    ),

                    array(
                        'id' => 'input_border_color_focus',
                        'label' => 'Input Focus Border Color',
                        'desc' => '',
                        'type' => 'colorpicker',
                        'mode' => 'rgb',
                    ),

                    array(
                        'id' => 'setting_headline',
                        'label' => 'Submit Button Colors',
                        'label' => 'Submit Button Colors',
                        'type' => 'section_headline',
                    ),

                    array(
                        'id' => 'submit_button_size',
                        'label' => 'Select Button Font Size.',
                        'desc' => '',
                        'type' => 'select',
                        'std' => 'normal',
                        'choices' => array(
                            array(
                                'value' => 'mini',
                                'label' => 'Mini'
                            ),
                            array(
                                'value' => 'small',
                                'label' => 'Small'
                            ),
                            array(
                                'value' => 'normal',
                                'label' => 'Normal'
                            ),
                            array(
                                'value' => 'large',
                                'label' => 'large'
                            )
                        ),
                    ),

                    array(
                        'id' => 'submit_button_spacing',
                        'label' => 'Select Button Padding.',
                        'desc' => 'Value in px. 0 = default',
                        'type' => 'spacing',
                        'min_max_step' => '0,80,1'
                    ),

                    array(
                        'id' => 'submit_button_text_color',
                        'label' => 'Submit Button Text Color',
                        'desc' => '',
                        'type' => 'colorpicker',
                        'mode' => 'rgb',
                    ),

                    array(
                        'id' => 'submit_button_background_color',
                        'label' => 'Submit Button Background Color',
                        'desc' => '',
                        'type' => 'gradient_colorpicker',
                        'mode' => 'rgb',
                    ),

                    array(
                        'id' => 'submit_button_text_color_hover',
                        'label' => 'Submit Button Hover Text Color',
                        'desc' => '',
                        'type' => 'colorpicker',
                        'mode' => 'rgb',
                    ),

                    array(
                        'id' => 'submit_button_background_color_hover',
                        'label' => 'Submit Button Hover Background Color',
                        'desc' => '',
                        'type' => 'gradient_colorpicker',
                        'mode' => 'rgb',
                    ),

                    array(
                        'id' => 'setting_headline',
                        'label' => 'Submit Button Border',
                        'label' => 'Submit Button Border',
                        'type' => 'section_headline',
                    ),

                    array(
                        'id' => 'submit_button_border_color',
                        'label' => 'Submit Button Border Color',
                        'desc' => '',
                        'type' => 'colorpicker',
                        'mode' => 'rgb',
                    ),

                    array(
                        'id' => 'submit_button_hover_border_color',
                        'label' => 'Submit Button Hover Border Color',
                        'desc' => '',
                        'type' => 'colorpicker',
                        'mode' => 'rgb',
                    ),

                    array(
                        'id' => 'submit_button_border_style',
                        'label' => 'Select Border Style.',
                        'type' => 'select',
                        'std' => 'solid',
                        'choices' => array(
                            array(
                                'value' => 'solid',
                                'label' => 'solid'
                            ),
                            array(
                                'value' => 'dashed',
                                'label' => 'dashed'
                            ),
                            array(
                                'value' => 'dotted',
                                'label' => 'dotted'
                            ),
                            array(
                                'value' => 'double',
                                'label' => 'double'
                            )
                        ),
                    ),

                    array(
                        'id' => 'submit_button_border_width',
                        'label' => 'Border Width',
                        'desc' => 'Drag the handle to set the border width.',
                        'type' => 'numeric-slider',
                        'section' => 'ut_advanced_settings',
                        'subsection' => 'ut_loader_settings',
                        'std' => 0,
                        'min_max_step' => '0,50,1'
                    ),

                    array(
                        'id' => 'submit_button_border_radius',
                        'label' => 'Border Radius',
                        'desc' => 'Drag the handle to set the border radius.',
                        'type' => 'numeric-slider',
                        'section' => 'ut_advanced_settings',
                        'subsection' => 'ut_loader_settings',
                        'std' => 20,
                        'min_max_step' => '0,50,1'
                    ),

                    array(
                        'id' => 'submit_button_font_weight',
                        'label' => 'Submit Button Font Weight',
                        'desc' => 'The font-weight property sets how thick or thin characters in text should be displayed.',
                        'type' => 'select',
                        'std' => 'bold',
                        'choices' => array(
                            array(
                                'value' => 'normal',
                                'label' => 'normal'
                            ),
                            array(
                                'value' => 'bold',
                                'label' => 'bold'
                            )

                        )

                    ),

                ),

            ),

            /*
            |--------------------------------------------------------------------------
            | Performance Settings
            |--------------------------------------------------------------------------
            */

            array(
                'id'          => 'ut_performance_settings_headline',
                'label'       => 'Performance Settings',
                'type'        => 'panel_headline',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_performance_settings'
            ),

            array(
                'id'          => 'ut_deactivate_postcustom',
                'label'       => 'Deactivate custom fields meta box?',
                'desc'        => 'This option can improve the WordPress post editor performance.',
                'type'        => 'select',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_performance_settings',
                'std'         => 'on',
                'choices'     => array(
                    array(
                        'value'       => 'off',
                        'label'       => 'no, thanks!'
                    ),
                    array(
                        'value'       => 'on',
                        'label'       => 'yes, please!'
                    )
                ),
            ),

            array(
                'id'          => 'ut_deactivate_emojis',
                'label'       => 'Disables the WordPress emoji functionality?',
                'desc'        => 'GDPR friendly.',
                'type'        => 'select',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_performance_settings',
                'std'         => 'on',
                'choices'     => array(
                    array(
                        'value'       => 'off',
                        'label'       => 'no, thanks!'
                    ),
                    array(
                        'value'       => 'on',
                        'label'       => 'yes, please!'
                    )
                ),
            ),

            array(
                'id'          => 'ut_deactivate_minify',
                'label'       => 'Deactivate Minification?',
                'desc'        => 'By default, the theme outputs minified CSS / JS files and inline code. If you are a developer, you might to deactivate this feature while developing. We highly recommned leaving this option untouched as long as you know what this option is for.',
                'type'        => 'select',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_performance_settings',
                'std'         => 'off',
                'choices'     => array(
                    array(
                        'value'       => 'off',
                        'label'       => 'no, thanks!'
                    ),
                    array(
                        'value'       => 'on',
                        'label'       => 'yes, please!'
                    )
                ),
            ),

	        /*
			|--------------------------------------------------------------------------
			| Compatibility Settings
			|--------------------------------------------------------------------------
			*/

	        array(
		        'id'         => 'ut_compatibility_settings_headline',
		        'label'      => 'Compatibility Settings',
		        'type'       => 'panel_headline',
		        'section'    => 'ut_advanced_settings',
		        'subsection' => 'ut_compatibility_settings'
	        ),

	        array(
		        'id'         => 'ut_deactivate_fast_image_size',
		        'label'      => 'Deactivate Fast Image Size?',
		        'desc'       => 'If your server does not support curl or has limited curl, the fast image size detection of the theme can cause timeouts. Please deactivate the fast image sizing in this case.',
		        'type'       => 'select',
		        'section'    => 'ut_advanced_settings',
		        'subsection' => 'ut_compatibility_settings',
		        'std'        => 'off',
		        'choices'    => array(
			        array(
				        'value' => 'off',
				        'label' => 'no, thanks!'
			        ),
			        array(
				        'value' => 'on',
				        'label' => 'yes, please!'
			        )
		        ),
	        ),



	        /*
			|--------------------------------------------------------------------------
			| CDN Settings
			|--------------------------------------------------------------------------


	        array(
		        'id'          => 'ut_cdn_settings_headline',
		        'label'       => 'CDN Settings',
		        'type'        => 'panel_headline',
		        'section'     => 'ut_advanced_settings',
		        'subsection'  => 'ut_cdn_settings'
	        ),

	        array(
		        'id'          => 'ut_cdn_upload_path',
		        'label'       => 'CDN Upload Path.',
		        'desc'        => 'Please enter your cdn upload folder path without trailing slash. Such as: "cdn.domain.com/wp-content". Please make sure to activate compression and expire headers to the CDN.',
		        'type'        => 'text',
		        'section'     => 'ut_advanced_settings',
		        'subsection'  => 'ut_cdn_settings',
	        ),

	        array(
		        'id'          => 'ut_cdn_theme_path',
		        'label'       => 'CDN Theme Path.',
		        'desc'        => 'By default this value is "brooklyn". If you are using a different theme path, enter it here. This is not necessary if you are using a child theme.',
		        'type'        => 'text',
		        'section'     => 'ut_advanced_settings',
		        'subsection'  => 'ut_cdn_settings',

	        ), */



        )

    );

    /* allow settings to be filtered before saving */
    return apply_filters( 'ut_theme_option_settings', $ut_settings );

}

add_action( 'admin_init', '_ut_theme_options' );


function _ut_get_theme_options_submenu( $panel_id, $sub_loading = false, $sub_id = false ) {

    if ( empty( $panel_id ) ) {
        return;
    }

    $_ut_theme_options = _ut_theme_options();

    foreach ( $_ut_theme_options['sections'] as $section ) {

        if ( $section['id'] == $panel_id ) {

            if( $sub_loading ) {

                $sub_loading = array();

                if( $sub_id ) {

                    foreach( $section['subsections'] as $key => $subsection ) {

                        if( $subsection['id'] == $sub_id ) {

                            $sub_loading[] = $section['subsections'][$key];

                        }

                    }

                    if( empty( $sub_loading ) ) {

                        $sub_loading[] = $section['subsections'][0];

                    }

                } else {

                    $sub_loading[] = $section['subsections'][0];

                }

                return $sub_loading;

            } else {

                return $section['subsections'];
            }

        }

    }

}