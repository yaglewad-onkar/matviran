<?php if (function_exists('acf_add_local_field_group')) :

    acf_add_local_field_group([
        "key" => "group_59390deae2279",
        "title" => __('Page Settings', 'ohio'),
        "private" => true,
        "fields" => [
            [
                "key" => "field_591ac509d1208gbgclrlcfpag",
                "label" => __('Page settings', 'ohio'),
                "name" => "page",
                "type" => "clone",
                "instructions" => __('Page settings', 'ohio'),
                "required" => false,
                "conditional_logic" => false,
                "clone" => [
                    "group_59390deae2279_page_options"
                ],
                "display" => "seamless",
                "layout" => "block",
                "prefix_label" => false,
                "prefix_name" => true
            ]
        ],
        "location" => [
            [
                [
                    "param" => "post_type",
                    "operator" => "==",
                    "value" => "page"
                ]
            ],
            [
                [
                    "param" => "post_type",
                    "operator" => "==",
                    "value" => "post"
                ]
            ],
            [
                [
                    "param" => "post_type",
                    "operator" => "==",
                    "value" => "ohio_portfolio"
                ]
            ],
            [
                [
                    "param" => "post_type",
                    "operator" => "==",
                    "value" => "product"
                ]
            ]
        ],
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
