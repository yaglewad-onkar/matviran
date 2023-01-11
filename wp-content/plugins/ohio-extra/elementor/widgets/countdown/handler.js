jQuery( window ).on('elementor/frontend/init', () => {
    if (elementorFrontend.isEditMode()) {
        elementorFrontend.hooks.addAction('frontend/element_ready/ohio_countdown.default', ( $element ) => {
            jQuery(window).trigger('ohio:handle_countdown_box');
        });
    }
});