jQuery( window ).on('elementor/frontend/init', () => {
    if (elementorFrontend.isEditMode()) {
        elementorFrontend.hooks.addAction('frontend/element_ready/ohio_team_members.default', ( $element ) => {
            jQuery(window).trigger('ohio:handle_cover_box');
            jQuery(window).trigger('ohio:handle_cover_box_size');
        });
    }
});