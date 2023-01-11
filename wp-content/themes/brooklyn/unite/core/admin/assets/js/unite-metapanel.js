/* <![CDATA[ */
(function ($) {

    "use strict";

    var $metaboxes = $("#ut-metabox-tabs");

    // start rendering metapanel on click
	$(window).on("load", function () {

    	if( $metaboxes.length ) {

            $metaboxes.removeClass('ut-hide');
            $('#ut-load-meta-panel').removeClass('ut-hide');

            // start checking Visual Composer Loading
            var check_vc_loading_status = setInterval(function () {

                if ($metaboxes.hasClass('ut-visual-composer-ready') || !$('#postdivrich').hasClass('.vc-disable-editor')) {

                    clearInterval(check_vc_loading_status);
                    start_meta_panel();

                }

            }, 50);

        }

    });

    function start_meta_panel() {

        $metaboxes.FormDependencies({
            inactiveClass: 'ut-hide',
            done: function () {

                $metaboxes.tabs({
                    create: function() {

                    	if( $(".ui-has-inner-tabs").length ) {

							$(".ui-has-inner-tabs").tabs({
								create: function () {

									$("#ut-metabox-tabs-overlay").delay(400).fadeOut(function () {

										$(this).addClass('ut-meta-panel-loaded');

									});
								}

							});

						} else {

							$("#ut-metabox-tabs-overlay").delay(400).fadeOut(function () {

								$(this).addClass('ut-meta-panel-loaded');

							});

						}

                    }
                });

            }
        });

    }


	var Meta_Panel_UI = {

		old_panel_active: true,

		unrelated_settings_for_portfolio : [
			// unused hero
			'ut_activate_page_hero',
			'ut_page_hero_background_color',
			'ut_page_hero_height',
			'ut_page_hero_inner_width',
			'ut_page_hero_inner_width_tablet',
			'ut_page_hero_image_tablet',
			'ut_page_hero_image_mobile',

			// unused animation settings
			'ut_page_hero_width',
			'ut_page_hero_image_scroll_zoom',
			'ut_page_hero_image_animation_effect',
			'ut_page_hero_image_animation_effect_timer',
			'ut_page_hero_image_animation_effect_kenburns_timer',
			'ut_page_hero_image_animation_effect_easing',
			'ut_page_hero_caption_animation_type',
			'ut_page_hero_caption_animation_effect',
			'ut_page_hero_caption_animation_effect_split',
			'ut_page_hero_caption_animation_effect_timer',
			'ut_page_hero_caption_animation_effect_easing',

			// unused video
			'ut_page_video_sound',
			'ut_page_video_volume',
			'ut_page_video_mute_button',
			'ut_page_video_poster',
			'ut_page_video_mobile',
			'ut_page_video_start_at',
			'ut_page_video_stop_at',
			'ut_page_video_loop',
			'ut_page_video_poster_tablet',
			'ut_page_video_poster_mobile',

			// unused slider
			'ut_page_hero_slider_animation_speed',
			'ut_page_hero_slider_slideshow_speed',
			'ut_page_hero_slider_arrow_background_color',
			'ut_page_hero_slider_arrow_background_color_hover',
			'ut_page_hero_slider_arrow_color',
			'ut_page_hero_slider_arrow_color_hover',

			// unused hero misc
			'ut_page_hero_parallax',
			'ut_page_hero_rain_effect',
			'ut_page_hero_rain_sound'
		],
		unrelated_menu_for_portfolio : [
			'ut-hero-styling',
			'ut-hero-settings',
			'ut-page-header-settings',
			'ut-contact-section',
			'ut-page-settings',
			'ut-header-settings',
			'ut-color-settings',
			'ut-product-settings'
		],
		unrelated_titles_for_portfolios : [
			'setting_ut_page_hero_slider_color_settings_headline',
			'setting_ut_page_video_poster_headline',
			'setting_ut_page_hero_background_settings_headline',
			'setting_ut_page_hero_image_animation_effect_headline'
		],
		unrelated_settings_for_pages : [
			'ut-portfolio-details',
            'ut-onpage-portfolio-settings',
            'ut-portfolio-showcase-settings',
			'ut-product-settings'
		],
		unrelated_settings_for_products : [
			'ut-portfolio-details',
			'ut-onpage-portfolio-settings',
			'ut-portfolio-showcase-settings'
		],
		init: function() {

			this.start_ui();

		},
		start_ui: function() {

			if( ut_meta_panel_vars.post_type === "portfolio" ) {

				// no team management at all
				$('.ut-manage-team').remove();
				$('#ut-manage-team').remove();

				var portfolio_link_type = '';

				if( $('#ut_portfolio_link_type').val() === 'global' ) {

					portfolio_link_type = $('#setting_ut_portfolio_link_type').data('detailstyle');

				} else {

					portfolio_link_type = $('#ut_portfolio_link_type').val();

				}

				// portfolio acts like a regular page
				if( portfolio_link_type === 'internal' || portfolio_link_type === '' ) {

					// show single options
					$.each(this.unrelated_settings_for_portfolio, function(index, value) {

						$('#setting_' + value).parent().removeClass('ut-disabled-for-user');

					});

					// show panel titles
					$.each(this.unrelated_titles_for_portfolios, function(index, value) {

						$('#' + value).removeClass('ut-disabled-for-user');

					});

					// show entire panels and menu items
					$.each(this.unrelated_menu_for_portfolio, function(index, value) {

						$('.' + value).removeClass('ut-disabled-for-user');
						$('#' + value).removeClass('ut-disabled-for-user');

					});

					// option exceptions
					$('.ut-hero-type').removeClass('ut-disabled-for-user');
					$('#ut-hero-type').removeClass('ut-disabled-for-user');

				} else {

					// hide single options not related to portfolio
					$.each(this.unrelated_settings_for_portfolio, function(index, value) {

						$('#setting_' + value).parent().addClass('ut-disabled-for-user');

					});

					// hide panel titles
					$.each(this.unrelated_titles_for_portfolios, function(index, value) {

						$('#' + value).addClass('ut-disabled-for-user');

					});

					// hide entire panels and menu items
					$.each(this.unrelated_menu_for_portfolio, function(index, value) {

						$('.' + value).addClass('ut-disabled-for-user');
						$('#' + value).addClass('ut-disabled-for-user');

					});

					// option exceptions
					if( portfolio_link_type === 'external' ) {

						$('.ut-hero-type').addClass('ut-disabled-for-user');
						$('#ut-hero-type').addClass('ut-disabled-for-user');

					}

				}

				// option exceptions
				if( portfolio_link_type === 'slideup' || portfolio_link_type === 'onepage' ) {

					// add a small delay because of the regular options dependency check
					setTimeout( function(){

						$('#setting_ut_slide_up_portfolio_hide_media').parent().removeClass("disabled ut-portfolio-hide");

					}, 100 );

				} else {

					// add a small delay because of the regular options dependency check
					setTimeout( function(){

						$('#setting_ut_slide_up_portfolio_hide_media').parent().addClass("disabled ut-portfolio-hide");

					}, 100 );

				}

				// exchange text block and hide select field options
				this.switch_text_blocks( portfolio_link_type );
				this.hide_field_options( portfolio_link_type );

				// check portfolio type panels
				this.adjust_portfolio_ui( portfolio_link_type );

			} else if( ut_meta_panel_vars.post_type === "product" )  {

				// hide entire panels and menu items
				$.each(this.unrelated_settings_for_products, function(index, value) {

					$('.' + value).addClass('ut-disabled-for-user');
					$('#' + value).addClass('ut-disabled-for-user');

				});

			} else {

				// hide entire panels and menu items
				$.each(this.unrelated_settings_for_pages, function(index, value) {

					$('.' + value).addClass('ut-disabled-for-user');
					$('#' + value).addClass('ut-disabled-for-user');

				});

			}

		},
		adjust_portfolio_ui: function( portfolio_link_type ) {

			// old one page settings
			var one_page_settings = '',
				ut_page_hero_type = $('#ut_page_hero_type').val();

			if( ut_page_hero_type === 'image' ) {

			   one_page_settings = $("#ut_page_hero_image").val();

			}

			if( ut_page_hero_type === 'video' ) {

				// check current video plattform
				switch($('#ut_page_video_source')) {
					case 'youtube':
						one_page_settings = $("#ut_page_video").val();
						break;
					case 'vimeo':
						one_page_settings = $("#ut_page_video_vimeo").val();
						break;
					case 'selfhosted' :
						one_page_settings = $("#ut_page_video_mp4").val();
						break;
					case 'custom' :
						one_page_settings = $("#ut_page_video_custom").val();
						break;
				}

		   	}

			if( ut_page_hero_type === 'slider' ) {

				one_page_settings = $("#ut_page_hero_slider_settings_array").next("ul").has("li");

			}

			if( portfolio_link_type === 'slideup' || portfolio_link_type === 'onepage' || portfolio_link_type === 'popup' ) {

				// old settings found
				if( one_page_settings.length ) {

					this.old_panel_active = true;

				} else {

					// hide old panel
					$(".ut-hero-type").addClass("ut-portfolio-hide");
					this.old_panel_active = false;

				}

			} else {

				$(".ut-hero-type").removeClass("ut-portfolio-hide");
				this.old_panel_active = false;

			}

			if( portfolio_link_type === 'slideup' || portfolio_link_type === 'onepage' || portfolio_link_type === 'popup' ) {

				this.show_onpage_settings( portfolio_link_type );

			} else {

				this.hide_onpage_settings();

			}

		},
		switch_text_blocks : function( type ) {

			if( type === 'internal' ) {

			   	$('.ut-hero-type a').text( $('.ut-hero-type').data('page') );
				$('#setting_ut_page_hero_type .ut-single-option-title').text( $('.ut-hero-type').data('page') );
				$('#setting_ut-hero-settings .ut-panel-title').text( $('.ut-hero-type').data('page') );

				// Show possible hiddden Panel Descriptions
				$("#setting_ut_page_hero_info").show();
				$("#setting_ut_page_hero_type .ut-panel-description").css({ "visibility" : "visible" });

				// switch name
				$("#ut_page_hero_type").each(function(){

					$(this).children("option").each(function() {

						if( $(this).data('orglabel') ) {
							$(this).text( $(this).data('orglabel') );
						}

					});

				});

			} else {

				$('.ut-hero-type a').text( $('.ut-hero-type').data('portfolio') );
				$('#setting_ut_page_hero_type .ut-single-option-title').text( $('.ut-hero-type').data('portfolio') );
				$('#setting_ut-hero-settings .ut-panel-title').text( $('.ut-hero-type').data('portfolio') );

				// Hide missleading panel description
				$("#setting_ut_page_hero_info").hide();
				$("#setting_ut_page_hero_type .ut-panel-description").css({ "visibility" : "hidden" });

				// trigger a click if hero was deactivated to avoid missing settings
				$('#setting_ut_activate_page_hero').find('.ut-on').trigger('click');

				// switch name
				$("#ut_page_hero_type").each(function(){

					$(this).children("option").each(function() {

						if( $(this).data('altlabel') ) {
							$(this).text( $(this).data('altlabel') );
						}

					});

				});

			}

			$('#ut_page_hero_type').trigger('change');

		},
		hide_field_options : function( type ) {

			if( type === 'internal' ) {

				$('#ut_page_hero_type .select-option-animatedimage').removeClass('ut-portfolio-hide');
				$('#ut_page_hero_type .select-option-splithero').removeClass('ut-portfolio-hide');
				$('#ut_page_hero_type .select-option-transition').removeClass('ut-portfolio-hide');
				$('#ut_page_hero_type .select-option-tabs').removeClass('ut-portfolio-hide');
				$('#ut_page_hero_type .select-option-custom').removeClass('ut-portfolio-hide');
				$('#ut_page_hero_type .select-option-dynamic').removeClass('ut-portfolio-hide');
				$('#ut_page_hero_type .select-option-imagefader').removeClass('ut-portfolio-hide');
				$('#ut_page_hero_type .select-option-cblock').removeClass('ut-portfolio-hide');

			} else {

				$('#ut_page_hero_type .select-option-animatedimage').addClass('ut-portfolio-hide');
				$('#ut_page_hero_type .select-option-splithero').addClass('ut-portfolio-hide');
				$('#ut_page_hero_type .select-option-transition').addClass('ut-portfolio-hide');
				$('#ut_page_hero_type .select-option-tabs').addClass('ut-portfolio-hide');
				$('#ut_page_hero_type .select-option-custom').addClass('ut-portfolio-hide');
				$('#ut_page_hero_type .select-option-dynamic').addClass('ut-portfolio-hide');
				$('#ut_page_hero_type .select-option-imagefader').addClass('ut-portfolio-hide');
				$('#ut_page_hero_type .select-option-cblock').addClass('ut-portfolio-hide');

			}

		},
		hide_onpage_settings: function() {

            $('.ut-onpage-portfolio-settings').addClass('ut-portfolio-hide');

		},
		show_onpage_settings: function( portfolio_link_type ) {

			$('.ut-onpage-portfolio-settings').removeClass('ut-portfolio-hide');

			if( portfolio_link_type === 'slideup' || portfolio_link_type === 'onepage' ) {

				$('.ut-onpage-portfolio-settings a').text( $('.ut-onpage-portfolio-settings').data("slideup") );

			} else {

				$('.ut-onpage-portfolio-settings a').text( $('.ut-onpage-portfolio-settings').data("lightbox") );

			}

		},
		show_message: function() {

			if( this.old_panel_active ) {

				if( $(".ut-hero-type").hasClass("ut-has-click-pointer") ) {

					$('<div id="ut-hero-type-pointer-overlay"></div>').addClass("ut-pointer-overlay").appendTo("#ut-hero-type");
					$(".ut-hero-type").pointer("open");

				}

			}

		}

	};

	Meta_Panel_UI.init();

	$(document).ready(function(){

		if( ut_meta_panel_vars.post_type === "portfolio" ) {

			$('#ut_portfolio_link_type').change(function() {

				Meta_Panel_UI.start_ui();

			});

			$(".ut-hero-type a").click(function(){

				Meta_Panel_UI.show_message();

			});

		}

	});


    // section and page switch
    $('#setting_ut_page_type').parent().hide();  
	
    if( ut_meta_panel_vars.site_type === "onepage" ) {

        $('*[data-group="ut_page_type"]').appendTo('#ut-option-switch');
    
    }
    
    $(document).ready(function(){
    
		if( ut_meta_panel_vars.post_type !== "portfolio" ) {

            $('.ut-portfolio-details').addClass('ut-portfolio-hide');
			$('.ut-portfolio-showcase-settings').addClass('ut-portfolio-hide');
			$('.ut-onpage-portfolio-settings').addClass('ut-portfolio-hide');

		}
    
	});
	
    $(document).ready(function(){
        
		// try to Parse JSON
		function tryParseJSON( jsonString ){
			try {
				var o = JSON.parse(jsonString);

				if (o && typeof o === "object") {
					return o;
				}
				
			}
			
			catch (e) { }

			return false;
			
		}
		
		
		
        function set_global_flag( $obj ) {
            
            var value = $obj.is(':checked') ? 'on' : 'off';
            
            $.ajax({
                type: 'POST',
                url: ajaxurl,
                data: { 
                     "action"   : "set_global_flag",
                     "post"     : $obj.data("post"),
                     "option"   : $obj.attr("name"),
                     "value"    : value,
                     "nonce"    : $obj.data('nonce'),
                },
                success: function(response) {
                    
                    $('#switch_overlay_' + $obj.data('option') ).children('.ut-panel-loader').remove();
                
                }
            
            });
        
        }
        
        function create_ajax_loader_animation( $obj ){
                           
            $('<div class="ut-panel-loader"><div class="sk-cube-grid-wrap"><div class="sk-cube-grid"><div class="sk-cube sk-cube1"></div><div class="sk-cube sk-cube2"></div><div class="sk-cube sk-cube3"></div><div class="sk-cube sk-cube4"></div><div class="sk-cube sk-cube5"></div><div class="sk-cube sk-cube6"></div><div class="sk-cube sk-cube7"></div><div class="sk-cube sk-cube8"></div><div class="sk-cube sk-cube9"></div></div></div></div>').appendTo( $obj );    
            
        }
        
        function show_hide_options_set( $obj ) {
            
            if( $obj.is(':checked') ) {
                
                $('#switch_overlay_' + $obj.data('option') ).removeClass('show');
                $('#setting_' + $obj.data('option') ).addClass("ut-custom-active").removeClass("ut-global-active");    
                
            } else {
                
                $('#switch_overlay_' + $obj.data('option') ).addClass('show');
                create_ajax_loader_animation( '#switch_overlay_' + $obj.data('option') );                
                $('#setting_' + $obj.data('option') ).addClass("ut-global-active").removeClass("ut-custom-active");
                
            }        
        
        }
        
		function update_with_globals( $obj, data ) {
            
			// numeric slider
			if( $obj.hasClass("ut-numeric-slider-hidden-input") ) {

				data = data.replace(/[^0-9]/g,'');

				$obj.val( data );
				$obj.siblings('.ut-numeric-slider-helper-input').val( data ).trigger('propertychange');

			} else if( $obj.hasClass('ut-gradient-picker') ) {
				
				$obj.val('rgba(255, 255, 255, 0)').trigger("keyup");
				$obj.val(data).trigger("keyup");				
			
			} else if( $obj.hasClass('ut-minicolors') ) {	
				
				$obj.val(data).trigger("keyup");
                
            } else if( $( $obj.selector + "-" + data).length ) {	    
                
                $($obj.selector + "-" + data).trigger("click");
                
			} else {
				
				$obj.val(data).trigger("change");
				
			}			
			
		}
		
		function show_hide_options_global_load( $obj ) {
			
			if( !$obj.is(':checked') ) {
				
				$.ajax({
                    type: 'POST',
                    url: ajaxurl,
                    data: { 
                         "action"   	: "load_global_value",
                         "option"   	: $obj.data("option"),
                         "option_key"   : $obj.data("option-key"),
                         "nonce"    	: $obj.data('nonce'),
                    },
                    success: function(response) {

                    	if( $obj.data("option-key") ) {

                    		update_fields( $obj, tryParseJSON(response) );

						} else {

							if (tryParseJSON(response)) {

								$.each(tryParseJSON(response), function (i, value) {

									update_with_globals($('[name="' + $obj.data("option") + '[' + i + ']"]'), value);

								});


							} else {

								update_with_globals($('#' + $obj.data("option")), response);

							}

						}

                    }

                });
				
			} 		
			
		}

		function update_fields( $obj, response, name_key ) {

			$.each( response, function( i, value ) {

				let _name_key = '';

				if( typeof value === 'object' ) {

					if( name_key === undefined ) {

						_name_key = '['+i+']';

					} else {

						_name_key = name_key + '['+i+']';

					}

					update_fields( $obj, value, _name_key );

				} else {

					if( name_key === undefined ) {

						_name_key = '['+i+']';

					} else {

						_name_key = name_key + '['+i+']';

					}

					update_with_globals( $('[name="'+ ( $obj.data("option") + _name_key ) +'"]'), value );

				}

			});

		}

		function show_hide_options_global_dynamic_load( $obj ) {

			if( !$obj.is(':checked') ) {

				$.ajax({
                    type: 'POST',
                    url: ajaxurl,
                    data: {
                         "action"   	: "load_global_dynamic_value",
                         "relation"    	: $obj.data("relation"),
                         "relation_key" : $obj.data("relation-key"),
                         "nonce"    	: $obj.data('nonce'),
                    },
                    success: function( response ) {

                        update_fields( $obj, response );

                    }

                });

			}

		}
        
        /**
         * Global Option Switch
         */
        
        $(document).on("click", ".ut-switch-for-globals:not(.ut-switch-dynamic-globals) input", function(event){
            
            var $this = $(this);
			
            // start ajax
            set_global_flag( $this );
			show_hide_options_set( $this );
            
			// modal to load globals ( not for single posts )
			if( ut_meta_panel_vars.post_type !== 'post' ) {
				
                show_hide_options_global_load( $this );
                
			}
				
            event.stopPropagation();
            event.stopImmediatePropagation();            
             
        });

		$(document).on("click", ".ut-switch-dynamic-globals input", function(event){

            var $this = $(this);

            // start ajax
            set_global_flag( $this );
			show_hide_options_set( $this );

			// modal to load globals ( not for single posts )
			if( ut_meta_panel_vars.post_type !== 'post' ) {

                show_hide_options_global_dynamic_load( $this );

			}

            event.stopPropagation();
            event.stopImmediatePropagation();

        });

		$(window).on("load", function () {
            
            // remove inline styles
            $(".ui-state-default").removeAttr('style');    
        
        });

        /**
         * Radio buttons
         */

		$(document).on("click", ".ut-radio-button", function(event){

			event.preventDefault();

			var $this = $(this);

			if( $this.hasClass('selected') ) {
				return false;
			}

			/* deactivate buttons first */
			$('#' +  $this.siblings('.selected').data('for') ).prop('checked', false);
			$this.siblings('.selected').removeClass('selected');

			/* now apply selected state to current button */
			$this.addClass('selected');

			/* change state of connected radio button */
			$('#' +  $this.data('for') ).prop('checked', true).trigger("change");


		});
        
        
        /**
         * Page Section Switch 
         */        
        
        $(document).on("click", '*[data-group="ut_page_type"] .ut-radio-button', function(){            
            
            $('#publish').trigger('click');
            
        });   
        
        
        /**
         * Team Template Switcher and Notification
         */
                
        var current_template = $("#page_template").val();
        
        /* display or hide team manager */        
        if( current_template === 'templates/template-team.php' ) {
            
            $('.ut-team-section').parent().show();
            $('#setting_ut_manage_team_info').hide();
            
        } else {
            
            $('.ut-team-section').parent().hide();
            $('#setting_ut_manage_team_info').show();
            
        }
        
        /* display or hide team manager on template change */    
        $("#page_template").change(function() { 
            
            var chosen_template = $(this).val();
            
            /* display or hide team manager */        
            if(chosen_template === 'templates/template-team.php') {
                
                $('.ut-team-section').parent().show();
                $('#setting_ut_manage_team_info').hide();
                
            } else {
                
                $('.ut-team-section').parent().hide();
                $('#setting_ut_manage_team_info').show();
                
            }            
        
        });
		
    });

})(jQuery);
 /* ]]> */  