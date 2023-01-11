/*!
* FitVids 1.1
*
* Copyright 2013, Chris Coyier - http://css-tricks.com + Dave Rupert - http://daverupert.com
* Credit to Thierry Koblentz - http://www.alistapart.com/articles/creating-intrinsic-ratios-for-video/
* Released under the WTFPL license - http://sam.zoy.org/wtfpl/
*
*/
(function(a){a.fn.fitVids=function(b){var e={customSelector:null,ignore:null,};if(!document.getElementById("fit-vids-style")){var d=document.head||document.getElementsByTagName("head")[0];var c=".fluid-width-video-wrapper{width:100%;position:relative;padding:0;}.fluid-width-video-wrapper iframe,.fluid-width-video-wrapper object,.fluid-width-video-wrapper embed {position:absolute;top:0;left:0;width:100%;height:100%;}";var f=document.createElement("div");f.innerHTML='<p>x</p><style id="fit-vids-style">'+c+"</style>";d.appendChild(f.childNodes[1])}if(b){a.extend(e,b)}return this.each(function(){var g=["iframe[src*='player.vimeo.com']","iframe[src*='youtube.com']","iframe[src*='youtube-nocookie.com']","iframe[src*='kickstarter.com'][src*='video.html']","object","embed"];if(e.customSelector){g.push(e.customSelector)}var h=".fitvidsignore";if(e.ignore){h=h+", "+e.ignore}var i=a(this).find(g.join(","));i=i.not("object object");i=i.not(h);i.each(function(){var n=a(this);if(n.hasClass("jwswf")){return}if(n.parents(h).length>0){return}if(this.tagName.toLowerCase()==="embed"&&n.parent("object").length||n.parent(".fluid-width-video-wrapper").length){return}if((!n.css("height")&&!n.css("width"))&&(isNaN(n.attr("height"))||isNaN(n.attr("width")))){n.attr("height",9);n.attr("width",16)}var j=(this.tagName.toLowerCase()==="object"||(n.attr("height")&&!isNaN(parseInt(n.attr("height"),10))))?parseInt(n.attr("height"),10):n.height(),k=!isNaN(parseInt(n.attr("width"),10))?parseInt(n.attr("width"),10):n.width(),l=j/k;if(!n.attr("id")){var m="fitvid"+Math.floor(Math.random()*999999);n.attr("id",m)}n.wrap('<div class="fluid-width-video-wrapper"></div>').parent(".fluid-width-video-wrapper").css("padding-top",(l*100)+"%");n.removeAttr("height").removeAttr("width")})})}})(window.jQuery||window.Zepto);

/**
 * JQuery Appear
 */
(function($) {

    "use strict";

    var selectors = [];
    var check_binded = false;
    var check_lock = false;

    var defaults = {
        interval: 250,
        force_process: false
    };

    var $window = $(window);
    var $prior_appeared = [];

    function appeared(selector) {
        return $(selector).filter(function() {
            return $(this).is(':appeared');
        });
    }

    function process() {

        check_lock = false;

        for (var index = 0, selectorsLength = selectors.length; index < selectorsLength; index++) {

            var $appeared = appeared(selectors[index]);
            $appeared.trigger('appear', [$appeared]);

            if ($prior_appeared[index]) {
                var $disappeared = $prior_appeared[index].not($appeared);
                $disappeared.trigger('disappear', [$disappeared]);
            }

            $prior_appeared[index] = $appeared;
        }

    }

    function add_selector(selector) {
        selectors.push(selector);
        $prior_appeared.push();
    }


    $.expr[':'].appeared = function(element) {

        var $element = $(element);

        if (!$element.is(':visible')) {
            return false;
        }

        var window_left = $window.scrollLeft();
        var window_top = $window.scrollTop();
        var offset = $element.offset();
        var left = offset.left;
        var top = offset.top;

        if (top + $element.height() >= window_top && top - ($element.data('appear-top-offset') || 0) <= window_top + $window.height() && left + $element.width() >= window_left && left - ($element.data('appear-left-offset') || 0) <= window_left + $window.width()) {
            return true;
        } else {
            return false;
        }
    };

    $.fn.extend({

        // watching for element's appearance in browser viewport
        appear: function(options) {

            var opts = $.extend({}, defaults, options || {});
            var selector = this.selector || this;

            if (!check_binded) {

                var on_check = function() {

                    if (check_lock) {
                        return;
                    }

                    check_lock = true;
                    setTimeout(process, opts.interval);

                };

                $(window).scroll(on_check).resize(on_check);
                check_binded = true;

            }

            if (opts.force_process) {
                setTimeout(process, opts.interval);
            }

            add_selector(selector);
            return $(selector);

        }
    });

    $.extend({

        force_appear: function() {

            if (check_binded) {
                process();
                return true;
            }

            return false;

        }

    });

})(jQuery);


;(function ($) {

    "use strict";

    $.fn.numeric = function (options) {

        return this.each(function () {

            var  $this = $(this);

            $this.keypress(options, function (e) {

                if( e.which === 8 || e.which === 0 ) {
                    return  true;
                }

                if( e.which < 48 || e.which > 57 ) {
                    return false;
                }

                var dest = e.which - 48;
                var result = this.value + dest.toString();

                if( result > e.data.max ) {

                    $this.val( e.data.max );
                    $this.siblings('.ut-numeric-slider').slider( "value", e.data.max );
                    $this.siblings('.ut-numeric-slider-hidden-input').val( e.data.max );

                    return false;

                }

            });

        });

    };

})(jQuery);


/**
 * Option Tree UI
 *
 * @author Derek Herman (derek@valendesigns.com)
 */
