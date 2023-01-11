/*
 * QueryLoader v2 - A simple script to create a preloader for images
 *
 * For instructions read the original post:
 * http://www.gayadesign.com/diy/queryloader2-preload-your-images-with-ease/
 *
 * Copyright (c) 2011 - Gaya Kessler
 *
 * Licensed under the MIT license:
 *   http://www.opensource.org/licenses/mit-license.php
 *
 * Version:  2.2
 * Last update: 03-04-2012
 *
 */
(function($) {
	/*Browser detection patch*/
	jQuery.browser = {};
	jQuery.browser.mozilla = /mozilla/.test(navigator.userAgent.toLowerCase()) && !/webkit/.test(navigator.userAgent.toLowerCase());
	jQuery.browser.webkit = /webkit/.test(navigator.userAgent.toLowerCase());
	jQuery.browser.opera = /opera/.test(navigator.userAgent.toLowerCase());
	jQuery.browser.msie = /msie/.test(navigator.userAgent.toLowerCase());

    if (!Array.prototype.indexOf) {
        Array.prototype.indexOf = function (elt /*, from*/) {
            var len = this.length >>> 0;
            var from = Number(arguments[1]) || 0;
            from = (from < 0)
                ? Math.ceil(from)
                : Math.floor(from);
            if (from < 0)
                from += len;

            for (; from < len; from++) {
                if (from in this &&
                    this[from] === elt)
                    return from;
            }
            return -1;
        };
    }

    var qLimages = [];
    var qLdone = 0;
    var qLdestroyed = false;

    var qLimageContainer = "";
    var qLoverlay = "";
    var qLbar = "";
    var qLpercentage = "";
    var qLimageCounter = 0;
    var qLstart = 0;
    var svgDrawDone    = false;
    var svgDrawCheck   = '';
    var svgDrawElement = '';

    var qLoptions = {
        onComplete: function () {},
        backgroundColor: "#000",
        barColor: "#fff",
		textColor: "#fff",
        overlayId: 'qLoverlay',
        barHeight: 1,
		showbar: "on",
        percentage: false,
		loaderLogo: false,
        deepSearch: true,
        completeAnimation: "fade",
        minimumTime: 500,
        onLoadComplete: function () {

            if( preloader_settings.style !== 'text_draw' && preloader_settings.style !== 'text_background_animation' ) {

                if (qLoptions.completeAnimation == "grow") {

                    var animationTime = 500;
                    var currentTime = new Date();

                    if ((currentTime.getTime() - qLstart) < qLoptions.minimumTime) {
                        animationTime = (qLoptions.minimumTime - (currentTime.getTime() - qLstart));
                    }

                    $(qLbar).stop().animate({
                        "width": "100%"
                    }, animationTime, function () {

                        $(this).animate({
                            top: "0%",
                            width: "100%",
                            height: "100%"
                        }, 500, function () {

                            $('#' + qLoptions.overlayId).fadeOut(500, function () {
                                $(this).remove();
                                qLoptions.onComplete();
                            });

                        });

                    });

                } else {

                    $('#' + qLoptions.overlayId).delay(1000).fadeOut(300, function () {
                        $('#' + qLoptions.overlayId).remove();
                        qLoptions.onComplete();
                    });

                }

            } else if( preloader_settings.style !== 'text_draw' ) {

                // wait for draw
                svgDrawCheck = setInterval( function() {

                    if( svgDrawDone ) {

                        clearInterval( svgDrawCheck );

                        svgDrawElement = anime.timeline({
                            autoplay: true
                        });

                        svgDrawElement.add({
                            targets: '#ut-overlay-svg',
                            scale: [1, 10],
                            easing: 'easeInOutQuad',
                            opacity: [1,0],
                            duration: 1200,
                        });

                        $('#' + qLoptions.overlayId).fadeOut( 300, function () {
                            $('#' + qLoptions.overlayId).remove();
                            qLoptions.onComplete();
                        });

                    }

                }, 50 );

            } else if( preloader_settings.style !== 'text_background_animation' ) {

                // wait for draw
                svgDrawCheck = setInterval( function() {

                    if( svgDrawDone ) {

                        clearInterval( svgDrawCheck );

                        $('#' + qLoptions.overlayId).fadeOut( 300, function () {

                            $('#' + qLoptions.overlayId).remove();
                            qLoptions.onComplete();

                        });

                    }

                }, 50 );
            }

        }

    };

    var afterEach = function () {
        
		//start timer
        //qLdestroyed = false;
        var currentTime = new Date();
        qLstart = currentTime.getTime();
		
		createPreloadContainer();
        createOverlayLoader();       
		
    };

    var createPreloadContainer = function() {

        qLimageContainer = $("<div></div>").appendTo("body").css({
            display: "none",
            width: 0,
            height: 0,
            overflow: "hidden"
        });

        for (var i = 0; qLimages.length > i; i++) {

            $.ajax({
                url: qLimages[i],
                type: 'HEAD',
                complete: function (data) {
                    if (!qLdestroyed) {
                        qLimageCounter++;
                        addImageForPreload(this['url']);
                    }
                }
            });

        }        	

    };

    var addImageForPreload = function(url) {

        var image = $("<img />").attr("src", url).bind("load error", function () {
            completeImageLoading();
        }).appendTo(qLimageContainer);

    };

    var completeImageLoading = function () {

        qLdone++;

        var percentage = (qLdone / qLimageCounter) * 100;

        $(qLbar).stop().animate({
            width: percentage + "%",
            minWidth: percentage + "%"
        }, 200);

        if (qLoptions.percentage == true) {
            $(qLpercentage).text(Math.ceil(percentage) + "%");
        }

        if (qLdone == qLimageCounter) {
            destroyQueryLoader();
        }
    };

    var destroyQueryLoader = function () {
        $(qLimageContainer).remove();
        qLoptions.onLoadComplete();
        qLdestroyed = true;
    };

    var createOverlayLoader = function () {
        
		qLoverlay = $("#qLoverlay");
       
	   	var barvisibility = 'visible',
			difference_one = 299;
			difference_two = 0;
	   	
	    if( qLoptions.showbar === "off" ) {
			barvisibility = 'hidden';
			difference_one = 199;
			difference_two = 99;
		}
		
        if( preloader_settings.loader_logo !== '' && preloader_settings.style !== 'style_eight' && preloader_settings.style !== 'text_draw' && preloader_settings.style !== 'text_background_animation' ) {
        
            $("<div id='ut-loader-logo'><img src='"+ preloader_settings.loader_logo +"'></div>").appendTo(qLoverlay.children('.ut-inner-overlay'));
        
        }
       
        /* style 1 */
        if( preloader_settings.style === 'style_one' && qLoptions.showbar === "on" ) {
         	
            qLbar = $("<div id='qLbar'></div>").css({
                height: qLoptions.barHeight + "px",
                backgroundColor: qLoptions.barColor,
                width: "0%",
                marginTop: "20px",
                marginBottom: "20px",
                visibility : barvisibility
            }).appendTo( qLoverlay.children('.ut-inner-overlay') ); 
		
        }
        
        /* style 2 */
        if( preloader_settings.style === 'style_two' ) {
        
            $("<div class='ut-loading-bar-style2'><div class='ut-loading-bar-style2-ball-effect'></div></div><div class='ut-loading-text'><p>" + preloader_settings.loader_text + "</p></div>").appendTo( qLoverlay.children('.ut-inner-overlay') );
            
        }
        
        /* style 3 */
        if( preloader_settings.style === 'style_three' ) {
        
            $("<div class='ut-loading-bar-style3'><span class='ut-loading-bar-style3-outer'><span class='ut-loading-bar-style-3-inner'></span></span></div><div class='ut-loading-text'><p>" + preloader_settings.loader_text + "</p></div>").appendTo( qLoverlay.children('.ut-inner-overlay') );
            
        }
        
        /* style 4 */
        if( preloader_settings.style === 'style_four' ) {
            
            $("#ut-loader-logo").addClass("ut-style4-active");            
            $("<div class='ut-loading-bar-style4'><div class='ut-loader__bar4'></div><div class='ut-loader__bar4'></div><div class='ut-loader__bar4'></div><div class='ut-loader__bar4'></div><div class='ut-loader__bar4'></div><div class='ut-loader__ball4'></div></div><div class='ut-loading-text'><p>" + preloader_settings.loader_text + "</p></div>").appendTo( qLoverlay.children('.ut-inner-overlay') );
            
        }
        
        /* style 5 */
        if( preloader_settings.style === 'style_five' ) {
        
            $("<div class='ut-loading-bar-style5'><div class='ut-loading-bar-style5-inner'><label>    ●</label><label>    ●</label><label>    ●</label><label>    ●</label><label>    ●</label><label>    ●</label></div></div><div class='ut-loading-text'><p>" + preloader_settings.loader_text + "</p></div>").appendTo( qLoverlay.children('.ut-inner-overlay') );
            
        }

        /* style 6 */
        if( preloader_settings.style === 'style_six' ) {
            
            $('<div class="sk-cube-grid"><div class="sk-cube sk-cube1"></div><div class="sk-cube sk-cube2"></div><div class="sk-cube sk-cube3"></div><div class="sk-cube sk-cube4"></div><div class="sk-cube sk-cube5"></div><div class="sk-cube sk-cube6"></div><div class="sk-cube sk-cube7"></div><div class="sk-cube sk-cube8"></div><div class="sk-cube sk-cube9"></div><p></p></div>').appendTo( qLoverlay.children('.ut-inner-overlay') );
        
        }
        
        /* style 7 */
        if( preloader_settings.style === 'style_seven' ) {
            
            $('<div class="ut-page-loader-spinner"><div class="ut-double-bounce1"></div><div class="ut-double-bounce2"></div></div>').appendTo( qLoverlay.children('.ut-inner-overlay') );
        
        }
        
        /* style 8 */
        if( preloader_settings.style === 'style_eight' ) {
            
            $(preloader_settings.text_logo).appendTo( qLoverlay.children('.ut-inner-overlay') );
        
        }

        function resizeSVG() {

            if( $("#ut-overlay-svg").length && $("#ut-stroke-offset-group").length ) {

                var svg  = $("#ut-overlay-svg").get(0);
                var text = $("#ut-stroke-offset-group").get(0);
                var bbox = text.getBBox();

                svg.setAttribute("width", Math.round( bbox.width ) );
                svg.setAttribute("height", Math.round( bbox.height * 1.1 ) );
                svg.setAttribute("viewBox", '0 0 ' + Math.round( bbox.width ) + ' ' + Math.round( bbox.height * 1.1 ) );

            }

        }

        /* text draw */
        if( preloader_settings.style === 'text_draw' ) {

            $(window).utresize(function(){

                resizeSVG();

            });

            resizeSVG();

            $('.ut-overlay-svg-text', '#ut-overlay-svg').delay(400).queue( function(){

                $('#ut-overlay-svg').addClass('loaded');

                svgDrawElement = anime.timeline({
                    autoplay: true,
                    complete: function() {
                        svgDrawDone = true;
                    }

                });

                svgDrawElement.add({
                    targets: '.ut-overlay-svg-text',
                    fill: {
                        value: [ preloader_settings.text_start_color, preloader_settings.text_end_color ],
                        duration: 800,
                        easing: 'easeOutBack',
                        delay: 1000
                    },
                });

            });


        }

        /* text draw */
        if( preloader_settings.style === 'text_background_animation' ) {

            var $text_wrap  = $('#ut-overlay-animated-text-wrap');
            var $text       = $('#ut-overlay-animated-text');
            var $text_inner = $('#ut-overlay-animated-text > div');
            var $text_bg    = $('#ut-overlay-animated-background-text');

            $text_wrap.height( $text_bg.height() ).addClass('calculated');
            $text.height( $text_bg.height() );
            $text_inner.height( $text_bg.height() );

            var $original_width = $text_bg.width();

            $text.delay( 800 ).animate({
                now: $original_width
            }, {
                duration : 1600,
                step: function( now ) {

                    $text.css('width', $original_width - now );
                    $text_inner.css('left', -1 * now );

                },
                start: function() {

                    $text.addClass('start');
                    $text_bg.addClass('start');

                },
                complete: function () {

                    svgDrawDone = true;

                }

            });

        }

		if ( preloader_settings.loader_percentage === 'on' && preloader_settings.style === 'style_one' ) {
            
            qLpercentage = $("<div id='qLpercentage'></div>").text("0%").css({
                textAlign: "center",
                marginTop: "20px",
                color: qLoptions.textColor
            }).appendTo(qLoverlay.children('.ut-inner-overlay'));
            
        }
		
        
        if ( !qLimages.length ) {
        	destroyQueryLoader();
        }        
        
    };

    var findImageInElement = function (element) {

        var $element = $(element),
            url = "";

        if( $element.css("background-image") !== "none" ) {

            url = $element.css("background-image");

        } else if( $element.data('background-image') ) {

            url = $element.data('background-image');

        } else if( $element.hasClass('ut-lazy') && $element.data('src') && !$element.data('adaptive-images') ) {

            url = $element.data('src');

        } else if( $element.hasClass('ut-adaptive-image') && $element.data('adaptive-images') && !$element.hasClass('ut-lazy-wait') ) {

            url = UT_Adaptive_Images.get_responsive_image( $element, false );

        } else if (typeof($element.attr("src")) != "undefined" && element.nodeName.toLowerCase() == "img") {

            url = $element.attr("src");

        }

        if( url && url.indexOf("gradient") === -1 ) {

            url = url.replace(/url\(\"/g, "");
            url = url.replace(/url\(/g, "");
            url = url.replace(/\"\)/g, "");
            url = url.replace(/\)/g, "");

            var urls = url.split(", ");

            for (var i = 0; i < urls.length; i++) {
                if (urls[i].length > 0 && qLimages.indexOf(urls[i]) == -1 && !urls[i].match(/^(data:)/i)) {
                    var extra = "";
                    if ($.browser.msie && $.browser.version < 9) {
                        extra = "?" + Math.floor(Math.random() * 3000);
                    }
                    qLimages.push(urls[i] + extra);
                }
            }

        }

    };

    $.fn.queryLoader2 = function(options) {
        if(options) {
            $.extend(qLoptions, options );
        }

        this.each(function() {
            findImageInElement(this);
            if (qLoptions.deepSearch == true) {
                $(this).find("*:not(script)").each(function() {
                    findImageInElement(this);
                });
            }
        });

        afterEach();

        return this;
    };

    //browser detect
    var BrowserDetect = {
        init: function () {
            this.browser = this.searchString(this.dataBrowser) || "An unknown browser";
            this.version = this.searchVersion(navigator.userAgent)
                || this.searchVersion(navigator.appVersion)
                || "an unknown version";
            this.OS = this.searchString(this.dataOS) || "an unknown OS";
        },
        searchString: function (data) {
            for (var i=0;i<data.length;i++)	{
                var dataString = data[i].string;
                var dataProp = data[i].prop;
                this.versionSearchString = data[i].versionSearch || data[i].identity;
                if (dataString) {
                    if (dataString.indexOf(data[i].subString) != -1)
                        return data[i].identity;
                }
                else if (dataProp)
                    return data[i].identity;
            }
        },
        searchVersion: function (dataString) {
            var index = dataString.indexOf(this.versionSearchString);
            if (index == -1) return;
            return parseFloat(dataString.substring(index+this.versionSearchString.length+1));
        },
        dataBrowser: [
            {
                string: navigator.userAgent,
                subString: "Chrome",
                identity: "Chrome"
            },
            { 	string: navigator.userAgent,
                subString: "OmniWeb",
                versionSearch: "OmniWeb/",
                identity: "OmniWeb"
            },
            {
                string: navigator.vendor,
                subString: "Apple",
                identity: "Safari",
                versionSearch: "Version"
            },
            {
                prop: window.opera,
                identity: "Opera",
                versionSearch: "Version"
            },
            {
                string: navigator.vendor,
                subString: "iCab",
                identity: "iCab"
            },
            {
                string: navigator.vendor,
                subString: "KDE",
                identity: "Konqueror"
            },
            {
                string: navigator.userAgent,
                subString: "Firefox",
                identity: "Firefox"
            },
            {
                string: navigator.vendor,
                subString: "Camino",
                identity: "Camino"
            },
            {		// for newer Netscapes (6+)
                string: navigator.userAgent,
                subString: "Netscape",
                identity: "Netscape"
            },
            {
                string: navigator.userAgent,
                subString: "MSIE",
                identity: "Explorer",
                versionSearch: "MSIE"
            },
            {
                string: navigator.userAgent,
                subString: "Gecko",
                identity: "Mozilla",
                versionSearch: "rv"
            },
            { 		// for older Netscapes (4-)
                string: navigator.userAgent,
                subString: "Mozilla",
                identity: "Netscape",
                versionSearch: "Mozilla"
            }
        ],
        dataOS : [
            {
                string: navigator.platform,
                subString: "Win",
                identity: "Windows"
            },
            {
                string: navigator.platform,
                subString: "Mac",
                identity: "Mac"
            },
            {
                string: navigator.userAgent,
                subString: "iPhone",
                identity: "iPhone/iPod"
            },
            {
                string: navigator.platform,
                subString: "Linux",
                identity: "Linux"
            }
        ]

    };
    BrowserDetect.init();
    jQuery.browser.version = BrowserDetect.version;
})(jQuery);
