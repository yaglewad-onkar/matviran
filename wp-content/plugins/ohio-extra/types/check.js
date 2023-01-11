!function($) {

	$('#vc_ui-panel-edit-element').on('change', '.ohio_extra_check_block input[type="checkbox"]', function(e){
		var $input = $(this);
		var $value_hidden_input = $(this).closest('.ohio_extra_check_block').find('input.wpb_vc_param_value');
		if ($input.is(':checked')) {
			$value_hidden_input.val('1').trigger('change');
		} else {
			$value_hidden_input.val('0').trigger('change');
		}
	});

}(window.jQuery);