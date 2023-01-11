<?php if (function_exists('acf_add_local_field_group')) :

    acf_add_local_field_group([
        "key" => "group_592d60af343cfgwcs",
        "title" => __('Product Pages Settings', 'ohio'),
        "private" => true,
        "fields" => [
            [
                "key" => "field_591ac509d1208gbgclrlcfpagforglobalproduct",
                "label" => __('Pages settings', 'ohio'),
                "name" => "global_product_page",
                "type" => "clone",
                "instructions" => __('Pages settings', 'ohio'),
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
                    "param" => "options_page",
                    "operator" => "==",
                    "value" => "theme-general-product"
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
