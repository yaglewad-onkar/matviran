!function($) {

	$('#vc_ui-panel-edit-element').on( 'change', '.ohio_extra_input_block input[type="text"]', function(e){
		var $input = $(this);
		var $value_hidden_input = $(this).closest('.ohio_extra_input_block').find('input.wpb_vc_param_value');
		$value_hidden_input.val( $input.val() ).trigger('change');
	});

}(window.jQuery);