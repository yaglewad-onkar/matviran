(function($){

	function create_new_typo_scope( $wrapper ) {
		var ohio_typo = {
			id: false,
			$wrapper: false,
			$hidden:  false,
			$data_size: false,
			$data_style: false,
			$data_color: false,
			$data_height: false,
			$data_weight: false,
			$data_spacing: false,
			$data_font_family: false,
			$data_font_variants: false,
			$data_font_subsets: false,

			initialize_fields: function() {
				this.id = this.$wrapper.find( '.ohio-acf-typo-field-content' ).attr( 'data-uniqid' );

				this.$hidden = this.$wrapper.find( 'input[type="hidden"]' );
				this.$inheritance_radio = this.$wrapper.find( '.typography_inheritance_row input[type="radio"]' );
				this.$data_size = this.$wrapper.find( 'input[name="typo-size"]' );
				this.$data_style = this.$wrapper.find( 'select[name="typo-style"]' );
				this.$data_color = this.$wrapper.find( 'input[name="typo-color"]' );
				this.$data_height = this.$wrapper.find( 'input[name="typo-height"]' );
				this.$data_weight = this.$wrapper.find( 'select[name="typo-weight"]' );
				this.$data_spacing = this.$wrapper.find( 'input[name="typo-spacing"]' );
				this.$data_font_family = this.$wrapper.find( 'select[name="typo-font-family"]' );
				this.$data_font_variants = this.$wrapper.find( '.variants_value' );
				this.$data_font_subsets = this.$wrapper.find( '.subsets_value' );

				var that = this;
				this.$data_size.on('change', function() { that.update_hidden(); } );
				this.$data_style.on('change', function() { that.update_hidden(); } );
				this.$data_color.on('change', function() { that.update_hidden(); } );
				setTimeout( function() {
					that.$cleaner = that.$wrapper.find( '.wp-picker-clear' );
					that.$cleaner.on( 'click', function() { that.$data_color.trigger( 'change' ); } );
				}, 1000);
				this.$data_height.on('change', function() { that.update_hidden(); } );
				this.$data_weight.on('change', function() { that.update_hidden(); } );
				this.$data_spacing.on('change', function() { that.update_hidden(); } );
				this.$data_font_variants.on( 'change', 'input[type="checkbox"]', function() { that.update_hidden(); } );
				this.$data_font_subsets.on( 'change', 'input[type="checkbox"]', function() { that.update_hidden(); } );

				this.$data_font_family.on('change', function() {
					var selected_font = $(this).val();
					$(this).blur();
					if ( selected_font ) {
						that.font_selector_blocker( true );
						jQuery.post( ajaxurl, {
							'action': 'ohio_get_font',
							'font_family': selected_font
						}, function( response ) {
							if ( response ) {
								that.update_font( JSON.parse( response ) );
							}
							that.font_selector_blocker( false );
							that.update_hidden();
						} );
					} else {
						that.update_font();
						that.update_hidden();
					}
				} );

				this.$inheritance_radio.on('change',function() {
					if ( $(this).val() == 'inherit' ) {
						that.$wrapper.find('.row').hide();
						that.$hidden.val( 'inherit' );
					} else {
						that.$wrapper.find('.row').show();
						that.update_hidden();
					}
				});
			},

			serialize_fields: function() {
				var result = {};
				if ( this.$data_size.val() ) { result.size = this.$data_size.val(); }
				if ( this.$data_style.val() ) { result.style = this.$data_style.val(); }
				if ( this.$data_color.val() ) { result.color = this.$data_color.val(); }
				if ( this.$data_height.val() ) { result.height = this.$data_height.val(); }
				if ( this.$data_weight.val() ) { result.weight = this.$data_weight.val(); }
				if ( this.$data_spacing.val() ) { result.spacing = this.$data_spacing.val(); }
				if ( this.$data_font_family.val() ) {
					result.font_family = this.$data_font_family.val();
					this.$data_font_variants.find( 'input[type="checkbox"]' ).each( function() {
						if ( $(this).is( ':checked' ) ) {
							if ( result.font_variants == undefined ) {
								result.font_variants = [ $(this).attr( 'name' ) ];
							} else {
								result.font_variants.push( $(this).attr( 'name' ) );
							}
						}
					} );
					this.$data_font_subsets.find( 'input[type="checkbox"]' ).each( function() {
						if ( $(this).is( ':checked' ) ) {
							if ( result.font_subsets == undefined ) {
								result.font_subsets = [ $(this).attr( 'name' ) ];
							} else {
								result.font_subsets.push( $(this).attr( 'name' ) );
							}
						}
					} );
				}
				return JSON.stringify( result );
			},

			update_hidden: function() {
				var fields_json = this.serialize_fields();
				this.$hidden.val( fields_json );
			},

			update_font: function( font_object ) {
				if ( font_object ) {
					// prepare font preview
					$( 'link#' + this.id ).remove();

					var font_link  = document.createElement( 'link' );
					font_link.type = 'text/css';
					font_link.id   = this.id;
					font_link.rel  = 'stylesheet';

					if (inputVariables.typoType == 'google_fonts') {
						font_link.href = inputVariables.typoLink + font_object.family.replace( /\s/, '+' );
					}
                    if (inputVariables.typoType == 'adobe_fonts') {
                        font_link.href = inputVariables.typoLink;
                    }

                    $( 'head' ).append( $( font_link ) );
					this.$wrapper.find( '.font-preview' ).attr( 'style', 'font-family: \'' + font_object.family + '\';' ).show();

					// prepare variants
					var variants_layout = '';
					for (var i = font_object.variants.length - 1; i >= 0; i--) {
						variants_layout += '<div class="checkbox_row">';
						variants_layout += '<label><input type="checkbox" name="' + font_object.variants[ i ] + '" checked> ';
						variants_layout += font_object.variants[ i ];
						variants_layout += '</label>';
						variants_layout += '</div>';
					}
					this.$wrapper.find( '.checkboxes.variants_value' ).html( variants_layout );

					// prepare subsets
					var subsets_layout = '';
					for (var i = font_object.subsets.length - 1; i >= 0; i--) {
						subsets_layout += '<div class="checkbox_row">';
						subsets_layout += '<label><input type="checkbox" name="' + font_object.subsets[ i ] + '" checked> ';
						subsets_layout += font_object.subsets[ i ];
						subsets_layout += '</label>';
						subsets_layout += '</div>';
					}
					this.$wrapper.find( '.checkboxes.subsets_value' ).html( subsets_layout );

					// fallback animation for from-empty-to-filled effect
					this.$wrapper.find( '.checkboxes' ).slideDown( 250 );
					this.$wrapper.find( '.no_content' ).hide();
				} else {
					// clear
					this.$wrapper.find( '.font-preview' ).slideUp( 250 );
					this.$wrapper.find( '.no_content' ).slideDown( 250 );
					this.$wrapper.find( '.checkboxes' ).hide().html( '' );
				}
			},

			font_selector_blocker: function( show ) {
				if ( show ) {
					this.$wrapper.find('.font-picker .pick_blocker').fadeIn( 250 );
				} else {
					this.$wrapper.find('.font-picker .pick_blocker').fadeOut( 250 );
				}
			}
		}

		ohio_typo.$wrapper = $wrapper;

		return ohio_typo;
	}

	if( typeof acf.add_action !== 'undefined' ) {
		acf.add_action('ready append', function( $el ){
			acf.get_fields( { type : 'ohio_typo' }, $el ).each( function(){
				var ohio_typo = create_new_typo_scope( $( this ) );
				ohio_typo.initialize_fields();
			} );
		});
	} else {
		$(document).on( 'acf/setup_fields', function( e, postbox ){
			$( postbox ).find('.field[data-field_type="ohio_typo"]').each( function(){
				var ohio_typo = create_new_typo_scope( $( this ) );
				ohio_typo.initialize_fields();
			} );
		});
	}

})(jQuery);



