<?php if (function_exists('acf_add_local_field_group')) :

    acf_add_local_field_group([
        "key" => "group_59390deae2279_page_options",
        "title" => __('Page Settings', 'ohio'),
        "private" => true,
        "fields" => [
            [
                "key" => "field_59390d235353d",
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
                "key" => "field_5937e0a52b488cexmod60",
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
                "key" => "field_5937afa621s71ebmod23",
                "label" => '<h4>' . __('Site Identity', 'ohio') . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_59391a16302be",
                "label" => __('Site logo', 'ohio'),
                "name" => "header_logo_style",
                "type" => "select",
                "instructions" => __('Choose a logo for this page', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "choices" => [
                    "inherit" => __('Use from Theme Settings', 'ohio'),
                    "dark_variant" => __('Dark variant', 'ohio'),
                    "light_variant" => __('Light variant', 'ohio'),
                    "sitename" => __('Text logo', 'ohio'),
                    "custom" => __('Custom image', 'ohio')
                ],
                "default_value" => [],
                "allow_null" => 0,
                "multiple" => 0,
                "ui" => 0,
                "ajax" => 0,
                "return_format" => "value",
                "placeholder" => ""
            ],
            [
                "key" => "field_59390deaf09ac",
                "label" => __('Text logo settings', 'ohio'),
                "name" => "header_sitename_typo",
                "type" => "ohio_typo",
                "instructions" => __('Custom typography options for text logo', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59391a16302be",
                            "operator" => "==",
                            "value" => "sitename"
                        ]
                    ]
                ],
                "default_value" => "inherit",
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_59411f87d2536",
                "label" => __('Custom logo', 'ohio'),
                "name" => "header_custom_logo",
                "type" => "image",
                "instructions" => __('Choose logo image for this page', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59391a16302be",
                            "operator" => "==",
                            "value" => "custom"
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
                "key" => "field_5937afa621s71eqfas",
                "label" => '<h4>' . __('Color Mode', 'ohio') . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_591ac509d3se51781624591h",
                "label" => __('Dark mode', 'ohio'),
                "name" => "dark_mode",
                "type" => "inherited_checkbox",
                "instructions" => __('Enable dark color scheme for this page', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "custom_labels" => [
                    "inherit" => __('Use from Theme Settings', 'ohio'),
                    "yes" => __('Yes', 'ohio'),
                    "no" => __('No', 'ohio')
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "inherit",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_591ac509d3se51781624593t",
                "label" => __('Color mode switcher', 'ohio'),
                "name" => "dark_mode_switcher",
                "type" => "inherited_checkbox",
                "instructions" => __('Enable color mode switcher for this page', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "custom_labels" => [
                    "inherit" => __('Use from Theme Settings', 'ohio'),
                    "yes" => __('Yes', 'ohio'),
                    "no" => __('No', 'ohio')
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "inherit",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_59390d235453d",
                "label" => __('Menu', 'ohio'),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_5837s0ae5fd23s15a",
                "label" => '<h4>' . __('General', 'ohio') . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_59390deaefde5",
                "label" => __('Menu type', 'ohio'),
                "name" => "header_menu_type",
                "type" => "radio",
                "instructions" => __('Choose menu type of this page', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "choices" => [
                    "inherit" => __('Use from Theme Settings', 'ohio'),
                    "full" => __('Standard menu', 'ohio'),
                    "hamburger" => __('Hamburger menu', 'ohio'),
                    "both" => __('Both menus', 'ohio')
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "inherit",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_59390deaefzxfmod",
                "label" => __('Hamburger menu layout', 'ohio'),
                "name" => "fullscreen_menu_style",
                "type" => "image_option",
                "instructions" => __('Choose layout type for a hamburger menu', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59390deaefde5",
                            "operator" => "==",
                            "value" => "hamburger"
                        ]
                    ],
                    [
                        [
                            "field" => "field_59390deaefde5",
                            "operator" => "==",
                            "value" => "both"
                        ]
                    ]
                ],
                "image_option_value" => [
                    [
                        "name" => "inherit",
                        "description" => __('Use from Theme Settings', 'ohio'),
                        "src" => "acf__image_inherited.svg"
                    ],
                    [
                        "name" => "default",
                        "description" => __('Standard', 'ohio'),
                        "src" => "acf__image_34.svg"
                    ],
                    [
                        "name" => "centered",
                        "description" => __('Centered', 'ohio'),
                        "src" => "acf__image_35.svg"
                    ],
                    [
                        "name" => "split",
                        "description" => __('Creative', 'ohio'),
                        "src" => "acf__image_36.svg"
                    ]
                ],
                "default_value" => "inherit"
            ],
            [
                "key" => "field_5937s0ae5fd23s15a",
                "label" => '<h4>' . __('Other', 'ohio') . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_592d43df9e26cs",
                "label" => __('Search', 'ohio'),
                "name" => "header_search_visibility",
                "type" => "inherited_checkbox",
                "instructions" => __('Show search icon on the current page', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "custom_labels" => [
                    "inherit" => __('Use from Theme Settings', 'ohio'),
                    "yes" => __('Yes', 'ohio'),
                    "no" => __('No', 'ohio')
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "inherit",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_592d43df9f212cs",
                "label" => __('Search position', 'ohio'),
                "name" => "header_search_position",
                "type" => "select",
                "instructions" => __('Choose search icon position for all pages', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592d43df9e26cs",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "choices" => [
                    "standard" => __('Standard position', 'ohio'),
                    "fixed" => __('Fixed position', 'ohio')
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "full",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_59267bda33fg234fd4s",
                "label" => __('Search icon color', 'ohio'),
                "name" => "header_search_color",
                "type" => "ohio_color",
                "instructions" => __('Choose color for header items', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592d43df9f212cs",
                            "operator" => "==",
                            "value" => "fixed"
                        ]
                    ]
                ],
                "default_value" => ""
            ],
            [
                "key" => "field_59390deaeee3d",
                "label" => __('Header', 'ohio'),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_5937s0a25fd23s15a",
                "label" => '<h4>' . __('General', 'ohio') . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_59390deaef9efdd",
                "label" => __('Header', 'ohio'),
                "name" => "header_visibility",
                "type" => "true_false",
                "instructions" => __('Show header on this page?', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "yes",
                "layout" => "horizontal",
                "return_format" => "value",
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_59390deaefzxf",
                "label" => __('Header layout', 'ohio'),
                "name" => "header_menu_style",
                "type" => "image_option",
                "instructions" => __('Choose the layout type for page header', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "image_option_value" => [
                    [
                        "name" => "inherit",
                        "description" => __('Use from Theme Settings', 'ohio'),
                        "src" => "acf__image_inherited.svg"
                    ],
                    [
                        "name" => "style1",
                        "description" => __('Standard', 'ohio'),
                        "src" => "acf__image_01.svg"
                    ],
                    [
                        "name" => "style2",
                        "description" => __('With top logo', 'ohio'),
                        "src" => "acf__image_02.svg"
                    ],
                    [
                        "name" => "style3",
                        "description" => __('With center menu', 'ohio'),
                        "src" => "acf__image_04.svg"
                    ],
                    [
                        "name" => "style4",
                        "description" => __('With center logo', 'ohio'),
                        "src" => "acf__image_05.svg"
                    ],
                    [
                        "name" => "style5",
                        "description" => __('With sidebar menu', 'ohio'),
                        "src" => "acf__image_06.svg"
                    ],
                    [
                        "name" => "style6",
                        "description" => __('With top hamburger', 'ohio'),
                        "src" => "acf__image_07.svg"
                    ],
                    [
                        "name" => "style7",
                        "description" => __('With center hamburger', 'ohio'),
                        "src" => "acf__image_08.svg"
                    ]
                ],
                "default_value" => "inherit"
            ],
            [
                "key" => "field_59390deaef9ea",
                "label" => __('Header blank spacer', 'ohio'),
                "name" => "header_add_cap",
                "type" => "inherited_checkbox",
                "instructions" => __('We suggest using this option with transparent and fixed headers', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "custom_labels" => [
                    "inherit" => __('Use from Theme Settings', 'ohio'),
                    "yes" => __('Add spacer', 'ohio'),
                    "no" => __('Do not add spacer', 'ohio')
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "inherit",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_59390deaef614",
                "label" => __('Header wrapper', 'ohio'),
                "name" => "header_menu_use_wrapper",
                "type" => "inherited_checkbox",
                "instructions" => __('Use header content wrapper', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "custom_labels" => [
                    "inherit" => __('Use from Theme Settings', 'ohio'),
                    "yes" => __('Yes', 'ohio'),
                    "no" => __('No', 'ohio')
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "inherit",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_59411fcf0048f",
                "label" => __('Header styles', 'ohio'),
                "name" => "header_menu_style_settings",
                "type" => "radio",
                "instructions" => __('Define custom header styles', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "choices" => [
                    "inherit" => __('Use from Theme Settings', 'ohio'),
                    "custom" => __('Custom', 'ohio')
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "inherit",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_5941276d0b89b",
                "label" => __('Header height', 'ohio'),
                "name" => "header_menu_height",
                "type" => "ohio_responsive_height",
                "instructions" => __('Set up header height', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59411fcf0048f",
                            "operator" => "==",
                            "value" => "custom"
                        ]
                    ]
                ],
                "default_value" => ""
            ],
            [
                "key" => "field_591ac509d1208gbgclrlcfpagbgmn",
                "label" => __('Header background', 'ohio'),
                "name" => "header_menu",
                "type" => "clone",
                "instructions" => __('Choose header background', 'ohio'),
                "required" => false,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59411fcf0048f",
                            "operator" => "==",
                            "value" => "custom"
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
                "key" => "field_59390deaf05bd",
                "label" => __('Header typography', 'ohio'),
                "name" => "header_menu_text_typo",
                "type" => "ohio_typo",
                "instructions" => __('Set up typography for header', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59411fcf0048f",
                            "operator" => "==",
                            "value" => "custom"
                        ]
                    ]
                ],
                "default_value" => "inherit",
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_5941261c69959",
                "label" => __('Header border', 'ohio'),
                "name" => "header_menu_border_visibility",
                "type" => "true_false",
                "instructions" => __('Show header border?', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59411fcf0048f",
                            "operator" => "==",
                            "value" => "custom"
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
                "key" => "field_594126ed0b898",
                "label" => __('Bottom border type', 'ohio'),
                "name" => "header_menu_border_type",
                "type" => "select",
                "instructions" => __('Choose border line style', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59411fcf0048f",
                            "operator" => "==",
                            "value" => "custom"
                        ],
                        [
                            "field" => "field_5941261c69959",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "choices" => [
                    "solid" => __('Solid', 'ohio'),
                    "dashed" => __('Dashed', 'ohio'),
                    "dotted" => __('Dotted', 'ohio'),
                    "double" => __('Double', 'ohio')
                ],
                "default_value" => [
                    "solid"
                ],
                "allow_null" => 0,
                "multiple" => 0,
                "ui" => 0,
                "ajax" => 0,
                "return_format" => "value",
                "placeholder" => ""
            ],
            [
                "key" => "field_594127340b89a",
                "label" => __('Bottom border color', 'ohio'),
                "name" => "header_menu_border_color",
                "type" => "ohio_color",
                "instructions" => __('Choose border color', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59411fcf0048f",
                            "operator" => "==",
                            "value" => "custom"
                        ],
                        [
                            "field" => "field_5941261c69959",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "default_value" => ""
            ],

            [
                "key" => "field_59390deaf1978asf32fadsgas",
                "label" => __('Elements dynamic colors for dark/light mode', 'ohio'),
                "name" => "header_dynamic_typography_color",
                "type" => "inherited_checkbox",
                "instructions" => __('Dynamically change header elements color for dark/light sections', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "custom_labels" => [
                    "inherit" => __('Use from Theme Settings', 'ohio'),
                    "yes" => __('Yes', 'ohio'),
                    "no" => __('No', 'ohio')
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "inherit",
                "layout" => "horizontal",
                "return_format" => "value"
            ],

            [
                "key" => "field_5937a0a25sd23s15a",
                "label" => '<h4>' . __('Sticky header', 'ohio') . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_59390deaf1978",
                "label" => __('Sticky header', 'ohio'),
                "name" => "header_menu_fixed",
                "type" => "inherited_checkbox",
                "instructions" => __('Enable sticky header, which is fixed at the top as you scroll', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "custom_labels" => [
                    "inherit" => __('Use from Theme Settings', 'ohio'),
                    "yes" => __('Yes', 'ohio'),
                    "no" => __('No', 'ohio')
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "inherit",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_5937a0a25fd23s15a",
                "label" => '<h4>' . __('Subheader', 'ohio') . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_59390deaf0da4",
                "label" => __('Subheader', 'ohio'),
                "name" => "subheader_visibility",
                "type" => "inherited_checkbox",
                "instructions" => __('Show subheader on this page?', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
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
                "key" => "field_5941030b7ce5d",
                "label" => __('Subheader styles', 'ohio'),
                "name" => "subheader_style",
                "type" => "radio",
                "instructions" => __('Choose subheader style', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "allow_null" => 0,
                "choices" => [
                    "inherit" => __('Use from Header & Menu Settings', 'ohio'),
                    "custom" => __('Custom', 'ohio')
                ],
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "inherit",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_5941040a97ec9",
                "label" => __('Subheader height', 'ohio'),
                "name" => "subheader_height",
                "type" => "ohio_responsive_height",
                "instructions" => __('Set up subheader height', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5941030b7ce5d",
                            "operator" => "==",
                            "value" => "custom"
                        ]
                    ]
                ],
                "default_value" => ""
            ],
            [
                "key" => "field_59229bda36adbsubheadasstglgbl64backglbp5",
                "label" => __('Subheader background', 'ohio'),
                "name" => "subheader",
                "type" => "clone",
                "instructions" => __('Choose subheader background', 'ohio'),
                "required" => false,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5941030b7ce5d",
                            "operator" => "==",
                            "value" => "custom"
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
                "key" => "field_59390deaf159e",
                "label" => __('Subheader typography', 'ohio'),
                "name" => "subheader_text_typo",
                "type" => "ohio_typo",
                "instructions" => __('Set up typography for subheader', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5941030b7ce5d",
                            "operator" => "==",
                            "value" => "custom"
                        ]
                    ]
                ],
                "default_value" => "inherit",
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_59390deb012f8",
                "label" => __('Page', 'ohio'),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_5937a0a35fd23s15a",
                "label" => '<h4>' . __('General', 'ohio') . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_59391464abd30",
                "label" => __('Double width', 'ohio'),
                "name" => "post_style_in_grid",
                "type" => "radio",
                "instructions" => __('Double the width of this post item', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "choices" => [
                    "default" => __('Default - 1-column wide', 'ohio'),
                    "2col" => __('Wide - 2-column wide', 'ohio')
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "default",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_59390deb03b1b",
                "label" => __('Page wrapper', 'ohio'),
                "name" => "add_wrapper",
                "type" => "inherited_checkbox",
                "instructions" => __('Add content wrapper to this page', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "custom_labels" => [
                    "inherit" => __('Use from Theme Settings', 'ohio'),
                    "yes" => __('Enable wrapper', 'ohio'),
                    "no" => __('Disable wrapper', 'ohio')
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "inherit",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_591b10dbb4a82342342345623",
                "label" => __('Page wrapper width', 'ohio'),
                "name" => "content_wrapper_width",
                "type" => "text",
                "instructions" => __('Set the container wrapper width', 'ohio') . '<em>&nbsp;' . __('(Use CSS-units)', 'ohio') . '</em>',
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => "1300px",
                "placeholder" => "",
                "prepend" => "",
                "append" => "",
                "maxlength" => 200
            ],
            [
                "key" => "field_591b10dbb4a85_fwgaps_local",
                "label" => __('Page full-width layout margins', 'ohio'),
                "name" => "full_width_margins_size",
                "type" => "text",
                "instructions" => __('Define side margins for full-width page container', 'ohio') . '<em>&nbsp;' . __('(Use CSS-units)', 'ohio') . '</em>',
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => "",
                "placeholder" => "",
                "prepend" => "",
                "append" => "",
                "maxlength" => 200
            ],
            [
                "key" => "field_59390deb03f38",
                "label" => __('Page content padding', 'ohio'),
                "name" => "add_top_padding",
                "type" => "inherited_checkbox",
                "instructions" => __('Add top and bottom paddings for page content', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "custom_labels" => [
                    "inherit" => __('Use from Theme Settings', 'ohio'),
                    "yes" => "Add",
                    "no" => __('No', 'ohio')
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "inherit",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_59390deb03738",
                "label" => __('Page boxed layout', 'ohio'),
                "name" => "use_boxed_wrapper",
                "type" => "inherited_checkbox",
                "instructions" => __('Wrap this page in boxed container?', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "custom_labels" => [
                    "inherit" => __('Use from Theme Settings', 'ohio'),
                    "yes" => __('Yes', 'ohio'),
                    "no" => __('No', 'ohio')
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "inherit",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_59381c77504bfasfeas",
                "label" => __('Page boxed layout margins', 'ohio'),
                "name" => "boxed_wrapper_margins_size",
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
                "key" => "field_59390deb0171egrp",
                "label" => __('Page background', 'ohio'),
                "name" => "",
                "type" => "clone",
                "instructions" => __('Choose the background for page', 'ohio'),
                "required" => false,
                "conditional_logic" => false,
                "clone" => [
                    "group_982e082a3bcfcf81b766eaa1ec2df4f11e0f5cd3"
                ],
                "display" => "group",
                "layout" => "block",
                "inherited_slug" => __('Use from Theme Settings', 'ohio'),
                "prefix_label" => false,
                "prefix_name" => false
            ],
            [
                "key" => "field_5937afa35fd23s15a",
                "label" => '<h4>' . __('Page Headline', 'ohio') . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_59390deb00ef1",
                "label" => __('Page headline', 'ohio'),
                "name" => "header_title_visibility",
                "type" => "inherited_checkbox",
                "instructions" => __('Show page headline on this page?', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
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
                "key" => "field_59390deb00733",
                "label" => __('Page headline fullscreen mode', 'ohio'),
                "name" => "header_title_fullscreen",
                "type" => "inherited_checkbox",
                "instructions" => __('Set fullscreen mode for page headline?', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "custom_labels" => [
                    "inherit" => __('Use from Theme Settings', 'ohio'),
                    "yes" => __('Yes', 'ohio'),
                    "no" => __('No', 'ohio')
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "inherit",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_59390deb00b09",
                "label" => __('Page headline height', 'ohio'),
                "name" => "header_title_height",
                "type" => "ohio_responsive_height",
                "instructions" => __('Set up page headline height', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59390deb00733",
                            "operator" => "!=",
                            "value" => "1"
                        ]
                    ]
                ],
                "default_value" => ""
            ],
            [
                "key" => "field_59391464a51e6",
                "label" => __('Post subtitle text', 'ohio'),
                "name" => "header_title_subtitle_type",
                "type" => "radio",
                "instructions" => __('Choose custom subtitle type', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "choices" => [
                    "generated" => "Author, date and comments",
                    "custom" => "Custom subtitle",
                    "without" => "Without subtitle"
                ],
                "default_value" => [
                    "generated"
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
                "key" => "field_593ddebba2fcb",
                "label" => __('Page headline subtitle', 'ohio'),
                "name" => "header_title_custom_subtitle_text",
                "type" => "text",
                "instructions" => __('Custom subtitle text', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => "",
                "placeholder" => "",
                "prepend" => "",
                "append" => "",
                "maxlength" => ""
            ],
            [
                "key" => "field_59390deb0034e",
                "label" => __('Page headline content position', 'ohio'),
                "name" => "header_title_align",
                "type" => "select",
                "instructions" => __('Choose page headline content position', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "choices" => [
                    "inherit" => __('Use from Theme Settings', 'ohio'),
                    "left" => __('Left', 'ohio'),
                    "center" => __('Center', 'ohio'),
                    "right" => __('Right', 'ohio'),
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
                "key" => "field_59390deaf218agrp",
                "label" => __('Page headline background', 'ohio'),
                "name" => "header_title",
                "type" => "clone",
                "instructions" => __('Choose the background for page headline', 'ohio'),
                "required" => false,
                "conditional_logic" => false,
                "clone" => [
                    "group_982e082a3bcfcf81b766eaa1ec2df4f11e0f5cd3"
                ],
                "display" => "group",
                "layout" => "block",
                "inherited_slug" => __('Use from Theme Settings', 'ohio'),
                "prefix_label" => false,
                "prefix_name" => true
            ],
            [
                "key" => "field_59390deaf3961",
                "label" => __('Page headline background overlay', 'ohio'),
                "name" => "header_title_use_overlay",
                "type" => "inherited_checkbox",
                "instructions" => __('Add colored overlay over background image?', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "custom_labels" => [
                    "inherit" => __('Use from Theme Settings', 'ohio'),
                    "yes" => __('Yes', 'ohio'),
                    "no" => __('No', 'ohio')
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "inherit",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_59390deaf3d98",
                "label" => __('Page headline background overlay color', 'ohio'),
                "name" => "header_title_overlay_color",
                "type" => "ohio_color",
                "instructions" => __('Choose background overlay color', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59390deaf3961",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "default_value" => ""
            ],
            [
                "key" => "field_59229bwjeofwnheof3921",
                "label" => __('Page headline parallax', 'ohio'),
                "name" => "header_title_use_parallax",
                "type" => "inherited_checkbox",
                "instructions" => __('Add parallax effect to background image?', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "custom_labels" => [
                    "inherit" => __('Use from Theme Settings', 'ohio'),
                    "yes" => __('Yes', 'ohio'),
                    "no" => __('No', 'ohio')
                ],
                "message" => "",
                "default_value" => "inherit",
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_593a55746376f",
                "label" => __('Page headline typography', 'ohio'),
                "name" => "typography_settings",
                "type" => "radio",
                "instructions" => __('Set up typography for page headline', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "choices" => [
                    "inherit" => __('Use from Theme Settings', 'ohio'),
                    "custom" => __('Custom', 'ohio')
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
                "key" => "field_593a55d0637fq",
                "label" => __('Go back button typography', 'ohio'),
                "name" => "header_previous_button_typo",
                "type" => "ohio_typo",
                "instructions" => __('Set up typography for go back button', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_593a55746376f",
                            "operator" => "==",
                            "value" => "custom"
                        ]
                    ]
                ],
                "default_value" => "inherit",
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_593a55d063770",
                "label" => __('Title settings', 'ohio'),
                "name" => "header_title_typo",
                "type" => "ohio_typo",
                "instructions" => __('Set up typography for hero titles', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_593a55746376f",
                            "operator" => "==",
                            "value" => "custom"
                        ]
                    ]
                ],
                "default_value" => "inherit",
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_593a565163771",
                "label" => __('Subtitle settings', 'ohio'),
                "name" => "header_subtitle_typo",
                "type" => "ohio_typo",
                "instructions" => __('Set up typography for subtitles', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_593a55746376f",
                            "operator" => "==",
                            "value" => "custom"
                        ]
                    ]
                ],
                "default_value" => "inherit",
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_5937a0a621s71ebs6d23",
                "label" => '<h4>' . __('Page Sidebar', 'ohio') . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_59390deaf218b",
                "label" => __('Sidebar', 'ohio'),
                "name" => "sidebar_position",
                "type" => "radio",
                "instructions" => __('Choose sidebar placement for all pages', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "choices" => [
                    "inherit" => __('Use from Theme Settings', 'ohio'),
                    "left" => __('Left', 'ohio'),
                    "right" => __('Right', 'ohio'),
                    "without" => __('Disable sidebar', 'ohio')
                ],
                "default_value" => [
                    "inherit"
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
                "key" => "field_592345234958934",
                "label" => __('Sidebar layout', 'ohio'),
                "name" => "sidebar_layout",
                "type" => "select",
                "instructions" => __('Choose sidebar layout', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "choices" => [
                    "inherit" => __('Use from Theme Settings', 'ohio'),
                    "simple" => __('Simple', 'ohio'),
                    "boxed" => __('Boxed', 'ohio'),
                ],
                "default_value" => [
                    "inherit"
                ],
                "return_format" => "value"
            ],
            [
                "key" => "field_592s45f15af5g9ts",
                "label" => '<h4>' . __('Breadcrumbs', 'ohio') . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_59390deb03328",
                "label" => __('Breadcrumbs', 'ohio'),
                "name" => "breadcrumbs_visibility",
                "type" => "inherited_checkbox",
                "instructions" => __('Show breadcrumbs on this page?', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
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
                "key" => "field_591ac509d1208grpbcbaclcl1",
                "label" => __('Breadcrumbs background', 'ohio'),
                "name" => "breadcrumbs",
                "type" => "clone",
                "instructions" => __('Choose breadcrumbs bar background', 'ohio'),
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
                "key" => "field_593db13395d12",
                "label" => __('Breadcrumbs typography', 'ohio'),
                "name" => "breadcrumbs_text_typo",
                "type" => "ohio_typo",
                "instructions" => __('Choose breadcrumbs typography', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => "inherit",
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_592s35f15af5g9ts",
                "label" => '<h4>' . __('Other', 'ohio') . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_591ac509d4234s",
                "label" => __('Scroll-to-top', 'ohio'),
                "name" => "show_arrow",
                "type" => "inherited_checkbox",
                "instructions" => __('Show scroll-to-top arrow on the current page', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "custom_labels" => [
                    "inherit" => __('Use from Theme Settings', 'ohio'),
                    "yes" => __('Yes', 'ohio'),
                    "no" => __('No', 'ohio')
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "inherit",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_591ac509d465as",
                "label" => __('Scroll-to-top typography', 'ohio'),
                "name" => "arrow_typo",
                "type" => "ohio_typo",
                "instructions" => __('Set up typography for the current page', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_591ac509d4234s",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "default_value" => "inherited",
                "add_theme_inherited" => true
            ],
            [
                "key" => "field_59390deb04364",
                "label" => __('Footer', 'ohio'),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_59321s81ebmod23",
                "label" => '<h4>' . __('General', 'ohio') . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_59390deb06b99",
                "label" => __('Footer', 'ohio'),
                "name" => "footer_visibility",
                "type" => "inherited_checkbox",
                "instructions" => __('Show footer on this page?', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "custom_labels" => [
                    "inherit" => __('Use from Theme Settings', 'ohio'),
                    "yes" => __('Hide', 'ohio'),
                    "no" => __('Show', 'ohio')
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "inherit",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_59390deb06fd1",
                "label" => __('Footer wrapper', 'ohio'),
                "name" => "footer_is_wrapped",
                "type" => "inherited_checkbox",
                "instructions" => __('Add footer content wrapper?', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "custom_labels" => [
                    "inherit" => __('Use from Theme Settings', 'ohio'),
                    "yes" => "Enable wrapper",
                    "no" => "Disable wrapper"
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "inherit",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_5940ec917da19",
                "label" => __('Footer typography', 'ohio'),
                "name" => "footer_text_typo",
                "type" => "ohio_typo",
                "instructions" => __('Choose content typography', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => "inherit",
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_59390deb057c5grp",
                "label" => __('Footer background', 'ohio'),
                "name" => "footer",
                "type" => "clone",
                "instructions" => __('Choose footer background', 'ohio'),
                "required" => false,
                "conditional_logic" => false,
                "clone" => [
                    "group_982e082a3bcfcf81b766eaa1ec2df4f11e0f5cd3"
                ],
                "display" => "group",
                "layout" => "block",
                "inherited_slug" => __('Use from Theme Settings', 'ohio'),
                "prefix_label" => false,
                "prefix_name" => true
            ],
            [
                "key" => "field_59391743def2b",
                "label" => __('Sticky footer', 'ohio'),
                "name" => "footer_is_sticky",
                "type" => "inherited_checkbox",
                "instructions" => __('Set sticky (fixed) footer on this page?', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "custom_labels" => [
                    "inherit" => __('Use from Theme Settings', 'ohio'),
                    "yes" => __('Yes', 'ohio'),
                    "no" => __('No', 'ohio')
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "inherit",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_5937a0a521s81ebmod23",
                "label" => '<h4>' . __('Copyright Bar', 'ohio') . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_59390dsb07397",
                "label" => __('Copyright section', 'ohio'),
                "name" => "footer_copyright_visibility",
                "type" => "inherited_checkbox",
                "instructions" => __('Show copyright section on this page?', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
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
                "key" => "field_592fd8901f63agrppg",
                "label" => __('Copyright bar background', 'ohio'),
                "name" => "footer_copyright_section",
                "type" => "clone",
                "instructions" => __('Choose section background', 'ohio'),
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
                "key" => "field_59390deb07b67",
                "label" => __('Copyright section text typography', 'ohio'),
                "name" => "footer_copyright_section_text_typo",
                "type" => "ohio_typo",
                "instructions" => __('Choose section content typography', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => "inherit",
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_59390deb07b68",
                "label" => __('Copyright section links color', 'ohio'),
                "name" => "footer_copyright_section_links_color",
                "type" => "ohio_color",
                "instructions" => __('Choose section content links color', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => ""
            ],
            [
                "key" => "field_593afasf1ebmod23",
                "label" => '<h4>' . __('Other', 'ohio') . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_59390deb04788",
                "label" => __('Footer site logo', 'ohio'),
                "name" => "footer_logo_widget_type",
                "type" => "select",
                "instructions" => __('Choose widget logo type', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "choices" => [
                    "inherit" => __('Use from Theme Settings', 'ohio'),
                    "light_variant" => __('Light variant logo', 'ohio'),
                    "dark_variant" => __('Dark variant logo', 'ohio'),
                    "sitename" => __('Text logo', 'ohio'),
                    "custom" => __('Custom image', 'ohio'),
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
                "key" => "field_5940dfabfe181",
                "label" => __('Footer site name settings', 'ohio'),
                "name" => "footer_sitename_typo",
                "type" => "ohio_typo",
                "instructions" => __('Custom settings for footer site name', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59390deb04788",
                            "operator" => "==",
                            "value" => "sitename"
                        ]
                    ]
                ],
                "default_value" => "inherit",
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_5940dfeafe182",
                "label" => __('Footer custom logo image', 'ohio'),
                "name" => "footer_custom_logo",
                "type" => "image",
                "instructions" => __('Custom logo image in footer', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59390deb04788",
                            "operator" => "==",
                            "value" => "custom"
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
                "key" => "field_59390deb07fa2",
                "label" => __('Custom CSS', 'ohio'),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_5937e0a52b456smod951",
                "label" => "",
                "name" => "",
                "type" => "message",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "message" => '<p class="message"><span class="dashicons dashicons-editor-help"></span>' . __('You won\'t lose the following CSS code after updating the theme.', 'ohio') . '</p>',
                "new_lines" => "",
                "esc_html" => 0
            ],
            [
                "key" => "field_59390deb083b5",
                "label" => __('Custom CSS styles', 'ohio'),
                "name" => "custom_css",
                "type" => "ohio_code",
                "instructions" => __('Write a custom CSS code here', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => "",
                "language" => "css"
            ],
            [
                "key" => "field_59390deb043641",
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
                "key" => "field_592s35f15af5g9l",
                "label" => '<h4>' . __('Social Networks', 'ohio') . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_l05mnk93kid43naf2l",
                "label" => __('Social networks typography', 'ohio'),
                "name" => "social_networks_typo",
                "type" => "ohio_typo",
                "instructions" => __('Set up typography styles for social networks', 'ohio'),
                "required" => 0,
                "default_value" => "inherit",
                "conditional_logic" => 0,
                "add_theme_inherited" => true
            ]
        ],
        "location" => [],
        "menu_order" => 3,
        "position" => "normal",
        "style" => "default",
        "label_placement" => "left",
        "instruction_placement" => "label",
        "hide_on_screen" => [
            "discussion",
            "comments",
            "author",
            "format"
        ],
        "active" => 1,
        "description" => ""
    ]);

endif;
