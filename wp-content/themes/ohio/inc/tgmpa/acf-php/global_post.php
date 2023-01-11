<?php if (function_exists('acf_add_local_field_group')) :

    acf_add_local_field_group([
        "key" => "group_592d60af343cfp",
        "title" => __('Post Settings', 'ohio'),
        "private" => true,
        "fields" => [
            [
                "key" => "field_592d60ah8a4137",
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
                "key" => "field_592d716deeb15",
                "label" => __('Related posts', 'ohio'),
                "name" => "global_post_related_posts_visibility",
                "type" => "true_false",
                "instructions" => __('Show block with related posts?', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => "",
                "ui_off_text" => ""
            ],
            [
                "key" => "field_592d60af8ac18",
                "label" => __('Related post items per row', 'ohio'),
                "name" => "global_post_columns_in_row",
                "type" => "ohio_columns",
                "instructions" => __('Choose the number of post items per row', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592d716deeb15",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "default_value" => "3-2-1",
                "allow_null" => 0,
                "multiple" => 0,
                "ui" => 0,
                "ajax" => 0,
                "return_format" => "value",
                "placeholder" => "",
                "use_inherit" => false
            ],
            [
                "key" => "field_592d60af8ac66",
                "label" => __('Related posts amount', 'ohio'),
                "name" => "global_related_posts_amount",
                "type" => "number",
                "instructions" => __('Choose the number of related posts', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592d716deeb15",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "default_value" => "2",
                "allow_null" => 0,
                "multiple" => 0,
                "min" => 1,
                "max" => 12,
                "ui" => 0,
                "ajax" => 0,
                "placeholder" => ""
            ],
            [
                "key" => "field_59374a3443d8361523f",
                "label" => __('Post tags', 'ohio'),
                "name" => "global_post_tags_visibility",
                "type" => "true_false",
                "instructions" => __('Show post tags on post pages?', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => "",
                "ui_off_text" => ""
            ],
            [
                "key" => "field_59374a3fdf523f",
                "label" => __('Post comments', 'ohio'),
                "name" => "global_post_comments_visibility",
                "type" => "true_false",
                "instructions" => __('Show post comments on post pages?', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => "",
                "ui_off_text" => ""
            ],
            [
                "key" => "field_592d714deeb14",
                "label" => __('Post navigation', 'ohio'),
                "name" => "global_post_previous_n_next_visibility",
                "type" => "true_false",
                "instructions" => __('Show', 'ohio') . '<em>' . __('"Prev and next posts"', 'ohio') . '</em>' . __('navigation?', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => "",
                "ui_off_text" => ""
            ],
            [
                "key" => "field_592d60ah8a413k",
                "label" => __('Sharing', 'ohio'),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_5937433fdf523f",
                "label" => __('Sharing', 'ohio'),
                "name" => "global_post_social_visibility",
                "type" => "true_false",
                "instructions" => __('Enable sharing feature for post pages?', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => "",
                "ui_off_text" => ""
            ],
            [
                "key" => "field_5937fd3fdf523f",
                "label" => __('Sharing networks', 'ohio'),
                "name" => "global_post_sharing_networks",
                "type" => "select",
                "instructions" => __('Choose sharing social networks', 'ohio'),
                "required" => 0,
                "conditional_logic" => [],
                "choices" => [
                    "facebook" => __('Facebook', 'ohio'),
                    "twitter" => __('Twitter', 'ohio'),
                    "linkedin" => __('LinkedIn', 'ohio'),
                    "pinterest" => __('Pinterest', 'ohio'),
                    "vk" => __('VKontakte', 'ohio')
                ],
                "default_value" => [],
                "allow_null" => 0,
                "multiple" => 1,
                "ui" => 1,
                "ajax" => 1,
                "return_format" => "value",
                "placeholder" => ""
            ],
            [
                "key" => "field_592d60ah8a313k",
                "label" => __('Author', 'ohio'),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_5937e0a52b48c",
                "label" => "",
                "name" => "",
                "type" => "message",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "message" => '<p class="message">' . '<span class="dashicons dashicons-editor-help"></span>' . __('More author settings you can find in', 'ohio') . '&nbsp;<a target="_blank" href="profile.php">' . __('your profile menu', 'ohio') . '</a></p>',
                "new_lines" => "",
                "esc_html" => 0
            ],
            [
                "key" => "field_592d716deeb14",
                "label" => __('Author', 'ohio'),
                "name" => "global_post_author_widget_visibility",
                "type" => "true_false",
                "instructions" => __('Show author widget on all post pages?', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => "",
                "ui_off_text" => ""
            ],
            [
                "key" => "field_5937e0a52b873",
                "label" => __('Author social links', 'ohio'),
                "name" => "global_author_social_links",
                "type" => "repeater",
                "instructions" => __('Add some links to author social networks', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "collapsed" => "",
                "min" => 0,
                "max" => 0,
                "layout" => "table",
                "button_label" => __('+ Add Author', 'ohio'),
                "sub_fields" => [
                    [
                        "key" => "field_5937e0a52f6f4",
                        "label" => __('Author', 'ohio'),
                        "name" => "author",
                        "type" => "user",
                        "instructions" => "",
                        "required" => 0,
                        "conditional_logic" => 0,
                        "role" => "",
                        "allow_null" => 0,
                        "multiple" => 0
                    ],
                    [
                        "key" => "field_5937e0a52fac9",
                        "label" => __('Links', 'ohio'),
                        "name" => "links",
                        "type" => "repeater",
                        "instructions" => "",
                        "required" => 0,
                        "conditional_logic" => 0,
                        "collapsed" => "",
                        "min" => 0,
                        "max" => 0,
                        "layout" => "table",
                        "button_label" => __('+ Add Link', 'ohio'),
                        "sub_fields" => [
                            [
                                "key" => "field_5937e0a534d96",
                                "label" => __('Social networks', 'ohio'),
                                "name" => "social_networks",
                                "type" => "select",
                                "instructions" => "",
                                "required" => 0,
                                "conditional_logic" => 0,
                                "choices" => [
                                    "behance" => __('Behance', 'ohio'),
                                    "digg" => __('Digg', 'ohio'),
                                    "discord" => __('Discord', 'ohio'),
                                    "dribbble" => __('Dribbble', 'ohio'),
                                    "facebook" => __('Facebook', 'ohio'),
                                    "flickr" => __('Flickr', 'ohio'),
                                    "github" => __('GitHub', 'ohio'),
                                    "instagram" => __('Instagram', 'ohio'),
                                    "kaggle" => __('Kaggle', 'ohio'),
                                    "linkedin" => __('LinkedIn', 'ohio'),
                                    "medium" => __('Medium', 'ohio'),
                                    "mixer" => __('Mixer', 'ohio'),
                                    "pinterest" => __('Pinterest', 'ohio'),
                                    "quora" => __('Quora', 'ohio'),
                                    "reddit" => __('Reddit', 'ohio'),
                                    "snapchat" => __('Snapchat', 'ohio'),
                                    "soundcloud" => __('SoundCloud', 'ohio'),
                                    "spotify" => __('Spotify', 'ohio'),
                                    "teamspeak" => __('Teamspeak', 'ohio'),
                                    "telegram" => __('Telegram', 'ohio'),
                                    "tiktok" => __('TikTok', 'ohio'),
                                    "tumblr" => __('Tumblr', 'ohio'),
                                    "twitch" => __('Twitch', 'ohio'),
                                    "twitter" => __('Twitter', 'ohio'),
                                    "vimeo" => __('Vimeo', 'ohio'),
                                    "vine" => __('Vine', 'ohio'),
                                    "vkontakte" => __('VKontakte', 'ohio'),
                                    "whatsapp" => __('WhatsApp', 'ohio'),
                                    "xing" => __('Xing', 'ohio'),
                                    "youtube" => __('YouTube', 'ohio'),
                                    "500px" => __('500px', 'ohio'),
                                ],
                                "default_value" => [
                                    "facebook"
                                ],
                                "allow_null" => 0,
                                "multiple" => 0,
                                "ui" => 0,
                                "ajax" => 0,
                                "return_format" => "value",
                                "placeholder" => ""
                            ],
                            [
                                "key" => "field_5937e0a535178",
                                "label" => "URL",
                                "name" => "url",
                                "type" => "url",
                                "instructions" => "",
                                "required" => 0,
                                "conditional_logic" => 0,
                                "default_value" => "",
                                "placeholder" => ""
                            ]
                        ]
                    ]
                ]
            ]
        ],
        "location" => [
            [
                [
                    "param" => "options_page",
                    "operator" => "==",
                    "value" => "theme-general-post"
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
