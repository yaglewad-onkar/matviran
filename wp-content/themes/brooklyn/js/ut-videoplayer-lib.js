;(function($){

    "use strict";

    var glitch_videos = [];

    var randInt = function(a, b) {
        return ~~(Math.random() * (b - a) + a);
    };

    var pixelFlick = function(i, d) {
        d[i] = d[i + 16];
    };

    var pixelCooler = function(i, d) {
        d[i] = 1;
        d[i + 1] += randInt(2, 5);
        d[i + 2] *= randInt(1, 3) + 8;
    };

    var pixelProcessor = function( imageData, step, callback ) {

        var data = imageData.data || [],
            step = step * 4 || 4;

        if (data.length) {
            var rgb = [];

            for (var i = 0; i < data.length; i += step) {
                callback && callback(i, data);
            }

            return imageData;

        } else {

            return imageData;

        }

    };


    function UT_Video_Glitch_Canvas( canvas, options ) {

        this.canvas      = canvas;
        this.ctx         = canvas.getContext('2d');
        this.width       = canvas.width;
        this.height      = canvas.height;
        this.options     = options;
    }

    UT_Video_Glitch_Canvas.prototype.drawImage = function( img, x, y ) {

        this.canvas.getContext("2d").drawImage(img, x, y, this.width, this.height );

    };

    UT_Video_Glitch_Canvas.prototype.glitchWave = function( renderLineHeight, cuttingHeight ) {

        var image = this.ctx.getImageData(0, renderLineHeight, this.width, cuttingHeight);
        image = pixelProcessor(image, 1, pixelFlick);

        this.ctx.putImageData(image, 0, renderLineHeight - 20);

    };

    UT_Video_Glitch_Canvas.prototype.glitchHorizontalWave = function( renderLineWidth, cuttingWidth ) {

        var image = this.ctx.getImageData( renderLineWidth, 0, cuttingWidth, this.height );
        image = pixelProcessor(image, 2, pixelCooler);

        this.ctx.putImageData(image, renderLineWidth - 20, 0);

    };

    UT_Video_Glitch_Canvas.prototype.glitchFillRandom = function( fillCnt, cuttingMaxHeight ) {

        var cw = randInt(100, 1920);
        var ch = randInt(100, 1080);

        for(var i = 0; i< fillCnt; i++){

            var rndX = cw * randInt(1, 2);
            var rndY = ch * randInt(1, 2);
            var rndW = cw * randInt(1, 2);
            var rndH = cuttingMaxHeight * randInt(1, 2);

            var image = this.ctx.getImageData(rndX,rndY,rndW, rndH);
            image = pixelProcessor(image, 4, pixelCooler);

            this.ctx.putImageData(image, (rndX* Math.random())%cw, rndY);

        }

    };

    UT_Video_Glitch_Canvas.prototype.glitchBlock = function( amount ){

        for (var i = 0; i < ( amount || 10); i++ ) {

            var spliceHeight = 1 + randInt(1, 50),
                x = Math.random() * this.width + 1,
                y = Math.random() * this.height + 1,
                offset = this.width * 0.1;

            this.ctx.drawImage( this.canvas,
                offset,
                y,
                this.width - offset * 2,
                spliceHeight,
                1 + randInt(0, offset * 2), //-offset / 3 + randInt(0, offset / 1.5),
                y + randInt(0, 10),
                this.width - offset,
                spliceHeight
            );

        }

    };

    UT_Video_Glitch_Canvas.prototype.glitchSlip = function( waveStrength, startHeight, endHeight ){

        if( endHeight < startHeight ){
            var temp = endHeight;
            endHeight = startHeight;
            startHeight = temp;
        }

        for( var h = startHeight; h < endHeight; h++ ){

            if( Math.random() < 0.1 ) {
                h++;
            }

            var image = this.ctx.getImageData(0, h, this.width, 1);
            this.ctx.putImageData(image, Math.random()*waveStrength-(waveStrength/2), h);

        }

    };

    UT_Video_Glitch_Canvas.prototype._render = function() {



    };

    window.UT_Video_Glitch_Canvas = UT_Video_Glitch_Canvas;

    function UT_Glitch_Video( options, callback ) {

        options = $.extend({
            src:"",
            type:'video/mp4',
            controls: false,
            autoplay: true,
            loop: true,
            muted: true
        }, options);

        var video = document.createElement('video');
        video.crossOrigin = 'anonymous';
        video.controls = options.controls;
        video.autoplay = options.autoplay;
        video.loop = options.loop;
        video.muted = options.muted;
        video.classList.add('ut-glitch-video');

        var source = document.createElement('source');
        source.src = options.src;
        source.type = options.type;
        video.appendChild(source);

        this.video  = video;
        this.source = source;

        this.video.onloadeddata = function () {

            if (callback && typeof(callback) === "function") {

                callback();

            }

        };

    }

    UT_Video_Glitch_Canvas.prototype._render = function() {



    };


    function sync_video_canvas( canvas, id, frm, fps ){

        setTimeout(function() {

            var glitch = new UT_Video_Glitch_Canvas( canvas );

            try {

                frm++;

                glitch.drawImage(glitch_videos[id].video, 0, 0);
                glitch.glitchWave((frm * 3) % glitch.height, 75);

                if (frm % 100 < 10) {

                    glitch.glitchFillRandom(5, 20);

                    // add horizontal lines
                    glitch.glitchHorizontalWave((frm * 3) % glitch.width, 2);
                    glitch.glitchHorizontalWave((frm * 30) % glitch.width, 6);
                    glitch.glitchHorizontalWave((frm * 47) % glitch.width, 1);

                }

                if (80 < frm % 100) {

                    glitch.glitchBlock(5);

                }

                if (95 < frm % 100) {
                    glitch.glitchFillRandom(2, 5);
                }

                requestAnimationFrame(function () {

                    sync_video_canvas(canvas, id, frm, fps);

                });

            } catch (e) {

                if( e.name === "NS_ERROR_NOT_AVAILABLE" ) {

                    setTimeout(

                        requestAnimationFrame(function () {

                            sync_video_canvas( canvas, id, frm, fps );

                        }),

                        100);

                } else {

                    throw e;

                }

            }

        }, 1000 / fps);

    }


    /* simple function to check if elements does exist */
    $.fn.exists = function(){
        return this.length>0;
    };


    window.reveal_wait = [];

    window.wait_for_reveal = function( selector, callback ) {

        window.reveal_wait[selector] = setInterval( function() {

            if( $(selector).hasClass('ut-block-reveal-done') ) {

                clearInterval( window.reveal_wait[selector] );
                callback();

            }

        } , 200 );

    };

    var current_video_sources = [];

    /* Selfhosted Lazy Load */
    window.ut_video_observer = lozad('.ut-lazy-video', {
        threshold: 0.1,
        loaded: function(el) {

            window.UT_Video_Actions.resumeAllVideos();


        }
    });

    $(window).on("load", function () {

        $(document).ready( function(){

            ut_video_observer.observe();

        });

    });

    $(document).ready(function(){

        window.onbeforeunload = function() {

            sessionStorage.setItem("origin", window.location.href);

        };

        /*
         * Interaction Detection (for Chrome and Safari )
         */

        $(document).one( "click", "body", function( event ) {

            if ( typeof sessionStorage !== "undefined" && sessionStorage.ut_user_interaction ) {

                $( this ).off( event );
                return;

            }

            if ( typeof sessionStorage !== "undefined" ) {

                sessionStorage.setItem( 'ut_user_interaction', 'true' ); // use session storage
                $( this ).off( event ); // remove this event

            }

        });

        $(document).one( "keydown", "body", function( event ) {

            if ( typeof sessionStorage !== "undefined" && sessionStorage.ut_user_interaction ) {

                $( this ).off( event );
                return;

            }

            var keyCode = event.keyCode || event.which;

            if( keyCode === 9 ) {

                if ( typeof sessionStorage !== "undefined" ) {

                    sessionStorage.setItem( 'ut_user_interaction', 'true' ); // use session storage
                    $( this ).off( event ); // remove this event

                }

            }

        });


        /*
         * Video Tooltip
         */

        $("#ut-confirm-video-play").on("click", function( event ) {

            $("#ut-video-play-tooltip").removeClass("active");
            UT_Video_Actions.resumeAllVideos();

            event.preventDefault();

        });


        /*
         * Video Player Actions
         */

        window.UT_Video_Actions = {

            // classes
            audioControlActiveClass   : 'ut-video-audio-control-on',
            audioControlInActiveClass : 'ut-video-audio-control-off',
            playControlActiveClass    : 'ut-video-play-control-play',
            playControlInActiveClass  : 'ut-video-play-control-pause',

            showPlayTooltip : function() {

                // $("#ut-video-play-tooltip").addClass("active");
                //@todo add confirmation




            },
            getGlitchCanvas: function( target ){

                if( target.jquery ) {

                    return target;

                } else {

                    return $('#ut-glitch-canvas-' + target);

                }

            },
            getPlayerObject : function( target ) {

                if( typeof target === "undefined" ) {

                    return false;

                }

                if( glitch_videos[target] !== undefined ) {

                    return $( glitch_videos[target].video );

                }

                if( target.jquery ) {

                    return target;

                } else {

                    if( $('#ut-selfvideo-player-' + target).length ) {

                        return $('#ut-selfvideo-player-' + target);

                    } else {

                        return $(target);

                    }

                }

            },
            getMuteButton : function( target ) {

                return $('.ut-video-audio-control[data-for="' + target + '"]');

            },
            muteButtonActivate: function( target ) {

                this.getMuteButton( target ).removeClass(this.audioControlActiveClass).addClass(this.audioControlInActiveClass);
                this.getMuteButton( target ).find('.ut-video-audio-control-soundbar-wrap span').text( this.getMuteButton( target ).find('.ut-video-audio-control-soundbar-wrap span').data("off") );

            },
            muteButtonDeactivate: function( target ) {

                this.getMuteButton( target ).removeClass(this.audioControlInActiveClass).addClass(this.audioControlActiveClass);
                this.getMuteButton( target ).find('.ut-video-audio-control-soundbar-wrap span').text( this.getMuteButton( target ).find('.ut-video-audio-control-soundbar-wrap span').data("on") );

            },


            /*
             * Manual Mute by User
             */

            manuallyMuted: function( target ) {

                if( this.getPlayerObject( target ).data('manually-muted') ) {

                    return this.getPlayerObject( target ).data('manually-muted');

                } else {

                    return false;

                }

            },
            setManuallyMuted: function( target, state ) {

                this.getPlayerObject( target ).data( 'manually-muted', state );

            },

            /*
             * Play Button Actions
             */

            getPlayButton : function( target ) {

                return $('.ut-video-play-control[data-for="' + target + '"]');

            },
            playButtonActivate: function( target ) {

                this.getPlayButton( target ).removeClass(this.playControlActiveClass).addClass(this.playControlInActiveClass);

            },
            playButtonDeactivate: function( target ) {

                this.getPlayButton( target ).removeClass(this.playControlInActiveClass).addClass(this.playControlActiveClass);

            },

            /*
             * Manual Pause by User
             */
            manuallyPaused: function( target ) {

                if( this.getPlayerObject( target ) && this.getPlayerObject( target ).data('manually-paused') ) {

                    return this.getPlayerObject( target ).data('manually-paused');

                } else {

                    return false;

                }

            },
            setManuallyPaused: function( target, state ) {

                this.getPlayerObject( target ).data( 'manually-paused', state );

            },

            /*
             * Volume Control
             */

            setVolume: function( target, volume ) {

                this.getPlayerObject(target).get(0).volume = volume;

            },

            /*
             * Video Load Status
             */

            videoLoadStatus: function( video ) {

                if( video.readyState === 4 ) {

                    this.playVideo( video );

                } else {

                    setTimeout( function( video ) {

                        this.videoLoadStatus( video );

                    }, 100);

                }

            },

            /*
             * Video Play Load
             */

            videoPlayStatus: function( video ) {

                console.log( video.currentTime   );

            },


            /*
             * Play Video
             */

            playVideo: function( target ) {

                if( this.manuallyPaused( target ) || !this.getPlayerObject(target)  || !this.getPlayerObject(target).length ) {
                    return;
                }

                var promise = this.getPlayerObject(target).get(0).play();

                if( promise !== undefined ) {

                    promise.then( function () {

                        // only execute if sound is active by setting
                        if( UT_Video_Actions.getPlayerObject( target ).data("playSound") === 'on' ) {

                            // mute button
                            UT_Video_Actions.unMuteVideo( target );

                        }

                        // add video play class
                        if( UT_Video_Actions.getPlayerObject( target ).parent().length ) {

                            UT_Video_Actions.getPlayerObject( target ).parent().addClass("ut-video-is-playing").removeClass("ut-video-is-paused").closest(".ut-has-background-video").addClass("ut-video-is-playing").removeClass("ut-video-is-paused");

                        } else {

                            UT_Video_Actions.getGlitchCanvas( target).parent().addClass("ut-video-is-playing").removeClass("ut-video-is-paused").closest(".ut-has-background-video").addClass("ut-video-is-playing").removeClass("ut-video-is-paused");

                        }


                    }).catch( function () {

                        // show tooltip to interact with user
                        UT_Video_Actions.showPlayTooltip();

                    });

                }

            },
            pauseVideo: function( target ) {

                if( !this.getPlayerObject(target) ) {
                    return;
                }

                this.getPlayerObject(target).get(0).pause();

                // only execute if sound is active by setting
                if( this.getPlayerObject( target ).data("playSound") === 'on' ) {

                    // mute button
                    this.muteVideo( target );

                }

                // only execute if action is play pause
                if( this.getPlayerObject( target ).data("playAction") === 'play_pause' ) {

                    // play button
                    this.playButtonDeactivate( target );

                }

                // remove video play class
                if( this.getPlayerObject( target ).parent().length ) {

                    this.getPlayerObject( target ).parent().removeClass("ut-video-is-playing").addClass("ut-video-is-paused").closest(".ut-has-background-video").removeClass("ut-video-is-playing").addClass("ut-video-is-paused");


                } else {

                    this.getGlitchCanvas( target).parent().removeClass("ut-video-is-playing").addClass("ut-video-is-paused").closest(".ut-has-background-video").removeClass("ut-video-is-playing").addClass("ut-video-is-paused");

                }

            },
            resetVideo: function( target ) {

                this.getPlayerObject( target ).get(0).currentTime = 0;
                this.getPlayerObject( target ).parent().removeClass("ut-video-is-paused");

            },

            muteVideo: function( target ) {

                // mute player
                this.getPlayerObject( target ).get(0).muted = true;

                // change mute button
                this.muteButtonActivate( target );

            },
            unMuteVideo: function( target ) {

                if( this.manuallyMuted( target ) ) {
                    return;
                }

                // unmute player
                this.getPlayerObject( target ).get(0).muted = false;

                // change mute button
                this.muteButtonDeactivate( target );

            },
            pauseAllVideos: function() {

                // stop all videos playing
                $.each( current_video_sources, function (index, value) {

                    if( value.vimeo !== undefined ) {

                        value.vimeo.pause();

                    }

                    if( value.youtube !== undefined ) {

                        value.youtube.YTPPause();

                    }

                    if( value.selfhosted !== undefined ) {

                        UT_Video_Actions.pauseVideo( value.selfhosted );

                    }

                });


            },
            resumeAllVideos: function() {

                // resume all videos playing
                $.each( current_video_sources, function (index, value) {

                    // do not resume hover videos
                    if( value.play_event === 'on_hover' ) {
                        return;
                    }

                    if( value.vimeo !== undefined ) {

                        value.vimeo.play();

                    }

                    if( value.youtube !== undefined ) {

                        value.youtube.YTPPlay();

                    }

                    if( value.selfhosted !== undefined ) {

                        UT_Video_Actions.playVideo( value.selfhosted );

                    }


                });

            }


        };


        /*
         * Video CSS Filters
         */

        var UT_Video_Filter = {

            defaultFilters: {
                grayscale : { unit: "%" },
                hue_rotate: { unit: "deg" },
                invert    : { unit: "%" },
                opacity   : { unit: "%" },
                saturate  : { unit: "%" },
                sepia     : { unit: "%" },
                brightness: { unit: "%" },
                contrast  : { unit: "%" },
                blur      : { unit: "px" }
            },
            enableFilters: function( $video, filters ) {

                var filterStyle = "";

                for(var key in filters) {

                    if( key === 'action' ) {
                        continue;
                    }

                    if( this.defaultFilters[key].unit ) {

                        filterStyle += key.replace("_", "-") + "(" + filters[key] + this.defaultFilters[key].unit + ") ";

                    }

                }

                // find closest section
                var $section = $video.closest('.ut-has-background-video');

                // mouse filter action (add)
                if( filters['action'] === 'add' ) {

                    $section.on("mouseenter", function(){

                        $video.css("-webkit-filter", filterStyle);
                        $video.css("filter", filterStyle);

                        if( filters.blur !== 'undefined' && filters.blur > 0 ) {

                            // add zoom to avoid edges
                            UT_Video_Filter.addZoom($video, filters);

                        }

                    });

                    $section.on("mouseleave", function(){

                        UT_Video_Filter.disableFilters( $video, filters );

                    });

                }

                // mouse filter action (remove)
                if( filters['action'] === 'remove' ) {

                    $video.css("-webkit-filter", filterStyle);
                    $video.css("filter", filterStyle);

                    if( filters.blur !== 'undefined' && filters.blur > 0 ) {

                        UT_Video_Filter.addZoom($video, filters);

                    }

                    $section.on("mouseenter", function(){

                        UT_Video_Filter.disableFilters( $video, filters );

                    });

                    $section.on("mouseleave", function(){

                        $video.css("-webkit-filter", filterStyle);
                        $video.css("filter", filterStyle);

                        if( filters.blur !== 'undefined' && filters.blur > 0 ) {

                            UT_Video_Filter.addZoom($video, filters);

                        }

                    });


                }

                // no mouse filter action
                if( filters['action'] === 'none' ) {

                    $video.css("-webkit-filter", filterStyle);
                    $video.css("filter", filterStyle);

                    if( filters.blur !== 'undefined' && filters.blur > 0 ) {

                        UT_Video_Filter.addZoom($video, filters);

                    }

                }

            },
            disableFilters: function( $video, filters ) {

                $video.css("-webkit-filter", 'none');
                $video.css("filter", 'none');

                if( filters.blur !== 'undefined' ) {

                    // UT_Video_Filter.removeZoom($video); // @todo check blur - transform translate 3d

                }

            },
            addZoom: function( $video, filters ) {

                // add zoom to avoid edges
                $video.css("-webkit-transform", 'scale(' + ( 1 + 0.006 * filters.blur ) + ')');
                $video.css("transform", 'scale(' + ( 1 + 0.006 * filters.blur ) + ')');

            },
            removeZoom: function( $video ) {

                // remove zoom
                $video.css("-webkit-transform", 'scale(1)');
                $video.css("transform", 'scale(1)');

            }

        };


        /* Init Videos */
        window.UT_Video = {

            init: function () {

                this.init_youtube();
                this.init_vimeo();
                this.init_selfhosted();


            },

            init_youtube : function () {



            },

            init_vimeo : function () {



            },

            init_selfhosted : function () {

                if( $(".ut-selfvideo-player").exists() ) {

                    /*
                     * Loop through Player and assign parent events if event on_hover
                     */

                    $('.ut-selfvideo-player').each( function() {

                        var $this   = $(this),
                            id      = $this.data('id'),
                            filters = $this.data('filters'),
                            volume  = $this.attr("volume") / 100;

                        if( $this.hasClass('ut-video-initialized') ) {
                            return;
                        }

                        $this.addClass('ut-video-initialized');

                        current_video_sources.push({ selfhosted : id, play_event: $this.data('playEvent') });

                        // apply css filter
                        if( filters ) {
                            UT_Video_Filter.enableFilters( $this, filters );
                        }

                        // set volume
                        UT_Video_Actions.setVolume( id, volume );

                        // bind play actions
                        $this.on('play', function () {

                            if( $this.data("controlsPlayEvent") !== 'play_lightbox' ) {

                                // adjust play button state
                                UT_Video_Actions.playButtonActivate( id );

                            }

                        });

                        // on load of website
                        if( $this.data('playEvent') === 'on_load' ) {

                            if( $this.data('ut-wait') ) {

                                window.wait_for_reveal( '#' + $this.data('ut-wait'), function () {

                                    // show video controls
                                    $('.ut-video-controls[data-for="' + id + '"]').addClass('ut-video-controls-visible');

                                    // Play Video
                                    UT_Video_Actions.playVideo( id );

                                } );

                            } else {

                                // show video controls
                                $('.ut-video-controls[data-for="' + id + '"]').addClass('ut-video-controls-visible');

                                // Play Video
                                UT_Video_Actions.playVideo( id );

                            }

                        }

                        // mouse over event
                        if( $this.data('playEvent') === 'on_hover' ) {

                            $this.closest('.ut-has-background-video').addClass('ut-trigger-selfvideo-player').data('for', $this.data('id') );

                            // show video controls
                            $('.ut-video-controls[data-for="' + id + '"]').addClass('ut-video-controls-visible');

                        }

                        // appear event
                        if( $this.data('playEvent') === 'on_appear' ) {

                            // check if appear offset is already set
                            var appear_offset = $this.closest('.ut-has-background-video').data('appear-top-offset') ? $this.closest('.ut-has-background-video').data('appear-top-offset') : 'full';

                            $this.closest('.ut-has-background-video').addClass('ut-appear-selfvideo-player').data( {'for' : $this.data('id'), 'appear-top-offset' : appear_offset } );

                        }

                        /*
                        * Video Play / Pause Controls
                        */

                        var $video_play_control = $('.ut-video-play-control[data-for="' + id + '"]');

                        // bind click
                        $video_play_control.on("click", function(event) {

                            var $that = $(this);

                            // default play pause button
                            if( $that.data('event-type') === 'play_pause' ) {

                                if( $that.hasClass("ut-video-play-control-play") ) {

                                    UT_Video_Actions.setManuallyPaused( $that.data('for'), false );
                                    UT_Video_Actions.playVideo( $that.data('for') );

                                } else {

                                    UT_Video_Actions.setManuallyPaused( $that.data('for'), true );
                                    UT_Video_Actions.pauseVideo( $that.data('for') );

                                }

                            }

                            event.preventDefault();

                        });

                        // LightGallery Events
                        if( $this.data("controlsPlayEvent") === 'play_lightbox' ) {

                            // add LightGallery to this Video
                            $video_play_control.ut_require_js({
                                plugin: 'lightGallery',
                                source: 'lightGallery',
                                callback : function ( element ) {

                                    element.lightGallery({
                                        selector: "this",
                                        download: site_settings.lg_download,
                                        mode: site_settings.lg_mode,
                                        videoMaxWidth: site_settings.site_width + 'px',
                                        autoplayFirstVideo: true,
                                        hash: false
                                    });

                                }

                            });

                            // add event listeners
                            $video_play_control.on('onBeforeOpen.lg',function(){

                                UT_Video_Actions.pauseAllVideos();

                            });

                            // add event listeners
                            $video_play_control.on('onCloseAfter.lg',function(){

                                UT_Video_Actions.resumeAllVideos();

                            });

                        }

                    });

                }

            }





        };

        UT_Video.init_selfhosted();

        // Initialize Videos After Ajax
        $(document).ajaxComplete(function ( event, request, settings ) {

            // required for inview to register new elements
            $(window).scroll();

            // add observer to new elements
            ut_video_observer.observe();

            // init videos
            UT_Video.init_selfhosted();

        });
































        /*
         * Youtube Video
         */


        $(".ut-video-section-player-youtube").ut_require_js({
            plugin: 'YTPlayer',
            source: 'ytplayer',
            callback: function (element) {

                element.each( function() {

                    var $this       = $(this),
                        id          = $this.data('id'),
                        filters     = $this.data('filters'),
                        properties  = $this.data('property');


                    // run player
                    $this.YTPlayer();

                    // add player to current player array
                    current_video_sources.push({ youtube : $this, play_event: $this.data('playEvent') });

                    // bind play action
                    $this.on('YTPPlay', function() {

                        if( $this.data("controlsPlayEvent") === 'play_lightbox' ) {
                            return;
                        }

                        // temporary fix for loading sound issue
                        $this.YTPSetVolume( properties.vol );

                        // change play button
                        UT_Video_Actions.playButtonActivate( id );

                    });

                    // bind pause action
                    $this.on('YTPPause', function() {

                        if( $this.data("controlsPlayEvent") === 'play_lightbox' ) {
                            return;
                        }

                        // change play button
                        UT_Video_Actions.playButtonDeactivate( id );


                    });

                    $this.on("YTPPlay",function() {

                        $this.parent().find('.mbYTP_wrapper').addClass("ut-video-is-playing").removeClass("ut-video-is-paused");

                    });

                    $this.on("YTPPause",function() {

                        $this.parent().find('.mbYTP_wrapper').addClass("ut-video-is-paused").removeClass("ut-video-is-playing");

                    });


                    // player is ready
                    $this.on("YTPReady",function() {

                        var $section = '';

                        // temporary fix for loading sound issue
                        $this.YTPSetVolume( properties.vol );

                        // show video controls
                        $('.ut-video-controls[data-for="' + id + '"]').addClass('ut-video-controls-visible');

                        // apply filter
                        if( filters ) {

                            UT_Video_Filter.enableFilters( $($this.YTPGetPlayer().a ), filters );

                        }

                        // on load of website
                        if( $this.data('playEvent') === 'on_load' ) {

                            // play video
                            setTimeout(function(){

                                $this.YTPPlay();

                            }, 100 );

                            if( $this.data("controlsPlayEvent") !== 'play_lightbox' ) {

                                // adjust play button state
                                UT_Video_Actions.playButtonActivate( id );

                            }

                        }

                        // mouse over event
                        if( $this.data('playEvent') === 'on_hover' ) {

                            // find closest section
                            $section = $this.closest('.ut-has-background-video');

                            // bind events
                            $section.on("mouseenter", function(){

                                if( $this.data('manually-paused') ) {
                                    return;
                                }

                                $this.YTPPlay();

                            });

                            $section.on("mouseleave", function(){

                                if( $this.data('manually-paused') ) {
                                    return;
                                }

                                $this.YTPPause();

                            });

                        }

                        // appear event
                        if( $this.data('playEvent') === 'on_appear' ) {

                            // find closest section
                            $this.closest('.ut-has-background-video').addClass('ut-appear-youtube-player').data( {'for' : id, 'appear-top-offset' : 'full'} ).on('inview', function( event, isInView ){


                                /* var video_container_id = $(event.target).data('for'),
                                    $video = $('#ut-selfvideo-player-' + video_container_id );

                                if( $video.data('ut-wait') && $video.data('ut-wait').length > 1 ) {

                                    window.wait_for_reveal( '#' + $video.data('ut-wait'), function () {

                                        UT_Video_Actions.playVideo( $(event.target).data('for') );

                                        // show video controls
                                        $('.ut-video-controls[data-for="' + $(event.target).data('for') + '"]').addClass('ut-video-controls-visible');

                                    } );

                                } else {

                                    UT_Video_Actions.playVideo( $(event.target).data('for') );

                                    // show video controls
                                    $('.ut-video-controls[data-for="' + $(event.target).data('for') + '"]').addClass('ut-video-controls-visible');

                                } */



                                if( isInView ) {

                                    if( $this.data('manually-paused') ) {
                                        return;
                                    }

                                    $this.YTPPlay();

                                } else {

                                    if( $this.data('manually-paused') ) {
                                        return;
                                    }

                                    $this.YTPPause();

                                }

                            });

                        }

                    });

                    $this.on("YTPEnd",function(){

                        if( properties.loop ) {
                            return;
                        }

                        // hide video controls
                        $('.ut-video-controls[data-for="' + id + '"]').removeClass('ut-video-controls-visible');

                    });


                    /*
                     * Youtube Video Audio Controls
                     */

                    var $video_audio_control = $('.ut-video-audio-control[data-for="' + id + '"]');

                    $video_audio_control.on("click", function(event){

                        var $that  = $(this);

                        if (!$that.hasClass("ut-video-audio-control-off")) {

                            $that.removeClass("ut-video-audio-control-on").addClass("ut-video-audio-control-off");
                            $that.find('.ut-video-audio-control-soundbar-wrap span').text( $that.find('.ut-video-audio-control-soundbar-wrap span').data("off") );

                            $this.YTPMute();

                        } else {

                            $that.removeClass("ut-video-audio-control-off").addClass("ut-video-audio-control-on");
                            $that.find('.ut-video-audio-control-soundbar-wrap span').text( $that.find('.ut-video-audio-control-soundbar-wrap span').data("on") );

                            $this.YTPUnmute();

                        }

                        event.preventDefault();

                    });





                    /*
                     * Youtube Video Play / Pause Controls
                     */

                    var $video_play_control = $('.ut-video-play-control[data-for="' + id + '"]');

                    // bind click
                    $video_play_control.on("click", function(event){

                        var $that = $(this);

                        if( $that.data('eventType') === 'play_pause' ) {

                            if ($that.hasClass("ut-video-play-control-pause")) {

                                $that.removeClass("ut-video-play-control-pause");
                                $this.data( 'manually-paused', true ).YTPPause();

                            } else {

                                $that.addClass("ut-video-play-control-pause");
                                $this.data('manually-paused', false ).YTPPlay();

                            }

                        }

                        event.preventDefault();

                    });

                    // LightGallery Event
                    if( $this.data("controlsPlayEvent") === 'play_lightbox' ) {

                        $video_play_control.ut_require_js({
                            plugin: 'lightGallery',
                            source: 'lightGallery',
                            callback : function ( element ) {

                                element.lightGallery({
                                    selector: "this",
                                    download: site_settings.lg_download,
                                    mode: site_settings.lg_mode,
                                    videoMaxWidth: site_settings.site_width + 'px',
                                    autoplayFirstVideo: true,
                                    hash: false
                                });

                            }

                        });

                        // add event listeners
                        $video_play_control.on('onBeforeOpen.lg',function(event){

                            UT_Video_Actions.pauseAllVideos();

                        });


                        // add event listeners
                        $video_play_control.on('onCloseAfter.lg',function(event){

                            UT_Video_Actions.resumeAllVideos();

                        });

                    }

                });

            }
        });


        /*
         * Vimeo Video
         */

        $(".ut-video-section-player-vimeo").ut_require_js({
            plugin: 'Vimeo',
            source: 'vimeo',
            callback: function (element) {

                element.each( function(){

                    var $this       = $(this),
                        id          = $this.data('id'),
                        filters     = $this.data('filters'),
                        properties  = $this.data('property'),
                        is_playing  = false;

                    // vimelar
                    $this.vimelar(properties);

                    // vimeo
                    var $vimeo        = $("#vimelar-player-" + id);
                    var vimeo_player  = new Vimeo.Player( $vimeo.get(0) );

                    // add player to player array of current videos
                    current_video_sources.push({ vimeo: vimeo_player, play_event: $this.data('playEvent') });

                    // bind play actions
                    vimeo_player.on('play', function() {

                        if( $this.data("controlsPlayEvent") === 'play_lightbox' ) {
                            return;
                        }

                        UT_Video_Actions.playButtonActivate( id );
                        is_playing = true;

                    });

                    vimeo_player.on('pause', function() {

                        if( $this.data("controlsPlayEvent") === 'play_lightbox' ) {
                            return;
                        }

                        UT_Video_Actions.playButtonDeactivate( id );
                        is_playing = false;

                    });

                    // vimeo video loaded
                    vimeo_player.on("loaded", function() {

                        var $section = '';

                        // apply filter
                        if( filters ) {
                            UT_Video_Filter.enableFilters( $vimeo, filters );

                        }

                        // adjust volume
                        if( properties.sound === 'on' ) {

                            vimeo_player.setVolume(properties.parameters.volume/100);

                        }

                        // show video controls
                        $('.ut-video-controls[data-for="' + id + '"]').addClass('ut-video-controls-visible');

                        // show video
                        $("#vimelar-container-" + id).addClass("ut-vimeo-loaded");

                        // on load of website
                        if( $this.data('playEvent') === 'on_load' ) {

                            // play video
                            vimeo_player.play();

                            if( $this.data("controlsPlayEvent") !== 'play_lightbox' ) {

                                // adjust play button state
                                UT_Video_Actions.playButtonActivate( id );

                            }

                        }

                        // mouse over event
                        if( $this.data('playEvent') === 'on_hover' ) {

                            // find closest section
                            $section = $this.closest('.ut-has-background-video');

                            // bind events
                            $section.on("mouseenter", function(){

                                if( $this.data('manually-paused') || is_playing ) {
                                    return;
                                }

                                vimeo_player.play();

                            });

                            $section.on("mouseleave", function(){

                                if( $this.data('manually-paused') || !is_playing ) {
                                    return;
                                }

                                vimeo_player.pause();

                            });

                        }


                        // appear event
                        if( $this.data('playEvent') === 'on_appear' ) {

                            // find closest section
                            $this.closest('.ut-has-background-video').addClass('ut-appear-vimeo-player').data( {'for' : id, 'appear-top-offset' : 'full'} ).on('inview', function( event, isInView ){

                                if( isInView ) {

                                    if( $this.data('manually-paused') ) {
                                        return;
                                    }

                                    vimeo_player.play();

                                } else {

                                    if( $this.data('manually-paused') ) {
                                        return;
                                    }

                                    vimeo_player.pause();

                                }

                            });

                        }

                    });

                    vimeo_player.on("ended", function() {

                        if( properties.loop ) {
                            return;
                        }

                        // hide video controls
                        $('.ut-video-controls[data-for="' + id + '"]').removeClass('ut-video-controls-visible');


                    });

                    /*
                     * Vimeo Video Audio Controls
                     */

                    $('.ut-video-audio-control[data-for="' + id + '"]').on("click", function(event){

                        var $that = $(this);

                        if( $that.hasClass("ut-video-audio-control-off") ) {

                            $that.removeClass("ut-video-audio-control-off").addClass("ut-video-audio-control-on");
                            $that.find('.ut-video-audio-control-soundbar-wrap span').text( $that.find('.ut-video-audio-control-soundbar-wrap span').data("on") );

                            vimeo_player.setVolume( parseInt( $that.data('volume') ) / 100 );

                        } else {

                            $that.removeClass("ut-video-audio-control-on").addClass("ut-video-audio-control-off");
                            $that.find('.ut-video-audio-control-soundbar-wrap span').text( $that.find('.ut-video-audio-control-soundbar-wrap span').data("off") );

                            vimeo_player.setVolume(0);

                        }

                        event.preventDefault();

                    });

                    /*
                     * Vimeo Video Play / Pause Controls
                     */

                    var $video_play_control = $('.ut-video-play-control[data-for="' + id + '"]');

                    // bind click
                    $video_play_control.on("click", function(event){

                        var $that = $(this);

                        if( $that.data('eventType') === 'play_pause' ) {

                            if ($that.hasClass("ut-video-play-control-pause")) {

                                $that.removeClass("ut-video-play-control-pause");
                                vimeo_player.data( 'manually-paused', true ).pause();

                            } else {

                                $that.addClass("ut-video-play-control-pause");
                                vimeo_player.data( 'manually-paused', false ).play();

                            }

                        }

                        event.preventDefault();

                    });

                    // LightGallery Event
                    if( $this.data("controlsPlayEvent") === 'play_lightbox' ) {

                        $video_play_control.ut_require_js({
                            plugin: 'lightGallery',
                            source: 'lightGallery',
                            callback : function ( element ) {

                                element.lightGallery({
                                    selector: "this",
                                    download: site_settings.lg_download,
                                    mode: site_settings.lg_mode,
                                    videoMaxWidth: site_settings.site_width + 'px',
                                    autoplayFirstVideo: true,
                                    hash: false
                                });

                            }

                        });

                        // add event listeners
                        $video_play_control.on('onBeforeOpen.lg',function(event){

                            UT_Video_Actions.pauseAllVideos();

                        });

                        // add event listeners
                        $video_play_control.on('onCloseAfter.lg',function(event){

                            UT_Video_Actions.resumeAllVideos();

                        });

                    }

                });

            }
        });







        /**
         * Selfhosted Glitch Video
         */

        if( $(".ut-selfhosted-glitch-video").exists() ) {

            /*
             * Loop through Player and assign parent events if event on_hover
             */

            $(window).on('load', function(){

                $('.ut-selfhosted-glitch-video').each( function(){

                    var $container = $(this),
                        id         = $container.data('id');

                    // Create Glitch Effect
                    glitch_videos[id] = new UT_Glitch_Video({
                            src: $container.data("mp4"),
                            type: 'video/mp4',
                            muted: $container.data('muted'),
                            autoplay: $container.data('autoplay')
                        }, requestAnimationFrame( function () {
                            sync_video_canvas(
                                document.getElementById("ut-glitch-canvas-" + id ), id, 0, 30 )
                        })
                    );

                    // The Video Player
                    var $video = $( glitch_videos[$container.data("id")].video );

                    // Additional Settings
                    var filters = $container.data('filters'),
                        volume  = $container.data("volume") / 100;

                    // @todo check
                    current_video_sources.push({ selfhosted : id, play_event: $container.data('playEvent') });

                    // apply css filter
                    if( filters ) {
                        UT_Video_Filter.enableFilters( $video, filters );
                    }

                    // set volume
                    UT_Video_Actions.setVolume( id, volume );

                    // bind play actions
                    $video.on('play', function () {

                        if( $container.data("controlsPlayEvent") !== 'play_lightbox' ) {

                            // adjust play button state
                            UT_Video_Actions.playButtonActivate( id );

                        }

                    });

                    // on load of website
                    if( $container.data('playEvent') === 'on_load' ) {

                        // Play Video
                        UT_Video_Actions.playVideo( id );

                        // show video controls
                        $('.ut-video-controls[data-for="' + id + '"]').addClass('ut-video-controls-visible');

                    }

                    // mouse over event
                    if( $container.data('playEvent') === 'on_hover' ) {

                        $container.closest('.ut-has-background-video').addClass('ut-trigger-selfvideo-player').data('for', $container.data('id') );

                        // show video controls
                        $('.ut-video-controls[data-for="' + id + '"]').addClass('ut-video-controls-visible');

                    }

                    // appear event
                    if( $container.data('playEvent') === 'on_appear' ) {

                        $container.closest('.ut-has-background-video').addClass('ut-appear-selfvideo-player').data( {'for' : $container.data('id'), 'appear-top-offset' : 'full'} );

                    }

                    /*
                    * Video Play / Pause Controls
                    */

                    var $video_play_control = $('.ut-video-play-control[data-for="' + id + '"]');

                    // bind click
                    $video_play_control.on("click", function(event) {

                        var $that = $(this);

                        // default play pause button
                        if( $that.data('event-type') === 'play_pause' ) {

                            if( $that.hasClass("ut-video-play-control-play") ) {

                                UT_Video_Actions.setManuallyPaused( $that.data('for'), false );
                                UT_Video_Actions.playVideo( $that.data('for') );

                            } else {

                                UT_Video_Actions.setManuallyPaused( $that.data('for'), true );
                                UT_Video_Actions.pauseVideo( $that.data('for') );

                            }

                        }

                        event.preventDefault();

                    });

                    // LightGallery Events
                    if( $container.data("controlsPlayEvent") === 'play_lightbox' ) {

                        // add LightGallery to this Video
                        $video_play_control.ut_require_js({
                            plugin: 'lightGallery',
                            source: 'lightGallery',
                            callback : function ( element ) {

                                element.lightGallery({
                                    selector: "this",
                                    download: site_settings.lg_download,
                                    mode: site_settings.lg_mode,
                                    videoMaxWidth: site_settings.site_width + 'px',
                                    autoplayFirstVideo: true,
                                    hash: false
                                });

                            }

                        });

                        // add event listeners
                        $video_play_control.on('onBeforeOpen.lg',function(){

                            UT_Video_Actions.pauseAllVideos();

                        });

                        // add event listeners
                        $video_play_control.on('onCloseAfter.lg',function(){

                            UT_Video_Actions.resumeAllVideos();

                        });

                    }


                });

            });

        }


        /*
         * Selfhosted Video Audio Control
         */

        $(document).on("click", '.ut-video-audio-control[data-source="selfhosted"]' , function() {

            var $this = $(this);

            if( $this.hasClass('ut-video-audio-control-on') ) {

                UT_Video_Actions.setManuallyMuted( $this.data('for'), true );

            } else {

                UT_Video_Actions.setManuallyMuted( $this.data('for'), false );

            }

        });


        /*
         * Selfhosted Video Play on Parent Mouse Event
         */

        $(document).on("mouseenter" , '.ut-trigger-selfvideo-player' , function() {

            UT_Video_Actions.playVideo( $(this).data('for') );

        });

        $(document).on("mouseleave" , '.ut-trigger-selfvideo-player' , function() {

            UT_Video_Actions.pauseVideo( $(this).data('for') ); // pause
            // UT_Video_Actions.resetVideo( $(this).data('for') ); // reset video @todo

        });


        /*
         * Selfhosted Audio Control Event
         */

        $(document).on("click", '.ut-video-audio-control[data-source="selfhosted"]', function( event ) {

            var $this = $(this);

            if( $this.hasClass( UT_Video_Actions.audioControlActiveClass ) ) {

                UT_Video_Actions.muteVideo( $this.data('for') );

            } else {

                UT_Video_Actions.unMuteVideo( $this.data('for') );

            }

            event.preventDefault();

        });


    });

    window.UT_Self_Video_Events = {

        init: function () {

            this.init_inview();

        },

        init_inview: function () {

            $('.ut-appear-selfvideo-player').on('inview', function( event, isInView ){

                if( isInView ) {

                    var video_container_id = $(event.target).data('for'),
                        $video = $('#ut-selfvideo-player-' + video_container_id );

                    if( $video.data('ut-wait') && $video.data('ut-wait').length > 1 ) {

                        window.wait_for_reveal( '#' + $video.data('ut-wait'), function () {

                            UT_Video_Actions.playVideo( $(event.target).data('for') );

                            // show video controls
                            $('.ut-video-controls[data-for="' + $(event.target).data('for') + '"]').addClass('ut-video-controls-visible');

                        } );

                    } else {

                        UT_Video_Actions.playVideo( $(event.target).data('for') );

                        // show video controls
                        $('.ut-video-controls[data-for="' + $(event.target).data('for') + '"]').addClass('ut-video-controls-visible');

                    }

                    $(event.target).addClass("inView");

                } else {

                    UT_Video_Actions.pauseVideo( $(event.target).data('for') );

                    // show video controls
                    $('.ut-video-controls[data-for="' + $(event.target).data('for') + '"]').addClass('ut-video-controls-visible');

                    $(event.target).removeClass("inView");

                }

            });


        }

    };

    $(window).on('load', function(){

        /*
         * Selfhosted Appear Event
         */

        setTimeout( function(){

            UT_Self_Video_Events.init();

        }, 100 );

    });

    // check for forced video heights
    var ut_force_video_height = function() {

        $(".ut-force-video-aspect-ratio:not(.ut-vimelar-container)").each( function() {

            var $this = $(this),
                after_style = window.getComputedStyle(
                    document.querySelector( "#" + $this.attr("id") ), ":after"
                );

            var $container_parent = $this.closest(".ut-has-background-video:not(.hero)");

            $container_parent.css("min-height", after_style.height );

            if( $container_parent.hasClass('ut-hover-box-back') ) {

                $container_parent.siblings('.ut-hover-box-front').css("min-height", after_style.height );

            }

            var $flickity = $this.closest(".ut-content-carousel");

            if( $flickity.length ) {

                $flickity.flickity('resize');

            }


        });

    };

    $(document).ready(ut_force_video_height);
    $(window).on( "load", ut_force_video_height ).utresize( ut_force_video_height );

})(jQuery);
/* ]]> */