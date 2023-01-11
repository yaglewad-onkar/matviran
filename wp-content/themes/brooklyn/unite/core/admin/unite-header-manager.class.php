<?php defined( 'ABSPATH' ) or die( 'You cannot access this script directly' );
    
class UT_Header_Manager {
    
     /**
     * Header option key, and header manager admin page slug
     * @var string
     */
     
    private $post_type = 'ut-header';
    
    /**
     * Haedermanager Options Title
     * @var string
     */
    private $title = '';
    
    
	
	/**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     */
	
    public function __construct( ) {
        
        // Title
        $this->title = esc_html__( 'Theme Headers', 'unitedthemes' );
        
        // run hooks
        $this->hooks();
        
    }    
    
    
    /**
     * Initiate our hooks
     *
     * @since     1.0.0
     * @version   1.0.0
     */
     
    public function hooks() {
        
		global $pagenow;
		
		// necessary actions
      	add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
        add_action( 'save_post', array( $this, 'save_meta_box' ), 1, 2 );
                
        // necessary scripts
        if( isset($_GET['post_type']) && $_GET['post_type'] == $this->post_type || isset($_GET['post']) && get_post_type( (int) $_GET['post'] ) == $this->post_type ) {
        
            add_action( 'admin_enqueue_scripts', array( $this , 'register_headermanager_css' ) );
            add_action( 'admin_enqueue_scripts', array( $this , 'register_headermanager_js' ) );
			
			// remove post box script
			add_action( 'admin_init', array( $this , 'remove_postbox' ) );
			
			// remove publish metabox
			add_action( 'admin_menu', array( $this , 'publish_box' ) );
			
			// remove screen options
			add_filter('screen_options_show_screen', '__return_false' );
			
        
        }
		
    }
   
    
	/**
     * Initiate our metabox
	 *
     * @since     1.0.0
     * @version   1.0.0
     */
	
    public function add_meta_boxes() {
		
		add_meta_box( 
			'unite-header-manager', 
			esc_html__( 'Header', 'unitedthemes' ),
			array( $this, 'render_meta_box' ), 
			$this->post_type 
		);		
		
	}
	
	
	/**
     * Remove Postbox Script
	 *
     * @since     1.0.0
     * @version   1.0.0
     */
	
	public function remove_postbox(){
		
		// wp_deregister
        // _script('postbox');	
		
	}
	
	
	public function publish_box(){
	
		remove_meta_box( 'submitdiv', $this->post_type, 'side' );
		
	}
	
	
	
	
	
	
    /**
     * Header Manager Admin CSS
     *
     * @since     1.0.0
     * @version   1.0.0
     *
     */
    public function register_headermanager_css() {
        
        $min = NULL;
            
        if( !WP_DEBUG ){
            $min = '.min';
        }
        
        wp_enqueue_style(
            'unite-grid', 
            FW_WEB_ROOT . '/core/admin/assets/css/unite-responsive-grid' . $min . '.css',  
            false, 
            UT_VERSION
        );
        
        wp_enqueue_style(
            'unite-modal', 
            FW_WEB_ROOT . '/core/admin/assets/vendor/custombox/css/custombox' . $min . '.css',   
            false, 
            UT_THEME_VERSION
        );
        
        wp_enqueue_style(
            'unite-headermanager', 
            FW_WEB_ROOT . '/core/admin/assets/css/unite-header-manager-admin' . $min . '.css',   
            array('unite-modal'), 
            UT_THEME_VERSION
        );
        
    
    } 
    
    /**
     * Header Manager Admin JS
     *
     * @since     1.0.0
     * @version   1.0.0
     */
    public function register_headermanager_js() {
        
        $min = NULL;
            
        if( !WP_DEBUG ){
            $min = '.min';
        }
        
        wp_enqueue_script(
            'unite-modal',
            FW_WEB_ROOT . '/core/admin/assets/vendor/custombox/js/custombox' . $min . '.js'
        );
        
        wp_enqueue_script(
            'unite-headermanager',
            FW_WEB_ROOT . '/core/admin/assets/js/unite-header-manager-admin' . $min . '.js', 
            array(
                'jquery',
                'jquery-ui-droppable',
                'jquery-ui-draggable',
                'jquery-ui-sortable',
                'jquery-effects-highlight',
                'unite-modal'
            ),
            UT_THEME_VERSION
        );
        
    
    
    }
    
    

    
    
    
    
    
    
    
    
    /**
     * Admin Meta Box
     *
     * @since     1.0.0
     * @version   1.0.0
     *
     */
	
