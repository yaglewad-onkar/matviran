<?php if (function_exists('acf_add_local_field_group')) :

    acf_add_local_field_group([
        "key" => "group_59229bda27ee2",
        "title" => __('Header Settings', 'ohio'),
        "private" => true,
        "fields" => [
            [
                "key" => "field_59229bda313bf",
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
                "key" => "field_5937e0a52b48cexmod15",
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
                "key" => "field_592fd8902e284",
                "label" => __('Header', 'ohio'),
                "name" => "global_page_header_visibility",
                "type" => "true_false",
                "instructions" => __('Show header on all pages?', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_59229bda317ae",
                "label" => __('Header layout', 'ohio'),
                "name" => "global_page_header_menu_style",
                "type" => "image_option",
                "instructions" => __('Choose layout type for page header', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "image_option_value" => [
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
                "default_value" => "style1"
            ],
            [
                "key" => "field_59229bda31f95",
                "label" => __('Header blank spacer', 'ohio'),
                "name" => "global_page_header_add_cap",
                "type" => "true_false",
                "instructions" => __('We suggest using this option with transparent and fixed headers', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => 1,
                "layout" => "horizontal",
                "return_format" => "value",
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_59229bda31bb0",
                "label" => __('Header wrapper', 'ohio'),
                "name" => "global_page_header_menu_use_wrapper",
                "type" => "true_false",
                "instructions" => __('Enable header content wrapper', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_591ac5s9d31f4576",
                "label" => __('Header wrapper width', 'ohio'),
                "name" => "global_page_header_content_wrapper_width",
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
                "key" => "field_591b10dbb4a85_f5er4y",
                "label" => __('Header full-width layout margins', 'ohio'),
                "name" => "global_page_header_full_width_margins_size",
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
                "key" => "field_592d3cfcc0e1c",
                "label" => __('Header height', 'ohio'),
                "name" => "global_page_header_menu_height",
                "type" => "ohio_responsive_height",
                "instructions" => __('Set up header height', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda317ae",
                            "operator" => "!=",
                            "value" => "style6"
                        ],
                        [
                            "field" => "field_59229bda317ae",
                            "operator" => "!=",
                            "value" => "style7"
                        ]
                    ]
                ],
                "default_value" => ""
            ],
            [
                "key" => "field_591ac509d1208gbgclrlcfpagjstglgbl64",
                "label" => __('Header background', 'ohio'),
                "name" => "global_page_header_menu",
                "type" => "clone",
                "instructions" => __('Choose header background', 'ohio'),
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
                "key" => "field_59229bda34745",
                "label" => __('Header border', 'ohio'),
                "name" => "global_page_header_menu_border_visibility",
                "type" => "true_false",
                "instructions" => __('Show header border?', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_59229bda34f19",
                "label" => __('Header border type', 'ohio'),
                "name" => "global_page_header_menu_border_type",
                "type" => "select",
                "instructions" => __('Choose border line style', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda34745",
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
                "key" => "field_59229bda34b30",
                "label" => __('Header border color', 'ohio'),
                "name" => "global_page_header_menu_border_color",
                "type" => "ohio_color",
                "instructions" => __('Choose border color', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda34745",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "default_value" => ""
            ],
            [
                "key" => "field_59224bda313bf",
                "label" => __('Sticky Header', 'ohio'),
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
                "key" => "field_59229bda3432a",
                "label" => __('Sticky header', 'ohio'),
                "name" => "global_page_header_menu_fixed",
                "type" => "true_false",
                "instructions" => __('Enable sticky header, which is fixed at the top as you scroll', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_593743a434383415",
                "label" => __('Sticky header on mobile', 'ohio'),
                "name" => "global_page_header_mobile_menu_fixed",
                "type" => "true_false",
                "instructions" => __('Enable sticky header on mobile devices', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 0,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_59374453f84415",
                "label" => __('Sticky header initial offset', 'ohio'),
                "name" => "global_page_header_fixed_initial_offset",
                "type" => "number",
                "instructions" => __('Scroll position when sticky header begins to appear', 'ohio') . '<em>' . __('(Use pixels)', 'ohio') . '</em>',
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => "150",
                "placeholder" => "",
                "prepend" => "",
                "append" => "px",
                "min" => 1,
                "max" => 100000,
                "step" => ""
            ],
            [
                "key" => "field_5937433334383415",
                "label" => __('Sticky header height', 'ohio'),
                "name" => "global_page_header_fixed_height",
                "type" => "ohio_responsive_height",
                "instructions" => __('Set up sticky header height', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0
            ],
            [
                "key" => "field_591ac509d1208gbgclrstckhdrmagjstglgbl64",
                "label" => __('Sticky header background', 'ohio'),
                "name" => "global_page_header_fixed",
                "type" => "clone",
                "instructions" => __('Choose sticky header background', 'ohio'),
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
                "key" => "field_59229bda34745984hgfs",
                "label" => __('Fixed header border', 'ohio'),
                "name" => "global_page_fixed_header_menu_border_visibility",
                "type" => "true_false",
                "instructions" => __('Show fixed header border?', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 0,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_59229bda34f1945ge",
                "label" => __('Fixed header border type', 'ohio'),
                "name" => "global_page_fixed_header_menu_border_type",
                "type" => "select",
                "instructions" => __('Choose border line style', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda34745984hgfs",
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
                "key" => "field_59229bda34b30er7yu5",
                "label" => __('Fixed header border color', 'ohio'),
                "name" => "global_page_fixed_header_menu_border_color",
                "type" => "ohio_color",
                "instructions" => __('Choose border color', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda34745984hgfs",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "default_value" => ""
            ],
            [
                "key" => "field_593s23s15af5g9t",
                "label" => '<h4>' . __('Typography Settings', 'ohio') . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_59229bda33f448347i7a6",
                "label" => __('Sticky header typography', 'ohio'),
                "name" => "global_page_header_fixed_text_typo",
                "type" => "ohio_typo",
                "instructions" => __('Set up typography styles for sticky header', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0
            ],
            [
                "key" => "field_59229bda35325",
                "label" => __('Subheader', 'ohio'),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_59229bda35701",
                "label" => __('Subheader', 'ohio'),
                "name" => "global_page_subheader_visibility",
                "type" => "true_false",
                "instructions" => __('Show subheader on all pages?', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_592d3dfbff372",
                "label" => __('Subheader height', 'ohio'),
                "name" => "global_page_subheader_height",
                "type" => "ohio_responsive_height",
                "instructions" => __('Set up subheader height', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => ""
            ],
            [
                "key" => "field_59229bda36adbsubheadasstglgbl64backglb",
                "label" => __('Subheader background', 'ohio'),
                "name" => "global_page_subheader",
                "type" => "clone",
                "instructions" => __('Choose subheader background', 'ohio'),
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
                "key" => "field_59229bda366f4",
                "label" => __('Subheader elements', 'ohio') . '<em>&nbsp;' . __('(left side)', 'ohio') . '</em>',
                "name" => "global_page_subheader_items_left",
                "type" => "repeater",
                "instructions" => __('Add content items to subheader', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "collapsed" => "",
                "min" => 0,
                "max" => 20,
                "layout" => "table",
                "button_label" => __('+ Add item', 'ohio'),
                "sub_fields" => [
                    [
                        "key" => "field_59229bda6c954",
                        "label" => __('Items list', 'ohio'),
                        "name" => "items",
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
                        "prepend" => __('HTML allowed', 'ohio'),
                        "maxlength" => 100
                    ]
                ]
            ],
            [
                "key" => "field_59229bda366f5",
                "label" => __('Subheader elements', 'ohio') . '<em>&nbsp;' . __('(right side)', 'ohio') . '</em>',
                "name" => "global_page_subheader_items_right",
                "type" => "repeater",
                "instructions" => __('Add content items to subheader', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "collapsed" => "",
                "min" => 0,
                "max" => 20,
                "layout" => "table",
                "button_label" => __('+ Add item', 'ohio'),
                "sub_fields" => [
                    [
                        "key" => "field_59229bda6c955",
                        "label" => __('Items list', 'ohio'),
                        "name" => "items",
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
                        "prepend" => __('HTML allowed', 'ohio'),
                        "maxlength" => 100
                    ]
                ]
            ],
            [
                "key" => "field_59229bdasqw512g",
                "label" => __('Subheader currency switcher', 'ohio'),
                "name" => "global_woocommerce_header_currency_switcher",
                "type" => "true_false",
                "instructions" => __('Enable currency switcher in subheader', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 0,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_593be8a6dfsa4w",
                "label" => __('Subheader language switcher', 'ohio'),
                "name" => "global_woocommerce_header_lanhuage_switcher",
                "type" => "true_false",
                "instructions" => __('Enable language switcher in subheader', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 0,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_593s35s15af5g9t",
                "label" => '<h4>' . __('Typography Settings', 'ohio') . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_59229bda36ed1",
                "label" => __('Subheader typography', 'ohio'),
                "name" => "global_page_subheader_text_typo",
                "type" => "ohio_typo",
                "instructions" => __('Set up typography for subheader', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0
            ],
            [
                "key" => "field_59229bda35326",
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
                "key" => "field_5932353461115237958h",
                "label" => __('Elements dynamic colors for dark/light mode', 'ohio'),
                "name" => "global_page_header_dynamic_typography_color",
                "type" => "true_false",
                "instructions" => __('Dynamically change header elements color for dark/light sections ', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 0,
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
                    "value" => "theme-general-header"
                ]
            ]
        ],
        "menu_order" => 1,
        "position" => "normal",
        "style" => "default",
        "label_placement" => "left",
        "instruction_placement" => "label",
        "hide_on_screen" => "",
        "active" => 1,
        "description" => ""
    ]);

endif;
