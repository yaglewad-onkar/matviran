/*
Tooltipster 3.3.0 | 2014-11-08
A rockin' custom tooltip jQuery plugin
Developed by Caleb Jacob under the MIT license http://opensource.org/licenses/MIT
THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/

;(function ($, window, document) {

	var pluginName = "tooltipster",
		defaults = {
			animation: 'fade',
			arrow: true,
			arrowColor: '',
			autoClose: true,
			content: null,
			contentAsHTML: false,
			contentCloning: true,
			debug: true,
			delay: 200,
			minWidth: 0,
			maxWidth: null,
			functionInit: function(origin, content) {},
			functionBefore: function(origin, continueTooltip) {
				continueTooltip();
			},
			functionReady: function(origin, tooltip) {},
			functionAfter: function(origin) {},
			hideOnClick: false,
			icon: '(?)',
			iconCloning: true,
			iconDesktop: false,
			iconTouch: false,
			iconTheme: 'tooltipster-icon',
			interactive: false,
			interactiveTolerance: 350,
			multiple: false,
			offsetX: 0,
			offsetY: 0,
			onlyOne: false,
			position: 'top',
			positionTracker: false,
			positionTrackerCallback: function(origin){
				// the default tracker callback will close the tooltip when the trigger is
				// 'hover' (see https://github.com/iamceege/tooltipster/pull/253)
				if(this.option('trigger') == 'hover' && this.option('autoClose')) {
					this.hide();
				}
			},
			restoration: 'current',
			speed: 350,
			timer: 0,
			theme: 'tooltipster-default',
			touchDevices: true,
			trigger: 'hover',
			updateAnimation: true
		};
	
	function Plugin(element, options) {
		
		// list of instance variables
		
		this.bodyOverflowX;
		// stack of custom callbacks provided as parameters to API methods
		this.callbacks = {
			hide: [],
			show: []
		};
		this.checkInterval = null;
		// this will be the user content shown in the tooltip. A capital "C" is used because there is also a method called content()
		this.Content;
		// this is the original element which is being applied the tooltipster plugin
		this.$el = $(element);
		// this will be the element which triggers the appearance of the tooltip on hover/click/custom events.
		// it will be the same as this.$el if icons are not used (see in the options), otherwise it will correspond to the created icon
		this.$elProxy;
		this.elProxyPosition;
		this.enabled = true;
		this.options = $.extend({}, defaults, options);
		this.mouseIsOverProxy = false;
		// a unique namespace per instance, for easy selective unbinding
		this.namespace = 'tooltipster-'+ Math.round(Math.random()*100000);
		// Status (capital S) can be either : appearing, shown, disappearing, hidden
		this.Status = 'hidden';
		this.timerHide = null;
		this.timerShow = null;
		// this will be the tooltip element (jQuery wrapped HTML element)
		this.$tooltip;
		
		// for backward compatibility
		this.options.iconTheme = this.options.iconTheme.replace('.', '');
		this.options.theme = this.options.theme.replace('.', '');
		
		// launch
		
		this._init();
	}
	
	Plugin.prototype = {
		
		_init: function() {
			
			var self = this;
			
			// disable the plugin on old browsers (including IE7 and lower)
			if (document.querySelector) {
				
				// note : the content is null (empty) by default and can stay that way if the plugin remains initialized but not fed any content. The tooltip will just not appear.
				
				// let's save the initial value of the title attribute for later restoration if need be.
				var initialTitle = null;
				// it will already have been saved in case of multiple tooltips
				if (self.$el.data('tooltipster-initialTitle') === undefined) {
					
					initialTitle = self.$el.attr('title');
					
					// we do not want initialTitle to have the value "undefined" because of how jQuery's .data() method works
					if (initialTitle === undefined) initialTitle = null;
					
					self.$el.data('tooltipster-initialTitle', initialTitle);
				}
				
				// if content is provided in the options, its has precedence over the title attribute.
				// Note : an empty string is considered content, only 'null' represents the absence of content.
				// Also, an existing title="" attribute will result in an empty string content
				if (self.options.content !== null){
					self._content_set(self.options.content);
				}
				else {
					self._content_set(initialTitle);
				}
				
				var c = self.options.functionInit.call(self.$el, self.$el, self.Content);
				if(typeof c !== 'undefined') self._content_set(c);
				
				self.$el
					// strip the title off of the element to prevent the default tooltips from popping up
					.removeAttr('title')
					// to be able to find all instances on the page later (upon window events in particular)
					.addClass('tooltipstered');

				// detect if we're changing the tooltip origin to an icon
				// note about this condition : if the device has touch capability and self.options.iconTouch is false, you'll have no icons event though you may consider your device as a desktop if it also has a mouse. Not sure why someone would have this use case though.
				if ((!deviceHasTouchCapability && self.options.iconDesktop) || (deviceHasTouchCapability && self.options.iconTouch)) {
					
					// TODO : the tooltip should be automatically be given an absolute position to be near the origin. Otherwise, when the origin is floating or what, it's going to be nowhere near it and disturb the position flow of the page elements. It will imply that the icon also detects when its origin moves, to follow it : not trivial.
					// Until it's done, the icon feature does not really make sense since the user still has most of the work to do by himself
					
					// if the icon provided is in the form of a string
					if(typeof self.options.icon === 'string'){
						// wrap it in a span with the icon class
						self.$elProxy = $('<span class="'+ self.options.iconTheme +'"></span>');
						self.$elProxy.text(self.options.icon);
					}
					// if it is an object (sensible choice)
					else {
						// (deep) clone the object if iconCloning == true, to make sure every instance has its own proxy. We use the icon without wrapping, no need to. We do not give it a class either, as the user will undoubtedly style the object on his own and since our css properties may conflict with his own
						if (self.options.iconCloning) self.$elProxy = self.options.icon.clone(true);
						else self.$elProxy = self.options.icon;
					}
					
					self.$elProxy.insertAfter(self.$el);
				}
				else {
					self.$elProxy = self.$el;
				}
				
				// for 'click' and 'hover' triggers : bind on events to open the tooltip. Closing is now handled in _showNow() because of its bindings.
				// Notes about touch events :
					// - mouseenter, mouseleave and clicks happen even on pure touch devices because they are emulated. deviceIsPureTouch() is a simple attempt to detect them.
					// - on hybrid devices, we do not prevent touch gesture from opening tooltips. It would be too complex to differentiate real mouse events from emulated ones.
					// - we check deviceIsPureTouch() at each event rather than prior to binding because the situation may change during browsing
				if (self.options.trigger == 'hover') {
					
					// these binding are for mouse interaction only
					self.$elProxy
						.on('mouseenter.'+ self.namespace, function() {
							if (!deviceIsPureTouch() || self.options.touchDevices) {
								self.mouseIsOverProxy = true;
								self._show();
							}
						})
						.on('mouseleave.'+ self.namespace, function() {
							if (!deviceIsPureTouch() || self.options.touchDevices) {
								self.mouseIsOverProxy = false;
							}
						});
					
					// for touch interaction only
					if (deviceHasTouchCapability && self.options.touchDevices) {
						
						// for touch devices, we immediately display the tooltip because we cannot rely on mouseleave to handle the delay
						self.$elProxy.on('touchstart.'+ self.namespace, function() {
							self._showNow();
						});
					}
				}
				else if (self.options.trigger == 'click') {
					
					// note : for touch devices, we do not bind on touchstart, we only rely on the emulated clicks (triggered by taps)
					self.$elProxy.on('click.'+ self.namespace, function() {
						if (!deviceIsPureTouch() || self.options.touchDevices) {
							self._show();
						}
					});
				}
			}
		},
		
		// this function will schedule the opening of the tooltip after the delay, if there is one
		_show: function() {
			
			var self = this;
			
			if (self.Status != 'shown' && self.Status != 'appearing') {
				
				if (self.options.delay) {
					self.timerShow = setTimeout(function(){
						
						// for hover trigger, we check if the mouse is still over the proxy, otherwise we do not show anything
						if (self.options.trigger == 'click' || (self.options.trigger == 'hover' && self.mouseIsOverProxy)) {
							self._showNow();
						}
					}, self.options.delay);
				}
				else self._showNow();
			}
		},
		
		// this function will open the tooltip right away
		_showNow: function(callback) {
			
			var self = this;
			
			// call our constructor custom function before continuing
			self.options.functionBefore.call(self.$el, self.$el, function() {
				
				// continue only if the tooltip is enabled and has any content
				if (self.enabled && self.Content !== null) {
				
					// save the method callback and cancel hide method callbacks
					if (callback) self.callbacks.show.push(callback);
					self.callbacks.hide = [];
					
					//get rid of any appearance timer
					clearTimeout(self.timerShow);
					self.timerShow = null;
					clearTimeout(self.timerHide);
					self.timerHide = null;
					
					// if we only want one tooltip open at a time, close all auto-closing tooltips currently open and not already disappearing
					if (self.options.onlyOne) {
						$('.tooltipstered').not(self.$el).each(function(i,el) {
							
							var $el = $(el),
								nss = $el.data('tooltipster-ns');
							
							// iterate on all tooltips of the element
							$.each(nss, function(i, ns){
								var instance = $el.data(ns),
									// we have to use the public methods here
									s = instance.status(),
									ac = instance.option('autoClose');
								
								if (s !== 'hidden' && s !== 'disappearing' && ac) {
									instance.hide();
								}
							});
						});
					}
					
					var finish = function() {
						self.Status = 'shown';
						
						// trigger any show method custom callbacks and reset them
						$.each(self.callbacks.show, function(i,c) { c.call(self.$el); });
						self.callbacks.show = [];
					};
					
					// if this origin already has its tooltip open
					if (self.Status !== 'hidden') {
						
						// the timer (if any) will start (or restart) right now
						var extraTime = 0;
						
						// if it was disappearing, cancel that
						if (self.Status === 'disappearing') {
							
							self.Status = 'appearing';
							
							if (supportsTransitions()) {
								
								self.$tooltip
									.clearQueue()
									.removeClass('tooltipster-dying')
									.addClass('tooltipster-'+ self.options.animation +'-show');
								
								if (self.options.speed > 0) self.$tooltip.delay(self.options.speed);
								
								self.$tooltip.queue(finish);
							}
							else {
								// in case the tooltip was currently fading out, bring it back to life
								self.$tooltip
									.stop()
									.fadeIn(finish);
							}
						}
						// if the tooltip is already open, we still need to trigger the method custom callback
						else if(self.Status === 'shown') {
							finish();
						}
					}
					// if the tooltip isn't already open, open that sucker up!
					else {
						
						self.Status = 'appearing';
						
						// the timer (if any) will start when the tooltip has fully appeared after its transition
						var extraTime = self.options.speed;
						
						// disable horizontal scrollbar to keep overflowing tooltips from jacking with it and then restore it to its previous value
						self.bodyOverflowX = $('body').css('overflow-x');
						$('body').css('overflow-x', 'hidden');
						
						// get some other settings related to building the tooltip
						var animation = 'tooltipster-' + self.options.animation,
							animationSpeed = '-webkit-transition-duration: '+ self.options.speed +'ms; -webkit-animation-duration: '+ self.options.speed +'ms; -moz-transition-duration: '+ self.options.speed +'ms; -moz-animation-duration: '+ self.options.speed +'ms; -o-transition-duration: '+ self.options.speed +'ms; -o-animation-duration: '+ self.options.speed +'ms; -ms-transition-duration: '+ self.options.speed +'ms; -ms-animation-duration: '+ self.options.speed +'ms; transition-duration: '+ self.options.speed +'ms; animation-duration: '+ self.options.speed +'ms;',
							minWidth = self.options.minWidth ? 'min-width:'+ Math.round(self.options.minWidth) +'px;' : '',
							maxWidth = self.options.maxWidth ? 'max-width:'+ Math.round(self.options.maxWidth) +'px;' : '',
							pointerEvents = self.options.interactive ? 'pointer-events: auto;' : '';
						
						// build the base of our tooltip
						self.$tooltip = $('<div class="tooltipster-base '+ self.options.theme +'" style="'+ minWidth +' '+ maxWidth +' '+ pointerEvents +' '+ animationSpeed +'"><div class="tooltipster-content"></div></div>');
						
						// only add the animation class if the user has a browser that supports animations
						if (supportsTransitions()) self.$tooltip.addClass(animation);
						
						// insert the content
						self._content_insert();
						
						// attach
						self.$tooltip.appendTo('body');
						
						// do all the crazy calculations and positioning
						self.reposition();
						
						// call our custom callback since the content of the tooltip is now part of the DOM
						self.options.functionReady.call(self.$el, self.$el, self.$tooltip);
						
						// animate in the tooltip
						if (supportsTransitions()) {
							
							self.$tooltip.addClass(animation + '-show');
							
							if(self.options.speed > 0) self.$tooltip.delay(self.options.speed);
							
							self.$tooltip.queue(finish);
						}
						else {
							self.$tooltip.css('display', 'none').fadeIn(self.options.speed, finish);
						}
						
						// will check if our tooltip origin is removed while the tooltip is shown
						self._interval_set();
						
						// reposition on scroll (otherwise position:fixed element's tooltips will move away form their origin) and on resize (in case position can/has to be changed)
						$(window).on('scroll.'+ self.namespace +' resize.'+ self.namespace, function() {
							self.reposition();
						});
						
						// auto-close bindings
						if (self.options.autoClose) {
							
							// in case a listener is already bound for autoclosing (mouse or touch, hover or click), unbind it first
							$('body').off('.'+ self.namespace);
							
							// here we'll have to set different sets of bindings for both touch and mouse
							if (self.options.trigger == 'hover') {
								
								// if the user touches the body, hide
								if (deviceHasTouchCapability) {
									// timeout 0 : explanation below in click section
									setTimeout(function() {
										// we don't want to bind on click here because the initial touchstart event has not yet triggered its click event, which is thus about to happen
										$('body').on('touchstart.'+ self.namespace, function() {
											self.hide();
										});
									}, 0);
								}
								
								// if we have to allow interaction
								if (self.options.interactive) {
									
									// touch events inside the tooltip must not close it
									if (deviceHasTouchCapability) {
										self.$tooltip.on('touchstart.'+ self.namespace, function(event) {
											event.stopPropagation();
										});
									}
									
									// as for mouse interaction, we get rid of the tooltip only after the mouse has spent some time out of it
									var tolerance = null;
									
									self.$elProxy.add(self.$tooltip)
										// hide after some time out of the proxy and the tooltip
										.on('mouseleave.'+ self.namespace + '-autoClose', function() {
											clearTimeout(tolerance);
											tolerance = setTimeout(function(){
												self.hide();
											}, self.options.interactiveTolerance);
										})
										// suspend timeout when the mouse is over the proxy or the tooltip
										.on('mouseenter.'+ self.namespace + '-autoClose', function() {
											clearTimeout(tolerance);
										});
								}
								// if this is a non-interactive tooltip, get rid of it if the mouse leaves
								else {
									self.$elProxy.on('mouseleave.'+ self.namespace + '-autoClose', function() {
										self.hide();
									});
								}
								
								// close the tooltip when the proxy gets a click (common behavior of native tooltips)
								if (self.options.hideOnClick) {
									
									self.$elProxy.on('click.'+ self.namespace + '-autoClose', function() {
										self.hide();
									});
								}
							}
							// here we'll set the same bindings for both clicks and touch on the body to hide the tooltip
							else if(self.options.trigger == 'click'){
								
								// use a timeout to prevent immediate closing if the method was called on a click event and if options.delay == 0 (because of bubbling)
								setTimeout(function() {
									$('body').on('click.'+ self.namespace +' touchstart.'+ self.namespace, function() {
										self.hide();
									});
								}, 0);
								
								// if interactive, we'll stop the events that were emitted from inside the tooltip to stop autoClosing
								if (self.options.interactive) {
									
									// note : the touch events will just not be used if the plugin is not enabled on touch devices
									self.$tooltip.on('click.'+ self.namespace +' touchstart.'+ self.namespace, function(event) {
										event.stopPropagation();
									});
								}
							}
						}
					}
					
					// if we have a timer set, let the countdown begin
					if (self.options.timer > 0) {
						
						self.timerHide = setTimeout(function() {
							self.timerHide = null;
							self.hide();
						}, self.options.timer + extraTime);
					}
				}
			});
		},
		
		_interval_set: function() {
			
			var self = this;
			
			self.checkInterval = setInterval(function() {
				
				// if the tooltip and/or its interval should be stopped
				if (
						// if the origin has been removed
						$('body').find(self.$el).length === 0
						// if the elProxy has been removed
					||	$('body').find(self.$elProxy).length === 0
						// if the tooltip has been closed
					||	self.Status == 'hidden'
						// if the tooltip has somehow been removed
					||	$('body').find(self.$tooltip).length === 0
				) {
					// remove the tooltip if it's still here
					if (self.Status == 'shown' || self.Status == 'appearing') self.hide();
					
					// clear this interval as it is no longer necessary
					self._interval_cancel();
				}
				// if everything is alright
				else {
					// compare the former and current positions of the elProxy to reposition the tooltip if need be
					if(self.options.positionTracker){
						
						var p = self._repositionInfo(self.$elProxy),
							identical = false;
						
						// compare size first (a change requires repositioning too)
						if(areEqual(p.dimension, self.elProxyPosition.dimension)){
							
							// for elements with a fixed position, we track the top and left properties (relative to window)
							if(self.$elProxy.css('position') === 'fixed'){
								if(areEqual(p.position, self.elProxyPosition.position)) identical = true;
							}
							// otherwise, track total offset (relative to document)
							else {
								if(areEqual(p.offset, self.elProxyPosition.offset)) identical = true;
							}
						}
						
						if(!identical){
							self.reposition();
							self.options.positionTrackerCallback.call(self, self.$el);
						}
					}
				}
			}, 200);
		},
		
		_interval_cancel: function() {
			clearInterval(this.checkInterval);
			// clean delete
			this.checkInterval = null;
		},
		
		_content_set: function(content) {
			// clone if asked. Cloning the object makes sure that each instance has its own version of the content (in case a same object were provided for several instances)
			// reminder : typeof null === object
			if (typeof content === 'object' && content !== null && this.options.contentCloning) {
				content = content.clone(true);
			}
			this.Content = content;
		},
		
		_content_insert: function() {
			
			var self = this,
				$d = this.$tooltip.find('.tooltipster-content');
			
			if (typeof self.Content === 'string' && !self.options.contentAsHTML) {
				$d.text(self.Content);
			}
			else {
				$d
					.empty()
					.append(self.Content);
			}
		},
		
		_update: function(content) {
			
			var self = this;
			
			// change the content
			self._content_set(content);
			
			if (self.Content !== null) {
				
				// update the tooltip if it is open
				if (self.Status !== 'hidden') {
					
					// reset the content in the tooltip
					self._content_insert();
					
					// reposition and resize the tooltip
					self.reposition();
					
					// if we want to play a little animation showing the content changed
					if (self.options.updateAnimation) {
						
						if (supportsTransitions()) {
							
							self.$tooltip.css({
								'width': '',
								'-webkit-transition': 'all ' + self.options.speed + 'ms, width 0ms, height 0ms, left 0ms, top 0ms',
								'-moz-transition': 'all ' + self.options.speed + 'ms, width 0ms, height 0ms, left 0ms, top 0ms',
								'-o-transition': 'all ' + self.options.speed + 'ms, width 0ms, height 0ms, left 0ms, top 0ms',
								'-ms-transition': 'all ' + self.options.speed + 'ms, width 0ms, height 0ms, left 0ms, top 0ms',
								'transition': 'all ' + self.options.speed + 'ms, width 0ms, height 0ms, left 0ms, top 0ms'
							}).addClass('tooltipster-content-changing');
							
							// reset the CSS transitions and finish the change animation
							setTimeout(function() {
								
								if(self.Status != 'hidden'){
									
									self.$tooltip.removeClass('tooltipster-content-changing');
									
									// after the changing animation has completed, reset the CSS transitions
									setTimeout(function() {
										
										if(self.Status !== 'hidden'){
											self.$tooltip.css({
												'-webkit-transition': self.options.speed + 'ms',
												'-moz-transition': self.options.speed + 'ms',
												'-o-transition': self.options.speed + 'ms',
												'-ms-transition': self.options.speed + 'ms',
												'transition': self.options.speed + 'ms'
											});
										}
									}, self.options.speed);
								}
							}, self.options.speed);
						}
						else {
							self.$tooltip.fadeTo(self.options.speed, 0.5, function() {
								if(self.Status != 'hidden'){
									self.$tooltip.fadeTo(self.options.speed, 1);
								}
							});
						}
					}
				}
			}
			else {
				self.hide();
			}
		},
		
		_repositionInfo: function($el) {
			return {
				dimension: {
					height: $el.outerHeight(false),
					width: $el.outerWidth(false)
				},
				offset: $el.offset(),
				position: {
					left: parseInt($el.css('left')),
					top: parseInt($el.css('top'))
				}
			};
		},
		
		hide: function(callback) {
			
			var self = this;
			
			// save the method custom callback and cancel any show method custom callbacks
			if (callback) self.callbacks.hide.push(callback);
			self.callbacks.show = [];
			
			// get rid of any appearance timeout
			clearTimeout(self.timerShow);
			self.timerShow = null;
			clearTimeout(self.timerHide);
			self.timerHide = null;
			
			var finishCallbacks = function() {
				// trigger any hide method custom callbacks and reset them
				$.each(self.callbacks.hide, function(i,c) { c.call(self.$el); });
				self.callbacks.hide = [];
			};
			
			// hide
			if (self.Status == 'shown' || self.Status == 'appearing') {
				
				self.Status = 'disappearing';
				
				var finish = function() {
					
					self.Status = 'hidden';
					
					// detach our content object first, so the next jQuery's remove() call does not unbind its event handlers
					if (typeof self.Content == 'object' && self.Content !== null) {
						self.Content.detach();
					}
					
					self.$tooltip.remove();
					self.$tooltip = null;
					
					// unbind orientationchange, scroll and resize listeners
					$(window).off('.'+ self.namespace);
					
					$('body')
						// unbind any auto-closing click/touch listeners
						.off('.'+ self.namespace)
						.css('overflow-x', self.bodyOverflowX);
					
					// unbind any auto-closing click/touch listeners
					$('body').off('.'+ self.namespace);
					
					// unbind any auto-closing hover listeners
					self.$elProxy.off('.'+ self.namespace + '-autoClose');
					
					// call our constructor custom callback function
					self.options.functionAfter.call(self.$el, self.$el);
					
					// call our method custom callbacks functions
					finishCallbacks();
				};
				
				if (supportsTransitions()) {
					
					self.$tooltip
						.clearQueue()
						.removeClass('tooltipster-' + self.options.animation + '-show')
						// for transitions only
						.addClass('tooltipster-dying');
					
					if(self.options.speed > 0) self.$tooltip.delay(self.options.speed);
					
					self.$tooltip.queue(finish);
				}
				else {
					self.$tooltip
						.stop()
						.fadeOut(self.options.speed, finish);
				}
			}
			// if the tooltip is already hidden, we still need to trigger the method custom callback
			else if(self.Status == 'hidden') {
				finishCallbacks();
			}
			
			return self;
		},
		
		// the public show() method is actually an alias for the private showNow() method
		show: function(callback) {
			this._showNow(callback);
			return this;
		},
		
		// 'update' is deprecated in favor of 'content' but is kept for backward compatibility
		update: function(c) {
			return this.content(c);
		},
		content: function(c) {
			// getter method
			if(typeof c === 'undefined'){
				return this.Content;
			}
			// setter method
			else {
				this._update(c);
				return this;
			}
		},
		
		reposition: function() {
			
			var self = this;
			
			// in case the tooltip has been removed from DOM manually
			if ($('body').find(self.$tooltip).length !== 0) {
				
				// reset width
				self.$tooltip.css('width', '');
				
				// find variables to determine placement
				self.elProxyPosition = self._repositionInfo(self.$elProxy);
				var arrowReposition = null,
					windowWidth = $(window).width(),
					// shorthand
					proxy = self.elProxyPosition,
					tooltipWidth = self.$tooltip.outerWidth(false),
					tooltipInnerWidth = self.$tooltip.innerWidth() + 1, // this +1 stops FireFox from sometimes forcing an additional text line
					tooltipHeight = self.$tooltip.outerHeight(false);
				
				// if this is an <area> tag inside a <map>, all hell breaks loose. Recalculate all the measurements based on coordinates
				if (self.$elProxy.is('area')) {
					var areaShape = self.$elProxy.attr('shape'),
						mapName = self.$elProxy.parent().attr('name'),
						map = $('img[usemap="#'+ mapName +'"]'),
						mapOffsetLeft = map.offset().left,
						mapOffsetTop = map.offset().top,
						areaMeasurements = self.$elProxy.attr('coords') !== undefined ? self.$elProxy.attr('coords').split(',') : undefined;
					
					if (areaShape == 'circle') {
						var areaLeft = parseInt(areaMeasurements[0]),
							areaTop = parseInt(areaMeasurements[1]),
							areaWidth = parseInt(areaMeasurements[2]);
						proxy.dimension.height = areaWidth * 2;
						proxy.dimension.width = areaWidth * 2;
						proxy.offset.top = mapOffsetTop + areaTop - areaWidth;
						proxy.offset.left = mapOffsetLeft + areaLeft - areaWidth;
					}
					else if (areaShape == 'rect') {
						var areaLeft = parseInt(areaMeasurements[0]),
							areaTop = parseInt(areaMeasurements[1]),
							areaRight = parseInt(areaMeasurements[2]),
							areaBottom = parseInt(areaMeasurements[3]);
						proxy.dimension.height = areaBottom - areaTop;
						proxy.dimension.width = areaRight - areaLeft;
						proxy.offset.top = mapOffsetTop + areaTop;
						proxy.offset.left = mapOffsetLeft + areaLeft;
					}
					else if (areaShape == 'poly') {
						var areaXs = [],
							areaYs = [],
							areaSmallestX = 0,
							areaSmallestY = 0,
							areaGreatestX = 0,
							areaGreatestY = 0,
							arrayAlternate = 'even';
						
						for (var i = 0; i < areaMeasurements.length; i++) {
							var areaNumber = parseInt(areaMeasurements[i]);
							
							if (arrayAlternate == 'even') {
								if (areaNumber > areaGreatestX) {
									areaGreatestX = areaNumber;
									if (i === 0) {
										areaSmallestX = areaGreatestX;
									}
								}
								
								if (areaNumber < areaSmallestX) {
									areaSmallestX = areaNumber;
								}
								
								arrayAlternate = 'odd';
							}
							else {
								if (areaNumber > areaGreatestY) {
									areaGreatestY = areaNumber;
									if (i == 1) {
										areaSmallestY = areaGreatestY;
									}
								}
								
								if (areaNumber < areaSmallestY) {
									areaSmallestY = areaNumber;
								}
								
								arrayAlternate = 'even';
							}
						}
					
						proxy.dimension.height = areaGreatestY - areaSmallestY;
						proxy.dimension.width = areaGreatestX - areaSmallestX;
						proxy.offset.top = mapOffsetTop + areaSmallestY;
						proxy.offset.left = mapOffsetLeft + areaSmallestX;
					}
					else {
						proxy.dimension.height = map.outerHeight(false);
						proxy.dimension.width = map.outerWidth(false);
						proxy.offset.top = mapOffsetTop;
						proxy.offset.left = mapOffsetLeft;
					}
				}
				
				// our function and global vars for positioning our tooltip
				var myLeft = 0,
					myLeftMirror = 0,
					myTop = 0,
					offsetY = parseInt(self.options.offsetY),
					offsetX = parseInt(self.options.offsetX),
					// this is the arrow position that will eventually be used. It may differ from the position option if the tooltip cannot be displayed in this position
					practicalPosition = self.options.position;
				
				// a function to detect if the tooltip is going off the screen horizontally. If so, reposition the crap out of it!
				function dontGoOffScreenX() {
				
					var windowLeft = $(window).scrollLeft();
					
					// if the tooltip goes off the left side of the screen, line it up with the left side of the window
					if((myLeft - windowLeft) < 0) {
						arrowReposition = myLeft - windowLeft;
						myLeft = windowLeft;
					}
					
					// if the tooltip goes off the right of the screen, line it up with the right side of the window
					if (((myLeft + tooltipWidth) - windowLeft) > windowWidth) {
						arrowReposition = myLeft - ((windowWidth + windowLeft) - tooltipWidth);
						myLeft = (windowWidth + windowLeft) - tooltipWidth;
					}
				}
				
				// a function to detect if the tooltip is going off the screen vertically. If so, switch to the opposite!
				function dontGoOffScreenY(switchTo, switchFrom) {
					// if it goes off the top off the page
					if(((proxy.offset.top - $(window).scrollTop() - tooltipHeight - offsetY - 12) < 0) && (switchFrom.indexOf('top') > -1)) {
						practicalPosition = switchTo;
					}
					
					// if it goes off the bottom of the page
					if (((proxy.offset.top + proxy.dimension.height + tooltipHeight + 12 + offsetY) > ($(window).scrollTop() + $(window).height())) && (switchFrom.indexOf('bottom') > -1)) {
						practicalPosition = switchTo;
						myTop = (proxy.offset.top - tooltipHeight) - offsetY - 12;
					}
				}
				
				if(practicalPosition == 'top') {
					var leftDifference = (proxy.offset.left + tooltipWidth) - (proxy.offset.left + proxy.dimension.width);
					myLeft = (proxy.offset.left + offsetX) - (leftDifference / 2);
					myTop = (proxy.offset.top - tooltipHeight) - offsetY - 12;
					dontGoOffScreenX();
					dontGoOffScreenY('bottom', 'top');
				}
				
				if(practicalPosition == 'top-left') {
					myLeft = proxy.offset.left + offsetX;
					myTop = (proxy.offset.top - tooltipHeight) - offsetY - 12;
					dontGoOffScreenX();
					dontGoOffScreenY('bottom-left', 'top-left');
				}
				
				if(practicalPosition == 'top-right') {
					myLeft = (proxy.offset.left + proxy.dimension.width + offsetX) - tooltipWidth;
					myTop = (proxy.offset.top - tooltipHeight) - offsetY - 12;
					dontGoOffScreenX();
					dontGoOffScreenY('bottom-right', 'top-right');
				}
				
				if(practicalPosition == 'bottom') {
					var leftDifference = (proxy.offset.left + tooltipWidth) - (proxy.offset.left + proxy.dimension.width);
					myLeft = proxy.offset.left - (leftDifference / 2) + offsetX;
					myTop = (proxy.offset.top + proxy.dimension.height) + offsetY + 12;
					dontGoOffScreenX();
					dontGoOffScreenY('top', 'bottom');
				}
				
				if(practicalPosition == 'bottom-left') {
					myLeft = proxy.offset.left + offsetX;
					myTop = (proxy.offset.top + proxy.dimension.height) + offsetY + 12;
					dontGoOffScreenX();
					dontGoOffScreenY('top-left', 'bottom-left');
				}
				
				if(practicalPosition == 'bottom-right') {
					myLeft = (proxy.offset.left + proxy.dimension.width + offsetX) - tooltipWidth;
					myTop = (proxy.offset.top + proxy.dimension.height) + offsetY + 12;
					dontGoOffScreenX();
					dontGoOffScreenY('top-right', 'bottom-right');
				}
				
				if(practicalPosition == 'left') {
					myLeft = proxy.offset.left - offsetX - tooltipWidth - 12;
					myLeftMirror = proxy.offset.left + offsetX + proxy.dimension.width + 12;
					var topDifference = (proxy.offset.top + tooltipHeight) - (proxy.offset.top + proxy.dimension.height);
					myTop = proxy.offset.top - (topDifference / 2) - offsetY;
					
					// if the tooltip goes off boths sides of the page
					if((myLeft < 0) && ((myLeftMirror + tooltipWidth) > windowWidth)) {
						var borderWidth = parseFloat(self.$tooltip.css('border-width')) * 2,
							newWidth = (tooltipWidth + myLeft) - borderWidth;
						self.$tooltip.css('width', newWidth + 'px');
						
						tooltipHeight = self.$tooltip.outerHeight(false);
						myLeft = proxy.offset.left - offsetX - newWidth - 12 - borderWidth;
						topDifference = (proxy.offset.top + tooltipHeight) - (proxy.offset.top + proxy.dimension.height);
						myTop = proxy.offset.top - (topDifference / 2) - offsetY;
					}
					
					// if it only goes off one side, flip it to the other side
					else if(myLeft < 0) {
						myLeft = proxy.offset.left + offsetX + proxy.dimension.width + 12;
						arrowReposition = 'left';
					}
				}
				
				if(practicalPosition == 'right') {
					myLeft = proxy.offset.left + offsetX + proxy.dimension.width + 12;
					myLeftMirror = proxy.offset.left - offsetX - tooltipWidth - 12;
					var topDifference = (proxy.offset.top + tooltipHeight) - (proxy.offset.top + proxy.dimension.height);
					myTop = proxy.offset.top - (topDifference / 2) - offsetY;
					
					// if the tooltip goes off boths sides of the page
					if(((myLeft + tooltipWidth) > windowWidth) && (myLeftMirror < 0)) {
						var borderWidth = parseFloat(self.$tooltip.css('border-width')) * 2,
							newWidth = (windowWidth - myLeft) - borderWidth;
						self.$tooltip.css('width', newWidth + 'px');
						
						tooltipHeight = self.$tooltip.outerHeight(false);
						topDifference = (proxy.offset.top + tooltipHeight) - (proxy.offset.top + proxy.dimension.height);
						myTop = proxy.offset.top - (topDifference / 2) - offsetY;
					}
						
					// if it only goes off one side, flip it to the other side
					else if((myLeft + tooltipWidth) > windowWidth) {
						myLeft = proxy.offset.left - offsetX - tooltipWidth - 12;
						arrowReposition = 'right';
					}
				}
				
				// if arrow is set true, style it and append it
				if (self.options.arrow) {
	
					var arrowClass = 'tooltipster-arrow-' + practicalPosition;
					
					// set color of the arrow
					if(self.options.arrowColor.length < 1) {
						var arrowColor = self.$tooltip.css('background-color');
					}
					else {
						var arrowColor = self.options.arrowColor;
					}
					
					// if the tooltip was going off the page and had to re-adjust, we need to update the arrow's position
					if (!arrowReposition) {
						arrowReposition = '';
					}
					else if (arrowReposition == 'left') {
						arrowClass = 'tooltipster-arrow-right';
						arrowReposition = '';
					}
					else if (arrowReposition == 'right') {
						arrowClass = 'tooltipster-arrow-left';
						arrowReposition = '';
					}
					else {
						arrowReposition = 'left:'+ Math.round(arrowReposition) +'px;';
					}
					
					// building the logic to create the border around the arrow of the tooltip
					if ((practicalPosition == 'top') || (practicalPosition == 'top-left') || (practicalPosition == 'top-right')) {
						var tooltipBorderWidth = parseFloat(self.$tooltip.css('border-bottom-width')),
							tooltipBorderColor = self.$tooltip.css('border-bottom-color');
					}
					else if ((practicalPosition == 'bottom') || (practicalPosition == 'bottom-left') || (practicalPosition == 'bottom-right')) {
						var tooltipBorderWidth = parseFloat(self.$tooltip.css('border-top-width')),
							tooltipBorderColor = self.$tooltip.css('border-top-color');
					}
					else if (practicalPosition == 'left') {
						var tooltipBorderWidth = parseFloat(self.$tooltip.css('border-right-width')),
							tooltipBorderColor = self.$tooltip.css('border-right-color');
					}
					else if (practicalPosition == 'right') {
						var tooltipBorderWidth = parseFloat(self.$tooltip.css('border-left-width')),
							tooltipBorderColor = self.$tooltip.css('border-left-color');
					}
					else {
						var tooltipBorderWidth = parseFloat(self.$tooltip.css('border-bottom-width')),
							tooltipBorderColor = self.$tooltip.css('border-bottom-color');
					}
					
					if (tooltipBorderWidth > 1) {
						tooltipBorderWidth++;
					}
					
					var arrowBorder = '';
					if (tooltipBorderWidth !== 0) {
						var arrowBorderSize = '',
							arrowBorderColor = 'border-color: '+ tooltipBorderColor +';';
						if (arrowClass.indexOf('bottom') !== -1) {
							arrowBorderSize = 'margin-top: -'+ Math.round(tooltipBorderWidth) +'px;';
						}
						else if (arrowClass.indexOf('top') !== -1) {
							//arrowBorderSize = 'margin-bottom: -'+ Math.round(tooltipBorderWidth) +'px;';
						}
						else if (arrowClass.indexOf('left') !== -1) {
							arrowBorderSize = 'margin-right: -'+ Math.round(tooltipBorderWidth) +'px;';
						}
						else if (arrowClass.indexOf('right') !== -1) {
							arrowBorderSize = 'margin-left: -'+ Math.round(tooltipBorderWidth) +'px;';
						}
						arrowBorder = '<span class="tooltipster-arrow-border" style="'+ arrowBorderSize +' '+ arrowBorderColor +';"></span>';
					}
					
					// if the arrow already exists, remove and replace it
					self.$tooltip.find('.tooltipster-arrow').remove();
					
					// build out the arrow and append it		
					var arrowConstruct = '<div class="'+ arrowClass +' tooltipster-arrow" style="'+ arrowReposition +'">'+ arrowBorder +'<span style="border-color:'+ arrowColor +';"></span></div>';
					self.$tooltip.append(arrowConstruct);
				}
				
				// position the tooltip
				self.$tooltip.css({'top': Math.round(myTop) + 'px', 'left': Math.round(myLeft) + 'px'});
			}
			
			return self;
		},
		
		enable: function() {
			this.enabled = true;
			return this;
		},
		
		disable: function() {
			// hide first, in case the tooltip would not disappear on its own (autoClose false)
			this.hide();
			this.enabled = false;
			return this;
		},
		
		destroy: function() {
			
			var self = this;
			
			self.hide();
			
			// remove the icon, if any
			if (self.$el[0] !== self.$elProxy[0]) {
				self.$elProxy.remove();
			}
			
			self.$el
				.removeData(self.namespace)
				.off('.'+ self.namespace);
			
			var ns = self.$el.data('tooltipster-ns');
			
			// if there are no more tooltips on this element
			if(ns.length === 1){
				
				// optional restoration of a title attribute
				var title = null;
				if (self.options.restoration === 'previous'){
					title = self.$el.data('tooltipster-initialTitle');
				}
				else if(self.options.restoration === 'current'){
					
					// old school technique to stringify when outerHTML is not supported
					title =
						(typeof self.Content === 'string') ?
						self.Content :
						$('<div></div>').append(self.Content).html();
				}
				
				if (title) {
					self.$el.attr('title', title);
				}
				
				// final cleaning
				self.$el
					.removeClass('tooltipstered')
					.removeData('tooltipster-ns')
					.removeData('tooltipster-initialTitle');
			}
			else {
				// remove the instance namespace from the list of namespaces of tooltips present on the element
				ns = $.grep(ns, function(el, i){
					return el !== self.namespace;
				});
				self.$el.data('tooltipster-ns', ns);
			}
			
			return self;
		},
		
		elementIcon: function() {
			return (this.$el[0] !== this.$elProxy[0]) ? this.$elProxy[0] : undefined;
		},
		
		elementTooltip: function() {
			return this.$tooltip ? this.$tooltip[0] : undefined;
		},
		
		// public methods but for internal use only
		// getter if val is ommitted, setter otherwise
		option: function(o, val) {
			if (typeof val == 'undefined') return this.options[o];
			else {
				this.options[o] = val;
				return this;
			}
		},
		status: function() {
			return this.Status;
		}
	};
	
	$.fn[pluginName] = function () {
		
		// for using in closures
		var args = arguments;
		
		// if we are not in the context of jQuery wrapped HTML element(s) :
		// this happens when calling static methods in the form $.fn.tooltipster('methodName'), or when calling $(sel).tooltipster('methodName or options') where $(sel) does not match anything
		if (this.length === 0) {
			
			// if the first argument is a method name
			if (typeof args[0] === 'string') {
				
				var methodIsStatic = true;
				
				// list static methods here (usable by calling $.fn.tooltipster('methodName');)
				switch (args[0]) {
					
					case 'setDefaults':
						// change default options for all future instances
						$.extend(defaults, args[1]);
						break;
					
					default:
						methodIsStatic = false;
						break;
				}
				
				// $.fn.tooltipster('methodName') calls will return true
				if (methodIsStatic) return true;
				// $(sel).tooltipster('methodName') calls will return the list of objects event though it's empty because chaining should work on empty lists
				else return this;
			}
			// the first argument is undefined or an object of options : we are initalizing but there is no element matched by selector
			else {
				// still chainable : same as above
				return this;
			}
		}
		// this happens when calling $(sel).tooltipster('methodName or options') where $(sel) matches one or more elements
		else {
			
			// method calls
			if (typeof args[0] === 'string') {
				
				var v = '#*$~&';
				
				this.each(function() {
					
					// retrieve the namepaces of the tooltip(s) that exist on that element. We will interact with the first tooltip only.
					var ns = $(this).data('tooltipster-ns'),
						// self represents the instance of the first tooltipster plugin associated to the current HTML object of the loop
						self = ns ? $(this).data(ns[0]) : null;
					
					// if the current element holds a tooltipster instance
					if (self) {
						
						if (typeof self[args[0]] === 'function') {
							// note : args[1] and args[2] may not be defined
							var resp = self[args[0]](args[1], args[2]);
						}
						else {
							throw new Error('Unknown method .tooltipster("' + args[0] + '")');
						}
						
						// if the function returned anything other than the instance itself (which implies chaining)
						if (resp !== self){
							v = resp;
							// return false to stop .each iteration on the first element matched by the selector
							return false;
						}
					}
					else {
						throw new Error('You called Tooltipster\'s "' + args[0] + '" method on an uninitialized element');
					}
				});
				
				return (v !== '#*$~&') ? v : this;
			}
			// first argument is undefined or an object : the tooltip is initializing
			else {
				
				var instances = [],
					// is there a defined value for the multiple option in the options object ?
					multipleIsSet = args[0] && typeof args[0].multiple !== 'undefined',
					// if the multiple option is set to true, or if it's not defined but set to true in the defaults
					multiple = (multipleIsSet && args[0].multiple) || (!multipleIsSet && defaults.multiple),
					// same for debug
					debugIsSet = args[0] && typeof args[0].debug !== 'undefined',
					debug = (debugIsSet && args[0].debug) || (!debugIsSet && defaults.debug);
				
				// initialize a tooltipster instance for each element if it doesn't already have one or if the multiple option is set, and attach the object to it
				this.each(function () {
					
					var go = false,
						ns = $(this).data('tooltipster-ns'),
						instance = null;
					
					if (!ns) {
						go = true;
					}
					else if (multiple) {
						go = true;
					}
					else if (debug) {
						console.log('Tooltipster: one or more tooltips are already attached to this element: ignoring. Use the "multiple" option to attach more tooltips.');
					}
					
					if (go) {
						instance = new Plugin(this, args[0]);
						
						// save the reference of the new instance
						if (!ns) ns = [];
						ns.push(instance.namespace);
						$(this).data('tooltipster-ns', ns)
						
						// save the instance itself
						$(this).data(instance.namespace, instance);
					}
					
					instances.push(instance);
				});
				
				if (multiple) return instances;
				else return this;
			}
		}
	};
	
	// quick & dirty compare function (not bijective nor multidimensional)
	function areEqual(a,b) {
		var same = true;
		$.each(a, function(i, el){
			if(typeof b[i] === 'undefined' || a[i] !== b[i]){
				same = false;
				return false;
			}
		});
		return same;
	}
	
	// detect if this device can trigger touch events
	var deviceHasTouchCapability = !!('ontouchstart' in window);
	
	// we'll assume the device has no mouse until we detect any mouse movement
	var deviceHasMouse = false;
	$('body').one('mousemove', function() {
		deviceHasMouse = true;
	});
	
	function deviceIsPureTouch() {
		return (!deviceHasMouse && deviceHasTouchCapability);
	}
	
	// detecting support for CSS transitions
	function supportsTransitions() {
		var b = document.body || document.documentElement,
			s = b.style,
			p = 'transition';
		
		if(typeof s[p] == 'string') {return true; }

		v = ['Moz', 'Webkit', 'Khtml', 'O', 'ms'],
		p = p.charAt(0).toUpperCase() + p.substr(1);
		for(var i=0; i<v.length; i++) {
			if(typeof s[v[i] + p] == 'string') { return true; }
		}
		return false;
	}
})( jQuery, window, document );



/*!
 * SlickNav Responsive Mobile Menu v1.0.7
 * (c) 2016 Josh Cope
 * licensed under MIT
 */