;(function($) {

    "use strict";

    window.ut_current_compact_list = '';
    window.ut_current_compact_list_preview = '';

    var OT_UI = {

        processing: false,
        deleting: false,

        init: function( skip_tiny ) {

            this.init_hide_body();
            this.init_tabs();
            this.init_sortable();
            this.add_list_title();
            this.init_numeric_slider();
            this.init_icon_picker();
            this.init_color_picker();
            this.init_google_font();
            this.runTinyMCE( skip_tiny );
            this.init_dependencies();
            this.replicate_ajax();

        },
        init_hide_body: function(elm,type) {

            var css = '.option-tree-setting-body';

            if ( type === 'parent' ) {

                $(css).not(elm.parent().parent().children(css)).hide();

            } else if (type === 'child') {

                elm.closest('ul').find(css).not( elm.parent().parent().children(css) ).hide();

            } else if (type === 'child-add') {

                elm.children().find(css).hide();

            } else if (type === 'toggle') {

                elm.parent().parent().children(css).toggle();

            } else {

                $(css).hide();

            }

        },
        init_remove_active: function(elm,type) {

            var css = '.option-tree-setting-edit';

            if ( type === 'parent' ) {

                $(css).not(elm).removeClass('active');

            } else if (type === 'child') {

                elm.closest('ul').find(css).not(elm).removeClass('active');

            } else if (type === 'child-add') {

                elm.children().find(css).removeClass('active');

            } else {

                $(css).removeClass('active');

            }

        },
        init_tabs: function(){

            $('.ut-button-builder-tabgroup > div').hide();
            $('.ut-button-builder-tabgroup > div:first-of-type').show();

            $('.ut-responsive-settings-tabgroup > div').hide();
            $('.ut-responsive-settings-tabgroup > div:first-of-type').show();

            $('.ut-responsive-settings-tabs a').each( function () {

                if( $(this).data('tooltipsterNs') ) {
                    return;
                }

                $(this).tooltipster({trigger:"hover"}).tooltipster('content', $(this).data('tooltip') );

            });

        },
        init_sortable: function() {

            $('.ut-sortable').not('.ut-option-initialized').each( function() {

                if ( $(this).children('li').length ) {

                    var elm = $(this);

                    elm.show();
                    elm.sortable({
                        items: 'li:not(.ui-state-disabled)',
                        handle: 'div.option-tree-setting',
                        placeholder: 'ui-state-highlight',
                        cancel: '.option-tree-setting-body',
                        start: function (event, ui) {
                            ui.placeholder.height(ui.item.height());
                        },
                        stop: function(evt, ui) {

                            setTimeout( function(){
                                OT_UI.update_ids(elm);
                            }, 200 );

                        }

                    });

                    $(this).addClass('ut-option-initialized');

                }

            });

            $('.ut-sortable-tax').not('.ut-option-initialized').each( function() {

                if ( $(this).children('li').length ) {

                    var elm = $(this);

                    elm.show();

                    elm.sortable({
                        handle: '.ut-handle',
                        placeholder: "ut-handle-highlight"
                    });

                }

            });

            $('.ut-sortable-header-toolbar').not('.ut-option-initialized').each( function() {

                if ( $(this).children('li').length ) {

                    var elm = $(this);

                    elm.show();

                    elm.sortable({
                        placeholder: "ui-sortable-placeholder",
                        forcePlaceholderSize: true,
                        tolerance: "pointer"
                    });
                    elm.disableSelection();

                }

            });

        },
        add_list_title: function() {

            $('.ut-select-setting-title').each(function() {
                OT_UI.edit_title_select(this);
            });

        },
        runTinyMCE: function( skip_tiny ) {

            if( typeof tinyMCEPreInit === "undefined" || skip_tiny ) {
                return false;
            }

            /* get config from hidden editor */
            var tinyMCEConfig = tinyMCEPreInit.mceInit['ut-hidden-editor'];
            var $textareas = $('.ut-ui-tinymce textarea');

            $textareas.each(function() {

                var area_id = $(this).attr('id'),
                    parent  = $(this).closest('.wp-editor-wrap');

                /* add changed settings object to tinyMCEPreInit Object */
                tinyMCEPreInit.mceInit[area_id] = tinyMCEConfig;

                var qtsettings = {
                    'buttons' : '',
                    'disabled_buttons' : '',
                    'id' : area_id
                };

                /* add qt settings for the new instance as well*/
                tinyMCEPreInit.qtInit[area_id] = qtsettings;

                /* run editor */
                tinymce.init( tinyMCEConfig );
                tinymce.execCommand( 'mceAddEditor', true, area_id );

                /* add quicktags */
                var qt = new QTags(qtsettings);

                setTimeout( function() {

                    $(parent).removeClass('html-active').addClass('tmce-active');
                    QTags._buttonsInit();

                }, 750 );

            });

        },
        init_google_font: function() {

            $(".ut-select-js-data-ajax").select2({
                cache: false,
                ajax: {
                    type: 'POST',
                    delay: 350,
                    url: ajaxurl,
                    dataType: 'json',
                    data: function (params) {

                        var query = {
                            search: params.term,
                            action: 'search_google_fonts'
                        };

                        return query;

                    },
                    processResults: function (data) {

                        return {
                            results: data
                        };

                    }

                }
            });

            // update all fields first
            $(".ut-google-font-select, .ut-select-js-data-ajax").not(".ut-google-initialized").each(function() {

                var $this = $(this);

                OT_UI.update_google_font_fields( $this.data("group") );

                $this.addClass('ut-google-initialized');

            });

        },
        update_google_font_fields: function( group ) {

            if(!group) {
                return;
            }

            var $this = $("#"+group+"-font-family");

            var font 	 = '',
                subsets	 = '',
                variants = '',
                font_id	 = '';

            if( $("#"+group+"-font-family").select2('data').length && typeof( $("#"+group+"-font-family").select2('data')[0].fontid ) !== 'undefined' ) {

                var font_data = $("#"+group+"-font-family").select2('data')[0];

                // console.log( $("#"+group+"-font-family").select2('data')[0].fontid );

                // after ajax
                font 	 = font_data.font;
                subsets	 = font_data.subsets;
                variants = font_data.variants;
                font_id	 = font_data.fontid;

            } else {

                // standard
                font 	 = $this.find(':selected').data('font');
                subsets	 = $this.find(':selected').data('subsets');
                variants = $this.find(':selected').data('variants');
                font_id	 = $this.find(':selected').data('fontid');

            }

            var font_size	   = $("#"+group+"-font-size").val(),
                font_weight	   = $("#"+group+"-font-weight").val(),
                text_transform = $("#"+group+"-text-transform").val(),
                font_style	   = $("#"+group+"-font-style").val();


            if( font ) {

                /* update subsets */
                OT_UI.update_google_font_subsets( group , subsets );

                /* update weights*/
                OT_UI.update_google_font_weights( group , variants );

                /* change link attr */
                OT_UI.update_google_font_link( group );

                /* update font preview */
                OT_UI.update_google_font_preview( group , font_size , font, font_weight, font_style, text_transform );

                /* update hidden ID */
                $("#"+group+"-fontid").val(font_id);

            } else {

                $("#ut-google-style-"+group).text('');

            }

        },
        update_google_font_subsets: function( group , subsets ) {

            subsets = subsets.split(",");

            /* reset select field if selected state is not available anymore */
            if( $.inArray( $("#"+group+"-font-subset").val() , subsets ) === -1 ) {
                $("#"+group+"-font-subset").prop('selectedIndex', 0).prev('span').replaceWith('<span>' + $("#"+group+"-font-subset").find('option:selected').text() + '</span>');
            }

            /* update available subsets */
            $("#"+group+"-font-subset option").each(function() {

                if( $.inArray( $(this).val() , subsets ) >= 0 || !$(this).val() ) {

                    $(this).attr("disabled" , false);

                } else {

                    $(this).attr("disabled" , true);

                }

            });

        },
        update_google_font_weights: function( group , variants ) {

            variants = variants.replace("regular", "400");
            variants = variants.split(",");

            /* reset select field if selected state is not available anymore */
            if( $.inArray( $("#"+group+"-font-weight").val() , variants ) === -1 ) {
                $("#"+group+"-font-weight").prop('selectedIndex', 0).prev('span').replaceWith('<span>' + $("#"+group+"-font-weight").find('option:selected').text() + '</span>');
            }

            $("#"+group+"-font-weight option").each(function() {

                if( $.inArray( $(this).val() , variants ) >= 0 || !$(this).val() ) {

                    $(this).attr("disabled" , false);

                } else {

                    $(this).attr("disabled" , true);

                }

            });
        },
        update_google_font_link: function( group ) {

            if(!group) {
                return;
            }

            var $this		= $("#"+group+"-font-family"),
                url 		= 'https://fonts.googleapis.com/css?family=',
                font_weight	= $("#"+group+"-font-weight").val(),
                family      = '';

            if( $("#"+group+"-font-family").select2('data').length && typeof( $("#"+group+"-font-family").select2('data')[0].fontid ) !== 'undefined' ) {

                var font_data = $("#"+group+"-font-family").select2('data')[0];
                family    = font_data.family;

            } else {

                family = $this.find(':selected').data('family');

            }

            $("#ut-google-style-link-"+group).attr("href" , url+family+':'+font_weight);

        },
        update_google_font_preview: function( group , font_size , font, font_weight, font_style, text_transform ) {

            $("#ut-google-style-"+group).text('#ut-google-preview-'+group+' { font-family: "'+ font +'" !important; font-weight: '+font_weight+'; font-style: '+font_style+'; text-transform: '+text_transform+'; }');

        },
        add: function(elm,type) {

            var self = this,
                list = '',
                list_class = '',
                name = '',
                post_id = 0,
                get_option = '',
                settings = '',
                sections = '',
                list_title = '';

            if ( type === 'choice' ) {

                list = $(elm).parent().children('ul');
                list_class = 'list-choice';

            } else if ( type === 'list_item' ) {

                list = $(elm).parent().children('ul');
                list_class = 'list-sub-setting';

            } else if ( type === 'list_compact_item' ) {

                list = $(elm).parent().children('ul');
                list_class = 'compact-list-item';

            } else if ( type === 'list_item_setting' ) {

                list = $(elm).parent().children('ul');
                list_class = 'list-sub-setting';

            } else {

                list = $(elm).parent().find('ul:first');
                list_class = ( type === 'section' ) ? 'list-section' : 'list-setting';

            }

            name = list.data('name');
            post_id = list.data('id');
            get_option = list.data('getOption');
            list_title = list.data('list-title');
            settings = $('#'+name+'_settings_array').val();
            sections = $('#'+name+'_sections_array').val();

            if ( this.processing === false ) {

                this.processing = true;

                var count = parseInt(list.children('li').length);

                if ( type === 'list_item' || type === 'list_compact_item' ) {

                    list.find('li input.option-tree-setting-title', self).each(function(){

                        var setting = $(this).attr('name'),
                            regex = /\[([0-9]+)\]/,
                            matches = setting.match(regex),
                            id = null !== matches ? parseInt(matches[1]) : 0;
                        id++;
                        if ( id > count) {
                            count = id;
                        }

                    });

                    if( list.children().length >= list.data('max') ) {

                        modal({
                            type: 'warning',
                            title: 'Info',
                            text: unite_js_translation['header_limit_'+ list.data('max')],
                            buttons: [{
                                text: 'OK',
                                val: 'ok',
                                eKey: true,
                                addClass: 'ut-ui-button-yellow',
                                onClick: function (dialog) {
                                    return true;
                                }
                            }],
                            callback: function (result) {



                            }

                        });

                        self.processing = false;

                        return;

                    }

                }

                $.ajax({
                    type: 'POST',
                    url: ajaxurl,
                    data: {
                        action: 'add_' + type,
                        count: count,
                        name: name,
                        post_id: post_id,
                        get_option: get_option,
                        settings: settings,
                        sections: sections,
                        type: type,
                        list_title: list_title
                    },
                    complete: function( data ) {

                        if ( type === 'choice' || type === 'list_item_setting' ) {

                            OT_UI.init_remove_active(list,'child-add');
                            OT_UI.init_hide_body(list,'child-add');

                        } else {

                            OT_UI.init_remove_active();
                            OT_UI.init_hide_body();

                        }

                        var $list_item = $('<li class="ui-state-default ' + list_class + '">' + data.responseText + '</li>');

                        list.append( $list_item );
                        list.children().last().find('.option-tree-setting-edit').toggleClass('active');
                        list.children().last().find('.option-tree-setting-body').toggle();
                        list.children().last().find('.option-tree-setting-title').focus();

                        OT_UI.update_ids(list);

                        setTimeout( function() {

                            OT_UI.init_tabs();
                            OT_UI.init_sortable();
                            OT_UI.add_list_title();
                            OT_UI.init_numeric_slider();
                            OT_UI.init_color_picker();
                            OT_UI.init_icon_picker();

                        }, 500);

                        if( $('#ut_portfolio_link_type').length !== 0 ) {
                            $('#ut_portfolio_link_type').trigger('change');
                        }

                        if( type === 'list_compact_item' ) {

                            window.ut_current_compact_list_preview = $list_item.find('.compact-list-item-preview-image-container');
                            $('#ut-list-manager-modal-lightbox').addClass('show ut-modal-loaded');

                        }

                        self.processing = false;
                    }

                });

            }

        },
        remove: function(e) {
            $(e).parent().parent().parent('li').remove();
        },
        compact_remove: function(e) {
            $(e).closest('li').remove();
        },
        edit_title: function(e) {

            if ( this.timer ) {
                clearTimeout(e.timer);
            }

            this.timer = setTimeout( function() {
                $(e).parent().parent().parent().children('.open').text(e.value);
            }, 100);

            return true;

        },
        edit_title_select: function(e) {

            var title = e.value.replace("fa-","").replace("-"," ");

            $(e).parent().parent().parent().parent().children('.open').text(title);

            return true;

        },
        edit_title_compact: function(e) {

            if ( this.timer ) {
                clearTimeout(e.timer);
            }

            this.timer = setTimeout( function() {

                $(e).closest('.ut-admin-panel-content').prev('.ut-modal-header').children('h3').text(e.value);
                $(e).closest('.option-tree-setting').children('.open').find('h3').text(e.value);

            }, 100);

            return true;

        },
        edit_desc_compact: function(e) {

            if ( this.timer ) {
                clearTimeout(e.timer);
            }

            this.timer = setTimeout( function() {
                $(e).closest('.option-tree-setting').children('.open').find('span').text(e.value);
            }, 100);

            return true;

        },
        update_id: function(e) {

            if ( this.timer ) {
                clearTimeout(e.timer);
            }

            this.timer = setTimeout( function() {
                OT_UI.update_ids( $(e).parents('ul') );
            }, 100);

            return true;

        },
        update_ids: function(list) {

            var last_section, section, list_items = list.children('li');

            list_items.each(function(index) {

                if ( $(this).hasClass('list-section') ) {

                    section = $(this).find('.section-id').val().trim().toLowerCase().replace(/[^a-z0-9]/gi,'_');

                    if (!section) {
                        section = $(this).find('.section-title').val().trim().toLowerCase().replace(/[^a-z0-9]/gi,'_');
                    }

                    if (!section) {
                        section = last_section;
                    }

                }

                if ($(this).hasClass('list-setting') ) {

                    $(this).find('.hidden-section').attr({'value':section});

                }

                last_section = section;
            });
        },
        init_upload_fix: function(elm, single_upload ) {

            if( this.deleting ) {
                return;
            }

            var id  = $(elm).attr('id'),
                val = $(elm).val(),
                img = $(elm).parent().next('ut-ui-media-wrap').find('img'),
                src = img.attr('src'),
                btnContent = '';

            if( $(elm).next().hasClass('ut-single-media-upload-id') ) {
                return;
            }

            if ( val !== src ) {

                img.attr('src', val);

                if( ut_current_compact_list_preview.length ) {

                    ut_current_compact_list_preview.find('.compact-list-item-preview-image').css('background-image', 'url(' + val + ')');

                }

            }

            if ( val !== '' && ( typeof src === 'undefined' || src === false ) && OT_UI.url_exists(val) ) {

                var image = /\.(?:jpe?g|png|svg|gif|ico)$/i;
                var single_class = single_upload ? 'ut-single-media-upload' : '';

                if( $('#'+id+'_media').length ) {

                    if (val.match(image)) {

                        $('#'+id+'_media').find("img").attr("src", val );

                    }

                    btnContent += '<button class="ut-ui-remove-media ut-ui-button red" title="'+unite_js_translation.remove_media_text+'">'+unite_js_translation.remove_media_text+'</button>';

                    $('#'+id).val(val);
                    $('#'+id+'_media').append(btnContent).slideDown();

                } else {

                    if( val.match(image) ) {
                        btnContent += '<div class="ut-ui-image-wrap ' + single_class + '"><img src="'+val+'" alt="" /></div>';
                    }

                    btnContent += '<button class="ut-ui-remove-media ut-ui-button red" title="'+unite_js_translation.remove_media_text+'">'+unite_js_translation.remove_media_text+'</button>';

                    $('#'+id).val(val);
                    $('#'+id+'_media').remove();
                    $('#'+id).parent().parent('div').append('<div class="ut-ui-media-wrap ' + single_class + '" id="'+id+'_media" />');
                    $('#'+id+'_media').append(btnContent).slideDown();


                }

                if( ut_current_compact_list_preview.length ) {

                    ut_current_compact_list_preview.find('.compact-list-item-preview-image').css('background-image', 'url(' + val + ')');

                }

            } else if ( val === '' || ! OT_UI.url_exists(val) ) {

                $(elm).parent().next('.ut-ui-media-wrap').remove();

                if( ut_current_compact_list_preview.length ) {

                    ut_current_compact_list_preview.find('.compact-list-item-preview-image').css('background-image', 'url(' + unite.placeholder + ')');

                }

            }

        },
        init_numeric_slider: function() {

            $(".ut-numeric-slider-wrap").not('.ut-option-initialized').each(function() {

                if( this.classList.contains('ut-option-initialized') ) {
                    return;
                }

                let hidden      = $(".ut-numeric-slider-hidden-input", this),
                    helper      = $(".ut-numeric-slider-helper-input", this),
                    $slider     = $(".ut-numeric-slider", this),
                    value       = hidden.val(),
                    in_widget   = $(this).hasClass('ut-widget-slider');

                let slider_settings = {
                    min: hidden.data("min"),
                    max: hidden.data("max"),
                    step: hidden.data("step"),
                    slide: function(event, ui) {

                        helper.removeClass('inherit');

                        if( hidden.attr('data-inherit') && ui.value === hidden.data('inherit') ) {

                            hidden.val('');

                            if( helper.data('breakpoint') && helper.data('breakpoint') === 'desktop_large'  ) {

                                helper.val('default').addClass('inherit');

                            } else {

                                helper.val('inherit').addClass('inherit');

                            }

                        } else {

                            hidden.val(ui.value);
                            helper.val(ui.value);

                            if( in_widget ) {
                                
                                hidden.trigger("change");
                                
                            }

                        }

                    },
                }

                $slider.slider(slider_settings);

                if ( ! value ) {

                    if( hidden.data('inherit') ) {

                        hidden.val('');
                        helper.addClass('inherit');

                        // slider_settings['value'] = hidden.data("inherit");

                    } else {

                        value = hidden.data("min");
                        helper.val();

                        $slider.slider("value", value);

                    }

                }

                setTimeout(function (){

                    helper.trigger('propertychange');

                }, 2000 );

                /* set max value and tooltip */
                helper.tooltipster({trigger:"click"}).tooltipster('content', helper.data('tooltip') ).numeric({ max: hidden.data("max") });

                $(this).addClass('ut-option-initialized');

            });

            $('.ut-numeric-slider-helper-input').each( function() {

                let $this = $(this);

                if( $this.siblings('.ut-numeric-slider-hidden-input').val() === '' ) {

                    if( $this.data('breakpoint') && $this.data('breakpoint') === 'desktop_large'  ) {

                        $this.addClass('inherit');
                        $this.val('default');

                    } else {

                        $this.addClass('inherit');
                        $this.val('inherit');

                    }

                }

                $(this).trigger('propertychange');

            });

            $('.ut-ui-select-dynamic').each(function () {

                $(this).trigger('change');

            });

        },
        init_icon_picker: function() {

            $('.ut-icon-select').not(".ut-option-initialized").each(function() {

                var $this = $(this);

                $this.fontIconPicker({

                    theme: 'fip-inverted',
                    iconsPerPage: 50

                });

                $this.addClass('ut-option-initialized');

            });

        },
        init_color_picker: function() {

            $('.ut-minicolors').on('focus', function(){

                $(document).data('colorpicker-in-use', true);

            }).on('focusout', function(){

                $(document).data('colorpicker-in-use', false);

                var $this = $(this);

                setTimeout( function(){

                    $this.trigger('change');

                }, 100 );

            });

            $('.ut-minicolors').not(".ut-option-initialized").each(function() {

                var $this = $(this),
                    mode  = $this.data('mode'),
                    position = $this.data('position') ? $this.data('position') : 'bottom left';

                if( mode === 'rgb' ) {

                    $this.minicolors({
                        format : mode,
                        opacity: true,
                        position: position,
                        keywords : 'transparent, initial, inherit'
                    });

                } else {

                    $this.minicolors({
                        format: mode,
                        letterCase: 'uppercase',
                        position: position,
                        keywords : 'transparent, initial, inherit'
                    });

                }

                $this.addClass('ut-option-initialized');

            });

            $(".ut-gradient-picker").not(".ut-option-initialized").each(function() {

                var $this = $(this);

                $this.asColorPicker();
                $this.addClass('ut-option-initialized');

            });

        },
        remove_image: function(e) {

            // block change on input
            this.deleting = true;

            $(e).parent().parent().next().find('.ut-ui-upload-input').attr('value','');
            $(e).parent().parent().next().find('.ut-ui-upload-input').val('');

            $(e).parent().prev('.ut-ui-upload-parent').find('.ut-ui-upload-input').attr('value','');
            $(e).parent().prev('.ut-ui-upload-parent').find('.ut-ui-upload-input').val('');

            if( $(e).parent('.ut-ui-media-wrap').hasClass('ut-single-media-upload') ) {

                $(e).parent('.ut-ui-media-wrap').remove();

            } else {

                $(e).parent('.ut-ui-media-wrap').find('img').attr("src", unite.placeholder );

            }

            $(e).siblings('.ut-ui-remove-media').remove();
            $(e).remove();

            if( ut_current_compact_list_preview.length ) {

                ut_current_compact_list_preview.find('.compact-list-item-preview-image').css('background-image', 'url(' + unite.placeholder + ')');

            }

            //delete done
            this.deleting = false;

        },
        remove_image_id: function(e) {

            $(e).closest('.ut-ui-upload-parent').find('.ut-ui-upload-input').attr('value','').trigger('change');

            $(e).siblings('.ut-ui-image-wrap').remove();
            $(e).remove();

        },
        init_dependencies: function() {

            /* theme options dependencies */
            if( $("#ut-admin-wrap").length ) {

                $("#ut-admin-wrap").find('.ut-options-outer-panel-group.ut-panel-loaded').each(function() {

                    if( $(this).hasClass("ut-dependencies-initialized") ) {
                        return true;
                    }

                    if( $(this).hasClass("ut-has-sub-dependencies") ) {

                        $("[data-child-of='" +  $(this).data("section-id") +"']").not(".ut-dependencies-initialized").each(function(){

                            $(this).FormDependencies({
                                inactiveClass: 'ut-hide',
                            }).addClass('ut-dependencies-initialized');

                        });

                    } else {

                        $(this).FormDependencies({
                            inactiveClass: 'ut-hide',
                        }).addClass('ut-dependencies-initialized');

                    }

                });

            }

        },
        replicate_ajax: function() {

            if ( location.href.indexOf("#") !== -1 ) {

                var url =  $("input[name=\'_wp_http_referer\']").val(),
                    hash = location.href.substr(location.href.indexOf("#"));

                $("input[name=\'_wp_http_referer\']").val( url + hash );
                this.scroll_to_top();

            }

            setTimeout( function() {
                $(".wrap.settings-wrap .fade").fadeOut("fast");
            }, 3000 );

        },
        url_exists: function(url) {

            var http = new XMLHttpRequest();

            http.open('HEAD', url, false);
            http.send();

            return http.status!==404;

        },
        scroll_to_top: function() {

            setTimeout( function() {
                $(this).scrollTop(0);
            }, 50 );

        }
    }; /* End OT_UI */

    OT_UI.init( false );

    $(document).ready( function() {

        var $admin_header = $('#ut-admin-header-floating');

        function ut_get_current_scroll() {

            return window.pageYOffset || document.documentElement.scrollTop;

        }

        function ut_move_admin_header() {

            if( ut_get_current_scroll() >= 160 ) {

                $admin_header.addClass('ut-show-admin-header');

            } else {

                $admin_header.removeClass('ut-show-admin-header');

            }

        }

        if( $admin_header.length ) {

            $(window).scroll(function() {

                window.requestAnimationFrame( ut_move_admin_header );

            });

        }




        function slicknavOpened(trigger) {

            var $trigger = $(trigger[0]);

            if( $trigger.hasClass('slicknav_btn') ) {
                return;
            }

            // trigger is an <a> anchor contained in a <li>
            var $liParent = $trigger.parent();

            // parent <li> is contained inside a <ul>
            var $ulParent = $liParent.parent();

            $ulParent.children().each(function () {

                var $child = $(this);

                if ($child.is($liParent)) {
                    return;
                }

                if ($child.hasClass('slicknav_collapsed')) {
                    return;
                }

                if (!$child.hasClass('slicknav_open')) {
                    return;
                }

                var $anchor = $child.children().first();

                if (!$anchor.hasClass('slicknav_item')) {
                    return;
                }

                $anchor.click();

            });
        }

        $('.ut-admin-inner-nav').each(function() {

            var $this = $(this);

            $this.slicknav({
                label: '',
                duplicate: false,
                duration: 0, /* no animation */
                prependTo: $this.parent(),
                allowParentLinks: true,
                beforeOpen : function(trigger) {

                    slicknavOpened(trigger);

                }
            }).slicknav('open');

        });

        // Meta Panel Ajax Loader
        var stored_meta_panels = [];

        function store_loaded_meta_panels( id ) {

            stored_meta_panels.push( id );

            $('#ut-store-panels').val( stored_meta_panels.join() );

        }

        $('#ut-metabox-tabs .ut-loaded-panel').each(function() {

            store_loaded_meta_panels( $(this).data("panel-id") );

        });

        // ajax panel loader
        var panel_is_loading = false;
        var $metapanel = $("#ut-metapanel");

        function load_meta_panel_section( $this ) {

            //panel is loading now
            panel_is_loading = true;

            $("#ut-metabox-tabs-overlay").fadeIn( function () {

                $metapanel.addClass('loading');

            });

            $.ajax({

                type: 'POST',
                url: ajaxurl,
                data: {
                    "action"      : "load_meta_panel_section",
                    "section"     : $this.data("panel-id"),
                    "post_ID"	  : $('#ut-metapanel-post').val(),
                    "nonce"		  : $('#ut-metapanel-nonce').val()
                },
                success: function(response) {

                    // section to attach response
                    var section  = "#" + $this.data("panel-id"),
                        $section = $(section);

                    // change state of link to avoid second loading
                    $this.removeClass('ut-ajax-load-panel').addClass('ut-loaded-panel');

                    // add results to panel
                    $section.append(response);

                    // section and page switch
                    $('#setting_ut_page_type').parent().hide();

                    if( typeof ut_meta_panel_vars != "undefined" && ut_meta_panel_vars.site_type === "onepage" ) {

                        $('*[data-group="ut_page_type"]').appendTo('#ut-option-switch');

                    }

                    // init options but skip tiny mce
                    OT_UI.init( true );

                    // store main for later use
                    store_loaded_meta_panels( $this.data("panel-id") );

                    // store sub for later use
                    $section.find('[data-panel-id]').each( function () {

                        store_loaded_meta_panels( $(this).data("panel-id") );

                    });

                    $section.FormDependencies({
                        inactiveClass: 'ut-hide',
                        done: function () {

                            if( $section.hasClass('ui-has-inner-tabs') )  {

                                $(section+'.ui-has-inner-tabs').tabs( "destroy" ).tabs({
                                    create: function() {

                                        /* remove flag */
                                        $("#ut-metabox-tabs-overlay").delay(400).fadeOut( function () {

                                            $metapanel.removeClass('loading');
                                            panel_is_loading = false;

                                        });
                                    }

                                });

                            } else {

                                /* remove flag */
                                $("#ut-metabox-tabs-overlay").fadeOut( function () {

                                    $metapanel.removeClass('loading');
                                    panel_is_loading = false;

                                });

                            }

                        }

                    });

                }

            });

        }

        $('#ut-metabox-tabs .ut-ajax-load-panel').on('click', function( event ){

            var $this = $(this);

            if( $this.hasClass('ut-loaded-panel') ) {
                return false;
            }

            load_meta_panel_section( $this );
            event.preventDefault();

        });

        $(window).on("load", function () {

            if( $('#ut-metabox-tabs').length && window.location.hash && $(window.location.hash).length ) {

                load_meta_panel_section( $('[href='+window.location.hash+']') );

            }

        });

        /* store panel ids for saving process */
        var stored_panels = [];

        function store_loaded_panels( id ) {

            stored_panels.push( id );

            $('#ut-store-panels').val( stored_panels.join() );

        }

        $('#ut-admin-outer-nav li').each(function() {

            if( $(this).hasClass('ut-panel-loaded') ) {

                store_loaded_panels( $(this).children("a").data("section") );

            }

        });

        // check if subpanels are loaded
        function check_subpanel_section_status() {

            $.each( $(".ut-admin-inner-nav li.ut-has-sub-panel"), function( index, element ) {

                if( $(element).hasClass("ut-sub-panel-loaded") ) {
                    return;
                }

                if( typeof $(element).data().panelId !== 'undefined' && document.getElementById('tab_' + $(element).data().panelId) ) {

                    var panel = document.getElementById('tab_' + $(element).data().panelId);
                    panel.classList.add("ut-sub-panel-loaded");

                    store_loaded_sub_panels( $(element).data().panelId );

                }

            });

        }

        /* ajax panel loader */
        var panel_is_loading = false;

        function load_panel_section( $this ) {

            if( $this.parent().hasClass("ut-panel-loaded") ) {
                return;
            }

            $('#' + $this.data("section") + '_placeholder' ).removeClass('ut-hide').addClass('ut-show');

            /* show loader */
            $('#' + $this.data("section") + '_loader' ).fadeIn();

            /* panel is loading now */
            panel_is_loading = true;

            $.ajax({

                type: 'POST',
                url: ajaxurl,
                data: {
                    "action"      : "load_theme_panel_section",
                    "section"     : $this.data("section")
                },
                success: function(response) {

                    /* define section */
                    var section = "#section_" + $this.data("section");

                    /* append new items */
                    // $(response).appendTo( $(section).children('.ut-options-outer-panel-group-append') );

                    $.each( $(response), function( index, element ) {

                        if( !document.getElementById( $(element).attr("id") ) ) {

                            $(element).appendTo( $(section).children('.ut-options-outer-panel-group-append') );

                        }

                    });

                    /* add class to menu in order to avoid double loading */
                    $this.parent().addClass("ut-panel-loaded");

                    /* add status to panel as well */
                    $(section).addClass("ut-panel-loaded");

                    $('#' + $this.data("section") + '_placeholder' ).removeClass('ut-show').addClass('ut-hide');

                    /* hide all tabs first */
                    $('.ut-options-outer-panel-group').removeClass('ut-show').addClass('ut-hide');

                    /* show current tab */
                    $("#section_" + $this.data("section") ).removeClass('ut-hide').addClass('ut-show');

                    /* show sub tab */
                    $("[data-default-section='" +  $this.data("subsection") +"']").trigger("click");
                    $("[data-section='" +  $this.data("subsection") +"']").trigger("click");

                    /* set min height for editor */
                    $('.ut-ace-css-editor').css('min-height',400);

                    /* init options */
                    OT_UI.init();

                    $('#' + $this.data("section") + '_loader' ).fadeOut( 400, function(){

                        /* store ID for later use */
                        store_loaded_panels( $this.data("section") );

                        /* remove flag */
                        panel_is_loading = false;

                    });


                }

            });

        }

        var stored_sub_panels = [];

        function store_loaded_sub_panels( id ) {

            stored_sub_panels.push( id );

            $('#ut-store-sub-panels').val( stored_sub_panels.join() );

        }

        $('.ut-admin-inner-nav .ut-sub-panel-loaded').each(function() {

            store_loaded_sub_panels( $(this).data("panel-id") );

        });


        // ajax panel loader
        var sub_panel_is_loading = false;

        function load_subpanel_section( $this ) {

            if( $this.parent().hasClass("ut-sub-panel-loaded") || !$this.parent().hasClass("ut-has-sub-panel") ) {
                return;
            }

            // show loader
            $('#' + $this.parent().data("master-section") + '_placeholder' ).removeClass('ut-hide').addClass('ut-show');
            $('#' + $this.parent().data("master-section") + '_loader' ).fadeIn();

            sub_panel_is_loading = true;

            $.ajax({

                type: 'POST',
                url: ajaxurl,
                data: {
                    "action"      : "load_theme_subpanel_panel",
                    "section_id"  : $this.parent().data("master-section"),
                    "panel_id"    : $this.parent().data("panel-id"),
                },
                success: function(response) {

                    // define panel
                    var section = "#section_" + $this.parent().data("master-section");

                    // append new items
                    // $(response).appendTo( $(section).children('.ut-options-outer-panel-group-append') );

                    $.each( $(response), function( index, element ) {

                        if( !document.getElementById( $(element).attr("id") ) ) {

                            $(element).appendTo( $(section).children('.ut-options-outer-panel-group-append') );

                        }

                    });

                    //add class to menu in order to avoid double loading
                    $this.parent().addClass("ut-sub-panel-loaded");

                    // remove placeholder
                    $('#' + $this.parent().data("master-section") + '_placeholder' ).removeClass('ut-show').addClass('ut-hide');

                    // show current tab
                    $("#section_" + $this.data("section") ).removeClass('ut-hide').addClass('ut-show');

                    // set min height for editor
                    $('.ut-ace-css-editor').css('min-height',400);

                    // init options
                    OT_UI.init();

                    $('#' + $this.parent().data("master-section") + '_loader' ).fadeOut( 400, function(){

                        /* store ID for later use */
                        store_loaded_sub_panels( $this.parent().data("panel-id") );

                        /* remove flag */
                        sub_panel_is_loading = false;

                    });

                }

            });

        }

        $(document).on('click', '#ut-admin-outer-nav li:not(".ut-admin-branding") a', function( event ) {

            if( panel_is_loading ) {
                return false;
            }

            var $this = $(this);


            // remove all other active states
            $this.parent().siblings().removeClass('ut-ui-state-active');
            $this.parent().siblings().find('.ut-ui-state-active').removeClass('ut-ui-state-active');

            // active state for current menu item
            $this.parent().addClass('ut-ui-state-active');

            /* hide all tabs first */
            $('.ut-options-outer-panel-group').removeClass('ut-show').addClass('ut-hide');

            /* show current tab */
            $("#section_" + $this.data("section") ).removeClass('ut-hide').addClass('ut-show');

            /* show sub tab */
            $("[data-section='" + $this.data("subsection") +"']").trigger("click");

            /* set cookies */
            Cookies.set( 'ut_open_panel_section', $this.data("section") );
            Cookies.set( 'ut_open_panel_subsection', $this.data("subsection") );

            /* try to load panel */
            load_panel_section( $this );

            event.preventDefault();

        });

        $(document).on('click', '.ut-admin-inner-nav li a', function( event ) {

            if( sub_panel_is_loading ) {
                return false;
            }

            var $this = $(this);

            // check sub menu states
            if( !$this.closest("ul").parent().hasClass("slicknav_parent") && !$this.hasClass('slicknav_item') ) {


                $this.closest("ul").find(".slicknav_parent.slicknav_open > a").trigger("click");
                // $this.closest("ul").find(".slicknav_parent > ul").addClass("slicknav_hidden").hide();

            }

            // clear all active states
            $this.parent().parent().find('.ut-ui-state-active').removeClass('ut-ui-state-active');

            // show current tab
            $this.parent().addClass('ut-ui-state-active');

            $('.ut-options-inner-panel-group').removeClass('ut-show').addClass('ut-hide');

            $("#section_" + $this.data("section") ).removeClass('ut-hide').addClass('ut-show');

            // check if this element has children and update global section cookie
            if( $this.parent().hasClass("ut-has-sub-panel") && $this.parent().data("master-section") ) {
                Cookies.set( 'ut_load_sub_panel', $this.parent().data("panel-id") );
            }

            // set cookies
            Cookies.set( 'ut_open_panel_subsection', $this.data("section") );

            if( typeof $this.data("default-section") !== 'undefined' ) {

                $("[data-section='" +  $this.data("default-section") +"']").parent().addClass('ut-ui-state-active');

            }

            // try to load sub panel
            load_subpanel_section( $this );

            $.force_appear();

            event.preventDefault();

        });

        /* option tree edit */
        $(document).on('click', '.option-tree-setting-edit', function(event) {

            event.preventDefault();

            var $this = $(this);

            if ( $this.parents().hasClass('option-tree-setting-body') ) {

                OT_UI.init_remove_active($this,'child');
                OT_UI.init_hide_body($this,'child');

            } else {

                OT_UI.init_remove_active($this,'parent');
                OT_UI.init_hide_body($this, 'parent');

            }

            $this.toggleClass('active');
            OT_UI.init_hide_body($this, 'toggle');

        });


        /* option tree compact edit */
        $(document).on('click', '.option-tree-compact-setting-edit', function(event) {

            event.preventDefault();

            var $this = $(this);

            // store current values
            window.ut_current_compact_list = $('#' + $this.data("for") + ' :input' ).serialize();
            window.ut_current_compact_list_preview = $this.siblings('.compact-list-item-preview-image-container');

            $('#' + $this.data("for") ).fadeToggle();
            $('#ut-list-manager-modal-lightbox').addClass('show ut-modal-loaded');

        });


        /* option tree compact edit close ( done button ) */
        $(document).on('click', '.option-tree-compact-setting-close', function(event) {

            event.preventDefault();

            var $this = $(this);

            $('#' + $this.data("for") ).fadeToggle();
            $('#ut-list-manager-modal-lightbox').removeClass('show ut-modal-loaded');

            window.ut_current_compact_list_preview = '';

        });

        function ut_unserialize_form_data(data) {

            var objs = {}, temp;
            var temps = data.split('&');

            for( var i = 0; i < temps.length; i++ ){

                temp = temps[i].split('=');
                objs[unescape(temp[0])] = unescape(temp[1]).replace('+', ' ');

            }

            return objs;

        }

        /* option tree compact edit close ( close button ) */
        $(document).on('click', '.ut-close-gallery-manager-modal', function (e) {

            var $this = $(this),
                $current_modal = $('#' + $this.data("for") );

            $current_modal.fadeToggle();
            $('#ut-list-manager-modal-lightbox').removeClass('show ut-modal-loaded');

            e.stopImmediatePropagation();
            e.preventDefault();

            var form_values =  ut_unserialize_form_data( window.ut_current_compact_list );

            // restore old settings
            $.each( form_values, function( index, value ) {

                $('[name="' + index + '"]', $current_modal ).val( value.replaceAll('+', " ") ).trigger('keyup').trigger('blur');

            });

            window.ut_current_compact_list = '';
            window.ut_current_compact_list_preview = '';

        });

        /* option tree add list item */
        $(document).on('click', '.ut-list-item-add', function( event ) {

            event.preventDefault();
            OT_UI.add(this,'list_item');

        });

        /* option tree add list item */
        $(document).on('click', '.ut-compact-list-item-add', function( event ) {

            event.preventDefault();
            OT_UI.add(this,'list_compact_item');

        });

        /* option tree add choice */
        $(document).on('click', '.option-tree-choice-add', function( event ) {

            event.preventDefault();
            OT_UI.add(this,'choice');

        });

        /* option tree remove setting */
        $(document).on('click', '.option-tree-setting-remove', function( event ) {

            event.preventDefault();

            if ( $(this).parents('li').hasClass('ui-state-disabled') ) {
                alert(unite_js_translation.remove_no);
                return false;
            }

            var _this = this,
                $this = $(_this),
                list  = $this.parents('ul');

            modal({
                type: 'confirm',
                title: 'Confirm',
                text: unite_js_translation.remove_agree,
                buttons: [
                    {
                        addClass: 'ut-ui-button-health'
                    },
                    {
                        addClass: 'ut-ui-button-blue'
                    }
                ],
                callback: function(result) {

                    if( result === true ) {

                        OT_UI.remove(_this);

                        setTimeout( function() {
                            OT_UI.update_ids(list);
                        }, 200 );

                    }

                }

            });

            return false;

        });

        /* option tree remove setting */
        $(document).on('click', '.option-tree-compact-setting-remove', function( event ) {

            event.preventDefault();

            if ( $(this).parents('li').hasClass('ui-state-disabled') ) {
                alert(unite_js_translation.remove_no);
                return false;
            }

            var _this = this,
                $this = $(_this),
                list  = $this.parents('ul');

            modal({
                type: 'confirm',
                title: 'Confirm',
                text: unite_js_translation.remove_agree,
                buttons: [
                    {
                        addClass: 'ut-ui-button-health'
                    },
                    {
                        addClass: 'ut-ui-button-blue'
                    }
                ],
                callback: function(result) {

                    if( result === true ) {

                        OT_UI.compact_remove(_this);

                        setTimeout( function() {
                            OT_UI.update_ids(list);
                        }, 200 );

                    }

                }

            });

            return false;

        });

        /* change titlte on key */
        $(document).on('keyup', '.option-tree-setting-title', function() {
            OT_UI.edit_title(this);
        });

        $(document).on('keyup', '.option-tree-compact-setting-title', function() {
            OT_UI.edit_title_compact(this);
        });

        $(document).on('keyup', '.option-tree-compact-setting-desc', function() {
            OT_UI.edit_desc_compact(this);
        });

        $(document).on('change', '.ut-select-setting-title', function() {
            OT_UI.edit_title_select(this);
        });

        $(document).on('keyup', '.section-id', function() {
            OT_UI.update_id(this);
        });

        /* image select */
        $(document).on('click', '.option-tree-ui-radio-image', function( event ) {

            var $this = $(this);

            $this.closest('.type-radio-image').find('.option-tree-ui-radio-image').removeClass('option-tree-ui-radio-image-selected');
            $this.toggleClass('option-tree-ui-radio-image-selected');
            $this.parent().find('.option-tree-ui-radio').attr('checked', true);

        });

        $(document).on('focus blur change', '.ut-ui-upload-input', function() {

            $(this).parent('.ut-ui-upload-parent').toggleClass('focus');
            OT_UI.init_upload_fix(this);

        });

        /* media uploader */
        $(document).on('click', '.ut-media-upload:not(.ut-media-upload-id)', function( event ) {

            event.preventDefault();

            var field_id   		= $(this).parent('.ut-ui-upload-parent').find('input').attr('id'),
                post_id    		= $(this).attr('rel'),
                single_upload	= $(this).hasClass('ut-single-media-upload'),
                btnContent 		= '';

            window.ot_media_frame = window.ot_media_frame || new wp.media.view.MediaFrame.Select({
                title: $(this).attr('title'),
                button: {
                    text: unite_js_translation.upload_text
                },
                multiple: false
            });

            window.ot_media_frame.on('select', function() {

                var attachment = window.ot_media_frame.state().get('selection').first(),
                    href       = attachment.attributes.url,
                    mime       = attachment.attributes.mime,
                    //regex      = /^image\/(?:jpe?g|png|svg|gif|x-icon)$/i,
                    regex      = /\.(?:jpe?g|png|svg|gif|ico)$/i;

                if ( href.match( regex ) ) {

                    $('#'+field_id+'_media').find("img").attr("src", href );

                    if( ut_current_compact_list_preview.length ) {

                        ut_current_compact_list_preview.find('.compact-list-item-preview-image').css('background-image', 'url(' + href + ')');

                    }

                }

                btnContent += '<button class="ut-ui-remove-media ut-ui-button red" title="'+unite_js_translation.remove_media_text+'">'+unite_js_translation.remove_media_text+'</button>';

                $('#'+field_id).val(href).trigger('change');
                $('#'+field_id+'_media').append(btnContent).slideDown();

                OT_UI.init_upload_fix( $('#'+field_id), single_upload );
                window.ot_media_frame.off('select');

            }).open();

        });

        $(document).on('click', '.ut-media-upload-id', function( event ) {

            event.preventDefault();

            var field_id   		= $(this).parent('.ut-ui-upload-parent').find('input').attr('id'),
                post_id    		= $(this).attr('rel'),
                single_upload	= $(this).hasClass('ut-single-media-upload'),
                btnContent 		= '';

            window.ot_media_frame = window.ot_media_frame || new wp.media.view.MediaFrame.Select({
                title: $(this).attr('title'),
                button: {
                    text: unite_js_translation.upload_text
                },
                multiple: false
            });

            window.ot_media_frame.on('select', function() {

                var attachment = window.ot_media_frame.state().get('selection').first();

                if( attachment.attributes.mime === 'image/svg+xml' ) {

                    var href       = attachment.attributes.url,
                        regex      = /\.(?:jpe?g|png|svg|gif|ico|webp)$/i;


                } else {

                    var href       = attachment.attributes.url,
                        regex      = /\.(?:jpe?g|png|svg|gif|ico|webp)$/i;

                    if( typeof attachment.attributes.sizes !== "undefined" && typeof attachment.attributes.sizes.large !== "undefined" ) {

                        href = attachment.attributes.sizes.large.url;

                    }

                }

                if ( $('#'+field_id+'_media').find("img").length &&  href.match( regex ) ) {

                    $('#'+field_id+'_media').find("img").attr("src", href );

                } else {

                    btnContent += '<div class="ut-ui-image-wrap"><img src="'+href+'" alt="" /></div>';
                    btnContent += '<button class="ut-ui-remove-media ut-ui-remove-media-id ut-ui-button red" title="'+unite_js_translation.remove_media_text+'">'+unite_js_translation.remove_media_text+'</button>';

                }

                $('#'+field_id).val(attachment.id).trigger('change');
                $('#'+field_id+'_media').append(btnContent).slideDown();


                if( $('#'+field_id).attr('name').indexOf('desktop') !== -1 && $('#'+field_id).closest('li').hasClass('compact-list-item') ) {
                    $('#'+field_id).closest('li').find('.compact-list-item-preview img').attr("src", href);
                }

                window.ot_media_frame.off('select');

            }).open();

        });

        // Initialize Options for Media Edit
        $(document).on('mouseenter', '.compat-field-ut-morph-caption-color, .compat-field-ut-morph-caption-background', function () {

            OT_UI.init_color_picker();

        });

        wp.media.view.AttachmentCompat.prototype.save = function( event ) {

            var data = {};

            if ( event ) {
                event.preventDefault();
            }

            if( $(document).data('minicolors-target') || $(document).data('colorpicker-in-use') ) {
                return;
            }

            _.each( this.$el.serializeArray(), function( pair ) {

                if ( /\[\]$/.test( pair.name ) ) {

                    if ( undefined === data[ pair.name ] ) {
                        data[ pair.name ] = [];
                    }

                    data[ pair.name ].push( pair.value );

                } else {

                    data[ pair.name ] = pair.value;

                }

            });

            this.controller.trigger( 'attachment:compat:waiting', ['waiting'] );
            this.model.saveCompat( data ).always( _.bind( this.postSave, this ) );

        };

        wp.media.view.AttachmentCompat.prototype.render = function() {

            var compat = this.model.get('compat');

            if ( ! compat || ! compat.item ) {
                return;
            }

            this.views.detach();
            this.$el.html( compat.item );
            this.views.render();

            OT_UI.init_color_picker();

            return this;

        };

        /* remove media */
        $(document).on('click', '.ut-ui-remove-media:not(.ut-ui-remove-media-id)', function( event ) {

            var $this = $(this);

            modal({
                type: 'confirm',
                title: 'Confirm',
                text: unite_js_translation.remove_agree,
                buttons: [
                    {
                        addClass: 'ut-ui-button-health'
                    },
                    {
                        addClass: 'ut-ui-button-blue'
                    }
                ],
                callback: function(result) {

                    if( result === true ) {
                        OT_UI.remove_image($this);
                    }

                }

            });

            event.preventDefault();

        });

        /* remove media id */
        $(document).on('click', '.ut-ui-remove-media-id', function( event ) {

            var $this = $(this);

            modal({
                type: 'confirm',
                title: 'Confirm',
                text: unite_js_translation.remove_agree,
                buttons: [
                    {
                        addClass: 'ut-ui-button-health'
                    },
                    {
                        addClass: 'ut-ui-button-blue'
                    }
                ],
                callback: function(result) {

                    if( result === true ) {
                        OT_UI.remove_image_id($this);
                    }

                }

            });

            event.preventDefault();

        });

        /* numeric slider helper input */
        $(document).on('input propertychange', '.ut-numeric-slider-helper-input', function() {

            var $this = $(this);

            if( $this.val() === 'inherit' || $this.val() === 'default' ) {

                $this.siblings('.ut-numeric-slider').slider("value", $this.siblings('.ut-numeric-slider-hidden-input').data('inherit') );

            } else {

                $this.siblings('.ut-numeric-slider').slider("value", $this.val());
                $this.siblings('.ut-numeric-slider-hidden-input').val($this.val());

            }

        });

        $(document).on('change', '.ut-ui-select-dynamic', function( event ) {

            event.stopImmediatePropagation();

            let $this = $(this);

            if( $this.data('relation-field') ) {

                let $relation_field = $('#' + $this.data('relation-field') ),
                    min_max_step    = $this.find(':selected').data('relation-value');

                if( min_max_step ) {

                    min_max_step = min_max_step.split(",");

                    $('.ut-numeric-slider', $relation_field ).each(function (index, element ){

                        let $that = $(element);

                        // update slider values
                        let min = parseInt( min_max_step[0] ) - parseFloat( min_max_step[2] );
                        $that.siblings('.ut-numeric-slider-hidden-input').attr('data-inherit', min).data('inherit', min );

                        $that.slider('option', 'min',min );
                        $that.slider('option', 'max', parseInt( min_max_step[1] ) );
                        $that.slider('option', 'step', parseFloat( min_max_step[2] ) );

                        if( $that.siblings('.ut-numeric-slider-helper-input').val() >= parseInt( min_max_step[1] )  ) {

                            // update interface
                            $that.slider("value", min_max_step[1]);
                            $that.siblings('.ut-numeric-slider-hidden-input').val(min_max_step[1]);
                            $that.siblings('.ut-numeric-slider-helper-input').val(min_max_step[1]);

                        }

                    });

                }

            }

        });

        $('.ut-ui-select-dynamic').each(function () {

            $(this).trigger('change');

        });

        /*
         * Header Styles Preview Boxes
         */
        var tb_position = function() {
            var tbWindow = $('#TB_window');
            var width = 840;
            var H = 600;
            var W = width;

            if ( tbWindow.size() ) {
                tbWindow.width( W - 50 ).height( H - 45 );
                $('#TB_iframeContent').width( W - 50 ).height( H - 75 );
                tbWindow.css({'margin-left': '-' + parseInt((( W - 50 ) / 2),10) + 'px'});
                if ( typeof document.body.style.maxWidth != 'undefined' )
                    tbWindow.css({'top':'40px','margin-top':'0'});
            };

            return $('a.thickbox').each( function() {
                var href = $(this).attr('href');
                if ( ! href ) return;
                href = href.replace(/&width=[0-9]+/g, '');
                href = href.replace(/&height=[0-9]+/g, '');
                $(this).attr( 'href', href + '&width=' + ( W - 80 ) + '&height=' + ( H - 85 ) );
            });
        };

        $('a.thickbox').click(function(){
            if ( typeof tinyMCE != 'undefined' &&  tinyMCE.activeEditor ) {
                tinyMCE.get('content').focus();
                tinyMCE.activeEditor.windowManager.bookmark = tinyMCE.activeEditor.selection.getBookmark('simple');
            }
        });

        /* show font style */
        $(document).on('click', '.ut-font-preview', function() {

            tb_show('', unite.pop_url + 'fontpreview.html?TB_iframe=true');
            return false;

        });

        /* show header style */
        $(document).on('click', '.ut-header-preview', function() {

            tb_show('', unite.pop_url + 'headerpreview.html?TB_iframe=true');
            return false;

        });

        /* show header style */
        $(document).on('click', '.ut-hero-preview', function() {

            tb_show('', unite.pop_url + 'heropreview.html?TB_iframe=true');
            return false;

        });

        /* ace editor */
        $('.ut-ace-css-editor').css('min-height',500).appear();
        var load_css_editor = '';

        var ut_ace_editor = function() {

            var $this = $('.ut-ace-css-editor');

            if( !$this.length ) {
                return;
            }

            if( $this.hasClass('ut-ace-editor-ready') ) {
                clearInterval(load_css_editor);
                return;
            }

            var id          = $this.attr('id'),
                area        = $this.data('id'),
                aceeditor   = ace.edit(id),
                mode        = $this.data('mode');

            /* set theme  */
            aceeditor.setTheme("ace/theme/tomorrow");

            /* set editor mode */
            aceeditor.getSession().setMode("ace/mode/"+mode);
            aceeditor.setShowPrintMargin(false);

            /* update textarea for theme options */
            aceeditor.on('change', function() {
                $( '#' + area ).val( aceeditor.getSession().getValue() );
                aceeditor.resize();
            });

            $this.addClass('ut-ace-editor-ready');

        }

        ut_ace_editor();

        /* make colorpicker and all other appear elements on current page visible */
        load_css_editor = setInterval(function () {

            ut_ace_editor();

        }, 2000 );

        /* make colorpicker and all other appear elements on current page visible */
        $(window).on("load", function () {
            $.force_appear();
        });

        /*
         * Live functions for Google font preview
         */

        $(document).on("click", ".ut-clear-select-js-data-ajax", function(event){

            $(this).siblings(".ut-select-js-data-ajax").prop('selectedIndex', 0).trigger("change");
            event.preventDefault();

        });

        $(document).on("select2:select", ".ut-select-js-data-ajax", function(){

            var group = $(this).data("group");

            /* update fields */
            OT_UI.update_google_font_fields( group );

        });

        /*$('.ut-select-js-data-ajax').on('select2:select', function() {

            var group = $(this).data("group");

			OT_UI.update_google_font_fields( group );

        });*/


        $(document).on("change", ".ut-google-font-select", function(){

            var group = $(this).data("group");

            /* update fields */
            OT_UI.update_google_font_fields( group );

        });

        $(document).on("change", ".ut-google-font-size", function(){

            var group = $(this).data("group");

            /* update fields */
            OT_UI.update_google_font_fields( group );

        });

        $(document).on("change", ".ut-google-font-weight", function(){

            var group = $(this).data("group");

            /* update fields */
            OT_UI.update_google_font_fields( group );

        });

        $(document).on("change", ".ut-google-text-transform", function(){

            var group = $(this).data("group");

            /* update fields */
            OT_UI.update_google_font_fields( group );

        });

        $(document).on("change", ".ut-google-font-style", function(){

            var group = $(this).data("group");

            /* update fields */
            OT_UI.update_google_font_fields( group );

        });

        // select custom link options
        var _link_sideload = false;

        $('body').on('click', '.ut-link-button', function (event) {

            event.preventDefault();

            _addLinkListeners($(this));
            _link_sideload = false;

            var $link_val_container = $(this).siblings('input');

            if (typeof wpActiveEditor !== 'undefined') {

                window.wpActiveEditor = $(this).data("id");
                wpLink.open();
                wpLink.textarea = $link_val_container;

            } else {

                _link_sideload = true;

                window.wpActiveEditor = $(this).data("id");
                wpLink.open();
                wpLink.textarea = $link_val_container;

            }

            var value_object = $link_val_container.data("json");

            if ($.type(value_object.url) !== "undefined") {

                $("#wp-link-url").val(value_object.url);

            }

            if ($.type(value_object.title) !== "undefined") {

                $("#wp-link-text").val(value_object.title);

            }

            $("#wp-link-target").prop("checked", ($.type(value_object.target) === "string" && value_object.target !== ''));

            return false;

        });


        function _addLinkListeners($context) {

            $('body').on('click', '#wp-link-submit', function (event) {

                event.preventDefault();

                var options = {};

                options.url = $("#wp-link-url").val();
                options.title = $("#wp-link-text").val();
                options.target = $("#wp-link-target").is(":checked") ? "_blank" : "";

                var link = $.map(options, function (value, key) {
                    if ($.type(value) === "string" && 0 < value.length) {
                        return key + ":" + encodeURIComponent(value);
                    }
                }).join("|");

                // assign values
                $context.siblings('input').val(link);
                $context.siblings('input').data("json", options);

                if ($.type(options.url) !== "undefined") {
                    $context.parent('.ut-link').find('.ut-link-label-url').text(options.url);
                }

                if ($.type(options.title) !== "undefined") {
                    $context.parent('.ut-link').find('.ut-link-label-title').text(options.title);
                }

                if ($.type(options.target) !== "undefined") {
                    $context.parent('.ut-link').find('.ut-link-label-target').text(options.target);
                }

                _removeLinkListeners($context);

                event.preventDefault();
                return false;

            });

            $('body').on('click', '#wp-link-cancel .button', function (event) {

                _removeLinkListeners();

                event.preventDefault();
                return false;

            });



        }

        function _removeLinkListeners( $context ) {

            if (_link_sideload) {

                if (typeof wpActiveEditor !== 'undefined') {

                    wpActiveEditor = undefined;

                }

            }

            wpLink.textarea = $context; //focus on document
            wpLink.close();

            $('body').off('click', '#wp-link-submit');
            $('body').off('click', '#wp-link-cancel .button');

        }

        /*
        |--------------------------------------------------------------------------
        | Parallax
        |--------------------------------------------------------------------------
        */

        /* disable background settings of parallax is active // front page */
        var parallax_status = $("#ut_front_header_parallax").val();

        if( parallax_status === 'on' ) {

            $("#ut_front_header_image-attachment").prop('selectedIndex', 0);
            $("#ut_front_header_image-attachment").attr("disabled", true ).parent().wrap('<div class="disabled" />');

            $("#ut_front_header_image-position").prop('selectedIndex', 0);
            $("#ut_front_header_image-position").attr("disabled", true ).parent().wrap('<div class="disabled" />');

        }

        $(document).on("change", "#ut_front_header_parallax", function(){

            parallax_status = $(this).val();

            if( parallax_status === 'on' ) {

                $("#ut_front_header_image-attachment").prop('selectedIndex', 0).trigger("change");
                $("#ut_front_header_image-attachment").attr("disabled", true ).parent().wrap('<div class="disabled" />');

                $("#ut_front_header_image-position").prop('selectedIndex', 0).trigger("change");
                $("#ut_front_header_image-position").attr("disabled", true ).parent().wrap('<div class="disabled" />');

            } else {

                $("#ut_front_header_image-attachment").attr("disabled", false ).parent().unwrap();
                $("#ut_front_header_image-position").attr("disabled", false ).parent().unwrap();

            }

        });

        /* disable background settings of parallax is active // blog */
        parallax_status = $("#ut_blog_header_parallax").val();

        if( parallax_status === 'on' ) {

            $("#ut_blog_header_image-attachment").prop('selectedIndex', 0);
            $("#ut_blog_header_image-attachment").attr("disabled", true ).parent().wrap('<div class="disabled" />');

            $("#ut_blog_header_image-position").prop('selectedIndex', 0);
            $("#ut_blog_header_image-position").attr("disabled", true ).parent().wrap('<div class="disabled" />');

        }

        $(document).on("change", "#ut_front_header_parallax", function(){

            parallax_status = $(this).val();

            if( parallax_status === 'on' ) {

                $("#ut_blog_header_image-attachment").prop('selectedIndex', 0).trigger("change");
                $("#ut_blog_header_image-attachment").attr("disabled", true ).parent().wrap('<div class="disabled" />');

                $("#ut_blog_header_image-position").prop('selectedIndex', 0).trigger("change");
                $("#ut_blog_header_image-position").attr("disabled", true ).parent().wrap('<div class="disabled" />');

            } else {

                $("#ut_blog_header_image-attachment").attr("disabled", false ).parent().unwrap();
                $("#ut_blog_header_image-position").attr("disabled", false ).parent().unwrap();

            }

        });


        /* disable background settings of parallax is active // contact section */
        parallax_status = $("#ut_csection_parallax").val();

        if( parallax_status === 'on' ) {

            $("#ut_csection_background_image-attachment").prop('selectedIndex', 0);
            $("#ut_csection_background_image-attachment").attr("disabled", true ).parent().wrap('<div class="disabled" />');

            $("#ut_csection_background_image-position").prop('selectedIndex', 0);
            $("#ut_csection_background_image-position").attr("disabled", true ).parent().wrap('<div class="disabled" />');

        }

        $(document).on("change", "#ut_csection_parallax", function(){

            parallax_status = $(this).val();

            if( parallax_status === 'on' ) {

                $("#ut_csection_background_image-attachment").prop('selectedIndex', 0).trigger("change");
                $("#ut_csection_background_image-attachment").attr("disabled", true ).parent().wrap('<div class="disabled" />');

                $("#ut_csection_background_image-position").prop('selectedIndex', 0).trigger("change");
                $("#ut_csection_background_image-position").attr("disabled", true ).parent().wrap('<div class="disabled" />');

            } else {

                $("#ut_csection_background_image-attachment").attr("disabled", false ).parent().unwrap();
                $("#ut_csection_background_image-position").attr("disabled", false ).parent().unwrap();

            }

        });

        /* admin notice dismiss
		================================================== */
        $(document).on('click', '.unite-health-status .notice-dismiss', function( event ) {

            $.ajax({
                url: ajaxurl,
                data: {
                    action: 'hide_health_notification'
                }
            });

            event.preventDefault();

        });

        $( document ).on( 'widget-added widget-updated', function( event, widget ){

            widget.find('.ut-option-initialized').removeClass('ut-option-initialized');

            OT_UI.init_numeric_slider();

        });





        /* United Video Player
		================================================== */
        function create_id() {
            return '-' + Math.random().toString(36).substr(2, 9);
        }

        function ut_load_video_player(url, uniqueID, $parent, callback){

            if( !url ) {
                return;
            }

            var $video = $('<div id="ut-video'+uniqueID+'"></div>'),
                $caption = $parent.find('.ut-video-caption-text');

            $.ajax({

                type: 'POST',
                url: ajaxurl ,
                data: {"action": "ut_get_video_player", "video" : url },
                success: function(response) {

                    $video.html(response).fitVids();
                    $parent.html( $video.append($caption) );

                    return false;

                },
                complete : function() {

                    if (callback && typeof(callback) === "function") {
                        callback();
                    }

                }

            });

        }

        $(document).on('click', '.ut-load-video', function(event) {

            var url = $(this).data('video'),
                uniqueID = create_id(),
                $parent = $(this).parent('.ut-video-caption'),
                $loader = $parent.next('.ut-video-loading');

            $loader.fadeIn();

            ut_load_video_player(url, uniqueID, $parent, function() {
                $loader.fadeOut();
            });

            event.preventDefault();
        });

        $(document).on('click', '#option-tree-settings-api-submit', function() {

            $('#option-tree-settings-api').submit();

        });

        /* Gallery
        ================================================== */
        var ut_gallery = {

            frame: function (elm) {

                var selection = this.select(elm);

                this._frame = wp.media({
                    id: 'ut-gallery-frame',
                    frame: 'post',
                    state: 'gallery-edit',
                    title: wp.media.view.l10n.editGalleryTitle,
                    editing: true,
                    multiple: true,
                    selection: selection
                });

                this._frame.on('update', function () {

                    var controller = ut_gallery._frame.states.get('gallery-edit'),
                        library = controller.get('library'),
                        ids = library.pluck('id'),
                        parent = $(elm).parents('.format-setting-inner'),
                        input = parent.children('.ut-gallery-value'),
                        shortcode = wp.media.gallery.shortcode(selection).string().replace(/\"/g, "'");

                    if (ids.length > input.data("max-images") ) {

                        modal({
                            type: 'warning',
                            title: 'Info',
                            text: unite_js_translation.gallery_limit,
                            buttons: [{
                                text: 'OK',
                                val: 'ok',
                                eKey: true,
                                addClass: 'ut-ui-button-yellow',
                                onClick: function (dialog) {
                                    return true;
                                }
                            }],
                            callback: function (result) {



                            }

                        });

                        // not more than 3 images available
                        ids = ids.slice(0, 3);

                    }

                    input.attr('value', ids);

                    if (parent.children('.ut-gallery-list').length <= 0) {
                        input.after('<ul class="ut-gallery-list" />');
                    }

                    $.ajax({
                        type: 'POST',
                        url: ajaxurl,
                        dataType: 'html',
                        data: {
                            action: 'gallery_update',
                            ids: ids
                        },
                        success: function (res) {

                            parent.children('.ut-gallery-list').html(res);

                            if (input.hasClass('ut-gallery-shortcode')) {
                                input.val(shortcode);
                            }

                            if ($(elm).parent().children('.ut-gallery-delete').length <= 0) {
                                $(elm).parent().append('<a href="#" class="ut-gallery-delete ut-ui-button ut-ui-button-health">' + unite_js_translation.delete_images + '</a>');
                            }

                            $(elm).text(unite_js_translation.edit_images);

                        }
                    });

                });

                return this._frame;

            },

            select: function (elm) {

                var input = $(elm).parents('.format-setting-inner').children('.ut-gallery-value'),
                    ids = input.attr('value'),
                    _shortcode = input.hasClass('ut-gallery-shortcode') ? ids : '[gallery ids=' + ids + ']',
                    shortcode = wp.shortcode.next('gallery', (ids ? _shortcode : wp.media.view.settings.ut_gallery.shortcode)),
                    defaultPostId = wp.media.gallery.defaults.id,
                    attachments,
                    selection;

                // Bail if we didn't match the shortcode or all of the content.
                if (!shortcode) {
                    return;
                }

                // Ignore the rest of the match object.
                shortcode = shortcode.shortcode;

                if (_.isUndefined(shortcode.get('id')) && !_.isUndefined(defaultPostId)) {
                    shortcode.set('id', defaultPostId);
                }

                if (_.isUndefined(shortcode.get('ids')) && !input.hasClass('ut-gallery-shortcode') && ids) {
                    shortcode.set('ids', ids);
                }

                if (_.isUndefined(shortcode.get('ids'))) {
                    shortcode.set('ids', '0');
                }

                attachments = wp.media.gallery.attachments(shortcode);

                selection = new wp.media.model.Selection(attachments.models, {
                    props: attachments.props.toJSON(),
                    multiple: true
                });

                selection.gallery = attachments.gallery;

                // Fetch the query's attachments, and then break ties from the query to allow for sorting.
                selection.more().done(function () {
                    selection.props.set({
                        query: false
                    });
                    selection.unmirror();
                    selection.props.unset('orderby');
                });

                return selection;
            },

            open: function (elm) {

                ut_gallery.frame(elm).open();

            },

            remove: function (elm) {

                modal({
                    type: 'confirm',
                    title: 'Confirm',
                    text: unite_js_translation.remove_agree,
                    buttons: [{
                        addClass: 'ut-ui-button-health'
                    }, {
                        addClass: 'ut-ui-button-blue'
                    }],
                    callback: function (result) {

                        if (result === true) {

                            $(elm).parents('.format-setting-inner').children('.ut-gallery-value').attr('value', '');
                            $(elm).parents('.format-setting-inner').children('.ut-gallery-list').remove();
                            $(elm).next('.ut-gallery-edit').text(unite_js_translation.edit_images);
                            $(elm).remove();

                        }

                    }

                });

            }

        };

        $(document).on('click', '.ut-gallery-delete', function (e) {

            e.preventDefault();
            ut_gallery.remove($(this));

        });

        $(document).on('click', '.ut-gallery-edit', function (e) {

            e.preventDefault();
            ut_gallery.open($(this));

        });

        $(document).on('click', '.ut-gallery-manager-modal-tabs a', function (e) {

            var $this    = $(this),
                tabgroup = '#' + $this.parents('.ut-gallery-manager-modal-tabs').data('tabgroup'),
                others   = $this.closest('li').siblings().children('a'),
                target   = $this.attr('href');

            others.removeClass('active');
            $this.addClass('active');

            $(tabgroup).children('div').hide();
            $(target).show();

            e.preventDefault();

        });

        $(".ut-gallery-manager-modal").draggable({
            handle: ".ut-modal-header"
        });

        /* United Help LightGallery
       ================================================== */
        if ( $().lightGallery ) {

            $('#ut-dashboard-content').lightGallery({
                selector: '.ut-help-lightbox',
                subHtmlSelectorRelative: true,
                thumbnail:false,
                hash: false
            });

            $(document).on('mouseenter', '.vc_description:not("lightbox-ready")', function( event ) {

                event.preventDefault();

                $(this).lightGallery({
                    selector: '.ut-option-help-lightbox',
                    subHtmlSelectorRelative: true,
                    thumbnail:false,
                    hash: false
                });

                $(this).addClass('lightbox-ready');

            });

        }


        if ( $().hideseek ) {

            $('#search-topics').hideseek({
                highlight: true,
                nodata: 'No results found'
            });

        }

        // restore theme defaults
        function ut_restore_theme_defaults( $this ) {

            $.ajax({

                type: 'POST',
                url: ajaxurl,
                data: {
                    "action" : "restore_theme_options",
                    "nonce"  : $this.data("nonce"),
                },
                success: function() {

                    location.reload();
                    return false;

                }

            });

        }

        $(document).on('click', '#option-tree-settings-api-restore', function (event) {

            event.preventDefault();

            modal({
                type: 'confirm',
                title: 'Confirm',
                text: unite_js_translation.reset_agree,
                buttons: [{
                    addClass: 'ut-ui-button-health'
                }, {
                    addClass: 'ut-ui-button-blue'
                }],
                callback: function (result) {

                    if ( result === true ) {

                        ut_restore_theme_defaults( $(this) );

                    }

                }

            });

            return false;

        });

        $(document).on('click', '.ut-button-builder-tabs a', function (e) {

            e.preventDefault();

            var $this    = $(this),
                tabgroup = '#'+$this.parents('.ut-button-builder-tabs').data('tabgroup'),
                others   = $this.closest('li').siblings().children('a'),
                target   = $this.attr('href');

            others.removeClass('active');
            $this.addClass('active');
            $(tabgroup).children('div').hide();
            $(target).show();

        });

        $(document).on( 'click', '.ut-responsive-settings-tabs:not(.ut-responsive-settings-tabs-global) a', function (e) {

            e.preventDefault();

            var $this           = $(this),
                $option_group   = $this.closest('.ut-ui-select-group'),
                tabgroup        = '#'+$this.parents('.ut-responsive-settings-tabs').data('tabgroup'),
                others          = $this.closest('li').siblings().children('a'),
                target          = $this.attr('href');

            others.removeClass('active');
            $this.addClass('active');
            $(tabgroup).children('div').hide();
            $(target).show();

        });

        $(document).on( 'click', '.ut-responsive-settings-tabs-global a', function (e) {

            e.preventDefault();

            var $this           = $(this),
                breakpoint      = $this.data('responsive-tab' ),
                others          = $this.closest('li').siblings().children('a'),
                $context        = $this.closest( $('.ut-section-headline, .ut-panel-headline') ).next('.ut-panel-list'),
                other_options   = $('li:not(.ut-visible-for-breakpoints)', $context);

            let $responsive_settings = $('[data-responsive-tab="' + breakpoint + '"]', $context ).not('.ut-global-breakpoint');

            $responsive_settings.trigger('click');

            if( breakpoint !== 'desktop_large' ) {

                $responsive_settings.closest('.ut-ui-responsive-settings-group').siblings('.ut-ui-responsive-settings-group').addClass('ut-ui-breakpoint-active');
                $responsive_settings.closest('.ut-ui-responsive-settings-group').siblings().not('.ut-ui-responsive-settings-group').hide();

                // hide other options ut-ui-hide-when-breakpoint
                other_options.hide();

                $('.ut-google-font-preview', $context ).hide();

            } else {

                $responsive_settings.closest('.ut-ui-responsive-settings-group').siblings('.ut-ui-responsive-settings-group').removeClass('ut-ui-breakpoint-active');
                $responsive_settings.closest('.ut-ui-responsive-settings-group').siblings().not('.ut-ui-responsive-settings-group').show();

                // show other options ut-ui-hide-when-breakpoint
                other_options.show();

                $('.ut-google-font-preview', $context ).show();
            }

            others.removeClass('active');
            $this.addClass('active');


            // activate same breakpoint on other settings of this group
            // $('[data-responsive-tab="' + $this.data('responsive-tab') + '"]:not(.active)', $option_group ).trigger('click');

        });

        $(document).on( 'mouseleave', '.ut-responsive-settings-tabs', function (e) {

            $(this).closest('.ut-ui-select-group').find('a').removeClass('hover');

        });

        $(document).on('click', '.ut-colorpicker-tabs a', function (e) {

            e.preventDefault();

            var $this    = $(this),
                tabgroup = '#'+$this.parents('.ut-colorpicker-tabs').data('tabgroup'),
                others   = $this.closest('li').siblings().children('a'),
                target   = $this.attr('href');

            others.removeClass('active');
            $this.addClass('active');
            $(tabgroup).children('div').hide();
            $(target).show();

        });

        // transients flush
        $(document).on('click', '.ut-ui-delete-transients', function( event ) {

            window.location.href = $(this).data("url");

        });


        // panel list collapse
        $(document).on('click', '.ut-section-headline-with-collapse', function( event ) {

            $(this).toggleClass('ut-section-headline-collapsed');
            event.preventDefault();

        });


        if( $('.notice.unite-health-status').length ) {

            $(document).on('click', '.ut-theme-options-page .ut-ui-button.save-settings, #option-tree-settings-api-submit', function( event ) {

                event.preventDefault();

                modal({
                    type: 'error',
                    title: 'Attention',
                    text: unite_js_translation.health_notification,
                    buttons: [
                        {
                            addClass: 'ut-ui-button-health',
                            text: "Cancel",
                            onClick: function(e) {

                                $("#modal-window").remove();
                                return false

                            }
                        },
                        {
                            addClass: 'ut-ui-button-blue',
                            text: "Save Anyways!",
                            onClick: function(e) {
                                return true
                            }
                        }
                    ],
                    callback: function(result) {

                        if( result === true ) {

                            $('#option-tree-settings-api').submit();

                        }

                    }

                });

            });

        } else {

            $(document).on('click', '#option-tree-settings-api-submit', function() {

                $('#option-tree-settings-api').submit();

            });

        }


    });

})(jQuery);