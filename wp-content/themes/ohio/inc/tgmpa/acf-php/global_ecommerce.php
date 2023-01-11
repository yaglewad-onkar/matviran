<?php if (function_exists('acf_add_local_field_group')) :

    acf_add_local_field_group([
        "key" => "group_593be7a6c2017",
        "title" => __('Shop Settings', 'ohio'),
        "private" => true,
        "fields" => [
            [
                "key" => "field_591b4f20ed84e",
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
                "key" => "field_5937e0a51b48cexmod155",
                "label" => "",
                "name" => "",
                "type" => "message",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "message" => '<p class="message">' . '<span class="dashicons dashicons-editor-help"></span>' . __('These settings apply to all the shop pages of your site. Use local Page Settings to override some options for individual shop pages.', 'ohio') . '</p>',
                "new_lines" => "",
                "esc_html" => 0
            ],
            [
                "key" => "field_592d60bf8b3f9",
                "label" => __('Product hover effect', 'ohio'),
                "name" => "global_shop_item_hover_type",
                "type" => "select",
                "instructions" => __('Choose hover effect type for shop items', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "choices" => [
                    "type1" => __('Image Scaling', 'ohio'),
                    "type2" => __('Color Overlay', 'ohio'),
                    "type3" => __('Greyscale', 'ohio'),
                    "type4" => __('Image Parallax', 'ohio')
                ],
                "default_value" => "type1",
                "allow_null" => 0,
                "multiple" => 0,
                "ui" => 0,
                "ajax" => 0,
                "return_format" => "value",
                "placeholder" => ""
            ],
            [
                "key" => "field_593be7afs51sfg",
                "label" => __('Product images in gallery', 'ohio'),
                "name" => "global_woocommerce_product_images_count",
                "type" => "text",
                "instructions" => __('Choose the number of product images for single product gallery', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => "2",
                "placeholder" => "",
                "prepend" => "",
                "append" => __('images', 'ohio'),
                "formatting" => "html",
                "maxlength" => ""
            ],
            [
                "key" => "field_593be8a6dfc31e",
                "label" => __('Masonry layout', 'ohio'),
                "name" => "global_woocommerce_masonry_layout",
                "type" => "true_false",
                "instructions" => __('Enable masonry layout for product items', 'ohio'),
                "required" => 0,
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_5937a0a52148cexmod23s1f",
                "label" => '<h4>' . __('Number of Products', 'ohio') . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_58383c7ed01ae_shop_count",
                "label" => __('Product items per page', 'ohio'),
                "name" => "global_woocommerce_products_on_page",
                "type" => "text",
                "instructions" => __('Choose the number of product items per page', 'ohio'),
                "required" => 0,
                "append" => __('products', 'ohio'),
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_58539i234317ae",
                            "operator" => "!=",
                            "value" => "type_4"
                        ]
                    ]
                ],
                "allow_null" => 0,
                "multiple" => 0,
                "ui" => 0,
                "ajax" => 0,
                "maxlength" => "2",
                "placeholder" => ""
            ],
            [
                "key" => "field_58383c7ed02ae",
                "label" => __('Product items per row', 'ohio'),
                "name" => "global_woocommerce_products_in_row",
                "type" => "ohio_ecommerce_columns",
                "instructions" => __('Choose the number of product items per row', 'ohio'),
                "default_value" => [
                    "large" => "3",
                    "medium" => "2",
                    "small" => "2"
                ]
            ],
            [
                "key" => "field_5937a0a52148cexmod23s1c",
                "label" => '<h4>' . __('Grid Appear Effect', 'ohio') . '</h4>',
                "name" => "",
                "type" => "message",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_593be8a6dfc31e",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "message" => "",
                "new_lines" => "",
                "esc_html" => 0
            ],
            [
                "key" => "field_592d60af8a7feq21",
                "label" => __('Grid animation', 'ohio'),
                "name" => "global_woocommerce_page_animation_type",
                "type" => "select",
                "instructions" => __('Choose grid animation type', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_593be8a6dfc31e",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "choices" => [
                    "default" => __('Disable animation', 'ohio'),
                    "sync" => __('Sync animation', 'ohio'),
                    "async" => __('Async animation', 'ohio')
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "default",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_592d60af8ac1asdasdl",
                "label" => __('Grid animation effect', 'ohio'),
                "name" => "global_woocommerce_page_animation_effect",
                "type" => "select",
                "instructions" => __('Choose product items appear effect', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_593be8a6dfc31e",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "choices" => [
                    "fade-up" => __('Fade up', 'ohio'),
                    "fade-left" => __('Fade left', 'ohio'),
                    "fade-right" => __('Fade right', 'ohio'),
                    "slide-up" => __('Slide up', 'ohio'),
                    "flip-up" => __('Flip up', 'ohio'),
                    "zoom-in" => __('Zoom in', 'ohio')
                ],
                "default_value" => [
                    "fade-up"
                ],
                "allow_null" => 0,
                "multiple" => 0,
                "ui" => 0,
                "ajax" => 0,
                "return_format" => "value",
                "placeholder" => ""
            ],
            [
                "key" => "field_59fb4332b34323f983w4hefiuj",
                "label" => __('Grid animation repeat', 'ohio'),
                "name" => "global_woocommerce_page_animation_once",
                "type" => "true_false",
                "instructions" => __('Repeat animation while scrolling page up and down', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_593be8a6dfc31e",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => "",
                "ui_off_text" => ""
            ],
            [
                "key" => "field_5937a0amod23s1f",
                "label" => '<h4>' . __('Product Cards', 'ohio') . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_592d60af8b80cf5",
                "label" => __('Boxed layout', 'ohio'),
                "name" => "global_product_items_boxed_style",
                "type" => "true_false",
                "instructions" => __('Use boxed layout for product items', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio'),
                "message" => "",
                "default_value" => 1
            ],
            [
                "key" => "field_59gb29bda32b3as15",
                "label" => __('Product card background color', 'ohio'),
                "name" => "global_woocommerce_shop_title_wrap_background_color",
                "type" => "ohio_color",
                "instructions" => __('Choose product card background color', 'ohio'),
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592d60af8b80cf5",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "required" => 0,
                "default_value" => ""
            ],
            [
                "key" => "field_5ghpd60af8ac1asf1245gf",
                "label" => __('Grid alignment', 'ohio'),
                "name" => "global_woocommerce_text_alignment",
                "type" => "select",
                "instructions" => __('Choose text alignment for product items', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "choices" => [
                    "left" => __('Left', 'ohio'),
                    "center" => __('Center', 'ohio'),
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
                "key" => "field_59gfsdfsda32b3as15",
                "label" => __('Quickview button', 'ohio'),
                "name" => "global_woocommerce_quickview_button",
                "type" => "true_false",
                "instructions" => __('Enable quickview feature on product items', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_59gb29bda32b3a",
                "label" => __('Sale tag background color', 'ohio'),
                "name" => "global_woocommerce_shop_sale_tag_background_color",
                "type" => "ohio_color",
                "instructions" => __('Choose sale tag background color', 'ohio'),
                "conditional_logic" => 0,
                "required" => 0,
                "default_value" => ""
            ],
            [
                "key" => "field_59gb29bda32b3b",
                "label" => __('Out of stock tag background color', 'ohio'),
                "name" => "global_woocommerce_shop_out_stock_tag_background_color",
                "type" => "ohio_color",
                "instructions" => __('Choose out of stock tag background color', 'ohio'),
                "conditional_logic" => 0,
                "required" => 0,
                "default_value" => ""
            ],
            [
                "key" => "field_593f4haf12422a",
                "label" => __('Product title typography', 'ohio'),
                "name" => "global_woocommerce_shop_product_title_typo",
                "type" => "ohio_typo",
                "instructions" => __('Set up typography for product grid titles', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_59gfsdfsda433as15",
                "label" => __('Product category', 'ohio'),
                "name" => "global_woocommerce_shop_category_visibility",
                "type" => "true_false",
                "instructions" => __('Show product categories on product items', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_593f4haf12422b",
                "label" => __('Product category typography', 'ohio'),
                "name" => "global_woocommerce_shop_product_category_typo",
                "type" => "ohio_typo",
                "instructions" => __('Set up typography for product grid category', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59gfsdfsda433as15",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_59gfsdfsga433as15",
                "label" => __('Product price', 'ohio'),
                "name" => "global_woocommerce_shop_price_visibility",
                "type" => "true_false",
                "instructions" => __('Show the price on product items', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_59af4haf12422c",
                "label" => __('Product price typography', 'ohio'),
                "name" => "global_woocommerce_shop_product_price_typo",
                "type" => "ohio_typo",
                "instructions" => __('Set up typography for product grid price', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59gfsdfsga433as15",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_593be7a6d2429",
                "label" => __('Shop Page', 'ohio'),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_59fb433sbgd33615",
                "label" => __('Breadcrumbs slug', 'ohio'),
                "name" => "global_woocommerce_breadcrumbs_slug",
                "type" => "text",
                "instructions" => __('Enter custom text for breadcrumbs slug', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "new_lines" => "",
                "esc_html" => 0
            ],
            [
                "key" => "field_5937a0a52148cexmod23s152c",
                "label" => '<h4>' . __('Shop Page Pagination', 'ohio') . '</h4>',
                "name" => "",
                "type" => "message",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "new_lines" => "",
                "esc_html" => 0
            ],
            [
                "key" => "field_59374323b383615",
                "label" => __('Pagination', 'ohio'),
                "name" => "global_woocommerce_pagination_type",
                "type" => "select",
                "instructions" => __('Choose pagination type for shop page', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "choices" => [
                    "simple" => __('Simple', 'ohio'),
                    "standard" => __('Standard', 'ohio'),
                    "lazy_scroll" => __('Lazy load', 'ohio'),
                    "lazy_button" => __('Load more', 'ohio')
                ],
                "default_value" => [
                    "simple"
                ],
                "allow_null" => 0,
                "multiple" => 0,
                "ui" => 0,
                "ajax" => 0,
                "return_format" => "value",
                "placeholder" => ""
            ],
            [
                "key" => "field_593743237383615",
                "label" => __('Pagination position', 'ohio'),
                "name" => "global_woocommerce_pagination_position",
                "type" => "select",
                "instructions" => __('Choose pagination position for shop page', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "choices" => [
                    "left" => __('Left', 'ohio'),
                    "center" => __('Center', 'ohio'),
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
                "key" => "field_593beba6d4b64",
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
                "key" => "field_593743234457tr",
                "label" => __('Cart icon', 'ohio'),
                "name" => "global_woocommerce_cart_icon",
                "type" => "true_false",
                "instructions" => __('Show cart icon on your website', 'ohio'),
                "default_value" => 1,
                "ui" => 1
            ],
            [
                "key" => "field_592d43df9e26chkug",
                "label" => __('Cart totals', 'ohio'),
                "name" => "global_page_header_cart_sum_visibility",
                "type" => "true_false",
                "instructions" => __('Show cart totals', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_593743234457tr",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => "",
                "ui_off_text" => ""
            ],
            [
                "key" => "field_593be7fasa6dfq41",
                "label" => __('Custom content position', 'ohio'),
                "name" => "global_shop_content_position",
                "type" => "select",
                "instructions" => __('Choose WPBakery/Elementor builders content position', 'ohio'),
                "required" => 0,
                "conditional_logic" => false,
                "choices" => [
                    "top" => __('Top - Before products', 'ohio'),
                    "bottom" => __('Bottom - After products', 'ohio')
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "inherit",
                "layout" => "horizontal",
                "return_format" => "value"
            ]
        ],
        "location" => [
            [
                [
                    "param" => "options_page",
                    "operator" => "==",
                    "value" => "theme-general-woocommerce"
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