;(function ($, document, window) {
    var
    // default settings object.
        defaults = {
            label: 'MENU',
            duplicate: true,
            duration: 200,
            easingOpen: 'swing',
            easingClose: 'swing',
            closedSymbol: '<i class="fa fa-angle-down"></i>',
            openedSymbol: '<i class="fa fa-angle-up"></i>',
            prependTo: 'body',
            appendTo: '',
            showButton: false,
            parentTag: 'a',
            closeOnClick: false,
            allowParentLinks: false,
            nestedParentLinks: false,
            showChildren: false,
            removeIds: true,
            removeClasses: false,
            removeStyles: false,
			brand: '',
            init: function () {},
            beforeOpen: function () {},
            beforeClose: function () {},
            afterOpen: function () {},
            afterClose: function () {}
        },
        mobileMenu = 'slicknav',
        prefix = 'slicknav';

    function Plugin(element, options) {
        this.element = element;

        // jQuery has an extend method which merges the contents of two or
        // more objects, storing the result in the first object. The first object
        // is generally empty as we don't want to alter the default options for
        // future instances of the plugin
        this.settings = $.extend({}, defaults, options);

        // Don't remove IDs by default if duplicate is false
        if (!this.settings.duplicate && !options.hasOwnProperty("removeIds")) {
          this.settings.removeIds = false;
        }

        this._defaults = defaults;
        this._name = mobileMenu;

        this.init();
    }

    Plugin.prototype.init = function () {
        var $this = this,
            menu = $(this.element),
            settings = this.settings,
            iconClass,
            menuBar;

        // clone menu if needed
        if (settings.duplicate) {
            $this.mobileNav = menu.clone();
        } else {
            $this.mobileNav = menu;
        }

        // remove IDs if set
        if (settings.removeIds) {
          $this.mobileNav.removeAttr('id');
          $this.mobileNav.find('*').each(function (i, e) {
              $(e).removeAttr('id');
          });
        }

        // remove classes if set
        if (settings.removeClasses) {
            $this.mobileNav.removeAttr('class');
            $this.mobileNav.find('*').each(function (i, e) {
                $(e).removeAttr('class');
            });
        }

        // remove styles if set
        if (settings.removeStyles) {
            $this.mobileNav.removeAttr('style');
            $this.mobileNav.find('*').each(function (i, e) {
                $(e).removeAttr('style');
            });
        }

        // styling class for the button
        iconClass = prefix + '_icon';

        if (settings.label === '') {
            iconClass += ' ' + prefix + '_no-text';
        }

        if (settings.parentTag == 'a') {
            settings.parentTag = 'a href="#"';
        }

        // create menu bar
        $this.mobileNav.attr('class', prefix + '_nav ut-admin-inner-nav');
        menuBar = $('<div class="' + prefix + '_menu"></div>');
		if (settings.brand !== '') {
			var brand = $('<div class="' + prefix + '_brand">'+settings.brand+'</div>');
			$(menuBar).append(brand);
		}
        $this.btn = $(
            ['<' + settings.parentTag + ' aria-haspopup="true" tabindex="0" class="' + prefix + '_btn ' + prefix + '_collapsed">',
                '<span class="' + prefix + '_menutxt">' + settings.label + '</span>',
                '<span class="' + iconClass + '">',
                    '<span class="' + prefix + '_icon-bar"></span>',
                    '<span class="' + prefix + '_icon-bar"></span>',
                    '<span class="' + prefix + '_icon-bar"></span>',
                '</span>',
            '</' + settings.parentTag + '>'
            ].join('')
        );
        
        if( settings.showButton ) {
        
            $(menuBar).append($this.btn);
            if(settings.appendTo !== '') {
                $(settings.appendTo).append(menuBar);
            } else {
                $(settings.prependTo).prepend(menuBar);
            }
            menuBar.append($this.mobileNav);
        
        } else {
            
            $(settings.prependTo).prepend($this.mobileNav);    
        
        }        

        // iterate over structure adding additional structure
        var items = $this.mobileNav.find('li');
        $(items).each(function () {
            var item = $(this),
                data = {};
            data.children = item.children('ul').attr('role', 'menu');
            item.data('menu', data);

            // if a list item has a nested menu
            if (data.children.length > 0) {

                // select all text before the child menu
                // check for anchors

                var a = item.contents(),
                    containsAnchor = false,
                    nodes = [];

                $(a).each(function () {
                    if (!$(this).is('ul')) {
                        nodes.push(this);
                    } else {
                        return false;
                    }

                    if($(this).is("a")) {
                        containsAnchor = true;
                    }
                });
                
                var wrapElement = $(
                    '<' + settings.parentTag + ' role="menuitem" aria-haspopup="true" tabindex="-1" class="' + prefix + '_item"/>'
                );
                
                /* ut mod */
                wrapElement.data( item.find('.ut-slicknav-item-placeholder').data() );
                /* /ut mod */
                
                // wrap item text with tag and add classes unless we are separating parent links
                if ((!settings.allowParentLinks || settings.nestedParentLinks) || !containsAnchor) {
                    var $wrap = $(nodes).wrapAll(wrapElement).parent();
                    $wrap.addClass(prefix+'_row');
                } else
                    $(nodes).wrapAll('<span class="'+prefix+'_parent-link '+prefix+'_row"/>').parent();

                if (!settings.showChildren) {
                    item.addClass(prefix+'_collapsed');
                } else {
                    item.addClass(prefix+'_open');
                }

                item.addClass(prefix+'_parent');

                // create parent arrow. wrap with link if parent links and separating
                var arrowElement = $('<span class="'+prefix+'_arrow">'+(settings.showChildren?settings.openedSymbol:settings.closedSymbol)+'</span>');

                if (settings.allowParentLinks && !settings.nestedParentLinks && containsAnchor)
                    arrowElement = arrowElement.wrap(wrapElement).parent();

                //append arrow
                $(nodes).last().after(arrowElement);


            } else if ( item.children().length === 0) {
                 item.addClass(prefix+'_txtnode');
            }

            // accessibility for links
            item.children('a').attr('role', 'menuitem').click(function(event){
                //Ensure that it's not a parent
                if (settings.closeOnClick && !$(event.target).parent().closest('li').hasClass(prefix+'_parent')) {
                        //Emulate menu close if set
                        $($this.btn).click();
                    }
            });

            //also close on click if parent links are set
            if (settings.closeOnClick && settings.allowParentLinks) {
                item.children('a').children('a').click(function (event) {
                    //Emulate menu close
                    $($this.btn).click();
                });

                item.find('.'+prefix+'_parent-link a:not(.'+prefix+'_item)').click(function(event){
                    //Emulate menu close
                        $($this.btn).click();
                });
            }
        });


        // structure is in place, now hide appropriate items
        $(items).each(function () {
            var data = $(this).data('menu');
            if (!settings.showChildren){
                $this._visibilityToggle(data.children, null, false, null, true);
            }
        });

        // finally toggle entire menu
        $this._visibilityToggle($this.mobileNav, null, false, 'init', true);

        // accessibility for menu button
        $this.mobileNav.attr('role','menu');

        // outline prevention when using mouse
        $(document).mousedown(function(){
            $this._outlines(false);
        });

        $(document).keyup(function(){
            $this._outlines(true);
        });

        // menu button click
        $($this.btn).click(function (e) {
            e.preventDefault();
            $this._menuToggle();
        });

        // click on menu parent
        $this.mobileNav.on('click', '.' + prefix + '_item', function (e) {
            e.preventDefault();
            $this._itemClick($(this));
        });

        // check for enter key on menu button and menu parents
        $($this.btn).keydown(function (e) {
            var ev = e || event;
            if(ev.keyCode == 13) {
                e.preventDefault();
                $this._menuToggle();
            }
        });

        $this.mobileNav.on('keydown', '.'+prefix+'_item', function(e) {
            var ev = e || event;
            if(ev.keyCode == 13) {
                e.preventDefault();
                $this._itemClick($(e.target));
            }
        });

        // allow links clickable within parent tags if set
        if (settings.allowParentLinks && settings.nestedParentLinks) {
            $('.'+prefix+'_item a').click(function(e){
                    e.stopImmediatePropagation();
            });
        }
    };

    //toggle menu
    Plugin.prototype._menuToggle = function (el) {
        var $this = this;
        var btn = $this.btn;
        var mobileNav = $this.mobileNav;

        if (btn.hasClass(prefix+'_collapsed')) {
            btn.removeClass(prefix+'_collapsed');
            btn.addClass(prefix+'_open');
        } else {
            btn.removeClass(prefix+'_open');
            btn.addClass(prefix+'_collapsed');
        }
        btn.addClass(prefix+'_animating');
        $this._visibilityToggle(mobileNav, btn.parent(), true, btn);
    };

    // toggle clicked items
    Plugin.prototype._itemClick = function (el) {
        var $this = this;
        var settings = $this.settings;
        var data = el.data('menu');
        if (!data) {
            data = {};
            data.arrow = el.children('.'+prefix+'_arrow');
            data.ul = el.next('ul');
            data.parent = el.parent();
            //Separated parent link structure
            if (data.parent.hasClass(prefix+'_parent-link')) {
                data.parent = el.parent().parent();
                data.ul = el.parent().next('ul');
            }
            el.data('menu', data);
        }
        if (data.parent.hasClass(prefix+'_collapsed')) {
            data.arrow.html(settings.openedSymbol);
            data.parent.removeClass(prefix+'_collapsed');
            data.parent.addClass(prefix+'_open');
            data.parent.addClass(prefix+'_animating');
            $this._visibilityToggle(data.ul, data.parent, true, el);
        } else {
            data.arrow.html(settings.closedSymbol);
            data.parent.addClass(prefix+'_collapsed');
            data.parent.removeClass(prefix+'_open');
            data.parent.addClass(prefix+'_animating');
            $this._visibilityToggle(data.ul, data.parent, true, el);
        }
    };

    // toggle actual visibility and accessibility tags
    Plugin.prototype._visibilityToggle = function(el, parent, animate, trigger, init) {
        var $this = this;
        var settings = $this.settings;
        var items = $this._getActionItems(el);
        var duration = 0;
        if (animate) {
            duration = settings.duration;
        }

        if (el.hasClass(prefix+'_hidden')) {
            el.removeClass(prefix+'_hidden');
             //Fire beforeOpen callback
                if (!init) {
                    settings.beforeOpen(trigger);
                }
            el.slideDown(duration, settings.easingOpen, function(){

                $(trigger).removeClass(prefix+'_animating');
                $(parent).removeClass(prefix+'_animating');

                //Fire afterOpen callback
                if (!init) {
                    settings.afterOpen(trigger);
                }
            });
            el.attr('aria-hidden','false');
            items.attr('tabindex', '0');
            $this._setVisAttr(el, false);
        } else {
            el.addClass(prefix+'_hidden');

            //Fire init or beforeClose callback
            if (!init){
                settings.beforeClose(trigger);
            }

            el.slideUp(duration, this.settings.easingClose, function() {
                el.attr('aria-hidden','true');
                items.attr('tabindex', '-1');
                $this._setVisAttr(el, true);
                el.hide(); //jQuery 1.7 bug fix

                $(trigger).removeClass(prefix+'_animating');
                $(parent).removeClass(prefix+'_animating');

                //Fire init or afterClose callback
                if (!init){
                    settings.afterClose(trigger);
                } else if (trigger == 'init'){
                    settings.init();
                }
            });
        }
    };

    // set attributes of element and children based on visibility
    Plugin.prototype._setVisAttr = function(el, hidden) {
        var $this = this;

        // select all parents that aren't hidden
        var nonHidden = el.children('li').children('ul').not('.'+prefix+'_hidden');

        // iterate over all items setting appropriate tags
        if (!hidden) {
            nonHidden.each(function(){
                var ul = $(this);
                ul.attr('aria-hidden','false');
                var items = $this._getActionItems(ul);
                items.attr('tabindex', '0');
                $this._setVisAttr(ul, hidden);
            });
        } else {
            nonHidden.each(function(){
                var ul = $(this);
                ul.attr('aria-hidden','true');
                var items = $this._getActionItems(ul);
                items.attr('tabindex', '-1');
                $this._setVisAttr(ul, hidden);
            });
        }
    };

    // get all 1st level items that are clickable
    Plugin.prototype._getActionItems = function(el) {
        var data = el.data("menu");
        if (!data) {
            data = {};
            var items = el.children('li');
            var anchors = items.find('a');
            data.links = anchors.add(items.find('.'+prefix+'_item'));
            el.data('menu', data);
        }
        return data.links;
    };

    Plugin.prototype._outlines = function(state) {
        if (!state) {
            $('.'+prefix+'_item, .'+prefix+'_btn').css('outline','none');
        } else {
            $('.'+prefix+'_item, .'+prefix+'_btn').css('outline','');
        }
    };

    Plugin.prototype.toggle = function(){
        var $this = this;
        $this._menuToggle();
    };

    Plugin.prototype.open = function(){
        var $this = this;
        if ($this.btn.hasClass(prefix+'_collapsed')) {
            $this._menuToggle();
        }
    };

    Plugin.prototype.close = function(){
        var $this = this;
        if ($this.btn.hasClass(prefix+'_open')) {
            $this._menuToggle();
        }
    };

    $.fn[mobileMenu] = function ( options ) {
        var args = arguments;

        // Is the first parameter an object (options), or was omitted, instantiate a new instance
        if (options === undefined || typeof options === 'object') {
            return this.each(function () {

                // Only allow the plugin to be instantiated once due to methods
                if (!$.data(this, 'plugin_' + mobileMenu)) {

                    // if it has no instance, create a new one, pass options to our plugin constructor,
                    // and store the plugin instance in the elements jQuery data object.
                    $.data(this, 'plugin_' + mobileMenu, new Plugin( this, options ));
                }
            });

        // If is a string and doesn't start with an underscore or 'init' function, treat this as a call to a public method.
        } else if (typeof options === 'string' && options[0] !== '_' && options !== 'init') {

            // Cache the method call to make it possible to return a value
            var returns;

            this.each(function () {
                var instance = $.data(this, 'plugin_' + mobileMenu);

                // Tests that there's already a plugin-instance and checks that the requested public method exists
                if (instance instanceof Plugin && typeof instance[options] === 'function') {

                    // Call the method of our plugin instance, and pass it the supplied arguments.
                    returns = instance[options].apply( instance, Array.prototype.slice.call( args, 1 ) );
                }
            });

            // If the earlier cached method gives a value back return the value, otherwise return this to preserve chainability.
            return returns !== undefined ? returns : this;
        }
    };
}(jQuery, document, window));


/*!
 * jQuery Modal
 * Copyright (c) 2015 CreativeDream
 * Website http://creativedream.net/plugins
 * Version: 1.2.3 (10-04-2015)
 * Requires: jQuery v1.7.1 or later
 */
