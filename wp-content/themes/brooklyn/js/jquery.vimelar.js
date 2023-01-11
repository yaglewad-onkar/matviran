/**
 * jQuery Vimelar plugin
 * @author: Sozonov Alexey
 * @version: v.1.0.0
 * licensed under the MIT License
 * updated: July 5, 2015
 * since 2015
 * Enjoy.
 */

;(function ($, window) {

    // defaults
    var defaults = {
        ratio: 16/9, // usually either 4/3 or 16/9 -- tweak as needed
        videoId: '8970192',
        width: $(window).width(),
        wrapperZIndex: 99
    };

    // methods
    var vimelar = function(node, options) { // should be called on the wrapper div

        var options = $.extend({}, defaults, options),
        $node = $(node); // cache wrapper node

        var player_id = options.containment.replace("#", '');

        // build container
        $('<iframe />', {
            id: 'vimelar-player-'+player_id,
            src: '//player.vimeo.com/video/' + options.videoId + (typeof options.parameters !== "undefined" ? '?' + $.param(options.parameters) : ''),
            style: 'position: absolute; width:100%; height: 100%;',
            class : options.class,
            frameborder: 0,
            allow: "autoplay"
        }).prependTo(options.containment).wrap('<div id="vimelar-container-'+player_id+'" class="vimelar-container '+ options.container_class +'" style="overflow: hidden; position: absolute; z-index: 1; width: 100%; height: 100%"></div>');

        $node.css({position: 'relative', 'z-index': options.wrapperZIndex});

        // resize handler updates width, height and offset of player after resize/init
        var resize = function() {

            var $container = $('#vimelar-container-' + player_id),
                $parent = $container.closest(".ut-has-background-video");

            var after_style = window.getComputedStyle(
                document.querySelector("#" + $container.attr("id")), ":after"
            );

            if( $container.hasClass("ut-force-video-aspect-ratio") ) {

                $parent.css( "min-height", after_style.height );

                var $flickity = $container.closest(".ut-content-carousel");

                if( $flickity.length ) {

                    $flickity.flickity('resize');

                }

            }

            var width = $container.width(),
                pWidth, // player width, to be defined
                height = $container.height() + 80,
                pHeight, // player height, to be defined
                $vimelarPlayer = $('#vimelar-player-'+player_id);


            var abundance = height * options.abundance;

            if( parseFloat( after_style.height ) < parseFloat( $container.height() ) ) {

                abundance = ( parseFloat( $container.height() ) - parseFloat( after_style.height ) );

                // height = height + abundance;
                // width = height * options.ratio;

            }

            // when screen aspect ratio differs from video, video must center and underlay one dimension
            if( width / options.ratio < height) { // if new video height < window height (gap underneath)

                pWidth = Math.ceil( height * options.ratio ); // get new player width
                $vimelarPlayer.width( pWidth ).height( height ).css({left: (width - pWidth) / 2, top: 0});

            } else { // new video width < window width (gap to right)

                pHeight = Math.ceil(width / options.ratio); // get new player height
                $vimelarPlayer.width(width).height(pHeight).css({left: 0, top: (height - pHeight) / 2});

            }

        };

        // attach resize event
        $(window).on('resize.vimelar', function() {
            resize();
        });

        resize();

    };

    // create plugin
    $.fn.vimelar = function (options) {
        return this.each(function () {
            if (!$.data(this, 'vimelar_instantiated')) { // let's only run one
                $.data(this, 'vimelar_instantiated',
                    vimelar(this, options));
            }
        });
    }

})(jQuery, window);
