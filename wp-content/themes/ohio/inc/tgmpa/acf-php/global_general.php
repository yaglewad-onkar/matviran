<?php if (function_exists('acf_add_local_field_group')) :

    acf_add_local_field_group([
        "key" => "group_592d60af343c5",
        "title" => __('General Settings', 'ohio'),
        "private" => true,
        "fields" => [
            [
                "key" => "field_54224ad4313bf",
                "label" => __('Theme Styling', 'ohio'),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_5937e0a52b48cexmod151",
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
                "key" => "field_591ac509cfa00",
                "label" => __('Brand color', 'ohio'),
                "name" => "global_page_brand_color",
                "type" => "ohio_color",
                "instructions" => __('Choose the accent color for your website', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => ""
            ],
            [
                "key" => "field_591ac509cfa01",
                "label" => __('Cursor selection color', 'ohio'),
                "name" => "global_page_selection_color",
                "type" => "ohio_color",
                "instructions" => __('Choose the accent color for a highlighted text', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => ""
            ],
            [
                "key" => "field_5937e3a43b38cexmod15",
                "label" => __('Links color', 'ohio'),
                "name" => "global_page_links_color",
                "type" => "ohio_color",
                "instructions" => __('Choose the color for your website links', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => ""
            ],
            [
                "key" => "field_5937e3a33b35exmod15",
                "label" => __('Borders color', 'ohio'),
                "name" => "global_page_borders_color",
                "type" => "ohio_color",
                "instructions" => __('Choose the color for your website borders', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => ""
            ],
            [
                "key" => "field_5937e3a33f35exmod15",
                "label" => __('Fill background color', 'ohio'),
                "name" => "global_page_backgrounds_color",
                "type" => "ohio_color",
                "instructions" => __('Choose the background color for your website elements and sections with grey fill (e.g. comments, product details)', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => ""
            ],
            [
                "key" => "field_54229ad4313bf",
                "label" => __('Site Identity', 'ohio'),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_59229bda32383",
                "label" => __('Site logo', 'ohio'),
                "name" => "global_page_header_logo_style",
                "type" => "radio",
                "instructions" => __('Add a logo for your website', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "choices" => [
                    "sitename" => __('Text logo', 'ohio'),
                    "image" => __('Image logo', 'ohio')
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "sitename",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_5937e3a52b38cexmod15",
                "label" => __('Text logo', 'ohio'),
                "name" => "global_page_header_logo_text",
                "type" => "text",
                "instructions" => __('Enter the title text for your website', 'ohio'),
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda32383",
                            "operator" => "==",
                            "value" => "sitename"
                        ]
                    ]
                ],
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_59256ac3f42ec",
                "label" => __('Text logo typography', 'ohio'),
                "name" => "global_page_header_sitename_typo",
                "type" => "ohio_typo",
                "instructions" => __('Set up typography for the website title', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda32383",
                            "operator" => "==",
                            "value" => "sitename"
                        ]
                    ]
                ],
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_59229bda32f63",
                "label" => __('Site logo light variant', 'ohio'),
                "name" => "global_page_header_logo_image",
                "type" => "clone",
                "instructions" => __('Upload light-colored variant. Used for fullscreen menu by default', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda32383",
                            "operator" => "==",
                            "value" => "image"
                        ]
                    ]
                ],
                "clone" => [
                    "field_5936b2dd92771",
                    "field_5936b357132bf",
                    "field_5936b371132c0"
                ],
                "display" => "group",
                "layout" => "table",
                "prefix_label" => 0,
                "prefix_name" => 0
            ],
            [
                "key" => "field_5936add283a9a",
                "label" => __('Site logo dark variant', 'ohio'),
                "name" => "global_page_header_logo_image_dark_variant",
                "type" => "clone",
                "instructions" => __('Upload dark-colored variant. Used for scrolled fixed header by default', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda32383",
                            "operator" => "==",
                            "value" => "image"
                        ]
                    ]
                ],
                "clone" => [
                    "field_5936af24f4b7e",
                    "field_5936afd421bba",
                    "field_5936affb21bbb"
                ],
                "display" => "group",
                "layout" => "table",
                "prefix_label" => 0,
                "prefix_name" => 0
            ],
            [
                "key" => "field_5937e1905d075",
                "label" => __('Site logo by default', 'ohio'),
                "name" => "global_page_header_logo_by_default",
                "type" => "select",
                "instructions" => __('Choose default logo variant', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda32383",
                            "operator" => "==",
                            "value" => "image"
                        ]
                    ]
                ],
                "choices" => [
                    "dark_variant" => __('Dark variant', 'ohio'),
                    "light_variant" => __('Light variant', 'ohio')
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "dark_variant",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_5937e1905d075_fixed",
                "label" => __('Site logo for sticky header', 'ohio'),
                "name" => "global_page_header_logo_when_fixed",
                "type" => "select",
                "instructions" => __('Choose logo variant for sticky header', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda32383",
                            "operator" => "==",
                            "value" => "image"
                        ]
                    ]
                ],
                "choices" => [
                    "dark_variant" => __('Dark variant', 'ohio'),
                    "light_variant" => __('Light variant', 'ohio'),
                    "inherit" => __('Default logo variant', 'ohio'),
                    "custom" => __('Custom image', 'ohio'),
                    "sitename" => __('Text logo', 'ohio')
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "dark_variant",
                "layout" => "vertical",
                "return_format" => "value"
            ],
            [
                "key" => "field_5936add283a9a_fix",
                "label" => __('Site logo for sticky header', 'ohio'),
                "name" => "global_page_header_logo_image_fixed_variant",
                "type" => "clone",
                "instructions" => __('Upload logo variant for sticky header', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5937e1905d075_fixed",
                            "operator" => "==",
                            "value" => "custom"
                        ]
                    ]
                ],
                "clone" => [
                    "field_5936af24f4b7e_fix",
                    "field_5936afd421bba_fix",
                    "field_5936affb21bbb_fix"
                ],
                "display" => "group",
                "layout" => "table",
                "prefix_label" => 0,
                "prefix_name" => 0
            ],
            [
                "key" => "field_5937e3a52aouhfasuf9892",
                "label" => __('Site logo height', 'ohio'),
                "name" => "global_page_header_logo_height",
                "type" => "ohio_responsive_height",
                "instructions" => __('Set a height for your website logo', 'ohio') . '<em>' . __('(Use pixels***)', 'ohio') . '</em>',
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda32383",
                            "operator" => "==",
                            "value" => "image"
                        ]
                    ]
                ],
                "append" => "px"
            ],
            [
                "key" => "field_54224ad4313bs",
                "label" => __('Site Preloader', 'ohio'),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_591ac509d3e51",
                "label" => __('Preloader', 'ohio'),
                "name" => "global_page_preloader_visibility",
                "type" => "true_false",
                "instructions" => __('Enable preloader animation', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 0,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_5937e3a3234324234",
                "label" => __('Preloader type', 'ohio'),
                "name" => "global_page_preloader_type",
                "type" => "image_option",
                "instructions" => __('Choose loading image for website preloader', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_591ac509d3e51",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "default_value" => "classic_circle",
                "image_option_value" => [
                    [
                        "name" => "classic_circle",
                        "description" => __('Classic spinner', 'ohio'),
                        "src" => "acf__image_13.1.svg"
                    ],
                    [
                        "name" => "circle",
                        "description" => __('Circle spinner', 'ohio'),
                        "src" => "acf__image_11.svg"
                    ],
                    [
                        "name" => "waves",
                        "description" => __('Waves', 'ohio'),
                        "src" => "acf__image_08.svg"
                    ],
                    [
                        "name" => "double_bounce",
                        "description" => __('Double bounce', 'ohio'),
                        "src" => "acf__image_09.svg"
                    ],
                    [
                        "name" => "folding_cube",
                        "description" => __('Folding cube', 'ohio'),
                        "src" => "acf__image_14.svg"
                    ],
                    [
                        "name" => "percentage",
                        "description" => __('Percentage', 'ohio'),
                        "src" => "acf__image_13.2.svg"
                    ],
                    [
                        "name" => "custom_loader",
                        "description" => __('Custom image', 'ohio'),
                        "src" => "acf__image_custom.svg"
                    ]
                ],
                "new_lines" => "",
                "esc_html" => 0
            ],
            [
                "key" => "field_5rqsf22dd92771",
                "label" => __('Custom preloader', 'ohio'),
                "name" => "global_custom_page_preloader",
                "type" => "image",
                "instructions" => __('Upload a custom preloader image', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5937e3a3234324234",
                            "operator" => "==",
                            "value" => "custom_loader"
                        ]
                    ]
                ],
                "return_format" => "url",
                "preview_size" => "thumbnail",
                "library" => "all",
                "min_width" => "",
                "min_height" => "",
                "min_size" => "",
                "max_width" => "",
                "max_height" => "",
                "max_size" => "",
                "mime_types" => ""
            ],
            [
                "key" => "field_59381c77504b2r2e1",
                "label" => __('Page animation', 'ohio'),
                "name" => "global_page_fade_in_animation",
                "type" => "true_false",
                "instructions" => __('Fade in animation on page load', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_591ac509d3e51",
                            "operator" => "==",
                            "value" => "1"
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
                "key" => "field_592d5938aee39",
                "label" => __('Preloader color', 'ohio'),
                "name" => "global_page_preloader_shapes_color",
                "type" => "ohio_color",
                "instructions" => __('Choose color for preloader shape', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => ""
            ],
            [
                "key" => "field_592d4579aee38",
                "label" => __('Preloader background color', 'ohio'),
                "name" => "global_page_preloader_background",
                "type" => "ohio_color",
                "instructions" => __('Set background color for preloader', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => ""
            ],
            [
                "key" => "field_54224ad4316bd",
                "label" => __('Color Mode', 'ohio'),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_591ac509d3se51",
                "label" => __('Dark mode', 'ohio'),
                "name" => "global_page_dark_mode",
                "type" => "true_false",
                "instructions" => __('Enable dark color scheme for your website', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 0,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_591ac509d3se5f",
                "label" => __('Dark mode background color', 'ohio'),
                "name" => "global_page_dark_mode_background_color",
                "type" => "ohio_color",
                "instructions" => __('Choose the dark mode background color', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => ""
            ],
            [
                "key" => "field_591ac509d3se522",
                "label" => __('Color mode switcher', 'ohio'),
                "name" => "global_page_dark_mode_switcher",
                "type" => "true_false",
                "instructions" => __('Enable color mode switcher for your website', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 0,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_591ac509d3se3463",
                "label" => __('Color mode switcher on mobile', 'ohio'),
                "name" => "global_page_dark_mode_switcher_mobile",
                "type" => "true_false",
                "instructions" => __('Enable color mode switcher on mobile', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 0,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_5937e1905d075d23",
                "label" => __('Color mode switcher position', 'ohio'),
                "name" => "global_page_dark_mode_switcher_position",
                "type" => "select",
                "instructions" => __('Choose color mode switcher position', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_591ac509d3se522",
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
            ],
            [
                "key" => "field_591ac509d3se52s",
                "label" => __('Save color mode', 'ohio'),
                "name" => "global_page_dark_mode_save_state",
                "type" => "true_false",
                "instructions" => __('Save color mode while toggle the switcher', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_54224ad4316bf",
                "label" => __('Other', 'ohio'),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_5937a0a521481ebmod2s3",
                "label" => '<h4>' . __('Site Cursor', 'ohio') . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_591ac509d3se52",
                "label" => __('Custom cursor', 'ohio'),
                "name" => "global_page_custom_cursor",
                "type" => "true_false",
                "instructions" => __('Enable custom cursor for your website', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 0,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_591ac509d3se52cl",
                "label" => __('Cursor color', 'ohio'),
                "name" => "global_page_custom_cursor_color",
                "type" => "ohio_color",
                "instructions" => __('Choose custom cursor color', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_591ac509d3se52",
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
            ]
        ],
        "location" => [
            [
                [
                    "param" => "options_page",
                    "operator" => "==",
                    "value" => "theme-general"
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