/*
	ohio color picker
*/

(function($){

	function create_new_color_scope( $wrapper ) {
		var ohio_color = {
			id: false,
			$wrapper: false,
			$hidden:  false,
			$data_color: false,

			initialize_fields: function() {
				this.id = this.$wrapper.find( '.ohio-acf-color-field-content' ).attr( 'data-uniqid' );
				this.$hidden = this.$wrapper.find( 'input[type="hidden"]' );
				this.$data_color = this.$wrapper.find( 'input[name="color"]' );

				var that = this;
				setTimeout( function() {
					that.$cleaner = that.$wrapper.find( '.wp-picker-clear' );
					that.$cleaner.on( 'click', function() { that.$data_color.trigger( 'change' ); } );
				}, 1000);
				this.$data_color.on('change', function() { that.update_hidden(); } );
			},

			serialize_fields: function() {
				return ( this.$data_color.val() ) ? this.$data_color.val() : '';
			},

			update_hidden: function() {
				var fields = this.serialize_fields();
				this.$hidden.val( fields );
			},
		}

		ohio_color.$wrapper = $wrapper;

		return ohio_color;
	}



	if( typeof acf.add_action !== 'undefined' ) {
		acf.add_action( 'ready append', function( $el ){
			acf.get_fields( { type : 'ohio_color' }, $el ).each( function(){
				var ohio_color = create_new_color_scope( $( this ) );
				ohio_color.initialize_fields();
			} );
		});
	} else {
		$(document).on( 'acf/setup_fields', function( e, postbox ){
			$( postbox ).find('.field[data-field_type="ohio_color"]').each( function(){
				var ohio_color = create_new_color_scope( $( this ) );
				ohio_color.initialize_fields();
			} );
		});
	}

})(jQuery);


