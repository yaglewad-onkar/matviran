/**
 * React Slider based on
 * http://www.codrops.com
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 *
 * Copyright 2019, Codrops
 * http://www.codrops.com
 *
 * modified by United Themes
 */

(function($){

    var vis = (function() {

        var stateKey,
            eventKey,
            keys = {
                hidden: "visibilitychange",
                webkitHidden: "webkitvisibilitychange",
                mozHidden: "mozvisibilitychange",
                msHidden: "msvisibilitychange"
            };
        for (stateKey in keys) {
            if (stateKey in document) {
                eventKey = keys[stateKey];
                break;
            }
        }
        return function(c) {
            if (c) document.addEventListener(eventKey, c);
            return !document[stateKey];
        }

    })();



    const MathUtils = {
        lineEq: (y2, y1, x2, x1, currentVal) => {
            // y = mx + b
            var m = (y2 - y1) / (x2 - x1), b = y1 - m * x1;
            return m * currentVal + b;
        },
        lerp: (a, b, n) =>  (1 - n) * a + n * b,
        distance: (x1, x2, y1, y2) => {
            var a = x1 - x2;
            var b = y1 - y2;
            return Math.hypot(a,b);
        },
        randomNumber: (min,max) => Math.floor(Math.random()*(max-min+1)+min)
    };


    let winsize;

    // flag for mousemove
    let is_inview = false;


    // Window Size
    const calcWinsize = () => winsize = {
        width: window.innerWidth, height: window.innerHeight
    };

    calcWinsize();

    window.addEventListener('resize', calcWinsize);

    // Mouse Position
    const getMousePos = (ev) => {

        let posx = 0;
        let posy = 0;

        if( !is_inview || !vis() ) {
            return {x: posx, y: posy};
        }

        if (!ev) ev = window.event;

        if (ev.pageX || ev.pageY) {

            posx = ev.pageX;
            posy = ev.pageY;

        } else if (ev.clientX || ev.clientY) 	{

            posx = ev.clientX + body.scrollLeft + docEl.scrollLeft;
            posy = ev.clientY + body.scrollTop + docEl.scrollTop;

        }

        return {x: posx, y: posy};

    };

    let mousePos = { x: winsize.width/2, y: winsize.height/2 };
    let mouseActive = false;
    let centerLocked = false;

    window.addEventListener( 'mousemove', ev => mousePos = getMousePos(ev) );

    class Slide {

        constructor( el, title, backgroundTitle ) {

            this.DOM = {el: el};
            this.DOM.title = title;
            this.DOM.backgroundTitle = backgroundTitle;
            this.DOM.number = this.DOM.el.querySelector('.ut-react-carousel-number');
            this.DOM.subtitle = this.DOM.el.querySelector('.ut-react-carousel-caption');
            this.DOM.imgWrap = this.DOM.el.querySelector('.ut-react-carousel-img-wrap');
            this.DOM.img = this.DOM.imgWrap.querySelector('.ut-react-carousel-img');
            this.DOM.videoState = '';
            this.DOM.rotate = $(this.DOM.el).parent().data('rotate') === 'on';

            // Extra Video Support
            this.DOM.videoWrap = this.DOM.imgWrap.querySelector('.ut-video-container');

            if( this.DOM.videoWrap !== null ) {

                this.DOM.video = this.DOM.videoWrap.querySelector('.ut-selfvideo-player');

            } else {

                this.DOM.video = null;

            }

        }

        move( direction, val, val_bg ) {

            return new Promise((resolve, reject) => {

                // used to hide interaction layer for a moment
                $(this.DOM.el).parent().addClass('is-sliding');

                const tx    = direction === 'left' ? '+=' + val*-1 : '+=' + val;
                const tx_bg = direction === 'left' ? '+=' + val_bg*-1 : '+=' + val_bg;

                const duration = 1.2;

                // smaller scale on lower screens to avoid overlap
                const scale_factor = winsize.width >= 1025 ? 1.3 : 1.1;

                new TimelineMax({ onComplete: resolve })
                    .to(this.DOM.imgWrap, duration, {
                        x: tx,
                        ease: Quart.easeInOut
                    }, 0)
                    .to(this.DOM.imgWrap, duration*.5, {
                        scaleX: scale_factor,
                        ease: Quart.easeIn
                    }, 0)
                    .to(this.DOM.imgWrap, duration*.5, {
                        scaleX: 1,
                        ease: Quart.easeOut
                    }, duration*.5)
                    .to(this.DOM.number, duration*.95, {
                        x: tx,
                        ease: Quint.easeInOut
                    }, 0)
                    .to(this.DOM.subtitle, duration*1.1, {
                        x: tx,
                        ease: Quart.easeInOut
                    }, 0)
                    .to(this.DOM.title, duration*1.05, {
                        x: tx,
                        ease: Quart.easeInOut
                    }, 0);

                    if( this.DOM.backgroundTitle !== null ) {

                        new TimelineMax().to(this.DOM.backgroundTitle, duration*1.05, {
                            x: tx_bg,
                            ease: Quart.easeInOut
                        }, 0);

                    }

            });

        }

        checkVideoState() {

            this.DOM.videoState = setInterval( () => {

               if( this.DOM.el.classList.contains('ut-react-carousel-item-center') ) {

                   if (this.DOM.el.classList.contains('ut-video-is-playing')) {

                       if (!this.DOM.title.classList.contains('ut-react-carousel-title-hide')) {

                           new TimelineMax().to([this.DOM.title], 0.7, {ease: Expo.easeOut, opacity: 0});
                           this.DOM.title.classList.add('ut-react-carousel-title-hide');

                       }

                   } else {

                       new TimelineMax().to([this.DOM.title], 0.7, {ease: Expo.easeOut, opacity: 1});
                       this.DOM.title.classList.remove('ut-react-carousel-title-hide');

                   }

               }

            }, 200 );

        }

        setCenter() {


            this.DOM.el.classList.add('ut-react-carousel-item-center');
            this.DOM.title.classList.add('ut-react-carousel-item-center');
            this.DOM.title.classList.add('active');

            if( this.DOM.backgroundTitle !== null ) {
                this.DOM.backgroundTitle.classList.add('ut-react-carousel-item-center');
            }

            // .
            if( this.DOM.el.hasAttribute('data-cursor-skin') ) {

                $(this.DOM.el).parent().find('.ut-react-carousel-item-center').attr('data-cursor-skin', this.DOM.el.getAttribute('data-cursor-skin') );
                $(this.DOM.el).parent().find('.ut-react-carousel-item-center').data('cursor-skin', this.DOM.el.getAttribute('data-cursor-skin') );

            }


            TweenMax.set([this.DOM.el, this.DOM.title, this.DOM.backgroundTitle], {opacity: 1});

            if( centerLocked ) {

                // image is already scaled
                TweenMax.set([this.DOM.imgWrap], {scaleY: 1.02});
                TweenMax.set([this.DOM.number], {y: 50});
                TweenMax.set([this.DOM.subtitle], {y: -30});

            }

            // remove wait status for video play
            $(this.DOM.el).attr('data-ut-wait', 0 ).data({ 'inview' : false, 'ut-wait' : 0}).trigger('inview');

            if( this.DOM.el.classList.contains('ut-has-background-video') ) {

                this.checkVideoState();

            } else {

                clearInterval( this.DOM.videoState );

            }

        }
        setRight() {

            this.DOM.el.classList.add('ut-react-carousel-item-right');
            this.DOM.title.classList.add('ut-react-carousel-item-right');
            this.DOM.title.classList.remove('ut-react-carousel-title-hide');

            if( this.DOM.backgroundTitle !== null ) {
                this.DOM.backgroundTitle.classList.add('ut-react-carousel-item-right');
            }

            // add wait status for video play
            $(this.DOM.el).removeData('ut-wait');
            $(this.DOM.el).data('ut-wait', 1).attr('data-ut-wait', 1).trigger('inview');

            TweenMax.set([this.DOM.el, this.DOM.title], {opacity: 1});

            if( this.DOM.backgroundTitle !== null ) {
                TweenMax.set([this.DOM.backgroundTitle], {opacity: 1});
            }

        }
        setLeft() {

            this.DOM.el.classList.add('ut-react-carousel-item-left');
            this.DOM.title.classList.add('ut-react-carousel-item-left');
            this.DOM.title.classList.remove('ut-react-carousel-title-hide');

            if( this.DOM.backgroundTitle !== null ) {
                this.DOM.backgroundTitle.classList.add('ut-react-carousel-item-left');
            }

            // add wait status for video play
            $(this.DOM.el).removeData('ut-wait');
            $(this.DOM.el).data('ut-wait', 1).attr('data-ut-wait', 1 ).trigger('inview');

            TweenMax.set([this.DOM.el, this.DOM.title], {opacity: 1});

            if( this.DOM.backgroundTitle !== null ) {
                TweenMax.set([this.DOM.backgroundTitle], {opacity: 1});
            }

        }
        reset() {

            if( this.DOM.backgroundTitle !== null ) {

                // reset all elements for next cycle
                TweenMax.set([this.DOM.el, this.DOM.imgWrap, this.DOM.number, this.DOM.subtitle, this.DOM.title, this.DOM.backgroundTitle], { transform: 'none' });

                // if not locked by mouse
                if( !centerLocked ) {

                    if( !this.DOM.el.classList.contains('ut-react-carousel-item-center') ) {

                        if( mouseActive && this.DOM.rotate ) {
                            TweenMax.set([this.DOM.imgWrap], {scaleY: 1.02});
                        }

                        if( mouseActive ) {
                            TweenMax.set([this.DOM.number], {y: 50});
                            TweenMax.set([this.DOM.subtitle], {y: -30});
                        }

                        new TimelineMax().to(this.DOM.imgWrap, 0.7, {
                            ease: Expo.easeOut,
                            scale: 1
                        })
                        .to(this.DOM.img, 1.7, {
                            ease: Expo.easeOut,
                            scale: 1
                        }, 0)
                        .to(this.DOM.number, 1.7, {
                            ease: Expo.easeOut,
                            y: 0
                        }, 0)
                        .to(this.DOM.subtitle, 1.7, {
                            ease: Expo.easeOut,
                            y: 0
                        }, 0);

                    }

                }

            } else {

                // reset all elements for next cycle
                TweenMax.set([this.DOM.el, this.DOM.imgWrap, this.DOM.number, this.DOM.subtitle, this.DOM.title], { transform: 'none' });

                // if not locked by mouse
                if( !centerLocked ) {

                    if( !this.DOM.el.classList.contains('ut-react-carousel-item-center') ) {

                        if( mouseActive && this.DOM.rotate ) {
                            TweenMax.set([this.DOM.imgWrap], {scaleY: 1.02});
                        }

                        if( mouseActive ) {
                            TweenMax.set([this.DOM.number], {y: 50});
                            TweenMax.set([this.DOM.subtitle], {y: -30});
                        }

                        new TimelineMax().to(this.DOM.imgWrap, 0.7, {
                            ease: Expo.easeOut,
                            scale: 1
                        })
                        .to(this.DOM.img, 1.7, {
                            ease: Expo.easeOut,
                            scale: 1
                        }, 0)
                        .to(this.DOM.number, 1.7, {
                            ease: Expo.easeOut,
                            y: 0
                        }, 0)
                        .to(this.DOM.subtitle, 1.7, {
                            ease: Expo.easeOut,
                            y: 0
                        }, 0);

                    }

                }

            }

            TweenMax.set([this.DOM.el, this.DOM.title], {opacity: 0});

            if( this.DOM.backgroundTitle !== null ) {
                TweenMax.set([this.DOM.el, this.DOM.backgroundTitle], {opacity: 0});
            }

            // add wait status for video play
            $(this.DOM.el).removeData('ut-wait');
            $(this.DOM.el).data('ut-wait', 1).attr('data-ut-wait', 1 ).trigger('inview');

            if( this.DOM.backgroundTitle !== null ) {
                this.DOM.backgroundTitle.classList.remove('ut-react-carousel-item-left', 'ut-react-carousel-item-right', 'ut-react-carousel-item-center');
            }

            this.DOM.title.classList.remove('ut-react-carousel-item-left', 'ut-react-carousel-item-right', 'ut-react-carousel-item-center');
            this.DOM.el.classList.remove('ut-react-carousel-item-left', 'ut-react-carousel-item-right', 'ut-react-carousel-item-center');


        }

    }

    class Slideshow {

        constructor(el, callback ) {

            this.DOM = {el: el};

            // The titles
            this.DOM.titlesWrap = this.DOM.el.querySelector('.ut-react-carousel-titles-wrap');
            this.DOM.titlesSVG = this.DOM.el.querySelectorAll('.ut-text-svg');
            this.DOM.titlesInner = this.DOM.titlesWrap.querySelector('.ut-react-carousel-titles');
            this.DOM.titles = [...this.DOM.titlesInner.querySelectorAll('.ut-react-carousel-title')];

            // The Background Titles
            this.DOM.titlesBackgroundWrap = this.DOM.el.querySelector('.ut-react-carousel-titles-background-wrap');

            if( this.DOM.titlesBackgroundWrap !== null ) {

                this.DOM.titlesBackgroundInner = this.DOM.titlesBackgroundWrap.querySelector('.ut-react-carousel-background-titles');
                this.DOM.backgroundTitles = [...this.DOM.titlesBackgroundInner.querySelectorAll('.ut-react-carousel-background-title')];

                // The slides instances
                this.slides = [];
                [...this.DOM.el.querySelectorAll('.ut-react-carousel-slide')].forEach((slide, pos) => this.slides.push(new Slide(slide, this.DOM.titles[pos], this.DOM.backgroundTitles[pos])));


            } else {

                this.DOM.titlesBackgroundInner = null;
                this.DOM.backgroundTitles = null;

                // The slides instances
                this.slides = [];
                [...this.DOM.el.querySelectorAll('.ut-react-carousel-slide')].forEach((slide, pos) => this.slides.push(new Slide(slide, this.DOM.titles[pos], null)));

            }

            // Total number of slides
            this.slidesTotal = this.slides.length;

            // Center slide's position
            this.center = 0;

            // Slider Autoplay Feature
            this.autoplay = $(this.DOM.el).data('autoplay');
            this.autoplay_timer = $(this.DOM.el).data('autoplay-timer');

            // will store the interval
            this.slider_autoplay = false;

            // Areas (left, center, right) where to attach the navigation events.
            this.DOM.interaction = {
                left: this.DOM.el.querySelector('.ut-react-carousel-item-left'),
                center: this.DOM.el.querySelector('.ut-react-carousel-item-center'),
                right: this.DOM.el.querySelector('.ut-react-carousel-item-right')
            };

            if( $(this.DOM.el).data('navigation-below') === 'on' ) {

                this.DOM.navigation = {
                    next : this.DOM.el.nextElementSibling.querySelector('.ut-react-carousel-button-next'),
                    prev : this.DOM.el.nextElementSibling.querySelector('.ut-react-carousel-button-prev')
                };

            } else {

                this.DOM.navigation = null;

            }

            this.setVisibleSlides();
            this.calculateGap();
            this.calculateSVG();
            this.initEvents();

            if( this.autoplay === 'on' ) {

                var that = this;

                this.start_autoplay();

                $(this.DOM.el).mouseenter(function() {

                    that.stop_autoplay();

                }).mouseleave(function() {

                    that.stop_autoplay();
                    that.start_autoplay();

                });

            }

            let mouseMoveVals = { translation: 0, rotation: -8 };
            let rotate = $(this.DOM.el).data('rotate') === 'on';

            const render = () => {

                // add mouse rotation
                if( rotate && winsize.width >= 1025 ) {

                    mouseMoveVals.rotation = MathUtils.lerp(mouseMoveVals.rotation, MathUtils.lineEq(-8.5, -7.5, winsize.width, 0, mousePos.x), 0.03);

                } else {

                    mouseMoveVals.translation = MathUtils.lerp(mouseMoveVals.translation, MathUtils.lineEq(-15, 15, winsize.width, 0, mousePos.x), 0.03);

                }

                for( let i = 0; i <= this.slidesTotal - 1; ++i ) {

                    if( winsize.width >= 1025 ) {

                        TweenMax.set(this.slides[i].DOM.img, {x: mouseMoveVals.translation});
                        TweenMax.set(this.DOM.titlesInner, {x: -4 * mouseMoveVals.translation});

                        if( this.DOM.titlesBackgroundInner !== null ) {
                            TweenMax.set( this.DOM.titlesBackgroundInner, {x: -8*mouseMoveVals.translation} );
                        }

                    } else {

                        TweenMax.set(this.slides[i].DOM.img, {x: 0});
                        TweenMax.set(this.DOM.titlesInner, {x: 0});

                        if( this.DOM.titlesBackgroundInner !== null ) {
                            TweenMax.set( this.DOM.titlesBackgroundInner, {x: 0} );
                        }

                    }

                    // add carousel rotation
                    if( $(this.DOM.el).data('rotate') === 'on' ) {

                        if( winsize.width >= 1025 ) {

                            TweenMax.set(this.DOM.el, {rotation: mouseMoveVals.rotation});
                            TweenMax.set(this.DOM.titlesWrap, {rotation: -2 * mouseMoveVals.rotation});

                        } else {

                            TweenMax.set(this.DOM.el, {rotation: 0});
                            TweenMax.set(this.DOM.titlesWrap, {rotation: 0});

                        }

                    }

                }

                requestAnimationFrame(render);

            };

            requestAnimationFrame(render);


            if (callback && typeof(callback) === "function") {
                callback();
            }

        }
        setVisibleSlides() {

            this.centerSlide = this.slides[this.center];
            this.rightSlide = this.slides[this.center+1 <= this.slidesTotal-1 ? this.center+1 : 0];
            this.leftSlide = this.slides[this.center-1 >= 0 ? this.center-1 : this.slidesTotal-1];

            this.centerSlide.setCenter();
            this.rightSlide.setRight();
            this.leftSlide.setLeft();

        }

        // Distance between 2 slides
        // The amount to translate the elements that move when we navigate the slideshow
        calculateGap() {

            const s1 = this.slides[this.center].DOM.el.getBoundingClientRect();
            const s2 = this.slides[this.center+1 <= this.slidesTotal-1 ? this.center+1 : 0].DOM.el.getBoundingClientRect();

            this.gap = MathUtils.distance(s1.left + s1.width/2, s2.left + s2.width/2, s1.top + s1.height/2, s2.top + s2.height/2);
        }

        calculateSVG() {

            this.DOM.titlesSVG.forEach(function(element) {

                var group = element.querySelector('.ut-stroke-offset-group'),
                    bbox = group.getBBox();

                element.setAttribute("width", Math.round( bbox.width ) );
                element.setAttribute("height", Math.round( bbox.height ) );
                element.setAttribute("viewBox", '0 0 ' + Math.round( bbox.width ) + ' ' + Math.round( bbox.height ) );

            });

        }


        start_autoplay() {

            var that = this;

            this.slider_autoplay = setInterval( function () {

                that.navigate( $(that.DOM.el).data('autoplay-direction') );

                if( !is_inview || !vis() ) {

                    clearInterval( this.slider_autoplay );

                }

            }, this.autoplay_timer );

        }

        stop_autoplay() {

            clearInterval( this.slider_autoplay );

        }

        // Initialize events
        initEvents() {

            // Navigate Right
            this.clickRightFn = () => {

                this.navigate('right');

                $(this.DOM.el).data('autoplay-direction', 'right');

                if( this.autoplay === 'on' && !mouseActive ) {

                    this.stop_autoplay();
                    this.start_autoplay();

                }

            };

            this.DOM.interaction.right.addEventListener('click', this.clickRightFn);

            $( this.DOM.el ).on('swipeleft', this.clickRightFn);

            // navigation below action
            if( this.DOM.navigation !== null ) {

                this.DOM.navigation.next.addEventListener('click', this.clickRightFn);

            }

            //Navigate Left
            this.clickLeftFn = () => {

                this.navigate('left');

                $(this.DOM.el).data('autoplay-direction', 'left');

                if( this.autoplay === 'on' && !mouseActive ) {

                    this.stop_autoplay();
                    this.start_autoplay();

                }

            };
            this.DOM.interaction.left.addEventListener('click', this.clickLeftFn);

            $( this.DOM.el ).on('swiperight', this.clickLeftFn);


            // navigation below action
            if( this.DOM.navigation !== null ) {

                this.DOM.navigation.prev.addEventListener('click', this.clickLeftFn);

            }

            // Mouse Zoom Center
            this.mouseenterCenterFn = () => {

                centerLocked = true;

                if ( this.isAnimating || winsize.width < 1025 ) {
                    return;
                }

                new TimelineMax()
                    .to(this.centerSlide.DOM.imgWrap, 0.7, {
                        ease: Expo.easeOut,
                        scale: 1.02
                    })
                    .to(this.centerSlide.DOM.img, 1.7, {
                        ease: Expo.easeOut,
                        scale: 1.05
                    }, 0)
                    .to(this.centerSlide.DOM.number, 1.7, {
                        ease: Expo.easeOut,
                        y: 50
                    }, 0)
                    .to(this.centerSlide.DOM.subtitle, 1.7, {
                        ease: Expo.easeOut,
                        y: -30
                    }, 0);

                if( this.centerSlide.DOM.video !== null )  {

                    new TimelineMax().to(this.centerSlide.DOM.video, 1.7, {
                        ease: Expo.easeOut,
                        scale: 1
                    }, 0);

                }

            };

            $('.ut-react-carousel-item-cursor.ut-react-carousel-item-center', this.DOM.el ).on('mouseenter', this.mouseenterCenterFn );

            this.mouseleaveCenterFn = () => {

                centerLocked = false;

                if ( this.isAnimating || winsize.width < 1025 ) {
                    return;
                }


                new TimelineMax().to(this.centerSlide.DOM.imgWrap, 0.7, {
                        ease: Expo.easeOut,
                        scale: 1
                    })
                    .to(this.centerSlide.DOM.img, 0.7, {
                        ease: Expo.easeOut,
                        scale: 1
                    }, 0)
                    .to(this.centerSlide.DOM.number, 1.7, {
                        ease: Expo.easeOut,
                        y: 0
                    }, 0)
                    .to(this.centerSlide.DOM.subtitle, 1.7, {
                        ease: Expo.easeOut,
                        y: 0
                    }, 0);

                if( this.centerSlide.DOM.video !== null )  {

                    new TimelineMax().to(this.centerSlide.DOM.video, 0.7, {
                        ease: Expo.easeOut,
                        scale: 1
                    }, 0);

                }

            };

            $('.ut-react-carousel-item-cursor.ut-react-carousel-item-center', this.DOM.el ).on('mouseleave', this.mouseleaveCenterFn );

            // Mouse Zoom Left
            this.mouseenterLeftFn = () => {

                if ( this.isAnimating || winsize.width < 1025 ) {
                    return;
                }

                this.leftSlide.DOM.title.classList.add('ut-react-carousel-item-active');

                new TimelineMax()
                    .to(this.leftSlide.DOM.imgWrap, 0.7, {
                        ease: Expo.easeOut,
                        scale: 1.02
                    })
                    .to(this.leftSlide.DOM.img, 1.7, {
                        ease: Expo.easeOut,
                        scale: 1.05
                    }, 0)
                    .to(this.leftSlide.DOM.number, 1.7, {
                        ease: Expo.easeOut,
                        y: 50
                    }, 0)
                    .to(this.leftSlide.DOM.subtitle, 1.7, {
                        ease: Expo.easeOut,
                        y: -30
                    }, 0);


                if( this.leftSlide.DOM.video !== null )  {

                    new TimelineMax().to(this.leftSlide.DOM.video, 1.7, {
                        ease: Expo.easeOut,
                        scale: 1
                    }, 0);

                }

            };

            $('.ut-react-carousel-item-cursor.ut-react-carousel-item-left', this.DOM.el ).on('mouseenter', this.mouseenterLeftFn );

            this.mouseleaveLeftFn = () => {

                if ( this.isAnimating || winsize.width < 1025 ) {
                    return;
                }

                this.leftSlide.DOM.title.classList.remove('ut-react-carousel-item-active');

                new TimelineMax().to(this.leftSlide.DOM.imgWrap, 0.7, {
                    ease: Expo.easeOut,
                    scale: 1
                })
                    .to(this.leftSlide.DOM.img, 0.7, {
                        ease: Expo.easeOut,
                        scale: 1
                    }, 0)
                    .to(this.leftSlide.DOM.number, 1.7, {
                        ease: Expo.easeOut,
                        y: 0
                    }, 0)
                    .to(this.leftSlide.DOM.subtitle, 1.7, {
                        ease: Expo.easeOut,
                        y: 0
                    }, 0);

                if( this.leftSlide.DOM.video !== null )  {

                    new TimelineMax().to(this.leftSlide.DOM.video, 0.7, {
                        ease: Expo.easeOut,
                        scale: 1
                    }, 0);

                }

            };

            $('.ut-react-carousel-item-cursor.ut-react-carousel-item-left', this.DOM.el ).on('mouseleave', this.mouseleaveLeftFn );

            // Mouse Zoom Right
            this.mouseenterRightFn = () => {

                if ( this.isAnimating || winsize.width < 1025 ) {
                    return;
                }

                this.rightSlide.DOM.title.classList.add('ut-react-carousel-item-active');

                new TimelineMax().to(this.rightSlide.DOM.imgWrap, 0.7, {
                    ease: Expo.easeOut,
                    scale: 1.02
                })
                .to(this.rightSlide.DOM.img, 1.7, {
                    ease: Expo.easeOut,
                    scale: 1.05
                }, 0)
                .to(this.rightSlide.DOM.number, 1.7, {
                    ease: Expo.easeOut,
                    y: 50
                }, 0)
                .to(this.rightSlide.DOM.subtitle, 1.7, {
                    ease: Expo.easeOut,
                    y: -30
                }, 0);

                if( this.rightSlide.DOM.video !== null )  {

                    new TimelineMax().to(this.rightSlide.DOM.video, 1.7, {
                        ease: Expo.easeOut,
                        scale: 1
                    }, 0);

                }

            };

            $('.ut-react-carousel-item-cursor.ut-react-carousel-item-right', this.DOM.el ).on('mouseenter', this.mouseenterRightFn );

            this.mouseleaveRightFn = () => {

                if ( this.isAnimating || winsize.width < 1025 ) {
                    return;
                }

                this.rightSlide.DOM.title.classList.remove('ut-react-carousel-item-active');

                new TimelineMax().to(this.rightSlide.DOM.imgWrap, 0.7, {
                    ease: Expo.easeOut,
                    scale: 1
                })
                .to(this.rightSlide.DOM.img, 0.7, {
                    ease: Expo.easeOut,
                    scale: 1
                }, 0)
                .to(this.rightSlide.DOM.number, 1.7, {
                    ease: Expo.easeOut,
                    y: 0
                }, 0)
                .to(this.rightSlide.DOM.subtitle, 1.7, {
                    ease: Expo.easeOut,
                    y: 0
                }, 0);

                if( this.rightSlide.DOM.video !== null )  {

                    new TimelineMax().to(this.rightSlide.DOM.video, 0.7, {
                        ease: Expo.easeOut,
                        scale: 1
                    }, 0);

                }

            };

            $('.ut-react-carousel-item-cursor.ut-react-carousel-item-right', this.DOM.el ).on('mouseleave', this.mouseleaveRightFn );

            // Mouse Click Center
            this.mouseclickCenterFn = () => {

                this.centerSlide.DOM.el.getElementsByTagName('a')[0].click();

            };

            $('.ut-react-carousel-item-cursor.ut-react-carousel-item-center', this.DOM.el ).on('click', this.mouseclickCenterFn );



            this.resizeFn = () => this.calculateGap();
            window.addEventListener('resize', this.resizeFn);

            this.resizeCalc = () => this.calculateSVG();
            window.addEventListener('resize', this.resizeCalc);

            if ( $(this.DOM.el).closest( '.vc_row[data-vc-full-width]' ).length && $( window ).width() >= 1440 ) {

                var that = this;

                new ResizeSensor( $(this.DOM.el).closest( '.vc_row[data-vc-full-width]' ), function(){

                    that.calculateGap();

                    setTimeout( function() {

                        that.calculateSVG();

                    }, 50 );

                } );

            } else if ( $(this.DOM.el).closest( '.vc_section[data-vc-full-width]' ).length && $( window ).width() >= 1440 ) {

                var that = this;

                new ResizeSensor( $(this.DOM.el).closest( '.vc_section[data-vc-full-width]' ), function(){

                    that.calculateGap();

                    setTimeout( function() {

                        that.calculateSVG();

                    }, 50 );


                } );

            }

        }
        navigate(direction) {

            if ( this.isAnimating ) {
                return false;
            }

            this.isAnimating = true;

            const upcomingPos = direction === 'right' ?
                this.center < this.slidesTotal-2 ? this.center+2 : Math.abs(this.slidesTotal-2-this.center):
                this.center >= 2 ? this.center-2 : Math.abs(this.slidesTotal-2+this.center);

            // Update current.
            this.center = direction === 'right' ? this.center < this.slidesTotal-1 ? this.center+1 : 0 : this.center > 0 ? this.center-1 : this.slidesTotal-1;

            this.centerSlide.DOM.title.classList.remove('active');

            this.upcomingSlide = this.slides[upcomingPos];
            this.upcomingTitle = this.upcomingSlide.DOM.title;

            if( this.upcomingSlide.DOM.backgroundTitle !== null ) {

                this.upcomingBackgroundTitle = this.upcomingSlide.DOM.backgroundTitle;

            }

            // Position upcomingSlide / upcomingTitle
            TweenMax.set(this.upcomingSlide.DOM.el, {x: direction === 'right' ? this.gap*2 : -1*this.gap*2, opacity: 1});
            TweenMax.set(this.upcomingTitle, {x: direction === 'right' ? this.gap*2 : -1*this.gap*2, opacity: 1});

            let bg_title_width = null;

            if( this.upcomingSlide.DOM.backgroundTitle !== null ) {

                TweenMax.set(this.upcomingBackgroundTitle, {x: direction === 'right' ? this.upcomingBackgroundTitle.clientWidth : -1*this.upcomingBackgroundTitle.clientWidth, opacity: 1});
                bg_title_width = this.upcomingBackgroundTitle.clientWidth;

            }

            const movingSlides = [this.upcomingSlide, this.centerSlide, this.rightSlide, this.leftSlide];
            let promises = [];

            movingSlides.forEach(slide => promises.push(slide.move(direction === 'right' ? 'left' : 'right', this.gap, bg_title_width )));
            Promise.all(promises).then(() => {

                // After all is moved, update the classes of the 3 visible slides and reset styles
                movingSlides.forEach(slide => slide.reset());

                // Set it again
                this.setVisibleSlides();
                this.isAnimating = false;

                this.DOM.el.classList.remove('is-sliding');

                if( $(this.DOM.el).is(':hover') ) {

                    mouseActive = true;
                    $(this.DOM.el).addClass('mouseentered');

                }

            });

        }

    }

    $(document).ready( function(){

        var ut_react_observer = lozad('.ut-react-carousel', {
            threshold: 0.1,
            rootMargin: '75%',
            loaded: function(el) {

                var that = el,
                    preload_counter = 1,
                    preloader_step = 0,
                    all_images = $( 'img', el ).length;

                $( 'img', el ).each( function(){

                    UT_Adaptive_Images.load_responsive_image(this);

                });

                imagesLoaded( that.querySelectorAll(".ut-react-carousel-img"), function() {

                }).on( 'progress', function() {

                    var percentage = ( preload_counter / all_images ) * 100;

                    $({ counter: preloader_step }).stop().animate({ counter: percentage }, {
                        duration: 800,
                        easing: 'swing',
                        step: function () {

                            $( '#ut-react-carousel-preloader-' + $(that).data('id') ).text( Math.ceil(this.counter) + '%' );
                            preloader_step = this.counter;

                        }
                    });

                    if( preload_counter === all_images ) {

                        // Initialize the slideshow
                        new Slideshow( that, function() {

                            $( '#ut-react-carousel-preloader-' + $(that).data('id') ).fadeOut( 500 );

                            $(that).delay( 1000 ).queue(function(){

                                that.classList.add('loaded');

                            });

                        });

                    }

                    preload_counter++;

                });

            }

        });

        ut_react_observer.observe();

        $('.ut-react-carousel').on('mouseenter', function( event ) {

            if( !this.classList.contains('is-sliding') ) {

                mouseActive = true;
                this.classList.add('mouseentered');

            }

        }).on('mouseleave', function( event ) {

            mouseActive = false;
            $(this).removeClass('mouseentered');

        });

        $('.ut-react-carousel-container').on('inview', function( event, isInView ){

            if( event.target.classList.contains('ut-react-carousel-container') ) {

                if (isInView) {

                    is_inview = true;

                } else {

                    is_inview = false;

                }

            }

        });

        $('.ut-react-carousel-button-prev' ).on('click', function( event ) {

            event.preventDefault();

        });

        $('.ut-react-carousel-button-next' ).on('click', function( event ) {

            event.preventDefault();

        });

        $('.ut-react-carousel-item-cursor' ).on('click', function( event ) {

            event.preventDefault();

        });

        $('.ut-stroke-offset-line').on('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {

            $(this).toggleClass('ut-line-draw-done');

        });

    });

})(jQuery);