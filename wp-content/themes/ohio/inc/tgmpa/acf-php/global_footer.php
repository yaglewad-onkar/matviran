<?php if (function_exists('acf_add_local_field_group')) :

    acf_add_local_field_group([
        "key" => "group_592fd88fb4838",
        "title" => __('Footer Settings', 'ohio'),
        "private" => true,
        "fields" => [
            [
                "key" => "field_592fdb59946d8",
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
                "key" => "field_5937e0a52b488cexmod59",
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
                "key" => "field_592fd8901e284",
                "label" => __('Footer', 'ohio'),
                "name" => "global_page_footer_visibility",
                "type" => "true_false",
                "instructions" => __('Show footer on all pages?', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_592fd8901ea9a",
                "label" => __('Footer wrapper', 'ohio'),
                "name" => "global_page_footer_is_wrapped",
                "type" => "true_false",
                "instructions" => __('Add footer content wrapper to all pages', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_591ac5s9d31fqawsfvawg",
                "label" => __('Footer wrapper width', 'ohio'),
                "name" => "global_page_footer_content_wrapper_width",
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
                "key" => "field_591b10dbb4a85_fasgfaq3qa",
                "label" => __('Footer full-width layout margins', 'ohio'),
                "name" => "global_page_footer_full_width_margins_size",
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
                "key" => "field_592fd8901ca70grp",
                "label" => __('Footer background', 'ohio'),
                "name" => "global_page_footer",
                "type" => "clone",
                "instructions" => __('Choose footer background', 'ohio'),
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
                "key" => "field_593916111579e",
                "label" => __('Sticky footer', 'ohio'),
                "name" => "global_page_footer_is_sticky",
                "type" => "true_false",
                "instructions" => __('Set footer to be sticky (fixed) on all pages', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 0,
                "ui" => 1,
                "ui_on_text" => "",
                "ui_off_text" => ""
            ],
            [
                "key" => "field_592s31s15af5g9t",
                "label" => '<h4>' . __('Typography Settings', 'ohio') . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_5940e34gvedrgiqw",
                "label" => __('Footer widget heading', 'ohio'),
                "name" => "global_page_footer_widget_title_typo",
                "type" => "ohio_typo",
                "instructions" => __('Set up typography styles for widget heading', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0
            ],
            [
                "key" => "field_5940ebca457f2",
                "label" => __('Footer widget content', 'ohio'),
                "name" => "global_page_footer_text_typo",
                "type" => "ohio_typo",
                "instructions" => __('Set up typography styles for widget content', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0
            ],
            [
                "key" => "field_592fdb63946d9",
                "label" => __('Copyright Bar', 'ohio'),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_592fd8901ee80",
                "label" => __('Copyright bar', 'ohio'),
                "name" => "global_page_footer_copyright_visibility",
                "type" => "true_false",
                "instructions" => __('Show copyright bar on all pages?', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_592fd8901d6a1",
                "label" => __('Copyright bar content position', 'ohio'),
                "name" => "global_footer_copyright_alignment",
                "type" => "select",
                "instructions" => __('Choose copyright content position', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "choices" => [
                    "left_and_right" => __('Space between', 'ohio'),
                    "center" => __('Center', 'ohio')
                ],
                "default_value" => [
                    "left_and_right"
                ],
                "allow_null" => 0,
                "multiple" => 0,
                "ui" => 0,
                "ajax" => 0,
                "return_format" => "value",
                "placeholder" => ""
            ],
            [
                "key" => "field_592fd8901f24bae3",
                "label" => __('Copyright bar content', 'ohio'),
                "name" => "global_footer_copyright_center",
                "type" => "text",
                "instructions" => __('Add some content to copyright bar. You can use HTML tags', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fd8901d6a1",
                            "operator" => "==",
                            "value" => "center"
                        ]
                    ]
                ],
                "default_value" => __('© 2020, Ohio Theme. Made with passion by', 'ohio') . '<a href="http://clbthemes.com" target="_blank">Colabrio</a>',
                "placeholder" => "",
                "prepend" => "",
                "append" => "",
                "maxlength" => ""
            ],
            [
                "key" => "field_592fd8901f24baes",
                "label" => __('Copyright bar element', 'ohio') . '&nbsp;<em>' . __('(left side)', 'ohio') . '</em>',
                "name" => "global_footer_copyright_left",
                "type" => "text",
                "instructions" => __('Add some content to copyright bar', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fd8901d6a1",
                            "operator" => "==",
                            "value" => "left_and_right"
                        ]
                    ]
                ],
                "default_value" => __('© 2020, Ohio Theme. Made with passion by', 'ohio') . '<a href="http://clbthemes.com" target="_blank">Colabrio</a>',
                "placeholder" => "",
                "prepend" => __('HTML allowed', 'ohio'),
                "append" => "",
                "maxlength" => ""
            ],
            [
                "key" => "field_592fd8901f24bfee",
                "label" => __('Copyright bar element', 'ohio') . '&nbsp;<em>' . __('(right side)', 'ohio') . '</em>',
                "name" => "global_footer_copyright_right",
                "type" => "text",
                "instructions" => __('Add some content to copyright bar', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fd8901d6a1",
                            "operator" => "==",
                            "value" => "left_and_right"
                        ]
                    ]
                ],
                "default_value" => __('All right reserved.', 'ohio'),
                "placeholder" => "",
                "prepend" => __('HTML allowed', 'ohio'),
                "append" => "",
                "maxlength" => ""
            ],
            [
                "key" => "field_592fd8901f63agrp",
                "label" => __('Copyright bar background', 'ohio'),
                "name" => "global_page_footer_copyright_section",
                "type" => "clone",
                "instructions" => __('Setup copyright section background', 'ohio'),
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
                "key" => "field_592s37s15af5g9t",
                "label" => '<h4>' . __('Typography Settings', 'ohio') . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_592fd8901fa31",
                "label" => __('Copyright bar typography', 'ohio'),
                "name" => "global_page_footer_copyright_section_text_typo",
                "type" => "ohio_typo",
                "instructions" => __('Choose copyright bar typography', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => ""
            ],
            [
                "key" => "field_592fd8901fa32",
                "label" => __('Copyright bar links color', 'ohio'),
                "name" => "global_page_footer_copyright_section_links_color",
                "type" => "ohio_color",
                "instructions" => __('Choose copyright bar links color', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => ""
            ],
            [
                "key" => "field_592fdb17946d7",
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
                "key" => "field_593235346111579e",
                "label" => __('Elements dynamic colors for dark/light mode', 'ohio'),
                "name" => "global_page_footer_fixed_typography_color",
                "type" => "true_false",
                "instructions" => __('Dynamically change page elements color for dark/light footer (social networks, back link)', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 0,
                "ui" => 1,
                "ui_on_text" => "",
                "ui_off_text" => ""
            ],
            [
                "key" => "field_5937a7a521f8sebmod23",
                "label" => '<h4>' . __('Logo Widget', 'ohio') . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_592fd8901ba9e",
                "label" => __('Footer site logo', 'ohio'),
                "name" => "global_page_footer_logo_widget_type",
                "type" => "select",
                "instructions" => __('Choose footer logo type', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "choices" => [
                    "light_variant" => __('Light variant logo', 'ohio'),
                    "dark_variant" => __('Dark variant logo', 'ohio'),
                    "sitename" => __('Text logo', 'ohio'),
                    "custom" => __('Custom loaded image', 'ohio')
                ],
                "default_value" => [
                    "light_variant"
                ],
                "allow_null" => 0,
                "multiple" => 0,
                "ui" => 0,
                "ajax" => 0,
                "return_format" => "value",
                "placeholder" => ""
            ],
            [
                "key" => "field_592fd8901beb6",
                "label" => __('Text logo settings', 'ohio'),
                "name" => "global_page_footer_sitename_typo",
                "type" => "ohio_typo",
                "instructions" => __('Custom typography settings for site name', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fd8901ba9e",
                            "operator" => "==",
                            "value" => "sitename"
                        ]
                    ]
                ],
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_592fd8901c689",
                "label" => __('Logo image', 'ohio'),
                "name" => "global_page_footer_custom_logo",
                "type" => "image",
                "instructions" => __('Upload custom image for footer logo', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fd8901ba9e",
                            "operator" => "==",
                            "value" => "custom"
                        ]
                    ]
                ],
                "return_format" => "url",
                "preview_size" => "thumbnail",
                "library" => "all",
                "min_width" => 10,
                "min_height" => 10,
                "min_size" => "",
                "max_width" => 1600,
                "max_height" => 800,
                "max_size" => 5,
                "mime_types" => ""
            ]
        ],
        "location" => [
            [
                [
                    "param" => "options_page",
                    "operator" => "==",
                    "value" => "theme-general-footer"
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