/*
	ohio columns
*/

(function($){

	function create_new_columns_scope( $wrapper ) {
		var ohio_columns = {
			id: false,
			$wrapper: false,
			$hidden:  false,
			large: false,
			medium: false,
			small: false,

			initialize_fields: function() {
				this.id = this.$wrapper.find( '.ohio-acf-columns-field-content' ).attr( 'data-uniqid' );
				this.$hidden = this.$wrapper.find( 'input[type="hidden"]' );

				this.large = this.$wrapper.find( 'select[name="large"]' );
				this.medium = this.$wrapper.find( 'select[name="medium"]' );
				this.small = this.$wrapper.find( 'select[name="small"]' );

				var self = this;
				$([
					this.large[0],
					this.medium[0],
					this.small[0]
				]).on('change', function(){ self.update_hidden() } );
			},

			serialize_fields: function() {
				return this.large.val() + '-' + this.medium.val() + '-' + this.small.val();
			},

			update_hidden: function() {
				var fields = this.serialize_fields();
				this.$hidden.val( fields );
			},
		}

		ohio_columns.$wrapper = $wrapper;

		return ohio_columns;
	}



	if( typeof acf.add_action !== 'undefined' ) {
		acf.add_action( 'ready append', function( $el ){
			acf.get_fields( { type : 'ohio_columns' }, $el ).each( function(){
				var ohio_columns = create_new_columns_scope( $( this ) );
				ohio_columns.initialize_fields();
			} );
		});
	} else {
		$(document).on( 'acf/setup_fields', function( e, postbox ){
			$( postbox ).find('.field[data-field_type="ohio_columns"]').each( function(){
				var ohio_columns = create_new_columns_scope( $( this ) );
				ohio_columns.initialize_fields();
			} );
		});
	}

})(jQuery);

/*
	ohio columns
*/

