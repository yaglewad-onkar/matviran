jQuery( window ).on('elementor/frontend/init', () => {
    if (elementorFrontend.isEditMode()) {
        elementorFrontend.hooks.addAction('frontend/element_ready/ohio_recent_projects.default', ( $element ) => {
            jQuery(window).trigger('ohio:handle_bg_images');

            setTimeout( function() {
                jQuery(window).trigger('ohio:handle_portfolio_onepage_slider');
                jQuery(window).trigger('ohio:handle_portfolio');
                jQuery(window).trigger('ohio:handle_portfolio_popup');
                jQuery(window).trigger('ohio:handle_portfolio_moving_details_grid');
                jQuery(window).trigger('ohio:handle_interactive_links_grid');
                jQuery(window).trigger('ohio:handle_masonry');
                jQuery(window).trigger('ohio:portfolioGridType12');

                setTimeout( function() {
                    if (window.ohioRowRefresh) {
                        window.ohioRowRefresh();
                    }
                }, 150);
            }, 150 );
        });
    }
});
