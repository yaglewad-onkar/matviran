/* <![CDATA[ */
;(function($){
	
	"use strict";
	
    $(document).ready(function(){

        function connect( request ) {

            Swal.fire({
                title: 'Connecting Brooklyn Servers',
                backdrop : false,
                onBeforeOpen: function() {

                    Swal.showLoading();

                    $.ajax({
                        type: 'POST',
                        url: ajaxurl,
                        data: {
                            action: request,
                            envato_purchase: $('#envato_purchase_code').val()
                        },
                        success: function (res) {

                            if( typeof res.result !== "undefined" ) {

                                if( res.result === 'access_denied' ) {

                                    Swal.fire({
                                        backdrop : false,
                                        type: 'error',
                                        title: res.reason,
                                        customClass: {
                                            confirmButton: 'ut-ui-button ut-ui-button-blue'
                                        },
                                        timer: 3000
                                    });

                                }

                                if( res.result === 'access_success' ) {

                                    Swal.fire({
                                        backdrop : false,
                                        type: 'success',
                                        title: 'License successfully registered!',
                                        showConfirmButton: false,
                                        timer: 3000
                                    }).then( function (result) {

                                        location.reload(true);

                                    });

                                }

                                if( res.result === 'connection_issue' ) {

                                    Swal.fire({
                                        backdrop : false,
                                        type: 'info',
                                        title: res.reason,
                                        customClass: {
                                            confirmButton: 'ut-ui-button ut-ui-button-blue'
                                        }
                                    });

                                }

                                if( res.result === 'revoke_success' ) {

                                    Swal.fire({
                                        backdrop : false,
                                        type: 'success',
                                        title: 'License removed from Installation!',
                                        showConfirmButton: false,
                                        timer: 3000
                                    }).then( function (result) {

                                        location.reload(true);

                                    });

                                }

                            }

                        }

                    });

                }

            });

        }

        $('#ut-register-license').on('click', function ( event ) {

            if( !$('#envato_purchase_code').val().length ) {

                Swal.fire({
                    backdrop : false,
                    type: 'info',
                    title: 'Missing Purchasecode',
                    text: 'Please enter your purchasecode!',
                    customClass: {
                        confirmButton: 'ut-ui-button ut-ui-button-blue'
                    }
                });

            } else {

                connect('ut_check_license');

            }

            event.preventDefault();
            event.stopImmediatePropagation();

        });

        $('#ut-deregister-license').on('click', function ( event ) {

            connect('ut_deregister_license');
            event.preventDefault();

        });

        function check_confirmation() {

            if( $('#ut-data-confirmation').prop('checked') ) {

                $('#ut-register-license').attr("disabled", false );

            } else {

                $('#ut-register-license').attr("disabled", true );

            }

        }

        $('#ut-data-confirmation').on('click', function ( event ) {

            check_confirmation();

        });
        
    });
	
})(jQuery);
 /* ]]> */