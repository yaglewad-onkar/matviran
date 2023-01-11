jQuery( window ).on('elementor/frontend/init', () => {
    if (elementorFrontend.isEditMode()) {
        elementorFrontend.hooks.addAction('frontend/element_ready/ohio_vertical_slider.default', ( $element ) => {
            if ( window.Clb ) {
                window.Clb.init();
            }
            jQuery(window).trigger('ohio:handle_fullscreen_sliders');
            jQuery(window).trigger('ohio:handle_remove_slider_bullets');
        });
    }
});