(function($){

	function create_new_columns_scope( $wrapper ) {
		var ohio_columns = {
			id: false,
			$wrapper: false,
			$hidden:  false,
			large: false,
			medium: false,
			small: false,

			initialize_fields: function() {
				this.id = this.$wrapper.find( '.ohio-acf-ecommerce-columns-field-content' ).attr( 'data-uniqid' );
				this.$hidden = this.$wrapper.find( 'input[type="hidden"]' );

				this.large = this.$wrapper.find( 'select[name="large"]' );
				this.medium = this.$wrapper.find( 'select[name="medium"]' );
				this.small = this.$wrapper.find( 'select[name="small"]' );
				var self = this;
				$([
					this.large[0],
					this.medium[0],
					this.small[0]
				]).on('change', function(){ self.update_hidden() } );
			},

			serialize_fields: function() {
				return JSON.stringify({
					large: this.large.val(),
					medium: this.medium.val(),
					small: this.small.val()
				});
			},

			update_hidden: function() {
				var fields = this.serialize_fields();
				this.$hidden.val( fields );
			},
		}

		ohio_columns.$wrapper = $wrapper;

		return ohio_columns;
	}



	if( typeof acf.add_action !== 'undefined' ) {
		acf.add_action( 'ready append', function( $el ){
			acf.get_fields( { type : 'ohio_ecommerce_columns' }, $el ).each( function(){
				var ohio_columns = create_new_columns_scope( $( this ) );
				ohio_columns.initialize_fields();
			} );
		});
	} else {
		$(document).on( 'acf/setup_fields', function( e, postbox ){
			$( postbox ).find('.field[data-field_type="ohio_ecommerce_columns"]').each( function(){
				var ohio_columns = create_new_columns_scope( $( this ) );
				ohio_columns.initialize_fields();
			} );
		});
	}

})(jQuery);




/*
	ohio responsive height
*/

(function($){

	function create_new_responsive_height_scope( $wrapper ) {
		var ohio_responsive_height = {
			id: false,
			$wrapper: false,
			$hidden:  false,
			desktop: false,
			tablet: false,
			mobile: false,

			initialize_fields: function() {
				this.id = this.$wrapper.find( '.ohio-acf-responsive_height-field-content' ).attr( 'data-uniqid' );
				this.$hidden = this.$wrapper.find( 'input[type="hidden"]' );

				this.desktop = this.$wrapper.find( 'input[name="desktop"]' );
				this.tablet = this.$wrapper.find( 'input[name="tablet"]' );
				this.mobile = this.$wrapper.find( 'input[name="mobile"]' );

				var self = this;
				$([
					this.desktop[0],
					this.tablet[0],
					this.mobile[0]
				]).on('change', function(){ self.update_hidden() } );
			},

			serialize_fields: function() {
				var desktop = this.desktop.val();
				var tablet = this.tablet.val();
				var mobile = this.mobile.val();

				if ( desktop || tablet || mobile ) {
					return this.desktop.val() + '-' + this.tablet.val() + '-' + this.mobile.val();
				} else {
					return '';
				}
			},

			update_hidden: function() {
				var fields = this.serialize_fields();
				this.$hidden.val( fields );
			},
		}

		ohio_responsive_height.$wrapper = $wrapper;

		return ohio_responsive_height;
	}



	if( typeof acf.add_action !== 'undefined' ) {
		acf.add_action( 'ready append', function( $el ){
			acf.get_fields( { type : 'ohio_responsive_height' }, $el ).each( function(){
				var ohio_responsive_height = create_new_responsive_height_scope( $( this ) );
				ohio_responsive_height.initialize_fields();
			} );
		});
	} else {
		$(document).on( 'acf/setup_fields', function( e, postbox ){
			$( postbox ).find('.field[data-field_type="ohio_responsive_height"]').each( function(){
				var ohio_responsive_height = create_new_responsive_height_scope( $( this ) );
				ohio_responsive_height.initialize_fields();
			} );
		});
	}

})(jQuery);


