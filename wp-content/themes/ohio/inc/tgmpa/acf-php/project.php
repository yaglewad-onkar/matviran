<?php if (function_exists('acf_add_local_field_group')) :

    acf_add_local_field_group([
        "key" => "group_59391f245236d",
        "title" => __('Project Details', 'ohio'),
        "private" => true,
        "fields" => [
            [
                "key" => "field_59391f24594ff",
                "label" => __('Short description', 'ohio'),
                "name" => "project_description",
                "type" => "wysiwyg",
                "instructions" => __('Write a short description for this project', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => "",
                "placeholder" => "",
                "maxlength" => "",
                "rows" => "",
                "new_lines" => "wpautop"
            ],
            [
                "key" => "field_59391f24598db",
                "label" => __('Media gallery', 'ohio'),
                "name" => "project_content",
                "type" => "gallery",
                "instructions" => __('Add media files for this project', 'ohio') . '<em>&nbsp;' . __('(JPG, PNG, GIF formats are supported)', 'ohio') . '</em>',
                "required" => 0,
                "conditional_logic" => 0,
                "min" => "",
                "max" => "",
                "insert" => "append",
                "library" => "all",
                "min_width" => "",
                "min_height" => "",
                "min_size" => "",
                "max_width" => "",
                "max_height" => "",
                "max_size" => "",
                "mime_types" => "png, jpg, jpeg, gif"
            ],
            [
                "key" => "field_59391f24598db5182g",
                "label" => __('Featured image', 'ohio'),
                "name" => "project_add_featured_on_page",
                "type" => "inherited_checkbox",
                "instructions" => __('Show featured image on the project page?', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => "inherited"
            ],
            [
                "key" => "field_59391f24598db5182j",
                "label" => __('Featured image in the lightbox', 'ohio'),
                "name" => "project_add_featured_to_gallery",
                "type" => "inherited_checkbox",
                "instructions" => __('Show featured image in the lightbox?', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => "inherited"
            ],
            [
                "key" => "field_59391f245a1tra6",
                "label" => __('Video', 'ohio'),
                "name" => "project_video",
                "type" => "text",
                "instructions" => __('Add a video file for this project', 'ohio') . '<em>&nbsp;' . __('(YouTube, Vimeo formats are supported)', 'ohio') . '</em>',
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => "",
                "placeholder" => "",
                "prepend" => "",
                "append" => "",
                "maxlength" => ""
            ],
            [
                "key" => "field_59391f2459ccd",
                "label" => __('Date', 'ohio'),
                "name" => "project_date",
                "type" => "date_picker",
                "instructions" => __('Choose the project date', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "display_format" => "F j, Y",
                "return_format" => "F j, Y",
                "first_day" => 1
            ],
            [
                "key" => "field_59391f245a0b6",
                "label" => __('Task', 'ohio'),
                "name" => "project_task",
                "type" => "text",
                "instructions" => __('Specify what a challenge you had to overcome working on this project', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => "",
                "placeholder" => "",
                "prepend" => "",
                "append" => "",
                "maxlength" => ""
            ],
            [
                "key" => "field_59391f245a4b5",
                "label" => __('Strategy', 'ohio'),
                "name" => "project_strategy",
                "type" => "text",
                "instructions" => __('Project strategy', 'ohio') . '<em>&nbsp;' . __('(e.g. Brand Strategy, UX Strategy)', 'ohio') . '&nbsp;</em>' . __('or leave blank', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => "",
                "placeholder" => "",
                "prepend" => "",
                "append" => "",
                "maxlength" => ""
            ],
            [
                "key" => "field_59391f245a4b51",
                "label" => __('Design', 'ohio'),
                "name" => "project_design",
                "type" => "text",
                "instructions" => __('Project design', 'ohio') . '<em>&nbsp;' . __('(e.g. UI/UX Design, Art Direction)', 'ohio') . '&nbsp;</em>' . __('or leave blank', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => "",
                "placeholder" => "",
                "prepend" => "",
                "append" => "",
                "maxlength" => ""
            ],
            [
                "key" => "field_59391f245a893",
                "label" => __('Client', 'ohio'),
                "name" => "project_client",
                "type" => "text",
                "instructions" => __('Project client', 'ohio') . '<em>&nbsp;' . __('(e.g. Envato Market)', 'ohio') . '&nbsp;</em>' . __('or leave blank', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => "",
                "placeholder" => "",
                "prepend" => "",
                "append" => "",
                "maxlength" => ""
            ],
            [
                "key" => "field_59391f245b478",
                "label" => __('Custom fields', 'ohio'),
                "name" => "project_custom_fields",
                "type" => "repeater",
                "instructions" => __('Custom fields', 'ohio') . '<em>&nbsp;' . __('(e.g. Tools, Technologies)', 'ohio') . '</em>',
                "required" => 0,
                "conditional_logic" => 0,
                "collapsed" => "",
                "min" => 0,
                "max" => 6,
                "layout" => "table",
                "button_label" => __('+ Add Field', 'ohio'),
                "sub_fields" => [
                    [
                        "key" => "field_59391f246d98c",
                        "label" => __('Title', 'ohio'),
                        "name" => "project_custom_field_title",
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
                        "prepend" => "",
                        "append" => "",
                        "maxlength" => ""
                    ],
                    [
                        "key" => "field_59391f246dd81",
                        "label" => __('Value', 'ohio'),
                        "name" => "project_custom_field_value",
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
                        "prepend" => "",
                        "append" => "",
                        "maxlength" => ""
                    ]
                ]
            ],
            [
                "key" => "field_59391f245b078",
                "label" => __('Project link', 'ohio'),
                "name" => "project_open_type",
                "type" => "select",
                "instructions" => __('Choose a showcase page for this project', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "choices" => [
                    "project" => __('Open a standard project page', 'ohio'),
                    "external_target" => __('Open a project external link', 'ohio'),
                    "external_blank" => __('Open a project external link in a new tab', 'ohio')
                ],
                "default_value" => [
                    "project"
                ],
                "allow_null" => 0,
                "multiple" => 0,
                "ui" => 0,
                "ajax" => 0,
                "return_format" => "value",
                "placeholder" => ""
            ],
            [
                "key" => "field_59391f245ac8a",
                "label" => __('Project external link', 'ohio'),
                "name" => "project_link",
                "type" => "url",
                "instructions" => __('Add a link to the custom project page or live project website', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => "",
                "placeholder" => ""
            ]
        ],
        "location" => [
            [
                [
                    "param" => "post_type",
                    "operator" => "==",
                    "value" => "ohio_portfolio"
                ]
            ]
        ],
        "menu_order" => 0,
        "position" => "acf_after_title",
        "style" => "default",
        "label_placement" => "top",
        "instruction_placement" => "label",
        "hide_on_screen" => "",
        "active" => 1,
        "description" => ""
    ]);

endif;
