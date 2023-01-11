(function ($) {

    "use strict";

    // TGMPA Dismiss
    function ut_dismiss_tgmpa() {

        $.ajax({

            type: 'POST',
            url: ajaxurl,
            data: {
                "action" : "hide_tgmpa_notification",
            },
            success: function() {

                // nothing to do here

            }

        });

    }

    $(document).on('click', '#setting-error-tgmpa .notice-dismiss', function( event ) {

        ut_dismiss_tgmpa();

    });


})( jQuery );