jQuery(function($) {
    'use strict';

    var custom_uploader;

    $( '#update-nav-menu' ).on( 'click', '.upload_image_button', function() {
        if ( custom_uploader ) {
            custom_uploader.open();
            return false;
        }

        custom_uploader = wp.media.frames.file_frame = wp.media( {
            title: 'Choose Image',
            button: { text: 'Choose Image' },
            multiple: false
        } );

        custom_uploader.on( 'select', () => {
            var attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
            $(this).siblings( '.upload_image' ).val( attachment.url ).trigger( 'change' );
            $(this).siblings( '.image_uploaded' ).attr( 'src', attachment.url ).show();

            custom_uploader.close();
        } );

        custom_uploader.open();

        return false;
    } );

    $( '#update-nav-menu' ).on( 'click', '.remove_image_button', function() {
        $(this).siblings( '.upload_image' ).val( '' ).trigger( 'change' );
        $(this).siblings( '.image_uploaded' ).attr( 'src', '' ).hide();

        return false;
    } );

    $( '#menu-to-edit' ).on( 'sortstop', function() {
        $(this).find( '.menu-item' ).each( function() {
            var $image_select = $(this).find('.field-ohio_mega_menu_image');
            var $image_position = $(this).find('.field-ohio_mega_menu_bg_position');
            var $image_repeat = $(this).find('.field-ohio_mega_menu_bg_repeat');

            setTimeout( () => {
                if ( $(this).is( '.menu-item-depth-1' ) ) {
                    $image_select.show();
                    $image_position.show();
                    $image_repeat.show();
                } else {
                    $image_select.hide();
                    $image_position.hide();
                    $image_repeat.hide();
                }
            }, 100 );
        } );
    } );
});