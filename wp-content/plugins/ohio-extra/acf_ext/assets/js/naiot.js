(function($){

	function initNaiotAcfType() {
		$('.ohio-acf-image-option-type').each(function() {
			var initValue = $(this).find('input[type="hidden"]').val();
			if (initValue) {
				$(this).find('.naiot-item[data-naiot-setting-value="' + initValue + '"]')
					.addClass('naiot-item--active');
			} else {
				$(this).find('.naiot-item:first').addClass('naiot-item--active');
			}
		});

		$('.naiot-item').on('click', function(){
			var $this = $(this);
			var $closest = $this.closest('.ohio-acf-image-option-type');

			$closest.find('.naiot-item--active').removeClass('naiot-item--active');
			$this.addClass('naiot-item--active');

			$closest.find('input[type="hidden"]').val($this.attr('data-naiot-setting-value')).trigger('change');
			return false;
		});
	}

	if( typeof acf.add_action !== 'undefined' ) {
		acf.add_action('ready_field/type=image_option', function($field) {
			initNaiotAcfType();
		});
		acf.add_action('append_field/type=image_option', function($field) {
			initNaiotAcfType();
		});
	} else {
		$(document).on('acf/setup_fields', function(e, postbox) {
			$(postbox).find('.field[data-field_type="image_option"]').each(function(){
				initNaiotAcfType();
			});
		});
	}

	acf.registerConditionForFieldType('equalTo', 'image_option');
	
})(jQuery);
