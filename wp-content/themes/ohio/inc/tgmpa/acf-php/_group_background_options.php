<?php if (function_exists('acf_add_local_field_group')) :

    acf_add_local_field_group([
        "key" => "group_982e082a3bcfcf81b766eaa1ec2df4f11e0f5cd3",
        "title" => __('Background group settings', 'ohio'),
        "private" => true,
        "fields" => [
            [
                "key" => "field_46c28bded161ea112fa99f2ef41c857cb5c6db3b",
                "label" => "",
                "name" => "background_type",
                "type" => "radio",
                "instructions" => "",
                "required" => false,
                "conditional_logic" => false,
                "choices" => [
                    "inherit" => __('Use from Inherited Settings', 'ohio'),
                    "color" => __('Color only', 'ohio'),
                    "image" => __('Image', 'ohio')
                ],
                "message" => "",
                "layout" => "horizontal",
                "default_value" => "inherit"
            ],
            [
                "key" => "field_f71a874d1a29e0813d847089334dc06aacb34ac2",
                "label" => __('Background color', 'ohio'),
                "name" => "background_color",
                "type" => "ohio_color",
                "instructions" => __('Choose background color', 'ohio'),
                "required" => false,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_46c28bded161ea112fa99f2ef41c857cb5c6db3b",
                            "operator" => "!=",
                            "value" => "inherit"
                        ]
                    ]
                ],
                "default_value" => ""
            ],
            [
                "key" => "field_1926047a4e74b61f21b3c1201dde5b5af779aa83",
                "label" => __('Background image', 'ohio'),
                "name" => "background_image",
                "type" => "image",
                "instructions" => __('Upload image and set up attributes', 'ohio'),
                "required" => false,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_46c28bded161ea112fa99f2ef41c857cb5c6db3b",
                            "operator" => "==",
                            "value" => "image"
                        ]
                    ]
                ],
                "return_format" => "url",
                "preview_size" => "medium",
                "library" => "all"
            ],
            [
                "key" => "field_76eb95f020994e4ae5dfd7c1c5066082c0fae308",
                "label" => __('Image size', 'ohio'),
                "name" => "background_size",
                "type" => "select",
                "instructions" => "",
                "required" => false,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_46c28bded161ea112fa99f2ef41c857cb5c6db3b",
                            "operator" => "==",
                            "value" => "image"
                        ],
                        [
                            "field" => "field_1926047a4e74b61f21b3c1201dde5b5af779aa83",
                            "operator" => "!=empty"
                        ]
                    ],
                    [
                        [
                            "field" => "field_46c28bded161ea112fa99f2ef41c857cb5c6db3b",
                            "operator" => "==",
                            "value" => "featured"
                        ]
                    ]
                ],
                "choices" => [
                    "auto" => __('Auto', 'ohio'),
                    "cover" => __('Cover', 'ohio'),
                    "contain" => __('Contain', 'ohio'),
                    "100_per" => __('100% 100%', 'ohio')
                ],
                "default_value" => [
                    "auto"
                ],
                "allow_null" => false,
                "multiple" => false,
                "ui" => false,
                "ajax" => false,
                "return_format" => "value",
                "placeholder" => "",
                "wrapper" => [
                    "width" => "",
                    "class" => "acf-fields-background-column",
                    "id" => ""
                ]
            ],
            [
                "key" => "field_1353fb07f7f0311d1a9cbb3184ad6662138c570a",
                "label" => __('Image position', 'ohio'),
                "name" => "background_position",
                "type" => "select",
                "instructions" => "",
                "required" => false,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_1926047a4e74b61f21b3c1201dde5b5af779aa83",
                            "operator" => "!=empty"
                        ],
                        [
                            "field" => "field_46c28bded161ea112fa99f2ef41c857cb5c6db3b",
                            "operator" => "==",
                            "value" => "image"
                        ]
                    ],
                    [
                        [
                            "field" => "field_46c28bded161ea112fa99f2ef41c857cb5c6db3b",
                            "operator" => "==",
                            "value" => "featured"
                        ]
                    ]
                ],
                "choices" => [
                    "center" => __('Center', 'ohio'),
                    "left_top" => __('Left top', 'ohio'),
                    "left_center" => __('Left center', 'ohio'),
                    "left_bottom" => __('Left bottom', 'ohio'),
                    "center_top" => __('Center top', 'ohio'),
                    "center_bottom" => __('Center bottom', 'ohio'),
                    "right_top" => __('Right top', 'ohio'),
                    "right_center" => __('Right center', 'ohio'),
                    "right_bottom" => __('Right bottom', 'ohio')
                ],
                "default_value" => [
                    "center"
                ],
                "return_format" => "value",
                "wrapper" => [
                    "width" => "",
                    "class" => "acf-fields-background-column",
                    "id" => ""
                ]
            ],
            [
                "key" => "field_1db3d466c4d3454f11d3fd4042076eb3b3665ba7",
                "label" => __('Image repeat type', 'ohio'),
                "name" => "background_repeat",
                "type" => "select",
                "instructions" => "",
                "required" => false,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_1926047a4e74b61f21b3c1201dde5b5af779aa83",
                            "operator" => "!=empty"
                        ],
                        [
                            "field" => "field_46c28bded161ea112fa99f2ef41c857cb5c6db3b",
                            "operator" => "==",
                            "value" => "image"
                        ]
                    ],
                    [
                        [
                            "field" => "field_46c28bded161ea112fa99f2ef41c857cb5c6db3b",
                            "operator" => "==",
                            "value" => "featured"
                        ]
                    ]
                ],
                "choices" => [
                    "repeat" => __('Repeat', 'ohio'),
                    "no_repeat" => __('No repeat', 'ohio'),
                    "repeat_x" => __('Repeat only by X', 'ohio'),
                    "repeat_y" => __('Repeat only by Y', 'ohio')
                ],
                "default_value" => [
                    "repeat"
                ],
                "return_format" => "value",
                "wrapper" => [
                    "width" => "",
                    "class" => "acf-fields-background-column",
                    "id" => ""
                ]
            ],
            [
                "key" => "field_98064d89cb0abee5d81e75d02b4581eac692578c",
                "label" => __('Image attachment', 'ohio'),
                "name" => "background_attach",
                "type" => "radio",
                "instructions" => "",
                "required" => false,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_1926047a4e74b61f21b3c1201dde5b5af779aa83",
                            "operator" => "!=empty"
                        ],
                        [
                            "field" => "field_46c28bded161ea112fa99f2ef41c857cb5c6db3b",
                            "operator" => "==",
                            "value" => "image"
                        ]
                    ]
                ],
                "choices" => [
                    "false" => __('Default, scrolling image', 'ohio'),
                    "true" => __('Attach, fixed image', 'ohio')
                ],
                "layout" => "horizontal",
                "default_value" => "false",
                "inherited" => false
            ]
        ],
        "location" => [],
        "menu_order" => false,
        "position" => "normal",
        "style" => "default",
        "label_placement" => "top",
        "instruction_placement" => "label",
        "hide_on_screen" => "",
        "active" => true,
        "description" => ""
    ]);

endif;
