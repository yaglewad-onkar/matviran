(function($){

	acf.registerFieldType(acf.Field.extend({
		type: 'inherited_checkbox',
		$input: function() {
			return this.$('input[type="hidden"]');
		},

		initialize: function() {
			let input = this.$input();

			this.$('input[type="radio"]').on('change', function(){
				input.val($(this).val()).trigger('change');
			});
		}
	}));

	acf.registerConditionForFieldType('equalTo', 'inherited_checkbox');
	acf.registerConditionForFieldType('notEqualTo', 'inherited_checkbox');

})(jQuery);