function modal(e) {
	return jQuery.cModal(e)
}(function(e) {
	e.cModal = function(t) {
		var n = {
				type: "default",
				title: null,
				text: null,
				size: "normal",
				buttons: [{
					text: "OK",
					val: true,
					onClick: function(e) {
						return true
					}
				}],
				center: true,
				autoclose: false,
				callback: null,
				onShow: null,
				animate: true,
				closeClick: true,
				closable: true,
				theme: "default",
				background: null,
				zIndex: 1050,
				buttonText: {
					ok: "OK",
					yes: "Yes",
					cancel: "Cancel"
				},
				template: '<div class="modal-box"><div class="modal-inner"><div class="modal-title"><a class="ut-close-btn">X</a></div><div class="modal-text"></div><div class="modal-buttons"></div></div></div>',
				_classes: {
					box: ".modal-box",
					boxInner: ".modal-inner",
					title: ".modal-title",
					content: ".modal-text",
					buttons: ".modal-buttons",
					closebtn: ".ut-close-btn"
				}
			},
			t = e.extend({}, n, t),
			r, i = e("<div id='modal-window' />").hide(),
			s = t._classes.box,
			o = i.append(t.template),
			u = {
				init: function() {
					e("#modal-window").remove();
					u._setStyle();
					u._modalShow();
					u._modalConent();
					i.on("click", "a.ut-ui-button", function(t) {
						u._modalBtn(e(this))
					}).on("click", t._classes.closebtn, function(e) {
                        r = false;
						u._modalHide()
					}).click(function(e) {
						if (t.closeClick) {
							if (e.target.id == "modal-window") {
                                r = false;
								u._modalHide()
							}
						}
					});
					e(window).bind("keyup", u._keyUpF).resize(function() {
						var e = t.animate;
						t.animate = false;
						u._position();
						t.animate = e
					})
				},
				_setStyle: function() {
					i.css({
						position: "fixed",
						width: "100%",
						height: "100%",
						top: "0",
						left: "0",
						"z-index": t.zIndex,
						overflow: "auto"
					});
					i.find(t._classes.box).css({
						position: "absolute"
					});
				},
				_keyUpF: function(e) {
					switch (e.keyCode) {
						case 13:
							if (o.find("input:not(.modal-prompt-input),textarea").is(":focus")) {
								return false
							}
							u._modalBtn(i.find(t._classes.buttons + " a.ut-ui-button" + (typeof u.btnForEKey !== "undefined" && i.find(t._classes.buttons + " a.ut-ui-button:eq(" + u.btnForEKey + ")").size() > 0 ? ":eq(" + u.btnForEKey + ")" : ":last-child")));
							break;
						case 27:
							u._modalHide();
							break
					}
				},
				_modalShow: function() {
					e("body").css({
						//overflow: "hidden",
						width: e("body").innerWidth()
					}).append(o);
				},
				_modalHide: function(n) {
					if (t.closable === false) {
						return false
					}
					r = typeof r == "undefined" ? false : r;
					var o = function() {
						if (t.callback != null && typeof(t.callback) == "function" ? t.callback(r, i, u.actions) == false ? false : true : true) {
							i.fadeOut(200, function() {
								e(this).remove();
								e("body").css({
									overflow: "",
									width: ""
								})
							});
							var n = 100 * parseFloat(e(s).css("top")) / parseFloat(e(s).parent().css("height"));
							e(s).stop(true, true);
						}
					};
					if (!n) {
						o()
					} else {
						setTimeout(function() {
							o()
						}, n)
					}
					e(window).unbind("keyup", u._keyUpF)
				},
				_modalConent: function() {
					var n = t._classes.title,
						r = t._classes.content,
						o = t._classes.buttons,
						a = t.buttonText,
						f = ["alert", "confirm", "prompt"],
						l = ["xenon", "atlant", "reseted"];
					if (e.inArray(t.type, f) == -1 && t.type != "default") {
						e(s).addClass("modal-type-" + t.type)
					}
					if (t.size && t.size != null) {
						e(s).addClass("modal-size-" + t.size)
					} else {
						e(s).addClass("modal-size-normal")
					}
					if (t.theme && t.theme != null && t.theme != "default") {
						e(s).addClass((e.inArray(t.theme, l) == -1 ? "" : "modal-theme-") + t.theme)
					}
					if (t.background && t.background != null) {
						i.css("background-color", t.background)
					}
					if (t.title || t.title != null) {
						e(n).prepend("<h3>" + t.title + "</h3>")
					} else {
						e(n).remove()
					}
					t.type == "prompt" ? t.text = (t.text != null ? t.text : "") + '<input type="text" name="modal-prompt-input" class="modal-prompt-input" autocomplete="off" autofocus="on" />' : "";
					e(r).html(t.text);
					if (t.buttons || t.buttons != null) {
						var c = "";
						switch (t.type) {
							case "alert":
								c = '<a class="ut-ui-button' + (t.buttons[0].addClass ? " " + t.buttons[0].addClass : "") + '">' + a.ok + "</a>";
								break;
							case "confirm":
								c = '<a class="ut-ui-button' + (t.buttons[0].addClass ? " " + t.buttons[0].addClass : "") + '">' + a.cancel + '</a><a class="ut-ui-button ' + (t.buttons[1] && t.buttons[1].addClass ? " " + t.buttons[1].addClass : "btn-light-blue") + '">' + a.yes + "</a>";
								break;
							case "prompt":
								c = '<a class="ut-ui-button' + (t.buttons[0].addClass ? " " + t.buttons[0].addClass : "") + '">' + a.cancel + '</a><a class="ut-ui-button ' + (t.buttons[1] && t.buttons[1].addClass ? " " + t.buttons[1].addClass : "btn-light-blue") + '">' + a.ok + "</a>";
								break;
							default:
								if (t.buttons.length > 0 && e.isArray(t.buttons)) {
									e.each(t.buttons, function(e, t) {
										var n = t["addClass"] && typeof t["addClass"] != "undefined" ? " " + t["addClass"] : "";
										c += '<a class="ut-ui-button' + n + '">' + t["text"] + "</a>";
										if (t["eKey"]) {
											u.btnForEKey = e
										}
									})
								} else {
									c += '<a class="ut-ui-button">' + a.ok + "</a>"
								}
						}
						e(o).html(c)
					} else {
						e(o).remove()
					}
					if (t.type == "prompt") {
						$(".modal-prompt-input").focus()
					}
					if (t.autoclose) {
						var h = t.buttons || t.buttons != null ? e(r).text().length * 32 : 900;
						u._modalHide(h < 900 ? 900 : h)
					}
					i.fadeIn(200, function(){
                        t.onShow != null ? t.onShow(u.actions) : null;
                    });
					u._position();
				},
				_position: function() {
					var n, r, i;
					if (t.center) {
						n = {
							top: e(window).height() < e(s).outerHeight() ? 1 : 50,
							left: 50,
							marginTop: e(window).height() < e(s).outerHeight() ? 0 : -e(s).outerHeight() / 2,
							marginLeft: -e(s).outerWidth() / 2
						}, r = {
							top: n.top - (t.animate ? 3 : 0) + "%",
							left: n.left + "%",
							"margin-top": n.marginTop,
							"margin-left": n.marginLeft
						}, i = {
							top: n.top + "%"
						};
					} else {
						n = {
							top: e(window).height() < e(s).outerHeight() ? 1 : 10,
							left: 50,
							marginTop: 0,
							marginLeft: -e(s).outerWidth() / 2
						}, r = {
							top: n.top - (t.animate ? 3 : 0) + "%",
							left: n.left + "%",
							"margin-top": n.marginTop,
							"margin-left": n.marginLeft
						}, i = {
							top: n.top + "%"
						};
					}
					e(s).css(r).stop(true, true).css(i);
				},
				_modalBtn: function(n) {
					var s = false,
						o = t.type,
						a = n.index(),
						f = t.buttons[a];
					if (e.inArray(o, ["alert", "confirm", "prompt"]) > -1) {
						r = s = a == 1 ? true : false;
						if (o == "prompt") {
							r = s = s && i.find("input.modal-prompt-input").size() > 0 != 0 ? i.find("input.modal-prompt-input").val() : false
						}
						u._modalHide()
					} else {
						if (n.hasClass("btn-disabled")) {
							return false
						}
						r = s = f && f["val"] ? f["val"] : true;
						if (!f["onClick"] || f["onClick"](e.extend({
								val: s,
								bObj: n,
								bOpts: f,
							}, u.actions))) {
							u._modalHide()
						}
					}
					r = s
				},
				actions: {
					html: i,
					close: function() {
						u._modalHide()
					},
					getModal: function() {
						return i
					},
					getBox: function() {
						return i.find(t._classes.box)
					},
					getInner: function() {
						return i.find(t._classes.boxInner)
					},
					getTitle: function() {
						return i.find(t._classes.title)
					},
					getContet: function() {
						return i.find(t._classes.content)
					},
					getButtons: function() {
						return i.find(t._classes.buttons).find("a")
					},
					setTitle: function(e) {
						i.find(t._classes.title + " h3").html(e);
						return i.find(t._classes.title + " h3").size() > 0
					},
					setContent: function(e) {
						i.find(t._classes.content).html(e);
						return i.find(t._classes.content).size() > 0
					}
				}
			};
		u.init();
		return u.actions;
	}
})(jQuery);



/*
 * jQuery MiniColors: A tiny color picker built on jQuery
 *
 * Copyright: Cory LaViska for A Beautiful Site, LLC: http://www.abeautifulsite.net/
 *
 * Contribute: https://github.com/claviska/jquery-minicolors
 *
 * @license: http://opensource.org/licenses/MIT
 *
 */
