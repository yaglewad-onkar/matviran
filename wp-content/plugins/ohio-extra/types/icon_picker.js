var $ = jQuery;

if( !window.useNorIconPicker ){
	window.useNorIconPicker = true;

	// Toggle content
	function NorExtraIconPickerToggleContent( select ){
		var content = select.parent().find('.content');

		if( content.hasClass('open') ){
			content.removeClass('open');
			select.find('.select i').removeClass('fa-angle-up').addClass('fa-angle-down');
		} else {
			content.addClass('open');
			select.find('.select i').removeClass('fa-angle-down').addClass('fa-angle-up');
		}
	}

	// Select click
	$('body').on('click', '.ohio_extra_icon_picker_block .selected-icon', function(){
		NorExtraIconPickerToggleContent( $(this) );
	});


	// Icon click
	$('body').on('click', '.ohio_extra_icon_picker_block .icons li li', function(){
		var select = $(this).closest('.ohio_extra_icon_picker_block'),
			list = select.find('.icons'),
			paramName = select.find('.wpb_vc_param_value');

		var value = $(this).find('i').attr('class');

		paramName.val( value );
		paramName.trigger('change');

		list.find('.selected').removeClass('selected');
		$(this).addClass('selected');

		select.find('[data-selected-icon]').attr('class', value);

		NorExtraIconPickerToggleContent( select );

	});


	// Category change
	$('body').on('change', '.ohio_extra_icon_picker_block .categories', function(){
		var current_category = $(this).val(),
			select = $(this).closest('.ohio_extra_icon_picker_block'),
			categories = select.find('.icons > li'),
			icons = select.find('.icons ul > li'),
			search = select.find('input.search');

		categories.removeClass( 'category-hidden' );
		if ( current_category != 'all' ) {
			categories.not('[data-category="' + current_category + '"]').addClass( 'category-hidden' );
		}

		icons.removeClass( 'search-hidden' );
		search.val( '' );

		categories.each( function(){
			if ( $(this).find( 'li:not(.search-hidden)' ).length == 0 ) {
				$(this).addClass( 'category-hidden' );
			}
		});
	});


	// Search
	$('body').on('input', '.ohio_extra_icon_picker_block input.search', function(){
		var value = $(this).val(),
			select = $(this).closest('.ohio_extra_icon_picker_block'),
			categories = select.find('.icons > li'),
			icons = select.find('.icons ul > li'),
			search = select.find('input.search'),
			content = select.find('.content');

		icons.removeClass( 'search-hidden' );

		if ( value.trim().length > 0 ) {
			icons.not('[data-search*="' + value + '"]').addClass( 'search-hidden' );
		}

		categories.removeClass( 'category-hidden' );

		categories.each( function(){
			if ( $(this).find( 'li:not(.search-hidden)' ).length == 0 ) {
				$(this).addClass( 'category-hidden' );
			}
		});

		if ( content.find( '.categories' ).val() != 'all' ) {
			content.find( '.categories' ).val( 'all' );
		}
		
	});
}