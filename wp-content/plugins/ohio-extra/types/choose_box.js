!function($) {

	$('#vc_ui-panel-edit-element').on('click', '.ohio_extra_choose_box_block label', function(e){
		var $input = $(this).closest('li').find('input[type="radio"]');
		var $value_hidden_input = $(this).closest('.ohio_extra_choose_box_block').find('input.wpb_vc_param_value');
		$input.prop('checked', true);
		$(this).closest('ul').find('input[type="radio"]').not($input).prop('checked', false);
		$value_hidden_input.val($input.attr('data-value')).trigger('change');
	});

}(window.jQuery);