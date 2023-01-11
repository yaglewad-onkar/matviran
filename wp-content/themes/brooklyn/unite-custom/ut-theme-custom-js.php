<?php if (!defined('UT_VERSION')) {
    exit; // exit if accessed directly
}

/**
 * Custom JavaScript Class
 * 
 * 
 * @package Brooklyn Theme
 * @author United Themes
 * since 4.4
 */

if( !class_exists( 'UT_Custom_JS' ) ) {

    class UT_Custom_JS {

        public $js;

        function __construct() {

            add_action( 'wp_head', array( $this, 'theme_preloader_js' ) );
            add_action( 'wp_head', array( $this, 'header_js' ) );
            add_action( 'ut_java_footer_hook', array( $this, 'custom_js' ), 99 );

        }

        public function minify_js( $js ) {

            $js = str_replace('<script>','', $js);
            $js = str_replace('</script>','', $js);

            if( apply_filters( 'ut_minify_assets', true ) ) {

                return UT_JS_Minifier::minify( $js );

            } else {

                return $js;

            }

        }


        public function theme_preloader_js() {

            if( ot_get_option('ut_use_image_loader') == 'on' ) :

                if( ut_dynamic_conditional('ut_use_image_loader_on') ) :

                    /* settings for pre loader */
                    $loadercolor        = ot_get_option('ut_image_loader_color');
                    $barcolor           = ot_get_option('ut_image_loader_bar_color', get_option('ut_accentcolor' , '#CC5E53') );
                    $loader_bg_color    = ot_get_option('ut_image_loader_background', '#FFF');
                    $bar_height         = ot_get_option('ut_image_loader_barheight', 3);
                    $ut_show_loader_bar = ot_get_option('ut_show_loader_bar', 'on');

                    ob_start(); ?>

                    <script>

                        (function($){

                            "use strict";

                            $(window).on("load", function(){

                                $(document).ready(function(){

                                    $("body").queryLoader2({
                                        showbar: "<?php echo esc_attr( $ut_show_loader_bar ); ?>",
                                        barColor: "<?php echo esc_attr( $barcolor ); ?>",
                                        textColor: "<?php echo esc_attr( $loadercolor ); ?>",
                                        backgroundColor: "<?php echo esc_attr( $loader_bg_color ); ?>",
                                        barHeight: <?php echo $bar_height; ?>,
                                        percentage: true,
                                        completeAnimation: "fade",
                                        minimumTime: 500,
                                        onComplete : function() {

                                            setTimeout(function () {

                                                preloader_settings.loader_active = false;

                                            }, 400 );

                                            $(".ut-loader-overlay:not(.ut-loader-overlay-with-morph)").fadeOut( 800 , "easeInOutExpo" , function() {

                                                $(this).remove();
                                                $.force_appear();

                                            });

                                            if( $(".ut-close-query-loader").length ) {

                                                $(".ut-close-query-loader").trigger("click").delay(600).queue(function () {

                                                    preloader_settings.loader_active = false;
                                                    $.force_appear();

                                                });

                                            }

                                        }

                                    });

                                });

                            });

                         })(jQuery);

                    </script>

                    <?php

                    echo '<script type="text/javascript">' . $this->minify_js( ob_get_clean() ) . '</script>';


                endif;

            endif;

        }


        public function header_js() {

            ob_start(); ?>

            <script>

            (function($){

                "use strict";

                let html = document.documentElement;

                html.classList.remove('ut-no-js');
                html.classList.add('ut-js');

                <?php

                /**
                  * Animated Hero Image
                  */

                if( ut_return_hero_config('ut_hero_type', 'image') == 'animatedimage' ) :

                    $header_image = ut_return_hero_config('ut_hero_animated_image');

                    // animation speed in second
                    $image_speed  = ut_return_hero_config('ut_hero_animated_image_speed', 40);
                    $image_speed  = preg_replace("/[^0-9]/", '', $image_speed);

                    // animation direction
                    $image_direction  = ut_return_hero_config('ut_hero_animated_image_direction', 'left');
                    $direction = $image_direction == 'right' ? '' : '-';

                    // alternate
                    $alternate = ut_return_hero_config( 'ut_hero_animated_image_direction_alternate', 'on' );

                    if( !empty( $header_image ) ) :

                        $header_image = ut_get_image_id( $header_image );
                        $header_image = wp_get_attachment_image_src( $header_image , 'full' );

                        if( !empty( $header_image ) && is_array( $header_image ) ) :

                    ?>

                    $(window).on("load", function(){

                        $(document).ready( function(){

                        <?php if( ut_return_hero_config( 'ut_hero_animated_image_size' ) == 'cover' || !ut_return_hero_config( 'ut_hero_animated_image_size' ) && ut_return_hero_config('ut_hero_animated_image_cover', 'off') == 'off' ) : ?>

                            var supportedFlag = $.keyframe.isSupported(),
                                position = $(window).width() < <?php echo $header_image[1]; ?> ? <?php echo $header_image[1]; ?> - $(window).width() : $(window).width();

                            if( $(window).width() < <?php echo $header_image[1]; ?> ) {

                               $('#ut-hero .parallax-scroll-container').addClass('ut-animated-image-background');

                            }

                        <?php else : ?>

                            var supportedFlag = $.keyframe.isSupported(),
                                position = $(window).width();

                        <?php endif; ?>

                        <?php if( $alternate == 'off' ) : ?>

                            $.keyframe.define([{
                                name: 'animatedBackground',
                                media: 'screen and (min-width: 1025px)',
                                '0%':  { 'background-position' : '0 0'},
                                '100%':{ 'background-position' : <?php echo $direction; ?>position+'px 0' },
                            }]);



                                $('#ut-hero .parallax-scroll-container').queue(function(){

                                    $(this).addClass('ut-hero-ready').playKeyframe({
                                        name: 'animatedBackground',
                                        timingFunction: 'linear',
                                        duration: '<?php echo $image_speed; ?>s',
                                        iterationCount: 'infinite'
                                    });

                                    $('#ut-sitebody').addClass('ut-hero-image-preloaded');

                                    start_hero_animation_process( document.getElementById('ut-hero') );

                                });



                        <?php else : ?>

                           $.keyframe.define([{
                                name: 'animatedBackground',
                                media: 'screen and (min-width: 1025px)',
                                '0%': { 'background-position' : '0 0'},
                                '50%':{ 'background-position' : <?php echo $direction; ?>position+'px 0' },
                                '100%': { 'background-position' : '0 0'}
                            }]);



                                $('#ut-hero .parallax-scroll-container').queue(function(){

                                    $(this).addClass('ut-hero-ready').playKeyframe({
                                        name: 'animatedBackground',
                                        timingFunction: 'linear',
                                        duration: '<?php echo $image_speed; ?>s',
                                        iterationCount: 'infinite'
                                    });

                                    $('#ut-sitebody').addClass('ut-hero-image-preloaded');

                                    start_hero_animation_process( document.getElementById('ut-hero') );

                                });

                        <?php endif; ?>

                        });

                    });

                    <?php endif; ?>

                    <?php endif; ?>

                <?php endif; ?>


				<?php

				/**
                  * Hero Area Loading
                  */

				?>

                $.fn.reverse = function() {
                    return this.pushStack(this.get().reverse(), arguments);
                };

				$(document).ready(function(){

                    var $sitebody             = $("#ut-sitebody");
					var wait_for_images       = true;

                    // preloader interval check
                    var check_preloader_status = setInterval(function() {

                        if( typeof preloader_settings != "undefined" && !preloader_settings.loader_active && !wait_for_images ) {

                            $sitebody.addClass("ut-hero-image-preloaded");

                            // delete setInterval
                            clearInterval(check_preloader_status);

                        } else if( typeof preloader_settings === "undefined" && !wait_for_images ) {

                            $sitebody.addClass("ut-hero-image-preloaded");

                            // delete setInterval
                            clearInterval( check_preloader_status );

                        }

                    }, 50 );

                    // fires after hero images have been loaded
                    window.start_hero_animation_process = function( element ) {

                        // by adding this class, the animation process starts
                        $sitebody.addClass("ut-hero-image-animated");

                        <?php // Hero Title Underline Animation
                        if( ut_collect_option( 'ut_hero_caption_animation_type', 'group' ) == 'group_split' ) {

                            // Upper Area
                            $selector = '#ut-hero .ut-hero-animation-element-upper';

                        }

                        if( ut_collect_option( 'ut_hero_caption_animation_type', 'group' ) == 'group' ) {

                            // Entire Group
                            $selector = '#ut-hero .hero-inner .ut-hero-animation-element';

                        }

                        if( ut_collect_option( 'ut_hero_caption_animation_type', 'group' ) == 'single' ) {

                            // Single Element
                            $selector = '#ut-hero .hero-title';

                        } ?>

                        $(document.body).on('webkitAnimationStart mozAnimationStart MSAnimationStart oanimationstart animationstart', '<?php echo $selector; ?>', function() {

                            $('#ut-hero .hero-title').delay( <?php echo ut_collect_option( 'ut_hero_caption_animation_effect_timer', '1000' ) / 2; ?> ).queue(function() {

                                $(this).addClass('hero-title-animated');
                                $(this).parent().addClass('ut-hth-ready');

                            });

                        });

                        <?php if( ut_collect_option( 'ut_hero_caption_animation_type', 'group' ) == 'single' && ut_collect_option( 'ut_caption_title_distortion', 'off' ) == 'on' ) : ?>

                            $(document.body).one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', '<?php echo $selector; ?>', function() {

                                $(this).addClass('ut-force-glitch-animation');

                            });

                        <?php endif; ?>

                        <?php

                        // Execute Hero Fade In and wait 600ms for a better animation experience
                        if( ut_collect_option( 'ut_hero_caption_animation_effect', 'heroFadeIn' ) == 'heroFadeIn' ) : ?>

                            $(element).delay( 600 ).queue(function() {

                        <?php endif; ?>

                            <?php if( ut_collect_option( 'ut_hero_caption_animation_type', 'group' ) == 'group' || ut_collect_option( 'ut_hero_caption_animation_type', 'group' ) == 'group_split' ) : ?>

                                $('#ut-hero .ut-hero-animation-element').not('.hero-down-arrow').addClass('ut-hero-animation-element-start');

                                $('#ut-hero .hero-down-arrow').delay( 200 ).queue(function() {

                                    $(this).addClass('ut-hero-animation-element-start');

                                });

                            <?php else : ?>

                                <?php if( strpos( ut_collect_option( 'ut_hero_caption_animation_effect', 'fadeIn' ), 'Down') !== false  || ut_collect_option( 'ut_hero_caption_animation_effect', 'heroFadeIn' ) == 'zoomInUp'  ) : ?>

                                    $('#ut-hero .ut-hero-animation-element').reverse().each( function(index) {

                                <?php else : ?>

                                    $('#ut-hero .ut-hero-animation-element').each( function(index){

                                <?php endif; ?>

                                        var $this = $(this);

                                        if( $this.hasClass("hero-down-arrow") ) {

                                            $this.delay( 200 * ( $('.hero-inner', "#ut-hero").children().length + 1 )  ).queue(function() {

                                                $this.addClass('ut-hero-animation-element-start');

                                            });

                                        } else {

                                            $this.delay( <?php echo ut_collect_option( 'ut_hero_caption_animation_effect_timer', '1000' ) * 0.5; ?> * index ).queue(function() {

                                                $this.addClass('ut-hero-animation-element-start').dequeue();

                                            });

                                        }

                                    });

                            <?php endif; ?>

                        <?php if( ut_collect_option( 'ut_hero_caption_animation_effect', 'heroFadeIn' ) == 'heroFadeIn' ) : ?>

                            });

                        <?php endif; ?>

                    }

                    /* # Image
					================================================== */
                    var $hero_image_container = $(".parallax-scroll-container", "#ut-hero");

					if( $hero_image_container.length ) {

                        if( $hero_image_container.children('.parallax-image-container').length ) {

                            $hero_image_container.children('.parallax-image-container').waitForImages(function() {

                                wait_for_images = false;

                            });

                        } else {

                            $hero_image_container.waitForImages(function() {

                                wait_for_images = false;

                            });

                        }

						$(document.body).on('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', '#ut-hero .parallax-scroll-container', function() {

                            start_hero_animation_process( this );

						});

                        $(document.body).on('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', '#ut-hero .parallax-image-container:not(.parallax-image-container-ready)', function() {

                            $(this).addClass('parallax-image-finished');

                        });

					}

                    /* # Slider
                    ================================================== */
                    var $hero_slider_container = $(".slides", "#ut-hero-slider");

                    if( $hero_slider_container.length ) {

                        $hero_slider_container.find('.parallax-image-container').waitForImages(function() {

                            wait_for_images = false;

                        });

                        $(document.body).on('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', '#ut-hero-slider', function() {

                            start_hero_animation_process( this );

                        });

                    }

                    /* # Image Fader
					================================================== */
					var $hero_imagefader_container = $(".ut-image-fader li", "#ut-hero");

					if( $hero_imagefader_container.length ) {

						$hero_imagefader_container.waitForImages(function() {

							$sitebody.addClass("ut-hero-image-preloaded");

						});

						$(document.body).on('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', '#ut-hero .ut-image-fader', function() {

							start_hero_animation_process( this );

						});

					}

                    /* # Rain Effect
					================================================== */
					var $hero_rain_background_container = $("#ut-rain-background", "#ut-hero");

					if( $hero_rain_background_container.length ) {

						$hero_rain_background_container.waitForImages(function() {

							$sitebody.addClass("ut-hero-image-preloaded");

						});

						$(document.body).on('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', '#ut-hero canvas', function() {

							start_hero_animation_process( this );

						});

					}

				});

            })(jQuery);

            </script>

            <?php

            echo '<script type="text/javascript">' . $this->minify_js( ob_get_clean() ) . '</script>';

        }

        public function custom_js() {

            $ut_hero_type = ut_return_hero_config('ut_hero_type');
            $ut_hero_type = $ut_hero_type == 'dynamic' ? 'image' : $ut_hero_type; // fallback since dynamic header has been removed with 4.4

            ob_start(); ?>

                <script>

                <?php if( ot_get_option( 'ut_google_smooth_scroll', 'off' ) == 'on' ) : ?>

                var matched, browser;

                // Use of jQuery.browser is frowned upon.
                // More details: http://api.jquery.com/jQuery.browser
                // jQuery.uaMatch maintained for back-compat
                jQuery.uaMatch = function( ua ) {
                    ua = ua.toLowerCase();

                    var match = /(chrome)[ \/]([\w.]+)/.exec( ua ) ||
                        /(webkit)[ \/]([\w.]+)/.exec( ua ) ||
                        /(opera)(?:.*version|)[ \/]([\w.]+)/.exec( ua ) ||
                        /(msie) ([\w.]+)/.exec( ua ) ||
                        ua.indexOf("compatible") < 0 && /(mozilla)(?:.*? rv:([\w.]+)|)/.exec( ua ) ||
                        [];

                    return {
                        browser: match[ 1 ] || "",
                        version: match[ 2 ] || "0"
                    };
                };

                matched = jQuery.uaMatch( navigator.userAgent );
                browser = {};

                if ( matched.browser ) {
                    browser[ matched.browser ] = true;
                    browser.version = matched.version;
                }

                // Chrome is Webkit, but Webkit is also Safari.
                if ( browser.chrome ) {
                    browser.webkit = true;
                } else if ( browser.webkit ) {
                    browser.safari = true;
                }

                jQuery.browser = browser;

                if( jQuery.browser.webkit && jQuery.browser.chrome ) {

                    SmoothScroll({
                        frameRate: 150,
                        animationTime: 1000,
                        stepSize: 175,
                        accelerationDelta: 100,
                        accelerationMax: 6,
                        pulseScale : 6,
                        pulseNormalize : 1,
                        fixedBackground : false
                    });

                }

                <?php endif; ?>

				window.matchMedia||(window.matchMedia=function(){

					var c=window.styleMedia || window.media;if(!c) {

						var a=document.createElement("style"),
							d=document.getElementsByTagName("script")[0],
							e=null;

						a.type="text/css";a.id="matchmediajs-test";d.parentNode.insertBefore(a,d);e="getComputedStyle"in window&&window.getComputedStyle(a,null)||a.currentStyle;c={matchMedium:function(b){b="@media "+b+"{ #matchmediajs-test { width: 1px; } }";a.styleSheet?a.styleSheet.cssText=b:a.textContent=b;return"1px"===e.width}}}return function(a){return{matches:c.matchMedium(a|| "all"),media:a||"all"}}

				}());

				/*!
				 * jQuery.utresize
				 * @author UnitedThemes
				 * @version 1.0
				 *
				 */

				(function ($, sr) {

					"use strict";

					var debounce = function (func, threshold, execAsap) {
						var timeout = '';
						return function debounced() {
							var obj = this, args = arguments;
							function delayed() {
								if (!execAsap) {
									func.apply(obj, args);
								}
								timeout = null;
							}

							if (timeout) {
								clearTimeout(timeout);
							} else if (execAsap) {
								func.apply(obj, args);
							}
							timeout = setTimeout(delayed, threshold || 100);
						};
					};

					jQuery.fn[sr] = function(fn){  return fn ? this.bind('resize', debounce(fn)) : this.trigger(sr); };

				})(jQuery,'utresize');

                (function($){

				    "use strict";

					if (!String.prototype.includes) {

						String.prototype.includes = function(search, start) {

							if (typeof start !== 'number') {
								start = 0;
							}

						  	if (start + search.length > this.length) {

								return false;

						  	} else {

								return this.indexOf(search, start) !== -1;

							}

						};

					}

					if (!Object.keys) {
                        Object.keys = function (obj) {
                            let arr = [],
                                key;
                            for (key in obj) {
                                if (obj.hasOwnProperty(key)) {
                                    arr.push(key);
                                }
                            }
                            return arr;
                        };
                    }

					function isEmpty(str) {
                        return (!str || str.length === 0 );
                    }

                    function occurrences( string, subString, allowOverlapping ) {

                        string += "";
                        subString += "";

                        if (subString.length <= 0) return (string.length + 1);

                        var n = 0,
                            pos = 0,
                            step = allowOverlapping ? 1 : subString.length;

                        while (true) {
                            pos = string.indexOf(subString, pos);
                            if (pos >= 0) {
                                ++n;
                                pos += step;
                            } else break;
                        }

                        return n;

                    }

					function findLongestWord(str) {

                        // count dots
                        var dot_count = occurrences( str, '.' );

                        // remove dots
                        str = str.split(".").join("");

						var strSplit = str.split(' ');
					  	var longestWord = 0;

					  	for( var i = 0; i < strSplit.length; i++ ){

							if(strSplit[i].length > longestWord) {
								longestWord = strSplit[i].length;
							}

					  	}

						return longestWord + ( dot_count / 4 );

					}

					// globals
                    const document_root = document.querySelector( "html" ),
                          global_responsive_font_settings = <?php echo json_encode( ut_font_responsive_settings() ); ?>,
                          global_responsive_breakpoints = <?php echo json_encode( ot_recognized_breakpoints_values( '', 'query',false ) ); ?>,
                          pixelsPerRem = Number( getComputedStyle( document_root ).fontSize.slice( 0,-2 ) );

                    $.fn.flowtype = function(options) {

                        let settings = $.extend({
                            maximum    		 : 9999,
                            minimum    		 : 1,
                            maxFont    		 : 9999,
							lineHeight 		 : false,
                            minFont    		 : 1,
                            minFontMobile    : false,
                            fontRatio  		 : 40,
                            ratioMulti       : 2.45,
							dynamicFontRatio : false,
                            type             : 'hero',
                            loaded           : '',
                            check_size       : false
                        }, options ),

                        skip_next_downscale = false,
                        skip_next_upscale   = false,

                        // @todo check if needed for logo - too expensive due to jquery
                        check_size = function( $el, $parent, fontSize, max_font ) {

                            $el.parent().css('font-size', fontSize + 'px');

                            if( $el.width() < $parent.width() && !skip_next_upscale ) {

                                if( fontSize < max_font ) {

                                    skip_next_downscale = true;
                                    check_size( $el, $parent, fontSize + 1, max_font )

                                } else {

                                    skip_next_downscale = false;
                                    $el.addClass('ut-flowtyped');
                                    return fontSize;

                                }

                            }

                            if( $el.width() > $parent.width() && !skip_next_downscale ) {

                                if( fontSize > 12 ) {

                                    skip_next_upscale = true;
                                    check_size( $el, $parent, fontSize - 1, max_font );

                                } else {

                                    skip_next_upscale = false;
                                    $el.addClass('ut-flowtyped');
                                    return fontSize;

                                }

                            }

                            return fontSize;

                        },

                        px_to_rem = function( px ) {

                            return px / pixelsPerRem;

                        },

                        get_clump_viewport = function() {

                            for( let key in global_responsive_breakpoints ) {

                                if( window.matchMedia(global_responsive_breakpoints[key].query).matches ) {

                                    const max = global_responsive_breakpoints[key].val.max !== 'auto' ? global_responsive_breakpoints[key].val.max : window.screen.availWidth,
                                          min = global_responsive_breakpoints[key].val.min !== 'auto' ? global_responsive_breakpoints[key].val.min : 320;

                                    return {
                                        'breakpoint' : key,
                                        'min' : min,
                                        'max' : max
                                    };

                                }

                            }

                            return false;

                        },

                        next = function(db, key) {

                            let keys = Object.keys(db),
                                 i = keys.indexOf(key);
                            return i !== -1 && keys[i + 1] && db[keys[i + 1]];

                        },

                        get_next_viewport_value = function ( breakpoint, maxFontSize, clump_viewport, responsive_font_settings ) {

                            let next_viewport_value = next( responsive_font_settings['font-size'], breakpoint );

                            if( next_viewport_value !== undefined ) {

                                if( next_viewport_value === 'auto' ) {

                                    return maxFontSize;

                                } else {

                                    return next_viewport_value;

                                }

                            } else {

                                if( responsive_font_settings['font-size'][breakpoint] !==  undefined ) {

                                    return responsive_font_settings['font-size'][breakpoint];

                                } else {

                                    return maxFontSize;

                                }

                            }

                        },

                        clamp_value_builder = function( maxFontSize, responsive_font_settings ) {

                            if( window.isMsIE ) {
                                return false;
                            }

                            let clump_viewport = get_clump_viewport();

                            if( clump_viewport ) {

                                let minFontSize = get_next_viewport_value( clump_viewport["breakpoint"], maxFontSize, clump_viewport, responsive_font_settings );

                                if( minFontSize === 'inherit' ) {

                                    return false;
                                    // minFontSize = maxFontSize;

                                }

                                maxFontSize = px_to_rem( maxFontSize );
                                minFontSize = px_to_rem( minFontSize );

                                if( minFontSize > maxFontSize ) {
                                    return;
                                }

                                const minWidth = clump_viewport["min"] / pixelsPerRem;
                                const maxWidth = clump_viewport["max"] / pixelsPerRem;

                                const slope = ( maxFontSize - minFontSize ) / ( maxWidth - minWidth );
                                const yAxisIntersection = -minWidth * slope + minFontSize;

                                return 'clamp( '+minFontSize+'rem, '+yAxisIntersection+'rem + '+ (slope * 100) +'vw, '+maxFontSize+'rem )';

                            } else {

                                return false;

                            }

                        },

                        set_lineheight = function( el, line_height, font_size, responsive_font_settings ) {

                            if( responsive_font_settings['line-height-unit'] !== undefined && responsive_font_settings['line-height-unit'] !== 'px' ) {
                                return;
                            }

                            if( el.classList.contains("element-with-custom-line-height") || $(el).parent().hasClass("element-with-custom-line-height") ) {

                                if( line_height === 'inherit' && responsive_font_settings['base-line-height'] ) {

                                    let ratio = responsive_font_settings['base-line-height'] / responsive_font_settings['base-font-size'];

                                    el.style.setProperty('line-height', (font_size * ratio) + 'px', 'important');

                                } else {

                                    if( responsive_font_settings['line-height-unit'] !== undefined ) {

                                        el.style.setProperty('line-height', line_height + responsive_font_settings['line-height-unit'], 'important');

                                    } else {

                                        el.style.setProperty('line-height', line_height + 'px', 'important');

                                    }

                                }

                            }

                        },

                        set_lineheight_percent = function( el, font_size, line_height, responsive_font_settings ) {

                            if( responsive_font_settings['line-height-unit'] !== undefined && responsive_font_settings['line-height-unit'] !== 'px' ) {
                                return;
                            }

                            if( !isEmpty( line_height ) && ( el.classList.contains("element-with-custom-line-height") || $(el).parent().hasClass("element-with-custom-line-height") ) ) {

                                if( line_height === 'inherit' && responsive_font_settings['base-line-height'] ) {

                                    let ratio = responsive_font_settings['base-line-height'] / responsive_font_settings['base-font-size'];

                                    if( font_size === 'inherit' ) {

                                        el.style.setProperty( 'line-height', ( 100 / responsive_font_settings['base-font-size'] ) * responsive_font_settings['base-line-height'] + '%', 'important' );

                                    } else {

                                        el.style.setProperty( 'line-height', ( font_size * ratio ) + 'px', 'important' );

                                    }

                                } else {

                                    el.style.setProperty( 'line-height', ( 100 / font_size ) * line_height + '%', 'important' );

                                }

                            }

                        },

                        merge_responsive_settings = function ( global, $el ) {

                            // merge with local settings
                            if( global[$el.data('responsive-font')] !== undefined && $el.data('responsive-font-settings') !== undefined ) {

                                let local = {},
                                    settings = $el.data('responsive-font-settings');

                                for( const g_index in global[$el.data('responsive-font')] ) {

                                    for( const index in settings ) {

                                        if (settings[index] === 'global' ) {

                                            local[index] = global[$el.data('responsive-font')][index];

                                        } else if (typeof settings[index] === 'object') {

                                            local[index] = {};

                                            for (const _index in settings[index]) {

                                                if( settings[index][_index] === 'global' ) {

                                                    local[index][_index] = global[$el.data('responsive-font')][index][_index];

                                                } else {

                                                    local[index][_index] = settings[index][_index];

                                                }

                                            }

                                        } else {

                                            local[index] = settings[index];

                                        }

                                    }

                                    // check for unassigned attributes @todo has bug
                                    if( local[g_index] === undefined ) {

                                        local[g_index] = global[$el.data('responsive-font')][g_index];

                                        if( g_index === 'font-size' ) {

                                            // local[g_index]['desktop_large'] = local['base-font-size'];

                                        }

                                    }

                                }

                                return local;

                            } else if( $el.data('responsive-font-settings') !== undefined ) {

                                return $el.data('responsive-font-settings');

                            } else {

                                return global[$el.data('responsive-font')] !== undefined ? global[$el.data('responsive-font')] : false;

                            }

                        },

                        changes = function(el) {

                            let $el = $(el);
                                $el.removeAttr('style');

                            if( el.classList.contains('ut-skip-flowtype') ) {
                                return;
                            }

                            if( $el.is('p') || $el.is('div') ) {

                                if( !$el.hasClass('ut-allow-flow-type') ) {
                                    return;
                                }

                            }

                            let min_font    = settings.minFont,
                                max_font    = settings.maxFont,
                                line_height = settings.lineHeight;

                            let custom_font_size_found   = '',
                                custom_line_height_found = false,
                                responsive_font_settings = {},
                                current_viewport = '';

                            if( $el.data('responsive-font') ) {

                                responsive_font_settings = merge_responsive_settings(global_responsive_font_settings, $el);

                                // fallback element only has base sizes
                                if( $el.data('responsive-font-settings') && Object.keys( $el.data('responsive-font-settings') ).length <= 2 ) {

                                    // assign custom font size for later calculation
                                    max_font = responsive_font_settings['base-font-size'] !== 'auto' ? responsive_font_settings['base-font-size'] : global_responsive_font_settings['base-font-size'];
                                    max_font = parseInt(max_font);

                                    // @todo check line height
                                    line_height = responsive_font_settings['base-line-height'];

                                } else {

                                    if (responsive_font_settings['font-size-unit'] !== 'px' && responsive_font_settings['font-size-unit'] !== undefined) {
                                        return;
                                    }

                                    if (responsive_font_settings) {

                                        // overwrite CSS value
                                        max_font = responsive_font_settings['base-font-size'] !== 'auto' ? responsive_font_settings['base-font-size'] : global_responsive_font_settings['base-font-size'];
                                        max_font = parseInt(max_font);

                                        $el.data('maxfont', max_font);

                                        // see site logo
                                        if( min_font === 'maxFont' ) {

                                            min_font = max_font;

                                        }

                                        for (let key in responsive_font_settings) {

                                            if (key === 'font-size') {

                                                for (let breakpoint in responsive_font_settings[key]) {

                                                    if (window.matchMedia(global_responsive_breakpoints[breakpoint].query).matches) {

                                                        current_viewport = breakpoint;
                                                        custom_font_size_found = responsive_font_settings[key][breakpoint];

                                                        break;

                                                    }

                                                }

                                            }

                                            if (key === 'line-height') {

                                                for (let breakpoint in responsive_font_settings[key]) {

                                                    if (window.matchMedia(global_responsive_breakpoints[breakpoint].query).matches) {

                                                        current_viewport = breakpoint;
                                                        custom_line_height_found = responsive_font_settings[key][breakpoint];

                                                        break;

                                                    }

                                                }

                                            }

                                        }

                                        if( $el.hasClass('ut-calculate-line-height') ) {

                                            if( custom_line_height_found ) {

                                                if( responsive_font_settings['line-height-unit'] === 'px' ) {

                                                    set_lineheight_percent(el, custom_font_size_found, custom_line_height_found, responsive_font_settings );
                                                    return;

                                                }

                                            }

                                        }

                                        if( custom_font_size_found && custom_font_size_found !== 'inherit') {

                                            /* let clump = clamp_value_builder(custom_font_size_found, responsive_font_settings);

                                            if (clump) {

                                                el.style.setProperty('font-size', clump , 'important');
                                                el.classList.add('ut-clump');

                                                if (responsive_font_settings['line-height-unit'] === 'px') {

                                                    set_lineheight_percent(el, custom_font_size_found, custom_line_height_found);

                                                }

                                                return;

                                            } */

                                            // el.style.setProperty('font-size', custom_font_size_found, 'important');

                                            if( custom_line_height_found ) {

                                                if( responsive_font_settings['line-height-unit'] === 'px' ) {

                                                    set_lineheight_percent(el, custom_font_size_found, custom_line_height_found, responsive_font_settings );

                                                }

                                            }

                                            if (custom_font_size_found && current_viewport !== 'desktop_large') {

                                                return;

                                            }

                                        }

                                    }

                                }

                            }

                            // old JS Calculation after this point
							let ratio_multi = settings.ratioMulti;

                            if( window.matchMedia('(min-width: 1200px)').matches ) {

                                ratio_multi = 1;

                            } else if( window.matchMedia('(min-width: 960px)').matches ) {

                                ratio_multi = 2.25;

                            } else if( window.matchMedia('(min-width: 640px)').matches ) {

                                ratio_multi = 2.35;

                            }

							// dynamic responsive factor
                            let factor = 1;

                            if( settings.type === 'hero' ) {

                                if( window.matchMedia('(max-width: 1440px)').matches ) {

                                    factor = 0.75;

                                } else if( window.matchMedia('(max-width: 1680px)').matches ) {

                                    factor = 0.80;

                                } else if( window.matchMedia('(max-width: 1920px)').matches ) {

                                    factor = 0.9;

                                }

                            }


                            let _font_ratio = settings.fontRatio;
                            let font_size_fill = 0;

                            if( settings.type === 'title' || settings.type === 'custom' ) {

                                if( $el.data('maxfont') >= 75 ) {

                                    if( window.matchMedia('(max-width: 1200px)').matches ) {

                                        _font_ratio = 15;

                                        if( settings.type === 'custom' ) {

                                            // will add 10% of the font size calculated to keep visual dominance of large titles
                                            font_size_fill = parseInt( $el.data('maxfont') ) / 10;

                                        }

                                    } else if( window.matchMedia('(max-width: 1440px)').matches ) {

                                        _font_ratio = 12;

                                    } else if( window.matchMedia('(max-width: 1679px)').matches ) {

                                        _font_ratio = 10;

                                    }

                                } else {

                                    if( window.matchMedia('(max-width: 1200px)').matches ) {

                                        _font_ratio = 12;

                                    } else if( window.matchMedia('(max-width: 1679px)').matches ) {

                                        _font_ratio = 8;

                                    }

                                }

                            }


                            if( settings.type === 'custom' ) {

                                if( $el.is('h1') ) {

                                    min_font = parseInt('<?php echo ut_get_global_font_size('h1'); ?>');

                                } else if( $el.is('h2') ) {

                                    min_font = parseInt('<?php echo ut_get_global_font_size('h2'); ?>');

                                } else if( $el.is('h3') ) {

                                    min_font = parseInt('<?php echo ut_get_global_font_size('h3'); ?>');

                                } else if( $el.is('h4') ) {

                                    min_font = parseInt('<?php echo ut_get_global_font_size('h4'); ?>');

                                } else if( $el.is('h5') ) {

                                    min_font = parseInt('<?php echo ut_get_global_font_size('h5'); ?>');

                                } else if( $el.is('h6') ) {

                                    min_font = parseInt('<?php echo ut_get_global_font_size('h5'); ?>');

                                } else {

                                    min_font = parseInt('<?php echo ut_get_global_font_size('p'); ?>');

                                }

                            }

                            if( settings.minFontMobile && window.matchMedia('(max-width: 767px)').matches ) {

                                min_font = settings.minFontMobile;

                            }

                            let text			= $el.find('.ut-word-rotator').length ? $el.find('.ut-word-rotator').text() : $el.text(),
                                elw     		= $el.parent().width(),
                                width    		= elw > settings.maximum ? settings.maximum : elw < settings.minimum ? settings.minimum : elw,
								font_ratio		= settings.dynamicFontRatio ? ( findLongestWord( text.replace(/<(?:.|\n)*?>/gm, '').replace(/(\r\n\t|\n|\r\t)/gm," ").trim() ) * ratio_multi ) : _font_ratio,
                                fontBase 		= width / font_ratio,
                                fontSize 		= fontBase > max_font ? max_font : fontBase < min_font ? min_font : fontBase;

                            if( settings.dynamicFontRatio ) {

                                if( window.matchMedia('(min-width: 1200px)').matches ) {

                                    fontSize = max_font * factor;

                                }

                            }

                            fontSize = parseInt( fontSize ) + font_size_fill;

                            // check if element fits
                            if( settings.check_size ) {

                                fontSize = check_size( $el, settings.check_size, fontSize, max_font );

                            } else {

                                $el.addClass('ut-flowtyped');
                                el.style.setProperty('font-size', fontSize + 'px', 'important');

                            }

                            if ( custom_line_height_found && custom_font_size_found === 'inherit' ){

                                set_lineheight( el, custom_line_height_found, fontSize, responsive_font_settings );

                            } else {

                                if( settings.lineHeight && !custom_line_height_found ) {

                                    let ratio = settings.lineHeight / settings.maxFont;

                                    if( $el.hasClass("element-with-custom-line-height") || $el.parent().hasClass("element-with-custom-line-height") ) {

                                        el.style.setProperty('line-height', (fontSize * ratio) + 'px', 'important');

                                    } else {

                                        if( !isEmpty( line_height ) && line_height < fontSize ) {

                                            el.style.setProperty('line-height', fontSize + 'px', 'important');

                                        }

                                    }

                                }

                            }

                            if( settings.loaded && typeof(settings.loaded) === "function" ) {

                                settings.loaded();

                            }

                        };

                        return this.each(function() {

                            let that = this;

                            // do not exchange with regular window resize
                            $(window).utresize(function(){

                                changes(that);

                            });

                            $(window).on('ut.flowtype.init', function(){

                                changes(that);

                            })

                            if ( $(that).closest( '.vc_row[data-vc-full-width]' ).length && $( window ).width() >= 1440 ) {

                                /* wait for f***king vc */
                                new ResizeSensor( $(that).closest( '.vc_row[data-vc-full-width]' ), function () {

                                    changes(that);

                                } );

                            } else if ( $(that).closest( '.vc_section[data-vc-full-width]' ).length && $( window ).width() >= 1440 ) {

                                /* wait for f***king vc */
                                new ResizeSensor( $(that).closest( '.vc_section[data-vc-full-width]' ), function () {

                                    changes(that);

                                } );

                            } else {

                                changes(that);

                            }

                        });

                    };

                    if( $('.site-logo h1 a', '#header-section').length ) {

                        $('.site-logo h1 a', '#header-section').each( function(){

                            let $this = $(this);

                            // flag to avoid double initialization
                            if( $this.data('recognized-flow-type') ) {
                                return;
                            }

                            $this.data('recognized-flow-type', true);

                            $this.flowtype({
                                ratioMulti: 1.2,
                                maxFont: parseInt( $this.data("font-size") ),
                                minFont: 'maxFont',
                                minFontMobile: 12,
                                check_size: $('.site-logo-wrap', '#header-section')
                            });

                        });

                    }

                    $('.hero-description', '#ut-hero').each(function(){

                        let $this = $(this);

                        // flag to avoid double initialization
                        if( $this.data('recognized-flow-type') ) {
                            return;
                        }

                        $this.data('recognized-flow-type', true);

                        let hero_dt_original_font_size = $this.css("font-size");

                        if( hero_dt_original_font_size ) {

                            $this.data("maxfont", parseInt( hero_dt_original_font_size.replace('px','') ) );

                            $this.flowtype({
                                maxFont: $this.data("maxfont"),
                                fontRatio : 24,
                                minFont: 10
                            });

                        }

                    });

                    $(".hero-title", "#ut-hero").each(function(){

                        let $this = $(this);

                        // flag to avoid double initialization
                        if( $this.data('recognized-flow-type') ) {
                            return;
                        }

                        $this.data('recognized-flow-type', true);

                        let hero_title_original_font_size = $this.css("font-size"),
                            hero_title_original_line_height = $this.css("line-height");

                        if( hero_title_original_font_size ) {

                            $this.data("maxfont", parseInt( hero_title_original_font_size.replace('px','') ) );
                            $this.data("lineheight", parseInt( hero_title_original_line_height.replace('px','') ) );

                            $this.flowtype({
                                maxFont: $this.data("maxfont"),
                                lineHeight : $this.data("lineheight"),
                                dynamicFontRatio : true,
                                minFont: 35,
                            });

                        }

                    });

                    $('.hero-description-bottom', '#ut-hero').each(function(){

                        let $this = $(this);

                        // flag to avoid double initialization
                        if( $this.data('recognized-flow-type') ) {
                            return;
                        }

                        $this.data('recognized-flow-type', true);

                        let hero_db_original_font_size = $this.css("font-size");

                        if( hero_db_original_font_size ) {

                            $this.data("maxfont", parseInt( hero_db_original_font_size.replace('px','') ) );

                            $this.flowtype({
                                maxFont: $this.data("maxfont"),
                                fontRatio : 24,
                                minFont: 12
                            });

                        }

                    });

                    function dynamic_flow_type_elements() {

                        $(".page-title, .parallax-title, .section-title").each( function(){

                            let $this = $(this);

                            // flag to avoid double initialization
                            if( $this.data('recognized-flow-type') ) {
                                return;
                            }

                            $this.data('recognized-flow-type', true);

                            let title_original_font_size   = $this.css("font-size"),
                                title_original_line_height = $this.css("line-height");

                            if( title_original_font_size ) {

                                $this.data("maxfont", parseInt( title_original_font_size.replace('px','') ) );
                                $this.data("lineheight", parseInt( title_original_line_height.replace('px','') ) );

                                // deprecated
                                let font_ratio = $this.data("maxfont") <= 75 ? 8 : 4;

                                $this.flowtype({
                                    maxFont: $this.data("maxfont"),
                                    lineHeight : $this.data("lineheight"),
                                    fontRatio : font_ratio,
                                    minFont: 30,
                                    type: 'title',
                                    loaded: function() {

                                    }
                                });

                            }

                        });

                        $(".ut-custom-heading-module").each( function(){

                            let $this = $(this);

                            // flag to avoid double initialization
                            if( $this.data('recognized-flow-type') ) {
                                return;
                            }

                            $this.data('recognized-flow-type', true);

                            let title_original_font_size   = $this.css("font-size"),
                                title_original_line_height = $this.css("line-height");

                            if( title_original_font_size ) {

                                $this.data("maxfont", parseInt( title_original_font_size.replace('px','') ) );
                                $this.data("lineheight", parseInt( title_original_line_height.replace('px','') ) );

                                // deprecated
                                let font_ratio = $this.data("maxfont") <= 75 ? 8 : 4;

                                $this.flowtype({
                                    maxFont: $this.data("maxfont"),
                                    lineHeight : $this.data("lineheight"),
                                    fontRatio : font_ratio,
                                    type: 'custom',
                                    loaded: function() {

                                    }
                                });

                            }

                        });

                        $(".ut-information-box-title, .ut-service-column-title").each( function(){

                            let $this = $(this);

                            // flag to avoid double initialization
                            if( $this.data('recognized-flow-type') ) {
                                return;
                            }

                            $this.data('recognized-flow-type', true);

                            let title_original_font_size   = $this.css("font-size"),
                                title_original_line_height = $this.css("line-height");

                            if( title_original_font_size ) {

                                $this.data("maxfont", parseInt( title_original_font_size.replace('px','') ) );
                                $this.data("lineheight", parseInt( title_original_line_height.replace('px','') ) );

                                $this.flowtype({
                                    maxFont: $this.data("maxfont"),
                                    lineHeight : $this.data("lineheight"),
                                    fontRatio : 4,
                                    type: 'custom',
                                    loaded: function() {

                                    }
                                });

                            }

                        });


                        $(".ut-service-column.ut-vertical p").each( function(){

                            let $this = $(this);

                            // flag to avoid double initialization
                            if( $this.data('recognized-flow-type') ) {
                                return;
                            }

                            $this.data('recognized-flow-type', true);

                            if( $this.data('responsive-font-settings') ) {

                                $this.addClass('ut-allow-flow-type ut-calculate-line-height');

                            }

                            let title_original_font_size   = $this.css("font-size"),
                                title_original_line_height = $this.css("line-height");

                            if( title_original_font_size ) {

                                $this.data("maxfont", parseInt( title_original_font_size.replace('px','') ) );
                                $this.data("lineheight", parseInt( title_original_line_height.replace('px','') ) );

                                $this.flowtype({
                                    maxFont: $this.data("maxfont"),
                                    lineHeight : $this.data("lineheight"),
                                    type: 'custom',
                                    loaded: function() {

                                    }
                                });

                            }

                        });


                        $(".ut-word-rotator").each( function(){

                            let $this = $(this);

                            if( $this.closest('.hero-title').length ) {
                                return;
                            }

                            if( $this.data('recognized-flow-type') ) {
                                return;
                            }

                            $this.data('recognized-flow-type', true);

                            let title_original_font_size   = $this.css("font-size"),
                                title_original_line_height = $this.css("line-height");

                            if( title_original_font_size ) {

                                $this.data("maxfont", parseInt( title_original_font_size.replace('px','') ) );
                                $this.data("lineheight", parseInt( title_original_line_height.replace('px','') ) );

                                // deprecated
                                let font_ratio = $this.data("maxfont") <= 75 ? 8 : 4;

                                $this.flowtype({
                                    maxFont: $this.data("maxfont"),
                                    lineHeight : $this.data("lineheight"),
                                    fontRatio : font_ratio,
                                    type: 'custom',
                                    loaded: function() {

                                    }
                                });

                            }

                        });

                        $(".ut-parallax-quote-title").each( function(){

                            let $this = $(this);

                            if( $this.data('recognized-flow-type') ) {
                                return;
                            }

                            $this.data('recognized-flow-type', true);

                            let title_original_font_size   = $this.css("font-size"),
                                title_original_line_height = $this.css("line-height");

                            if( title_original_font_size ) {

                                $this.data("maxfont", parseInt( title_original_font_size.replace('px','') ) );
                                $this.data("lineheight", parseInt( title_original_line_height.replace('px','') ) );

                                // deprecated
                                let font_ratio = $this.data("maxfont") <= 75 ? 8 : 4;

                                $this.flowtype({
                                    maxFont: $this.data("maxfont"),
                                    lineHeight : $this.data("lineheight"),
                                    fontRatio : font_ratio,
                                    minFont: 30,
                                    type: 'title'
                                });

                            }

                        });

                    }

                    dynamic_flow_type_elements();

                    $(document).ajaxComplete(function() {

                        dynamic_flow_type_elements();

                    });

                    $(".single-post .entry-title, .single-post-entry-sub-title, .ut-blog-classic-article .entry-title, .ut-blog-mixed-large-article .entry-title").each( function(){

                        let $this = $(this);

                        if( $this.data('recognized-flow-type') ) {
                            return;
                        }

                        $this.data('recognized-flow-type', true);

                        let title_original_font_size   = $this.css("font-size"),
							title_original_line_height = $this.css("line-height");

                        if( title_original_font_size ) {

                            $this.data("maxfont", title_original_font_size.replace('px','') );
							$this.data("lineheight", title_original_line_height );

                            let font_ratio = $this.data("maxfont") <= 75 ? 8 : 4;

                            $this.flowtype({
                                maxFont: $this.data("maxfont"),
                                lineHeight : $this.data("lineheight"),
                                fontRatio : font_ratio,
                                minFont: 30,
                                type: 'title'
                            });

                        }

                    });

                    $("#ut-overlay-nav ul > li").each( function(){

                        let $this = $(this);

                        if( $this.data('recognized-flow-type') ) {
                            return;
                        }

                        $this.data('recognized-flow-type', true);

                        let overlay_font_size = $this.css("font-size");

                        if( overlay_font_size ) {

                            $this.data("maxfont", parseInt( overlay_font_size.replace('px','') ) );

                            $this.flowtype({
                                maxFont: $this.data("maxfont"),
                                fontRatio : 8,
                                minFont: 25
                            });

                        }

                    });

					function add_visual_composer_helper_classes() {

						$('.vc_col-has-fill').each(function() {

							$(this).parent(".vc_row").addClass("ut-row-has-filled-cols");

						});

						$('.vc_section > .vc_row, .vc_section > .vc_vc_row').each(function() {

							var $this = $(this);

							if( $this.parent().children('.vc_row, .vc_vc_row').first().is(this) ) {

								if( $this.hasClass("vc_row-has-fill") ) {

									$this.parent().addClass("ut-first-row-has-fill");

								}

								$this.addClass('ut-first-row');

							}

							if( $this.parent().children('.vc_row, .vc_vc_row').last().is(this) ) {

								if( $this.hasClass("vc_row-has-fill") ) {

									$this.parent().addClass("ut-last-row-has-fill");

								}

								$this.addClass('ut-last-row');

							}

						});

                        const $contact_content_block = $('#ut-custom-contact-section');

                        $('.vc_section').each(function() {

                            var $this = $(this);

                            if( $this.closest('#ut-custom-hero').length ) {
                                return;
                            }

                            if( $this.is(':first-of-type') && $this.is(':visible') ) {

                                // only apply if not in contact section
                                if( !$this.closest('#ut-custom-contact-section').length ) {

                                    $this.addClass('ut-first-section');

                                }

                                // only apply if in contact section
                                if( $this.closest('#ut-custom-contact-section').length ) {

                                    $this.addClass('ut-first-in-contact-section');

                                }

                            }

                            if( $this.is(':first-of-type') && $this.is(':visible') && $this.next('.vc_row-full-width').next('.vc_section').is(':last-of-type') && !$this.next('.vc_row-full-width').next('.vc_section').is(':visible') ) {

                                if( !$contact_content_block.length ) {

                                    $this.addClass('ut-last-section');

                                    if( !$this.hasClass('vc_section-has-fill') ) {

                                        $("#ut-sitebody").addClass('ut-last-section-has-no-fill');

                                    }

                                }

                                if( $contact_content_block.length && $this.closest('#ut-custom-contact-section').length ) {

                                    $this.addClass('ut-last-section');

                                }

                            }

                            // last section only available if no content block
                            if( $this.is(':last-of-type') && $this.is(':visible') ) {

                                if( !$contact_content_block.length ) {

                                    $this.addClass('ut-last-section');

                                }

                                // last section in content ( extra class for sidebar spacing)
                                if( !$this.hasClass('vc_section-has-fill') ) {

                                    $("#ut-sitebody").addClass('ut-last-section-has-no-fill');

                                }

                                // last section has fill - add extra class to contact section
                                if( $contact_content_block.length && !$this.hasClass('vc_section-has-fill') && !$this.closest('#ut-custom-contact-section').length ) {

                                    $contact_content_block.addClass('ut-last-content-section-as-no-fill');

                                }

                            }

                            // last section if is inside content block
                            if( $this.is(':last-of-type') && $this.is(':visible') && $this.closest('#ut-custom-contact-section').length ) {

                                $this.addClass('ut-last-section');

                            }

                            if( $this.is(':last-of-type') && $this.is(':visible') && $this.prev('.vc_row-full-width').prev('.vc_section').is(':first-of-type') && !$this.prev('.vc_row-full-width').prev('.vc_section').is(':visible') ) {

                                if( !$this.closest('#ut-custom-contact-section').length ) {

                                    $this.addClass('ut-first-section');

                                }

                            }

                            if( $this.hasClass('vc_section-has-no-fill') && !$this.hasClass('ut-last-row-has-fill') && $this.next('.vc_row-full-width').next('.vc_section').hasClass('vc_section-has-no-fill') && !$this.next('.vc_row-full-width').next('.vc_section').hasClass('ut-first-row-has-fill') ) {

                                $this.addClass("vc_section-remove-padding-bottom");

                            }

                        });

                        $('.ut-information-box-image-wrap').each(function() {

                            var $this = $(this);

                            $this.closest('.wpb_wrapper').addClass('ut-contains-information-box');

                            if( $this.parent().siblings().not('.ut-information-box').length ) {

                                $this.closest('.wpb_wrapper').addClass('ut-contains-information-box-mixed');

                            }

                            if( !$this.parent().siblings().length ) {

                                $this.parent().addClass('ut-information-box-no-siblings');

                            }

                        });

                        $('.section-header').each(function() {

                            if( $(this).closest(".wpb_column").is( ":first-child" ) ) {

                                $(this).closest(".wpb_column").addClass("ut-first-wpb-column");

                            }

                            if( $(this).closest(".wpb_content_element").is( ":first-child" ) ) {

                                $(this).addClass("ut-first-section-title");

                            }

                        });

                        $('.page-title-module').each(function() {

                            if( $(this).closest(".wpb_column").is( ":first-child" ) ) {

                                $(this).closest(".wpb_column").addClass("ut-first-wpb-column");

                            }

                            if( $(this).closest(".wpb_content_element").is( ":first-child" ) ) {

                                $(this).addClass("ut-first-page-title");

                            }

                        });


					}

					// run on site load
					add_visual_composer_helper_classes();

					// update on resize
					$(window).utresize(function(){
						add_visual_composer_helper_classes();
					});

					$(document).ajaxComplete(function() {
						add_visual_composer_helper_classes();
					});

					$('.ut-plan-module-popular').each(function() {

						var $this = $(this);

						$this.closest(".wpb_column").addClass("ut-column-with-popular-pricing-table");

					});

                    <?php

                     /**
                      * Scroll Fade Effect for Hero Area
                      */

                    if( ut_return_hero_config('ut_hero_image_parallax') == 'on' ) : ?>

                        <?php if( !unite_mobile_detection()->isMobile() ) : ?>

                            var hero_inner = $(".hero-inner", '#ut-hero');
                            var scroll_down = $(".hero-down-arrow", '#ut-hero');

                            $(window).on("scroll", function() {

                                var st = $(this).scrollTop();

                                hero_inner.css({
                                    "opacity" : 1 - st/($(window).height()/4*3)
                                });

                                scroll_down.css({
                                    "opacity" : 1 - st/($(window).height()/4*3)
                                });

                            });

                        <?php endif; ?>

                    <?php endif; ?>

                    <?php

                    /**
                     * Scroll Zoom Effect for Hero Area
                     */

                    if( ut_collect_option( 'ut_hero_image_scroll_zoom', 'off' ) == 'on' ) : ?>

                        <?php if( !unite_mobile_detection()->isMobile() ) : ?>

                        var hero_image = $(".parallax-image-container", '#ut-hero' );

                        $(window).on("scroll", function() {

                            var st = $(this).scrollTop();

                            hero_image.css({
                                "transform" : 'scale(' + ( 1 + ( st/( $(window).height() / 4*3 ) ) / 5 ) + ')'
                            });

                        });

                        <?php endif; ?>

                    <?php endif; ?>

                    <?php

                    /**
                      * Rain Effect for Hero
                      */

                    if( apply_filters( 'ut_show_hero', false ) && ut_return_hero_config( 'ut_hero_rain_effect' , 'off' ) == 'on' && ( $ut_hero_type == 'image' || $ut_hero_type == 'tabs' || $ut_hero_type == 'splithero' )) : ?>

                        $.fn.utFullSize = function( callback ) {

                            var fullsize = $(this);

                            function utResizeObject() {

                                var imgwidth = fullsize.width(),
                                    imgheight = fullsize.height();

                                if( window.matchMedia('(max-width: 1024px)').matches ) {

                                    imgwidth = fullsize.prop('naturalWidth');
                                    imgheight = fullsize.prop('naturalHeight');

                                }

                                var winwidth = $(window).width(),
                                    winheight = $(window).height(),
                                    widthratio = winwidth / imgwidth,
                                    heightratio = winheight / imgheight,
                                    widthdiff = heightratio * imgwidth,
                                    heightdiff = widthratio * imgheight;

                                if( heightdiff > winheight ) {

                                    fullsize.css({
                                        width: winwidth+"px",
                                        height: heightdiff+"px"
                                    });

                                } else {

                                    fullsize.css({
                                        width: widthdiff+"px",
                                        height: winheight+"px"
                                    });

                                }

                            }

                            utResizeObject();

                            $(window).utresize(function(){
                                utResizeObject();
                            });

                            if (callback && typeof(callback) === "function") {
                                callback();
                            }

                        };


                        function ut_init_RainyDay( callback ) {

                            var $image = document.getElementById("ut-rain-background"),
                                $hero  = document.getElementById("ut-hero");

                                var engine = new RainyDay({
                                    image: $image,
                                    parentElement : $hero,
                                    blur: 20,
                                    opacity: 1,
                                    fps: 30
                                });

                                engine.gravity = engine.GRAVITY_NON_LINEAR;
                                engine.trail = engine.TRAIL_SMUDGE;
                                engine.rain([ [6, 6, 0.1], [2, 2, 0.1] ], 50 );

                            $image.crossOrigin = "anonymous";

                            if (callback && typeof(callback) === "function") {
                                callback();
                            }

                        }


                        $(window).on("load", function () {

                            $("#ut-rain-background").utFullSize( function() {

                                // play rainday sound and remove section image and adjust canvas
                                ut_init_RainyDay( function() {

                                    $("#ut-hero").css("background-image" , "none");
                                    $("#ut-hero canvas").utFullSize();

                                });

                            });

                        });

                        <?php

                        /**
                          * Option Rain Sound
                          */

                        if( ut_return_hero_config('ut_hero_rain_sound' , 'off') == 'on' ) :	?>



                            PIXI.sound.Sound.from({
                                url: $('#ut-hero-rain-audio').data('mp3'),
                                loop: true,
                                preload: true,
                                volume: 0.05,
                                loaded: function(err, sound) {
                                    sound.play();
                                }
                            });

                            $(document).ready(function(){

                                $(document).on("click", "#ut-hero-rain-audio" , function(event) {

                                    if( $(this).hasClass("ut-unmute") ) {

                                        $(this).removeClass("ut-unmute").addClass("ut-mute");

                                    } else {


                                        $(this).removeClass("ut-mute").addClass("ut-unmute");

                                    }

                                    PIXI.sound.togglePauseAll();
                                    event.preventDefault();

                                });


                            });

                        <?php endif; ?>

                    <?php endif; ?>

                    <?php

                     /**
                      * Youtube Video Player
                      */

                    if( !unite_mobile_detection()->isMobile() && $ut_hero_type == 'video' && ut_return_hero_config('ut_video_source' , 'youtube') == 'youtube' || unite_mobile_detection()->isMobile() && $ut_hero_type == 'video' && ut_return_hero_config('ut_video_source' , 'youtube') == 'youtube' && ut_return_hero_config('ut_video_mobile' , 'off') == 'on' || !unite_mobile_detection()->isMobile() && $ut_hero_type == 'tabs' && ut_return_hero_config('ut_video_containment', 'hero') == 'body' ) : ?>

                        $("#ut-background-video-hero").ut_require_js({
                            plugin: 'YTPlayer',
                            source: 'ytplayer',
                            callback: function (element) {

                                var $hero_player = element.YTPlayer();

                                $hero_player.on("YTPReady",function(){

                                    $hero_player.siblings('.parallax-scroll-container').hide().trigger('animationend');

                                });

                                $hero_player.on("YTPEnd",function(){

                                    $hero_player.siblings('.parallax-scroll-container').show();

                                });

                                $("#ut-video-hero-control.youtube").click(function(event){

                                    if( $(this).hasClass("ut-unmute") ) {

                                        $(this).removeClass("ut-unmute").addClass("ut-mute");
                                        $hero_player.YTPUnmute();

                                    } else {

                                        $(this).removeClass("ut-mute").addClass("ut-unmute");
                                        $hero_player.YTPMute();

                                    }

                                    event.preventDefault();

                                });

                            }

                        });

                    <?php endif; ?>



                    <?php

                    /**
                      * Retina JS Logo
                      */

                    $sitelogo_retina = !is_front_page() && !is_home() && ( !apply_filters( 'ut_show_hero', false ) ) ? ( ut_return_logo_config( 'ut_site_logo_alt_retina' ) ? ut_return_logo_config( 'ut_site_logo_alt_retina' ) : ut_return_logo_config( 'ut_site_logo_retina' ) ) : ut_return_logo_config( 'ut_site_logo_retina' );
                    $alternate_logo_retina = ut_return_logo_config( 'ut_site_logo_alt_retina' ) ? ut_return_logo_config( 'ut_site_logo_alt_retina' ) : ut_return_logo_config( 'ut_site_logo_retina' );

                    ?>

                    var modern_media_query = window.matchMedia( "screen and (-webkit-min-device-pixel-ratio:2)");

                    <?php if( !empty( $sitelogo_retina ) ) : ?>

                        if( modern_media_query.matches ) {

                            var $logo = $(".site-logo:not(.ut-overlay-site-logo)").find("img");

                            $logo.data( "original-logo" , retina_logos.sitelogo_retina );
                            $logo.attr( "src", retina_logos.sitelogo_retina );

                        }

                    <?php endif; ?>

                    <?php if( !empty( $alternate_logo_retina ) ) : ?>

                        if( modern_media_query.matches ) {

                            var $logo = $(".site-logo:not(.ut-overlay-site-logo)").find("img");
                            $logo.data("alternate-logo" , retina_logos.alternate_logo_retina );

                        }

                    <?php endif; ?>

                    <?php if( ot_get_option("ut_overlay_logo_retina") ) : ?>

                        if( modern_media_query.matches ) {

                            var $logo = $("#ut-overlay-site-logo img");
                            $logo.attr("src", retina_logos.overlay_sitelogo_retina );

                        }

                    <?php endif; ?>

                    /* Global Objects
                    ================================================== */
                    var $brooklyn_body   = $("body");
                    var $brooklyn_header = $("#header-section");
                    var $brooklyn_main   = $("<?php echo ut_return_header_config( 'ut_navigation_skin_waypoint', 'content' ) == 'content' ? '#main-content' : '#ut-hero-early-waypoint' ; ?>");

                    /* Header Top Animations
                    ================================================== */
                    <?php if( ut_return_header_config('ut_navigation_scroll_position' , 'floating') == 'floating' ) : ?>

                        var $header = $("#header-section"),
                            $logo	= $(".site-logo:not(.ut-overlay-site-logo)").find('img'),
                            logo	= $logo.data("original-logo"),
                            logoalt = $logo.data("alternate-logo");

                        // skin state
                        var primary_skin   = $header.data('primary-skin');
                        var secondary_skin = $header.data('secondary-skin');

                        function ut_nav_skin_changer( direction, animClassDown, animClassUp, headerClassDown, headerClassUp ) {

                            animClassUp = typeof animClassUp !== 'undefined' ? animClassUp : '';
                            animClassDown = typeof animClassDown !== 'undefined' ? animClassDown : '';

                            headerClassUp = typeof headerClassUp !== 'undefined' ? headerClassUp : '';
                            headerClassDown = typeof headerClassDown !== 'undefined' ? headerClassDown : '';

                            if( direction === "down" ) {

                                if( !site_settings.mobile_nav_open ) {

                                    $logo.attr("src" , logoalt );
                                    $header.attr("class", "ha-header").addClass(headerClassDown).addClass(animClassDown).addClass('ut-hero-passed');

                                }

                                // change attributes
                                $header.data("primary-skin", secondary_skin );
                                $header.data("secondary-skin", secondary_skin );

                                site_settings.mobile_hero_passed = true;

                            } else if( direction === "up" ){

                                if( !site_settings.mobile_nav_open ) {

                                    $logo.attr("src" , logo );
                                    $header.attr("class", "ha-header").addClass(headerClassUp).addClass(animClassUp).removeClass('ut-hero-passed');

                                }

                                // change attributes
                                $header.data("primary-skin", primary_skin );
                                $header.data("secondary-skin", secondary_skin );

                                site_settings.mobile_hero_passed = false;

                            }

                        }

                        <?php

                        // default classes
                        $classes = array();

                        $classes[] = 'ut-header-floating';
                        $classes[] = ut_page_option( 'ut_top_header' , 'hide' ) == 'show' ? 'bordered-top' : '';
                        $classes[] = ut_return_header_config( 'ut_navigation_width', 'centered' ) == 'centered' ? 'centered' : 'fullwidth';

                        // Site Frame Classes
                        $classes[] = apply_filters( 'ut_show_siteframe', 'hide' ) == 'show' ? 'bordered-navigation' : '';
                        $classes[] = apply_filters( 'ut_show_siteframe', 'hide' ) == 'show' && ut_return_header_config( 'ut_site_navigation_flush', 'no' ) == 'yes' && ut_return_header_config( 'ut_navigation_width', 'centered' ) == 'fullwidth' ? 'ut-flush' : '';
                        $classes[] = apply_filters( 'ut_show_siteframe', 'hide' ) == 'show' && ut_return_header_config( 'ut_site_navigation_flush', 'no' ) == 'logo_only' && ut_return_header_config( 'ut_navigation_width', 'centered' ) == 'fullwidth' ? 'ut-flush-logo-only' : '';

                        /*
                         * Animation for Custom Headers with individual classes
                         */

                        if( apply_filters( 'ut_show_hero', false ) && ut_return_header_config( 'ut_navigation_skin' , 'ut-header-light' ) == 'ut-header-custom' ) : ?>

                            <?php if( ut_return_header_config('ut_navigation_customskin_state' , 'off') == 'off' ) : ?>

                                <?php

                                // Navigation Skin Class
                                $classes[] = 'ut-primary-custom-skin'; ?>

                                $brooklyn_main.waypoint( function( direction ) {

                                    ut_nav_skin_changer( direction ,  $brooklyn_main.data( "animateDown" ) , $brooklyn_main.data( "animateUp" ), "<?php echo implode(' ', $classes ); ?>", "<?php echo implode(' ', $classes ); ?>" );

                                }, { offset: site_settings.brooklyn_header_scroll_offset + 1 } );


                            <?php endif; ?>

                            <?php if( ut_return_header_config('ut_navigation_customskin_state' , 'off') == 'on_switch' ) : ?>

                                $brooklyn_main.waypoint( function( direction ) {

                                    ut_nav_skin_changer(direction, "ut-secondary-custom-skin", "ut-primary-custom-skin", "<?php echo implode(' ', $classes ); ?>", "<?php echo implode(' ', $classes ); ?>" );

                                }, { offset: site_settings.brooklyn_header_scroll_offset + 1 });

                            <?php endif; ?>


                        <?php endif; ?>

                        <?php if( apply_filters( 'ut_show_hero', false ) && ut_return_header_config( 'ut_navigation_skin' , 'ut-header-light' ) != 'ut-header-custom' ) : ?>

                            <?php if( ut_return_header_config('ut_navigation_state' , 'off') == 'off' ) : ?>

                                <?php

                                // Navigation Skin Class
                                $classes[] = ut_return_header_config( 'ut_navigation_skin' , 'ut-header-light' );

                                if( ut_return_header_config( 'ut_navigation_style', 'separator' ) == 'animation-line' ) {

                                    $classes[] = 'ut-navigation-style-on';

                                } ?>

                                $brooklyn_main.waypoint( function( direction ) {

                                    ut_nav_skin_changer( direction , $brooklyn_main.data( "animateDown" ) , $brooklyn_main.data( "animateUp" ), "<?php echo implode(' ', $classes ); ?>", "<?php echo implode(' ', $classes ); ?>" );

                                }, { offset: site_settings.brooklyn_header_scroll_offset + 1 } );


                            <?php endif; ?>

                            <?php if( ut_return_header_config( 'ut_navigation_state', 'off' ) == 'on_transparent' ) : ?>

                                <?php

                                // Navigation Skin Class
                                $navigation_skin = ut_return_header_config('ut_navigation_skin' , 'ut-header-light');

                                $classes[] = ut_return_header_config( 'ut_navigation_transparent_border' ) == 'on' ?  'ut-header-has-border' : '';

                                if( ut_return_header_config( 'ut_navigation_style', 'separator' ) == 'animation-line' ) {

                                    $classes[] = 'ut-navigation-style-on';

                                } ?>

                                $brooklyn_main.waypoint( function( direction ) {

                                    ut_nav_skin_changer( direction, "<?php echo $navigation_skin; ?> ut-header-floating <?php echo implode(' ', $classes ); ?>", "ha-transparent ut-header-floating <?php echo implode(' ', $classes ); ?>" );

                                }, { offset: site_settings.brooklyn_header_scroll_offset + 1 });

                            <?php endif; ?>

                        <?php endif; ?>

                    <?php endif; ?>


                    <?php

                    /**
                     * Hero Flex Slider
                     */

                    if( apply_filters( 'ut_show_hero', false ) && ( $ut_hero_type == 'slider' || is_singular("portfolio") && get_post_format() == 'gallery' ) ) :

                    $slideshowSpeed = ut_return_hero_config('ut_background_slider_slideshow_speed' , 7000);
                    $animationSpeed = ut_return_hero_config('ut_background_slider_animation_speed' , 600);

                    if( is_singular("portfolio") ) {

                        $slideshowSpeed = '7000';
                        $animationSpeed = '600';

                    } ?>

                    var $hero_captions = $("#ut-hero-captions"),
                        animatingTo = 0;

                    $hero_captions.find(".hero-holder").each(function() {

                        var pos = $(this).data("animation"),
                            add = "-50%";

                        if( pos==="left" || pos==="right" ) { add = "-25%" };

                        $(this).css( pos , add );

                    });

                    <?php if( ot_get_option('ut_use_image_loader') == 'off' ) : ?>

                    $(document.body).on('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', '#ut-hero-captions', function() {

                    <?php endif; ?>

                        $hero_captions.ut_require_js({
                            plugin: 'flexslider',
                            source: 'flexslider',
                            callback : function ( element ) {

                                $("#ut-hero-slider").flexslider({
                                    animation: "fade",
                                    animationSpeed: <?php echo $animationSpeed; ?>,
                                    slideshowSpeed: <?php echo $slideshowSpeed; ?>,
                                    directionNav: false,
                                    controlNav: false,
                                    animationLoop: true,
                                    slideshow: true
                                });

                                element.flexslider({
                                    animation: "fade",
                                    animationSpeed: <?php echo $animationSpeed; ?>,
                                    slideshowSpeed: <?php echo $slideshowSpeed; ?>,
                                    controlNav: false,
                                    directionNav: false,
                                    animationLoop: true,
                                    slideshow: true,
                                    init : function(){

                                        $(window).trigger('ut.flowtype.init');

                                    },
                                    before: function(slider){

                                        /* hide hero holder */
                                        $(".flex-active-slide").find(".hero-holder").fadeOut("fast", function() {

                                            var pos = $(this).data("animation"),
                                                anim = { opacity: 0 , display : "table" },
                                                add = "-50%";

                                            if( pos==="left" || pos==="right" ) { add = "-25%" };

                                            anim[pos] = add;

                                            $(this).css(anim);

                                        });

                                        /* animate background slider */
                                        $("#ut-hero-slider").flexslider(slider.animatingTo);

                                    },
                                    after: function(slider) {

                                        /* change position of caption slider */
                                        slider.animate( { top : ( $(window).height() - $hero_captions.find(".flex-active-slide").height() ) / 2 } , 100 , function() {

                                            /* show hero holder */
                                            var pos = $(".flex-active-slide").find(".hero-holder").data("animation"),
                                                anim = { opacity: 1 };

                                            anim[pos] = 0;

                                            $(".flex-active-slide").find(".hero-holder").animate( anim );

                                        });

                                    },
                                    start: function(slider) {

                                        /* create external navigation */
                                        $(".ut-flex-control").click(function(event){

                                            if ($(this).hasClass("next")) {

                                                slider.flexAnimate(slider.getTarget("next"), true);

                                            } else {

                                                slider.flexAnimate(slider.getTarget("prev"), true);

                                            }

                                            event.preventDefault();

                                        });

                                        /* change position of caption slider */
                                        slider.animate( { top : ( $(window).height() - $hero_captions.find(".flex-active-slide").height() ) / 2 } , 100 , function() {

                                            /* show hero holder */
                                            var pos = $(".flex-active-slide").find(".hero-holder").data("animation"),
                                                anim = { opacity: 1 };

                                            anim[pos] = 0;

                                            $(".flex-active-slide").find(".hero-holder").animate( anim );


                                        });

                                    }

                                });

                            }

                        });

                    <?php if( ot_get_option('ut_use_image_loader') == 'off' ) : ?>

                    });

                    <?php endif; ?>

                    var ut_trigger = 0;

                    $(window).utresize(function(){

                        /* do not fire on window load resize event */
                        if( ut_trigger > 0 ) {

                            /* adjust first slide browser bug */
                            $hero_captions.find(".hero-holder").each(function() {

                                $(this).find(".hero-title").width("");

                                if( $(this).width() > $(this).parent().width() ) {

                                    $(this).find(".hero-title").width( $(this).parent().width()-20 );

                                }

                            });

                            /* change slide */
                            $hero_captions.flexslider("next");
                            $hero_captions.flexslider("play");

                        }

                        ut_trigger++;

                    });


                    <?php endif; ?>

                    <?php

                    /**
                     * One Page Mode ( Deprecated Section Animation )
                     */

                    if( !unite_mobile_detection()->isMobile() && ot_get_option('ut_animate_sections' , 'on') == 'on' && ot_get_option( 'ut_site_layout', 'multisite' ) == 'onepage' ) :

                        $csection_timer = ot_get_option('ut_animate_sections_timer' , '1600'); ?>

                        $("section").each(function() {

                            var outerHeight = $(this).outerHeight(),
                                offset		= "90%",
                                effect		= $(this).data("effect");

                            if( outerHeight > $(window).height() / 2 ) {
                                offset = "70%";
                            }

                            $(this).waypoint("destroy");
                            $(this).waypoint( function( direction ) {

                                var $this = $(this);

                                if( direction === "down" && !$(this).hasClass( "animated-" + effect ) ) {

                                    $this.find(".section-content").animate( { opacity: 1 } , <?php echo esc_attr( $csection_timer ); ?> );
                                    $this.find(".section-header-holder").animate( { opacity: 1 } , <?php echo esc_attr( $csection_timer ); ?> );

                                    $this.addClass( "animated-" + effect );

                                }

                            } , { offset: offset } );

                        });

                    <?php endif; ?>

                    <?php if( ot_get_option( 'ut_site_layout', 'multisite' ) == 'onepage' ) : ?>

                        /* Split Screen Calculation
                        ================================================== */
                        $(window).on("load", function () {

                            $(".ut-split-screen-poster").each(function() {

                                var parent_ID = $(this).data("posterparent"),
                                    newHeight = $("#"+parent_ID).height();

                                $(this).height(newHeight);

                            });

                        });

                    <?php endif; ?>

                })(jQuery);

                </script>

            <?php

            echo $this->minify_js( ob_get_clean() );

        }

    }

}

$UT_Custom_JS = new UT_Custom_JS;