    public function render_meta_box( $post, $metabox ) { 


		// need meta boxes	
		
		/*

		ut_upper_header_area
		
		ut_upper_header_area_left
		ut_upper_header_area_middle
		ut_upper_header_area_right
		
		ut_middle_header_area
		
		ut_middle_header_area_left
		ut_middle_header_area_middle
		ut_middle_header_area_right
		
		ut_lower_header_area
		
		ut_lower_header_area_left
		ut_lower_header_area_middle
		ut_lower_header_area_right
		


		ut_upper_tablet_header_area
		
		ut_upper_tablet_header_area_left
		ut_upper_tablet_header_area_middle
		ut_upper_tablet_header_area_right


		ut_lower_tablet_header_area
		
		ut_lower_tablet_header_area_left
		ut_lower_tablet_header_area_middle
		ut_lower_tablet_header_area_right


		
		
		
		
		
		ut_mobile_header_area
		
		ut_mobile_header_area_left
		ut_mobile_header_area_middle
		ut_mobile_header_area_right
		
		
		
		


		*/



		?>

		<div id="ut-admin-wrap" class="clearfix">
		
			<div id="ut-ui-admin-header">
                    
                <div class="grid-10 medium-grid-15 tablet-grid-20 hide-on-mobile grid-parent">
                            
                    <div class="ut-admin-branding">
                        <a href="http://unitedthemes.com" target="_blank"><img src="<?php echo THEME_WEB_ROOT; ?>/unite-custom/admin/assets/img/icons/bklyn-logo-white.svg" alt="UnitedThemes"><span class="version-number">Version <?php echo UT_THEME_VERSION; ?></span></a>
                    </div>
                
                </div>                                                
                
                <div class="grid-90 medium-grid-85 tablet-grid-80 mobile-grid-100 grid-parent">
                
                    <div class="ut-admin-header-title">
                        
                        <?php $theme = wp_get_theme(); ?>
                        
                        <h1><?php esc_html_e( 'Header Builder.', 'unitedthemes' ); ?></h1>
                    
                    </div>
                
                </div>
                
            </div>
			
			
			
			
        <!-- Start UT-Backend-Wrap -->
        <div id="ut-header-manager" class="ut-admin-wrap clearfix">
                            
            <!-- Start UT-Admin-Main -->                
            <div class="ut-admin-main">
                
                <div id="unite-header-manager-form" class="grid-80">
                	
					<ul class="ut-header-builder-tabs clearfix" data-tabgroup="ut_header_builder_group">
                
						<li><a href="#desktop_header" class="active"><?php esc_html_e( 'Desktop', 'unitedthemes' ); ?></a></li>
						<li><a href="#tablet_header"><?php esc_html_e( 'Tablet', 'unitedthemes' ); ?></a></li>
						<li><a href="#mobile_header"><?php esc_html_e( 'Mobile', 'unitedthemes' ); ?></a></li>

					</ul>
					
					<section id="ut_header_builder_group" class="ut-header-builder-tabgroup">
					
						<div id="desktop_header">
							
							<fieldset>
                    
								<legend><?php esc_html_e('Upper Header Area', 'unitedthemes'); ?><a href="#unite-upper-header-settings" class="unite-header-section-setting"></a></legend>

								<div id="unite-upper-header-settings" class="unite-header-settings-section">

									Settings Here! 

								</div>                        

								<div id="unite-upper-header" data-section="upper-header" class="unite-header-section">

									<div id="unite-upper-left-header" data-inner-section="upper-left-header" class="unite-header-part">

										<a class="unite-add-element" href="" data-for="upper-left-header"></a>

									</div>

									<div id="unite-upper-center-header" data-inner-section="upper-center-header" class="unite-header-part">

										<a class="unite-add-element" href="" data-for="upper-center-header"></a>

									</div>

									<div id="unite-upper-right-header" data-inner-section="upper-right-header" class="unite-header-part">

										<a class="unite-add-element" href="" data-for="upper-center-header"></a>    

									</div>

								</div>

							</fieldset>

							<fieldset>

								<legend><?php esc_html_e('Middle Header Area', 'unitedthemes'); ?><a href="#unite-mid-header-settings" class="unite-header-section-setting"></a></legend>

								<div id="unite-mid-header-settings" class="unite-header-settings-section">
									
									Settings Here!
							
								</div>

								<div id="unite-mid-header" class="unite-header-section">

									<div id="unite-mid-left-header" data-inner-section="mid-left-header" class="unite-header-part">

										<a class="unite-add-element" href="" data-for="mid-left-header"></a>

									</div>

									<div id="unite-mid-center-header" data-inner-section="mid-center-header" class="unite-header-part">

										<a class="unite-add-element" href="" data-for="mid-center-header"></a>

									</div>

									<div id="unite-mid-right-header" data-inner-section="mid-right-header" class="unite-header-part">

										<a class="unite-add-element" href="" data-for="mid-right-header"></a>

									</div>                    

								</div>

							</fieldset>

							<fieldset>

								<legend><?php esc_html_e('Lower Header Area', 'unitedthemes'); ?><a href="#unite-lower-header-settings" class="unite-header-section-setting"></a></legend>

								<div id="unite-lower-header-settings" class="unite-header-settings-section">

									Settings Here!
									
								</div>

								<div id="unite-lower-header" class="unite-header-section">

									<div id="unite-lower-left-header" data-inner-section="lower-left-header" class="unite-header-part">


										<a class="unite-add-element" href="" data-for="lower-left-header"></a>

									</div>

									<div id="unite-lower-center-header" data-inner-section="lower-center-header" class="unite-header-part">


										<a class="unite-add-element" href="" data-for="lower-center-header"></a>

									</div>

									<div id="unite-lower-right-header" data-inner-section="lower-right-header" class="unite-header-part">


										<a class="unite-add-element" href="" data-for="lower-right-header"></a>    

									</div>                    

								</div>                    

							</fieldset>
							
							
						
							
							
						
						</div>
						
						<div id="tablet_header">
						
							<fieldset>
                    
								<legend><?php esc_html_e('Upper Tablet Header Area', 'unitedthemes'); ?><a href="#unite-upper-header-tablet-settings" class="unite-header-section-setting"></a></legend>

								<div id="unite-upper-header-tablet-settings" class="unite-header-settings-section">

									Settings Here! 

								</div>                        

								<div id="unite-upper-header" data-section="upper-header" class="unite-header-section">

									<div id="unite-upper-left-header" data-inner-section="upper-left-header" class="unite-header-part">


										<a class="unite-add-element" href="" data-for="upper-left-header"></a>

									</div>

									<div id="unite-upper-center-header" data-inner-section="upper-center-header" class="unite-header-part">


										<a class="unite-add-element" href="" data-for="upper-center-header"></a>

									</div>

									<div id="unite-upper-right-header" data-inner-section="upper-right-header" class="unite-header-part">


										<a class="unite-add-element" href="" data-for="upper-center-header"></a>    

									</div>

								</div>

							</fieldset>
							
							
							<fieldset>

								<legend><?php esc_html_e('Lower Tablet Header Area', 'unitedthemes'); ?><a href="#unite-lower-header-tablet-settings" class="unite-header-section-setting"></a></legend>

								<div id="unite-lower-header-tablet-settings" class="unite-header-settings-section">

									Settings Here!
									
								</div>

								<div id="unite-lower-header" class="unite-header-section">

									<div id="unite-lower-left-header" data-inner-section="lower-left-header" class="unite-header-part">


										<a class="unite-add-element" href="" data-for="lower-left-header"></a>

									</div>

									<div id="unite-lower-center-header" data-inner-section="lower-center-header" class="unite-header-part">


										<a class="unite-add-element" href="" data-for="lower-center-header"></a>

									</div>

									<div id="unite-lower-right-header" data-inner-section="lower-right-header" class="unite-header-part">


										<a class="unite-add-element" href="" data-for="lower-right-header"></a>    

									</div>                    

								</div>                    

							</fieldset>
						
						</div>
						
						<div id="mobile_header">
						
							<fieldset>

								<legend><?php esc_html_e('Mobile Header Area', 'unitedthemes'); ?><a href="#unite-header-mobile-settings" class="unite-header-section-setting"></a></legend>

								<div id="unite-header-mobile-settings" class="unite-header-settings-section">

									Settings Here!
									
								</div>

								<div id="unite-lower-header" class="unite-header-section">

									<div id="unite-lower-left-header" data-inner-section="lower-left-header" class="unite-header-part">


										<a class="unite-add-element" href="" data-for="lower-left-header"></a>

									</div>

									<div id="unite-lower-center-header" data-inner-section="lower-center-header" class="unite-header-part">


										<a class="unite-add-element" href="" data-for="lower-center-header"></a>

									</div>

									<div id="unite-lower-right-header" data-inner-section="lower-right-header" class="unite-header-part">


										<a class="unite-add-element" href="" data-for="lower-right-header"></a>    

									</div>                    

								</div>                    

							</fieldset>
						
						</div>
						
					</section>
                    
                </div>
                
                <div id="unite-header-manager-settings" class="grid-20">
                
					<h3><?php esc_html_e( 'Settings', 'unitedthemes' ); ?></h3>
					
					
					
					
					
                
                </div>
            
            </div>            
            
        </div>
			
		</div>	
        
    <?php }
    
    /**
     * Validate Header Settings
     *
     * @since     1.0.0
     * @version   1.0.0
     */
    public function validate_settings( $key ) {
                    
        return $key;
        
    }
	
	
	
	
	/**
     * Save our metabox
     * @since     1.0.0
     * @version   1.0.0
     */
	
	public function save_meta_box( $post_id, $post_object ) {
				
		global $pagenow;
		
		
		
		
		// check if viewing a revision
        if ( $post_object->post_type == 'revision' || $pagenow == 'revision.php' ) {
            return $post_id;
        } 
		
		
	}
	
	
	
    

}

if( apply_filters( 'ut_show_header_manager', false ) ) {

    new UT_Header_Manager();

}