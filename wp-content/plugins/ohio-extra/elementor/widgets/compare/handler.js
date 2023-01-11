jQuery( window ).on('elementor/frontend/init', () => {
    if (elementorFrontend.isEditMode()) {
        elementorFrontend.hooks.addAction('frontend/element_ready/ohio_compare.default', ( $element ) => {
            jQuery(window).trigger('ohio:handle_compare_shortcodes');
        });
    }
});