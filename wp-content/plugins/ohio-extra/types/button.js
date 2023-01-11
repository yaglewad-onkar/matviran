!function($) {

	function ohioButtonSerialize($block) {
		var $hidden_input =  $block.find('.wpb_vc_param_value');
		var serialize_string = '';

		var type = $block.find('select.type').val();
		var size = $block.find('select.size').val();
		var fullwidth = $block.find('input[name="fullwidth"]')[0].checked;

		var color = $block.find('input[name="color"]').val();
		var brandColor = $block.find('input[name="brand-color"]')[0].checked;

		var hoverColor = $block.find('input[name="hover-color"]').val();
		var brandHoverColor = $block.find('input[name="brand-hover-color"]')[0].checked;

		var textColor = $block.find('input[name="text-color"]').val();
		var brandTextColor = $block.find('input[name="brand-text-color"]')[0].checked;

		var textHoverColor = $block.find('input[name="text-hover-color"]').val();
		var brandTextHoverColor = $block.find('input[name="brand-text-hover-color"]')[0].checked;
		
		if( type ) {
			serialize_string += 'type=' + type;
		}
		if( size ) {
			serialize_string += '&size=' + size;
		}
		if( fullwidth ) {
			serialize_string += '&fullwidth=true';
		}
		if( color || brandColor ) {
			serialize_string += '&color=' + (( brandColor ) ? 'brand' : color );
		}
		if( hoverColor || brandHoverColor ) {
			serialize_string += '&hover-color=' + (( brandHoverColor ) ? 'brand' : hoverColor );
		}
		if( textColor || brandTextColor ) {
			serialize_string += '&text-color=' + (( brandTextColor ) ? 'brand' : textColor );
		}
		if( textHoverColor || brandTextHoverColor ) {
			serialize_string += '&text-hover-color=' + (( brandTextHoverColor ) ? 'brand' : textHoverColor );
		}

		$hidden_input.val( serialize_string );
	}

	function ohioHideFields(){
		var buttonBlock = $('.ohio_extra_button_block');

		var buttonType = buttonBlock.find('select.type').val(); 
		var size = buttonBlock.find('.size')[0];
		var fullwidth = buttonBlock.find('.fullwidth')[0];

		var color = buttonBlock.find('.button-color')[0];
		var hoverColor = buttonBlock.find('.button-hover-color')[0];

		if( buttonType == 'arrow_link' ){
			$([size, fullwidth, color, hoverColor]).addClass('disabled');
		} else {
			$([size, fullwidth, color, hoverColor]).each(function(){
				if( !$(this).attr('data-disabled') ){
					$(this).removeClass('disabled');
				}
			});
		}


		// Brand colors
		buttonBlock.find('.brand-color').each(function(){
			var color = $(this).parent().find('.color-group');

			if( $(this).find('input')[0].checked ){
				color.addClass('disabled');
			} else {
				color.removeClass('disabled');
			}
		});
	}

	vc.atts.colorpicker.init( {}, '.ohio_extra_button_block' );

	$('#vc_ui-panel-edit-element').on(
		'change',
		'.ohio_extra_button_block input, .ohio_extra_button_block select',
		function(e){
			var $closest = $(this).closest('.ohio_extra_button_block');
			ohioButtonSerialize( $closest );
			ohioHideFields();
		}
	);

	$('.ohio_extra_button_block .wp-picker-clear').on('click', function(e){
		var $closest = $(this).closest('.ohio_extra_button_block');
		ohioButtonSerialize( $closest );
		ohioHideFields();
	});


	$('.ohio_extra_button_block .wp-picker-container').on('click', function(){
		var holder = $(this).find('.wp-picker-holder');

		$(this).css('left', '');
		var diff = (holder.outerWidth() + $(this).parent().parent().position().left) - $('.ohio_extra_button_block').outerWidth();

		if( diff > 0 ){
			$(this).addClass('invert-position');
			$(this).find('.wp-picker-input-wrap, .wp-picker-holder').css('left', -diff + 'px');
		} else {
			$(this).removeClass('invert-position');
		}
	});


	ohioHideFields();

}(window.jQuery);