// Expand acf conditional logic for custom elemnts
// jQuery(function($){
// 	acf.conditional_logic.calculate = function( rule, $trigger, $target ){
//
// 		if( !$trigger || !$target ) return false;
//
// 		var match = false,
// 			type = $trigger.data('type');
//
// 		if( type == 'true_false' || type == 'checkbox' || type == 'radio' || type == 'button_group' ) {
// 			match = this.calculate_checkbox( rule, $trigger );
// 		} else if( type == 'select' ) {
// 			match = this.calculate_select( rule, $trigger );
// 		} else {
// 			match = this.calculate_custom( rule, $trigger );
// 		}
//
// 		if( rule.operator === "!=" ) {
// 			match = !match;
// 		}
//
// 		return match;
// 	};
//
// 	acf.conditional_logic.calculate_custom = function( rule, $trigger ){
//
// 		var $select = $trigger.find('input'),
// 			val = $select.val();
//
// 		if( !val && !$.isNumeric(val) ) {
// 			val = '';
// 		}
//
// 		if( !$.isArray(val) ) {
// 			val = [ val ];
// 		}
//
// 		match = ($.inArray(rule.value, val) > -1);
//
// 		return match;
// 	}
//
// 	acf.conditional_logic.render();
//
// });

/*
	ohio responsive font sizes
*/

(function($){

	function create_new_sizes_scope( $wrapper ) {
		var ohio_sizes = {
			id: false,
			$wrapper: false,
			$hidden:  false,
			$data_laptop_size: false,
			$data_tablet_size: false,
			$data_mobile_size: false,
			$data_laptop_height: false,
			$data_tablet_height: false,
			$data_mobile_height: false,

			initialize_fields: function() {
				this.id = this.$wrapper.find( '.ohio-acf-sizes-field-content' ).attr( 'data-uniqid' );

				this.$hidden = this.$wrapper.find( 'input[type="hidden"]' );
				this.$data_laptop_size = this.$wrapper.find( 'input[name="size-laptop"]' );
				this.$data_tablet_size = this.$wrapper.find( 'input[name="size-tablet"]' );
				this.$data_mobile_size = this.$wrapper.find( 'input[name="size-mobile"]' );
				this.$data_laptop_height = this.$wrapper.find( 'input[name="height-laptop"]' );
				this.$data_tablet_height = this.$wrapper.find( 'input[name="height-tablet"]' );
				this.$data_mobile_height = this.$wrapper.find( 'input[name="height-mobile"]' );

				var that = this;
				this.$data_laptop_size.on('change', function() { that.update_hidden(); } );
				this.$data_tablet_size.on('change', function() { that.update_hidden(); } );
				this.$data_mobile_size.on('change', function() { that.update_hidden(); } );
				this.$data_laptop_height.on('change', function() { that.update_hidden(); } );
				this.$data_tablet_height.on('change', function() { that.update_hidden(); } );
				this.$data_mobile_height.on('change', function() { that.update_hidden(); } );
			},

			serialize_fields: function() {
				var result = {};
				if ( this.$data_laptop_size.val() ) { result.laptop_size = this.$data_laptop_size.val(); }
				if ( this.$data_tablet_size.val() ) { result.tablet_size = this.$data_tablet_size.val(); }
				if ( this.$data_mobile_size.val() ) { result.mobile_size = this.$data_mobile_size.val(); }
				if ( this.$data_laptop_height.val() ) { result.laptop_height = this.$data_laptop_height.val(); }
				if ( this.$data_tablet_height.val() ) { result.tablet_height = this.$data_tablet_height.val(); }
				if ( this.$data_mobile_height.val() ) { result.mobile_height = this.$data_mobile_height.val(); }
				return JSON.stringify( result );
			},

			update_hidden: function() {
				var fields_json = this.serialize_fields();
				this.$hidden.val( fields_json );
			},
		}

		ohio_sizes.$wrapper = $wrapper;

		return ohio_sizes;
	}

	if( typeof acf.add_action !== 'undefined' ) {
		acf.add_action('ready append', function( $el ){
			acf.get_fields( { type : 'ohio_sizes' }, $el ).each( function(){
				var ohio_sizes = create_new_sizes_scope( $( this ) );
				ohio_sizes.initialize_fields();
			} );
		});
	} else {
		$(document).on( 'acf/setup_fields', function( e, postbox ){
			$( postbox ).find('.field[data-field_type="ohio_sizes"]').each( function(){
				var ohio_sizes = create_new_sizes_scope( $( this ) );
				ohio_sizes.initialize_fields();
			} );
		});
	}

})(jQuery);
