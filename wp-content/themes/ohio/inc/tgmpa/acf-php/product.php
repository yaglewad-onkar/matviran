<?php if (function_exists('acf_add_local_field_group')) :

    acf_add_local_field_group([
        "key" => "group_59390deae2279_product",
        "title" => __('Product Settings', 'ohio'),
        "private" => true,
        "fields" => [
            [
                "key" => "field_59390deaekk1ee3d",
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
                "key" => "field_47272fda25ype",
                "label" => __('View mode', 'ohio'),
                "name" => "woocommerce_view_mode",
                "type" => "radio",
                "instructions" => __('Choose view mode for product pages', 'ohio'),
                "choices" => [
                    "inherit" => __('Use from Theme Settings', 'ohio'),
                    "left" => __('Left gallery', 'ohio'),
                    "right" => __('Right gallery', 'ohio')
                ],
                "default_value" => [
                    "inherit"
                ],
                "return_format" => "value",
                "layout" => "horizontal"
            ],
            [
                "key" => "field_59390deb03328dsaf1v",
                "label" => __('Category slug', 'ohio'),
                "name" => "page_show_category_breadcrumbs",
                "type" => "inherited_checkbox",
                "instructions" => __('Show product categories in breadcrumbs?', 'ohio'),
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
                "key" => "field_593dbedc5bqwee1",
                "label" => __('Double width', 'ohio'),
                "name" => "product_style_in_grid",
                "type" => "radio",
                "instructions" => __('Double the width of this product', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "choices" => [
                    "default" => __('Default - 1-column wide', 'ohio'),
                    "2col" => __('Wide - 2-columns wide', 'ohio')
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "default",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_47271241245ype",
                "label" => __('Sticky product', 'ohio'),
                "name" => "woocommerce_product_sticky",
                "type" => "inherited_checkbox",
                "instructions" => __('Enable sticky product for product page?', 'ohio'),
                "custom_labels" => [
                    "inherit" => __('Use from Theme Settings', 'ohio'),
                    "yes" => __('Show', 'ohio'),
                    "no" => __('Hide', 'ohio')
                ],
                "default_value" => "inherit",
                "return_format" => "value",
                "layout" => "horizontal"
            ],
            [
                "key" => "field_47271f141245ype",
                "label" => __('Sale tag', 'ohio'),
                "name" => "woocommerce_product_sale_tag",
                "type" => "inherited_checkbox",
                "instructions" => __('Show sale tag on product page?', 'ohio'),
                "custom_labels" => [
                    "inherit" => __('Use from Theme Settings', 'ohio'),
                    "yes" => __('Show', 'ohio'),
                    "no" => __('Hide', 'ohio')
                ],
                "default_value" => "inherit",
                "return_format" => "value",
                "layout" => "horizontal"
            ],
            [
                "key" => "field_eq2rf141245ype",
                "label" => __('SKU', 'ohio'),
                "name" => "woocommerce_product_sku",
                "type" => "inherited_checkbox",
                "instructions" => __('Show SKU on product page?', 'ohio'),
                "custom_labels" => [
                    "inherit" => __('Use from Theme Settings', 'ohio'),
                    "yes" => __('Show', 'ohio'),
                    "no" => __('Hide', 'ohio')
                ],
                "default_value" => "inherit",
                "return_format" => "value",
                "layout" => "horizontal"
            ],
            [
                "key" => "field_eqcat141245ype",
                "label" => __('Category', 'ohio'),
                "name" => "woocommerce_product_category",
                "type" => "inherited_checkbox",
                "instructions" => __('Show category on product page?', 'ohio'),
                "custom_labels" => [
                    "inherit" => __('Use from Theme Settings', 'ohio'),
                    "yes" => __('Show', 'ohio'),
                    "no" => __('Hide', 'ohio')
                ],
                "default_value" => "inherit",
                "return_format" => "value",
                "layout" => "horizontal"
            ],
            [
                "key" => "field_eqtag141245ype",
                "label" => __('Tags', 'ohio'),
                "name" => "woocommerce_product_tags",
                "type" => "inherited_checkbox",
                "instructions" => __('Show tags on product page?', 'ohio'),
                "custom_labels" => [
                    "inherit" => __('Use from Theme Settings', 'ohio'),
                    "yes" => __('Show', 'ohio'),
                    "no" => __('Hide', 'ohio')
                ],
                "default_value" => "inherit",
                "return_format" => "value",
                "layout" => "horizontal"
            ],
            [
                "key" => "field_59390deaekk2ee3d",
                "label" => __('Typography Settings', 'ohio'),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_vqkf4haf12422c",
                "label" => __('Product title typography', 'ohio'),
                "name" => "woocommerce_single_product_title_typo",
                "type" => "ohio_typo",
                "instructions" => __('Set up typography for simple product titles', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_592f4aff124wen",
                "label" => __('Product price typography', 'ohio'),
                "name" => "woocommerce_single_product_price_typo",
                "type" => "ohio_typo",
                "instructions" => __('Set up typography for simple product price', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_qwr93f4hff12422b",
                "label" => __('Product meta typography', 'ohio'),
                "name" => "woocommerce_single_product_category_typo",
                "type" => "ohio_typo",
                "instructions" => __('Set up typography for product meta', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_5940ecs23rfrewdfas",
                "label" => __('Widget title text color', 'ohio'),
                "name" => "page_footer_widget_title_typo",
                "type" => "ohio_typo",
                "instructions" => __('Choose widget title typography', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => "inherit",
                "add_theme_inherited" => false
            ]
        ],
        "location" => [
            [
                [
                    "param" => "post_type",
                    "operator" => "==",
                    "value" => "product"
                ]
            ]
        ],
        "menu_order" => 2,
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
