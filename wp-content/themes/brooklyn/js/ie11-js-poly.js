/* <![CDATA[ */
(function($){

    "use strict";

    $(document).ready(function(){

        // adjust images
        $('.ut-image-gallery-image').each(function () {

            var $this = $(this),
                width = $this.width();

            $this.find('img').css('max-width', width );

        });

        // force image loading
        $('.parallax-scroll-container').each( function() {

            if( !$(this).hasClass('ut-pseudo-background') && this.getAttribute('data-background-image') ) {

                this.style.backgroundImage = 'url(\'' + this.getAttribute('data-background-image').split(',').join('\'),url(\'') + '\')';

            }

        });

        // force lightgallery if morphbox is active
        if( site_settings !== "undefined" && site_settings.lg_type === 'morphbox' ) {

            $('.ut-vc-images-lightbox').ut_require_js({
                plugin: 'lightGallery',
                source: 'lightGallery',
                callback: function (element) {

                    element.removeClass('ut-wait-for-plugin');

                    $('.entry-content').lightGallery({
                        mode: site_settings.lg_mode,
                        selector: '.ut-vc-images-lightbox',
                        exThumbImage: "data-exthumbimage",
                        download: site_settings.lg_download,
                        getCaptionFromTitleOrAlt: "true",
                        hash: false
                    });

                }

            });

        }

    });

})(jQuery);
/* ]]> */