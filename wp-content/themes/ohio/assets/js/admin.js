(function ($) {
	"use strict";

	if ( typeof vc !== 'undefined' ) {

	$('body, iframe').on('click','.vc_container_for_children.vc_empty-container, #vc_add-new-element, [data-vc-element="add-element-action"], .vc_controls [data-vc-control="add"], [data-vc-element="add-element-action"], #vc_add-new-element, .vc_control-btn-prepend, .vc_control-btn-append, .vc_controls [data-vc-control="prepend"], .vc_controls [data-vc-control="append"]',function() {
		$('#vc_ui-panel-add-element .vc_edit-form-tab-control button:contains("Ohio")').trigger('click');
	});

	/* Testimonial shortcode VC view */
	window.VcOhioTestimonialView = vc.shortcode_view.extend( {
		elementTemplate: false,
		$wrapper: false,
		changeShortcodeParams: function ( model ) {
			var params;

			window.VcOhioTestimonialView.__super__.changeShortcodeParams.call( this, model );
			params = _.extend( {}, model.get( 'params' ) );
			if ( ! this.elementTemplate ) {
				this.elementTemplate = this.$el.find( '.vc_ohio_testimonial-container' ).html();
			}
			if ( ! this.$wrapper ) {
				this.$wrapper = this.$el.find( '.wpb_element_wrapper' );
			}
			if ( _.isObject( params ) ) {
				var $element = this.elementTemplate.replace(/%%author%%/g, ((params.author) ? params.author : '...'));
				this.$wrapper.find( '.vc_ohio_testimonial-container' ).html( $element );
			}
		}
	} );

	/* Team member shortcode VC view */
	window.VcOhioTeamMemberView = vc.shortcode_view.extend( {
		elementTemplate: false,
		$wrapper: false,
		changeShortcodeParams: function ( model ) {
			var params;

			window.VcOhioTeamMemberView.__super__.changeShortcodeParams.call( this, model );
			params = _.extend( {}, model.get( 'params' ) );
			if ( ! this.elementTemplate ) {
				this.elementTemplate = this.$el.find( '.vc_ohio_team_member-container' ).html();
			}
			if ( ! this.$wrapper ) {
				this.$wrapper = this.$el.find( '.wpb_element_wrapper' );
			}
			if ( _.isObject( params ) ) {
				var $element = this.elementTemplate.replace(/%%name%%/g, ((params.name) ? params.name : '...'));
				this.$wrapper.find( '.vc_ohio_team_member-container' ).html( $element );
			}
		}
	} );

	/* Team member inner shortcode VC view */
	window.VcOhioTeamMemberInnerView = vc.shortcode_view.extend( {
		elementTemplate: false,
		$wrapper: false,
		changeShortcodeParams: function ( model ) {
			var params;

			window.VcOhioTeamMemberInnerView.__super__.changeShortcodeParams.call( this, model );
			params = _.extend( {}, model.get( 'params' ) );
			if ( ! this.elementTemplate ) {
				this.elementTemplate = this.$el.find( '.vc_ohio_team_member_inner-container' ).html();
			}
			if ( ! this.$wrapper ) {
				this.$wrapper = this.$el.find( '.wpb_element_wrapper' );
			}
			if ( _.isObject( params ) ) {
				var $element = this.elementTemplate.replace(/%%name%%/g, ((params.name) ? params.name : '...'));
				this.$wrapper.find( '.vc_ohio_team_member_inner-container' ).html( $element );
			}
		}
	} );

	/* Icon box shortcode VC view */
	window.VcOhioIconBoxView = vc.shortcode_view.extend( {
		elementTemplate: false,
		$wrapper: false,
		changeShortcodeParams: function ( model ) {
			var params;

			window.VcOhioIconBoxView.__super__.changeShortcodeParams.call( this, model );
			params = _.extend( {}, model.get( 'params' ) );
			if ( ! this.elementTemplate ) {
				this.elementTemplate = this.$el.find( '.vc_ohio_icon_box-container' ).html();
			}
			if ( ! this.$wrapper ) {
				this.$wrapper = this.$el.find( '.wpb_element_wrapper' );
			}
			if ( _.isObject( params ) ) {
				var $element = this.elementTemplate.replace(/%%title%%/g, ((params.title) ? params.title : '...'));
				var as_icon = '';
				if ( params.icon_as_icon ) {
					as_icon = '<span class="' + params.icon_as_icon + '"></span>';
				}
				if ( params.icon_as_image ) {
					as_icon = '<span class="small my-icon-fil-image"></span><br>...';
				}
				$element = $element.replace(/%%icon%%/g, as_icon);
				this.$wrapper.find( '.vc_ohio_icon_box-container' ).html( $element );
			}
		}
	} );

	/* Progess bar */
	window.VcOhioProgressBarView = vc.shortcode_view.extend( {
		elementTemplate: false,
		$wrapper: false,
		changeShortcodeParams: function ( model ) {
			var params;

			window.VcOhioProgressBarView.__super__.changeShortcodeParams.call( this, model );
			params = _.extend( {}, model.get( 'params' ) );
			if ( ! this.elementTemplate ) {
				this.elementTemplate = this.$el.find( '.vc_ohio_progress_bar-container' ).html();
			}
			if ( ! this.$wrapper ) {
				this.$wrapper = this.$el.find( '.wpb_element_wrapper' );
			}
			if ( _.isObject( params ) ) {
				var title_text = '[Empty]';
				if ( ( params.name && params.name.length ) || ( params.percent && params.percent.length ) ) {
					if ( params.name == undefined ) {
						params.name = '[Empty]';
					}
					title_text = params.name + ': ' + intval(params.percent) + '%'
				}
				var $element = this.elementTemplate.replace(/%%title%%/g, title_text);
				this.$wrapper.find( '.vc_ohio_progress_bar-container' ).html( $element );
			}
		}
	} );

	/* Subscribe */
	window.VcOhioSubscribeView = vc.shortcode_view.extend( {
		elementTemplate: false,
		$wrapper: false,
		changeShortcodeParams: function ( model ) {
			var params;

			window.VcOhioSubscribeView.__super__.changeShortcodeParams.call( this, model );
			params = _.extend( {}, model.get( 'params' ) );
			if ( ! this.elementTemplate ) {
				this.elementTemplate = this.$el.find( '.vc_ohio_subscribe-container' ).html();
			}
			if ( ! this.$wrapper ) {
				this.$wrapper = this.$el.find( '.wpb_element_wrapper' );
			}
			if ( _.isObject( params ) ) {
				var title_text = '[Recipient is empty]';
				if ( params.feedburner_name && params.feedburner_name.length ) {
					title_text = '@' + params.feedburner_name;
				}
				var $element = this.elementTemplate.replace(/%%title%%/g, title_text);
				this.$wrapper.find( '.vc_ohio_subscribe-container' ).html( $element );
			}
		}
	} );

	/* Icon box shortcode VC view */
	window.VcOhioContactInnerView = vc.shortcode_view.extend( {
		elementTemplate: false,
		$wrapper: false,
		changeShortcodeParams: function ( model ) {
			var params;

			window.VcOhioContactInnerView.__super__.changeShortcodeParams.call( this, model );
			params = _.extend( {}, model.get( 'params' ) );
			if ( ! this.elementTemplate ) {
				this.elementTemplate = this.$el.find( '.vc_ohio_contact_inner-container' ).html();
			}
			if ( ! this.$wrapper ) {
				this.$wrapper = this.$el.find( '.wpb_element_wrapper' );
			}
			if ( _.isObject( params ) ) {
				var $element = this.elementTemplate.replace(/%%info%%/g, ((params.info) ? params.info : '...'));
				var heading = '';
				if (params.block_type_layout != 'without_heading') {
					heading = (params.heading) ? params.heading : '...';
					heading = '<div class="heading">' + heading + '</div>';
				}
				$element = $element.replace(/%%heading%%/g, heading);
				this.$wrapper.find( '.vc_ohio_contact_inner-container' ).html( $element );
			}
		}
	} );

	/* Icon box shortcode VC view */
	window.VcOhioAccordionInnerView = vc.shortcode_view.extend( {
		elementTemplate: false,
		$wrapper: false,
		changeShortcodeParams: function ( model ) {
			var params;
			window.VcOhioAccordionInnerView.__super__.changeShortcodeParams.call( this, model );
			params = _.extend( {}, model.get( 'params' ) );
			if ( ! this.elementTemplate ) {
				this.elementTemplate = this.$el.find( '.vc_ohio_accordion_inner-container' ).html();
			}
			if ( ! this.$wrapper ) {
				this.$wrapper = this.$el.find( '.wpb_element_wrapper' );
			}
			if ( _.isObject( params ) ) {
				var $element = this.elementTemplate.replace(/%%heading%%/g, ((params.heading) ? params.heading : '...'));
				this.$wrapper.find( '.vc_ohio_accordion_inner-container' ).html( $element );
			}
		}
	} );

	/* Banner box shortcode VC view */
	window.VcOhioBannerBoxView = vc.shortcode_view.extend( {
		elementTemplate: false,
		$wrapper: false,
		changeShortcodeParams: function ( model ) {
			var params;

			window.VcOhioBannerBoxView.__super__.changeShortcodeParams.call( this, model );
			params = _.extend( {}, model.get( 'params' ) );
			if ( ! this.elementTemplate ) {
				this.elementTemplate = this.$el.find( '.vc_ohio_banner_box-container' ).html();
			}
			if ( ! this.$wrapper ) {
				this.$wrapper = this.$el.find( '.wpb_element_wrapper' );
			}
			if ( _.isObject( params ) ) {
				var $element = this.elementTemplate.replace(/%%title%%/g, ((params.title) ? params.title : '...'));
				$element = $element.replace(/%%subtitle%%/g, ((params.subtitle) ? params.subtitle : '...'));
				this.$wrapper.find( '.vc_ohio_banner_box-container' ).html( $element );
			}
		}
	} );

	/* Banner box inner shortcode VC view */
	window.VcOhioBannerBoxInnerView = vc.shortcode_view.extend( {
		elementTemplate: false,
		$wrapper: false,
		changeShortcodeParams: function ( model ) {
			var params;

			window.VcOhioBannerBoxInnerView.__super__.changeShortcodeParams.call( this, model );
			params = _.extend( {}, model.get( 'params' ) );
			if ( ! this.elementTemplate ) {
				this.elementTemplate = this.$el.find( '.vc_ohio_banner_box_inner-container' ).html();
			}
			if ( ! this.$wrapper ) {
				this.$wrapper = this.$el.find( '.wpb_element_wrapper' );
			}
			if ( _.isObject( params ) ) {
				var $element = this.elementTemplate.replace(/%%title%%/g, ((params.title) ? params.title : '...'));
				$element = $element.replace(/%%subtitle%%/g, ((params.subtitle) ? params.subtitle : '...'));
				this.$wrapper.find( '.vc_ohio_banner_box_inner-container' ).html( $element );
			}
		}
	} );

	/* Pricing table shortcode VC view */
	window.VcOhioPricingTableView = vc.shortcode_view.extend( {
		elementTemplate: false,
		$wrapper: false,
		changeShortcodeParams: function ( model ) {
			var params;

			window.VcOhioPricingTableView.__super__.changeShortcodeParams.call( this, model );
			params = _.extend( {}, model.get( 'params' ) );
			if ( ! this.elementTemplate ) {
				this.elementTemplate = this.$el.find( '.vc_ohio_pricing_table-container' ).html();
			}
			if ( ! this.$wrapper ) {
				this.$wrapper = this.$el.find( '.wpb_element_wrapper' );
			}
			if ( _.isObject( params ) ) {
				var $element = this.elementTemplate.replace(/%%title%%/g, ((params.title) ? params.title : '...'));
				$element = $element.replace(/%%price%%/g, ((params.price) ? params.price : '...'));
				this.$wrapper.find( '.vc_ohio_pricing_table-container' ).html( $element );
			}
		}
	} );

	/* Service table shortcode VC view */
	window.VcOhioServiceTableView = vc.shortcode_view.extend( {
		elementTemplate: false,
		$wrapper: false,
		changeShortcodeParams: function ( model ) {
			var params;

			window.VcOhioServiceTableView.__super__.changeShortcodeParams.call( this, model );
			params = _.extend( {}, model.get( 'params' ) );
			if ( ! this.elementTemplate ) {
				this.elementTemplate = this.$el.find( '.vc_ohio_service_table-container' ).html();
			}
			if ( ! this.$wrapper ) {
				this.$wrapper = this.$el.find( '.wpb_element_wrapper' );
			}
			if ( _.isObject( params ) ) {
				var $element = this.elementTemplate.replace(/%%title%%/g, ((params.title) ? params.title : '...'));
				$element = $element.replace(/%%price%%/g, ((params.price) ? params.price : '...'));
				this.$wrapper.find( '.vc_ohio_service_table-container' ).html( $element );
			}
		}
	} );

	/* Pricing table shortcode VC view */
	window.VcOhioPricingTableFeaturesView = vc.shortcode_view.extend( {
		elementTemplate: false,
		$wrapper: false,
		changeShortcodeParams: function ( model ) {
			var params;

			window.VcOhioPricingTableFeaturesView.__super__.changeShortcodeParams.call( this, model );
			params = _.extend( {}, model.get( 'params' ) );
			if ( ! this.elementTemplate ) {
				this.elementTemplate = this.$el.find( '.vc_ohio_pricing_table_features-container' ).html();
			}
			if ( ! this.$wrapper ) {
				this.$wrapper = this.$el.find( '.wpb_element_wrapper' );
			}
			if ( _.isObject( params ) ) {
				var $element = this.elementTemplate.replace(/%%title%%/g, ((params.title) ? params.title : '...'));
				this.$wrapper.find( '.vc_ohio_pricing_table_features-container' ).html( $element );
			}
		}
	} );

	/* Custom Team Member Column */
	window.VcOhioGroupColumnView = vc.shortcode_view.extend({
		events: {
			'click > .vc_controls [data-vc-control="delete"]': "deleteShortcode",
			'click > .vc_controls [data-vc-control="add"]': "addElement",
			'click > .vc_controls [data-vc-control="edit"]': "editElement",
			'click > .vc_controls [data-vc-control="clone"]': "clone",
			"click > .wpb_element_wrapper > .vc_empty-container": "addToEmpty"
		},
		current_column_width: !1,
		initialize: function(options) {
			window.VcOhioGroupColumnView.__super__.initialize.call(this, options), _.bindAll(this, "setDropable", "dropButton")
		},
		ready: function(e) {
			return window.VcOhioGroupColumnView.__super__.ready.call(this, e), this.setDropable(), this
		},
		render: function() {
			return window.VcOhioGroupColumnView.__super__.render.call(this), this.current_column_width = this.model.get("params").width || "1/1", this.$el.attr("data-width", this.current_column_width), this.setEmpty(), this
		},
		changeShortcodeParams: function(model) {
			window.VcOhioGroupColumnView.__super__.changeShortcodeParams.call(this, model), this.setColumnClasses(), this.buildDesignHelpers()
		},
		designHelpersSelector: "> .vc_controls .column_add",
		buildDesignHelpers: function() {
			var matches, image, color, css = this.model.getParam("css"),
				$column_toggle = this.$el.find(this.designHelpersSelector).get(0);
			this.$el.find("> .vc_controls .vc_column_color").remove(), this.$el.find("> .vc_controls .vc_column_image").remove(), matches = css.match(/background\-image:\s*url\(([^\)]+)\)/), matches && !_.isUndefined(matches[1]) && (image = matches[1]), matches = css.match(/background\-color:\s*([^\s\;]+)\b/), matches && !_.isUndefined(matches[1]) && (color = matches[1]), matches = css.match(/background:\s*([^\s]+)\b\s*url\(([^\)]+)\)/), matches && !_.isUndefined(matches[1]) && (color = matches[1], image = matches[2]), image && jQuery('<span class="vc_column_image" style="background-image: url(' + image + ');" title="' + i18nLocale.column_background_image + '"></span>').insertBefore($column_toggle), color && jQuery('<span class="vc_column_color" style="background-color: ' + color + '" title="' + i18nLocale.column_background_color + '"></span>').insertBefore($column_toggle)
		},
		setColumnClasses: function() {
			var current_css_class_width, offset = this.model.getParam("offset") || "",
				width = this.model.getParam("width") || "1/1",
				css_class_width = this.convertSize(width);
			this.current_offset_class && this.$el.removeClass(this.current_offset_class), this.current_column_width !== width && (current_css_class_width = this.convertSize(this.current_column_width), this.$el.attr("data-width", width).removeClass(current_css_class_width).addClass(css_class_width), this.current_column_width = width), offset.match(/vc_col\-sm\-\d+/) && this.$el.removeClass(css_class_width), _.isEmpty(offset) || this.$el.addClass(offset), this.current_offset_class = offset
		},
		addToEmpty: function(e) {
			row =  vc.shortcodes.create({
				shortcode: "ohio_team_member_inner",
				params: [],
				parent_id: this.model.id
			});
			//e.preventDefault(), jQuery(e.target).hasClass("vc_empty-container") && this.addElement(e)
		},
		addElement: function(e) {
			row =  vc.shortcodes.create({
				shortcode: "ohio_team_member_inner",
				params: [],
				parent_id: this.model.id
			});
		},
		setDropable: function() {
			return this.$content.droppable({
				greedy: !0,
				accept: "vc_column_inner" === this.model.get("shortcode") ? ".dropable_el" : ".dropable_el,.dropable_row",
				hoverClass: "wpb_ui-state-active",
				drop: this.dropButton
			}), this
		},
		dropButton: function(event, ui) {
			ui.draggable.is("#wpb-add-new-element") ? new vc.element_block_view({
				model: {
					position_to_add: "end"
				}
			}).show(this) : ui.draggable.is("#wpb-add-new-row") && this.createRow()
		},
		setEmpty: function() {
			this.$el.addClass("vc_empty-column"), "edit" !== vc_user_access().getState("shortcodes") && this.$content.addClass("vc_empty-container")
		},
		unsetEmpty: function() {
			this.$el.removeClass("vc_empty-column"), this.$content.removeClass("vc_empty-container")
		},
		checkIsEmpty: function() {
			vc.shortcodes.where({
				parent_id: this.model.id
			}).length ? this.unsetEmpty() : this.setEmpty(), window.VcOhioGroupColumnView.__super__.checkIsEmpty.call(this)
		},
		createRow: function() {
			var row_params, column_params, row;
			return row_params = {}, "undefined" != typeof window.vc_settings_presets.vc_row_inner && (row_params = _.extend(row_params, window.vc_settings_presets.vc_row_inner)), column_params = {
				width: "1/1"
			}, "undefined" != typeof window.vc_settings_presets.vc_column_inner && (column_params = _.extend(column_params, window.vc_settings_presets.vc_column_inner)), row = Shortcodes.create({
				shortcode: "vc_row_inner",
				params: row_params,
				parent_id: this.model.id
			}), vc.shortcodes.create({
				shortcode: "vc_column_inner",
				params: column_params,
				parent_id: row.id
			}), row
		},
		convertSize: function(width) {
			var prefix = "vc_col-sm-",
				numbers = width ? width.split("/") : [1, 1],
				range = _.range(1, 13),
				num = !_.isUndefined(numbers[0]) && 0 <= _.indexOf(range, parseInt(numbers[0], 10)) ? parseInt(numbers[0], 10) : !1,
				dev = !_.isUndefined(numbers[1]) && 0 <= _.indexOf(range, parseInt(numbers[1], 10)) ? parseInt(numbers[1], 10) : !1;
			return !1 !== num && !1 !== dev ? prefix + 12 * num / dev : prefix + "12"
		},
		deleteShortcode: function(e) {
			var parent, parent_id = this.model.get("parent_id");
			_.isObject(e) && e.preventDefault();
			var answer = confirm(window.i18nLocale.press_ok_to_delete_section);
			return !0 !== answer ? !1 : (this.model.destroy(), void(parent_id && !vc.shortcodes.where({
				parent_id: parent_id
			}).length ? (parent = vc.shortcodes.get(parent_id), _.contains(["vc_column", "vc_column_inner"], parent.get("shortcode")) || parent.destroy()) : parent_id && (parent = vc.shortcodes.get(parent_id), parent && parent.view && parent.view.setActiveLayoutButton && parent.view.setActiveLayoutButton())))
		},
		remove: function() {
			this.$content && this.$content.data("uiSortable") && this.$content.sortable("destroy"), this.$content && this.$content.data("uiDroppable") && this.$content.droppable("destroy"), delete vc.app.views[this.model.id], window.VcColumnView.__super__.remove.call(this)
		}
	});


	/* Custom Banner Box Inner */
	window.VcOhioBannersGroupColumnView = vc.shortcode_view.extend({
		events: {
			'click > .vc_controls [data-vc-control="delete"]': "deleteShortcode",
			'click > .vc_controls [data-vc-control="add"]': "addElement",
			'click > .vc_controls [data-vc-control="edit"]': "editElement",
			'click > .vc_controls [data-vc-control="clone"]': "clone",
			"click > .wpb_element_wrapper > .vc_empty-container": "addToEmpty"
		},
		current_column_width: !1,
		initialize: function(options) {
			window.VcOhioBannersGroupColumnView.__super__.initialize.call(this, options), _.bindAll(this, "setDropable", "dropButton")
		},
		ready: function(e) {
			return window.VcOhioBannersGroupColumnView.__super__.ready.call(this, e), this.setDropable(), this
		},
		render: function() {
			return window.VcOhioBannersGroupColumnView.__super__.render.call(this), this.current_column_width = this.model.get("params").width || "1/1", this.$el.attr("data-width", this.current_column_width), this.setEmpty(), this
		},
		changeShortcodeParams: function(model) {
			window.VcOhioBannersGroupColumnView.__super__.changeShortcodeParams.call(this, model), this.setColumnClasses(), this.buildDesignHelpers()
		},
		designHelpersSelector: "> .vc_controls .column_add",
		buildDesignHelpers: function() {
			var matches, image, color, css = this.model.getParam("css"),
				$column_toggle = this.$el.find(this.designHelpersSelector).get(0);
			this.$el.find("> .vc_controls .vc_column_color").remove(), this.$el.find("> .vc_controls .vc_column_image").remove(), matches = css.match(/background\-image:\s*url\(([^\)]+)\)/), matches && !_.isUndefined(matches[1]) && (image = matches[1]), matches = css.match(/background\-color:\s*([^\s\;]+)\b/), matches && !_.isUndefined(matches[1]) && (color = matches[1]), matches = css.match(/background:\s*([^\s]+)\b\s*url\(([^\)]+)\)/), matches && !_.isUndefined(matches[1]) && (color = matches[1], image = matches[2]), image && jQuery('<span class="vc_column_image" style="background-image: url(' + image + ');" title="' + i18nLocale.column_background_image + '"></span>').insertBefore($column_toggle), color && jQuery('<span class="vc_column_color" style="background-color: ' + color + '" title="' + i18nLocale.column_background_color + '"></span>').insertBefore($column_toggle)
		},
		setColumnClasses: function() {
			var current_css_class_width, offset = this.model.getParam("offset") || "",
				width = this.model.getParam("width") || "1/1",
				css_class_width = this.convertSize(width);
			this.current_offset_class && this.$el.removeClass(this.current_offset_class), this.current_column_width !== width && (current_css_class_width = this.convertSize(this.current_column_width), this.$el.attr("data-width", width).removeClass(current_css_class_width).addClass(css_class_width), this.current_column_width = width), offset.match(/vc_col\-sm\-\d+/) && this.$el.removeClass(css_class_width), _.isEmpty(offset) || this.$el.addClass(offset), this.current_offset_class = offset
		},
		addToEmpty: function(e) {
			row =  vc.shortcodes.create({
				shortcode: "ohio_banner_box_inner",
				params: [],
				parent_id: this.model.id
			});
			//e.preventDefault(), jQuery(e.target).hasClass("vc_empty-container") && this.addElement(e)
		},
		addElement: function(e) {
			row =  vc.shortcodes.create({
				shortcode: "ohio_banner_box_inner",
				params: [],
				parent_id: this.model.id
			});
		},
		setDropable: function() {
			return this.$content.droppable({
				greedy: !0,
				accept: "vc_column_inner" === this.model.get("shortcode") ? ".dropable_el" : ".dropable_el,.dropable_row",
				hoverClass: "wpb_ui-state-active",
				drop: this.dropButton
			}), this
		},
		dropButton: function(event, ui) {
			ui.draggable.is("#wpb-add-new-element") ? new vc.element_block_view({
				model: {
					position_to_add: "end"
				}
			}).show(this) : ui.draggable.is("#wpb-add-new-row") && this.createRow()
		},
		setEmpty: function() {
			this.$el.addClass("vc_empty-column"), "edit" !== vc_user_access().getState("shortcodes") && this.$content.addClass("vc_empty-container")
		},
		unsetEmpty: function() {
			this.$el.removeClass("vc_empty-column"), this.$content.removeClass("vc_empty-container")
		},
		checkIsEmpty: function() {
			vc.shortcodes.where({
				parent_id: this.model.id
			}).length ? this.unsetEmpty() : this.setEmpty(), window.VcOhioBannersGroupColumnView.__super__.checkIsEmpty.call(this)
		},
		createRow: function() {
			var row_params, column_params, row;
			return row_params = {}, "undefined" != typeof window.vc_settings_presets.vc_row_inner && (row_params = _.extend(row_params, window.vc_settings_presets.vc_row_inner)), column_params = {
				width: "1/1"
			}, "undefined" != typeof window.vc_settings_presets.vc_column_inner && (column_params = _.extend(column_params, window.vc_settings_presets.vc_column_inner)), row = Shortcodes.create({
				shortcode: "vc_row_inner",
				params: row_params,
				parent_id: this.model.id
			}), vc.shortcodes.create({
				shortcode: "vc_column_inner",
				params: column_params,
				parent_id: row.id
			}), row
		},
		convertSize: function(width) {
			var prefix = "vc_col-sm-",
				numbers = width ? width.split("/") : [1, 1],
				range = _.range(1, 13),
				num = !_.isUndefined(numbers[0]) && 0 <= _.indexOf(range, parseInt(numbers[0], 10)) ? parseInt(numbers[0], 10) : !1,
				dev = !_.isUndefined(numbers[1]) && 0 <= _.indexOf(range, parseInt(numbers[1], 10)) ? parseInt(numbers[1], 10) : !1;
			return !1 !== num && !1 !== dev ? prefix + 12 * num / dev : prefix + "12"
		},
		deleteShortcode: function(e) {
			var parent, parent_id = this.model.get("parent_id");
			_.isObject(e) && e.preventDefault();
			var answer = confirm(window.i18nLocale.press_ok_to_delete_section);
			return !0 !== answer ? !1 : (this.model.destroy(), void(parent_id && !vc.shortcodes.where({
				parent_id: parent_id
			}).length ? (parent = vc.shortcodes.get(parent_id), _.contains(["vc_column", "vc_column_inner"], parent.get("shortcode")) || parent.destroy()) : parent_id && (parent = vc.shortcodes.get(parent_id), parent && parent.view && parent.view.setActiveLayoutButton && parent.view.setActiveLayoutButton())))
		},
		remove: function() {
			this.$content && this.$content.data("uiSortable") && this.$content.sortable("destroy"), this.$content && this.$content.data("uiDroppable") && this.$content.droppable("destroy"), delete vc.app.views[this.model.id], window.VcColumnView.__super__.remove.call(this)
		}
	});


	/* Custom Split Screen */
	window.VcOhioSplitScreensView = vc.shortcode_view.extend({
		events: {
			'click > .vc_controls [data-vc-control="delete"]': "deleteShortcode",
			'click > .vc_controls [data-vc-control="add"]': "addElement",
			'click > .vc_controls [data-vc-control="edit"]': "editElement",
			'click > .vc_controls [data-vc-control="clone"]': "clone",
			"click > .wpb_element_wrapper > .vc_empty-container": "addToEmpty"
		},
		current_column_width: !1,
		initialize: function(options) {
			window.VcOhioSplitScreensView.__super__.initialize.call(this, options), _.bindAll(this, "setDropable", "dropButton")
		},
		ready: function(e) {
			return window.VcOhioSplitScreensView.__super__.ready.call(this, e), this.setDropable(), this
		},
		render: function() {
			return window.VcOhioSplitScreensView.__super__.render.call(this), this.current_column_width = this.model.get("params").width || "1/1", this.$el.attr("data-width", this.current_column_width), this.setEmpty(), this
		},
		changeShortcodeParams: function(model) {
			window.VcOhioSplitScreensView.__super__.changeShortcodeParams.call(this, model), this.setColumnClasses(), this.buildDesignHelpers()
		},
		designHelpersSelector: "> .vc_controls .column_add",
		buildDesignHelpers: function() {
			var matches, image, color, css = this.model.getParam("css"),
				$column_toggle = this.$el.find(this.designHelpersSelector).get(0);
			this.$el.find("> .vc_controls .vc_column_color").remove(), this.$el.find("> .vc_controls .vc_column_image").remove(), matches = css.match(/background\-image:\s*url\(([^\)]+)\)/), matches && !_.isUndefined(matches[1]) && (image = matches[1]), matches = css.match(/background\-color:\s*([^\s\;]+)\b/), matches && !_.isUndefined(matches[1]) && (color = matches[1]), matches = css.match(/background:\s*([^\s]+)\b\s*url\(([^\)]+)\)/), matches && !_.isUndefined(matches[1]) && (color = matches[1], image = matches[2]), image && jQuery('<span class="vc_column_image" style="background-image: url(' + image + ');" title="' + i18nLocale.column_background_image + '"></span>').insertBefore($column_toggle), color && jQuery('<span class="vc_column_color" style="background-color: ' + color + '" title="' + i18nLocale.column_background_color + '"></span>').insertBefore($column_toggle)
		},
		setColumnClasses: function() {
			var current_css_class_width, offset = this.model.getParam("offset") || "",
				width = this.model.getParam("width") || "1/1",
				css_class_width = this.convertSize(width);
			this.current_offset_class && this.$el.removeClass(this.current_offset_class), this.current_column_width !== width && (current_css_class_width = this.convertSize(this.current_column_width), this.$el.attr("data-width", width).removeClass(current_css_class_width).addClass(css_class_width), this.current_column_width = width), offset.match(/vc_col\-sm\-\d+/) && this.$el.removeClass(css_class_width), _.isEmpty(offset) || this.$el.addClass(offset), this.current_offset_class = offset
		},
		addToEmpty: function(e) {
			row =  vc.shortcodes.create({
				shortcode: "ohio_split_screen",
				params: [],
				parent_id: this.model.id
			});
			//e.preventDefault(), jQuery(e.target).hasClass("vc_empty-container") && this.addElement(e)
		},
		addElement: function(e) {
			row =  vc.shortcodes.create({
				shortcode: "ohio_split_screen",
				params: [],
				parent_id: this.model.id
			});
			return false;
		},
		setDropable: function() {
			return this.$content.droppable({
				greedy: !0,
				accept: "vc_column_inner" === this.model.get("shortcode") ? ".dropable_el" : ".dropable_el,.dropable_row",
				hoverClass: "wpb_ui-state-active",
				drop: this.dropButton
			}), this
		},
		dropButton: function(event, ui) {
			ui.draggable.is("#wpb-add-new-element") ? new vc.element_block_view({
				model: {
					position_to_add: "end"
				}
			}).show(this) : ui.draggable.is("#wpb-add-new-row") && this.createRow()
		},
		setEmpty: function() {
			this.$el.addClass("vc_empty-column"), "edit" !== vc_user_access().getState("shortcodes") && this.$content.addClass("vc_empty-container")
		},
		unsetEmpty: function() {
			this.$el.removeClass("vc_empty-column"), this.$content.removeClass("vc_empty-container")
		},
		checkIsEmpty: function() {
			vc.shortcodes.where({
				parent_id: this.model.id
			}).length ? this.unsetEmpty() : this.setEmpty(), window.VcOhioSplitScreensView.__super__.checkIsEmpty.call(this)
		},
				createRow: function() {
			var row_params, column_params, row;
			return row_params = {}, "undefined" != typeof window.vc_settings_presets.vc_row_inner && (row_params = _.extend(row_params, window.vc_settings_presets.vc_row_inner)), column_params = {
				width: "1/1"
			}, "undefined" != typeof window.vc_settings_presets.vc_column_inner && (column_params = _.extend(column_params, window.vc_settings_presets.vc_column_inner)), row = Shortcodes.create({
				shortcode: "vc_row_inner",
				params: row_params,
				parent_id: this.model.id
			}), vc.shortcodes.create({
				shortcode: "vc_column_inner",
				params: column_params,
				parent_id: row.id
			}), row
		},
		convertSize: function(width) {
			var prefix = "vc_col-sm-",
				numbers = width ? width.split("/") : [1, 1],
				range = _.range(1, 13),
				num = !_.isUndefined(numbers[0]) && 0 <= _.indexOf(range, parseInt(numbers[0], 10)) ? parseInt(numbers[0], 10) : !1,
				dev = !_.isUndefined(numbers[1]) && 0 <= _.indexOf(range, parseInt(numbers[1], 10)) ? parseInt(numbers[1], 10) : !1;
			return !1 !== num && !1 !== dev ? prefix + 12 * num / dev : prefix + "12"
		},
		deleteShortcode: function(e) {
			var parent, parent_id = this.model.get("parent_id");
			_.isObject(e) && e.preventDefault();
			var answer = confirm(window.i18nLocale.press_ok_to_delete_section);
			return !0 !== answer ? !1 : (this.model.destroy(), void(parent_id && !vc.shortcodes.where({
				parent_id: parent_id
			}).length ? (parent = vc.shortcodes.get(parent_id), _.contains(["vc_column", "vc_column_inner"], parent.get("shortcode")) || parent.destroy()) : parent_id && (parent = vc.shortcodes.get(parent_id), parent && parent.view && parent.view.setActiveLayoutButton && parent.view.setActiveLayoutButton())))
		},
		remove: function() {
			this.$content && this.$content.data("uiSortable") && this.$content.sortable("destroy"), this.$content && this.$content.data("uiDroppable") && this.$content.droppable("destroy"), delete vc.app.views[this.model.id], window.VcColumnView.__super__.remove.call(this)
		}
	});


	window.VcOhioTimelineInnerView = vc.shortcode_view.extend({
		events: {
			'click > .vc_controls [data-vc-control="delete"]': "deleteShortcode",
			'click > .vc_controls [data-vc-control="add"]': "addElement",
			'click > .vc_controls [data-vc-control="edit"]': "editElement",
			'click > .vc_controls [data-vc-control="clone"]': "clone",
			"click > .wpb_element_wrapper > .vc_empty-container": "addToEmpty"
		},
		current_column_width: !1,
		initialize: function(options) {
			window.VcOhioTimelineInnerView.__super__.initialize.call(this, options), _.bindAll(this, "setDropable", "dropButton")
		},
		ready: function(e) {
			return window.VcOhioTimelineInnerView.__super__.ready.call(this, e), this.setDropable(), this
		},
		render: function() {
			return window.VcOhioTimelineInnerView.__super__.render.call(this), this.current_column_width = this.model.get("params").width || "1/1", this.$el.attr("data-width", this.current_column_width), this.setEmpty(), this
		},
		changeShortcodeParams: function(model) {
			window.VcOhioTimelineInnerView.__super__.changeShortcodeParams.call(this, model), this.setColumnClasses(), this.buildDesignHelpers()
		},
		designHelpersSelector: "> .vc_controls .column_add",
		buildDesignHelpers: function() {
			var matches, image, color, css = this.model.getParam("css"),
				$column_toggle = this.$el.find(this.designHelpersSelector).get(0);
			this.$el.find("> .vc_controls .vc_column_color").remove(), this.$el.find("> .vc_controls .vc_column_image").remove(), matches = css.match(/background\-image:\s*url\(([^\)]+)\)/), matches && !_.isUndefined(matches[1]) && (image = matches[1]), matches = css.match(/background\-color:\s*([^\s\;]+)\b/), matches && !_.isUndefined(matches[1]) && (color = matches[1]), matches = css.match(/background:\s*([^\s]+)\b\s*url\(([^\)]+)\)/), matches && !_.isUndefined(matches[1]) && (color = matches[1], image = matches[2]), image && jQuery('<span class="vc_column_image" style="background-image: url(' + image + ');" title="' + i18nLocale.column_background_image + '"></span>').insertBefore($column_toggle), color && jQuery('<span class="vc_column_color" style="background-color: ' + color + '" title="' + i18nLocale.column_background_color + '"></span>').insertBefore($column_toggle)
		},
		setColumnClasses: function() {
			var current_css_class_width, offset = this.model.getParam("offset") || "",
				width = this.model.getParam("width") || "1/1",
				css_class_width = this.convertSize(width);
			this.current_offset_class && this.$el.removeClass(this.current_offset_class), this.current_column_width !== width && (current_css_class_width = this.convertSize(this.current_column_width), this.$el.attr("data-width", width).removeClass(current_css_class_width).addClass(css_class_width), this.current_column_width = width), offset.match(/vc_col\-sm\-\d+/) && this.$el.removeClass(css_class_width), _.isEmpty(offset) || this.$el.addClass(offset), this.current_offset_class = offset
		},
		addToEmpty: function(e) {
			row =  vc.shortcodes.create({
				shortcode: "ohio_timeline_inner",
				params: [],
				parent_id: this.model.id
			});
			//e.preventDefault(), jQuery(e.target).hasClass("vc_empty-container") && this.addElement(e)
		},
		addElement: function(e) {
			row =  vc.shortcodes.create({
				shortcode: "ohio_timeline_inner",
				params: [],
				parent_id: this.model.id
			});
			return false;
		},
		setDropable: function() {
			return this.$content.droppable({
				greedy: !0,
				accept: "vc_column_inner" === this.model.get("shortcode") ? ".dropable_el" : ".dropable_el,.dropable_row",
				hoverClass: "wpb_ui-state-active",
				drop: this.dropButton
			}), this
		},
		dropButton: function(event, ui) {
			ui.draggable.is("#wpb-add-new-element") ? new vc.element_block_view({
				model: {
					position_to_add: "end"
				}
			}).show(this) : ui.draggable.is("#wpb-add-new-row") && this.createRow()
		},
		setEmpty: function() {
			this.$el.addClass("vc_empty-column"), "edit" !== vc_user_access().getState("shortcodes") && this.$content.addClass("vc_empty-container")
		},
		unsetEmpty: function() {
			this.$el.removeClass("vc_empty-column"), this.$content.removeClass("vc_empty-container")
		},
		checkIsEmpty: function() {
			vc.shortcodes.where({
				parent_id: this.model.id
			}).length ? this.unsetEmpty() : this.setEmpty(), window.VcOhioTimelineInnerView.__super__.checkIsEmpty.call(this)
		},
				createRow: function() {
			var row_params, column_params, row;
			return row_params = {}, "undefined" != typeof window.vc_settings_presets.vc_row_inner && (row_params = _.extend(row_params, window.vc_settings_presets.vc_row_inner)), column_params = {
				width: "1/1"
			}, "undefined" != typeof window.vc_settings_presets.vc_column_inner && (column_params = _.extend(column_params, window.vc_settings_presets.vc_column_inner)), row = Shortcodes.create({
				shortcode: "vc_row_inner",
				params: row_params,
				parent_id: this.model.id
			}), vc.shortcodes.create({
				shortcode: "vc_column_inner",
				params: column_params,
				parent_id: row.id
			}), row
		},
		convertSize: function(width) {
			var prefix = "vc_col-sm-",
				numbers = width ? width.split("/") : [1, 1],
				range = _.range(1, 13),
				num = !_.isUndefined(numbers[0]) && 0 <= _.indexOf(range, parseInt(numbers[0], 10)) ? parseInt(numbers[0], 10) : !1,
				dev = !_.isUndefined(numbers[1]) && 0 <= _.indexOf(range, parseInt(numbers[1], 10)) ? parseInt(numbers[1], 10) : !1;
			return !1 !== num && !1 !== dev ? prefix + 12 * num / dev : prefix + "12"
		},
		deleteShortcode: function(e) {
			var parent, parent_id = this.model.get("parent_id");
			_.isObject(e) && e.preventDefault();
			var answer = confirm(window.i18nLocale.press_ok_to_delete_section);
			return !0 !== answer ? !1 : (this.model.destroy(), void(parent_id && !vc.shortcodes.where({
				parent_id: parent_id
			}).length ? (parent = vc.shortcodes.get(parent_id), _.contains(["vc_column", "vc_column_inner"], parent.get("shortcode")) || parent.destroy()) : parent_id && (parent = vc.shortcodes.get(parent_id), parent && parent.view && parent.view.setActiveLayoutButton && parent.view.setActiveLayoutButton())))
		},
		remove: function() {
			this.$content && this.$content.data("uiSortable") && this.$content.sortable("destroy"), this.$content && this.$content.data("uiDroppable") && this.$content.droppable("destroy"), delete vc.app.views[this.model.id], window.VcColumnView.__super__.remove.call(this)
		}
	});


	/* Custom Vertical Slider Column */
	window.VcOhioVerticalSliderView = vc.shortcode_view.extend({
		events: {
			'click > .vc_controls [data-vc-control="delete"]': "deleteShortcode",
			'click > .vc_controls [data-vc-control="add"]': "addElement",
			'click > .vc_controls [data-vc-control="edit"]': "editElement",
			'click > .vc_controls [data-vc-control="clone"]': "clone",
			"click > .wpb_element_wrapper > .vc_empty-container": "addToEmpty"
		},
		current_column_width: !1,
		initialize: function(options) {
			window.VcOhioVerticalSliderView.__super__.initialize.call(this, options), _.bindAll(this, "setDropable", "dropButton")
		},
		ready: function(e) {
			return window.VcOhioVerticalSliderView.__super__.ready.call(this, e), this.setDropable(), this
		},
		render: function() {
			return window.VcOhioVerticalSliderView.__super__.render.call(this), this.current_column_width = this.model.get("params").width || "1/1", this.$el.attr("data-width", this.current_column_width), this.setEmpty(), this
		},
		changeShortcodeParams: function(model) {
			window.VcOhioVerticalSliderView.__super__.changeShortcodeParams.call(this, model), this.setColumnClasses(), this.buildDesignHelpers()
		},
		designHelpersSelector: "> .vc_controls .column_add",
		buildDesignHelpers: function() {
			var matches, image, color, css = this.model.getParam("css"),
				$column_toggle = this.$el.find(this.designHelpersSelector).get(0);
			this.$el.find("> .vc_controls .vc_column_color").remove(), this.$el.find("> .vc_controls .vc_column_image").remove(), matches = css.match(/background\-image:\s*url\(([^\)]+)\)/), matches && !_.isUndefined(matches[1]) && (image = matches[1]), matches = css.match(/background\-color:\s*([^\s\;]+)\b/), matches && !_.isUndefined(matches[1]) && (color = matches[1]), matches = css.match(/background:\s*([^\s]+)\b\s*url\(([^\)]+)\)/), matches && !_.isUndefined(matches[1]) && (color = matches[1], image = matches[2]), image && jQuery('<span class="vc_column_image" style="background-image: url(' + image + ');" title="' + i18nLocale.column_background_image + '"></span>').insertBefore($column_toggle), color && jQuery('<span class="vc_column_color" style="background-color: ' + color + '" title="' + i18nLocale.column_background_color + '"></span>').insertBefore($column_toggle)
		},
		setColumnClasses: function() {
			var current_css_class_width, offset = this.model.getParam("offset") || "",
				width = this.model.getParam("width") || "1/1",
				css_class_width = this.convertSize(width);
			this.current_offset_class && this.$el.removeClass(this.current_offset_class), this.current_column_width !== width && (current_css_class_width = this.convertSize(this.current_column_width), this.$el.attr("data-width", width).removeClass(current_css_class_width).addClass(css_class_width), this.current_column_width = width), offset.match(/vc_col\-sm\-\d+/) && this.$el.removeClass(css_class_width), _.isEmpty(offset) || this.$el.addClass(offset), this.current_offset_class = offset
		},
		addToEmpty: function(e) {
			row =  vc.shortcodes.create({
				shortcode: "ohio_vertical_slider_inner",
				params: [],
				parent_id: this.model.id
			});
			//e.preventDefault(), jQuery(e.target).hasClass("vc_empty-container") && this.addElement(e)
		},
		addElement: function(e) {
			row =  vc.shortcodes.create({
				shortcode: "ohio_vertical_slider_inner",
				params: [],
				parent_id: this.model.id
			});
			return false;
		},
		setDropable: function() {
			return this.$content.droppable({
				greedy: !0,
				accept: "vc_column_inner" === this.model.get("shortcode") ? ".dropable_el" : ".dropable_el,.dropable_row",
				hoverClass: "wpb_ui-state-active",
				drop: this.dropButton
			}), this
		},
		dropButton: function(event, ui) {
			ui.draggable.is("#wpb-add-new-element") ? new vc.element_block_view({
				model: {
					position_to_add: "end"
				}
			}).show(this) : ui.draggable.is("#wpb-add-new-row") && this.createRow()
		},
		setEmpty: function() {
			this.$el.addClass("vc_empty-column"), "edit" !== vc_user_access().getState("shortcodes") && this.$content.addClass("vc_empty-container")
		},
		unsetEmpty: function() {
			this.$el.removeClass("vc_empty-column"), this.$content.removeClass("vc_empty-container")
		},
		checkIsEmpty: function() {
			vc.shortcodes.where({
				parent_id: this.model.id
			}).length ? this.unsetEmpty() : this.setEmpty(), window.VcOhioVerticalSliderView.__super__.checkIsEmpty.call(this)
		},
				createRow: function() {
			var row_params, column_params, row;
			return row_params = {}, "undefined" != typeof window.vc_settings_presets.vc_row_inner && (row_params = _.extend(row_params, window.vc_settings_presets.vc_row_inner)), column_params = {
				width: "1/1"
			}, "undefined" != typeof window.vc_settings_presets.vc_column_inner && (column_params = _.extend(column_params, window.vc_settings_presets.vc_column_inner)), row = Shortcodes.create({
				shortcode: "vc_row_inner",
				params: row_params,
				parent_id: this.model.id
			}), vc.shortcodes.create({
				shortcode: "vc_column_inner",
				params: column_params,
				parent_id: row.id
			}), row
		},
		convertSize: function(width) {
			var prefix = "vc_col-sm-",
				numbers = width ? width.split("/") : [1, 1],
				range = _.range(1, 13),
				num = !_.isUndefined(numbers[0]) && 0 <= _.indexOf(range, parseInt(numbers[0], 10)) ? parseInt(numbers[0], 10) : !1,
				dev = !_.isUndefined(numbers[1]) && 0 <= _.indexOf(range, parseInt(numbers[1], 10)) ? parseInt(numbers[1], 10) : !1;
			return !1 !== num && !1 !== dev ? prefix + 12 * num / dev : prefix + "12"
		},
		deleteShortcode: function(e) {
			var parent, parent_id = this.model.get("parent_id");
			_.isObject(e) && e.preventDefault();
			var answer = confirm(window.i18nLocale.press_ok_to_delete_section);
			return !0 !== answer ? !1 : (this.model.destroy(), void(parent_id && !vc.shortcodes.where({
				parent_id: parent_id
			}).length ? (parent = vc.shortcodes.get(parent_id), _.contains(["vc_column", "vc_column_inner"], parent.get("shortcode")) || parent.destroy()) : parent_id && (parent = vc.shortcodes.get(parent_id), parent && parent.view && parent.view.setActiveLayoutButton && parent.view.setActiveLayoutButton())))
		},
		remove: function() {
			this.$content && this.$content.data("uiSortable") && this.$content.sortable("destroy"), this.$content && this.$content.data("uiDroppable") && this.$content.droppable("destroy"), delete vc.app.views[this.model.id], window.VcColumnView.__super__.remove.call(this)
		}
	});

	/* Custom Smooth Sections Row */
	window.VcOhioSmoothSectionsView = vc.shortcode_view.extend({
		events: {
			'click > .vc_controls [data-vc-control="delete"]': "deleteShortcode",
			'click > .vc_controls [data-vc-control="add"]': "addElement",
			'click > .vc_controls [data-vc-control="edit"]': "editElement",
			'click > .vc_controls [data-vc-control="clone"]': "clone",
			"click > .wpb_element_wrapper > .vc_empty-container": "addToEmpty"
		},
		current_column_width: !1,
		initialize: function(options) {
			window.VcOhioSmoothSectionsView.__super__.initialize.call(this, options), _.bindAll(this, "setDropable", "dropButton")
		},
		ready: function(e) {
			return window.VcOhioSmoothSectionsView.__super__.ready.call(this, e), this.setDropable(), this
		},
		render: function() {
			return window.VcOhioSmoothSectionsView.__super__.render.call(this), this.current_column_width = this.model.get("params").width || "1/1", this.$el.attr("data-width", this.current_column_width), this.setEmpty(), this
		},
		changeShortcodeParams: function(model) {
			window.VcOhioSmoothSectionsView.__super__.changeShortcodeParams.call(this, model), this.setColumnClasses(), this.buildDesignHelpers()
		},
		designHelpersSelector: "> .vc_controls .column_add",
		buildDesignHelpers: function() {
			var matches, image, color, css = this.model.getParam("css"),
				$column_toggle = this.$el.find(this.designHelpersSelector).get(0);
			this.$el.find("> .vc_controls .vc_column_color").remove(), this.$el.find("> .vc_controls .vc_column_image").remove(), matches = css.match(/background\-image:\s*url\(([^\)]+)\)/), matches && !_.isUndefined(matches[1]) && (image = matches[1]), matches = css.match(/background\-color:\s*([^\s\;]+)\b/), matches && !_.isUndefined(matches[1]) && (color = matches[1]), matches = css.match(/background:\s*([^\s]+)\b\s*url\(([^\)]+)\)/), matches && !_.isUndefined(matches[1]) && (color = matches[1], image = matches[2]), image && jQuery('<span class="vc_column_image" style="background-image: url(' + image + ');" title="' + i18nLocale.column_background_image + '"></span>').insertBefore($column_toggle), color && jQuery('<span class="vc_column_color" style="background-color: ' + color + '" title="' + i18nLocale.column_background_color + '"></span>').insertBefore($column_toggle)
		},
		setColumnClasses: function() {
			var current_css_class_width, offset = this.model.getParam("offset") || "",
				width = this.model.getParam("width") || "1/1",
				css_class_width = this.convertSize(width);
			this.current_offset_class && this.$el.removeClass(this.current_offset_class), this.current_column_width !== width && (current_css_class_width = this.convertSize(this.current_column_width), this.$el.attr("data-width", width).removeClass(current_css_class_width).addClass(css_class_width), this.current_column_width = width), offset.match(/vc_col\-sm\-\d+/) && this.$el.removeClass(css_class_width), _.isEmpty(offset) || this.$el.addClass(offset), this.current_offset_class = offset
		},
		addToEmpty: function(e) {
			//var row =  
			vc.shortcodes.create({
				shortcode: "ohio_smooth_sections_inner",
				params: [],
				parent_id: this.model.id
			});
			//e.preventDefault(), jQuery(e.target).hasClass("vc_empty-container") && this.addElement(e)
		},
		addElement: function(e) {
			var row = vc.shortcodes.create({
				shortcode: "ohio_smooth_sections_inner",
				params: [],
				parent_id: this.model.id
			});
			return false;
		},
		setDropable: function() {
			return this.$content.droppable({
				greedy: !0,
				accept: "vc_column_inner" === this.model.get("shortcode") ? ".dropable_el" : ".dropable_el,.dropable_row",
				hoverClass: "wpb_ui-state-active",
				drop: this.dropButton
			}), this
		},
		dropButton: function(event, ui) {
			ui.draggable.is("#wpb-add-new-element") ? new vc.element_block_view({
				model: {
					position_to_add: "end"
				}
			}).show(this) : ui.draggable.is("#wpb-add-new-row") && this.createRow()
		},
		setEmpty: function() {
			this.$el.addClass("vc_empty-column"), "edit" !== vc_user_access().getState("shortcodes") && this.$content.addClass("vc_empty-container")
		},
		unsetEmpty: function() {
			this.$el.removeClass("vc_empty-column"), this.$content.removeClass("vc_empty-container")
		},
		checkIsEmpty: function() {
			vc.shortcodes.where({
				parent_id: this.model.id
			}).length ? this.unsetEmpty() : this.setEmpty(), window.VcOhioSmoothSectionsView.__super__.checkIsEmpty.call(this)
		},
				createRow: function() {
			var row_params, column_params, row;
			return row_params = {}, "undefined" != typeof window.vc_settings_presets.vc_row_inner && (row_params = _.extend(row_params, window.vc_settings_presets.vc_row_inner)), column_params = {
				width: "1/1"
			}, "undefined" != typeof window.vc_settings_presets.vc_column_inner && (column_params = _.extend(column_params, window.vc_settings_presets.vc_column_inner)), row = Shortcodes.create({
				shortcode: "vc_row_inner",
				params: row_params,
				parent_id: this.model.id
			}), vc.shortcodes.create({
				shortcode: "vc_column_inner",
				params: column_params,
				parent_id: row.id
			}), row
		},
		convertSize: function(width) {
			var prefix = "vc_col-sm-",
				numbers = width ? width.split("/") : [1, 1],
				range = _.range(1, 13),
				num = !_.isUndefined(numbers[0]) && 0 <= _.indexOf(range, parseInt(numbers[0], 10)) ? parseInt(numbers[0], 10) : !1,
				dev = !_.isUndefined(numbers[1]) && 0 <= _.indexOf(range, parseInt(numbers[1], 10)) ? parseInt(numbers[1], 10) : !1;
			return !1 !== num && !1 !== dev ? prefix + 12 * num / dev : prefix + "12"
		},
		deleteShortcode: function(e) {
			var parent, parent_id = this.model.get("parent_id");
			_.isObject(e) && e.preventDefault();
			var answer = confirm(window.i18nLocale.press_ok_to_delete_section);
			return !0 !== answer ? !1 : (this.model.destroy(), void(parent_id && !vc.shortcodes.where({
				parent_id: parent_id
			}).length ? (parent = vc.shortcodes.get(parent_id), _.contains(["vc_column", "vc_column_inner"], parent.get("shortcode")) || parent.destroy()) : parent_id && (parent = vc.shortcodes.get(parent_id), parent && parent.view && parent.view.setActiveLayoutButton && parent.view.setActiveLayoutButton())))
		},
		remove: function() {
			this.$content && this.$content.data("uiSortable") && this.$content.sortable("destroy"), this.$content && this.$content.data("uiDroppable") && this.$content.droppable("destroy"), delete vc.app.views[this.model.id], window.VcColumnView.__super__.remove.call(this)
		}
	});


	/* Custom Split Screen Row */
	window.VcOhioSplitScreenView = vc.shortcode_view.extend({
		events: {
			'click > .vc_controls [data-vc-control="delete"]': "deleteShortcode",
			'click > .vc_controls [data-vc-control="add"]': "addElement",
			'click > .vc_controls [data-vc-control="edit"]': "editElement",
			'click > .vc_controls [data-vc-control="clone"]': "clone",
			"click > .wpb_element_wrapper > .vc_empty-container": "addToEmpty"
		},
		current_column_width: !1,
		initialize: function(options) {
			window.VcOhioSplitScreenView.__super__.initialize.call(this, options), _.bindAll(this, "setDropable", "dropButton")
		},
		ready: function(e) {
			return window.VcOhioSplitScreenView.__super__.ready.call(this, e), this.setDropable(), this
		},
		render: function() {
			return window.VcOhioSplitScreenView.__super__.render.call(this), this.current_column_width = this.model.get("params").width || "1/1", this.$el.attr("data-width", this.current_column_width), this.setEmpty(), this
		},
		changeShortcodeParams: function(model) {
			window.VcOhioSplitScreenView.__super__.changeShortcodeParams.call(this, model), this.setColumnClasses(), this.buildDesignHelpers()
		},
		designHelpersSelector: "> .vc_controls .column_add",
		buildDesignHelpers: function() {
			var matches, image, color, css = this.model.getParam("css"),
				$column_toggle = this.$el.find(this.designHelpersSelector).get(0);
			this.$el.find("> .vc_controls .vc_column_color").remove(), this.$el.find("> .vc_controls .vc_column_image").remove(), matches = css.match(/background\-image:\s*url\(([^\)]+)\)/), matches && !_.isUndefined(matches[1]) && (image = matches[1]), matches = css.match(/background\-color:\s*([^\s\;]+)\b/), matches && !_.isUndefined(matches[1]) && (color = matches[1]), matches = css.match(/background:\s*([^\s]+)\b\s*url\(([^\)]+)\)/), matches && !_.isUndefined(matches[1]) && (color = matches[1], image = matches[2]), image && jQuery('<span class="vc_column_image" style="background-image: url(' + image + ');" title="' + i18nLocale.column_background_image + '"></span>').insertBefore($column_toggle), color && jQuery('<span class="vc_column_color" style="background-color: ' + color + '" title="' + i18nLocale.column_background_color + '"></span>').insertBefore($column_toggle)
		},
		setColumnClasses: function() {
			var current_css_class_width, offset = this.model.getParam("offset") || "",
				width = this.model.getParam("width") || "1/1",
				css_class_width = this.convertSize(width);
			this.current_offset_class && this.$el.removeClass(this.current_offset_class), this.current_column_width !== width && (current_css_class_width = this.convertSize(this.current_column_width), this.$el.attr("data-width", width).removeClass(current_css_class_width).addClass(css_class_width), this.current_column_width = width), offset.match(/vc_col\-sm\-\d+/) && this.$el.removeClass(css_class_width), _.isEmpty(offset) || this.$el.addClass(offset), this.current_offset_class = offset
		},
		addToEmpty: function(e) {
			row =  vc.shortcodes.create({
				shortcode: "ohio_split_screen_column",
				params: [],
				parent_id: this.model.id
			});
			//e.preventDefault(), jQuery(e.target).hasClass("vc_empty-container") && this.addElement(e)
		},
		addElement: function(e) {
			row =  vc.shortcodes.create({
				shortcode: "ohio_split_screen_column",
				params: [],
				parent_id: this.model.id
			});
			return false;
		},
		setDropable: function() {
			return this.$content.droppable({
				greedy: !0,
				accept: "vc_column_inner" === this.model.get("shortcode") ? ".dropable_el" : ".dropable_el,.dropable_row",
				hoverClass: "wpb_ui-state-active",
				drop: this.dropButton
			}), this
		},
		dropButton: function(event, ui) {
			ui.draggable.is("#wpb-add-new-element") ? new vc.element_block_view({
				model: {
					position_to_add: "end"
				}
			}).show(this) : ui.draggable.is("#wpb-add-new-row") && this.createRow()
		},
		setEmpty: function() {
			this.$el.addClass("vc_empty-column"), "edit" !== vc_user_access().getState("shortcodes") && this.$content.addClass("vc_empty-container")
		},
		unsetEmpty: function() {
			this.$el.removeClass("vc_empty-column"), this.$content.removeClass("vc_empty-container")
		},
		checkIsEmpty: function() {
			vc.shortcodes.where({
				parent_id: this.model.id
			}).length ? this.unsetEmpty() : this.setEmpty(), window.VcOhioSplitScreenView.__super__.checkIsEmpty.call(this)
		},
				createRow: function() {
			var row_params, column_params, row;
			return row_params = {}, "undefined" != typeof window.vc_settings_presets.vc_row_inner && (row_params = _.extend(row_params, window.vc_settings_presets.vc_row_inner)), column_params = {
				width: "1/1"
			}, "undefined" != typeof window.vc_settings_presets.vc_column_inner && (column_params = _.extend(column_params, window.vc_settings_presets.vc_column_inner)), row = Shortcodes.create({
				shortcode: "vc_row_inner",
				params: row_params,
				parent_id: this.model.id
			}), vc.shortcodes.create({
				shortcode: "vc_column_inner",
				params: column_params,
				parent_id: row.id
			}), row
		},
		convertSize: function(width) {
			var prefix = "vc_col-sm-",
				numbers = width ? width.split("/") : [1, 1],
				range = _.range(1, 13),
				num = !_.isUndefined(numbers[0]) && 0 <= _.indexOf(range, parseInt(numbers[0], 10)) ? parseInt(numbers[0], 10) : !1,
				dev = !_.isUndefined(numbers[1]) && 0 <= _.indexOf(range, parseInt(numbers[1], 10)) ? parseInt(numbers[1], 10) : !1;
			return !1 !== num && !1 !== dev ? prefix + 12 * num / dev : prefix + "12"
		},
		deleteShortcode: function(e) {
			var parent, parent_id = this.model.get("parent_id");
			_.isObject(e) && e.preventDefault();
			var answer = confirm(window.i18nLocale.press_ok_to_delete_section);
			return !0 !== answer ? !1 : (this.model.destroy(), void(parent_id && !vc.shortcodes.where({
				parent_id: parent_id
			}).length ? (parent = vc.shortcodes.get(parent_id), _.contains(["vc_column", "vc_column_inner"], parent.get("shortcode")) || parent.destroy()) : parent_id && (parent = vc.shortcodes.get(parent_id), parent && parent.view && parent.view.setActiveLayoutButton && parent.view.setActiveLayoutButton())))
		},
		remove: function() {
			this.$content && this.$content.data("uiSortable") && this.$content.sortable("destroy"), this.$content && this.$content.data("uiDroppable") && this.$content.droppable("destroy"), delete vc.app.views[this.model.id], window.VcColumnView.__super__.remove.call(this)
		}
	});


	/* Custom Contact Column */
	window.VcOhioContactsGroupColumnView = vc.shortcode_view.extend({
		events: {
			'click > .vc_controls [data-vc-control="delete"]': "deleteShortcode",
			'click > .vc_controls [data-vc-control="add"]': "addElement",
			'click > .vc_controls [data-vc-control="edit"]': "editElement",
			'click > .vc_controls [data-vc-control="clone"]': "clone",
			"click > .wpb_element_wrapper > .vc_empty-container": "addToEmpty"
		},
		current_column_width: !1,
		initialize: function(options) {
			window.VcOhioContactsGroupColumnView.__super__.initialize.call(this, options), _.bindAll(this, "setDropable", "dropButton")
		},
		ready: function(e) {
			return window.VcOhioContactsGroupColumnView.__super__.ready.call(this, e), this.setDropable(), this
		},
		render: function() {
			return window.VcOhioContactsGroupColumnView.__super__.render.call(this), this.current_column_width = this.model.get("params").width || "1/1", this.$el.attr("data-width", this.current_column_width), this.setEmpty(), this
		},
		changeShortcodeParams: function(model) {
			window.VcOhioContactsGroupColumnView.__super__.changeShortcodeParams.call(this, model), this.setColumnClasses(), this.buildDesignHelpers()
		},
		designHelpersSelector: "> .vc_controls .column_add",
		buildDesignHelpers: function() {
			var matches, image, color, css = this.model.getParam("css"),
				$column_toggle = this.$el.find(this.designHelpersSelector).get(0);
			this.$el.find("> .vc_controls .vc_column_color").remove(), this.$el.find("> .vc_controls .vc_column_image").remove(), matches = css.match(/background\-image:\s*url\(([^\)]+)\)/), matches && !_.isUndefined(matches[1]) && (image = matches[1]), matches = css.match(/background\-color:\s*([^\s\;]+)\b/), matches && !_.isUndefined(matches[1]) && (color = matches[1]), matches = css.match(/background:\s*([^\s]+)\b\s*url\(([^\)]+)\)/), matches && !_.isUndefined(matches[1]) && (color = matches[1], image = matches[2]), image && jQuery('<span class="vc_column_image" style="background-image: url(' + image + ');" title="' + i18nLocale.column_background_image + '"></span>').insertBefore($column_toggle), color && jQuery('<span class="vc_column_color" style="background-color: ' + color + '" title="' + i18nLocale.column_background_color + '"></span>').insertBefore($column_toggle)
		},
		setColumnClasses: function() {
			var current_css_class_width, offset = this.model.getParam("offset") || "",
				width = this.model.getParam("width") || "1/1",
				css_class_width = this.convertSize(width);
			this.current_offset_class && this.$el.removeClass(this.current_offset_class), this.current_column_width !== width && (current_css_class_width = this.convertSize(this.current_column_width), this.$el.attr("data-width", width).removeClass(current_css_class_width).addClass(css_class_width), this.current_column_width = width), offset.match(/vc_col\-sm\-\d+/) && this.$el.removeClass(css_class_width), _.isEmpty(offset) || this.$el.addClass(offset), this.current_offset_class = offset
		},
		addToEmpty: function(e) {
			row =  vc.shortcodes.create({
				shortcode: "ohio_contact_inner",
				params: [],
				parent_id: this.model.id
			});
			//e.preventDefault(), jQuery(e.target).hasClass("vc_empty-container") && this.addElement(e)
		},
		addElement: function(e) {
			row =  vc.shortcodes.create({
				shortcode: "ohio_contact_inner",
				params: [],
				parent_id: this.model.id
			});
			return false;
		},
		setDropable: function() {
			return this.$content.droppable({
				greedy: !0,
				accept: "vc_column_inner" === this.model.get("shortcode") ? ".dropable_el" : ".dropable_el,.dropable_row",
				hoverClass: "wpb_ui-state-active",
				drop: this.dropButton
			}), this
		},
		dropButton: function(event, ui) {
			ui.draggable.is("#wpb-add-new-element") ? new vc.element_block_view({
				model: {
					position_to_add: "end"
				}
			}).show(this) : ui.draggable.is("#wpb-add-new-row") && this.createRow()
		},
		setEmpty: function() {
			this.$el.addClass("vc_empty-column"), "edit" !== vc_user_access().getState("shortcodes") && this.$content.addClass("vc_empty-container")
		},
		unsetEmpty: function() {
			this.$el.removeClass("vc_empty-column"), this.$content.removeClass("vc_empty-container")
		},
		checkIsEmpty: function() {
			vc.shortcodes.where({
				parent_id: this.model.id
			}).length ? this.unsetEmpty() : this.setEmpty(), window.VcOhioContactsGroupColumnView.__super__.checkIsEmpty.call(this)
		},
		createRow: function() {
			var row_params, column_params, row;
			return row_params = {}, "undefined" != typeof window.vc_settings_presets.vc_row_inner && (row_params = _.extend(row_params, window.vc_settings_presets.vc_row_inner)), column_params = {
				width: "1/1"
			}, "undefined" != typeof window.vc_settings_presets.vc_column_inner && (column_params = _.extend(column_params, window.vc_settings_presets.vc_column_inner)), row = Shortcodes.create({
				shortcode: "vc_row_inner",
				params: row_params,
				parent_id: this.model.id
			}), vc.shortcodes.create({
				shortcode: "vc_column_inner",
				params: column_params,
				parent_id: row.id
			}), row
		},
		convertSize: function(width) {
			var prefix = "vc_col-sm-",
				numbers = width ? width.split("/") : [1, 1],
				range = _.range(1, 13),
				num = !_.isUndefined(numbers[0]) && 0 <= _.indexOf(range, parseInt(numbers[0], 10)) ? parseInt(numbers[0], 10) : !1,
				dev = !_.isUndefined(numbers[1]) && 0 <= _.indexOf(range, parseInt(numbers[1], 10)) ? parseInt(numbers[1], 10) : !1;
			return !1 !== num && !1 !== dev ? prefix + 12 * num / dev : prefix + "12"
		},
		deleteShortcode: function(e) {
			var parent, parent_id = this.model.get("parent_id");
			_.isObject(e) && e.preventDefault();
			var answer = confirm(window.i18nLocale.press_ok_to_delete_section);
			return !0 !== answer ? !1 : (this.model.destroy(), void(parent_id && !vc.shortcodes.where({
				parent_id: parent_id
			}).length ? (parent = vc.shortcodes.get(parent_id), _.contains(["vc_column", "vc_column_inner"], parent.get("shortcode")) || parent.destroy()) : parent_id && (parent = vc.shortcodes.get(parent_id), parent && parent.view && parent.view.setActiveLayoutButton && parent.view.setActiveLayoutButton())))
		},
		remove: function() {
			this.$content && this.$content.data("uiSortable") && this.$content.sortable("destroy"), this.$content && this.$content.data("uiDroppable") && this.$content.droppable("destroy"), delete vc.app.views[this.model.id], window.VcColumnView.__super__.remove.call(this)
		}
	});


	/* Custom Split Box Column Inner */
	window.VcOhioSplitBoxColumnInnerView = vc.shortcode_view.extend({
		events: {
			'click > .vc_controls [data-vc-control="add"]': "addElement",
			"click > .wpb_element_wrapper > .vc_empty-container": "addToEmpty"
		},
		current_column_width: !1,
		initialize: function(options) {
			window.VcOhioSplitBoxColumnInnerView.__super__.initialize.call(this, options), _.bindAll(this, "setDropable", "dropButton")
		},
		ready: function(e) {
			return window.VcOhioSplitBoxColumnInnerView.__super__.ready.call(this, e), this.setDropable(), this
		},
		render: function() {
			return window.VcOhioSplitBoxColumnInnerView.__super__.render.call(this), this.current_column_width = this.model.get("params").width || "1/1", this.$el.attr("data-width", this.current_column_width), this.setEmpty(), this
		},
		changeShortcodeParams: function(model) {
			window.VcOhioSplitBoxColumnInnerView.__super__.changeShortcodeParams.call(this, model), this.setColumnClasses(), this.buildDesignHelpers()
		},
		designHelpersSelector: "> .vc_controls .column_add",
		buildDesignHelpers: function() {
			var matches, image, color, css = this.model.getParam("css"),
				$column_toggle = this.$el.find(this.designHelpersSelector).get(0);
			this.$el.find("> .vc_controls .vc_column_color").remove(), this.$el.find("> .vc_controls .vc_column_image").remove(), matches = css.match(/background\-image:\s*url\(([^\)]+)\)/), matches && !_.isUndefined(matches[1]) && (image = matches[1]), matches = css.match(/background\-color:\s*([^\s\;]+)\b/), matches && !_.isUndefined(matches[1]) && (color = matches[1]), matches = css.match(/background:\s*([^\s]+)\b\s*url\(([^\)]+)\)/), matches && !_.isUndefined(matches[1]) && (color = matches[1], image = matches[2]), image && jQuery('<span class="vc_column_image" style="background-image: url(' + image + ');" title="' + i18nLocale.column_background_image + '"></span>').insertBefore($column_toggle), color && jQuery('<span class="vc_column_color" style="background-color: ' + color + '" title="' + i18nLocale.column_background_color + '"></span>').insertBefore($column_toggle)
		},
		setColumnClasses: function() {
			var current_css_class_width, offset = this.model.getParam("offset") || "",
				width = this.model.getParam("width") || "1/1",
				css_class_width = this.convertSize(width);
			this.current_offset_class && this.$el.removeClass(this.current_offset_class), this.current_column_width !== width && (current_css_class_width = this.convertSize(this.current_column_width), this.$el.attr("data-width", width).removeClass(current_css_class_width).addClass(css_class_width), this.current_column_width = width), offset.match(/vc_col\-sm\-\d+/) && this.$el.removeClass(css_class_width), _.isEmpty(offset) || this.$el.addClass(offset), this.current_offset_class = offset
		},
		addToEmpty: function(e) {
			e.preventDefault(), jQuery(e.target).hasClass("vc_empty-container") && this.addElement(e)
		},
		setDropable: function() {
			return this.$content.droppable({
				greedy: !0,
				accept: "vc_column_inner" === this.model.get("shortcode") ? ".dropable_el" : ".dropable_el,.dropable_row",
				hoverClass: "wpb_ui-state-active",
				drop: this.dropButton
			}), this
		},
		dropButton: function(event, ui) {
			ui.draggable.is("#wpb-add-new-element") ? new vc.element_block_view({
				model: {
					position_to_add: "end"
				}
			}).show(this) : ui.draggable.is("#wpb-add-new-row") && this.createRow()
		},
		setEmpty: function() {
			this.$el.addClass("vc_empty-column"), "edit" !== vc_user_access().getState("shortcodes") && this.$content.addClass("vc_empty-container")
		},
		unsetEmpty: function() {
			this.$el.removeClass("vc_empty-column"), this.$content.removeClass("vc_empty-container")
		},
		checkIsEmpty: function() {
			vc.shortcodes.where({
				parent_id: this.model.id
			}).length ? this.unsetEmpty() : this.setEmpty(), window.VcOhioSplitBoxColumnInnerView.__super__.checkIsEmpty.call(this)
		},
		createRow: function() {
			var row_params, column_params, row;
			return row_params = {}, "undefined" != typeof window.vc_settings_presets.vc_row_inner && (row_params = _.extend(row_params, window.vc_settings_presets.vc_row_inner)), column_params = {
				width: "1/1"
			}, "undefined" != typeof window.vc_settings_presets.vc_column_inner && (column_params = _.extend(column_params, window.vc_settings_presets.vc_column_inner)), row = Shortcodes.create({
				shortcode: "vc_row_inner",
				params: row_params,
				parent_id: this.model.id
			}), vc.shortcodes.create({
				shortcode: "vc_column_inner",
				params: column_params,
				parent_id: row.id
			}), row
		},
		convertSize: function(width) {
			var prefix = "vc_col-sm-",
				numbers = width ? width.split("/") : [1, 1],
				range = _.range(1, 13),
				num = !_.isUndefined(numbers[0]) && 0 <= _.indexOf(range, parseInt(numbers[0], 10)) ? parseInt(numbers[0], 10) : !1,
				dev = !_.isUndefined(numbers[1]) && 0 <= _.indexOf(range, parseInt(numbers[1], 10)) ? parseInt(numbers[1], 10) : !1;
			return !1 !== num && !1 !== dev ? prefix + 12 * num / dev : prefix + "12"
		},
		deleteShortcode: function(e) {
			return false;
			/*var parent, parent_id = this.model.get("parent_id");
			_.isObject(e) && e.preventDefault();
			var answer = confirm(window.i18nLocale.press_ok_to_delete_section);
			return !0 !== answer ? !1 : (this.model.destroy(), void(parent_id && !vc.shortcodes.where({
				parent_id: parent_id
			}).length ? (parent = vc.shortcodes.get(parent_id), _.contains(["vc_column", "vc_column_inner"], parent.get("shortcode")) || parent.destroy()) : parent_id && (parent = vc.shortcodes.get(parent_id), parent && parent.view && parent.view.setActiveLayoutButton && parent.view.setActiveLayoutButton())))
		*/},
		remove: function() {
			return false;
			/*this.$content && this.$content.data("uiSortable") && this.$content.sortable("destroy"), this.$content && this.$content.data("uiDroppable") && this.$content.droppable("destroy"), delete vc.app.views[this.model.id], window.VcColumnView.__super__.remove.call(this)
		*/}
	});


	/* Custom Split Box Column */
	window.VcOhioSplitBoxColumnView = vc.shortcode_view.extend({
		events: {
			'click > .vc_controls [data-vc-control="delete"]': "deleteShortcode",
			'click > .vc_controls [data-vc-control="edit"]': "editElement",
			'click > .vc_controls [data-vc-control="clone"]': "clone"
		},
		current_column_width: !1,
		initialize: function(options) {
			window.VcOhioSplitBoxColumnView.__super__.initialize.call(this, options), _.bindAll(this, "setDropable", "dropButton")
		},
		ready: function(e) {
			return window.VcOhioSplitBoxColumnView.__super__.ready.call(this, e), this.setDropable(), this
		},
		render: function() {
			return window.VcOhioSplitBoxColumnView.__super__.render.call(this), this.current_column_width = this.model.get("params").width || "1/1", this.$el.attr("data-width", this.current_column_width), this.setEmpty(), this
		},
		changeShortcodeParams: function(model) {
			window.VcOhioSplitBoxColumnView.__super__.changeShortcodeParams.call(this, model), this.setColumnClasses(), this.buildDesignHelpers()
		},
		designHelpersSelector: "> .vc_controls .column_add",
		buildDesignHelpers: function() {
			var matches, image, color, css = this.model.getParam("css"),
				$column_toggle = this.$el.find(this.designHelpersSelector).get(0);
			this.$el.find("> .vc_controls .vc_column_color").remove(), this.$el.find("> .vc_controls .vc_column_image").remove(), matches = css.match(/background\-image:\s*url\(([^\)]+)\)/), matches && !_.isUndefined(matches[1]) && (image = matches[1]), matches = css.match(/background\-color:\s*([^\s\;]+)\b/), matches && !_.isUndefined(matches[1]) && (color = matches[1]), matches = css.match(/background:\s*([^\s]+)\b\s*url\(([^\)]+)\)/), matches && !_.isUndefined(matches[1]) && (color = matches[1], image = matches[2]), image && jQuery('<span class="vc_column_image" style="background-image: url(' + image + ');" title="' + i18nLocale.column_background_image + '"></span>').insertBefore($column_toggle), color && jQuery('<span class="vc_column_color" style="background-color: ' + color + '" title="' + i18nLocale.column_background_color + '"></span>').insertBefore($column_toggle)
		},
		setColumnClasses: function() {
			var current_css_class_width, offset = this.model.getParam("offset") || "",
				width = this.model.getParam("width") || "1/1",
				css_class_width = this.convertSize(width);
			this.current_offset_class && this.$el.removeClass(this.current_offset_class), this.current_column_width !== width && (current_css_class_width = this.convertSize(this.current_column_width), this.$el.attr("data-width", width).removeClass(current_css_class_width).addClass(css_class_width), this.current_column_width = width), offset.match(/vc_col\-sm\-\d+/) && this.$el.removeClass(css_class_width), _.isEmpty(offset) || this.$el.addClass(offset), this.current_offset_class = offset
		},
		addToEmpty: function(e) {
			return false;
		},
		addElement: function(e) {
			return false;
		},
		setDropable: function() {
			return this.$content.droppable({
				greedy: !0,
				accept: "vc_column_inner" === this.model.get("shortcode") ? ".dropable_el" : ".dropable_el,.dropable_row",
				hoverClass: "wpb_ui-state-active",
				drop: this.dropButton
			}), this
		},
		dropButton: function(event, ui) {
			ui.draggable.is("#wpb-add-new-element") ? new vc.element_block_view({
				model: {
					position_to_add: "end"
				}
			}).show(this) : ui.draggable.is("#wpb-add-new-row") && this.createRow()
		},
		setEmpty: function() {
			this.$el.addClass("vc_empty-column"), "edit" !== vc_user_access().getState("shortcodes") && this.$content.addClass("vc_empty-container")
		},
		unsetEmpty: function() {
			this.$el.removeClass("vc_empty-column"), this.$content.removeClass("vc_empty-container")
		},
		checkIsEmpty: function() {
			vc.shortcodes.where({
				parent_id: this.model.id
			}).length ? this.unsetEmpty() : this.setEmpty(), window.VcOhioSplitBoxColumnView.__super__.checkIsEmpty.call(this)
		},
		createRow: function() {
			var row_params, column_params, row;
			return row_params = {}, "undefined" != typeof window.vc_settings_presets.vc_row_inner && (row_params = _.extend(row_params, window.vc_settings_presets.vc_row_inner)), column_params = {
				width: "1/1"
			}, "undefined" != typeof window.vc_settings_presets.vc_column_inner && (column_params = _.extend(column_params, window.vc_settings_presets.vc_column_inner)), row = Shortcodes.create({
				shortcode: "vc_row_inner",
				params: row_params,
				parent_id: this.model.id
			}), vc.shortcodes.create({
				shortcode: "vc_column_inner",
				params: column_params,
				parent_id: row.id
			}), row
		},
		convertSize: function(width) {
			var prefix = "vc_col-sm-",
				numbers = width ? width.split("/") : [1, 1],
				range = _.range(1, 13),
				num = !_.isUndefined(numbers[0]) && 0 <= _.indexOf(range, parseInt(numbers[0], 10)) ? parseInt(numbers[0], 10) : !1,
				dev = !_.isUndefined(numbers[1]) && 0 <= _.indexOf(range, parseInt(numbers[1], 10)) ? parseInt(numbers[1], 10) : !1;
			return !1 !== num && !1 !== dev ? prefix + 12 * num / dev : prefix + "12"
		},
		deleteShortcode: function(e) {
			var parent, parent_id = this.model.get("parent_id");
			_.isObject(e) && e.preventDefault();
			var answer = confirm(window.i18nLocale.press_ok_to_delete_section);
			return !0 !== answer ? !1 : (this.model.destroy(), void(parent_id && !vc.shortcodes.where({
				parent_id: parent_id
			}).length ? (parent = vc.shortcodes.get(parent_id), _.contains(["vc_column", "vc_column_inner"], parent.get("shortcode")) || parent.destroy()) : parent_id && (parent = vc.shortcodes.get(parent_id), parent && parent.view && parent.view.setActiveLayoutButton && parent.view.setActiveLayoutButton())))
		},
		remove: function() {
			this.$content && this.$content.data("uiSortable") && this.$content.sortable("destroy"), this.$content && this.$content.data("uiDroppable") && this.$content.droppable("destroy"), delete vc.app.views[this.model.id], window.VcColumnView.__super__.remove.call(this)
		}
	});

	if (window.VcBackendTtaViewInterface) {
		/* Custom Tabs Inner */
		window.VcOhioBackendTtaTabsView = window.VcBackendTtaViewInterface.extend({
			sortableSelector: "> [data-vc-tab]",
			sortableSelectorCancel: ".vc-non-draggable-container",
			sortablePlaceholderClass: "vc_placeholder-tta-tab",
			navigationSectionTemplate: null,
			navigationSectionTemplateParsed: null,
			$navigationSectionAdd: null,
			sortingPlaceholder: "vc_placeholder-tab vc_tta-tab",
			render: function() {
				return window.VcOhioBackendTtaTabsView.__super__.render.call(this), this.$navigation = this.$el.find("> .wpb_element_wrapper .vc_tta-tabs-list"), this.$sortable = this.$navigation, this.$navigationSectionAdd = this.$navigation.children(".vc_tta-tab:first-child"), this.setNavigationSectionTemplate(this.$navigationSectionAdd.prop("outerHTML")), vc_user_access().shortcodeAll("vc_tta_section") ? this.$navigationSectionAdd.addClass("vc_tta-section-append").removeAttr("data-vc-target-model-id").removeAttr("data-vc-tab").find("[data-vc-target]").html('<i class="vc_tta-controls-icon vc_tta-controls-icon-plus"></i>').removeAttr("data-vc-tabs").removeAttr("data-vc-target").removeAttr("data-vc-target-model-id").removeAttr("data-vc-toggle") : this.$navigationSectionAdd.hide(), this
			},
			setNavigationSectionTemplate: function(html) {
				this.navigationSectionTemplate = html, this.navigationSectionTemplateParsed = vc.template(this.navigationSectionTemplate, vc.templateOptions.custom)
			},
			getNavigationSectionTemplate: function() {
				return this.navigationSectionTemplate
			},
			getParsedNavigationSectionTemplate: function(data) {
				return this.navigationSectionTemplateParsed(data)
			},
			changeNavigationSectionTitle: function(modelId, title) {
				this.findNavigationTab(modelId).find("[data-vc-target]").text(title)
			},
			changeActiveSection: function(modelId) {
				window.VcOhioBackendTtaTabsView.__super__.changeActiveSection.call(this, modelId), this.$navigation.children("." + this.activeClass).removeClass(this.activeClass), this.findNavigationTab(modelId).addClass(this.activeClass)
			},
			notifySectionRendered: function(model) {
				var $element, title, $insertAfter, clonedFrom;
				window.VcOhioBackendTtaTabsView.__super__.notifySectionRendered.call(this, model), title = model.getParam("title"), $element = jQuery(this.getParsedNavigationSectionTemplate({
					model_id: model.get("id"),
					section_title: _.isString(title) && 0 < title.length ? title : this.defaultSectionTitle
				})), model.get("cloned") ? (clonedFrom = model.get("cloned_from"), _.isObject(clonedFrom) && ($insertAfter = this.$navigation.children('[data-vc-target-model-id="' + clonedFrom.id + '"]'), $insertAfter.length ? $element.insertAfter($insertAfter) : $element.insertBefore(this.$navigation.children(".vc_tta-section-append")))) : model.get("prepend") ? $element.insertBefore(this.$navigation.children(":first-child")) : $element.insertBefore(this.$navigation.children(":last-child"))
			},
			notifySectionChanged: function(model) {
				var title;
				window.VcOhioBackendTtaTabsView.__super__.notifySectionChanged.call(this, model), title = model.getParam("title"), _.isString(title) && title.length || (title = this.defaultSectionTitle), this.changeNavigationSectionTitle(model.get("id"), title), model.view.$el.find("> .wpb_element_wrapper > .vc_tta-panel-body > .vc_controls .vc_element-name").removeClass("vc_element-move")
			},
			makeFirstSectionActive: function() {
				var $tab;
				$tab = this.$navigation.children(":first-child:not(.vc_tta-section-append)").addClass(this.activeClass), $tab.length && this.findSection($tab.data("vc-target-model-id")).addClass(this.activeClass)
			},
			findNavigationTab: function(modelId) {
				return this.$navigation.children('[data-vc-target-model-id="' + modelId + '"]')
			},
			addSection: function(prepend) {
				var newTabTitle, params, shortcode;
				return newTabTitle = this.defaultSectionTitle, params = {
					shortcode: "ohio_tabs_inner",
					params: {
						title: newTabTitle
					},
					parent_id: this.model.get("id"),
					order: _.isBoolean(prepend) && prepend ? vc.add_element_block_view.getFirstPositionIndex() : vc.shortcodes.getNextOrder(),
					prepend: prepend
				}, shortcode = vc.shortcodes.create(params)
			},
			removeSection: function(model) {
				var $viewTab, $nextTab, tabIsActive;
				$viewTab = this.findNavigationTab(model.get("id")), tabIsActive = $viewTab.hasClass(this.activeClass), tabIsActive && ($nextTab = this.getNextTab($viewTab), $nextTab.addClass(this.activeClass), this.changeActiveSection($nextTab.data("vc-target-model-id"))), $viewTab.remove()
			},
			renderSortingPlaceholder: function(event, currentItem) {
				var helper, currentItemWidth, currentItemHeight;
				return helper = currentItem, currentItemWidth = currentItem.width() + 1, currentItemHeight = currentItem.height(), helper.width(currentItemWidth), helper.height(currentItemHeight), helper
			}
		});


		/* Custom VC Accordion */
		window.VcOhioBackendTtaAccordionView = VcBackendTtaViewInterface.extend({
			sortableSelector: "> .vc_tta-panel:not(.vc_tta-section-append)",
			sortableSelectorCancel: ".vc-non-draggable",
			sortableUpdateModelIdSelector: "data-model-id",
			defaultSectionTitle: window.i18nLocale.section,
			render: function() {
				return window.VcBackendTtaTabsView.__super__.render.call(this), this.$navigation = this.$content, this.$sortable = this.$content, vc_user_access().shortcodeAll("vc_tta_section") || this.$content.find(".vc_tta-section-append").hide(), this
			},
			removeSection: function(model) {
				var $viewTab, $nextTab, tabIsActive;
				$viewTab = this.findSection(model.get("id")), tabIsActive = $viewTab.hasClass(this.activeClass), tabIsActive && ($nextTab = this.getNextTab($viewTab), $nextTab.addClass(this.activeClass))
			},
			addSection: function(prepend) {
				var newTabTitle, params, shortcode;
				return newTabTitle = this.defaultSectionTitle, params = {
					shortcode: "ohio_accordion_inner",
					params: {
						title: newTabTitle
					},
					parent_id: this.model.get("id"),
					order: _.isBoolean(prepend) && prepend ? vc.add_element_block_view.getFirstPositionIndex() : vc.shortcodes.getNextOrder(),
					prepend: prepend
				}, shortcode = vc.shortcodes.create(params)
			},
			addShortcode: function(view) {
				var beforeShortcode;
				beforeShortcode = _.last(vc.shortcodes.filter(function(shortcode) {
					return shortcode.get("parent_id") === this.get("parent_id") && parseFloat(shortcode.get("order")) < parseFloat(this.get("order"))
				}, view.model)), beforeShortcode ? view.render().$el.insertAfter("[data-model-id=" + beforeShortcode.id + "]") : this.$content.prepend(view.render().el)
			}
		});


		/* Custom VC Horizontal Accordion */
		window.VcOhioBackendTtaHorizontalAccordionView = VcBackendTtaViewInterface.extend({
			sortableSelector: "> .vc_tta-panel:not(.vc_tta-section-append)",
			sortableSelectorCancel: ".vc-non-draggable",
			sortableUpdateModelIdSelector: "data-model-id",
			defaultSectionTitle: window.i18nLocale.section,
			render: function() {
				return window.VcOhioBackendTtaHorizontalAccordionView.__super__.render.call(this), this.$navigation = this.$content, this.$sortable = this.$content, vc_user_access().shortcodeAll("vc_tta_section") || this.$content.find(".vc_tta-section-append").hide(), this
			},
			removeSection: function(model) {
				var $viewTab, $nextTab, tabIsActive;
				$viewTab = this.findSection(model.get("id")), tabIsActive = $viewTab.hasClass(this.activeClass), tabIsActive && ($nextTab = this.getNextTab($viewTab), $nextTab.addClass(this.activeClass))
			},
			addSection: function(prepend) {
				var newTabTitle, params, shortcode;
				return newTabTitle = this.defaultSectionTitle, params = {
					shortcode: "ohio_horizontal_accordion_inner",
					params: {
						title: newTabTitle
					},
					parent_id: this.model.get("id"),
					order: _.isBoolean(prepend) && prepend ? vc.add_element_block_view.getFirstPositionIndex() : vc.shortcodes.getNextOrder(),
					prepend: prepend
				}, shortcode = vc.shortcodes.create(params)
			},
			addShortcode: function(view) {
				var beforeShortcode;
				beforeShortcode = _.last(vc.shortcodes.filter(function(shortcode) {
					return shortcode.get("parent_id") === this.get("parent_id") && parseFloat(shortcode.get("order")) < parseFloat(this.get("order"))
				}, view.model)), beforeShortcode ? view.render().$el.insertAfter("[data-model-id=" + beforeShortcode.id + "]") : this.$content.prepend(view.render().el)
			}
		});


		/* Custom Carousel Inner */
		window.VcOhioBackendTtaSliderView = window.VcBackendTtaViewInterface.extend({
			sortableSelector: "> [data-vc-tab]",
			sortableSelectorCancel: ".vc-non-draggable-container",
			sortablePlaceholderClass: "vc_placeholder-tta-tab",
			navigationSectionTemplate: null,
			navigationSectionTemplateParsed: null,
			$navigationSectionAdd: null,
			sortingPlaceholder: "vc_placeholder-tab vc_tta-tab",
			defaultSectionTitle: "Section",
			render: function() {
				return window.VcOhioBackendTtaSliderView.__super__.render.call(this), this.$navigation = this.$el.find("> .wpb_element_wrapper .vc_tta-tabs-list"), this.$sortable = this.$navigation, this.$navigationSectionAdd = this.$navigation.children(".vc_tta-tab:first-child"), this.setNavigationSectionTemplate(this.$navigationSectionAdd.prop("outerHTML")), vc_user_access().shortcodeAll("vc_tta_section") ? this.$navigationSectionAdd.addClass("vc_tta-section-append").removeAttr("data-vc-target-model-id").removeAttr("data-vc-tab").find("[data-vc-target]").html('<i class="vc_tta-controls-icon vc_tta-controls-icon-plus"></i>').removeAttr("data-vc-tabs").removeAttr("data-vc-target").removeAttr("data-vc-target-model-id").removeAttr("data-vc-toggle") : this.$navigationSectionAdd.hide(), this
			},
			setNavigationSectionTemplate: function(html) {
				this.navigationSectionTemplate = html, this.navigationSectionTemplateParsed = vc.template(this.navigationSectionTemplate, vc.templateOptions.custom)
			},
			getNavigationSectionTemplate: function() {
				return this.navigationSectionTemplate
			},
			getParsedNavigationSectionTemplate: function(data) {
				return this.navigationSectionTemplateParsed(data)
			},
			changeNavigationSectionTitle: function(modelId, title) {
				this.findNavigationTab(modelId).find("[data-vc-target]").text(title)
			},
			changeActiveSection: function(modelId) {
				window.VcOhioBackendTtaSliderView.__super__.changeActiveSection.call(this, modelId), this.$navigation.children("." + this.activeClass).removeClass(this.activeClass), this.findNavigationTab(modelId).addClass(this.activeClass)
			},
			notifySectionRendered: function(model) {
				var $element, title, $insertAfter, clonedFrom;
				window.VcOhioBackendTtaSliderView.__super__.notifySectionRendered.call(this, model), title = model.getParam("title"), $element = jQuery(this.getParsedNavigationSectionTemplate({
					model_id: model.get("id"),
					section_title: _.isString(title) && 0 < title.length ? title : this.defaultSectionTitle
				})), model.get("cloned") ? (clonedFrom = model.get("cloned_from"), _.isObject(clonedFrom) && ($insertAfter = this.$navigation.children('[data-vc-target-model-id="' + clonedFrom.id + '"]'), $insertAfter.length ? $element.insertAfter($insertAfter) : $element.insertBefore(this.$navigation.children(".vc_tta-section-append")))) : model.get("prepend") ? $element.insertBefore(this.$navigation.children(":first-child")) : $element.insertBefore(this.$navigation.children(":last-child"))
			},
			notifySectionChanged: function(model) {
				var title;
				window.VcOhioBackendTtaSliderView.__super__.notifySectionChanged.call(this, model), title = model.getParam("title"), _.isString(title) && title.length || (title = this.defaultSectionTitle), this.changeNavigationSectionTitle(model.get("id"), title), model.view.$el.find("> .wpb_element_wrapper > .vc_tta-panel-body > .vc_controls .vc_element-name").removeClass("vc_element-move")
			},
			makeFirstSectionActive: function() {
				var $tab;
				$tab = this.$navigation.children(":first-child:not(.vc_tta-section-append)").addClass(this.activeClass), $tab.length && this.findSection($tab.data("vc-target-model-id")).addClass(this.activeClass)
			},
			findNavigationTab: function(modelId) {
				return this.$navigation.children('[data-vc-target-model-id="' + modelId + '"]')
			},
			addSection: function(prepend) {
				var newTabTitle, params, shortcode;
				return newTabTitle = this.defaultSectionTitle, params = {
					shortcode: "ohio_carousel_inner",
					params: {
						title: newTabTitle
					},
					parent_id: this.model.get("id"),
					order: _.isBoolean(prepend) && prepend ? vc.add_element_block_view.getFirstPositionIndex() : vc.shortcodes.getNextOrder(),
					prepend: prepend
				}, shortcode = vc.shortcodes.create(params)
			},
			removeSection: function(model) {
				var $viewTab, $nextTab, tabIsActive;
				$viewTab = this.findNavigationTab(model.get("id")), tabIsActive = $viewTab.hasClass(this.activeClass), tabIsActive && ($nextTab = this.getNextTab($viewTab), $nextTab.addClass(this.activeClass), this.changeActiveSection($nextTab.data("vc-target-model-id"))), $viewTab.remove()
			},
			renderSortingPlaceholder: function(event, currentItem) {
				var helper, currentItemWidth, currentItemHeight;
				return helper = currentItem, currentItemWidth = currentItem.width() + 1, currentItemHeight = currentItem.height(), helper.width(currentItemWidth), helper.height(currentItemHeight), helper
			}
		});
	} else {
		// todo: fix custom view in frontend editor
	}
}

})(jQuery);