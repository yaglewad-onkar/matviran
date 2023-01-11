jQuery( window ).on('elementor/frontend/init', () => {
    if (elementorFrontend.isEditMode()) {
        elementorFrontend.hooks.addAction('frontend/element_ready/ohio_counter.default', ( $element ) => {
            jQuery(window).trigger('ohio:handle_counter_box');
        });
    }
});