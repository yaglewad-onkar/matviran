<?php if (function_exists('acf_add_local_field_group')) :

    acf_add_local_field_group([
        "key" => "group_593dd5f5615b0",
        "title" => __('Blog Settings', 'ohio'),
        "private" => true,
        "fields" => [
            [
                "key" => "field_591b002d4818sffmod",
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
                "key" => "field_593dd5f56ca9d",
                "label" => "",
                "name" => "",
                "type" => "message",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "message" => '<p class="message">' . '<span class="dashicons dashicons-editor-help"></span>' . __('To find more blog page settings navigate to', 'ohio') . '&nbsp;<a target="_blank" href="./admin.php?page=ohio_hub_settings&options_page=theme-general-blog">' . __('Global Theme Settings', 'ohio') . '</a></p>',
                "new_lines" => "wpautop",
                "esc_html" => 0
            ],
            [
                "key" => "field_593dd5f56bae0",
                "label" => __('Blog layout', 'ohio'),
                "name" => "blog_item_layout_type",
                "type" => "image_option",
                "instructions" => __('Choose blog grid layout type', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "image_option_value" => [
                    [
                        "name" => "inherit",
                        "description" => __('Use from Theme Settings', 'ohio'),
                        "src" => "acf__image_inherited.svg"
                    ],
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
                "default_value" => "inherit",
                "allow_null" => 0,
                "multiple" => 0,
                "ui" => 0,
                "ajax" => 0,
                "return_format" => "value",
                "placeholder" => ""
            ],
            [
                "key" => "field_592d60af8b3f9afs",
                "label" => __('Blog hover effect', 'ohio'),
                "name" => "blog_item_hover_type",
                "type" => "select",
                "instructions" => __('Choose hover effect type for blog items', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "choices" => [
                    "inherit" => __('Use from Theme Settings', 'ohio'),
                    "type1" => __('Image Scaling', 'ohio'),
                    "type2" => __('Color Overlay', 'ohio'),
                    "type3" => __('Greyscale', 'ohio'),
                    "type4" => __('Image Parallax', 'ohio')
                ],
                "default_value" => "inherit",
                "allow_null" => 0,
                "multiple" => 0,
                "ui" => 0,
                "ajax" => 0,
                "return_format" => "value",
                "placeholder" => ""
            ],
            [
                "key" => "field_593dd5f56af4c",
                "label" => __('Blog grid layout', 'ohio'),
                "name" => "blog_page_layout",
                "type" => "radio",
                "instructions" => __('Choose grid layout type', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "choices" => [
                    "inherit" => __('Use from Theme Settings', 'ohio'),
                    "classic" => __('Classic layout', 'ohio'),
                    "masonry" => __('Masonry layout', 'ohio')
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "inherit",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_593dd5f56c2b2",
                "label" => __('Blog grid spacing', 'ohio'),
                "name" => "grid_items_without_padding",
                "type" => "inherited_checkbox",
                "instructions" => __('Remove spacing between grid items', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_593dd5f56bae0",
                            "operator" => "!=",
                            "value" => "blog_grid_6"
                        ]
                    ]
                ],
                "custom_labels" => [
                    "inherit" => __('Use from Theme Settings', 'ohio'),
                    "yes" => __('Yes', 'ohio'),
                    "no" => __('No', 'ohio')
                ],
                "default_value" => "inherit",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_59ccb100ba6f7nomod",
                "label" => __('Blog categories', 'ohio'),
                "name" => "blog_categories",
                "type" => "taxonomy",
                "instructions" => __('Leave empty if want show all categories', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "taxonomy" => "category",
                "field_type" => "multi_select",
                "allow_null" => 0,
                "add_term" => 0,
                "save_terms" => 0,
                "load_terms" => 0,
                "return_format" => "object",
                "multiple" => 1
            ],
            [
                "key" => "field_5937a0a253d23s15u",
                "label" => '<h4>' . __('Number of Posts', 'ohio') . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_593dd5f56b70f",
                "label" => __('Blog items per page', 'ohio'),
                "name" => "blog_posts_per_page",
                "type" => "number",
                "instructions" => __('Choose the number of blog items per page', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => 24,
                "placeholder" => "",
                "prepend" => "",
                "append" => "posts",
                "min" => 1,
                "max" => 100,
                "step" => 1
            ],
            [
                "key" => "field_593dd5f56b310",
                "label" => __('Blog items per row', 'ohio'),
                "name" => "blog_columns_in_row",
                "type" => "ohio_columns",
                "instructions" => __('Choose the number of blog items per row', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_593dd5f56bae0",
                            "operator" => "!=",
                            "value" => "blog_grid_6"
                        ]
                    ]
                ],
                "default_value" => "i-i-i",
                "allow_null" => 0,
                "multiple" => 0,
                "ui" => 0,
                "ajax" => 0,
                "return_format" => "value",
                "placeholder" => "",
                "use_inherit" => true
            ],
            [
                "key" => "field_5937a0a253d23s15l",
                "label" => '<h4>' . __('Grid Appear Effect', 'ohio') . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_592d60af8a7ffmo7ds",
                "label" => __('Grid animation', 'ohio'),
                "name" => "page_animation_type",
                "type" => "radio",
                "instructions" => __('Choose grid animation type', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "choices" => [
                    "inherit" => __('Use from Theme Settings', 'ohio'),
                    "default" => __('Disable animation', 'ohio'),
                    "sync" => __('Sync animation', 'ohio'),
                    "async" => __('Async animation', 'ohio')
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "inherit",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_592d60af8ac17d27mo7ds",
                "label" => __('Grid animation effect', 'ohio'),
                "name" => "page_animation_effect",
                "type" => "select",
                "instructions" => __('Choose blog items appear effect', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "choices" => [
                    "fade-up" => __('Fade up', 'ohio'),
                    "fade-left" => __('Fade left', 'ohio'),
                    "fade-right" => __('Fade right', 'ohio'),
                    "slide-up" => __('Slide up', 'ohio'),
                    "flip-up" => __('Flip up', 'ohio'),
                    "zoom-in" => __('Zoom in', 'ohio')
                ],
                "default_value" => [
                    "inherit"
                ],
                "allow_null" => 0,
                "multiple" => 0,
                "ui" => 0,
                "ajax" => 0,
                "return_format" => "value",
                "placeholder" => ""
            ],
            [
                "key" => "field_5937a0a253d23s15h",
                "label" => '<h4>' . __('Post Card', 'ohio') . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_59f2342343g531f",
                "label" => __('Metro style', 'ohio'),
                "name" => "blog_metro_style",
                "type" => "inherited_checkbox",
                "instructions" => __('Convert blog images to a square', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_593dd5f56bae0",
                            "operator" => "!=",
                            "value" => "blog_grid_6"
                        ]
                    ]
                ],
                "custom_labels" => [
                    "inherit" => __('Use from Theme Settings', 'ohio'),
                    "yes" => __('Show', 'ohio'),
                    "no" => __('Hide', 'ohio')
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "inherit",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_592d60affsafr4gdt25",
                "label" => __('Boxed layout', 'ohio'),
                "name" => "blog_items_boxed_style",
                "type" => "radio",
                "instructions" => __('Use boxed layout post items', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "choices" => [
                    "inherit" => __('Use from Theme Settings', 'ohio'),
                    "boxed" => __('Boxed layout', 'ohio'),
                    "default" => __('Default layout', 'ohio')
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "inherit",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_593f23hmnty31",
                "label" => __('Post card background', 'ohio'),
                "name" => "posts_card_background_color",
                "type" => "ohio_color",
                "instructions" => __('Choose post card background color', 'ohio'),
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592d60affsafr4gdt25",
                            "operator" => "!=",
                            "value" => "default"
                        ]
                    ]
                ],
                "required" => 0,
                "default_value" => ""
            ],
            [
                "key" => "field_593ffgll21g5g412",
                "label" => __('Post card alignment', 'ohio'),
                "name" => "posts_text_alignment",
                "type" => "select",
                "instructions" => __('Choose text alignment for blog items', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "choices" => [
                    "inherit" => __('Use from Theme Settings', 'ohio'),
                    "left" => __('Left', 'ohio'),
                    "center" => __('Center', 'ohio'),
                    "right" => __('Right', 'ohio')
                ],
                "default_value" => "inherit",
                "allow_null" => 0,
                "multiple" => 0,
                "ui" => 0,
                "ajax" => 0,
                "return_format" => "value",
                "placeholder" => ""
            ],
            [
                "key" => "field_591b002d4817sffmod",
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
                "key" => "field_5937a0a253d23s1fb",
                "label" => '<h4>' . __('Blog Page Pagination', 'ohio') . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_593dd5f56ba30",
                "label" => __('Pagination', 'ohio'),
                "name" => "pagination_type",
                "type" => "select",
                "instructions" => __('Choose pagination type for blog page', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "choices" => [
                    "inherit" => __('Use from Theme Settings', 'ohio'),
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
                "key" => "field_593dd523442330",
                "label" => __('Pagination position', 'ohio'),
                "name" => "pagination_position",
                "type" => "select",
                "instructions" => __('Choose pagination position for blog page', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "choices" => [
                    "inherit" => __('Use from Theme Settings', 'ohio'),
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
                    "param" => "page_template",
                    "operator" => "==",
                    "value" => "page_templates/page_for-posts.php"
                ],
                [
                    "param" => "post_type",
                    "operator" => "==",
                    "value" => "page"
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
