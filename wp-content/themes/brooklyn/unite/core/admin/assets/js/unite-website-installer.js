/* <![CDATA[ */
/*! lozad.js - v1.14.0 - 2019-10-19
* https://github.com/ApoorvSaxena/lozad.js
* Copyright (c) 2019 Apoorv Saxena; Licensed MIT */


(function (global, factory) {
    typeof exports === 'object' && typeof module !== 'undefined' ? module.exports = factory() :
        typeof define === 'function' && define.amd ? define(factory) :
            (global = global || self, global.lozad = factory());
}(this, function () { 'use strict';

    /**
     * Detect IE browser
     * @const {boolean}
     * @private
     */
    var isIE = typeof document !== 'undefined' && document.documentMode;

    var defaultConfig = {
        rootMargin: '0px',
        threshold: 0,
        load: function load(element) {
            if (element.nodeName.toLowerCase() === 'picture') {
                var img = document.createElement('img');
                if (isIE && element.getAttribute('data-iesrc')) {
                    img.src = element.getAttribute('data-iesrc');
                }

                if (element.getAttribute('data-alt')) {
                    img.alt = element.getAttribute('data-alt');
                }

                element.append(img);
            }

            if (element.nodeName.toLowerCase() === 'video' && !element.getAttribute('data-src')) {
                if (element.children) {
                    var childs = element.children;
                    var childSrc = void 0;
                    for (var i = 0; i <= childs.length - 1; i++) {
                        childSrc = childs[i].getAttribute('data-src');
                        if (childSrc) {
                            childs[i].src = childSrc;
                        }
                    }

                    element.load();
                }
            }

            if (element.getAttribute('data-src')) {
                element.src = element.getAttribute('data-src');
            }

            if (element.getAttribute('data-srcset')) {
                element.setAttribute('srcset', element.getAttribute('data-srcset'));
            }

            if (element.getAttribute('data-background-image')) {
                element.style.backgroundImage = 'url(\'' + element.getAttribute('data-background-image').split(',').join('\'),url(\'') + '\')';
            } else if (element.getAttribute('data-background-image-set')) {
                var imageSetLinks = element.getAttribute('data-background-image-set').split(',');
                var firstUrlLink = imageSetLinks[0].substr(0, imageSetLinks[0].indexOf(' ')) || imageSetLinks[0]; // Substring before ... 1x
                firstUrlLink = firstUrlLink.indexOf('url(') === -1 ? 'url(' + firstUrlLink + ')' : firstUrlLink;
                if (imageSetLinks.length === 1) {
                    element.style.backgroundImage = firstUrlLink;
                } else {
                    element.setAttribute('style', (element.getAttribute('style') || '') + ('background-image: ' + firstUrlLink + '; background-image: -webkit-image-set(' + imageSetLinks + '); background-image: image-set(' + imageSetLinks + ')'));
                }
            }

            if (element.getAttribute('data-toggle-class')) {
                element.classList.toggle(element.getAttribute('data-toggle-class'));
            }
        },
        loaded: function loaded() {}
    };

    function markAsLoaded(element) {
        element.setAttribute('data-loaded', true);
    }

    var isLoaded = function isLoaded(element) {
        return element.getAttribute('data-loaded') === 'true';
    };

    var onIntersection = function onIntersection(load, loaded) {
        return function (entries, observer) {
            entries.forEach(function (entry) {
                if (entry.intersectionRatio > 0 || entry.isIntersecting) {
                    observer.unobserve(entry.target);

                    if (!isLoaded(entry.target)) {
                        load(entry.target);
                        markAsLoaded(entry.target);
                        loaded(entry.target);
                    }
                }
            });
        };
    };

    var getElements = function getElements(selector) {
        var root = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : document;

        if (selector instanceof Element) {
            return [selector];
        }

        if (selector instanceof NodeList) {
            return selector;
        }

        return root.querySelectorAll(selector);
    };

    function lozad () {
        var selector = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : '.lozad';
        var options = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {};

        var _Object$assign = Object.assign({}, defaultConfig, options),
            root = _Object$assign.root,
            rootMargin = _Object$assign.rootMargin,
            threshold = _Object$assign.threshold,
            load = _Object$assign.load,
            loaded = _Object$assign.loaded;

        var observer = void 0;

        if (typeof window !== 'undefined' && window.IntersectionObserver) {
            observer = new IntersectionObserver(onIntersection(load, loaded), {
                root: root,
                rootMargin: rootMargin,
                threshold: threshold
            });
        }

        return {
            observe: function observe() {
                var elements = getElements(selector, root);

                for (var i = 0; i < elements.length; i++) {
                    if (isLoaded(elements[i])) {
                        continue;
                    }

                    if (observer) {
                        observer.observe(elements[i]);
                        continue;
                    }

                    load(elements[i]);
                    markAsLoaded(elements[i]);
                    loaded(elements[i]);
                }
            },
            triggerLoad: function triggerLoad(element) {
                if (isLoaded(element)) {
                    return;
                }

                load(element);
                markAsLoaded(element);
                loaded(element);
            },

            observer: observer
        };
    }

    return lozad;

}));


