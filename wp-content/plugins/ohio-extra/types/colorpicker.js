!function($) {

	function ohioColorpickerSerialize($block, $hidden_input) {
		var serialize_string = '';

		var color = $block.find('input[name="colorpicker"]').val();
		var brandColor = $block.find('input[name="brand-color"]')[0].checked;
	
		if( color || brandColor ) {
			serialize_string += ( brandColor ) ? 'brand' : color;
		}

		$hidden_input.val( serialize_string );
	}

	function ohioHideFields(){
		$('.ohio_extra_colorpicker_block input[name="brand-color"]').each(function(){
			var parent = $(this).closest('.ohio_extra_colorpicker_block');
			var color = parent.find('.color');
			
			if( $(this).length && this.checked ){
				color.addClass('disabled');
			} else {
				color.removeClass('disabled');
			}
		});
	}

	vc.atts.colorpicker.init( {}, '.ohio_extra_colorpicker_block' );

	$('#vc_ui-panel-edit-element').on(
		'change', 
		'.ohio_extra_colorpicker_block input, .ohio_extra_colorpicker_block select',
		function(e){
			var $closest = $(this).closest('.ohio_extra_colorpicker_block');
			var $value_hidden_input = $closest.find('.wpb_vc_param_value');
			ohioColorpickerSerialize( $closest, $value_hidden_input );
			ohioHideFields();
		}
	);

	$('.ohio_extra_colorpicker_block .wp-picker-clear').on('click', function(e){
		var $closest = $(this).closest('.ohio_extra_colorpicker_block');
		var $value_hidden_input = $closest.find('.wpb_vc_param_value');
		ohioColorpickerSerialize( $closest, $value_hidden_input );
		ohioHideFields();
	});


	ohioHideFields();

}(window.jQuery);