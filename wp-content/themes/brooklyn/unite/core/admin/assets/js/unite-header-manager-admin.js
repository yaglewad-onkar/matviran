/* <![CDATA[ */
(function($){
	
	"use strict";
	
	
    $(document).ready(function(){
    	
		$("#titlediv").prependTo("#ut-header-manager");
		
		
        
        $('.unite-header-section-setting').on('click', function( event ) {
            
            Custombox.open({
                target: $(this).attr('href'),
                effect: 'fadein'
            });
            
            event.preventDefault();
            
        });
        
        
		
		
		
		
		
		
		$('.ut-header-builder-tabgroup > div').hide();
        $('.ut-header-builder-tabgroup > div:first-of-type').show();
        $('.ut-header-builder-tabs a').click(function(e){
            
            e.preventDefault();
            
            var $this    = $(this),
                tabgroup = '#'+$this.parents('.ut-header-builder-tabs').data('tabgroup'),
                others   = $this.closest('li').siblings().children('a'),
                target   = $this.attr('href');
            
            others.removeClass('active');
            $this.addClass('active');
            $(tabgroup).children('div').hide();
            $(target).show();

        });
		
		
		
        
        
        
                
    
    });

})(jQuery);
 /* ]]> */