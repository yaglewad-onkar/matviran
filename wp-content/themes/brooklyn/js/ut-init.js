/* <![CDATA[ */
(function($){

    "use strict";

    $.fn.disableScroll = function() {

        window.oldScrollPos = $(window).scrollTop();

        $(window).on('scroll.scrolldisabler',function ( event ) {

            $(window).scrollTop( window.oldScrollPos );
            event.preventDefault();

        });
    };

    $.fn.enableScroll = function() {

        $(window).off('scroll.scrolldisabler');

    };

    $.fn.supposition = function(){

        var $w = $(window), /*do this once instead of every onBeforeShow call*/
            _offset = function(dir) {
                return window[dir === 'y' ? 'pageYOffset' : 'pageXOffset'] || document.documentElement && document.documentElement[dir==='y' ? 'scrollTop' : 'scrollLeft'] || document.body[dir==='y' ? 'scrollTop' : 'scrollLeft'];
            },
            onInit = function(){
                /* I haven't touched this bit - needs work as there are still z-index issues */
                var $topNav = $('li',this);
                var cZ=parseInt($topNav.css('z-index')) + $topNav.length;
                $topNav.each(function() {
                    $(this).css({zIndex:--cZ});
                });
            },
            onHide = function(){

                this.css({marginTop:'',marginLeft:''});
                // this.css({marginTop:''});

            },
            onBeforeShow = function(){

                this.each(function(){

                    var $u = $(this);

                    $u.css('display','block');

                    var menuWidth = $u.width(),
                        parentWidth = $u.parents('ul').width(),
                        totalRight = $w.width() + _offset('x'),
                        menuRight = $u.offset().left + menuWidth;

                    if( menuRight > totalRight ) {

                        $u.css('margin-left', ( $u.parents('ul').length === 1 ? totalRight - menuRight : -(menuWidth + parentWidth) ) + 'px');

                    }

                    var windowHeight = $w.height(),
                        offsetTop = $u.offset().top,
                        menuHeight = $u.height(),
                        baseline = windowHeight + _offset('y');

                    var expandUp = (offsetTop + menuHeight > baseline);

                    if (expandUp) {

                        $u.css('margin-top',baseline - (menuHeight + offsetTop));

                    }

                    // $u.css('display','none');

                });

            };

        return this.each(function() {
            var $this = $(this),
                o = $this.data('sf-options'); /* get this menu's options */

            /* if callbacks already set, store them */
            var _onInit = o.onInit,
                _onBeforeShow = o.onBeforeShow,
                _onHide = o.onHide;

            $.extend($this.data('sf-options'),{
                onInit: function() {
                    onInit.call(this); /* fire our Supposition callback */
                    _onInit.call(this); /* fire stored callbacks */
                },
                onBeforeShow: function() {
                    onBeforeShow.call(this); /* fire our Supposition callback */
                    _onBeforeShow.call(this); /* fire stored callbacks */
                },
                onHide: function() {
                    onHide.call(this); /* fire our Supposition callback */
                    _onHide.call(this); /* fire stored callbacks */
                }
            });
        });
    };

    $.fn.utvmenu = function(option) {

        var obj,
            item;

        var options = $.extend({
                speed: 200,
                autostart: true,
                autohide: 1
            },
            option);

        obj = $(this);

        item = obj.find("ul").parent("li").children("a");
        item.attr("data-option", "off");

        item.unbind('click').on("click", function() {

            var a = $(this);

            if( options.autohide ) {

                a.parent().parent().find("a[data-option='on']").parent("li").children("ul").slideUp(options.speed / 1.2,
                    function() {
                        $(this).parent("li").children("a").attr("data-option", "off");
                    }
                );

            }

            if (a.attr("data-option") === "off") {

                a.parent("li").children("ul").slideDown(options.speed,
                    function() {
                        a.attr("data-option", "on");
                    }
                );

            }

            if (a.attr("data-option") === "on") {
                a.attr("data-option", "off");
                a.parent("li").children("ul").slideUp(options.speed);
            }
        });
        if (options.autostart) {
            obj.find("a").each(function() {

                $(this).parent("li").parent("ul").slideDown(options.speed,
                    function() {
                        $(this).parent("li").children("a").attr("data-option", "on");
                    });
            });
        }

    };

    /* HongKong Parallax v1.2.0 modified by UnitedThemes */

    /**
     * Settings for the plugin
     * @type {Object}
     */
    var settings = {};

    /**
     * All elements
     */
    var $ELEMENTS = void 0;

    /**
     * General variables
     */
    var scrollPosition = 0;
    var ticking = false;
    var generalOffset = 0;


    // calculate the viewport size
    var winsize;
    var calcWinsize = function() { winsize = { width: window.innerWidth, height: window.innerHeight } };

    calcWinsize();
    window.addEventListener('resize', calcWinsize);

    const MathUtils = {
        // map number x from range [a, b] to [c, d]
        map: function(x, a, b, c, d) { return (x - a) * (d - c) / (b - a) + c },
        // linear interpolation
        lerp: function(a, b, n) { return (1 - n) * a + n * b },
        // Random float
        getRandomFloat: function(min, max) { return (Math.random() * (max - min) + min).toFixed(2) }
    };


    /**
     * Get the factor attribute for each and initial transforms
     * @return {void}
     */
    var _setupElements = function _setupElements() {
        for (var i = 0; i < $ELEMENTS.length; i++) {
            _setupElement($ELEMENTS[i]);
        }
    };

    /**
     * Setup each element
     * @param  {Node} element Element which should be used
     * @return {void}
     */
    var _setupElement = function _setupElement(element) {

        var $element = $(element);
        var factor = element.getAttribute('data-parallax-factor');
        var transformValues = void 0;
        var currentTransform = $element.css('transform');

        element.factor = parseFloat( ( factor || settings.factor, 10 ));
        element.rect = {
            top: $element.offset().top,
            left: $element.offset().left,
            width: $element.width(),
            height: $element.height()
        };
        element.initialOffset = element.rect.top;

        if (currentTransform !== 'none') {
            transformValues = _getValuesFromTransform(currentTransform);
        }

        element.transforms = transformValues;
    };

    /**
     * Check if an element is in the viewport
     * @param  {Object}  $element   Node-like jQuery element to check if in viewport
     * @param  {Number}  transformY Add this offset
     * @return {Boolean}            true if element is in the viewport
     */
    window._isElementInViewport = function _isElementInViewport($element) {

        var $window = $(window);
        var window_top = $window.scrollTop();
        var offset = $element.offset();
        var top = offset.top;

        if (top + $element.height() >= window_top && top - ($element.data('appear-top-offset') || 0) <= window_top + $window.height()) {

            return true;

        } else {

            return false;

        }

    };

    /**
     * Get the current css transform of a matrix
     * @param  {Array}  matrix Current matrix of CSS transforms
     * @return {Object}        transforms in CSS speak
     */
    var _getValuesFromTransform = function _getValuesFromTransform(matrix) {

        var values = matrix.split('(')[1];

        values = values.split(')')[0];
        values = values.split(',');

        var angle = Math.atan2(values[1], values[0]);
        var denom = Math.pow(values[0], 2) + Math.pow(values[1], 2);
        var scaleX = Math.sqrt(denom);
        var scaleY = (values[0] * values[3] - values[2] * values[1]) / scaleX;
        var skewX = Math.atan2(values[0] * values[2] + values[1] * values[3], denom);

        return {
            rotate: angle / (Math.PI / 180),
            scaleX: scaleX, // scaleX factor
            scaleY: scaleY, // scaleY factor
            skewX: skewX / (Math.PI / 180), // skewX angle degrees
            skewY: 0, // skewY angle degrees
            translateX: values[4], // translation point  x
            translateY: values[5] // translation point  y
        };
    };

    /**
     * Get the string which should be applied to the element's transform
     * @param  {Object} transforms Transforms which should be added
     * @param  {String} positionX  Add this offset horizontally
     * @param  {Number} positionY  Add this offset vertically
     * @return {String}            Transform string for element
     */
    var _getFullTransform = function _getFullTransform(transforms, positionX, positionY) {

        var transform = 'translate3d(' + positionX + ', ' + positionY + 'px, 0) ';

        if (!transforms) {
            return transform;
        }

        if (transforms.skewX || transforms.skewY) {
            // transform += 'skew(' + transforms.skewX.toFixed(2) + 'deg, ' + transforms.skewY + 'deg)';
        }

        if (transforms.scaleX || transforms.scaleY) {
            // transform += 'scale(' + transforms.scaleX + ', ' + transforms.scaleY + ')';
        }

        return transform;
    };

    /**
     * Animate the element to top or bottom
     * @param  {Node}   element   Node which should be animated
     * @param  {String} direction Top or bottom animation
     * @return {void}
     */
    var _animateElement = function _animateElement(element, direction) {

        var $element = $(element);
        var $parent = $(element.parentNode);

        var el_offset = $element.offset();
        var top = el_offset.top;

        var p_el_offset = $parent.offset();
        var p_top = p_el_offset.top;
        var p_bottom = p_el_offset.top + $parent.outerHeight();

        var offset = top - scrollPosition;
        var factor = element.factor;

        var $window = $(window);

        if ($element.data('parallax-remove-general-offset') === '') {
            offset += generalOffset;
        }

        if ($element.data('parallax-remove-initial-offset') === '') {
            offset -= element.initialOffset;
        }

        if (direction === 'bottom') {
            factor *= -1;
        }

        // var transformY = Math.floor(offset / factor);
        var transformY = offset / factor;
        var transformX = 0;
        var visible = _isElementInViewport($element);

        if (visible === false || !$element.hasClass("parallax-scroll-container-calculated") || site_settings.scrollDisabled) {
            return;
        }

        if( $element.hasClass('parallax-scroll-container-hide') && !$element.siblings('.mbYTP_wrapper').length ) {
            $element.removeClass('parallax-scroll-container-hide');
        }

        if( $element.data('parallax-position-x') ) {
            transformX = $element.data('parallax-position-x');
        }

        if( $element.data('parallax-scale') ) {

            TweenMax.set(element, {
                scale: MathUtils.map( p_el_offset.top - scrollPosition, winsize.height, -1 * $parent.outerHeight(), ( scrollPosition > p_bottom ? 1 - ( $element.data('parallax-scale') -1 ) : 1 ), $element.data('parallax-scale') )
            });

        } else if( $element.data('parallax-scale-move') ) {

            TweenMax.set(element, {
                x: transformX,
                y: transformY,
                scale: MathUtils.map( p_el_offset.top - scrollPosition, winsize.height, -1 * $parent.outerHeight(), ( scrollPosition > p_bottom ? 1 - ( $element.data('parallax-scale') -1 ) : 1 ), $element.data('parallax-scale-move') )
            });

        } else {

            TweenMax.set(element, {
                x: transformX,
                y: transformY
            });


        }

    };

    /**
     * Callback for rAF
     * @return {void}
     */
    var _callback = function _callback() {

        // Don't do anything if we've scrolled to the top
        if (scrollPosition <= 0) {

            ticking = false;
            //return;

        }

        for (var i = 0; i < $ELEMENTS.length; i++) {
            _animateElement($ELEMENTS[i], 'bottom');
        }

        // allow further rAFs to be called
        ticking = false;

    };


    /**
     * Update elements based on scroll, fires rAF
     * @return {void}
     */

    var update = function update() {

        scrollPosition = window.scrollY || window.pageYOffset;

        if (!settings.mobile && window.matchMedia && window.matchMedia(settings.mediaQuery).matches) {
            return false;
        }

        if (!ticking && window.requestAnimationFrame) {

            window.requestAnimationFrame(_callback);
            ticking = true;

        }

    };

    /**
     * Set the general offset of the page
     * @param  {Object} event  Event fired
     * @param  {Number} offset Offset to set
     * @return {void}
     */

    var _setOffset = function _setOffset(event, offset) {
        generalOffset = offset;
    };

    var initialize = function initialize() {
        if ($ELEMENTS.length > 0) {
            _setupElements();
        }
    };

    /**
     * Init as jQuery plugin
     */
    var constructor = function constructor() {

        /**
         * Events
         */

        $(document).on('hongkong:refresh', _callback).on('hongkong:offset', _setOffset);

        $.hongkong = function (options) {

            // Options
            settings = $.extend({
                factor: 4,
                mobile: false,
                mediaQuery: '(max-width: 42em)',
                threshold: 0,
                selector: '[data-parallax]',
                selectorBottom: '[data-parallax-bottom]', // Deprecated
                selectorTop: '[data-parallax-top]' // Deprecated
            }, options);

            // Set elements
            $ELEMENTS = $(settings.selector);

            if ($ELEMENTS.length > 0) {

                initialize();
                update(); // run update for correct positioning

                // listen for scroll events
                $(window).on('scroll', update);

            }

            $(window).on('resize load', initialize);

        };
    };

    constructor();

})(jQuery);

