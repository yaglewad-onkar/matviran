<?php if (function_exists('acf_add_local_field_group')) :

    acf_add_local_field_group([
        "key" => "group_59229bda27se2",
        "title" => __('Menu Settings', 'ohio'),
        "private" => true,
        "fields" => [
            [
                "key" => "field_59221bda313bf",
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
                "key" => "field_5937easfasf15",
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
                "key" => "field_59229bda3374d",
                "label" => __('Menu type', 'ohio'),
                "name" => "global_page_header_menu_type",
                "type" => "radio",
                "instructions" => __('Choose menu type for all pages', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "choices" => [
                    "full" => __('Standard menu', 'ohio'),
                    "hamburger" => __('Hamburger menu', 'ohio'),
                    "both" => __('Both menus', 'ohio')
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "full",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_593s23s15af5g5tmod",
                "label" => '<h4>' . __('Standard menu', 'ohio') . '</h4>',
                "name" => "",
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda3374d",
                            "operator" => "!=",
                            "value" => "hamburger"
                        ]
                    ]
                ],
                "type" => "message"
            ],
            [
                "key" => "field_59229bda31ауеmod",
                "label" => __('Standard menu', 'ohio'),
                "name" => "global_page_extended_menu",
                "type" => "ohio_menu",
                "instructions" => __('Choose from already pre-made menus', 'ohio') . '&nbsp;<em>(' . __('Appearance', 'ohio') . '&nbsp;>&nbsp;' . '<a target="_blank" href="./nav-menus.php">' . __('Menus', 'ohio') . '</a>)</em>',
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda3374d",
                            "operator" => "!=",
                            "value" => "hamburger"
                        ]
                    ]
                ],
                "required" => 0,
                "default_value" => ""
            ],
            [
                "key" => "field_59374453f44415",
                "label" => __('Standard menu counters', 'ohio'),
                "name" => "global_page_header_counters_visibility",
                "type" => "true_false",
                "instructions" => __('Show counters on menu items', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda3374d",
                            "operator" => "!=",
                            "value" => "hamburger"
                        ]
                    ]
                ],
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_59374453f44416",
                "label" => __('Standard menu multi-level indicator', 'ohio'),
                "name" => "global_page_header_indicator_visibility",
                "type" => "true_false",
                "instructions" => __('Show submenu dropdown multi-level indicators on first level menu items', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda3374d",
                            "operator" => "!=",
                            "value" => "hamburger"
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
                "key" => "field_59229bda33f44",
                "label" => __('Standard menu typography', 'ohio'),
                "name" => "global_page_header_menu_text_typo",
                "type" => "ohio_typo",
                "instructions" => __('Set up typography for a standard menu', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda3374d",
                            "operator" => "!=",
                            "value" => "hamburger"
                        ]
                    ]
                ]
            ],
            [
                "key" => "field_593s23s15af5g9tmod",
                "label" => '<h4>' . __('Hamburger menu', 'ohio') . '</h4>',
                "name" => "",
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda3374d",
                            "operator" => "!=",
                            "value" => "full"
                        ]
                    ]
                ],
                "type" => "message"
            ],
            [
                "key" => "field_59229asf124а11ауеmod",
                "label" => __('Hamburger menu', 'ohio'),
                "name" => "global_page_hamburger_menu",
                "type" => "ohio_menu",
                "instructions" => __('Choose from already pre-made menus', 'ohio') . '&nbsp;<em>(' . __('Appearance', 'ohio') . '&nbsp;>&nbsp;' . '<a target="_blank" href="./nav-menus.php">' . __('Menus', 'ohio') . '</a>)</em>',
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda3374d",
                            "operator" => "!=",
                            "value" => "full"
                        ]
                    ]
                ],
                "required" => 0,
                "default_value" => ""
            ],
            [
                "key" => "field_59229bsa31d56",
                "label" => __('Hamburger menu position', 'ohio'),
                "name" => "global_page_header_menu_position",
                "type" => "select",
                "instructions" => __('Choose a hamburger menu position', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda3374d",
                            "operator" => "!=",
                            "value" => "full"
                        ]
                    ]
                ],
                "choices" => [
                    "left" => "Left",
                    "right" => "Right"
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
                "key" => "field_59229bda317s",
                "label" => __('Hamburger menu layout', 'ohio'),
                "name" => "global_page_fullscreen_menu_style",
                "type" => "image_option",
                "instructions" => __('Choose layout type for a hamburger menu', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda3374d",
                            "operator" => "==",
                            "value" => "hamburger"
                        ]
                    ],
                    [
                        [
                            "field" => "field_59229bda3374d",
                            "operator" => "==",
                            "value" => "both"
                        ]
                    ]
                ],
                "image_option_value" => [
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
                "default_value" => "default"
            ],
            [
                "key" => "field_591ac509d12stglgbl64",
                "label" => __('Hamburger menu background', 'ohio'),
                "name" => "global_page_header_overlay_menu",
                "type" => "clone",
                "instructions" => __('Choose background color for a hamburger menu', 'ohio'),
                "required" => false,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda3374d",
                            "operator" => "!=",
                            "value" => "full"
                        ],
                        [
                            "field" => "field_59229bda317ae",
                            "operator" => "!=",
                            "value" => "style3"
                        ],
                        [
                            "field" => "field_59229bda317ae",
                            "operator" => "!=",
                            "value" => "style4"
                        ],
                        [
                            "field" => "field_59229bda317ae",
                            "operator" => "!=",
                            "value" => "style5"
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
                "key" => "field_59229bda366f4md1",
                "label" => __('Hamburger menu details', 'ohio'),
                "name" => "global_page_overlay_menu_footer_items_left",
                "type" => "repeater",
                "instructions" => __('Add details for the hamburger menu', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda3374d",
                            "operator" => "==",
                            "value" => "hamburger"
                        ]
                    ],
                    [
                        [
                            "field" => "field_59229bda3374d",
                            "operator" => "==",
                            "value" => "both"
                        ]
                    ]
                ],
                "collapsed" => "",
                "min" => 0,
                "max" => 3,
                "layout" => "table",
                "button_label" => __('+ Add item', 'ohio'),
                "sub_fields" => [
                    [
                        "key" => "field_59229bda6c954md3",
                        "label" => __('Items list', 'ohio'),
                        "name" => "items",
                        "type" => "text",
                        "instructions" => "",
                        "required" => 0,
                        "conditional_logic" => 0,
                        "default_value" => "",
                        "placeholder" => "",
                        "prepend" => __('HTML allowed', 'ohio'),
                        "append" => "",
                        "maxlength" => 150
                    ]
                ]
            ],
            [
                "key" => "field_5922sdg2352agsdga",
                "label" => __('Social networks', 'ohio'),
                "name" => "global_page_hamburger_social_networks_visibility",
                "type" => "true_false",
                "instructions" => __('Show social networks in a hamburger menu', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda3374d",
                            "operator" => "!=",
                            "value" => "full"
                        ]
                    ]
                ],
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_5922sdg2352a23r",
                "label" => __('Language switcher', 'ohio'),
                "name" => "global_page_hamburger_lang_switcher_visibility",
                "type" => "true_false",
                "instructions" => __('Show language switcher in a hamburger menu', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda3374d",
                            "operator" => "!=",
                            "value" => "full"
                        ]
                    ]
                ],
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_59229bda33f44867i7a6",
                "label" => __('Hamburger menu typography', 'ohio'),
                "name" => "global_page_fullscreen_menu_text_typo",
                "type" => "ohio_typo",
                "instructions" => __('Set up typography for a hamburger menu', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda3374d",
                            "operator" => "!=",
                            "value" => "full"
                        ],
                        [
                            "field" => "field_59229bda317ae",
                            "operator" => "!=",
                            "value" => "style3"
                        ],
                        [
                            "field" => "field_59229bda317ae",
                            "operator" => "!=",
                            "value" => "style4"
                        ],
                        [
                            "field" => "field_59229bda317ae",
                            "operator" => "!=",
                            "value" => "style5"
                        ]
                    ]
                ]
            ],
            [
                "key" => "field_59221bd413bf",
                "label" => __('Mobile Menu', 'ohio'),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_59229bda31iyhkv",
                "label" => __('Mobile menu', 'ohio'),
                "name" => "global_page_extended_mobile_menu",
                "type" => "ohio_menu",
                "instructions" => __('Choose from already pre-made menus', 'ohio') . '&nbsp;<em>(' . __('Appearance', 'ohio') . '&nbsp;>&nbsp;' . '<a target="_blank" href="./nav-menus.php">' . __('Menus', 'ohio') . '</a>)</em>',
                "conditional_logic" => 0,
                "required" => 0,
                "default_value" => ""
            ],
            [
                "key" => "field_59374453f124122346236",
                "label" => __('Mobile menu initial resolution', 'ohio'),
                "name" => "global_page_mobile_menu_initial_resolution",
                "type" => "number",
                "instructions" => __('Resolution when mobile menu begins to appear', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => "768",
                "placeholder" => "",
                "prepend" => "",
                "append" => "px",
                "min" => 1,
                "max" => 100000,
                "step" => ""
            ],
            [
                "key" => "field_59374453644162rfqeac",
                "label" => __('Mobile menu 1st level items opening', 'ohio'),
                "name" => "global_page_mobile_second_click_link",
                "type" => "true_false",
                "instructions" => __('Enable opening of the 1st level menu items as regular links', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 0,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_59267bda33b33234fd4",
                "label" => __('Mobile menu color', 'ohio'),
                "name" => "global_page_mobile_header_menu_color",
                "type" => "ohio_color",
                "instructions" => __('Choose color for header items', 'ohio'),
                "required" => 0,
                "default_value" => ""
            ],
            [
                "key" => "field_59229bda33b33234fasgbgclrlcfpagjstglgbl64",
                "label" => __('Mobile menu background', 'ohio'),
                "name" => "global_page_mobile_header_menu",
                "type" => "clone",
                "instructions" => __('Choose mobile header background', 'ohio'),
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
                "key" => "field_59229bsa3110874uj",
                "label" => __('Mobile menu hamburger position', 'ohio'),
                "name" => "global_page_header_mobile_menu_position",
                "type" => "select",
                "instructions" => __('Choose hamburger position for mobile menu', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "choices" => [
                    "left" => __('Left', 'ohio'),
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
                "key" => "field_5937445364416",
                "label" => __('Social networks', 'ohio'),
                "name" => "global_page_mobile_social_networks_visibility",
                "type" => "true_false",
                "instructions" => __('Show social networks in mobile menu', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_5937445364415",
                "label" => __('Search', 'ohio'),
                "name" => "global_page_mobile_search_visibility",
                "type" => "true_false",
                "instructions" => __('Show search in mobile menu', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_593s34s15af5g9t",
                "label" => '<h4>' . __('Typography Settings', 'ohio') . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_59229bda36234d1",
                "label" => __('Mobile menu typography', 'ohio'),
                "name" => "global_mobile_header_menu_typo",
                "type" => "ohio_typo",
                "instructions" => __('Set up typography for mobile menu', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0
            ],
            [
                "key" => "field_5941bd413bs",
                "label" => __('One Page Menu', 'ohio'),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_59229bda3432amods",
                "label" => __('One Page Menu', 'ohio'),
                "name" => "global_header_onepage_mode",
                "type" => "true_false",
                "instructions" => __('Enable one page menu? Handle anchor links as section scroll trigger. Read', 'ohio') . '&nbsp;<a target="_blank" href="https://docs.clbthemes.com/ohio/tips-tricks/#onepage_menu">' . __('the setup guide', 'ohio') . '</a>',
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 0,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_5941bd413bf234",
                "label" => __('WPML', 'ohio'),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_592fe13500c38",
                "label" => __('WPML language switcher', 'ohio'),
                "name" => "global_wpml_show_in_header",
                "type" => "true_false",
                "instructions" => __('Enable WPML language switcher', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_5941bd413bf",
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
                "key" => "field_5937sc63g152s346",
                "label" => '<h4>' . __('Search', 'ohio') . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_592d43df9e26c",
                "label" => __('Search', 'ohio'),
                "name" => "global_page_header_search_visibility",
                "type" => "true_false",
                "instructions" => __('Show search icon on your website', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => "",
                "ui_off_text" => ""
            ],
            [
                "key" => "field_592d43df9e212c",
                "label" => __('Search type', 'ohio'),
                "name" => "global_page_header_search_type",
                "type" => "radio",
                "instructions" => __('Choose search type for all pages', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592d43df9e26c",
                            "operator" => "==",
                            "value" => 1
                        ]
                    ]
                ],
                "choices" => [
                    "simple" => __('Standard WordPress', 'ohio'),
                    "woo" => __('WooCommerce AJAX', 'ohio')
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "full",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_592d43df9f212c",
                "label" => __('Search position', 'ohio'),
                "name" => "global_page_header_search_position",
                "type" => "select",
                "instructions" => __('Choose search icon position for all pages', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592d43df9e26c",
                            "operator" => "==",
                            "value" => 1
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
                "key" => "field_59267bda33fg234fd4",
                "label" => __('Search icon color', 'ohio'),
                "name" => "global_page_header_search_color",
                "type" => "ohio_color",
                "instructions" => __('Choose color for the fixed search', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592d43df9e26c",
                            "operator" => "==",
                            "value" => 1
                        ]
                    ]
                ],
                "default_value" => ""
            ],
            [
                "key" => "field_5937sc63g152s346bth",
                "label" => '<h4>' . __('Menu Button', 'ohio') . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_592fe13500c39",
                "label" => __('Menu button', 'ohio'),
                "name" => "global_custom_button_for_header",
                "type" => "true_false",
                "instructions" => __('Enable a custom button in the main menu', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 0,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_592fe1ar3500c30",
                "label" => __('Menu button text', 'ohio'),
                "name" => "global_custom_button_for_header_link",
                "type" => "link",
                "instructions" => __('Set up button options', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fe13500c39",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "message" => "",
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_592fe13500c399",
                "label" => __('Menu button text color', 'ohio'),
                "name" => "global_custom_button_for_header_color",
                "type" => "ohio_color",
                "instructions" => __('Choose text color', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fe13500c39",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "message" => "",
                "default_value" => ""
            ],
            [
                "key" => "field_592fe13500c397",
                "label" => __('Menu button background', 'ohio'),
                "name" => "global_custom_button_for_header_background",
                "type" => "ohio_color",
                "instructions" => __('Choose color for custom button', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fe13500c39",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "message" => "",
                "default_value" => ""
            ]
        ],
        "location" => [
            [
                [
                    "param" => "options_page",
                    "operator" => "==",
                    "value" => "theme-general-menu"
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
