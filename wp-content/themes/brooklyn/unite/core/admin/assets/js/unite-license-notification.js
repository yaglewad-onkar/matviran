/* <![CDATA[ */
;(function($){

    "use strict";

    $(document).ready(function(){

        if( $( '.update-message em', '#ut-core-update').length ) {

            $('<div></div>').addClass('ut-missing-license').html( unite_license_notification.missing_license ).insertAfter( $( '.update-message em', '#ut-core-update') );

        }

        if( $( '.update-message em', '#ut-shortcodes-update').length ) {

            $('<div></div>').addClass('ut-missing-license').html( unite_license_notification.missing_license ).insertAfter( $( '.update-message em', '#ut-shortcodes-update') );

        }

        if( $( '.update-message em', '#ut-portfolio-update').length ) {

            $('<div></div>').addClass('ut-missing-license').html( unite_license_notification.missing_license ).insertAfter( $( '.update-message em', '#ut-portfolio-update') );

        }

        if( $( '.update-message em', '#ut-pricing-update').length ) {

            $('<div></div>').addClass('ut-missing-license').html( unite_license_notification.missing_license ).insertAfter( $( '.update-message em', '#ut-pricing-update') );

        }

        if( $( '.update-message em', '#js_composer-update').length ) {

            $('<div></div>').addClass('ut-missing-license').html( unite_license_notification.missing_license ).insertAfter( $( '.update-message em', '#js_composer-update') );

        }


    });

})(jQuery);
/* ]]> */