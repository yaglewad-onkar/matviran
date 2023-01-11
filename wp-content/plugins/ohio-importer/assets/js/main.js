jQuery( function ( $ ) {
	'use strict';

	/**
	 * ---------------------------------------
	 * ------------- Events ------------------
	 * ---------------------------------------
	 */

	/**
	 * No or Single predefined demo import button click.
	 */
	$( '.js-ocdi-import-data' ).on( 'click', function () {

		// Reset response div content.
		$( '.js-ocdi-ajax-response' ).empty();

		// Prepare data for the AJAX call
		var data = new FormData();
		data.append( 'action', 'ocdi_import_demo_data' );
		data.append( 'security', ocdi.ajax_nonce );
		data.append( 'selected', $( '#ocdi__demo-import-files' ).val() );
		if ( $('#ocdi__content-file-upload').length ) {
			data.append( 'content_file', $('#ocdi__content-file-upload')[0].files[0] );
		}
		if ( $('#ocdi__widget-file-upload').length ) {
			data.append( 'widget_file', $('#ocdi__widget-file-upload')[0].files[0] );
		}
		if ( $('#ocdi__customizer-file-upload').length ) {
			data.append( 'customizer_file', $('#ocdi__customizer-file-upload')[0].files[0] );
		}
		if ( $('#ocdi__redux-file-upload').length ) {
			data.append( 'redux_file', $('#ocdi__redux-file-upload')[0].files[0] );
			data.append( 'redux_option_name', $('#ocdi__redux-option-name').val() );
		}

		// AJAX call to import everything (content, widgets, before/after setup)
		ajaxCall( data );

	});


	/**
	 * Grid Layout import button click.
	 */
	$( '.js-ocdi-gl-import-data' ).on( 'click', function () {
		var selectedImportID = $( this ).val();
		var $itemContainer   = $( this ).closest( '.js-ocdi-gl-item' );


		// If the import confirmation is enabled, then do that, else import straight away.
		if ( ocdi.import_popup ) {
			// let purchase_code = ocdiGetCookie( 'theme_purchase_code' );

			if ( !window.has_license_code ) {
				showPurchasePopup( selectedImportID, $itemContainer );
			} else {
				displayConfirmationPopup( selectedImportID, $itemContainer );
			}
		}
		else {
			// gridLayoutImport( selectedImportID, $itemContainer );
		}
	});


	/**
	 * Grid Layout categories navigation.
	 */
	(function () {
		// Cache selector to all items
		var $items = $( '.js-ocdi-gl-item-container' ).find( '.js-ocdi-gl-item' ),
			fadeoutClass = 'ocdi-is-fadeout',
			fadeinClass = 'ocdi-is-fadein',
			animationDuration = 200;

		// Hide all items.
		var fadeOut = function () {
			var dfd = jQuery.Deferred();

			$items
				.addClass( fadeoutClass );

			setTimeout( function() {
				$items
					.removeClass( fadeoutClass )
					.hide();

				dfd.resolve();
			}, animationDuration );

			return dfd.promise();
		};

		var fadeIn = function ( category, dfd ) {
			var filter = category ? '[data-categories*="' + category + '"]' : 'div';

			if ( 'all' === category ) {
				filter = 'div';
			}

			$items
				.filter( filter )
				.show()
				.addClass( 'ocdi-is-fadein' );

			setTimeout( function() {
				$items
					.removeClass( fadeinClass );

				dfd.resolve();
			}, animationDuration );
		};

		var animate = function ( category ) {
			var dfd = jQuery.Deferred();

			var promise = fadeOut();

			promise.done( function () {
				fadeIn( category, dfd );
			} );

			return dfd;
		};

		$( '.js-ocdi-nav-link' ).on( 'click', function( event ) {
			event.preventDefault();

			// Remove 'active' class from the previous nav list items.
			$( this ).parent().siblings().removeClass( 'active' );

			// Add the 'active' class to this nav list item.
			$( this ).parent().addClass( 'active' );

			var category = this.hash.slice(1);

			// show/hide the right items, based on category selected
			//var $container = $( '.js-ocdi-gl-item-container' );
			//$container.css( 'min-width', $container.outerHeight() );

			var promise = animate( category );

			promise.done( function () {
				$container.removeAttr( 'style' );
			} );
		} );
	}());


	/**
	 * Grid Layout search functionality.
	 */
	$( '.js-ocdi-gl-search' ).on( 'keyup', function( event ) {
		if ( 0 < $(this).val().length ) {
			// Hide all items.
			$( '.js-ocdi-gl-item-container' ).find( '.js-ocdi-gl-item' ).hide();

			// Show just the ones that have a match on the import name.
			$( '.js-ocdi-gl-item-container' ).find( '.js-ocdi-gl-item[data-name*="' + $(this).val().toLowerCase() + '"]' ).show();
		}
		else {
			$( '.js-ocdi-gl-item-container' ).find( '.js-ocdi-gl-item' ).show();
		}
	} );

	/**
	 * ---------------------------------------
	 * --------Helper functions --------------
	 * ---------------------------------------
	 */

	/**
	 * Prepare grid layout import data and execute the AJAX call.
	 *
	 * @param int selectedImportID The selected import ID.
	 * @param obj $itemContainer The jQuery selected item container object.
	 */
	function gridLayoutImport( selectedImportID, $itemContainer, options, type = 'wpbakery' ) {
		// Reset response div content.
		$( '.js-ocdi-ajax-response' ).empty();

		// Hide all other import items.
		$itemContainer.siblings( '.js-ocdi-gl-item' ).hide();

		$itemContainer.animate({
			opacity: 0
		}, 500, 'swing', function () {
			$itemContainer.animate({
				opacity: 1
			}, 500 )
		});

		// Hide the header with category navigation and search box.
		$itemContainer.closest( '.js-ocdi-gl' ).find( '.js-ocdi-gl-header' ).hide();

		// Remove the import button of the selected item.
		$itemContainer.find( '.js-ocdi-gl-import-data' ).remove();

		// Update preview button URL
		$itemContainer.find( '.ocdi__gl-item-button.btn' ).hide();
		$itemContainer.find( '.ocdi__gl-item-button.btn.ocdi__local_link' ).show();

		// Prepare data for the AJAX call
		var data = new FormData();
		data.append( 'action', 'ocdi_import_demo_data' );
		data.append( 'security', ocdi.ajax_nonce );
		data.append( 'selected', selectedImportID );
		data.append( 'options', JSON.stringify( options ) );
		data.append( 'type', type );

		// AJAX call to import everything (content, widgets, before/after setup)
		ajaxCall( data );
	}

	/**
	 * Display the confirmation popup.
	 *
	 * @param int selectedImportID The selected import ID.
	 * @param obj $itemContainer The jQuery selected item container object.
	 */
	function displayConfirmationPopup( selectedImportID, $itemContainer ) {
		var $dialogContiner = $( '#js-ocdi-modal-content' );
		var currentFilePreviewImage = ocdi.import_files[ selectedImportID ]['import_preview_image_url'] || ocdi.theme_screenshot;
		var previewImageContent = '';
		var importNotice = ocdi.import_files[ selectedImportID ]['import_notice'] || '';
		var importNoticeContent = '';

		var importType = $itemContainer.find('.js-ocdi-gl-import-data').attr('data-import-type');
		let buttons = [
			{
				text: 'Import for WPBakery',
				class: 'btn ocdi-right-button',
				click: function() {
					const options = {
						global_settings: $(this).closest('.ui-dialog').find('#import_option_settings').is(':checked'),
						media: $(this).closest('.ui-dialog').find('#import_option_media').is(':checked'),
						posts: $(this).closest('.ui-dialog').find('#import_option_posts').is(':checked'),
						projects: $(this).closest('.ui-dialog').find('#import_option_projects').is(':checked'),
						products: $(this).closest('.ui-dialog').find('#import_option_products').is(':checked'),
						widgets: $(this).closest('.ui-dialog').find('#import_option_widgets').is(':checked'),
						forms: $(this).closest('.ui-dialog').find('#import_option_forms').is(':checked')
					};
					$(this).dialog('close');
					gridLayoutImport( selectedImportID, $itemContainer, options, 'wpbakery' );
				}
			}
		];
		if ( importType == 'both' ) {
			buttons.push({
				text: 'Import for Elementor',
				class: 'btn ocdi-right-button',
				click: function() {
					const options = {
						global_settings: $(this).closest('.ui-dialog').find('#import_option_settings').is(':checked'),
						media: $(this).closest('.ui-dialog').find('#import_option_media').is(':checked'),
						posts: $(this).closest('.ui-dialog').find('#import_option_posts').is(':checked'),
						projects: $(this).closest('.ui-dialog').find('#import_option_projects').is(':checked'),
						products: $(this).closest('.ui-dialog').find('#import_option_products').is(':checked'),
						widgets: $(this).closest('.ui-dialog').find('#import_option_widgets').is(':checked'),
						forms: $(this).closest('.ui-dialog').find('#import_option_forms').is(':checked')
					};
					$(this).dialog('close');
					gridLayoutImport( selectedImportID, $itemContainer, options, 'elementor' );
				}
			});
		}

		var dialogOptions = $.extend(
			{
				'dialogClass': 'wp-dialog',
				'resizable': false,
				'height': 'auto',
				'modal': true
			},
			ocdi.dialog_options,
			{
				'buttons': buttons
			}
		);

		if ( '' === currentFilePreviewImage ) {
			previewImageContent = '<p>' + ocdi.texts.missing_preview_image + '</p>';
		}
		else {
			previewImageContent = '<div class="clb-import-inner"><div class="ocdi__modal-image-container"><img src="' + currentFilePreviewImage + '" alt="' + ocdi.import_files[ selectedImportID ]['import_file_name'] + '"></div><div class="clb-import-options"><p>Choose what you want to be installed while import:</p><label class="form-switch"> <input id="import_option_settings" type="checkbox" checked> <i></i> Theme Settings</label><label class="form-switch"> <input id="import_option_media" type="checkbox" checked> <i></i> Media Files</label><label class="form-switch"> <input id="import_option_posts" type="checkbox" checked> <i></i> Posts</label><label class="form-switch"> <input id="import_option_projects" type="checkbox" checked> <i></i> Projects</label><label class="form-switch"> <input id="import_option_products" type="checkbox" checked> <i></i> Products</label><label class="form-switch"> <input id="import_option_forms" type="checkbox" checked> <i></i> Contact Forms</label><label class="form-switch"> <input id="import_option_widgets" type="checkbox" checked> <i></i> Widgets</label></div></div>'
		}

		// Prepare notice output.
		if( '' !== importNotice ) {
			importNoticeContent = '<div class="ocdi__modal-notice  ocdi__demo-import-notice">' + importNotice + '</div>';
		}

		// Populate the dialog content.
		$dialogContiner.prop( 'title', ocdi.texts.dialog_title );
		$dialogContiner.html(
			'<p class="ocdi__modal-item-title">' + ocdi.import_files[ selectedImportID ]['import_file_name'] + '</p>' +
			previewImageContent +
			importNoticeContent
		);

		// Display the confirmation popup.
		$dialogContiner.dialog( dialogOptions );
	}

	/**
	 * The main AJAX call, which executes the import process.
	 *
	 * @param FormData data The data to be passed to the AJAX call.
	 */
	function ajaxCall( data ) {
		$.ajax({
			method:      'POST',
			url:         ocdi.ajax_url,
			data:        data,
			contentType: false,
			processData: false,
			beforeSend:  function() {
				$( '.js-ocdi-ajax-loader' ).show();
				$( '.js-headline-templates' ).text('Demo is importing..');
			}
		})
		.done( function( response ) {
			if ( 'undefined' !== typeof response.status && 'newAJAX' === response.status ) {
				ajaxCall( data );
			}
			else if ( 'undefined' !== typeof response.status && 'customizerAJAX' === response.status ) {
				// Fix for data.set and data.delete, which they are not supported in some browsers.
				var newData = new FormData();
				newData.append( 'action', 'ocdi_import_customizer_data' );
				newData.append( 'security', ocdi.ajax_nonce );

				// Set the wp_customize=on only if the plugin filter is set to true.
				if ( true === ocdi.wp_customize_on ) {
					newData.append( 'wp_customize', 'on' );
				}

				ajaxCall( newData );
			}
			else if ( 'undefined' !== typeof response.status && 'afterAllImportAJAX' === response.status ) {
				// Fix for data.set and data.delete, which they are not supported in some browsers.
				var newData = new FormData();
				newData.append( 'action', 'ocdi_after_import_data' );
				newData.append( 'security', ocdi.ajax_nonce );
				ajaxCall( newData );
			}
			else if ( 'undefined' !== typeof response.message ) {
				$( '.js-ocdi-ajax-response' ).append( '<p>' + response.message + '</p>' );
				$( '.js-ocdi-ajax-loader' ).hide();
				$( '.js-headline-templates' ).text('☑️ Demo import complete');
			}
			else {
				$( '.js-ocdi-ajax-response' ).append( '<div class="notice  notice-error  is-dismissible"><p>' + response + '</p></div>' );
				$( '.js-ocdi-ajax-loader' ).hide();
			}
		})
		.fail( function( error ) {
			$( '.js-ocdi-ajax-response' ).append( '<div class="notice  notice-error  is-dismissible"><p>Error: ' + error.statusText + ' (' + error.status + ')' + '</p></div>' );
			$( '.js-ocdi-ajax-loader' ).hide();
		});
	}



	function showPurchasePopup( selectedImportID, $itemContainer ) {
		var $dialogContiner         = $( '#js-ocdi-modal-content' ).clone();
		var dialogOptions           = $.extend(
			{
				'dialogClass': 'wp-dialog theme-purchase-form',
				'resizable':   false,
				'height':      'auto',
				'modal':       true
			},
			ocdi.dialog_options,
			{
				'buttons':
				[
					{
						text: ocdi.texts.dialog_activate,
						class: 'btn ocdi-right-button',
						click: function() {
							window.location.assign(ocdi.dashboard_link);
						}
					},
					{
						text: ocdi.texts.dialog_close,
						click: function() {
							$(this).dialog('close');
						}
					},
					/*{
						text: 'Save',
						class: 'button  button-primary ocdi-right-button',
						click: function() {
							let purchase_code = $( '#input_purchase_code' ).val();
							var data = new FormData();
							data.append( 'action', 'ocdi_check_purchase_code' );
							data.append( 'security', ocdi.ajax_nonce );
							data.append( 'purchase_code', purchase_code );

							$.ajax({
								method:      'POST',
								url:         ocdi.ajax_url,
								data:        data,
								contentType: false,
								processData: false,
								beforeSend:  function() {
									$( '.js-ocdi-ajax-loader' ).show();
								}
							})
							.done( ( response ) => {
								if ( 'undefined' !== typeof response ) {
									$( '.js-ocdi-ajax-loader' ).hide();

									if ( response.status == 'verified' ) {
										ocdiSetCookie( 'theme_purchase_code', purchase_code );
										$(this).dialog('close');

										displayConfirmationPopup( selectedImportID, $itemContainer );
									} else {
										alert('Purchase code is invalid. Recheck and try again.');
									}
								}
							})
							.fail( ( error ) => {
								$(this).dialog('close');

								$( '.js-ocdi-ajax-response' ).append( '<div class="notice  notice-error  is-dismissible"><p>Error: ' + error.statusText + ' (' + error.status + ')' + '</p></div>' );
								$( '.js-ocdi-ajax-loader' ).hide();
							});
						}
					}*/
				]
			});

		// Populate the dialog content.
		$dialogContiner.prop( 'title', 'Activation Required' );
		$dialogContiner.html(
			'<p class="ocdi__modal-item-title"><span class="envato-icon"><i class="dashicons dashicons-no"></i><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="21px" height="25px" viewBox="0 0 14 16" style="enable-background:new 0 0 14 16;" xml:space="preserve"><path class="st0" d="M11.9,0.1C11.5-0.1,10.1,0,8.5,0.5C5.7,2.5,3.3,5.3,3.1,9.9c0,0.1-0.3,0-0.4,0C2,8.4,1.7,6.8,2.3,4.6C2.5,4.4,2.1,4.2,2,4.2C1.9,4.4,1.3,5,0.9,5.7C-1,9,0.2,13.3,3.6,15.1c3.4,1.9,7.6,0.7,9.5-2.7C15.2,8.5,13.2,0.8,11.9,0.1L11.9,0.1z"></path></svg></span>Please, <a href="' + ocdi.dashboard_link + '">activate your theme</a> in the Ohio Dashboard to be able to use the Demo Importer.</p>'
		);

		// Display the confirmation popup.
		$dialogContiner.dialog( dialogOptions );

		//$('.theme-purchase-key-form').show();

		// if ok
		// displayConfirmationPopup( selectedImportID, $itemContainer );
	}

	function ocdiSetCookie(name, value, options) {
		options = options || {};
	  
		var expires = options.expires;
	  
		if (typeof expires == "number" && expires) {
		  var d = new Date();
		  d.setTime(d.getTime() + expires * 1000);
		  expires = options.expires = d;
		}
		if (expires && expires.toUTCString) {
		  options.expires = expires.toUTCString();
		}
	  
		value = encodeURIComponent(value);
	  
		var updatedCookie = name + "=" + value;
	  
		for (var propName in options) {
		  updatedCookie += "; " + propName;
		  var propValue = options[propName];
		  if (propValue !== true) {
			updatedCookie += "=" + propValue;
		  }
		}
	  
		document.cookie = updatedCookie;
	}

	function ocdiGetCookie(name) {
		var matches = document.cookie.match(new RegExp(
		  "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
		));
		return matches ? decodeURIComponent(matches[1]) : undefined;
	  }
} );
