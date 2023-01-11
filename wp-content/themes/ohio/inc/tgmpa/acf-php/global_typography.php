<?php if (function_exists('acf_add_local_field_group')) :

    acf_add_local_field_group([
        "key" => "group_5946360af343c5",
        "title" => __('Typography Settings', 'ohio'),
        "private" => true,
        "fields" => [
            [
                "key" => "field_542f5ad4313bf",
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
                "key" => "field_593754645mod153",
                "label" => "",
                "name" => "",
                "type" => "message",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "message" => '<p class="message">' . '<span class="dashicons dashicons-editor-help"></span>' . __('Typography settings apply to all the pages of your site.', 'ohio') . '</p>',
                "new_lines" => "",
                "esc_html" => 0
            ],
            [
                "key" => "field_59229bd23ssaf154235",
                "label" => __('Fonts source', 'ohio'),
                "name" => "global_page_font_type",
                "type" => "image_option",
                "instructions" => __('Choose fonts source for your website', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "image_option_value" => [
                    [
                        "name" => "google_fonts",
                        "description" => __('Google Fonts', 'ohio'),
                        "src" => "acf__image_google.svg"
                    ],
                    [
                        "name" => "adobe_fonts",
                        "description" => __('Adobe Fonts', 'ohio'),
                        "src" => "acf__image_adobe.svg"
                    ],
                    [
                        "name" => "manual_custom_fonts",
                        "description" => __('Custom Fonts', 'ohio'),
                        "src" => "acf__image_custom.svg"
                    ]
                ],
                "default_value" => "google_fonts"
            ],
            [
                "key" => "field_591a34534s9d31f3",
                "label" => __('Adobe Fonts project ID', 'ohio'),
                "name" => "global_adobekit_url",
                "type" => "text",
                "instructions" => __('Create and paste your', 'ohio') . '&nbsp;<a target="_blank" href="https://fonts.adobe.com/">Adobe Fonts</a>&nbsp;' . __('web project ID', 'ohio') . '<em>' . __('(e.g. f3g5j8g)', 'ohio') . '</em>',
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bd23ssaf154235",
                            "operator" => "==",
                            "value" => "adobe_fonts"
                        ]
                    ]
                ],
                "default_value" => "",
                "placeholder" => __('Paste your web project ID', 'ohio'),
                "prepend" => "",
                "append" => "",
                "maxlength" => 200
            ],
            [
                "key" => "field_5c4ec3e96dbf8",
                "label" => __('Adobe Fonts list', 'ohio'),
                "name" => "global_adobekit_fonts",
                "type" => "repeater",
                "instructions" => __('Add', 'ohio') . '&nbsp;<a target="_blank" href="https://fonts.adobe.com/">Adobe Fonts</a>&nbsp;' . __('web fonts to use on your website', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bd23ssaf154235",
                            "operator" => "==",
                            "value" => "adobe_fonts"
                        ]
                    ]
                ],
                "collapsed" => "",
                "min" => 0,
                "max" => 0,
                "layout" => "table",
                "button_label" => __('Add Font', 'ohio'),
                "sub_fields" => [
                    [
                        "key" => "field_5c4ec3f36dbf9",
                        "label" => __('Font family', 'ohio') . '<b>' . __('(e.g. adobe-caslon-pro)', 'ohio') . '</b>',
                        "name" => "font_family",
                        "type" => "text",
                        "instructions" => "",
                        "required" => 1,
                        "conditional_logic" => 0,
                        "wrapper" => [
                            "width" => "",
                            "class" => "",
                            "id" => ""
                        ],
                        "default_value" => "",
                        "placeholder" => "",
                        "prepend" => "",
                        "append" => "",
                        "maxlength" => ""
                    ],
                    [
                        "key" => "field_5c4ec45a6dbfa",
                        "label" => __('Font styles', 'ohio'),
                        "name" => "font_styles",
                        "type" => "checkbox",
                        "instructions" => "",
                        "required" => 1,
                        "conditional_logic" => 0,
                        "wrapper" => [
                            "width" => "",
                            "class" => "",
                            "id" => ""
                        ],
                        "choices" => [
                            "thin",
                            "light",
                            "regular",
                            "bold",
                            "ultrabold"
                        ],
                        "allow_custom" => 0,
                        "default_value" => [
                            400
                        ],
                        "layout" => "horizontal",
                        "toggle" => 1,
                        "return_format" => "value",
                        "save_custom" => 0
                    ]
                ]
            ],
            [
                "key" => "field_5e47f43b4e629",
                "label" => __('Custom fonts list', 'ohio'),
                "name" => "global_manual_custom_fonts",
                "type" => "repeater",
                "instructions" => __('Add custom web fonts to use on your website', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bd23ssaf154235",
                            "operator" => "==",
                            "value" => "manual_custom_fonts"
                        ]
                    ]
                ],
                "wrapper" => [
                    "width" => "",
                    "class" => "",
                    "id" => ""
                ],
                "collapsed" => "",
                "min" => 0,
                "max" => 0,
                "layout" => "table",
                "button_label" => __('Add Font', 'ohio'),
                "sub_fields" => [
                    [
                        "key" => "field_5e47f8f4e135a",
                        "label" => __('Font family (name)', 'ohio'),
                        "name" => "font_name",
                        "type" => "text",
                        "instructions" => "",
                        "required" => 0,
                        "conditional_logic" => 0,
                        "wrapper" => [
                            "width" => "",
                            "class" => "",
                            "id" => ""
                        ],
                        "default_value" => "",
                        "placeholder" => "",
                        "prepend" => "",
                        "append" => "",
                        "maxlength" => ""
                    ],
                    [
                        "key" => "field_5e47f93fe135b",
                        "label" => __('Font weight', 'ohio'),
                        "name" => "font_weight",
                        "type" => "select",
                        "instructions" => "",
                        "required" => 0,
                        "conditional_logic" => 0,
                        "wrapper" => [
                            "width" => "",
                            "class" => "",
                            "id" => ""
                        ],
                        "choices" => [
                            "100" => "100 (Thin)",
                            "200" => "200 (Light)",
                            "300" => "300 (Book)",
                            "400" => "400 (Regular)",
                            "500" => "500 (Medium)",
                            "600" => "600 (Semi-bold)",
                            "700" => "700 (Bold)",
                            "800" => "800 (Black)",
                            "900" => "900 (Ultra-black)"
                        ],
                        "default_value" => [
                            "400"
                        ],
                        "allow_null" => 0,
                        "multiple" => 0,
                        "ui" => 0,
                        "return_format" => "value",
                        "ajax" => 0,
                        "placeholder" => ""
                    ],
                    [
                        "key" => "field_5e47f991e135c",
                        "label" => __('Font style', 'ohio'),
                        "name" => "font_style",
                        "type" => "select",
                        "instructions" => "",
                        "required" => 0,
                        "conditional_logic" => 0,
                        "wrapper" => [
                            "width" => "",
                            "class" => "",
                            "id" => ""
                        ],
                        "choices" => [
                            "" => __('Normal', 'ohio'),
                            "italic" => __('Italic', 'ohio')
                        ],
                        "default_value" => [
                            "normal"
                        ],
                        "allow_null" => 0,
                        "multiple" => 0,
                        "ui" => 0,
                        "return_format" => "value",
                        "ajax" => 0,
                        "placeholder" => ""
                    ],
                    [
                        "key" => "field_5e47f4494e62a",
                        "label" => __('.ttf/.otf font file', 'ohio'),
                        "name" => "ttfotf_font_file",
                        "type" => "file",
                        "instructions" => "",
                        "required" => 0,
                        "conditional_logic" => 0,
                        "wrapper" => [
                            "width" => "",
                            "class" => "",
                            "id" => ""
                        ],
                        "return_format" => "url",
                        "library" => "all",
                        "min_size" => "",
                        "max_size" => "",
                        "mime_types" => "ttf,otf"
                    ],
                    [
                        "key" => "field_5e47f4d94e62b",
                        "label" => __('.woff/.woff2 font file', 'ohio'),
                        "name" => "woff_font_file",
                        "type" => "file",
                        "instructions" => "",
                        "required" => 0,
                        "conditional_logic" => 0,
                        "wrapper" => [
                            "width" => "",
                            "class" => "",
                            "id" => ""
                        ],
                        "return_format" => "url",
                        "library" => "all",
                        "min_size" => "",
                        "max_size" => "",
                        "mime_types" => "woff,woff2"
                    ]
                ]
            ],
            [
                "key" => "field_542f4ad4313bf",
                "label" => __('Fonts', 'ohio'),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_591ac509d1630",
                "label" => __('Paragraphs', 'ohio'),
                "name" => "global_page_text_typo",
                "type" => "ohio_typo",
                "instructions" => __('Set up typography styles for paragraphs', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_591ac509d1a45",
                "label" => __('Headings', 'ohio'),
                "name" => "global_page_headings_typo",
                "type" => "ohio_typo",
                "instructions" => __('Set up typography styles for headings', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_591ac509d2622",
                "label" => __('Subtitles', 'ohio'),
                "name" => "global_page_subtitles_typo",
                "type" => "ohio_typo",
                "instructions" => __('Set up typography styles for subtitles', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_54245ad4313bf",
                "label" => __('Adaptive Options', 'ohio'),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_591ac509d2622mod1",
                "label" => __('Paragraphs', 'ohio'),
                "name" => "global_page_paragraphs_font_sizes",
                "type" => "ohio_sizes",
                "instructions" => __('Set up responsive typography styles for paragraphs.', 'ohio') . '<em>' . __('(Use CSS Units', 'ohio') . '<a href="https://www.w3schools.com/cssref/css_units.asp" target="_blank">[?]</a>)</em>',
                "required" => 0,
                "conditional_logic" => 0
            ],
            [
                "key" => "field_591ac509d2622h1",
                "label" => __('Headings H1', 'ohio'),
                "name" => "global_page_titles_h1_font_sizes",
                "type" => "ohio_sizes",
                "instructions" => __('Set up responsive typography styles for H1 headings.', 'ohio') . '<em>' . __('(Use CSS Units', 'ohio') . '<a href="https://www.w3schools.com/cssref/css_units.asp" target="_blank">[?]</a>)</em>',
                "required" => 0,
                "conditional_logic" => 0
            ],
            [
                "key" => "field_591ac509d2622h2",
                "label" => __('Headings H2', 'ohio'),
                "name" => "global_page_titles_h2_font_sizes",
                "type" => "ohio_sizes",
                "instructions" => __('Set up responsive typography styles for H2 headings.', 'ohio') . '<em>' . __('(Use CSS Units', 'ohio') . '<a href="https://www.w3schools.com/cssref/css_units.asp" target="_blank">[?]</a>)</em>',
                "required" => 0,
                "conditional_logic" => 0
            ],
            [
                "key" => "field_591ac509d2622h3",
                "label" => __('Headings H3', 'ohio'),
                "name" => "global_page_titles_h3_font_sizes",
                "type" => "ohio_sizes",
                "instructions" => __('Set up responsive typography styles for H3 headings.', 'ohio') . '<em>' . __('(Use CSS Units', 'ohio') . '<a href="https://www.w3schools.com/cssref/css_units.asp" target="_blank">[?]</a>)</em>',
                "required" => 0,
                "conditional_logic" => 0
            ],
            [
                "key" => "field_591ac509d2622h4",
                "label" => __('Headings H4', 'ohio'),
                "name" => "global_page_titles_h4_font_sizes",
                "type" => "ohio_sizes",
                "instructions" => __('Set up responsive typography styles for H4 headings.', 'ohio') . '<em>' . __('(Use CSS Units', 'ohio') . '<a href="https://www.w3schools.com/cssref/css_units.asp" target="_blank">[?]</a>)</em>',
                "required" => 0,
                "conditional_logic" => 0
            ],
            [
                "key" => "field_591ac509d2622h5",
                "label" => __('Headings H5', 'ohio'),
                "name" => "global_page_titles_h5_font_sizes",
                "type" => "ohio_sizes",
                "instructions" => __('Set up responsive typography styles for H5 headings.', 'ohio') . '<em>' . __('(Use CSS Units', 'ohio') . '<a href="https://www.w3schools.com/cssref/css_units.asp" target="_blank">[?]</a>)</em>',
                "required" => 0,
                "conditional_logic" => 0
            ],
            [
                "key" => "field_591ac509d2622h6",
                "label" => __('Headings H6', 'ohio'),
                "name" => "global_page_titles_h6_font_sizes",
                "type" => "ohio_sizes",
                "instructions" => __('Set up responsive typography styles for H6 headings.', 'ohio') . '<em>' . __('(Use CSS Units', 'ohio') . '<a href="https://www.w3schools.com/cssref/css_units.asp" target="_blank">[?]</a>)</em>',
                "required" => 0,
                "conditional_logic" => 0
            ],
            [
                "key" => "field_591ac509d2622mod3",
                "label" => __('Subtitles', 'ohio'),
                "name" => "global_page_subtitles_font_sizes",
                "type" => "ohio_sizes",
                "instructions" => 'Set up responsive typography styles for subtitles. <em>(Use CSS Units <a href="https://www.w3schools.com/cssref/css_units.asp" target="_blank">[?]</a>)</em>',
                "required" => 0,
                "conditional_logic" => 0
            ]
        ],
        "location" => [
            [
                [
                    "param" => "options_page",
                    "operator" => "==",
                    "value" => "theme-general-typography"
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
