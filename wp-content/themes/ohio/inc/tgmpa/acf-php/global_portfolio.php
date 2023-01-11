<?php if (function_exists('acf_add_local_field_group')) :

    acf_add_local_field_group([
        "key" => "group_592fd665c6552",
        "title" => __('Protfolio Settings', 'ohio'),
        "private" => true,
        "fields" => [
            [
                "key" => "field_592fe6046937d",
                "label" => __('General', 'ohio'),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_5937e0a52b48cexmod155",
                "label" => "",
                "name" => "",
                "type" => "message",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "message" => '<p class="message">' . '<span class="dashicons dashicons-editor-help"></span>' . __('These settings apply to all the pages of your site. Use local Page Settings to override some options for individual pages.', 'ohio') . '</p>',
                "new_lines" => "",
                "esc_html" => 0
            ],
            [
                "key" => "field_59fa4344b383615",
                "label" => __('Portfolio layout', 'ohio'),
                "name" => "global_portfolio_item_layout_type",
                "type" => "image_option",
                "instructions" => __('Choose layout type for portfolio items', 'ohio'),
                "conditional_logic" => 0,
                "default_value" => "grid_1",
                "image_option_value" => [
                    [
                        "name" => "grid_1",
                        "description" => __('Classic grid', 'ohio'),
                        "src" => "acf__image_portfolio_01.svg"
                    ],
                    [
                        "name" => "grid_2",
                        "description" => __('Minimal grid', 'ohio'),
                        "src" => "acf__image_portfolio_02.svg"
                    ],
                    [
                        "name" => "grid_11",
                        "description" => __('Caption cursor grid', 'ohio'),
                        "src" => "acf__image_portfolio_43.svg"
                    ],
                    [
                        "name" => "grid_3",
                        "description" => __('Slider with horizontal scroll', 'ohio'),
                        "src" => "acf__image_portfolio_03.svg"
                    ],
                    [
                        "name" => "grid_4",
                        "description" => __('Slider with vertical scroll', 'ohio'),
                        "src" => "acf__image_portfolio_04.svg"
                    ],
                    [
                        "name" => "grid_5",
                        "description" => __('Split screen with smooth scroll', 'ohio'),
                        "src" => "acf__image_portfolio_05.svg"
                    ],
                    [
                        "name" => "grid_6",
                        "description" => __('Carousel with horizontal scroll', 'ohio'),
                        "src" => "acf__image_portfolio_06.svg"
                    ],
                    [
                        "name" => "grid_7",
                        "description" => __('Onepage with smooth scroll', 'ohio'),
                        "src" => "acf__image_portfolio_07.svg"
                    ],
                    [
                        "name" => "grid_8",
                        "description" => __('Interactive links', 'ohio'),
                        "src" => "acf__image_portfolio_42.svg"
                    ],
                    [
                        "name" => "grid_9",
                        "description" => __('Scattered with smooth scroll', 'ohio'),
                        "src" => "acf__image_portfolio_37.svg"
                    ],
                    [
                        "name" => "grid_10",
                        "description" => __('Centered with smooth scroll', 'ohio'),
                        "src" => "acf__image_portfolio_38.svg"
                    ],
                    [
                        "name" => "grid_12",
                        "description" => __('Vertical interactive links', 'ohio'),
                        "src" => "acf__image_portfolio_45.svg"
                    ]
                ]
            ],
            [
                "key" => "field_59fa41123412345",
                "label" => __('Portfolio hover effect', 'ohio'),
                "name" => "global_portfolio_grid_hover",
                "type" => "select",
                "instructions" => __('Choose hover effect type for portfolio items', 'ohio'),
                "default_value" => "type1",
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_3"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_4"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_5"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_6"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_7"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_8"
                        ]
                    ]
                ],
                "choices" => [
                    "type1" => __('Image Scaling', 'ohio'),
                    "type2" => __('Color Overlay', 'ohio'),
                    "type3" => __('Greyscale', 'ohio'),
                    "type4" => __('Image Parallax', 'ohio')
                ]
            ],
            [
                "key"=> "field_59fb4w121284912hjfol",
                "label"=> "Portfolio tilt hover effect",
                "name"=> "global_portfolio_tilt_effect",
                "type"=> "true_false",
                "instructions"=> "Enable tilt hover effect for portfolio items",
                "required"=> 0,
                "conditional_logic"=> [
                    [
                        [
                            "field"=> "field_59fa4344b383615",
                            "operator"=> "!=",
                            "value"=> "grid_1"
                        ],
                        [
                            "field"=> "field_59fa4344b383615",
                            "operator"=> "!=",
                            "value"=> "grid_2"
                        ],
                        [
                            "field"=> "field_59fa4344b383615",
                            "operator"=> "!=",
                            "value"=> "grid_8"
                        ],
                        [
                            "field"=> "field_59fa4344b383615",
                            "operator"=> "!=",
                            "value"=> "grid_11"
                        ],
                        [
                            "field"=> "field_59fa4344b383615",
                            "operator"=> "!=",
                            "value"=> "grid_12"
                        ]
                    ]
                ],
                "message"=> "",
                "default_value"=> 1,
                "ui"=> 1,
                "ui_on_text"=> "",
                "ui_off_text"=> ""
            ],
            [
                "key" => "field_592fd66v12ffaqwba22c",
                "label" => __('Portfolio thumbnail size', 'ohio'),
                "name" => "global_portfolio_images_size",
                "type" => "select",
                "instructions" => __('Choose image size for portfolio items', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "choices" => [
                    "thumbnail" => __('Thumbnail', 'ohio'),
                    "medium" => __('Small', 'ohio'),
                    "medium_large" => __('Medium', 'ohio'),
                    "large" => __('Large', 'ohio'),
                    "ohio_full" => __('Original', 'ohio')
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "medium_large",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_59fb4313b383615",
                "label" => __('Portfolio grid spacing', 'ohio'),
                "name" => "global_portfolio_grid_items_without_padding",
                "type" => "true_false",
                "instructions" => __('Remove spacing between grid items', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_3"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_4"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_5"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_6"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_7"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_8"
                        ]
                    ]
                ],
                "message" => "",
                "default_value" => 0,
                "ui" => 1,
                "ui_on_text" => "",
                "ui_off_text" => ""
            ],
            [
                "key" => "field_5937a0a253d23s15fa",
                "label" => '<h4>' . __('Number of Projects', 'ohio') . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_59fb4334a433615",
                "label" => __('Portfolio items per page', 'ohio'),
                "name" => "global_portfolio_projects_per_page",
                "type" => "number",
                "instructions" => __('Choose number of portfolio items per page', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => 12,
                "placeholder" => "",
                "prepend" => "",
                "append" => __('projects', 'ohio'),
                "min" => 1,
                "max" => 250,
                "step" => 1
            ],
            [
                "key" => "field_59fb4313b343615",
                "label" => __('Portfolio items per row', 'ohio'),
                "name" => "global_portfolio_columns_in_row",
                "type" => "ohio_columns",
                "instructions" => __('Choose number of portfolio items per row', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_3"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_4"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_5"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_7"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_8"
                        ]
                    ]
                ],
                "default_value" => "2-2-1"
            ],

            [
                "key" => "field_59fb4312b343615asdasd",
                "label" => __('Video button style', 'ohio'),
                "name" => "global_portfolio_video_button_style",
                "type" => "select",
                "instructions" => __('Choose video button style', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "choices" => [
                    "default" => __('Default', 'ohio'),
                    "outline" => __('Outline', 'ohio')
                ],
                "default_value" => [
                    "default"
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_5937a0a25fd23s15gh",
                "label" => '<h4>' . __('Grid Appear Effect', 'ohio') . '</h4>',
                "name" => "",
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_3"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_4"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_5"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_6"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_7"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_8"
                        ]
                    ]
                ],
                "type" => "message"
            ],
            [
                "key" => "field_59fb4312b343615",
                "label" => __('Grid animation', 'ohio'),
                "name" => "global_portfolio_page_animation_type",
                "type" => "select",
                "instructions" => __('Choose grid animation type', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_3"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_4"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_5"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_6"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_7"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_8"
                        ]
                    ]
                ],
                "choices" => [
                    "default" => __('Disable animation', 'ohio'),
                    "sync" => __('Sync animation', 'ohio'),
                    "async" => __('Async animation', 'ohio')
                ],
                "default_value" => [
                    "default"
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_59fb4332b343615",
                "label" => __('Grid animation effect', 'ohio'),
                "name" => "global_portfolio_page_animation_effect",
                "type" => "select",
                "instructions" => __('Choose portfolio items appearance effect', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59fb4312b343615",
                            "operator" => "!=",
                            "value" => "default"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_3"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_4"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_5"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_6"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_7"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_8"
                        ]
                    ]
                ],
                "choices" => [
                    "fade-up" => __('Fade up', 'ohio'),
                    "fade-left" => __('Fade left', 'ohio'),
                    "fade-right" => __('Fade right', 'ohio'),
                    "slide-up" => __('Slide up', 'ohio'),
                    "flip-up" => __('Flip up', 'ohio'),
                    "zoom-in" => __('Zoom in', 'ohio')
                ],
                "default_value" => [
                    "fade-up"
                ],
                "allow_null" => 0,
                "multiple" => 0,
                "ui" => 0,
                "ajax" => 0,
                "return_format" => "value",
                "placeholder" => ""
            ],
            [
                "key" => "field_59fb4332b34323fresdaw",
                "label" => __('Grid animation repeat', 'ohio'),
                "name" => "global_portfolio_page_animation_once",
                "type" => "true_false",
                "instructions" => __('Repeat animation while scrolling page up and down', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59fb4312b343615",
                            "operator" => "!=",
                            "value" => "default"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_3"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_4"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_5"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_6"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_7"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_8"
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
                "key" => "field_5937a0a253d23s15fa",
                "label" => '<h4>' . __('Project Cards / Slides', 'ohio') . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_59f2342343s83615",
                "label" => __('Metro style', 'ohio'),
                "name" => "global_portfolio_metro_style",
                "type" => "true_false",
                "instructions" => __('Convert projects image to a square', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_3"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_4"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_5"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_6"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_7"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_8"
                        ]
                    ]
                ],
                "message" => "",
                "default_value" => 0,
                "ui" => 1,
                "ui_on_text" => "",
                "ui_off_text" => ""
            ],
            [
                "key" => "field_592d60af8fb80c",
                "label" => __('Boxed layout', 'ohio'),
                "name" => "global_portfolio_items_boxed_style",
                "type" => "true_false",
                "instructions" => __('Use boxed layout for portfolio items', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_2"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_3"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_4"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_5"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_6"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_7"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_8"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_11"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_12"
                        ]
                    ]
                ],
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio'),
                "message" => "",
                "default_value" => 1
            ],
            [
                "key" => "field_59392323423423523",
                "label" => __('Background color', 'ohio'),
                "name" => "global_portfolio_grid_background_color",
                "type" => "ohio_color",
                "instructions" => __('Choose background color', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_3"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_4"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_5"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_6"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_7"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_8"
                        ]
                    ]
                ]
            ],
            [
                "key" => "field_59392398832343d98",
                "label" => __('Overlay color', 'ohio'),
                "name" => "global_portfolio_grid_overlay_color",
                "type" => "ohio_color",
                "instructions" => __('Choose overlay background color', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0
            ],
            [
                "key" => "field_59392398832343d99",
                "label" => __('Video button color', 'ohio'),
                "name" => "global_portfolio_grid_video_btn_bg",
                "type" => "ohio_color",
                "instructions" => __('Choose video button color', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0
            ],
            [
                "key" => "field_59392398832343457hd",
                "label" => __('Text background color', 'ohio'),
                "name" => "global_portfolio_grid_description_overlay_color",
                "type" => "ohio_color",
                "instructions" => __('Choose portfolio details background color', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "==",
                            "value" => "grid_11"
                        ],
                        [
                            "field"=> "field_59fa4344b383615",
                            "operator"=> "==",
                            "value"=> "grid_12"
                        ]
                    ]
                ]
            ],
            [
                "key" => "field_593f2445fbsdf2",
                "label" => __('Project card alignment', 'ohio'),
                "name" => "global_projects_text_alignment",
                "type" => "select",
                "instructions" => __('Choose text alignment for blog items', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_3"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_4"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_5"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_6"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_7"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_8"
                        ]
                    ]
                ],
                "choices" => [
                    "left" => __('Left', 'ohio'),
                    "center" => __('Center', 'ohio'),
                    "right" => __('Right', 'ohio')
                ],
                "default_value" => [
                    "left"
                ],
                "allow_null" => 0,
                "multiple" => 0,
                "ui" => 0,
                "ajax" => 0,
                "return_format" => "value",
                "placeholder" => ""
            ],
            [
                "key" => "field_5937a0a25fd35gh",
                "label" => '<h4>' . __('Slider Settings', 'ohio') . '</h4>',
                "name" => "",
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_1"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_2"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_8"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_11"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_12"
                        ]
                    ]
                ],
                "type" => "message"
            ],
            [
                "key" => "field_59fb4w123s2g1ase2",
                "label" => __('Navigation', 'ohio'),
                "name" => "global_portfolio_nav_visibility",
                "type" => "true_false",
                "instructions" => __('Show navigation buttons on portfolio items', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_1"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_2"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_8"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_11"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_12"
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
                "key" => "field_eg345345sdafasf",
                "label" => __('Navigation color', 'ohio'),
                "name" => "global_portfolio_nav_color",
                "type" => "ohio_color",
                "instructions" => __('Choose a navigation color for the main slider', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59fb4w123s2g1ase2",
                            "operator" => "==",
                            "value" => "1"
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
                "key" => "field_59fb4w123s2g2f4w",
                "label" => __('Bullets', 'ohio'),
                "name" => "global_portfolio_bullets_visibility",
                "type" => "true_false",
                "instructions" => __('Show bullets bar on portfolio items', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_1"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_2"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_8"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_11"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_12"
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
                "key" => "field_eg345345sdafas2342",
                "label" => __('Bullets color', 'ohio'),
                "name" => "global_portfolio_bullets_color",
                "type" => "ohio_color",
                "instructions" => __('Choose bullets color for the main slider', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59fb4w123s2g2f4w",
                            "operator" => "==",
                            "value" => "1"
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
                "key" => "field_59fb4w1124124215f4w",
                "label" => __('Bullets type', 'ohio'),
                "name" => "global_portfolio_bullets_type",
                "type" => "select",
                "instructions" => __('Choose bullets or number pagination', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59fb4w123s2g2f4w",
                            "operator" => "==",
                            "value" => "1"
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
                "key" => "field_59fb4w123s2g3g42",
                "label" => __('Loop mode', 'ohio'),
                "name" => "global_portfolio_loop_mode",
                "type" => "true_false",
                "instructions" => __('Enable loop mode for portfolio items', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_1"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_2"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_8"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_11"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_12"
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
                "key" => "field_59fb4w123s2g4g43",
                "label" => __('Autoplay mode', 'ohio'),
                "name" => "global_portfolio_autoplay_mode",
                "type" => "true_false",
                "instructions" => __('Enable autoplay mode for portfolio items', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_1"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_2"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_8"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_11"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_12"
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
                "key" => "field_59fb4w123s2g5",
                "label" => __('Autoplay interval timeout', 'ohio'),
                "name" => "global_portfolio_autoplay_interval",
                "type" => "number",
                "instructions" => __('Set up autoplay interval timeout', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59fb4w123s2g4g43",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "default_value" => 5000,
                "placeholder" => "",
                "prepend" => "",
                "append" => "Ms"
            ],
            [
                "key" => "field_59fb4w123s2g6",
                "label" => __('Mouse wheel scroll', 'ohio'),
                "name" => "global_portfolio_mousewheel_mode",
                "type" => "true_false",
                "instructions" => __('Enable mouse wheel scroll for portfolio items', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_1"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_2"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_8"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_11"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_12"
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
                "key" => "field_59fb4w123s2g7",
                "label" => __('Drag scroll', 'ohio'),
                "name" => "global_portfolio_dragscroll_mode",
                "type" => "true_false",
                "instructions" => __('Enable drag scroll for portfolio items', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_1"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_2"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_8"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_11"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_12"
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
                "key" => "field_5937a0a25ff35gh",
                "label" => '<h4>' . __('Typography Settings', 'ohio') . '</h4>',
                "name" => "",
                "conditional_logic" => 0,
                "type" => "message"
            ],
            [
                "key" => "field_593f2345f6sdf6",
                "label" => __('Title typography', 'ohio'),
                "name" => "global_portfolio_title_typo",
                "type" => "ohio_typo",
                "instructions" => __('Set up typography for portfolio item titles', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_59fb4312383615",
                "label" => __('Category', 'ohio'),
                "name" => "global_portfolio_page_category_visibility",
                "type" => "true_false",
                "instructions" => __('Show category label on portfolio items', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => "",
                "ui_off_text" => ""
            ],
            [
                "key" => "field_593f2s45fbsdf5",
                "label" => __('Category typography', 'ohio'),
                "name" => "global_portfolio_category_typo",
                "type" => "ohio_typo",
                "instructions" => __('Set up typography for portfolio item categories', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59fb4312383615",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_59fb4312383615f",
                "label" => __('Date', 'ohio'),
                "name" => "global_portfolio_date_visibility",
                "type" => "true_false",
                "instructions" => __('Show date on portfolio items', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_1"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_2"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_11"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_12"
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
                "key" => "field_593f2s45fbsdf5f",
                "label" => __('Date typography', 'ohio'),
                "name" => "global_portfolio_date_typo",
                "type" => "ohio_typo",
                "instructions" => __('Set up typography for portfolio item categories', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59fb4312383615f",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_59f235234383615",
                "label" => __('Short description', 'ohio'),
                "name" => "global_portfolio_descr_visibility",
                "type" => "true_false",
                "instructions" => __('Show "View project" link on portfolio items', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_1"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_2"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_11"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_12"
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
                "key" => "field_593f2j1s41df52as5",
                "label" => __('Short description length', 'ohio'),
                "name" => "global_portfolio_descr_length",
                "type" => "number",
                "instructions" => __('Specify the length of the short description.', 'ohio') . '<em>' . __('(Default value=> 24 words)', 'ohio') . '</em>',
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59f235234383615",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "default_value" => 24,
                "placeholder" => "",
                "prepend" => "",
                "append" => __('words', 'ohio')
            ],
            [
                "key" => "field_59fb4334asd3615",
                "label" => __('Portfolio items per page', 'ohio'),
                "name" => "global_portfolio_projects_per_page",
                "type" => "number",
                "instructions" => __('Choose number of portfolio items per page', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => 12,
                "placeholder" => "",
                "prepend" => "",
                "append" => __('projects', 'ohio'),
                "min" => 1,
                "max" => 250,
                "step" => 1
            ],
            [
                "key" => "field_593f2j45fbsdf5",
                "label" => __('Short description typography', 'ohio'),
                "name" => "global_portfolio_descr_typo",
                "type" => "ohio_typo",
                "instructions" => __('Set up typography for portfolio items short description', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59f235234383615",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_59f234234383615",
                "label" => __('Project link', 'ohio'),
                "name" => "global_portfolio_page_more_visibility",
                "type" => "true_false",
                "instructions" => __('Show "View project" link on portfolio items', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_1"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_2"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_11"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_12"
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
                "key" => "field_593f2j45fb435df5",
                "label" => __('Project link typography', 'ohio'),
                "name" => "global_portfolio_show_more_button_typo",
                "type" => "ohio_typo",
                "instructions" => __('Set up typography for portfolio item project links', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59f234234383615",
                            "operator" => "==",
                            "value" => "1"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_11"
                        ],
                        [
                            "field" => "field_59fa4344b383615",
                            "operator" => "!=",
                            "value" => "grid_12"
                        ]
                    ]
                ],
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_592fe4346937d",
                "label" => __('Portfolio Page', 'ohio'),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_592fd66622e2f",
                "label" => __('Breadcrumbs slug', 'ohio'),
                "name" => "global_project_breadcrumb_slug",
                "type" => "text",
                "instructions" => __('Enter custom text for breadcrumbs slug', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "Portfolio",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_5937a0a25fd23s15gh2",
                "label" => '<h4>' . __('Portfolio Page Settings', 'ohio') . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_592fd666241be",
                "label" => __('Portfolio page', 'ohio'),
                "name" => "global_portfolio_page",
                "type" => "page_link",
                "instructions" => __('Choose page for all portfolio projects', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "post_type" => [
                    "page"
                ],
                "taxonomy" => [],
                "allow_null" => 0,
                "allow_archives" => 0,
                "multiple" => 0
            ],
            [
                "key" => "field_592fd66vba22c",
                "label" => __('Custom content position', 'ohio'),
                "name" => "global_portfolio_content_position",
                "type" => "select",
                "instructions" => __('Choose WPBakery/Elementor builders content position', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "choices" => [
                    "top" => __('Top - Before portfolio', 'ohio'),
                    "bottom" => __('Bottom - After portfolio', 'ohio')
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "top",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_5937a54r3hs152s",
                "label" => '<h4>' . __('Portfolio Filter Bar', 'ohio') . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_59fb4334b343615",
                "label" => __('Category filter', 'ohio'),
                "name" => "global_project_page_filter_visibility",
                "type" => "true_false",
                "instructions" => __('Show category filter on portfolio pages', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => "",
                "ui_off_text" => ""
            ],
            [
                "key" => "field_59fb43341343615",
                "label" => __('Category filter typography', 'ohio'),
                "name" => "global_project_filter_text_typo",
                "type" => "ohio_typo",
                "instructions" => __('Choose category filter typography', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59fb4334b343615",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ]
            ],
            [
                "key" => "field_59fb43342343615",
                "label" => __('Category filter accent typography', 'ohio'),
                "name" => "global_project_filter_accent_typo",
                "type" => "ohio_typo",
                "instructions" => __('Choose category filter accent typography', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59fb4334b343615",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ]
            ],
            [
                "key" => "field_59fb4334b433615",
                "label" => __('Category filter position', 'ohio'),
                "name" => "global_portfolio_project_filter_align",
                "type" => "select",
                "instructions" => __('Choose category filter position for portfolio pages', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59fb4334b343615",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "choices" => [
                    "left" => __('Left', 'ohio'),
                    "center" => __('Center', 'ohio'),
                    "right" => __('Right', 'ohio')
                ],
                "default_value" => [
                    "center"
                ],
                "allow_null" => 0,
                "multiple" => 0,
                "ui" => 0,
                "ajax" => 0,
                "return_format" => "value",
                "placeholder" => ""
            ],
            [
                "key" => "field_5937a0s253d23s15b",
                "label" => '<h4>' . __('Portfolio Page Pagination', 'ohio') . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_59fb4334fd33615",
                "label" => __('Pagination', 'ohio'),
                "name" => "global_portfolio_pagination_type",
                "type" => "select",
                "instructions" => __('Choose pagination type for portfolio page', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "choices" => [
                    "simple" => __('Simple', 'ohio'),
                    "standard" => __('Standard', 'ohio'),
                    "lazy_scroll" => __('Lazy load', 'ohio'),
                    "lazy_button" => __('Load more', 'ohio')
                ],
                "default_value" => [
                    "simple"
                ],
                "allow_null" => 0,
                "multiple" => 0,
                "ui" => 0,
                "ajax" => 0,
                "return_format" => "value",
                "placeholder" => ""
            ],
            [
                "key" => "field_59fb4334bgdasdf33615",
                "label" => __('Pagination position', 'ohio'),
                "name" => "global_portfolio_pagination_position",
                "type" => "select",
                "instructions" => __('Choose pagination position for portfolio page', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "choices" => [
                    "left" => __('Left', 'ohio'),
                    "center" => __('Center', 'ohio'),
                    "right" => __('Right', 'ohio')
                ],
                "default_value" => [
                    "left"
                ],
                "allow_null" => 0,
                "multiple" => 0,
                "ui" => 0,
                "ajax" => 0,
                "return_format" => "value",
                "placeholder" => ""
            ],
            [
                "key" => "field_592fe44346937d",
                "label" => __('Project Page', 'ohio'),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_592fd6662265c",
                "label" => __('Project default layout', 'ohio'),
                "name" => "global_project_layout_type",
                "type" => "image_option",
                "instructions" => __('Choose layout type for project pages', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "image_option_value" => [
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
                "default_value" => "type_1"
            ],
            [
                "key" => "field_59fb4ad44a1dtd336sl",
                "label" => __('Project URL slug', 'ohio'),
                "name" => "global_portfolio_slug",
                "type" => "text",
                "instructions" => __('Do not forget to rebuild', 'ohio') . '<em>&nbsp;<a target="_blank" href="./options-permalink.php">' . __('Permalinks', 'ohio') . '</a>&nbsp;</em>' . __('by clicking the "Save Changes" button', 'ohio'),
                "required" => 0,
                "default_value" => "project",
                "new_lines" => "",
                "esc_html" => 1
            ],
            [
                "key" => "field_592fd922a41f",
                "label" => __('Custom content position', 'ohio'),
                "name" => "global_project_custom_content_position",
                "type" => "select",
                "instructions" => __('Choose WPBakery/Elementor builders content position', 'ohio'),
                "required" => 0,
                "choices" => [
                    "top" => __('Top - Before content', 'ohio'),
                    "after_description" => __('Center - After description', 'ohio'),
                    "bottom" => __('Bottom - After content', 'ohio')
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "bottom",
                "layout" => "vertical",
                "return_format" => "value"
            ],
            [
                "key" => "field_592fd62342342a31",
                "label" => __('Next/Prev navigation', 'ohio'),
                "name" => "global_project_show_navigation",
                "type" => "true_false",
                "instructions" => __('Show portfolio navigation with next and previouse projects', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => "",
                "ui_off_text" => ""
            ],
            [
                "key" => "field_59391f24598db5182jgls",
                "label" => __('Featured image', 'ohio'),
                "name" => "global_project_add_featured_on_page",
                "type" => "true_false",
                "instructions" => __('Show featured image on the project page?', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => 1,
                "ui" => 1
            ],
            [
                "key" => "field_5937a0a24fd35gh",
                "label" => '<h4>' . __('Slider Settings', 'ohio') . '</h4>',
                "name" => "",
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
                "type" => "message"
            ],
            [
                "key" => "field_59fb4w13tfgdfse3",
                "label" => __('Gallery scrolling effect', 'ohio'),
                "name" => "global_project_gallery_scrolling_effect",
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
                    "parallax" => __('Parallax', 'ohio'),
                    "scale" => __('Scale', 'ohio')
                ],
                "default_value" => [
                    "parallax"
                ],
                "allow_null" => 0,
                "multiple" => 0,
                "ui" => 0,
                "ajax" => 0,
                "return_format" => "value",
                "placeholder" => ""
            ],
            [
                "key" => "field_59fb4w13tfgdfse2",
                "label" => __('Navigation', 'ohio'),
                "name" => "global_project_nav_visibility",
                "type" => "true_false",
                "instructions" => __('Show navigation buttons on the project slider', 'ohio'),
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
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => "",
                "ui_off_text" => ""
            ],
            [
                "key" => "field_59234fgbds2g2f4w",
                "label" => __('Bullets', 'ohio'),
                "name" => "global_project_bullets_visibility",
                "type" => "true_false",
                "instructions" => __('Show bullets bar on the project slider', 'ohio'),
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
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => "",
                "ui_off_text" => ""
            ],
            [
                "key" => "field_59fb4w1rebth3wef4w",
                "label" => __('Bullets type', 'ohio'),
                "name" => "global_project_bullets_type",
                "type" => "select",
                "instructions" => __('Choose bullets or number pagination on the project slider', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59234fgbds2g2f4w",
                            "operator" => "==",
                            "value" => "1"
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
                "key" => "field_59fb434rgthjedsdcvwerf",
                "label" => __('Loop mode', 'ohio'),
                "name" => "global_project_loop_mode",
                "type" => "true_false",
                "instructions" => __('Enable loop mode for the project slider', 'ohio'),
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
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => "",
                "ui_off_text" => ""
            ],
            [
                "key" => "field_594gerh45rfsecxg43",
                "label" => __('Autoplay mode', 'ohio'),
                "name" => "global_project_autoplay_mode",
                "type" => "true_false",
                "instructions" => __('Enable autoplay mode for the project slider', 'ohio'),
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
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => "",
                "ui_off_text" => ""
            ],
            [
                "key" => "field_59erbvdfdhe5rhgergvsd5",
                "label" => __('Autoplay interval timeout', 'ohio'),
                "name" => "global_project_autoplay_interval",
                "type" => "number",
                "instructions" => __('Set up autoplay interval timeout for the project slider', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_594gerh45rfsecxg43",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "default_value" => 5000,
                "placeholder" => "",
                "prepend" => "",
                "append" => "Ms"
            ],
            [
                "key" => "field_egetrgwery534erg3w5hy3",
                "label" => __('Mouse wheel scroll', 'ohio'),
                "name" => "global_project_mousewheel_mode",
                "type" => "true_false",
                "instructions" => __('Enable mouse wheel scroll for the project slider', 'ohio'),
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
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => "",
                "ui_off_text" => ""
            ],
            [
                "key" => "field_egetrgwery5kop3kfk",
                "label" => __('Overlay color', 'ohio'),
                "name" => "global_project_color_overlay",
                "type" => "ohio_color",
                "instructions" => __('Choose an overlay color for the main slider image', 'ohio'),
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
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => "",
                "ui_off_text" => ""
            ],
            [
                "key" => "field_egetrgwery5kop3kfk13asfah",
                "label" => __('Video button color', 'ohio'),
                "name" => "global_project_grid_video_btn_bg",
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
                "key" => "field_59fb4312b343615asdasfga",
                "label" => __('Project video button style', 'ohio'),
                "name" => "global_project_video_button_style",
                "type" => "select",
                "instructions" => __('Choose video button style', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "choices" => [
                    "default" => __('Default', 'ohio'),
                    "outline" => __('Outline', 'ohio')
                ],
                "default_value" => [
                    "default"
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_5936a7a521481ebmod23",
                "label" => '<h4>' . __('Sharing Settings', 'ohio') . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_592fd666231f2",
                "label" => __('Sharing', 'ohio'),
                "name" => "global_project_sharing_buttons_visibility",
                "type" => "true_false",
                "instructions" => __('Enable sharing feature for project pages?', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio'),
                "message" => "",
                "default_value" => 1
            ],
            [
                "key" => "field_592fd666235d9",
                "label" => __('Sharing networks', 'ohio'),
                "name" => "global_project_social_sharing_buttons",
                "type" => "select",
                "instructions" => __('Choose sharing social networks', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fd666231f2",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "choices" => [
                    "facebook" => __('Facebook', 'ohio'),
                    "twitter" => __('Twitter', 'ohio'),
                    "pinterest" => __('Pinterest', 'ohio'),
                    "linkedin" => __('LinkedIn', 'ohio'),
                    "vk" => __('VKontakte', 'ohio')
                ],
                "default_value" => [],
                "allow_null" => 0,
                "multiple" => 1,
                "ui" => 1,
                "ajax" => 1,
                "return_format" => "value",
                "placeholder" => ""
            ],
            [
                "key" => "field_592f4a166937e",
                "label" => __('Lightbox', 'ohio'),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_59fb44344asdd33615",
                "label" => __('Lightbox', 'ohio'),
                "name" => "global_portfolio_projects_in_popup",
                "type" => "true_false",
                "instructions" => __('Enable lightbox preview for portfolio projects', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "ui" => 1,
                "default_value" => 1,
                "new_lines" => "",
                "esc_html" => 0
            ],
            [
                "key" => "field_5937a0a5314ris152s",
                "label" => '<h4>' . __('Lightbox Settings', 'ohio') . '</h4>',
                "name" => "",
                "type" => "message",
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59fb44344asdd33615",
                            "operator" => "!=",
                            "value" => "0"
                        ]
                    ]
                ]
            ],
            [
                "key" => "field_59391f24598db5182jglb",
                "label" => __('Show featured image', 'ohio'),
                "name" => "global_project_add_featured_to_gallery",
                "type" => "true_false",
                "instructions" => __('Show featured image on the projects', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59fb44344asdd33615",
                            "operator" => "!=",
                            "value" => "0"
                        ]
                    ]
                ],
                "default_value" => 1,
                "ui" => 1
            ],
            [
                "key" => "field_59391f24598db5182jglb",
                "label" => __('Featured image', 'ohio'),
                "name" => "global_project_add_featured_to_gallery",
                "type" => "true_false",
                "instructions" => __('Show featured images in the lightbox?', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59fb44344asdd33615",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "default_value" => 1,
                "ui" => 1
            ],
            [
                "key" => "field_59qd89qws2354d24",
                "label" => __('Lightbox trigger color', 'ohio'),
                "name" => "global_lightbox_trigger_color",
                "type" => "ohio_color",
                "instructions" => __('Choose color for the lightbox trigger icon', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59fb44344asdd33615",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ]
            ],
            [
                "key" => "field_59fb4ad4456f45",
                "label" => __('Project category', 'ohio'),
                "name" => "global_lightbox_category_visibility",
                "type" => "true_false",
                "instructions" => __('Show portfolio categories in the lightbox', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59fb44344asdd33615",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "ui" => 1,
                "default_value" => 1,
                "new_lines" => "",
                "esc_html" => 0
            ],
            [
                "key" => "field_593d2745h6sdf6",
                "label" => __('Project category typography', 'ohio'),
                "name" => "global_lightbox_category_typo",
                "type" => "ohio_typo",
                "instructions" => __('Set up typography for project description', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59fb4ad4456f45",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_59fb4ad4456s34",
                "label" => __('Project date', 'ohio'),
                "name" => "global_lightbox_date_visibility",
                "type" => "true_false",
                "instructions" => __('Show portfolio date in the lightbox', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59fb44344asdd33615",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "ui" => 1,
                "default_value" => 1,
                "new_lines" => "",
                "esc_html" => 0
            ],
            [
                "key" => "field_59fb4ad4456s35",
                "label" => __('Project date typography', 'ohio'),
                "name" => "global_lightbox_date_typo",
                "type" => "ohio_typo",
                "instructions" => __('Set up typography for project date', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59fb4ad4456s34",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_593f2745h6sdf6",
                "label" => __('Project title typography', 'ohio'),
                "name" => "global_lightbox_title_typo",
                "type" => "ohio_typo",
                "instructions" => __('Set up typography for project headline', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59fb44344asdd33615",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_59fb4ad44567d33615",
                "label" => __('Project description', 'ohio'),
                "name" => "global_portfolio_gallery_description",
                "type" => "true_false",
                "instructions" => __('Show portfolio description in the lightbox', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59fb44344asdd33615",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "ui" => 1,
                "default_value" => 1,
                "new_lines" => "",
                "esc_html" => 0
            ],
            [
                "key" => "field_59fb4ad44567d33615sfdry",
                "label" => __('Project description length', 'ohio'),
                "name" => "global_portfolio_gallery_descr_length",
                "type" => "number",
                "instructions" => __('Specify the length of the description.', 'ohio') . '<em>' . __('(Default value=> 24 words)', 'ohio') . '</em>',
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59fb4ad44567d33615",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "default_value" => 24,
                "placeholder" => "",
                "prepend" => "",
                "append" => __('words', 'ohio')
            ],
            [
                "key" => "field_593f2345h6sdf6",
                "label" => __('Project description typography', 'ohio'),
                "name" => "global_lightbox_description_typo",
                "type" => "ohio_typo",
                "instructions" => __('Set up typography for project description', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59fb4ad44567d33615",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_59fb4ad44566d33615",
                "label" => __('Project details', 'ohio'),
                "name" => "global_portfolio_gallery_details",
                "type" => "true_false",
                "instructions" => __('Show portfolio details in the lightbox', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59fb44344asdd33615",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "ui" => 1,
                "default_value" => 1,
                "new_lines" => "",
                "esc_html" => 0
            ],
            [
                "key" => "field_593f2945h6sdf6",
                "label" => __('Project details typography', 'ohio'),
                "name" => "global_lightbox_details_typo",
                "type" => "ohio_typo",
                "instructions" => __('Set up typography for project details', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59fb4ad44566d33615",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_59fb4ad44asdtd33615",
                "label" => __('Project link', 'ohio'),
                "name" => "global_portfolio_lightbox_link",
                "type" => "true_false",
                "instructions" => __('Show "View project" link in the lightbox', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59fb44344asdd33615",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "ui" => 1,
                "default_value" => 1,
                "new_lines" => "",
                "esc_html" => 0
            ],
            [
                "key" => "field_59fb4ad44a1dtd33615",
                "label" => __('Project link text', 'ohio'),
                "name" => "global_portfolio_lightbox_link_text",
                "type" => "text",
                "instructions" => __('Enter a custom value for project link', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59fb4ad44asdtd33615",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "default_value" => "View Project",
                "new_lines" => "",
                "esc_html" => 0
            ],
            [
                "key" => "field_592f2945h6sdf6",
                "label" => __('Project link typography', 'ohio'),
                "name" => "global_lightbox_link_typo",
                "type" => "ohio_typo",
                "instructions" => __('Set up typography for project link', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59fb4ad44asdtd33615",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_5937a0a5314ris152f",
                "label" => '<h4>' . __('Lightbox Slider Settings', 'ohio') . '</h4>',
                "name" => "",
                "type" => "message",
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59fb44344asdd33615",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ]
            ],
            [
                "key" => "field_59fb4w123s2g1l",
                "label" => __('Navigation', 'ohio'),
                "name" => "global_lightbox_nav_visibility",
                "type" => "true_false",
                "instructions" => __('Show navigation buttons on portfolio items', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59fb44344asdd33615",
                            "operator" => "==",
                            "value" => "1"
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
                "key" => "field_59fb4w123s2g2l",
                "label" => __('Bullets', 'ohio'),
                "name" => "global_lightbox_bullets_visibility",
                "type" => "true_false",
                "instructions" => __('Show bullets bar on portfolio items', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59fb44344asdd33615",
                            "operator" => "==",
                            "value" => "1"
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
                "key" => "field_59fb4w123s2g3l",
                "label" => __('Loop mode', 'ohio'),
                "name" => "global_lightbox_loop_mode",
                "type" => "true_false",
                "instructions" => __('Enable loop mode for portfolio items', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59fb44344asdd33615",
                            "operator" => "==",
                            "value" => "1"
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
                "key" => "field_59fb4w123s2g4l",
                "label" => __('Autoplay mode', 'ohio'),
                "name" => "global_lightbox_autoplay_mode",
                "type" => "true_false",
                "instructions" => __('Enable autoplay mode for portfolio items', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59fb44344asdd33615",
                            "operator" => "==",
                            "value" => "1"
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
                "key" => "field_59fb4w123s2g5l",
                "label" => __('Autoplay interval timeout', 'ohio'),
                "name" => "global_lightbox_autoplay_interval",
                "type" => "number",
                "instructions" => __('Set up autoplay interval timeout', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59fb4w123s2g4l",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "default_value" => 5000,
                "placeholder" => "",
                "prepend" => "",
                "append" => __('Ms', 'ohio')
            ],
            [
                "key" => "field_59fb4w123s2g6l",
                "label" => __('Mouse wheel scroll', 'ohio'),
                "name" => "global_lightbox_mousewheel_mode",
                "type" => "true_false",
                "instructions" => __('Enable mouse wheel scrollfor portfolio items', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59fb44344asdd33615",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => "",
                "ui_off_text" => ""
            ]
        ],
        "location" => [
            [
                [
                    "param" => "options_page",
                    "operator" => "==",
                    "value" => "theme-general-portfolio"
                ]
            ]
        ],
        "menu_order" => 0,
        "position" => "normal",
        "style" => "default",
        "label_placement" => "left",
        "instruction_placement" => "label",
        "hide_on_screen" => "",
        "active" => 1,
        "description" => ""
    ]);

endif;
