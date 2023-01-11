jQuery( window ).on('elementor/frontend/init', () => {
    if (elementorFrontend.isEditMode()) {
        elementorFrontend.hooks.addAction('frontend/element_ready/ohio_tabs.default', ( $element ) => {
            jQuery(window).trigger('ohio:handle_tab_box');
            jQuery(window).trigger('ohio:handle_tab_box_size');
        });
    }
});