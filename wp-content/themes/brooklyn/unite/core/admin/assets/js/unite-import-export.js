/* <![CDATA[ */
(function($){
	
	"use strict";
		
    $(document).ready(function(){

		$(".ut-import-export").on("click", function( event ){

            event.preventDefault();

            modal({
                type: 'confirm',
                title: 'Confirm',
                text: "Load Theme Options now? This cannot be undone!",
                buttons: [
                    {
                        addClass: 'ut-ui-button-health'
                    },
                    {
                        addClass: 'ut-ui-button-blue'
                    }
                ],
                callback: function(result) {

                    if( result === true ) {

                        $("#ut-importer-export-form").submit();

                    }

                }

            });

        });


        /* clipboard theme options export */
        var clipboard = new Clipboard('.ut-copy-export');

        $('.ut-copy-export').click( function( event ){

            event.preventDefault();

            clipboard.on('success', function() {

                modal({
                    type: 'info',
                    title: 'Successfully copied to clipboard',
                    text: 'Export successfully copied to clipboard. Please paste down this export data into the import field of the destination Installation.'

                });

            });

            clipboard.on('error', function() {

                modal({
                    type: 'error',
                    title: 'An error occured while copying to clipboard',
                    text: 'Please manually copy the export data. Afterwards paste down this export data into the import field of the destination Installation.',
                    callback: function(result) {

                        $('#ut-system-report-box').toggleClass('ut-hide');

                    }

                });


            });

        });


        var $unite_import_options = $('#unite_import_options'),
            placeholder_attr = $unite_import_options.attr('placeholder');

        $('#ut-load-demo-default-config').on('change', function( event ){

            event.stopImmediatePropagation();

            var $this = $(this);

            $this.prop("disabled", true);

            if( $this.val().length ) {

                $('#unite_import_options').attr('placeholder', 'Loading Demo Data');

                $.ajax({

                    type: 'POST',
                    url: ajaxurl ,
                    dataType: 'html',
                    data: {
                        "action"  : "ut_get_default_theme_options",
                        "demo" : $this.val()
                    },
                    success: function ( response ) {

                        $("#unite_import_options").text( response );
                        $this.prop("disabled", false);

                    }

                });

            } else {

                $unite_import_options.attr('placeholder', placeholder_attr );
                $unite_import_options.text('');

                $this.prop("disabled", false);

            }

        });
		
	});

})(jQuery);
 /* ]]> */