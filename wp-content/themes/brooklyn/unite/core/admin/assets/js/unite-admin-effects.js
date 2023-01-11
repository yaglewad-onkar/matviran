/* <![CDATA[ */
;(function($){

    "use strict";

    var animation_group = $('#adminmenuback, #adminmenuwrap, #wpadminbar');

    window.onload = function() {

        TweenLite.to(["#adminmenuback", "#adminmenuwrap", "#wpadminbar"], 0.4, {filter: 'grayscale(100%)', ease: Power3.easeInOut });

    };

    animation_group.on('mouseenter', function(){

        TweenLite.to(["#adminmenuback", "#adminmenuwrap", "#wpadminbar"], 0.4, {filter: 'grayscale(0%)', ease: Power3.easeInOut });

    });

    animation_group.on('mouseleave', function(){

        TweenLite.to(["#adminmenuback", "#adminmenuwrap", "#wpadminbar"], 0.4, {filter: 'grayscale(100%)', ease: Power3.easeInOut });

    });

})(jQuery);
/* ]]> */