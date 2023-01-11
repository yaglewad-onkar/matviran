<?php if (function_exists('acf_add_local_field_group')) :

    acf_add_local_field_group([
        "key" => "group_5946362bf373c5",
        "title" => __('Other', 'ohio'),
        "private" => true,
        "fields" => [
            [
                "key" => "field_5222e3443f7k9ls",
                "label" => __('Coming Soon Mode', 'ohio'),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_5222e3443f7k9l0",
                "label" => __('Coming soon mode', 'ohio'),
                "name" => "global_coming_soon_switch",
                "type" => "true_false",
                "instructions" => __('Enable coming soon mode for your website. Users won\'t be able to access the site\'s content and will see the coming soon page only', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 0,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_52832525asfsafff7k9l0",
                "label" => "",
                "name" => "",
                "type" => "message",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5222e3443f7k9l0",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "message" => '<p class="message">' . __('Note, use <a target="_blank" href="../?coming-soon-preview=true">the following link</a> to be able to see the coming soon page as a WordPress administrator.', 'ohio') . '</p>',
                "new_lines" => "",
                "esc_html" => 0
            ],
            [
                "key" => "field_5222e3443f7k9l1",
                "label" => __('Coming soon page background', 'ohio'),
                "name" => "global_coming_soon_background",
                "type" => "clone",
                "instructions" => __('Choose coming soon page background', 'ohio'),
                "required" => false,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5222e3443f7k9l0",
                            "operator" => "==",
                            "value" => "1"
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
                "key" => "field_5222e3443f7k9l2",
                "label" => __('Coming soon page heading', 'ohio'),
                "name" => "global_coming_soon_heading",
                "type" => "text",
                "instructions" => __('Enter heading for the coming soon page', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5222e3443f7k9l0",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "default_value" => __('We\'re under<br> construction', 'ohio'),
                "message" => "",
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_5222e3443f7k9l3",
                "label" => __('Coming soon page details', 'ohio'),
                "name" => "global_coming_soon_details",
                "type" => "textarea",
                "instructions" => __('Add some details about the coming soon page', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5222e3443f7k9l0",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "default_value" => __('Check back for an update soon.', 'ohio'),
                "message" => "",
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_5222e3443f7k9l4",
                "label" => __('Countdown', 'ohio'),
                "name" => "global_coming_soon_countdown",
                "type" => "true_false",
                "instructions" => __('Show a countdown timer on the coming soon page', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5222e3443f7k9l0",
                            "operator" => "==",
                            "value" => "1"
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
                "key" => "field_5222e3443f7k9l5",
                "label" => __('Countdown expiration date', 'ohio'),
                "name" => "global_coming_soon_expiration",
                "type" => "date_time_picker",
                "instructions" => __('Enter the date when site will be online', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5222e3443f7k9l4",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                'display_format' => "Y/m/d H:i:s",
                'return_format' => "Y/m/d H:i:s",
                'first_day' => 1,
                "default_value" => '2022/03/14 18:00:00',
            ],
            [
                "key" => "field_5222e3443f7k9l6",
                "label" => __('Social networks', 'ohio'),
                "name" => "global_coming_soon_switch_social",
                "type" => "true_false",
                "instructions" => __('Show social networks on the coming soon page. <em>(Go to Theme Settings > Other > Social Networks to add networks)</em>', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5222e3443f7k9l0",
                            "operator" => "==",
                            "value" => "1"
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
                "key" => "field_5222e3443f7k9l7",
                "label" => '<h4>' . __('Typography Settings', 'ohio') . '</h4>',
                "name" => "",
                "type" => "message",
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5222e3443f7k9l0",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ]
            ],

            [
                "key" => "field_5222e3443f7k9l8",
                "label" => __('Page heading typography', 'ohio'),
                "name" => "global_coming_soon_heading_typo",
                "type" => "ohio_typo",
                "instructions" => __('Set up typography styles for the coming soon page heading', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5222e3443f7k9l0",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_5222e3443f7k9l9",
                "label" => __('Page details typography', 'ohio'),
                "name" => "global_coming_soon_details_typo",
                "type" => "ohio_typo",
                "instructions" => __('Set up typography styles for the coming soon page details', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5222e3443f7k9l0",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_5222e3443f7k9l10",
                "label" => __('Countdown typography', 'ohio'),
                "name" => "global_coming_soon_countdown_typo",
                "type" => "ohio_typo",
                "instructions" => __('Set up typography styles for the coming soon page countdown', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5222e3443f7k9l4",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_542244d4313bf",
                "label" => __('Plugins', 'ohio'),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_5937a0a521481ebmod23",
                "label" => '<h4>' . __('Google Maps', 'ohio') . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_592fe13500023",
                "label" => __('Google Maps API key', 'ohio'),
                "name" => "global_google_maps_api_key",
                "type" => "text",
                "instructions" => 'Paste your Google Maps API key here.<br> <a target="_blank" href="https://developers.google.com/maps/documentation/javascript/get-api-key">How to get your API key</a>',
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => "",
                "placeholder" => __('Paste your key', 'ohio'),
                "prepend" => "",
                "append" => "",
                "maxlength" => ""
            ],
            [
                "key" => "field_542244d4343bf",
                "label" => __('Snippets & Tracking', 'ohio'),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_5937e0a32b48cexmod151",
                "label" => "",
                "name" => "",
                "type" => "message",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "message" => '<p class="message">' . __('Note, that you can update the theme without losing the code injected.', 'ohio') . '</p>',
                "new_lines" => "",
                "esc_html" => 0
            ],
            [
                "key" => "field_5937e3a43b383415",
                "label" => __('Header JavaScript injection', 'ohio'),
                "name" => "global_header_javascript",
                "type" => "ohio_code",
                "instructions" => __('Paste your Google Analytics, Facebook Pixel or custom tracking code', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => "",
                "language" => "javascript"
            ],
            [
                "key" => "field_5937e4a43b383415",
                "label" => __('Footer JavaScript injection', 'ohio'),
                "name" => "global_footer_javascript",
                "type" => "ohio_code",
                "instructions" => __('Paste your Google Analytics, Facebook Pixel or custom tracking code', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => "",
                "language" => "javascript"
            ],
            [
                "key" => "field_591b056456481fcffmod",
                "label" => __('Subscribe Pop-Up', 'ohio'),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_5222e34430vve4od8",
                "label" => __('Subscribe pop-up', 'ohio'),
                "name" => "global_subscribe_popup_switch",
                "type" => "true_false",
                "instructions" => __('Enable subscribe pop-up', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 0,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_592fd8901f6jiofnbbbqo",
                "label" => __('Subscribe pop-up background', 'ohio'),
                "name" => "global_subscribe_popup",
                "type" => "clone",
                "instructions" => __('Choose pop-up background', 'ohio'),
                "required" => false,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5222e34430vve4od8",
                            "operator" => "==",
                            "value" => "1"
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
                "key" => "field_5937895484415",
                "label" => __('Subscribe pop-up form', 'ohio'),
                "name" => "global_subscribe_choice_of_forms",
                "type" => "post_object",
                "post_type" => [
                    "wpcf7_contact_form"
                ],
                "instructions" => __('Choose', 'ohio') . '&nbsp;<a target="_blank" href="/wp-admin/admin.php?page=wpcf7">' . __('Contact Form 7', 'ohio') . '&nbsp;</a>' . __('form for subscribtion', 'ohio') . '<em>&nbsp;' . __('(Use pre-made forms only)', 'ohio') . '</em>',
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5222e34430vve4od8",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "allow_null" => 0,
                "multiple" => 0,
                "ui" => 0,
                "ajax" => 0,
                "return_format" => "id",
                "placeholder" => ""
            ],
            [
                "key" => "field_592gh23s3500c30",
                "label" => __('Subscribe pop-up heading', 'ohio'),
                "name" => "global_text_subcribe_popup",
                "type" => "text",
                "instructions" => __('Enter heading for your subscribe pop-up', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5222e34430vve4od8",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "default_value" => __('Subscribe to our newsletter', 'ohio'),
                "message" => "",
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_592g223s3500c30",
                "label" => __('Subscribe pop-up details', 'ohio'),
                "name" => "global_details_text_subcribe_popup",
                "type" => "textarea",
                "instructions" => __('Enter details about subscription terms', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5222e34430vve4od8",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "default_value" => __('Sign up to receive updates, promotions, and sneak peaks of upcoming products. Plus 20% off your next order.', 'ohio'),
                "message" => "",
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_592s33s15af5g8t",
                "label" => '<h4>' . __('Display Settings', 'ohio') . '</h4>',
                "name" => "",
                "type" => "message",
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5222e34430vve4od8",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ]
            ],
            [
                "key" => "field_59229bda31f95_sbscr",
                "label" => __('Subscribe pop-up triggers', 'ohio'),
                "name" => "global_subscribe_popup_display_trigger",
                "type" => "radio",
                "instructions" => __('Select one of the ways to display modal', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5222e34430vve4od8",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "choices" => [
                    "time" => __('Time', 'ohio'),
                    "scroll" => __('Page scroll', 'ohio'),
                    "exit" => __('Exit intent', 'ohio')
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "no",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_3337773s3500c30",
                "label" => __('Show pop-up delay', 'ohio'),
                "name" => "global_delay_subcribe_popup",
                "type" => "text",
                "instructions" => __('Here goes a description', 'ohio'),
                "required" => 0,
                "append" => __('seconds', 'ohio'),
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5222e34430vve4od8",
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
                "key" => "field_58351fsa421j1265",
                "label" => __('Show after page scrolled', 'ohio'),
                "name" => "global_subscribe_popup_scroll_percent",
                "type" => "text",
                "instructions" => __('Here goes a description', 'ohio'),
                "required" => 0,
                "append" => __('%', 'ohio'),
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5222e34430vve4od8",
                            "operator" => "==",
                            "value" => "1"
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
                "key" => "field_58383c7ed01ae_sbscr",
                "label" => __('Expires', 'ohio'),
                "name" => "global_subscribe_popup_expires",
                "type" => "text",
                "instructions" => __('After expiry, user will see the subscribe pop-up again', 'ohio'),
                "required" => 1,
                "append" => __('days', 'ohio'),
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5222e34430vve4od8",
                            "operator" => "==",
                            "value" => "1"
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
                "key" => "field_592s33s15af5g9t",
                "label" => '<h4>' . __('Typography Settings', 'ohio') . '</h4>',
                "name" => "",
                "type" => "message",
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5222e34430vve4od8",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ]
            ],
            [
                "key" => "field_592fgj993827b",
                "label" => __('Heading typography', 'ohio'),
                "name" => "global_text_subcribe_popup_typo",
                "type" => "ohio_typo",
                "instructions" => __('et up typography styles for subscribe pop-up heading', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5222e34430vve4od8",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_592fg8883827b",
                "label" => __('Details typography', 'ohio'),
                "name" => "global_details_text_subcribe_popup_typo",
                "type" => "ohio_typo",
                "instructions" => __('Set up typography styles for subscribe pop-up details', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5222e34430vve4od8",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_591b002d481fcff56",
                "label" => __('Social Networks', 'ohio'),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_592fe1350456235",
                "label" => __('Social networks', 'ohio'),
                "name" => "global_header_menu_social_links_visibility",
                "type" => "true_false",
                "instructions" => __('Show social networks on your website', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_snlid", // old field_59229bda366f4mod
                "label" => __('Social networks list', 'ohio'),
                "name" => "global_header_menu_social_links",
                "type" => "repeater",
                "instructions" => __('Choose social networks to be displayed on your website', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fe1350456235",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "collapsed" => "",
                "min" => 0,
                "max" => 6,
                "layout" => "table",
                "button_label" => __('+ Add social network', 'ohio'),
                "sub_fields" => [
                    [
                        "key" => "insnsn", // old field_59229bda7b686moddd
                        "label" => __('Direction', 'ohio'),
                        "name" => "social_network",
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
                            "tripadvisor" => __('Tripadvisor', 'ohio'),
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
                        "default_value" => [],
                        "allow_null" => 0,
                        "multiple" => 0,
                        "ui" => 0,
                        "ajax" => 0,
                        "return_format" => "value",
                        "placeholder" => ""
                    ],
                    [
                        "key" => "insnurl", // old field_59229bda7ba5ajhghjhg
                        "label" => __('URL', 'ohio'),
                        "name" => "url",
                        "type" => "url",
                        "instructions" => "",
                        "required" => 0,
                        "conditional_logic" => 0,
                        "default_value" => "",
                        "placeholder" => ""
                    ]
                ]
            ],
            [
                "key" => "field_592fe1350013rfw4g23",
                "label" => __('Social networks type', 'ohio'),
                "name" => "global_social_network_type",
                "type" => "radio",
                "instructions" => __('Choose social networks type', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fe1350456235",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "choices" => [
                    "letters" => __('Letters', 'ohio'),
                    "icons" => __('Icons', 'ohio')
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "letters",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_592s33s15af4g8s",
                "label" => '<h4>' . __('Display Settings', 'ohio') . '</h4>',
                "name" => "",
                "type" => "message",
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fe1350456235",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ]
            ],
            [
                "key" => "field_592fe13500linksinnewtab",
                "label" => __('Open links in new tab?', 'ohio'),
                "name" => "global_social_network_target_blank",
                "type" => "true_false",
                "instructions" => __('Social network links will open in a new tab', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fe1350456235",
                            "operator" => "==",
                            "value" => "1"
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
                "key" => "field_5937e1905d075d297",
                "label" => __('Social networks position', 'ohio'),
                "name" => "global_social_network_position",
                "type" => "select",
                "instructions" => __('Choose social network display position', 'ohio'),
                "required" => 0,
                "conditional_logic" => false,
                "choices" => [
                    "left" => __('Left side', 'ohio'),
                    "right" => __('Right side', 'ohio')
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "right",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_598s31s15af5g9s",
                "label" => '<h4>' . __('Typography Settings', 'ohio') . '</h4>',
                "name" => "",
                "type" => "message",
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fe1350456235",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ]
            ],
            [
                "key" => "field_l05mnk93kid43naf2",
                "label" => __('Social networks typography', 'ohio'),
                "name" => "global_page_social_networks_typo",
                "type" => "ohio_typo",
                "instructions" => __('Set up typography styles for social networks', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fe1350456235",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_542244d4343hg",
                "label" => __('Notification', 'ohio'),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_592fe13500qwedqwxs",
                "label" => __('Notification', 'ohio'),
                "name" => "global_notification_bar",
                "type" => "true_false",
                "instructions" => __('Enable notification on your website', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 0,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_592fe13500hjbh",
                "label" => __('Notification details', 'ohio'),
                "name" => "global_notification_text",
                "type" => "text",
                "instructions" => __('Paste your notification text here', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        "field" => "field_592fe13500qwedqwxs",
                        "operator" => "==",
                        "value" => "1"
                    ]
                ],
                "default_value" => "",
                "placeholder" => "",
                "prepend" => "",
                "append" => "",
                "maxlength" => ""
            ],
            [
                "key" => "field_592fe135002542tgs",
                "label" => __('Notification details link', 'ohio'),
                "name" => "global_notification_link",
                "type" => "true_false",
                "instructions" => __('Enable notification link', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        "field" => "field_592fe13500qwedqwxs",
                        "operator" => "==",
                        "value" => "1"
                    ]
                ],
                "message" => "",
                "default_value" => 0,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_592feа125350234df2",
                "label" => __('Notification link', 'ohio'),
                "name" => "global_notification_link",
                "type" => "link",
                "instructions" => __('Set up notification link', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fe135002542tgs",
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
                "key" => "field_592fe13500asdas",
                "label" => __('Notification button', 'ohio'),
                "name" => "global_notification_button",
                "type" => "true_false",
                "instructions" => __('Enable notification button', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        "field" => "field_592fe13500qwedqwxs",
                        "operator" => "==",
                        "value" => "1"
                    ]
                ],
                "message" => "",
                "default_value" => 0,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_592feа125350kasdgh",
                "label" => __('Button link', 'ohio'),
                "name" => "global_notification_button_link",
                "type" => "link",
                "instructions" => __('Set up button link', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fe13500asdas",
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
                "key" => "field_583592feа12asdf4asfasf",
                "label" => __('Notification background', 'ohio'),
                "name" => "global_notification_background_color",
                "type" => "ohio_color",
                "instructions" => __('Choose background color for notification', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        "field" => "field_592fe13500qwedqwxs",
                        "operator" => "==",
                        "value" => "1"
                    ]
                ],
                "ui" => 0,
                "ajax" => 0,
                "placeholder" => ""
            ],
            [
                "key" => "field_592s33s15af4g8t",
                "label" => '<h4>' . __('Display Settings', 'ohio') . '</h4>',
                "name" => "",
                "type" => "message",
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fe13500qwedqwxs",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ]
            ],
            [
                "key" => "field_583592feа12asdf435e",
                "label" => __('Expires', 'ohio'),
                "name" => "global_notification_expires",
                "type" => "text",
                "instructions" => __('After expiry, user will see the notification bar again', 'ohio'),
                "required" => 0,
                "append" => __('days', 'ohio'),
                "conditional_logic" => [
                    [
                        "field" => "field_592fe13500qwedqwxs",
                        "operator" => "==",
                        "value" => "1"
                    ]
                ],
                "default_value" => "360",
                "allow_null" => 0,
                "multiple" => 0,
                "ui" => 0,
                "ajax" => 0,
                "maxlength" => "3",
                "placeholder" => ""
            ],
            [
                "key" => "field_598s31s15af5g9t",
                "label" => '<h4>' . __('Typography Settings', 'ohio') . '</h4>',
                "name" => "",
                "type" => "message",
                "conditional_logic" => [
                    [
                        "field" => "field_592fe13500qwedqwxs",
                        "operator" => "==",
                        "value" => "1"
                    ]
                ]
            ],
            [
                "key" => "field_583592feа12as98holrv",
                "label" => __('Notification details typography', 'ohio'),
                "name" => "global_notification_details_typo",
                "type" => "ohio_typo",
                "instructions" => __('Set up typography styles for notification details', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        "field" => "field_592fe13500qwedqwxs",
                        "operator" => "==",
                        "value" => "1"
                    ]
                ]
            ],
            [
                "key" => "field_542244d4343ch",
                "label" => __('Options Cache', 'ohio'),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_592fe13500cch",
                "label" => __('Use options cache', 'ohio'),
                "name" => "global_options_cache",
                "type" => "true_false",
                "instructions" => __('Cache allows to avoid repeated queries to the database, thereby speeding up your site. Turn off this setting to reset and stop cache', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ]
        ],
        "location" => [
            [
                [
                    "param" => "options_page",
                    "operator" => "==",
                    "value" => "theme-general-other"
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
