<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'UT_Shortcodes_CSS' ) ) {	
    
    class UT_Shortcodes_CSS extends UT_Custom_CSS {
        
        public function custom_css() {
            
            ob_start(); ?>

            <style id="ut-shortcode-custom-css" type="text/css">

                .vc_row.vc_row-o-full-height,
                .vc_section.vc_section-o-full-height {
                    min-height: 100vh !important;
                }

                .vc_row.vc_row-height-95vh,
                .vc_section.vc_section-height-95vh {
                    min-height: 95vh !important;
                }

                .vc_row.vc_row-height-90vh,
                .vc_section.vc_section-height-90vh {
                    min-height: 90vh !important;
                }

                .vc_row.vc_row-height-85vh,
                .vc_section.vc_section-height-85vh {
                    min-height: 85vh !important;
                }

                .vc_row.vc_row-height-80vh,
                .vc_section.vc_section-height-80vh {
                    min-height: 80vh !important;
                }

                .vc_row.vc_row-height-75vh,
                .vc_section.vc_section-height-75vh {
                    min-height: 75vh !important;
                }

                .vc_row.vc_row-height-66vh,
                .vc_section.vc_section-height-66vh {
                    min-height: 66vh !important;
                }

                .vc_row.vc_row-height-50vh,
                .vc_section.vc_section-height-50vh {
                    min-height: 50vh !important;
                }

                .vc_row.vc_row-height-33vh,
                .vc_section.vc_section-height-33vh {
                    min-height: 33vh !important;
                }

                .vc_row.vc_row-height-25vh,
                .vc_section.vc_section-height-25vh {
                    min-height: 25vh !important;
                }

                .vc_column_container > .vc_column-inner.ut-forced-padding > .wpb_wrapper > .wpb_content_element:last-child  {
                    margin-bottom: 0;
                }

                /* Column Force Padding Desktop  */
                <?php

				$vc_padding = array( 0,1,2,3,4,5,6,7,8,9,10 );

				foreach( $vc_padding as $padding ) {

					echo ".vc_row[data-vc-stretch-content=\"true\"] .ut-force-padding-desktop-$padding { padding: calc(100vw * " . ( $padding / 100 ) .") !important }";
					echo ".vc_row:not([data-vc-stretch-content=\"true\"]) .ut-force-padding-desktop-$padding { padding: calc(" . $this->add_px_value( ot_get_option( 'ut_site_custom_width', '1200' ) - 40 ) . " * " . ( $padding / 100 ) .") !important }";

				} ?>

                @media (min-width: 768px) and (max-width: 1024px) {

                    /* Column Force Padding Tablet  */
                    <?php

                    foreach( $vc_padding as $padding ) {

                        echo ".vc_row[data-vc-stretch-content=\"true\"] .ut-force-padding-tablet-$padding { padding: calc(100vw * " . ( $padding / 100 ) .") !important }";
                        echo ".vc_row:not([data-vc-stretch-content=\"true\"]) .ut-force-padding-tablet-$padding { padding: calc(" . $this->add_px_value( ot_get_option( 'ut_site_custom_width', '1200' ) - 40 ) . " * " . ( $padding / 100 ) .") !important }";

                    } ?>

                }

                @media (max-width: 767px) {

                    /* Column Force Padding Mobile  */
                    <?php

                    foreach( $vc_padding as $padding ) {

                        echo ".vc_row[data-vc-stretch-content=\"true\"] .ut-force-padding-mobile-$padding { padding: calc(100vw * " . ( $padding / 100 ) .") !important }";
                        echo ".vc_row:not([data-vc-stretch-content=\"true\"]) .ut-force-padding-mobile-$padding { padding: calc(" . $this->add_px_value( ot_get_option( 'ut_site_custom_width', '1200' ) - 40 ) . " * " . ( $padding / 100 ) .") !important }";

                    } ?>

                }

                .single-post #ut-hero #wrapper_ut-background-video-hero {
                    z-index: 1 !important;
                }

                /* Count Up (Slot)
                ================================================== */
                .ut-count {
                    fill: <?php echo ot_get_option('ut_body_font_color'); ?>
                }

                /* Advanced Google Map
				================================================== */
				.ut-advanced-google-map {
					width: 100%;
					height: 100%;
					display: block;
				}
				.ut-advanced-google-map-wrap-center {
					margin: 0 auto;
				}				
				.ut-advanced-google-map-wrap-right {
					margin: 0 0 0 auto;
				}
				.ut-advanced-google-map button {
					padding: 0 !important;
					border: none !important;
				}
				
				/* Distortion Effect
                ================================================== */ 
				.ut-distortion-effect-container {
					display: block;
					height: 100%;
					width: 100%;
					position: absolute;
					left: 0;
					top: 0;
					right: 0;
					border: 0;
					overflow: hidden;
				}				
				.ut-distortion-effect-container canvas {
					height: 100.1%;
					position: absolute;
					left: 50% !important;
					top: 50% !important;
				  	transform: translate(-50%, -50%) !important;
				}				
				.ut-distortion-effect-container img {
					display: none;
				}

                /* Header Gradient Effect
                ================================================== */
                .section-header.header-with-gradient h1 span,
                .parallax-header.header-with-gradient h1 span,
                .section-header.header-with-gradient h2 span,
                .parallax-header.header-with-gradient h2 span,
                .section-header.header-with-gradient h3 span,
                .parallax-header.header-with-gradient h3 span,
                .section-header.header-with-gradient h4 span,
                .parallax-header.header-with-gradient h4 span,
                .section-header.header-with-gradient h5 span,
                .parallax-header.header-with-gradient h5 span,
                .section-header.header-with-gradient h6 span,
                .parallax-header.header-with-gradient h6 span {
                    -webkit-text-fill-color: transparent;
                    -webkit-background-clip: text !important;
                    background-clip: text !important;
                }
                
				.header-with-gradient-lead .lead {
					-webkit-text-fill-color: transparent;
                    -webkit-background-clip: text !important;
                    background-clip: text !important;
				}
				
				/* Countdown Gradient Effect
                ================================================== */
				.ut-countdown-module.ut-countdown-module-with-gradient-period .countdown-period,
				.ut-countdown-module.ut-countdown-module-with-gradient-amount .countdown-amount,
				.ut-countdown-module.ut-countdown-module-with-gradient-amount.ut-countdown-module-compact.ut-countdown-module-with-separator .countdown-section::after {
					-webkit-text-fill-color: transparent;
                    -webkit-background-clip: text !important;
                    background-clip: text !important;
				}
				
				/* Media Slider Element with Gradient
                ================================================== */ 
				.ut-owl-video-play-icon-with-gradient .ut-owl-video-play-icon i,
				.ut-owl-slider-maximize-icon-with-gradient .ut-slider-maximize i {
					-webkit-text-fill-color: transparent;
                    -webkit-background-clip: text !important;
                    background-clip: text !important;
				}
				
				.ut-owl-slider-with-caption-below .owl-dots {
					bottom: 23px;
				}
				
				/* Element Gradient Effect
                ================================================== */ 
				.ut-element-with-gradient,
				.ut-element-with-gradient-link a,
				.ut-element-with-gradient-headline h3, 
				.ut-element-with-gradient-text span,
				.ut-element-with-gradient-icon i,
				.ut-element-with-gradient-hover-icon:hover i {
					-webkit-text-fill-color: transparent;
                    -webkit-background-clip: text !important;
                    background-clip: text !important;
				}
				
                /* Service Column Vertical Gradient
                ================================================== */ 
                .ut-service-icon.ut-service-icon-with-gradient i {
                    -webkit-text-fill-color: transparent;
                    -webkit-background-clip: text !important;
                    background-clip: text !important;
                }
                
                .ut-service-icon.ut-service-icon-with-gradient i:before {
                    -webkit-text-fill-color: transparent;
                }
                
                /* Button Effect
                ================================================== */ 
                .bklyn-btn-with-effect {
                    overflow: hidden;
                    position: relative;
                    z-index: 1;
                }
                
                /* Aylen Button Effect
                ================================================== */ 
                .bklyn-btn-effect-aylen {
                    -webkit-transition: color 0.3s;
                    transition: color 0.3s;
                }
                
                .bklyn-btn-effect-aylen::before,
                .bklyn-btn-effect-aylen::after {
                    content: '';
                    position: absolute;
                    height: 100%;
                    width: 100%;
                    bottom: 100%;
                    left: 0;
                    z-index: -1;
                    -webkit-transition: -webkit-transform 0.3s;
                    transition: transform 0.3s;
                    -webkit-transition-timing-function: cubic-bezier(0.75, 0, 0.125, 1);
                    transition-timing-function: cubic-bezier(0.75, 0, 0.125, 1);
                }
                
                .bklyn-btn-effect-aylen::before {
                    background:rgb(<?php echo $this->hex_to_rgb( $this->accent ); ?>); 
                    background:rgba(<?php echo $this->hex_to_rgb( $this->accent ); ?>, 0.6); 
                }
                
                .bklyn-btn-effect-aylen::after {
                    background: <?php echo $this->accent; ?>;
                }
                
                .bklyn-btn-effect-aylen:hover {
                    color: #fff;
                }
                
                .bklyn-btn-effect-aylen:hover::before,
                .bklyn-btn-effect-aylen:hover::after {
                    -webkit-transform: translate3d(0, 100%, 0) scale(1.1);
                    transform: translate3d(0, 100%, 0) scale(1.1);
                }
                
                .bklyn-btn-effect-aylen:hover::after {
                    -webkit-transition-delay: 0.175s;
                    transition-delay: 0.175s;
                }
                
                /* Winona Button Effect
                ================================================== */ 
                .bklyn-btn-effect-winona {
	                -webkit-transition-timing-function: cubic-bezier(0.2, 1, 0.3, 1);
	                transition-timing-function: cubic-bezier(0.2, 1, 0.3, 1);
                }
                .bklyn-btn-effect-winona > span {
                    display: block;
                }
				.bklyn-btn-effect-winona.bklyn-btn-icon-left > span {
					display: inline-block;
				}
                .bklyn-btn-effect-winona::after {
                    content: attr(data-text);
                    position: absolute;
                    width: 100%;
                    height: 100%;
                    top: 0;
                    left: 0;
                    opacity: 0;
                    padding: 1em 2.15em;
                    margin: 0 !important;
                    -webkit-transform: translate3d(0, 25%, 0);
                    transform: translate3d(0, 25%, 0);
					white-space: nowrap;
                    display: -webkit-inline-box;
                    display: -ms-inline-flexbox;
                    display: inline-flex;
                    -webkit-box-pack: center;
                    -ms-flex-pack: center;
                    justify-content: center;
                    -webkit-box-align: center;
                    -ms-flex-align: center;
                    align-items: center;
                }
                .bklyn-btn-effect-winona.bklyn-btn-mini::after {
                    padding: 0.6em 1.62em;
                }
                .bklyn-btn-effect-winona.bklyn-btn-small::after {
                    padding: 1.1em 2em;
                }
                .bklyn-btn-effect-winona.bklyn-btn-large::after {
                    padding: 1.05em 2.15em;
                }
                .hero-btn.bklyn-btn-effect-winona::after,
                .hero-second-btn.bklyn-btn-effect-winona::after {
                    padding: 1.05em 2.15em;
                }

                @media (max-width: 767px) {

                    .hero-btn.bklyn-btn-effect-winona::after,
                    .hero-second-btn.bklyn-btn-effect-winona::after {
                        padding: 0.8em 1.4em !important;
                    }

                }

				.bklyn-btn-effect-winona.bklyn-btn-icon-left::after {
					text-indent: 22px;
				}
				
				.bklyn-btn-effect-winona.bklyn-btn-icon-right::after {
					text-indent: -22px;
				}
				
                .bklyn-btn-effect-winona::after,
                .bklyn-btn-effect-winona > span {
                    -webkit-transition: -webkit-transform 0.3s, opacity 0.3s;
	                transition: transform 0.3s, opacity 0.3s;
                    -webkit-transition-timing-function: cubic-bezier(0.2, 1, 0.3, 1);
                    transition-timing-function: cubic-bezier(0.2, 1, 0.3, 1);
                }
                
                .bklyn-btn-effect-winona:hover::after {
                    opacity: 1;
                    -webkit-transform: translate3d(0, 0, 0);
                    transform: translate3d(0, 0, 0);
                }
                
                .bklyn-btn-effect-winona:hover > span {
                    opacity: 0;
                    -webkit-transform: translate3d(0, -25%, 0);
                    transform: translate3d(0, -25%, 0);
                }

                /* Section Separators
                ================================================== */
                .bklyn-section-separator {
                    overflow: hidden;
                    position: absolute;
                    left: 0;
                    width: 100%;
                    line-height: 0;
                    direction: ltr;
					pointer-events: none;
                }
                
                .bklyn-section-separator.bklyn-section-separator-bottom {
                    bottom: -1px;
                }
                
                .bklyn-section-separator.bklyn-section-separator-top {
                    -webkit-transform: rotate(180deg);
                    -ms-transform: rotate(180deg);
                    transform: rotate(180deg);
                    top: -1px;
                }
                
                .bklyn-section-separator.bklyn-section-separator-slit.bklyn-section-separator-bottom {
                    -webkit-transform: rotate(180deg);
                    -ms-transform: rotate(180deg);
                    transform: rotate(180deg);                    
                }
                
                .bklyn-section-separator.bklyn-section-separator-slit.bklyn-section-separator-top {
                    -webkit-transform: rotate(0deg);
                    -ms-transform: rotate(0deg);
                    transform: rotate(0deg);
                }
                
                .bklyn-section-separator svg {
                    display: block;
                    width: calc(100% + 2px);
                    position: relative;
                    left: 50%;
                    -webkit-transform: translateX(-50%);
                    -ms-transform: translateX(-50%);
                    transform: translateX(-50%);
                }
                
                .bklyn-section-separator.bklyn-section-separator-flip svg {
                    -webkit-transform: translateX(-50%) scale(-1, 1);
                    -ms-transform: translateX(-50%) scale(-1, 1);
                    transform: translateX(-50%) scale(-1, 1);
                }
                
                .bklyn-section-separator .bklyn-section-separator-path-fill {
                    -webkit-transform-origin: center;
                    -ms-transform-origin: center;
                    transform-origin: center;
                    -webkit-transform: rotateY(0deg);
                    transform: rotateY(0deg);
                }
                
                /* Extra Hero Separator Classes */
                #ut-custom-hero > .bklyn-section-separator,
                #ut-hero .bklyn-section-separator {
                    z-index: 2;    
                }
                
                #ut-custom-hero.ut-hero-with-separator > .bklyn-section-separator,
                #ut-hero.ut-hero-with-separator .bklyn-section-separator {
                    z-index: 2;    
                }
                
                #ut-hero.ut-hero-with-separator .grid-container {
                    z-index: 3;    
                }
                
                #ut-hero.ut-hero-fancy-slider.ut-hero-with-separator .bklyn-section-separator {
                    z-index: 1002;    
                }
                
                #ut-hero.ut-hero-fancy-slider.ut-hero-with-separator .ut-fancy-slider nav {
                    z-index: 1003;                
                }
                
                #ut-hero.ut-hero-fancy-slider.ut-hero-with-separator .hero-down-arrow-wrap {
                    position: relative;
                    z-index: 1003;
                }
                
                /* Section Video with Vimeo
                ================================================== */ 
                .ut-video-section .vimelar-container {
                    left:0;
                    top:0;
					z-index: 0 !important;
                }

                
                /* Animated Image
                ================================================== */ 
                .ut-animated-image-item {
                    text-align: inherit;
                    display: -webkit-inline-box;
                    display: -ms-inline-flexbox;
                    display: inline-flex;
                    -webkit-box-orient: vertical;
                    -webkit-box-direction: normal;
                    -ms-flex-direction: column;
                    flex-direction: column;
                    width: auto;
                }
                .ut-animated-image-item a {
                    position: relative;
                }
                .ut-animated-image-zoom {
                    position: relative;
                    overflow: hidden;
                }
                .ut-animated-image-zoom::after {
                    content: '';
                    position: absolute;
                    width: 100%;
                    height: 100%;
                    display: block;
                    background-repeat: no-repeat !important;
                    background-size: cover !important;
                    background-position: center !important;
                    z-index: 0;
                    -webkit-transition: all 400ms cubic-bezier(0.215, 0.610, 0.355, 1.000);
                    -o-transition: all 400ms cubic-bezier(0.215, 0.610, 0.355, 1.000);
                    transition: all 400ms cubic-bezier(0.215, 0.610, 0.355, 1.000);
                    -webkit-transform: scale(1.1);
                    -ms-transform: scale(1.1);
                    transform: scale(1.1);
                    top: 0;
                }
                .ut-animated-image-zoom .ut-element-glitch-wrap {
                    -webkit-transition: all 400ms cubic-bezier(0.215, 0.610, 0.355, 1.000);
                    -o-transition: all 400ms cubic-bezier(0.215, 0.610, 0.355, 1.000);
                    transition: all 400ms cubic-bezier(0.215, 0.610, 0.355, 1.000);
                    -webkit-transform: scale(1.1);
                    -ms-transform: scale(1.1);
                    transform: scale(1.1);
                    z-index: 1;
                }
                .ut-animated-image-zoom:hover::after,
                .ut-animated-image-zoom:hover .ut-element-glitch-wrap {
                    -webkit-transform: scale(1);
                    -ms-transform: scale(1);
                    transform: scale(1);
                }
                .ut-morph-active .ut-animated-image-zoom::after {
                    -webkit-transform: scale(1) !important;
                    -ms-transform: scale(1) !important;
                    transform: scale(1) !important;
                }


                /* Instagram
                ================================================== */ 
                .ut-instagram-module-loading {
                    display:none;
                }
                
                .ut-instagram-gallery-wrap {                
                    will-change: height;
                    -webkit-transition: all 0.5s linear;
                    -moz-transition: all 0.5s linear;
                    transition: all 0.5s linear;                
                }
                
                .ut-instagram-video-container {
                    display:none;
                }
                
                
                /* Team Member Swap
                ================================================== */ 
                .bklyn-team-member-avatar.bklyn-team-member-avatar-with-swap {
                    position: relative;
                }

                .bklyn-team-member-avatar.bklyn-team-member-avatar-with-swap .bklyn-team-member-secondary-image {
                    position: absolute;
                    top:0;
                    left:0;
                    right: 0;
                    bottom: 0;
                    opacity:0;
                    -webkit-transition: opacity 0.40s ease-in-out;
                    -moz-transition: opacity 0.40s ease-in-out;
                    -o-transition: opacity 0.40s ease-in-out;
                    transition: opacity 0.40s ease-in-out;
                }
                
                .bklyn-team-member:hover .bklyn-team-member-secondary-image {
                    opacity: 1;    
                }
                
                /* Buttons
                ================================================== */ 
                .ut-btn.dark:hover,
                .ut-btn.ut-pt-btn:hover { 
                    background: <?php echo $this->accent; ?>;  
                }
                
                .ut-btn.theme-btn {
                    background: <?php echo $this->accent; ?>;
                }
                
                /* Single Quote
                ================================================== */                
                .ut-rated i { 
                    color: <?php echo $this->accent; ?>; 
                }
                
                /* Social Follow
                ================================================== */
                .ut-social-follow-module a:hover,
                .ut-social-follow-module a:active {
                    color: <?php echo $this->accent; ?>;
                }
                
                /* Custom Icon
                ================================================== */
                .ut-custom-icon-link:hover i { 
                    color: <?php echo $this->accent; ?>;
                }
                .ut-custom-icon a:hover i:first-child {
                    color: <?php echo $this->accent; ?>;
                }
                
                /* Blog Excerpt
                ================================================== */
                .light .ut-bs-wrap .entry-title a:hover, 
                .light .ut-bs-wrap a:hover .entry-title  { 
                    color: <?php echo $this->accent; ?>;
                }

                /* Fancy Divider
                ================================================== */
                .bklyn-fancy-divider,
                .bklyn-fancy-divider::before,
                .bklyn-fancy-divider::after {
                    background: <?php echo $this->accent; ?>;
                }

                /* Twitter Rotator
                ================================================== */
                .ut-rq-icon-tw { 
                    color: <?php echo $this->accent; ?>; 
                }
                
                /* Quote Rotator
                ================================================== */
                .ut-rotate-quote .flex-direction-nav a,
                .ut-rotate-quote-alt .flex-direction-nav a { 
                    background:rgb(<?php echo $this->hex_to_rgb( $this->accent ); ?>); 
                    background:rgba(<?php echo $this->hex_to_rgb( $this->accent ); ?>, 0.85); 
                }

                /* Service Column
                ================================================== */
                .ut-service-column h3 span  { 
                    color:<?php echo $this->accent; ?>; 
                }
                
                /* Social Icons
                ================================================== */
                .ut-social-title { 
                    color:<?php echo $this->accent; ?>; 
                }
                
                .ut-social-link:hover .ut-social-icon { 
                    background:<?php echo $this->accent; ?> !important; 
                }
                
                /* List Icons
                ================================================== */
                .ut-icon-list i { 
                    color:<?php echo $this->accent; ?>; 
                }
                
                /* Alert
                ================================================== */
                .ut-alert.themecolor { 
                    background:<?php echo $this->accent; ?>; 
                }               
                
                /* Tabs
                ================================================== */
                .light .ut-nav-tabs li a:hover { 
                    border-color:<?php echo $this->accent; ?> !important; 
                }
                
                .light .ut-nav-tabs li a:hover { 
                    color:<?php echo $this->accent; ?> !important; 
                }
                
                /* Probar
                ================================================== */
                .ut-skill-overlay { 
                    background:<?php echo $this->accent; ?>; 
                }
                
                /* Accordion
                ================================================== */
                .light .ut-accordion-heading a:hover { 
                    border-color:<?php echo $this->accent; ?> !important; 
                }
                
                .light .ut-accordion-heading a:hover { 
                    color:<?php echo $this->accent; ?> !important; 
                }
                
                /* Dropcap
                ================================================== */
                .ut-dropcap-one, 
                .ut-dropcap-two { 
                    background: <?php echo $this->accent; ?>; 
                }                
                
                /* Vimeo Background
                ================================================== */
                .vimelar-container {
                    opacity: 0;
                    -webkit-transition: opacity 0.35s ease-in-out;
                    -moz-transition: opacity 0.35s ease-in-out;
                    -o-transition: opacity 0.35s ease-in-out;
                    transition: opacity 0.35s ease-in-out;
                }

                .vimelar-container.ut-vimeo-loaded {
                    opacity: 1;
                }

                /* Image Gallery
                ================================================== */
                .ut-vc-images-lightbox-caption {
                    display: none;
                }
				
				.ut-js .ut-image-gallery-item:not(.animated) .ut-lazy {
					opacity: 0;
					-webkit-transition: opacity 0.8s ease-out;
	   				   -moz-transition: opacity 0.8s ease-out;
	        				transition: opacity 0.8s ease-out;
				}
				.ut-js .ut-image-gallery-item.appeared:not(.animated) .ut-lazy.ut-image-loaded {
					opacity: 1;
				}

                <?php if( $this->is_hex( $this->accent ) ) : ?>

                    .ut-image-gallery-loader .ut-image-gallery-loader-inner {
                        border: 2px solid rgba(<?php echo $this->hex_to_rgb( $this->accent ); ?>, 0.65);
                        border-right-color: rgba(<?php echo $this->hex_to_rgb( $this->accent ); ?>, 0.15);
                        border-bottom-color: rgba(<?php echo $this->hex_to_rgb( $this->accent ); ?>, 0.15);
                    }

                <?php else : ?>

                    .ut-image-gallery-loader .ut-image-gallery-loader-inner {
                        border: 2px solid <?php echo $this->rgb_to_rgba( $this->accent , '0.65' ); ?>;
                        border-right-color: <?php echo $this->rgb_to_rgba( $this->accent , '0.15' ); ?>;
                        border-bottom-color: <?php echo $this->rgb_to_rgba( $this->accent , '0.15' ); ?>;
                    }

                <?php endif; ?>
				
                /* Slider Gallery
                ================================================== */
                figure.ut-gallery-slider-caption-wrap::before {
                    color:<?php echo $this->accent; ?>;    
                }
                
                
                /* Team Member ( Template )
                ================================================== */
                .member-social a:hover {
                    color:<?php echo $this->accent; ?>; 
                }
                
                .ut-member-style-2 .member-description .ut-member-title { 
                    color:<?php echo $this->accent; ?>; 
                }
                
                .ut-member-style-2 .ut-so-link:hover {
                    background: <?php echo $this->accent; ?> !important;    
                }
                
                .member-description-style-3 .ut-member-title { 
                    color:<?php echo $this->accent; ?>; 
                }
                
                .ut-member-style-3 .member-social a:hover { 
                    border-color: <?php echo $this->accent; ?>;  
                }
                
                .ut-hide-member-details:hover {
                    color:<?php echo $this->accent; ?>; 
                }
                
                .light .ut-hide-member-details {
                    color:<?php echo $this->accent; ?>; 
                }
                
                /* Icon Tabs
                ================================================== */ 
                .bklyn-icon-tabs li a:hover,
                .bklyn-icon-tabs li.active > a, 
                .bklyn-icon-tabs li.active > a:focus, 
                .bklyn-icon-tabs li.active > a:hover,
                .bklyn-icon-tabs li.active a .bkly-icon-tab {
                    color:<?php echo $this->accent; ?>;
                }
                                
                /* Video Shortcode
                ================================================== */
                <?php $border_color = $this->is_hex( $this->accent ) ? 'rgba(' . $this->hex_to_rgb( $this->accent ) . ', 1)' : $this->rgb_to_rgba( $this->accent , '1' ); ?>

                .light .ut-shortcode-video-wrap .ut-video-caption {
                    border-color:<?php echo $border_color; ?>
                }

                <?php $border_color = $this->is_hex( $this->accent ) ? 'rgba(' . $this->hex_to_rgb( $this->accent ) . ', 0.3)' : $this->rgb_to_rgba( $this->accent , '0.3' ); ?>

                .light .ut-shortcode-video-wrap .ut-video-caption i {
                    border-color:<?php echo $border_color; ?>
                }

                <?php $color = $this->is_hex( $this->accent ) ? 'rgba(' . $this->hex_to_rgb( $this->accent ) . ', 0.3)' : $this->rgb_to_rgba( $this->accent , '0.3' ); ?>

                .light .ut-shortcode-video-wrap .ut-video-caption i { 
                    color:<?php echo $color; ?>
                }

                <?php $border_color = $this->is_hex( $this->accent ) ? 'rgba(' . $this->hex_to_rgb( $this->accent ) . ', 1)' : $this->rgb_to_rgba( $this->accent , '1' ); ?>

                .light .ut-shortcode-video-wrap .ut-video-caption:hover i {
                    border-color:<?php echo $border_color; ?>
                }
                
                .light .ut-shortcode-video-wrap .ut-video-caption:hover i { 
                    color:<?php echo $this->accent; ?> !important; 
                }
                
                .light .ut-shortcode-video-wrap .ut-video-caption:hover i { 
                    text-shadow: 0 0 40px <?php echo $this->accent; ?>, 2px 2px 3px black; 
                }
                
                .light .ut-video-loading { 
                    color:<?php echo $this->accent; ?> !important; 
                }
                
                .light .ut-video-loading { 
                    text-shadow: 0 0 40px <?php echo $this->accent; ?>, 2px 2px 3px black; 
                }

                <?php $border_color = $this->is_hex( $this->accent ) ? 'rgba(' . $this->hex_to_rgb( $this->accent ) . ', 1)' : $this->rgb_to_rgba( $this->accent , '1' ); ?>

                .light .ut-video-caption-text { 
                    border-color:<?php echo $border_color; ?>
                }
                
                /* Pricing Tables
                ================================================== */ 
                .ut-pt-featured { 
                    background: <?php echo $this->accent; ?> !important;                 
                }
                
                .ut-pt-featured-table .ut-pt-info .fa-li  { 
                    color: <?php echo $this->accent; ?> !important; 
                }
                
                .ut-pt-wrap.ut-pt-wrap-style-2 .ut-pt-featured-table .ut-pt-header { 
                    background: <?php echo $this->accent; ?>; 
                }

                <?php $border_color = $this->is_hex( $this->accent ) ? 'rgba(' . $this->hex_to_rgb( $this->accent ) . ', 0.1)' : $this->rgb_to_rgba( $this->accent , '0.1' ); ?>

                .ut-pt-wrap-style-3 .ut-pt-info ul, 
                .ut-pt-wrap-style-3 .ut-pt-info ul li {
                    border-color: <?php echo $border_color; ?>
                }
                
                .ut-pt-wrap-style-3 .ut-pt-header, 
                .ut-pt-wrap-style-3 .ut-custom-row, 
                .ut-pt-wrap-style-3 .ut-btn.ut-pt-btn,
                .ut-pt-wrap-style-3 .ut-pt-featured-table .ut-btn {
                    border-color: <?php echo $border_color; ?>
                }
            
                .ut-pt-wrap-style-3 .ut-btn { 
                    color:<?php echo $this->accent; ?> !important; 
                }
                
                .ut-pt-wrap-style-3 .ut-btn { 
                    text-shadow: 0 0 40px <?php echo $this->accent; ?>, 2px 2px 3px black; 
                }
                
                .ut-pt-wrap-style-3 .ut-pt-featured-table .ut-btn { 
                    color: <?php echo $this->accent; ?> !important; 
                }
                
                .ut-pt-wrap-style-3 .ut-pt-featured-table .ut-btn { 
                    text-shadow: 0 0 40px <?php echo $this->accent; ?>, 2px 2px 3px black; 
                }
            
                .ut-pt-wrap-style-3 .ut-pt-featured-table .ut-pt-title { 
                    color:<?php echo $this->accent; ?> !important; 
                }
                
                .ut-pt-wrap-style-3 .ut-pt-featured-table .ut-pt-title { 
                    text-shadow: 0 0 40px <?php echo $this->accent; ?>, 2px 2px 3px black; 
                }
                
                /* Shortcode Related Font Settings */
                <?php if( ot_get_option( 'ut_global_headline_font_type', 'ut-google' ) == 'ut-google' ) : ?>
                
                    <?php if( ut_get_option_attribute( 'ut_global_google_headline_font_style', 'font-family', '', true ) ) : ?>
                        
                        .bkly-progress-circle.bkly-progress-circle-theme-font::before {
                            font-family: <?php echo ut_get_option_attribute( 'ut_global_google_headline_font_style', 'font-family', '', true ); ?>;
                        }
                        .bkly-icon-tab-label.bkly-icon-tab-label-theme-font {
                            font-family: <?php echo ut_get_option_attribute( 'ut_global_google_headline_font_style', 'font-family', '', true ); ?>;
                        }                             
                
                    <?php endif; ?>
                
                <?php elseif( ot_get_option( 'ut_global_headline_font_type', 'ut-google' ) == 'ut-websafe' ) : ?>
                
                    <?php if( ut_get_option_attribute( 'ut_global_headline_websafe_font_style_settings', 'font-family' ) ) : ?>
                        
                        .bkly-progress-circle.bkly-progress-circle-theme-font::before {
                            font-family: <?php echo ut_get_option_attribute( 'ut_global_headline_websafe_font_style_settings', 'font-family' ); ?>;
                        }
                        
                        .bkly-icon-tab-label.bkly-icon-tab-label-theme-font {
                            font-family: <?php echo ut_get_option_attribute( 'ut_global_headline_websafe_font_style_settings', 'font-family' ); ?>;
                        }
                                        
                    <?php endif; ?>                
                                
				<?php elseif( ot_get_option( 'ut_global_headline_font_type', 'ut-google' ) == 'ut-custom' ) : ?>
                
                    <?php if( ut_get_option_attribute( 'ut_global_headline_custom_font_style_settings', 'font-family' ) ) : ?>
                        
                        .bkly-progress-circle.bkly-progress-circle-theme-font::before {
                            font-family: <?php echo ut_get_option_attribute( 'ut_global_headline_custom_font_style_settings', 'font-family' ); ?>;
                        }
                        
                        .bkly-icon-tab-label.bkly-icon-tab-label-theme-font {
                            font-family: <?php echo ut_get_option_attribute( 'ut_global_headline_custom_font_style_settings', 'font-family' ); ?>;
                        }
                                        
                    <?php endif; ?>                
                
                <?php endif; ?>
				
				
                /* Call to Action Font
                ================================================== */ 
                <?php if( ot_get_option( 'ut_global_headline_font_type', 'ut-google' ) == 'ut-google' ) : ?>
                
                    <?php if( ut_get_option_attribute( 'ut_global_google_headline_font_style', 'font-family', '', true ) ) : ?>
                        
                        .cta-btn a {
                            font-family: <?php echo ut_get_option_attribute( 'ut_global_google_headline_font_style', 'font-family', '', true ); ?>
                        }
                
                    <?php endif; ?>
                
                    <?php if( ut_get_option_attribute( 'ut_global_google_headline_font_style', 'font-weight' ) ) : ?>
                        
                        .cta-btn a {
                            font-weight: <?php echo ut_get_option_attribute( 'ut_global_google_headline_font_style', 'font-weight' ); ?>
                        }
                
                    <?php endif; ?>
                
                <?php elseif( ot_get_option( 'ut_global_headline_font_type', 'ut-google' ) == 'ut-websafe' ) : ?>
                
                
                    <?php if( ut_get_option_attribute( 'ut_global_headline_websafe_font_style_settings', 'font-family' ) ) : ?>
                        
                        .cta-btn a {
                            font-family: <?php echo ut_get_option_attribute( 'ut_global_headline_websafe_font_style_settings', 'font-family' ); ?>
                        }
                
                    <?php endif; ?>
                
                    <?php if( ut_get_option_attribute( 'ut_global_headline_websafe_font_style_settings', 'font-weight' ) ) : ?>
                        
                        .cta-btn a {
                            font-weight: <?php echo ut_get_option_attribute( 'ut_global_headline_websafe_font_style_settings', 'font-weight' ); ?>
                        }
                
                    <?php endif; ?>
                
                <?php elseif( ot_get_option( 'ut_global_headline_font_type', 'ut-google' ) == 'ut-custom' ) : ?>
                
                    <?php if( ut_get_option_attribute( 'ut_global_headline_custom_font_style_settings', 'font-family' ) ) : ?>
                        
                        .cta-btn a {
                            font-family: <?php echo ut_get_option_attribute( 'ut_global_headline_custom_font_style_settings', 'font-family' ); ?>
                        }
                
                    <?php endif; ?>
                
                    <?php if( ut_get_option_attribute( 'ut_global_headline_custom_font_style_settings', 'font-weight' ) ) : ?>
                        
                        .cta-btn a {
                            font-weight: <?php echo ut_get_option_attribute( 'ut_global_headline_custom_font_style_settings', 'font-weight' ); ?>
                        }
                
                    <?php endif; ?>
                
                <?php endif; ?>
                
                
                /* Gallery Slider & H3 Tabs Label
                ================================================== */ 
                <?php if( ot_get_option( 'ut_global_h3_font_type', 'ut-google' ) == 'ut-google' ) : ?>
                
                    <?php if( ut_get_option_attribute( 'ut_h3_google_font_style', 'font-family', '', true ) ) : ?>
                        
                        figure.ut-gallery-slider-caption-wrap::before {
                            font-family: <?php echo ut_get_option_attribute( 'ut_h3_google_font_style', 'font-family', '', true ); ?>;
                        }
                        
                        .bkly-icon-tab-label.bkly-icon-tab-label-theme-h3-font {
                            font-family: <?php echo ut_get_option_attribute( 'ut_h3_google_font_style', 'font-family', '', true ); ?>;
                        }
                
                    <?php endif; ?>
                
                    <?php if( ut_get_option_attribute( 'ut_h3_google_font_style', 'font-weight' ) ) : ?>
                        
                        figure.ut-gallery-slider-caption-wrap::before {
                            font-weight: <?php echo ut_get_option_attribute( 'ut_h3_google_font_style', 'font-weight' ); ?>
                        }
                        
                        .bkly-icon-tab-label.bkly-icon-tab-label-theme-h3-font {
                            font-weight: <?php echo ut_get_option_attribute( 'ut_h3_google_font_style', 'font-weight' ); ?>
                        }
                
                    <?php endif; ?>
                
                <?php elseif( ot_get_option( 'ut_global_h3_font_type', 'ut-google' ) == 'ut-websafe' ) : ?>
                
                    <?php if( ut_get_option_attribute( 'ut_h3_websafe_font_style', 'font-family' ) ) : ?>
                        
                        figure.ut-gallery-slider-caption-wrap::before {
                            font-family: <?php echo ut_get_option_attribute( 'ut_h3_websafe_font_style', 'font-family' ); ?>;
                        }
                        
                        .bkly-icon-tab-label.bkly-icon-tab-label-theme-h3-font {
                            font-family: <?php echo ut_get_option_attribute( 'ut_h3_websafe_font_style', 'font-family' ); ?>;
                        }
                
                    <?php endif; ?>                
                    
                    <?php if( ut_get_option_attribute( 'ut_h3_websafe_font_style', 'font-weight' ) ) : ?>
                        
                        figure.ut-gallery-slider-caption-wrap::before {
                            font-weight: <?php echo ut_get_option_attribute( 'ut_h3_websafe_font_style', 'font-weight' ); ?>
                        }
                
                        .bkly-icon-tab-label.bkly-icon-tab-label-theme-h3-font {
                            font-weight: <?php echo ut_get_option_attribute( 'ut_h3_websafe_font_style', 'font-weight' ); ?>
                        }
                
                
                    <?php endif; ?>
                
                <?php endif; ?>


                /* Section Titles Glitch Effect
                ================================================== */
                <?php if( ot_get_option( 'ut_global_header_glitch', 'off' ) == 'on' ) : ?>

                    <?php $ut_global_header_glitch_accent_1 = ot_get_option('ut_global_header_glitch_accent_1' );

                    if( $ut_global_header_glitch_accent_1 ) : ?>

                        .section-title.ut-glitch-1::after,
                        .parallax-title.ut-glitch-1::after {
                            color: <?php echo $ut_global_header_glitch_accent_1; ?>;
                        }

                        .section-title.ut-glitch-2::after,
                        .parallax-title.ut-glitch-2::after {
                            text-shadow: 1px 0 <?php echo $ut_global_header_glitch_accent_1; ?>;
                        }

                    <?php endif; ?>

                    <?php $ut_global_header_glitch_accent_2 = ot_get_option('ut_global_header_glitch_accent_2' );

                    if( $ut_global_header_glitch_accent_2 ) : ?>

                        .section-title.ut-glitch-1::before,
                        .parallax-title.ut-glitch-1::before {
                            color: <?php echo $ut_global_header_glitch_accent_2; ?>;
                        }

                        .section-title.ut-glitch-2::before,
                        .parallax-title.ut-glitch-2::before {
                            text-shadow: -1px 0 <?php echo $ut_global_header_glitch_accent_2; ?>;
                        }

                    <?php endif; ?>

                <?php endif; ?>

                /* Section Titles Glow Effect
                ================================================== */
                <?php if( ot_get_option( 'ut_global_header_glow', 'off' ) == 'on' ) :

                    $ut_global_header_glow_color = ot_get_option('ut_global_header_glow_color' );

                    if( $ut_global_header_glow_color ) : ?>

                        .parallax-title.ut-glow span,
                        .section-title.ut-glow span {
                            -webkit-text-shadow: 0 0 40px <?php echo $ut_global_header_glow_color; ?>,  2px 2px 3px <?php echo ot_get_option('ut_global_header_glow_shadow_color', 'black' ); ?>;
                            -moz-text-shadow: 0 0 40px <?php echo $ut_global_header_glow_color; ?>,  2px 2px 3px <?php echo ot_get_option('ut_global_header_glow_shadow_color', 'black' ); ?>;
                            text-shadow: 0 0 40px <?php echo $ut_global_header_glow_color; ?>,  2px 2px 3px <?php echo ot_get_option('ut_global_header_glow_shadow_color', 'black' ); ?>;
                        }

                    <?php endif; ?>

                <?php endif; ?>

                /* #Webkit 
				================================================== */
				.vc_row-has-fill:not(*:root),
				.vc_section-has-fill:not(*:root),
				.vc_col-has-fill:not(*:root) {
					-webkit-backface-visibility: hidden;
					backface-visibility: hidden;
				}                
                
            </style>
            
            <?php
            
            echo $this->minify_css( ob_get_clean() );
        
        }

    }

}