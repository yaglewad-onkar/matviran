/* <![CDATA[ */
(function($){

    "use strict";

    window.UT_Animated_Cursor = class UT_Animated_Cursor {

        constructor(el, callback ) {

            this.isStuck            = false;
            this.isInPosition       = false;
            this.outerCursorSpeed   = 0.2;

            this.DOM                = { el: el };
            this.DOM.dotInner       = this.DOM.el.querySelector('ellipse.circle-inner');

            this.DOM.dot_size       = this.DOM.el.getAttribute('data-dot-size');
            this.DOM.dot_size_hover = this.DOM.el.getAttribute('data-hover-dot-size');

            this.DOM.follow         = { el: document.getElementById("ut-hover-cursor-follow") };
            this.DOM.followInner    = this.DOM.follow.el.querySelector('ellipse.circle');

            this.DOM.body           = document.querySelector('body');
            this.DOM.pulse          = document.getElementById('ut-hover-cursor-pulse');

            this.DOM.cursor         = 'default';
            this.DOM.leftOffset     = this.DOM.body.classList.contains('ut-site-border-left') ? site_settings.siteframe_size : 0;
            this.DOM.force_load     = false;
            this.DOM.locked         = false;

            // magnifiy
            this.DOM.mouse          = { x: 0, y: 0 };
            this.DOM.pos            = { x: 0, y: 0 };
            this.DOM.active         = false;



            this.DOM.currentTarget  = { el: false };

            this.magnify          = this.DOM.follow.el.getAttribute('data-magnify') === 'on';
            this.supports_magnify = false;

            this.stuck_list = [];

            // init the cursor itself
            this.initCursor();
            this.initEvents();
            this.parallaxCursor();

            if( callback && typeof(callback) === "function" ) {

                callback();

            }

        }

        resetCursor() {

            // target for magnified cursor
            this.DOM.currentTarget.el = false;

            // magnified cursor
            this.isStuck = false;
            this.isInPosition = false;
            this.DOM.follow.el.classList.remove('ut-hover-cursor-magnified');

            // default cursor
            this.DOM.el.setAttribute('data-cursor', 'default' );
            this.DOM.follow.el.setAttribute('data-cursor', 'default' );

            // adjust inner dot
            this.DOM.dotInner.setAttribute('rx', this.DOM.dot_size );
            this.DOM.dotInner.setAttribute('ry', this.DOM.dot_size );

        }

        parallaxCursor() {

            var that = this;

            if( this.magnify ) {

                if( !this.DOM.el.classList.contains('ut-hover-cursor-grow-off') ) {

                    $('.ut-social-follow-module li').on('mouseenter', function () {

                        TweenMax.set(this, {scale: 2}); // increase interaction size
                        TweenMax.set(this.firstElementChild, {x: 0, y: 0, scale: 0.5}); // resize child to normal size

                        that.supports_magnify = true;

                    }).on('mouseleave', function () {

                        TweenMax.set(this, {scale: 1}); // reset interaction size
                        TweenMax.set(this.firstElementChild, {scale: 1}); // reset interaction size
                        TweenMax.to(this.firstElementChild, 0.2, {x: 0, y: 0}); // move to initial position

                        that.supports_magnify = false;

                    }).on('mousemove', function (e) {

                        if (that.isInPosition) {

                            that.parallaxCircleIt(e, this, 20);
                            that.callParallaxIt(e, this);

                        }

                    });

                }

            }

        }

        callParallaxIt( e, parent ) {

            this.parallaxIt(e, parent, parent.firstElementChild, 15);

        }

        parallaxCircleIt(e, parent, movement) {

            var that = this;

            var rect = parent.getBoundingClientRect();
            var relX = e.clientX - rect.left;
            var relY = e.clientY - rect.top;

            that.DOM.pos.x = rect.left + rect.width / 2 + (relX - rect.width / 2) / movement;
            that.DOM.pos.y = rect.top + rect.height / 2 + (relY - rect.height / 2) / movement;

            TweenMax.to( that.DOM.follow.el, 0.3, { x: that.DOM.pos.x, y: that.DOM.pos.y, ease: Power2.easeOut });

        }

        parallaxIt( e, parent, target, movement ) {

            var boundingRect = parent.getBoundingClientRect();

            var relX = e.clientX - boundingRect.left;
            var relY = e.clientY - boundingRect.top;

            TweenMax.to( target, 0.3, {
                x: (relX - boundingRect.width / 2) / boundingRect.width * movement,
                y: (relY - boundingRect.height / 2) / boundingRect.height * movement,
                ease: Power2.easeOut
            });

        }

        initCursor() {

            var that = this;

            $('.ut-hover-cursor-parent').on( "mousemove", function(e) {

                that.DOM.el.clientX = e.clientX - that.DOM.leftOffset;
                that.DOM.el.clientY = e.clientY;

                that.DOM.mouse.x = e.pageX;
                that.DOM.mouse.y = e.pageY;

            });

            var render_mouse_position = function () {

                // inner circle
                TweenMax.set(that.DOM.el, {
                    x: that.DOM.el.clientX,
                    y: that.DOM.el.clientY
                });


                if( !that.magnify ) {

                    TweenMax.set(that.DOM.follow.el, {
                        x: that.DOM.el.clientX,
                        y: that.DOM.el.clientY
                    });

                } else {

                    // outer circle
                    if( !that.isStuck ) {

                        TweenMax.to(that.DOM.follow.el, that.outerCursorSpeed, {
                            x: that.DOM.el.clientX,
                            y: that.DOM.el.clientY,
                            ease: Power2.easeOut
                        });

                    } else {

                        if( !that.isInPosition ) {

                            if( that.supports_magnify ) {

                                const box = that.DOM.currentTarget.el.getBoundingClientRect();

                                TweenMax.to(that.DOM.follow.el, 0.2, {
                                    x: box.left + box.width / 2,
                                    y: box.top + box.height / 2,
                                    width: box.width,
                                    height: box.height,
                                    ease: Power2.easeOut
                                });

                                that.isInPosition = true;

                            } else {

                                TweenMax.to(that.DOM.follow.el, that.outerCursorSpeed, {
                                    x: that.DOM.el.clientX,
                                    y: that.DOM.el.clientY,
                                    ease: Power2.easeOut
                                });

                            }

                        } else {

                            // cursor parallax


                        }

                    }

                }

                requestAnimationFrame(render_mouse_position);

            };

            requestAnimationFrame(render_mouse_position);

        }

        // Initialize Events
        initEvents() {

            var that = this;
            var $a = $('a:not(.ut-social-follow-link), button:not(.flickity-button ), input[type="submit"], [data-custom-cursor], .ut-social-follow-module li');
            var $cursor_skin = $('[data-cursor-skin]');

            // Pulse
            this.clickPulse = () => {

                TweenMax.set( this.DOM.pulse, {
                    x: that.DOM.el.clientX - that.DOM.el.clientWidth / 2,
                    y: that.DOM.el.clientY - that.DOM.el.clientHeight / 2,
                    scale: 0
                });

                TweenMax.fromTo( this.DOM.pulse, 1,{ scale:.5,opacity:.3 },{ scale:1,opacity:0, clearProps:"all", ease:Expo.easeOut });


            };

            this.DOM.body.addEventListener('click', this.clickPulse );
            this.DOM.body.addEventListener('oncontextmenu', this.clickPulse );

            // Mouse Enter Events for Cursor Skin
            this.mouseenterSkin = function( event ) {

                if( $(this).is('div') && !$(this).is('#ut-morph-box-app') && !$(this).is('#ut-morph-box-full') && !$(this).parent().is('a') ) {

                    event.stopImmediatePropagation();

                }

                if( that.DOM.locked ) {
                    return;
                }

                if( $(this).is('a') ) {

                    that.DOM.locked = true;

                }

                if( $(this).data('cursor-skin') === 'global' ) {

                    that.DOM.el.setAttribute('data-skin', $(that.DOM.el).data('default-skin') );
                    that.DOM.follow.el.setAttribute('data-skin', $(that.DOM.el).data('default-skin') );

                }  else {

                    that.DOM.el.setAttribute('data-skin', $(this).data('cursor-skin') );
                    that.DOM.follow.el.setAttribute('data-skin', $(this).data('cursor-skin') );

                }


            };

            $cursor_skin.on('mouseenter', this.mouseenterSkin );

            // Mouse Leave Events
            this.mouseleaveSkin = function( event ) {

                var $this = $(this);

                if( $this.parent().closest('[data-cursor-skin]').length ) {

                    if( $this.parent().closest('[data-cursor-skin]').get(0).getAttribute('data-cursor-skin') === 'global' ) {

                        that.DOM.el.setAttribute('data-skin', $(that.DOM.el).data('default-skin') );
                        that.DOM.follow.el.setAttribute('data-skin', $(that.DOM.el).data('default-skin') );

                    }  else {

                        that.DOM.el.setAttribute('data-skin', $this.parent().closest('[data-cursor-skin]').get(0).getAttribute('data-cursor-skin') );
                        that.DOM.follow.el.setAttribute('data-skin', $this.parent().closest('[data-cursor-skin]').get(0).getAttribute('data-cursor-skin') );

                    }

                } else {

                    that.DOM.el.setAttribute('data-skin', $(that.DOM.el).data('default-skin') );
                    that.DOM.follow.el.setAttribute('data-skin', $(that.DOM.el).data('default-skin') );

                }

                if( $(this).is('a') ) {

                    that.DOM.locked = false;

                }


            };

            $cursor_skin.on('mouseleave', this.mouseleaveSkin );

            // Mouse Enter Events for Cursor Type
            this.mouseenterFn = function( event ) {

                that.DOM.currentTarget.el = event.currentTarget;

                // adjust inner dot
                if( !$(this).hasClass('ut-deactivated-link') ) {
                    that.DOM.dotInner.setAttribute('rx', that.DOM.dot_size_hover);
                    that.DOM.dotInner.setAttribute('ry', that.DOM.dot_size_hover);
                }

                if( $(this).hasClass('ut-deactivated-link') ) {

                    that.DOM.el.setAttribute('data-cursor', 'default');
                    that.DOM.follow.el.setAttribute('data-cursor', 'default');

                } else if( $(this).hasClass('ut-load-video') ) {

                    that.DOM.el.setAttribute('data-cursor', 'video');
                    that.DOM.follow.el.setAttribute('data-cursor', 'video');

                } else {

                    if ($(event.target).data('custom-cursor')) {

                        that.DOM.el.setAttribute('data-cursor', $(event.target).data('custom-cursor'));
                        that.DOM.follow.el.setAttribute('data-cursor', $(event.target).data('custom-cursor'));

                    } else {

                        if( $(event.target).is('img') || $('img', event.target ).length || $(event.target).hasClass('ut-portfolio-info') || $(event.target).hasClass('ut-image-gallery-image-caption') ) {

                            if( $(event.target).parent().hasClass('ut-deactivated-link') ) {

                                that.DOM.el.setAttribute('data-cursor', 'default');
                                that.DOM.follow.el.setAttribute('data-cursor', 'default');

                            } else {

                                that.DOM.el.setAttribute('data-cursor', 'image');
                                that.DOM.follow.el.setAttribute('data-cursor', 'image');

                            }

                        } else {

                            that.isStuck = true;
                            // that.DOM.follow.el.classList.add('ut-hover-cursor-magnified');

                            that.DOM.el.setAttribute('data-cursor', 'link');
                            that.DOM.follow.el.setAttribute('data-cursor', 'link');

                        }

                    }

                }

            };

            $a.on('mouseenter', this.mouseenterFn );

            // LightGallery
            $(document).on( 'mouseenter', '.lg-icon', this.mouseenterFn );

            // extra event for morph box
            $(document).on('mouseenter', '.ut-morph-box-close' , function( event ){

                that.DOM.el.setAttribute('data-cursor', 'link');
                that.DOM.el.classList.add('ut-cursor-force-size');

                that.DOM.follow.el.setAttribute('data-cursor', 'link');
                that.DOM.follow.el.classList.add('ut-cursor-force-size');

                // set new size
                const target = event.currentTarget;
                const box    = target.getBoundingClientRect();

                that.DOM.followInner.setAttribute('rx', (box.width+16)/2);
                that.DOM.followInner.setAttribute('ry', (box.width+16)/2);

            }).on('mouseleave', '.ut-morph-box-close', function( event ){

                that.DOM.el.setAttribute('data-cursor', 'default');
                that.DOM.el.classList.remove('ut-cursor-force-size');

                that.DOM.follow.el.setAttribute('data-cursor', 'default');
                that.DOM.follow.el.classList.remove('ut-cursor-force-size');

                // set original size
                that.DOM.followInner.setAttribute('rx', 48 );
                that.DOM.followInner.setAttribute('ry', 48 );

            });

            // extra event for flickity carousel
            $(document).on('mouseenter', '.flickity-button, .flickity-page-dots .dot' , function( event ){

                that.DOM.el.setAttribute('data-cursor', 'link');
                that.DOM.el.classList.add('ut-cursor-force-size');

                that.DOM.follow.el.setAttribute('data-cursor', 'link');
                that.DOM.follow.el.classList.add('ut-cursor-force-size');

                // set new size
                const target = event.currentTarget;
                const box    = target.getBoundingClientRect();

                that.DOM.followInner.setAttribute('rx', (box.width+16)/2);
                that.DOM.followInner.setAttribute('ry', (box.height+16)/2);

            }).on('mouseleave', '.flickity-button, .flickity-page-dots .dot', function(){

                that.DOM.el.setAttribute('data-cursor', 'default');
                that.DOM.el.classList.remove('ut-cursor-force-size');

                that.DOM.follow.el.setAttribute('data-cursor', 'default');
                that.DOM.follow.el.classList.remove('ut-cursor-force-size');

                that.DOM.followInner.setAttribute('rx', 48 );
                that.DOM.followInner.setAttribute('ry', 48 );

            });

            // Mouse Leave Events
            this.mouseleaveFn = function() {

                that.resetCursor();

            };

            $a.on('mouseleave', this.mouseleaveFn );

            // LightGallery
            $(document).on( 'mouseleave', '.lg-icon', this.mouseleaveFn );


            // Mousedown and Mouseup
            this.mousedownFn = function() {

                that.DOM.el.classList.add('ut-hover-cursor-mousedown');
                that.DOM.follow.el.classList.add('ut-hover-cursor-mousedown');

            };

            this.DOM.body.addEventListener('mousedown', this.mousedownFn );

            this.mouseupFn = function() {

                that.DOM.el.classList.remove('ut-hover-cursor-mousedown');
                that.DOM.follow.el.classList.remove('ut-hover-cursor-mousedown');

            };

            this.DOM.body.addEventListener('mouseup', this.mouseupFn );


            // Mouse Enter Events on Iframes
            this.mouseenterIFramesFn = function( event ) {

                that.DOM.el.classList.add('ut-hover-cursor-hide');
                that.DOM.follow.el.classList.add('ut-hover-cursor-hide');

            };

            $(document).on( 'mouseenter', 'iframe', this.mouseenterIFramesFn );

            // Mouse Enter Events on Iframes
            this.mouseleaveIFramesFn = function( event ) {

                that.DOM.el.classList.remove('ut-hover-cursor-hide');
                that.DOM.el.setAttribute('data-cursor', 'default');

                that.DOM.follow.el.classList.remove('ut-hover-cursor-hide');
                that.DOM.follow.el.setAttribute('data-cursor', 'default');

            };

            $(document).on( 'mouseleave', 'iframe', this.mouseleaveIFramesFn );

            // user follows link
            this.DOM.force_reload = false;

            $(window).bind("beforeunload", function() {

                if( that.DOM.force_reload ) {
                    return;
                }

                that.DOM.el.classList.add('loading');
                that.DOM.follow.el.classList.add('loading');

            });

            $(window).bind("pageshow", function( event ) {

                if( event.originalEvent.persisted ) {

                    that.DOM.force_reload = true;

                }

            });

            // additional events
            $(document).on('ut.close.overlay', this.resetCursor() );

        }

    }

})(jQuery);
/* ]]> */