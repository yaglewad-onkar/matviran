jQuery( function ( $ ) {
	// Ohio Hub
	if ( $( '.clb-hub' ).length ) {
		// Tabs
		jQuery( ".clb-hub #tabs > ul a" ).on('click', function() {
			jQuery( ".clb-hub #tabs > ul a" ).removeClass( 'selected' );
			jQuery( this ).addClass( 'selected' );

			jQuery( '.clb-hub #tabs .tab-item' ).hide();
			jQuery( jQuery( this ).attr( 'href' ) ).show();

			return false;
		});

		// Accordion
		var accordion = $('.clb-hub #accordion');
		var items = accordion.find('.accordionItem');
		var contents = accordion.find('.accordionItem_content');

		var toggle = function(num) {
			var opened = accordion.find('.visible');
			var content = accordion.find('.accordionItem_content').eq(num);

			if (!items.eq(num).hasClass('active')) {
				items.removeClass('active').eq(num).addClass('active');

				setTimeout(function () {
					content.css('height', '').addClass('no-transition visible');
					let height = content.outerHeight() + 'px';
					content.removeClass('no-transition visible').css('height', '0px');

					setTimeout(function () {
						opened.removeClass('visible no-transition').css('height', '0px');
						content.addClass('visible').css('height', height);

						accordion.find('.accordionItem_title .accordionItem_control i').removeClass('ion-md-remove').addClass('ion-md-add');
						accordion.find('.accordionItem_title').eq(num).find('.accordionItem_control i').removeClass('ion-md-add').addClass('ion-md-remove');
					}, 30);
				}, 30);
			} else {
				items.eq(num).removeClass('active');
				items.eq(num).find('.accordionItem_content.visible').removeClass('visible').css('height', '0px');
				items.eq(num).find('.accordionItem_title .accordionItem_control i').removeClass('ion-md-remove').addClass('ion-md-add');
			}
		};

		accordion.find('.accordionItem_title').each(function (i) {
			$(this).on('click', function () { toggle(i); });
		});

		contents.attr('style', 'height:0;overflow:hidden');

		// Activation button
		$('#ohio-activate-theme-license').on('click', function() {
			if ( $(this).attr('loading') ) {
				return false;
			}

			popupWindow = window.open(
				'https://demo.clbthemes.com/activation',
				'Theme activation',
				'resizable,width=840,height=570'
			);

			window.onmessage = (value) => {
				popupWindow.close();

				$(this).attr('loading', true).addClass('btn-spinner').text('Proceeding..');

				jQuery.post(window.ajaxurl, {
					'action': 'ohio_save_license_code',
					'license': value.data
				}, () => {
					window.location.reload();
				});
			};

			return false;
		});

		$('#ohio-remove-theme-license').on('click', function() {
			if ( $(this).attr('loading') ) {
				return false;
			}

			$(this).attr('loading', true).addClass('btn-spinner').text('Removing..');

			jQuery.post(window.ajaxurl, { 'action': 'ohio_remove_license_code' }, () => {
				window.location.reload();
			});
		});

		jQuery('#sync-languages-action').on('click', function() {
			if ( ! confirm('It will take all non-empty global settings from the main language and apply them to the current. This action cannot be undone. Are you sure?')) return;
		
			jQuery.post(window.ajaxurl, {
				'action': 'ohio_sync_settings_with_main_lang',
				'current_lang': jQuery(this).attr('lang-code')
			}, (res) => {
				if (res != 'OK') alert('Сan\'t sync languages. An unknown error has occurred');
				window.location.reload();
			});
		});

		// Check actual theme version
		jQuery.post(window.ajaxurl, { 'action': 'ohio_check_last_version' }, (response) => {
			let data = JSON.parse(response);

			if ( versionCompare(data.current, data.actual) < 0 ) {
				$('#ohio-version-table-placeholder').text(data.actual);
				$('#ohio-version-table-value').find('mark').removeClass('yes').addClass('no');
				$('#ohio-version-table-value').find('.ohio-new-version-available').show();
			}
		});

		// Show system issues message
		if ( $('#tabs-2 mark.no').length ) {
			$('.wp-header-end').after('<div class="notice notice-warning settings-error is-dismissible"><p>Check your System Status to make sure that your server is configured properly. This could cause some problems when you trying to import.</div>');
		}
	}

	// Save options
	$('#fake-publishing-action .button-publish').on( 'click', function() {
		$(this).addClass('btn-spinner').text('Updating..');

		$('input#publish').trigger('click');
		return false;
	});

	function versionCompare(v1, v2, options) {
		var lexicographical = options && options.lexicographical,
			zeroExtend = options && options.zeroExtend,
			v1parts = v1.split('.'),
			v2parts = v2.split('.');
	
		function isValidPart(x) {
			return (lexicographical ? /^\d+[A-Za-z]*$/ : /^\d+$/).test(x);
		}
	
		if (!v1parts.every(isValidPart) || !v2parts.every(isValidPart)) {
			return NaN;
		}
	
		if (zeroExtend) {
			while (v1parts.length < v2parts.length) v1parts.push("0");
			while (v2parts.length < v1parts.length) v2parts.push("0");
		}
	
		if (!lexicographical) {
			v1parts = v1parts.map(Number);
			v2parts = v2parts.map(Number);
		}
	
		for (var i = 0; i < v1parts.length; ++i) {
			if (v2parts.length == i) {
				return 1;
			}
	
			if (v1parts[i] == v2parts[i]) {
				continue;
			}
			else if (v1parts[i] > v2parts[i]) {
				return 1;
			}
			else {
				return -1;
			}
		}
	
		if (v1parts.length != v2parts.length) {
			return -1;
		}
	
		return 0;
	}
});

// ACF notice
jQuery(window).on('load', function() {
	jQuery('.acf-admin-notice.notice-success').addClass('visible');
});