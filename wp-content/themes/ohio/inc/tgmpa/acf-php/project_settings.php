<?php if (function_exists('acf_add_local_field_group')) :

    acf_add_local_field_group([
        "key" => "group_59391f245236d2",
        "title" => __('Project Settings', 'ohio'),
        "private" => true,
        "fields" => [
            [
                "key" => "field_5937e0a52b48cexmod33",
                "label" => "",
                "name" => "",
                "type" => "message",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "message" => '<p class="message">' . '<span class="dashicons dashicons-editor-help"></span>' . __('To find more portfolio project settings navigate to', 'ohio') . '&nbsp;<a target="_blank" href="./admin.php?page=ohio_hub_settings&options_page=theme-general-portfolio">' . __('Global Theme Settings', 'ohio') . '</a></p>',
                "new_lines" => "",
                "esc_html" => 0
            ],
            [
                "key" => "field_593dbedc58835",
                "label" => __('Project page layout', 'ohio'),
                "name" => "project_layout_type",
                "type" => "image_option",
                "instructions" => __('Choose layout type for project page', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "image_option_value" => [
                    [
                        "name" => "inherit",
                        "description" => __('Use from Theme Settings', 'ohio'),
                        "src" => "acf__image_inherited.svg"
                    ],
                    [
                        "name" => "type_1",
                        "description" => __('Details with Left Gallery', 'ohio'),
                        "src" => "acf__image_27.svg"
                    ],
                    [
                        "name" => "type_2",
                        "description" => __('Details with Right Gallery', 'ohio'),
                        "src" => "acf__image_26.svg"
                    ],
                    [
                        "name" => "type_3",
                        "description" => __('Split Screen Left Gallery', 'ohio'),
                        "src" => "acf__image_29.svg"
                    ],
                    [
                        "name" => "type_4",
                        "description" => __('Split Screen Right Gallery', 'ohio'),
                        "src" => "acf__image_28.svg"
                    ],
                    [
                        "name" => "type_5",
                        "description" => __('Slider with Details', 'ohio'),
                        "src" => "acf__image_30.svg"
                    ],
                    [
                        "name" => "type_6",
                        "description" => __('Slider with Custom Details', 'ohio'),
                        "src" => "acf__image_31.svg"
                    ],
                    [
                        "name" => "type_7",
                        "description" => __('Details with Bottom Gallery', 'ohio'),
                        "src" => "acf__image_32.svg"
                    ],
                    [
                        "name" => "type_8",
                        "description" => __('Asymmetric with Custom Details', 'ohio'),
                        "src" => "acf__image_33.svg"
                    ],
                    [
                        "name" => "type_9",
                        "description" => __('Slider with Centered Details', 'ohio'),
                        "src" => "acf__image_44.svg"
                    ]
                ],
                "default_value" => "inherit"
            ],
            [
                "key" => "field_592fd66622a41amodagg",
                "label" => __('Custom content position', 'ohio'),
                "name" => "project_custom_content_position",
                "type" => "select",
                "instructions" => __('Choose WPBakery/Elementor builders content position', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_593dbedc5a7fe",
                            "operator" => "!=",
                            "value" => "none"
                        ],
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "type_1"
                        ]
                    ]
                ],
                "choices" => [
                    "inherit" => __('Use from Theme Settings', 'ohio'),
                    "top" => __('Top - Before content', 'ohio'),
                    "after_description" => __('Center - After description', 'ohio'),
                    "bottom" => __('Bottom - After content', 'ohio')
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "top",
                "return_format" => "value"
            ],
            [
                "key" => "field_593dbedc5a7fe",
                "label" => __('Navigation', 'ohio'),
                "name" => "project_show_navigation",
                "type" => "radio",
                "instructions" => __('Choose portfolio navigation type', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "choices" => [
                    "inherit" => __('Use from Theme Settings', 'ohio'),
                    "none" => __('Without navigation', 'ohio'),
                    "prev_n_next" => __('Next and preview', 'ohio')
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => [
                    "inherit"
                ],
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_593dbedc5b780",
                "label" => __('Double width', 'ohio'),
                "name" => "project_style_in_grid",
                "type" => "radio",
                "instructions" => __('Make double width for this portfolio item', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "choices" => [
                    "default" => __('Default - 1 column width', 'ohio'),
                    "2col" => __('Wide - 2 column width', 'ohio')
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "default",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_5937a0a24fa34hnof",
                "label" => '<h4>' . __('Slider Settings', 'ohio') . '</h4>',
                "name" => "",
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "inherit"
                        ],
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "type_1"
                        ],
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "type_2"
                        ],
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "type_3"
                        ],
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "type_4"
                        ]
                    ]
                ],
                "type" => "message"
            ],
            [
                "key" => "field_592fd66622a41amodagg",
                "label" => __('Custom content position', 'ohio'),
                "name" => "project_custom_content_position",
                "type" => "select",
                "instructions" => __('Choose WPBakery/Elementor builders content position', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_593dbedc5a7fe",
                            "operator" => "!=",
                            "value" => "none"
                        ],
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "type_1"
                        ]
                    ]
                ],
                "choices" => [
                    "inherit" => __('Use from Theme Settings', 'ohio'),
                    "top" => __('Top - Before content', 'ohio'),
                    "after_description" => __('Center - After description', 'ohio'),
                    "bottom" => __('Bottom - After content', 'ohio')
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "top",
                "return_format" => "value"
            ],
            [
                "key" => "field_59fb4w13tfgdfse3s",
                "label" => __('Gallery scrolling effect', 'ohio'),
                "name" => "project_gallery_scrolling_effect",
                "type" => "select",
                "instructions" => __('Choose main gallery scrolling effect', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fd6662265c",
                            "operator" => "!=",
                            "value" => "type_1"
                        ],
                        [
                            "field" => "field_592fd6662265c",
                            "operator" => "!=",
                            "value" => "type_2"
                        ],
                        [
                            "field" => "field_592fd6662265c",
                            "operator" => "!=",
                            "value" => "type_3"
                        ],
                        [
                            "field" => "field_592fd6662265c",
                            "operator" => "!=",
                            "value" => "type_4"
                        ]
                    ]
                ],
                "choices" => [
                    "inherit" => __('Use from Theme Settings', 'ohio'),
                    "parallax" => __('Parallax', 'ohio'),
                    "scale" => __('Scale', 'ohio')
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "inherit",
                "return_format" => "value"
            ],
            [
                "key" => "field_59fb4b093lgdfse2",
                "label" => __('Navigation', 'ohio'),
                "name" => "project_nav_visibility",
                "type" => "inherited_checkbox",
                "instructions" => __('Show navigation buttons on the project slider', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "inherit"
                        ],
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "type_1"
                        ],
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "type_2"
                        ],
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "type_3"
                        ],
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "type_4"
                        ]
                    ]
                ],
                "custom_labels" => [
                    "inherit" => __('Use from Theme Settings', 'ohio'),
                    "show" => __('Show', 'ohio'),
                    "hide" => __('Hide', 'ohio')
                ],
                "message" => "",
                "default_value" => "inherit",
                "ui" => 1,
                "ui_on_text" => "",
                "ui_off_text" => ""
            ],
            [
                "key" => "field_5923k4obl393bw",
                "label" => __('Bullets', 'ohio'),
                "name" => "project_bullets_visibility",
                "type" => "inherited_checkbox",
                "instructions" => __('Show bullets bar on the project slider', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "inherit"
                        ],
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "type_1"
                        ],
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "type_2"
                        ],
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "type_3"
                        ],
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "type_4"
                        ]
                    ]
                ],
                "custom_labels" => [
                    "inherit" => __('Use from Theme Settings', 'ohio'),
                    "show" => __('Show', 'ohio'),
                    "hide" => __('Hide', 'ohio')
                ],
                "message" => "",
                "default_value" => "inherit",
                "ui" => 1,
                "ui_on_text" => "",
                "ui_off_text" => "",
                "return_format" => "value"
            ],
            [
                "key" => "field_59fb4w1kbjg2jir1f3",
                "label" => __('Bullets type', 'ohio'),
                "name" => "project_bullets_type",
                "type" => "select",
                "instructions" => __('Choose bullets or number pagination on the project slider', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5923k4obl393bw",
                            "operator" => "==",
                            "value" => 1
                        ]
                    ]
                ],
                "choices" => [
                    "pagination" => __('Pagination', 'ohio'),
                    "bullets" => __('Bullets', 'ohio')
                ],
                "default_value" => [
                    "pagination"
                ],
                "allow_null" => 0,
                "multiple" => 0,
                "ui" => 0,
                "ajax" => 0,
                "return_format" => "value",
                "placeholder" => ""
            ],
            [
                "key" => "field_59fb434rgth4kn0ythj994",
                "label" => __('Loop mode', 'ohio'),
                "name" => "project_loop_mode",
                "type" => "inherited_checkbox",
                "instructions" => __('Enable loop mode for the project slider', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "inherit"
                        ],
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "type_1"
                        ],
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "type_2"
                        ],
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "type_3"
                        ],
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "type_4"
                        ]
                    ]
                ],
                "custom_labels" => [
                    "inherit" => __('Use from Theme Settings', 'ohio'),
                    "yes" => __('Enable', 'ohio'),
                    "no" => __('Disable', 'ohio')
                ],
                "message" => "",
                "default_value" => "inherit",
                "ui" => 1,
                "ui_on_text" => "",
                "ui_off_text" => ""
            ],
            [
                "key" => "field_594gerhkn56ok2pop",
                "label" => __('Autoplay mode', 'ohio'),
                "name" => "project_autoplay_mode",
                "type" => "inherited_checkbox",
                "instructions" => __('Enable autoplay mode for the project slider', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "inherit"
                        ],
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "type_1"
                        ],
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "type_2"
                        ],
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "type_3"
                        ],
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "type_4"
                        ]
                    ]
                ],
                "custom_labels" => [
                    "inherit" => __('Use from Theme Settings', 'ohio'),
                    "yes" => __('Enable', 'ohio'),
                    "no" => __('Disable', 'ohio')
                ],
                "message" => "",
                "default_value" => "inherit",
                "ui" => 1,
                "ui_on_text" => "",
                "ui_off_text" => ""
            ],
            [
                "key" => "field_59erbvdfdkbk4io2okn1nj",
                "label" => __('Autoplay interval timeout', 'ohio'),
                "name" => "project_autoplay_interval",
                "type" => "number",
                "instructions" => __('Set up autoplay interval timeout for the project slider', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_594gerhkn56ok2pop",
                            "operator" => "==",
                            "value" => 1
                        ]
                    ]
                ],
                "default_value" => 5000,
                "placeholder" => "",
                "prepend" => "",
                "append" => "Ms"
            ],
            [
                "key" => "field_egetrgwelnl54oopkgpo",
                "label" => __('Mouse wheel scroll', 'ohio'),
                "name" => "project_mousewheel_mode",
                "type" => "inherited_checkbox",
                "instructions" => __('Enable mouse wheel scroll for the project slider', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "inherit"
                        ],
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "type_1"
                        ],
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "type_2"
                        ],
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "type_3"
                        ],
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "type_4"
                        ]
                    ]
                ],
                "custom_labels" => [
                    "inherit" => __('Use from Theme Settings', 'ohio'),
                    "yes" => __('Enable', 'ohio'),
                    "no" => __('Disable', 'ohio')
                ],
                "message" => "",
                "default_value" => "inherit",
                "ui" => 1,
                "ui_on_text" => "",
                "ui_off_text" => ""
            ],
            [
                "key" => "field_egetrgwery53k93jvh8rpos",
                "label" => __('Overlay color', 'ohio'),
                "name" => "project_color_overlay",
                "type" => "ohio_color",
                "instructions" => __('Choose color overlay for main image', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "inherit"
                        ],
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "type_1"
                        ],
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "type_2"
                        ],
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "type_3"
                        ],
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "type_4"
                        ]
                    ]
                ],
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => "",
                "ui_off_text" => ""
            ],
            [
                "key" => "field_5937gj5kn3309b09a",
                "label" => '<h4>' . __('Project page typography', 'ohio') . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_lk3obp0g0jnf41hnj44",
                "label" => __('Project title typography', 'ohio'),
                "name" => "project_title_typography",
                "instructions" => __('Set up typography styles for title', 'ohio'),
                "type" => "ohio_typo",
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_kg894kg9ckjdj3v04jgi432",
                "label" => __('Show project categories?', 'ohio'),
                "name" => "project_show_categories",
                "type" => "true_false",
                "instructions" => __('If enabled, project categories are shown', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "ui" => 1,
                "default_value" => 1,
                "new_lines" => "",
                "esc_html" => 0
            ],
            [
                "key" => "field_lnll401kkhn3a34nf41hnj44",
                "label" => __('Project category typography', 'ohio'),
                "name" => "project_category_typography",
                "instructions" => __('Set up typography styles for categories', 'ohio'),
                "type" => "ohio_typo",
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_kg894kg9ckjdj3v04jgi432",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_kg894kmb94jkg92f09aoisoj34",
                "label" => __('Show project date?', 'ohio'),
                "name" => "project_show_date",
                "type" => "true_false",
                "instructions" => __('If enabled, project date is shown', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "ui" => 1,
                "default_value" => 1,
                "new_lines" => "",
                "esc_html" => 0
            ],
            [
                "key" => "field_lnll401kkmr30rkwovkeanf41hnj44",
                "label" => __('Project date typography', 'ohio'),
                "name" => "project_date_typography",
                "instructions" => __('Set up typography styles for date', 'ohio'),
                "type" => "ohio_typo",
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_kg894kmb94jkg92f09aoisoj34",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_kg894kg9l3kmgmbklkaj323",
                "label" => __('Show project description?', 'ohio'),
                "name" => "project_show_description",
                "type" => "true_false",
                "instructions" => __('If enabled, project description is shown', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "ui" => 1,
                "default_value" => 1,
                "new_lines" => "",
                "esc_html" => 0
            ],
            [
                "key" => "field_lnlkh34oofkgm399gk3nnn3",
                "label" => __('Project description typography', 'ohio'),
                "name" => "project_description_typography",
                "instructions" => __('Set up typography styles for description', 'ohio'),
                "type" => "ohio_typo",
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_kg894kg9l3kmgmbklkaj323",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "add_theme_inherited" => false
            ],
			[
                "key" => "field_kg894kg9l3kmgmbklkaj3233trg",
                "label" => __('Show project task?', 'ohio'),
                "name" => "project_show_task",
                "type" => "true_false",
                "instructions" => __('If enabled, project task is shown', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "ui" => 1,
                "default_value" => 1,
                "new_lines" => "",
                "esc_html" => 0
            ],
            [
                "key" => "field_lnlkh34oofkgm399gk3nnn3ert34",
                "label" => __('Project task typography', 'ohio'),
                "name" => "project_task_typography",
                "instructions" => __('Set up typography styles for task', 'ohio'),
                "type" => "ohio_typo",
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_kg894kg9l3kmgmbklkaj3233trg",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_kg894kkb3kdl1o345b5jbkalwbvna",
                "label" => __('Show project details?', 'ohio'),
                "name" => "project_show_details",
                "type" => "true_false",
                "instructions" => __('If enabled, project details are shown', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "ui" => 1,
                "default_value" => 1,
                "new_lines" => "",
                "esc_html" => 0
            ],
            [
                "key" => "field_lnll401kkmhgope4k3wovkeanf41hnj44",
                "label" => __('Project details typography', 'ohio'),
                "name" => "project_details_typography",
                "instructions" => __('Set up typography styles for details', 'ohio'),
                "type" => "ohio_typo",
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_kg894kkb3kdl1o345b5jbkalwbvna",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_kg894kg9l3fgiak400hoalgkk",
                "label" => __('Show project link?', 'ohio'),
                "name" => "project_show_link",
                "type" => "true_false",
                "instructions" => __('If enabled, project link is shown', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "ui" => 1,
                "default_value" => 1,
                "new_lines" => "",
                "esc_html" => 0
            ],
            [
                "key" => "field_lnlkh34oofk3g90ao1343",
                "label" => __('Project link typography', 'ohio'),
                "name" => "project_link_typography",
                "instructions" => __('Set up typography styles for project link', 'ohio'),
                "type" => "ohio_typo",
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_kg894kg9l3fgiak400hoalgkk",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_egetrgwery5kop3kfk13sdgasdg",
                "label" => __('Video button color', 'ohio'),
                "name" => "project_grid_video_btn_bg",
                "type" => "ohio_color",
                "instructions" => __('Choose video button color', 'ohio'),
                "required" => 0,
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => "",
                "ui_off_text" => ""
            ],
            [
                "key" => "field_59fb4312b343615asohigi",
                "label" => __('Project video button style', 'ohio'),
                "name" => "project_video_button_style",
                "type" => "select",
                "instructions" => __('Choose video button style', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "choices" => [
                    "inherit" => __('Use from Theme Settings', 'ohio'),
                    "default" => __('Default', 'ohio'),
                    "outline" => __('Outline', 'ohio')
                ],
                "default_value" => [
                    "inherit"
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "layout" => "horizontal",
                "return_format" => "value"
            ],
        ],
        "location" => [
            [
                [
                    "param" => "post_type",
                    "operator" => "==",
                    "value" => "ohio_portfolio"
                ]
            ]
        ],
        "menu_order" => 1,
        "position" => "acf_after_title",
        "style" => "default",
        "label_placement" => "left",
        "instruction_placement" => "label",
        "hide_on_screen" => "",
        "active" => 1,
        "description" => ""
    ]);

endif;