(function($){

    "use strict";

    // check if is in vc front end
    function inIframe() {

        var field = 'vc_editable';
        var url = window.location.href ;

        if( url.indexOf('?' + field + '=') !== -1 ) {

            return true;

        } else if( url.indexOf('&' + field + '=') !== -1 ) {


        } else {

            return false;

        }

    }

    $("html").addClass('js');

    /* Global Objects
    ================================================== */
    var waypoints_active = false;
    var $brooklyn_body   = $("body");
    var $brooklyn_header = $("#header-section");

    /* Global Variables
    ================================================== */
    var chrome = navigator.userAgent.indexOf('Chrome') > -1;

    function ut_update_current_scroll_offset() {

        site_settings.brooklyn_header_scroll_offset = $brooklyn_header.data("line-height");

        if( $brooklyn_header.hasClass('ut-header-fixed') ) {
            site_settings.brooklyn_header_scroll_offset = 0;
        }

        // extra mobile offsets
        if( !$brooklyn_header.hasClass('ut-header-fixed') ) {

            // update scroll offset tablet
            if( $(window).width() > 767 && $(window).width() <= 1024 ) {

                $brooklyn_header.css('transform', "translate3d(0,0,0)"); // reset header position
                site_settings.brooklyn_header_scroll_offset = 80;

            }

            // update scroll offset mobile
            if( $(window).width() <= 767 ) {

                $brooklyn_header.css('transform', "translate3d(0,0,0)"); // reset header position
                site_settings.brooklyn_header_scroll_offset = 60;

            }

        }

    }

    ut_update_current_scroll_offset();

    $(window).utresize(function(){

        ut_update_current_scroll_offset();

    });


    /* Helper Functions
    ================================================== */
    function ut_get_current_scroll() {

        return window.pageYOffset || document.documentElement.scrollTop;

    }

    /* Adjust Logo
    ================================================== */
    function adjust_logo( direction ) {

        if( $brooklyn_header.data('style') === 'style-9' && $brooklyn_header.data('scrolldepth') === 1 ) {

            if( direction === 'down' ) {

                $('.site-logo').css({
                    'height'        : $brooklyn_header.data('line-height'),
                    'line-height'   : $brooklyn_header.data('line-height') + 'px',
                    'margin-top'    : 80
                });

                $('.site-logo img').css({
                    'max-height'    : 80
                });

            } else {

                $('.site-logo').removeAttr("style");
                $('.site-logo img').removeAttr("style");

            }

        }

    }


    /* Header Variables
    ================================================== */
    var border_offset      = '';
    var header_height      = '';
    var hide_offset        = '';
    var new_offset         = '';
    var last_offset        = '';
    var scroll_up_offset   = '';
    var header_moved       = false;
    var scrolling          = false;

    function ut_header_variables() {

        border_offset 	 = $brooklyn_body.hasClass("ut-site-border-top") ? parseInt(site_settings.siteframe_size) : 0;
        header_height    = $brooklyn_header.data("total-height");
        hide_offset   	 = $brooklyn_header.data("line-height") - border_offset - header_height;
        new_offset    	 = 0;
        last_offset   	 = 0;
        scroll_up_offset = $brooklyn_body.hasClass("ut-site-border-top") ? border_offset : 0;

    }

    $(window).utresize(function(){

        // update logo
        if( $(window).width() < 1025 ) {

            adjust_logo('up');

        }

        // update waypoints since document offset might have changed
        $.waypoints("refresh");


    });

    /* Load Header Variables
    ================================================== */
    ut_header_variables();

    /* Sticky Columns
    ================================================== */
    $('.ut-stick-in-parent').ut_require_js({
        plugin: 'stickit',
        source: 'stickit',
        callback: function (element) {

            element.stickit({
                screenMinWidth: 1025,
                top:  parseInt( hide_offset + header_height + 40 )
            });

        }
    });

    /* Load Header Animations
    ================================================== */
    function ut_move_header() {

        if( $(window).width() <= 1025 ) {
            return;
        }

        scrolling = true;

        // scroll up
        if( ut_get_current_scroll() < last_offset ) {

            if( ut_get_current_scroll() <= scroll_up_offset ) {

                if( -ut_get_current_scroll() > hide_offset ) {

                    $('#ut-header-placeholder').height( header_height - ut_get_current_scroll() );

                    new_offset = -ut_get_current_scroll();
                    $brooklyn_header.css('transform', "translate3d(0,0,0)");

                    adjust_logo('up');
                    header_moved = false; // reset

                }

                if( $('#ut-header-placeholder').length && ut_get_current_scroll() === 0 ) {

                    site_settings.brooklyn_header_scroll_offset = Math.abs(hide_offset) + $brooklyn_header.data("line-height");

                }

            }

            // scroll down
        } else {

            if( ut_get_current_scroll() > 0 ) {

                if( !header_moved ) {

                    $('#ut-header-placeholder').height( $brooklyn_header.data("line-height") - border_offset );
                    $brooklyn_header.css('transform', "translate3d(0,"+ hide_offset +"px,0)");

                    adjust_logo('down');

                    if( $('#ut-header-placeholder').length ) {

                        site_settings.brooklyn_header_scroll_offset = $brooklyn_header.data("line-height");

                    }

                    header_moved = true;

                }

            }

        }

        last_offset = ut_get_current_scroll();

    }

    if( $brooklyn_header.hasClass('ut-header-floating') && !$brooklyn_body.hasClass('ut-header-hide-on-hero') ) {

        if( window.pageYOffset === 0 && $('#ut-header-placeholder').length ) {

            site_settings.brooklyn_header_scroll_offset = Math.abs(hide_offset) + $brooklyn_header.data("line-height");

        }

        $(window).scroll(function() {

            window.requestAnimationFrame(ut_move_header);

        });

        window.requestAnimationFrame(ut_move_header);

    }

    setInterval( function() {

        if( scrolling ) {

            scrolling = false;
            $.waypoints("refresh");

        }

    }, 200 );

    // Global Parallax Effect Container
    $('.parallax-scroll-container:not(.parallax-scroll-container-disabled)').each(function() {

        var $this            = $(this),
            window_height    = $(window).height(),
            container_height = $this.outerHeight();

        if( container_height < window_height ) {

            var new_container_height = ( 100 + ( 100 - container_height * 100 / window_height ) );

            $this.css( "height", new_container_height + "%" ).css( "margin-top", -( $this.outerHeight() - container_height ) / 2 + "px" ).addClass("parallax-scroll-container-calculated");

        }

        if( container_height >= window_height ) {

            $this.css( "height", "105%" ).css( "margin-top", -( $this.outerHeight() - container_height ) / 2 + "px" ).addClass("parallax-scroll-container-calculated");

        }

    });


    // Global Parallax Effect - options controlled by data attributes
    $.hongkong({
        mobile: true,
        selector: '.parallax-scroll-container:not(.parallax-scroll-container-disabled)'
    });


    $(window).on("load", function () {

        var monitor = '';

        function monitor_particle( id, $this ) {

            if( !$this.data('particlestate') ) {

                particlesJS( id, $this.data("effect-config") );
                $this.data('particlestate' ,true);

            }

            if( $this.data('particlestate') ) {

                // hide particles during process
                if( typeof pJSDom !== undefined ) {

                    $this.css('visibility', 'hidden');

                }

                clearTimeout( monitor );

                monitor = setTimeout( function () {

                    // restart
                    if( typeof pJSDom !== undefined ) {

                        pJSDom.forEach(function (item, index) {

                            pJSDom[index].pJS.fn.particlesRefresh();

                        });

                    }

                    $(".bklyn-overlay-effect").each(function(){

                        $(this).css('visibility', 'visible');

                    });

                }, 100 );

            }

        };

        /* Section and Row Overlay Effects
        ================================================== */
        $(".bklyn-overlay-effect").ut_require_js({
            plugin: 'particlesJS',
            source: 'particlesJS',
            callback: function( element ) {

                element.each(function(){

                    var $this	= $(this),
                        id 		= $this.attr("id");

                    $this.data( 'particlestate', false );

                    new ResizeSensor( $this, function () {

                        monitor_particle( id, $this );

                    });

                    monitor_particle( id, $this );

                });

            }
        });


    });

    $(document).ready(function(){

        /* Lazy Load
        ================================================== */
        var $imgs = $("img.utlazy");

        $imgs.lazyload({
            effect: 'fadeIn',
            effectspeed: '200',
            event : 'scroll',
            load : function() {
                $(this).show();
                $.waypoints("refresh");
            },
            failure_limit: Math.max($imgs.length - 1, 0)
        });


        /* Main Navigation & Mobile Navigation Classes
        ================================================== */
        $('.ut-horizontal-navigation ul.menu').find(".current-menu-ancestor").each(function() {

            $(this).find("a").first().addClass("active");

        }).end().find(".current_page_parent").each(function() {

            $(this).find("a").first().addClass("active");

        }).end().superfish({ autoArrows : true, delay: 15 }).supposition();


        /* Create Navigation More Menu
		================================================== */
        function ut_parse_navigation(item, $list, submenu, type) {

            if( submenu ){

                $.each(item, function (key, value) {

                    ut_parse_navigation(value, $list, false, "append");

                });

                return;

            }

            if( item) {

                var $li = $('<li />').addClass( item.classes );

                if( item.title ) {

                    var url = item.url.length ? item.url : '#';

                    if( typeof item.wpse_children !== "undefined" ) {

                        if( item.target.length ) {

                            $li.append( $('<a target="' + item.target + '" class="sf-with-ul" href="' + url + '">' + item.title + '</a>') );

                        } else {

                            $li.append( $('<a class="sf-with-ul" href="' + url + '">' + item.title + '</a>') );

                        }

                    } else {

                        if( item.target.length ) {

                            $li.append( $('<a target="' + item.target + '" href="' + url + '">' + item.title + '</a>') );

                        } else {

                            $li.append( $('<a href="' + url + '">' + item.title + '</a>') );

                        }

                    }

                }

                if( typeof item.wpse_children !== "undefined" ) {

                    // create new sublist
                    var $sublist = $("<ul/>").addClass('sub-menu');
                    ut_parse_navigation( item.wpse_children, $sublist, true, "append" );
                    $li.append( $sublist );

                }

                if( type === 'prepend' ) {

                    $list.prepend( $li );

                } else {

                    $list.append( $li );

                }

            }

        }


        /* Mobile Navigation
        ================================================== */
        $('#ut-mobile-menu').find(".current-menu-ancestor").each(function() {

            $(this).find("a").first().addClass("active");

        }).end().find(".current_page_parent").each(function() {

            $(this).find("a").first().addClass("active");

        });

        $('#ut-mobile-menu .sub-menu li:last-child').addClass('last');
        $('#ut-mobile-menu li:last-child').addClass('last');

        /* Mobile Navigation Variables
        ================================================== */
        var $header = $("#header-section"),
            $logo   = $(".site-logo:not(.ut-overlay-site-logo)").find("img"),
            logo    = $logo.data("original-logo"),
            logoalt = $logo.data("alternate-logo");

        function mobile_menu_dimensions() {

            var nav_new_width	= $(window).width(),
                nav_new_height  = $(window).outerHeight();

            $("#ut-mobile-nav").css( 'width', nav_new_width ).height( nav_new_height );
            $(".ut-scroll-pane-wrap").css( 'width',  nav_new_width - 20 ).height( nav_new_height );
            $(".ut-scroll-pane").css( 'width',  nav_new_width ).height( nav_new_height );
            $("#ut-mobile-menu").css( 'width',  nav_new_width - 40 );

        }

        $(window).utresize(function(){

            if( $(window).width() > 979 && site_settings.mobile_nav_open ) {

                $('#ut-open-mobile-menu').trigger("click");

            }

        });


        // toggle mobile menu
        function ut_open_mobile_menu() {

            // animate trigger
            $('#ut-open-mobile-menu').addClass("is-active");

            // set mobile dimensions
            mobile_menu_dimensions();

            // change skin
            $header.removeClass( $header.data('primary-skin') ).addClass( $header.data('secondary-skin') );
            $('body').addClass("ut-mobile-menu-open");

            // open mobile menu
            $("#ut-mobile-nav").delay(250).slideToggle(600);

            $logo.each( function(){

                $(this).attr("src" , logoalt );

            });

            site_settings.mobile_nav_open = true;

            // bind close
            $(this).one("click", ut_close_mega_menu);

        }

        // toggle mobile menu
        function ut_close_mega_menu() {

            // animate trigger
            $('#ut-open-mobile-menu').removeClass("is-active");

            $("#ut-mobile-nav").slideToggle(600, function() {

                if( site_settings.mobile_hero_passed === false || site_settings.mobile_hero_passed === '' ) {

                    $logo.each( function(){

                        $(this).attr("src" , logo );

                    });

                }

                // change skin
                $header.removeClass( $header.data('secondary-skin') ).addClass( $header.data('primary-skin') );
                $('body').removeClass("ut-mobile-menu-open");

                $(this).hide();


            });

            site_settings.mobile_nav_open = false;

            // re bind open
            $(this).one("click", ut_open_mobile_menu);

        }

        $(".ut-mm-trigger").one("click", ut_open_mobile_menu  );


        $('.ut-scroll-pane').on('touchstart', function(){

            // nothing to do here

        });

        // Collapse Mobile Menu
        if( $('.ut-mobile-menu').data('collapsed') ) {

            // hide sub menus first
            $('.ut-mobile-menu .sub-menu').hide();

            // add event listener
            $('.ut-mobile-menu .menu-item-has-children > a').click(function( event ) {

                var clicks = $(this).data('clicks');

                if( !clicks) {

                    $(this).siblings('.sub-menu').show();
                    $(this).data( "clicks", true );

                } else {

                    $(this).siblings('.sub-menu').hide();
                    $(this).data( "clicks", false );

                }

                event.stopImmediatePropagation();
                event.preventDefault();

            });

        }

        /* Tablet Slider
        ================================================== */
        $(".ut-tablet-nav li a").click( function(event) {

            var index = $(this).parent().index();

            /* remove selected state from previuos tabs link */
            $(".ut-tablet-nav li").removeClass("selected");

            /* add class selected to current link */
            $(this).parent().addClass("selected");

            /* hide all tabs images */
            $(".ut-tablet").children().hide().removeClass("show");

            /* show the selected tab image */
            $(".ut-tablet").children().eq(index).fadeIn("fast").addClass("show");

            event.preventDefault();

        });

        /*
         * United Scroll
		 */

        var UT_Scroll = {

            // scrolling flag
            is_scrolling : false,

            // scrolleffect
            scrolleffect : $('body').data("scrolleffect"),

            //scrollspeed
            scrollspeed : $('body').data("scrollspeed"),

            init: function() {



            },
            scroll_to: function( target, offset ) {

                self.is_scrolling = true;

                $.scrollTo( target , this.scrollspeed, {
                    easing: this.scrolleffect ,
                    offset: offset,
                    axis  : 'y',
                    onAfter: function() {

                        self.is_scrolling = false;

                        if( typeof target === 'object' ) {

                            target = target.attr("id");

                        } else if( target.indexOf('#') > -1 ) {

                            target = target.substring(1);

                        }

                        UT_Scroll.update_navigation( target );


                    }
                });

            },
            check_navigation: function ( element ) {

                let ID = $(element).attr('id'),
                    $current = $('.ut-horizontal-navigation a[href*="#' + ID + '"]');

                // check for parent
                if( $current.closest('ul').hasClass('sub-menu') ) {

                    $current.closest('ul').parent().addClass('has-scroll-children');

                }

            },
            update_navigation: function( section_ID ) {

                if( self.is_scrolling || section_ID === 'main-content' ) {
                    return;
                }

                UT_Scroll.clean_navigation();

                if( site_settings.navigation === 'default' ) {

                    var $current = $('.ut-horizontal-navigation a[href*="#' + section_ID + '"]');

                    $current.addClass('selected');

                    // check for parent
                    if( $current.closest('ul').hasClass('sub-menu') ) {

                        $current.closest('ul').siblings('a').addClass('selected');

                    }

                } else if( site_settings.navigation === 'side' ) {

                    $('#bklyn-sidenav a[href*="#' + section_ID + '"]').addClass('selected');

                }

                // mobile
                $('#ut-mobile-menu a[href*="#' + section_ID + '"]').addClass('selected');

            },
            update_home: function() {

                if( self.is_scrolling ) {
                    return;
                }

                UT_Scroll.clean_navigation();

                if( site_settings.navigation === 'default' ) {

                    // remove superfish hover class from first level
                    $('.ut-horizontal-navigation > ul > li').removeClass('sfHover');

                    // selected class from previous active items and remove focus
                    $('.ut-horizontal-navigation a').removeClass('selected');

                    // update navigation home
                    $('.ut-home-link > a').addClass('selected');

                } else if( site_settings.navigation === 'side' ) {

                    $('#bklyn-sidenav a[href*="#top"]').addClass('selected');

                }

                // mobile
                $('#ut-mobile-menu .ut-home-link > a').addClass('selected');


            },
            clean_navigation: function() {

                if( site_settings.navigation === 'default' ) {

                    $('.ut-horizontal-navigation > ul > li').removeClass('sfHover');
                    $('.ut-horizontal-navigation a').removeClass('selected');

                } else if( site_settings.navigation === 'side' ) {

                    $('#bklyn-sidenav a').removeClass('selected');

                }

                // mobile nav
                $('#ut-mobile-menu a').removeClass('selected');

            }

        };

        UT_Scroll.init();


        /* Scroll to top
		================================================== */
        $('.logo a[href*="#"], .ut-logo a[href*="#"]').click( function(event) {

            event.preventDefault();
            event.stopImmediatePropagation();

            UT_Scroll.scroll_to( $(this).attr('href'), -site_settings.brooklyn_header_scroll_offset );

        });


        $('.toTop').click( function(event) {

            event.preventDefault();
            event.stopImmediatePropagation();

            UT_Scroll.scroll_to( $(this).attr('href'), -site_settings.brooklyn_header_scroll_offset );

        });

        /* Scroll to Sections for Hero Buttons
        ================================================== */
        $('.hero-second-btn[href^="#"], .hero-btn[href^="#"], .hero-down-arrow a[href^="#"]').not(".ut-btn-disintegrate").not("#ut-hero-search-submit").click( function( event ) {

            event.stopImmediatePropagation();
            event.preventDefault();

            var target = $(this).attr('href');

            if( target === '#ut-to-first-section' ) {

                var target_offset = '';

                if( $brooklyn_body.hasClass('ut-hero-has-fancy-border') ) {

                    target_offset = site_settings.brooklyn_header_scroll_offset + $('#ut-hero .ut-fancy-border').outerHeight() - 1;

                } else {

                    target_offset = site_settings.brooklyn_header_scroll_offset;

                }

                UT_Scroll.scroll_to( $('.wrap'), -target_offset );

            } else {

                UT_Scroll.scroll_to( target, -site_settings.brooklyn_header_scroll_offset );

            }

        });

        $('#ut-hero-search-submit').click( function( event ) {

            event.stopImmediatePropagation();
            event.preventDefault();

            $("#searchform").submit();

        });


        $('.hero-slider-button[href^="#"]').click( function( event ) {

            event.stopImmediatePropagation();
            event.preventDefault();

            var target = $(this).attr('href');

            if( target === '#ut-to-first-section' ) {

                UT_Scroll.scroll_to( $('.wrap'), -site_settings.brooklyn_header_scroll_offset );

            } else {

                UT_Scroll.scroll_to( target, -site_settings.brooklyn_header_scroll_offset );

            }

        });

        $('.ut-fancy-image-wrap a[href^="#"]').click( function( event ) {

            event.stopImmediatePropagation();
            event.preventDefault();

            var target = $(this).attr('href');

            if( target === '#ut-to-first-section' ) {

                UT_Scroll.scroll_to( $('.wrap'), -site_settings.brooklyn_header_scroll_offset );

            } else {

                UT_Scroll.scroll_to( $(this).attr('href'), -site_settings.brooklyn_header_scroll_offset );

            }

        });


        /* Scroll to Section Class
		================================================== */
        $(document).on("click" , '.ut-scroll-to-section, .ut-scroll-to-section a' , function(event) {

            var href = $(this).attr('href');

            if( href === undefined ) {
                return;
            }

            // extract section hash
            var section = '#' + href.substring( href.indexOf('#')+1 );

            // start scroll
            UT_Scroll.scroll_to( section, -site_settings.brooklyn_header_scroll_offset );

            // activate navigation
            if( $('.ut-horizontal-navigation a[href*="' + section + '"]').length ) {

                UT_Scroll.update_navigation( section );

            }

            // activate navigation
            if( $('#bklyn-sidenav a[href*="' + section + '"]').length ) {

                UT_Scroll.update_navigation( section );

            }

            event.preventDefault();

        });

        /* Scroll to Section if Hash exists on Page Load
        ================================================== */
        if( window.location.hash ) {

            setTimeout ( function () {

                if( site_settings.navigation === 'default' ) {

                    // start scroll
                    UT_Scroll.scroll_to( window.location.hash, -site_settings.brooklyn_header_scroll_offset );

                } else if( site_settings.navigation === 'side' ) {

                    // start scroll
                    UT_Scroll.scroll_to( window.location.hash, 0 );

                }

            }, 400 );

        }

        /* Scroll to Sections / Main Menu
        ================================================== */
        $('.ut-horizontal-navigation a:not(.ut-header-search-trigger)').click( function(event) {

            if( this.hash && !$(this).hasClass('external') && $(this.hash).length ) {

                UT_Scroll.clean_navigation();
                $(this).addClass('selected');

                // start scroll
                UT_Scroll.scroll_to( this.hash, -site_settings.brooklyn_header_scroll_offset );

                event.stopImmediatePropagation();
                event.preventDefault();

            } else if( this.hash && $(this.hash).length && $(this).parent().hasClass('contact-us') ) {

                // start scroll
                UT_Scroll.scroll_to( this.hash, 0 );

                event.stopImmediatePropagation();
                event.preventDefault();

            }

            if( $(this).attr('href') === '#' ) {

                event.stopImmediatePropagation();
                event.preventDefault();

            }

        });

        /* Scroll to Sections / Footer Menu
		================================================== */
        $('.footer ul.menu a').click( function(event) {

            if( this.hash && $(this.hash).length ) {

                UT_Scroll.scroll_to( this.hash, -site_settings.brooklyn_header_scroll_offset );

                event.stopImmediatePropagation();
                event.preventDefault();

            }

        });

        var isIEMobile = isIEMobile();

        function isIEMobile() {
            var regExp = new RegExp("IEMobile", "i");
            return navigator.userAgent.match(regExp);
        }

        /* Scroll to Sections / Mobile Menu
		================================================== */
        $('#ut-mobile-menu a').click( function(event) {

            if( this.hash && !$(this).hasClass('external') && $(this.hash).length ) {

                if(!isIEMobile){

                    UT_Scroll.scroll_to( this.hash, -site_settings.brooklyn_header_scroll_offset );

                } else {

                    var thash = this.hash;

                    $('html, body').animate({ scrollTop: $( thash ).offset().top }, ut_scrollspeed );

                }

                event.stopImmediatePropagation();
                event.preventDefault();

            }

            /* close menu */
            $(".ut-mm-trigger").trigger("click");

            if( $(this).attr('href') === '#' ) {

                event.stopImmediatePropagation();
                event.preventDefault();

            }

        });

        /* Side Navigation
		================================================== */
        if( $("#bklyn-sidenav").length ) {

            $("#bklyn-sidenav").utvmenu({
                speed: 800,
                autostart: false,
                autohide: true
            });

            $('#bklyn-sidenav a').click( function(event) {

                if( this.hash && !$(this).hasClass('external') && $(this.hash).length ) {

                    UT_Scroll.scroll_to( this.hash, 0 );

                    event.stopImmediatePropagation();
                    event.preventDefault();

                } else if( this.hash && $(this).parent().hasClass('contact-us') ) {

                    UT_Scroll.scroll_to( this.hash, 0 );

                    event.stopImmediatePropagation();
                    event.preventDefault();

                }

                if( $(this).attr('href') === '#' ) {

                    event.stopImmediatePropagation();
                    event.preventDefault();

                }

            });

        }


        /* Waypoints
		================================================== */
        $('.ut-vc-offset-anchor-top').each(function() {

            UT_Scroll.check_navigation( this );

            $(this).waypoint( function( direction ) {

                if( !waypoints_active ) {
                    return;
                }

                var containerID = $(this).data('id');

                if( direction === 'down' && $('#navigation a[href*="#' + containerID + '"]').length ) {

                    UT_Scroll.update_navigation( containerID );

                } else if( direction === 'down' && !$('#navigation a[href*="#' + containerID + '"]').length ) {

                    UT_Scroll.update_home();

                }

            }, { offset: site_settings.brooklyn_header_scroll_offset + 'px' });

        });


        $('.ut-vc-offset-anchor-bottom').each(function() {

            $(this).waypoint( function( direction ) {

                if( !waypoints_active ) {
                    return;
                }

                var containerID = $(this).data('id');

                if( direction === 'up' && $('.ut-horizontal-navigation a[href*="#' + containerID + '"]').length ) {

                    UT_Scroll.update_navigation( containerID );

                } else if( direction === 'up' && containerID === 'section-without-id' ) {

                    UT_Scroll.update_home();

                }

            }, { offset: site_settings.brooklyn_header_scroll_offset + 20 + 'px' });

        });


        /* reflect scrolling in navigation
        ================================================== */
        $('.ut-offset-anchor').each(function() {

            $(this).waypoint( function( direction ) {

                if( direction === 'down' && $(this).attr('id') !== 'to-main-content' ) {

                    var containerID = $(this).attr('id');

                    if( $(this).data('parent') ) {
                        containerID = $(this).data('parent');
                    }

                    if( site_settings.navigation === 'default' ) {

                        if( containerID == 'section-contact' ) {

                            /* update navigation */
                            $('.ut-horizontal-navigation a').removeClass('selected');
                            $('.ut-horizontal-navigation li.contact-us a').addClass('selected');

                        } else {

                            /* update navigation */
                            UT_Scroll.update_navigation( containerID );

                        }

                    } else if( site_settings.navigation === 'side' ) {

                        /* update navigation */
                        $('#bklyn-sidenav a').removeClass('selected');
                        $('#bklyn-sidenav a[href*="#'+containerID+'"]').addClass('selected');

                    }


                }

                if( direction === 'up' && $(this).attr('id') === 'to-main-content' ) {

                    if( site_settings.navigation === 'default' ) {

                        /* update navigation home */
                        $('.ut-horizontal-navigation a').removeClass('selected');
                        $('.ut-home-link > a').addClass('selected');

                    } else if( site_settings.navigation === 'side' ) {

                        /* update navigation home */
                        $('#bklyn-sidenav a').removeClass('selected');
                        $('.ut-home-link > a').addClass('selected');

                    }


                }

            } , { offset: site_settings.brooklyn_header_scroll_offset + 'px' });

        });

        $('.ut-scroll-up-waypoint').each(function() {

            $(this).waypoint( function( direction ) {

                if( direction === 'up' ) {

                    var containerID = $(this).data('section');

                    if( $(this).data('parent') ) {
                        containerID = $(this).data('parent');
                    }

                    UT_Scroll.update_navigation( containerID );

                }

            } , { offset: site_settings.brooklyn_header_scroll_offset + 10 + 'px' });

        });

        $('.vc_section:not(.ut-section-with-linking)').each(function() {

            var $this = $(this);

            $this.waypoint( function( direction ) {

                var containerID = $(this).attr('id');

                if( direction === 'down' && $('.ut-horizontal-navigation a[href*="#'+containerID+'"]').length ) {

                    UT_Scroll.update_navigation( containerID );

                } else if( direction === 'down' && !$('.ut-horizontal-navigation a[href*="#'+containerID+'"]').length && $('.ut-home-link > a').length ) {

                    UT_Scroll.update_home();

                }


            } , { offset: site_settings.brooklyn_header_scroll_offset + 1 + 'px' });

        });

        $(document).on("click" , '.bklyn-btn[href^="#"], .ut-btn[href^="#"], .cta-btn a[href^="#"], .ut-service-column-link[href^="#"], .ut-service-column-vertical-link[href^="#"], .ut-custom-link-module[href^="#"], .bklyn-big-icon-wrap a[href^="#"], .ut-animated-image-item a[href^="#"], .ut-custom-heading-module a[href^="#"], .ut-fancy-image-wrap a[href^="#"], .bklyn-fancy-list a[href^="#"], .ut-label-module[href^="#"], .ut-service-box-link[href^="#"]' , function(event) {

            if( this.hash && $(this.hash).length ) {

                event.stopImmediatePropagation();
                event.preventDefault();

                if( $(this).parent().hasClass("ut-btn-no-scroll-offset") ) {

                    UT_Scroll.scroll_to( $(this).attr('href'), 0 );

                } else {

                    UT_Scroll.scroll_to( $(this).attr('href'), -site_settings.brooklyn_header_scroll_offset );

                }

            } else if( this.hash === '' || $(this).attr('href') === '#' ) {

                event.preventDefault();

            }


        });


        /* Disintegrate Buttons
		================================================== */
        var $current_button    = '',
            button_with_scroll = false;

        function openInNewTab(url, target) {

            var win = window.open(url, target);
            win.focus();

        }

        $(".ut-btn-disintegrate").ut_require_js({
            plugin: 'Particles',
            source: 'buttonParticles',
            callback: function (element) {

                element.each(function( index, element ){

                    // current button
                    var $this     = $(element),
                        effect    = $this.data("particle-effect"),
                        color  	  = $this.data("particle-color"),
                        direction = $this.data("particle-direction");

                    var effect_defaults = site_settings.button_particle_effects[effect];

                    effect_defaults.color = color;
                    effect_defaults.direction = direction;
                    effect_defaults.complete = function() {

                        var target = $this.attr('href').replace(/^.*?(#|$)/,'');

                        // check if there is a section on the current page
                        if( target && $("#" + target ).length || target === 'ut-to-first-section' ) {

                            if( target === 'ut-to-first-section' ) {

                                UT_Scroll.scroll_to( $('.wrap'), -site_settings.brooklyn_header_scroll_offset );

                            } else {

                                UT_Scroll.scroll_to( '#' + target, -site_settings.brooklyn_header_scroll_offset );

                            }

                            // link is external
                        } else {

                            if( $this.hasClass("ut-lightbox") ) {

                                // @todo

                            } else {

                                if( $this.attr('href') !== '#' ) {

                                    target = $this.attr('target').length ? $this.attr('target') : '_self';
                                    openInNewTab($this.attr('href'), target);

                                }

                            }

                        }

                        if( $this.hasClass("ut-btn-integrate") ) {

                            $this.delay(3000).queue(function(){

                                $(this).data('particle-effect-storage').integrate({
                                    complete: function(){

                                        $this.removeClass("ut-particles-deactivate-transition");

                                        setTimeout ( function () {
                                            $this.parent().removeClass("ut-particles-deactivate-shadow");
                                        }, 400 );

                                    }
                                });
                                $(this).dequeue();

                            });

                        } else {

                            $this.removeClass("ut-particles-deactivate-transition");
                            $this.parent().removeClass("ut-particles-deactivate-shadow");

                        }

                    };

                    $this.data('particle-effect-storage', new Particles( $this[0], effect_defaults ) );

                });

                $(element).click( function( event ) {

                    // deactivate button default transition
                    $(this).parent().addClass("ut-particles-deactivate-shadow");
                    $(this).addClass("ut-particles-deactivate-transition");

                    // disintegrate button
                    $(this).data('particle-effect-storage').disintegrate();

                    // event.stopImmediatePropagation();
                    event.preventDefault();

                });

            }
        });


        /* Youtube WMODE
        ================================================== */
        $('iframe').each(function() {

            var url = $(this).attr("src");

            if ( url!==undefined ) {

                var youtube   = url.search("youtube"),
                    splitable = url.split("?");

                /* url has already vars */
                if( youtube > 0 && splitable[1] ) {
                    $(this).attr("src",url+"&wmode=transparent");
                }

                /* url has no vars */
                if( youtube > 0 && !splitable[1] ) {
                    $(this).attr("src",url+"?wmode=transparent");
                }

            }

        });

        /* LightGallery
		================================================== */
        $('.vc_media_grid').ut_require_js({
            plugin: 'lightGallery',
            source: 'lightGallery',
            callback : function ( element ) {

                element.lightGallery({
                    mode: site_settings.lg_mode,
                    selector: '.ut-vc-ajax-images-lightbox',
                    exThumbImage: 'data-exthumbimage',
                    download: site_settings.lg_download,
                    hash: false
                });

            }
        });

        $(document).ajaxComplete(function() {

            $('.vc_media_grid').ut_require_js({
                plugin: 'lightGallery',
                source: 'lightGallery',
                callback : function ( element ) {

                    element.lightGallery({
                        mode: site_settings.lg_mode,
                        selector: '.ut-vc-ajax-images-lightbox',
                        exThumbImage: 'data-exthumbimage',
                        download: site_settings.lg_download,
                        hash: false
                    });

                }

            });

        });

        $(".woocommerce-product-gallery__wrapper a").ut_require_js({
            plugin: 'lightGallery',
            source: 'lightGallery',
            callback : function ( element ) {

                element.lightGallery({
                    mode: site_settings.lg_mode,
                    selector: "this",
                    iframeMaxWidth: "80%",
                    download: site_settings.lg_download,
                    hash: false
                });

            }
        });

        // default lightbox
        $(".ut-lightbox").ut_require_js({
            plugin: 'lightGallery',
            source: 'lightGallery',
            callback : function ( element ) {

                element.lightGallery({
                    mode: site_settings.lg_mode,
                    selector: "this",
                    iframeMaxWidth: "80%",
                    download: site_settings.lg_download,
                    hash: false
                });

            }
        });


        /* Member POPUP
        ================================================== */
        $('.ut-show-member-details').click( function(event) {

            event.preventDefault();

            /* show overlay */
            $('.ut-overlay').addClass('ut-overlay-show');

            /* execute animation to make member visible */
            $('#member_'+$(this).data('member')).addClass('ut-box-show').animate( {top: "15%" , opacity: 1 } , 1000 , 'easeInOutExpo' , function() {

                var offset  = $(this).offset().top,
                    id		= $(this).data("id");

                /* now append clone to body */
                $(this).clone().attr("id" , id).css({"position" : "absolute" , "top" : offset , "padding-top" : 0}).appendTo("body").addClass("member-clone");

                /* store current member ID */
                $(this).removeClass('ut-box-show').css({ "top" : "30%" , "opacity" : "0" });

            });

        });

        $(document).on("click" , '.ut-hide-member-details, body' , function(event) {

            if ( !$(event.target).is('.member-social, .member-social *, .ut-btn, .member-box a') ) {

                if( $('.ut-modal-box.member-clone').length ) {
                    event.preventDefault();
                }

                /* execute animation to make member invisible */
                $('.ut-modal-box.member-clone').animate({top: "0%" , opacity: 0 } , 600 , 'easeInOutExpo' ,function() {

                    $(this).remove();

                    /* hide overlay */
                    $('.ut-overlay').removeClass('ut-overlay-show');

                });

            }

        });

        $(document).on("click" , '.ut-overlay' , function(event) {

            event.preventDefault();

            /* execute animation to make member invisible */
            $('.ut-modal-box.member-clone').animate({top: "0%" , opacity: 0 } , 600 , 'easeInOutExpo' ,function() {

                $(this).remove();

                /* hide overlay */
                $('.ut-overlay').removeClass('ut-overlay-show');

            });

        });

        if( !$('html').hasClass('no-touchevents') ) {

            var touchmoved;

            $(document).on('touchend', '.member-photo', function() {

                var $this = $(this);

                if( touchmoved !== true ){

                    if( $this.hasClass('ut-touch-event') ) {

                        $this.toggleClass('cs-hover');

                    }

                }

            }).on('touchmove', function() {

                touchmoved = true;

            }).on('touchstart', function() {

                touchmoved = false;

            });

        }

        $('.nivoSlider').hover( function() {

            var $this = $(this);

            $this.find('.nivo-directionNav .nivo-prevNav').html('');
            $this.find('.nivo-directionNav .nivo-nextNav').html('');

        });

        /* Overlay Navigation
        ================================================== */
        var $brooklyn_overlay_navigation = $("#ut-overlay-menu"),
            $brooklyn_overlay_navigation_links = $("#ut-overlay-nav li a"),
            $brooklyn_open_overlay_menu  = $('#ut-open-overlay-menu');

        function ut_open_overlay_navigation() {

            // hide menu and other elements first
            $brooklyn_overlay_navigation_links.css("visibility","hidden");
            $(".ut-overlay-footer-icons-wrap","#ut-overlay-menu-footer").css("visibility","hidden");
            $(".ut-overlay-copyright","#ut-overlay-menu-footer").css("visibility","hidden");

            $brooklyn_overlay_navigation.addClass("ut-overlay-menu-visible");

            setTimeout( function(){

                $brooklyn_overlay_navigation_links.each(function( index ) {

                    var $this = $(this);

                    $this.delay( index * 75 ).queue( function() {

                        $this.css("visibility","visible").addClass("fadeInUp").dequeue();

                    });

                });

                setTimeout( function(){

                    $(".ut-overlay-footer-icons-wrap","#ut-overlay-menu-footer").css("visibility","visible").addClass("fadeIn");
                    $(".ut-overlay-copyright","#ut-overlay-menu-footer").css("visibility","visible").addClass("fadeIn");

                }, 75 * $brooklyn_overlay_navigation_links.length + 100 );

            }, 500 );

        }

        function ut_close_overlay_navigation() {

            $(".ut-overlay-menu", "#ut-overlay-nav").addClass("fadeOut");

            $(".ut-overlay-footer-icons-wrap","#ut-overlay-menu-footer").removeClass("fadeIn").addClass("fadeOut");
            $(".ut-overlay-copyright","#ut-overlay-menu-footer").removeClass("fadeIn").addClass("fadeOut");

            setTimeout( function(){

                $brooklyn_overlay_navigation.removeClass("ut-overlay-menu-visible");

                setTimeout( function(){

                    $brooklyn_overlay_navigation_links.removeClass("fadeInUp");
                    $(".ut-overlay-menu", "#ut-overlay-nav").removeClass("fadeOut");

                    $(".ut-overlay-copyright","#ut-overlay-menu-footer").removeClass("fadeOut").css("visibility","hidden");
                    $(".ut-overlay-footer-icons-wrap","#ut-overlay-menu-footer").removeClass("fadeOut").css("visibility","hidden");


                }, 500 );


            }, 400 );


        }

        $(document).on("click" , '#ut-open-overlay-menu' , function(event) {

            // burger position
            var position_offset = $("#ut-open-overlay-menu").offset();

            // logo position
            var logo_position_offset = $("#header-section .site-logo").offset();

            // overlay position
            var overlay_position_offset = $("#ut-overlay-menu").offset();

            if( !$(this).hasClass("is-active") ) {

                window.requestAnimationFrame( ut_open_overlay_navigation );

                $("#ut-open-overlay-menu").css({
                    "top" : position_offset.top - overlay_position_offset.top,
                    "left" : position_offset.left
                });

                if( $("#ut-overlay-menu .site-logo").length ) {

                    // fallback if regular header logo has been turned off
                    if(typeof(logo_position_offset) === "undefined") {

                        logo_position_offset = {
                            top : 40,
                            left: 40
                        };

                    }

                    $("#ut-overlay-menu .site-logo").css({
                        "top" : logo_position_offset.top - overlay_position_offset.top,
                        "left" : logo_position_offset.left
                    });

                    $("#header-section .site-logo").fadeOut();

                }

                $brooklyn_open_overlay_menu.prependTo("#ut-overlay-menu");

                $brooklyn_open_overlay_menu.dequeue().delay(100).queue(function(){
                    $brooklyn_open_overlay_menu.addClass("is-active");
                });

                // add custom event




            } else {

                window.requestAnimationFrame( ut_close_overlay_navigation );

                $brooklyn_open_overlay_menu.prependTo("#ut-hamburger-wrap-overlay");

                $("#ut-open-overlay-menu").removeAttr("style");

                if( $("#ut-overlay-menu .site-logo").length ) {

                    $("#header-section .site-logo").fadeIn();
                }

                $brooklyn_open_overlay_menu.dequeue().delay(100).queue(function(){
                    $brooklyn_open_overlay_menu.removeClass("is-active");
                });

                // add custom event




            }

            event.preventDefault();

        });

        $(document).on('touchmove', "#ut-overlay-menu", function(ev) {

            if(ev.type !== 'click') {

                ev.stopImmediatePropagation();
                ev.preventDefault();

            }

        });

        document.addEventListener('keyup', function(ev) {

            // escape key.
            if( ev.keyCode === 27 ) {

                if( $brooklyn_open_overlay_menu.hasClass("is-active") ) {

                    $brooklyn_open_overlay_menu.trigger("click");

                }

            }

        });

        $('#ut-overlay-menu a').click( function(event) {

            if( this.hash && !$(this).hasClass('external') && $(this.hash).length ) {

                UT_Scroll.scroll_to(  this.hash, -site_settings.brooklyn_header_scroll_offset );

                if( $brooklyn_open_overlay_menu.hasClass("is-active") ) {
                    $brooklyn_open_overlay_menu.trigger("click");
                }

                event.stopImmediatePropagation();
                event.preventDefault();

            } else if( this.hash && $(this.hash).length && $(this).parent().hasClass('contact-us') ) {

                UT_Scroll.scroll_to(  this.hash, 0 );

                if( $brooklyn_open_overlay_menu.hasClass("is-active") ) {
                    $brooklyn_open_overlay_menu.trigger("click");
                }

                event.stopImmediatePropagation();
                event.preventDefault();

            }

            if( $(this).attr('href') === '#' ) {

                event.stopImmediatePropagation();
                event.preventDefault();

            }


        });

        /* Header Overlay Search
        ================================================== */
        $('.ut-header-search-trigger, .ut-top-header-search-trigger', '#header-section').click( function(event) {

            $('#ut-header-search-close', '#ut-header-search').addClass('is-active');
            $('#ut-header-search').addClass('ut-show-header-search');
            $('#ut-header-searchform input').focus();

            event.preventDefault();

        });

        $('#ut-header-search-close', '#ut-header-search').click( function(event){

            $(this).removeClass('is-active');
            $('#ut-header-search').removeClass('ut-show-header-search');
            event.preventDefault();

        });

        document.addEventListener('keyup', function(ev) {

            // escape key.
            if( ev.keyCode === 27 ) {

                if( $('#ut-header-search').hasClass("ut-show-header-search") ) {

                    $('#ut-header-search').removeClass('ut-show-header-search');

                }

            }

        });

        /* Force Re Render of Section with fixed backgrounds
           Chrome flicker issue
		================================================== */
        if( window.devicePixelRatio > 1 || /chrom(e|ium)/.test(navigator.userAgent.toLowerCase()) ){

            $.fn.redraw = function() {
                return this.stop(true,true).hide(0, function() {
                    $(this).show();
                });
            };

            $('#main-content section').each(function() {

                if ( $(this).css('background-attachment') === 'fixed' ) {

                    $(this).addClass('ut-has-fixed-background');

                }

            });

            var $document = $(document);

            $document.scroll(function(){

                $document.find('.ut-has-fixed-background').redraw();

            });

        }

        /* United Themes Share
		================================================== */

        /* Twitter
		================================================== */
        var utsharetwitter = function() {
            window.open( 'http://twitter.com/intent/tweet?url='+encodeURIComponent(location.href),
                "Twitter",
                "width=650,height=350" );
            return false;
        };

        /* Facebook
		================================================== */
        var utsharefacebook = function(){
            window.open( 'https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(location.href),
                'facebook',
                'width=650,height=350');
            return false;
        };

        /* Google Plus
		================================================== */
        var utsharegoogle = function(){
            window.open( 'https://plus.google.com/share?url='+encodeURIComponent(location.href),
                'googleWindow',
                'width=500,height=500');
            return false;
        };

        /* Linkedin
		================================================== */
        var utsharelinkedin = function(){
            window.open( 'http://www.linkedin.com/shareArticle?mini=true&url='+encodeURIComponent(location.href)+'$title='+$(".page-title").text(),
                'linkedinWindow',
                'width=650,height=450, resizable=1');
            return false;
        };

        /* Pinterest
		================================================== */
        var utsharepinterest = function(){
            window.open( 'http://pinterest.com/pin/create/bookmarklet/?media='+ $('.entry-content img').first().attr('src') + '&description='+jQuery('.page-title').text()+' '+encodeURIComponent(location.href),
                'pinterestWindow',
                'width=750,height=430, resizable=1');
            return false;
        };

        /* Xing
		================================================== */
        var utsharexing = function(){
            window.open( 'https://www.xing-share.com/app/user?op=share;sc_p=xing-share;url='+encodeURIComponent(location.href),
                'deliciousWindow',
                'width=550,height=550, resizable=1');
            return false;
        };

        /* Button Script
		================================================== */
        $(document).on("click", ".ut-share-link", function(event){

            var social = $(this).data("social");

            switch (social) {
                case "utsharetwitter"   : utsharetwitter(); break;
                case "utsharefacebook"  : utsharefacebook(); break;
                case "utsharegoogle"    : utsharegoogle(); break;
                case "utsharelinkedin"  : utsharelinkedin(); break;
                case "utsharepinterest" : utsharepinterest(); break;
                case "utsharexing"      : utsharexing(); break;
            }

            event.preventDefault();

        });

        /* Woocommerce
		================================================== */
        function update_mini_cart_fragments( data ) {

            if( typeof data.cart_contents_count !== "undefined" ) {

                $('.ut-header-cart-count').text( data.cart_contents_count );
                $('.ut-header-mini-cart-total-count').text( data.cart_contents_count );

            }

            if( typeof data.cart_contents_count !== "undefined" ) {

                $('.ut-header-mini-cart-total-price').html( data.cart_total );

            }

            if( typeof data.cart_empty !== "undefined" ) {

                $(".ut-header-mini-cart-overflow-container").each( function(){

                    $(this).html(data.cart_empty);

                });

            }

        }

        function set_mini_cart_height() {

            $(".ut-header-mini-cart-overflow-container").each( function(){

                var $this = $(this),
                    mini_cart_content_height = 0;

                $.each( $this.children().slice(0,3), function(){

                    mini_cart_content_height += $(this).outerHeight(true);

                });

                $this.closest('.ut-header-mini-cart-content').height( mini_cart_content_height );

            });

        }

        function initialize_mini_cart_simplebar() {

            $('.ut-header-mini-cart-content').each( function( index, element ){

                if( $(element).hasClass('ut-simplebar-initialized') ) {
                    return;
                }

                $(element).addClass('ut-simplebar-initialized');

                $(element).ut_require_js({
                    plugin: 'SimpleBar',
                    source: 'simplebar',
                    callback: function (element) {

                        new SimpleBar( element.get(0) );

                    }

                });

            });

        }

        function check_mini_cart_status() {

            $(".ut-header-mini-cart-overflow-container").each( function(){

                var $this = $(this);

                // cart empty
                if( $this.find('.ut-header-mini-cart-item-empty').length ) {

                    $this.closest('ul').addClass('ut-header-mini-cart-no-content');

                } else {

                    $this.closest('ul').removeClass('ut-header-mini-cart-no-content');

                }

            });

        }

        $(document).on("click" , '.ut-remove-header-cart-item' , function(event) {

            var $this = $(this);

            $this.parent().slideUp( function(){

                $.ajax({
                    type: "POST",
                    url: utShortcode.ajaxurl,
                    data: {
                        action : 'remove_item_from_cart',
                        cart_item_key : String( $this.data('cart-item-key') )
                    },
                    success: function( data ) {

                        // remove cart item from dom
                        $this.parent().remove();

                        // update cart fragments
                        update_mini_cart_fragments( data );

                        // check mini cart status
                        check_mini_cart_status();

                        // adjust cart height
                        set_mini_cart_height();

                    }
                });

            });

            event.preventDefault();

        });

        // set mini cart height
        set_mini_cart_height();

        // add simple scroll bar
        initialize_mini_cart_simplebar();

        $( document.body ).on( 'added_to_cart', function(){

            // check mini cart status
            check_mini_cart_status();

            // set mini cart height
            set_mini_cart_height();

        });

        // disable scroll when viewing cart
        $(".ut-header-mini-cart-content").mouseenter(function() {

            site_settings.scrollDisabled = true;
            $brooklyn_body.disableScroll();

        }).mouseleave(function() {

            site_settings.scrollDisabled = false;
            $brooklyn_body.enableScroll();

        });

        $(document).on("click" , '.quantity .decrease' , function(event) {

            var $button  = $(this),
                oldValue = $button.siblings('.qty').val(),
                newVal   = parseFloat( oldValue ) - 1;

            if( newVal >= 1 ) {

                $button.siblings('.qty').val(newVal).trigger('change');

            }

            event.preventDefault();


        });

        $(document).on("click" , '.quantity .increase' , function(event) {

            var $button  = $(this),
                oldValue = $button.siblings('.qty').val(),
                newVal   = parseFloat( oldValue ) + 1;

            $button.siblings('.qty').val(newVal).trigger('change');

            event.preventDefault();

        });


        /* Slider Revolution Hero Calculation
		================================================== */
        var $rev_slider_wrapper = false;

        function adjust_slider_revolution() {

            var hero_height = $(window).height();

            if( !$('body').hasClass('ut-header-display-on-hero') && !$('body').hasClass('ut-header-transparent-on-hero') && !$('body').hasClass('ut-header-hide-on-hero')   ) {

                hero_height -= $("#header-section").height();

            }

            if( $('body').hasClass('ut-site-border-top') ) {

                if( $(window).width() > 1024 ) {

                    hero_height -= site_settings.siteframe_top;

                } else {

                    hero_height -= 0;

                }

            }

            // Adjust Hero
            $('#ut-custom-hero').height( hero_height );

            // Add Class to Slider Revolution ( only once )
            if( !$rev_slider_wrapper.hasClass('ut-force-rev-slider-fullscreen') ) {

                $rev_slider_wrapper.parent().addClass('ut-force-rev-slider-fullscreen');
                $rev_slider_wrapper.addClass('ut-force-rev-slider-fullscreen');
                $rev_slider_wrapper.siblings('.tp-fullwidth-forcer').addClass('ut-force-rev-slider-fullscreen');

            } else {

                // $rev_slider_wrapper
                $rev_slider_wrapper.children('.rev_slider').revredraw();

            }

        }

        if( $('#ut-custom-hero').find('.rev_slider_wrapper').hasClass('fullscreen-container') ) {

            $rev_slider_wrapper = $('#ut-custom-hero').find('.rev_slider_wrapper');

            $rev_slider_wrapper.one('revolution.slide.onloaded', function( e ) {

                adjust_slider_revolution();

            });

        }

        $(window).utresize(function(){

            if( $rev_slider_wrapper ) {

                adjust_slider_revolution();

            }

        });



        $('.ut-portfolio-info-details a').on('click', function ( event ) {

            if( $(this).attr('href') === '#' ) {

                event.preventDefault();

            }

        });


        // Sticky Footer @todo
        $('#ut-custom-contact-section').appear();

        $(document.body).on('appear', '#ut-custom-contact-section', function() {

            /* var $this = $(this);

            if( $this.hasClass('sticky') ) {
                return;
            }


            var $placeholder = $('<div></div>');

            $placeholder.width( $this.width() ).height( $this.height() ).css({
                'display' : 'block',
                'flex'  : '2 0 auto'
            });

            $placeholder.insertBefore('footer');

            $this.addClass('sticky').insertBefore('footer'); */


        });

        $(document.body).on('disappear', '#ut-custom-contact-section', function() {



        });

        /* Custom Cursor
        ================================================== */
        $('#ut-hover-cursor').ut_require_js({
            plugin: 'UT_Animated_Cursor',
            source: 'customcursor',
            ieblock: true, // no IE support
            callback: function () {

                new window.UT_Animated_Cursor( document.getElementById("ut-hover-cursor") );

            }
        });


    });

    // UT Adaptive Images
    window.UT_Adaptive_Images = {

        image_observer: '',

        get_next_image_size: function( current ) {

            var base_sizes = [300, 500, 750, 1000, 1500, 2500];

            for( var i = 0; i < base_sizes.length; i++) {

                if( base_sizes[i] === parseInt(current) ) {

                    if( base_sizes[i+1] !== undefined ) {

                        return base_sizes[i+1];

                    } else {

                        return base_sizes[i];

                    }

                }

            }

        },

        get_responsive_image: function( element, parent ) {

            var images  = $(element).data('adaptive-images'),
                image_found = false;

            if( typeof images !== "undefined" ){

                var parent_width = parent ? $(element).parent().width() : $(element).outerWidth();
                var modern_media_query = window.matchMedia( "screen and (-webkit-min-device-pixel-ratio:2)");

                for( var key in images ) {

                    if( parent_width < key ) {

                        if( modern_media_query.matches ) {

                            var next = UT_Adaptive_Images.get_next_image_size(key);

                            // try to load larger image for retina image
                            if( images[next] !== undefined ) {

                                image_found = true;
                                return images[next];

                            }

                        }

                        image_found = true;
                        return images[key];

                    }

                }

                // no image fits the current container ( large container )
                if( !image_found ) {



                }

            }

            return false;

        },

        load_responsive_background_image: function( element ) {

            var image = UT_Adaptive_Images.get_responsive_image( element, false );

            if( image ) {

                element.style.backgroundImage = 'url(\'' + image + '\')';

            } else if (element.getAttribute('data-src')) { // default image

                element.style.backgroundImage = 'url(\'' + element.getAttribute('data-src') + '\')';

            }

        },

        load_responsive_image: function( element ) {

            var image = UT_Adaptive_Images.get_responsive_image( element, true );

            if( $(element).hasClass('ut-lazy-wait') ) {
                return false;
            }

            if( image ) {

                element.src = image;

            } else if (element.getAttribute('data-src')) { // default image

                element.src = element.getAttribute('data-src');

            }

        },

        init_observer: function( selector ) {

            this.image_observer = lozad( selector, {
                rootMargin: '100%',
                load: function( element ) {

                    UT_Adaptive_Images.load_responsive_image( element );

                },
                loaded: function(el) {

                    var $el = $(el);

                    $el.addClass("ut-image-loaded loaded");

                    if( $el.hasClass('ut-portfolio-featured-image') ) {

                        $el.closest(".ut-portfolio-item").addClass('ut-portfolio-featured-image-loaded');

                    }

                    if( $el.closest('.ut-image-gallery-image').length ) {

                        $el.closest(".ut-image-gallery-item").addClass("ut-image-loaded");

                        // optional box shadow
                        $el.siblings('.ut-box-shadow-lazy').addClass('ut-box-shadow-ready');

                    }

                    $el.delay(200).queue(function () {

                        $.force_appear();

                    });

                    // re-observe till lazy class has been removed
                    if( $el.hasClass('ut-lazy-wait') ) {

                        $el.data('loaded', false );
                        $el.attr('data-loaded', "false" );

                        UT_Adaptive_Images.image_observer.observe(el);

                    }

                }

            });

            this.image_observer.observe();

        },

        init_images: function( force ) {

            var images = document.querySelectorAll('.ut-adaptive-image');

            UT_Adaptive_Images.init_observer( images );

        }

    };

    UT_Adaptive_Images.init_images();

    var resize_timeout;

    $(window).on('resize orientationchange load', function(){

        clearTimeout( resize_timeout );

        resize_timeout = setTimeout(function(){

            $('.ut-adaptive-image').each(function (index, element ) {

                if( $(element).is(":visible") && $(element).parent().is(":visible") && $(element).parent().width() + $(element).parent().height() > 0  ) {

                    UT_Adaptive_Images.load_responsive_image( element );

                }

            });

        }, 250 );

    });

    /* check if we have video players available */
    if( $(".ut-selfvideo-player", '#ut-hero').length ) {

        $(".ut-selfvideo-player", '#ut-hero').each(function() {

            var $videoplayer = this,
                playervolume = $(this).attr("volume") / 100;

            /* set volume */
            $videoplayer.volume=playervolume;

            $('.ut-video-control', '#ut-hero').not('.youtube').click( function( event ) {

                if( $(this).hasClass("ut-unmute") ) {

                    $videoplayer.muted=false;
                    $(this).removeClass("ut-unmute").addClass("ut-mute");

                } else {

                    $videoplayer.muted=true;
                    $(this).removeClass("ut-mute").addClass("ut-unmute");

                }

                $(this).addClass("ut-player-assigned");

                event.preventDefault();

            });

        });

        $('.ut-video-control').not('.youtube').not('.ut-player-assigned').click( function( event ) {

            var player_id = $(this).data("for"),
                $videoplayer = $('#'+player_id)[0];

            if( $(this).hasClass("ut-unmute") ) {

                $videoplayer.muted=false;
                $(this).removeClass("ut-unmute").addClass("ut-mute");

            } else {

                $videoplayer.muted=true;
                $(this).removeClass("ut-mute").addClass("ut-unmute");

            }

            event.preventDefault();

        });

    }

    function isInViewport(element) {

        const rect = element.getBoundingClientRect();
        return (
            rect.top >= 0 &&
            rect.left >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
            rect.right <= (window.innerWidth || document.documentElement.clientWidth)
        );

    }

    $(window).on("load", function () {

        var found = false;

        setTimeout( function () {

            if( !$('.ut-content-block-hero').length ) {
                return false;
            }

            $('.ut-vc-offset-anchor-top').each(function () {

                if( isInViewport(this) && !found ) {

                    if (site_settings.navigation === 'default') {

                        var $current = $('.ut-horizontal-navigation a[href*="#' + $(this).data('id') + '"]');

                        $current.addClass('selected');

                        // check for parent
                        if ($current.closest('ul').hasClass('sub-menu')) {

                            $current.closest('ul').siblings('a').addClass('selected');

                        }

                    } else if (site_settings.navigation === 'side') {

                        $('#bklyn-sidenav a[href*="#' + $(this).data('id') + '"]').addClass('selected');

                    }

                    found = true;
                    return true;

                }

            });

        }, 100 );

        waypoints_active = true;

    });

})(jQuery);
/* ]]> */