(function (factory) {
    /* jshint ignore:start */
    if (typeof define === 'function' && define.amd) {
        // AMD. Register as an anonymous module.
        define(['jquery'], factory);
    } else if (typeof exports === 'object') {
        // Node/CommonJS
        module.exports = factory(require('jquery'));
    } else {
        // Browser globals
        factory(jQuery);
    }
    /* jshint ignore:end */
}(function ($) {

    'use strict';

    // Defaults
    $.minicolors = {
        defaults: {
            animationSpeed: 50,
            animationEasing: 'swing',
            change: null,
            changeDelay: 0,
            control: 'hue',
            dataUris: true,
            defaultValue: '',
            format: 'hex',
            hide: null,
            hideSpeed: 100,
            inline: false,
            keywords: '',
            letterCase: 'lowercase',
            opacity: false,
            position: 'bottom left',
            show: null,
            showSpeed: 100,
            theme: 'default',
            swatches: []
        }
    };

    // Public methods
    $.extend($.fn, {
        minicolors: function(method, data) {

            switch(method) {

                // Destroy the control
                case 'destroy':
                    $(this).each( function() {
                        destroy($(this));
                    });
                    return $(this);

                // Hide the color picker
                case 'hide':
                    hide();
                    return $(this);

                // Get/set opacity
                case 'opacity':
                    // Getter
                    if( data === undefined ) {
                        // Getter
                        return $(this).attr('data-opacity');
                    } else {
                        // Setter
                        $(this).each( function() {
                            updateFromInput($(this).attr('data-opacity', data));
                        });
                    }
                    return $(this);

                // Get an RGB(A) object based on the current color/opacity
                case 'rgbObject':
                    return rgbObject($(this), method === 'rgbaObject');

                // Get an RGB(A) string based on the current color/opacity
                case 'rgbString':
                case 'rgbaString':
                    return rgbString($(this), method === 'rgbaString');

                // Get/set settings on the fly
                case 'settings':
                    if( data === undefined ) {
                        return $(this).data('minicolors-settings');
                    } else {
                        // Setter
                        $(this).each( function() {
                            var settings = $(this).data('minicolors-settings') || {};
                            destroy($(this));
                            $(this).minicolors($.extend(true, settings, data));
                        });
                    }
                    return $(this);

                // Show the color picker
                case 'show':
                    show( $(this).eq(0) );
                    return $(this);

                // Get/set the hex color value
                case 'value':
                    if( data === undefined ) {
                        // Getter
                        return $(this).val();
                    } else {
                        // Setter
                        $(this).each( function() {
                            if( typeof(data) === 'object' && typeof(data) !== null ) {
                                if( data.opacity ) {
                                    $(this).attr('data-opacity', keepWithin(data.opacity, 0, 1));
                                }
                                if( data.color ) {
                                    $(this).val(data.color);
                                }
                            } else {
                                $(this).val(data);
                            }
                            updateFromInput($(this));
                        });
                    }
                    return $(this);

                // Initializes the control
                default:
                    if( method !== 'create' ) data = method;
                    $(this).each( function() {
                        init($(this), data);
                    });
                    return $(this);

            }

        }
    });

    // Initialize input elements
    function init(input, settings) {

        var minicolors = $('<div class="minicolors" />'),
            defaults = $.minicolors.defaults,
            size,
            swatches,
            swatch,
            panel,
            i;

        // Do nothing if already initialized
        if( input.data('minicolors-initialized') ) return;

        // Handle settings
        settings = $.extend(true, {}, defaults, settings);

        // The wrapper
        minicolors
            .addClass('minicolors-theme-' + settings.theme)
            .toggleClass('minicolors-with-opacity', settings.opacity)
            .toggleClass('minicolors-no-data-uris', settings.dataUris !== true);

        // Custom positioning
        if( settings.position !== undefined ) {
            $.each(settings.position.split(' '), function() {
                minicolors.addClass('minicolors-position-' + this);
            });
        }

        // Input size
        if( settings.format === 'rgb' ) {
            size = settings.opacity ? '25' : '20';
        } else {
            size = settings.keywords ? '11' : '7';
        }

        // The input
        input
            .addClass('minicolors-input')
            .data('minicolors-initialized', false)
            .data('minicolors-settings', settings)
            .prop('size', size)
            .wrap(minicolors)
            .after(
                '<div class="minicolors-panel minicolors-slider-' + settings.control + '">' +
                    '<div class="minicolors-slider minicolors-sprite">' +
                        '<div class="minicolors-picker"></div>' +
                    '</div>' +
                    '<div class="minicolors-opacity-slider minicolors-sprite">' +
                        '<div class="minicolors-picker"></div>' +
                    '</div>' +
                    '<div class="minicolors-grid minicolors-sprite">' +
                        '<div class="minicolors-grid-inner"></div>' +
                        '<div class="minicolors-picker"><div></div></div>' +
                    '</div>' +
                '</div>'
            );

        // The swatch
        if( !settings.inline ) {
            input.after('<span class="minicolors-swatch minicolors-sprite minicolors-input-swatch"><span class="minicolors-swatch-color"></span></span>');
            input.next('.minicolors-input-swatch').on('click', function(event) {
                event.preventDefault();
                input.focus();
            });
        }

        // Prevent text selection in IE
        panel = input.parent().find('.minicolors-panel');
        panel.on('selectstart', function() { return false; }).end();

        // Swatches
        if (settings.swatches && settings.swatches.length !== 0) {
            if (settings.swatches.length > 7) {
                settings.swatches.length = 7;
            }
            panel.addClass('minicolors-with-swatches');
            swatches = $('<ul class="minicolors-swatches"></ul>')
                .appendTo(panel);
            for(i = 0; i < settings.swatches.length; ++i) {
                swatch = settings.swatches[i];
                swatch = isRgb(swatch) ? parseRgb(swatch, true) : hex2rgb(parseHex(swatch, true));
                $('<li class="minicolors-swatch minicolors-sprite"><span class="minicolors-swatch-color"></span></li>')
                    .appendTo(swatches)
                    .data('swatch-color', settings.swatches[i])
                    .find('.minicolors-swatch-color')
                    .css({
                        backgroundColor: rgb2hex(swatch),
                        opacity: swatch.a
                    });
                settings.swatches[i] = swatch;
            }

        }

        // Inline controls
        if( settings.inline ) input.parent().addClass('minicolors-inline');

        updateFromInput(input, false);

        input.data('minicolors-initialized', true);

    }

    // Returns the input back to its original state
    function destroy(input) {

        var minicolors = input.parent();

        // Revert the input element
        input
            .removeData('minicolors-initialized')
            .removeData('minicolors-settings')
            .removeProp('size')
            .removeClass('minicolors-input');

        // Remove the wrap and destroy whatever remains
        minicolors.before(input).remove();

    }

    // Shows the specified dropdown panel
    function show(input) {

        var minicolors = input.parent(),
            panel = minicolors.find('.minicolors-panel'),
            settings = input.data('minicolors-settings');

        // Do nothing if uninitialized, disabled, inline, or already open
        if( !input.data('minicolors-initialized') ||
            input.prop('disabled') ||
            minicolors.hasClass('minicolors-inline') ||
            minicolors.hasClass('minicolors-focus')
        ) return;

        hide();

        minicolors.addClass('minicolors-focus');
        panel
            .stop(true, true)
            .fadeIn(settings.showSpeed, function() {
                if( settings.show ) settings.show.call(input.get(0));
            });

    }

    // Hides all dropdown panels
    function hide() {

        $('.minicolors-focus').each( function() {

            var minicolors = $(this),
                input = minicolors.find('.minicolors-input'),
                panel = minicolors.find('.minicolors-panel'),
                settings = input.data('minicolors-settings');

            panel.fadeOut(settings.hideSpeed, function() {
                if( settings.hide ) settings.hide.call(input.get(0));
                minicolors.removeClass('minicolors-focus');
            });

        });
    }

    // Moves the selected picker
    function move(target, event, animate) {

        var input = target.parents('.minicolors').find('.minicolors-input'),
            settings = input.data('minicolors-settings'),
            picker = target.find('[class$=-picker]'),
            offsetX = target.offset().left,
            offsetY = target.offset().top,
            x = Math.round(event.pageX - offsetX),
            y = Math.round(event.pageY - offsetY),
            duration = animate ? settings.animationSpeed : 0,
            wx, wy, r, phi;

        // Touch support
        if( event.originalEvent.changedTouches ) {
            x = event.originalEvent.changedTouches[0].pageX - offsetX;
            y = event.originalEvent.changedTouches[0].pageY - offsetY;
        }

        // Constrain picker to its container
        if( x < 0 ) x = 0;
        if( y < 0 ) y = 0;
        if( x > target.width() ) x = target.width();
        if( y > target.height() ) y = target.height();

        // Constrain color wheel values to the wheel
        if( target.parent().is('.minicolors-slider-wheel') && picker.parent().is('.minicolors-grid') ) {
            wx = 75 - x;
            wy = 75 - y;
            r = Math.sqrt(wx * wx + wy * wy);
            phi = Math.atan2(wy, wx);
            if( phi < 0 ) phi += Math.PI * 2;
            if( r > 75 ) {
                r = 75;
                x = 75 - (75 * Math.cos(phi));
                y = 75 - (75 * Math.sin(phi));
            }
            x = Math.round(x);
            y = Math.round(y);
        }

        // Move the picker
        if( target.is('.minicolors-grid') ) {
            picker
                .stop(true)
                .animate({
                    top: y + 'px',
                    left: x + 'px'
                }, duration, settings.animationEasing, function() {
                    updateFromControl(input, target);
                });
        } else {
            picker
                .stop(true)
                .animate({
                    top: y + 'px'
                }, duration, settings.animationEasing, function() {
                    updateFromControl(input, target);
                });
        }

    }

    // Sets the input based on the color picker values
    function updateFromControl(input, target) {

        function getCoords(picker, container) {

            var left, top;
            if( !picker.length || !container ) return null;
            left = picker.offset().left;
            top = picker.offset().top;

            return {
                x: left - container.offset().left + (picker.outerWidth() / 2),
                y: top - container.offset().top + (picker.outerHeight() / 2)
            };

        }

        var hue, saturation, brightness, x, y, r, phi,

            hex = input.val(),
            opacity = input.attr('data-opacity'),

            // Helpful references
            minicolors = input.parent(),
            settings = input.data('minicolors-settings'),
            swatch = minicolors.find('.minicolors-input-swatch'),

            // Panel objects
            grid = minicolors.find('.minicolors-grid'),
            slider = minicolors.find('.minicolors-slider'),
            opacitySlider = minicolors.find('.minicolors-opacity-slider'),

            // Picker objects
            gridPicker = grid.find('[class$=-picker]'),
            sliderPicker = slider.find('[class$=-picker]'),
            opacityPicker = opacitySlider.find('[class$=-picker]'),

            // Picker positions
            gridPos = getCoords(gridPicker, grid),
            sliderPos = getCoords(sliderPicker, slider),
            opacityPos = getCoords(opacityPicker, opacitySlider);

        // Handle colors
        if( target.is('.minicolors-grid, .minicolors-slider, .minicolors-opacity-slider') ) {

            // Determine HSB values
            switch(settings.control) {

                case 'wheel':
                    // Calculate hue, saturation, and brightness
                    x = (grid.width() / 2) - gridPos.x;
                    y = (grid.height() / 2) - gridPos.y;
                    r = Math.sqrt(x * x + y * y);
                    phi = Math.atan2(y, x);
                    if( phi < 0 ) phi += Math.PI * 2;
                    if( r > 75 ) {
                        r = 75;
                        gridPos.x = 69 - (75 * Math.cos(phi));
                        gridPos.y = 69 - (75 * Math.sin(phi));
                    }
                    saturation = keepWithin(r / 0.75, 0, 100);
                    hue = keepWithin(phi * 180 / Math.PI, 0, 360);
                    brightness = keepWithin(100 - Math.floor(sliderPos.y * (100 / slider.height())), 0, 100);
                    hex = hsb2hex({
                        h: hue,
                        s: saturation,
                        b: brightness
                    });

                    // Update UI
                    slider.css('backgroundColor', hsb2hex({ h: hue, s: saturation, b: 100 }));
                    break;

                case 'saturation':
                    // Calculate hue, saturation, and brightness
                    hue = keepWithin(parseInt(gridPos.x * (360 / grid.width()), 10), 0, 360);
                    saturation = keepWithin(100 - Math.floor(sliderPos.y * (100 / slider.height())), 0, 100);
                    brightness = keepWithin(100 - Math.floor(gridPos.y * (100 / grid.height())), 0, 100);
                    hex = hsb2hex({
                        h: hue,
                        s: saturation,
                        b: brightness
                    });

                    // Update UI
                    slider.css('backgroundColor', hsb2hex({ h: hue, s: 100, b: brightness }));
                    minicolors.find('.minicolors-grid-inner').css('opacity', saturation / 100);
                    break;

                case 'brightness':
                    // Calculate hue, saturation, and brightness
                    hue = keepWithin(parseInt(gridPos.x * (360 / grid.width()), 10), 0, 360);
                    saturation = keepWithin(100 - Math.floor(gridPos.y * (100 / grid.height())), 0, 100);
                    brightness = keepWithin(100 - Math.floor(sliderPos.y * (100 / slider.height())), 0, 100);
                    hex = hsb2hex({
                        h: hue,
                        s: saturation,
                        b: brightness
                    });

                    // Update UI
                    slider.css('backgroundColor', hsb2hex({ h: hue, s: saturation, b: 100 }));
                    minicolors.find('.minicolors-grid-inner').css('opacity', 1 - (brightness / 100));
                    break;

                default:
                    // Calculate hue, saturation, and brightness
                    hue = keepWithin(360 - parseInt(sliderPos.y * (360 / slider.height()), 10), 0, 360);
                    saturation = keepWithin(Math.floor(gridPos.x * (100 / grid.width())), 0, 100);
                    brightness = keepWithin(100 - Math.floor(gridPos.y * (100 / grid.height())), 0, 100);
                    hex = hsb2hex({
                        h: hue,
                        s: saturation,
                        b: brightness
                    });

                    // Update UI
                    grid.css('backgroundColor', hsb2hex({ h: hue, s: 100, b: 100 }));
                    break;

            }

            // Handle opacity
            if( settings.opacity ) {
                opacity = parseFloat(1 - (opacityPos.y / opacitySlider.height())).toFixed(2);
            } else {
                opacity = 1;
            }

            updateInput(input, hex, opacity);
        }
        else {
            // Set swatch color
            swatch.find('span').css({
                backgroundColor: hex,
                opacity: opacity
            });

            // Handle change event
            doChange(input, hex, opacity);
        }
    }

    // Sets the value of the input and does the appropriate conversions
    // to respect settings, also updates the swatch
    function updateInput(input, value, opacity) {
        var rgb,

        // Helpful references
        minicolors = input.parent(),
        settings = input.data('minicolors-settings'),
        swatch = minicolors.find('.minicolors-input-swatch');

        if( settings.opacity ) input.attr('data-opacity', opacity);

        // Set color string
        if( settings.format === 'rgb' ) {
            // Returns RGB(A) string

            // Checks for input format and does the conversion
            if ( isRgb(value) ) {
                rgb = parseRgb(value, true);
            }
            else {
                rgb = hex2rgb(parseHex(value, true));
            }

            opacity = input.attr('data-opacity') === '' ? 1 : keepWithin( parseFloat( input.attr('data-opacity') ).toFixed(2), 0, 1 );
            if( isNaN( opacity ) || !settings.opacity ) opacity = 1;

            if( input.minicolors('rgbObject').a <= 1 && rgb && settings.opacity) {
                // Set RGBA string if alpha
                value = 'rgba(' + rgb.r + ', ' + rgb.g + ', ' + rgb.b + ', ' + parseFloat( opacity ) + ')';
            } else {
                // Set RGB string (alpha = 1)
                value = 'rgb(' + rgb.r + ', ' + rgb.g + ', ' + rgb.b + ')';
            }
        } else {
            // Returns hex color

            // Checks for input format and does the conversion
            if ( isRgb(value) ) {
                value = rgbString2hex(value);
            }

            value = convertCase( value, settings.letterCase );
        }

        // Update value from picker
        input.val( value );

        // Set swatch color
        swatch.find('span').css({
            backgroundColor: value,
            opacity: opacity
        });

        // Handle change event
        doChange(input, value, opacity);
    }

    // Sets the color picker values from the input
    function updateFromInput(input, preserveInputValue) {

        var hex,
            hsb,
            opacity,
            keywords,
            alpha,
            value,
            x, y, r, phi,

            // Helpful references
            minicolors = input.parent(),
            settings = input.data('minicolors-settings'),
            swatch = minicolors.find('.minicolors-input-swatch'),

            // Panel objects
            grid = minicolors.find('.minicolors-grid'),
            slider = minicolors.find('.minicolors-slider'),
            opacitySlider = minicolors.find('.minicolors-opacity-slider'),

            // Picker objects
            gridPicker = grid.find('[class$=-picker]'),
            sliderPicker = slider.find('[class$=-picker]'),
            opacityPicker = opacitySlider.find('[class$=-picker]');

        // Determine hex/HSB values
        if( isRgb(input.val()) ) {
            // If input value is a rgb(a) string, convert it to hex color and update opacity
            hex = rgbString2hex(input.val());
            alpha = keepWithin(parseFloat(getAlpha(input.val())).toFixed(2), 0, 1);
            if( alpha ) {
                input.attr('data-opacity', alpha);
            }
        } else {
            hex = convertCase(parseHex(input.val(), true), settings.letterCase);
        }

        if( !hex ){
            hex = convertCase(parseInput(settings.defaultValue, true), settings.letterCase);
        }
        hsb = hex2hsb(hex);

        // Get array of lowercase keywords
        keywords = !settings.keywords ? [] : $.map(settings.keywords.split(','), function(a) {
            return $.trim(a.toLowerCase());
        });

        // Set color string
        if( input.val() !== '' && $.inArray(input.val().toLowerCase(), keywords) > -1 ) {
            value = convertCase(input.val());
        } else {
            value = isRgb(input.val()) ? parseRgb(input.val()) : hex;
        }

        // Update input value
        if( !preserveInputValue ) input.val(value);

        // Determine opacity value
        if( settings.opacity ) {
            // Get from data-opacity attribute and keep within 0-1 range
            opacity = input.attr('data-opacity') === '' ? 1 : keepWithin(parseFloat(input.attr('data-opacity')).toFixed(2), 0, 1);
            if( isNaN(opacity) ) opacity = 1;
            input.attr('data-opacity', opacity);
            swatch.find('span').css('opacity', opacity);

            // Set opacity picker position
            y = keepWithin(opacitySlider.height() - (opacitySlider.height() * opacity), 0, opacitySlider.height());
            opacityPicker.css('top', y + 'px');
        }

        // Set opacity to zero if input value is transparent
        if( input.val().toLowerCase() === 'transparent' ) {
            swatch.find('span').css('opacity', 0);
        }

        // Update swatch
        swatch.find('span').css('backgroundColor', hex);

        // Determine picker locations
        switch(settings.control) {

            case 'wheel':
                // Set grid position
                r = keepWithin(Math.ceil(hsb.s * 0.75), 0, grid.height() / 2);
                phi = hsb.h * Math.PI / 180;
                x = keepWithin(75 - Math.cos(phi) * r, 0, grid.width());
                y = keepWithin(75 - Math.sin(phi) * r, 0, grid.height());
                gridPicker.css({
                    top: y + 'px',
                    left: x + 'px'
                });

                // Set slider position
                y = 150 - (hsb.b / (100 / grid.height()));
                if( hex === '' ) y = 0;
                sliderPicker.css('top', y + 'px');

                // Update panel color
                slider.css('backgroundColor', hsb2hex({ h: hsb.h, s: hsb.s, b: 100 }));
                break;

            case 'saturation':
                // Set grid position
                x = keepWithin((5 * hsb.h) / 12, 0, 150);
                y = keepWithin(grid.height() - Math.ceil(hsb.b / (100 / grid.height())), 0, grid.height());
                gridPicker.css({
                    top: y + 'px',
                    left: x + 'px'
                });

                // Set slider position
                y = keepWithin(slider.height() - (hsb.s * (slider.height() / 100)), 0, slider.height());
                sliderPicker.css('top', y + 'px');

                // Update UI
                slider.css('backgroundColor', hsb2hex({ h: hsb.h, s: 100, b: hsb.b }));
                minicolors.find('.minicolors-grid-inner').css('opacity', hsb.s / 100);
                break;

            case 'brightness':
                // Set grid position
                x = keepWithin((5 * hsb.h) / 12, 0, 150);
                y = keepWithin(grid.height() - Math.ceil(hsb.s / (100 / grid.height())), 0, grid.height());
                gridPicker.css({
                    top: y + 'px',
                    left: x + 'px'
                });

                // Set slider position
                y = keepWithin(slider.height() - (hsb.b * (slider.height() / 100)), 0, slider.height());
                sliderPicker.css('top', y + 'px');

                // Update UI
                slider.css('backgroundColor', hsb2hex({ h: hsb.h, s: hsb.s, b: 100 }));
                minicolors.find('.minicolors-grid-inner').css('opacity', 1 - (hsb.b / 100));
                break;

            default:
                // Set grid position
                x = keepWithin(Math.ceil(hsb.s / (100 / grid.width())), 0, grid.width());
                y = keepWithin(grid.height() - Math.ceil(hsb.b / (100 / grid.height())), 0, grid.height());
                gridPicker.css({
                    top: y + 'px',
                    left: x + 'px'
                });

                // Set slider position
                y = keepWithin(slider.height() - (hsb.h / (360 / slider.height())), 0, slider.height());
                sliderPicker.css('top', y + 'px');

                // Update panel color
                grid.css('backgroundColor', hsb2hex({ h: hsb.h, s: 100, b: 100 }));
                break;

        }

        // Fire change event, but only if minicolors is fully initialized
        if( input.data('minicolors-initialized') ) {
            doChange(input, value, opacity);
        }

    }

    // Runs the change and changeDelay callbacks
    function doChange(input, value, opacity) {

        var settings = input.data('minicolors-settings'),
            lastChange = input.data('minicolors-lastChange'),
            obj,
            sel,
            i;

        // Only run if it actually changed
        if( !lastChange || lastChange.value !== value || lastChange.opacity !== opacity ) {

            // Remember last-changed value
            input.data('minicolors-lastChange', {
                value: value,
                opacity: opacity
            });

            // Check and select applicable swatch
            if (settings.swatches && settings.swatches.length !== 0) {
                if(!isRgb(value)) {
                    obj = hex2rgb(value);
                }
                else {
                    obj = parseRgb(value, true);
                }
                sel = -1;
                for(i = 0; i < settings.swatches.length; ++i) {
                    if (obj.r === settings.swatches[i].r && obj.g === settings.swatches[i].g && obj.b === settings.swatches[i].b && obj.a === settings.swatches[i].a) {
                        sel = i;
                        break;
                    }
                }

                input.parent().find('.minicolors-swatches .minicolors-swatch').removeClass('selected');
                if (i !== -1) {
                    input.parent().find('.minicolors-swatches .minicolors-swatch').eq(i).addClass('selected');
                }
            }

            // Fire change event
            if( settings.change ) {
                if( settings.changeDelay ) {
                    // Call after a delay
                    clearTimeout(input.data('minicolors-changeTimeout'));
                    input.data('minicolors-changeTimeout', setTimeout( function() {
                        settings.change.call(input.get(0), value, opacity);
                    }, settings.changeDelay));
                } else {
                    // Call immediately
                    settings.change.call(input.get(0), value, opacity);
                }
            }
            input.trigger('change').trigger('input');
        }

    }

    // Generates an RGB(A) object based on the input's value
    function rgbObject(input) {
        var hex = parseHex($(input).val(), true),
            rgb = hex2rgb(hex),
            opacity = $(input).attr('data-opacity');
        if( !rgb ) return null;
        if( opacity !== undefined ) $.extend(rgb, { a: parseFloat(opacity) });
        return rgb;
    }

    // Generates an RGB(A) string based on the input's value
    function rgbString(input, alpha) {
        var hex = parseHex($(input).val(), true),
            rgb = hex2rgb(hex),
            opacity = $(input).attr('data-opacity');
        if( !rgb ) return null;
        if( opacity === undefined ) opacity = 1;
        if( alpha ) {
            return 'rgba(' + rgb.r + ', ' + rgb.g + ', ' + rgb.b + ', ' + parseFloat(opacity) + ')';
        } else {
            return 'rgb(' + rgb.r + ', ' + rgb.g + ', ' + rgb.b + ')';
        }
    }

    // Converts to the letter case specified in settings
    function convertCase(string, letterCase) {
        return letterCase === 'uppercase' ? string.toUpperCase() : string.toLowerCase();
    }

    // Parses a string and returns a valid hex string when possible
    function parseHex(string, expand) {
        string = string.replace(/^#/g, '');
        if( !string.match(/^[A-F0-9]{3,6}/ig) ) return '';
        if( string.length !== 3 && string.length !== 6 ) return '';
        if( string.length === 3 && expand ) {
            string = string[0] + string[0] + string[1] + string[1] + string[2] + string[2];
        }
        return '#' + string;
    }

    // Parses a string and returns a valid RGB(A) string when possible
    function parseRgb(string, obj) {

        var values = string.replace(/[^\d,.]/g, ''),
            rgba = values.split(',');

        rgba[0] = keepWithin(parseInt(rgba[0], 10), 0, 255);
        rgba[1] = keepWithin(parseInt(rgba[1], 10), 0, 255);
        rgba[2] = keepWithin(parseInt(rgba[2], 10), 0, 255);
        if( rgba[3] ) {
            rgba[3] = keepWithin(parseFloat(rgba[3], 10), 0, 1);
        }

        // Return RGBA object
        if( obj ) {
            return {
                r: rgba[0],
                g: rgba[1],
                b: rgba[2],
                a: rgba[3] ? rgba[3] : null
            };
        }

        // Return RGBA string
        if( typeof(rgba[3]) !== 'undefined' && rgba[3] <= 1 ) {
            return 'rgba(' + rgba[0] + ', ' + rgba[1] + ', ' + rgba[2] + ', ' + rgba[3] + ')';
        } else {
            return 'rgb(' + rgba[0] + ', ' + rgba[1] + ', ' + rgba[2] + ')';
        }

    }

    // Parses a string and returns a valid color string when possible
    function parseInput(string, expand) {
        if( isRgb(string) ) {
            // Returns a valid rgb(a) string
            return parseRgb(string);
        } else {

            return parseHex(string, expand);
        }
    }

    // Keeps value within min and max
    function keepWithin(value, min, max) {
        if( value < min ) value = min;
        if( value > max ) value = max;
        return value;
    }

    // Checks if a string is a valid RGB(A) string
    function isRgb(string) {
        var rgb = string.match(/^rgba?[\s+]?\([\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?/i);
        return (rgb && rgb.length === 4) ? true : false;
    }

    // Function to get alpha from a RGB(A) string
    function getAlpha(rgba) {
        rgba = rgba.match(/^rgba?[\s+]?\([\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?,[\s+]?(\d+(\.\d{1,2})?|\.\d{1,2})[\s+]?/i);
        return (rgba && rgba.length === 6) ? rgba[4] : '1';
    }

   // Converts an HSB object to an RGB object
    function hsb2rgb(hsb) {
        var rgb = {};
        var h = Math.round(hsb.h);
        var s = Math.round(hsb.s * 255 / 100);
        var v = Math.round(hsb.b * 255 / 100);
        if(s === 0) {
            rgb.r = rgb.g = rgb.b = v;
        } else {
            var t1 = v;
            var t2 = (255 - s) * v / 255;
            var t3 = (t1 - t2) * (h % 60) / 60;
            if( h === 360 ) h = 0;
            if( h < 60 ) { rgb.r = t1; rgb.b = t2; rgb.g = t2 + t3; }
            else if( h < 120 ) {rgb.g = t1; rgb.b = t2; rgb.r = t1 - t3; }
            else if( h < 180 ) {rgb.g = t1; rgb.r = t2; rgb.b = t2 + t3; }
            else if( h < 240 ) {rgb.b = t1; rgb.r = t2; rgb.g = t1 - t3; }
            else if( h < 300 ) {rgb.b = t1; rgb.g = t2; rgb.r = t2 + t3; }
            else if( h < 360 ) {rgb.r = t1; rgb.g = t2; rgb.b = t1 - t3; }
            else { rgb.r = 0; rgb.g = 0; rgb.b = 0; }
        }
        return {
            r: Math.round(rgb.r),
            g: Math.round(rgb.g),
            b: Math.round(rgb.b)
        };
    }

    // Converts an RGB string to a hex string
    function rgbString2hex(rgb){
        rgb = rgb.match(/^rgba?[\s+]?\([\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?/i);
        return (rgb && rgb.length === 4) ? '#' +
        ('0' + parseInt(rgb[1],10).toString(16)).slice(-2) +
        ('0' + parseInt(rgb[2],10).toString(16)).slice(-2) +
        ('0' + parseInt(rgb[3],10).toString(16)).slice(-2) : '';
    }

    // Converts an RGB object to a hex string
    function rgb2hex(rgb) {
        var hex = [
            rgb.r.toString(16),
            rgb.g.toString(16),
            rgb.b.toString(16)
        ];
        $.each(hex, function(nr, val) {
            if (val.length === 1) hex[nr] = '0' + val;
        });
        return '#' + hex.join('');
    }

    // Converts an HSB object to a hex string
    function hsb2hex(hsb) {
        return rgb2hex(hsb2rgb(hsb));
    }

    // Converts a hex string to an HSB object
    function hex2hsb(hex) {
        var hsb = rgb2hsb(hex2rgb(hex));
        if( hsb.s === 0 ) hsb.h = 360;
        return hsb;
    }

    // Converts an RGB object to an HSB object
    function rgb2hsb(rgb) {
        var hsb = { h: 0, s: 0, b: 0 };
        var min = Math.min(rgb.r, rgb.g, rgb.b);
        var max = Math.max(rgb.r, rgb.g, rgb.b);
        var delta = max - min;
        hsb.b = max;
        hsb.s = max !== 0 ? 255 * delta / max : 0;
        if( hsb.s !== 0 ) {
            if( rgb.r === max ) {
                hsb.h = (rgb.g - rgb.b) / delta;
            } else if( rgb.g === max ) {
                hsb.h = 2 + (rgb.b - rgb.r) / delta;
            } else {
                hsb.h = 4 + (rgb.r - rgb.g) / delta;
            }
        } else {
            hsb.h = -1;
        }
        hsb.h *= 60;
        if( hsb.h < 0 ) {
            hsb.h += 360;
        }
        hsb.s *= 100/255;
        hsb.b *= 100/255;
        return hsb;
    }

    // Converts a hex string to an RGB object
    function hex2rgb(hex) {
        hex = parseInt(((hex.indexOf('#') > -1) ? hex.substring(1) : hex), 16);
        return {
            /* jshint ignore:start */
            r: hex >> 16,
            g: (hex & 0x00FF00) >> 8,
            b: (hex & 0x0000FF)
            /* jshint ignore:end */
        };
    }

    // Handle events
    $(document)
        // Hide on clicks outside of the control
        .on('mousedown.minicolors touchstart.minicolors', function(event) {
            if( !$(event.target).parents().add(event.target).hasClass('minicolors') ) {
                hide();
            }
        })
        // Start moving
        .on('mousedown.minicolors touchstart.minicolors', '.minicolors-grid, .minicolors-slider, .minicolors-opacity-slider', function(event) {
            var target = $(this);
            event.preventDefault();
            $(document).data('minicolors-target', target);
			move(target, event, true);
        })
        // Move pickers
        .on('mousemove.minicolors touchmove.minicolors', function(event) {
            var target = $(document).data('minicolors-target');
            if( target ) move(target, event);
        })
        // Stop moving
        .on('mouseup.minicolors touchend.minicolors', function() {
            $(this).removeData('minicolors-target');
        })
        // Selected a swatch
        .on('click.minicolors', '.minicolors-swatches li', function(event) {
            event.preventDefault();
            var target = $(this), input = target.parents('.minicolors').find('.minicolors-input'), color = target.data('swatch-color');
            updateInput(input, color, getAlpha(color));
            updateFromInput(input);
        })
        // Show panel when swatch is clicked
        .on('mousedown.minicolors touchstart.minicolors', '.minicolors-input-swatch', function(event) {
            var input = $(this).parent().find('.minicolors-input');
            event.preventDefault();
            show(input);
        })
        // Show on focus
        .on('focus.minicolors', '.minicolors-input', function() {
            var input = $(this);
            if( !input.data('minicolors-initialized') ) return;
            show(input);
        })
        // Update value on blur
        .on('blur.minicolors', '.minicolors-input', function() {
            var input = $(this),
                settings = input.data('minicolors-settings'),
                keywords,
                hex,
                rgba,
                swatchOpacity,
                value;

            if( !input.data('minicolors-initialized') ) return;

            // Get array of lowercase keywords
            keywords = !settings.keywords ? [] : $.map(settings.keywords.split(','), function(a) {
                return $.trim(a.toLowerCase());
            });

            // Set color string
            if( input.val() !== '' && $.inArray(input.val().toLowerCase(), keywords) > -1 ) {
                value = input.val();
            } else {
                // Get RGBA values for easy conversion
                if( isRgb(input.val()) ) {
                    rgba = parseRgb(input.val(), true);
                } else {
                    hex = parseHex(input.val(), true);
                    rgba = hex ? hex2rgb(hex) : null;
                }

                // Convert to format
                if( rgba === null ) {
                    value = settings.defaultValue;
                } else if( settings.format === 'rgb' ) {
                    value = settings.opacity ?
                        parseRgb('rgba(' + rgba.r + ',' + rgba.g + ',' + rgba.b + ',' + input.attr('data-opacity') + ')') :
                        parseRgb('rgb(' + rgba.r + ',' + rgba.g + ',' + rgba.b + ')');
                } else {
                    value = rgb2hex(rgba);
                }
            }

            // Update swatch opacity
            swatchOpacity = settings.opacity ? input.attr('data-opacity') : 1;
            if( value.toLowerCase() === 'transparent' ) swatchOpacity = 0;
            input
                .closest('.minicolors')
                .find('.minicolors-input-swatch > span')
                .css('opacity', swatchOpacity);

            // Set input value
            input.val(value);

            // Is it blank?
            if( input.val() === '' ) input.val(parseInput(settings.defaultValue, true));

            // Adjust case
            input.val( convertCase(input.val(), settings.letterCase) );

        })
        // Handle keypresses
        .on('keydown.minicolors', '.minicolors-input', function(event) {
            var input = $(this);
            if( !input.data('minicolors-initialized') ) return;
            switch(event.keyCode) {
                case 9: // tab
                    hide();
                    break;
                case 13: // enter
                case 27: // esc
                    hide();
                    input.blur();
                    break;
            }
        })
        // Update on keyup
        .on('keyup.minicolors', '.minicolors-input', function() {
            var input = $(this);
            if( !input.data('minicolors-initialized') ) return;
            updateFromInput(input, true);
        })
        // Update on paste
        .on('paste.minicolors', '.minicolors-input', function() {
            var input = $(this);
            if( !input.data('minicolors-initialized') ) return;
            setTimeout( function() {
                updateFromInput(input, true);
            }, 1);
        });

}));

/*
 jQuery Form Dependencies v2.0
   http://github.com/digitalnature/Form-Dependencies
*/

(function($, window, document, undefined){

	$.fn.FormDependencies = function( opts ){

		var defaults = {

				// the attribute which contains the rules
				ruleAttr        : 'data-depends-on',

				// if given, this class will be applied to disabled elements
				inactiveClass   : false,

				// attribute used to identify dependencies
				identifyBy      : 'name',

				// callback when inital dependecy is done
				done            : null

			},

			opts = $.extend( defaults, opts ),

			disable = function(e){

				var $e = $(e);
				$e.addClass(opts.inactiveClass);

			},

			enable = function(e){

				var $e = $(e);

				if( $e.hasClass(opts.inactiveClass) ) {

					$e.removeClass(opts.inactiveClass);

				}

			},

			// verifies if conditions are met
			matches = function( key, values, block ){

				var i, v, invert = false, e = $('[' + opts.identifyBy + '="' + key + '"]', block);

				e = e.is(':radio') ? e.filter(':checked') : e;

				for(i = 0; i < values.length; i++){

					v = values[i];
					invert = false;

					if(v[0] === '!'){
						invert = true;
						v = v.substr(1);
					}

					if( ( e.val() === v ) || ( e.is('select') && e.find(":selected").data('global-value') === v ) || ( !v && e.is(':checked') ) ) {
						return !invert;
					}

				}

				return invert;
			},

			split = function(str, chr){
				return $.map(str.split(chr), $.trim);
			};


		var deps_iteration = function( rule, block ) {

			for(var k in rule) {

				if( !matches( k, rule[k] , block ) ){
					return true;
				}

			}

			return false;

		};

		var rules_iteration = function( rules, block , num, numToUpdate ) {

			if( num + 1 > rules.length ) {
				return function(){};
			}

			return function() {

				for( var i = num; i < numToUpdate; i++ ){

					if( rules[i] !== undefined ) {

						var hideIt = deps_iteration( rules[i].deps, block );
						hideIt ? disable( rules[i].target ) : enable( rules[i].target );

						num = i;

					}

				}

				if( num + 1 < rules.length ) {

					requestAnimationFrame( rules_iteration( rules, block, num, numToUpdate + num ) );

				}

			}


		};

		var block    = '',
			rules    = [],
			keys     = [],
			index    = 0,
			chunk    = 20,
			$options = '',
			optionLength = '';

		var process = function() {

			var cnt = chunk;

			while( cnt-- && index < optionLength ) {

				if( typeof $options[index] === "undefined" ) {
					return;
				}

				var deps = $options[index].getAttribute('data-depends-on'), dep, values, parsedDeps = {}, i, invert;

				if (!deps) {
					return $options[index];
				}

				deps = split(deps, '+');

				for( i = 0; i < deps.length; i++ ) {

					dep = deps[i];
					invert = false;

					// reverse conditional check if the name starts with '!'
					// the rules should have any values specified in this case
					if (dep[0] === '!') {
						dep = dep.substr(1);
						invert = true;
					}

					dep = split(dep, ':');
					values = dep[1] || '';

					if (!values && invert)
						values = '!';

					parsedDeps[dep[0]] = split(values, '|');

					var divs = block.querySelectorAll('[name="' + dep[0] + '"]');

					for (var e = 0; e < divs.length; e++) {

						($.inArray(divs[e], keys) !== -1) || keys.push(divs[e]);
						parsedDeps[dep[0]].target = divs[e];

					}

				}

				rules.push({ target: $options[index], selector: $options[index].getAttribute('data-depends-on'), deps: parsedDeps });
				index++;

			}

			if( index + 1 <= optionLength ) {

				setImmediate( function () {

					process();

				});

			} else {

				// attach our state checking function on keys (ie. elements on which other elements depend on)
				$(keys).on('change.FormDependencies keyup', function(){

					requestAnimationFrame( rules_iteration( rules, block, 0, 10 ) );

				});

				requestAnimationFrame( rules_iteration( rules, block, 0, 10 ) );

				if( opts.done && typeof(opts.done) === "function") {

					opts.done();

				}

			}

		};

		return this.each(function() {

			block        = this;
			$options     = block.querySelectorAll('[data-depends-on]');
			optionLength = $options.length;

			setImmediate(function () {

				process();

			});

			return this;

		});

	};

})(jQuery, window, document);

(function( global, factory ) {
    if ( typeof exports === 'object' && typeof module !== 'undefined' ) {
        module.exports = factory();
    } else if ( typeof define === 'function' && define.amd ) {
        define(factory);
    } else {
        global.Custombox = factory();
    }
}(this, function() {
    'use strict';
    /*
     ----------------------------
     Settings
     ----------------------------
     */
    var _defaults = {
        target:         null,                   // Set the URL, ID or Class.
        cache:          false,                  // If set to false, it will force requested pages not to be cached by the browser only when send by AJAX.
        escKey:         true,                   // Allows the user to close the modal by pressing 'ESC'.
        zIndex:         9999,                   // Overlay z-index: Auto or number.
        overlay:        true,                   // Show the overlay.
        overlayColor:   '#000',                 // Overlay color.
        overlayOpacity: 0.8,                    // The overlay opacity level. Range: 0 to 1.
        overlayClose:   true,                   // Allows the user to close the modal by clicking the overlay.
        overlaySpeed:   300,                    // Sets the speed of the overlay, in milliseconds.
        overlayEffect:  'auto',                 // Combine any of the effects.
        width:          null,                   // Set a fixed total width or 'full'.
        effect:         'fadein',               // fadein | slide | newspaper | fall | sidefall | blur | flip | sign | superscaled | slit | rotate | letmein | makeway | slip | corner | slidetogether | scale | door | push | contentscale | swell | rotatedown | flash.
        position:       ['center', 'center'],   // Set position of modal. First position 'x': left, center and right. Second position 'y': top, center, bottom.
        animation:      null,                   // Only with effects: slide, flip and rotate (top, right, bottom, left and center) | (vertical or horizontal) and output position. Example: ['top', 'bottom'].
        speed:          500,                    // Sets the speed of the transitions, in milliseconds.
        loading:        false,                  // Show loading.
        open:           null,                   // Callback that fires right before begins to open.
        complete:       null,                   // Callback that fires right after loaded content is displayed.
        close:          null                    // Callback that fires once is closed.
    },
    /*
     ----------------------------
     Config
     ----------------------------
     */
    _config = {
        oldIE:              navigator.appVersion.indexOf('MSIE 8.') > -1 || navigator.appVersion.indexOf('MSIE 9.') > -1,       // Check if is a old IE.
        oldMobile:          /(iPhone|iPad|iPod)\sOS\s6/.test(navigator.userAgent),                                              // Check if is a old browser mobile.
        overlay: {
            perspective:    ['letmein', 'makeway', 'slip'],                                                                     // Custom effects overlay.
            together:       ['corner', 'slidetogether', 'scale', 'door', 'push', 'contentscale', 'simplegenie', 'slit', 'slip'] // Animation together (overlay and modal).
        },
        modal: {
            position:       ['slide', 'flip', 'rotate'],                                                                        // Custom animation of the modal.
            animationend:   ['swell', 'rotatedown', 'flash']                                                                    // Type of animation.
        }
    },
    /*
     ----------------------------
     Private methods
     ----------------------------
     */
    _private = {
        set: function( val ) {
            if ( !this.cb || !this.cb.length ) {
                this.cb = [];
                this.item = -1;
            }

            this.item++;

            if ( val && val.zIndex === 'auto' ) {
                for ( var zIndex = 0, x = 0, elements = document.getElementsByTagName('*'), xLen = elements.length; x < xLen; x += 1 ) {
                    var value = window.getComputedStyle(elements[x]).getPropertyValue('z-index');
                    if ( value ) {
                        value =+ value;
                        if ( value > zIndex ) {
                            zIndex = value;
                        }
                    }
                }
                val.zIndex = zIndex;
            }

            this.cb.push({
                settings: _config.oldIE && typeof cbExtendObjects !== 'undefined' ? cbExtendObjects( {}, _defaults, val ) : Object.assign( {}, _defaults, val )
            });

            if ( this.cb[this.item].settings.overlayEffect === 'auto' ) {
                this.cb[this.item].settings.overlayEffect = this.cb[this.item].settings.effect;
            }
        },
        get: function() {
            return this.cb[this.cb.length - 1] || null;
        },
        init: function() {
            // Add class open.
            document.documentElement.classList.add('custombox-open');
            document.documentElement.classList.add('custombox-open-' + this.cb[this.item].settings.overlayEffect);

            // Add class perspective.
            if ( _config.overlay.perspective.indexOf( this.cb[this.item].settings.overlayEffect ) > -1 ) {
                this.cb[this.item].scroll = document.documentElement && document.documentElement.scrollTop || document.body && document.body.scrollTop || 0;
                document.documentElement.classList.add('custombox-perspective');
                window.scrollTo(0, 0);
            }

            // Create main.
            if ( !this.main ) {
                this.built('container');
            }

            // Create loading.
            if ( this.cb[this.item].settings.loading && this.cb[this.item].settings.loading.parent ) {
                this.built('loading');
            }

            // Create overlay.
            if ( this.cb[this.item].settings.overlay ) {
                this.built('overlay').built('modal').open();
            } else {
                this.built('modal').open();
            }

            // Listeners.
            this.binds();
        },
        built: function( item ) {
            var cb;
            if ( typeof this.item !== 'undefined' ) {
                cb = this.cb[this.item];
            }

            // Container.
            switch ( item ) {
                case 'container':
                    this.main = document.createElement('div');
                    while ( document.body.firstChild ) {
                        this.main.appendChild(document.body.firstChild);
                    }
                    document.body.appendChild(this.main);
                    break;
                case 'overlay':
                    if ( !cb.overlay ) {
                        cb.overlay = {};
                    }
                    cb.overlay = document.createElement('div');
                    cb.overlay.classList.add('custombox-overlay');
                    cb.overlay.classList.add('custombox-overlay-' + cb.settings.overlayEffect);
                    cb.overlay.style.zIndex = cb.settings.zIndex + 2;
                    cb.overlay.style.backgroundColor = cb.settings.overlayColor;

                    // Add class perspective.
                    if ( _config.overlay.perspective.indexOf( cb.settings.overlayEffect ) > -1 || _config.overlay.together.indexOf( cb.settings.overlayEffect ) > -1 ) {
                        cb.overlay.style.opacity = cb.settings.overlayOpacity;
                    } else {
                        cb.overlay.classList.add('custombox-overlay-default');
                    }

                    if ( _config.overlay.together.indexOf( cb.settings.overlayEffect ) > -1 ) {
                        cb.overlay.style.transitionDuration = cb.settings.speed + 'ms';
                    } else {
                        cb.overlay.style.transitionDuration = cb.settings.overlaySpeed + 'ms';
                    }

                    // Append overlay in to the DOM.
                    document.body.insertBefore(cb.overlay, document.body.lastChild.nextSibling);
                    break;
                case 'modal':
                    if ( cb.settings.overlayEffect === 'push' ) {
                        this.main.style.transitionDuration = cb.settings.speed + 'ms';
                    }

                    this.main.classList.add('custombox-container');
                    this.main.classList.add('custombox-container-' + cb.settings.overlayEffect);

                    cb.wrapper = document.createElement('div');
                    cb.wrapper.classList.add('custombox-modal-wrapper');
                    cb.wrapper.classList.add('custombox-modal-wrapper-' + cb.settings.effect);
                    cb.wrapper.style.zIndex = cb.settings.zIndex + 3;
                    document.body.insertBefore(cb.wrapper, document.body.lastChild.nextSibling);

                    cb.container = document.createElement('div');
                    cb.container.classList.add('custombox-modal-container');
                    cb.container.classList.add('custombox-modal-container-' + cb.settings.effect);
                    cb.container.style.zIndex = cb.settings.zIndex + 4;

                    if ( _config.modal.position.indexOf(cb.settings.effect) > -1 && cb.settings.animation === null ) {
                        // Defaults.
                        if ( cb.settings.effect === 'slide' ) {
                            cb.settings.animation = ['top'];
                        } else if ( cb.settings.effect === 'flip' ) {
                            cb.settings.animation = ['horizontal'];
                        } else {
                            cb.settings.animation = ['bottom'];
                        }
                    }

                    cb.modal = document.createElement('div');
                    cb.modal.classList.add('custombox-modal');
                    cb.modal.classList.add(
                        'custombox-modal-' + cb.settings.effect + ( _config.modal.position.indexOf( cb.settings.effect ) > -1 ? '-' + cb.settings.animation[0].trim() : '' )
                    );
                    cb.modal.style.transitionDuration = cb.settings.speed + 'ms';
                    cb.modal.style.zIndex = cb.settings.zIndex + 4;
                    cb.wrapper.appendChild(cb.container).appendChild(cb.modal);
                    break;
                case 'loading':
                    this.loading = document.createElement('div');
                    this.loading.classList.add('custombox-loading');

                    var wrapper = document.createElement('div');
                    for ( var i = 0, t = this.cb[this.item].settings.loading.parent.length; i < t; i++ ) {
                        wrapper.classList.add(this.cb[this.item].settings.loading.parent[i]);
                    }

                    this.loading.appendChild(wrapper);
                    this.loading.style.zIndex = cb.settings.zIndex + 3;

                    if ( this.cb[this.item].settings.loading.childrens ) {
                        for ( var e = 0, te = this.cb[this.item].settings.loading.childrens.length; e < te; e++ ) {
                            var tmp = document.createElement('div');
                            for ( var r = 0, tr = this.cb[this.item].settings.loading.childrens[e].length; r < tr; r++ ) {
                                tmp.classList.add(this.cb[this.item].settings.loading.childrens[e][r]);
                            }
                            wrapper.appendChild(tmp);
                        }
                    }

                    document.body.appendChild(this.loading);
                    break;
            }

            return this;
        },
        load: function() {
            var cb = this.cb[this.item];

            // Check if callback 'open'.
            if ( typeof cb.settings.open === 'function' ) {
                cb.settings.open.call();
            }

            // Trigger open.
            if ( document.createEvent ) {
                var topen = document.createEvent('Event');
                topen.initEvent('custombox.open', true, true);
                document.dispatchEvent(topen);
            }

            // Convert the string to array.
            if ( cb.settings.target !== null && Array.isArray(cb.settings.position) ) {
                if ( cb.settings.target.charAt(0) === '#' || ( cb.settings.target.charAt(0) === '.' && cb.settings.target.charAt(1) !== '/' ) ) {
                    if ( document.querySelector(cb.settings.target) ) {
                        cb.inline = document.createElement('div');
                        cb.content = document.querySelector(cb.settings.target);
                        cb.display = cb.content.style.display === 'none';
                        cb.content.style.display = 'block';
                        cb.content.parentNode.insertBefore(cb.inline, cb.content);
                        this.size();
                    } else {
                        this.error();
                    }
                } else {
                    this.ajax();
                }
            } else {
                this.error();
            }
            return this;
        },
        size: function() {
            var cb = this.cb[this.item],
                customw = cb.content.offsetWidth;

            if ( _config.oldIE ) {
                window.innerHeight = document.documentElement.clientHeight;
            }

            if ( !cb.inline ) {
                if ( _config.oldIE ) {
                    cb.content.style.styleFloat = 'none';
                } else {
                    cb.content.style.cssFloat = 'none';
                }
            }

            // Check width.
            if ( cb.settings.width !== null ) {
                if ( !isNaN( cb.settings.width ) ) {
                    customw = parseInt( cb.settings.width, 0);
                } else {
                    customw = window.innerWidth;
                    cb.content.style.height = window.innerHeight + 'px';
                }
            }

            // Storage.
            cb.size = customw;

            // Width.
            if ( cb.size + 60 >= window.innerWidth ) {
                cb.container.style.width = 'auto';
                if ( cb.settings.width !== 'full' ) {
                    cb.container.style.margin = '5%';
                }
                cb.wrapper.style.width = window.innerWidth + 'px';
                for ( var i = 0, elements = cb.content.querySelectorAll(':scope > *'), t = elements.length; i < t; i++ ) {
                    if ( elements[i].offsetWidth > window.innerWidth ) {
                        elements[i].style.width = 'auto';
                    }
                }
            } else {
                switch ( cb.settings.position[0].trim() ) {
                    case 'left':
                        cb.container.style.marginLeft = 0;
                        break;
                    case 'right':
                        cb.container.style.marginRight = 0;
                        break;
                }
                cb.container.style.width = cb.size + 'px';
            }

            cb.content.style.width = 'auto';
            cb.modal.appendChild(cb.content);

            // Top.
            if ( cb.content.offsetHeight >= window.innerHeight && cb.settings.width !== 'full' ) {
                cb.container.style.marginTop = '5%';
                cb.container.style.marginBottom = '5%';
            } else {
                var result;
                switch ( cb.settings.position[1].trim() ) {
                    case 'top':
                        result = 0;
                        break;
                    case 'bottom':
                        result = window.innerHeight - cb.content.offsetHeight + 'px';
                        break;
                    default:
                        result = window.innerHeight / 2 - cb.content.offsetHeight / 2 + 'px';
                        break;
                }
                cb.container.style.marginTop = result;
            }

            if ( this.loading ) {
                document.body.removeChild(this.loading);
                delete this.loading;
            }
            cb.wrapper.classList.add('custombox-modal-open');
        },
        ajax: function() {
            var _this = this,
                cb = _this.cb[_this.item],
                xhr = new XMLHttpRequest(),
                modal = document.createElement('div');

            xhr.onreadystatechange = function() {
                if ( xhr.readyState === 4 ) {
                    if( xhr.status === 200 ) {
                        modal.innerHTML = xhr.responseText;
                        cb.content = modal;
                        cb.content.style.display = 'block';
                        if ( _config.oldIE ) {
                            cb.content.style.styleFloat = 'left';
                        } else {
                            cb.content.style.cssFloat = 'left';
                        }
                        cb.container.appendChild(cb.content);
                        _this.size();
                    } else {
                        _this.error();
                    }
                }
            };
            xhr.open('GET', cb.settings.target + ( cb.settings.cache ? '' : ( /[?].+=/.test(cb.settings.target) ? '&_=' : '?_=' ) + Date.now() ), true);
            xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
            xhr.send(null);
        },
        scrollbar: function() {
            var scrollDiv = document.createElement('div');
            scrollDiv.classList.add('custombox-scrollbar');
            document.body.appendChild(scrollDiv);
            var scrollbarWidth = scrollDiv.offsetWidth - scrollDiv.clientWidth;
            document.body.removeChild(scrollDiv);
            return scrollbarWidth;
        },
        open: function() {
            var _this = this,
                delay = 0,
                cb = _this.cb[_this.item],
                scrollbar = _this.scrollbar();

            if ( scrollbar ) {
                document.body.style.paddingRight = scrollbar + 'px';
            }

            _this.main.classList.add('custombox-container-open');

            // Loading delay.
            if ( _this.cb[_this.item].settings.loading ) {
                if ( _this.cb[_this.item].settings.loading.delay && !isNaN( _this.cb[_this.item].settings.loading.delay * 1 ) ) {
                    delay = _this.cb[_this.item].settings.loading.delay * 1;
                } else {
                    delay = 1000;
                }
            }

            var open = function(listener) {
                if ( listener ) {
                    cb.overlay.removeEventListener('transitionend', open);
                }

                // Load target.
                _this.load();

                if ( cb.inline) {
                    cb.wrapper.classList.add('custombox-modal-open');
                }
            };

            if ( cb.settings.overlay ) {
                if ( _config.overlay.perspective.indexOf(cb.settings.overlayEffect) > -1 || _config.overlay.together.indexOf( cb.settings.overlayEffect ) > -1 ) {
                    // Add class perspective.
                    cb.overlay.classList.add('custombox-overlay-open');
                } else {
                    cb.overlay.style.opacity = cb.settings.overlayOpacity;
                }

                if ( _this.cb[_this.item].settings.loading ) {
                    setTimeout(open, delay);
                } else {
                    if ( _config.overlay.together.indexOf( cb.settings.overlayEffect ) > -1 || _config.oldIE ) {
                        open(false);
                    } else {
                        cb.overlay.addEventListener('transitionend', open, false);
                    }
                }
            } else {
                if ( _this.cb[_this.item].settings.loading ) {
                    setTimeout(open, delay);
                } else {
                    open(false);
                }
            }
            return _this;
        },
        clean: function( item ) {
            var _this = this,
                cb = this.cb[item];

            document.documentElement.classList.remove('custombox-open-' + cb.settings.overlayEffect);

            if ( cb.settings.overlay ) {
                if ( cb.overlay.style.opacity ) {
                    cb.overlay.style.opacity = 0;
                }

                cb.overlay.classList.remove('custombox-overlay-open');
                _this.main.classList.remove('custombox-container-open');
            }

            // Listener overlay.
            if ( _config.oldIE || _config.oldMobile || !cb.overlay ) {
                _this.remove(item);
            } else {
                var overlay = function() {
                    cb.overlay.removeEventListener('transitionend', overlay);
                    _this.remove(item);
                };
                cb.overlay.addEventListener('transitionend', overlay, false);
            }
        },
        remove: function( item ) {
            var _this = this,
                cb = this.cb[item];

            if ( !cb ) {
                return;
            }

            // Remove classes from html tag.
            if ( _this.cb.length === 1 ) {
                document.documentElement.classList.remove('custombox-open', 'custombox-perspective');
                if ( _this.scrollbar() ) {
                    document.body.style.paddingRight = 0;
                }

                if ( typeof cb.scroll !== 'undefined' ) {
                    window.scrollTo(0, cb.scroll);
                }
            }

            if ( cb.inline ) {
                // Remove property width and display.
                if ( _config.oldIE ) {
                    cb.content.style.removeAttribute('width');
                    cb.content.style.removeAttribute('height');
                    cb.content.style.removeAttribute('display');
                } else {
                    cb.content.style.removeProperty('width');
                    cb.content.style.removeProperty('height');
                    cb.content.style.removeProperty('display');
                }

                if ( cb.display ) {
                    cb.content.style.display = 'none';
                }

                // Insert restore div.
                cb.inline.parentNode.replaceChild(cb.content, cb.inline);
            }

            _this.main.classList.remove('custombox-container-' + cb.settings.overlayEffect);

            // Remove modal.
            cb.wrapper.parentNode.removeChild(cb.wrapper);

            // Remove overlay.
            if ( cb.settings.overlay ) {
                cb.overlay.parentNode.removeChild(cb.overlay);
            }

            // Trigger close.
            if ( document.createEvent ) {
                var tclose = document.createEvent('Event');
                tclose.initEvent('custombox.close', true, true);
                document.dispatchEvent(tclose);
            }

            // Unwrap.
            if ( _this.cb.length === 1 ) {
                for ( var contents = document.querySelectorAll('.custombox-container > *'), i = 0, t = contents.length; i < t; i++ ) {
                    document.body.insertBefore(contents[i], _this.main);
                }
                if ( _this.main.parentNode ) {
                    _this.main.parentNode.removeChild(_this.main);
                }
                delete _this.main;
            }

            // Remove items.
            _this.cb.splice(item, 1);

            // Callback close.
            if ( typeof cb.settings.close === 'function' ) {
                cb.settings.close.call();
            }
        },
        close: function( target, callback ) {
            var _this = this,
                item;

            if ( target ) {
                for ( var i = 0, t = this.cb.length; i < t; i++ ) {
                    if ( this.cb[i].settings.target === target ) {
                        item = i;
                        break;
                    }
                }
            } else {
                item = _this.cb.length - 1;
            }

            var cb = _this.cb[item];

            if ( typeof callback === 'function' ) {
                cb.settings.close = callback;
            }

            // Modal
            if ( _config.modal.position.indexOf( cb.settings.effect ) > -1 && cb.settings.animation.length > 1 ) {
                cb.modal.classList.remove('custombox-modal-' + cb.settings.effect + '-' + cb.settings.animation[0]);
                cb.modal.classList.add('custombox-modal-' + cb.settings.effect + '-' + cb.settings.animation[1].trim());
            }

            // Remove classes.
            cb.wrapper.classList.remove('custombox-modal-open');

            if ( _config.oldIE || _config.oldMobile || _config.overlay.together.indexOf( cb.settings.overlayEffect ) > -1 ) {
                _this.clean(item);
            } else {
                // Listener wrapper.
                var wrapper = function() {
                    cb.wrapper.removeEventListener('transitionend', wrapper);
                    _this.clean(item);
                };

                if ( _config.modal.animationend.indexOf(cb.settings.effect) > -1 ) {
                    cb.wrapper.addEventListener('animationend', wrapper, false);
                } else {
                    cb.wrapper.addEventListener('transitionend', wrapper, false);
                }
            }
        },
        responsive: function() {
            if ( _config.oldIE ) {
                window.innerHeight = document.documentElement.clientHeight;
            }

            for ( var i = 0, t = this.cb.length, result; i < t; i++ ) {
                // Width.
                if ( this.cb[i].size + 60 >= window.innerWidth ) {
                    if ( this.cb[i].settings.width !== 'full' ) {
                        this.cb[i].container.style.marginLeft = '5%';
                        this.cb[i].container.style.marginRight = '5%';
                    } else if ( this.cb[i].content.offsetWidth <= window.innerWidth ) {
                        this.cb[i].content.style.width = 'auto';
                    }
                    this.cb[i].container.style.width = 'auto';
                    this.cb[i].wrapper.style.width = window.innerWidth + 'px';
                } else {
                    switch ( this.cb[i].settings.position[0].trim() ) {
                        case 'left':
                            this.cb[i].container.style.marginLeft = 0;
                            break;
                        case 'right':
                            this.cb[i].container.style.marginRight = 0;
                            break;
                        default:
                            this.cb[i].container.style.marginLeft = 'auto';
                            this.cb[i].container.style.marginRight = 'auto';
                            break;
                    }
                    this.cb[i].container.style.width = this.cb[i].size + 'px';
                    this.cb[i].wrapper.style.width = 'auto';
                }

                // Top.
                if ( this.cb[i].content.offsetHeight >= window.innerHeight && this.cb[i].settings.width !== 'full' ) {
                    this.cb[i].container.style.marginTop = '5%';
                    this.cb[i].container.style.marginBottom = '5%';
                } else {
                    if ( this.cb[i].settings.width === 'full' ) {
                        this.cb[i].settings.position[1] = 'top';
                        if ( this.cb[i].content.offsetHeight <= window.innerHeight ) {
                            this.cb[i].content.style.height = window.innerHeight + 'px';
                        }
                    }
                    switch ( this.cb[i].settings.position[1].trim() ) {
                        case 'top':
                            result = 0;
                            break;
                        case 'bottom':
                            result = window.innerHeight - this.cb[i].content.offsetHeight + 'px';
                            break;
                        default:
                            result = window.innerHeight / 2 - this.cb[i].content.offsetHeight / 2 + 'px';
                            break;
                    }
                    this.cb[i].container.style.marginTop = result;
                }
            }
        },
        binds: function() {
            var _this = this,
                cb = _this.cb[_this.item],
                stop = false;

            // Esc.
            if ( _this.cb.length === 1 ) {
                _this.esc = function( event ) {
                    if ( _this.cb.length === 1 ) {
                        document.removeEventListener('keydown', _this.esc);
                    }
                    event = event || window.event;
                    if ( !stop && event.keyCode === 27 && _this.get() && _this.get().settings.escKey ) {
                        stop = true;
                        _this.close();
                    }
                };
                document.addEventListener('keydown', _this.esc, false);

                // Listener responsive.
                window.addEventListener('onorientationchange' in window ? 'orientationchange' : 'resize', function() {
                    _this.responsive();
                }, false);
            }

            // Overlay close.
            cb.wrapper.event = function ( event ) {
                if ( _this.cb.length === 1 ) {
                    document.removeEventListener('keydown', cb.wrapper.event);
                }
                if ( !stop && event.target === cb.wrapper && _this.get() && _this.get().settings.overlayClose ) {
                    stop = true;
                    _this.close();
                }
            };
            cb.wrapper.addEventListener('click', cb.wrapper.event, false);

            document.addEventListener('custombox.close', function() {
                stop = false;
            });

            var callback = function() {
                // Execute the scripts.
                if ( !cb.inline ) {
                    for ( var i = 0, script = cb.modal.getElementsByTagName('script'), t = script.length; i < t; i++ ) {
                        new Function( script[i].text )();
                    }
                }

                if ( cb.settings && typeof cb.settings.complete === 'function' ) {
                    cb.settings.complete.call();
                }

                // Trigger complete.
                if ( document.createEvent ) {
                    var tcomplete = document.createEvent('Event');
                    tcomplete.initEvent('custombox.complete', true, true);
                    document.dispatchEvent(tcomplete);
                }
            };

            // Callback complete.
            var complete = function() {
                callback();
                cb.modal.removeEventListener('transitionend', complete);
            };

            if ( _config.oldIE || _config.oldMobile ) {
                setTimeout(function() {
                    callback();
                }, cb.settings.overlaySpeed);
            } else {
                if ( cb.settings.effect !== 'slit' ) {
                    cb.modal.addEventListener('transitionend', complete, false);
                } else {
                    cb.modal.addEventListener('animationend', complete, false);
                }
            }
        },
        error: function() {
            var _this = this,
                item = _this.cb.length - 1;

            alert('Error to load this target: ' + _this.cb[item].settings.target);
            _this.remove(item);
        }
    };

    return {
        /**
         * @desc Set options defaults.
         * @param {object} options - Auto built.
         */
        set: function( options ) {
            if ( options.autobuild ) {
                _private.built('container');
            }
        },
        /**
         * @desc Open Custombox.
         * @param {object} options - Options for the custombox.
         */
        open: function( options ) {
            _private.set( options );
            _private.init();
        },
        /**
         * @desc Close Custombox.
         * @param {string} options - Target.
         * @param {function} callback.
         */
        close: function( target, callback ) {
            if ( typeof target === 'function' ) {
                callback = target;
                target = false;
            }
            _private.close( target, callback );
        }
    };
}));

/**
* jQuery asColor v0.3.4
* https://github.com/amazingSurge/asColor
*
* Copyright (c) amazingSurge
* Released under the LGPL-3.0 license
*/
(function(global, factory) {
  if (typeof define === "function" && define.amd) {
    define('AsColor', ['exports', 'jquery'], factory);
  } else if (typeof exports !== "undefined") {
    factory(exports, require('jquery'));
  } else {
    var mod = {
      exports: {}
    };
    factory(mod.exports, global.jQuery);
    global.AsColor = mod.exports;
  }
})(this,

  function(exports, _jquery) {
    'use strict';

    Object.defineProperty(exports, "__esModule", {
      value: true
    });

    var _jquery2 = _interopRequireDefault(_jquery);

    function _interopRequireDefault(obj) {
      return obj && obj.__esModule ? obj : {
        default: obj
      };
    }

    var _typeof = typeof Symbol === "function" && typeof Symbol.iterator === "symbol" ?

      function(obj) {
        return typeof obj;
      }
      :

      function(obj) {
        return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj;
      };

    function _classCallCheck(instance, Constructor) {
      if (!(instance instanceof Constructor)) {
        throw new TypeError("Cannot call a class as a function");
      }
    }

    var _createClass = function() {
      function defineProperties(target, props) {
        for (var i = 0; i < props.length; i++) {
          var descriptor = props[i];
          descriptor.enumerable = descriptor.enumerable || false;
          descriptor.configurable = true;

          if ("value" in descriptor)
            descriptor.writable = true;
          Object.defineProperty(target, descriptor.key, descriptor);
        }
      }

      return function(Constructor, protoProps, staticProps) {
        if (protoProps)
          defineProperties(Constructor.prototype, protoProps);

        if (staticProps)
          defineProperties(Constructor, staticProps);

        return Constructor;
      };
    }();

    var DEFAULTS = {
      format: false,
      shortenHex: false,
      hexUseName: false,
      reduceAlpha: false,
      alphaConvert: { // or false will disable convert
        'RGB': 'RGBA',
        'HSL': 'HSLA',
        'HEX': 'RGBA',
        'NAMESPACE': 'RGBA'
      },
      nameDegradation: 'HEX',
      invalidValue: '',
      zeroAlphaAsTransparent: true
    };

    function expandHex(hex) {
      
        if( hex.indexOf('#') === 0 ) {
            hex = hex.substr(1);
        }

        if(!hex) {
            return null;            
        }

        // Avoid Autofill    
        if( hex.length === 3 ) {
            //hex = hex[0] + hex[0] + hex[1] + hex[1] + hex[2] + hex[2];
        }

        return hex.length === 6 ? '#' + hex : null;
        
    }

    function shrinkHex(hex) {
      
        if (hex.indexOf('#') === 0) {
            hex = hex.substr(1);
        }

        if (hex.length === 6 && hex[0] === hex[1] && hex[2] === hex[3] && hex[4] === hex[5]) {
            hex = hex[0] + hex[2] + hex[4];
        }

        return '#' + hex;
        
    }

    function parseIntFromHex(val) {
      return parseInt(val, 16);
    }

    function isPercentage(n) {
      return typeof n === 'string' && n.indexOf('%') === n.length - 1;
    }

    function conventPercentageToRgb(n) {
      return parseInt(Math.round(n.slice(0, -1) * 2.55), 10);
    }

    function convertPercentageToFloat(n) {
      return parseFloat(n.slice(0, -1) / 100, 10);
    }

    function flip(o) {
      var flipped = {};

      for (var i in o) {

        if (o.hasOwnProperty(i)) {
          flipped[o[i]] = i;
        }
      }

      return flipped;
    }

    var NAMES = {
      aliceblue: 'f0f8ff',
      antiquewhite: 'faebd7',
      aqua: '0ff',
      aquamarine: '7fffd4',
      azure: 'f0ffff',
      beige: 'f5f5dc',
      bisque: 'ffe4c4',
      black: '000',
      blanchedalmond: 'ffebcd',
      blue: '00f',
      blueviolet: '8a2be2',
      brown: 'a52a2a',
      burlywood: 'deb887',
      burntsienna: 'ea7e5d',
      cadetblue: '5f9ea0',
      chartreuse: '7fff00',
      chocolate: 'd2691e',
      coral: 'ff7f50',
      cornflowerblue: '6495ed',
      cornsilk: 'fff8dc',
      crimson: 'dc143c',
      cyan: '0ff',
      darkblue: '00008b',
      darkcyan: '008b8b',
      darkgoldenrod: 'b8860b',
      darkgray: 'a9a9a9',
      darkgreen: '006400',
      darkgrey: 'a9a9a9',
      darkkhaki: 'bdb76b',
      darkmagenta: '8b008b',
      darkolivegreen: '556b2f',
      darkorange: 'ff8c00',
      darkorchid: '9932cc',
      darkred: '8b0000',
      darksalmon: 'e9967a',
      darkseagreen: '8fbc8f',
      darkslateblue: '483d8b',
      darkslategray: '2f4f4f',
      darkslategrey: '2f4f4f',
      darkturquoise: '00ced1',
      darkviolet: '9400d3',
      deeppink: 'ff1493',
      deepskyblue: '00bfff',
      dimgray: '696969',
      dimgrey: '696969',
      dodgerblue: '1e90ff',
      firebrick: 'b22222',
      floralwhite: 'fffaf0',
      forestgreen: '228b22',
      fuchsia: 'f0f',
      gainsboro: 'dcdcdc',
      ghostwhite: 'f8f8ff',
      gold: 'ffd700',
      goldenrod: 'daa520',
      gray: '808080',
      green: '008000',
      greenyellow: 'adff2f',
      grey: '808080',
      honeydew: 'f0fff0',
      hotpink: 'ff69b4',
      indianred: 'cd5c5c',
      indigo: '4b0082',
      ivory: 'fffff0',
      khaki: 'f0e68c',
      lavender: 'e6e6fa',
      lavenderblush: 'fff0f5',
      lawngreen: '7cfc00',
      lemonchiffon: 'fffacd',
      lightblue: 'add8e6',
      lightcoral: 'f08080',
      lightcyan: 'e0ffff',
      lightgoldenrodyellow: 'fafad2',
      lightgray: 'd3d3d3',
      lightgreen: '90ee90',
      lightgrey: 'd3d3d3',
      lightpink: 'ffb6c1',
      lightsalmon: 'ffa07a',
      lightseagreen: '20b2aa',
      lightskyblue: '87cefa',
      lightslategray: '789',
      lightslategrey: '789',
      lightsteelblue: 'b0c4de',
      lightyellow: 'ffffe0',
      lime: '0f0',
      limegreen: '32cd32',
      linen: 'faf0e6',
      magenta: 'f0f',
      maroon: '800000',
      mediumaquamarine: '66cdaa',
      mediumblue: '0000cd',
      mediumorchid: 'ba55d3',
      mediumpurple: '9370db',
      mediumseagreen: '3cb371',
      mediumslateblue: '7b68ee',
      mediumspringgreen: '00fa9a',
      mediumturquoise: '48d1cc',
      mediumvioletred: 'c71585',
      midnightblue: '191970',
      mintcream: 'f5fffa',
      mistyrose: 'ffe4e1',
      moccasin: 'ffe4b5',
      navajowhite: 'ffdead',
      navy: '000080',
      oldlace: 'fdf5e6',
      olive: '808000',
      olivedrab: '6b8e23',
      orange: 'ffa500',
      orangered: 'ff4500',
      orchid: 'da70d6',
      palegoldenrod: 'eee8aa',
      palegreen: '98fb98',
      paleturquoise: 'afeeee',
      palevioletred: 'db7093',
      papayawhip: 'ffefd5',
      peachpuff: 'ffdab9',
      peru: 'cd853f',
      pink: 'ffc0cb',
      plum: 'dda0dd',
      powderblue: 'b0e0e6',
      purple: '800080',
      red: 'f00',
      rosybrown: 'bc8f8f',
      royalblue: '4169e1',
      saddlebrown: '8b4513',
      salmon: 'fa8072',
      sandybrown: 'f4a460',
      seagreen: '2e8b57',
      seashell: 'fff5ee',
      sienna: 'a0522d',
      silver: 'c0c0c0',
      skyblue: '87ceeb',
      slateblue: '6a5acd',
      slategray: '708090',
      slategrey: '708090',
      snow: 'fffafa',
      springgreen: '00ff7f',
      steelblue: '4682b4',
      tan: 'd2b48c',
      teal: '008080',
      thistle: 'd8bfd8',
      tomato: 'ff6347',
      turquoise: '40e0d0',
      violet: 'ee82ee',
      wheat: 'f5deb3',
      white: 'fff',
      whitesmoke: 'f5f5f5',
      yellow: 'ff0',
      yellowgreen: '9acd32'
    };

    /* eslint no-bitwise: "off" */
    var hexNames = flip(NAMES);

    var Converter = {
      HSLtoRGB: function HSLtoRGB(hsl) {
        var h = hsl.h / 360;
        var s = hsl.s;
        var l = hsl.l;
        var m1 = void 0;
        var m2 = void 0;
        var rgb = void 0;

        if (l <= 0.5) {
          m2 = l * (s + 1);
        } else {
          m2 = l + s - l * s;
        }
        m1 = l * 2 - m2;
        rgb = {
          r: this.hueToRGB(m1, m2, h + 1 / 3),
          g: this.hueToRGB(m1, m2, h),
          b: this.hueToRGB(m1, m2, h - 1 / 3)
        };

        if (typeof hsl.a !== 'undefined') {
          rgb.a = hsl.a;
        }

        if (hsl.l === 0) {
          rgb.h = hsl.h;
        }

        if (hsl.l === 1) {
          rgb.h = hsl.h;
        }

        return rgb;
      },

      hueToRGB: function hueToRGB(m1, m2, h) {
        var v = void 0;

        if (h < 0) {
          h += 1;
        } else if (h > 1) {
          h -= 1;
        }

        if (h * 6 < 1) {
          v = m1 + (m2 - m1) * h * 6;
        } else if (h * 2 < 1) {
          v = m2;
        } else if (h * 3 < 2) {
          v = m1 + (m2 - m1) * (2 / 3 - h) * 6;
        } else {
          v = m1;
        }

        return Math.round(v * 255);
      },

      RGBtoHSL: function RGBtoHSL(rgb) {
        var r = rgb.r / 255;
        var g = rgb.g / 255;
        var b = rgb.b / 255;
        var min = Math.min(r, g, b);
        var max = Math.max(r, g, b);
        var diff = max - min;
        var add = max + min;
        var l = add * 0.5;
        var h = void 0;
        var s = void 0;

        if (min === max) {
          h = 0;
        } else if (r === max) {
          h = 60 * (g - b) / diff + 360;
        } else if (g === max) {
          h = 60 * (b - r) / diff + 120;
        } else {
          h = 60 * (r - g) / diff + 240;
        }

        if (diff === 0) {
          s = 0;
        } else if (l <= 0.5) {
          s = diff / add;
        } else {
          s = diff / (2 - add);
        }

        return {
          h: Math.round(h) % 360,
          s: s,
          l: l
        };
      },

      RGBtoHEX: function RGBtoHEX(rgb) {
        var hex = [rgb.r.toString(16), rgb.g.toString(16), rgb.b.toString(16)];

        _jquery2.default.each(hex,

          function(nr, val) {
            if (val.length === 1) {
              hex[nr] = '0' + val;
            }
          }
        );

        return '#' + hex.join('');
      },

      HSLtoHEX: function HSLtoHEX(hsl) {
        var rgb = this.HSLtoRGB(hsl);

        return this.RGBtoHEX(rgb);
      },

      HSVtoHEX: function HSVtoHEX(hsv) {
        var rgb = this.HSVtoRGB(hsv);

        return this.RGBtoHEX(rgb);
      },

      RGBtoHSV: function RGBtoHSV(rgb) {
        var r = rgb.r / 255;
        var g = rgb.g / 255;
        var b = rgb.b / 255;
        var max = Math.max(r, g, b);
        var min = Math.min(r, g, b);
        var h = void 0;
        var s = void 0;
        var v = max;
        var diff = max - min;
        s = max === 0 ? 0 : diff / max;

        if (max === min) {
          h = 0;
        } else {
          switch (max) {
            case r: {
              h = (g - b) / diff + (g < b ? 6 : 0);
              break;
            }
            case g: {
              h = (b - r) / diff + 2;
              break;
            }
            case b: {
              h = (r - g) / diff + 4;
              break;
            }
            default: {
              break;
            }
          }
          h /= 6;
        }

        return {
          h: Math.round(h * 360),
          s: s,
          v: v
        };
      },

      HSVtoRGB: function HSVtoRGB(hsv) {
        var r = void 0;
        var g = void 0;
        var b = void 0;
        var h = hsv.h % 360 / 60;
        var s = hsv.s;
        var v = hsv.v;
        var c = v * s;
        var x = c * (1 - Math.abs(h % 2 - 1));

        r = g = b = v - c;
        h = ~~h;

        r += [c, x, 0, 0, x, c][h];
        g += [x, c, c, x, 0, 0][h];
        b += [0, 0, x, c, c, x][h];

        var rgb = {
          r: Math.round(r * 255),
          g: Math.round(g * 255),
          b: Math.round(b * 255)
        };

        if (typeof hsv.a !== 'undefined') {
          rgb.a = hsv.a;
        }

        if (hsv.v === 0) {
          rgb.h = hsv.h;
        }

        if (hsv.v === 1 && hsv.s === 0) {
          rgb.h = hsv.h;
        }

        return rgb;
      },

      HEXtoRGB: function HEXtoRGB( hex ) {
          
        if( hex.length === 4 ) {
            hex = expandHex(hex);
        }
        
        if( !hex ) {
           return;
        }  
          
        return {
            r: parseIntFromHex( hex.substr(1, 2) ),
            g: parseIntFromHex( hex.substr(3, 2) ),
            b: parseIntFromHex( hex.substr(5, 2) )
        };
          
      },

      isNAME: function isNAME(string) {
        if (NAMES.hasOwnProperty(string)) {

          return true;
        }

        return false;
      },

      NAMEtoHEX: function NAMEtoHEX(name) {
        if (NAMES.hasOwnProperty(name)) {

            return '#' + NAMES[name];
            
        }

        return null;
      },

      NAMEtoRGB: function NAMEtoRGB(name) {
        var hex = this.NAMEtoHEX(name);

        if(hex) {

          return this.HEXtoRGB(hex);
        }

        return null;
          
      },

      hasNAME: function hasNAME(rgb) {
        var hex = this.RGBtoHEX(rgb);

        hex = shrinkHex(hex);

        if (hex.indexOf('#') === 0) {
          hex = hex.substr(1);
        }

        if (hexNames.hasOwnProperty(hex)) {

          return hexNames[hex];
        }

        return false;
      },

      RGBtoNAME: function RGBtoNAME(rgb) {
        var hasName = this.hasNAME(rgb);

        if (hasName) {

          return hasName;
        }

        return null;
      }
    };

    var CSS_INTEGER = '[-\\+]?\\d+%?';
    var CSS_NUMBER = '[-\\+]?\\d*\\.\\d+%?';
    var CSS_UNIT = '(?:' + CSS_NUMBER + ')|(?:' + CSS_INTEGER + ')';

    var PERMISSIVE_MATCH3 = '[\\s|\\(]+(' + CSS_UNIT + ')[,|\\s]+(' + CSS_UNIT + ')[,|\\s]+(' + CSS_UNIT + ')\\s*\\)';
    var PERMISSIVE_MATCH4 = '[\\s|\\(]+(' + CSS_UNIT + ')[,|\\s]+(' + CSS_UNIT + ')[,|\\s]+(' + CSS_UNIT + ')[,|\\s]+(' + CSS_UNIT + ')\\s*\\)';

    var ColorStrings = {
      RGB: {
        match: new RegExp('^rgb' + PERMISSIVE_MATCH3 + '$', 'i'),
        parse: function parse(result) {
          return {
            r: isPercentage(result[1]) ? conventPercentageToRgb(result[1]) : parseInt(result[1], 10),
            g: isPercentage(result[2]) ? conventPercentageToRgb(result[2]) : parseInt(result[2], 10),
            b: isPercentage(result[3]) ? conventPercentageToRgb(result[3]) : parseInt(result[3], 10),
            a: 1
          };
        },
        to: function to(color) {
          return 'rgb(' + color.r + ', ' + color.g + ', ' + color.b + ')';
        }
      },
      RGBA: {
        match: new RegExp('^rgba' + PERMISSIVE_MATCH4 + '$', 'i'),
        parse: function parse(result) {
          return {
            r: isPercentage(result[1]) ? conventPercentageToRgb(result[1]) : parseInt(result[1], 10),
            g: isPercentage(result[2]) ? conventPercentageToRgb(result[2]) : parseInt(result[2], 10),
            b: isPercentage(result[3]) ? conventPercentageToRgb(result[3]) : parseInt(result[3], 10),
            a: isPercentage(result[4]) ? convertPercentageToFloat(result[4]) : parseFloat(result[4], 10)
          };
        },
        to: function to(color) {
          return 'rgba(' + color.r + ', ' + color.g + ', ' + color.b + ', ' + color.a + ')';
        }
      },
      HSL: {
        match: new RegExp('^hsl' + PERMISSIVE_MATCH3 + '$', 'i'),
        parse: function parse(result) {
          var hsl = {
            h: (result[1] % 360 + 360) % 360,
            s: isPercentage(result[2]) ? convertPercentageToFloat(result[2]) : parseFloat(result[2], 10),
            l: isPercentage(result[3]) ? convertPercentageToFloat(result[3]) : parseFloat(result[3], 10),
            a: 1
          };

          return Converter.HSLtoRGB(hsl);
        },
        to: function to(color) {
          var hsl = Converter.RGBtoHSL(color);

          return 'hsl(' + parseInt(hsl.h, 10) + ', ' + Math.round(hsl.s * 100) + '%, ' + Math.round(hsl.l * 100) + '%)';
        }
      },
      HSLA: {
        match: new RegExp('^hsla' + PERMISSIVE_MATCH4 + '$', 'i'),
        parse: function parse(result) {
          var hsla = {
            h: (result[1] % 360 + 360) % 360,
            s: isPercentage(result[2]) ? convertPercentageToFloat(result[2]) : parseFloat(result[2], 10),
            l: isPercentage(result[3]) ? convertPercentageToFloat(result[3]) : parseFloat(result[3], 10),
            a: isPercentage(result[4]) ? convertPercentageToFloat(result[4]) : parseFloat(result[4], 10)
          };

          return Converter.HSLtoRGB(hsla);
        },
        to: function to(color) {
          var hsl = Converter.RGBtoHSL(color);

          return 'hsla(' + parseInt(hsl.h, 10) + ', ' + Math.round(hsl.s * 100) + '%, ' + Math.round(hsl.l * 100) + '%, ' + color.a + ')';
        }
      },
      HEX: {
        match: /^#([a-f0-9]{6}|[a-f0-9]{3})$/i,
        parse: function parse(result) {
            
            var hex = result[0];
            
            if( hex.length === 7 ) {
                
                var rgb = Converter.HEXtoRGB(hex);

                return {
                    r: rgb.r,
                    g: rgb.g,
                    b: rgb.b,
                    a: 1
                };
               
            }
            
        },
        to: function to(color, instance) {
          var hex = Converter.RGBtoHEX(color);

          if (instance) {

            if (instance.options.hexUseName) {
              var hasName = Converter.hasNAME(color);

              if (hasName) {

                return hasName;
              }
            }

            if (instance.options.shortenHex) {
              hex = shrinkHex(hex);
            }
          }

          return '' + hex;
        }
      },
      TRANSPARENT: {
        match: /^transparent$/i,
        parse: function parse() {
          return {
            r: 0,
            g: 0,
            b: 0,
            a: 0
          };
        },
        to: function to() {
          return 'transparent';
        }
      },
      NAME: {
        match: /^\w+$/i,
        parse: function parse(result) {
          var rgb = Converter.NAMEtoRGB(result[0]);

          if (rgb) {

            return {
              r: rgb.r,
              g: rgb.g,
              b: rgb.b,
              a: 1
            };
          }

          return null;
        },
        to: function to(color, instance) {
          var name = Converter.RGBtoNAME(color);

          if (name) {

            return name;
          }

          return ColorStrings[instance.options.nameDegradation.toUpperCase()].to(color);
        }
      }
    };

    /* eslint no-extend-native: "off" */

    if (!String.prototype.includes) {
      String.prototype.includes = function(search, start) {
        'use strict';

        if (typeof start !== 'number') {
          start = 0;
        }

        if (start + search.length > this.length) {

          return false;
        }

        return this.indexOf(search, start) !== -1;
      }
      ;
    }

    var AsColor = function() {
      function AsColor(string, options) {
        _classCallCheck(this, AsColor);

        if ((typeof string === 'undefined' ? 'undefined' : _typeof(string)) === 'object' && typeof options === 'undefined') {
          options = string;
          string = undefined;
        }

        if (typeof options === 'string') {
          options = {
            format: options
          };
        }
        this.options = _jquery2.default.extend(true, {}, DEFAULTS, options);
        this.value = {
          r: 0,
          g: 0,
          b: 0,
          h: 0,
          s: 0,
          v: 0,
          a: 1
        };
        this._format = false;
        this._matchFormat = 'HEX';
        this._valid = true;

        this.init(string);
      }

      _createClass(AsColor, [{
        key: 'init',
        value: function init(string) {
          this.format(this.options.format);
          this.fromString(string);

          return this;
        }
      }, {
        key: 'isValid',
        value: function isValid() {
          return this._valid;
        }
      }, {
        key: 'val',
        value: function val(value) {
          if (typeof value === 'undefined') {

            return this.toString();
          }
          this.fromString(value);

          return this;
        }
      }, {
        key: 'alpha',
        value: function alpha(value) {
          if (typeof value === 'undefined' || isNaN(value)) {

            return this.value.a;
          }

          value = parseFloat(value);

          if (value > 1) {
            value = 1;
          } else if (value < 0) {
            value = 0;
          }
          this.value.a = value;

          return this;
        }
      }, {
        key: 'matchString',
        value: function matchString(string) {
          return AsColor.matchString(string);
        }
      }, {
        key: 'fromString',
        value: function fromString(string, updateFormat) {
          if (typeof string === 'string') {
            string = _jquery2.default.trim(string);
            var matched = null;
            var rgb = void 0;
            this._valid = false;

            for (var i in ColorStrings) {

              if ((matched = ColorStrings[i].match.exec(string)) !== null) {
                rgb = ColorStrings[i].parse(matched);

                if (rgb) {
                  this.set(rgb);

                  if (i === 'TRANSPARENT') {
                    i = 'HEX';
                  }
                  this._matchFormat = i;

                  if (updateFormat === true) {
                    this.format(i);
                  }
                  break;
                }
              }
            }
          } else if ((typeof string === 'undefined' ? 'undefined' : _typeof(string)) === 'object') {
            this.set(string);
          }

          return this;
        }
      }, {
        key: 'format',
        value: function format(_format) {
          if (typeof _format === 'string' && (_format = _format.toUpperCase()) && typeof ColorStrings[_format] !== 'undefined') {

            if (_format !== 'TRANSPARENT') {
              this._format = _format;
            } else {
              this._format = 'HEX';
            }
          } else if (_format === false) {
            this._format = false;
          }

          if (this._format === false) {

            return this._matchFormat;
          }

          return this._format;
        }
      }, {
        key: 'toRGBA',
        value: function toRGBA() {
          return ColorStrings.RGBA.to(this.value, this);
        }
      }, {
        key: 'toRGB',
        value: function toRGB() {
          return ColorStrings.RGB.to(this.value, this);
        }
      }, {
        key: 'toHSLA',
        value: function toHSLA() {
          return ColorStrings.HSLA.to(this.value, this);
        }
      }, {
        key: 'toHSL',
        value: function toHSL() {
          return ColorStrings.HSL.to(this.value, this);
        }
      }, {
        key: 'toHEX',
        value: function toHEX() {
          return ColorStrings.HEX.to(this.value, this);
        }
      }, {
        key: 'toNAME',
        value: function toNAME() {
          return ColorStrings.NAME.to(this.value, this);
        }
      }, {
        key: 'to',
        value: function to(format) {
          if (typeof format === 'string' && (format = format.toUpperCase()) && typeof ColorStrings[format] !== 'undefined') {

            return ColorStrings[format].to(this.value, this);
          }

          return this.toString();
        }
      }, {
        key: 'toString',
        value: function toString() {
          var value = this.value;

          if (!this._valid) {
            value = this.options.invalidValue;

            if (typeof value === 'string') {

              return value;
            }
          }

          if (value.a === 0 && this.options.zeroAlphaAsTransparent) {

            return ColorStrings.TRANSPARENT.to(value, this);
          }

          var format = void 0;

          if (this._format === false) {
            format = this._matchFormat;
          } else {
            format = this._format;
          }

          if (this.options.reduceAlpha && value.a === 1) {
            switch (format) {
              case 'RGBA':
                format = 'RGB';
                break;
              case 'HSLA':
                format = 'HSL';
                break;
              default:
                break;
            }
          }

          if (value.a !== 1 && format !== 'RGBA' && format !== 'HSLA' && this.options.alphaConvert) {

            if (typeof this.options.alphaConvert === 'string') {
              format = this.options.alphaConvert;
            }

            if (typeof this.options.alphaConvert[format] !== 'undefined') {
              format = this.options.alphaConvert[format];
            }
          }

          return ColorStrings[format].to(value, this);
        }
      }, {
        key: 'get',
        value: function get() {
          return this.value;
        }
      }, {
        key: 'set',
        value: function set(color) {
          this._valid = true;
          var fromRgb = 0;
          var fromHsv = 0;
          var hsv = void 0;
          var rgb = void 0;

          for (var i in color) {

            if ('hsv'.includes(i)) {
              fromHsv++;
              this.value[i] = color[i];
            } else if ('rgb'.includes(i)) {
              fromRgb++;
              this.value[i] = color[i];
            } else if (i === 'a') {
              this.value.a = color.a;
            }
          }

          if (fromRgb > fromHsv) {
            hsv = Converter.RGBtoHSV(this.value);

            if (this.value.r === 0 && this.value.g === 0 && this.value.b === 0) {
              // this.value.h = color.h;
            } else {
              this.value.h = hsv.h;
            }

            this.value.s = hsv.s;
            this.value.v = hsv.v;
          } else if (fromHsv > fromRgb) {
            rgb = Converter.HSVtoRGB(this.value);
            this.value.r = rgb.r;
            this.value.g = rgb.g;
            this.value.b = rgb.b;
          }

          return this;
        }
      }], [{
        key: 'matchString',
        value: function matchString(string) {
          if (typeof string === 'string') {
            string = _jquery2.default.trim(string);
            var matched = null;
            var rgb = void 0;

            for (var i in ColorStrings) {

              if ((matched = ColorStrings[i].match.exec(string)) !== null) {
                rgb = ColorStrings[i].parse(matched);

                if (rgb) {

                  return true;
                }
              }
            }
          }

          return false;
        }
      }, {
        key: 'setDefaults',
        value: function setDefaults(options) {
          _jquery2.default.extend(true, DEFAULTS, _jquery2.default.isPlainObject(options) && options);
        }
      }]);

      return AsColor;
    }();

    var info = {
      version: '0.3.4'
    };

    var OtherAsColor = _jquery2.default.asColor;

    var jQueryAsColor = function jQueryAsColor() {
      for (var _len = arguments.length, args = Array(_len), _key = 0; _key < _len; _key++) {
        args[_key] = arguments[_key];
      }

      return new (Function.prototype.bind.apply(AsColor, [null].concat(args)))();
    };

    _jquery2.default.asColor = jQueryAsColor;
    _jquery2.default.asColor.Constructor = AsColor;

    _jquery2.default.extend(_jquery2.default.asColor, {
      matchString: AsColor.matchString,
      setDefaults: AsColor.setDefaults,
      noConflict: function noConflict() {
        _jquery2.default.asColor = OtherAsColor;

        return jQueryAsColor;
      }
    }, Converter, info);

    var main = _jquery2.default.asColor;

    exports.default = main;
  }
);

/**
* jQuery asGradient v0.3.2
* https://github.com/amazingSurge/jquery-asGradient
*
* Copyright (c) amazingSurge
* Released under the LGPL-3.0 license
*/
(function(global, factory) {
  if (typeof define === "function" && define.amd) {
    define('AsGradient', ['exports', 'jquery', 'jquery-asColor'], factory);
  } else if (typeof exports !== "undefined") {
    factory(exports, require('jquery'), require('jquery-asColor'));
  } else {
    var mod = {
      exports: {}
    };
    factory(mod.exports, global.jQuery, global.AsColor);
    global.AsGradient = mod.exports;
  }
})(this,

  function(exports, _jquery, _jqueryAsColor) {
    'use strict';

    Object.defineProperty(exports, "__esModule", {
      value: true
    });

    var _jquery2 = _interopRequireDefault(_jquery);

    var _jqueryAsColor2 = _interopRequireDefault(_jqueryAsColor);

    function _interopRequireDefault(obj) {
      return obj && obj.__esModule ? obj : {
        default: obj
      };
    }

    var _typeof = typeof Symbol === "function" && typeof Symbol.iterator === "symbol" ?

      function(obj) {
        return typeof obj;
      }
      :

      function(obj) {
        return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj;
      };

    function _classCallCheck(instance, Constructor) {
      if (!(instance instanceof Constructor)) {
        throw new TypeError("Cannot call a class as a function");
      }
    }

    var _createClass = function() {
      function defineProperties(target, props) {
        for (var i = 0; i < props.length; i++) {
          var descriptor = props[i];
          descriptor.enumerable = descriptor.enumerable || false;
          descriptor.configurable = true;

          if ("value" in descriptor)
            descriptor.writable = true;
          Object.defineProperty(target, descriptor.key, descriptor);
        }
      }

      return function(Constructor, protoProps, staticProps) {
        if (protoProps)
          defineProperties(Constructor.prototype, protoProps);

        if (staticProps)
          defineProperties(Constructor, staticProps);

        return Constructor;
      };
    }();

    var DEFAULTS = {
      prefixes: ['-webkit-', '-moz-', '-ms-', '-o-'],
      forceStandard: true,
      angleUseKeyword: true,
      emptyString: '',
      degradationFormat: false,
      cleanPosition: true,
      color: {
        format: false, // rgb, rgba, hsl, hsla, hex
        hexUseName: false,
        reduceAlpha: true,
        shortenHex: true,
        zeroAlphaAsTransparent: false,
        invalidValue: {
          r: 0,
          g: 0,
          b: 0,
          a: 1
        }
      }
    };

    /* eslint no-extend-native: "off" */

    if (!String.prototype.includes) {
      String.prototype.includes = function(search, start) {
        'use strict';

        if (typeof start !== 'number') {
          start = 0;
        }

        if (start + search.length > this.length) {

          return false;
        }

        return this.indexOf(search, start) !== -1;
      }
      ;
    }

    function getPrefix() {
      var ua = window.navigator.userAgent;
      var prefix = '';

      if (/MSIE/g.test(ua)) {
        prefix = '-ms-';
      } else if (/Firefox/g.test(ua)) {
        prefix = '-moz-';
      } else if (/(WebKit)/i.test(ua)) {
        prefix = '-webkit-';
      } else if (/Opera/g.test(ua)) {
        prefix = '-o-';
      }

      return prefix;
    }

    function flip(o) {
      var flipped = {};

      for (var i in o) {

        if (o.hasOwnProperty(i)) {
          flipped[o[i]] = i;
        }
      }

      return flipped;
    }

    function reverseDirection(direction) {
      var mapping = {
        'top': 'bottom',
        'right': 'left',
        'bottom': 'top',
        'left': 'right',
        'right top': 'left bottom',
        'top right': 'bottom left',
        'bottom right': 'top left',
        'right bottom': 'left top',
        'left bottom': 'right top',
        'bottom left': 'top right',
        'top left': 'bottom right',
        'left top': 'right bottom'
      };

      return mapping.hasOwnProperty(direction) ? mapping[direction] : direction;
    }

    function isDirection(n) {
      var reg = /^(top|left|right|bottom)$/i;

      return reg.test(n);
    }

    var keywordAngleMap = {
      'to top': 0,
      'to right': 90,
      'to bottom': 180,
      'to left': 270,
      'to right top': 45,
      'to top right': 45,
      'to bottom right': 135,
      'to right bottom': 135,
      'to left bottom': 225,
      'to bottom left': 225,
      'to top left': 315,
      'to left top': 315
    };

    var angleKeywordMap = flip(keywordAngleMap);

    var RegExpStrings = function() {
      var color = /(?:rgba|rgb|hsla|hsl)\s*\([\s\d\.,%]+\)|#[a-z0-9]{3,6}|[a-z]+/i;
      var position = /\d{1,3}%/i;
      var angle = /(?:to ){0,1}(?:(?:top|left|right|bottom)\s*){1,2}|\d+deg/i;
      var stop = new RegExp('(' + color.source + ')\\s*(' + position.source + '){0,1}', 'i');
      var stops = new RegExp(stop.source, 'gi');
      var parameters = new RegExp('(?:(' + angle.source + ')){0,1}\\s*,{0,1}\\s*(.*?)\\s*', 'i');
      var full = new RegExp('^(-webkit-|-moz-|-ms-|-o-){0,1}(linear|radial|repeating-linear)-gradient\\s*\\(\\s*(' + parameters.source + ')\\s*\\)$', 'i');

      return {
        FULL: full,
        ANGLE: angle,
        COLOR: color,
        POSITION: position,
        STOP: stop,
        STOPS: stops,
        PARAMETERS: new RegExp('^' + parameters.source + '$', 'i')
      };
    }();

    var GradientString = {
      matchString: function matchString(string) {
        var matched = this.parseString(string);

        if (matched && matched.value && matched.value.stops && matched.value.stops.length > 1) {

          return true;
        }

        return false;
      },

      parseString: function parseString(string) {
        string = _jquery2.default.trim(string);
        var matched = void 0;

        if ((matched = RegExpStrings.FULL.exec(string)) !== null) {
          var value = this.parseParameters(matched[3]);

          return {
            prefix: typeof matched[1] === 'undefined' ? null : matched[1],
            type: matched[2],
            value: value
          };
        } else {

          return false;
        }
      },

      parseParameters: function parseParameters(string) {
        var matched = void 0;

        if ((matched = RegExpStrings.PARAMETERS.exec(string)) !== null) {
          var stops = this.parseStops(matched[2]);

          return {
            angle: typeof matched[1] === 'undefined' ? 0 : matched[1],
            stops: stops
          };
        } else {

          return false;
        }
      },

      parseStops: function parseStops(string) {
        var _this = this;

        var matched = void 0;
        var result = [];

        if ((matched = string.match(RegExpStrings.STOPS)) !== null) {

          _jquery2.default.each(matched,

            function(i, item) {
              var stop = _this.parseStop(item);

              if (stop) {
                result.push(stop);
              }
            }
          );

          return result;
        } else {

          return false;
        }
      },

      formatStops: function formatStops(stops, cleanPosition) {
        var stop = void 0;
        var output = [];
        var positions = [];
        var colors = [];
        var position = void 0;

        for (var i = 0; i < stops.length; i++) {
          stop = stops[i];

          if (typeof stop.position === 'undefined' || stop.position === null) {

            if (i === 0) {
              position = 0;
            } else if (i === stops.length - 1) {
              position = 1;
            } else {
              position = undefined;
            }
          } else {
            position = stop.position;
          }
          positions.push(position);
          colors.push(stop.color.toString());
        }

        positions = function(data) {
          var start = null;
          var average = void 0;

          for (var _i = 0; _i < data.length; _i++) {

            if (isNaN(data[_i])) {

              if (start === null) {
                start = _i;
                continue;
              }
            } else if (start) {
              average = (data[_i] - data[start - 1]) / (_i - start + 1);

              for (var j = start; j < _i; j++) {
                data[j] = data[start - 1] + (j - start + 1) * average;
              }
              start = null;
            }
          }

          return data;
        }(positions);

        for (var x = 0; x < stops.length; x++) {

          if (cleanPosition && (x === 0 && positions[x] === 0 || x === stops.length - 1 && positions[x] === 1)) {
            position = '';
          } else {
            position = ' ' + this.formatPosition(positions[x]);
          }

          output.push(colors[x] + position);
        }

        return output.join(', ');
      },

      parseStop: function parseStop(string) {
        var matched = void 0;

        if ((matched = RegExpStrings.STOP.exec(string)) !== null) {
          var position = this.parsePosition(matched[2]);

          return {
            color: matched[1],
            position: position
          };
        } else {

          return false;
        }
      },

      parsePosition: function parsePosition(string) {
        if (typeof string === 'string' && string.substr(-1) === '%') {
          string = parseFloat(string.slice(0, -1) / 100);
        }

        if (typeof string !== 'undefined' && string !== null) {

          return parseFloat(string, 10);
        } else {

          return null;
        }
      },

      formatPosition: function formatPosition(value) {
        return parseInt(value * 100, 10) + '%';
      },

      parseAngle: function parseAngle(string, notStandard) {
        if (typeof string === 'string' && string.includes('deg')) {
          string = string.replace('deg', '');
        }

        if (!isNaN(string)) {

          if (notStandard) {
            string = this.fixOldAngle(string);
          }
        }

        if (typeof string === 'string') {
          var directions = string.split(' ');

          var filtered = [];

          for (var i in directions) {

            if (isDirection(directions[i])) {
              filtered.push(directions[i].toLowerCase());
            }
          }
          var keyword = filtered.join(' ');

          if (!string.includes('to ')) {
            keyword = reverseDirection(keyword);
          }
          keyword = 'to ' + keyword;

          if (keywordAngleMap.hasOwnProperty(keyword)) {
            string = keywordAngleMap[keyword];
          }
        }
        var value = parseFloat(string, 10);

        if (value > 360) {
          value %= 360;
        } else if (value < 0) {
          value %= -360;

          if (value !== 0) {
            value += 360;
          }
        }

        return value;
      },

      fixOldAngle: function fixOldAngle(value) {
        value = parseFloat(value);
        value = Math.abs(450 - value) % 360;
        value = parseFloat(value.toFixed(3));

        return value;
      },

      formatAngle: function formatAngle(value, notStandard, useKeyword) {
        value = parseInt(value, 10);

        if (useKeyword && angleKeywordMap.hasOwnProperty(value)) {
          value = angleKeywordMap[value];

          if (notStandard) {
            value = reverseDirection(value.substr(3));
          }
        } else {

          if (notStandard) {
            value = this.fixOldAngle(value);
          }
          value = value + 'deg';
        }

        return value;
      }
    };

    var ColorStop = function() {
      function ColorStop(color, position, gradient) {
        _classCallCheck(this, ColorStop);

        this.color = (0, _jqueryAsColor2.default)(color, gradient.options.color);
        this.position = GradientString.parsePosition(position);
        this.id = ++gradient._stopIdCount;
        this.gradient = gradient;
      }

      _createClass(ColorStop, [{
        key: 'setPosition',
        value: function setPosition(string) {
          var position = GradientString.parsePosition(string);

          if (this.position !== position) {
            this.position = position;
            this.gradient.reorder();
          }
        }
      }, {
        key: 'setColor',
        value: function setColor(string) {
          this.color.fromString(string);
        }
      }, {
        key: 'remove',
        value: function remove() {
          this.gradient.removeById(this.id);
        }
      }]);

      return ColorStop;
    }();

    var GradientTypes = {
      LINEAR: {
        parse: function parse(result) {
          return {
            r: result[1].substr(-1) === '%' ? parseInt(result[1].slice(0, -1) * 2.55, 10) : parseInt(result[1], 10),
            g: result[2].substr(-1) === '%' ? parseInt(result[2].slice(0, -1) * 2.55, 10) : parseInt(result[2], 10),
            b: result[3].substr(-1) === '%' ? parseInt(result[3].slice(0, -1) * 2.55, 10) : parseInt(result[3], 10),
            a: 1
          };
        },
        to: function to(gradient, instance, prefix) {
          if (gradient.stops.length === 0) {

            return instance.options.emptyString;
          }

          if (gradient.stops.length === 1) {

            return gradient.stops[0].color.to(instance.options.degradationFormat);
          }

          var standard = instance.options.forceStandard;
          var _prefix = instance._prefix;

          if (!_prefix) {
            standard = true;
          }

          if (prefix && -1 !== _jquery2.default.inArray(prefix, instance.options.prefixes)) {
            standard = false;
            _prefix = prefix;
          }

          var angle = GradientString.formatAngle(gradient.angle, !standard, instance.options.angleUseKeyword);
          var stops = GradientString.formatStops(gradient.stops, instance.options.cleanPosition);

          var output = 'linear-gradient(' + angle + ', ' + stops + ')';

          if (standard) {

            return output;
          } else {

            return _prefix + output;
          }
        }
      }
    };

    var AsGradient = function() {
      function AsGradient(string, options) {
        _classCallCheck(this, AsGradient);

        if ((typeof string === 'undefined' ? 'undefined' : _typeof(string)) === 'object' && typeof options === 'undefined') {
          options = string;
          string = undefined;
        }
        this.value = {
          angle: 0,
          stops: []
        };
        this.options = _jquery2.default.extend(true, {}, DEFAULTS, options);

        this._type = 'LINEAR';
        this._prefix = null;
        this.length = this.value.stops.length;
        this.current = 0;
        this._stopIdCount = 0;

        this.init(string);
      }

      _createClass(AsGradient, [{
        key: 'init',
        value: function init(string) {
          if (string) {
            this.fromString(string);
          }
        }
      }, {
        key: 'val',
        value: function val(value) {
          if (typeof value === 'undefined') {

            return this.toString();
          } else {
            this.fromString(value);

            return this;
          }
        }
      }, {
        key: 'angle',
        value: function angle(value) {
          if (typeof value === 'undefined') {

            return this.value.angle;
          } else {
            this.value.angle = GradientString.parseAngle(value);

            return this;
          }
        }
      }, {
        key: 'append',
        value: function append(color, position) {
          return this.insert(color, position, this.length);
        }
      }, {
        key: 'reorder',
        value: function reorder() {
          if (this.length < 2) {

            return;
          }

          this.value.stops = this.value.stops.sort(

            function(a, b) {
              return a.position - b.position;
            }
          );
        }
      }, {
        key: 'insert',
        value: function insert(color, position, index) {
          if (typeof index === 'undefined') {
            index = this.current;
          }

          var stop = new ColorStop(color, position, this);

          this.value.stops.splice(index, 0, stop);

          this.length = this.length + 1;
          this.current = index;

          return stop;
        }
      }, {
        key: 'getById',
        value: function getById(id) {
          if (this.length > 0) {

            for (var i in this.value.stops) {

              if (id === this.value.stops[i].id) {

                return this.value.stops[i];
              }
            }
          }

          return false;
        }
      }, {
        key: 'removeById',
        value: function removeById(id) {
          var index = this.getIndexById(id);

          if (index) {
            this.remove(index);
          }
        }
      }, {
        key: 'getIndexById',
        value: function getIndexById(id) {
          var index = 0;

          for (var i in this.value.stops) {

            if (id === this.value.stops[i].id) {

              return index;
            }
            index++;
          }

          return false;
        }
      }, {
        key: 'getCurrent',
        value: function getCurrent() {
          return this.value.stops[this.current];
        }
      }, {
        key: 'setCurrentById',
        value: function setCurrentById(id) {
          var index = 0;

          for (var i in this.value.stops) {

            if (this.value.stops[i].id !== id) {
              index++;
            } else {
              this.current = index;
            }
          }
        }
      }, {
        key: 'get',
        value: function get(index) {
          if (typeof index === 'undefined') {
            index = this.current;
          }

          if (index >= 0 && index < this.length) {
            this.current = index;

            return this.value.stops[index];
          } else {

            return false;
          }
        }
      }, {
        key: 'remove',
        value: function remove(index) {
          if (typeof index === 'undefined') {
            index = this.current;
          }

          if (index >= 0 && index < this.length) {
            this.value.stops.splice(index, 1);
            this.length = this.length - 1;
            this.current = index - 1;
          }
        }
      }, {
        key: 'empty',
        value: function empty() {
          this.value.stops = [];
          this.length = 0;
          this.current = 0;
        }
      }, {
        key: 'reset',
        value: function reset() {
          this.value._angle = 0;
          this.empty();
          this._prefix = null;
          this._type = 'LINEAR';
        }
      }, {
        key: 'type',
        value: function type(_type) {
          if (typeof _type === 'string' && (_type = _type.toUpperCase()) && typeof GradientTypes[_type] !== 'undefined') {
            this._type = _type;

            return this;
          } else {

            return this._type;
          }
        }
      }, {
        key: 'fromString',
        value: function fromString(string) {
          var _this2 = this;

          this.reset();

          var result = GradientString.parseString(string);

          if (result) {
            this._prefix = result.prefix;
            this.type(result.type);

            if (result.value) {
              this.value.angle = GradientString.parseAngle(result.value.angle, this._prefix !== null);

              _jquery2.default.each(result.value.stops,

                function(i, stop) {
                  _this2.append(stop.color, stop.position);
                }
              );
            }
          }
        }
      }, {
        key: 'toString',
        value: function toString(prefix) {
          if (prefix === true) {
            prefix = getPrefix();
          }

          return GradientTypes[this.type()].to(this.value, this, prefix);
        }
      }, {
        key: 'matchString',
        value: function matchString(string) {
          return GradientString.matchString(string);
        }
      }, {
        key: 'toStringWithAngle',
        value: function toStringWithAngle(angle, prefix) {
          var value = _jquery2.default.extend(true, {}, this.value);
          value.angle = GradientString.parseAngle(angle);

          if (prefix === true) {
            prefix = getPrefix();
          }

          return GradientTypes[this.type()].to(value, this, prefix);
        }
      }, {
        key: 'getPrefixedStrings',
        value: function getPrefixedStrings() {
          var strings = [];

          for (var i in this.options.prefixes) {

            if (Object.hasOwnProperty.call(this.options.prefixes, i)) {
              strings.push(this.toString(this.options.prefixes[i]));
            }
          }

          return strings;
        }
      }], [{
        key: 'setDefaults',
        value: function setDefaults(options) {
          _jquery2.default.extend(true, DEFAULTS, _jquery2.default.isPlainObject(options) && options);
        }
      }]);

      return AsGradient;
    }();

    var info = {
      version: '0.3.2'
    };

    var OtherAsGradient = _jquery2.default.asGradient;

    var jQueryAsGradient = function jQueryAsGradient() {
      for (var _len = arguments.length, args = Array(_len), _key = 0; _key < _len; _key++) {
        args[_key] = arguments[_key];
      }

      return new (Function.prototype.bind.apply(AsGradient, [null].concat(args)))();
    };

    _jquery2.default.asGradient = jQueryAsGradient;
    _jquery2.default.asGradient.Constructor = AsGradient;

    _jquery2.default.extend(_jquery2.default.asGradient, {
      setDefaults: AsGradient.setDefaults,
      noConflict: function noConflict() {
        _jquery2.default.asGradient = OtherAsGradient;

        return jQueryAsGradient;
      }
    }, GradientString, info);

    var main = _jquery2.default.asGradient;

    exports.default = main;
  }
);


var $ut_current_picker = '';

/**
 * asColorPicker v0.4.3
 * https://github.com/amazingSurge/jquery-asColorPicker
 *
 * Copyright (c) amazingSurge
 * Released under the LGPL-3.0 license
 */
(function (global, factory) {
    if (typeof define === "function" && define.amd) {
        define(['jquery', 'jquery-asColor', 'jquery-asGradient'], factory);
    } else if (typeof exports !== "undefined") {
        factory(require('jquery'), require('jquery-asColor'), require('jquery-asGradient'));
    } else {
        var mod = {
            exports: {}
        };
        factory(global.jQuery, global.AsColor, global.AsGradient);
        global.jqueryAsColorPickerEs = mod.exports;
    }
})(this,

    function (_jquery, _jqueryAsColor, _jqueryAsGradient) {
        'use strict';

        var _jquery2 = _interopRequireDefault(_jquery);

        var _jqueryAsColor2 = _interopRequireDefault(_jqueryAsColor);

        var _jqueryAsGradient2 = _interopRequireDefault(_jqueryAsGradient);

        function _interopRequireDefault(obj) {
            return obj && obj.__esModule ? obj : {
                default: obj
            };
        }

        var _typeof = typeof Symbol === "function" && typeof Symbol.iterator === "symbol" ?

            function (obj) {
                return typeof obj;
            } :

            function (obj) {
                return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj;
            };

        function _classCallCheck(instance, Constructor) {
            if (!(instance instanceof Constructor)) {
                throw new TypeError("Cannot call a class as a function");
            }
        }

        var _createClass = function () {
            function defineProperties(target, props) {
                for (var i = 0; i < props.length; i++) {
                    var descriptor = props[i];
                    descriptor.enumerable = descriptor.enumerable || false;
                    descriptor.configurable = true;

                    if ("value" in descriptor)
                        descriptor.writable = true;
                    Object.defineProperty(target, descriptor.key, descriptor);
                }
            }

            return function (Constructor, protoProps, staticProps) {
                if (protoProps)
                    defineProperties(Constructor.prototype, protoProps);

                if (staticProps)
                    defineProperties(Constructor, staticProps);

                return Constructor;
            };
        }();

        var DEFAULTS = {
            namespace: 'asColorPicker',
            readonly: false,
            skin: null,
            lang: 'en',
            hideInput: false,
            hideFireChange: true,
            keyboard: false,
            color: {
                format: false,
                alphaConvert: { // or false will disable convert
                    'RGB': 'RGBA',
                    'HSL': 'HSLA',
                    'HEX': 'RGBA',
                    'NAMESPACE': 'RGBA'
                },
                shortenHex: false,
                hexUseName: false,
                reduceAlpha: true,
                nameDegradation: 'HEX',
                invalidValue: '',
                zeroAlphaAsTransparent: true
            },
            mode: 'simple',
            onInit: null,
            onReady: null,
            onChange: null,
            onClose: null,
            onOpen: null,
            onApply: null
        };

        var MODES = {
            'simple': {
                trigger: true,
                clear: true,
                saturation: true,
                hue: true,
                alpha: true
            },
            'palettes': {
                trigger: true,
                clear: true,
                palettes: true
            },
            'complex': {
                trigger: true,
                clear: true,
                preview: true,
                palettes: true,
                saturation: true,
                hue: true,
                alpha: true,
                hex: true,
                buttons: true
            },
            'gradient': {
                trigger: true,
                clear: true,
                preview: true,
                palettes: true,
                saturation: true,
                hue: true,
                alpha: true,
                hex: true,
                gradient: true
            }
        };

        // alpha
        var alpha = {

            size: 150,

            defaults: {
                direction: 'vertical',
                template: function template(namespace) {
                    return '<div class="' + namespace + '-alpha ' + namespace + '-alpha-' + this.direction + '"><i></i></div>';
                }
            },

            data: {},

            init: function init(api, options) {
                var that = this;

                this.options = _jquery.extend(this.defaults, options);
                that.direction = this.options.direction;
                this.api = api;

                this.$alpha = _jquery(this.options.template.call(that, api.namespace)).appendTo(api.$dropdown);
                this.$handle = this.$alpha.find('i');

                api.$element.on('asColorPicker::firstOpen',

                    function () {
                        // init variable

                        if (that.direction === 'vertical') {
                            that.size = that.$alpha.height();
                        } else {
                            that.size = that.$alpha.width();
                        }
                        that.step = that.size / 360;

                        // bind events
                        that.bindEvents();
                        that.keyboard();
                    }
                );

                api.$element.on('asColorPicker::update asColorPicker::setup',

                    function (e, api, color) {
                        that.update(color);
                    }
                );
            },

            bindEvents: function bindEvents() {
                var that = this;
                this.$alpha.on(this.api.eventName('mousedown'),

                    function (e) {
                        var rightclick = e.which ? e.which === 3 : e.button === 2;

                        if (rightclick) {

                            return false;
                        }
                        _jquery.proxy(that.mousedown, that)(e);
                    }
                );
            },

            mousedown: function mousedown(e) {
                var offset = this.$alpha.offset();

                if (this.direction === 'vertical') {
                    this.data.startY = e.pageY;
                    this.data.top = e.pageY - offset.top;
                    this.move(this.data.top);
                } else {
                    this.data.startX = e.pageX;
                    this.data.left = e.pageX - offset.left;
                    this.move(this.data.left);
                }

                this.mousemove = function (e) {
                    var position = void 0;

                    if (this.direction === 'vertical') {
                        position = this.data.top + (e.pageY || this.data.startY) - this.data.startY;
                    } else {
                        position = this.data.left + (e.pageX || this.data.startX) - this.data.startX;
                    }

                    this.move(position);

                    return false;
                };

                this.mouseup = function () {
                    _jquery(document).off({
                        mousemove: this.mousemove,
                        mouseup: this.mouseup
                    });

                    if (this.direction === 'vertical') {
                        this.data.top = this.data.cach;
                    } else {
                        this.data.left = this.data.cach;
                    }

                    return false;
                };

                _jquery(document).on({
                    mousemove: _jquery.proxy(this.mousemove, this),
                    mouseup: _jquery.proxy(this.mouseup, this)
                });

                return false;
            },

            move: function move(position, alpha, update) {
                position = Math.max(0, Math.min(this.size, position));
                this.data.cach = position;

                if (typeof alpha === 'undefined') {
                    alpha = 1 - position / this.size;
                }
                alpha = Math.max(0, Math.min(1, alpha));

                if (this.direction === 'vertical') {
                    this.$handle.css({
                        top: position
                    });
                } else {
                    this.$handle.css({
                        left: position
                    });
                }

                if (update !== false) {
                    
                    this.api.set({
                        a: Math.round(alpha * 100) / 100
                    });
                    
                }
                
            },

            moveLeft: function moveLeft() {
                var step = this.step;
                var data = this.data;
                data.left = Math.max(0, Math.min(this.width, data.left - step));
                this.move(data.left);
            },

            moveRight: function moveRight() {
                var step = this.step;
                var data = this.data;
                data.left = Math.max(0, Math.min(this.width, data.left + step));
                this.move(data.left);
            },

            moveUp: function moveUp() {
                var step = this.step;
                var data = this.data;
                data.top = Math.max(0, Math.min(this.width, data.top - step));
                this.move(data.top);
            },

            moveDown: function moveDown() {
                var step = this.step;
                var data = this.data;
                data.top = Math.max(0, Math.min(this.width, data.top + step));
                this.move(data.top);
            },

            keyboard: function keyboard() {
                var keyboard = void 0;
                var that = this;

                if (this.api._keyboard) {
                    keyboard = _jquery.extend(true, {}, this.api._keyboard);
                } else {

                    return false;
                }

                this.$alpha.attr('tabindex', '0').on('focus',

                    function () {
                        if (this.direction === 'vertical') {
                            keyboard.attach({
                                up: function up() {
                                    that.moveUp();
                                },
                                down: function down() {
                                    that.moveDown();
                                }
                            });
                        } else {
                            keyboard.attach({
                                left: function left() {
                                    that.moveLeft();
                                },
                                right: function right() {
                                    that.moveRight();
                                }
                            });
                        }

                        return false;
                    }
                ).on('blur',

                    function () {
                        keyboard.detach();
                    }
                );
            },

            update: function update(color) {
                var position = this.size * (1 - color.value.a);
                this.$alpha.css('backgroundColor', color.toHEX());

                this.move(position, color.value.a, false);
            },

            destroy: function destroy() {
                _jquery(document).off({
                    mousemove: this.mousemove,
                    mouseup: this.mouseup
                });
            }
        };

        // hex
        var hex = {
            
            init: function init(api, options) {
                
                var that = this;
                this.options = _jquery.extend(this.defaults, options);
                this.api = api;
                
                var template = '<input type="text" class="' + api.namespace + '-hex" />';
                this.$hex = _jquery(template).appendTo(api.$dropdown);
                
                api.$element.on('asColorPicker::firstOpen',
                
                    function () {
                        that.bindEvents();
                    }
                                
                );
                
                api.$element.on('asColorPicker::update asColorPicker::setup',

                    function(e, api, color) {
                    
                        that.update(color);
                    
                    }
                                
                );
                
            },
            
            bindEvents: function bindEvents() {
                
                var that = this;
                                
                this.$hex.on( this.api.eventName('propertychange keyup'),
                    
                    function(e) {
                    
                        var ut_color_val = _jquery(e.target).val();
                    
                        var charCode = (typeof e.which == "undefined") ? e.keyCode : e.which;                    
                        
                        // input is empty - clear all fields
                        if( ( charCode === 8 || charCode === 46 ) && ut_color_val.length === 0  ) {
                            
                            setTimeout(function() {

                                that.api.set("");
                                _jquery(e.target).val("");

                            }, 100 );                            
                            
                            return;
                            
                        }
                    
                        if( charCode === 8 || charCode === 46 || charCode === 17 || charCode === 65 ) {
                            return;
                        }
                        
                        // remove possible hash
                        ut_color_val = ut_color_val.replace("#","");
                        
                        // add hash
                        if( ut_color_val.indexOf('#') === -1 && ut_color_val.indexOf('rgb') === -1 && ut_color_val.length > 0 ) {
                            ut_color_val = '#' + ut_color_val; 
                        }
                    
                        // wait for a complete string
                        if( ut_color_val.length < 7 ) {
                            return;   
                        }
                    
                        setTimeout(function() {

                            that.api.set( ut_color_val );

                        }, 100 );
                            
                        
                        // console.log( that );
                        // console.log( that.api.color.current );
                        // console.log( _jquery(e.target).val() );
                        // console.log(e);    
                    
                    }
                             
                );
                
                this.$hex.on( this.api.eventName('paste'),
                    
                    function(e) {
                    
                        if( !e.keyCode ) {
                                
                            setTimeout(function() {

                                var ut_color_val = _jquery(e.target).val();
                                
                                ut_color_val = ut_color_val.replace("#","");
                                
                                // check if string has hash
                                if( ut_color_val.indexOf('#') === -1 && ut_color_val.indexOf('rgb') === -1 ) {
                                    ut_color_val = '#' + ut_color_val; 
                                }
                                
                                that.api.set( ut_color_val );

                            }, 100 );    

                        }
                    
                    }
                             
                );
                
            },
                        
            update: function update(color) {
                
                this.$hex.val( color.toHEX() );
                
            }
            
        };

        // hue
        var hue = {
            size: 150,

            defaults: {
                direction: 'vertical',
                template: function template() {
                    var namespace = this.api.namespace;

                    return '<div class="' + namespace + '-hue ' + namespace + '-hue-' + this.direction + '"><i></i></div>';
                }
            },

            data: {},

            init: function init(api, options) {
                var that = this;

                this.options = _jquery.extend(this.defaults, options);
                this.direction = this.options.direction;
                this.api = api;

                this.$hue = _jquery(this.options.template.call(that)).appendTo(api.$dropdown);
                this.$handle = this.$hue.find('i');

                api.$element.on('asColorPicker::firstOpen',

                    function () {
                        // init variable

                        if (that.direction === 'vertical') {
                            that.size = that.$hue.height();
                        } else {
                            that.size = that.$hue.width();
                        }
                        that.step = that.size / 360;

                        // bind events
                        that.bindEvents(api);
                        that.keyboard(api);
                    }
                );

                api.$element.on('asColorPicker::update asColorPicker::setup',

                    function (e, api, color) {
                        that.update(color);
                    }
                );
            },

            bindEvents: function bindEvents() {
                var that = this;
                this.$hue.on(this.api.eventName('mousedown'),

                    function (e) {
                        var rightclick = e.which ? e.which === 3 : e.button === 2;

                        if (rightclick) {

                            return false;
                        }
                        _jquery.proxy(that.mousedown, that)(e);
                    }
                );
            },

            mousedown: function mousedown(e) {
                var offset = this.$hue.offset();

                if (this.direction === 'vertical') {
                    this.data.startY = e.pageY;
                    this.data.top = e.pageY - offset.top;
                    this.move(this.data.top);
                } else {
                    this.data.startX = e.pageX;
                    this.data.left = e.pageX - offset.left;
                    this.move(this.data.left);
                }

                this.mousemove = function (e) {
                    var position = void 0;

                    if (this.direction === 'vertical') {
                        position = this.data.top + (e.pageY || this.data.startY) - this.data.startY;
                    } else {
                        position = this.data.left + (e.pageX || this.data.startX) - this.data.startX;
                    }

                    this.move(position);

                    return false;
                };

                this.mouseup = function () {
                    _jquery(document).off({
                        mousemove: this.mousemove,
                        mouseup: this.mouseup
                    });

                    if (this.direction === 'vertical') {
                        this.data.top = this.data.cach;
                    } else {
                        this.data.left = this.data.cach;
                    }

                    return false;
                };

                _jquery(document).on({
                    mousemove: _jquery.proxy(this.mousemove, this),
                    mouseup: _jquery.proxy(this.mouseup, this)
                });

                return false;
            },

            move: function move(position, hub, update) {
                position = Math.max(0, Math.min(this.size, position));
                this.data.cach = position;

                if (typeof hub === 'undefined') {
                    hub = (1 - position / this.size) * 360;
                }
                hub = Math.max(0, Math.min(360, hub));

                if (this.direction === 'vertical') {
                    this.$handle.css({
                        top: position
                    });
                } else {
                    this.$handle.css({
                        left: position
                    });
                }

                if (update !== false) {
                    this.api.set({
                        h: hub
                    });
                }
            },

            moveLeft: function moveLeft() {
                var step = this.step;
                var data = this.data;
                data.left = Math.max(0, Math.min(this.width, data.left - step));
                this.move(data.left);
            },

            moveRight: function moveRight() {
                var step = this.step;
                var data = this.data;
                data.left = Math.max(0, Math.min(this.width, data.left + step));
                this.move(data.left);
            },

            moveUp: function moveUp() {
                var step = this.step;
                var data = this.data;
                data.top = Math.max(0, Math.min(this.width, data.top - step));
                this.move(data.top);
            },

            moveDown: function moveDown() {
                var step = this.step;
                var data = this.data;
                data.top = Math.max(0, Math.min(this.width, data.top + step));
                this.move(data.top);
            },

            keyboard: function keyboard() {
                var keyboard = void 0;
                var that = this;

                if (this.api._keyboard) {
                    keyboard = _jquery.extend(true, {}, this.api._keyboard);
                } else {

                    return false;
                }

                this.$hue.attr('tabindex', '0').on('focus',

                    function () {
                        if (this.direction === 'vertical') {
                            keyboard.attach({
                                up: function up() {
                                    that.moveUp();
                                },
                                down: function down() {
                                    that.moveDown();
                                }
                            });
                        } else {
                            keyboard.attach({
                                left: function left() {
                                    that.moveLeft();
                                },
                                right: function right() {
                                    that.moveRight();
                                }
                            });
                        }

                        return false;
                    }
                ).on('blur',

                    function () {
                        keyboard.detach();
                    }
                );
            },

            update: function update(color) {
                var position = color.value.h === 0 ? 0 : this.size * (1 - color.value.h / 360);
                this.move(position, color.value.h, false);
            },

            destroy: function destroy() {
                _jquery(document).off({
                    mousemove: this.mousemove,
                    mouseup: this.mouseup
                });
            }
        };

        // saturation
        var saturation = {
            
            defaults: {
                template: function template(namespace) {
                    return '<div class="' + namespace + '-saturation"><i><b></b></i></div>';
                }
            },

            width: 0,
            height: 0,
            size: 6,
            data: {},

            init: function init(api, options) {
                var that = this;
                this.options = _jquery.extend(this.defaults, options);
                this.api = api;

                //build element and add component to picker
                this.$saturation = _jquery(this.options.template.call(that, api.namespace)).appendTo(api.$dropdown);
                this.$handle = this.$saturation.find('i');

                api.$element.on('asColorPicker::firstOpen',

                    function () {
                        // init variable
                        that.width = that.$saturation.width();
                        that.height = that.$saturation.height();
                        that.step = {
                            left: that.width / 20,
                            top: that.height / 20
                        };
                        that.size = that.$handle.width() / 2;

                        // bind events
                        that.bindEvents();
                        that.keyboard(api);
                    }
                );

                api.$element.on('asColorPicker::update asColorPicker::setup',

                    function (e, api, color) {

                        that.update(color);

                    }
                );
                
            },

            bindEvents: function bindEvents() {
                var that = this;

                this.$saturation.on(this.api.eventName('mousedown'),

                    function (e) {
                        var rightclick = e.which ? e.which === 3 : e.button === 2;

                        if (rightclick) {

                            return false;
                        }
                        that.mousedown(e);
                    }
                );
                
            },

            mousedown: function mousedown(e) {
                
                var offset = this.$saturation.offset();

                this.data.startY = e.pageY;
                this.data.startX = e.pageX;
                this.data.top = e.pageY - offset.top;
                this.data.left = e.pageX - offset.left;
                this.data.cach = {};

                this.move(this.data.left, this.data.top);

                this.mousemove = function (e) {
                    var x = this.data.left + (e.pageX || this.data.startX) - this.data.startX;
                    var y = this.data.top + (e.pageY || this.data.startY) - this.data.startY;
                    this.move(x, y);

                    return false;
                };

                this.mouseup = function () {
                    _jquery(document).off({
                        mousemove: this.mousemove,
                        mouseup: this.mouseup
                    });
                    this.data.left = this.data.cach.left;
                    this.data.top = this.data.cach.top;

                    return false;
                };

                _jquery(document).on({
                    mousemove: _jquery.proxy(this.mousemove, this),
                    mouseup: _jquery.proxy(this.mouseup, this)
                });

                return false;
            },

            move: function move(x, y, update) {
                y = Math.max(0, Math.min(this.height, y));
                x = Math.max(0, Math.min(this.width, x));

                if (this.data.cach === undefined) {
                    this.data.cach = {};
                }
                this.data.cach.left = x;
                this.data.cach.top = y;

                this.$handle.css({
                    top: y - this.size,
                    left: x - this.size
                });

                if (update !== false) {
                    this.api.set({
                        s: x / this.width,
                        v: 1 - y / this.height
                    });
                }
            },

            update: function update(color) {
                if (color.value.h === undefined) {
                    color.value.h = 0;
                }
                this.$saturation.css('backgroundColor', _jqueryAsColor2.default.HSLtoHEX({
                    h: color.value.h,
                    s: 1,
                    l: 0.5
                }));

                var x = color.value.s * this.width;
                var y = (1 - color.value.v) * this.height;

                this.move(x, y, false);
            },

            moveLeft: function moveLeft() {
                var step = this.step.left;
                var data = this.data;
                data.left = Math.max(0, Math.min(this.width, data.left - step));
                this.move(data.left, data.top);
            },

            moveRight: function moveRight() {
                var step = this.step.left;
                var data = this.data;
                data.left = Math.max(0, Math.min(this.width, data.left + step));
                this.move(data.left, data.top);
            },

            moveUp: function moveUp() {
                var step = this.step.top;
                var data = this.data;
                data.top = Math.max(0, Math.min(this.width, data.top - step));
                this.move(data.left, data.top);
            },

            moveDown: function moveDown() {
                var step = this.step.top;
                var data = this.data;
                data.top = Math.max(0, Math.min(this.width, data.top + step));
                this.move(data.left, data.top);
            },

            keyboard: function keyboard() {
                var keyboard = void 0;
                var that = this;

                if (this.api._keyboard) {
                    keyboard = _jquery.extend(true, {}, this.api._keyboard);
                } else {

                    return false;
                }

                this.$saturation.attr('tabindex', '0').on('focus',

                    function () {
                        keyboard.attach({
                            left: function left() {
                                that.moveLeft();
                            },
                            right: function right() {
                                that.moveRight();
                            },
                            up: function up() {
                                that.moveUp();
                            },
                            down: function down() {
                                that.moveDown();
                            }
                        });

                        return false;
                    }
                ).on('blur',

                    function () {
                        keyboard.detach();
                    }
                );
            },

            destroy: function destroy() {
                _jquery(document).off({
                    mousemove: this.mousemove,
                    mouseup: this.mouseup
                });
            }
        };

        // buttons
        var buttons = {
            defaults: {
                apply: false,
                cancel: true,
                applyText: null,
                cancelText: null,
                template: function template(namespace) {
                    return '<div class="' + namespace + '-buttons"></div>';
                },
                applyTemplate: function applyTemplate(namespace) {
                    return '<a href="#" alt="' + this.options.applyText + '" class="' + namespace + '-buttons-apply">' + this.options.applyText + '</a>';
                },
                cancelTemplate: function cancelTemplate(namespace) {
                    return '<a href="#" alt="' + this.options.cancelText + '" class="' + namespace + '-buttons-apply">' + this.options.cancelText + '</a>';
                }
            },

            init: function init(api, options) {
                var that = this;

                this.options = _jquery.extend(this.defaults, {
                    applyText: api.getString('applyText', 'apply'),
                    cancelText: api.getString('cancelText', 'cancel')
                }, options);
                this.$buttons = _jquery(this.options.template.call(this, api.namespace)).appendTo(api.$dropdown);

                api.$element.on('asColorPicker::firstOpen',

                    function () {
                        if (that.options.apply) {
                            that.$apply = _jquery(that.options.applyTemplate.call(that, api.namespace)).appendTo(that.$buttons).on('click',

                                function () {
                                    api.apply();

                                    return false;
                                }
                            );
                        }

                        if (that.options.cancel) {
                            that.$cancel = _jquery(that.options.cancelTemplate.call(that, api.namespace)).appendTo(that.$buttons).on('click',

                                function () {
                                    api.cancel();

                                    return false;
                                }
                            );
                        }
                    }
                );
            }
        };

        // trigger
        var trigger = {
            defaults: {
                template: function template(namespace) {
                    return '<div class="' + namespace + '-trigger"><span></span></div>';
                }
            },

            init: function init(api, options) {
                this.options = _jquery.extend(this.defaults, options);
                api.$trigger = _jquery(this.options.template.call(this, api.namespace));
                this.$triggerInner = api.$trigger.children('span');

                api.$trigger.insertAfter(api.$element);
                api.$trigger.on('click',

                    function () {
                        if (!api.opened) {
                            api.open();
                        } else {
                            api.close();
                        }

                        return false;
                    }
                );
                var that = this;
                api.$element.on('asColorPicker::update',

                    function (e, api, color, gradient) {
                        if (typeof gradient === 'undefined') {
                            gradient = false;
                        }
                        that.update(color, gradient);
                    }
                );

                this.update(api.color);
            },

            update: function update(color, gradient) {
                
                if( gradient ) {
                    
                    this.$triggerInner.css('background', gradient.toString(true));
                    
                } else {
                    
                    if( color == '' ) {
                        
                        this.$triggerInner.css('background', 'none' );    
                        
                    } else {
                    
                        this.$triggerInner.css('background', color.toRGBA() );
                        
                    }
                    
                }
            },

            destroy: function destroy(api) {
                api.$trigger.remove();
            }
        };

        // clear
        var clear = {
            defaults: {
                template: function template(namespace) {
                    return '<a href="#" class="' + namespace + '-clear"></a>';
                }
            },

            init: function init(api, options) {
                
                if (api.options.hideInput) {
                    return;
                }
                
                this.options = _jquery.extend(this.defaults, options);
                this.$clear = _jquery(this.options.template.call(this, api.namespace)).insertAfter(api.$element);

                this.$clear.on('click',

                    function () {
                        
                        api.$trigger.children().css("background","transparent"); // clear color preview
                    
                        api.clear();
                        api.close();
                    
                        return false;
                    }
                               
                );
                
            }
        };

        // info
        var info = {
            color: ['white', 'black', 'transparent'],

            init: function init(api) {
                var template = '<ul class="' + api.namespace + '-info"><li><label>R:<input type="text" data-type="r"/></label></li><li><label>G:<input type="text" data-type="g"/></label></li><li><label>B:<input type="text" data-type="b"/></label></li><li><label>A:<input type="text" data-type="a"/></label></li></ul>';
                this.$info = _jquery(template).appendTo(api.$dropdown);
                this.$r = this.$info.find('[data-type="r"]');
                this.$g = this.$info.find('[data-type="g"]');
                this.$b = this.$info.find('[data-type="b"]');
                this.$a = this.$info.find('[data-type="a"]');

                this.$info.on(api.eventName('keyup update change'), 'input',

                    function (e) {
                        var val = void 0;
                        var type = _jquery(e.target).data('type');
                        switch (type) {
                            case 'r':
                            case 'g':
                            case 'b':
                                val = parseInt(this.value, 10);

                                if (val > 255) {
                                    val = 255;
                                } else if (val < 0) {
                                    val = 0;
                                }
                                break;
                            case 'a':
                                val = parseFloat(this.value, 10);

                                if (val > 1) {
                                    val = 1;
                                } else if (val < 0) {
                                    val = 0;
                                }
                                break;
                            default:
                                break;
                        }

                        if (isNaN(val)) {
                            val = 0;
                        }
                        var color = {};
                        color[type] = val;
                        api.set(color);
                    }
                );

                var that = this;
                api.$element.on('asColorPicker::update asColorPicker::setup',

                    function (e, color) {
                        that.update(color);
                    }
                );
            },

            update: function update(color) {
                this.$r.val(color.value.r);
                this.$g.val(color.value.g);
                this.$b.val(color.value.b);
                this.$a.val(color.value.a);
            }

        };

        // palettes

        function noop() {
            return;
        }

        if (!window.localStorage) {
            window.localStorage = noop;
        }

        var palettes = {
            defaults: {
                template: function template(namespace) {
                    return '<ul class="' + namespace + '-palettes"></ul>';
                },
                item: function item(namespace, color) {
                    return '<li data-color="' + color + '"><span style="background-color:' + color + '" /></li>';
                },

                colors: ['white', 'black', 'red', 'blue', 'yellow'],
                max: 10,
                localStorage: true
            },

            init: function init(api, options) {
                var that = this;
                var colors = void 0;
                var asColor = (0, _jqueryAsColor2.default)();

                this.options = _jquery.extend(true, {}, this.defaults, options);
                this.colors = [];
                var localKey = void 0;

                if (this.options.localStorage) {
                    localKey = api.namespace + '_palettes_' + api.id;
                    colors = this.getLocal(localKey);

                    if (!colors) {
                        colors = this.options.colors;
                        this.setLocal(localKey, colors);
                    }
                } else {
                    colors = this.options.colors;
                }

                for (var i in colors) {

                    if (Object.hasOwnProperty.call(colors, i)) {
                        this.colors.push(asColor.val(colors[i]).toRGBA());
                    }
                }

                var list = '';
                _jquery.each(this.colors,

                    function (i, color) {
                        list += that.options.item(api.namespace, color);
                    }
                );

                this.$palettes = _jquery(this.options.template.call(this, api.namespace)).html(list).appendTo(api.$dropdown);

                this.$palettes.on(api.eventName('click'), 'li',

                    function (e) {
                        var color = _jquery(this).data('color');
                        api.set(color);

                        e.preventDefault();
                        e.stopPropagation();
                    }
                );

                api.$element.on('asColorPicker::apply',

                    function (e, api, color) {
                    
                        if (typeof color.toRGBA !== 'function') {
                            color = color.get().color;
                        }

                        var rgba = color.toRGBA();

                        if (_jquery.inArray(rgba, that.colors) === -1) {

                            if (that.colors.length >= that.options.max) {
                                that.colors.shift();
                                that.$palettes.find('li').eq(0).remove();
                            }

                            that.colors.push(rgba);

                            that.$palettes.append(that.options.item(api.namespace, color));

                            if (that.options.localStorage) {
                                that.setLocal(localKey, that.colors);
                            }
                        }
                    }
                );
            },

            setLocal: function setLocal(key, value) {
                var jsonValue = JSON.stringify(value);

                localStorage[key] = jsonValue;
            },

            getLocal: function getLocal(key) {
                var value = localStorage[key];

                return value ? JSON.parse(value) : value;
            }
        };

        // preview
        var preview = {
            defaults: {
                template: function template(namespace) {
                    return '<ul class="' + namespace + '-preview"><li class="' + namespace + '-preview-current"><span /></li><li class="' + namespace + '-preview-previous"><span /></li></ul>';
                }
            },

            init: function init(api, options) {
                var that = this;
                this.options = _jquery.extend(this.defaults, options);
                this.$preview = _jquery(this.options.template.call(that, api.namespace)).appendTo(api.$dropdown);
                this.$current = this.$preview.find('.' + api.namespace + '-preview-current span');
                this.$previous = this.$preview.find('.' + api.namespace + '-preview-previous span');

                api.$element.on('asColorPicker::firstOpen',

                    function () {
                        that.$previous.on('click',

                            function () {
                                api.set(_jquery(this).data('color'));

                                return false;
                            }
                        );
                    }
                );

                api.$element.on('asColorPicker::setup',

                    function (e, api, color) {
                        that.updateCurrent(color);
                        that.updatePreview(color);
                    }
                );
                api.$element.on('asColorPicker::update',

                    function (e, api, color) {
                        that.updateCurrent(color);
                    }
                );
            },

            updateCurrent: function updateCurrent(color) {
                this.$current.css('backgroundColor', color.toRGBA());
            },

            updatePreview: function updatePreview(color) {
                this.$previous.css('backgroundColor', color.toRGBA());
                this.$previous.data('color', {
                    r: color.value.r,
                    g: color.value.g,
                    b: color.value.b,
                    a: color.value.a
                });
            }
        };

        // gradient

        function conventToPercentage(n) {
            if (n < 0) {
                n = 0;
            } else if (n > 1) {
                n = 1;
            }

            return n * 100 + '%';
        }

        var Gradient = function Gradient(api, options) {
            this.api = api;
            this.options = options;
            this.classes = {
                enable: api.namespace + '-gradient_enable',
                marker: api.namespace + '-gradient-marker',
                active: api.namespace + '-gradient-marker_active',
                focus: api.namespace + '-gradient_focus'
            };
            this.isEnabled = false;
            this.initialized = false;
            this.current = null;
            this.value = (0, _jqueryAsGradient2.default)(this.options.settings);
            this.$doc = _jquery(document);

            var that = this;
            _jquery.extend(that, {
                init: function init() {
                    that.$wrap = _jquery(that.options.template.call(that)).appendTo(api.$dropdown);

                    that.$gradient = that.$wrap.filter('.' + api.namespace + '-gradient');

                    this.angle.init();
                    this.preview.init();
                    this.markers.init();
                    this.wheel.init();

                    this.bind();

                    if (that.options.switchable === false || this.value.matchString(api.element.value)) {
                        that.enable();
                    }
                    this.initialized = true;
                },
                bind: function bind() {
                    var namespace = api.namespace;

                    that.$gradient.on('update',

                        function () {
                            var current = that.value.getById(that.current);

                            if (current) {
                                api._trigger('update', current.color, that.value);
                            }

                            if (api.element.value !== that.value.toString()) {
                                api._updateInput();
                            }
                        }
                    );

                    // that.$gradient.on('add', function(e, data) {
                    //   if (data.stop) {
                    //     that.active(data.stop.id);
                    //     api._trigger('update', data.stop.color, that.value);
                    //     api._updateInput();
                    //   }
                    // });

                    if (that.options.switchable) {
                        that.$wrap.on('click', '.' + namespace + '-gradient-switch',

                            function () {
                                if (that.isEnabled) {

                                    that.$wrap.find('.' + namespace + '-gradient-switch').text("Add Gradient");
                                    that.disable();

                                } else {

                                    that.$wrap.find('.' + namespace + '-gradient-switch').text("Remove Gradient");
                                    that.enable();

                                }

                                return false;
                            }
                        );
                    }

                    that.$wrap.on('click', '.' + namespace + '-gradient-cancel',

                        function () {
                            if (that.options.switchable === false || _jqueryAsGradient2.default.matchString(api.originValue)) {
                                that.overrideCore();
                            }

                            api.cancel();

                            return false;
                        }
                    );
                },
                overrideCore: function overrideCore() {

                    api.set = function (value) {
                        
                        if (value !== '') {
                            api.isEmpty = false;
                        } else {
                            api.isEmpty = true;
                        }

                        if(typeof value === 'string') {
                        
                            if (that.options.switchable === false || _jqueryAsGradient2.default.matchString(value) ) {

                                if (that.isEnabled) {
                                    
                                    that.val(value);
                                    api.color = that.value;
                                    that.$gradient.trigger('update', that.value.value);
                                    
                                } else {
                                    
                                    that.enable(value);
                                    
                                }
                                
                            } else {
                                
                                if (that.isEnabled) {
                                    
                                    var current = that.value.getById(that.current);
                                    
                                    if(current) {
                                        
                                        current.color.val(value);
                                        api._trigger('update', current.color, that.value);
                                        
                                    }
                                    
                                    that.$gradient.trigger('update', {
                                        id: that.current,
                                        stop: current
                                    });
                                    
                                } else {
                                    
                                    that.disable();
                                    api.val(value);
                                    
                                }                                
                                
                            }
                            
                        } else {
                            
                            var current = that.value.getById(that.current);

                            if (current) {
                                current.color.val(value);
                                api._trigger('update', current.color, that.value);
                            }

                            that.$gradient.trigger('update', {
                                id: that.current,
                                stop: current
                            });
                        }
                    };

                    api._setup = function () {
                        var current = that.value.getById(that.current);

                        api._trigger('setup', current.color);
                    };
                },
                revertCore: function revertCore() {
                    api.set = _jquery.proxy(api._set, api);
                    api._setup = function () {
                        api._trigger('setup', api.color);
                    };
                },

                preview: {
                    init: function init() {
                        var _this = this;

                        that.$preview = that.$gradient.find('.' + api.namespace + '-gradient-preview');

                        that.$gradient.on('add del update empty',

                            function () {
                                _this.render();
                            }
                        );
                    },
                    render: function render() {
                        that.$preview.css({
                            'background-image': that.value.toStringWithAngle('to right', true)
                        });
                        that.$preview.css({
                            'background-image': that.value.toStringWithAngle('to right')
                        });
                    }
                },
                markers: {
                    width: 200,
                    init: function init() {
                        var _this2 = this;

                        that.$markers = that.$gradient.find('.' + api.namespace + '-gradient-markers').attr('tabindex', 0);

                        that.$gradient.on('add',

                            function (e, data) {
                                _this2.add(data.stop);
                            }

                        );

                        that.$gradient.on('active',

                            function (e, data) {
                                _this2.active(data.id);
                            }
                        );

                        that.$gradient.on('del',

                            function (e, data) {
                                _this2.del(data.id);
                            }
                        );

                        that.$gradient.on('update',

                            function (e, data) {
                                if (data.stop) {
                                    _this2.update(data.stop.id, data.stop.color);
                                }
                            }
                        );

                        that.$gradient.on('empty',

                            function () {
                                _this2.empty();
                            }
                        );

                        that.$markers.on(that.api.eventName('mousedown'),

                            function (e) {
                                var rightclick = e.which ? e.which === 3 : e.button === 2;

                                if (rightclick) {

                                    return false;
                                }

                                var position = parseFloat((e.pageX - that.$markers.offset().left) / 200, 10);
                                that.add('#fff', position);

                                return false;
                            }
                        );

                        /* eslint consistent-this: "off" */
                        var self = this;
                        that.$markers.on(that.api.eventName('mousedown'), 'li',

                            function (e) {
                                
                                var rightclick = e.which ? e.which === 3 : e.button === 2;

                                if (rightclick) {

                                    return false;
                                }
                            
                                self.mousedown(this, e);

                                return false;
                            
                            }
                                         
                        );

                        that.$markers.on("click", "a",

                            function (e) {

                                if (that.value.length <= 2) {
                                    return false;
                                }

                                that.del(that.current);

                                return false;

                            }

                        );

                        that.$doc.on(that.api.eventName('keydown'),

                            function (e) {
                                if (that.api.opened && that.$markers.is('.' + that.classes.focus)) {

                                    var key = e.keyCode || e.which;

                                    if (key === 46 || key === 8) {

                                        if (that.value.length <= 2) {

                                            return false;
                                        }

                                        that.del(that.current);

                                        return false;
                                    }
                                }
                            }
                        );

                        that.$markers.on(that.api.eventName('focus'),

                            function () {
                                that.$markers.addClass(that.classes.focus);
                            }
										 
                        ).on(that.api.eventName('blur'),

                            function () {
                                that.$markers.removeClass(that.classes.focus);
                            }
							 
                        );

                        that.$markers.on(that.api.eventName('click'), 'li',

                            function () {
                                var id = _jquery(this).data('id');
                                that.active(id);
                            }
										 
                        );
                    },
                    getMarker: function getMarker(id) {
                        return that.$markers.find('[data-id="' + id + '"]');
                    },
                    update: function update(id, color) {
                        var $marker = this.getMarker(id);
                        $marker.find('span').css('background-color', color.toHEX());
                        $marker.find('i').css('background-color', color.toHEX());
                    },
                    add: function add(stop) {
                        _jquery('<li data-id="' + stop.id + '" style="left:' + conventToPercentage(stop.position) + '" class="' + that.classes.marker + '"><a href="#" class="asColorPicker-gradient-marker-delete"></a><span style="background-color: ' + stop.color.toHEX() + '"></span><i style="background-color: ' + stop.color.toHEX() + '"></i></li>').appendTo(that.$markers);
                    },
                    empty: function empty() {
                        that.$markers.html('');
                    },
                    del: function del(id) {
                        var $marker = this.getMarker(id);
                        var $to = $marker.prev();

                        if ($to.length === 0) {
                            $to = $marker.next();
                        }

                        that.active($to.data('id'));
                        $marker.remove();
                    },
                    active: function active(id) {
                        that.$markers.children().removeClass(that.classes.active);

                        var $marker = this.getMarker(id);
                        $marker.addClass(that.classes.active);

                        that.$markers.focus();
                        that.api._trigger('update', that.value.getById(id).color);


                    },
                    mousedown: function mousedown(marker, e) {
                        var self = this;
                        /* eslint consistent-this: "off" */
                        var id = _jquery(marker).data('id');
                        var first = _jquery(marker).position().left;
                        var start = e.pageX;
                        var end = void 0;

                        this.mousemove = function (e) {
                            end = e.pageX || start;
                            var position = (first + end - start) / 200;

                            self.move(marker, position, id);
                            return false;
                        };

                        this.mouseup = function () {
                            _jquery(document).off({
                                mousemove: this.mousemove,
                                mouseup: this.mouseup
                            });

                            return false;
                        };

                        that.$doc.on({
                            mousemove: _jquery.proxy(this.mousemove, this),
                            mouseup: _jquery.proxy(this.mouseup, this)
                        });
                        that.active(id);

                        return false;
                    },
                    move: function move(marker, position, id) {
                        that.api.isEmpty = false;
                        position = Math.max(0, Math.min(1, position));
                        _jquery(marker).css({
                            left: conventToPercentage(position)
                        });

                        if (!id) {
                            id = _jquery(marker).data('id');
                        }

                        that.value.getById(id).setPosition(position);

                        that.$gradient.trigger('update', {
                            id: _jquery(marker).data('id'),
                            position: position
                        });
                    }
                },
                wheel: {
                    init: function init() {
                        var _this3 = this;

                        that.$wheel = that.$gradient.find('.' + api.namespace + '-gradient-wheel');
                        that.$pointer = that.$wheel.find('i');

                        that.$gradient.on('update',

                            function (e, data) {
                                if (typeof data.angle !== 'undefined') {
                                    _this3.position(data.angle);
                                }
                            }
                        );

                        that.$wheel.on(that.api.eventName('mousedown'),

                            function (e) {
                                var rightclick = e.which ? e.which === 3 : e.button === 2;

                                if (rightclick) {

                                    return false;
                                }
                                _this3.mousedown(e, that);

                                return false;
                            }
                        );
                    },
                    mousedown: function mousedown(e, that) {
                        var _this4 = this;

                        var offset = that.$wheel.offset();
                        var r = that.$wheel.width() / 2;
                        var startX = offset.left + r;
                        var startY = offset.top + r;
                        var $doc = that.$doc;

                        this.r = r;

                        this.wheelMove = function (e) {
                            var x = e.pageX - startX;
                            var y = startY - e.pageY;

                            var position = _this4.getPosition(x, y);
                            var angle = _this4.calAngle(position.x, position.y);
                            that.api.isEmpty = false;
                            that.setAngle(angle);
                        };
                        this.wheelMouseup = function () {
                            $doc.off({
                                mousemove: this.wheelMove,
                                mouseup: this.wheelMouseup
                            });

                            return false;
                        };
                        $doc.on({
                            mousemove: _jquery.proxy(this.wheelMove, this),
                            mouseup: _jquery.proxy(this.wheelMouseup, this)
                        });

                        this.wheelMove(e);
                    },
                    getPosition: function getPosition(a, b) {
                        var r = this.r;
                        var x = a / Math.sqrt(a * a + b * b) * r;
                        var y = b / Math.sqrt(a * a + b * b) * r;

                        return {
                            x: x,
                            y: y
                        };
                    },
                    calAngle: function calAngle(x, y) {
                        var deg = Math.round(Math.atan(Math.abs(x / y)) * (180 / Math.PI));

                        if (x < 0 && y > 0) {

                            return 360 - deg;
                        }

                        if (x < 0 && y <= 0) {

                            return deg + 180;
                        }

                        if (x >= 0 && y <= 0) {

                            return 180 - deg;
                        }

                        if (x >= 0 && y > 0) {

                            return deg;
                        }
                    },
                    set: function set(value) {
                        that.value.angle(value);
                        that.$gradient.trigger('update', {
                            angle: value
                        });
                    },
                    position: function position(angle) {
                        var r = this.r || that.$wheel.width() / 2;
                        var pos = this.calPointer(angle, r);
                        that.$pointer.css({
                            left: pos.x,
                            top: pos.y
                        });
                    },
                    calPointer: function calPointer(angle, r) {
                        var x = Math.sin(angle * Math.PI / 180) * r;
                        var y = Math.cos(angle * Math.PI / 180) * r;

                        return {
                            x: r + x,
                            y: r - y
                        };
                    }
                },
                angle: {
                    init: function init() {
                        that.$angle = that.$gradient.find('.' + api.namespace + '-gradient-angle');

                        that.$angle.on(that.api.eventName('blur'),

                            function () {
                                that.setAngle(this.value);

                                return false;
                            }
                        ).on(that.api.eventName('keydown'),

                            function (e) {
                                var key = e.keyCode || e.which;

                                if (key === 13) {
                                    that.api.isEmpty = false;
                                    _jquery(this).blur();

                                    return false;
                                }
                            }
                        );

                        that.$gradient.on('update',

                            function (e, data) {
                                if (typeof data.angle !== 'undefined') {
                                    that.$angle.val(data.angle);
                                }
                            }
                        );
                    },
                    set: function set(value) {
                        that.value.angle(value);
                        that.$gradient.trigger('update', {
                            angle: value
                        });
                    }
                }
            });

            this.init();
        };

        Gradient.prototype = {
            constructor: Gradient,

            enable: function enable(value) {
                if (this.isEnabled === true) {

                    return;
                }
                this.isEnabled = true;
                this.overrideCore();

                this.$gradient.addClass(this.classes.enable);
                this.$wrap.find('.' + this.api.namespace + '-gradient-switch').text("Remove Gradient");

                this.markers.width = this.$markers.width();

                if (typeof value === 'undefined') {
                    value = this.api.element.value;
                }

                if (value !== '') {
                    this.api.isEmpty = false;
                } else {
                    this.api.isEmpty = true;
                }

                if (!_jqueryAsGradient2.default.matchString(value) && this._last) {
                    this.value = this._last;
                } else {
                    this.val(value);
                }
                this.api.color = this.value;

                this.$gradient.trigger('update', this.value.value);

                if (this.api.opened) {
                    this.api.position();
                }
            },
            val: function val(string) {
                if (string !== '' && this.value.toString() === string) {

                    return;
                }
                this.empty();
                this.value.val(string);
                this.value.reorder();

                if (this.value.length < 2) {
                    var fill = string;

                    if (!_jqueryAsColor2.default.matchString(string)) {
                        fill = 'rgba(0,0,0,1)';
                    }

                    if (this.value.length === 0) {
                        this.value.append(fill, 0);
                    }

                    if (this.value.length === 1) {
                        this.value.append(fill, 1);
                    }
                }

                var stop = void 0;

                for (var i = 0; i < this.value.length; i++) {
                    stop = this.value.get(i);

                    if (stop) {
                        this.$gradient.trigger('add', {
                            stop: stop
                        });
                    }
                }

                this.active(stop.id);
            },
            disable: function disable() {
                if (this.isEnabled === false) {

                    return;
                }
                this.isEnabled = false;
                this.revertCore();

                this.$gradient.removeClass(this.classes.enable);
                this.$wrap.find('.' + this.api.namespace + '-gradient-switch').text("Add Gradient");
                this._last = this.value;
                this.api.color = this.api.color.getCurrent().color;
                this.api.set(this.api.color.value);

                if (this.api.opened) {
                    this.api.position();
                }
            },
            active: function active(id) {
                if (this.current !== id) {
                    this.current = id;
                    this.value.setCurrentById(id);

                    this.$gradient.trigger('active', {
                        id: id
                    });
                }
            },
            empty: function empty() {
                this.value.empty();
                this.$gradient.trigger('empty');
            },
            add: function add(color, position) {
                var stop = this.value.insert(color, position);
                this.api.isEmpty = false;
                this.value.reorder();

                this.$gradient.trigger('add', {
                    stop: stop
                });

                this.active(stop.id);

                this.$gradient.trigger('update', {
                    stop: stop
                });

                return stop;
            },
            del: function del(id) {
                
                if (this.value.length <= 2) {
                    return;
                }
                
                this.value.removeById(id);
                this.value.reorder();
                this.$gradient.trigger('del', {
                    id: id
                });

                this.$gradient.trigger('update', {});
            },
            setAngle: function setAngle(value) {
                this.value.angle(value);
                this.$gradient.trigger('update', {
                    angle: value
                });
            }
        };

        var gradient = {
            defaults: {
                switchable: true,
                switchText: 'Add Gradient',
                cancelText: 'Cancel',
                saveText: 'Apply',
                settings: {
                    forceStandard: true,
                    angleUseKeyword: true,
                    emptyString: '',
                    degradationFormat: false,
                    cleanPosition: false,
                    color: {
                        format: 'rgb' // rgb, rgba, hsl, hsla, hex
                    }
                },
                template: function template() {
                    var namespace = this.api.namespace;
                    var control = '<div class="' + namespace + '-gradient-control">';

                    //control += '<a href="#" class="' + namespace + '-gradient-save">' + this.options.saveText + '</a>';       

                    if (this.options.switchable) {
                        control += '<a href="#" class="' + namespace + '-gradient-switch">' + this.options.switchText + '</a>';
                    }

                    control += '<a href="#" class="' + namespace + '-gradient-cancel">' + this.options.cancelText + '</a></div>';

                    return control + '<div class="' + namespace + '-gradient"><div class="' + namespace + '-gradient-preview"><ul class="' + namespace + '-gradient-markers"></ul></div><div class="' + namespace + '-gradient-wheel"><i></i></div><input class="' + namespace + '-gradient-angle" type="text" value="" size="3" /></div>';
                }
            },

            init: function init(api, options) {
                var that = this;

                api.$element.on('asColorPicker::ready',

                    function (event, instance) {
                        if (instance.options.mode !== 'gradient') {

                            return;
                        }

                        that.defaults.settings.color = api.options.color;
                        options = _jquery.extend(true, that.defaults, options);

                        api.gradient = new Gradient(api, options);
                    }
                );
            }
        };

        var NAMESPACE$1 = 'asColorPicker';
        var COMPONENTS = {};
        var LOCALIZATIONS = {
            en: {
                cancelText: 'cancel',
                applyText: 'apply'
            }
        };

        var id = 0;

        function createId(api) {
            api.id = id;
            id++;
        }

        var AsColorPicker = function () {
            function AsColorPicker(element, options) {
                _classCallCheck(this, AsColorPicker);

                this.element = element;
                this.$element = (0, _jquery2.default)(element);
					
                //flag
                this.opened = false;
                this.firstOpen = true;
                this.disabled = false;
                this.initialed = false;
                this.originValue = this.element.value;
                this.isEmpty = false;

                createId(this);

                this.options = _jquery2.default.extend(true, {}, DEFAULTS, options, this.$element.data());
                this.namespace = this.options.namespace;

                this.classes = {
                    wrap: this.namespace + '-wrap',
                    dropdown: this.namespace + '-dropdown',
                    input: this.namespace + '-input',
                    skin: this.namespace + '_' + this.options.skin,
                    open: this.namespace + '_open',
                    mask: this.namespace + '-mask',
                    hideInput: this.namespace + '_hideInput',
                    disabled: this.namespace + '_disabled',
                    mode: this.namespace + '-mode_' + this.options.mode
                };

                if (this.options.hideInput) {
                    this.$element.addClass(this.classes.hideInput);
                }

                this.components = MODES[this.options.mode];
                this._components = _jquery2.default.extend(true, {}, COMPONENTS);

                this._trigger('init');
                this.init();
            }

            _createClass(AsColorPicker, [{
                key: '_trigger',
                value: function _trigger(eventType) {
                    for (var _len = arguments.length, params = Array(_len > 1 ? _len - 1 : 0), _key = 1; _key < _len; _key++) {
                        params[_key - 1] = arguments[_key];
                    }

                    var data = [this].concat(params);

                    // event
                    this.$element.trigger(NAMESPACE$1 + '::' + eventType, data);

                    // callback
                    eventType = eventType.replace(/\b\w+\b/g,

                        function (word) {
                            return word.substring(0, 1).toUpperCase() + word.substring(1);
                        }
                    );
                    var onFunction = 'on' + eventType;

                    if (typeof this.options[onFunction] === 'function') {
                        this.options[onFunction].apply(this, params);
                    }
                }
            }, {
                key: 'eventName',
                value: function eventName(events) {
                    if (typeof events !== 'string' || events === '') {

                        return '.' + this.options.namespace;
                    }
                    events = events.split(' ');

                    var length = events.length;

                    for (var i = 0; i < length; i++) {
                        events[i] = events[i] + '.' + this.options.namespace;
                    }

                    return events.join(' ');
                }
            }, {
                key: 'init',
                value: function init() {
                    this.color = (0, _jqueryAsColor2.default)(this.element.value, this.options.color);

                    this._create();

                    if (this.options.skin) {
                        this.$dropdown.addClass(this.classes.skin);
                        this.$element.parent().addClass(this.classes.skin);
                    }

                    if (this.options.readonly) {
                        this.$element.prop('readonly', true);
                    }

                    this._bindEvent();

                    this.initialed = true;
                    this._trigger('ready');
                }
            }, {
                key: '_create',
                value: function _create() {
                    var _this5 = this;

                    this.$dropdown = (0, _jquery2.default)('<div class="' + this.classes.dropdown + '" data-mode="' + this.options.mode + '"></div>');
                    this.$element.wrap('<div class="' + this.classes.wrap + '"></div>').addClass(this.classes.input);

                    this.$wrap = this.$element.parent();
                    this.$body = (0, _jquery2.default)('body');

                    this.$dropdown.data(NAMESPACE$1, this);

                    var component = void 0;
                    _jquery2.default.each(this.components,

                        function (key, options) {
                            if (options === true) {
                                options = {};
                            }

                            if (_this5.options[key] !== undefined) {
                                options = _jquery2.default.extend(true, {}, options, _this5.options[key]);
                            }

                            if (Object.hasOwnProperty.call(_this5._components, key)) {
                                component = _this5._components[key];
                                component.init(_this5, options);
                            }
                        }
                    );

                    this._trigger('create');
                }
            }, {
                key: '_bindEvent',
                value: function _bindEvent() {
                    
                    var _this6 = this;

                    this.$element.on(this.eventName('click'),

                        function(e) {
                        
                            if (!_this6.opened) {
                                _this6.open();
                            }

                            return false;
                        
                        }
                    );

                    this.$element.on(this.eventName('keydown'),

                        function (e) {
                        
							var ut_color_val = _this6.element.value;
						
                            var charCode = (typeof e.which == "undefined") ? e.keyCode : e.which;
							
							// input is empty - clear all fields
							if( ( charCode === 8 || charCode === 46 ) && ut_color_val.length === 0  ) {
								
								setTimeout(function() {

									_this6.clear();
                        			_this6.close();

								}, 100 );                            

								return;

							}
						
						
                            if( charCode === 8 || charCode === 46 || charCode === 17 || charCode === 65 ) {
                                return;
                            }
                        
                            if (e.keyCode === 9) {
                                
                                _this6.close();
                                
                            } else if (e.keyCode === 13) {
                                
                                ut_color_val = ut_color_val.replace("#","");
                                
                                // check if string has hash and is no RGB / RGBA Color
                                if( ut_color_val.indexOf('#') === -1 && ut_color_val.indexOf('rgb') === -1 ) {
                                    ut_color_val = '#' + ut_color_val; 
                                }

                                if (_this6.color.matchString(ut_color_val)) {
                                    
                                    _this6.val(ut_color_val);                                    
                                    
                                }
                                
                                _this6.close();
                                
                            }
                        
                        }
                    );

                    this.$element.on(this.eventName('keyup'),

                        function (e) {
                            
                            var ut_color_val = _this6.element.value;
						
                            var charCode = (typeof e.which == "undefined") ? e.keyCode : e.which;
							
							// input is empty - clear all fields
							if( ( charCode === 8 || charCode === 46 ) && ut_color_val.length === 0  ) {
								
								setTimeout(function() {

									_this6.clear();
                        			_this6.close();

								}, 100 );                            

								return;

							}
                    		
                            if( charCode === 8 || charCode === 46 || charCode === 17 || charCode === 65 ) {
                                return;
                            }
                            
                            ut_color_val = ut_color_val.replace("#","");
                            
                            // check if string has hash and is no RGB / RGBA Color
                            if( ut_color_val.indexOf('#') === -1 && ut_color_val.indexOf('rgb') === -1 ) {
                                ut_color_val = '#' + ut_color_val; 
                            }
                        
                            if (_this6.color.matchString(ut_color_val)) {
                                
                                _this6.val(ut_color_val);
                                
                            }
                               
                        
                        }
                                     
                    );
                    
                    this.$element.on(this.eventName('propertychange'),

                        function (e) {
                            
                            var charCode = (typeof e.which == "undefined") ? e.keyCode : e.which;
                        
                            if( charCode === 8 || charCode === 46 || charCode === 17 || charCode === 65 ) {
                                return;
                            }                        
                        
                            var ut_color_val = _this6.element.value;
                            
                            ut_color_val = ut_color_val.replace("#","");
                        
                            // check if string has hash and is no RGB / RGBA Color
                            if( ut_color_val.indexOf('#') === -1 && ut_color_val.indexOf('rgb') === -1 ) {
                                ut_color_val = '#' + ut_color_val; 
                            }
                        
                            if(_this6.color.matchString( ut_color_val )) {
                                
                                _this6.val(ut_color_val);
                                
                            }
                            
                        }
                                     
                    );
                    
                    this.$element.on(this.eventName('paste'),

                        function(e) {
                        
                            if( !e.keyCode ) {
                                
                                setTimeout(function() {
                                
                                    var ut_color_val = _this6.element.value;
                                    
                                     ut_color_val = ut_color_val.replace("#","");
                                    
                                    // check if string has hash
                                    if( ut_color_val.indexOf('#') === -1 && ut_color_val.indexOf('rgb') === -1 ) {
                                        ut_color_val = '#' + ut_color_val; 
                                    }

                                    if (_this6.color.matchString(ut_color_val)) {
                                        _this6.val(ut_color_val);
                                    }
                                    
                                }, 100 );    
                        
                            }
                        
                        }
                    );
                    
                }
            }, {
                key: 'opacity',
                value: function opacity(v) {
                    if (v) {
                        this.color.alpha(v);
                    } else {

                        return this.color.alpha();
                    }
                }
            }, {
                key: 'position',
                value: function position() {
                    var hidden = !this.$element.is(':visible');
                    var offset = hidden ? this.$trigger.offset() : this.$element.offset();
                    var height = hidden ? this.$trigger.outerHeight() : this.$element.outerHeight();
                    var width = hidden ? this.$trigger.outerWidth() : this.$element.outerWidth() + this.$trigger.outerWidth();
                    var pickerWidth = this.$dropdown.outerWidth(true);
                    var pickerHeight = this.$dropdown.outerHeight(true);
                    var top = void 0;
                    var left = void 0;

                    if (pickerHeight + offset.top > (0, _jquery2.default)(window).height() + (0, _jquery2.default)(window).scrollTop()) {
                        top = offset.top - pickerHeight;
                    } else {
                        top = offset.top + height;
                    }

                    if (pickerWidth + offset.left > (0, _jquery2.default)(window).width() + (0, _jquery2.default)(window).scrollLeft()) {
                        left = offset.left - pickerWidth + width;
                    } else {
                        left = offset.left;
                    }

                    this.$dropdown.css({
                        position: 'absolute',
                        top: top,
                        left: left
                    });
                }
            }, {
                key: 'open',
                value: function open() {
                    
					if (this.disabled) {
                        return;
                    }
					
                    this.originValue = this.element.value;

                    if (this.$dropdown[0] !== this.$body.children().last()[0]) {
                        this.$dropdown.detach().appendTo(this.$body);
                    }

                    this.$mask = (0, _jquery2.default)('.' + this.classes.mask);

                    if (this.$mask.length === 0) {
                        this.createMask();
                    }
					
					// @United
					if( $ut_current_picker && $ut_current_picker !== this.$element ) {
					   
					   	$ut_current_picker.asColorPicker('close'); // close other colorpicker
						$ut_current_picker = this.$element;
					   
					} else {
						
						$ut_current_picker = this.$element;
						
					}
					
                    // ensure the mask is always right before the dropdown

                    if (this.$dropdown.prev()[0] !== this.$mask[0]) {
                        this.$dropdown.before(this.$mask);
                    }

                    (0, _jquery2.default)("#asColorPicker-dropdown").removeAttr("id");
                    this.$dropdown.attr("id", "asColorPicker-dropdown");

                    // show the mask
                    this.$mask.show();

                    this.position();

                    (0, _jquery2.default)(window).on(this.eventName('resize'), _jquery2.default.proxy(this.position, this));

                    this.$dropdown.addClass(this.classes.open);

                    this.opened = true;

                    if (this.firstOpen) {
                        this.firstOpen = false;
                        this._trigger('firstOpen');
                    }
                    this._setup();
                    this._trigger('open');
                }
            }, {
                key: 'createMask',
                value: function createMask() {
                    
                    this.$mask = (0, _jquery2.default)(document.createElement("div"));
                    this.$mask.attr("class", this.classes.mask);
                    this.$mask.hide();
                    this.$mask.appendTo(this.$body);
                    
                    jQuery(document).on('click', function (e) {
                    	
                        if( e.target.id === 'asColorPicker-dropdown' || jQuery( e.target ).is("i") || jQuery( e.target ).closest("#asColorPicker-dropdown").length ) {
                            return;    
                        }
                        
                        var rightclick = e.which ? e.which === 3 : e.button === 2;

                        if( rightclick ) {
                            return false;
                        }
                        
                        var $dropdown = (0, _jquery2.default)("#asColorPicker-dropdown");
                        var self = void 0;

                        if ($dropdown.length > 0) {
                            
                            self = $dropdown.data(NAMESPACE$1);

                            if( self.opened ) {

                                if (self.options.hideFireChange) {
                                                                        
                                    self.apply();
                                    
                                } else {
                                    
                                    self.cancel();
                                    
                                }
                                
                            }
                            
                            if( e.target.id === 'asColorPicker-dropdown' ) {
                            
                                e.preventDefault();
                                e.stopPropagation();
                                
                            }
                            
                        }

                    });
                    
                }
                
            }, {
                key: 'close',
                value: function close() {
                    
                    this.opened = false;
                    this.$element.blur();
                    
                    // check if mask is active
                    if( typeof this.$mask !== 'undefined' && this.$mask.length ) {
                        this.$mask.hide();
                    }
                    
                    this.$dropdown.removeClass(this.classes.open);

                    (0, _jquery2.default)(window).off(this.eventName('resize'));

                    this._trigger('close');
                    
                }
            }, {
                key: 'clear',
                value: function clear() {
                    
                    // disable gradient
                    if( this.gradient.isEnabled ) {
                       this.gradient.disable();                       
                    }
                    
                    // reset value
                    this.val('');
                    
                }
                
            }, {
                key: 'cancel',
                value: function cancel() {
                    this.close();
                    this.set(this.originValue);
                }
            }, {
                key: 'apply',
                value: function apply() {
                    
                    this._trigger('apply', this.color);
                    this.close();
                    
                }
                
            }, {
                key: 'val',
                value: function val(value) {
                    
                    if (typeof value === 'undefined' ) {
                        return this.color.toString();
                    }

                    this.set(value);
                    
                }
                
            }, {
                key: '_update',
                value: function _update() {
                    this._trigger('update', this.color);
                    this._updateInput();
                }
            }, {
                key: '_updateInput',
                value: function _updateInput() {
                    var value = this.color.toString();

                    if (this.isEmpty) {
                        value = '';
                    }
                    this._trigger('change', value);
                    this.$element.val(value);
                }
            }, {
                key: 'set',
                value: function set(value) {
                    if (value !== '') {
                        this.isEmpty = false;
                    } else {
                        this.isEmpty = true;
                    }

                    return this._set(value);
                }
            }, {
                key: '_set',
                value: function _set(value) {
                    if (typeof value === 'string') {
                        this.color.val(value);
                    } else {
                        this.color.set(value);
                    }

                    this._update();
                }
            }, {
                key: '_setup',
                value: function _setup() {
                    this._trigger('setup', this.color);
                }
            }, {
                key: 'get',
                value: function get() {
                    return this.color;
                }
            }, {
                key: 'enable',
                value: function enable() {
                    this.disabled = false;
                    this.$parent.addClass(this.classes.disabled);
                    this._trigger('enable');

                    return this;
                }
            }, {
                key: 'disable',
                value: function disable() {
                    this.disabled = true;
                    this.$parent.removeClass(this.classes.disabled);
                    this._trigger('disable');

                    return this;
                }
            }, {
                key: 'destroy',
                value: function destroy() {
                    this.$element.unwrap();
                    this.$element.off(this.eventName());
                    this.$mask.remove();
                    this.$dropdown.remove();

                    this.initialized = false;
                    this.$element.data(NAMESPACE$1, null);

                    this._trigger('destroy');

                    return this;
                }
            }, {
                key: 'getString',
                value: function getString(name, def) {
                    if (this.options.lang in LOCALIZATIONS && typeof LOCALIZATIONS[this.options.lang][name] !== 'undefined') {

                        return LOCALIZATIONS[this.options.lang][name];
                    }

                    return def;
                }
            }], [{
                key: 'setLocalization',
                value: function setLocalization(lang, strings) {
                    LOCALIZATIONS[lang] = strings;
                }
            }, {
                key: 'registerComponent',
                value: function registerComponent(name, method) {
                    COMPONENTS[name] = method;
                }
            }, {
                key: 'setDefaults',
                value: function setDefaults(options) {
                    _jquery2.default.extend(true, DEFAULTS, _jquery2.default.isPlainObject(options) && options);
                }
            }]);

            return AsColorPicker;
        }();

        AsColorPicker.registerComponent('alpha', alpha);
        AsColorPicker.registerComponent('hex', hex);
        AsColorPicker.registerComponent('hue', hue);
        AsColorPicker.registerComponent('saturation', saturation);
        AsColorPicker.registerComponent('buttons', buttons);
        AsColorPicker.registerComponent('trigger', trigger);
        AsColorPicker.registerComponent('clear', clear);
        AsColorPicker.registerComponent('info', info);
        AsColorPicker.registerComponent('palettes', palettes);
        AsColorPicker.registerComponent('preview', preview);
        AsColorPicker.registerComponent('gradient', gradient);

        // Chinese (cn) localization
        AsColorPicker.setLocalization('cn', {
            cancelText: "取消",
            applyText: "应用"
        });

        // German (de) localization
        AsColorPicker.setLocalization('de', {
            cancelText: "Abbrechen",
            applyText: "Wählen"
        });

        // Danish (dk) localization
        AsColorPicker.setLocalization('dk', {
            cancelText: "annuller",
            applyText: "Vælg"
        });

        // Spanish (es) localization
        AsColorPicker.setLocalization('es', {
            cancelText: "Cancelar",
            applyText: "Elegir"
        });

        // Finnish (fi) localization
        AsColorPicker.setLocalization('fi', {
            cancelText: "Kumoa",
            applyText: "Valitse"
        });

        // French (fr) localization
        AsColorPicker.setLocalization('fr', {
            cancelText: "Annuler",
            applyText: "Valider"
        });

        // Italian (it) localization
        AsColorPicker.setLocalization('it', {
            cancelText: "annulla",
            applyText: "scegli"
        });

        // Japanese (ja) localization
        AsColorPicker.setLocalization('ja', {
            cancelText: "中止",
            applyText: "選択"
        });

        // Russian (ru) localization
        AsColorPicker.setLocalization('ru', {
            cancelText: "отмена",
            applyText: "выбрать"
        });

        // Swedish (sv) localization
        AsColorPicker.setLocalization('sv', {
            cancelText: "Avbryt",
            applyText: "Välj"
        });

        // Turkish (tr) localization
        AsColorPicker.setLocalization('tr', {
            cancelText: "Avbryt",
            applyText: "Välj"
        });

        var info$1 = {
            version: '0.4.3'
        };

        var NAMESPACE = 'asColorPicker';
        var OtherAsColorPicker = _jquery2.default.fn.asColorPicker;

        var jQueryAsColorPicker = function jQueryAsColorPicker(options) {
            var _this7 = this;

            for (var _len2 = arguments.length, args = Array(_len2 > 1 ? _len2 - 1 : 0), _key2 = 1; _key2 < _len2; _key2++) {
                args[_key2 - 1] = arguments[_key2];
            }

            if (typeof options === 'string') {
                var _ret = function () {
                    var method = options;

                    if (/^_/.test(method)) {

                        return {
                            v: false
                        };
                    } else if (/^(get)$/.test(method) || method === 'val' && args.length === 0) {
                        var instance = _this7.first().data(NAMESPACE);

                        if (instance && typeof instance[method] === 'function') {

                            return {
                                v: instance[method].apply(instance, args)
                            };
                        }
                    } else {

                        return {
                            v: _this7.each(

                                function () {
                                    var instance = _jquery2.default.data(this, NAMESPACE);

                                    if (instance && typeof instance[method] === 'function') {
                                        instance[method].apply(instance, args);
                                    }
                                }
                            )
                        };
                    }
                }();

                if ((typeof _ret === 'undefined' ? 'undefined' : _typeof(_ret)) === "object")

                    return _ret.v;
            }

            return this.each(

                function () {
                    if (!(0, _jquery2.default)(this).data(NAMESPACE)) {
                        (0, _jquery2.default)(this).data(NAMESPACE, new AsColorPicker(this, options));
                    }
                }
            );
        };

        _jquery2.default.fn.asColorPicker = jQueryAsColorPicker;

        _jquery2.default.asColorPicker = _jquery2.default.extend({
            setDefaults: AsColorPicker.setDefaults,
            registerComponent: AsColorPicker.registerComponent,
            setLocalization: AsColorPicker.setLocalization,
            noConflict: function noConflict() {
                _jquery2.default.fn.asColorPicker = OtherAsColorPicker;

                return jQueryAsColorPicker;
            }
        }, info$1);
    }
);