(function($){
	
	"use strict";
		
    $(document).ready(function(){

        var ut_image_observer = lozad('.lozad', {

            loaded: function(el) {

                $(el).parent().addClass('ut-preview-image-loaded');

            }

        });

        // run observer
        ut_image_observer.observe();

		var confirmed = true;
		var current_xml = "";
		
		$(".ut-choose-demo").on("click", function() {
			
			var $this = $(this);
			
			current_xml = $(this).data("xml");
			
			if( !$this.hasClass('ut-demo-importer-summary-loaded') ) {
			
				$.ajax({

					type: 'POST',
					url: ajaxurl,
					data: { 
						"action" : "ut_load_xml",
						"import_xml_start" : $(this).data("xml")
					},
					success: function( response ) {

						if( typeof response.data === 'undefined' ) {
							
							confirmed = false;

							if( response.error !== 'undefined' ) {

                                modal({
                                    type: 'error',
                                    title: 'Could not load Demo Website!',
                                    size: 'large',
                                    closable: true,
                                    text: response.error,
                                    buttons: [
                                        {

                                            text: 'Contact Support',
                                            val: 'ok',
                                            eKey: true,
                                            addClass: 'ut-ui-button-blue',
                                            onClick: function(dialog) {
                                                window.location = 'http://helpdesk.unitedthemes.com/';
                                                return true;
                                            }

                                        },
                                        {

                                            text: 'Got it!',
                                            val: 'ok',
                                            eKey: true,
                                            addClass: 'ut-ui-button-health',
                                            onClick: function(dialog) {

                                                return true;

                                            }

                                        }

                                    ]
                                });


                            }

							
							/* modal({
								type: 'error',
								title: 'Could not load XML!',
								size: 'large',
								closable: false,
								text: 'Please make sure to install PHP XML. For further Info please contact Theme Support.',
								buttons: [
									{

										text: 'Contact Support', 
										val: 'ok',
										eKey: true,
										addClass: 'ut-ui-button-health',
										onClick: function(dialog) {
											window.location = 'http://helpdesk.unitedthemes.com/'; 
											return true;
										}

									}                   

								]
							}); */
						   
						} else {
						
							// exchange pages
							$("#ut-demo-importer-summary-pages-"+current_xml).siblings(".ut-demo-summmary-loader").fadeOut( 800, function(){

								$("#ut-demo-importer-summary-pages-"+current_xml).text(response.data.post_count).fadeIn();

							});

							// exchange media
							$("#ut-demo-importer-summary-media-"+current_xml).siblings(".ut-demo-summmary-loader").delay(200).fadeOut( 800, function(){

								$("#ut-demo-importer-summary-media-"+current_xml).text(response.data.media_count).fadeIn();

							});

							// exchange comments
							$("#ut-demo-importer-summary-comments-"+current_xml).siblings(".ut-demo-summmary-loader").delay(400).fadeOut( 800, function(){

								$("#ut-demo-importer-summary-comments-"+current_xml).text(response.data.comment_count).fadeIn();

							});					

							// exchange terms
							$("#ut-demo-importer-summary-terms-"+current_xml).siblings(".ut-demo-summmary-loader").delay(600).fadeOut( 800, function(){

								$("#ut-demo-importer-summary-terms-"+current_xml).text(response.data.term_count).fadeIn();

							});

							// add xml post ID
							$("#ut-demo-importer-xml-post-id-"+current_xml).val(response.id).siblings(".ut-run-importer").delay(1600).queue( function() {

								$(this).removeAttr("disabled").text(importer_notices.xmlready);

							});

							$this.addClass('ut-demo-importer-summary-loaded');
						
						}

					},
					error: function( response ) {

						// could not execute
						modal({
							type: 'error',
							title: 'Ohhh something went wrong!',
							size: 'large',
							closable: false,
							text: 'Please Contact Theme Support.',
							buttons: [
								{

									text: 'Contact Support', 
									val: 'ok',
									eKey: true,
									addClass: 'ut-ui-button-health',
									onClick: function(dialog) {
										window.location = 'http://helpdesk.unitedthemes.com/'; 
										return true;
									}

								}                   

							],
						}); 

					}

				});
			
			}
			
			if( !confirmed && importer_notices.imported === "true" ) {
            
                modal({
                    type: 'warning',
                    title: 'A Demo has already been installed!',
                    size: 'large',
                    text: importer_notices.imported_message,
                    buttons: [
                        {   
                            text: 'Download Plugin', 
                            val: 'ok',
                            eKey: true,
                            addClass: 'ut-ui-button-yellow',
                            onClick: function(dialog) {
                                window.location = "http://wordpress.org/plugins/wordpress-database-reset/"; 
                                return true;
                            }
                        }                   
                                                              
                    ],
                });
            
            }
			
		});
                        
        if( importer_notices.error.length && importer_notices.missing_plugins === "true" ) {
            
            modal({
                type: 'error',
                title: 'Ohhh something is missing!',
                size: 'large',
                closable: false,
                text: importer_notices.error,
                buttons: [
                    {
                        
                        text: 'Install Plugins', 
                        val: 'ok',
                        eKey: true,
                        addClass: 'ut-ui-button-health',
                        onClick: function(dialog) {
                            window.location = importer_notices.dashboard; 
                            return true;
                        }
                        
                    }                   
                                                          
                ],
            }); 
        
        }

        if( importer_notices.error.length && importer_notices.missing_license === "true" ) {

            modal({
                type: 'warning',
                title: 'License Required!',
                size: 'large',
                closable: false,
                text: importer_notices.error,
                template: '<div class="modal-box"><div class="modal-inner"><div class="modal-title"></div><div class="modal-text"></div><div class="modal-buttons"></div></div></div>',
                buttons: [
                    {

                        text: 'Activate Brooklyn now!',
                        val: 'ok',
                        eKey: true,
                        addClass: 'ut-ui-button-yellow',
                        onClick: function(dialog) {
                            window.location = importer_notices.licensing;
                            return true;
                        }

                    }

                ],
            });

        }
        
        if( importer_notices.error.length && importer_notices.missing_plugins === "false" && importer_notices.missing_perm === "true" ) {
        
            modal({
                type: 'error',
                title: 'Ohhh something is missing!',
                size: 'large',
                closable: false,
                text: importer_notices.error,
                buttons: [
                    {
                        
                        text: 'Got it!', 
                        val: 'ok',
                        eKey: true,
                        addClass: 'ut-ui-button-health',
                        onClick: function(dialog) {
                            window.location = "https://codex.wordpress.org/Changing_File_Permissions#Using_an_FTP_Client"; 
                            return true;
                        }
                        
                    }                   
                                                          
                ],
            }); 
        
        }
         
	});

})(jQuery);
 /* ]]> */	