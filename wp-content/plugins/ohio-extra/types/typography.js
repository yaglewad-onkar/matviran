!function($) {

    function ohioTypographySerialize($block, $hidden_input) {
        let result = {};

        result.font_size = $block.find('input[data-target="font-size"]').val();
        result.line_height = $block.find('input[data-target="line-height"]').val();
        result.letter_spacing = $block.find('input[data-target="letter-spacing"]').val();
        result.color = $block.find('input[data-target="color"]').val();
        result.weight = $block.find('select[data-target="weight"]').val();
        result.style = $block.find('select[data-target="font-style"]').val();
        result.use_custom_font = $block.find('input[data-target="use-custom-font"]').prop('checked');
        if ( result.use_custom_font ) {
            result.custom_font = $block.find('select[data-target="custom-font"]').val();
        }

        $hidden_input.val( JSON.stringify( result ) );
    }

    $('#vc_ui-panel-edit-element').on('change', '.ohio_extra_typography_block input, .ohio_extra_typography_block select', function(e){
        var $closest = $(this).closest('.ohio_extra_typography_block');
        var $value_hidden_input = $closest.find('.wpb_vc_param_value');
        ohioTypographySerialize( $closest, $value_hidden_input );
    });


    $('#vc_ui-panel-edit-element').on('change', '.ohio_extra_typography_block input[data-target="use-custom-font"]', function(e){
        if ($(this).prop('checked')) {
            $(this).closest('.ohio_extra_typography_block').find('.custom-font-panel').show();
        } else {
            $(this).closest('.ohio_extra_typography_block').find('.custom-font-panel').hide();
        }
    });

    $('#vc_ui-panel-edit-element .ohio_extra_typography_block input[data-target="color"]').wpColorPicker({
        change: function (e, ui) {
            $( e.target ).val( ui.color.toString() );
            $( e.target ).trigger('change');
        },
        clear: function (e, ui) {
            $(e.target).trigger('change');
        }
    });

}(window.jQuery);