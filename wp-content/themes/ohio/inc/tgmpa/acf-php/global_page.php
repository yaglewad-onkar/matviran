<?php if (function_exists('acf_add_local_field_group')) :

    acf_add_local_field_group([
        "key" => "group_591ac509c1730",
        "title" => __('Page Settings', 'ohio'),
        "private" => true,
        "fields" => [
            [
                "key" => "field_591b002d481fc",
                "label" => __('General', 'ohio'),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "wrapper" => [
                    "width" => "",
                    "class" => "",
                    "id" => ""
                ],
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_5937e0a52b48cexmod153",
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
                "key" => "field_591ac509d31f3",
                "label" => __('Page wrapper', 'ohio'),
                "name" => "global_page_add_wrapper",
                "type" => "true_false",
                "instructions" => __('Add content wrapper to all pages', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_591ac5s9d31f3",
                "label" => __('Page wrapper width', 'ohio'),
                "name" => "global_page_content_wrapper_width",
                "type" => "text",
                "instructions" => __('Set the container wrapper width', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => "1300px",
                "placeholder" => "",
                "prepend" => __('Use CSS units', 'ohio'),
                "append" => "",
                "maxlength" => 200
            ],
            [
                "key" => "field_591b10dbb4a85_fwgaps",
                "label" => __('Page full-width layout margins', 'ohio'),
                "name" => "global_page_full_width_margins_size",
                "type" => "text",
                "instructions" => __('Set side margins for a full-width page layout', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => "",
                "placeholder" => "",
                "prepend" => __('Use CSS units', 'ohio'),
                "append" => "",
                "maxlength" => 200
            ],
            [
                "key" => "field_591ac509d3606",
                "label" => __('Page content padding', 'ohio'),
                "name" => "global_page_add_top_padding",
                "type" => "true_false",
                "instructions" => __('Add top and bottom padding for page content', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio'),
                "message" => "",
                "default_value" => 1
            ],
            [
                "key" => "field_59381c77504bs",
                "label" => __('Page boxed layout', 'ohio'),
                "name" => "global_page_use_boxed_wrapper",
                "type" => "true_false",
                "instructions" => __('Wrap all pages in boxed container', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 0,
                "ui" => 1,
                "ui_on_text" => "",
                "ui_off_text" => ""
            ],
            [
                "key" => "field_59381c77504bf",
                "label" => __('Page boxed layout margins', 'ohio'),
                "name" => "global_page_boxed_wrapper_margins_size",
                "type" => "text",
                "instructions" => __('Set side margins for a full-width page layout', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59381c77504bs",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "default_value" => "",
                "placeholder" => "",
                "prepend" => __('Use CSS units', 'ohio'),
                "append" => "",
                "maxlength" => 200
            ],
            [
                "key" => "field_591ac509d1208grp",
                "label" => __('Page background', 'ohio'),
                "name" => "global_page",
                "type" => "clone",
                "instructions" => __('Choose the background for all pages', 'ohio'),
                "required" => false,
                "conditional_logic" => false,
                "clone" => [
                    "group_982e082a3bcfcf81b766eaa1ec2df4f11e0f5cd3"
                ],
                "display" => "group",
                "layout" => "block",
                "prefix_label" => false,
                "prefix_name" => true
            ],
            [
                "key" => "field_59229bda372c9",
                "label" => __('Page Headline', 'ohio'),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_59229bda38e8d",
                "label" => __('Page headline', 'ohio'),
                "name" => "global_page_header_title_visibility",
                "type" => "true_false",
                "instructions" => __('Show page headline on all pages?', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_59229bda3868f",
                "label" => __('Page headline fullscreen mode', 'ohio'),
                "name" => "global_page_header_title_fullscreen",
                "type" => "true_false",
                "instructions" => __('Enable fullscreen height for page headline?', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 0,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_59229bda38a78",
                "label" => __('Page headline height', 'ohio'),
                "name" => "global_page_header_title_height",
                "type" => "ohio_responsive_height",
                "instructions" => __('Set up page headline height', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda3868f",
                            "operator" => "!=",
                            "value" => "1"
                        ]
                    ]
                ],
                "default_value" => ""
            ],
            [
                "key" => "field_59229e431eaea",
                "label" => __('Page headline alignment', 'ohio'),
                "name" => "global_page_header_title_align",
                "type" => "radio",
                "instructions" => __('Choose page headline content position', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "choices" => [
                    "left" => __('Left', 'ohio'),
                    "center" => __('Center', 'ohio'),
                    "right" => __('Right', 'ohio')
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "left",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_5922a0ea1eaebgrp",
                "label" => __('Page headline background', 'ohio'),
                "name" => "global_page_header_title",
                "type" => "clone",
                "instructions" => __('Choose the background for pages headline', 'ohio'),
                "required" => false,
                "conditional_logic" => false,
                "clone" => [
                    "group_982e082a3bcfcf81b766eaa1ec2df4f11e0f5cd3"
                ],
                "display" => "group",
                "layout" => "block",
                "prefix_label" => false,
                "prefix_name" => true
            ],
            [
                "key" => "field_59229bda376e8",
                "label" => __('Page headline overlay', 'ohio'),
                "name" => "global_page_header_title_use_overlay",
                "type" => "true_false",
                "instructions" => __('Add colored overlay over background image?', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_59229bda37acf",
                "label" => __('Page headline overlay color', 'ohio'),
                "name" => "global_page_header_title_overlay_color",
                "type" => "ohio_color",
                "instructions" => __('Choose background overlay color', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda376e8",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "default_value" => ""
            ],
            [
                "key" => "field_59229bwjeofwnheof3920",
                "label" => __('Page headline parallax', 'ohio'),
                "name" => "global_page_header_title_use_parallax",
                "type" => "true_false",
                "instructions" => __('Add parallax effect to background image?', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 0,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_5937sc63g152w346",
                "label" => '<h4>' . __('Back Link Settings', 'ohio') . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_5922qef4g4376e8",
                "label" => __('Go back button', 'ohio'),
                "name" => "global_page_header_previous_button",
                "type" => "true_false",
                "instructions" => __('Add back link button to previous page?', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_59256hderger8",
                "label" => __('Go back button text', 'ohio'),
                "name" => "global_page_header_previous_button_text",
                "type" => "text",
                "instructions" => __('Add text for previous button', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5922qef4g4376e8",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "message" => "",
                "default_value" => __('Back', 'ohio'),
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_5937sc62g152w346",
                "label" => '<h4>' . __('Typography Settings', 'ohio') . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_59223452345a3827b",
                "label" => __('Go back button typography', 'ohio'),
                "name" => "global_page_header_previous_button_typo",
                "type" => "ohio_typo",
                "instructions" => __('Set up typography for go back button', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5922qef4g4376e8",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_59229bda3827b",
                "label" => __('Title typography', 'ohio'),
                "name" => "global_page_header_title_typo",
                "type" => "ohio_typo",
                "instructions" => __('Set up typography for hero titles', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0
            ],
            [
                "key" => "field_59229d1dd0a61",
                "label" => __('Subtitle typography', 'ohio'),
                "name" => "global_page_header_subtitle_typo",
                "type" => "ohio_typo",
                "instructions" => __('Set up typography for subtitles', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0
            ],
            [
                "key" => "field_591b0f20ed84s",
                "label" => __('Page Sidebar', 'ohio'),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "wrapper" => [
                    "width" => "",
                    "class" => "",
                    "id" => ""
                ],
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_59390deaf218c",
                "label" => __('Sidebar', 'ohio'),
                "name" => "global_page_sidebar_position",
                "type" => "radio",
                "instructions" => __('Enable sidebar on all pages?', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "choices" => [
                    "without" => __('Disable sidebar', 'ohio'),
                    "left" => __('Left', 'ohio'),
                    "right" => __('Right', 'ohio')
                ],
                "default_value" => [
                    "left"
                ],
                "allow_null" => 0,
                "multiple" => 0,
                "ui" => 0,
                "layout" => "horizontal",
                "ajax" => 0,
                "return_format" => "value",
                "placeholder" => ""
            ],
            [
                "key" => "field_59392223423434234c",
                "label" => __('Sidebar layout', 'ohio'),
                "name" => "global_page_sidebar_layout",
                "type" => "select",
                "instructions" => __('Choose sidebar layout', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59390deaf218c",
                            "operator" => "!=",
                            "value" => "without"
                        ]
                    ]
                ],
                "choices" => [
                    "simple" => __('Simple', 'ohio'),
                    "boxed" => __('Boxed', 'ohio')
                ],
                "default_value" => [
                    "simple"
                ],
                "return_format" => "value"
            ],
            [
                "key" => "field_593s45s15af5g9t",
                "label" => '<h4>' . __('Typography Settings', 'ohio') . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_5937e3a33b3exmod15",
                "label" => __('Widget heading typography', 'ohio'),
                "name" => "global_widgets_heading_typo",
                "type" => "ohio_typo",
                "instructions" => __('Set up typography styles for widget heading', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0
            ],
            [
                "key" => "field_5937e3a33f4exmod15",
                "label" => __('Widget content typography', 'ohio'),
                "name" => "global_widgets_content_typo",
                "type" => "ohio_typo",
                "instructions" => __('Set up typography styles for widget content', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0
            ],
            [
                "key" => "field_591b0f20ed84e",
                "label" => __('Breadcrumbs', 'ohio'),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_591ac509d29ee",
                "label" => __('Breadcrumbs', 'ohio'),
                "name" => "global_page_breadcrumbs_visibility",
                "type" => "true_false",
                "instructions" => __('Show breadcrumbs on all pages?', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_591b10dbb4a85",
                "label" => __('Breadcrumbs separator', 'ohio'),
                "name" => "global_breadcrumbs_separator",
                "type" => "text",
                "instructions" => __('Use custom HTML or UTF-8 symbols. Slashes or arrows are recommended', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_591ac509d29ee",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "wrapper" => [
                    "width" => "",
                    "class" => "",
                    "id" => ""
                ],
                "default_value" => "",
                "placeholder" => "",
                "prepend" => "",
                "append" => "",
                "maxlength" => 250
            ],
            [
                "key" => "field_591ac509d2e0d",
                "label" => __('Breadcrumbs home slug', 'ohio'),
                "name" => "global_page_show_home_breadcrumb",
                "type" => "true_false",
                "instructions" => __('Show', 'ohio') . '<em>' . __('Home /', 'ohio') . '</em>' . __('slug in breadcrumbs', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_591ac509d29ee",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "wrapper" => [
                    "width" => "",
                    "class" => "",
                    "id" => ""
                ],
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_591ac509d1208grpbcbac",
                "label" => __('Breadcrumbs background', 'ohio'),
                "name" => "global_page_breadcrumbs",
                "type" => "clone",
                "instructions" => __('Choose breadcrumbs bar background', 'ohio'),
                "required" => false,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_591ac509d29ee",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "clone" => [
                    "group_982e082a3bcfcf81b766eaa1ec2df4f11e0f5cd3"
                ],
                "display" => "group",
                "layout" => "block",
                "prefix_label" => false,
                "prefix_name" => true
            ],
            [
                "key" => "field_593s35s15af5g9t",
                "label" => '<h4>' . __('Typography Settings', 'ohio') . '</h4>',
                "name" => "",
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_591ac509d29ee",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "type" => "message"
            ],
            [
                "key" => "field_591ef10cd845c",
                "label" => __('Breadcrumbs typography', 'ohio'),
                "name" => "global_page_breadcrumbs_text_typo",
                "type" => "ohio_typo",
                "instructions" => __('Choose breadcrumbs typography', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_591ac509d29ee",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ]
            ],
            [
                "key" => "field_591b0f30ed84e",
                "label" => "Other",
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_592s35f15af5g9t",
                "label" => '<h4>' . __('Back Smooth Scrolling', 'ohio') . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_591ac509d4234",
                "label" => __('Scroll-to-top', 'ohio'),
                "name" => "global_page_show_arrow",
                "type" => "true_false",
                "instructions" => __('Show scroll-to-top arrow on all pages', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_591ac509d4235",
                "label" => __('Scroll-to-top on mobiles', 'ohio'),
                "name" => "global_page_show_arrow_mobile",
                "type" => "true_false",
                "instructions" => __('Show scroll-to-top arrow on mobile devices', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_591ac509d4234",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "message" => "",
                "default_value" => 0,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_591ac509d465a",
                "label" => __('Scroll-to-top typography', 'ohio'),
                "name" => "global_page_arrow_typo",
                "type" => "ohio_typo",
                "instructions" => __('Set up scroll-to-top typography for all pages', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_591ac509d4234",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ]
            ],
            [
                "key" => "field_5937e1905d075d24",
                "label" => __('Scroll-to-top position', 'ohio'),
                "name" => "global_page_arrow_position",
                "type" => "select",
                "instructions" => __('Choose scroll-to-top position', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_591ac509d4234",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "choices" => [
                    "left" => __('Left side', 'ohio'),
                    "right" => __('Right side', 'ohio')
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "left",
                "layout" => "horizontal",
                "return_format" => "value"
            ]
        ],
        "location" => [
            [
                [
                    "param" => "options_page",
                    "operator" => "==",
                    "value" => "theme-general-pages"
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
