<?php if (function_exists('acf_add_local_field_group')) :

    acf_add_local_field_group([
        "key" => "group_592d60af343cf",
        "title" => __('Blog Settings', 'ohio'),
        "private" => true,
        "fields" => [
            [
                "key" => "field_592d60ah8a413",
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
                "key" => "field_5937e0a52b488qw",
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
                "key" => "field_592d60af8b3f8",
                "label" => __('Blog layout', 'ohio'),
                "name" => "global_blog_item_layout_type",
                "type" => "image_option",
                "instructions" => __('Choose blog grid layout type', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "image_option_value" => [
                    [
                        "name" => "blog_grid_1",
                        "description" => __('Classic grid', 'ohio'),
                        "src" => "acf__image_portfolio_01.svg"
                    ],
                    [
                        "name" => "blog_grid_2",
                        "description" => __('Minimal grid', 'ohio'),
                        "src" => "acf__image_portfolio_02.svg"
                    ],
                    [
                        "name" => "blog_grid_3",
                        "description" => __('Split grid', 'ohio'),
                        "src" => "acf__image_portfolio_39.svg"
                    ],
                    [
                        "name" => "blog_grid_4",
                        "description" => __('Inner grid', 'ohio'),
                        "src" => "acf__image_portfolio_40.svg"
                    ],
                    [
                        "name" => "blog_grid_5",
                        "description" => __('Compact grid', 'ohio'),
                        "src" => "acf__image_portfolio_41.svg"
                    ],
                    [
                        "name" => "blog_grid_6",
                        "description" => __('Simple grid', 'ohio'),
                        "src" => "acf__image_portfolio_44.svg"
                    ]
                ],
                "default_value" => "blog_grid_1",
                "allow_null" => 0,
                "multiple" => 0,
                "ui" => 0,
                "ajax" => 0,
                "return_format" => "value",
                "placeholder" => ""
            ],
            [
                "key" => "field_592d60af8b3f9",
                "label" => __('Blog hover effect', 'ohio'),
                "name" => "global_blog_item_hover_type",
                "type" => "select",
                "instructions" => __('Choose hover effect type for blog items', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "choices" => [
                    "type1" => __('Image Scaling', 'ohio'),
                    "type2" => __('Color Overlay', 'ohio'),
                    "type3" => __('Greyscale', 'ohio'),
                    "type4" => __('Image Parallax', 'ohio')
                ],
                "default_value" => "type1",
                "allow_null" => 0,
                "multiple" => 0,
                "ui" => 0,
                "ajax" => 0,
                "return_format" => "value",
                "placeholder" => ""
            ],
            [
                "key" => "field_592fd6fa1246v12ffaqwba22c",
                "label" => __('Blog thumbnail size', 'ohio'),
                "name" => "global_blog_images_size",
                "type" => "select",
                "instructions" => __('Choose image size for blog items', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "choices" => [
                    "thumbnail" => __('Thumbnail', 'ohio'),
                    "medium" => __('Small', 'ohio'),
                    "medium_large" => __('Medium', 'ohio'),
                    "large" => __('Large', 'ohio'),
                    "full" => __('Original', 'ohio')
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "medium_large",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_592d60af8a7ff",
                "label" => __('Blog grid layout', 'ohio'),
                "name" => "global_blog_page_layout",
                "type" => "radio",
                "instructions" => __('Choose grid layout type', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "choices" => [
                    "classic" => __('Classic layout', 'ohio'),
                    "masonry" => __('Masonry grid', 'ohio')
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "masonry",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_592d60af8bc07",
                "label" => __('Blog grid spacing', 'ohio'),
                "name" => "global_blog_grid_items_without_padding",
                "type" => "true_false",
                "instructions" => __('Remove spacing between grid items', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592d60af8b3f8",
                            "operator" => "!=",
                            "value" => "blog_grid_6"
                        ]
                    ]
                ],
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio'),
                "message" => "",
                "default_value" => 0
            ],
            [
                "key" => "field_5937a0a253d23s15g",
                "label" => '<h4>' . __('Number of Posts', 'ohio') . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_592d60af8b000",
                "label" => __('Blog items per page', 'ohio'),
                "name" => "global_blog_posts_per_page",
                "type" => "number",
                "instructions" => __('Choose the number of blog items per page', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => 16,
                "placeholder" => "",
                "prepend" => "",
                "append" => "posts",
                "min" => 1,
                "max" => 100,
                "step" => 1
            ],
            [
                "key" => "field_592d60af8ac17",
                "label" => __('Blog items per row', 'ohio'),
                "name" => "global_blog_columns_in_row",
                "type" => "ohio_columns",
                "instructions" => __('Choose the number of blog items per row', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592d60af8a7ff",
                            "operator" => "==",
                            "value" => "masonry"
                        ],
                        [
                            "field" => "field_592d60af8b3f8",
                            "operator" => "!=",
                            "value" => "blog_grid_6"
                        ]
                    ]
                ],
                "default_value" => "3-2-1",
                "allow_null" => 0,
                "multiple" => 0,
                "ui" => 0,
                "ajax" => 0,
                "return_format" => "value",
                "placeholder" => "",
                "use_inherit" => false
            ],
            [
                "key" => "field_5937a0a253d23s15gh",
                "label" => '<h4>' . __('Grid Appearance Effect', 'ohio') . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_592d60af8a7ffmods",
                "label" => __('Grid animation', 'ohio'),
                "name" => "global_blog_page_animation_type",
                "type" => "select",
                "instructions" => __('Choose grid animation type', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "choices" => [
                    "default" => __('Disable animation', 'ohio'),
                    "sync" => __('Sync animation', 'ohio'),
                    "async" => __('Async animation', 'ohio')
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "masonry",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_592d60af8ac17d2mod",
                "label" => __('Grid animation effect', 'ohio'),
                "name" => "global_blog_page_animation_effect",
                "type" => "select",
                "instructions" => __('Choose blog items appear effect', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592d60af8a7ffmods",
                            "operator" => "!=",
                            "value" => "default"
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
                "key" => "field_59fb4332b34323f12412rf",
                "label" => __('Grid animation repeat', 'ohio'),
                "name" => "global_blog_page_animation_once",
                "type" => "true_false",
                "instructions" => __('Repeat animation while scrolling page up and down', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592d60af8a7ffmods",
                            "operator" => "!=",
                            "value" => "default"
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
                "key" => "field_5937aa3d23s15gh",
                "label" => '<h4>' . __('Post Cards', 'ohio') . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_59f2342343s73615",
                "label" => __('Metro style', 'ohio'),
                "name" => "global_blog_metro_style",
                "type" => "true_false",
                "instructions" => __('Convert post image to a square', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592d60af8b3f8",
                            "operator" => "!=",
                            "value" => "blog_grid_6"
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
                "key" => "field_592d60af8b80c",
                "label" => __('Boxed layout', 'ohio'),
                "name" => "global_blog_items_boxed_style",
                "type" => "true_false",
                "instructions" => __('Use boxed layout for blog post items', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio'),
                "message" => "",
                "default_value" => 1
            ],
            [
                "key" => "field_593f2345fbsdf1",
                "label" => __('Post card background', 'ohio'),
                "name" => "global_posts_card_background_color",
                "type" => "ohio_color",
                "instructions" => __('Choose post card background color', 'ohio'),
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592d60af8b80c",
                            "operator" => "!=",
                            "ui_on_text" => __('Yes', 'ohio')
                        ]
                    ]
                ],
                "required" => 0,
                "default_value" => ""
            ],
            [
                "key" => "field_593f2345fbsdf2",
                "label" => __('Post card alignment', 'ohio'),
                "name" => "global_posts_text_alignment",
                "type" => "select",
                "instructions" => __('Choose text alignment for blog items', 'ohio'),
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
                "key" => "field_592s60af8bc07",
                "label" => __('Author', 'ohio'),
                "name" => "global_posts_author_visibility",
                "type" => "true_false",
                "instructions" => __('Show an author on blog items', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio'),
                "message" => "",
                "default_value" => 1
            ],
            [
                "key" => "field_593f2345fbsdf3",
                "label" => __('Author typography', 'ohio'),
                "name" => "global_posts_author_typo",
                "type" => "ohio_typo",
                "instructions" => __('Set up typography for blog items author', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592s60af8bc07",
                            "operator" => "!=",
                            "ui_on_text" => __('Yes', 'ohio')
                        ]
                    ]
                ],
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_593f2345fbsdf4",
                "label" => __('Publication date typography', 'ohio'),
                "name" => "global_posts_date_typo",
                "type" => "ohio_typo",
                "instructions" => __('Set up typography for blog items date', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_593s60af8bc07",
                            "operator" => "!=",
                            "ui_on_text" => __('Yes', 'ohio')
                        ]
                    ]
                ],
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_593s61af8bc07",
                "label" => __('Category', 'ohio'),
                "name" => "global_posts_category_visibility",
                "type" => "true_false",
                "instructions" => __('Show a category on blog items', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio'),
                "message" => "",
                "default_value" => 1
            ],
            [
                "key" => "field_593f2345fbsdf5",
                "label" => __('Category typography', 'ohio'),
                "name" => "global_posts_category_typo",
                "type" => "ohio_typo",
                "instructions" => __('Set up typography for blog items category', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_593s61af8bc07",
                            "operator" => "!=",
                            "ui_on_text" => __('Yes', 'ohio')
                        ]
                    ]
                ],
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_593f2345fbsdf6",
                "label" => __('Title typography', 'ohio'),
                "name" => "global_posts_title_typo",
                "type" => "ohio_typo",
                "instructions" => __('Set up typography for blog items title', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_593sh61af8bc07",
                "label" => __('Short description', 'ohio'),
                "name" => "global_posts_short_description_visibility",
                "type" => "true_false",
                "instructions" => __('Show a short description on blog items', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio'),
                "message" => "",
                "default_value" => 1
            ],
            [
                "key" => "field_593f2345fbfas124",
                "label" => __('Short description length', 'ohio'),
                "name" => "global_posts_content_length",
                "type" => "number",
                "instructions" => __('Specify the length of the short description in words', 'ohio'),
                "required" => 0,
                "append" => __('words', 'ohio'),
                "default_value" => 12,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_593sh61af8bc07",
                            "operator" => "!=",
                            "ui_on_text" => __('Yes', 'ohio')
                        ]
                    ]
                ],
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_593f2345fbsdf7",
                "label" => __('Short description typography', 'ohio'),
                "name" => "global_posts_content_typo",
                "type" => "ohio_typo",
                "instructions" => __('Set up typography for blog items content', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_593sh61af8bc07",
                            "operator" => "!=",
                            "ui_on_text" => __('Yes', 'ohio')
                        ]
                    ]
                ],
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_583sh61af8bc07",
                "label" => __('Read more', 'ohio'),
                "name" => "global_posts_read_more_visibility",
                "type" => "true_false",
                "instructions" => __('Show a Read more button on blog items', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio'),
                "message" => "",
                "default_value" => 1
            ],
            [
                "key" => "field_593f2345fbsdf8",
                "label" => __('Read more typography', 'ohio'),
                "name" => "global_posts_readmore_typo",
                "type" => "ohio_typo",
                "instructions" => __('Set up typography for blog items Read more button', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_583sh61af8bc07",
                            "operator" => "!=",
                            "ui_on_text" => __('Yes', 'ohio')
                        ]
                    ]
                ],
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_583sh61azen4123f8bc07",
                "label" => __('Reading time', 'ohio'),
                "name" => "global_posts_reading_time_visibility",
                "type" => "true_false",
                "instructions" => __('Show approximate post reading time', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio'),
                "message" => "",
                "default_value" => 1
            ],
            [
                "key" => "field_593f2345fbsnxzq354gdf8",
                "label" => __('Reading time typography', 'ohio'),
                "name" => "global_posts_reading_time_typo",
                "type" => "ohio_typo",
                "instructions" => __('Set up typography for blog items reading time', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_583sh61azen4123f8bc07",
                            "operator" => "!=",
                            "ui_on_text" => __('Yes', 'ohio')
                        ]
                    ]
                ],
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_592d60af8a413",
                "label" => __('Blog Page', 'ohio'),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_5937434433s3615",
                "label" => __('Breadcrumbs slug', 'ohio'),
                "name" => "global_page_home_breadcrumb_slug",
                "type" => "text",
                "instructions" => __('Enter custom text for breadcrumbs slug', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "new_lines" => "",
                "esc_html" => 0
            ],
            [
                "key" => "field_591ef18a3ef37",
                "label" => __('Categories filter', 'ohio'),
                "name" => "global_breadcrumbs_show_cats",
                "type" => "true_false",
                "instructions" => __('Show categories filter on your website', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => "",
                "ui_off_text" => ""
            ],
            [
                "key" => "field_591ef1773ef36",
                "label" => __('Tag filter', 'ohio'),
                "name" => "global_breadcrumbs_show_tags",
                "type" => "true_false",
                "instructions" => __('Show tag filter on your website', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => "",
                "ui_off_text" => ""
            ],
            [
                "key" => "field_591ef1473ef35",
                "label" => __('Author filter', 'ohio'),
                "name" => "global_breadcrumbs_show_author",
                "type" => "true_false",
                "instructions" => __('Show author filter on your website', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => "",
                "ui_off_text" => ""
            ],
            [
                "key" => "field_592d60af8b001",
                "label" => __('Pagination', 'ohio'),
                "name" => "global_blog_pagination_type",
                "type" => "select",
                "instructions" => __('Choose pagination type for blog page', 'ohio'),
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
                "key" => "field_59374afs43d8361523f",
                "label" => __('Pagination position', 'ohio'),
                "name" => "global_blog_pagination_position",
                "type" => "select",
                "instructions" => __('Choose pagination position for blog page', 'ohio'),
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
            ]
        ],
        "location" => [
            [
                [
                    "param" => "options_page",
                    "operator" => "==",
                    "value" => "theme-general-blog"
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
