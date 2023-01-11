<?php if (!defined('ABSPATH')) {
    exit; // exit if accessed directly
}


class Unite_Admin_Pointers {
	
	public $screen_id;
    public $valid;
    public $pointers;

    /**
     * Register variables and start up plugin
     */
    public function __construct( $pointers = array( ) ) {

        $screen = get_current_screen();
        $this->screen_id = $screen->id;
        $this->register_pointers( $pointers );
        add_action( 'admin_enqueue_scripts', array( $this, 'add_pointers' ), 1000 );
		add_action( 'admin_print_footer_scripts', array( $this, 'add_scripts' ) );
		
    }


    /**
     * Register the available pointers for the current screen
     */
    public function register_pointers( $pointers ) {
        
		$screen_pointers = null;
        
		foreach( $pointers as $pointer ) {
            
			if( $pointer['screen'] == $this->screen_id ) {
                
				$options = array(
                    'content'  => sprintf(
                        '<h3> %s </h3> <p> %s </p>', 
                        $pointer['title'],
                        $pointer['content']
                    ),
                    'position' => $pointer['position']
                );
				
                $screen_pointers[$pointer['id']] = array(
                    'screen'  		=> $pointer['screen'],
                    'target'  		=> $pointer['target'],
					'target_event'  => $pointer['target_event'],
					'overlay' 		=> $pointer['overlay'],
                    'options' 		=> $options
                );
				
            }
			
        }
		
        $this->pointers = $screen_pointers;
		
    }


    /**
     * Add pointers to the current screen if they were not dismissed
     */
    public function add_pointers() {
        
		if( !$this->pointers || !is_array( $this->pointers ) ) {
            return;
		}
			
        // Get dismissed pointers
        $get_dismissed = get_user_meta( get_current_user_id(), 'dismissed_wp_pointers', true );
        $dismissed = explode( ',', (string) $get_dismissed );

        // Check pointers and remove dismissed ones.
        $valid_pointers = array( );
        foreach( $this->pointers as $pointer_id => $pointer ) {
            
			if( in_array( $pointer_id, $dismissed ) || empty( $pointer ) || empty( $pointer_id ) || empty( $pointer['target'] ) || empty( $pointer['options'] ) ) {
            	continue;
			}				
				
            $pointer['pointer_id'] = $pointer_id;
            $valid_pointers['pointers'][] = $pointer;
			
        }

        if( empty( $valid_pointers ) ) {
            return;
		}	
			
        $this->valid = $valid_pointers;
        
		wp_enqueue_style( 'wp-pointer' );
        wp_enqueue_script( 'wp-pointer' );
		
    }

    /**
     * Print JavaScript if pointers are available
     */
    public function add_scripts() {
        
		if( empty( $this->valid ) ) {
            return;
		}
			
        $pointers = json_encode( $this->valid );
		
		ob_start(); ?>
		
		<script type="text/javascript">
		//<![CDATA[
			jQuery(document).ready( function($) {
				
				var WPHelpPointer = <?php echo $pointers; ?>;

				$.each(WPHelpPointer.pointers, function(i) {
					wp_help_pointer_open(i);
				});

				function wp_help_pointer_open(i) {
					
					pointer = WPHelpPointer.pointers[i];
					
					console.log( WPHelpPointer.pointers[i] );
					
					if( pointer.target_event === 'click' ) {
					   
					   $(pointer.target).addClass("ut-has-click-pointer");							
						
					   $(pointer.target).pointer({
							content: pointer.options.content,
							position: {
								edge: pointer.options.position.edge,
								align: pointer.options.position.align
							},						    
							close: function() {
								
								$.post( ajaxurl, {
									pointer: pointer.pointer_id,
									action: 'dismiss-wp-pointer'
								});
								
								if( $("#" + pointer.overlay).length ) {
								   
									$("#" + pointer.overlay).fadeOut(function(){
										
										$(this).remove();
										
									});
								   
								}
								
							}
						});					   
					   
					} else {
						
						$( pointer.target ).pointer({
							content: pointer.options.content,
							position: {
								edge: pointer.options.position.edge,
								align: pointer.options.position.align
							},
							close: function() {
								$.post( ajaxurl, 
								{
									pointer: pointer.pointer_id,
									action: 'dismiss-wp-pointer'
								});
							}
						}).pointer('open');						
						
					}
				
				}
				
			});
		//]]>
		</script><?php
		
		echo ob_get_clean();
	
    }
	
}


add_action( 'admin_enqueue_scripts', 'unite_helper_pointers' );

function unite_helper_pointers() {
    
	$pointers = array(        
        array(
            'id'       		=> 'portfolio-onpage',
            'screen'   		=> 'portfolio',
            'target'   		=> '.ut-hero-type',
            'target_event'	=> 'click',
			'overlay'		=> 'ut-hero-type-pointer-overlay',	
			'title'    		=> 'Deprecated Option',
            'content'  		=> 'As an ongoing process, we changed the way Slide-Up and Lightbox Portfolio are managed. Therefore we are introducing simplified portfolio options.',
			'position' 		=> array(
                'edge'  => 'top',
                'align' => 'left'
            )
        ),
    );
	
    new Unite_Admin_Pointers( $pointers );
	
}

